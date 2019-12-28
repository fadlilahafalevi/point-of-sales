<!DOCTYPE html>
<html>
<head>
  <title>DASHBOARD</title>
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
    
  <!-- <link src="/point-of-sales/assets/js/grafik/jquery.js"/> -->
  <link href="/point-of-sales/assets/js/grafik/highcharts.js"/>
  <?php
        foreach($report as $data){
            $merk[] = $data->kategori_nama;
            $stok[] = $data->tot_stok;
        }
        
        foreach($reportPenjualan as $data){
            $totalP[] = $data->total;
            $tahunP[] = $data->tahun;
        }
  ?>
</head>
<body>
  <div class="container-fluid page-body-wrapper">
    <?php require 'application/views/header.php'; ?>
    <?php require 'application/views/sidebar.php'; ?>
    <div class="main-panel">
      <div class="content-wrapper">
        Stok Barang
        <br><br>
      <canvas id="canvas" width="1000" height="280"></canvas>
      <script type="text/javascript" src="/point-of-sales/assets/js/grafik/chartjs/chart.min.js"></script>
      <script>
       
                  var lineChartData = {
                      labels : <?php echo json_encode($merk);?>,
                      datasets : [
                           
                          {
                              fillColor: "rgba(60,141,188,0.9)",
                              strokeColor: "rgba(60,141,188,0.8)",
                              pointColor: "#3b8bba",
                              pointStrokeColor: "#fff",
                              pointHighlightFill: "#fff",
                              pointHighlightStroke: "rgba(152,235,239,1)",
                              data : <?php echo json_encode($stok);?>
                          }
       
                      ]
                       
                  }
       
              var myLine = new Chart(document.getElementById("canvas").getContext("2d")).Line(lineChartData);
               
          </script>
        <br><br>
        Grafik Penjualan Keseluruhan
        <br><br>
      <canvas id="canvasPenjualan" width="1000" height="280"></canvas>
      <script>
       
                  var lineChartData = {
                      labels : <?php echo json_encode($tahunP);?>,
                      datasets : [
                           
                          {
                              fillColor: "rgba(60,141,188,0.9)",
                              strokeColor: "rgba(60,141,188,0.8)",
                              pointColor: "#3b8bba",
                              pointStrokeColor: "#fff",
                              pointHighlightFill: "#fff",
                              pointHighlightStroke: "rgba(152,235,239,1)",
                              data : <?php echo json_encode($totalP);?>
                          }
       
                      ]
                       
                  }
       
              var myLine = new Chart(document.getElementById("canvasPenjualan").getContext("2d")).Line(lineChartData);
               
          </script>

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
</body>
</html>