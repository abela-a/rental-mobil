<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn btn-primary mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputType">
        <i class="fa fa-plus fa-fw" aria-hidden="true"></i> Tambah Tipe</button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <table class="table table-hover" id="tolong">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">Kode Tipe</th>
          <th scope="col" class="text-center">Nama Tipe</th>
          <th scope="col" class="text-center">Nama Merk</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>

        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['type'] as $type) : ?>

          <tr>
            <td><?= $no++ ?></td>
            <td><?= ucfirst($type['IdType']); ?></td>
            <td><?= ucfirst($type['NmType']); ?></td>
            <td><?= ucfirst($type['NmMerk']); ?></td>
            <td class="text-center" style="width:150px">
              <button class="btn btn-sm btn-warning shadow-none" data-toggle="modal" data-target="#edit<?= $type['IdType']; ?>"><i class="fas fa-fw fa-edit"></i></button>
              <button class="btn btn-sm btn-danger shadow-none" data-toggle="modal" data-target="#hapus<?= $type['IdType']; ?>"><i class="fas fa-fw fa-trash"></i></button>
            </td>
          </tr>

          <!-- AWAL MODAL EDIT-->
          <div class="modal fade" id="edit<?= $type['IdType']; ?>" tabindex="-1" role="dialog" aria-labelledby="editTypeLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-primary text-center">
                  <h5 class="modal-title h5 w-100" id="editTypeLabel">UBAH DATA TIPE</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">

                  <!-- AWAL FORM -->

                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/editType/<?= $type['IdType']; ?>" method="post" role="form">

                    <input type="hidden" name="id" value="<?= $type['id'] ?>">

                    <input type="hidden" name="KdMerk" value="<?= $type['KdMerk']; ?>">

                    <div class="form-group">
                      <label for="KdMerk">Merk</label>
                      <input type="text" class="form-control" id="NmMerk" name="NmMerk" required autocomplete="off" value="<?= $type['NmMerk'] ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="IdType">Kode Tipe</label>
                      <input type="text" class="form-control" id="IdType" name="IdType" required autocomplete="off" value="<?= $type['IdType']; ?>" readonly>
                    </div>

                    <div class="form-group">
                      <label for="NmType">Nama Tipe</label>
                      <input type="text" class="form-control" id="NmType" name="NmType" required autocomplete="off" value="<?= $type['NmType']; ?>">
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
          <div class="modal fade center" id="hapus<?= $type['IdType']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header text-danger text-center">
                  <h5 class="modal-title h5 w-100">HAPUS DATA TIPE</h5>
                </div>
                <div class="modal-body px-5 grey lighten-5">
                  <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/hapusType/<?= $type['IdType'] ?>" method="post">
                    <center>
                      <h5>Data ini akan dihapus. Apakah anda yakin?</h5>
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
<div class="modal fade" id="inputType" tabindex="-1" role="dialog" aria-labelledby="inputTypeLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="inputTypeLabel">TAMBAH DATA TIPE</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahType" method="post" role="form">

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

          <div class="form-group">
            <label for="IdType">Kode Tipe</label>
            <input type="text" class="form-control" id="IdType" name="IdType" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="NmType">Nama Tipe</label>
            <input type="text" class="form-control" id="NmType" name="NmType" required autocomplete="off">
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
</div>
<!-- AKHIR MODAL-->