<?php include "template/header.php"; ?>
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

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Absensi Siswa</title>
    <link rel="stylesheet" href="css/button.css">
    <link rel="stylesheet" href="js/burger.js">
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

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required><br>

        <label for="status">Status:</label>
        <select name="status" required>
            <option value="Hadir">Hadir</option>
            <option value="Tidak Hadir">Tidak Hadir</option>
            <option value="Sakit">Sakit</option>
            <option value="Izin">Izin</option>
        </select><br>

        <button type="submit">Kirim</button>
    </form>

    <h2>Daftar Absensi</h2>
    <table border="1">
        <tr>
            <th>Nama Siswa</th>
            <th>Tanggal</th>
            <th>Status</th>
            <th>Aksi</th>
        </tr>
        <?php
        $absensiQuery = "SELECT absensi.id, siswa.nama, absensi.tanggal, absensi.status FROM absensi JOIN siswa ON absensi.siswa_id = siswa.id";
        $absensiResult = $conn->query($absensiQuery);
        while($row = $absensiResult->fetch_assoc()):
        ?>
            <tr>
                <td><?= $row['nama'] ?></td>
                <td><?= $row['tanggal'] ?></td>
                <td><?= $row['status'] ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="absensi_id" value="<?= $row['id'] ?>">
                        <input type="hidden" name="action" value="delete">
                        <button type="submit" onclick="return confirm('Apakah Anda yakin ingin menghapus?');">Hapus</button>
                    </form>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>

<div class="container">
<a href="cetakabsen.php" class="print-button btn-gradient">Cetak</a>

</button>
</div>

         

         

    <?php $conn->close(); ?>
</body>
</html>

<?php include "template/footer.php"; ?>
