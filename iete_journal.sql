-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 09, 2020 at 09:50 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.39

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `iete_journal`
--

-- --------------------------------------------------------

--
-- Table structure for table `editor_allocation`
--

CREATE TABLE `editor_allocation` (
  `editor_id` int(11) DEFAULT NULL,
  `reviewer_id` int(11) DEFAULT NULL,
  `journal_id` int(11) DEFAULT NULL,
  `consent` varchar(20) NOT NULL DEFAULT 'NA',
  `allocation_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `editor_allocation`
--

INSERT INTO `editor_allocation` (`editor_id`, `reviewer_id`, `journal_id`, `consent`, `allocation_id`) VALUES
(5, 1, 22, 'Reviewed', 4),
(5, 2, 22, 'NA', 5),
(5, 3, 22, 'NA', 6),
(5, 1, 23, 'NA', 7),
(5, 1, 23, 'NA', 8),
(5, 1, 23, 'NA', 9);

-- --------------------------------------------------------

--
-- Table structure for table `files`
--

CREATE TABLE `files` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `size` int(11) NOT NULL,
  `downloads` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files`
--

INSERT INTO `files` (`ID`, `name`, `size`, `downloads`) VALUES
(9, 'CN ASSIGNMENT 1.pdf', 279915, 0),
(15, 'COMPUTER NETWORKS ASSIGNMENT 10.pdf', 479738, 0),
(16, 'PTP LR Class 1_Series & Coding Clocks & Calendars.pdf', 795972, 0),
(17, 'diksha kataake', 0, 0),
(18, 'dddddddd.pdf', 43215, 1),
(19, '5ed25e66850ce4.67250684.pdf', 43215, 1),
(20, '5ed2622bc62541.84950171.pdf', 279915, 0),
(21, '5ed2631b41eee7.29351871.pdf', 279915, 0),
(22, '5ed27ed7a5bd49.12198081.pdf', 279915, 0),
(23, '5ed2857e1329a2.95180317.pdf', 279915, 0);

-- --------------------------------------------------------

--
-- Table structure for table `files_main`
--

CREATE TABLE `files_main` (
  `ID` int(11) NOT NULL,
  `journal_name` varchar(60) NOT NULL,
  `file_name` varchar(35) DEFAULT 'na',
  `abstract_name` varchar(35) NOT NULL,
  `size` int(11) NOT NULL,
  `co_author` varchar(200) NOT NULL,
  `category` varchar(30) NOT NULL,
  `status` varchar(20) DEFAULT 'Incomplete',
  `author_id` int(11) DEFAULT '-1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `files_main`
--

INSERT INTO `files_main` (`ID`, `journal_name`, `file_name`, `abstract_name`, `size`, `co_author`, `category`, `status`, `author_id`) VALUES
(11, 'AI monitoring and support research', '5ed61a49446d13.17320864.pdf', '5ed61a45897f96.43671761.pdf', 737190, '', 'Technology', 'Incomplete', -1),
(13, 'Machine Learning Shortcomings and threats', '5ed61d53e941f4.64922206.pdf', '5ed61d4a3ece95.92634715.pdf', 737190, '', 'Technology', 'Not reviewed', -1),
(14, 'Computer Networks in IOT', '5ed61e4d5aa8b9.70236507.pdf', '5ed61e455acd59.27022421.pdf', 737190, '', 'Technology', 'Not reviewed', -1),
(16, 'The anatomy of large web search engine', '5edc00a4252190.31804467.pdf', '5edc009a1d6c42.93922422.pdf', 13335, '', 'Technology', 'Under review', 1),
(21, 'demo_manuscript', '5ede25e1a6b055.78631694.pdf', '5ede25d02b8c06.60018216.pdf', 279915, '', 'Technology', 'Not reviewed', 7),
(22, 'demo_manuscript_10', '5ede27de2f57c8.85353902.pdf', '5ede27b8da8d59.99903697.pdf', 279915, '', 'Technology', 'Under review', 8),
(23, 'aa', 'na', '', 0, '', 'Science', 'Under review', 7),
(24, 'Hello', 'na', '', 0, '', 'Science', 'Not reviewed', 7);

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`username`, `password`) VALUES
('author1', '12345');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `name` varchar(200) NOT NULL,
  `designation` varchar(200) NOT NULL,
  `affiliation` varchar(200) NOT NULL,
  `phone` char(12) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(30) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`name`, `designation`, `affiliation`, `phone`, `email`, `password`, `user_id`, `status`) VALUES
('ABC', 'Manager', 'VIIT', '9921976687', 'reviewer_1@gmail.com', 'hello', 1, 1),
('DEF', 'Manager', 'VIIT', '9921976687', 'reviewer_2@gmail.com', 'hello', 2, 1),
('PQR', 'Manager', 'VIIT', '9921976687', 'reviewer_3@gmail.com', 'hello', 3, 1),
('STU', 'Manager', 'VIIT', '9921976687', 'reviewer_4@gmail.com', 'hello', 4, 1),
('Editor', 'Manager', 'IETE', '9921976687', 'editor@gmail.com', 'hello', 5, 0),
('Author_1', 'Student', 'VIIT', '07745074150', 'author_1@gmail.com', 'hello', 7, 2),
('Diksha Katake', 'Student', 'VIIT', '07745074150', 'author_10@gmail.com', 'hello', 8, 2);

-- --------------------------------------------------------

--
-- Table structure for table `reviewer`
--

CREATE TABLE `reviewer` (
  `reviewer_id` int(11) NOT NULL,
  `reviewer_name` varchar(40) NOT NULL,
  `category` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reviewer`
--

INSERT INTO `reviewer` (`reviewer_id`, `reviewer_name`, `category`) VALUES
(1, 'ABC', 'Artificial Intelligence'),
(2, 'DEF', 'Web development'),
(3, 'PQR', 'Machine Learning'),
(4, 'STU', 'Cloud Computing');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `editor_allocation`
--
ALTER TABLE `editor_allocation`
  ADD PRIMARY KEY (`allocation_id`);

--
-- Indexes for table `files`
--
ALTER TABLE `files`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `files_main`
--
ALTER TABLE `files_main`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`username`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `reviewer`
--
ALTER TABLE `reviewer`
  ADD PRIMARY KEY (`reviewer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `editor_allocation`
--
ALTER TABLE `editor_allocation`
  MODIFY `allocation_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `files`
--
ALTER TABLE `files`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `files_main`
--
ALTER TABLE `files_main`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reviewer`
--
ALTER TABLE `reviewer`
  MODIFY `reviewer_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
