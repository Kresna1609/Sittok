<!DOCTYPE html>
<html lang="en">

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

    if(isset($_SESSION['id'])){
    $id = $_SESSION['id'];
    }else{
    $user_id = '';
    header('location:login.php');
    };


    if (isset($_POST['add_img'])) {

    $iid = $_POST['id'];
    $iid = filter_var($iid, FILTER_SANITIZE_STRING);

    $image = $_FILES['img']['name'];
    $image = filter_var($image, FILTER_SANITIZE_STRING);
    $image_size = $_FILES['img']['size'];
    $image_tmp_name = $_FILES['img']['tmp_name'];
    $image_folder = 'admin_img/' . $image;

    if (!empty($image)) {
        if ($image_size > 2000000) {
            $message[] = 'ukuran gambar terlalu besar';
        } else {
            $update_image = $conn->prepare("UPDATE `orders` SET proof_payment = ? WHERE id = ?");
            $update_image->execute([$image, $iid]);
            move_uploaded_file($image_tmp_name, $image_folder);         
            $message[] = 'gambar berhasil diperbarui!';
        }
    }
    }

    ?>


<div class="heading">
   <h3>order</h3>
</div>

<section class="jual_barang">

   <h3 class="title">Pesanan Anda </h3>

   <div class="box-container">   
   <?php
      if($id == ''){
         echo '<p class="empty">silahkan login untuk melihat pesanan Anda</p>';
      }else{
         $select_jual_barang = $koneksi->prepare("SELECT * FROM `jual_barang` WHERE id = ? ORDER BY id DESC");
    
         if($select_jual_barang == 0){
            while($fetch_jual_barang = $select_orders->fetch(PDO::FETCH_ASSOC)){
               $stat=$fetch_jual_barang["status_pesanan"];

            if ($stat == "Diterima") {
               $nota = "<button>Cetak nota</button>";
            }else{
               $nota = "";
            }
   ?>

<div class="box">
   <table>      
         <tr>
            <td>Status Pesanan</td>
            <td>:</td>
            <td><span style="color:<?php if($fetch_jual_barang['status_pesanan'] == 'Diproses'){ echo 'red'; }else{ echo 'green'; }; ?>"><?= $fetch_orders['status_pesanan']; ?></span></td>
         </tr>
      </table>      
   </div>
    <!-- Page Header Start -->
    <div class="coba">
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px; background-color: #e7d1ff;" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Checkout</h1>
            <p class="m-0" style="text-color: black"><b><a href="">Home</a></b></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Our Shop>>></p>
            </div>
        </div>
    </div>
    <?php
      }
      }else{
         echo '<p class="empty">tidak ada pesanan!</p>';
      }
      }
   ?>
    <!-- Page Header End -->

    

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