<!-- TOMBOL -->
<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <table class="table table-hover" id="tolong">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">Kode Transaksi</th>
          <th scope="col" class="text-center">Identitas Penyewa</th>
          <th scope="col" class="text-center">Mobil</th>
          <th scope="col" class="text-center">Tanggal Mulai</th>
          <th scope="col" class="text-center">Lama Rental</th>
          <th scope="col" class="text-center">Total Biaya</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['Transaksi'] as $Transaksi) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucfirst($Transaksi['NoTransaksi']); ?></td>
            <td><?= ucfirst($Transaksi['Nama']); ?></td>
            <td>
              <?= '[ '
                  . $Transaksi['NoPlat']
                  . ' ] '
                  . $Transaksi['NmMerk']
                  . ' '
                  . $Transaksi['NmType']
                ?>
            </td>
            <td><?= ucfirst($Transaksi['Tanggal_Pesan']); ?></td>
            <td><?= ucfirst($Transaksi['LamaRental']); ?> Hari</td>
            <td>
              Rp.<span class="uang"><?= ucfirst($Transaksi['Total_Bayar']); ?></span>,-
            </td>
            <td class="text-center" style="width:100px">
              <button type="button" class="dropdown btn grey lighten-2 btn-sm shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars fa-fw" aria-hidden="true"></i> Pilihan
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Cetak</a>
                <button class="dropdown-item" data-toggle="modal" data-target="#detail<?= $Transaksi['NoTransaksi'] ?>">Detail</button>
                <button class="dropdown-item" data-toggle="modal" data-target="#arsip<?= $Transaksi['NoTransaksi'] ?>">Arsipkan</button>
              </div>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>