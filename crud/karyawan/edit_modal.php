<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from karyawan where id_karyawan ='$d' ");
      foreach ($data as $da) 
      {
?>

  <!-- isinya body modal edit -->
  <div class="row form-group">
    <div class="col col-md-3">
      <label class=" form-control-label" for="id_karyawan">Kode Karyawan</label>
    </div>
    <div class="col-12 col-md-9">
      <input type="text" readonly="" id="id_karyawan" name="id_karyawan" class="form-control" value="<?php echo $da['id_karyawan']; ?>">
    </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
      <label class=" form-control-label" for="nm_karyawan">Nama</label>
    </div>
    <div class="col-12 col-md-9">
      <input type="text" pattern="^[A-Za-z -]+$" name="nm_karyawan" id="nm_karyawan" placeholder="Nama" class="form-control" value="<?php echo $da["nm_karyawan"]; ?>" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi dan tidak boleh ada Karakter Khusus Maupun Angka')" oninput="setCustomValidity('')">
    </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
      <label class=" form-control-label" for="almt_karyawan">Alamat</label>
    </div>
    <div class="col-12 col-md-9">
      <input type="text" name="almt_karyawan" id="almt_karyawan" placeholder="Alamat" class="form-control" value="<?php echo $da["almt_karyawan"]; ?>" required="" maxlength="150" oninvalid="this.setCustomValidity('Mohon Isikan Alamat')" oninput="setCustomValidity('')">
    </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
      <label for="jenkel_karyawan" class=" form-control-label">Jenis Kelamin</label>
    </div>
    <div class="col-12 col-md-9">
      <select name="jenkel_karyawan" id="jenkel_karyawan" class="form-control" required="" oninvalid="this.setCustomValidity('Pilih Jenis kelamin')" oninput="setCustomValidity('')">
        <option value="" >Please select</option>
        <option value="pria" <?php if($da['jenkel_karyawan']=='pria'){echo "selected";} ?>>Pria</option>
        <option value="wanita" <?php if($da['jenkel_karyawan']=='wanita'){echo "selected";} ?>>Wanita</option>
      </select>
    </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
      <label class=" form-control-label" for="username">Username</label>
    </div>
    <div class="col-12 col-md-9">
      <input type="text" name="username" id="username" placeholder="Username" class="form-control" value="<?php echo $da["username"]; ?>" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Username')" oninput="setCustomValidity('')">
    </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
      <label for="password-input" class=" form-control-label">Password Baru</label>
    </div>
    <div class="col-12 col-md-9">
      <input type="password" id="password-input" name="password" placeholder="Password Baru" class="form-control" value="" required="" maxlength="20" oninvalid="this.setCustomValidity('Mohon Isikan Password')" oninput="setCustomValidity('')">
      <small class="help-block form-text">Please enter a complex password</small>
    </div>
  </div>
  <div class="row form-group">
    <div class="col col-md-3">
      <label class=" form-control-label" for="level">Level</label>
    </div>
    <div class="col-12 col-md-9">
      <select name="level" class="form-control" id="level" required="" oninvalid="this.setCustomValidity('Pilih Level')" oninput="setCustomValidity('')">
        <option value="">Please select</option>
        <option value="admin" <?php if($da['level']=='admin'){echo "selected";} ?>>Admin</option>
        <option value="kasir" <?php if($da['level']=='kasir'){echo "selected";} ?>>Kasir</option>
      </select>
    </div>
  </div>
  <!-- isinya body modal edit -->


<?php
  } 
?>
