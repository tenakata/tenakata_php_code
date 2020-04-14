-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 14, 2020 at 07:50 AM
-- Server version: 5.7.29-0ubuntu0.16.04.1
-- PHP Version: 7.0.33-14+ubuntu16.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookeeping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(5) UNSIGNED NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL,
  `publicid_img` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT 'CURRENT_TIMESTAMP'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `fname`, `lname`, `email`, `password`, `phone`, `image`, `publicid_img`, `created_at`) VALUES
(1, 'Ankit', 'tiwari', 'admin@tecorb.co', 'e10adc3949ba59abbe56e057f20f883e', '7836048635', '', '', 'CURRENT_TIMESTAMP');

-- --------------------------------------------------------

--
-- Table structure for table `assign_supervisor`
--

CREATE TABLE `assign_supervisor` (
  `id` int(5) UNSIGNED NOT NULL,
  `past_supervisor_id` int(5) UNSIGNED NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `present_supervisor_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `business_register`
--

CREATE TABLE `business_register` (
  `id` int(5) UNSIGNED NOT NULL,
  `business_name` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country_code` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL,
  `location` varchar(200) NOT NULL,
  `image` text,
  `public_id` text,
  `role` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(100) NOT NULL,
  `owner_name` varchar(200) DEFAULT NULL,
  `business_registered` varchar(200) DEFAULT NULL,
  `registation_no` varchar(200) DEFAULT NULL,
  `gender` varchar(200) DEFAULT NULL,
  `core_business` varchar(200) DEFAULT NULL,
  `activities` text,
  `business_date` varchar(200) DEFAULT NULL,
  `no_of_employees` varchar(200) DEFAULT NULL,
  `branches` varchar(200) DEFAULT NULL,
  `financial_institution` varchar(200) DEFAULT NULL,
  `any_loan` varchar(200) DEFAULT NULL,
  `loan_amount` varchar(200) DEFAULT NULL,
  `loan_purpose` varchar(200) DEFAULT NULL,
  `receive_payments` varchar(200) DEFAULT NULL,
  `make_payments` varchar(200) DEFAULT NULL,
  `busniness_funding` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `supervisor_id` int(5) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `status_notification` varchar(200) DEFAULT 'false',
  `assign_supervisor_id` varchar(200) DEFAULT NULL,
  `latitude` varchar(200) DEFAULT NULL,
  `longitude` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_register`
--

INSERT INTO `business_register` (`id`, `business_name`, `name`, `phone`, `country_code`, `password`, `location`, `image`, `public_id`, `role`, `create_at`, `updated_at`, `owner_name`, `business_registered`, `registation_no`, `gender`, `core_business`, `activities`, `business_date`, `no_of_employees`, `branches`, `financial_institution`, `any_loan`, `loan_amount`, `loan_purpose`, `receive_payments`, `make_payments`, `busniness_funding`, `email`, `supervisor_id`, `status`, `status_notification`, `assign_supervisor_id`, `latitude`, `longitude`) VALUES
(140, 'test', 'test', '7836048635', '91', '1234567', 'Noida', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1586774435/qhvtxz92ls4wufbmjkr5.jpg', 'qhvtxz92ls4wufbmjkr5', 'user', '2020-04-13 10:03:30', '2020-04-13 10:04:03', 'ankit', 'yes', '93sahjs', 'Male', 'Selling Clothes & Fashion', 'dsjdsj', '2020-04-13', '11', 'no', 'SACCOs', 'yes', '1000', 'Invest in a new business', 'mpesa,cash', 'cash', 'personal', 'a@gmail.com', 7, 1, 'false', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `business_session_token`
--

CREATE TABLE `business_session_token` (
  `id` int(5) UNSIGNED NOT NULL,
  `business_user_id` int(5) UNSIGNED NOT NULL,
  `sessiontoken` varchar(200) NOT NULL,
  `device_id` varchar(200) NOT NULL,
  `device_type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_session_token`
--

INSERT INTO `business_session_token` (`id`, `business_user_id`, `sessiontoken`, `device_id`, `device_type`, `created_at`, `updated_at`) VALUES
(101, 140, 'fdUcagLzHRXvsQ7O9qBe', '', '', '2020-04-13 10:10:07', '2020-04-13 10:04:10'),
(103, 140, 'FTvGAXJVPqt5pUxfigh8', '', '', '2020-04-13 12:09:56', '2020-04-13 12:04:09'),
(104, 140, 'Q6ZhrOCVymMntBA0l5xo', '', '', '2020-04-13 12:09:56', '2020-04-13 12:04:09'),
(122, 140, 'tIEBfjLrbcpA6FP79uGl', '', '', '2020-04-13 15:28:18', '2020-04-13 15:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `bussiness_visit`
--

CREATE TABLE `bussiness_visit` (
  `id` int(5) UNSIGNED NOT NULL,
  `business_register_id` int(5) UNSIGNED NOT NULL,
  `current_date` varchar(200) NOT NULL,
  `comment` varchar(200) NOT NULL,
  `bussiness_location` varchar(200) NOT NULL,
  `latitude` varchar(250) NOT NULL,
  `longitude` varchar(250) NOT NULL,
  `stock` varchar(200) NOT NULL,
  `busy_shop` varchar(200) NOT NULL,
  `created_at` varchar(200) NOT NULL DEFAULT 'CURRENT_TIMESTAMP',
  `status` varchar(200) DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `confirm_payment`
--

CREATE TABLE `confirm_payment` (
  `id` int(5) UNSIGNED NOT NULL,
  `transaction_id` int(5) UNSIGNED NOT NULL,
  `amount_paid` varchar(200) NOT NULL,
  `payment_option` varchar(200) NOT NULL,
  `naration` varchar(200) NOT NULL,
  `sales_purchase` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `confirm_payment`
--

INSERT INTO `confirm_payment` (`id`, `transaction_id`, `amount_paid`, `payment_option`, `naration`, `sales_purchase`, `message`, `created_at`, `updated_at`) VALUES
(1, 51, '1', 'credit', 'cv', 'purchase', '', '2020-04-14 02:00:36', '2020-04-14 02:04:00');

-- --------------------------------------------------------

--
-- Table structure for table `credit_sales_purchases`
--

CREATE TABLE `credit_sales_purchases` (
  `id` int(5) UNSIGNED NOT NULL,
  `business_user_id` int(5) UNSIGNED NOT NULL,
  `date` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `id_no` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `item_list` text,
  `attach_recepit` text,
  `public_id` text,
  `payment_type` varchar(200) NOT NULL,
  `sales_purchases` varchar(200) NOT NULL,
  `created_at` varchar(250) NOT NULL,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `credit_sales_purchases`
--

INSERT INTO `credit_sales_purchases` (`id`, `business_user_id`, `date`, `amount`, `phone`, `id_no`, `name`, `item_list`, `attach_recepit`, `public_id`, `payment_type`, `sales_purchases`, `created_at`, `updated_at`) VALUES
(51, 140, '2020-04-13', '1', '9865986532', '76', 'vaib', 'sucsu js is', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1586772895/muondoqszrf8aowmddgp.jpg', 'muondoqszrf8aowmddgp', 'credit', 'purchase', '2020-04-13', '2020-04-13 10:04:14'),
(52, 140, '2020-04-13', '1', '9865986598', '1', 'vai', 'dbdj', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1586774535/fppaui0rva6b91exz2wl.jpg', 'fppaui0rva6b91exz2wl', 'credit', 'sales', '2020-04-13', '2020-04-13 10:04:42');

-- --------------------------------------------------------

--
-- Table structure for table `daily_sales_purchases`
--

CREATE TABLE `daily_sales_purchases` (
  `id` int(5) UNSIGNED NOT NULL,
  `business_user_id` int(5) UNSIGNED NOT NULL,
  `date` varchar(200) NOT NULL,
  `amount` varchar(200) NOT NULL,
  `public_id` text,
  `payment_type` varchar(200) NOT NULL,
  `sales_purchases` varchar(200) NOT NULL,
  `created_at` varchar(250) DEFAULT NULL,
  `updated_at` varchar(200) NOT NULL,
  `item_list` varchar(200) DEFAULT NULL,
  `attach_recepit` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daily_sales_purchases`
--

INSERT INTO `daily_sales_purchases` (`id`, `business_user_id`, `date`, `amount`, `public_id`, `payment_type`, `sales_purchases`, `created_at`, `updated_at`, `item_list`, `attach_recepit`, `name`) VALUES
(109, 140, '2020-04-13', '1', 'd3uj8rxkpryr1f3zbnut', 'cash', 'sales', '2020-04-13', '2020-04-13 10:04:14', 'ksvs sbks k', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1586772841/d3uj8rxkpryr1f3zbnut.jpg', 'vaibh'),
(110, 140, '2020-04-13', '1', 'qsuehnhni37szsxeznrj', 'cash', 'purchase', '2020-04-13', '2020-04-13 10:04:38', 'hdbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1586774338/qsuehnhni37szsxeznrj.jpg', 'gshshs');

-- --------------------------------------------------------

--
-- Table structure for table `keys`
--

CREATE TABLE `keys` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` varchar(100) NOT NULL DEFAULT '0',
  `key` varchar(100) NOT NULL DEFAULT 'admin@123',
  `level` varchar(100) NOT NULL DEFAULT '0',
  `ignore_limits` varchar(100) NOT NULL DEFAULT '0',
  `is_private_key` varchar(100) NOT NULL DEFAULT '0',
  `ip_addresses` varchar(100) DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `keys`
--

INSERT INTO `keys` (`id`, `user_id`, `key`, `level`, `ignore_limits`, `is_private_key`, `ip_addresses`, `create_at`) VALUES
(1, '0', 'admin@123', '0', '0', '0', NULL, '2020-02-18 08:49:32');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`version`) VALUES
(31);

-- --------------------------------------------------------

--
-- Table structure for table `mp_pin`
--

CREATE TABLE `mp_pin` (
  `id` int(5) UNSIGNED NOT NULL,
  `pin` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(100) NOT NULL,
  `user_id` int(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mp_pin`
--

INSERT INTO `mp_pin` (`id`, `pin`, `role`, `create_at`, `updated_at`, `user_id`) VALUES
(4, '1111', 'user', '2020-04-13 10:41:39', '2020-04-13 10:04:41', 140);

-- --------------------------------------------------------

--
-- Table structure for table `privacy_policy`
--

CREATE TABLE `privacy_policy` (
  `id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy_policy`
--

INSERT INTO `privacy_policy` (`id`, `title`, `description`) VALUES
(1, 'Privacy Policy', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `supervisormp_pin`
--

CREATE TABLE `supervisormp_pin` (
  `id` int(5) UNSIGNED NOT NULL,
  `pin` varchar(100) NOT NULL,
  `role` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(100) NOT NULL,
  `user_id` int(5) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisormp_pin`
--

INSERT INTO `supervisormp_pin` (`id`, `pin`, `role`, `create_at`, `updated_at`, `user_id`) VALUES
(1, '1111', 'supervisor', '2020-04-13 15:21:33', '2020-04-13 15:04:21', 7);

-- --------------------------------------------------------

--
-- Table structure for table `supervisor_session_token`
--

CREATE TABLE `supervisor_session_token` (
  `id` int(5) UNSIGNED NOT NULL,
  `supervisor_user_id` int(5) UNSIGNED NOT NULL,
  `sessiontoken` varchar(200) NOT NULL,
  `device_id` varchar(200) NOT NULL,
  `device_type` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `supervisor_session_token`
--

INSERT INTO `supervisor_session_token` (`id`, `supervisor_user_id`, `sessiontoken`, `device_id`, `device_type`, `created_at`, `updated_at`) VALUES
(1, 7, '1L80JDrydMSeE3hoAgIB', '', '', '2020-04-13 15:21:03', '2020-04-13 15:04:21');

-- --------------------------------------------------------

--
-- Table structure for table `superwiser_register`
--

CREATE TABLE `superwiser_register` (
  `id` int(5) UNSIGNED NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `phone` varchar(200) NOT NULL,
  `country_code` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `role` text,
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(100) NOT NULL,
  `image` text,
  `public_id` text,
  `status` int(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `superwiser_register`
--

INSERT INTO `superwiser_register` (`id`, `name`, `email`, `phone`, `country_code`, `password`, `role`, `create_at`, `updated_at`, `image`, `public_id`, `status`) VALUES
(7, 'ankit tiwari', 'ankit.tiwari@tecorb.co', '7836048635', '91', '123456', 'supervisor', '2020-04-13 09:57:02', '2020-04-13 09:04:56', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1586771792/btwjucfnruhums38bwb6.png', 'btwjucfnruhums38bwb6', 1);

-- --------------------------------------------------------

--
-- Table structure for table `terms_conditions`
--

CREATE TABLE `terms_conditions` (
  `id` int(15) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `terms_conditions`
--

INSERT INTO `terms_conditions` (`id`, `title`, `description`) VALUES
(1, 'Terms Conditions', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.');

-- --------------------------------------------------------

--
-- Table structure for table `training`
--

CREATE TABLE `training` (
  `id` int(5) UNSIGNED NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `supervisor_id` int(15) DEFAULT NULL,
  `title` varchar(200) NOT NULL,
  `description` text,
  `video` varchar(200) NOT NULL,
  `role` varchar(200) NOT NULL,
  `rating` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `assign_supervisor`
--
ALTER TABLE `assign_supervisor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`past_supervisor_id`);

--
-- Indexes for table `business_register`
--
ALTER TABLE `business_register`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_id` (`supervisor_id`);

--
-- Indexes for table `business_session_token`
--
ALTER TABLE `business_session_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_user_id` (`business_user_id`);

--
-- Indexes for table `bussiness_visit`
--
ALTER TABLE `bussiness_visit`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_register_id` (`business_register_id`);

--
-- Indexes for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`transaction_id`);

--
-- Indexes for table `credit_sales_purchases`
--
ALTER TABLE `credit_sales_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_user_id` (`business_user_id`);

--
-- Indexes for table `daily_sales_purchases`
--
ALTER TABLE `daily_sales_purchases`
  ADD PRIMARY KEY (`id`),
  ADD KEY `business_user_id` (`business_user_id`);

--
-- Indexes for table `keys`
--
ALTER TABLE `keys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mp_pin`
--
ALTER TABLE `mp_pin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supervisormp_pin`
--
ALTER TABLE `supervisormp_pin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `supervisor_session_token`
--
ALTER TABLE `supervisor_session_token`
  ADD PRIMARY KEY (`id`),
  ADD KEY `supervisor_user_id` (`supervisor_user_id`);

--
-- Indexes for table `superwiser_register`
--
ALTER TABLE `superwiser_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `training`
--
ALTER TABLE `training`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `assign_supervisor`
--
ALTER TABLE `assign_supervisor`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `business_register`
--
ALTER TABLE `business_register`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=141;
--
-- AUTO_INCREMENT for table `business_session_token`
--
ALTER TABLE `business_session_token`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;
--
-- AUTO_INCREMENT for table `bussiness_visit`
--
ALTER TABLE `bussiness_visit`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `credit_sales_purchases`
--
ALTER TABLE `credit_sales_purchases`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT for table `daily_sales_purchases`
--
ALTER TABLE `daily_sales_purchases`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mp_pin`
--
ALTER TABLE `mp_pin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supervisormp_pin`
--
ALTER TABLE `supervisormp_pin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supervisor_session_token`
--
ALTER TABLE `supervisor_session_token`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `superwiser_register`
--
ALTER TABLE `superwiser_register`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `assign_supervisor`
--
ALTER TABLE `assign_supervisor`
  ADD CONSTRAINT `assign_supervisor_ibfk_1` FOREIGN KEY (`past_supervisor_id`) REFERENCES `superwiser_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_register`
--
ALTER TABLE `business_register`
  ADD CONSTRAINT `business_register_ibfk_1` FOREIGN KEY (`supervisor_id`) REFERENCES `superwiser_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `business_session_token`
--
ALTER TABLE `business_session_token`
  ADD CONSTRAINT `business_session_token_ibfk_1` FOREIGN KEY (`business_user_id`) REFERENCES `business_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `bussiness_visit`
--
ALTER TABLE `bussiness_visit`
  ADD CONSTRAINT `bussiness_visit_ibfk_1` FOREIGN KEY (`business_register_id`) REFERENCES `business_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  ADD CONSTRAINT `confirm_payment_ibfk_1` FOREIGN KEY (`transaction_id`) REFERENCES `credit_sales_purchases` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `credit_sales_purchases`
--
ALTER TABLE `credit_sales_purchases`
  ADD CONSTRAINT `credit_sales_purchases_ibfk_1` FOREIGN KEY (`business_user_id`) REFERENCES `business_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `daily_sales_purchases`
--
ALTER TABLE `daily_sales_purchases`
  ADD CONSTRAINT `daily_sales_purchases_ibfk_1` FOREIGN KEY (`business_user_id`) REFERENCES `business_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mp_pin`
--
ALTER TABLE `mp_pin`
  ADD CONSTRAINT `mp_pin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `business_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisormp_pin`
--
ALTER TABLE `supervisormp_pin`
  ADD CONSTRAINT `supervisormp_pin_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `superwiser_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `supervisor_session_token`
--
ALTER TABLE `supervisor_session_token`
  ADD CONSTRAINT `supervisor_session_token_ibfk_1` FOREIGN KEY (`supervisor_user_id`) REFERENCES `superwiser_register` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
