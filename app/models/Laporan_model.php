<?php

class Laporan_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getLaporanTransaksi()
  {
    $this->db->query('SELECT * FROM viewtransaksi WHERE Arsip = 0 AND StatusTransaksi != "Proses" AND StatusTransaksi != "Mulai" ORDER BY NoTransaksi DESC');
    return $this->db->resultSet();
  }
  public function getLaporanArsipTransaksi()
  {
    $this->db->query('SELECT * FROM viewtransaksi WHERE Arsip = 1 ORDER BY NoTransaksi DESC');
    return $this->db->resultSet();
  }
  public function getLaporanKendaraan()
  {
    $this->db->query("SELECT * FROM viewMobil ORDER BY id DESC");
    return $this->db->resultSet();
  }
  public function getLaporanSopir()
  {
    $this->db->query("SELECT * FROM sopir WHERE IdSopir != 'SPR000' ORDER BY id DESC");
    return $this->db->resultSet();
  }
  public function getLaporanKaryawan()
  {
    $this->db->query('SELECT * FROM users WHERE roleId = 2 AND IsActive = 1 ORDER BY id DESC');
    return $this->db->resultSet();
  }
  public function getLaporanPelanggan()
  {
    $this->db->query("SELECT * FROM users WHERE roleId = 3 AND IsActive = 1 ORDER BY id DESC");
    return $this->db->resultSet();
  }
  public function getLaporanKwitansiById($NoTransaksi)
  {
    $this->db->query("SELECT * FROM viewtransaksi WHERE NoTransaksi = :NoTransaksi");
    $this->db->bind('NoTransaksi', $NoTransaksi);
    return $this->db->single();
  }
}
