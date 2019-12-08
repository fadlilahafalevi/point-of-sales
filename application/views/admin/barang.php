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
                  <a class="btn btn-success" href="/point-of-sales/index.php/Controller_Barang/createBarang">CREATE</a>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Kode Barang</th>
                          <th>Nama Barang</th>
                          <th>Satuan</th>
                          <th>Harga Pokok</th>
                          <th>Stock</th>
                          <th>Kategori</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                          foreach ($data as $list_barang) {
	                      ?>
                          <tr>
                              <td><?=$list_barang->id?></td>
                              <td><?=$list_barang->barang_id?></td>
                              <td><?=$list_barang->barang_nama?></td>
                              <td><?=$list_barang->barang_satuan?></td>
                              <td><?=$list_barang->barang_harpok?></td>
                              <td><?=$list_barang->barang_stok?></td>
                              <td><?=$list_barang->kategori_nama?></td>
                              <td>
                                <a class="btn btn-info" href="/point-of-sales/index.php/Controller_Barang/getBarangDetailByID/<?=$list_barang->id?>" data-toggle="tooltip" title="Detail" style="padding: 4px">
                                 <i class="mdi mdi-eye"></i>
                                </a>
                               <a class="btn btn-warning" href="/point-of-sales/index.php/Controller_Barang/updateBarangForm/<?=$list_barang->id?>" data-toggle="tooltip" title="Edit" style="padding: 4px">
                                  <i class="mdi mdi-pencil-box-outline"></i>
                                </a>
                              </td>
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
    $(document).ready(function(){
      $('.data-table').dataTable();
    });
  </script>
</body>
</html>