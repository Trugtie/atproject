<?php include "./adminheader.php" ?>
<?php include "./adminnav.php" ?>
<?php include "../../dao/OrderDAO.php" ?>
<?php include "../../dao/ProductDAO.php" ?>
<?php include "../../dao/UserDAO.php" ?>
<?php
$soLuongSpConLai = ProductDAO::getSoLuongSanPhamConLai($conn);
$soLuongSpDaBan = OrderDAO::getSoLuongSanPhamDaBan($conn);
$soLuongThanhVien = UserDAO::getSoLuongThanhVien($conn);
$soLuongDonChuaGiao = OrderDAO::getSoLuongDonHangChuaGiao($conn);
$doanhThu = OrderDAO::getDoanhThu($conn);
?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">TỔNG QUAN</h1>
        </div>
        <div class="row count flex-grow-1">
            <div class="count__product col-4">
                <h2 class="count__title">SỐ LƯỢNG SẢN PHẨM</h2>
                <div class="soluong">
                    Đã bán:
                    <?php
                    if (!empty($soLuongSpDaBan['soluong']))
                        echo $soLuongSpDaBan['soluong']. " sản phẩm";
                    else
                        echo "0 sản phẩm";
                    ?>
                </div>
                <div class="soluong">
                    Còn lại:
                    <?php
                    if (!empty($soLuongSpConLai['soluong']))
                        echo $soLuongSpConLai['soluong']. " sản phẩm";
                    else
                        echo "0 sản phẩm";
                    ?>
                </div>
            </div>
            <div class="count__member col-4">
                <h2 class="count__title">SỐ LƯỢNG THÀNH VIÊN</h2>
                <div class="soluong">
                    <?php
                    if (!empty($soLuongThanhVien['soluong']))
                        echo $soLuongThanhVien['soluong']." thành viên";
                    else
                        echo "0  thành viên";
                    ?>
                </div>
            </div>
            <div class="count__order col-4">
                <h2 class="count__title">SL ĐƠN CHƯA GIAO</h2>
                <div class="soluong">
                    <?php
                    if (!empty($soLuongDonChuaGiao['soluong']))
                        echo $soLuongDonChuaGiao['soluong']." đơn";
                    else
                        echo "0  đơn";
                    ?>
                </div>
            </div>
        </div>
        <div class="income row text-center mt-5">
            <h2 class="count__title">TỔNG DOANH THU</h2>
            <div class="soluong soluong--doanhthu">
                <?php
                if (!empty($doanhThu['doanhthu']))
                    echo number_format($doanhThu['doanhthu'],0,",",".")." VND";
                else
                    echo "0 VND";
                ?>
            </div>
        </div>
    </div>
</section>
<?php include './music.php' ?>
<?php include "./adminfooter.php" ?>