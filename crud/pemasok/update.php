<?php 
	include "../../koneksi/koneksi.php";

	$id_pemasok = $_POST["id_pemasok"];
	$nm_pemasok = $_POST["nm_pemasok"];
	$almt_pemasok = $_POST["almt_pemasok"];
	$no_hp = $_POST["no_hp"];

	mysqli_query($koneksi," update pemasok set id_pemasok='$id_pemasok' , nm_pemasok='$nm_pemasok' , almt_pemasok='$almt_pemasok' , no_hp='$no_hp'  where id_pemasok='$id_pemasok' ");

	header("location:../../?halaman=pemasok");
 ?>