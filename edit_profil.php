<?php
require('koneksi.php');

if(isset($_POST['update'])){
  $user = ($_POST['txt_nama']);
  $id = ($_POST['txt_id']);
  $email = ($_POST['txt_email']);
  $password = ($_POST['txt_password']);
  $alamat = ($_POST['txt_alamat']);

  $update=mysqli_query($koneksi,"UPDATE user SET user_fullname='$user', user_email='$email', user_password='$password', alamat='$alamat' WHERE id = '$id'");
  if($update){
    echo "<script>alert('Data di Update')</script>";
    echo "<script>location='list_user.php'</script>";
  }
}

$id_user = $_GET['id'];
$query = "SELECT * FROM user WHERE id = '$id_user'";
$result = mysqli_query($koneksi, $query);
$u = mysqli_fetch_array($result);
?>
<!DOCTYPE html>
<html lang="en">

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
    <?php
    include ('header.php');
    ?>
    <!-- Page Header Start -->
    <div class="coba">
    <div class="container-fluid bg-secondary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 300px; background-color: #e7d1ff;" >
            <h1 class="font-weight-semi-bold text-uppercase mb-3">Edit Profil</h1>
            <p class="m-0" style="text-color: black"><b><a href="">Home</a></b></p>
                <p class="m-0 px-2">-</p>
                <p class="m-0">Our Shop>>></p>
            </div>
        </div>
    </div>
    <!-- Page Header End -->


    <!-- Checkout Start -->
    <div class="container-fluid pt-10">
        <div class="row px-xl-8">
            <div class="col-lg-6">
                <div class="mb-4">
                    <h4 class="font-weight-semi-bold mb-10">Edit Profil</h4>
                    <div class="row">
                    <div class="col-md-10 form-group">
            </div>
            <div class="card-body">
                <form action="edit_profil.php" method="POST" class="user">
                    <input type="hidden" class="form-control" name="txt_id" placeholder="Masukkan" value="<?php echo $u['id']; ?>">
                    <div class="form-group">
                      <label for="txt_nama">Nama User</label>
                      <input type="text" class="form-control" name="txt_nama" placeholder="Masukkan Nama" value="<?php echo $u['user_fullname']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txt_email">Email User</label>
                      <input type="text" class="form-control" name="txt_email" placeholder="Masukkan Email" value="<?php echo $u['user_email']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txt_email">Password</label>
                      <input type="text" class="form-control" name="txt_password" placeholder="Masukkan Password" value="<?php echo $u['user_password']; ?>">
                    </div>
                    <div class="form-group">
                      <label for="txt_alamat">Alamat</label>
                      <input type="text" class="form-control" name="txt_alamat" placeholder="Masukkan Alamat" value="<?php echo $u['alamat']; ?>">
                    </div>
                    <button type="submit" name="update" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
          </div>
            </div>
        </div>
    </div>

    <!-- Checkout End -->

    <!-- Footer Start -->
    <?php
        include 'footer.php';
    ?>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="assets/lib/easing/easing.min.js"></script>
    <script src="assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="assets/mail/jqBootstrapValidation.min.js"></script>
    <script src="assets/mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="assets/js/main.js"></script>
</body>

</html>