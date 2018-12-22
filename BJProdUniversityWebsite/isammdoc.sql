-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 21, 2017 at 07:46 PM
-- Server version: 5.7.14
-- PHP Version: 5.6.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `isammdoc`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcement`
--

CREATE TABLE `announcement` (
  `a_id` int(11) NOT NULL,
  `a_posternid` varchar(20) DEFAULT NULL,
  `a_subject` varchar(50) NOT NULL,
  `a_message` text,
  `a_attachment` blob,
  `a_path` text,
  `a_size` text,
  `a_type` text,
  `a_level` varchar(30) DEFAULT NULL,
  `a_cat` varchar(30) DEFAULT NULL,
  `a_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `announcement`
--

INSERT INTO `announcement` (`a_id`, `a_posternid`, `a_subject`, `a_message`, `a_attachment`, `a_path`, `a_size`, `a_type`, `a_level`, `a_cat`, `a_date`) VALUES
(4, '03456672', 'Database  Integration ', 'You can implement this database in your project', 0x44617461626173652e786c7378, 'files/Database.xlsx', '12659', 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet', '3', 'IM', '2016-05-17 11:50:20'),
(5, '03456672', 'Project presentation', 'There is an example of project presentation in the following attached file.', 0x5072c3a973656e746174696f6e2e70707478, 'files/PrÃ©sentation.pptx', '2486240', 'application/vnd.openxmlformats-officedocument.presentationml.presentation', '', '', '2017-05-17 11:53:02'),
(6, '08763512', 'Use case example', 'You can follow the use case diagrams attached in your project', 0x557365732d63617365732e726172, 'files/Uses-cases.rar', '1087153', 'application/octet-stream', '1', 'Engineering', '2017-05-17 11:55:18'),
(7, '00984531', 'Report Example', 'In the following file, there is an example of report. You can use it. Good luck ', 0x5265706f727444656d6f2e646f6378, 'files/ReportDemo.docx', '15152917', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document', '', '', '2017-05-19 16:03:55'),
(8, '00984531', 'Work Request', 'If you are interested in developing software application. Contact us.', 0x696d6167653030312e6a7067, 'files/image001.jpg', '13306', 'image/jpeg', '', '', '2017-05-19 16:05:40'),
(9, '00984531', 'Graduation Project Documents', 'Please bring all the documents listed in the attached file.', 0x7363616e303033352e706466, 'files/scan0035.pdf', '123758', 'application/pdf', '', '', '2017-05-19 16:06:39');

-- --------------------------------------------------------

--
-- Table structure for table `attendance`
--

CREATE TABLE `attendance` (
  `att_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `m_nId` varchar(20) DEFAULT NULL,
  `attend` varchar(20) DEFAULT NULL,
  `attendancedate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `attendance`
--

INSERT INTO `attendance` (`att_id`, `c_id`, `m_nId`, `attend`, `attendancedate`) VALUES
(1, 1, '09781688', '', '2017-05-19'),
(2, 1, '09781688', '', '2017-05-19'),
(3, 1, '06787635', '', '2017-05-19'),
(4, 1, '09781688', '', '2017-05-19'),
(5, 3, '08898782', '', '2017-05-19'),
(6, 3, '09781688', '', '2017-05-19'),
(7, 5, '09781688', '', '2017-05-19'),
(8, 3, '00778551', '', '2017-05-21');

-- --------------------------------------------------------

--
-- Table structure for table `attendance_letter`
--

CREATE TABLE `attendance_letter` (
  `att_letter_id` int(11) NOT NULL,
  `requester_id` varchar(20) DEFAULT NULL,
  `supervisor1_id` varchar(20) DEFAULT NULL,
  `s_sup1` int(11) NOT NULL,
  `supervisor2_id` varchar(20) DEFAULT NULL,
  `s_sup2` int(11) NOT NULL,
  `att_reason` text,
  `State` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

-- --------------------------------------------------------

--
-- Table structure for table `course`
--

CREATE TABLE `course` (
  `c_id` int(11) NOT NULL,
  `c_fullname` text NOT NULL,
  `c_code` varchar(50) DEFAULT NULL,
  `c_credit` float DEFAULT NULL,
  `c_reviewsystem` varchar(50) DEFAULT NULL,
  `c_level` int(2) DEFAULT NULL,
  `c_cat` varchar(20) DEFAULT NULL,
  `c_totalabsence` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `course`
--

INSERT INTO `course` (`c_id`, `c_fullname`, `c_code`, `c_credit`, `c_reviewsystem`, `c_level`, `c_cat`, `c_totalabsence`) VALUES
(1, 'PROGRAMMING LANGUAGE II', '5710140', 4, 'Continuous Evaluation', 3, 'IM', 3),
(2, 'INTR. TO COMPUTERS & FORTRAN PROG.', '5710200', 4, 'Continuous Evaluation', 3, 'IM', 3),
(3, 'STATISTICAL METHODS FOR COMPUTER ENGINEERING ', '5710222', 5, 'Mixed System', 3, 'IM', 3),
(4, 'INTRODUCTION TO C PROGRAMMING', '5710232', 4, 'Mixed System', 3, 'IM', 6),
(5, 'PROGRAMMING LANGUAGE CONCEPTS', '5710242', 3.5, 'Continuous Evaluation', 3, 'IM', 6),
(6, 'FORMAL LANGU.AND ABSTRACT MACHINES', '5710280', 3.5, 'Mixed System', 3, 'IM', 6),
(7, 'WIRELESS COMMUNICATION AND NETWORKS', '5710513', 6, 'Continuous Evaluation', 1, 'Engineering', 6),
(8, 'DATA MINING', '5710514', 4.5, 'Mixed System', 1, 'Engineering', 3),
(9, 'DATABASE MANAGEMENT SYSTEMS', '5710553', 4, 'Continuous Evaluation', 1, 'Engineering', 6),
(10, 'MACHINE LEARNING ', '5710562', 4, 'Continuous Evaluation', 2, 'Engineering', 3),
(11, 'COMPUTATIONAL LINGUISTICS ', '5710563', 3, 'Continuous Evaluation', 2, 'Engineering', 3),
(12, 'PLANNING OF ROBOTIC MANIPULATION', '5710782', 5.5, 'Continuous Evaluation', 3, 'Engineering', 6),
(13, 'DEEP LEARNING', '5710783', 5, 'Continuous Evaluation', 3, 'Engineering', 6);

-- --------------------------------------------------------

--
-- Table structure for table `disc_comments`
--

CREATE TABLE `disc_comments` (
  `comm_id` int(11) NOT NULL,
  `dt_id` int(11) DEFAULT NULL,
  `comm_m_nId` varchar(20) DEFAULT NULL,
  `comm_text` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `disc_comments`
--

INSERT INTO `disc_comments` (`comm_id`, `dt_id`, `comm_m_nId`, `comm_text`) VALUES
(1, 2, '09781688', 'https://www.youtube.com/watch?v=g4hGRvs6HHU'),
(3, 2, '00984531', 'Thank you ahmed'),
(4, 4, '00778551', 'Thank you Mrs. Khitem'),
(5, 4, '06787635', 'Please, can you inform us about the type of questions ? '),
(6, 4, '00984531', 'It will be multiple choice');

-- --------------------------------------------------------

--
-- Table structure for table `disc_topic`
--

CREATE TABLE `disc_topic` (
  `dt_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `m_nId` varchar(20) NOT NULL,
  `dt_title` varchar(50) DEFAULT NULL,
  `dt_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `disc_topic`
--

INSERT INTO `disc_topic` (`dt_id`, `c_id`, `m_nId`, `dt_title`, `dt_description`) VALUES
(2, 1, '08887696', '', 'Can anyone send to us  the link of the tutorial please '),
(4, 1, '00984531', '', 'For the students who did not pass the midterm 1: You will have make up next week ');

-- --------------------------------------------------------

--
-- Table structure for table `doc`
--

CREATE TABLE `doc` (
  `d_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `m_nId` varchar(20) DEFAULT NULL,
  `d_type` varchar(30) DEFAULT NULL,
  `d_title` varchar(40) DEFAULT NULL,
  `d_description` text,
  `d_file` blob,
  `d_sdl` text,
  `d_postdate` datetime DEFAULT NULL,
  `f_path` text,
  `f_size` text,
  `f_type` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `doc`
--

INSERT INTO `doc` (`d_id`, `c_id`, `m_nId`, `d_type`, `d_title`, `d_description`, `d_file`, `d_sdl`, `d_postdate`, `f_path`, `f_size`, `f_type`) VALUES
(1, 1, '00984531', 'HomeWork Announcment', 'Homework1 ', 'You can use Lecture note1 ', 0x476c6f62616c20636c617373206469616772616d2e706466, '30-May-2017 11:00:00 PM', '2017-05-19 15:00:00', 'files/Global class diagram.pdf', '457682', 'application/pdf'),
(2, 1, '00984531', 'Project Announcment', 'Project 1', 'Please let me know about your group members', 0x676c6f62616c636c617373202832292e706e67, '01-Jun-2017 11:59:59 PM', '2017-05-19 23:59:59', 'files/globalclass (2).png', '1151752', 'image/png'),
(3, 1, '00984531', 'Lecture Note', 'Chapter 1', 'Chapter 1:An Overview of Computers and Programming Languages', 0x4d616c696b5f636830312e707074, '', '2017-05-21 13:49:51', 'files/Malik_ch01.ppt', '1518592', 'application/vnd.ms-powerpoint'),
(4, 1, '00984531', 'Lecture Note', 'Chapter 2', 'Chapter 2:Basic Elements of C++', 0x4d616c696b5f636830322e707074, '', '2017-05-21 13:51:03', 'files/Malik_ch02.ppt', '1785856', 'application/vnd.ms-powerpoint'),
(5, 1, '00984531', 'Lecture Note', 'Chapter 3', 'Chapter 3:Input/Output', 0x4d616c696b5f636830332e707074, '', '2017-05-21 13:52:14', 'files/Malik_ch03.ppt', '1686528', 'application/vnd.ms-powerpoint'),
(6, 1, '00984531', 'Lecture Note', 'Chapter 4', 'Chapter 4: Control Structures I (Selection)', 0x4d616c696b5f636830342e707074, '', '2017-05-21 13:52:49', 'files/Malik_ch04.ppt', '2880512', 'application/vnd.ms-powerpoint'),
(7, 1, '00984531', 'Lecture Note', 'Chapter 5', 'Chapter 5: Control Structures II (Repetition)', 0x4d616c696b5f636830352e707074, '', '2017-05-21 13:53:18', 'files/Malik_ch05.ppt', '1931776', 'application/vnd.ms-powerpoint'),
(8, 1, '00984531', 'Lecture Note', 'Chapter 6', 'Chapter 6:User-Defined Functions', 0x4d616c696b5f636830362e707074, '', '2017-05-21 13:53:44', 'files/Malik_ch06.ppt', '1613312', 'application/vnd.ms-powerpoint'),
(9, 1, '00984531', 'Lecture Note', 'Chapter 7', 'Chapter 7:User-Defined Simple Data Types, Namespaces, and the string Type', 0x4d616c696b5f636830372e707074, '', '2017-05-21 13:54:15', 'files/Malik_ch07.ppt', '1848832', 'application/vnd.ms-powerpoint'),
(10, 1, '00984531', 'Lecture Note', 'Chapter 8', 'Chapter 8: Arrays and Strings', 0x4d616c696b5f636830382e707074, '', '2017-05-21 13:54:46', 'files/Malik_ch08.ppt', '2170368', 'application/vnd.ms-powerpoint'),
(11, 1, '00984531', 'HomeWork Announcment', 'Homework 2', 'Write a C++ program which prints the calendar of a month', 0x4c6162315f312e646f63, '20-May-2017 11:59:59 PM', '2017-05-21 14:20:01', 'files/Lab1_1.doc', '31744', 'application/msword'),
(12, 1, '00984531', 'HomeWork Announcment', 'Homework 3', 'Write a complete C program which consists of  a function called find_minmax() ', 0x4c6162322d434549543231312e646f6378, '22-May-2017 11:59:59 PM', '2017-05-21 14:21:10', 'files/Lab2-CEIT211.docx', '134808', 'application/vnd.openxmlformats-officedocument.wordprocessingml.document'),
(13, 1, '00984531', 'HomeWork Announcment', 'Homework 4', '', 0x6c6162342d53432e646f63, '27-May-2017 11:59:59 PM', '2017-05-21 14:22:41', 'files/lab4-SC.doc', '37888', 'application/msword'),
(14, 1, '00984531', 'HomeWork Announcment', 'Homework 5', 'Structure for cities.', 0x6c61622d636c6173736573332e646f63, '30-May-2017 02:23:31 PM', '2017-05-21 14:23:36', 'files/lab-classes3.doc', '44032', 'application/msword'),
(15, 1, '00984531', 'HomeWork Announcment', 'Homework 6', 'Write a program to simulate elections. ', 0x6c6162362e706466, '21-Jun-2017 11:59:59 PM', '2017-05-21 14:24:28', 'files/lab6.pdf', '196437', 'application/pdf'),
(16, 1, '00984531', 'HomeWork Announcment', 'Homework 7', 'Write a program to implement composition', 0x6c6162372e646f63, '25-Jul-2017 11:59:59 PM', '2017-05-21 14:25:28', 'files/lab7.doc', '25600', 'application/msword'),
(17, 1, '00984531', 'Project Announcment', 'Project 2', '', 0x50726f6a65637420322e707074, '22-May-2017 11:59:59 PM', '2017-05-21 16:05:34', 'files/Project 2.ppt', '1931776', 'application/vnd.ms-powerpoint'),
(18, 1, '00984531', 'Project Announcment', 'Project 3', '', 0x50726f6a65637420332e706466, '22-May-2017 11:59:59 PM', '2017-05-21 16:05:52', 'files/Project 3.pdf', '196656', 'application/pdf'),
(19, 1, '00984531', 'Project Announcment', 'Project 4', '', 0x50726f6a65637420342e646f63, '30-May-2017 11:59:59 PM', '2017-05-21 16:06:21', 'files/Project 4.doc', '37888', 'application/msword'),
(20, 1, '00984531', 'Project Announcment', 'Project 5', '', 0x50726f6a65637420352e706466, '28-Jun-2017 11:59:59 PM', '2017-05-21 16:06:40', 'files/Project 5.pdf', '196656', 'application/pdf');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE `event` (
  `e_id` int(11) NOT NULL,
  `m_nId` varchar(20) DEFAULT NULL,
  `e_title` varchar(50) NOT NULL,
  `e_photo` blob,
  `e_description` text NOT NULL,
  `e_startdate` varchar(50) NOT NULL,
  `e_enddate` varchar(50) DEFAULT NULL,
  `e_place` text NOT NULL,
  `e_supervisor` varchar(20) DEFAULT NULL,
  `e_club_name` varchar(30) DEFAULT NULL,
  `e_club_pic` blob
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`e_id`, `m_nId`, `e_title`, `e_photo`, `e_description`, `e_startdate`, `e_enddate`, `e_place`, `e_supervisor`, `e_club_name`, `e_club_pic`) VALUES
(1, '08763512', 'Coding NO STOP', 0x696e6465782e6a7067, 'Coding Party! 24Hours Coding ! ', '31-May-2017 11:00:00 AM', '01-Jun-2017 11:00:00 AM', 'AMPHI', 'Khitem Amiri', 'smartec', 0x38713446716833592e706e67),
(2, '08763512', 'Visual Studio Code', 0x323031365f30345f31345f6865616465722e706e67, 'If you are interesting in Visual Studio Code! Let us know ', '17-Jun-2017 03:30:00 PM', '17-May-2017 06:00:00 PM', 'BMB5', 'Skander Belhadj', 'Microsoft', 0x7a5130787947474b2e6a7067),
(3, '08763512', 'Android Meeting', 0x616e642e706e67, 'We will have the pleasure to meet you ', '22-May-2017 01:00:00 PM', '22-May-2017 04:00:00 PM', 'ISAMM', 'Ghada Cherif', 'Android', 0x616e64726f69642e706e67),
(4, '09781688', 'Learn Photography', 0x3339343936385f353338625f372e6a7067, '10 Days Taking Pictures! ', '10-Jun-2017 11:30:00 AM', '20-Jun-2017 10:00:00 AM', 'KIZILAY', 'Mehrez Safi', 'PhotoH', 0x4c6f676f5f496d6167655f30312e706e67),
(5, '09781688', 'Website Development', 0x576562736974652d446576656c6f706d656e742e706e67, 'If you want to learn how to develop a website ! ', '12-Jun-2017 01:00:00 PM', '12-Jun-2017 03:00:00 PM', 'AMPHI ISAMM', 'Sara Ben Abdalah', 'SMARTEC', 0x38713446716833592e706e67);

-- --------------------------------------------------------

--
-- Table structure for table `examdate`
--

CREATE TABLE `examdate` (
  `ex_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `m_nId` varchar(20) DEFAULT NULL,
  `ex_type` varchar(30) DEFAULT NULL,
  `ex_date` text,
  `ex_description` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `examdate`
--

INSERT INTO `examdate` (`ex_id`, `c_id`, `m_nId`, `ex_type`, `ex_date`, `ex_description`) VALUES
(2, 1, '07667621', 'Midterm 1 ', '25-May-2017 02:00:00 PM', 'Open Book exam'),
(4, 1, '00984531', 'Midterm 2', '09-Jun-2017 10:00:00 AM', 'Please try to do not be late');

-- --------------------------------------------------------

--
-- Table structure for table `grade`
--

CREATE TABLE `grade` (
  `g_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `m_nId` varchar(20) DEFAULT NULL,
  `g_midt1` float DEFAULT NULL,
  `g_midt2` float DEFAULT NULL,
  `g_finalexam` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `grade`
--

INSERT INTO `grade` (`g_id`, `c_id`, `m_nId`, `g_midt1`, `g_midt2`, `g_finalexam`) VALUES
(1, 1, '00778551', 12, 8.5, NULL),
(2, 2, '00778551', NULL, NULL, NULL),
(3, 3, '00778551', NULL, NULL, NULL),
(4, 4, '00778551', NULL, NULL, NULL),
(5, 5, '00778551', NULL, NULL, NULL),
(6, 6, '00778551', NULL, NULL, NULL),
(13, 1, '06673514', NULL, NULL, NULL),
(14, 2, '06673514', NULL, NULL, NULL),
(15, 3, '06673514', NULL, NULL, NULL),
(16, 4, '06673514', NULL, NULL, NULL),
(17, 5, '06673514', NULL, NULL, NULL),
(18, 6, '06673514', NULL, NULL, NULL),
(19, 1, '06787635', 15.25, 3, NULL),
(20, 2, '06787635', NULL, NULL, NULL),
(21, 3, '06787635', NULL, NULL, NULL),
(22, 4, '06787635', NULL, NULL, NULL),
(23, 5, '06787635', NULL, NULL, NULL),
(24, 6, '06787635', NULL, NULL, NULL),
(25, 1, '08887696', 10.5, 11.75, NULL),
(26, 2, '08887696', NULL, NULL, NULL),
(27, 3, '08887696', NULL, NULL, NULL),
(28, 4, '08887696', NULL, NULL, NULL),
(29, 5, '08887696', NULL, NULL, NULL),
(30, 6, '08887696', NULL, NULL, NULL),
(31, 1, '08898782', 9, 5, NULL),
(32, 2, '08898782', NULL, NULL, NULL),
(33, 3, '08898782', NULL, NULL, NULL),
(34, 4, '08898782', NULL, NULL, NULL),
(35, 5, '08898782', NULL, NULL, NULL),
(36, 6, '08898782', NULL, NULL, NULL),
(37, 1, '09555431', 7.75, 2, NULL),
(38, 2, '09555431', NULL, NULL, NULL),
(39, 3, '09555431', NULL, NULL, NULL),
(40, 4, '09555431', NULL, NULL, NULL),
(41, 5, '09555431', NULL, NULL, NULL),
(42, 6, '09555431', NULL, NULL, NULL),
(43, 1, '09781688', 9.25, 17.5, 20),
(44, 2, '09781688', NULL, NULL, NULL),
(45, 3, '09781688', NULL, NULL, NULL),
(46, 4, '09781688', NULL, NULL, NULL),
(47, 5, '09781688', NULL, NULL, NULL),
(48, 6, '09781688', NULL, NULL, NULL),
(49, 1, '10098720', NULL, NULL, NULL),
(50, 2, '10098720', NULL, NULL, NULL),
(51, 3, '10098720', NULL, NULL, NULL),
(52, 4, '10098720', NULL, NULL, NULL),
(53, 5, '10098720', NULL, NULL, NULL),
(54, 6, '10098720', NULL, NULL, NULL),
(55, 1, '11109073', NULL, NULL, NULL),
(56, 2, '11109073', NULL, NULL, NULL),
(57, 3, '11109073', NULL, NULL, NULL),
(58, 4, '11109073', NULL, NULL, NULL),
(59, 5, '11109073', NULL, NULL, NULL),
(60, 6, '11109073', NULL, NULL, NULL),
(64, 7, '00770011', NULL, NULL, NULL),
(65, 8, '00770011', NULL, NULL, NULL),
(66, 9, '00770011', NULL, NULL, NULL),
(67, 7, '10078551', NULL, NULL, NULL),
(68, 8, '10078551', NULL, NULL, NULL),
(69, 9, '10078551', NULL, NULL, NULL),
(70, 7, '00745551', NULL, NULL, NULL),
(71, 8, '00745551', NULL, NULL, NULL),
(72, 9, '00745551', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `member`
--

CREATE TABLE `member` (
  `m_nId` varchar(20) NOT NULL,
  `m_fName` varchar(20) DEFAULT NULL,
  `m_lName` varchar(20) DEFAULT NULL,
  `m_rn` varchar(20) DEFAULT NULL,
  `m_email` varchar(50) DEFAULT NULL,
  `m_pass` varchar(100) DEFAULT NULL,
  `m_role` varchar(20) DEFAULT NULL,
  `m_Pic` blob,
  `m_phNumber` int(11) DEFAULT NULL,
  `m_skype` varchar(30) DEFAULT NULL,
  `m_bdate` varchar(20) DEFAULT NULL,
  `m_gender` varchar(10) DEFAULT NULL,
  `m_cat` varchar(40) DEFAULT NULL,
  `m_level` int(2) DEFAULT NULL,
  `m_groupnb` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `member`
--

INSERT INTO `member` (`m_nId`, `m_fName`, `m_lName`, `m_rn`, `m_email`, `m_pass`, `m_role`, `m_Pic`, `m_phNumber`, `m_skype`, `m_bdate`, `m_gender`, `m_cat`, `m_level`, `m_groupnb`) VALUES
('00178551', 'Souha', 'Ferjani', '112054', '  souha.ferjani@yahoo.com  ', '92210e5fbb78714eb685316ebdb618cd', 'Administrator', 0x31333939353433375f31303230353038343831323735383236325f343837343539333536393430363335343736385f6f2e6a7067, 98435983, '', NULL, 'Female', NULL, NULL, NULL),
('00745551', 'Amira', 'Jaziri', '112224', 'jaziri43@yahoo.com', '62ea9dda624dbb9d13d0394a6b5a14fa', 'Student', NULL, 97849382, NULL, NULL, 'Female', 'Engineering', 1, 1),
('00770011', 'Amine', 'Jallouli', '112054', '  jallouli.amine@yahoo.fr  ', '92210e5fbb78714eb685316ebdb618cd', 'Student', 0x31363830373535395f31303230383435323431323830333639365f373939393536333132373934323732363034325f6e2e6a7067, 23495898, '', NULL, 'Male', 'Engineering', 1, 1),
('00778551', 'Lynda', 'Ayachi', '665701', '  lyndaayachi@gmail.com  ', '77bf9a4c2764f4fa148c6fbff5938d50', 'Student', 0x31343639353538315f313530333437383731323939393434325f373035373433343930313732393535353435395f6e2e6a7067, 98543928, '', NULL, 'Female', 'IM', 3, 6),
('00864331', 'Sirine', 'Triki', '133278', 'sirinetriki@gmail.com', '82fb504782b53305b71ea76c13851d26', 'Administrator', NULL, 27043564, NULL, NULL, 'Female', NULL, NULL, NULL),
('00967341', 'Skander', 'Belhadj', '009813', '  skanderbelhadj@yahoo.fr  ', '8b5bfb95f9b51d3372c41679cc315136', 'Instructor', 0x31333333323735355f31303230393837363834303436333339345f363038323232313736313131363233383131385f6e2e6a7067, 98543532, '', NULL, 'Male', NULL, NULL, NULL),
('00984531', 'Khitem', 'Amiri', '075451', '  khitemamiri32@yahoo.com  ', 'ff0a8410f80b9db196ef8db452624439', 'Instructor', 0x31383330313635395f31303230393939303938363130343432355f373135353630383330343739363331333136325f6e2e6a7067, 98438289, '', NULL, 'Female', NULL, NULL, NULL),
('03456672', 'Amin', 'Riahi', '944001', '  riahiamine@yahoo.fr  ', '8eeb7d6007c873bed16254cebd9fa4e1', 'Administrator', 0x31343939333533305f313132343236373139373635313132325f333939363538303835323730383039333931345f6e2e6a7067, 22345231, '', NULL, 'Male', NULL, NULL, NULL),
('06673514', 'Fatma', 'Selmi', '111443', 'fatmaselmi@hotmail.com', 'c93a7b48ee2696aaec93f2559d90240a', 'Student', NULL, 98543983, NULL, NULL, 'Female', 'IM', 3, 1),
('06787635', 'Bilel', 'Djobbi', '098664', 'bilel@yahoo.fr                          ', '380c4cb30cfcddbdfe7a32cfea5cfd67', 'Student', 0x6d616c652e6a7067, 91283948, 'bilel.djobbi', '20-May-1993', 'Male', 'IM', 3, 6),
('07635227', 'Tarek', 'Hamrouni', '043521', 'tarek.hamrouni@yahoo.fr', '2f5c761e4a6f077de121cbd41b0336b4', 'Instructor', NULL, 21494039, NULL, NULL, 'Male', NULL, NULL, NULL),
('07667621', 'Ghada', 'Cherif', '345546', 'ghadacherif@gmail.com', '3af9c2816046c5b66f7b2b7182397b6b', 'Instructor', NULL, 23432532, NULL, NULL, 'Female', NULL, NULL, NULL),
('07866341', 'Mehrez', 'Safi', '054210', 'saafi@yahoo.fr  ', '644e1e395edc08cb03f5e6f41fde020b', 'Instructor', 0x31303830353632395f3833323935373330303038303632395f393136393037383036363030373736393130395f6e2e6a7067, NULL, '', '', 'Male', NULL, NULL, NULL),
('08763512', 'Omar', 'Mami', '876392', 'omarmami@gmail.com', 'bd9ad251d1b7d85bda005a0533af7445', 'Administrator', NULL, 22345354, NULL, NULL, 'Male', NULL, NULL, NULL),
('08795551', 'Sara', 'Ben Abdalah', '133098', 'benabdallahsara@yahoo.fr', 'b6f00e0c8bfb3446cd15b050e5bd9712', 'Instructor', NULL, 21958302, NULL, NULL, 'Female', NULL, NULL, NULL),
('08887696', 'Rim', 'Bougamra', '311120', '  bougamra@gmail.com  ', 'ad0e8e8b9fadc2e160a107f9e58a8aac', 'Student', 0x31353033363637345f313235333937383639373939383338335f313032343930313034313730323932383030325f6e2e6a7067, 98543291, '', NULL, 'Female', 'IM', 3, 6),
('08898782', 'Ala', 'Baccar', '998023', 'baccarala@yahoo.fr', '70dceceff4138a86abf45235b0cc6949', 'Student', NULL, 21345654, NULL, NULL, 'Male', 'IM', 3, 6),
('09555431', 'Saif', 'Agrebi', '112554', 'saifagerbi43@yahoo.fr', '1c0bf0b4cad4eb0d6cd179f46a89e21b', 'Student', NULL, 22345095, NULL, NULL, 'Male', 'IM', 3, 6),
('09781688', 'Ahmed', 'Barkeoui', '012349', '    barkeoui.ahmed@gmail.com     ', 'd666ce400eb05287d97912745fcbcc63', 'Student', 0x494d475f343530362e4a5047, 98342092, '', NULL, 'Male', 'IM', 3, 6),
('10078551', 'Houssem', 'Mami', '011349', 'mami.houssem@yahoo.fr', 'd9dc807e2b836c7cb3a9d8e2c7248a31', 'Student', NULL, 22345079, NULL, NULL, 'Male', 'Engineering', 1, 1),
('10098720', 'Hiba', 'Khabouchi', '445540', '  khabouchi.hiba@yaho.fr  ', 'a9624c2eeacb0be703e99b87013a27b8', 'Student', 0x494d475f343933322e4a5047, 23587398, '', NULL, 'Female', 'IM', 3, 1),
('11109073', 'Lina', 'Ferjani', '044532', 'lina.ferjani@yahoo.com', '1fbca1d28395c236a16f6121f594461b', 'Student', NULL, 22345968, NULL, NULL, 'Female', 'IM', 3, 1);

-- --------------------------------------------------------

--
-- Table structure for table `member_course`
--

CREATE TABLE `member_course` (
  `m_c_id` int(11) NOT NULL,
  `c_id` int(11) DEFAULT NULL,
  `m_nId` varchar(20) DEFAULT NULL,
  `group_nb` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `member_course`
--

INSERT INTO `member_course` (`m_c_id`, `c_id`, `m_nId`, `group_nb`) VALUES
(1, 1, '7667621', 6),
(4, 1, '984531', 1),
(5, 1, '984531', 6),
(6, 3, '984531', 9),
(7, 3, '984531', 6),
(8, 5, '984531', 9),
(9, 5, '984531', 6),
(10, 4, '984531', 7),
(11, 4, '984531', 3),
(12, 8, '984531', 10),
(13, 8, '984531', 2),
(14, 6, '984531', 8),
(15, 6, '984531', 10),
(16, 10, '984531', 2),
(17, 10, '984531', 6),
(18, 7, '984531', 10),
(19, 7, '984531', 7),
(20, 7, '984531', 1),
(21, 7, '984531', 6),
(24, 11, '984531', 10);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `msg_id` int(11) NOT NULL,
  `msg_sender` varchar(30) DEFAULT NULL,
  `msg_title` varchar(30) DEFAULT NULL,
  `msg_text` text,
  `State` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`msg_id`, `msg_sender`, `msg_title`, `msg_text`, `State`) VALUES
(1, 'jallouli@gmail.com', 'cOurse', 'Hello', 1);

-- --------------------------------------------------------

--
-- Table structure for table `practical_work`
--

CREATE TABLE `practical_work` (
  `td_id` int(11) NOT NULL,
  `d_id` int(11) DEFAULT NULL,
  `m_posterId` varchar(20) DEFAULT NULL,
  `td_title` varchar(30) DEFAULT NULL,
  `td_file` blob,
  `td_path` text,
  `td_size` text,
  `td_type` text
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `practical_work`
--

INSERT INTO `practical_work` (`td_id`, `d_id`, `m_posterId`, `td_title`, `td_file`, `td_path`, `td_size`, `td_type`) VALUES
(1, 10, '00984531', 'Practical work 8', 0x44656974656c5f3465645f30372e707074, 'files/Deitel_4ed_07.ppt', '410624', 'application/vnd.ms-powerpoint'),
(2, 10, '00984531', 'Practical work 8.1', 0x4d616c696b5f737472756374757265735f636830392e707074, 'files/Malik_structures_ch09.ppt', '2108928', 'application/vnd.ms-powerpoint'),
(3, 10, '00984531', 'Practical work 8.2', 0x536176697463685f436c61737365735f636831302e707074, 'files/Savitch_Classes_ch10.ppt', '3469824', 'application/vnd.ms-powerpoint'),
(4, 9, '00984531', 'Practical work 7', 0x4d616c696b5f737472756374757265735f636830392e707074, 'files/Malik_structures_ch09.ppt', '2108928', 'application/vnd.ms-powerpoint');

-- --------------------------------------------------------

--
-- Table structure for table `sub_doc`
--

CREATE TABLE `sub_doc` (
  `sh_id` int(30) NOT NULL,
  `d_id` int(30) DEFAULT NULL,
  `sh_posterid` varchar(20) DEFAULT NULL,
  `sh_file` blob,
  `sh_size` text,
  `sh_path` text,
  `sh_type` text,
  `Date_sub` varchar(100) DEFAULT NULL,
  `sh_grade` float DEFAULT NULL,
  `poster_groupnb` int(2) DEFAULT NULL,
  `sh_postername` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf16le;

--
-- Dumping data for table `sub_doc`
--

INSERT INTO `sub_doc` (`sh_id`, `d_id`, `sh_posterid`, `sh_file`, `sh_size`, `sh_path`, `sh_type`, `Date_sub`, `sh_grade`, `poster_groupnb`, `sh_postername`) VALUES
(1, 1, '09781688', 0x616e64726f69642e706e67, '3644', 'files/android.png', 'image/png', '2017-05-21 11:07:31', 16, 6, 'Ahmed Barkeoui'),
(2, 2, '09781688', 0x696e6465782e6a7067, '22855', 'files/index.jpg', 'image/jpeg', '2017-05-21 11:08:17', NULL, 6, 'Ahmed Barkeoui'),
(3, 16, '09781688', 0x41686d6564204261726b656f75695f33494d362e726172, '1004061', 'files/Ahmed Barkeoui_3IM6.rar', 'application/octet-stream', '2017-05-21 15:32:17', 8, 6, 'Ahmed Barkeoui'),
(4, 16, '00778551', 0x4c796e6461204179616368695f33494d362e726172, '574144', 'files/Lynda Ayachi_3IM6.rar', 'application/octet-stream', '2017-05-21 15:40:50', 15, 6, 'Lynda Ayachi'),
(5, 15, '00778551', 0x4c796e6461204179616368695f33494d362e726172, '574144', 'files/Lynda Ayachi_3IM6.rar', 'application/octet-stream', '2017-05-21 15:43:41', NULL, 6, 'Lynda Ayachi'),
(6, 16, '06787635', 0x42696c656c20446a6f6262695f33494d362e726172, '1361477', 'files/Bilel Djobbi_3IM6.rar', 'application/octet-stream', '2017-05-21 15:50:20', 10, 6, 'Bilel Djobbi'),
(7, 16, '08887696', 0x52696d20426f7567616d72615f33494d362e726172, '1259441', 'files/Rim Bougamra_3IM6.rar', 'application/octet-stream', '2017-05-21 15:51:07', 8, 6, 'Rim Bougamra'),
(8, 18, '09781688', 0x41686d6564204261726b656f75695f33494d362e726172, '1004061', 'files/Ahmed Barkeoui_3IM6.rar', 'application/octet-stream', '2017-05-21 16:07:26', 16, 6, 'Ahmed Barkeoui'),
(9, 19, '09781688', 0x41686d6564204261726b656f75695f33494d362e726172, '1004061', 'files/Ahmed Barkeoui_3IM6.rar', 'application/octet-stream', '2017-05-21 16:07:43', 4, 6, 'Ahmed Barkeoui'),
(10, 19, '00778551', 0x4c796e6461204179616368695f33494d362e726172, '574144', 'files/Lynda Ayachi_3IM6.rar', 'application/octet-stream', '2017-05-21 16:15:08', NULL, 6, 'Lynda Ayachi'),
(11, 19, '06787635', 0x42696c656c20446a6f6262695f33494d362e726172, '1361477', 'files/Bilel Djobbi_3IM6.rar', 'application/octet-stream', '2017-05-21 16:15:45', NULL, 6, 'Bilel Djobbi'),
(12, 17, '06787635', 0x42696c656c20446a6f6262695f33494d362e726172, '1361477', 'files/Bilel Djobbi_3IM6.rar', 'application/octet-stream', '2017-05-21 16:16:02', NULL, 6, 'Bilel Djobbi'),
(13, 15, '09781688', 0x41686d6564204261726b656f75695f33494d362e726172, '1004061', 'files/Ahmed Barkeoui_3IM6.rar', 'application/octet-stream', '2017-05-21 16:17:43', NULL, 6, 'Ahmed Barkeoui');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcement`
--
ALTER TABLE `announcement`
  ADD PRIMARY KEY (`a_id`),
  ADD KEY `fk_for` (`a_posternid`);

--
-- Indexes for table `attendance`
--
ALTER TABLE `attendance`
  ADD PRIMARY KEY (`att_id`),
  ADD KEY `fk_1` (`m_nId`),
  ADD KEY `fk_2` (`c_id`);

--
-- Indexes for table `attendance_letter`
--
ALTER TABLE `attendance_letter`
  ADD PRIMARY KEY (`att_letter_id`),
  ADD KEY `fk_221` (`requester_id`);

--
-- Indexes for table `course`
--
ALTER TABLE `course`
  ADD PRIMARY KEY (`c_id`);

--
-- Indexes for table `disc_comments`
--
ALTER TABLE `disc_comments`
  ADD PRIMARY KEY (`comm_id`),
  ADD KEY `fkdisc` (`comm_m_nId`),
  ADD KEY `fkcomm` (`dt_id`);

--
-- Indexes for table `disc_topic`
--
ALTER TABLE `disc_topic`
  ADD PRIMARY KEY (`dt_id`),
  ADD KEY `fk_member` (`m_nId`),
  ADD KEY `fkdiscutopic` (`c_id`);

--
-- Indexes for table `doc`
--
ALTER TABLE `doc`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `m_nId` (`m_nId`),
  ADD KEY `c_id` (`c_id`);

--
-- Indexes for table `event`
--
ALTER TABLE `event`
  ADD PRIMARY KEY (`e_id`),
  ADD KEY `fk_event` (`m_nId`);

--
-- Indexes for table `examdate`
--
ALTER TABLE `examdate`
  ADD PRIMARY KEY (`ex_id`),
  ADD KEY `fk_10` (`c_id`),
  ADD KEY `fk_11` (`m_nId`);

--
-- Indexes for table `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`g_id`),
  ADD KEY `fk_13` (`c_id`),
  ADD KEY `fk_14` (`m_nId`);

--
-- Indexes for table `member`
--
ALTER TABLE `member`
  ADD PRIMARY KEY (`m_nId`);

--
-- Indexes for table `member_course`
--
ALTER TABLE `member_course`
  ADD PRIMARY KEY (`m_c_id`),
  ADD KEY `fk_17` (`c_id`),
  ADD KEY `fk_18` (`m_nId`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`msg_id`);

--
-- Indexes for table `practical_work`
--
ALTER TABLE `practical_work`
  ADD PRIMARY KEY (`td_id`),
  ADD KEY `fk_21` (`d_id`),
  ADD KEY `fk_22` (`m_posterId`);

--
-- Indexes for table `sub_doc`
--
ALTER TABLE `sub_doc`
  ADD PRIMARY KEY (`sh_id`),
  ADD KEY `fk_sub` (`d_id`),
  ADD KEY `fk_20` (`sh_posterid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcement`
--
ALTER TABLE `announcement`
  MODIFY `a_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `attendance`
--
ALTER TABLE `attendance`
  MODIFY `att_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `attendance_letter`
--
ALTER TABLE `attendance_letter`
  MODIFY `att_letter_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `course`
--
ALTER TABLE `course`
  MODIFY `c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `disc_comments`
--
ALTER TABLE `disc_comments`
  MODIFY `comm_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `disc_topic`
--
ALTER TABLE `disc_topic`
  MODIFY `dt_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `doc`
--
ALTER TABLE `doc`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `event`
--
ALTER TABLE `event`
  MODIFY `e_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `examdate`
--
ALTER TABLE `examdate`
  MODIFY `ex_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `grade`
--
ALTER TABLE `grade`
  MODIFY `g_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;
--
-- AUTO_INCREMENT for table `member_course`
--
ALTER TABLE `member_course`
  MODIFY `m_c_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `msg_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `practical_work`
--
ALTER TABLE `practical_work`
  MODIFY `td_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `sub_doc`
--
ALTER TABLE `sub_doc`
  MODIFY `sh_id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `announcement`
--
ALTER TABLE `announcement`
  ADD CONSTRAINT `announcement_mid` FOREIGN KEY (`a_posternid`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance`
--
ALTER TABLE `attendance`
  ADD CONSTRAINT `fk_course` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_member` FOREIGN KEY (`m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `attendance_letter`
--
ALTER TABLE `attendance_letter`
  ADD CONSTRAINT `fk_mem` FOREIGN KEY (`requester_id`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkposterattendance` FOREIGN KEY (`requester_id`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `disc_comments`
--
ALTER TABLE `disc_comments`
  ADD CONSTRAINT `fk_disctopic` FOREIGN KEY (`dt_id`) REFERENCES `disc_topic` (`dt_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_memcomm` FOREIGN KEY (`comm_m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `disc_topic`
--
ALTER TABLE `disc_topic`
  ADD CONSTRAINT `fkdiscutopic` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fmmmm` FOREIGN KEY (`m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doc`
--
ALTER TABLE `doc`
  ADD CONSTRAINT `doc_id` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_docmember` FOREIGN KEY (`m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `event`
--
ALTER TABLE `event`
  ADD CONSTRAINT `fk_mem_event` FOREIGN KEY (`m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `examdate`
--
ALTER TABLE `examdate`
  ADD CONSTRAINT `fexmem` FOREIGN KEY (`m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkexamdate` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `grade`
--
ALTER TABLE `grade`
  ADD CONSTRAINT `fkgrade` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmem` FOREIGN KEY (`m_nId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `member_course`
--
ALTER TABLE `member_course`
  ADD CONSTRAINT `fkcc` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkcccc` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkmembercourseid` FOREIGN KEY (`c_id`) REFERENCES `course` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `practical_work`
--
ALTER TABLE `practical_work`
  ADD CONSTRAINT `fkpracticaldoc` FOREIGN KEY (`d_id`) REFERENCES `doc` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fkpracticalposter` FOREIGN KEY (`m_posterId`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sub_doc`
--
ALTER TABLE `sub_doc`
  ADD CONSTRAINT `fksubdoc` FOREIGN KEY (`d_id`) REFERENCES `doc` (`d_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fksubdocmember` FOREIGN KEY (`sh_posterid`) REFERENCES `member` (`m_nId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
