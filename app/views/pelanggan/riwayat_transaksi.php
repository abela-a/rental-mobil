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
        foreach ($data['riwayatTransaksi'] as $Transaksi) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td>
              <?= ucfirst($Transaksi['NoTransaksi']); ?>
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
            <td class="text-center" style="width:50px">
              <button class="btn grey lighten-2 btn-sm shadow-none" data-toggle="modal" data-target="#detail<?= $Transaksi['NoTransaksi'] ?>">
                <i class="fa fa-bars fa-fw" aria-hidden="true"></i>
              </button>
              <a class="btn btn-info btn-sm shadow-none" href="<?= BASEURL ?>/laporan/kwitansi/<?= $Transaksi['NoTransaksi'] ?>">
                <i class="fa fa-print fa-fw" aria-hidden="true"></i>
              </a>
            </td>
          </tr>

          <!-- MODAL DETAIL -->
          <div class="modal fade center" id="detail<?= $Transaksi['NoTransaksi'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100">DETAIL TRANSAKSI</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <ul class="list-group list-group-flush">

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Transaksi</div>
                      <div class="col" style="font-weight:500"><?= $Transaksi['NoTransaksi'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Induk Kependudukan</div>
                      <div class="col" style="font-weight:500"><?= $Transaksi['NIK'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pemesan</div>
                      <div class="col" style="font-weight:500"><?= $Transaksi['Nama'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Mobil</div>
                      <div class="col" style="font-weight:500">
                        <?= '[ '
                            . $Transaksi['NoPlat']
                            . ' ] '
                            . $Transaksi['NmMerk']
                            . ' '
                            . $Transaksi['NmType']
                          ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Sopir</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['NmSopir'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Pesan</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Pesan'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Mulai</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Pinjam'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Rencana Pengembalian</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Kembali_Rencana'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Lama Rental</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['LamaRental'] ?> Hari
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tanggal Dikembalikan</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Tanggal_Kembali_Sebenarnya'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Lama Jatuh Tempo</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['LamaDenda'] ?> Hari
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Deskripsi Kerusakan</div>
                      <div class="col" style="font-weight:500">
                        <?= $Transaksi['Kerusakan'] ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Biaya Kerusakan</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['BiayaKerusakan'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Biaya BBM</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['BiayaBBM'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Denda Jatuh Tempo</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Denda'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Tarif Sopir / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['TarifPerhari'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Harga Sewa Mobil / Hari</div>
                      <div class="col" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['HargaSewa'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Total Bayar</div>
                      <div class="col red-text" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Total_Bayar'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Jumlah Bayar</div>
                      <div class="col text-success" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Jumlah_Bayar'] ?></span>
                        ,-
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Kembalian</div>
                      <div class="col text-danger" style="font-weight:500">
                        Rp.
                        <span class="uang"><?= $Transaksi['Kembalian'] ?></span>
                        ,-
                      </div>
                    </div>

                  </ul>
                </div>
                <div class="modal-footer text-center justify-content-center">
                </div>
              </div>
            </div>
          </div>
          <!-- / MODAL DETAIL -->

        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>