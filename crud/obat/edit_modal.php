<?php
  include "../../koneksi/koneksi.php";
      $d = $_POST["id"];
      $data = mysqli_query($koneksi,"select * from obat where id_obat ='$d' ");
      foreach ($data as $da) 
      {
?>

                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_obat" class="form-control-label">Kode Obat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="" id="id_obat" name="id_obat" placeholder="" class="form-control" value="<?php echo $da["id_obat"]; ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Nama Obat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nm_obat" name="nm_obat" placeholder="Nama Obat" value="<?php echo $da["nm_obat"]; ?>" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="id_jenis_obat" class=" form-control-label">Jenis Obat</label></div>
                        <div class="col-12 col-md-9">
                            <select name="id_jenis_obat" id="id_jenis_obat" class="form-control" required="">
                                <option value="">Please select</option>
                                <?php
                                    $data2 = mysqli_query($koneksi,"SELECT jo.nm_jenis_obat, jo.id_jenis_obat
                                                                    from jenis_obat jo
                                                                    order by jo.nm_jenis_obat;
                                                        ");
                                    foreach ($data2 as $d2) 
                                    {
                                ?>
                                <option value="<?php echo $d2["id_jenis_obat"]; ?>" <?php if($da['id_jenis_obat']==$d2["id_jenis_obat"]){echo "selected";} ?>>
                                    <?php echo $d2["nm_jenis_obat"]; ?>
                                </option>
                                <?php 
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Harga Beli</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="hrg_beli" name="hrg_beli" placeholder="Harga Beli" value="<?php echo $da["hrg_beli"]; ?>" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Harga Jual</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="hrg_jual" name="hrg_jual" placeholder="Harga Jual" value="<?php echo $da["hrg_jual"]; ?>" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
                        </div>
                    </div>

<?php
  } 
?>
