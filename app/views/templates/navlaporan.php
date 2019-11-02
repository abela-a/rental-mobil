<?php
if (!isset($_SESSION['Login'])) {
  SweetAlert::setSwalAlert("Perhatian", "Anda harus login terlebih dahulu", "warning");
  header('Location:' . BASEURL . '/auth');
  exit;
} else {
  if ($_SESSION['Login']['RoleId'] !== '2' && $_SESSION['Login']['RoleId'] !== '1') {
    SweetAlert::setSwalAlert("Perhatian", "Anda bukan karyawan", "error");
    header('Location:' . BASEURL . '/' . strtolower($_SESSION['Login']['Role']));
    exit;
  }
}
?>

<!-- Nav -->
<div class="indigo sticky-top" id="navdashboard" style="z-index:1">
  <div class="container py-1">
    <ul id="no-waves" class="nav md-tabs justify-content-center indigo shadow-none mx-0 mb-0">

      <li class="nav-item mr-2">
        <a class="nav-link indigo accent-2 rounded" href="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>">
          Dashboard
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan">
          Home Laporan
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan Transaksi') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan/transaksi">
          Transaksi
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan Arsip Transaksi') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan/arsip_transaksi">
          Arsip Transaksi
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan Kendaraan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan/kendaraan">
          Kendaraan
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan Sopir') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan/sopir">
          Sopir
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan Karyawan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan/karyawan">
          Karyawan
        </a>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Laporan Pelanggan') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/laporan/pelanggan">
          Pelanggan
        </a>
      </li>

    </ul>
  </div>
</div>
<!-- Akhir Nav -->