<!DOCTYPE html>
<html>
<head>
  <title>PEMBELIAN</title>
  <link rel="stylesheet" href="/point-of-sales/assets/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/point-of-sales/assets/vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="/point-of-sales/assets/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- plugin css for this page -->
  <link rel="stylesheet" href="/point-of-sales/assets/css/dataTables.bootstrap4.css">
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="/point-of-sales/assets/css/style.css">
  <link rel="stylesheet" href="/point-of-sales/assets/css/bootstrap-datetimepicker.min.css">
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
                  <h4 class="card-title">TRANSAKSI PEMBELIAN</h4>
                  <center><?php echo $this->session->flashdata('msg');?></center>

                  <form class="forms-sample" action="<?php echo base_url().'Controller_Pembelian/add_to_cart'?>" method="post">
                    <div class="form-group row">
                      <label for="barang_id" class="col-sm-2 col-form-label"><b>No Faktur</b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="no_faktur" name="no_faktur" placeholder="No Faktur" value="<?php echo $this->session->userdata('nofak');?>">
                      </div>

                      <label for="supplier" class="col-sm-2 col-form-label">Supplier</label>
                        <div class="col-sm-3">
                          <select class="form-control" id="supplier" name="supplier">
                            <option></option>
                            <?php
                              foreach($supplier as $supplier) {
                                if($supplier->supplier_id ==$this->session->userdata('supplier')) { 
                            ?>
                                  <option value="<?= $supplier->supplier_id;?>" selected="true"><?= $supplier->supplier_nama;?></option>
                                <?php } else { ?>
                                  <option value="<?= $supplier->supplier_id;?>"><?= $supplier->supplier_nama;?></option>
                            <?php
                                }
                              }
                            ?>
                          </select>
                        </div>
                    </div>
                    <div class="form-group row">
                      <label for="barang_id" class="col-sm-2 col-form-label"><b>Tanggal</b></label>
                      <div class="col-sm-2 input-group date">
                        <input type="text" class="form-control" id='datepicker' name="tgl_faktur" placeholder="Tanggal" value="<?php echo $this->session->userdata('tglfak');?>">
                        <span class="input-group-addon">
                                <span class="glyphicon glyphicon-calendar"></span>
                            </span>
                      </div>
                    </div>
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
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Satuan</th>
                          <th>Harga Pokok</th>
                          <th>Harga Jual</th>
                          <th>Jumlah Beli</th>
                          <th>Sub Total</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          $i = 1;
                          foreach ($this->cart->contents() as $items): 
                          echo form_hidden($i.'[rowid]', $items['rowid']);
                        ?>
                          <tr>
                             <td><?=$items['id'];?></td>
                             <td><?=$items['name'];?></td>
                             <td style="text-align:center;"><?=$items['satuan'];?></td>
                             <td style="text-align:right;"><?php echo number_format($items['price']);?></td>
                             <td style="text-align:right;"><?php echo number_format($items['harga']);?></td>
                             <td style="text-align:center;"><?php echo number_format($items['qty']);?></td>
                             <td style="text-align:right;"><?php echo number_format($items['subtotal']);?></td>
                             <td style="text-align:center;"><a href="<?php echo base_url().'Controller_Pembelian/remove/'.$items['rowid'];?>" class="btn btn-danger"><span class="mdi mdi-close"></span> Remove</a></td>
                          </tr>
                        <?php 
                          $i++;
                          endforeach;
                        ?>
                      </tbody>
                    </table>
                  </div>

                  <br><br><br><br>
                  <form class="forms-sample" action="<?php echo base_url().'Controller_Pembelian/insertTransaction'?>" method="post">
                    <div class="form-group row">
                      <label for="barang_stok" class="col-sm-2 col-form-label"><b>Total </b></label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="total" name="total" placeholder="Total" readonly="readonly" value="Rp. <?php echo number_format($this->cart->total());?>" style="text-align:right;margin-bottom:5px;">
                      </div>
                    </div>
                    <input type="hidden" class="form-control" id="no_faktur" name="no_faktur" value="<?php echo $this->session->userdata('nofak');?>">
                    <input type="hidden" class="form-control" id="tgl_faktur" name="tgl_faktur" value="<?php echo $this->session->userdata('tglfak');?>">
                    <input type="hidden" class="form-control" id="supplier" name="supplier" value="<?php echo $this->session->userdata('supplier');?>">
                    <button class="btn btn-success" type="submit">SUBMIT</button>
                  </form>
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
  <script src="/point-of-salesassets/js/bootstrap-datetimepicker.min.js"></script>

  <script type="text/javascript">
            $(function () {
                $('#datetimepicker').datetimepicker({
                    format: 'DD MMMM YYYY HH:mm',
                });
                
                $('#datepicker').datetimepicker({
                    format: 'YYYY-MM-DD',
                });
                $('#datepicker2').datetimepicker({
                    format: 'YYYY-MM-DD',
                });

                $('#timepicker').datetimepicker({
                    format: 'HH:mm'
                });
            });
    </script>

  <script type="text/javascript">
    $(document).ready(function(){
      $("#barang_id").focus();

      $("#barang_id").on("input",function(){
        var kode_barang = {barang_id:$(this).val()};
        $.ajax({
          type: "POST",
          url : "<?php echo base_url().'Controller_Pembelian/getBarangDetailByCode';?>",
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