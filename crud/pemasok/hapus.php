		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_pemasok"];
			mysqli_query($koneksi,"delete from pemasok where id_pemasok ='$d' ");
		?>