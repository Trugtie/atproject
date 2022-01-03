<?php
include '../dao/ProductDAO.php';//include thư viện truy xuất sản phẩm trong database

switch ($_POST['action']) {
    case "searchLaptop":
        if (empty($_POST['words'])) { //kiểm tra xem khách hàng có điền từ khóa để search hay không, nếu không thì lấy toàn bộ laptop show lên
            session_start();
            $laptops = ProductDAO::getAllLaptopShowcase($conn); //lấy toàn bộ data laptop
            $_SESSION['search'] = $laptops; //lưu mảng laptop và session
            header("Location: ../view/laptop.php"); //chuyển trang về laptop.php
        } else {
            session_start();
            $laptops = ProductDAO::searchLaptop($_POST['words'], $conn); //nếu có từ khóa search thì lấy data laptop theo từ khóa search
            $_SESSION['search'] = $laptops; //lưu mảng laptop vào session để show xong r xóa
            $_SESSION['searchWords'] = $_POST['words']; //lưu lại từ khóa search để show lên dòng chữ đã search từ khóa gì
            $_SESSION['searchFlag'] = 1; //biến cờ để xác định có search từ khóa hay không
            header("Location: ../view/laptop.php");
        }
        break;
}
