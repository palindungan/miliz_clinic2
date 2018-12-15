<?php  
	include "../../koneksi/koneksi.php";

	$id = $_POST["id_konsultasi"];
	$nm = $_POST["nm_konsultasi"];
	$hrg = $_POST["hrg_konsultasi"];


	mysqli_query($koneksi,"insert into konsultasi values ('$id','$nm','$hrg')");


	header("location:../../?halaman=biaya_konsultasi");
?>