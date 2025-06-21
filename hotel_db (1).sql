-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2025 at 06:07 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `location` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`id`, `name`, `location`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Grand Horizon Hotel', '1386 Benny Knolls\nNorth Osbaldoton, KY 37485-7425', 'Experience elegance and comfort with stunning skyline views in the heart of the city.', '2025-06-13 06:03:16', '2025-06-13 06:03:16'),
(2, 'Serenity Garden Resort', '61808 Janie Dale\nMarilouport, NV 36140', 'A peaceful retreat surrounded by lush gardens and serene ambiance, perfect for relaxation.', '2025-06-13 06:03:16', '2025-06-13 06:03:16'),
(3, 'Regal Heights Suites', '324 Troy Rest\nLake Angelabury, UT 02008', 'Luxury redefined with spacious suites, premium amenities, and panoramic views.', '2025-06-13 06:03:16', '2025-06-13 06:03:16'),
(4, 'Oceanview Plaza Inn', '7068 Dicki Roads\nLake Cristian, HI 85894', 'Wake up to breathtaking ocean views in this modern beachfront haven.', '2025-06-13 06:03:16', '2025-06-13 06:03:16'),
(5, 'The Heritage Royale', '33291 Maggio Trace\nKeshaunchester, CO 98827-7393', 'Blend of classic architecture and contemporary luxury nestled in a historic district.', '2025-06-13 06:03:16', '2025-06-13 06:03:16'),
(6, 'Skyline Luxe Hotel', '311 Hettinger Run Suite 276\nPort Orvalshire, WA 97983-7817', 'Chic and stylish urban escape offering top-tier comfort in the city’s vibrant core.\n\n', '2025-06-13 06:03:16', '2025-06-13 06:03:16');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(56, '2014_10_12_000000_create_users_table', 1),
(57, '2014_10_12_100000_create_password_resets_table', 1),
(58, '2019_08_19_000000_create_failed_jobs_table', 1),
(59, '2025_04_29_003153_create_hotels_table', 1),
(60, '2025_04_29_003218_create_rooms_table', 1),
(61, '2025_04_29_165117_create_bookings_table', 1),
(62, '2025_05_03_035825_create_reservations_table', 1),
(63, '2025_05_03_070250_add_role_to_users_table', 1),
(64, '2025_06_13_103825_add_is_admin_to_users_table', 1),
(65, '2025_06_13_104833_add_image_to_rooms_table', 1),
(66, '2025_06_13_105147_create_room_details_table', 1),
(67, '2025_06_15_112412_add_check_in_status_to_reservations_table', 2),
(68, '2025_06_16_092847_add_room_number_to_rooms_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guest_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guests` int(11) NOT NULL,
  `checkin_status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'PENDING',
  `payment_status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `check_in_status` enum('CHECK_IN','CHECK_OUT') COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `guest_name`, `email`, `check_in`, `check_out`, `room_type`, `guests`, `checkin_status`, `payment_status`, `created_at`, `updated_at`, `check_in_status`) VALUES
(1, 'Dolly Schaefer', 'beth.sawayn@example.com', '2025-06-26', '2025-07-02', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(2, 'Dean Lesch', 'estel.klocko@example.net', '2025-06-27', '2025-06-29', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(3, 'Braulio Larson', 'augustine13@example.net', '2025-06-26', '2025-06-30', 'Double', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(4, 'Jovanny Rolfson', 'lkuhn@example.net', '2025-06-24', '2025-06-30', 'Double', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(5, 'Allan O\'Reilly', 'joanny86@example.net', '2025-06-21', '2025-06-30', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(6, 'Kaitlin Boyle', 'delpha.strosin@example.net', '2025-06-22', '2025-06-28', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(7, 'Loyce Zemlak', 'karson.wiza@example.net', '2025-06-24', '2025-07-03', 'Double', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(8, 'Dr. Concepcion Dickinson', 'tabitha.hessel@example.net', '2025-06-28', '2025-07-03', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(9, 'Caroline Kuhic', 'hackett.aidan@example.net', '2025-06-22', '2025-07-01', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(10, 'Prof. Edna Schuster I', 'stokes.gayle@example.com', '2025-06-21', '2025-07-04', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(11, 'Giuseppe Orn', 'strosin.harry@example.net', '2025-06-23', '2025-07-01', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(12, 'Nels Ondricka Sr.', 'orie.marquardt@example.com', '2025-06-24', '2025-07-05', 'Single', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(13, 'Prof. Sonia Murazik IV', 'samir01@example.net', '2025-06-27', '2025-07-03', 'Double', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(14, 'Nicholaus Kiehn', 'vince81@example.com', '2025-06-26', '2025-07-02', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(15, 'Gustave Hintz', 'pattie77@example.org', '2025-06-26', '2025-06-29', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(16, 'Alia Weissnat DDS', 'dlebsack@example.net', '2025-06-22', '2025-06-28', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(17, 'Camryn Schoen', 'mossie.kerluke@example.net', '2025-06-25', '2025-07-01', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(18, 'Claudine Becker', 'bernice69@example.org', '2025-06-28', '2025-06-30', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(19, 'Muhammad Cartwright III', 'okessler@example.net', '2025-06-25', '2025-07-05', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(20, 'Prof. Eulah Brown', 'wbaumbach@example.net', '2025-06-23', '2025-07-01', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(21, 'Julia Ziemann', 'bhermiston@example.com', '2025-06-26', '2025-06-28', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(22, 'Aurelia Emmerich Sr.', 'urban10@example.com', '2025-06-24', '2025-07-03', 'Double', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(23, 'Dr. Janelle Nader', 'ocasper@example.org', '2025-06-27', '2025-07-05', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(24, 'Leone Altenwerth', 'lgrant@example.com', '2025-06-23', '2025-06-29', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(25, 'Zetta Schowalter', 'reinger.benny@example.com', '2025-06-25', '2025-06-28', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(26, 'Dr. Brandyn Prosacco V', 'xhartmann@example.net', '2025-06-23', '2025-07-03', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(27, 'Prof. Ethan Beatty III', 'landen01@example.org', '2025-06-24', '2025-06-29', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(28, 'Lesley Heller', 'kpaucek@example.com', '2025-06-26', '2025-07-01', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(29, 'Dr. Earline Frami', 'vharvey@example.net', '2025-06-25', '2025-06-29', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(30, 'Dr. Axel Zemlak V', 'zachariah10@example.net', '2025-06-25', '2025-07-03', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(31, 'Amaya Schinner', 'leichmann@example.net', '2025-06-27', '2025-06-29', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(32, 'Prof. Raven Ortiz DVM', 'cyrus.schimmel@example.net', '2025-06-25', '2025-06-29', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(33, 'Brianne Ullrich', 'kirlin.boyd@example.com', '2025-06-25', '2025-07-03', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(34, 'Dr. Vidal Jakubowski PhD', 'arnulfo57@example.com', '2025-06-21', '2025-07-01', 'Double', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(35, 'Prof. Gina Senger DDS', 'larissa.lesch@example.com', '2025-06-25', '2025-06-30', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(36, 'Miss Linnea Hickle', 'thad05@example.org', '2025-06-27', '2025-07-04', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(37, 'Amaya Heaney', 'estrella.kassulke@example.org', '2025-06-23', '2025-06-29', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(38, 'Conner Stroman', 'leon43@example.org', '2025-06-23', '2025-06-29', 'Double', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(39, 'Billie Volkman', 'ulittel@example.net', '2025-06-28', '2025-07-03', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(40, 'Dr. Ellis Friesen Jr.', 'yazmin.lindgren@example.org', '2025-06-24', '2025-07-03', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(41, 'Miss Cordie Upton', 'ova.swift@example.net', '2025-06-22', '2025-06-30', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(42, 'Rey Sawayn DDS', 'dquigley@example.org', '2025-06-21', '2025-07-04', 'Double', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(43, 'Elinor Stokes', 'pfeffer.dortha@example.com', '2025-06-25', '2025-07-02', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(44, 'Ahmad Thompson', 'shaniya83@example.net', '2025-06-21', '2025-07-01', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(45, 'Dasia Watsica', 'lia61@example.com', '2025-06-22', '2025-06-29', 'Double', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(46, 'Brendan Reichel', 'jamil.mills@example.com', '2025-06-28', '2025-07-03', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(47, 'Mr. Scottie Bergstrom V', 'marlon.hintz@example.net', '2025-06-22', '2025-07-05', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(48, 'Jasmin Nolan', 'christop44@example.org', '2025-06-23', '2025-06-30', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(49, 'Dr. Dayna Spinka', 'xrolfson@example.org', '2025-06-25', '2025-07-04', 'Double', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(50, 'Christa Heidenreich', 'waters.brennon@example.net', '2025-06-25', '2025-07-01', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(51, 'Prof. Ulices Upton DVM', 'hmarquardt@example.com', '2025-06-24', '2025-06-28', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(52, 'Garland Champlin', 'turner.duane@example.org', '2025-06-26', '2025-06-29', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(53, 'Prof. Danial Mohr', 'tlowe@example.net', '2025-06-23', '2025-07-04', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(54, 'Keely Roberts DDS', 'parker27@example.net', '2025-06-25', '2025-07-05', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(55, 'Dr. Sigurd Bosco III', 'vernser@example.org', '2025-06-28', '2025-07-03', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(56, 'Sanford Bahringer IV', 'iblanda@example.com', '2025-06-22', '2025-06-29', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(57, 'Lizeth Cole', 'matilda.bauch@example.com', '2025-06-26', '2025-06-29', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(58, 'Dusty Carter', 'kade.bauch@example.net', '2025-06-21', '2025-07-02', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(59, 'Stephany Beier', 'egusikowski@example.org', '2025-06-23', '2025-06-30', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(60, 'Rogers Anderson', 'clovis53@example.net', '2025-06-24', '2025-06-28', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(61, 'Arianna Glover', 'osmith@example.com', '2025-06-22', '2025-06-30', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(62, 'Keara Runolfsdottir', 'aoberbrunner@example.com', '2025-06-23', '2025-07-02', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(63, 'Mathias Cremin', 'lonzo35@example.com', '2025-06-25', '2025-07-04', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(64, 'Elfrieda Rogahn IV', 'wehner.vivianne@example.org', '2025-06-26', '2025-06-28', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(65, 'Ramona Bartell III', 'lrunolfsdottir@example.net', '2025-06-22', '2025-07-01', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(66, 'Frieda Crona', 'marvin.monahan@example.net', '2025-06-25', '2025-07-03', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(67, 'Rosalia Gutmann', 'isimonis@example.net', '2025-06-24', '2025-06-29', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(68, 'Daphnee Lindgren III', 'lreynolds@example.org', '2025-06-24', '2025-06-29', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(69, 'Mr. Boris Ankunding Sr.', 'francisca.braun@example.net', '2025-06-27', '2025-07-04', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(70, 'Dr. Jany Runte', 'kertzmann.carmella@example.net', '2025-06-22', '2025-07-05', 'Single', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(71, 'Marley Baumbach', 'fratke@example.net', '2025-06-26', '2025-07-04', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(72, 'Gwendolyn Goyette', 'dangelo44@example.com', '2025-06-21', '2025-07-01', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(73, 'Mr. Elroy Luettgen', 'klangworth@example.com', '2025-06-21', '2025-07-02', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(74, 'Irwin Effertz', 'mhermiston@example.com', '2025-06-21', '2025-06-28', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(75, 'Edna Paucek', 'zrau@example.com', '2025-06-27', '2025-07-03', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(76, 'Dawn Fisher', 'kling.lessie@example.org', '2025-06-24', '2025-07-02', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(77, 'Dorian Klein', 'meaghan.harvey@example.org', '2025-06-26', '2025-07-01', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(78, 'Keyshawn Hettinger', 'qmurphy@example.com', '2025-06-22', '2025-06-30', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(79, 'Angus Schuster', 'maureen.reichel@example.com', '2025-06-27', '2025-07-02', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(80, 'Ila Boehm III', 'ludie38@example.net', '2025-06-21', '2025-07-05', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(81, 'Olen Smitham PhD', 'abbigail37@example.com', '2025-06-25', '2025-07-03', 'Single', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(82, 'Rebeka O\'Keefe', 'vdamore@example.org', '2025-06-26', '2025-07-04', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(83, 'Danika Huel', 'russel.ulises@example.org', '2025-06-26', '2025-06-28', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(84, 'Miss Elody Kilback', 'wnicolas@example.com', '2025-06-25', '2025-06-30', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(85, 'Aiden Bartoletti', 'pfeffer.lempi@example.net', '2025-06-28', '2025-06-28', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(86, 'Prof. Duane Stehr', 'lexie78@example.org', '2025-06-24', '2025-07-05', 'Suite', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(87, 'Rocio Hermann', 'aziemann@example.org', '2025-06-27', '2025-06-29', 'Single', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(88, 'Nichole Denesik', 'bauch.kasey@example.net', '2025-06-27', '2025-07-01', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(89, 'Prof. Steve Cremin IV', 'brown.lenora@example.com', '2025-06-22', '2025-06-29', 'Suite', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(90, 'Hans Sauer', 'yessenia00@example.org', '2025-06-28', '2025-06-28', 'Single', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(91, 'Lemuel Wiza DDS', 'wolf.alexandro@example.org', '2025-06-24', '2025-06-28', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(92, 'Maria Watsica', 'kaylie.hauck@example.com', '2025-06-28', '2025-06-30', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(93, 'Timothy Quigley', 'roselyn.sawayn@example.org', '2025-06-23', '2025-07-01', 'Double', 1, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(94, 'Prof. Amy Tremblay', 'dkuphal@example.com', '2025-06-22', '2025-07-02', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(95, 'Prof. Aric Metz Jr.', 'reginald66@example.net', '2025-06-23', '2025-07-04', 'Double', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(96, 'Hipolito Paucek', 'rpfeffer@example.org', '2025-06-27', '2025-07-03', 'Suite', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(97, 'Wendell Heathcote', 'yessenia36@example.org', '2025-06-26', '2025-07-03', 'Single', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(98, 'Verner Beier', 'xhegmann@example.org', '2025-06-23', '2025-07-05', 'Double', 4, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(99, 'Prof. Justina Osinski', 'norwood.medhurst@example.com', '2025-06-24', '2025-07-03', 'Suite', 3, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(100, 'Celia Abshire III', 'hirthe.miracle@example.net', '2025-06-28', '2025-07-04', 'Double', 2, 'PENDING', 0, '2025-06-14 05:57:37', '2025-06-14 05:57:37', NULL),
(101, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-11', '2025-06-19', 'et', 2, 'PENDING', 0, '2025-06-14 06:18:07', '2025-06-14 06:18:07', NULL),
(102, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-26', '2025-06-28', 'et', 2, 'PENDING', 0, '2025-06-14 06:22:23', '2025-06-14 06:22:23', NULL),
(103, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-07-03', '2025-07-12', 'et', 3, 'PENDING', 0, '2025-06-14 06:29:47', '2025-06-14 06:29:47', NULL),
(104, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-04', '2025-06-20', 'et', 3, 'PENDING', 0, '2025-06-14 06:30:46', '2025-06-14 06:30:46', NULL),
(105, '', 'ab@gmail.com', '2025-06-14', '2025-06-14', 'basit', 1, 'PENDING', 0, '2025-06-14 08:07:07', '2025-06-14 08:07:07', NULL),
(106, 'XYZ', 'xyz@gmail.com', '2025-06-15', '2025-06-20', '', 1, 'PENDING', 0, '2025-06-14 08:13:43', '2025-06-14 08:13:43', NULL),
(107, 'XYZ', 'xyz@gmail.com', '2025-06-14', '2025-06-14', '', 1, 'PENDING', 0, '2025-06-14 08:14:03', '2025-06-14 08:14:03', NULL),
(108, 'Basit', 'todaytesting1@gmail.com', '2025-06-15', '2025-06-20', 'test', 2, 'CHECK_OUT', 1, '2025-06-14 08:59:02', '2025-06-15 06:42:00', NULL),
(109, 'index.php', 'ab.pk012@gmail.com', '2025-06-15', '2025-06-17', 'ipsam', 2, 'CHECK_OUT', 1, '2025-06-15 05:37:37', '2025-06-15 06:40:33', NULL),
(112, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-17', '2025-06-18', 'adipisci', 2, 'PENDING', 0, '2025-06-15 07:00:11', '2025-06-15 07:00:11', NULL),
(114, 'Test', 'a@gmail.com', '2025-06-18', '2025-06-19', 'Luxury Queen Room', 2, 'PENDING', 0, '2025-06-16 23:56:32', '2025-06-16 23:56:32', NULL),
(115, 'RADHA', 'radhamorgan96@gmail.com', '2025-06-25', '2025-06-27', 'Deluxe King Room', 2, 'PENDING', 0, '2025-06-17 03:17:14', '2025-06-17 03:17:14', NULL),
(116, 'RADHA', 'radhamorgan96@gmail.com', '2025-06-25', '2025-06-28', 'Deluxe King Room', 2, 'PENDING', 0, '2025-06-17 03:18:37', '2025-06-17 03:18:37', NULL),
(117, 'RADHA', 'radhamorgan96@gmail.com', '2025-06-25', '2025-06-28', 'Business King Room', 2, 'PENDING', 0, '2025-06-17 03:20:15', '2025-06-17 03:43:41', NULL),
(118, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-17', '2025-06-20', 'King Room with City View', 2, 'PENDING', 0, '2025-06-17 11:45:59', '2025-06-17 11:45:59', NULL),
(119, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-17', '2025-06-20', 'King Room with City View', 2, 'PENDING', 0, '2025-06-17 11:51:03', '2025-06-17 11:51:03', NULL),
(120, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-17', '2025-06-20', 'King Room with City View', 2, 'PENDING', 0, '2025-06-17 11:52:58', '2025-06-17 11:52:58', NULL),
(121, 'A1', 'a@gmail.com', '2025-06-21', '2025-06-22', 'Executive Suite', 1, 'PENDING', 0, '2025-06-18 03:17:54', '2025-06-18 03:17:54', NULL),
(122, 'RADHA', 'radhamorgan96@gmail.com', '2025-06-26', '2025-06-30', 'Deluxe King Room', 2, 'PENDING', 0, '2025-06-18 03:35:09', '2025-06-18 03:35:09', NULL),
(123, 'Atest', 'arvingurusamy05@gmail.com', '2025-06-27', '2025-06-29', 'King Room with City View', 2, 'PENDING', 0, '2025-06-18 03:36:28', '2025-06-18 03:36:28', NULL),
(124, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-18', '2025-06-19', 'Presidential Suite', 2, 'PENDING', 0, '2025-06-18 09:42:12', '2025-06-18 09:42:12', NULL),
(125, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-18', '2025-06-21', 'Luxury Queen Room', 1, 'PENDING', 0, '2025-06-18 09:47:31', '2025-06-18 09:47:31', NULL),
(126, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-18', '2025-06-19', 'Business King Room', 1, 'PENDING', 0, '2025-06-18 09:49:49', '2025-06-18 09:49:49', NULL),
(127, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-18', '2025-06-19', 'Executive Suite', 2, 'PENDING', 1, '2025-06-18 09:59:00', '2025-06-18 10:01:28', NULL),
(128, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-18', '2025-06-20', 'Deluxe King Room', 1, 'PENDING', 0, '2025-06-18 10:04:38', '2025-06-18 10:04:38', NULL),
(129, 'Abdul Basit', 'ab.pk012@gmail.com', '2025-06-18', '2025-06-20', 'King Room with City View', 1, 'CHECK_IN', 1, '2025-06-18 10:06:08', '2025-06-18 14:25:28', NULL),
(131, 'LEAVINISH', 'leavinsih8@gmail.com', '2025-07-30', '2025-08-03', 'Executive Suite', 2, 'CHECK_IN', 1, '2025-06-18 14:27:13', '2025-06-18 14:35:05', NULL),
(132, 'RADHA', 'radhamorgan96@gmail.com', '2025-06-27', '2025-06-28', 'King Room with City View', 1, 'CHECK_IN', 0, '2025-06-18 14:36:12', '2025-06-18 14:37:11', NULL),
(164, 'John Doe', 'member2group17@yopmail.com', '2025-06-20', '2025-06-25', 'Presidential Suite', 4, 'PENDING', 1, '2025-06-19 15:22:30', '2025-06-19 15:22:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `hotel_id` bigint(20) UNSIGNED NOT NULL,
  `room_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` decimal(8,2) NOT NULL,
  `capacity` int(11) NOT NULL,
  `available` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`id`, `hotel_id`, `room_type`, `price`, `capacity`, `available`, `created_at`, `updated_at`, `image`) VALUES
(7, 1, 'Executive Suite', 350.00, 2, 1, '2025-06-16 09:57:18', '2025-06-18 09:59:00', 'https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg'),
(8, 2, 'Deluxe King Room', 280.00, 2, 1, '2025-06-16 09:57:18', '2025-06-18 03:35:09', 'https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080'),
(9, 3, 'King Room with City View', 300.00, 3, 1, '2025-06-16 09:57:18', '2025-06-18 03:36:28', 'https://images.ctfassets.net/cfo01h0nogc2/5tmwmZttnt2MXYTbi63xHe/2c76feac904174f21071583e0aad74ec/ExectiveSuiteRoom_King.jpg?w=1992'),
(10, 4, 'Presidential Suite', 500.00, 4, 1, '2025-06-16 09:57:18', '2025-06-18 09:42:12', 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=900&width=1600'),
(11, 5, 'Luxury Queen Room', 260.00, 2, 1, '2025-06-16 09:57:18', '2025-06-18 09:47:31', 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg'),
(12, 6, 'Business King Room', 310.00, 2, 1, '2025-06-16 09:57:18', '2025-06-18 09:49:49', 'https://image-tc.galaxy.tf/wijpeg-3percd2qvgri3i6uymlforg9x/king-working.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_details`
--

CREATE TABLE `room_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `room_id` bigint(20) UNSIGNED NOT NULL,
  `banner_image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_1` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_2` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_3` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_4` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `long_description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `room_details`
--

INSERT INTO `room_details` (`id`, `room_id`, `banner_image`, `image_1`, `image_2`, `image_3`, `image_4`, `long_description`, `created_at`, `updated_at`) VALUES
(1, 7, 'https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg', 'https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080', 'https://images.ctfassets.net/cfo01h0nogc2/5tmwmZttnt2MXYTbi63xHe/2c76feac904174f21071583e0aad74ec/ExectiveSuiteRoom_King.jpg?w=1992', 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=900&width=1600', 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg', 'Spacious Executive Room with plush interiors and panoramic views.', '2025-06-16 10:00:04', '2025-06-16 10:00:04'),
(2, 8, 'https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080', 'https://images.ctfassets.net/cfo01h0nogc2/5tmwmZttnt2MXYTbi63xHe/2c76feac904174f21071583e0aad74ec/ExectiveSuiteRoom_King.jpg?w=1992', 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=900&width=1600', 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg', 'https://image-tc.galaxy.tf/wijpeg-3percd2qvgri3i6uymlforg9x/king-working.jpg', 'Modern room with luxurious touches, ideal for business or leisure.', '2025-06-16 10:00:04', '2025-06-16 10:00:04'),
(3, 9, 'https://images.ctfassets.net/cfo01h0nogc2/5tmwmZttnt2MXYTbi63xHe/2c76feac904174f21071583e0aad74ec/ExectiveSuiteRoom_King.jpg?w=1992', 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=900&width=1600', 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg', 'https://image-tc.galaxy.tf/wijpeg-3percd2qvgri3i6uymlforg9x/king-working.jpg', 'https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg', 'Cozy space with elegant décor and high-end comfort.', '2025-06-16 10:00:04', '2025-06-16 10:00:04'),
(4, 10, 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=900&width=1600', 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg', 'https://image-tc.galaxy.tf/wijpeg-3percd2qvgri3i6uymlforg9x/king-working.jpg', 'https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg', 'https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080', 'Deluxe suite with a royal ambiance and luxurious amenities.', '2025-06-16 10:00:04', '2025-06-16 10:00:04'),
(5, 11, 'https://carrolldesign.co.uk/wp-content/uploads/2023/01/luxury-hotel-bedroom-design.jpg', 'https://image-tc.galaxy.tf/wijpeg-3percd2qvgri3i6uymlforg9x/king-working.jpg', 'https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg', 'https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080', 'https://images.ctfassets.net/cfo01h0nogc2/5tmwmZttnt2MXYTbi63xHe/2c76feac904174f21071583e0aad74ec/ExectiveSuiteRoom_King.jpg?w=1992', 'A luxury room with chic styling, high-end lighting, and comfort.', '2025-06-16 10:00:04', '2025-06-16 10:00:04'),
(6, 12, 'https://image-tc.galaxy.tf/wijpeg-3percd2qvgri3i6uymlforg9x/king-working.jpg', 'https://www.admiralhotelmanila.com/wp-content/uploads/sites/224/2021/11/Executive-Suite.jpg', 'https://image-tc.galaxy.tf/wijpeg-87fq775odc2zjt7gi9hp3tlv0/executive-suite-hall_wide.jpg?crop=0%2C100%2C1920%2C1080', 'https://images.ctfassets.net/cfo01h0nogc2/5tmwmZttnt2MXYTbi63xHe/2c76feac904174f21071583e0aad74ec/ExectiveSuiteRoom_King.jpg?w=1992', 'https://imageio.forbes.com/specials-images/imageserve/652f603a91415a3d647fc207/0x0.jpg?fit=bounds&format=jpg&height=900&width=1600', 'Premium king room with workspace, perfect for working professionals.', '2025-06-16 10:00:04', '2025-06-16 10:00:04');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `role` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'guest',
  `is_admin` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `role`, `is_admin`) VALUES
(1, 'Admin', 'admin@gmail.com', NULL, '$2y$10$6vmkBJnoq7sXZDYUgqnlFeLnhz.RZTyIyRas3PVdejr1hp49dlQ12', NULL, '2025-06-14 05:57:36', '2025-06-14 05:57:36', 'admin', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
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
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rooms_hotel_id_foreign` (`hotel_id`);

--
-- Indexes for table `room_details`
--
ALTER TABLE `room_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_details_room_id_foreign` (`room_id`);

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
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=301;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=165;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `room_details`
--
ALTER TABLE `room_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `rooms`
--
ALTER TABLE `rooms`
  ADD CONSTRAINT `rooms_hotel_id_foreign` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_details`
--
ALTER TABLE `room_details`
  ADD CONSTRAINT `room_details_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
