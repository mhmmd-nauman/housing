-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 07, 2019 at 05:05 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.2

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
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ip_address` text,
  `user_id` int(11) DEFAULT NULL,
  `total_amount` int(11) NOT NULL,
  `payment_status` enum('pending','success') NOT NULL DEFAULT 'pending',
  `bill_type` enum('wapda','sui gas','ptcl','water','severage') NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `society_officer_id` int(11) NOT NULL,
  `user_name` varchar(20) DEFAULT NULL,
  `plot_no` varchar(20) NOT NULL,
  `ref_no` varchar(30) NOT NULL,
  `descrip` text NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bill`
--

INSERT INTO `bill` (`ip_address`, `user_id`, `total_amount`, `payment_status`, `bill_type`, `date`, `society_officer_id`, `user_name`, `plot_no`, `ref_no`, `descrip`, `id`) VALUES
(NULL, 29, 100, 'success', 'sui gas', '2019-10-06 17:10:22', 29, NULL, '197', '22', 'zzX', 1),
(NULL, 29, 100, 'pending', 'sui gas', '2019-10-06 17:11:50', 29, NULL, '197', '22', 'zxc', 2),
(NULL, 29, 66, 'pending', 'sui gas', '2019-10-06 17:12:57', 29, NULL, '197', '22', 'zXZX20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `bill_track`
--

CREATE TABLE `bill_track` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `ref_no` varchar(30) NOT NULL,
  `total` int(11) NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
(29, 'Society Officer', '1234', 'society_officer@gmail.com', 'society_officer', 'Active'),
(43, 'Member 1', '1234', 'm1@gmail.com', 'member', 'Active'),
(44, 'Member 2', '1234', 'm2@gmail.com', 'member', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `plot_history`
--

CREATE TABLE `plot_history` (
  `id` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  `plot_no` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_cnic` varchar(50) NOT NULL,
  `status` enum('success','pending','process') NOT NULL DEFAULT 'pending',
  `transfer_to` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process_transfer_id` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_history`
--

INSERT INTO `plot_history` (`id`, `owner`, `plot_no`, `login_id`, `user_name`, `user_cnic`, `status`, `transfer_to`, `date`, `process_transfer_id`, `update_date`) VALUES
(1, 43, '195', 29, 'Society Officer', '', 'success', '', '2019-10-06 20:19:36', '', '2019-10-06'),
(2, 43, '195', 29, 'Society Officer', '', 'success', '', '2019-10-06 20:26:01', '', '2019-10-06'),
(3, 43, '195', 29, 'Society Officer', '', 'success', '', '2019-10-06 20:27:12', '', '2019-10-06'),
(4, 44, '195', 29, 'Society Officer', '', 'success', '', '2019-10-06 20:27:40', '', '2019-10-06'),
(5, 43, '196', 29, 'Society Officer', '', 'success', '', '2019-10-06 20:29:54', '', '2019-10-06');

-- --------------------------------------------------------

--
-- Table structure for table `plot_request`
--

CREATE TABLE `plot_request` (
  `id` int(11) NOT NULL,
  `owner` int(11) DEFAULT NULL,
  `plot_no` varchar(50) NOT NULL,
  `login_id` int(50) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `user_cnic` varchar(50) NOT NULL,
  `status` enum('success','pending','process') NOT NULL DEFAULT 'pending',
  `transfer_to` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process_transfer_id` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_request`
--

INSERT INTO `plot_request` (`id`, `owner`, `plot_no`, `login_id`, `user_name`, `user_cnic`, `status`, `transfer_to`, `date`, `process_transfer_id`, `update_date`) VALUES
(1, 43, '10', 0, '', '', 'success', '', '2019-10-06 19:39:12', '', '2019-10-06'),
(2, 43, '10', 0, '', '', 'success', '', '2019-10-06 20:09:57', '', '2019-10-06'),
(3, 43, '10', 0, '', '', 'success', '', '2019-10-06 20:14:26', '', '2019-10-06'),
(4, 43, '10', 29, '', '', 'success', '', '2019-10-06 20:15:04', '', '2019-10-06'),
(5, 43, '10', 29, 'Society Officer', '', 'success', '', '2019-10-06 20:15:35', '', '2019-10-06'),
(6, NULL, '195', 43, 'Member 1', '312094134654', 'pending', NULL, '2019-10-06 22:32:33', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `property_detail`
--

CREATE TABLE `property_detail` (
  `id` int(11) NOT NULL,
  `login_id` int(11) NOT NULL,
  `property_title` varchar(100) NOT NULL,
  `property_unit` varchar(100) NOT NULL,
  `unit_qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `property_desc` text NOT NULL,
  `plot_no` varchar(100) NOT NULL,
  `property_city` varchar(100) DEFAULT NULL,
  `property_location` varchar(100) NOT NULL,
  `transfer_login_ids` varchar(200) DEFAULT NULL,
  `owner` int(11) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` enum('active','deactive') NOT NULL DEFAULT 'active',
  `sold_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `property_detail`
--

INSERT INTO `property_detail` (`id`, `login_id`, `property_title`, `property_unit`, `unit_qty`, `price`, `property_desc`, `plot_no`, `property_city`, `property_location`, `transfer_login_ids`, `owner`, `image`, `status`, `sold_date`) VALUES
(1, 29, 'Commercial Plot', 'marla', 10, 300000, 'good plot for investor', '195', '', 'Allama Iqbal town , Phase 1', NULL, 44, '', 'deactive', '2019-10-06'),
(2, 29, 'cornert Plot', 'kanal', 1, 809996, 'Severage, Gas&lt;telephone', '196', '', '1A block Q DHA', NULL, 43, '', 'deactive', '2019-10-06'),
(3, 29, 'living plot', 'acer', 18, 600000, 'near HBL chok', '197', '', 'Allama Iqbal town , Phase 2', NULL, NULL, '', 'active', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_track`
--

CREATE TABLE `transfer_track` (
  `id` int(11) NOT NULL,
  `login_id` int(11) DEFAULT NULL,
  `old_cnic` varchar(20) NOT NULL,
  `new_cnic` varchar(20) NOT NULL,
  `plot_no` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
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
(2, 1, '31202693123', 'tet', '6666', 'hhh'),
(12, 29, '3120002343214', 'pak jali house, Near Shama Canima Multan Road Bahawalpur', '+923336513516', ''),
(15, 43, '312094134654', 'Sokar yazman chack no 105,', '+9230554560123', ''),
(16, 44, '4130345134512', 'Trust Colony Bahawalpur', '03007287408', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bill_track`
--
ALTER TABLE `bill_track`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`login_id`);

--
-- Indexes for table `plot_history`
--
ALTER TABLE `plot_history`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `transfer_track`
--
ALTER TABLE `transfer_track`
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
-- AUTO_INCREMENT for table `bill`
--
ALTER TABLE `bill`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `bill_track`
--
ALTER TABLE `bill_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `login_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
--
-- AUTO_INCREMENT for table `plot_history`
--
ALTER TABLE `plot_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `plot_request`
--
ALTER TABLE `plot_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `property_detail`
--
ALTER TABLE `property_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `transfer_track`
--
ALTER TABLE `transfer_track`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users_details`
--
ALTER TABLE `users_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
