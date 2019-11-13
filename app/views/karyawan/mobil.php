<!-- TOMBOL -->
<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn btn-primary shadow-none mb-3 float-right" type="button" data-toggle="modal" data-target="#inputMobil">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Mobil
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <!-- TABLE -->
    <table class="table table-hover" id="tolong">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">No Polisi</th>
          <th scope="col" class="text-center">Foto</th>
          <th scope="col" class="text-center">Mobil</th>
          <th scope="col" class="text-center">Informasi</th>
          <th scope="col" class="text-center">Harga Sewa</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['mobil'] as $mobil) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucfirst($mobil['NoPlat']); ?></td>
            <td class="text-center">
              <a data-toggle="modal" data-target="#foto<?= $mobil['id']; ?>">
                <img class="" width="100" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
              </a>
            </td>
            <td>
              <?= ucfirst($mobil['NmMerk']); ?>
              <?= ucfirst($mobil['NmType']); ?>
            </td>
            <td>
              <h6>
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
              </h6>
            </td>
            <td>Rp.<span class="uang"><?= $mobil['HargaSewa']; ?></span>,-</td>

            <td class="text-center" style="width:150px">
              <button class="btn btn-sm btn-warning shadow-none" data-toggle="modal" data-target="#edit<?= $mobil['id']; ?>"><i class="fas fa-fw fa-edit"></i></button>
              <button class="btn btn-sm btn-danger shadow-none" data-toggle="modal" data-target="#hapus<?= $mobil['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
            </td>
          </tr>

          <!-- AWAL MODAL FOTO -->
          <div class="modal fade" id="foto<?= $mobil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="fotoTitle" aria-hidden="true">

            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">

              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title h5 w-100">
                    <?= ucfirst($mobil['NoPlat']); ?> |
                    <?= ucfirst($mobil['NmMerk']); ?> |
                    <?= ucfirst($mobil['NmType']); ?>
                  </h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <img class="" width="100%" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR MODAL FOTO -->

          <!-- AWAL MODAL EDIT-->
          <div class="modal fade" id="edit<?= $mobil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMobilLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100" id="editMobilLabel">UBAH DATA MOBIL</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">

                  <!-- AWAL FORM -->

                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/editMobil/" method="post" role="form" enctype="multipart/form-data">

                    <input type="hidden" name="id" value="<?= $mobil['id']; ?>">

                    <div class="form-group">
                      <label for="NoPlat">Nomor Polisi</label>
                      <input type="text" class="form-control" id="NoPlat" name="NoPlat" required autocomplete="off" value="<?= $mobil['NoPlat'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="KdMerk">Merk</label>
                      <input type="hidden" name="KdMerk" value="<?= $mobil['KdMerk']; ?>">
                      <input type="text" class="form-control" id="NmMerk" name="NmMerk" required autocomplete="off" value="<?= $mobil['NmMerk'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="IdType">Tipe</label>
                      <input type="hidden" name="IdType" value="<?= $mobil['IdType']; ?>">
                      <input type="text" class="form-control" id="NmType" name="NmType" required autocomplete="off" value="<?= $mobil['NmType'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="JenisMobil">Jenis Mobil</label>
                      <select class="browser-default custom-select" name="JenisMobil" id="JenisMobil">
                        <option value="" selected disabled>Pilih Jenis Mobil</option>
                        <option <?php if ($mobil['JenisMobil'] == 'MPV') echo 'selected' ?>>MPV</option>
                        <option <?php if ($mobil['JenisMobil'] == 'City') echo 'selected' ?>>City</option>
                        <option <?php if ($mobil['JenisMobil'] == 'Sedan') echo 'selected' ?>>Sedan</option>
                        <option <?php if ($mobil['JenisMobil'] == 'SUV') echo 'selected' ?>>SUV</option>
                        <option <?php if ($mobil['JenisMobil'] == 'Double Cabin') echo 'selected' ?>>Double Cabin</option>
                        <option <?php if ($mobil['JenisMobil'] == 'Other') echo 'selected' ?>>Other</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="Transmisi">Jenis Transmisi</label>
                      <select class="browser-default custom-select" name="Transmisi" id="Transmisi">
                        <option value="" selected disabled>Pilih Transmisi Mobil</option>
                        <option <?php if ($mobil['Transmisi'] == 'Matic') echo 'selected' ?>>Matic</option>
                        <option <?php if ($mobil['JenisMobil'] == 'Manual') echo 'selected' ?>>Manual</option>
                        <option <?php if ($mobil['JenisMobil'] == 'CVT') echo 'selected' ?>>CVT</option>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="HargaSewa">Harga Sewa</label>
                      <div class="input-group">
                        <div class="input-group-prepend">
                          <span class="input-group-text" id="basic-addon1">Rp.</span>
                        </div>
                        <input type="text" class="form-control uang" id="HargaSewa" name="HargaSewa" required autocomplete="off" value="<?= $mobil['HargaSewa'] ?>">
                      </div>
                    </div>

                    <input type="hidden" name="GambarLama" value="<?= $mobil['FotoMobil']; ?>">

                    <div class="form-group">
                      <label for="FotoMobil">Foto</label>
                      <div class="row no-gutters">
                        <div class="col-md-3">
                          <img class="img-thumbnail" width="100" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
                        </div>
                        <div class="col-md">
                          <div class="input-group mb-3">
                            <div class="custom-file">
                              <input type="file" class="custom-file-input" id="FotoMobil" name="FotoMobil">
                              <label class="custom-file-label" for="inputFotoMobil" aria-describedby="inputFotoMobil">Pilih Berkas</label>
                            </div>
                          </div>
                        </div>
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
          <div class="modal fade center" id="hapus<?= $mobil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-danger text-center">
                  <h5 class="modal-title h5 w-100">HAPUS DATA MOBIL</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/hapusMobil/<?= $mobil['id'] ?>" method="post">
                    <center>
                      <h5>
                        Apakah anda yakin?<br>
                        Data <b><?= $mobil['NoPlat']; ?></b> akan dihapus.
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
    <!-- AKHIR TABLE -->
  </div>
</div>
<!-- AWAL MODAL-->
<div class="modal fade" id="inputMobil" tabindex="-1" role="dialog" aria-labelledby="inputMobilLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="inputMobilLabel">TAMBAH DATA MOBIL</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahMobil" method="post" role="form" enctype="multipart/form-data">

          <div class="form-group">
            <label for="NoPlat">Nomor Polisi</label>
            <input type="text" class="form-control" id="NoPlat" name="NoPlat" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="KdMerk">Merk</label>
            <select class="browser-default custom-select" name="KdMerk" id="KdMerk">
              <option value="" selected disabled>Pilih Merk</option>
              <?php
              foreach ($data['merkOption'] as $merkOption) :
                echo '<option value="' . $merkOption['KdMerk'] . '">' . $merkOption['NmMerk'] . '</option>';
              endforeach;
              ?>
            </select>
          </div>

          <div class="form-group" id="type">
            <label for="IdType">Tipe</label>
            <select class="browser-default custom-select" name="IdType" id="IdType">
              <option value="" selected disabled>Pilih Merk Terlebih Dahulu</option>
            </select>
          </div>

          <div class="form-group">
            <label for="JenisMobil">Jenis Mobil</label>
            <select class="browser-default custom-select" name="JenisMobil" id="JenisMobil">
              <option value="" selected disabled>Pilih Jenis Mobil</option>
              <option>MPV</option>
              <option>City</option>
              <option>Sedan</option>
              <option>SUV</option>
              <option>Double Cabin</option>
              <option>Other</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Transmisi">Jenis Transmisi</label>
            <select class="browser-default custom-select" name="Transmisi" id="Transmisi">
              <option value="" selected disabled>Pilih Jenis Transmisi</option>
              <option>Matic</option>
              <option>Manual</option>
              <option>CVT</option>
            </select>
          </div>

          <div class="form-group">
            <label for="HargaSewa">Harga Sewa</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text" id="basic-addon1">Rp.</span>
              </div>
              <input type="text" class="form-control uang" id="HargaSewa" name="HargaSewa" required autocomplete="off">
            </div>
          </div>

          <div class="form-group">
            <label for="FotoMobil">Foto</label>
            <div class="input-group mb-3">
              <div class="custom-file">
                <input type="file" class="custom-file-input" id="FotoMobil" name="FotoMobil">
                <label class="custom-file-label" for="inputFotoMobil" aria-describedby="inputFotoMobil">Pilih Berkas</label>
              </div>
            </div>
          </div>
          <!-- AKHIR FORM -->

      </div>
      <div class="modal-footer text-center justify-content-center">
        <button type="button" class="btn btn-outline-primary shadow-none" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary shadow-none" id="submit">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- AKHIR MODAL-->