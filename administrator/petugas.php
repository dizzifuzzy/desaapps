<?php 
session_start();
require_once("../mainconf.php"); 
if(!$_SESSION['admin']){header("location: ../masuk.php");}
$idadmin = $_SESSION['admin'];
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$cekpetugas = $mysqli->query("SELECT * FROM petugas WHERE status_petugas=1");
$ea    = $cekinstansi->fetch_assoc();
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Petugas - <?=$ea['app_instansi'];?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <!-- App Icons -->
        <link rel="shortcut icon" href="<?=$ea['url_instansi'];?>assets/images/favicon.ico">
        <!-- App css -->
        <link href="<?=$ea['url_instansi'];?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/css/icons.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/css/style.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
        <link href="<?=$ea['url_instansi'];?>assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />
    </head>


    <body>
        <!-- Navigation Bar-->
<?php include "../administrator/header.php";?>
            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php include "../administrator/navmenu.php";?>
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
                            <h4 class="page-title">Petugas</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Daftar Petugas</h4>
                                <p class="text-muted m-b-30 font-14">Jumlah data petugas.
                                </p>

                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Petugas</th>
                                        <th>Email Petugas</th>
                                        <th>Username Petugas</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0; while($row=$cekpetugas->fetch_assoc()){  $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$row['nama_petugas'];?></td>
                                        <td><?=$row['email_petugas'];?></td>
                                        <td><?=$row['username_petugas'];?></td>
                                        <td><a href="?hapus=<?=$row['id_petugas'];?>">Hapus</a></td>
                                    </tr>
                                    <?php } ?>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
            </div> <!-- end container -->
        </div>
        <!-- end wrapper -->

    <?php 
    if($_GET['hapus']){
        $hapus = $_GET['hapus'];
        $mysqli->query("UPDATE petugas SET status_petugas=0 WHERE id_petugas='$hapus'");
        echo '
        <script>
        window.alert("Berhasil di hapus");
        window.location = "petugas.php";
        </script>
        ';
    }?>
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
        <!-- Required datatable js -->
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/buttons.bootstrap4.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/jszip.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/pdfmake.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/vfs_fonts.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/buttons.html5.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/buttons.print.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/buttons.colVis.min.js"></script>
        <!-- Responsive examples -->
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="<?=$ea['url_instansi'];?>assets/plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="<?=$ea['url_instansi'];?>assets/pages/datatables.init.js"></script>

    </body>
</html>