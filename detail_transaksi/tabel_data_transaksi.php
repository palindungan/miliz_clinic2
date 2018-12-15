<!-- tabel data transaksi -->
<table id="tabel" class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Kode Transaksi</th>
            <th>Pasien</th>
            <th>Karyawan</th>
            <th>Total Harga</th>
            <th>Bayar</th>
            <th>Kembalian</th>
            <th>Tanggal Transaksi</th>
            <th>Opsi</th>
        </tr>
    </thead>
    <tbody>
        <?php
            // koneksi ke mysql
            $data = mysqli_query($koneksi,"
                        SELECT t.id_transaksi , t.total_hrg , t.bayar , t.kembalian , t.tgl_transaksi , p.nm_pasien , k.nm_karyawan
                        FROM transaksi t , karyawan k , pasien p
                        WHERE t.id_pasien = p.id_pasien && t.id_karyawan = k.id_karyawan
                        ORDER BY t.id_transaksi;
                                        ");
            foreach ($data as $d) 
            {
        ?>
                <tr>
                    <td><?php echo $d["id_transaksi"]; ?></td>
                    <td><?php echo $d["nm_pasien"]; ?></td>
                    <td><?php echo $d["nm_karyawan"]; ?></td>
                    <td><?php echo $d["total_hrg"]; ?></td> 
                    <td><?php echo $d["bayar"]; ?></td>
                    <td><?php echo $d["kembalian"]; ?></td>
                    <td><?php echo $d["tgl_transaksi"]; ?></td>
                    <td>

                        <a href="mpdf/transaksi/view_transaksi.php?id=<?php echo $d["id_transaksi"]; ?>" class="btn btn-info mb-1" target="_black">View</a>

                        <button type="button" class="btn btn-warning mb-1 click_edit" data-toggle="modal" data-target="#edit_modal" id="<?php echo $d["id_transaksi"]; ?>">Edit
                        </button>

                        <button type="button" class="btn btn-danger mb-1 hapus" id="<?php echo $d["id_transaksi"]; ?>" name="<?php echo $d["id_transaksi"]; ?>" >Hapus
                        </button>

                    </td>
                </tr>
        <?php 
            }
        ?>
    </tbody>
</table>
<!-- tabel data transaksi -->

<!-- isi modal edit -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="largeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">

            <!-- tag form -->
            <form action="crud/transaksi/update.php" method="post" enctype="multipart/form-data" class="form-horizontal" name="edit_form">

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
        url : "crud/transaksi/edit_modal.php",
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
                url : "crud/transaksi/hapus.php",
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