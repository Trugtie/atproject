
<?php

$name = $_FILES["hinh"]["name"];
$type = $_FILES["hinh"]["type"];
$size = $_FILES["hinh"]["size"];

move_uploaded_file(
    // $r = random_int(0,50),
    $_FILES["hinh"]["tmp_name"], 
    "upload/$name");

$masp = $_POST['masp'];
$tensp = $_POST['tensp'];
$mota = $_POST['mota'];
$soluong = $_POST['soluong'];
$hinh = $name;
$gia = $_POST['gia'];
$loaisp = $_POST['loaisp'];
if($soluong>0){
    $tinhtrang = "Còn hàng";
} else{
    $tinhtrang = "Hết hàng";
}
$trongluong = $_POST['trongluong'];
$manhinh = $_POST['manhinh'];
$ocung = $_POST['ocung'];
$vga = $_POST['vga'];
$ram = $_POST['ram'];
$cpu = $_POST['cpu'];
$pin = $_POST['pin'];
$mausac = $_POST['mausac'];
$mahang = $_POST['mahang'];
$maloaimay = $_POST['maloaimay'];

include "../model/insertProduct.php";
