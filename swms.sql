-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 10, 2021 at 08:11 PM
-- Server version: 5.7.24
-- PHP Version: 7.2.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `swms`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` bigint(20) NOT NULL,
  `userid` bigint(20) NOT NULL,
  `booking_date` date NOT NULL,
  `booking_location` text NOT NULL,
  `booking_address` text NOT NULL,
  `Request` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `userid`, `booking_date`, `booking_location`, `booking_address`, `Request`) VALUES
(47, 44, '2021-08-11', 'Machang', 'Dewan serbaguna Machang, 34700, Machang, Kelantan', 'accepted'),
(200, 40, '2021-08-05', 'Kota Bharu', 'Kucing hotel', 'accepted'),
(230, 40, '2021-08-14', 'Taiping', 'awan', 'accepted'),
(235, 40, '2021-09-08', 'Taiping', 'awan', 'accepted'),
(368, 40, '2021-08-22', 'Machang', 'Kucing kampung', 'accepted'),
(391, 50, '2021-08-13', 'Machang', 'Dewan serbaguna Machang, 34700, Machang, Kelantan', 'accepted'),
(396, 40, '2021-09-03', 'Jeli', 'No.82, Lorong 7, Taman Seri Larut, 34700, Simpang, Perak Darul Ridzuan', 'pending'),
(703, 32, '2021-08-11', 'Gua Musang', 'aqilahhh', 'accepted');

-- --------------------------------------------------------

--
-- Table structure for table `pbt`
--

CREATE TABLE `pbt` (
  `PBT_ID` bigint(20) NOT NULL,
  `PBT_Ic` text NOT NULL,
  `PBT_Pass` text NOT NULL,
  `PBT_Name` text NOT NULL,
  `PBT_Position` text NOT NULL,
  `PBT_Address` text NOT NULL,
  `PBT_No` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pbt`
--

INSERT INTO `pbt` (`PBT_ID`, `PBT_Ic`, `PBT_Pass`, `PBT_Name`, `PBT_Position`, `PBT_Address`, `PBT_No`) VALUES
(5, '000701080011', '202cb962ac59075b964b07152d234b70', 'Aminah', 'Staff', 'Kuala Krai', '0194045720'),
(6, '2222', 'c81e728d9d4c2f636f067f89cc14862c', 'aqilah', 'Boss', 'Gua Musang', '0222211'),
(7, '990320087022', '202cb962ac59075b964b07152d234b70', 'Ismail', 'Manager', 'Machang', '0194042572'),
(8, '990320087024', '202cb962ac59075b964b07152d234b70', 'Farhan Nizam', 'Manager', 'Machang', '0175754032'),
(9, '990320087006', 'b706835de79a2b4e80506f582af3676a', 'Zakuan Adha', 'Manager', 'Machang', '017-5750031');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `Rating_ID` bigint(20) NOT NULL,
  `Rating_service` text NOT NULL,
  `Rating_bin` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`Rating_ID`, `Rating_service`, `Rating_bin`) VALUES
(2, 'good', 'average'),
(3, 'good', 'good'),
(4, 'average', 'bad'),
(5, 'average', 'average'),
(6, 'good', 'bad'),
(7, 'bad', 'average'),
(8, 'average', 'good'),
(9, 'good', 'average'),
(10, 'bad', 'good'),
(11, 'bad', 'bad'),
(12, 'good', 'average'),
(13, 'good', 'good');

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `services_id` bigint(20) NOT NULL,
  `booking_id` bigint(20) NOT NULL,
  `services_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `service`
--

INSERT INTO `service` (`services_id`, `booking_id`, `services_date`) VALUES
(745, 200, '2021-08-10'),
(746, 368, '2021-08-10'),
(747, 235, '2021-08-10'),
(748, 230, '2021-08-10'),
(749, 703, '2021-08-10'),
(750, 47, '2021-08-10'),
(751, 391, '2021-08-10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `userid` bigint(20) NOT NULL,
  `name` text NOT NULL,
  `address` text NOT NULL,
  `ic` text NOT NULL,
  `email` text NOT NULL,
  `pwd` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`userid`, `name`, `address`, `ic`, `email`, `pwd`) VALUES
(32, 'Mohamad Safwan Muhammad Razali', '1', '1', '2003mohdsafwan@gmail.com', 'c4ca4238a0b923820dcc509a6f75849b'),
(33, 'Puteri Nabila', '2', '2', 'puterikamal2@gmail.com', 'c81e728d9d4c2f636f067f89cc14862c'),
(34, 'Mohamad Safwan Muhammad Razali', '3', '3', '2003mohdsafwan@gmail.com', 'eccbc87e4b5ce2fe28308fd9f2a7baf3'),
(35, 'Puteri Nabila', 'a', '11', 'puterikamal2@gmail.com', '6512bd43d9caa6e02c990b0a82652dca'),
(36, 'Puteri Nabila', 'a', '12', 'puterikamal2@gmail.com', 'c20ad4d76fe97759aa27a0c99bff6710'),
(37, 'Mohamad Safwan Muhammad Razali', 'a', '999', '2003mohdsafwan@gmail.com', 'b706835de79a2b4e80506f582af3676a'),
(38, 'Mohamad Safwan Muhammad Razali', '888', '888', '2003mohdsafwan@gmail.com', 'c9f0f895fb98ab9159f51fd0297e236d'),
(39, 'Mohamad Safwan Muhammad Razali', '66', '66', '2003mohdsafwan@gmail.com', '3295c76acbf4caaed33c36b1b5fc2cb1'),
(40, 'wan', 'Kelanan', '88', '888@gmail.com', '202cb962ac59075b964b07152d234b70'),
(41, 'Mohamad Safwan Muhammad Razali', 'a', '5', '2003mohdsafwan@gmail.com', 'ac627ab1ccbdb62ec96e702f07f6425b'),
(42, 'Natasha', 'No.22, lorong 7, taman bukit tiu', '990320087021', 'amira@gmail.com', '202cb962ac59075b964b07152d234b70'),
(43, 'Mohamad Aliff Hakimi bin Adnan', 'No.99, Lorong 10, Taman Belukar, Machang', '990320087012', 'aliff123@gmail.com', 'ac627ab1ccbdb62ec96e702f07f6425b'),
(44, 'Nadia Alisya', 'Labok', '990320087023', 'nadia@gmail.com', '202cb962ac59075b964b07152d234b70'),
(45, 'Mohamad Safwan Muhamad Razali', 'No. 82, Lorong 7, Taman seri larut, 34700 Simpang', '990320087025', '2003mohdsafwan@gmail.com', 'e99a18c428cb38d5f260853678922e03'),
(46, 'Muhammd Fakrul Razi', 'no 70, jalan air puteh, Machang', '990320087026', 'fakrul@gmail.com', 'e99a18c428cb38d5f260853678922e03'),
(47, 'Mohamad Amir bin Samad', 'No 3, Jalan Unta, Machang, Kelantan', '990320087020', 'amir@gmail.com', 'e99a18c428cb38d5f260853678922e03'),
(48, 'Mohamad Kamal bin Abdullah', 'No 2, Jalan Unta, 14500, Machang, Kelantan', '990320087001', 'kamal@gmail.com', 'd6b0ab7f1c8ab8f514db9a6d85de160a'),
(49, 'Mohd Amir bin Ahmad', 'No. 1, Lorong 2, Taman Mukah, Machang, Kelantan', '990320087002', 'amir12@gmail.com', 'b706835de79a2b4e80506f582af3676a'),
(50, 'Aiman bin Zaki', 'No.3, Jalan Unta, Taman Tiram, Machang, Kelantan', '990320087005', 'aiman12@gmail.com', 'c6f057b86584942e415435ffb1fa93d4');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `userid` (`userid`);

--
-- Indexes for table `pbt`
--
ALTER TABLE `pbt`
  ADD PRIMARY KEY (`PBT_ID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`Rating_ID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`services_id`),
  ADD KEY `booking_id` (`booking_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=991;

--
-- AUTO_INCREMENT for table `pbt`
--
ALTER TABLE `pbt`
  MODIFY `PBT_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `Rating_ID` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `services_id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=752;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `userid` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `userid` FOREIGN KEY (`userid`) REFERENCES `tbl_user` (`userid`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `booking_id` FOREIGN KEY (`booking_id`) REFERENCES `booking` (`booking_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
