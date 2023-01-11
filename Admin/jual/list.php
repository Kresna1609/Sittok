<!DOCTYPE html>

<?php
require('../koneksi.php');

session_start();

if (isset($_POST['status_pesanan'])) {

  $no_pesanan = $_POST['no_pesanan'];
  $no_pesanan = filter_var($no_pesanan, FILTER_SANITIZE_STRING);

  $status_pesanan = $_POST['status_pesanan'];
  $status_pesanan = filter_var($status_pesanan, FILTER_SANITIZE_STRING);

  $message[] = 'status diperbarui';
}

if (isset($_POST['update_status'])) {
  $cek = $_POST['status_pesanan'];
  $no_pesanan = $_POST['no_pesanan'];
  // var_dump($cek);
  // var_dump($id_jual_barang);
  $up = mysqli_query($koneksi,"UPDATE jual_barang SET status_pesanan = '$cek' WHERE no_pesanan = '$no_pesanan'");
  
}

?>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link href="img/logo/logo.png" rel="icon">
  <title>SITTOK</title>
  <link href="../assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="../assets/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body id="page-top">
  <div id="wrapper">
    <!-- Sidebar -->
    <!-- Sidebar -->
    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
        <!-- TopBar -->
        <nav class="navbar navbar-expand navbar-light bg-navbar topbar mb-4 static-top">
          <button id="sidebarToggleTop" class="btn btn-link rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-search fa-fw"></i>
              </a>
              <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                <form class="navbar-search">
                  <div class="input-group">
                    <input type="text" class="form-control bg-light border-1 small" placeholder="What do you want to look for?" aria-label="Search" aria-describedby="basic-addon2" style="border-color: #3f51b5;">
                    <div class="input-group-append">
                      <button class="btn btn-primary" type="button">
                        <i class="fas fa-search fa-sm"></i>
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img class="img-profile rounded-circle" src="../assets/img/boy.png" style="max-width: 60px">
                <?php
                if (isset($_SESSION['id'])) {
                  $id = $_SESSION['id'];
                  $userName = $_SESSION['user_fullname'];
                  $level = $_SESSION['level'];
                ?>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $userName; ?></span>
                <?php
                } else {
                ?>
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small"> Admin</span>
                <?php
                }
                ?>
              </a>
            </li>
          </ul>
        </nav>
        <!-- Topbar -->

        <!-- Container Fluid-->
        <div class="container-fluid" id="container-wrapper">
          <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Data Jual</h1>
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="./">Home</a></li>
              <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
            </ol>
          </div>

          <!-- <Form Basic> -->
          <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data Jual</h6>
                </div>
                <div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal Jual</th>
                          <th>Id Barang</th>
                          <th>No Pesanan</th>
                          <th>Id Customer</th>
                          <th>Total Harga</th>
                          <th>Status Pesanan</th>
                          <th>Bukti Pembayaran</th>
                          <th>Hapus</th>
                        </tr>
                      </thead>
                      <tbody>
                        <form action="" method="post">
                          <?php
                          $query = "SELECT * FROM jual_barang";
                          $result = mysqli_query($koneksi, $query);


                          while ($row = mysqli_fetch_array($result)) {
                            $id_jual_barang = $row['id_jual_barang'];
                            $tgl_jual = $row['tgl_jual'];
                            $id_barang = $row['id_barang'];
                            $id_customer = $row['id'];
                            $total_harga = $row['total_harga'];
                            $status_pesanan = $row['status_pesanan'];
                            $bukti_pembayaran = $row['bukti_pembayaran'];
                            $no_pesanan = $row['no_pesanan'];

                          ?>
                            <tr>
                              <td><?php echo $id_jual_barang; ?></td>
                              <td><?php echo $tgl_jual; ?></td>
                              <td><?php echo $id_barang; ?></td>
                              <td><?php echo $no_pesanan; ?></td>
                              <td><?php echo $id_customer; ?></td>
                              <td><?php echo $total_harga; ?></td>
                              <td>
                                <input type="hidden" name="no_pesanan" value="<?php echo $row['no_pesanan']; ?>">
                                <select name="status_pesanan" class="drop-down-order">
                                  <option value="<?php echo $status_pesanan; ?>" selected disabled><?php echo $status_pesanan; ?></option>
                                  <option value="Diproses">Diproses</option>
                                  <option value="Dikemas">Dikemas</option>
                                  <option value="Dikirim">Dikirim</option>
                                </select>
                              </td>
                              <td>
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalView<?php echo $no_pesanan;?>">
                                        Lihat
                                        </button>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModalView<?php echo $no_pesanan;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Bukti pembayaran</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                            <img style="border:1px; border-color:#444444;" width="300px" src="../../assets/img/buktitf/<?php echo $bukti_pembayaran; ?>">
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                            </div>
                                            </div>
                                        </div>
                                        </div>
                                </td>
                              <td>
                                <div class="flex-btn">
                                  <input type="submit" value="update" class="btn-order" name="update_status">
                                </div>
                                <a onclick="return confirm('Anda Yakin Ingin Menghapus Y/N')" href="hapus.php?id_jual_barang=<?php echo $row['id_jual_barang'] ?>" class="btn btn-danger btn-circle"><i class="fas fa-trash"></i></a>
                              </td>

                            </tr>
                          <?php
                          }
                          ?>
                        </form>
                      </tbody>
                    </table>

                  </div>
                </div>
              </div>
              <!-- <Form Basic> -->
            </div>
          </div>
        </div>

        <!-- Scroll to top -->
        <a class="scroll-to-top rounded" href="#page-top">
          <i class="fas fa-angle-up"></i>
        </a>

        <script src="../assets/vendor/jquery/jquery.min.js"></script>
        <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="../assets/js/ruang-admin.min.js"></script>
        <script src="../assets/vendor/chart.js/Chart.min.js"></script>
        <script src="../assets/js/demo/chart-area-demo.js"></script>
</body>

</html>