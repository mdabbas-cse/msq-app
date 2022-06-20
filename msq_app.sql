-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Jun 20, 2022 at 05:19 PM
-- Server version: 8.0.26
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `msq_app`
--

-- --------------------------------------------------------

--
-- Table structure for table `banks`
--

CREATE TABLE `banks` (
  `id` bigint UNSIGNED NOT NULL,
  `bank_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `account_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `issue_date` date DEFAULT NULL,
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `banks`
--

INSERT INTO `banks` (`id`, `bank_name`, `account_name`, `account_no`, `check_no`, `amount`, `description`, `issue_date`, `cost_status`, `created_at`, `updated_at`) VALUES
(2, NULL, NULL, 'cknsi', 'ckskk', 244.00, NULL, NULL, 1, '2022-06-06 00:10:39', '2022-06-06 00:10:39');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` bigint UNSIGNED NOT NULL,
  `collection_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'jumma, dan box, mashik bazar collection, akdh',
  `month` datetime NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `donations`
--

CREATE TABLE `donations` (
  `id` bigint UNSIGNED NOT NULL,
  `donar_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `month` datetime NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
-- Table structure for table `govment_n_non_govment_collections`
--

CREATE TABLE `govment_n_non_govment_collections` (
  `id` bigint UNSIGNED NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
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
(9, '2014_10_12_000000_create_users_table', 1),
(10, '2014_10_12_100000_create_password_resets_table', 1),
(11, '2019_08_19_000000_create_failed_jobs_table', 1),
(12, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(13, '2022_05_13_051536_create_banks_table', 2),
(14, '2022_05_13_052701_create_govment_n_non_govment_collections_table', 2),
(15, '2022_05_13_052820_create_donations_table', 2),
(16, '2022_05_13_052930_create_shop_n_house_rents_table', 2),
(17, '2022_05_13_053152_create_collections_table', 2),
(19, '2022_05_13_064312_create_miscellaneous_cost_categoies_table', 3),
(20, '2022_05_13_065209_create_miscellaneous_costs_table', 3),
(22, '2022_05_20_052224_create_salary_categories_table', 4),
(23, '2022_05_20_052332_create_salaries_table', 4);

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous_costs`
--

CREATE TABLE `miscellaneous_costs` (
  `id` bigint UNSIGNED NOT NULL,
  `miscellaneous_cost_category_id` int UNSIGNED NOT NULL,
  `month` datetime NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `miscellaneous_cost_categoies`
--

CREATE TABLE `miscellaneous_cost_categoies` (
  `id` bigint UNSIGNED NOT NULL,
  `category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('jannatulmaowa12125@gmail.com', 'KNDZRkIbG5QEAJjJO3xuV4mRAG37HJAqg5CjCX2kS4MXrt8eKZ1JkbhGWpbQ4Q0D', '2022-04-29 23:43:20'),
('jannatulmaowa12125@gmail.com', '8jinYZzGbmaNemx57gF8NYVZQV386i04OH0mrz4GMhAfzVg6IQObN6t3gYrX3k2p', '2022-04-29 23:45:00'),
('jannatulmaowa12125@gmail.com', 'i8qolhUJjZq5TMf97rE2rIkvZVOGdlUvqT5ZmpLvXTsT1ypYEvFMppKUrpAkGNQ0', '2022-04-29 23:45:41'),
('jannatulmaowa12125@gmail.com', 'HKYPQySF2w9ZZUxjhamVZJf3bAas90MMydu2n6LgXhJrT9qyFOPaf1QpwZeXCSHw', '2022-04-29 23:47:32'),
('jannatulmaowa12125@gmail.com', 'DfZR6WRwmgugEnBOSdbgauZtb9mIA16wkY4F8sRfcOMKZmAmQhnEZ7bnfbMJg9ca', '2022-04-29 23:49:38'),
('jannatulmaowa12125@gmail.com', 'zDHKjh3UOzR745W4YI2kpZoz9atZdHZKMEszPCenCpnxCIDDmvMFbvtzXRIS04xW', '2022-04-29 23:52:11'),
('jannatulmaowa12125@gmail.com', 'HUtQnkuP1M3S3TwVPwh0GokXvd0xEOLVCmmin5lYuidW4vpxOu7xwiIsFYhRXV57', '2022-04-29 23:52:34'),
('jannatulmaowa12125@gmail.com', 'WDkGebCnPJBQhpOfPs7HRriRY50hT5oiojQnJGdf1L335QjZYYmwk9YsVu9l5wFe', '2022-04-29 23:52:56'),
('jannatulmaowa12125@gmail.com', 'Qjc0vClc139dZxX480xfXWOUqHgh4M6zfLD8XdWQjSamk2KxxteOBpUBPyJZScbI', '2022-04-29 23:53:57'),
('jannatulmaowa12125@gmail.com', 'tAMjye2dZu9QYFU1b9133e71rJ0glgrPByuwlA4ggjayj6WYkdxAI0YLn2JJiV3P', '2022-04-29 23:58:54'),
('jannatulmaowa12125@gmail.com', 'v52MgTZ2ZB6X2RtgV4Ez5JDIX3sL4xHDbFFgEvUR583JJzgvCUSEdf6mXeQjpFIe', '2022-04-30 00:09:36'),
('jannatulmaowa12125@gmail.com', 'KmBLjDUEIRnqVDm82JTOQ633M2YXHVrb2kaxPd1miTjLaFmayJBNQhtV7E8Ki9YY', '2022-04-30 00:33:10');

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
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salaries`
--

CREATE TABLE `salaries` (
  `id` bigint UNSIGNED NOT NULL,
  `salary_category_id` int UNSIGNED NOT NULL,
  `month` datetime NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `salary_categories`
--

CREATE TABLE `salary_categories` (
  `id` bigint UNSIGNED NOT NULL,
  `salary_category_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `shop_n_house_rents`
--

CREATE TABLE `shop_n_house_rents` (
  `id` bigint UNSIGNED NOT NULL,
  `donar_name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mobile_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `house_no` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `month` datetime NOT NULL,
  `amount` double(9,2) NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue_date` date NOT NULL,
  `rent_category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT 'shop, house',
  `cost_status` tinyint(1) NOT NULL COMMENT '1:debit, 2:credit',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` tinyint(1) NOT NULL DEFAULT '2' COMMENT '1: admin, 2: user',
  `access_permissions` longtext COLLATE utf8mb4_unicode_ci,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `access_permissions`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mr. Oswaldo Frami II', 'gillian.grimes@example.net', 1, NULL, '2022-04-28 07:35:26', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', '8DE1PyEOMEzHDnOw0Ds3Vbm8khULH1k6hYY4hsqTGPfqucL9hc7EGSpWTi8E', '2022-04-28 07:35:26', '2022-04-28 07:35:26'),
(3, 'Bill Nicolas', 'jannatulmaowa12125@gmail.com', 2, NULL, '2022-04-29 21:59:35', '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', 'cgjIIwLgo8', '2022-04-29 21:59:35', '2022-04-29 21:59:35');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banks`
--
ALTER TABLE `banks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `donations`
--
ALTER TABLE `donations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `govment_n_non_govment_collections`
--
ALTER TABLE `govment_n_non_govment_collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous_costs`
--
ALTER TABLE `miscellaneous_costs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `miscellaneous_cost_categoies`
--
ALTER TABLE `miscellaneous_cost_categoies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `salaries`
--
ALTER TABLE `salaries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `salary_categories`
--
ALTER TABLE `salary_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `shop_n_house_rents`
--
ALTER TABLE `shop_n_house_rents`
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
-- AUTO_INCREMENT for table `banks`
--
ALTER TABLE `banks`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `donations`
--
ALTER TABLE `donations`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `govment_n_non_govment_collections`
--
ALTER TABLE `govment_n_non_govment_collections`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `miscellaneous_costs`
--
ALTER TABLE `miscellaneous_costs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `miscellaneous_cost_categoies`
--
ALTER TABLE `miscellaneous_cost_categoies`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salaries`
--
ALTER TABLE `salaries`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `salary_categories`
--
ALTER TABLE `salary_categories`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `shop_n_house_rents`
--
ALTER TABLE `shop_n_house_rents`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
