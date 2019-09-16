-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 16, 2019 at 11:11 AM
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
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process_transfer_id` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_request`
--

INSERT INTO `plot_request` (`id`, `plot_no`, `login_id`, `user_name`, `user_cnic`, `status`, `transfer_to`, `date`, `process_transfer_id`, `update_date`) VALUES
(1, 'lsa542', 22, 'Musawer Ali', '432424234234', 'success', '13', '2019-09-15 16:16:12', '29', '2019-09-16'),
(2, '54nml', 22, 'Musawer Ali', '432424234234', 'success', '22', '2019-09-15 16:24:11', '29', NULL),
(3, 'lsa542', 22, 'Musawer Ali', '432424234234', 'success', '13', '2019-09-16 08:33:27', '29', '2019-09-16'),
(4, 'lsa542', 13, 'Member', '234245425', 'success', '13', '2019-09-16 08:34:26', '29', '2019-09-16'),
(5, '43alm', 28, 'Ch Musawer', '323232', 'success', '28', '2019-09-16 08:34:45', '29', '2019-09-16'),
(6, '43alm', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-16 08:47:41', NULL, NULL),
(7, '32323', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-16 09:01:22', NULL, NULL),
(8, '32323', 13, 'Member', '234245425', 'pending', NULL, '2019-09-16 09:01:41', NULL, NULL),
(9, '32323', 28, 'Ch Musawer', '323232', 'success', '28', '2019-09-16 09:02:02', '29', '2019-09-16'),
(10, '54rtgf3', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-16 10:17:34', NULL, NULL),
(11, '54rtgf3', 13, 'Member', '234245425', 'success', '13', '2019-09-16 10:20:56', '29', '2019-09-16'),
(12, 'ytdhre32', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-16 10:48:38', NULL, NULL),
(13, 'ytdhre32', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-16 10:48:39', NULL, NULL),
(14, 'iipo9821', 22, 'Musawer Ali', '432424234234', 'pending', NULL, '2019-09-16 10:49:01', NULL, NULL),
(15, 'iipo9821', 13, 'Member', '234245425', 'success', '13', '2019-09-16 10:49:31', '30', '2019-09-16'),
(16, 'ytdhre32', 13, 'Member', '234245425', 'pending', NULL, '2019-09-16 10:49:35', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_detail`
--

CREATE TABLE `property_detail` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `purpose` varchar(100) DEFAULT NULL,
  `property_type` varchar(100) NOT NULL,
  `property_title` varchar(100) NOT NULL,
  `property_unit` varchar(100) NOT NULL,
  `unit_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `property_desc` text NOT NULL,
  `plot_no` varchar(100) NOT NULL,
  `property_city` varchar(100) DEFAULT NULL,
  `property_location` varchar(100) NOT NULL,
  `transfer_login_ids` varchar(200) DEFAULT NULL,
  `login_cnic` varchar(200) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `sold_date` date DEFAULT NULL,
  `buyer_cnic` varchar(50) DEFAULT NULL,
  `buyer_name` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_detail`
--

INSERT INTO `property_detail` (`id`, `login_id`, `purpose`, `property_type`, `property_title`, `property_unit`, `unit_qty`, `price`, `property_desc`, `plot_no`, `property_city`, `property_location`, `transfer_login_ids`, `login_cnic`, `image`, `status`, `sold_date`, `buyer_cnic`, `buyer_name`) VALUES
(5, 21, 'rent', 'home', 'Commersial Plaza', 'acer', 54, 2323, '43sd', '32323', 'Bahawalpur', '1A,Avenue', NULL, NULL, 'partner-APW-AMG1076-hd.jpg', 'deactive', NULL, NULL, NULL),
(6, 28, 'rent', 'plot', 'Corner Plot', 'kanal', 4, 4000000, 'Alama iqbal town', '43alm', 'Lahore', '1A,Avenue', NULL, NULL, 'imj.jpg', 'deactive', NULL, NULL, NULL),
(7, 29, 'sale', 'home', 'Full furnished house', 'kanal', 5, 5000000, 'Fully fuenished with swimming pool and grossy', '54nml', 'Karachi', 'DHA phase 2', NULL, NULL, 'c23d57aa-4e3d-4c60-b522-b0460407170b.jpg', 'deactive', NULL, NULL, NULL),
(8, 1, 'rent', 'land', 'Fertile Land', 'acer', 1, 3200000, 'land for xxxxxxxxxxx', 'lsa542', 'Chicago', 'Near Air port', NULL, NULL, 'V34840H.jpg', 'deactive', NULL, NULL, NULL),
(10, 29, '', '', 'Commercial Plot', 'kanal', 2, 700000, 'very good plot for investor', 'iipo9821', '', 'Near PORT', NULL, NULL, '', 'deactive', '2019-09-16', '234245425', NULL),
(11, 29, '', '', 'cornert Plot', 'kanal', 4, 9000000, 'very good plot for family', 'ytdhre32', '', '1A block Q DHA', NULL, NULL, '', 'active', NULL, NULL, NULL),
(12, 29, '', '', 'living plot', 'marla', 19, 3000000, 'good plot for house', 'yt763gf', '', 'Allama Iqbal town , Phase 1', NULL, NULL, '', 'active', NULL, NULL, NULL),
(13, 29, '', '', 'living plot', 'marla', 7, 4309023, 'very good plot for family', '54rtgf3', '', 'airport road', NULL, NULL, '', 'deactive', '2019-09-16', '234245425', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
--
-- AUTO_INCREMENT for table `property_detail`
--
ALTER TABLE `property_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
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