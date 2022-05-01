-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 01, 2022 at 09:20 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `covid19casefollow`
--

-- --------------------------------------------------------

--
-- Table structure for table `cases`
--

CREATE TABLE `cases` (
  `c_id` varchar(12) NOT NULL,
  `c_ref_docid` int(11) NOT NULL,
  `c_village_num` int(11) NOT NULL,
  `c_fname` varchar(255) NOT NULL,
  `c_lname` varchar(255) NOT NULL,
  `c_cardid` varchar(13) NOT NULL,
  `c_address` text NOT NULL,
  `c_phone` varchar(10) NOT NULL,
  `c_detail` text NOT NULL,
  `c_start_quarantine` date NOT NULL,
  `c_end_quarantine` date NOT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`c_id`, `c_ref_docid`, `c_village_num`, `c_fname`, `c_lname`, `c_cardid`, `c_address`, `c_phone`, `c_detail`, `c_start_quarantine`, `c_end_quarantine`, `c_timestamp`) VALUES
('010522-31FJP', 2, 1, 'fname', 'lname', '1541234567891', '203 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0641234567', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2022-05-01', '2022-05-10', '2022-05-01 04:20:31');

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `m_id` int(11) NOT NULL,
  `m_username` varchar(255) NOT NULL,
  `m_password` text NOT NULL,
  `m_fname` varchar(255) NOT NULL,
  `m_lname` varchar(255) NOT NULL,
  `m_role` int(1) NOT NULL DEFAULT 0 COMMENT '0=อสม, 1=แพทย์, 2=แอดมิน'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`m_id`, `m_username`, `m_password`, `m_fname`, `m_lname`, `m_role`) VALUES
(1, 'admin', '$2y$10$oPZeBYpDDWbHO4RD/2oun.zydgogwpK8bWiWevGocvAALDmzwA1M.', 'Admins', 'admin', 2),
(2, 'doctor', '$2y$10$46fx1pUBDMQaG2mWS.xLyOxMdNWiNVGp6hLtZQBn9yRlcNH5HB8tG', 'Doctor', 'lastname', 1),
(3, 'staff', '', 'Staff', 'lastname', 0),
(5, 'tester', '$2y$10$bqdAAusBjycDND8fTawUdOmJRnhpbRp3bAohnOD4iYoMj1XyyRZ4m', 'Tinngrit', 'Singkaew', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cases`
--
ALTER TABLE `cases`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`m_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `m_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
