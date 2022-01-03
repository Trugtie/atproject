<?php
include "../../controller/autoload.php";
include "../../dao/UserDao.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $ma = $_GET['makh'];
            //kiem tra rang buoc khách cớ đơn hàng nào không, nếu có không cho xóa
            $check = UserDao::checkKhachHangDonHang($ma,$conn);
            if($check==true){
                session_start();
                $_SESSION["error"] = "Khách hàng đang có đơn hàng không thể xóa!"; //dòng thông báo lỗi
                header("Location: ../view/quanlykhachhang.php");
            }
            else{
                UserDao::deleteUser($ma,$conn); //xóa khách hàng
                header("Location: ../view/quanlykhachhang.php");
            }
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        
        case "update":
            $ten = $_POST['ten'];
            $ho = $_POST['ho'];
            $ma = $_POST['ma'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            UserDAO::updateUser($ma, $ho, $ten, $diachi, $sdt, $conn); //cập nhật thông tin khách
            header("Location: ../view/quanlykhachhang.php");
            break;
    }
}