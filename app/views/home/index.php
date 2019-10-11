<!-- AWAL LANDING -->
<div class="mt-4">
  <!-- JUMBOTRON -->
  <div class="view jarallax jumbotron card card-image" style="height:100vh">
    <!-- JARALLAX -->
    <img src="<?= BASEURL ?>/img/assets/image4.jpg" alt="" class="jarallax-img">
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
            <div id="home" class="pr-5">
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
                <a class="btn btn-warning" href="<?= BASEURL; ?>/auth/registration">Daftar</a>
                <a class="btn btn-outline-white" href="<?= BASEURL; ?>/auth/login">login</a>
              <?php else : ?>
                <a class="btn btn-warning" href="<?= BASEURL; ?>/auth/registration">Pesan Mobil</a>
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

    <h4 class="text-center h3">
      <span>Mobil yang Kami Miliki</span>
      <span class="badge badge-danger rounded-pill">18</span>
    </h4>

  </section>
  <!-- AKHIR DAFTAR MOBIL -->
</div>