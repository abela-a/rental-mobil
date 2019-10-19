<?php

class User_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getUserProfileById($id)
  {
    $this->db->query('SELECT * FROM users WHERE id = :id');
    $this->db->bind('id', $id);
    return $this->db->single();
  }
  public function editDataUser($data)
  {
    if ($data['Password'] == '') {
      $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
      $query = "UPDATE users SET 
              NIK = :NIK,
              Nama = :Nama,
              NamaUser = :NamaUser,
              JenisKelamin = :JenisKelamin, 
              Alamat = :Alamat,
              NoTelp = :NoTelp
              WHERE id = :id";

      $this->db->query($query);

      $this->db->bind('NIK', $data['NIK']);
      $this->db->bind('Nama', $data['Nama']);
      $this->db->bind('NamaUser', $data['NamaUser']);
      $this->db->bind('JenisKelamin', $data['JenisKelamin']);
      $this->db->bind('Alamat', $data['Alamat']);
      $this->db->bind('NoTelp', $NoTelp);
      $this->db->bind('id', $data['id']);

      $this->db->execute();
      return $this->db->rowCount();
    } else {
      $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
      $query = "UPDATE users SET 
              NIK = :NIK,
              Nama = :Nama,
              NamaUser = :NamaUser, 
              Password = :Password,
              JenisKelamin = :JenisKelamin, 
              Alamat = :Alamat,
              NoTelp = :NoTelp
              WHERE id = :id";

      $this->db->query($query);

      $password = $data['Password'];
      $password = password_hash($password, PASSWORD_DEFAULT);

      $this->db->bind('NIK', $data['NIK']);
      $this->db->bind('Nama', $data['Nama']);
      $this->db->bind('NamaUser', $data['NamaUser']);
      $this->db->bind('Password', $password);
      $this->db->bind('JenisKelamin', $data['JenisKelamin']);
      $this->db->bind('Alamat', $data['Alamat']);
      $this->db->bind('NoTelp', $NoTelp);
      $this->db->bind('id', $data['id']);

      $this->db->execute();
      return $this->db->rowCount();
    }
  }
  public function prosesUploadFotoUser()
  {
    $namaFile = $_FILES['FotoUser']['name'];
    $ukuranFile = $_FILES['FotoUser']['size'];
    $error = $_FILES['FotoUser']['error'];
    $tmpName = $_FILES['FotoUser']['tmp_name'];

    //Cek apakah tidak ada gambar yang diupload
    if ($error === 4) {
      SweetAlert::setSwalAlert("Peringatan", "Gambar belum ditambahkan!", "warning");
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id']);
      exit;
    }

    //Cek ekstensi file
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if (!in_array($ekstensiGambar, $ekstensiGambarValid)) {
      SweetAlert::setSwalAlert("Peringatan", "Berkas bukan gambar!", "warning");
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id']);
      exit;
    }

    //cek ukuran file
    if ($ukuranFile > UKURANFOTO) {
      SweetAlert::setSwalAlert("Peringatan", "Ukuran gambar terlalu besar", "warning");
      header('Location:' . BASEURL . '/' . $_SESSION['Login']['Role'] . '/userProfile' . '/' . $_SESSION['Login']['Id']);
      exit;
    }

    //Kalau lolos pengecekan
    $namaFileBaru = $_SESSION['Login']['Nama'] . '-';
    $namaFileBaru .= time();
    $namaFileBaru .= '-' . date('d-M-Y');
    $namaFileBaru .= '.'; //Pemisah antara namafile dan ekstensi
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, 'img/fotouser/' . $namaFileBaru);
    return $namaFileBaru;
  }
  public function uploadFotoUser($data)
  {
    $ambilnama = 'SELECT * FROM users WHERE id = :id';
    $this->db->query($ambilnama);
    $this->db->bind('id', $data['id']);

    $foto = $this->db->single();

    $fotoUser = $this->prosesUploadFotoUser();


    $query = "UPDATE users SET 
              Foto = :Foto
              WHERE id = :id";
    $this->db->query($query);

    $this->db->bind('Foto', $fotoUser);
    $this->db->bind('id', $data['id']);

    $this->db->execute();

    if ($foto['Foto'] != 'default.png') {
      unlink('img/fotouser/' . $foto['Foto']);
    }
    return $this->db->rowCount();
  }
}
