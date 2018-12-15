<?php  
	include "../../koneksi/koneksi.php";

	$id = $_POST["id_perawatan"];
	$nm = $_POST["nm_perawatan"];
	$hrg = $_POST["hrg_perawatan"];


	mysqli_query($koneksi,"insert into perawatan values ('$id','$nm','$hrg')");


	header("location:../../?halaman=perawatan");
?>