        <?php $cekpetugas = $mysqli->query("SELECT * FROM petugas WHERE id_petugas=$idpetugas"); $petugas    = $cekpetugas->fetch_assoc();?>
        <header id="topnav">
            <div class="topbar-main">
                <div class="container-fluid">
                    <!-- Logo container-->
                    <div class="logo">
                        <a href="<?=$ea['url_instansi'];?>index.php" class="logo">
                            <img src="<?=$ea['url_instansi'];?>assets/images/logo-sm.png" alt="" height="22" class="logo-small">
                            <img src="<?=$ea['url_instansi'];?>assets/images/logo.png" alt="" height="24" class="logo-large">
                        </a>
                    </div>
                    <!-- End Logo container-->


                    <div class="menu-extras topbar-custom">
                        <ul class="list-inline float-right mb-0">
                            <!-- User-->
                            <li class="list-inline-item dropdown notification-list">
                                <a class="nav-link dropdown-toggle arrow-none waves-effect nav-user" data-toggle="dropdown" href="#" role="button"
                                   aria-haspopup="false" aria-expanded="false">
                                    <img src="<?=$ea['url_instansi'];?>image/petugas/<?=$petugas['gambar_petugas'];?>" alt="user" class="rounded-circle">
                                </a>
                                <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                    <a class="dropdown-item" href="<?=$ea['url_instansi'];?>profil.php"><i class="dripicons-user text-muted"></i> Profil</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="<?=$ea['url_instansi'];?>logout.php"><i class="dripicons-exit text-muted"></i> Keluar</a>
                                </div>
                            </li>
                            <li class="menu-item list-inline-item">
                                <!-- Mobile menu toggle-->
                                <a class="navbar-toggle nav-link">
                                    <div class="lines">
                                        <span></span>
                                        <span></span>
                                        <span></span>
                                    </div>
                                </a>
                                <!-- End mobile menu toggle-->
                            </li>
                        </ul>
                    </div>
                    <!-- end menu-extras -->

                    <div class="clearfix"></div>

                </div> <!-- end container -->
            </div>
            <!-- end topbar-main -->