<!DOCTYPE html>
<?php
require('koneksi.php');
if (isset($_GET['id_barang']) && isset($_GET['jumlah'])) {

    $id_barang=$_GET['id_barang'];
    $jumlah=$_GET['jumlah'];


    $sql =$koneksi->query("SELECT * FROM barang WHERE id_barang = '$id_barang'");
    $data = $sql->fetch_array();
    $id_barang=$data['id_barang'];
    $merk_barang=$data['merk_barang'];
    $harga=$data['harga'];

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
    if(!empty($_SESSION["keranjang"])) {
        echo $merk_barang;
        if(in_array($data['id_barang'],array_keys($_SESSION["keranjang"]))) {
            foreach($_SESSION["keranjang"] as $k => $v) {
                if($data['id_barang'] == $k) {
                    $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"],$itemArray);
                }
            }
        } else {
            $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"],$itemArray);
        }
    } else {
        $_SESSION["keranjang"] = $itemArray;
    }
    break;
    //Fungsi untuk menghapus item dalam cart
    case "hapus":

        if(!empty($_SESSION["keranjang"])) {
            foreach($_SESSION["keranjang"] as $k => $v) {
                    if($_GET["id_barang"] == $k)
                        unset($_SESSION["keranjang"][$k]);
                    if(empty($_SESSION["keranjang"]))
                        unset($_SESSION["keranjang"]);
            }
        }
    break;

    case "update":
        $itemArray = array($id_barang=>array('id_barang'=>$id_barang,'merk_barang'=>$merk_barang,'jumlah'=>$jumlah,'harga'=>$harga));
        if(!empty($_SESSION["keranjang"])) {
            foreach($_SESSION["keranjang"] as $k => $v) {
                if($_GET["id_barang"] == $k)
                $_SESSION["keranjang"] = array_merge($_SESSION["keranjang"],$itemArray);
            }
        }
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
                        $total_berat=0;
                        if(!empty($_SESSION["keranjang"])):
                        foreach ($_SESSION["keranjang"] as $item):
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

                                    <input type="number" min="1" value="<?php echo $item["jumlah"]; ?>" class="form-control" id="jumlah<?php echo $no; ?>" name="jumlah[]" >

                                <script>
                    $("#jumlah<?php echo $no; ?>").bind('change', function () {
                        var jumlah<?php echo $no; ?>=$("#jumlah<?php echo $no; ?>").val();
                        $("#jumlah<?php echo $no; ?>").val(jumlah<?php echo $no; ?>);
                    });
                    $("#jumlah<?php echo $no; ?>").keydown(function(event) { 
                        return false;
                    });
                    
                </script>
                            </td>
                            <td class="align-middle"><?php echo $sub_total;?></td>
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
                            <h6 class="font-weight-medium">Rp. <?php echo $total;?> </h6>
                        </div>
                        <div class="card-body">
                        <div class="d-flex justify-content-between mb-3 pt-1">
                            <h6 class="font-weight-medium">Gratis Ongkir</h6>
                            <h6 class="font-weight-medium">Rp. 0 </h6>
                        </div>
                        <button class="btn btn-block btn-primary my-3 py-3">Proceed To Checkout</button>
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

</html>