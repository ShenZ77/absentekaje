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

// Proses penambahan siswa
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['tambah_siswa'])) {
    $nama_siswa = $_POST['nama_siswa'];
    $jurusan_id = $_POST['jurusan_id'];

    $siswaInsertQuery = "INSERT INTO siswa (nama, jurusan_id) VALUES ('$nama_siswa', '$jurusan_id')";
    if ($conn->query($siswaInsertQuery) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $siswaInsertQuery . "<br>" . $conn->error;
    }
}

// Proses penghapusan siswa
if (isset($_GET['hapus_siswa_id'])) {
    $siswa_id = $_GET['hapus_siswa_id'];
    $hapusQuery = "DELETE FROM siswa WHERE id = $siswa_id";
    if ($conn->query($hapusQuery) === TRUE) {
        echo "";
    } else {
        echo "Error: " . $hapusQuery . "<br>" . $conn->error;
    }
}

// Mengambil data siswa
$siswaQuery = "SELECT siswa.id, siswa.nama, jurusan.nama AS jurusan FROM siswa JOIN jurusan ON siswa.jurusan_id = jurusan.id";
$siswaResult = $conn->query($siswaQuery);
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
    <form method="POST" action="">
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

        <button type="submit" name="tambah_siswa">Tambah Siswa</button>
    </form>

    <h2>Daftar Siswa</h2>
    <table border="1">
        <tr>
            <th>Nama</th>
            <th>Jurusan</th>
            <th>Aksi</th>
        </tr>
        <?php while($row = $siswaResult->fetch_assoc()): ?>
        <tr>
            <td><?= $row['nama'] ?></td>
            <td><?= $row['jurusan'] ?></td>
            <td>
                <a href="?hapus_siswa_id=<?= $row['id'] ?>" onclick="return confirm('Apakah Anda yakin ingin menghapus siswa ini?')">Hapus</a>
            </td>
        </tr>
        <?php endwhile; ?>
    </table>

    <?php $conn->close(); ?>
</body>
</html>
