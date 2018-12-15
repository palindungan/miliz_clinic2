		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_perawatan"];
			mysqli_query($koneksi,"delete from perawatan where id_perawatan ='$d' ");
		?>
