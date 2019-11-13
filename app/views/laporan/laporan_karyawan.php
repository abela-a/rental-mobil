<div class="container my-3">
  <div class="text-center my-4">
    <div class="h2">LAPORAN KARYAWAN</div>
    <div id="no-print">
      Tekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> untuk mencetak.
    </div>
  </div>
  <div class="table-responsive">
    <table class="table table-bordered bg-white">
      <thead class="grey lighten-5">
        <tr class="text-center">
          <th class="align-middle">#</th>
          <th class="align-middle">NIK</th>
          <th class="align-middle">Nama</th>
          <th class="align-middle">Username</th>
          <th class="align-middle">JK</th>
          <th class="align-middle">No Telp</th>
          <th class="align-middle">Alamat</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['laporanKaryawan'] as $Karyawan) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= $Karyawan['NIK'] ?></td>
            <td><?= $Karyawan['Nama'] ?></td>
            <td><?= $Karyawan['NamaUser'] ?></td>
            <td><?= $Karyawan['JenisKelamin'] ?></td>
            <td class="telp" style="width:150px"><?= $Karyawan['NoTelp'] ?></td>
            <td><?= $Karyawan['Alamat'] ?></td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>