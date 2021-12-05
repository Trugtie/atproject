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
                    <th scope="col" class="ma">Mã đơn</th>
                    <th scope="col" class="ngaytao">Ngày tạo</th>
                    <th scope="col" class="nguoinhan">Người nhận</th>
                    <th scope="col" class="sdt">SĐT</th>
                    <th scope="col" class="diachi">Địa chỉ</th>
                    <th scope="col" class="sanpham">Sản phẩm</th>
                    <th scope="col" class="soluong">Số lượng</th>
                    <th scope="col" class="tonggia">Tổng giá</th>
                    <th scope="col" class="tinhtrang">Tình trạng</th>
                    <th scope="col" class="action">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td>19/5/2021</td>
                    <td>Nguyễn Văn A</td>
                    <td>091234567</td>
                    <td>19 Đồng khởi </td>
                    <td>laptop1</td>
                    <td>3</td>
                    <td>20000 vnđ</td>
                    <td>chưa giao</td>
                    <td class="action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Xong</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
            </tbody>
        </table>
    </div>
</section>
<?php include './music.php'?>
<?php include "./adminfooter.php" ?>