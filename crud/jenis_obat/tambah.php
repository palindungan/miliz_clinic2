<?php  
	include "../../koneksi/koneksi.php";

	$id = $_POST["id_jenis_obat"];
	$nm = $_POST["nm_jenis_obat"];


	mysqli_query($koneksi,"insert into jenis_obat values ('$id','$nm')");


	header("location:../../?halaman=obat&tap=3");
?>

