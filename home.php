<?php include "template/header.php" ?>

<style>
    /* CSS untuk font modern */
    html, body {
        margin: 0;
        padding: 0;
        height: 100%; /* Memastikan html dan body mengisi penuh */
        font-family: 'Roboto', sans-serif;
    }

    /* Container untuk Hero dan About */
    
    

    /* Hero Section */
    .hero {
        background-image: url('assets/image/sigmarule.jpg'); /* Ganti dengan URL gambar Anda */
        background-size: cover;
        background-position: center;
        width: 50%; /* Setengah dari lebar kontainer */
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
        padding: 0 20px;
    }

    .hero h1 {
        font-size: 4rem;
        font-weight: 700;
        margin-bottom: 20px;
    }

    .hero p {
        font-size: 1.5rem;
        margin-bottom: 40px;
    }

    .hero button {
        background-color: #007BFF;
        color: white;
        border: none;
        padding: 15px 30px;
        font-size: 1.2rem;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .hero button:hover {
        background-color: #0056b3;
    }

    /* Tentang Section */
    .about {
        width: 50%; /* Setengah dari lebar kontainer */
        padding: 60px 20px;
        background-color: #fff;
        text-align: center;
        display: flex;
        flex-direction: column;
        justify-content: center; /* Mengatur teks agar berada di tengah vertikal */
    }

    .about h2 {
        font-size: 2.5rem;
        font-weight: 700;
        margin-bottom: 20px;
        color: #333;
    }

    .about p {
        font-size: 1.2rem;
        color: #555;
        line-height: 1.8;
        max-width: 800px;
        margin: 0 auto;
    }

    /* Footer Section */
    footer {
        background-color: #333;
        color: white;
        padding: 20px;
        text-align: center;
    }

    /* Responsif */
    @media (max-width: 768px) {
        .hero h1 {
            font-size: 2.5rem;
        }

        .hero p {
            font-size: 1.2rem;
        }

        .about h2 {
            font-size: 2rem;
        }

        .about p {
            font-size: 1rem;
        }

        
        }

        .hero, .about {
            width: 100%; /* Lebar penuh untuk perangkat kecil */
            height: auto; /* Mengatur tinggi menjadi otomatis */
        }
    
</style>

<!-- Container untuk Hero dan About -->
<div class="container">
    <!-- Hero Section -->
    <div class="hero">
        <div>
            <h1>Welcome to Absensi Online</h1>
            <p>Absensi ini digunakan oleh guru .</p>
            <!-- <button>Explore More</button> -->
        </div>
    </div>

    <!-- About Section -->
    <div class="about">
        <h1>Tentang Absensi</h1>
        <p>
        Aplikasi Absensi Siswa ini merupakan solusi digital yang dirancang khusus untuk mempermudah guru dalam memantau kehadiran siswa. Aplikasi ini memberikan kemudahan dalam pencatatan, pengelolaan, dan pelaporan data absensi siswa. Aplikasi ini dapat diakses melalui perangkat mobile maupun desktop, sehingga guru dapat melakukan absensi kapan saja dan di mana saja.
        </p>
    </div>
</div>

<!-- Footer -->


<?php include "template/footer.php" ?>
