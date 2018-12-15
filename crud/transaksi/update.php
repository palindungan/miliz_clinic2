<?php 
	include "../../koneksi/koneksi.php";

	$id_transaksi = $_POST["id_transaksi"];
	$id_pasien = $_POST["id_pasien"];
	$id_karyawan = $_POST["id_karyawan"];
	$total_hrg = $_POST["total_hrg"];
	$bayar = $_POST["bayar"];
	$kembalian = $_POST["kembalian"];
	$tgl_transaksi = $_POST["tgl_transaksi"];

	mysqli_query($koneksi," UPDATE transaksi SET id_transaksi='$id_transaksi' , id_pasien='$id_pasien' , id_karyawan='$id_karyawan' , total_hrg='$total_hrg' , bayar='$bayar' , kembalian='$kembalian' , tgl_transaksi='$tgl_transaksi' WHERE id_transaksi='$id_transaksi' ");

	header("location:../../?halaman=transaksi&tap=2");
 ?>