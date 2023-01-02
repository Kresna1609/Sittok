<!DOCTYPE html>
<?php
require('koneksi.php');

if (isset($_GET['id_barang']) && isset($_GET['jumlah'])) {

    $id_barang=$_GET['id_barang'];
    $jumlah=$_GET['jumlah'];

    $sql= "SELECT * FROM barang WHERE id_barang='$id_barang'";

    $query = mysqli_query($koneksi,$sql);
    $shop = mysqli_fetch_array($query);
    $id_barang=$shop['id_barang'];
    $merk_barang=$shop['merk_barang'];
    $harga=$shop['harga'];

}else {
    $id_barang="";
    $jumlah=0;
}


if (isset($_GET['aksi'])) {
    $aksi=$_GET['aksi'];
}else {
    $aksi="";
}


switch($aksi){  
    //Fungsi untuk menambah penyewaan kedalam cart
    case "tambah_produk":
    $itemArray = array($id_barang=>array('id_barang'=>$id_barang,'merk_barang'=>$merk_barang,'jumlah'=>$jumlah,'harga'=>$harga));
    if(!empty($_SESSION["keranjang_belanja"])) {
        if(in_array($shop['id_barang'],array_keys($_SESSION["keranjang_belanja"]))) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($shop['id_barang'] == $k) {
                    $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
        }
    } else {
        $_SESSION["keranjang_belanja"] = $itemArray;
    }
    break;

    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang_belanja"])) {
            foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                if($_GET["id_barang"] == $k)
                    unset($_SESSION["keranjang_belanja"][$k]);
                if(empty($_SESSION["keranjang_belanja"]))
                    unset($_SESSION["keranjang_belanja"]);
            }
        }
        break;
    
        case "update":
            $itemArray = array($id_barang=>array('id_barang'=>$id_barang,'merk_barang'=>$merk_barang,'jumlah'=>$jumlah,'harga'=>$harga));
            if(!empty($_SESSION["keranjang_belanja"])) {
                foreach($_SESSION["keranjang_belanja"] as $k => $v) {
                    if($_GET["id_barang"] == $k)
                        $_SESSION["keranjang_belanja"] = array_merge($_SESSION["keranjang_belanja"],$itemArray);
                }}
        break;
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
    <?php
    include ('header.php');
    ?>
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
                    <tbody class="align-middle">
                    <?php
                        $no=0;
                        $sub_total=0;
                        $total=0;

                        if(!empty($_SESSION["keranjang_belanja"])):
                            foreach ($_SESSION["keranjang_belanja"] as $item):
                                $no++;
                                $sub_total = $item["jumlah"]*$item['harga'];
                                $total+=$sub_total;
                                ?>
        <input type="hidden" name="id_barang[]" value="<?php echo $item["id_barang"]; ?>">
                        <tr>
                            <td class="align-middle"><?php echo $no; ?></td>
                            <td class="align-middle"> <?php echo $item['merk_barang']; ?> </td>
                            <td class="align-middle"><?php echo $item['harga']; ?></td>
                            <td class="align-middle">
                                <div class="input-group quantity mx-auto" style="width: 100px;">
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-minus" >
                                        <i class="fa fa-minus"></i>
                                        </button>
                                    </div>
                                    <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]" >
                                    <div class="input-group-btn">
                                        <button class="btn btn-sm btn-primary btn-plus">
                                            <i class="fa fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                <script>
                    $("#jumlah<?php echo $no; ?>").bind('change', function () {
                        var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                        $("#jumlaha<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                    });
                    $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                        return false;
                    });
                    
                </script>
                            </td>
                            <td class="align-middle"><?php $sub_total;?></td>
                            <td>
                            <form method="get">
                        <input type="hidden" name="id_barang"  value="<?php echo $item['id_barang']; ?>" class="form-control">
                        <input type="hidden" name="merk_barang"  value="update" class="form-control">
                        <input type="hidden" name="jumlah" value="<?php echo $item["jumlah"]; ?>" id="jumlah<?php echo $no; ?>" value="" class="form-control">
                        <input type="submit" class="btn btn-warning btn-xs" value="Update">
                    </form>
                    <a href="cart.php?id=<?php echo $item['id_barang']; ?>&aksi=hapus" class="btn btn-danger btn-xs" role="button">Delete</a>
                            </td>
                        </tr>
                        <?php 
            endforeach;
            endif;
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
                            <h6 class="font-weight-medium">Rp. <?php echo number_format($total,0,',','.');?> </h6>
                        </div>
                        <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Gratis Ongkir</h6>
                            <h6 class="font-weight-medium">Rp. 0 </h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card border-secondary mb-5">
                    <div class="card-header bg-secondary border-0">
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
                        <button class="btn btn-lg btn-block btn-primary font-weight-bold my-3 py-3">Checkout</button>
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

</html>