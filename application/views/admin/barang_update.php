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
                  <h4 class="card-title">MASTER BARANG</h4>
                  <div>
                    <table>
                      <tbody>
                        <?php
                          foreach ($data as $list_barang) {
                      	?>
                        <div>
                          <form method="POST" action="<?php echo base_url().'Controller_Barang/updateBarangCommit'; ?>" class="forms-sample">
                            <div class="form-group row">
                              <label for="exampleInputUsername2" class="col-sm-2 col-form-label">ID</label>
                              <div class="col-sm-1">
                                <input type="text" class="form-control" id="id" name="id" placeholder="ID" value="<?=$list_barang->id?>" readonly="readonly">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputEmail2" class="col-sm-2 col-form-label">Kode Barang</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_id" name="barang_id" placeholder="Kode Barang" value="<?=$list_barang->barang_id?>" readonly="readonly">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Nama Barang</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_nama" name="barang_nama" placeholder="Nama Barang" value="<?=$list_barang->barang_nama?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="kategori" class="col-sm-2 col-form-label">Kategori</label>
                                <div class="col-sm-3">
                                  <select class="form-control" id="barang_kategori_id" name="barang_kategori_id">
                                    <option></option>
                                    <?php
                                      foreach($kategori as $kategori) { 
                                        if($kategori->kategori_id == $list_barang->barang_kategori_id) { ?>
                                          <option value="<?= $kategori->kategori_id; ?>" selected="true"><?= $kategori->kategori_nama;?></option>
                                        <?php } else { ?>
                                          <option value="<?= $kategori->kategori_id; ?>"><?= $kategori->kategori_nama;?></option>
                                    <?php
                                        }
                                      } 
                                    ?>
                                  </select>
                                </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Satuan</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_satuan" name="barang_satuan" placeholder="Satuan" value="<?=$list_barang->barang_satuan?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Harga Pokok</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_harpok" name="barang_harpok" placeholder="Harga Pokok" value="<?=$list_barang->barang_harpok?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Stock</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_stok" name="barang_stok" placeholder="Stock" value="<?=$list_barang->barang_stok?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Minimal Stock</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_min_stok" name="barang_min_stok" placeholder="Minimal Stock" value="<?=$list_barang->barang_min_stok?>">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Tanggal Input</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_tgl_input" name="barang_tgl_input" placeholder="Tanggal Input" value="<?=$list_barang->barang_tgl_input?>" disabled="disabled">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="exampleInputMobile" class="col-sm-2 col-form-label">Tanggal Update Terakhir</label>
                              <div class="col-sm-3">
                                <input type="text" class="form-control" id="barang_tgl_last_update" name="barang_tgl_last_update" placeholder="Tanggal Update Terakhir" value="<?=$list_barang->barang_tgl_last_update?>" disabled="disabled">
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success">SAVE</button>
                            <a href="/point-of-sales/index.php/Controller_Barang" class="btn btn-primary">BACK</a>
                          </form>
                        </div>
                        <?php
                          }
                        ?>
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