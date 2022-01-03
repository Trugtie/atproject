<?php
include "../controller/autoload.php"; //include thư viện model
include '../dao/ProductDAO.php'; //include thư viện truy xuất sản phẩm trong database
session_start();
//Cong tru so luong
if (isset($_GET['action'])) {
    $vitri = $_GET['vitri']; //lấy vị trí mặt hàng trong giỏ hàng
    switch ($_GET['action']) { //lấy giá trị biến action để xử lý 
        case "plus":
            $masp = $_SESSION['cart'][$vitri]->getMaSp(); //lấy mã sản phẩm của mặt hàng
            $soLuongDat = $_SESSION['cart'][$vitri]->getSoluong(); //lấy số lượng đặt hàng của mặt hàng khách đặt
            $product = ProductDAO::getProduct($masp, $conn); //lấy data sản phẩm đó lên dựa vào mã
            $soLuongCon = $product['soluong']; // lấy số lượng còn lại của sản phẩm đó
            if ($soLuongDat == $soLuongCon) { //kiểm tra xem nếu số lượng đặt hàng vượt quá số lượng còn trong kho hàng sẽ thông báo lỗi và không cho thêm vào giỏ hàng nữa
                $_SESSION['error'] = "Số lượng đặt hàng vượt quá kho hàng, mặt hàng này chỉ còn $soLuongCon sản phẩm!";
                header("Location: ../view/giohang.php");
            } else {
                $_SESSION['cart'][$vitri]->setSoluong($_SESSION['cart'][$vitri]->getSoluong() + 1); //cộng 1 số lượng đặt
                header("Location: ../view/giohang.php");
            }
            break;
        case "minus":
            $_SESSION['cart'][$vitri]->setSoluong($_SESSION['cart'][$vitri]->getSoluong() - 1); //trừ 1 số lượng đặt
            if ($_SESSION['cart'][$vitri]->getSoluong() == 0) //nếu số lượng đặt còn 0 tự động xóa mặt hàng này ra khỏi giỏ hàng
                unset($_SESSION['cart'][$vitri]);
            header("Location: ../view/giohang.php");
            break;
    }
} else //Xoa gio hang
    if (isset($_GET['vitri'])) {
        $vitri = $_GET['vitri']; 
        unset($_SESSION['cart'][$vitri]); //xóa mặt hàng dựa vào vị trí của mặt hàng trong giỏ
        header('Location: ../view/giohang.php');
    }

//Them gio hang
if (isset($_SESSION['user'])) {
    $masp = $_POST['masp']; //lấy mã sản phẩm khi user ấn nút thêm vào giỏ
    $product = ProductDAO::getProduct($masp, $conn); // lấy data sản phẩm đó lên
    $productObj = new SanPham($product['masp'], $product['tensp'], "", 1, $product['hinh'], $product['gia'], "", "", ""); //tạo đối tượng sản phẩm dựa vào data vừa lấy lên để bỏ vào mảng giỏ hàng
    if (!isset($_SESSION['cart'])) { //nếu chưa có giỏ hàng thì tạo mới
        $_SESSION['cart'] = [];
        array_push($_SESSION['cart'], $productObj); //add đối tượng sản phẩm đó vào
    } else {
        $flag = 0; //biến cờ để xác định mặt hàng khách hàng ấn thêm có trùng với mặt hàng trong giỏ hay không, trùng thì tăng số lượng lên, không trùng thì thêm mặt hàng mới vào giỏ
        foreach ($_SESSION['cart'] as $product) { //duyệt mảng giỏ hàng
            if ($masp == $product->getMaSp()) { //kiểm tra trùng mã sp
                $soluong = $product->getSoluong() + 1; //cộng 1 số lượng rồi set lại số lượng cho đối tượng đó
                $product->setSoluong($soluong);
                $flag = 1; //bật biến cờ lên 1 để không thêm mới sản phẩm này vào giỏ nữa
                break;
            }
        }
        if ($flag == 0) { //nếu biến cờ lúc này vẫn là 0 thì thêm mới
            array_push($_SESSION['cart'], $productObj); //thêm mặt hàng vào giỏ
        }
    }
    $_SESSION['notify'] = "Đã thêm một sản phẩm vào giỏ hàng"; //lưu dòng thông báo để thông báo, sau khi thông báo thì xóa
    header("Location: ../view/laptop.php");
} else {
    header("Location: ../view/login.php");
}
