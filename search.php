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
 <form method="GET" action="search.php" >
  <label>Kata Pencarian : </label>
  <input type="text" name="kata_cari" value="<?php if(isset($_GET['kata_cari'])) { echo $_GET['kata_cari']; } ?>"  />
  <button type="submit">Cari</button>
 </form>
 <br/>
 <table border="1">
  <tbody>
   <?php
   //untuk menyambungkan dengan file koneksi.php
   include('koneksi.php');

    //jika kita klik cari, maka yang tampil query cari ini
    if(isset($_GET['kata_cari'])) {
     //menampung variabel kata_cari dari form pencarian
     $kata_cari = $_GET['kata_cari'];

     //mencari data dengan menggunakan query
     $query = "SELECT * FROM barang WHERE merk_barang like '%".$kata_cari."%' ORDER BY id_barang ASC";
    } else {
     //jika tidak ada pencarian, default yang dijalankan query ini
     $query = "SELECT * FROM barang ORDER BY id_barang ASC";
    }
    

    $result = mysqli_query($koneksi, $query);

    if(!$result) {
     die("Query Error : ".mysqli_errno($koneksi)." - ".mysqli_error($koneksi));
    }
    //kalau ini melakukan foreach atau perulangan
    while ($row = mysqli_fetch_assoc($result)) {
   ?>
   <?php
   }
   ?>

  </tbody>
 </table>
</body>
</html>