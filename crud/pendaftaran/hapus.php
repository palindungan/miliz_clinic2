		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_pasien"];
			mysqli_query($koneksi,"delete from pasien where id_pasien ='$d' ");
		?>