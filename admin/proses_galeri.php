<?php

include '../db/koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $desk = $_POST['deskripsi'];
    $admin = $_POST['admin'];

    $created_at = date('Y-m-d H:i:s');
    $updated_at = date('Y-m-d H:i:s');

    // Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = '../uploads/galeri/';
    move_uploaded_file($tmp, $folder . $gambar);

    // Perhatikan tanda koma setelah '$gambar'
    $query = "INSERT INTO galeri (judul, deskripsi, diunggah_oleh, url_gambar, created_at, updated_at)
              VALUES ('$judul', '$desk', '$admin', '$gambar', '$created_at', '$updated_at')";

    if (mysqli_query($conn, $query)) {
        // Jika berhasil, tampilkan SweetAlert dan redirect
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: 'Gambar berhasil ditambahkan!',
                    confirmButtonText: 'OK'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'galeri.php';
                    }
                });
            </script>
        </body>
        </html>";
    } else {
        // Jika gagal
        echo "
        <html>
        <head>
            <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
        </head>
        <body>
            <script>
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: 'Gagal menambahkan gambar!',
                    confirmButtonText: 'Coba Lagi'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = 'tambah-galeri.php';
                    }
                });
            </script>
        </body>
        </html>";
    }
}



if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM galeri WHERE id = $id");
    header("Location: galeri.php");
    exit;
}