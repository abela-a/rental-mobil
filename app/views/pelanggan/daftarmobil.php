<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
      </button>
    </div>
  </div>
  <div class="pt-2">
    <div class="row">
      <?php foreach ($data['mobil'] as $mobil) : ?>
        <div class="col-sm-4 py-2 mb-3">
          <div class="card shadow-sm h-100 <?php if ($mobil['StatusRental'] == "Jalan" || $mobil['StatusRental'] == "Dipesan"){ echo "border-danger"; }?>">
            <div class="card-body">
              <img class=" p-4 w-100" src="<?= BASEURL ?>/img/fotomobil/<?= $mobil['FotoMobil']; ?>">
            </div>
            <ul class="list-group list-group-flush">
              <li class="list-group-item">
                <h5 class="font-weight-bold text-center <?php if ($mobil['StatusRental'] == "Jalan" || $mobil['StatusRental'] == "Dipesan"){ echo "text-danger"; }?>"><?= $mobil['NmMerk'] . ' ' . $mobil['NmType'] ?></h5>
              </li>
              <li class="list-group-item">
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
              </li>
              <li class="list-group-item">
                Rp <span class="uang">
                  <?= $mobil['HargaSewa']; ?>
                </span> ,- / Hari</li>
            </ul>
            <div class="card-footer pr-4 pl-3">
              <?php if ($mobil['StatusRental'] == "Jalan" || $mobil['StatusRental'] == "Dipesan") : ?>
                <button class="card-link btn btn-danger shadow-none btn-block tombol-reservasi"><?= $mobil['StatusRental'] ?></button>
              <?php else : ?>
                <a href="<?= BASEURL ?>/pelanggan/rentalmobil/<?= $mobil['id'] ?>" class="card-link btn btn-primary shadow-none btn-block tombol-reservasi">Pesan Sekarang</a>
              <?php endif; ?>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>