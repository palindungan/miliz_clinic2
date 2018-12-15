<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from perawatan where id_perawatan ='$d' ");
      foreach ($data as $da) 
      {
?>

<div class="row form-group">
    <div class="col col-md-3">
        <label for="id_perawatan" class="form-control-label">Kode Perawatan</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="" id="id_perawatan" name="id_perawatan" placeholder="" class="form-control" value="<?php echo $da["id_perawatan"]; ?>" readonly="">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label">Nama Konsultasi</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="nm_perawatan" name="nm_perawatan" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Nama Perawatan')" oninput="setCustomValidity('')" value="<?php echo $da["nm_perawatan"]; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label">Harga Konsultasi</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="hrg_perawatan" name="hrg_perawatan" placeholder="Harga" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')" value="<?php echo $da["hrg_perawatan"]; ?>">
    </div>
</div>

<?php
  } 
?>