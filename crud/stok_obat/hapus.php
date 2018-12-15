		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id"];
			mysqli_query($koneksi,"delete from stok_obat where id_stok_obat ='$d' ");
		?>