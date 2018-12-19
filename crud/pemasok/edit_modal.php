<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from pemasok where id_pemasok ='$d' ");
      foreach ($data as $da) 
      {
?>

  <!-- isinya body modal edit -->
<div class="row form-group">
    <div class="col col-md-3">
        <label for="id_pemasok" class=" form-control-label">Kode Pemasok</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="" id="id_pemasok" name="id_pemasok" placeholder="" class="form-control" value="<?php echo $da['id_pemasok']; ?>" readonly="">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label" for="nm_pemasok">Nama</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="nm_pemasok" name="nm_pemasok" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')" value="<?php echo $da['nm_pemasok']; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label" for="almt_pemasok">Alamat</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="almt_pemasok" name="almt_pemasok" placeholder="Alamat" class="form-control" required="" maxlength="200" oninvalid="this.setCustomValidity('Mohon Isikan Alamat')" oninput="setCustomValidity('')" value="<?php echo $da['almt_pemasok']; ?>">
    </div>
</div>
<div class="row form-group">
    <div class="col col-md-3">
        <label for="no_hp" class=" form-control-label">No. Handphone</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="text" id="no_hp" name="no_hp" pattern="\(?(?:\+62|62|0)(?:\d{2,3})?\)?[ .-]?\d{2,4}[ .-]?\d{2,4}[ .-]?\d{2,4}" placeholder="No. Handphone" class="form-control" required="" maxlength="15" oninvalid="this.setCustomValidity('Mohon Isikan No. Handphone Dengan Benar')" oninput="setCustomValidity('')" value="<?php echo $da['no_hp']; ?>">
    </div>
</div>
  <!-- isinya body modal edit -->


<?php
  } 
?>
