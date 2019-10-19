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
                  SELAMAT
                  <br> DATANG
                  <br> KEMBALI
                </h1>
                <p class="mt-4 px-3">Kami selalu berkomitmen untuk memberikan pelayanan terbaik dengan mobil yang terawat dan sopir yang kompeten.</p>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5 mt-5 shadow-lg h-100">
          <!-- BODY -->
          <form action="<?= BASEURL; ?>/auth/SignIn" method="post">
            <div class="grey lighten-5 py-4 px-5">

              <div class="pb-5 pt-3 px-3 text-center">
                <span class="text-center h3 text-primary font-weight-medium">LOGIN PAGE</span>
              </div>

              <div class="form-group">
                <label for="NamaUser">Username/Email</label>
                <input class="form-control" type="email" name="NamaUser" id="NamaUser" autofocus required>
              </div>
              <div class="form-group">
                <label for="Password">Password</label>
                <div class="input-group" id="showhidepass">
                  <input class="form-control" type="Password" name="Password" id="Password" required>
                  <div class="input-group-append">
                    <div class="input-group-text">
                      <a href="#"><i class="fa fa-fw fa-eye" aria-hidden="true"></i></a>
                    </div>
                  </div>
                </div>
              </div>
              <button class="btn btn-primary btn-block my-5" type="submit">Login</button>
          </form>
          <small>
            Belum punya akun?
            <a href="<?= BASEURL; ?>/auth/registration" class="text-primary" style="font-weight:500">
              Daftar Sekarang.
            </a>
          </small>
        </div>
      </div>
    </div>
  </div>
</div>