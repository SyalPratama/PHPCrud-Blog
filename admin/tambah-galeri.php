<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
include '../db/koneksi.php';

// Ambil data kategori dari tabel kategori
$admin = mysqli_query($conn, "SELECT id, nama_lengkap FROM admin ORDER BY id ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Gambar</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h3>Tambah Gambar</h3>
    <form action="proses_galeri.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="deskripsi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Admin</label>
            <select name="admin" class="form-select" required>
                <option value="">-- Pilih Admin --</option>
                <?php while($row = mysqli_fetch_assoc($admin)): ?>
                    <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['nama_lengkap']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        <a href="data-galeri.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
