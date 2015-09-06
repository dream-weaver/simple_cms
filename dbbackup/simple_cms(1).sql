-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 25, 2015 at 07:04 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `simple_cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `menu`
--

CREATE TABLE IF NOT EXISTS `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_name` varchar(256) NOT NULL,
  PRIMARY KEY (`menu_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=12 ;

--
-- Dumping data for table `menu`
--

INSERT INTO `menu` (`menu_id`, `menu_name`) VALUES
(1, 'Home '),
(2, 'About Us'),
(3, 'Contact Us'),
(4, 'Portfolio'),
(5, 'Our Clients'),
(11, 'Our Mission');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `post_id` int(10) NOT NULL AUTO_INCREMENT,
  `menu_id` int(10) NOT NULL,
  `post_title` varchar(100) NOT NULL,
  `post_date` date NOT NULL,
  `post_author` varchar(100) NOT NULL,
  `post_image` text NOT NULL,
  `post_keywords` text NOT NULL,
  `post_content` varchar(1000) NOT NULL,
  PRIMARY KEY (`post_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=25 ;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `menu_id`, `post_title`, `post_date`, `post_author`, `post_image`, `post_keywords`, `post_content`) VALUES
(14, 0, 'Onion Headlines or Real Sports Stories? ', '2022-08-15', ' Laura Depta', ' ', 'Sports, Onion, Headlines, real, stories', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. \r\n\r\nISD-Indalo\r\nJodi raat dupure ghum bhange ami pashe nei, voy pabe ki? Ochena shohore, ochena kono mukh dekhe mone porbe ki?..Jokhon tomar nil raate pakhira sopno haray..notun khame purono chiti tomar thikanay..!! Olosh kono bikele ...!!..\r\n\r\nICONS-Oporanho\r\nEi mone ajo pore thaki ami ononto dube jai hotashay tumi roye jao shorgo dare amar opekkhay, shunno chokhe tomay dekha ekhono ekhane dariye eka, bohudin pore tumi vule gecho amar sottay...kotobar bhebe gesi ami prithibi valo beshe jai...tumi valo thako ghumer vetor amay aral kore...!!'),
(15, 0, 'Lorem Ipsum', '2022-08-15', 'Keri Elkins', ' ', 'Sports, Onion, Headlines, real, stories', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. '),
(16, 0, 'Lorem Ipsum using dummy text', '2022-08-15', 'Suri', ' ', 'Sports, Onion, Headlines, real, stories', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or '),
(17, 0, 'Cold was my soul', '2023-08-15', 'Cradle of Filth', ' ', 'Untold, was, pain, cold, Cradle, soul, filth, of, faced, rose', 'Cold was my soul, untold was da pain, i faced when you left me a rose in the.!!'),
(20, 0, 'Somewhere I belong', '2022-08-15', 'Linkin Park', ' ', 'somewhere, I, belong, Linkin Park', 'It starts with one thing I dont know why it doesnt even matter how hard you try keep that in mind I designed this rhyme to explain in due time, all i know'),
(22, 0, 'Cricket', '2023-08-15', 'Laura Depta', ' ', 'Yesterday', '<p><span style="font-size:14px"><span style="font-family:georgia,serif">Hello World!!!</span></span></p>\r\n\r\n<p><strong>BOLD <em>ITALIC</em></strong></p>\r\n'),
(23, 0, 'About Us', '2025-08-15', 'John Doe', ' ', 'About, us, Doe, John', '<p><strong>Dynamic Website Project with PHP and MYSQL...</strong></p>\r\n'),
(24, 11, 'About Us', '2025-08-15', 'John Doe', ' ', 'About, us, Doe, John', '<p><strong>About us in the About us page!!</strong></p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(256) NOT NULL,
  `password` varchar(256) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `password`) VALUES
(1, 'admin', 'admin123');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
