		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id_karyawan"];
			mysqli_query($koneksi,"delete from karyawan where id_karyawan ='$d' ");
		?>