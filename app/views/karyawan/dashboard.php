<?= Flasher::flash(); ?>
<div class="row">
  <!-- MOBIL -->
  <div class="col-md">
    <div class="card border-primary mb-3">
      <div class="card-body bg-primary text-white">
        <i class="fa fa-car fa-fw"></i>
        <span class="float-right"><?= $data['JmlMobil']; ?></span><br>
        <span class="float-right">Mobil</span>
      </div>
      <div class="card-footer">
        <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/mobil">
          <span>Selengkapnya</span>
          <i class="fa fa-arrow-right fa-fw float-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- AKUN -->
  <div class="col-md">
    <div class="card border-info mb-3">
      <div class="card-body bg-info text-white">
        <i class="fa fa-user fa-fw"></i>
        <span class="float-right">
          <!-- Menampilkan jumlah karyawan atau pelanggan -->
          <?php if ($_SESSION['Login']['RoleId'] == 1)
            echo $data['JmlKaryawan'];
          else
            echo $data['JmlPelanggan'];
          ?>
        </span><br>
        <span class="float-right">
          <!-- Menampilkan teks karyawan atau pelanggan -->
          <?php if ($_SESSION['Login']['RoleId'] == 1)
            echo 'Karyawan';
          else
            echo 'Pelanggan';
          ?>
        </span>
      </div>
      <div class="card-footer">
        <!-- Mengarahkan aksi ke pelanggan atau karyawan -->
        <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] . '/';
                  if ($_SESSION['Login']['RoleId'] == 1)
                    echo 'karyawan';
                  else
                    echo 'pelanggan';
                  ?>">
          <span>Selengkapnya</span>
          <i class="fa fa-arrow-right fa-fw float-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- TRANSAKSI -->
  <div class="col-md">
    <div class="card border-default mb-3">
      <div class="card-body bg-default text-white">
        <i class="fa fa-dollar-sign fa-fw"></i>
        <span class="float-right">0</span><br>
        <span class="float-right">Transaksi</span>
      </div>
      <div class="card-footer">
        <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/transaksi">
          <span>Selengkapnya</span>
          <i class="fa fa-arrow-right fa-fw float-right"></i>
        </a>
      </div>
    </div>
  </div>
  <!-- RENTAL SELESAI -->
  <div class="col-md">
    <div class="card border-secondary mb-3">
      <div class="card-body bg-secondary text-white">
        <i class="fa fa-check fa-fw"></i>
        <span class="float-right">0</span><br>
        <span class="float-right">Rental Selesai</span>
      </div>
      <div class="card-footer">
        <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/rentalselesai">
          <span>Selengkapnya</span>
          <i class="fa fa-arrow-right fa-fw float-right"></i>
        </a>
      </div>
    </div>
  </div>
</div>
<div class="row mt-3">
  <!-- MOBIL KOSONG -->
  <div class="col-md-7">
    <div class="card border-primary">
      <div class="card-body">
        <h5 class="card-title">Daftar Mobil</h5>
        <p class="card-text">Berikut ini daftar mobil yang sedang kosong dan dapat dirental.</p>
      </div>
      <table class="table table-hover">
        <?php foreach ($data['MobilKosong'] as $mk) : ?>
          <tr class="text-center">
            <td><?= $mk['NoPlat']; ?></td>
            <td><?= $mk['NmMerk']; ?></td>
            <td><?= $mk['NmType']; ?></td>
            <td>
              Rp.<span class="uang"><?= $mk['HargaSewa']; ?></span>,-
            </td>
            <td>
              <a href="" class="btn btn-success btn-sm">PESAN</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
  <!-- USER UNACTIVE -->
  <div class="col-md-5">
    <div class="card border-primary">
      <div class="card-body">
        <h5 class="card-title">
          Pelanggan Baru
          <?php if ($_SESSION['Login']['RoleId'] == 1) : ?>
            <span class="badge badge-danger float-right">
              <?= $data['JmlPending'] ?>
            </span>
          <?php else : ?>
            <span class="badge badge-danger float-right">
              admin only
            </span>
          <?php endif; ?>
        </h5>
        <p class="card-text">
          <?php if ($_SESSION['Login']['RoleId'] == 1)
            echo
              'Berikut ini daftar pelanggan yang telah mendaftar dan belum dikonfirmasi.';
          else
            echo
              'Hanya Admin yang dapat mengakses ini.';
          ?>
        </p>
      </div>
      <table class="table table-hover">
        <?php if ($_SESSION['Login']['RoleId'] == 1)
          foreach ($data['UserUn'] as $Un) : ?>
          <tr class="text-center">
            <td><?= $Un['NIK'] ?> </td>
            <td><?= $Un['Nama'] ?> </td>
            <td>
              <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/pending" class="btn btn-success btn-sm">Lihat</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </table>
    </div>
  </div>
</div>
<!-- TUTUP CONTAINER -->
</div>
<!-- TUTUP COL-LG-9 -->
</div>