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
        <div class="table .table-striped">
        <div class="col-md-8 border-right">
            <div class="p-3 py-5">
                            
                <div class="row mt-3">
                    <div class="col-md-6">
                        <label style="font-size:20px;">Hình</label>
                        <div class="pic" style="width: 290px; height: 237px; background-color:white ;border: 1px solid;"> <img src="" alt> </div>
                        <input style="margin-top: 10px; font-size:16px" type="file" id="myFile" name="filename">
                        <label style="font-size:20px;margin-top: 7px">Hãng</label>
                        <select  style="font-size:16px;" class="form-select" aria-label="Default select example">
                        <option selected></option>
                        <option value="1">Dell</option>
                        <option value="2">Asus</option>
                        <option value="3">HP</option>
                        </select>
                        <label style="font-size:20px;margin-top: 7px">Hãng</label>
                        <input type="text" style="margin-top: 10px; font-size:20px; width: 220px" name="trongluong">
                        <label style="font-size:20px;margin-top: 7px">Màn hình</label>
                        <input type="text" style="margin-top: 10px; font-size:20px; width: 220px" name="manhinh">
                        <label style="font-size:20px;margin-top: 7px">Ổ cứng</label>
                        <input type="text" style="margin-top: 10px; font-size:20px; width: 220px" name="ocung">
                        <label style="font-size:20px;margin-top: 7px">CPU</label>
                        <input type="text" style="margin-top: 10px; font-size:20px; width: 220px" name="cpu">
                    
                    </div>
                    <div class="col-md-6" style="background-color: red; float:left">
                        <div class="row mt-3">
                        <label style="font-size:20px;margin-top: 7px">Mã sản phẩm</label>
                            <input type="text" style="margin-top: 10px; font-size:20px; width: 100px" name="masp">
                            <label style="font-size:20px;margin-top: 7px">Loại sản phẩm</label>
                            <input type="text" style="margin-top: 10px; font-size:20px; width: 100px" name="loaisp" value="Laptop">
                        </div>
                    </div>

                </div>
                
            </div>
        </div>
        </div>
    </div>
</section>
<div class="music">
    <iframe class="iframe" src="https://www.youtube.com/embed/pPtY0rm3HhY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php include "./adminfooter.php" ?>