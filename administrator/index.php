<?php 
session_start();
require_once("../mainconf.php"); 
if(!$_SESSION['admin']){header("location: ../masuk.php");}
$idadmin = $_SESSION['admin'];
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$cekpetugas = $mysqli->query("SELECT * FROM petugas WHERE status_petugas=1");
$cekaktivitas = $mysqli->query("SELECT * FROM aktivitas JOIN petugas ON aktivitas.id_petugas = petugas.id_petugas ORDER BY aktivitas.id_aktivitas DESC");
$ea    = $cekinstansi->fetch_assoc();
$jumlahpengguna    = $cekpetugas->num_rows;
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Beranda - <?=$ea['app_instansi'];?></title>
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
                            <h4 class="page-title">Beranda</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-md-6 col-xl-3">
                        <div class="mini-stat clearfix bg-white">
                            <span class="mini-stat-icon bg-light"><i class="mdi mdi-account-circle text-danger"></i></span>
                            <div class="mini-stat-info text-right text-muted">
                                <span class="counter text-danger"> <?=$jumlahpengguna;?> Orang</span>
                                Terdaftar sebagai petugas.
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9">
                        <div class="card m-b-30">
                            <div class="card-body">

                                <h4 class="mt-0 header-title">Log Aktivitas</h4>
                                <p class="text-muted m-b-30 font-14">Log aktivitas petugas tercatat pada tabel dibawah ini.</p>
                                <table class="table table-dark">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Aktivitas</th>
                                        <th>Waktu</th>
                                        <th>Petugas</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php   $no = 0; while($row=$cekaktivitas->fetch_assoc()){ 
                                            $potong = $row['kunci_aktivitas']." sip";
                                            $no++;
                                            preg_match('#id: (.*?) -#', $potong, $idnya);
                                            preg_match('#- (.*?) sip#', $potong, $halamanya);
                                            ?>
                                    <tr>
                                        <th><?=$no;?></th>
                                        <td><?=$row['nama_aktivitas'];?></td>
                                        <td><?=$row['waktu_aktivitas'];?></td>
                                        <td><?=$row['username_petugas'];?></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                </div>
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