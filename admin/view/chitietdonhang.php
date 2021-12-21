<?php include "./adminheader.php" ?>
<?php include("./adminnav.php") ?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">QUẢN LÝ ĐƠN HÀNG</h1>
        </div>
        <div class="controller d-flex">
            <select name="cboSanPham" id="" class="cboSanPham">
                <option value="tangdan">Tăng dần</option>
                <option value="giamdan">Giảm dần</option>
            </select>
            <div class="search">
                <input type="text" placeholder="Search...">
                <button type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
            </div>
        </div>
        <table class="table .table-striped">
            <thead>
                <tr>
                    <th scope="col" class="sanpham">Sản phẩm</th>
                    <th scope="col" class="tinhtrang">Số lượng</th>
                    <th scope="col" class="tonggia">Giá</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td style="height: 75px;">laptop1</td>
                    <td style="height: 75px;">3</td>
                    <td style="height: 75px;">20000 vnđ</td>
                </tr>
                <tr>
                    <td style="height: 75px;">laptop1</td>
                    <td style="height: 75px;">3</td>
                    <td style="height: 75px;">20000 vnđ</td>
                </tr>
                <tr>
                    <td style="height: 75px;">laptop1</td>
                    <td style="height: 75px;">3</td>
                    <td style="height: 75px;">20000 vnđ</td>
                </tr>
            </tbody>
        </table>
    </div>
</section>
<?php include './music.php'?>
<?php include "./adminfooter.php" ?>