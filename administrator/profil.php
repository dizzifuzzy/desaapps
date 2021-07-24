<?php 
session_start();
require_once("../mainconf.php"); 
if(!$_SESSION['admin']){header("location: ../masuk.php");}
$idadmin = $_SESSION['admin'];
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$ea    = $cekinstansi->fetch_assoc();
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Profil - <?=$ea['app_instansi'];?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App Icons -->
        <link rel="shortcut icon" href="<?=$ea['url_instansi'];?>assets/images/favicon.ico">
        <!-- App css -->
        <link href="<?=$ea['url_instansi'];?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/css/style.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <!-- Navigation Bar-->
<?php include "header.php";?>
            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php include "navmenu.php";?>
                        <!-- End navigation menu -->
                    </div> <!-- end #navigation -->
                </div> <!-- end container -->
            </div> <!-- end navbar-custom -->
        </header>
        <!-- End Navigation Bar-->


        <div class="wrapper">
            <div class="container-fluid">

                <!-- Page-Title -->
                <div class="row">
                    <div class="col-sm-12">
                        <div class="page-title-box">
                            <h4 class="page-title">Profil</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-white">
                            <div class="mini-stat-info text-center text-muted">
                                <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="<?=$ea['url_instansi'];?>image/petugas/default.jpg" data-holder-rendered="true"><br>
                                <?=$admin['nama_adm'];?>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Ubah Data Admin</h4>
                                    <?php 
                                    if($_POST['namaadmin']){
                                        $namaadmin        = $_POST['namaadmin'];
                                        $usernameadmin   = $_POST['usernameadmin'];
                                        if(($namaadmin==NULL)||($usernameadmin==NULL))
                                        {
                                            echo '<div class="alert alert-danger">Data tidak boleh ada yang kosong!</div>';
                                        }else{
                                            $update = $mysqli->query("UPDATE admin SET nama_adm = '$namaadmin', username_adm = '$usernameadmin' WHERE id_adm = $idadmin;");
                                            if($update){
                                                echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                                }
                                            }
                                        }
                                    ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama Petugas</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="namaadmin" value="<?=$admin['nama_adm'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username Petugas</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="usernameadmin" value="<?=$admin['username_adm'];?>">
                                    </div>
                                </div>
                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                        <button name="submit" class="btn btn-info btn-block waves-effect waves-light" type="submit">Ubah Data</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Ubah Password</h4>
                                    <?php 
                                    if($_POST['password']){
                                        $password        = $_POST['password'];
                                        $pbaru   = $_POST['pbaru'];
                                        $pass = $admin['password_adm'];
                                        if(($password==NULL)||($pbaru==NULL))
                                        {
                                            echo '<div class="alert alert-danger">Data tidak boleh ada yang kosong!</div>';
                                        }else{
                                            if(password_verify($password, $pass)){
                                                $real = password_hash($pbaru, PASSWORD_DEFAULT);
                                                $update = $mysqli->query("UPDATE admin SET password_adm = '$real' WHERE id_adm = $idadmin;");
                                                if($update){
                                                    echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                                }
                                            }else{
                                                echo '<div class="alert alert-danger">Password lama anda tidak cocok dengan yang ada di database kami!</div>';
                                            }
                                        }
                                    }
                                    ?>
                                <form action="" method="post">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password Lama</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="password" name="password">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Password Baru</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="password" name="pbaru">
                                    </div>
                                </div>
                                <div class="form-group text-center row m-t-20">
                                    <div class="col-12">
                                        <button name="submit" class="btn btn-info btn-block waves-effect waves-light" type="submit">Ubah Password</button>
                                    </div>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->


        <!-- Footer -->
        <footer class="footer">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        © 2019 <?=$ea['app_instansi'];?> - Crafted with <i class="mdi mdi-heart text-danger"></i> by A.
                    </div>
                </div>
            </div>
        </footer>
        <!-- End Footer -->


        <!-- jQuery  -->
        <script src="<?=$ea['url_instansi'];?>assets/js/jquery.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/popper.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/bootstrap.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/modernizr.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/waves.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/jquery.slimscroll.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/jquery.nicescroll.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/js/jquery.scrollTo.min.js"></script>


    </body>
</html>