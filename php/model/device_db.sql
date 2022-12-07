-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 07, 2022 at 01:37 AM
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
  `is_active` varchar(255) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `devices_tbl`
--

INSERT INTO `devices_tbl` (`t_id`, `device_id`, `location`, `date_added`, `is_active`, `time_stamp`) VALUES
(3, 'SWLMD-001', 'Location', '2022-12-05 15:06:46', '0', '2022-12-06 11:05:00');

-- --------------------------------------------------------

--
-- Stand-in structure for view `devices_v`
-- (See below for the actual view)
--
CREATE TABLE `devices_v` (
`device` varchar(255)
,`location` varchar(255)
,`is_active` varchar(255)
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
-- Dumping data for table `readings_tbl`
--

INSERT INTO `readings_tbl` (`t_id`, `device_id`, `sensor_data`, `t_stamp`) VALUES
(1779, 'SWLMD-001', 1, '2022-12-05 07:06:46'),
(1780, 'SWLMD-001', 1, '2022-12-05 07:06:52'),
(1781, 'SWLMD-001', 1, '2022-12-05 07:06:56'),
(1782, 'SWLMD-001', 1, '2022-12-05 07:06:58'),
(1783, 'SWLMD-001', 1, '2022-12-05 07:06:59'),
(1784, 'SWLMD-001', 1, '2022-12-05 07:07:01'),
(1785, 'SWLMD-001', 1, '2022-12-05 07:07:05'),
(1786, 'SWLMD-001', 1, '2022-12-05 07:07:06'),
(1787, 'SWLMD-001', 1, '2022-12-05 07:07:08'),
(1788, 'SWLMD-001', 1, '2022-12-05 07:07:14'),
(1789, 'SWLMD-001', 1, '2022-12-05 07:07:18'),
(1790, 'SWLMD-001', 1, '2022-12-05 07:07:25'),
(1791, 'SWLMD-001', 1, '2022-12-05 07:07:29'),
(1792, 'SWLMD-001', 1, '2022-12-05 07:07:30'),
(1793, 'SWLMD-001', 1, '2022-12-05 07:07:34'),
(1794, 'SWLMD-001', 1, '2022-12-05 07:07:35'),
(1795, 'SWLMD-001', 1, '2022-12-05 07:17:55'),
(1796, 'SWLMD-001', 1, '2022-12-05 07:17:56'),
(1797, 'SWLMD-001', 1, '2022-12-05 07:17:57'),
(1798, 'SWLMD-001', 1, '2022-12-05 07:17:58'),
(1799, 'SWLMD-001', 1, '2022-12-05 07:17:59'),
(1800, 'SWLMD-001', 1, '2022-12-05 07:18:00'),
(1801, 'SWLMD-001', 1, '2022-12-05 07:18:01'),
(1802, 'SWLMD-001', 1, '2022-12-05 07:18:03'),
(1803, 'SWLMD-001', 1, '2022-12-05 07:18:09'),
(1804, 'SWLMD-001', 1, '2022-12-05 07:18:15'),
(1805, 'SWLMD-001', 1, '2022-12-05 07:18:21'),
(1806, 'SWLMD-001', 1, '2022-12-05 07:18:27'),
(1807, 'SWLMD-001', 1, '2022-12-05 07:18:33'),
(1808, 'SWLMD-001', 1, '2022-12-05 07:18:39'),
(1809, 'SWLMD-001', 1, '2022-12-05 07:18:45'),
(1810, 'SWLMD-001', 1, '2022-12-05 07:18:51'),
(1811, 'SWLMD-001', 1, '2022-12-05 07:18:57'),
(1812, 'SWLMD-001', 1, '2022-12-05 07:19:03'),
(1813, 'SWLMD-001', 1, '2022-12-05 07:19:09'),
(1814, 'SWLMD-001', 1, '2022-12-05 07:19:15'),
(1815, 'SWLMD-001', 1, '2022-12-05 07:19:21'),
(1816, 'SWLMD-001', 1, '2022-12-05 07:19:27'),
(1817, 'SWLMD-001', 1, '2022-12-05 07:19:33'),
(1818, 'SWLMD-001', 1, '2022-12-05 07:19:39'),
(1819, 'SWLMD-001', 1, '2022-12-05 07:19:45'),
(1820, 'SWLMD-001', 1, '2022-12-05 07:19:51'),
(1821, 'SWLMD-001', 1, '2022-12-05 07:19:57'),
(1822, 'SWLMD-001', 1, '2022-12-05 07:20:03'),
(1823, 'SWLMD-001', 1, '2022-12-05 07:20:09'),
(1824, 'SWLMD-001', 1, '2022-12-05 07:20:15'),
(1825, 'SWLMD-001', 1, '2022-12-05 07:20:21'),
(1826, 'SWLMD-001', 1, '2022-12-05 07:20:27'),
(1827, 'SWLMD-001', 1, '2022-12-05 07:20:29'),
(1828, 'SWLMD-001', 1, '2022-12-05 07:20:35'),
(1829, 'SWLMD-001', 1, '2022-12-05 07:20:41'),
(1830, 'SWLMD-001', 1, '2022-12-05 07:20:47'),
(1831, 'SWLMD-001', 1, '2022-12-05 07:20:53'),
(1832, 'SWLMD-001', 1, '2022-12-05 07:20:59'),
(1833, 'SWLMD-001', 1, '2022-12-05 07:21:05'),
(1834, 'SWLMD-001', 1, '2022-12-05 07:21:11'),
(1835, 'SWLMD-001', 1, '2022-12-05 07:21:17'),
(1836, 'SWLMD-001', 1, '2022-12-05 07:21:24'),
(1837, 'SWLMD-001', 1, '2022-12-05 07:21:30'),
(1838, 'SWLMD-001', 1, '2022-12-05 07:21:36'),
(1839, 'SWLMD-001', 1, '2022-12-05 07:21:42'),
(1840, 'SWLMD-001', 1, '2022-12-05 07:21:43'),
(1841, 'SWLMD-001', 1, '2022-12-05 07:21:49'),
(1842, 'SWLMD-001', 1, '2022-12-05 07:21:55'),
(1843, 'SWLMD-001', 1, '2022-12-05 07:22:01'),
(1844, 'SWLMD-001', 1, '2022-12-05 07:22:07'),
(1845, 'SWLMD-001', 1, '2022-12-05 07:22:13'),
(1846, 'SWLMD-001', 2, '2022-12-05 07:22:19'),
(1847, 'SWLMD-001', 2, '2022-12-05 07:22:25'),
(1848, 'SWLMD-001', 2, '2022-12-05 07:22:31'),
(1849, 'SWLMD-001', 2, '2022-12-05 07:22:37'),
(1850, 'SWLMD-001', 2, '2022-12-05 07:22:44'),
(1851, 'SWLMD-001', 2, '2022-12-05 07:22:50'),
(1852, 'SWLMD-001', 2, '2022-12-05 07:22:51'),
(1853, 'SWLMD-001', 2, '2022-12-05 07:22:53'),
(1854, 'SWLMD-001', 2, '2022-12-05 07:22:54'),
(1855, 'SWLMD-001', 2, '2022-12-05 07:23:00'),
(1856, 'SWLMD-001', 2, '2022-12-05 07:23:01'),
(1857, 'SWLMD-001', 2, '2022-12-05 07:23:02'),
(1858, 'SWLMD-001', 2, '2022-12-05 07:23:03'),
(1859, 'SWLMD-001', 2, '2022-12-05 07:23:04'),
(1860, 'SWLMD-001', 2, '2022-12-05 07:23:05'),
(1861, 'SWLMD-001', 2, '2022-12-05 07:23:07'),
(1862, 'SWLMD-001', 2, '2022-12-05 07:23:13'),
(1863, 'SWLMD-001', 2, '2022-12-05 07:23:14'),
(1864, 'SWLMD-001', 2, '2022-12-05 07:23:15'),
(1865, 'SWLMD-001', 2, '2022-12-05 07:23:21'),
(1866, 'SWLMD-001', 2, '2022-12-05 07:23:27'),
(1867, 'SWLMD-001', 3, '2022-12-05 07:23:33'),
(1868, 'SWLMD-001', 3, '2022-12-05 07:23:34'),
(1869, 'SWLMD-001', 3, '2022-12-05 07:23:40'),
(1870, 'SWLMD-001', 2, '2022-12-05 07:23:41'),
(1871, 'SWLMD-001', 2, '2022-12-05 07:23:48'),
(1872, 'SWLMD-001', 2, '2022-12-05 07:23:54'),
(1873, 'SWLMD-001', 2, '2022-12-05 07:23:55'),
(1874, 'SWLMD-001', 2, '2022-12-05 07:23:56'),
(1875, 'SWLMD-001', 2, '2022-12-05 07:23:57'),
(1876, 'SWLMD-001', 2, '2022-12-05 07:23:58'),
(1877, 'SWLMD-001', 2, '2022-12-05 07:23:59'),
(1878, 'SWLMD-001', 2, '2022-12-05 07:24:06'),
(1879, 'SWLMD-001', 2, '2022-12-05 07:24:07'),
(1880, 'SWLMD-001', 2, '2022-12-05 07:24:08'),
(1881, 'SWLMD-001', 2, '2022-12-05 07:24:09'),
(1882, 'SWLMD-001', 2, '2022-12-05 07:24:11'),
(1883, 'SWLMD-001', 2, '2022-12-05 07:24:12'),
(1884, 'SWLMD-001', 2, '2022-12-05 07:24:18'),
(1885, 'SWLMD-001', 2, '2022-12-05 07:24:19'),
(1886, 'SWLMD-001', 2, '2022-12-05 07:24:20'),
(1887, 'SWLMD-001', 2, '2022-12-05 07:24:21'),
(1888, 'SWLMD-001', 2, '2022-12-05 07:24:27'),
(1889, 'SWLMD-001', 2, '2022-12-05 07:24:28'),
(1890, 'SWLMD-001', 2, '2022-12-05 07:24:29'),
(1891, 'SWLMD-001', 2, '2022-12-05 07:24:30'),
(1892, 'SWLMD-001', 2, '2022-12-05 07:24:31'),
(1893, 'SWLMD-001', 2, '2022-12-05 07:24:38'),
(1894, 'SWLMD-001', 2, '2022-12-05 07:24:44'),
(1895, 'SWLMD-001', 2, '2022-12-05 07:24:45'),
(1896, 'SWLMD-001', 2, '2022-12-05 07:24:47'),
(1897, 'SWLMD-001', 2, '2022-12-05 07:24:48'),
(1898, 'SWLMD-001', 2, '2022-12-05 07:24:49'),
(1899, 'SWLMD-001', 2, '2022-12-05 07:24:50'),
(1900, 'SWLMD-001', 2, '2022-12-05 07:24:52'),
(1901, 'SWLMD-001', 2, '2022-12-05 07:24:53'),
(1902, 'SWLMD-001', 2, '2022-12-05 07:24:54'),
(1903, 'SWLMD-001', 2, '2022-12-05 07:25:00'),
(1904, 'SWLMD-001', 2, '2022-12-05 07:25:01'),
(1905, 'SWLMD-001', 2, '2022-12-05 07:25:07'),
(1906, 'SWLMD-001', 2, '2022-12-05 07:25:08'),
(1907, 'SWLMD-001', 2, '2022-12-05 07:25:09'),
(1908, 'SWLMD-001', 2, '2022-12-05 07:25:10'),
(1909, 'SWLMD-001', 2, '2022-12-05 07:25:16'),
(1910, 'SWLMD-001', 2, '2022-12-05 07:25:17'),
(1911, 'SWLMD-001', 2, '2022-12-05 07:25:18'),
(1912, 'SWLMD-001', 2, '2022-12-05 07:25:24'),
(1913, 'SWLMD-001', 2, '2022-12-05 07:25:25'),
(1914, 'SWLMD-001', 2, '2022-12-05 07:25:27'),
(1915, 'SWLMD-001', 2, '2022-12-05 07:25:28'),
(1916, 'SWLMD-001', 2, '2022-12-05 07:25:29'),
(1917, 'SWLMD-001', 2, '2022-12-05 07:25:35'),
(1918, 'SWLMD-001', 2, '2022-12-05 07:25:36'),
(1919, 'SWLMD-001', 2, '2022-12-05 07:25:37'),
(1920, 'SWLMD-001', 2, '2022-12-05 07:25:43'),
(1921, 'SWLMD-001', 2, '2022-12-05 07:25:49'),
(1922, 'SWLMD-001', 2, '2022-12-05 07:25:50'),
(1923, 'SWLMD-001', 2, '2022-12-05 07:25:51'),
(1924, 'SWLMD-001', 2, '2022-12-05 07:25:52'),
(1925, 'SWLMD-001', 2, '2022-12-05 07:25:58'),
(1926, 'SWLMD-001', 2, '2022-12-05 07:25:59'),
(1927, 'SWLMD-001', 2, '2022-12-05 07:26:05'),
(1928, 'SWLMD-001', 2, '2022-12-05 07:26:11'),
(1929, 'SWLMD-001', 2, '2022-12-05 07:26:17'),
(1930, 'SWLMD-001', 2, '2022-12-05 07:26:23'),
(1931, 'SWLMD-001', 2, '2022-12-05 07:26:30'),
(1932, 'SWLMD-001', 2, '2022-12-05 07:26:31'),
(1933, 'SWLMD-001', 2, '2022-12-05 07:26:32'),
(1934, 'SWLMD-001', 2, '2022-12-05 07:26:38'),
(1935, 'SWLMD-001', 2, '2022-12-05 07:26:39'),
(1936, 'SWLMD-001', 2, '2022-12-05 07:26:40'),
(1937, 'SWLMD-001', 2, '2022-12-05 07:26:41'),
(1938, 'SWLMD-001', 2, '2022-12-05 07:26:43'),
(1939, 'SWLMD-001', 2, '2022-12-05 07:26:49'),
(1940, 'SWLMD-001', 2, '2022-12-05 07:26:50'),
(1941, 'SWLMD-001', 2, '2022-12-05 07:26:56'),
(1942, 'SWLMD-001', 2, '2022-12-05 07:26:57'),
(1943, 'SWLMD-001', 2, '2022-12-05 07:27:03'),
(1944, 'SWLMD-001', 3, '2022-12-05 07:27:04'),
(1945, 'SWLMD-001', 3, '2022-12-05 07:27:10'),
(1946, 'SWLMD-001', 2, '2022-12-05 07:27:12'),
(1947, 'SWLMD-001', 2, '2022-12-05 07:27:18'),
(1948, 'SWLMD-001', 2, '2022-12-05 07:27:25'),
(1949, 'SWLMD-001', 2, '2022-12-05 07:27:26'),
(1950, 'SWLMD-001', 2, '2022-12-05 07:27:27'),
(1951, 'SWLMD-001', 2, '2022-12-05 07:27:28'),
(1952, 'SWLMD-001', 2, '2022-12-05 07:27:34'),
(1953, 'SWLMD-001', 2, '2022-12-05 07:27:35'),
(1954, 'SWLMD-001', 2, '2022-12-05 07:27:36'),
(1955, 'SWLMD-001', 2, '2022-12-05 07:27:38'),
(1956, 'SWLMD-001', 2, '2022-12-05 07:27:39'),
(1957, 'SWLMD-001', 2, '2022-12-05 07:27:40'),
(1958, 'SWLMD-001', 2, '2022-12-05 07:27:41'),
(1959, 'SWLMD-001', 2, '2022-12-05 07:27:43'),
(1960, 'SWLMD-001', 2, '2022-12-05 07:27:45'),
(1961, 'SWLMD-001', 2, '2022-12-05 07:27:46'),
(1962, 'SWLMD-001', 2, '2022-12-05 07:27:52'),
(1963, 'SWLMD-001', 2, '2022-12-05 07:27:58'),
(1964, 'SWLMD-001', 2, '2022-12-05 07:27:59'),
(1965, 'SWLMD-001', 2, '2022-12-05 07:28:00'),
(1966, 'SWLMD-001', 2, '2022-12-05 07:28:01'),
(1967, 'SWLMD-001', 2, '2022-12-05 07:28:02'),
(1968, 'SWLMD-001', 2, '2022-12-05 07:28:03'),
(1969, 'SWLMD-001', 2, '2022-12-05 07:28:05'),
(1970, 'SWLMD-001', 2, '2022-12-05 07:28:06'),
(1971, 'SWLMD-001', 2, '2022-12-05 07:28:07'),
(1972, 'SWLMD-001', 2, '2022-12-05 07:28:08'),
(1973, 'SWLMD-001', 2, '2022-12-05 07:28:09'),
(1974, 'SWLMD-001', 2, '2022-12-05 07:28:15'),
(1975, 'SWLMD-001', 2, '2022-12-05 07:28:21'),
(1976, 'SWLMD-001', 2, '2022-12-05 07:28:22'),
(1977, 'SWLMD-001', 2, '2022-12-05 07:28:23'),
(1978, 'SWLMD-001', 2, '2022-12-05 07:28:29'),
(1979, 'SWLMD-001', 2, '2022-12-05 07:28:36'),
(1980, 'SWLMD-001', 2, '2022-12-05 07:28:37');

-- --------------------------------------------------------

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

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `devices_v`  AS SELECT `devices_tbl`.`device_id` AS `device`, `devices_tbl`.`location` AS `location`, `devices_tbl`.`is_active` AS `is_active`, concat(cast(`devices_tbl`.`date_added` as date),' ',time_format(`devices_tbl`.`date_added`,'%r')) AS `date_added`, `devices_tbl`.`time_stamp` AS `date_updated` FROM `devices_tbl` GROUP BY `devices_tbl`.`device_id` ORDER BY `devices_tbl`.`location` ASC  ;

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
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `readings_tbl`
--
ALTER TABLE `readings_tbl`
  MODIFY `t_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1981;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
