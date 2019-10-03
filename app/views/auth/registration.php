<div class="container">
  <div class="row justify-content-md-center">
    <div class="col-md-6 mt-5">
      <!-- HEAD -->
      <div class="shadow-sm">
        <div class="bg-main pt-3 px-3 pb-4 text-center">
          <a href="<?= BASEURL ?>" class="text-white">
            <span class="web-title"><?= APP_NAME; ?>
              <span class="web-subtitle"><?= APP_TYPE; ?></span>
            </span><br>
            <i style="font-size:15px" class="badge-success rounded p-1"><?= APP_TAGLINE; ?></i>
          </a>
        </div>
        <!-- BODY -->
        <form action="<?= BASEURL; ?>/auth/signUp" method="post">
          <div class="bg-back py-4 px-5">
            <p class="text-center h4 mb-4" style="font-weight:400">BUAT AKUN</p>

            <?php Flasher::flash(); ?>

            <input type="hidden" value="default.png" name="Foto">

            <div class="form-group">
              <label for="Nama">Nama Lengkap</label>
              <input class="form-control" type="text" name="Nama" id="Nama" autocomplete="off" autofocus required>
            </div>

            <div class="form-group">
              <label for="NIK">Nomor Induk Kependudukan</label>
              <input class="form-control" type="number" name="NIK" id="NIK" autocomplete="off" required>
            </div>

            <div class="form-group">
              <label for="NamaUser">Email</label>
              <input class="form-control" type="email" name="NamaUser" id="NamaUser" autocomplete="off" required>
            </div>

            <div class="form-group">
              <label for="Password">Password</label>
              <input class="form-control" type="Password" name="Password" id="Password" required>
            </div>

            <div class="form-group">
              <label for="Password2">Ulangi Password</label>
              <input class="form-control" type="Password" name="Password2" id="Password2" required>
            </div>

            <div class="form-group">
              <label for="JenisKelamin">Jenis Kelamin</label>
              <select class="custom-select" name="JenisKelamin" id="JenisKelamin">
                <option value="" selected>Pilih jenis Kelamin</option>
                <option value="L">Laki-laki</option>
                <option value="P">Perempuan</option>
              </select>
            </div>

            <div class="form-group">
              <label for="Alamat">Alamat</label>
              <textarea class="form-control" type="number" name="Alamat" id="Alamat" autocomplete="off"></textarea>
            </div>

            <div class="form-group">
              <label for="NoTelp">No Telepon</label>
              <input class="form-control telp" type="text" name="NoTelp" id="NoTelp" autocomplete="off" required>
            </div>

            <div class="clearfix mb-4">
              <button class="btn btn-main float-right" type="submit">SignUp</button>
            </div>
            <h6>
              Sudah punya akun?
              <a href="<?= BASEURL; ?>/auth/login" class="text-main-dark" style="font-weight:500">
                Login!
              </a>
            </h6>
          </div>
        </form>
        <!-- FOOTER -->
        <div class="bg-main p-3 text-center mb-5 bt-wow">
          <small class="">Copyright &copy; <b><?= APP_NAME . ' ' . APP_TYPE ?></b> <?= date('Y') ?></small>
        </div>
      </div>
    </div>
  </div>
</div>