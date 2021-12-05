<?php include "./adminheader.php" ?>
<?php include("./adminnav.php") ?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">SỬA THÔNG TIN KHÁCH HÀNG</h1>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <table class="table .table-striped" style="border: 0;">
                <tr>
                    <th>Mã</th>
                    <th><input class="form-control" id="editth" type="text" disabled name="makh" value="1"></th>
                </tr>
                <tr>
                    <th>Họ</th>
                    <th><input class="form-control" type="text" id="editth" name="ho" value="Nguyễn"></th>
                </tr>
                <tr>
                    <th>Tên</th>
                    <th><input class="form-control" type="text" id="editth" name="ten" value="Văn A"></th>
                </tr>
                <tr>
                    <th>Sđt</th>
                    <th><input class="form-control" type="text" id="editth" name="sdt" value="0123456987"></th>
                </tr>
                <tr>
                    <th>Địa chỉ</th>
                    <th><input class="form-control" type="text" id="editth" name="diachi" value="19 Đồng khởi	"></th>
                </tr>
                <tr>
                    <th>Email</th>
                    <th><input class="form-control" type="text" id="editth" disabled name="email" value="vana@gmail.com"></th>
                </tr>

                <tr>
                    <th>Username</th>
                    <th><input class="form-control" type="text" id="editth" disabled name="username" value="nguyenvana"></th>
                </tr>
                <tr>
                    <th>Password</th>
                    <th><input class="form-control" type="text" id="editth" disabled name="password" value="sajkiqwjdaskmzxp"></th>
                </tr>
                <tr>
                    <th colspan="2" >
                        <div class="mt-5 text-center" style="text-align: center;"><button name="" class="btn btn-primary" id="btn-luu"  type="submit">Lưu</button></div>

                    </th>
                </tr>

            </table>

        </div>


    </div>
</section>
<?php include './music.php' ?>
<?php include "./adminfooter.php" ?>