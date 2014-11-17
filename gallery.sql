-- phpMyAdmin SQL Dump
-- version 4.0.4
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Sep 26, 2014 at 05:40 PM
-- Server version: 5.6.12-log
-- PHP Version: 5.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `gallery`
--
CREATE DATABASE IF NOT EXISTS `gallery` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `gallery`;

-- --------------------------------------------------------

--
-- Table structure for table `access`
--

CREATE TABLE IF NOT EXISTS `access` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(20) CHARACTER SET utf8 NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE IF NOT EXISTS `contacts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `surname` varchar(20) CHARACTER SET utf8 NOT NULL,
  `address` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(50) CHARACTER SET utf8 NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 NOT NULL,
  `skype` varchar(50) CHARACTER SET utf8 NOT NULL,
  `info` varchar(200) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `surname`, `address`, `phone`, `email`, `skype`, `info`) VALUES
(1, 'Jenya', 'Plotnikov', 'Dnipropetrovsk city, Ukraine', '(066) 590-27-62', 'plov@i.ua', 'kodis_design', 'man, 29 years old, white');

-- --------------------------------------------------------

--
-- Table structure for table `gallerys`
--

CREATE TABLE IF NOT EXISTS `gallerys` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(500) CHARACTER SET utf8 NOT NULL,
  `photo` varchar(100) CHARACTER SET utf8 NOT NULL,
  `id_page` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `gallerys`
--

INSERT INTO `gallerys` (`id`, `name`, `comment`, `photo`, `id_page`) VALUES
(1, 'Animals', 'This album to show different animals all over the world', 'deer-winter-snow-frost_82985_990x742.jpg', 0),
(2, 'Seas and Oceans', 'World Seas and Oceans in this album', 'blacktip-bluefin-twinspot-underwater_82983_990x742.jpg', 0),
(3, 'People', 'People and peoples all over the world', 'celebration-devil-dance-spain_82426_990x742.jpg', 0),
(4, 'Cities', 'Many cities and countries our planet', 'oppian-hill-nero-rome_82433_990x742.jpg', 0),
(5, 'Mountains', 'Beautiful and famous mountains', 'k2-mount-990x742.jpg', 0),
(6, 'Birds', 'Many interesting birds', 'puffins-duel-skomer-green_79775_990x742.jpg', 0),
(7, 'Flowers', 'Flowers all over the world', 'flower-macro-orange-pink_81647_990x742.jpg', 0),
(25, 'testfin', 'testfin testfintestfin', 'img0001.jpg', 0),
(34, 'dddd', 'ddddd', 'Tulips.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE IF NOT EXISTS `news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) CHARACTER SET utf8 NOT NULL,
  `text` varchar(2000) CHARACTER SET utf8 NOT NULL,
  `date` date NOT NULL,
  `show` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `name`, `text`, `date`, `show`) VALUES
(4, 'Test for develop', 'test test test test test test test test', '2014-09-05', 'yes'),
(5, 'Test for filling', 'Test for filling test for filling test for filling test for filling test for filling test for filling test for filling test for filling test for filling test for filling test for filling test for filling', '2014-09-06', 'yes'),
(3, 'Site at the development stage', 'Good day! That publication of the first news on our website and it says that the site is still under development, ie you are currently on a demo version nasheno site! Fully functional version, we''ll try to add in the near future!', '2014-09-05', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE IF NOT EXISTS `pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `show` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`id`, `name`, `show`) VALUES
(13, 'Home', 'yes'),
(14, 'News', 'yes'),
(15, 'Gallery', 'yes'),
(16, 'Contacts', 'yes');

-- --------------------------------------------------------

--
-- Table structure for table `photos`
--

CREATE TABLE IF NOT EXISTS `photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(500) CHARACTER SET utf8 NOT NULL,
  `show` varchar(10) CHARACTER SET utf8 NOT NULL,
  `picture` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_galleries` varchar(100) CHARACTER SET utf8 NOT NULL,
  `name_user` varchar(50) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumping data for table `photos`
--

INSERT INTO `photos` (`id`, `name`, `comment`, `show`, `picture`, `name_galleries`, `name_user`) VALUES
(1, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'american-crocodile-caribbean-sea_82044_990x742.jpg', 'Animals', 'admin'),
(17, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'arctic-fox-svalbard_77065_990x742.jpg', 'Animals', 'plov'),
(3, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'pacific-ocean-caroline-island_82989_990x742.jpg', 'Seas and Oceans', 'Admin'),
(4, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'blacktip-bluefin-twinspot-underwater_82983_990x742.jpg', 'Seas and Oceans', 'plov'),
(6, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'dancers-tango-prague_78164_990x742.jpg', 'People', 'Admin'),
(7, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'cricket-fog-english-channel_79788_990x742.jpg', 'People', 'Admin'),
(8, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'aerial-landscape-airplane-dubai_80187_990x742.jpg', 'Cities', 'Admin'),
(9, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'people-skyline-shanghai-china_79193_990x742.jpg', 'Cities', 'Admin'),
(10, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'k2-mount-990x742.jpg', 'Mountains', 'plov'),
(11, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'mount-fuji-cherry-blossoms_79190_990x742.jpg', 'Mountains', 'Admin'),
(12, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'owl-stretching-reserve-kuwait_79192_990x742.jpg', 'Birds', 'Admin'),
(13, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'puffins-duel-skomer-green_79775_990x742.jpg', 'Birds', 'Admin'),
(14, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua', 'yes', 'flower-macro-orange-pink_81647_990x742.jpg', 'Flowers', 'plov'),
(16, 'Lorem ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'yes', 'flower-macro-california_78166_990x742.jpg', 'Flowers', 'plov');

-- --------------------------------------------------------

--
-- Table structure for table `slider_photos`
--

CREATE TABLE IF NOT EXISTS `slider_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) CHARACTER SET utf8 NOT NULL,
  `comment` varchar(200) CHARACTER SET utf8 NOT NULL,
  `show` varchar(10) CHARACTER SET utf8 NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(20) NOT NULL,
  `surname` varchar(20) NOT NULL,
  `login` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `sex` varchar(20) NOT NULL,
  `role` varchar(20) NOT NULL,
  `question` varchar(100) NOT NULL,
  `answer` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
