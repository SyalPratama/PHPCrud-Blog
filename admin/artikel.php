<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
include '../db/koneksi.php';
$artikel = mysqli_query($conn, "SELECT * FROM artikel ORDER BY id DESC");
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Artikel</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap 5 & Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
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
                        <a href="dashboard.php" class="nav-link">
                            <i class="bi bi-house-door"></i> Beranda
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="data-admin.php" class="nav-link">
                            <i class="bi bi-person-lines-fill"></i> Data Admin
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="artikel.php" class="nav-link active">
                            <i class="bi bi-journal-text"></i> Data Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="galeri.php" class="nav-link">
                            <i class="bi bi-images"></i> Data Galeri
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="kategori.php" class="nav-link">
                            <i class="bi bi-tags"></i> Data Kategori
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="pengaturan.php" class="nav-link">
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
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h2>Kelola Artikel</h2>
                <a href="tambah_artikel.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Artikel
                </a>
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm">
                <thead class="table-dark">
                    <tr>
                        <th>Gambar</th> <!-- Kolom gambar -->
                        <th>Judul</th>
                        <th>Cuplikan</th>
                        <th>Kategori</th>
                        <th>Status</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($artikel)) { ?>
                    <tr>
                        <td class="text-center">
                            <?php if (!empty($row['url_gambar'])): ?>
                                <img src="../uploads/<?= htmlspecialchars($row['url_gambar']) ?>" alt="Gambar" width="80" height="60" style="object-fit: cover; border-radius: 5px;">
                            <?php else: ?>
                                <span class="text-muted">Tidak ada</span>
                            <?php endif; ?>
                        </td>
                        <td><?= htmlspecialchars($row['judul']); ?></td>
                        <td><?= htmlspecialchars(substr($row['cuplikan'], 0, 50)) ?>...</td>
                        <td><?= $row['id_kategori']; ?></td>
                        <td><?= ucfirst($row['status']); ?></td>
                        <td class="text-center">
                            <a href="edit_artikel.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">
                                <i class="bi bi-pencil-square"></i>
                            </a>
                            <button class="btn btn-sm btn-danger btn-hapus" data-id="<?= $row['id']; ?>">
                                <i class="bi bi-trash"></i>
                            </button>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
            </div>
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 CDN -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
document.querySelectorAll('.btn-hapus').forEach(button => {
    button.addEventListener('click', function () {
        const artikelId = this.dataset.id;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data artikel akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Redirect ke proses hapus
                window.location.href = `proses_artikel.php?hapus=${artikelId}`;
            }
        });
    });
});
</script>

</body>
</html>
