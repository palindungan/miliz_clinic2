
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#obat_modal">Tambah Obat</button> <br><br>
<!-- Button trigger modal -->

<table id="tabel_data_obat" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Kode Obat</th>
            <th>Nama Obat</th>
            <th>Jenis Obat</th>
            <th>Harga Beli</th>
            <th>Harga Jual</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = mysqli_query($koneksi," select o.id_obat, o.nm_obat , jo.nm_jenis_obat, o.hrg_beli, o.hrg_jual
											from jenis_obat jo, obat o
											where jo.id_jenis_obat = o.id_jenis_obat
											order by o.id_obat;
								");
            foreach ($data as $d) 
            {
        ?>
                <tr>
                    <td><?php echo $d["id_obat"]; ?></td>
                    <td><?php echo $d["nm_obat"]; ?></td> 
                    <td><?php echo $d["nm_jenis_obat"]; ?></td>
                    <td><?php echo $d["hrg_beli"]; ?></td>
                    <td><?php echo $d["hrg_jual"]; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning mb-1 click_edit_obat" data-toggle="modal" data-target="#edit_modal_2" id="<?php echo $d["id_obat"]; ?>">Edit</button>

                      <button type="button" class="btn btn-danger mb-1 hapus_obat" id="<?php echo $d["id_obat"]; ?>" name="<?php echo $d["nm_obat"]; ?>" >Hapus
                      </button>
                    </td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>

<!-- isi modal tambah -->
<div class="modal fade" id="obat_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/obat/tambah.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_obat" class="form-control-label">Kode Obat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="" id="id_obat" name="id_obat" placeholder="" class="form-control" value="<?php echo kode('id_obat','obat',6,'O'); ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Nama Obat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nm_obat" name="nm_obat" placeholder="Nama Obat" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3"><label for="id_jenis_obat" class=" form-control-label">Jenis Obat</label></div>
                        <div class="col-12 col-md-9">
                            <select name="id_jenis_obat" id="id_jenis_obat" class="form-control selectpicker" data-live-search="true" required="">
                                <option value="">Please select</option>
                                <?php
                                    $data2 = mysqli_query($koneksi,"select jo.nm_jenis_obat, jo.id_jenis_obat
                                                                    from jenis_obat jo
                                                                    order by jo.nm_jenis_obat;
                                                        ");
                                    foreach ($data2 as $d2) 
                                    {
                                ?>
                                <option value="<?php echo $d2["id_jenis_obat"]; ?>">
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
                            <input type="number" id="hrg_beli" name="hrg_beli" placeholder="Harga Beli" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="select" class=" form-control-label">Harga Jual</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="hrg_jual" name="hrg_jual" placeholder="Harga Jual" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary" id="tambah_obat">Tambah</button>
                </div>

            </form>
            <!-- tag form -->

        </div>
    </div>
</div>
<!-- isi modal tambah-->

<!-- isi modal edit -->
<div class="modal fade" id="edit_modal_2" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/obat/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="isi_modal_obat">
                    <!-- isinya modal ada di file edit_modal.php -->
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>

            </form>
            <!-- tag form -->

        </div>
    </div>
</div>
<!-- isi modal edit-->

<!-- untuk selectpicker -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<!-- untuk selectpicker -->

<script>
    $(document).ready(function(){

        // untuk menampilkan edit modal
        $(".click_edit_obat").click(function(e){
            var m2 = $(this).attr("id");
            $.ajax({
                url : "crud/obat/edit_modal.php",
                type : "POST",
                data : {id:m2},
                success : function(ajaxData){
                    $("#isi_modal_obat").html(ajaxData);
                }
            });
        });

        // untuk menampilkan edit modal

        // pemberitahuan berhasil tambah karyawan
        $(document).on('click','#tambah_obat',function()
        {

            var nm_obat = document.getElementsByName("nm_obat")[0].value;
            var id_jenis_obat = document.getElementsByName("id_jenis_obat")[0].value;
            var hrg_beli = document.getElementsByName("hrg_beli")[0].value;
            var hrg_jual = document.getElementsByName("hrg_jual")[0].value;
            
            if (nm_obat != "" && id_jenis_obat != "" && hrg_beli != "" && hrg_jual != "" && hrg_beli <= 2000000000 && hrg_jual <= 2000000000) 
                {
                    return alert("Anda Telah Berhasil Menambahkan "+nm_obat);
                }

        });
        // pemberitahuan berhasil tambah karyawan
        
        // delete dan validasinya
        $(".hapus_obat").click(function() 
        {
            var name2 = $(this).attr("name");
            var jawab2 = confirm("Ingin Menghapus Data "+name2+" ?");
            if (jawab2 === true) 
            {
                // kita set hapus false untuk mencegah duplicate request
                var hapus = false;
                if (!hapus) {
                    hapus = true;
                    // ajax
                    var m2 = $(this).attr("id");
                    $.ajax({
                        url : "crud/obat/hapus.php",
                        type : "POST",
                        data : {id_obat:m2},
                        success : function(data)
                        {                                
                            alert("Data "+name2+" berhasil Terhapus");
                            location.reload();
                        }
                    });
                    // ajax
                    hapus = false;
                }
            } 
            else 
            {
                return false;
            }
        });
        // delete dan validasinya
    });
</script>