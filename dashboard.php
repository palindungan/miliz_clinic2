<?php 

$data1 = mysqli_query($koneksi,"SELECT SUM(s_o.jumlah_stok) stok_obat
                                FROM stok_obat s_o
                                where s_o.jumlah_stok > 0 ");

$data2 = mysqli_query($koneksi,"SELECT count(p.id_pasien) pasien
                                FROM pasien p ");

$data3 = mysqli_query($koneksi,"SELECT count(k.id_karyawan) Karyawan
                                FROM Karyawan k ");

$data4 = mysqli_query($koneksi,"SELECT count(p.id_perawatan) perawatan
                                FROM perawatan p ");

$data5 = mysqli_query($koneksi,"SELECT count(k.id_konsultasi) konsultasi
                                FROM konsultasi k ");

$data6 = mysqli_query($koneksi,"SELECT count(p.id_pemasok) pemasok
                                FROM pemasok p ");

$data6 = mysqli_query($koneksi,"SELECT count(p.id_pemasok) pemasok
                                FROM pemasok p ");
$bulan = date('m');
$tahun = date('Y');

$data7 = mysqli_query($koneksi,"SELECT SUM(t.total_hrg) transaksi
                                FROM transaksi t
                                WHERE MONTH(t.tgl_transaksi)= '$bulan' AND YEAR(t.tgl_transaksi) = '$tahun'
                                ");

$data8 = mysqli_query($koneksi,"SELECT SUM(p.total_hrg) pemasokan
                                FROM pemasokan p
                                WHERE MONTH(p.tgl_pemasokan)= '$bulan' AND YEAR(p.tgl_pemasokan) = '$tahun'
                                ");

foreach ($data1 as $d1) 
    {
        $stok_obat = $d1["stok_obat"]; 
    } 
foreach ($data2 as $d2) 
    {
        $pasien = $d2["pasien"]; 
    } 
foreach ($data3 as $d3) 
    {
        $Karyawan = $d3["Karyawan"]; 
    } 
foreach ($data4 as $d4) 
    {
        $perawatan = $d4["perawatan"]; 
    } 
foreach ($data5 as $d5) 
    {
        $konsultasi = $d5["konsultasi"]; 
    } 
foreach ($data6 as $d6) 
    {
        $pemasok = $d6["pemasok"]; 
    }
foreach ($data7 as $d7) 
    {
        $transaksi = $d7["transaksi"]; 
    }  
foreach ($data8 as $d8) 
    {
        $pemasokan = $d8["pemasokan"]; 
    }  

?>

<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dasboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <!-- <li><a href="?halaman=dashboard">Dashboard</a></li> -->
                            <li class="active">Dashboard</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pemberitahuan menu yang dibuka -->


<div class="content">
    <div class="animated fadeIn">

        <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-1">
                                <i class="fa fa-street-view"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib"> 
                                    <div class="stat-text"><span class="count"><?php echo $pasien; ?></span></div>
                                    <div class="stat-heading">Pasien</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-3">
                                <i class="fa fa-medkit"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib"> 
                                    <div class="stat-text"><span class="count"><?php echo $stok_obat; ?></span></div>
                                    <div class="stat-heading">Stok Obat</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-2">
                                <i class="pe-7f-users"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $Karyawan; ?></span></div>
                                    <div class="stat-heading">Karyawan</div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-4">
                                <i class="fa fa-bed"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib"> 
                                    <div class="stat-text"><span class="count"><?php echo $perawatan; ?></span></div>
                                    <div class="stat-heading">Perawatan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <!-- Widgets End -->

    <!-- Widgets  -->
        <div class="row">
            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-5">
                                <i class="pe-7f-cash"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib"> 
                                    <div class="stat-text"><span class="count"><?php echo $konsultasi; ?></span></div>
                                    <div class="stat-heading">Data Konsultasi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-6">
                                <i class="fa fa-truck"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib">
                                    <div class="stat-text"><span class="count"><?php echo $pemasok; ?></span></div>
                                    <div class="stat-heading">Distributor Obat</div> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-5">
                                <i class="fa fa-cart-plus"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib"> 
                                    <div class="stat-text">Rp. <span class="count"><?php echo $pemasokan; ?></span></div>
                                    <div class="stat-heading">Pemasokan</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="stat-widget-five">
                            <div class="stat-icon dib flat-color-5">
                                <i class="fa fa-handshake-o"></i>
                            </div>
                            <div class="stat-content">
                                <div class="text-left dib"> 
                                    <div class="stat-text">Rp. <span class="count"><?php echo $transaksi ?></span></div>
                                    <div class="stat-heading">Transaksi</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> 
    <!-- Widgets End -->

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Stok Obat Yang Kurang</strong>
                    </div>
                    <div class="card-body">

                        <table id="tabel_data_stok_obat" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Kode Pemasokan</th>
                                    <th>Nama Obat</th>
                                    <th>Tanggal Kadaluarsa</th>
                                    <th>Stok</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data = mysqli_query($koneksi," SELECT s.id_stok_obat , p.id_pemasokan , o.id_obat , o.nm_obat , s.tgl_exp , s.jumlah_stok
                                                                    FROM stok_obat s, pemasokan p , obat o
                                                                    WHERE s.id_pemasokan = p.id_pemasokan && s.id_obat = o.id_obat && s.jumlah_stok > 0 && s.jumlah_stok <= 5
                                                                    ORDER BY s.id_stok_obat DESC;
                                                        ");
                                    foreach ($data as $d) 
                                    {
                                ?>
                                        <tr>
                                            <td><?php echo $d["id_stok_obat"]; ?></td>
                                            <td><?php echo $d["id_pemasokan"]; ?></td>
                                            <td><?php echo $d["nm_obat"]; ?></td>
                                            <td><?php echo $d["tgl_exp"]; ?></td>
                                            <td><?php echo $d["jumlah_stok"]; ?></td>
                                        </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div> 

    </div><!-- .animated -->
</div><!-- .content -->

<script type="text/javascript">
        $(document).ready(function() {
          $('#tabel_data_stok_obat').DataTable();
          
      } );
</script>