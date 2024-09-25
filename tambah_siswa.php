<?php
session_start();
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

// Proses tambah siswa
if ($_SERVER["REQUEST_METHOD"] == "POST") { 
    $nama_siswa = $_POST['nama_siswa'];
    $jurusan_id = $_POST['jurusan_id'];

    $insertQuery = "INSERT INTO siswa (nama, jurusan_id) VALUES ('$nama_siswa', '$jurusan_id')";
    if ($conn->query($insertQuery) === TRUE) {
        echo "Siswa berhasil ditambahkan";
    } else {
        echo "Error: " . $insertQuery . "<br>" . $conn->error;
    }
}

$conn->close();
header("Location: index.php"); // Kembali ke halaman utama setelah menambah siswa
exit;
?>


<?php
