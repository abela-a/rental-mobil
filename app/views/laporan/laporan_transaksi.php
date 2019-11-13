<div class="container my-3">
  <div class="text-center my-4">
    <div class="h2">LAPORAN TRANSAKSI</div>
    <div id="no-print">
      Tekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> untuk mencetak.
    </div>
  </div>
  <div class="table-responsive">
    <table class="table-bordered bg-white" cellpadding="7">
      <thead class="grey lighten-5">
        <tr class="text-center">
          <th rowspan="2" class="align-middle">#</th>
          <th rowspan="2" class="align-middle">Kode Transaksi</th>
          <th rowspan="2" class="align-middle">Nama Penyewa</th>
          <th rowspan="2" class="align-middle">Mobil</th>
          <th rowspan="2" class="align-middle">Sopir</th>
          <th colspan="4" class="align-middle">Tanggal</th>
          <th rowspan="2" class="align-middle">Deskripsi Kerusakan</th>
          <th colspan="3" class="align-middle">Biaya</th>
          <th colspan="2" class="align-middle">Tarif</th>
          <th rowspan="2" class="align-middle">Total Bayar</th>
        </tr>
        <tr class="text-center">
          <th class="align-middle">Pesan</th>
          <th class="align-middle">Mulai</th>
          <th class="align-middle">Selesai</th>
          <th class="align-middle">Kembali</th>
          <th class="align-middle">Kerusakan</th>
          <th class="align-middle">BBM</th>
          <th class="align-middle">Jatuh Tempo</th>
          <th class="align-middle">Sopir</th>
          <th class="align-middle">Sewa</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['laporanTransaksi'] as $Transaksi) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td>
              <?= ucfirst($Transaksi['NoTransaksi']); ?>
              <br>
              <span class="ml-2 shadow-none badge 
                <?php if ($Transaksi['StatusTransaksi'] == 'Selesai') echo 'badge-success';
                  else if ($Transaksi['StatusTransaksi'] == 'Proses') echo 'badge-primary';
                  else if ($Transaksi['StatusTransaksi'] == 'Mulai') echo 'badge-warning';
                  else echo 'badge-danger';
                  ?>
            ">
                <?= ucfirst($Transaksi['StatusTransaksi']); ?>
              </span>
            </td>
            <td><?= ucfirst($Transaksi['Nama']); ?></td>
            <td>
              <?= ' <span class="badge badge-light shadow-none"> '
                  . $Transaksi['NoPlat']
                  . ' </span></br> '
                  . $Transaksi['NmMerk']
                  . ' '
                  . $Transaksi['NmType']
                ?>
            </td>
            <td><?= ucfirst($Transaksi['NmSopir']); ?></td>
            <td><?= ucfirst($Transaksi['Tanggal_Pesan']); ?></td>
            <td><?= ucfirst($Transaksi['Tanggal_Pinjam']); ?></td>
            <td><?= ucfirst($Transaksi['Tanggal_Kembali_Rencana']); ?></td>
            <td><?= ucfirst($Transaksi['Tanggal_Kembali_Sebenarnya']); ?></td>
            <td><?= ucfirst($Transaksi['Kerusakan']); ?></td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['BiayaKerusakan']); ?></span>,-
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['BiayaBBM']); ?></span>,-
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['Denda']); ?></span>,-
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['TarifPerhari']); ?></span>,-
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['HargaSewa']); ?></span>,-
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['Total_Bayar']); ?></span>,-
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>