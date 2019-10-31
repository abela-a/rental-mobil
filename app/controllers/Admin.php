<?php

class Admin extends Controller
{
  private $db;

  public function __construct()
  {
    $this->db = new Database; //Membuat instance Database

    //Load model secara default
    $this->admin = $this->model('Admin_model');
    $this->karyawan = $this->model('Karyawan_model');
    $this->merk = $this->model('Merk_model');
    $this->type = $this->model('Type_model');
    $this->mobil = $this->model('Mobil_model');
    $this->pelanggan = $this->model('Pelanggan_model');
    $this->sopir = $this->model('Sopir_model');
    $this->user = $this->model('User_model');
    $this->count = $this->model('Count_model');
    $this->transaksi = $this->model('Transaksi_model');
  }

  //Untuk menampilkan dashboard pada Admin
  public function index($id = "")
  {
    $data['judul'] = 'Dashboard';

    $data['UserUn'] = $this->admin->getUserUnactive();
    $data['JmlKaryawan'] = $this->count->countKaryawan();
    $data['JmlPelanggan'] = $this->count->countPelanggan();
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['JmlMobil'] = $this->count->countMobil();
    $data['JmlSopir'] = $this->count->countSopir();
    $data['JmlPeminjaman'] = $this->count->countPeminjaman();
    $data['JmlTransaksi'] = $this->count->countTransaksi();
    $data['MobilKosong'] = $this->mobil->mobilKosong();
    $data['url'] = $this->admin->parseURL();

    $data['userProfile'] = $this->user->getUserProfileById($id);

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/dashboard', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }

  //Metode Merk
  public function merk()
  {
    $data['judul'] = 'Merk';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $data['merk'] = $this->merk->getAllMerk();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/merk', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }

  public function tambahMerk()
  {
    if ($this->merk->tambahDataMerk($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Merk baru telah ditambahkan!', 'success');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk baru gagal ditambahkan!', 'error');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    }
  }
  public function hapusMerk($KdMerk)
  {
    if ($this->merk->hapusDataMerk($KdMerk) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Merk berhasil dihapus!', 'success');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    }
  }
  public function editMerk()
  {
    if ($this->merk->editDataMerk($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Merk berhasil diubah!', 'success');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/merk');
      exit;
    }
  }

  //Metode Type
  public function type()
  {
    $data['judul'] = 'Tipe';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $data['type'] = $this->type->getAllType();

    $data['merkOption'] = $this->mobil->getMerkOption();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/type', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahType()
  {
    if ($this->type->tambahDataType($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Tipe baru telah ditambahkan!', 'success');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Merk baru gagal ditambahkan!', 'error');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    }
  }
  public function hapusType($IdType)
  {
    if ($this->type->hapusDataType($IdType) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Tipe berhasil dihapus!', 'success');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Tipe gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    }
  }
  public function editType()
  {
    if ($this->type->editDataType($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Tipe berhasil diubah!', 'success');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Tipe gagal dihapus!', 'error');
      header('Location:' . BASEURL . '/admin/type');
      exit;
    }
  }

  //Metode Mobil
  public function mobil()
  {
    $data['judul'] = 'Mobil';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $data['mobil'] = $this->mobil->getAllMobil();
    $data['merkOption'] = $this->mobil->getMerkOption();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/mobil', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function getType($KdMerk = '')
  {
    $data['typeOption'] = $this->mobil->getTypeOption($KdMerk);
    $this->view('get/getType', $data);
  }
  public function tambahMobil()
  {
    if ($this->mobil->tambahDataMobil($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Mobil baru telah ditambahkan!', 'success');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Mobil baru gagal ditambahkan!', 'error');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    }
  }
  public function hapusMobil($id)
  {
    if ($this->mobil->hapusDataMobil($id) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Data mobil berhasil dihapus', 'success');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Data mobil gagal dihapus', 'error');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    }
  }
  public function editMobil()
  {
    if ($this->mobil->editDataMobil($_POST) > 0) {
      SweetAlert::setSwalAlert('Berhasil', 'Data mobil berhasil diubah', 'success');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    } else {
      SweetAlert::setSwalAlert('Gagal', 'Data mobil gagal dihapus', 'error');
      header('Location:' . BASEURL . '/admin/mobil');
      exit;
    }
  }

  //Metode Karyawan
  public function karyawan()
  {
    $data['judul'] = 'Karyawan';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $data['karyawan'] = $this->karyawan->getAllKaryawan();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('admin/karyawan', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahKaryawan()
  {
    if ($this->karyawan->tambahDataKaryawan($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Karyawan baru berhasil ditambahkan!", "success");
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Karyawan baru gagal ditambahkan!", "error");
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    }
  }
  public function editKaryawan()
  {
    if ($this->karyawan->editDataKaryawan($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Data karyawan berhasil diubah!", "success");
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Data karyawan gagal diubah!", "error");
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    }
  }
  public function hapusKaryawan($id)
  {
    if ($this->karyawan->hapusDataKaryawan($id) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Data karyawan berhasil dihapus!", "success");
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Data karyawan gagal diubah!", "error");
      header('Location:' . BASEURL . '/admin/karyawan');
      exit;
    }
  }

  //Metode Pelanggan
  public function pelanggan()
  {
    $data['judul'] = 'Pelanggan';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $data['pelanggan'] = $this->pelanggan->getAllPelanggan();
    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/pelanggan', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahPelanggan()
  {
    if ($this->pelanggan->tambahDataPelanggan($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Pelanggan baru berhasil ditambahkan!", "success");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Pelanggan baru gagal ditambahkan", "error");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    }
  }
  public function editPelanggan()
  {
    if ($this->pelanggan->editDataPelanggan($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Data pelanggan berhasil diubah", "success");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Data pelanggan gagal diubah", "error");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    }
  }
  public function hapusPelanggan($id)
  {
    if ($this->pelanggan->hapusDataPelanggan($id) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Pelanggan berhasil dihapus", "success");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Pelanggan gagal dihapus", "error");
      header('Location:' . BASEURL . '/admin/pelanggan');
      exit;
    }
  }

  //Metode Sopir
  public function sopir()
  {
    $this->db->query('SELECT * FROM sopir ORDER BY IdSopir DESC LIMIT 1');
    $latest = $this->db->single();

    $data['autoIdSopir'] = $this->admin->autonumber($latest['IdSopir'], 3, 3);

    $data['judul'] = 'Sopir';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $data['sopir'] = $this->sopir->getAllSopir();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/sopir', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahSopir()
  {
    if ($this->sopir->tambahDataSopir($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Sopir baru berhasil ditambahkan!", "success");
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Sopir baru gagal ditambahkan!", "error");
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    }
  }
  public function hapusSopir($id)
  {
    if ($this->sopir->hapusDataSopir($id) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Data sopir berhasil dihapus", "success");
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Data sopir gagal dihapus", "error");
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    }
  }
  public function editSopir()
  {
    if ($this->sopir->editDataSopir($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Data sopir berhasil diubah", "success");
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Data sopir gagal diubah", "error");
      header('Location:' . BASEURL . '/admin/sopir');
      exit;
    }
  }

  //Metode User Belum Aktif
  public function pending()
  {
    $data['judul'] = 'Akun Pending';

    $data['pending'] = $this->admin->getUserUnactive();
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('admin/pendinguser', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function konfirmasiUser()
  {
    if ($this->admin->accUser($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "User berhasil diaktivasi", "success");
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    } else {
      SweetAlert::setSwalAlert("Peringatan", "Tidak ada perubahan", "warning");
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    }
  }
  public function hapusPending($id)
  {
    if ($this->admin->delUser($id) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "User pending berhasil dihapus", "success");
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "User pending gagal dihapus", "error");
      header('Location:' . BASEURL . '/admin/pending');
      exit;
    }
  }

  //Metode Role
  public function role()
  {
    $data['judul'] = 'Role';

    $data['role'] = $this->admin->getUserRole();
    $data['roleOption'] = $this->admin->getRoleOption();
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('admin/role', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function updaterole()
  {
    if ($this->admin->UpdateRole($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Role berhasil diubah", "success");
      header('Location:' . BASEURL . '/admin/role');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Role gagal diubah", "error");
      header('Location:' . BASEURL . '/admin/role');
      exit;
    }
  }
  public function userProfile($id)
  {
    $data['judul'] = 'Profile';

    $data['userProfile'] = $this->user->getUserProfileById($id);
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('pelanggan/editprofile', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function editProfile()
  {
    if ($this->user->editDataUser($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Profile berhasil diubah", "success");
      header('Location:' . BASEURL . '/admin/userprofile/' . $_SESSION['Login']['id']);
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Profile gagal diubah", "error");
      header('Location:' . BASEURL . '/admin/userprofile/' . $_SESSION['Login']['Id']);
      exit;
    }
  }
  public function pemesanan()
  {
    $this->db->query('SELECT * FROM transaksi ORDER BY NoTransaksi DESC LIMIT 1');
    $latest = $this->db->single();

    $data['autoIdTransaksi'] = $this->admin->autonumber($latest['NoTransaksi'], 3, 5);

    $data['judul'] = 'Pemesanan';

    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['url'] = $this->admin->parseURL();
    $data['Pelanggan'] = $this->pelanggan->getAllPelanggan();
    $data['Pemesanan'] = $this->transaksi->getAllPemesanan();
    $data['MobilKosong'] = $this->mobil->mobilKosong();
    $data['SopirKosong'] = $this->sopir->SopirKosong();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/pemesanan', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function tambahPemesanan()
  {
    if ($this->transaksi->tambahDataPemesanan($_POST) > 0) {
      SweetAlert::setSwalAlert("Pesanan Berhasil", "Pesanan baru berhasil ditambahkan! Tolong ingatkan penyewa untuk segera membayar.", "success");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Pesanan Gagal", "Pesanan baru gagal ditambahkan!", "error");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    }
  }
  public function AmbilMobil()
  {
    if ($this->transaksi->konfirmasiAmbilMobil($_POST) > 0) {
      SweetAlert::setSwalAlert("Konfirmasi Berhasil", "Rental mobil mulai berjalan, tolong ingatkan penyewa untuk mengembalikan mobil tepat waktu.", "info");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Konfirmasi Gagal", "Konfirmasi pengambilan mobil gagal!", "error");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    }
  }
  public function batalPesanan()
  {
    if ($this->transaksi->batalkanPesananMobil($_POST) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Pesanan mobil berhasil dibatalkan.", "success");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Pesanan mobil gagal dibatalkan.", "error");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    }
  }
  public function pesananSelesai()
  {
    if ($this->transaksi->pesananMobilSelesai($_POST) > 0) {
      SweetAlert::setSwalAlert("Rental Selesai", "Rental mobil telah selesai, untuk melihat riwayat silahkan ke Transaksi", "success");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    } else {
      SweetAlert::setSwalAlert("Rental Selesai Gagal", "Rental mobil belum selesai.", "error");
      header('Location:' . BASEURL . '/admin/pemesanan');
      exit;
    }
  }
  public function transaksi()
  {
    $data['judul'] = 'Transaksi';

    $data['url'] = $this->admin->parseURL();
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['Transaksi'] = $this->transaksi->getAllTransaksi();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/transaksi', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function arsip_transaksi()
  {
    $data['judul'] = 'Arsip Transaksi';

    $data['url'] = $this->admin->parseURL();
    $data['JmlPending'] = $this->count->countUserUnactive();
    $data['JmlProses'] = $this->count->countProsesTransaksi();
    $data['Transaksi'] = $this->transaksi->getAllArsipTransaksi();

    $this->view('templates/header', $data);
    $this->view('templates/navadmin', $data);
    $this->view('karyawan/arsip_transaksi', $data);
    $this->view('templates/footerdashboard');
    $this->view('templates/footer');
  }
  public function konfirmasiArsip($NoTransaksi)
  {
    if ($this->transaksi->arsipkanTransaksi($NoTransaksi) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Transaksi berhasil diarsipkan!", "success");
      header('Location:' . BASEURL . '/admin/transaksi');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Transaksi gagal diarsipkan!", "error");
      header('Location:' . BASEURL . '/admin/transaksi');
      exit;
    }
  }
  public function batalArsip($NoTransaksi)
  {
    if ($this->transaksi->batalkanArsipTransaksi($NoTransaksi) > 0) {
      SweetAlert::setSwalAlert("Berhasil", "Transaksi berhasil dikembalikan!", "success");
      header('Location:' . BASEURL . '/admin/arsip_transaksi');
      exit;
    } else {
      SweetAlert::setSwalAlert("Gagal", "Transaksi gagal dikembalikan!", "error");
      header('Location:' . BASEURL . '/admin/arsip_transaksi');
      exit;
    }
  }
}
