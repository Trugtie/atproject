<?php
/** @var $pdo \PDO */
require "connectDB.php";

$statement = $pdo->prepare("insert into laptop(masp,tensp,mota,soluong,gia,loaisp,trongluong,manhinh,ocung,vga,ram,cpu,pin,mausac,mahang,maloaimay)
    values(:masp,:tensp,:mota,:soluong,:gia,:loaisp,:trongluong,:manhinh,:ocung,:vga,:ram,:cpu,:pin,:mausac,:mahang,:maloaimay)");
$statement->bindValue(':masp', $masp);
$statement->bindValue(':tensp', $tensp);
$statement->bindValue(':mota', ($mota));
$statement->bindValue(':soluong', ($soluong));
// $statement->bindValue(':hinh', ($hinh));
$statement->bindValue(':gia', ($gia));
$statement->bindValue(':loaisp', ($loaisp));
// $statement->bindValue(':tinhtrang', ($tinhtrang));
$statement->bindValue(':trongluong', ($trongluong));
$statement->bindValue(':manhinh', ($manhinh));
$statement->bindValue(':ocung', ($ocung));
$statement->bindValue(':vga', ($vga));
$statement->bindValue(':ram', ($ram));
$statement->bindValue(':cpu', ($cpu));
$statement->bindValue(':pin', ($pin));
$statement->bindValue(':mausac', ($mausac));
$statement->bindValue(':mahang', ($mahang));
$statement->bindValue(':maloaimay', ($maloaimay));
$statement->execute();
header('Location: ../admin/addproduct.php');