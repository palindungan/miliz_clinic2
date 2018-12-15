<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Laporan Laba (Rugi)</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=dashboard">Dashboard</a></li>
                            <li class="active">Laporan</li>
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
            
            <div class="col-xs-6 col-sm-6">
                <div class="card">
                    <div class="card-header">
                        <strong>Cetak Laporan</strong> <small>Berdasarkan Tanggal</small>
                    </div>
                    <div class="card-body card-block">

                        <form action="mpdf/laporan/cetak_laporan.php" target="_black" method="post">
                            <div class="form-group">
                                <label class=" form-control-label">Mulai</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="date" name="date1" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <label class=" form-control-label">Hingga</label>
                                <div class="input-group">
                                    <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                    <input type="date" name="date2" class="form-control" required="">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                    <button type="submit" class="btn btn-info mb-1">VIEW</button>
                                </div>
                            </div>
                        </form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tabel -->