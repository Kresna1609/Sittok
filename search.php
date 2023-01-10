<!DOCTYPE html>
<?php
require('koneksi.php');
?>
<div class="col-lg-6 col-6 text-left">

<?php
$no = 1;
//tampilkan data barang
$query = mysqli_query($koneksi, "SELECT * FROM barang");
while ($dt =mysqli_fetch_assoc ($query)) {

?>
                <form method="get" action="">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for products">
                        <div class="input-group-append">
                            <span class="input-group-text bg-transparent text-primary">
                                <i class="fa fa-search"></i>
                                <?php
} ?>
                            </span>
                        </div>
                    </div>
                </form>
            </div>