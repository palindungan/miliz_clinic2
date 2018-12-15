<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"	SELECT s.id_stok_obat , p.id_pemasokan , o.id_obat , o.nm_obat , s.tgl_exp , s.jumlah_stok
								      	FROM stok_obat s, pemasokan p , obat o
								     	WHERE s.id_stok_obat ='$d' && s.id_pemasokan = p.id_pemasokan && s.id_obat = o.id_obat; ");
      foreach ($data as $da) 
      {
?>

<div class="row form-group">
  <div class="col col-md-3">
    <label class=" form-control-label" for="id_stok_obat">Kode Stok Obat</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="text" readonly="" id="id_stok_obat" name="id_stok_obat" class="form-control" value="<?php echo $da['id_stok_obat']; ?>">
  </div>
</div>

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
    <label class=" form-control-label">Nama Obat</label>
  </div>
  <div class="col-12 col-md-9">
    <select name="id_obat" id="id_obat" class="form-control" required="" oninvalid="this.setCustomValidity('Karyawan Wajib Diisi')" oninput="setCustomValidity('')">
      <option value="">Pilih Obat</option>
      <?php
          $data2 = mysqli_query($koneksi,"	SELECT o.id_obat, o.nm_obat , jo.nm_jenis_obat
											FROM obat o, jenis_obat jo
											WHERE o.id_jenis_obat = jo.id_jenis_obat 
											ORDER BY o.nm_obat ASC
                              ");
          foreach ($data2 as $d2) 
          {
      ?>
      
      <option value="<?php echo $d2["id_obat"]; ?>" <?php if($da['id_obat']==$d2["id_obat"]){echo "selected";} ?> >
          <?php echo $d2["nm_obat"]; ?>
      </option>

      <?php 
          }
      ?>
    </select>
  </div>
</div>

<div class="row form-group">
  <div class="col col-md-3">
    <label for="tgl_exp" class=" form-control-label">Tanggal Kadaluarsa</label>
  </div>
  <div class="col-12 col-md-9">
    <input type="date" id="tgl_exp" name="tgl_exp" placeholder="Tanggal Kadaluarsa" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal ')" oninput="setCustomValidity('')" value="<?php echo $da["tgl_exp"]; ?>">
  </div>
</div>

<div class="row form-group">
    <div class="col col-md-3">
        <label class=" form-control-label">Jumlah Stok</label>
    </div>
    <div class="col-12 col-md-9">
        <input type="number" id="jumlah_stok" name="jumlah_stok" placeholder="Jumlah Stok" value="<?php echo $da["jumlah_stok"]; ?>" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
    </div>
</div>

<?php
  } 
?>