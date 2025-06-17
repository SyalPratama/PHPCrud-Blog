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
                        <a class="nav-link" href="index.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="about.php">Tentang Saya</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="artikel.php">Artikel</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="galeri.php">Galeri</a>
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
            <h1 class="hero-title">Galeri</h1>
            <p class="hero-subtitle">Kumpulan momen-momen berharga saya.</p>
        </div>
    </section>


    <!-- Gallery Section -->
    <section class="gallery-section">
        <div class="container">
            <h2 class="section-title mb-5">Galeri Foto</h2>
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

    <!-- Footer -->

    <?php include('layout/footer.php'); ?>