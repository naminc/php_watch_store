-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 24, 2025 lúc 06:39 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `proxy-sell-metronic`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `countries`
--

CREATE TABLE `countries` (
  `id` int(11) NOT NULL,
  `code` varchar(10) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `countries`
--

INSERT INTO `countries` (`id`, `code`, `name`, `created_at`) VALUES
(4, 'vn', 'Việt Nam', '2025-06-22 10:40:41'),
(5, 'us', 'Hoa Kỳ', '2025-06-22 10:40:41'),
(6, 'gb', 'Anh', '2025-06-22 10:40:41'),
(7, 'jp', 'Nhật Bản', '2025-06-22 10:40:41'),
(8, 'kr', 'Hàn Quốc', '2025-06-22 10:40:41'),
(9, 'de', 'Đức', '2025-06-22 10:40:41'),
(10, 'fr', 'Pháp', '2025-06-22 10:40:41'),
(11, 'ru', 'Nga', '2025-06-22 10:40:41'),
(12, 'cn', 'Trung Quốc', '2025-06-22 10:40:41'),
(13, 'th', 'Thái Lan', '2025-06-22 10:40:41'),
(14, 'au', 'Úc', '2025-06-22 10:40:41'),
(15, 'ca', 'Canada', '2025-06-22 10:40:41'),
(16, 'in', 'Ấn Độ', '2025-06-22 10:40:41'),
(17, 'sg', 'Singapore', '2025-06-22 10:40:41'),
(18, 'my', 'Malaysia', '2025-06-22 10:40:41'),
(19, 'br', 'Brazil', '2025-06-22 10:40:41'),
(20, 'nl', 'Hà Lan', '2025-06-22 10:40:41'),
(21, 'se', 'Thụy Điển', '2025-06-22 10:40:41'),
(22, 'no', 'Na Uy', '2025-06-22 10:40:41'),
(23, 'it', 'Ý', '2025-06-22 10:40:41');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) DEFAULT NULL,
  `proxy_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `proxy_info` text DEFAULT NULL,
  `price` int(11) NOT NULL,
  `status` enum('pending','active','expired','canceled','renew_pending') DEFAULT 'pending',
  `expired_at` datetime DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `updated_at` datetime DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `country_id`, `proxy_id`, `quantity`, `proxy_info`, `price`, `status`, `expired_at`, `created_at`, `updated_at`) VALUES
(37, 1, 8, 3, 1, '1.1.1.11.1.1|naminc|naminc', 69000, 'active', '2025-09-21 17:59:29', '2025-06-23 17:59:29', '2025-06-23 18:16:59'),
(38, 1, 4, 2, 1, 'hjkhjkh', 48000, 'renew_pending', '2025-07-23 18:04:11', '2025-06-23 18:04:11', '2025-06-23 18:08:42'),
(39, 1, 4, 3, 1, 'sdfsdf', 69000, 'renew_pending', '2025-07-23 18:08:09', '2025-06-23 18:08:09', '2025-06-23 18:11:27'),
(40, 1, 5, 5, 1, '', 88888, 'pending', '2025-07-23 18:10:43', '2025-06-23 18:10:43', '2025-06-23 18:10:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proxies`
--

CREATE TABLE `proxies` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `protocol` varchar(50) DEFAULT NULL,
  `price` int(11) NOT NULL,
  `duration_days` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `proxies`
--

INSERT INTO `proxies` (`id`, `name`, `protocol`, `price`, `duration_days`, `created_at`) VALUES
(2, 'Proxy Private IPv4 (VN)', 'HTTP/SOCKS5', 48000, 30, '2025-06-22 10:12:46'),
(3, 'Proxy Private IPv4 (US)', 'HTTP/SOCKS5', 69000, 30, '2025-06-22 10:12:46'),
(5, 'Private IPv4 Speed', 'HTTP/SOCKS5', 88888, 30, '2025-06-22 10:12:46');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `proxy_country`
--

CREATE TABLE `proxy_country` (
  `id` int(11) NOT NULL,
  `proxy_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `proxy_country`
--

INSERT INTO `proxy_country` (`id`, `proxy_id`, `country_id`) VALUES
(17, 5, 5),
(18, 3, 4),
(20, 2, 4),
(21, 2, 5),
(22, 5, 6),
(23, 3, 8);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL CHECK (`id` = 1),
  `title` varchar(255) DEFAULT NULL,
  `domain` varchar(255) DEFAULT NULL,
  `owner` varchar(32) NOT NULL,
  `email` varchar(32) NOT NULL,
  `phone` varchar(32) NOT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `account_number` varchar(50) DEFAULT NULL,
  `account_username` varchar(100) DEFAULT NULL,
  `account_password` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `beneficiary_name` varchar(255) DEFAULT NULL,
  `min_amount` int(11) DEFAULT 10000,
  `notify` text NOT NULL,
  `maintenance` varchar(10) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `title`, `domain`, `owner`, `email`, `phone`, `logo`, `account_number`, `account_username`, `account_password`, `bank_name`, `beneficiary_name`, `min_amount`, `notify`, `maintenance`, `created_at`, `updated_at`) VALUES
(1, 'My Website', 'mywebsite.com', 'naminc', 'admin@naminc.dev', '0347101143', '/assets/media/app/mini-logo-circle-success.svg', '123232300', 'NAMINC', '$Nampwd404', 'MB BANK', 'NGO DINH NAM', 9000, '❌ Nghiêm cấm sử dụng PROXY và VPS vào mục đích trái pháp luật. Bạn sẽ phải chịu toàn bộ trách nhiệm! <br>\n✅ Hiện tại chỉ bán proxy US. Nếu cần proxy VN giá rẻ hãy liên hệ để mở thêm. <br>\n✅ Mua càng lâu giá càng rẻ!', 'off', '2025-06-22 07:00:25', '2025-06-24 03:34:30');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` varchar(255) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `amount` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `created_at` datetime DEFAULT current_timestamp(),
  `status` enum('success','skipped','failed') DEFAULT 'success'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `transactions`
--

INSERT INTO `transactions` (`id`, `transaction_id`, `user_id`, `amount`, `description`, `created_at`, `status`) VALUES
(1, 'FT25175055288068', 1, 10000, 'CUSTOMER naminc   Ma giao dich  Trace968611  Trace 968611', '2025-06-24 10:01:44', 'success'),
(2, 'FT25175659070566', 1, 20000, 'CUSTOMER naminc   Ma giao dich  Trace982636  Trace 982636', '2025-06-24 10:03:29', 'success'),
(3, 'FT25175908182196', 5, 30000, 'CUSTOMER lelele   Ma giao dich  Trace025995  Trace 025995', '2025-06-24 10:11:13', 'success'),
(4, 'FT25175530312470', 1, 20000, 'CUSTOMER naminc   Ma giao dich  Trace167887  Trace 167887', '2025-06-24 10:36:09', 'success'),
(5, 'FT25175830852082', 6, 50000, 'CUSTOMER namtest   Ma giao dich  Trace335250  Trace 335250', '2025-06-24 11:05:57', 'success');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `coin` int(11) NOT NULL DEFAULT 0,
  `coin_deposited` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `coin_used` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `role` enum('admin','user') NOT NULL DEFAULT 'user',
  `status` tinyint(1) NOT NULL DEFAULT 1,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `coin`, `coin_deposited`, `coin_used`, `role`, `status`, `ip_address`, `user_agent`, `created_at`, `updated_at`) VALUES
(1, 'naminc', '32cc598b6a4d2fb0d76afde08b54d378', 'admin@naminc.dev', 50000, 50000, 0, 'admin', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-22 07:56:54', '2025-06-24 03:36:09'),
(4, 'modalAddUserc', 'e4a413a0610b3ab1e535fdb840ef1d09', 'admin@naminc.devc', 0, 0, 0, 'admin', 1, NULL, NULL, '2025-06-23 02:54:40', '2025-06-23 02:55:32'),
(5, 'lelele', 'da83f24bfd9bd3178e3b2d16fee5842f', 'yuyfkuw@exelica.com', 30000, 30000, 0, 'user', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-23 02:56:52', '2025-06-24 03:11:13'),
(6, 'namtest', '4f66aa57e0ad647ed124b946ec44629f', 'inc006@xnaminc.com', 50000, 50000, 0, 'user', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/137.0.0.0 Safari/537.36', '2025-06-24 04:04:44', '2025-06-24 04:05:57');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `countries`
--
ALTER TABLE `countries`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `code` (`code`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_orders_proxy` (`proxy_id`),
  ADD KEY `fk_orders_user` (`user_id`),
  ADD KEY `fk_orders_country` (`country_id`);

--
-- Chỉ mục cho bảng `proxies`
--
ALTER TABLE `proxies`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `proxy_country`
--
ALTER TABLE `proxy_country`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proxy_id` (`proxy_id`),
  ADD KEY `country_id` (`country_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `transaction_id` (`transaction_id`),
  ADD KEY `fk_user_transaction` (`user_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `countries`
--
ALTER TABLE `countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `proxies`
--
ALTER TABLE `proxies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `proxy_country`
--
ALTER TABLE `proxy_country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT cho bảng `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_orders_country` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_proxy` FOREIGN KEY (`proxy_id`) REFERENCES `proxies` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_orders_user` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Các ràng buộc cho bảng `proxy_country`
--
ALTER TABLE `proxy_country`
  ADD CONSTRAINT `proxy_country_ibfk_1` FOREIGN KEY (`proxy_id`) REFERENCES `proxies` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `proxy_country_ibfk_2` FOREIGN KEY (`country_id`) REFERENCES `countries` (`id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `fk_user_transaction` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
