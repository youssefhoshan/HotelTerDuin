-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 23 jun 2023 om 15:01
-- Serverversie: 10.4.27-MariaDB
-- PHP-versie: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `terduin`
--

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `huur`
--

CREATE TABLE `huur` (
  `id` int(11) NOT NULL,
  `kamer_id` int(11) DEFAULT NULL,
  `naam` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `boekingsdatum` date DEFAULT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `beschikbaarheid` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `huur`
--

INSERT INTO `huur` (`id`, `kamer_id`, `naam`, `email`, `boekingsdatum`, `timestamp`, `beschikbaarheid`) VALUES
(18, 1, 'Kevin', 'kevinkoeks05@gmail.com', '2023-06-07', '2023-06-19 09:04:46', NULL),
(19, 1, 'Kevin', 'kevinkoeks05@gmail.com', '2023-06-07', '2023-06-19 09:04:47', NULL),
(20, 1, 'Kevin', 'kevinkoeks05@gmail.com', '2023-06-07', '2023-06-19 09:04:48', NULL),
(21, 1, 'nadia', 'alwhban2000@hotmail.com', '2023-06-29', '2023-06-19 20:14:54', NULL),
(22, 1, 'patrick', 'youssefhoshan@outlook.com', '2023-06-29', '2023-06-20 11:43:41', NULL),
(23, 2, 'Hoshan', 'youssef2013@live.nl', '2023-06-29', '2023-06-20 11:49:52', NULL),
(24, 2, 'Hoshan', 'youssef2013@live.nl', '2023-06-29', '2023-06-20 11:50:10', NULL),
(25, 2, 'Hamood Habib', 'a_ridha@hotmail.nl', '2023-06-24', '2023-06-23 11:52:07', NULL),
(26, 1, 'Patrick', '2058273@talnet.nl', '2023-06-29', '2023-06-23 12:28:11', NULL),
(27, 1, 'Jayden', 'jaydenmahes16@gmail.com', '2023-06-28', '2023-06-23 12:43:04', NULL),
(28, 3, 'Hoedaifah', '2087702@talnet.nl', '2023-07-27', '2023-06-23 12:47:51', NULL),
(29, 1, 'Anoushka', 'a.harkisoen@rocva.nl', '2023-08-19', '2023-06-23 12:52:19', NULL);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `kamer`
--

CREATE TABLE `kamer` (
  `id` int(255) NOT NULL,
  `naam` varchar(255) NOT NULL,
  `afbeelding` varchar(255) NOT NULL,
  `prijs` decimal(65,0) NOT NULL,
  `beschrijving` text NOT NULL,
  `bonus` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Gegevens worden geëxporteerd voor tabel `kamer`
--

INSERT INTO `kamer` (`id`, `naam`, `afbeelding`, `prijs`, `beschrijving`, `bonus`) VALUES
(1, 'Standaard Kamer', 'room1.jpg', '299', 'De standaard kamer is een comfortabele en betaalbare optie voor gasten die op zoek zijn naar een aangenaam verblijf.\r\n<br>\r\nDeze kamer biedt alle essentiële voorzieningen voor een ontspannen verblijf, waaronder een comfortabel bed, een eigen badkamer en basisfaciliteiten. Het is een ideale keuze voor individuele reizigers of stellen die een eenvoudige en functionele kamer willen.', '⭐⭐⭐'),
(2, 'Deluxe Kamer', 'room2.jpg', '399', 'De Deluxe kamer is een ruimere en luxueuzere optie voor gasten die wat extra comfort en stijl wensen. Deze kamer biedt een verfijnde ambiance en is voorzien van moderne voorzieningen en elegant meubilair.\r\n\r\nGasten kunnen genieten van extra ruimte, een comfortabel zitgedeelte, een goed uitgeruste badkamer en mogelijk extra faciliteiten zoals een minibar of een prachtig uitzicht. Het is ideaal voor gasten die wat meer luxe en comfort willen ervaren tijdens hun verblijf.', '⭐⭐⭐⭐'),
(3, 'Suite Kamer', 'room3.jpg', '499', 'De Suite is de meest exclusieve en luxe accommodatie in het hotel. Deze ruime en smaakvol ingerichte kamer biedt een aparte woonruimte en slaapkamer, waardoor gasten kunnen genieten van privacy en comfort. \r\n\r\nDe Suite is uitgerust met hoogwaardige voorzieningen, zoals een kingsize bed, een elegante badkamer met luxe badproducten, een aparte zithoek en mogelijk een eigen balkon of terras. Het is de perfecte keuze voor gasten die op zoek zijn naar een onvergetelijk en weelderig verblijf.', '⭐⭐⭐⭐⭐');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `role` enum('admin','user') NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `huur`
--
ALTER TABLE `huur`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kamer_id` (`kamer_id`);

--
-- Indexen voor tabel `kamer`
--
ALTER TABLE `kamer`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `huur`
--
ALTER TABLE `huur`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT voor een tabel `kamer`
--
ALTER TABLE `kamer`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Beperkingen voor geëxporteerde tabellen
--

--
-- Beperkingen voor tabel `huur`
--
ALTER TABLE `huur`
  ADD CONSTRAINT `huur_ibfk_1` FOREIGN KEY (`kamer_id`) REFERENCES `kamer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
