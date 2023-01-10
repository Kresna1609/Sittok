<!DOCTYPE html>
<?php
require('koneksi.php');
?>

<html lang="en">

<head>
    <meta charset="utf-8">
    <title>SITTOK</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <link href='assets/img/Sittok-gambar.png' rel='shortcut icon'>

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
    <?php
    include ('header.php');
    ?>
    <!-- Featured Start -->
    <?php
    if(isset($_GET['page'])){
        $sqlmenu = $koneksi->query("SELECT * FROM barang");
        $vmenu = $sqlmenu-> fetch_array();
        if($vmenu[jumlah_barang]){
        }
        if($_GET['']=='detail'){
            include ('detail.php'); 
        }
        }
    
    ?>
    <div class="container-fluid pt-5">
        <div class="row px-xl-5 pb-3">
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-check text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">Quality Product</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-shipping-fast text-primary m-0 mr-2"></h1>
                    <h5 class="font-weight-semi-bold m-0">Free Shipping</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fas fa-exchange-alt text-primary m-0 mr-3"></h1>
                    <h5 class="font-weight-semi-bold m-0">14-Day Return</h5>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 pb-1">
                <div class="d-flex align-items-center border mb-4" style="padding: 30px;">
                    <h1 class="fa fa-phone-volume text-primary m-0 mr-3"></h1>
                    <a href="contact.php"> <h5 class="font-weight-semi-bold m-0">24/7 Support</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Featured End -->
    <!-- Categories Start -->
    <div class="container-fluid pt-5" style="padding: 30px; margin-top: -30px; margin-bottom: -30px;">
        <div class="row px-xl-5 pb-3" >
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 10px; width : 250px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="assets/img/laptop/laptop-asusdepan.jpg" alt="" >
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Laptop</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 10px; width : 250px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="assets/img/LCD/lcd-ultradepan.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">LCD</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 10px; width : 250px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="assets/img/keyboard/keyboard.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Keyboard</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 10px; width : 250px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="assets/img/fan/fandepan.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Fan</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 10px; width : 250px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="assets/img/charger/charger-asusdepan.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Charger</h5>
                </div>
            </div>
            <div class="col-lg-2 col-md-6 pb-1">
                <div class="cat-item d-flex flex-column border mb-4" style="padding: 10px; width : 250px;">
                    <a href="" class="cat-img position-relative overflow-hidden mb-3">
                        <img class="img-fluid" src="assets/img/Printer/printerdpn.jpg" alt="">
                    </a>
                    <h5 class="font-weight-semi-bold m-0">Printer</h5>
                </div>
            </div>
        </div>
    </div>
    <!-- Categories End -->


    <!-- Offer Start -->
    <div class="container-fluid offer pt-5">
        <div class="row px-xl-5">
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-right text-white mb-2 py-5 px-5">
                    <img src="img/offer-1.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">Sittok Collection</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Pilihan Laptop Unggulan</h1>
                        <a href="shop.php?id_kategori=0" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pb-4">
                <div class="position-relative bg-secondary text-center text-md-left text-white mb-2 py-5 px-5">
                    <img src="img/offer-2.png" alt="">
                    <div class="position-relative" style="z-index: 1;">
                        <h5 class="text-uppercase text-primary mb-3">Sittok Collection</h5>
                        <h1 class="mb-4 font-weight-semi-bold">Dapatkan Produk Murah</h1>
                        <a href="shop.php?id_kategori=0" class="btn btn-outline-primary py-md-2 px-md-3">Shop Now</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Offer End -->
    <div class="container-fluid">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <?php
                        $sql =$koneksi->query("SELECT * FROM barang"); 
                       
                            while($shop = $sql->fetch_array()){
                                ?>
                                <div class="col-lg-2 col-md-6 col-sm-12 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-100" src="admin/assets/img/barang/<?php echo $shop['gambar']; ?>" alt="">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3"><?=$shop['merk_barang']?></h6>
                                        <div class="d-flex justify-content-center">
                                            <h6><?=$shop['harga']?></h6><h6 class="text-muted ml-2"></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="detail.php?id=<?php echo $shop['id_barang']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                        <a href="cart.php?id_barang=<?php echo $shop['id_barang'];?>&aksi=tambah_produk&jumlah=1" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                    </div>
                                </div>
                                </div>    
                    

                    <?php
                        }
                    ?>
                </div>
            </div>
            <!-- Shop Product End -->
    </div>
    <!-- Shop End -->

    <!-- Vendor Start -->
    <div class="text-center mb-4" style="margin-top: 30px;">
            <h2 class="section-title px-5"><span class="px-2">Our Brands</span></h2>
    </div>
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="vendor-item border p-4">
                        <img src="assets/img/Asus.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/lenovo.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/Acer.gif" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/coolermaster.jpg" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/epson.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/logitech.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/ds.png" alt="">
                    </div>
                    <div class="vendor-item border p-4">
                        <img src="assets/img/robot.jpg" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->

    <?php
        include 'footer.php';
    ?>


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