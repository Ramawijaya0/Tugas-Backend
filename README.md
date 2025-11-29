# Panduan Instalasi dan Menjalankan Project

Project ini menggunakan PHP dasar dan MySQL. Ikuti langkah-langkah berikut untuk menjalankannya.

## 1. Persiapan Awal

Pastikan sudah menginstall:
- PHP versi 8
- XAMPP (untuk Apache dan MySQL)

Jalankan **Apache** dan **MySQL** melalui XAMPP.

## 2. Membuat Database

1. Buka XAMPP, jalankan MySQL.
2. Klik tombol **Admin** untuk membuka phpMyAdmin di browser.
3. Buat database baru.
4. Masuk menu **Import**, pilih file schema.sql yang sudah disediakan.
5. Import sampai selesai.

## 3. Menyiapkan Folder Project

Masuk ke folder *htdocs* di XAMPP, lalu buat folder:

```
Tugas-Backend
```

Struktur folder:

```
Tugas-Backend/
  index.php
  core/
    Database.php
  config/
    database.php
  controllers/
    BookController.php
  models/
    Book.php
  views/
    book_list.php
    book_add.php
    book_edit.php
  uploads/
```

## 4. Mengatur Koneksi Database

Edit file:

```
config/database.php
```

Isi dengan:

```
<?php
return [
    "host" => "localhost",
    "user" => "root",
    "pass" => "",
    "db"   => "nama_database_anda"
];
```

## 5. Menyalin Kode

Salin isi kode ke masing-masing file sesuai strukturnya. Jangan mengubah nama file atau folder agar aplikasi berjalan normal.

## 6. Menjalankan Aplikasi

Buka terminal pada Vs-Code, Lalu ketikkan:

```
PHP -S localhost:8000
```
Lalu link akan diberikan nanti oleh Vs code. Tinggal di pencet saja.


# Dokumentasi penggunaan aplikasi

## 1. Menambah Data Buku
1. Klik tombol **+ Tambah Buku**.
2. Lalu akan diarahkan ke halamannya.
3. Setelah itu user bisa menginput data buku (Judul, Penulis, Kategori, Dan Cover buku).
4. Lalu klik tombol **Simpan**.

## 2. Mengedit Data Buku
1. Klik tombol **Edit**.
2. User bisa mengubah data buku, Prosesnya sama seperti menambah data buku.
3. Setelah di edit, Klik tombol **Update**.

## 3. Menghapus Data buku
1. Klik tombol **Delete**.
2. Akan muncul pesan "Yakin ingin menghapus buku ini?".
3. Lalu klik **ok** untuk menghapus.
