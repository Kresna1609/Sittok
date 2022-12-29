<?php
require('../koneksi.php');
$id = $_GET['id_kategori'];
$sql= "DELETE FROM kategori WHERE id_kategori='$id'";
$result = mysqli_query($koneksi, $sql);
header("location:list.php");
?>