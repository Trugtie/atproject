<?php
include "../../controller/autoload.php";
include "../../dao/AdminDAO.php";
include "../../util/validate.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $action = $_GET['action'];
    switch ($action) {
        case "delete":
            $ma = $_GET['maad']; //lấy mã ad
            AdminDAO::deleteAdmin($ma,$conn); //xóa ad ra khỏi database
            header("Location: ../view/quanlynhanvien.php");
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "insertAdmin":
            $ten = $_POST['ten'];
            $ho = $_POST['ho'];
            $ma = $_POST['ma'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            $username = $_POST['username'];
            $password = ($_POST['password']);
            
            $error = validate::validateAdmin($email, $username, $password); //bắt lỗi các field có thiếu hay không
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error; //thông báo lỗi
                
                header("Location: ../view/addAdmin.php");
            } else {                
                $admin = new Admin($ma, $email, $username, sha1($password), $ho, $ten, $sdt, $diachi); //tạo đối tượng admin
                AdminDAO::insertAdmin($admin, $conn); //insert vào database
                header("Location: ../view/quanlynhanvien.php");
            }
            break;
        case "update":
            $ten = $_POST['ten'];
            $ho = $_POST['ho'];
            $ma = $_POST['ma'];
            $sdt = $_POST['sdt'];
            $diachi = $_POST['diachi'];
            $email = $_POST['email'];
            $username = $_POST['username'];
            $password = ($_POST['password']);  

            $error = validate::validateAdmin($email, $username, $password);
            if (!empty($error)) {
                session_start();
                $_SESSION["error"] = $error;
                header("Location: ../view/editthongtinadmin.php?maad=$ma");
            }else{
                
                $admin = new Admin($ma, $email, $username, sha1($password), $ho, $ten, $sdt, $diachi);
                AdminDAO::updateAdmin($admin, $ma, $conn); //tương tự như trên nhưng chạy câu truy vấn update
                header("Location: ../view/quanlynhanvien.php");
            }
            
            break;
    }
}