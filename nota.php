<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<body style="padding: 0 20;">
    <div>
        <?php 
        include "koneksi.php";
        session_start();
        $idUser   =  $_SESSION['user_fullname'];
        $email =  $_SESSION['user_email'];
        $no_pesanan = $_GET['resi'];
        $select = mysqli_query($koneksi,"SELECT * FROM jual_barang JOIN barang ON jual_barang.id_barang = barang.id_barang WHERE no_pesanan= '$no_pesanan'");
        $select2 = mysqli_query($koneksi, "SELECT * FROM jual_barang WHERE no_pesanan = '$no_pesanan'");
        $data1 = mysqli_fetch_array($select2);
        ?>
        <section class="content">
            <div class="row">
                <div>
                    <div class="span12">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <td><h2><strong>No. Pesanan </strong><?php echo $data1['no_pesanan']; ?> </h2></td>
                                </tr>
                                <tr>
                                    <td>Tanggal Pakai :</strong><?php echo $data1['tgl_jual']; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  Admin
                  <address>
                    <strong>SITTOK (Rizqi komputer)</strong><br>
                    Jl. Kalimantan No 3A Kav.8 Jember<br>
                    Kec. Sumbersari, Jember<br>
                    Jawa Timur<br>
                    Phone: 0852351051
                </address>
            </div>
            <!-- /.col -->
            <div class="col-sm-4 invoice-col">
              Customer
              <address>
                <strong><?php echo $idUser; ?></strong><br>
                <?php echo $data1['alamat']; ?><br>
                Phone: <?php echo $data1['nohp']; ?><br>
                Email: <?php echo $email; ?>
            </address>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 table-responsive">
          <table class="table table-striped">
            <thead>
                <tr>
                  <th>No.</th>
                  <th>Nama menu</th>
                  <th>harga</th>
                  <th>qty</th>
                  <th>sub total harga</th>
              </tr>
          </thead>
          <tbody>
            <?php 
            $no=1;
            $grand_total = 0;
            while($data = mysqli_fetch_array($select)){
                ?>
                <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data['merk_barang']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $data['qty']; ?></td>
                    <td><?php echo $sub_total = ($data['harga'] * $data['qty']);?></td>
                </tr>
                <?php 
                $grand_total += $sub_total;
            } 
            ?>
            <tr>
                <td colspan="3"></td>
                <td><b>Total Harga</b></td>
                <td><b><?php echo $grand_total; ?></b></td>
            </tr>

        </tbody>
    </table>
</div>
</section>
</div>
</body>
<script>
  window.print()
</script>