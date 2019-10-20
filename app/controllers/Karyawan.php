<?php

class Karyawan extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database; //Membuat instance Database

    //Load model secara default
    $this->admin = $this->model('Admin_model');
    $this->merk = $this->model('Merk_model');
    $this->type = $this->model('Type_model');
    $this->mobil = $this->model('Mobil_model');
    $this->pelanggan = $this->model('Pelanggan_model');
    $this->sopir = $this->model('Sopir_model');
    $this->user = $this->model('User_model');
  }
  public function index()
  {
    $data['judul'] = 'Dashboard';

    $data['JmlMobil'] = $this->admin->countMobil();
    $data['MobilKosong'] = $this->admin->mobilKosong();
    $data['JmlPelanggan'] = $this->admin->countPelanggan();

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('karyawan/dashboard', $data);
    $this->view('templates/footer');
  }
  //MERK
  public function merk()
  {
    $data['judul'] = 'Merk';

    $data['merk'] = $this->merk->getAllMerk();

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('karyawan/merk', $data);
    $this->view('templates/footer');
  }

  public function tambahMerk()
  {
    if ($this->merk->tambahDataMerk($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/karyawan/merk');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/karyawan/merk');
      exit;
    }
  }
  public function hapusMerk($KdMerk)
  {
    if ($this->merk->hapusDataMerk($KdMerk) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/karyawan/merk');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/karyawan/merk');
      exit;
    }
  }
  public function editMerk()
  {
    if ($this->merk->editDataMerk($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/karyawan/merk');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/karyawan/merk');
      exit;
    }
  }
  //TIPE
  public function type()
  {
    $data['judul'] = 'Tipe';

    $data['type'] = $this->type->getAllType();

    $data['merkOption'] = $this->mobil->getMerkOption();

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('karyawan/type', $data);
    $this->view('templates/footer');
  }
  public function tambahType()
  {
    if ($this->type->tambahDataType($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/karyawan/type');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/karyawan/type');
      exit;
    }
  }
  public function hapusType($IdType)
  {
    if ($this->type->hapusDataType($IdType) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/karyawan/type');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/karyawan/type');
      exit;
    }
  }
  public function editType()
  {
    if ($this->type->editDataType($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/karyawan/type');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/karyawan/type');
      exit;
    }
  }

  //MOBIL
  public function mobil()
  {
    $data['judul'] = 'Mobil';

    $data['JmlPending'] = $this->admin->countUserUnactive();

    $data['mobil'] = $this->mobil->getAllMobil();
    $data['merkOption'] = $this->mobil->getMerkOption();

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('karyawan/mobil', $data);
    $this->view('templates/footer');
  }
  public function getType($KdMerk = '')
  {
    $data['typeOption'] = $this->mobil->getTypeOption($KdMerk);
    $this->view('get/getType', $data);
  }
  public function tambahMobil()
  {
    $this->mobil->uploadGambarMobil();
    if ($this->mobil->tambahDataMobil($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/karyawan/mobil');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/karyawan/mobil');
      exit;
    }
  }
  public function hapusMobil($id)
  {
    if ($this->mobil->hapusDataMobil($id) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/karyawan/mobil');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/karyawan/mobil');
      exit;
    }
  }
  public function editMobil()
  {
    if ($this->mobil->editDataMobil($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/karyawan/mobil');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/karyawan/mobil');
      exit;
    }
  }
  // PELANGGAN
  public function pelanggan()
  {
    $data['judul'] = 'Pelanggan';

    $data['pelanggan'] = $this->pelanggan->getAllPelanggan();

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('karyawan/pelanggan', $data);
    $this->view('templates/footer');
  }
  public function tambahPelanggan()
  {
    if ($this->pelanggan->tambahDataPelanggan($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/karyawan/pelanggan');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/karyawan/pelanggan');
      exit;
    }
  }
  public function editPelanggan()
  {
    if ($this->pelanggan->editDataPelanggan($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/karyawan/pelanggan');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/karyawan/pelanggan');
      exit;
    }
  }
  public function hapusPelanggan($id)
  {
    if ($this->pelanggan->hapusDataPelanggan($id) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/karyawan/pelanggan');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/karyawan/pelanggan');
      exit;
    }
  }
  // SOPIR
  public function sopir()
  {
    $this->db->query('SELECT * FROM sopir ORDER BY IdSopir DESC LIMIT 1');
    $latest = $this->db->single();

    $data['autoIdSopir'] = $this->admin->autonumber($latest['IdSopir'], 3, 3);

    $data['judul'] = 'Sopir';

    $data['sopir'] = $this->sopir->getAllSopir();

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('karyawan/sopir', $data);
    $this->view('templates/footer');
  }
  public function tambahSopir()
  {
    if ($this->sopir->tambahDataSopir($_POST) > 0) {
      Flasher::setFlash('Data berhasil ditambahkan', 'info');
      header('Location:' . BASEURL . '/karyawan/sopir');
      exit;
    } else {
      Flasher::setFlash('Data gagal ditambahkan', 'danger');
      header('Location:' . BASEURL . '/karyawan/sopir');
      exit;
    }
  }
  public function hapusSopir($id)
  {
    if ($this->sopir->hapusDataSopir($id) > 0) {
      Flasher::setFlash('Data berhasil dihapus', 'warning');
      header('Location:' . BASEURL . '/karyawan/sopir');
      exit;
    } else {
      Flasher::setFlash('Data gagal dihapus', 'danger');
      header('Location:' . BASEURL . '/karyawan/sopir');
      exit;
    }
  }
  public function editSopir()
  {
    if ($this->sopir->editDataSopir($_POST) > 0) {
      Flasher::setFlash('Data berhasil diubah', 'success');
      header('Location:' . BASEURL . '/karyawan/sopir');
      exit;
    } else {
      Flasher::setFlash('Data gagal ubah', 'danger');
      header('Location:' . BASEURL . '/karyawan/sopir');
      exit;
    }
  }
  public function userProfile($id)
  {
    $data['judul'] = 'Profile';

    $data['userProfile'] = $this->user->getUserProfileById($id);

    $this->view('templates/header', $data);
    $this->view('templates/navkaryawan', $data);
    $this->view('pelanggan/editprofile', $data);
    $this->view('templates/footer');
  }
  public function editProfile()
  {
    if ($this->user->editDataUser($_POST) > 0) {
      Flasher::setFlash('Profile berhasil diubah', 'success');
      header('Location:' . BASEURL . '/karyawan/userProfile/' . $_SESSION['Login']['Id']);
      exit;
    } else {
      Flasher::setFlash('Profile gagal ubah', 'danger');
      header('Location:' . BASEURL . '/karyawan/userProfile/' . $_SESSION['Login']['Id']);
      exit;
    }
  }
}
