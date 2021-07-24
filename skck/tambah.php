<?php 
session_start();
require_once("../mainconf.php"); 
$cekinstansi = $mysqli->query("SELECT * FROM instansi");
$cekdatadiri = $mysqli->query("SELECT * FROM data_diri where status_dd =1");
$ea    = $cekinstansi->fetch_assoc();
if(!$_SESSION['petugas']){header("location: ../masuk.php");}
$idpetugas = $_SESSION['petugas'];
?><!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title>SKCK - <?=$ea['app_instansi'];?></title>
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
                            <h4 class="page-title">Surat Keterangan Catatan Kepolisian</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title end breadcrumb -->

                <div class="row">
                    <div class="col-12">
                        <div class="card m-b-30">
                            <div class="card-body">
                                <h4 class="mt-0 header-title">Tambah Data</h4>
                                    <?php 
                                    if($_POST['nomorsurat']){
                                        $nosurat        = $_POST['nomorsurat'];
                                        $tanggalsurat   = $_POST['tanggalsurat'];
                                        $id_dd          = $_POST['id_dd'];
                                        $alamat         = "KP. ".$_POST['kp']." RT. ".$_POST['rt']." RW. ".$_POST['rw'];
                                        $desa        = $_POST['desa'];
                                        $kecamatan     = $_POST['kecamatan'];
                                        $tgl    = date("h:i:s a d/m/Y"); 
                                        if(($nosurat==NULL)||($tanggalsurat==NULL)||($id_dd==NULL)||($alamat==NULL)||($desa==NULL)||($kecamatan==NULL))
                                        {
                                            echo '<div class="alert alert-danger">Data tidak boleh ada yang kosong!</div>';
                                        }else{
                                            $cek_nomor_surat = $mysqli->query("SELECT * FROM skck WHERE no_surat_skck ='".$nosurat."'");
                                            if($cek_nomor_surat->fetch_array()){
                                                echo '<div class="alert alert-danger">Nomor Surat tidak boleh sama!</div>';
                                            }else{
                                                $submit = $mysqli->query("INSERT INTO skck (no_surat_skck, tgl_surat_skck, id_dd, alamat_skck, desa_skck, kecamatan_skck, tgl_skck, status_skck, id_petugas) VALUES ('$nosurat', '$tanggalsurat', '$id_dd', '$alamat', '$desa', '$kecamatan', '$tgl', '1', '$idpetugas')");
                                                $idnya = $mysqli->insert_id;
                                                $mysqli->query("INSERT INTO aktivitas (kunci_aktivitas, nama_aktivitas,waktu_aktivitas,id_petugas) VALUES ('id: $idnya - skck','Menambahkan data SKCK dengan nomor surat $nosurat','$tgl','$idpetugas')");
                                                if($submit){
                                                    echo '<div class="alert alert-success">Berhasil menambahkan!</div>';
                                                }

                                            }
                                        }
                                    }
                                    ?>
                                <form action="" method="post">
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nomor Surat</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="nomorsurat">
                                    </div>
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Tanggal Surat</label>
                                    <div class="col-sm-5">
                                        <input class="form-control" type="date" name="tanggalsurat">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <select name="id_dd" class="form-control">
                                            <option>Pilih</option>
                                            <?php while($row=$cekdatadiri->fetch_assoc()){?>
                                            <option value="<?=$row['id_dd'];?>"><?=$row['nik_dd'];?> - <?=$row['nama_dd'];?></option>
                                            <?php }?>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Alamat</label>
                                    <label for="example-text-input" class="col-sm-1 col-form-label">RT.</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" name="rt">
                                    </div>
                                    <label for="example-text-input" class="col-sm-1 col-form-label">RW.</label>
                                    <div class="col-sm-2">
                                        <input class="form-control" type="text" name="rw">
                                    </div>
                                    <label for="example-text-input" class="col-sm-1 col-form-label">KP.</label>
                                    <div class="col-sm-3">
                                        <input class="form-control" type="text" name="kp">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Desa</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="desa" id="desa">
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="example-text-input" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="autocomplete col-sm-10">
                                        <input class="form-control" type="text" name="kecamatan" id="kecamatan">
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
        <script src="<?=$ea['url_instansi'];?>assets/js/jquery.autocomplete.min.js"></script>
        <script>
            $(document).ready(function() {
                var desas = [
                { value: 'Bojongkunci', data: 'Bojongkunci' },
                { value: 'Bojongmanggu', data: 'Bojongmanggu' },
                { value: 'Langonsari', data: 'Langonsari' },
                { value: 'Rancamulya', data: 'Rancamulya' },
                { value: 'Rancatungku', data: 'Rancatungku' },
                { value: 'Sukasari', data: 'Sukasari' }
                ];
                var kecamatans = [
                { value: 'Pameungpeuk', data: 'Pameungpeuk' }
                ];
                $( "#desa" ).autocomplete({
                    lookup: desas
                });
                $( "#kecamatan" ).autocomplete({
                    lookup: kecamatans
                });
            });
        </script>
    </body>
</html>