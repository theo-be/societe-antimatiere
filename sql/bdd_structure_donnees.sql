-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 10, 2024 at 04:26 PM
-- Server version: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- PHP Version: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `antimaterDimension`
--
CREATE DATABASE IF NOT EXISTS `antimaterDimension` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `antimaterDimension`;

-- --------------------------------------------------------

--
-- Table structure for table `categorie`
--

CREATE TABLE `categorie` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categorie`
--

INSERT INTO `categorie` (`id`, `nom`) VALUES
(1, 'Celestial'),
(2, 'Glyph'),
(3, 'Succes');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `code_client` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `prenom` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `genre` varchar(6) DEFAULT NULL,
  `metier` varchar(30) DEFAULT NULL,
  `date_de_naissance` date DEFAULT NULL,
  `date_de_contact` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`code_client`, `nom`, `prenom`, `email`, `genre`, `metier`, `date_de_naissance`, `date_de_contact`) VALUES
(1, 'a', 'a', 'abcd@abcd.bde', 'Femme', NULL, NULL, NULL),
(2, 'a', 'a', 'abcd@abcd.bde', 'Femme', NULL, NULL, NULL),
(3, 'a', 'a', 'abcd@abcd.bde', 'Femme', NULL, NULL, NULL),
(4, 'a', 'a', 'abcd@abcd.bde', 'Femme', 'Ens', NULL, NULL),
(5, 'a', 'a', 'abcd@abcd.bde', 'Femme', 'Ens', NULL, '2024-04-09'),
(6, 'a', 'a', 'abcd@abcd.bde', 'Femme', 'Ens', NULL, '2024-04-09'),
(7, 'a', 'a', 'abcd@abcd.bde', 'Femme', 'Ens', NULL, '2024-04-09'),
(8, 'a', 'a', 'abcd@abcd.bde', 'Femme', 'Ens', NULL, '2024-04-09'),
(9, 'a', 'a', 'abcd@abcd.bde', 'Femme', 'Ens', NULL, '2024-04-10');

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `code_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite_commande` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) DEFAULT NULL,
  `mdp` varchar(100) DEFAULT NULL,
  `code_client` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `compte`
--

INSERT INTO `compte` (`id`, `pseudo`, `mdp`, `code_client`) VALUES
(1, 'a', '$2y$10$6kVJY47fBKd4fj4GcpgfseV9236Ot3MCmjedKK3jW46CbF8delf6O', NULL),
(2, 'moi', '$2y$10$.oXg7M3kYqMeYQGJsyhQJ./r2xaSpCs893.WqSQj6OwQwBk7Y3GoK', NULL),
(3, 'b', '$2y$10$RbHOrzjhynWAhh9XFmuazOPOoj/k8ldalSeqsrLaiNZMZRaLzQMYS', NULL),
(4, 'c', '$2y$10$U3bPq.lMhvV9/MuiSPCj9e7A4HhCgkGgzoSst383TDsav2IJkPmeG', NULL),
(5, 'd', '$2y$10$JJ1LswnrsDVVabLyxE2VYehgkG3uACFfc0/HQmyxvDBU5MewNurmq', NULL),
(6, 'e', '$2y$10$yIGNJh18I.8ok9C6JdUSlufr4kjPGOsW1yROEtzMI5dwaX3SyAvrm', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `produit`
--

CREATE TABLE `produit` (
  `id` int(11) NOT NULL,
  `nom` varchar(30) DEFAULT NULL,
  `quantite_en_stock` int(11) DEFAULT NULL,
  `id_categorie` int(11) DEFAULT NULL,
  `photo` varchar(50) DEFAULT NULL,
  `text_description` varchar(200) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `quantite_en_stock`, `id_categorie`, `photo`, `text_description`, `prix`) VALUES
(1, 'Teresa', 10, 1, 'cel_teresa.png', 'Teresa, celestial des realités', 1),
(2, 'Effarig', 10, 1, 'cel_effarig.png', 'Effarig, celestial des anciennes reliques', 1),
(3, 'Anonyme', 10, 1, 'cel_anonyme.png', 'L\'anonyme, celestial des prisoniers', 1),
(4, 'V', 10, 1, 'cel_v.png', 'V, celestial des succes', 1),
(5, 'Ra', 10, 1, 'cel_ra.png', 'Ra, celestial de l\'oublie', 1),
(6, 'Lai\'tela', 10, 1, 'cel_laitela.png', 'Lai\'tela, celestial de l\'antimatiere', 1),
(7, 'Glyphe de puissance', 10, 2, 'glyphe_puissance.png', 'Amplifie la puissance des dimensions d\'antimatiere', 1),
(8, 'Glyphe de l\'infini', 10, 2, 'glyphe_infinite.png', 'Amplifie la puissance des dimensions d\'infinité', 1),
(9, 'Glyphe de temps', 10, 2, 'glyphe_temps.png', 'Amplifie la puissance des dimensions temporelles', 1),
(10, 'Glyphe de replication', 10, 2, 'glyphe_replication.png', 'Amplification des reproduction des replicantis', 1),
(11, 'Glyphe de dilatation', 10, 2, 'glyphe_dilatation.png', 'Amplifie la puissance des dimensions d\'antimatiere lors de la dilatation', 1),
(12, 'Glyphe d\'Effarig', 10, 2, 'glyphe_effarig.png', 'Amplifie les effets des reliques', 1),
(13, 'Glyphe de la realite', 10, 2, 'glyphe_realite.png', 'Amplifie les bonus de la réalité', 1),
(14, 'Fake News', 10, 3, 'succes_news.png', 'Description', 1),
(15, 'Eternité', 10, 3, 'succes_eternite.png', 'Description', 1),
(16, 'Ticket McDo', 10, 3, 'succes_mcdo.png', 'Description', 1),
(17, 'Sacrifice', 10, 3, 'succes_sacrifice.png', 'Description', 1),
(18, 'Yo dawg', 10, 3, 'succes_yodawg.png', 'Description', 1),
(19, 'Pelle', 10, 1, 'cel_pelle.png', 'Description pelle', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorie`
--
ALTER TABLE `categorie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`code_client`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`code_client`,`id_produit`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`),
  ADD KEY `code_client` (`code_client`);

--
-- Indexes for table `produit`
--
ALTER TABLE `produit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_categorie` (`id_categorie`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `code_client` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`code_client`) REFERENCES `clients` (`code_client`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Constraints for table `compte`
--
ALTER TABLE `compte`
  ADD CONSTRAINT `compte_ibfk_1` FOREIGN KEY (`code_client`) REFERENCES `clients` (`code_client`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
