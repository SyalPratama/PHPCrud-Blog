<?php 
include('layout/header.php');
include('db/koneksi.php');

if (!isset($_GET['slug'])) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Slug artikel tidak ditemukan!',
            confirmButtonText: 'Kembali'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
    exit;
}
$slug = mysqli_real_escape_string($conn, $_GET['slug']);
$query = "SELECT * FROM artikel WHERE slug = '$slug' AND status = 'diterbitkan'";
$result = mysqli_query($conn, $query);
$artikel = mysqli_fetch_assoc($result);

if (!$artikel) {
    echo "
    <script src='https://cdn.jsdelivr.net/npm/sweetalert2@11'></script>
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Oops!',
            text: 'Slug artikel tidak ditemukan!',
            confirmButtonText: 'Kembali'
        }).then(() => {
            window.location.href = 'index.php';
        });
    </script>";
    exit;
}
?>
<nav class="navbar navbar-expand-lg navbar-custom">
   <div class="container">
       <a class="navbar-brand" href="#">MyBlog</a>
       <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
           aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
       </button>
       <div class="collapse navbar-collapse" id="navbarNav">
           <ul class="navbar-nav ms-auto">
               <li class="nav-item">
                   <a class="nav-link" href="index.php">Home</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="about.php">Tentang Saya</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link active" href="artikel.php">Artikel</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="galeri.php">Galeri</a>
               </li>
               <li class="nav-item">
                   <a class="nav-link" href="kontak.php">Kontak</a>
               </li>
           </ul>
       </div>
   </div>
</nav>
<!-- Detail Artikel -->
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-10">
            <h1 class="mb-3"><?= htmlspecialchars($artikel['judul']); ?></h1>
            <div class="mb-3 text-muted">
                Dipublikasikan pada <?= date('d M Y', strtotime($artikel['tanggal_terbit'])); ?> &bull; <?= $artikel['waktu_baca']; ?> menit baca
            </div>
            <img src="uploads/<?= $artikel['url_gambar']; ?>" alt="<?= htmlspecialchars($artikel['judul']); ?>" class="img-fluid mb-4 rounded shadow">
            <p class="lead"><?= nl2br(htmlspecialchars($artikel['cuplikan'])); ?></p>
            <hr>
            <div class="artikel-isi" style="line-height: 1.8; font-size: 1.1rem;">
                <?= nl2br($artikel['isi']); ?>
            </div>
        </div>
    </div>
</div>

<?php include('layout/footer.php'); ?>
