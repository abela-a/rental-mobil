<div class="container">
  <!-- CARD COUNT -->
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

  <!-- CARD ARTICLE  -->
  <div class="row">
    <!-- LATEST TRANSAKSI -->
    <div class="col-md-3">
      <div class="bg-white shadow-sm rounded p-4">
        <h1 class="h4 text-center">Pemesanan</h1>

        <div class="d-flex justify-content-center">
          <div class="hr mb-4 mt-2"></div>
        </div>

        <?php foreach ($data['LatestTransaksi'] as $lt) : ?>
          <div class="item-transaksi mt-3">
            <div class="font-weight-bold text-primary">
              <?= $lt['NoTransaksi'] ?>
            </div>
            <div class="font-weight-bolder"><?= $lt['Nama'] ?></div>
            <div>
              <span class="badge badge-light shadow-none"><?= $lt['NoPlat'] ?></span>
              <span class="badge badge-light shadow-none">
                <?php
                  if ($lt['Id_Sopir'] == 'SPR000') {
                    echo "Tanpa Sopir";
                  } else {
                    echo $lt['Id_Sopir'];
                  }
                  ?>
              </span>
              <?php if ($lt['StatusTransaksi'] == 'Proses') : ?>
                <span class="badge badge-primary shadow-none"><?= $lt['StatusTransaksi'] ?></span>
              <?php else : ?>
                <span class="badge badge-danger shadow-none"><?= $lt['StatusTransaksi'] ?></span>
              <?php endif ?>
            </div>
          </div>
        <?php endforeach; ?>

      </div>
    </div>
    <!-- MOBIL KOSONG -->
    <div class="col-md-5">
      <div class="bg-white shadow-sm rounded py-4 px-3">
        <h1 class="h4 text-center">Daftar Mobil Siap Rental</h1>

        <div class="d-flex justify-content-center">
          <div class="hr mb-4 mt-2"></div>
        </div>

        <table class="table table-hover table-borderless table-sm">
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

    <div class="col-md-4">
      <div class="row">
        <!-- STATUS -->
        <div class="col-md-12 mb-lg-4">
          <div class="bg-white shadow-sm rounded py-4">
            <h1 class="h4 text-center">Status</h1>

            <div class="d-flex justify-content-center">
              <div class="hr mb-4 mt-2"></div>
            </div>

            <div class="px-4">
              <div class="row">
                <div class="col">
                  <h6 class="mb-3">Mobil Kosong
                    <span class="float-right badge badge-info shadow-none">
                      <?= $data['JmlMobilKosong'] ?>
                    </span>
                  </h6>
                  <h6 class="mb-3">Mobil Dipesan
                    <span class="float-right badge badge-info shadow-none">
                      <?= $data['JmlMobilDipesan'] ?>
                    </span>
                  </h6>
                  <h6 class="mb-3">Mobil Jalan
                    <span class="float-right badge badge-info shadow-none">
                      <?= $data['JmlMobilJalan'] ?>
                    </span>
                  </h6>
                </div>
                <div class="col">
                  <h6 class="mb-3">Sopir Kosong
                    <span class="float-right badge badge-primary shadow-none">
                      <?= $data['JmlSopirFree'] ?>
                    </span>
                  </h6>
                  <h6 class="mb-3">Sopir Dipesan
                    <span class="float-right badge badge-primary shadow-none">
                      <?= $data['JmlSopirBooked'] ?>
                    </span>
                  </h6>
                  <h6 class="mb-3">Sopir Jalan
                    <span class="float-right badge badge-primary shadow-none">
                      <?= $data['JmlSopirBusy'] ?>
                    </span>
                  </h6>
                </div>
              </div>
            </div>

          </div>
        </div>
        <!-- USER UNACTIVE -->
        <div class="col-md">
          <div class="bg-white shadow-sm rounded py-4 px-3">
            <h1 class="h4 text-center">User Belum Aktif</h1>

            <div class="d-flex justify-content-center">
              <div class="hr mb-4 mt-2"></div>
            </div>
            <?php if ($_SESSION['Login']['RoleId'] == 1) : ?>
              <table class="table table-hover table-borderless table-sm">
                <?php foreach ($data['UserUn'] as $Un) : ?>
                  <tr class="text-center">
                    <td><?= $Un['NIK'] ?> </td>
                    <td><?= $Un['Nama'] ?> </td>
                    <td><?= $Un['NoTelp'] ?> </td>
                  </tr>
                <?php endforeach; ?>
              </table>
              <div class="clearfix">
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
  </div>
</div>