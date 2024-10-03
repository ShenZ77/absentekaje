<?php

$servername = "localhost";
$username = "root"; // ganti sesuai username database Anda
$password = ""; // ganti sesuai password database Anda
$dbname = "absensi_siswa";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Mengambil data jurusan
$jurusanQuery = "SELECT * FROM jurusan";
$jurusanResult = $conn->query($jurusanQuery);

// Mengambil data siswa
$siswaQuery = "SELECT siswa.id, siswa.nama, jurusan.nama AS jurusan FROM siswa JOIN jurusan ON siswa.jurusan_id = jurusan.id";
$siswaResult = $conn->query($siswaQuery);

// Proses absensi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'insert') {
    $siswa_id = $_POST['siswa_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $absensiQuery = "INSERT INTO absensi (siswa_id, tanggal, status) VALUES ('$siswa_id', '$tanggal', '$status')";
    if ($conn->query($absensiQuery) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
        exit;
    } else {
        echo "Error: " . $absensiQuery . "<br>" . $conn->error;
    }
}

// Proses hapus absensi
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['action']) && $_POST['action'] == 'delete') {
    $absensi_id = $_POST['absensi_id'];
    
    $deleteQuery = "DELETE FROM absensi WHERE id = '$absensi_id'";
    if ($conn->query($deleteQuery) === TRUE) {
        header("Location: " . $_SERVER['PHP_SELF']); // Redirect ke halaman yang sama
        exit;
    } else {
        echo "Error: " . $deleteQuery . "<br>" . $conn->error;
    }
}

?>