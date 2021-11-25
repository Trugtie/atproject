<?php include "./adminheader.php" ?>
<?php include("./adminnav.php") ?>
<section>
    <div class="container d-flex flex-column justify-content-around">
        <div class="btnNav" id="btnNav">
            <i class="fa-solid fa-bars"></i>
        </div>
        <div class="text-center mb-5">
            <h1 class="title">THÊM SẢN PHẨM PHỤ KIỆN</h1>
        </div>
        <div class="table .table-striped">
            <div class="col-md-8 border-right" >  
                <form action="addproductController.php" method="POST">                    
                    <div class="row1">
                        <div class="col-sm-9 left-row" >
                            <label style="font-size:20px;">Hình</label>
                            <div class="pic" style="width: 290px; height: 237px; border: 1px solid;"> <img name="image" src="" alt> </div>
                            <input style="margin-top: 10px; font-size:16px" name="loadfileimg" type="file" id="myFile" name="filename">
                            <br>
                            <label style="font-size:20px;margin-top: 7px">Hãng</label><br>
                            <select  style="font-size:16px; width: 290px" class="form-select" aria-label="Default select example">
                            <option selected></option>
                            <option value="1">Dell</option>
                            <option value="2">Asus</option>
                            <option value="3">HP</option>
                            </select>
                           
                        </div>
                        <div class="col-sm-9 right-row" style="float:left">
                            <label style="font-size:20px;margin-top: 15px;margin-bottom: 7px">Mã sản phẩm</label>
                            <input type="text" style="margin-top: 10px; font-size:20px; width: 200px; float:right" name="masp"><br>
                            <label style="font-size:20px;margin-top: 15px">Loại sản phẩm</label>
                            <input type="text" style="margin-top: 10px; font-size:20px; width: 200px; float:right" name="loaisp" value="Phụ kiện">
                            <label style="font-size:20px;margin-top: 15px">Tên sản phẩm</label><br>
                            <input type="text" style="margin-top: 10px; font-size:20px; width: 345px" name="tensp"><br>
                            <label style="font-size:20px;margin-top: 15px">Mô tả</label><br>
                            <textarea style="margin-top: 10px; font-size:20px; width: 345px; height:135px" name="mota"></textarea><br>
                            <div class="subsub0" style="margin-bottom:-10px">
                                <div class="subsub1">
                                <label style="font-size:20px;margin-top: 7px">Số lượng</label><br>
                                <input type="text" style="margin-top: 10px; font-size:20px; width: 125px" name="soluong">                        
                                </div>
                                <div class="subsub2">
                                <label style="font-size:20px;margin-top: 7px">Giá</label><br>
                                <input type="text" style="margin-top: 10px; font-size:20px; width: 200px" name="gia">                        
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    <div class="btn-add">
                        <button  id="btn-add" type="button" name="btnsaveadd" id="">ADD</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
<div class="music">
    <iframe class="iframe" src="https://www.youtube.com/embed/pPtY0rm3HhY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
</div>
<?php include "./adminfooter.php" ?>