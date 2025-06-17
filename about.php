<?php include('layout/header.php'); ?>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container">
            <a class="navbar-brand" href="index.html">MyBlog</a>
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
                        <a class="nav-link active" href="#">Tentang Saya</a>
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
            <h1 class="hero-title">Tentang Saya</h1>
            <p class="hero-subtitle">Pelajari lebih lanjut tentang saya dan apa yang saya lakukan.</p>
        </div>
    </section>

    <!-- About Me Section -->
    <section class="container about-section">
        <div class="row align-items-center">
            <div class="col-lg-5 mb-4 mb-lg-0">
                <img src="https://static.wikia.nocookie.net/ultra/images/8/8f/Ultraman_Noa_2004_HD_4.jpeg/revision/latest/scale-to-width-down/1000?cb=20230925043709"
                    alt="About Me" class="img-fluid rounded shadow about-img">
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Tentang Saya</h2>
                <p>Halo, saya adalah seorang pendidik dan praktisi teknologi informasi dengan pengalaman lebih dari 10
                    tahun di bidang pendidikan dan pengembangan web. Saat ini berperan sebagai guru Informatika di SMA
                    dan sebagai pengembang perangkat lunak.</p>
                <p>Saya juga seorang praktisi pengembangan web dengan keahlian khusus dalam PHP Native dan framework
                    modern. Memiliki pengalaman dalam merancang dan mengimplementasikan proyek berbasis web untuk
                    berbagai kebutuhan.</p>
            </div>
        </div>
    </section>

    <!-- Skills and Experience Section -->
    <section class="container skills-experience-section">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="section-title">Keterampilan</h2>
                <ul class="skills-list">
                    <li>Pengembangan Web dengan PHP Native</li>
                    <li>Penggunaan Framework Laravel</li>
                    <li>Desain UI/UX</li>
                    <li>Pengembangan Aplikasi Mobile</li>
                    <li>Manajemen Basis Data</li>
                </ul>
            </div>
            <div class="col-lg-6">
                <h2 class="section-title">Pengalaman</h2>
                <ul class="experience-list">
                    <li><strong>Guru Informatika</strong> - SMA XYZ (2015 - Sekarang)</li>
                    <li><strong>Pengembang Perangkat Lunak</strong> - PT. ABC (2010 - 2015)</li>
                    <li><strong>Freelance Web Developer</strong> (2008 - 2010)</li>
                </ul>
            </div>
        </div>
    </section>
<?php include('layout/footer.php'); ?>