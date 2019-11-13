<?php

class Sopir_model
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }
  public function getAllSopir()
  {
    $this->db->query("SELECT * FROM sopir ORDER BY id DESC");
    return $this->db->resultSet();
  }
  public function SopirKosong()
  {
    $this->db->query("SELECT * FROM sopir WHERE StatusSopir = 'Free' && IdSopir != 'SPR000'");
    return $this->db->resultSet();
  }
  public function SopirKosongById($IdSopir)
  {
    $this->db->query("SELECT * FROM sopir WHERE IdSopir = :IdSopir");
    $this->db->bind('IdSopir', $IdSopir);
    return $this->db->single();
  }
  public function tambahDataSopir($data)
  {
    $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
    $tarif = preg_replace('/\D/', '', $data['TarifPerhari']);
    $query = 'INSERT INTO sopir VALUES("", :IdSopir, :NIK, :NmSopir, :Alamat, :NoTelp, :JenisKelamin, :NoSim, :TarifPerhari, :StatusSopir)';

    $this->db->query($query);

    $this->db->bind('IdSopir', $data['IdSopir']);
    $this->db->bind('NIK', $data['NIK']);
    $this->db->bind('NmSopir', $data['NmSopir']);
    $this->db->bind('Alamat', $data['Alamat']);
    $this->db->bind('NoTelp', $NoTelp);
    $this->db->bind('JenisKelamin', $data['JenisKelamin']);
    $this->db->bind('NoSim', $data['NoSim']);
    $this->db->bind('TarifPerhari', $tarif);
    $this->db->bind('StatusSopir', 'Free');

    $this->db->execute();
    return $this->db->rowCount();
  }
  public function hapusDataSopir($id)
  {
    $query = 'DELETE FROM sopir WHERE id = :id';
    $this->db->query($query);
    $this->db->bind('id', $id);

    $this->db->execute();

    return $this->db->rowCount();
  }
  public function editDataSopir($data)
  {
    $NoTelp = preg_replace('/\D/', '', $data['NoTelp']);
    $tarif = preg_replace('/\D/', '', $data['TarifPerhari']);
    $query = "UPDATE sopir SET 
              NmSopir = :NmSopir,
              JenisKelamin = :JenisKelamin,
              Alamat = :Alamat,
              NoTelp = :NoTelp,
              TarifPerhari = :TarifPerhari
              WHERE id = :id";

    $this->db->query($query);
    $this->db->bind('NmSopir', $data['NmSopir']);
    $this->db->bind('JenisKelamin', $data['JenisKelamin']);
    $this->db->bind('Alamat', $data['Alamat']);
    $this->db->bind('NoTelp', $NoTelp);
    $this->db->bind('TarifPerhari', $tarif);
    $this->db->bind('id', $data['id']);

    $this->db->execute();
    return $this->db->rowCount();
  }
}
