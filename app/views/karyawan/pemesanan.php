<!-- TOMBOL -->
<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn btn-primary shadow-none mb-3 tombolTambahMerk float-right" type="button" data-toggle="modal" data-target="#input">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Pesanan
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
        foreach ($data['Pemesanan'] as $pemesanan) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucfirst($pemesanan['NoTransaksi']); ?></td>
            <td><?= ucfirst($pemesanan['Nama']); ?></td>
            <td>
              <?= '[ '
                  . $pemesanan['NoPlat']
                  . ' ] '
                  . $pemesanan['NmMerk']
                  . ' '
                  . $pemesanan['NmType']
                ?>
            </td>
            <td><?= ucfirst($pemesanan['Tanggal_Pesan']); ?></td>
            <td><?= ucfirst($pemesanan['LamaRental']); ?> Hari</td>
            <td>
              Rp.<span class="uang"><?= ucfirst($pemesanan['Total_Bayar']); ?></span>,-
            </td>
            <td class="text-center">
              <button type="button" class="dropdown btn btn-primary btn-sm shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars" aria-hidden="true"></i>
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Edit</a>
                <a class="dropdown-item" href="#">Hapus</a>
                <a class="dropdown-item" href="#">Detail</a>
              </div>
            </td>
          </tr>

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>
<!-- AWAL MODAL-->
<div class="modal fade" id="input" tabindex="-1" role="dialog" aria-labelledby="input" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="input">TAMBAH PEMESANAN</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahPemesanan" method="post" role="form">

          <div class="form-group">
            <label for="NoTransaksi">Kode Transaksi</label>
            <input type="text" class="form-control" id="NoTransaksi" name="NoTransaksi" required value="<?= $data['autoIdTransaksi'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="Identitas">Identitas Penyewa</label>
            <select class="browser-default custom-select" name="Identitas" id="Identitas" required>
              <option value="" selected disabled>Pilih Pelanggan</option>
              <?php
              foreach ($data['Pelanggan'] as $Pelanggan) :
                echo '<option value="' . $Pelanggan['NIK'] . '">' . $Pelanggan['Nama'] . '</option>';
              endforeach;
              ?>
            </select>
          </div>

          <div class="form-group">
            <label for="Mobil">Mobil</label>
            <select class="browser-default custom-select" name="Mobil" id="Mobil" required>
              <option value="" selected disabled>Pilih Mobil</option>
              <?php
              foreach ($data['MobilKosong'] as $mobil) :
                echo '<option value="' . $mobil['id'] . '">'
                  . '[ '
                  . $mobil['NoPlat']
                  . ' ] '
                  . $mobil['NmMerk']
                  . ' '
                  . $mobil['NmType']
                  . '</option>';
              endforeach;
              ?>
            </select>
          </div>

          <div class="form-group" id="hargaSewaRental">
            <label for="TarifMobilPerhari">Harga Sewa / Hari</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="uang form-control" disabled>
            </div>
          </div>

          <div class="form-group">
            <label for="Tanggal_Pesan">Tanggal Pesan</label>
            <input type="text" class="form-control datepicker" id="Tanggal_Pesan" name="Tanggal_Pesan" readonly data-value="[<?= date('Y-m-d') ?>]">
          </div>

          <div class="form-group">
            <label for="Tanggal_Pinjam">Tanggal Mulai Rental</label>
            <input type="text" class="form-control datepicker" id="Tanggal_Pinjam" name="Tanggal_Pinjam" required>
          </div>

          <div class="form-group">
            <label for="Tanggal_Kembali">Tanggal Selesai Rental</label>
            <input type="text" class="form-control datepicker" id="Tanggal_Kembali" name="Tanggal_Kembali" required>
          </div>

          <div class="form-group">
            <label for="LamaRental">Lama Rental</label>
            <div class="input-group" style="width:100px">
              <input type="text" class="form-control" id="LamaRental" name="LamaRental" readonly>
              <div class="input-group-append">
                <span class="input-group-text">Hari</span>
              </div>
            </div>
          </div>

          <div class="form-group">
            <div class="switch">
              <label>
                Sopir ?
                <input type="checkbox" id="sopirCheck">
                <span class="lever"></span>
              </label>
            </div>
            <div id="showSopir" class="d-none">
              <div class="form-group">
                <select class="browser-default custom-select" name="Sopir" id="Sopir">
                  <option value="SPR000" selected>Pilih Sopir</option>
                  <?php
                  foreach ($data['SopirKosong'] as $sopir) :
                    echo '<option value="' . $sopir['IdSopir'] . '">'
                      . '[ '
                      . $sopir['IdSopir']
                      . ' ] '
                      . $sopir['NmSopir']
                      . '</option>';
                  endforeach;
                  ?>
                </select>
              </div>

              <div class="form-group" id="tarifSopir">
                <label for="TarifSopirPerhari">Tarif Sopir / Hari</label>
                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text" id="basic-addon1">Rp.</span>
                  </div>
                  <input type="text" class="form-control" id="TarifSopirPerhari" name="TarifSopirPerhari" readonly value="0">
                </div>
              </div>
            </div>
          </div>

          <div class="form-group bg-primary p-3 rounded text-white mt-4">
            <label for="TotalBayar">Total Bayar Sementara</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control" id="TotalBayar" name="TotalBayar" readonly>
            </div>
          </div>
          <!-- AKHIR FORM -->

      </div>
      <div class="modal-footer text-center justify-content-center">
        <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary shadow-none" id="submit">Konfirmasi Pemesanan</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- AKHIR MODAL-->