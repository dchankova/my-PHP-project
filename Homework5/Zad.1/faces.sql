-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 03, 2011 at 07:42 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `faces`
--

-- --------------------------------------------------------

--
-- Table structure for table `mprofil`
--

CREATE TABLE IF NOT EXISTS `mprofil` (
  `nickname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `age` int(3) NOT NULL,
  `salary` int(11) NOT NULL,
  `properties` varchar(100) CHARACTER SET utf8 NOT NULL,
  `height` varchar(6) CHARACTER SET utf8 NOT NULL,
  KEY `nickname` (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mprofil`
--

INSERT INTO `mprofil` (`nickname`, `password`, `name`, `age`, `salary`, `properties`, `height`) VALUES
('admin', 'e10adc3949ba59abbe56e057f20f883e', 'admin', 15, 40, 'a:1:{i:0;s:3:"car";}', '189'),
('bogatasha', 'e10adc3949ba59abbe56e057f20f883e', 'Marin Kamburov', 98, 300000, 'a:2:{i:0;s:3:"car";i:1;s:5:"house";}', '165');

-- --------------------------------------------------------

--
-- Table structure for table `wprofil`
--

CREATE TABLE IF NOT EXISTS `wprofil` (
  `nickname` varchar(30) CHARACTER SET utf8 NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `age` int(3) NOT NULL,
  `eyes_color` varchar(20) CHARACTER SET utf8 NOT NULL,
  `hair_color` varchar(20) CHARACTER SET utf8 NOT NULL,
  `bra_size` int(5) NOT NULL,
  `weight` int(3) NOT NULL,
  `height` int(3) NOT NULL,
  PRIMARY KEY (`nickname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wprofil`
--

INSERT INTO `wprofil` (`nickname`, `password`, `name`, `age`, `eyes_color`, `hair_color`, `bra_size`, `weight`, `height`) VALUES
('adminka', 'e10adc3949ba59abbe56e057f20f883e', 'adminka', 18, 'blue', 'руса', 120, 56, 185),
('mimi', '508df4cb2f4d8f80519256258cfb975f', 'mimi', 12, 'blue', 'zelena', 123, 45, 18);
