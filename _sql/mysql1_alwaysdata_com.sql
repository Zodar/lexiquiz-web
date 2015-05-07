-- phpMyAdmin SQL Dump
-- version 4.0.10.6
-- http://www.phpmyadmin.net
--
-- Host: mysql1.alwaysdata.com
-- Generation Time: Jan 23, 2015 at 01:16 PM
-- Server version: 5.1.66-0+squeeze1
-- PHP Version: 5.3.6-11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `lexiquiz_quiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `connexion`
--

CREATE TABLE IF NOT EXISTS `connexion` (
  `idUser` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `mail` varchar(200) NOT NULL,
  `mdp` varchar(200) NOT NULL,
  `pseudo` varchar(200) NOT NULL,
  PRIMARY KEY (`idUser`),
  UNIQUE KEY `idConnexion` (`idUser`),
  UNIQUE KEY `mail` (`mail`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `connexion`
--

INSERT INTO `connexion` (`idUser`, `mail`, `mdp`, `pseudo`) VALUES
(1, 'zodar@live.fr', '*819431B63BCC55C5913F4450D9E5C23D2ACFF92C', 'Zodar'),
(4, 'tmerabet@sysalia.com', '*51D6C14F5FC311A039C41460054E91B572F8D048', 'Sysalia');

-- --------------------------------------------------------

--
-- Table structure for table `progression`
--

CREATE TABLE IF NOT EXISTS `progression` (
  `idUser` bigint(20) NOT NULL,
  `idQuiz` bigint(20) NOT NULL,
  `idQuestion` bigint(20) NOT NULL,
  `level` int(3) NOT NULL,
  KEY `idUser` (`idUser`),
  KEY `idQuiz` (`idQuiz`),
  KEY `idQuestion` (`idQuestion`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `progression`
--

INSERT INTO `progression` (`idUser`, `idQuiz`, `idQuestion`, `level`) VALUES
(1, 1, 2, 3),
(1, 1, 1, 2),
(1, 1, 11, 1),
(1, 1, 12, 2),
(1, 1, 9, 2),
(1, 1, 17, 2),
(1, 1, 21, 2),
(1, 1, 20, 2),
(1, 1, 10, 3);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE IF NOT EXISTS `questions` (
  `idQuestion` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idQuiz` bigint(20) unsigned NOT NULL,
  `enonce` varchar(255) NOT NULL,
  `reponse` varchar(255) NOT NULL,
  `niveauDeConnaissance` int(1) NOT NULL,
  PRIMARY KEY (`idQuestion`),
  UNIQUE KEY `idQuestion` (`idQuestion`),
  KEY `idQuiz` (`idQuiz`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=79 ;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`idQuestion`, `idQuiz`, `enonce`, `reponse`, `niveauDeConnaissance`) VALUES
(1, 1, 'Quelle est la capitale du Brésil ?', 'Brasilia', 1),
(2, 1, 'Quelle est la capitale du Mali ?', 'Bamako', 1),
(9, 1, 'De quel pays Kinshasa est la capitale ?\r\n', 'République démocratique du Congo', 1),
(10, 1, 'Quelle est la capitale d''Andorre ?', 'Andorre-la-Vielle', 1),
(11, 1, 'De quel pays Teheran est la capitale ?\r\n', 'Iran', 1),
(12, 1, 'De quel pays Bruxelles est la capitale ?', 'Belgique', 1),
(13, 1, 'Quelle est la capitale du Panama ?', 'Panama City', 1),
(14, 1, 'Quelle est la capitale de l''Irak ?\r\n', 'Bagdad', 1),
(15, 1, 'De quel pays Vienne est la capitale ?\r\n', 'Autriche', 1),
(16, 1, 'Quelle est la capitale du Costa Rica ?', 'San Jose', 1),
(17, 1, 'Quelle est la capitale de Singapour ?', 'Singapour', 1),
(18, 1, 'Quelle est la capitale de l''Australie ?', 'Canberra', 1),
(19, 1, 'De quel pays Lima est la capitale ?\r\n', 'Pérou', 1),
(20, 1, 'Quelle est la capitale de l''Ethiopie ?', 'Addis-Abeba', 1),
(21, 1, 'Quelle est la capitale du Canada ?', 'Ottawa', 1),
(22, 1, 'De quel pays Kiev est la capitale ?\r\n', 'Ukraine', 1),
(23, 1, 'De quel pays La Valette est la capitale ?\r\n', 'Malte', 1),
(24, 1, 'Quelle est la capitale de Djibouti ?', 'Djibouti', 1),
(25, 1, 'De quel pays Santiago est la capitale ?\r\n', 'Chili', 1),
(26, 1, 'De quel pays Oslo est la capitale ?\r\n', 'Norvege', 1),
(73, 1, 'De quel pays Islamabad est la capitale ?', 'Pakistan', 1),
(78, 12, 'question véritable', 'réponse dur à trouver', 1);

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE IF NOT EXISTS `quiz` (
  `idQuiz` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `idQuizMobile` int(11) NOT NULL,
  `idUser` bigint(20) NOT NULL,
  `titre` varchar(255) NOT NULL,
  `auteur` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL,
  `dateCreation` datetime NOT NULL,
  `public` int(11) NOT NULL,
  PRIMARY KEY (`idQuiz`),
  UNIQUE KEY `idQuiz` (`idQuiz`),
  KEY `idUser` (`idUser`),
  KEY `idUser_2` (`idUser`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`idQuiz`, `idQuizMobile`, `idUser`, `titre`, `auteur`, `icon`, `dateCreation`, `public`) VALUES
(1, 0, 1, 'Géographie pour les nuls', 'Zodar', 'icones/smallShare.png', '2014-06-07 20:40:00', 1),
(12, 0, 4, 'Quiz sur la culture générale', 'Sysalia', 'icones/smallShare.png', '2014-08-17 20:31:56', 0);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `fk_idQuiz_in_questions` FOREIGN KEY (`idQuiz`) REFERENCES `quiz` (`idQuiz`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
