<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Icon CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #343a40;
            color: white;
        }
        .sidebar a {
            color: #adb5bd;
            text-decoration: none;
        }
        .sidebar a:hover {
            color: #ffffff;
        }
        .sidebar .nav-link.active {
            background-color: #495057;
            color: #ffffff;
        }
    </style>
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-3 col-lg-2 d-md-block sidebar px-4 py-3">
            <div class="d-flex flex-column h-100">
                <h4 class="text-white mb-4">Dashboard</h4>
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item">
                        <a href="#" class="nav-link active">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data-admin.php" class="nav-link">
                            <i class="bi-person-lines-fill"></i> Data Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="artikel.php" class="nav-link">
                            <i class="bi bi-journal-text"></i> Data Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="galeri.php" class="nav-link">
                            <i class="bi bi-images"></i> Data Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-tags"></i> Data Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="bi bi-gear"></i> Pengaturan
                        </a>
                    </li>
                </ul>
                <div class="mt-auto">
                    <a href="../logout.php" class="btn btn-danger w-100 mt-4">
                        <i class="bi bi-box-arrow-right"></i> Logout
                    </a>
                </div>
            </div>
        </nav>

        <!-- Main Content -->
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4 py-4">
            <h2 class="mb-4">Selamat Datang, <?php echo $_SESSION['nama_lengkap']; ?>!</h2>

            <div class="row">
                
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS (opsional) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
