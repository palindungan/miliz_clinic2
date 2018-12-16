<?php include "koneksi/function.php"; ?>

<!-- form pemasokan -->
<form method="post" id="order_form" action="">

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <label>Kode Pemasokan</label>
                 <input type="text" id="id_pemasokan" name="id_pemasokan" placeholder="" class="form-control" value="<?php echo kode('id_pemasokan','pemasokan',7,'PK-'); ?>" readonly="">
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-md-3">
            <div class="form-group">
                <label>Pemasok Obat</label>
                <select name="id_pemasok" id="id_pemasok" class="form-control selectpicker" data-live-search="true" required="">
                    <option value="">Pilih Pemasok</option>
                    <?php
                        $data2 = mysqli_query($koneksi,"select p.id_pemasok, p.nm_pemasok 
                                                        from pemasok p
                                                        order by p.nm_pemasok;
                                            ");
                        foreach ($data2 as $d2) 
                        {
                    ?>

                    <option value="<?php echo $d2["id_pemasok"]; ?>" >
                        <?php echo $d2["nm_pemasok"]; ?>
                    </option>

                    <?php 
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-md-3">
            <div class="form-group">
                <label>Tanggal Masuk</label>
                <input type="date" id="tgl_pemasokan" name="tgl_pemasokan" placeholder="Tanggal Masuk" class="form-control" required="" oninvalid="this.setCustomValidity('Mohon Isikan Tanggal Dengan Benar ')" oninput="setCustomValidity('')">
            </div>
        </div>

    </div>

    <hr/>
    <div class="form-group">

        <div class="row">
            <div class="col-md-3">
                <label>Detail Pemasokan Obat</label>
            </div>
            <div class="col-md-3">Tanggal Kadaluarsa</div>
            <div class="col-md-3">Quantity</div>
        </div>
        
    <span id="span_product_details">
        <!-- detail Pemasokan -->
    </span>

    </div>
    <hr/>
    
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
    </div>

    <div class="row">
        <div class="col-md-3">
            <div class="form-group">
                <input type="hidden" name="btn_action" id="btn_action" />
                <button type="submit" name="action" id="action" class="btn btn-info"><i class="fa fa-check-circle"></i> SUBMIT</button>
            </div>
        </div>
    </div>

</form>
<!-- form pemasokan -->

<!-- untuk selectpicker -->
<script src="js/bootstrap.bundle.min.js"></script>
<script src="js/bootstrap-select.js"></script>
<!-- untuk selectpicker -->


<script type="text/javascript">
    $(document).ready(function(){
        $('#btn_action').val('Add');
        $('#span_product_details').html('');

        var count = 0;
        add_product_row(count);

        function add_product_row(count = '')
        {
            var html = '';
            html += '<span id="row'+count+'"><div class="row">';
            html += '<div class="col-md-3">';
            html += '<select name="id_obat[]" id="id_obat'+count+'" class="form-control selectpicker" data-live-search="true" required="">';
            html += '<option value="">Pilih Obat / Jenis Obat</option>';
            html += '<?php echo fill_product_list($connect); ?>';
            html += '</select><input type="hidden" name="hidden_id_obat[]" id="hidden_id_obat'+count+'" />';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="date" id="tgl_exp" name="tgl_exp[]" placeholder="Tanggal EXP" class="form-control" required="">';
            html += '</div>';
            html += '<div class="col-md-3">';
            html += '<input type="number" id=jumlah_stok"" name="jumlah_stok[]" placeholder="QTY" class="jumlah_stok form-control" required="" max="2000000000">';
            html += '</div>';
            html += '<div class="col-md-1">';

            if(count == '')
            {
                html += '<button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs"><i class="fa fa-plus-circle"></i></button>';
            }
            else
            {
                html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove"><i class="fa fa-trash-o"></i></button>';
            }
            html += '</div>';
            html += '</div><br/></span>';
            $('#span_product_details').append(html);

            $('.selectpicker').selectpicker();
        }

        // menambah detail pemasokan
        $(document).on('click', '#add_more', function(){
            count = count + 1;
            add_product_row(count);
        });
        // menambah detail pemasokan
        
        // mengurangi detail pemasokan
        $(document).on('click', '.remove', function(){
            var row_no = $(this).attr("id");
            $('#row'+row_no).remove();
        });
        // mengurangi detail pemasokan

        // tambah ke database
        $(document).on('submit', '#order_form', function(event){
            event.preventDefault();
            $('#action').attr('disabled', 'disabled');
            var form_data = $(this).serialize();
            $.ajax({
                url:"crud/pemasokan/tambah.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    var id_pemasokan = document.getElementsByName("id_pemasokan")[0].value;
                    alert ("Berhasil Menambahkan Data Pemasokan "+id_pemasokan);
                    location.reload();
                }
            });
        });
        // tambah ke database

        // mengambil total harga
        $(document).on('keyup', '.jumlah_stok', function(event){
            event.preventDefault();
            var form_data = $("#order_form").serialize();
            $.ajax({
                url:"crud/pemasokan/total_harga.php",
                method:"POST",
                data:form_data,
                success:function(data){
                    $('#total_hrg').val(data);
                }
            });
        });
        // mengambil total harga

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
            kembalian.value = "" ;
        }
    }
    // Menghitung kembalian
     
</script>