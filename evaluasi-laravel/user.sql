-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 24 Jun 2026 pada 12.03
-- Versi server: 10.3.39-MariaDB-cll-lve
-- Versi PHP: 8.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpsdmdjateng_daftar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(35) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `jenis_user` varchar(20) DEFAULT NULL,
  `level` enum('admin','penyelenggara','contributor','contributordinas','supervisor','umpeg','skrining') DEFAULT NULL,
  `instansi` varchar(250) DEFAULT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `singkat` varchar(225) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `jenis_user`, `level`, `instansi`, `nama_lengkap`, `singkat`, `alamat`) VALUES
(66, '303', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(67, '304', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(68, '305', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(69, '306', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(70, '307', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(71, '309', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(72, '310', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(73, '311', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(74, '312', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(75, '313', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(76, '314', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(77, '315', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(78, '316', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(79, '317', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(80, '318', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(81, '319', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(82, '320', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(83, '321', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(84, '322', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(85, '323', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(86, '324', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(87, '325', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(88, '326', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(89, '327', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(90, '328', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(91, '329', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(92, '351', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(93, '352', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(94, '353', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(95, '354', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(96, '355', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(97, '356', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(98, '308', '123', 'KABKOT', 'contributor', NULL, NULL, NULL, NULL),
(99, 'admin', '11712d2363aec234cec030255d203871', 'admin', 'admin', '', '', '', ''),
(100, 'jtga2', '998c432cf3c3e63c5227d3eb01b32d96', 'SKPD', 'contributordinas', 'Sekretariat Daerah', NULL, 'SEKDA', NULL),
(101, 'jtga3', '0d2de16e072488ce75c31f27ab6f054a', 'SKPD', 'contributordinas', 'Sekretariat Dewan Perwakilan Rakyat Daerah', NULL, 'SETWAN', NULL),
(102, 'jtgb6', '9795e862af22ecb7ebc171e1dc46c068', 'SKPD', 'contributordinas', 'Inspektorat', NULL, 'INSPEKTORAT', NULL),
(103, 'jtgd0', '3e282106317b7c60f40ea785b78a3283', 'SKPD', 'contributordinas', 'Dinas Pendidikan', 'Disdikbud', 'DISDIKBUD', 'Jl. Pemuda No.134, Sekayu, Kec. Semarang Tengah, Kota Semarang, Jawa Tengah'),
(104, 'jtgd1', '1a93e5cb6c9998b2c5e413e8489ada9d', 'SKPD', 'contributordinas', 'Dinas Kesehatan', NULL, 'DINKES', NULL),
(105, 'jtgd2_off', '768591d950863b4148ecdc46b0591d19', 'off', NULL, 'Dinas Pekerjaan Umum Bina Marga dan Cipta Karya', NULL, 'DPUBMCK', NULL),
(106, 'jtgd3', '5b287dfd794c22d165ff1e2c4a0a2a9f', 'SKPD', 'contributordinas', 'Dinas Pekerjaan Umum dan Penataan Ruang', NULL, 'DPUSDATARU', NULL),
(107, 'jtgd4', '011a440e097f73687a695cc6390ec89f', 'SKPD', 'contributordinas', 'Dinas Perumahan Rakyat dan Kawasan Permukiman', NULL, 'DISPERAKIM', NULL),
(108, 'jtgc0', '3965223bd37756ba93c49c547d565720', 'SKPD', 'contributordinas', 'Satuan Polisi Pamong Praja', NULL, 'SATPOLPP', NULL),
(109, 'jtgd5', '003f8e5a78e78e1fb84fc233d4bf882a', 'SKPD', 'contributordinas', 'Dinas Sosial', NULL, 'DINSOS', NULL),
(110, 'jtgd6', '72ed774fa1293e91877eafa099b2461f', 'SKPD', 'contributordinas', 'Dinas Tenaga Kerja dan Transmigrasi', NULL, 'DISNAKERTRANS', NULL),
(111, 'jtge9', '72ae12df678a242fce6be2c7de011b73', 'SKPD', 'contributordinas', 'Dinas Pemberdayaan Perempuan, Perlindungan Anak, Pengendalian Penduduk dan Keluarga Berencana', NULL, 'DP3AP2K', NULL),
(112, 'jtge4', '8d19d6bc4c9c70af4dce1f9121a15da6', 'SKPD', 'contributordinas', 'Dinas Ketahanan Pangan', NULL, 'DISHANPAN', NULL),
(113, 'jtge7', '32bc5075cd60461b5ff4c5b9a52ce19b', 'SKPD', 'contributordinas', 'Dinas Lingkungan Hidup dan Kehutanan', NULL, 'DLHK', NULL),
(114, 'jtge8', '5f1d6da1c71651586735a59e0d3f9d8d', 'SKPD', 'contributordinas', 'Dinas Pemberdayaan Masyarakat, Desa, Kependudukan dan Pencatatan Sipil', NULL, 'DISPERMADES', NULL),
(115, 'jtgd9', 'a0f25e5de2638d818bbd1e1d98b6deb3', 'SKPD', 'contributordinas', 'Dinas Perhubungan', NULL, 'DISHUB', NULL),
(118, 'jtge0', '8a3749f9746551aac6aaaf5b39625c7b', 'SKPD', 'contributordinas', 'Dinas Komunikasi, Informatika dan Digital', 'galih wibowo', 'DISKOMINFO', 'Jl. Menteri Soepeno I Nomor 2 Kota Semarang'),
(119, 'jtge2', '14687b1da40794d9cb8c2be1ac52e8b8', 'SKPD', 'contributordinas', 'Dinas Koperasi, Usaha Kecil dan Menengah', NULL, 'DINKOPUMKM', NULL),
(120, 'jtgf0', '2ff4547deffbc350384f431231793d01', 'SKPD', 'contributordinas', 'Dinas Penanaman Modal dan Pelayanan Terpadu Satu Pintu', NULL, 'DPMPTSP', NULL),
(121, 'jtgd8', 'f07cca5d75de11fb177ceb30be24895f', 'SKPD', 'contributordinas', 'DINAS KEPEMUDAAN DAN OLAHRAGA', NULL, 'DISPORA', NULL),
(122, 'jtgf1', 'af59d647492ae26b47d949bb4926dbbd', 'SKPD', 'contributordinas', 'Dinas Kearsipan dan Perpustakaan', NULL, 'ARPUS', NULL),
(123, 'jtge6', '8fe12875fa6859138c8274bbfd3dba34', 'SKPD', 'contributordinas', 'Dinas Kelautan dan Perikanan', NULL, 'DKP', NULL),
(124, 'jtge3', '9da9bef5df1836b7811112ed34bc888b', 'SKPD', 'contributordinas', 'Dinas Pertanian dan Peternakan', 'Sandy Hapsaridian', 'DISTANBUN', 'Dinas Pertanian dan Peternakan Provinsi Jawa Tengah'),
(125, 'jtge5', 'tutup akun', 'SKPD', 'contributordinas', 'Dinas Peternakan dan Kesehatan Hewan', '08ff3c11e42b7f86cfe4017e86eed618', 'DISNAKKESWAN', NULL),
(126, 'jtgd7', 'fe3f6ae817f3c692fd6ea5ee3753d288', 'SKPD', 'contributordinas', 'Dinas Energi dan Sumber Daya Mineral', NULL, 'ESDM', NULL),
(127, 'jtge1', 'af15c7b80aa20f1e3d63eb199df23773', 'SKPD', 'contributordinas', 'Dinas Perindustrian dan Perdagangan', NULL, 'DISPERINDAG', NULL),
(128, 'jtgb1', '5daf21d5a174841f7368b6172d107462', 'SKPD', 'contributordinas', 'Badan Perencanaan Pembangunan Daerah', 'Kontributor BAPPEDA Prov Jateng', 'BAPPEDA', 'BAPPEDA Prov Jateng'),
(129, 'jtgb4', '8ec39fa4c5968a333806540b882053b5', 'SKPD', 'contributordinas', 'Badan Pengelola Pendapatan Daerah', 'Sustria Agustin Hani Kurniawati, A.Md', 'BAPENDA', 'Jalan Pemuda Nomor 1 Semarang '),
(130, 'jtgb5', '7957093083bb9408f77ffa031e9b230a', 'SKPD', 'contributordinas', 'Badan Pengelola Keuangan dan Aset Daerah', NULL, 'BPKAD', NULL),
(131, 'jtgb2', 'be33c03dd14596fb9eb64c676f25f466', 'SKPD', 'contributordinas', 'Badan Kepegawaian Daerah', NULL, 'BKD', NULL),
(132, 'jtgb3', '09abb6ee25336f489cd331ed1e130633', 'SKPD', 'contributordinas', 'Badan Pengembangan Sumber Daya Manusia Daerah', NULL, 'BPSDMD', NULL),
(133, 'jtg25', 'a672e4bd6a18359eb919cf7f341bdde8', 'SKPD', 'contributordinas', 'Badan Kesatuan Bangsa dan Politik', NULL, 'KESBANGPOL', NULL),
(134, 'jtg13', 'f4b87ee0226ef0b10ec0d78a8b2282ed', 'SKPD', 'contributordinas', 'Badan Penanggulangan Bencana Daerah', NULL, 'BPBD', NULL),
(135, 'jtgc1', 'd9db97934a2aed4287233d2538b5b096', 'SKPD', 'contributordinas', 'Badan Penghubung', NULL, 'PENGHUBUNG', NULL),
(136, 'jtga200110000', 'ac2f4f88b97df3b5227e29f5757f50be', 'SKPD', 'contributordinas', 'Biro Pemerintahan, Otonomi Daerah dan Kerjasama', NULL, 'PEMOTDAKER', NULL),
(137, 'jtga200130000', 'f91fee12c8817cb6998e0705e8d959b1', 'SKPD', 'contributordinas', 'Biro Kesejahteraan Rakyat', NULL, 'KESRA', NULL),
(138, 'jtga200120000', '117ad3fbfde293b3f4839f01433aa9d6', 'SKPD', 'contributordinas', 'Biro Hukum', 'Gunawan Dwiyanto', 'HUKUM', 'Jl. Pahlawan No. 9 Gedung A Lantai 5 Semarang'),
(139, 'jtga200210000', 'db8a3bc7f129eda84f36539ca6f88fef', 'SKPD', 'contributordinas', 'Biro Perekonomian', NULL, 'PEREKONMIAN', NULL),
(141, 'jtga200220000', '43bb3987ecbcd3618dc541cb315aa01b', 'SKPD', 'contributordinas', 'Biro Infrastruktur dan Sumber Daya Alam', '', 'BIROISDA', ''),
(142, 'jtga200340000', '05746435cee1122d0ae80a74aa29f460', 'SKPD', 'contributordinas', 'Biro Administrasi Pembangunan Daerah', NULL, 'BANGDA', NULL),
(143, 'jtga200310000', 'c45de4bf74e21c8c4bc6d6bea26c4a63', 'SKPD', 'contributordinas', 'Biro Organisasi', 'TU Biro Organisasi', 'ORPEG', 'Jalan Pahlawan Nomor 9 Semarang Kode Pos 50243'),
(144, 'jtga200320000', 'f5df3bde70b7b7ab67ce0e00edcb1951', 'SKPD', 'contributordinas', 'Biro Umum', NULL, 'UMUM', NULL),
(145, 'jtg80', '0d5fa8847660b8b955ea0d95970ab5b7', 'SKPD', 'contributordinas', 'RSUD dr. Moewardi', NULL, 'MOEWARDI', NULL),
(146, 'jtg81', '305c55499c5e9b53e2324ca9569f8cd5', 'SKPD', 'contributordinas', 'RSUD Prof. dr. Margono Soekarjo', '', 'MARGONO', NULL),
(147, 'jtg82', 'abe244ecc103ee17d1c20b6333e3c09d', 'SKPD', 'contributordinas', 'RSUD dr. ADHYATMA, MPH', NULL, 'ADHYATMA', NULL),
(148, 'jtg83', '47a332f2042506200e1fa5e069fc2774', 'SKPD', 'contributordinas', 'RSUD Dr. REHATTA', NULL, 'REHATTA', NULL),
(149, 'jtg84', 'f5398100ac2e0478c9ca79cf7459c241', 'SKPD', 'contributordinas', 'RSJD Dr. Amino Gondohutomo', NULL, 'AMINO', NULL),
(150, 'jtg85', 'd8abeccbf10ea635cbcc20a883a6aa30', 'SKPD', 'contributordinas', 'RSJD Dr. ARIF ZAINUDIN', 'JULI MUHAMAD KARTIKO', 'ZAENUDIN', 'PERUM TEKAD MAKMUR II BLOK F1 JOHO RT 02 RW 13 MOJOLABAN'),
(151, 'jtg86', 'c9f5e9636160eaf003c6b5cc2706e8ef', 'SKPD', 'contributordinas', 'RSJD Dr. RM Soedjarwadi', NULL, 'SOEDJAWARDI', NULL),
(152, 'jtgd0101', '7fd256ef89777a7cc826b0f4686891b1', NULL, 'contributordinas', 'Balai Pengembangan Teknologi Informasi Dan Komunikasi (BPTIK) DISDIKBUD', 'Kontributor BPTIK Dikbud', 'BPTIK', 'Jl. Tarupolo Tengah No. 7, Gisikdrono, Semarang Barat, Kota Semarang'),
(791, 'pakgub', '7d0668a80d96d93b227a4d77dfe845a3', 'supervisor', 'supervisor', NULL, NULL, NULL, NULL),
(794, 'dikpim', '0278bcd57b033a76337556ec8ab52be0', NULL, 'penyelenggara', NULL, NULL, NULL, NULL),
(795, 'skpm', 'c457f57f8c468a2afa1419e478987cf7', NULL, 'penyelenggara', NULL, NULL, NULL, NULL),
(796, 'teknis', 'bc056b25f8660ea1e2174dc08a80fd33', NULL, 'penyelenggara', NULL, NULL, NULL, NULL),
(797, 'dikfung', 'b5d98cb8c593c5a4f5ff0733a735b479', NULL, 'penyelenggara', NULL, NULL, NULL, NULL),
(798, 'prajab', 'dc8975bb2a99ca8d28c3407f4e78a04e', NULL, 'penyelenggara', NULL, NULL, NULL, NULL),
(799, 'mooc', 'f41d7ae36f189bb5f545f7586b116563', NULL, 'penyelenggara', NULL, NULL, NULL, NULL),
(801, 'jtgb8', 'fdc9eda2f700714e597c3d82588bc526', 'SKPD', 'contributordinas', 'Badan Riset dan Inovasi Daerah', NULL, 'BRIDA', NULL),
(802, 'jtgd0001', '22bc673885b115f91451eb6a1739f9d4', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah I', 'Cabang Dinas Pendidikan Wilayah I', 'CABDINI', 'Jl. Gatot Subroto, Komplek Perkantoran Tarubudaya, Ungaran 50517'),
(804, 'jtgd0002', '8d3a00fdd8949342c7723ab349233a14', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah II', 'Cabang Dinas Pendidikan Wilayah II', 'CABDINII', 'Jl. Sultan Fatah No. 65 Kel. Bintoro, Kec. Demak, Kab. Demak 59511'),
(805, 'jtgd0003', '56b2c066d63b02b2485cdeda85016159', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah III', 'Cabang Dinas Pendidikan Wilayah III', 'CABDINIII', 'Jl. Panglima Sudirman 3A, Pati 59113'),
(806, 'jtgd0004', '2d96facb5bbf531c114a4ab9b3fda8c1', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah IV', 'Cabang Dinas Pendidikan Wilayah IV', 'CABDINIV', 'Jl. P. Diponegoro No.22 Purwodadi 58114'),
(807, 'jtgd0005', 'b2da6742e29fda7def1e6f0baa46a962', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah V', 'Cabang Dinas Pendidikan Wilayah V', 'CABDINV', 'Jl. Terate No.49, Pulisen, Boyolali 57316'),
(808, 'jtgd0006', 'b7a0ae380cbfecf3adbb554b81c9e46e', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah VI', 'Cabang Dinas Pendidikan Wilayah VI', 'CABDINVI', 'Jl. R.M Said No.9, Kelurahan Tegalgede, Karanganyar'),
(809, 'jtgd0007', '5cfa1bd6a34ab6cd2fdaa60420d258e9', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah VII', 'Cabang Dinas Pendidikan Wilayah VII', 'CABDINVII', 'Jl. Slamet Riyadi No.1, Kel. Kauman, Kec. Pasar Kliwon, Kota Surakarta, Jawa Tengah 57122'),
(810, 'jtgd0008', '8ee11c371300400de13cae240bfa01f6', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah VIII', 'Cabang Dinas Pendidikan Wilayah VIII', 'CABDINVIII', 'Jl. Diponegoro No.1, Kota Magelang 56117'),
(811, 'jtgd0009', '790b6921be8c5815b9f1f8f91e235a23', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah IX', 'Cabang Dinas Pendidikan Wilayah IX', 'CABDINIX', 'Jl. Raya Pucang No.67, Pucang, Bawang, Banjarnegara 53471'),
(812, 'jtgd0010', '3471c1a627e61aaabb60695a592d36ff', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah X', 'Cabang Dinas Pendidikan Wilayah X', 'CABDINX', 'Jl. Gatot Soebroto No.67, Purwokerto 53115'),
(813, 'jtgd0011', '023f2955ed93ee24863aba0e63cef23f', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah XI', 'Cabang Dinas Pendidikan Wilayah XI', 'CABDINXI', 'Jl. Bawal No. 5 Tegalsari, Tegal Barat 52111'),
(814, 'jtgd0012', '87100ed3fc839c1c56d5c0c7ac94f050', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah XII', 'Cabang Dinas Pendidikan Wilayah XII', 'CABDINXII', 'Jl. Jendral Sudirman Timur No. 1 Pemalang'),
(815, 'jtgd0013', '3ead1fb41cc542b1855c3c3d7a9787e8', 'SKPD', 'contributordinas', 'Cabang Dinas Pendidikan Wilayah XIII', 'Cabang Dinas Pendidikan Wilayah XIII', 'CABDINXIII', 'Jl. Soekarno Hatta No. 96 Bugangin Kendal'),
(816, 'jtgd0102', NULL, 'SKPD', 'contributordinas', 'Museum Ranggawarsita', 'Museum Ranggawarsita', NULL, 'Jl. Abdulrahman Saleh No. 1, Kalibanteng Kidul, Kec. Semarang Barat, Kota Semarang 50149'),
(817, 'jtgd0103', NULL, 'SKPD', 'contributordinas', 'Taman Budaya Jawa Tengah', 'Taman Budaya Jawa Tengah', NULL, 'Jl. Ir. Sutami No. 57 Kentingan, Jebres, Kota Surakarta'),
(818, 'umpeg', '11712d2363aec234cec030255d203871', 'umpeg', 'umpeg', 'BPSDMD Prov Jateng', 'Admin Umum & Kepegawaian BPSDMD Prov Jateng', '', 'Jl. Setiabudi No 201a'),
(819, 'jtga200330000', 'fa7e66145a45eb953c83f20bd9c28f86', 'SKPD', 'contributordinas', 'Biro Pengadaan Barang dan Jasa', 'Biro Pengadaan Barang dan Jasa', 'APBJ', NULL),
(820, 'dinkes', '9116efdd57a9cbf7758af8b3548927ac', NULL, 'skrining', NULL, NULL, NULL, NULL),
(821, 'superadmin', 'cddc05e5cf023099228e52eac68ec0f8', NULL, 'admin', 'RSUD', 'Super Admin', 'adm', 'Jl duren no 17'),
(822, 'jtg87', '275f4a015a438a63b95c3474d24eb9f2', 'SKPD', 'contributordinas', 'RSMD Soepardjo Roestam', NULL, 'SOEPARDJOROESTAM', NULL),
(823, 'jtgf4', '9c04b9330d0e435418e6717bbc2c3845', 'SKPD', 'contributordinas', 'Dinas Kebudayaan, Pariwisata dan Ekonomi Kreatif', NULL, 'BUDPAREKRAF', NULL),
(830, 'inspektorat', '7d0668a80d96d93b227a4d77dfe845a3', 'umpeg', 'umpeg', 'BPSDMD Prov Jateng', 'Inspektorat', '', 'Jl. Setiabudi No 201a');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=831;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
