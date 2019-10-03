<!-- TOMBOL -->
<div class="row">
  <div class="col-md-6">
    <?php Flasher::flash(); ?>
  </div>
  <div class="col-md-12">
    <button class="btn btn-primary mb-3" type="button" data-toggle="modal" data-target="#inputMobil">
      <i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Mobil
    </button>
  </div>
</div>

<!-- TABLE -->
<table class="table table-hover table-bordered" id="tolong">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-center">No Polisi</th>
      <th scope="col" class="text-center">Foto</th>
      <th scope="col" class="text-center">Merk</th>
      <th scope="col" class="text-center">Tipe</th>
      <th scope="col" class="text-center">Harga Sewa</th>
      <th scope="col" class="text-center">Status</th>
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
        <td>
          <a data-toggle="modal" data-target="#foto<?= $mobil['id']; ?>">
            <img class="img-thumbnail" width="100" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
          </a>
        </td>
        <td><?= ucfirst($mobil['NmMerk']); ?></td>
        <td><?= ucfirst($mobil['NmType']); ?></td>
        <td>Rp.<span class="uang"><?= $mobil['HargaSewa']; ?></span>,-</td>
        <td>
          <h5>
            <span class="badge 
            <?php if ($mobil['StatusRental'] == 'Kosong') echo 'badge-success';
              else if ($mobil['StatusRental'] == 'Dipesan') echo 'badge-warning';
              else echo 'badge-danger';
              ?>
            ">
              <?= ucfirst($mobil['StatusRental']); ?>
            </span>
          </h5>
        </td>
        <td class="text-center">
          <button class="btn btn-warning" data-toggle="modal" data-target="#edit<?= $mobil['id']; ?>"><i class="fas fa-fw fa-edit"></i></button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $mobil['id']; ?>"><i class="fas fa-fw fa-trash"></i></button>
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
            <div class="modal-body">
              <img class="" width="100%" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
            </div>
          </div>
        </div>
      </div>
      <!-- AKHIR MODAL FOTO -->

      <!-- AWAL MODAL EDIT-->
      <div class="modal fade" id="edit<?= $mobil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMobilLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white text-center">
              <h5 class="modal-title h5 w-100" id="editMobilLabel">UBAH DATA MOBIL</h5>
            </div>
            <div class="modal-body">

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
              <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
              <button type="submit" class="btn btn-primary" id="submit">Ubah Data</button>
            </div>
            </form>
          </div>
        </div>
      </div>
      <!-- AKHIR MODAL EDIT-->

      <!-- AWAL HAPUS -->
      <div class="modal fade center" id="hapus<?= $mobil['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white text-center">
              <h5 class="modal-title h5 w-100">HAPUS DATA MOBIL</h5>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/hapusMobil/<?= $mobil['id'] ?>" method="post">
                <center>
                  <h5>
                    Apakah anda yakin?<br>
                    Data <b><?= $mobil['NoPlat']; ?></b> akan dihapus.
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
<div class="modal fade" id="inputMobil" tabindex="-1" role="dialog" aria-labelledby="inputMobilLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white text-center">
        <h5 class="modal-title h5 w-100" id="inputMobilLabel">TAMBAH DATA MOBIL</h5>
      </div>
      <div class="modal-body">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahMobil" method="post" role="form" enctype="multipart/form-data">

          <div class="form-group">
            <label for="NoPlat">Nomor Polisi</label>
            <input type="text" class="form-control" id="NoPlat" name="NoPlat" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="KdMerk">Merk</label>
            <select class="custom-select" name="KdMerk" id="KdMerk">
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
            <select class="custom-select" name="IdType" id="IdType">
              <option value="" selected disabled>Pilih Merk Terlebih Dahulu</option>
            </select>
          </div>

          <input type="hidden" name="StatusRental" value="Kosong">

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
        <button type="button" class="btn btn-outline-primary" data-dismiss="modal">Keluar</button>
        <button type="submit" class="btn btn-primary" id="submit">Simpan Data</button>
      </div>
      </form>
    </div>
  </div>
</div>
<!-- AKHIR MODAL-->