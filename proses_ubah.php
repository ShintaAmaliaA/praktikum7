<?php
// Memeriksa apakah form telah disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {

  // Mengambil data dari form
  $nama = $_POST["nama"];
  $alamat = $_POST["alamat"];
  $jabatan_id = $_POST["jabatan_id"];

  // Membuat koneksi ke database
  $host = "localhost";
  $user = "root";
  $password = "";
  $dbname = "db_pegawai";
  $koneksi = mysqli_connect($host, $user, $password, $dbname);

  // Memeriksa apakah koneksi berhasil dibuat
  if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
  }

  // Mengubah data pegawai di dalam tabel "pegawai"
  $query = "UPDATE pegawai SET nama='$nama', alamat='$alamat', jabatan_id='$jabatan_id'";
  if (mysqli_query($koneksi, $query)) {
    echo "Data pegawai berhasil diubah";
    header("Refresh:2; url=pegawai.php");
  } else {
    echo "Terjadi kesalahan: " . mysqli_error($koneksi);
  }

  // Menutup koneksi ke database
  mysqli_close($koneksi);
}
?>
