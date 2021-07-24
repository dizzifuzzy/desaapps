<?php 
session_start();
require_once("mainconf.php"); 
if(!$_SESSION['petugas']){header("location: masuk.php");}
$idpetugas = $_SESSION['petugas'];
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$cekaktivitas = $mysqli->query("SELECT * FROM aktivitas WHERE id_petugas=$idpetugas ORDER BY id_aktivitas DESC LIMIT 10");
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
        <link rel="shortcut icon" href="assets/images/favicon.ico">
        <!-- App css -->
        <link href="assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="assets/css/style.css" rel="stylesheet" type="text/css" />
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
                                <img class="img-thumbnail" alt="200x200" style="width: 200px; height: 200px;" src="<?=$ea['url_instansi'];?>image/petugas/<?=$petugas['gambar_petugas'];?>" data-holder-rendered="true">
                                <?=$petugas['nama_petugas'];?>
                            </div>
                        </div>
                    </div>
                    <div class="col-9">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Ubah Data Petugas</h4>
                                    <?php 
                                    if($_POST['namapetugas']){
                                        $namapetugas        = $_POST['namapetugas'];
                                        $usernamepetugas   = $_POST['usernamepetugas'];
                                        $emailpetugas          = $_POST['emailpetugas'];
                                        $idx = strpos($_FILES['gambar']['name'], '.');
                                        $ext = substr($_FILES['gambar']['name'], $idx);
                                        $file_ext   = strtolower(end(explode('.', $_FILES['gambar']['name'])));
                                        $file_name = $petugas['nama_petugas'].date("dmY"). $ext;
                                        $output_dir = "image/petugas/";
                                        $tgl    = date("h:i:s a d/m/Y");
                                        if(($namapetugas==NULL)||($usernamepetugas==NULL)||($emailpetugas==NULL))
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
                                                        $update = $mysqli->query("UPDATE petugas SET nama_petugas = '$namapetugas', email_petugas = '$emailpetugas', username_petugas = 'batims', gambar_petugas = '$file_name' WHERE id_petugas = $idpetugas;");
                                                        $mysqli->query("INSERT INTO aktivitas (kunci_aktivitas, nama_aktivitas,waktu_aktivitas,id_petugas) VALUES ('id: 0 - ubahdata','Mengubah Profil','$tgl','$idpetugas')");
                                                        if($update){
                                                            echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                                        }
                                                    }
                                                }else{
                                                    echo '<div class="alert alert-danger">Format Gambar Harus JPG, PNG, JPEG, Atau SVG!</div>';
                                                }
                                            }else{
                                                $update = $mysqli->query("UPDATE petugas SET nama_petugas = '$namapetugas', email_petugas = '$emailpetugas', username_petugas = 'batims', gambar_petugas = '$file_name' WHERE id_petugas = $idpetugas;");
                                                $mysqli->query("INSERT INTO aktivitas (kunci_aktivitas, nama_aktivitas,waktu_aktivitas,id_petugas) VALUES ('id: 0 - ubahdata','Mengubah Profil','$tgl','$idpetugas')");
                                                if($update){
                                                    echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                                }
                                            }
                                        }
                                    }
                                    ?>
                                <form action="" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama Petugas</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="namapetugas" value="<?=$petugas['nama_petugas'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Username Petugas</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="usernamepetugas" value="<?=$petugas['username_petugas'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Email Petugas</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="emailpetugas" value="<?=$petugas['email_petugas'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Foto Profil</label>
                                    <div class="autocomplete col-sm-10">
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
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Ubah Password Petugas</h4>
                                    <?php 
                                    if($_POST['password']){
                                        $password        = $_POST['password'];
                                        $pbaru   = $_POST['pbaru'];
                                        $pass = $petugas['password_petugas'];
                                        $tgl    = date("h:i:s a d/m/Y");
                                        if(($password==NULL)||($pbaru==NULL))
                                        {
                                            echo '<div class="alert alert-danger">Data tidak boleh ada yang kosong!</div>';
                                        }else{
                                            if(password_verify($password, $pass)){
                                                $real = password_hash($pbaru, PASSWORD_DEFAULT);
                                                $update = $mysqli->query("UPDATE petugas SET password_petugas = '$real' WHERE id_petugas = $idpetugas;");
                                                $mysqli->query("INSERT INTO aktivitas (kunci_aktivitas, nama_aktivitas,waktu_aktivitas,id_petugas) VALUES ('id: 0 - ubahdata','Mengubah Password','$tgl','$idpetugas')");
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
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/modernizr.min.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>


    </body>
</html>