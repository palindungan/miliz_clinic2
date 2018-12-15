		<?php 
			include "../../koneksi/koneksi.php";
			$d = $_POST["id"];
			mysqli_query($koneksi,"delete from pemasokan where id_pemasokan ='$d' ");
		?>