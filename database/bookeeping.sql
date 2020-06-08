-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 05, 2020 at 12:04 PM
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
(1, 'Sebi', 'Salim', 'admin@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '7787461581', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1588770597/bsatqyrrhqbf7wslu4wh.png', 'bsatqyrrhqbf7wslu4wh', 'CURRENT_TIMESTAMP');

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
(218, 'Muslima Enterprises', 'KCB', '716421710', '254', 'WAyOtqR', 'Unnamed Road, Athi River, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589112604/k19wh3txpswfzje93ch0.jpg', 'k19wh3txpswfzje93ch0', 'user', '2020-05-10 12:10:07', '2020-05-10 12:05:10', 'Hawa Musa', 'yes', 'C123456', 'Female', 'Beauty Products Shop', 'Women Beauty Shop', '2020-04-01', '10', 'yes', 'Commercial Bank', 'yes', '250000', 'Invest in a new business', 'MPESA', 'MPESA', 'Borrowing', NULL, 19, 1, 'true', NULL, '-1.441537686623633', '36.978122536093', ''),
(219, 'ViviEntreprises', 'Commercial Bank of Africa', '704435288', '254', 'S5zkdVB', 'Unnamed Road, Athi River, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589113545/acz1kcgqk4si4uer0xah.jpg', 'acz1kcgqk4si4uer0xah', 'user', '2020-05-10 12:25:47', '2020-05-10 12:05:25', 'Vivian Kayitesi', 'yes', 'B-125678', 'Female', 'Selling Clothes and Fashion', 'Fashionable Handcrafts', '2020-05-10', '1', 'No', 'Commercial Bank', 'No', '', 'Increase business stock', 'MPESA', 'MPESA,Cash', 'Personal', NULL, 19, 1, 'true', NULL, '-1.4415708370506763', '36.978075513616204', ''),
(220, 'MN Legal', 'FCB', '728074872', '254', 'I7gJi4b', 'Unnamed Road, Athi River, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589113720/vwqv1wgfeyzyse7n7qvh.jpg', 'vwqv1wgfeyzyse7n7qvh', 'user', '2020-05-10 12:28:42', '2020-05-10 12:05:28', 'Mbula Nzuki Esq', 'yes', 'MN-0012456', 'Female', 'Others', 'Legal Management Business', '2018-05-10', '5', 'No', 'Commercial Bank', 'yes', '250000', 'Buy assets', 'MPESA,BANK TRANSFER', 'BANK TRANSFER,CHEQUE', 'Personal', NULL, 19, 1, 'true', NULL, '-1.4415232697501779', '36.97812764905393', ''),
(221, 'Fashion Eden', 'Stima Sacco', '723161966', '254', 'wBuM729', 'Imenti House,  Nairobi, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589113895/yag5jwkw9dxah0gov8k4.jpg', 'yag5jwkw9dxah0gov8k4', 'user', '2020-05-10 12:31:37', '2020-05-10 12:05:31', 'Joyce Muthoni', 'yes', 'B-34578', 'Female', 'Selling Clothes and Fashion', 'Fashion Women Clothes', '2014-05-10', '1', 'No', 'SACCOs', 'yes', '500000', 'Increase business stock', 'MPESA,Cash', 'MPESA,Cash', 'Personal,Borrowing', NULL, 19, 1, 'true', NULL, '-1.441507050767541', '36.978091606870294', ''),
(222, 'Tenakata Entreprises', 'Paramount Bank', '702710808', '254', 'CaEAcvB', 'Unnamed Road, Athi River, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589134892/vgkigvzuxiuvb49snwcc.jpg', 'vgkigvzuxiuvb49snwcc', 'user', '2020-05-10 18:21:35', '2020-05-10 18:05:21', 'Sebie Salim', 'yes', 'BN-8MCK8BK', 'Male', 'Retail Shop', 'Tenakata', '2019-11-18', '6', 'No', 'Commercial Bank', 'No', '', 'Increase business stock', 'MPESA,Cash,BANK TRANSFER,CHEQUE', 'MPESA,Cash,BANK TRANSFER,CHEQUE', 'Personal,Borrowing', NULL, 19, 1, 'true', NULL, '-1.4415272092446685', '36.97828833013773', ''),
(224, 'RoomTech', 'MaishaBora', '9667695585', '91', 'aq4G8y5', '3rd Floor, Delta Tower, Chiromo Rd, Nairobi, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589203666/oizictjz6qoipcuxjbr3.jpg', 'oizictjz6qoipcuxjbr3', 'user', '2020-05-11 13:27:48', '2020-05-11 13:05:27', 'Abdul Suleimain', 'No', 'null', 'Male', 'Transport Business', 'Tech Shop', '2020-04-01', '2', 'No', 'SACCOs', 'yes', '120000', 'Increase business stock', 'MPESA', 'BANK TRANSFER', 'Borrowing', NULL, 19, 1, 'true', NULL, '-1.2654547300189734', '36.80229401215911', '9592'),
(230, 'business nm', 'fhb', '8937823310', '91', 'vaibhav', 'E-15, Block E, Sector 55, Noida, Uttar Pradesh 201301, India', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590409831/xvqqlglgt4ucvbx6hn5g.jpg', 'xvqqlglgt4ucvbx6hn5g', 'user', '2020-05-25 12:30:32', '2020-05-25 12:05:30', 'Vaibhav', 'No', 'null', 'Male', 'Selling Clothes and Fashion', 'fhn', '2020-05-25', '10', 'No', 'Commercial Bank', 'No', '', 'Increase business stock', 'CHEQUE', 'Cash', 'Borrowing', NULL, 22, 1, 'true', NULL, '28.6005639', '77.34794098', '2413'),
(231, 'Ngumi Business', 'KCB', '705824854', '254', '7m2upFv', 'Makaburini, Nairobi, Kenya', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590666922/i0ydhhy0zbwmlttvldit.jpg', 'i0ydhhy0zbwmlttvldit', 'user', '2020-05-28 11:55:24', '2020-05-28 11:05:55', 'Zaiba  Muteo', 'yes', 'C123458902', 'Female', 'Wholesale Shop', 'Businesses', '2020-05-14', '2', 'yes', 'Commercial Bank', 'yes', '200000', 'Increase business stock', 'MPESA', 'MPESA', 'Personal', NULL, 19, 1, 'true', NULL, '-1.298141973093152', '36.82374942116439', '');

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
(151, 221, 'JzeIq3lT2tL0RxGHv9b6', '', '', '2020-05-10 12:55:30', '2020-05-10 12:05:55'),
(152, 222, 'rO8Q29hej3Yq71Tc5nxU', '', '', '2020-05-11 06:49:33', '2020-05-11 06:05:49'),
(155, 224, 'RjnMYdVsHoftypAJzclv', '', '', '2020-05-15 06:21:00', '2020-05-15 06:05:21'),
(157, 224, '16baiOjh9H7FkfnRepxy', '', '', '2020-05-18 05:20:50', '2020-05-18 05:05:20'),
(158, 224, 'mPCjJZuI1xso76O0VBkA', '', '', '2020-05-18 09:23:20', '2020-05-18 09:05:23'),
(159, 224, 'qsxGk9zye2BT3baUtwiI', '', '', '2020-05-19 06:09:08', '2020-05-19 06:05:09'),
(161, 224, 'XiZWmAfbR0JHyl4VOwqG', '', '', '2020-05-25 04:24:05', '2020-05-25 04:05:24'),
(164, 224, 'Xvjy1IPYqHLbBeQhJKsg', '', '', '2020-05-25 08:08:10', '2020-05-25 08:05:08'),
(168, 230, 'QWH8S16Tn0wiczoAbBIk', '', '', '2020-05-27 11:22:53', '2020-05-27 11:05:22'),
(169, 230, 'i92EIPtDLq10CgHR6ue7', '', '', '2020-05-27 11:29:33', '2020-05-27 11:05:29'),
(170, 231, 'ySaWtpdZsF2oq3bQ6cEA', '', '', '2020-05-28 11:58:00', '2020-05-28 11:05:58'),
(171, 230, '1FnOAJhoaxSr89UdRY3b', '', '', '2020-06-01 05:32:45', '2020-06-01 05:06:32');

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
(1, 75, '680', 'credit', 'MPESA Reference Number ', 'sales', 'test', '2020-05-11 20:34:53', '2020-05-11 20:05:34'),
(2, 74, '100', 'credit', 'test', 'sales', 'dshuduiufdjkfdkjfdoijoifjdoijfdoi', '2020-05-15 08:42:29', '2020-05-15 08:05:42'),
(4, 74, '100', 'credit', 'test', 'sales', 'dshuduiufdjkfdkjfdoijoifjdoijfdoi', '2020-05-16 05:41:30', '2020-05-16 05:05:41'),
(5, 74, '100', 'credit', 'test', 'sales', 'dshuduiufdjkfdkjfdoijoifjdoijfdoi', '2020-05-16 06:30:20', '2020-05-16 06:05:30'),
(6, 88, '1', 'credit', 'svsgs', 'sales', 'dbdh', '2020-05-20 07:59:45', '2020-05-20 07:05:59'),
(7, 89, '10', 'credit', 'test', 'sales', 'test', '2020-05-20 11:19:58', '2020-05-20 11:05:19'),
(8, 90, '50', 'credit', 'tt', 'sales', 'dshuduiufdjkfdkjfdoijoifjdoijfdoi', '2020-05-20 12:00:19', '2020-05-20 12:05:00'),
(9, 92, '5000', 'credit', 'Test', 'purchase', '', '2020-05-21 19:55:31', '2020-05-21 19:05:55'),
(10, 108, '25000', 'credit', 'Paid', 'sales', '', '2020-05-26 19:18:42', '2020-05-26 19:05:18'),
(11, 91, '25000', 'credit', 'Paid.', 'sales', '', '2020-05-26 19:20:14', '2020-05-26 19:05:20'),
(12, 78, '52800', 'credit', 'text', 'sales', '', '2020-05-27 18:26:41', '2020-05-27 18:05:26'),
(13, 121, '25000', 'credit', 'text', 'sales', '', '2020-05-27 18:27:05', '2020-05-27 18:05:27'),
(14, 109, '500', 'credit', 'test', 'purchase', '', '2020-05-27 19:06:08', '2020-05-27 19:05:06'),
(15, 92, '20000', 'credit', 'test', 'purchase', '', '2020-05-27 19:09:02', '2020-05-27 19:05:09'),
(16, 126, '1', 'credit', 'cf', 'sales', 'This is to remind you that you owe business nm\\n7017044992\\namount: 99 for purchases done on 2020-06-01.\\nPlease pay up. \\nThank you.\\nPowered by Tenakata. \\nFor Help Call 0728888863!', '2020-06-01 06:28:39', '2020-06-01 06:06:28'),
(17, 126, '99', 'credit', 'rf', 'sales', '', '2020-06-01 06:38:56', '2020-06-01 06:06:38'),
(18, 125, '100', 'credit', 'fg', 'sales', '', '2020-06-01 06:39:08', '2020-06-01 06:06:39'),
(19, 124, '999', 'credit', 'vg', 'sales', '', '2020-06-01 06:40:25', '2020-06-01 06:06:40'),
(20, 127, '1000', 'credit', 'xbxh', 'sales', '', '2020-06-01 07:40:14', '2020-06-01 07:06:40');

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
(74, 222, '2020-05-04', '2500', '7836048635', '91', 'Sebie Salim Mkopaji Change to Name', 'Change to Description', 'Items List 2000\nMohammed Jean\'s 2000', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589229014/vcwvf89atk3cbvb201rj.jpg', 'vcwvf89atk3cbvb201rj', 'credit', 'sales', '2020-05-11', '2020-05-11 20:05:30'),
(75, 222, '2020-05-10', '5680', '702710808', '254', 'Weka Jina Hapa', 'Put Description  Here', 'List Items Here 2000', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589229156/zxq765mzdqey43szq6cl.jpg', 'zxq765mzdqey43szq6cl', 'credit', 'sales', '2020-05-11', '2020-05-11 20:05:32'),
(76, 222, '2020-05-11', '2369', '702710808', '254', 'Name of The PERSON purchasing on Credit', 'Description', 'Test 12345', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589229577/cksvjtjhf9qbh7efcnri.jpg', 'cksvjtjhf9qbh7efcnri', 'credit', 'sales', '2020-05-11', '2020-05-11 20:05:39'),
(77, 222, '2020-05-11', '6500', '702710808', '254', 'Sebie Salim', 'Details of the Credit', 'Test Items', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589232571/vmgknt4ujz1h2o9zu5pj.jpg', 'vmgknt4ujz1h2o9zu5pj', 'credit', 'purchase', '2020-05-11', '2020-05-11 21:05:29'),
(78, 222, '2020-04-28', '52800', '702710808', '254', 'Change this to Client Name', 'Change this to Description', 'Change this to Details.', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589473838/rdixr909vvj3p6jm6ind.jpg', 'rdixr909vvj3p6jm6ind', 'credit', 'sales', '2020-05-14', '2020-05-14 16:05:30'),
(79, 224, '2020-05-15', '10', '9856985698', '254', 'client name', 'Selling Clothes and Fashion', 'gj fjbj', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589541561/yo4rmu1uovmrhem8ogwr.jpg', 'yo4rmu1uovmrhem8ogwr', 'credit', 'sales', '2020-05-15', '2020-05-15 11:05:19'),
(80, 224, '2020-05-17', '10', '8989898989', '', 'Selling Clothes and Fashion', 'vaibhav', 'dydhdj', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589710290/kcslkppnaewzte8spy4y.jpg', 'kcslkppnaewzte8spy4y', 'credit', 'purchase', '2020-05-17', '2020-05-17 10:05:11'),
(81, 224, '2020-05-18', '100', '9865326598', '', 'Selling Clothes and Fashion', 'vaibhav', 'gjcnvnc', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589774469/mx0ltcbcnvlqunzuvmux.jpg', 'mx0ltcbcnvlqunzuvmux', 'credit', 'sales', '2020-05-18', '2020-05-18 04:05:01'),
(82, 224, '2020-05-18', '10', '9865986598', '', 'Transport Business', 'adi', 'dhdh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589774755/ushfdjylaiofo2vu5zoq.jpg', 'ushfdjylaiofo2vu5zoq', 'credit', 'purchase', '2020-05-18', '2020-05-18 04:05:05'),
(83, 224, '2020-05-18', '16', '7836048635', '91', 'Others', 'vvvvv', 'dhdhdhdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589783204/ry8pgaxevsnndcurw4ay.jpg', 'ry8pgaxevsnndcurw4ay', 'credit', 'sales', '2020-05-18', '2020-05-18 06:05:26'),
(84, 224, '2020-05-18', '10', '98989898989', '', 'Maji', 'xbd', 'dhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589792436/sznab1hwxsopdcho3tgw.jpg', 'sznab1hwxsopdcho3tgw', 'credit', 'purchase', '2020-05-18', '2020-05-18 09:05:00'),
(85, 224, '2020-05-19', '100', '9898989898', '254', 'Umemep', 'vaibhav', 'shhdhddjdh list', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589880981/lh6vieu5yz5wexgywzsy.jpg', 'lh6vieu5yz5wexgywzsy', 'credit', 'sales', '2020-05-19', '2020-05-19 09:05:36'),
(86, 224, '2020-05-19', '12', '8989898989', '254', 'Umemep', 'name', 'dbdhdn', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589888422/ivwrjcjzroj53v2hsxs8.jpg', 'ivwrjcjzroj53v2hsxs8', 'credit', 'sales', '2020-05-19', '2020-05-19 11:05:40'),
(87, 222, '2020-05-18', '25000', '728888863', '254', 'Stocks', 'Sebie Salim', 'Stuff', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589901528/eychdlbb9rzhzhpedq4c.jpg', 'eychdlbb9rzhzhpedq4c', 'credit', 'sales', '2020-05-19', '2020-05-19 15:05:18'),
(88, 224, '2020-05-20', '100', '8937823310', '254', 'Stocks', 'vaibhav', 'details', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589961576/ql3kzq7c2xurjfndk5jy.jpg', 'ql3kzq7c2xurjfndk5jy', 'credit', 'sales', '2020-05-20', '2020-05-20 07:05:59'),
(89, 224, '2020-05-20', '100', '7836048635', '91', 'Salary', 'Ankit tiwari', 'gsgsg', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589973029/kzvfgb5afptp0dalnxfq.jpg', 'kzvfgb5afptp0dalnxfq', 'credit', 'sales', '2020-05-20', '2020-05-20 11:05:10'),
(90, 224, '2020-05-20', '100', '7836048635', '91', 'Rent', 'Ankit', 'ff', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589974189/pu35biwv4dyv6hv3mupi.jpg', 'pu35biwv4dyv6hv3mupi', 'credit', 'sales', '2020-05-20', '2020-05-20 11:05:29'),
(91, 222, '2020-05-20', '25000', '728888863', '254', 'Stocks', 'Sebie Salim', 'List the details. \n\nwe do not need the Stocks on this screen. this is for credit sales. and it\'s by default stock. description needs to be there.', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590086273/ilpkn1nedohhidkfxf7l.jpg', 'ilpkn1nedohhidkfxf7l', 'credit', 'sales', '2020-05-21', '2020-05-21 18:05:37'),
(92, 222, '2020-05-20', '25000', '702710808', '254', 'Stocks', 'Sebie Salim', 'Additional Stock', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590090905/vy31b3p29utzqws5rp1f.jpg', 'vy31b3p29utzqws5rp1f', 'credit', 'purchase', '2020-05-21', '2020-05-21 19:05:55'),
(106, 230, '2020-05-26', '10', '9865986598', '91', 'hd', 'Stocks', 'dbdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590485843/f8a0osnhfn3cvhchyxcw.jpg', 'f8a0osnhfn3cvhchyxcw', 'credit', 'purchase', '2020-05-26', '2020-05-26 09:05:37'),
(107, 230, '2020-05-26', '10', '8937823310', '91', 'decsrodjd', '', 'dhdnd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590486276/lskdrruzqf3omyled2ul.jpg', 'lskdrruzqf3omyled2ul', 'credit', 'sales', '2020-05-26', '2020-05-26 09:05:44'),
(108, 222, '2020-05-26', '25000', '728888863', '254', 'Stuff za Kuuza', '', 'kuuza le8o', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590492040/mgsvtcs17qpkzorqjsr2.jpg', 'mgsvtcs17qpkzorqjsr2', 'credit', 'sales', '2020-05-26', '2020-05-26 11:05:20'),
(109, 222, '2020-05-25', '1000', '72921212', '254', 'rent', 'Rent', 'rent', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590492247/qa2g04lee9rholliepps.jpg', 'qa2g04lee9rholliepps', 'credit', 'purchase', '2020-05-26', '2020-05-26 11:05:24'),
(110, 230, '2020-05-27', '10', '8956895689', '91', 'dbdjd', '', 'dhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590574491/rvomkolreqs9qsqgpgdg.jpg', 'rvomkolreqs9qsqgpgdg', 'credit', 'sales', '2020-05-27', '2020-05-27 10:05:14'),
(111, 230, '2020-05-27', '10', '8995958989', '91', 'dhdhdhddh', '', 'dhdhdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590577521/vwezwa4tyqkzlgw27gtm.jpg', 'vwezwa4tyqkzlgw27gtm', 'credit', 'sales', '2020-05-27', '2020-05-27 11:05:05'),
(112, 230, '2020-05-27', '11', '9865986598', '91', 'description', 'Stocks', 'shhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590585992/ufvdq2duzsm3im29ruho.jpg', 'ufvdq2duzsm3im29ruho', 'credit', 'purchase', '2020-05-27', '2020-05-27 13:05:26'),
(113, 230, '2020-05-27', '101', '8956895689', '91', 'desc', '', 'dbfn', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586063/mibpa3xs04xj1c1ddfqr.jpg', 'mibpa3xs04xj1c1ddfqr', 'credit', 'sales', '2020-05-27', '2020-05-27 13:05:27'),
(114, 230, '2020-05-26', '68', '9856985698', '91', 'description', '', 'bfh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586618/gwgpwgco7y4v1fkr6ok8.jpg', 'gwgpwgco7y4v1fkr6ok8', 'credit', 'sales', '2020-05-27', '2020-05-27 13:05:36'),
(115, 230, '2020-05-26', '700', '9856985698', '91', 'vrb', '', 'hch', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586671/xhdahauabsvkwoq8zcqr.jpg', 'xhdahauabsvkwoq8zcqr', 'credit', 'sales', '2020-05-27', '2020-05-27 13:05:37'),
(116, 230, '2020-05-27', '100', '9859986985', '91', 'hf', '', 'hc', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586780/fqbktjq8pr44ylxvjtjq.jpg', 'fqbktjq8pr44ylxvjtjq', 'credit', 'sales', '2020-05-27', '2020-05-27 13:05:39'),
(117, 230, '2020-05-27', '1016', '9865986599', '91', 'dbbd', 'Stocks', 'dnndbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590587125/x9pijltek5jtgdpjvxki.jpg', 'x9pijltek5jtgdpjvxki', 'credit', 'purchase', '2020-05-27', '2020-05-27 13:05:45'),
(118, 230, '2020-05-26', '1596', '9865986598', '91', 'djdhdhd', 'Stocks', 'dbdh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590587168/y9feiuhvhpoyelodplef.jpg', 'y9feiuhvhpoyelodplef', 'credit', 'purchase', '2020-05-27', '2020-05-27 13:05:46'),
(119, 230, '2020-05-26', '35', '9865986598', '91', 'dbdhd', 'Stocks', 'sbshshxbb', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590587299/xesmofcjhfcr55fckxex.jpg', 'xesmofcjhfcr55fckxex', 'credit', 'purchase', '2020-05-27', '2020-05-27 13:05:48'),
(120, 230, '2020-04-15', '5468', '9876549876', '91', 'hxhd', 'Stocks', 'sbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590587352/dos6jotzmuw3mqzplvgs.jpg', 'dos6jotzmuw3mqzplvgs', 'credit', 'purchase', '2020-05-27', '2020-05-27 13:05:49'),
(121, 222, '2020-05-27', '25000', '716421710', '254', 'vitu kwa Deni', '', 'Purchase of stuff', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590603645/rc3eyzevzcclxwnefvnw.jpg', 'rc3eyzevzcclxwnefvnw', 'credit', 'sales', '2020-05-27', '2020-05-27 18:05:20'),
(122, 222, '2020-05-27', '35000', '705824854', '254', 'weed', '', '5 blunts', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590667553/lopkdv5xqqomxeojt1ju.jpg', 'lopkdv5xqqomxeojt1ju', 'credit', 'sales', '2020-05-28', '2020-05-28 12:05:05'),
(123, 230, '2020-06-01', '10', '49959595', '91', 'dhdhd', 'Stocks', 'hdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590989612/kadjoguvk08rkk4dkmih.jpg', 'kadjoguvk08rkk4dkmih', 'credit', 'purchase', '2020-06-01', '2020-06-01 05:06:33'),
(124, 230, '2020-06-01', '1000', '08937823310', '91', 'description', '', 'sbhdnd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590992459/brm2pb462dkcm7sd2xk9.jpg', 'brm2pb462dkcm7sd2xk9', 'credit', 'sales', '2020-06-01', '2020-06-01 06:06:20'),
(125, 230, '2020-06-01', '100', '80968965', '91', 'dbdh', '', 'shhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590992677/kfirwlwxjnhsphonxg1v.jpg', 'kfirwlwxjnhsphonxg1v', 'credit', 'sales', '2020-06-01', '2020-06-01 06:06:24'),
(126, 230, '2020-06-01', '100', '7017044992', '91', 'dhdh', '', 'dhdd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590992845/iatbvszcittdmfuxtcea.jpg', 'iatbvszcittdmfuxtcea', 'credit', 'sales', '2020-06-01', '2020-06-01 06:06:27'),
(127, 230, '2020-06-01', '1000', '8937823310', '91', 'shdh', '', 'dhdjd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590997196/pwt2ra3xm8zf1af2xlaj.jpg', 'pwt2ra3xm8zf1af2xlaj', 'credit', 'sales', '2020-06-01', '2020-06-01 07:06:39');

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
(137, 222, '2020-05-03', '10000', 'jzlz5pvdwrwwn7ixts1h', 'cash', '', 'sales', '2020-05-11', '2020-05-11 06:05:52', 'Purchase Vitu Kadhaa', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589179923/jzlz5pvdwrwwn7ixts1h.jpg', 'Sales za Sunday', '', ''),
(138, 222, '2020-05-04', '6500', 'wgfguzdtu8chw6lupv2d', 'cash', '', 'sales', '2020-05-11', '2020-05-11 06:05:52', 'Sold various Items; Sales for Biz', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589179978/wgfguzdtu8chw6lupv2d.jpg', 'Sales za Monday', '', ''),
(139, 222, '2020-05-05', '2500', 'wrohlq7oh5n556ajpdgs', 'cash', '', 'sales', '2020-05-11', '2020-05-11 06:05:53', 'List of Items', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589180028/wrohlq7oh5n556ajpdgs.jpg', 'Lowe sales due to arain', '', ''),
(140, 222, '2020-05-06', '6390', 'i8mftivge0wiojimfbzs', 'cash', '', 'sales', '2020-05-11', '2020-05-11 07:05:00', 'Stuff', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589180425/i8mftivge0wiojimfbzs.jpg', 'Stuff On the Said', '', ''),
(141, 222, '2020-05-08', '9850', 'gc1jmgif3griuroujenp', 'cash', '', 'sales', '2020-05-11', '2020-05-11 07:05:01', 'Testing', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589180486/gc1jmgif3griuroujenp.jpg', 'Sema', '', ''),
(142, 222, '2020-05-07', '5800', 'vow6ofsj1flvpnh7ihgy', 'cash', '', 'sales', '2020-05-11', '2020-05-11 07:05:24', 'sema', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589181865/vow6ofsj1flvpnh7ihgy.jpg', 'Test flani', '', ''),
(143, 222, '2020-05-09', '12000', 'oxsezrcgvfwxhw3a7ihb', 'cash', '', 'sales', '2020-05-11', '2020-05-11 07:05:25', 'list', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589181909/oxsezrcgvfwxhw3a7ihb.jpg', 'Sema', '', ''),
(144, 222, '2020-05-10', '2580', 'aoe4zpr1bmiftsxgvkhd', 'cash', '', 'sales', '2020-05-11', '2020-05-11 07:05:51', 'test', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589183516/aoe4zpr1bmiftsxgvkhd.jpg', 'sunday', '', ''),
(145, 222, '2020-05-11', '2147', 'mjrc1llwb3e1ucjhzq3z', 'cash', '', 'sales', '2020-05-11', '2020-05-11 07:05:54', 'testing', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589183658/mjrc1llwb3e1ucjhzq3z.jpg', 'sisemi', '', ''),
(164, 222, '2020-05-11', '5000', 'qa0zjbgokuovxwu6eysa', 'cash', '', 'sales', '2020-05-11', '2020-05-11 20:05:26', 'Test', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589228769/qa0zjbgokuovxwu6eysa.jpg', 'Additional', '', ''),
(165, 222, '2020-05-10', '25000', 'ukw7sjxmgup6ipjhgac3', 'cash', '', 'purchase', '2020-05-11', '2020-05-11 20:05:47', 'List of Items Purchased.', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589230037/ukw7sjxmgup6ipjhgac3.jpg', 'Description of what to purchase. Change this to a drop down', '', ''),
(166, 222, '2020-05-10', '1250', 'hymyast2ozkqpbzhwjv0', 'cash', '', 'purchase', '2020-05-11', '2020-05-11 21:05:01', 'Items 1200', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589230895/hymyast2ozkqpbzhwjv0.jpg', 'Description', '', ''),
(167, 222, '2020-05-08', '3520', 'ywlt9ljvthijbox0cqhi', 'cash', '', 'purchase', '2020-05-11', '2020-05-11 21:05:07', 'List Items', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589231231/ywlt9ljvthijbox0cqhi.jpg', 'Description Flani', '', ''),
(168, 222, '2020-05-09', '6540', 'sjeafcg590vuf1vxhxst', 'cash', '', 'purchase', '2020-05-11', '2020-05-11 21:05:10', 'List vitu', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589231434/sjeafcg590vuf1vxhxst.jpg', 'description', '', ''),
(170, 222, '2020-04-30', '25000', 'sg6nkjzasw9xaupvgnzi', 'cash', '', 'sales', '2020-05-14', '2020-05-14 16:05:27', 'This will be details', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589473673/sg6nkjzasw9xaupvgnzi.jpg', 'This Should be description', '', ''),
(171, 222, '2020-04-29', '25000', 'coejytjk5wifx66lgj30', 'cash', '', 'purchase', '2020-05-14', '2020-05-14 16:05:40', 'change the word description to Details List', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589474428/coejytjk5wifx66lgj30.jpg', 'Change name to Description and Put a Drop Down List', '', ''),
(172, 224, '2020-05-15', '100', 'z4izldhrmgwm1g0ev4xr', 'cash', '', 'sales', '2020-05-15', '2020-05-15 11:05:13', 'vahsksndn', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589541207/z4izldhrmgwm1g0ev4xr.jpg', 'Beauty Products Shop', '', ''),
(173, 224, '2020-05-17', '100', 'kd5hropxinrrzhf6xpun', 'cash', '', 'purchase', '2020-05-17', '2020-05-17 10:05:11', 'hshs', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589710315/kd5hropxinrrzhf6xpun.jpg', 'Selling Clothes and Fashion', '', ''),
(174, 224, '2020-05-17', '100', 'exxovvhelrwz2yvq3z1r', 'cash', '', 'sales', '2020-05-17', '2020-05-17 10:05:27', 'ehdh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589711237/exxovvhelrwz2yvq3z1r.jpg', 'Mobile Phone and Accessories Shop', '', ''),
(175, 224, '2020-05-18', '100', 'wkwttdd9cbyrzgbkglkg', 'cash', '', 'sales', '2020-05-18', '2020-05-18 06:05:26', 'dydhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589783163/wkwttdd9cbyrzgbkglkg.jpg', '', '', ''),
(176, 224, '2020-05-18', '100', 'cghtmddjmitcrsrf4pgb', 'cash', '', 'purchase', '2020-05-18', '2020-05-18 06:05:32', 'dhdbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589783548/cghtmddjmitcrsrf4pgb.jpg', '', '', ''),
(177, 224, '2020-05-18', '10', 'exp0lxa353iujfiyh4yl', 'cash', '', 'purchase', '2020-05-18', '2020-05-18 06:05:34', 'sgddb', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589783696/exp0lxa353iujfiyh4yl.jpg', '', '', ''),
(185, 224, '2020-05-18', '10', 'ruc0qgwbn4sjujhylzwq', 'cash', 'Umemep', 'sales', '2020-05-18', '2020-05-18 09:05:32', 'vyf', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589794333/ruc0qgwbn4sjujhylzwq.jpg', '', '', ''),
(186, 224, '2020-05-18', '10', 'l1kattelobft6h3umv9l', 'cash', 'Stocks', 'sales', '2020-05-18', '2020-05-18 09:05:45', 'zhdhdbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589795125/l1kattelobft6h3umv9l.jpg', '', '', ''),
(187, 224, '2020-05-18', '10', 'sdc3dgp9ezmy2yvdjb8x', 'cash', 'Stocks', 'sales', '2020-05-18', '2020-05-18 10:05:06', 'hv', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589796376/sdc3dgp9ezmy2yvdjb8x.jpg', '', '', ''),
(188, 224, '2020-05-19', '100', 'trjqs3x2rurg11zyaxzy', 'cash', '6868686', 'sales', '2020-05-19', '2020-05-19 09:05:37', 'vzhsvs', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589881024/trjqs3x2rurg11zyaxzy.jpg', '', '', ''),
(189, 224, '2020-05-19', '100', 'f2ujv1vc9rwq6cz1hemo', 'cash', 'description', 'purchase', '2020-05-19', '2020-05-19 09:05:44', 'shdndhddu', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589881461/f2ujv1vc9rwq6cz1hemo.jpg', '', '', ''),
(190, 224, '2020-05-19', '10', 'coh4gve9tjrmzh6zu0ly', 'cash', 'ggggg', 'purchase', '2020-05-19', '2020-05-19 10:05:18', 'djddhhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589883481/coh4gve9tjrmzh6zu0ly.jpg', '', '', ''),
(191, 224, '2020-05-19', '100', 'xeq6urphjzgshxtc3rc7', 'cash', 'today is friday .... hello ..fjfhfhfjfjjffnf', 'sales', '2020-05-19', '2020-05-19 10:05:27', 'dhdjdj', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589884030/xeq6urphjzgshxtc3rc7.jpg', '', '', ''),
(192, 222, '2020-05-18', '52000', 's71ovhs1hhaquikmgtrm', 'cash', 'Sakes for 18th', 'sales', '2020-05-19', '2020-05-19 14:05:59', 'stuff sold', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589900359/s71ovhs1hhaquikmgtrm.jpg', '', '', ''),
(193, 222, '2020-05-21', '25800', 'wcvczdjgftbsel2pdice', 'cash', 'Cash Sales for 21st', 'sales', '2020-05-21', '2020-05-21 18:05:06', 'Sold Many Items today. thank you\nsold butter \nsold clothes\nmambo Mebgi', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590084394/wcvczdjgftbsel2pdice.jpg', '', '', ''),
(194, 222, '2020-05-20', '35000', 'iqkmykrykkppgadowpsi', 'cash', 'A sale Higher than 21st', 'sales', '2020-05-21', '2020-05-21 18:05:11', 'let us see..', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590084661/iqkmykrykkppgadowpsi.jpg', '', '', ''),
(195, 222, '2019-12-25', '100000', 'kumtiqifetakb6n7mkkl', 'cash', 'Xmas Shopping', 'sales', '2020-05-21', '2020-05-21 18:05:31', 'Xmas Shopping..', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590085910/kumtiqifetakb6n7mkkl.jpg', '', '', ''),
(196, 222, '2020-04-21', '12500', 'o1diuwixehjrfenbucvb', 'cash', 'Purchase of Stock. This should be the drop Down.', 'purchase', '2020-05-21', '2020-05-21 19:05:29', 'The list is here.', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590089360/o1diuwixehjrfenbucvb.jpg', '', '', ''),
(211, 230, '2020-05-26', '10', 'cs9oou9ttjngurujy78b', 'cash', 'description', 'sales', '2020-05-26', '2020-05-26 09:05:44', 'dhdh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590486251/cs9oou9ttjngurujy78b.jpg', 'Stocks', '', '91'),
(212, 230, '2020-05-26', '40', 'rwvzflyzw5r2yns38flk', 'cash', 'dbhdhd', 'purchase', '2020-05-26', '2020-05-26 09:05:47', 'dbddh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590486438/rwvzflyzw5r2yns38flk.jpg', 'Salary', '8937823310', '91'),
(213, 222, '2020-05-25', '25800', 'juowufhtnjpltj8txsqa', 'cash', 'Sales za Tuesday ', 'sales', '2020-05-26', '2020-05-26 11:05:19', 'mambo sawa', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590491979/juowufhtnjpltj8txsqa.jpg', 'Stocks', '', '254'),
(214, 222, '2020-05-25', '2100', 'pn2hlxsfyg0gzkywsbp6', 'cash', 'Purchase ', 'purchase', '2020-05-26', '2020-05-26 11:05:22', 'sems', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590492146/pn2hlxsfyg0gzkywsbp6.jpg', 'Stocks', '728888863', '254'),
(215, 230, '2020-05-27', '10', 'kqbijqkughvv6p74nnck', 'cash', 'dhdh', 'sales', '2020-05-27', '2020-05-27 04:05:35', 'dhdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590554133/kqbijqkughvv6p74nnck.jpg', 'Stocks', '', '91'),
(216, 230, '2020-05-27', '10', 'pitbrrbrn9irxlkky4tb', 'cash', 'dgdhd', 'sales', '2020-05-27', '2020-05-27 11:05:04', 'dhdndbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590577477/pitbrrbrn9irxlkky4tb.jpg', 'Stocks', '', '91'),
(217, 230, '2020-05-27', '10', 'ybwtlmehetej2gq5xkmr', 'cash', 'shhsdh', 'purchase', '2020-05-27', '2020-05-27 11:05:07', 'dbdh', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590577657/ybwtlmehetej2gq5xkmr.jpg', 'Stocks', '', '91'),
(218, 230, '2020-04-16', '1000', 'ihaw7ycxlolyks7jwarv', 'cash', 'hdbd', 'sales', '2020-05-27', '2020-05-27 11:05:14', 'dhdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590578046/ihaw7ycxlolyks7jwarv.jpg', 'Stocks', '', '91'),
(219, 230, '2020-05-27', '100', 'jonuf1fs7drtabeq9nlq', 'cash', 'shdbd', 'sales', '2020-05-27', '2020-05-27 11:05:14', 'dudhdn', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590578089/jonuf1fs7drtabeq9nlq.jpg', 'Stocks', '', '91'),
(220, 230, '2020-04-15', '20', 'weeo2meyitp7ir4pvhf3', 'cash', 'hd', 'purchase', '2020-05-27', '2020-05-27 13:05:19', 'dhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590585590/weeo2meyitp7ir4pvhf3.jpg', 'Salary', '', '91'),
(221, 230, '2020-05-27', '11', 'jbjf8f4uyxth96nberpu', 'cash', 'description', 'purchase', '2020-05-27', '2020-05-27 13:05:25', 'detail list', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590585959/jbjf8f4uyxth96nberpu.jpg', 'Stocks', '', '91'),
(222, 230, '2020-05-27', '101', 's1aym1qyykgdpyfdbdfr', 'cash', 'description', 'sales', '2020-05-27', '2020-05-27 13:05:27', 'eyej', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586034/s1aym1qyykgdpyfdbdfr.jpg', 'Stocks', '', '91'),
(223, 230, '2020-05-27', '293', 'hxs7sqvrkgzplfizpre9', 'cash', 'tvhg', 'sales', '2020-05-27', '2020-05-27 13:05:36', 'hug', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586568/hxs7sqvrkgzplfizpre9.jpg', 'Stocks', '', '91'),
(224, 230, '2020-05-27', '12', 'hksue6g7tibnmbh6tzp1', 'cash', 'hfc', 'sales', '2020-05-27', '2020-05-27 13:05:38', 'hcg', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586701/hksue6g7tibnmbh6tzp1.jpg', 'Stocks', '', '91'),
(225, 230, '2020-05-26', '12', 'vfwqvndrncqcyhzy7kga', 'cash', 'brb', 'sales', '2020-05-27', '2020-05-27 13:05:38', 'hdjv', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586725/vfwqvndrncqcyhzy7kga.jpg', 'Stocks', '', '91'),
(226, 230, '2020-05-27', '253', 'li7s9n9f5uxlezq5lnbi', 'cash', 'gfv', 'sales', '2020-05-27', '2020-05-27 13:05:39', 'jfb', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586750/li7s9n9f5uxlezq5lnbi.jpg', 'Stocks', '', '91'),
(227, 230, '2020-05-26', '200', 't5a7hftsfcyamcggmjiw', 'cash', 'fjv', 'sales', '2020-05-27', '2020-05-27 13:05:40', 'gb', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590586812/t5a7hftsfcyamcggmjiw.jpg', 'Stocks', '', '91'),
(228, 230, '2020-05-27', '17', 'gnogcxckkmguwcpjr1mc', 'cash', 'xbbx', 'purchase', '2020-05-27', '2020-05-27 13:05:44', 'dhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590587054/gnogcxckkmguwcpjr1mc.jpg', 'Stocks', '', '91'),
(229, 230, '2020-05-27', '600', 'b6udy1esjcms7qcclbuj', 'cash', 'hssh', 'purchase', '2020-05-27', '2020-05-27 13:05:47', 'dbdjdb', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590587245/b6udy1esjcms7qcclbuj.jpg', 'Stocks', '', '91'),
(230, 230, '2020-05-27', '1', 'wp6mju0nxq0ryvaqynyn', 'cash', 'dhdb', 'sales', '2020-05-27', '2020-05-27 16:05:47', 'dbd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590598043/wp6mju0nxq0ryvaqynyn.jpg', 'Stocks', '', '91'),
(231, 230, '2020-05-26', '2', 'virg0jhldufbqu8fw116', 'cash', 'hd', 'sales', '2020-05-27', '2020-05-27 16:05:47', 'dhdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590598068/virg0jhldufbqu8fw116.jpg', 'Stocks', '', '91'),
(232, 230, '2020-05-27', '10', 'ipddv5fozierdiubkkaq', 'cash', 'sbshehd', 'purchase', '2020-05-27', '2020-05-27 16:05:48', 'dbdjd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590598105/ipddv5fozierdiubkkaq.jpg', 'Stocks', '', '91'),
(233, 230, '2020-05-15', '1000', 'bvn0pnwvcjreci3mjllz', 'cash', 'd', 'sales', '2020-05-27', '2020-05-27 16:05:50', 'dhdhd', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590598239/bvn0pnwvcjreci3mjllz.jpg', 'Stocks', '', '91'),
(234, 222, '2020-05-27', '5000', 'bj42j2jm0rzltrcv6neq', 'cash', 'Purchase of Items', 'sales', '2020-05-27', '2020-05-27 18:05:17', 'List Items', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590603460/bj42j2jm0rzltrcv6neq.jpg', 'Stocks', '', '254'),
(235, 222, '2020-05-27', '25470', 'noclwnseoiwggt8nsqbs', 'cash', 'Mauzo', 'purchase', '2020-05-27', '2020-05-27 18:05:38', 'Purchase', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590604704/noclwnseoiwggt8nsqbs.jpg', 'Stocks', '', '254'),
(236, 222, '2020-06-04', '2500', 'cvc3a4hahipydjfkjuka', 'cash', 'Summary for Wednesday 2nd', 'sales', '2020-06-04', '2020-06-04 06:06:26', 'items', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1591252004/cvc3a4hahipydjfkjuka.jpg', 'Stocks', '', '254');

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
(31, 22, '4sWHO2zSNcXFaUVTpqnw', '', '', '2020-05-25 12:28:35', '2020-05-25 12:05:28');

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
(19, 'Sebie Salim', 'sebi@ekenya.co.ke', '728888863', '254', '123456789', 'supervisor   ', '2020-04-27 13:53:45', '2020-04-27 13:04:53', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1588749613/ovowj12jozj4ky8svkvt.jpg', 'ovowj12jozj4ky8svkvt', '', 1),
(20, 'Ronnie', 'ronnie@test.com', '9009290066', '91', '123456', 'supervisor', '2020-05-10 08:50:58', '2020-05-10 08:05:50', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589100656/fgp6mqikhxvezgjzh8pq.jpg', 'fgp6mqikhxvezgjzh8pq', '', 0),
(22, 'Mzee Katu', 'mzeekatu@gmail.com', '702710808', '254', '123456', 'supervisor', '2020-05-10 10:34:06', '2020-05-10 10:05:34', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1589106844/gk4qt3qssrni5zuemamw.gif', 'gk4qt3qssrni5zuemamw', '', 0),
(24, 'Vaibhav', 'Vaibhav@gmail.com', '8937823310', '91', 'vaibhav', 'supervisor', '2020-05-25 14:05:04', '2020-05-25 14:05:05', 'http://res.cloudinary.com/tecorb-technologies/image/upload/v1590415501/a6yihtdosjka6xusb8sy.jpg', 'a6yihtdosjka6xusb8sy', '5937', 1);

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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=232;
--
-- AUTO_INCREMENT for table `business_session_token`
--
ALTER TABLE `business_session_token`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=172;
--
-- AUTO_INCREMENT for table `bussiness_visit`
--
ALTER TABLE `bussiness_visit`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `confirm_payment`
--
ALTER TABLE `confirm_payment`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `credit_sales_purchases`
--
ALTER TABLE `credit_sales_purchases`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;
--
-- AUTO_INCREMENT for table `daily_sales_purchases`
--
ALTER TABLE `daily_sales_purchases`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;
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
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;
--
-- AUTO_INCREMENT for table `superwiser_register`
--
ALTER TABLE `superwiser_register`
  MODIFY `id` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
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
