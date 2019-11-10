<?php

class Pelanggan extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database; //Membuat instance Database

    //Load model secara default
    $this->admin = $this->model('Admin_model');
    $this->user = $this->model('User_model');
    $this->count = $this->model('Count_model');
    $this->sopir = $this->model('Sopir_model');
    $this->karyawan = $this->model('Karyawan_model');
    $this->pelanggan = $this->model('Pelanggan_model');
    $this->transaksi = $this->model('Transaksi_model');
    $this->mobil = $this->model('Mobil_model');
  }

  public function index()
  {
    $data['judul'] = 'Riwayat Transaksi';
    $data['riwayatTransaksi'] = $this->transaksi->riwayatTransaksiByNIK($_SESSION['Login']['NIK']);

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('pelanggan/riwayat_transaksi', $data);
    $this->view('templates/footer');
  }

  public function userProfile()
  {
    $data['judul'] = 'Profile';

    $data['userProfile'] = $this->user->getUserProfileById($_SESSION['Login']['Id']);
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('pelanggan/editprofile', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function editProfile()
  {
    if ($this->user->editDataUser($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Profile berhasil diubah", "success");
      header('Location:' . BASEURL . '/karyawan/userprofile/' . $_SESSION['Login']['id']);
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Profile gagal diubah", "error");
      header('Location:' . BASEURL . '/karyawan/userprofile/' . $_SESSION['Login']['Id']);
      exit;
    }
  }
  public function daftarMobil()
  {
    $data['judul'] = 'Daftar Mobil';

    $data['url'] = $this->admin->parseURL();

    $data['mobil'] = $this->mobil->getAllMobil();

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('pelanggan/rentalmobil', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function daftarSopir()
  {
    $data['judul'] = 'Daftar Sopir';

    $data['url'] = $this->admin->parseURL();

    $data['sopir'] = $this->sopir->getAllSopir();

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('karyawan/sopir', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function daftarKaryawan()
  {
    $data['judul'] = 'Daftar Karyawan';

    $data['url'] = $this->admin->parseURL();

    $data['karyawan'] = $this->karyawan->getAllKaryawan();

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('admin/karyawan', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function daftarPelanggan()
  {
    $data['judul'] = 'Daftar Pelanggan';

    $data['url'] = $this->admin->parseURL();

    $data['pelanggan'] = $this->pelanggan->getAllPelanggan();
    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('karyawan/pelanggan', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
}
