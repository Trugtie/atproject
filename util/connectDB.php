<?php
//tên server
$servername="localhost";
//tên database
$database="atproject";
//tên đăng nhập database
$username="root";
//password đăng nhập
$password="";
try{
    //tạo kết nối đến database
    $conn = new PDO("mysql:host=$servername;dbname=$database",$username,$password);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
    echo "Conenntion failed!" . $e->getMessage();
    exit();
}