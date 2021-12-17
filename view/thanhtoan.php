<?php include "./header.php" ?>
<section class="buy">
    <div class="container">
        <h1 class="cateHeader text-center event__header animate-top" id="categories__work">THANH TOÁN</h1>
        <div class="row gx-5">
            <div class="col-5 animate-left">
                <h3>Người nhận: </h3>
                <input type="text" value="<?php echo $_SESSION['user']->get_ho()." ".$_SESSION['user']->get_ten(); ?>">
                <h3>SĐT: </h3>
                <input type="text" value="<?php echo $_SESSION['user']->get_sdt();?>" >
                <h3>Địa chỉ:</h3>
                <input type="text" class="input--diachi" value="<?php echo $_SESSION['user']->get_diachi();?>">
                <!-- <div class="locate d-flex justify-content-between">
                    <div class="phuong">
                        <h3>Phường</h3>
                        <select class="cboSanPham" name="phuong" id="">
                            <option value="Phường 1">
                                Phường 1
                            </option>
                            <option value="Phường 1">
                                Phường 2
                            </option>
                        </select>
                    </div>
                    <div class="quan">
                        <h3>Quận: </h3>
                        <select class="cboSanPham" name="quan" id="">
                            <option value="Quận 1">
                                Quận 1
                            </option>
                            <option value="Quận 2">
                                Quận 2
                            </option>
                        </select>
                    </div>
                </div> -->
                <h3>Phương thức thanh toán</h3>
                <select name="phuongthuc" class="cboSanPham" id="">
                    <option value="banking">Internet Banking</option>
                    <option value="tructiep">
                        Thanh toán trực tiếp
                    </option>
                </select>
                <h3>Mã khuyến mãi: </h3>
                <div class="position-relative">
                    <input type="text" class="input--khuyenmai">
                    <a href="#" class="makm">Áp dụng</a>
                </div>
                <div class="d-flex justify-content-end">
                    <a href="./giohang.php" class="chontiep">Quay lại giỏ</a>
                    <a href="" class="thanhtoan">Đặt hàng</a>
                </div>
            </div>
            <div class="col-1"></div>
            <div class="col-6 animate-right donhang">
                <h2 class="text-center">ĐƠN HÀNG</h2>
                <div class="tablewrap">
                    <table>
                        <thead>
                            <tr>
                                <th>Sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $tong = 0?>
                            <?php foreach ($_SESSION['cart'] as $product): ?>
                            <tr>
                                <td><?php echo $product->getTenSp(); ?></td>
                                <td><?php echo $product->getSoluong(); ?></td>
                                <td><?php echo number_format($product->getGia(),0,",",".")." VND"; ?></td>
                            </tr>
                            <?php $tong += $product->getSoluong()*$product->getGia(); ?>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>

                <hr>
                <div class="tongtien">
                    <div class="tong d-flex justify-content-around">
                        <h3>Tổng tiền</h3>
                        <p><?php echo number_format($tong,0,",",".")." VND";; ?></p>
                    </div>
                    <div class="giam d-flex justify-content-around">
                        <h3>Giảm</h3>
                        <p>0 VND</p>
                    </div>
                </div>
                <hr>
                <div class="thanhtien">
                    <div class="tong d-flex justify-content-around">
                        <h3>Thành tiền</h3>
                        <p>10.000.000</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php include "./footer.php" ?>