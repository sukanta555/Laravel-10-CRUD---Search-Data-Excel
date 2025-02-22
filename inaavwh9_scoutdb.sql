-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 22, 2025 at 10:32 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.1.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laravel_products`
--

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(6, '2014_10_12_000000_create_users_table', 1),
(7, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(8, '2019_08_19_000000_create_failed_jobs_table', 1),
(9, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(10, '2025_02_19_054009_create_products_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
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
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `detail` text NOT NULL,
  `featured_image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `name`, `detail`, `featured_image`, `created_at`, `updated_at`) VALUES
(1, 'Laravel 10 CRUD', 'Today, I will let you know an example of laravel 10 crud operation example. Here you will learn to build a laravel 10 crud application. We will use laravel 10 crud application for beginners. It\'s a simple example of how to create a crud in laravel 10. Alright, let’s dive into the steps.', 'uploads/Fvqb6UXEEfxSH2xU81Tq1SpZtL9aTxgPNAT0v60W.jpg', '2025-02-19 02:53:51', '2025-02-19 06:00:37'),
(2, 'Laravel 10 CRUD and Image Upload', 'Laravel 10 is the latest version of Laravel, released in 2023. It comes with several new features and improvements, such as support for PHP 8.1, enhanced security features, and performance optimizations.', 'uploads/StASdu4N8FRVJDbfX8SAwoc8wg9hywvrVFP0TF2K.jpg', '2025-02-19 03:07:27', '2025-02-19 06:03:18'),
(3, 'Resource route for product crud application', 'we will create a product crud application using laravel 10. we will create a products table with name and detail columns using laravel 10 migration, then we will create routes, controller, view, and model files for the product module. we will use bootstrap 5 for design now. so let\'s follow the below step to create a crud operation with laravel 10.', 'uploads/YSoWnR3v7tiiShmyG235lXbihkhTfCCgXZdd52I8.jpg', '2025-02-19 04:07:29', '2025-02-19 06:00:28'),
(4, 'Laravel Framework', 'New Password Confirmation Flow for Logged In Users in Laravel 6.2\r\nhttps://laravel-news.com/new-password-confirmation-in-laravel-6-2', 'uploads/hTcoplQF9em8ZcWlTE7Tc5ID3b3rbY2XYyfVQolE.jpg', '2025-02-19 06:02:27', '2025-02-19 06:02:27'),
(5, 'Laravel 10: How to Download an Excel File One by One', 'If you want to download individual Excel files for each record, follow these steps:\r\ncomposer require maatwebsite/excel', 'uploads/K1nk5a1SgJfS0rxcMVfsRE4N81XItvAVFx1o9sIw.jpg', '2025-02-22 00:56:14', '2025-02-22 00:56:41'),
(6, 'Laravel 10: How to Download Full Data as an Excel File', 'Run the following command to generate an Excel export class:\r\nphp artisan make:export ProductsExport --model=Product', 'uploads/nXlKod8zNJV82kBP18yksV70GqKBRjkwN9vDY9uV.jpg', '2025-02-22 01:00:05', '2025-02-22 01:00:05'),
(7, 'Search Data Using a Submit Button', 'If you want to search data in Laravel 10 when clicking a Submit button, follow these steps:\r\n<form action=\"{{ route(\'products.index\') }}\" method=\"GET\" class=\"mb-3\">\r\n    <div class=\"input-group\">\r\n        <input type=\"text\" name=\"search\" class=\"form-control\" placeholder=\"Search products...\" value=\"{{ request()->query(\'search\') }}\">\r\n        <button type=\"submit\" class=\"btn btn-primary\">Search</button>\r\n    </div>\r\n</form>', 'uploads/7nQH9rtfPRrNFqZwzvKyDr2TlDOoJc8OYlwFcxxX.jpg', '2025-02-22 01:34:16', '2025-02-22 01:36:02');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

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
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

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
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
