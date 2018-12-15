<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Karyawan</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=dashboard">Dashboard</a></li>
                            <li class="active">Karyawan</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- pemberitahuan menu yang dibuka -->

<!-- tabel karyawan -->
<div class="content">
    <div class="animated fadeIn">
        <div class="row">
            
            <div class="col-md-12">
                <div class="card">
                    <!-- <div class="card-header">
                        <strong class="card-title">Karyawan</strong>
                    </div> -->
                    <div class="card-body">

                        <!-- Button trigger modal -->
                        <button type="button" class="btn btn-success mb-1" data-toggle="modal" data-target="#tambah_modal" >Tambah Karyawan</button><br><br>
                        <!-- Button trigger modal -->

                        <table id="tabel" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                    <th>Kode</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Username</th>
                                    <th>Level</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    // koneksi ke mysql
                                    $data = mysqli_query($koneksi,"select * from karyawan");
                                    foreach ($data as $d) 
                                    {
                                ?>
                                        <tr>
                                            <td><?php echo $d["id_karyawan"]; ?></td>
                                            <td><?php echo $d["nm_karyawan"]; ?></td> 
                                            <td><?php echo $d["almt_karyawan"]; ?></td>
                                            <td><?php echo $d["jenkel_karyawan"]; ?></td>
                                            <td><?php echo $d["username"]; ?></td>            
                                            <td><?php echo $d["level"]; ?></td>
                                            <td>

                                              <button type="button" class="btn btn-warning mb-1 click_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d["id_karyawan"]; ?>">Edit
                                              </button>

                                              <button type="button" class="btn btn-danger mb-1 hapus" id="<?php echo $d["id_karyawan"]; ?>" name="<?php echo $d["nm_karyawan"]; ?>" >Hapus
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
<!-- tabel karyawan -->

<!-- isi modal tambah -->
<div class="modal fade" id="tambah_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/karyawan/tambah.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Tambah Karyawan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="id_karyawan" class=" form-control-label">Kode Karyawan</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="" id="id_karyawan" name="id_karyawan" placeholder="" class="form-control" value="<?php echo kode('id_karyawan','karyawan',3,'K'); ?>" readonly="">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="nm_karyawan">Nama</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" pattern="^[A-Za-z -]+$" id="nm_karyawan" name="nm_karyawan" placeholder="Nama" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Nama Wajib Diisi dan tidak boleh ada Karakter Khusus Maupun Angka')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="almt_karyawan">Alamat</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="almt_karyawan" name="almt_karyawan" placeholder="Alamat" class="form-control" required="" maxlength="150" oninvalid="this.setCustomValidity('Mohon Isikan Alamat')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="jenkel_karyawan" class=" form-control-label">Jenis Kelamin</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select id="jenkel_karyawan" name="jenkel_karyawan" class="form-control" required="" oninvalid="this.setCustomValidity('Pilih Jenis kelamin')" oninput="setCustomValidity('')">
                                <option value="">Please select</option>
                                <option value="pria">Pria</option>
                                <option value="wanita">Wanita</option>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label class=" form-control-label" for="username">Username</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="text" id="username" name="username" placeholder="Username" class="form-control" required="" maxlength="50" oninvalid="this.setCustomValidity('Mohon Isikan Username')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="password-input" class=" form-control-label">Password</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <input type="password" id="password-input" name="password" placeholder="Password" class="form-control" required="" maxlength="20" oninvalid="this.setCustomValidity('Mohon Isikan Password')" oninput="setCustomValidity('')">
                            <small class="help-block form-text">Please enter a complex password</small>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col col-md-3">
                            <label for="level" class=" form-control-label">Level</label>
                        </div>
                        <div class="col-12 col-md-9">
                            <select id="level" name="level" class="form-control" required="" oninvalid="this.setCustomValidity('Pilih Level')" oninput="setCustomValidity('')">
                                <option value="">Please select </option>
                                <option value="admin">Admin</option>
                                <option value="kasir">Kasir</option>
                            </select>
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
            <form action="crud/karyawan/update.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="edit_form">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Karyawan</h5>
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
                url : "crud/karyawan/edit_modal.php",
                type : "POST",
                data : {id:m},
                success : function(ajaxData){
                    $("#isi_modal").html(ajaxData);
                }
            });
        });
        // untuk menampilkan edit modal

        // pemberitahuan berhasil tambah karyawan
        $(document).on('click','#tambah',function()
        {

            var nm_karyawan = document.getElementsByName("nm_karyawan")[0].value;
            var almt_karyawan = document.getElementsByName("almt_karyawan")[0].value;
            var jenkel_karyawan = document.getElementsByName("jenkel_karyawan")[0].value;
            var username = document.getElementsByName("username")[0].value;
            var password = document.getElementsByName("password")[0].value;
            var level = document.getElementsByName("level")[0].value;

            // cek validasi nama
            var re = /^[A-Za-z -]+$/;
            var cek_nama = false;
            if(re.test(nm_karyawan))
            {
               cek_nama = true;
            }
            else
            {
                cek_nama = false;
            }
            // cek validasi nama
            
            if (cek_nama == true && nm_karyawan != "" && almt_karyawan != "" && jenkel_karyawan != "" && username != "" && password != "" && level != "") 
                {
                    return alert("Anda Telah Berhasil Menambahkan "+nm_karyawan);
                }

        });
        // pemberitahuan berhasil tambah karyawan
        
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
                        url : "crud/karyawan/hapus.php",
                        type : "POST",
                        data : {id_karyawan:m},
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



