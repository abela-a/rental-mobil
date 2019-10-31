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
    $this->transaksi = $this->model('Transaksi_model');
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
}
