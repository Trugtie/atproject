<?php
include "../../controller/autoload.php";
include "../../dao/KhuyenmaiDAO.php";
include "../../util/validate.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $ma = $_GET['makm'];
            //kiem tra rang buoc khuyến mãi có nằm trong đơn hàng nào không, nếu có không cho xóa
            $check = KhuyenmaiDAO::checkKhuyenMaiDonHang($ma,$conn);
            if($check == true){
                session_start();
                $_SESSION["error"] = "Khuyến mãi này đang được sử dụng ở một số đơn hàng không thể xóa!"; //dòn thông báo lỗi
                header("Location: ../view/quanlykhuyenmai.php");
            }
            else{
                $oldKhuyenmai =  KhuyenmaiDAO::getKhuyenMai($ma, $conn);
                unlink(dirname(__DIR__) . '/view' . $oldKhuyenmai['hinh']); //xóa cái hình
                KhuyenmaiDAO::deleteKhuyenmai($ma, $conn); //xóa khuyến mãi trong database
                header("Location: ../view/quanlyKhuyenmai.php");
            }
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "insertKhuyenmai":
            $hinh = $_FILES["hinh"];
            $tenkm = $_POST['tenkm'];
            $makm = $_POST['makm'];
            $mota = $_POST['mota'];
            $ngaybd = $_POST['ngaybd'];
            $giatrigiam = $_POST['giatrigiam'];
            $ngaykt = $_POST['ngaykt'];

            $error = validate::validateKhuyenmai($hinh, $tenkm, $mota, $giatrigiam, $ngaybd, $ngaykt); //bắt lỗi các field có bị nhập sót hay không
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error; //lưu thông báo lỗi
                header("Location: ../view/editkhuyenmai.php?makm=$makm");
            } else {
                $temp = $hinh["tmp_name"];
                $name = $hinh["name"];
                if (!is_dir(dirname(__DIR__) . '/view/images/')) { //nếu chưa có thư mục images thì tạo
                    mkdir(dirname(__DIR__) . '/view/images/'); //tạo thư mục images
                }
                move_uploaded_file($temp, dirname(__DIR__) . '/view/images/' . $name); //chuyển file hình vào thư mục images
                $imagePath = '/images/' . $name; //đường dẫn hình
                $khuyenmai = new KhuyenMai($makm, $tenkm, $mota, $giatrigiam, $ngaybd, $ngaykt, $imagePath);
                session_start();
                $maad=$_SESSION['admin']->get_maad();
                KhuyenMaiDAO::insertKhuyenmai($khuyenmai, $conn); //thêm khuyến mãi vào csdl
                //dam bao rang buoc ad_khuyenmai
                $makm =  KhuyenMaiDAO::getNewEvent($conn); //lấy mã khuyễn mãi vừa thêm
                KhuyenMaiDAO::adminCreateEvent($makm['makm'],$maad,$conn); //thêm vào bảng admin khuyến mãi
                header("Location: ../view/quanlykhuyenmai.php");
            }

            break;
        case "updateKhuyenmai":
            $hinh = $_FILES["hinh"];
            $tenkm = $_POST['tenkm'];
            $makm = $_POST['makm'];
            $mota = $_POST['mota'];
            $ngaybd = $_POST['ngaybd'];
            $giatrigiam = $_POST['giatrigiam'];
            $ngaykt = $_POST['ngaykt'];

            if (!empty($hinh['name'])) //kiểm tra coi có sửa hình hay không
                $error = validate::validateKhuyenmai($hinh, $tenkm, $mota, $giatrigiam, $ngaybd, $ngaykt); //bắt lỗi có hình
            else
                $error = validate::validateKhuyenmaiWithoutImage($tenkm, $mota, $giatrigiam, $ngaybd, $ngaykt); //bắt lỗi không hình

            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/editkhuyenmai.php?makm=$makm");
            } else {
                if (!empty($hinh['name'])) {
                    $temp = $hinh["tmp_name"];
                    $name = $hinh["name"];
                    $oldKhuyenmai =  KhuyenMaiDAO::getKhuyenMai($makm, $conn); //lấy khuyến mãi cũ để lấy đường dẫn hình và xóa hình
                    unlink(dirname(__DIR__) . '/view' . $oldKhuyenmai['hinh']); //xóa hình
                    move_uploaded_file($temp, dirname(__DIR__) . '/view/images/' . $name); //thêm hình mới vào
                    $imagePath = '/images/' . $name; //đường dẫn hình
                    $khuyenmai = new KhuyenMai($makm, $tenkm, $mota, $giatrigiam, $ngaybd, $ngaykt, $imagePath);
                    KhuyenMaiDAO::updateKhuyenmai($khuyenmai, $makm, $conn); // cập nhật thông tin khuyến mãi có sửa hình
                    header("Location: ../view/quanlykhuyenmai.php");
                } else {
                    $khuyenmai = new KhuyenMai($makm, $tenkm, $mota, $giatrigiam, $ngaybd, $ngaykt, $imagePath);
                    KhuyenMaiDAO::updatKhuyenmaiWithoutImage($khuyenmai, $makm, $conn); //cập nhật thông tin khuyến mãi không có sửa hình
                    header("Location: ../view/quanlykhuyenmai.php");
                }
            }
            break;
    }
}
