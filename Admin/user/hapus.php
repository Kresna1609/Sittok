<?php
require('../koneksi.php');
$id = $_GET['id'];
$sql= "DELETE FROM kategori WHERE id='$id'";
$result = mysqli_query($koneksi, $sql);
header("location:list.php");
?>