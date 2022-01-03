<?php
include "./autoload.php"; //include thư viện model
include "../dao/UserDAO.php"; //include thư viện truy xuất user trong database
include "../util/validate.php"; //inclyude thư viện validate
include "../util/function.php";// include thư viện function
if ($_SERVER['REQUEST_METHOD'] == 'GET') { //kiểm tra phương thức request của server để xử lý cho đúng
    $action = $_GET['action'];
    switch ($action) {
        case "logout":
            session_start();
            if (isset($_SESSION)) { //nếu có tồn tại session hay nôm na là đang đăng nhập thì xóa và destroy session luôn
                session_unset();
                session_destroy();
                header("Location: ../index.php");
            }
            break;
    }
} else {
    $action = $_POST['action'];
    switch ($action) {
        case "login":
            $username = $_POST['username']; //lấy username
            $password = sha1($_POST['password']); //lấy password và mã hóa sha1
            $error = ""; //mảng lưu thông báo lỗi
            $userDB = UserDAO::getUser($username, $password, $conn); //lấy user đó lên thông qua username, password
            if ($userDB == false) {// nếu không lấy được dữ liệu userDB sẽ là false thì thông báo lỗi và không cho đăng nhập
                session_start();
                $error = "Sai tài khoản hoặc mật khẩu"; //dòng thông báo
                $_SESSION["error"] = $error; //lưu lỗi vào session để có thể show
                    
            } else {
                session_start();
                $_SESSION["error"] = ""; //nếu lấy được dữ liệu của khách hàng đó trong database thì set lại mảng lỗi thành rỗng
                $ma = $userDB['makh']; //lấy toàn bộ thông tin của userDB để lưu vào đối tượng user
                $ho = $userDB['ho'];
                $ten = $userDB['ten'];
                $diachi = $userDB['diachi'];
                $sdt = $userDB['sdt'];
                $email = $userDB['email'];
                $username = $userDB['username'];
                $password = $userDB['password'];
                $user = new KhachHang($ma, $email, $username, $password, $ho, $ten, $sdt, $diachi); //tạo đối tượng user
                $_SESSION["user"] = $user; //lưu lại thông tin user vào session để xác định là đã đăng nhập và có thể mua hàng, đặt hàng, cập nhật thông tin,...
                header("Location: ../index.php");
            }

            break;
        case "register":
            $email = $_POST['email']; //lấy email khách nhập
            $username = $_POST['username']; // lấy username khách hàng nhập
            $password = $_POST['password']; // lấy pass
            $confirm = $_POST['confirm']; // lấy pass ở ô xác nhận pass
            UserDAO::insertUser($email, $username, $password, $conn); // thêm tài khoản này vào csdl
            header("Location: ../index.php");
            break;
        case "sendmail": //các lênh cho chức năng send code reset pass
            $error = "";
            $email = $_POST["email"]; //lấy email khách nhập
            $error = validate::validateEmail($email); // kiểm tra validate email
            if (!empty($error)) { //nếu có lỗi thì báo lỗi
                session_start();
                $_SESSION["error"] = $error; // lưu lỗi để thông báo, thông báo xong thì xóa
                header("Location: ../view/resetpass.php");
            } else {
                //kiem tra co ton tai email nay khong
                $user = UserDAO::getUserWithEmail($email, $conn);
                if ($user == false) {
                    session_start();
                    $_SESSION["error"] = "Email này chưa được đăng ký"; //không có data user trong database thì thông báo lỗi này
                    header("Location: ../view/resetpass.php");
                } else {
                    $to      = $email; //mail nhận
                    $subject = 'ATLAPTOP: Reset password!'; // tiêu đề mail
                    $code = randomString(6); // code reset pass với 6 ký tự
                    $message = $code; //nội dung mail là cái code vừa tạo
                    sendmail( $subject,$message,$email); //hàm send mail
                    session_start();
                    $_SESSION["email"] = $email; //lưu email lại
                    $_SESSION["code"] = $code; // lưu code lại để xác nhận 
                    header("Location: ../view/resetpass.php");
                }
            }

            break;
        case "resetpass":
            session_start();
            $err = "";
            $email = $_POST["email"]; //lấy email
            $password = $_POST["password"]; // lấy pass
            $confirmPass = $_POST["passwordConfirm"]; // lấy pass ở ô xác nhận pass lần 2
            $code = $_POST["code"]; //lấy code khách nhập
            if ($password != $confirmPass) { //nếu pass nhập khác với pass ở ô xác nhận pass thì báo lỗi
                $err = "Mật khẩu không giống nhau lấy mã mới và nhập lại!"; //dòng báo lỗi 
                $_SESSION["error"] = $err; // lưu lỗi để show, show xóa, tương tự như mấy cái lỗi trước
                header("Location: ../view/resetpass.php");
            } else if ($code != $_SESSION["code"]) { // code khách nhập sai với code tạo
                $err = "Code không đúng lấy mã mới và nhập lại!"; //báo lỗi này
                $_SESSION["error"] = $err;
                header("Location: ../view/resetpass.php");
            } else {
                unset($_SESSION["error"]); //nếu đúng hết thì xóa biến lỗi trong session
                unset($_SESSION["email"]); //xóa biến email trong session
                $_SESSION["notify"] = "Reset pass thành công !"; //đặt dòng thông báo vào session để thông báo, thông báo xong xóa luôn thông báo để tránh nặng server, logic tương tự như error
                UserDAO::resetpass($email, sha1($password), $conn); //cập nhật lại pass trong database
                header("Location: ../view/login.php");
            }

            break;
        case "update":
            $ten = $_POST['ten']; //lấy tên
            $ho = $_POST['ho']; //lấy họ
            $ma = $_POST['ma']; //lấy mã khách hàng, input này đã ẩn ở view
            $sdt = $_POST['sdt'];// lấy sđt
            $diachi = $_POST['diachi']; //lấy địa chỉ
            UserDAO::updateUser($ma, $ho, $ten, $diachi, $sdt, $conn); //cập nhật thông tin khách này vào csdl
            session_start();
            $_SESSION['user']->set_ten($ten); //set lại thông tin của khách này trong session, vì lúc này đã đăng nhập nên mới set được như vầy
            $_SESSION['user']->set_ho($ho);
            $_SESSION['user']->set_sdt($sdt);
            $_SESSION['user']->set_diachi($diachi);
            $_SESSION['notify'] = "Cập nhật thành công !"; //thông báo thành công
            header("Location: ../view/accountinformation.php");
            break;
    }
}
