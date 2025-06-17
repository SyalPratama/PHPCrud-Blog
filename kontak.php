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
                        <a class="nav-link" href="galeri.php">Galeri</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="kontak.php">Kontak</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->

    <section class="hero-section">
        <div class="container text-center hero-content">
            <h1 class="hero-title">Kontak Saya</h1>
            <p class="hero-subtitle">Jangan ragu untuk menghubungi saya.</p>
        </div>
    </section>

    <section class="container my-5">
        <h2 class="section-title mb-5">Hubungi Saya</h2>
        <div class="card shadow">
            <div class="card-body">
                <div class="row">

                    <div class="col-md-6 mb-4 mb-md-0">
                        <h5 class="mb-3">Lokasi Saya</h5>
                        <div class="ratio ratio-16x9">
                            <iframe
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31691.278899195117!2d108.24206485599169!3d-6.841367612023001!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6f25c00a123f11%3A0x987bd741ca59ef73!2sCigasong%2C%20Kec.%20Cigasong%2C%20Kabupaten%20Majalengka%2C%20Jawa%20Barat!5e0!3m2!1sid!2sid!4v1746199164298!5m2!1sid!2sid"
                                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                                referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <form action="">
                            <div class="mb-3">
                                <label for="name" class="form-label">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" id="name"
                                    placeholder="Masukkan nama anda...">
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Masukkan email anda...">
                            </div>

                            <div class="mb-3">
                                <label for="subject" class="form-label">Subject</label>
                                <input type="text" class="form-control" name="subject" id="subject"
                                    placeholder="Masukkan subjek...">
                            </div>

                            <div class="mb-3">
                                <label for="message" class="form-label">Pesan</label>
                                <textarea class="form-control" name="message" id="message" rows="4"
                                    placeholder="Masukkan pesan anda disini"></textarea>
                            </div>

                            <div class="text-end">
                                <button type="submit" class="btn btn-custom">Kirim</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php include('layout/footer.php'); ?>