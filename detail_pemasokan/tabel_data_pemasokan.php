<!-- tabel data Pemasokan -->
<table id="tabel_pemasokan" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Kode Pemasokan</th>
            <th>Karyawan</th>
            <th>Pemasok</th>
            <th>Total Harga</th>
            <th>Bayar</th>
            <th>Kembalian</th>
            <th>Tanggal Pemasokan</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // koneksi ke mysql
            $data = mysqli_query($koneksi,"
                        SELECT pm.id_pemasokan, k.nm_karyawan, p.nm_pemasok, pm.total_hrg, pm.bayar, pm.kembalian, pm.tgl_pemasokan
                        FROM pemasokan pm ,Karyawan k , pemasok p
                        WHERE pm.id_pemasok = p.id_pemasok && pm.id_karyawan = k.id_karyawan
                        ORDER BY pm.id_pemasokan;
                                        ");
            foreach ($data as $d) 
            {
        ?>
                <tr>
                    <td><?php echo $d["id_pemasokan"]; ?></td>
                    <td><?php echo $d["nm_karyawan"]; ?></td> 
                    <td><?php echo $d["nm_pemasok"]; ?></td>
                    <td><?php echo $d["total_hrg"]; ?></td>
                    <td><?php echo $d["bayar"]; ?></td>
                    <td><?php echo $d["kembalian"]; ?></td>
                    <td><?php echo $d["tgl_pemasokan"]; ?></td>
                    <td>
                        
                    <a href="mpdf/pemasokan/view_pemasokan.php?id=<?php echo $d["id_pemasokan"]; ?>" class="btn btn-info mb-1" target="_black"><i class="fa fa-search"></i>
                    </a>

                    <button type="button" class="btn btn-warning mb-1 click_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d["id_pemasokan"]; ?>"><i class="fa fa-pencil"></i>
                    </button>

                    <button type="button" class="btn btn-danger mb-1 hapus" id="<?php echo $d["id_pemasokan"]; ?>" name="<?php echo $d["id_pemasokan"]; ?>" ><i class="fa fa-trash"></i>
                    </button>

                    </td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
<!-- tabel data Pemasokan -->

<!-- isi modal edit -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/pemasokan/update.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="edit_form">

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

// untuk menampilkan edit modal
$(".click_edit").click(function(e){
    var m = $(this).attr("id");
    $.ajax({
        url : "crud/pemasokan/edit_modal.php",
        type : "POST",
        data : {id:m},
        success : function(ajaxData){
            $("#isi_modal").html(ajaxData);
        }
    });
});
// untuk menampilkan edit modal

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
                url : "crud/pemasokan/hapus.php",
                type : "POST",
                data : {id:m},
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

</script>





