<?php

class Count_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function countMobil()
  {
    $this->db->query("SELECT * FROM mobil");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countSopir()
  {
    $this->db->query("SELECT * FROM sopir WHERE IdSopir != 'SPR000'");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countKaryawan()
  {
    $this->db->query("SELECT * FROM users WHERE RoleId = 2 AND IsActive = 1");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countPelanggan()
  {
    $this->db->query("SELECT * FROM users WHERE RoleId = 3 AND IsActive = 1");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countUserUnactive()
  {
    $this->db->query("SELECT * FROM users WHERE IsActive = 0 ORDER BY id DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countPeminjaman()
  {
    $this->db->query("SELECT * FROM transaksi WHERE StatusTransaksi != 'Selesai' ORDER BY NoTransaksi DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countTransaksi()
  {
    $this->db->query("SELECT * FROM transaksi WHERE StatusTransaksi = 'Selesai' ORDER BY NoTransaksi DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
}
