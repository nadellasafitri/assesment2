<?php
// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "publikasi_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Query untuk mengambil data
$sql = "SELECT judul_manuskrip, penulis, editor, status, tanggal_masuk, tanggal_revisi_terakhir FROM manuskrip";
$result = $conn->query($sql);

$manuskripData = [];

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $manuskripData[] = $row;
    }
}

$conn->close();

// Mengubah data ke JSON
header('Content-Type: application/json');
echo json_encode($manuskripData);
?>
