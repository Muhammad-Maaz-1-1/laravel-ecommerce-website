-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2024 at 02:53 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ecommerce`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_models`
--

CREATE TABLE `blog_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cart_models`
--

CREATE TABLE `cart_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `product_id` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cart_models`
--

INSERT INTO `cart_models` (`id`, `name`, `price`, `product_id`, `created_at`, `updated_at`) VALUES
(1, 'Aliquam lobortis set', 88.00, 2.00, '2024-02-02 10:34:09', '2024-02-02 10:34:09');

-- --------------------------------------------------------

--
-- Table structure for table `category_models`
--

CREATE TABLE `category_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoryName` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category_models`
--

INSERT INTO `category_models` (`id`, `categoryName`, `created_at`, `updated_at`) VALUES
(1, 'Men', '2024-01-29 01:14:07', '2024-01-29 01:14:07'),
(2, 'Women', '2024-01-29 01:14:13', '2024-01-29 01:14:13'),
(3, 'Accessories', '2024-01-29 01:14:19', '2024-01-29 01:14:19'),
(4, 'Sunglass', '2024-01-29 01:14:25', '2024-01-29 01:14:25'),
(5, 'Watch', '2024-01-29 01:14:33', '2024-01-29 01:14:33');

-- --------------------------------------------------------

--
-- Table structure for table `comment_models`
--

CREATE TABLE `comment_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `complete_order_models`
--

CREATE TABLE `complete_order_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` varchar(255) NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `final_price` varchar(255) NOT NULL,
  `quantity` varchar(255) NOT NULL,
  `payment_id` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `complete_order_models`
--

INSERT INTO `complete_order_models` (`id`, `user_id`, `product_id`, `final_price`, `quantity`, `payment_id`, `created_at`, `updated_at`) VALUES
(1, '1', '2', '90,20', '26', 'ch_3OoLlnDZ1gtqmfNM3Iwyu2Yz', '2024-02-27 03:12:11', '2024-02-27 03:12:11'),
(2, '1', '14', '8,76', '1', 'ch_3OoLlnDZ1gtqmfNM3Iwyu2Yz', '2024-02-27 03:12:11', '2024-02-27 03:12:11');

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
-- Table structure for table `gallery_models`
--

CREATE TABLE `gallery_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` varchar(255) NOT NULL,
  `gallery_image` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery_models`
--

INSERT INTO `gallery_models` (`id`, `product_id`, `gallery_image`, `created_at`, `updated_at`) VALUES
(1, '2', '17971707502178.skateboard-trick-min.jpg', '2024-02-09 13:09:38', '2024-02-09 13:09:38'),
(2, '3', '73271707502205.negative-space-skateboarding-900x600-min.jpg', '2024-02-09 13:10:05', '2024-02-09 13:10:05'),
(3, '2', '7771707502580.size chart.PNG', '2024-02-09 13:16:20', '2024-02-09 13:16:20'),
(4, '2', '46911707502580.adrien-vajas-6rPugl6sVmY-unsplash-scaled-qj5wtrc77468wjugjiitpmrgbja456hk39p3f1yjjw.jpg', '2024-02-09 13:16:20', '2024-02-09 13:16:20');

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
(9, '2024_01_25_152242_name--table=product_model', 2),
(10, '2014_10_12_000000_create_users_table', 3),
(11, '2014_10_12_100000_create_password_reset_tokens_table', 3),
(12, '2019_08_19_000000_create_failed_jobs_table', 3),
(13, '2019_12_14_000001_create_personal_access_tokens_table', 3),
(14, '2024_01_25_141513_create_category_models_table', 3),
(15, '2024_01_25_141532_create_product_models_table', 3),
(16, '2024_01_25_141552_create_comment_models_table', 3),
(17, '2024_01_25_141619_create_blog_models_table', 3),
(18, '2024_02_01_160036_create_cart_models_table', 4),
(22, '2024_02_02_152920_create_carts_table', 5),
(23, '2024_02_08_153848_create_gallery_models_table', 6),
(24, '2024_02_27_073831_create_complete_order_models_table', 7);

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
-- Table structure for table `product_models`
--

CREATE TABLE `product_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL,
  `is_for` varchar(20) DEFAULT NULL,
  `category_id` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `product_models`
--

INSERT INTO `product_models` (`id`, `name`, `image`, `price`, `is_for`, `category_id`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Arqam Ali', '26211706539003.product-6.webp', '500', 'men', '1', 'dewadewaewqeqwe', '2024-01-29 01:15:54', '2024-01-29 01:15:54'),
(2, 'Aliquam lobortis set', '26211706539003.product-6.webp', '88.00', 'men', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:36:44', '2024-01-29 09:36:44'),
(3, 'Aliquam lobortis set', '55971706539264.product-9.webp', '88', 'men', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:41:04', '2024-01-29 09:41:04'),
(4, 'Aliquam lobortis set', '32611706539288.product-2.webp', '88', 'women', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:41:28', '2024-01-29 09:41:28'),
(5, 'Aliquam lobortis set', '23201706539321.product-13.webp', '99', 'women', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:42:01', '2024-01-29 09:42:01'),
(6, 'Aliquam lobortis set', '94931706539342.product-2.webp', '66', 'women', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:42:23', '2024-01-29 09:42:23'),
(7, 'lobortis set Aliquam', '32161706539360.product-13.webp', '55', 'women', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:42:40', '2024-01-29 09:42:40'),
(8, 'set Aliquam lobortis', '30801706539385.product-2.webp', '22', 'women', '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 09:43:05', '2024-01-29 09:43:05'),
(9, 'Aliquam lobortis set', '58001706542206.kids.webp', '33', NULL, '2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 10:30:06', '2024-01-29 10:30:06'),
(11, 'Dark Wost Polarised Sunglasses for Unisex', '72421706542739.51OQ3sPBAsL._AC_UY1100_.jpg', '33', 'men', '4', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 10:38:59', '2024-01-29 10:38:59'),
(12, 'Zero Terra Fit Smart Watch', '92391706542831.download (4).jpg', '112', 'men', '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-29 10:40:31', '2024-01-29 10:40:31'),
(13, 'Simple products', '42501706628983.1 (1).webp', '789', 'men', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-30 10:36:23', '2024-01-30 10:36:23'),
(14, 'Simple products for Mens', '43281706629005.2.webp', '876', 'men', '1', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-30 10:36:45', '2024-01-30 10:36:45'),
(15, 'Simple Watch', '64551706629073.1 (2).webp', '111', 'men', '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-30 10:37:53', '2024-01-30 10:37:53'),
(16, 'Watch for men', '3201706629118.5.webp', '999', 'men', '5', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nam fringilla augue nec est tristique auctor. Donec non est at libero vulputate rutrum. Morbi ornare lectus quis justo gravida semper. Nulla tellus mi, vulputate adipiscing cursus eu, suscipit id', '2024-01-30 10:38:38', '2024-01-30 10:38:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(99) DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'MaAZ SOHAIL', 'maaz.sohail.ostech@gmail.com', 'user', NULL, '$2y$12$gmJDARxU70tSJNBBGZrqAuTU18z7wN5mocZOibID5j1qNrBsgrLjG', NULL, '2024-02-01 10:35:23', '2024-02-01 10:35:23'),
(4, 'admin', 'admin@gmail.com', 'admin', NULL, '$2y$12$LnHuE26qBfIEmeM1fzcOCeNrh4nMW4HgOoQA2j4U6m5PrVUmcwRvu', NULL, NULL, NULL),
(5, 'arqam', 'arqamali329@gmail.com', 'user', NULL, '$2y$12$g2D1D5kgcjiUU4jxGjbDKuXwjTGqUBraFx1uq4RW9svRdc09eNPg6', NULL, '2024-02-29 02:13:38', '2024-02-29 02:13:38'),
(6, 'zubair', 'zubair@gmail.com', 'admin', NULL, '$2y$12$UXsHkxvZLqxaIvHTao9dW.DzQ2fXfPH9pMa.CZLiLYJlqH24O1oTq', NULL, '2024-02-29 02:22:25', '2024-02-29 02:22:25'),
(7, 'faizan', 'faizan@gmail.com', 'admin', NULL, '$2y$12$.DHr395pWDHPgpn0TMGu2.SzHo8r.DdSE5bFpJ55FsIle92lLJlU6', NULL, '2024-03-04 08:27:01', '2024-03-04 08:27:01');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_models`
--
ALTER TABLE `blog_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart_models`
--
ALTER TABLE `cart_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_models`
--
ALTER TABLE `category_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comment_models`
--
ALTER TABLE `comment_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `complete_order_models`
--
ALTER TABLE `complete_order_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `gallery_models`
--
ALTER TABLE `gallery_models`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `product_models`
--
ALTER TABLE `product_models`
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
-- AUTO_INCREMENT for table `blog_models`
--
ALTER TABLE `blog_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `cart_models`
--
ALTER TABLE `cart_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `category_models`
--
ALTER TABLE `category_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comment_models`
--
ALTER TABLE `comment_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `complete_order_models`
--
ALTER TABLE `complete_order_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gallery_models`
--
ALTER TABLE `gallery_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `product_models`
--
ALTER TABLE `product_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
