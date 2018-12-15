<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from konsultasi where id_konsultasi ='$d' ");
      foreach ($data as $da) 
      {
?>

<div class="row form-group">
    <div class="col col-md-3">
        <label for="id_konsultasi" class="form-control-label">Kode Konsultasi</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="" id="id_konsultasi" name="id_konsultasi" placeholder="" class="form-control" value="<?php echo $da["id_konsultasi"]; ?>" readonly="">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label">Nama Konsultasi</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="nm_konsultasi" name="nm_konsultasi" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Nama jenis Obat')" oninput="setCustomValidity('')" value="<?php echo $da["nm_konsultasi"]; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label">Harga Konsultasi</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="hrg_konsultasi" name="hrg_konsultasi" placeholder="Harga" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')" value="<?php echo $da["hrg_konsultasi"]; ?>">
    </div>
</div>

<?php
  } 
?>