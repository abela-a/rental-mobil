<!-- AWAL LANDING -->
<div class="mt-4">
  <!-- JUMBOTRON -->
  <div class="view jarallax jumbotron card card-image" style="height:100vh">
    <!-- JARALLAX -->
    <img src="<?= BASEURL ?>/img/assets/bg.jpg" alt="" class="jarallax-img">
    <!-- MASK WARNA -->
    <div class="mask flex-center rgba-indigo-strong">
      <div class="text-white container px-4">
        <div class="row">
          <div class="col-md-5 col-sm-12">
            <h3 style="font-size:50px;" class="font-weight-bold">
              <?= APP_NAME; ?> <?= APP_TYPE; ?>
            </h3>
            <span id="motto">
              <i> Your Car Rental Solution</i>
            </span>
            <div id="home" class="pr-5 font-weight-regular">
              <p class="mt-4">
                Kami adalah penyedia layanan sewa mobil di Makassar yang sudah berpengalaman dalam menyediakan mobil berkualitas dengan harga yang murah sejak tahun 2019.
              </p>
              <br>
              <p>
                Kami siap melayani kebutuhan Anda selama di Makassar untuk tujuan wisata, mudik, urusan pekerjaan, pindahan, wisuda, keluar kota, dan berbagai kebutuhan yang Anda perlukan.
              </p>
              <br>
              <p>
                Kami selalu berkomitmen untuk memberikan pelayanan <b>terbaik</b> dengan mobil yang <b>terawat</b> dan sopir yang <b>kompeten</b>.
              </p>
            </div>
            <div class="clear-fix mt-4">
              <?php
              if (!isset($_SESSION['Login'])) : ?>
                <a data-target="#Register" data-toggle="modal" class="btn btn-warning">Daftar</a>
                <a data-target="#Login" data-toggle="modal" class="btn btn-outline-white">login</a>
              <?php else : ?>
                <?php if ($_SESSION['Login']['Role'] == 'Pelanggan') : ?>
                  <a class="btn indigo accent-2" href="<?= BASEURL; ?>/pelanggan/daftarmobil">Pesan Mobil</a>
                <?php else : ?>
                  <a class="btn indigo accent-2" href="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/dashboard">Dashboard</a>
                <?php endif; ?>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-md-7 col-sm-12">
            <img src="<?= BASEURL ?>/img/assets/landing.png" id="landing-img">
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- AKHIR LANDING -->

<div class="container position-relative">

  <!-- AWAL MEMILIH KAMI -->
  <section id="alasan" class="px-5 py-5 bg-white rounded shadow-sm">

    <h4 class="text-center h3">Mengapa Memilih Kami ?</h4>
    <div class="row mt-5">
      <!-- HARGA -->
      <div class="col-md-4 col-sm-12">
        <div class="text-center">
          <i class="fas fa-money-bill-wave-alt fa-4x text-warning d-block mb-3"></i>
          <span class="h5">Harga Terjangkau</span>
          <p class="px-4 mt-3">
            Harga sewa mobil terjangkau di Makassar hanya ada di perusahaan kami, jangan ragu untuk menentukan rencana sewa mobil di Makassar, satukan pilihan Anda juga termasuk layanan Sopir kami berpengalaman.
          </p>
        </div>
      </div>

      <!-- LAYANAN -->
      <div class="col-md-4 col-sm-12">
        <div class="text-center">
          <i class="fas fa-headset fa-4x text-warning d-block mb-3"></i>
          <span class="h5">Pelayanan Prima</span>
          <p class="px-4 mt-3">
            Costumer sevice kami siap melayani Anda kapan pun. Dan siap dengan media apapun, mulai dari via SMS, Whatsapp, E-mail, maupun telepon secara langsung.
          </p>
        </div>
      </div>

      <!-- KUALITAS -->
      <div class="col-md-4 col-sm-12">
        <div class="text-center">
          <i class="fas fa-user-tie fa-4x text-warning d-block mb-3"></i>
          <span class="h5">Kualitas Terbaik</span>
          <p class="px-4 mt-3">
            Perusahaan kami didukung dengan tim yang profesional dan dikelola oleh SDM pilihan serta unit mobil yang variatif, mulai dari city car, sampai mobil rombongan dan mobil mewah untuk pengantin.
          </p>
        </div>
      </div>

    </div>
  </section>
  <!-- AKHIR MEMILIH KAMI -->

  <!-- AWAL DAFTAR MOBIL -->
  <section id="daftar-mobil" class="px-5 py-5 bg-white rounded shadow-sm mt-4">

    <h4 class="text-center h3">Mobil yang Kami Miliki</h4>


  </section>
  <!-- AKHIR DAFTAR MOBIL -->
</div>

<!-- Modal Login -->
<div class="modal fade" id="Login" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="">LOGIN</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/auth/SignIn" method="post">
          <div class="form-group">
            <label for="NamaUser">Username/Email</label>
            <input class="form-control" type="email" name="NamaUser" id="NamaUser" autofocus required>
          </div>
          <div class="form-group">
            <label for="Password">Password</label>
            <div class="input-group" id="showhidepass">
              <input class="form-control" type="Password" name="Password" id="Password" required>
              <div class="input-group-append">
                <div class="input-group-text">
                  <a href="#"><i class="fa fa-fw fa-eye" aria-hidden="true"></i></a>
                </div>
              </div>
            </div>
          </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
        <button class="btn btn-primary shadow-none" type="submit">Login</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal Login -->

<!-- Modal Register -->
<div class="modal fade" id="Register" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="">DAFTAR</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/auth/signUp" method="post">

          <input type="hidden" value="default.png" name="Foto">

          <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input class="form-control" type="text" name="Nama" id="Nama" autocomplete="off" autofocus required>
          </div>

          <div class="form-group">
            <label for="NIK">Nomor Induk Kependudukan</label>
            <input class="form-control" type="number" name="NIK" id="NIK" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="NamaUser">Email</label>
            <input class="form-control" type="email" name="NamaUser" id="NamaUser" autocomplete="off" required>
          </div>

          <div class="form-group">
            <label for="Password">Password</label>
            <input class="form-control" type="Password" name="Password" id="Password" required>
          </div>

          <div class="form-group">
            <label for="Password2">Ulangi Password</label>
            <input class="form-control" type="Password" name="Password2" id="Password2" required>
          </div>

          <div class="form-group">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select class="browser-default custom-select" name="JenisKelamin" id="JenisKelamin">
              <option value="" selected>Pilih jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" type="number" name="Alamat" id="Alamat" autocomplete="off"></textarea>
          </div>

          <div class="form-group">
            <label for="NoTelp">No Telepon</label>
            <input class="form-control telp" type="text" name="NoTelp" id="NoTelp" autocomplete="off" required>
          </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
        <button class="btn btn-primary shadow-none" type="submit">DAFTAR</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- /Modal Register -->