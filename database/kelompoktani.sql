-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 04 Agu 2022 pada 04.55
-- Versi server: 10.1.38-MariaDB
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
-- Database: `kelompoktani`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_ajukan_bantuan`
--

CREATE TABLE `tbl_ajukan_bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `nama_petani` varchar(40) NOT NULL,
  `luas_lahan` varchar(33) NOT NULL,
  `produksi` text NOT NULL,
  `bahan_baku` text NOT NULL,
  `persediaan_alat` text NOT NULL,
  `kondisi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_ajukan_bantuan`
--

INSERT INTO `tbl_ajukan_bantuan` (`id_bantuan`, `nama_petani`, `luas_lahan`, `produksi`, `bahan_baku`, `persediaan_alat`, `kondisi`) VALUES
(2, 'dedi', '12', '10', '33', 'bak', 'sadasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_alat`
--

CREATE TABLE `tbl_alat` (
  `id_alat` int(11) NOT NULL,
  `nama_alat` varchar(40) NOT NULL,
  `status` varchar(40) NOT NULL,
  `keterangan` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `jumlah_unit` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_alat`
--

INSERT INTO `tbl_alat` (`id_alat`, `nama_alat`, `status`, `keterangan`, `id_users`, `jumlah_unit`) VALUES
(2, 'Traktor', 'Cukup Baik', 'Terdapat goresan biasa', 3, 0),
(3, 'asdasd', 'Kondisi Baik', 'sadsadsad', 3, 0),
(4, 'bambu', 'Kondisi Baik', 'sadasdsad', 3, 12),
(5, '2', 'Kondisi Baik', '2', 3, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bahanbaku`
--

CREATE TABLE `tbl_bahanbaku` (
  `id_bahanbaku` int(11) NOT NULL,
  `nama_bahan` varchar(40) NOT NULL,
  `stok` int(11) NOT NULL,
  `kebutuhan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `tanggal` varchar(10) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bahanbaku`
--

INSERT INTO `tbl_bahanbaku` (`id_bahanbaku`, `nama_bahan`, `stok`, `kebutuhan`, `id_users`, `tanggal`, `foto`) VALUES
(3, 'Bibit jagung', 4, 4, 3, '27/06/2022', ''),
(5, 'Bibit Jamu', 2, 4, 3, '27/06/2022', ''),
(7, 'sadsadsad', 1, 1, 3, '28/06/2022', '28062022202234malaria.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_bantuan`
--

CREATE TABLE `tbl_bantuan` (
  `id_bantuan` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `jenis_bantuan` varchar(33) NOT NULL,
  `keterangan` text NOT NULL,
  `tahun` varchar(4) NOT NULL,
  `periode_bantuan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_bantuan`
--

INSERT INTO `tbl_bantuan` (`id_bantuan`, `id_users`, `jenis_bantuan`, `keterangan`, `tahun`, `periode_bantuan`) VALUES
(4, 3, 'Bantuan Dana', 'Bantuan Pembelian Pupuk', '2022', 'Periode I'),
(5, 3, 'Bantuan Bahan Baku', 'dadsadsadasd', '2022', 'Periode I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_hasilproduksi`
--

CREATE TABLE `tbl_hasilproduksi` (
  `id_hasil` int(11) NOT NULL,
  `nama_produksi` varchar(40) NOT NULL,
  `hasil` text NOT NULL,
  `target` text NOT NULL,
  `id_users` int(11) NOT NULL,
  `periode_panen` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_hasilproduksi`
--

INSERT INTO `tbl_hasilproduksi` (`id_hasil`, `nama_produksi`, `hasil`, `target`, `id_users`, `periode_panen`) VALUES
(1, '2022', '30', '77', 3, 'Periode I');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_keuangan`
--

CREATE TABLE `tbl_keuangan` (
  `id_keuangan` int(11) NOT NULL,
  `sumber` varchar(40) NOT NULL,
  `jumlah` varchar(40) NOT NULL,
  `id_users` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_keuangan`
--

INSERT INTO `tbl_keuangan` (`id_keuangan`, `sumber`, `jumlah`, `id_users`) VALUES
(2, 'Penjualan Jagung', '35000', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_pengajuan`
--

CREATE TABLE `tbl_pengajuan` (
  `id_ajuan` int(11) NOT NULL,
  `n_kelompok` varchar(44) NOT NULL,
  `n_petani` varchar(55) NOT NULL,
  `kebutuhan` varchar(30) NOT NULL,
  `detail` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_pengajuan`
--

INSERT INTO `tbl_pengajuan` (`id_ajuan`, `n_kelompok`, `n_petani`, `kebutuhan`, `detail`) VALUES
(1, 'mawar', 'budi', 'bantuan alat', 'asdasdsadsadsad');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id_users` int(11) NOT NULL,
  `nama` varchar(55) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('Admin','Petani') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tbl_users`
--

INSERT INTO `tbl_users` (`id_users`, `nama`, `username`, `password`, `level`) VALUES
(2, 'Taufiq', 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'Admin'),
(3, 'Abdul Hani', 'petani', '21a4c8d9d2dca6dffbb1a313de8238df3e838a2d', 'Petani'),
(6, 'Syaharuddin', 'Syaharuddin', '5a2c4930665ba285e11cfee595912d3d4e38ccef', 'Petani'),
(7, 'Mursalim', 'Mursalim', 'd57af8e316c94f12872ad3c75bb1ac406f41fdb9', 'Petani'),
(8, 'Muh Anas', 'anas', '47a411d3c5e0a8fe7e9bda609c5dc5f162443f97', 'Petani');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tbl_ajukan_bantuan`
--
ALTER TABLE `tbl_ajukan_bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indeks untuk tabel `tbl_alat`
--
ALTER TABLE `tbl_alat`
  ADD PRIMARY KEY (`id_alat`);

--
-- Indeks untuk tabel `tbl_bahanbaku`
--
ALTER TABLE `tbl_bahanbaku`
  ADD PRIMARY KEY (`id_bahanbaku`);

--
-- Indeks untuk tabel `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  ADD PRIMARY KEY (`id_bantuan`);

--
-- Indeks untuk tabel `tbl_hasilproduksi`
--
ALTER TABLE `tbl_hasilproduksi`
  ADD PRIMARY KEY (`id_hasil`);

--
-- Indeks untuk tabel `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  ADD PRIMARY KEY (`id_keuangan`);

--
-- Indeks untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  ADD PRIMARY KEY (`id_ajuan`);

--
-- Indeks untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tbl_ajukan_bantuan`
--
ALTER TABLE `tbl_ajukan_bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_alat`
--
ALTER TABLE `tbl_alat`
  MODIFY `id_alat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_bahanbaku`
--
ALTER TABLE `tbl_bahanbaku`
  MODIFY `id_bahanbaku` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tbl_bantuan`
--
ALTER TABLE `tbl_bantuan`
  MODIFY `id_bantuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tbl_hasilproduksi`
--
ALTER TABLE `tbl_hasilproduksi`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_keuangan`
--
ALTER TABLE `tbl_keuangan`
  MODIFY `id_keuangan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tbl_pengajuan`
--
ALTER TABLE `tbl_pengajuan`
  MODIFY `id_ajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
