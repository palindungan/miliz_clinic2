<?php 

include "../../koneksi/database_connection.php";
include "../../koneksi/function.php";

$stok = $_POST["jumlah_stok"];

if ( $stok > 0) 
{
	$total_hrg = 0;

	for($count = 0; $count<count($_POST["id_obat"]); $count++)
	{
		$product_details = data_obat($_POST["id_obat"][$count], $connect);

		$harga = $product_details['hrg_beli'] * $_POST["jumlah_stok"][$count];
		$total_hrg = $total_hrg + $harga;
	}

	echo $total_hrg;
}

?>