-- phpMyAdmin SQL Dump
-- version 3.3.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 10, 2011 at 09:23 
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
(1, 'Middlemarch', 904, 1882),
(2, 'The Stories of Anton Chekhov', 450, 1870),
(7, 'In Search of Lost Time', 190, 1932),
(8, 'The Great Gatsby', 218, 1935),
(10, 'The Adventures of Huckleberry Finn', 366, 1894),
(11, 'Lolita', 368, 1965),
(12, 'War and Peace', 1225, 1879),
(13, 'Madame Bovary', 361, 1867),
(14, 'Anna Karenina', 864, 1887);

-- --------------------------------------------------------

--
-- Table structure for table `friends`
--

CREATE TABLE IF NOT EXISTS `friends` (
  `fr_id` int(11) NOT NULL AUTO_INCREMENT,
  `fr_name` varchar(255) NOT NULL,
  PRIMARY KEY (`fr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `friends`
--

INSERT INTO `friends` (`fr_id`, `fr_name`) VALUES
(1, 'Diana'),
(2, 'Nikolay'),
(3, 'Nadya'),
(4, 'Hristo'),
(5, 'Maria');

-- --------------------------------------------------------

--
-- Table structure for table `lent_book`
--

CREATE TABLE IF NOT EXISTS `lent_book` (
  `B_Id` int(11) DEFAULT NULL,
  `F_Id` int(11) DEFAULT NULL,
  KEY `B_Id` (`B_Id`),
  KEY `F_Id` (`F_Id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lent_book`
--

INSERT INTO `lent_book` (`B_Id`, `F_Id`) VALUES
(12, 4),
(11, 2),
(13, 2),
(14, 2),
(10, 3),
(10, 4),
(11, 5);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `lent_book`
--
ALTER TABLE `lent_book`
  ADD CONSTRAINT `lent_book_ibfk_2` FOREIGN KEY (`F_Id`) REFERENCES `friends` (`fr_id`),
  ADD CONSTRAINT `lent_book_ibfk_1` FOREIGN KEY (`B_Id`) REFERENCES `books` (`id`);
