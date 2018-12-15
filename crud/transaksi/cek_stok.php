<?php 

include "../../koneksi/database_connection.php";
include "../../koneksi/function.php";

// cek stok obat 
if (isset($_POST["qty_obat"])) 
{
	for($count = 0; $count<count($_POST["id_stok_obat"]); $count++)
	{
		$update_stok = 0;

		$product_details = data_stok_obat($_POST["id_stok_obat"][$count], $connect);

		$id_stok_obat = $_POST["id_stok_obat"][$count];
		$nm_obat = $product_details['nm_obat'];

		$update_stok = $product_details['jumlah_stok'] - $_POST["qty_obat"][$count];

		if ($update_stok < 0) {
			echo 1;
		}
	}
}
// cek stok obat 

 ?>