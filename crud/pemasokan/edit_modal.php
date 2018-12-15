<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"	
      									SELECT pm.id_pemasokan , k.nm_karyawan , p.nm_pemasok , pm.total_hrg , pm.bayar , pm.kembalian , pm.tgl_pemasokan , k.id_karyawan, p.id_pemasok
      									FROM pemasokan pm , pemasok p, karyawan k 
      									WHERE pm.id_pemasokan ='$d' && pm.id_pemasok = p.id_pemasok && pm.id_karyawan = k.id_karyawan
      								");
      foreach ($data as $da) 
      {
?>

<!-- isinya body modal edit -->
<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label" for="id_pemasokan">Kode Pemasokan</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="text" readonly="" id="id_pemasokan" name="id_pemasokan" class="form-control" value="<?php echo $da['id_pemasokan']; ?>">
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
    <label class=" form-control-label">Pemasok Obat</label>
  </div>
  <div class="col-12 col-md-9">
    <select name="id_pemasok" id="id_pemasok" class="form-control" required="" oninvalid="this.setCustomValidity('pemasok Obat Wajib Diisi')" oninput="setCustomValidity('')">
      <option value="">Pilih Pemasok</option>
      <?php
          $data3 = mysqli_query($koneksi,"SELECT p.id_pemasok, p.nm_pemasok 
                                          from pemasok p
                                          order by p.nm_pemasok;
                              ");
          foreach ($data3 as $d3) 
          {
      ?>

      <option value="<?php echo $d3["id_pemasok"]; ?>" <?php if($da['id_pemasok']==$d3["id_pemasok"]){echo "selected";} ?> >
          <?php echo $d3["nm_pemasok"]; ?>
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
    <label for="tgl_pemasokan" class=" form-control-label">Tanggal Pemasokan</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="date" id="tgl_pemasokan" name="tgl_pemasokan" placeholder="Tanggal Pemasokan" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal ')" oninput="setCustomValidity('')" value="<?php echo $da["tgl_pemasokan"]; ?>">
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
