<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Perawatan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=dashboard">Dashboard</a></li>
                            <li class="active">Perawatan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pemberitahuan menu yang dibuka -->

<!-- tabel -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <strong class="card-title"</strong>
                    </div> -->
                    <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#jenis_obat_modal">Tambah Perawatan</button><br><br>
                        <!-- Button trigger modal --> 


                        <table id="tabel" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode Perawatan</th>
                                    <th>Nama Perawatan</th>
                                    <th>Harga Perawatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $data = mysqli_query($koneksi,"select * from perawatan");
                                    foreach ($data as $d) 
                                    {
                                ?>
                                        <tr>
                                            <td><?php echo $d["id_perawatan"]; ?></td>
                                            <td><?php echo $d["nm_perawatan"]; ?></td>
                                            <td><?php echo $d["hrg_perawatan"]; ?></td>
                                            <td>
                                                <button type="button" class="btn btn-warning mb-1 click_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d["id_perawatan"]; ?>">Edit
                                                </button>

                                                <button type="button" class="btn btn-danger mb-1 hapus" id="<?php echo $d["id_perawatan"]; ?>" name="<?php echo $d["nm_perawatan"]; ?>" >Hapus
                                                </button>
                                            </td>
                                        </tr>
                                <?php 
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tabel -->

<!-- isi modal tambah -->
<div class="modal fade" id="jenis_obat_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/perawatan/tambah.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Perawatan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_perawatan" class="form-control-label">Kode Perawatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="" id="id_perawatan" name="id_perawatan" placeholder="" class="form-control" value="<?php echo kode('id_perawatan','perawatan',4,'PR'); ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Nama Perawatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nm_perawatan" name="nm_perawatan" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Nama Perawatan')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label">Harga Perawatan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="hrg_perawatan" name="hrg_perawatan" placeholder="Harga" class="form-control" required="" max="2000000000" oninvalid="this.setCustomValidity('Mohon Diisi Dengan Benar')" oninput="setCustomValidity('')">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="reset" class="btn btn-secondary">Reset</button>
                        <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
                    </div>
                </div>

            </form>
            <!-- tag form -->

        </div>
    </div>
</div>
<!-- isi modal tambah-->

<!-- isi modal edit -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/perawatan/update.php" method="POST" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Jenis Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="isi_modal">
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
<!-- isi modal -->

<script>   
    $(document).ready(function(){

        // untuk menampilkan edit modal
        $(".click_edit").click(function(e){
            var m = $(this).attr("id");
            $.ajax({
                url : "crud/perawatan/edit_modal.php",
                type : "POST",
                data : {id:m},
                success : function(ajaxData){
                    $("#isi_modal").html(ajaxData);
                }
            });
        });

        // untuk menampilkan edit modal

        // pemberitahuan berhasil tambah
        $(document).on('click','#tambah',function()
        {

            var nm_perawatan = document.getElementsByName("nm_perawatan")[0].value;
            var hrg_perawatan = document.getElementsByName("hrg_perawatan")[0].value;

            // cek validasi nama
            
            if (nm_perawatan != "" && hrg_perawatan != "") 
                {
                    return alert("Anda Telah Berhasil Menambahkan "+nm_perawatan);
                }

        });
        // pemberitahuan berhasil tambah
        
        // delete dan validasinya
        $(".hapus").click(function() 
        {
            var name = $(this).attr("name");
            var jawab = confirm("Ingin Menghapus Data "+name+" ?");
            if (jawab === true) 
            {
                // kita set hapus false untuk mencegah duplicate request
                var hapus = false;
                if (!hapus) {
                    hapus = true;
                    // ajax
                    var m = $(this).attr("id");
                    $.ajax({
                        url : "crud/perawatan/hapus.php",
                        type : "POST",
                        data : {id_perawatan:m},
                        success : function(data)
                        {                                
                            alert("Data "+name+" berhasil Terhapus");
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

<script type="text/javascript">
        $(document).ready(function() {
          $('#tabel').DataTable();
      } );
</script>