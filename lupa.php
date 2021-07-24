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
        <title>Lupa Password - <?=$ea['app_instansi'];?></title>
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

                    <h4 class="text-muted text-center font-18"><b>Halaman Lupa Password</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" method="post" action="">
                        <?php
                        if (($_POST['username']!="") && ($_POST['email']!="")){
                        	$username = $_POST['username'];
                        	$email = $_POST['email'];
                        	$cekpetugas = $mysqli->query("SELECT * FROM petugas WHERE username_petugas ='$username' AND email_petugas ='$email'");
                        	$ambilpetugas    = $cekpetugas->fetch_assoc();
                        	$passpetugas = $ambilpetugas['password_petugas'];
                            $idpetugas = $ambilpetugas['id_petugas'];
                            $pbaru = substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 10)), 0, 10);
                            $real = password_hash($pbaru, PASSWORD_DEFAULT);
                        	if($ambilpetugas){
                                echo '<div class="alert alert-success">Password baru anda adalah '.$pbaru.'</div>';
                                $update = $mysqli->query("UPDATE petugas SET password_petugas = '$real' WHERE id_petugas = $idpetugas;");
                            }else{
                                echo '<div class="alert alert-danger">Anda tidak terdaftar dalam database kami!</div>';
                            }
						}
                        ?>
                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="username" type="text" required="" placeholder="Username">
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-12">
                                    <input class="form-control" name="email" type="email" required="" placeholder="Email">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-info btn-block waves-effect waves-dark" type="submit">Lupa Password</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="masuk.php" class="text-muted"><i class="mdi mdi-lock"></i> Masuk</a>
                                </div>
                                <div class="col-sm-5 m-t-20">
                                    <a href="daftar.php" class="text-muted"><i class="mdi mdi-account-circle"></i> Buat Akun</a>
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