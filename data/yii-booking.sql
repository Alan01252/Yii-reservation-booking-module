-- phpMyAdmin SQL Dump
-- version 3.4.11.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 02, 2012 at 03:56 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.6-2~precise+1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `openbooking`
--

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE IF NOT EXISTS `reservation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` bigint(20) NOT NULL,
  `datefrom` date NOT NULL,
  `numberofnights` smallint(6) NOT NULL,
  `dateto` date NOT NULL,
  `onlinepayment` int(11) NOT NULL,
  `confirmreservation` int(11) NOT NULL,
  `roomsavailable` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `reservationdetails`
--

CREATE TABLE IF NOT EXISTS `reservationdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reservationid` int(11) NOT NULL,
  `title` varchar(3) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `contactnumber` varchar(20) NOT NULL,
  `emailaddress` varchar(255) NOT NULL,
  `postaddress` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `otherinfo` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `reservationid` (`reservationid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roomcharge`
--

CREATE TABLE IF NOT EXISTS `roomcharge` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roomid` (`roomid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roomdetails`
--

CREATE TABLE IF NOT EXISTS `roomdetails` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `roomid` int(11) NOT NULL,
  `description` varchar(128) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `roomid` (`roomid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `roomtype`
--

CREATE TABLE IF NOT EXISTS `roomtype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `description` varchar(128) NOT NULL,
  `quantity` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=357 ;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `reservationdetails`
--
ALTER TABLE `reservationdetails`
  ADD CONSTRAINT `reservationdetails_ibfk_3` FOREIGN KEY (`reservationid`) REFERENCES `reservation` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roomcharge`
--
ALTER TABLE `roomcharge`
  ADD CONSTRAINT `roomcharge_ibfk_1` FOREIGN KEY (`roomid`) REFERENCES `roomtype` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `roomdetails`
--
ALTER TABLE `roomdetails`
  ADD CONSTRAINT `roomdetails_ibfk_1` FOREIGN KEY (`roomid`) REFERENCES `roomtype` (`id`) ON DELETE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
