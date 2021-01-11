-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 11, 2021 at 10:33 PM
-- Server version: 10.3.27-MariaDB
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `softinkl_subodha`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `subject_type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `subject_id`, `subject_type`, `type`, `user_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'App\\Post', 'created_post', 1, '2020-12-14 10:51:20', '2020-12-14 10:51:20'),
(2, 2, 'App\\Post', 'created_post', 1, '2020-12-15 09:12:50', '2020-12-15 09:12:50'),
(3, 1, 'App\\Post', 'updated_post', 1, '2020-12-21 12:09:32', '2020-12-21 12:09:32'),
(5, 1, 'App\\Post', 'updated_post', 1, '2020-12-22 10:07:28', '2020-12-22 10:07:28'),
(6, 1, 'App\\Paper', 'created_paper', 1, '2020-12-28 11:23:26', '2020-12-28 11:23:26'),
(7, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:03:40', '2020-12-29 21:03:40'),
(8, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:24:12', '2020-12-29 21:24:12'),
(9, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:28:08', '2020-12-29 21:28:08'),
(10, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:29:03', '2020-12-29 21:29:03'),
(11, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:29:45', '2020-12-29 21:29:45'),
(12, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:30:28', '2020-12-29 21:30:28'),
(13, 1, 'App\\Paper', 'updated_paper', 1, '2020-12-29 21:31:30', '2020-12-29 21:31:30'),
(14, 1, 'App\\Paper', 'updated_paper', 1, '2021-01-04 11:20:37', '2021-01-04 11:20:37'),
(15, 1, 'App\\Post', 'updated_post', 1, '2021-01-04 11:21:26', '2021-01-04 11:21:26'),
(16, 1, 'App\\Post', 'updated_post', 1, '2021-01-04 11:21:48', '2021-01-04 11:21:48'),
(17, 1, 'App\\Paper', 'updated_paper', 1, '2021-01-07 08:33:47', '2021-01-07 08:33:47'),
(18, 1, 'App\\Paper', 'updated_paper', 1, '2021-01-07 09:55:07', '2021-01-07 09:55:07'),
(19, 1, 'App\\Post', 'updated_post', 1, '2021-01-11 01:42:39', '2021-01-11 01:42:39'),
(20, 1, 'App\\Post', 'updated_post', 1, '2021-01-11 01:43:30', '2021-01-11 01:43:30'),
(21, 3, 'App\\Post', 'created_post', 1, '2021-01-11 01:45:30', '2021-01-11 01:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `date`, `description`, `category`, `published`, `created_at`, `updated_at`) VALUES
(1, '2020-10-22', 'test announcement', 'New', 1, '2020-12-22 09:56:41', '2020-12-28 11:24:04');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Uncategorized', 'uncategorized', 'For all posts that do not belong to a spesific category.', '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(2, 'Conference', 'conference', NULL, '2020-12-28 11:22:25', '2020-12-28 11:22:25'),
(3, 'Journal', 'journal', NULL, '2020-12-29 21:34:02', '2020-12-29 21:34:02'),
(4, 'Politics', 'politics', NULL, '2021-01-11 01:41:37', '2021-01-11 01:41:37'),
(5, 'Cricket', 'cricket', NULL, '2021-01-11 01:41:41', '2021-01-11 01:41:41'),
(6, 'Art', 'art', NULL, '2021-01-11 01:41:46', '2021-01-11 01:41:46'),
(7, 'Internet', 'internet', NULL, '2021-01-11 01:41:59', '2021-01-11 01:41:59');

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'work',
  `period` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `description` mediumtext COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `symbol` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `title`, `user_id`, `type`, `period`, `description`, `venue`, `symbol`, `created_at`, `updated_at`) VALUES
(1, 'IEEE “MGA Young Professionals” Achievement Award', 1, 'award', '2019', 'For those substantive projects or achievements which have left an undeniable imprint on the fabric of IEEE Young Professionals operations', 'IEEE Member & Geographic Activities', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(2, 'Harris Corporation Communication Graduate Fellowship Award', 1, 'award', '2019', 'For outstanding PhD students in the dept. Of Computer & Information Science & Engineering', 'University of Florida', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(3, 'IEEE “Larry K. Wilson” Award', 1, 'award', '2019', 'For the best student volunteer of Asia-Pacific Region in 2015', 'IEEE Region 10', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(4, 'Dialog Axiata Merit Scholarship', 1, 'award', '2010 - 2013', 'For top performance in Advanced Level examination in Sri Lanka', 'Dialog Axiata', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(5, 'Research Assistant @ University of Florida', 1, 'work', 'Aug 2016 - Present', 'System-on-Chip architecture optimization with 4-way interoperability constraints - security, power, performance and area', 'Embedded Systems Lab, University of Florida, Gainsville, FL, USA', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(6, 'Director @ Alta Vision (Pvt) Ltd', 1, 'work', 'Feb 2013 - Present', 'Co-founder, Member of board www.altavision.lk', 'Alta Vision (Pvt) Ltd, Colombo, Sri Lanka', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(7, 'Graduate Technical Intern @ Intel Corporation', 1, 'work', 'May 2017 - Aug 2017', 'Power and performance validation and debug of power control algorithms', 'Strategic CAD Labs, Intel Corporation, Portland, OR, USA', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17'),
(8, 'Lecturer @ University of Moratuwa', 1, 'work', 'Jan 2016 - Jul 2016', 'Worked as a Lecturer on contract basis tutoring and handling multiple courses', 'University of Moratuwa, Colombo, Sri Lanka', NULL, '2020-12-14 08:29:17', '2020-12-14 08:29:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lb_blocks`
--

CREATE TABLE `lb_blocks` (
  `id` int(10) UNSIGNED NOT NULL,
  `raw_title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `raw_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rendered_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'wp_block',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lb_contents`
--

CREATE TABLE `lb_contents` (
  `id` int(10) UNSIGNED NOT NULL,
  `raw_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `rendered_content` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `contentable_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contentable_id` bigint(20) UNSIGNED NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'page',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_02_08_105647_create_blocks_contents_tables', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_06_27_194533_create_posts_table', 1),
(6, '2020_06_27_194543_create_categories_table', 1),
(7, '2020_06_27_194551_create_papers_table', 1),
(8, '2020_06_29_202134_create_activities_table', 1),
(9, '2020_07_04_191944_create_profiles_table', 1),
(10, '2020_07_09_192904_create_events_table', 1),
(11, '2020_12_21_174053_create_announcements_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `papers`
--

CREATE TABLE `papers` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `authors` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `download_link` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `venue` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `papers`
--

INSERT INTO `papers` (`id`, `title`, `body`, `authors`, `slug`, `image`, `download_link`, `venue`, `published`, `category_id`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Reconfigurable Network-on-Chip Security Architecture', '<!-- wp:paragraph {\"align\":\"center\",\"fontSize\":\"normal\"} -->\r\n<p class=\"has-text-align-center has-normal-font-size\"><strong>ACM Transactions on Design Automation of Electronic Systems (TODAES) 202</strong>1</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:separator -->\r\n<hr class=\"wp-block-separator\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:heading -->\r\n<h2>Abstract</h2>\r\n<!-- /wp:heading -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>The growth of Internet-of-things (IoT) has led to complex system-on-chips (SoC) being used in the edge devices in IoT applications. The increased complexity is demanding designers to consider several critical factors such as dynamic requirement changes, long application life, mass production and tight time-to-market deadlines. These requirements lead to more complex security concerns. SoC manufacturers outsource some of the intellectual property (IP) cores integrated on the SoC to untrusted third party vendors. The untrusted IPs can contain malicious implants, which can launch attacks using the resources provided by the on-chip interconnection network, commonly known as the network-on-chip (NoC). Existing efforts on securing NoC has considered lightweight encryption, authentication and other attack detection mechanisms such as denial-of-service (DoS) and buffer overflows. Unfortunately, these approaches focus on designing statically optimized security solutions. As a result, they are not suitable for many IoT systems with long application life and dynamic requirement changes. There is a critical need to design reconfigurable security architectures that can be dynamically tuned based on changing requirements. In this paper, we propose a tier-based reconfigurable security architecture that can adapt to different use-case scenarios. We explore how to design an efficient reconfigurable architecture that can support three popular NoC security mechanisms (encryption, authentication and DoS attack detection &amp; localization), and implement suitable dynamic reconfiguration techniques. We evaluate our proposed framework by running standard benchmarks enabling different tiers of security and provide a comprehensive analysis of how different levels of security can affect application performance, energy efficiency and area overhead.</p>\r\n<!-- /wp:paragraph -->', '[\"Subodha Charles\",\"Prabhat Mishra\"]', 'reconfigurable-network-on-chip-security-architecture', 'https://subodha.softinklab.com/storage/images/lOBuAnf4er1Io8YeApymZdM6zR50sxdVHZ5g46WS.jpeg', 'https://affectionate-noyce-39adce.netlify.app/assets/papers/charles2020reconfigurable.pdf', 'TODAES 2020', 1, 3, 1, '2021-01-04', '2020-12-28 11:23:26', '2021-01-07 09:55:07');

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `published` tinyint(1) NOT NULL DEFAULT 0,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `body`, `slug`, `image`, `published`, `category_id`, `user_id`, `date`, `created_at`, `updated_at`) VALUES
(1, 'Remembrance', '<!-- wp:paragraph -->\r\n<p>Gone are the days when parents used to take two different routes just because if a bomb goes off, one would survive to provide for the family.. Gone are the days where we wondered, whether staying in our country and hoping for a future there is really worth it.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>In remembrance of all the soldiers, who were at their best, when the land was at the worst. Sri Lanka salutes you!</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>They\'ve done their part. It is time!</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:quote -->\r\n<blockquote class=\"wp-block-quote\"><p>No matter where you were born, where you have lived, how long you have been away, this is the only country that is yours. It’s a God-awful mess right now, has been for awhile, and probably will be for awhile longer, but that doesn’t make it yours to desert. It makes it yours to fix</p></blockquote>\r\n<!-- /wp:quote -->', 'remembrance', NULL, 1, 4, 1, '2018-05-18', '2020-12-14 10:51:20', '2021-01-11 01:43:30'),
(2, 'Test Post', '<!-- wp:paragraph -->\r\n<p>Test</p>\r\n<!-- /wp:paragraph -->', 'test-post', NULL, 0, 1, 1, '2021-01-04', '2020-12-15 09:12:50', '2020-12-15 09:12:50'),
(3, 'The Web He Spun', '<!-- wp:paragraph {\"align\":\"center\"} -->\r\n<p class=\"has-text-align-center\">In memory of Rangana Herath\'s illustrious career - arguably, the best left arm spinner of all time</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:separator -->\r\n<hr class=\"wp-block-separator\"/>\r\n<!-- /wp:separator -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>119 at the end of 20 overs. Sri Lanka, in a virtual Quarter Final against New Zealand. On a slightly turning track, 119 seemed less than par and far less than what the Lankans would have liked to score. A threat of another exit at a world cup. Having done well in Bangladesh all season, and being robbed of a World Cup two years ago, an early exit would have added insult to injury. Cometh the man, cometh the hour; Herath Spun New Zealand out of the match!</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>The dew McCullum expected at the toss when he chose to chase, didn\'t materialize but rather, fired back at him in the form of a spitting delivery from the surface bamboozling the Kiwis. Herath had bagged three scalps before the Kiwis could score a single run off him and ran out Guptill. When Ronchi couldn\'t figure out which way the ball would go and was trapped plumb in front, New Zealand was left tormented with no space for a recovery. Yes, Sri Lanka went on to win the tournament and lifted a World cup after 18 years and many performances contributed to that. But, I\'d rather say, Herath\'s 11 balls of magic did the trick. It was out of this world!</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>The 31-year-old left-armer was playing in the Staffordshire League in England when he was summoned by Sri Lanka Cricket as a replacement for Muralitharan who was ruled out of the Test series against Pakistan following a knee injury. Herath delivered, fashioning out a maiden Test series victory for his country at home against Pakistan.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>It\'s not easy when your career runs in Parallel with an all time great. He had to live in the Shadows of Murali till he completely retired. I remember Sanga speaking highly of Herath saying he is the most underrated player in the Sri Lankan cricketing circuit. But, the world has seen your worth Sir. Just in time when you bid adieu to the shorter formats. Vendersay and Senanayake will have to try hard to fill your void. But let\'s hope they succeed for the sake of our game.</p>\r\n<!-- /wp:paragraph -->\r\n\r\n<!-- wp:paragraph -->\r\n<p>See ya in whites only, from today! Will miss you in Colors. Editing #GoT, They will sing songs of the web he spun long after their bones are dust and their real names are forgotten!</p>\r\n<!-- /wp:paragraph -->', 'the-web-he-spun', 'https://subodha.softinklab.com/storage/images/GkvPpiOFowFcjkxnd6gvGLjrKk8IidOr85SBUgKP.jpeg', 1, 5, 1, '2016-04-17', '2021-01-11 01:45:30', '2021-01-11 01:45:30');

-- --------------------------------------------------------

--
-- Table structure for table `profiles`
--

CREATE TABLE `profiles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `about` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `resume` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `profiles`
--

INSERT INTO `profiles` (`id`, `user_id`, `about`, `email`, `resume`, `created_at`, `updated_at`) VALUES
(1, 1, '<p>Subodha Charles is a faculty member at the Department of Electronic and Telecommunication Engineering, University of Moratuwa, Sri Lanka. He received his Ph.D. in Computer Science from the University of Florida, USA, and his B.Sc. specializing in Electronics and Telecommunication Engineering from the University of Moratuwa, Sri Lanka. His research interests include hardware security and trust, embedded systems and computer architecture. He has published more than ten research articles in premier international conferences and journals related to those areas. He has gathered industry experience at Intel, USA and Zone24X7, Sri Lanka.&nbsp;</p><p>Subodha co-founded a company in Sri Lanka operating in the energy sector in 2013 and it is currently one of the country\'s market leaders. The company has invested in other areas such as healthcare and construction and is also exploring further expansion possibilities. He has volunteered at IEEE (Institute of Electrical and Electronics Engineers) since 2011 and has held several global leadership positions. He has successfully led many initiatives within IEEE to foster entrepreneurship, industry collaboration and membership growth. Several international awards within IEEE have recognized his efforts, including the best student volunteer in the Asia-Pacific region award in 2015.</p>', 's.charles@ieee.org', '/resume', '2020-12-14 08:29:17', '2021-01-11 01:34:37');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `photo` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `settings` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `username`, `photo`, `email`, `phone`, `email_verified_at`, `password`, `settings`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Subodha Charles', 'Subodha', 'img/profile.png', 'subodhatsn@gmail.com', '3522168940', '2020-12-14 08:29:17', '$2y$10$6C3jP.LGM/GB8Kb7iQWeHeoWhBoeyMhO.WwJFksp3lGKReOn5Ii4C', NULL, '1yh5fZyX37', '2020-12-14 08:29:17', '2020-12-14 08:29:17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`),
  ADD KEY `activities_user_id_foreign` (`user_id`),
  ADD KEY `activities_subject_id_index` (`subject_id`);

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `categories_name_unique` (`name`),
  ADD UNIQUE KEY `categories_slug_unique` (`slug`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`),
  ADD KEY `events_user_id_foreign` (`user_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lb_blocks`
--
ALTER TABLE `lb_blocks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `lb_contents`
--
ALTER TABLE `lb_contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lb_contents_contentable_type_contentable_id_index` (`contentable_type`,`contentable_id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `papers`
--
ALTER TABLE `papers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `papers_slug_unique` (`slug`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `posts_slug_unique` (`slug`);

--
-- Indexes for table `profiles`
--
ALTER TABLE `profiles`
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
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lb_blocks`
--
ALTER TABLE `lb_blocks`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lb_contents`
--
ALTER TABLE `lb_contents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `papers`
--
ALTER TABLE `papers`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profiles`
--
ALTER TABLE `profiles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
