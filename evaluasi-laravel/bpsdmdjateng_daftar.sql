-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 30 Jun 2026 pada 12.25
-- Versi server: 10.3.39-MariaDB-cll-lve
-- Versi PHP: 8.4.22

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
-- Struktur dari tabel `contributor`
--

CREATE TABLE `contributor` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `lokasi` varchar(250) DEFAULT NULL,
  `jenis_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `contributor`
--

INSERT INTO `contributor` (`id_user`, `nama_lengkap`, `alamat`, `lokasi`, `jenis_user`) VALUES
(64, NULL, NULL, 'Kabupaten Semarang', 'KABKOT'),
(65, NULL, NULL, 'Kabupaten Kendal', 'KABKOT'),
(66, NULL, NULL, 'Kabupaten Demak', 'KABKOT'),
(67, NULL, NULL, 'Kabupaten Grobogan', 'KABKOT'),
(68, NULL, NULL, 'Kabupaten Pekalongan', 'KABKOT'),
(69, NULL, NULL, 'Kabupaten Batang', 'KABKOT'),
(70, NULL, NULL, 'Kabupaten Tegal', 'KABKOT'),
(71, NULL, NULL, 'Kabupaten Pati', 'KABKOT'),
(72, NULL, NULL, 'Kabupaten Kudus', 'KABKOT'),
(73, NULL, NULL, 'Kabupaten Pemalang', 'KABKOT'),
(74, NULL, NULL, 'Kabupaten Jepara', 'KABKOT'),
(75, NULL, NULL, 'Kabupaten Rembang', 'KABKOT'),
(76, NULL, NULL, 'Kabupaten Blora', 'KABKOT'),
(77, NULL, NULL, 'Kabupaten Banyumas', 'KABKOT'),
(78, NULL, NULL, 'Kabupaten Cilacap', 'KABKOT'),
(79, NULL, NULL, 'Kabupaten Purbalingga', 'KABKOT'),
(80, NULL, NULL, 'Kabupaten Banjarnegara', 'KABKOT'),
(81, NULL, NULL, 'Kabupaten Magelang', 'KABKOT'),
(82, NULL, NULL, 'Kabupaten Temanggung', 'KABKOT'),
(83, NULL, NULL, 'Kabupaten Wonosobo', 'KABKOT'),
(84, NULL, NULL, 'Kabupaten Purworejo', 'KABKOT'),
(85, NULL, NULL, 'Kabupaten Kebumen', 'KABKOT'),
(86, NULL, NULL, 'Kabupaten Klaten', 'KABKOT'),
(87, NULL, NULL, 'Kabupaten Boyolali', 'KABKOT'),
(88, NULL, NULL, 'Kabupaten Sragen', 'KABKOT'),
(89, NULL, NULL, 'Kabupaten Sukoharjo', 'KABKOT'),
(90, NULL, NULL, 'Kabupaten Karanganyar', 'KABKOT'),
(91, NULL, NULL, 'Kabupaten Wonogiri', 'KABKOT'),
(92, NULL, NULL, 'Kota Semarang', 'KABKOT'),
(93, NULL, NULL, 'Kota Salatiga', 'KABKOT'),
(94, NULL, NULL, 'Kota Pekalongan', 'KABKOT'),
(95, NULL, NULL, 'Kota Tegal', 'KABKOT'),
(96, NULL, NULL, 'Kota Magelang', 'KABKOT'),
(97, NULL, NULL, 'Kota Surakarta', 'KABKOT'),
(98, NULL, NULL, 'Kabupaten Brebes', 'KABKOT');

-- --------------------------------------------------------

--
-- Struktur dari tabel `contributor_dinas`
--

CREATE TABLE `contributor_dinas` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `instansi` varchar(250) DEFAULT NULL,
  `jenis_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diklat`
--

CREATE TABLE `data_diklat` (
  `id_diklat` int(11) NOT NULL,
  `jns_diklat` enum('diknis','dikfung','dikpim','pkn','pka','pkp','prajab','skpm','sertifikasi/uji kompetensi','workshop','pppk','mooc') DEFAULT NULL,
  `nama_diklat` varchar(255) DEFAULT NULL,
  `diklat_shortname` text DEFAULT NULL,
  `kuota` int(11) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `jumlah_hari` int(6) DEFAULT NULL,
  `tahun_anggaran` varchar(255) DEFAULT NULL,
  `jumlah_anggaran` varchar(11) DEFAULT NULL,
  `pembiayaan` enum('APBD Provinsi Jawa Tengah','Pola Kemitraan','BIP') DEFAULT NULL,
  `asrama` varchar(256) DEFAULT NULL,
  `keterangan` varchar(225) DEFAULT '',
  `tgl_buka_daftar` date DEFAULT NULL,
  `tgl_tutup_daftar` date DEFAULT NULL,
  `tgl_sertifikat` date NOT NULL,
  `nama_kabadan` varchar(225) DEFAULT NULL,
  `nip_kabadan` varchar(225) DEFAULT NULL,
  `ttd_kabadan` varchar(64) DEFAULT NULL,
  `jabatan_pejabat_kedua` varchar(255) DEFAULT NULL,
  `nama_pejabat_kedua` varchar(64) DEFAULT NULL,
  `nip_pejabat_kedua` varchar(32) DEFAULT NULL,
  `ttd_pejabat_kedua` varchar(64) DEFAULT NULL,
  `paragraf_pembuka` text DEFAULT NULL,
  `paragraf_penutup` text DEFAULT NULL,
  `jam_pelajaran` text NOT NULL,
  `surat_edaran_diklat` varchar(255) DEFAULT NULL,
  `ket_nilai` int(1) DEFAULT 0,
  `hasil_pelatihan` varchar(128) DEFAULT NULL,
  `tampil` int(1) NOT NULL DEFAULT 1,
  `link_eval_pasca` text DEFAULT NULL COMMENT 'Link evaluasi pasca pelatihan, jika memakai sistem lain untuk instrumen evaluasi pasca (misalnya google form).',
  `token` varchar(225) DEFAULT NULL,
  `materi` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_peserta`
--

CREATE TABLE `data_peserta` (
  `id_peserta` bigint(20) NOT NULL,
  `username` varchar(225) DEFAULT NULL,
  `status_pns` int(11) NOT NULL DEFAULT 0,
  `NIP` varchar(100) NOT NULL DEFAULT '0',
  `nik` varchar(30) DEFAULT NULL,
  `id_diklat` int(11) NOT NULL DEFAULT 0,
  `nama` varchar(255) NOT NULL,
  `npwp` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `tmp_lahir` varchar(255) DEFAULT NULL,
  `tgl_lahir` date DEFAULT NULL,
  `jk` varchar(200) DEFAULT NULL,
  `agama` enum('Islam','Katholik','Kristen','Hindu','Buddha','Konghucu','Kepercayaan lain','Tidak tahu') DEFAULT NULL,
  `gol` varchar(255) DEFAULT NULL,
  `alamat_kantor` varchar(255) DEFAULT NULL,
  `telp_kantor` varchar(255) DEFAULT NULL,
  `fax_kantor` varchar(255) DEFAULT NULL,
  `email_kantor` varchar(255) DEFAULT NULL,
  `web_kantor` varchar(255) DEFAULT NULL,
  `pangkat` varchar(255) DEFAULT NULL,
  `jabatan` varchar(255) NOT NULL,
  `instansi` varchar(255) NOT NULL,
  `instansi_pengirim` varchar(255) NOT NULL,
  `lokasi` varchar(255) NOT NULL DEFAULT '',
  `pendidikan` enum('SD','SMP','SMA','D1/D2','D3','D4/S1','S2','S3') DEFAULT NULL,
  `jurusan` varchar(255) DEFAULT NULL,
  `email_pribadi` varchar(255) DEFAULT NULL,
  `hp` varchar(50) DEFAULT NULL,
  `riwayat_sakit` varchar(255) DEFAULT NULL,
  `surat_tugas` varchar(255) DEFAULT NULL,
  `foto` varchar(225) DEFAULT NULL,
  `kelompok` varchar(200) DEFAULT NULL,
  `asrama` varchar(200) DEFAULT NULL,
  `kamar_inap` varchar(255) DEFAULT NULL,
  `nama_keluarga_dekat` varchar(255) DEFAULT NULL,
  `alamat_keluarga_dekat` varchar(255) DEFAULT NULL,
  `telp_keluarga_dekat` varchar(50) DEFAULT NULL,
  `nama_atasan_langsung` varchar(64) DEFAULT NULL,
  `nip_atasan_langsung` varchar(24) DEFAULT NULL,
  `jabatan_atasan_langsung` varchar(255) DEFAULT NULL,
  `instansi_atasan_langsung` varchar(255) DEFAULT NULL,
  `hp_atasan_langsung` varchar(50) DEFAULT NULL,
  `email_atasan_langsung` varchar(128) DEFAULT NULL,
  `nilai` decimal(5,2) DEFAULT NULL,
  `no_sertifikat` varchar(255) DEFAULT NULL,
  `validasi` int(1) NOT NULL DEFAULT 0,
  `non_ujian` int(1) NOT NULL DEFAULT 1,
  `ket` text DEFAULT NULL,
  `token` varchar(18) DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `eval_pasca` tinyint(4) DEFAULT NULL COMMENT 'Sudah melakukan evaluasi pasca atau belum.'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inf_diklat`
--

CREATE TABLE `inf_diklat` (
  `id` int(11) NOT NULL,
  `jenis_diklat` varchar(150) NOT NULL DEFAULT '' COMMENT 'jika jenis diklat struktural ambil nama diklat a_dikstru',
  `kategori` tinyint(1) NOT NULL DEFAULT 0 COMMENT '1: Klasikal, 2: Non Kalsikal, 3: Blended Learning.. berelasi dengan pilihan Metode Diklat di SIASN Jateng',
  `user_id` int(11) NOT NULL DEFAULT 0,
  `role_id` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `inf_lokasi`
--

CREATE TABLE `inf_lokasi` (
  `lokasi_ID` int(11) NOT NULL,
  `lokasi_kode` varchar(50) NOT NULL DEFAULT '',
  `lokasi_nama` varchar(100) NOT NULL DEFAULT '',
  `lokasi_propinsi` int(2) NOT NULL,
  `lokasi_kabupatenkota` int(2) UNSIGNED ZEROFILL DEFAULT NULL,
  `lokasi_kecamatan` int(2) UNSIGNED ZEROFILL NOT NULL,
  `lokasi_kelurahan` int(4) UNSIGNED ZEROFILL NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE `instansi` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `instansi` varchar(250) DEFAULT NULL,
  `jenis_user` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci ROW_FORMAT=COMPACT;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penyelenggara`
--

CREATE TABLE `penyelenggara` (
  `id_user` int(11) NOT NULL,
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `jns_diklat` enum('diknis','dikfung','dikpim','prajab','skpm') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `superadmin`
--

CREATE TABLE `superadmin` (
  `id_user` varchar(4) NOT NULL DEFAULT '',
  `nama_lengkap` varchar(255) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

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
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contributor`
--
ALTER TABLE `contributor`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `contributor_dinas`
--
ALTER TABLE `contributor_dinas`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `data_diklat`
--
ALTER TABLE `data_diklat`
  ADD PRIMARY KEY (`id_diklat`);

--
-- Indeks untuk tabel `data_peserta`
--
ALTER TABLE `data_peserta`
  ADD PRIMARY KEY (`id_peserta`) USING BTREE;

--
-- Indeks untuk tabel `inf_diklat`
--
ALTER TABLE `inf_diklat`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `inf_lokasi`
--
ALTER TABLE `inf_lokasi`
  ADD PRIMARY KEY (`lokasi_ID`),
  ADD KEY `lokasi_kode` (`lokasi_kode`),
  ADD KEY `lokasi_propinsi` (`lokasi_propinsi`),
  ADD KEY `lokasi_kabupatenkota` (`lokasi_kabupatenkota`),
  ADD KEY `lokasi_kecamatan` (`lokasi_kecamatan`),
  ADD KEY `lokasi_kelurahan` (`lokasi_kelurahan`);

--
-- Indeks untuk tabel `instansi`
--
ALTER TABLE `instansi`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id_user`);

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
-- AUTO_INCREMENT untuk tabel `contributor`
--
ALTER TABLE `contributor`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=703;

--
-- AUTO_INCREMENT untuk tabel `contributor_dinas`
--
ALTER TABLE `contributor_dinas`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_diklat`
--
ALTER TABLE `data_diklat`
  MODIFY `id_diklat` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `data_peserta`
--
ALTER TABLE `data_peserta`
  MODIFY `id_peserta` bigint(20) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inf_diklat`
--
ALTER TABLE `inf_diklat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `inf_lokasi`
--
ALTER TABLE `inf_lokasi`
  MODIFY `lokasi_ID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `instansi`
--
ALTER TABLE `instansi`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penyelenggara`
--
ALTER TABLE `penyelenggara`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
