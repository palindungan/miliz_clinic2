<table id="tabel_data_stok_obat" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Kode</th>
            <th>Kode Pemasokan</th>
            <th>Nama Obat</th>
            <th>Tanggal Kadaluarsa</th>
            <th>Stok</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            $data = mysqli_query($koneksi," SELECT s.id_stok_obat , p.id_pemasokan , o.id_obat , o.nm_obat , s.tgl_exp , s.jumlah_stok
                                            FROM stok_obat s, pemasokan p , obat o
                                            WHERE s.id_pemasokan = p.id_pemasokan && s.id_obat = o.id_obat && s.jumlah_stok > 0
                                            ORDER BY s.id_stok_obat DESC;
								");
            foreach ($data as $d) 
            {
        ?>
                <tr>
                    <td><?php echo $d["id_stok_obat"]; ?></td>
                    <td><?php echo $d["id_pemasokan"]; ?></td>
                    <td><?php echo $d["nm_obat"]; ?></td>
                    <td><?php echo $d["tgl_exp"]; ?></td>
                    <td><?php echo $d["jumlah_stok"]; ?></td>
                    <td>
                      <button type="button" class="btn btn-warning mb-1 click_edit_stok" data-toggle="modal" data-target="#edit_modal_2" id="<?php echo $d["id_stok_obat"]; ?>"><i class="fa fa-pencil"></i>
                      </button>

                      <button type="button" class="btn btn-danger mb-1 hapus_stok_obat" id="<?php echo $d["id_stok_obat"]; ?>" name="<?php echo $d["nm_obat"]." Kode Stok = ".$d["id_stok_obat"]; ?>" ><i class="fa fa-trash"></i>
                      </button>
                    </td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>

<!-- isi modal edit -->
<div class="modal fade" id="edit_modal_2" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/stok_obat/update.php" method="post" enctype="multipart/form-data" class="form-horizontal">

                <div class="modal-header">
                    <h5 class="modal-title" id="largeModalLabel">Edit Obat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body" id="isi_modal_edit">
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
        $(".click_edit_stok").click(function(e){
            var m2 = $(this).attr("id");
            $.ajax({
                url : "crud/stok_obat/edit_modal.php",
                type : "POST",
                data : {id:m2},
                success : function(ajaxData){
                    $("#isi_modal_edit").html(ajaxData);
                }
            });
        });

        // untuk menampilkan edit modal
        
        // delete dan validasinya
        $(".hapus_stok_obat").click(function() 
        {
            var name2 = $(this).attr("name");
            var jawab2 = confirm("Ingin Menghapus Data Stok "+name2+" ?");
            if (jawab2 === true) 
            {
                // kita set hapus false untuk mencegah duplicate request
                var hapus = false;
                if (!hapus) {
                    hapus = true;
                    // ajax
                    var m2 = $(this).attr("id");
                    $.ajax({
                        url : "crud/stok_obat/hapus.php",
                        type : "POST",
                        data : {id:m2},
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