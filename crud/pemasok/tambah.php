<?php 
	include "../../koneksi/koneksi.php";

	$id_pemasok = $_POST["id_pemasok"];
	$nm_pemasok = $_POST["nm_pemasok"];
	$almt_pemasok = $_POST["almt_pemasok"];
	$no_hp = $_POST["no_hp"];

	mysqli_query($koneksi,"insert into pemasok values ('$id_pemasok','$nm_pemasok','$almt_pemasok','$no_hp')");

	header("location:../../?halaman=pemasok");
 ?>