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
      Flasher::setFlash('Registrasi Anda berhasil! Silahkan hubungi <a href="#" class="badge badge-default" data-toggle="tooltip" data-placement="top" title="0878-1697-3617">Admin</a> untuk aktivasi', 'info');
      header('Location:' . BASEURL . '/auth');
      exit;
    } else {
      Flasher::setFlash('Registrasi Anda gagal', 'danger');
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
        Flasher::setFlash('User anda belum aktif. Silahkan kontak <a href="#" class="badge badge-warning" data-toggle="tooltip" data-placement="top" title="0878-1697-3617">Admin</a> ', 'warning');
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
            //Flasher::setFlash('Login Anda berhasil. Selamat datang ' . $_SESSION['Login']['Nama'], 'success');

            SweetAlert::setToast('top-end', '3000', 'success', 'Anda berhasil login!');

            // SweetAlert::setSwalAlert('Anda berhasil login', 'Selamat datang ' . $_SESSION['Login']['Nama'], 'success');

            header('Location:' . BASEURL . '/admin');
            exit;
          }
          // JIKA KARYAWAN
          else if ($_SESSION['Login']['RoleId'] == 2) {
            Flasher::setFlash('Login Anda berhasil. Selamat datang ' . $_SESSION['Login']['Nama'], 'success');
            header('Location:' . BASEURL . '/karyawan');
            exit;
          }
          // JIKA PELANGGAN
          else if ($_SESSION['Login']['RoleId'] == 3) {
            Flasher::setFlash('Login Anda berhasil. Selamat datang ' . $_SESSION['Login']['Nama'], 'success');
            header('Location:' . BASEURL . '/pelanggan');
            exit;
          }
        } else {
          Flasher::setFlash('Password Anda Salah', 'danger');
          header('Location:' . BASEURL . '/auth');
          exit;
        }
      }
    } else {
      Flasher::setFlash('User belum terdaftar! Silahkan <a href="' . BASEURL . '/auth/registration">Daftar</a> terlebih dahulu', 'warning');
      header('Location:' . BASEURL . '/auth');
      exit;
    }
  }
  public function SignOut()
  {
    session_destroy();
    session_unset();
    Flasher::setFlash('Logout anda berhasil', 'success');
    header('Location:' . BASEURL . '/home');
    exit;
  }
}
