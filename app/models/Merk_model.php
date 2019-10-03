<?php

class Merk_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllMerk()
  {
    $this->db->query('SELECT * FROM merk ORDER BY id DESC');
    return $this->db->resultSet();
  }
  public function getMerkById($KdMerk)
  {
    $this->db->query('SELECT * FROM merk WHERE KdMerk = :KdMerk');
    $this->db->bind('KdMerk', $KdMerk);
    return $this->db->single();
  }
  public function tambahDataMerk($data)
  {
    $query = 'INSERT INTO merk VALUES("", :KdMerk, :NmMerk)';

    //data dieksekusi ke dalam query
    $this->db->query($query);

    //data dibind terlebih dahulu agar aman
    $this->db->bind('KdMerk', $data['KdMerk']);
    $this->db->bind('NmMerk', $data['NmMerk']);

    //eksekusi kode
    $this->db->execute();

    //mengembalikan angka agar dapat dikembalikan ke Controller Adm00n
    return $this->db->rowCount();
  }
  public function hapusDataMerk($KdMerk)
  {
    $query = 'DELETE FROM merk WHERE KdMerk = :KdMerk';
    $this->db->query($query);
    $this->db->bind('KdMerk', $KdMerk);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editDataMerk($data)
  {
    $query = "UPDATE merk SET KdMerk = :KdMerk, NmMerk = :NmMerk WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('KdMerk', $data['KdMerk']);
    $this->db->bind('NmMerk', $data['NmMerk']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
