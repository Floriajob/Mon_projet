-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : ven. 05 juin 2026 à 12:12
-- Version du serveur : 10.4.32-MariaDB
-- Version de PHP : 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `essaiebdd`
--

-- --------------------------------------------------------

--
-- Structure de la table `article`
--

CREATE TABLE `article` (
  `id_article` varchar(20) NOT NULL,
  `design` varchar(100) DEFAULT NULL,
  `prix` decimal(10,2) DEFAULT NULL,
  `categorie` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `article`
--

INSERT INTO `article` (`id_article`, `design`, `prix`, `categorie`) VALUES
('CA300', 'Canon EOS 3000V zoom 28/80', 329.00, 'photo'),
('CAS07', 'Cassette DV60 par 5', 17000.00, 'divers'),
('CG32008', 'Chaise gamer', 115000.00, 'Mobilier'),
('CH45002', 'Chaise ergonomique ', 89.90, 'Mobilier'),
('CP100', 'Caméscope Panasonic SV-AV 100', 1490.00, 'vidéo'),
('CS330', 'Caméscope Sony DCR-PC330', 1629.00, 'vidéo'),
('DEL30', 'Portable Dell X300', 1715.00, 'informatique '),
('DVD75', 'DVD vierge par 3', 11000.00, 'divers'),
('EC244001', 'Ecran plat 24 pouces Full HD, 75Hz', 100000.00, 'informatique '),
('EN55007', 'Enceinte bluetooth', 2000.00, 'Audio'),
('FR678', 'Tabouret', 45.00, 'meuble'),
('GE299', 'Véhicule', 2000000.00, 'Matériels'),
('HP497', 'PC Bureau HP497 écran TFT', 1500.00, 'informatique '),
('LA67003', 'Lampe de chevet', 16000.00, 'Décoration'),
('MO99005', 'Montre connectée', 50000.00, 'Électronique '),
('NIK55', 'Nikon F55+zoom 28/80', 269.00, 'photo'),
('NIK80', 'Nikon F80', 479.00, 'photo'),
('PA92025', 'Poubelle automatique', 60000.00, 'Maison'),
('PY74009', 'Livre <<Python facile>>', 27.50, 'Librairie '),
('SA82004', 'Sac à dos', 30000.00, 'Bagagerie'),
('SAX15', 'Portable Samsung X15 XVM', 1250000.00, 'informatique '),
('SOXMP', 'PC Portable Sony Z1-XMP', 1500000.00, 'informatique '),
('TA36008', 'Tapis de yoga', 15000.00, 'Sport'),
('TG21032', 'Tablette graphique', 80000.00, 'création numérique'),
('VE880011', 'Ventilateur sur pied', 52.90, 'Maison');

-- --------------------------------------------------------

--
-- Structure de la table `client`
--

CREATE TABLE `client` (
  `id_client` varchar(100) NOT NULL,
  `nom` varchar(50) DEFAULT NULL,
  `prenom` varchar(50) DEFAULT NULL,
  `age` int(11) DEFAULT NULL,
  `adresse` varchar(100) DEFAULT NULL,
  `ville` varchar(50) DEFAULT NULL,
  `mail` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `client`
--

INSERT INTO `client` (`id_client`, `nom`, `prenom`, `age`, `adresse`, `ville`, `mail`) VALUES
('CL001', 'KOUAMÉ ', 'Serge', 31, '10 rue des Palmiers, Abidjan, Côte d\'Ivoire', 'Abidjan', 'serge.kouame@gmail.com'),
('CL002', 'BENALI', 'Yasmine', 25, '5 avenue du 1er Novembre, Alger, Algérie', 'Alger', 'yasmine.benali@yahoo.com'),
('CL003', 'DUPONT', 'Léa', 34, '12 rue des Lilas', 'Lyon', 'lea.dupont@gmail.com'),
('CL004', 'KHAN', 'Amir', 28, '45 Gandhi', 'Mumbai', 'amir.khan@email.com'),
('CL005', 'SILVA', 'Mariana', 41, 'Av.Paulista', 'Sao Paulo', 'mariana.silva@gmail.com'),
('CL006', 'ROSSI', 'Matteo', 53, 'Via Roma', 'Milan', 'matteo.rossi@gmail.com'),
('CL007', 'CHEN', 'Wei', 26, '88 Nanjing Road', 'Shanghai ', 'wei.chen@gmail.com'),
('CL008', 'WILLIAMS', 'James', 37, '421 Elm Street', 'Chicago', 'james.w@gmail.com'),
('CL009', 'DIALLO', 'Aïcha ', 29, '234 Avenue Cheikh Anta Diop', 'Dakar', 'a.diallo@gmail.com'),
('CL010', 'HOUNDJAGBE', 'Muriel', 27, 'Quartier Gbèdjromèdé', 'Abomey-Calavi', 'muriel.h@gmail.com'),
('CL011', 'TANAKA ', 'Yuki', 27, '5-10 Shibuya', 'Tokyo', 'yuki.tanaka@gmail.com'),
('CL012', 'SAGBO ', 'Hermann', 33, 'Quartier Hounzounmè', 'Kétou', 'hermann.s@gmail.com'),
('CL013', 'KONE', 'Mamadou', 31, 'Quartier du Fleuve', 'Mali', 'm.kone@gmail.com'),
('CL014', 'HAILE', 'Selam', 37, 'King George VI Street', 'Ethiopie', 'selam.h@gmail.com'),
('CL015', 'ADEYEMI', 'Funke', 41, '22 Allen Avenue', 'Lagos', 'funke.a@gmail.com'),
('CL016', 'RAKOTO', 'Fara', 29, 'Avenue de l\'Indépendance', 'Antananarivo', 'fara.rakoto@gmail.com'),
('CL017', 'SOW', 'Fatou', 24, 'Route de Koulikoro', 'Conakry', 'fatou.sow@gmail.com'),
('CL018', 'GBETO', 'Bénérice', 23, 'Camp Gbèto, Tokpota', 'Porto-Novo', 'berenice.g@gmail.com'),
('CL019', 'LOZES', 'Ulrich', 41, 'Avenue des Orangers', 'Lokossa', 'ulrich.l@gmail.com'),
('CL020', 'KASSA', 'Prisca', 28, 'Rue du Zongo', 'Natitingou', 'prisca.k@gmail.com'),
('CL021', 'AVOCANH', 'Michael', 44, 'Quartier Dékanmè', 'Pobè', 'michael.a@gmail.com'),
('CL022', 'KOSSOU', 'Fania', 33, 'Rue 121, Zogbo', 'Cotonou', 'fania.k@gmail.com'),
('CL023', 'FONNINHOU', 'Léocadie', 45, 'Quartier du Fleuve', 'Porto-Novo', 'f.leocadie@gmail.com'),
('CL024', 'GODONOU', 'Anne', 32, 'Quartier houeyiho', 'Cotonou', 'godonouanne@gmail.com'),
('CL025', 'BOKO', 'Bertin', 43, 'Centre ville', 'Parakou', 'boko_bertin@gmail.com'),
('CL026', 'SENEKPON', 'Issac', 29, 'Quartier anavié', 'Porto-Novo', 'senakpon@gmail.com'),
('CL027', 'SALAKO', 'Cyril', 29, 'Quartier anavié', 'Porto-Novo', 'salako@gmail.com'),
('CL029', 'GOROU', 'Dana', 32, 'Quartier vodjè', 'Cotonou', 'gorou@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `commande`
--

CREATE TABLE `commande` (
  `id_comm` int(11) NOT NULL,
  `date_comm` date DEFAULT NULL,
  `id_client` varchar(100) NOT NULL,
  `montant` decimal(10,2) DEFAULT NULL,
  `heure_comm` time DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `commande`
--

INSERT INTO `commande` (`id_comm`, `date_comm`, `id_client`, `montant`, `heure_comm`) VALUES
(6, '2026-05-05', 'CL008', 22887.22, NULL),
(9, '2026-05-05', 'CL012', 8220.56, '00:00:00'),
(10, '2026-05-05', 'CL005', 23161.40, '10:21:27'),
(11, '2026-05-14', 'CL023', 8084.16, '12:32:48'),
(15, '2026-06-03', 'CL029', 7046.63, '11:05:43'),
(16, '2026-06-03', 'CL022', 15299.56, '11:28:54');

-- --------------------------------------------------------

--
-- Structure de la table `contenir`
--

CREATE TABLE `contenir` (
  `id_comm` int(11) NOT NULL,
  `id_article` varchar(20) NOT NULL,
  `qte_comm` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `contenir`
--

INSERT INTO `contenir` (`id_comm`, `id_article`, `qte_comm`) VALUES
(6, 'CA300', 3),
(6, 'CH45002', 7),
(6, 'EC244001', 8),
(6, 'HP497', 8),
(6, 'NIK80', 7),
(6, 'SOXMP', 2),
(9, 'CA300', 5),
(9, 'CS330', 3),
(9, 'EC244001', 4),
(9, 'NIK55', 3),
(9, 'PY74009', 4),
(9, 'VE880011', 4),
(10, 'CAS07', 5),
(10, 'CS330', 6),
(10, 'DVD75', 6),
(10, 'EC244001', 5),
(10, 'EN55007', 5),
(10, 'HP497', 5),
(10, 'SOXMP', 2),
(11, 'DVD75', 5),
(11, 'EC244001', 4),
(11, 'PA92025', 3),
(11, 'SOXMP', 3),
(15, 'CAS07', 3),
(15, 'DVD75', 2),
(15, 'EN55007', 3),
(15, 'HP497', 3),
(15, 'LA67003', 1),
(15, 'MO99005', 4),
(15, 'NIK80', 3),
(15, 'PY74009', 3),
(15, 'SA82004', 2),
(15, 'TG21032', 3),
(16, 'CA300', 3),
(16, 'CG32008', 4),
(16, 'EC244001', 4),
(16, 'FR678', 7),
(16, 'PA92025', 5),
(16, 'SA82004', 5),
(16, 'SAX15', 6),
(16, 'TA36008', 5);

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nom` varchar(100) NOT NULL,
  `prenom` varchar(100) NOT NULL,
  `contact` varchar(30) NOT NULL,
  `login` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `nom`, `prenom`, `contact`, `login`, `password`) VALUES
(6, 'MIGNANWANDE', 'Magnificat Floriane', '0150023202', 'magniane', '$2y$10$g.w7UTcO4N2PynHO68CC1uzozimsTJIuMH26xIXaSm3UYuWm1XAoC'),
(7, 'AMADOU', 'Traoré', '70 12 45 89', 'amatraore', '$2y$10$jJRLEmKeX3D2Wz5j4WS2NuiXAr5tl6HpIKdbg3IVEDvU99s6c3v4G'),
(8, 'DUBOIS', 'Camille', '6 12 34 78', 'camille_d', '$2y$10$KOxnFeZf.6klrEzc0t8KneZ.xWnRKWP7gwzlA4GSUxtyfzRAkkb/u'),
(9, 'KUMAR', 'Priya', '98765 43210', 'priya_k', '$2y$10$ZbI89VCLlG.T5hOo7AEcBuN1z1QRZDPh.Eu/dFlSTfZ781uQ5xxaq'),
(10, 'MULLER', 'Sophia', '9 67 4564-9649', 'sophia_m', '$2y$10$HOjgSTAoF59nHQPnYkaxDOaBHlDTxdVJrSv7V6ajwfz1nNVIagiIe'),
(11, 'NDLOVU', 'Thabo', '73 456 7890', 'thabo_n', '$2y$10$ENFCWQpE25Fa2lwCM8mbguIhuLOT5Es0WX.wXIDb3KR22R1vKDoku'),
(12, 'IVANOV', 'Dimitri', '912 345 67 89', 'dimitri_i', '$2y$10$yU/0/UEri/aKMhYbRwYAAuyxlPrz4.Q86MMF7jJ6Xb3476DiGJbMK'),
(13, 'DIALLO', 'Aminata', '78 123 45 67', 'aminata_d', '$2y$10$fJ4elLNI28ZOVUM.LAJ.We9diUJ3iUjxnOqH5rPBn9DllGWoW.NIO'),
(14, 'OKAFOR', 'Chiamaka', '802 345 6789', 'chiamaka_o', '$2y$10$u3qPik5xskOHCndx6n4UAOW4Eg4gl/xGAZ9Ip14WlDyik8o7bcgty'),
(15, 'AHOUANDJINOU', 'Romaric', '01 97 56 45 34', 'romaric_a', '$2y$10$D6n4TJ27GG4jKGxDOwDCKuf.2.8js40yn57lcJQkUnbrHV.3WjSha'),
(16, 'EL MANSOURI', 'Fatima', '612 34 56 78', 'fatima_e', '$2y$10$cLj.LWrMD5pn8n52IjMlNe6zO3HJaslyaRAfofcTcGHiQ4zuCa8zu'),
(17, 'KIM', 'Joon', '10 1234 5678', 'joon_k', '$2y$10$qFje.xZSqc4MZu2ph3SdxO1qacQWQVYOoygp/5OfG2FMSG2/Vrcou'),
(18, 'ALI', 'Sara', '100 123 4567', 'sara_a', '$2y$10$66uN.hrL6cb9DLJb7noNUuC8SJEfAlrTuP96CzUM.lCjQKojRZBJG'),
(19, 'GONZÁLEZ ', 'Luis', '55 1234 5678', 'luis_g', '$2y$10$T60AOFMoMDx76NUnVL9rVeY5f.m5Qz9M0pDuYqxIvavVsrxU32ktS'),
(20, 'KOWALSKI', 'Anna', '501 234 567', 'anna_k', '$2y$10$oQ37RmBt16EkbTGtJujfZuPJD3wyjOol4dgpd3XiVww3yIinBdXKi'),
(21, 'VAN DER MERWE', 'Elsa', '81 123 4567', 'elsa_v', '$2y$10$PoEJfpYNqN3jaDmqwUPYqeHJ0qGtGgYxyLbNIbfUwbdTBwqhZQ/Km'),
(22, 'WANG', 'Li', '912 345 678', 'li_wang', '$2y$10$TL5/u1I6i1559pQo51Kt/OcHDP97hoFn/r6oel27hF6nxIMOK4OVO'),
(23, 'ZOSSOU', 'Romaric', '01 66 78 30 28', 'romaric_z', '$2y$10$/QFZP5xGCVzuUXjqVI.ii.T/TDkMh7ybA1z4K1GOPyjLvLFVNPpsO'),
(24, 'AHOYO', 'Linda', '01 90 56 43 56', 'linda_a', '$2y$10$vi/Yn8w1.RaIFNwsAejIpeRcxbxSiKXRMlppkboVwpITcecyBxl6i'),
(25, 'FONNINHOU', 'Léocadie', '01 50 02 03 02', 'leocadie_f', '$2y$10$ANsym2/5rkMg5X8GOkcNT.H1c/aiV77M1ABWdXETGpmBNbDXGv1Kq'),
(26, 'KOUHOUNOU', 'Pierre', '01 67 43 89 56', 'k_pierre', '$2y$10$dtonbkBsii0dDg2VVLcO9eDOhGMxvXEE0sPQKKbyXM5yFLl26t0KK');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id_article`);

--
-- Index pour la table `client`
--
ALTER TABLE `client`
  ADD PRIMARY KEY (`id_client`);

--
-- Index pour la table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_comm`),
  ADD KEY `fk_client_commande` (`id_client`);

--
-- Index pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD PRIMARY KEY (`id_comm`,`id_article`),
  ADD KEY `fk_article` (`id_article`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `login` (`login`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_comm` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `fk_client_commande` FOREIGN KEY (`id_client`) REFERENCES `client` (`id_client`);

--
-- Contraintes pour la table `contenir`
--
ALTER TABLE `contenir`
  ADD CONSTRAINT `contenir_ibfk_1` FOREIGN KEY (`id_comm`) REFERENCES `commande` (`id_comm`),
  ADD CONSTRAINT `fk_article` FOREIGN KEY (`id_article`) REFERENCES `article` (`id_article`),
  ADD CONSTRAINT `fk_contenir_commande` FOREIGN KEY (`id_comm`) REFERENCES `commande` (`id_comm`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
