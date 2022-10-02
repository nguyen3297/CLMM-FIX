-- phpMyAdmin SQL Dump
-- version 4.9.7
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th10 02, 2022 lúc 01:07 AM
-- Phiên bản máy phục vụ: 10.3.36-MariaDB-log-cll-lve
-- Phiên bản PHP: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `smomocom_helloanhem`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `black_lists`
--

CREATE TABLE `black_lists` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `black_lists`
--

INSERT INTO `black_lists` (`id`, `phone`, `created_at`, `updated_at`) VALUES
(1, '1', '2022-06-24 20:49:14', '2022-06-24 20:49:14');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `contacts`
--

CREATE TABLE `contacts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `href` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `href`, `status`, `created_at`, `updated_at`) VALUES
(1, 'C', 'C', 1, '2022-06-21 17:07:16', '2022-06-21 17:07:16');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `devices`
--

CREATE TABLE `devices` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `device` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hardware` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `facture` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MODELID` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `devices`
--

INSERT INTO `devices` (`id`, `device`, `hardware`, `facture`, `MODELID`, `created_at`, `updated_at`) VALUES
(1, 'SM-G532F', 'mt6735', 'samsung', 'samsung sm-g532gmt6735r58j8671gsw', '2022-06-23 20:07:55', '2022-06-23 20:07:56'),
(3, 'SM-A102U', 'a10e', 'Samsung', 'Samsung SM-A102U', '2022-06-23 20:07:57', '2022-06-23 20:07:57'),
(4, 'SM-A305FN', 'a30', 'Samsung', 'Samsung SM-A305FN', '2022-06-23 20:07:58', '2022-06-23 20:07:59'),
(5, 'HTC One X9 dual sim', 'htc_e56ml_dtul', 'HTC', 'HTC One X9 dual sim', '2022-06-23 20:08:00', '2022-06-23 20:08:01'),
(6, 'HTC 7060', 'cp5dug', 'HTC', 'HTC HTC_7060', '2022-06-23 20:08:02', '2022-06-23 20:08:00'),
(7, 'HTC D10w', 'htc_a56dj_pro_dtwl', 'HTC', 'HTC htc_a56dj_pro_dtwl', '2022-06-23 20:08:04', '2022-06-23 20:08:03'),
(8, 'Oppo realme X Lite', 'RMX1851CN', 'Oppo', 'Oppo RMX1851', '2022-06-23 20:08:04', '2022-06-23 20:08:05'),
(9, 'MI 9', 'equuleus', 'Xiaomi', 'Xiaomi equuleus', '2022-06-23 20:08:06', '2022-06-23 20:08:06');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `gift_codes`
--

CREATE TABLE `gift_codes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `used` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `gift_codes`
--

INSERT INTO `gift_codes` (`id`, `code`, `used`, `amount`, `status`, `created_at`, `updated_at`) VALUES
(1, 'B3QU9V6CZ43577I8', 10, 100, 1, '2022-06-11 19:25:10', '2022-06-11 21:47:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_banks`
--

CREATE TABLE `history_banks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_banks`
--

INSERT INTO `history_banks` (`id`, `status`, `phone`, `details`, `created_at`, `updated_at`) VALUES
(1, 0, '0985678180', '{\"status\":\"error\",\"code\":23,\"message\":\"S\\u1ed1 ti\\u1ec1n t\\u1ed1i thi\\u1ec3u khi thanh to\\u00e1n b\\u1eb1ng ngu\\u1ed3n ti\\u1ec1n n\\u00e0y l\\u00e0 100\\u0111. Qu\\u00fd kh\\u00e1ch vui l\\u00f2ng th\\u1ef1c hi\\u1ec7n l\\u1ea1i\"}', '2022-05-22 06:46:48', '2022-05-22 06:46:48'),
(2, 0, '0985678180', '{\"status\":\"error\",\"code\":23,\"message\":\"S\\u1ed1 ti\\u1ec1n t\\u1ed1i thi\\u1ec3u khi thanh to\\u00e1n b\\u1eb1ng ngu\\u1ed3n ti\\u1ec1n n\\u00e0y l\\u00e0 100\\u0111. Qu\\u00fd kh\\u00e1ch vui l\\u00f2ng th\\u1ef1c hi\\u1ec7n l\\u1ea1i\"}', '2022-05-22 06:48:52', '2022-05-22 06:48:52'),
(3, 1, '0985678180', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"886\",\"ID\":\"fb375ca6-136f-482e-bd9f-24f1c9bfe466\",\"tranId\":24288603512,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\" U8DEGI\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0985678180\",\"ownerName\":\"B\\u00d9I THANH S\\u01a0N\",\"millisecond\":1653151757448}}', '2022-05-22 06:49:16', '2022-05-22 06:49:16'),
(4, 1, '0985678180', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"786\",\"ID\":\"47cc0f03-218c-440f-a3aa-8aa4bbea7913\",\"tranId\":24288603732,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"Tr\\u1ea3 th\\u01b0\\u1edfng tu\\u1ea7n nh\\u00e9 th\\u1eb1ng ML UHFZOQ\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0985678180\",\"ownerName\":\"B\\u00d9I THANH S\\u01a0N\",\"millisecond\":1653151794279}}', '2022-05-22 06:49:53', '2022-05-22 06:49:53'),
(5, 1, '0985678180', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"686\",\"ID\":\"45344fab-315b-49d7-b50d-2dd5122cd9e7\",\"tranId\":24288604932,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"Tr\\u1ea3 th\\u01b0\\u1edfng tu\\u1ea7n nh\\u00e9 th\\u1eb1ng ML VZOGMS\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0985678180\",\"ownerName\":\"B\\u00d9I THANH S\\u01a0N\",\"millisecond\":1653152024215}}', '2022-05-22 06:53:43', '2022-05-22 06:53:43'),
(6, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"2085611\",\"ID\":\"56a78595-37a8-44ab-a157-5149aebf23e3\",\"tranId\":24476932822,\"partnerId\":\"0528043536\",\"partnerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"amount\":100,\"comment\":\"hi\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1653666107531}}', '2022-05-28 05:41:49', '2022-05-28 05:41:49'),
(7, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"2085511\",\"ID\":\"06f1f694-de56-419c-95e6-a8c978eb21d6\",\"tranId\":24476933085,\"partnerId\":\"0528043536\",\"partnerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"amount\":100,\"comment\":\"hi\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1653666138865}}', '2022-05-28 05:42:20', '2022-05-28 05:42:20'),
(8, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5811\",\"ID\":\"de366d79-8673-4c83-b29b-6573f2555706\",\"tranId\":24477521443,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653667388445}}', '2022-05-28 06:03:10', '2022-05-28 06:03:10'),
(9, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5711\",\"ID\":\"30e0852d-8d7b-4b12-b17e-9927ad098ca5\",\"tranId\":24477522285,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653667502584}}', '2022-05-28 06:05:04', '2022-05-28 06:05:04'),
(10, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5611\",\"ID\":\"ae54a7b3-a2c9-42ce-adba-f04118a4889b\",\"tranId\":24477522477,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653667529106}}', '2022-05-28 06:05:30', '2022-05-28 06:05:30'),
(11, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:10:35', '2022-05-28 06:10:35'),
(12, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:11:00', '2022-05-28 06:11:00'),
(13, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:11:18', '2022-05-28 06:11:18'),
(14, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:11:39', '2022-05-28 06:11:39'),
(15, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:12:06', '2022-05-28 06:12:06'),
(16, 0, '0964872154', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:12:48', '2022-05-28 06:12:48'),
(17, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:13:24', '2022-05-28 06:13:24'),
(18, 0, '0964872154', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:14:29', '2022-05-28 06:14:29'),
(19, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:15:27', '2022-05-28 06:15:27'),
(20, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:15:35', '2022-05-28 06:15:35'),
(21, 0, '0528043536', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 06:59:09', '2022-05-28 06:59:09'),
(22, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5511\",\"ID\":\"be03e9c8-3a36-48a6-a98a-61caef50661b\",\"tranId\":24486136668,\"partnerId\":\"0964872154\",\"partnerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653706420418}}', '2022-05-28 16:53:43', '2022-05-28 16:53:43'),
(23, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5411\",\"ID\":\"769faa9f-4cdf-4951-9aeb-49a399545ec6\",\"tranId\":24485836450,\"partnerId\":\"0964872154\",\"partnerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653706801313}}', '2022-05-28 17:00:03', '2022-05-28 17:00:03'),
(24, 0, '0528043536', '{\"status\":\"error\",\"code\":23,\"message\":\"S\\u1ed1 ti\\u1ec1n t\\u1ed1i thi\\u1ec3u khi thanh to\\u00e1n b\\u1eb1ng ngu\\u1ed3n ti\\u1ec1n n\\u00e0y l\\u00e0 100\\u0111. Qu\\u00fd kh\\u00e1ch vui l\\u00f2ng th\\u1ef1c hi\\u1ec7n l\\u1ea1i\"}', '2022-05-28 17:00:18', '2022-05-28 17:00:18'),
(25, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5311\",\"ID\":\"00b556c6-c90c-44bd-a60d-13d97aead340\",\"tranId\":24485885472,\"partnerId\":\"0964872154\",\"partnerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653706827451}}', '2022-05-28 17:00:30', '2022-05-28 17:00:30'),
(26, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"5211\",\"ID\":\"b137d867-33bd-4acc-94fd-d8854f56de56\",\"tranId\":24486837926,\"partnerId\":\"0964872154\",\"partnerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653708755321}}', '2022-05-28 17:32:37', '2022-05-28 17:32:37'),
(27, 0, '0964872154', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-05-28 17:44:06', '2022-05-28 17:44:06'),
(28, 1, '0964872154', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"data\":{\"balance\":\"1640085\",\"ID\":\"bd667a98-451d-4bb4-a4fc-6e49a595bd0e\",\"tranId\":24487920214,\"partnerId\":\"0528043536\",\"partnerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"amount\":240,\"comment\":\"tr\\u1ea3 th\\u01b0\\u1edfng 24486837926\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0964872154\",\"ownerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"millisecond\":1653709923140}}', '2022-05-28 17:52:05', '2022-05-28 17:52:05'),
(29, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"4451\",\"ID\":\"ffa13f29-8724-4c70-b28d-090e6f43e2f2\",\"tranId\":24487923331,\"partnerId\":\"0964872154\",\"partnerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"amount\":1000,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653710160233}}', '2022-05-28 17:56:02', '2022-05-28 17:56:02'),
(30, 1, '0528043536', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"3451\",\"ID\":\"ec8bfccd-128d-4c8d-927a-2f6cc034f25f\",\"tranId\":24487796542,\"partnerId\":\"0964872154\",\"partnerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"amount\":1000,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0528043536\",\"ownerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"millisecond\":1653710171636}}', '2022-05-28 17:56:14', '2022-05-28 17:56:14'),
(31, 1, '0964872154', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"1639685\",\"ID\":\"e5dc4f3a-4c76-4a2e-baaa-e595b38c2e8e\",\"tranId\":24487807054,\"partnerId\":\"0528043536\",\"partnerName\":\"V\\u00d5 V\\u0102N \\u0110\\u1ee6\",\"amount\":2400,\"comment\":\"tr\\u1ea3 th\\u01b0\\u1edfng 24487796542\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0964872154\",\"ownerName\":\"HO\\u00c0NG V\\u0102N LONG\",\"millisecond\":1653710237094}}', '2022-05-28 17:57:19', '2022-05-28 17:57:19'),
(32, 0, '0395562711', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-07 23:49:19', '2022-06-07 23:49:19'),
(33, 0, '0395562711', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-07 23:59:08', '2022-06-07 23:59:08'),
(34, 0, '0395562711', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-07 23:59:35', '2022-06-07 23:59:35'),
(35, 1, '0866751637', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"1304578\",\"ID\":\"568bdb8f-15e0-47bb-8ecd-1d21df8aa9b7\",\"tranId\":24854944295,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0866751637\",\"ownerName\":\"NGUY\\u1ec4N H\\u1ed2NG D\\u01af\\u01a0NG\",\"millisecond\":1654596242971}}', '2022-06-08 00:04:03', '2022-06-08 00:04:03'),
(36, 0, '0395562711', '{\"status\":\"error\",\"author\":\"DUNGA\",\"code\":22,\"message\":\"T\\u00e0i kho\\u1ea3n nh\\u1eadn ph\\u1ea3i kh\\u00e1c t\\u00e0i kho\\u1ea3n g\\u1eedi\"}', '2022-06-08 00:04:08', '2022-06-08 00:04:08'),
(37, 1, '0866751637', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"1304478\",\"ID\":\"7f5c691e-c712-408a-9d53-2b02e0537f7b\",\"tranId\":24854947985,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"Tr\\u1ea3 th\\u01b0\\u1edfng nhi\\u1ec7m v\\u1ee5 YNEQQG\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"0866751637\",\"ownerName\":\"NGUY\\u1ec4N H\\u1ed2NG D\\u01af\\u01a0NG\",\"millisecond\":1654596487595}}', '2022-06-08 00:08:08', '2022-06-08 00:08:08'),
(38, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"290461\",\"ID\":\"0071ab53-cf81-43f8-be1c-63ab89e2f520\",\"tranId\":24856410683,\"partnerId\":\"0936483671\",\"partnerName\":\"Nguy\\u1ec5n \\u0110\\u00ecnh Qu\\u1ed1c \\u0110\\u1ea1t\",\"amount\":10000,\"comment\":\"\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654598506836}}', '2022-06-08 00:41:47', '2022-06-08 00:41:47'),
(39, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"280461\",\"ID\":\"843defcc-2c83-429d-9fce-b5159d3d9e92\",\"tranId\":24856118021,\"partnerId\":\"0936483671\",\"partnerName\":\"Nguy\\u1ec5n \\u0110\\u00ecnh Qu\\u1ed1c \\u0110\\u1ea1t\",\"amount\":10000,\"comment\":\"\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654598519522}}', '2022-06-08 00:42:00', '2022-06-08 00:42:00'),
(40, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"270461\",\"ID\":\"8e2333f3-dff6-4497-8d65-8c372f85a9e6\",\"tranId\":24856461008,\"partnerId\":\"01223323761\",\"partnerName\":\"L\\u00c2M ANH TU\\u1ea4N\",\"amount\":10000,\"comment\":\"\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654598577421}}', '2022-06-08 00:42:58', '2022-06-08 00:42:58'),
(41, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"270461\",\"ID\":\"2761d731-2e9f-4fcb-98fb-f98f6562b951\",\"tranId\":24856641996,\"partnerId\":\"01223323761\",\"partnerName\":\"L\\u00c2M ANH TU\\u1ea4N\",\"amount\":10000,\"comment\":\"\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654598754531}}', '2022-06-08 00:45:55', '2022-06-08 00:45:55'),
(42, 0, '0395562711', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-08 00:51:46', '2022-06-08 00:51:46'),
(43, 0, '0395562711', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-08 00:52:04', '2022-06-08 00:52:04'),
(44, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"202461\",\"ID\":\"f9da95b1-db1e-4677-a127-cfdc63f6dd90\",\"tranId\":24857010533,\"partnerId\":\"01686885004\",\"partnerName\":\"NGUY\\u1ec4N H\\u1eeeU C\\u01af\\u01a0NG\",\"amount\":88000,\"comment\":\"\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654599323075}}', '2022-06-08 00:55:23', '2022-06-08 00:55:23'),
(45, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"7300\",\"ID\":\"8134f3b4-7d98-42bb-8373-01ccc80314fb\",\"tranId\":24890514539,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"Tr\\u1ea3 th\\u01b0\\u1edfng nhi\\u1ec7m v\\u1ee5 MNJJN2\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1654678705844}}', '2022-06-08 22:58:26', '2022-06-08 22:58:26'),
(46, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"7200\",\"ID\":\"a07932f2-b3b6-42fe-a659-49f861eabd65\",\"tranId\":24890564126,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"Tr\\u1ea3 th\\u01b0\\u1edfng nhi\\u1ec7m v\\u1ee5 PFJXFH\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1654678790702}}', '2022-06-08 22:59:50', '2022-06-08 22:59:50'),
(47, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"7100\",\"ID\":\"c4d60a61-7a54-48de-89e4-665ed4ec12a3\",\"tranId\":24891014763,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\" SD88L1\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1654679788641}}', '2022-06-08 23:16:28', '2022-06-08 23:16:28'),
(48, 0, '0565884035', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-09 01:36:52', '2022-06-09 01:36:52'),
(49, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"7000\",\"ID\":\"64298dc3-5021-4a60-a45b-b1693946f482\",\"tranId\":24898866764,\"partnerId\":\"01686885004\",\"partnerName\":\"NGUY\\u1ec4N H\\u1eeeU C\\u01af\\u01a0NG\",\"amount\":100,\"comment\":\"Ho\\u00e0n ti\\u1ec1n  2Z81BJ\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1654688491001}}', '2022-06-09 01:41:30', '2022-06-09 01:41:30'),
(50, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"861\",\"ID\":\"6ec508a5-3e33-4563-afa1-5204abf732c2\",\"tranId\":25002691902,\"partnerId\":\"0865762182\",\"partnerName\":\"PH\\u1ea0M HO\\u00c0NG Y\\u1ebeN\",\"amount\":100,\"comment\":\"Tr\\u1ea3 giftcode Ch\\u1eb5n l\\u1ebb MVRODL\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654933520227}}', '2022-06-11 21:45:20', '2022-06-11 21:45:20'),
(51, 1, '0395562711', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"761\",\"ID\":\"917feb66-c774-4b17-9ec2-fe767176f5b2\",\"tranId\":25002624428,\"partnerId\":\"0865762182\",\"partnerName\":\"PH\\u1ea0M HO\\u00c0NG Y\\u1ebeN\",\"amount\":100,\"comment\":\"Tr\\u1ea3 giftcode Ch\\u1eb5n l\\u1ebb GTB0WF\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01695562711\",\"ownerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"millisecond\":1654933663378}}', '2022-06-11 21:47:43', '2022-06-11 21:47:43'),
(52, 0, '0923469940', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-11 22:43:36', '2022-06-11 22:43:36'),
(53, 1, '0337762692', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"317\",\"ID\":\"988ebc22-2232-47d6-88cb-b89077c2f079\",\"tranId\":25304944390,\"partnerId\":\"01686885004\",\"partnerName\":\"NGUY\\u1ec4N H\\u1eeeU C\\u01af\\u01a0NG\",\"amount\":300,\"comment\":\"tr\\u1ea3 th\\u01b0\\u1edfng 25303690483\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01637762692\",\"ownerName\":\"NGUY\\u1ec4N QUANG HUY\",\"millisecond\":1655612359142}}', '2022-06-19 18:19:19', '2022-06-19 18:19:19'),
(54, 0, '0382830366', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-22 18:18:09', '2022-06-22 18:18:09'),
(55, 0, '0565884035', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-22 18:24:08', '2022-06-22 18:24:08'),
(56, 0, '0565884035', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-22 18:26:20', '2022-06-22 18:26:20'),
(57, 0, '0565884035', '{\"status\":\"error\",\"code\":-5,\"message\":\"\\u0110\\u00e3 x\\u1ea3y ra l\\u1ed7i \\u1edf momo ho\\u1eb7c b\\u1ea1n \\u0111\\u00e3 h\\u1ebft h\\u1ea1n truy c\\u1eadp vui l\\u00f2ng \\u0111\\u0103ng nh\\u1eadp l\\u1ea1i\"}', '2022-06-22 18:27:21', '2022-06-22 18:27:21'),
(58, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"6900\",\"ID\":\"80b49d69-302f-4b25-9de6-968af7c6bf3f\",\"tranId\":25421374423,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1655875378741}}', '2022-06-22 19:22:59', '2022-06-22 19:22:59'),
(59, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"6970\",\"ID\":\"31958251-5a7f-471f-8b25-7f0d0394d3c0\",\"tranId\":25421397679,\"partnerId\":\"01686885004\",\"partnerName\":\"NGUY\\u1ec4N H\\u1eeeU C\\u01af\\u01a0NG\",\"amount\":230,\"comment\":\"tr\\u1ea3 th\\u01b0\\u1edfng 25421691087\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1655875678076}}', '2022-06-22 19:27:58', '2022-06-22 19:27:58'),
(60, 1, '0565884035', '{\"status\":\"success\",\"message\":\"Th\\u00e0nh c\\u00f4ng\",\"author\":\"DUNGA\",\"code\":0,\"data\":{\"balance\":\"6870\",\"ID\":\"cc362da1-7c9e-4563-a2e5-45d4b74d013e\",\"tranId\":25422225245,\"partnerId\":\"01695562711\",\"partnerName\":\"NGUY\\u1ec4N TI\\u1ebeN D\\u0168NG\",\"amount\":100,\"comment\":\"C\",\"status\":999,\"desc\":\"Th\\u00e0nh c\\u00f4ng\",\"ownerNumber\":\"01865884035\",\"ownerName\":\"NGUY\\u1ec4N TH\\u1eca H\\u1ea2I ANH\",\"millisecond\":1655876988910}}', '2022-06-22 19:49:49', '2022-06-22 19:49:49');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_day_missions`
--

CREATE TABLE `history_day_missions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `receive` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_day_missions`
--

INSERT INTO `history_day_missions` (`id`, `phone`, `amount`, `level`, `receive`, `status`, `pay`, `created_at`, `updated_at`) VALUES
(2, '01695562711', 50, 50, 100, 1, 1, '2022-06-08 22:59:48', '2022-06-08 22:59:50');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_gifts`
--

CREATE TABLE `history_gifts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `code` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_gifts`
--

INSERT INTO `history_gifts` (`id`, `phone`, `amount`, `status`, `code`, `created_at`, `updated_at`) VALUES
(4, '0865762182', 100, 1, 'B3QU9V6CZ43577I8', '2022-06-11 21:47:42', '2022-06-11 21:47:44');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_hus`
--

CREATE TABLE `history_hus` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tranId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_moneys`
--

CREATE TABLE `history_moneys` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_plays`
--

CREATE TABLE `history_plays` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tranId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partnerName` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `partnerId` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `receive` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `game` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phoneSend` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_plays`
--

INSERT INTO `history_plays` (`id`, `tranId`, `partnerName`, `partnerId`, `comment`, `amount`, `receive`, `status`, `pay`, `game`, `phoneSend`, `created_at`, `updated_at`) VALUES
(3, '23837739578', ' NGUYỄN TIẾN DŨNG', '6', 'C', 500, 100, 1, 1, 'CL', '0985678180', '2022-05-21 22:15:09', '2022-05-07 23:19:58'),
(4, '23837247171', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 50, 0, 0, 1, 'CL2', '0985678180', '2022-06-21 19:15:09', '2022-05-07 23:15:09'),
(5, '23837914854', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-06-21 19:15:09', '2022-05-12 01:11:13'),
(6, '23838069809', ' NGUYỄN TIẾN DŨNG', '01695562701', 'C', 100, 0, 4, 1, 'CL', '0985678180', '2022-06-21 19:15:09', '2022-06-09 01:38:47'),
(7, '23854979690', ' NGUYỄN TIẾN DŨNG', '01695562701', 'C', 100, 0, 0, 1, 'CL', '0985678180', '2022-06-21 19:15:09', '2022-05-08 18:03:58'),
(8, '23854746064', ' NGUYỄN TIẾN DŨNG', '01695562713', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-10 22:15:09', '2022-05-12 01:17:06'),
(9, '23930331323', ' ĐÀO NGUYỄN THỊ DƯƠNG NGỌC', '01638534794', 'L', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-10 22:42:34', '2022-05-12 01:20:43'),
(10, '23958167896', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-11 17:58:21', '2022-05-28 17:33:17'),
(11, '23995537868', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:34:02'),
(12, '23995537690', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 0, 0, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(13, '23995077162', ' MAI THANH PHU', '0967479798', 'X', 100, 240, 1, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:34:32'),
(14, '23995389322', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 4, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-06-09 01:21:00'),
(15, '23995389152', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 4, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-06-09 01:21:17'),
(16, '23995388959', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 0, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-06-09 01:22:22'),
(17, '23995388958', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 240, 0, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:35:18'),
(18, '23995076513', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 0, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(19, '23995076507', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 0, 0, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(20, '23995066823', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 0, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(21, '23994955446', ' MAI THANH PHU', '0967479798', 'T', 100, 240, 1, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:37:41'),
(22, '23995073420', ' MAI THANH PHU', '0967479798', 'C', 100, 0, 0, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(23, '23994954660', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 0, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(24, '23995072809', ' NGUYỄN HỮU CƯƠNG', '01686885004', 'C', 100, 0, 4, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-06-09 01:41:28'),
(25, '23995072756', ' MAI THANH PHU', '0967479798', 'X', 100, 0, 0, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(26, '23994954369', ' MAI THANH PHU', '0967479798', 'T', 100, 0, 0, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(27, '23995072526', ' NGUYỄN HỮU CƯƠNG', '01686885004', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:42:52'),
(28, '23995062445', ' MAI THANH PHU', '0967479798', 'T', 100, 240, 1, 1, 'TX', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:37:54'),
(29, '23995062071', ' NGUYỄN HỮU CƯƠNG', '01686885004', 'C', 100, 0, 0, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-13 03:23:11'),
(30, '23994640582', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:41:39'),
(31, '23994639830', ' NGUYỄN TIẾN DŨNG', '01695562711', 'C', 100, 0, 4, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-06-09 01:36:44'),
(32, '23994569836', ' NGUYỄN HỮU CƯƠNG', '01686885004', 'C', 100, 240, 1, 1, 'CL', '0985678180', '2022-05-13 03:23:11', '2022-05-28 17:41:18'),
(33, '23995828094', ' NGUYỄN TIẾN DŨNG', '01695562711', '', 1000, 0, 0, 1, 'DUNGA', '0985678180', '2022-05-13 03:43:23', '2022-05-13 03:43:23'),
(34, '24486136668', 'VÕ VĂN ĐỦ', '0528043536', 'C', 100, 0, 4, 1, 'CL', '0964872154', '2022-05-28 16:58:52', '2022-06-09 01:20:44'),
(35, '24485885472', 'VÕ VĂN ĐỦ', '0528043536', 'C', 100, 0, 0, 1, 'CL', '0964872154', '2022-05-28 17:00:33', '2022-06-09 01:15:35'),
(36, '24485836450', 'VÕ VĂN ĐỦ', '0528043536', 'C', 100, 0, 0, 1, 'CL', '0964872154', '2022-05-28 17:00:33', '2022-06-09 01:15:00'),
(37, '24486837926', 'VÕ VĂN ĐỦ', '0528043536', 'C', 100, 240, 0, 1, 'CL', '0964872154', '2022-05-28 17:32:52', '2022-05-28 17:52:04'),
(38, '24487796542', 'VÕ VĂN ĐỦ', '0528043536', 'C', 1000, 2400, 0, 1, 'CL', '0964872154', '2022-05-28 17:57:04', '2022-05-28 17:57:17'),
(39, '24487923331', 'VÕ VĂN ĐỦ', '0528043536', 'C', 1000, 0, 0, 1, 'CL', '0964872154', '2022-06-05 17:57:04', '2022-06-09 01:14:10'),
(40, '24994093983', 'TRẦN VĂN NAM', '01654091588', 'T', 6500, 0, 0, 1, 'TX', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(41, '24994221795', 'TRẦN VĂN NAM', '01654091588', 'X', 5000, 0, 0, 1, 'TX', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(42, '24993661227', 'VŨ TRUNG NGHĨA', '01864861637', 'RT', 2000000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(43, '24978790654', 'NGUYEN VI LOI', '0898470845', 'L', 10000, 0, 0, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(44, '24978565636', 'NGUYEN VI LOI', '0898470845', 'L', 10000, 0, 0, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(45, '24978486836', 'NGUYEN VI LOI', '0898470845', 'L', 17000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(46, '24977268336', 'NGUYEN VI LOI', '0898470845', 'C', 16000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(47, '24977702010', 'NGUYEN VI LOI', '0898470845', 'C', 20000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(48, '24977730767', 'NGUYEN VI LOI', '0898470845', 'C', 20000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(49, '24972500834', 'NGUYEN VI LOI', '0898470845', 'C', 20000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(50, '24972559575', 'NGUYEN VI LOI', '0898470845', 'C', 10000, 0, 0, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(51, '24972057220', 'NGUYEN VI LOI', '0898470845', 'C', 10000, 0, 0, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(52, '24972073326', 'TRƯƠNG GIA LINH', '0937294166', 'C', 40000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(53, '24972121969', 'TRƯƠNG GIA LINH', '0937294166', 'C', 20000, 0, 3, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(54, '24972121420', 'NGUYEN VI LOI', '0898470845', 'C', 10000, 0, 0, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(55, '24972072081', 'NGUYEN VI LOI', '0898470845', 'C', 10000, 0, 0, 1, 'CL', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(56, '24944196121', 'LÊ QUANG DUY', '01633018420', 'T2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(57, '24944381387', 'LÊ QUANG DUY', '01633018420', 'X2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(58, '24944194981', 'LÊ QUANG DUY', '01633018420', 'T2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(59, '24944233860', 'LÊ QUANG DUY', '01633018420', 'T2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(60, '24944194828', 'LÊ QUANG DUY', '01633018420', 'X2', 9000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(61, '24944380931', 'LÊ QUANG DUY', '01633018420', 'X2', 5000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(62, '24944262824', 'LÊ QUANG DUY', '01633018420', 'X2', 12000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(63, '24944262720', 'LÊ QUANG DUY', '01633018420', 'T2', 5000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(64, '24944194325', 'LÊ QUANG DUY', '01633018420', 'X2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(65, '24944380508', 'LÊ QUANG DUY', '01633018420', 'T2', 5000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(66, '24944233117', 'LÊ QUANG DUY', '01633018420', 'T2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(67, '24944380085', 'LÊ QUANG DUY', '01633018420', 'T2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(68, '24944232676', 'LÊ QUANG DUY', '01633018420', 'X2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(69, '24943848313', 'LÊ QUANG DUY', '01633018420', 'X2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(70, '24943847607', 'LÊ QUANG DUY', '01633018420', 'T2', 5000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(71, '24943897155', 'LÊ QUANG DUY', '01633018420', 'T2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(72, '24943837749', 'LÊ QUANG DUY', '01633018420', 'T2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(73, '24932327834', 'LÊ QUANG DUY', '01633018420', 'T2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(74, '24931411572', 'VŨ MINH ĐỨC', '01655929136', 'X', 7190, 17256, 1, 0, 'TX', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(75, '24931313296', 'VŨ MINH ĐỨC', '01655929136', 'X', 5000, 0, 0, 1, 'TX', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(76, '24930393041', 'LÊ QUANG DUY', '01633018420', 'T2', 20000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(77, '24930351122', 'LÊ QUANG DUY', '01633018420', 'T2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(78, '24930389875', 'LÊ QUANG DUY', '01633018420', 'X2', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(79, '24930005933', 'LÊ QUANG DUY', '01633018420', 'T2', 5000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(80, '24929465506', 'LÊ QUANG DUY', '01633018420', 'X2', 15000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(81, '24929167658', 'LÊ QUANG DUY', '01633018420', 'X2', 9000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(82, '24929488446', 'LÊ QUANG DUY', '01633018420', 'X2 ', 10000, 0, 2, 1, 'DUNGA', '0923469940', '2022-06-11 22:21:16', '2022-06-11 22:21:16'),
(83, '25004478413', 'HOANG NGOC SUONG', '0923329016', 'RT', 1000, 0, 0, 1, 'DUNGA', '0923469940', '2022-06-11 22:39:13', '2022-06-11 22:43:37'),
(84, '25303690483', 'NGUYỄN HỮU CƯƠNG', '01686885004', 'H3', 100, 300, 1, 1, 'H3', '0337762692', '2022-06-19 18:19:04', '2022-06-19 18:19:17'),
(85, '25421376516', 'NGUYỄN HỮU CƯƠNG', '01686885004', 'L', 100, 0, 0, 1, 'CL', '0565884035', '2022-06-22 19:26:57', '2022-06-22 19:26:57'),
(86, '25421425769', 'NGUYỄN HỮU CƯƠNG', '01686885004', 'C', 100, 0, 0, 1, 'CL', '0565884035', '2022-06-22 19:26:57', '2022-06-22 19:26:57'),
(88, '25421691087', 'NGUYỄN HỮU CƯƠNG', '01686885004', 'L', 100, 230, 1, 1, 'CL', '0565884035', '2022-06-22 19:27:51', '2022-06-22 19:27:55');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `history_week_tops`
--

CREATE TABLE `history_week_tops` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `phoneSend` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` int(11) NOT NULL,
  `gift` int(11) NOT NULL,
  `top` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `history_week_tops`
--

INSERT INTO `history_week_tops` (`id`, `phone`, `status`, `phoneSend`, `amount`, `gift`, `top`, `created_at`, `updated_at`) VALUES
(1, '01695562711', 100, '0985678180', 500, 3, 1, '2022-05-22 06:48:52', '2022-05-22 06:48:52'),
(2, '01695562711', 1, '0985678180', 500, 100, 1, '2022-05-22 06:49:16', '2022-05-22 06:49:16'),
(3, '01695562711', 1, '0985678180', 500, 100, 1, '2022-05-22 06:49:53', '2022-05-22 06:49:53'),
(4, '01695562711', 1, '0985678180', 500, 100, 1, '2022-05-22 06:53:43', '2022-05-22 06:53:43');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(3, '2022_05_01_114309_create_contacts_table', 1),
(4, '2022_05_01_134738_create_momos_table', 1),
(5, '2022_05_02_012840_create_settings_table', 1),
(6, '2022_05_02_031023_create_history_plays_table', 1),
(8, '2022_05_09_134102_create_history_day_mission_table', 2),
(9, '2022_05_10_061858_create_history_day_missions_table', 3),
(11, '2022_05_15_101543_create_history_moneys_table', 5),
(12, '2022_05_21_183344_create_history_banks_table', 5),
(14, '2022_05_14_214634_create_history_week_tops_table', 6),
(15, '2022_06_06_114937_create_musters_table', 7),
(16, '2022_06_09_153537_create_history_hus_table', 8),
(18, '2022_06_11_105244_create_history_gifts_table', 8),
(19, '2022_06_11_120408_create_gift_codes_table', 9),
(20, '2022_06_23_130541_create_devices_table', 10),
(21, '2022_06_24_134417_create_black_lists_table', 11);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `momos`
--

CREATE TABLE `momos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `info` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `min` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `max` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `time_login` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `try` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `musters`
--

CREATE TABLE `musters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `pay` int(11) NOT NULL,
  `turn` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `musters`
--

INSERT INTO `musters` (`id`, `phone`, `amount`, `status`, `pay`, `turn`, `created_at`, `updated_at`) VALUES
(21, '0395562711', '0', 0, 0, 14, '2022-06-07 23:29:23', '2022-06-07 23:42:42'),
(22, '0395562711', '8679', 1, 0, 15, '2022-06-07 23:31:04', '2022-06-07 23:32:18'),
(23, '0395562712', '0', 0, 0, 15, '2022-06-07 23:31:09', '2022-06-07 23:33:15'),
(24, '0395562711', '20972', 1, 0, 16, '2022-06-07 23:34:51', '2022-06-07 23:35:57'),
(25, '0395562713', '0', 0, 0, 16, '2022-06-07 23:34:58', '2022-06-07 23:35:57'),
(26, '0395562718', '0', 0, 0, 16, '2022-06-07 23:35:04', '2022-06-07 23:35:57'),
(27, '0395562717', '0', 0, 0, 16, '2022-06-07 23:35:11', '2022-06-07 23:35:57'),
(28, '0395562716', '0', 0, 0, 16, '2022-06-07 23:35:17', '2022-06-07 23:35:57'),
(29, '0395562711', '0', 0, 0, 17, '2022-06-07 23:40:37', '2022-06-07 23:48:06'),
(30, '0386885004', '100', 1, 0, 17, '2022-06-07 23:41:58', '2022-06-07 23:42:39'),
(31, '0386885004', '100', 1, 0, 18, '2022-06-07 23:48:41', '2022-06-07 23:49:18'),
(32, '0386885004', '100', 1, 0, 19, '2022-06-07 23:58:11', '2022-06-07 23:59:03'),
(33, '0395562711', '100', 1, 0, 20, '2022-06-08 00:03:23', '2022-06-08 00:04:06'),
(34, '0395562711', '100', 1, 0, 21, '2022-06-08 00:07:20', '2022-06-08 00:08:06'),
(35, '0395562711', '100', 1, 0, 24, '2022-06-08 23:15:19', '2022-06-08 23:16:26'),
(36, '0395562711', '100', 1, 0, 43, '2022-06-21 17:27:39', '2022-06-23 05:07:03'),
(37, '0395562711', '100', 0, 1, 47, '2022-06-23 05:08:43', '2022-06-23 05:10:23'),
(38, '0395562711', '100', 1, 0, 48, '2022-06-23 05:11:44', '2022-06-23 05:12:01');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `settings`
--

CREATE TABLE `settings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `logo` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `favicon` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `background` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `active` int(11) NOT NULL,
  `history` int(11) NOT NULL,
  `only_win` int(11) NOT NULL,
  `limit` int(11) NOT NULL,
  `day_mission` int(11) NOT NULL,
  `week_top` int(11) NOT NULL,
  `day_top` int(11) NOT NULL,
  `hu` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `refund` int(11) NOT NULL,
  `muster` int(11) NOT NULL,
  `giftcode` int(11) NOT NULL,
  `gift_week` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `gift_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `level_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `note` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_day` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_week` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_muster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_refund` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_giftcode` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_hu` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ads` longtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioCL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioCL2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioTX` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioTX2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratio1P3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioG3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioH3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioXSMB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioXien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ratioLO` int(11) DEFAULT NULL,
  `ratioHu` int(11) DEFAULT NULL,
  `amount_hu` int(11) DEFAULT NULL,
  `color` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_phone` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `top_amount` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `amount_muster` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `theme` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `time_muter` int(11) DEFAULT NULL,
  `muster_turn` int(11) DEFAULT NULL,
  `pay_muster` int(11) DEFAULT NULL,
  `limit_refund` int(11) DEFAULT NULL,
  `type_check` int(11) DEFAULT NULL,
  `total_muster` int(11) DEFAULT NULL,
  `contentCL` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentCL2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentTX` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentTX2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content1P3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentG3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentH3` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentLO` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentXien` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentXSMB` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `amountRF` int(11) NOT NULL,
  `cmtPay` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `text_run` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `settings`
--

INSERT INTO `settings` (`id`, `name`, `title`, `keywords`, `logo`, `description`, `favicon`, `background`, `active`, `history`, `only_win`, `limit`, `day_mission`, `week_top`, `day_top`, `hu`, `status`, `refund`, `muster`, `giftcode`, `gift_week`, `gift_day`, `level_day`, `note`, `content`, `content_day`, `content_week`, `content_muster`, `content_refund`, `content_giftcode`, `content_hu`, `ads`, `ratioCL`, `ratioCL2`, `ratioTX`, `ratioTX2`, `ratio1P3`, `ratioG3`, `ratioH3`, `ratioXSMB`, `ratioXien`, `ratioLO`, `ratioHu`, `amount_hu`, `color`, `top_phone`, `top_amount`, `amount_muster`, `theme`, `time_muter`, `muster_turn`, `pay_muster`, `limit_refund`, `type_check`, `total_muster`, `contentCL`, `contentCL2`, `contentTX`, `contentTX2`, `content1P3`, `contentG3`, `contentH3`, `contentLO`, `contentXien`, `contentXSMB`, `created_at`, `updated_at`, `amountRF`, `cmtPay`, `text_run`) VALUES
(1, 'tên web', 'ghi gì cũng được', 'ghi gì cũng được', 'link imgur', 'Chẳn lẻ momo - Uy tín , giao dịch tự động 24/7 - bank 30s !', 'https://upload.wikimedia.org/wikipedia/vi/f/fe/MoMo_Logo.png', '1', 1, 1, 1, 15, 1, 0, 0, 1, 1, 0, 1, 1, '2000000|1500000|1000000|800000|500000', '5000|20000|40000|50000|100000', '500000|1000000|3000000|5000000|10000000', '<h3><em><strong>Ch&agrave;o Mừng Bạn Đ&atilde; Đến Với tên web của bạn</strong></em></h3>\r\n<p><strong>Trước khi chơi, bạn n&ecirc;n đọc kĩ những lưu &yacute; sau, nếu bỏ qua những lưu &yacute; n&agrave;y, th&igrave; khi&nbsp;mất tiền, web sẽ kh&ocirc;ng chịu tr&aacute;ch nhiệm.</strong></p>\r\n<p><strong>&nbsp; &nbsp; 1. Chẵn lẻ t&agrave;i xỉu số cuối m&atilde; giao dịch l&agrave; 0, 9 thua, nếu muốn t&iacute;nh 0 v&agrave; 9 vui l&ograve;ng chơi chẵn lẻ 2.</strong></p>\r\n<p><strong>&nbsp; &nbsp; 2. Mỗi số chỉ c&oacute; thể giao dịch tối đa 50tr hoặc 150 lần một ng&agrave;y. V&igrave; vậy,&nbsp;số tr&ecirc;n hệ thống&nbsp;sẽ thay đổi li&ecirc;n tục&nbsp;</strong><strong>n&ecirc;n&nbsp;trước khi chơi bạn n&ecirc;n l&ecirc;n lấy số trước, tr&aacute;nh việc bị ho&agrave;n tiền.</strong></p>\r\n<p><strong>&nbsp; &nbsp; 3. Mỗi số c&oacute; một mức cược kh&aacute;c nhau, n</strong><strong>ếu chuyển sai hạn mức, sai nội dung (<em>SẼ KH&Ocirc;NG HO&Agrave;N TIỀN)</em><em>&nbsp;</em></strong></p>\r\n<p><strong><em>#SỐ NGỪNG HOẠT ĐỘNG SẼ TH&Ocirc;NG B&Aacute;O Ở BOX ( NẾU PEM SỐ TẮT QU&Aacute; 5P SẼ KH&Ocirc;NG HO&Agrave;N TIỀN CHƠI)</em></strong></p>\r\n<p><em><strong>Khi bạn tắt ch&uacute; &yacute; n&agrave;y đi, đồng nghĩa với việc bạn đ&atilde; đọc v&agrave; chấp nhận những điều đ&oacute;!</strong></em></p>', 'ghi gì cũng được', 'ghi gì cũng được', 'ghi gì cũng được', 'ghi gì cũng được', 'ghi gì cũng được', 'ghi gì cũng được', 'ghi gì cũng được', 'ghi gì cũng được', '2.6', '1.92', '2.45', '1.92', '3|5', '3|4|5', '3|5|7|9', '1|4|7', '3', 3, 50, 500000, '#080808', '0379364782|0568127381|03782937582|0527562721|0982746253', '47366807|44082627|41783100|38002933|11100122', '100|100', 'v1', 600, 49, 1, 0, 1, 10, 'C|L', 'C2|L2', 'T|X', 'T2|X2', 'N0|N1|N2|N3', 'G3', 'H3', 'LO', 'CX|LT|CT|LX', 'XSMB', '2022-05-03 23:38:03', '2022-09-29 02:58:18', 10, 'naptien', 'con cac');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `created_at`, `updated_at`) VALUES
(1, 'admin', '$2y$10$CdhDQzEUirhQnprPcZDq/efEduO4g9FzOBuisxANyvmQuujIkFnRS', 'admin', '2022-05-14 02:11:53', '2022-05-28 21:03:15');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `black_lists`
--
ALTER TABLE `black_lists`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `devices`
--
ALTER TABLE `devices`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `gift_codes`
--
ALTER TABLE `gift_codes`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_banks`
--
ALTER TABLE `history_banks`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_day_missions`
--
ALTER TABLE `history_day_missions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_gifts`
--
ALTER TABLE `history_gifts`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_hus`
--
ALTER TABLE `history_hus`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_moneys`
--
ALTER TABLE `history_moneys`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `history_plays`
--
ALTER TABLE `history_plays`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `history_plays_tranid_unique` (`tranId`);

--
-- Chỉ mục cho bảng `history_week_tops`
--
ALTER TABLE `history_week_tops`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `momos`
--
ALTER TABLE `momos`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `musters`
--
ALTER TABLE `musters`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Chỉ mục cho bảng `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_username_unique` (`username`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `black_lists`
--
ALTER TABLE `black_lists`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `devices`
--
ALTER TABLE `devices`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `gift_codes`
--
ALTER TABLE `gift_codes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `history_banks`
--
ALTER TABLE `history_banks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT cho bảng `history_day_missions`
--
ALTER TABLE `history_day_missions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `history_gifts`
--
ALTER TABLE `history_gifts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `history_hus`
--
ALTER TABLE `history_hus`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_moneys`
--
ALTER TABLE `history_moneys`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `history_plays`
--
ALTER TABLE `history_plays`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;

--
-- AUTO_INCREMENT cho bảng `history_week_tops`
--
ALTER TABLE `history_week_tops`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `momos`
--
ALTER TABLE `momos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `musters`
--
ALTER TABLE `musters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT cho bảng `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `settings`
--
ALTER TABLE `settings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
