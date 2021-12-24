<?php include "./header.php" ?>
<?php include "../dao/OrderDAO.php" ?>
<?php include "../dao/SaleDAO.php" ?>
<?php
$history = OrderDAO::getOrder($_GET['madon'], $conn);
$details = OrderDAO::getDetailsOrder($_GET['madon'], $conn);
?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">THÔNG TIN PHẢN HỒI</h1>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <form action="../controller/feedbackController.php" method="post">
                <div class="add-fb">
                    <label hidden style="font-size:20px;margin-top: 15px;margin-bottom: 7px">Mã feedback</label>
                    <input type="text" style="margin-top: 10px; font-size:20px; width: 200px; float:right" name="mafb" hidden><br>
                    <div class="title-fb">
                        Phản hồi:
                    </div>
                    
                    <div class="content-fb">
                        <input class="form-control" style="width:110rem; height:7rem; font-size: 16px;" type="text" name="mota" placeholder="Điền phản hồi">
                    </div>
                </div>
                <table class="table .table-striped">
                    <thead>
                        <tr>
                            <th scope="col" class="ma">Mã SP</th>
                            <th scope="col" class="hinh">Hình</th>
                            <th scope="col" class="ten">Tên sản phẩm</th>
                            <th scope="col" class="gia">Giá</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $tong = 0; ?>
                        <?php foreach ($details as $i => $product) : ?>
                            <tr>                                
                                <?php 
                                $_SESSION["sp"] = $product['masp'];
                                ?>
                                <th scope="row"><?php echo  $product['masp'] ?></th>
                                <td><img src="../admin/view<?php echo $product['hinh'] ?>" alt=""></td>
                                <td><?php echo $product['tensp'] ?></td>
                                <td><?php echo  number_format($product['gia'], 0, ",", ".") . " VND" ?> </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <div class="add-fb">
                    <div class="btn-sendfb">
                        <button type="submit" class="btnGui" name="action" value="addFeedback">Gửi</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
<?php include "./footer.php" ?>