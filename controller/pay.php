<?php
session_start();
if(empty($_SESSION['cart'])){
    $_SESSION['error']="Giỏ hàng trống không thể thanh toán!";
    header("Location:../view/giohang.php");
}
else{
    header("Location:../view/thanhtoan.php");
}