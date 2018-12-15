<?php 
	include "../../koneksi/koneksi.php";

	$id_pemasokan = $_POST["id_pemasokan"];
	$id_karyawan = $_POST["id_karyawan"];
	$id_pemasok = $_POST["id_pemasok"];
	$total_hrg = $_POST["total_hrg"];
	$bayar = $_POST["bayar"];
	$kembalian = $_POST["kembalian"];
	$tgl_pemasokan = $_POST["tgl_pemasokan"];

	mysqli_query($koneksi," UPDATE pemasokan SET id_pemasokan='$id_pemasokan' , id_karyawan='$id_karyawan' , id_pemasok='$id_pemasok' , total_hrg='$total_hrg' , bayar='$bayar' , kembalian='$kembalian' , tgl_pemasokan='$tgl_pemasokan' WHERE id_pemasokan='$id_pemasokan' ");

	header("location:../../?halaman=pemasokan&tap=2");
 ?>
