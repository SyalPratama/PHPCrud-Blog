<?php
include '../db/koneksi.php';


if (isset($_POST['tambah'])) {
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    $query = "INSERT INTO admin (nama_lengkap, username, email, password) VALUES ('$nama', '$username', '$email', '$password')";
    if (mysqli_query($conn, $query)) {
        echo "<html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Admin berhasil ditambahkan!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'data-admin.php';
                });
            </script>
        </body>
        </html>";
    } else {
        echo "<html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    html: 'Gagal menambahkan admin.<br><small>$error</small>',
                    confirmButtonText: 'Coba Lagi'
                }).then(() => {
                    window.location.href = 'tambah_admin.php';
                });
            </script>
        </body>
        </html>";
    }

} elseif (isset($_POST['update'])) {
    $id = intval($_POST['id']);
    $nama = mysqli_real_escape_string($conn, $_POST['nama']);
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);

    if (!empty($_POST['password'])) {
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $query = "UPDATE admin SET nama_lengkap='$nama', username='$username', email='$email', password='$password' WHERE id=$id";
    } else {
        $query = "UPDATE admin SET nama_lengkap='$nama', username='$username', email='$email' WHERE id=$id";
    }

    if (mysqli_query($conn, $query)) {
        echo "<html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Admin berhasil diperbarui!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'data-admin.php';
                });
            </script>
        </body>
        </html>";
    } else {
        echo "<html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    html: 'Gagal memperbarui admin.<br><small>$error</small>',
                    confirmButtonText: 'Coba Lagi'
                }).then(() => {
                    window.location.href = 'tambah_admin.php';
                });
            </script>
        </body>
        </html>";
    }
}

if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM admin WHERE id = $id");
    header("Location: data-admin.php");
    exit;
}
?>
