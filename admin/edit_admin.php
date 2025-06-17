<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

include '../db/koneksi.php';

$id = intval($_GET['id']);
$query = mysqli_query($conn, "SELECT * FROM admin WHERE id = $id");
$data = mysqli_fetch_assoc($query);

if (!$data) {
    echo "<script>alert('Admin tidak ditemukan'); window.location.href = 'data_admin.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
<div class="container mt-5">
    <h2>Edit Admin</h2>
    <form action="proses_admin.php" method="POST">
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" class="form-control" id="username" name="username" value="<?= htmlspecialchars($data['username']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="nama" class="form-label">Nama Lengkap</label>
            <input type="text" class="form-control" id="nama" name="nama" value="<?= htmlspecialchars($data['nama_lengkap']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email Admin</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= htmlspecialchars($data['email']); ?>" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi (biarkan kosong jika tidak diubah)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" name="update" class="btn btn-success">Update</button>
        <a href="data_admin.php" class="btn btn-secondary">Batal</a>
    </form>
</div>
</body>
</html>
