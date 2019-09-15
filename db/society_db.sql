-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 15, 2019 at 05:53 PM
-- Server version: 5.7.27-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `society_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `login_id` int(11) NOT NULL,
  `name` varchar(30) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `type` enum('','society_officer','member','admin') DEFAULT '',
  `status` enum('Active','blocked') DEFAULT 'blocked'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`login_id`, `name`, `password`, `email`, `type`, `status`) VALUES
(1, 'Saima', '1234', 'saima@gmail.com', 'admin', 'Active'),
(13, 'Member', '1234', 'member@gmail.com', 'member', 'Active'),
(19, '', '', '', '', 'Active'),
(22, 'Musawer Ali', 'adminadmin', 'admin@admin.com', 'member', 'Active'),
(28, 'Ch Musawer', 'admin123', 'liaquat31202@gmail.com', 'member', 'Active'),
(29, 'Ghazanfar Ali', '1234', 'ghazanfar@gmail.com', 'society_officer', 'Active'),
(30, 'Ghazanfar Ali', '123', 'musawer79@ovi.com', 'society_officer', 'Active'),
(41, 'test', '123', 'test@gmail.com', 'society_officer', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `plot_request`
--

CREATE TABLE `plot_request` (
  `id` int(11) NOT NULL,
  `plot_no` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_cnic` varchar(50) NOT NULL,
  `status` enum('success','pending') NOT NULL DEFAULT 'pending',
  `transfer_to` varchar(50) DEFAULT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_request`
--

INSERT INTO `plot_request` (`id`, `plot_no`, `login_id`, `user_name`, `user_cnic`, `status`, `transfer_to`, `date`) VALUES
(1, 'lsa542', 22, 'Musawer Ali', '432424234234', 'pending', '', '2019-09-15 11:16:12'),
(2, '54nml', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-15 11:24:11');

-- --------------------------------------------------------

--
-- Table structure for table `property_detail`
--

CREATE TABLE `property_detail` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `purpose` varchar(100) NOT NULL,
  `property_type` varchar(100) NOT NULL,
  `property_title` varchar(100) NOT NULL,
  `property_unit` varchar(100) NOT NULL,
  `unit_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `property_desc` text NOT NULL,
  `plot_no` varchar(100) NOT NULL,
  `property_city` varchar(100) NOT NULL,
  `property_location` varchar(100) NOT NULL,
  `transfer_login_ids` varchar(200) DEFAULT NULL,
  `login_cnic` varchar(200) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_detail`
--

INSERT INTO `property_detail` (`id`, `login_id`, `purpose`, `property_type`, `property_title`, `property_unit`, `unit_qty`, `price`, `property_desc`, `plot_no`, `property_city`, `property_location`, `transfer_login_ids`, `login_cnic`, `image`, `status`) VALUES
(5, 21, 'rent', 'home', 'Commersial Plaza', 'acer', 54, 2323, '43sd', '32323', 'Bahawalpur', '1A,Avenue', NULL, NULL, 'partner-APW-AMG1076-hd.jpg', 'active'),
(6, 28, 'rent', 'plot', 'Corner Plot', 'kanal', 4, 4000000, 'Alama iqbal town', '43alm', 'Lahore', '1A,Avenue', NULL, NULL, 'imj.jpg', 'active'),
(7, 29, 'sale', 'home', 'Full furnished house', 'kanal', 5, 5000000, 'Fully fuenished with swimming pool and grossy', '54nml', 'Karachi', 'DHA phase 2', NULL, NULL, 'c23d57aa-4e3d-4c60-b522-b0460407170b.jpg', 'active'),
(8, 1, 'rent', 'land', 'Fertile Land', 'acer', 1, 3200000, 'land for xxxxxxxxxxx', 'lsa542', 'Chicago', 'Near Air port', NULL, NULL, 'V34840H.jpg', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `property_history`
--

CREATE TABLE `property_history` (
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `users_details`
--

CREATE TABLE `users_details` (
  `id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `cnic` varchar(250) DEFAULT NULL,
  `address` varchar(250) DEFAULT NULL,
  `mobile_number` varchar(20) DEFAULT NULL,
  `image` varchar(345) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users_details`
--

INSERT INTO `users_details` (`id`, `login_id`, `cnic`, `address`, `mobile_number`, `image`) VALUES
(1, 11, '123456789', '195 f', '031388888', 'eee'),
(2, 1, '66565555465456', 'tet', '6666', 'hhh'),
(3, 13, '234245425', '234', '234324', '234'),
(4, NULL, 'cnic', 'address', 'contact', ''),
(5, 3, 'cnic', 'address', 'contact', ''),
(6, 17, '4324242', 'H/s no 229 khan colony multan road near shama canima bahawalpur', '4234234', ''),
(7, 19, '', '', '', ''),
(9, 21, '534534534', 'H/s no 229 khan colony multan road near shama canima bahawalpur', '53453453453', ''),
(10, 22, '432424234234', 'H/s no 229 khan colony multan road near shama canima bahawalpur', '4234234234', ''),
(11, 28, '323232', 'pak jali house, Near Shama Canima Multan Road Bahawalpur', '+923336513516', ''),
(12, 29, '3120002343214', 'pak jali house, Near Shama Canima Multan Road Bahawalpur', '+923336513516', ''),
(13, 30, '53211234', 'pak jali house, Near Shama Canima Multan Road Bahawalpur', '+923336513516', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `plot_request`
--
ALTER TABLE `plot_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_detail`
--
ALTER TABLE `property_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `property_history`
--
ALTER TABLE `property_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users_details`
--
ALTER TABLE `users_details`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `plot_request`
--
ALTER TABLE `plot_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `property_detail`
--
ALTER TABLE `property_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `property_history`
--
ALTER TABLE `property_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;