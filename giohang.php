<?php include "./view/header.php" ?>
<section class="giohang">
    <div class="container">
        <h1 class="cateHeader text-center event__header animate-top" id="categories__work">GIỎ HÀNG CỦA BẠN</h1>
        <table class="table .table-striped">
            <thead>
                <tr>
                    <th scope="col" class="ma">Mã SP</th>
                    <th scope="col" class="hinh">Hình</th>
                    <th scope="col" class="ten">Tên sản phẩm</th>
                    <th scope="col" class="gia">Giá</th>
                    <th scope="col" class="sl">Số lượng</th>
                    <th scope="col" class="thanhtien">Thành tiền</th>
                    <th scope="col" class="hanhdong">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="./images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>
                        <div><a href="" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                        <input type="text" value="2" class="input__soluong">
                        <div class="">
                            <a href="" class="minus"><i class="fa-solid fa-circle-minus"></i></a>
                        </div>
                    </td>
                    <td>40.000.000</td>
                    <td>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="./images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>
                        <div><a href="" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                        <input type="text" value="2" class="input__soluong">
                        <div class="">
                            <a href="" class="minus"><i class="fa-solid fa-circle-minus"></i></a>
                        </div>
                    </td>
                    <td>40.000.000</td>
                    <td>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="./images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>
                        <div><a href="" class="plus"><i class="fa-solid fa-circle-plus"></i></a>
                        </div>
                        <input type="text" value="2" class="input__soluong">
                        <div class="">
                            <a href="" class="minus"><i class="fa-solid fa-circle-minus"></i></a>
                        </div>
                    </td>
                    <td>40.000.000</td>
                    <td>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr class="tongtientitle">
                    <th scope="col" colspan="6">Tổng tiền:</th>
                    <th scope="col" class="tongtien">12.000.000</th>
                </tr>
            </tbody>
        </table>
        <div class="d-flex justify-content-end">
        <a href="./laptop.php" class="chontiep">Chọn tiếp</a>
        <a href="./thanhtoan.php" class="thanhtoan">Thanh toán</a>
        </div>
    </div>
</section>
<?php include "./view/footer.php" ?>