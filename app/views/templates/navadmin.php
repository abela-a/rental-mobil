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