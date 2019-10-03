<!-- TOMBOL -->
<div class="row">
  <div class="col-md-6">
    <?php Flasher::flash(); ?>
  </div>
  <div class="col-md-12">
    <button class="btn btn-primary mb-3 tombolTambahMerk" type="button" data-toggle="modal" data-target="#inputMerk">
      <i class="fa fa-plus-square" aria-hidden="true"></i> Tambah Merk Mobil
    </button>
  </div>
</div>

<!-- TABLE -->
<table class="table table-hover table-bordered" id="tolong">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-center">Kode Merk</th>
      <th scope="col" class="text-center">Nama Merk</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>

    <?php
    // TAMPILKAN BARIS
    $no = 1;
    foreach ($data['merk'] as $merk) : ?>

      <tr>
        <td><?= $no++ ?></td>
        <td><?= ucfirst($merk['KdMerk']); ?></td>
        <td><?= ucfirst($merk['NmMerk']); ?></td>
        <td class="text-center">
          <button class="btn btn-warning" data-toggle="modal" data-target="#editMerk<?= ($merk['KdMerk']); ?>"><i class="fas fa-fw fa-edit"></i></button>
          <button class="btn btn-danger" data-toggle="modal" data-target="#hapus<?= $merk['KdMerk']; ?>"><i class="fas fa-fw fa-trash"></i></button>
        </td>
      </tr>

      <!-- AWAL MODAL EDIT-->
      <div class="modal fade" id="editMerk<?= $merk['KdMerk']; ?>" tabindex="-1" role="dialog" aria-labelledby="editMerkLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-primary text-white text-center">
              <h5 class="modal-title h5 w-100" id="editMerkLabel">UBAH DATA MERK</h5>
            </div>
            <div class="modal-body">

              <!-- AWAL FORM -->

              <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/editMerk/" method="post" role="form">

                <input type="hidden" name="id" value="<?= $merk['id'] ?>">

                <div class="form-group">
                  <label for="KdMerk">Kode Merk</label>
                  <input type="text" class="form-control" id="KdMerk" name="KdMerk" required autocomplete="off" value="<?= $merk['KdMerk']; ?>" readonly>
                </div>

                <div class="form-group">
                  <label for="NmMerk">Nama Merk</label>
                  <input type="text" class="form-control" id="NmMerk" name="NmMerk" required autocomplete="off" value="<?= $merk['NmMerk']; ?>">
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
      <div class="modal fade center" id="hapus<?= $merk['KdMerk']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header bg-danger text-white text-center">
              <h5 class="modal-title h5 w-100" id="editMerkLabel">HAPUS DATA MERK</h5>
            </div>
            <div class="modal-body">
              <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/hapusMerk/<?= $merk['KdMerk'] ?>" method="post">
                <center>
                  <h5>Data ini akan dihapus. Apakah anda yakin?</h5>
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
<div class="modal fade" id="inputMerk" tabindex="-1" role="dialog" aria-labelledby="inputMerkLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header bg-primary text-white text-center">
        <h5 class="modal-title h5 w-100" id="inputMerkLabel">TAMBAH DATA MERK</h5>
      </div>
      <div class="modal-body">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/tambahMerk" method="post" role="form">

          <div class="form-group">
            <label for="KdMerk">Kode Merk</label>
            <input type="text" class="form-control" id="KdMerk" name="KdMerk" required autocomplete="off">
          </div>

          <div class="form-group">
            <label for="NmMerk">Nama Merk</label>
            <input type="text" class="form-control" id="NmMerk" name="NmMerk" required autocomplete="off">
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
</div>
<!-- AKHIR MODAL-->