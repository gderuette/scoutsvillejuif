-- phpMyAdmin SQL Dump
-- version 2.11.6
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Sam 04 Octobre 2008 à 13:56
-- Version du serveur: 5.0.51
-- Version de PHP: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `scoutvillejuif_scout`
--

-- --------------------------------------------------------

--
-- Structure de la table `planning`
--

CREATE TABLE `planning` (
  `id` int(11) NOT NULL auto_increment,
  `lieu` text NOT NULL,
  `date` text NOT NULL,
  `heure` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Contenu de la table `planning`
--

INSERT INTO `planning` (`id`, `lieu`, `date`, `heure`) VALUES
(5, 'Brunoy', '5', '15H'),
(7, 'NDA', '24 Oout', '18H'),
(13, 'Brunoy', '188', '15H');

-- --------------------------------------------------------

--
-- Structure de la table `planningf`
--

CREATE TABLE `planningf` (
  `id` int(11) NOT NULL auto_increment,
  `lieu` text NOT NULL,
  `date` text NOT NULL,
  `heure` text NOT NULL,
  PRIMARY KEY  (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Contenu de la table `planningf`
--

INSERT INTO `planningf` (`id`, `lieu`, `date`, `heure`) VALUES
(5, 'Brunoy', '5', '15H'),
(7, 'Brunoy', '5', '15H'),
(13, 'Brunoy', '188', '15H'),
(14, 'Brunoy', '4', '15H');
