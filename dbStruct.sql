-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2014 at 04:52 PM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `sankalp2014`
--
CREATE DATABASE IF NOT EXISTS `sankalp2014` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sankalp2014`;

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `eid` int(2) NOT NULL AUTO_INCREMENT,
  `ename` varchar(32) NOT NULL,
  `eprice` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`eid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `teamdata`
--

CREATE TABLE IF NOT EXISTS `teamdata` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) DEFAULT NULL,
  `members` varchar(65) DEFAULT NULL,
  `events` varchar(65) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL,
  `mail` varchar(32) NOT NULL,
  `mob` varchar(15) DEFAULT NULL,
  `institution` varchar(50) NOT NULL,
  `events` varchar(100) DEFAULT NULL,
  `paid` int(1) DEFAULT '0',
  `userGroups` varchar(100) DEFAULT NULL,
  `acc` int(2) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1;
