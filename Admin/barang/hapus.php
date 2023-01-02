<?php
require('../koneksi.php');
$id = $_GET['id_barang'];
$sql= "DELETE FROM barang WHERE id_barang='$id'";
$result = mysqli_query($koneksi, $sql);
header("location:list.php");
?>