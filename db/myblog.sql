-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Jun 2025 pada 06.41
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `myblog`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`, `nama_lengkap`, `created_at`, `updated_at`) VALUES
(1, 'Syalpra', 'a33d0c90cd718961133a5d88d861d119', 'faisyalnur04@gmail.com', 'Muhammad Faisyal', '2025-06-03 04:46:03', '2025-06-16 18:12:50'),
(2, 'icang', '$2y$10$rA9ZlXzP9Ia7LBPTLsomhuTintORK06smnFVAZDsFXuvGlmNGwkSS', 'syalpra@gmail.com', 'Icang', '2025-06-16 19:25:57', '2025-06-16 19:25:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `cuplikan` text DEFAULT NULL,
  `url_gambar` varchar(255) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `tanggal_terbit` datetime DEFAULT NULL,
  `waktu_baca` int(11) DEFAULT NULL,
  `status` enum('draf','diterbitkan') DEFAULT 'draf',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `judul`, `slug`, `isi`, `cuplikan`, `url_gambar`, `id_kategori`, `id_admin`, `tanggal_terbit`, `waktu_baca`, `status`, `created_at`, `updated_at`) VALUES
(10, 'Kenalan dengan Laravel: Framework PHP yang Keren dan Serbaguna', 'Kenalan dengan Laravel: Framework PHP yang Keren dan Serbagun', 'Laravel adalah framework PHP open-source yang dirancang untuk membuat pengembangan web menjadi lebih mudah dan lebih cepat. Secara default, framework ini menggunakan pola arsitektur MVC (Model-View-Controller) yang membantu memisahkan logika aplikasi dari tampilan dan pengelolaan data. Framework ini menawarkan berbagai alat dan pustaka yang membantu pengembang dalam menangani berbagai aspek pengembangan web, mulai dari routing, otentikasi, hingga manajemen basis data.', 'Framework PHP yang Keren dan Serbaguna', 'laravel-icon-new.png', 1, 1, '2025-06-03 11:47:50', 12, 'diterbitkan', '2025-06-03 04:47:50', '2025-06-16 19:02:09'),
(14, '3 Panduan Login Akun Google di HP Android, iPhone, dan PC', '3 Panduan Login Akun Google di HP Android, iPhone', 'Panduan ini cocok bagi kamu yang baru pertama kali menggunakan perangkat baru, mengganti akun, atau ingin memastikan bahwa kamu sudah login di semua perangkat yang kamu gunakan.\r\n \r\nBerikut cara login akun Google di HP Android,iPhone dan PC.\r\n1. Cara Login Akun Google di HP Android\r\nSebagian besar perangkat Android meminta login akun Google saat pertama kali diaktifkan.\r\n\r\nNamun jika kamu ingin menambahkan akun baru atau login ulang, ikuti langkah berikut:\r\n- Buka Pengaturan / Settings.\r\n- Gulir ke bawah dan pilih Akun atau Accounts & backup (tergantung jenis HP).\r\n- Ketuk Tambah Akun (Add account), lalu pilih Google.\r\n- Masukkan alamat email Google kamu (contoh: namakamu@gmail.com).\r\n- Ketuk Berikutnya, lalu masukkan kata sandi.\r\n- Ikuti instruksi di layar.\r\n- Setelah berhasil login, akun Google akan otomatis terhubung ke layanan Google di HP kamu.\r\n2. Cara Login Akun Google di iPhone (iOS)\r\nMeskipun iPhone adalah produk Apple, kamu tetap bisa login akun Google untuk menggunakan Gmail, YouTube, dan layanan lainnya.\r\n \r\nMelalui pengaturan:\r\n- Buka Settings (Pengaturan).\r\n- Gulir ke bawah dan pilih Mail klik Accounts dan pilih Add Account.\r\n- Pilih Google.\r\n- Masukkan alamat email dan password akun Google kamu.\r\n- Pilih sinkronisasi data (Mail, Kontak, Kalender, Catatan), lalu tekan Save.', 'Panduan ini cocok bagi kamu yang baru pertama kali menggunakan perangkat baru, mengganti akun, atau ingin memastikan bahwa kamu sudah login di semua perangkat yang kamu gunakan.', '9a2LOD0w6I.jpeg', 1, NULL, NULL, NULL, 'diterbitkan', '2025-06-16 18:44:34', '2025-06-16 18:52:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) DEFAULT NULL,
  `url_gambar` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `diunggah_oleh` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id`, `judul`, `url_gambar`, `deskripsi`, `diunggah_oleh`, `created_at`, `updated_at`) VALUES
(1, 'Sapi Keren', '1.jpeg', 'wkwkwkw', 1, '2025-06-17 04:02:22', '2025-06-17 04:02:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_artikel`
--

CREATE TABLE `kategori_artikel` (
  `id` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori_artikel`
--

INSERT INTO `kategori_artikel` (`id`, `nama`, `slug`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Teknologi', 'teknologi', 'Kategori seputar perkembangan teknologi dan informasi.', '2025-06-03 04:42:26', '2025-06-03 04:42:26'),
(2, 'Bisnis', 'bisnis', 'Artikel-artikel terkait dunia usaha, manajemen, dan keuangan.', '2025-06-03 04:42:26', '2025-06-03 04:42:26'),
(3, 'Kesehatan', 'kesehatan', 'Informasi tentang gaya hidup sehat, penyakit, dan pengobatan.', '2025-06-03 04:42:26', '2025-06-03 04:42:26'),
(4, 'Pendidikan', 'pendidikan', 'Topik pendidikan, tips belajar, dan perkembangan kurikulum.', '2025-06-03 04:42:26', '2025-06-03 04:42:26'),
(5, 'Gaya Hidup', 'gaya-hidup', 'Berisi artikel tentang tren gaya hidup, fashion, dan kehidupan sehari-hari.', '2025-06-03 04:42:26', '2025-06-03 04:42:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(11) NOT NULL,
  `nama_website` varchar(100) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `url_facebook` varchar(255) DEFAULT NULL,
  `url_twitter` varchar(255) DEFAULT NULL,
  `url_instagram` varchar(255) DEFAULT NULL,
  `url_linkedin` varchar(255) DEFAULT NULL,
  `url_github` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `slug` (`slug`),
  ADD KEY `id_kategori` (`id_kategori`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id`),
  ADD KEY `diunggah_oleh` (`diunggah_oleh`);

--
-- Indeks untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nama` (`nama`),
  ADD UNIQUE KEY `slug` (`slug`);

--
-- Indeks untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori_artikel`
--
ALTER TABLE `kategori_artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `artikel_ibfk_1` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_artikel` (`id`),
  ADD CONSTRAINT `artikel_ibfk_2` FOREIGN KEY (`id_admin`) REFERENCES `admin` (`id`);

--
-- Ketidakleluasaan untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD CONSTRAINT `galeri_ibfk_1` FOREIGN KEY (`diunggah_oleh`) REFERENCES `admin` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
