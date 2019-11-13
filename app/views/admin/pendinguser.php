<div class="container" id="main-menu">
  <div class="row mb-4">
    <div class="col-md clear-fix">
      <button class="btn mb-3 shadow-none float-right" type="button" data-toggle="modal" data-target="#inputUser">
      </button>
    </div>
  </div>
  <div class="bg-white shadow-sm rounded pt-5 pb-4 px-5">
    <table class="table table-hover" id="tolong">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col" class="text-center">NIK</th>
          <th scope="col" class="text-center">Nama</th>
          <th scope="col" class="text-center">Role</th>
          <th scope="col" class="text-center">Status Akun</th>
          <th scope="col" class="text-center">Aksi</th>
        </tr>
      </thead>
      <tbody>
        <?php
        // TAMPILKAN BARIS
        $no = 1;
        foreach ($data['pending'] as $user) : ?>
          <tr>
            <form action="<?= BASEURL ?>/admin/konfirmasiUser" method="post">
              <td><?= $no++ ?></td>
              <td><?= ucfirst($user['NIK']); ?></td>
              <td><?= ucfirst($user['Nama']); ?></td>
              <td>
                <!-- Role -->
                <select class="browser-default custom-select" name="RoleId" id="RoleId">
                  <option value="2">Karyawan</option>
                  <option value="3" selected>Pelanggan</option>
                </select>
              </td>
              <td>
                <!-- Active -->
                <select class="browser-default custom-select" name="IsActive" id="IsActive">
                  <option value="1">Aktif</option>
                  <option value="0" selected>Tidak Aktif</option>
                </select>
              </td>
              <td class="text-center" style="width:240px">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">

                <a data-toggle="modal" title="Detail" data-target="#detail<?= $user['id']; ?>" class="btn btn-sm btn-info text-white shadow-none" title="Detail"><i class="fas fa-fw fa-user"></i></a>

                <button class="btn btn-sm btn-success text-white shadow-none" type="submit" title="Konfirmasi">
                  <i class=" fa fa-check" aria-hidden="true"></i>
                </button>
                <a href="<?= BASEURL ?>/admin/hapusPending/<?= $user['id'] ?>" class="btn btn-sm btn-danger shadow-none tombol-hapus" title="Hapus">
                  <i class="fas fa-fw fa-trash"></i>
                </a>
              </td>
            </form>
          </tr>

          <!-- MODAL DETAIL -->
          <div class="modal fade right" id="detail<?= $user['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">

            <div class="modal-dialog modal-full-height modal-right" role="document">

              <div class="modal-content">

                <div class="modal-header text-center text-primary">
                  <h4 class="modal-title w-100 h5" id="myModalLabel">DETAIL PELANGGAN BARU</h4>
                </div>

                <div class="modal-body px-5 grey lighten-5">

                  <ul class="list-group list-group-flush">

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nomor Induk Kependudukan</div>
                      <div class="col" style="font-weight:500"><?= $user['NIK'] ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Nama Pelanggan Baru</div>
                      <div class="col" style="font-weight:500"><?= $user['Nama']; ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Username</div>
                      <div class="col" style="font-weight:500"><?= $user['NamaUser']; ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Jenis Kelamin</div>
                      <div class="col" style="font-weight:500">
                        <?php if ($user['JenisKelamin'] == 'L') {
                            echo 'Laki-laki';
                          } else {
                            echo 'Perempuan';
                          } ?>
                      </div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">No Telepon</div>
                      <div class="col telp" style="font-weight:500"><?= $user['NoTelp']; ?></div>
                    </div>

                    <div class="row list-group-item grey lighten-5">
                      <div class="col">Alamat</div>
                      <div class="col" style="font-weight:500"><?= $user['Alamat']; ?></div>
                    </div>
                  </ul>
                </div>
              </div>
            </div>
          </div>
          <!-- AKHIR MODAL DETAIL -->
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>