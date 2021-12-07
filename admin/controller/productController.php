
<?php
$action = $_POST['action'];
var_dump($_POST);
switch ($action) {
    case "addLaptop":
        $name = $_FILES["hinh"]["name"];
        $type = $_FILES["hinh"]["type"];
        $masp = $_POST['masp'];
        $tensp = $_POST['tensp'];
        $mota = $_POST['mota'];
        $soluong = $_POST['soluong'];
        $hinh = $name;
        $gia = $_POST['gia'];
        $loaisp = $_POST['loaisp'];

        if ($soluong > 0) {
            $tinhtrang = "Còn hàng";
        } else {
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
        break;
}
