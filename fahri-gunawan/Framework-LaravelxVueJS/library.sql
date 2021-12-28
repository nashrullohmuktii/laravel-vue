-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 28, 2021 at 04:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library`
--

-- --------------------------------------------------------

--
-- Table structure for table `authors`
--

CREATE TABLE `authors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `authors`
--

INSERT INTO `authors` (`id`, `name`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Glennie Abernathy', '082256950993', '4629 Eulalia Mountains\nSchambergerton, ME 05995', 'kautzer.mohammed@hotmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(2, 'Dr. Hiram Mertz Sr.', '08223135379', '451 Ismael Underpass\nAnabelberg, NH 54556-1316', 'roman.cruickshank@block.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(3, 'Dr. Jillian Lang', '082229509165', '697 Cartwright Rest Apt. 728\nSouth Johnborough, WA 12364', 'wschmidt@welch.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(4, 'Dr. Okey Kautzer PhD', '082243319868', '2903 Jonatan Fall Apt. 224\nPort Aaliyah, HI 76964-2074', 'watsica.enola@hotmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(5, 'Mrs. Callie Krajcik', '082280585934', '855 Stamm Isle\nNorth Leonardohaven, OK 64344', 'raynor.tristin@gmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(6, 'Braden Williamson', '082210345416', '1292 Estefania Island Suite 773\nHebermouth, IA 89711-8469', 'tlarkin@smitham.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(7, 'Prof. Theodora Goldner IV', '08225048424', '98236 Bret Radial Apt. 114\nCristshire, VA 36669', 'ckonopelski@kemmer.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(8, 'Mitchell Davis', '082227756277', '9157 Stephon Street\nNorth Marques, NC 19786-6028', 'gabriel.gusikowski@walter.net', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(9, 'Mr. Branson Shields MD', '082236256903', '5835 Creola Path Suite 080\nNew Amariville, ID 10008-1646', 'patrick55@kling.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(10, 'Dudley Fay', '082243907247', '31813 Wyman Burg Apt. 638\nEast Jasmin, MA 39969', 'kwiegand@hotmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(11, 'Susana Krajcik', '082261717667', '7771 Jarrett Pass Suite 155\nNew Rosemarie, WV 34167', 'west.lou@smitham.info', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(12, 'Yesenia Stark', '082211913066', '4923 Hickle Road Apt. 044\nEast Stefaniefurt, IN 27425', 'sabrina.beahan@hotmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(13, 'Carissa Yost MD', '082232793402', '45915 Adaline Rapids Apt. 193\nLeatown, NY 65988', 'yrodriguez@gmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(14, 'Agustina Prosacco', '082261021646', '423 Cordell Route Suite 336\nPort Deanhaven, DE 49953', 'yessenia.kshlerin@hotmail.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(15, 'Amir Considine', '082244729415', '437 Jerald Falls Apt. 510\nSheilachester, ME 08168-9052', 'gaylord.lexi@skiles.org', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(16, 'Miss Daisy Torphy', '082238223161', '3203 Stokes Squares Suite 133\nBrekkeville, WV 64190', 'corine.bernier@yahoo.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(17, 'Jermain Stoltenberg', '082231413514', '1633 Dino Flats Suite 902\nLynchchester, PA 31119', 'swift.denis@reinger.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(18, 'Hilbert Lind V', '082232968857', '9173 Fisher Isle Suite 475\nJaclyntown, VA 61022-3493', 'ythiel@yahoo.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(19, 'Mara Leffler', '08221144633', '10477 Nina Crescent Suite 165\nHuelborough, NJ 57398-2349', 'nader.valentin@yahoo.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29'),
(20, 'Mrs. Myriam Kessler', '082249219576', '4696 Reichel Circles Apt. 803\nKaylafurt, NE 28897', 'stark.candace@moen.com', '2021-12-28 08:12:29', '2021-12-28 08:12:29');

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `isbn` int(11) NOT NULL,
  `title` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `year` int(11) NOT NULL,
  `publisher_id` bigint(20) UNSIGNED NOT NULL,
  `author_id` bigint(20) UNSIGNED NOT NULL,
  `catalog_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `isbn`, `title`, `year`, `publisher_id`, `author_id`, `catalog_id`, `qty`, `price`, `created_at`, `updated_at`) VALUES
(1, 813168945, 'Garett Spinka II', 2019, 13, 9, 2, 4, 35202, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(2, 659540253, 'Dr. Cory Gerhold MD', 2015, 10, 10, 1, 15, 37985, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(3, 494232589, 'Juliana Bosco', 2021, 14, 8, 2, 9, 19316, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(4, 957686324, 'Dr. Alivia Ullrich', 2015, 17, 5, 4, 18, 48465, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(5, 956663889, 'Frederic Streich', 2020, 4, 2, 4, 11, 39318, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(6, 973550706, 'Dr. Kendrick Ward', 2012, 3, 4, 1, 15, 45618, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(7, 407266304, 'Ludie Smitham', 2012, 4, 6, 3, 16, 41676, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(8, 678272296, 'Tatyana Dickens', 2014, 15, 9, 4, 7, 17531, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(9, 891293762, 'Elfrieda Fay', 2016, 20, 20, 3, 19, 46742, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(10, 771169043, 'Katharina Daugherty II', 2013, 19, 3, 1, 12, 45654, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(11, 901115776, 'Jaylan Kreiger', 2010, 2, 11, 4, 11, 24290, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(12, 851774985, 'Guiseppe McKenzie I', 2019, 15, 7, 1, 15, 25227, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(13, 69155151, 'Dr. Jaylin Streich', 2017, 14, 16, 4, 4, 30616, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(14, 471934702, 'Marcelle Heller', 2016, 8, 9, 1, 4, 31310, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(15, 60003253, 'Chase O\'Hara V', 2011, 5, 18, 3, 11, 39764, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(16, 7462582, 'Andy Lowe', 2016, 6, 14, 4, 18, 32906, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(17, 462672813, 'Mr. Jaylen Harvey', 2021, 14, 14, 4, 17, 24123, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(18, 952368214, 'Prof. Janiya Carter V', 2020, 12, 8, 4, 16, 18509, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(19, 510933434, 'Jasper Turcotte', 2010, 12, 17, 1, 15, 38008, '2021-12-28 08:29:16', '2021-12-28 08:29:16'),
(20, 143469897, 'Prof. Marina Corwin', 2015, 12, 8, 3, 1, 18303, '2021-12-28 08:29:16', '2021-12-28 08:29:16');

-- --------------------------------------------------------

--
-- Table structure for table `catalogs`
--

CREATE TABLE `catalogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `catalogs`
--

INSERT INTO `catalogs` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Autumn Altenwerth', '2021-12-28 08:20:15', '2021-12-28 08:20:15'),
(2, 'Ara Hoeger', '2021-12-28 08:20:15', '2021-12-28 08:20:15'),
(3, 'Kayley Renner', '2021-12-28 08:20:15', '2021-12-28 08:20:15'),
(4, 'Aurelie VonRueden', '2021-12-28 08:20:35', '2021-12-28 08:20:35');

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
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender` char(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `name`, `gender`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Morris Metz', 'L', '08226159346', '60179 Pouros Ranch\nNorth Rebecca, NV 93950', 'leola64@hotmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(2, 'Prof. Ayla Cummings', 'L', '082270050113', '569 Margie Viaduct Suite 832\nKleinside, CT 75681', 'dario56@gmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(3, 'Lula Bogan MD', 'L', '082249156462', '357 Heidenreich Stravenue Suite 354\nLake Ressiemouth, ME 19282', 'uhintz@hotmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(4, 'Prof. Thalia Greenfelder', 'P', '082256614020', '7480 Hassie Fields\nEast Martinebury, SC 88957-4813', 'joshua.moore@hotmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(5, 'Ellsworth Kovacek', 'L', '082233212255', '4811 Murazik Mills Suite 110\nPrestonbury, SC 79300', 'eoconner@yahoo.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(6, 'Casey Anderson', 'L', '082240156996', '8929 Jarrell Rapid\nPort Lavina, TN 31972', 'kiehn.abbigail@jakubowski.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(7, 'Dr. Josue Bins', 'P', '082268109299', '84896 Renner Brook\nKacimouth, HI 76369', 'emilio79@stokes.org', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(8, 'Yessenia Runolfsson', 'P', '082210426329', '116 Sporer Vista\nKingchester, WY 61275-9835', 'daugherty.alyce@yahoo.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(9, 'Dr. Leonie Legros Sr.', 'L', '082264646862', '30997 Rosalinda Isle\nWest Eleonore, CA 63841', 'lwilkinson@koepp.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(10, 'Prof. Vanessa Willms', 'L', '082224926223', '544 Nikki Point\nWest Abeberg, NE 85507', 'jane.sporer@yahoo.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(11, 'Mrs. Jermaine Roberts DDS', 'L', '082216724422', '555 Douglas Plains\nLake Theresaborough, SC 73698', 'keon.glover@kiehn.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(12, 'Christ Jaskolski', 'P', '082291985926', '386 Reynolds Junctions\nAngieville, NE 98464-6373', 'iraynor@marquardt.org', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(13, 'Syble Nitzsche III', 'L', '082240874988', '563 Thaddeus Views\nHilpertstad, GA 19648', 'joe.graham@gmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(14, 'Valentine Klein', 'P', '082292524669', '858 Schowalter Crest\nSouth Giovanniside, MT 31164-0374', 'beaulah63@macejkovic.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(15, 'Dr. Rudolph Daugherty', 'L', '08227104938', '321 Walter Run\nSouth Freeman, KY 35963-3795', 'boehm.edwin@gmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(16, 'Trent Wuckert IV', 'L', '082286835144', '575 Antwon Vista Suite 198\nStehrland, ND 72375', 'brenna.abshire@gmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(17, 'Mr. Jayce Cruickshank III', 'P', '082222619133', '56306 Kris Extension Suite 524\nNorth Rico, ND 16248-7976', 'owen53@johnston.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(18, 'Lou Jacobs', 'L', '082289631085', '12985 Destany Rue Suite 117\nNorth Cristian, VT 36874', 'destany.legros@fay.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(19, 'Lilliana O\'Hara', 'P', '08225378704', '1030 Sporer Throughway Suite 732\nDwightberg, IA 35996', 'dell.rippin@hessel.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58'),
(20, 'Prof. Alford Langworth Jr.', 'L', '082248279493', '3569 Carroll Common\nWest Catalina, WV 47755-8797', 'karolann46@hotmail.com', '2021-12-28 08:40:58', '2021-12-28 08:40:58');

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
(15, '2010_12_28_113852_create_members_table', 1),
(16, '2014_10_12_000000_create_users_table', 1),
(17, '2014_10_12_100000_create_password_resets_table', 1),
(18, '2019_08_19_000000_create_failed_jobs_table', 1),
(19, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(20, '2021_12_28_114023_create_publishers_table', 1),
(21, '2021_12_28_114036_create_authors_table', 1),
(22, '2021_12_28_114116_create_catalogs_table', 1),
(23, '2021_12_28_114145_create_books_table', 1),
(24, '2021_12_28_114200_create_transactions_table', 1),
(25, '2021_12_28_114234_create_transaction_details_table', 1);

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
-- Table structure for table `personal_access_tokens`
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
-- Table structure for table `publishers`
--

CREATE TABLE `publishers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone_number` char(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `publishers`
--

INSERT INTO `publishers` (`id`, `name`, `phone_number`, `address`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Russ Murazik', '082239042143', '995 Demarcus Park Apt. 932\nJohnsberg, MA 44938-0625', 'xyundt@yahoo.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(2, 'Natasha Breitenberg', '082225267940', '29660 Ardella Manor Apt. 424\nBrycechester, VA 84350-4073', 'ywatsica@hotmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(3, 'Trey Corwin', '082278039927', '67522 Kiehn Rue\nEast Dillon, SC 63692', 'beahan.clemmie@hotmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(4, 'Lacey Green', '082290693688', '5096 Marquardt Tunnel\nEmiliastad, MA 82739', 'wcarter@lubowitz.biz', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(5, 'Pink Rolfson', '082260762499', '6754 Veum Ville\nLake Gusshire, FL 44093-7381', 'kutch.bobbie@hintz.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(6, 'Paolo Hermiston IV', '08222120921', '25765 Markus Corners\nDuBuqueport, GA 17017-9485', 'geovanny87@hotmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(7, 'Wilmer Rempel', '082235088769', '125 Crist Extension\nCrooksburgh, FL 06190-3677', 'hazel.kassulke@gmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(8, 'Willis Carroll', '082286374246', '8756 Franz Spurs Apt. 657\nSouth Bryanahaven, SC 91142', 'tharris@hotmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(9, 'Autumn Cremin', '082225313538', '859 Pfannerstill Bypass\nDarenshire, TN 21252', 'bridie.christiansen@jacobson.net', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(10, 'Verda Runolfsdottir', '082222399721', '5847 Anais Glens Apt. 653\nEast Tremayne, IL 50656-3008', 'desiree.kuvalis@pfeffer.net', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(11, 'Mrs. Rosa Kulas', '082251351258', '57341 Schoen Crest Suite 926\nAshafurt, MA 78196', 'weldon18@durgan.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(12, 'Ms. Aglae Parker', '082250009388', '234 Turner Fork Apt. 590\nThaddeusbury, NH 35140-6730', 'kaden40@yahoo.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(13, 'Miss Lysanne Rath III', '082237899291', '14952 Leila Locks\nSouth Horacioshire, MI 28315', 'cassin.selena@gutkowski.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(14, 'Jena Vandervort', '082294132048', '59129 Crooks Inlet Suite 125\nWatsicafurt, CA 91082-3035', 'corene25@hamill.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(15, 'Mr. Melvin Reynolds', '082210594974', '96832 Giovanny Crossing\nMaudebury, MD 57529-6036', 'hayes.enrico@yahoo.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(16, 'Dr. Gracie Cummerata Jr.', '082228993071', '3527 Willms Rapids Suite 437\nBernierfort, NH 69422-4027', 'parker.jarred@herman.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(17, 'Craig Huels', '08229451368', '2705 Dare Crest Suite 279\nAmosshire, MN 65301', 'lori.padberg@yahoo.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(18, 'Deron Ankunding', '082290676631', '47809 Muller Ways\nNorth Jayde, DE 67387', 'bo.boyle@hotmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(19, 'Edythe Murphy', '082270751240', '217 Audie Gateway Apt. 811\nHermistonmouth, TN 39071', 'johanna50@gmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36'),
(20, 'Mr. Reed Borer', '082258929655', '32824 Vernice Wall\nKesslerberg, LA 38255', 'ujohnson@gmail.com', '2021-12-28 08:22:36', '2021-12-28 08:22:36');

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `member_id` bigint(20) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transaction_details`
--

CREATE TABLE `transaction_details` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `transaction_id` bigint(20) UNSIGNED NOT NULL,
  `book_id` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
  `member_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `authors`
--
ALTER TABLE `authors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `books_publisher_id_foreign` (`publisher_id`),
  ADD KEY `books_author_id_foreign` (`author_id`),
  ADD KEY `books_catalog_id_foreign` (`catalog_id`);

--
-- Indexes for table `catalogs`
--
ALTER TABLE `catalogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
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
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `publishers`
--
ALTER TABLE `publishers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transactions_member_id_foreign` (`member_id`);

--
-- Indexes for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `transaction_details_book_id_foreign` (`book_id`),
  ADD KEY `transaction_details_transaction_id_foreign` (`transaction_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_member_id_foreign` (`member_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `authors`
--
ALTER TABLE `authors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `catalogs`
--
ALTER TABLE `catalogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `publishers`
--
ALTER TABLE `publishers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `transaction_details`
--
ALTER TABLE `transaction_details`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_author_id_foreign` FOREIGN KEY (`author_id`) REFERENCES `authors` (`id`),
  ADD CONSTRAINT `books_catalog_id_foreign` FOREIGN KEY (`catalog_id`) REFERENCES `catalogs` (`id`),
  ADD CONSTRAINT `books_publisher_id_foreign` FOREIGN KEY (`publisher_id`) REFERENCES `publishers` (`id`);

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `transactions_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);

--
-- Constraints for table `transaction_details`
--
ALTER TABLE `transaction_details`
  ADD CONSTRAINT `transaction_details_book_id_foreign` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `transaction_details_transaction_id_foreign` FOREIGN KEY (`transaction_id`) REFERENCES `transactions` (`id`);

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_member_id_foreign` FOREIGN KEY (`member_id`) REFERENCES `members` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
