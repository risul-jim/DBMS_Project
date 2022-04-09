-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 09, 2022 at 07:27 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hospital_management`
--

DELIMITER $$
--
-- Procedures
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `add_ward` (IN `in_id` INT, IN `in_name` VARCHAR(255))  INSERT INTO ward(w_id,w_name) VALUES(in_id,in_name)$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `doctor`
--

CREATE TABLE `doctor` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(255) NOT NULL,
  `w_id` int(11) NOT NULL,
  `d_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `doctor`
--

INSERT INTO `doctor` (`d_id`, `d_name`, `w_id`, `d_add`) VALUES
(1, 'Mofiz', 2, 'Bogura'),
(1001, ' Rakib', 1, 'CTG'),
(1002, 'Latif', 3, 'Dinajpur'),
(1003, 'Mukul', 2, 'Tangail'),
(1004, 'Runu', 4, 'Dhaka'),
(1005, 'Ashraf', 5, 'Rajshahi'),
(1006, 'Sultana', 6, 'Natore'),
(1007, 'Suranjana', 4, 'Dhaka'),
(1009, ' Azad', 6, 'Rangour');

-- --------------------------------------------------------

--
-- Stand-in structure for view `doc_info`
-- (See below for the actual view)
--
CREATE TABLE `doc_info` (
`d_name` varchar(255)
,`d_add` varchar(255)
,`w_name` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `p_id` int(11) NOT NULL,
  `p_name` varchar(255) NOT NULL,
  `w_id` int(11) NOT NULL,
  `p_add` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`p_id`, `p_name`, `w_id`, `p_add`) VALUES
(1, ' Jim', 1, 'Tangail'),
(3001, ' Shayla', 4, 'Dhaka'),
(3052, ' Chowa', 2, 'Savar'),
(3214, ' Tumpa', 2, 'Savar'),
(3610, ' Jaky', 6, 'Bogura'),
(3623, ' Rahat', 3, 'Cumilla'),
(3675, ' Risul', 5, 'Tangail');

--
-- Triggers `patient`
--
DELIMITER $$
CREATE TRIGGER `add_patient` AFTER INSERT ON `patient` FOR EACH ROW INSERT INTO patient_log(id,p_id,time,event) VALUES(null,new.p_id,NOW(),"Insertion")
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `delete_patient` AFTER DELETE ON `patient` FOR EACH ROW INSERT INTO patient_log(id,p_id,time,event) VALUES(null,OLD.p_id,now(),"Deletion")
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `patient_log`
--

CREATE TABLE `patient_log` (
  `id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `time` date NOT NULL,
  `event` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `registration`
--

CREATE TABLE `registration` (
  `r_id` int(11) NOT NULL,
  `p_id` int(11) NOT NULL,
  `w_id` int(11) NOT NULL,
  `r_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `registration`
--

INSERT INTO `registration` (`r_id`, `p_id`, `w_id`, `r_date`) VALUES
(1, 1, 1, '20/03/2022'),
(2, 1, 2, '01/04/2022');

-- --------------------------------------------------------

--
-- Table structure for table `ward`
--

CREATE TABLE `ward` (
  `w_id` int(11) NOT NULL,
  `w_name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ward`
--

INSERT INTO `ward` (`w_id`, `w_name`) VALUES
(1, 'General'),
(2, 'Children'),
(3, 'Cardio'),
(4, 'Maternity'),
(5, 'Medicine'),
(6, 'Autism'),
(7, 'Emergency(ICU)');

-- --------------------------------------------------------

--
-- Structure for view `doc_info`
--
DROP TABLE IF EXISTS `doc_info`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `doc_info`  AS SELECT `doctor`.`d_name` AS `d_name`, `doctor`.`d_add` AS `d_add`, `ward`.`w_name` AS `w_name` FROM (`doctor` join `ward`) WHERE `doctor`.`w_id` = `ward`.`w_id` ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `doctor`
--
ALTER TABLE `doctor`
  ADD PRIMARY KEY (`d_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `patient_log`
--
ALTER TABLE `patient_log`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration`
--
ALTER TABLE `registration`
  ADD PRIMARY KEY (`r_id`),
  ADD KEY `p_id` (`p_id`),
  ADD KEY `w_id` (`w_id`);

--
-- Indexes for table `ward`
--
ALTER TABLE `ward`
  ADD PRIMARY KEY (`w_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patient_log`
--
ALTER TABLE `patient_log`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `registration`
--
ALTER TABLE `registration`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `doctor`
--
ALTER TABLE `doctor`
  ADD CONSTRAINT `doctor_ibfk_1` FOREIGN KEY (`w_id`) REFERENCES `ward` (`w_id`);

--
-- Constraints for table `patient`
--
ALTER TABLE `patient`
  ADD CONSTRAINT `patient_ibfk_1` FOREIGN KEY (`w_id`) REFERENCES `ward` (`w_id`);

--
-- Constraints for table `registration`
--
ALTER TABLE `registration`
  ADD CONSTRAINT `registration_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `patient` (`p_id`),
  ADD CONSTRAINT `registration_ibfk_2` FOREIGN KEY (`w_id`) REFERENCES `ward` (`w_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
