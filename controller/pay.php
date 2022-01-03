<?php
include '../util/function.php';
include "../controller/autoload.php";
include '../dao/SaleDAO.php';
include '../dao/OrderDAO.php';
?>
<?php
session_start();
if (empty($_SESSION['cart'])) { //kiểm tra nếu giỏ hàng trống thì không cho thanh toán
    $_SESSION['error'] = "Giỏ hàng trống không thể thanh toán!";
    header("Location:../view/giohang.php"); //quay lịa trang giỏ hàng
} else {
    if (isset($_POST['action'])) {
        switch ($_POST['action']) {
            case "apdungkm": //các lệnh thực hiện chức năng tính tiền khuyến mãi
                if (!empty($_POST['makm'])) { //nếu khách hàng có nhập mã khuyến mãi thì chạy các lệnh này

                    $makm = $_POST['makm']; //lấy mã km
                    $today = date("d-m-Y"); //lấy ngày hiện tại, cái hàm date này sẽ trả về giá trị số giây đã trôi qua từ thời điểm 00:00:00 GMT Ngày 01 Tháng 01 , Năm 1970 tới thời điểm hiện tại
                    $km = SaleDAO::findSale($makm, $conn); // lấy data khuyến mãi khách hàng vừa nhập trong csdl để lấy cái ngày kết thúc của khuyến mãi này để xử lý
                    $ngaykt = $km['ngaykt']; // lấy cái ngày kết thúc
                    if ($km == false) {
                        $_SESSION['error'] = "Mã khuyến mãi không hợp lệ!"; //không lấy data báo lỗi này
                        header("Location:../view/thanhtoan.php");
                    } else if (strtotime($today) > strtotime($ngaykt)) { //kiểm tra cái ngày hiện tại với cái ngày kết thúc có quá hạn hay chưa
                        $_SESSION['error'] = "Khuyến mãi này đã hết hạn!"; //đã quá hạn thì báo lỗi này
                        header("Location:../view/thanhtoan.php");
                    } else {
                        $thanhtien = $_POST['thanhtien']; // lấy tổng tiền của đơn hàng
                        $giatrigiam = $km['giatrigiam'] / 100; //tính lại giá trị giảm bằng cách lấy giá trị giảm trong database rồi chia cho 100 
                        $tienkhuyenmai = $thanhtien * $giatrigiam; //tính tiền khuyến mãi, lấy tổng tiền nhân cho giá trị giảm
                        $_SESSION['km'] = $tienkhuyenmai; //lưu lại số tiền khuyến mãi để show lên cho khách thấy
                        $_SESSION['makm'] = $makm; //lưu lại cái mã để show lên
                        header("Location:../view/thanhtoan.php");
                    }
                } else {
                    header("Location:../view/thanhtoan.php");
                }
                break;
            case "dathang":
                $nguoinhan = $_POST['nguoinhan']; //lấy tên người nhận
                $sdt = $_POST['sdt']; //lấy sđt người nhận
                $diachi = $_POST['diachi']; // lấy địa chỉ người nhận
                $phuongthuc = $_POST['phuongthuc']; // lấy phương thức thanh toán
                if (isset($_POST['makm'])) //nếu có nhập mã khuyến mãi thì lấy 
                    $makm = $_POST['makm'];
                $tongtien = $_POST['thanhtien']; //lấy tổng tiền tính ra được
                $makh = $_SESSION['user']->get_makh(); // lấy mã kh từ biến user trong session
                //insert vào bảng đơn hàng theo 2 kieu co khuyen mai va khong co khuyen mai
                if (!empty($makm)) //có mã khuyến mãi
                    OrderDAO::insertOrder($nguoinhan, $sdt, $diachi, $phuongthuc, $makh, $makm, $tongtien, $conn);
                else //không có mã
                    OrderDAO::insertOrderWithoutSale($nguoinhan, $sdt, $diachi, $phuongthuc, $makh, $tongtien, $conn);
                //lay cai don hang vua insert vao csdl
                $newOrder = OrderDAO::getNewOrder($conn);
                $madon = $newOrder['madon']; //lấy mã đơn hàng vừa thêm để thêm các dòng chi tiết đơn hàng vào bảng donhang_sanpham
                foreach ($_SESSION['cart'] as $product) { //duyệt giỏ hàng để lấy các sản phẩm thêm vào
                    $thanhtien = $product->getSoLuong() * $product->getGia(); //tính cột thành tiền
                    OrderDAO::insertDetailOrder($product->getMaSp(), $madon, $product->getSoluong(), $thanhtien, $conn); //thêm vào bảng chi tiết đơn
                }
                $_SESSION['notify'] = "Đã dặt hàng thành công!"; //thông báo khi đặt hàng thành công

                //khúc này bắt đầu thực hiện send mail cho khách
                $contentEmail = '';
                // Thông tin Khách hàng
                $contentEmail = '<p>
                  <b>Khách hàng:</b> ' . $nguoinhan . '<br />
                  <b>Email:</b> ' . $_SESSION['user']->get_email() . '<br />
                  <b>Điện thoại:</b> ' . $sdt . '<br />
                  <b>Địa chỉ:</b> ' . $diachi . '
                  </p>';
                // Danh sách Sản phẩm đã mua
                $contentEmail .= ' <table border="1px" cellpadding="10px" cellspacing="1px"
                  width="100%">
                  <tr>
                  <td align="center" bgcolor="#3F3F3F" colspan="4"><font
                  color="white"><b>XÁC NHẬN HÓA ĐƠN THANH TOÁN</b></font></td>
                  </tr>
                  <tr id="invoice-bar">
                  <td width="45%"><b>Tên Sản phẩm</b></td>
                  <td width="20%"><b>Giá</b></td>
                  <td width="15%"><b>Số lượng</b></td>
                  <td width="20%"><b>Thành tiền</b></td>
                  </tr>';
                foreach ($_SESSION['cart'] as $product) {
                    $contentEmail .= '<tr>
                  <td class="prd-name">' . $product->getTenSp() . '</td>
                  <td class="prd-price"><font color="#C40000">' . $product->getGia() . '
                  VNĐ</font></td>
                  <td class="prd-number">' . $product->getSoluong() . '</td>
                  <td class="prd-total"><font color="#C40000">' . $product->getGia() * $product->getSoluong() . '
                  VNĐ</font></td>
                  </tr>';
                }
                $contentEmail .= '<tr>
                  <td class="prd-name">Tổng giá trị hóa đơn là:</td>
                  <td colspan="2"></td>
                  <td class="prd-total"><b><font color="#C40000">' . $tongtien . '
                  VNĐ</font></b></td>
                  </tr>
                  </table>';
                $contentEmail .= '<p align="justify">
                  <b>Quý khách đã đặt hàng thành công!</b><br />
                  • Sản phẩm của Quý khách sẽ được chuyển đến Địa chỉ có trong phần
                  Thông tin Khách hàng của chúng Tôi sau thời gian 2 đến 3 ngày, tính từ thời điểm này.<br
                  />
                  • Nhân viên giao hàng sẽ liên hệ với Quý khách qua Số Điện thoại trước
                  khi giao hàng 24 tiếng.<br />
                  <b><br />Cám ơn Quý khách đã sử dụng Sản phẩm của Công ty chúng
                  Tôi!</b>
                  </p>';

                sendmail("Bạn có 1 đơn hàng từ ATLAPTOP!", $contentEmail, $_SESSION['user']->get_email()); //hàm send mail

                unset($_SESSION['cart']); //xong hết rồi thì xóa cái giỏ trong session
                header("Location:../view/lichsumuahang.php");
                exit;
                break;
        }
    }
    header("Location:../view/thanhtoan.php");
}
