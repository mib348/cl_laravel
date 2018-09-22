-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Sep 22, 2018 at 03:56 PM
-- Server version: 5.7.19
-- PHP Version: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cl_laravel`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tblcomments`
--

DROP TABLE IF EXISTS `tblcomments`;
CREATE TABLE IF NOT EXISTS `tblcomments` (
  `c_id` int(11) NOT NULL AUTO_INCREMENT,
  `c_film_id` int(11) DEFAULT NULL,
  `c_name` varchar(128) DEFAULT NULL,
  `c_comment` text,
  `c_created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`c_id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblcomments`
--

INSERT INTO `tblcomments` (`c_id`, `c_film_id`, `c_name`, `c_comment`, `c_created`) VALUES
(1, 12, 'Ibrahim', 'This movie is awesome', '2018-09-22 14:33:40'),
(2, 12, 'Ibrahim', 'Recommended!', '2018-09-22 14:33:58'),
(3, 13, 'Ibrahim', 'My favorite movie of all time', '2018-09-22 15:22:41'),
(4, 11, 'Frank', 'First Hit Movie ever!!', '2018-09-22 15:23:17'),
(25, 41, 'W1BJ9MSamL', 'wsHf5bLnpy9t51VQ4dN4iRxuuivMXagmpOjkrrU424Ei2KPBImJWDIgYRy9LQAyqGlCrTjlQwgEgygZFrtxwq5e0QEs4icylG76p', '2018-09-22 15:52:59'),
(24, 40, '6XrDKO9f6Q', 'K15KzbtzovaQizBqAgj75RKp9RpXZaU7Uo8AZfvSYhQYVgStrlhyenwCzRFdOizIuJDj497DUlkH2r9KsoXKPKkjvsmSzrNUnM3k', '2018-09-22 15:52:59'),
(23, 39, 'furVpNfJFD', 'UaDgFCA72fQtVtor9NEChnBszVyy8ArWi439lrxB1fyGKsz6Jgyx4kPUeNprlcEQW9ApYXtdBNaityulE9MkBg80ZAq4Hbxvzyc3', '2018-09-22 15:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `tblfilms`
--

DROP TABLE IF EXISTS `tblfilms`;
CREATE TABLE IF NOT EXISTS `tblfilms` (
  `f_id` int(11) NOT NULL AUTO_INCREMENT,
  `f_name` varchar(512) NOT NULL,
  `f_slug` varchar(128) DEFAULT NULL,
  `f_desc` text,
  `f_photo` varchar(512) DEFAULT NULL,
  `f_release_date` date DEFAULT NULL,
  `f_ticket_price` varchar(128) DEFAULT NULL,
  `f_country` varchar(128) DEFAULT NULL,
  `f_rating` int(11) DEFAULT NULL,
  `f_genre` varchar(512) DEFAULT NULL,
  `f_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`f_id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblfilms`
--

INSERT INTO `tblfilms` (`f_id`, `f_name`, `f_slug`, `f_desc`, `f_photo`, `f_release_date`, `f_ticket_price`, `f_country`, `f_rating`, `f_genre`, `f_created`) VALUES
(12, 'The Godfather', 'the-godfather', 'The Godfather', 'godfather.jpg', '1974-12-20', '60 USD', 'USA', 3, 'Drama,Thriller', '2018-09-22 14:10:15'),
(13, 'Gladiator', 'gladiator', 'Gladiator', 'gladiator.jpg', '2000-05-05', '40 USD', 'USA', 4, 'Action,Adventure,Drama', '2018-09-22 14:11:10'),
(11, 'The Shawshank Redemption', 'the-shawshank-redemption', 'The Shawshank Redemption', 'shawshank.jpg', '1994-10-14', '50 usd', 'USA', 5, 'Drama', '2018-09-22 14:08:46'),
(39, 'du2ZwpRPds', '4Jg9t', '54pzQpMLv7LQOV40kTJ2k5kw0uNlWIljlYfwbp6x49QOdhCf399r1Npi25haZPb6dyjfzaMnlh52ZlLgyRpt63mHHZ61THB9Fecf', 'trivia11.jpg', '2018-09-22', '85 USD', 'USA', 3, 'Adventure', '2018-09-22 15:52:59'),
(40, 'MSjixbRSXc', 'E7C4Y', 'TgojCq5vBSCUvE0gfJuuhLURguyg2IrswylKopXSQIeJJPkBc7opC3FVlJj8srpIDJOo8R7CxFhdCktL32BUSaT61SjkdnS0bjsb', 'trivia11.jpg', '2018-09-22', '38 USD', 'USA', 3, 'Action', '2018-09-22 15:52:59'),
(41, 'Ok6FL1fab2', 'H2Fsx', 'dL5eoggab37FynQv6lPkXvmwWvV073284YQsxygfrkl4gZNbx7ETVnr2mDkpf7XSemyEpjkQ5Dyv1GnYYsnNMNxcfRLPojH41Nai', 'trivia11.jpg', '2018-09-22', '29 USD', 'USA', 2, 'Adventure', '2018-09-22 15:52:59');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'test', 'test@example.com', NULL, '$2y$10$lucjGTVdaIJLYv42Foyh/OnDKYutQu/9pTrcTk8cZBRE0xJaAoe16', '6fKAtNPqUAY0bOHAGK5gOnhstK3zmLHV71r8JxBBBWBC71t1IRI9cKutOXkc', '2018-09-22 05:24:26', '2018-09-22 05:24:26');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
