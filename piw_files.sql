-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Client: localhost
-- Généré le: Jeu 02 Mars 2017 à 20:38
-- Version du serveur: 5.6.12-log
-- Version de PHP: 5.4.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données: `piw`
--

-- --------------------------------------------------------

--
-- Structure de la table `piw_files`
--

CREATE TABLE IF NOT EXISTS `piw_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `calendrier` varchar(200) NOT NULL,
  `job` varchar(200) NOT NULL,
  `vega` varchar(200) NOT NULL,
  `nomFichier` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `piw_files`
--

INSERT INTO `piw_files` (`id`, `calendrier`, `job`, `vega`, `nomFichier`) VALUES
(1, 'LUNDI_AU_SAMEDI', 'JOB_1_UNIX', 'Vega', 'JOB_1_UNIX.doc'),
(2, 'LUNDI', 'JOB_2_NT', 'Vega', 'JOB_2_NT.pdf'),
(3, 'JEUDI', 'JOB_3_WIN7', 'Vega', 'JOB_3_WIN7.doc'),
(4, 'SAMEDI', 'JOB_4_LINUX', 'Vega', 'JOB_4_LINUX.txt');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
