-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Apr 2025 pada 13.12
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `umroh`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jamaah`
--

CREATE TABLE `jamaah` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `nama_ortu` varchar(100) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `no_hp` varchar(20) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `tempat_lahir` varchar(100) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `pekerjaan` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `kelurahan` varchar(100) DEFAULT NULL,
  `kecamatan` varchar(100) DEFAULT NULL,
  `kabupaten` varchar(100) DEFAULT NULL,
  `provinsi` varchar(100) DEFAULT NULL,
  `kode_pos` varchar(10) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jamaah`
--

INSERT INTO `jamaah` (`id`, `nama_lengkap`, `jenis_kelamin`, `nama_ortu`, `no_ktp`, `no_hp`, `email`, `tempat_lahir`, `tanggal_lahir`, `pekerjaan`, `alamat`, `kelurahan`, `kecamatan`, `kabupaten`, `provinsi`, `kode_pos`, `created_at`, `updated_at`) VALUES
(2, 'Rangga Setyanto', 'Laki-laki', 'Antok', '00331902210105300000', '081901885800', 'rangga13spema@gmail.com', 'Kudus', '2000-01-01', 'mahasiswa', 'Jl. Ekapraya 3 RT.03 RW.01 RENDENG TIMUR\r\nKABUPATEN KUDUS', 'Rendeng', 'Kota', 'KUDUS', 'Jawa Tengah', '59311', '2025-04-19 15:50:53', '2025-04-19 15:50:53');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(7, '2025-04-11-070000', 'App\\Database\\Migrations\\CreateJamaahTable', 'default', 'App', 1745077639, 1),
(8, '2025-04-11-070100', 'App\\Database\\Migrations\\CreatePaketTable', 'default', 'App', 1745077639, 1),
(9, '2025-04-11-070200', 'App\\Database\\Migrations\\CreateUserTable', 'default', 'App', 1745077639, 1),
(10, '2025-04-11-070300', 'App\\Database\\Migrations\\CreatePendaftaranTable', 'default', 'App', 1745077639, 1),
(11, '2025-04-11-070400', 'App\\Database\\Migrations\\CreatePembayaranTable', 'default', 'App', 1745077639, 1),
(12, '2025-04-11-070500', 'App\\Database\\Migrations\\CreateNotifikasiWaTable', 'default', 'App', 1745077639, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi_wa`
--

CREATE TABLE `notifikasi_wa` (
  `id` int(10) UNSIGNED NOT NULL,
  `jamaah_id` int(10) UNSIGNED NOT NULL,
  `jenis_pesan` varchar(50) NOT NULL,
  `isi_pesan` text NOT NULL,
  `status_kirim` enum('berhasil','gagal','menunggu') NOT NULL DEFAULT 'menunggu',
  `waktu_kirim` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket_umrah`
--

CREATE TABLE `paket_umrah` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama_paket` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `tanggal_berangkat` date NOT NULL,
  `durasi_hari` int(11) NOT NULL,
  `fasilitas` text NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `paket_umrah`
--

INSERT INTO `paket_umrah` (`id`, `nama_paket`, `harga`, `tanggal_berangkat`, `durasi_hari`, `fasilitas`, `created_at`, `updated_at`) VALUES
(1, 'Paket Lebaran', 5000000, '2025-04-30', 15, 'mewahhhh', '2025-04-19 15:51:24', '2025-04-19 15:51:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `pendaftaran_id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `jumlah_pembayaran` int(11) NOT NULL,
  `metode_pembayaran` enum('Cash','Cicilan') NOT NULL DEFAULT 'Cash',
  `tanggal_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `pendaftaran_id`, `user_id`, `jumlah_pembayaran`, `metode_pembayaran`, `tanggal_pembayaran`, `bukti_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 5000000, 'Cash', '2025-04-23', '1745077937_2104be079c4560a6b283.png', '2025-04-19 15:52:17', '2025-04-19 15:52:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `jamaah_id` int(10) UNSIGNED NOT NULL,
  `paket_umrah_id` int(10) UNSIGNED NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `status_pendaftaran` enum('terdaftar','lunas','batal') NOT NULL DEFAULT 'terdaftar',
  `user_id` int(10) UNSIGNED NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pendaftaran`
--

INSERT INTO `pendaftaran` (`id`, `jamaah_id`, `paket_umrah_id`, `tanggal_daftar`, `status_pendaftaran`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 2, 1, '2025-04-19', 'lunas', 1, '2025-04-19 15:51:44', '2025-04-22 09:12:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `nama_pengguna` varchar(50) NOT NULL,
  `kata_sandi` varchar(255) NOT NULL,
  `peran` enum('admin','staf') NOT NULL DEFAULT 'staf',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `foto`, `nama_pengguna`, `kata_sandi`, `peran`, `created_at`, `updated_at`) VALUES
(1, '1745077670_4990382fd28362f80bbd.jpg', 'ulil', '12345678', 'staf', '2025-04-19 15:47:50', '2025-04-19 15:47:50'),
(2, '1745322808_7902b31998e606dcddb3.jpg', 'rangga', '12345678', 'admin', '2025-04-22 11:53:28', '2025-04-22 11:53:28');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi_wa`
--
ALTER TABLE `notifikasi_wa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifikasi_wa_jamaah_id_foreign` (`jamaah_id`);

--
-- Indeks untuk tabel `paket_umrah`
--
ALTER TABLE `paket_umrah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pembayaran_pendaftaran_id_foreign` (`pendaftaran_id`),
  ADD KEY `pembayaran_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pendaftaran_jamaah_id_foreign` (`jamaah_id`),
  ADD KEY `pendaftaran_paket_umrah_id_foreign` (`paket_umrah_id`),
  ADD KEY `pendaftaran_user_id_foreign` (`user_id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `jamaah`
--
ALTER TABLE `jamaah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `notifikasi_wa`
--
ALTER TABLE `notifikasi_wa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `paket_umrah`
--
ALTER TABLE `paket_umrah`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `notifikasi_wa`
--
ALTER TABLE `notifikasi_wa`
  ADD CONSTRAINT `notifikasi_wa_jamaah_id_foreign` FOREIGN KEY (`jamaah_id`) REFERENCES `jamaah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_pendaftaran_id_foreign` FOREIGN KEY (`pendaftaran_id`) REFERENCES `pendaftaran` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_jamaah_id_foreign` FOREIGN KEY (`jamaah_id`) REFERENCES `jamaah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_paket_umrah_id_foreign` FOREIGN KEY (`paket_umrah_id`) REFERENCES `paket_umrah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pendaftaran_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
