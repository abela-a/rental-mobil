<!--Main Navigation-->
<header>
  <nav class="navbar fixed-top navbar-expand-lg navbar-dark indigo scrolling-navbar py-0">
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
          <!-- HOME -->
          <li class="nav-item mr-3 nav-active">
            <a class="nav-link py-3" href="<?= BASEURL ?>">Home</a>
          </li>
          <?php if (isset($_SESSION['Login'])) : ?>
            <?php if ($_SESSION['Login']['Role'] == 'Pelanggan') : ?>
              <!-- MOBIL -->
              <li class="nav-item mr-3">
                <a class="nav-link py-3" href="<?= BASEURL ?>/pelanggan/daftarmobil">Daftar Mobil</a>
              </li>
            <?php endif; ?>
          <?php endif; ?>
          <!-- ABOUT -->
          <li class="nav-item mr-3 dropdown">
            <a class="nav-link py-3 dropdown-toggle" id="mobil" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">About
            </a>
            <div class="dropdown-menu dropdown-warning" aria-labelledby="mobil">
              <a class="dropdown-item" href="#alasan">Mengapa Memilih Kami?</a>
              <a class="dropdown-item" href="#daftar-mobil">Mobil Apa Saja?</a>
              <a class="dropdown-item" href="#">Layanan Kami</a>
              <a class="dropdown-item" href="#">Kontak Kami</a>
              <a class="dropdown-item" href="#">FAQ</a>
            </div>
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
                <a class="dropdown-item" href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>">
                  Dashboard
                </a>
                <a class="dropdown-item" href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' ?>">
                  Edit Profile
                </a>
                <div class="dropdown-divider"></div>
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