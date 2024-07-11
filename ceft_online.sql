-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Jun 11, 2023 at 04:15 AM
-- Server version: 5.7.34
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceft_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `alert`
--

CREATE TABLE `alert` (
  `aid` int(11) NOT NULL,
  `alert` varchar(200) NOT NULL,
  `to_user` int(11) DEFAULT NULL,
  `alert_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `alert`
--

INSERT INTO `alert` (`aid`, `alert`, `to_user`, `alert_date`) VALUES
(9, 'Scheduled maintenance should be performed in accordance with the', NULL, '2023-06-11 01:47:33'),
(13, 'You have received LKR 1345 from 10009', 32, '2023-06-11 02:11:52'),
(17, 'Your chquebook request (ID: 4) approved', 32, '2023-06-11 04:52:48'),
(18, 'Your loan request (ID: 7) approved', 32, '2023-06-11 04:52:57'),
(19, 'Your fixed deposit request (ID: 5) approved', 32, '2023-06-11 04:53:01'),
(20, 'Your fixed deposit request (ID: 7) approved', 32, '2023-06-11 09:43:24'),
(21, 'Your loan request (ID: 8) approved', 32, '2023-06-11 09:43:30'),
(22, 'Your chquebook request (ID: 7) approved', 32, '2023-06-11 09:43:34');

-- --------------------------------------------------------

--
-- Table structure for table `bankAccount`
--

CREATE TABLE `bankAccount` (
  `acc_no` int(11) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `balance` decimal(10,0) NOT NULL DEFAULT '0',
  `created_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `bankAccount`
--

INSERT INTO `bankAccount` (`acc_no`, `nic`, `balance`, `created_date`) VALUES
(10007, '200002503931', '46095', '2023-06-10 18:23:55'),
(10008, '200002503931', '53500', '2023-06-10 18:24:03'),
(10009, '200002503932', '44155', '2023-06-10 18:24:07');

-- --------------------------------------------------------

--
-- Table structure for table `chequebook`
--

CREATE TABLE `chequebook` (
  `req_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `count` int(11) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `branch` varchar(50) NOT NULL,
  `req_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `chequebook`
--

INSERT INTO `chequebook` (`req_id`, `uid`, `count`, `phone`, `branch`, `req_date`, `status`) VALUES
(4, 32, 3, '987654331', 'Branch 3', '2023-06-11 04:51:00', 'Approved'),
(5, 32, 2, '0711427657', 'Branch 2', '2023-06-11 04:51:08', 'Pending');

-- --------------------------------------------------------

--
-- Table structure for table `cyber_security`
--

CREATE TABLE `cyber_security` (
  `id` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `s_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cyber_security`
--

INSERT INTO `cyber_security` (`id`, `status`, `s_date`) VALUES
(1, 0, '2023-06-11 05:10:25'),
(2, 1, '2023-06-11 05:14:31'),
(3, 0, '2023-06-11 05:14:36'),
(4, 1, '2023-06-11 05:14:40'),
(9, 1, '2023-06-11 05:26:01'),
(10, 0, '2023-06-11 05:44:20'),
(11, 1, '2023-06-11 05:46:58'),
(12, 0, '2023-06-11 05:48:37'),
(13, 1, '2023-06-11 05:48:52'),
(14, 0, '2023-06-11 09:31:41'),
(15, 1, '2023-06-11 09:31:47'),
(16, 0, '2023-06-11 09:44:02'),
(17, 1, '2023-06-11 09:44:24');

-- --------------------------------------------------------

--
-- Table structure for table `fd`
--

CREATE TABLE `fd` (
  `req_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `amount` decimal(10,0) NOT NULL,
  `type` varchar(50) NOT NULL,
  `maturity` varchar(50) NOT NULL,
  `req_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(20) NOT NULL DEFAULT 'Pending',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `fd`
--

INSERT INTO `fd` (`req_id`, `name`, `amount`, `type`, `maturity`, `req_date`, `status`, `uid`) VALUES
(5, 'Sathnindu Kottage', '34000', 'Fixed Deposit - Interest paid monthly', 'Credit maturity proceeds to account number', '2023-06-11 04:49:29', 'Approved', 32),
(6, 'Sathnindu Kottage', '50000', 'Fixed Deposit - Interest paid monthly', 'Re-invest without accrued interest', '2023-06-11 04:49:43', 'Pending', 32);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE `feedback` (
  `f_id` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `msg` varchar(200) DEFAULT NULL,
  `f_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'Unread'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`f_id`, `uid`, `rating`, `msg`, `f_date`, `status`) VALUES
(1, 0, 3, 'wejfn', '2023-06-11 03:28:14', 'unread'),
(2, 0, 1, '1', '2023-06-11 03:28:25', 'Viewed'),
(3, 0, 5, '2', '2023-06-11 03:28:32', 'unread'),
(10, 32, 1, 'rge', '2023-06-11 04:52:12', 'Viewed'),
(11, 32, 3, 'fer', '2023-06-11 09:38:41', 'Unread');

-- --------------------------------------------------------

--
-- Table structure for table `loan`
--

CREATE TABLE `loan` (
  `req_id` int(11) NOT NULL,
  `loan_type` varchar(50) NOT NULL,
  `application_type` varchar(50) NOT NULL,
  `applicant` varchar(50) NOT NULL,
  `relationship` varchar(50) NOT NULL,
  `req_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `status` varchar(10) NOT NULL DEFAULT 'Pending',
  `uid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loan`
--

INSERT INTO `loan` (`req_id`, `loan_type`, `application_type`, `applicant`, `relationship`, `req_date`, `status`, `uid`) VALUES
(6, 'Home Loans', 'Single', 'Sathnindu Kottage', 'Existing Customer without borrowings', '2023-06-11 04:49:51', 'Pending', 32),
(7, 'Education Loan', 'Joint', 'Nimsandu Kottage', 'Existing Customer with borrowings', '2023-06-11 04:50:02', 'Approved', 32);

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `req_id` int(11) NOT NULL,
  `code` int(6) NOT NULL,
  `uid` int(11) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `tid` int(11) NOT NULL,
  `t_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `from_acc` int(11) NOT NULL,
  `to_acc` int(11) DEFAULT NULL,
  `amount` decimal(10,0) NOT NULL,
  `type` varchar(50) NOT NULL,
  `purpose` varchar(50) DEFAULT NULL,
  `bank` varchar(30) DEFAULT NULL,
  `beni_name` varchar(50) DEFAULT NULL,
  `beni_country` varchar(50) DEFAULT NULL,
  `swift` varchar(50) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`tid`, `t_date`, `from_acc`, `to_acc`, `amount`, `type`, `purpose`, `bank`, `beni_name`, `beni_country`, `swift`, `description`) VALUES
(3, '2023-06-10 23:03:58', 10007, 1212342, '2000', 'domestic', 'Business', 'Sampath Bank', 'wefkjner', NULL, NULL, 'kfjner'),
(4, '2023-06-10 23:04:36', 10007, 3453655, '7000', 'domestic', 'Personal', 'HNB Bank', 'rekgjne', NULL, NULL, 'egrth'),
(5, '2023-06-10 23:16:05', 10007, NULL, '1000', 'bill payment', NULL, NULL, 'Dialog', NULL, NULL, ''),
(6, '2023-06-10 23:27:16', 10007, 423423, '3000', 'international', 'pop4', NULL, NULL, 'USA', '322rfe', NULL),
(7, '2023-06-10 23:31:39', 10007, 10009, '2000', 'intrabank', 'pop2', NULL, NULL, NULL, NULL, NULL),
(8, '2023-06-11 00:14:47', 10009, 10007, '3000', 'intrabank', 'Personal', NULL, NULL, NULL, NULL, NULL),
(9, '2023-06-11 01:10:46', 10008, 10009, '1500', 'intrabank', 'Insurance Services', NULL, NULL, NULL, NULL, NULL),
(10, '2023-06-11 02:11:52', 10009, 10007, '1345', 'intrabank', 'Personal', NULL, NULL, NULL, NULL, NULL),
(11, '2023-06-11 09:38:02', 10007, NULL, '250', 'bill payment', NULL, NULL, 'Dialog', NULL, NULL, '');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `uid` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `fname` varchar(50) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `nic` varchar(12) NOT NULL,
  `gender` varchar(6) NOT NULL,
  `dob` date NOT NULL,
  `address` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `role` varchar(10) NOT NULL,
  `join_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`uid`, `username`, `password`, `fname`, `lname`, `nic`, `gender`, `dob`, `address`, `phone`, `email`, `role`, `join_date`) VALUES
(32, 'sathnindu', '$2y$10$d4Skkw2zo9Jurl/0bI5lwuGv.cqPlAg7.bT/BqAgrxki5x8KZ7eqW', 'Sathnindu', 'Kottage', '200002503931', 'Male', '2000-01-25', '378/2, Samagi Mawata, Biyagama', '0711427657', 'sathnidukottage@gmail.com', 'customer', '2023-06-10 16:41:58'),
(34, 'admin', '$2y$10$4tcB6iSWrtS4zdli/ekE5.W3LdGzd4y.fDLwz4fgBagGF3QJtnBTu', 'Admin', 'Kottage', '200002503940', 'Female', '2000-01-25', '378/2, Samagi Mawata, Biyagama', '0711427657', 'admin@gmail.com', 'admin', '2023-06-10 16:43:51'),
(35, 'nimsandu', '$2y$10$oG9Ij7RZkJaPUF4jBjmtt.YXgFGbmyV5isiP1e0BlJ8DVTcQEKiR2', 'Nimsandu', 'Kottage', '200002503932', 'Male', '2005-02-21', '378/2, Samagi Mawata, Biyagama', '0711427658', 'nimsandu@gmail.com', 'customer', '2023-06-10 18:24:57'),
(38, 'security', '$2y$10$VUECSH78coxcGdv.FlcQduPb41dyKyfBIQRFrZnkSDI5SGrU5eEmW', 'Security', 'Kottage', '200003507845', 'Female', '2000-01-25', '378/2, Samagi Mawata, Biyagama', '0711427657', 'security@gmail.com', 'security', '2023-06-11 05:32:50'),
(39, 'manager', '$2y$10$PsOs.qoWk3g0X2fTSl9vl.0DhyD.eWKZduk5zuqGnmKhzWtG0Y6ja', 'Manager', 'Kottage', '200004567877', 'Male', '2000-01-25', '378/2, Samagi Mawata, Biyagama', '0711427657', 'manager@gmail.com', 'manager', '2023-06-11 05:34:28'),
(40, 'cashier1', '$2y$10$17UGyIPjiZLGPugvXs7xxOi8GjlJsWv6FPuqT43B89rfq4fIVWVJq', 'Cashier', 'Kottage', '200004562354', 'Female', '2000-02-21', '378/2, Samagi Mawata, Biyagama', '0711427657', 'cashier@gmail.com', 'cashier', '2023-06-11 05:35:04'),
(41, 'cashier2', '$2y$10$I6YTKWR0KEv.TcTqCsaQrejcbmzjuFBeGgef7sYbNk4IDbFHX0Cv2', 'Cashier2', 'Kottage', '200004561243', 'Male', '2023-06-01', '378/2, Samagi Mawata, Biyagama', '0711427657', 'cashier2@gmail.com', 'cashier', '2023-06-11 05:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `user_bankAccount`
--

CREATE TABLE `user_bankAccount` (
  `uid` int(11) NOT NULL,
  `bank_account` int(11) NOT NULL,
  `linked_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_bankAccount`
--

INSERT INTO `user_bankAccount` (`uid`, `bank_account`, `linked_date`) VALUES
(32, 10007, '2023-06-11 09:38:49'),
(32, 10008, '2023-06-11 00:49:40'),
(35, 10009, '2023-06-11 00:14:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alert`
--
ALTER TABLE `alert`
  ADD PRIMARY KEY (`aid`);

--
-- Indexes for table `bankAccount`
--
ALTER TABLE `bankAccount`
  ADD PRIMARY KEY (`acc_no`);

--
-- Indexes for table `chequebook`
--
ALTER TABLE `chequebook`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `cyber_security`
--
ALTER TABLE `cyber_security`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fd`
--
ALTER TABLE `fd`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`f_id`);

--
-- Indexes for table `loan`
--
ALTER TABLE `loan`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`req_id`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`tid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`uid`),
  ADD UNIQUE KEY `nic` (`nic`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `user_bankAccount`
--
ALTER TABLE `user_bankAccount`
  ADD PRIMARY KEY (`uid`,`bank_account`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alert`
--
ALTER TABLE `alert`
  MODIFY `aid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `bankAccount`
--
ALTER TABLE `bankAccount`
  MODIFY `acc_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10011;

--
-- AUTO_INCREMENT for table `chequebook`
--
ALTER TABLE `chequebook`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `cyber_security`
--
ALTER TABLE `cyber_security`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `fd`
--
ALTER TABLE `fd`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `f_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `loan`
--
ALTER TABLE `loan`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `req_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `tid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `uid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
