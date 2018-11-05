-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 02, 2018 lúc 07:29 PM
-- Phiên bản máy phục vụ: 10.1.36-MariaDB
-- Phiên bản PHP: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_ecommerce`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `customer_id` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `status_id` int(10) DEFAULT NULL,
  `shipper_code` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `bill_id` int(10) NOT NULL,
  `product_id` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `bill_id`, `product_id`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(16, 13, 60, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(15, 13, 59, 1, 200000, '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(14, 12, 60, 2, 200000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(13, 12, 61, 1, 120000, '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_status`
--

CREATE TABLE `bill_status` (
  `id` int(10) NOT NULL,
  `bill_status_name` int(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `case_material`
--

CREATE TABLE `case_material` (
  `id` int(10) NOT NULL,
  `material_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(15, 'ê', 'Nữ', 'huongnguyen@gmail.com', 'e', 'e', 'e', '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(14, 'hhh', 'nam', 'huongnguyen@gmail.com', 'Lê thị riêng', '99999999999999999', 'k', '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(13, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '23456789', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 'Khoa phạm', 'Nam', 'khoapham@gmail.com', 'Lê thị riêng', '1234567890', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07'),
(11, 'Hương Hương', 'Nữ', 'huongnguyenak96@gmail.com', 'Lê Thị Riêng, Quận 1', '234567890-', 'không chú', '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`) VALUES
(1, 'Mùa trung thu năm nay, Hỷ Lâm Môn muốn gửi đến quý khách hàng sản phẩm mới xuất hiện lần đầu tiên tại Việt nam \"Bánh trung thu Bơ Sữa HongKong\".', 'Những ý tưởng dưới đây sẽ giúp bạn sắp xếp tủ quần áo trong phòng ngủ chật hẹp của mình một cách dễ dàng và hiệu quả nhất. ', 'sample1.jpg', '2017-03-11 06:20:23', '0000-00-00 00:00:00'),
(2, 'Tư vấn cải tạo phòng ngủ nhỏ sao cho thoải mái và thoáng mát', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'sample2.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(3, 'Đồ gỗ nội thất và nhu cầu, xu hướng sử dụng của người dùng', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'sample3.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(4, 'Hướng dẫn sử dụng bảo quản đồ gỗ, nội thất.', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'sample4.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00'),
(5, 'Phong cách mới trong sử dụng đồ gỗ nội thất gia đình', 'Đồ gỗ nội thất gia đình ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Phong cách sử dụng đồ gỗ hiện nay của các gia đình hầu h ', 'sample5.jpg', '2016-10-20 02:07:14', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `type_id` int(10) UNSIGNED DEFAULT NULL,
  `type_gender` tinyint(2) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `post` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `case_material_id` int(10) DEFAULT NULL,
  `strap_id` int(10) NOT NULL,
  `product_status_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `type_id`, `type_gender`, `description`, `unit_price`, `promotion_price`, `image`, `new`, `post`, `case_material_id`, `strap_id`, `product_status_id`, `created_at`, `updated_at`) VALUES
(1, 'Richard Mille RM 51-01 Tourbillon Tiger and	Dragon', 1, 0, 'Bánh crepe sầu riêng nhà làm', 900000, 850000, 'Richard Mille RM 51-01.jpg', 1, NULL, NULL, 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(2, 'Patek Philippe Grand Complications 6002G-001', 2, 0, '', 3000000, 2500000, 'Patek Philippe 6002G-001.jpg', 1, NULL, NULL, 0, 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00'),
(3, 'Hublot Big Bang King Power Gold Ceramic 48mm', 5, 0, '', 90000, 87000, 'Hublot Big Bang King.jpg', 1, NULL, NULL, 0, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(4, 'Rolex Cosmograph Daytona Rainbow 116595RBOW', 4, 0, '', 300000, 260000, 'Rolex Cosmograph Daytona.jpg', 1, NULL, NULL, 0, 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00'),
(5, 'Franck Muller Long Island 1002', 3, 0, '', 30000, 0, 'Franck Muller Long Island 1002.jpg', 1, NULL, NULL, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(6, 'Rolex Cosmograph Daytona 116500LN', 4, 0, '', 31000, 0, 'Rolex Cosmograph Daytona 116500LN.jpg', 1, NULL, NULL, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(7, 'Richard Mille RM 11-02 Flyback Chronograph Dual Time', 1, 0, '', 200000, 195000, 'ichard Mille Flyback Chronograph Dual Time Zone.jpg', 1, NULL, NULL, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00'),
(8, 'Patek Philippe Grand Complications 5074P-001', 2, 0, '', 645000, 0, 'Patek Philippe Grand Complications 5074P-001.jpg', 1, NULL, NULL, 0, 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_images`
--

CREATE TABLE `product_images` (
  `id` int(11) NOT NULL,
  `product_id` int(10) DEFAULT NULL,
  `name_image` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_status`
--

CREATE TABLE `product_status` (
  `id` int(10) NOT NULL,
  `product_status_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_types`
--

CREATE TABLE `product_types` (
  `id` int(10) UNSIGNED NOT NULL,
  `name_id` varchar(50) CHARACTER SET utf8 NOT NULL,
  `type` int(10) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_types`
--

INSERT INTO `product_types` (`id`, `name_id`, `type`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'richard-mille', 0, 'Richard Mille', '', 'richard-mille.jpg', NULL, NULL),
(2, 'patek-philippe', 0, 'Patek Philippe', '', 'patek-philippe.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'franck-muller', 0, 'Franck Muller', '', 'franck-muller.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'rolex', 0, 'Rolex', '', 'rolex-men.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'hublot', 0, 'Hublot', '', 'hublot-men.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'tissot', 0, 'Tissot', '', 'tissot-men.jpg', '2016-10-25 17:19:00', NULL),
(7, 'rolex', 1, 'Rolex', '', '', NULL, NULL),
(8, 'longines', 1, 'Longines', '', '', NULL, NULL),
(9, 'omega', 1, 'Omega', '', '', NULL, NULL),
(10, 'tissot', 1, 'Tissot', '', '', NULL, NULL),
(11, 'tag-heuer', 1, 'TAG Heuer', '', '', NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `name_id` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `description` varchar(100) NOT NULL,
  `link` varchar(100) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `name_id`, `name`, `description`, `link`, `image`) VALUES
(1, 'richard-mille', 'Richard Mille', 'Đỉnh cao của sự xa xỉ', '', '1.jpg'),
(2, 'hublot', 'Hublot', 'Đỉnh cao của sự xa xỉ', '', '2.jpg'),
(3, 'rolex', 'Rolex', 'Đỉnh cao của sự xa xỉ', '', '3.jpg'),
(4, 'patek-philippe', 'Patek Philippe', 'Đỉnh cao của sự xa xỉ', '', '4.jpg'),
(5, 'tissot', 'Tissot', 'Tuyệt tác của đồng hồ thụy sĩ', '', '5.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `strap_types`
--

CREATE TABLE `strap_types` (
  `id` int(10) NOT NULL,
  `strap_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`customer_id`),
  ADD KEY `FK_bill_status` (`status_id`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`product_id`);

--
-- Chỉ mục cho bảng `bill_status`
--
ALTER TABLE `bill_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `case_material`
--
ALTER TABLE `case_material`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`type_id`),
  ADD KEY `FK_strap_products` (`strap_id`),
  ADD KEY `FK_status_products` (`product_status_id`),
  ADD KEY `FK_material_products` (`case_material_id`);

--
-- Chỉ mục cho bảng `product_images`
--
ALTER TABLE `product_images`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_status`
--
ALTER TABLE `product_status`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `product_types`
--
ALTER TABLE `product_types`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_id` (`name_id`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name_id` (`name_id`);

--
-- Chỉ mục cho bảng `strap_types`
--
ALTER TABLE `strap_types`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `bill_status`
--
ALTER TABLE `bill_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `case_material`
--
ALTER TABLE `case_material`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `product_images`
--
ALTER TABLE `product_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_status`
--
ALTER TABLE `product_status`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_types`
--
ALTER TABLE `product_types`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `strap_types`
--
ALTER TABLE `strap_types`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_material_products` FOREIGN KEY (`case_material_id`) REFERENCES `case_material` (`id`),
  ADD CONSTRAINT `FK_status_products` FOREIGN KEY (`product_status_id`) REFERENCES `product_status` (`id`),
  ADD CONSTRAINT `FK_strap_products` FOREIGN KEY (`strap_id`) REFERENCES `strap_types` (`id`),
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`type_id`) REFERENCES `product_types` (`id`);

--
-- Các ràng buộc cho bảng `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `FK_product_slide` FOREIGN KEY (`name_id`) REFERENCES `product_types` (`name_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
