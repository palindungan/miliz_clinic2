<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pemasok Obat</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=dashboard">Dashboard</a></li>
                            <li class="active">Pemasok Obat</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pemberitahuan menu yang dibuka -->

<!-- tabel pemasok -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <strong class="card-title">pemasok</strong>
                    </div> -->
                    <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#tambah_modal" ><i class="fa fa-plus-circle"></i> Pemasok</button><br><br>
                        <!-- Button trigger modal -->

                        <table id="tabel" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>No. Hp</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // koneksi ke mysql
                                    $data = mysqli_query($koneksi,"select * from pemasok");
                                    foreach ($data as $d) 
                                    {
                                ?>
                                        <tr>
                                            <td><?php echo $d["id_pemasok"]; ?></td>
                                            <td><?php echo $d["nm_pemasok"]; ?></td> 
                                            <td><?php echo $d["almt_pemasok"]; ?></td>
                                            <td><?php echo $d["no_hp"]; ?></td>
                                            <td>

                                              <button type="button" class="btn btn-warning mb-1 click_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d["id_pemasok"]; ?>"><i class="fa fa-pencil"></i>
                                              </button>

                                              <button type="button" class="btn btn-danger mb-1 hapus" id="<?php echo $d["id_pemasok"]; ?>" name="<?php echo $d["nm_pemasok"]; ?>" ><i class="fa fa-trash"></i>
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
<!-- tabel pemasok -->

<!-- isi modal tambah -->
<div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/pemasok/tambah.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Pemasok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_pemasok" class=" form-control-label">Kode Pemasok</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="" id="id_pemasok" name="id_pemasok" placeholder="" class="form-control" value="<?php echo kode('id_pemasok','pemasok',3,'P'); ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="nm_pemasok">Nama</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="nm_pemasok" name="nm_pemasok" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="almt_pemasok">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="almt_pemasok" name="almt_pemasok" placeholder="Alamat" class="form-control" required="" maxlength="150" oninvalid="this.setCustomValidity('Mohon Isikan Alamat')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="no_hp" class=" form-control-label">No. Handphone</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="no_hp" name="no_hp" pattern="\(?(?:\+62|62|0)(?:\d{2,3})?\)?[ .-]?\d{2,4}[ .-]?\d{2,4}[ .-]?\d{2,4}" placeholder="No. Handphone" class="form-control" required="" maxlength="15" oninvalid="this.setCustomValidity('Mohon Isikan No. Handphone Dengan Benar')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary" id="tambah">Tambah</button>
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
            <form action="crud/pemasok/update.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="edit_form">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Pemasok</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="isi_modal">
                    <!-- isinya modal ada di file edit_modal.php -->
                </div>

                <div class="modal-footer">
                    <button type="reset" class="btn btn-secondary">Reset</button>
                    <button type="submit" class="btn btn-primary" id="update">Update</button>
                </div>

            </form>
            <!-- tag form -->

        </div>
    </div>
</div>
<!-- isi modal edit -->

<script>
    $(document).ready(function(){

        // untuk menampilkan edit modal
        $(".click_edit").click(function(e){
            var m = $(this).attr("id");
            $.ajax({
                url : "crud/pemasok/edit_modal.php",
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

            var nm_pemasok = document.getElementsByName("nm_pemasok")[0].value;
            var almt_pemasok = document.getElementsByName("almt_pemasok")[0].value;
            var no_hp = document.getElementsByName("no_hp")[0].value;
  
            // cek validasi nomer telepon
            var re = /\(?(?:\+62|62|0)(?:\d{2,3})?\)?[ .-]?\d{2,4}[ .-]?\d{2,4}[ .-]?\d{2,4}/;
            var cek_no_hp = false;
            if(re.test(no_hp))
            {
               cek_no_hp = true;
            }
            else
            {
                cek_no_hp = false;
            }
            // cek validasi nomer telepon
            
            if (cek_no_hp == true && nm_pemasok != "" && almt_pemasok != "" && no_hp != "") 
                {
                    return alert("Anda Telah Berhasil Menambahkan "+nm_pemasok);
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
                        url : "crud/pemasok/hapus.php",
                        type : "POST",
                        data : {id_pemasok:m},
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