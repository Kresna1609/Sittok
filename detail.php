<?php
require('koneksi.php');
session_start();
$id = $_SESSION['id'];
if(isset($_POST['add_to_cart'])){
    $id_barang = $_POST['id_barang'];
    $merk_barang = $_POST['merk_barang'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gbr'];
    $qty = $_POST['qty'];

    $detail = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE merk_barang = '$merk_barang' AND id = '$id'");
    $cek = mysqli_num_rows($detail);

    if($cek > 0){
     $message[] = 'Sudah ditambakan ke keranjang!';
     echo "<script>alert('Sudah ditambahkan ke keranjang!')</script>";
   }else{
     $insert_keranjang = mysqli_query($koneksi,"INSERT INTO keranjang VALUES (NULL, '$id', '$id_barang', '$merk_barang', '$qty', '$harga', '$gambar')");
     $message[] = 'Ditambahkan ke keranjang!';
     echo "<script>alert('Ditambahkan ke keranjang!')</script>";}
   }
$id_barang = $_GET['id'];
$query = "SELECT * FROM barang WHERE id_barang = '$id_barang'";
$result = mysqli_query($koneksi, $query);
$detail = mysqli_fetch_array($result);
?>
<html lang="en">

<!DOCTYPE html>
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
<body>
<!-- Topbar Start -->
<div class="container-fluid" >
        <div class="row bg-secondary py-2 px-xl-5" style = " background-color: #e7d1ff;">
            <div class="col-lg-6 d-none d-lg-block" >
                <div class="d-inline-flex align-items-center">
                    <a class="text-dark" href="contact.php">FAQs</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="contact.php">Help</a>
                    <span class="text-muted px-2">|</span>
                    <a class="text-dark" href="contact.php">Support</a>
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
                <a href="" class="text-decoration-none">
                    <h1 class="m-0 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border px-3 mr-1">E</span>Sittok</h1>
                </a>
            </div>
            <div class="col-lg-6 col-6 text-left">
                <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search" style= "color : #3c096c"></i>
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
    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
    <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 100px; background-color: #e0aaff;" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Shop Detail</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="index.php">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shop Detail</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Detail Start -->
    <form action="" method="POST">
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col-lg-5">
            
                <!-- <div id="product-carousel" class="carousel slide" data-ride="carousel"> -->
                <img src="admin/assets/img/barang/<?php echo $detail['gambar']; ?>" alt="Image" width="500px" height="500px">
                <input type="hidden" name="gbr" value="<?php echo $detail['gambar'];?>">        
            </div>
            
            <input type="hidden" name="id_barang" value="<?php echo $detail['id_barang'];?>">
            <div class="col-lg-6 pb-5">
                <h3 class="font-weight-semi-bold"><?php echo $detail['merk_barang']; ?></h3>
                <input type="hidden" name="merk_barang" value="<?php echo $detail['merk_barang'];?>">
                <div class="d-flex mb-3">
                    <div class="text-primary mr-2">
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star"></small>
                        <small class="fas fa-star-half-alt"></small>
                        <small class="far fa-star"></small>
                    </div>
                    <small class="pt-1">(50 Reviews)</small>
                </div>
                <h4 class="font-weight-semi-bold mb-4"><?php echo $detail['harga']; ?></h4>
                <input type="hidden" name="harga" value="<?php echo $detail['harga'];?>">
                <p class="mb-4"><?php echo $detail['deskripsi']; ?></p>

               
                <div class="d-flex align-items-center mb-4 pt-2">
                    <div class="input-group quantity mr-2" style="width: 130px;">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-minus" >
                            <i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <input type="text" name="qty" class="form-control bg-secondary text-center" value="1">
                        <div class="input-group-btn">
                            <button class="btn btn-primary btn-plus">
                                <i class="fa fa-plus"></i>
                            </button>
                        </div>
                    </div>
                    <?php
                                            if(isset($_SESSION['id'])) {
                                        ?>
                                       
                     <a href="" class="btn btn-sm text-dark p-0"><button type="submit" name="add_to_cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button></a>
                
                     <?php }else{ ?>
                                        <a onclick="return confirm('Silahkan Login Terlebih Dahulu')">
                                        <?php } ?>
                                        </form>                       
                </div>
                <div class="d-flex pt-2">
                    <p class="text-dark font-weight-medium mb-0 mr-2">Share on:</p>
                    <div class="d-inline-flex">
                        <a class="text-dark px-2" href="facebook.com">
                            <i class="fab fa-facebook-f"></i>
                        </a>
                        <a class="text-dark px-2" href="twitter.com">
                            <i class="fab fa-twitter"></i>
                        </a>
                        <a class="text-dark px-2" href="linkedin.com">
                            <i class="fab fa-linkedin-in"></i>
                        </a>
                        <a class="text-dark px-2" href="pinterest.com">
                            <i class="fab fa-pinterest"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row px-xl-5">
            <div class="col">
                <div class="nav nav-tabs justify-content-center border-secondary mb-4">
                    <a class="nav-item nav-link active" data-toggle="tab" href="#tab-pane-1">Description</a>
                    <!-- <a class="nav-item nav-link" data-toggle="tab" href="#tab-pane-2">Information</a> -->
                </div>
                <div class="tab-content">
                    <div class="tab-pane fade show active" id="tab-pane-1">
                        <p class="mb-3"><?php echo $detail['deskripsi']; ?></p>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Shop Detail End -->

    <!-- Footer Start -->
    <footer>
<div class="container-fluid bg-secondary text-dark mt-5 pt-5">
        <div class="row px-xl-5 pt-5">
            <div class="col-lg-4 col-md-12 mb-5 pr-3 pr-xl-5">
                <a href="" class="text-decoration-none">
                    <h1 class="mb-4 display-5 font-weight-semi-bold"><span class="text-primary font-weight-bold border border-white px-3 mr-1">E</span>Sittok</h1>
                </a>
                <p>Sittok merupakan salah satu market place yang menjual berbagai macam produk elektronik. 
                    Sittok memudahkan para konsumen untuk mencari barang elektronik seperti laptop, 
                    komputer dan accescories lainnya.</p>
                <p class="mb-2"><i class="fa fa-map-marker-alt text-primary mr-3"></i>Jalan Kalimantan no 3a kav8 Jember</p>
                <!-- <p class="mb-2"><i class="fa fa-envelope text-primary mr-3"></i>@rizki_komputer</p> -->
                <p class="mb-0"><i class="fa fa-phone-alt text-primary mr-3"></i>0852 3510 1051</p>
            </div>
            <div class="col-lg-8 col-md-12">
                <div class="row">
                    <div class="col-md-4 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Quick Links</h5>
                        <div class="d-flex flex-column justify-content-start">
                            <a class="text-dark mb-2" href="index.php"><i class="fa fa-angle-right mr-2"></i>Home</a>
                            <a class="text-dark mb-2" href="shop.php"><i class="fa fa-angle-right mr-2"></i>Our Shop</a>
                            <a class="text-dark mb-2" href="detail.php"><i class="fa fa-angle-right mr-2"></i>Shop Detail</a>
                            <a class="text-dark mb-2" href="cart.php"><i class="fa fa-angle-right mr-2"></i>Shopping Cart</a>
                            <a class="text-dark mb-2" href="checkout.php"><i class="fa fa-angle-right mr-2"></i>Checkout</a>
                            <a class="text-dark" href="contact.php"><i class="fa fa-angle-right mr-2"></i>Contact Us</a>
                        </div>
                    </div>
                    <div class="col-md-8 mb-5">
                        <h5 class="font-weight-bold text-dark mb-4">Kritik & Saran</h5>
                        <form action="">
                            <div class="form-group">
                                <input type="email" class="form-control border-0 py-4" placeholder="Email Anda" required="required" />
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control border-0 py-4" placeholder="Pesan"
                                    required="required" />
                            </div>
                            <div>
                                <button class="btn btn-primary btn-block border-0 py-3" type="submit">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="row border-top border-light mx-xl-5 py-4">
            <div class="col-md-6 px-xl-0">
                <p class="mb-md-0 text-center text-md-left text-dark">
                    &copy; <a class="text-dark font-weight-semi-bold" href="#">Sittok.com</a>. All Rights Reserved. Designed
                    by
                    <a class="text-dark font-weight-semi-bold" href="https://htmlcodex.com">Tim WSI</a>
                </p>
            </div>
            <div class="col-md-6 px-xl-0 text-center text-md-right">
                <img class="img-fluid" src="img/payments.png" alt="">
            </div>
        </div>
</div>
</footer>
    <!-- Footer End -->



    

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>