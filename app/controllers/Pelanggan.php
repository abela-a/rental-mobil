<?php

class Pelanggan extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database; //Membuat instance Database

    //Load model secara default
    $this->user = $this->model('User_model');
  }

  public function index()
  {
    $data['judul'] = 'Transaksi';

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('pelanggan/riwayat_transaksi', $data);
    $this->view('templates/footer');
  }
  public function userProfile($id)
  {
    $data['judul'] = 'Profile';

    $data['userProfile'] = $this->user->getUserProfileById($id);

    $this->view('templates/header', $data);
    $this->view('templates/navpelanggan', $data);
    $this->view('pelanggan/editprofile', $data);
    $this->view('templates/footer');
  }
  public function editProfile()
  {
    if ($this->user->editDataUser($_POST) > 0) {
      Flasher::setFlash('Profile berhasil diubah', 'success');
      header('Location:' . BASEURL . '/pelanggan/userProfile/' . $_SESSION['Login']['Id']);
      exit;
    } else {
      Flasher::setFlash('Profile gagal ubah', 'danger');
      header('Location:' . BASEURL . '/pelanggan/userProfile/' . $_SESSION['Login']['Id']);
      exit;
    }
  }
}
