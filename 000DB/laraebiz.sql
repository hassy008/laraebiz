-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 24, 2019 at 07:11 PM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraebiz`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(10) UNSIGNED NOT NULL,
  `admin_name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `admin_email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `admin_name`, `admin_email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'abu hasnath', 'hasnathrumman1234@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', '2019-01-14 13:29:29', '2019-01-14 13:29:29');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `cat_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cat_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `parent_id`, `cat_name`, `cat_description`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 0, 'Men\'s Clothing', 'asd', 1, '2019-01-14 15:22:58', '2019-01-16 07:30:01'),
(2, 0, 'Kids Toy', 'toys', 1, '2019-01-14 17:34:36', '2019-01-16 07:30:28'),
(3, 0, 'Electronics', '<p>Best deal</p>', 1, '2019-01-16 07:29:41', '2019-01-16 07:29:41'),
(4, 0, 'Women\'s Clothing', '<p>clothes</p>', 1, '2019-01-16 07:30:50', '2019-01-16 07:30:50'),
(5, 0, 'Swimming Pool', '<p>show_product_by_category</p>', 1, '2019-01-20 06:02:00', '2019-01-20 06:02:00'),
(6, 0, 'Swimming Pool', '<p>adc</p>', 1, '2019-01-20 06:05:25', '2019-01-20 06:05:25'),
(7, 0, 'Swimming Pool', '<p>dvcv</p>', 1, '2019-01-20 06:16:24', '2019-01-20 06:16:24');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(10) UNSIGNED NOT NULL,
  `customer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `customer_name`, `customer_email`, `customer_phone`, `password`, `created_at`, `updated_at`) VALUES
(7, 'Abu Hasnath Rumman', 'hasnathrumman1234@gmail.com', '1634783946', '4297f44b13955235245b2497399d7a93', '2019-01-21 10:34:09', '2019-01-21 10:34:09'),
(8, 'Abu Hasnath Rumman', 'hasnathrumman1234@gmail.com', '1634783946', 'e10adc3949ba59abbe56e057f20f883e', '2019-01-21 10:44:56', '2019-01-21 10:44:56'),
(9, 'Abu Rumman', 'hasnathrumman12345@gmail.com', '1634783946', 'e10adc3949ba59abbe56e057f20f883e', '2019-01-22 08:18:09', '2019-01-22 08:18:09'),
(10, 'Abu Hasnath Rumman', 'asd@gmail.com', '1634783946', '4297f44b13955235245b2497399d7a93', '2019-01-22 20:07:44', '2019-01-22 20:07:44'),
(11, 'Abu Hasnath Rumman', 'hasnathrumman1234@gmail.com', '1634783946', '4297f44b13955235245b2497399d7a93', '2019-01-23 04:09:32', '2019-01-23 04:09:32');

-- --------------------------------------------------------

--
-- Table structure for table `manufacturer`
--

CREATE TABLE `manufacturer` (
  `manufacturer_id` int(10) UNSIGNED NOT NULL,
  `manufacturer_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `manufacturer_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` tinyint(4) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `manufacturer`
--

INSERT INTO `manufacturer` (`manufacturer_id`, `manufacturer_name`, `manufacturer_description`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(1, 'Bismillah Allah', 'Allah-Hu-Akbar', 1, '2019-01-14 13:32:49', '2019-01-16 07:30:59'),
(2, 'Walton', 'Local best product', 1, '2019-01-15 07:10:33', '2019-01-15 07:10:33'),
(3, 'Xiaomi', 'Best selling brand', 1, '2019-01-15 07:10:56', '2019-01-15 07:10:56'),
(4, 'Laravel', 'none', 1, '2019-01-15 07:11:07', '2019-01-16 07:31:01'),
(5, 'New Golden Furnishers Co.', 'indian comp', 1, '2019-01-16 07:35:22', '2019-01-16 07:35:22'),
(6, 'Topsun Enterprises', 'insia', 1, '2019-01-16 07:35:53', '2019-01-16 07:35:53'),
(7, 'Rex', 'Men\'s', 1, '2019-01-16 07:36:22', '2019-01-16 07:36:22'),
(8, 'Huda Beauty', 'cosmetics', 1, '2019-01-16 07:36:45', '2019-01-16 07:36:45');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_01_12_133627_create_admin_table', 1),
(4, '2019_01_14_035442_create_category_table', 1),
(5, '2019_01_14_124642_create_manufacturer_table', 1),
(6, '2019_01_14_161420_create_product_table', 2),
(7, '2019_01_16_152943_create_slider_table', 3),
(8, '2019_01_17_171622_add_top_product_to_product_table', 4),
(9, '2019_01_21_052122_create_customer_table', 5),
(10, '2019_01_21_061000_create_shipping_table', 6),
(11, '2019_01_22_183040_create_tbl_payment', 7),
(12, '2019_01_22_183208_create_tbl_order', 7),
(13, '2019_01_22_183317_create_tbl_order_details', 8),
(14, '2019_01_23_054550_create_tbl_social', 9),
(15, '2019_01_23_065354_add_phone_number_to_social_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `order_id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) NOT NULL,
  `shipping_id` int(11) NOT NULL,
  `payment_id` int(11) NOT NULL,
  `order_total` double(8,2) NOT NULL,
  `order_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'pending',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`order_id`, `customer_id`, `shipping_id`, `payment_id`, `order_total`, `order_status`, `created_at`, `updated_at`) VALUES
(1, 7, 15, 1, 9000.20, 'pending', '2019-01-22 20:01:38', '2019-01-22 20:01:38'),
(2, 10, 16, 2, 74600.00, 'pending', '2019-01-22 20:19:00', '2019-01-22 20:19:00'),
(3, 10, 16, 3, 179.15, 'pending', '2019-01-22 20:20:26', '2019-01-22 20:20:26'),
(4, 10, 16, 4, 1342.55, 'pending', '2019-01-22 20:22:25', '2019-01-22 20:22:25'),
(5, 10, 16, 5, 13175.00, 'pending', '2019-01-22 20:23:38', '2019-01-22 20:23:38'),
(6, 11, 17, 6, 15760.10, 'pending', '2019-01-23 04:19:06', '2019-01-23 04:19:06'),
(7, 7, 18, 7, 120800.00, 'pending', '2019-01-23 07:49:59', '2019-01-23 07:49:59'),
(8, 7, 18, 8, 152300.00, 'pending', '2019-01-23 09:49:17', '2019-01-23 09:49:17'),
(9, 8, 19, 9, 339248.30, 'pending', '2019-01-24 12:41:10', '2019-01-24 12:41:10'),
(10, 8, 19, 10, 94550.00, 'pending', '2019-01-24 12:51:33', '2019-01-24 12:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `order_details_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_quantity` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`order_details_id`, `order_id`, `product_id`, `product_name`, `product_price`, `product_quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 5, 'Kids Toys', 1800.00, 2, '2019-01-22 20:01:38', '2019-01-22 20:01:38'),
(2, 1, 3, 'Acer Aspireee', 1231.00, 4, '2019-01-22 20:01:38', '2019-01-22 20:01:38'),
(3, 2, 8, 'Acer Aspiree', 12500.00, 2, '2019-01-22 20:19:00', '2019-01-22 20:19:00'),
(4, 2, 9, 'Acer Aspire', 18500.00, 2, '2019-01-22 20:19:00', '2019-01-22 20:19:00'),
(5, 2, 5, 'Kids Toys', 1800.00, 5, '2019-01-22 20:19:00', '2019-01-22 20:19:00'),
(6, 3, 2, 'Acer Aspire', 123.00, 1, '2019-01-22 20:20:26', '2019-01-22 20:20:26'),
(7, 4, 3, 'Acer Aspireee', 1231.00, 1, '2019-01-22 20:22:25', '2019-01-22 20:22:25'),
(8, 5, 8, 'Acer Aspiree', 12500.00, 1, '2019-01-22 20:23:38', '2019-01-22 20:23:38'),
(9, 6, 3, 'Acer Aspireee', 1231.00, 2, '2019-01-23 04:19:06', '2019-01-23 04:19:06'),
(10, 6, 8, 'Acer Aspiree', 12500.00, 1, '2019-01-23 04:19:06', '2019-01-23 04:19:06'),
(11, 7, 8, 'Acer Aspiree', 12500.00, 2, '2019-01-23 07:49:59', '2019-01-23 07:49:59'),
(12, 7, 1, 'iPhone-X', 90000.00, 1, '2019-01-23 07:49:59', '2019-01-23 07:49:59'),
(13, 8, 1, 'iPhone-X', 90000.00, 1, '2019-01-23 09:49:17', '2019-01-23 09:49:17'),
(14, 8, 7, 'Acer Aspire', 55000.00, 1, '2019-01-23 09:49:17', '2019-01-23 09:49:17'),
(15, 9, 2, 'Acer Aspire', 123.00, 2, '2019-01-24 12:41:10', '2019-01-24 12:41:10'),
(16, 9, 7, 'Acer Aspire', 55000.00, 2, '2019-01-24 12:41:10', '2019-01-24 12:41:10'),
(17, 9, 5, 'Kids Toys', 1800.00, 1, '2019-01-24 12:41:10', '2019-01-24 12:41:10'),
(18, 9, 1, 'iPhone-X', 90000.00, 2, '2019-01-24 12:41:10', '2019-01-24 12:41:10'),
(19, 9, 8, 'Acer Aspiree', 12500.00, 1, '2019-01-24 12:41:11', '2019-01-24 12:41:11'),
(20, 9, 9, 'Acer Aspire', 18500.00, 1, '2019-01-24 12:41:11', '2019-01-24 12:41:11'),
(21, 10, 1, 'iPhone-X', 90000.00, 1, '2019-01-24 12:51:33', '2019-01-24 12:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payment`
--

CREATE TABLE `payment` (
  `payment_id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `payment_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment`
--

INSERT INTO `payment` (`payment_id`, `payment_type`, `payment_status`, `created_at`, `updated_at`) VALUES
(1, 'cashOnDelivery', 'pending', '2019-01-22 20:01:38', '2019-01-22 20:01:38'),
(2, 'cashOnDelivery', 'pending', '2019-01-22 20:19:00', '2019-01-22 20:19:00'),
(3, 'bkash', 'pending', '2019-01-22 20:20:26', '2019-01-22 20:20:26'),
(4, 'bkash', 'pending', '2019-01-22 20:22:24', '2019-01-22 20:22:24'),
(5, 'cashOnDelivery', 'pending', '2019-01-22 20:23:38', '2019-01-22 20:23:38'),
(6, 'cashOnDelivery', 'pending', '2019-01-23 04:19:06', '2019-01-23 04:19:06'),
(7, 'cashOnDelivery', 'pending', '2019-01-23 07:49:59', '2019-01-23 07:49:59'),
(8, 'cashOnDelivery', 'pending', '2019-01-23 09:49:17', '2019-01-23 09:49:17'),
(9, 'cashOnDelivery', 'pending', '2019-01-24 12:41:10', '2019-01-24 12:41:10'),
(10, 'paypal', 'pending', '2019-01-24 12:51:33', '2019-01-24 12:51:33');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(10) UNSIGNED NOT NULL,
  `product_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_category` int(11) NOT NULL,
  `product_manufacturer` int(11) NOT NULL,
  `product_short_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `product_price` double(8,2) NOT NULL,
  `product_color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_size` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `product_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` int(11) NOT NULL,
  `top_product` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `product_name`, `product_category`, `product_manufacturer`, `product_short_description`, `product_long_description`, `product_price`, `product_color`, `product_size`, `product_image`, `publicationStatus`, `top_product`, `created_at`, `updated_at`) VALUES
(1, 'iPhone-X', 3, 3, '<p>err_msg</p>', '<p>err_msg</p>', 90000.00, 'red', '6.2\'\'', '04zrjZSnBovJmBXpu6pK.jpg', 1, 1, '2019-01-15 14:13:43', '2019-01-23 08:01:28'),
(2, 'Acer Aspire', 2, 3, '<p>err_msg</p>', '<p>err_msg</p>', 123.00, 'red', 'XXL', '2REinUePnEXTrVzyDgzP.jpg', 1, 1, '2019-01-15 14:14:15', '2019-01-18 06:28:17'),
(3, 'Acer Aspireee', 2, 2, '<p>successweeee</p>', '<p>successeeeeeeeee</p>', 1231.00, 'redish', 'XL', '6bVLq1zz5Ns07sWrho4y.jpg', 1, 1, '2019-01-15 14:21:39', '2019-01-17 19:22:54'),
(4, 'Acer Aspire', 1, 2, '<p>asdasdc</p>', '<p>dwdqd</p>', 12.00, 'red', '123', 'c2vHKEF8qQJWytLzVNW5.jpg', 0, 0, '2019-01-15 14:23:50', '2019-01-18 06:28:31'),
(5, 'Kids Toys', 2, 5, '<h3>Product Description</h3>\r\n\r\n<p>A huge assortment of Toys is offered by us to customers in bulk. The offered Toys are available in the market in bulk and customers can avail these in various sizes. Toys are extensively demanded among the customers due to their supreme quality. We also customized these Toys as per the requirements of the customers.<br />\r\n&nbsp;</p>\r\n\r\n<ul>\r\n</ul>', '<p><strong>Specifications:</strong></p>\r\n\r\n<ul>\r\n	<li>Color: red/ white/ wine red/ black</li>\r\n	<li>Power: Battery</li>\r\n	<li>Material: Plastic</li>\r\n	<li>Plastic Type: PP</li>\r\n	<li>Style: Ride On Toy</li>\r\n	<li>Type: Car</li>\r\n</ul>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Features:</strong></p>\r\n\r\n<ul>\r\n	<li>Unmatched quality</li>\r\n	<li>High grade material</li>\r\n	<li>Thrifty prices</li>\r\n</ul>', 1800.00, 'red', NULL, 'HiGnw4lLfOji6BRnUXDz.jpg', 1, 0, '2019-01-16 07:38:54', '2019-01-16 07:38:54'),
(6, 'Huawei Y9', 3, 3, '<p>new phone</p>', '<p>i lost it&nbsp;</p>', 18000.00, 'blue', NULL, 'ZdxOvGbaLk2eHvj8klqO.jpg', 0, 1, '2019-01-16 14:23:32', '2019-01-17 19:28:33'),
(7, 'Acer Aspire', 3, 2, '<p>publicationStatus</p>', '<p>publicationStatus</p>', 55000.00, 'black', '14\'\'', '4TO3mglBfGVS2TmhEakd.jpg', 1, 1, '2019-01-17 17:53:26', '2019-01-23 07:49:14'),
(8, 'Acer Aspiree', 3, 3, '<p>new product</p>', '<p>Xiaomi Brand</p>', 12500.00, 'black', 'XXL', 'iE7hy452eukCVdIfU7Na.jpg', 1, 0, '2019-01-19 12:52:00', '2019-01-19 12:52:00'),
(9, 'Acer Aspire', 3, 2, '<p>$cat_id</p>', '<p>$cat_id</p>', 18500.00, NULL, NULL, 'Tc3HDr6TsjAXgSK3c17z.jpg', 1, 0, '2019-01-19 12:52:44', '2019-01-19 12:52:44');

-- --------------------------------------------------------

--
-- Table structure for table `shipping`
--

CREATE TABLE `shipping` (
  `shipping_id` int(10) UNSIGNED NOT NULL,
  `shipping_first_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_last_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_address` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_city` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `shipping_zip` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `shipping`
--

INSERT INTO `shipping` (`shipping_id`, `shipping_first_name`, `shipping_last_name`, `shipping_email`, `shipping_phone`, `shipping_address`, `shipping_city`, `shipping_zip`, `created_at`, `updated_at`) VALUES
(12, 'Abu', 'Rumman', 'hasnathrumman1234@gmail.com', '1634783946', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-22 16:19:49', '2019-01-22 16:19:49'),
(13, 'Abu', 'Rumman', 'hasnathrumman1234@gmail.com', '121312313', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-22 16:22:34', '2019-01-22 16:22:34'),
(14, 'Abu', 'Rumman', 'hasnathrumman1234@gmail.com', '1634783946', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-22 16:31:40', '2019-01-22 16:31:40'),
(15, 'Abu', 'Rumman', 'hasnathrumman1234@gmail.com', '1634783946', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-22 16:37:20', '2019-01-22 16:37:20'),
(16, 'Abu', 'Rumman', 'hasnathrumman1234@gmail.com', '1231312', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-22 20:07:54', '2019-01-22 20:07:54'),
(17, 'Abu', 'Rumman', 'hasnathrumman1234@gmail.com', '1634783946', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-23 04:17:13', '2019-01-23 04:17:13'),
(18, 'asd', 'ssd', 'hasnathrumman1234@gmail.com', '1231233', 'Matuail Molla Bridge,Demra,Dhaka', 'Dhaka', '1362', '2019-01-23 07:49:55', '2019-01-23 07:49:55'),
(19, 'Hassy', 'Rumm', 'rummanhasnath@gmail.com', '11222333000', 'Dhaka', 'Dhaka', '1234', '2019-01-24 12:41:07', '2019-01-24 12:41:07');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int(10) UNSIGNED NOT NULL,
  `slider_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slider_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `publicationStatus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `slider_name`, `slider_description`, `slider_image`, `publicationStatus`, `created_at`, `updated_at`) VALUES
(2, 'Cooler', '<p>One</p>', 'public/slider/044111ImgW.jpg', '0', '2019-01-17 04:41:11', '2019-01-17 04:48:01'),
(3, 'Cooler', '<p>asdc</p>', 'public/slider/044121canoon.jpg', '1', '2019-01-17 04:41:21', '2019-01-17 04:41:21'),
(4, 'AC', '<p>new</p>', 'public/slider/044732asyg.jpg', '1', '2019-01-17 04:47:32', '2019-01-17 04:47:32'),
(5, 'Mobile', '<p>phone</p>', 'public/slider/044753iphone-x-comparisons-01.jpg', '1', '2019-01-17 04:47:53', '2019-01-17 04:47:53');

-- --------------------------------------------------------

--
-- Table structure for table `social`
--

CREATE TABLE `social` (
  `social_id` int(10) UNSIGNED NOT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `twitter` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `google_plus` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `linkedIn` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pinterest` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `skype` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone_number` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `social`
--

INSERT INTO `social` (`social_id`, `facebook`, `instagram`, `youtube`, `twitter`, `google_plus`, `linkedIn`, `pinterest`, `skype`, `phone_number`, `email`, `created_at`, `updated_at`) VALUES
(1, 'https://www.facebook.com/Hassy008', 'https://www.instagram.com/hasnatrumman/', 'https://www.youtube.com/channel/UCnoC9-jrk0PhqNFiPxJUcYw?view_as=subscriber', 'https://twitter.com/hassy008', 'https://plus.google.com/', 'https://www.linkedin.com/in/hasnath-rumman-008/', 'https://www.pinterest.com/hasnatrumman/', 'hasnath rumman', '01711122223333', 'info@laraebiz.com', '2019-01-23 06:01:38', '2019-01-23 07:02:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `manufacturer`
--
ALTER TABLE `manufacturer`
  ADD PRIMARY KEY (`manufacturer_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_details_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shipping`
--
ALTER TABLE `shipping`
  ADD PRIMARY KEY (`shipping_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `social`
--
ALTER TABLE `social`
  ADD PRIMARY KEY (`social_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `manufacturer`
--
ALTER TABLE `manufacturer`
  MODIFY `manufacturer_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `order_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `order_details_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT for table `payment`
--
ALTER TABLE `payment`
  MODIFY `payment_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `shipping`
--
ALTER TABLE `shipping`
  MODIFY `shipping_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `social`
--
ALTER TABLE `social`
  MODIFY `social_id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
