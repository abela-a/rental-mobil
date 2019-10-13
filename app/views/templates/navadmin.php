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
  <nav class="navbar navbar-expand-lg navbar-dark indigo accent-2 scrolling-navbar py-0 shadow-none">
    <div class="container">

      <a class="navbar-brand py-0" href="#">
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
    <a class="nav-link nav-dashboard-active rounded" href="#">Dashboard</a>
  </li>

  <li class="nav-item dropdown mr-2">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">Kendaraan</a>
    <div class="dropdown-menu dropdown-primary">
      <a class="dropdown-item" href="#">Merk</a>
      <a class="dropdown-item" href="#">Type</a>
      <a class="dropdown-item" href="#">Mobil</a>
    </div>
  </li>

  <li class="nav-item dropdown mr-2">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">Transaksi</a>
    <div class="dropdown-menu dropdown-primary">
      <a class="dropdown-item" href="#">Transaksi</a>
      <a class="dropdown-item" href="#">Transaksi Selesai</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Arsip Transaksi</a>
    </div>
  </li>

  <li class="nav-item dropdown mr-2">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">Data Akun</a>
    <div class="dropdown-menu dropdown-primary">
      <a class="dropdown-item" href="#">Pelanggan</a>
      <a class="dropdown-item" href="#">Karyawan</a>
      <div class="dropdown-divider"></div>
      <a class="dropdown-item" href="#">Akun Pending</a>
      <a class="dropdown-item" href="#">User Role</a>
    </div>
  </li>

  <li class="nav-item">
    <a class="nav-link" href="#!">Data Sopir</a>
  </li>

  <li class="nav-item dropdown mr-2">
    <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
      aria-expanded="false">Laporan</a>
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

<div class="row no-gutters">
  <div class="col-lg-3 shadow">
    <div class="sidebar">
      <!-- WEB TITLE -->
      <a href="<?= BASEURL ?>">
        <div class="ml-4 mt-2 bg-main">
          <span class="web-title"><?= APP_NAME; ?>
            <span class="web-subtitle"><?= APP_TYPE; ?></span>
          </span><br>
          <i style="font-size:15px" class="badge-success rounded p-1"><?= APP_TAGLINE; ?></i>
        </div>
      </a>
      <!-- USER -->
      <a href="#user" data-toggle="collapse" aria-expanded="false" class="p-3 mx-4 mt-4 bg-wow rounded list-group-item">
        <div class="row">
          <div class="col-md-3"><img src="<?= BASEURL ?>/img/fotouser/<?= $_SESSION['Login']['Foto'] ?>" class="rounded" width="50" height="50"></div>
          <div class="col-md">
            <span style="font-weight:400;font-size:17px"><?= $_SESSION['Login']['Nama'] ?></span><br>
            <span style="font-size:15px"><?= $_SESSION['Login']['Role'] ?></span>
          </div>
        </div>
      </a>
      <div id='user' class="collapse mx-4">
        <div class="row no-gutters p-1">
          <div class="col-md m-1">
            <a href="<?= BASEURL; ?>/admin/userProfile/<?= $_SESSION['Login']['Id'] ?>" class="btn bg-back btn-block">
              <i class="fas fa-edit fa-fw"></i>
            </a>
          </div>
          <div class="col-md m-1">
            <a href="<?= BASEURL; ?>/auth/SignOut" class="btn bg-back btn-block">
              <i class="fas fa-power-off fa-fw"></i>
            </a>
          </div>
        </div>
      </div>
      <div class="mt-3 accordion" id="menu-coll">
        <!-- DASHBOARD -->
        <a href="<?= BASEURL; ?>/admin" class="btn-main <?php if ($data['judul'] == 'Dashboard') echo 'btn-main-active'; ?>">
          <i class="fas fa-tachometer-alt fa-fw mr-3"></i>
          <span class="text-menu">Dashboard</span>
        </a>
        <hr class="my-2 mx-4">
        <!-- TRANSAKSI -->
        <a href="<?= BASEURL; ?>/admin/transaksi" class="btn-main <?php if ($data['judul'] == 'Transaksi') echo 'btn-main-active'; ?>">
          <i class="fas fa-dollar-sign fa-fw mr-3"></i>
          <span class="text-menu">Transaksi</span>
        </a>
        <hr class="my-2 mx-4">
        <!-- DATA KENDARAAN -->
        <a href="#kendaraan" data-toggle="collapse" aria-expanded="false" class="btn-main">
          <i class="fas fa-car fa-fw mr-3"></i>
          <span class="text-menu">Data Kendaraan</span>
        </a>
        <div id='kendaraan' class="collapse bg-white rounded <?php if ($data['judul'] == 'Merk' || $data['judul'] == 'Tipe' || $data['judul'] == 'Mobil') echo 'show'; ?>" data-parent="#menu-coll">
          <a href="<?= BASEURL; ?>/admin/merk" class="btn-main <?php if ($data['judul'] == 'Merk') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Merk</span>
          </a>
          <a href="<?= BASEURL; ?>/admin/type" class="btn-main <?php if ($data['judul'] == 'Tipe') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Tipe</span>
          </a>
          <a href="<?= BASEURL; ?>/admin/mobil" class="btn-main <?php if ($data['judul'] == 'Mobil') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Mobil</span>
          </a>
        </div>
        <hr class="my-2 mx-4">
        <!-- DATA KENDARAAN -->
        <a href="#akun" data-toggle="collapse" aria-expanded="false" class="btn-main">
          <i class="fas fa-users fa-fw mr-3"></i>
          <span class="text-menu">Data Akun</span>
        </a>
        <div id='akun' class="collapse bg-white rounded 
        <?php if ($data['judul'] == 'Karyawan' || $data['judul'] == 'Pelanggan' || $data['judul'] == 'Sopir') echo 'show'; ?>" data-parent="#menu-coll">
          <a href="<?= BASEURL; ?>/admin/karyawan" class="btn-main <?php if ($data['judul'] == 'Karyawan') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Karyawan</span>
          </a>
          <a href="<?= BASEURL; ?>/admin/pelanggan" class="btn-main <?php if ($data['judul'] == 'Pelanggan') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Pelanggan</span>
          </a>
          <a href="<?= BASEURL; ?>/admin/sopir" class="btn-main <?php if ($data['judul'] == 'Sopir') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Sopir</span>
          </a>
        </div>
        <hr class="my-2 mx-4">

        <!-- MANAGEMENT -->
        <a href="#manage" data-toggle="collapse" aria-expanded="false" class="btn-main">
          <i class="fas fa-folder fa-fw mr-3"></i>
          <span class="text-menu">Management</span>
        </a>
        <div id='manage' class="collapse bg-white rounded 
        <?php if ($data['judul'] == 'Role' || $data['judul'] == 'Log Aktivitas' || $data['judul'] == 'Akun Pending') echo 'show'; ?>" data-parent="#menu-coll">
          <a href="<?= BASEURL; ?>/admin/pending" class="btn-main <?php if ($data['judul'] == 'Akun Pending') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Akun Pending</span>
            <?php if ($data['JmlPending'] > 0) echo
              '<span class="badge badge-danger float-right">
              ' . $data['JmlPending'] . '
              </span>'
            ?>
          </a>
          <a href="<?= BASEURL; ?>/admin/role" class="btn-main <?php if ($data['judul'] == 'Role') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>User Role</span>
          </a>
          <a href="<?= BASEURL; ?>/admin/log" class="btn-main <?php if ($data['judul'] == 'Log Aktivitas') echo 'btn-main-active'; ?>">
            <i class="fas fa-fw mr-3"></i>
            <span>Log Aktivitas</span>
          </a>
        </div>
        <hr class="my-2 mx-4">
      </div>
    </div>
  </div>
  <div class="col-lg main">
    <div class="container px-5">
      <div class="bg-white row-vh mt-3 ">
        <span class="main-title"><?= $data['judul'] ?></span>
      </div>