
<?php
require('koneksi.php');
session_start();
if(isset($_POST['delete'])){
    $id_keranjang = $_POST['id_keranjang'];
    $delete_cart_item = mysqli_query($koneksi,"DELETE FROM keranjang WHERE id_keranjang='$id_keranjang'");
    $message[] = 'produk di keranjang dihapus!';
    echo "<script>alert('Produk di keranjang dihapus!')</script>";
}

if(isset($_POST['delete_all'])){
    $delete_cart_item = $koneksi->prepare("DELETE FROM `cart` WHERE id_user = ?");
    $delete_cart_item->execute([$user_id]);
  // header('location:cart.php');
    $message[] = 'dihapus semua produk di keranjang!';
}

if(isset($_POST['update_qty'])){
    $id_keranjang = $_POST['id_keranjang'];
    $qty = $_POST['qty'];
    $update_qty = mysqli_query($koneksi, "UPDATE keranjang SET qty = '$qty' WHERE id_keranjang ='$id_keranjang'");
    $message[] = 'jumlah produk di keranjang diperbarui';
    echo "<script>alert('Jumlah produk di keranjang diperbarui')</script>";
}

$grand_total = 0;
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

    <!-- Page Header Start -->
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px">
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Keranjang</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Shopping Cart</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Cart Start -->
    <div class="container-fluid pt-5">
        <div class="row px-xl-5">
            <div class="col-lg-8 table-responsive mb-5">
                <table class="table table-bordered text-center mb-0">
                    <thead class="bg-secondary text-dark">
                        <tr>
                            <th>No.</th>
                            <th>Merk barang</th>
                            <th>Harga</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody> 
                        <?php
                        $grand_total = 0;
                        $shop = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id_user = '$id'");
                        $cek = mysqli_num_rows($shop);
                        if($cek > 0){
                            while($fetch_cart = mysqli_fetch_array($shop)){
                                ?>                        
                                <tr>
                                    <form action="" method="post"> 
                                        <input type="hidden" name="id_keranjang" value="<?= $fetch_cart['id_keranjang']; ?>">                        
                                        <td class="text-center"> <?php echo "1"; ?> </td>
                                        <td class="text-center"> 
                                            <img width="100px" src="assets/img/menu/<?php echo $fetch_cart['gambar']; ?>" alt="">
                                            <br>
                                            <?php echo $fetch_cart['merk_barang']; ?>
                                        </td>
                                        <td class="text-center"><?php echo rupiah($fetch_cart['harga']); ?></td>
                                        <td class="text-center">
                                            <input type="number" name="qty" class="qty" min="1" max="99" value="<?= $fetch_cart['qty']; ?>" maxlength="2">
                                        </td>  
                                        <td class="text-center"> <?php echo rupiah($sub_total = ($fetch_cart['harga'] * $fetch_cart['qty'])); ?></td> 
                                        <td class="text-center">
                                            <button type="submit" class="bi bi-arrow-clockwise" name="update_qty"></button>
                                            <button type="submit" class="bi bi-trash" name="delete" onclick="return confirm('Apakah anda yakin akan menghapus menu ini?')" ></button>
                                        </td>
                                    </form>
                                    </tr>                        
                                <?php
                                $grand_total += $sub_total;
                            }
                        }else{
                            echo '<p>keranjang kosong</p>';
                        }
                        ?>
            </tbody>
                </table>
            </div>
            <div class="col-lg-4">
                <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
                        <h4 class="font-weight-semi-bold m-0">Checkout</h4>
                    </div>
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Total Pembayaran</h6>
                            <h6 class="font-weight-medium">Rp. <?php echo $total;?> </h6>
                        </div>
                        <div class="card-body">
                        <h4 class="font-weight-semi-bold m-0">Bukti Transfer Pembayaran</h4>
                        </div>
                        <div class="card-body">
                            <div class="buktitf">
                                <div class="custom-control custom-radio">
                                <input type="file" accept="image/*" width : 200px;/>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer border-secondary bg-transparent">
                            <button href="checkout.php" class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3" name="co" >Checkout</button>
                            
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart End -->


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
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>
?>