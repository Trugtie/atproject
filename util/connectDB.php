<?php
//tên server
$servername="databases.000webhost.com";
//tên database
$database="id18165220_atlaptop";
//tên đăng nhập database
$username="id18165220_trugtie";
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
