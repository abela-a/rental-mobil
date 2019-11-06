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
  public function countMobilKosong()
  {
    $this->db->query("SELECT * FROM mobil WHERE StatusRental = :StatusRental");
    $this->db->bind('StatusRental', 'Kosong');
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countMobilDipesan()
  {
    $this->db->query("SELECT * FROM mobil WHERE StatusRental = :StatusRental");
    $this->db->bind('StatusRental', 'Dipesan');
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countMobilJalan()
  {
    $this->db->query("SELECT * FROM mobil WHERE StatusRental = :StatusRental");
    $this->db->bind('StatusRental', 'Jalan');
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countSopir()
  {
    $this->db->query("SELECT * FROM sopir WHERE IdSopir != 'SPR000'");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countSopirFree()
  {
    $this->db->query("SELECT * FROM sopir WHERE StatusSopir = :StatusSopir AND IdSopir != 'SPR000'");
    $this->db->bind('StatusSopir', 'Free');
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countSopirBooked()
  {
    $this->db->query("SELECT * FROM sopir WHERE StatusSopir = :StatusSopir AND IdSopir != 'SPR000'");
    $this->db->bind('StatusSopir', 'Booked');
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countSopirBusy()
  {
    $this->db->query("SELECT * FROM sopir WHERE StatusSopir = :StatusSopir AND IdSopir != 'SPR000'");
    $this->db->bind('StatusSopir', 'Busy');
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
    $this->db->query("SELECT * FROM transaksi WHERE StatusTransaksi != 'Selesai' AND StatusTransaksi != 'Batal' ORDER BY NoTransaksi DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countTransaksi()
  {
    $this->db->query("SELECT * FROM transaksi WHERE StatusTransaksi = 'Selesai' ORDER BY NoTransaksi DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countProsesTransaksi()
  {
    $this->db->query("SELECT * FROM transaksi WHERE StatusTransaksi = 'Proses' ORDER BY NoTransaksi DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
}
