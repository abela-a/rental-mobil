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
}
