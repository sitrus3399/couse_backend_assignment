-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 25 Okt 2020 pada 08.25
-- Versi server: 10.4.14-MariaDB
-- Versi PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `leaderboard_db`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `class_tbl`
--

CREATE TABLE `class_tbl` (
  `class_id` int(255) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `class_tbl`
--

INSERT INTO `class_tbl` (`class_id`, `class_name`, `status`) VALUES
(1, 'Warrior', 1),
(2, 'Wizard', 1),
(3, 'Archer', 1),
(4, 'Thief', 1),
(5, 'Bomber', 1),
(6, ' Beban', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `game_tbl`
--

CREATE TABLE `game_tbl` (
  `game_id` int(255) NOT NULL,
  `nama_game` varchar(50) NOT NULL,
  `level` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `game_tbl`
--

INSERT INTO `game_tbl` (`game_id`, `nama_game`, `level`, `status`) VALUES
(1, 'Battle Royale', 1, 1),
(2, 'Death Match', 1, 1),
(3, 'Mini Game', 1, 1),
(4, 'Battle Royale', 2, 1),
(5, 'Death Match', 2, 1),
(6, 'Mini Game', 2, 1),
(7, 'Battle Royale', 3, 1),
(8, 'Death Match', 3, 1),
(9, 'Mini Game', 3, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `leaderboard_game_tbl`
--

CREATE TABLE `leaderboard_game_tbl` (
  `leaderboard_id` int(255) NOT NULL,
  `game_id` int(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `nama_game` varchar(50) NOT NULL,
  `level` int(50) NOT NULL,
  `class_name` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `score` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `leaderboard_game_tbl`
--

INSERT INTO `leaderboard_game_tbl` (`leaderboard_id`, `game_id`, `user_id`, `nama_game`, `level`, `class_name`, `nama`, `score`) VALUES
(1, 1, 'saya3', '', 0, '', '', 30),
(2, 1, 'sueb', '', 0, '', '', 50),
(3, 1, 'saya3', '', 0, '', '', 70),
(4, 1, 'kalian3', '', 0, '', '', 80),
(5, 1, 'kalian3', '', 0, '', '', 82),
(6, 1, 'kami3', '', 0, '', '', 56),
(7, 2, 'kami3', '', 0, '', '', 40),
(8, 3, 'kami3', '', 0, '', '', 23),
(9, 4, 'kamu2', '', 0, '', '', 67),
(10, 5, 'kamu2', '', 0, '', '', 76),
(11, 4, 'kita3', '', 0, '', '', 30),
(12, 5, 'kita3', '', 0, '', '', 50),
(13, 7, 'sueb', '', 0, '', '', 70),
(14, 9, 'saya3', '', 0, '', '', 80),
(15, 8, 'sueb', '', 0, '', '', 82),
(16, 7, 'mereka', '', 0, '', '', 56),
(17, 2, 'mereka', '', 0, '', '', 40),
(18, 3, 'saya3', '', 0, '', '', 23),
(19, 4, 'saya3', '', 0, '', '', 67),
(20, 5, 'semuanya', '', 0, '', '', 76),
(38, 1, 'saya3', '', 1, '', '', 1),
(49, 1, 'saya3', '', 0, '', '', 111),
(50, 1, 'saya3', '', 0, '', '', 111),
(51, 4, 'saya3', '', 0, '', '', 1),
(52, 3, 'saya3', '', 0, '', '', 112),
(53, 7, 'saya3', '', 0, '', '', 123),
(54, 1, 'saya3', '', 0, '', '', 444);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_tbl`
--

CREATE TABLE `user_tbl` (
  `user_id` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `class_id` int(255) NOT NULL,
  `token` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_tbl`
--

INSERT INTO `user_tbl` (`user_id`, `password`, `email`, `nama`, `class_id`, `token`) VALUES
('aaa', '47bce5c74f589f4867dbd57e9ca9f808', 'aaa@gmail.com', 'aaa', 1, 'aa009abe7ac46926e775d485af1cfeb3'),
('anu3', '89a4b5bd7d02ad1e342c960e6a98365c', 'anu@gmail.com', 'anu', 1, '4c9da1f53634c131a0be54db4827c9ba'),
('asd', '5f039b4ef0058a1d652f13d612375a5b', 'das', 'sad', 1, '61718a5842612ee8e3cc4f17c3a7c537'),
('kalian3', '974e8717b1c7f7568f2a2ecc8845a793', 'kalian@gmail.com', 'kalian', 1, '222'),
('kami3', '02a1e0022f7c0e1fd6f6be54045cb797', 'kami@gmail.com', 'kami', 5, '111'),
('kamu2', 'e71d61ffa1d5df09021a66b56e0ec11e', 'kamu@gmail.com', 'kamu', 4, '321'),
('kita3', 'eeb166e3bae404ae634d9dc403f334a7', 'kita@gmail.com', 'kita', 5, '231'),
('mereka', 'fdd6e636c63786ba30f895a9dbed3fcd', 'mereka@gmail.com', 'mereka', 3, '333'),
('saya3', 'dafd733081173e4324c9088427afacd7', 'saya@gmail.com', 'saya', 4, '84ed8a7556b4a7a3766f623ca9bf3932'),
('semuanya', 'a3fcce3f362bbb8d04b0d7b564841d63', 'semuanya@gmail.com', 'semuanya', 1, '323'),
('sueb', '0a4559df7812153aa69b124a9622d1a2', 'sueb@gmail.com', 'sueb3', 3, '3fea9fbbb190a744d411069ce99fdf53');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `class_tbl`
--
ALTER TABLE `class_tbl`
  ADD PRIMARY KEY (`class_id`);

--
-- Indeks untuk tabel `game_tbl`
--
ALTER TABLE `game_tbl`
  ADD PRIMARY KEY (`game_id`);

--
-- Indeks untuk tabel `leaderboard_game_tbl`
--
ALTER TABLE `leaderboard_game_tbl`
  ADD PRIMARY KEY (`leaderboard_id`),
  ADD KEY `fk_user_id` (`user_id`),
  ADD KEY `fk_game_id` (`game_id`);

--
-- Indeks untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `fk_class_id_user` (`class_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `class_tbl`
--
ALTER TABLE `class_tbl`
  MODIFY `class_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `game_tbl`
--
ALTER TABLE `game_tbl`
  MODIFY `game_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `leaderboard_game_tbl`
--
ALTER TABLE `leaderboard_game_tbl`
  MODIFY `leaderboard_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `leaderboard_game_tbl`
--
ALTER TABLE `leaderboard_game_tbl`
  ADD CONSTRAINT `fk_game_id` FOREIGN KEY (`game_id`) REFERENCES `game_tbl` (`game_id`),
  ADD CONSTRAINT `fk_user_id` FOREIGN KEY (`user_id`) REFERENCES `user_tbl` (`user_id`);

--
-- Ketidakleluasaan untuk tabel `user_tbl`
--
ALTER TABLE `user_tbl`
  ADD CONSTRAINT `fk_class_id_user` FOREIGN KEY (`class_id`) REFERENCES `class_tbl` (`class_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
