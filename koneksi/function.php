<?php
//function.php

function fill_product_list($connect)
{
	$query = "
	SELECT o.id_obat, o.nm_obat , jo.nm_jenis_obat
	FROM obat o, jenis_obat jo
	WHERE o.id_jenis_obat = jo.id_jenis_obat 
	ORDER BY o.nm_obat ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["id_obat"].'">'.$row["nm_obat"].' ('.$row["nm_jenis_obat"].') '.'</option>';
	}
	return $output;
}

function fill_stok_obat($connect)
{
	$query = "
	SELECT s.id_stok_obat , p.id_pemasokan , o.id_obat , o.nm_obat , s.tgl_exp , s.jumlah_stok 
	FROM stok_obat s, pemasokan p , obat o
	WHERE s.id_pemasokan = p.id_pemasokan && s.id_obat = o.id_obat && s.jumlah_stok > 0 
	ORDER BY o.nm_obat ASC , s.tgl_exp ASC;
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["id_stok_obat"].'">'.$row["nm_obat"].' ('.$row["tgl_exp"].') '.'</option>';
	}
	return $output;
}

function fill_perawatan($connect)
{
	$query = "
	SELECT *
	FROM perawatan p
	ORDER BY p.nm_perawatan ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["id_perawatan"].'">'.$row["nm_perawatan"].'</option>';
	}
	return $output;
}

function fill_konsultasi($connect)
{
	$query = "
	SELECT *
	FROM konsultasi k
	ORDER BY k.nm_konsultasi ASC
	";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	$output = '';
	foreach($result as $row)
	{
		$output .= '<option value="'.$row["id_konsultasi"].'">'.$row["nm_konsultasi"].'</option>';
	}
	return $output;
}

function data_obat($id_obat, $connect)
{
	$query = "
	SELECT * FROM obat 
	WHERE id_obat = '".$id_obat."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['id_obat'] = $row["id_obat"];
		$output['id_jenis_obat'] = $row["id_jenis_obat"];
		$output['nm_obat'] = $row['nm_obat'];
		$output['hrg_beli'] = $row['hrg_beli'];
		$output['hrg_jual'] = $row['hrg_jual'];
	}
	return $output;
}

function data_stok_obat($id_stok_obat, $connect)
{
	$query = "
	
	SELECT s.id_stok_obat , o.id_obat , o.nm_obat, o.hrg_beli, o.hrg_jual , s.jumlah_stok 
	FROM stok_obat s, obat o
	WHERE s.id_obat = o.id_obat && s.id_stok_obat = '".$id_stok_obat."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['id_stok_obat'] = $row["id_stok_obat"];
		$output['id_obat'] = $row["id_obat"];
		$output['nm_obat'] = $row['nm_obat'];
		$output['hrg_beli'] = $row['hrg_beli'];
		$output['hrg_jual'] = $row['hrg_jual'];
		$output['jumlah_stok'] = $row['jumlah_stok'];
	}
	return $output;
}

function data_perawatan($id_perawatan, $connect)
{
	$query = "
	SELECT * FROM perawatan 
	WHERE id_perawatan = '".$id_perawatan."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['id_perawatan'] = $row["id_perawatan"];
		$output['nm_perawatan'] = $row["nm_perawatan"];
		$output['hrg_perawatan'] = $row['hrg_perawatan'];
	}
	return $output;
}

function data_konsultasi($id_konsultasi, $connect)
{
	$query = "
	SELECT * FROM konsultasi 
	WHERE id_konsultasi = '".$id_konsultasi."'";
	$statement = $connect->prepare($query);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output['id_konsultasi'] = $row["id_konsultasi"];
		$output['nm_konsultasi'] = $row["nm_konsultasi"];
		$output['hrg_konsultasi'] = $row['hrg_konsultasi'];
	}
	return $output;
}

?>