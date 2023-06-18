-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 07, 2023 at 07:54 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msu_fraud`
--

-- --------------------------------------------------------

--
-- Table structure for table `accounts`
--

CREATE TABLE `accounts` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `bank` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `accountnumber` varchar(50) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `balance` double DEFAULT NULL,
  `branchname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `accounts`
--

INSERT INTO `accounts` (`id`, `customer_id`, `bank`, `accountnumber`, `balance`, `branchname`, `location`, `country`, `status`, `created_at`, `updated_at`) VALUES
(1, 3, 'ECOBANK', '0000736353551', 9841920, 'Bindura', 'Bindura', 'Zimbabwe', 1, '2023-05-30 13:03:08', '2023-05-30 18:56:38'),
(2, 3, 'FIRST CAPITAL BANK', '803635355678678', 66867000, 'Harare', 'Harare', 'Zimbabwe', 1, '2023-05-30 16:30:41', '2023-05-30 19:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int(11) NOT NULL,
  `role_Id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `role_Id`, `name`, `surname`, `username`, `password`, `email`, `phone`, `gender`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 2, 'Anna', 'Tom', 'TRX100', '$2y$12$Vp2a2k9M.in5xSswTijy3OD/UWPIiAWSxHduN7FxDmvTwUD5e8SAO', 'annatom@gmail.com', '0774978909', 'Female', 'Bindura', '23 Msasa Close', '2023-05-13 01:45:48', '2023-05-15 22:22:51'),
(2, 2, 'Nyarai', 'Muswe', 'TRX101', '$2y$12$M/kgUSdzc.eOp2Jf3hCwbunnFKs2QckI8YkX5IFi7iab/H52ZUZxu', 'nmuswe@gmail.com', '0774914150', 'Female', 'Muzarabani', 'Muzarabani Primary P.Bag 120 Rushinga', '2023-05-13 03:55:57', '2023-05-13 05:55:57');

-- --------------------------------------------------------

--
-- Table structure for table `alerts`
--

CREATE TABLE `alerts` (
  `id` int(11) NOT NULL,
  `creditcard_Id` int(11) DEFAULT NULL,
  `customer_Id` int(11) DEFAULT NULL,
  `amount` double DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `audits`
--

CREATE TABLE `audits` (
  `id` int(11) NOT NULL,
  `administrator_id` int(11) NOT NULL,
  `entity` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `oldvalue` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `newvalue` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `action` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `audits`
--

INSERT INTO `audits` (`id`, `administrator_id`, `entity`, `oldvalue`, `newvalue`, `action`, `created_at`, `updated_at`) VALUES
(1, 1, 'Ti\\Cardfraudsm\\App\\Models\\Administrator', '{\"name\":\"Anna\",\"surname\":\"Tom\",\"role_Id\":1,\"username\":\"TRX100\",\"address\":\"23 Msasa Close\",\"gender\":\"Female\",\"email\":\"annatom@GMAIL.COM\",\"phone\":\"0774978909\",\"city\":\"Bindura\"}', '{\"name\":\"Anna\",\"surname\":\"Tom\",\"role_Id\":1,\"role_status\":\"Not changed\",\"username\":\"TRX100\",\"address\":\"23 Msasa Close\",\"gender\":null,\"email\":\"annatom@gmail.com\",\"phone\":\"0774978909\",\"city\":\"Bindura\"}', 'UPDATE_USER', '2023-05-13 03:53:49', '2023-05-13 05:53:49'),
(2, 1, 'Ti\\Cardfraudsm\\App\\Models\\Administrator', 'N/A', '{\"name\":\"Nyarai\",\"surname\":\"Muswe\",\"role_Id\":\"2\",\"username\":\"TRX101\",\"address\":\"Muzarabani Primary P.Bag 120 Rushinga\",\"gender\":\"Female\",\"email\":\"nmuswe@gmail.com\",\"phone\":\"0774914150\",\"city\":\"Muzarabani\"}', 'CREATE_USER', '2023-05-13 03:55:57', '2023-05-13 05:55:57'),
(3, 2, 'Ti\\Cardfraudsm\\App\\Models\\Administrator', '{\"name\":\"Anna\",\"surname\":\"Tom\",\"role_Id\":1,\"username\":\"TRX100\",\"address\":\"23 Msasa Close\",\"gender\":\"Female\",\"email\":\"annatom@gmail.com\",\"phone\":\"0774978909\",\"city\":\"Bindura\"}', '{\"name\":\"Anna\",\"surname\":\"Tom\",\"role_Id\":\"2\",\"role_status\":\"Role Changed  Administrator\",\"username\":\"TRX100\",\"address\":\"23 Msasa Close\",\"gender\":null,\"email\":\"annatom@gmail.com\",\"phone\":\"0774978909\",\"city\":\"Bindura\"}', 'UPDATE_USER', '2023-05-13 03:57:10', '2023-05-13 05:57:10'),
(4, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'New Category', 'Electronics', 'CREATE_CATEGORY', '2023-05-13 12:45:28', '2023-05-13 14:45:28'),
(5, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'New Category', 'Herbs', 'CREATE_CATEGORY', '2023-05-13 12:45:51', '2023-05-13 14:45:51'),
(6, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'New Category', 'Beverages', 'CREATE_CATEGORY', '2023-05-13 12:46:01', '2023-05-13 14:46:01'),
(7, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'Beverages', 'Beverages o', 'UPDATE_CATEGORY', '2023-05-13 12:49:24', '2023-05-13 14:49:24'),
(8, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'Beverages o', 'Beverages', 'UPDATE_CATEGORY', '2023-05-13 12:50:21', '2023-05-13 14:50:21'),
(9, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Laptop Hp 363i', 'Laptop Hp 363i', 'UPDATE_PRODUCT', '2023-05-13 16:02:26', '2023-05-13 18:02:26'),
(10, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Laptop Hp 363i', 'Laptop Hp 363i', 'UPDATE_PRODUCT', '2023-05-13 16:05:56', '2023-05-13 18:05:56'),
(11, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Laptop Hp 363i', 'Laptop Hp 363i', 'UPDATE_PRODUCT', '2023-05-13 16:06:03', '2023-05-13 18:06:03'),
(12, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Laptop Hp 363i', 'Laptop Hp 363i', 'UPDATE_PRODUCT', '2023-05-13 16:08:50', '2023-05-13 18:08:50'),
(13, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Laptop Hp 363i', 'Laptop Hp 363i', 'UPDATE_PRODUCT', '2023-05-13 16:09:18', '2023-05-13 18:09:18'),
(14, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Laptop Hp 363i', 'Laptop Hp 363i', 'UPDATE_PRODUCT', '2023-05-13 16:09:34', '2023-05-13 18:09:34'),
(15, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Telthemweb Online', 'Telthemweb Online', 'UPDATE_PRODUCT', '2023-05-13 16:09:46', '2023-05-13 18:09:46'),
(16, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'Telthemweb Online', 'Telthemweb Online', 'UPDATE_PRODUCT', '2023-05-13 16:10:01', '2023-05-13 18:10:01'),
(17, 1, 'Ti\\Cardfraudsm\\App\\Models\\Product', 'kkkkkkk', 'No new value', 'DELETE_PRODUCT', '2023-05-13 16:11:24', '2023-05-13 18:11:24'),
(18, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'New Category', 'Hardware', 'CREATE_CATEGORY', '2023-05-13 16:12:45', '2023-05-13 18:12:45'),
(19, 1, 'Ti\\Cardfraudsm\\App\\Models\\Category', 'New Category', 'Food Consumption', 'CREATE_CATEGORY', '2023-05-13 16:13:18', '2023-05-13 18:13:18'),
(20, 1, 'Ti\\Cardfraudsm\\App\\Models\\Administrator', '{\"name\":\"Anna\",\"surname\":\"Tom\",\"role_Id\":2,\"username\":\"TRX100\",\"address\":\"23 Msasa Close\",\"gender\":\"Female\",\"email\":\"annatom@gmail.com\",\"phone\":\"0774978909\",\"password\":\"$2y$12$QAtBjDGdOOQwPoeteYMqJuBgPKI.mswjDAStfK8okpti3TXWMPGYe\",\"city\":\"Bindura\"}', '{\"new password\":\"123456\",\"token\":\"JDJ5JDEyJFNrMGZRMGZxY3I0QjROUEVJWElySHVCYmFMLm0vQThaanJ1S3Z0S0JvTTFxWnpzMHZiazVP\"}', 'CHANGE_PASSWORD', '2023-05-15 20:22:51', '2023-05-15 22:22:51');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(11) NOT NULL,
  `product_Id` int(11) DEFAULT NULL,
  `customer_Id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT 0,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Electronics', '2023-05-13 12:45:28', '2023-05-13 14:45:28'),
(2, 'Herbs', '2023-05-13 12:45:51', '2023-05-13 14:45:51'),
(3, 'Beverages', '2023-05-13 12:46:01', '2023-05-13 14:50:22'),
(4, 'Hardware', '2023-05-13 16:12:45', '2023-05-13 18:12:45'),
(5, 'Food Consumption', '2023-05-13 16:13:18', '2023-05-13 18:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `creditcards`
--

CREATE TABLE `creditcards` (
  `id` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `account_Id` int(11) NOT NULL,
  `ac_number` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cvv` int(11) DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `pin` int(11) NOT NULL,
  `status` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `creditcards`
--

INSERT INTO `creditcards` (`id`, `customer_Id`, `name`, `account_Id`, `ac_number`, `cvv`, `expiry_date`, `pin`, `status`, `created_at`, `updated_at`) VALUES
(6, 3, 'VISA', 1, '4543678923458907', 345, '2031-05-30 15:29:26', 1234, 1, '2023-05-30 13:29:07', NULL),
(9, 3, 'MASTERCARD', 2, '5478125679085231', 356, '2026-09-23 00:00:00', 4545, 0, '2023-05-30 16:37:09', '2023-05-30 18:37:09');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `surname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `phone` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `gender` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `province` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `country` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `district` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `surname`, `password`, `email`, `phone`, `gender`, `province`, `country`, `district`, `city`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Taurai', 'Vambe', '$2y$12$juAb/uvCTBvei1eP4PyaOubAv02sWW24q2X60AomTI/tMiS4tkWru', 'tvambe@gmail.com', '0779452123', 'Male', 'Harare', 'Zimbabwe', 'Harare', 'Harare', '12 G Harare', '2023-05-13 12:10:24', NULL),
(2, 'Mariana', 'Avi', '$2y$12$juAb/uvCTBvei1eP4PyaOubAv02sWW24q2X60AomTI/tMiS4tkWru', 'ame@gmail.com', '0779453423', 'Female', 'Harare', 'Zimbabwe', 'Harare', 'Harare', 'Warren pack', '2023-05-13 12:10:24', NULL),
(3, 'Tawana', ' Murauza', '$2y$12$juAb/uvCTBvei1eP4PyaOubAv02sWW24q2X60AomTI/tMiS4tkWru', 'tawana@gmail.com', '857755', 'Male', 'Harare', 'Zimbabwe', 'Mutare', 'Bulawayo', 'TRX100', '2023-05-22 15:44:46', '2023-05-22 17:44:46');

-- --------------------------------------------------------

--
-- Table structure for table `orderitems`
--

CREATE TABLE `orderitems` (
  `id` int(11) NOT NULL,
  `order_Id` int(11) NOT NULL,
  `product_Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` double DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orderitems`
--

INSERT INTO `orderitems` (`id`, `order_Id`, `product_Id`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 4, 3400, '2023-05-30 14:01:23', '2023-05-30 16:01:23'),
(2, 1, 1, 4, 45, '2023-05-30 14:01:24', '2023-05-30 16:01:24'),
(3, 2, 4, 19, 800, '2023-05-30 16:47:51', '2023-05-30 18:47:51'),
(4, 2, 2, 34, 3400, '2023-05-30 16:47:51', '2023-05-30 18:47:51'),
(5, 2, 1, 299, 45, '2023-05-30 16:47:51', '2023-05-30 18:47:51'),
(6, 3, 1, 1, 45, '2023-05-30 16:55:05', '2023-05-30 18:55:05'),
(7, 4, 2, 4, 3400, '2023-05-30 17:04:28', '2023-05-30 19:04:28'),
(8, 4, 4, 18, 800, '2023-05-30 17:04:28', '2023-05-30 19:04:28'),
(9, 4, 1, 89000, 45, '2023-05-30 17:04:28', '2023-05-30 19:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `ordernumber` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `customer_Id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `total_amt` double DEFAULT NULL,
  `ispaid` int(11) DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `ordernumber`, `customer_Id`, `quantity`, `total_amt`, `ispaid`, `created_at`, `updated_at`) VALUES
(1, NULL, 3, 8, 13780, 1, '2023-05-30 14:01:23', '2023-05-30 16:02:43'),
(2, NULL, 3, 352, 144255, 1, '2023-05-30 16:47:51', '2023-05-30 18:48:54'),
(3, NULL, 3, 1, 45, 1, '2023-05-30 16:55:05', '2023-05-30 18:56:38'),
(4, NULL, 3, 89022, 4033000, 1, '2023-05-30 17:04:28', '2023-05-30 19:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(11) NOT NULL,
  `order_Id` int(11) DEFAULT NULL,
  `customer_Id` int(11) DEFAULT NULL,
  `amount_paid` float DEFAULT NULL,
  `paymentmode` varchar(50) DEFAULT NULL,
  `payment_referencecode` varchar(300) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `order_Id`, `customer_Id`, `amount_paid`, `paymentmode`, `payment_referencecode`, `created_at`, `updated_at`) VALUES
(1, 1, 3, 13780, 'Visa', '4543678923458907', '2023-05-30 16:02:43', '2023-05-30 16:02:43'),
(2, 2, 3, 144255, 'Mastercard', '5478125679085231', '2023-05-30 18:48:54', '2023-05-30 18:48:54'),
(3, 3, 3, 45, 'Mastercard', '5478125679085231', '2023-05-30 18:56:38', '2023-05-30 18:56:38'),
(4, 4, 3, 4033000, 'Mastercard', '5478125679085231', '2023-05-30 19:06:18', '2023-05-30 19:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category_Id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `product_img` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` longtext COLLATE utf8_unicode_ci DEFAULT NULL,
  `price` double DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `isOnPromototion` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `isPublished` int(11) DEFAULT NULL,
  `expiry_date` datetime DEFAULT NULL,
  `weight` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `category_Id`, `name`, `product_img`, `description`, `price`, `quantity`, `isOnPromototion`, `isPublished`, `expiry_date`, `weight`, `created_at`, `updated_at`) VALUES
(1, 3, 'Iphone 14', 'uploads/products/MTY4Mzk4NjUyOTI5NTg=.jpg', 'Hi Muswe', 45, -88418, NULL, NULL, NULL, NULL, '2023-05-13 14:02:09', '2023-05-30 19:04:28'),
(2, 1, 'Laptop Hp 363i', 'uploads/products/MTY4Mzk5MzQ1NTI2ODu=.jpg', 'Brand new  Hp 363i,16GB Ram Corei7 and SSD', 3400, 847, NULL, NULL, NULL, NULL, '2023-05-13 15:57:35', '2023-05-30 19:04:28'),
(4, 1, 'Gear liver', 'uploads/products/MTY4Mzk5NDQ5NzUzNjI=.png', 'Gear leaver is a nice way', 800, 762, NULL, NULL, '0000-00-00 00:00:00', NULL, '2023-05-13 16:14:57', '2023-05-30 19:04:28');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `level` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `level`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Administrator', 'ADMIN', 1, '2023-05-13 01:43:46', NULL),
(2, 'Accounts', 'ACCOUNT', 0, '2023-05-13 03:11:05', '2023-05-13 05:11:05');

-- --------------------------------------------------------

--
-- Table structure for table `systemlogs`
--

CREATE TABLE `systemlogs` (
  `id` int(11) NOT NULL,
  `administrator_id` int(11) NOT NULL,
  `timein` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `ipaddress` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `geolocationap` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `useaccountname` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timeout` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8_unicode_ci DEFAULT 'Pending',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `systemlogs`
--

INSERT INTO `systemlogs` (`id`, `administrator_id`, `timein`, `ipaddress`, `geolocationap`, `useaccountname`, `timeout`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, '04:45:55', '::1', '', 'Anna Tom', '05:43:39', 'Logged out', '2023-05-13 02:45:56', '2023-05-13 05:43:39'),
(2, 1, '05:43:44', '::1', '', 'Anna Tom', '05:44:28', 'Logged out', '2023-05-13 03:43:45', '2023-05-13 05:44:28'),
(3, 1, '05:44:30', '::1', '', 'Anna Tom', '05:50:59', 'Logged out', '2023-05-13 03:44:30', '2023-05-13 05:50:59'),
(4, 1, '05:51:03', '::1', '', 'Anna Tom', '05:51:24', 'Logged out', '2023-05-13 03:51:03', '2023-05-13 05:51:24'),
(5, 1, '05:51:40', '::1', '', 'Anna Tom', '05:56:18', 'Logged out', '2023-05-13 03:51:40', '2023-05-13 05:56:18'),
(6, 2, '05:56:24', '::1', '', 'Nyarai Muswe', '06:04:31', 'Logged out', '2023-05-13 03:56:24', '2023-05-13 06:04:31'),
(7, 1, '06:04:49', '::1', '', 'Anna Tom', '06:06:12', 'Logged out', '2023-05-13 04:04:50', '2023-05-13 06:06:12'),
(8, 1, '06:05:49', '::1', '', 'Anna Tom', '06:06:23', 'Logged out', '2023-05-13 04:05:49', '2023-05-13 06:06:23'),
(9, 1, '10:17:00', '::1', '', 'Anna Tom', '11:42:25', 'Logged out', '2023-05-13 08:17:00', '2023-05-13 11:42:25'),
(10, 1, '11:51:51', '::1', '', 'Anna Tom', '22:22:52', 'Logged out', '2023-05-13 09:51:51', '2023-05-15 22:22:52'),
(11, 1, '14:29:40', '::1', '', 'Anna Tom', '22:23:05', 'Logged out', '2023-05-15 12:29:42', '2023-05-15 22:23:05'),
(12, 1, '21:26:50', '::1', '', 'Anna Tom', '23:05:05', 'Logged out', '2023-05-15 19:26:50', '2023-05-15 23:05:05'),
(13, 1, '22:22:57', '::1', '', 'Anna Tom', '18:14:23', 'Logged out', '2023-05-15 20:22:57', '2023-05-22 18:14:23'),
(14, 1, '22:23:09', '::1', '', 'Anna Tom', 'Pending', 'Pending', '2023-05-15 20:23:09', '2023-05-15 22:23:09'),
(15, 1, '23:04:58', '::1', '', 'Anna Tom', 'Pending', 'Pending', '2023-05-15 21:04:58', '2023-05-15 23:04:58'),
(16, 1, '18:05:33', '::1', '', 'Anna Tom', 'Pending', 'Pending', '2023-05-22 16:05:33', '2023-05-22 18:05:33'),
(17, 1, '09:27:08', '::1', '', 'Anna Tom', 'Pending', 'Pending', '2023-05-23 07:27:08', '2023-05-23 09:27:08'),
(18, 1, '19:56:01', '::1', '', 'Anna Tom', 'Pending', 'Pending', '2023-05-30 17:56:01', '2023-05-30 19:56:01');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `customer_Id` int(11) NOT NULL,
  `account_Id` int(11) NOT NULL,
  `creditcard_Id` int(11) NOT NULL,
  `order_Id` int(11) NOT NULL,
  `amount` double DEFAULT NULL,
  `status` int(11) DEFAULT 0,
  `country` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `city` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `ipaddress` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `timetransaction` varchar(120) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`id`, `customer_Id`, `account_Id`, `creditcard_Id`, `order_Id`, `amount`, `status`, `country`, `city`, `ipaddress`, `timetransaction`, `created_at`, `updated_at`) VALUES
(1, 3, 1, 6, 1, 13780, 1, 'Zimbabwe', 'Harare', '41.60.80.209', '16:02:43', '2023-03-30 14:02:43', '2023-05-30 16:02:43'),
(2, 3, 1, 9, 2, 144255, 1, NULL, NULL, NULL, '18:48:54', '2023-03-30 16:48:54', '2023-05-30 18:48:54'),
(3, 3, 1, 9, 3, 45, 1, NULL, NULL, NULL, '18:56:38', '2023-05-30 16:56:38', '2023-05-30 18:56:38'),
(4, 3, 2, 9, 4, 4033000, 1, NULL, NULL, NULL, '19:06:18', '2023-05-30 17:06:18', '2023-05-30 19:06:18');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_CAC89EAC611E751` (`customer_id`);

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_73A716F4387060E` (`role_Id`);

--
-- Indexes for table `alerts`
--
ALTER TABLE `alerts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK__creditcards` (`creditcard_Id`),
  ADD KEY `FK__customers` (`customer_Id`);

--
-- Indexes for table `audits`
--
ALTER TABLE `audits`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_32451E6C4B09E92C` (`administrator_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_carts_products` (`product_Id`),
  ADD KEY `FK_carts_customers` (`customer_Id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_3AF346685E237E06` (`name`);

--
-- Indexes for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_5E2597DBEEF7B18` (`account_Id`),
  ADD UNIQUE KEY `UNIQ_5E2597DB1BA01B8` (`ac_number`),
  ADD KEY `IDX_5E2597DB611E751` (`customer_Id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_62534E215E237E06` (`name`),
  ADD UNIQUE KEY `UNIQ_62534E21E7927C74` (`email`),
  ADD UNIQUE KEY `UNIQ_62534E21444F97DD` (`phone`);

--
-- Indexes for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_F1CAA341D00042F8` (`product_Id`),
  ADD KEY `IDX_F1CAA341181B499A` (`order_Id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_E52FFDEE611E751` (`customer_Id`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_payments_orders` (`order_Id`),
  ADD KEY `FK_payments_customers` (`customer_Id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B3BA5A5A5E237E06` (`name`),
  ADD KEY `IDX_B3BA5A5A87C2B940` (`category_Id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNIQ_B63E2EC75E237E06` (`name`);

--
-- Indexes for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_705C757D4B09E92C` (`administrator_id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `IDX_EAA81A4C611E751` (`customer_Id`),
  ADD KEY `IDX_EAA81A4CEEF7B18` (`account_Id`),
  ADD KEY `IDX_EAA81A4C174DB860` (`creditcard_Id`),
  ADD KEY `FK_transactions_orders` (`order_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accounts`
--
ALTER TABLE `accounts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `alerts`
--
ALTER TABLE `alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `audits`
--
ALTER TABLE `audits`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `creditcards`
--
ALTER TABLE `creditcards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `orderitems`
--
ALTER TABLE `orderitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `systemlogs`
--
ALTER TABLE `systemlogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accounts`
--
ALTER TABLE `accounts`
  ADD CONSTRAINT `FK_CAC89EAC9395C3F3` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `administrators`
--
ALTER TABLE `administrators`
  ADD CONSTRAINT `FK_73A716F4387060E` FOREIGN KEY (`role_Id`) REFERENCES `roles` (`id`);

--
-- Constraints for table `alerts`
--
ALTER TABLE `alerts`
  ADD CONSTRAINT `FK__creditcards` FOREIGN KEY (`creditcard_Id`) REFERENCES `creditcards` (`id`),
  ADD CONSTRAINT `FK__customers` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `audits`
--
ALTER TABLE `audits`
  ADD CONSTRAINT `FK_32451E6C4B09E92C` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`);

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `FK_carts_customers` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `FK_carts_products` FOREIGN KEY (`product_Id`) REFERENCES `products` (`id`);

--
-- Constraints for table `creditcards`
--
ALTER TABLE `creditcards`
  ADD CONSTRAINT `FK_5E2597DB611E751` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `FK_5E2597DBEEF7B18` FOREIGN KEY (`account_Id`) REFERENCES `accounts` (`id`);

--
-- Constraints for table `orderitems`
--
ALTER TABLE `orderitems`
  ADD CONSTRAINT `FK_F1CAA341181B499A` FOREIGN KEY (`order_Id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `FK_F1CAA341D00042F8` FOREIGN KEY (`product_Id`) REFERENCES `products` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK_E52FFDEE611E751` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `FK_payments_customers` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `FK_payments_orders` FOREIGN KEY (`order_Id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_B3BA5A5A87C2B940` FOREIGN KEY (`category_Id`) REFERENCES `categories` (`id`);

--
-- Constraints for table `systemlogs`
--
ALTER TABLE `systemlogs`
  ADD CONSTRAINT `FK_705C757D4B09E92C` FOREIGN KEY (`administrator_id`) REFERENCES `administrators` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `FK_EAA81A4C174DB860` FOREIGN KEY (`creditcard_Id`) REFERENCES `creditcards` (`id`),
  ADD CONSTRAINT `FK_EAA81A4C611E751` FOREIGN KEY (`customer_Id`) REFERENCES `customers` (`id`),
  ADD CONSTRAINT `FK_EAA81A4CEEF7B18` FOREIGN KEY (`account_Id`) REFERENCES `accounts` (`id`),
  ADD CONSTRAINT `FK_transactions_orders` FOREIGN KEY (`order_Id`) REFERENCES `orders` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
