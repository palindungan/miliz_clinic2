<!-- koneksi -->
<?php 
	$koneksi = mysqli_connect("localhost","root","","si_web");
	if (!$koneksi) 
	{
		echo "koneksi data base gagal = ".mysqli_connect_error();
	}
	// else
	// {
	// 	echo "koneksi telah berhasil";
	// }
    //-- auto generate kode
    function kode($field,$tabel,$digit,$kode){
	$koneksi2 = mysqli_connect("localhost","root","","si_web");

	$data = mysqli_fetch_array(mysqli_query($koneksi2,"SELECT MAX(RIGHT($field,$digit)) FROM $tabel"));
	$id = (int)$data[0]+1;
	$id_baru = $kode.sprintf('%0'.$digit.'s',$id);
	echo $id_baru;
	}
?>
<!-- koneksi -->

