<?php

class Transaksi_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllPengambilan()
  {
    $this->db->query('SELECT * FROM viewtransaksi ORDER BY NoTransaksi DESC');
    return $this->db->resultSet();
  }
  public function tambahDataPengambilan($data)
  {
    $query = 'INSERT INTO transaksi 
    (NoTransaksi, NIK, Id_Mobil, Tanggal_Pesan, Tanggal_Pinjam, Tanggal_Kembali_Rencana, LamaRental, Id_Sopir, Total_Bayar, StatusTransaksi) 
    VALUES(:NoTransaksi, :NIK, :Id_Mobil, :Tanggal_Pesan, :Tanggal_Pinjam, :Tanggal_Kembali_Rencana, :LamaRental, :Id_Sopir, :Total_Bayar, :StatusTransaksi)';

    $this->db->query($query);

    $this->db->bind('NoTransaksi', $data['NoTransaksi']);
    $this->db->bind('NIK', $data['Identitas']);
    $this->db->bind('Id_Mobil', $data['Mobil']);
    $this->db->bind('Tanggal_Pesan', $data['Tanggal_Pesan_submit']);
    $this->db->bind('Tanggal_Pinjam', $data['Tanggal_Pinjam_submit']);
    $this->db->bind('Tanggal_Kembali_Rencana', $data['Tanggal_Kembali_submit']);
    $this->db->bind('LamaRental', $data['LamaRental']);
    $this->db->bind('Id_Sopir', $data['Sopir']);
    $this->db->bind('Total_Bayar', $data['TotalBayar']);
    $this->db->bind('StatusTransaksi', "Proses");

    $this->db->execute();
    return $this->db->rowCount();
  }
}
