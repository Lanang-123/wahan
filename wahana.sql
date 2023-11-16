-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2023 pada 02.14
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wahana`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `car_types`
--

CREATE TABLE `car_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `car_types`
--

INSERT INTO `car_types` (`id`, `slug`, `name`, `price`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'mobil', 'Mobil', 5000.00, 1, '2023-09-01 10:50:29', '2023-09-01 10:50:29'),
(2, 'sepeda-motor', 'Sepeda Motor', 2000.00, 1, '2023-09-01 10:50:48', '2023-09-01 10:50:57'),
(3, 'pejalan-kaki-1', 'Pejalan Kaki 1', 0.00, 1, '2023-09-02 09:33:35', '2023-09-14 20:43:01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkin_object`
--

CREATE TABLE `checkin_object` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `order_item_id` int(10) UNSIGNED NOT NULL,
  `use_guide` tinyint(4) NOT NULL DEFAULT 0,
  `guide_id` int(10) UNSIGNED DEFAULT NULL,
  `amount_fee` double(12,2) NOT NULL DEFAULT 0.00,
  `price` double(12,2) NOT NULL DEFAULT 0.00,
  `group_all` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `checkin_object`
--

INSERT INTO `checkin_object` (`id`, `ticket_id`, `order_item_id`, `use_guide`, `guide_id`, `amount_fee`, `price`, `group_all`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, NULL, 17500.00, 35000.00, NULL, '2023-09-02 09:53:15', '2023-09-02 09:53:15'),
(2, 181, 2, 1, NULL, 25000.00, 50000.00, NULL, '2023-09-02 09:53:15', '2023-09-02 09:53:15'),
(9, 385, 9, 1, 1, 21000.00, 1050000.00, NULL, '2023-09-04 06:18:26', '2023-09-04 06:18:26'),
(10, 386, 10, 1, 1, 21000.00, 1050000.00, NULL, '2023-09-04 06:18:26', '2023-09-04 06:18:26'),
(11, 2, 11, 1, 1, 17500.00, 35000.00, NULL, '2023-09-04 06:30:04', '2023-09-04 06:30:04'),
(12, 3, 12, 1, 1, 17500.00, 35000.00, NULL, '2023-09-04 06:30:04', '2023-09-04 06:30:04'),
(13, 4, 13, 1, 1, 17500.00, 35000.00, NULL, '2023-09-04 10:19:02', '2023-09-04 10:19:02'),
(14, 5, 14, 0, 0, 0.00, 35000.00, NULL, '2023-09-04 10:21:38', '2023-09-04 10:21:38'),
(15, 6, 15, 1, 1, 17500.00, 35000.00, NULL, '2023-09-05 09:24:19', '2023-09-05 09:24:19'),
(16, 7, 16, 1, 1, 17500.00, 35000.00, NULL, '2023-09-05 09:24:19', '2023-09-05 09:24:19'),
(17, 8, 17, 1, 1, 17500.00, 35000.00, NULL, '2023-09-07 09:57:40', '2023-09-07 09:57:40'),
(18, 9, 18, 1, 1, 17500.00, 35000.00, NULL, '2023-09-07 09:57:40', '2023-09-07 09:57:40'),
(19, 461, 19, 1, 1, 25000.00, 50000.00, NULL, '2023-09-14 20:18:16', '2023-09-14 20:18:16'),
(20, 462, 20, 1, 1, 25000.00, 50000.00, NULL, '2023-09-14 20:18:16', '2023-09-14 20:18:16'),
(21, 463, 21, 1, 1, 25000.00, 50000.00, NULL, '2023-09-14 20:46:08', '2023-09-14 20:46:08'),
(22, 464, 22, 1, 1, 25000.00, 50000.00, NULL, '2023-09-14 20:46:08', '2023-09-14 20:46:08'),
(23, 10, 23, 1, 1, 17500.00, 35000.00, NULL, '2023-09-18 05:55:45', '2023-09-18 05:55:46'),
(24, 11, 24, 1, 1, 17500.00, 35000.00, NULL, '2023-09-18 05:55:46', '2023-09-18 05:55:46'),
(25, 12, 25, 1, 1, 17500.00, 35000.00, NULL, '2023-09-18 06:08:59', '2023-09-18 06:08:59'),
(26, 13, 26, 1, 1, 17500.00, 35000.00, NULL, '2023-09-18 06:08:59', '2023-09-18 06:08:59'),
(27, 15, 27, 0, 0, 0.00, 35000.00, NULL, '2023-09-18 06:29:14', '2023-09-18 06:29:14'),
(28, 16, 28, 0, 0, 0.00, 35000.00, NULL, '2023-09-18 06:29:14', '2023-09-18 06:29:14'),
(29, 14, 29, 0, 0, 0.00, 35000.00, NULL, '2023-09-18 06:55:46', '2023-09-18 06:55:46'),
(30, 18, 30, 1, 1, 17500.00, 35000.00, NULL, '2023-09-22 08:43:15', '2023-09-22 08:43:15'),
(31, 19, 31, 1, 1, 17500.00, 35000.00, NULL, '2023-09-22 08:43:15', '2023-09-22 08:43:15'),
(32, 20, 32, 1, 1, 15015.00, 35000.00, NULL, '2023-09-30 04:55:58', '2023-09-30 04:55:58'),
(33, 23, 33, 1, 1, 15001.00, 35000.00, NULL, '2023-09-30 05:00:59', '2023-09-30 05:00:59'),
(34, 24, 34, 1, 1, 15001.00, 35000.00, NULL, '2023-09-30 05:04:48', '2023-09-30 05:04:48'),
(35, 25, 35, 1, 1, 15001.00, 35000.00, NULL, '2023-09-30 05:04:48', '2023-09-30 05:04:48'),
(36, 26, 36, 1, 1, 15001.00, 35000.00, NULL, '2023-09-30 05:12:14', '2023-09-30 05:12:14'),
(37, 27, 37, 1, 1, 15001.00, 35000.00, NULL, '2023-09-30 05:12:14', '2023-09-30 05:12:14'),
(38, 28, 38, 1, 1, 15001.00, 35000.00, NULL, '2023-09-30 05:12:14', '2023-09-30 05:12:14'),
(39, 17, 39, 1, 1, 15001.00, 35000.00, NULL, '2023-11-09 21:28:06', '2023-11-09 21:28:06'),
(40, 30, 40, 1, 1, 15001.00, 35000.00, NULL, '2023-11-09 23:24:15', '2023-11-09 23:24:15'),
(41, 31, 41, 1, 1, 15001.00, 35000.00, NULL, '2023-11-12 15:59:33', '2023-11-12 15:59:33'),
(42, 32, 42, 1, 1, 15001.00, 35000.00, NULL, '2023-11-16 04:47:44', '2023-11-16 04:47:44'),
(43, 33, 43, 1, 1, 15001.00, 35000.00, NULL, '2023-11-16 04:47:44', '2023-11-16 04:47:44');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkin_parking`
--

CREATE TABLE `checkin_parking` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `car_type_id` int(10) UNSIGNED NOT NULL,
  `checkin_number` varchar(255) NOT NULL,
  `police_number` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `total_passengers` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `is_fee` tinyint(4) NOT NULL DEFAULT 0,
  `traveler_type` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `transaction_time` time DEFAULT NULL,
  `duration` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `checkin_parking`
--

INSERT INTO `checkin_parking` (`id`, `car_type_id`, `checkin_number`, `police_number`, `price`, `total_passengers`, `image`, `is_fee`, `traveler_type`, `country`, `transaction_time`, `duration`, `created_at`, `updated_at`) VALUES
(1, 1, '000001', 'DK4444ME', 5000.00, 2, 'test.jpg', 1, NULL, 'Indonesia', '17:53:15', '3', '2023-09-02 09:49:34', '2023-09-02 09:53:15'),
(4, 1, '000004', 'DK4444ME', 5000.00, 2, 'test.jpg', 1, NULL, 'Armenia', '14:18:26', '1', '2023-09-04 06:17:00', '2023-09-04 06:18:26'),
(5, 2, '000005', 'DK4444MD', 2000.00, 2, 'test.jpg', 1, NULL, 'Indonesia', '14:30:04', '1', '2023-09-04 06:28:48', '2023-09-04 06:30:04'),
(6, 2, '000006', 'DK4567MD', 2000.00, 1, 'test.jpg', 1, NULL, 'Sweden', '18:19:02', '0', '2023-09-04 10:18:20', '2023-09-04 10:19:02'),
(7, 2, '000007', 'DK4567MD', 2000.00, 1, 'test.jpg', 0, NULL, 'Afghanistan', '18:21:38', '0', '2023-09-04 10:21:08', '2023-09-04 10:21:38'),
(8, 1, '000008', 'DK4567MD', 5000.00, 2, 'test.jpg', 1, NULL, 'Australia', '17:24:19', '8', '2023-09-05 09:15:42', '2023-09-05 09:24:19'),
(9, 1, '000009', 'DK6767MO', 5000.00, 2, 'test.jpg', 1, NULL, 'Indonesia', '17:57:40', '1', '2023-09-07 09:56:24', '2023-09-07 09:57:40'),
(10, 1, '000010', '4566', 5000.00, 2, 'test.jpg', 1, 'domestik', NULL, '04:18:16', '2', '2023-09-14 20:15:54', '2023-09-14 20:18:16'),
(11, 2, '000011', '4576', 2000.00, 2, 'test.jpg', 1, 'domestik', 'Albania', '04:46:08', '1', '2023-09-14 20:44:49', '2023-09-14 20:46:08'),
(12, 1, '000012', '6766', 5000.00, 2, 'test.jpg', 1, 'domestik', NULL, '13:55:45', '5', '2023-09-18 05:50:42', '2023-09-18 05:55:45'),
(13, 1, '000013', '4455', 5000.00, 2, 'test.jpg', 1, 'domestik', NULL, '14:29:14', '14', '2023-09-18 06:15:03', '2023-09-18 06:29:14'),
(14, 3, '000014', '0', 0.00, 1, 'test.jpg', 0, 'domestik', NULL, '14:55:46', '2', '2023-09-18 06:52:48', '2023-09-18 06:55:46'),
(15, 1, '000015', '8888', 5000.00, 1, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-09-22 06:45:05', '2023-09-22 06:45:05'),
(16, 1, '000016', '6788', 5000.00, 4, 'test.jpg', 0, 'domestik', NULL, NULL, NULL, '2023-09-22 06:47:55', '2023-09-22 06:47:55'),
(17, 1, '000017', '4567', 5000.00, 2, 'test.jpg', 1, 'domestik', 'Albania', '16:43:15', '7', '2023-09-22 08:35:55', '2023-09-22 08:43:15'),
(18, 2, '000018', '4566', 2000.00, 2, 'test.jpg', 0, 'asing', NULL, NULL, NULL, '2023-09-22 08:58:47', '2023-09-22 08:58:47'),
(19, 1, '000019', '5666', 5000.00, 4, 'test.jpg', 0, 'domestik', NULL, NULL, NULL, '2023-10-30 03:42:58', '2023-10-30 03:42:58'),
(20, 2, '000020', '5677', 2000.00, 4, 'test.jpg', 0, 'domestik', NULL, NULL, NULL, '2023-10-30 03:45:46', '2023-10-30 03:45:47'),
(21, 1, '000021', '3431', 5000.00, 3, 'test.jpg', 1, 'domestik', 'Indonesia', NULL, NULL, '2023-11-09 18:20:50', '2023-11-09 18:20:50'),
(22, 2, '000022', '29121', 2000.00, 5, 'test.jpg', 1, 'domestik', 'Indonesia', NULL, NULL, '2023-11-12 00:57:56', '2023-11-12 00:57:56'),
(23, 1, '000023', '78667', 5000.00, 3, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-11-12 15:09:52', '2023-11-12 15:09:52'),
(24, 1, '000024', '4455', 5000.00, 4, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-11-16 04:31:05', '2023-11-16 04:31:05'),
(25, 1, '000025', '4567', 5000.00, 4, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-11-16 04:34:05', '2023-11-16 04:34:05'),
(26, 1, '000026', '6788', 5000.00, 4, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-11-16 04:34:39', '2023-11-16 04:34:39'),
(27, 1, '000027', '3455', 5000.00, 4, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-11-16 04:40:51', '2023-11-16 04:40:51'),
(28, 1, '000028', '4646', 5000.00, 6, 'test.jpg', 1, 'domestik', NULL, NULL, NULL, '2023-11-16 04:41:28', '2023-11-16 04:41:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `checkin_rides`
--

CREATE TABLE `checkin_rides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ride_id` int(10) UNSIGNED NOT NULL,
  `ticket_id` int(10) UNSIGNED NOT NULL,
  `order_item_id` int(10) UNSIGNED NOT NULL,
  `use_guide` tinyint(4) NOT NULL DEFAULT 0,
  `guide_id` int(10) UNSIGNED DEFAULT NULL,
  `price` double(12,2) NOT NULL,
  `amount_fee` double(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `checkin_rides`
--

INSERT INTO `checkin_rides` (`id`, `ride_id`, `ticket_id`, `order_item_id`, `use_guide`, `guide_id`, `price`, `amount_fee`, `created_at`, `updated_at`) VALUES
(1, 1, 386, 10, 1, 1, 300000.00, 90000.00, '2023-09-04 10:26:23', '2023-09-04 10:26:23'),
(2, 1, 7, 16, 1, 1, 300000.00, 90000.00, '2023-09-05 09:26:24', '2023-09-05 09:26:24'),
(3, 1, 464, 22, 1, 1, 300000.00, 90000.00, '2023-09-14 20:47:36', '2023-09-14 20:47:36'),
(4, 1, 10, 23, 1, 1, 300000.00, 90000.00, '2023-09-18 05:58:38', '2023-09-18 05:58:38'),
(5, 1, 11, 24, 1, 1, 300000.00, 90000.00, '2023-09-18 06:00:44', '2023-09-18 06:00:44'),
(6, 1, 31, 41, 1, 1, 300000.00, 90000.00, '2023-11-12 16:03:20', '2023-11-12 16:03:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `configs`
--

CREATE TABLE `configs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `int_val` bigint(20) DEFAULT NULL,
  `str_val` varchar(255) DEFAULT NULL,
  `json_val` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `configs`
--

INSERT INTO `configs` (`id`, `name`, `int_val`, `str_val`, `json_val`, `created_at`, `updated_at`) VALUES
(1, 'order_number', 1, NULL, NULL, '2023-09-01 10:11:25', '2023-11-16 04:47:44'),
(2, 'ticket_expiration', 24, NULL, NULL, '2023-09-01 10:11:25', '2023-09-01 10:11:25');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fee_transfers`
--

CREATE TABLE `fee_transfers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guide_id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `payment_type` varchar(255) NOT NULL,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) DEFAULT NULL,
  `total` double(12,2) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `fee_transfers`
--

INSERT INTO `fee_transfers` (`id`, `guide_id`, `order_id`, `payment_type`, `bank_name`, `bank_account_number`, `bank_account_name`, `total`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 'cash', NULL, NULL, NULL, 42500.00, 'completed', '2023-09-03 07:37:17', '2023-09-03 07:37:17'),
(2, 1, 8, 'cash', NULL, NULL, NULL, 125000.00, 'completed', '2023-09-05 09:31:40', '2023-09-05 09:31:40'),
(3, 1, 9, 'cash', NULL, NULL, NULL, 35000.00, 'completed', '2023-09-07 09:59:11', '2023-09-07 09:59:11'),
(4, 1, 10, 'cash', NULL, NULL, NULL, 50000.00, 'completed', '2023-09-14 20:32:48', '2023-09-14 20:32:48'),
(5, 1, 11, 'cash', NULL, NULL, NULL, 140000.00, 'completed', '2023-09-14 20:50:55', '2023-09-14 20:50:55'),
(6, 1, 12, 'cash', NULL, NULL, NULL, 215000.00, 'completed', '2023-09-18 06:06:01', '2023-09-18 06:06:01'),
(7, 1, 13, 'cash', NULL, NULL, NULL, 35000.00, 'completed', '2023-09-18 06:13:44', '2023-09-18 06:13:44'),
(8, 1, 16, 'cash', NULL, NULL, NULL, 35000.00, 'completed', '2023-09-22 09:34:19', '2023-09-22 09:34:19'),
(9, 1, 17, 'cash', NULL, NULL, NULL, 15015.00, 'completed', '2023-09-30 05:45:01', '2023-09-30 05:45:01'),
(10, 1, 18, 'cash', NULL, NULL, NULL, 15001.00, 'completed', '2023-09-30 05:45:18', '2023-09-30 05:45:18'),
(11, 1, 19, 'cash', NULL, NULL, NULL, 30002.00, 'completed', '2023-09-30 05:45:35', '2023-09-30 05:45:35'),
(12, 1, 20, 'cash', NULL, NULL, NULL, 45003.00, 'completed', '2023-09-30 05:45:50', '2023-09-30 05:45:50'),
(13, 1, 21, 'cash', NULL, NULL, NULL, 15001.00, 'completed', '2023-11-09 21:32:18', '2023-11-09 21:32:18'),
(14, 1, 24, 'cash', NULL, NULL, NULL, 30002.00, 'completed', '2023-11-16 04:50:22', '2023-11-16 04:50:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `guides`
--

CREATE TABLE `guides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `id_card_number` int(11) DEFAULT NULL,
  `member_number` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `have_bank_account` tinyint(4) NOT NULL DEFAULT 0,
  `bank_name` varchar(255) DEFAULT NULL,
  `bank_account_number` varchar(255) DEFAULT NULL,
  `bank_account_name` varchar(255) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `guides`
--

INSERT INTO `guides` (`id`, `uuid`, `id_card_number`, `member_number`, `name`, `phone`, `have_bank_account`, `bank_name`, `bank_account_number`, `bank_account_name`, `description`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '8b28ffb3-9f21-47aa-8e4f-fd154f282f77', 2147483647, '000001', 'Wijaya Kusuma', '087861784028', 0, NULL, NULL, NULL, NULL, 1, '2023-09-02 09:47:17', '2023-09-02 09:47:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `handovers`
--

CREATE TABLE `handovers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `total` int(11) NOT NULL DEFAULT 0,
  `product_id_json` text NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `handovers`
--

INSERT INTO `handovers` (`id`, `name`, `type`, `total`, `product_id_json`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Domestik', 'ticket', 100, '[1,2,3,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24,25,26,27,28,29,30,31,32,33,34,35,36,37,38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,93,94,95,96,97,98,99,100]', 'in-stock', '2023-09-02 09:36:57', '2023-09-02 09:40:33'),
(2, 'International', 'ticket', 100, '[101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116,117,118,119,120,121,122,123,124,125,126,127,128,129,130,131,132,133,134,135,136,137,138,139,140,141,142,143,144,145,146,147,148,149,150,151,152,153,154,155,156,157,158,159,160,161,162,163,164,165,166,167,168,169,170,171,172,173,174,175,176,177,178,179,180,181,182,183,184,185,186,187,188,189,190,191,192,193,194,195,196,197,198,199,200]', 'in-stock', '2023-09-02 09:39:19', '2023-09-02 09:40:43'),
(3, 'Preweding Domestik', 'ticket', 100, '[201,202,203,204,205,206,207,208,209,210,211,212,213,214,215,216,217,218,219,220,221,222,223,224,225,226,227,228,229,230,231,232,233,234,235,236,237,238,239,240,241,242,243,244,245,246,247,248,249,250,251,252,253,254,255,256,257,258,259,260,261,262,263,264,265,266,267,268,269,270,271,272,273,274,275,276,277,278,279,280,281,282,283,284,285,286,287,288,289,290,291,292,293,294,295,296,297,298,299,300]', 'in-stock', '2023-09-03 20:52:38', '2023-09-03 20:53:22'),
(4, 'Preweding International', 'ticket', 100, '[301,302,303,304,305,306,307,308,309,310,311,312,313,314,315,316,317,318,319,320,321,322,323,324,325,326,327,328,329,330,331,332,333,334,335,336,337,338,339,340,341,342,343,344,345,346,347,348,349,350,351,352,353,354,355,356,357,358,359,360,361,362,363,364,365,366,367,368,369,370,371,372,373,374,375,376,377,378,379,380,381,382,383,384,385,386,387,388,389,390,391,392,393,394,395,396,397,398,399,400]', 'in-stock', '2023-09-03 20:53:01', '2023-09-03 20:54:12'),
(5, 'Cetak Internasional 1', 'ticket', 100, '[401,402,403,404,405,406,407,408,409,410,411,412,413,414,415,416,417,418,419,420,421,422,423,424,425,426,427,428,429,430,431,432,433,434,435,436,437,438,439,440,441,442,443,444,445,446,447,448,449,450,451,452,453,454,455,456,457,458,459,460,461,462,463,464,465,466,467,468,469,470,471,472,473,474,475,476,477,478,479,480,481,482,483,484,485,486,487,488,489,490,491,492,493,494,495,496,497,498,499,500]', 'in-stock', '2023-09-07 09:34:15', '2023-09-07 09:38:55'),
(6, 'Cetak Domestik', 'ticket', 30, '[501,502,503,504,505,506,507,508,509,510,511,512,513,514,515,516,517,518,519,520,521,522,523,524,525,526,527,528,529,530]', 'in-print', '2023-09-18 06:46:48', '2023-09-18 06:46:48'),
(7, '30', 'ticket', 60, '[531,532,533,534,535,536,537,538,539,540,541,542,543,544,545,546,547,548,549,550,551,552,553,554,555,556,557,558,559,560,561,562,563,564,565,566,567,568,569,570,571,572,573,574,575,576,577,578,579,580,581,582,583,584,585,586,587,588,589,590]', 'in-print', '2023-10-02 06:05:51', '2023-10-02 06:05:51'),
(8, 'International 1', 'ticket', 60, '[591,592,593,594,595,596,597,598,599,600,601,602,603,604,605,606,607,608,609,610,611,612,613,614,615,616,617,618,619,620,621,622,623,624,625,626,627,628,629,630,631,632,633,634,635,636,637,638,639,640,641,642,643,644,645,646,647,648,649,650]', 'in-print', '2023-10-03 20:47:33', '2023-10-03 20:47:33');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2021_05_10_023515_create_configs_table', 1),
(4, '2021_05_12_053917_create_roles_table', 1),
(5, '2021_09_20_151936_create_ticket_types_table', 1),
(6, '2021_09_20_152019_create_tickets_table', 1),
(7, '2021_09_20_152043_create_car_types_table', 1),
(8, '2021_09_20_152315_create_rides_table', 1),
(9, '2021_09_20_152405_create_guides_table', 1),
(10, '2021_09_20_152525_create_vouchers_table', 1),
(11, '2021_09_20_152841_create_checkin_parking_table', 1),
(12, '2021_09_20_152906_create_checkin_rides_table', 1),
(13, '2021_09_20_152930_create_checkin_object_table', 1),
(14, '2021_09_20_154319_create_ride_owners_table', 1),
(15, '2021_09_29_103715_create_orders_table', 1),
(16, '2021_09_30_143833_create_order_items_table', 1),
(17, '2021_10_18_155840_create_handovers', 1),
(18, '2021_10_25_155240_create_fee_transfers_table', 1),
(19, '2021_11_22_104848_alter_ticket_type_table', 1),
(20, '2021_11_22_110322_alter_checkin_object_table', 1),
(21, '2023_06_05_101308_alter_orders_table', 1),
(22, '2023_06_05_101806_alter_order_items_table', 1),
(23, '2023_08_29_225128_alter_checkin_parking', 2),
(24, '2023_08_30_024113_alter_order_table', 2),
(25, '2023_08_31_123243_alter_checkin_object_table', 2),
(26, '2023_08_31_135118_alter_orders_table', 2),
(27, '2023_09_14_090225_alter_checkin_parking_table', 3),
(28, '2023_09_14_101132_alter_order_table', 3),
(29, '2023_09_30_133907_alter_add_image_column_to_ticket_types_table', 4);

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_number` varchar(255) NOT NULL,
  `total_item` int(11) NOT NULL,
  `total_price` double(12,2) NOT NULL,
  `use_guide` tinyint(4) NOT NULL DEFAULT 0,
  `use_guide_parking` tinyint(4) NOT NULL DEFAULT 0,
  `guide_id` int(10) UNSIGNED DEFAULT NULL,
  `parking_id` int(10) UNSIGNED DEFAULT NULL,
  `already_transfer_fee` tinyint(4) NOT NULL DEFAULT 0,
  `can_cancel` tinyint(4) NOT NULL DEFAULT 1,
  `group_all` tinyint(4) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `order_number`, `total_item`, `total_price`, `use_guide`, `use_guide_parking`, `guide_id`, `parking_id`, `already_transfer_fee`, `can_cancel`, `group_all`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, '202392000001', 2, 85000.00, 1, 0, NULL, 1, 1, 1, NULL, '2023-09-02 09:53:15', '2023-09-03 07:37:17', NULL),
(4, '202394000001', 2, 2100000.00, 1, 0, 1, 4, 0, 1, NULL, '2023-09-04 06:18:26', '2023-09-04 06:18:26', NULL),
(5, '202394000002', 2, 70000.00, 1, 0, 1, 5, 0, 1, NULL, '2023-09-04 06:30:04', '2023-09-04 06:30:04', NULL),
(6, '202394000003', 1, 35000.00, 1, 0, 1, 6, 0, 1, NULL, '2023-09-04 10:19:02', '2023-09-04 10:19:02', NULL),
(7, '202394000004', 1, 35000.00, 0, 0, 0, 7, 0, 1, NULL, '2023-09-04 10:21:38', '2023-09-04 10:21:38', NULL),
(8, '202395000001', 2, 70000.00, 1, 0, 1, 8, 1, 1, NULL, '2023-09-05 09:24:19', '2023-09-05 09:31:40', NULL),
(9, '202397000001', 2, 70000.00, 1, 0, 1, 9, 1, 1, NULL, '2023-09-07 09:57:40', '2023-09-07 09:59:11', NULL),
(10, '2023915000001', 2, 100000.00, 1, 1, 1, 10, 1, 1, NULL, '2023-09-14 20:18:16', '2023-09-14 20:32:48', NULL),
(11, '2023915000002', 2, 100000.00, 1, 1, 1, 11, 1, 1, NULL, '2023-09-14 20:46:08', '2023-09-14 20:50:55', NULL),
(12, '2023918000001', 2, 70000.00, 1, 1, 1, 12, 1, 1, NULL, '2023-09-18 05:55:45', '2023-09-18 06:06:01', NULL),
(13, '2023918000002', 2, 70000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-09-18 06:08:59', '2023-09-18 06:13:44', NULL),
(14, '2023918000003', 2, 70000.00, 0, 1, 0, 13, 0, 1, NULL, '2023-09-18 06:29:14', '2023-09-18 06:29:14', NULL),
(15, '2023918000004', 1, 35000.00, 0, 0, 0, 14, 0, 1, NULL, '2023-09-18 06:55:46', '2023-09-18 06:55:46', NULL),
(16, '2023922000001', 2, 70000.00, 1, 1, 1, 17, 1, 1, NULL, '2023-09-22 08:43:15', '2023-09-22 09:34:19', NULL),
(17, '2023930000001', 1, 35000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-09-30 04:55:58', '2023-09-30 05:45:01', NULL),
(18, '2023930000002', 1, 35000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-09-30 05:00:59', '2023-09-30 05:45:18', NULL),
(19, '2023930000003', 2, 70000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-09-30 05:04:48', '2023-09-30 05:45:35', NULL),
(20, '2023930000004', 3, 105000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-09-30 05:12:14', '2023-09-30 05:45:50', NULL),
(21, '2023119000001', 1, 35000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-11-09 21:28:06', '2023-11-09 21:32:18', NULL),
(22, '2023119000002', 1, 35000.00, 1, 0, 1, NULL, 0, 1, NULL, '2023-11-09 23:24:15', '2023-11-09 23:24:15', NULL),
(23, '20231112000001', 1, 35000.00, 1, 0, 1, NULL, 0, 1, NULL, '2023-11-12 15:59:33', '2023-11-12 15:59:33', NULL),
(24, '20231116000001', 2, 70000.00, 1, 0, 1, NULL, 1, 1, NULL, '2023-11-16 04:47:44', '2023-11-16 04:50:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `order_items`
--

CREATE TABLE `order_items` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED NOT NULL,
  `product_type` varchar(255) NOT NULL,
  `product_id` int(10) UNSIGNED NOT NULL,
  `product_data` text NOT NULL,
  `price` double(12,2) NOT NULL,
  `checkin_time` datetime DEFAULT NULL,
  `checkout_time` datetime DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `order_items`
--

INSERT INTO `order_items` (`id`, `order_id`, `product_type`, `product_id`, `product_data`, `price`, `checkin_time`, `checkout_time`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'ticket', 1, '{\"id\":1,\"ticket_type_id\":1,\"code\":\"SW7IZN\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-02 17:53:15\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-02 17:53:15', '2023-09-03 15:37:17', '2023-09-02 09:53:15', '2023-09-03 07:37:17', NULL),
(2, 1, 'ticket', 181, '{\"id\":181,\"ticket_type_id\":2,\"code\":\"T8HLQP\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:38:27\",\"updated_at\":\"2023-09-02 17:53:15\",\"ticket_type_name\":\"International\",\"status_display\":\"Used\",\"price\":\"Rp 50.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":2,\"slug\":\"international\",\"name\":\"International\",\"price\":50000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:39\",\"updated_at\":\"2023-09-02 17:28:39\",\"price_display\":\"Rp 50.000,00\",\"fee_display\":\"50,00 %\"}}', 50000.00, '2023-09-02 17:53:15', '2023-09-03 15:37:17', '2023-09-02 09:53:15', '2023-09-03 07:37:17', NULL),
(9, 4, 'ticket', 385, '{\"id\":385,\"ticket_type_id\":5,\"code\":\"CDU2VP\",\"status\":\"used\",\"created_at\":\"2023-09-04 04:48:08\",\"updated_at\":\"2023-09-04 14:18:26\",\"ticket_type_name\":\"Preweding International\",\"status_display\":\"Used\",\"price\":\"Rp 1.050.000,00\",\"created_at_display\":\"04 September 2023\",\"ticket_type\":{\"id\":5,\"slug\":\"preweding-international\",\"name\":\"Preweding International\",\"price\":1050000,\"fee\":2,\"is_active\":1,\"created_at\":\"2023-09-02 17:32:52\",\"updated_at\":\"2023-09-04 14:16:15\",\"price_display\":\"Rp 1.050.000,00\",\"fee_display\":\"2,00 %\"}}', 1050000.00, '2023-09-04 14:18:26', NULL, '2023-09-04 06:18:26', '2023-09-04 06:18:26', NULL),
(10, 4, 'ticket', 386, '{\"id\":386,\"ticket_type_id\":5,\"code\":\"WL48Q1\",\"status\":\"used\",\"created_at\":\"2023-09-04 04:48:09\",\"updated_at\":\"2023-09-04 14:18:26\",\"ticket_type_name\":\"Preweding International\",\"status_display\":\"Used\",\"price\":\"Rp 1.050.000,00\",\"created_at_display\":\"04 September 2023\",\"ticket_type\":{\"id\":5,\"slug\":\"preweding-international\",\"name\":\"Preweding International\",\"price\":1050000,\"fee\":2,\"is_active\":1,\"created_at\":\"2023-09-02 17:32:52\",\"updated_at\":\"2023-09-04 14:16:15\",\"price_display\":\"Rp 1.050.000,00\",\"fee_display\":\"2,00 %\"}}', 1050000.00, '2023-09-04 14:18:26', NULL, '2023-09-04 06:18:26', '2023-09-04 06:18:26', NULL),
(11, 5, 'ticket', 2, '{\"id\":2,\"ticket_type_id\":1,\"code\":\"EGKUXB\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-04 14:30:04\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-04 14:30:04', NULL, '2023-09-04 06:30:04', '2023-09-04 06:30:04', NULL),
(12, 5, 'ticket', 3, '{\"id\":3,\"ticket_type_id\":1,\"code\":\"IP1LJF\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-04 14:30:04\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-04 14:30:04', NULL, '2023-09-04 06:30:04', '2023-09-04 06:30:04', NULL),
(13, 6, 'ticket', 4, '{\"id\":4,\"ticket_type_id\":1,\"code\":\"IYQLWZ\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-04 18:19:02\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-04 18:19:02', NULL, '2023-09-04 10:19:02', '2023-09-04 10:19:02', NULL),
(14, 7, 'ticket', 5, '{\"id\":5,\"ticket_type_id\":1,\"code\":\"F10UVQ\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-04 18:21:38\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-04 18:21:38', NULL, '2023-09-04 10:21:38', '2023-09-04 10:21:38', NULL),
(15, 8, 'ticket', 6, '{\"id\":6,\"ticket_type_id\":1,\"code\":\"08T1BT\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-05 17:24:19\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-05 17:24:19', '2023-09-05 17:31:40', '2023-09-05 09:24:19', '2023-09-05 09:31:40', NULL),
(16, 8, 'ticket', 7, '{\"id\":7,\"ticket_type_id\":1,\"code\":\"W1VO3W\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-05 17:24:19\",\"ticket_type_name\":\"Domestik\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik\",\"name\":\"Domestik\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-02 17:28:09\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-05 17:24:19', '2023-09-05 17:31:40', '2023-09-05 09:24:19', '2023-09-05 09:31:40', NULL),
(17, 9, 'ticket', 8, '{\"id\":8,\"ticket_type_id\":1,\"code\":\"HXHHP4\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-07 17:57:40\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-07 17:57:40', '2023-09-07 17:59:11', '2023-09-07 09:57:40', '2023-09-07 09:59:11', NULL),
(18, 9, 'ticket', 9, '{\"id\":9,\"ticket_type_id\":1,\"code\":\"9D2495\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-07 17:57:40\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-07 17:57:40', '2023-09-07 17:59:11', '2023-09-07 09:57:40', '2023-09-07 09:59:11', NULL),
(19, 10, 'ticket', 461, '{\"id\":461,\"ticket_type_id\":2,\"code\":\"82E421\",\"status\":\"used\",\"created_at\":\"2023-09-07 17:32:49\",\"updated_at\":\"2023-09-15 04:18:16\",\"ticket_type_name\":\"International\",\"status_display\":\"Used\",\"price\":\"Rp 50.000,00\",\"created_at_display\":\"07 September 2023\",\"ticket_type\":{\"id\":2,\"slug\":\"international\",\"name\":\"International\",\"price\":50000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:39\",\"updated_at\":\"2023-09-02 17:28:39\",\"price_display\":\"Rp 50.000,00\",\"fee_display\":\"50,00 %\"}}', 50000.00, '2023-09-15 04:18:16', '2023-09-15 04:32:48', '2023-09-14 20:18:16', '2023-09-14 20:32:48', NULL),
(20, 10, 'ticket', 462, '{\"id\":462,\"ticket_type_id\":2,\"code\":\"5URK91\",\"status\":\"used\",\"created_at\":\"2023-09-07 17:32:49\",\"updated_at\":\"2023-09-15 04:18:16\",\"ticket_type_name\":\"International\",\"status_display\":\"Used\",\"price\":\"Rp 50.000,00\",\"created_at_display\":\"07 September 2023\",\"ticket_type\":{\"id\":2,\"slug\":\"international\",\"name\":\"International\",\"price\":50000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:39\",\"updated_at\":\"2023-09-02 17:28:39\",\"price_display\":\"Rp 50.000,00\",\"fee_display\":\"50,00 %\"}}', 50000.00, '2023-09-15 04:18:16', '2023-09-15 04:32:48', '2023-09-14 20:18:16', '2023-09-14 20:32:48', NULL),
(21, 11, 'ticket', 463, '{\"id\":463,\"ticket_type_id\":2,\"code\":\"C5IAYL\",\"status\":\"used\",\"created_at\":\"2023-09-07 17:32:49\",\"updated_at\":\"2023-09-15 04:46:08\",\"ticket_type_name\":\"International\",\"status_display\":\"Used\",\"price\":\"Rp 50.000,00\",\"created_at_display\":\"07 September 2023\",\"ticket_type\":{\"id\":2,\"slug\":\"international\",\"name\":\"International\",\"price\":50000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:39\",\"updated_at\":\"2023-09-02 17:28:39\",\"price_display\":\"Rp 50.000,00\",\"fee_display\":\"50,00 %\"}}', 50000.00, '2023-09-15 04:46:08', '2023-09-15 04:50:55', '2023-09-14 20:46:08', '2023-09-14 20:50:55', NULL),
(22, 11, 'ticket', 464, '{\"id\":464,\"ticket_type_id\":2,\"code\":\"W6S4L5\",\"status\":\"used\",\"created_at\":\"2023-09-07 17:32:49\",\"updated_at\":\"2023-09-15 04:46:08\",\"ticket_type_name\":\"International\",\"status_display\":\"Used\",\"price\":\"Rp 50.000,00\",\"created_at_display\":\"07 September 2023\",\"ticket_type\":{\"id\":2,\"slug\":\"international\",\"name\":\"International\",\"price\":50000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:39\",\"updated_at\":\"2023-09-02 17:28:39\",\"price_display\":\"Rp 50.000,00\",\"fee_display\":\"50,00 %\"}}', 50000.00, '2023-09-15 04:46:08', '2023-09-15 04:50:55', '2023-09-14 20:46:08', '2023-09-14 20:50:55', NULL),
(23, 12, 'ticket', 10, '{\"id\":10,\"ticket_type_id\":1,\"code\":\"AT4GHL\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 13:55:45\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 13:55:45', '2023-09-18 14:06:01', '2023-09-18 05:55:46', '2023-09-18 06:06:01', NULL),
(24, 12, 'ticket', 11, '{\"id\":11,\"ticket_type_id\":1,\"code\":\"8RK67H\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 13:55:46\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 13:55:46', '2023-09-18 14:06:01', '2023-09-18 05:55:46', '2023-09-18 06:06:01', NULL),
(25, 13, 'ticket', 12, '{\"id\":12,\"ticket_type_id\":1,\"code\":\"Z8ZS0F\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 14:08:59\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 14:08:59', '2023-09-18 14:13:44', '2023-09-18 06:08:59', '2023-09-18 06:13:44', NULL),
(26, 13, 'ticket', 13, '{\"id\":13,\"ticket_type_id\":1,\"code\":\"826558\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 14:08:59\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 14:08:59', '2023-09-18 14:13:44', '2023-09-18 06:08:59', '2023-09-18 06:13:44', NULL),
(27, 14, 'ticket', 15, '{\"id\":15,\"ticket_type_id\":1,\"code\":\"NOEWRW\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 14:29:14\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 14:29:14', NULL, '2023-09-18 06:29:14', '2023-09-18 06:29:14', NULL),
(28, 14, 'ticket', 16, '{\"id\":16,\"ticket_type_id\":1,\"code\":\"EJQ1QZ\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 14:29:14\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 14:29:14', NULL, '2023-09-18 06:29:14', '2023-09-18 06:29:14', NULL),
(29, 15, 'ticket', 14, '{\"id\":14,\"ticket_type_id\":1,\"code\":\"LFJK11\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-18 14:55:46\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-18 14:55:46', NULL, '2023-09-18 06:55:46', '2023-09-18 06:55:46', NULL),
(30, 16, 'ticket', 18, '{\"id\":18,\"ticket_type_id\":1,\"code\":\"WA3ATP\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-22 16:43:15\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-22 16:43:15', '2023-09-22 17:34:19', '2023-09-22 08:43:15', '2023-09-22 09:34:19', NULL),
(31, 16, 'ticket', 19, '{\"id\":19,\"ticket_type_id\":1,\"code\":\"VD5BPQ\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-22 16:43:15\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":50,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-07 17:41:44\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"50,00 %\"}}', 35000.00, '2023-09-22 16:43:15', '2023-09-22 17:34:19', '2023-09-22 08:43:15', '2023-09-22 09:34:19', NULL),
(32, 17, 'ticket', 20, '{\"id\":20,\"ticket_type_id\":1,\"code\":\"S0EC68\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 12:55:58\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.9,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 12:55:13\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,90 %\"}}', 35000.00, '2023-09-30 12:55:58', '2023-09-30 13:45:01', '2023-09-30 04:55:58', '2023-09-30 05:45:01', NULL),
(33, 18, 'ticket', 23, '{\"id\":23,\"ticket_type_id\":1,\"code\":\"ZYJ07E\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 13:00:59\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 13:00:21\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-09-30 13:00:59', '2023-09-30 13:45:18', '2023-09-30 05:00:59', '2023-09-30 05:45:18', NULL),
(34, 19, 'ticket', 24, '{\"id\":24,\"ticket_type_id\":1,\"code\":\"5JYG5O\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 13:04:48\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 13:00:21\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-09-30 13:04:48', '2023-09-30 13:45:35', '2023-09-30 05:04:48', '2023-09-30 05:45:35', NULL),
(35, 19, 'ticket', 25, '{\"id\":25,\"ticket_type_id\":1,\"code\":\"9O1EV1\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 13:04:48\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 13:00:21\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-09-30 13:04:48', '2023-09-30 13:45:35', '2023-09-30 05:04:48', '2023-09-30 05:45:35', NULL),
(36, 20, 'ticket', 26, '{\"id\":26,\"ticket_type_id\":1,\"code\":\"LGICTA\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 13:12:14\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 13:00:21\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-09-30 13:12:14', '2023-09-30 13:45:50', '2023-09-30 05:12:14', '2023-09-30 05:45:50', NULL),
(37, 20, 'ticket', 27, '{\"id\":27,\"ticket_type_id\":1,\"code\":\"LZDRWO\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 13:12:14\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 13:00:21\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-09-30 13:12:14', '2023-09-30 13:45:50', '2023-09-30 05:12:14', '2023-09-30 05:45:50', NULL),
(38, 20, 'ticket', 28, '{\"id\":28,\"ticket_type_id\":1,\"code\":\"8DCVXV\",\"status\":\"used\",\"created_at\":\"2023-09-02 17:36:19\",\"updated_at\":\"2023-09-30 13:12:14\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"created_at\":\"2023-09-02 17:28:09\",\"updated_at\":\"2023-09-30 13:00:21\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-09-30 13:12:14', '2023-09-30 13:45:50', '2023-09-30 05:12:14', '2023-09-30 05:45:50', NULL),
(39, 21, 'ticket', 17, '{\"id\":17,\"ticket_type_id\":1,\"code\":\"AD6IRM\",\"status\":\"used\",\"created_at\":\"2023-09-02 02:36:19\",\"updated_at\":\"2023-11-09 13:28:06\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_image\":\"http:\\/\\/127.0.0.1:9000\\/storage\\/image\\/26fba5a8-6f21-4e7d-aefa-c5eb6b8f8db9.jpg\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"image\":\"http:\\/\\/127.0.0.1:9000\\/storage\\/image\\/26fba5a8-6f21-4e7d-aefa-c5eb6b8f8db9.jpg\",\"created_at\":\"2023-09-02 02:28:09\",\"updated_at\":\"2023-10-03 13:38:53\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-11-09 13:28:06', '2023-11-09 13:32:18', '2023-11-09 21:28:06', '2023-11-09 21:32:18', NULL),
(40, 22, 'ticket', 30, '{\"id\":30,\"ticket_type_id\":1,\"code\":\"KH2NSQ\",\"status\":\"used\",\"created_at\":\"2023-09-02 02:36:19\",\"updated_at\":\"2023-11-09 15:24:15\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_image\":\"http:\\/\\/127.0.0.1:9000\\/storage\\/image\\/26fba5a8-6f21-4e7d-aefa-c5eb6b8f8db9.jpg\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"image\":\"http:\\/\\/127.0.0.1:9000\\/storage\\/image\\/26fba5a8-6f21-4e7d-aefa-c5eb6b8f8db9.jpg\",\"created_at\":\"2023-09-02 02:28:09\",\"updated_at\":\"2023-10-03 13:38:53\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-11-09 15:24:15', NULL, '2023-11-09 23:24:15', '2023-11-09 23:24:15', NULL),
(41, 23, 'ticket', 31, '{\"id\":31,\"ticket_type_id\":1,\"code\":\"DHLBW6\",\"status\":\"used\",\"created_at\":\"2023-09-02 02:36:19\",\"updated_at\":\"2023-11-12 07:59:33\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_image\":\"http:\\/\\/localhost:8000\\/storage\\/image\\/26fba5a8-6f21-4e7d-aefa-c5eb6b8f8db9.jpg\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"image\":\"http:\\/\\/localhost:8000\\/storage\\/image\\/26fba5a8-6f21-4e7d-aefa-c5eb6b8f8db9.jpg\",\"created_at\":\"2023-09-02 02:28:09\",\"updated_at\":\"2023-10-03 13:38:53\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-11-12 07:59:33', NULL, '2023-11-12 15:59:33', '2023-11-12 15:59:33', NULL),
(42, 24, 'ticket', 32, '{\"id\":32,\"ticket_type_id\":1,\"code\":\"HOLDG0\",\"status\":\"used\",\"created_at\":\"2023-09-02 09:36:19\",\"updated_at\":\"2023-11-16 04:47:44\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_image\":\"https:\\/\\/tiketparkirdiamond.com\\/storage\\/image\\/b0f348b8-483c-4ac0-80ad-c81f811a0d56.jpg\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"image\":\"https:\\/\\/tiketparkirdiamond.com\\/storage\\/image\\/b0f348b8-483c-4ac0-80ad-c81f811a0d56.jpg\",\"created_at\":\"2023-09-02 09:28:09\",\"updated_at\":\"2023-11-16 04:12:37\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-11-16 04:47:44', '2023-11-16 04:50:22', '2023-11-16 04:47:44', '2023-11-16 04:50:22', NULL),
(43, 24, 'ticket', 33, '{\"id\":33,\"ticket_type_id\":1,\"code\":\"HRWDOJ\",\"status\":\"used\",\"created_at\":\"2023-09-02 09:36:19\",\"updated_at\":\"2023-11-16 04:47:44\",\"ticket_type_name\":\"Domestik 1\",\"status_display\":\"Used\",\"price\":\"Rp 35.000,00\",\"created_at_display\":\"02 September 2023\",\"ticket_image\":\"https:\\/\\/tiketparkirdiamond.com\\/storage\\/image\\/b0f348b8-483c-4ac0-80ad-c81f811a0d56.jpg\",\"ticket_type\":{\"id\":1,\"slug\":\"domestik-1\",\"name\":\"Domestik 1\",\"price\":35000,\"fee\":42.86,\"is_active\":1,\"image\":\"https:\\/\\/tiketparkirdiamond.com\\/storage\\/image\\/b0f348b8-483c-4ac0-80ad-c81f811a0d56.jpg\",\"created_at\":\"2023-09-02 09:28:09\",\"updated_at\":\"2023-11-16 04:12:37\",\"price_display\":\"Rp 35.000,00\",\"fee_display\":\"42,86 %\"}}', 35000.00, '2023-11-16 04:47:44', '2023-11-16 04:50:22', '2023-11-16 04:47:44', '2023-11-16 04:50:22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rides`
--

CREATE TABLE `rides` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ride_owner_id` int(10) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `fee` double(8,2) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `rides`
--

INSERT INTO `rides` (`id`, `ride_owner_id`, `slug`, `name`, `price`, `fee`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 1, 'flying-fox', 'Flying Fox', 300000.00, 30.00, 1, '2023-09-04 10:26:03', '2023-09-04 10:26:03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ride_owners`
--

CREATE TABLE `ride_owners` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `ride_owners`
--

INSERT INTO `ride_owners` (`id`, `uuid`, `name`, `is_active`, `created_at`, `updated_at`) VALUES
(1, 'dc4e875f-098f-45c4-a847-4ab2508058b0', 'Diamond Beach', 1, '2023-09-04 10:25:24', '2023-09-04 10:25:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `permissions` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `roles`
--

INSERT INTO `roles` (`id`, `uuid`, `name`, `permissions`, `created_at`, `updated_at`) VALUES
(4, '638878f1-1e68-4686-8b57-0f556d59fca1', 'Juru Parkir', '[\"master-data\",\"master-data\",\"ticket-type-list\",\"new-ticket-type\",\"edit-ticket-type\",\"create-ticket-type\",\"update-ticket-type\",\"delete-ticket-type\",\"master-data|ticket-type-list|new-ticket-type|edit-ticket-type|create-ticket-type|update-ticket-type|delete-ticket-type\",\"master-data\",\"ticket-list\",\"new-ticket\",\"edit-ticket\",\"create-ticket\",\"update-ticket\",\"delete-ticket\",\"master-data|ticket-list|new-ticket|edit-ticket|create-ticket|update-ticket|delete-ticket\",\"master-data\",\"car-type-list\",\"new-car-type\",\"edit-car-type\",\"create-car-type\",\"update-car-type\",\"delete-car-type\",\"master-data|car-type-list|new-car-type|edit-car-type|create-car-type|update-car-type|delete-car-type\",\"master-data\",\"ride-owner-list\",\"new-ride-owner\",\"edit-ride-owner\",\"create-ride-owner\",\"update-ride-owner\",\"delete-ride-owner\",\"master-data|ride-owner-list|new-ride-owner|edit-ride-owner|create-ride-owner|update-ride-owner|delete-ride-owner\",\"master-data\",\"ride-list\",\"new-ride\",\"edit-ride\",\"create-ride\",\"update-ride\",\"delete-ride\",\"master-data|ride-list|new-ride|edit-ride|create-ride|update-ride|delete-ride\",\"master-data\",\"guide-list\",\"new-guide\",\"edit-guide\",\"create-guide\",\"update-guide\",\"delete-guide\",\"master-data|guide-list|new-guide|edit-guide|create-guide|update-guide|delete-guide\",\"master-data\",\"voucher-list\",\"new-voucher\",\"edit-voucher\",\"create-voucher\",\"update-voucher\",\"delete-voucher\",\"master-data|voucher-list|new-voucher|edit-voucher|create-voucher|update-voucher|delete-voucher\",\"transaction\",\"transaction\",\"print-list\",\"new-print\",\"create-print\",\"download-print\",\"transaction|print-list|new-print|create-print|download-print\",\"transaction\",\"handover-list\",\"detail-handover\",\"accepted-handover\",\"transaction|handover-list|detail-handover|accepted-handover\",\"transaction\",\"new-parking\",\"create-parking\",\"transaction|new-parking|create-parking\",\"transaction\",\"new-order\",\"create-order\",\"check-code\",\"print-order\",\"cancel-order\",\"transaction|new-order|create-order|check-code|print-order|cancel-order\",\"transaction\",\"new-object\",\"create-object\",\"transaction|new-object|create-object\",\"transaction\",\"new-checkin-ride\",\"create-checkin-ride\",\"transaction|new-checkin-ride|create-checkin-ride\",\"transaction\",\"transfer-fee-list\",\"new-transfer-fee\",\"edit-transfer-fee\",\"create-transfer-fee\",\"form-transfer-fee\",\"transaction|transfer-fee-list|new-transfer-fee|edit-transfer-fee|create-transfer-fee|form-transfer-fee\",\"report\",\"report\",\"report-tickets\",\"report|report-tickets\",\"report\",\"report-vouchers\",\"report|report-vouchers\",\"report\",\"report-object\",\"report|report-object\",\"report\",\"report-rides\",\"report|report-rides\",\"report\",\"report-parkings\",\"report|report-parkings\",\"report\",\"report-fee-transfers\",\"report|report-fee-transfers\",\"report\",\"report-sales\",\"report|report-sales\",\"report\",\"report-cancel-order\",\"report|report-cancel-order\",\"report\",\"report-checkout\",\"report|report-checkout\"]', '2023-11-12 00:06:01', '2023-11-16 04:33:23'),
(5, 'b6fa72cc-a610-417f-af1a-4afc29e4bd1a', 'Supervisor', '[\"master-data\",\"master-data\",\"ticket-type-list\",\"new-ticket-type\",\"edit-ticket-type\",\"create-ticket-type\",\"update-ticket-type\",\"delete-ticket-type\",\"master-data|ticket-type-list|new-ticket-type|edit-ticket-type|create-ticket-type|update-ticket-type|delete-ticket-type\",\"master-data\",\"ticket-list\",\"new-ticket\",\"edit-ticket\",\"create-ticket\",\"update-ticket\",\"delete-ticket\",\"master-data|ticket-list|new-ticket|edit-ticket|create-ticket|update-ticket|delete-ticket\",\"master-data\",\"car-type-list\",\"new-car-type\",\"edit-car-type\",\"create-car-type\",\"update-car-type\",\"delete-car-type\",\"master-data|car-type-list|new-car-type|edit-car-type|create-car-type|update-car-type|delete-car-type\",\"master-data\",\"ride-owner-list\",\"new-ride-owner\",\"edit-ride-owner\",\"create-ride-owner\",\"update-ride-owner\",\"delete-ride-owner\",\"master-data|ride-owner-list|new-ride-owner|edit-ride-owner|create-ride-owner|update-ride-owner|delete-ride-owner\",\"master-data\",\"ride-list\",\"new-ride\",\"edit-ride\",\"create-ride\",\"update-ride\",\"delete-ride\",\"master-data|ride-list|new-ride|edit-ride|create-ride|update-ride|delete-ride\",\"master-data\",\"guide-list\",\"new-guide\",\"edit-guide\",\"create-guide\",\"update-guide\",\"delete-guide\",\"master-data|guide-list|new-guide|edit-guide|create-guide|update-guide|delete-guide\",\"master-data\",\"voucher-list\",\"new-voucher\",\"edit-voucher\",\"create-voucher\",\"update-voucher\",\"delete-voucher\",\"master-data|voucher-list|new-voucher|edit-voucher|create-voucher|update-voucher|delete-voucher\",\"transaction\",\"transaction\",\"print-list\",\"new-print\",\"create-print\",\"download-print\",\"transaction|print-list|new-print|create-print|download-print\",\"transaction\",\"handover-list\",\"detail-handover\",\"accepted-handover\",\"transaction|handover-list|detail-handover|accepted-handover\",\"transaction\",\"new-parking\",\"create-parking\",\"transaction|new-parking|create-parking\",\"transaction\",\"new-order\",\"create-order\",\"check-code\",\"print-order\",\"cancel-order\",\"transaction|new-order|create-order|check-code|print-order|cancel-order\",\"transaction\",\"new-object\",\"create-object\",\"transaction|new-object|create-object\",\"transaction\",\"new-checkin-ride\",\"create-checkin-ride\",\"transaction|new-checkin-ride|create-checkin-ride\",\"transaction\",\"transfer-fee-list\",\"new-transfer-fee\",\"edit-transfer-fee\",\"create-transfer-fee\",\"form-transfer-fee\",\"transaction|transfer-fee-list|new-transfer-fee|edit-transfer-fee|create-transfer-fee|form-transfer-fee\",\"report\",\"report\",\"report-object\",\"report|report-object\",\"report\",\"report-rides\",\"report|report-rides\"]', '2023-11-12 00:34:00', '2023-11-12 00:34:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `ticket_type_id` int(10) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_type_id`, `code`, `status`, `created_at`, `updated_at`) VALUES
(17, 1, 'AD6IRM', 'expired', '2023-09-02 09:36:19', '2023-11-09 21:32:18'),
(21, 1, 'T780T2', 'used', '2023-09-02 09:36:19', '2023-09-03 21:08:40'),
(22, 1, 'SWMDVD', 'used', '2023-09-02 09:36:19', '2023-09-03 21:08:40'),
(29, 1, 'S3DME6', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(30, 1, 'KH2NSQ', 'used', '2023-09-02 09:36:19', '2023-11-09 23:24:15'),
(31, 1, 'DHLBW6', 'used', '2023-09-02 09:36:19', '2023-11-12 15:59:33'),
(32, 1, 'HOLDG0', 'expired', '2023-09-02 09:36:19', '2023-11-16 04:50:22'),
(33, 1, 'HRWDOJ', 'expired', '2023-09-02 09:36:19', '2023-11-16 04:50:22'),
(34, 1, 'D7LNID', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(35, 1, '0GXZWN', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(36, 1, '2W8UKK', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(37, 1, '287UDK', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(38, 1, 'TS9Y5U', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(39, 1, 'VC2HV9', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(40, 1, '1YAVFW', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(41, 1, '9GJTGN', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(42, 1, '5BZV4R', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(43, 1, 'LLVG7Q', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(44, 1, '5KD0UM', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(45, 1, 'ZLKSKJ', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(46, 1, 'SNUOZ0', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(47, 1, 'NDK9TK', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(48, 1, 'TF0XM7', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(49, 1, 'OYQS9T', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(50, 1, '8MK8ZN', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(51, 1, 'V7VP2W', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(52, 1, 'KUY7KK', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(53, 1, 'B2UD30', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(54, 1, '3TX619', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(55, 1, 'KJFUH2', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(56, 1, 'U79D9E', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(57, 1, 'EXYQB4', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(58, 1, 'VYZ3V0', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(59, 1, 'K2HZ1Q', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(60, 1, 'SRYIKV', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(61, 1, 'O1FAES', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(62, 1, 'YJP0F5', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(63, 1, '1BBPLU', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(64, 1, 'H72Q0R', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(65, 1, 'F1S962', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(66, 1, '3Z752L', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(67, 1, 'W9IY08', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(68, 1, 'ZERF3K', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(69, 1, 'HJS9FA', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(70, 1, 'DGIIOY', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(71, 1, 'NVRPCP', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(72, 1, 'LKTONR', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(73, 1, 'K7C24S', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(74, 1, 'AI9WMX', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(75, 1, '9N5CLF', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(76, 1, 'YB97UQ', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(77, 1, 'KK6QZ1', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(78, 1, 'ITZJ3V', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(79, 1, 'HR3AYZ', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(80, 1, 'MW41FN', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(81, 1, 'GSLJUH', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(82, 1, 'IX296M', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(83, 1, 'VSKU5Z', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(84, 1, 'VX5L9F', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(85, 1, 'A76R17', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(86, 1, 'R4SO00', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(87, 1, 'XRHBNV', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(88, 1, 'K9QC0J', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(89, 1, 'RVDZQQ', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(90, 1, '1YDYJK', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(91, 1, 'R27J9H', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(92, 1, '3USH5L', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(93, 1, 'B1SW24', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(94, 1, '9XAJ9J', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(95, 1, '6KBYG7', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(96, 1, 'XH5Z2Z', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(97, 1, 'DQARDV', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(98, 1, 'LKDV5L', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(99, 1, 'SEBEKQ', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(100, 1, 'SCDRAH', 'in-stock', '2023-09-02 09:36:19', '2023-09-02 09:40:33'),
(101, 2, '7M1MB7', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(102, 2, 'EEEAR8', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(103, 2, '2RNO6T', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(104, 2, 'RVYRCC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(105, 2, 'OJNPXQ', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(106, 2, 'GXHUS6', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(107, 2, '3ATO9G', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(108, 2, 'UKWJ2O', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(109, 2, 'S3S6AG', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(110, 2, '0I442G', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(111, 2, 'NNGQ6K', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(112, 2, '6I8D2G', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(113, 2, '4339OK', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(114, 2, 'I038RF', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(115, 2, 'VOCTWD', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(116, 2, 'LGMYBC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(117, 2, 'IQRJI6', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(118, 2, '48HITV', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(119, 2, 'W6ILKD', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(120, 2, 'RYO7QG', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(121, 2, 'J5KX51', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(122, 2, '9JC4Z2', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(123, 2, '8NHKU1', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(124, 2, '7F1GXP', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(125, 2, 'C4O9RZ', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(126, 2, '0TQJO3', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(127, 2, '5T1L4T', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(128, 2, 'SLXU90', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(129, 2, 'NWZGDS', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(130, 2, 'BSZZLJ', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(131, 2, '7FBGS6', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(132, 2, 'GOD4BW', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(133, 2, 'IBCYBC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(134, 2, 'CR2GY2', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(135, 2, 'EYTAKR', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(136, 2, 'ZBF2UL', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(137, 2, 'HLPM4C', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(138, 2, 'JBK78F', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(139, 2, 'CPFNH3', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(140, 2, '2HRZZU', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(141, 2, 'CHIIOX', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(142, 2, 'BFMS3T', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(143, 2, 'WEZGMM', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(144, 2, '13UBKU', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(145, 2, 'CZH033', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(146, 2, '5TWKMM', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(147, 2, '0O7KLI', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(148, 2, 'WT1QMO', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(149, 2, '3N1SDV', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(150, 2, '7Y6P18', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(151, 2, '04S21C', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(152, 2, 'SN8JIS', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(153, 2, 'NOEY1F', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(154, 2, 'KEYAAN', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(155, 2, '5CU5L1', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(156, 2, 'PN0RGC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(157, 2, 'H8D2EX', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(158, 2, 'AAYFB3', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(159, 2, 'K57DS5', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(160, 2, '36XITD', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(161, 2, 'DCNI4V', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(162, 2, 'EDU7OU', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(163, 2, 'Y8JQ0I', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(164, 2, 'DLUUU9', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(165, 2, 'Z6PWGD', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(166, 2, 'ANZ9NX', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(167, 2, 'XENYFC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(168, 2, 'IV5IRX', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(169, 2, 'LU04TC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(170, 2, 'KPHA1Y', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(171, 2, 'OGSQX1', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(172, 2, '5IG1FD', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(173, 2, 'GD6M66', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(174, 2, '7V3RM4', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(175, 2, 'NA63E7', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(176, 2, 'FUXJ7H', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(177, 2, 'V9QWYV', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(178, 2, 'SFT743', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(179, 2, '79JLOA', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(180, 2, 'ENP203', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(182, 2, 'UJK1CE', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(183, 2, '46CSAN', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(184, 2, 'QPM5DE', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(185, 2, 'DSYHN2', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(186, 2, '3952N8', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(187, 2, 'DWO1OS', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(188, 2, '5SKEDC', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(189, 2, 'H0A64D', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(190, 2, '65CVN1', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(191, 2, '7X5D6F', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(192, 2, 'H7AY28', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(193, 2, '4QTI4W', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(194, 2, 'A7H5WD', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(195, 2, '780UBW', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(196, 2, 'RSFTBZ', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(197, 2, 'DNKJJB', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(198, 2, 'L6CHX0', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(199, 2, '2JEJ9C', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(200, 2, 'HMUWZ9', 'in-stock', '2023-09-02 09:38:27', '2023-09-02 09:40:43'),
(201, 4, 'Z9GRQP', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(202, 4, '9UM5GZ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(203, 4, '24G329', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(204, 4, '12T25Y', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(205, 4, '0GEV91', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(206, 4, 'B6D8VN', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(207, 4, '49KNEP', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(208, 4, 'J2GBD9', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(209, 4, '5URKJB', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(210, 4, 'OZ7H7R', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(211, 4, 'PS5TD5', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(212, 4, '9NC4AA', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(213, 4, '5KHAZU', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(214, 4, '17G6DK', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(215, 4, 'W3GZIM', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(216, 4, 'O1BQAM', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(217, 4, 'VODJDB', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(218, 4, 'JJJGYL', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(219, 4, 'Y65P13', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(220, 4, 'QKVW7V', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(221, 4, 'DM9VJZ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(222, 4, 'H88ILT', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(223, 4, 'SJ9BAN', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(224, 4, 'N8O1YO', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(225, 4, '2L5C5L', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(226, 4, 'OWMU22', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(227, 4, 'YYV40I', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(228, 4, 'PSY4HJ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(229, 4, 'UGI9HP', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(230, 4, 'AFPNDC', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(231, 4, 'DRPN21', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(232, 4, 'WM00SH', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(233, 4, 'U3NLTY', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(234, 4, 'E2BD3W', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(235, 4, '2ZZBAR', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(236, 4, 'YNF2A3', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(237, 4, '0KXI7L', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(238, 4, '8P1KX3', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(239, 4, 'EMRX0Q', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(240, 4, 'GR4GHW', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(241, 4, 'QNI9W3', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(242, 4, '0CTBB5', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(243, 4, 'A5TNWH', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(244, 4, 'GG8DRH', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(245, 4, 'YHQ9Y8', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(246, 4, 'F5Q1Q8', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(247, 4, 'C2K1WM', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(248, 4, 'KJL1L5', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(249, 4, '1WT94S', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(250, 4, 'K8CS3J', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(251, 4, '4FPH7M', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(252, 4, '6MLUXL', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(253, 4, 'HBSFH5', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(254, 4, 'DPT9UV', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(255, 4, '4WCD1F', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(256, 4, 'MF8XHH', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(257, 4, 'IEGV0U', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(258, 4, '976G2K', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(259, 4, 'DWGE8T', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(260, 4, 'ELITF6', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(261, 4, 'LJYDTM', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(262, 4, '1V2D4F', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(263, 4, 'RFG2DB', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(264, 4, '6U6WP9', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(265, 4, 'KOK4IC', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(266, 4, '5EWQMW', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(267, 4, 'P8MR2K', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(268, 4, 'CB0KN6', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(269, 4, 'QK2CJ6', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(270, 4, 'A108ZL', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(271, 4, 'SOOG6B', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(272, 4, 'QAGBDI', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(273, 4, 'GOJQEO', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(274, 4, 'TPIP5I', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(275, 4, '83OFVQ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(276, 4, '1GAWKS', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(277, 4, '3VMAON', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(278, 4, 'PHS0CN', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(279, 4, '2WMNJ7', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(280, 4, 'C7V0UU', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(281, 4, 'EJLZEH', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(282, 4, 'PNE7S4', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(283, 4, 'MTKNKD', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(284, 4, 'EREY88', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(285, 4, 'G5ULQK', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(286, 4, 'M5K4I5', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(287, 4, 'M2N9J8', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(288, 4, 'X08CH2', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(289, 4, 'LI3EWE', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(290, 4, 'BL4F01', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(291, 4, 'H525UD', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(292, 4, 'OVVDEQ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(293, 4, 'MHVUQZ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(294, 4, 'ABMQWE', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(295, 4, 'FO6DPU', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(296, 4, 'QF0KPA', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(297, 4, 'M688KE', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(298, 4, 'QU919U', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(299, 4, 'LZ8LVQ', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(300, 4, 'VOXLGR', 'in-stock', '2023-09-03 20:47:50', '2023-09-03 20:53:22'),
(301, 5, 'W9PLY1', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(302, 5, 'S59SVR', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(303, 5, '1ETQNJ', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(304, 5, 'EIU9XN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(305, 5, 'RIUM3T', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(306, 5, 'GXV5JY', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(307, 5, 'O8XM22', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(308, 5, 'MQYQL9', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(309, 5, 'FZJSCN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(310, 5, '4OSB8Q', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(311, 5, 'BJQJUJ', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(312, 5, '4WEVE1', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(313, 5, 'EMFG6H', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(314, 5, 'SARV8J', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(315, 5, 'BDKYNH', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(316, 5, 'I58DPV', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(317, 5, '6DHHE6', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(318, 5, 'A8K3RI', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(319, 5, 'JM4RVF', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(320, 5, '2O7JFE', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(321, 5, 'U9TRHN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(322, 5, 'MGVUWN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(323, 5, '413144', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(324, 5, 'TOLBVV', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(325, 5, 'LCVGUB', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(326, 5, 'YMVXZ4', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(327, 5, '59PM9N', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(328, 5, 'GUPFE5', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(329, 5, 'H62D32', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(330, 5, '780BBU', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(331, 5, '6RSUXI', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(332, 5, 'RWZ3N8', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(333, 5, 'MRJ0DM', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(334, 5, '7Y1ZXE', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(335, 5, 'UTNW79', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(336, 5, '584PLY', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(337, 5, 'I92C45', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(338, 5, 'DG1DHB', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(339, 5, 'AKJEKM', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(340, 5, '0CPVVJ', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(341, 5, 'ZE4CYH', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(342, 5, 'FQKAXN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(343, 5, 'LVRB3Y', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(344, 5, '3KALW0', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(345, 5, 'QAHRB7', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(346, 5, '93O1GD', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(347, 5, 'U3UYAS', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(348, 5, 'TPWVYE', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(349, 5, 'T3MZG0', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(350, 5, '7ZTO0D', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(351, 5, 'BDAVA9', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(352, 5, '914X2X', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(353, 5, 'NLWKLC', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(354, 5, '6AUCXO', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(355, 5, 'NKDCXK', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(356, 5, '9VKZKZ', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(357, 5, 'WE1O42', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(358, 5, 'W0019F', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(359, 5, 'EYKBHD', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(360, 5, 'ZNR2M6', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(361, 5, 'SMCDL9', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(362, 5, 'JMHDIN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(363, 5, '7NI3TS', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(364, 5, 'YIEDJQ', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(365, 5, 'ZYKIQ4', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(366, 5, 'M5J30S', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(367, 5, '2IVUY9', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(368, 5, 'Z2G66A', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(369, 5, 'AYQUVN', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(370, 5, 'XVFTMX', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(371, 5, 'WZHCR6', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(372, 5, '5IC227', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(373, 5, 'EZE96X', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(374, 5, 'H2UFYV', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(375, 5, 'LK4IPT', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(376, 5, 'YUXIAZ', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(377, 5, '0S6H5E', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(378, 5, 'LEMIDK', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(379, 5, 'JAVF4M', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(380, 5, '71PRVV', 'in-stock', '2023-09-03 20:48:08', '2023-09-03 20:54:12'),
(381, 5, 'CNG2ZE', 'used', '2023-09-03 20:48:08', '2023-09-03 21:08:40'),
(382, 5, 'W32OYH', 'used', '2023-09-03 20:48:08', '2023-09-03 21:08:40'),
(383, 5, 'VQ1L82', 'used', '2023-09-03 20:48:08', '2023-09-03 21:22:09'),
(384, 5, '6U04LM', 'used', '2023-09-03 20:48:08', '2023-09-03 21:22:09'),
(387, 5, '8STK2B', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(388, 5, 'G4RE45', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(389, 5, '32M9PB', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(390, 5, 'V4M6T2', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(391, 5, 'PQNBGD', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(392, 5, 'Y83PEK', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(393, 5, 'C8S79L', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(394, 5, 'GMJS4Z', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(395, 5, '9LWVXZ', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(396, 5, '9T0KU8', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(397, 5, 'CEHU6Y', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(398, 5, 'C11DT4', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(399, 5, 'PE4O4L', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(400, 5, 'PIGXJ7', 'in-stock', '2023-09-03 20:48:09', '2023-09-03 20:54:12'),
(401, 2, 'XXXXD2', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(402, 2, 'TJAU1I', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(403, 2, 'Z88Q8Y', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(404, 2, '4249JG', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(405, 2, 'UKPPP2', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(406, 2, 'B1QMYY', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(407, 2, '4EP93N', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(408, 2, '71IS25', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(409, 2, '312UFR', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(410, 2, 'EPQIVO', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(411, 2, '5758KM', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(412, 2, 'NG0DH8', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(413, 2, 'SODQRO', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(414, 2, 'A27WDZ', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(415, 2, '14XGHH', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(416, 2, '7RFK5U', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(417, 2, 'XKCZAZ', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(418, 2, 'L95X3R', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(419, 2, '2FCMWI', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(420, 2, 'OMFIWL', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(421, 2, '8E9GEF', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(422, 2, 'E2TBQG', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(423, 2, 'NBGXGM', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(424, 2, 'YCVAXW', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(425, 2, '1JGWLL', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(426, 2, 'MKSZ3G', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(427, 2, '7Q2VSD', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(428, 2, 'BQNKWH', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(429, 2, 'DLDVBO', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(430, 2, 'W8O3N9', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(431, 2, 'DR4MPB', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(432, 2, 'J8I0OV', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(433, 2, 'C03SAC', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(434, 2, 'F0NKS3', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(435, 2, 'JX2SX7', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(436, 2, '2MYSMD', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(437, 2, '4NNKB4', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(438, 2, 'C132OC', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(439, 2, '2T1S8X', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(440, 2, 'FELUA1', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(441, 2, 'N8DPM5', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(442, 2, 'ZSM1Z3', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(443, 2, 'V99J5A', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(444, 2, 'IXX5KP', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(445, 2, 'XMMSWN', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(446, 2, 'SPAO2R', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(447, 2, 'YTLC9L', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(448, 2, 'XU4EDX', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(449, 2, 'C2T5UH', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(450, 2, '0GP7ZY', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(451, 2, '0PJYKC', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(452, 2, 'T3UYNX', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(453, 2, 'J52RYI', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(454, 2, 'AJGIL5', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(455, 2, 'IC14AS', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(456, 2, 'T0YPX6', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(457, 2, 'LAO6KS', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(458, 2, '5JKGPP', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(459, 2, 'VRWFLI', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(460, 2, '32O8E5', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(465, 2, '0J54VC', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(466, 2, 'UGXDCV', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(467, 2, 'UISIM0', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(468, 2, 'VHX1I9', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(469, 2, '5WYAN0', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(470, 2, 'SW3JEU', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(471, 2, '0VPV7D', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(472, 2, 'BKLOOK', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(473, 2, '4IHDWJ', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(474, 2, 'JTP7J2', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(475, 2, 'EZ6LNT', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(476, 2, 'PQII87', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(477, 2, 'KNARWN', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(478, 2, '5GVYCM', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(479, 2, 'BJMPVN', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(480, 2, 'MGK0OR', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(481, 2, '1I60ZG', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(482, 2, 'IJ6JY2', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(483, 2, 'OHGMC0', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(484, 2, 'XTHGDV', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(485, 2, 'LHW2GV', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(486, 2, '5FJDX9', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(487, 2, 'CES9RR', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(488, 2, 'JT5SAF', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(489, 2, 'QXHFVG', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(490, 2, 'WEDG2P', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(491, 2, 'ZINZS5', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(492, 2, '8REA70', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(493, 2, 'U9ZAB4', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(494, 2, 'WT38Q7', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(495, 2, 'PSJNM6', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(496, 2, '94TPSY', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(497, 2, 'H35TIO', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(498, 2, 'ZW1IO5', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(499, 2, 'TFXPCY', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(500, 2, 'GBA3DH', 'in-stock', '2023-09-07 09:32:49', '2023-09-07 09:38:55'),
(501, 1, 'T6HO8V', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(502, 1, 'SQW8P5', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(503, 1, 'X063XU', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(504, 1, '6T9SDW', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(505, 1, 'SN8M03', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(506, 1, 'PGZI3V', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(507, 1, 'LIG1XF', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(508, 1, 'EXRTS0', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(509, 1, 'TVGMM4', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(510, 1, '5D5T4K', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(511, 1, 'CTQGJE', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(512, 1, 'M03S3G', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(513, 1, '2WCT2S', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(514, 1, 'XDPU2Q', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(515, 1, 'BZPY4F', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(516, 1, 'CIW1TN', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(517, 1, 'EQHV98', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(518, 1, 'FCK3NL', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(519, 1, 'FCB1U7', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(520, 1, 'CEJM9Y', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(521, 1, 'EG4OYW', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(522, 1, 'JLFMEX', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(523, 1, '45K0YJ', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(524, 1, 'LDN8OS', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(525, 1, 'J6HV0V', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(526, 1, 'P63VSP', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(527, 1, 'U5EELC', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(528, 1, 'LVWA6R', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(529, 1, '7H53OK', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(530, 1, 'I4JHQZ', 'in-print', '2023-09-18 06:46:15', '2023-09-18 06:46:48'),
(531, 1, 'GZF06G', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(532, 1, '189RP8', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(533, 1, '85GPGW', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(534, 1, 'J4NBEA', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(535, 1, 'J70M04', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(536, 1, '279DY3', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(537, 1, 'OEYT0A', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(538, 1, 'E9Z0IG', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(539, 1, 'WNYHKL', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(540, 1, 'WHQF8W', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(541, 1, 'YUJK8Y', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(542, 1, '9TCDP5', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(543, 1, '4ZLUMM', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(544, 1, 'QYXZGX', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(545, 1, '8O3WMP', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(546, 1, 'RCK97W', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(547, 1, 'PXESD7', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(548, 1, 'IDBL5W', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(549, 1, 'VX65KA', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(550, 1, 'IPB9PN', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(551, 1, 'SHFDCN', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(552, 1, 'TSKI1P', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(553, 1, '5F3UBZ', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(554, 1, 'ZI9JO9', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(555, 1, 'EATLET', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(556, 1, 'LL26YN', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(557, 1, '82ZYIG', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(558, 1, 'Q52552', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(559, 1, 'JDOGS4', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(560, 1, '1RZH52', 'in-print', '2023-10-02 06:03:58', '2023-10-02 06:05:51'),
(561, 1, 'TJ3VD9', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(562, 1, 'V72OEA', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(563, 1, '6MV4A7', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(564, 1, '6J16LS', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(565, 1, 'JAP996', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(566, 1, 'M2K3ME', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(567, 1, 'KVAYNB', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(568, 1, 'M6ZYR4', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(569, 1, 'ZGXAX0', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(570, 1, 'ZMIDYE', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(571, 1, 'A90MI8', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(572, 1, 'M08Y57', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(573, 1, 'NST521', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(574, 1, 'XJFVKB', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(575, 1, 'J8VSFQ', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(576, 1, 'ED3HW4', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(577, 1, 'N799L8', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(578, 1, 'O59E2K', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(579, 1, '6OMHEJ', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(580, 1, '1ZRYZC', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(581, 1, 'PZM0CP', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(582, 1, 'UCAFBO', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(583, 1, 'AIIBJA', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(584, 1, '17N1T1', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(585, 1, 'TS9VG6', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(586, 1, 'SW8BUM', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(587, 1, '1JZ25W', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(588, 1, '6OVMM7', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(589, 1, '79GV48', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(590, 1, 'XPRWKL', 'in-print', '2023-10-02 06:05:20', '2023-10-02 06:05:51'),
(591, 2, '9ALG5C', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(592, 2, 'ZWSMR0', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(593, 2, 'T6JBGS', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(594, 2, 'NEHKJR', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(595, 2, 'OAD530', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(596, 2, 'T3MTFH', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(597, 2, '81CD3F', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(598, 2, 'D2VVRD', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(599, 2, 'PRG58Q', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(600, 2, 'IFESD9', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(601, 2, '6J3L9W', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(602, 2, 'GYJZM5', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(603, 2, 'OWHBCK', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(604, 2, '1Y9FMI', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(605, 2, 'LA79E5', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(606, 2, 'V40W28', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(607, 2, '7PPFW3', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(608, 2, 'W01ELW', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(609, 2, '0DBJU5', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(610, 2, 'Z2ZK1R', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(611, 2, '1K73V3', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(612, 2, 'GO2NBP', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(613, 2, 'SZ75BF', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(614, 2, 'BXCRFC', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(615, 2, 'QCGF0A', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(616, 2, '0EYBD1', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(617, 2, 'MP8WNS', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(618, 2, 'ELTIPY', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(619, 2, 'ICLP3P', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(620, 2, 'RKWDQE', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(621, 2, 'NEZ2KZ', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(622, 2, 'ZYZPID', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(623, 2, 'PZJN59', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(624, 2, '5GERVH', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(625, 2, 'M0J94A', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(626, 2, '806CFA', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(627, 2, '6BDMLI', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(628, 2, '6Y9I6C', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(629, 2, 'HS4XYQ', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(630, 2, 'QV6XVU', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(631, 2, '734PUV', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(632, 2, 'WXV5RF', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(633, 2, 'YO537P', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(634, 2, 'OBIFRU', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(635, 2, 'VWJW0Y', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(636, 2, 'BY2SCT', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(637, 2, 'VU0WYG', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(638, 2, 'U75X3W', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(639, 2, 'W1EGLO', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(640, 2, 'MBBGWF', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(641, 2, 'D69BB2', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(642, 2, '33VCTR', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(643, 2, 'I9DIXA', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(644, 2, 'H6NLMC', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(645, 2, '86MY3Q', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(646, 2, 'ON94OA', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(647, 2, 'STN83B', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(648, 2, 'CT4PKX', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(649, 2, '90JKQO', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(650, 2, '1DORWR', 'in-print', '2023-10-03 20:47:07', '2023-10-03 20:47:33'),
(653, 1, 'V61BRP', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(654, 1, 'G0RDRU', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(655, 1, 'YGHEX5', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(656, 1, 'SMTFQM', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(657, 1, '3NO0DB', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(658, 1, '5PXL73', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(659, 1, 'YU2ARZ', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(660, 1, 'D3FLGF', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(661, 1, 'RPB49H', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(662, 1, 'NPT93L', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(663, 1, 'RP7HZD', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(664, 1, 'GRNKEY', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(665, 1, '3S953P', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(666, 1, 'N7GSG7', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(667, 1, '2SHTNR', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(668, 1, '8WH2NB', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(669, 1, 'FEATI5', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(670, 1, '9FGEH5', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(671, 1, '497BPP', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(672, 1, '0UH11V', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(673, 1, '3UENK0', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(674, 1, 'LM993V', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(675, 1, 'TWW69G', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(676, 1, '3S5OYH', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(677, 1, '4GU8JM', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(678, 1, 'FTCU1S', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(679, 1, 'UMNG7L', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26'),
(680, 1, '70HVFO', 'created', '2023-11-16 04:46:26', '2023-11-16 04:46:26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ticket_types`
--

CREATE TABLE `ticket_types` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `slug` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` double(12,2) NOT NULL,
  `fee` double(8,2) NOT NULL DEFAULT 0.00,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `image` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `ticket_types`
--

INSERT INTO `ticket_types` (`id`, `slug`, `name`, `price`, `fee`, `is_active`, `image`, `created_at`, `updated_at`) VALUES
(1, 'domestik-1', 'Domestik 1', 35000.00, 42.86, 1, 'b0f348b8-483c-4ac0-80ad-c81f811a0d56.jpg', '2023-09-02 09:28:09', '2023-11-16 04:12:37'),
(2, 'international', 'International', 50000.00, 50.00, 1, '2bd82902-8fda-4c05-bda5-bd19d16a0f56.jpg', '2023-09-02 09:28:39', '2023-11-16 04:13:20'),
(3, 'anak-anak', 'Anak-Anak', 15000.00, 50.00, 1, 'bracelet-ticket.png', '2023-09-02 09:29:17', '2023-09-02 09:29:17'),
(4, 'preweding-domestik', 'Preweding Domestik', 535000.00, 3.00, 1, 'bracelet-ticket.png', '2023-09-02 09:31:27', '2023-09-04 06:16:02'),
(5, 'preweding-international', 'Preweding International', 1050000.00, 2.00, 1, 'bracelet-ticket.png', '2023-09-02 09:32:52', '2023-09-04 06:16:15'),
(7, 'test', 'Test', 20000.00, 4.00, 1, 'c8ac6c7c-bab3-45c5-a4a5-88bdd40c0edd.png', '2023-11-16 15:01:09', '2023-11-16 16:04:15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `role_id` int(10) UNSIGNED NOT NULL,
  `job_position` varchar(255) DEFAULT NULL,
  `is_active` tinyint(4) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `uuid`, `name`, `email`, `password`, `email_verified_at`, `role_id`, `job_position`, `is_active`, `created_at`, `updated_at`) VALUES
(1, '2b9665bc-7222-4258-a987-d17431269cec', 'Super Administrator', 'admin@gmail.com', '$2y$10$xiKk381s1VEbqWJ8z5Ry6.mdn0846cUIAvLejESeiKJjx2pdIAhLG', '2023-09-01 10:11:25', 0, 'Super Administrator', 1, '2023-09-01 10:11:25', '2023-09-01 10:11:25'),
(2, '53d19858-286d-4b2f-bc6b-7ae0aaa81ddf', 'Lanang Darma', 'lanangobey123@gmail.com', '$2y$16$e6b7BZ.1LmaoHvtuP4ft5OExK1CAAxBsDgJuu0j7HuhjrP.qi1YYm', '2023-11-08 10:40:07', 0, 'Super Administrator', 1, '2023-11-08 10:40:07', '2023-11-08 10:40:07'),
(6, '2e69dbf3-49c3-4b3e-b171-561fae0228ab', 'Teja', 'teja123@gmail.com', '$2y$10$RA0/EjOGwPmiPMc0Vh4Jbu2536W35I8nk2Y4IMK3BfGcN6GFqOXwq', '2023-11-11 12:13:44', 4, 'Petugas parkir', 1, '2023-11-12 00:13:44', '2023-11-12 00:56:40'),
(8, '6943c880-dd38-42d7-8ae1-6a8255202c43', 'Parkir1', 'parkir1@gmail.com', '$2y$10$oPktMcGn0Xaz4aWMGmocmOXXEFdSvlJyMyLgScHa.1pGMQpkO8uM.', '2023-11-16 04:30:05', 4, 'parkir', 1, '2023-11-16 04:30:05', '2023-11-16 04:30:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `vouchers`
--

CREATE TABLE `vouchers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(255) NOT NULL,
  `type` varchar(255) NOT NULL,
  `nominal` double(12,2) NOT NULL DEFAULT 0.00,
  `max` double(12,2) NOT NULL DEFAULT 0.00,
  `status` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `car_types`
--
ALTER TABLE `car_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `car_types_slug_unique` (`slug`),
  ADD UNIQUE KEY `car_types_name_unique` (`name`),
  ADD KEY `car_types_id_slug_index` (`id`,`slug`);

--
-- Indeks untuk tabel `checkin_object`
--
ALTER TABLE `checkin_object`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `checkin_parking`
--
ALTER TABLE `checkin_parking`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `checkin_parking_checkin_number_unique` (`checkin_number`),
  ADD KEY `checkin_parking_id_car_type_id_index` (`id`,`car_type_id`);

--
-- Indeks untuk tabel `checkin_rides`
--
ALTER TABLE `checkin_rides`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `configs`
--
ALTER TABLE `configs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `configs_id_name_index` (`id`,`name`);

--
-- Indeks untuk tabel `fee_transfers`
--
ALTER TABLE `fee_transfers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fee_transfers_id_guide_id_order_id_index` (`id`,`guide_id`,`order_id`);

--
-- Indeks untuk tabel `guides`
--
ALTER TABLE `guides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `guides_member_number_unique` (`member_number`),
  ADD UNIQUE KEY `guides_phone_unique` (`phone`),
  ADD KEY `guides_id_uuid_member_number_index` (`id`,`uuid`,`member_number`);

--
-- Indeks untuk tabel `handovers`
--
ALTER TABLE `handovers`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `order_number` (`order_number`),
  ADD KEY `orders_id_guide_id_index` (`id`,`guide_id`),
  ADD KEY `orders_id_guide_id_created_at_index` (`id`,`guide_id`,`created_at`);

--
-- Indeks untuk tabel `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_items_id_product_type_product_id_index` (`id`,`product_type`,`product_id`),
  ADD KEY `order_items_id_order_id_product_type_product_id_index` (`id`,`order_id`,`product_type`,`product_id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rides_slug_unique` (`slug`),
  ADD UNIQUE KEY `rides_name_unique` (`name`),
  ADD KEY `rides_id_slug_index` (`id`,`slug`);

--
-- Indeks untuk tabel `ride_owners`
--
ALTER TABLE `ride_owners`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ride_owners_id_uuid_index` (`id`,`uuid`);

--
-- Indeks untuk tabel `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`),
  ADD KEY `roles_id_uuid_name_index` (`id`,`uuid`,`name`);

--
-- Indeks untuk tabel `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tickets_code_unique` (`code`),
  ADD KEY `tickets_id_code_ticket_type_id_status_index` (`id`,`code`,`ticket_type_id`,`status`);

--
-- Indeks untuk tabel `ticket_types`
--
ALTER TABLE `ticket_types`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ticket_types_slug_unique` (`slug`),
  ADD UNIQUE KEY `ticket_types_name_unique` (`name`),
  ADD KEY `ticket_types_id_slug_index` (`id`,`slug`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indeks untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `vouchers_code_unique` (`code`),
  ADD KEY `vouchers_id_code_status_index` (`id`,`code`,`status`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `car_types`
--
ALTER TABLE `car_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `checkin_object`
--
ALTER TABLE `checkin_object`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `checkin_parking`
--
ALTER TABLE `checkin_parking`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `checkin_rides`
--
ALTER TABLE `checkin_rides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `configs`
--
ALTER TABLE `configs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `fee_transfers`
--
ALTER TABLE `fee_transfers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `guides`
--
ALTER TABLE `guides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `handovers`
--
ALTER TABLE `handovers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `order_items`
--
ALTER TABLE `order_items`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT untuk tabel `rides`
--
ALTER TABLE `rides`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ride_owners`
--
ALTER TABLE `ride_owners`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=681;

--
-- AUTO_INCREMENT untuk tabel `ticket_types`
--
ALTER TABLE `ticket_types`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `vouchers`
--
ALTER TABLE `vouchers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
