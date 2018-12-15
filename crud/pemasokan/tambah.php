<?php 

include "../../koneksi/database_connection.php";
include "../../koneksi/function.php";

if(isset($_POST['btn_action']))
{
	if($_POST['btn_action'] == 'Add')
	{
		$query = "
		INSERT INTO pemasokan (id_pemasokan, id_karyawan, id_pemasok, total_hrg, bayar, kembalian, tgl_pemasokan) 
		VALUES (:id_pemasokan, :id_karyawan, :id_pemasok, :total_hrg, :bayar, :kembalian, :tgl_pemasokan)
		";
		$statement = $connect->prepare($query);
		$statement->execute(
			array(
				':id_pemasokan'		=>	$_POST['id_pemasokan'],
				':id_karyawan'		=>	$_SESSION["id_karyawan"],
				':id_pemasok'		=>	$_POST['id_pemasok'],
				':total_hrg'		=>	0,
				':bayar'			=>	$_POST['bayar'],
				':kembalian'		=>	0,
				':tgl_pemasokan'	=>	$_POST['tgl_pemasokan']
			)
		);
		$result = $statement->fetchAll();
		$statement = $connect->query("	SELECT id_pemasokan
										FROM pemasokan
										ORDER BY id_pemasokan DESC
										LIMIT 1;
									");
		$id_pemasokan = $statement->fetchColumn();

		if(isset($id_pemasokan))
		{
			$total_hrg = 0;
			$kembalian = 0;
			for($count = 0; $count<count($_POST["id_obat"]); $count++)
			{
				$product_details = data_obat($_POST["id_obat"][$count], $connect);
				$harga = $product_details['hrg_beli'] * $_POST["jumlah_stok"][$count];
				$total_hrg = $total_hrg + $harga;
				
				$sub_query = "
				INSERT INTO stok_obat (id_pemasokan, id_obat, tgl_exp, jumlah_stok, stok_awal , harga_so) 
				VALUES (:id_pemasokan, :id_obat, :tgl_exp, :jumlah_stok, :stok_awal, :harga_so)
				";
				$statement = $connect->prepare($sub_query);
				$statement->execute(
					array(
						':id_pemasokan'	=>	$id_pemasokan,
						':id_obat'		=>	$_POST["id_obat"][$count],
						':tgl_exp'		=>	$_POST["tgl_exp"][$count],
						':jumlah_stok'	=>	$_POST["jumlah_stok"][$count],
						':stok_awal'	=>	$_POST["jumlah_stok"][$count],
						':harga_so'		=>	$harga
					)
				);
			}

			$kembalian = $_POST['bayar'] - $total_hrg;

			$update_query = "
			UPDATE pemasokan 
			SET total_hrg = '".$total_hrg."' , kembalian = '".$kembalian."'
			WHERE id_pemasokan = '".$id_pemasokan."'
			";
			$statement = $connect->prepare($update_query);
			$statement->execute();
			$result = $statement->fetchAll();
			if(isset($result))
			{
				// header("location:../../?halaman=pemasokan&tap=1");
			}
		}
	}
}

?>