-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: mysql-ecoriders.alwaysdata.net
-- Generation Time: Feb 18, 2025 at 05:45 PM
-- Server version: 10.11.10-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecoriders_database`
--

-- --------------------------------------------------------

--
-- Table structure for table `avis`
--

CREATE TABLE `avis` (
  `avis_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `covoiturage_id` int(11) NOT NULL,
  `commentaire` varchar(255) NOT NULL,
  `note` tinyint(4) NOT NULL CHECK (`note` between 1 and 5),
  `statut` varchar(50) NOT NULL,
  `date_avis` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `avis`
--

INSERT INTO `avis` (`avis_id`, `utilisateur_id`, `covoiturage_id`, `commentaire`, `note`, `statut`, `date_avis`) VALUES
(9, 2, 12, 'Super conducteur !', 5, '', '2025-02-08 23:00:00'),
(10, 1, 12, 'Très bon passager !', 5, '', '2025-02-08 23:00:00'),
(17, 3, 12, 'Yes !', 5, '', '2025-02-09 01:48:22'),
(25, 1, 16, 'Lyon à fond !', 4, '', '2025-02-09 02:19:02'),
(26, 2, 16, 'Saint-Étienne est mieux !', 3, '', '2025-02-09 02:19:31'),
(27, 1, 19, 'Ah d\'accord !', 4, '', '2025-02-09 02:43:18'),
(28, 2, 19, 'Yes !', 5, '', '2025-02-09 02:43:43'),
(29, 3, 19, 'Excellent conducteur !', 5, '', '2025-02-09 02:44:59'),
(30, 1, 23, 'C\'était chaud', 5, '', '2025-02-09 17:58:20'),
(31, 2, 23, 'Waouh !', 3, '', '2025-02-09 17:59:00'),
(32, 3, 18, 'Chambre 506 !', 1, '', '2025-02-09 18:33:05'),
(33, 2, 18, 'Anta howa 106 !', 1, '', '2025-02-09 18:34:18'),
(38, 2, 17, 'Ya hasra 3la Bordeaux', 5, '', '2025-02-10 21:00:42'),
(39, 1, 17, 'nass Mahdia !', 5, '', '2025-02-10 21:01:21'),
(43, 3, 23, 'Kiw !', 5, '', '2025-02-10 23:05:02'),
(45, 11, 17, 'Conduit bien.', 5, '', '2025-02-11 00:14:51'),
(46, 11, 27, 'KF ma gueule !', 5, '', '2025-02-11 00:16:10'),
(47, 1, 27, 'Top KF :)', 5, '', '2025-02-11 00:16:30'),
(48, 2, 27, 'Doucement sur la route espèce de folle !', 2, '', '2025-02-11 01:12:47'),
(51, 26, 32, 'Pas goût de musique !', 3, '', '2025-02-11 20:17:32'),
(52, 1, 32, 'Musique trop forte sans arrêt tout le long du trajet', 5, '', '2025-02-11 20:18:16'),
(53, 1, 34, 'Coucou !', 2, '', '2025-02-13 20:58:25'),
(54, 1, 72, 'C\'était bizarre !', 3, '', '2025-02-13 21:55:18'),
(55, 19, 31, 'Très cultivé ! ', 4, '', '2025-02-13 22:01:18'),
(56, 10, 31, 'Je recommande !', 5, '', '2025-02-13 22:14:14'),
(57, 3, 72, 'Conduite de qualité !', 4, '', '2025-02-13 22:16:55'),
(58, 27, 60, 'Tranquillement arrivée !', 4, '', '2025-02-13 22:18:21'),
(61, 2, 60, 'Bonne ambiance 😊', 4, '', '2025-02-13 22:21:39'),
(72, 10, 82, 'Cool comme fille !', 5, '', '2025-02-16 21:26:47'),
(73, 11, 82, 'respectueux !', 5, '', '2025-02-16 21:27:11'),
(74, 26, 84, 'Bonne conduite !', 4, '', '2025-02-17 11:04:46'),
(75, 87, 84, 'Très cultivé !', 5, '', '2025-02-17 11:05:50'),
(76, 88, 85, 'Calmes et silencieuse !', 4, '', '2025-02-17 11:20:54'),
(77, 27, 85, 'Sérieux !', 5, '', '2025-02-17 11:21:27'),
(78, 30, 34, 'Top !', 5, '', '2025-02-17 12:14:15'),
(81, 94, 18, 'Super voyage ! Merci pour les discussions interessantes et à une prochaine fois ! ', 5, '', '2025-02-17 16:43:47'),
(82, 94, 88, 'Arrivé 1h en retard au point de RDV ... Mauvaise ambiance dans la voiture ', 3, '', '2025-02-17 18:21:55'),
(83, 1, 88, 'Excellente conductrice !', 5, '', '2025-02-17 20:26:16'),
(84, 96, 89, 'Première fois en covoiturage et c\'était parfait !', 5, '', '2025-02-18 14:23:05'),
(85, 97, 89, 'Jean est un super conducteur, prudent et sympa !', 4, '', '2025-02-18 14:25:56');

-- --------------------------------------------------------

--
-- Table structure for table `covoiturage`
--

CREATE TABLE `covoiturage` (
  `covoiturage_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `date_depart` date DEFAULT NULL,
  `heure_depart` time DEFAULT NULL,
  `lieu_depart` varchar(255) DEFAULT NULL,
  `date_arrivee` date DEFAULT NULL,
  `heure_arrivee` time DEFAULT NULL,
  `lieu_arrivee` varchar(255) DEFAULT NULL,
  `statut` enum('en attente','démarré','en pause') DEFAULT 'en attente',
  `nombre_places` int(11) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `covoiturage`
--

INSERT INTO `covoiturage` (`covoiturage_id`, `utilisateur_id`, `voiture_id`, `date_depart`, `heure_depart`, `lieu_depart`, `date_arrivee`, `heure_arrivee`, `lieu_arrivee`, `statut`, `nombre_places`, `prix`) VALUES
(12, 1, 2, '2025-06-12', '10:00:00', 'Clermont-Ferrand', '2025-06-12', '13:30:00', 'Lyon', 'en attente', 2, 25.00),
(16, 1, 1, '2025-05-16', '15:00:00', 'Chabeuil', '2025-05-16', '18:00:00', 'Lyon', 'en attente', 0, 30.00),
(17, 2, 4, '2025-06-06', '09:00:00', 'Saint-Maur-des-Fossés', '2025-06-06', '16:00:00', 'Bordeaux', 'en attente', 2, 50.00),
(18, 3, 5, '2025-07-17', '08:00:00', 'Dijon', '2025-07-17', '12:00:00', 'Lyon', 'en attente', 1, 40.00),
(19, 1, 1, '2025-02-12', '06:00:00', 'Malissard', '2025-02-12', '08:00:00', 'Lyon', 'en attente', 0, 30.00),
(20, 1, 1, '2025-02-15', '12:00:00', 'Valence', '2025-02-15', '14:00:00', 'Lyon', 'en attente', 2, 60.00),
(23, 1, 1, '2025-06-22', '12:00:00', 'Pau', '2025-06-22', '15:00:00', 'Bayonne', 'en attente', 0, 25.00),
(27, 11, 8, '2025-02-13', '09:00:00', 'Paris', '2025-02-13', '12:00:00', 'Rouen', 'en attente', 2, 60.00),
(30, 10, 11, '2025-03-30', '10:00:00', 'Rouen', '2025-03-30', '13:00:00', 'Orléans', 'en attente', 3, 45.00),
(31, 19, 12, '2025-05-15', '10:00:00', 'Grenoble', '2025-05-15', '12:00:00', 'Annecy', 'en attente', 1, 30.00),
(32, 26, 13, '2025-06-05', '13:00:00', 'Annecy', '2025-06-05', '18:00:00', 'Malissard', 'en attente', 1, 30.00),
(34, 30, 15, '2025-06-26', '06:00:00', 'Barbières', '2025-06-26', '09:00:00', 'Lyon', 'en attente', 1, 30.00),
(59, 1, 1, '2025-06-30', '10:00:00', 'Saint-Étienne', '2025-06-30', '13:30:00', 'Lyon', 'en attente', 2, 33.00),
(60, 2, 31, '2025-06-24', '12:00:00', 'Mios', '2025-06-24', '13:30:00', 'Bordeaux', 'en attente', 2, 18.00),
(61, 2, 3, '2025-03-23', '10:00:00', 'Montpelier', '2025-03-23', '13:30:00', 'Bordeaux', 'en attente', 3, 28.00),
(70, 1, 33, '2025-07-17', '09:00:00', 'Romans-sur-Isère', '2025-07-17', '12:00:00', 'Avignon', 'en attente', 2, 33.00),
(71, 1, 2, '2025-03-12', '10:00:00', 'Romans-sur-Isère', '2025-03-12', '16:00:00', 'Rouen', 'en attente', 2, 60.00),
(72, 3, 5, '2025-06-16', '10:00:00', 'Marseille', '0005-06-16', '12:00:00', 'Toulon', 'en attente', 1, 23.00),
(82, 10, 11, '2025-09-19', '10:00:00', 'Rouen', '2025-09-19', '13:00:00', 'Le Havre', 'en attente', 1, 15.00),
(84, 87, 50, '2025-06-16', '09:00:00', 'Bègles', '2025-06-16', '10:30:00', 'Biganos', 'en attente', 1, 13.00),
(85, 88, 52, '2025-02-25', '10:00:00', 'Mios', '2025-02-25', '14:00:00', 'Clermont-Ferrand', 'en attente', 1, 36.00),
(88, 94, 56, '2025-03-20', '08:59:00', 'Nancy', '2025-03-20', '15:00:00', 'Bourges', 'en attente', 1, 120.00),
(89, 96, 57, '2025-02-20', '08:00:00', 'Valence', '2025-02-20', '10:30:00', 'Lyon', 'en attente', 1, 23.00);

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reservation_id` int(11) NOT NULL,
  `covoiturage_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `voiture_id` int(11) NOT NULL,
  `statut` varchar(50) NOT NULL DEFAULT 'en attente',
  `date_reservation` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reservation_id`, `covoiturage_id`, `utilisateur_id`, `voiture_id`, `statut`, `date_reservation`) VALUES
(61, 12, 2, 2, 'acceptée', '2025-02-09 00:07:27'),
(71, 12, 3, 2, 'acceptée', '2025-02-09 01:47:04'),
(83, 16, 2, 1, 'acceptée', '2025-02-09 02:18:02'),
(84, 16, 2, 1, 'acceptée', '2025-02-09 02:40:18'),
(86, 19, 2, 1, 'acceptée', '2025-02-09 02:42:45'),
(87, 19, 3, 1, 'acceptée', '2025-02-09 02:44:12'),
(91, 23, 1, 1, 'refusée', '2025-02-09 17:47:14'),
(94, 23, 2, 1, 'refusée', '2025-02-09 17:56:20'),
(96, 23, 2, 1, 'acceptée', '2025-02-09 17:57:50'),
(97, 23, 3, 1, 'refusée', '2025-02-09 17:59:57'),
(98, 18, 2, 5, 'acceptée', '2025-02-09 18:30:37'),
(100, 23, 3, 1, 'acceptée', '2025-02-09 18:40:31'),
(106, 17, 1, 4, 'acceptée', '2025-02-10 20:58:08'),
(113, 17, 11, 4, 'acceptée', '2025-02-11 00:12:06'),
(114, 27, 1, 8, 'acceptée', '2025-02-11 00:15:28'),
(116, 27, 2, 8, 'acceptée', '2025-02-11 01:11:49'),
(120, 32, 1, 13, 'acceptée', '2025-02-11 20:16:58'),
(121, 34, 1, 15, 'refusée', '2025-02-13 00:39:03'),
(123, 34, 1, 15, 'acceptée', '2025-02-13 00:55:00'),
(126, 31, 1, 12, 'refusée', '2025-02-13 01:04:22'),
(127, 32, 1, 13, 'acceptée', '2025-02-13 19:37:05'),
(129, 71, 2, 2, 'refusée', '2025-02-13 19:42:36'),
(130, 60, 1, 31, 'refusée', '2025-02-13 19:54:06'),
(132, 72, 1, 5, 'refusée', '2025-02-13 20:01:09'),
(133, 72, 1, 5, 'acceptée', '2025-02-13 20:02:17'),
(136, 60, 27, 31, 'acceptée', '2025-02-13 20:08:00'),
(138, 31, 10, 12, 'acceptée', '2025-02-13 22:00:15'),
(154, 82, 11, 11, 'acceptée', '2025-02-16 21:26:16'),
(156, 84, 26, 50, 'acceptée', '2025-02-17 10:53:05'),
(157, 84, 87, 50, 'refusée', '2025-02-17 10:57:34'),
(161, 85, 27, 52, 'acceptée', '2025-02-17 11:20:13'),
(164, 18, 94, 5, 'acceptée', '2025-02-17 12:40:51'),
(165, 88, 3, 56, 'acceptée', '2025-02-17 15:34:34'),
(168, 88, 1, 56, 'acceptée', '2025-02-17 15:39:59'),
(169, 89, 97, 57, 'acceptée', '2025-02-18 14:10:02');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `role_id` int(11) NOT NULL,
  `libelle` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`role_id`, `libelle`) VALUES
(1, 'admin'),
(2, 'employe'),
(3, 'utilisateur');

-- --------------------------------------------------------

--
-- Table structure for table `utilisateur`
--

CREATE TABLE `utilisateur` (
  `utilisateur_id` int(11) NOT NULL,
  `nom` varchar(50) NOT NULL,
  `prenom` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephone` varchar(50) NOT NULL,
  `adresse` varchar(50) NOT NULL,
  `date_naissance` varchar(50) NOT NULL,
  `pseudo` varchar(50) NOT NULL,
  `role_id` int(11) NOT NULL DEFAULT 3
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilisateur`
--

INSERT INTO `utilisateur` (`utilisateur_id`, `nom`, `prenom`, `email`, `password`, `telephone`, `adresse`, `date_naissance`, `pseudo`, `role_id`) VALUES
(1, 'BOUGUERRA', 'Abbes', 'bouguerra.abbes@outlook.fr', '$2y$10$5cjdoD3DgyEop8ljVuF4V.rcpGB2eQpLGAmXoS4UZ7OOv5dS0X4f2', '+33 6 66 59 87 44', '26 rue du Pasteur, 69000 LYON', '1987-02-17', 'Sebba', 3),
(2, 'HOCINI', 'Fouad', 'hmfouad@yahoo.fr', '$2y$10$nUTNft3zoV5C.SGfM2tNX.jgOEy5dYVYeQi3Tga5IaK04TfN3NBNS', '+33 7 89 01 23 45', '18 Boulevard des Étoiles, 69000 LYON', '1990-11-22', 'Foufou', 3),
(3, 'BAHI', 'Youcef', 'bahi.youcef@gmail.com', '$2y$10$seO.wc8D6vGN22wbOPQvwOV8l./f5fcnBOH9HIcIfQeK6.cOlKRty', '+33 7 54 32 10 98', '14 Allée des Cyprès, 67000 Strasbourg', '1990-09-27', 'Yoyo', 3),
(4, 'GARCIA', 'José', 'garcia.jose@ecoride.com', '$2y$10$OQ8BVzZKpFPkXPzHfwYsFuV9lqRSK0PpKTKp.c4j/HUvzsZkHjZZ.', '+33 6 10 98 76 54', '157, Av Victor Hugo, 69006 Lyon', '1979-02-09', 'JoséG', 1),
(5, 'DUPONT', 'Jean', 'jean.dupont@ecoride.com', '$2y$10$sCUtt0kzlhWOIzxZ4dT9juVV0RKWcT7V.Ycf5X9HUKBl53ESqV4g.', '+33 6 34 21 09 87', '45 Rue des Pins, 33000 Bordeaux', '1990-01-25', 'JeanP', 2),
(10, 'MANSUY', 'Benjamin', 'mansuy.benjamin@gmail.com', '$2y$10$SiLVvdLfC01SpALgUXGjBunJS8p8FNV30DjBLsfWvylDyV51bIT.K', '+33 6 23 45 67 89', '8 Place des Coquelicots, 13000 Marseille', '1988-04-12', 'BenM', 3),
(11, 'MALARD', 'Carole', 'malard.carole@yahoo.fr', '$2y$10$9LRo.Xw21VkPYd3FMzpfn.jChBFxr8V76HeXGUk/mAc/hzg667Pbi', '+33 7 48 59 62 29', '89 Avenue des Champs, 34000 Montpellier', '1997-06-17', 'CaroM', 3),
(19, 'ADAM', 'Mickael', 'adma.mickael@gmail.com', '$2y$10$RHvcrBOmLomf783owkCZZeamH48fI6FQF/iFWo361pOIsuaQkzT.u', '+33 6 74 85 32 10', '58 Rue des Érables, 13001 Marseille', '1986-03-14', 'Mika', 3),
(26, 'CALMES', 'Annabelle', 'calmes.annabelle@free.fr', '$2y$10$KxP2jHjEWJn/OavNWVEW2Os.FcOxUnD0oBt6mBS9G7DPaM5oe26iK', '+33 6 98 76 54 32', '10 Avenue des Lumières, 31000 Toulouse', '1978-03-05', 'Annab', 3),
(27, 'FONDRESHCI', 'Virginie', 'fond.virginie@wanadoo.fr', '$2y$10$vTdxwJPbmyXQjWOBWs4tzuCWZ7syZgDD/C5v/CMrlToA60dMwHnhO', '+33 7 65 43 21 09', '25 Rue du Chêne Vert, 44000 Nantes', '1985-07-30', 'Virge', 3),
(30, 'BEUCHER', 'Fany', 'beucher.fanny@free.fr', '$2y$10$qPwg.vk8yfrOSfSWaIY56uSS.R9ZmN9KtejYk.sV1JgiBw76WFPsu', '+33 6 87 65 43 21', '33 Rue des Acacias, 59000 Lille', '1983-06-19', 'FonFon', 3),
(87, 'DOE', 'John', 'john.doe@gmail.com', '$2y$10$yTZukL4KWP/4XyAOYNX3XeaAa73OMa1wWx2dsSRrfbMVnnT5Rv07C', '+33 6 13 35 66 97', '29 rue de Limouche, 26000 Valence', '1990-04-09', 'JohnD', 3),
(88, 'MOLINA', 'Yacine', 'molina.yacine@gmail.com', '$2y$10$g1Urn4LMz8yGn8V3Hn3gTurE0WWqbt6DHGLvIvgjrLW70XNY1lJrC', '+33 6 06 34 75 97', '25 rue Charles de Gaulles, 33800 Mios', '1987-05-12', 'YacineM', 3),
(90, 'JULIEN', 'Violette', 'violette.julien@ecoride.com', '$2y$10$dy44RYr7ji6clqG2iAshIOBbl9ixRfmkYsztnDasV5JI8L.sg7oLW', '', '', '', 'VioletteJ', 2),
(92, 'BACHET', 'Camille', 'camille.bachet@ecoride.com', '$2y$10$L93Ai22BK2CP0rUZJU4hqeMzz4j/Xw5uLjfvMyiF6loEplceqf/Dm', '', '', '', 'CamilleB', 2),
(93, 'PERROT', 'Julien', 'julien.perrot@ecoride.com', '$2y$10$GdDxGyV/TmbriGy9U5.7SO.Yw6ZzAiy5hOHy3na56lTexs5YONZoe', '', '', '', 'Abbes123*', 2),
(94, 'Limouna', 'Sabouna', 'sunylie@hotmail.fr', '$2y$10$geMtV2Y6CWjw4vnebRMW1el2ub9FIlbYT3RgespQmZz47CaDJv4tK', '0652648596', '14 rue Charles de Gaulles, 26000 Valence', '2020-01-01', 'Sabouna', 3),
(95, 'REYNAUD', 'Mélody', 'reynaud.melody@gmail.com', '$2y$10$rpAc24wNm3W1oFwWNByHm.9sQOReJv9Q.YyjVFE0fy2aEfhWj3REC', '+33 6 04 12 45 00', '77 Avenue des Lilas, 31000 Toulouse', '1990-05-12', 'MélodyR', 3),
(96, 'DUPONT', 'Jean', 'conducteur@test.com', '$2y$10$PGDII369GMGwdPW7qwL1PekbEHx90c05MbalM9VSSv7hsD5A/4QdC', '+ 33 6 45 78 12 34', '25 rue des Lilas, 75015 Paris', '1990-03-12', 'Ecorider1', 3),
(97, 'DUPONT', 'Camille', 'passager@test.com', '$2y$10$bpHHfg.z.QM9YAzyUYiYYu6Aj4e1m8TT2znssVqk7OGsWbBOMfcJq', '+33 7 52 89 34 67', '18 Avenue Victor Hugo, 69006 Lyon', '1995-09-05', 'Ecorider2', 3);

-- --------------------------------------------------------

--
-- Table structure for table `voiture`
--

CREATE TABLE `voiture` (
  `voiture_id` int(11) NOT NULL,
  `utilisateur_id` int(11) NOT NULL,
  `modele` varchar(100) NOT NULL,
  `immatriculation` varchar(20) NOT NULL,
  `energie` varchar(50) NOT NULL,
  `couleur` varchar(50) NOT NULL,
  `date_immatriculation` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `voiture`
--

INSERT INTO `voiture` (`voiture_id`, `utilisateur_id`, `modele`, `immatriculation`, `energie`, `couleur`, `date_immatriculation`) VALUES
(1, 1, 'Peugeot 308', 'FL-141-NL', 'Diesel', 'Gris foncé', '2021-02-21'),
(2, 1, 'Megane 3 Estate', 'CO-198-DZ', 'Essence', 'Gris foncé', '2010-12-15'),
(3, 2, 'Megane 3 ', 'UK-198-NL', 'Diesel', 'Gris', '2012-04-13'),
(4, 2, 'Clio 2', 'SE-187-RT', 'Diesel', 'Noir', '2016-08-14'),
(5, 3, 'Peugeot 308', 'FL-141-NL', 'Diesel', 'Gris', '2020-02-19'),
(8, 11, 'Peugeot 208', 'CO-198-DZ', 'Electrique', 'Jaune', '2021-02-15'),
(11, 10, 'Citroën C4', 'AB-505-GB', 'Essence', 'Jaune', '2015-12-15'),
(12, 19, 'Toyota Yaris', 'CF-268-MP', 'Hybride', 'Gris', '2019-05-15'),
(13, 26, 'Toyota Yaris', 'GK-125-GM', 'Essence', 'Rouge', '2018-02-19'),
(14, 27, 'BMW Série5', 'ST-486-FR', 'Diesel', 'Noir', '2012-01-30'),
(15, 30, 'Peugeot 3008', 'ZK-441-FD', 'Diesel', 'Noir', '2021-04-11'),
(31, 2, 'Citroën C4', 'CO-198-DZ', 'Électricité', 'Vert', '2022-05-15'),
(33, 1, 'Toyota Yaris', 'SE-187-RT', 'Essence', 'Gris foncé', '2011-11-20'),
(50, 87, 'Peugeot 208', 'UK-206-NW', 'Hybride', 'Violet', '2022-02-22'),
(52, 88, 'BMW Série7', 'CO-298-MA', 'Hybride', 'Vert matte', '2022-02-22'),
(53, 88, 'Scénic', 'ZA-145-MP', 'Diesel', 'Gris', '2010-05-12'),
(56, 94, 'Peugeot 306', 'kl-457-kl', 'Diesel', 'Rouge', '2024-05-12'),
(57, 96, 'Toyota Yaris', 'ZR-199-FB', 'Hybride', 'Gris', '2022-12-12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `avis`
--
ALTER TABLE `avis`
  ADD PRIMARY KEY (`avis_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `covoiturage_id` (`covoiturage_id`);

--
-- Indexes for table `covoiturage`
--
ALTER TABLE `covoiturage`
  ADD PRIMARY KEY (`covoiturage_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `voiture_id` (`voiture_id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reservation_id`),
  ADD KEY `covoiturage_id` (`covoiturage_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`),
  ADD KEY `voiture_id` (`voiture_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`role_id`),
  ADD UNIQUE KEY `libelle` (`libelle`);

--
-- Indexes for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD PRIMARY KEY (`utilisateur_id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `fk_utilisateur_role` (`role_id`);

--
-- Indexes for table `voiture`
--
ALTER TABLE `voiture`
  ADD PRIMARY KEY (`voiture_id`),
  ADD KEY `utilisateur_id` (`utilisateur_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `avis`
--
ALTER TABLE `avis`
  MODIFY `avis_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `covoiturage`
--
ALTER TABLE `covoiturage`
  MODIFY `covoiturage_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=90;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reservation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=170;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `utilisateur`
--
ALTER TABLE `utilisateur`
  MODIFY `utilisateur_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98;

--
-- AUTO_INCREMENT for table `voiture`
--
ALTER TABLE `voiture`
  MODIFY `voiture_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `avis`
--
ALTER TABLE `avis`
  ADD CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `avis_ibfk_2` FOREIGN KEY (`covoiturage_id`) REFERENCES `covoiturage` (`covoiturage_id`) ON DELETE CASCADE;

--
-- Constraints for table `covoiturage`
--
ALTER TABLE `covoiturage`
  ADD CONSTRAINT `covoiturage_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `covoiturage_ibfk_2` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`voiture_id`);

--
-- Constraints for table `reservation`
--
ALTER TABLE `reservation`
  ADD CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`covoiturage_id`) REFERENCES `covoiturage` (`covoiturage_id`),
  ADD CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`),
  ADD CONSTRAINT `reservation_ibfk_3` FOREIGN KEY (`voiture_id`) REFERENCES `voiture` (`voiture_id`);

--
-- Constraints for table `utilisateur`
--
ALTER TABLE `utilisateur`
  ADD CONSTRAINT `fk_utilisateur_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`role_id`);

--
-- Constraints for table `voiture`
--
ALTER TABLE `voiture`
  ADD CONSTRAINT `voiture_ibfk_1` FOREIGN KEY (`utilisateur_id`) REFERENCES `utilisateur` (`utilisateur_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
