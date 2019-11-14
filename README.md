# RENTAL MOBIL

Aplikasi ini dibuat berdasarkan tugas Pemrograman Web & Mobile di sekolah saya, [SMK MUTIARA ILMU](http://mutiarailmu.sch.id).Aplikasi ini dibuat menggunakan bahasa pemrograman PHP yang berbasis objek atau OOP dan berbentuk MVC (Model View Controller).

🔥 [Download Latest Version](https://gitlab.com/abela-a/RentalMobil/-/releases)

> Aplikasi ini masih dalam tahap pengembangan.

## Screenshot

![Homepage](/uploads/9264cde97a1dd116e81316e838559a28/Homepage.png)

![Dashboard](/uploads/a18c43332b06a042f27d0eb6983b3056/Dashboard.gif)

## Fitur

1. Sistem Login dan Register
2. Multiusers
3. Multiroles
4. Dashboard dan Homepage
5. Manajemen Transaksi
6. Manajemen Karyawan, Pelanggan, Role, Sopir dan Akun Baru
7. Manajemen Merk, Type, dan Data Mobil
8. Mengubah foto profile user
9. ... dll

## Cara Install dan Mengatur Aplikasi

1. Download aplikasi penyedia web server. *Saran saya Anda dapat menggunakan XAMPP.*
2. Instal XAMPP / Aplikasi web server.
3. [Download](https://gitlab.com/abela-a/RentalMobil/-/releases) aplikasi Rental Mobil ini.
4. Extract menggunakan winrar atau aplikasi lainnya ke `C:/xampp/htdocs/`
   
   atau `D:/xampp/htdocs`, bergantung di directory mana Anda menginstal XAMPP.
5. Buka aplikasi XAMPP kemudian klik `start` pada **apache** dan **mysql**.
6. Buka browser Anda dan arahkan ke url `localhost/phpmyadmin`
   - buat database baru dengan nama sesuka Anda
   - buka database Anda
   - pilih tab import
   - pilih `Choose File`
   - kemudian pilih file `database.sql` yang berada di folder 
      `htdocs/nama_aplikasi_anda`
      
7. Buka file `Config.php` di folder `app/config/`. Kemudian ikuti panduan berikut :
   ```php
      // Di bawah ini adalah url aplikasi Anda, silahkan ubah projekukk menjadi nama folder anda di htdocs
      define('BASEURL', 'https://localhost/RentalMobil/public');

      /* 
      Dibawah ini berhubungan dengan Database
      DB_HOST adalah server local Anda
      DB_USER adalah user di server local Anda
      DB_PASS adalah password di server local Anda
      DB_NAME adalah nama database anda
      */
      define('DB_HOST', 'localhost');
      define('DB_USER', 'root');
      define('DB_PASS', '');
      define('DB_NAME', 'project_rental');

      //Dibawah ini adalah Controller Default
      define('CONTROLLER', 'Home');

      /*
      Anda dapat mengatur ukuran foto yang dapat di upload oleh user
      1MB = 1000000
      */
      define('UKURANFOTO', 1000000);

      /*
      Dibawah ini adalah untuk mengatur
      Nama aplikasi Anda
      Tipe aplkikasi Anda
      dan Motto Aplikasi Anda
      */
      define('APP_NAME', 'Abidzar');
      define('APP_TYPE', 'Car Rental');
      define('APP_TAGLINE', 'Your rental car solution.');
   ```
8. Buka browser Anda dan arahkan ke url `localhost/nama_aplikasi_anda/public`.
9. Jika tidak ada error, maka Anda sudah siap untuk mengatur aplikasi. `;)`

## Database dan Tabel

### Tabel merk

| Name   | Type    | Lenght | Attribute                   |
| ------ | ------- | ------ | --------------------------- |
| id     | int     | 3      | auto_increment, primary_key |
| KdMerk | varchar | 50     | primary_key                 |
| NmMerk | varchar | 50     | -                           |

### Tabel type

| Name   | Type    | Lenght | Attribute                   |
| ------ | ------- | ------ | --------------------------- |
| id     | int     | 3      | auto_increment, primary_key |
| IdType | varchar | 20     | primary_key                 |
| NmType | varchar | 50     | -                           |
| KdMerk | varchar | 50     | -                           |

### Tabel mobil

| Name         | Type    | Lenght | Attribute                   |
| ------------ | ------- | ------ | --------------------------- |
| id           | int     | 3      | auto_increment, primary_key |
| NoPlat       | varchar | 10     | primary_key                 |
| KdMerk       | varchar | 20     | -                           |
| IdType       | varchar | 20     | -                           |
| StatusRental | enum    | 0      | Kosong, Jalan, Dipesan      |
| HargaSewa    | double  | 10     | -                           |
| JenisMobil   | varchar | 20     | -                           |
| Transmisi    | enum    | 0      | Manual, Matic, CVT          |
| FotoMobil    | varchar | 100    | -                           |

### Tabel users

| Name         | Type    | Lenght | Attribute                   |
| ------------ | ------- | ------ | --------------------------- |
| id           | int     | 3      | auto_increment, primary_key |
| NIK          | char    | 13     | primary_key                 |
| Nama         | varchar | 30     | -                           |
| NamaUser     | varchar | 50     | -                           |
| Password     | varchar | 255    | -                           |
| JenisKelamin | enum    | 0      | Laki-laki, Perempuan        |
| Alamat       | text    | 0      | -                           |
| NoTelp       | varchar | 13     | -                           |
| Foto         | varchar | 100    | -                           |
| RoleId       | int     | 2      | -                           |
| IsActive     | int     | 1      | -                           |

### Tabel user_role

| Name | Type    | Lenght | Attribute                   |
| ---- | ------- | ------ | --------------------------- |
| id   | int     | 11     | auto_increment, primary_key |
| role | varchar | 20     | -                           |

### Tabel sopir

| Name         | Type    | Lenght | Attribute                   |
| ------------ | ------- | ------ | --------------------------- |
| id           | int     | 3      | auto_increment, primary_key |
| IdSopir      | char    | 6      | primary_key                 |
| NIK          | char    | 13     | -                           |
| NmSopir      | varchar | 50     | -                           |
| Alamat       | text    | 0      | -                           |
| NoTelp       | varchar | 20     | -                           |
| JenisKelamin | enum    | 0      | Laki-laki, Perempuan        |
| NoSim        | char    | 20     | -                           |
| TarifPerhari | double  | 10     | -                           |
| StatusSopir  | enum    | 0      | Busy, Booked, Free          |

### Tabel transaksi

| Name                       | Type   | Lenght | Attribute                            |
| -------------------------- | ------ | ------ | ------------------------------------ |
| NoTransaksi                | int    | 11     | primary_key                          |
| NIK                        | char   | 13     | -                                    |
| Id_Mobil                   | int    | 3      | -                                    |
| Tanggal_Pesan              | date   | 0      | -                                    |
| Tanggal_Pinjam             | date   | 0      | -                                    |
| Tanggal_Kembali_Rencana    | date   | 0      | -                                    |
| Tanggal_Kembali_Sebenarnya | date   | 0      | -                                    |
| LamaRental                 | int    | 3      | -                                    |
| LamaDenda                  | int    | 3      | -                                    |
| Kerusakan                  | text   | 0      | -                                    |
| IdSopir                    | char   | 6      | -                                    |
| BiayaBBM                   | double | 11     | -                                    |
| BiayaKerusakan             | double | 11     | -                                    |
| Denda                      | double | 11     | -                                    |
| Total_Bayar                | double | 11     | -                                    |
| Jumlah_Bayar               | double | 11     | -                                    |
| Kembalian                  | double | 11     | -                                    |
| StatusTransaksi            | enum   | 0      | Proses, Mulai, Batal, Arsip, Selesai |
| Arsip                      | int    | 1      |                                      |

## Changelog

Anda dapat melihat semua perubahan di [CHANGELOG](https://gitlab.com/abela-a/RentalMobil/blob/master/CHANGELOG.md)

## License

Aplikasi ini dilindungi oleh [MIT LICENSE](https://gitlab.com/abela-a/RentalMobil/blob/master/LICENSE)

## Kritik, Saran, atau Menemukan Bug

Anda dapat mengadukan kritik, saran, ataupun bug ke tab [Issues](https://gitlab.com/abela-a/RentalMobil/issues).