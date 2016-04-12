-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Erstellungszeit: 12. Apr 2016 um 17:34
-- Server-Version: 5.5.42
-- PHP-Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Datenbank: `stitching`
--
CREATE DATABASE IF NOT EXISTS `stitching` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `stitching`;

-- --------------------------------------------------------

--
-- Tabellenstruktur für Tabelle `image`
--

DROP TABLE IF EXISTS `image`;
CREATE TABLE `image` (
  `id` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Daten für Tabelle `image`
--

INSERT INTO `image` (`id`, `created_at`, `name`) VALUES
(7, '2016-04-11 14:01:08', 'wc2o-reiNv2CFrPLr46Zfz7FUelNJpZdSnBwLop05eY.jpg'),
(8, '2016-04-11 14:06:44', 'Jr17jMx1eyR5lYbKjp79Pl3ByJpmL1OAfPyrgGhQUHc.jpg'),
(9, '2016-04-11 14:07:47', 'pPhqtXhrTF-8qYVAeUHs4O3LjnvHEW_e6eT03k4_DzY.jpg'),
(10, '2016-04-11 14:09:43', '5QsdkWU7e4GDPkKYCWW9uT7VVjKKF7OI7NaUzIXFd3k.jpg'),
(11, '2016-04-11 14:13:27', 'vYPOMZIbenN9hE3fnGTyJlOyYFm6kWhf2kdCcqHhmMw.jpg'),
(12, '2016-04-11 14:15:05', 'iSC0ABBS3kii9cAtBF4vNtlxiGZLsdPvionf2xFkq-Q.jpg'),
(13, '2016-04-11 14:15:56', 'aDIQgKAUaydj_cnQnAy4yDCuHE3xvRVnPkxF3UMuSys.jpg'),
(14, '2016-04-11 14:16:57', '0NO3v2rouVD9GpXkl0RgtKT9y7z37Ohy8zVAwulYdok.jpg'),
(15, '2016-04-11 14:17:35', 'iIj8Prv1DBVV4tCrm5t_g5TQADXpJxl9LsXhVIWmWmk.jpg'),
(16, '2016-04-11 14:18:08', 'XoRblFKearl7TlaUrCodJVLFJiRh96Euqp5txkv8tzk.jpg'),
(17, '2016-04-11 14:19:09', 'lQstOCDmh6tLO1xia7YKDmTR-hhRjo4KfgOHew5sN5A.jpg'),
(18, '2016-04-12 17:30:12', 'Kjrfo6vK3V6n6QZ8j53UVlVBWNFkZ3-jL7gE28MftIU.jpg');

--
-- Indizes der exportierten Tabellen
--

--
-- Indizes für die Tabelle `image`
--
ALTER TABLE `image`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT für exportierte Tabellen
--

--
-- AUTO_INCREMENT für Tabelle `image`
--
ALTER TABLE `image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;