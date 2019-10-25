<?php

class Transaksi_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllPemesanan()
  {
    $this->db->query('SELECT * FROM viewtransaksi WHERE StatusTransaksi != "Selesai" ORDER BY NoTransaksi DESC');
    return $this->db->resultSet();
  }
  public function tambahDataPemesanan($data)
  {
    // MOBIL
    $updateMobil = "UPDATE mobil SET 
              StatusRental = :StatusRental
              WHERE id = :id";
    $this->db->query($updateMobil);
    $this->db->bind('StatusRental', 'Dipesan');
    $this->db->bind('id', $data['Mobil']);
    $this->db->execute();

    // SOPIR
    $updateSopir = "UPDATE sopir SET 
              StatusSopir = :StatusSopir
              WHERE IdSopir = :id";
    $this->db->query($updateSopir);
    $this->db->bind('StatusSopir', 'Booked');
    $this->db->bind('id', $data['Sopir']);
    $this->db->execute();

    // TRANSAKSI
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
  public function konfirmasiAmbilMobil($data)
  {
    // MOBIL
    $statusMobil = "UPDATE mobil SET 
              StatusRental = :StatusRental
              WHERE id = :id";
    $this->db->query($statusMobil);
    $this->db->bind('StatusRental', 'Jalan');
    $this->db->bind('id', $data['statusMobil']);
    $this->db->execute();

    // SOPIR
    $statusSopir = "UPDATE sopir SET 
              StatusSopir = :StatusSopir
              WHERE IdSopir = :id";
    $this->db->query($statusSopir);
    $this->db->bind('StatusSopir', 'Busy');
    $this->db->bind('id', $data['statusSopir']);
    $this->db->execute();

    // TRANSAKSI
    $statusTransaksi = "UPDATE transaksi SET 
              StatusTransaksi = :StatusTransaksi
              WHERE NoTransaksi = :id";
    $this->db->query($statusTransaksi);
    $this->db->bind('StatusTransaksi', 'Mulai');
    $this->db->bind('id', $data['statusTransaksi']);
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function batalkanPesananMobil($data)
  {
    // MOBIL
    $statusMobil = "UPDATE mobil SET 
              StatusRental = :StatusRental
              WHERE id = :id";
    $this->db->query($statusMobil);
    $this->db->bind('StatusRental', 'Kosong');
    $this->db->bind('id', $data['statusMobil']);
    $this->db->execute();

    // SOPIR
    $statusSopir = "UPDATE sopir SET 
              StatusSopir = :StatusSopir
              WHERE IdSopir = :id";
    $this->db->query($statusSopir);
    $this->db->bind('StatusSopir', 'Free');
    $this->db->bind('id', $data['statusSopir']);
    $this->db->execute();

    $query = 'DELETE FROM transaksi WHERE NoTransaksi = :NoTransaksi';
    $this->db->query($query);
    $this->db->bind('NoTransaksi', $data['noBatalTransaksi']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function pesananMobilSelesai($data)
  {
    $BBM = preg_replace('/\D/', '', $data['BiayaBBM']);
    $Kerusakan = preg_replace('/\D/', '', $data['BiayaKerusakan']);
    $Denda = preg_replace('/\D/', '', $data['Denda']);
    $Total = preg_replace('/\D/', '', $data['TotalBayar_selesai']);
    $Bayar = preg_replace('/\D/', '', $data['JumlahBayar']);
    $Kembalian = preg_replace('/\D/', '', $data['Kembalian']);

    // MOBIL
    $updateMobil = "UPDATE mobil SET 
              StatusRental = :StatusRental
              WHERE id = :id";
    $this->db->query($updateMobil);
    $this->db->bind('StatusRental', 'Kosong');
    $this->db->bind('id', $data['Mobil']);
    $this->db->execute();

    // SOPIR
    $updateSopir = "UPDATE sopir SET 
              StatusSopir = :StatusSopir
              WHERE IdSopir = :id";
    $this->db->query($updateSopir);
    $this->db->bind('StatusSopir', 'Free');
    $this->db->bind('id', $data['Sopir']);
    $this->db->execute();

    // TRANSAKSI
    $RentalSelesai = "UPDATE transaksi SET
                      Tanggal_Kembali_Sebenarnya = :Sebenarnya,
                      LamaDenda = :LamaDenda,
                      Kerusakan  = :Kerusakan,
                      BiayaBBM = :BBM,
                      BiayaKerusakan = :Rusak,
                      Denda = :Denda,
                      Total_Bayar = :Total,
                      Jumlah_Bayar = :Bayar,
                      Kembalian = :Kembalian,
                      StatusTransaksi = :StatusTransaksi
                      WHERE NoTransaksi = :NoTransaksi";
    $this->db->query($RentalSelesai);

    $this->db->bind('Sebenarnya', date('Y-m-d'));
    $this->db->bind('LamaDenda', $data['JatuhTempo']);
    $this->db->bind('Kerusakan', $data['Kerusakan']);
    $this->db->bind('BBM', $BBM);
    $this->db->bind('Rusak', $Kerusakan);
    $this->db->bind('Denda', $Denda);
    $this->db->bind('Total', $Total);
    $this->db->bind('Bayar', $Bayar);
    $this->db->bind('Kembalian', $Kembalian);
    $this->db->bind('StatusTransaksi', 'Selesai');
    $this->db->bind('NoTransaksi', $data['NoTransaksi_selesai']);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
