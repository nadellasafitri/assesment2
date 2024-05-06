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

if (isset($_GET['judul'])) {
    $judul = $_GET['judul'];

    // Query untuk menghapus data
    $sql = "DELETE FROM manuskrip WHERE judul_manuskrip = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", judul);

    if ($stmt->execute()) {
        echo "Data berhasil dihapus.";
    } else {
        echo "Gagal menghapus data.";
    }

    $stmt->close();
}

$conn->close();
?>
