<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
    <?php
      if($this->session->userdata('akses')=='1'){
    ?>
      <a class="nav-link" href="/point-of-sales/index.php/Controller_Dashboard">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <?php
      }
    ?>
    <li class="nav-item">
      <a class="nav-link" href="/point-of-sales/index.php/Controller_Retur">
        <i class="mdi mdi-refresh menu-icon"></i>
        <span class="menu-title">Retur</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/point-of-sales/index.php/Controller_Penjualan">
        <i class="mdi mdi-cart menu-icon"></i>
        <span class="menu-title">Penjualan</span>
      </a>
    </li>
    <?php
      if($this->session->userdata('akses')=='1'){
    ?>
      <li class="nav-item">
        <a class="nav-link" href="/point-of-sales/index.php/Controller_Pembelian">
          <i class="mdi mdi-cart menu-icon"></i>
          <span class="menu-title">Pembelian</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/point-of-sales/index.php/Controller_Supplier">
          <i class="mdi mdi-truck menu-icon"></i>
          <span class="menu-title">Supplier</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/point-of-sales/index.php/Controller_Kategori">
          <i class="mdi mdi-sitemap menu-icon"></i>
          <span class="menu-title">Kategori</span>
        </a>
      </li>
      <?php
        }
      ?>
      <li class="nav-item">
        <a class="nav-link" href="/point-of-sales/index.php/Controller_Barang">
          <i class="mdi mdi-cube menu-icon"></i>
          <span class="menu-title">Barang</span>
        </a>
      </li>
      <?php
        if($this->session->userdata('akses')=='1'){
      ?>
      <li class="nav-item">
        <a class="nav-link" href="/point-of-sales/index.php/Controller_User">
          <i class="mdi mdi-account menu-icon"></i>
          <span class="menu-title">User</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/point-of-sales/index.php/Controller_Report">
          <i class="mdi mdi-file menu-icon"></i>
          <span class="menu-title">Report</span>
        </a>
      </li>
    <?php
      }
    ?>
  </ul>
</nav>
</body>
</html>