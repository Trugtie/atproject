<?php
$err="";
$username = $_POST['username'];
$password = $_POST['password'];
include '../model/loginAdminValidation.php';
if($username != $user["username"]){
    $err.="Sai tên tài khoản";
    echo $err;
}else if(($password)!=$user["password"]){
    $err.="Sai mật khẩu";
    echo $err;
}
else{
    session_start();
$_SESSION["username"] = $user["username"];
    header("Location: ../admin/admin.php");
}