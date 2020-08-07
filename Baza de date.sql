-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Gazdă: 127.0.0.1:3308
-- Timp de generare: iun. 14, 2020 la 10:17 AM
-- Versiune server: 8.0.18
-- Versiune PHP: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Bază de date: `bogdan_menchiu`
--

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `materii`
--

DROP TABLE IF EXISTS `materii`;
CREATE TABLE IF NOT EXISTS `materii` (
  `materii_id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `programare` int(11) NOT NULL,
  `analiza` int(11) NOT NULL,
  `fizica` int(11) NOT NULL,
  `informatica_aplicata` int(11) NOT NULL,
  PRIMARY KEY (`materii_id`),
  KEY `users_id` (`users_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Eliminarea datelor din tabel `materii`
--

INSERT INTO `materii` (`materii_id`, `users_id`, `programare`, `analiza`, `fizica`, `informatica_aplicata`) VALUES
(1, 10, 8, 8, 9, 10),
(2, 11, 10, 9, 9, 10),
(3, 13, 9, 6, 6, 4),
(4, 12, 10, 9, 8, 8);

-- --------------------------------------------------------

--
-- Structură tabel pentru tabel `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `idStud` int(11) NOT NULL AUTO_INCREMENT,
  `Prenume` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `Nume` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `Parola` text CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `adresaEmail` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_romanian_ci NOT NULL,
  `isAdmin` tinyint(4) NOT NULL DEFAULT '0',
  `isProf` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`idStud`)
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_romanian_ci;

--
-- Eliminarea datelor din tabel `users`
--

INSERT INTO `users` (`idStud`, `Prenume`, `Nume`, `Parola`, `adresaEmail`, `isAdmin`, `isProf`) VALUES
(10, 'Cristian', 'Bucurenciu', '$2y$10$qghf/iNfMyIst1nLP3S9euUwx876NZlvzKCme3XdBsLLkPsvP0OcC', 'bogdan.bucurenciu@ulbsibiu.ro', 0, 0),
(11, 'Bogdan', 'Menchiu', '$2y$10$wkqQQjEB1QKCfZSiJkycF.xTsrzT/RAACmbDIgErPU/rcb3NKBY3G', 'bogdan.menchiu@ulbsibiu.ro', 0, 0),
(12, 'Ana', 'Aftenie', '$2y$10$yp.ZhbtMMYDgwr6WVcTT4elJY4pJ93fS9GCyVAUsyUKECDRRIPpNi', 'ana.aftenie@ulbsibiu.ro', 0, 0),
(13, 'Alin', 'Birza', '$2y$10$9Adagqec/UamMeA6D86KGOsp05OZBETlXQJ2Md4rVXdR.wQI6dk4y', 'alin.birza@ulbsibiu.ro', 0, 0),
(14, 'Ioan', 'Tincu', '$2y$10$/7mZ.xn840hMwmVUnaHg7Om/1OshODNn7yBmNWULnw2kZacf6sewm', 'ioan.tincu@ulbsibiu.ro', 0, 1),
(15, 'Remus', 'Brad', '$2y$10$GlS8ZRbqJQrM6rDmAqrz7.aRQo47KObwS60LNLtpIXQNhuyX7ubRW', 'remus.brad@ulbsibiu.ro', 1, 1),
(16, 'Aurel', 'Pasca', '$2y$10$CNwvfgbphFlV6lf0.VB59uAALbnf4BrysjeiCUidj5hEPZ9cAh5CG', 'aurel.pasca@ulbsibiu.ro', 0, 1),
(17, 'Antoniu', 'Pitic', '$2y$10$Ikriw.FeEfGO3LkDIB5zb.SCfCW.pN5xjM1A7wK0fnQYlETA0oLKS', 'antoniu.pitic@ulbsibiu.ro', 1, 1);

--
-- Constrângeri pentru tabele eliminate
--

--
-- Constrângeri pentru tabele `materii`
--
ALTER TABLE `materii`
  ADD CONSTRAINT `materii_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`idStud`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
