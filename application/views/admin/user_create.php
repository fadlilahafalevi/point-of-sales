<!DOCTYPE html>
<html>
<head>
  <title>USER</title>
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
                  <h4 class="card-title">INSERT MASTER USER</h4>
                  <div>
                    <table>
                      <tbody>
                        <div>
                          <form method="POST" action="<?php echo base_url().'Controller_User/createUserCommit'; ?>" class="forms-sample">
                            <div class="form-group row">
                              <label for="exampleInputUsername2" class="col-sm-2 col-form-label">Username</label>
                              <div class="col-sm-2">
                                <input type="text" class="form-control" id="user_name" name="user_name" placeholder="Username">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="password" class="col-sm-2 col-form-label">Password</label>
                              <div class="col-sm-2">
                                <input type="password" class="form-control" id="user_password" name="user_password" placeholder="New Password">
                              </div>
                            </div>
                            <div class="form-group row">
                              <label for="level" class="col-sm-2 col-form-label">Level User</label>
                              <div class="col-sm-2">
                                <select class="form-control" id="user_level" name="user_level" >
                                  <option value="1">Admin</option>
                                  <option value="2">Kasir</option>
                                </select>
                              </div>
                            </div>
                            <button type="submit" class="btn btn-success">SAVE</button>
                            <a href="/point-of-sales/index.php/Controller_User" class="btn btn-primary">BACK</a>
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