    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default"> 

            <!-- Menu-Menu -->
            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    <?php
                    if($_SESSION['level'] == 'admin')
                    {
                    ?>
                        
                        <li class="<?php if($_GET['halaman']=='dashboard'){ echo 'active'; } ?>">
                            <a href="?halaman=dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>

                        <!-- judul menu -->
                        <li class="menu-title">MENU UTAMA</li>
                        <!-- judul menu -->

                        <li class="<?php if($_GET['halaman']=='transaksi'){ echo 'active'; } ?>">
                            <a href="?halaman=transaksi&amp;tap=1"><i class="menu-icon fa fa-handshake-o"></i>Transaksi </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='pendaftaran'){ echo 'active'; } ?>">
                            <a href="?halaman=pendaftaran"><i class="menu-icon fa fa-user-plus"></i>Pendaftaran </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='pemasokan'){ echo 'active'; } ?>">
                            <a href="?halaman=pemasokan&amp;tap=1"><i class="menu-icon fa fa-ambulance"></i>Pemasokan </a>
                        </li>
                        
                        <!-- judul menu -->
                        <li class="menu-title">PENGOLAHAN DATA</li>
                        <!-- judul menu -->

                        <li class="<?php if($_GET['halaman']=='karyawan'){ echo 'active'; } ?>">
                            <a href="?halaman=karyawan"> <i class="menu-icon fa fa-users"></i>Karyawan </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='obat'){ echo 'active'; } ?>">
                            <a href="?halaman=obat&amp;tap=1"> <i class="menu-icon fa fa-medkit"></i>Obat </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='perawatan'){ echo 'active'; } ?>">
                            <a href="?halaman=perawatan"> <i class="menu-icon fa fa-stethoscope"></i>Perawatan </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='biaya_konsultasi'){ echo 'active'; } ?>">
                            <a href="?halaman=biaya_konsultasi"> <i class="menu-icon fa fa-money"></i>Biaya Konsultasi</a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='pemasok'){ echo 'active'; } ?>">
                            <a href="?halaman=pemasok"> <i class="menu-icon fa fa-building-o"></i>Pemasok Obat </a>
                        </li>
                        
                        <!-- judul menu -->
                        <li class="menu-title">EXTRA</li>
                        <!-- judul menu -->

                        <li class="<?php if($_GET['halaman']=='laporan'){ echo 'active'; } ?>">
                            <a href="?halaman=laporan"> <i class="menu-icon fa fa-clipboard"></i>Laporan </a>
                        </li>

                    <?php
                    }
                    ?>

                    <?php
                    if($_SESSION['level'] == 'kasir')
                    {
                    ?>
                        
                        <li class="<?php if($_GET['halaman']=='dashboard'){ echo 'active'; } ?>">
                            <a href="?halaman=dashboard"><i class="menu-icon fa fa-laptop"></i>Dashboard </a>
                        </li>

                        <!-- judul menu -->
                        <li class="menu-title">MENU UTAMA</li>
                        <!-- judul menu -->

                        <li class="<?php if($_GET['halaman']=='transaksi'){ echo 'active'; } ?>">
                            <a href="?halaman=transaksi&amp;tap=1"><i class="menu-icon fa fa-handshake-o"></i>Transaksi </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='pendaftaran'){ echo 'active'; } ?>">
                            <a href="?halaman=pendaftaran"><i class="menu-icon fa fa-user-plus"></i>Pendaftaran </a>
                        </li>

                        <li class="<?php if($_GET['halaman']=='pemasokan'){ echo 'active'; } ?>">
                            <a href="?halaman=pemasokan&amp;tap=1"><i class="menu-icon fa fa-ambulance"></i>Pemasokan </a>
                        </li>
                        
                        <!-- judul menu -->
                        <li class="menu-title">EXTRA</li>
                        <!-- judul menu -->

                        <li class="<?php if($_GET['halaman']=='laporan'){ echo 'active'; } ?>">
                            <a href="?halaman=laporan"> <i class="menu-icon fa fa-clipboard"></i>Laporan </a>
                        </li>

                    <?php
                    }
                    ?>

                </ul>
            </div>
            <!-- Menu-Menu -->

        </nav>
    </aside>