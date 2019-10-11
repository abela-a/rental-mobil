<?php

class Home extends Controller
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
    $data['judul'] = APP_NAME . ' ' . APP_TYPE;
    $this->view('templates/header', $data);
    $this->view('templates/navhome');
    $this->view('home/index');
    $this->view('templates/footerhome');
    $this->view('templates/footer');
  }
  public function UbahFotoUser()
  {
    if ($this->user->uploadFotoUser($_POST) > 0) {
      Flasher::setFlash('Foto berhasil diperbaharui', 'success');
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id']);
      exit;
    } else {
      Flasher::setFlash('Foto gagal diperbaharui', 'danger');
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id']);
      exit;
    }
  }
}
