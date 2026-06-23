-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 23 Jun 2026 pada 17.17
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
-- Database: `anonymous_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `messages`
--

CREATE TABLE `messages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `receiver_name` varchar(255) NOT NULL,
  `message_text` text NOT NULL,
  `pin_code` varchar(255) DEFAULT NULL,
  `is_flagged` tinyint(1) NOT NULL DEFAULT 0,
  `sender_ip` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `messages`
--

INSERT INTO `messages` (`id`, `receiver_name`, `message_text`, `pin_code`, `is_flagged`, `sender_ip`, `created_at`, `updated_at`) VALUES
(2, 'Khalisha Ufairah', 'Sistem Manajemen Tugas-nya bisa sekalian buat ngetrack tugas praktikum PBW yang numpuk ini ga? Menangis bgt 😭', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(3, 'Muhammad Shidqi Hanif', 'Keren bgt idenya Tracking Hafalan Al-Qur\'an, semoga berkah ya project-nya dan lancar sampai demo!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(4, 'Muhammad Athallah Asyarif', 'Sistem lelang barangnya ntar bisa buat lelang kenangan mantan ga? canda lelang haha, sukses bro!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(5, 'Arsha Alifa Mahmud', 'Lucu bgt sistem penitipan hewan petcare-stay! Nanti dummy datanya pake foto kucing-kucing lucu yaaa 🐾', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(6, 'Raisa Nabila', 'Sistem Reservasi Kamar Hotel-nya bintang 5 ya sekalian? Semangat ngerjain ERD-nya capek bgt pasti.', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(7, 'Ar Raudhatul Putri Muhida', 'Wah Simulasi Keuangan Anak Kos ini relate bgt sih, apalagi pas akhir bulan cuma makan promag wkwk 😂💸', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(8, 'Najiya Irawan', 'Antrean klinik-nya jangan sampai bikin pusing kayak antrean asli ya naj, semangat coding backend-nya!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(9, 'Zanna Zikraana', 'Sistem review film/series-nya nanti ada rating buat drakor juga ga? Penasaran mau liat UI-nya!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(10, 'Khalisa Humaira', 'Sistem Pemesanan Cake/Bakery bikin laper pas ngerjainnya ga sih? Jangan lupa bagi-bagi kue aslinya wkwk 🍰', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(11, 'Nayla Khansa Livya', 'Gemes bgt Adopt & Collect Plushie Virtual! Ga sabar pengen nyoba aplikasinya pas udah kelar nanti 🧸', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(12, 'Silvia Putri', 'Sistem Wardrobe & Outfit Planner ini penyelamat bgt buat yang suka bingung besok ke kampus mau pake baju apa!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(13, 'Keiveen Aldiandra', 'Pengaduan Fasilitas Kampus wkwk, siap-siap isinya ntar penuh keluhan AC kelas yang ga dingin ya vin! 🏛️', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(14, 'Cut Farah Salsabila', 'Pemesanan Tiket Destinasi Wisata-nya dapet voucher diskon ga nih buat anak kelas? Sukses praktikumnya!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(15, 'T Farid Haqi', 'Loket Travel-nya rute mana aja nih? Jangan sampai kesasar pas bikin logic routing-nya ya riid!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(16, 'Ahmad Zikri Pasya', 'Pengelolaan Kos/Kontrakan ntar fiturnya ada buat nagih uang kosan secara galak ga pas? Wkwk mantap pasya 👍', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(17, 'Fachraja Ramadhan Sukma', 'Marketplace & Lelang Barang Daerah idenya solid bgt, bener-bener bantu UMKM lokal nih. Keren raj!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(18, 'Niswatul Azimah', 'Sama-sama bikin Anonymous Message nih kita! Kapan-kapan share info dong gimana cara bikin visual madingmu wkwk 🤫', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(19, 'Roseline Balqist', 'Sistem Manajemen Turnamen & Bracket Otomatis-nya pake algoritma apa rose? Keren bgt keliatannya rumit!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(20, 'Mahda Annisa', 'Inventaris Alat Lab, semoga ga ada alat lab yang pecah atau ilang pas di-input ke sistem ya mahda wkwk 🧪', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(21, 'Muhammad Razi Siregar', 'Sistem Donasi Barang Bekas mulia bgt idenya zi, semoga lancar codingan Next.js/Laravel-nya ya!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(22, 'Cut Wynona Andromeda', 'Pemesanan Tiket Konser-nya awas kena calo virtual non, bikin fitur war tiket yang ketat ya wkwk 🎤', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(23, 'Muhammad Nuril Alam', 'Booking barber online biar ga antre lama-lama ya ril, ide bagus bgt buat cowok-cowok yang mageran!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(24, 'Ariq Rabbani', 'Jadwal kuliah pribadi, tolong masukin fitur alarm otomatis pas dosennya tiba-tiba majuin jam kuliah riq!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(25, 'Muhammad Faruq Rais', 'Siklinik mantap ruq, semoga reservasi kliniknya ga sesak dan dapet UI yang clean se-clean kliniknya!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(26, 'T Muhammad Alfi', 'Babyshop online, nyari dummy data barang bayinya ntar yang lucu-lucu ya fi, semangat debug error!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(27, 'Raisul Akram', 'Service elektronik-nya bisa benerin kode program yang error sekalian ga sul? Tolong bgt wkwk 🛠️', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(28, 'Muhammad Raseuki', 'Jual beli barang bekas mahasiswa pas bgt nih, tempat menampung barang-barang preloved pas mau kelar kuliah!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(29, 'M Sulthan Shadiq', 'Booking lapangan olahraga biar ga rebutan ya thand, nanti kita test bareng aplikasinya pas kelar.', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(30, 'M Abid Rahmatillah Z', 'Lost & Found ini berguna bgt di kampus! Tolong nanti fiturnya gampang dipake ya bid biar barang ilang cepet ketemu.', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(31, 'Muhammad Fariz Alfisaputra', 'Sistem Esport-nya ada fitur buat bikin tim turnamen game ga riz? Keren nih kalau visualnya pake mode dark!', NULL, 0, '127.0.0.1', '2026-06-23 14:39:39', '2026-06-23 14:39:39'),
(32, 'salsabila', 'bagaimana kabar mu harini semoga baik baik saja yaaa...', NULL, 0, '127.0.0.1', '2026-06-23 07:57:26', '2026-06-23 07:57:26'),
(33, 'sarah', 'hai sarah apa kabar', '1234', 0, '127.0.0.1', '2026-06-23 07:58:26', '2026-06-23 07:58:26');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `messages`
--
ALTER TABLE `messages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
