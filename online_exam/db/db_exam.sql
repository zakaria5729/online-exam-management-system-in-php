-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 12, 2017 at 12:26 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_exam`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `adminId` int(11) NOT NULL,
  `adminUser` varchar(50) NOT NULL,
  `adminPass` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`adminId`, `adminUser`, `adminPass`) VALUES
(1, 'admin', '202cb962ac59075b964b07152d234b70');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ans`
--

CREATE TABLE `tbl_ans` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `rightAns` int(11) NOT NULL DEFAULT '0',
  `ans` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ans`
--

INSERT INTO `tbl_ans` (`id`, `quesNo`, `rightAns`, `ans`) VALUES
(25, 1, 1, 'available'),
(26, 1, 0, 'Ipsum'),
(27, 1, 0, 'established'),
(28, 1, 0, 'passages'),
(29, 2, 0, 'distracted'),
(30, 2, 1, 'reader'),
(31, 2, 0, 'Lorem'),
(32, 2, 0, 'long'),
(33, 3, 0, 'since '),
(34, 3, 1, '1500s'),
(35, 3, 0, 'dummy '),
(36, 3, 0, 'standard '),
(37, 4, 0, 'repeat '),
(38, 4, 0, 'preefined '),
(39, 4, 1, 'chunks '),
(40, 4, 0, 'necessary'),
(41, 5, 0, 'repetition'),
(42, 5, 0, 'always '),
(43, 5, 0, 'Ipsum '),
(44, 5, 1, 'therefore ');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ques`
--

CREATE TABLE `tbl_ques` (
  `id` int(11) NOT NULL,
  `quesNo` int(11) NOT NULL,
  `ques` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_ques`
--

INSERT INTO `tbl_ques` (`id`, `quesNo`, `ques`) VALUES
(7, 1, 'Are there many variations of passages of Lorem Ipsum available?'),
(8, 2, 'Is it a long established fact that a reader will be distracted?'),
(9, 3, 'Lorem Ipsum has been the industry''s standard dummy text ever since the 1500s.'),
(10, 4, 'All the Lorem Ipsum generators on the Internet tend to repeat preefined chunks as necessary?'),
(11, 5, 'he generated Lorem Ipsum is therefore always free from repetition?');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(32) NOT NULL,
  `email` varchar(255) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userId`, `name`, `username`, `password`, `email`, `status`) VALUES
(1, 'Zakaria Hossain', 'Zakaria', '202cb962ac59075b964b07152d234b70', 'zakaria@gmail.com', 0),
(3, 'Hasib Hasan', 'hasib', '202cb962ac59075b964b07152d234b70', 'hasib@gmail.com', 0),
(4, 'James Ahmed', 'James', '202cb962ac59075b964b07152d234b70', 'jamesmahmud@gmail.com', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_viva`
--

CREATE TABLE `tbl_viva` (
  `id` int(200) NOT NULL,
  `name` varchar(2000) NOT NULL,
  `email` varchar(2000) NOT NULL,
  `facebook` varchar(2000) NOT NULL,
  `skype` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_viva`
--

INSERT INTO `tbl_viva` (`id`, `name`, `email`, `facebook`, `skype`) VALUES
(1, 'Zakaria ', 'zakariahossain143@gmail.com', 'facebook.com/zakaria5729', 'skype.com/593');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`adminId`);

--
-- Indexes for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userId`);

--
-- Indexes for table `tbl_viva`
--
ALTER TABLE `tbl_viva`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `adminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_ans`
--
ALTER TABLE `tbl_ans`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `tbl_ques`
--
ALTER TABLE `tbl_ques`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_viva`
--
ALTER TABLE `tbl_viva`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
