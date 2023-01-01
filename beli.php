<?php
require('koneksi.php');
session_start();
//mendapatkan produk dari url
$id_barang= $_GET['id'];

//jika sudah ada produk itu di keranjang, maka jumlahnya di +1
if(isset($_SESSION['cart'][$id_barang]))
{
    $_SESSION['cart']['id_barang']+=1;
}

//jika blm ada di keranjang, maka dianggap beli 1
else
{
    $_SESSION['cart'][$id_barang]=1;
}

//larikan ke halaman keranjang
echo "<script>alert('produk dimasukkan keranjang')</script>";
echo "<script>location='cart.php';</script";
?>