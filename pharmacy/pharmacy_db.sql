-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 10, 2021 at 07:20 AM
-- Server version: 10.4.16-MariaDB
-- PHP Version: 7.3.24

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharmacy_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) NOT NULL,
  `nanager_acc` tinyint(4) DEFAULT NULL,
  `moderator_acc` tinyint(4) DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `name`, `type`, `mobile`, `email`, `email_verified_at`, `password`, `image`, `status`, `nanager_acc`, `moderator_acc`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Md Kamal Hossain', 'Super Admin', '+880186354', 'superadmin@gmail.com', NULL, '$2y$10$MP4EnT1rZ7apI60.WHf3qe.faaC3wedpkpp8XI14l/ILbBLd0a9zi', '', 1, 1, 1, NULL, NULL, '2021-03-07 09:45:38'),
(2, 'Md Razu Khan', 'Manager', '01994876', 'manager@gmail.com', NULL, '$2y$10$MP4EnT1rZ7apI60.WHf3qe.faaC3wedpkpp8XI14l/ILbBLd0a9zi', '57160.png', 1, 0, 1, NULL, '2021-02-02 09:31:03', '2021-03-07 09:45:41'),
(3, 'Md Siam Khan', 'Moderator', NULL, 'moderator@gmail.com', NULL, '$2y$10$n8pSrGpQey/fjuHHZMxnzuufXRdP5A3X6XqrpMKFyNpAowZ/9G4Um', NULL, 1, 0, 0, NULL, '2021-02-02 09:32:32', '2021-02-02 09:32:32');

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `brand_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `category_id`, `brand_name`, `created_at`, `updated_at`) VALUES
(1, '1', 'Paracitamal', '2021-03-09 00:24:04', '2021-03-09 00:24:04'),
(2, '2', 'Paracitamal', '2021-03-09 00:24:21', '2021-03-09 00:24:21');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Tablet', '2021-03-09 00:22:05', '2021-03-09 00:22:05'),
(2, 'Syrap', '2021-03-09 00:22:19', '2021-03-09 00:22:19'),
(3, 'Suspensition', '2021-03-09 00:22:34', '2021-03-09 00:22:34'),
(4, 'Capsoul', '2021-03-09 00:22:52', '2021-03-09 00:22:52'),
(5, 'Injection', '2021-03-09 00:23:04', '2021-03-09 00:23:04'),
(6, 'Drop', '2021-03-09 00:23:21', '2021-03-09 00:23:21'),
(7, 'Ointment', '2021-03-09 00:23:37', '2021-03-09 00:23:37');

-- --------------------------------------------------------

--
-- Table structure for table `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Beximco', '2021-03-09 00:21:49', '2021-03-09 00:21:49');

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `email`, `mobile`, `address`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 'Ikram Khan', NULL, '+8856732784', 'Mirpur,Dhaak', NULL, '2021-03-09 01:22:58', '2021-03-09 01:22:58'),
(2, 'regular customer', 'regular@gmail.com', '+8884534547', 'regular', 1, '2021-03-09 23:04:43', '2021-03-09 23:04:43');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `invoices`
--

CREATE TABLE `invoices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` date NOT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_by` int(11) NOT NULL,
  `approved_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoices`
--

INSERT INTO `invoices` (`id`, `invoice_no`, `date`, `description`, `status`, `created_by`, `approved_by`, `created_at`, `updated_at`) VALUES
(1, '2', '2021-03-09', NULL, 1, 1, 1, '2021-03-09 15:17:11', '2021-03-09 15:18:57'),
(2, '3', '2021-03-09', NULL, 1, 1, 1, '2021-03-09 15:24:51', '2021-03-09 15:25:06'),
(3, '4', '2021-03-09', NULL, 1, 1, 1, '2021-03-09 15:28:19', '2021-03-09 15:28:47'),
(4, '5', '2021-03-09', NULL, 1, 1, 1, '2021-03-09 15:31:06', '2021-03-09 15:31:13'),
(5, '6', '2021-03-09', NULL, 0, 1, NULL, '2021-03-09 15:54:23', '2021-03-09 15:54:23'),
(6, '7', '2010-05-03', NULL, 0, 1, NULL, '2021-03-09 23:50:18', '2021-03-09 23:50:18'),
(7, '8', '2021-03-10', NULL, 1, 1, 1, '2021-03-09 23:52:41', '2021-03-09 23:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `invoice_details`
--

CREATE TABLE `invoice_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `invoice_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  `selling_qty` int(11) NOT NULL,
  `unit_price` int(11) NOT NULL,
  `selling_price` int(11) NOT NULL,
  `status` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `invoice_details`
--

INSERT INTO `invoice_details` (`id`, `date`, `invoice_id`, `company_id`, `category_id`, `brand_id`, `product_id`, `selling_qty`, `unit_price`, `selling_price`, `status`, `created_at`, `updated_at`) VALUES
(1, '2021-03-09', 1, 1, 2, 2, 2, 3, 120, 360, 1, '2021-03-09 15:17:11', '2021-03-09 15:18:57'),
(2, '2021-03-09', 2, 1, 1, 1, 1, 5, 15, 75, 1, '2021-03-09 15:24:51', '2021-03-09 15:25:06'),
(3, '2021-03-09', 3, 1, 1, 1, 1, 10, 12, 120, 1, '2021-03-09 15:28:19', '2021-03-09 15:28:47'),
(4, '2021-03-09', 4, 1, 1, 1, 1, 5, 15, 75, 1, '2021-03-09 15:31:06', '2021-03-09 15:31:13'),
(5, '2021-03-09', 5, 1, 1, 1, 1, 5, 15, 75, 0, '2021-03-09 15:54:23', '2021-03-09 15:54:23'),
(6, '2010-05-03', 6, 1, 1, 1, 1, 5, 25, 125, 0, '2021-03-09 23:50:18', '2021-03-09 23:50:18'),
(7, '2021-03-10', 7, 1, 1, 1, 1, 10, 25, 250, 1, '2021-03-09 23:52:41', '2021-03-09 23:52:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2020_06_11_103506_create_admins_table', 2),
(5, '2020_12_12_020355_create_suppliers_table', 3),
(6, '2020_12_12_052314_create_customers_table', 4),
(7, '2020_12_12_113947_create_units_table', 5),
(8, '2020_12_12_121726_create_categories_table', 6),
(9, '2020_12_14_015351_create_products_table', 7),
(12, '2020_12_14_094443_create_purchases_table', 8),
(13, '2021_01_23_051412_create_invoices_table', 8),
(14, '2021_01_23_051639_create_invoice_details_table', 8),
(15, '2021_01_23_051800_create_payments_table', 8),
(16, '2021_01_23_051841_create_payment_details_table', 8),
(17, '2021_02_25_070924_create_brands_table', 9),
(18, '2021_03_02_024943_create_companies_table', 10);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `paid_status` varchar(51) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `paid_amount` double DEFAULT NULL,
  `due_amount` double DEFAULT NULL,
  `buy_total` int(11) DEFAULT NULL,
  `total` double DEFAULT NULL,
  `discount_amount` double DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`id`, `invoice_id`, `customer_id`, `paid_status`, `paid_amount`, `due_amount`, `buy_total`, `total`, `discount_amount`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'full_paid', 360, 0, 300, 360, NULL, '2021-03-09 15:17:11', '2021-03-09 15:17:11'),
(2, 2, 1, 'full_paid', 75, 0, 50, 75, NULL, '2021-03-09 15:24:51', '2021-03-09 15:24:51'),
(3, 3, 1, 'full_paid', 120, 0, 100, 120, NULL, '2021-03-09 15:28:19', '2021-03-09 15:28:19'),
(4, 4, 1, 'full_paid', 75, 0, 50, 75, NULL, '2021-03-09 15:31:06', '2021-03-09 15:31:06'),
(5, 5, 1, 'full_paid', 75, 0, 50, 75, NULL, '2021-03-09 15:54:23', '2021-03-09 15:54:23'),
(6, 6, 2, 'full_paid', 125, 0, 50, 125, NULL, '2021-03-09 23:50:18', '2021-03-09 23:50:18'),
(7, 7, 2, 'full_paid', 225, 0, 100, 225, 25, '2021-03-09 23:52:41', '2021-03-09 23:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `payment_details`
--

CREATE TABLE `payment_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `current_paid_amount` double DEFAULT NULL,
  `date` date DEFAULT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payment_details`
--

INSERT INTO `payment_details` (`id`, `invoice_id`, `current_paid_amount`, `date`, `updated_by`, `created_at`, `updated_at`) VALUES
(1, 1, 360, '2021-03-09', NULL, '2021-03-09 15:17:11', '2021-03-09 15:17:11'),
(2, 2, 75, '2021-03-09', NULL, '2021-03-09 15:24:51', '2021-03-09 15:24:51'),
(3, 3, 120, '2021-03-09', NULL, '2021-03-09 15:28:19', '2021-03-09 15:28:19'),
(4, 4, 75, '2021-03-09', NULL, '2021-03-09 15:31:06', '2021-03-09 15:31:06'),
(5, 5, 75, '2021-03-09', NULL, '2021-03-09 15:54:23', '2021-03-09 15:54:23'),
(6, 6, 125, '2010-05-03', NULL, '2021-03-09 23:50:18', '2021-03-09 23:50:18'),
(7, 7, 225, '2021-03-10', NULL, '2021-03-09 23:52:41', '2021-03-09 23:52:41');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` int(11) NOT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `unit_id` int(11) DEFAULT NULL,
  `category_id` int(11) DEFAULT NULL,
  `company_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `quantity` double NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `user_id`, `supplier_id`, `unit_id`, `category_id`, `company_id`, `brand_id`, `product_name`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, 1, 'Napa', 175, '2021-03-09 00:26:40', '2021-03-09 23:52:52'),
(2, 1, 1, 3, 2, 1, 2, 'Napa', 35, '2021-03-09 00:27:14', '2021-03-09 23:35:03'),
(3, 1, 1, 3, 2, 1, 2, 'napa syerap', 0, '2021-03-09 23:08:06', '2021-03-09 23:08:06');

-- --------------------------------------------------------

--
-- Table structure for table `purchases`
--

CREATE TABLE `purchases` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `supplier_id` int(11) NOT NULL,
  `company_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `purchase_date` date DEFAULT NULL,
  `date` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ex_date` date DEFAULT NULL,
  `description` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `buying_qty` double NOT NULL,
  `unit_price` double NOT NULL,
  `buying_price` double NOT NULL,
  `user_id` int(11) NOT NULL,
  `purchase_no` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0 COMMENT '0=Pending,1=Approved',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `purchases`
--

INSERT INTO `purchases` (`id`, `supplier_id`, `company_id`, `category_id`, `brand_id`, `product_id`, `purchase_date`, `date`, `ex_date`, `description`, `buying_qty`, `unit_price`, `buying_price`, `user_id`, `purchase_no`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, 1, 1, NULL, '2021-03-01', '2021-05-31', 'napa tablet', 200, 10, 2000, 1, '1', 1, '2021-03-09 13:22:25', '2021-03-09 13:22:25'),
(2, 1, 1, 2, 2, 2, NULL, '2021-03-01', '2021-05-31', 'napa syrap', 20, 100, 2000, 1, '1', 1, '2021-03-09 13:22:25', '2021-03-09 13:22:25'),
(3, 1, 1, 2, 2, 2, '2021-03-01', '2020-07-14', '2021-03-31', 'napa', 20, 1, 20, 1, '4', 1, '2021-03-09 23:34:12', '2021-03-09 23:34:12'),
(4, 1, 1, 1, 1, 1, '2021-03-01', '2020-12-01', '2021-03-09', 'napa tablet', 10, 20, 200, 1, '5', 1, '2021-03-09 23:43:09', '2021-03-09 23:43:09');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`id`, `name`, `email`, `mobile`, `address`, `created_at`, `updated_at`) VALUES
(1, 'Md Jule Ahmed', 'jule@gmail.com', '+8801674884', 'Samoly,Dhaka', '2021-03-09 00:19:28', '2021-03-09 00:19:28');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE `units` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, '1gm', '2021-03-09 00:25:10', '2021-03-09 00:25:10'),
(2, '5mg', '2021-03-09 00:25:24', '2021-03-09 00:25:24'),
(3, '2ml', '2021-03-09 00:25:39', '2021-03-09 00:25:39'),
(4, '500mg', '2021-03-09 00:25:55', '2021-03-09 00:25:55');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoices`
--
ALTER TABLE `invoices`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `invoice_details`
--
ALTER TABLE `invoice_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `payment_details`
--
ALTER TABLE `payment_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `purchases`
--
ALTER TABLE `purchases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `units`
--
ALTER TABLE `units`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `invoices`
--
ALTER TABLE `invoices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `invoice_details`
--
ALTER TABLE `invoice_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `payment_details`
--
ALTER TABLE `payment_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `purchases`
--
ALTER TABLE `purchases`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `units`
--
ALTER TABLE `units`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
