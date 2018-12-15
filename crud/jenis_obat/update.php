<?php 
	include "../../koneksi/koneksi.php";

	$id_jenis_obat = $_POST["id_jenis_obat"];
	$nm_jenis_obat = $_POST["nm_jenis_obat"];

	mysqli_query($koneksi," update jenis_obat set id_jenis_obat='$id_jenis_obat' , nm_jenis_obat='$nm_jenis_obat' where id_jenis_obat='$id_jenis_obat' ");

	header("location:../../?halaman=obat&tap=3");
 ?>

