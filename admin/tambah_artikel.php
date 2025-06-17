<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
include '../db/koneksi.php';

// Ambil data kategori dari tabel kategori
$kategori = mysqli_query($conn, "SELECT id, nama FROM kategori_artikel ORDER BY nama ASC");
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Artikel</title>
    <meta charset="UTF-8">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
    <h3>Tambah Artikel</h3>
    <form action="proses_artikel.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
            <label>Judul</label>
            <input type="text" name="judul" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Slug</label>
            <input type="text" name="slug" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Isi</label>
            <textarea name="isi" class="form-control" rows="5" required></textarea>
        </div>
        <div class="mb-3">
            <label>Cuplikan</label>
            <textarea name="cuplikan" class="form-control" rows="3"></textarea>
        </div>
        <div class="mb-3">
            <label>Kategori</label>
            <select name="id_kategori" class="form-select" required>
                <option value="">-- Pilih Kategori --</option>
                <?php while($row = mysqli_fetch_assoc($kategori)): ?>
                    <option value="<?= $row['id']; ?>"><?= htmlspecialchars($row['nama']); ?></option>
                <?php endwhile; ?>
            </select>
        </div>
        <div class="mb-3">
            <label>Gambar</label>
            <input type="file" name="gambar" class="form-control" accept="image/*" required>
        </div>
        <div class="mb-3">
            <label>Status</label>
            <select name="status" class="form-select" required>
                <option value="draf">Draf</option>
                <option value="diterbitkan">Diterbitkan</option>
            </select>
        </div>
        <button type="submit" name="tambah" class="btn btn-primary">Simpan</button>
        <a href="data_artikel.php" class="btn btn-secondary">Kembali</a>
    </form>
</div>
</body>
</html>
