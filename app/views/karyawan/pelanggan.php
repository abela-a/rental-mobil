<!-- TOMBOL -->
<div class="row">
  <div class="col-md-6">
    <?php Flasher::flash(); ?>
  </div>
  <div class="col-md-12">
    <button class="btn btn-primary mb-3" type="button" data-toggle="modal" data-target="#inputUser">
      <i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Pelanggan
    </button>
  </div>
</div>

<!-- TABLE -->
<table class="table table-hover table-bordered" id="tolong">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-center">NIK</th>
      <th scope="col" class="text-center">Nama</th>
      <th scope="col" class="text-center">No Telp</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php
    // TAMPILKAN BARIS
    $no = 1;
    foreach ($data['pelanggan'] as $user) : ?>

      <tr>
        <td><?= $no++ ?></td>
        <td><?= ucfirst($user['NIK']); ?></td>
        <td><?= ucfirst($user['Nama']); ?></td>
        <td class="telp"><?= ucfirst($user['NoTelp']); ?></td>
        <td class="text-center">
          <button class="btn btn-warning" data-toggle="modal" title="Edit" data-target="#edit<?= $user['id']; ?>"><i class="fas fa-fw fa-edit"></i></button>
          <button class="btn btn-danger" data-toggle="modal" title="Hapus" data-target="#hapus<?= $user['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
          <button data-toggle="modal" title="Detail" data-target="#detail<?= $user['id']; ?>" class="btn btn-info text-white" title="Detail"><i class="fas fa-fw fa-user"></i></button>
        </td>
      </tr>

      <!-- MODAL DETAIL -->
      <div class="modal fade right" id="detail<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

        <div class="modal-dialog modal-full-height modal-right" role="document">

          <div class="modal-content">

            <div class="modal-header text-center bg-info text-white">
              <h4 class="modal-title w-100 h5" id="myModalLabel">DETAIL PELANGGAN</h4>
            </div>

            <div class="modal-body">

              <ul class="list-group list-group-flush">

                <div class="row list-group-item">
                  <img width="50" src="<?= BASEURL ?>/img/fotouser/<?= $user['Foto'] ?>" class="card-img">
                </div>

                <div class="row list-group-item">
                  <div class="col">Nomor Induk Kependudukan</div>
                  <div class="col" style="font-weight:500"><?= $user['NIK'] ?></div>
                </div>

                <div class="row list-group-item">
                  <div class="col">Nama Pelanggan</div>
                  <div class="col" style="font-weight:500"><?= $user['Nama']; ?></div>
                </div>

                <div class="row list-group-item">
                  <div class="col">Username</div>
                  <div class="col" style="font-weight:500"><?= $user['NamaUser']; ?></div>
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
              </ul>
            </div>
          </div>
        </div>
      </div>
      <!-- AKHIR MODAL DETAIL -->

      <!-- AWAL MODAL EDIT-->
      <div class="modal fade" id="edit<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edituUserLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white text-center">
              <h5 class="modal-title h5 w-100" id="edituUserLabel">UBAH DATA PELANGGAN</h5>
            </div>
            <div class="modal-body">

              <!-- AWAL FORM -->

              <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/editPelanggan/" method="post" role="form">

                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <div class="form-group">
                  <label for="NIK">Nomor Induk Kependudukan</label>
                  <input type="number" class="form-control" id="NIK" name="NIK" required autocomplete="off" value="<?= $user['NIK'] ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="NamaUser">Username</label>
                  <input type="email" class="form-control" id="NamaUser" name="NamaUser" readonly value="<?= $user['NamaUser'] ?>">
                </div>

                <div class="form-group">
                  <label for="Password">Password</label>
                  <input type="password" class="form-control" id="Password" name="Password" autocomplete="off">
                </div>

                <div class="form-group">
                  <label for="Nama">Nama Lengkap</label>
                  <input type="text" class="form-control" id="Nama" name="Nama" required autocomplete="off" value="<?= $user['Nama'] ?>">
                </div>

                <div class="form-group">
                  <label for="JenisKelamin">Jenis Kelamin</label>
                  <select class="custom-select" name="JenisKelamin" id="JenisKelamin">
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

                <input type="hidden" name="roleId" value="3">
                <!-- AKHIR FORM -->

            </div>
            <div class="modal-footer text-center justify-content-center">
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary" id="submit">Ubah Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- AKHIR MODAL EDIT-->

      <!-- AWAL HAPUS -->
      <div class="modal fade center" id="hapus<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white text-center">
              <h5 class="modal-title h5 w-100">HAPUS DATA PELANGGAN</h5>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/hapusPelanggan/<?= $user['id'] ?>" method="post">
                <center>
                  <h5>
                    Apakah anda yakin?<br>
                    Data <b><?= $user['Nama']; ?></b> akan dihapus.
                  </h5>
                </center>
            </div>
            <div class="modal-footer text-center justify-content-center">
              <button type="submit" class="btn btn-danger">Ya</button>
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Tidak</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- AKHIR HAPUS -->
    <?php endforeach; ?>

  </tbody>
</table>
<!-- AKHIR TABLE -->
</div>
</div>
</div>
<!-- AWAL MODAL-->
<div class="modal fade" id="inputUser" tabindex="-1" role="dialog" aria-labelledby="inputUserLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white text-center">
        <h5 class="modal-title h5 w-100" id="inputUserLabel">TAMBAH DATA PELANGGAN</h5>
      </div>
      <div class="modal-body">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahPelanggan" method="post" role="form">

          <div class="form-group">
            <label for="NIK">Nomor Induk Kependudukan</label>
            <input type="number" class="form-control" id="NIK" name="NIK" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="Nama" name="Nama" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="NamaUser">Username</label>
            <input type="email" class="form-control" id="NamaUser" name="NamaUser" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select class="custom-select" name="JenisKelamin" id="JenisKelamin">
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

          <input type="hidden" name="Foto" value="default.png">
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