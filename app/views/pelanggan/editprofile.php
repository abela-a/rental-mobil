<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn btn-primary mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#edit<?= $data['userProfile']['id']; ?>">
        <i class="fa fa-user-edit fa-fw" aria-hidden="true"></i> Edit Profile
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <div class="card mb-5 shadow-none">
      <div class="row no-gutters">
        <div class="col-md-4">
          <div class="hovereffect">
            <img src="<?= BASEURL ?>/img/fotouser/<?= $data['userProfile']['Foto'] ?>" class="card-img fotoUser rounded-left img-responsive">
            <div class="overlay">
              <a data-toggle="modal" data-target="#foto" class="info">
                UBAH FOTO
              </a>
            </div>
          </div>
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title"><?= $data['userProfile']['Nama'] ?></h5>
            <p class="card-text"><?= $data['userProfile']['NamaUser'] ?></p>
          </div>
          <ul class="list-group list-group-flush">
            <li class="list-group-item">
              <i class="fa fa-address-card fa-fw"></i>
              <?= $data['userProfile']['NIK'] ?>
            </li>
            <li class="list-group-item">
              <i class="fas fa-location-arrow fa-fw"></i>
              <?= $data['userProfile']['Alamat'] ?>
            </li>
            <li class="list-group-item">
              <i class="fas fa-phone fa-fw"></i>
              <span class="telp">
                <?= $data['userProfile']['NoTelp'] ?>
              </span>
            </li>
            <li class="list-group-item">
              <i class="fa fa-<?php if ($data['userProfile']['JenisKelamin'] == 'L') {
                                echo 'male';
                              } else {
                                echo 'female';
                              } ?> fa-fw">
              </i>
              <?php if ($data['userProfile']['JenisKelamin'] == 'L') {
                echo 'Laki-laki';
              } else {
                echo 'Perempuan';
              } ?>
            </li>
          </ul>
        </div>
      </div>
      <!-- AKHIR DETAIL -->
    </div>
  </div>
</div>

<!-- AWAL MODAL FOTO -->
<div class="modal fade" id="foto" tabindex="-1" role="dialog" aria-labelledby="fotoTitle" aria-hidden="true">

  <div class="modal-dialog modal-dialog-centered" role="document">

    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title h5 w-100">PERBAHARUI FOTO</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">
        <img class="" width="100%" src="<?= BASEURL ?>/img/fotouser/<?= $data['userProfile']['Foto'] ?>">
      </div>
      <div class="modal-footer">
        <div class="input-group">
          <div class="custom-file">

            <form action="<?= BASEURL; ?>/Home/UbahFotoUser/" method="post" role="form" enctype="multipart/form-data">
              <input type="hidden" name="id" value="<?= $_SESSION['Login']['Id'] ?>">
              <input type="file" class="custom-file-input" id="FotoUser" name="FotoUser">
              <label class="custom-file-label" for="inputFotoUser" aria-describedby="inputFotoUser">Pilih Berkas</label>
          </div>
          <div class="input-group-append">
            <button class="input-group-text" type="submit">Upload</button>
            </form>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- AKHIR MODAL FOTO -->

<!-- AWAL MODAL EDIT-->
<div class="modal fade" id="edit<?= $data['userProfile']['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="edituUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header text-primary text-center">
        <h5 class="modal-title h5 w-100" id="edituUserLabel">UBAH PROFILE</h5>
      </div>
      <div class="modal-body px-5 grey lighten-5">

        <!-- AWAL FORM -->

        <form action="<?= BASEURL; ?>/<?= $_SESSION['Login']['Role'] ?>/editProfile/" method="post" role="form">

          <input type="hidden" name="id" value="<?= $data['userProfile']['id']; ?>">

          <div class="form-group">
            <label for="NIK">Nomor Induk Kependudukan</label>
            <input type="number" class="form-control" id="NIK" name="NIK" required autocomplete="off" value="<?= $data['userProfile']['NIK']; ?>" readonly>
          </div>

          <div class="form-group">
            <label for="NamaUser">Username</label>
            <input type="email" class="form-control" id="NamaUser" name="NamaUser" readonly value="<?= $data['userProfile']['NamaUser']; ?>">
          </div>

          <div class="form-group">
            <label for="Nama">Nama Lengkap</label>
            <input type="text" class="form-control" id="Nama" name="Nama" required autocomplete="off" value="<?= $data['userProfile']['Nama']; ?>">
          </div>

          <div class="form-group">
            <label for="Password">Password</label>
            <input type="password" class="form-control" id="Password" name="Password" autocomplete="off">
            <small class="text-danger">kosongkan jika tidak ingin mengubah password</small>
          </div>

          <div class="form-group">
            <label for="JenisKelamin">Jenis Kelamin</label>
            <select class="browser-default custom-select" name="JenisKelamin" id="JenisKelamin">
              <option value="L" <?php if ($data['userProfile']['JenisKelamin'] == 'L') {
                                  echo 'selected';
                                } ?>>Laki-laki</option>
              <option value="P" <?php if ($data['userProfile']['JenisKelamin'] == 'P') {
                                  echo 'selected';
                                } ?>>Perempuan</option>
            </select>
          </div>

          <div class="form-group">
            <label for="Alamat">Alamat</label>
            <textarea class="form-control" id="Alamat" name="Alamat" required autocomplete="off"><?= $data['userProfile']['Alamat']; ?></textarea>
          </div>

          <div class="form-group">
            <label for="NoTelp">No Telepon</label>
            <input type="text" class="form-control telp" id="NoTelp" name="NoTelp" required autocomplete="off" value="<?= $data['userProfile']['NoTelp']; ?>">
          </div>

          <input type="hidden" name="roleId" value="<?= $data['userProfile']['RoleId'] ?>">
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