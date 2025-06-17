<?php include('layout/header.php'); ?>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="#">MyBlog</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Tentang Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="galeri.php">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="kontak.php">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->

    <section class="hero-section">
        <div class="container text-center hero-content">
            <h1 class="hero-title">Selamat Datang di Website Saya</h1>
            <p class="hero-subtitle">Berbagi pengalaman, ide dan semua hal tentang teknologi terkini.</p>
            <a href="#" class="btn btn-custom">Artikel</a>
        </div>
    </section>

    <!-- About Section -->
    <section class="container about-section">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="uploads/1.jpg"
                    alt="About Me" class="img-fluid rounded shadow about-img" />
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">About Me</h2>
                <p>Seorang pendidik dan praktisi teknologi informasi dengan pengalaman lebih dari 10 tahun di bidang
                    pendidikan dan pengembangan web. Saat ini berperan sebagai guru Informatika di SMA dosen dan
                    pengembang perangkat lunak.</p>
                <p>serta praktisi pengembangan web dengan keahlian khusus dalam PHP Native dan framework modern.
                    Memiliki pengalaman dalam merancang dan mengimplementasikan proyek berbasis web untuk berbagai
                    kebutuhan</p>
                <a href="#" class="read-more-btn">Read more about me <i class="fas fa-arrow-right"></i></a>
            </div>
        </div>
    </section>

    <!-- Articles Section -->
    <section class="container mb-5">
        <h2 class="section-title text-center mb-5">Artikel Terbaru</h2>
        <div class="row">
            <!-- Article 1 -->
            <?php
            include('db/koneksi.php');
            $query = "SELECT * FROM artikel WHERE status = 'diterbitkan' ORDER BY tanggal_terbit DESC LIMIT 6";
            $result = mysqli_query($conn, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                $judul = $row['judul'];
                $slug = $row['slug'];
                $cuplikan = $row['cuplikan'];
                $gambar = $row['url_gambar']; // sesuaikan path folder gambarmu
                $tanggal = date('F d, Y', strtotime($row['tanggal_terbit']));
                $waktu_baca = $row['waktu_baca'];
                echo '
                <div class="col-md-4 mb-4">
                    <div class="article-card">
                        <img src="uploads/' . $gambar . '" class="article-img" alt="' . htmlspecialchars($judul) . '" />
                        <div class="article-body">
                            <div class="article-meta">' . $tanggal . ' • ' . $waktu_baca . ' min read</div>
                            <h3 class="article-title">' . htmlspecialchars($judul) . '</h3>
                            <p class="article-excerpt">' . htmlspecialchars($cuplikan) . '</p>
                            <a href="artikel-detail.php?slug=' . urlencode($slug) . '" class="read-more-btn">Selengkapnya <i class="fas fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>

        <div class="text-center mt-4">
            <a href="#" class="btn btn-custom">Semua Artikel</a>
        </div>
    </section>

    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title text-center mb-5">Galeri Foto</h2>
            <div class="row">

                <!-- Gallery 1 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://static.wikia.nocookie.net/ultra/images/a/a1/Ultrrmn_Noa_IVI.png/revision/latest/scale-to-width-down/1000?cb=20121104131452"
                            class="gallery-img" alt="Gallery 1">
                        <div class="gallery-overlay">
                            <i class="fas fa-search gallery-icon"></i>
                        </div>
                    </div>
                </div>

                <!-- Gallery 2 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://static.wikia.nocookie.net/ultra/images/d/da/Ultraman_Noa_Dark_Zagi_HD_002.png/revision/latest/scale-to-width-down/1000?cb=20240124164248"
                            class="gallery-img" alt="Gallery 2">
                        <div class="gallery-overlay">
                            <i class="fas fa-search gallery-icon"></i>
                        </div>
                    </div>
                </div>

                <!-- Gallery 3 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://static.wikia.nocookie.net/ultra/images/f/f5/Ultraman_Noa_4.png/revision/latest?cb=20130915090708"
                            class="gallery-img" alt="Gallery 3">
                        <div class="gallery-overlay">
                            <i class="fas fa-search gallery-icon"></i>
                        </div>
                    </div>
                </div>

                <!-- Gallery 4 -->
                <div class="col-6 col-md-4 col-lg-3">
                    <div class="gallery-item">
                        <img src="https://static.wikia.nocookie.net/ultra/images/e/e7/Ultraman_Noa_2004_HD_3.png/revision/latest/scale-to-width-down/1000?cb=20230925043650"
                            class="gallery-img" alt="Gallery 4">
                        <div class="gallery-overlay">
                            <i class="fas fa-search gallery-icon"></i>
                        </div>
                    </div>
                </div>

                <div class="text-center mt-4">
                    <a href="#" class="btn btn-custom">Lihat Galeri</a>
                </div>

            </div>
        </div>
    </section>
    <?php include('layout/footer.php'); ?>