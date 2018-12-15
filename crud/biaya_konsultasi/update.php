<?php 
	include "../../koneksi/koneksi.php";

	$id_konsultasi = $_POST["id_konsultasi"];
	$nm_konsultasi = $_POST["nm_konsultasi"];
	$hrg_konsultasi = $_POST["hrg_konsultasi"];

	mysqli_query($koneksi," update konsultasi set id_konsultasi='$id_konsultasi' , nm_konsultasi='$nm_konsultasi' , hrg_konsultasi='$hrg_konsultasi' where id_konsultasi='$id_konsultasi' ");

	header("location:../../?halaman=biaya_konsultasi");
 ?>