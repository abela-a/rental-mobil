<div class="container my-3">
  <div class="text-center my-4">
    <div class="h2">LAPORAN SOPIR</div>
    <div id="no-print">
      Tekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> untuk mencetak.
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered bg-white">
      <thead class="grey lighten-5">
        <tr class="text-center">
          <th class="align-middle">#</th>
          <th class="align-middle">Id Sopir</th>
          <th class="align-middle">NIK</th>
          <th class="align-middle">No SIM</th>
          <th class="align-middle">Nama</th>
          <th class="align-middle">JK</th>
          <th class="align-middle">No Telp</th>
          <th class="align-middle">Alamat</th>
          <th class="align-middle">Tarif / Hari</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['laporanSopir'] as $Sopir) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $Sopir['IdSopir'] ?></td>
            <td><?= $Sopir['NIK'] ?></td>
            <td><?= $Sopir['NoSim'] ?></td>
            <td><?= $Sopir['NmSopir'] ?></td>
            <td><?= $Sopir['JenisKelamin'] ?></td>
            <td class="telp"><?= $Sopir['NoTelp'] ?></td>
            <td><?= $Sopir['Alamat'] ?></td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Sopir['TarifPerhari']); ?></span>,-
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>