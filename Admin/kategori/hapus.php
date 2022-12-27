<?php
require('koneksi.php');
$id = $_GET['id_kategori'];
mysqli_query($koneksi, "DELETE FROM kategori WHERE id_kategori='$id'") or die(mysql_error());
header("location: list.php")
?>