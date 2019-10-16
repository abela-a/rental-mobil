<?php

class Admin extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database; //Membuat instance Database

    //Load model secara default
    $this->admin = $this->model('Admin_model');
    $this->karyawan = $this->model('Karyawan_model');
    $this->merk = $this->model('Merk_model');
    $this->type = $this->model('Type_model');
    $this->mobil = $this->model('Mobil_model');
    $this->pelanggan = $this->model('Pelanggan_model');
    $this->sopir = $this->model('Sopir_model');
    $this->user = $this->model('User_model');
  }

  //Untuk menampilkan dashboard pada Admin
  public function index($id = "")
  {
    $data['judul'] = 'Dashboard';

    $data['UserUn'] = $this->admin->getUserUnactive();
    $data['JmlKaryawan'] = $this->admin->countKaryawan();
    $data['JmlPelanggan'] = $this->admin->countPelanggan();
    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['JmlMobil'] = $this->admin->countMobil();
    $data['MobilKosong'] = $this->admin->mobilKosong();
    $data['url'] = $this->admin->parseURL();

    $data['userProfile'] = $this->user->getUserProfileById($id);

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/dashboard', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }

  //Metode Merk
  public function merk()
  {
    $data['judul'] = 'Merk';

    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $data['merk'] = $this->merk->getAllMerk();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/merk', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }

  public function tambahMerk()
  {
    if ($this->merk->tambahDataMerk($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Merk baru telah ditambahkan!', 'success');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk baru gagal ditambahkan!', 'error');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    }
  }
  public function hapusMerk($KdMerk)
  {
    if ($this->merk->hapusDataMerk($KdMerk) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Merk berhasil dihapus!', 'success');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    }
  }
  public function editMerk()
  {
    if ($this->merk->editDataMerk($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Merk berhasil diubah!', 'success');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    }
  }

  //Metode Type
  public function type()
  {
    $data['judul'] = 'Tipe';

    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $data['type'] = $this->type->getAllType();

    $data['merkOption'] = $this->mobil->getMerkOption();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/type', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahType()
  {
    if ($this->type->tambahDataType($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Tipe baru telah ditambahkan!', 'success');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk baru gagal ditambahkan!', 'error');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    }
  }
  public function hapusType($IdType)
  {
    if ($this->type->hapusDataType($IdType) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Tipe berhasil dihapus!', 'success');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Tipe gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    }
  }
  public function editType()
  {
    if ($this->type->editDataType($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Tipe berhasil diubah!', 'success');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Tipe gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    }
  }

  //Metode Mobil
  public function mobil()
  {
    $data['judul'] = 'Mobil';

    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $data['mobil'] = $this->mobil->getAllMobil();
    $data['merkOption'] = $this->mobil->getMerkOption();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/mobil', $data);
    $this->view('templates/footer');
    $this->view('templates/footerdashboard');
  }
  public function getType($KdMerk = '')
  {
    $data['typeOption'] = $this->mobil->getTypeOption($KdMerk);
    $this->view('karyawan/getType', $data);
  }
  public function tambahMobil()
  {
    if ($this->mobil->tambahDataMobil($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Mobil baru telah ditambahkan!', 'success');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Mobil baru gagal ditambahkan!', 'error');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    }
  }
  public function hapusMobil($id)
  {
    if ($this->mobil->hapusDataMobil($id) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Data mobil berhasil dihapus', 'success');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Data mobil gagal dihapus', 'error');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    }
  }
  public function editMobil()
  {
    if ($this->mobil->editDataMobil($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Data mobil berhasil diubah', 'success');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Data mobil gagal dihapus', 'error');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    }
  }

  //Metode Karyawan
  public function karyawan()
  {
    $data['judul'] = 'Karyawan';

    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $data['karyawan'] = $this->karyawan->getAllKaryawan();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('admin/karyawan', $data);
    $this->view('templates/footer');
  }
  public function tambahKaryawan()
  {
    if ($this->karyawan->tambahDataKaryawan($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    }
  }
  public function editKaryawan()
  {
    if ($this->karyawan->editDataKaryawan($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    }
  }
  public function hapusKaryawan($id)
  {
    if ($this->karyawan->hapusDataKaryawan($id) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    }
  }

  //Metode Pelanggan
  public function pelanggan()
  {
    $data['judul'] = 'Pelanggan';

    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $data['pelanggan'] = $this->pelanggan->getAllPelanggan();
    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/pelanggan', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahPelanggan()
  {
    if ($this->pelanggan->tambahDataPelanggan($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Pelanggan baru berhasil ditambahkan!", "success");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Pelanggan baru gagal ditambahkan", "error");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    }
  }
  public function editPelanggan()
  {
    if ($this->pelanggan->editDataPelanggan($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Data pelanggan berhasil diubah", "success");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Data pelanggan gagal diubah", "error");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    }
  }
  public function hapusPelanggan($id)
  {
    if ($this->pelanggan->hapusDataPelanggan($id) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Pelanggan berhasil dihapus", "success");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Pelanggan gagal dihapus", "error");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    }
  }

  //Metode Sopir
  public function sopir()
  {
    $this->db->query('SELECT * FROM sopir ORDER BY IdSopir DESC LIMIT 1');
    $latest = $this->db->single();

    $data['autoIdSopir'] = $this->admin->autonumber($latest['IdSopir'], 3, 3);

    $data['judul'] = 'Sopir';

    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $data['sopir'] = $this->sopir->getAllSopir();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/sopir', $data);
    $this->view('templates/footer');
  }
  public function tambahSopir()
  {
    if ($this->sopir->tambahDataSopir($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    }
  }
  public function hapusSopir($id)
  {
    if ($this->sopir->hapusDataSopir($id) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    }
  }
  public function editSopir()
  {
    if ($this->sopir->editDataSopir($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    }
  }

  //Metode User Belum Aktif
  public function pending()
  {
    $data['judul'] = 'Akun Pending';

    $data['pending'] = $this->admin->getUserUnactive();
    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('admin/pendinguser', $data);
    $this->view('templates/footer');
  }
  public function konfirmasiUser()
  {
    if ($this->admin->accUser($_POST) > 0) {
      Flasher::setFlash('User berhasil diaktivasi', 'success');
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    } else {
      Flasher::setFlash('Tidak ada perubahan', 'danger');
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    }
  }
  public function hapusPending($id)
  {
    if ($this->admin->delUser($id) > 0) {
      Flasher::setFlash('User berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    } else {
      Flasher::setFlash('User gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    }
  }

  //Metode Role
  public function role()
  {
    $data['judul'] = 'Role';

    $data['role'] = $this->admin->getUserRole();
    $data['roleOption'] = $this->admin->getRoleOption();
    $data['JmlPending'] = $this->admin->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('admin/role', $data);
    $this->view('templates/footer');
  }
  public function updaterole()
  {
    if ($this->admin->UpdateRole($_POST) > 0) {
      Flasher::setFlash('Role berhasil diubah', 'success');
      header('Location:' . BASEURL . '/admin/role');
      exit;
    } else {
      Flasher::setFlash('Tidak ada perubahan', 'danger');
      header('Location:' . BASEURL . '/admin/role');
      exit;
    }
  }
  public function userProfile($id)
  {
    $data['judul'] = 'Profile';

    $data['userProfile'] = $this->user->getUserProfileById($id);
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('pelanggan/editprofile', $data);
    $this->view('templates/footer');
  }
  public function editProfile()
  {
    if ($this->user->editDataUser($_POST) > 0) {
      Flasher::setFlash('Profile berhasil diubah', 'success');
      header('Location:' . BASEURL . '/admin');
      exit;
    } else {
      Flasher::setFlash('Profile gagal ubah', 'danger');
      header('Location:' . BASEURL . '/admin');
      exit;
    }
  }
}
