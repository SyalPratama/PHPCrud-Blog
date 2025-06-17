<?php
include '../db/koneksi.php';

if (isset($_POST['tambah'])) {
    $judul = $_POST['judul'];
    $slug = $_POST['slug'];
    $isi = $_POST['isi'];
    $cuplikan = $_POST['cuplikan'];
    $id_kategori = $_POST['id_kategori'];
    $status = $_POST['status'];

    // Upload Gambar
    $gambar = $_FILES['gambar']['name'];
    $tmp = $_FILES['gambar']['tmp_name'];
    $folder = '../uploads/';
    move_uploaded_file($tmp, $folder . $gambar);

    $query = "INSERT INTO artikel (judul, slug, isi, cuplikan, id_kategori, status, url_gambar)
              VALUES ('$judul', '$slug', '$isi', '$cuplikan', '$id_kategori', '$status', '$gambar')";

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
                text: 'Artikel berhasil ditambahkan!',
                confirmButtonText: 'OK'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'artikel.php';
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
                text: 'Gagal menambahkan artikel!',
                confirmButtonText: 'Coba Lagi'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = 'tambah_artikel.php';
                }
            });
        </script>
    </body>
    </html>";
}
}


if (isset($_POST['update'])) {
    include '../db/koneksi.php';

    $id = intval($_POST['id']);
    $judul = mysqli_real_escape_string($conn, $_POST['judul']);
    $deskripsi = mysqli_real_escape_string($conn, $_POST['deskripsi']);
    $updated_at = date('Y-m-d H:i:s');

    // Cek apakah ada file gambar yang diupload
    if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
        $gambar = basename($_FILES['gambar']['name']);
        $tmp = $_FILES['gambar']['tmp_name'];
        $folder = '../uploads/galeri/';
        $path = $folder . $gambar;

        move_uploaded_file($tmp, $path);

        $sql = "UPDATE galeri SET 
                    judul = '$judul',
                    deskripsi = '$deskripsi',
                    url_gambar = '$gambar',
                    updated_at = '$updated_at'
                WHERE id = $id";
    } else {
        $sql = "UPDATE galeri SET 
                    judul = '$judul',
                    deskripsi = '$deskripsi',
                    updated_at = '$updated_at'
                WHERE id = $id";
    }

    if (mysqli_query($conn, $sql)) {
        // Jika berhasil
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
                    text: 'Galeri berhasil diperbarui!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = 'data-galeri.php';
                });
            </script>
        </body>
        </html>";
    } else {
        // Jika gagal
        $error = mysqli_error($conn);
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
                    html: 'Gagal memperbarui galeri.<br><small>$error</small>',
                    confirmButtonText: 'Coba Lagi'
                }).then(() => {
                    window.location.href = 'edit_galeri.php?id=$id';
                });
            </script>
        </body>
        </html>";
    }
}



if (isset($_GET['hapus'])) {
    $id = $_GET['hapus'];
    mysqli_query($conn, "DELETE FROM artikel WHERE id = $id");
    header("Location: artikel.php");
    exit;
}
