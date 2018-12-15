<?php 
	include "../../koneksi/koneksi.php";

	$id_stok_obat = $_POST["id_stok_obat"];
	$id_pemasokan = $_POST["id_pemasokan"];
	$id_obat = $_POST["id_obat"];
	$tgl_exp = $_POST["tgl_exp"];
	$jumlah_stok = $_POST["jumlah_stok"];

	mysqli_query($koneksi," UPDATE stok_obat SET id_stok_obat='$id_stok_obat' , id_pemasokan='$id_pemasokan' , id_obat='$id_obat' , tgl_exp='$tgl_exp' , jumlah_stok='$jumlah_stok' WHERE id_stok_obat='$id_stok_obat' ");

	header("location:../../?halaman=obat&tap=1");
 ?>