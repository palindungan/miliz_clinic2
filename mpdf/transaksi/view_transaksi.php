<link href="../head/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="../head/bootstrap.min.js"></script>
<script src="../head/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="../invoice.css">
<!------ Include the above in your HEAD tag ---------->

<?php 
    include "../../koneksi/koneksi.php";
    include "../../koneksi/database_connection.php";

    $id = $_GET['id'];

    $data1 = mysqli_query($koneksi,"SELECT *
									FROM transaksi t, pasien p, karyawan k
									WHERE t.id_pasien = p.id_pasien && t.id_karyawan = k.id_karyawan && t.id_transaksi = '$id'; ");

    $data2 = mysqli_query($koneksi,"SELECT * 
									FROM transaksi_obat t_o, stok_obat s_o , obat o
									WHERE t_o.id_stok_obat = s_o.id_stok_obat && s_o.id_obat = o.id_obat && t_o.id_transaksi = '$id'; ");

    $data3 = mysqli_query($koneksi,"SELECT *
									FROM transaksi_perawatan t_p, perawatan p 
									WHERE t_p.id_perawatan = p.id_perawatan && t_p.id_transaksi = '$id'; ");

    $data4 = mysqli_query($koneksi,"SELECT * 
									FROM transaksi_konsultasi t_k, konsultasi k
									WHERE t_k.id_konsultasi = k.id_konsultasi && t_k.id_transaksi = '$id'; ");

    foreach ($data1 as $da1) 
    {

?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Nota Transaksi</h2><h3 class="pull-right">ID : <?php echo $da1['id_transaksi']; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Pelanggan :</strong><br>
    					<?php echo $da1['nm_pasien']; ?><br>
    					<?php echo $da1['almt_pasien']; ?>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
                        <strong>Karyawan :</strong><br>
    					<?php echo $da1['nm_karyawan']; ?><br>
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Tanggal Transaksi :</strong><br>
    					<?php echo $da1['tgl_transaksi']; ?><br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Detail Transaksi</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table-responsive">
    					<table class="table table-condensed">
    						<thead>
                                <tr>
        							<td><strong>Nama</strong></td>
        							<td class="text-center"><strong>Harga</strong></td>
        							<td class="text-center"><strong>QTY</strong></td>
        							<td class="text-right"><strong>Total</strong></td>
                                </tr>
    						</thead>
    						<tbody>
                                
                            <!-- obat -->
                            <?php     
                                foreach ($data2 as $da2) 
                                {
                            ?>
    							<tr>
    								<td><?php echo $da2['nm_obat']; ?></td>
    								<td class="text-center">Rp. <?php echo number_format($da2['hrg_jual'],2,",","."); ?></td>
    								<td class="text-center"><?php echo $da2['qty_obat']; ?></td>
    								<td class="text-right">Rp. <?php echo number_format($da2['harga_o'],2,",","."); ?></td>
    							</tr>
                            <?php
                                }  
                            ?>
                            <!-- obat -->

                            <!-- perawatan -->
                            <?php     
                                foreach ($data3 as $da3) 
                                {
                            ?>
                                <tr>
        							<td><?php echo $da3['nm_perawatan']; ?></td>
    								<td class="text-center">Rp. <?php echo number_format($da3['hrg_perawatan'],2,",","."); ?></td>
    								<td class="text-center"><?php echo $da3['qty_perawatan']; ?></td>
    								<td class="text-right">Rp. <?php echo number_format($da3['harga_p'],2,",","."); ?></td>
    							</tr>
                            <?php
                                }  
                            ?>
                            <!-- perawatan -->

                            <!-- konsultasi -->
                            <?php     
                                foreach ($data4 as $da4) 
                                {
                            ?>
                                <tr>
                                    <td><?php echo $da4['nm_konsultasi']; ?></td>
                                    <td class="text-center">Rp. <?php echo number_format($da4['hrg_konsultasi'],2,",","."); ?></td>
                                    <td class="text-center"><?php echo $da4['qty_konsultasi']; ?></td>
                                    <td class="text-right">Rp. <?php echo number_format($da4['harga_k'],2,",","."); ?></td>
                                </tr>
                            <?php
                                }  
                            ?>
                            <!-- konsultasi -->

							<!-- Total -->
    							<tr>
    								<td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Total</strong></td>
    								<td class="thick-line text-right">Rp. <?php echo number_format($da1['total_hrg'],2,",","."); ?></td>
    							</tr>
    						<!-- Total -->

                            <!-- Bayar -->
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Bayar</strong></td>
                                    <td class="no-line text-right">Rp. <?php echo number_format($da1['bayar'],2,",","."); ?></td>
                                </tr>
                            <!-- Bayar -->

                            <!-- Kembalian -->
                                <tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
                                    <td class="no-line text-center"><strong>Kembalian</strong></td>
                                    <td class="no-line text-right">Rp. <?php echo number_format($da1['kembalian'],2,",","."); ?></td>
                                </tr>
                            <!-- Kembalian -->

    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>

<?php
    } 
?>