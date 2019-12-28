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
    <?php require 'application/views/header.php'; ?>
  <div class="container-fluid page-body-wrapper">
    <?php require 'application/views/sidebar.php'; ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">MASTER USER</h4>
                  <a class="btn btn-success" href="/point-of-sales/index.php/Controller_User/createUser">CREATE</a>
                  <div class="table-responsive pt-3">
                    <table class="table table-bordered data-table">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Username</th>
                          <th>Level</th>
                          <th>Status</th>
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
                          $no=0;
                          foreach ($data as $list_user){
                          $no++;
                        ?>
                          <tr>
                              <td><?=$no?></td>
                              <td><?=$list_user->user_name?></td>
                              <td>
                                <?php
                                  if($list_user->user_level == '1'){
                                    echo "Admin";
                                  } elseif($list_user->user_level == '2'){
                                    echo "Kasir";
                                  }
                                ?>
                              </td>
                              <td>
                                <?php
                                  if($list_user->user_status == '1'){
                                    echo "Active";
                                  } elseif($list_user->user_status == '0'){
                                    echo "Inactive";
                                  }
                                ?>
                              </td>
                              <td>
                                 <a class="btn btn-warning" href="/point-of-sales/index.php/Controller_User/updateUser/<?=$list_user->user_id?>" data-toggle="tooltip" title="Edit" style="padding: 4px">
                                  <i class="mdi mdi-pencil-box-outline"></i>
                                </a>
                                <a class="btn btn-danger" href="/point-of-sales/index.php/Controller_User/inactivateUser/<?=$list_user->user_id?>" data-toggle="tooltip" title="Inactive" style="padding: 4px">
                                  <i class="mdi mdi-account-remove"></i>
                                </a>
                                <a class="btn btn-primary" href="/point-of-sales/index.php/Controller_User/activateUser/<?=$list_user->user_id?>" data-toggle="tooltip" title="Activate" style="padding: 4px">
                                  <i class="mdi mdi-account-plus"></i>
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