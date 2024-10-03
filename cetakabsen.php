<?php

// Koneksi ke database
include "connect.php";

// Header untuk export ke Excel
header("Content-type: application/vnd-ms-excel");
header("Content-Disposition: attachment; filename=data-absen.xls");

?>
<h1 class="text-center my-4 text-2xl">DATA ABSENSI</h1>
<div class="overflow-x-auto">
    <div class="mx-auto w-full max-w-4xl">
        <table class="table w-full" border="1" style="border-collapse: collapse;">
            <!-- head -->
            <thead>
                <tr>
                    <th style="border: 1px solid black;">No</th>
                    <th style="border: 1px solid black;">Nama</th>
                    <th style="border: 1px solid black;">Tanggal</th>
                    <th style="border: 1px solid black;">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT absensi.*, siswa.nama 
                FROM absensi 
                INNER JOIN siswa ON absensi.siswa_id = siswa.id";
                $result = $conn->query($sql);

                $counter = 1;

                while ($absensi_siswa = $result->fetch_assoc()) : ?>
                    <tr>
                        <td style="border: 1px solid black;"><?php echo $counter++; ?></td>
                        <td style="border: 1px solid black;"><?php echo $absensi_siswa['nama']; ?></td>
                        <td style="border: 1px solid black;"><?php echo $absensi_siswa['tanggal']; ?></td>
                        <td style="border: 1px solid black;"><?php echo $absensi_siswa['status']; ?></td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>