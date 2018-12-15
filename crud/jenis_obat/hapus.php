		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_jenis_obat"];
			mysqli_query($koneksi,"delete from jenis_obat where id_jenis_obat ='$d' ");
		?>
