<?php 
	include "../../koneksi/koneksi.php";

	$id_karyawan = $_POST["id_karyawan"];
	$nm_karyawan = $_POST["nm_karyawan"];
	$almt_karyawan = $_POST["almt_karyawan"];
	$jenkel_karyawan = $_POST["jenkel_karyawan"];
	$username = $_POST["username"];
	$password = password_hash($_POST["password"], PASSWORD_DEFAULT);
	$level = $_POST["level"];
	

	mysqli_query($koneksi,"insert into karyawan values ('$id_karyawan','$nm_karyawan','$almt_karyawan','$jenkel_karyawan','$username','$password','$level')");

	header("location:../../?halaman=karyawan");
 ?>