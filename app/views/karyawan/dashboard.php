<div class="container">
  <div class="row mb-4" id="count-dashboard">
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"><?= $data['JmlMobil']; ?></h1>
        <h1 class="h6 text-center">Mobil</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"><?= $data['JmlKaryawan'] ?></h1>
        <h1 class="h6 text-center">karyawan</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"><?= $data['JmlPelanggan'] ?></h1>
        <h1 class="h6 text-center">Pelanggan</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"><?= $data['JmlPeminjaman'] ?></h1>
        <h1 class="h6 text-center">Pesanan</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"><?= $data['JmlTransaksi'] ?></h1>
        <h1 class="h6 text-center">Transaksi</h1>
      </div>
    </div>
    <div class="col-md">
      <div class="bg-white p-4 rounded shadow-sm">
        <h1 class="h1 text-center"><?= $data['JmlSopir'] ?></h1>
        <h1 class="h6 text-center">Sopir</h1>
      </div>
    </div>
  </div>

  <!--  -->

  <div class="row">
    <div class="col-md-7">
      <div class="bg-white shadow-sm rounded pt-5 pb-4">
        <h1 class="h4 text-center">Daftar Mobil Siap Rental</h1>

        <div class="d-flex justify-content-center">
          <div class="hr mb-4 mt-2"></div>
        </div>

        <table class="table table-hover table-borderless">
          <?php foreach ($data['MobilKosong'] as $mk) : ?>
            <tr class="text-center">
              <td><?= $mk['NoPlat']; ?></td>
              <td><?= $mk['NmMerk']; ?> <?= $mk['NmType']; ?></td>
              <td>
                Rp.<span class="uang"><?= $mk['HargaSewa']; ?></span>,-
              </td>
            </tr>
          <?php endforeach; ?>
        </table>
        <div class="clearfix mr-4">
          <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/mobil" class="btn btn-sm btn-outline-primary shadow-none float-right">Selengkapnya</a>
        </div>
      </div>
    </div>
    <!-- USER UNACTIVE -->
    <div class="col-md-5">
      <div class="bg-white shadow-sm rounded pt-5 pb-4">
        <h1 class="h4 text-center">User Belum Aktif</h1>

        <div class="d-flex justify-content-center">
          <div class="hr mb-4 mt-2"></div>
        </div>
        <?php if ($_SESSION['Login']['RoleId'] == 1) : ?>
          <table class="table table-hover table-borderless">
            <?php foreach ($data['UserUn'] as $Un) : ?>
              <tr class="text-center">
                <td><?= $Un['NIK'] ?> </td>
                <td><?= $Un['Nama'] ?> </td>
                <td><?= $Un['NoTelp'] ?> </td>
              </tr>
            <?php endforeach; ?>
          </table>
          <div class="clearfix mr-4">
            <a href="<?= BASEURL . '/' . $_SESSION['Login']['Role'] ?>/pending" class="btn btn-sm btn-outline-primary shadow-none float-right">Selengkapnya</a>
          </div>
        <?php else : ?>
          <div class="text-center">
            Maaf, Menu ini hanya dapat diakses oleh
            <p class="shadow-none badge badge-danger">Admin.</p>
          </div>
        <?php endif; ?>
      </div>
    </div>
  </div>
</div>