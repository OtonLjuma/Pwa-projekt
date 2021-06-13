-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 13, 2021 at 09:03 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pwa_projekt`
--

-- --------------------------------------------------------

--
-- Table structure for table `forma_u_tablici`
--

CREATE TABLE `forma_u_tablici` (
  `id` int(11) NOT NULL,
  `naslov` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `datum` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `vrijeme` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sazetak` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tekst` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `slika` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kategorija` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `arhiva` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `forma_u_tablici`
--

INSERT INTO `forma_u_tablici` (`id`, `naslov`, `datum`, `vrijeme`, `sazetak`, `tekst`, `slika`, `kategorija`, `arhiva`) VALUES
(18, 'COME BACK', '2019-05-16', '19:35', 'Royaume-Uni: le pro-Brexit Boris Johnson candidat au poste de Premier ministre', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'slika1.jpg', 'MONDE', 0),
(19, 'XYLELLA FASTIDIOSA', '', '', 'Une bacterie tueuse d oliviers pourrait rejoindre le nord de \r\nl Europe', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaavaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', 'slika2.jpg', 'MONDE', 0),
(20, 'PARTENAIRE', '', '', 'Expertise comptable a partir de 99€/mois', '', 'slika3.jpg', 'MONDE', 0),
(21, 'PARTENAIRE', '', '', 'Expertise comptable a partir de 99€/mois', '', 'slika3.jpg', 'MONDE', 0),
(22, 'ONE PLANET LAB', '', '', 'Transition ecologiquež: Macron charge Pinault de mobiliser\r\nl industrie de la mode', '', 'slika4.jpg', 'ÉCONOMIE', 0),
(23, 'CONCURRENCE', '', '', 'Le fondateur de Telegram enfonce WhatsApp, victime d une nouvelle faille', '', 'slika5.jpg', 'ÉCONOMIE', 0),
(24, 'LE DOSSIER DE L EXPRESS', '', '', 'Le veritable inventeur de \"The Face Book\" veut voir\r\n\"Zuckerberg en prison\"', '', 'slika6.jpg', 'ÉCONOMIE', 0),
(25, 'LE DOSSIER DE L EXPRESS', '', '', 'Le veritable inventeur de \"The Face Book\" veut voir\r\n\"Zuckerberg en prison\"', '', 'slika6.jpg', 'ÉCONOMIE', 0),
(28, 'second life ranker', '', '', 'gfdsg', 'gdsgdsgds', 'slika4.jpg', 'MONDE', 1),
(29, 'second life ranker', '', '', 'gfdsg', 'gdsgdsgds', 'slika5.jpg', 'MONDE', 1),
(30, 'gddgdgsgds', '', '', 'dgdsg', '', 'slika2.jpg', 'MONDE', 1),
(31, '', '', '', 'xxcc', '', 'slika4.jpg', 'MONDE', 1),
(32, '', '', '', 'ccx', '', 'slika3.jpg', 'ÉCONOMIE', 1),
(33, '', '', '', 'sfsaf', '', 'slika4.jpg', 'ÉCONOMIE', 1);

-- --------------------------------------------------------

--
-- Table structure for table `korisnik`
--

CREATE TABLE `korisnik` (
  `id` int(11) NOT NULL,
  `ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `prezime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `korisničko_ime` varchar(32) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `lozinka` varchar(255) CHARACTER SET utf8 COLLATE utf8_croatian_ci NOT NULL,
  `razina` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `korisnik`
--

INSERT INTO `korisnik` (`id`, `ime`, `prezime`, `korisničko_ime`, `lozinka`, `razina`) VALUES
(6, 'Oton', 'Ljuma', 'admin', '$2y$10$48HVn3DyOIemrHgbKCnKtOO41xLvbtjXOLrz0ivdLmEsD20UovFBS', 1),
(7, 'Ivan', 'Ivan', 'Ivan1234', '$2y$10$EZ/LUKRqTCEenPTP.abrgeUEKhXMeT96sXDElSzr8mcyM6p15DAnG', 0),
(8, 'Ivan', 'Ivan', 'lovro', '$2y$10$OxOtccmtpDUVAo8Galu2E.xjWAZnCaVovs2LFGjaap.CpZzRz6fWG', 0),
(9, 'Oton', 'Ljuma', '123', '$2y$10$fz8LUGRBLSj32oKAt7BkFOoH2oGTB26jYEhKVALZUanuHTDpxUP0C', 0),
(10, 'Ivan64754', 'Kepec', 'Ivan', '$2y$10$3v.iZCWNV0b3ZYrxkFuiKeCAh4IVWf8Y1fbweAFPxCAK87djKoBiy', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forma_u_tablici`
--
ALTER TABLE `forma_u_tablici`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `korisnik`
--
ALTER TABLE `korisnik`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `korisničko_ime` (`korisničko_ime`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forma_u_tablici`
--
ALTER TABLE `forma_u_tablici`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `korisnik`
--
ALTER TABLE `korisnik`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
