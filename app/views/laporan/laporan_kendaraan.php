<div class="container my-3">
  <div class="text-center my-4">
    <div class="h2">LAPORAN KENDARAAN</div>
    <div id="no-print">
      Tekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> untuk mencetak.
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered bg-white">
      <thead class="grey lighten-5">
        <tr class="text-center">
          <th class="align-middle">#</th>
          <th class="align-middle">No Polisi</th>
          <th class="align-middle">Foto</th>
          <th class="align-middle">Mobil</th>
          <th class="align-middle">Harga Sewa / Hari</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['laporanKendaraan'] as $Kendaraan) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $Kendaraan['NoPlat'] ?></td>
            <td class="text-center align-middle">
              <img class="" width="100" src="<?= BASEURL ?>/img/fotomobil/<?= $Kendaraan['FotoMobil']; ?>">
            </td>
            <td>
              <?= $Kendaraan['NmMerk'] ?> <?= $Kendaraan['NmType'] ?>
              <span class="badge badge-light shadow-none"><?= $Kendaraan['KdMerk'] ?></span>
              <span class="badge badge-light shadow-none"><?= $Kendaraan['IdType'] ?></span>
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Kendaraan['HargaSewa']); ?></span>,-
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>