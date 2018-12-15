<?php 

include "../../koneksi/database_connection.php";
include "../../koneksi/function.php";

$qty_obat = 0;
$qty_perawatan = 0;
$qty_konsultasi = 0;

$total_hrg1 = 0;
$total_hrg2 = 0;
$total_hrg3 = 0;

if (isset($_POST["qty_obat"])) 
{
	$qty_obat = $_POST["qty_obat"];
	if ( $qty_obat > 0) 
	{
		for($count = 0; $count<count($_POST["id_stok_obat"]); $count++)
		{
			$product_details1 = data_stok_obat($_POST["id_stok_obat"][$count], $connect);

			$harga1 = $product_details1['hrg_jual'] * $_POST["qty_obat"][$count];
			$total_hrg1 = $total_hrg1 + $harga1;
		}
	}
}

if (isset($_POST["qty_perawatan"])) 
{
	$qty_perawatan = $_POST["qty_perawatan"];
	if ( $qty_perawatan > 0) 
	{
		for($count = 0; $count<count($_POST["id_perawatan"]); $count++)
		{
			$product_details2 = data_perawatan($_POST["id_perawatan"][$count], $connect);

			$harga2 = $product_details2['hrg_perawatan'] * $_POST["qty_perawatan"][$count];
			$total_hrg2 = $total_hrg2 + $harga2;
		}
	}
}

if (isset($_POST["qty_konsultasi"])) 
{
	$qty_konsultasi = $_POST["qty_konsultasi"];
	if ( $qty_konsultasi > 0) 
	{
		for($count = 0; $count<count($_POST["id_konsultasi"]); $count++)
		{
			$product_details3 = data_konsultasi($_POST["id_konsultasi"][$count], $connect);

			$harga3 = $product_details3['hrg_konsultasi'] * $_POST["qty_konsultasi"][$count];
			$total_hrg3 = $total_hrg3 + $harga3;
		}
	}
}

$total = $total_hrg1 + $total_hrg2 + $total_hrg3;

echo $total;

?>