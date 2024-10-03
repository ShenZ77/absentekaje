<?php
$servername = "localhost";
$username = "root"; // Ganti sesuai username database Anda
$password = ""; // Ganti sesuai password database Anda
$dbname = "absensi_siswa";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Proses hapus absensi
if (isset($_GET['absensi_id'])) {
    $absensi_id = $_GET['absensi_id'];

    $deleteQuery = "DELETE FROM absensi WHERE id='$absensi_id'";
    if ($conn->query($deleteQuery) === TRUE) {
        echo "Data absensi berhasil dihapus";
    } else {
        echo "Error: " . $deleteQuery . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: absensi.php"); 
?>
