-- phpMyAdmin SQL Dump
-- version 4.4.10
-- http://www.phpmyadmin.net
--
-- Host: localhost:8889
-- Generation Time: Jan 19, 2017 at 04:29 PM
-- Server version: 5.6.25
-- PHP Version: 7.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `improvements`
--

-- --------------------------------------------------------

--
-- Table structure for table `content`
--

CREATE TABLE `content` (
  `improv_id` int(11) NOT NULL,
  `improv_content` text NOT NULL,
  `improv_team` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `content`
--

INSERT INTO `content` (`improv_id`, `improv_content`, `improv_team`) VALUES
(11, 'Improvement from best team ever', 'Team Jedi'),
(12, 'dds', 'Team Jedi'),
(13, 'sdas', 'Team Guardians'),
(14, 'sadas', 'Team Ponies'),
(15, 'fdsfsdf', 'Team Ponies'),
(16, 'jedion', 'Team Jedi'),
(17, 'piraton', 'Pink Pirates'),
(18, 'xx', 'Team Guardians'),
(19, 'yek', 'Team Jedi'),
(20, 'dsadsad', 'Team Guardians'),
(21, 'zc', 'Pink Pirates'),
(22, 'dsds', 'Pink Pirates'),
(23, 'adsad', 'Pink Pirates');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `content`
--
ALTER TABLE `content`
  ADD UNIQUE KEY `improv_id` (`improv_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `content`
--
ALTER TABLE `content`
  MODIFY `improv_id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=24;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
