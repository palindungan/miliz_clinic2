<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pasien</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=dashboard">Dashboard</a></li>
                            <li class="active">Pasien</li>
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
<!--                         <button type="button" class="btn btn-primary mb-1" data-toggle="modal" data-target="#daftar_modal" >Pendaftaran Pasien</button><br><br> -->
                        <!-- Button trigger modal -->

                        <table id="tabel" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Umur</th>
                                    <th>Jenis Kelamin</th>
                                    <th>No. Handphone</th>
                                    <th>Tgl Pendaftarn</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // koneksi ke mysql
                                    $data = mysqli_query($koneksi,"select * from pasien");
                                    foreach ($data as $d) 
                                    {
                                ?>
                                        <tr>
                                            <td><?php echo $d["id_pasien"]; ?></td>
                                            <td><?php echo $d["nm_pasien"]; ?></td> 
                                            <td><?php echo $d["almt_pasien"]; ?></td>
                                            <td><?php echo $d["umur"]; ?></td>
                                            <td><?php echo $d["jenkel_pasien"]; ?></td>
                                            <td><?php echo $d["no_hp"]; ?></td>
                                            <td><?php echo $d["tgl_reg"]; ?></td>
                                            <td>

                                              <button type="button" class="btn btn-warning mb-1 click_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d["id_pasien"]; ?>">Edit
                                              </button>

                                              <button type="button" class="btn btn-danger mb-1 hapus" id="<?php echo $d["id_pasien"]; ?>" name="<?php echo $d["nm_pasien"]; ?>" >Hapus
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
<div class="modal fade" id="daftar_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/pendaftaran/tambah.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Pendaftaran Pasien</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_pasien" class=" form-control-label">Kode Pasien</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="id_pasien" name="id_pasien" placeholder="" class="form-control" value="<?php echo kode('id_pasien','pasien',6,'P'); ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="nm_pasien">Nama</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" pattern="^[A-Za-z -]+$" id="nm_pasien" name="nm_pasien" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi dan tidak boleh ada Karakter Khusus Maupun Angka')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="almt_pasien">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="almt_pasien" name="almt_pasien" placeholder="Alamat" class="form-control" required="" maxlength="150" oninvalid="this.setCustomValidity('Mohon Isikan Alamat')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="umur">Umur</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="number" id="umur" name="umur" placeholder="Umur" class="form-control" required="" max="999" oninvalid="this.setCustomValidity('Umur Wajib Diisi dan Maksimal 3 digit')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="jenkel_pasien" class=" form-control-label">Jenis Kelamin</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select id="jenkel_pasien" name="jenkel_pasien" class="form-control" required="" oninvalid="this.setCustomValidity('Pilih Jenis kelamin')" oninput="setCustomValidity('')">
                                <option value="">Please select</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
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
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="tgl_reg" class=" form-control-label">Tanggal Pendaftaran</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="date" id="tgl_reg" name="tgl_reg" placeholder="Tanggal Pendaftaran" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal ')" oninput="setCustomValidity('')">
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
            <form action="crud/pendaftaran/update.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="edit_form">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Data Pasien</h5>
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
                url : "crud/pendaftaran/edit_modal.php",
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

            var nm_pasien = document.getElementsByName("nm_pasien")[0].value;
            var almt_pasien = document.getElementsByName("almt_pasien")[0].value;
            var umur = document.getElementsByName("umur")[0].value;
            var jenkel_pasien = document.getElementsByName("jenkel_pasien")[0].value;
            var no_hp = document.getElementsByName("no_hp")[0].value;
            var tgl_reg = document.getElementsByName("tgl_reg")[0].value;

            // cek validasi nama
            var re = /^[A-Za-z -]+$/;
            var cek_nama = false;
            if(re.test(nm_pasien))
            {
               cek_nama = true;
            }
            else
            {
                cek_nama = false;
            }
            // cek validasi nama
            
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
            
            if (cek_no_hp == true && cek_nama == true && nm_pasien != "" && almt_pasien != "" && umur != "" && jenkel_pasien != "" && no_hp != "" && tgl_reg != "") 
                {
                    return alert("Anda Telah Berhasil Menambahkan "+nm_pasien);
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
                        url : "crud/pendaftaran/hapus.php",
                        type : "POST",
                        data : {id_pasien:m},
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