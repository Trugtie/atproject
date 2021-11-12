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
    <link rel="stylesheet" href="./css/admidstyle.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
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
                        <a href="#">TỔNG QUAN</a>
                    </li>
                    <li class="nav-item">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <i class="fa-solid fa-laptop"></i>QUẢN LÝ SẢN PHẨM<i class="fa-solid fa-angle-down"></i>
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
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            <i class="fa-solid fa-user-group"></i>QUẢN LÝ KHÁCH HÀNG<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseTwo" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">
                                            <i class="fa-solid fa-cart-shopping"></i>QUẢN LÝ ĐƠN HÀNG<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseThree" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                            <i class="fa-solid fa-gifts"></i>QUẢN LÝ KHUYẾN MÃI<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>
                                <div id="collapseFour" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">
                                            <i class="fa-solid fa-comment"></i>QUẢN LÝ FEEDBACK<i class="fa-solid fa-angle-down"></i>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseFive" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
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
        <div class="container"></div>
        <div>
        <iframe class="iframe" src="https://www.youtube.com/embed/pPtY0rm3HhY" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
        </div>
    </header>
</body>

</html>