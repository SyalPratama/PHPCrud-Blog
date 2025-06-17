<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
include '../db/koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM artikel WHERE id = $id");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Artikel</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h3>Edit Artikel</h3>
  <form action="proses_artikel.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" value="<?= $row['judul']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Slug</label>
      <input type="text" name="slug" value="<?= $row['slug']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Isi</label>
      <textarea name="isi" class="form-control"><?= $row['isi']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>Cuplikan</label>
      <textarea name="cuplikan" class="form-control"><?= $row['cuplikan']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>ID Kategori</label>
      <input type="number" name="id_kategori" value="<?= $row['id_kategori']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control" accept="image/*" required>
    </div>
    <div class="mb-3">
      <label>Status</label>
      <select name="status" class="form-control">
        <option value="draf" <?= $row['status'] == 'draf' ? 'selected' : '' ?>>Draf</option>
        <option value="diterbitkan" <?= $row['status'] == 'diterbitkan' ? 'selected' : '' ?>>Diterbitkan</option>
      </select>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="artikel.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
