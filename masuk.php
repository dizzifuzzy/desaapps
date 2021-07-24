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
        <title>Masuk - <?=$ea['app_instansi'];?></title>
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

                    <h4 class="text-muted text-center font-18"><b>Halaman Masuk</b></h4>

                    <div class="p-3">
                        <form class="form-horizontal m-t-20" method="post" action="">
                        <?php
                        if (($_POST['username']!="") && ($_POST['password']!="")){
                        	$username = $_POST['username'];
                        	$password = $_POST['password'];
                        	$cekpetugas = $mysqli->query("SELECT status_petugas, id_petugas, username_petugas, password_petugas FROM petugas WHERE username_petugas ='".$username."'");
                        	$ambilpetugas    = $cekpetugas->fetch_assoc();
                        	$passpetugas = $ambilpetugas['password_petugas'];
                            $cekadm = $mysqli->query("SELECT id_adm, username_adm, password_adm FROM admin WHERE username_adm ='".$username."'");
                            $ambiladm    = $cekadm->fetch_assoc();
                            $passadm = $ambiladm['password_adm'];
                        	if($ambilpetugas){
                        		if(password_verify($password, $passpetugas)){
                                    if($ambilpetugas['status_petugas']==0){
                                        echo '<div class="alert alert-danger">Akun anda telah dinonaktifkan!</div>';
                                    }else{
                                        session_start();
                                        $idpetugas = $ambilpetugas['id_petugas'];
                                        $_SESSION['petugas'] = $ambilpetugas['id_petugas'];
                                        $waktu = date("h:i:s a d/m/Y");
                                        $mysqli->query("INSERT INTO aktivitas (kunci_aktivitas, nama_aktivitas,waktu_aktivitas,id_petugas) VALUES ('id: 0 - masuk','Login kedalam website','$waktu','$idpetugas')");
                                        echo '<div class="alert alert-success">Login berhasil</div>';
                                        sleep(3);
                                        echo '<script>window.location = "index.php";</script>';
                                    }
								}else{
									echo '<div class="alert alert-danger">Password yang anda masukkan salah!</div>';
								}
                            }elseif($ambiladm){
                                if(password_verify($password, $passadm)){
                                    session_start();
                                    $idadm = $ambiladm['id_adm'];
                                    $_SESSION['admin'] = $idadm;
                                    echo '<div class="alert alert-success">Login berhasil</div>';
                                    sleep(3);
                                    echo '<script>window.location = "administrator";</script>';
                                }else{
                                    echo '<div class="alert alert-danger">Password yang anda masukkan salah!</div>';
                                }
                            }else{
								echo '<div class="alert alert-danger">Password yang anda masukkan salah!</div>';
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
                                    <input class="form-control" name="password" type="password" required="" placeholder="Password">
                                </div>
                            </div>

                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button class="btn btn-info btn-block waves-effect waves-light" type="submit">Masuk</button>
                                </div>
                            </div>

                            <div class="form-group m-t-10 mb-0 row">
                                <div class="col-sm-7 m-t-20">
                                    <a href="lupa.php" class="text-muted"><i class="mdi mdi-lock"></i> Lupa password?</a>
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