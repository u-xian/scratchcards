-- phpMyAdmin SQL Dump
-- version 3.5.3
-- http://www.phpmyadmin.net
--
-- Host: 10.138.80.31
-- Generation Time: May 16, 2014 at 03:36 PM
-- Server version: 5.1.41-log
-- PHP Version: 5.3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `scratchcards`
--

-- --------------------------------------------------------

--
-- Table structure for table `activationno`
--

CREATE TABLE IF NOT EXISTS `activationno` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `actno` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `dealerid` int(50) NOT NULL,
  `confirmation` tinyint(1) NOT NULL,
  `finconfirm` tinyint(1) NOT NULL,
  `billingconfirm` tinyint(1) NOT NULL,
  `creation_date` date DEFAULT NULL,
  `creation_time` time NOT NULL,
  `activation_date` date DEFAULT NULL,
  `activation_time` time NOT NULL,
  `hiacreated` tinyint(1) NOT NULL,
  `othername` varchar(50) NOT NULL,
  `userid` int(50) NOT NULL,
  PRIMARY KEY (`id`,`actno`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5174 ;

-- --------------------------------------------------------

--
-- Table structure for table `activ_check_tmp`
--

CREATE TABLE IF NOT EXISTS `activ_check_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `check_query` text NOT NULL,
  `activid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `cardsrequest1`
--

CREATE TABLE IF NOT EXISTS `cardsrequest1` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `creation_date` date NOT NULL,
  `activation_date` date NOT NULL,
  `batch` varchar(6) DEFAULT NULL,
  `start_serialnumber` varchar(6) DEFAULT NULL,
  `end_serialnumber` varchar(6) NOT NULL,
  `pins` varchar(50) NOT NULL,
  `cards` varchar(50) NOT NULL,
  `dealer_id` int(50) NOT NULL,
  `denom_id` int(50) NOT NULL,
  `act_id` int(50) NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14618 ;

-- --------------------------------------------------------

--
-- Table structure for table `check_tmp`
--

CREATE TABLE IF NOT EXISTS `check_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `batch` int(50) NOT NULL,
  `serialnumber` int(50) NOT NULL,
  `activid` int(50) NOT NULL,
  `sn_status` varchar(50) NOT NULL,
  `ship_date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sn_status` (`sn_status`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3751 ;

-- --------------------------------------------------------

--
-- Table structure for table `dealers`
--

CREATE TABLE IF NOT EXISTS `dealers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `dealername` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=32 ;

-- --------------------------------------------------------

--
-- Table structure for table `denomination`
--

CREATE TABLE IF NOT EXISTS `denomination` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `label` varchar(50) NOT NULL,
  `pinspercard` smallint(5) NOT NULL,
  `pinsvalue` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `hia_tmp`
--

CREATE TABLE IF NOT EXISTS `hia_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `hias` text NOT NULL,
  `activid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `logins`
--

CREATE TABLE IF NOT EXISTS `logins` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `loginname` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profil` smallint(50) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `location` varchar(50) NOT NULL,
  `exp_date` date DEFAULT NULL,
  `user_id` smallint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=27 ;

-- --------------------------------------------------------

--
-- Table structure for table `mail_receivers`
--

CREATE TABLE IF NOT EXISTS `mail_receivers` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `mail_receivers_test`
--

CREATE TABLE IF NOT EXISTS `mail_receivers_test` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE IF NOT EXISTS `profiles` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `profilename` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

-- --------------------------------------------------------

--
-- Table structure for table `profiles_axs`
--

CREATE TABLE IF NOT EXISTS `profiles_axs` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `profil` smallint(50) NOT NULL,
  `function` smallint(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

-- --------------------------------------------------------

--
-- Table structure for table `profil_menu`
--

CREATE TABLE IF NOT EXISTS `profil_menu` (
  `id` smallint(50) NOT NULL AUTO_INCREMENT,
  `menuname` varchar(50) NOT NULL,
  `menucode` varchar(50) NOT NULL,
  `pathname` varchar(50) DEFAULT NULL,
  `description` text NOT NULL,
  `status` tinyint(1) NOT NULL,
  `profile_type` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `names` varchar(50) NOT NULL,
  `function` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=22 ;

-- --------------------------------------------------------

--
-- Table structure for table `xml_tmp`
--

CREATE TABLE IF NOT EXISTS `xml_tmp` (
  `id` int(50) NOT NULL AUTO_INCREMENT,
  `contents` text NOT NULL,
  `activid` int(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7501 ;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
