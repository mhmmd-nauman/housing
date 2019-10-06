-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 06, 2019 at 01:42 PM
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
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `ip_address` json DEFAULT NULL,
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
(NULL, 44, 9000, 'pending', 'sui gas', '2019-10-06 07:52:56', 29, NULL, '90okju', 'e52342342', 'Paid as soon as posible', 5),
(NULL, 43, 2000, 'pending', 'severage', '2019-10-06 07:54:24', 29, NULL, 'pl90uyt', 'e4509utr', 'paid as soon as posible', 6);

-- --------------------------------------------------------

--
-- Table structure for table `bill_track`
--

CREATE TABLE `bill_track` (
  `id` int(11) NOT NULL,
  `bill_id` int(11) NOT NULL,
  `ref_no` varchar(30) NOT NULL,
  `total` int(11) NOT NULL
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
(29, 'Ghazanfar Ali', '1234', 'ghazanfar@gmail.com', 'society_officer', 'Active'),
(43, 'Alaodeen', '1234', 'alaodeen@gmail.com', 'member', 'Active'),
(44, 'Ali Raza', 'aliraza123', 'aliraza.k2@gmail.com', 'member', 'Active');

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
  `status` enum('success','pending','process') NOT NULL DEFAULT 'pending',
  `transfer_to` varchar(50) DEFAULT NULL,
  `date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `process_transfer_id` varchar(50) DEFAULT NULL,
  `update_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plot_request`
--

INSERT INTO `plot_request` (`id`, `plot_no`, `login_id`, `user_name`, `user_cnic`, `status`, `transfer_to`, `date`, `process_transfer_id`, `update_date`) VALUES
(2, '90okju', 44, 'Ali Raza', '4130345134512', 'success', '44', '2019-10-06 12:49:50', '29', '2019-10-06'),
(3, 'pl90uyt', 44, 'Ali Raza', '4130345134512', 'pending', NULL, '2019-10-06 12:49:54', NULL, NULL),
(4, '90okju', 43, 'Alaodeen', '312094134654', 'process', '0', '2019-10-06 12:50:13', NULL, NULL),
(5, 'pl90uyt', 43, 'Alaodeen', '312094134654', 'success', '43', '2019-10-06 12:50:18', '29', '2019-10-06'),
(8, '90okju', 43, 'Alaodeen', '312094134654', 'success', '43', '2019-10-06 13:33:34', '29', '2019-10-06');

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
(1, 29, '', '', 'Commercial Plot', 'marla', 10, 300000, 'good plot for investor', 'pl90uyt', '', 'Allama Iqbal town , Phase 1', NULL, NULL, '', 'deactive', '2019-10-06', '312094134654', NULL),
(2, 29, '', '', 'cornert Plot', 'kanal', 1, 809996, 'Severage, Gas&lt;telephone', '90okju', '', '1A block Q DHA', NULL, NULL, '', 'deactive', '2019-10-06', '4130345134512', NULL),
(3, 29, '', '', 'living plot', 'acer', 18, 600000, 'near HBL chok', 'lsa542', '', 'Allama Iqbal town , Phase 2', NULL, NULL, '', 'active', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `transfer_track`
--

CREATE TABLE `transfer_track` (
  `id` int(11) NOT NULL,
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
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
-- AUTO_INCREMENT for table `plot_request`
--
ALTER TABLE `plot_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
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