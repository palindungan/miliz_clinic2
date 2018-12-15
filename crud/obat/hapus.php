		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_obat"];
			mysqli_query($koneksi,"delete from obat where id_obat ='$d' ");
		?>
