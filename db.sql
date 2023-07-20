-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 11, 2022 at 06:19 AM
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
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `adminres`
--

CREATE TABLE `adminres` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `coldept` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `award`
--

CREATE TABLE `award` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `by` varchar(100) NOT NULL,
  `con` varchar(100) NOT NULL,
  `DR` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `bio_data`
--

CREATE TABLE `bio_data` (
  `user_id` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `department` varchar(100) NOT NULL,
  `doj` date NOT NULL,
  `noe` enum('Part Time','Full Time','','') NOT NULL,
  `dob` date NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `address` varchar(100) NOT NULL,
  `password` varchar(180) NOT NULL,
  `fname` varchar(500) NOT NULL DEFAULT 'Not Available',
  `mname` varchar(500) NOT NULL DEFAULT 'Not Available',
  `Gender` enum('Male','Female','Others') NOT NULL,
  `Marital` enum('Single','Married') NOT NULL,
  `Religion` varchar(300) NOT NULL DEFAULT current_timestamp(),
  `Nationality` enum('Indian','NRI') NOT NULL,
  `profile_pic` varchar(200) DEFAULT NULL,
  `signpic` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bio_data`
--

INSERT INTO `bio_data` (`user_id`, `name`, `designation`, `department`, `doj`, `noe`, `dob`, `uniqueid`, `email`, `phone`, `address`, `password`, `fname`, `mname`, `Gender`, `Marital`, `Religion`, `Nationality`, `profile_pic`, `signpic`) VALUES
('', 'Sai Lucky', 'DEVELOPER', 'CSE', '2021-02-12', 'Full Time', '2002-10-18', '20B81A05D3', 'Aslucky0143@gmail.com', 9542994982, 'PODILI', '123', 'NARAYANA', 'SUSILA', 'Male', 'Single', 'HINDU', 'Indian', '094158110522IMG_20201109_133512.jpg', '094158110522Signature.jpg'),
('', 'Eswar', 'STUDENT', 'CSE', '2021-01-01', 'Full Time', '2002-09-26', '20B81A05H6', 'VANKINENIESWAR@GMAIL.COM', 8247218767, 'ELURU', '123', 'RAJARAM MOHAHN RAO', 'PADMASREE', 'Male', 'Married', 'HINDU', 'Indian', '093707110522WhatsApp Image 2022-05-11 at 9.36.43 AM.jpeg', '093411110522KotiSirSign.png'),
('', 'Rohith', 'Student', 'CSE', '2021-11-11', 'Full Time', '1902-09-09', '20B81A05J2', 'yvv@gmail.com', 9381562357, 'LONDON', '123', 'SREENIVAS', 'APARNA', 'Male', 'Married', 'HINDU', 'Indian', '120947100522CRR_Logo-modified.png', '120947100522KotiSirSign.png');

-- --------------------------------------------------------

--
-- Table structure for table `coutau`
--

CREATE TABLE `coutau` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `subname` varchar(100) NOT NULL,
  `ugpg` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `coutau`
--

INSERT INTO `coutau` (`id`, `uniqueid`, `subname`, `ugpg`) VALUES
(104026100522, '', '', ''),
(104042100522, '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `educinfo`
--

CREATE TABLE `educinfo` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `qualification` varchar(100) NOT NULL,
  `institute` varchar(100) NOT NULL,
  `university` varchar(100) NOT NULL,
  `specilization` varchar(100) NOT NULL,
  `yearofpass` varchar(100) NOT NULL,
  `divclass` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `membos`
--

CREATE TABLE `membos` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `patents`
--

CREATE TABLE `patents` (
  `id` int(11) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `appnumber` varchar(100) NOT NULL,
  `date` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `title` varchar(100) NOT NULL,
  `Sponname` varchar(100) NOT NULL,
  `amt` varchar(100) NOT NULL,
  `period` varchar(100) NOT NULL,
  `onco` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `promemberships`
--

CREATE TABLE `promemberships` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `number` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `publish`
--

CREATE TABLE `publish` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `titleofpaper` varchar(100) NOT NULL,
  `nameofjournal` varchar(100) NOT NULL,
  `nation` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `monthyear` varchar(100) NOT NULL,
  `issueno` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workexp`
--

CREATE TABLE `workexp` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `nameoforg` varchar(100) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `datefrom` varchar(100) NOT NULL,
  `dateto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `workshops`
--

CREATE TABLE `workshops` (
  `id` bigint(20) NOT NULL,
  `uniqueid` varchar(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `place` varchar(100) NOT NULL,
  `datefrom` varchar(100) NOT NULL,
  `dateto` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adminres`
--
ALTER TABLE `adminres`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `award`
--
ALTER TABLE `award`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `bio_data`
--
ALTER TABLE `bio_data`
  ADD PRIMARY KEY (`uniqueid`);

--
-- Indexes for table `coutau`
--
ALTER TABLE `coutau`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `educinfo`
--
ALTER TABLE `educinfo`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `membos`
--
ALTER TABLE `membos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `patents`
--
ALTER TABLE `patents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `promemberships`
--
ALTER TABLE `promemberships`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `publish`
--
ALTER TABLE `publish`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `workexp`
--
ALTER TABLE `workexp`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);

--
-- Indexes for table `workshops`
--
ALTER TABLE `workshops`
  ADD PRIMARY KEY (`id`),
  ADD KEY `uniqueid` (`uniqueid`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
