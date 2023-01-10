<!DOCTYPE html>
<?php
session_start();
require('koneksi.php');
$id = $_SESSION['id'];
$idkategori=$_GET['id_kategori'];
if(isset($_POST['add_to_cart'])){
    $id_barang = $_POST['id_barang'];
    $merk_barang = $_POST['merk_barang'];
    $harga = $_POST['harga'];
    $gambar = $_POST['gambar'];
    $qty = 1;

    $shop = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE merk_barang = '$merk_barang' AND id = '$id'");
    $cek = mysqli_num_rows($shop);

    if($cek > 0){
     $message[] = 'Sudah ditambakan ke keranjang!';
     echo "<script>alert('Sudah ditambakan ke keranjang!')</script>";
   }else{
     $insert_keranjang = mysqli_query($koneksi,"INSERT INTO keranjang VALUES (NULL, '$id', '$id_barang', '$merk_barang', '$qty', '$harga', '$gambar')");
     $message[] = 'Ditambakan ke keranjang!';
     echo "<script>alert('Ditambakan ke keranjang!')</script>";}
   }
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
                                <i class="fa fa-search"></i>
                            </span>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-lg-3 col-6 text-right">
                <a href="cart.php" class="btn border">
                    <<a href="cart.php" class="fas fa-shopping-cart text-primary" ></i>
                    <span class="badge"></span>
                </a>
            </div>
        </div>
    </div>
    <!-- Page Header Start -->
    <div class="coba">
    <div class="container-fluid bg-secondary mb-5" style= "background-color: #e7d1ff;">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px; background-color: #e7d1ff;" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Sittok</h1>
            <p class="m-0" style="text-color: black"><b><a href="index.php">Home</a></b></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Our Shop</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Shop Start -->
    <div class="container-fluid">
            <!-- Shop Product Start -->
            <div class="col-lg-12 col-md-12">
                <div class="row pb-3">
                    <?php
                    if($idkategori == 0){
                        $sql =$koneksi->query("SELECT * FROM barang"); 
                       
                            while($shop = $sql->fetch_array()){
                                ?>
                                

                                <div class="col-lg-2 col-md-6 col-sm-6 pb-1">
                                <div class="card product-item border-0 mb-4">
                                    <div class="card-header product-img position-relative overflow-hidden bg-transparent border p-0">
                                        <img class="img-fluid w-65" src="admin/assets/img/barang/<?php echo $shop['gambar']; ?>" width="300px" height="300px">
                                    </div>
                                    <div class="card-body border-left border-right text-center p-0 pt-4 pb-3">
                                        <h6 class="text-truncate mb-3"><?=$shop['merk_barang']?></h6>
                                        <div class="d-flex justify-content-center">
                                            <h6><?=$shop['harga']?></h6><h6 class="text-muted ml-2"></h6>
                                        </div>
                                    </div>
                                    <div class="card-footer d-flex justify-content-between bg-light border">
                                        <a href="detail.php?id=<?php echo $shop['id_barang']; ?>" class="btn btn-sm text-dark p-0"><i class="fas fa-eye text-primary mr-1"></i>View Detail</a>
                                        <?php
                                            if(isset($_SESSION['id'])) {
                                        ?>
                                        <form action="" method="POST">
                                    <input type="hidden" name="id_barang" value="<?php echo $shop['id_barang'] ?>">
                                    <input type="hidden" name="merk_barang" value="<?php echo $shop['merk_barang'] ?>">
                                    <input type="hidden" name="harga" value="<?php echo $shop['harga'] ?>">
                                    <input type="hidden" name="gambar" value="<?php echo $shop['gambar'] ?>">
                                        <a href="cart.php" class="btn btn-sm text-dark p-0"><button type="submit" name="add_to_cart"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</button></a>
                                        </form>
                                        <?php }else{ ?>
                                        <a onclick="return confirm('Silahkan Login Terlebih Dahulu')" href="login.php" class="btn btn-sm text-dark p-0"><i class="fas fa-shopping-cart text-primary mr-1"></i>Add To Cart</a>
                                        
                                        
                                        <?php } ?>
                                    </div>
                                </div>
                                </div>

                           <?php     
                    }}else{
                    $sql =$koneksi->query("SELECT * FROM barang WHERE id_kategori='$id'"); 
                    
                        while($shop = $sql->fetch_array()){
                    ?>

                    <div class="col-lg-4 col-md-6 col-sm-12 pb-1">
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
                        }}
                    ?>
                </div>
            <!-- Shop Product End -->
    </div>
    <!-- Shop End -->


    <!-- Footer Start -->
    <?php
        include 'footer.php';
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>