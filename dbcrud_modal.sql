-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Nov 2023 pada 05.15
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbcrud_modal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tmhs`
--

CREATE TABLE `tmhs` (
  `id_mhs` int(11) NOT NULL,
  `nim` varchar(10) NOT NULL,
  `nama` varchar(150) NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `prodi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tmhs`
--

INSERT INTO `tmhs` (`id_mhs`, `nim`, `nama`, `jenis_kelamin`, `alamat`, `prodi`) VALUES
(4, '71.121.923', 'Akmal taufik', 0, 'Umbulsari-Jember', 'D3 - Manajemen Informatik'),
(5, '23.892.224', 'Dimas Andreyawan', 0, 'Sidomekar, Jember', 'S1 - Teknik Informatika'),
(6, '92.349.303', 'Achmad Sandi', 0, 'Sidomekar -  Jember', 'S1 - Sistem Informasi'),
(7, '32.373.487', 'Dinda Agustin', 1, 'Umbulsari-Jember', 'S1 - Sistem Informasi'),
(8, '93.329.783', 'Ambar Mei Lestari', 1, 'Bagorejo-Jember', 'S1 - Sistem Informasi'),
(9, '10.121.021', 'Nabila Septiani', 1, 'Bagorejo-Jember', 'D3 - Manajemen Informatik');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tmhs`
--
ALTER TABLE `tmhs`
  ADD PRIMARY KEY (`id_mhs`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tmhs`
--
ALTER TABLE `tmhs`
  MODIFY `id_mhs` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
