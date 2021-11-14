<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Website to sell laptop">
    <meta name="keywords" content="laptop, atlaptop">
    <meta name="author" content="Trugtie, NguyetTrann">
    <title>ATLAPTOP</title>
    <link rel="icon" href="./images/icon.PNG">
    <link rel="stylesheet" href="../css/adminstyle.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <header>
        <nav class="nav">
            <a href="#" class="logo">
                <img src="./images/logo.png" alt="">
            </a>
            <div class="clock">
                <div class="name">TRUGTIE</div>
                <div class="time">20 : 30 pm</div>
                <div class="date">06/11/2021</div>
            </div>
            <div class="ul">
                <ul class="nav-list">
                    <li class="nav-item">
                        <a href="./admin.php">TỔNG QUAN</a>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            <i class="fa-solid fa-laptop"></i>
                                            QUẢN LÝ SẢN PHẨM<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="info"><a href="#"><i class="fa-solid fa-pen-to-square"></i>XEM THÔNG TIN</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM LAPTOP</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM PHỤ KIỆN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingTwo">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            <i class="fa-solid fa-user-group"></i>QUẢN LÝ KHÁCH HÀNG<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="info"><a href="#"><i class="fa-solid fa-pen-to-square"></i>XEM THÔNG TIN</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM LAPTOP</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM PHỤ KIỆN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingThree">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            <i class="fa-solid fa-cart-shopping"></i>QUẢN LÝ ĐƠN HÀNG<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="info"><a href="#"><i class="fa-solid fa-pen-to-square"></i>XEM THÔNG TIN</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM LAPTOP</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM PHỤ KIỆN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingFour">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                                            <i class="fa-solid fa-gifts"></i>QUẢN LÝ KHUYẾN MÃI<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingFour" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="info"><a href="#"><i class="fa-solid fa-pen-to-square"></i>XEM THÔNG TIN</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM LAPTOP</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM PHỤ KIỆN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingFive">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                            <i class="fa-solid fa-comment"></i>QUẢN LÝ FEEDBACK<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseFive" class="collapse" aria-labelledby="headingFive" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="info"><a href="#"><i class="fa-solid fa-pen-to-square"></i>XEM THÔNG TIN</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM LAPTOP</a></div>
                                        <div class="info"><a href="#"><i class="fa-solid fa-plus"></i>THÊM PHỤ KIỆN</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="Exit"><button class="btnExit"> ĐĂNG XUẤT</button></div>
        </nav>

    </header>
    <section>
        <div class="container d-flex flex-column justify-content-around">
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
                        <td class="action">
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
                        <td class="action">
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
                        <td class="action">
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
                        <td class="action">
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
                        <td class="action">
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
</body>

</html>