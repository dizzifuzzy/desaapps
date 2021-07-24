<?php 
require_once("mainconf.php"); 
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$ea    = $cekinstansi->fetch_assoc();
if($_SESSION['petugas']){header("location: index.php");}elseif($_SESSION['admin']){header("location: index.php");}

?>
<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Daftar - <?=$ea['app_instansi'];?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />

        <!-- App Icons -->
        <link rel="shortcut icon" href="assets/images/favicon.ico">

        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />

    </head>


    <body>

        <!-- Begin page -->
        <div class="accountbg"></div>
        <div class="wrapper-page">

            <div class="card">
                <div class="card-body">

                    <h3 class="text-center mt-0 m-b-15">
                        <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" height="30" alt="logo"></a>
                    </h3>

                    <h4 class="text-muted text-center font-18"><b>Halaman Daftar</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" method="post" action="">
                        <?php
                        if ( ($_POST['username']!="") && ($_POST['email']!="") && ($_POST['password']!="")){
                        	$username = $_POST['username'];
                            $email = $_POST['email'];
                        	$password = $_POST['password'];
                            $real = password_hash($password, PASSWORD_DEFAULT);
                            $cek_email = $mysqli->query("SELECT * FROM petugas WHERE email_petugas ='".$email."'");
                            $cekemail    = $cek_email->fetch_array();
                            $cek_username = $mysqli->query("SELECT * FROM petugas WHERE username_petugas ='".$username."'");
                            $cekusername    = $cek_username->fetch_array();
                        	if($cekemail){
                                echo '<div class="alert alert-danger">Email yang anda masukkan sudah di gunakan user lain!</div>';
                            }elseif($cekusername){
                                echo '<div class="alert alert-danger">Username yang anda masukkan sudah di gunakan user lain!</div>';
                            }else{
                                $mysqli->query("INSERT INTO petugas (nama_petugas,username_petugas,email_petugas,password_petugas,status_petugas,gambar_petugas) VALUES ('Petugas','$username','$email','$real','1','default.jpg')");
                                echo '<div class="alert alert-success">Daftar Berhasil</div>';
                                sleep(3);
                            }
						}
                        ?>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="email" name="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="text" name="username" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" type="password" name="password" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Daftar</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-12 m-t-20 text-center">
                                    <a href="masuk.php" class="text-muted">Sudah mempunyai akun?</a>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>



        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- App js -->

    </body>
</html>