-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Okt 2025 pada 11.31
-- Versi server: 10.4.25-MariaDB
-- Versi PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `citraperkasa`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `updated_at`) VALUES
(1, 'admin', 'admin', '2025-07-13 11:00:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(300) NOT NULL,
  `blog_desc` varchar(300) NOT NULL,
  `blog_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id`, `blog_title`, `blog_desc`, `blog_detail`, `ufile`, `updated_at`) VALUES
(1, 'Blog 1 - Travel \'n Tour', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.', '', '2025-07-15 08:18:27'),
(2, 'Blog 2 - Wisata Ceria', 'We provide the best digital servicesWe provide the best digital servicesWe provide the best digital services', 'We provide the best digital servicesWe provide the best digital servicesWe provide the best digital servicesWe provide the best digital servicesWe provide the best digital servicesWe provide the best digital servicesWe provide the best digital services', '60936059d354562031616499540.png', '2025-07-16 05:49:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `booking_code` varchar(50) NOT NULL,
  `name` varchar(150) NOT NULL,
  `phone` varchar(30) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `destination_id` int(11) DEFAULT NULL,
  `location_id` int(11) DEFAULT NULL,
  `travel_date` date NOT NULL,
  `pax` int(11) NOT NULL DEFAULT 1,
  `transport` varchar(100) DEFAULT NULL,
  `accommodation` varchar(100) DEFAULT NULL,
  `meal` varchar(100) DEFAULT NULL,
  `note` text DEFAULT NULL,
  `estimated_price` decimal(12,2) DEFAULT 0.00,
  `status` enum('new','followup','confirmed','cancelled') DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `booking`
--

INSERT INTO `booking` (`id`, `booking_code`, `name`, `phone`, `email`, `destination_id`, `location_id`, `travel_date`, `pax`, `transport`, `accommodation`, `meal`, `note`, `estimated_price`, `status`, `created_at`) VALUES
(1, 'CP25101550C8', 'Umum', '-', '-', 5, 9, '2025-11-01', 2, 'Elf Long (2-2 seat)', 'Homestay', 'Snack dan Air Mineral', NULL, '1940000.00', 'new', '2025-10-15 05:10:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cust_fullname` varchar(50) NOT NULL,
  `cust_phone` varchar(15) NOT NULL,
  `cust_address` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `destination`
--

CREATE TABLE `destination` (
  `id` int(11) NOT NULL,
  `dest_title` varchar(500) NOT NULL,
  `dest_desc` varchar(1000) NOT NULL,
  `dest_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `price` decimal(10,2) DEFAULT 0.00,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`id`, `dest_title`, `dest_desc`, `dest_detail`, `ufile`, `price`, `updated_at`) VALUES
(3, 'BALI', 'PAKET WISATA KE BALI 3 HARI 3 MALAM', '1. OBYEK WISATA LIBURAN\n- Tanah Lot\n- Pantai Pandawa\n- Pantai Melasti\n- Pantai Kuta\n- Pantai Lovina\n- Pulau Nusa Penida\n- Tari Kecak Uluwatu\n- Joger, Puja Mandala\n- Pirates Cruise Dinner\n- Pura Ulun Danu Beratan\n- Garuda Wisnu Kencana\n- Desa Adat Penglipuran\n- Desa Adat Tenganan\n- Pengringsingan\n- Krishna\n\n2. TRANSPORTASI YANG DIGUNAKAN\n- Big Bus Pariwisata Configuration Seat 2-2\n- Medium Bus Pariwisata Configuration Seat 2-2\n- Kapal Penyeberangan Pelabuhan Ketapang - Pelabuhan Gilimanuk\n\n3. HOTEL\n- Bintang 3 dengan kapasitas 1 kamar berisi 2-4 orang (menyesuaikan harga)\n\n4. KOMSUMSI\n- Snack dan air mineral di awal pemberangkatan\nMakan sebanyak 11 kali selama perjalanan wisata \n\n5. FASILITAS DAN PELAYANAN YANG DIDAPATKAN \n- Professional Tour Leader\n- Dokumentasi Foto dan Video\n- P3K Ringan Banner foto dan banner bus\n- Tiket masuk obyek wisata\n- Sudah termasuk biaya parkir, biaya tol, dan fee crew \n \n6. HARGA YANG DITAWARKAN\nHarga yang kami tawarkan untuk Paket Wisata Bali dimulai dari Rp. 1,450,000, dengan ketentuan sebagai berikut : \n\nharga bervariasi tergantung dari obyek yang dipilih\nuntuk Paket Bali maksimal memilih 5 obyek wisata (belum bermasuk tempat oleh-oleh)\nHarga juga ditentukan oleh jumlah orang yang berwisata', 'bali.png', '500000.00', '2025-10-15 02:34:40'),
(4, 'BROMO-MALANG', 'BROMO-MALANG 2 HARI 1 MALAM', '1. OBYEK WISATA LIBURAN \n\nSunrise Point Pasir Berbisik / Pusung\n\nGedhe \n\nLembah Watangan \n\nKawah Bromo Kebun Apel \n\nBatu Night Spectacular \n\nMuseum Tubuh \n\nJatim Park 1 \n\nJatim Park 2 \n\nJatim Park 3 \n\nSantera De Laponte \n\nMuseum Angkut \n\nMuseum Brawijaya \n\nTaman Selecta Eco Green Park \n\n2. TRANSPORTASI YANG DIGUNAKAN \n\nBig Bus Pariwisata Configuration Seat 2-2\nMedium Bus Pariwisata Configuration Seat 2-2\nJeep Tour Bromo \n3. HOTEL \n\nHotel Bintang 3 dengan kapasitas 1 kamar berisi 2-4 orang (menyesuaikan harga) \n4. KONSUMSI\n\nSnack dan air mineral di awal pemberangkatan\nMakan sebanyak 7 kali selama perjalanan wisata\n5. FASILITAS DAN PELAYANAN YANG DIDAPATKAN\n\nProfessional Tour Leader\nDokumentasi Foto dan Video\nP3K Ringan\nBanner foto dan banner bus\nTiket masuk obyek wisata\nSudah termasuk biaya parkir, biaya tol, dan fee crew\n6. HARGA YANG DITAWARKAN\nHarga yang kami tawarkan untuk Paket Bromo-Malang dimulai dari Rp. 1,300,000, dengan ketentuan sebagai berikut :\n\nharga bervariasi tergantung dari obyek yang dipilih\nuntuk Paket Bromo-Malang maksimal memilih 5 obyek wisata (belum bermasuk tempat oleh-oleh)\nHarga juga ditentukan oleh jumlah orang yang berwisata', 'bromo.png', '500000.00', '2025-10-15 02:34:40'),
(5, 'BANDUNG', 'BANDUNG 3 DAYS TRANSIT', '1. OBYEK WISATA LIBURAN\n\nTangkuban Perahu\n\nOrchid Forest\n\nFloating Market\n\nFarm House Lembang\n\nThe Great Asia-Afrika\n\nMuseum Pendidikan\n\nIndonesia\n\nTrans Studio\n\nMuseum Geologi\n\nMuseum Sri Baduga\n\nMuseum Konferensi Asia\nAfrika\n\nMuseum Barli\n\nMuseum Perjuangan\n\nRakyat Jawa Barat\n\nSaung Angklung Udjo\n\n2. TRANSPORTASI YANG DIGUNAKAN\n\nBig Bus Pariwisata Configuration Seat 2-2\nMedium Bus Pariwisata Configuration Seat 2-2\n3. KONSUMSI\n\nSnack dan air mineral di awal pemberangkatan\nMakan sebanyak 3 kali selama perjalanan wisata\n4. FASILITAS DAN PELAYANAN YANG DIDAPATKAN\n\nProfessional Tour Leader\nDokumentasi Foto dan Video\nP3K Ringan\nBanner foto dan banner bus\nTiket masuk obyek wisata\nSudah termasuk biaya parkir, biaya Tol, dan fee crew', 'bandung.png', '500000.00', '2025-10-15 02:34:40'),
(6, 'BROMO GILI KETAPANG', 'BROMO GILI KETAPANG 2 DAYS 1 NIGHT', '1. OBYEK WISATA LIBURAN \r\n\r\nSunrise Point\r\nPasir Berbisik / Pusung Gedhe\r\nLembah Watangan\r\nKawah Bromo\r\nSnorkeling\r\nWater Sport \r\n2. TRANSPORTASI YANG DIGUNAKAN \r\n\r\nBig Bus Pariwisata Configuration Seat 2-2\r\nMedium Bus Pariwisata Configuration Seat 2-2\r\nJeep Tour Bromo\r\nKapal Penyebrangan Pulau Gili Ketapang \r\n3. HOTEL \r\n\r\nHotel dengan kapasitas 1 kamar berisi 2-4 orang (menyesuaikan harga) \r\n4. KONSUMSI \r\n\r\nSnack dan air mineral di awal pemberangkatan\r\nMakan sebanyak 7 kali selama perjalanan wisata \r\n5. FASILITAS DAN PELAYANAN YANG DIDAPATKAN \r\n\r\nProfessional Tour Leader\r\nDokumentasi Foto dan Video\r\nP3K Ringan\r\nBanner foto dan banner bus\r\nTiket masuk obyek wisata\r\nSudah termasuk biaya parkir, biaya tol, dan fee crew \r\n6. HARGA YANG DITAWARKAN \r\n\r\nHarga yang kami tawarkan untuk Paket Bromo-Gili Ketapang dimulai dari Rp. 1,300,000, dengan ketentuan sebagai berikut : \r\n\r\nharga bervariasi tergantung dari obyek yang dipilih\r\nHarga juga ditentukan oleh jumlah orang yang berwisata', 'bromogiliket.png', '500000.00', '2025-10-15 02:34:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facility`
--

CREATE TABLE `facility` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `unit_price` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `facility`
--

INSERT INTO `facility` (`id`, `category_id`, `name`, `description`, `unit_price`) VALUES
(1, 1, 'Bus Pariwisata (2-2 seat)', 'Kapasitas besar, cocok untuk rombongan', '1500000.00'),
(2, 1, 'Elf Long (2-2 seat)', 'Cocok untuk rombongan kecil', '800000.00'),
(3, 1, 'Minibus (6-7) pax', 'Mobil keluarga kapasitas sedang', '500000.00'),
(4, 2, 'Hotel 2-4 orang/kamar', 'Harga per malam per kamar', '400000.00'),
(5, 2, 'Homestay', 'Penginapan sederhana dekat lokasi wisata', '250000.00'),
(6, 3, 'Snack dan Air Mineral', 'Snack + 1 botol air mineral', '20000.00'),
(7, 3, 'Makan Besar (Buffet)', 'Menu makan utama, per orang', '50000.00'),
(8, 4, 'Tour Leader Profesional', 'Mendampingi selama perjalanan', '0.00'),
(9, 4, 'Dokumentasi Foto & Video', 'Sudah termasuk dalam paket', '0.00'),
(10, 4, 'P3K Ringan', 'Termasuk dalam layanan dasar', '0.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facility_category`
--

CREATE TABLE `facility_category` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `facility_category`
--

INSERT INTO `facility_category` (`id`, `name`) VALUES
(1, 'Transportasi'),
(2, 'Penginapan'),
(3, 'Konsumsi'),
(4, 'Fasilitas Tambahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `location`
--

INSERT INTO `location` (`id`, `destination_id`, `name`, `description`, `price`) VALUES
(1, 3, 'Tanah Lot', 'Wisata alam dan religi.', '100000.00'),
(2, 3, 'Nusa Penida', 'Wisata alam dan laut.', '100000.00'),
(3, 3, 'Garuda Wisnu Kencana', 'Patung Garuda Wisnu Kencana.', '100000.00'),
(4, 4, 'Sunrisa Hill', 'Sunrise poin bromo.', '100000.00'),
(5, 4, 'Batu Night', 'Wisata malam.', '100000.00'),
(6, 4, 'Jatim Park', 'Taman Bermain.', '100000.00'),
(7, 5, 'Trans Studio', 'Wisata modern.', '100000.00'),
(8, 5, 'Tangkuban Perahu', 'Wisata gunung.', '100000.00'),
(9, 5, 'Lembang Farm', 'Wisata alam dan peternakan.', '100000.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `xfile` varchar(1000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id`, `xfile`, `ufile`, `updated_at`) VALUES
(1, 'logo-b.png', 'logo-a.png', '2025-07-14 08:36:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `section_title`
--

CREATE TABLE `section_title` (
  `id` int(11) NOT NULL,
  `about_title` varchar(500) NOT NULL,
  `about_text` varchar(1000) NOT NULL,
  `why_title` varchar(500) NOT NULL,
  `why_text` varchar(1000) NOT NULL,
  `service_title` varchar(500) NOT NULL,
  `service_text` varchar(1000) NOT NULL,
  `dest_title` varchar(500) NOT NULL,
  `dest_text` varchar(1000) NOT NULL,
  `test_title` varchar(500) NOT NULL,
  `test_text` varchar(1000) NOT NULL,
  `contact_title` varchar(500) NOT NULL,
  `contact_text` varchar(1000) NOT NULL,
  `enquiry_title` varchar(500) NOT NULL,
  `enquiry_text` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `section_title`
--

INSERT INTO `section_title` (`id`, `about_title`, `about_text`, `why_title`, `why_text`, `service_title`, `service_text`, `dest_title`, `dest_text`, `test_title`, `test_text`, `contact_title`, `contact_text`, `enquiry_title`, `enquiry_text`) VALUES
(1, '#solusiwisataceria </br>\nTOUR & TRANSPORT', 'CV Citra Perkasa Selalu Jaya atau yang lebih dikenal dengan Citra Perkasa adalah Perusahaan yangbergerak dalam bidang Aktivitas Biro, Agen Perjalanan Wisata dan Sewa Armada. Kami memberikan layanan berkualitas prima pada bidang Pariwisata, Studi Tour, Kunjungan Dinas, Outbond, layanan Meetings, Incentives, Conventions, dan Exibitions (MICE), serta layanan Sewa Alat Transportasi.\n\nMelalui pengalaman yang cukup handal dalam bidang Tour, Travel, dan Transportasi, Citra Perkasa mendapatkan kepercayaan klien sebagai salah satu biro pariwisata yang memiliki harga yang ekonomis dengan pelayanan dan fasilitas yang fantastis. Seperti slogan kami yaitu “ Pelayanan yang ramah dan sopan yang merupakan bagian dari solusi wisata yang ceria”\n\ncitra perkasa', 'Work smarter, not harder.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'We provide the best digital services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Our Recent Works', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Our clients says', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Let\'s connect!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Looking for the best digital agency & marketing solution?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `siteconfig`
--

CREATE TABLE `siteconfig` (
  `id` int(11) NOT NULL,
  `site_keyword` varchar(1000) NOT NULL,
  `site_desc` varchar(500) NOT NULL,
  `site_title` varchar(300) NOT NULL,
  `site_about` varchar(1000) NOT NULL,
  `site_footer` varchar(1000) NOT NULL,
  `follow_text` varchar(1000) NOT NULL,
  `site_url` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `siteconfig`
--

INSERT INTO `siteconfig` (`id`, `site_keyword`, `site_desc`, `site_title`, `site_about`, `site_footer`, `follow_text`, `site_url`, `updated_at`) VALUES
(1, 'Tour, Travel', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.', 'Citra Perkasa Website', 'CV Citra Perkasa Selalu Jaya atau yang lebih dikenal dengan Citra Perkasa adalah Perusahaan yangbergerak dalam bidang Aktivitas Biro, Agen Perjalanan Wisata dan Sewa Armada. Kami memberikan layanan berkualitas prima pada bidang Pariwisata, Studi Tour, Kunjungan Dinas, Outbond, layanan Meetings, Incentives, Conventions, dan Exibitions (MICE), serta layanan Sewa Alat Transportasi.', '© 2025 All Rights Reserved', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias.', 'http://localhost:8080/citraperkasa/', '2025-07-14 09:18:49');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sitecontact`
--

CREATE TABLE `sitecontact` (
  `id` int(11) NOT NULL,
  `phone1` varchar(150) NOT NULL,
  `phone2` varchar(150) NOT NULL,
  `email1` varchar(100) NOT NULL,
  `email2` varchar(100) NOT NULL,
  `longitude` varchar(100) NOT NULL,
  `latitude` varchar(150) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sitecontact`
--

INSERT INTO `sitecontact` (`id`, `phone1`, `phone2`, `email1`, `email2`, `longitude`, `latitude`, `updated_at`) VALUES
(1, '+62 857 4713 8766', '+62 857 4713 8766', 'mail@company.com', 'mail@company.com', '109.6466466', '-7.394845', '2025-07-15 08:46:57');

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `slide_title` varchar(150) NOT NULL,
  `slide_text` varchar(500) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id`, `slide_title`, `slide_text`, `ufile`, `updated_at`) VALUES
(1, 'Solusi', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit nihil tenetur minus quidem est deserunt molestias accusamus harum ullam tempore debitis et, expedita, repellat delectus aspernatur neque itaque qui quod.', 'wisata.jpeg', '2025-07-14 09:39:04');

-- --------------------------------------------------------

--
-- Struktur dari tabel `social`
--

CREATE TABLE `social` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `fa` varchar(150) NOT NULL,
  `social_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `social`
--

INSERT INTO `social` (`id`, `name`, `fa`, `social_link`) VALUES
(1, 'Tiktok', 'fa-tiktok', 'https://tiktok.com/@citraperkasa.tour'),
(2, 'Instagram', 'fa-instagram', 'https://instagram.com/citraperkasatour'),
(3, 'Youtube', 'fa-youtube', 'https://www.youtube.com/@Citra_perkasa_tour');

-- --------------------------------------------------------

--
-- Struktur dari tabel `static`
--

CREATE TABLE `static` (
  `id` int(11) NOT NULL,
  `stitle` varchar(150) NOT NULL,
  `stext` varchar(500) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `static`
--

INSERT INTO `static` (`id`, `stitle`, `stext`, `updated_at`) VALUES
(1, 'Solusi Wisata Ceria', 'KENAPA HARUS CITRA PERKASA ?\nKarena dengan memilih citra perkasa sebagai biro perjalanan wisata\nanda, anda bisa mendapatkan beberapa keuntungan, diantaranya', '2025-07-14 09:35:55');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimony`
--

CREATE TABLE `testimony` (
  `id` int(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `name` varchar(150) NOT NULL,
  `position` varchar(100) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimony`
--

INSERT INTO `testimony` (`id`, `message`, `name`, `position`, `ufile`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'DINKES Kab. Banjarnegara', 'Instansi & Kedinasan', '5110avatar-2.png', '2025-07-14 09:33:52'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'UPGRI Yogyakarta', 'Sekolah & Universitas', '4068avatar-3.png', '2025-07-14 09:34:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `why_us`
--

INSERT INTO `why_us` (`id`, `title`, `detail`, `updated_on`) VALUES
(3, 'Kemudahan Perencanaan', 'Kami akan mengatur seluruh rencana perjalanan anda, mulai dari transportasi, akomodasi, hingga jadwal kegiatan, sehingga anda tidak perlu repot memikirkan hal-hal kecil.', '2025-07-14 09:29:55'),
(4, 'Harga Paket yang Ekonomis', 'Harga paket wisata yang ekonomis mencakup berbagai layanan dengan harga yang lebih terjangkau daripada jika Anda mengatur semuanya sendiri. Sehingga anda bisa mendapatkan pengalaman yang menyenangkan dan berkesan dengan biaya yang lebih terkontrol.', '2025-07-14 09:29:38'),
(5, 'Professional Tour Leader', 'Dengan kami, anda akan mendapatkan Tour Leader/Tour Guide yang berpengalaman. Sehingga dapat memberikan informasi yang lebih dalam mengenai destinasi, budaya, dan tempat-tempat baru yang mungkin tidak anda ketahui', '2025-07-14 09:30:03'),
(6, 'Keamanan dan Kenyamanan\r\n', 'Kami sudah mempertimbangkan aspek kemananan perjalanan anda. Kami sudah mengurus izin izin yang diperlukan dan mengatur transportasi yang aman, sehingga anda bisa lebih fokus menikmati liburan.\r\n\r\n', '2025-07-14 09:30:03'),
(7, 'Pengelolaan Waktu yang Efisien\r\n', 'Dengan jadwal yang sudah diatur oleh kami, anda dapat mengunnjungi banyak tempat tanpa harus khawatir akan keterlabatan atau kehilangan waktu yang berharga.\r\n\r\n', '2025-07-14 09:31:10'),
(8, 'Dukungan selama Perjalanan\r\n', 'Jika terjadi masalah selama perjalanan, kami akan memberikan dukungan dan bantuan yang cepat, ini termasuk bantuan medis, logistik, atau masalah lainnya yang mungkin terjadi\r\n\r\n', '2025-07-14 09:31:10'),
(9, 'Kenyamanan Administrasi', 'kami akan mengurus semua aspek administratif. Seperti tiket, pemesanan hotel, dan izin perjalanan, sehingga anda tidak perlu repot mengurus semua itu sendiri.', '2025-07-14 09:31:51'),
(10, 'Dokumentasi', 'kami juga mempersiapkan dokumentasi foto dan video yang siap menangkap setiap momen berharga anda selama berwisata, sehingga memberikan kenangan yang tak terlupakan dan selalu membekas di hati.', '2025-07-14 09:31:51');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `booking_code` (`booking_code`);

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `facility`
--
ALTER TABLE `facility`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indeks untuk tabel `facility_category`
--
ALTER TABLE `facility_category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `destination_id` (`destination_id`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `section_title`
--
ALTER TABLE `section_title`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siteconfig`
--
ALTER TABLE `siteconfig`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `sitecontact`
--
ALTER TABLE `sitecontact`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `static`
--
ALTER TABLE `static`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `testimony`
--
ALTER TABLE `testimony`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `why_us`
--
ALTER TABLE `why_us`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `facility`
--
ALTER TABLE `facility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `facility_category`
--
ALTER TABLE `facility_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `section_title`
--
ALTER TABLE `section_title`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sitecontact`
--
ALTER TABLE `sitecontact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `social`
--
ALTER TABLE `social`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `static`
--
ALTER TABLE `static`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `testimony`
--
ALTER TABLE `testimony`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `why_us`
--
ALTER TABLE `why_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `facility`
--
ALTER TABLE `facility`
  ADD CONSTRAINT `facility_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `facility_category` (`id`);

--
-- Ketidakleluasaan untuk tabel `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`destination_id`) REFERENCES `destination` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
