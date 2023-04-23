-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2023 at 10:10 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `elitmus`
--

-- --------------------------------------------------------

--
-- Table structure for table `ans`
--

CREATE TABLE `ans` (
  `s.no.` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `a1` int(1) NOT NULL,
  `a2` int(1) NOT NULL,
  `a3` int(1) NOT NULL,
  `a4` int(1) NOT NULL,
  `a5` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ans`
--

INSERT INTO `ans` (`s.no.`, `user`, `a1`, `a2`, `a3`, `a4`, `a5`) VALUES
(1, 'yash', 1, 1, 1, 0, 0),
(2, 'yash', 1, 1, 1, 1, 1),
(3, 'yash', 1, 1, 1, 1, 1),
(4, 'yash', 0, 1, 1, 1, 1),
(5, 'yash', 1, 1, 1, 1, 1),
(6, 'yash', 1, 1, 1, 1, 1),
(7, 'yash', 1, 1, 1, 1, 1),
(8, 'yash', 1, 1, 1, 1, 1),
(9, 'yash', 1, 1, 1, 1, 0),
(10, 'yash', 1, 1, 1, 1, 1),
(11, 'yash', 1, 1, 1, 0, 1),
(12, 'yash', 1, 0, 1, 1, 1),
(13, 'yash', 1, 1, 1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `s.no.` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date & time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`s.no.`, `username`, `email`, `password`, `date & time`) VALUES
(10, 'yash', 'yashdevesh10@gmail.com', '$2y$10$diAiTnlcJhpJYDWx4jV9DOuYmKfoUUiMLFpjrtrxx16ME5EMSnhEe', '2023-04-20 16:16:16'),
(11, 'admin', 'yashpandey@gmail.com', '$2y$10$c6db87qT6OXwN4Q4P2FtnOl9D7UvWOKfh2g7DJKWhK674LGttiAPa', '2023-04-20 16:26:55'),
(12, 'Glenn', 'abcd@gmail.com', '$2y$10$nNBHNvEvRM4v6HxGw12b2esxsk9pdw3XBd9yb1tcDNNBkBUwRNRBK', '2023-04-23 01:01:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ans`
--
ALTER TABLE `ans`
  ADD PRIMARY KEY (`s.no.`);

--
-- Indexes for table `signup`
--
ALTER TABLE `signup`
  ADD PRIMARY KEY (`s.no.`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ans`
--
ALTER TABLE `ans`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `signup`
--
ALTER TABLE `signup`
  MODIFY `s.no.` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
