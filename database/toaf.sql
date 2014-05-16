-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Inang: 127.0.0.1
-- Waktu pembuatan: 26 Des 2013 pada 10.40
-- Versi Server: 5.5.27
-- Versi PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `toaf`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `addtocart`
--

CREATE TABLE IF NOT EXISTS `addtocart` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `person_id` int(11) NOT NULL,
  `isEnd` enum('y','n') NOT NULL,
  `trans_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data untuk tabel `addtocart`
--

INSERT INTO `addtocart` (`id`, `item_id`, `qty`, `harga`, `person_id`, `isEnd`, `trans_id`) VALUES
(1, 2, 2, 12000, 3, 'y', 1),
(2, 2, 2, 12000, 3, 'y', 2),
(3, 3, 5, 15000, 3, 'y', 2),
(4, 1, 1, 8000, 3, 'y', 2),
(5, 3, 8, 15000, 3, 'y', 3),
(6, 2, 2, 12000, 3, 'y', 3),
(7, 1, 4, 8000, 4, 'y', 4),
(8, 3, 1, 15000, 4, 'y', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `items`
--

CREATE TABLE IF NOT EXISTS `items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nama_items` varchar(100) NOT NULL,
  `stock` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `items`
--

INSERT INTO `items` (`id`, `nama_items`, `stock`, `harga`) VALUES
(1, 'Paket Waba 1 ', 100, 8000),
(2, 'Paket Waba 2', 10, 12000),
(3, 'Paket Waba 3', 100, 15000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE IF NOT EXISTS `transaksi` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `person_id` int(11) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `amount` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `person_id`, `email`, `alamat`, `no_telp`, `amount`, `tanggal`) VALUES
(1, 3, 'icantellyou@lookattome.i.know', 'Jl.Maburudan no.90 Bandung', '087686349856', 36000, '2013-12-26'),
(2, 3, 'icantellyou@lookattome.i.know', 'Jl.Maburudan no.90 Bandung', '087686349856', 95000, '2013-12-26'),
(3, 3, 'icantellyou@lookattome.i.know', 'Jl.Maburudan no.90 Bandung', '087686349856', 144000, '2013-12-26'),
(4, 4, 'suryoksbs@yahoo.com', 'Jl.Kembang Kertas no.85 Malang', '082137487729', 47000, '2013-12-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama_depan` varchar(50) NOT NULL,
  `nama_belakang` varchar(50) NOT NULL,
  `email` varchar(40) NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `level` enum('1','2') NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `nama_depan`, `nama_belakang`, `email`, `alamat`, `no_telp`, `level`) VALUES
(1, 'fahmi_jsource', '222419724b47a74bc92ff13c6eaead29', 'fahmi', 'azain', 'fahmi.j@programmer.net', 'Jl.Manggar no.9 wuluhan, jember', '081252067797', '1'),
(2, 'DK', '222419724b47a74bc92ff13c6eaead29', 'devi', 'kristina', 'devikristina@yahoo.co.id', 'Jl.Bantaran II no 56 Lowokwaru, Malang', '081238763907', '1'),
(3, 'hizen', 'ea1f9cf2f6b933ceb553a694bd431e48', 'hizkia', 'endy', 'icantellyou@lookattome.i.know', 'Jl.Maburudan no.90 Bandung', '087686349856', '2'),
(4, 'suryo_ksbs', '7caeb0ed74a6d3ed7c14629100f6a579', 'Kunsuswandono', 'Suryo Bagussutojo', 'suryoksbs@yahoo.com', 'Jl.Kembang Kertas no.85 Malang', '082137487729', '2');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
