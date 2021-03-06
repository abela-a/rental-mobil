# CHANGELOG

Semua perubahan yang terjadi akan didokumentasikan di berkas ini.

Format ini berdasarkan dari [Keep a Changelog](https://keepachangelog.com/en/1.0.0/).

****

## 📅 *[Unreleased]*

> Berikut fitur-fitur yang akan **ditambahkan**, **fix** bug yang akan dilakukan, **perubahan** yang akan disimpan, dan **penghapusan** fitur yang akan dilakukan dikemudian hari.

## **[1.1.1]** - [Tanggal Selesai]

##### ✅ Added

* [ ]  Section Daftar Mobil
* [ ]  Section Layanan

##### 🔄 Changed

##### 📝 Deprecated

##### ❌ Removed

##### 🔨 Fixed

****

## 📆 *[Released]*

> Versi yang yang telah dapat dipakai. Dan semoga fiturnya sudah tidak mempunyai bug.

🔥 [Download Latest Version](https://gitlab.com/abela-a/RentalMobil/-/releases)

## **[1.1.0]** - [2019-11-15]

##### ✅ Added

- Sistem Transaksi
  - Pemesanan
  - Transaksi
  - Arsip Transaksi
  - Pemesanan Online
- Laporan
- Kwitansi
- Dashboard
  - Status Aplikasi
  - Stepper Latest Transaksi

##### 🔄 Changed

- Tabel Sopir, tabel transaksi, dan tabel mobil
  - JenisMobil dan Transmisi @ tabel mobil
- Method GET User Profile menjadi SESSION
- Button di table menjadi kecil

##### 📝 Deprecated

##### ❌ Removed

##### 🔨 Fixed

- Role Karyawan
- Role Pelanggan
- SweetAlert
- Autonumber, jika tabel sebelumnya kosong
- Select jenis kelamin @ editprofile

## **[1.0.0]** - [2019-10-19]

##### ✅ Added

- Landing Page
- New UI design
- Loader
- New Scrollbar
- Fungsi SweetAlert2
- Show/Hide Password
- Nav Laporan

##### 🔄 Changed

- Modal modern style
- Login dan Register page modern style
- Login dan Register page menjadi modal di Homepage
- Layout dashboard, merk, tipe, mobil, karyawan, pelanggan, akun pending, role, sopir, profile menjadi modern-style

##### ❌ Removed

- Implementasi Flasher default
- Sidebar
- Tab Management
- Count Daftar Mobil

##### 🔨 Fixed

- Upload foto mobil dan user
- Auth Login dan Register

## **[0.9.0]** - 2019-10-11

##### ✅ Added

- Landing Page @ *index.php* "home"
- Material Select @ *script.js*
- Complete Footer Home
- Footer Dashboard
- LICENCE

##### 🔄 Changed

- Header Homepage @ *navhome.php*
- prettyfooter.php -> footerhome.php
- Icon web
- CHANGELOG.md

## **[0.8.0]** - 2019-10-10

##### ✅ Added

- Folder test
- File *dashboard.php* @ "test"
- Link asset dan vendor @ *header.php*

##### 🔄 Changed

- README.md

## **[0.7.0]** - 2019-10-05

##### ✅ Added

- CHANGELOG
- Alert ubah password @ *editprofile.php*, *karyawan.php*, dan *pelanggan.php*
- Fungsi jika password tidak ingin di ubah @ *editprofile.php*
- Fitur @ *README.md*
- Folder *vendor* dan *img*

##### 🔄 Changed

- ekstensi CHANGELOG
- .gitignore

##### ❌ Removed

- Isi KOPAS di README.md

## **[0.6.0]** - 2019-10-03

##### ✅ Added

- Isi KOPAS di README.md
- View Template
  - navpelanggan.php
  - navkaryawan.php

##### 🔄 Changed

- config.php
- navadmin.php

## **[0.5.0]**

##### ✅ Added

- Controller Pelanggan
- Model
  - Pelanggan_model.php
  - Sopir_model.php
  - User_model.php
- View
  - Admin
    - karyawan.php
    - pendinguser.php
    - role.php
  - Pelanggan
    - editprofile.php
    - transaksi.php
  - Karyawan
    - sopir.php
    - pelanggan.php
  
##### ❌ Removed
- View Admin
  - index.php

## **[0.4.0]**

##### ✅ Added

- Controller Karyawan
- Model
  - Karyawan_model.php
  - Merk_model.php
  - Type_model.php
  - Mobil_model.php
- View
  - dashboard.php
  - getType.php
  - merk.php
  - type.php
  - mobil.php

## **[0.3.0]**

##### ✅ Added

- Sistem Login dan Register
- Multiuser dan Role
- Controller Auth
- Model 
  - Auth_model.php
- View Auth
  - login.php
  - registration.php
- SweetAlert

## **[0.2.0]**

##### ✅ Added

- Controller Home
- View Home
  - index.php
- View templates
  - navhome.php
  - navadmin.php
  - header.php
  - footer.php

## **[0.1.0]**

##### ✅ Added

- MVC
  - config
    - Config.php
  - controller
  - core
    - App.php
    - Controller.php
    - Database.php
    - Flasher.php
  - models
  - views
- Controller Home
- Controller Admin
- View Admin
  - index.php
- Model 
  - Admin_model.php
- Link all asset