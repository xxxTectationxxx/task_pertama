<?php
$host = "localhost";
$user = "root";
$pass = "";  // Ganti dengan password MariaDB jika ada
$dbname = "data_user";

$conn = new mysqli($host, $user, $pass, $dbname);
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>
