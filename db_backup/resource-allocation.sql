-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 11, 2019 at 04:31 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resource-allocation`
--

-- --------------------------------------------------------

--
-- Table structure for table `server_details`
--

CREATE TABLE `server_details` (
  `id` int(11) NOT NULL,
  `server_name` varchar(150) NOT NULL,
  `server_ip` varchar(150) NOT NULL,
  `server_details` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server_details`
--

INSERT INTO `server_details` (`id`, `server_name`, `server_ip`, `server_details`) VALUES
(1, 'IBM', '10.0.125.68', 'IBM Server'),
(2, 'DELL', '10.0.126.98', 'DELL Server'),
(3, 'LENOVA', '10.23.56.98', 'Lenova Server'),
(4, 'SUPERMICRO', '10.25.69.76', 'Supermicro Server'),
(5, 'Fujitsu', '10.36.56.98', 'Fujitsu Server'),
(6, 'HP', '172.36.98.85', 'HP Server');

-- --------------------------------------------------------

--
-- Table structure for table `server_uasge_history`
--

CREATE TABLE `server_uasge_history` (
  `id` int(11) NOT NULL,
  `server_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `start_time` timestamp NULL DEFAULT NULL,
  `end_time` timestamp NULL DEFAULT NULL,
  `comments` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `server_uasge_history`
--

INSERT INTO `server_uasge_history` (`id`, `server_id`, `user_id`, `start_time`, `end_time`, `comments`) VALUES
(1, 1, 1, '2019-03-11 04:30:00', '2019-03-12 04:30:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(11) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL,
  `full_name` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `username`, `password`, `full_name`) VALUES
(1, 'siva', 'siva', 'Sivaprabu Ganesan'),
(2, 'a', 'a', 'Sivaprabu Ganesan');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `server_uasge_history`
--
ALTER TABLE `server_uasge_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `server_uasge_history`
--
ALTER TABLE `server_uasge_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
