-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 13, 2025 at 10:32 PM
-- Server version: 8.0.30
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u242664788_e_commerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `addresses`
--

CREATE TABLE `addresses` (
  `id` int NOT NULL,
  `address_line1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `address_line2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `city` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `state` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `postal_code` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `country` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `addresses`
--

INSERT INTO `addresses` (`id`, `address_line1`, `user_id`, `address_line2`, `city`, `state`, `postal_code`, `phone_number`, `country`, `created_at`, `updated_at`) VALUES
(1, 'العبور الحي التاسع شارع محمدعبدالمطلب', 1, NULL, '4', 'Armed Forces Europe', '11111', '1118038076', 'Egypt', '2024-10-24 16:26:47', '2025-03-18 23:14:53'),
(2, 'Jsh shsbs shbs', 2, NULL, '3', 'Cai', '1999', '01279271536', 'Eg', '2024-12-03 12:26:25', '2025-03-18 16:05:38'),
(3, 'askdgj', 5, 'ASDASD', '1', 'AS', '3753450', NULL, 'Egypt', '2024-12-09 21:02:41', '2024-12-09 21:02:41'),
(4, 'Nnn', 7, NULL, '3', 'Cairo', '1999', NULL, 'Egypt', '2024-12-23 22:46:38', '2024-12-23 22:46:38'),
(5, '9 abd el hameed el deeb -shoubra', 10, '2', '3', 'C', '11672', NULL, 'EG', '2025-02-15 12:29:23', '2025-02-15 12:29:23'),
(6, '10ش الشيمي الخصوص', 12, 'المطافي', '3', 'الخصوص', '6231113', NULL, 'الخصوص', '2025-02-15 18:42:43', '2025-02-15 18:42:43'),
(7, 'Malawi nearby raluway station', 27, 'Nearby school', '9', 'Malawi', '1285', '1223339525', 'Egypt', '2025-02-19 00:48:58', '2025-02-19 00:53:28'),
(8, 'الشيخ زايد الحي 13 المجاورة الاولى عمارة 3', 38, NULL, '2', 'Sheikh zayed', '3230055', '01000734711', 'Egypt', '2025-02-26 09:41:44', '2025-02-26 09:41:44'),
(9, '٤٠ ش حسن الصبان فيصل محطة مدكور الدور السادس', 42, NULL, '2', 'Giza', '21634', '01142814251', 'Egypt', '2025-02-28 19:03:20', '2025-02-28 19:03:20'),
(10, '١٨ يوسف كرم خلف مستشفى الساحل الدور الثالث شقة ٧ فرق صيدلية ياسر نوار', 49, 'Don’t have', '3', 'Elkhra', '6221101', '01207777593', 'Shoubra', '2025-03-02 19:28:51', '2025-03-02 19:28:51'),
(11, 'المقطم شارع ١٧ قطعة ٥١٦٧ الدور الرابع شقة ٩', 65, NULL, '3', 'Mokattam', '11571', '01117411410', 'Egypt', '2025-03-10 22:59:47', '2025-03-10 22:59:47'),
(12, 'بورسعيد قشلاق السواحل برج عروس البحر الدور الرابع شقه ٥', 13, 'امام فيلا صابر ابو عبده', '6', 'حي المناخ', '8525502', '01024664705', 'Egypt', '2025-03-12 21:09:05', '2025-03-12 21:09:05'),
(13, '43ص المجاوره الاولي مساكن الفسطاط الجديده', 73, 'صيدليه الجمال', '3', 'C', '11511', '01016654980', 'EG', '2025-03-13 23:40:38', '2025-03-13 23:40:38'),
(14, '٦ حسن المأمون', 76, 'بجوار صيدليه النيل', '3', 'Nasr city', '4450113', '01211468506', 'Cairo', '2025-03-15 02:48:17', '2025-03-15 02:48:17'),
(15, 'Izar plaza, palm hills sheikh zayed city', 79, NULL, '2', 'Giza', '0000', '01104414084', 'Egypt', '2025-03-16 10:07:05', '2025-03-16 10:07:05'),
(16, 'السياحية الرابعة عمارة الياسمين 165 الدور الاول شقه 101', 83, '.', '2', 'GZ', '12568', '01032921827', 'EG', '2025-03-16 21:39:41', '2025-03-16 21:39:41'),
(17, 'اسكندريه ميامي العيساوي شارع ٥٦ خلف جزاره الأوائل برج الادهم الدور ال١٢ الشقه شمال الاسانسير', 93, 'برج الادهم الدور ال ١٢ الشقه شمال الاسانسير', '1', 'ALX', '21599', '01557433263', 'EG', '2025-03-18 14:10:16', '2025-03-18 14:10:16'),
(18, 'Izar mall- palm hills - october', 92, '1 st floor', '2', 'Giza', '0000', '01222986869', 'Egypt', '2025-03-18 14:11:00', '2025-03-18 14:11:00');

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `username` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `username`, `password`, `email`, `created_at`, `updated_at`) VALUES
(2, 'abdelrahman', '$2y$12$nCULFMmNlaceG8D3Bu7zXeRR7LmJ03SyZKvQO38eKXRzup49DU6T6', 'test.ok@gmail.com', '2024-10-01 15:05:31', '2024-10-01 15:05:31'),
(4, 'admin', '$2y$12$5TN3zSK7VomXwF2ArNgcyOkwj3kqle1zm1GwQIbMRZAY1UhBp7fDS', 'eyadoar.ok@gmail.com', '2024-11-23 18:51:56', '2024-11-23 18:51:56');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `type_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `type_id`, `name`, `created_at`, `updated_at`, `is_active`) VALUES
(1, 4, 'tops', '2024-10-04 12:30:11', '2024-12-14 09:12:59', 1),
(4, 4, 'pants', '2024-10-21 16:32:10', '2024-12-14 09:13:01', 1),
(5, 2, 'Long Sleeve tops', '2025-01-29 15:15:29', '2025-01-29 15:15:29', 1);

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`id`, `name`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'Alexandria', 85, 1, '2024-11-16 17:46:11', '2025-01-14 00:26:01'),
(2, 'giza', 75, 1, '2024-11-18 19:57:23', '2024-12-13 23:39:04'),
(3, 'cairo', 70, 1, '2024-12-14 09:12:24', '2025-01-14 00:25:22'),
(4, 'Suez', 85, 0, '2025-01-14 00:27:15', '2025-01-14 00:27:15'),
(5, 'Mansoura', 85, 0, '2025-01-14 00:27:49', '2025-01-14 00:27:49'),
(6, 'Portsaid', 85, 0, '2025-01-14 00:28:11', '2025-01-14 00:28:11'),
(7, 'Ismailia', 85, 0, '2025-01-14 00:28:58', '2025-01-14 00:28:58'),
(8, 'Marsa Matruh', 115, 0, '2025-01-14 00:29:55', '2025-01-14 00:29:55'),
(9, 'Minya', 115, 0, '2025-01-14 00:30:16', '2025-01-14 00:30:16'),
(10, 'Assiut', 115, 0, '2025-01-14 00:30:39', '2025-01-14 00:30:39'),
(11, 'Sohag', 115, 0, '2025-01-14 00:31:06', '2025-01-14 00:31:06'),
(12, 'Qena', 115, 0, '2025-01-14 00:31:34', '2025-01-14 00:31:34'),
(13, 'Luxor', 115, 0, '2025-01-14 00:32:08', '2025-01-14 00:32:08'),
(14, 'Aswan', 115, 0, '2025-01-14 00:32:27', '2025-01-14 00:32:27'),
(15, 'Beni suef', 95, 0, '2025-01-14 00:33:11', '2025-01-14 00:33:11');

-- --------------------------------------------------------

--
-- Table structure for table `discount_codes`
--

CREATE TABLE `discount_codes` (
  `id` int NOT NULL,
  `code` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `discount_percentage` int DEFAULT NULL,
  `expiry_date` date DEFAULT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `discount_codes`
--

INSERT INTO `discount_codes` (`id`, `code`, `discount_percentage`, `expiry_date`, `is_active`, `created_at`, `updated_at`) VALUES
(2, 'FADY2024', 28, '2024-10-31', 1, '2024-10-04 18:44:42', '2024-10-14 13:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_200000_add_two_factor_columns_to_users_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_09_27_220136_create_sessions_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `total_amount` decimal(10,2) NOT NULL,
  `discount_code_id` int DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `city_id` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_amount`, `discount_code_id`, `status`, `city_id`, `created_at`, `updated_at`) VALUES
(84, 10, '940.00', NULL, 'pending', 3, '2025-02-15 12:29:23', '2025-02-15 12:29:23'),
(85, 12, '360.00', NULL, 'pending', 3, '2025-02-15 18:42:43', '2025-02-15 18:42:43'),
(87, 27, '335.00', NULL, 'pending', 9, '2025-02-19 00:48:58', '2025-02-19 00:48:58'),
(88, 27, '115.00', NULL, 'pending', 9, '2025-02-19 00:49:00', '2025-02-19 00:49:00'),
(89, 27, '115.00', NULL, 'pending', 9, '2025-02-19 00:49:49', '2025-02-19 00:49:49'),
(90, 27, '335.00', NULL, 'pending', 9, '2025-02-19 00:53:28', '2025-02-19 00:53:28'),
(91, 2, '525.00', NULL, 'pending', 1, '2025-02-19 19:48:24', '2025-02-19 19:48:24'),
(92, 2, '4900.00', NULL, 'pending', 3, '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(93, 2, '2320.00', NULL, 'pending', 3, '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(94, 38, '365.00', NULL, 'Processing', 2, '2025-02-26 09:41:44', '2025-03-02 12:15:08'),
(95, 2, '360.00', NULL, 'pending', 3, '2025-02-26 22:25:55', '2025-02-26 22:25:55'),
(96, 2, '650.00', NULL, 'pending', 3, '2025-02-26 22:26:41', '2025-02-26 22:26:41'),
(97, 2, '650.00', NULL, 'pending', 3, '2025-02-26 22:27:24', '2025-02-26 22:27:24'),
(98, 42, '295.00', NULL, 'pending', 2, '2025-02-28 19:03:20', '2025-02-28 19:03:20'),
(99, 2, '360.00', NULL, 'pending', 3, '2025-03-02 12:09:53', '2025-03-02 12:09:53'),
(100, 49, '650.00', NULL, 'pending', 3, '2025-03-02 19:28:51', '2025-03-02 19:28:51'),
(101, 49, '70.00', NULL, 'pending', 3, '2025-03-02 19:28:56', '2025-03-02 19:28:56'),
(102, 49, '650.00', NULL, 'pending', 3, '2025-03-02 19:30:16', '2025-03-02 19:30:16'),
(103, 49, '70.00', NULL, 'pending', 3, '2025-03-02 19:30:17', '2025-03-02 19:30:17'),
(104, 49, '650.00', NULL, 'pending', 3, '2025-03-02 19:48:10', '2025-03-02 19:48:10'),
(105, 2, '1960.00', NULL, 'pending', 3, '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(106, 2, '650.00', NULL, 'pending', 3, '2025-03-03 15:30:46', '2025-03-03 15:30:46'),
(107, 2, '2100.00', NULL, 'pending', 3, '2025-03-03 15:32:57', '2025-03-03 15:32:57'),
(108, 2, '360.00', NULL, 'pending', 3, '2025-03-03 15:37:38', '2025-03-03 15:37:38'),
(109, 65, '650.00', NULL, 'pending', 3, '2025-03-10 22:59:47', '2025-03-10 22:59:47'),
(110, 13, '525.00', NULL, 'pending', 6, '2025-03-12 21:09:05', '2025-03-12 21:09:05'),
(111, 73, '360.00', NULL, 'pending', 3, '2025-03-13 23:40:38', '2025-03-13 23:40:38'),
(112, 76, '290.00', NULL, 'pending', 3, '2025-03-15 02:48:17', '2025-03-15 02:48:17'),
(113, 2, '955.00', NULL, 'pending', 6, '2025-03-15 14:54:37', '2025-03-15 14:54:37'),
(114, 2, '85.00', NULL, 'pending', 6, '2025-03-15 14:54:54', '2025-03-15 14:54:54'),
(115, 2, '650.00', NULL, 'pending', 3, '2025-03-15 14:56:59', '2025-03-15 14:56:59'),
(116, 2, '375.00', NULL, 'pending', 5, '2025-03-15 14:57:49', '2025-03-15 14:57:49'),
(117, 2, '525.00', NULL, 'pending', 4, '2025-03-15 14:59:09', '2025-03-15 14:59:09'),
(118, 2, '305.00', NULL, 'pending', 5, '2025-03-15 14:59:42', '2025-03-15 14:59:42'),
(119, 2, '290.00', NULL, 'pending', 3, '2025-03-15 15:00:49', '2025-03-15 15:00:49'),
(120, 79, '475.00', NULL, 'pending', 2, '2025-03-16 10:07:05', '2025-03-16 10:07:05'),
(121, 83, '295.00', NULL, 'pending', 2, '2025-03-16 21:39:41', '2025-03-16 21:39:41'),
(122, 93, '305.00', NULL, 'pending', 1, '2025-03-18 14:10:16', '2025-03-18 14:10:16'),
(123, 92, '1017.00', NULL, 'pending', 2, '2025-03-18 14:11:00', '2025-03-18 14:11:00'),
(124, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:02', '2025-03-18 14:11:02'),
(125, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:09', '2025-03-18 14:11:09'),
(126, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:12', '2025-03-18 14:11:12'),
(127, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:18', '2025-03-18 14:11:18'),
(128, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:19', '2025-03-18 14:11:19'),
(129, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:28', '2025-03-18 14:11:28'),
(130, 92, '75.00', NULL, 'pending', 2, '2025-03-18 14:11:40', '2025-03-18 14:11:40'),
(131, 2, '290.00', NULL, 'pending', 3, '2025-03-18 16:05:38', '2025-03-18 16:05:38'),
(132, 1, '3217.00', NULL, 'pending', 4, '2025-03-18 23:14:53', '2025-03-18 23:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `order_discounts`
--

CREATE TABLE `order_discounts` (
  `id` int NOT NULL,
  `order_id` int NOT NULL,
  `discount_code_id` int NOT NULL,
  `discount_amount` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `order_items`
--

CREATE TABLE `order_items` (
  `id` int NOT NULL,
  `orders_id` int NOT NULL,
  `products_id` int NOT NULL,
  `size_id` int DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_items`
--

INSERT INTO `order_items` (`id`, `orders_id`, `products_id`, `size_id`, `size`, `quantity`, `price`, `created_at`, `updated_at`) VALUES
(60, 84, 37, NULL, 'L/XL', 1, '290.00', '2025-02-15 12:29:23', '2025-02-15 12:29:23'),
(61, 84, 38, NULL, 'L/XL', 1, '290.00', '2025-02-15 12:29:23', '2025-02-15 12:29:23'),
(62, 84, 39, NULL, 'L', 1, '290.00', '2025-02-15 12:29:23', '2025-02-15 12:29:23'),
(63, 85, 38, NULL, 'S/M', 1, '290.00', '2025-02-15 18:42:43', '2025-02-15 18:42:43'),
(65, 87, 23, NULL, 'L/XL', 1, '220.00', '2025-02-19 00:48:58', '2025-02-19 00:48:58'),
(66, 90, 23, NULL, 'L/XL', 1, '220.00', '2025-02-19 00:53:28', '2025-02-19 00:53:28'),
(67, 91, 23, NULL, 'S/M', 1, '220.00', '2025-02-19 19:48:24', '2025-02-19 19:48:24'),
(68, 91, 32, NULL, 'S/M', 1, '220.00', '2025-02-19 19:48:24', '2025-02-19 19:48:24'),
(69, 92, 41, NULL, 'M', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(70, 92, 23, NULL, 'L/XL', 1, '220.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(71, 92, 36, NULL, 'L/XL', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(72, 92, 33, NULL, 'L/XL', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(73, 92, 37, NULL, 'L/XL', 2, '580.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(74, 92, 22, NULL, 'L/XL', 2, '400.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(75, 92, 39, NULL, 'M', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(76, 92, 23, NULL, 'S/M', 2, '440.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(77, 92, 33, NULL, 'S/M', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(78, 92, 36, NULL, 'S/M', 2, '580.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(79, 92, 41, NULL, 'S', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(80, 92, 37, NULL, 'S/M', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(81, 92, 38, NULL, 'L/XL', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(82, 92, 34, NULL, 'L/XL', 1, '290.00', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(83, 93, 41, NULL, 'S', 1, '290.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(84, 93, 40, NULL, 'S', 1, '290.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(85, 93, 39, NULL, 'S', 1, '290.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(86, 93, 33, NULL, 'L/XL', 2, '580.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(87, 93, 23, NULL, 'S/M', 1, '220.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(88, 93, 33, NULL, 'S/M', 1, '290.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(89, 93, 38, NULL, 'S/M', 1, '290.00', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(90, 94, 38, NULL, 'L/XL', 1, '290.00', '2025-02-26 09:41:44', '2025-02-26 09:41:44'),
(91, 95, 36, NULL, 'L/XL', 1, '290.00', '2025-02-26 22:25:55', '2025-02-26 22:25:55'),
(92, 96, 36, NULL, 'L/XL', 2, '580.00', '2025-02-26 22:26:41', '2025-02-26 22:26:41'),
(93, 97, 36, NULL, 'L/XL', 2, '580.00', '2025-02-26 22:27:24', '2025-02-26 22:27:24'),
(94, 98, 23, NULL, 'S/M', 1, '220.00', '2025-02-28 19:03:20', '2025-02-28 19:03:20'),
(95, 99, 36, NULL, 'L/XL', 1, '290.00', '2025-03-02 12:09:53', '2025-03-02 12:09:53'),
(96, 100, 33, NULL, 'S/M', 1, '290.00', '2025-03-02 19:28:51', '2025-03-02 19:28:51'),
(97, 100, 38, NULL, 'S/M', 1, '290.00', '2025-03-02 19:28:51', '2025-03-02 19:28:51'),
(98, 102, 33, NULL, 'S/M', 1, '290.00', '2025-03-02 19:30:16', '2025-03-02 19:30:16'),
(99, 102, 38, NULL, 'S/M', 1, '290.00', '2025-03-02 19:30:16', '2025-03-02 19:30:16'),
(100, 104, 33, NULL, 'S/M', 1, '290.00', '2025-03-02 19:48:10', '2025-03-02 19:48:10'),
(101, 104, 38, NULL, 'S/M', 1, '290.00', '2025-03-02 19:48:10', '2025-03-02 19:48:10'),
(102, 105, 37, NULL, 'S/M', 1, '290.00', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(103, 105, 37, NULL, 'L/XL', 2, '580.00', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(104, 105, 23, NULL, 'L/XL', 1, '220.00', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(105, 105, 23, NULL, 'S/M', 1, '220.00', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(106, 105, 33, NULL, 'S/M', 1, '290.00', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(107, 105, 38, NULL, 'S/M', 1, '290.00', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(108, 106, 37, NULL, 'L/XL', 2, '580.00', '2025-03-03 15:30:46', '2025-03-03 15:30:46'),
(109, 107, 37, NULL, 'L/XL', 7, '2030.00', '2025-03-03 15:32:57', '2025-03-03 15:32:57'),
(110, 108, 37, NULL, 'L/XL', 1, '290.00', '2025-03-03 15:37:38', '2025-03-03 15:37:38'),
(111, 109, 37, NULL, 'S/M', 2, '580.00', '2025-03-10 22:59:47', '2025-03-10 22:59:47'),
(112, 110, 23, NULL, 'S/M', 1, '220.00', '2025-03-12 21:09:05', '2025-03-12 21:09:05'),
(113, 110, 32, NULL, 'S/M', 1, '220.00', '2025-03-12 21:09:05', '2025-03-12 21:09:05'),
(114, 111, 37, NULL, 'S/M', 1, '290.00', '2025-03-13 23:40:38', '2025-03-13 23:40:38'),
(115, 112, 23, NULL, 'S/M', 1, '220.00', '2025-03-15 02:48:17', '2025-03-15 02:48:17'),
(116, 113, 37, NULL, 'S/M', 3, '870.00', '2025-03-15 14:54:37', '2025-03-15 14:54:37'),
(117, 115, 37, NULL, 'S/M', 2, '580.00', '2025-03-15 14:56:59', '2025-03-15 14:56:59'),
(118, 116, 37, NULL, 'S/M', 1, '290.00', '2025-03-15 14:57:49', '2025-03-15 14:57:49'),
(119, 117, 32, NULL, 'S/M', 1, '220.00', '2025-03-15 14:59:09', '2025-03-15 14:59:09'),
(120, 117, 32, NULL, 'L/XL', 1, '220.00', '2025-03-15 14:59:09', '2025-03-15 14:59:09'),
(121, 118, 32, NULL, 'L/XL', 1, '220.00', '2025-03-15 14:59:42', '2025-03-15 14:59:42'),
(122, 119, 32, NULL, 'L/XL', 1, '220.00', '2025-03-15 15:00:49', '2025-03-15 15:00:49'),
(123, 120, 22, NULL, 'L/XL', 2, '400.00', '2025-03-16 10:07:05', '2025-03-16 10:07:05'),
(124, 121, 23, NULL, 'S/M', 1, '220.00', '2025-03-16 21:39:41', '2025-03-16 21:39:41'),
(125, 122, 23, NULL, 'S/M', 1, '220.00', '2025-03-18 14:10:16', '2025-03-18 14:10:16'),
(126, 123, 22, NULL, 'L/XL', 1, '200.00', '2025-03-18 14:11:00', '2025-03-18 14:11:00'),
(127, 123, 28, NULL, 'L/XL', 1, '220.00', '2025-03-18 14:11:00', '2025-03-18 14:11:00'),
(128, 123, 39, NULL, 'M', 1, '261.00', '2025-03-18 14:11:00', '2025-03-18 14:11:00'),
(129, 123, 40, NULL, 'M', 1, '261.00', '2025-03-18 14:11:00', '2025-03-18 14:11:00'),
(130, 131, 28, NULL, 'L/XL', 1, '220.00', '2025-03-18 16:05:38', '2025-03-18 16:05:38'),
(131, 132, 40, NULL, 'L', 12, '3132.00', '2025-03-18 23:14:53', '2025-03-18 23:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_reset_tokens`
--

INSERT INTO `password_reset_tokens` (`email`, `token`, `created_at`) VALUES
('eyadomar.ok@gmail.com', '$2y$12$hY8XbaiI6PnTmgxKFrAwYesSILC220kMyUmtXu917D1mlrV5v2QQC', '2024-12-03 11:45:44');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int NOT NULL,
  `orders_id` int NOT NULL,
  `payment_method` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(10,2) NOT NULL,
  `status` enum('pending','completed','failed') COLLATE utf8mb4_unicode_ci DEFAULT 'pending',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `orders_id`, `payment_method`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(41, 84, 'cash', '940.00', 'pending', '2025-02-15 12:29:23', '2025-02-15 12:29:23'),
(42, 85, 'cash', '360.00', 'pending', '2025-02-15 18:42:43', '2025-02-15 18:42:43'),
(44, 87, 'cash', '335.00', 'pending', '2025-02-19 00:48:58', '2025-02-19 00:48:58'),
(45, 90, 'cash', '335.00', 'pending', '2025-02-19 00:53:28', '2025-02-19 00:53:28'),
(46, 91, 'cash', '525.00', 'pending', '2025-02-19 19:48:24', '2025-02-19 19:48:24'),
(47, 92, 'cash', '4900.00', 'pending', '2025-02-19 20:06:06', '2025-02-19 20:06:06'),
(48, 93, 'cash', '2320.00', 'pending', '2025-02-25 08:33:34', '2025-02-25 08:33:34'),
(49, 94, 'cash', '365.00', 'pending', '2025-02-26 09:41:44', '2025-02-26 09:41:44'),
(50, 95, 'cash', '360.00', 'pending', '2025-02-26 22:25:55', '2025-02-26 22:25:55'),
(51, 96, 'cash', '650.00', 'pending', '2025-02-26 22:26:41', '2025-02-26 22:26:41'),
(52, 97, 'cash', '650.00', 'pending', '2025-02-26 22:27:24', '2025-02-26 22:27:24'),
(53, 98, 'cash', '295.00', 'pending', '2025-02-28 19:03:20', '2025-02-28 19:03:20'),
(54, 99, 'cash', '360.00', 'pending', '2025-03-02 12:09:53', '2025-03-02 12:09:53'),
(55, 100, 'cash', '650.00', 'pending', '2025-03-02 19:28:51', '2025-03-02 19:28:51'),
(56, 102, 'cash', '650.00', 'pending', '2025-03-02 19:30:16', '2025-03-02 19:30:16'),
(57, 104, 'cash', '650.00', 'pending', '2025-03-02 19:48:10', '2025-03-02 19:48:10'),
(58, 105, 'cash', '1960.00', 'pending', '2025-03-03 15:29:46', '2025-03-03 15:29:46'),
(59, 106, 'cash', '650.00', 'pending', '2025-03-03 15:30:46', '2025-03-03 15:30:46'),
(60, 107, 'cash', '2100.00', 'pending', '2025-03-03 15:32:57', '2025-03-03 15:32:57'),
(61, 108, 'cash', '360.00', 'pending', '2025-03-03 15:37:38', '2025-03-03 15:37:38'),
(62, 109, 'cash', '650.00', 'pending', '2025-03-10 22:59:47', '2025-03-10 22:59:47'),
(63, 110, 'cash', '525.00', 'pending', '2025-03-12 21:09:05', '2025-03-12 21:09:05'),
(64, 111, 'cash', '360.00', 'pending', '2025-03-13 23:40:38', '2025-03-13 23:40:38'),
(65, 112, 'cash', '290.00', 'pending', '2025-03-15 02:48:17', '2025-03-15 02:48:17'),
(66, 113, 'cash', '955.00', 'pending', '2025-03-15 14:54:37', '2025-03-15 14:54:37'),
(67, 115, 'cash', '650.00', 'pending', '2025-03-15 14:56:59', '2025-03-15 14:56:59'),
(68, 116, 'cash', '375.00', 'pending', '2025-03-15 14:57:49', '2025-03-15 14:57:49'),
(69, 117, 'cash', '525.00', 'pending', '2025-03-15 14:59:09', '2025-03-15 14:59:09'),
(70, 118, 'cash', '305.00', 'pending', '2025-03-15 14:59:42', '2025-03-15 14:59:42'),
(71, 119, 'cash', '290.00', 'pending', '2025-03-15 15:00:49', '2025-03-15 15:00:49'),
(72, 120, 'cash', '475.00', 'pending', '2025-03-16 10:07:05', '2025-03-16 10:07:05'),
(73, 121, 'cash', '295.00', 'pending', '2025-03-16 21:39:41', '2025-03-16 21:39:41'),
(74, 122, 'cash', '305.00', 'pending', '2025-03-18 14:10:16', '2025-03-18 14:10:16'),
(75, 123, 'cash', '1017.00', 'pending', '2025-03-18 14:11:00', '2025-03-18 14:11:00'),
(76, 131, 'cash', '290.00', 'pending', '2025-03-18 16:05:38', '2025-03-18 16:05:38'),
(77, 132, 'cash', '3217.00', 'pending', '2025-03-18 23:14:53', '2025-03-18 23:14:53');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `price` decimal(10,2) NOT NULL,
  `sale` int DEFAULT '0',
  `type_id` int DEFAULT NULL,
  `category_id` int DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `description`, `price`, `sale`, `type_id`, `category_id`, `color`, `is_active`, `created_at`, `updated_at`) VALUES
(17, 'Tank top-Blue', 'DOUBLE LAYERED \r\nLycra', '200.00', 0, 2, 1, 'Blue', 1, '2024-10-16 16:51:38', '2025-02-04 14:57:12'),
(20, 'Tank top-BABY PINK', 'DOUBLE LAYERED \r\nLycra', '200.00', 0, 2, 1, 'baby pink', 1, '2024-10-19 13:58:57', '2025-01-29 14:48:47'),
(22, 'Tank top-WHITE', 'DOUBLE LAYERED \r\nLycra', '200.00', 0, 2, 1, 'white', 1, '2024-10-26 12:56:59', '2025-02-04 15:16:24'),
(23, 'Half Sleeve top-WHITE', 'DOUBLE LAYERED \r\nLycra', '220.00', 0, 2, 1, 'white', 1, '2024-10-26 13:07:51', '2025-01-25 14:07:48'),
(28, 'Half Sleeve top-BLUE', 'DOUBLE LAYERED \r\nLycra', '220.00', 0, 2, 1, 'Blue', 1, '2024-12-06 10:48:23', '2025-02-12 22:26:07'),
(32, 'Half Sleeve top-BABY PINK', 'DOUBLE LAYERED \r\nLycra', '220.00', 0, 2, 1, 'baby pink', 1, '2025-01-29 14:53:29', '2025-02-04 15:23:39'),
(33, 'Square Long Sleeve top-BROWN', 'DOUBLE LAYERED \r\nLycra', '290.00', 0, 2, 5, 'brown', 1, '2025-01-29 14:56:02', '2025-02-15 18:46:02'),
(34, 'Sqaure Long Sleeve top-OLIVE GREEN', 'DOUBLE LAYERED \r\nLycra', '290.00', 0, 2, 5, 'Olive green', 1, '2025-01-29 14:57:25', '2025-02-15 18:46:17'),
(35, 'Sqaure Long Sleeve top-BURGUNDY', 'DOUBLE LAYERED\r\nLycra', '290.00', 0, 2, 5, 'burgundy', 1, '2025-01-29 15:11:59', '2025-02-15 18:46:44'),
(36, 'Sqaure long sleeve top-WHITE', 'DOUBLE LAYERED \r\nLycra', '290.00', 0, 2, 5, 'white', 1, '2025-02-09 11:44:07', '2025-02-15 19:12:24'),
(37, 'Sqaure long sleeve top-BLACK', 'DOUBLE LAYERED \r\nLycra', '290.00', 0, 2, 5, 'black', 1, '2025-02-12 23:32:01', '2025-02-15 19:12:35'),
(38, 'Sqaure long sleeve top-NAVY BLUE', 'DOUBLE LAYERED \r\nLycra', '290.00', 0, 2, 5, 'Navy blue', 1, '2025-02-12 23:33:34', '2025-02-15 19:13:38'),
(39, 'Round Long Sleeve top-BLUE', 'ONE LAYER\r\nLycra', '290.00', 10, 2, 5, 'Blue', 1, '2025-02-12 23:36:16', '2025-03-02 12:12:26'),
(40, 'Round Long Sleeve top-LIGHT GREY', 'ONE LAYER\r\nLycra', '290.00', 10, 2, 5, 'Light Grey', 1, '2025-02-12 23:38:49', '2025-03-02 12:12:49'),
(41, 'Round Long Sleeve top-BLACK', 'ONE LAYER\r\nLycra', '290.00', 10, 2, 5, 'black', 1, '2025-02-12 23:39:44', '2025-03-02 12:13:13'),
(42, 'Half Sleeve top-NAVY BLUE', 'DOUBLE LAYERED', '220.00', 0, 2, 1, 'Navy blue', 1, '2025-03-17 14:03:48', '2025-03-17 14:03:48'),
(43, 'Half Sleeve top-BLACK', 'DOUBLE LAYERED', '220.00', 0, 2, 1, 'black', 1, '2025-03-17 14:04:58', '2025-03-17 14:04:58');

-- --------------------------------------------------------

--
-- Table structure for table `product_images`
--

CREATE TABLE `product_images` (
  `id` int NOT NULL,
  `images` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `products_id` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_images`
--

INSERT INTO `product_images` (`id`, `images`, `products_id`, `created_at`, `updated_at`) VALUES
(17, 'uploads/1729108298-6710194a53966.jpg', 17, '2024-10-16 16:51:38', '2024-10-16 16:51:38'),
(18, 'uploads/1729108298-6710194a58a17.jpg', 17, '2024-10-16 16:51:38', '2024-10-16 16:51:38'),
(24, 'uploads/1729357137-6713e5511de3f.jpeg', 20, '2024-10-19 13:58:57', '2024-10-19 13:58:57'),
(48, 'uploads/1734050081-675b8121e0886.jpeg', 23, '2024-12-13 00:34:41', '2024-12-13 00:34:41'),
(50, 'uploads/1734050081-675b8121e12c6.jpeg', 23, '2024-12-13 00:34:41', '2024-12-13 00:34:41'),
(55, 'uploads/1738164179-679a47d35052f.jpeg', 33, '2025-01-29 15:22:59', '2025-01-29 15:22:59'),
(56, 'uploads/1738164244-679a481426166.jpeg', 34, '2025-01-29 15:24:04', '2025-01-29 15:24:04'),
(61, 'uploads/1738682253-67a22f8d19487.jpeg', 22, '2025-02-04 15:17:33', '2025-02-04 15:17:33'),
(62, 'uploads/1738682497-67a230813150b.jpeg', 28, '2025-02-04 15:21:37', '2025-02-04 15:21:37'),
(63, 'uploads/1738682619-67a230fb15382.jpeg', 32, '2025-02-04 15:23:39', '2025-02-04 15:23:39'),
(64, 'uploads/1738682835-67a231d3cb559.jpeg', 35, '2025-02-04 15:27:15', '2025-02-04 15:27:15'),
(65, 'uploads/1739101447-67a895071dd29.jpeg', 36, '2025-02-09 11:44:07', '2025-02-09 11:44:07'),
(66, 'uploads/1739403121-67ad2f7158ad9.jpeg', 37, '2025-02-12 23:32:01', '2025-02-12 23:32:01'),
(67, 'uploads/1739403214-67ad2fceee603.jpeg', 38, '2025-02-12 23:33:34', '2025-02-12 23:33:34'),
(68, 'uploads/1739403376-67ad307035466.jpeg', 39, '2025-02-12 23:36:16', '2025-02-12 23:36:16'),
(69, 'uploads/1739403529-67ad310906e2f.jpeg', 40, '2025-02-12 23:38:49', '2025-02-12 23:38:49'),
(70, 'uploads/1739403601-67ad31515dbfb.jpeg', 41, '2025-02-12 23:40:01', '2025-02-12 23:40:01'),
(71, 'uploads/1742220298-67d82c0a64e0d.jpeg', 43, '2025-03-17 14:04:58', '2025-03-17 14:04:58'),
(72, 'uploads/1742220323-67d82c2335379.jpeg', 42, '2025-03-17 14:05:23', '2025-03-17 14:05:23');

-- --------------------------------------------------------

--
-- Table structure for table `product_items`
--

CREATE TABLE `product_items` (
  `id` int NOT NULL,
  `products_id` int NOT NULL,
  `quantity` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `size` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_items`
--

INSERT INTO `product_items` (`id`, `products_id`, `quantity`, `size`, `created_at`, `updated_at`) VALUES
(156, 20, '5', 'S/M', '2025-01-29 14:34:45', '2025-03-18 22:47:32'),
(157, 20, '0', 'L/XL', '2025-01-29 14:34:45', '2025-01-29 14:34:45'),
(204, 22, '0', 'S/M', '2025-02-04 15:17:33', '2025-02-16 21:35:33'),
(205, 22, '0', 'L/XL', '2025-02-04 15:17:33', '2025-03-18 14:11:00'),
(220, 23, '1', 'S/M', '2025-02-12 22:25:37', '2025-03-18 14:10:16'),
(221, 23, '6', 'L/XL', '2025-02-12 22:25:37', '2025-03-03 15:29:46'),
(222, 28, '0', 'S/M', '2025-02-12 22:26:07', '2025-02-12 22:26:07'),
(223, 28, '0', 'L/XL', '2025-02-12 22:26:07', '2025-03-18 16:05:38'),
(224, 32, '0', 'S/M', '2025-02-12 22:26:23', '2025-03-15 14:59:09'),
(225, 32, '0', 'L/XL', '2025-02-12 22:26:23', '2025-03-15 15:00:49'),
(252, 33, '0', 'S/M', '2025-02-15 18:46:02', '2025-03-03 15:29:46'),
(253, 33, '7', 'L/XL', '2025-02-15 18:46:02', '2025-02-25 08:33:34'),
(254, 34, '0', 'S/M', '2025-02-15 18:46:17', '2025-02-15 18:46:17'),
(255, 34, '7', 'L/XL', '2025-02-15 18:46:17', '2025-02-19 20:06:06'),
(256, 35, '0', 'S/M', '2025-02-15 18:46:44', '2025-02-15 18:46:44'),
(257, 35, '0', 'L/XL', '2025-02-15 18:46:44', '2025-02-15 18:46:44'),
(258, 36, '5', 'S/M', '2025-02-15 19:12:24', '2025-03-18 22:47:19'),
(259, 36, '0', 'L/XL', '2025-02-15 19:12:24', '2025-03-02 12:09:53'),
(262, 38, '0', 'S/M', '2025-02-15 19:13:38', '2025-03-03 15:29:46'),
(263, 38, '4', 'L/XL', '2025-02-15 19:13:38', '2025-02-26 09:41:44'),
(270, 41, '0', 'S', '2025-02-15 19:14:43', '2025-02-25 08:33:34'),
(271, 41, '0', 'M', '2025-02-15 19:14:43', '2025-02-19 20:06:06'),
(272, 41, '0', 'L', '2025-02-15 19:14:43', '2025-02-15 19:14:43'),
(279, 40, '5', 'S', '2025-03-02 12:12:49', '2025-03-02 12:12:49'),
(280, 40, '8', 'M', '2025-03-02 12:12:49', '2025-03-18 14:11:00'),
(281, 40, '-7', 'L', '2025-03-02 12:12:49', '2025-03-18 23:14:53'),
(284, 43, '15', 'S/M', '2025-03-17 14:04:58', '2025-03-17 14:04:58'),
(285, 43, '15', 'L/XL', '2025-03-17 14:04:58', '2025-03-17 14:04:58'),
(290, 17, '0', 'S/M', '2025-03-19 00:08:37', '2025-03-19 00:08:37'),
(291, 17, '4', 'L/XL', '2025-03-19 00:08:37', '2025-03-19 00:08:37'),
(292, 42, '15', 'S/M', '2025-03-18 22:40:51', '2025-03-18 22:40:51'),
(293, 42, '16', 'L/XL', '2025-03-18 22:40:51', '2025-03-18 22:40:51'),
(294, 37, '0', 'S/M', '2025-03-18 22:41:06', '2025-03-18 22:41:06'),
(295, 37, '5', 'L/XL', '2025-03-18 22:41:06', '2025-03-18 22:41:06'),
(296, 39, '5', 'S', '2025-03-18 22:41:44', '2025-03-18 22:41:44'),
(297, 39, '10', 'M', '2025-03-18 22:41:44', '2025-03-18 22:41:44'),
(298, 39, '2', 'L', '2025-03-18 22:41:44', '2025-03-18 22:41:44');

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('P2BwJkeh0uUAqYlN7CT8HlDcvLbxfNKmefKJWLSp', NULL, '156.213.54.56', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21F90 Instagram 371.0.0.25.85 (iPhone16,2; iOS 17_5_1; en_US; en; scale=3.00; 1290x2796; 706005491; IABMV/1)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiaFNCdWc3dXFVanNvSGxjVUVOTHVMR21LZEFrWGR2RzhwMzdqUWF4cCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwczovL2pheXNiYXNpYy5zaXRlLz9mYmNsaWQ9UEFaWGgwYmdOaFpXMENNVEVBQWFaeXQwMnhqUFFCeDhTSDhOa2NIc2xSaDBTS0U3My1EeHFaX3pjOC1HVHRlNWg5Mk53a1dhbWoxTnNfYWVtX1V1cHVaYk53TUFOSy1UeE1RdnlQbnciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742341273),
('6fIznc1nSyA74KhvX4FY0cw0rp7fFbItHm0xM57o', NULL, '102.41.160.216', 'Mozilla/5.0 (iPhone; CPU iPhone OS 17_5_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/21F90 Instagram 371.0.0.25.85 (iPhone12,1; iOS 17_5_1; en_US; en; scale=2.00; 828x1792; 706005491; IABMV/1)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidEgzaUczdGdBaW42Y3hVa21YZnExQXd2bGNzUEVQM2ZpWmkwR2NaUiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vamF5c2Jhc2ljLnNpdGUvcHJvZHVjdC9zaG93LzQzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742340665),
('Uiy3YVHgpdjvGoDI7U1T44HOgHx3O1u99G7iuiQz', NULL, '54.36.148.192', 'Mozilla/5.0 (compatible; AhrefsBot/7.0; +http://ahrefs.com/robot/)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR01WN1llNTN0dktOU1M5NWpZTFJKeXRiOGZtaUIwWGxpQkZiSU1MRiI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHBzOi8vamF5c2Jhc2ljLnNpdGUvcHJvZHVjdC9zaG93LzQzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1742340739),
('h2RCnD4Fb3U42wV8nZo65zIAFwNjbTa7PUseKIbT', NULL, '102.41.97.36', 'Mozilla/5.0 (iPhone; CPU iPhone OS 18_1_1 like Mac OS X) AppleWebKit/605.1.15 (KHTML, like Gecko) Mobile/22B91 Instagram 371.0.0.25.85 (iPhone16,2; iOS 18_1_1; en_US; en; scale=3.00; 1290x2796; 706005491; IABMV/1)', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoidG5XeHNIQ3BGOTNJTTdYMkdKMjFEbUlpZHpFSEdwOUp5Y2lPcmw4YSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MTM1OiJodHRwczovL2pheXNiYXNpYy5zaXRlLz9mYmNsaWQ9UEFaWGgwYmdOaFpXMENNVEVBQWFhWkttdzhqMjFiWWpGVWNBeFlkT0V3Nm5qOUlCWUpDUi1pSlJuU0tqdWdkX0JiMXNFODZRNVRwRG9fYWVtXzZGSXVOOFk3TTJ2SnlMMkpTWTlUUGciO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX19', 1742340900),
('rL2aND8HtZiPzoMwQDN26DztKSvcE5yHPLss9GUX', NULL, '156.205.55.233', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoiRlRTMGdlekMyN2lyM250ekQwRVhuSVBKaE1vcEkwZlBLU3dBbjhwOSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6NDU6Imh0dHBzOi8vamF5c2Jhc2ljLnNpdGUvYWRtaW4vcHJvZHVjdHMvZWRpdC80MyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTI6ImxvZ2luX2FkbWluXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6Mjt9', 1742343005),
('3a4q5BYddp5cSYvxJzRXXg52Jn3Un8bWvffyzBz4', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/134.0.0.0 Safari/537.36 Edg/134.0.0.0', 'YTo3OntzOjY6Il90b2tlbiI7czo0MDoia1J6NVROazNUc05COXk5RDA4ZkRFbjdtZVU1bHZnZE5HMnBMdTA4TSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzc6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9kYXNoYm9hcmQiO31zOjY6Il9mbGFzaCI7YToyOntzOjM6Im9sZCI7YTowOnt9czozOiJuZXciO2E6MDp7fX1zOjUyOiJsb2dpbl9hZG1pbl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjI7czozOiJ1cmwiO2E6MDp7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkNUpxL1lsRlVnS1ZHc0VCQTcxMFJsLkpqbFh1Z0lQZmVrd1BFRnFUcUJWc1J0R0V6V3ZGQ3UiO30=', 1742347527);

-- --------------------------------------------------------

--
-- Table structure for table `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `id` int NOT NULL,
  `user_id` bigint UNSIGNED NOT NULL,
  `products_id` int NOT NULL,
  `size_id` int NOT NULL,
  `quantity` int NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shopping_cart`
--

INSERT INTO `shopping_cart` (`id`, `user_id`, `products_id`, `size_id`, `quantity`, `created_at`, `updated_at`) VALUES
(29, 7, 28, 124, 1, '2024-12-23 22:47:27', '2024-12-23 22:47:27'),
(30, 7, 28, 123, 1, '2024-12-23 22:47:30', '2024-12-23 22:47:30'),
(31, 6, 28, 122, 1, '2024-12-23 22:57:21', '2024-12-23 22:57:21'),
(37, 8, 23, 108, 1, '2025-01-23 13:09:39', '2025-01-23 13:09:39'),
(39, 9, 22, 135, 1, '2025-01-25 16:47:49', '2025-01-25 16:47:49'),
(45, 11, 22, 205, 1, '2025-02-15 12:43:37', '2025-02-15 12:43:37'),
(52, 14, 41, 270, 1, '2025-02-16 07:29:54', '2025-02-16 07:29:54'),
(55, 15, 22, 205, 1, '2025-02-16 11:45:23', '2025-02-16 11:45:23'),
(57, 17, 37, 261, 1, '2025-02-16 19:20:21', '2025-02-16 19:20:21'),
(59, 18, 38, 263, 1, '2025-02-16 20:09:12', '2025-02-16 20:09:12'),
(60, 19, 34, 255, 2, '2025-02-16 21:57:44', '2025-02-16 22:42:16'),
(62, 20, 36, 258, 1, '2025-02-17 18:19:44', '2025-02-17 18:19:44'),
(64, 23, 37, 260, 1, '2025-02-18 05:42:16', '2025-02-18 05:42:16'),
(65, 24, 23, 220, 1, '2025-02-18 17:56:18', '2025-02-18 17:56:18'),
(67, 25, 33, 252, 1, '2025-02-18 18:51:38', '2025-02-18 18:51:38'),
(68, 25, 38, 262, 1, '2025-02-18 18:52:26', '2025-02-18 18:52:26'),
(71, 18, 34, 255, 1, '2025-02-19 11:28:09', '2025-02-19 11:28:09'),
(73, 29, 38, 262, 1, '2025-02-19 16:47:51', '2025-02-19 16:47:51'),
(77, 28, 33, 253, 1, '2025-02-19 17:25:50', '2025-02-19 17:25:50'),
(95, 30, 37, 261, 1, '2025-02-20 00:12:17', '2025-02-20 00:12:17'),
(96, 32, 23, 220, 1, '2025-02-22 16:20:38', '2025-02-22 16:20:38'),
(98, 35, 36, 259, 1, '2025-02-24 15:04:36', '2025-02-24 15:04:36'),
(99, 36, 37, 260, 2, '2025-02-24 23:18:36', '2025-02-27 13:55:27'),
(107, 24, 37, 260, 1, '2025-02-25 19:20:34', '2025-02-25 19:20:34'),
(111, 39, 23, 221, 1, '2025-02-26 14:11:17', '2025-02-26 14:11:17'),
(112, 40, 32, 224, 1, '2025-02-26 18:22:54', '2025-02-26 18:22:54'),
(121, 43, 22, 205, 1, '2025-03-01 00:35:10', '2025-03-01 00:35:10'),
(122, 43, 28, 223, 1, '2025-03-01 00:37:59', '2025-03-01 00:37:59'),
(125, 45, 37, 260, 1, '2025-03-01 11:52:36', '2025-03-01 11:52:36'),
(126, 46, 38, 262, 1, '2025-03-01 21:47:18', '2025-03-01 21:47:18'),
(127, 46, 36, 259, 1, '2025-03-01 21:47:40', '2025-03-01 21:47:40'),
(128, 47, 37, 260, 1, '2025-03-02 10:52:28', '2025-03-02 10:52:28'),
(140, 51, 33, 252, 1, '2025-03-03 08:33:17', '2025-03-03 08:33:17'),
(151, 52, 38, 263, 1, '2025-03-03 17:30:24', '2025-03-03 17:30:24'),
(152, 53, 23, 221, 1, '2025-03-04 23:24:46', '2025-03-04 23:24:46'),
(153, 55, 23, 221, 1, '2025-03-06 21:12:36', '2025-03-06 21:12:36'),
(154, 55, 28, 223, 1, '2025-03-06 21:12:45', '2025-03-06 21:12:45'),
(155, 55, 32, 225, 1, '2025-03-06 21:12:54', '2025-03-06 21:12:54'),
(156, 48, 32, 224, 1, '2025-03-07 06:10:43', '2025-03-07 06:10:43'),
(157, 48, 39, 277, 1, '2025-03-07 06:10:52', '2025-03-07 06:10:52'),
(159, 56, 34, 255, 1, '2025-03-07 12:32:39', '2025-03-07 12:32:39'),
(160, 57, 32, 224, 1, '2025-03-08 01:26:30', '2025-03-08 01:26:30'),
(162, 58, 23, 220, 1, '2025-03-09 15:43:48', '2025-03-09 15:43:48'),
(163, 59, 23, 221, 1, '2025-03-09 20:05:32', '2025-03-09 20:05:32'),
(165, 60, 28, 223, 1, '2025-03-09 21:19:04', '2025-03-09 21:19:04'),
(167, 60, 32, 224, 1, '2025-03-09 21:19:43', '2025-03-09 21:19:43'),
(168, 60, 33, 253, 1, '2025-03-09 21:20:17', '2025-03-09 21:20:17'),
(169, 61, 37, 260, 1, '2025-03-09 23:59:51', '2025-03-09 23:59:51'),
(170, 61, 23, 220, 1, '2025-03-10 00:01:24', '2025-03-10 00:01:24'),
(171, 61, 38, 263, 1, '2025-03-10 00:02:08', '2025-03-10 00:02:08'),
(172, 62, 32, 224, 1, '2025-03-10 15:36:52', '2025-03-10 15:36:52'),
(173, 62, 23, 220, 1, '2025-03-10 16:46:53', '2025-03-10 16:46:53'),
(174, 63, 32, 224, 1, '2025-03-10 16:50:18', '2025-03-10 16:50:18'),
(175, 64, 32, 225, 1, '2025-03-10 19:26:09', '2025-03-10 19:26:09'),
(178, 66, 23, 221, 1, '2025-03-11 06:36:07', '2025-03-11 06:36:07'),
(179, 66, 32, 225, 1, '2025-03-11 06:36:38', '2025-03-11 06:36:38'),
(183, 69, 23, 220, 1, '2025-03-12 16:24:50', '2025-03-12 16:24:50'),
(184, 69, 32, 224, 1, '2025-03-12 16:25:01', '2025-03-12 16:25:01'),
(185, 70, 32, 224, 1, '2025-03-12 23:11:11', '2025-03-12 23:11:11'),
(186, 70, 23, 220, 1, '2025-03-12 23:11:51', '2025-03-12 23:11:51'),
(187, 71, 28, 223, 1, '2025-03-13 04:36:29', '2025-03-13 04:36:29'),
(188, 71, 32, 225, 1, '2025-03-13 04:36:38', '2025-03-13 04:36:38'),
(189, 72, 32, 225, 1, '2025-03-13 07:03:09', '2025-03-13 07:03:09'),
(191, 72, 23, 220, 1, '2025-03-13 07:37:50', '2025-03-13 07:37:50'),
(194, 74, 22, 205, 1, '2025-03-14 16:38:45', '2025-03-14 16:38:45'),
(195, 74, 23, 221, 1, '2025-03-14 19:43:32', '2025-03-14 19:43:32'),
(196, 75, 22, 205, 1, '2025-03-14 21:37:55', '2025-03-14 21:37:55'),
(205, 77, 22, 205, 1, '2025-03-15 21:50:50', '2025-03-15 21:50:50'),
(206, 44, 23, 221, 1, '2025-03-15 22:25:08', '2025-03-15 22:25:08'),
(207, 78, 23, 221, 1, '2025-03-16 05:21:12', '2025-03-16 05:21:12'),
(210, 80, 22, 205, 1, '2025-03-16 10:10:50', '2025-03-16 10:10:50'),
(211, 82, 23, 220, 1, '2025-03-16 14:37:16', '2025-03-16 14:37:16'),
(213, 83, 38, 263, 1, '2025-03-16 21:40:38', '2025-03-16 21:40:38'),
(214, 84, 28, 223, 1, '2025-03-17 03:14:39', '2025-03-17 03:14:39'),
(215, 86, 28, 223, 1, '2025-03-17 13:09:35', '2025-03-17 13:09:35'),
(216, 87, 23, 221, 1, '2025-03-17 16:40:54', '2025-03-17 16:40:54'),
(217, 88, 22, 205, 1, '2025-03-18 02:14:22', '2025-03-18 02:14:22'),
(218, 91, 23, 220, 1, '2025-03-18 12:11:49', '2025-03-18 12:11:49'),
(219, 91, 42, 286, 1, '2025-03-18 12:12:24', '2025-03-18 12:12:24'),
(229, 94, 43, 285, 1, '2025-03-18 20:27:05', '2025-03-18 20:27:05'),
(230, 95, 23, 220, 1, '2025-03-18 21:24:12', '2025-03-18 21:24:12'),
(231, 96, 23, 220, 1, '2025-03-18 22:28:09', '2025-03-18 22:28:09');

-- --------------------------------------------------------

--
-- Table structure for table `type`
--

CREATE TABLE `type` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `is_active` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `type`
--

INSERT INTO `type` (`id`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'men', 0, '2024-10-01 18:30:58', '2024-10-01 18:30:58'),
(2, 'female', 0, '2024-10-01 18:33:25', '2024-10-01 18:33:25'),
(4, 'unisex', 0, '2024-10-04 11:46:18', '2024-10-04 11:46:18');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `two_factor_secret` text COLLATE utf8mb4_unicode_ci,
  `two_factor_recovery_codes` text COLLATE utf8mb4_unicode_ci,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `current_team_id` bigint UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Abdelrahman Mohamed', 'eyadomar.ok@gmail.com', NULL, '$2y$12$5Jq/YlFUgKVGsEBA710Rl.JjlXugIPfekwPEFqTqBVsRtGEzWvFCu', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-03 11:09:33', '2024-12-03 11:09:33'),
(2, 'Joulie Ehab', 'joulieehab7@gmail.com', NULL, '$2y$12$9/YPNF1RlJJDp44oaLRCV.oGIq.WWWi53IJMVJiKU2QOv7aBcPNv6', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-03 11:29:57', '2024-12-03 11:29:57'),
(3, 'Fady', 'fadyemad933@gmail.com', NULL, '$2y$12$eoLL2e6cHVlti5kIn1IMFOGMty.69nWVukYkxT.4MkBV6dBe9vV/2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-04 17:06:20', '2024-12-04 17:06:20'),
(4, 'Youssef Sobieh', 'youssefsobiehh@gmail.com', NULL, '$2y$12$Cn2OckqjS7Smujtw2B8WDuALHbSiD0Vh80/PdwrATXCFTJAzphQC2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-04 22:28:22', '2024-12-04 22:28:22'),
(5, 'Fady Emad', 'fady@fady.com', NULL, '$2y$12$.f/aDExe3/8WM8aur.H5XeW0WgInXXYHvgXRgJTa/WS6KowDwUTx2', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-09 21:01:12', '2024-12-09 21:01:12'),
(6, 'Jasmine Raafat', 'jasmine.ra2fat.20@gmail.com', NULL, '$2y$12$9JHpcV4Ko1OczuJZXGf6Xe5A8rglr5O46sq96B5XyMFhMS0n1yR5a', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-23 22:18:56', '2024-12-23 22:18:56'),
(7, 'Manal', 'manalehab24@yahoo.com', NULL, '$2y$12$pe84OQEp3ipEkjOK96eziu8j.AmTRTQhaKsyHZtQSL/yMXBCoIGlK', NULL, NULL, NULL, NULL, NULL, NULL, '2024-12-23 22:45:37', '2024-12-23 22:45:37'),
(8, 'Mai sherif', 'maisherifzaki9@gmail.com', NULL, '$2y$12$tWxZHZJOLRXhFn9QfGywcOpw1qR9uRmvFzLhB1mSuK8ELUTHwkJZa', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-23 13:09:27', '2025-01-23 13:09:27'),
(9, 'Verina gendy ibrahim', 'verinagendyibrahim@gmail.com', NULL, '$2y$12$GLLLTIlh5z5pbI2C6HlaXeVZmTZwW9L8Ao8LOkIYfI8tv0.9VpigS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-01-25 16:05:48', '2025-01-25 16:06:55'),
(10, 'Haneen Magdy', 'haneenmagdyeid18@gmail.com', NULL, '$2y$12$3RFPasIP6zCPB9tBwpyxXOESagrlPhil8S4YyS3Ix18ahlDgcL6Gy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-15 12:23:52', '2025-02-15 12:23:52'),
(11, 'Mariam Hany', 'romakero2810@gmail.com', NULL, '$2y$12$vwGgWDPEjPnjNE.pUZjYneOoyTU1Xm803InssZBq.jdKwpbghfzIe', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-15 12:43:15', '2025-02-15 12:43:15'),
(12, 'Dona samoel', 'donasamoel@gmail.com', NULL, '$2y$12$XkBWNi6N3H.EeEmG5MMGV.88qGMggd9wXAwS9ZJgNY0xYmzejv.sS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-15 18:37:29', '2025-02-15 18:37:29'),
(13, 'Noreen', 'emilygamal765@gmail.com', NULL, '$2y$12$/3EnJT9sI3svjRk0r5El3eyI0s3EMKWhRBhq8Zgtp4pMKcvA7oTjO', NULL, NULL, NULL, 'pwxtlSJZ0cCaeVCrMgpx6Asc2TEOGzYItkguhbGoUCeTWvsSPbRBBwgc35mn', NULL, NULL, '2025-02-15 20:35:02', '2025-02-15 20:35:02'),
(14, 'Rovan', 'rovanyacoub6@gmail.com', NULL, '$2y$12$X5m1nPkhTGYNfjVgdKbR6.zedADyTgxHMb8f0I7aDwWGnp66BUYbW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-16 07:29:45', '2025-02-16 07:29:45'),
(15, 'Mariz Nage', 'mariznage799@gmail.com', NULL, '$2y$12$eNBhwX1CTjZnKv64x6GsQe9YPGw/.vOiHzc5tMuC7WUVUYPSZGPm6', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-16 10:26:07', '2025-02-16 10:26:07'),
(16, 'Mayzien Sherif', 'mayziensherif9@gmail.com', NULL, '$2y$12$5M0QXPCODxfYR/RZloX4X.2H5NNdtKgvXnLE/6jXE4.uj59gR6PCi', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-16 12:45:05', '2025-02-16 12:45:05'),
(17, 'Ganat', 'ganatalaa29@gmail.com', NULL, '$2y$12$1BnRRlS0c4IxA1Et0jNBAuBPK27349jWp6URqA/Orq31SQjvyqoFy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-16 19:20:10', '2025-02-16 19:20:10'),
(18, 'Jovianne', 'joviannegeorge2008@gmail.com', NULL, '$2y$12$N7al9UiAp439OO9l7BlJfebVZh1IdQBlh9zIUqyW5/pSCnKg7iTM6', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-16 20:07:30', '2025-02-16 20:07:30'),
(19, 'Maryam', 'maryammosaad969@gmail.com', NULL, '$2y$12$2jsFfs0uZVcyf78mXbQfqOGXxv2yiJjZyBsfGidYu.FEpIzuAAGwq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-16 21:57:17', '2025-02-16 22:41:02'),
(20, 'SAFY', 'safym971@gmail.com', NULL, '$2y$12$Sdz25GGaUf/WzcXrrufcFOgecKD524ZOlGMSF2JFTZvAguEJaP/56', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-17 17:41:00', '2025-02-17 17:41:00'),
(21, 'Larahany', 'larahany295@gmail.com', NULL, '$2y$12$/o45ezAWAWSvzqpsvlvP7.zKnQ.IwfcAL5yyxXUZgffdQsXb1BAiC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-18 05:15:13', '2025-02-18 05:20:35'),
(22, 'Larahany', 'lh621214@gmail.com', NULL, '$2y$12$K7H13dZYQsDPXUO5pEKrzueBdoQYqkIG.v1X8XPI7bCmnRYgvg75a', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-18 05:29:59', '2025-02-18 05:31:57'),
(23, 'Lara', 'lh2938979@gmail.com', NULL, '$2y$12$pJIb4C1/kQx1or0zsBtbMOCDFsDTKsmGc8UWLCGj9rByCNtC81wGW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-18 05:38:37', '2025-02-18 05:41:52'),
(24, 'Jana', 'jananakamel8@gmail.com', NULL, '$2y$12$h5/9WEQA.wSnxd1NiSfTWu2Yqf50QNqM0/APyKL5m7EKMvba/aIV.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-18 17:55:14', '2025-02-18 17:55:14'),
(25, 'Youna', 'younaescander@yahoo.com', NULL, '$2y$12$SzpJpJrNlKXtBWr0i2aTe.6tptEQCcZXtyiHcUPFXpTkEc3uRN2pS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-18 18:51:18', '2025-02-18 18:51:18'),
(26, 'Jana hesham', 'janaahesham400@gmail.com', NULL, '$2y$12$JF/ghUon2t5j6NYHdXnd6uw84GXn0/mhSm6to6AWoPK6Mhm/pqQmS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-18 21:45:25', '2025-02-18 21:46:11'),
(27, 'Dalia Mahrouse', 'dalamahrouse@gmail.com', NULL, '$2y$12$tVb7CTWrsbUPNjjFAHQxnODCdDdXjyQhZnylkusyc/krEa20WZfQq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-19 00:47:12', '2025-02-19 00:47:12'),
(28, 'valerie peter', 'valeirepeter15@gmail.com', NULL, '$2y$12$UkRG7Jta264xXOZPqx8f.umaGnk7BTK0mhr92LJ00Dm2AuyFO3zRu', NULL, NULL, NULL, 'KDiEZbpzx0WG0MkRlzazs1EyxHffnJOh5RMi7a0eBgzjFMPUMw7VXWxYhTy7', NULL, NULL, '2025-02-19 15:24:27', '2025-02-19 15:24:27'),
(29, 'Lamis osama', 'lamisosama87@gmail.com', NULL, '$2y$12$wu7ugX37zMf4UAQpoiT1E.glmw2j0YIY9jAqyK0sVf5xbfBQWOR3G', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-19 16:47:23', '2025-02-19 16:47:23'),
(30, 'joudy', 'joudyelhlawany@gmail.com', NULL, '$2y$12$BYszhtBLYA6L9od85mN1QuekTifkF72IiY7V85N1r67d7/Jn6kuOq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-20 00:10:52', '2025-02-20 00:10:52'),
(31, 'iDhfQYRYxovqaa', 'herleibah42@gmail.com', NULL, '$2y$12$2074AZZP1F9URlfwLDQ2TOodSR7VmkNoG0KRYCvw.P.yZygjnWNfq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-22 00:00:33', '2025-02-22 00:00:33'),
(32, 'Rehab', 'rehabashry@gmail.com', NULL, '$2y$12$nJcVqdw6QfbZ/0TtuyGccOS5cawiGyblC31B0cZbIWlA2wzHlWJYq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-22 16:20:00', '2025-02-22 16:20:00'),
(33, 'Menna', 'mennaelsodany73@gmail.com', NULL, '$2y$12$QPIT5pBiNnWBkqLAkUyB2um656Bmd9tIDT34oCRi24/VMR8Qs4wbm', NULL, NULL, NULL, 'h7cw9GKHL09BfjO2cz7NneMY7j0FgoAlpnJXgU1l559tT14DIZYUNNGPmqnK', NULL, NULL, '2025-02-22 21:27:38', '2025-02-22 21:27:38'),
(34, 'YUychXwVieMwG', 'rinturner21@gmail.com', NULL, '$2y$12$8CZD0J3Jz3cM3mFQ4oU1T.caOIvyf6DzW4K0SVvq8vo7v97cXqPZq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-23 15:24:38', '2025-02-23 15:24:38'),
(35, 'Mariz', 'marizatef1212@gmail.com', NULL, '$2y$12$2gRa4YuPo.yKV7J3Y4X1s.ZK6Y/6xbfu47/mg0VcoyRiD8ljATn0.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 15:04:25', '2025-02-24 15:04:25'),
(36, 'Halla mohamed', 'hallamohamedd7@gmail.com', NULL, '$2y$12$aOTAFgLS9Lp1cuMiNfKfh.OnpwNGWrerbET.Z8EUyTaIOVLNR4bqa', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-24 23:18:06', '2025-02-24 23:18:06'),
(37, 'Marina Nabil', '01212204468e@gmail.com', NULL, '$2y$12$gNTPnzMiCglL.EffRs8hqemHNh5AAwjATl3xMo4.62EjQ9hdED8Lu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-25 18:55:19', '2025-02-25 19:02:55'),
(38, 'Jana', 'yjana2290@gmail.com', NULL, '$2y$12$ORyCs9vKwBEBbXLSJABMtux/fRUJXz5n0.AhG5FkX9s/ad7p/p5Zq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-26 07:07:33', '2025-02-26 07:07:33'),
(39, 'Malak', 'malakahmedsamy@gmail.com', NULL, '$2y$12$eMyRc0lzsUWYiU0OPXlfx.C2eBJi9/h80KS8TUWMCVFUAli8dN8qC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-26 14:04:36', '2025-02-26 14:04:36'),
(40, 'Mariam', 'mariamstars86@gmail.com', NULL, '$2y$12$6cafTWCOxZC1WDG/DRUdz.0nKuVR./pU2Z6Mj6AZcgK0oNeJGvFWe', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-26 18:21:52', '2025-02-26 18:21:52'),
(41, 'Ghena Ahmoss', 'ghenaahmoss9@gmail.com', NULL, '$2y$12$zIm9N6e.rdHfJIjs9sFT6.1Z97rZC1OW.YqCNQ1OoOshN/k0hRQ8O', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-26 21:51:27', '2025-02-26 21:51:27'),
(42, 'Wessal', 'wessalhassan6@gmail.com', NULL, '$2y$12$0S11qX9zItdQEAue4K.kfutiiq48Xa4nls7fkc9antjgfPAypohue', NULL, NULL, NULL, NULL, NULL, NULL, '2025-02-28 18:43:17', '2025-02-28 18:43:17'),
(43, 'Omneya elmahdy', 'omneyelmahdy@gmail.com', NULL, '$2y$12$Ln3YZek8NstSMFZ52aaFkOmWhtPp1hu8Y2wMEfPgS2A55Yx5l0C3.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-01 00:34:39', '2025-03-01 00:34:39'),
(44, 'Malak', 'malakahmedsamy2005@gmail.com', NULL, '$2y$12$4znwTGpva0AGccp3uuPXj.LKRLhtAH4bCMbD/NtNdNraOK3dSCxTi', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-01 11:39:12', '2025-03-01 11:39:12'),
(45, 'Merna', 'gabramerna7@gmail.com', NULL, '$2y$12$HexAfkbqix2t28OJp.2tYuiZRDypCjwu/Id83LLgH0GDTcA17tgk2', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-01 11:52:13', '2025-03-01 11:52:13'),
(46, 'Noor', 'inoormohamed517@yahoo.com', NULL, '$2y$12$A9Gb6bhGAWsDOynjfj0xEOeVGSv6b2SlhBBv7NQ80lALCYjkdXV.2', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-01 21:47:02', '2025-03-01 21:47:02'),
(47, 'Wessam', 'w7865282@gmail.com', NULL, '$2y$12$21fTSdevNIyNVI7JpnFRTuvHXciM1mU8xsvh0bprmAEuVQDqcDvZa', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-02 10:52:15', '2025-03-02 10:55:07'),
(48, 'Maro Kamal', 'marokamal288@gmail.com', NULL, '$2y$12$7z0TCSSWZFg3l2sQeW1uM.frLtNlhVJmTVamJXUYfKEYO9G3d/A2i', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-02 15:39:54', '2025-03-02 15:39:54'),
(49, 'Marvel', 'marvel.maurice.1572004@gmail.com', NULL, '$2y$12$85UiZePod3B5XijcB2Hb5ucsg72aCKwYcnEVnYCUqPUVzu0pHFKCu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-02 19:21:01', '2025-03-02 19:21:01'),
(50, 'kURXNKnxEXlOt', 'emcknightbj1987@gmail.com', NULL, '$2y$12$bMQU8r3WHbdyMK8nzds1jebjFLuJYeuT72KUeKPgzge1FnqYZC9mC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-03 04:46:14', '2025-03-03 04:46:14'),
(51, 'Mirna', 'mirnatarek123@outlook.com', NULL, '$2y$12$5.pHJzCuQpuPMQ5MWXqvxuDTEUC2Lvyw7t2qCe2.LzFKbCTXJtBvq', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-03 08:33:01', '2025-03-03 08:33:01'),
(52, 'Hana leila', 'hana.lela12@icloud.com', NULL, '$2y$12$4VVRt2cGrrD8WWg2E9HjUeZpZfLiqrMraQJjP9ELu4GrBktgmpEEW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-03 17:28:38', '2025-03-03 17:28:38'),
(53, 'Shahd', 'shahdnageh1@gmail.com', NULL, '$2y$12$ybtkyh5ivgTT4xf6/7d/qeoXSf6Q4eHtvCNJi5ja4InNSv25VOEay', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-04 23:24:33', '2025-03-04 23:24:33'),
(55, 'Alice', 'alicesamy2007@gmail.com', NULL, '$2y$12$b7azqkituRCKPESpPWFN1uKHAJH2QjlPawDnArk/UwgLrUn0JM2tm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-06 21:12:03', '2025-03-06 21:12:03'),
(56, 'Noura', 'nouraayman40@yahoo.com', NULL, '$2y$12$BEI0QETo3vgS7308cictH.sUKE5HMzDqWhyWE6r8oZ68OXlTtMQWm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-07 12:29:21', '2025-03-07 12:29:21'),
(57, 'Hana', 'sherifhanafy4@gmail.com', NULL, '$2y$12$61E5bTNhVTfywkKjLX714u0Te8HpZ7y3NEx/LWjTKEyB2l0InzxVa', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-08 01:26:02', '2025-03-08 01:26:02'),
(58, 'George', 'georgerefaat241@gmail.com', NULL, '$2y$12$mSUcU43BuikPVbB03G3J/u6IhsdzkqtT/3DKy5syQn9fdc8QnCgce', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-09 15:43:36', '2025-03-09 15:43:36'),
(59, 'Judy Ahmed', 'judyahmed609@gmail.com', NULL, '$2y$12$9qyh3H8nWWRqwtzcaPJMK.IFUCEfUEzyDH.vnI5BhR8w.o5TKcEt6', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-09 20:05:17', '2025-03-09 20:05:17'),
(60, 'Noha Bassam', 'nohabassam1250@gmail.com', NULL, '$2y$12$qvcFhPoIsxpO3gc1KlviI.qQkb9FDzGiD2sB0Ysl6amnRHG7FBsMW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-09 21:18:43', '2025-03-09 21:18:43'),
(61, 'Shaymaa yasser', 'shaymaayasser5@gmail.com', NULL, '$2y$12$1kmCN6nFfRhd.r.d7NeFvOuxJD1JpwN6QqcFhVo77KpcljAa0Uwzq', NULL, NULL, NULL, 'auk9CnUfn9rAersnDCIRb2zrMTTg7qE8KAhbdHTOJ1VsCvO6cesy2IAcj7Ou', NULL, NULL, '2025-03-09 23:59:38', '2025-03-09 23:59:38'),
(62, 'Candy', 'candynashaat201900@gmail.com', NULL, '$2y$12$L5zrb7y9fSbS8NB60zQbj.Zy1wvqf5Sizoi4eN3kYPyRfAbbR4Uo2', NULL, NULL, NULL, 'mLTv6kmJY3pdteETqtBDsFidYsmITXMyR25h4ycIjPgwj6FdW3a9hRgv6wGV', NULL, NULL, '2025-03-10 15:36:31', '2025-03-10 15:36:31'),
(63, 'Sarah', 'sarahwhiteline12@gmail.com', NULL, '$2y$12$A6J00mssRG822a7LffANm.1ClD1KCSyayTWpUXb3gjkz/CuCbmkle', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-10 16:50:07', '2025-03-10 16:50:07'),
(64, 'Karen maged', 'karenmaged222@gmail.com', NULL, '$2y$12$akwaDDNilbiy5vHzxJ8VWe3wzK6byTkxcUpnlCFreF23ZiHNXHMeS', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-10 19:25:39', '2025-03-10 19:25:39'),
(65, 'Maram', 'maramhatemx@gmail.com', NULL, '$2y$12$9eAk2ixENLl8EqUfK5bgfuz5Gzth7OiQVEascAgSfuGgyfdj2F9mK', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-10 22:40:41', '2025-03-10 22:40:41'),
(66, 'Germeen kamal', 'gemi.gery@gmail.com', NULL, '$2y$12$MkNqcoZU.Z5o9n6JLOBSS.TG29eYGODiYDMM84gdjwUSRBGjdmeoG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-11 06:13:18', '2025-03-11 06:20:05'),
(67, 'Malak morad', 'muradmalak08@gmil.com', NULL, '$2y$12$DGk0MgLbyzdTrFF/e18.repcGO3rqzIUtSUzB0pXBqko2bhnFtDIi', 'eyJpdiI6ImxlMVJzMnNxbU0reEJRYi9KcHJBTmc9PSIsInZhbHVlIjoiWnVEQVZzREswUFQ5TUJZSjNJeE9DZUdJb0EyVG1FemEyaG5uUERYSnkyYz0iLCJtYWMiOiIzYjBjOTY1Y2E3NWUxYWZlZTE3OTdlZWNhOWIwNjQ0N2ZlMDg0ZDFiNjRmODkyNTNiYjU4ZjY5ZDA0NTQ5Mzk2IiwidGFnIjoiIn0=', 'eyJpdiI6InBsb2FYL0xEZ1FsVGlNdUw5Y2Q5SXc9PSIsInZhbHVlIjoiZWNSUUFmSGdMZnIyUUMrcTNCbjdBZ2x6djFHWkFRODVTcEtRclVNb0Zsd3VpczdrNjA5ZWVMdG5SeU1HdCs1bWhDSjJzNTBOdmZuS3E3UHNnRHYzRjBMM1d4WEFmY2RZUUpieHBweis2ZXgxc29FL0dLMllyTFAyK3o1WWFrZlNOSWNwdW01Q0YwNklub3pVS09kTjlBa1ZsNHUxTWJlNmJlemI1Mk5UN1pPYUVzMUkwMTlrTS92R0FtQjRGbzYwZXhSeHdoWC9JbCtGUStla1JqWSt6L2k2VHVBOUZxVm5KejA3dU1Bd3h6dnN0WVU1R25CUFdVVjRLYnB0eXBKRThYUSthMkpobHFoZjJVL0g4T0tPL2c9PSIsIm1hYyI6IjUzY2VmOTViYThlNmQyZDQyYjFlYmQ3NjZiMjIzN2MwMjZjZTNhZTNiOWQ4ZTA0MmMwNjI1MzhhMzg4NmNlZGQiLCJ0YWciOiIifQ==', NULL, NULL, NULL, NULL, '2025-03-12 00:13:39', '2025-03-12 00:15:03'),
(68, 'Malak Morad', 'muradmalak08@gmail.com', NULL, '$2y$12$SVg04qz5RufuFjbhVWD/2.doENLqvBoojixQWzGq0914q665ry/f6', 'eyJpdiI6Ijd1SnRiVlhlR3k4V1BtaEJ2YW84akE9PSIsInZhbHVlIjoieUY5VDJQek5pWG9nM0lsQVlwckFnRnVnbnNza3RhcityR0xWakFYN0V1dz0iLCJtYWMiOiJjNjM4NmM1MjYyZmM1YmQ3OWJlMGQxYmY2MmNjNDQyMGQyMmYyOTkxNjU3ZGQzY2FmNjgyYWFkNTM0NDIwNmI2IiwidGFnIjoiIn0=', 'eyJpdiI6ImYvYWx2OHAvdWNFeVFCWXp6SjRqMnc9PSIsInZhbHVlIjoiZ0ltU0REOGNBM2VXK3dXbEJsM2RQRERzd2U4MU9INWlVWEtXVEFPb1NJem5KZmJGU2p3bUtKTUNmZnB5QTZiV0ZpWm53ZUE0Q09RdDd2bUN2cnQ5UFRsTW80ZkJmczlUK0tQVEtTY1ViSUdLUlYvbFVPcG9oM01CeTVYSWhnUUVuTXY2L1NPM1h2N1lPb1A3YzlSZUk3akdtNTYvYjJuNW0vN3V3c0pQaXBWZzkrN09zbTBETGdaZ3lOTzJaSnp2V1Jkb2xBbVNmUWxnQkQyVHZ6UmpFeFRzL2xMS21NZHNES2hQcjhpMlB4d0g4bVh5d0hvZzJ1WTBXQllqQnRSaXptR0R3WUNSS2ppbzNTQmJKWmRueVE9PSIsIm1hYyI6IjY2YTEwMTJkNDQ4NDRjZjcxN2I3MzE5YjM3NWE0NmQ1ZjJmNThjYzdjNDUyZTcyYWRjODNmZTM4MTYzNDMxNmIiLCJ0YWciOiIifQ==', NULL, NULL, NULL, NULL, '2025-03-12 00:17:59', '2025-03-12 00:18:40'),
(69, 'Giocanda', 'jokaibrahim4@gmail.com', NULL, '$2y$12$SpKgqEsEbaSOVYCUdUUFUuIxR/5KQtHGfb4kZ0IKdis6bygaUL7EC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-12 13:33:38', '2025-03-12 13:33:38'),
(70, 'malak mohamed yehia', 'malakmohamed1992006@gmail.com', NULL, '$2y$12$1EKF7O1EvRfgSNbmoxzL7uga5knov8LCVlVGe7r9mz5FpTBFW.eQu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-12 23:11:01', '2025-03-12 23:11:01'),
(71, 'Habiab', 'habiba.medhat123456789@gmail.com', NULL, '$2y$12$9zCrp11bG8UJbFLEIvX0K.N0i44k.yMuCq77o4f.Vhhg0J1fpsRBO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-13 04:36:16', '2025-03-13 04:36:16'),
(72, 'Yara', 'yara.ahmed.9823@gmail.com', NULL, '$2y$12$ouh3GP0gvJ5bXyQDZ992eu51dr4BUV9czH8GTefdv9Ui7txCMnUUa', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-13 07:02:59', '2025-03-13 07:02:59'),
(73, 'Mayar', 'mayarahmed@icloud.com', NULL, '$2y$12$xBEUxnvIO2GpeufkAD0uO.5edCE34nu2gfwC0h5rgpe8A9.aHdOW.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-13 23:22:46', '2025-03-13 23:22:46'),
(74, 'Nermeen Samaan', 'nermeensamaan1@gmail.com', NULL, '$2y$12$w5ZL39TLXl/CMSrYPIyXo.nReiijFsjtPE34GC3Ngv8avTejj8q7C', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 16:38:35', '2025-03-14 16:38:35'),
(75, 'salma', 'salmaalshayeb3@icloud.com', NULL, '$2y$12$Ur/zoE.hmWzVkeo3g2o7G.fp5./HKAxgnPr14PGFc7cHNN5kiUBx.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-14 21:37:49', '2025-03-14 21:37:49'),
(76, 'Habiba Elzahaby', 'habibaelzahaby819@gmaill.com', NULL, '$2y$12$UvvR7jAyY5cI/FXZ3rrBeejRuzJMwCdzrNwX2D0XbpQTbf8Gxlfdm', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-15 02:09:05', '2025-03-15 02:09:05'),
(77, 'Farah tarek', 'farah51202@gmail.com', NULL, '$2y$12$9fs7IPGn6736VvbYuFbvJuU/h7GmGZA9VUsPqClHi7qAn.BxxaJ16', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-15 21:50:39', '2025-03-15 21:50:39'),
(78, 'Lina', 'lenawalid@icloud.com', NULL, '$2y$12$Zd82OeiA0hEKpiLDvyWnfu3LY9zXCqnGQNEtRc2GCJ7eZNbJBS3EG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 05:20:54', '2025-03-16 05:20:54'),
(79, 'Kenzy soliman', 'kenzysoliman08@gmail.com', NULL, '$2y$12$SKbcqrqDEkycco6X5Pt1U.7HC631M0fiJkP7fCNPvnPM7RXwpovQW', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 10:04:05', '2025-03-16 10:04:05'),
(80, 'Mayar alaa', 'myaralaa.ma@gmail.com', NULL, '$2y$12$Mk3hCVZeve/fR1nKthHn9OXDjxlonDm7Cx6L.obP9gMsbyG3e4Qam', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 10:09:35', '2025-03-16 10:09:35'),
(81, 'Sily', 'ayselehab@icloud.com', NULL, '$2y$12$mp8OpMKiziElNtPBDMrNmuFWf3fXy1v1Er7sucaSIGoNhgasysGpu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 12:19:27', '2025-03-16 12:19:27'),
(82, 'Roro', 'rorooothabet@gmail.com', NULL, '$2y$12$K2ZKTONIjHLUXd7ETc7CmuQeth23NS.iTTVK1VyMuQxfEgkORgFNO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 14:37:07', '2025-03-16 14:37:07'),
(83, 'lojain', 'lojy.walash@gmail.con', NULL, '$2y$12$J/NamM0tlSQjn/WieiM5OeFWPzR2BvwUxSNV59braBY/BsT0frHS6', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-16 21:22:30', '2025-03-16 21:22:30'),
(84, 'Dania Ashraf', 'daniadodo2010ashraf@gmail.com', NULL, '$2y$12$95NVfG7WgP7vNNIN2x0twuPGnNL7KLciVDQTeq6trjmh1x4ufES.i', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 03:14:28', '2025-03-17 03:14:28'),
(85, 'nadine mahmoud', 'nadinemahmoud463@yahoo.com', NULL, '$2y$12$JH8nWfnODyAmgGTHXUOPruXajdA7mpD5L2YbzowkEfqbpn/ss44am', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 06:38:17', '2025-03-17 06:38:17'),
(86, 'Vero George', 'verinago123@gmail.com', NULL, '$2y$12$IzpGdR4yC06SPMQfyRu.O.nK3iLvWKJjn04PNlrzT9iK7g52wAYQC', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 13:08:36', '2025-03-17 13:08:36'),
(87, 'Veronia', 'vero.you2008@gmail.com', NULL, '$2y$12$mKE/qMSFFG4eNtTbc635jOCIfXDWE2882g7mhLhn9XqfH6uuy3ofK', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-17 16:40:18', '2025-03-17 16:40:18'),
(88, 'Mariam Ayman', 'maryam_ayman2@icloud.com', NULL, '$2y$12$5l0Lzk05rv.rPyg2WLwbZOPNA04ziMYMfWcveZeJoQsh904Br7QG.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 02:14:00', '2025-03-18 02:14:00'),
(89, 'Injy abdelmoteleb', 'injy298@gmail.com', NULL, '$2y$12$JX2B79IFXsd3j8bbhLGf/uvKnzJUeX8JNzy6sqLYBpd/6VRMAtqha', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 09:24:37', '2025-03-18 09:24:37'),
(90, 'lojy', 'lojy.walash@gmail.com', NULL, '$2y$12$u42TStfTwlW40gB64cbVqe55wP8jdukEhA3oHqKVZSJIojJ0Qx0m2', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 10:28:47', '2025-03-18 10:29:11'),
(91, 'Yara', 'yara.ahmeddd67@gmail.com', NULL, '$2y$12$CoFWlZEX2fO8dOQBWqf8.e6F2/hmjOL5gSY6rrLTnFd9DpfwEZzou', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 12:11:27', '2025-03-18 12:11:27'),
(92, 'Jessica magdy', 'jessmagdy95@gmail.com', NULL, '$2y$12$0cdOV1sJfLk8PpIfdu7QDek3ERZhv67xQ1NwRbeoOHBumEZszO3eG', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 14:03:46', '2025-03-18 14:03:46'),
(93, 'Aseel Ismail', 'aseelismail329@gmail.com', NULL, '$2y$12$Ueq0YLHmBeYyasu80dla1OdYN9qCSk63nmA3z463xMFyw75LGNZdy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 14:08:36', '2025-03-18 14:08:36'),
(94, 'Nariman', 'narimant33@gmail.com', NULL, '$2y$12$iCRpc6VUJ/NuDk4KTIGWJOyAvkuLhUuA3cuJa9VLld.h5SRbTYwdK', NULL, NULL, NULL, '5z0Fq9uEOXSMnlNTefwtIL3M5wR2Y0ub2atmVo8Md5D481nKxhvuuTQyw3dM', NULL, NULL, '2025-03-18 20:15:27', '2025-03-18 20:15:27'),
(95, 'Nadine', 'nadineahmedezz1111@gmail.com', NULL, '$2y$12$PI/cqiO0JvDKany9GsrnOeAaQunWDeOt44P7N4C3f.La5PLzxtL3W', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 21:23:59', '2025-03-18 21:23:59'),
(96, 'Christine', 'christineadel1232007@gmail.com', NULL, '$2y$12$gpHNsTxqRmOij21kVPxKkeloQ5hB67Ssp/W18Te4LoN.I4SXErRxu', NULL, NULL, NULL, NULL, NULL, NULL, '2025-03-18 22:27:57', '2025-03-18 22:27:57');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `addresses`
--
ALTER TABLE `addresses`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `discount_codes`
--
ALTER TABLE `discount_codes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `discount_code_id` (`discount_code_id`),
  ADD KEY `orders_ibfk_3` (`city_id`);

--
-- Indexes for table `order_discounts`
--
ALTER TABLE `order_discounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `discount_code_id` (`discount_code_id`);

--
-- Indexes for table `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`),
  ADD KEY `products_id` (`products_id`),
  ADD KEY `size_id` (`size_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `orders_id` (`orders_id`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `type_id` (`type_id`);

--
-- Indexes for table `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `product_items`
--
ALTER TABLE `product_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `size_id` (`size_id`),
  ADD KEY `products_id` (`products_id`);

--
-- Indexes for table `type`
--
ALTER TABLE `type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `addresses`
--
ALTER TABLE `addresses`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `discount_codes`
--
ALTER TABLE `discount_codes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `order_discounts`
--
ALTER TABLE `order_discounts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT for table `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `product_items`
--
ALTER TABLE `product_items`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=299;

--
-- AUTO_INCREMENT for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=233;

--
-- AUTO_INCREMENT for table `type`
--
ALTER TABLE `type`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `addresses`
--
ALTER TABLE `addresses`
  ADD CONSTRAINT `addresses_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `categories_ibfk_1` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`city_id`) REFERENCES `cities` (`id`),
  ADD CONSTRAINT `orders_ibfk_3` FOREIGN KEY (`discount_code_id`) REFERENCES `discount_codes` (`id`);

--
-- Constraints for table `order_discounts`
--
ALTER TABLE `order_discounts`
  ADD CONSTRAINT `order_discounts_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_discounts_ibfk_2` FOREIGN KEY (`discount_code_id`) REFERENCES `discount_codes` (`id`);

--
-- Constraints for table `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `order_items_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_items_ibfk_2` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `order_items_ibfk_3` FOREIGN KEY (`size_id`) REFERENCES `product_items` (`id`);

--
-- Constraints for table `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`orders_id`) REFERENCES `orders` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`),
  ADD CONSTRAINT `products_ibfk_2` FOREIGN KEY (`type_id`) REFERENCES `type` (`id`);

--
-- Constraints for table `product_images`
--
ALTER TABLE `product_images`
  ADD CONSTRAINT `product_images_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `product_items`
--
ALTER TABLE `product_items`
  ADD CONSTRAINT `product_items_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`);

--
-- Constraints for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`products_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
