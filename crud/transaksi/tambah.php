<?php 

include "../../koneksi/database_connection.php";
include "../../koneksi/function.php";

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		// massukan data ke transaksi
		$query = "
		INSERT INTO transaksi (id_transaksi, id_pasien, id_karyawan, total_hrg, bayar, kembalian, tgl_transaksi) 
		VALUES (:id_transaksi, :id_pasien, :id_karyawan, :total_hrg, :bayar, :kembalian, :tgl_transaksi)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_transaksi'		=>	$_POST['id_transaksi'],
				':id_pasien'		=>	$_POST['id_pasien'],
				':id_karyawan'		=>	$_SESSION["id_karyawan"],
				':total_hrg'		=>	$_POST["total_hrg"],
				':bayar'			=>	$_POST['bayar'],
				':kembalian'		=>	$_POST['kembalian'],
				':tgl_transaksi'	=>	$_POST['tgl_transaksi'],
			)
		);
		// massukan data ke transaksi
		
		$result = $statement->fetchAll();
		$statement = $connect->query("	SELECT id_transaksi
										FROM transaksi
										ORDER BY id_transaksi DESC
										LIMIT 1;
									");
		$id_transaksi = $statement->fetchColumn();

		if(isset($id_transaksi))
		{
			// input (detail) transaksi obat
			if (isset($_POST["id_stok_obat"])) 
			{
				for($count = 0; $count<count($_POST["id_stok_obat"]); $count++)
				{
					$harga_o = 0;

					$product_details = data_stok_obat($_POST["id_stok_obat"][$count], $connect);
					$harga_o = $product_details['hrg_jual'] * $_POST["qty_obat"][$count];

					// massukan data ke transaksi obat
					$sub_query = "
					INSERT INTO transaksi_obat (id_transaksi, id_stok_obat, qty_obat,harga_o) 
					VALUES (:id_transaksi, :id_stok_obat, :qty_obat, :harga_o)
					";
					$statement = $connect->prepare($sub_query);
					$statement->execute(
						array(
							':id_transaksi'	=>	$id_transaksi,
							':id_stok_obat'	=>	$_POST["id_stok_obat"][$count],
							':qty_obat'		=>	$_POST["qty_obat"][$count],
							':harga_o'		=>	$harga_o
						)
					);
					// massukan data ke transaksi obat

					$id_stok_obat = $_POST["id_stok_obat"][$count];
					$update_stok = $product_details['jumlah_stok'] - $_POST["qty_obat"][$count];

					// update stok obat
					$update_query = "
					UPDATE stok_obat
					SET jumlah_stok = '".$update_stok."'
					WHERE id_stok_obat = '".$id_stok_obat."'
					";
					$statement = $connect->prepare($update_query);
					$statement->execute();
					// update stok obat
				}
			}
			// input (detail) transaksi obat

			// input (detail) transaksi perawatan
			if (isset($_POST["id_perawatan"])) 
			{
				for($count = 0; $count<count($_POST["id_perawatan"]); $count++)
				{
					$harga_p = 0;

					$product_details = data_perawatan($_POST["id_perawatan"][$count], $connect);
					$harga_p = $product_details['hrg_perawatan'] * $_POST["qty_perawatan"][$count];

					// massukan data ke transaksi obat
					$sub_query = "
					INSERT INTO transaksi_perawatan (id_transaksi, id_perawatan, qty_perawatan,harga_p) 
					VALUES (:id_transaksi, :id_perawatan, :qty_perawatan, :harga_p)
					";
					$statement = $connect->prepare($sub_query);
					$statement->execute(
						array(
							':id_transaksi'		=>	$id_transaksi,
							':id_perawatan'		=>	$_POST["id_perawatan"][$count],
							':qty_perawatan'	=>	$_POST["qty_perawatan"][$count],
							':harga_p'			=>	$harga_p
						)
					);
					// massukan data ke transaksi obat
				}
			}
			// input (detail) transaksi perawatan
			
			// input (detail) transaksi konsultasi
			if (isset($_POST["id_konsultasi"])) 
			{
				for($count = 0; $count<count($_POST["id_konsultasi"]); $count++)
				{
					$harga_k = 0;

					$product_details = data_konsultasi($_POST["id_konsultasi"][$count], $connect);
					$harga_k = $product_details['hrg_konsultasi'] * $_POST["qty_konsultasi"][$count];

					// massukan data ke transaksi konsultasi
					$sub_query = "
					INSERT INTO transaksi_konsultasi (id_transaksi, id_konsultasi, qty_konsultasi,harga_k) 
					VALUES (:id_transaksi, :id_konsultasi, :qty_konsultasi, :harga_k)
					";
					$statement = $connect->prepare($sub_query);
					$statement->execute(
						array(
							':id_transaksi'			=>	$id_transaksi,
							':id_konsultasi'		=>	$_POST["id_konsultasi"][$count],
							':qty_konsultasi'		=>	$_POST["qty_konsultasi"][$count],
							':harga_k'				=>	$harga_k
						)
					);
					// massukan data ke transaksi konsultasi
				}
			}
			// input (detail) transaksi konsultasi
		}
	}
}

?>