<!-- TOMBOL -->
<div class="row">
  <div class="col-md-6">
    <?php Flasher::flash(); ?>
  </div>
</div>

<!-- TABLE -->
<table class="table table-hover table-bordered" id="tolong">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col" class="text-center">NIK</th>
      <th scope="col" class="text-center">Nama</th>
      <th scope="col" class="text-center">Role</th>
      <th scope="col" class="text-center">Aksi</th>
    </tr>
  </thead>
  <tbody>
    <?php
    // TAMPILKAN BARIS
    $no = 1;
    foreach ($data['role'] as $user) : ?>
      <tr>
        <form action="<?= BASEURL ?>/admin/updaterole" method="post">
          <td><?= $no++ ?></td>
          <td><?= ucfirst($user['NIK']); ?></td>
          <td><?= ucfirst($user['Nama']); ?></td>
          <td>
            <!-- Role -->
            <select class="custom-select" name="RoleId" id="RoleId">
              <?php foreach ($data['roleOption'] as $roleOption) : ?>
                <option value="<?= $roleOption['id'] ?>" <?php if ($roleOption['id'] == $user['RoleId']) echo "selected"; ?>>
                  <?= $roleOption['role'] ?>
                </option>
              <?php endforeach; ?>
            </select>
          </td>
          <td class="text-center">
            <input type="hidden" name="id" value="<?= $user['id'] ?>">
            <button class="btn btn-success text-white" type="submit" title="Update Role">
              <i class=" fa fa-check" aria-hidden="true"></i>
            </button>
          </td>
        </form>
      </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<!-- AKHIR TABLE -->
</div>
</div>
</div>