<!DOCTYPE html>
<html>
<head>
	<title>Data Tamu</title>
	<style>
		.container {
		  display: grid;
		  grid-template-columns: repeat(3, 1fr);
		  gap: 20px;
		}

		.card {
		  border: 1px solid #ccc;
		  padding: 10px;
		  margin-bottom: 10px;
		}

		.tabel {
		  font-family: Arial, Helvetica, sans-serif;
		  border-collapse: collapse;
		  width: 100%;
		}

		.tabel td,
		th {
		  border: 1px solid #ddd;
		  padding: 8px;
		}

		.tabel th {
		  background-color: #9DC183;
		  text-align: left;
		}

		.tabel tr:nth-child(even) {
		  background-color: #f2f2f2;
		}

		.tabel tr:hover {
		  background-color: #ddd;
		}

		@media screen and (max-width: 600px) {
		  .container {
		    grid-template-columns: 1fr;
		  }
		}

	</style>
</head>
<body>
<div class="container">
    <div class="card">
      <h2>Tambah Data Pegawai</h2>
	  <form method="POST" action="proses_tambah.php">
	    <label>Nama:</label><br>
	    <input type="text" name="nama" required><br>
	    <label>Alamat:</label><br>
	    <input type="text" name="alamat" required><br>
	    <label>Tanggal Lahir:</label><br>
	    <input type="date" name="tgl_lahir" required><br>
	    <label>Jabatan:</label><br>
	    <select name="jabatan_id" required>
	      <option value="">- Pilih Jabatan -</option>
	      <option value="1">Manajer</option>
	      <option value="2">Supervisor</option>
	      <option value="3">Staff</option>
	    </select><br><br>
	    <input type="submit" value="Tambah">
	  </form>
	</div>
	<div class="card">
	  <h2>Ubah Data Pegawai</h2>
	  <form method="POST" action="proses_ubah.php">
	    <label>Nama:</label><br>
	    <input type="text" name="nama" required><br>
	    <label>Alamat:</label><br>
	    <input type="text" name="alamat" required><br>
	    <label>Jabatan:</label><br>
	    <select name="jabatan_id" required>
	      <option value="">- Pilih Jabatan -</option>
	      <option value="1">Manajer</option>
	      <option value="2">Supervisor</option>
	      <option value="3">Staff</option>
	    </select><br><br>
	    <input type="hidden" name="id" value="">
	    <input type="submit" value="Ubah">
	  </form>
	</div>

	<div class="card">
	  <h2>Hapus Data Pegawai</h2>
	  <form method="GET" action="proses_hapus.php">
	    <label>ID Pegawai:</label><br>
	    <input type="text" name="id" required><br><br>
	    <input type="submit" value="Hapus">
	  </form>
	</div>
</div>
	<div class="tabel">
		<table>
	  <thead>
	    <tr>
	      <th>ID</th>
	      <th>Nama</th>
	      <th>Alamat</th>
	      <th>Tanggal Lahir</th>
	      <th>Gaji</th>
	      <th>Jabatan</th>
	    </tr>
	  </thead>
	  <tbody>
	    <?php
	      // membuat koneksi ke database
	      $host = "localhost";
	      $user = "root";
	      $password = "";
	      $dbname = "db_pegawai";
	      $koneksi = mysqli_connect($host, $user, $password, $dbname);

	      // memeriksa apakah koneksi berhasil dibuat
	      if (!$koneksi) {
	        die("Koneksi gagal: " . mysqli_connect_error());
	      }

	      // mengambil data pegawai dari tabel "pegawai" dan "jabatan"
	      $query = "SELECT pegawai.id, pegawai.nama, pegawai.alamat, pegawai.tgl_lahir, jabatan.gaji_pokok, jabatan.nama_jabatan
	                FROM pegawai
	                JOIN jabatan ON pegawai.jabatan_id = jabatan.id";
	      $result = mysqli_query($koneksi, $query);

	      // menampilkan data pegawai ke dalam tabel
	      while ($row = mysqli_fetch_assoc($result)) {
	        echo "<tr>";
	        echo "<td>" . $row["id"] . "</td>";
	        echo "<td>" . $row["nama"] . "</td>";
	        echo "<td>" . $row["alamat"] . "</td>";
	        echo "<td>" . $row["tgl_lahir"] . "</td>";
	        echo "<td>" . $row["gaji_pokok"] . "</td>";
	        echo "<td>" . $row["nama_jabatan"] . "</td>";
	        echo "</tr>";
	      }
      		// menutup koneksi ke database
     		 mysqli_close($koneksi);
		    ?>
		  </tbody>
		</table>
	</div>
</body>
</html>
