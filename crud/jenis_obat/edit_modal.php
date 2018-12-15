<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from jenis_obat where id_jenis_obat ='$d' ");
      foreach ($data as $da) 
      {
?>

		<div class="row form-group">
            <div class="col col-md-3">
                <label for="id_jenis_obat" class="form-control-label">Kode Jenis Obat</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="" id="id_jenis_obat" name="id_jenis_obat" placeholder="" class="form-control" value="<?php echo $da["id_jenis_obat"]; ?>" readonly="">
            </div>
        </div>
        <div class="row form-group">
            <div class="col col-md-3">
                <label class=" form-control-label">Nama Jenis Obat</label>
            </div>
            <div class="col-12 col-md-9">
                <input type="text" id="nm_jenis_obat" name="nm_jenis_obat" placeholder="Nama Jenis Obat" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Nama jenis Obat')" oninput="setCustomValidity('')" value="<?php echo $da["nm_jenis_obat"]; ?>">
            </div>
        </div>

<?php
  } 
?>