<html lang="en">
<head>
    <link href="../head/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="../head/bootstrap.min.js"></script>
    <script src="../head/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->
    <meta charset="UTF-8">
    <title>Laporan</title>
</head>

<body>
    <?php 
        include "../../koneksi/koneksi.php";
        include "../../koneksi/database_connection.php";

        $date1 = $_POST['date1'];
        $date2 = $_POST['date2'];

        $data1 = mysqli_query($koneksi," SELECT SUM(p.total_hrg) total_pemasokan
                                        FROM pemasokan p
                                        where p.tgl_pemasokan >= '$date1' && p.tgl_pemasokan <= '$date2' ");

        $data2 = mysqli_query($koneksi," SELECT SUM(t_o.harga_o) total_obat
                                        FROM transaksi_obat t_o , transaksi t
                                        where t_o.id_transaksi = t.id_transaksi && t.tgl_transaksi >= '$date1' && t.tgl_transaksi <= '$date2' ");

        $data3 = mysqli_query($koneksi," SELECT SUM(t_p.harga_p) total_perawatan
                                        FROM transaksi_perawatan t_p , transaksi t
                                        where t_p.id_transaksi = t.id_transaksi && t.tgl_transaksi >= '$date1' && t.tgl_transaksi <= '$date2' ");

        $data4 = mysqli_query($koneksi," SELECT SUM(t_k.harga_k) total_konsultasi
                                        FROM transaksi_konsultasi t_k , transaksi t
                                        where t_k.id_transaksi = t.id_transaksi && t.tgl_transaksi >= '$date1' && t.tgl_transaksi <= '$date2' ");

        $data5 = mysqli_query($koneksi," SELECT SUM(t.total_hrg) total_transaksi
                                        FROM transaksi t
                                        where t.tgl_transaksi >= '$date1' && t.tgl_transaksi <= '$date2' ");

        foreach ($data1 as $d1) 
            {
                if (isset($d1["total_pemasokan"])) 
                {
                    $total_pemasokan = $d1["total_pemasokan"]; 
                }
                else
                {
                    $total_pemasokan = 0;
                }
                
            } 
        foreach ($data2 as $d2) 
            {
                if (isset($d2["total_obat"])) 
                {
                    $total_obat = $d2["total_obat"]; 
                }
                else
                {
                    $total_obat = 0;
                }
                
            } 
        foreach ($data3 as $d3) 
            {
                if (isset($d3["total_perawatan"])) 
                {
                    $total_perawatan = $d3["total_perawatan"];
                }
                else
                {
                    $total_perawatan = 0;
                }
                
            }
        foreach ($data4 as $d4) 
            {
                if (isset($d4["total_konsultasi"])) 
                {
                    $total_konsultasi = $d4["total_konsultasi"];
                }
                else
                {
                    $total_konsultasi = 0;
                }
                
            } 
        foreach ($data5 as $d5) 
            {
                if (isset($d5["total_transaksi"])) 
                {
                    $total_transaksi = $d5["total_transaksi"];
                }
                else
                {
                    $total_transaksi = 0;
                }
                
            } 
    ?>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <hr>

                <div class="row">
                    <div class="col col-md-2">
                        <img src="../../images/logo_miliz.png" width="180" alt="">
                    </div>
                    <div class="col col-md-10">
                        <strong style="font-size:30 ">MC Skincare</strong><br>
                        <address style="font-size: 15">Jalan Jendral Ahmad Yani No. 16 - 17, <br>
                        Tompokersan, Kec. Lumajang, Kabupaten Lumajang, Jawa Timur 67316 <br>
                        Telp : 0812-2667-7100</address>
                    </div>
                </div>

                <div class="row">
                    <div class="col col-md-12">

                        <hr style="border-width: 3px">
                        <address class="text-center" style="font-size: 18">LAPORAN LABA(RUGI)<br>PERIODE <?php echo $date1; ?> SAMPAI <?php echo $date2; ?></address>

                    </div>
                </div>

            </div>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">

                            <div class="row">
                                <div class="col col-md-6">

                                    <div class="row form-group" style="font-size: 18">
                                        <div class="col col-md-3">
                                            <strong>PEMASUKAN</strong>
                                        </div>

                                        <div class="col col-md-9 text-right">
                                            <strong>Rp. <?php echo number_format($total_transaksi,2,",","."); ?></strong>
                                        </div>

                                    </div>

                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td class=""><strong>Detail Pemasukan</strong></td>
                                                <td class="text-right"><strong>Nominal</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        
                                        <!-- Detail pemasukan -->

                                            <tr>
                                                <td class="">Penjualan Obat</td>
                                                <td class="text-right">Rp. <?php echo number_format($total_obat,2,",","."); ?></td>
                                            </tr>
                                        
                                            <tr>
                                                <td class="">Perawatan</td>
                                                <td class="text-right">Rp. <?php echo number_format($total_perawatan,2,",","."); ?></td>
                                            </tr>
                                        
                                            <tr>
                                                <td class="">Konsultasi</td>
                                                <td class="text-right">Rp. <?php echo number_format($total_konsultasi,2,",","."); ?></td>
                                            </tr>

                                        <!-- Detail pemasukan -->

                                        </tbody>
                                    </table>
                                </div>

                                <div class="col col-md-6">
                                    <div class="row form-group" style="font-size: 18">
                                        <div class="col col-md-3">
                                            <strong>PENGELUARAN</strong>
                                        </div>
                                        <div class="col col-md-9 text-right">
                                            <strong>Rp. <?php echo number_format($total_pemasokan,2,",","."); ?></strong>
                                        </div>
                                    </div>

                                    <table class="table table-condensed">
                                        <thead>
                                            <tr>
                                                <td class=""><strong>Detail Pengeluaran</strong></td>
                                                <td class="text-right"><strong>Nominal</strong></td>
                                            </tr>
                                        </thead>
                                        <tbody>

                                        <!-- Detail Pengeluaran -->
                                            <tr>
                                                <td class="">Pemasokan</td>
                                                <td class="text-right">Rp. <?php echo number_format($total_pemasokan,2,",","."); ?></td>
                                            </tr>
                                        <!-- Detail Pengeluaran -->

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            
                            <div style="font-size: 17">
                                <div class="row">
                                    <div class="col col-md-2">
                                        <strong>Total Pemasukan</strong>
                                    </div>
                                    <div class="col">
                                        <strong>: Rp. <?php echo number_format($total_transaksi,2,",","."); ?></strong>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col col-md-2">
                                        <strong>Total Pengeluaran</strong>
                                    </div>
                                    <div class="col">
                                        <strong>: Rp. <?php echo number_format($total_pemasokan,2,",","."); ?></strong>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col col-md-2">
                                        <strong>Total Laba(Rugi)</strong>
                                    </div>
                                    <div class="col">
                                        <strong>: Rp. <?php echo number_format($total_transaksi-$total_pemasokan,2,",","."); ?></strong>
                                    </div>
                                </div>
                            </div>             
                            <br>
                            <div class="row" style="font-size: 15">
                                <div class="col col-md-5"></div>
                                <div class="col col-md-4"></div>

                                <div class="col-md-2 text-center">
                                    <address>
                                        Lumajang, <?php echo date("Y-m-d"); ?>
                                        <br>
                                        Penanggung Jawab <br><br><br>
                                        TTD 
                                    </address>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
        

</body>

</html>