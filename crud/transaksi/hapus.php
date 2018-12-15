		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id"];
			mysqli_query($koneksi,"delete from transaksi where id_transaksi ='$d' ");
		?>