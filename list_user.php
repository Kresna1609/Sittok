<?php
require('koneksi.php');
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
    <div class="row">
            <div class="col-lg-12">
              <div class="card mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Data User</h6>
                </div>
                <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Id</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Nama</th>
                                            <th>Alamat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                            $query = "SELECT * FROM user";
                                            $result = mysqli_query($koneksi, $query); 

                                            while ($row = mysqli_fetch_array($result)){
                                                $id = $row['id'];
                                                $email = $row['user_email'];
                                                $password = $row['user_password'];
                                                $nama = $row['user_fullname'];
                                                $alamat = $row['alamat'];
                                        ?>
                                        <tr>
                                            <td><?php echo $id; ?></td>
                                            <td><?php echo $email; ?></td>
                                            <td><?php echo $password; ?></td>
                                            <td><?php echo $nama; ?></td>
                                            <td><?php echo $alamat; ?></td>
                                            <td>
                                            <a href="edit_profil.php?id= <?php echo $row['id']; ?>" class="btn btn-primary btn-circle <?php echo $dis; ?>"><i class="fas fa-pen"></i></a>
                                            </td>
                                        </tr>
                                       <?php
                                            }
                                       ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
              </div>
                    <div class="card-footer border-secondary bg-transparent">
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