<?php
session_start();

include "db/koneksi.php";

// Ambil input
$email = $conn->real_escape_string($_POST['email']);
$password = md5($_POST['password']); // MD5 hash

// Cek data
$sql = "SELECT * FROM admin WHERE email = '$email' AND password = '$password'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $user = $result->fetch_assoc();
    $_SESSION['email'] = $user['email'];
    $_SESSION['nama_lengkap'] = $user['nama_lengkap']; // pastikan ini ditambahkan
    header("Location: admin/dashboard.php");
    exit;
} else {
    // Jika gagal, tampilkan SweetAlert
    echo '
    <!DOCTYPE html>
    <html>
    <head>
        <title>Login Gagal</title>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                Swal.fire({
                    icon: "error",
                    title: "Login Gagal",
                    text: "Email atau password salah!",
                    confirmButtonText: "Coba Lagi"
                }).then(() => {
                    window.location.href = "login.php";
                });
            });
        </script>
    </head>
    <body></body>
    </html>';
}
?>
