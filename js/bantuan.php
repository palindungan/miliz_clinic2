<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>

	<span id="row'+count+'">
	    <div class="row">
            <div class="col-md-3">
                <select name="pilihan" id="pilihan" class="form-control" required="">
                    <option value="">Pilih Transaksi</option>
                    <option value="obat">Obat</option>
                    <option value="perawatan">Perawatan</option>
                    <option value="konsultasi">Konsultasi</option>
                </select>
            </div>
        	<div class="col-md-3">
		        <select name="id_obat[]" id="id_obat'+count+'" class="form-control" required="">
		        	<option value="">Pilih Obat / Jenis Obat</option>
		        	<?php echo fill_product_list($connect); ?>
		        </select>
		        <input type="hidden" name="hidden_id_obat[]" id="hidden_id_obat'+count+'" />
	        </div>
            <div class="col-md-3">
                <input type="number" id="" name="" placeholder="QTY" class="form-control" required="" max="2000000000">
            </div>
            <div class="col-md-1">
		        <button type="button" name="add_more" id="add_more" class="btn btn-success btn-xs">Tambah</button>
		        <button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">Hapus</button>
	        </div>
        </div>
		<br/>
    </span>

    <span id="row'+count+'">
        <div class="row">
            <div class="col-md-3">
                <select name="id_detail[]" id="id_detail'+count+'" class="form-control" required="">
                    <option value="">Pilih Detail</option>
                    <?php echo fill_product_list($connect); ?>
                </select>
                <input type="hidden" name="hidden_id_detail[]" id="hidden_id_detail'+count+'" />
            </div>
            <div class="col-md-3">
                <input type="number" id="qty" name="qty" placeholder="QTY" class="form-control" required="" max="2000000000">
            </div>
            <div class="col-md-1">
                <button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">Hapus</button>
            </div>
        </div>
        <br/>
    </span>

    var html = '';
    html += '<span id="row'+count+'"><div class="row">';
    html += '<div class="col-md-3">';
    html += '<select name="id_detail[]" id="id_detail'+count+'" class="form-control" required="">';
    html += '<option value="">Pilih Detail</option>';
    html += '<?php echo fill_product_list($connect); ?>';
    html += '</select><input type="hidden" name="hidden_id_detail[]" id="hidden_id_detail'+count+'" />';
    html += '</div>';
    html += '<div class="col-md-3">';
    html += '<input type="number" id="qty" name="qty" placeholder="QTY" class="form-control" required="" max="2000000000">';
    html += '</div>';
    html += '<div class="col-md-1">';
    html += '<button type="button" name="remove" id="'+count+'" class="btn btn-danger btn-xs remove">Hapus</button>';
    html += '</div>';
    html += '</div><br/></span>';

</body>
</html>