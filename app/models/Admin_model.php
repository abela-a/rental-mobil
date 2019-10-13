<?php

class Admin_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function autonumber($id_terakhir, $panjang_kode, $panjang_angka)
  {
    // mengambil nilai kode ex: KNS0015 hasil KNS
    $kode = substr($id_terakhir, 0, $panjang_kode);

    // mengambil nilai angka
    // ex: KNS0015 hasilnya 0015
    $angka = substr($id_terakhir, $panjang_kode, $panjang_angka);

    // menambahkan nilai angka dengan 1
    // kemudian memberikan string 0 agar panjang string angka menjadi 4
    // ex: angka baru = 6 maka ditambahkan strig 0 tiga kali
    // sehingga menjadi 0006
    $angka_baru = str_repeat("0", $panjang_angka - strlen($angka + 1)) . ($angka + 1);

    // menggabungkan kode dengan nilai angka baru
    $id_baru = $kode . $angka_baru;

    return $id_baru;
  }
  public function getUserUnactive()
  {
    $this->db->query("SELECT * FROM users WHERE IsActive = 0 ORDER BY id DESC");
    return $this->db->resultSet();
  }
  public function countUserUnactive()
  {
    $this->db->query("SELECT * FROM users WHERE IsActive = 0 ORDER BY id DESC");
    $this->db->execute();
    return $this->db->rowCount();
  }
  public function accUser($data)
  {
    $query = "UPDATE users SET 
              RoleId = :RoleId,
              IsActive = :IsActive
              WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('RoleId', $data['RoleId']);
    $this->db->bind('IsActive', $data['IsActive']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();
    return $this->db->rowCount();
  }
  public function delUser($id)
  {
    $query = 'DELETE FROM users WHERE id = :id';
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function getUserRole()
  {
    $this->db->query('SELECT * FROM viewusers WHERE IsActive = 1 ORDER BY id DESC');
    return $this->db->resultSet();
  }
  public function getRoleOption()
  {
    $this->db->query('SELECT * FROM user_role');
    return $this->db->resultSet();
  }
  public function UpdateRole($data)
  {
    $query = "UPDATE users SET 
              RoleId = :RoleId
              WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('RoleId', $data['RoleId']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();
    return $this->db->rowCount();
  }
  public function countMobil()
  {
    $this->db->query("SELECT * FROM mobil");
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
  public function mobilKosong()
  {
    $this->db->query("SELECT * FROM viewmobil WHERE StatusRental = 'Kosong'");
    return $this->db->resultSet();
  }
  public function parseURL()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    }
  }
}
