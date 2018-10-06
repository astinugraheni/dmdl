-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 01, 2018 at 05:40 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmdl`
--

-- --------------------------------------------------------

--
-- Table structure for table `batch`
--

CREATE TABLE `batch` (
  `id_batch` int(11) NOT NULL,
  `batch` int(11) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `status` enum('active','inactive','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `batch`
--

INSERT INTO `batch` (`id_batch`, `batch`, `date_begin`, `date_end`, `status`) VALUES
(1, 1, '2018-01-01', '2018-06-30', 'inactive'),
(2, 2, '2018-08-01', '2018-12-31', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `division`
--

CREATE TABLE `division` (
  `id_division` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `desc` text NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `division`
--

INSERT INTO `division` (`id_division`, `name`, `desc`, `status`) VALUES
(1, 'Comunity Development', 'Comunity Development', 'active'),
(2, 'Secretary and Treasurer', '', 'active'),
(3, 'External Affair', 'Desc', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `id_event` int(11) NOT NULL,
  `event` varchar(11) NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `desc` text NOT NULL,
  `id_region` int(11) NOT NULL,
  `id_batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id_event`, `event`, `date_begin`, `date_end`, `desc`, `id_region`, `id_batch`) VALUES
(1, 'Event Test', '2018-01-10', '2018-08-10', 'event test', 1, 2),
(5, 'aa', '2018-08-01', '2018-08-31', 'aa', 1, 1),
(6, 'TEST 3', '2018-01-01', '2018-01-02', 'AAvgxfxc a', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `influencer`
--

CREATE TABLE `influencer` (
  `id_influencer` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `address` text,
  `cp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `influencer`
--

INSERT INTO `influencer` (`id_influencer`, `name`, `address`, `cp`, `email`, `desc`) VALUES
(1, 'Test Influencer', 'addsahdsa', '08635367', 'influencer@mail.com', 'ds'),
(2, 'Test 2 Inf', 'pp', '981727289', 'testinf11@mail.com', 'sdadsadsa'),
(3, 'Test 2 Influencerss', 'yahoooo', '0837527333', 'inff@mail.com', 'sss');

-- --------------------------------------------------------

--
-- Table structure for table `intern`
--

CREATE TABLE `intern` (
  `id_intern` int(11) NOT NULL,
  `name` varchar(11) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `cp` varchar(15) NOT NULL,
  `active_date` date NOT NULL,
  `status` enum('active','inactive','','') NOT NULL,
  `id_batch` int(11) NOT NULL,
  `id_region` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `intern`
--

INSERT INTO `intern` (`id_intern`, `name`, `address`, `dob`, `email`, `cp`, `active_date`, `status`, `id_batch`, `id_region`) VALUES
(1, 'Test Intern', 'test', '1990-10-10', 'test11@mail.com', '0837527333', '2018-02-01', 'active', 1, 3),
(2, 'Intern Test', 'test address address llll', '2000-10-10', 'test110@mail.com', '+6287736283156', '2018-01-01', 'active', 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `medpart`
--

CREATE TABLE `medpart` (
  `id_medpart` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text,
  `cp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `type` enum('online','tv','radio','printed') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `medpart`
--

INSERT INTO `medpart` (`id_medpart`, `name`, `address`, `cp`, `email`, `type`) VALUES
(1, 'Test Media', 'adafw', '0826346277', 'media@mail.com', 'online'),
(2, 'Test again', 'test again', '012716338', 'testafgain@mail.com', 'tv'),
(3, 'Test again', 'test again', '012716338', 'testafgain@mail.com', 'tv');

-- --------------------------------------------------------

--
-- Table structure for table `mentor`
--

CREATE TABLE `mentor` (
  `id_mentor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text,
  `cp` varchar(15) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `desc` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `region`
--

CREATE TABLE `region` (
  `id_region` int(11) NOT NULL,
  `region` varchar(100) NOT NULL,
  `desc` text,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `region`
--

INSERT INTO `region` (`id_region`, `region`, `desc`, `status`) VALUES
(1, 'Jakarta', 'a', 'active'),
(2, 'Yogyakarta', NULL, 'active'),
(3, 'Ngawi', 'Desc', 'inactive');

-- --------------------------------------------------------

--
-- Table structure for table `sponsor`
--

CREATE TABLE `sponsor` (
  `id_sponsor` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text,
  `cp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `supporting_team`
--

CREATE TABLE `supporting_team` (
  `id_st` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(100) NOT NULL,
  `cp` varchar(15) NOT NULL,
  `active_date` date NOT NULL,
  `status` enum('active','inactive','','') NOT NULL DEFAULT 'active',
  `id_division` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supporting_team`
--

INSERT INTO `supporting_team` (`id_st`, `name`, `address`, `dob`, `email`, `cp`, `active_date`, `status`, `id_division`) VALUES
(1, 'Asti Nugraheni', 'Jl Simanjuntak 419 B, Terban', '1996-08-10', 'nugraheniasti996@gmail.com', '+6287736283156', '2018-02-01', 'active', 2),
(2, 'Test 2', 'Test 2', '1990-10-10', 'test2@mail.com', '+639484637382', '2018-01-01', 'active', 2),
(3, 'Wulan', 'sdjshds', '1999-08-23', 'wulan@mail.com', '+6248349438438', '2018-01-01', 'active', 2),
(4, 'Test 3', 'test address', '1990-01-01', 'test3@mail.com', '+6287736283156', '2018-01-01', 'inactive', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `status` enum('active','inactive') NOT NULL,
  `id_user_role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `email`, `name`, `password`, `status`, `id_user_role`) VALUES
(1, 'admin@mail.com', 'Administrator', '21232f297a57a5a743894a0e4a801fc3', 'active', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `id_user_role` int(11) NOT NULL,
  `user_role` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_role`
--

INSERT INTO `user_role` (`id_user_role`, `user_role`) VALUES
(1, 'administrator');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer`
--

CREATE TABLE `volunteer` (
  `id_volunteer` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `dob` date NOT NULL,
  `email` varchar(50) NOT NULL,
  `cp` varchar(15) NOT NULL,
  `status` enum('active','inactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer`
--

INSERT INTO `volunteer` (`id_volunteer`, `name`, `address`, `dob`, `email`, `cp`, `status`) VALUES
(1, 'Test Volunteer', 'address', '1990-10-01', 'test@mail.com', '08293736', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `volunteer_event`
--

CREATE TABLE `volunteer_event` (
  `id_ve` int(11) NOT NULL,
  `id_volunteer` int(11) NOT NULL,
  `id_event` int(11) NOT NULL,
  `desc` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `volunteer_event`
--

INSERT INTO `volunteer_event` (`id_ve`, `id_volunteer`, `id_event`, `desc`) VALUES
(1, 1, 5, 'aaa');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `batch`
--
ALTER TABLE `batch`
  ADD PRIMARY KEY (`id_batch`);

--
-- Indexes for table `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_division`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`id_event`),
  ADD KEY `id_region` (`id_region`),
  ADD KEY `id_batch` (`id_batch`);

--
-- Indexes for table `influencer`
--
ALTER TABLE `influencer`
  ADD PRIMARY KEY (`id_influencer`);

--
-- Indexes for table `intern`
--
ALTER TABLE `intern`
  ADD PRIMARY KEY (`id_intern`),
  ADD KEY `id_batch` (`id_batch`),
  ADD KEY `id_region` (`id_region`);

--
-- Indexes for table `medpart`
--
ALTER TABLE `medpart`
  ADD PRIMARY KEY (`id_medpart`);

--
-- Indexes for table `mentor`
--
ALTER TABLE `mentor`
  ADD PRIMARY KEY (`id_mentor`);

--
-- Indexes for table `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id_region`);

--
-- Indexes for table `sponsor`
--
ALTER TABLE `sponsor`
  ADD PRIMARY KEY (`id_sponsor`);

--
-- Indexes for table `supporting_team`
--
ALTER TABLE `supporting_team`
  ADD PRIMARY KEY (`id_st`),
  ADD KEY `id_division` (`id_division`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_user_role` (`id_user_role`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD PRIMARY KEY (`id_user_role`);

--
-- Indexes for table `volunteer`
--
ALTER TABLE `volunteer`
  ADD PRIMARY KEY (`id_volunteer`);

--
-- Indexes for table `volunteer_event`
--
ALTER TABLE `volunteer_event`
  ADD PRIMARY KEY (`id_ve`),
  ADD KEY `id_volunteer` (`id_volunteer`),
  ADD KEY `id_event` (`id_event`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `batch`
--
ALTER TABLE `batch`
  MODIFY `id_batch` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `division`
--
ALTER TABLE `division`
  MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `id_event` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `influencer`
--
ALTER TABLE `influencer`
  MODIFY `id_influencer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `intern`
--
ALTER TABLE `intern`
  MODIFY `id_intern` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `medpart`
--
ALTER TABLE `medpart`
  MODIFY `id_medpart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `mentor`
--
ALTER TABLE `mentor`
  MODIFY `id_mentor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `region`
--
ALTER TABLE `region`
  MODIFY `id_region` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `sponsor`
--
ALTER TABLE `sponsor`
  MODIFY `id_sponsor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supporting_team`
--
ALTER TABLE `supporting_team`
  MODIFY `id_st` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `user_role`
--
ALTER TABLE `user_role`
  MODIFY `id_user_role` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `volunteer`
--
ALTER TABLE `volunteer`
  MODIFY `id_volunteer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `volunteer_event`
--
ALTER TABLE `volunteer_event`
  MODIFY `id_ve` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `event_ibfk_1` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `event_ibfk_2` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`);

--
-- Constraints for table `intern`
--
ALTER TABLE `intern`
  ADD CONSTRAINT `intern_ibfk_1` FOREIGN KEY (`id_batch`) REFERENCES `batch` (`id_batch`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `intern_ibfk_2` FOREIGN KEY (`id_region`) REFERENCES `region` (`id_region`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supporting_team`
--
ALTER TABLE `supporting_team`
  ADD CONSTRAINT `supporting_team_ibfk_1` FOREIGN KEY (`id_division`) REFERENCES `division` (`id_division`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user_role`) REFERENCES `user_role` (`id_user_role`);

--
-- Constraints for table `volunteer_event`
--
ALTER TABLE `volunteer_event`
  ADD CONSTRAINT `volunteer_event_ibfk_1` FOREIGN KEY (`id_volunteer`) REFERENCES `volunteer` (`id_volunteer`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `volunteer_event_ibfk_2` FOREIGN KEY (`id_event`) REFERENCES `event` (`id_event`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
