<?php include "koneksi/function.php"; ?>

<!-- form transaksi -->
<form method="post" id="transaksi_form" action="">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Kode Transaksi</label>
                <input type="text" id="id_transaksi" name="id_transaksi" placeholder="" class="form-control" value="<?php echo kode('id_transaksi','transaksi',7,'TR-'); ?>" readonly="">
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Cari Pasien</label>
                <select name="id_pasien" id="id_pasien" data-placeholder="Pilih Obat..." class="form-control standardSelect" tabindex="1" required="">
                    <option value="" label="default"></option>
                    <?php
                        $data2 = mysqli_query($koneksi,"select p.id_pasien, p.nm_pasien 
                                                        from pasien p
                                                        order by p.nm_pasien;
                                            ");
                        foreach ($data2 as $d2) 
                        {
                    ?>

                    <option value="<?php echo $d2["id_pasien"]; ?>" >
                        <?php echo $d2["nm_pasien"]; ?>
                    </option>

                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Transaksi</label>
                <input type="date" id="tgl_transaksi" name="tgl_transaksi" placeholder="Tanggal Transaksi" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal ')" oninput="setCustomValidity('')">
            </div>
        </div>
    </div>

    <!-- detail transaksi disini -->
    <hr />

    <div class="row">   
        <div class="col-md-3">
            <label>Transaksi</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <select name="pilihan" id="pilihan" class="form-control" required="">
                    <option value="">Pilih Transaksi</option>
                    <option value="obat">Obat</option>
                    <option value="perawatan">Perawatan</option>
                    <option value="konsultasi">Konsultasi</option>
                </select>
            </div>
        </div>
        <div class="col-md-1"> 
            <div class="form-group">
                <button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">Tambah</button> 
            </div>
        </div>              
    </div>

    <div class="row">   
        <div class="col-md-3">
            <label>Detail</label>
        </div>
        <div class="col-md-3">
            <label>Quantity</label>
        </div>  
    </div>

    <span id="span_product_details">
        <!-- detail Pemasokan -->
    </span>

    <hr />
    <!-- detail transaksi disini -->

    <div class="row">
        <div class="col-md-3">
             <label>Total Harga</label>
        </div>
        <div class="col-md-3">
            <label>Bayar</label>
        </div>
        <div class="col-md-3">
            <label>Kembalian</label>
        </div>
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="number" id="total_hrg" name="total_hrg" class="form-control" placeholder="Total Harga" value="" readonly="" required="">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input type="number" id="bayar" onkeyup="update()" name="bayar" placeholder="Bayar" class="form-control" required="" oninvalid="this.setCustomValidity('Isi Pembayaran Dengan Benar')" oninput="setCustomValidity('')">
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">
                <input type="number" id="kembalian" name="kembalian" placeholder="Kembalian" class="form-control" required="" readonly="">
            </div>
        </div>
        <input type="hidden"  id="validasi_stok" name="validasi_stok">
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="hidden" name="btn_action" id="btn_action" />
                <input type="submit" name="action" id="action" class="btn btn-info" value="SUBMIT" />
            </div>
        </div>
    </div>

</form>   
<!-- form transaksi -->

<!-- untuk selectpicker -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<!-- untuk selectpicker -->

<script type="text/javascript">
    $(document).ready(function(){
        $('#btn_action').val('Add');
        $('#span_product_details').html('');
        var count1 = -1;
        var count2 = -1;
        var count3 = -1;

        function add_row_obat(count1 = '')
        {
            var html = '';
            html += '<span id="row'+count1+'"><div class="row">';
            html += '<div class="col-md-3">';
            html += '<select name="id_stok_obat[]" id="id_stok_obat'+count1+'" class="selectpicker form-control" data-live-search="true" required="">';
            html += '<option value="">Pilih Obat (Tanggal EXP)</option>';
            html += '<?php echo fill_stok_obat($connect); ?>';
            html += '</select><input type="hidden" name="hidden_id_stok_obat[]" id="hidden_id_stok_obat'+count1+'" />';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="number" id="qty_obat" name="qty_obat[]" placeholder="QTY" class="qty cek_stok form-control" required="" max="2000000000">';
            html += '</div>';
            html += '<div class="col-md-1">';
            html += '<button type="button" name="remove" id="'+count1+'" class="btn btn-danger btn-xs remove">Hapus</button>';
            html += '</div>';
            html += '</div><br/></span>';

            $('#span_product_details').append(html);

            $('.selectpicker').selectpicker();
        }

        function add_row_perawatan(count2 = '')
        {
            var html = '';
            html += '<span id="row'+count2+'"><div class="row">';
            html += '<div class="col-md-3">';
            html += '<select name="id_perawatan[]" id="id_perawatan'+count2+'" class="selectpicker form-control" data-live-search="true" required="">';
            html += '<option value="">Pilih Perawatan</option>';
            html += '<?php echo fill_perawatan($connect); ?>';
            html += '</select><input type="hidden" name="hidden_id_perawatan[]" id="hidden_id_perawatan'+count2+'" />';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="number" id="qty_perawatan" name="qty_perawatan[]" placeholder="QTY" class="qty form-control" required="" max="2000000000">';
            html += '</div>';
            html += '<div class="col-md-1">';
            html += '<button type="button" name="remove" id="'+count2+'" class="btn btn-danger btn-xs remove">Hapus</button>';
            html += '</div>';
            html += '</div><br/></span>';

            $('#span_product_details').append(html);

            $('.selectpicker').selectpicker();
        }

        function add_row_konsultasi(count3 = '')
        {
            var html = '';
            html += '<span id="row'+count3+'"><div class="row">';
            html += '<div class="col-md-3">';
            html += '<select name="id_konsultasi[]" id="id_konsultasi'+count3+'" class="selectpicker form-control" data-live-search="true" required="">';
            html += '<option value="">Pilih Konsultasi</option>';
            html += '<?php echo fill_konsultasi($connect); ?>';
            html += '</select><input type="hidden" name="hidden_id_konsultasi[]" id="hidden_id_konsultasi'+count3+'" />';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="number" id="qty_konsultasi" name="qty_konsultasi[]" placeholder="QTY" class="qty form-control" required="" max="2000000000">';
            html += '</div>';
            html += '<div class="col-md-1">';
            html += '<button type="button" name="remove" id="'+count3+'" class="btn btn-danger btn-xs remove">Hapus</button>';
            html += '</div>';
            html += '</div><br/></span>';

            $('#span_product_details').append(html);

            $('.selectpicker').selectpicker();
        }

        // menambah detail pemasokan
        $(document).on('click', '#add_more', function(){
            
            var pilihan = document.getElementById("pilihan");
            var pilih_transaksi = pilihan.options[pilihan.selectedIndex].value;

            if (pilih_transaksi == "") 
            {
                alert("Pilih Transaksi");
            }
            if (pilih_transaksi == "obat") 
            {
                count1 = count1 + 1;
                add_row_obat(count1);
            }
            if (pilih_transaksi == "perawatan") 
            {
                count2 = count2 + 1;
                add_row_perawatan(count2);
            }
            if (pilih_transaksi == "konsultasi") 
            {
                count3 = count3 + 1;
                add_row_konsultasi(count3);
            }
            
        });
        // menambah detail pemasokan
        
        // mengurangi detail pemasokan
        $(document).on('click', '.remove', function(){
            var row_no = $(this).attr("id");
            $('#row'+row_no).remove();
        });
        // mengurangi detail pemasokan
        
        // tambah ke database
        $(document).on('submit', '#transaksi_form', function(event){
            var validasi = document.getElementById("validasi_stok");
            var v = parseFloat(validasi.value);
            if (v!=1) 
            {
                event.preventDefault();
                $('#action').attr('disabled', 'disabled');
                var form_data = $(this).serialize();
                $.ajax({
                    url:"crud/transaksi/tambah.php",
                    method:"POST",
                    data:form_data,
                    success:function(data){
                        var id_transaksi = document.getElementsByName("id_transaksi")[0].value;
                        alert ("Berhasil Menambahkan Data Transaksi "+id_transaksi);
                        location.reload();

                        var win = window.open('http://localhost/miliz_project/mpdf/transaksi/cetak_transaksi.php', '_blank');
                        win.focus();
                    }
                });
            }
            else
            {
                confirm("Terdapat Stok Obat Yang Kurang ")
            }
            
        });
        // tambah ke database

        // mengambil total harga
        $(document).on('keyup', '.qty', function(event){
            event.preventDefault();
            var form_data = $("#transaksi_form").serialize();
            $.ajax({
                url:"crud/transaksi/total_harga.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    $('#total_hrg').val(data);
                }
            });
        });
        // mengambil total harga
        
        // validasi stok obat
        $(document).on('keyup', '.cek_stok', function(event){
            event.preventDefault();
            var form_data = $("#transaksi_form").serialize();
            var cek = "";
            $.ajax({
                url:"crud/transaksi/cek_stok.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    $('#validasi_stok').val(data);
                    var validasi = document.getElementById("validasi_stok");
                    var v = parseFloat(validasi.value);
                    if (v>0) {
                        alert("Stok Obat Yang Sedang Anda Pilih Kurang");
                    }
                }
            });
        });
        // validasi stok obat

    });

    // Menghitung kembalian
    function update(){
        var kembalian = document.getElementById("kembalian");
        var bayar = document.getElementById("bayar");
        var total_hrg = document.getElementById("total_hrg");

        var b = parseFloat(bayar.value);
        var t = parseFloat(total_hrg.value);
        
        if (b >= t) 
        {
            kembalian.value = bayar.value - total_hrg.value ;
        }
        else
        {
            kembalian.value = null ;
        }
    }
    // Menghitung kembalian
     
</script>