<?php
if (!isset($_SESSION['Login'])) {
  Flasher::setFlash('Anda harus login terlebih dahulu', 'danger');
  header('Location:' . BASEURL . '/auth');
  exit;
} else {
  if ($_SESSION['Login']['RoleId'] !== '1') {
    Flasher::setFlash('Anda bukan admin', 'danger');
    header('Location:' . BASEURL . '/' . strtolower($_SESSION['Login']['Role']));
    exit;
  }
}
?>
<!--Main Navigation-->
<header>
  <nav class="navbar navbar-expand-lg navbar-dark indigo accent-2 py-0 shadow-none">
    <div class="container">

      <a class="navbar-brand py-0" href="<?= BASEURL; ?>">
        <img src="<?= BASEURL; ?>/img/assets/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
        <span style="font-size:25px" class="font-weight-bold"><?= APP_NAME; ?></span>
        <span style="font-size:18px" class="font-weight-thin"><?= APP_TYPE; ?></span>
      </a>

      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navResponsive" aria-controls="navResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse ml-4" id="navResponsive">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item">
            <input class="form-control form-control-sm" type="text" placeholder="Cari...">
          </li>
        </ul>
        <ul class="navbar-nav nav-flex-icons">
          <?php
          if (!isset($_SESSION['Login'])) : ?>

          <?php else : ?>
            <!-- Jika ada sesi Login -->
            <li class="nav-item dropdown">
              <a class="nav-link" id="mobil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="badge badge-light shadow-none mr-2"><?= $_SESSION['Login']['Role'] ?></span>
                <span style="font-size:15px" class="text-white mr-2 font-weight-regular">
                  <?= $_SESSION['Login']['Nama'] ?>
                </span>
                <img src="<?= BASEURL . '/img/fotouser/' . $_SESSION['Login']['Foto'] ?>" class="rounded border" width="35" height="35">
              </a>

              <div class="dropdown-menu dropdown-warning dropdown-menu-right" aria-labelledby="mobil">
                <a class="dropdown-item" href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id'] ?>">
                  Edit Profile
                </a>
                <a class="dropdown-item" href="<?= BASEURL ?>/auth/SignOut">Logout</a>
              </div>
            </li>
          <?php endif; ?>
        </ul>
      </div>
    </div>
  </nav>
</header>
<!--Main Navigation-->

<!-- Nav -->
<div class="indigo">
  <div class="container py-1">
    <ul id="no-waves" class="nav md-tabs indigo shadow-none mx-0 mb-0">

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Dashboard') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL; ?>/admin">
          <i class="fas fa-tachometer-alt fa-fw mr-1"></i>
          Dashboard
        </a>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle 
        <?php if (
          $data['judul'] == 'Merk' ||
          $data['judul'] == 'Tipe' ||
          $data['judul'] == 'Mobil'
        )
          echo 'nav-dashboard-active rounded' ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-car fa-fw mr-1"></i>
          Kendaraan
        </a>
        <div class="dropdown-menu dropdown-primary">
          <a class="dropdown-item <?php if ($data['judul'] == 'Merk') echo 'active' ?>" href="<?= BASEURL ?>/admin/merk">Merk</a>
          <a class="dropdown-item <?php if ($data['judul'] == 'Tipe') echo 'active' ?>" href="<?= BASEURL ?>/admin/type">Type</a>
          <a class="dropdown-item <?php if ($data['judul'] == 'Mobil') echo 'active' ?>" href="<?= BASEURL ?>/admin/mobil">Mobil</a> </div>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle
        <?php if (
          $data['judul'] == 'Transaksi' ||
          $data['judul'] == 'Transaksi Selesai' ||
          $data['judul'] == 'Arsip Transaksi'
        )
          echo 'nav-dashboard-active rounded' ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-dollar-sign fa-fw mr-1"></i>
          Transaksi
        </a>
        <div class="dropdown-menu dropdown-primary">
          <a class="dropdown-item <?php if ($data['judul'] == 'Transaksi') echo 'active' ?>" href="<?= BASEURL ?>/admin/transaksi">Transaksi</a>
          <a class="dropdown-item <?php if ($data['judul'] == 'Transaksi Selesai') echo 'active' ?>" href="<?= BASEURL ?>/admin/transaksi_selesai">Transaksi Selesai</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item <?php if ($data['judul'] == 'Arsip Transaksi') echo 'active' ?>" href="<?= BASEURL ?>/admin/arsip_transaksi">Arsip Transaksi</a>
        </div>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle
        <?php if (
          $data['judul'] == 'Pelanggan' ||
          $data['judul'] == 'Karyawan' ||
          $data['judul'] == 'Role' ||
          $data['judul'] == 'Akun Pending'
        )
          echo 'nav-dashboard-active rounded' ?>" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-users fa-fw mr-3"></i>
          Data Akun
          <?php if ($data['JmlPending'] > 0) echo
            '<span class="ml-1 badge badge-danger">
              ' . $data['JmlPending'] . '
              </span>'
          ?>
        </a>
        <div class="dropdown-menu dropdown-primary">
          <a class="dropdown-item <?php if ($data['judul'] == 'Pelanggan') echo 'active' ?>" href="<?= BASEURL ?>/admin/pelanggan">Pelanggan</a>
          <a class="dropdown-item <?php if ($data['judul'] == 'Karyawan') echo 'active' ?>" href="<?= BASEURL ?>/admin/karyawan">Karyawan</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item <?php if ($data['judul'] == 'Akun Pending') echo 'active' ?>" href="<?= BASEURL ?>/admin/pending">
            Akun Pending
            <?php if ($data['JmlPending'] > 0) echo
              '<span class="badge badge-danger float-right">
              ' . $data['JmlPending'] . '
              </span>'
            ?>
          </a>
          <a class="dropdown-item <?php if ($data['judul'] == 'Role') echo 'active' ?>" href="<?= BASEURL ?>/admin/role">User Role</a>
        </div>
      </li>

      <li class="nav-item mr-2">
        <a class="nav-link <?php if ($data['judul'] == 'Sopir') echo 'nav-dashboard-active rounded' ?>" href="<?= BASEURL ?>/admin/sopir">
          <i class="fas fa-user-tie fa-fw mr-1"></i>
          Data Sopir
        </a>
      </li>

      <li class="nav-item dropdown mr-2">
        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-print fa-fw mr-1"></i>
          Laporan
        </a>
        <div class="dropdown-menu dropdown-primary">
          <a class="dropdown-item" href="#">Transaksi</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Kendaraan</a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="#">Karyawan</a>
          <a class="dropdown-item" href="#">Pelanggan</a>
        </div>
      </li>

    </ul>
  </div>
</div>
<!-- Akhir Nav -->

<div class="indigo shadow-sm" id="top-main">
  <div class="container">
    <div class="pt-5 pb-1">
      <h2 class="h1 text-white"><?= strtoupper($data['judul']) ?></h2>
    </div>
    <div class="pb-5" id="breadcrump">
      <span style="font-size:17px" class="text-white">
        <i class="fa fa-home fa-fw"></i>
        <span class="mx-3">|</span>
        <span>Home</span>
        <i class="fa fa-angle-right fa-fw mx-2"></i>
        <span>Dashboard</span>
        <?php
        if (!isset($data['url'][1])) : ?>
        <?php else : ?>
          <i class="fa fa-angle-right fa-fw mx-2"></i>
          <span>
            <?= ucfirst($data['url'][1]) ?>
          </span>
        <?php endif; ?>
      </span>
    </div>
  </div>
</div>