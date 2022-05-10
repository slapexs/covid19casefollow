-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 10, 2022 at 02:38 PM
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
  `c_note` text NOT NULL,
  `c_start_quarantine` date NOT NULL,
  `c_end_quarantine` date NOT NULL,
  `c_timestamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `c_status` int(1) NOT NULL DEFAULT 0 COMMENT '0=in progress, 1=closed,\r\n2 = death'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cases`
--

INSERT INTO `cases` (`c_id`, `c_ref_docid`, `c_village_num`, `c_fname`, `c_lname`, `c_cardid`, `c_address`, `c_phone`, `c_detail`, `c_note`, `c_start_quarantine`, `c_end_quarantine`, `c_timestamp`, `c_status`) VALUES
('010522-31FJP', 2, 1, 'fname', 'lname', '1541234567891', '203 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0641234567', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '', '2022-05-01', '2022-05-10', '2022-05-09 03:01:35', 1),
('010522-5YVSQ', 2, 5, 'fname', 'lname', '1231231231231', '123 ม.5 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0981231233', 'แฟลชเนอะ เหี่ยวย่น ไมค์ ไกด์แอดมิสชัน ออดิชั่นกิฟท์คาราโอเกะอัลบัมตัวตน อุด้งดิสเครดิตทับซ้อนเดอะบัตเตอร์ เช็งเม้ง เวิร์กแชเชือนซัพพลายโอเพ่น ตังค์ลิสต์คาร์โก้ไพลินกรอบรูป แมชชีนละติน คอมเพล็กซ์อิกัวนานู้ดเอาต์แป๋ว แกรนด์ เก๋ากี้อุเทนฮอตดอกว้าว เปราะบางดาวน์ตังค์ยิวบู๊ พุทโธแคทวอล์คแครอทซัมเมอร์ดีพาร์ตเมนต์ เอฟเฟ็กต์มหภาคตุ๊ดซิลเวอร์', 'เฟอร์นิเจอร์ป๊อกเทียมทานเอ๋ ก๋ากั่นมัฟฟินไชน่าเซ่นไหว้ คอลัมน์วอร์รูมแตงกวามลภาวะ บุญคุณฮาร์ดหลินจือเปโซ เปเปอร์อวอร์ดฟีเวอร์โพลารอยด์ แพนดาไชน่า ชิฟฟอนรากหญ้าแต๋วซูโม่ แหววอัลมอนด์มายองเนสดีพาร์ตเมนต์กุมภาพันธ์', '2022-05-01', '2022-05-11', '2022-05-08 15:19:16', 2),
('080522-5ONNL', 5, 13, 'Dana', 'Perry', '9302793027123', '123 ม.13 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0119627516', 'dc523cb313b63dfe5be2140b0c05b3bc', '7a4aa07d1bedcc6bcf4b7f8856643492c191540d', '2022-05-08', '2022-05-15', '2022-05-09 01:35:45', 0),
('090522-7HGWB', 2, 11, 'Norax', 'Davis', '2002200220021', '962/1 ม.11 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0814540666', 'dc523cb313b63dfe5be2140b0c05b3bc', '7a4aa07d1bedcc6bcf4b7f8856643492c191540d', '2022-05-09', '2022-05-16', '2022-05-09 04:42:51', 0),
('090522-7PJ0J', 2, 12, 'Tony', 'Bates', '9267926792671', '321/12 ม.12 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0123456789', 'dc523cb313b63dfe5be2140b0c05b3bc', '7a4aa07d1bedcc6bcf4b7f8856643492c191540d', '2022-05-09', '2022-05-16', '2022-05-09 03:05:25', 0),
('090522-Z1WUE', 5, 12, 'Bobbie', 'Carpenter', '7240724072401', '456 ม.12 ต.ร้องกวาง อ.ร้องกวาง จ.แพร่ 54140', '0814540666', 'dc523cb313b63dfe5be2140b0c05b3bc', '7a4aa07d1bedcc6bcf4b7f8856643492c191540d', '2022-05-09', '2022-05-16', '2022-05-09 02:02:36', 0);

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
(3, 'staff', '$2y$10$9LviJL9.58Hdp66LNQiSoeWirehWlzHjE4H.Fn8z14pUN.DvOZj0C', 'Staff', 'lastname', 0),
(5, 'tester', '$2y$10$bqdAAusBjycDND8fTawUdOmJRnhpbRp3bAohnOD4iYoMj1XyyRZ4m', 'Tinngrit', 'Singkaew', 1);

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
