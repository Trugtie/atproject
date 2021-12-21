<?php
include "../../controller/autoload.php";
include "../../dao/DonHangDAO.php";
$donhangs = DonHangDAO::getAlldonhang($conn);
?>

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
                    <th scope="col" class="diachigiao">Địa chỉ</th>
                    <th scope="col" class="giamgia">% Giảm giá</th>
                    <th scope="col" class="tonggia">Tổng giá</th>
                    <th scope="col" class="tinhtrang">Tình trạng</th>
                    <th scope="col" class="action">Hành động</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($donhangs as $donhang) : ?>
                    <?php $makm = $donhang['makm'];
                    $km = DonHangDAO::getGiamGia($makm, $conn); ?>

                    <tr>
                        <th scope="row"><?php echo $donhang['madon'] ?></th>
                        <td><?php echo $donhang['ngaytao'] ?></td>
                        <td><?php echo $donhang['nguoinhan'] ?></td>
                        <td><?php echo $donhang['sdt'] ?></td>
                        <td><?php echo $donhang['diachigiao'] ?></td>
                        <td><?php echo $km['giatrigiam'] ?></td>
                        <td><?php echo $donhang['tonggia'] ?></td>
                        <td><?php echo $donhang['tinhtrang'] ?></td>
                        <td class="action d-flex justify-content-around align-items-center">
                            <a href="#" class="sua">Xong</a>
                            <a href="./chitietdonhang.php" class="sua" style="background-color: #41F2F2;">Xem</a>
                            <a href="" class="xoa">Xóa</a>
                        </td>
                    <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<?php include './music.php' ?>
<?php include "./adminfooter.php" ?>