-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 12, 2020 at 11:00 PM
-- Server version: 10.2.33-MariaDB-cll-lve
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_perpustakaan`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `status_anggota` enum('Aktif','Non Aktif','','') NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `nim` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `telepon` varchar(50) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`id_anggota`, `id_user`, `status_anggota`, `nama_anggota`, `username`, `password`, `nim`, `email`, `telepon`, `alamat`, `tanggal`) VALUES
(2, 3, 'Aktif', 'Rendy Praditia', '', '', 1804051, 'rendy@yahoo.com', '085310979350', 'Langsa', '2020-07-18 13:24:38'),
(3, 3, 'Aktif', 'Uwais Thaha Alqorni', '', '', 2004551, 'uwais@gmail.com', '082296209846', 'Besitang', '2020-07-18 13:19:58'),
(4, 3, 'Aktif', 'Marsya Sandira', '', '', 1704008, 'marsya.s@yahoo.com', '083890903156', 'Stabat', '2020-07-18 13:19:43'),
(5, 3, 'Aktif', 'Manda', '', '', 1604113, 'mandasari@yahoo.co.id', '085280809848', 'Medan', '2020-07-18 13:16:16'),
(6, 3, 'Aktif', 'Dinda Aulia Nadra', '', '', 1604094, 'dindaaulianadra17@gmail.com', '083890903156', 'Pangkalan Susu', '2020-07-18 13:19:08'),
(11, 3, 'Aktif', 'Aida', '', '', 1604124, 'alalala@gmail.com', '0831453274161', 'Karang Rejo', '2020-08-11 17:00:00'),
(12, 3, 'Aktif', 'Kaila Manis', 'kailala', '7c222fb2927d828af22f592134e8932480637c0d', 1604900, 'khaila@yahoo.co.id', '082298984208', 'Medan', '2020-08-16 10:26:50'),
(13, 3, 'Aktif', 'lazada', 'lazada', '7c222fb2927d828af22f592134e8932480637c0d', 1604678, 'lazada@yahoo.co.id', '083167679009', 'Lazada JKT', '2020-08-14 17:16:16'),
(14, 3, 'Aktif', 'Jago', 'jagonnya', '7c222fb2927d828af22f592134e8932480637c0d', 18049009, 'jagoan@ymail.com', '082290908998', 'Tanjung Pura', '2020-08-15 17:51:26'),
(15, 3, 'Aktif', 'Jamaika', 'jamaika', '7c222fb2927d828af22f592134e8932480637c0d', 1704516, 'jamaika@gmail.com', '085345778008', 'Medan', '2020-09-05 08:41:09'),
(16, 3, 'Aktif', 'Sayaid', 'sayida', '7c222fb2927d828af22f592134e8932480637c0d', 1604313, 'sayida@yahoo.com', '082277090011', 'Langsa', '2020-08-15 17:52:53'),
(17, 3, 'Aktif', 'sayida', 'sayida', '7c222fb2927d828af22f592134e8932480637c0d', 1604551, 'sayida@yahoo.com', '0898900987', 'Medan', '2020-08-15 17:52:59'),
(20, 3, 'Aktif', 'Gemoy', 'gemoyin', '7c222fb2927d828af22f592134e8932480637c0d', 1604125, 'gemoy@yahoo.com', '082145546909', 'Kampung Lama', '2020-08-23 14:42:56'),
(21, 3, 'Non Aktif', 'Farhan', 'farhan', '7c222fb2927d828af22f592134e8932480637c0d', 1609091, 'farhan123@gmail.com', '082270078051', 'Kuala Madu', '2020-08-22 17:00:00'),
(22, 3, 'Aktif', 'Dania', 'dania', '7c222fb2927d828af22f592134e8932480637c0d', 1604155, 'daniania@gmail.com', '082213314554', 'Stabat', '2020-08-24 06:16:18'),
(23, 3, 'Non Aktif', 'Aisyah', 'aisyah', '7c222fb2927d828af22f592134e8932480637c0d', 1604889, 'aisyah@yahoo.com', '083199089090', 'Gebang', '2020-09-05 08:18:06'),
(28, 3, 'Aktif', 'Lala', 'lala', '7c222fb2927d828af22f592134e8932480637c0d', 1704556, 'lala@gmail.com', '082298278369', 'Besitang', '2020-09-04 17:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `bahasa`
--

CREATE TABLE `bahasa` (
  `id_bahasa` int(11) NOT NULL,
  `kode_bahasa` varchar(3) NOT NULL,
  `nama_bahasa` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bahasa`
--

INSERT INTO `bahasa` (`id_bahasa`, `kode_bahasa`, `nama_bahasa`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'ID', 'Bahasa Indonesia', 'Indonesia - Melayu', 1, '2020-07-06 15:57:16'),
(3, 'ENG', 'Bahasa Inggris', 'ENG - UK', 3, '2020-07-07 06:12:49'),
(4, 'KOR', 'Bahasa Korea', 'Korea - Busan', 2, '2020-07-07 06:13:25'),
(5, 'CHN', 'Bahasa Mandarin', 'China Mandarin', 4, '2020-07-16 19:25:58');

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `status_berita` enum('Publish','Draft','','') NOT NULL,
  `jenis_berita` enum('Berita','Slider','','') NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `berita`
--

INSERT INTO `berita` (`id_berita`, `id_user`, `slug_berita`, `judul_berita`, `isi`, `gambar`, `status_berita`, `jenis_berita`, `tanggal`) VALUES
(9, 1, 'kamu-harus-tahu-jenis-jaringan-ini', 'Kamu Harus Tahu Jenis Jaringan Ini', '<p>Jenis-jenis jaringan komputer ini dibagi menjadi beberapa kategori, yakni jenis jarkom berdasarkan fungsinya, topologi yang digunakan, jangkauan area, media transmisi, serta distribusi data, jadi sangat lengkap sekali penjelasannya, agar kamu semakin faham dan menjadi IT Expert</p>\r\n<p>Dalam membangun jaringan komputer, kita harus mengetahui dulu kebutuhan area cakupannya, apakah jaringan tersebut digunakan untuk jangkauan yang relatif luas, atau hanya mencakup area terdekat saja. Berikut adalah jenis jarkom berdasarkan area jangkauannya :<br /><br /><strong>1. Personal Area Network (PAN)<br /></strong><br />Personal Area Network merupakan jaringan komputer yang paling sederhana, yang mana jaringan komputer ini hanya menghubungkan perangkat komputer pribadi, seperti komputer dengan perangkat-perangkat lain seperti komputer, handphone, speaker, headset, dan perangkat lain, baik melalui kabel, atau melalui media transmisi sinyal seperti, inframerah, bluetooth, bahkan wireles.<br /><br /><br /><strong>2. Local Area Network (LAN)<br /><br /></strong>Merupakan jenis jaringan yang cakupannya hanya sebatas area lokal saja, sehingga jangkauannya sangat terbatas. Biasanya jaringan komputer berbasis LAN hanya digunakan untuk koneksi di suatu ruangan, gedung, rumah dan warung internet (warnet). Dalam penggunaanya, biasanya jaringan LAN menggunakan teknologi ethernet, menggunakan kabel UTP &amp; konektor Rj-45 untuk menyambungkannya, selain itu juga bisa menggunakan teknologi nirkabel seperti Wifi.<br /><br />Agar bisa tersambung, semua komputer dalam jaringan tersebut harus dikonfigurasi alamat Ip /&nbsp;<em>Ip address&nbsp;</em>sesuai dengan aturan yang berlaku, jika sudah dikonfig, maka komputer bisa melakukan sharing file, atau bisa berkomunikasi antar komputer.&nbsp;Jika ingin tersambung ke internet, biasanya jaringan local area network sering menggunakan jasa&nbsp;<em>internet service provider&nbsp;</em>(ISP) atau perangkat seluler untuk mendapatkan akses internet. Dengan menggunakan jaringan Local area network, selain mendapatkan fasilitas internet, juga bisa digunakan untuk sharing file, sharing hak akses penyimpanan, dan sharing perangkat peripheral seperti printer, scanner, atau scan barcode.<br /><br /><br /><strong>3. Metropolitan Area Network&nbsp; (MAN)</strong><br /><br />Merupakan jenis jarkom yang area cakupannya lebih luas daripada LAN, area jangkauannya mampu menyambungkan komputer dari berbagai wilayah. Mekanismenya jaringan MAN ini menggabungkan beberapa jaringan local menjadi saling terhubung satu sama lain.<br /><br />Metropolitan Area Network mampu menghubungkan jaringan local dari berbagai lokasi seperti kampus, perkantoran, pemerintahan, menjadi saling terhubung dan bisa berkomunikasi.<br /><br />Jangkauan jaringa MAN ini antara 10 sampai 50 Km, sehingga bisa dikatakan jaringan antar wilayah di suatu kota. Biasanya untuk menghubungkan jaringan tersebut menggunakan antena jarak jauh seperti antena grid, antena omni, atau router. Sehingga jenis tranmisi pada jarkom ini berupa jaringan nirkabel / tanpa kabel.<br /><br /><br /><strong>4. Wide Area Network ( WAN)<br /><br /></strong>Wide Area Network merupakan jenis jaringan komputer yang memiliki cakupan yang sangat luas. Jenis jaringan ini mampu menyambungkan berbagai komputer antar kota, provinsi, negara bahkan benua.<br /><br />Jenis jaringan ini biasanya digunakan untuk perusahaan-perusahaan besar yang memiliki cabang di suatu wilayah, instansi pemerintahan, bahkan penyedia internet service provider untuk menghubungkan koneksi ke pelanggan yang ada di suatu wilayah.</p>\r\n<div>&nbsp;</div>\r\n<p>Sumber :&nbsp;<a href=\"arteknomedia.blogspot.com\">Arteknomedia</a></p>', '69332874it.jpg', 'Publish', 'Slider', '2020-08-12 05:42:59'),
(10, 1, 'bekal-bagi-fresh-graduate-sebelum-melamar-kerja', 'Bekal Bagi Fresh Graduate Sebelum Melamar Kerja', '<p><strong>1. Buat CV dan surat lamaran yang professional</strong></p>\r\n<p>Langkah pertama adalah membuat Curriculum Vitae atau CV dan surat lamaran. CV dan lamaran merupakan profil pencari kerja yang berisi informasi diri, pendidikan, pengalaman, dan keterangan terkait lainnya. Buatlah CV dan surat lamaran yang kreatif, serta masukkan informasi yang memang penting saja.</p>\r\n<p><strong>2. Mengikuti magang</strong></p>\r\n<p>Bagian personalia perusahaan pasti akan melihat calon karyawan yang sudah memiliki pengalaman. Namun bagi seorang fresh graduate, pengalaman tersebut hanya sedikit, bahkan ada yang belum punya. Sebab itu, cobalah mengikuti magang dari perusahaan yang membuka program tersebut. Magang dapat menambah pengalaman, serta mengetahui bagaimana kondisi di dunia kerja.</p>\r\n<p><strong>3. Bekerja paruh waktu</strong></p>\r\n<p>Freelance bisa menjadi salah satu solusi untuk fresh graduate yang sudah ingin bekerja dan membutuhkan uang, tetapi masih belum mendapatkan pekerjaan di perusahaan atau tempat kerja yang diinginkan.</p>\r\n<p><strong>4. Mengikuti kursus</strong></p>\r\n<p>Selagi menunggu lamaran diterima, ikutilah berbagai kursus sesuai bidang yang digeluti untuk menambah keterampilan dan nilai jual kepada perusahaan tempat melamar.</p>\r\n<p><strong>5. Melanjutkan pendidikan</strong></p>\r\n<p>Jumlah lulusan Sarjana S1 kini sangat banyak. Akibatnya, persaingan untuk mendapatkan pekerjaan pada jenjang S1 terbilang ketat. Dengan melanjutkan pendidikan ke jenjang selanjutnya atau pascasarjana, peluang untuk mendapatkan pekerjaan menjadi lebih besar.</p>\r\n<p>&nbsp;</p>\r\n<p>Sumber :&nbsp;<a href=\"http://www. tempo.co\">www. tempo.co</a></p>', '33206834803.jpg', 'Publish', 'Berita', '2020-07-14 08:34:18'),
(11, 1, 'bahasa-pemograman-terpopuler', 'Bahasa Pemograman Terpopuler', '<p>Memilih bahasa pemrograman atau kerangka kerja yang tepat untuk aplikasi Anda berdampak tidak hanya pada kecepatan dan waktu pengembangan, tetapi juga memengaruhi kemampuan Anda untuk meningkatkan skala di masa depan.</p>\r\n<p>Berikut ini bahasa pemrograman yang harus Anda ketahui sekarang pada tahun 2020 atau untuk beberapa tahun ke depan. Jika Anda adalah salah satu dari orang-orang yang masih berjuang untuk memilih bahasa pemrograman mana yang harus dipelajari di bidang front-end atau back-end.</p>\r\n<h3 id=\"1baf\" class=\"ja jb ar aq bs jc jd je jf jg jh ji jj jk jl jm jn jo jp jq jr ep\"><strong>1. Java &mdash; Spring Framework&nbsp;</strong></h3>\r\n<p>Spring&nbsp;framework adalah salah satu open-source Java frameworks yang paling populer. Ini ditujukan untuk pengembang dan menyediakan framework yang serba fleksibel.&nbsp;Dengan ekstensi, resources, dan dokumentasi yang banyak ditemukan di Internet, itu membuat para developers mudah untuk menemukan dan menambahkan dependencies yang diperlukan untuk berintegrasi dengan berbagai jenis aplikasi 3rd party.</p>\r\n<h3 id=\"deee\" class=\"ja jb ar aq bs jc jd je jf jg jh ji jj jk jl jm jn jo jp jq jr ep\"><strong>2. Golang&nbsp;</strong></h3>\r\n<p id=\"fcaf\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\"><strong class=\"ij ju\">Go</strong>, atau juga dikenal sebagai&nbsp;<strong class=\"ij ju\">Golang</strong>, adalah bahasa pemrograman open-source yang dibuat di&nbsp;<strong class=\"ij ju\">Google&nbsp;</strong>yang membuatnya mudah untuk membangun perangkat lunak yang sederhana, andal, dan efisien. karena Sintaksnya clean dan mudah dipahami oleh pendatang baru. Keindahan dari Go adalah dukungan kelas satu untuk concurrency. Go tidak hanya mendukung multi-threading.</p>\r\n<p id=\"21ec\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\">Jika Anda mencari sesuatu yang ringan, eksekusi cepat dan pengembangan cepat, Go adalah salah satu pilihan terbaik. Ukuran file biner untuk Go jauh lebih kecil (10x) dibandingkan dengan file Spring jar.</p>\r\n<h3 id=\"9496\" class=\"ja jb ar aq bs jc ko je jf kp jh ji kq jk jl kr jn jo ks jq jr ep\"><strong>3. Python &mdash; Django Framework&nbsp;</strong></h3>\r\n<p id=\"0b00\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\"><strong class=\"ij ju\">Django Framework</strong>&nbsp;dianggap sebagai salah satu Framework Python terbaik dalam membangun aplikasi web, dan ini gratis dan juga open-source. Django menawarkan stabilitas, paket, dokumentasi terbaik dan memiliki dukungan komunitas yang baik. Django banyak digunakan dalam membangun CRM, CMS, Booking engines dan semua jenis aplikasi web. Ini mendukung pengembangan cepat API backend dengan kode yang minimal.</p>\r\n<p id=\"d53c\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\">Di antara yang lain, Django sangat bagus untuk solusi analisis data, perhitungan yang rumit, dan machine learning. Ini adalah salah satu pilihan teratas untuk para developers hari ini.</p>\r\n<h3 id=\"d976\" class=\"ja jb ar aq bs jc ko je jf kp jh ji kq jk jl kr jn jo ks jq jr ep\"><strong>4. Node.js &mdash; Express&nbsp;</strong></h3>\r\n<p id=\"cab7\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\"><strong class=\"ij ju\">JavaScript&nbsp;</strong>mungkin salah satu bahasa pemrograman yang paling kuat dan paling cepat berkembang selama beberapa tahun terakhir. Pada masa itu, JavaScript digunakan untuk membangun hanya untuk web, tetapi sekarang jika Anda benar-benar berpengalaman dalam JavaScript, Anda sebenarnya dapat mengembangkan aplikasi web, back-end dengan integrasi basis data, aplikasi desktop, dan bahkan aplikasi mobile.</p>\r\n<p id=\"abfe\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\">Saat ini, JavaScript digunakan hampir di semua tempat. Karena JavaScript memiliki adopsi yang tinggi dan tidak ada persaingan, kami tidak dapat benar-benar memperkirakannya akan terjadi di mana saja, dalam waktu dekat.</p>\r\n<p id=\"ef21\" class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\">Express dikenal untuk framework web minimalis, cepat, dan dipilih untuk Node.js. Itu dibangun di JavaScript dan memiliki kurva belajar yang relatif kecil. Sebagian besar pengembang saat ini memilih Express karena fleksibilitas, kesederhanaan, dan ekstensibilitas. Belum lagi, Express adalah bagian dari tumpukan MEAN (Software Bundle), kumpulan teknologi JavaScript untuk mengembangkan aplikasi web.</p>\r\n<p class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\">&nbsp;</p>\r\n<p class=\"ih ii ar ij b ik il im in io ip iq ir is it iu iv iw ix iy iz dq ep\" data-selectable-paragraph=\"\">Sumber :&nbsp;<a href=\"medium.com\">medium.com</a></p>', 'screen-code-coding-programming.jpg', 'Publish', 'Slider', '2020-07-14 08:24:55'),
(12, 1, 'perkembangan-robot-di-indonesia', 'Perkembangan Robot di Indonesia', '<p>Kementerian Komunikasi dan Informatika (Kemkominfo) baru saja meresmikan PT. Pusat Robot Indonesia (Puri Robotics), yang rencananya akan menjadi langkah awal mereka dalam meramaikan Revolusi Industri 4.0.</p>\r\n<p>Puri Robotics akan menjadi pusat robot, dan distributor robot layanan atau services robot di Indonesia bagi berbagai bidang usaha maupun rumah tangga yang membutuhkan bantuan pelayanan.</p>\r\n<p>\"Puri Robotic ini khusus untuk robot services. Kami ingin menjadi pusat robot,\" kata Presiden Direktur Puri Robotics, Jully Tjindrawan</p>\r\n<p>Direktur Operasional Puri Robotics Indonesia, Glen Gani Taufik dalam sambutannya mengatakan, perusahaan tidak sekadar memproduksi robot, namun juga membuat konektivitas antara pendidikan dengan industri robot.</p>\r\n<p>\"Kita harus memberikan edukasi mengenai robot service, agar masyarakat nantinya siap secara mental dan psikologis. Adanya teknologi ini bukan sebagai pengganti tenaga kerja,\" katanya</p>\r\n<p>Menuju era revolusi industri 4.0, robot dengan dukungan teknologi Artificial Intelligence (AI) dan Internet of Things (IoT) sudah semakin banyak dimanfaatkan untuk membantu beberapa jenis pekerjaan. PT Pusat Robot Indonesia (Puri Robotics) mulai tahun depan juga akan memasarkan beberapa jenis layanan robot yang memiliki kemampuan layaknya customer service hingga pelayanan toko.</p>\r\n<p>PURI Robotics memulainya dengan menghadirkan Robot Service Artifical Intelligent (AI). Robot-robot berteknologi Jepang dan China itu selanjutnya dialih-teknologikan ke anak bangsa.</p>\r\n<p>Adapun robot yang akan mereka jual di tahun 2019 antara lain:</p>\r\n<p>Robot Snow yang dibangun sebagai robot promosi. Robot ini terlihat seperti karakter kartun dengan dilengkapi perangkat keras yang serius untuk mendukungnya. Robot dibangun secara strategis sebagai robot promosi dengan layar Android 13,3 inci yang menampilkan spektrum kemampuannya. Fitur-fiturnya meliputi pengenalan wajah, periklanan, perekaman video, foto, menari, dan navigasi yang akurat melalui platform SLAM Tech</p>\r\n<p>Ada juga Robot Army Service yang didesain sebagai robot kantor dan pengiriman. Dia dapat membawa barang hingga berat 10 kg di nampannya, dan dilengkapi dengan SLAM Tech, membuat navigasi menjadi mudah. Robot ini bisa dimanfaatkan untuk kantor, restoran, hingga pengaturan promosi.</p>\r\n<p>Selanjutnya ada robot dengan layar sentuh 23,8 inci, namanya Robot AmyPlus. Robot humanoid inovatif ini bisa memandu Anda ke tujuan yang diinginkan tanpa meninggalkan penggunanya. Fitur-fitur termasuk mengubah ucapan pembukaan dan sapaan, logo perusahaan, basis data pengetahuan profesional, SLAM Tech built-in untuk anvigasi yang mudah, dan OS ganda yakni Linux dan Android.</p>\r\n<p>Terakhir, ada dua robot ALICE dan ALICE Pro yang mempu memberikan layanan profesional multifungsi yang akan membantu, memandu, menjamu tamu, menjawab pertanyaan, dan menyediakan navigasi.</p>\r\n<p>ALICE dilengkapi teknologi pengenalan wajah, radar untuk hambatan kemananan tingkat tinggi, fungsi pemrosesan data, dan platform layanan dengan opsi pembayaran serta pencetakan.</p>\r\n<p>Robot-robot tersebut akan dijual dengan harga mulai Rp70 juta sampai Rp200-an juta. Beberapa perusahaan seperti Angkasa Pura dan perbankan sudah menyatakan tertarik untuk membelinya.</p>\r\n<p>Atas inovasinya itu, Menteri Komunikasi dan Informatika, Rudiantara memberi apresiasi kepada Puri Robotics. Pasalnya, mereka tak hanya memikirkan bisnis semata, namun juga didorong rasa peduli untuk bangsa dalam konteks robot.</p>\r\n<p>Kehadiran robot bisa membantu industri robot Indonesia untuk dijadikan pembelajaran, agar ke depannya generasi penerus juga bisa mengembangkan robot.</p>\r\n<p>&nbsp;</p>\r\n<p>Sumber :&nbsp;<a href=\"Viva.co.id\">Viva.co.id</a>,&nbsp;<a href=\"sindonews.com\">sindonews.com</a>,&nbsp;<a href=\"beritasatu.com\">beritasatu.com</a></p>', 'robotik-1024x687.jpg', 'Publish', 'Slider', '2020-07-14 08:31:45');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `id_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jenis` int(11) NOT NULL,
  `id_bahasa` int(11) NOT NULL,
  `judul_buku` varchar(255) NOT NULL,
  `penulis_buku` varchar(255) NOT NULL,
  `subjek_buku` varchar(255) DEFAULT NULL,
  `letak_buku` varchar(50) DEFAULT NULL,
  `kode_buku` varchar(50) DEFAULT NULL,
  `kolasi` int(11) DEFAULT NULL,
  `penerbit` varchar(255) DEFAULT NULL,
  `tahun_terbit` year(4) DEFAULT NULL,
  `nomor_seri` varchar(50) DEFAULT NULL,
  `status_buku` enum('Publish','Not Publish','Missing','') DEFAULT NULL,
  `ringkasan` text DEFAULT NULL,
  `cover_buku` varchar(255) DEFAULT NULL,
  `jumlah_buku` int(11) DEFAULT NULL,
  `tanggal_entri` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`id_buku`, `id_user`, `id_jenis`, `id_bahasa`, `judul_buku`, `penulis_buku`, `subjek_buku`, `letak_buku`, `kode_buku`, `kolasi`, `penerbit`, `tahun_terbit`, `nomor_seri`, `status_buku`, `ringkasan`, `cover_buku`, `jumlah_buku`, `tanggal_entri`, `tanggal`) VALUES
(1, 3, 5, 1, 'Tutorial 5 Hari Menguasai Adobe Flash CS4', 'Maria Agustina S', 'Adobe Flash CS4', '005.365 Mcc w-005.368 Ser', '05', 0, 'Andi', 2010, '-', 'Publish', 'Fitur terbaru pada adobe flash CS4 sangat membantu anda membuat beragam animasi, di antaranya kemudahan pengguna adobe bridge dan version cue, dsb.', '05.jpg', 5, '2020-07-14 12:41:28', '2020-09-12 13:52:04'),
(2, 3, 1, 1, 'Web Hacking Serangan dan Pertahanannya', 'Stuart Mc Clure, Saumil Shah & Sheeraj Shah', 'Web Hacking', '005.365 Mcc w-005.368 Ser', '04', 0, 'Andi', 2013, '-', 'Publish', '-', '04.jpg', 3, '2020-07-14 12:41:45', '2020-09-12 13:06:36'),
(3, 3, 1, 1, 'PHP & MYSQL Langkah Demi Langkah', 'Dr.Eng.R.H. Sianipar', '-', '005.365 Mcc w-005.368 Ser', '03', 0, 'Andi', 2015, '-', 'Publish', 'Buku ini merangkum hal-hal fundamental tentang PHP/MYSQL dengan cara yang efisien,', '03.jpg', 1, '2020-07-14 12:42:04', '2020-09-12 13:01:12'),
(4, 3, 1, 1, 'Membangun Aplikasi Berbasis PHP dan Mysql', 'M.Syafii', 'PHP dan MYSQL', '005.365 Mcc w-005.368 Ser', '02', 0, 'Andi', 2005, '-', 'Publish', 'Didalam buku ini disajikan contoh aplikasi-aplikasi berbasis PHP dan Mysql yang nantinya membantu pembaca mengembangkan aplikasi lain yang tentu berbasis PHP Mysql pula', '021.jpg', 1, '2020-07-14 12:42:31', '2020-09-12 12:57:30'),
(5, 3, 1, 1, 'Membuat Website Interaktif', 'Wahana Komputer', 'Tutorial 5 hari membuat website interaktif dengan macromedia dreamweaver 8', '005.365 Mcc w-005.368 Ser', '01', 0, 'Andi', 2006, '-', 'Publish', 'Menjelaskan dasar-dasar dan objek-objek yang ber-hubungan dengan topik bahasan disertai dengan beberapa contoh aplikasi.', '011.jpg', 9, '2020-09-07 20:15:25', '2020-09-12 12:56:41'),
(6, 3, 1, 1, 'Tool Pemrograman Bahasa C/C ++ di GNU/Linux', 'Tedi Heriyanto & Eko Bono Suprijadi', 'Bahasa C/C ++ di GNU/Linux', '005.368 Tut-005.369 Dea e', '06', 0, 'Andi', 2005, '-', 'Publish', 'Buku ini akan sangat membantu peminat linux dalam mengembangkan program-program baru menggunakan bahasa c', '06.jpg', 10, '2020-09-12 20:33:46', '2020-09-12 13:33:46'),
(7, 3, 1, 1, 'Visual Basic.Net 2005', 'Widodo Budiharto', 'Visual Basic.Net 2005', '005.368 Tut-005.369 Dea e', '07', 0, 'Andi', 2005, '-', 'Publish', 'Sebagai pedamping dari visual basic 2005 digunakan microsoft SQL server 2005 sebagai peranti lunak penyimpanan data.', '07.jpg', 2, '2020-09-12 20:49:35', '2020-09-12 13:49:51'),
(8, 3, 3, 1, '250 Tip & Trik Menguasai Windows 7', 'Happy Chandraleka', 'Windows 7', '005.368 Tut-005.369 Dea e', '08', 0, 'Media Kita', 2010, '-', 'Publish', 'Anda perlu tahu fitur apa saja yang bisa anda gunakan untuk meningkatkan atau mempercepat kinerja anda', '08.jpg', 5, '2020-09-12 20:56:41', '2020-09-12 13:57:33'),
(9, 3, 3, 1, 'Cepat Mahir Kuasai Windows 7+Office 2010', 'Hernita p', 'Windows 7+Office 2010', '005.368 Tut-005.369 Dea e', '09', 0, 'Andi', 2010, '-', 'Publish', 'Buku ini menjelaskan tentang penggunaan windows 7 dan office 2010.', '09.jpg', 2, '2020-09-12 21:01:55', '2020-09-12 14:01:55'),
(10, 3, 1, 1, 'Struktur Data Menggunakan Java', 'L.N. Harnaningnum', 'Struktur Data Java', '005.369 Dys-005.369 Per m', '10', 0, 'Graha Ilmu', 2010, '-', 'Publish', 'Buku ini merupakan kelanjutan dari buku penulis yang pertama yang berjudul algoritma & pemrograman menggunakan java', '10.jpg', 3, '2020-09-12 21:25:54', '2020-09-12 14:25:54'),
(11, 3, 1, 1, 'Paduan Praktis Membuat Mini Games Android Menggunakan Adobe Animate CC', 'Ardy Saputro', 'Mini Games Android Adobe Animate CC', '006.7 Mul-080 Low t', '11', 0, 'Andi', 2018, '-', 'Publish', 'Perkembangan game android lebih menjanjikan dan lebih menguntungkan bagi developer game', '11.jpg', 2, '2020-09-12 21:33:00', '2020-09-12 14:33:00'),
(12, 3, 5, 1, 'Paduan Praktis Adobe Flash CS4 Untuk Pembuatan Animasi Interaktif', 'Hernita P', 'Adobe Flash CS4', '006.7 Mul-080 Low t', '12', 0, 'Andi', 2010, '-', 'Publish', 'Buku ini menjelaskan proses pembuatan animasi yang interaktif dengan menggunakan adobe flash CS4', '12.jpg', 5, '2020-09-12 21:42:46', '2020-09-12 14:44:51');

-- --------------------------------------------------------

--
-- Table structure for table `detail_peminjaman`
--

CREATE TABLE `detail_peminjaman` (
  `id_detail_peminjaman` int(11) NOT NULL,
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `status_kembali` enum('Dipinjam','Sedang dipesan','Sudah dikembalikan','') NOT NULL,
  `tanggal_pinjam` date NOT NULL,
  `tanggal_kembali` date NOT NULL,
  `denda` varchar(10) DEFAULT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_peminjaman`
--

INSERT INTO `detail_peminjaman` (`id_detail_peminjaman`, `id_peminjaman`, `id_buku`, `status_kembali`, `tanggal_pinjam`, `tanggal_kembali`, `denda`, `keterangan`) VALUES
(8, 61, 3, 'Dipinjam', '2020-08-24', '2020-08-31', '', ''),
(9, 61, 2, 'Sudah dikembalikan', '2020-08-24', '2020-08-31', '', ''),
(10, 61, 2, 'Dipinjam', '2020-08-24', '2020-08-31', '', ''),
(11, 61, 4, 'Dipinjam', '2020-08-24', '2020-08-31', '', ''),
(12, 61, 3, 'Dipinjam', '2020-08-24', '2020-08-31', '', ''),
(15, 63, 2, 'Sudah dikembalikan', '2020-08-29', '2020-09-05', '7000', ''),
(16, 63, 2, 'Sedang dipesan', '0000-00-00', '0000-00-00', NULL, ''),
(17, 63, 3, 'Sedang dipesan', '0000-00-00', '0000-00-00', NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `file_buku`
--

CREATE TABLE `file_buku` (
  `id_file_buku` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `judul_file` varchar(255) NOT NULL,
  `nama_file` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis`
--

INSERT INTO `jenis` (`id_jenis`, `kode_jenis`, `nama_jenis`, `keterangan`, `urutan`, `tanggal`) VALUES
(1, 'IT', 'Pemrograman', 'Bahasa Pemrograman', 1, '2020-08-18 05:43:07'),
(2, 'JARKOM', 'Jaringan', 'Jaringan Komputer', 2, '2020-08-18 05:43:35'),
(3, 'OS', 'Sistem Operasi', 'Sistem Operasi', 3, '2020-09-12 13:57:17'),
(5, 'MTD', 'Multimedia', 'Desain Grafis', 4, '2020-09-12 13:51:43');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `deskripsi` varchar(500) DEFAULT NULL,
  `keywords` varchar(500) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `twitter` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `map` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `max_hari_peminjaman` int(11) DEFAULT NULL,
  `max_jumlah_peminjaman` int(11) DEFAULT NULL,
  `denda_perhari` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `id_user`, `namaweb`, `tagline`, `deskripsi`, `keywords`, `email`, `website`, `logo`, `icon`, `facebook`, `twitter`, `instagram`, `map`, `metatext`, `telepon`, `alamat`, `max_hari_peminjaman`, `max_jumlah_peminjaman`, `denda_perhari`, `tanggal_update`) VALUES
(1, 3, 'Institut Teknologi Dan Bisnis Indonesia', 'Perpustakaan Katalog Buku Online', 'Tidak Ada Deskripsi', 'Pendidikan Perpustakaan Kampus', 'itbiperpustakaan@gmail.com', 'itbiperpustakaan.com', 'download.jpg', 'download1.jpg', 'http://facebook.com/itbiperpustakaan', '', '', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3981.51150446848!2d98.50456331400275!3d3.6978878973094678!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30312beeed120e73%3A0x6267208520454582!2sInstitut%20Teknologi%20%26%20Bisnis%20Indonesia%20(ITB%20Indonesia)!5e0!3m2!1sid!2sid!4v1594632349928!5m2!1sid!2sid\" width=\"600\" height=\"450\" frameborder=\"0\" style=\"border:0;\" allowfullscreen=\"\" aria-hidden=\"false\" tabindex=\"0\"></iframe>', '', '082298278366', 'Jl. Binjai - Stabat, Dusun I Desa Tandem Hilir Kec. Hamparan Perak', 7, 5, 1000, '2020-08-14 06:56:04');

-- --------------------------------------------------------

--
-- Table structure for table `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `target` varchar(20) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `link`
--

INSERT INTO `link` (`id_link`, `nama_link`, `url`, `target`, `tanggal`) VALUES
(1, 'Bootstrap HTML CSS JAVASCRIPT', 'http://getbootstrap.com', '_blank', '2020-07-14 04:29:47'),
(3, 'Perkembangan Robot di Indonesia', 'http://localhost/perpustakaan/berita/read/perkembangan-robot-di-indonesia', '_blank', '2020-07-18 12:42:16'),
(4, 'Bahasa Pemograman Terpopuler', 'http://localhost/perpustakaan/berita/read/bahasa-pemograman-terpopuler', '_blank', '2020-07-18 12:41:58'),
(5, 'Kamu Harus Tahu Jenis Jaringan Ini', 'http://localhost/perpustakaan/berita/read/kamu-harus-tahu-jenis-jaringan-ini', '_blank', '2020-07-18 12:41:36'),
(6, 'Bekal Bagi Fresh Graduate Sebelum Melamar Kerja', 'http://localhost/perpustakaan/berita/read/bekal-bagi-fresh-graduate-sebelum-melamar-kerja', '_blank', '2020-07-18 12:40:54');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_peminjaman` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`id_peminjaman`, `id_buku`, `id_anggota`, `id_user`, `tanggal`) VALUES
(1, 0, 3, 1, '2020-08-23 14:17:51'),
(4, 22, 3, 1, '2020-08-23 14:17:51'),
(51, 2, 12, 3, '2020-08-23 14:17:51'),
(52, 4, 12, 3, '2020-08-23 14:17:51'),
(56, 3, 20, 3, '2020-08-23 14:17:51'),
(57, 3, 20, 3, '2020-08-23 14:17:51'),
(58, 4, 20, 3, '2020-08-23 14:17:51'),
(59, 3, 12, 3, '2020-08-23 14:17:51'),
(60, 0, 20, 3, '2020-08-23 14:17:51'),
(61, 0, 22, 3, '2020-08-24 06:19:19'),
(62, 0, 20, 3, '2020-08-26 06:48:54'),
(63, 0, 20, 3, '2020-08-29 04:24:45');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(2, 'Uwais', 'uwaisthahaalqorni13@gmail.com', 'uwais', '7c222fb2927d828af22f592134e8932480637c0d', 'Admin', NULL, '-', '2020-07-16 19:33:19'),
(3, 'Mika Mandasari', 'mikamandasari13@gmail.com', 'mikamanda', '7c222fb2927d828af22f592134e8932480637c0d', 'Admin', NULL, '-', '2020-07-16 19:41:50');

-- --------------------------------------------------------

--
-- Table structure for table `usulan`
--

CREATE TABLE `usulan` (
  `id_usulan` int(11) NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_pengusul` varchar(255) NOT NULL,
  `email_pengusul` varchar(255) NOT NULL,
  `ip_address` varchar(50) NOT NULL,
  `status_usulan` varchar(20) NOT NULL,
  `tanggal_usulan` datetime NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usulan`
--

INSERT INTO `usulan` (`id_usulan`, `judul`, `penulis`, `penerbit`, `keterangan`, `nama_pengusul`, `email_pengusul`, `ip_address`, `status_usulan`, `tanggal_usulan`, `tanggal`) VALUES
(1, 'Sistem Informasi Akuntasi', 'Fridayanti dkk', 'Salemba Empat', 'Tidak Ada Keterangan', 'Mika Mandasari', 'mikamandasari08@gmail.com', '::1', 'Diterima', '2020-07-13 08:03:32', '2020-07-13 07:19:23'),
(2, 'Komik Naruto Pergi Ke Bulan', 'Tanaka Kun', 'Gramedia Pustaka', 'Tidak Ada Keterangan', 'Ismail Aja', 'ismailmail@yahoo.com', '::1', 'Diterima', '2020-07-13 09:24:32', '2020-07-13 07:24:32'),
(3, 'Sistem Informasi ', 'Tata Sutabri', 'Salemba Empat', '-', 'khaila', 'khaila@yahoo.com', '::1', 'Pending', '2020-07-18 11:38:29', '2020-07-18 10:12:14'),
(4, 'Komik Doraemon Mencari Mangsa', 'Mika Mandasari', 'GRAMEDIA BUKU', 'Coba', 'Nia Ramadhani', 'nia@yahoo.com', '::1', 'Baru', '2020-08-24 08:13:15', '2020-08-24 06:13:15');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id_anggota`);

--
-- Indexes for table `bahasa`
--
ALTER TABLE `bahasa`
  ADD PRIMARY KEY (`id_bahasa`),
  ADD UNIQUE KEY `kode_bahasa` (`kode_bahasa`),
  ADD UNIQUE KEY `nama_bahasa` (`nama_bahasa`);

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id_buku`);

--
-- Indexes for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  ADD PRIMARY KEY (`id_detail_peminjaman`);

--
-- Indexes for table `file_buku`
--
ALTER TABLE `file_buku`
  ADD PRIMARY KEY (`id_file_buku`);

--
-- Indexes for table `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `usulan`
--
ALTER TABLE `usulan`
  ADD PRIMARY KEY (`id_usulan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id_anggota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `bahasa`
--
ALTER TABLE `bahasa`
  MODIFY `id_bahasa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `buku`
--
ALTER TABLE `buku`
  MODIFY `id_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `detail_peminjaman`
--
ALTER TABLE `detail_peminjaman`
  MODIFY `id_detail_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `file_buku`
--
ALTER TABLE `file_buku`
  MODIFY `id_file_buku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jenis`
--
ALTER TABLE `jenis`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_peminjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usulan`
--
ALTER TABLE `usulan`
  MODIFY `id_usulan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
