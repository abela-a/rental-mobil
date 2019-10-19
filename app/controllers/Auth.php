<?php

class Auth extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database;
  }

  //Menampilkan halaman login
  public function index()
  {
    $data['judul'] = 'Login';
    $this->view('templates/header', $data);
    $this->view('auth/login');
    $this->view('templates/footer');
  }
  //Menampilkan halaman registrasi
  public function registration()
  {
    $data['judul'] = 'Buat Akun';
    $this->view('templates/header', $data);
    $this->view('auth/registration');
    $this->view('templates/footer');
  }
  public function signUp()
  {
    if ($this->model('Auth_model')->registrasi($_POST) > 0) {
      SweetAlert::setSwalAlert('Registrasi Anda Berhasil!', 'Silahkan hubungi Admin untuk aktivasi', 'success');
      header('Location:' . BASEURL . '/auth');
      exit;
    } else {
      SweetAlert::setSwalAlert('Registrasi Anda gagal!', 'Silahkan registrasi ulang, atau hubungi Admin untuk bantuan', 'success');
      header('Location:' . BASEURL . '/auth/registration');
      exit;
    }
  }
  public function SignIn()
  {
    $username = $_POST['NamaUser'];
    $userpass = $_POST['Password'];

    $this->db->query("SELECT * FROM viewusers WHERE NamaUser = :NamaUser");
    $this->db->bind('NamaUser', $username);

    $UserData = $this->db->single();
    $PassData = password_verify($userpass, $UserData['Password']);
    //CEK USER
    if ($UserData > 0) {
      // CEK AKTIF
      if ($UserData['IsActive'] == 0) {
        SweetAlert::setSwalAlert('Akun Anda belum aktif!', 'Silahkan hubungi Admin untuk konfirmasi dan aktivasi akun Anda', 'info');
        header('Location:' . BASEURL . '/auth');
        exit;
      } else {
        //CEK PASS
        if ($PassData) {
          $_SESSION['Login'] = [
            'Id' => $UserData['id'],
            'Nama' => $UserData['Nama'],
            'Role' => $UserData['role'],
            'RoleId' => $UserData['RoleId'],
            'Foto' => $UserData['Foto']
          ];
          //JIKA ADMIN
          if ($_SESSION['Login']['RoleId'] == 1) {
            SweetAlert::setToast('top-end', '5000', 'success', 'Anda berhasil login!');
            header('Location:' . BASEURL . '/admin');
            exit;
          }
          // JIKA KARYAWAN
          else if ($_SESSION['Login']['RoleId'] == 2) {
            SweetAlert::setToast('top-end', '5000', 'success', 'Anda berhasil login!');
            header('Location:' . BASEURL . '/karyawan');
            exit;
          }
          // JIKA PELANGGAN
          else if ($_SESSION['Login']['RoleId'] == 3) {
            SweetAlert::setToast('top-end', '5000', 'success', 'Anda berhasil login!');
            header('Location:' . BASEURL . '/pelanggan');
            exit;
          }
        } else {
          SweetAlert::setSwalAlert('Gagal Login', 'Password Anda salah!', 'error');
          header('Location:' . BASEURL . '/auth');
          exit;
        }
      }
    } else {
      SweetAlert::setSwalAlert('Akun belum terdaftar!', 'Silahkan lakukan registrasi terlebih dahulu', 'info');
      header('Location:' . BASEURL . '/auth/registration');
      exit;
    }
  }
  public function SignOut()
  {
    unset($_SESSION['Login']);
    SweetAlert::setToast('top-end', '5000', 'success', 'Anda berhasil logout!');
    header('Location:' . BASEURL . '/home');
    exit;
  }
}
