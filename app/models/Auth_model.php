<?php

class Auth_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function registrasi($data)
  {
    $username = strtolower(stripslashes($data['NamaUser']));
    $password = $data['Password'];
    $password2 = $data['Password2'];

    //CEK USER
    $cekUser = 'SELECT * FROM users WHERE NamaUser = :NamaUser';
    $this->db->query($cekUser);
    $this->db->bind('NamaUser', $data['NamaUser']);
    $cekUser = $this->db->single();

    if ($cekUser) {
      SweetAlert::setSwalAlert("Peringatan", "Username telah terdaftar!", "warning");
      header('Location:' . BASEURL . '/auth/registration');
      exit;
    }

    //CEK PASSWORD
    if ($password !== $password2) {
      SweetAlert::setSwalAlert("Peringatan", "Password tidak sama!", "error");
      header('Location:' . BASEURL . '/auth/registration');
      exit;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = 'INSERT INTO users VALUES("", :NIK, :Nama, :NamaUser, :Password, :JenisKelamin, :Alamat, :NoTelp, :Foto, :roleId, :IsActive)';

    $this->db->query($query);

    $this->db->bind('NIK', $data['NIK']);
    $this->db->bind('Nama', $data['Nama']);
    $this->db->bind('NamaUser', $username);
    $this->db->bind('Password', $password);
    $this->db->bind('JenisKelamin', $data['JenisKelamin']);
    $this->db->bind('Alamat', $data['Alamat']);
    $this->db->bind('NoTelp', $data['NoTelp']);
    $this->db->bind('Foto', 'default.png');
    $this->db->bind('roleId', 3);
    $this->db->bind('IsActive', 0);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
