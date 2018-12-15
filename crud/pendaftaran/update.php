<?php 
	include "../../koneksi/koneksi.php";

	$id_pasien = $_POST["id_pasien"];
	$nm_pasien = $_POST["nm_pasien"];
	$almt_pasien = $_POST["almt_pasien"];
	$umur = $_POST["umur"];
	$jenkel_pasien = $_POST["jenkel_pasien"];
	$no_hp = $_POST["no_hp"];
	$tgl_reg = $_POST["tgl_reg"];

	mysqli_query($koneksi," update pasien set id_pasien='$id_pasien' , nm_pasien='$nm_pasien' , almt_pasien='$almt_pasien' , umur='$umur' , jenkel_pasien='$jenkel_pasien' , no_hp='$no_hp' , tgl_reg='$tgl_reg' where id_pasien='$id_pasien' ");

	header("location:../../?halaman=pendaftaran");
 ?>

