-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 27, 2018 lúc 10:37 AM
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 7.1.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `umobile`
--
CREATE DATABASE IF NOT EXISTS `umobile` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `umobile`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_tbl`
--

CREATE TABLE `admin_tbl` (
  `id` int(11) NOT NULL,
  `username` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `real_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_tbl`
--

INSERT INTO `admin_tbl` (`id`, `username`, `password`, `role`, `real_name`, `description`) VALUES
(1, 'lgkidz', 'c984aed014aec7623a54f0591da07a85fd4b762d', 'admin', 'Cao Đức Mạnh', 'Web Developer'),
(2, 'admin', 'd033e22ae348aeb5660fc2140aec35850c4da997', 'admin', 'Administrator', 'Administrator');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `brand_tbl`
--

CREATE TABLE `brand_tbl` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `brand_tbl`
--

INSERT INTO `brand_tbl` (`brand_id`, `brand_name`) VALUES
(1, 'Apple'),
(2, 'Samsung'),
(3, 'Sony'),
(4, 'Xiaomi'),
(5, 'Huawei');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `feedback_tb`
--

CREATE TABLE `feedback_tb` (
  `id` int(11) NOT NULL,
  `pen_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `member_tbl`
--

CREATE TABLE `member_tbl` (
  `member_id` int(11) NOT NULL,
  `first_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `locale` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ban` bit(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orderdetails_tbl`
--

CREATE TABLE `orderdetails_tbl` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `cut_off` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_tbl`
--

CREATE TABLE `order_tbl` (
  `order_id` int(11) NOT NULL,
  `created_date` datetime NOT NULL,
  `due_date` datetime NOT NULL,
  `member_id` int(11) NOT NULL,
  `status` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `customer_name` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `product_tbl`
--

CREATE TABLE `product_tbl` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` int(11) NOT NULL,
  `brand_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `description` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `color` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpu` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ram` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `internal` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `external` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `camera` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `battery` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `sim` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `product_tbl`
--

INSERT INTO `product_tbl` (`product_id`, `product_name`, `image`, `price`, `brand_id`, `quantity`, `description`, `color`, `cpu`, `ram`, `internal`, `external`, `camera`, `battery`, `sim`) VALUES
(3, 'Iphone X', '', 29990000, 1, 50, '', 'silver', 'Apple A11 Bionic 6 cores', '3 GB', '64 GB', 'không', '2 camera sau 12 MP, camera trước 7 MP', '2716 mAh Li-ion', '1 Nano SIM'),
(4, 'Iphone 8 Plus 64 GB', '', 23990000, 1, 50, '', 'silver,white,gold', 'Apple A11 Bionic 6 nhân', '3 GB', '64 GB', 'Không', '2 camera sau 12 MP, camera trước 7 MP', '2691 mAh', '1 Nano SIM'),
(5, 'Galaxy S9+ 64GB', '', 24990000, 2, 50, '', 'black,purple', 'Exynos 9810 8 nhân 64 bit', '6 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 400 GB', '2 camera sau 12 MP, camera trước 8 MP', '3500 mAh', '2 SIM Nano (SIM 2 chung khe thẻ nhớ)'),
(6, 'Galaxy S8 Plus', '', 17990000, 2, 50, '', 'black', 'Exynos 8895 8 nhân 64-bit', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '12 MP', '3500 mAh', '2 SIM Nano (SIM 2 chung khe thẻ nhớ)'),
(7, 'Xperaia XZ Premium', '', 16990000, 3, 50, '', 'black,silver', 'Qualcomm Snapdragon 835 8 nhân 64-bit', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '19 MP', '3230 mAh', '2 SIM Nano (SIM 2 chung khe thẻ nhớ)'),
(8, 'Xperia XZ1', '', 15990000, 3, 50, '', 'black,siver', 'Qualcomm Snapdragon 835 8 nhân 64-bit', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 256 GB', '19 MP', '2700 mAh', '2 Nano SIM'),
(9, 'Mi A1 64GB', '', 5490000, 4, 50, '', 'red,black', 'Snapdragon 625 8 nhân 64-bit', '4 GB', '64 GB', 'MicroSD, hỗ trợ tối đa 128 GB', '2 camera 12 MP', '3080 mAh', '2 SIM Nano (SIM 2 chung khe thẻ nhớ)'),
(10, 'Redmi Note 4', '', 4290000, 4, 50, '', 'silver,black,gold', 'Snapdragon 625 8 nhân 64-bit', '3 GB', '32 GB', 'MicroSD, hỗ trợ tối đa 128 GB', '13 MP', '4100 mAh', 'Nano SIM & Micro SIM (SIM 2 chung khe thẻ nhớ)');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin_tbl`
--
ALTER TABLE `admin_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `brand_tbl`
--
ALTER TABLE `brand_tbl`
  ADD PRIMARY KEY (`brand_id`);

--
-- Chỉ mục cho bảng `feedback_tb`
--
ALTER TABLE `feedback_tb`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `member_tbl`
--
ALTER TABLE `member_tbl`
  ADD PRIMARY KEY (`member_id`);

--
-- Chỉ mục cho bảng `orderdetails_tbl`
--
ALTER TABLE `orderdetails_tbl`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `member_id` (`member_id`);

--
-- Chỉ mục cho bảng `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `brand_id` (`brand_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin_tbl`
--
ALTER TABLE `admin_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `brand_tbl`
--
ALTER TABLE `brand_tbl`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `feedback_tb`
--
ALTER TABLE `feedback_tb`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `member_tbl`
--
ALTER TABLE `member_tbl`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `orderdetails_tbl`
--
ALTER TABLE `orderdetails_tbl`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_tbl`
--
ALTER TABLE `order_tbl`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orderdetails_tbl`
--
ALTER TABLE `orderdetails_tbl`
  ADD CONSTRAINT `orderdetails_tbl_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `order_tbl` (`order_id`),
  ADD CONSTRAINT `orderdetails_tbl_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `product_tbl` (`product_id`);

--
-- Các ràng buộc cho bảng `order_tbl`
--
ALTER TABLE `order_tbl`
  ADD CONSTRAINT `order_tbl_ibfk_1` FOREIGN KEY (`member_id`) REFERENCES `member_tbl` (`member_id`);

--
-- Các ràng buộc cho bảng `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD CONSTRAINT `product_tbl_ibfk_1` FOREIGN KEY (`brand_id`) REFERENCES `brand_tbl` (`brand_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
