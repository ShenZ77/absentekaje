<?php include "template/header-admin.php" ?>
<?php 

    $kegiatan = query("SELECT * FROM kegiatan");
    $jumlah = count($kegiatan);

    $jabatan = query("SELECT * FROM jabatan");
    $jumlahJabatan = count($jabatan);

    $users = query("SELECT * FROM tb_users");
    $jumlahUsers = count($users);

?>
<div class="card">
    <div class="cardHeader">
        <h2>ADMIN</h2>
           <p> </p>
           <!-- <p>cek selengkapnya di <a href="kegiatan-admin.php">disini</a></p> -->
    </div>
    </div>
<div class="card">
    <div class="cardHeader">
        <h2>ADMIN </h2>
        <p></p>
        <!-- <p>cek selengkapnya di <a href="jabatan.php">disini</a></p> -->
    </div>
</div>
<div class="card">
    <div class="cardHeader">
        <h2>ADMIN</h2>
        <p></p>
        <!-- <p>cek selengkapnya di <a href="users-management.php">disini</a></p> -->
    </div>
</div>
<?php include "template/footer.php" ?>