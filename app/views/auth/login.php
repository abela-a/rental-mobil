<?php
if (isset($_SESSION['Login'])) {
  header('Location:' . BASEURL . '/' . strtolower($_SESSION['Login']['Role']));
}
?>
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
        <form action="<?= BASEURL; ?>/auth/SignIn" method="post">
          <div class="bg-back py-4 px-5">
            <p class="text-center h4 mb-4" style="font-weight:400">LOGIN PAGE</p>

            <?php Flasher::flash(); ?>

            <div class="form-group">
              <label for="NamaUser">Username/Email</label>
              <input class="form-control" type="email" name="NamaUser" id="NamaUser" autofocus required>
            </div>
            <div class="form-group">
              <label for="Password">Password</label>
              <input class="form-control" type="Password" name="Password" id="Password" required>
            </div>
            <div class="clearfix mb-4">
              <button class="btn btn-main float-right" type="submit">Login</button>
            </div>
            <h6>
              Belum punya akun?
              <a href="<?= BASEURL; ?>/auth/registration" class="text-main-dark" style="font-weight:500">
                Daftar Sekarang.
              </a>
            </h6>
          </div>
        </form>
        <!-- FOOTER -->
        <div class="bg-main p-3 text-center mb-5 bt-wow">
          <small class="">
            Copyright &copy; <b><?= APP_NAME . ' ' . APP_TYPE ?></b> <?= date('Y') ?>
          </small>
        </div>
      </div>
    </div>
  </div>
</div>