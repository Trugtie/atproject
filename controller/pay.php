<?php
include "../controller/autoload.php";
include '../dao/SaleDAO.php';
include '../dao/OrderDAO.php';
?>
<?php
session_start();
if(empty($_SESSION['cart'])){
    $_SESSION['error']="Giỏ hàng trống không thể thanh toán!";
    header("Location:../view/giohang.php");
}
else{
    if(isset($_POST['action'])){
        switch($_POST['action']){
            case "apdungkm":
                if(!empty($_POST['makm'])){
                    $makm = $_POST['makm'];
                    $km = SaleDAO::findSale($makm, $conn);
                    if($km==false){
                       $_SESSION['error']="Mã khuyến mãi không hợp lệ!";
                       header("Location:../view/thanhtoan.php");
                    }
                    else{
                        $thanhtien = $_POST['thanhtien'];
                        $giatrigiam = $km['giatrigiam']/100;
                        $tienkhuyenmai = $thanhtien * $giatrigiam;
                        $_SESSION['km']=$tienkhuyenmai;
                        $_SESSION['makm']=$makm;
                        header("Location:../view/thanhtoan.php");
                    }
                }
                else{
                    header("Location:../view/thanhtoan.php");
                }
                break;
            case "dathang":
                $nguoinhan = $_POST['nguoinhan'];
                $sdt = $_POST['sdt'];
                $diachi = $_POST['diachi'];
                $phuongthuc = $_POST['phuongthuc'];
                if(isset($_POST['makm']))
                $makm= $_POST['makm'];
                $tongtien = $_POST['thanhtien'];
                $makh = $_SESSION['user']->get_makh();
                if(!empty($makm))
                OrderDAO::insertOrder($nguoinhan,$sdt,$diachi,$phuongthuc,$makh,$makm,$tongtien,$conn);
                else
                OrderDAO::insertOrderWithoutSale($nguoinhan,$sdt,$diachi,$phuongthuc,$makh,$tongtien,$conn);
                $newOrder = OrderDAO::getNewOrder($conn);
                $madon=$newOrder['madon'];
                foreach($_SESSION['cart'] as $product){
                    $thanhtien = $product->getSoLuong() * $product->getGia();
                    OrderDAO::insertDetailOrder($product->getMaSp(),$madon,$product->getSoluong(),$thanhtien,$conn);
                }
                $_SESSION['notify']="Đã dặt hàng thành công!";
                unset($_SESSION['cart']);
                header("Location:../view/lichsumuahang.php");
                exit;
                break;
        }
    }
    header("Location:../view/thanhtoan.php");
}