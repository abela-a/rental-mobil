<?php
if (isset($_SESSION['Login'])) {
  header('Location:' . BASEURL . '/' . strtolower($_SESSION['Login']['Role']));
}
?>
<div id="login-register-img" style="background-image: url(<?= BASEURL ?>/img/assets/bg-login-register.jpg);">
  <div class="rgba-white-strong h-100">
    <div class="container">
      <div class="row justify-content-md-center no-gutters">
        <div class="col-md-5 mt-5 shadow-lg mb-0">

          <div class="card-image h-100" style="background-image: url(<?= BASEURL ?>/img/assets/card-login-register.jpg);">
            <div class="text-white text-center flex-center rgba-indigo-strong py-5 px-4">
              <div>
                <a class="text-white py-0" href="<?= BASEURL; ?>">
                  <img src="<?= BASEURL; ?>/img/assets/logo.png" width="40" height="40" class="d-inline-block align-top" alt="">
                  <span style="font-size:25px" class="font-weight-bold"><?= APP_NAME; ?></span>
                  <span style="font-size:18px" class="font-weight-thin"><?= APP_TYPE; ?></span>
                </a>
                <h1 class="mt-5">
                  MENGAPA
                  <br> MEMILIH
                  <br> KAMI ?
                </h1>
                <p class="mt-4 px-3">Kami adalah penyedia layanan sewa mobil di Makassar yang sudah berpengalaman dalam menyediakan mobil berkualitas dengan harga yang murah sejak tahun 2019.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-5 shadow-lg h-100">
          <!-- BODY -->
          <form action="<?= BASEURL; ?>/auth/signUp" method="post">

            <div class="grey lighten-5">

              <div class="py-4 px-5">
                <div class="py-3 px-3 text-center">
                  <span class="text-center h3 text-primary font-weight-medium">REGISTRATION PAGE</span>
                </div>
              </div>

              <div style="overflow-y: scroll; height:300px;" class="px-5">

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
                  <select class="browser-default custom-select" name="JenisKelamin" id="JenisKelamin">
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

              </div>

              <div class="px-5 pb-4">
                <button class="btn btn-primary btn-block my-5" type="submit">Daftar</button>
          </form>
          <small>
            Sudah punya akun?
            <a href="<?= BASEURL; ?>/auth/login" class="text-primary" style="font-weight:500">
              Login!
            </a>
          </small>
        </div>
      </div>
    </div>
  </div>
</div>
</div>