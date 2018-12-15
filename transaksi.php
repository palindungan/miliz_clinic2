<!-- pemberitahuan menu yang dibuka -->
<div class="breadcrumbs">
    <div class="breadcrumbs-inner">
        <div class="row m-0">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Transaksi</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="?halaman=dashboard">Dashboard</a></li>
                            <li class="active">Transaksi</li>
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

                        <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                            <li class="nav-item">
                                <a href="?halaman=transaksi&amp;tap=1" class="nav-link <?php if($_GET['tap']=='1'){ echo 'active'; } ?>">Transaksi</a>
                            </li>
                            <li class="nav-item">
                                <a href="?halaman=transaksi&amp;tap=2" class="nav-link <?php if($_GET['tap']=='2'){ echo 'active'; } ?>">Data Transaksi</a>
                            </li>
                        </ul>

                        <!-- detail tab -->
                        <?php 
                            if (!isset($_GET['tap'])) 
                                {
                                    error_reporting(0);
                                }
                            if ($_GET['tap']=='1') 
                                {
                                    include "detail_transaksi/form_transaksi.php";
                                }
                            if ($_GET['tap']=='2') 
                                {
                                    include "detail_transaksi/tabel_data_transaksi.php";
                                }
                        ?>  
                        <!-- detail tab -->

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- tabel karyawan -->

<script type="text/javascript">
        $(document).ready(function() {
          $('#tabel').DataTable();
      } );
</script>
