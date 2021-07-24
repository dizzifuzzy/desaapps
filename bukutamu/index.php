<?php 
session_start();
require_once("../mainconf.php"); 
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$cekdatadiri = $mysqli->query("SELECT * FROM data_diri where status_dd=1");
$ea    = $cekinstansi->fetch_assoc();
if(!$_SESSION['petugas']){header("location: ../masuk.php");}
$idpetugas = $_SESSION['petugas'];
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>Buku Tamu - <?=$ea['app_instansi'];?></title>
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
<?php include "../header.php";?>
            <!-- MENU Start -->
            <div class="navbar-custom">
                <div class="container-fluid">
                    <div id="navigation">
                        <!-- Navigation Menu-->
                        <?php include "../navmenu.php";?>
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
                            <h4 class="page-title">Buku Tamu</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <a href="tambah.php"><button type="button" class="btn btn-info btn-lg float-right">Tambah Data</button></a>
                                <h4 class="mt-0 header-title">Daftar Buku Tamu</h4>
                                <p class="text-muted m-b-30 font-14">Jumlah data yang terdaftar di buku tamu.
                                </p>

                                <table id="datatable" class="table table-bordered">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>NIK</th>
                                        <th>KK</th>
                                        <th>Nama</th>
                                        <th>Tempat & Tanggal Lahir</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Agama</th>
                                        <th>Aksi</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 0; while($row=$cekdatadiri->fetch_assoc()){  $no++;?>
                                    <tr>
                                        <td><?=$no;?></td>
                                        <td><?=$row['nik_dd'];?></td>
                                        <td><?=$row['kk_dd'];?></td>
                                        <td><?=$row['nama_dd'];?></td>
                                        <td><?=$row['tmpt_lahir_dd'];?>, <?=date_format(date_create($row['tgl_lahir_dd']),"d-M-Y");?></td>
                                        <td><?php if($row['jk_dd']==1){echo"Laki-Laki";}else{echo"Perempuan";}?></td>
                                        <td><?=$row['agama_dd'];?></td>
                                        <td><a href="ubah.php?id=<?=$row['id_dd'];?>">Ubah</a>/<a href="?hapus=<?=$row['id_dd'];?>">Hapus</a></td>
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
        $mysqli->query("UPDATE data_diri SET status_dd=0 WHERE id_dd='$hapus'");
        echo '
        <script>
        window.alert("Berhasil di hapus");
        window.location = "index.php";
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