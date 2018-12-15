<?php 

include "koneksi/koneksi.php"; 
include "koneksi/database_connection.php";

if(!isset($_SESSION["level"]))
{
    header("location:login.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <?php include "detail_index/head.php"; ?>
</head>
<body>
    
    <!-- panel kiri --> 
    <?php include "detail_index/panel_kiri.php"; ?>
    <!-- panel kiri -->

    <!-- panel kanan --> 
    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include "detail_index/header.php"; ?>
        <!-- Header-->

        <!-- konten -->
        <?php 
            if (!isset($_GET['halaman'])) 
                {
                    error_reporting(0);
                }
            if ($_GET['halaman']=='dashboard') 
                {
                    include "dashboard.php";
                }
            if ($_GET['halaman']=='transaksi') 
                {
                    include "transaksi.php";
                }
            if ($_GET['halaman']=='pendaftaran') 
                {
                    include "pendaftaran.php";
                }
            if ($_GET['halaman']=='pasien') 
                {
                    include "pasien.php";
                }
            if ($_GET['halaman']=='karyawan') 
                {
                    include "karyawan.php";
                }
            if ($_GET['halaman']=='obat') 
                {
                    include "obat.php";
                }
            if ($_GET['halaman']=='perawatan') 
                {
                    include "perawatan.php";
                }
            if ($_GET['halaman']=='biaya_konsultasi') 
                {
                    include "biaya_konsultasi.php";
                }
            if ($_GET['halaman']=='laporan') 
                {
                    include "laporan.php";
                }
            if ($_GET['halaman']=='jenis_obat') 
                {
                    include "detail_obat/jenis_obat.php";
                }
            if ($_GET['halaman']=='pemasokan') 
                {
                    include "pemasokan.php";
                }
            if ($_GET['halaman']=='pemasok') 
                {
                    include "pemasok.php";
                }
        ?>  
        <!-- konten -->

        <!-- jquery untuk ajax-->
        <script src="crud/jquery.js"></script>
        <!-- jquery untuk ajax-->

        <div class="clearfix"></div>

        <!-- footer -->
        <?php include "detail_index/footer.php"; ?>
        <!-- footer -->

    </div>
    <!-- panel kanan -->

    <!-- script -->
    <?php include "detail_index/script.php"; ?>
    <!-- script -->

</body>
</html>
