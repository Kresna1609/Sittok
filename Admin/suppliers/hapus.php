<?php
require('../koneksi.php');
$id = $_GET['id_supplier'];
$sql= "DELETE FROM supplier WHERE id_supplier='$id'";
$result = mysqli_query($koneksi, $sql);
header("location:list.php");
?>