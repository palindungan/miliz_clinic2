<?php  
	include "../../koneksi/koneksi.php";
	$id_obat = $_POST ['id_obat'];
	$nm_obat = $_POST ['nm_obat'];
	$id_jenis_obat = $_POST ['id_jenis_obat'];
	$hrg_beli = $_POST ['hrg_beli'];
	$hrg_jual = $_POST ['hrg_jual'];


	mysqli_query ($koneksi, "update obat set id_obat='$id_obat', id_jenis_obat='$id_jenis_obat', nm_obat='$nm_obat', hrg_beli='$hrg_beli', hrg_jual='$hrg_jual' WHERE id_obat='$id_obat'");

	header("location:../../?halaman=obat&tap=2");
?>

