<nav class="navbar navbar-expand-lg navbar-dark bg-main sticky-top bt-wow">
  <a href="<?= BASEURL ?>" class="navbar-brand">
    <div class="bg-main">
      <span class="web-title"><?= APP_NAME; ?>
        <span class="web-subtitle"><?= APP_TYPE; ?></span>
      </span>
    </div>
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav nav-pills mr-auto">
      <li class="nav-item mr-1 active-nav">
        <a class="nav-link disabled" href="<?= BASEURL ?>">Home</a>
      </li>
      <li class="nav-item mr-1">
        <a class="nav-link" href="#">Daftar Mobil</a>
      </li>
      <li class="nav-item mr-1">
        <a class="nav-link" href="#">About / Help</a>
      </li>
    </ul>

    <?php
    if (!isset($_SESSION['Login'])) : ?>

      <!-- JIka tidak ada sesi Login -->
      <a href="<?= BASEURL; ?>/auth/login" class="btn btn-success btn-sm">MASUK</a>
      <a href="<?= BASEURL; ?>/auth/registration" class="btn btn-outline-white btn-sm">DAFTAR</a>

    <?php else : ?>

      <!-- Jika ada sesi Login -->
      <span style="font-weight:400;font-size:17px">
        <?= $_SESSION['Login']['Nama'] ?>
      </span>

      <div class="btn-group">
        <div class="nav-link" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <img src="<?= BASEURL . '/img/fotouser/' . $_SESSION['Login']['Foto'] ?>" class="rounded border" width="40" height="40">
        </div>

        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>">
            Dashboard
          </a>
          <a class="dropdown-item" href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id'] ?>">
            Edit Profile
          </a>
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="<?= BASEURL ?>/auth/SignOut">Logout</a>
        </div>
      </div>

    <?php endif; ?>
  </div>
</nav>