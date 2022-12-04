-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 04, 2022 at 12:05 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `device_db`
--

-- --------------------------------------------------------

--
-- Stand-in structure for view `date_readings_v`
-- (See below for the actual view)
--
CREATE TABLE `date_readings_v` (
`date_entry` date
,`device` varchar(255)
);

-- --------------------------------------------------------

--
-- Table structure for table `devices_tbl`
--

CREATE TABLE `devices_tbl` (
  `t_id` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------

--
-- Stand-in structure for view `devices_v`
-- (See below for the actual view)
--
CREATE TABLE `devices_v` (
`device` varchar(255)
,`location` varchar(255)
,`date_added` varchar(22)
,`date_updated` timestamp
);

-- --------------------------------------------------------

--
-- Stand-in structure for view `readings_live_v`
-- (See below for the actual view)
--
CREATE TABLE `readings_live_v` (
`t_id` int(11)
,`device` varchar(255)
,`location` varchar(255)
,`sensor_data` tinyint(1)
,`time_entry` varchar(11)
,`date_entry` date
);

-- --------------------------------------------------------

--
-- Table structure for table `readings_tbl`
--

CREATE TABLE `readings_tbl` (
  `t_id` int(11) NOT NULL,
  `device_id` varchar(255) NOT NULL,
  `sensor_data` tinyint(1) NOT NULL,
  `t_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Stand-in structure for view `readings_v`
-- (See below for the actual view)
--
CREATE TABLE `readings_v` (
`t_id` int(11)
,`device` varchar(255)
,`sensor_data` tinyint(1)
,`location` varchar(255)
,`time_entry` varchar(11)
,`date_entry` date
,`t_stamp` timestamp
);

-- --------------------------------------------------------

--
-- Structure for view `date_readings_v`
--
DROP TABLE IF EXISTS `date_readings_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `date_readings_v`  AS SELECT cast(`readings_tbl`.`t_stamp` as date) AS `date_entry`, `devices_tbl`.`device_id` AS `device` FROM (`readings_tbl` join `devices_tbl` on(`devices_tbl`.`device_id` = `readings_tbl`.`device_id`)) GROUP BY cast(`readings_tbl`.`t_stamp` as date)  ;

-- --------------------------------------------------------

--
-- Structure for view `devices_v`
--
DROP TABLE IF EXISTS `devices_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `devices_v`  AS SELECT `devices_tbl`.`device_id` AS `device`, `devices_tbl`.`location` AS `location`, concat(cast(`devices_tbl`.`date_added` as date),' ',time_format(`devices_tbl`.`date_added`,'%r')) AS `date_added`, `devices_tbl`.`time_stamp` AS `date_updated` FROM `devices_tbl` GROUP BY `devices_tbl`.`device_id` ORDER BY `devices_tbl`.`location` ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `readings_live_v`
--
DROP TABLE IF EXISTS `readings_live_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `readings_live_v`  AS SELECT `readings_tbl`.`t_id` AS `t_id`, `devices_tbl`.`device_id` AS `device`, `devices_tbl`.`location` AS `location`, `readings_tbl`.`sensor_data` AS `sensor_data`, time_format(`readings_tbl`.`t_stamp`,'%r') AS `time_entry`, cast(`readings_tbl`.`t_stamp` as date) AS `date_entry` FROM (`readings_tbl` join `devices_tbl` on(`devices_tbl`.`device_id` = `readings_tbl`.`device_id`)) ORDER BY time_format(`readings_tbl`.`t_stamp`,'%r') ASC  ;

-- --------------------------------------------------------

--
-- Structure for view `readings_v`
--
DROP TABLE IF EXISTS `readings_v`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `readings_v`  AS SELECT `readings_tbl`.`t_id` AS `t_id`, `devices_tbl`.`device_id` AS `device`, `readings_tbl`.`sensor_data` AS `sensor_data`, `devices_tbl`.`location` AS `location`, time_format(`readings_tbl`.`t_stamp`,'%r') AS `time_entry`, cast(`readings_tbl`.`t_stamp` as date) AS `date_entry`, `readings_tbl`.`t_stamp` AS `t_stamp` FROM (`readings_tbl` join `devices_tbl` on(`devices_tbl`.`device_id` = `readings_tbl`.`device_id`)) ORDER BY cast(`readings_tbl`.`t_stamp` as date) ASC, time_format(`readings_tbl`.`t_stamp`,'%r') AS `DESCdesc` ASC  ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `devices_tbl`
--
ALTER TABLE `devices_tbl`
  ADD PRIMARY KEY (`t_id`,`device_id`);

--
-- Indexes for table `readings_tbl`
--
ALTER TABLE `readings_tbl`
  ADD PRIMARY KEY (`t_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `devices_tbl`
--
ALTER TABLE `devices_tbl`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `readings_tbl`
--
ALTER TABLE `readings_tbl`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1779;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
