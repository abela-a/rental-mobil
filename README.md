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

## Database dan Tabel

### Tabel Merk

| Name   | Type    | Lenght | Attribute                   |
| ------ | ------- | ------ | --------------------------- |
| id     | int     | 3      | auto_increment, primary_key |
| KdMerk | varchar | 50     | primary_key                 |
| NmMerk | varchar | 50     | -                           |

### Tabel Type

| Name   | Type    | Lenght | Attribute                   |
| ------ | ------- | ------ | --------------------------- |
| id     | int     | 3      | auto_increment, primary_key |
| IdType | varchar | 20     | primary_key                 |
| NmType | varchar | 50     | -                           |
| KdMerk | varchar | 50     | -                           |

### Tabel Mobil

| Name         | Type    | Lenght | Attribute                   |
| ------------ | ------- | ------ | --------------------------- |
| id           | int     | 3      | auto_increment, primary_key |
| NoPlat       | varchar | 10     | primary_key                 |
| KdMerk       | varchar | 20     | -                           |
| IdType       | varchar | 10     | -                           |
| StatusRental | enum    | 0      | Kosong, Jalan, Dipesan      |
| HargaSewa    | double  | 10     | -                           |
| FotoMobil    | varchar | 100    | -                           |
