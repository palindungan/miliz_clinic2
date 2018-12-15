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
                                    FROM pemasokan pm ,Karyawan k , pemasok p
                                    WHERE pm.id_pemasok = p.id_pemasok && pm.id_karyawan = k.id_karyawan && pm.id_pemasokan = '$id'; ");

    $data2 = mysqli_query($koneksi,"SELECT *
                                    FROM stok_obat s, obat o
                                    WHERE s.id_obat = o.id_obat && s.id_pemasokan = '$id'; ");

    foreach ($data1 as $da1) 
    {

?>


<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h2>Detail Pemasokan</h2><h3 class="pull-right">ID : <?php echo $da1['id_pemasokan']; ?></h3>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Pemasok :</strong><br>
    					<?php echo $da1['nm_pemasok']; ?><br>
    					<?php echo $da1['almt_pemasok']; ?>
                        <?php echo $da1['no_hp']; ?>
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
    					<strong>Tanggal Pemasokan :</strong><br>
    					<?php echo $da1['tgl_pemasokan']; ?><br><br>
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
        							<td class="text-center"><strong>Harga Beli</strong></td>
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
    								<td class="text-center">Rp. <?php echo number_format($da2['hrg_beli'],2,",","."); ?></td>
    								<td class="text-center"><?php echo $da2['stok_awal']; ?></td>
                                    <td class="text-right">Rp. <?php echo number_format($da2['harga_so'],2,",","."); ?></td>
    							</tr>
                            <?php
                                }  
                            ?>
                            <!-- obat -->

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