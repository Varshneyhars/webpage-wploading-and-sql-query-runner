-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 07, 2022 at 05:22 AM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.4.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `harshit`
--

-- --------------------------------------------------------

--
-- Table structure for table `profile`
--

DROP TABLE IF EXISTS `profile`;
CREATE TABLE IF NOT EXISTS `profile` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `middle_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `dob` date NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `profile`
--

INSERT INTO `profile` (`id`, `username`, `first_name`, `middle_name`, `last_name`, `dob`) VALUES
(4, 'admin', 'Harshit', '', 'Varsheny', '2003-11-12'),
(5, 'harshit', 'harsh', 'vardhan', 'tandon', '2022-04-12'),
(6, 'tanuj', 'tanuj', '', 'jain', '2000-12-23'),
(7, 'amul', 'amul', ' ', 'agrawal', '2000-12-11');

-- --------------------------------------------------------

--
-- Table structure for table `uploads`
--

DROP TABLE IF EXISTS `uploads`;
CREATE TABLE IF NOT EXISTS `uploads` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `filename` varchar(255) NOT NULL,
  `newfilename` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `uploads`
--

INSERT INTO `uploads` (`id`, `filename`, `newfilename`, `username`) VALUES
(11, 'data.txt', 'f0efd7b6090375ff0713afffd33fbd47.txt', 'admin'),
(12, 'form.php', 'e13c9db7d9336035474744d79d98d837.php', 'admin'),
(13, 'mpl-logo.png', '1b90f45de79c485a6b3bd494cf3375e0.png', 'admin'),
(14, 'data.txt', 'b9d65f490a4fb91eec54536b30e78a82.txt', 'admin'),
(15, 'wlogo (2).png', '9ab8f7b466c512e05821448cd7091a00.png', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `access_level` varchar(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `access_level`) VALUES
(1, 'admin', '8878', 'user'),
(2, 'harshit', '8878', 'user'),
(4, 'harsh', '12345', 'admin'),
(6, 'amul', '12345', 'admin'),
(8, 'tanuj', '8878', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `profile`
--
ALTER TABLE `profile`
  ADD CONSTRAINT `username` FOREIGN KEY (`username`) REFERENCES `users` (`username`);

--
-- Constraints for table `uploads`
--
ALTER TABLE `uploads`
  ADD CONSTRAINT `userna` FOREIGN KEY (`username`) REFERENCES `users` (`username`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
