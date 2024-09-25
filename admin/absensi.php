



<?php include "template/header-admin.php" ?>
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
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $siswa_id = $_POST['siswa_id'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $absensiQuery = "INSERT INTO absensi (siswa_id, tanggal, status) VALUES ('$siswa_id', '$tanggal', '$status')";
    if ($conn->query($absensiQuery) === TRUE) {
        echo "Absensi berhasil ditambahkan";
    } else {
        echo "Error: " . $absensiQuery . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
</head>
<body>
  

    <h2>Tambah Siswa</h2>
<form method="POST" action="tambah_siswa.php">
    <label for="nama_siswa">Nama Siswa:</label>
    <input type="text" name="nama_siswa" required><br>

    <label for="jurusan_id">Jurusan:</label>
    <select name="jurusan_id" required>
        <?php
        // Reset jurusanResult pointer
        $jurusanResult->data_seek(0);
        while($row = $jurusanResult->fetch_assoc()): ?>
            <option value="<?= $row['id'] ?>"><?= $row['nama'] ?></option>
        <?php endwhile; ?>
    </select><br>

    <button type="submit">Tambah Siswa</button>
</form>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
</head>
<body>
    <h1>Absensi Siswa</h1>
    <form method="POST">
        <input type="hidden" name="action" value="insert">
        <label for="siswa_id">Nama Siswa:</label>
        <select name="siswa_id" required>
            <?php while($row = $siswaResult->fetch_assoc()): ?>
                <option value="<?= $row['id'] ?>"><?= $row['nama'] ?> (<?= $row['jurusan'] ?>)</option>
            <?php endwhile; ?>
        </select><br>

        


    <?php $conn->close(); ?>
</body>
</html>

    


