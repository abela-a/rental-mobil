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
            <td class="text-center" style="width:100px">

              <?php if ($pemesanan['StatusTransaksi'] != "Mulai") : ?>
                <button data-toggle="modal" data-target="#konfirmasi<?= $pemesanan['NoTransaksi'] ?>" class="btn btn-sm btn-primary text-white shadow-none">
                  <i class=" fa fa-car fa-fw" aria-hidden="true"></i> Ambil
                </button>
              <?php else : ?>
                <button data-toggle="modal" data-target="#selesai<?= $pemesanan['NoTransaksi'] ?>" class="btn btn-sm btn-success text-white shadow-none">
                  <i class=" fa fa-check fa-fw" aria-hidden="true"></i> Selesai
                </button>
              <?php endif; ?>

              <button type="button" class="dropdown btn grey lighten-2 btn-sm shadow-none" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fa fa-bars fa-fw" aria-hidden="true"></i> Pilihan
              </button>
              <div class="dropdown-menu dropdown-menu-right">
                <a class="dropdown-item" href="#">Cetak</a>

                <button class="dropdown-item <?php if ($pemesanan['StatusTransaksi'] != "Proses") echo 'disabled' ?>" data-toggle="modal" data-target="#batal<?= $pemesanan['NoTransaksi'] ?>">Batalkan</button>
              </div>
            </td>
          </tr>

          <!-- MODAL SELESAI -->
          <div class="modal fade center" id="selesai<?= $pemesanan['NoTransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-success text-center">
                  <h5 class="modal-title h5 w-100">RENTAL SELESAI</h5>
                </div>
                <!-- AWAL FORM -->
                <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/pesananSelesai" method="post" role="form">

                  <div class="modal-body px-5 grey lighten-5">

                    <div class="form-group">
                      <label for="NoTransaksi_Selesai">Kode Transaksi</label>
                      <input type="text" class="form-control" name="NoTransaksi_selesai" id="NoTransaksi_selesai" value="<?= $pemesanan['NoTransaksi'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Identitas_Selesai">Penyewa</label>
                      <input type="text" class="form-control" id="Identitas_selesai" value="<?= $pemesanan['Nama'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Mobil_selesai">Mobil</label>
                      <input type="text" class="form-control" id="Mobil_selesai" value="<?= '[ ' . $pemesanan['NoPlat'] . ' ] ' . $pemesanan['NmMerk'] . ' ' . $pemesanan['NmType'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Sopir_selesai">Sopir</label>
                      <input type="text" class="form-control" id="Sopir_selesai" value="<?= $pemesanan['NmSopir'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Pesan_selesai">Tanggal Pesan</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Pesan_selesai" disabled data-value="<?= $pemesanan['Tanggal_Pesan'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Pinjam_selesai">Tanggal Mulai Rental</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Pinjam_selesai" disabled data-value="<?= $pemesanan['Tanggal_Pinjam'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Kembali_selesai">Tanggal Selesai Rental</label>
                      <input type="text" class="form-control datepicker" id="Tanggal_Kembali_selesai" name="Tanggal_Kembali_selesai" data-value="<?= $pemesanan['Tanggal_Kembali_Rencana'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="LamaRental_selesai">Lama Rental</label>
                      <div class="input-group" style="width:100px">
                        <input type="text" class="form-control" id="LamaRental_selesai" readonly value="<?= $pemesanan['LamaRental'] ?>">
                        <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Tanggal_Kembali_Sebenarnya">Tanggal Dikembalikan</label>
                      <input type="text" class="Tanggal_Kembali_Sebenarnya form-control datepicker" id="Tanggal_Kembali_Sebenarnya" name="Tanggal_Kembali_Sebenarnya" required>
                    </div>

                    <div class="form-group">
                      <label for="JatuhTempo">Lama Jatuh Tempo</label>
                      <div class="input-group" style="width:100px">
                        <input type="text" class="form-control" name="JatuhTempo" id="JatuhTempo" readonly>
                        <div class="input-group-append">
                          <span class="input-group-text">Hari</span>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Denda">Denda</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="Denda" id="Denda" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Kerusakan">Deskripsi Kerusakan</label>
                      <textarea class="form-control" id="Kerusakan" name="Kerusakan" required autocomplete="off"></textarea>
                    </div>

                    <div class="form-group">
                      <label for="BiayaKerusakan">Biaya Kerusakan</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="BiayaKerusakan" id="BiayaKerusakan">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="BiayaBBM">Biaya BBM</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="BiayaBBM" id="BiayaBBM">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TarifMobilPerhari_selesai">Harga Sewa / Hari</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" id="TarifMobilPerhari_selesai" readonly value="<?= $pemesanan['HargaSewa'] ?>">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="TarifSopirPerhari_selesai">Tarif Sopir / Hari</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" id="TarifSopirPerhari_selesai" readonly value="<?= $pemesanan['TarifPerhari'] ?>">
                      </div>
                    </div>

                    <div class="form-group bg-success p-3 rounded text-white mt-4">
                      <label for="TotalBayar_selesai">Total Bayar</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="form-control uang" id="TotalBayar_selesai" name="TotalBayar_selesai" value="<?= $pemesanan['Total_Bayar'] ?>" readonly>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="JumlahBayar">Jumlah Bayar</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="JumlahBayar" id="JumlahBayar">
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="Kembalian">Kembalian</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="uang form-control" name="Kembalian" id="Kembalian" readonly>
                      </div>
                    </div>
                    <!-- AKHIR FORM -->
                  </div>
                  <div class="modal-footer text-center justify-content-center">
                    <button type="submit" class="btn btn-success shadow-none">Selesai</button>
                    <button type="button" class="btn btn-outline-success shadow-none" data-dismiss="modal">Tidak</button>
                  </div>

                  <script>
                    $(document).ready(function() {

                    });
                  </script>

                </form>
              </div>
            </div>
          </div>
          <!-- /MODAL SELESAI -->

          <!-- MODAL BATAL -->
          <div class="modal fade center" id="batal<?= $pemesanan['NoTransaksi']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-danger text-center">
                  <h5 class="modal-title h5 w-100">BATALKAN PEMESANAN</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <ul class="list-group list-group-flush">
                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Transaksi</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['NoTransaksi'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pemesan</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['Nama'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Mobil</div>
                      <div class="col" style="font-weight:500">
                        <?= '[ '
                            . $pemesanan['NoPlat']
                            . ' ] '
                            . $pemesanan['NmMerk']
                            . ' '
                            . $pemesanan['NmType']
                          ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Pesan</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Pesan'] ?>
                      </div>
                    </div>

                  </ul>
                </div>
                <div class="modal-footer text-center justify-content-center">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/batalPesanan" method="post">
                    <input type="hidden" name="noBatalTransaksi" value="<?= $pemesanan['NoTransaksi'] ?>">
                    <input type="hidden" name="statusMobil" value="<?= $pemesanan['Id_Mobil'] ?>">
                    <input type="hidden" name="statusSopir" value="<?= $pemesanan['Id_Sopir'] ?>">
                    <button type="submit" class="btn btn-danger shadow-none">Ya</button>
                    <button type="button" class="btn btn-outline-danger shadow-none" data-dismiss="modal">Tidak</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- / MODAL BATAL -->

          <!-- MODAL AMBIL MOBIL -->
          <div class="modal fade center" id="konfirmasi<?= $pemesanan['NoTransaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100">KONFIRMASI PENGAMBILAN MOBIL</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <ul class="list-group list-group-flush">

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Transaksi</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['NoTransaksi'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Induk Kependudukan</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['NIK'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pemesan</div>
                      <div class="col" style="font-weight:500"><?= $pemesanan['Nama'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Mobil</div>
                      <div class="col" style="font-weight:500">
                        <?= '[ '
                            . $pemesanan['NoPlat']
                            . ' ] '
                            . $pemesanan['NmMerk']
                            . ' '
                            . $pemesanan['NmType']
                          ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Sopir</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['NmSopir'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Pesan</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Pesan'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Mulai</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Pinjam'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Rencana Pengembalian</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['Tanggal_Kembali_Rencana'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Lama Rental</div>
                      <div class="col" style="font-weight:500">
                        <?= $pemesanan['LamaRental'] ?> Hari
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tarif Sopir / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $pemesanan['TarifPerhari'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Harga Sewa Mobil / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $pemesanan['HargaSewa'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Total Bayar Sementara</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $pemesanan['Total_Bayar'] ?></span>
                        ,-
                      </div>
                    </div>

                  </ul>
                </div>
                <div class="modal-footer text-center justify-content-center">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/AmbilMobil" method="post" role="form">
                    <input type="hidden" name="statusTransaksi" value="<?= $pemesanan['NoTransaksi'] ?>">
                    <input type="hidden" name="statusMobil" value="<?= $pemesanan['Id_Mobil'] ?>">
                    <input type="hidden" name="statusSopir" value="<?= $pemesanan['Id_Sopir'] ?>">
                    <button type="submit" class="btn btn-primary shadow-none">Ya</button>
                    <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Tidak</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
          <!-- / MODAL AMBIL MOBIL -->

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
        <h5 class="modal-title h5 w-100" id="input">TAMBAH PESANAN</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahPemesanan" method="post" role="form">

          <div class="form-group">
            <label for="NoTransaksi">Kode Transaksi</label>
            <input type="text" class="form-control" id="NoTransaksi" name="NoTransaksi" required value="<?= $data['autoIdTransaksi'] ?>" readonly>
          </div>

          <div class="form-group">
            <label for="Identitas">Penyewa</label>
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
                echo '<option harga="' . $mobil['HargaSewa'] . '" value="' . $mobil['id'] . '">'
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
              <input type="text" class="uang form-control" id="TarifMobilPerhari" disabled>
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
        <button type="submit" class="btn btn-primary shadow-none" id="submit">Konfirmasi Pesanan</button>
      </div>
      </form>
    </div>
  </div>
</div>
</div>
<!-- AKHIR MODAL-->