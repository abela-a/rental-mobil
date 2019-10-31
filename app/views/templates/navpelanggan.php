<?php
if (!isset($_SESSION['Login'])) {
  SweetAlert::setSwalAlert("Perhatian", "Anda harus login terlebih dahulu", "warning");
  header('Location:' . BASEURL . '/auth');
  exit;
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
          <div class="col-md-3"><img src="<?= BASEURL ?>/img/fotouser/<?= $_SESSION['Login']['Foto'] ?>" class="rounded" width="50"></div>
          <div class="col-md">
            <span style="font-weight:400;font-size:17px"><?= $_SESSION['Login']['Nama'] ?></span><br>
            <span style="font-size:15px"><?= $_SESSION['Login']['Role'] ?></span>
          </div>
        </div>
      </a>
      <div id='user' class="collapse mx-4">
        <div class="row no-gutters p-1">
          <div class="col-md m-1">
            <a href="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/userProfile/<?= $_SESSION['Login']['Id'] ?>" class="btn bg-back btn-block">
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
        <!-- TRANSAKSI -->
        <a href="<?= BASEURL; ?>/pelanggan" class="btn-main <?php if ($data['judul'] == 'Transaksi') echo 'btn-main-active'; ?>">
          <i class="fas fa-dollar-sign fa-fw mr-3"></i>
          <span class="text-menu">Transaksi</span>
        </a>
        <hr class="my-2 mx-4">
      </div>
    </div>
  </div>
  <div class="col-lg main">
    <div class="container px-5">
      <div class="bg-white row-vh mt-3 ">
        <span class="main-title"><?= $data['judul'] ?></span>
      </div>