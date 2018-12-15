		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_konsultasi"];
			mysqli_query($koneksi,"delete from konsultasi where id_konsultasi ='$d' ");
		?>
