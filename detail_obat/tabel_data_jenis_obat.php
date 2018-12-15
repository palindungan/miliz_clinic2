
<!-- Button trigger modal -->
<button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#jenis_obat_modal">Tambah Jenis Obat</button><br><br>
<!-- Button trigger modal --> 

<table id="tabel_data_jenis_obat" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Kode Jenis Obat</th>
            <th>Nama Jenis Obat</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = mysqli_query($koneksi,"select * from jenis_obat");
            foreach ($data as $d) 
            {
        ?>
                <tr>
                    <td><?php echo $d["id_jenis_obat"]; ?></td>
                    <td><?php echo $d["nm_jenis_obat"]; ?></td>
                    <td>
                        <button type="button" class="btn btn-warning mb-1 click_edit_jenis" data-toggle="modal" data-target="#edit_modal_3" id="<?php echo $d["id_jenis_obat"]; ?>">Edit
                        </button>

                        <button type="button" class="btn btn-danger mb-1 hapus_jenis" id="<?php echo $d["id_jenis_obat"]; ?>" name="<?php echo $d["nm_jenis_obat"]; ?>" >Hapus
                        </button>
                    </td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>

<!-- isi modal tambah -->
<div class="modal fade" id="jenis_obat_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/jenis_obat/tambah.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_jenis_obat" class="form-control-label">Kode Jenis Obat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="" id="id_jenis_obat" name="id_jenis_obat" placeholder="" class="form-control" value="<?php echo kode('id_jenis_obat','jenis_obat',2,'J'); ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Nama Jenis Obat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nm_jenis_obat" name="nm_jenis_obat" placeholder="Nama Jenis Obat" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Nama jenis Obat')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary" id="tambah_jenis">Tambah</button>
                </div>
            </div>

            </form>
            <!-- tag form -->

        </div>
    </div>
</div>
<!-- isi modal tambah-->

<!-- isi modal edit -->
<div class="modal fade" id="edit_modal_3" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/jenis_obat/update.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Jenis Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="isi_modal_jenis">
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

<script>   
    $(document).ready(function(){

        // untuk menampilkan edit modal
        $(".click_edit_jenis").click(function(e){
            var m3 = $(this).attr("id");
            $.ajax({
                url : "crud/jenis_obat/edit_modal.php",
                type : "POST",
                data : {id:m3},
                success : function(ajaxData){
                    $("#isi_modal_jenis").html(ajaxData);
                }
            });
        });

        // untuk menampilkan edit modal

        // pemberitahuan berhasil tambah karyawan
        $(document).on('click','#tambah_jenis',function()
        {

            var nm_jenis_obat = document.getElementsByName("nm_jenis_obat")[0].value;

            // cek validasi nama
            
            if (nm_jenis_obat != "") 
                {
                    return alert("Anda Telah Berhasil Menambahkan "+nm_jenis_obat);
                }

        });
        // pemberitahuan berhasil tambah karyawan
        
        // delete dan validasinya
        $(".hapus_jenis").click(function() 
        {
            var name3 = $(this).attr("name");
            var jawab3 = confirm("Ingin Menghapus Data "+name3+" ?");
            if (jawab3 === true) 
            {
                // kita set hapus false untuk mencegah duplicate request
                var hapus3 = false;
                if (!hapus3) {
                    hapus3 = true;
                    // ajax
                    var m3 = $(this).attr("id");
                    $.ajax({
                        url : "crud/jenis_obat/hapus.php",
                        type : "POST",
                        data : {id_jenis_obat:m3},
                        success : function(data)
                        {                                
                            alert("Data "+name3+" berhasil Terhapus");
                            location.reload();
                        }
                    });
                    // ajax
                    hapus3 = false;
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