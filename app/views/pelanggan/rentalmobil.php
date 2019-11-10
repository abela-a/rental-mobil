<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <div class="card-columns">
      <?php foreach ($data['mobil'] as $mobil) : ?>
        <div class="card mb-4" style="width: 18rem;">
          <img class=" p-4 card-img-top" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
          <div class="card-body">
            <h5 class="card-title"><?= $mobil['NmMerk'] . ' ' . $mobil['NmType'] ?></h5>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <span class="ml-2 shadow-none badge 
            <?php if ($mobil['StatusRental'] == 'Kosong') echo 'badge-success';
              else if ($mobil['StatusRental'] == 'Dipesan') echo 'badge-warning';
              else echo 'badge-danger';
              ?>
            ">
                <?= ucfirst($mobil['StatusRental']); ?>
              </span>
              <span class="badge indigo shadow-none"><?= $mobil['JenisMobil'] ?></span>
              <span class="badge badge-light shadow-none"><?= $mobil['Transmisi'] ?></span>
            </li>
            <li class="list-group-item">
              Rp <span class="uang">
                <?= $mobil['HargaSewa']; ?>
              </span> ,- / Hari</li>
          </ul>
          <div class="card-body mr-2">
            <button data-toggle="modal" data-target="#rental<?= $mobil['id'] ?>" class="card-link btn btn-primary shadow-none btn-block tombol-reservasi">Pesan Sekarang</button>
          </div>
        </div>
        <!-- AWAL MODAL-->
        <div class="modal fade reservasi" id="rental<?= $mobil['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="rental" aria-hidden="true">
          <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-header text-primary text-center">
                <h5 class="modal-title h5 w-100" id="rental">BUAT PESANAN</h5>
              </div>
              <div class="modal-body px-5 grey lighten-5">

                <!-- AWAL FORM -->

                <form action="<?= BASEURL; ?>/pelanggan/reservasi" method="post" role="form">

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

                    <input type="text" class="form-control" readonly value="<?= $mobil['NmMerk'] . ' ' . $mobil['NmType'] ?>">
                    <!-- HIDDEN -->
                    <input type="hidden" name="Mobil" id="Mobil" class="form-control" value="<?= $mobil['id'] ?>">
                  </div>

                  <div class="form-group" id="hargaSewaRental">
                    <label for="TarifMobilPerhari">Harga Sewa / Hari</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">Rp.</span>
                      </div>
                      <input type="text" class="form-control" id="TarifMobilPerhari" value="<?= $mobil['HargaSewa'] ?>" readonly>
                    </div>
                  </div>

                  <div class="form-group">
                    <label for="Tanggal_Pesan">Tanggal Pesan</label>
                    <input type="text" class="form-control datepicker" id="Tanggal_Pesan" name="Tanggal_Pesan" readonly data-value="[<?= date('Y-m-d') ?>]">
                  </div>

                  <div class="form-group" class="TP">
                    <label for="Tanggal_Pinjam">Tanggal Mulai Rental</label>
                    <input type="text" class="form-control datepicker" id="Tanggal_Pinjam" name="Tanggal_Pinjam" required>
                  </div>

                  <div class="form-group" class="TK">
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

              </div>
              <div class="modal-footer text-center justify-content-center">
                <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
                <button type="submit" class="btn btn-primary shadow-none" id="submit">Konfirmasi Pesanan</button>
              </div>
              </form>
            </div>
          </div>
        </div>
        <!-- AKHIR MODAL-->
      <?php endforeach; ?>
    </div>
  </div>
</div>