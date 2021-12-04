<?php
// include_once "model/khachhang.php";

session_start();
$username = $_SESSION["username"];

$ho = $_POST['ho'];
$ten = $_POST['ten'];
$diachi = $_POST['diachi'];
$sdt = $_POST['sdt'];

// $_SESSION["ten"] = $user['username'];
include "../model/addProfile.php";