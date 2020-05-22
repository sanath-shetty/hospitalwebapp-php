-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 27, 2020 at 06:36 AM
-- Server version: 5.7.26
-- PHP Version: 7.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `a_id` int(11) NOT NULL AUTO_INCREMENT,
  `a_name` varchar(30) NOT NULL,
  `a_mail` varchar(30) NOT NULL,
  `a_pswd` varchar(30) NOT NULL,
  `a_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`a_id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_mail`, `a_pswd`, `a_status`) VALUES
(1, 'sannu', 'mainadmin@gmail.com', 'admin123', '1');

-- --------------------------------------------------------

--
-- Table structure for table `appointment`
--

DROP TABLE IF EXISTS `appointment`;
CREATE TABLE IF NOT EXISTS `appointment` (
  `apnt_id` int(11) NOT NULL AUTO_INCREMENT,
  `dadmin_id` int(10) NOT NULL,
  `p_name` varchar(50) NOT NULL,
  `contact` int(10) NOT NULL,
  `s_id` int(11) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `apnt_date` date NOT NULL,
  `apnt_time` time NOT NULL,
  PRIMARY KEY (`apnt_id`),
  KEY `s_id` (`s_id`),
  KEY `doc_id` (`doc_id`),
  KEY `dadmin_id` (`dadmin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `appointment`
--

INSERT INTO `appointment` (`apnt_id`, `dadmin_id`, `p_name`, `contact`, `s_id`, `doc_id`, `apnt_date`, `apnt_time`) VALUES
(3, 1, 'Sukesh H', 1234567890, 6, 3, '2025-07-02', '13:01:00'),
(4, 1, 'Sukesh H', 1234567890, 6, 3, '2030-05-25', '12:50:00'),
(5, 1, 'Karl Marks', 1234567890, 5, 1, '2020-05-25', '02:30:00'),
(6, 1, 'Mauls Harris', 1234567890, 5, 1, '2020-03-25', '12:30:00'),
(7, 1, 'Kamal L', 1234567890, 6, 3, '2030-05-25', '03:00:00'),
(16, 1, 'Sukesh H', 1234567890, 6, 3, '2030-05-25', '15:30:00');

-- --------------------------------------------------------

--
-- Table structure for table `a_doctor`
--

DROP TABLE IF EXISTS `a_doctor`;
CREATE TABLE IF NOT EXISTS `a_doctor` (
  `dadmin_id` int(10) NOT NULL AUTO_INCREMENT,
  `da_name` varchar(30) NOT NULL,
  `da_email` varchar(50) NOT NULL,
  `da_pswd` varchar(50) NOT NULL,
  PRIMARY KEY (`dadmin_id`),
  KEY `dadmin_id` (`dadmin_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_doctor`
--

INSERT INTO `a_doctor` (`dadmin_id`, `da_name`, `da_email`, `da_pswd`) VALUES
(1, 'user1', 'user1@gmail.com', 'user123');

-- --------------------------------------------------------

--
-- Table structure for table `a_patient`
--

DROP TABLE IF EXISTS `a_patient`;
CREATE TABLE IF NOT EXISTS `a_patient` (
  `padmin_id` int(10) NOT NULL AUTO_INCREMENT,
  `pa_name` varchar(30) NOT NULL,
  `pa_email` varchar(50) NOT NULL,
  `pa_pswd` varchar(50) NOT NULL,
  `pa_status` enum('0','1') NOT NULL DEFAULT '1',
  PRIMARY KEY (`padmin_id`),
  UNIQUE KEY `pa_email` (`pa_email`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `a_patient`
--

INSERT INTO `a_patient` (`padmin_id`, `pa_name`, `pa_email`, `pa_pswd`, `pa_status`) VALUES
(1, 'mastru', 'mastru@davinci.com', 'newpswd', '1');

-- --------------------------------------------------------

--
-- Table structure for table `building`
--

DROP TABLE IF EXISTS `building`;
CREATE TABLE IF NOT EXISTS `building` (
  `bld_id` int(11) NOT NULL AUTO_INCREMENT,
  `bld_name` varchar(100) NOT NULL,
  PRIMARY KEY (`bld_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `building`
--

INSERT INTO `building` (`bld_id`, `bld_name`) VALUES
(1, 'Suraksha'),
(2, 'Anupama'),
(3, 'Akshaya');

-- --------------------------------------------------------

--
-- Table structure for table `doctor_data`
--

DROP TABLE IF EXISTS `doctor_data`;
CREATE TABLE IF NOT EXISTS `doctor_data` (
  `doc_id` int(11) NOT NULL AUTO_INCREMENT,
  `dadmin_id` int(10) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `doc_img` varchar(100) DEFAULT NULL,
  `l_name` varchar(30) NOT NULL,
  `dob_date` date NOT NULL,
  `age` int(10) NOT NULL,
  `blood` varchar(10) NOT NULL,
  `t_add` text NOT NULL,
  `p_add` text NOT NULL,
  `st_id` int(50) NOT NULL,
  `city` varchar(50) NOT NULL,
  `pin` int(10) NOT NULL,
  `contact` int(15) NOT NULL,
  `q_id` int(11) NOT NULL,
  `s_id` int(11) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`doc_id`),
  KEY `st_id` (`st_id`),
  KEY `q_id` (`q_id`),
  KEY `s_id` (`s_id`),
  KEY `dadmin_id` (`dadmin_id`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `doctor_data`
--

INSERT INTO `doctor_data` (`doc_id`, `dadmin_id`, `f_name`, `doc_img`, `l_name`, `dob_date`, `age`, `blood`, `t_add`, `p_add`, `st_id`, `city`, `pin`, `contact`, `q_id`, `s_id`, `status`) VALUES
(1, 1, 'Sanath', '1.jpg', 'Shetty', '1998-04-09', 29, 'O+ve', 'Managlore', 'Bedra', 1, 'Mangalore', 575002, 1234567890, 7, 5, '1'),
(3, 1, 'Markus', 'c2.jpg', 'Lance', '2012-02-08', 35, 'B+ve', 'Bikarnakatte, Mangalore', 'Bikarnakatte, Mangalore', 1, 'Udupi', 575002, 1234567890, 3, 6, '1'),
(4, 1, 'Dinesh', 't7.jpg', 'Shetty', '1960-08-09', 60, 'O+ve', 'Bejai, Mangalore', 'Gorigudda, Mangalore', 1, 'Mangalore', 575002, 1234567890, 3, 2, '1'),
(13, 1, 'Mastru', '2.jpg', 'Bikarnakatte', '1990-10-31', 30, 'B+ve', 'DaVinci, Mangalore', 'Bikarnakatte, Mangalore', 13, 'Mangalore', 575005, 1234567890, 4, 8, '1');

-- --------------------------------------------------------

--
-- Table structure for table `d_qualific`
--

DROP TABLE IF EXISTS `d_qualific`;
CREATE TABLE IF NOT EXISTS `d_qualific` (
  `q_id` int(11) NOT NULL AUTO_INCREMENT,
  `q_name` varchar(50) NOT NULL,
  PRIMARY KEY (`q_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_qualific`
--

INSERT INTO `d_qualific` (`q_id`, `q_name`) VALUES
(1, 'hry'),
(2, 'MA'),
(3, 'MBBS'),
(4, 'MCCB'),
(5, 'ACC'),
(6, 'MRF'),
(7, 'MICHELIN');

-- --------------------------------------------------------

--
-- Table structure for table `d_specl`
--

DROP TABLE IF EXISTS `d_specl`;
CREATE TABLE IF NOT EXISTS `d_specl` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT,
  `s_name` varchar(50) NOT NULL,
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `d_specl`
--

INSERT INTO `d_specl` (`s_id`, `s_name`) VALUES
(1, 'Cancer Care'),
(2, 'Cardiology'),
(3, 'Neurology'),
(4, 'Neurosurgery'),
(5, 'Spine Care'),
(6, 'Joint Replacement'),
(8, 'Urology'),
(9, 'Dental Care'),
(10, 'Physiotherapy');

-- --------------------------------------------------------

--
-- Table structure for table `patient_data`
--

DROP TABLE IF EXISTS `patient_data`;
CREATE TABLE IF NOT EXISTS `patient_data` (
  `p_id` varchar(30) NOT NULL,
  `f_name` varchar(30) NOT NULL,
  `l_name` varchar(30) NOT NULL,
  `date` date NOT NULL,
  `age` int(11) NOT NULL,
  `blood_group` varchar(10) NOT NULL,
  `contact` int(10) NOT NULL,
  `address` varchar(100) NOT NULL,
  `st_id` int(50) NOT NULL,
  `city` varchar(30) NOT NULL,
  `pin` int(10) NOT NULL,
  `job` varchar(30) NOT NULL,
  `email` varchar(50) NOT NULL,
  `height` int(10) NOT NULL,
  `weight` int(10) NOT NULL,
  `health_issue` varchar(50) DEFAULT NULL,
  `others_issue` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`p_id`),
  KEY `st_id` (`st_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `patient_data`
--

INSERT INTO `patient_data` (`p_id`, `f_name`, `l_name`, `date`, `age`, `blood_group`, `contact`, `address`, `st_id`, `city`, `pin`, `job`, `email`, `height`, `weight`, `health_issue`, `others_issue`) VALUES
('P01', 'Samarth', 'Roy', '2000-01-01', 20, 'O+ve', 1234567890, 'PVS, Mangalore', 1, 'Mangalore', 575002, 'Student', 'abc@gmail.com', 6, 70, '', '');

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

DROP TABLE IF EXISTS `state`;
CREATE TABLE IF NOT EXISTS `state` (
  `st_id` int(50) NOT NULL AUTO_INCREMENT,
  `st_name` varchar(50) NOT NULL,
  PRIMARY KEY (`st_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`st_id`, `st_name`) VALUES
(1, 'Karnataka'),
(3, 'Tamil Nadu'),
(4, 'Kerala'),
(5, 'Maharastra'),
(6, 'Andra Pradesh'),
(7, 'Odissa'),
(8, 'Delhi'),
(9, 'Gujarath'),
(10, 'Rajasthan'),
(11, 'Punjab'),
(12, 'Haryana'),
(13, 'Jammu & Kashmir'),
(14, 'Jharkhand'),
(15, 'Arunachal Pradesh');

-- --------------------------------------------------------

--
-- Table structure for table `visited`
--

DROP TABLE IF EXISTS `visited`;
CREATE TABLE IF NOT EXISTS `visited` (
  `visit_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(30) NOT NULL,
  `doc_id` int(11) NOT NULL,
  `bld_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `vis_date` date NOT NULL,
  PRIMARY KEY (`visit_id`),
  KEY `p_id` (`p_id`),
  KEY `doc_id` (`doc_id`),
  KEY `bld_id` (`bld_id`),
  KEY `w_id` (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=64 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `visited`
--

INSERT INTO `visited` (`visit_id`, `p_id`, `doc_id`, `bld_id`, `w_id`, `vis_date`) VALUES
(63, 'P01', 13, 3, 13, '2020-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

DROP TABLE IF EXISTS `ward`;
CREATE TABLE IF NOT EXISTS `ward` (
  `w_id` int(11) NOT NULL AUTO_INCREMENT,
  `bld_id` int(11) NOT NULL,
  `w_num` int(10) NOT NULL,
  `status` enum('0','1') NOT NULL DEFAULT '0',
  PRIMARY KEY (`w_id`),
  KEY `bld_name` (`bld_id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`w_id`, `bld_id`, `w_num`, `status`) VALUES
(1, 3, 101, '1'),
(2, 3, 102, '0'),
(3, 3, 103, '0'),
(4, 3, 104, '0'),
(5, 3, 105, '1'),
(6, 3, 106, '1'),
(7, 3, 107, '0'),
(8, 3, 108, '0'),
(9, 3, 201, '1'),
(10, 3, 202, '0'),
(11, 3, 203, '0'),
(12, 3, 204, '0'),
(13, 3, 205, '0'),
(14, 3, 206, '1'),
(15, 3, 207, '0'),
(16, 3, 208, '0'),
(17, 2, 111, '1'),
(18, 2, 112, '1'),
(19, 2, 113, '1'),
(20, 2, 114, '0'),
(21, 2, 115, '0'),
(22, 2, 116, '0'),
(23, 2, 117, '0'),
(24, 2, 118, '1'),
(25, 2, 121, '0'),
(26, 2, 122, '0'),
(27, 2, 123, '0'),
(28, 2, 124, '1'),
(29, 2, 125, '0'),
(30, 2, 126, '0'),
(31, 2, 127, '0'),
(32, 2, 128, '0');

-- --------------------------------------------------------

--
-- Table structure for table `ward_asgn`
--

DROP TABLE IF EXISTS `ward_asgn`;
CREATE TABLE IF NOT EXISTS `ward_asgn` (
  `wasgn_id` int(11) NOT NULL AUTO_INCREMENT,
  `p_id` varchar(30) NOT NULL,
  `bld_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  PRIMARY KEY (`wasgn_id`),
  KEY `ptnt_id` (`p_id`),
  KEY `building_id` (`bld_id`),
  KEY `ward_id` (`w_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ward_asgn`
--

INSERT INTO `ward_asgn` (`wasgn_id`, `p_id`, `bld_id`, `w_id`) VALUES
(17, 'P01', 3, 13);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `appointment`
--
ALTER TABLE `appointment`
  ADD CONSTRAINT `admin_apnt` FOREIGN KEY (`dadmin_id`) REFERENCES `a_doctor` (`dadmin_id`),
  ADD CONSTRAINT `docid_apnt` FOREIGN KEY (`doc_id`) REFERENCES `doctor_data` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specl_apnt` FOREIGN KEY (`s_id`) REFERENCES `d_specl` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `doctor_data`
--
ALTER TABLE `doctor_data`
  ADD CONSTRAINT `addbyadmin` FOREIGN KEY (`dadmin_id`) REFERENCES `a_doctor` (`dadmin_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `quali` FOREIGN KEY (`q_id`) REFERENCES `d_qualific` (`q_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `specl` FOREIGN KEY (`s_id`) REFERENCES `d_specl` (`s_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `state_name` FOREIGN KEY (`st_id`) REFERENCES `state` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `patient_data`
--
ALTER TABLE `patient_data`
  ADD CONSTRAINT `state_key` FOREIGN KEY (`st_id`) REFERENCES `state` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visited`
--
ALTER TABLE `visited`
  ADD CONSTRAINT `buildId` FOREIGN KEY (`bld_id`) REFERENCES `building` (`bld_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `doctorData` FOREIGN KEY (`doc_id`) REFERENCES `doctor_data` (`doc_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `patientData` FOREIGN KEY (`p_id`) REFERENCES `patient_data` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `wardId` FOREIGN KEY (`w_id`) REFERENCES `ward` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ward`
--
ALTER TABLE `ward`
  ADD CONSTRAINT `building_name` FOREIGN KEY (`bld_id`) REFERENCES `building` (`bld_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ward_asgn`
--
ALTER TABLE `ward_asgn`
  ADD CONSTRAINT `building_id` FOREIGN KEY (`bld_id`) REFERENCES `building` (`bld_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ptnt_id` FOREIGN KEY (`p_id`) REFERENCES `patient_data` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ward_id` FOREIGN KEY (`w_id`) REFERENCES `ward` (`w_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
