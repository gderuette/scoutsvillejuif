-- phpMyAdmin SQL Dump
-- version 3.1.3.1
-- http://www.phpmyadmin.net
--
-- Serveur: localhost
-- Généré le : Mar 28 Juillet 2009 à 23:01
-- Version du serveur: 5.1.33
-- Version de PHP: 5.2.9-2

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

--
-- Base de données: `planningsscouts`
--

-- --------------------------------------------------------

--
-- Structure de la table `planningfarfadet`
--

CREATE TABLE IF NOT EXISTS `planningfarfadet` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `lieu` text NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `planningfarfadet`
--


-- --------------------------------------------------------

--
-- Structure de la table `planninglouveteau`
--

CREATE TABLE IF NOT EXISTS `planninglouveteau` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `lieu` text NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `planninglouveteau`
--


-- --------------------------------------------------------

--
-- Structure de la table `planningpio`
--

CREATE TABLE IF NOT EXISTS `planningpio` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `lieu` text NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `planningpio`
--


-- --------------------------------------------------------

--
-- Structure de la table `planningscout`
--

CREATE TABLE IF NOT EXISTS `planningscout` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dateDebut` date NOT NULL,
  `dateFin` date NOT NULL,
  `heureDebut` time NOT NULL,
  `heureFin` time NOT NULL,
  `lieu` text NOT NULL,
  `commentaire` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Contenu de la table `planningscout`
--

