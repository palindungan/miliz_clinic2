<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"	
      									SELECT t.id_transaksi , t.total_hrg , t.bayar , t.kembalian , t.tgl_transaksi , p.nm_pasien , k.nm_karyawan , p.id_pasien , k.id_karyawan
                        FROM transaksi t , karyawan k , pasien p
                        WHERE t.id_pasien = p.id_pasien && t.id_karyawan = k.id_karyawan && t.id_transaksi = '$d'
      								");
      foreach ($data as $da) 
      {
?>

<!-- isinya body modal edit -->
<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label" for="id_transaksi">Kode Transaksi</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="text" readonly="" id="id_transaksi" name="id_transaksi" class="form-control" value="<?php echo $da['id_transaksi']; ?>">
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label">Pasien</label>
  </div>
  <div class="col-12 col-md-9">
    <select name="id_pasien" id="id_pasien" class="form-control" required="" oninvalid="this.setCustomValidity('Pasien Wajib Diisi')" oninput="setCustomValidity('')">
      <option value="">Pilih Pasien</option>
      <?php
          $data2 = mysqli_query($koneksi,"SELECT p.id_pasien, p.nm_pasien 
                                          from pasien p
                                          order by p.nm_pasien;
                              ");
          foreach ($data2 as $d2) 
          {
      ?>
      
      <option value="<?php echo $d2["id_pasien"]; ?>" <?php if($da['id_pasien']==$d2["id_pasien"]){echo "selected";} ?> >
          <?php echo $d2["nm_pasien"]; ?>
      </option>

      <?php 
          }
      ?>
    </select>
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label">Karyawan</label>
  </div>
  <div class="col-12 col-md-9">
    <select name="id_karyawan" id="id_karyawan" class="form-control" required="" oninvalid="this.setCustomValidity('Karyawan Wajib Diisi')" oninput="setCustomValidity('')">
      <option value="">Pilih Karyawan</option>
      <?php
          $data2 = mysqli_query($koneksi,"SELECT k.id_karyawan, k.nm_karyawan 
                                          from karyawan k
                                          order by k.nm_karyawan;
                              ");
          foreach ($data2 as $d2) 
          {
      ?>
      
      <option value="<?php echo $d2["id_karyawan"]; ?>" <?php if($da['id_karyawan']==$d2["id_karyawan"]){echo "selected";} ?> >
          <?php echo $d2["nm_karyawan"]; ?>
      </option>

      <?php 
          }
      ?>
    </select>
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label">Total Harga</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="number" id="total_hrg" name="total_hrg" placeholder="Total Harga" value="<?php echo $da["total_hrg"]; ?>" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label">Bayar</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="number" id="bayar" name="bayar" placeholder="Bayar" value="<?php echo $da["bayar"]; ?>" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
      <label class=" form-control-label">Kembalian</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="number" id="kembalian" name="kembalian" placeholder="Kembalian" value="<?php echo $da["kembalian"]; ?>" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
    <label for="tgl_transaksi" class=" form-control-label">Tanggal Pemasokan</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="date" id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Pemasokan" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal ')" oninput="setCustomValidity('')" value="<?php echo $da["tgl_transaksi"]; ?>">
  </div>
</div>
<!-- isinya body modal edit -->

<!-- untuk selectpicker -->
<!-- <script src="../../js/bootstrap.bundle.min.js"></script>
<script src="../../js/bootstrap-select.js"></script> -->
<!-- untuk selectpicker -->

<?php
  } 
?>
