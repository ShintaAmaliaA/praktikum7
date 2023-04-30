<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_buku_tamu";

// Create Connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Create table
$sql = "CREATE TABLE IF NOT EXISTS buku_tamu (
    ID_BT INT(10) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    NAMA VARCHAR(200) NOT NULL,
    EMAIL VARCHAR(50) NOT NULL,
    ISI TEXT NOT NULL
) ENGINE = InnoDB;";
if (mysqli_query($conn, $sql)) {
    echo "Table created successfully";
} else {
    echo "Error creating table: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
