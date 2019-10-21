<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn btn-primary mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Sopir
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <table class="table table-hover" id="tolong">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">NIK</th>
          <th scope="col" class="text-center">IdSopir</th>
          <th scope="col" class="text-center">Nama</th>
          <th scope="col" class="text-center">Tarif/Hari</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        // TAMPILKAN BARIS
        $no = 0;
        foreach ($data['sopir'] as $user) : ?>

          <tr <?php if ($user['IdSopir'] == "SPR000") echo 'class="d-none"' ?>>
            <td><?= $no++ ?></td>
            <td><?= ucfirst($user['NIK']); ?></td>
            <td><?= ucfirst($user['IdSopir']); ?></td>
            <td>
              <?= ucfirst($user['NmSopir']); ?>
              <span class="ml-2 shadow-none badge 
            <?php if ($user['StatusSopir'] == 'Free') echo 'badge-success';
              else if ($user['StatusSopir'] == 'Busy') echo 'badge-danger';
              else echo 'badge-danger';
              ?>
            ">
                <?= ucfirst($user['StatusSopir']); ?>
              </span>
            </td>
            <td>
              Rp.<span class="uang"><?= ucfirst($user['TarifPerhari']); ?></span>,-
            </td>
            <td class="text-center">
              <button class="btn btn-warning shadow-none" data-toggle="modal" title="Edit" data-target="#edit<?= $user['id']; ?>"><i class="fas fa-fw fa-edit"></i></button>
              <button class="btn btn-danger shadow-none" data-toggle="modal" title="Hapus" data-target="#hapus<?= $user['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
              <button data-toggle="modal" title="Detail" data-target="#detail<?= $user['id']; ?>" class="btn btn-info text-white shadow-none" title="Detail"><i class="fas fa-fw fa-user"></i></button>
            </td>
          </tr>

          <!-- MODAL DETAIL -->
          <div class="modal fade right" id="detail<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-full-height modal-right" role="document">

              <div class="modal-content">

                <div class="modal-header text-center text-primary">
                  <h4 class="modal-title w-100 h5" id="myModalLabel">DETAIL SOPIR</h4>
                </div>

                <div class="modal-body px-5 grey lighten-5">

                  <ul class="list-group list-group-flush">

                    <div class="row list-group-item">
                      <div class="col">ID Sopir</div>
                      <div class="col" style="font-weight:500"><?= $user['IdSopir'] ?></div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">Nomor Induk Kependudukan</div>
                      <div class="col" style="font-weight:500"><?= $user['NIK'] ?></div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">Nama Sopir</div>
                      <div class="col" style="font-weight:500"><?= $user['NmSopir']; ?></div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">NO SIM</div>
                      <div class="col" style="font-weight:500"><?= $user['NoSim']; ?></div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">Jenis Kelamin</div>
                      <div class="col" style="font-weight:500">
                        <?php if ($user['JenisKelamin'] == 'L') {
                            echo 'Laki-laki';
                          } else {
                            echo 'Perempuan';
                          } ?>
                      </div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">No Telepon</div>
                      <div class="col telp" style="font-weight:500"><?= $user['NoTelp']; ?></div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">Alamat</div>
                      <div class="col" style="font-weight:500"><?= $user['Alamat']; ?></div>
                    </div>

                    <div class="row list-group-item">
                      <div class="col">Tarif / Hari</div>
                      <div class="col" style="font-weight:500;color:red">
                        Rp.<span class="uang"><?= ucfirst($user['TarifPerhari']); ?></span>,-
                      </div>
                    </div>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR MODAL DETAIL -->

          <!-- AWAL MODAL EDIT-->
          <div class="modal fade" id="edit<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edituUserLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100" id="edituUserLabel">UBAH DATA SOPIR</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">

                  <!-- AWAL FORM -->

                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/editSopir/" method="post" role="form">

                    <input type="hidden" name="id" value="<?= $user['id'] ?>">

                    <div class="form-group">
                      <label for="IdSopir">Id Sopir</label>
                      <input type="text" class="form-control" id="IdSopir" name="IdSopir" required autocomplete="off" readonly value="<?= $user['IdSopir'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="NIK">Nomor Induk Kependudukan</label>
                      <input type="number" class="form-control" id="NIK" name="NIK" required autocomplete="off" readonly value="<?= $user['NIK'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="NmSopir">Nama Lengkap</label>
                      <input type="text" class="form-control" id="NmSopir" name="NmSopir" required autocomplete="off" value="<?= $user['NmSopir'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="NoSim">No SIM</label>
                      <input type="text" class="form-control" id="NoSim" name="NoSim" required autocomplete="off" readonly value="<?= $user['NoSim'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="JenisKelamin">Jenis Kelamin</label>
                      <select class="browser-default custom-select" name="JenisKelamin" id="JenisKelamin">
                        <option value="L" <?php if ($user['JenisKelamin'] == 'L') {
                                              echo 'selected';
                                            } ?>>Laki-laki</option>
                        <option value="P" <?php if ($user['JenisKelamin'] == 'P') {
                                              echo 'selected';
                                            } ?>>Perempuan</option>
                      </select>
                    </div>


                    <div class="form-group">
                      <label for="Alamat">Alamat</label>
                      <textarea class="form-control" id="Alamat" name="Alamat" required autocomplete="off"><?= $user['Alamat'] ?></textarea>
                    </div>

                    <div class="form-group">
                      <label for="NoTelp">No Telepon</label>
                      <input type="text" class="form-control telp" id="NoTelp" name="NoTelp" required autocomplete="off" value="<?= $user['NoTelp'] ?>">
                    </div>

                    <div class="form-group">
                      <label for="TarifPerhari">Tarif/Hari</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="form-control uang" id="TarifPerhari" name="TarifPerhari" required autocomplete="off" value="<?= $user['TarifPerhari'] ?>">
                      </div>
                    </div>
                    <!-- AKHIR FORM -->

                </div>
                <div class="modal-footer text-center justify-content-center">
                  <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
                  <button type="submit" class="btn btn-primary shadow-none" id="submit">Ubah Data</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- AKHIR MODAL EDIT-->

          <!-- AWAL HAPUS -->
          <div class="modal fade center" id="hapus<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-danger text-center">
                  <h5 class="modal-title h5 w-100">HAPUS DATA SOPIR</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/hapusSopir/<?= $user['id'] ?>" method="post">
                    <center>
                      <h5>
                        Apakah anda yakin?<br>
                        Data <b><?= $user['NmSopir']; ?></b> akan dihapus.
                      </h5>
                    </center>
                </div>
                <div class="modal-footer text-center justify-content-center">
                  <button type="submit" class="btn btn-danger shadow-none">Ya</button>
                  <button type="button" class="btn btn-outline-danger shadow-none" data-dismiss="modal">Tidak</button>
                </div>
                </form>
              </div>
            </div>
          </div>
          <!-- AKHIR HAPUS -->
        <?php endforeach; ?>

      </tbody>
    </table>
  </div>
</div>
<!-- AWAL MODAL-->
<div class="modal fade" id="inputUser" tabindex="-1" role="dialog" aria-labelledby="inputUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="inputUserLabel">TAMBAH DATA SOPIR</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahSopir" method="post" role="form">

          <div class="form-group">
            <label for="IdSopir">Id Sopir</label>
            <input type="text" class="form-control" id="IdSopir" name="IdSopir" readonly value="<?= $data['autoIdSopir'] ?>">
          </div>

          <div class="form-group">
            <label for="NIK">Nomor Induk Kependudukan</label>
            <input type="number" class="form-control" id="NIK" name="NIK" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="NmSopir">Nama Lengkap</label>
            <input type="text" class="form-control" id="NmSopir" name="NmSopir" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="NoSim">No SIM</label>
            <input type="text" class="form-control" id="NoSim" name="NoSim" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select class="browser-default custom-select" name="JenisKelamin" id="JenisKelamin">
              <option value="" selected disabled>Pilih jenis Kelamin</option>
              <option value="L">Laki-laki</option>
              <option value="P">Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" id="Alamat" name="Alamat" required autocomplete="off"></textarea>
          </div>

          <div class="form-group">
            <label for="NoTelp">No Telepon</label>
            <input type="text" class="form-control telp" id="NoTelp" name="NoTelp" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="TarifPerhari">Tarif/Hari</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control uang" id="TarifPerhari" name="TarifPerhari" required autocomplete="off">
            </div>
          </div>
      </div>
      <div class="modal-footer text-center justify-content-center">
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary" id="submit">Simpan Data</button>
      </div>
      </form>
      <!-- AKHIR FORM -->
    </div>
  </div>
</div>
<!-- AKHIR MODAL-->