<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <!-- AWAL FORM -->

    <form action="<?= BASEURL; ?>/pelanggan/reservasi" method="post" role="form">
      <div class="row">
        <div class="col">
          <div class="form-group">
            <label for="NoTransaksi">Kode Transaksi</label>
            <input type="text" class="form-control" id="NoTransaksi" name="NoTransaksi" required value="<?= $data['autoIdTransaksi'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="Identitas">Penyewa</label>

            <input type="text" class="form-control" readonly value="<?= $_SESSION['Login']['Nama'] ?>">
            <!-- HIDDEN -->
            <input type="hidden" class="form-control" id="Identitas" value="<?= $_SESSION['Login']['NIK'] ?>" name="Identitas">
          </div>

          <div class="form-group">
            <label for="Mobil">Mobil</label>

            <input type="text" class="form-control" readonly value="<?= $data['mobilrental']['NmMerk'] . ' ' . $data['mobilrental']['NmType'] ?>">
            <!-- HIDDEN -->
            <input type="hidden" name="Mobil" id="Mobil" class="form-control" value="<?= $data['mobilrental']['id'] ?>">
          </div>

          <div class="form-group" id="hargaSewaRental">
            <label for="TarifMobilPerhari">Harga Sewa / Hari</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control" id="TarifMobilPerhari" value="<?= $data['mobilrental']['HargaSewa'] ?>" readonly>
            </div>
          </div>

          <div class="form-group">
            <div class="switch">
              <label>
                Pakai Sopir ?
                <input type="checkbox" id="sopirCheck">
                <span class="lever"></span>
              </label>
            </div>
            <div id="showSopir" class="d-none">
              <div class="form-group">
                <select class="browser-default custom-select" name="Sopir" id="Sopir">
                  <option harga="0" value="SPR000" selected>Pilih Sopir</option>
                  <?php
                  foreach ($data['SopirKosong'] as $sopir) :
                    echo '<option harga="' . $sopir['TarifPerhari'] . '" value="' . $sopir['IdSopir'] . '">'
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

        </div>
        <div class="col">
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



          <div class="form-group card border-primary p-3 text-white mt-4">
            <label for="TotalBayar" class="text-primary">Total Bayar Sementara</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control" id="TotalBayar" name="TotalBayar" readonly>
            </div>
          </div>
          <!-- AKHIR FORM -->
          <div class="clearfix">
            <button type="submit" class="btn btn-primary shadow-none btn-block" id="submit">Konfirmasi Pesanan</button>
            <a href="<?= BASEURL ?>/pelanggan/daftarmobil" class="btn btn-light shadow-none btn-block">Batalkan Pesanan</a>
          </div>
        </div>
      </div>



    </form>
  </div>
</div>