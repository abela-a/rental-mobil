<?php

class Type_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllType()
  {
    $this->db->query('SELECT * FROM viewtype ORDER BY id DESC');
    return $this->db->resultSet();
  }
  public function tambahDataType($data)
  {
    $query = 'INSERT INTO type VALUES("", :IdType, :NmType, :KdMerk)';

    $this->db->query($query);

    $this->db->bind('IdType', $data['IdType']);
    $this->db->bind('NmType', $data['NmType']);
    $this->db->bind('KdMerk', $data['KdMerk']);

    $this->db->execute();
    return $this->db->rowCount();
  }
  public function hapusDataType($IdType)
  {
    $query = 'DELETE FROM type WHERE IdType = :IdType';
    $this->db->query($query);
    $this->db->bind('IdType', $IdType);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editDataType($data)
  {
    $query = "UPDATE type SET 
              IdType = :IdType, 
              NmType = :NmType, 
              KdMerk = :KdMerk 
              WHERE id = :id";
    $this->db->query($query);
    $this->db->bind('IdType', $data['IdType']);
    $this->db->bind('NmType', $data['NmType']);
    $this->db->bind('KdMerk', $data['KdMerk']);
    $this->db->bind('id', $data['id']);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
