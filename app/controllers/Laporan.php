<?php
class Laporan extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database; //Membuat instance Database

    $this->laporan = $this->model('Laporan_model');
  }
  public function index()
  {
    $data['judul'] = 'Laporan';

    $this->view('templates/header', $data);
    $this->view('templates/navlaporan', $data);

    $this->view('laporan/index');
    $this->view('templates/footer');
  }
}
