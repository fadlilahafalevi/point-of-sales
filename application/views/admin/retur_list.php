<!DOCTYPE html>
<html>
<head>
  <title>RETUR PENJUALAN</title>
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
                  <h4 class="card-title">RETUR PENJUALAN</h4>
                  <center><?php echo $this->session->flashdata('msg');?></center>

                  <form class="forms-sample" action="<?php echo base_url().'Controller_Retur/createRetur'?>" method="post">
                    <div class="form-group row">
                      <label for="barang_id" class="col-sm-2 col-form-label"><b>Kode Barang</b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="barang_id" name="barang_id" placeholder="Kode Barang">
                      </div>
                    </div>

                    <div id="detail_barang">
                    </div>
                    
                  </form>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>Tanggal</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Satuan</th>
                          <th>Harga (Rp)</th>
                          <th>Jumlah</th>
                          <th>Sub Total</th>
                          <th>Keterangan</th>
                        </tr>
                      </thead>
                      <tbody>
                          <?php
                          foreach ($retur as $list_retur) {
                        ?>
                          <tr>
                              <td><?=$list_retur->retur_tanggal?></td>
                              <td><?=$list_retur->retur_barang_id?></td>
                              <td><?=$list_retur->retur_barang_nama?></td>
                              <td><?=$list_retur->retur_barang_satuan?></td>
                              <td><?=$list_retur->retur_harjul?></td>
                              <td><?=$list_retur->retur_qty?></td>
                              <td><?=$list_retur->retur_subtotal?></td>
                              <td><?=$list_retur->retur_keterangan?></td>
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
    $(function(){
      $('#bayar_tunai').on("input",function(){
        var total    = $('#total_belanja_hide').val();
        var jml_uang = $('#bayar_tunai').val();
        var hasil    = jml_uang.replace(/[^\d]/g,"");
        $('#bayar_tunai_hide').val(hasil);
          $('#kembalian').val(hasil - total);
        })     
    });
  </script>

  <script type="text/javascript">
    $('#kembalian').priceFormat({
      prefix: '',
      centsLimit: 0,
      thousandsSeparator: ','
    });
    
    $('#barang_harjul').priceFormat({
      prefix: '',
      centsLimit: 0,
      thousandsSeparator: ','
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#barang_id").focus();

      $("#barang_id").on("input",function(){
        var kode_barang = {barang_id:$(this).val()};
        $.ajax({
          type: "POST",
          url : "<?php echo base_url().'Controller_Retur/getBarangDetailByCode';?>",
          data: kode_barang,
          success: function(msg){
            $('#detail_barang').html(msg);
          },
          error : function(data) {
            console.log("ERROR: ", data);
          }
        });
      }); 

      $("#barang_id").keypress(function(e){
        if(e.which==13){
          $("#jumlah").focus();
        }
      });
    });
  </script>
</body>
</html>