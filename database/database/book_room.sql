-- phpMyAdmin SQL Dump
-- version 4.6.5.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th6 01, 2017 lúc 10:48 SA
-- Phiên bản máy phục vụ: 10.1.21-MariaDB
-- Phiên bản PHP: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `book_room`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `start` datetime NOT NULL,
  `end` datetime NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `email` text COLLATE utf8_unicode_ci,
  `color` varchar(50) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `events`
--

INSERT INTO `events` (`id`, `title`, `start`, `end`, `group_id`, `room_id`, `user_id`, `email`, `color`) VALUES
(1, 'CV', '2016-12-23 16:00:00', '2016-12-23 16:40:00', 3, 1, 6, 'bontd01@gmail.com', '3a87ad'),
(2, 'CV', '2016-12-23 16:00:00', '2016-12-23 16:31:00', 3, 2, 6, 'bontd01@gmail.com', '3a87ad'),
(3, 'SV-MỚI RA TRƯỜNG', '2016-12-23 17:00:00', '2016-12-23 17:20:00', 3, 1, 6, 'admin@gmail.com', '3a87ad'),
(4, 'bontd', '2017-03-06 15:08:00', '2017-03-06 16:00:00', 1, 5, 6, 'bontd01@gmail.com', 'ff0000'),
(5, 'nay ngay 6', '2017-03-06 15:11:00', '2017-03-06 16:20:00', 1, 1, 6, 'bontd01@gmail.com', 'ff0000'),
(6, 'dad', '2017-06-01 09:21:00', '2017-06-01 10:20:00', 2, 1, 6, 'admin@gmail.com', '3a87ad');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `groups`
--

CREATE TABLE `groups` (
  `id` int(11) NOT NULL,
  `g_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `groups`
--

INSERT INTO `groups` (`id`, `g_name`) VALUES
(1, 'web'),
(2, 'Android'),
(3, 'Iphone 7'),
(4, 'Blackberry z10'),
(5, 'dev web'),
(9, 'Games');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `rooms`
--

CREATE TABLE `rooms` (
  `id` int(11) NOT NULL,
  `r_name` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `rooms`
--

INSERT INTO `rooms` (`id`, `r_name`) VALUES
(1, 'Tempura'),
(2, 'Sushi 1'),
(5, 'nokia'),
(6, 'Room 5'),
(10, 'sushi abc'),
(11, 'bontd');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `group_id` int(11) DEFAULT NULL,
  `birthday` date NOT NULL,
  `phone` int(10) NOT NULL,
  `location` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `certificate` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `group_id`, `birthday`, `phone`, `location`, `certificate`, `remember_token`, `created_at`) VALUES
(6, 'Admin', 'Admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '0000-00-00', 0, '', '', '1', '2016-12-14 04:34:58'),
(7, 'jjjjjjj4444', 'bontd25@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 1, '0000-00-00', 963551594, '', '', '2', '2017-06-01 08:37:03'),
(8, 'Trần bốn', 'bontd10@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '0000-00-00', 973940571, '', '', '2', '2017-06-01 08:37:10'),
(9, 'Trần bốn', 'bontd2510@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 2, '0000-00-00', 3887082, '', '', '2', '2017-06-01 08:37:28');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `groups`
--
ALTER TABLE `groups`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT cho bảng `groups`
--
ALTER TABLE `groups`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT cho bảng `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
