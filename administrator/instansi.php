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
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Ubah Data Petugas</h4>
                                    <?php 
                                    if($_POST['app_instansi']){
                                        $app_instansi        = $_POST['app_instansi'];
                                        $nama_instansi   = $_POST['nama_instansi'];
                                        $url_instansi        = $_POST['url_instansi'];
                                        $alamat_instansi   = $_POST['alamat_instansi'];
                                        $email_instansi          = $_POST['email_instansi'];
                                        $telp_instansi          = $_POST['telp_instansi'];
                                        $idx = strpos($_FILES['gambar']['name'], '.');
                                        $ext = substr($_FILES['gambar']['name'], $idx);
                                        $file_ext   = strtolower(end(explode('.', $_FILES['gambar']['name'])));
                                        $file_name = $app_instansi.date("dmY"). $ext;
                                        $output_dir = "../assets/images/";
                                        if(($app_instansi==NULL)||($nama_instansi==NULL)||($url_instansi==NULL)||($alamat_instansi==NULL)||($email_instansi==NULL)||($telp_instansi==NULL))
                                        {
                                            echo '<div class="alert alert-danger">Data tidak boleh ada yang kosong!</div>';
                                        }else{
                                            if ($idx) {
                                                $allow      = array("jpg", "png", "jpeg", "svg");
                                                if (in_array($file_ext, $allow)) {
                                                    if ($_FILES["gambar"]["error"] > 0) {
                                                        echo '<div class="alert alert-danger">Gambar gagal di upload!</div>';
                                                    }else{
                                                        move_uploaded_file($_FILES["gambar"]["tmp_name"], $output_dir . $file_name);
                                                        $update = $mysqli->query("UPDATE instansi SET app_instansi = '$app_instansi', nama_instansi = '$nama_instansi', url_instansi = '$url_instansi', alamat_instansi = '$alamat_instansi', email_instansi = '$email_instansi', telp_instansi = '$telp_instansi', logo_instansi = '$file_name' WHERE id_instansi = 1;");
                                                        if($update){
                                                            echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                                        }
                                                    }
                                                }else{
                                                    echo '<div class="alert alert-danger">Format Gambar Harus JPG, PNG, JPEG, Atau SVG!</div>';
                                                }
                                            }else{
                                                $update = $mysqli->query("UPDATE instansi SET app_instansi = '$app_instansi', nama_instansi = '$nama_instansi', url_instansi = '$url_instansi', alamat_instansi = '$alamat_instansi', email_instansi = '$email_instansi', telp_instansi = '$telp_instansi' WHERE id_instansi = 1;");
                                                if($update){
                                                    echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama Website</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="app_instansi" value="<?=$ea['app_instansi'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama Instansi</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="nama_instansi" value="<?=$ea['nama_instansi'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Url Instansi</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="url_instansi" value="<?=$ea['url_instansi'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Alamat Instansi</label>
                                    <div class="autocomplete col-sm-10">
                                        <textarea class="form-control"name="alamat_instansi"><?=$ea['alamat_instansi'];?></textarea>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email Instansi</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="email" name="email_instansi" value="<?=$ea['email_instansi'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Telp Instansi</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="number" name="telp_instansi" value="<?=$ea['telp_instansi'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Foto Instansi</label>
                                    <div class="autocomplete col-sm-10">
                                        <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="<?=$ea['url_instansi'];?>assets/images/<?=$ea['logo_instansi'];?>" data-holder-rendered="true">
                                        <input type="file" name="gambar" class="form-control">
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