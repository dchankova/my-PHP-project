-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 09, 2011 at 06:25 
-- Server version: 5.5.8
-- PHP Version: 5.3.5

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE IF NOT EXISTS `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `pages` int(11) NOT NULL,
  `year` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `pages`, `year`) VALUES
(1, 'Middlemarch', 904, 1872),
(2, 'The Stories of Anton Chekhov', 450, 1860),
(7, 'In Search of Lost Time', 190, 1922),
(8, 'The Great Gatsby', 218, 1925),
(9, 'Hamlet', 90, 1601),
(10, 'The Adventures of Huckleberry Finn', 366, 1884),
(11, 'Lolita', 368, 1955),
(12, 'War and Peace', 1225, 1869),
(13, 'Madame Bovary', 361, 1857),
(14, 'Anna Karenina', 864, 1877);
