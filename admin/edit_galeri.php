<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}
include '../db/koneksi.php';
$id = $_GET['id'];
$data = mysqli_query($conn, "SELECT * FROM galeri WHERE id = $id");
$row = mysqli_fetch_assoc($data);
?>
<!DOCTYPE html>
<html>
<head>
  <title>Edit Gambar</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container py-5">
  <h3>Edit Gambar</h3>
  <form action="proses_artikel.php" method="POST"  enctype="multipart/form-data">
    <input type="hidden" name="id" value="<?= $row['id']; ?>">
    <div class="mb-3">
      <label>Judul</label>
      <input type="text" name="judul" value="<?= $row['judul']; ?>" class="form-control" required>
    </div>
    <div class="mb-3">
      <label>Deskripsi</label>
      <textarea name="isi" class="form-control"><?= $row['deskripsi']; ?></textarea>
    </div>
    <div class="mb-3">
      <label>ID Admin</label>
      <input type="number" name="diunggah_oleh" value="<?= $row['diunggah_oleh']; ?>" class="form-control">
    </div>
    <div class="mb-3">
        <label>Gambar</label>
        <input type="file" name="gambar" class="form-control" accept="image/*" required>
    </div>
    <button type="submit" name="update" class="btn btn-success">Update</button>
    <a href="galeri.php" class="btn btn-secondary">Kembali</a>
  </form>
</div>
</body>
</html>
