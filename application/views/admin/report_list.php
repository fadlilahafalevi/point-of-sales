<!DOCTYPE html>
<html>
<head>
  <title>REPORT</title>
  <link rel="stylesheet" href="/point-of-sales/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/point-of-sales/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/point-of-sales/assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/point-of-sales/assets/css/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/point-of-sales/assets/css/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="/point-of-sales/assets/images/favicon.png" />
</head>
<body>
    <?php require 'application/views/header.php';?>
  <div class="container-fluid page-body-wrapper">
    <?php require 'application/views/sidebar.php';?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">REPORT</h4>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Report</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td>1</td>
                          <td>Laporan Stok Barang</td>
                          <td>
                            <a class="btn btn-primary" href="/point-of-sales/index.php/Controller_Report/reportStockBarang" style="padding: 4px">
                            <i class="mdi mdi-printer"></i> Print
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>2</td>
                          <td>Laporan Penjualan Per Hari</td>
                          <td>
                            <a class="btn btn-primary" href="#lap_jual_perhari" data-toggle="modal" style="padding: 4px">
                            <i class="mdi mdi-printer"></i> Print
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>3</td>
                          <td>Laporan Penjualan Per Bulan</td>
                          <td>
                            <a class="btn btn-primary" href="#lap_jual_perbulan" data-toggle="modal" style="padding: 4px">
                            <i class="mdi mdi-printer"></i> Print
                            </a>
                          </td>
                        </tr>
                        <tr>
                          <td>4</td>
                          <td>Laporan Penjualan Per Tahun</td>
                          <td>
                            <a class="btn btn-primary" href="#lap_jual_pertahun" data-toggle="modal" style="padding: 4px">
                            <i class="mdi mdi-printer"></i> Print
                            </a>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
        <!-- ============ MODAL PENJUALAN PER HARI =============== -->
        <div class="modal fade" id="lap_jual_perhari" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Choose date</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal" method="post" action="/point-of-sales/index.php/Controller_Report/reportPenjualan_perHari" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Date</label>
                        <div class="col-xs-9">
                            <div class='input-group date' id='datepicker' style="width:300px;">
                                <input type='text' name="tgl" class="form-control" value="" placeholder="Date" required/>
                                <span class="input-group-addon">
                                    <span class="glyphicon glyphicon-calendar"></span>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary"><span class="mdi mdi-printer"></span> Print</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!-- ============ END MODAL PENJUALAN PER HARI =============== -->

        <!-- ============ MODAL PENJUALAN PER BULAN =============== -->
        <div class="modal fade" id="lap_jual_perbulan" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Choose month</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal" method="post" action="/point-of-sales/index.php/Controller_Report/reportPenjualan_perBulan" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Month</label>
                        <div class="col-xs-9">
                            <select class="form-control" id="bln" name="bln">
                              <option></option>
                                <?php
                                  foreach($jual_bln as $jual_bln) { 
                                ?>
                                  <option value="<?= $jual_bln->bulan; ?>"><?= $jual_bln->bulan;?></option>
                                <?php
                                  } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary"><span class="mdi mdi-printer"></span> Print</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!-- ============ END MODAL PENJUALAN PER BULAN =============== -->

        <!-- ============ MODAL PENJUALAN PER TAHUN =============== -->
        <div class="modal fade" id="lap_jual_pertahun" tabindex="-1" role="dialog" aria-labelledby="largeModal" aria-hidden="true">
            <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="myModalLabel">Choose year</h3>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form class="form-horizontal" method="post" action="/point-of-sales/index.php/Controller_Report/reportPenjualan_perTahun" target="_blank">
                <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label col-xs-3" >Year</label>
                        <div class="col-xs-9">
                            <select class="form-control" id="thn" name="thn">
                              <option></option>
                                <?php
                                  foreach($jual_thn as $jual_thn) { 
                                ?>
                                  <option value="<?= $jual_thn->tahun; ?>"><?= $jual_thn->tahun;?></option>
                                <?php
                                  } 
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button class="btn" data-dismiss="modal" aria-hidden="true">Close</button>
                    <button class="btn btn-primary"><span class="mdi mdi-printer"></span> Print</button>
                </div>
            </form>
            </div>
            </div>
        </div>
        <!-- ============ END MODAL PENJUALAN PER TAHUN =============== -->
      </div>
    </div>
  </div>

  <script src="/point-of-sales/assets/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page-->
  <script src="/point-of-sales/assets/js/Chart.min.js"></script>
  <script src="/point-of-sales/assets/js/jquery.dataTables.js"></script>
  <script src="/point-of-sales/assets/js/dataTables.bootstrap4.2.js"></script>
  <!-- End plugin js for this page-->
  <!-- inject:js -->
  <script src="/point-of-sales/assets/js/off-canvas.js"></script>
  <script src="/point-of-sales/assets/js/hoverable-collapse.js"></script>
  <script src="/point-of-sales/assets/js/template.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="/point-of-sales/assets/js/dashboard.js"></script>
  <script src="/point-of-sales/assets/js/data-table.js"></script>
  <script src="/point-of-sales/assets/js/jquery.dataTables.js"></script>
  <script src="/point-of-sales/assets/js/dataTables.bootstrap4.js"></script>
  <script type="text/javascript">
    $(document).ready(function(){
      $('.data-table').dataTable();
    });
  </script>
</body>
</html>