<?php include "./adminheader.php" ?>
<?php include("./adminnav.php") ?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">QUẢN LÝ SẢN PHẨM</h1>
        </div>
        <div class="controller d-flex">
            <input type="submit" value="Thêm" class="btnThem">
            <select name="cboSanPham" id="" class="cboSanPham">
                <option value="Laptop">LAPTOP</option>
                <option value="Phukien">PHỤ KIỆN</option>
            </select>
            <div class="search">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <table class="table .table-striped">
            <thead>
                <tr>
                    <th scope="col" class="ma">Mã SP</th>
                    <th scope="col" class="hinh">Hình</th>
                    <th scope="col" class="ten">Tên sản phẩm</th>
                    <th scope="col" class="gia">Giá</th>
                    <th scope="col" class="sl">Số lượng</th>
                    <th scope="col" class="tinhtrang">Tình trạng</th>
                    <th scope="col" class="hanhdong">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="../images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>10</td>
                    <td>Còn hàng</td>
                    <td class="action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Sửa</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="../images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>10</td>
                    <td>Còn hàng</td>
                    <td class="action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Sửa</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="../images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>10</td>
                    <td>Còn hàng</td>
                    <td class="action action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Sửa</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="../images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>10</td>
                    <td>Còn hàng</td>
                    <td class="action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Sửa</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="../images/lap1.jpg" alt=""></td>
                    <td>Laptop Lenovo
                        Ideapad Gaming 3
                        15IMH05
                        81Y400X0VN</td>
                    <td>20.000.000 </td>
                    <td>10</td>
                    <td>Còn hàng</td>
                    <td class="action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Sửa</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<div class="music">
    <iframe class="iframe" src="https://www.youtube.com/embed/pPtY0rm3HhY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php include "./adminfooter.php" ?>