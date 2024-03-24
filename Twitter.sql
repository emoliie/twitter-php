-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Mar 24, 2024 at 08:59 PM
-- Server version: 5.7.39
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `Twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweet`
--

CREATE TABLE `tweet` (
  `id` int(11) NOT NULL,
  `content` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL DEFAULT '1',
  `createdAt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tweet`
--

INSERT INTO `tweet` (`id`, `content`, `user_id`, `createdAt`) VALUES
(2, 'j\'ai bien mangé', 1, '2024-03-22 12:19:48'),
(3, 'cc', 1, '2024-03-23 23:20:58'),
(4, 'bjr', 8, '2024-03-23 23:29:06'),
(6, 'hi', 10, '2024-03-23 23:40:00'),
(7, 'bonjour hi', 10, '2024-03-23 23:40:12'),
(8, 'hello', 8, '2024-03-24 16:37:51');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `createdAt` datetime DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `createdAt`) VALUES
(1, 'Emilie', 'emilie@edu.devinci.fr', 'emolie', '2024-03-20 11:08:17'),
(2, 'Mélanie', 'melanie@devinci.fr', 'melmel', '2024-03-20 11:08:17'),
(3, 'Laura', 'laura@devinci.fr', 'lauratatack', '2024-03-20 12:31:59'),
(4, 'Louise', 'louise@devinci.fr', 'louloutre', '2024-03-20 12:36:24'),
(5, 'Jacques', 'jacques@devinci.fr', 'jacouille', '2024-03-20 12:36:43'),
(8, 'tom', 'tom@devinci.fr', 'tomxie', '2024-03-23 20:50:05'),
(10, 'hugo', 'hugo@devinci.fr', 'soum', '2024-03-23 22:48:15'),
(11, 'tony', 'tony@devinci.fr', 'tonyzhang', '2024-03-23 22:53:47'),
(13, 'wingyee', 'wingyee@devinci.fr', 'wingouille', '2024-03-23 23:37:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweet`
--
ALTER TABLE `tweet`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweet`
--
ALTER TABLE `tweet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
