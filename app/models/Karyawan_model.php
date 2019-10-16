<?php

class Karyawan_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllKaryawan()
  {
    $this->db->query('SELECT * FROM users WHERE roleId = 2 AND IsActive = 1 ORDER BY id DESC');
    return $this->db->resultSet();
  }
  public function tambahDataKaryawan($data)
  {
    $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);

    $query = 'INSERT INTO users VALUES("", :NIK, :Nama, :NamaUser, :Password, :JenisKelamin, :Alamat, :NoTelp, :Foto, :roleId, :IsActive)';
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
    $this->db->bind('Foto', $data['Foto']);
    $this->db->bind('roleId', 2);
    $this->db->bind('IsActive', 1);

    $this->db->execute();
    return $this->db->rowCount();
  }
  public function editDataKaryawan($data)
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
  public function hapusDataKaryawan($id)
  {
    $query = 'DELETE FROM users WHERE id = :id';
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
}
