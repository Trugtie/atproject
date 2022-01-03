<?php
include "../../controller/autoload.php";
include '../../dao/OrderDAO.php';
include '../../dao/ProductDAO.php';
if (isset($_GET['action'])) {
    switch ($_GET['action']) {
        case "xoa":
            $madon = $_GET['madon']; //lấy mã đơn khi ấn nút xóa
            OrderDAO::deleteOrder($madon, $conn); //xóa đơn dựa vào mã đơn
            header("Location: ../view/quanlydonhang.php");
            break;
        case "duyet":
            session_start();
            $madon = $_GET['madon']; //lấy mã đơn
            $maad=$_SESSION['admin']->get_maad(); //lấy mã ad đang đăng nhập
            $details = OrderDAO::getDetailsOrder($madon, $conn); //lấy các dòng chi tiết đơn
            //dam bao rang buoc ad nao duyet don hang nao
            OrderDAO::adminBrowseOrder($madon,$maad, $conn);
            //cap nhat tinh trang don hang
            OrderDAO::browseOrder($madon, $conn);
            //duyet cac dong chi tiet don hang de cap nhat csdl
            foreach ($details as $detail) {
                $product = ProductDAO::getProduct($detail['masp'], $conn); //lấy sản phẩm dựa vào mã sp của dòng chi tiết
                $soLuongMoi = $product['soluong'] - $detail['soluong']; //tính lại số lượng mới
                if ($soLuongMoi == 0) { //nếu số lượng mới = 0 thì set lại tình trạng là hết hàng và không show lên bán
                    ProductDAO::updateSoLuongSP($detail['masp'], $soLuongMoi, "Hết hàng", $conn);
                    if ($detail['loaisp'] == "laptop") //nếu loại sản phẩm là laptop thì thực hiện update ở bảng laptop, dòn if else này để đảm bảo ràng buộc trong database
                        ProductDAO::updateSoLuongLaptop($detail['masp'], $soLuongMoi, "Hết hàng", $conn);
                    else //bảng phụ kiện
                        ProductDAO::updateSoLuongPhukien($detail['masp'], $soLuongMoi, "Hết hàng", $conn);
                } else { //nếu số lượng khác 0 thì chỉ cập nhật lại số lượng, các dòng dưới tương tự
                    ProductDAO::updateSoLuongSP($detail['masp'], $soLuongMoi, "Còn hàng", $conn);
                    if ($detail['loaisp'] == "laptop")
                        ProductDAO::updateSoLuongLaptop($detail['masp'], $soLuongMoi, "Còn hàng", $conn);
                    else
                        ProductDAO::updateSoLuongPhukien($detail['masp'], $soLuongMoi, "Còn hàng", $conn);
                }
            }
            header("Location: ../view/quanlydonhang.php");
            break;
    }
}
