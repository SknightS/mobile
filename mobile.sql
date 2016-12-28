-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2014 at 04:13 PM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `mobile`
--

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) unsigned NOT NULL DEFAULT '0',
  `user_data` text NOT NULL,
  PRIMARY KEY (`session_id`),
  KEY `last_activity_idx` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `product_id` int(11) NOT NULL AUTO_INCREMENT,
  `product_name` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `qty` int(11) NOT NULL,
  `img_name` text NOT NULL,
  PRIMARY KEY (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `price`, `qty`, `img_name`) VALUES
(4, 'Samsung Galaxy S', 256, 12, 'titanium-grey-exchange-offer-medium_25e581e880cc0a6e063de61d2a88d3c54.jpg'),
(5, 'Samsung Jet', 54, 25, 'Sony-Ericsson-Mix-Walkman1.jpg'),
(6, 'Nokia 920', 85, 100, 'nokia-920.jpg'),
(7, 'Nokia Rajnikant', 41, 600, '3-3310.jpg'),
(8, 'Nokia Asha 301', 78, 600, 'Nokia-Asha-310.jpg'),
(9, 'Sony Erricsion w200i', 65, 200, '4efbf73e0967eSony_Ericsson_W200i_d.jpg'),
(10, 'Sony Erricsion', 65, 700, 'sony_ericsson_live_walkman_android_phone_1.png'),
(11, 'Sony Erricsion Walkman Mini', 80, 455, 'Sony-Ericsson-Mix-Walkman.jpg'),
(12, 'Sony Erricsion Pink txt', 60, 200, 'sony-ericsson-txt-pink-300x348.png'),
(13, 'Sony Erricsion Xperia', 80, 50, 'Sony-Ericsson-Xperia-arc.jpg'),
(14, 'Nokia Lumia', 70, 200, 'Nokia-Lumia-928.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `email`, `password`, `status`) VALUES
(1, 'pureheartednils@gmail.com', 'd41d8cd98f00b204e9800998ecf8427e', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
