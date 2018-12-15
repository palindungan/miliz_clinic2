<?php 
	include "../../koneksi/koneksi.php";

	$id_karyawan = $_POST["id_karyawan"];
	$nm_karyawan = $_POST["nm_karyawan"];
	$almt_karyawan = $_POST["almt_karyawan"];
	$jenkel_karyawan = $_POST["jenkel_karyawan"];
	$username = $_POST["username"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$level = $_POST["level"];

	mysqli_query($koneksi," update karyawan set id_karyawan='$id_karyawan' , nm_karyawan='$nm_karyawan' , almt_karyawan='$almt_karyawan' , jenkel_karyawan='$jenkel_karyawan' , username='$username' , password='$password' , level='$level' where id_karyawan='$id_karyawan' ");

	header("location:../../?halaman=karyawan");
 ?>

