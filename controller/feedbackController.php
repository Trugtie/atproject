<?php
include "./autoload.php"; //include thư viện model
include "../dao/FeedBackDAO.php"; //include thư viện truy xuất feedback trong database
include "../util/validate.php"; // include thư viện validate

$action = $_POST['action'];
switch ($action) {
    case "addFeedback":
        $mota = $_POST['mota']; //lấy mô tả thông báo
        $ma = $_POST['mafb']; //lấy mã thông báo
        session_start();
        $makh = $_SESSION['user']->get_makh(); //lấy mã khách hàng trong biến user của session
        $masp =  $_SESSION['sp']; //lấy mã sản phẩm
        FeedBackDAO::insertFeedback($mota, $makh, $masp, $conn); // thêm feedback đó vào csdl
        header("Location: ../view/lichsumuahang.php");
        break;
}
