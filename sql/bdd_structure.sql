-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 26, 2024 at 07:06 PM
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
(2, 'Glyphe'),
(3, 'Sticker');

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
  `date_de_contact` date DEFAULT current_timestamp(),
  `sujet` varchar(30) DEFAULT NULL,
  `contenu` varchar(30) DEFAULT NULL,
  `id_compte` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `commande`
--

CREATE TABLE `commande` (
  `id_commande` int(11) NOT NULL,
  `code_client` int(11) NOT NULL,
  `id_produit` int(11) NOT NULL,
  `quantite_commande` int(11) DEFAULT NULL,
  `date_commande` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `compte`
--

CREATE TABLE `compte` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(30) NOT NULL,
  `mdp` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
  `prix` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produit`
--

INSERT INTO `produit` (`id`, `nom`, `quantite_en_stock`, `id_categorie`, `photo`, `text_description`, `prix`) VALUES
(1, 'Teresa', 64, 1, 'cel_teresa.png', 'Teresa, célestial de la realité', 9325),
(2, 'Effarig', 27, 1, 'cel_effarig.png', 'Effarig, célestial des anciennes reliques', 12751),
(3, 'L\'Anonyme', 97, 1, 'cel_anonyme.png', 'L\'anonyme, célestial des prisonniers', 18659),
(4, 'V', 82, 1, 'cel_v.png', 'V, célestial des succès', 26458),
(5, 'Ra', 10, 1, 'cel_ra.png', 'Ra, célestial de l\'oublié', 43239),
(6, 'Lai\'tela', 34, 1, 'cel_laitela.png', 'Lai\'tela, célestial de l\'antimatière', 74165),
(7, 'Glyphe de puissance', 30, 2, 'glyphe_puissance.png', 'Amplifie la puissance des dimensions d\'antimatière', 99999),
(8, 'Glyphe d\'infinité', 24, 2, 'glyphe_infinite.png', 'Amplifie la puissance des dimensions d\'infinité', 159630),
(9, 'Glyphe de temps', 16, 2, 'glyphe_temps.png', 'Amplifie la puissance des dimensions temporelles', 368954),
(10, 'Glyphe de réplication', 9, 2, 'glyphe_replication.png', 'Amplifie l\'efficacité de la reproduction des réplicantis', 845623),
(11, 'Glyphe de dilatation', 41, 2, 'glyphe_dilatation.png', 'Amplifie la puissance des dimensions d\'antimatière lors de la dilatation du temps', 70027),
(12, 'Glyphe d\'Effarig', 2, 2, 'glyphe_effarig.png', 'Amplifie les effets des reliques', 9657330),
(13, 'Glyphe de la réalité', 4, 2, 'glyphe_realite.png', 'Amplifie les bonus de la réalité', 2328470),
(14, 'Fake News', 153, 3, 'succes_news.png', 'Il ne faut pas croire tout ce qu\'on vous raconte.', 17),
(15, 'Eternité', 167, 3, 'succes_eternite.png', 'L\'attente est si longue, mais le temps passe tellement vite.', 17),
(16, 'Ticket McDo', 225, 3, 'succes_mcdo.png', 'En achetant le sticker, tentez votre chance afin d\'avoir un coupon d\'accès gratuit à Mc Donald\'s.', 17),
(17, 'Sacrifice', 61, 3, 'succes_sacrifice.png', 'Un sacrifice peut résoudre bien des problèmes.', 17),
(18, 'Yo dawg', 128, 3, 'succes_yodawg.png', 'Ce n\'est pas parce que les autres vous regardent étrangement que vous êtes le moins intelligent.', 17),
(19, 'Pelle', 7, 1, 'cel_pelle.png', 'Description pelle', 270200);

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
  ADD PRIMARY KEY (`code_client`),
  ADD KEY `id_compte` (`id_compte`);

--
-- Indexes for table `commande`
--
ALTER TABLE `commande`
  ADD PRIMARY KEY (`id_commande`),
  ADD KEY `code_client` (`code_client`),
  ADD KEY `id_produit` (`id_produit`);

--
-- Indexes for table `compte`
--
ALTER TABLE `compte`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `pseudo` (`pseudo`);

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
  MODIFY `code_client` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `commande`
--
ALTER TABLE `commande`
  MODIFY `id_commande` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `compte`
--
ALTER TABLE `compte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `clients`
--
ALTER TABLE `clients`
  ADD CONSTRAINT `clients_ibfk_1` FOREIGN KEY (`id_compte`) REFERENCES `compte` (`id`);

--
-- Constraints for table `commande`
--
ALTER TABLE `commande`
  ADD CONSTRAINT `commande_ibfk_1` FOREIGN KEY (`code_client`) REFERENCES `clients` (`code_client`),
  ADD CONSTRAINT `commande_ibfk_2` FOREIGN KEY (`id_produit`) REFERENCES `produit` (`id`);

--
-- Constraints for table `produit`
--
ALTER TABLE `produit`
  ADD CONSTRAINT `produit_ibfk_1` FOREIGN KEY (`id_categorie`) REFERENCES `categorie` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
