<?php

class SweetAlert
{
  public static function setSwalAlert($judul, $isi, $tipe)
  {
    $_SESSION['Swal'] = [
      'judul' => $judul,
      'isi' => $isi,
      'tipe' => $tipe
    ];
  }
  public static function SwalAlert()
  {
    if (isset($_SESSION['Swal'])) {
      $tipe = $_SESSION['Swal']['tipe'];
      $judul = $_SESSION['Swal']['judul'];
      $isi = $_SESSION['Swal']['isi'];

      echo "<script>
              if(true)
              {
                Swal.fire({
                  type: '" . $tipe . "',
                  title: '" . $judul . "',
                  text: '" . $isi . "'
                })
              }
            </script>";
      unset($_SESSION['Swal']);
    }
  }
  public static function setToast($posisi, $lama, $tipe, $judul)
  {
    $_SESSION['SwalToast'] = [
      'posisi' => $posisi,
      'lama' => $lama,
      'tipe' => $tipe,
      'judul' => $judul
    ];
  }
  public static function SwalToast()
  {
    if (isset($_SESSION['SwalToast'])) {
      $posisi = $_SESSION['SwalToast']['posisi'];
      $lama = $_SESSION['SwalToast']['lama'];
      $tipe = $_SESSION['SwalToast']['tipe'];
      $judul = $_SESSION['SwalToast']['judul'];

      echo
        "
    <script>
    if(true)
    {
      const Toast = Swal.mixin({
        toast: true,
        position: '" . $posisi . "',
        showConfirmButton: false,
        timer: " . $lama . "
      })
      Toast.fire({
        type: '" . $tipe . "',
        title: '" . $judul . "'
      })
    }
    </script>
    ";
      unset($_SESSION['SwalToast']);
    }
  }
}
