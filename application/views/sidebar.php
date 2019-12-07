<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="Controller_Dashboard">
        <i class="mdi mdi-home menu-icon"></i>
        <span class="menu-title">Dashboard</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Controller_Penjualan">
        <i class="mdi mdi-cart menu-icon"></i>
        <span class="menu-title">Penjualan Eceran</span>
      </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="Controller_Grosir">
        <i class="mdi mdi-cart menu-icon"></i>
        <span class="menu-title">Penjualan Grosir</span>
      </a>
    </li>
    <?php
      if($this->session->userdata('akses')=='1'){
    ?>
      <li class="nav-item">
        <a class="nav-link" href="Controller_Supplier">
          <i class="mdi mdi-truck menu-icon"></i>
          <span class="menu-title">Supplier</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Controller_Kategori">
          <i class="mdi mdi-sitemap menu-icon"></i>
          <span class="menu-title">Kategori</span>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="Controller_Barang">
          <i class="mdi mdi-cube menu-icon"></i>
          <span class="menu-title">Barang</span>
        </a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="Controller_User">
            <i class="mdi mdi-account menu-icon"></i>
            <span class="menu-title">User</span>
          </a>
        </li>
    <?php
      }
    ?>
  </ul>
</nav>
</body>
</html>