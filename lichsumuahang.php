<?php include "./view/header.php" ?>
<section class="giohang">
    <div class="container">
        <h1 class="cateHeader text-center event__header animate-top" id="categories__work">LỊCH SỬ MUA HÀNG</h1>
        <table class="table .table-striped">
            <thead>
                <tr>
                    <th scope="col" class="madh">Mã đơn hàng</th>
                    <th scope="col" class="ngaytao">Ngày tạo</th>
                    <th scope="col" class="nguoinhan">Người nhận</th>
                    <th scope="col" class="sdt">Sđt</th>
                    <th scope="col" class="tinhtrang">Tình trạng</th>
                    <th scope="col" class="diachi">Địa chỉ giao</th>
                    <th scope="col" class="makhuyenmai">Mã KM</th>
                    <th scope="col" class="xemdonhang"></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">01</th>
                    <td>12/7/2021</td>
                    <td>Lê Ngọc</td>
                    <td>0984962514 </td>
                    <td>
                        Đang giao
                    </td>
                    <td>180 Cao Lỗ, Phường 4, Quận 8, HCM</td>
                    <td>
                        SPPTELCO11
                    </td>
                    <td>
                        <a href="chitietdonhang.php" class="xem">Xem</a>
                    </td>
                </tr>
                
            </tbody>
        </table>
        
    </div>
</section>
<?php include "./view/footer.php" ?>