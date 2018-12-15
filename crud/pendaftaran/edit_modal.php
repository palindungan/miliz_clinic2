<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from pasien where id_pasien ='$d' ");
      foreach ($data as $da) 
      {
?>

  <!-- isinya body modal edit -->
  <div class="row form-group">
      <div class="col col-md-3">
          <label for="id_pasien" class=" form-control-label">Kode Pasien</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" id="id_pasien" name="id_pasien" placeholder="" class="form-control" value="<?php echo $da['id_pasien']; ?>" readonly="">
      </div>
  </div>
  <div class="row form-group">
      <div class="col col-md-3">
          <label class=" form-control-label" for="nm_pasien">Nama</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" pattern="^[A-Za-z -]+$" id="nm_pasien" name="nm_pasien" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi dan tidak boleh ada Karakter Khusus Maupun Angka')" oninput="setCustomValidity('')" value="<?php echo $da["nm_pasien"]; ?>">
      </div>
  </div>
  <div class="row form-group">
      <div class="col col-md-3">
          <label class=" form-control-label" for="almt_pasien">Alamat</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" id="almt_pasien" name="almt_pasien" placeholder="Alamat" class="form-control" required="" maxlength="150" oninvalid="this.setCustomValidity('Mohon Isikan Alamat')" oninput="setCustomValidity('')" value="<?php echo $da["almt_pasien"]; ?>">
      </div>
  </div>
  <div class="row form-group">
      <div class="col col-md-3">
          <label class=" form-control-label" for="umur">Umur</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="number" id="umur" name="umur" placeholder="Umur" class="form-control" required="" max="999" oninvalid="this.setCustomValidity('Umur Wajib Diisi dan Maksimal 3 digit')" oninput="setCustomValidity('')" value="<?php echo $da["umur"]; ?>">
      </div>
  </div>
  <div class="row form-group">
      <div class="col col-md-3">
          <label for="jenkel_pasien" class=" form-control-label">Jenis Kelamin</label>
      </div>
      <div class="col-12 col-md-9">
          <select id="jenkel_pasien" name="jenkel_pasien" class="form-control" required="" oninvalid="this.setCustomValidity('Pilih Jenis kelamin')" oninput="setCustomValidity('')">
              <option value="">Please select</option>
              <option value="pria" <?php if($da['jenkel_pasien']=='pria'){echo "selected";} ?>>Pria</option>
              <option value="wanita" <?php if($da['jenkel_pasien']=='wanita'){echo "selected";} ?>>Wanita</option>
          </select>
      </div>
  </div>
  
  <div class="row form-group">
      <div class="col col-md-3">
          <label for="no_hp" class=" form-control-label">No. Handphone</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="text" id="no_hp" name="no_hp" pattern="\(?(?:\+62|62|0)(?:\d{2,3})?\)?[ .-]?\d{2,4}[ .-]?\d{2,4}[ .-]?\d{2,4}" placeholder="No. Handphone" class="form-control" required="" maxlength="15" oninvalid="this.setCustomValidity('Mohon Isikan No. Handphone Dengan Benar')" oninput="setCustomValidity('')" value="<?php echo $da["no_hp"]; ?>">
      </div>
  </div>
  <div class="row form-group">
      <div class="col col-md-3">
          <label for="tgl_reg" class=" form-control-label">Tanggal Pendaftaran</label>
      </div>
      <div class="col-12 col-md-9">
          <input type="date" id="tgl_reg" name="tgl_reg" placeholder="Tanggal Pendaftaran" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal ')" oninput="setCustomValidity('')" value="<?php echo $da["tgl_reg"]; ?>">
      </div>
  </div>
  <!-- isinya body modal edit -->


<?php
  } 
?>
