<?php

// konfigurasi database
$host = "localhost";
$user = "root";
$password = "";
$dbname = "db_pegawai";
$koneksi = mysqli_connect($host, $user, $password, $dbname);

// cek koneksi ke database
if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
    exit();
}

// ambil id pegawai dari parameter GET
$id = isset($_GET['id']) ? mysqli_real_escape_string($koneksi, $_GET['id']) : null;

if (!$id) {
  echo "ID pegawai tidak ditemukan";
  exit();
}

// query hapus data pegawai berdasarkan id
$query = "DELETE FROM pegawai WHERE id='$id'";
$result = mysqli_query($koneksi, $query);

if ($result) {
  // jika berhasil, arahkan ke halaman daftar pegawai dengan pesan sukses
  header("Location: pegawai.php?status=sukses_hapus");
  exit();
} else {
  // jika gagal, arahkan ke halaman daftar pegawai dengan pesan gagal
  echo "Terjadi kesalahan saat menghapus data pegawai: " . mysqli_error($koneksi);
  exit();
}

?>
