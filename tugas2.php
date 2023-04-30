<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$conn = mysqli_connect($servername, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create database
$sql = "CREATE DATABASE db_pegawai";
if (mysqli_query($conn, $sql)) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);

// Connect to newly created database
$conn = mysqli_connect($servername, $username, $password, "db_pegawai");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table jabatan
$sql = "CREATE TABLE jabatan (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama_jabatan VARCHAR(30) NOT NULL,
    gaji_pokok FLOAT(10,2) NOT NULL
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Table jabatan created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Create table pegawai
$sql = "CREATE TABLE pegawai (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(30) NOT NULL,
    alamat VARCHAR(50) NOT NULL,
    tgl_lahir DATE NOT NULL,
    gaji FLOAT(10,2) NOT NULL,
    jabatan_id INT(6) UNSIGNED,
    FOREIGN KEY (jabatan_id) REFERENCES jabatan(id)
) ENGINE=InnoDB";

if (mysqli_query($conn, $sql)) {
    echo "Table pegawai created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

// Close connection
mysqli_close($conn);
?>
