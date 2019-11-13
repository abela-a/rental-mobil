<div class="container">
  <div class="jumbotron mt-3 shadow-none rounded-lg text-center">
    <h1 class="display-4 mb-4">LAPORAN</h1>
    <?php if ($_SESSION['Login']['RoleId'] == 1 || $_SESSION['Login']['RoleId'] == 2) : ?>
      <p class="lead">
        Silahkan pilih menu di navbar untuk melihat laporan tiap-tiap item.
        <br>
        Anda dapat mencetak laporan dengan cara menekan tombol <span class="badge badge-light shadow-none">CTRL + P</span> pada keyboard Anda.
      </p>
      <hr class="my-2 w-75">
      <p class="lead">
        Untuk dapat mencetak kwitansi setiap transaksi, Anda dapat ke <b>Nav Transaksi</b> <br>
        dan menekan tombol cetak<a class="btn btn-info btn-sm shadow-none" href="#">
          <i class="fa fa-print fa-fw" aria-hidden="true"></i>
        </a>, kemudian Anda akan diarahkan ke halaman Kwitansi.
      </p>
    <?php else : ?>
      <p class="lead">
        Untuk dapat mencetak kwitansi setiap transaksi, Anda dapat ke <b>Nav Riwayat Transaksi</b> <br>
        dan menekan tombol cetak<a class="btn btn-info btn-sm shadow-none" href="#">
          <i class="fa fa-print fa-fw" aria-hidden="true"></i>
        </a>, kemudian Anda akan diarahkan ke halaman Kwitansi.
      </p>
    <?php endif; ?>
  </div>
</div>