-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 27, 2021 at 06:00 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project9`
--

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `messageid` int(7) NOT NULL,
  `roomid` int(4) NOT NULL,
  `message` varchar(1000) NOT NULL,
  `ismedia` tinyint(1) NOT NULL DEFAULT 0,
  `media` varchar(15) NOT NULL,
  `dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`messageid`, `roomid`, `message`, `ismedia`, `media`, `dt`) VALUES
(1, 1, 'WELCOME TO AVENGERS 1 GROUP', 0, '', '2021-11-21 15:27:03'),
(2, 1, 'THIS GROUP IS CREATED BY IRON MAN', 0, '', '2021-11-21 10:57:56'),
(3, 2, 'WELCOM TO AVENGERS 2 GROUP', 0, '', '2021-11-21 10:58:59'),
(4, 3, 'Welcome', 0, '', '2021-11-27 07:24:52'),
(5, 1, 'hello see this png', 1, 'upload/5.png', '2021-11-27 08:22:11'),
(6, 1, 'see this too', 1, 'upload/6.jpg', '2021-11-27 08:25:51'),
(7, 1, 'hello', 1, 'upload/7.jpg', '2021-11-27 12:21:53'),
(8, 1, 'this is silly message', 1, 'upload/8.', '2021-11-27 12:23:16'),
(9, 1, 'this one more silly message. ', 1, 'upload/9.', '2021-11-27 12:29:36');

-- --------------------------------------------------------

--
-- Table structure for table `participant`
--

CREATE TABLE `participant` (
  `roomid` int(4) NOT NULL,
  `userid` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `participant`
--

INSERT INTO `participant` (`roomid`, `userid`) VALUES
(1, 1),
(2, 1),
(2, 2),
(3, 2),
(4, 3),
(4, 2),
(1, 2),
(1, 3);

-- --------------------------------------------------------

--
-- Table structure for table `room`
--

CREATE TABLE `room` (
  `roomid` int(4) NOT NULL,
  `adminid` int(4) NOT NULL,
  `name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `room`
--

INSERT INTO `room` (`roomid`, `adminid`, `name`) VALUES
(1, 1, 'avenger1'),
(2, 2, 'avenger2'),
(3, 2, 'avengers3'),
(4, 3, 'avenger3');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userid` int(4) NOT NULL,
  `email` varchar(70) NOT NULL,
  `name` varchar(25) NOT NULL,
  `pass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userid`, `email`, `name`, `pass`) VALUES
(1, 'ironman@avenger.com', 'ironman', '1a1dc91c907325c69271ddf0c944bc72'),
(2, 'thor@avenger.com', 'thor', '1a1dc91c907325c69271ddf0c944bc72'),
(3, 'drstrange@avenger.com', 'drstrange', '1a1dc91c907325c69271ddf0c944bc72'),
(9, 'hulk@avenger.com', 'hulk', '1a1dc91c907325c69271ddf0c944bc72');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`);

--
-- Indexes for table `room`
--
ALTER TABLE `room`
  ADD UNIQUE KEY `roomid` (`roomid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userid`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userid` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
