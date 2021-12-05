<?php include "./adminheader.php" ?>
<?php include("./adminnav.php") ?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">QUẢN LÝ KHUYẾN MÃI</h1>
        </div>
        <div class="controller d-flex">
            <input type="submit" value="Thêm" class="btnThem">
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
                    <th scope="col" class="ma">Mã đợt</th>
                    <th scope="col" class="hinh">Hình</th>
                    <th scope="col" class="ten">Tên đợt</th>
                    <th scope="col" class="mota">Mô tả</th>
                    <th scope="col" class="giatrigiam">Giá trị giảm</th>
                    <th scope="col" class="ngaybd">Ngày bắt đầu</th>
                    <th scope="col" class="ngaykt">Ngày kết thúc</th>
                    <th scope="col" class="action">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th scope="row">1</th>
                    <td><img src="../../images/schoolsale.PNG" alt=""></td>
                    <td>Back to School</td>
                    <td>Big sale for student</td>
                    <td>20%</td>
                    <td>19/4/2021</td>
                    <td>19/5/2021</td>
                    <td class="action d-flex justify-content-around align-items-center">
                        <a href="#" class="sua">Sửa</a>
                        <a href="" class="xoa">Xóa</a>
                    </td>
            </tbody>
        </table>
    </div>
</section>
<?php include './music.php'?>
<?php include "./adminfooter.php" ?>