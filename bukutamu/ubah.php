<?php 
session_start();
require_once("../mainconf.php");
$id = $_GET['id'];
if(!$id){header("location: index.php");}
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$ea    = $cekinstansi->fetch_assoc();
$cekdata = $mysqli->query("SELECT * FROM data_diri where id_dd = $id");
$cek    = $cekdata->fetch_assoc();
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
                                <h4 class="mt-0 header-title">Ubah Data</h4>
                                    <?php 
                                    if($_POST['nama']){
                                        $nama   = $_POST['nama'];
                                        $nik    = $_POST['nik'];
                                        $kk     = $_POST['kk'];
                                        $tlahir = $_POST['tempatlahir'];
                                        $ttlahir= $_POST['tgllahir'];
                                        $jk     = $_POST['jk'];
                                        $agama  = $_POST['agama'];
                                        $tgl    = date("h:i:s a d/m/Y");
                                        if(($nama==NULL)||($nik==NULL)||($tlahir==NULL)||($ttlahir==NULL)||($jk==NULL)||($agama==NULL))
                                        {
                                            echo '<div class="alert alert-danger">Data tidak boleh ada yang kosong!</div>';
                                        }else{
                                            $submit = $mysqli->query("UPDATE data_diri SET nama_dd = '$nama', nik_dd = '$nik', kk_dd = '$kk', tgl_lahir_dd = '$ttlahir', tmpt_lahir_dd = '$tlahir', jk_dd = '$jk', agama_dd = '$agama' WHERE id_dd = $id;");
                                            $mysqli->query("INSERT INTO aktivitas (kunci_aktivitas,nama_aktivitas,waktu_aktivitas,id_petugas) VALUES ('id: $id - bukutamu','Mengubah data Buku Tamu dengan NIK $nik','$tgl','$idpetugas')");
                                            if($submit){
                                                echo '<div class="alert alert-success">Berhasil mengubah!</div>';
                                            }
                                        }
                                    }
                                    ?>
                                <form action="" method="post">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="nama" value="<?=$cek['nama_dd'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">NIK</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="nik" value="<?=$cek['nik_dd'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">KK (Opsional)</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="number" name="kk" value="<?=$cek['kk_dd'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="text" name="tempatlahir" value="<?=$cek['tmpt_lahir_dd'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-10">
                                        <input class="form-control" type="date" name="tgllahir" value="<?=$cek['tgl_lahir_dd'];?>">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-2 col-form-label">Jenis Kelamin</label>
                                    <div class="col-sm-10">
                                        <select name="jk" class="form-control">
                                            <option>Pilih</option>
                                            <option value="1" <?php if($cek['jk_dd']==1){ echo "selected";}?>>Laki-Laki</option>
                                            <option value="0" <?php if($cek['jk_dd']==0){ echo "selected";}?>>Perempuan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Agama</label>
                                    <div class="col-sm-10">
                                        <select name="agama" class="form-control">
                                            <option>Pilih</option>
                                            <option <?php if($cek['agama_dd']=="Islam"){ echo "selected";}?>>Islam</option>
                                            <option <?php if($cek['agama_dd']=="Kristen Protestan"){ echo "selected";}?>>Kristen Protestan</option>
                                            <option <?php if($cek['agama_dd']=="Katolik"){ echo "selected";}?>>Katolik</option>
                                            <option <?php if($cek['agama_dd']=="Hindu"){ echo "selected";}?>>Hindu</option>
                                            <option <?php if($cek['agama_dd']=="Buddha"){ echo "selected";}?>>Buddha</option>
                                            <option <?php if($cek['agama_dd']=="Kong Hu Cu"){ echo "selected";}?>>Kong Hu Cu</option>
                                        </select>
                                    </div>
                                </div>
                            <div class="form-group text-center row m-t-20">
                                <div class="col-12">
                                    <button name="submit" class="btn btn-info btn-block waves-effect waves-light" type="submit">Submit</button>
                                </div>
                            </div>
                                </form>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
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