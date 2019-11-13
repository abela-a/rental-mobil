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
                <select class="browser-default custom-select" name="RoleId" id="RoleId">
                  <?php foreach ($data['roleOption'] as $roleOption) : ?>
                    <option value="<?= $roleOption['id'] ?>" <?php if ($roleOption['id'] == $user['RoleId']) echo "selected"; ?>>
                      <?= $roleOption['role'] ?>
                    </option>
                  <?php endforeach; ?>
                </select>
              </td>
              <td class="text-center" style="width:100px">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <button class="btn btn-sm btn-success text-white shadow-none" type="submit" title="Update Role">
                  <i class=" fa fa-check" aria-hidden="true"></i>
                </button>
              </td>
            </form>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
</div>