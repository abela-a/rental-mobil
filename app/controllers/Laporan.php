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
  public function transaksi()
  {
    $data['judul'] = 'Laporan Transaksi';

    $data['laporanTransaksi'] = $this->laporan->getLaporanTransaksi();

    $this->view('templates/header', $data);
    $this->view('templates/navlaporan', $data);
    $this->view('laporan/head_laporan');
    $this->view('laporan/laporan_transaksi', $data);
    $this->view('templates/footer');
  }
  public function arsip_transaksi()
  {
    $data['judul'] = 'Laporan Arsip Transaksi';

    $data['laporanArsipTransaksi'] = $this->laporan->getLaporanArsipTransaksi();

    $this->view('templates/header', $data);
    $this->view('templates/navlaporan', $data);
    $this->view('laporan/head_laporan');
    $this->view('laporan/laporan_arsip_transaksi', $data);
    $this->view('templates/footer');
  }
  public function kendaraan()
  {
    $data['judul'] = 'Laporan Kendaraan';

    $data['laporanKendaraan'] = $this->laporan->getLaporanKendaraan();

    $this->view('templates/header', $data);
    $this->view('templates/navlaporan', $data);
    $this->view('laporan/head_laporan');
    $this->view('laporan/laporan_kendaraan', $data);
    $this->view('templates/footer');
  }
}
