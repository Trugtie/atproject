<?php
include "../../controller/autoload.php";
include "../../dao/AccessoryDAO.php";
include "../../util/validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $masp = $_GET['masp'];
            //lay cai phu kien len de xoa cai hinh
            $oldPhukien =  AccessoryDAO::getPhuKien($masp, $conn);
            unlink(dirname(__DIR__) . '/view' . $oldPhukien['hinh']); //xóa cái hình cũ trên server
            AccessoryDAO::deletePhuKien($masp, $conn); //xóa phụ kiện trong database
            header("Location: ../view/quanlysanpham.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "addPhukien":
            $hinh = $_FILES["hinh"];
            $masp = $_POST['masp'];
            $tensp = $_POST['tensp'];
            $mota = $_POST['mota'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $loaisp = $_POST['loaisp'];
            $tinhtrang = "Còn hàng";
            $mahang = $_POST['mahang'];
            $maphukien = $_POST['maloaipk'];
            $error = validate::validatePhukien($hinh, $tensp, $mota, $soluong, $gia); //check validate các field nhập
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error; //có lỗi thì xuát ra thông báo lỗi
                header("Location: ../view/addaccessories.php");
            } else {
                $temp = $hinh["tmp_name"]; //lấy đường dẫn  tạm lưu hình vừa upload
                $name = $hinh["name"];  //lấy tên hình vừa upload
                //kiem tra neu chua co thu muc image thi tao thu muc image
                if (!is_dir(dirname(__DIR__) . '/view/images/')) {
                    mkdir(dirname(__DIR__) . '/view/images/');
                }
                move_uploaded_file($temp, dirname(__DIR__) . '/view/images/' . $name); //chuyển file hình vào thư mục images
                $imagePath = '/images/' . $name; //tạo biến đường dẫn để lưu database
                $phukien = new PhuKien($masp, $tensp, $mota, $soluong, $imagePath, $gia, $loaisp, $tinhtrang, $mahang, $maphukien);
                //reset lai auto_increment trong bang phu kien truoc khi them
                AccessoryDAO::resetAI($conn);
                AccessoryDAO::insertPhuKien($phukien, $conn);
                header("Location: ../view/quanlysanpham.php");
            }
            break;
        case "updatePhukien":
            $hinh = $_FILES["hinh"];
            $masp = $_POST['masp'];
            $tensp = $_POST['tensp'];
            $mota = $_POST['mota'];
            $soluong = $_POST['soluong'];
            $gia = $_POST['gia'];
            $loaisp = $_POST['loaisp'];
            $tinhtrang = "Còn hàng";
            $mahang = $_POST['mahang'];
            $maphukien = $_POST['maloaipk'];

            //bat validate co hinh hoac khong co hinh
            if (!empty($hinh['name']))
                $error = validate::validatePhukien($hinh, $tensp, $mota, $soluong, $gia); //bắt lỗi khi có hình
            else
                $error = validate::validatePhukienWithoutImage($tensp, $mota, $soluong, $gia); //bắt lỗi khi không có hình

            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error; //lưu dòng thông báo lỗi để show
                header("Location: ../view/editPhuKien.php?masp=$masp");
            } else {
                //update co hinh hoac khong hinh
                if (!empty($hinh['name'])) { //update có hình
                    $temp = $hinh["tmp_name"];
                    $name = $hinh["name"];
                    $oldPhukien =  AccessoryDAO::getPhuKien($masp, $conn); //lấy phụ kiện cũ lên trong database để lấy đường dẫn hình để xóa
                    unlink(dirname(__DIR__) . '/view' . $oldPhukien['hinh']); //xóa hình cũ
                    move_uploaded_file($temp, dirname(__DIR__) . '/view/images/' . $name); //gán hình mới
                    $imagePath = '/images/' . $name; //đường dẫn hình
                    $phukien = new PhuKien($masp, $tensp, $mota, $soluong, $imagePath, $gia, $loaisp, $tinhtrang, $mahang, $maphukien); //tạo đối tượng để update vào csdl
                    
                    AccessoryDAO::updatePhuKien($phukien, $masp, $conn); //thực hiện lênh update
                    header("Location: ../view/quanlysanpham.php");
                } else { //update không hình
                    $phukien = new PhuKien($masp, $tensp, $mota, $soluong, $imagePath, $gia, $loaisp, $tinhtrang, $mahang, $maphukien);
                    
                    AccessoryDAO::updatePhuKienWithoutImage($phukien, $masp, $conn);
                    header("Location: ../view/quanlysanpham.php");
                }
            }
            break;
        }
}
