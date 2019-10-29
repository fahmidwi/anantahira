-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 29 Okt 2019 pada 04.59
-- Versi Server: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_anantahira`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(10) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(35) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `email` varchar(25) NOT NULL,
  `level_akses` enum('admin','anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama_lengkap`, `email`, `level_akses`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '-', 'admin'),
(3, 'fahmi', '7aa2602c588c05a93baf10128861aeb9', 'fahmi dwi', 'fahmidwi45@gmail.com', 'anggota'),
(5, 'dion', '982c500a206551c665f746cc9e77a961', 'Dion', 'dion@gmail.com', 'anggota'),
(8, 'roni123', 'd78b154c99fe7f06ebc02ebd63d1c87c', 'Roni', 'roniraharjo@gmail.com', 'anggota'),
(11, 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'dwi', 'dwifhami@gmail.com', 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `no_ak` varchar(8) NOT NULL,
  `nama_lengkap` varchar(50) NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(13) NOT NULL,
  `email` varchar(30) NOT NULL,
  `foto_pribadi` varchar(20) NOT NULL,
  `foto_keluarga` varchar(20) NOT NULL,
  `id_fungsi` int(10) NOT NULL,
  `id_provinsi` int(10) NOT NULL,
  `id_kabkota` int(100) NOT NULL,
  `jabatan` text NOT NULL,
  `instagram` varchar(100) NOT NULL,
  `facebook` varchar(100) NOT NULL,
  `twitter` varchar(100) NOT NULL,
  `biografi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_admin`, `no_ak`, `nama_lengkap`, `alamat`, `no_hp`, `email`, `foto_pribadi`, `foto_keluarga`, `id_fungsi`, `id_provinsi`, `id_kabkota`, `jabatan`, `instagram`, `facebook`, `twitter`, `biografi`) VALUES
(74, 11, '006013', 'dwi', 'Margajaya, Bogor', '768786', 'dwifhami@gmail.com', '20191028151756.jpeg', '20191028151810.jpeg', 10, 62, 6201, 'Direktur Utama', 'das', 'dasd', 'das', 'sad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(10) NOT NULL,
  `id_kategori` int(10) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `headnews` varchar(100) NOT NULL,
  `caption_singkat` text NOT NULL,
  `gambar_berita` text NOT NULL,
  `isi_berita` text NOT NULL,
  `create_date` datetime NOT NULL,
  `modified_date` datetime NOT NULL,
  `view` int(10) NOT NULL,
  `sumber` text NOT NULL,
  `jenis_berita` enum('nasional','internasional') NOT NULL,
  `uriberita` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `berita`
--

INSERT INTO `berita` (`id_berita`, `id_kategori`, `id_admin`, `headnews`, `caption_singkat`, `gambar_berita`, `isi_berita`, `create_date`, `modified_date`, `view`, `sumber`, `jenis_berita`, `uriberita`) VALUES
(1, 1, 1, 'Yasonna Laoly  Sebaiknya Jokowi Jangan Terbitkan Perppu KPK', 'JAKARTA, KOMPAS.com - Anggota DPR dari Fraksi PDI Perjuangan Yasonna H Laoly meminta Presiden Joko Widodo tidak menerbitkan peraturan pemerintah pengganti undang-undang (Perppu) untuk mencabut Undang-Undang Komisi Pemberantasan Korupsi hasil revisi.', '1.jpg', 'JAKARTA, KOMPAS.com - Anggota DPR dari Fraksi PDI Perjuangan Yasonna H Laoly meminta Presiden Joko Widodo tidak menerbitkan peraturan pemerintah pengganti undang-undang (Perppu) untuk mencabut Undang-Undang Komisi Pemberantasan Korupsi hasil revisi. \"Sebaiknya jangan (terbitkan Perppu),\" kata Yasonna di Kompleks Parlemen, Senayan, Jakarta, Rabu (2/10/2019). Yasonna yang baru saja mundur dari posisi menteri hukum dan HAM ini menilai revisi UU KPK sudah tepat. Ia mengklaim revisi yang dilakukan DPR dan pemerintah itu bertujuan untuk memperbaiki KPK. \"Ini kan kita maksudkan untuk perbaikan governance-nya KPK,\" kata Yasonna. Baca juga: Perppu KPK yang Tak Disukai Partai Koalisi Jokowi dan Ditolak Kalla... Oleh karena itu, Yasonna meminta masyarakat untuk melihat terlebih dahulu bagaimana kinerja KPK setelah UU hasil revisi ini diketok. Yasonna meminta masyarakat tidak langsung berpikiran buruk bahwa revisi bisa melemahkan KPK. Ia juga meminta masyarakat berhenti menekan Presiden untuk menerbitkan Perppu. \"Jangan membudayakan menekan-nekan. Sudahlah. Kita atur secara konstitusional saja,\" kata Yasonna. \"Jalankan dulu, lah, lihat kalau nanti (kinerja KPK) tidak sempurna buat legislative review. Belum dijalankan kok sudah suuzon,\" kata dia. Baca juga: Dilema Jokowi Terbitkan Perppu KPK: Pilih Kehendak Rakyat atau Parpol? Yasonna menambahkan, kewenangan menerbitkan perppu memang ada di Jokowi. Namun Perppu juga perlu dibahas bersama-sama oleh DPR. Presiden Jokowi sebelumnya mempertimbangkan untuk menerbitkan Perppu KPK setelah aksi unjuk rasa menolak UU KPK dilakukan mahasiswa di berbagai daerah.', '2019-10-02 09:22:03', '0000-00-00 00:00:00', 135, 'https://nasional.kompas.com/read/2019/10/02/11404981/yasonna-laoly-sebaiknya-jokowi-jangan-terbitkan-perppu-kpk', 'nasional', 'yasonna-laoly--sebaiknya-jokowi-jangan-terbitkan-perppu-kpk'),
(2, 7, 1, '4 Pemain Absen di Latihan Perdana Timnas Indonesia Jelang Hadapi UEA', 'Sebanyak empat pemain Timnas Indonesia absen dalam latihan perdana yang digelar di Stadion Utama Gelora Bung Karno (SUGBK), Senayan, Jakarta Pusat, Rabu (2/10/2019).', '2.jpg', 'Sebanyak empat pemain Timnas Indonesia absen dalam latihan perdana yang digelar di Stadion Utama Gelora Bung Karno (SUGBK), Senayan, Jakarta Pusat, Rabu (2/10/2019). Latihan ini digelar Timnas Indonesia untuk persiapan melawan Uni Emriat Arab atau UEA pada laga ketiga Grup G Kualifikasi Piala Dunia 2022, 10 Oktober mendatang. Sebenarnya, pelatih Timnas Indonesia, Simon McMenemy, memanggil 25 pemain untuk mempersiapkan laga kontra UEA. Namun, hanya ada 21 pemain yang mengikuti latihan di SUGBK, Rabu pagi ini. Ada empat pemain yang absen di latihan perdana Timnas Indonesia menjelang laga kontra UEA, yakni Manahati Lestusen, Novri Setiawan, Alberto Goncalves, dan Yanto Basna. Keempat pemain itu memiliki alasan kuat yang membuat mereka belum bisa bergabung dengan Timnas Indonesia. Manahati Lestusen sebelumnya sudah memberitahu akan terlambat datang ke pemusatan latihan Timnas Indonesia. Kapten Tira Persikabo itu dikabarkan akan menyusul sore ini untuk bergabung dengan timnas Indonesia. Dia terlambat bergabung ke timnas karena harus mengunjungi keluarganya yang terkena musibah gempa bumi di Ambon. Selanjutnya, ada Novri Setiawan yang absen karena dikabarkan masih mengalami cedera.\r\n\r\nNovri Setiawan juga terlihat kemarin sore pada sesi latihan Persija Jakarta. “Untuk Alberto Goncalves baru bergabung pada 6 Oktober karena akan memperkuat Madura United dahulu untuk melawan Persib Bandung di Liga 1,” kata Media Officer timnas Indonesia, Bandung Saputra. “Jadi kan intinya ada empat pemain Madura United yang dipanggil ke Timnas Indonesia. Nah, pelatih Simon McMenemy memberikan dispensasi kepada Alberto Goncalves untuk membela Madura United dahulu,” ucap Bandung Saputra menambahkan. Terakhir, pemain yang absen adalah Yanto Basna. Bek yang bermain di Liga Thailand dengan memperkuat Sukhothai FC itu akan berangkat sendiri ke Uni Emirate Arab ( UEA). Baca juga: Fakhri Husaini Akan Coret Tiga Pemain dari TC Timnas U-19 Indonesia “Kalau Yanto Basna langsung berangkat dari Thailand ke UEA,” kata Bandung Saputra. Timnas Indonesia akan bertolak ke UEA pada Rabu (2/10/2019) malam WIB. Sesampainya di sana, timnas Indonesia langsung menggelar sesi latihan. “Kami menargetkan akan latihan di sana sore hari,” ucap Bandung Saputra. Timnas Indonesia dijadwalkan akan melawan UEA pada laga ketiga Grup G Kualifikasi Piala Dunia 2022 di Stadion Al Maktoum, Dubai, Kamis (10/10/2019). Laga tersebut akan disiarkan di TVRI pada pukul 23.00 WIB. (Mochamad Hary Prasetya)', '2019-10-02 12:15:09', '0000-00-00 00:00:00', 32, 'https://bola.kompas.com/read/2019/10/02/10003788/4-pemain-absen-di-latihan-perdana-timnas-indonesia-jelang-hadapi-uea', 'nasional', '4-pemain-absen-di-latihan-perdana-timnas-indonesia-jelang-hadapi-uea'),
(3, 4, 1, 'iPhone Lawas Ini Bakal Tak Bisa Menjalankan WhatsApp', 'KOMPAS.com - WhatsApp mengumumkan akan mencabut dukungan layanannya untuk iPhone lawas, khususnya iPhone yang masih menjalankan iOS 8.', '3.png', 'KOMPAS.com - WhatsApp mengumumkan akan mencabut dukungan layanannya untuk iPhone lawas, khususnya iPhone yang masih menjalankan iOS 8. Penyetopan ini akan mulai berlaku pada bulan Februari 2020 mendatang. Dengan demikian, mulai tanggal tersebut, WhatsApp tak akan berjalan lagi di iPhone yang masih menggunakan iOS 8 atau yang lebih lama. Menurut keterangan dari WhatsApp, saat ini pengguna iOS 8 sudah tidak bisa membuat akun baru atau memverifikasi akun yang sudah ada di aplikasi tersebut. \"Kalau sekarang WhatsApp masih aktif di perangkat iOS 8 Anda, maka Anda bisa menggunakannya sampai 1 Februari 2020,\" tulis WhatsApp. Baca juga: 2019, Tahun Terakhir WhatsApp di Windows Phone Pada Mei lalu, pihak WhatsApp sudah menyebutkan bahwa dukungan iOS 7 yang lebih lawas bakal dicabut pada tanggal yang sama. Artinya, perangkat iPhone 4 keluaran 2010 yang memang mandek di iOS 7 dan tidak dapat diperbarui ke OS versi berikutnya tak akan bisa lagi menjalankan WhatsApp mulai tahun depan. iPhone 4S (2011) yang setahun lebih muda dari iPhone 4 akan tetap bisa menjalankan WhatsApp karena mendukung hingga iOS 9. Versi OS tersebut menjadi syarat minimal agar WhatsApp bisa bekerja di iPhone. Baca juga: Tahun Depan, WhatsApp Tak Lagi Dukung Android dan iPhone Lawas Versi OS terbaru Apple saat ini adalah iOS 13 yang berselisih lima generasi (5 tahun) dari iOS 8 keluaran tahun 2014. Dirangkum KompasTekno dari Uber Gizmo, Selasa (1/10/2019), selain iOS lawas, WhatsApp juga mewanti-wanti pengguna iPhone jailbreak. \"Modifikasi semacam ini akan mempengaruhi fungsionalitas perangkat Anda, kami tidak bisa memberikan dukungan untuk perangkat yang menggunakan versi modifikasi sistem operasi iPhone,\" tulis WhatsApp', '2019-10-02 12:10:15', '0000-00-00 00:00:00', 55, 'https://tekno.kompas.com/read/2019/10/01/16320027/iphone-lawas-ini-bakal-tak-bisa-menjalankan-whatsapp', 'nasional', 'iphone-lawas-ini-bakal-tak-bisa-menjalankan-whatsapp'),
(4, 1, 1, 'Insiden Salaman di Senayan Pesan Politik Megawati ke Surya Paloh', 'Gestur Ketua Umum PDIP Megawati Soekarnoputri melewati Ketua Umum Partai Nasdem Surya Paloh saat menghadiri pelantikan anggota DPR pada Selasa 1 Oktober 2019 menjadi sorotan publik. Keduanya tidak bersalaman dan saling sapa.\r\n\r\nMomen itu terekam dalam siaran langsung Kompas TV. Bahkan penggalan videonya viral di media sosial. Dalam video itu, terlihat Megawati menyalami sejumlah orang yang ada di depannya. Namun saat berada di depan Surya, Mega melengos dan melewatinya.', '3.jpg', 'Berbagai spekulasi tentang merenggangya hubungan antara Mega dan Surya pun bermunculan, meski dibantah oleh kedua pihak.\r\n\r\nPengamat politik dari Universitas Paramadina, Hendri Satrio mengatakan, sinyal renggangnya hubungan Mega-Surya sejatinya bukan kali ini saja terlihat. Menurutnya, keretakan relasi dua petinggi parpol itu terlihat sejak banyak kader PDIP \'dibajak\' Nasdem.\r\n\r\n\"Dan puncaknya ibu Risma (Wali Kota Surabaya Tri Rismaharini) yang ditawari maju Pilgub Jakarta,\" kata Hendri kepada Liputan6.com, Jakarta, Kamis (3/10/2019).\r\n\r\nPernyataan Surya yang menyebut Presiden Joko Widodo atau Jokowi sebagai kader Nasdem juga diduga menjadi salah satu pemicunya. Hal itu disampaikan Surya di hadapan kadernya saat Jokowi menghadiri pembukaan Sekolah Legislatif Partai Nasdem.\r\n\r\n\"Jadi ceritanya panjang dan enggak ujuk-ujuk. Kemudian diperparah lagi dengan pertemuan anggota koalisi lainnya (tanpa PDIP), ada pertemuan Gondangdia,\" kata Hendri.\r\n\r\nDia melihat, kerenggangan hubungan Mega-Surya sebagai sinyal PDIP dan Nasdem tidak akan berkoalisi lagi pada Pilpres 2024 mendatang. Kedua parpol itu diperkirakan akan mengusung capres yang berbeda.\r\n\r\n\"Tapi kalau Pilkada 2020 berbeda. Jadi gesekan-gesekan seperti ini biasanya hanya terjadi di nasional, kalau di daerah beda lagi. PDIP dan PKS juga sering kerja sama untuk berkoalisi (di daerah),\" ucapnya.\r\n\r\nMeski begitu, Hendri menolak kerenggangan hubungan Mega-Surya disebut dengan sitilah perang dingin. Sikap Surya terhadap Megawati maupun PDIP, menurutnya, tak lepas dari capaian-capaian politik Nasdem dalam beberapa tahun terakhir.\r\n\r\n\"Ini jaga jarak, bukan perang dingin. Surya Paloh pede sebagai kingmaker setelah berhasil usung Ridwan Kamil jadi Gubernur Jawa Barat, walaupun hanya menang 30 persenan saja,\" ujarnya.\r\n\r\nSementara itu, pengamat komunikasi politik dari Universitas Jenderal Soedirman Indaru Setyo Nurprojo mengatakan, Megawati merupakan sosok yang ekspresionis. Jika merasa kecewa, Mega akan meluapkannya baik secara lisan maupun sikap.\r\n\r\n\"Mungkin ada hal-hal yang berkaitan dengan temen-temen kabinet atau persiapan 2024 dan sebagainya. Saya pikir hal-hal taktis seperti itu, Megawati yang ekspresionis terhadap Surya yang kemudian dilewati begitu, itu kan merupakan sebuah pesan. Saya melihatnya begitu,\" kata Indaru kepada Liputan6.com, Jakarta, Kamis (3/10/2019).\r\n\r\nMeski begitu, Indaru menganggap hubungan politik Mega-Surya tidak merenggang atau retak. Dia melihat, sikap tersebut diberikan Mega hanya sebagai sebuah pesan untuk Surya dalam berpolitik.\r\n\r\n\"Ini ingin menyampaikan kepada publik sikap saya dengan dia, yang kedua adalah pesan ke Surya Paloh, bahwa \'lu enggak usah terlalu gimana\' gitu loh. Ada pesan ke Surya Paloh supaya menjaga etika politik, menjaga komunikasi, menjaga komitmen dan sebagainya,\" ucapnya.\r\n\r\nBerbeda dengan Hendri, Indaru menilai sikap Mega terhadap Surya tidak ada kaitannya dengan manuver politik Nasdem terhadap kader-kader PDIP. Dia melihat bahwa gestur Mega itu terkait situasi politik terkini, terutama soal komposisi kabinet Jokowi-Ma\'ruf.\r\n\r\n\"Saya lebih melihat strategi politik ke depan atau menjelang penetapan kabinet. Kita tahu bahwa kejaksaan itu kan diperebutkan PDIP dengan Surya Paloh yang cukup ngotot untuk wilayah itu,\" jelas Indaru.\r\n\r\nBahkan pesan tersebut belum terlalu jauh bersinggungan dengan Pilpres 2024. Meski, menurut Indaru, Nasdem berpeluang tak lagi berkoalisi dengan PDIP setelah memiliki Ridwan Kamil yang sukses di Pilgub Jabar dan akan dipersiapkan pada kontestasi politik level nasional.\r\n\r\n\"Ini juga ancang-ancang, tapi menurut saya tidak sejauh itu. Analisa publiknya adalah hubungan Megawati dengan Ketum Partai Nasdem, yang kedua pesan kepada Surya Paloh agar berhati-hati dalam mengambil kebijakan politik atau maksa begini begitu demi Partai Nasdem,\" katanya.\r\n\r\nApalagi saat Kongres V PDIP di Bali, Megawati dalam pidatonya terang-terangan minta jatah kursi menteri lebih banyak kepada Jokowi.\r\n\r\n\"Jadi saya melihat bahwa ini sikap politik ketua umum dengan ketua umum, pesan kepada Surya Paloh agar tidak kebablasan lah dalam meminta kabinet, karena dia bagian dari koalisi pendukung Jokowi juga,\" Indaru menandaskan.', '2019-10-04 09:10:05', '0000-00-00 00:00:00', 21, 'https://www.liputan6.com/news/read/4078052/headline-insiden-salaman-di-senayan-pesan-politik-megawati-ke-surya-paloh', 'nasional', 'insiden-salaman-di-senayan-pesan-politik-megawati-ke-surya-paloh'),
(5, 1, 1, 'Agum Gumelar soal Wiranto Ditusuk Kuncinya di Intelijen', 'Jakarta, CNN Indonesia -- Anggota Dewan Pertimbangan Presiden (wantimpres) Agum Gumelar menilai kasus penyerangan terhadap Menko Polhukam Wiranto bisa jadi catatan memperkuat sistem intelijen negara. Namun Agum menolak menyebut bahwa Badan Intelijen Negara (BIN) kecolongan dalam mencegah terjadinya insiden penyerangan di Pandeglang pada Kamis (10/10) kemarin.', '20191011140918.jpeg', '<p>Jakarta, CNN Indonesia -- Anggota Dewan Pertimbangan Presiden (wantimpres) <a href=\"https://www.cnnindonesia.com/tag/agum-gumelar\"><strong>Agum Gumela</strong>r</a>&nbsp;menilai kasus penyerangan terhadap Menko Polhukam <a href=\"https://www.cnnindonesia.com/tag/wiranto\"><strong>Wiranto</strong></a>&nbsp;bisa jadi catatan memperkuat sistem intelijen negara. Namun Agum menolak menyebut bahwa Badan Intelijen Negara (BIN) kecolongan dalam mencegah terjadinya insiden penyerangan di Pandeglang pada Kamis (10/10) kemarin.<br><br>\"Oh bukan, bukan begitu [kecolongan]. Menghadapi ancaman seperti ini kuncinya intelijen,\" kata Agum ditemui usai menjenguk Wiranto di RSPAD Gatot Subroto, Jakarta, Jumat (11/10).<br><br>Agum seolah memaklumi bahwa penyerangan bisa menargetkan siapa saja dan kapan saja. Purnawirawan Jenderal TNI ini setuju jika pengamanan pejabat harus diperketat.</p><p>&nbsp;</p><p>Ia menambahkan, informasi dari intelijen lantas bisa digunakan untuk menentukan tindakan selanjutnya, baik dari segi pengamanan maupun pencegahan.&nbsp;<br><br>\"Di sini peringatannya ke kita semua,\" sambung dia.<br><br>Menurut Agum, apa yang menimpa Wiranto memang sulit diprediksi dan ia anggap sebagai bagian dari teror yang sistematis. Menurutnya penting bagi kepolisian untuk mengungkap kasus penyerangan ini secara tuntas.<br><br>\"Kita serahkan ke polisi untuk bisa mengungkapkan jaringannya ke mana, motivasinya apa. Biarkan polisi yang bekerja,\" kata Agum lagi.<br><br>Setelah sekitar 20 menit menjenguk Wiranto, Agum mengungkapkan kondisi rekannya itu berangsur membaik. Wiranto, menurut dia, perlahan sudah bisa berkomunikasi meskipun dengan suara lirih.</p>', '2019-10-11 14:09:18', '0000-00-00 00:00:00', 9, 'https://cnnindonesia.com/nasional/20191011111159-20-438635/agum-gumelar-soal-wiranto-ditusuk-kuncinya-di-intelijen', 'nasional', 'agum-gumelar-soal-wiranto-ditusuk-kuncinya-di-intelijen');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fungsi`
--

CREATE TABLE `fungsi` (
  `id_fungsi` int(10) NOT NULL,
  `nama_fungsi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `fungsi`
--

INSERT INTO `fungsi` (`id_fungsi`, `nama_fungsi`) VALUES
(2, 'Reskrim'),
(3, 'Lantas'),
(4, 'Sabara'),
(5, 'Bimas'),
(6, 'Propam'),
(7, 'Reskoba'),
(8, 'Humas'),
(9, 'IT'),
(10, 'Siewas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id_gallery` int(10) NOT NULL,
  `gambar_gallery` varchar(50) NOT NULL,
  `id_admin` int(10) NOT NULL,
  `upload_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id_gallery`, `gambar_gallery`, `id_admin`, `upload_date`) VALUES
(44, 'GALLERY_201910281021270.jpeg', 1, '2019-10-28 10:21:28'),
(45, 'GALLERY_201910281022100.jpg', 1, '2019-10-28 10:22:10'),
(46, 'GALLERY_201910281022430.jpeg', 1, '2019-10-28 10:22:43'),
(47, 'GALLERY_201910281024020.JPG', 1, '2019-10-28 10:24:05'),
(55, 'GALLERY_201910281045310.JPG', 1, '2019-10-28 10:45:33'),
(56, 'GALLERY_201910281045341.JPG', 1, '2019-10-28 10:45:36'),
(57, 'GALLERY_201910281048270.JPG', 1, '2019-10-28 10:48:29'),
(58, 'GALLERY_201910281048301.JPG', 1, '2019-10-28 10:48:32'),
(59, 'GALLERY_201910281048342.JPG', 1, '2019-10-28 10:48:35'),
(60, 'GALLERY_201910281048383.JPG', 1, '2019-10-28 10:48:37'),
(61, 'GALLERY_201910281048414.JPG', 1, '2019-10-28 10:48:40'),
(62, 'GALLERY_201910281048455.JPG', 1, '2019-10-28 10:48:43'),
(63, 'GALLERY_20191028105249.JPG', 1, '2019-10-28 10:52:52'),
(64, 'GALLERY_201910281110570.JPG', 1, '2019-10-28 11:11:00'),
(65, 'GALLERY_201910281111011.JPG', 1, '2019-10-28 11:11:03'),
(66, 'GALLERY_201910281111052.JPG', 1, '2019-10-28 11:11:05'),
(67, 'GALLERY_201910281138340.JPG', 1, '2019-10-28 11:38:37'),
(68, 'GALLERY_201910281419170.JPG', 1, '2019-10-28 14:19:20'),
(69, 'GALLERY_201910281457190.png', 10, '2019-10-28 14:57:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_berita`
--

CREATE TABLE `kategori_berita` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `urikategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_berita`
--

INSERT INTO `kategori_berita` (`id_kategori`, `nama_kategori`, `urikategori`) VALUES
(1, 'Politics', 'politics'),
(2, 'Breaking News', 'breaking-news'),
(3, 'Business', 'business'),
(4, 'Technology', 'technology'),
(5, 'Health', 'health'),
(6, 'Travel', 'travel'),
(7, 'Sports', 'sports'),
(8, 'Ethnic', 'ethnic'),
(9, 'Economies', 'economies'),
(10, 'Harian kita', 'harian-kita');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kotakab`
--

CREATE TABLE `kotakab` (
  `id_kotakab` varchar(10) NOT NULL,
  `id_provinsi` varchar(11) DEFAULT NULL,
  `name` varchar(36) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `kotakab`
--

INSERT INTO `kotakab` (`id_kotakab`, `id_provinsi`, `name`) VALUES
('1101', '11', 'KABUPATEN SIMEULUE'),
('1102', '11', 'KABUPATEN ACEH SINGKIL'),
('1103', '11', 'KABUPATEN ACEH SELATAN'),
('1104', '11', 'KABUPATEN ACEH TENGGARA'),
('1105', '11', 'KABUPATEN ACEH TIMUR'),
('1106', '11', 'KABUPATEN ACEH TENGAH'),
('1107', '11', 'KABUPATEN ACEH BARAT'),
('1108', '11', 'KABUPATEN ACEH BESAR'),
('1109', '11', 'KABUPATEN PIDIE'),
('1110', '11', 'KABUPATEN BIREUEN'),
('1111', '11', 'KABUPATEN ACEH UTARA'),
('1112', '11', 'KABUPATEN ACEH BARAT DAYA'),
('1113', '11', 'KABUPATEN GAYO LUES'),
('1114', '11', 'KABUPATEN ACEH TAMIANG'),
('1115', '11', 'KABUPATEN NAGAN RAYA'),
('1116', '11', 'KABUPATEN ACEH JAYA'),
('1117', '11', 'KABUPATEN BENER MERIAH'),
('1118', '11', 'KABUPATEN PIDIE JAYA'),
('1171', '11', 'KOTA BANDA ACEH'),
('1172', '11', 'KOTA SABANG'),
('1173', '11', 'KOTA LANGSA'),
('1174', '11', 'KOTA LHOKSEUMAWE'),
('1175', '11', 'KOTA SUBULUSSALAM'),
('1201', '12', 'KABUPATEN NIAS'),
('1202', '12', 'KABUPATEN MANDAILING NATAL'),
('1203', '12', 'KABUPATEN TAPANULI SELATAN'),
('1204', '12', 'KABUPATEN TAPANULI TENGAH'),
('1205', '12', 'KABUPATEN TAPANULI UTARA'),
('1206', '12', 'KABUPATEN TOBA SAMOSIR'),
('1207', '12', 'KABUPATEN LABUHAN BATU'),
('1208', '12', 'KABUPATEN ASAHAN'),
('1209', '12', 'KABUPATEN SIMALUNGUN'),
('1210', '12', 'KABUPATEN DAIRI'),
('1211', '12', 'KABUPATEN KARO'),
('1212', '12', 'KABUPATEN DELI SERDANG'),
('1213', '12', 'KABUPATEN LANGKAT'),
('1214', '12', 'KABUPATEN NIAS SELATAN'),
('1215', '12', 'KABUPATEN HUMBANG HASUNDUTAN'),
('1216', '12', 'KABUPATEN PAKPAK BHARAT'),
('1217', '12', 'KABUPATEN SAMOSIR'),
('1218', '12', 'KABUPATEN SERDANG BEDAGAI'),
('1219', '12', 'KABUPATEN BATU BARA'),
('1220', '12', 'KABUPATEN PADANG LAWAS UTARA'),
('1221', '12', 'KABUPATEN PADANG LAWAS'),
('1222', '12', 'KABUPATEN LABUHAN BATU SELATAN'),
('1223', '12', 'KABUPATEN LABUHAN BATU UTARA'),
('1224', '12', 'KABUPATEN NIAS UTARA'),
('1225', '12', 'KABUPATEN NIAS BARAT'),
('1271', '12', 'KOTA SIBOLGA'),
('1272', '12', 'KOTA TANJUNG BALAI'),
('1273', '12', 'KOTA PEMATANG SIANTAR'),
('1274', '12', 'KOTA TEBING TINGGI'),
('1275', '12', 'KOTA MEDAN'),
('1276', '12', 'KOTA BINJAI'),
('1277', '12', 'KOTA PADANGSIDIMPUAN'),
('1278', '12', 'KOTA GUNUNGSITOLI'),
('1301', '13', 'KABUPATEN KEPULAUAN MENTAWAI'),
('1302', '13', 'KABUPATEN PESISIR SELATAN'),
('1303', '13', 'KABUPATEN SOLOK'),
('1304', '13', 'KABUPATEN SIJUNJUNG'),
('1305', '13', 'KABUPATEN TANAH DATAR'),
('1306', '13', 'KABUPATEN PADANG PARIAMAN'),
('1307', '13', 'KABUPATEN AGAM'),
('1308', '13', 'KABUPATEN LIMA PULUH KOTA'),
('1309', '13', 'KABUPATEN PASAMAN'),
('1310', '13', 'KABUPATEN SOLOK SELATAN'),
('1311', '13', 'KABUPATEN DHARMASRAYA'),
('1312', '13', 'KABUPATEN PASAMAN BARAT'),
('1371', '13', 'KOTA PADANG'),
('1372', '13', 'KOTA SOLOK'),
('1373', '13', 'KOTA SAWAH LUNTO'),
('1374', '13', 'KOTA PADANG PANJANG'),
('1375', '13', 'KOTA BUKITTINGGI'),
('1376', '13', 'KOTA PAYAKUMBUH'),
('1377', '13', 'KOTA PARIAMAN'),
('1401', '14', 'KABUPATEN KUANTAN SINGINGI'),
('1402', '14', 'KABUPATEN INDRAGIRI HULU'),
('1403', '14', 'KABUPATEN INDRAGIRI HILIR'),
('1404', '14', 'KABUPATEN PELALAWAN'),
('1405', '14', 'KABUPATEN S I A K'),
('1406', '14', 'KABUPATEN KAMPAR'),
('1407', '14', 'KABUPATEN ROKAN HULU'),
('1408', '14', 'KABUPATEN BENGKALIS'),
('1409', '14', 'KABUPATEN ROKAN HILIR'),
('1410', '14', 'KABUPATEN KEPULAUAN MERANTI'),
('1471', '14', 'KOTA PEKANBARU'),
('1473', '14', 'KOTA D U M A I'),
('1501', '15', 'KABUPATEN KERINCI'),
('1502', '15', 'KABUPATEN MERANGIN'),
('1503', '15', 'KABUPATEN SAROLANGUN'),
('1504', '15', 'KABUPATEN BATANG HARI'),
('1505', '15', 'KABUPATEN MUARO JAMBI'),
('1506', '15', 'KABUPATEN TANJUNG JABUNG TIMUR'),
('1507', '15', 'KABUPATEN TANJUNG JABUNG BARAT'),
('1508', '15', 'KABUPATEN TEBO'),
('1509', '15', 'KABUPATEN BUNGO'),
('1571', '15', 'KOTA JAMBI'),
('1572', '15', 'KOTA SUNGAI PENUH'),
('1601', '16', 'KABUPATEN OGAN KOMERING ULU'),
('1602', '16', 'KABUPATEN OGAN KOMERING ILIR'),
('1603', '16', 'KABUPATEN MUARA ENIM'),
('1604', '16', 'KABUPATEN LAHAT'),
('1605', '16', 'KABUPATEN MUSI RAWAS'),
('1606', '16', 'KABUPATEN MUSI BANYUASIN'),
('1607', '16', 'KABUPATEN BANYU ASIN'),
('1608', '16', 'KABUPATEN OGAN KOMERING ULU SELATAN'),
('1609', '16', 'KABUPATEN OGAN KOMERING ULU TIMUR'),
('1610', '16', 'KABUPATEN OGAN ILIR'),
('1611', '16', 'KABUPATEN EMPAT LAWANG'),
('1612', '16', 'KABUPATEN PENUKAL ABAB LEMATANG ILIR'),
('1613', '16', 'KABUPATEN MUSI RAWAS UTARA'),
('1671', '16', 'KOTA PALEMBANG'),
('1672', '16', 'KOTA PRABUMULIH'),
('1673', '16', 'KOTA PAGAR ALAM'),
('1674', '16', 'KOTA LUBUKLINGGAU'),
('1701', '17', 'KABUPATEN BENGKULU SELATAN'),
('1702', '17', 'KABUPATEN REJANG LEBONG'),
('1703', '17', 'KABUPATEN BENGKULU UTARA'),
('1704', '17', 'KABUPATEN KAUR'),
('1705', '17', 'KABUPATEN SELUMA'),
('1706', '17', 'KABUPATEN MUKOMUKO'),
('1707', '17', 'KABUPATEN LEBONG'),
('1708', '17', 'KABUPATEN KEPAHIANG'),
('1709', '17', 'KABUPATEN BENGKULU TENGAH'),
('1771', '17', 'KOTA BENGKULU'),
('1801', '18', 'KABUPATEN LAMPUNG BARAT'),
('1802', '18', 'KABUPATEN TANGGAMUS'),
('1803', '18', 'KABUPATEN LAMPUNG SELATAN'),
('1804', '18', 'KABUPATEN LAMPUNG TIMUR'),
('1805', '18', 'KABUPATEN LAMPUNG TENGAH'),
('1806', '18', 'KABUPATEN LAMPUNG UTARA'),
('1807', '18', 'KABUPATEN WAY KANAN'),
('1808', '18', 'KABUPATEN TULANGBAWANG'),
('1809', '18', 'KABUPATEN PESAWARAN'),
('1810', '18', 'KABUPATEN PRINGSEWU'),
('1811', '18', 'KABUPATEN MESUJI'),
('1812', '18', 'KABUPATEN TULANG BAWANG BARAT'),
('1813', '18', 'KABUPATEN PESISIR BARAT'),
('1871', '18', 'KOTA BANDAR LAMPUNG'),
('1872', '18', 'KOTA METRO'),
('1901', '19', 'KABUPATEN BANGKA'),
('1902', '19', 'KABUPATEN BELITUNG'),
('1903', '19', 'KABUPATEN BANGKA BARAT'),
('1904', '19', 'KABUPATEN BANGKA TENGAH'),
('1905', '19', 'KABUPATEN BANGKA SELATAN'),
('1906', '19', 'KABUPATEN BELITUNG TIMUR'),
('1971', '19', 'KOTA PANGKAL PINANG'),
('2101', '21', 'KABUPATEN KARIMUN'),
('2102', '21', 'KABUPATEN BINTAN'),
('2103', '21', 'KABUPATEN NATUNA'),
('2104', '21', 'KABUPATEN LINGGA'),
('2105', '21', 'KABUPATEN KEPULAUAN ANAMBAS'),
('2171', '21', 'KOTA B A T A M'),
('2172', '21', 'KOTA TANJUNG PINANG'),
('3101', '31', 'KABUPATEN KEPULAUAN SERIBU'),
('3171', '31', 'KOTA JAKARTA SELATAN'),
('3172', '31', 'KOTA JAKARTA TIMUR'),
('3173', '31', 'KOTA JAKARTA PUSAT'),
('3174', '31', 'KOTA JAKARTA BARAT'),
('3175', '31', 'KOTA JAKARTA UTARA'),
('3201', '32', 'KABUPATEN BOGOR'),
('3202', '32', 'KABUPATEN SUKABUMI'),
('3203', '32', 'KABUPATEN CIANJUR'),
('3204', '32', 'KABUPATEN BANDUNG'),
('3205', '32', 'KABUPATEN GARUT'),
('3206', '32', 'KABUPATEN TASIKMALAYA'),
('3207', '32', 'KABUPATEN CIAMIS'),
('3208', '32', 'KABUPATEN KUNINGAN'),
('3209', '32', 'KABUPATEN CIREBON'),
('3210', '32', 'KABUPATEN MAJALENGKA'),
('3211', '32', 'KABUPATEN SUMEDANG'),
('3212', '32', 'KABUPATEN INDRAMAYU'),
('3213', '32', 'KABUPATEN SUBANG'),
('3214', '32', 'KABUPATEN PURWAKARTA'),
('3215', '32', 'KABUPATEN KARAWANG'),
('3216', '32', 'KABUPATEN BEKASI'),
('3217', '32', 'KABUPATEN BANDUNG BARAT'),
('3218', '32', 'KABUPATEN PANGANDARAN'),
('3271', '32', 'KOTA BOGOR'),
('3272', '32', 'KOTA SUKABUMI'),
('3273', '32', 'KOTA BANDUNG'),
('3274', '32', 'KOTA CIREBON'),
('3275', '32', 'KOTA BEKASI'),
('3276', '32', 'KOTA DEPOK'),
('3277', '32', 'KOTA CIMAHI'),
('3278', '32', 'KOTA TASIKMALAYA'),
('3279', '32', 'KOTA BANJAR'),
('3301', '33', 'KABUPATEN CILACAP'),
('3302', '33', 'KABUPATEN BANYUMAS'),
('3303', '33', 'KABUPATEN PURBALINGGA'),
('3304', '33', 'KABUPATEN BANJARNEGARA'),
('3305', '33', 'KABUPATEN KEBUMEN'),
('3306', '33', 'KABUPATEN PURWOREJO'),
('3307', '33', 'KABUPATEN WONOSOBO'),
('3308', '33', 'KABUPATEN MAGELANG'),
('3309', '33', 'KABUPATEN BOYOLALI'),
('3310', '33', 'KABUPATEN KLATEN'),
('3311', '33', 'KABUPATEN SUKOHARJO'),
('3312', '33', 'KABUPATEN WONOGIRI'),
('3313', '33', 'KABUPATEN KARANGANYAR'),
('3314', '33', 'KABUPATEN SRAGEN'),
('3315', '33', 'KABUPATEN GROBOGAN'),
('3316', '33', 'KABUPATEN BLORA'),
('3317', '33', 'KABUPATEN REMBANG'),
('3318', '33', 'KABUPATEN PATI'),
('3319', '33', 'KABUPATEN KUDUS'),
('3320', '33', 'KABUPATEN JEPARA'),
('3321', '33', 'KABUPATEN DEMAK'),
('3322', '33', 'KABUPATEN SEMARANG'),
('3323', '33', 'KABUPATEN TEMANGGUNG'),
('3324', '33', 'KABUPATEN KENDAL'),
('3325', '33', 'KABUPATEN BATANG'),
('3326', '33', 'KABUPATEN PEKALONGAN'),
('3327', '33', 'KABUPATEN PEMALANG'),
('3328', '33', 'KABUPATEN TEGAL'),
('3329', '33', 'KABUPATEN BREBES'),
('3371', '33', 'KOTA MAGELANG'),
('3372', '33', 'KOTA SURAKARTA'),
('3373', '33', 'KOTA SALATIGA'),
('3374', '33', 'KOTA SEMARANG'),
('3375', '33', 'KOTA PEKALONGAN'),
('3376', '33', 'KOTA TEGAL'),
('3401', '34', 'KABUPATEN KULON PROGO'),
('3402', '34', 'KABUPATEN BANTUL'),
('3403', '34', 'KABUPATEN GUNUNG KIDUL'),
('3404', '34', 'KABUPATEN SLEMAN'),
('3471', '34', 'KOTA YOGYAKARTA'),
('3501', '35', 'KABUPATEN PACITAN'),
('3502', '35', 'KABUPATEN PONOROGO'),
('3503', '35', 'KABUPATEN TRENGGALEK'),
('3504', '35', 'KABUPATEN TULUNGAGUNG'),
('3505', '35', 'KABUPATEN BLITAR'),
('3506', '35', 'KABUPATEN KEDIRI'),
('3507', '35', 'KABUPATEN MALANG'),
('3508', '35', 'KABUPATEN LUMAJANG'),
('3509', '35', 'KABUPATEN JEMBER'),
('3510', '35', 'KABUPATEN BANYUWANGI'),
('3511', '35', 'KABUPATEN BONDOWOSO'),
('3512', '35', 'KABUPATEN SITUBONDO'),
('3513', '35', 'KABUPATEN PROBOLINGGO'),
('3514', '35', 'KABUPATEN PASURUAN'),
('3515', '35', 'KABUPATEN SIDOARJO'),
('3516', '35', 'KABUPATEN MOJOKERTO'),
('3517', '35', 'KABUPATEN JOMBANG'),
('3518', '35', 'KABUPATEN NGANJUK'),
('3519', '35', 'KABUPATEN MADIUN'),
('3520', '35', 'KABUPATEN MAGETAN'),
('3521', '35', 'KABUPATEN NGAWI'),
('3522', '35', 'KABUPATEN BOJONEGORO'),
('3523', '35', 'KABUPATEN TUBAN'),
('3524', '35', 'KABUPATEN LAMONGAN'),
('3525', '35', 'KABUPATEN GRESIK'),
('3526', '35', 'KABUPATEN BANGKALAN'),
('3527', '35', 'KABUPATEN SAMPANG'),
('3528', '35', 'KABUPATEN PAMEKASAN'),
('3529', '35', 'KABUPATEN SUMENEP'),
('3571', '35', 'KOTA KEDIRI'),
('3572', '35', 'KOTA BLITAR'),
('3573', '35', 'KOTA MALANG'),
('3574', '35', 'KOTA PROBOLINGGO'),
('3575', '35', 'KOTA PASURUAN'),
('3576', '35', 'KOTA MOJOKERTO'),
('3577', '35', 'KOTA MADIUN'),
('3578', '35', 'KOTA SURABAYA'),
('3579', '35', 'KOTA BATU'),
('3601', '36', 'KABUPATEN PANDEGLANG'),
('3602', '36', 'KABUPATEN LEBAK'),
('3603', '36', 'KABUPATEN TANGERANG'),
('3604', '36', 'KABUPATEN SERANG'),
('3671', '36', 'KOTA TANGERANG'),
('3672', '36', 'KOTA CILEGON'),
('3673', '36', 'KOTA SERANG'),
('3674', '36', 'KOTA TANGERANG SELATAN'),
('5101', '51', 'KABUPATEN JEMBRANA'),
('5102', '51', 'KABUPATEN TABANAN'),
('5103', '51', 'KABUPATEN BADUNG'),
('5104', '51', 'KABUPATEN GIANYAR'),
('5105', '51', 'KABUPATEN KLUNGKUNG'),
('5106', '51', 'KABUPATEN BANGLI'),
('5107', '51', 'KABUPATEN KARANG ASEM'),
('5108', '51', 'KABUPATEN BULELENG'),
('5171', '51', 'KOTA DENPASAR'),
('5201', '52', 'KABUPATEN LOMBOK BARAT'),
('5202', '52', 'KABUPATEN LOMBOK TENGAH'),
('5203', '52', 'KABUPATEN LOMBOK TIMUR'),
('5204', '52', 'KABUPATEN SUMBAWA'),
('5205', '52', 'KABUPATEN DOMPU'),
('5206', '52', 'KABUPATEN BIMA'),
('5207', '52', 'KABUPATEN SUMBAWA BARAT'),
('5208', '52', 'KABUPATEN LOMBOK UTARA'),
('5271', '52', 'KOTA MATARAM'),
('5272', '52', 'KOTA BIMA'),
('5301', '53', 'KABUPATEN SUMBA BARAT'),
('5302', '53', 'KABUPATEN SUMBA TIMUR'),
('5303', '53', 'KABUPATEN KUPANG'),
('5304', '53', 'KABUPATEN TIMOR TENGAH SELATAN'),
('5305', '53', 'KABUPATEN TIMOR TENGAH UTARA'),
('5306', '53', 'KABUPATEN BELU'),
('5307', '53', 'KABUPATEN ALOR'),
('5308', '53', 'KABUPATEN LEMBATA'),
('5309', '53', 'KABUPATEN FLORES TIMUR'),
('5310', '53', 'KABUPATEN SIKKA'),
('5311', '53', 'KABUPATEN ENDE'),
('5312', '53', 'KABUPATEN NGADA'),
('5313', '53', 'KABUPATEN MANGGARAI'),
('5314', '53', 'KABUPATEN ROTE NDAO'),
('5315', '53', 'KABUPATEN MANGGARAI BARAT'),
('5316', '53', 'KABUPATEN SUMBA TENGAH'),
('5317', '53', 'KABUPATEN SUMBA BARAT DAYA'),
('5318', '53', 'KABUPATEN NAGEKEO'),
('5319', '53', 'KABUPATEN MANGGARAI TIMUR'),
('5320', '53', 'KABUPATEN SABU RAIJUA'),
('5321', '53', 'KABUPATEN MALAKA'),
('5371', '53', 'KOTA KUPANG'),
('6101', '61', 'KABUPATEN SAMBAS'),
('6102', '61', 'KABUPATEN BENGKAYANG'),
('6103', '61', 'KABUPATEN LANDAK'),
('6104', '61', 'KABUPATEN MEMPAWAH'),
('6105', '61', 'KABUPATEN SANGGAU'),
('6106', '61', 'KABUPATEN KETAPANG'),
('6107', '61', 'KABUPATEN SINTANG'),
('6108', '61', 'KABUPATEN KAPUAS HULU'),
('6109', '61', 'KABUPATEN SEKADAU'),
('6110', '61', 'KABUPATEN MELAWI'),
('6111', '61', 'KABUPATEN KAYONG UTARA'),
('6112', '61', 'KABUPATEN KUBU RAYA'),
('6171', '61', 'KOTA PONTIANAK'),
('6172', '61', 'KOTA SINGKAWANG'),
('6201', '62', 'KABUPATEN KOTAWARINGIN BARAT'),
('6202', '62', 'KABUPATEN KOTAWARINGIN TIMUR'),
('6203', '62', 'KABUPATEN KAPUAS'),
('6204', '62', 'KABUPATEN BARITO SELATAN'),
('6205', '62', 'KABUPATEN BARITO UTARA'),
('6206', '62', 'KABUPATEN SUKAMARA'),
('6207', '62', 'KABUPATEN LAMANDAU'),
('6208', '62', 'KABUPATEN SERUYAN'),
('6209', '62', 'KABUPATEN KATINGAN'),
('6210', '62', 'KABUPATEN PULANG PISAU'),
('6211', '62', 'KABUPATEN GUNUNG MAS'),
('6212', '62', 'KABUPATEN BARITO TIMUR'),
('6213', '62', 'KABUPATEN MURUNG RAYA'),
('6271', '62', 'KOTA PALANGKA RAYA'),
('6301', '63', 'KABUPATEN TANAH LAUT'),
('6302', '63', 'KABUPATEN KOTA BARU'),
('6303', '63', 'KABUPATEN BANJAR'),
('6304', '63', 'KABUPATEN BARITO KUALA'),
('6305', '63', 'KABUPATEN TAPIN'),
('6306', '63', 'KABUPATEN HULU SUNGAI SELATAN'),
('6307', '63', 'KABUPATEN HULU SUNGAI TENGAH'),
('6308', '63', 'KABUPATEN HULU SUNGAI UTARA'),
('6309', '63', 'KABUPATEN TABALONG'),
('6310', '63', 'KABUPATEN TANAH BUMBU'),
('6311', '63', 'KABUPATEN BALANGAN'),
('6371', '63', 'KOTA BANJARMASIN'),
('6372', '63', 'KOTA BANJAR BARU'),
('6401', '64', 'KABUPATEN PASER'),
('6402', '64', 'KABUPATEN KUTAI BARAT'),
('6403', '64', 'KABUPATEN KUTAI KARTANEGARA'),
('6404', '64', 'KABUPATEN KUTAI TIMUR'),
('6405', '64', 'KABUPATEN BERAU'),
('6409', '64', 'KABUPATEN PENAJAM PASER UTARA'),
('6411', '64', 'KABUPATEN MAHAKAM HULU'),
('6471', '64', 'KOTA BALIKPAPAN'),
('6472', '64', 'KOTA SAMARINDA'),
('6474', '64', 'KOTA BONTANG'),
('6501', '65', 'KABUPATEN MALINAU'),
('6502', '65', 'KABUPATEN BULUNGAN'),
('6503', '65', 'KABUPATEN TANA TIDUNG'),
('6504', '65', 'KABUPATEN NUNUKAN'),
('6571', '65', 'KOTA TARAKAN'),
('7101', '71', 'KABUPATEN BOLAANG MONGONDOW'),
('7102', '71', 'KABUPATEN MINAHASA'),
('7103', '71', 'KABUPATEN KEPULAUAN SANGIHE'),
('7104', '71', 'KABUPATEN KEPULAUAN TALAUD'),
('7105', '71', 'KABUPATEN MINAHASA SELATAN'),
('7106', '71', 'KABUPATEN MINAHASA UTARA'),
('7107', '71', 'KABUPATEN BOLAANG MONGONDOW UTARA'),
('7108', '71', 'KABUPATEN SIAU TAGULANDANG BIARO'),
('7109', '71', 'KABUPATEN MINAHASA TENGGARA'),
('7110', '71', 'KABUPATEN BOLAANG MONGONDOW SELATAN'),
('7111', '71', 'KABUPATEN BOLAANG MONGONDOW TIMUR'),
('7171', '71', 'KOTA MANADO'),
('7172', '71', 'KOTA BITUNG'),
('7173', '71', 'KOTA TOMOHON'),
('7174', '71', 'KOTA KOTAMOBAGU'),
('7201', '72', 'KABUPATEN BANGGAI KEPULAUAN'),
('7202', '72', 'KABUPATEN BANGGAI'),
('7203', '72', 'KABUPATEN MOROWALI'),
('7204', '72', 'KABUPATEN POSO'),
('7205', '72', 'KABUPATEN DONGGALA'),
('7206', '72', 'KABUPATEN TOLI-TOLI'),
('7207', '72', 'KABUPATEN BUOL'),
('7208', '72', 'KABUPATEN PARIGI MOUTONG'),
('7209', '72', 'KABUPATEN TOJO UNA-UNA'),
('7210', '72', 'KABUPATEN SIGI'),
('7211', '72', 'KABUPATEN BANGGAI LAUT'),
('7212', '72', 'KABUPATEN MOROWALI UTARA'),
('7271', '72', 'KOTA PALU'),
('7301', '73', 'KABUPATEN KEPULAUAN SELAYAR'),
('7302', '73', 'KABUPATEN BULUKUMBA'),
('7303', '73', 'KABUPATEN BANTAENG'),
('7304', '73', 'KABUPATEN JENEPONTO'),
('7305', '73', 'KABUPATEN TAKALAR'),
('7306', '73', 'KABUPATEN GOWA'),
('7307', '73', 'KABUPATEN SINJAI'),
('7308', '73', 'KABUPATEN MAROS'),
('7309', '73', 'KABUPATEN PANGKAJENE DAN KEPULAUAN'),
('7310', '73', 'KABUPATEN BARRU'),
('7311', '73', 'KABUPATEN BONE'),
('7312', '73', 'KABUPATEN SOPPENG'),
('7313', '73', 'KABUPATEN WAJO'),
('7314', '73', 'KABUPATEN SIDENRENG RAPPANG'),
('7315', '73', 'KABUPATEN PINRANG'),
('7316', '73', 'KABUPATEN ENREKANG'),
('7317', '73', 'KABUPATEN LUWU'),
('7318', '73', 'KABUPATEN TANA TORAJA'),
('7322', '73', 'KABUPATEN LUWU UTARA'),
('7325', '73', 'KABUPATEN LUWU TIMUR'),
('7326', '73', 'KABUPATEN TORAJA UTARA'),
('7371', '73', 'KOTA MAKASSAR'),
('7372', '73', 'KOTA PAREPARE'),
('7373', '73', 'KOTA PALOPO'),
('7401', '74', 'KABUPATEN BUTON'),
('7402', '74', 'KABUPATEN MUNA'),
('7403', '74', 'KABUPATEN KONAWE'),
('7404', '74', 'KABUPATEN KOLAKA'),
('7405', '74', 'KABUPATEN KONAWE SELATAN'),
('7406', '74', 'KABUPATEN BOMBANA'),
('7407', '74', 'KABUPATEN WAKATOBI'),
('7408', '74', 'KABUPATEN KOLAKA UTARA'),
('7409', '74', 'KABUPATEN BUTON UTARA'),
('7410', '74', 'KABUPATEN KONAWE UTARA'),
('7411', '74', 'KABUPATEN KOLAKA TIMUR'),
('7412', '74', 'KABUPATEN KONAWE KEPULAUAN'),
('7413', '74', 'KABUPATEN MUNA BARAT'),
('7414', '74', 'KABUPATEN BUTON TENGAH'),
('7415', '74', 'KABUPATEN BUTON SELATAN'),
('7471', '74', 'KOTA KENDARI'),
('7472', '74', 'KOTA BAUBAU'),
('7501', '75', 'KABUPATEN BOALEMO'),
('7502', '75', 'KABUPATEN GORONTALO'),
('7503', '75', 'KABUPATEN POHUWATO'),
('7504', '75', 'KABUPATEN BONE BOLANGO'),
('7505', '75', 'KABUPATEN GORONTALO UTARA'),
('7571', '75', 'KOTA GORONTALO'),
('7601', '76', 'KABUPATEN MAJENE'),
('7602', '76', 'KABUPATEN POLEWALI MANDAR'),
('7603', '76', 'KABUPATEN MAMASA'),
('7604', '76', 'KABUPATEN MAMUJU'),
('7605', '76', 'KABUPATEN MAMUJU UTARA'),
('7606', '76', 'KABUPATEN MAMUJU TENGAH'),
('8101', '81', 'KABUPATEN MALUKU TENGGARA BARAT'),
('8102', '81', 'KABUPATEN MALUKU TENGGARA'),
('8103', '81', 'KABUPATEN MALUKU TENGAH'),
('8104', '81', 'KABUPATEN BURU'),
('8105', '81', 'KABUPATEN KEPULAUAN ARU'),
('8106', '81', 'KABUPATEN SERAM BAGIAN BARAT'),
('8107', '81', 'KABUPATEN SERAM BAGIAN TIMUR'),
('8108', '81', 'KABUPATEN MALUKU BARAT DAYA'),
('8109', '81', 'KABUPATEN BURU SELATAN'),
('8171', '81', 'KOTA AMBON'),
('8172', '81', 'KOTA TUAL'),
('8201', '82', 'KABUPATEN HALMAHERA BARAT'),
('8202', '82', 'KABUPATEN HALMAHERA TENGAH'),
('8203', '82', 'KABUPATEN KEPULAUAN SULA'),
('8204', '82', 'KABUPATEN HALMAHERA SELATAN'),
('8205', '82', 'KABUPATEN HALMAHERA UTARA'),
('8206', '82', 'KABUPATEN HALMAHERA TIMUR'),
('8207', '82', 'KABUPATEN PULAU MOROTAI'),
('8208', '82', 'KABUPATEN PULAU TALIABU'),
('8271', '82', 'KOTA TERNATE'),
('8272', '82', 'KOTA TIDORE KEPULAUAN'),
('9101', '91', 'KABUPATEN FAKFAK'),
('9102', '91', 'KABUPATEN KAIMANA'),
('9103', '91', 'KABUPATEN TELUK WONDAMA'),
('9104', '91', 'KABUPATEN TELUK BINTUNI'),
('9105', '91', 'KABUPATEN MANOKWARI'),
('9106', '91', 'KABUPATEN SORONG SELATAN'),
('9107', '91', 'KABUPATEN SORONG'),
('9108', '91', 'KABUPATEN RAJA AMPAT'),
('9109', '91', 'KABUPATEN TAMBRAUW'),
('9110', '91', 'KABUPATEN MAYBRAT'),
('9111', '91', 'KABUPATEN MANOKWARI SELATAN'),
('9112', '91', 'KABUPATEN PEGUNUNGAN ARFAK'),
('9171', '91', 'KOTA SORONG'),
('9401', '94', 'KABUPATEN MERAUKE'),
('9402', '94', 'KABUPATEN JAYAWIJAYA'),
('9403', '94', 'KABUPATEN JAYAPURA'),
('9404', '94', 'KABUPATEN NABIRE'),
('9408', '94', 'KABUPATEN KEPULAUAN YAPEN'),
('9409', '94', 'KABUPATEN BIAK NUMFOR'),
('9410', '94', 'KABUPATEN PANIAI'),
('9411', '94', 'KABUPATEN PUNCAK JAYA'),
('9412', '94', 'KABUPATEN MIMIKA'),
('9413', '94', 'KABUPATEN BOVEN DIGOEL'),
('9414', '94', 'KABUPATEN MAPPI'),
('9415', '94', 'KABUPATEN ASMAT'),
('9416', '94', 'KABUPATEN YAHUKIMO'),
('9417', '94', 'KABUPATEN PEGUNUNGAN BINTANG'),
('9418', '94', 'KABUPATEN TOLIKARA'),
('9419', '94', 'KABUPATEN SARMI'),
('9420', '94', 'KABUPATEN KEEROM'),
('9426', '94', 'KABUPATEN WAROPEN'),
('9427', '94', 'KABUPATEN SUPIORI'),
('9428', '94', 'KABUPATEN MAMBERAMO RAYA'),
('9429', '94', 'KABUPATEN NDUGA'),
('9430', '94', 'KABUPATEN LANNY JAYA'),
('9431', '94', 'KABUPATEN MAMBERAMO TENGAH'),
('9432', '94', 'KABUPATEN YALIMO'),
('9433', '94', 'KABUPATEN PUNCAK'),
('9434', '94', 'KABUPATEN DOGIYAI'),
('9435', '94', 'KABUPATEN INTAN JAYA'),
('9436', '94', 'KABUPATEN DEIYAI'),
('9471', '94', 'KOTA JAYAPURA'),
('kotakab_id', 'propinsi_id', 'name');

-- --------------------------------------------------------

--
-- Struktur dari tabel `provinsi`
--

CREATE TABLE `provinsi` (
  `id_provinsi` varchar(11) NOT NULL,
  `name` varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `provinsi`
--

INSERT INTO `provinsi` (`id_provinsi`, `name`) VALUES
('11', 'ACEH'),
('12', 'SUMATERA UTARA'),
('13', 'SUMATERA BARAT'),
('14', 'RIAU'),
('15', 'JAMBI'),
('16', 'SUMATERA SELATAN'),
('17', 'BENGKULU'),
('18', 'LAMPUNG'),
('19', 'KEPULAUAN BANGKA BELITUNG'),
('21', 'KEPULAUAN RIAU'),
('31', 'DKI JAKARTA'),
('32', 'JAWA BARAT'),
('33', 'JAWA TENGAH'),
('34', 'DI YOGYAKARTA'),
('35', 'JAWA TIMUR'),
('36', 'BANTEN'),
('51', 'BALI'),
('52', 'NUSA TENGGARA BARAT'),
('53', 'NUSA TENGGARA TIMUR'),
('61', 'KALIMANTAN BARAT'),
('62', 'KALIMANTAN TENGAH'),
('63', 'KALIMANTAN SELATAN'),
('64', 'KALIMANTAN TIMUR'),
('65', 'KALIMANTAN UTARA'),
('71', 'SULAWESI UTARA'),
('72', 'SULAWESI TENGAH'),
('73', 'SULAWESI SELATAN'),
('74', 'SULAWESI TENGGARA'),
('75', 'GORONTALO'),
('76', 'SULAWESI BARAT'),
('81', 'MALUKU'),
('82', 'MALUKU UTARA'),
('91', 'PAPUA BARAT'),
('94', 'PAPUA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tentang_kami`
--

CREATE TABLE `tentang_kami` (
  `id_tentang_kami` int(10) NOT NULL,
  `tentang_kami` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tentang_kami`
--

INSERT INTO `tentang_kami` (`id_tentang_kami`, `tentang_kami`) VALUES
(1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam eu metus sit amet odio sodales placerat. Sed varius leo ac leo fermentum, eu cursus nunc maximus. Integer convallis nisi nibh, et ornare neque ullamcorper ac. Nam id congue lec tus, a venenatis massa. Maecenas justo libero,</p>\r\n\r\n<p>vulputate vel nunc id, blandit feugiat sem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque consectetur, purus imperdiet volutpat tincidunt, eros sem mollis quam, ut placerat urna neque at massa. Proin vitae pulvinar justo. Donec vel placerat enim, at ultricies risus.</p>\r\n\r\n<p>asdadasdasdas asda dads asdasdasdas asdas asda</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `fungsi`
--
ALTER TABLE `fungsi`
  ADD PRIMARY KEY (`id_fungsi`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indexes for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `kotakab`
--
ALTER TABLE `kotakab`
  ADD PRIMARY KEY (`id_kotakab`),
  ADD UNIQUE KEY `id_kotakab` (`id_kotakab`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id_provinsi`),
  ADD UNIQUE KEY `id_provinsi` (`id_provinsi`);

--
-- Indexes for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  ADD PRIMARY KEY (`id_tentang_kami`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=75;
--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `fungsi`
--
ALTER TABLE `fungsi`
  MODIFY `id_fungsi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id_gallery` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;
--
-- AUTO_INCREMENT for table `kategori_berita`
--
ALTER TABLE `kategori_berita`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `tentang_kami`
--
ALTER TABLE `tentang_kami`
  MODIFY `id_tentang_kami` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
