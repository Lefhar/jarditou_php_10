-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : mar. 15 déc. 2020 à 08:38
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `jarditou`
--

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `u_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT COMMENT 'id',
  `u_nom` varchar(10) NOT NULL COMMENT 'nom',
  `u_prenom` varchar(10) NOT NULL COMMENT 'prénom',
  `u_adresse` varchar(50) DEFAULT NULL COMMENT 'adresse postal',
  `u_cp` int(5) DEFAULT NULL COMMENT 'code postal',
  `u_city` varchar(10) DEFAULT NULL COMMENT 'ville',
  `u_tel` int(10) DEFAULT NULL COMMENT 'téléphone',
  `u_sexe` enum('h','f','null') DEFAULT NULL,
  `u_mail` varchar(254) NOT NULL COMMENT 'email ',
  `u_mail_hash` varchar(255) DEFAULT NULL,
  `u_mail_confirm` int(1) NOT NULL DEFAULT '0',
  `role` int(1) NOT NULL DEFAULT '0' COMMENT 'role 0 client 1 vendeur',
  `u_password` varchar(60) NOT NULL COMMENT 'mot de passe',
  `u_hash` varchar(255) NOT NULL COMMENT 'sel',
  `u_jeton_connect` varchar(60) DEFAULT NULL COMMENT 'jeton de connexion',
  `u_d_create` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT 'date de création du compte',
  `u_d_connect` datetime DEFAULT NULL COMMENT 'date de connection',
  `u_d_test_connect` datetime DEFAULT NULL COMMENT 'date de teste de connection si échoué',
  `u_essai_connect` int(1) NOT NULL DEFAULT '0' COMMENT 'nombre essai connexion',
  `u_d_reset` datetime DEFAULT NULL COMMENT 'date de reste password',
  `u_reset_hash` char(12) DEFAULT NULL COMMENT 'hash reset  mot de passe',
  PRIMARY KEY (`u_id`),
  UNIQUE KEY `u_id` (`u_id`),
  UNIQUE KEY `u_mail` (`u_mail`)
) ENGINE=InnoDB AUTO_INCREMENT=102 DEFAULT CHARSET=utf8;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`u_id`, `u_nom`, `u_prenom`, `u_adresse`, `u_cp`, `u_city`, `u_tel`, `u_sexe`, `u_mail`, `u_mail_hash`, `u_mail_confirm`, `role`, `u_password`, `u_hash`, `u_jeton_connect`, `u_d_create`, `u_d_connect`, `u_d_test_connect`, `u_essai_connect`, `u_d_reset`, `u_reset_hash`) VALUES
(101, 'lefebvre', 'harold', '15 rue marcellin berthelot', 80000, 'amiens', 610012548, 'h', 's.lefebvre907@laposte.net', '$2y$10$Lqdkliqhm3h7s4IiNbJO4.nQA73cQ.Nld4Z5ERF9S2lDyJU9RK5Lu', 0, 0, '$2y$10$msaAM7RCGj9l3LQZ.lluuegZW4ZRQ6hO9/eVR7EFOkXCjgF3V9t0S', '03eadcd43c34a1256466f344', NULL, '2020-12-14 16:23:56', NULL, NULL, 0, NULL, NULL);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
