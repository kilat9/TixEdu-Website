-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Oct 25, 2020 at 07:56 AM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tixedu`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrator_t`
--

DROP TABLE IF EXISTS `administrator_t`;
CREATE TABLE IF NOT EXISTS `administrator_t` (
  `admin_id` int(11) NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(50) NOT NULL,
  `admin_age` int(11) NOT NULL,
  `admin_gender` varchar(6) NOT NULL,
  `admin_dob` date NOT NULL,
  `admin_phone_number` varchar(12) NOT NULL,
  `admin_address` varchar(50) NOT NULL,
  `admin_email` varchar(40) NOT NULL,
  `admin_username` varchar(25) NOT NULL,
  `admin_password` varchar(40) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `administrator_t`
--

INSERT INTO `administrator_t` (`admin_id`, `admin_name`, `admin_age`, `admin_gender`, `admin_dob`, `admin_phone_number`, `admin_address`, `admin_email`, `admin_username`, `admin_password`) VALUES
(1, 'test', 34, 'male', '2020-09-09', '012537383', 'Gombak', 'testing123@apu.com', 'test', 'pass'),
(4, 'Siti Nurhaliza', 27, 'female', '2017-06-08', '01222222222', 'Flat Raver, Bandar Tun Razak', 'siti@tepisungai.com', 'ali', 'albab'),
(5, 'Tnee Jonah Pan Kuantzer', 40, 'male', '1986-04-08', '01287452637', '9, jalan flora fuana, taman sri indah, 68000 Ampan', 'TneeJonah@mail.com', 'jonahpan', 'jonahT77'),
(6, 'Hidayah Binti Zamarul', 36, 'female', '1997-03-09', '0156257382', '10, Jalan Muhibbah, Taman Damai, 68000 Ampang Sela', 'hidayah@mail.apu.com', 'hidayahzam', 'zamzam33'),
(7, 'Hasniza Binti Abdul Muhabeeb', 55, 'female', '1985-11-07', '0126835261', '200, Jalan Tempoh Sereh, Kampung Sereh Pinang, 520', 'hasabdul@gmail.com', 'hasadul', 'hasabdul00');

-- --------------------------------------------------------

--
-- Table structure for table `courses_t`
--

DROP TABLE IF EXISTS `courses_t`;
CREATE TABLE IF NOT EXISTS `courses_t` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT,
  `course_name` varchar(50) NOT NULL,
  `course_description` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `course_category` varchar(50) NOT NULL,
  `course_icon` varchar(40) DEFAULT NULL,
  `lect_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`),
  KEY `lect_id` (`lect_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `courses_t`
--

INSERT INTO `courses_t` (`course_id`, `course_name`, `course_description`, `course_category`, `course_icon`, `lect_id`) VALUES
(1, 'Web Development', 'Learn the basics of web design & styling with HTML & CSS', 'Information Technology', 'bx bxl-html5', 1),
(3, 'Visual Basic', 'Visual Basic is a beginner friendly language for to start learning about object oriented programming', 'Information Technology', 'bx bx-slideshow', 4),
(4, 'Macroeconomics', 'Learn how a national economy works, including the determination of equilibrium levels of national income and prices', 'Economics', 'icofont-price', 5),
(5, 'Blockchain', 'Learn about the new technology and how it processes cryptocurrency transactions across an open and distributed ledger', 'Economics', 'icofont-bitcoin', 6);

-- --------------------------------------------------------

--
-- Table structure for table `course_content_t`
--

DROP TABLE IF EXISTS `course_content_t`;
CREATE TABLE IF NOT EXISTS `course_content_t` (
  `course_id` int(11) NOT NULL,
  `content_week` int(11) NOT NULL,
  `content_title` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `content_media` varchar(255) NOT NULL,
  `lect_id` int(11) NOT NULL,
  PRIMARY KEY (`course_id`,`content_week`),
  KEY `lect_id` (`lect_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `course_content_t`
--

INSERT INTO `course_content_t` (`course_id`, `content_week`, `content_title`, `content_media`, `lect_id`) VALUES
(1, 0, 'HTML & CSS Crash Course Tutorial - Introduction', 'hu-q2zYwEYs', 1),
(1, 1, 'HTML & CSS Crash Course Tutorial #1 - HTML Basics', 'mbeT8mpmtHA', 1),
(1, 2, 'HTML & CSS Crash Course Tutorial #2 - HTML Forms', 'YwbIeMlxZAU', 1),
(1, 3, 'HTML & CSS Crash Course Tutorial #3 - CSS Basics', 'D3iEE29ZXRM', 1),
(1, 4, 'HTML & CSS Crash Course Tutorial #4 - CSS Classes ', 'FHZn6706e3Q', 1),
(1, 5, 'HTML & CSS Crash Course Tutorial #5 - HTML 5 Semantics', 'kGW8Al_cga4', 1),
(1, 6, 'HTML & CSS Crash Course Tutorial #6 - Chrome Dev Tools', '25R1Jl5P7Mw', 1),
(1, 7, 'HTML & CSS Crash Course Tutorial #7 - CSS Layout & Position', 'XQaHAAXIVg8', 1),
(1, 8, 'HTML & CSS Crash Course Tutorial #8 - Pseudo Classes & Elements', 'FMu2cKWD90g', 1),
(1, 9, 'HTML & CSS Crash Course Tutorial #9 - Intro to Media Queries', 'Xig7NsIE6DI', 1),
(3, 0, 'Visual Basic Tutorial 1 - GUI Design, Event Handling, Data Types, Math', '3FkWddODLno', 4),
(3, 1, 'Visual Basic Tutorial 2 - Math Functions, Strings, Dates, and more', 'gjU-JEY0gRc', 4),
(3, 2, 'Visual Basic Tutorial 3 - If, Else, ElseIf, Select Case, and more', 'WOnhmfR3z_M', 4),
(3, 3, 'Visual Basic Tutorial 4 - Constants, Enumerations, Structures, Classes', 'XI_2N1hd7ZU', 4),
(3, 4, 'Visual Basic Tutorial 5 - Shared Properties, Shared Methods, Saving Fi', '8UUCUqt9oY0', 4),
(3, 5, 'Visual Basic Tutorial 6 - Menu Bars, Tool Bars, and more', '5nahqfJTQXs', 4),
(4, 0, 'Macroeconomics - Introduction', 'F0hI30ysBV0', 5),
(4, 1, 'Macroeconomics #1 - Macroeconomics Objectives', 'w4DdLDCwYag', 5),
(4, 2, 'Macroeconomics #2 - GDP and Economic Growth', '5aztbCBQYfc', 5),
(4, 3, 'Macroeconomics #3 - Economic Growth', 'CkuB-CZ_rPw', 5),
(4, 4, 'Macroeconomics #4 - Circular Flow of Income', 'oG8A_y3YQMQ', 5),
(4, 5, 'Macroeconomics #5 - Introduction to Multiplier', 'ToForrgBJW8', 5),
(4, 6, 'Macroeconomics #6 - Balance of Payments', 'RWtj4593hGY', 5),
(4, 7, 'Macroeconomics #7 - Fiscal Policy', 'hIgSsj8Mo08', 5),
(4, 8, 'Macroeconomics #8 - Monetary Policy', 'NE0vZRbh1g8', 5),
(4, 9, 'Macroeconomics #9 - Inflation', 'DlIlMu_r46s', 5),
(5, 0, 'Blockchain - What is Blockchain?', 'T0hNDsRcrhA', 6),
(5, 1, 'Blockchain #1 - Types of Blockchain', 'MV3N-HoyOfk', 6),
(5, 2, 'Blockchain #2 - What is Consensus?', 'aAf4UScijYQ', 6),
(5, 3, 'Blockchain #3 - What is Blockchain 1.0, 2.0, and 3.0?', '2C7Dn9a-eFY', 6),
(5, 4, 'Blockchain #4 - Why Private Blockchain?', 'e40D3BcFIQ8', 6),
(5, 5, 'Blockchain #5 - What Does Block Contains in Blockchain?', '2dL-SHoXc2E', 6),
(5, 6, 'Blockchain #6 - How Blockchain is Different with other Database?', 'jluFETFc4Co', 6),
(5, 7, 'Blockchain #7 - What is Hash?', '5jnSImGYE10', 6),
(5, 8, 'Blockchain #8 - How to Access Blockchain?', 'P6xTk5oc16U', 6),
(5, 9, 'Blockchain #9 - Difference Between Transaction Data & Transaction', 'U9M1p6czwzk', 6);

-- --------------------------------------------------------

--
-- Table structure for table `enquiry_t`
--

DROP TABLE IF EXISTS `enquiry_t`;
CREATE TABLE IF NOT EXISTS `enquiry_t` (
  `enq_id` int(11) NOT NULL AUTO_INCREMENT,
  `enq_name` varchar(50) NOT NULL,
  `enq_email` varchar(40) NOT NULL,
  `enq_subject` varchar(40) NOT NULL,
  `enq_message` varchar(255) NOT NULL,
  `stu_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`enq_id`),
  KEY `stu_id` (`stu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `enquiry_t`
--

INSERT INTO `enquiry_t` (`enq_id`, `enq_name`, `enq_email`, `enq_subject`, `enq_message`, `stu_id`) VALUES
(1, 'Ali Ahmed', 'ali@sdf.com', 'test', 'pass', 0),
(2, 'Ali bin Ahmed', 'ali@ahmed.com', 'test2', 'pass2', 0),
(3, 'Zubairullah Bin Muhamid', 'zubair@gmail.com', 'Hi u are beautiful', 'I am Student Cool', 2),
(4, 'Mikail', 'bazzi@gmail.com', 'Hi how are you', 'pls contact me i need help', 0);

-- --------------------------------------------------------

--
-- Table structure for table `lecturer_t`
--

DROP TABLE IF EXISTS `lecturer_t`;
CREATE TABLE IF NOT EXISTS `lecturer_t` (
  `lect_id` int(11) NOT NULL AUTO_INCREMENT,
  `lect_name` varchar(50) NOT NULL,
  `lect_age` int(11) NOT NULL,
  `lect_gender` varchar(6) NOT NULL,
  `lect_dob` date NOT NULL,
  `lect_phone_number` varchar(12) NOT NULL,
  `lect_address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `lect_email` varchar(40) NOT NULL,
  `lect_username` varchar(25) NOT NULL,
  `lect_password` varchar(40) NOT NULL,
  PRIMARY KEY (`lect_id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `lecturer_t`
--

INSERT INTO `lecturer_t` (`lect_id`, `lect_name`, `lect_age`, `lect_gender`, `lect_dob`, `lect_phone_number`, `lect_address`, `lect_email`, `lect_username`, `lect_password`) VALUES
(1, 'John Ingersoll', 47, 'male', '1978-12-18', '0128942174', 'No, 19, Taman Maju, Jalan Tunku Abdul Rahman, 79150 Johor Bahru', 'john@media.edu.my', 'johnIngersoll', 'john123'),
(4, 'Ahmad Faris', 25, 'male', '1982-04-05', '0128725362', '9, Jalan SG3/1 Taman Sri Gombak 68100 Batu Caves, Selangor', 'farisamy@gmail.com', 'amyfaris', 'amy2309'),
(5, 'Irfan Zamri', 28, 'male', '1992-04-08', '0137628492', '10, Jalan Taman Minang 56100 Cheras, Wilayah Persekutuan Kuala Lumpur', 'irf4n@mail.apu.edu.my', 'zamrifan', 'zarifan22'),
(6, 'Maisarah Binti Iskandar', 23, 'female', '1982-03-08', '0167267837', '10, Jalan Sri Petaling, 57000 Sri Petaling, Wilayah Persekutuan Kuala Lumpur', 'maihi@gmail.com', 'maisarahmhi', 'mhiskandar'),
(7, 'Mohamed Abaidolah', 34, 'male', '1954-02-08', '0127387462', '10, Jalan Taman Bestari, Taman Bestari, 68000 Ampang Selangor', 'Abai@mail.apu.com', 'mohamed', 'abai222');

-- --------------------------------------------------------

--
-- Table structure for table `student_course_t`
--

DROP TABLE IF EXISTS `student_course_t`;
CREATE TABLE IF NOT EXISTS `student_course_t` (
  `stu_id` int(11) NOT NULL,
  `course_id` int(11) NOT NULL,
  `sc_week` int(11) NOT NULL,
  `sc_progress` int(11) NOT NULL,
  PRIMARY KEY (`stu_id`,`course_id`),
  KEY `course_id` (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_course_t`
--

INSERT INTO `student_course_t` (`stu_id`, `course_id`, `sc_week`, `sc_progress`) VALUES
(1, 1, 10, 100),
(1, 3, 6, 100),
(2, 3, 1, 17),
(2, 1, 3, 30),
(1, 5, 0, 0),
(2, 4, 0, 0),
(1, 4, 0, 0),
(4, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `student_t`
--

DROP TABLE IF EXISTS `student_t`;
CREATE TABLE IF NOT EXISTS `student_t` (
  `stu_id` int(11) NOT NULL AUTO_INCREMENT,
  `stu_name` varchar(50) NOT NULL,
  `stu_age` int(11) NOT NULL,
  `stu_gender` varchar(6) NOT NULL,
  `stu_dob` date NOT NULL,
  `stu_phone_number` varchar(12) NOT NULL,
  `stu_address` varchar(70) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `stu_email` varchar(40) NOT NULL,
  `stu_username` varchar(25) NOT NULL,
  `stu_password` varchar(40) NOT NULL,
  PRIMARY KEY (`stu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `student_t`
--

INSERT INTO `student_t` (`stu_id`, `stu_name`, `stu_age`, `stu_gender`, `stu_dob`, `stu_phone_number`, `stu_address`, `stu_email`, `stu_username`, `stu_password`) VALUES
(1, 'Muhammad Afiq Bin Zubai', 22, 'female', '2020-09-11', '0179284738', '9, Jalan Gasing, Taman Harmoni, 75000 Melaka', 'afiq@mail.apu.edu.my', 'afiqstylo', 'Stylesz'),
(2, 'Zubairullah Bin Muhamid', 19, 'male', '2001-03-31', '0127368754', '10, Jalan Semporna, Taman Semporna 68100, Batu Caves, Selangor', 'zubair@gmail.com', 'zubairr', 'zubaircools'),
(3, 'Fatin Sofea Binti Zamrul', 20, 'female', '2000-10-15', '0197263672', '100, Jalan Taming Gedung, Taman Sri Gedung, 68000 Ampang Selangor', 'ftnsofea@hotmail.com', 'fatinzamrul', 'fszamrul09'),
(4, 'Zamariah Binti Ahmad', 18, 'female', '1995-04-07', '0127628374', '100, Jalan Semerong 3/5 Taman Semerong, 52000 Kuala Lumpur, WPKL', 'zmba@gmail.com', 'Zammyahmad', 'zammy241'),
(5, 'Muhammad Fuad Danish Bin Johari', 22, 'male', '1993-06-05', '0125637632', '5, Jalan Kepong Perdana 5/7, Taman Kepong, 51000, Kepong, WPKL', 'fdj@apu.edu.my', 'FDjohari', 'MFDJ92'),
(6, 'Siti Nur Zara Binti Jamarul Azman', 19, 'female', '1995-03-28', '0127347627', '36, Jalan Subang Permai, Taman Subang Permai, 47500 Subang Selangor', 'SNZ@hotmail.com', 'SNZJamarul', 'JJkajs121'),
(7, 'Kishen Shanthan A/L Jegathes', 19, 'male', '2001-11-21', '0129445233', '10, Jalan Sri Rempong 68000 Ampang Selangor', 'kishen@gmail.com', 'kishenshanthan', 'shanthan'),
(8, 'Muthu Raju Navakumar A/L Sivagangga', 20, 'male', '1993-03-06', '0126478273', '47, Jalan Gedung Permai, 52000 Cheras, WPKL', 'muthu@hotmail.com', 'Muthuraj', 'muthuj244'),
(9, 'Ooi Zhen Wei', 18, 'female', '1996-03-06', '0126578362', '100, Jalan 3/20, Taman Halia, 68000 Ampang, Selangor', 'ooizw@yahoomail.com', 'oooooizw', 'ozwei99'),
(10, 'Mei Mei Choong', 20, 'female', '2000-05-04', '0126473652', '4 Jalan Kasturi, Taman Limau 68100 Batu Caves Selangor', 'mmmeei@gmail.com', 'mmchoongmei', 'MeiMeiYangCantik'),
(11, 'Princess  Aura Nurr Emily Bin Jamal', 22, 'female', '1994-02-06', '0136478765', '8, Jalan Taming Kerbau, Taman Cicak 75000 Bandar Hilir Melaka', 'princess@gmail.com', 'pricessnurr', 'auraemilyxoxo');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
