<?php
   include ('header.php');

   if(isset($_POST['checkout'])){

      $tgl_jual = date("Y-m-d");
      $alamat = $_POST['txt_alamat'];
      $nohp = $_POST['txt_nohp'];
      $harga = $_POST['harga'];
      $total_harga = $_POST['total_harga'];
      $qty = $_POST['qty'];
      $id_barang = $_POST['txt_id_barang'];
      $nama = $_POST['txt_nama'];

      $data = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id = '$id'");

   if($check_cart = mysqli_num_rows($data) > 0){
      foreach ($id_barang as $barang => $barangs) {
         $s_idbarang = $barangs;
         $s_harga = $harga[$barang];
         $s_qty = $qty[$barang];
         $s_total = $total_harga[$barang];

   $insert_order = mysqli_query($koneksi,"INSERT INTO jual_barang VALUES (NULL, '$tgl_jual', '$s_harga', '$s_qty', '$s_total', '$alamat', '$nohp', NULL, 'Belum Dibayar', '$id', '$s_idbarang', '$nama')");
   $delete_keranjang = mysqli_query($koneksi,"DELETE FROM keranjang WHERE id='$id'");

   $message[] = 'pesanan berhasil dilakukan!';
   echo "<script>alert('Pesanan berhasil dilakukan!')</script>";
   echo "<script>location='index.php'</script>";
   }
   }else{
   $message[] = 'keranjang Anda kosong';
   }

   }
?>
<!DOCTYPE html>
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
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Pesanan Saya</h1>
            <div class="d-inline-flex">
                <p class="m-0"><a href="">Home</a></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Pesanan Saya</p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->
      <div class="containeroner" style="margin-left: 100px; margin-right: 100px;">
      <form method="POST" action="checkout.php">
      <div class="m-4">
            <div>
              <h6 style="text-align: right;">Tanggal Pembelian : <?php echo date("d/m/Y") ?></h6>
            </div>   
         <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" class="form-control" id="" placeholder="" value="<?php echo $userName; ?>" disabled>
         </div>
         <div>                        
         <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th class="text-center" style="color: #384046;">No.</th>
                  <th class="text-center" style="color: #384046;">Menu</th>
                  <th class="text-center" style="color: #384046;">Harga</th>
                  <th class="text-center" style="color: #384046;">Jumlah</th>
                  <th class="text-center" style="color: #384046;">Total Harga</th>
                  <th class="text-center" style="color: #384046;">Bukti Pembayaran</th>
                  <th class="text-center" style="color: #384046;">Status Pesanan</th>
                  <th class="text-center" style="color: #384046;">Nota</th>
                </tr>
              </thead>                                    
              <tbody> 

                <?php

                $grand_total = 0;
                $cart_items[] = '';
                $select_cart = mysqli_query($koneksi,"SELECT * FROM keranjang WHERE id = '$id'");

                if(mysqli_num_rows($select_cart) > 0){

                  while($fetch_cart = mysqli_fetch_array($select_cart)){

                   $cart_items[] = $fetch_cart['merk_barang'].' ('.$fetch_cart['harga'].' x '. $fetch_cart['qty'].') + ';
                   $total_products = implode($cart_items);
                   $grand_total += ($fetch_cart['harga'] * $fetch_cart['qty']);

                   ?>
                   <tr>
                     <td class="text-center" style="color: #384046;">1</td>
                     
                     <td class="text-center" style="color: #384046;">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Lihat
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <img src="Admin/assets/img/barang/<?php echo $fetch_cart['gambar']; ?>" width="100px"><span style="margin-left: 10px;"><?php echo $fetch_cart['merk_barang']; ?></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                     <td class="text-center" style="color: #384046;"><?php echo ($fetch_cart['harga']); ?></td>
                     <td class="text-center" style="color: #384046;"><?php echo $fetch_cart['qty']; ?></td>
                     <td class="text-center" style="color: #384046;"><?php echo ($sub_total = ($fetch_cart['harga'] * $fetch_cart['qty'])); ?></td>
                     <td class="text-center" style="color: #384046;">
                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Lihat
                        </button>

                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                            <img src="Admin/assets/img/barang/<?php echo $fetch_cart['gambar']; ?>" width="100px"><span style="margin-left: 10px;"><?php echo $fetch_cart['merk_barang']; ?></span>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                            </div>
                        </div>
                        </div>
                    </td>
                    <td class="text-center" style="color: #384046;">Belum Diproses</td>
                    </tr>
                   <input type="hidden" name="txt_id_barang[]" value="<?= $fetch_cart['id_barang']; ?>">
                   <input type="hidden" name="harga[]" value="<?= $fetch_cart['harga']; ?>">
                   <input type="hidden" name="qty[]" value="<?= $fetch_cart['qty']; ?>">
                   <input type="hidden" name="total_harga[]" value="<?= $sub_total; ?>">
                   <?php
                     }
                     }else{
                     echo '<p class="empty">keranjang Anda kosong!</p>';
                  }
                  ?>                                     
                  </tbody>
                  <tfoot>
                  <tr>
                  
                  </tr>
                  </tfoot>
               </table>
            </div>
            </div>
         </div>         
      </form>
      </div>
    


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