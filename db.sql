-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 23, 2022 at 11:43 PM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` char(5) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
('123', 'samihaafaf', 'bracuproject');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `name` varchar(225) NOT NULL,
  `a_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`name`, `a_id`) VALUES
('extra-curriculum centre\r\n', '123'),
('human resource', '123'),
('roads', '123'),
('transport system', '123'),
('water supply', '123');

-- --------------------------------------------------------

--
-- Table structure for table `complaints`
--

CREATE TABLE `complaints` (
  `user_id` varchar(225) NOT NULL,
  `c_id` int(11) NOT NULL,
  `state` varchar(225) DEFAULT NULL,
  `details` varchar(500) NOT NULL,
  `category_name` varchar(225) NOT NULL,
  `lodge_date` datetime NOT NULL DEFAULT current_timestamp(),
  `a_id` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `complaints`
--

INSERT INTO `complaints` (`user_id`, `c_id`, `state`, `details`, `category_name`, `lodge_date`, `a_id`) VALUES
('10231234', 1, 'closed', 'the roads of sector 2(Uttara) have man holes in them.', 'roads', '2022-04-17 12:07:57', '123'),
('10231234', 2, 'inProcess', 'roads have uneven damage due to rainfall', 'roads', '2022-04-17 12:07:57', '123'),
('20101233', 3, NULL, 'there is water contamination', 'water supply', '2022-04-17 12:07:57', '123'),
('20101233', 4, NULL, 'water supply is very low in building 4', 'water supply', '2022-04-17 16:24:27', '123'),
('20101266', 6, NULL, 'the bus no. 3 of are 1216 has damaged seats.', 'transport system', '2022-04-17 16:24:27', '123'),
('10231234', 9, 'inProcess', 'the pavement lamppost in front of road 5 is not functional ', 'roads', '2022-04-18 15:37:26', '123');

-- --------------------------------------------------------

--
-- Table structure for table `signup`
--

CREATE TABLE `signup` (
  `Username` varchar(100) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `signup`
--

INSERT INTO `signup` (`Username`, `Password`) VALUES
('user101', '12345'),
('user102', 'abcde');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `u_id` varchar(225) NOT NULL,
  `name` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `contact_no` int(11) NOT NULL,
  `address` varchar(225) NOT NULL,
  `area_PIN` int(11) NOT NULL,
  `age` int(11) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`u_id`, `name`, `email`, `contact_no`, `address`, `area_PIN`, `age`, `Password`) VALUES
('10231234', 'shabib muhtasim', 'shabib01@gmail.com', 1923242319, 'Uttara-09', 1233, 34, 'pass123'),
('12345678', 'PewdiePie', 'pewdiepie123@gmail.com', 1714558283, 'House-78,Road-4,Edgar Lane, Mohammadpur,Dhaka', 1207, 35, 'hello'),
('14356789', 'Mr Bean', 'mrbeanyolo@gmail.com', 1883939300, 'House-65,Road-5,holy avenue, Gulshan,Dhaka', 1269, 65, 'newline'),
('19301013', 'Shafin Ahad', 'shafin@gmail.com', 1367767778, 'chipa goli', 6787, 23, '370work'),
('20101233', 'manha', 'manha@yahoo.com', 1763778229, 'Uttara sector-10', 1222, 19, 'iugwicv'),
('20101266', 'samiha afaf', 'samihaafafneha@gmail.com', 1731511085, 'mirpur-2,RP tower.', 1216, 22, 'dustin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`name`),
  ADD KEY `aid` (`a_id`);

--
-- Indexes for table `complaints`
--
ALTER TABLE `complaints`
  ADD PRIMARY KEY (`c_id`),
  ADD KEY `cat_nam_fk` (`category_name`),
  ADD KEY `user_id_fk` (`user_id`),
  ADD KEY `a_id_fk` (`a_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`u_id`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `aid` FOREIGN KEY (`a_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `complaints`
--
ALTER TABLE `complaints`
  ADD CONSTRAINT `a_id_fk` FOREIGN KEY (`a_id`) REFERENCES `admin` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cat_nam_fk` FOREIGN KEY (`category_name`) REFERENCES `category` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_id_fk` FOREIGN KEY (`user_id`) REFERENCES `user` (`u_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
