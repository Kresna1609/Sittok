<?php
require("koneksi.php");


session_start();
?>
<html lang="en">

<head>
<meta charset="utf-8">
    <title>SITTOK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href='assets/img/Sittok-png.png' rel='shortcut icon'>

    <!-- Favicon -->
    <link href="assets/assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet"> 

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="assets/css/style.css" rel="stylesheet">
</head>

<body>
<!-- Topbar Start -->
<div class="container-fluid" >
        <div class="row bg-secondary py-2 px-xl-5" style = " background-color: #e7d1ff;">
            <div class="col-lg-6 d-none d-lg-block" >
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="contact.php">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="contact.php">Help</a>
                </div>
            </div>
            <div class="col-lg-6 text-center text-lg-right">
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark px-2" href="https://wa.me/085235101051">
                        <i class="fab fa-whatsapp"></i>
                    </a>
                    <a class="text-dark px-2" href="https://instagram.com/rizki_komputer?igshid=OGQ2MjdiOTE=">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row align-items-center py-3 px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a href="index.php" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Sittok</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left" >
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary" style= "color: #5c0099" >
                                <i class="fa fa-search" style= "color: #5c0099"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-5 text-right" >
                        <a href="pesanansaya.php" class="nav-item active" style= "color: #5c0099">Pesanan Saya</a>
                        </a>
                        <a href="cart.php" class="btn border" style= "color: #5c0099">
                        <i class="fas fa-shopping-cart" style= "color : #3c096c" ></i>
                        </a>
            </div>
        </div>
    </div>
    <!-- Topbar End -->


    <!-- Navbar Start -->
    <div class="container-fluid mb-5">
        <div class="row border-top px-xl-5">
            <div class="col-lg-3 d-none d-lg-block">
                <a class="btn shadow-none d-flex align-items-center justify-content-between bg-primary text-white w-100" data-toggle="collapse" href="#navbar-vertical" style="height: 65px; margin-top: -1px; padding: 0 30px;">
                    <h6 class="m-0" href="#kategori">Categories</h6>
                    <i class="fa fa-angle-down text-dark"></i>
                </a>
                <nav class="collapse show navbar navbar-vertical navbar-light align-items-start p-0 border border-top-0 border-bottom-0" id="navbar-vertical">
                    <div class="navbar-nav w-100 overflow-hidden" style="height: 410px" >
                        <a href="shop.php?id_kategori=4" class="nav-item nav-link">Aksesoris</a>
                        <a href="shop.php?id_kategori=3" class="nav-item nav-link">Laptop</a>
                        <a href="shop.php?id_kategori=6" class="nav-item nav-link">Charger</a>
                        <a href="shop.php?id_kategori=7" class="nav-item nav-link">LCD</a>
                        <a href="shop.php?id_kategori=8" class="nav-item nav-link">Motherboard</a>
                        <a href="shop.php?id_kategori=9" class="nav-item nav-link">CPU</a>
                        <a href="shop.php?id_kategori=10" class="nav-item nav-link">Monitor</a>
                        <a href="shop.php?id_kategori=11" class="nav-item nav-link">Power Supply</a>
                        <a href="shop.php?id_kategori=12" class="nav-item nav-link">RAM</a>
                        <a href="shop.php?id_kategori=13" class="nav-item nav-link">Printer</a>
                    </div>
                </nav>
            </div>
            <div class="col-lg-9">
                <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0">
                    <a href="" class="text-decoration-none d-block d-lg-none">
                        <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Sittok</h1>
                    </a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto py-0">
                            <a href="index.php" class="nav-item nav-link active">Home</a>
                            <a href="shop.php?id_kategori=0" class="nav-item nav-link">Shop</a>
                            <a href="contact.php" class="nav-item nav-link">Contact</a>
                        </div>
                        <div class="navbar-nav ml-auto py-0">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <?php
                                if (isset($_SESSION['id'])) {
                                    $id = $_SESSION['id'];
                                    $userName = $_SESSION['user_fullname'];
                                    $level = $_SESSION['level'];
                                ?>
                                <img class="img-profile rounded-circle"src="img/undraw_profile.svg">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userName; ?></span>
                                <?php
                                }else{
                                ?>
                                    <a href="login.php" class="nav-item nav-link">Login</a>
                                    <a href="register.php" class="nav-item nav-link">Register</a>
                                <!-- <span class="mr-2 d-none d-lg-inline text-gray-600 small">Username</span> -->
                                <?php
                                }
                                ?>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <div class="dropdown-divider"></div>
                                <a href="logout.php" onclick="return confirm('Apakah anda yakin ingin keluar dari halaman ini?')" 
                                    class="dropdown-item">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>Logout</a>
                            </div>
                        </div>
                    </div>
                </nav>
                <div id="header-carousel" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active" style="height: 410px;">
                            <img class="img-fluid" src="assets/img/andy-holmes-EOAKUQcsFIU-unsplash.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Diskon 10% bagi pelanggan pertama</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">SITTOK</h3>
                                    <a href="shop.php?id_kategori=0" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                        <div class="carousel-item" style="height: 410px;">
                            <img class="img-fluid" src="assets/img/alienware-Hpaq-kBcYHk-unsplash.jpg" alt="Image">
                            <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                                <div class="p-3" style="max-width: 700px;">
                                    <h4 class="text-light text-uppercase font-weight-medium mb-3">Belanja Hemat Kantong Sehat</h4>
                                    <h3 class="display-4 text-white font-weight-semi-bold mb-4">Reasonable Price</h3>
                                    <a href="shop.php?id_kategori=0" class="btn btn-light py-2 px-3">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-prev-icon mb-n2"></span>
                        </div>
                    </a>
                    <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                        <div class="btn btn-dark" style="width: 45px; height: 45px;">
                            <span class="carousel-control-next-icon mb-n2"></span>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->