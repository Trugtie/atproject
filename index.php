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
    <link rel="stylesheet" href="./css/style.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- ScrollReveal -->
    <script src="https://unpkg.com/scrollreveal"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    
</head>

<body>
    <!-- Header -->
    <header>
        <svg class="header-svg" xmlns="http://www.w3.org/2000/svg" width="1920" height="160" viewBox="0 0 1920 160">
            <path id="Path_18" data-name="Path 18" d="M0,962.463V841.023s488.623,70.127,982.994-8.552S1920,854.707,1920,854.707V962.463Z" transform="translate(1920 962.463) rotate(180)" fill="#a3e0ff" />
        </svg>
        <div class="container">
            <nav class='nav'>
                <div class="logo">
                    <a href="./index.php">
                        <img src="./images/logo.png" alt="logo">
                    </a>
                </div>
                <ul class="snip1476">
                    <li class="current"><a href="#home" class="active">Home</a></li>
                    <li><a href="#">Laptop</a>
                    </li>
                    <li><a href="#">Phu kiện</a></li>
                    <li><a href="#">Sự kiện</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">About us</a></li>
                </ul>
                <div class="icon">
                    <div><a href=""><i class="fa-solid fa-cart-shopping fa-xl"></i></a></div>
                    <div> <a href=""><i class="fa-solid fa-bell fa-xl"></i></a></div>
                    <div class="user_dropdown"> <a href="#">
                            <i class="fa-solid fa-user fa-xl">
                                <i class="fa-solid fa-caret-down">
                                </i>
                            </i>
                        </a>
                        <ul class="user_dropdown_content">
                            <li><a href="">Thông tin tài khoản</a></li>
                            <li><a href="">Lịch sử mua hàng</a></li>
                            <li><a href="">Thoát</a></li>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>
    </header>
    <!-- Hero -->
    <section class="hero">
        <div class="container d-flex align-items-center justify-content-center hero__container">
            <div class="slogan">
                <h1 class="hero_header">Chào mừng bạn đến với website của ATLAPTOP</h1>
                <h4 class="hero_sub">Chúng tôi là cửa hàng chuyên cung cấp các loại laptop chính hãng, đáp ứng mọi cấu hình và nhu cầu sử dụng của bạn.</h4>
                <a href="#categories" class="btnHero">
                    Xem Ngay
                </a>
            </div>
            <div class="image">
                <img src="./images/laptop-mong-nhe-gia-re-1-removebg-preview.png" alt="">
            </div>
        </div>
    </section>

    <svg xmlns="http://www.w3.org/2000/svg" width="1920" height="183.039" viewBox="0 0 1919.931 183.039">
        <path id="Path_19" data-name="Path 19" d="M0,904.095s382.632,42.327,936.263,0,983.669,0,983.669,0v164.227H0Z" transform="translate(0 -885.283)" fill="#a3e0ff" />
    </svg>
    <!-- Cagories -->
    <section class="categories">
        <div class="container">
            <h1 class="cateHeader text-center" id="categories">DANH MỤC SẢN PHẨM</h1>
            <div class="row">
                <div class="col-4">
                    <div class="cateImage">
                        <div class="cateImage_overlay">
                            <h2 class="cateImage_title">HỌC TẬP <br> VĂN PHÒNG</h2>
                            <a href="#" class="cateImage_subtitle">
                                <i class="fa-solid fa-laptop-code"></i>
                                <h3 class="cateImage_subtitle_content">Xem ngay</h3>
                            </a>
                        </div>
                    </div>
                    <div class="cateContent">
                        <h2 class="cateContent_header">Phù hợp cho:</h2>
                        <p class="cateContent_header_description">
                            Học sinh, sinh viên
                            Nhân viên văn phòng
                        </p>
                        <h2 class="cateContent_header">Ưu điểm:</h2>
                        <p class="cateContent_header_description">
                            Đáp ứng nhu cầu làm việc và học tập, giải trí đơn giản
                            Video, audio, word, excel, power point, game nhẹ,....
                            Giá nhẹ
                        </p>
                        <button class="btnUp">
                            <i class="fa-solid fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="cateImage cateImage--2">
                        <div class="cateImage_overlay">
                            <h2 class="cateImage_title cateImage_title--2">ĐỒ HỌA <br> GAMING</h2>
                            <a href="#" class="cateImage_subtitle">
                                <i class="fa-solid fa-gamepad"></i>
                                <h3 class="cateImage_subtitle_content">Xem ngay</h3>
                            </a>
                        </div>
                    </div>
                    <div class="cateContent cateContent--2">
                        <h2 class="cateContent_header">Phù hợp cho:</h2>
                        <p class="cateContent_header_description">
                            Game thủ
                            Anh chị em thiết kế đồ họa

                        </p>
                        <h2 class="cateContent_header">Ưu điểm:</h2>
                        <p class="cateContent_header_description">
                            Đáp ứng nhu cầu làm việc và học tập, giải trí cao
                            Ps, Ai, Pr, Xd, Id, Blender, 3DMax, game cấu hình cao,....
                            Hỗ trợ card đồ họa
                        </p>
                        <button class="btnUp btnUp2">
                            <i class="fa-solid fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
                <div class="col-4">
                    <div class="cateImage cateImage--3">
                        <div class="cateImage_overlay">
                            <h2 class="cateImage_title cateImage_title--3">MỎNG NHẸ <br> CAO CẤP</h2>
                            <a href="#" class="cateImage_subtitle">
                                <i class="fa-brands fa-apple"></i>
                                <h3 class="cateImage_subtitle_content">Xem ngay</h3>
                            </a>
                        </div>
                    </div>
                    <div class="cateContent cateContent--3">
                        <h2 class="cateContent_header">Phù hợp cho:</h2>
                        <p class="cateContent_header_description">
                            Doanh nhân
                            Người đam mê công nghệ
                        </p>
                        <h2 class="cateContent_header">Ưu điểm:</h2>
                        <p class="cateContent_header_description">
                            Đáp ứng nhu cầu làm việc và học tập, giải trí, nghiên cứu
                            Đẳng cấp, sang trọng
                            Cấu hình khủng đáp ứng nhiều nhu cầu nghiên cứu công nghệ




                        </p>
                        <button class="btnUp btnUp3">
                            <i class="fa-solid fa-chevron-up"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Label -->
    <section class="label">
        <div class="container">
            <div class="customer-logos">
                <div class="slide"><img src="./images/AsusLogo.png"></div>
                <div class="slide"><img src="./images/hplogo.png"></div>
                <div class="slide"><img src="./images/macbooklogo.png"></div>
                <div class="slide"><img src="./images/delllogo.png"></div>
                <div class="slide"><img src="./images/acerlogo.png"></div>
            </div>

        </div>
    </section>
    <!-- Sale -->
    <section class="sale">
        <div class="container">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="./images/newsale.PNG" class="d-block w-100" alt=".newsale">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/schoolsale.PNG" class="d-block w-100" alt="schooclsale">
                    </div>
                    <div class="carousel-item">
                        <img src="./images/christmassale.PNG" class="d-block w-100" alt="chrimassale">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
    </section>
    <!-- Subsection 1 -->
    <section class="sub1">
        <div class="container container__subsection d-flex justify-content-center align-items-center text-center ">
            <h1 class="subsection__title"> HỌC TẬP <br> VĂN PHÒNG</h1>
        </div>
    </section>
    <!-- Showcase work-->
    <div class="container">
        
    </div>
</body>
<script src="./js/home.js"></script>

</html>