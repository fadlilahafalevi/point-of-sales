<!DOCTYPE html>
<html>
<head>
  <title>BARANG</title>
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
                  <h4 class="card-title">INSERT MASTER BARANG</h4>
                  <div>
                    <table>
                      <tbody>
                      <div>
                        <form class="forms-sample" action="<?php echo base_url() . 'Controller_Barang/createBarangCommit'; ?>" method="post">
                          <div class="form-group row">
                            <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Kode Barang</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="kode" name="kode" placeholder="Kode Barang" required="required">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Nama Barang</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Barang">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                              <div class="col-sm-3">
                                <select class="form-control" id="barang_kategori_id" name="barang_kategori_id">
                                  <option></option>
                                  <?php
                                    foreach($kategori as $kategori) { ?>
                                        <option value="<?= $kategori->kategori_id; ?>"><?= $kategori->kategori_nama;?></option>
                                  <?php
                                      }
                                  ?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Satuan</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Harga Pokok</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="hargaPokok" name="hargaPokok" placeholder="Harga Pokok">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Harga Jual</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="hargaPokok" name="hargaJual" placeholder="Harga Jual">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Stock</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="stock" name="stock" placeholder="Stock">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="exampleInputMobile" class="col-sm-2 col-form-label">Minimal Stock</label>
                            <div class="col-sm-3">
                              <input type="text" class="form-control" id="minimalStock" name="minimalStock" placeholder="Minimal Stock">
                            </div>
                          </div>
                          <a href="/point-of-sales/index.php/Controller_Barang" class="btn btn-primary">Back</a>  &nbsp;  &nbsp;  &nbsp;  &nbsp; <input class="btn btn-success" type="submit" value="Create">
                        </form>
                      </div>
                      </tbody>
                    </table>
                  </div>
                  <br>
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
    $(document).ready(function(){
      $('.data-table').dataTable();
    });
  </script>
</body>
</html>