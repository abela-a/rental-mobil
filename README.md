# RENTAL MOBIL

Aplikasi ini dibuat berdasarkan tugas Pemrograman Web & Mobile di sekolah saya, [SMK MUTIARA ILMU](http://mutiarailmu.sch.id).Aplikasi ini dibuat menggunakan bahasa pemrograman PHP yang berbasis objek atau OOP dan berbentuk MVC (Model View Controller).

🔥 [Download Latest Version](https://gitlab.com/abela-a/RentalMobil/-/releases)

> Aplikasi ini masih dalam tahap pengembangan.

## Screenshot

![Homepage](/uploads/8e03b405750cb64504bd87d378542e61/Screenshot__40_.png)

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

## Cara Install

1. Download aplikasi penyedia web server.
   > Saran : XAMPP
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
      `htdocs/namaaplikasianda`
7. Buka file `Config.php` di folder `app/config/` 
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
9. Anda sudah siap untuk mengatur aplikasi.

## Cara Mengatur Aplikasi

1. Coming Soon

## Database dan Tabel

### Tabel `merk`

| Name   | Type    | Lenght | Attribute                   |
| ------ | ------- | ------ | --------------------------- |
| id     | int     | 3      | auto_increment, primary_key |
| KdMerk | varchar | 50     | primary_key                 |
| NmMerk | varchar | 50     | -                           |

### Tabel `type`

| Name   | Type    | Lenght | Attribute                   |
| ------ | ------- | ------ | --------------------------- |
| id     | int     | 3      | auto_increment, primary_key |
| IdType | varchar | 20     | primary_key                 |
| NmType | varchar | 50     | -                           |
| KdMerk | varchar | 50     | -                           |

### Tabel `mobil`

| Name         | Type    | Lenght | Attribute                   |
| ------------ | ------- | ------ | --------------------------- |
| id           | int     | 3      | auto_increment, primary_key |
| NoPlat       | varchar | 10     | primary_key                 |
| KdMerk       | varchar | 20     | -                           |
| IdType       | varchar | 10     | -                           |
| StatusRental | enum    | 0      | Kosong, Jalan, Dipesan      |
| HargaSewa    | double  | 10     | -                           |
| FotoMobil    | varchar | 100    | -                           |

### Tabel `users`

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

### Tabel `user_role`

| Name | Type    | Lenght | Attribute                   |
| ---- | ------- | ------ | --------------------------- |
| id   | int     | 11     | auto_increment, primary_key |
| role | varchar | 20     | -                           |

### Tabel `sopir`

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

### Tabel `transaksi`

| Name              | Type    | Lenght | Attribute   |
| ----------------- | ------- | ------ | ----------- |
| NoTransaksi       | int     | 11     | primary_key |
| NIK               | char    | 13     | -           |
| NoPlat            | varchar | 10     | -           |
| TglPesan          | date    | 0      | -           |
| TglPinjam         | date    | 0      | -           |
| JamPinjam         | time    | 0      | -           |
| TglKembaliRencana | date    | 0      | -           |
| JamKembaliRencana | time    | 0      | -           |
| TglKembaliReal    | date    | 0      | -           |
| JamKembaliReal    | time    | 0      | -           |
| Kerusakan         | text    | 0      | -           |
| Denda             | double  | 11     | -           |
| BiayaKerusakan    | double  | 11     | -           |
| BiayaBBM          | double  | 11     | -           |
| IdSopir           | char    | 6      | -           |
| BiayaSopir        | double  | 11     | -           |
| Total             | double  | 11     | -           |
| status            | enum    | 0      | ""          |
| new               | char    | 1      | -           |