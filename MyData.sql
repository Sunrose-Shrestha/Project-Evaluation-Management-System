-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2023 at 06:40 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dmpm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `email` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`email`, `username`, `password`) VALUES
('sunrose@gmail.com', 'sunrose', '11223344');

-- --------------------------------------------------------

--
-- Table structure for table `drc`
--

CREATE TABLE `drc` (
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `drc`
--

INSERT INTO `drc` (`username`, `password`, `email`) VALUES
('Preethi', '$2y$10$EXFN.TvlDYQXKIzNRezxbuKWB9w4HpdVrFJbUZDmKGdL1z7HUB/c.', 'preethi@cmrit.ac.in');

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `guideemail` varchar(20) NOT NULL,
  `projectid` varchar(5) NOT NULL,
  `projecttitle` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`guideemail`, `projectid`, `projecttitle`) VALUES
('', '', ''),
('navaneetha@gmail.com', 'nav03', 'abc'),
('smitha@cmrit.ac.in', 'smt01', 'Data Mining');

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `projectid` varchar(11) NOT NULL,
  `projectdescription` text NOT NULL,
  `projecttitle` varchar(1000) NOT NULL,
  `workingdays` int(11) NOT NULL,
  `guideemail` varchar(30) DEFAULT NULL,
  `guidename` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`projectid`, `projectdescription`, `projecttitle`, `workingdays`, `guideemail`, `guidename`) VALUES
('an01', 'asd', 'asc', 12, 'anil@gmail.com', 'anil'),
('nav01', 'nmhdxzgfjhsg zsmgsjfdhgsjhfdg sdjhfgsjdhgf', 'hotel booking website', 60, 'navaneetha@gmail.com', 'navaneetha'),
('nav02', 'jkugfjus jsegjyg hdghfg', 'coffee shop website', 45, 'navaneetha@gmail.com', 'navaneetha');

--
-- Triggers `project`
--
DELIMITER $$
CREATE TRIGGER `insertLog` AFTER DELETE ON `project` FOR EACH ROW INSERT INTO logs VALUES(OLD.guideemail, OLD.projectid, OLD.projecttitle)
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `username` varchar(255) NOT NULL,
  `password` varchar(200) NOT NULL,
  `email` varchar(255) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`username`, `password`, `email`, `create_at`) VALUES
('anil', '$2y$10$fS2nda7.zlc5AxNXiEBXb.ERu10AyWJ8QyZbNtAgypiDgEwM5/cJS', 'anil@gmail.com', '2023-03-09 04:43:24'),
('anjali', '$2y$10$WGhRT15lJEur2Q5nFXfDeOkRwrYbyXFChVh7dvHTAVmxxG10jc5Wm', 'anjali@gmail.com', '2022-12-22 07:58:25'),
('kartheek', '$2y$10$b1jUkakD.xTpgjU/qzVDqOZ4hBErlEVUqV3/ceccO9/AcX.v78DcG', 'kartheek@cmrit.ac.in', '2022-12-21 20:35:34'),
('navaneetha', '$2y$10$nxHkerwwTI7f9zaJRTx4yePbA8qnhgaBhqhHxXh7nNsyFIrJPPmiO', 'navaneetha@gmail.com', '2022-12-21 18:13:45'),
('Smitha', '$2y$10$paJGKRiu/bznlgQ1DIj8WOze/2uFWxGhEtBQ6upJH4guygmc.XVUm', 'smitha@cmrit.ac.in', '2023-04-29 05:53:35'),
('suneetha', '$2y$10$2LyXJqsjVYJ0cqS8uyJKxO.2mQBhh.6pRRO9Wa6BcaA9760N3Qpri', 'suneetha@cmrit.ac.in', '2022-12-21 20:40:08');

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE `student` (
  `leadname` varchar(30) NOT NULL,
  `membername` varchar(30) NOT NULL,
  `leademail` varchar(20) NOT NULL,
  `memberemail` varchar(20) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`leadname`, `membername`, `leademail`, `memberemail`, `password`) VALUES
('adam', 'eve', 'adam@gmail.com', 'eve@gmail.com', '$2y$10$jrAzcwLU2YUuqvcc1nV8oui9ixvq9OkNsRZiK/JPB58adL92YmDj.'),
('ganesh', 'gaurav', 'ganesh@gmail.com', 'gaurav@gmail.com', '$2y$10$399.n6GVOSrxUmE1wAOxc.KwVlyoz..eJ.hOVxVp4qQJ1NbqCJxGW'),
('Nitik', 'Mukesh', 'nitik@gmail.com', 'mukesh@gmail.com', '$2y$10$kxYk5eS8rxBMo8cPX0GLGeq/detMlnlcXqDowVacrMMliIe6NW5XW'),
('Sreya', 'Sunrose', 'srre19cs@cmrit.ac.in', 'sush19cs@cmrit.ac.in', '$2y$10$.RmVMUpOF.nZP2D0sha0Ge7ix5/CkYwHzljsVMJPJLDhnmSNfpnDq');

-- --------------------------------------------------------

--
-- Table structure for table `team`
--

CREATE TABLE `team` (
  `leadname` varchar(30) NOT NULL,
  `membername` varchar(30) NOT NULL,
  `leademail` varchar(30) NOT NULL,
  `memberemail` varchar(30) NOT NULL,
  `teamno` int(11) NOT NULL,
  `projectid` varchar(10) NOT NULL,
  `guidename` varchar(30) NOT NULL,
  `review1` int(11) NOT NULL,
  `review2` int(11) NOT NULL,
  `review3` int(11) NOT NULL,
  `review1date` int(11) NOT NULL,
  `review2date` int(11) NOT NULL,
  `report` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `team`
--

INSERT INTO `team` (`leadname`, `membername`, `leademail`, `memberemail`, `teamno`, `projectid`, `guidename`, `review1`, `review2`, `review3`, `review1date`, `review2date`, `report`) VALUES
('adam', 'eve', 'adam@gmail.com', 'eve@gmail.com', 3, 'nav02', 'navaneetha', 9, 9, 10, 13, 15, ''),
('ganesh', 'gaurav', 'ganesh@gmail.com', 'gaurav@gmail.com', 10, 'smt01', 'Smitha', 0, 0, 0, 0, 0, ''),
('Nitik', 'Mukesh', 'nitik@gmail.com', 'mukesh@gmail.com', 9, 'nav01', 'navaneetha', 8, 8, 8, 20, 18, ''),
('Sreya', 'Sunrose', 'srre19cs@cmrit.ac.in', 'sush19cs@cmrit.ac.in', 8, 'an01', 'anil', 9, 9, 0, 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `drc`
--
ALTER TABLE `drc`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`projectid`),
  ADD UNIQUE KEY `project_description` (`projecttitle`) USING HASH;

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`leademail`),
  ADD UNIQUE KEY `lead` (`leadname`),
  ADD UNIQUE KEY `member` (`membername`),
  ADD UNIQUE KEY `email` (`leademail`),
  ADD UNIQUE KEY `leademail` (`leademail`),
  ADD UNIQUE KEY `memberemail` (`memberemail`);

--
-- Indexes for table `team`
--
ALTER TABLE `team`
  ADD PRIMARY KEY (`leadname`),
  ADD UNIQUE KEY `lead` (`leademail`),
  ADD UNIQUE KEY `member` (`memberemail`),
  ADD UNIQUE KEY `email` (`teamno`),
  ADD UNIQUE KEY `leademail` (`teamno`),
  ADD UNIQUE KEY `projectid` (`projectid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `team`
--
ALTER TABLE `team`
  MODIFY `teamno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
