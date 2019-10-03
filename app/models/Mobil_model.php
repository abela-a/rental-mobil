<?php

class Mobil_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllMobil()
  {
    $this->db->query("SELECT * FROM viewMobil ORDER BY id DESC");
    return $this->db->resultSet();
  }
  public function getMerkOption()
  {
    $this->db->query("SELECT DISTINCT * FROM merk");
    return $this->db->resultSet();
  }
  public function getTypeOption($KdMerk)
  {
    $this->db->query("SELECT DISTINCT * FROM type WHERE KdMerk = :KdMerk");
    $this->db->bind('KdMerk', $KdMerk);
    return $this->db->resultSet();
  }
  public function uploadGambarMobil()
  {
    $namaFile = $_FILES['FotoMobil']['name'];
    $ukuranFile = $_FILES['FotoMobil']['size'];
    $error = $_FILES['FotoMobil']['error'];
    $tmpName = $_FILES['FotoMobil']['tmp_name'];

    //Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
      Flasher::setFlash('Gambar belum ditambahkan', 'warning');
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/mobil');
      exit;
    }

    //Cek ekstensi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      Flasher::setFlash('Berkas bukan gambar', 'danger');
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/mobil');
      exit;
    }

    //cek ukuran file
    if ($ukuranFile > UKURANFOTO) {
      Flasher::setFlash('Ukuran gambar terlalu besar', 'danger');
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/mobil');
      exit;
    }

    //Kalau lolos pengecekan
    $namaFileBaru = 'FotoMobil-';
    $namaFileBaru .= time();
    $namaFileBaru .= '-' . date('d-M-Y');
    $namaFileBaru .= '.'; //Pemisah antara namafile dan ekstensi
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/fotomobil/' . $namaFileBaru);
    return $namaFileBaru;
  }
  public function tambahDataMobil($data)
  {
    $fotoMobil = $this->uploadGambarMobil();
    $hargaSewa = preg_replace('/\D/', '', $data['HargaSewa']);
    $query = "INSERT INTO mobil VALUES('', :NoPlat, :KdMerk, :IdType, :StatusRental, :HargaSewa, :FotoMobil)";

    $this->db->query($query);

    $this->db->bind('NoPlat', $data['NoPlat']);
    $this->db->bind('KdMerk', $data['KdMerk']);
    $this->db->bind('IdType', $data['IdType']);
    $this->db->bind('StatusRental', $data['StatusRental']);
    $this->db->bind('HargaSewa', $hargaSewa);
    $this->db->bind('FotoMobil', $fotoMobil);

    $this->db->execute();
    return $this->db->rowCount();
  }
  public function hapusDataMobil($id)
  {
    $ambilnama = 'SELECT * FROM mobil WHERE id = :id';
    $this->db->query($ambilnama);
    $this->db->bind('id', $id);

    $foto = $this->db->single();

    $query = 'DELETE FROM mobil WHERE id = :id';

    $this->db->query($query);
    $this->db->bind('id', $id);

    unlink('img/fotomobil/' . $foto['FotoMobil']);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editDataMobil($data)
  {
    if ($_FILES['FotoMobil']['error'] == 4) {
      $hargaSewa = preg_replace('/\D/', '', $data['HargaSewa']);
      $query = "UPDATE mobil SET 
              NoPlat = :NoPlat,
              KdMerk = :KdMerk,
              IdType = :IdType, 
              HargaSewa = :HargaSewa
              WHERE id = :id";
      $this->db->query($query);

      $this->db->bind('NoPlat', $data['NoPlat']);
      $this->db->bind('KdMerk', $data['KdMerk']);
      $this->db->bind('IdType', $data['IdType']);
      $this->db->bind('HargaSewa', $hargaSewa);
      $this->db->bind('id', $data['id']);

      $this->db->execute();
      return $this->db->rowCount();
    } else {
      $ambilnama = 'SELECT * FROM mobil WHERE id = :id';
      $this->db->query($ambilnama);
      $this->db->bind('id', $data['id']);

      $fotoMobil = $this->uploadGambarMobil();

      $foto = $this->db->single();
      unlink('img/fotomobil/' . $foto['FotoMobil']);

      $hargaSewa = preg_replace('/\D/', '', $data['HargaSewa']);
      $query = "UPDATE mobil SET 
              NoPlat = :NoPlat,
              KdMerk = :KdMerk,
              IdType = :IdType, 
              HargaSewa = :HargaSewa,
              FotoMobil = :FotoMobil
              WHERE id = :id";
      $this->db->query($query);

      $this->db->bind('NoPlat', $data['NoPlat']);
      $this->db->bind('KdMerk', $data['KdMerk']);
      $this->db->bind('IdType', $data['IdType']);
      $this->db->bind('HargaSewa', $hargaSewa);
      $this->db->bind('FotoMobil', $fotoMobil);
      $this->db->bind('id', $data['id']);

      $this->db->execute();

      return $this->db->rowCount();
    }
  }
}