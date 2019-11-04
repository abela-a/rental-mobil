<div class="container my-3">
  <div class="text-center my-4" id="no-print">
    <div class="h2"><?= $data['judul'] ?></div>
    Tekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> untuk mencetak.
  </div>
  <div class="p-3 bg-white mb-4" id="print-kwitansi">
    <table class="table table-sm">
      <tr>
        <!-- BARIS PERTAMA -->
        <td class="border-0">No Transaksi</td>
        <td class="border-0" style="width:10px">:</td>
        <td class="border-0 font-weight-normal">
          <?= $data['laporanKwitansi']['NoTransaksi'] ?>
        </td>
        <td class="border-0">Tanggal Dikembalikan</td>
        <td class="border-0" style="width:10px">:</td>
        <td class="border-0 font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Kembali_Sebenarnya'] ?>
        </td>
      </tr>
      <!-- BARIS KEDUA -->
      <tr>
        <td>Penyewa</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['NIK'] ?><br>
          <?= $data['laporanKwitansi']['Nama'] ?><br>
          <?= $data['laporanKwitansi']['NamaUser'] ?><br>
        </td>
        <td>Lama Jatuh Tempo</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['LamaDenda'] ?> Hari
        </td>
      </tr>
      <!-- BARIS KETIGA -->
      <tr>
        <td>Mobil</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= ' <span class="badge badge-light shadow-none"> '
            . $data['laporanKwitansi']['NoPlat']
            . ' </span> '
            . $data['laporanKwitansi']['NmMerk']
            . ' '
            . $data['laporanKwitansi']['NmType']
          ?>
        </td>
        <td>Deskripsi Kerusakan</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Kerusakan'] ?>
        </td>
      </tr>
      <!-- BARIS KEEMPAT -->
      <tr>
        <td>Sopir</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= ' <span class="badge badge-light shadow-none"> '
            . $data['laporanKwitansi']['Id_Sopir']
            . ' </span> '
            . $data['laporanKwitansi']['NmSopir']
          ?>
        </td>
        <td>Biaya Kerusakan</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['BiayaKerusakan'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KELIMA -->
      <tr>
        <td>Tanggal Pesan</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Pesan'] ?>
        </td>
        <td>Biaya BBM</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['BiayaBBM'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KEENAM -->
      <tr>
        <td>Tanggal Mulai</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Pinjam'] ?>
        </td>
        <td>Harga Sewa Mobil / Hari</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['HargaSewa'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KETUJUH -->
      <tr>
        <td>Tanggal Kembali</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['Tanggal_Kembali_Rencana'] ?>
        </td>
        <td>Tarif Sopir / Hari</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['TarifPerhari'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KEDELAPAN -->
      <tr>
        <td>Lama Rental</td>
        <td style="width:10px">:</td>
        <td class="font-weight-normal">
          <?= $data['laporanKwitansi']['LamaRental'] ?> Hari
        </td>
        <td>Total Bayar</td>
        <td style="width:10px">:</td>
        <td class="font-weight-bold text-danger" style="font-size:20px">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Total_Bayar'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KESEMBILAN -->
      <tr>
        <td></td>
        <td style="width:10px"></td>
        <td class="font-weight-normal"></td>
        <td>Jumlah Bayar</td>
        <td style="width:10px"></td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Jumlah_Bayar'] ?></span>,-
        </td>
      </tr>
      <!-- BARIS KESEPULUH -->
      <tr>
        <td class="border-0"></td>
        <td style="width:10px" class="border-0"></td>
        <td class="font-weight-normal border-0"> </td>
        <td>Kembalian</td>
        <td style="width:10px"></td>
        <td class="font-weight-normal">
          Rp.<span class="uang"><?= $data['laporanKwitansi']['Kembalian'] ?></span>,-
        </td>
      </tr>
    </table>
    <div class="d-none" id="print">
      <div class="row justify-content-center mt-4">
        <div class="col text-center">
          <?= date('l, d F Y') ?>
        </div>
      </div>
      <div class="row mt-2">
        <div class="col text-center">
          <?php
          if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
            echo $_SESSION['Login']['Role'];
          } else {
            echo 'Karyawan';
          }
          ?>
          <br>
          Abidzar Car Rental
          <br><br>
          <h1>
            <?php if ($data['laporanKwitansi']['StatusTransaksi'] == "Selesai") : ?>
              <span class="badge badge-success my-0">
                <i class="fa fa-check" aria-hidden="true"></i>
                LUNAS
              </span>
            <?php elseif ($data['laporanKwitansi']['StatusTransaksi'] == "Proses" || $data['laporanKwitansi']['StatusTransaksi'] == "Mulai") : ?>
              <span class="badge badge-warning my-0">
                <i class="fa fa-info-circle" aria-hidden="true"></i>
                BELUM LUNAS
              </span>
            <?php else : ?>
              <span class="badge badge-danger my-0">
                <i class="fa fa-ban" aria-hidden="true"></i>
                BATAL
              </span>
            <?php endif; ?>
          </h1>
          <br>
          (<b>
            <?php
            if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) {
              echo $_SESSION['Login']['Nama'];
            } else {
              echo '....................................';
            }
            ?>
          </b>)
        </div>
        <div class="col text-center">
        </div>
        <div class="col text-center">
          Penyewa <br> <br><br><br><br><br>
          (<b><?= $data['laporanKwitansi']['Nama'] ?></b>)
        </div>
      </div>
    </div>
  </div>
</div>