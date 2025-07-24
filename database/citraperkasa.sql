-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jul 2025 pada 03.56
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `order_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `package_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `price` varchar(25) NOT NULL,
  `total_price` varchar(25) NOT NULL,
  `participant` varchar(11) NOT NULL,
  `status` varchar(11) NOT NULL,
  `notes` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_title` varchar(50) NOT NULL,
  `cat_desc` varchar(50) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `cat_title`, `cat_desc`, `updated_at`) VALUES
(1, 'Transportasi', '1', '2010-03-15 01:22:21'),
(2, 'Penginapan', '1', '2010-03-15 01:22:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `component`
--

CREATE TABLE `component` (
  `id` int(11) NOT NULL,
  `service_id` varchar(11) NOT NULL,
  `comp_title` varchar(50) NOT NULL,
  `comp_desc` varchar(100) NOT NULL,
  `comp_detail` text NOT NULL,
  `comp_price` varchar(25) NOT NULL,
  `ufile` text NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `customer`
--

CREATE TABLE `customer` (
  `id` int(11) NOT NULL,
  `cust_fullname` varchar(50) NOT NULL,
  `cust_phone` varchar(15) NOT NULL,
  `cust_address` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `destination`
--

INSERT INTO `destination` (`id`, `dest_title`, `dest_desc`, `dest_detail`, `ufile`, `updated_at`) VALUES
(3, 'BALI', 'PAKET WISATA KE BALI 3 HARI 3 MALAM', '1. OBYEK WISATA LIBURAN\n- Tanah Lot\n- Pantai Pandawa\n- Pantai Melasti\n- Pantai Kuta\n- Pantai Lovina\n- Pulau Nusa Penida\n- Tari Kecak Uluwatu\n- Joger, Puja Mandala\n- Pirates Cruise Dinner\n- Pura Ulun Danu Beratan\n- Garuda Wisnu Kencana\n- Desa Adat Penglipuran\n- Desa Adat Tenganan\n- Pengringsingan\n- Krishna\n\n2. TRANSPORTASI YANG DIGUNAKAN\n- Big Bus Pariwisata Configuration Seat 2-2\n- Medium Bus Pariwisata Configuration Seat 2-2\n- Kapal Penyeberangan Pelabuhan Ketapang - Pelabuhan Gilimanuk\n\n3. HOTEL\n- Bintang 3 dengan kapasitas 1 kamar berisi 2-4 orang (menyesuaikan harga)\n\n4. KOMSUMSI\n- Snack dan air mineral di awal pemberangkatan\nMakan sebanyak 11 kali selama perjalanan wisata \n\n5. FASILITAS DAN PELAYANAN YANG DIDAPATKAN \n- Professional Tour Leader\n- Dokumentasi Foto dan Video\n- P3K Ringan Banner foto dan banner bus\n- Tiket masuk obyek wisata\n- Sudah termasuk biaya parkir, biaya tol, dan fee crew \n \n6. HARGA YANG DITAWARKAN\nHarga yang kami tawarkan untuk Paket Wisata Bali dimulai dari Rp. 1,450,000, dengan ketentuan sebagai berikut : \n\nharga bervariasi tergantung dari obyek yang dipilih\nuntuk Paket Bali maksimal memilih 5 obyek wisata (belum bermasuk tempat oleh-oleh)\nHarga juga ditentukan oleh jumlah orang yang berwisata', '926070de04f0-df57-11ec-85a8-bda8f2c6ca77-rimg-w720-h720-gmir.jpg', '2025-07-18 14:48:54');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id` int(11) NOT NULL,
  `xfile` varchar(1000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
(1, 'We help to grow your business.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.\r\nLorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Work smarter, not harder.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'We provide the best digital services', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Our Recent Works', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Our clients says', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Let\'s connect!', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'Looking for the best digital agency & marketing solution?', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `service`
--

CREATE TABLE `service` (
  `id` int(11) NOT NULL,
  `service_title` varchar(500) NOT NULL,
  `service_desc` varchar(1000) NOT NULL,
  `service_detail` varchar(2000) NOT NULL,
  `ufile` varchar(1000) NOT NULL,
  `upadated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `testimony`
--

INSERT INTO `testimony` (`id`, `message`, `name`, `position`, `ufile`, `updated_at`) VALUES
(2, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'DINKES Kab. Banjarnegara', 'Instansi & Kedinasan', '5110avatar-2.png', '2025-07-14 09:33:52'),
(3, 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laborum obcaecati dignissimos quae quo ad iste ipsum officiis deleniti asperiores sit.', 'UPGRI Yogyakarta', 'Sekolah & Universitas', '4068avatar-3.png', '2025-07-14 09:34:41');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tourism`
--

CREATE TABLE `tourism` (
  `id` int(11) NOT NULL,
  `destination_id` varchar(11) NOT NULL,
  `tour_title` varchar(25) NOT NULL,
  `tour_desc` varchar(100) NOT NULL,
  `tour_detail` text NOT NULL,
  `tour-price` varchar(25) NOT NULL,
  `ufile` text NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `why_us`
--

CREATE TABLE `why_us` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `detail` varchar(500) NOT NULL,
  `updated_on` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
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
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `component`
--
ALTER TABLE `component`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`id`);

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
-- Indeks untuk tabel `service`
--
ALTER TABLE `service`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `component`
--
ALTER TABLE `component`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `destination`
--
ALTER TABLE `destination`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
-- AUTO_INCREMENT untuk tabel `service`
--
ALTER TABLE `service`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
