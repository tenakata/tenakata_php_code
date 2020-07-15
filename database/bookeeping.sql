-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 15, 2020 at 12:41 PM
-- Server version: 5.7.30-0ubuntu0.18.04.1
-- PHP Version: 7.2.24-0ubuntu0.18.04.3

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
(1, 'Sebi', 'Salim', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '7787461581', 'bg11.png', '', 'CURRENT_TIMESTAMP');

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

--
-- Dumping data for table `assign_supervisor`
--

INSERT INTO `assign_supervisor` (`id`, `past_supervisor_id`, `user_id`, `present_supervisor_id`, `created_at`, `updated_at`) VALUES
(1, 19, '218', 19, '2020-05-19 08:20:46', ''),
(2, 19, '218', 19, '2020-05-19 08:22:13', ''),
(3, 19, '219', 19, '2020-05-19 08:22:40', ''),
(4, 19, '224', 19, '2020-05-19 08:24:26', '');

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
  `longitude` varchar(200) DEFAULT NULL,
  `otp` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `business_register`
--

INSERT INTO `business_register` (`id`, `business_name`, `name`, `phone`, `country_code`, `password`, `location`, `image`, `public_id`, `role`, `create_at`, `updated_at`, `owner_name`, `business_registered`, `registation_no`, `gender`, `core_business`, `activities`, `business_date`, `no_of_employees`, `branches`, `financial_institution`, `any_loan`, `loan_amount`, `loan_purpose`, `receive_payments`, `make_payments`, `busniness_funding`, `email`, `supervisor_id`, `status`, `status_notification`, `assign_supervisor_id`, `latitude`, `longitude`, `otp`) VALUES
(218, 'Muslima Enterprises', 'KCB', '716421710', '254', 'WAyOtqR', 'Unnamed Road, Athi River, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589112604/k19wh3txpswfzje93ch0.jpg', 'k19wh3txpswfzje93ch0', 'user', '2020-05-10 12:10:07', '2020-05-10 12:05:10', 'Hawa Musa', 'yes', 'C123456', 'Female', 'Beauty Products Shop', 'Women Beauty Shop', '2020-04-01', '10', 'yes', 'Commercial Bank', 'yes', '250000', 'Invest in a new business', 'MPESA', 'MPESA', 'Borrowing', 'hawaseby@gmail.com', 19, 1, 'true', NULL, '-1.441537686623633', '36.978122536093', ''),
(232, 'Mwana Mboka Saloon', 'Kibra Lindi Sacco', '7836048635', '91', '2FWyKSe', 'Unnamed Road, Athi River, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592918864/wn590lbvvqy4iqg5bkbg.jpg', 'wn590lbvvqy4iqg5bkbg', 'user', '2020-06-23 13:27:46', '2020-06-23 13:06:27', 'Mzee Wa Kijiji', 'yes', 'BRS1234566', 'Male', 'Selling Clothes and Fashion', 'The shop is Unique as it sits right in the centre of Jamhuri Road. Great access to people. However there is a sewer line near.', '2020-03-01', '1', 'No', 'SACCOs', 'yes', '50000', 'Make a personal investment', 'BANK TRANSFER', 'MPESA', 'Personal', NULL, 19, 1, 'false', NULL, '-1.4417198253795505', '36.977977864444256', ''),
(233, 'vaibhav buskss', 'vqibhav', '8637823310', '91', 'BkdhwIa', 'D-41, Block D, Sector 55, Noida, Uttar Pradesh 201301, India', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1593066715/wov4haxumzcxrmyfeawm.jpg', 'wov4haxumzcxrmyfeawm', 'user', '2020-06-25 06:31:57', '2020-06-25 06:06:31', 'vqobav', 'No', 'null', 'Male', 'Selling Clothes and Fashion', 'snddd', '2020-06-25', '10', 'No', 'Commercial Bank', 'No', '100', 'Increase business stock', 'Cash', 'Cash', 'Borrowing', NULL, 25, 1, 'true', NULL, '28.60095867', '77.34793904', ''),
(234, 'Drews Tasty Kitchen', 'MPESA', '722401177', '254', 'zYLX6oh', 'South C, Nairobi, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1593530297/o8ufprsybqodzb3mje9o.jpg', 'o8ufprsybqodzb3mje9o', 'user', '2020-06-30 15:18:19', '2020-06-30 15:06:18', 'Faith Muthengi', 'No', 'null', 'Female', 'Selling Cooked Food', 'Tasty Food', '2020-06-01', '1', 'yes', 'Other (Within the markets, Mpesa, Table banking etc.)', 'No', '', 'Increase business stock', 'MPESA', 'MPESA', 'Personal,Borrowing', NULL, 19, 1, 'false', NULL, '-1.3184909708797932', '36.836691331118345', ''),
(239, 'test', 'Ankit Tiwari', '7836048635', '91', 'a84t36V', 'noida', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/Screenshot_from_2020-03-17_13-08-54.png', NULL, 'user', '2020-07-09 11:17:58', '2020-07-09 11:07:17', 'ankit t', 'no', '34y7', 'male', 'dsjdjs', 'dd', '2020-05-11', '1', 'sj', 'jjds', 'dsudsu', '100', '200', '88', 'a,b', 'dkds', 'ankit.t@gmail.com', 19, 1, 'false', NULL, '1272', '3883', ''),
(240, 'fgsh', 'zbz', '9898659865', '91', 'BF8bpe5', 'Rawali Rd, Taimoorpur, Bijnor, Uttar Pradesh 246701, India', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped2201494917245657317.jpg', NULL, 'user', '2020-07-11 14:15:23', '2020-07-11 14:07:15', 'dbd', 'No', 'null', 'Male', 'Selling Clothes and Fashion', 'dbhdd', '2020-07-11', '19', 'No', 'Commercial Bank', 'No', '', 'Increase business stock', 'Cash', 'Cash', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39383877', '78.12110151', ''),
(241, 'ght', 'cs', '8937823310', '91', 'i5EJAwB', 'fvb', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped9010032564019139997.jpg', NULL, 'user', '2020-07-12 05:14:51', '2020-07-12 05:07:14', 'cf hb', 'yes', 'see fgf', 'Male', 'Selling Clothes and Fashion', 'gjh', '2020-07-12', '1', 'No', 'Commercial Bank', 'yes', '28', 'Increase business stock', 'MPESA', 'MPESA,BANK TRANSFER', 'Personal', NULL, 19, 1, 'false', NULL, '29.3938892', '78.12108105', ''),
(242, 'name', 'nammm', '8956898956', '91', '5TVIgj7', 'delhi', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped8253863067436150123.jpg', NULL, 'user', '2020-07-13 05:15:15', '2020-07-13 05:07:15', 'owner', 'yes', 'sgh', 'Male', 'Mini Market', 'comment', '2020-07-13', '10', 'yes', 'Commercial Bank', 'yes', '100', 'Buy assets', 'MPESA', 'BANK TRANSFER', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39385332', '78.12107169', ''),
(243, 'sbhs', 'dbd', '9865983598', '91', 'Nic1tUJ', 'dhd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped1495156768327705900.jpg', NULL, 'user', '2020-07-13 05:29:44', '2020-07-13 05:07:29', 'dhdy', 'yes', 'dyd', 'Male', 'Selling Clothes and Fashion', 'dhdd', '2020-07-13', '565', 'No', 'Commercial Bank', 'No', '', 'Increase business stock', 'CHEQUE', 'BANK TRANSFER', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39387238', '78.12110431', ''),
(244, 'namedh', 'dhdh', '9956238956', '91', 'AC4tQHm', 'dbelhi', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped6995714356782414390.jpg', NULL, 'user', '2020-07-13 05:33:57', '2020-07-13 05:07:33', 'ownerrr', 'yes', 'dhdh', 'Male', 'Selling Clothes and Fashion', 'sbdj', '2020-07-13', '10', 'No', 'Commercial Bank', 'yes', '100', 'Others', 'Cash', 'MPESA,Cash,CHEQUE', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39387409', '78.12109732', ''),
(245, 'nammmeee', 'whsh', '8965986598', '91', 'hQnYG3k', 'delhi', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped6509725855228015992.jpg', NULL, 'user', '2020-07-13 05:37:15', '2020-07-13 05:07:37', 'ownerrr', 'yes', 'dhdhs', 'Male', 'Selling Clothes and Fashion', 'comment', '2020-07-13', '10', 'yes', 'Commercial Bank', 'yes', '100', 'School Fees', 'MPESA', 'MPESA,Cash', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39388956', '78.12107911', ''),
(246, 'nammmeeeee', 'name', '8965896523', '91', 'lNsboIg', 'delhi', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped471225416150588353.jpg', NULL, 'user', '2020-07-13 05:41:51', '2020-07-13 05:07:41', 'owner name', 'No', 'null', 'Male', 'Selling Clothes and Fashion', 'comment', '2020-07-13', '100', 'yes', 'Commercial Bank', 'yes', '100', 'Buy assets', 'Cash', 'MPESA,CHEQUE', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39388253', '78.12109715', ''),
(247, 'name business', 'sbsh', '8945678952', '91', '50xar4O', 'delhu', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped5767168635167396937.jpg', NULL, 'user', '2020-07-13 05:43:39', '2020-07-13 05:07:43', 'ownrr', 'No', 'null', 'Male', 'Selling Clothes and Fashion', 'dhdjd', '2020-07-13', '10', 'No', 'Commercial Bank', 'yes', '100', 'School Fees', 'MPESA', 'MPESA,CHEQUE', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.39385822', '78.12109305', ''),
(248, 'nameseee', 'name', '8956895689', '91', 'NIJix3t', 'delhi', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped7247806668511178438.jpg', NULL, 'user', '2020-07-13 05:47:10', '2020-07-13 05:07:47', 'owner', 'No', 'null', 'Male', 'Selling Clothes and Fashion', 'comment', '2020-07-13', '100', 'No', 'Commercial Bank', 'yes', '100', 'Buy assets', 'MPESA', 'MPESA,CHEQUE', 'Borrowing', NULL, 19, 1, 'false', NULL, '29.3938696', '78.12108869', ''),
(249, 'Zanfresh Company', 'Kenya Bankers Sacco', '741360961', '254', 'ZSLyAOJ', 'Mechanical, Nairobi, Kenya', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped5544567008948244245.jpg', NULL, 'user', '2020-07-13 12:24:03', '2020-07-13 12:07:24', 'Muzdalfat Khamis', 'yes', 'BS123456Y', 'Female', 'Wholesale Shop', 'Shop in Syoks', '2020-06-01', '2', 'No', 'SACCOs', 'yes', '250000', 'Buy assets', 'MPESA', 'MPESA', 'Borrowing', NULL, 19, 1, 'false', NULL, '-1.3769667316228151', '36.92400670610368', '');

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
(150, 218, 'liUgRVkeLyT0AjIKbsWQ', '', '', '2020-05-10 12:12:56', '2020-05-10 12:05:12'),
(172, 232, 'HyIPbEWJMsnxCN7hTopk', '', '', '2020-06-23 20:36:47', '2020-06-23 20:06:36'),
(173, 232, 'CXvijI7GOSsW6JwA3YcK', '', '', '2020-06-24 07:05:10', '2020-06-24 07:06:05'),
(174, 232, 'yw7t0RGfh6i3C15eMpWg', '', '', '2020-06-25 06:45:54', '2020-06-25 06:06:45'),
(175, 234, 'R6tzewr1aUhGPbYc7dAW', '', '', '2020-07-01 06:05:53', '2020-07-01 06:07:05'),
(176, 234, 'H9mwjA1UbLyWNQMEhFkT', '', '', '2020-07-02 04:25:06', '2020-07-02 04:07:25'),
(177, 234, 'KLgw2PGofJkIUtSE6NMF', '', '', '2020-07-08 08:58:59', '2020-07-08 08:07:58'),
(184, 218, 'eHBvNkwmJSiVtaMY4cLz', '', '', '2020-07-10 05:30:44', '2020-07-10 05:07:30'),
(185, 218, 'Wnj0mDTCQbyfEXU7uVzq', '', '', '2020-07-10 05:36:06', '2020-07-10 05:07:36'),
(187, 239, '5LtQfuU1Vs763lgmy8GH', '', '', '2020-07-10 06:28:22', '2020-07-10 06:07:28'),
(188, 239, 'dgGkPA0SoBHmzbyaMtTv', '', '', '2020-07-10 06:54:57', '2020-07-10 06:07:54'),
(189, 239, 'PkTJDwZAFQlOfrMbGR9K', '', '', '2020-07-10 06:55:24', '2020-07-10 06:07:55'),
(190, 239, 'FTPqpzG2tLvHyc8JlY0M', '', '', '2020-07-10 10:25:22', '2020-07-10 10:07:25'),
(191, 239, 'm8xksQOp9cjLJPrvWuf1', '', '', '2020-07-11 06:11:46', '2020-07-11 06:07:11'),
(192, 249, 'UzDGcOt18SuTo3CFBvyl', '', '', '2020-07-13 12:26:40', '2020-07-13 12:07:26'),
(193, 239, 'psiCNHEZaTRl7BW8jQry', '', '', '2020-07-14 11:42:33', '2020-07-14 11:07:42'),
(194, 239, 'of2XxNQMphAqKkBWs5Tl', '', '', '2020-07-14 12:49:04', '2020-07-14 12:07:49');

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

--
-- Dumping data for table `bussiness_visit`
--

INSERT INTO `bussiness_visit` (`id`, `business_register_id`, `current_date`, `comment`, `bussiness_location`, `latitude`, `longitude`, `stock`, `busy_shop`, `created_at`, `status`) VALUES
(2, 249, '2020-07-14', 'visited and trained on various aspects of  book keeping ', 'Unnamed Road, Athi River, Kenya', '-1.44144372548908', '36.97813980281353', '5', '3', 'CURRENT_TIMESTAMP', 'false');

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
(21, 128, '5800', 'credit', 'MPESA Ref. MN125HHGFK ', 'sales', 'test', '2020-06-23 21:02:26', '2020-06-23 21:06:02'),
(22, 136, '1', 'credit', 'dhd', 'sales', 'ddhaksdjh', '2020-07-14 11:29:34', '2020-07-14 11:07:29'),
(23, 136, '1', 'credit', 'ff', 'sales', 'ddhaksdjh', '2020-07-14 11:29:44', '2020-07-14 11:07:29'),
(24, 136, '1', 'credit', 'gg', 'sales', 'ddhaksdjh', '2020-07-14 11:30:51', '2020-07-14 11:07:30'),
(25, 136, '1', 'credit', 'sbs', 'sales', 'ddhaksdjh', '2020-07-14 11:31:07', '2020-07-14 11:07:31'),
(26, 140, '1', 'credit', 'ddh', 'sales', 'ddhaksdjh', '2020-07-14 11:32:01', '2020-07-14 11:07:32'),
(27, 141, '1', 'credit', 'sgd', 'sales', 'This is to remind you that you owe test\\n8937823310\\namount: 10 for purchases done on 2020-07-14.\\nPlease pay up. \\nThank you.\\nPowered by Tenakata. \\nFor Help Call 0728888863!', '2020-07-14 12:52:30', '2020-07-14 12:07:52'),
(28, 141, '1', 'credit', 'shd', 'sales', 'This is to remind you that you owe test\\n8937823310\\namount: 10 for purchases done on 2020-07-14.\\nPlease pay up. \\nThank you.\\nPowered by Tenakata. \\nFor Help Call 0728888863!', '2020-07-14 12:52:40', '2020-07-14 12:07:52');

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
  `country_code` varchar(250) NOT NULL,
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

INSERT INTO `credit_sales_purchases` (`id`, `business_user_id`, `date`, `amount`, `phone`, `country_code`, `id_no`, `name`, `item_list`, `attach_recepit`, `public_id`, `payment_type`, `sales_purchases`, `created_at`, `updated_at`) VALUES
(128, 232, '2020-06-23', '35800', '7836048635', '91', 'Sale to Sebie', '', 'He bought Some stuff worth 35,800. he will pay by Tuesday next week', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592945521/yp25yam3bos2oosfkwhp.jpg', 'yp25yam3bos2oosfkwhp', 'credit', 'sales', '2020-06-23', '2020-06-23 20:06:52'),
(129, 233, '2020-06-22', '5000', '712421412', '254', 'stuff from Joyce', 'Stocks', 'purchased stuff from Joyce on credit', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592947409/gvl06ivmdsokvs7hvlmm.jpg', 'gvl06ivmdsokvs7hvlmm', 'credit', 'purchase', '2020-06-23', '2020-06-23 21:06:23'),
(130, 233, '2020-06-22', '5000', '712421412', '254', 'stuff from Joyce', 'Stocks', 'purchased stuff from Joyce on credit', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592947409/gvl06ivmdsokvs7hvlmm.jpg', 'gvl06ivmdsokvs7hvlmm', 'credit', 'sales', '2020-06-23', '2020-06-23 21:06:23'),
(131, 239, '2020-07-02', '5000', '7836048635', '91', '653456', 'punit', 'test', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/rrr.png', NULL, 'credit', 'purchase', '2020-07-10', '2020-07-10 05:07:07'),
(133, 218, '2020-04-04', '5000', '7836048635', '91', '653456', 'punit', 'test', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background1.jpg', NULL, 'cash', 'sales', '2020-07-10', '2020-07-10 06:07:01'),
(134, 239, '2020-04-04', '5000', '7836048635', '91', '653456', 'punit', 'test', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/icon.png', NULL, 'credit', 'sales', '2020-07-10', '2020-07-10 06:07:56'),
(135, 239, '2020-04-04', '5000', '7836048635', '91', '653bhjhbj56', 'punit', 'test', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/icon2.png', NULL, 'credit', 'sales', '2020-07-10', '2020-07-10 07:07:13'),
(136, 239, '2020-07-10', '10', '8937823310', '91', 'desc', '', 'djdjd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped7727222471271331460.jpg', NULL, 'credit', 'sales', '2020-07-10', '2020-07-10 11:07:41'),
(137, 239, '2020-07-10', '10', '8937823310', '91', 'dbdhd', 'Stocks', 'dbdd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped1999821990214875064.jpg', NULL, 'credit', 'purchase', '2020-07-10', '2020-07-10 11:07:42'),
(138, 239, '2020-07-11', '565', '8989898989', '91', 'hfh', 'Stocks', 'bf', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped4359191290404869723.jpg', NULL, 'credit', 'purchase', '2020-07-11', '2020-07-11 06:07:48'),
(139, 249, '2020-07-09', '54000', '728888863', '254', 'Sales of Ngumu', '', 'Sales List as Below', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped7334992627117956208.jpg', NULL, 'credit', 'sales', '2020-07-13', '2020-07-13 12:07:29'),
(140, 239, '2020-07-14', '100', '8937823310', '91', 'description', '', 'sgdhd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped6332184247964410161.jpg', NULL, 'credit', 'sales', '2020-07-14', '2020-07-14 11:07:36'),
(141, 239, '2020-07-14', '12', '8937823310', '91', 'gff', '', 'gng', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped9001680545623953663.jpg', NULL, 'credit', 'sales', '2020-07-14', '2020-07-14 12:07:46');

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
  `id_no` varchar(250) NOT NULL,
  `sales_purchases` varchar(200) NOT NULL,
  `created_at` varchar(250) DEFAULT NULL,
  `updated_at` varchar(200) NOT NULL,
  `item_list` varchar(200) DEFAULT NULL,
  `attach_recepit` varchar(200) DEFAULT NULL,
  `name` varchar(200) DEFAULT NULL,
  `phone` varchar(250) NOT NULL,
  `country_code` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `daily_sales_purchases`
--

INSERT INTO `daily_sales_purchases` (`id`, `business_user_id`, `date`, `amount`, `public_id`, `payment_type`, `id_no`, `sales_purchases`, `created_at`, `updated_at`, `item_list`, `attach_recepit`, `name`, `phone`, `country_code`) VALUES
(237, 218, '2020-06-23', '2000', 'xld0j0svgdhifojeg8wh', 'cash', 'Sales for Tuesday ', 'sales', '2020-06-23', '2020-06-23 14:06:52', '2 shirts\n1 dress', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592923978/xld0j0svgdhifojeg8wh.jpg', 'Stocks', '', '254'),
(238, 218, '2020-06-01', '50000', 'pt85ubzzo2ssghnnb6as', 'cash', 'June Stock', 'purchase', '2020-06-23', '2020-06-23 14:06:58', '10 skirts\n15 shirts\n12 blouses\n10 dresses', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592924320/pt85ubzzo2ssghnnb6as.jpg', 'Stocks', '', '254'),
(239, 232, '2020-06-22', '12000', 'incimyfi1asmc2dtvvz4', 'cash', 'sales for Monday', 'sales', '2020-06-23', '2020-06-23 20:06:39', 'A number of Items.', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592944794/incimyfi1asmc2dtvvz4.jpg', 'Stocks', '', '254'),
(240, 232, '2020-06-22', '50000', 'mghjo1odtx6jrmlvid0s', 'cash', 'Stock from Gikosh', 'purchase', '2020-06-23', '2020-06-23 21:06:19', 'Stock', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592947166/mghjo1odtx6jrmlvid0s.jpg', 'Stocks', '', '254'),
(241, 233, '2020-06-15', '2500', 'tytz79oqtai7zujaqs6c', 'cash', 'weekly Rent', 'sales', '2020-06-23', '2020-06-23 21:06:20', 'Rent Expenses', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592947258/tytz79oqtai7zujaqs6c.jpg', 'Rent', '', '254'),
(242, 233, '2020-06-23', '12500', 'ykwgxx1r7fof0j9cl9zy', 'cash', 'Stock from Dubai', 'purchase', '2020-06-23', '2020-06-23 21:06:22', 'stuff for Eid', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592947338/ykwgxx1r7fof0j9cl9zy.jpg', 'Stocks', '', '254'),
(247, 239, '2020-05-11', '90000', NULL, 'cash', '12', 'purchase', '2020-07-10', '2020-07-10 05:07:06', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/eweb16.png', 'ankit', '7836048635', '91'),
(248, 239, '2020-05-11', '90000', NULL, 'cash', '12', 'sales', '2020-07-10', '2020-07-10 06:07:33', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/eweb17.png', 'ankit', '7836048635', '91'),
(249, 239, '19/02/2020', '90000', NULL, 'cash', 'hfhf', 'sales', '2020-07-10', '2020-07-10 06:07:34', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background6.jpg', 'ankit', '8989898989', '91'),
(250, 239, '2020-05-11', '90000', NULL, 'cash', '12', 'sales', '2020-07-10', '2020-07-10 06:07:34', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/eweb19.png', 'ankit', '7836048635', '91'),
(251, 239, '19/02/2020', '90000', NULL, 'cash', 'hfhf', 'sales', '2020-07-10', '2020-07-10 06:07:35', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background7.jpg', 'ankit', '', ''),
(252, 239, '19/02/2020', '90000', NULL, 'cash', 'hfhf', 'sales', '2020-07-10', '2020-07-10 06:07:40', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background8.jpg', 'ankit', '', ''),
(253, 239, '2020-07-10', '90000', NULL, 'cash', 'hfhf', 'sales', '2020-07-10', '2020-07-10 06:07:52', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background9.jpg', 'ankit', '', ''),
(254, 239, '2020-05-11', '90000', NULL, 'cash', '12', 'sales', '2020-07-10', '2020-07-10 07:07:24', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/eweb110.png', NULL, '7836048635', '91'),
(255, 239, '19/02/2020', '90000', NULL, 'cash', '11', 'purchase', '2020-07-10', '2020-07-10 07:07:34', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background25.jpg', 'ankit', '9879879877', '91'),
(256, 239, '19/02/2020', '90000', NULL, 'cash', 'jhguhv', 'purchase', '2020-07-10', '2020-07-10 07:07:34', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background26.jpg', 'ankit', '9879879877', '91'),
(257, 239, '19/02/2020', '90000', NULL, 'cash', 'jhguhv', 'purchase', '2020-07-10', '2020-07-10 07:07:35', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background27.jpg', '', '', ''),
(258, 239, '19/02/2020', '90000', NULL, 'cash', 'jhguhv', 'sales', '2020-07-10', '2020-07-10 08:07:16', 'helll', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/background28.jpg', '', '', ''),
(259, 239, '2020-07-10', '10', NULL, 'cash', 'vaibhav', 'sales', '2020-07-10', '2020-07-10 11:07:40', 'fbshdd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped8217632678759168750.jpg', '', '', '91'),
(260, 239, '2020-07-11', '10', NULL, 'cash', 'whs', 'sales', '2020-07-11', '2020-07-11 05:07:10', 'shd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped3608016809166142383.jpg', '', '', '91'),
(261, 239, '2020-07-11', '10', NULL, 'cash', 'whs', 'sales', '2020-07-11', '2020-07-11 05:07:10', 'shd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped36080168091661423831.jpg', '', '', '91'),
(262, 239, '2020-07-11', '1.', NULL, 'cash', 'shd', 'sales', '2020-07-11', '2020-07-11 05:07:20', 'dhd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped9055402316388365927.jpg', '', '', '91'),
(263, 239, '2020-07-11', '49', NULL, 'cash', 'ddhf', 'sales', '2020-07-11', '2020-07-11 05:07:22', 'fhfh', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped8680952582326239909.jpg', '', '', '91'),
(264, 239, '2020-07-11', '59', NULL, 'cash', 'xjd', 'sales', '2020-07-11', '2020-07-11 05:07:23', 'dj', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped8827684585556469585.jpg', '', '', '91'),
(265, 239, '2020-07-11', '69', NULL, 'cash', 'fg', 'sales', '2020-07-11', '2020-07-11 05:07:25', 'gg', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped7717588382827648698.jpg', '', '', '91'),
(266, 239, '2020-07-11', '66', NULL, 'cash', 'gh', 'sales', '2020-07-11', '2020-07-11 05:07:26', 'ggv', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped3630126894358421709.jpg', '', '', '91'),
(267, 239, '2020-07-11', '49', NULL, 'cash', 'dgdh', 'sales', '2020-07-11', '2020-07-11 05:07:36', 'sgs', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped8559637722644321667.jpg', '', '', '91'),
(268, 239, '2020-07-11', '8', NULL, 'cash', 'b', 'sales', '2020-07-11', '2020-07-11 05:07:37', 'ghh', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped554698932390086714.jpg', '', '', '91'),
(269, 239, '2020-07-11', '5', NULL, 'cash', 'f', 'sales', '2020-07-11', '2020-07-11 05:07:42', 'ff', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped8646910218487071568.jpg', '', '', '91'),
(270, 239, '2020-07-11', '2', NULL, 'cash', 'fg', 'sales', '2020-07-11', '2020-07-11 05:07:44', 'hj', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped5227183792902535407.jpg', '', '', '91'),
(271, 239, '2020-07-11', '2', NULL, 'cash', 'h', 'sales', '2020-07-11', '2020-07-11 05:07:44', 'tt', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped7135979695450745368.jpg', '', '', '91'),
(272, 239, '2020-07-11', '3', NULL, 'cash', 'g', 'sales', '2020-07-11', '2020-07-11 05:07:48', 'g', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped727578085946378581.jpg', '', '', '91'),
(273, 239, '2020-07-11', '10', NULL, 'cash', 'gif', 'sales', '2020-07-11', '2020-07-11 05:07:56', 'gog', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped9156704794173025253.jpg', '', '', '91'),
(274, 239, '2020-07-11', '79', NULL, 'cash', 'dv', 'sales', '2020-07-11', '2020-07-11 05:07:58', 'b', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped4394892790022896999.jpg', '', '', '91'),
(275, 239, '2020-07-11', '56', NULL, 'cash', 'dh', 'sales', '2020-07-11', '2020-07-11 06:07:09', 'dh', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped5509692321835490712.jpg', '', '', '91'),
(276, 239, '2020-07-11', '056', NULL, 'cash', 'gs', 'sales', '2020-07-11', '2020-07-11 06:07:34', 'd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped2324335122097128017.jpg', '', '', '91'),
(277, 239, '2020-07-11', '70', NULL, 'cash', 'sgs', 'purchase', '2020-07-11', '2020-07-11 06:07:47', 'shdhd', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped4887527371763054801.jpg', 'Stocks', '', '91'),
(278, 239, '2020-07-11', '56', NULL, 'cash', 'dh', 'purchase', '2020-07-11', '2020-07-11 06:07:48', 'sb', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped6529253675469112765.jpg', 'Stocks', '', '91'),
(279, 249, '2020-07-07', '5000', NULL, 'cash', 'Sales', 'sales', '2020-07-13', '2020-07-13 12:07:28', 'Sales List', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped5248562864925289605.jpg', '', '', '254'),
(280, 249, '2020-07-13', '5000', NULL, 'cash', 'Purchasss', 'purchase', '2020-07-13', '2020-07-13 21:07:38', 'stock purchased.', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped280218527722503132.jpg', 'Stocks', '', '254');

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
(1, 'Privacy Policy', '<p><strong>Tenakata Enterprises</strong> built the Tenakata app as a Commercial app. This SERVICE is provided by Tenakata Enterprises and is intended for use as is.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>This page is used to inform visitors regarding our policies with the collection, use, and disclosure of Personal Information if anyone decided to use our Service.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>If you choose to use our Service, then you agree to the collection and use of information in relation to this policy. The Personal Information that we collect is used for providing and improving the Service. we will not use or share your information with anyone except as described in this Privacy Policy.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>The terms used in this Privacy Policy have the same meanings as in our Terms and Conditions, which is accessible at Tenakata unless otherwise defined in this Privacy Policy.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Information Collection and Use**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>For a better experience, while using our Service, we may require you to provide us with certain personally identifiable information, including but not limited to Name of Business, Name of Owner, Mobile Number of Business, Business Registration Number. The information that we request will be retained by us and used as described in this privacy policy.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>The app does use third party services that may collect information used to identify you.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>Link to privacy policy of third party service providers used by the app</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>* [Google Play Services](https://www.google.com/policies/privacy/)</p>\r\n\r\n<p>* [Google Analytics for Firebase](https://firebase.google.com/policies/analytics)</p>\r\n\r\n<p>* [Firebase Crashlytics](https://firebase.google.com/support/privacy/)</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Log Data**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>we want to inform you that whenever you use our Service, in a case of an error in the app we collect data and information (through third party products) on your phone called Log Data. This Log Data may include information such as your device Internet Protocol (“IP”) address, device name, operating system version, the configuration of the app when utilizing our Service, the time and date of your use of the Service, and other statistics.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Cookies**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>Cookies are files with a small amount of data that are commonly used as anonymous unique identifiers. These are sent to your browser from the websites that you visit and are stored on your device&#39;s internal memory.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>This Service does not use these “cookies” explicitly. However, the app may use third party code and libraries that use “cookies” to collect information and improve their services. You have the option to either accept or refuse these cookies and know when a cookie is being sent to your device. If you choose to refuse our cookies, you may not be able to use some portions of this Service.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Service Providers**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>we may employ third-party companies and individuals due to the following reasons:</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>* To facilitate our Service;</p>\r\n\r\n<p>* To provide the Service on our behalf;</p>\r\n\r\n<p>* To perform Service-related services; or</p>\r\n\r\n<p>* To assist us in analyzing how our Service is used.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>we want to inform users of this Service that these third parties have access to your Personal Information. The reason is to perform the tasks assigned to them on our behalf. However, they are obligated not to disclose or use the information for any other purpose.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Security**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>we value your trust in providing us your Personal Information, thus we are striving to use commercially acceptable means of protecting it. But remember that no method of transmission over the internet, or method of electronic storage is 100% secure and reliable, and we cannot guarantee its absolute security.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Links to Other Sites**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>This Service may contain links to other sites. If you click on a third-party link, you will be directed to that site. Note that these external sites are not operated by us. Therefore, we strongly advise you to review the Privacy Policy of these websites. we have no control over and assume no responsibility for the content, privacy policies, or practices of any third-party sites or services.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>**Children’s Privacy**</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>These Services do not address anyone under the age of 13. we do not knowingly collect personally identifiable information from children under 13\\. In the case we discover that a child under 13 has provided us with personal information, we immediately delete this from our servers. If you are a parent or guardian and you are aware that your child has provided us with personal information, please contact us so that we will be able to do necessary actions.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Changes to This Privacy Policy**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>we may update our Privacy Policy from time to time. Thus, you are advised to review this page periodically for any changes. we will notify you of any changes by posting the new Privacy Policy on this page.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>This policy is effective as of 2020-04-19</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Contact Us**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>If you have any questions or suggestions about our Privacy Policy, do not hesitate to contact us at +254728888863 or <a href=\"mailto:mobile@tenakata.com\">mobile@tenakata.com</a></strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><br>\r\n </p>\r\n');

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
(20, 19, 'vmuZzNT6CgkR3ahWwpSn', '', '', '2020-04-27 14:07:50', '2020-04-27 14:04:07'),
(21, 19, 'pNHBQ3h4PKLFyTej7kiA', '', '', '2020-05-06 06:47:16', '2020-05-06 06:05:47'),
(22, 19, 'YPI27pbexMydkLH3ua1E', '', '', '2020-05-06 06:51:26', '2020-05-06 06:05:51'),
(23, 19, 'uF2wMQzJ0gfkDb6CRAit', '', '', '2020-05-06 09:56:58', '2020-05-06 09:05:56'),
(24, 19, 'Kxn4WNftFr8p7iyEdv3k', '', '', '2020-05-07 08:30:49', '2020-05-07 08:05:30'),
(25, 19, 'Bvgoenik2YWUG15RT6ZH', '', '', '2020-05-08 08:53:17', '2020-05-08 08:05:53'),
(26, 19, '4vGrbkW5BnS7IfYCDdUq', '', '', '2020-05-08 09:16:20', '2020-05-08 09:05:16'),
(27, 19, 'zAoP2a6blp4nuq09Yvxj', '', '', '2020-05-08 10:21:06', '2020-05-08 10:05:21'),
(28, 19, '2sWgMf6LaN9okTEDC7ht', '', '', '2020-05-13 17:59:23', '2020-05-13 17:05:59'),
(29, 19, 'YLj3NlUOocVyhvf4FgDW', '', '', '2020-05-14 06:47:58', '2020-05-14 06:05:47'),
(30, 19, 'vMLEc5s3TIdGu0yfN9jg', '', '', '2020-05-14 16:46:08', '2020-05-14 16:05:46'),
(34, 19, 'InXfAcvFsutp8dEkTVNi', '', '', '2020-06-23 12:38:55', '2020-06-23 12:06:38'),
(35, 25, 'djhmS0x2BOCUJHQR3zK6', '', '', '2020-06-25 06:25:23', '2020-06-25 06:06:25'),
(36, 25, 'S763lYOfmRCQTbWvyP5h', '', '', '2020-06-25 06:30:47', '2020-06-25 06:06:30'),
(37, 25, 'ox0S5FiVAQ4kl7Uz3CYg', '', '', '2020-06-25 06:48:35', '2020-06-25 06:06:48'),
(38, 25, '7cZ93NvetRphulMJkmyF', '', '', '2020-07-02 04:22:17', '2020-07-02 04:07:22'),
(39, 19, 'xOEeTP3ACnaUzSqL2bDw', '', '', '2020-07-11 14:11:19', '2020-07-11 14:07:11'),
(40, 19, 'hs3BF96rcwTL7UHDIdqN', '', '', '2020-07-11 19:12:10', '2020-07-11 19:07:12'),
(41, 19, 'Sh4ydmWKjGJD7Czsf1E3', '', '', '2020-07-13 12:20:31', '2020-07-13 12:07:20');

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
  `otp` varchar(250) NOT NULL,
  `status` int(4) DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `superwiser_register`
--

INSERT INTO `superwiser_register` (`id`, `name`, `email`, `phone`, `country_code`, `password`, `role`, `create_at`, `updated_at`, `image`, `public_id`, `otp`, `status`) VALUES
(19, 'Sebie Salim', 'sebi@ekenya.co.ke', '728888863', '254', '123456789', 'supervisor   ', '2020-04-27 13:53:45', '2020-04-27 13:04:53', 'http://ec2-18-219-231-177.us-east-2.compute.amazonaws.com/upload/cropped5604419582749941326.jpg', 'ovowj12jozj4ky8svkvt', '', 1),
(25, 'Linda Onyango', 'linda@sme-supportcentre.com', '731031069', '254', '123456', 'supervisor', '2020-06-23 11:51:32', '2020-06-23 11:06:51', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1592913090/kmji246qcybw4zokudm1.jpg', 'kmji246qcybw4zokudm1', '4704', 1),
(28, 'ankit', 'ankit@gmail.com', '8765432345', '91', '8282828', 'supervisor  ', '2020-07-06 12:05:28', '', 'bg22.png', NULL, '', 1);

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
(1, 'Terms Conditions', '<p>By downloading or using the app, these terms will automatically apply to you – you should make sure therefore that you read them carefully before using the app. You’re not allowed to copy, or modify the app, any part of the app, or our trademarks in any way. You’re not allowed to attempt to extract the source code of the app, and you also shouldn’t try to translate the app into other languages, or make derivative versions. The app itself, and all the trade marks, copyright, database rights and other intellectual property rights related to it, still belong to Tenakata Enterprises.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>Tenakata Enterprises is committed to ensuring that the app is as useful and efficient as possible. For that reason, we reserve the right to make changes to the app or to charge for its services, at any time and for any reason. We will never charge you for the app or its services without making it very clear to you exactly what you’re paying for.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>The Tenakata app stores and processes personal data that you have provided to us, in order to provide our Service. It’s your responsibility to keep your phone and access to the app secure. We therefore recommend that you do not jailbreak or root your phone, which is the process of removing software restrictions and limitations imposed by the official operating system of your device. It could make your phone vulnerable to malware/viruses/malicious programs, compromise your phone’s security features and it could mean that the Tenakata app won’t work properly or at all.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>The app does use third party services that declare their own Terms and Conditions.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>Link to Terms and Conditions of third party service providers used by the app</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>* [Google Play Services](https://policies.google.com/terms)</p>\r\n\r\n<p>* [Google Analytics for Firebase](https://firebase.google.com/terms/analytics)</p>\r\n\r\n<p>* [Firebase Crashlytics](https://firebase.google.com/terms/crashlytics)</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>You should be aware that there are certain things that Tenakata Enterprises will not take responsibility for. Certain functions of the app will require the app to have an active internet connection. The connection can be Wi-Fi, or provided by your mobile network provider, but Tenakata Enterprises cannot take responsibility for the app not working at full functionality if you don’t have access to Wi-Fi, and you don’t have any of your data allowance left.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>If you’re using the app outside of an area with Wi-Fi, you should remember that your terms of the agreement with your mobile network provider will still apply. As a result, you may be charged by your mobile provider for the cost of data for the duration of the connection while accessing the app, or other third party charges. In using the app, you’re accepting responsibility for any such charges, including roaming data charges if you use the app outside of your home territory (i.e. region or country) without turning off data roaming. If you are not the bill payer for the device on which you’re using the app, please be aware that we assume that you have received permission from the bill payer for using the app.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>Along the same lines, Tenakata Enterprises cannot always take responsibility for the way you use the app i.e. You need to make sure that your device stays charged – if it runs out of battery and you can’t turn it on to avail the Service, Tenakata Enterprises cannot accept responsibility.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>With respect to Tenakata Enterprises’s responsibility for your use of the app, when you’re using the app, it’s important to bear in mind that although we endeavour to ensure that it is updated and correct at all times, we do rely on third parties to provide information to us so that we can make it available to you. Tenakata Enterprises accepts no liability for any loss, direct or indirect, you experience as a result of relying wholly on this functionality of the app.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>At some point, we may wish to update the app. The app is currently available on Android – the requirements for system&#40;and for any additional systems we decide to extend the availability of the app to&#41; may change, and you’ll need to download the updates if you want to keep using the app. Tenakata Enterprises does not promise that it will always update the app so that it is relevant to you and/or works with the Android version that you have installed on your device. However, you promise to always accept updates to the application when offered to you, We may also wish to stop providing the app, and may terminate use of it at any time without giving notice of termination to you. Unless we tell you otherwise, upon any termination, (a) the rights and licenses granted to you in these terms will end; (b) you must stop using the app, and (if needed) delete it from your device.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Changes to This Terms and Conditions**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>We may update our Terms and Conditions from time to time. Thus, you are advised to review this page periodically for any changes. we will notify you of any changes by posting the new Terms and Conditions on this page.</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p>These terms and conditions are effective as of 2020-04-19</p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>**Contact Us**</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n\r\n<p><strong>If you have any questions or suggestions about our Terms and Conditions, do not hesitate to contact us at +254728888863 or mobile@tenakata.com</strong></p>\r\n\r\n<p><br>\r\n </p>\r\n');

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
-- Dumping data for table `training`
--

INSERT INTO `training` (`id`, `user_id`, `supervisor_id`, `title`, `description`, `video`, `role`, `rating`, `created_at`, `updated_at`) VALUES
(1, 'NULL', 19, 'Introduction to Tenakata', 'Introductory video for all Supervisors.', 'Tenakata Intro.mp4', 'supervisor', '5', '2020-06-23 14:29:59', '2020-06-23 14:06:29');

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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `business_register`
--
ALTER TABLE `business_register`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=250;
--
-- AUTO_INCREMENT for table `business_session_token`
--
ALTER TABLE `business_session_token`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=195;
--
-- AUTO_INCREMENT for table `bussiness_visit`
--
ALTER TABLE `bussiness_visit`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `credit_sales_purchases`
--
ALTER TABLE `credit_sales_purchases`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;
--
-- AUTO_INCREMENT for table `daily_sales_purchases`
--
ALTER TABLE `daily_sales_purchases`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=281;
--
-- AUTO_INCREMENT for table `keys`
--
ALTER TABLE `keys`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mp_pin`
--
ALTER TABLE `mp_pin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `privacy_policy`
--
ALTER TABLE `privacy_policy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `supervisormp_pin`
--
ALTER TABLE `supervisormp_pin`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `supervisor_session_token`
--
ALTER TABLE `supervisor_session_token`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `superwiser_register`
--
ALTER TABLE `superwiser_register`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT for table `terms_conditions`
--
ALTER TABLE `terms_conditions`
  MODIFY `id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `training`
--
ALTER TABLE `training`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
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
