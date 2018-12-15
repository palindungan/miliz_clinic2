<?php 
	include "../../koneksi/koneksi.php";

	$id_perawatan = $_POST["id_perawatan"];
	$nm_perawatan = $_POST["nm_perawatan"];
	$hrg_perawatan = $_POST["hrg_perawatan"];

	mysqli_query($koneksi," update perawatan set id_perawatan='$id_perawatan' , nm_perawatan='$nm_perawatan' , hrg_perawatan='$hrg_perawatan' where id_perawatan='$id_perawatan' ");

	header("location:../../?halaman=perawatan");
 ?>