<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
include '../db/koneksi.php';
$admin = mysqli_query($conn, "SELECT * FROM galeri ORDER BY id DESC"); // Sesuaikan dengan nama tabel admin kamu
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Kelola Admin</title>
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
                        <a href="artikel.php" class="nav-link">
                            <i class="bi bi-journal-text"></i> Data Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="galeri.php" class="nav-link active">
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
                <h2>Data Galeri</h2>
                <a href="tambah-galeri.php" class="btn btn-primary">
                    <i class="bi bi-plus-circle"></i> Tambah Gambar
                </a>
            </div>

            <div class="table-responsive">
            <table class="table table-bordered table-hover bg-white shadow-sm text-center">
                <thead class="table-dark">
                    <tr>
                        <th>Gambar</th>
                        <th>Judul</th>
                        <th>Deskripsi</th>
                        <th>Dibuat oleh</th>
                        <th>Created at</th>
                        <th class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($row = mysqli_fetch_assoc($admin)) { ?>
                    <tr>
                        <td><img src="../uploads/galeri/<?= htmlspecialchars($row['url_gambar']); ?>" alt="" srcset="" style="width: 100px;"></td>
                        <td><?= htmlspecialchars($row['judul']); ?></td>
                        <td><?= htmlspecialchars($row['deskripsi']); ?></td>
                        <td><?= htmlspecialchars($row['diunggah_oleh']); ?></td>
                        <td><?= htmlspecialchars($row['created_at']); ?></td>
                        <td class="text-center">
                            <a href="edit_galeri.php?id=<?= $row['id']; ?>" class="btn btn-sm btn-warning">
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
        const adminId = this.dataset.id;

        Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data admin akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = `proses_galeri.php?hapus=${adminId}`;
            }
        });
    });
});
</script>

</body>
</html>
