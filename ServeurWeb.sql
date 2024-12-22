-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : dim. 22 déc. 2024 à 12:26
-- Version du serveur : 9.1.0
-- Version de PHP : 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `serveurweb`
--

-- --------------------------------------------------------

--
-- Structure de la table `brand`
--

DROP TABLE IF EXISTS `brand`;
CREATE TABLE IF NOT EXISTS `brand` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la marque',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la marque',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `brand`
--

INSERT INTO `brand` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'TeeStyle', '2018-10-17 07:00:00', NULL),
(2, 'Shirtify', '2018-10-17 07:00:00', NULL),
(3, 'TeeTrend', '2018-10-17 07:00:00', NULL),
(4, 'TopThreads', '2018-10-17 07:00:00', NULL),
(5, 'oTeez', '2018-10-17 07:00:00', NULL),
(6, 'TeeVibes', '2018-10-17 07:00:00', NULL),
(7, 'PHPshirts', '2018-10-17 07:00:00', NULL),
(8, 'ShirtHub', '2018-10-17 07:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE IF NOT EXISTS `cart` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `product_id` int UNSIGNED NOT NULL,
  `quantity` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `category`
--

DROP TABLE IF EXISTS `category`;
CREATE TABLE IF NOT EXISTS `category` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(64) COLLATE utf8mb4_general_ci NOT NULL COMMENT 'Le nom de la catégorie',
  `subtitle` varchar(64) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `picture` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'L''URL de l''image de la catégorie (utilisée en home, par exemple)',
  `home_order` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'L''ordre d''affichage de la catégorie sur la home (0=pas affichée en home)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `category`
--

INSERT INTO `category` (`id`, `name`, `subtitle`, `picture`, `home_order`, `created_at`, `updated_at`) VALUES
(1, 'Relax', 'Pour chiller en style', 'assets/images/categories/categ1.jpg', 4, '2018-10-17 06:00:00', NULL),
(2, 'Professionnel', 'Un look au top', 'assets/images/categories/categ2.jpg', 2, '2018-10-17 06:00:00', NULL),
(3, 'Élégance', 'T-shirts chics et sobres', 'assets/images/categories/categ3.jpg', 5, '2018-10-17 06:00:00', NULL),
(4, 'Casual', 'Paré pour la sortie', 'assets/images/categories/categ4.jpg', 3, '2018-10-17 06:00:00', NULL),
(5, 'Rétro', 'Adoptez le vintage', 'assets/images/categories/categ5.jpg', 1, '2018-10-17 06:00:00', NULL),
(6, 'Plage et détente', 'T-shirts légers et stylés', 'assets/images/categories/categ6.jpg', 0, '2018-10-17 06:00:00', NULL),
(7, 'Sportif', 'Bougez avec confort', 'assets/images/categories/categ7.jpg', 0, '2018-10-17 06:00:00', NULL),
(8, 'Gaming', 'Pour les geeks', 'assets/images/categories/categ8.jpg', 0, '2018-10-17 06:00:00', NULL);

-- --------------------------------------------------------

--
-- Structure de la table `product`
--

DROP TABLE IF EXISTS `product`;
CREATE TABLE IF NOT EXISTS `product` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `description` text COLLATE utf8mb4_general_ci COMMENT 'La description du produit',
  `picture` varchar(128) COLLATE utf8mb4_general_ci DEFAULT NULL COMMENT 'L''URL de l''image du produit',
  `price` decimal(10,2) NOT NULL DEFAULT '0.00' COMMENT 'Le prix du produit',
  `rate` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'L''avis sur le produit, de 1 à 5',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT 'Le statut du produit (0=non renseignée, 1=dispo, 2=pas dispo)',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création du produit',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour du produit',
  `brand_id` int UNSIGNED NOT NULL,
  `category_id` int UNSIGNED DEFAULT NULL,
  `type_id` int UNSIGNED NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_product_brand_idx` (`brand_id`),
  KEY `fk_product_category1_idx` (`category_id`),
  KEY `fk_product_type1_idx` (`type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `product`
--

INSERT INTO `product` (`id`, `name`, `description`, `picture`, `price`, `rate`, `status`, `created_at`, `updated_at`, `brand_id`, `category_id`, `type_id`) VALUES
(1, 'Tee-shirt Kissing', 'Tee-shirt inspiré de l\'amour et de la passion. Parfait pour afficher votre côté romantique avec style et confort.', 'assets/images/produits/teeshirt1.jpg', 40.00, 4, 1, '2018-10-17 09:00:00', NULL, 2, 1, 7),
(2, 'Tee-shirt Pink Lady', 'Un tee-shirt féminin, élégant et lumineux, pour celles qui veulent apporter une touche de douceur et de sophistication à leur tenue.', 'assets/images/produits/teeshirt2.jpg', 20.00, 2, 1, '2018-10-17 09:00:00', NULL, 2, 6, 2),
(3, 'Tee-shirt Panda', 'Tee-shirt amusant avec un imprimé panda, idéal pour les amoureux des animaux. Confortable et original, il ajoute une touche de fun à vos journées.', 'assets/images/produits/teeshirt3.jpg', 50.00, 5, 1, '2018-10-17 09:00:00', NULL, 5, 1, 7),
(4, 'Tee-shirt Zombie', 'Tee-shirt avec un design de zombie, parfait pour ceux qui aiment les univers fantastiques et l\'horreur. Portez-le pour un look unique et décalé.', 'assets/images/produits/teeshirt4.jpg', 40.00, 2, 1, '2018-10-17 09:00:00', NULL, 7, 1, 7),
(5, 'Tee-shirt Minion', 'Un tee-shirt drôle et décontracté avec un imprimé de Minion. Parfait pour les fans de la culture pop et les moments de fun entre amis.', 'assets/images/produits/teeshirt5.jpg', 44.00, 3, 1, '2018-10-17 09:00:00', NULL, 6, 1, 7),
(6, 'Tee-shirt Père Noël', 'Un tee-shirt amusant pour les fêtes de fin d\'année. Affichez votre esprit de Noël avec ce design inspiré du Père Noël pour célébrer la magie des fêtes.', 'assets/images/produits/teeshirt6.jpg', 36.00, 2, 2, '2018-10-17 09:00:00', NULL, 8, 1, 7),
(7, 'Tee-shirt Sleepy', 'Un tee-shirt confortable et décontracté, parfait pour se détendre après une longue journée. Idéal pour les moments de repos et de relaxation.', 'assets/images/produits/teeshirt7.jpg', 40.00, 3, 1, '2018-10-17 09:00:00', NULL, 4, 1, 7),
(8, 'Tee-shirt Bear', 'Un tee-shirt à l\'impression d\'un ours majestueux. Idéal pour ceux qui aiment afficher leur côté sauvage et naturel avec style.', 'assets/images/produits/teeshirt8.jpg', 46.00, 4, 1, '2018-10-17 09:00:00', NULL, 5, 1, 7);

-- --------------------------------------------------------

--
-- Structure de la table `type`
--

DROP TABLE IF EXISTS `type`;
CREATE TABLE IF NOT EXISTS `type` (
  `id` int UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(50) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'La date de création de la catégorie',
  `updated_at` timestamp NULL DEFAULT NULL COMMENT 'La date de la dernière mise à jour de la catégorie',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `type`
--

INSERT INTO `type` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'T-shirts casual', '2018-10-17 08:00:00', NULL),
(2, 'T-shirts sportifs', '2018-10-17 08:00:00', NULL),
(3, 'Débardeurs', '2018-10-17 08:00:00', NULL),
(4, 'T-shirts oversize', '2018-10-17 08:00:00', NULL),
(5, 'T-shirts élégants', '2018-10-17 08:00:00', NULL),
(6, 'T-shirts à motifs', '2018-10-17 08:00:00', NULL),
(7, 'T-shirts basiques', '2018-10-17 08:00:00', NULL),
(8, 'T-shirts graphiques', '2018-10-17 08:00:00', NULL);

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
