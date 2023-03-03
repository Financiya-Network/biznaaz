-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 03, 2023 at 11:01 AM
-- Server version: 8.0.32-0ubuntu0.20.04.2
-- PHP Version: 7.2.34-38+ubuntu20.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `biznaaz_fiverdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admins`
--

CREATE TABLE `tbl_admins` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `ip_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `created` datetime NOT NULL,
  `status` smallint NOT NULL,
  `modified` datetime NOT NULL,
  `attempt` int NOT NULL,
  `activation_status` smallint NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_admins`
--

INSERT INTO `tbl_admins` (`id`, `username`, `password`, `email`, `ip_address`, `slug`, `created`, `status`, `modified`, `attempt`, `activation_status`) VALUES
(1, 'biznaaz', '$2y$10$ipETrQvwla0XqhozBiktsOcraaey3mr4ImRgdZfjwN.zrbWKQexRa', 'info@biznaaz.com', NULL, '', '2016-06-10 00:00:00', 1, '2018-07-02 17:51:51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_banners`
--

CREATE TABLE `tbl_banners` (
  `id` bigint NOT NULL,
  `type` varchar(50) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'visitor',
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `subtitle` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tbl_banners`
--

INSERT INTO `tbl_banners` (`id`, `type`, `name`, `title`, `subtitle`, `created_at`, `updated_at`, `slug`) VALUES
(1, 'visitor', 'e0c408c0_3e6dae2b_banner1.jpg', 'Be your own boss', 'It’s a marketplace which helps workers who are seeking for work', '2020-04-02 06:34:43', '2021-07-16 04:54:47', 'a'),
(2, 'visitor', '704e8910_banner2.jpg', 'Be your own boss', 'It’s a marketplace which helps workers who are seeking for work', '2020-04-02 06:34:43', '2021-07-16 04:54:49', 'b'),
(3, 'visitor', '0aa36c9c_banner3.jpg', 'Be your own boss', 'It’s a marketplace which helps workers who are seeking for work', '2020-04-02 06:34:43', '2021-07-16 04:54:51', 'c'),
(5, 'logged_user', '9a4ab384_banner-home.jpg', 'Find Best Service Provider', 'Find best service according to your requirement', '2021-07-16 04:55:29', '2021-07-16 04:55:29', 'ban'),
(6, 'logged_user', '0b61e3b5_banner-home2.jpg', 'Get offer for seller', 'Get best offer for your service if you not proper seller', '2021-07-16 04:55:49', '2021-07-16 04:55:49', 'ban-f821664f5be0');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_carts`
--

CREATE TABLE `tbl_carts` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `gig_id` int DEFAULT NULL,
  `package` varchar(20) DEFAULT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `extra_amount` float(12,2) NOT NULL,
  `extra_ids` varchar(255) DEFAULT NULL,
  `total_amount` float(12,2) NOT NULL,
  `revenue` float(12,2) NOT NULL,
  `admin_amount` float(12,2) NOT NULL,
  `admin_commission` float(12,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_categories`
--

CREATE TABLE `tbl_categories` (
  `id` bigint NOT NULL,
  `name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `parent_id` int NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `sub_title` varchar(255) DEFAULT NULL,
  `home_image` varchar(255) DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` smallint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `description` varchar(255) DEFAULT NULL,
  `meta_title` varchar(255) DEFAULT NULL,
  `meta_description` varchar(255) DEFAULT NULL,
  `meta_keyword` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_categories`
--

INSERT INTO `tbl_categories` (`id`, `name`, `parent_id`, `image`, `sub_title`, `home_image`, `slug`, `status`, `updated_at`, `description`, `meta_title`, `meta_description`, `meta_keyword`) VALUES
(1, 'Write and Translation', 0, 'ee8eada7_Explore3.png', 'Write and Translation', '35d83879_Write.jpg', 'write-and-translation', 1, '2020-09-15 07:29:22', 'Resumes, Proofreading,<br>Translations & lots more', NULL, NULL, NULL),
(2, 'Software Development', 0, '672042cc_Explore5.png', 'Software Development', '5469ffc2_Software-development.jpg', 'software-development', 1, '2020-09-15 07:31:13', 'Computer, Mobile,<br>Programming & lots more', NULL, NULL, NULL),
(3, 'Graphic and Design', 0, 'e5f29f8a_explore1.png', 'Graphic and Design', '5405a4ca_Graphic-Design.jpg', 'graphic-and-design', 1, '2020-09-15 07:30:54', 'Logo Design, Business Cards,<br>Illustration & lots more', NULL, NULL, NULL),
(4, 'Music & Audio', 0, '39ba23e0_Explore7.png', 'Music & Audio', 'fdc1df7c_Music.jpg', 'music-and-audio ', 1, '2020-09-15 07:31:29', 'Whiteboard, Animated Logos,<br>Brand Videos & lots more', NULL, NULL, NULL),
(6, 'Digital Marketing', 0, '5a85caac_Explore2.png', 'Digital Marketing', 'f5c7e8bb_pexels-photo-267350.jpg', 'digital-marketing', 1, '2020-09-04 04:31:28', 'Social Media, SEO,Content Marketing & lots more', NULL, NULL, NULL),
(8, 'Business', 0, '548179c4_Explore6.png', 'Business', 'f9bdd178_download (31).jpg', 'business', 1, '2020-09-03 08:48:14', 'irtual Assistant, Market Research,<br>Business Plans & lots more', NULL, NULL, NULL),
(10, 'Banquetes', 0, '5b72caef_ad-icon.png', 'Banquetes', 'e3d6391e_popular1.png', 'marketing-and-advertising', 1, '2020-09-03 06:31:37', 'Explore your Business <br> with top experts', NULL, NULL, NULL),
(13, 'CV Writing', 1, NULL, NULL, NULL, 'cv-writing', 1, '2018-08-30 06:13:38', NULL, NULL, NULL, NULL),
(14, 'Easy writing', 1, NULL, NULL, NULL, 'easy-writing', 1, '2018-08-30 06:14:00', NULL, NULL, NULL, NULL),
(15, 'Business Marketing', 10, NULL, NULL, NULL, 'business-marketing', 1, '2020-08-31 10:12:23', NULL, NULL, NULL, NULL),
(16, 'Resumes & Cover Letters', 1, NULL, NULL, NULL, 'resumes-&-cover-letters', 1, '2018-09-25 07:16:53', NULL, NULL, NULL, NULL),
(17, 'Website Content', 1, NULL, NULL, NULL, 'website-content', 1, '2019-08-14 01:14:30', NULL, NULL, NULL, NULL),
(18, 'Technical Writing', 1, NULL, NULL, NULL, 'technical-writing', 1, '2018-09-25 07:17:19', NULL, NULL, NULL, NULL),
(19, 'Translation', 1, NULL, NULL, NULL, 'translation', 1, '2018-09-25 07:17:34', NULL, NULL, NULL, NULL),
(20, 'Creative Writing', 1, NULL, NULL, NULL, 'creative-writing', 1, '2018-09-25 07:17:43', NULL, NULL, NULL, NULL),
(21, 'Research & Summaries', 1, NULL, NULL, NULL, 'research-&-summaries', 1, '2018-09-25 07:18:00', NULL, NULL, NULL, NULL),
(22, 'Articles & Blog Posts', 1, NULL, NULL, NULL, 'articles-&-blog-posts', 1, '2018-09-25 07:18:14', NULL, NULL, NULL, NULL),
(23, 'Press Releases', 1, NULL, NULL, NULL, 'press-releases', 1, '2019-09-25 21:39:36', NULL, NULL, NULL, NULL),
(24, 'Logo Design', 3, NULL, NULL, NULL, 'logo-design', 1, '2018-09-25 07:23:25', NULL, NULL, NULL, NULL),
(25, 'Business Cards', 3, NULL, NULL, NULL, 'business-cards', 1, '2018-09-25 07:23:32', NULL, NULL, NULL, NULL),
(26, 'Cartoons & Comics', 3, NULL, NULL, NULL, 'cartoons-&-comics', 1, '2018-09-25 07:23:52', NULL, NULL, NULL, NULL),
(27, 'Flyers & Brochures', 3, NULL, NULL, NULL, 'flyers-&-brochures', 1, '2018-09-25 07:24:02', NULL, NULL, NULL, NULL),
(28, 'Book & Album Covers', 3, NULL, NULL, NULL, 'book-&-album-covers', 1, '2018-09-25 07:24:12', NULL, NULL, NULL, NULL),
(29, 'Packaging Design', 3, NULL, NULL, NULL, 'packaging-design', 1, '2018-09-25 07:24:19', NULL, NULL, NULL, NULL),
(30, 'Social Media', 3, NULL, NULL, NULL, 'social-media', 1, '2018-09-25 07:24:29', NULL, NULL, NULL, NULL),
(31, 'Banner Ads', 3, NULL, NULL, NULL, 'banner-ads', 1, '2018-09-25 07:24:36', NULL, NULL, NULL, NULL),
(32, 'Floor Plans', 3, NULL, NULL, NULL, 'floor-plans', 1, '2018-09-25 07:24:45', NULL, NULL, NULL, NULL),
(33, 'Presentation Design', 3, NULL, NULL, NULL, 'presentation-design', 1, '2018-09-25 07:25:31', NULL, NULL, NULL, NULL),
(34, 'Inviti', 3, NULL, NULL, NULL, 'invitations', 1, '2020-03-24 15:51:24', NULL, NULL, NULL, NULL),
(35, 'Voice Over', 4, NULL, NULL, NULL, 'voice-over', 1, '2018-09-25 07:26:52', NULL, NULL, NULL, NULL),
(36, 'Mixing & Mastering', 4, NULL, NULL, NULL, 'mixing-&-mastering', 1, '2018-09-25 07:26:59', NULL, NULL, NULL, NULL),
(37, 'Producers & Composers', 4, NULL, NULL, NULL, 'producers-&-composers', 1, '2018-09-25 07:27:15', NULL, NULL, NULL, NULL),
(38, 'Jingles & Drops', 4, NULL, NULL, NULL, 'jingles-&-drops', 1, '2018-09-25 07:27:27', NULL, NULL, NULL, NULL),
(39, 'Sound Effects', 4, NULL, NULL, NULL, 'sound-effects', 1, '2018-09-25 07:27:36', NULL, NULL, NULL, NULL),
(40, 'Car Wash', 5, NULL, NULL, NULL, 'car-wash', 1, '2018-09-25 07:30:12', NULL, NULL, NULL, NULL),
(41, 'Oil sludge', 5, NULL, NULL, NULL, 'oil-sludge', 1, '2018-09-25 07:30:20', NULL, NULL, NULL, NULL),
(42, 'Auto electrician', 5, NULL, NULL, NULL, 'auto-electrician', 1, '2018-09-25 07:30:37', NULL, NULL, NULL, NULL),
(43, 'Headlight Tester', 5, NULL, NULL, NULL, 'headlight-tester', 1, '2018-09-25 07:31:01', NULL, NULL, NULL, NULL),
(44, 'Car Repairing', 5, NULL, NULL, NULL, 'car-repairing', 1, '2018-09-25 07:31:34', NULL, NULL, NULL, NULL),
(45, 'Virtual Assistant', 8, NULL, NULL, NULL, 'virtual-assistant', 1, '2018-09-25 07:38:20', NULL, NULL, NULL, NULL),
(46, 'Data Entry', 8, NULL, NULL, NULL, 'data-entry', 1, '2018-09-25 07:38:30', NULL, NULL, NULL, NULL),
(47, 'Market Research', 8, NULL, NULL, NULL, 'market-research', 1, '2018-09-25 07:38:37', NULL, NULL, NULL, NULL),
(48, 'Business Plans', 8, NULL, NULL, NULL, 'business-plans', 1, '2018-09-25 07:38:44', NULL, NULL, NULL, NULL),
(49, 'Legal Consulting', 8, NULL, NULL, NULL, 'legal-consulting', 1, '2018-09-25 07:38:55', NULL, NULL, NULL, NULL),
(50, 'Business Tips', 8, NULL, NULL, NULL, 'business-tips', 1, '2018-09-25 07:39:04', NULL, NULL, NULL, NULL),
(51, 'Career Advice', 8, NULL, NULL, NULL, 'career-advice', 1, '2018-09-25 07:39:11', NULL, NULL, NULL, NULL),
(52, 'Financial Consulting', 8, NULL, NULL, NULL, 'financial-consulting', 1, '2018-09-25 07:39:23', NULL, NULL, NULL, NULL),
(53, 'Social Media Marketing', 6, NULL, NULL, NULL, 'social-media-marketing', 1, '2018-09-25 07:39:57', NULL, NULL, NULL, NULL),
(54, 'SEO', 6, NULL, NULL, NULL, 'seo', 1, '2018-09-25 07:40:02', NULL, NULL, NULL, NULL),
(55, 'Content Marketing', 6, NULL, NULL, NULL, 'content-marketing', 1, '2018-09-25 07:40:10', NULL, NULL, NULL, NULL),
(56, 'Video Marketing', 6, NULL, NULL, NULL, 'video-marketing', 1, '2018-09-25 07:40:17', NULL, NULL, NULL, NULL),
(57, 'Email Marketing', 6, NULL, NULL, NULL, 'email-marketing', 1, '2018-09-25 07:40:26', NULL, NULL, NULL, NULL),
(58, 'Surveys', 6, NULL, NULL, NULL, 'surveys', 1, '2018-09-25 07:40:37', NULL, NULL, NULL, NULL),
(59, 'Web Analytics', 6, NULL, NULL, NULL, 'web-analytics', 1, '2018-09-25 07:40:44', NULL, NULL, NULL, NULL),
(60, 'Local Listings', 6, NULL, NULL, NULL, 'local-listings', 1, '2018-09-25 07:40:52', NULL, NULL, NULL, NULL),
(61, 'Mobile Advertising', 6, NULL, NULL, NULL, 'mobile-advertising', 1, '2018-09-25 07:41:00', NULL, NULL, NULL, NULL),
(62, 'Music Promotion', 6, NULL, NULL, NULL, 'music-promotion', 1, '2018-09-25 07:41:08', NULL, NULL, NULL, NULL),
(63, 'Web Traffic', 6, NULL, NULL, NULL, 'web-traffic', 1, '2018-09-25 07:41:17', NULL, NULL, NULL, NULL),
(64, 'Online Lessons', 12, NULL, NULL, NULL, 'online-lessons', 1, '2018-09-25 07:41:48', NULL, NULL, NULL, NULL),
(65, 'Arts & Crafts', 12, NULL, NULL, NULL, 'arts-&-crafts', 1, '2019-08-14 01:06:41', NULL, 'art 3424', 'art 3424', 'art 3424'),
(66, 'Relationship Advice', 12, NULL, NULL, NULL, 'relationship-advice', 1, '2018-09-25 07:42:10', NULL, NULL, NULL, NULL),
(67, 'Health & Fitness', 12, NULL, NULL, NULL, 'health-&-fitness', 1, '2018-09-25 07:42:34', NULL, NULL, NULL, NULL),
(68, 'Family & Genealogy', 12, NULL, NULL, NULL, 'family-&-genealogy', 1, '2018-09-25 07:42:48', NULL, NULL, NULL, NULL),
(69, 'Gaming', 12, NULL, NULL, NULL, 'gaming', 1, '2018-09-25 07:43:00', NULL, NULL, NULL, NULL),
(70, 'Viral Videos', 12, NULL, NULL, NULL, 'viral-videos', 1, '2018-09-25 07:43:12', NULL, NULL, NULL, NULL),
(71, 'Celebrity Impersonators', 12, NULL, NULL, NULL, 'celebrity-impersonators', 1, '2018-09-25 07:43:22', NULL, NULL, NULL, NULL),
(72, 'Pranks & Stunts', 12, NULL, NULL, NULL, 'pranks-&-stunts', 1, '2019-08-14 01:06:15', NULL, '2312', '123123', '123 14124'),
(73, 'Plumbing', 7, NULL, NULL, NULL, 'plumbing', 1, '2018-09-25 07:48:25', NULL, NULL, NULL, NULL),
(74, 'Electrician', 7, NULL, NULL, NULL, 'electrician', 1, '2018-09-25 07:48:46', NULL, NULL, NULL, NULL),
(75, 'Cleaner', 7, NULL, NULL, NULL, 'cleaner', 1, '2018-09-25 07:49:12', NULL, NULL, NULL, NULL),
(76, 'Painting', 7, NULL, NULL, NULL, 'painting', 1, '2018-09-25 07:50:19', NULL, NULL, NULL, NULL),
(77, 'Solariums', 7, NULL, NULL, NULL, 'solariums', 1, '2018-09-25 07:50:29', NULL, NULL, NULL, NULL),
(78, 'Water Heaters', 7, NULL, NULL, NULL, 'water-heaters', 1, '2018-09-25 07:50:38', NULL, NULL, NULL, NULL),
(79, 'Kitchens', 7, NULL, NULL, NULL, 'kitchens', 1, '2018-09-25 07:50:50', NULL, NULL, NULL, NULL),
(80, 'Appliance Repairs', 7, NULL, NULL, NULL, 'appliance-repairs', 1, '2018-09-25 07:51:15', NULL, NULL, NULL, NULL),
(81, 'Pest Control', 7, NULL, NULL, NULL, 'pest-control', 1, '2018-09-25 07:51:32', NULL, NULL, NULL, NULL),
(82, 'Mobile APP', 2, NULL, NULL, NULL, 'dealers', 1, '2018-09-28 04:21:43', NULL, NULL, NULL, NULL),
(83, 'Laptop Sales & Service', 2, NULL, NULL, NULL, 'laptop-sales-&-service', 1, '2018-09-25 08:01:16', NULL, NULL, NULL, NULL),
(84, 'Computer Networking', 2, NULL, NULL, NULL, 'computer-networking', 1, '2018-09-25 08:01:31', NULL, NULL, NULL, NULL),
(85, 'Animation', 2, NULL, NULL, NULL, 'laptop-repair-and-service', 1, '2018-09-28 04:22:26', NULL, NULL, NULL, NULL),
(86, 'Computer Shop', 2, NULL, NULL, NULL, 'computer-shop', 1, '2018-09-25 08:01:56', NULL, NULL, NULL, NULL),
(87, 'Mobile Sales and Service', 2, NULL, NULL, NULL, 'mobile-sales-and-service', 1, '2018-09-25 08:03:00', NULL, NULL, NULL, NULL),
(88, 'GPS Tracker', 2, NULL, NULL, NULL, 'mobile-accessories', 1, '2018-09-28 04:22:47', NULL, NULL, NULL, NULL),
(89, 'Mobile Care', 2, NULL, NULL, NULL, 'mobile-care', 1, '2018-09-25 08:03:18', NULL, NULL, NULL, NULL),
(90, 'Website Development', 2, NULL, NULL, NULL, 'mobile-phone-batteries', 1, '2018-09-28 04:21:29', NULL, NULL, NULL, NULL),
(92, 'Corporate Law', 91, NULL, NULL, NULL, 'corporate-law', 1, '2020-04-07 20:04:54', NULL, NULL, NULL, NULL),
(93, 'Labor law', 91, NULL, NULL, NULL, 'labor-law', 1, '2020-04-07 20:05:06', NULL, NULL, NULL, NULL),
(94, 'Tax law for businesses', 91, NULL, NULL, NULL, 'tax-law-for-businesses', 1, '2020-04-07 20:05:19', NULL, NULL, NULL, NULL),
(95, 'Family Law', 91, NULL, NULL, NULL, 'family-law', 1, '2020-04-07 20:05:28', NULL, NULL, NULL, NULL),
(96, 'house cleaning', 91, NULL, NULL, NULL, 'tax-law-for-inividuals', 1, '2020-04-30 14:44:22', NULL, NULL, NULL, NULL),
(97, 'Test category', 4, NULL, NULL, NULL, 'test-category', 1, '2020-04-07 20:07:00', NULL, NULL, NULL, NULL),
(101, 'Legal Advice', 0, '0bb79353_Explore4.png', NULL, '4af93631_download (35).jpg', 'legal-advice', 1, '2020-09-08 08:00:30', 'Get your Legal Advice', NULL, NULL, NULL),
(102, 'Business litigation', 101, NULL, NULL, NULL, 'business-litigation', 1, '2020-09-08 08:01:10', NULL, NULL, NULL, NULL),
(103, 'Online user', 0, 'images.png', 'Online user', 'images.png', 'online user', 1, '0000-00-00 00:00:00', 'Get your online user', NULL, NULL, NULL),
(104, 'Local Seller', 0, 'localseller.png', 'Local Seller', 'localseller.png', 'Local Seller', 1, '0000-00-00 00:00:00', 'Get your local seller', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_countries`
--

CREATE TABLE `tbl_countries` (
  `id` int NOT NULL,
  `name` varchar(44) DEFAULT NULL,
  `slug` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_countries`
--

INSERT INTO `tbl_countries` (`id`, `name`, `slug`, `status`, `created_at`, `updated_at`) VALUES
(9, 'Afghanistan', 'afghanistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(10, 'Albania', 'albania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(11, 'Algeria', 'algeria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(12, 'American Samoa', 'american-samoa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(13, 'Andorra', 'andorra', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(14, 'Angola', 'angola', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(15, 'Anguilla', 'anguilla', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(16, 'Antarctica', 'antarctica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(17, 'Antigua and Barbuda', 'antigua-and-barbuda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(18, 'Argentina', 'argentina', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(19, 'Armenia', 'armenia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(20, 'Aruba', 'aruba', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(21, 'Ashmore and Cartier', 'ashmore-and-cartier', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(3, 'Australia', 'australia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(23, 'Austria', 'austria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(24, 'Azerbaijan', 'azerbaijan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(26, 'Bahrain', 'bahrain', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(27, 'Baker Island', 'baker-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(28, 'Bangladesh', 'bangladesh', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(29, 'Barbados', 'barbados', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(30, 'Bassas da India', 'bassas-da-india', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(31, 'Belarus', 'belarus', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(32, 'Belgium', 'belgium', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(33, 'Belize', 'belize', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(34, 'Benin', 'benin', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(35, 'Bermuda', 'bermuda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(36, 'Bhutan', 'bhutan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(37, 'Bolivia', 'bolivia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(38, 'Bosnia and Herzegovina', 'bosnia-and-herzegovina', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(39, 'Botswana', 'botswana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(40, 'Bouvet Island', 'bouvet-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(41, 'Brazil', 'brazil', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(42, 'British Indian Ocean Territory', 'british-indian-ocean-territory', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(43, 'British Virgin Islands', 'british-virgin-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(44, 'Brunei Darussalam', 'brunei-darussalam', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(45, 'Bulgaria', 'bulgaria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(46, 'Burkina Faso', 'burkina-faso', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(47, 'Burma', 'burma', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(48, 'Burundi', 'burundi', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(49, 'Cambodia', 'cambodia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(50, 'Cameroon', 'cameroon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(4, 'Canada', 'canada', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(52, 'Cape Verde', 'cape-verde', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(53, 'Cayman Islands', 'cayman-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(54, 'Central African Republic', 'central-african-republic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(55, 'Chad', 'chad', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(56, 'Chile', 'chile', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(57, 'China', 'china', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(58, 'Christmas Island', 'christmas-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(59, 'Clipperton Island', 'clipperton-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(60, 'Cocos (Keeling) Islands', 'cocos-keeling-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(61, 'Colombia', 'colombia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(62, 'Comoros', 'comoros', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(63, 'Congo, Democratic Republic of the', 'congo-democratic-republic-of-the', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(64, 'Congo, Republic of the', 'congo-republic-of-the', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(65, 'Cook Islands', 'cook-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(66, 'Coral Sea Islands', 'coral-sea-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(67, 'Costa Rica', 'costa-rica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(68, 'Cote d\'Ivoire', 'cote-d-ivoire', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(69, 'Croatia', 'croatia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(70, 'Cuba', 'cuba', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(71, 'Cyprus', 'cyprus', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(72, 'Czech Republic', 'czech-republic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(73, 'Denmark', 'denmark', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(74, 'Djibouti', 'djibouti', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(75, 'Dominica', 'dominica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(76, 'Dominican Republic', 'dominican-republic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(77, 'East Timor', 'east-timor', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(78, 'Ecuador', 'ecuador', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(79, 'Egypt', 'egypt', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(80, 'El Salvador', 'el-salvador', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(81, 'Equatorial Guinea', 'equatorial-guinea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(82, 'Eritrea', 'eritrea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(83, 'Estonia', 'estonia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(84, 'Ethiopia', 'ethiopia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(85, 'Europa Island', 'europa-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(86, 'Falkland Islands (Islas Malvinas)', 'falkland-islands-islas-malvinas', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(87, 'Faroe Islands', 'faroe-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(88, 'Fiji', 'fiji', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(89, 'Finland', 'finland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(90, 'France', 'france', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(91, 'France, Metropolitan', 'france-metropolitan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(92, 'French Guiana', 'french-guiana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(93, 'French Polynesia', 'french-polynesia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(94, 'French Southern and Antarctic Lands', 'french-southern-and-antarctic-lands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(95, 'Gabon', 'gabon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(97, 'Gaza Strip', 'gaza-strip', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(98, 'Georgia', 'georgia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(99, 'Germany', 'germany', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(100, 'Ghana', 'ghana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(101, 'Gibraltar', 'gibraltar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(102, 'Glorioso Islands', 'glorioso-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(103, 'Greece', 'greece', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(104, 'Greenland', 'greenland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(105, 'Grenada', 'grenada', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(106, 'Guadeloupe', 'guadeloupe', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(107, 'Guam', 'guam', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(108, 'Guatemala', 'guatemala', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(109, 'Guernsey', 'guernsey', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(110, 'Guinea', 'guinea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(111, 'Guinea-Bissau', 'guinea-bissau', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(112, 'Guyana', 'guyana', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(113, 'Haiti', 'haiti', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(114, 'Heard Island and McDonald Islands', 'heard-island-and-mcdonald-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(115, 'Holy See (Vatican City)', 'holy-see-vatican-city', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(116, 'Honduras', 'honduras', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(117, 'Hong Kong (SAR)', 'hong-kong-sar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(118, 'Howland Island', 'howland-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(119, 'Hungary', 'hungary', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(120, 'Iceland', 'iceland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(8, 'India', 'india', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(122, 'Indonesia', 'indonesia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(123, 'Iran', 'iran', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(124, 'Iraq', 'iraq', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(125, 'Ireland', 'ireland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(126, 'Israel', 'israel', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(127, 'Italy', 'italy', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(128, 'Jamaica', 'jamaica', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(129, 'Jan Mayen', 'jan-mayen', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(130, 'Japan', 'japan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(131, 'Jarvis Island', 'jarvis-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(132, 'Jersey', 'jersey', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(133, 'Johnston Atoll', 'johnston-atoll', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(134, 'Jordan', 'jordan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(135, 'Juan de Nova Island', 'juan-de-nova-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(136, 'Kazakhstan', 'kazakhstan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(137, 'Kenya', 'kenya', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(138, 'Kingman Reef', 'kingman-reef', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(139, 'Kiribati', 'kiribati', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(140, 'Korea, North', 'korea-north', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(141, 'Korea, South', 'korea-south', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(142, 'Kuwait', 'kuwait', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(143, 'Kyrgyzstan', 'kyrgyzstan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(144, 'Laos', 'laos', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(145, 'Latvia', 'latvia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(146, 'Lebanon', 'lebanon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(147, 'Lesotho', 'lesotho', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(148, 'Liberia', 'liberia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(149, 'Libya', 'libya', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(150, 'Liechtenstein', 'liechtenstein', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(151, 'Lithuania', 'lithuania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(152, 'Luxembourg', 'luxembourg', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(153, 'Macao', 'macao', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(154, 'Macedonia, The Former Yugoslav Republic of', 'macedonia-the-former-yugoslav-repu', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(155, 'Madagascar', 'madagascar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(156, 'Malawi', 'malawi', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(157, 'Malaysia', 'malaysia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(158, 'Maldives', 'maldives', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(159, 'Mali', 'mali', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(160, 'Malta', 'malta', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(161, 'Man, Isle of', 'man-isle-of', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(162, 'Marshall Islands', 'marshall-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(163, 'Martinique', 'martinique', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(164, 'Mauritania', 'mauritania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(165, 'Mauritius', 'mauritius', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(166, 'Mayotte', 'mayotte', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(167, 'Mexico', 'mexico', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(168, 'Micronesia, Federated States of', 'micronesia-federated-states-of', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(169, 'Midway Islands', 'midway-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(170, 'Miscellaneous (French)', 'miscellaneous-french', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(171, 'Moldova', 'moldova', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(172, 'Monaco', 'monaco', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(173, 'Mongolia', 'mongolia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(174, 'Montenegro', 'montenegro', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(175, 'Montserrat', 'montserrat', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(176, 'Morocco', 'morocco', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(177, 'Mozambique', 'mozambique', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(178, 'Myanmar', 'myanmar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(179, 'Namibia', 'namibia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(180, 'Nauru', 'nauru', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(181, 'Navassa Island', 'navassa-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(182, 'Nepal', 'nepal', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(183, 'Netherlands', 'netherlands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(184, 'Netherlands Antilles', 'netherlands-antilles', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(185, 'New Caledonia', 'new-caledonia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(7, 'New Zealand', 'new-zealand', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(187, 'Nicaragua', 'nicaragua', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(188, 'Niger', 'niger', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(189, 'Nigeria', 'nigeria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(190, 'Niue', 'niue', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(191, 'Norfolk Island', 'norfolk-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(192, 'Northern Mariana Islands', 'northern-mariana-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(193, 'Norway', 'norway', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(194, 'Oman', 'oman', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(195, 'Pakistan', 'pakistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(196, 'Palau', 'palau', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(283, 'Palestinian Territory, Occupied', 'palestinian-territory-occupied', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(197, 'Palmyra Atoll', 'palmyra-atoll', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(198, 'Panama', 'panama', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(199, 'Papua New Guinea', 'papua-new-guinea', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(200, 'Paracel Islands', 'paracel-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(201, 'Paraguay', 'paraguay', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(202, 'Peru', 'peru', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(203, 'Philippines', 'philippines', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(204, 'Pitcairn Islands', 'pitcairn-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(205, 'Poland', 'poland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(206, 'Portugal', 'portugal', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(207, 'Puerto Rico', 'puerto-rico', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(208, 'Qatar', 'qatar', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(209, 'R', 'r', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(210, 'Romania', 'romania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(211, 'Russia', 'russia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(212, 'Rwanda', 'rwanda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(213, 'Saint Helena', 'saint-helena', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(214, 'Saint Kitts and Nevis', 'saint-kitts-and-nevis', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(215, 'Saint Lucia', 'saint-lucia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(216, 'Saint Pierre and Miquelon', 'saint-pierre-and-miquelon', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(217, 'Saint Vincent and the Grenadines', 'saint-vincent-and-the-grenadines', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(218, 'Samoa', 'samoa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(219, 'San Marino', 'san-marino', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(220, 'S', 's', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(221, 'Saudi Arabia', 'saudi-arabia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(222, 'Senegal', 'senegal', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(223, 'Serbia', 'serbia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(224, 'Serbia and Montenegro', 'serbia-and-montenegro', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(225, 'Seychelles', 'seychelles', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(226, 'Sierra Leone', 'sierra-leone', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(227, 'Singapore', 'singapore', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(228, 'Slovakia', 'slovakia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(229, 'Slovenia', 'slovenia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(230, 'Solomon Islands', 'solomon-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(231, 'Somalia', 'somalia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(232, 'South Africa', 'south-africa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(233, 'South Georgia and the South Sandwich Islands', 'south-georgia-and-the-south-sandwic', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(234, 'Spain', 'spain', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(235, 'Spratly Islands', 'spratly-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(236, 'Sri Lanka', 'sri-lanka', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(237, 'Sudan', 'sudan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(238, 'Suriname', 'suriname', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(239, 'Svalbard', 'svalbard', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(240, 'Swaziland', 'swaziland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(241, 'Sweden', 'sweden', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(242, 'Switzerland', 'switzerland', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(243, 'Syria', 'syria', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(244, 'Taiwan', 'taiwan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(245, 'Tajikistan', 'tajikistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(246, 'Tanzania', 'tanzania', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(247, 'Thailand', 'thailand', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(25, 'The Bahamas', 'the-bahamas', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(96, 'The Gambia', 'the-gambia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(248, 'Togo', 'togo', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(249, 'Tokelau', 'tokelau', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(250, 'Tonga', 'tonga', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(251, 'Trinidad and Tobago', 'trinidad-and-tobago', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(252, 'Tromelin Island', 'tromelin-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(253, 'Tunisia', 'tunisia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(254, 'Turkey', 'turkey', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(255, 'Turkmenistan', 'turkmenistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(256, 'Turks and Caicos Islands', 'turks-and-caicos-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(257, 'Tuvalu', 'tuvalu', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(258, 'Uganda', 'uganda', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(259, 'Ukraine', 'ukraine', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(260, 'United Arab Emirates', 'united-arab-emirates', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(5, 'United Kingdom', 'united-kingdom', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(2, 'United States', 'united-states', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(263, 'United States Minor Outlying Islands', 'united-states-minor-outlying-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(264, 'Uruguay', 'uruguay', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(265, 'Uzbekistan', 'uzbekistan', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(266, 'Vanuatu', 'vanuatu', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(267, 'Venezuela', 'venezuela', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(268, 'Vietnam', 'vietnam', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(269, 'Virgin Islands', 'virgin-islands', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(270, 'Virgin Islands (UK)', 'virgin-islands-uk', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(271, 'Virgin Islands (US)', 'virgin-islands-us', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(272, 'Wake Island', 'wake-island', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(273, 'Wallis and Futuna', 'wallis-and-futuna', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(274, 'West Bank', 'west-bank', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(275, 'Western Sahara', 'western-sahara', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(276, 'Western Samoa', 'western-samoa', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(277, 'World', 'world', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(278, 'Yemen', 'yemen', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(279, 'Yugoslavia', 'yugoslavia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(280, 'Zaire', 'zaire', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(281, 'Zambia', 'zambia', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(282, 'Zimbabwe', 'zimbabwe', 1, '2015-02-02 07:00:00', '2015-02-02 07:00:00'),
(297, 'vv', 'vv', 1, '2015-06-10 20:43:49', '2015-06-10 20:43:49');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_emailtemplates`
--

CREATE TABLE `tbl_emailtemplates` (
  `id` int NOT NULL,
  `static_email_heading` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `subject` varchar(150) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `template` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_emailtemplates`
--

INSERT INTO `tbl_emailtemplates` (`id`, `static_email_heading`, `title`, `subject`, `template`) VALUES
(1, 'admin_forgot', 'Admin Forgot Password', 'Admin Forgot Password', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Hi</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You have successfully retrieved login credentials!</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><a href=\"[!HTTP_PATH!]/admin/admins/login\" style=\"color:#434343;\">Click Here</a> To Login.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Username:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Password:</strong> [!password!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(2, 'user_added_from_admin', 'Register Added From Admin', 'Welcome on [!SITE_TITLE!]', '<table><tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Hi</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Your customer account has been created successfully by admin on [!SITE_TITLE!]</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Details are below :</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Password:</strong> [!password!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(3, 'user_register', 'User Registration', 'Welcome to [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#000000; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343; margin:0px 0 0;\">We are pleased to announce that your account has been created successfully.</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>   \r\n            <p style=\"color:#434343; margin:10px 0 0;\">Please click the link below to verify your Email address. </p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><a style=\"text-decoration:underline;\" href=\"[!link!]\">Click here</a> to verify your Email address. </p>\r\n\r\n        </td>\r\n    </tr>\r\n</table>'),
(4, 'forgot_password', 'Forgot Password', '[!SITE_TITLE!] Reset password', '<table>\r\n    <tr>\r\n        <td style=\"color:#000000; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Please reset your Password on <a href=\"<?php echo HTTP_PATH;?>\" style=\"color:#eb2f23;text-decoration: underline;\"></a> [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><a href=\"[!link!]\" style=\"color:#434343; \">Click here</a> to reset your account password.</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(5, 'user_register_social', 'User Registration by Social', 'Welcome on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#000000; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Welcome to</b> [!SITE_TITLE!]</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\">We are pleased to announce that your account has been created using [!login_type!] successfully.</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343; margin:0px 0 0;\"><strong style=\"width:150px;\">Password:</strong> [!password!]</p>    \r\n        </td>\r\n    </tr>\r\n</table>'),
(6, 'contact_email', 'Contact email send to admin', '[!name!] send Enquiry on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Hi</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Soneone send enquiry on [!SITE_TITLE!] via contact us with below details</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Name:</strong> [!name!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Email Address:</strong> [!email!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Contact Number:</strong> [!contact!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Message:</strong> [!message!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(7, 'offer_sent_buyer', 'Offer detail sent to buyer', '[!name!] has sent offer for your service request on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!name!]</b> has sent an offer on your service request <b>[!title!]</b>  on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Name:</strong> [!name!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Deliver in:</strong> [!deliver_in!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Message:</strong> [!message!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(8, 'offer_rejected_email', 'Offer rejected by buyer', 'Your offer has been rejected by buyer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Your offer on service request <b>[!title!]</b> has been rejected by buyer on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(9, 'offer_accepted_email', 'Offer accepted by buyer', 'Your offer has been accepted by buyer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">Your offer on service request <b>[!title!]</b> has been accepted by buyer on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(10, 'service_accept_paypal_payment_user', 'Email sent to user when accept service request and pay using PayPal', 'You have successfully accepted offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You have successfully accepted seller offer and made payment on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(11, 'service_accept_paypal_payment_admin', 'Email sent to admin when accept service request and pay using PayPal', '[!username!] has accepted offer and mad payment via [!paymenttype!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has accepted seller offer and made payment on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Buyer Name:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(12, 'service_accept_paypal_payment_seller', 'Email sent to seller when accept service request and pay using PayPal', '[!username!] has accepted your offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!sellername!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has accepted your offer sent by you on service request <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n          </td>\r\n    </tr>\r\n</table>'),
(13, 'gig_paypal_payment_user', 'Email sent to user when purchase gig and pay using PayPal', 'You have successfully purchased gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You have successfully purchased gig on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(14, 'gig_payment_paypal_payment_admin', 'Email sent to admin when user purchase gig and pay using PayPal', '[!username!] has purchased gig and made payment via [!paymenttype!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> Admin,</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has purchased gig and made payment on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Buyer Name:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(15, 'gig_purchase_paypal_payment_seller', 'Email sent to seller when purchase gig and pay using PayPal', '[!username!] has purchased your gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!sellername!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has purchased your gig <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Buyer Name:</strong> [!username!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Payment Method:</strong> [!paymenttype!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(16, 'gig_mark_as_completed_by_buyer', 'Gig mark as completed by Buyer', 'Gig marked as completed by buyer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has marked your gig <b>[!title!]</b> as completed on [!SITE_TITLE!]. So please login on [!SITE_TITLE!] and give review rating to buyer.</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(17, 'rating_for_gig_by_buyer', 'Email sent to seller when buyer rate seller for Gig', 'Buyer give review rating for your completed gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has given review and rating for your recently completed gig <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(18, 'rating_for_gig_by_seller', 'Email sent to buyer when seller rate buyer for Gig', 'Seller give review rating for your purchased gig on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has given review and rating for your purchased gig <b>[!title!]</b> on [!SITE_TITLE!].</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(19, 'request_mark_as_completed_by_seller', 'Service request mark as completed by seller', 'Service request marked as completed by seller on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!loginuser!]</b> has marked service request <b>[!title!]</b> as completed on [!SITE_TITLE!]. So please login on [!SITE_TITLE!] and give review rating to seller.</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(20, 'wallet_credited_for_request_completion', 'Wallet credited for service completion', 'Your wallet is credited with amount [!amount!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!username!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>Your wallet is credited with amount <b>[!amount!]</b> on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Service Request Title:</strong> [!title!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Amount:</strong> [!amount!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">TransactionID:</strong> [!transactionId!]</p>\r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Date:</strong> [!datetime!]</p>\r\n        </td>\r\n    </tr>\r\n</table>'),
(21, 'message_send', 'Message send to seller/buyer', '[!username!] has sent a message on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><b>[!username!]</b> has sent a message on [!SITE_TITLE!] with below details.</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Name:</strong> [!username!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Message:</strong> [!message!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(22, 'offer_send', 'Offer send to buyer', 'You just received an order from [!username!] on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">You\'ve just received an order from [!username!] Feels good, right?\r\nOrder is due [!duedate!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(23, 'offer_accept_by_buyer', 'Offer accept by buyer', '[!username!] just accepted an offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">[!username!] have just accepted an offer on [!SITE_TITLE!] Feels good, right?</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(24, 'offer_reject_by_buyer', 'Offer reject by buyer', '[!username!] just rejected an offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">[!username!] have just rejected an offer on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>'),
(25, 'offer_withdrawn_by_seller', 'Offer withdrawn by seller', '[!username!] just withdrawn an offer on [!SITE_TITLE!]', '<table>\r\n    <tr>\r\n        <td style=\"color:#002859; font:bold 15px Arial, Helvetica, sans-serif; margin:0; padding:10px 0 0;\"><b style=\"color:#000000;\">Dear</b> [!name!],</td>\r\n    </tr>\r\n    <tr>\r\n        <td style=\"color:#434343; font-size:13px; line-height:18px;\">\r\n            <p style=\"color:#434343;margin:10px 0 0;\">[!username!] have just withdrawn an offer on [!SITE_TITLE!].</p>\r\n            <p style=\"color:#434343;margin:10px 0 0;\"><strong style=\"width:150px;\">Item:</strong> [!item!]</p>            \r\n            <p style=\"color:#434343;margin:0px 0 0;\"><strong style=\"width:150px;\">Price:</strong> [!price!]</p>  \r\n        </td>\r\n    </tr>\r\n</table>');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gigextras`
--

CREATE TABLE `tbl_gigextras` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `gig_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `price` int NOT NULL,
  `delivery` int NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gigextras`
--

INSERT INTO `tbl_gigextras` (`id`, `user_id`, `gig_id`, `title`, `description`, `price`, `delivery`, `slug`, `status`) VALUES
(160, 3, 1, 'Topic Research', 'Profile best Topic Research', 5, 1, 'extra11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gigfaqs`
--

CREATE TABLE `tbl_gigfaqs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `gig_id` int NOT NULL,
  `question` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `answer` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gigfaqs`
--

INSERT INTO `tbl_gigfaqs` (`id`, `user_id`, `gig_id`, `question`, `answer`, `slug`, `status`) VALUES
(108, 4, 11, 'Wordpress Sites?', 'I do not do Wordpress sites. Because I simply have too many orders, I don\'t do Wordpress sites, or any other websites outside of the WIX platform.', 'question111', 1),
(109, 4, 11, 'What I need before starting', 'Once ordered, there\'ll be an easy welcome questionnaire Please include - Logo (colours for your site) - Content (or I will just leave up example text, for you to edit later) - Customisation requests/ links to other sites (order the customisation extra) - Any images / videos if you have them.', 'question112', 1),
(110, 4, 11, 'WIX Restrictions', 'WIX is a non-technical page builder, therefore there are some things it just doesn\'t do: - Job Posting Boards (for recruitment sites) - Real Estate Listing Capabilities - Complex Databases MySQL - Custom Php - Customised backend code. - \'Multi-Vendor\' Stores (Normal stores are great!)', 'question113', 1),
(111, 4, 11, 'Custom CSS?', 'Yes, I can. WIX has a code \'embed\' tool. Though with Custom CSS, there will be an extra charge depending on the project. Though, not all CSS jobs are possible through WIX. Please message me prior to discuss.', 'question114', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gigmessages`
--

CREATE TABLE `tbl_gigmessages` (
  `id` int NOT NULL,
  `gig_id` int DEFAULT NULL,
  `myorder_id` int DEFAULT NULL,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `message` text,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `time` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gigrequirements`
--

CREATE TABLE `tbl_gigrequirements` (
  `id` int NOT NULL,
  `gig_id` int NOT NULL,
  `user_id` int NOT NULL,
  `answer_type` varchar(255) NOT NULL,
  `options` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `is_mandatory` int NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` int NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gigrequirements`
--

INSERT INTO `tbl_gigrequirements` (`id`, `gig_id`, `user_id`, `answer_type`, `options`, `is_mandatory`, `description`, `slug`, `status`) VALUES
(235, 236, 4, '', '', 1, 'basic excel knowledge', 'requirement2361', 1),
(236, 233, 4, '', '', 1, 'requirements of logo design', 'requirement2331', 1),
(237, 232, 4, '', '', 1, 'information regarding your subject', 'requirement2321', 1),
(238, 230, 4, '', '', 1, 'basic knowledge of instruments', 'requirement2301', 1),
(239, 229, 4, '', '', 1, 'lyrics documents  of song', 'requirement2291', 1),
(240, 11, 4, '', '', 1, 'Only should know the basic requirement of the website', 'requirement111', 1),
(241, 228, 3, '', '', 1, 'requirement document of website', 'requirement2281', 1),
(242, 227, 3, '', '', 1, 'basic knowledge of english', 'requirement2271', 1),
(243, 226, 3, '', '', 1, 'insurance documents of car', 'requirement2261', 1),
(244, 222, 3, '', '', 1, 'organization information', 'requirement2221', 1),
(245, 221, 3, '', '', 1, 'organization information', 'requirement2211', 1),
(247, 1, 3, '', '', 0, 'I need Server Information and HTML access', 'requirement11', 1),
(248, 268, 22, '', '', 1, 'basic information of HTML, CSS, JS .', 'requirement2681', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gigs`
--

CREATE TABLE `tbl_gigs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_id` varchar(255) NOT NULL,
  `subcategory_id` int NOT NULL,
  `tags` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `basic_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `basic_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `basic_delivery` varchar(50) NOT NULL,
  `basic_revision` varchar(20) NOT NULL,
  `basic_price` int NOT NULL,
  `standard_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `standard_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `standard_delivery` varchar(50) NOT NULL,
  `standard_revision` varchar(20) NOT NULL,
  `standard_price` int NOT NULL,
  `premium_title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `premium_description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `premium_delivery` varchar(50) NOT NULL,
  `premium_revision` varchar(20) NOT NULL,
  `premium_price` int NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `photo` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `youtube_url` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `youtube_image` varchar(255) DEFAULT NULL,
  `pdf_doc` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `expiry` varchar(255) DEFAULT NULL,
  `one_delivery` varchar(255) DEFAULT NULL,
  `type_gig` varchar(255) DEFAULT NULL,
  `offer_status` int DEFAULT '0',
  `offer_user` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int NOT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `pause` tinyint NOT NULL DEFAULT '0',
  `waitlist` longtext
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_gigs`
--

INSERT INTO `tbl_gigs` (`id`, `user_id`, `title`, `category_id`, `subcategory_id`, `tags`, `basic_title`, `basic_description`, `basic_delivery`, `basic_revision`, `basic_price`, `standard_title`, `standard_description`, `standard_delivery`, `standard_revision`, `standard_price`, `premium_title`, `premium_description`, `premium_delivery`, `premium_revision`, `premium_price`, `description`, `photo`, `youtube_url`, `youtube_image`, `pdf_doc`, `expiry`, `one_delivery`, `type_gig`, `offer_status`, `offer_user`, `slug`, `status`, `updated_at`, `pause`, `waitlist`) VALUES
(1, 3, 'I will write SEO friendly content for a Website', '6', 53, '518,455,516', '5 Page SEO', 'Fully SEO optimised blog post/article on subject of your choice. 500 Words', '4', '0', 20, '15 Page SEO', 'Fully SEO optimised blog post/article on subject of your choice. 1000 Words.', '16', '1', 30, 'Whole Website Page SEO', 'Fully SEO optimised blog post/article on subject of your choice. 5000 Words.', '12', '2', 40, '<p>I will write you&nbsp;high quality, 100%unique and perfectly SEO optimised articles for your site, blog or business portal.&nbsp;My writing can be whatever you need it to be, informative, technical or funny.</p>\r\n\r\n<p>I will write you&nbsp;high quality, 100%unique and perfectly SEO optimised articles for your site, blog or business portal. My writing can be whatever you need it to be, informative, technical or funny.</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-write-seo-friendly-content-for-a-website', 1, '2022-08-16 10:52:09', 1, NULL),
(11, 4, 'I will design your professional wix website', '2', 90, '523,169', '6 page custom website', 'Custom Design - Tailored Design - Responsive Pages - Dedicated support 20 days after design', '3', '3', 10, '8 page custom website', 'Custom Design - Tailored Design - Responsive Pages - Dedicated support 25 days after design', '8', '4', 20, '10 page custom website', 'Custom Design - Tailored Design - Responsive Pages - Dedicated support 30 days after design', '5', '4', 25, '<p>Need a <strong>dedicated design team</strong>?</p>\r\n\r\n<p>Looking to elevate<strong> </strong>your<strong> business presence</strong>?</p>\r\n\r\n<p>Are you serious about a <strong>quality website design</strong>?&nbsp;<br />\r\n<br />\r\nBad websites + poor page layout can:</p>\r\n\r\n<ul>\r\n	<li>Kill sales &amp; Look unprofessional... So... try something a little different for your business.</li>\r\n</ul>\r\n\r\n<p><br />\r\nHow about a responsive, fully customized modern design that&rsquo;s tailored to your needs?<br />\r\n<br />\r\nWell, that&#39;s why my team and I use WIX as the all-in-one solution.<br />\r\n<br />\r\n<strong>Our service includes:</strong><br />\r\n<br />\r\n- Create 4-10 web pages</p>\r\n\r\n<p>- HD images, video</p>\r\n\r\n<p>- Blog pages</p>\r\n\r\n<p>- Landing pages</p>\r\n\r\n<p>- Subscriptions<br />\r\n<br />\r\n<strong>Branding</strong> <strong>kit:</strong><br />\r\n<br />\r\n- Social Media<br />\r\n- Stationary<br />\r\n- Vectorised Logo<br />\r\n- Typography (font)</p>\r\n\r\n<ul>\r\n	<li>Advanced Analytics Set Up:<br />\r\n	- Using WIX <strong>analytics</strong> or Google Analytics.</li>\r\n	<li>On-Page <strong>SEO</strong> (using your provided keywords)</li>\r\n	<li>20 x Premium <strong>Shutterstock</strong> Images or Graphics</li>\r\n	<li>Discounts on future maintenance, <strong>premium</strong> <strong>support</strong> tickets and more.</li>\r\n</ul>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-design-your-professional-wix-website', 1, '2022-08-16 10:28:23', 1, NULL),
(221, 3, 'I will create  responsive HTML website designs', '2', 90, '', 'Basic website', 'Customize web design page HTML, css, responsive page , Or remove error', '2', '1', 20, 'Standard website', 'Creative and professional web designs HTML customization . responsive, as per your requirements', '3', '4', 30, 'Premium wesite', 'premium web site design from the scratch, professional 100% responsive web designs', '6', '3', 40, '<p>In simple word web design related whatever you want please feel free to contact<br />\r\n<br />\r\nI will remove errors&nbsp; in php, css, javascript, jquery etc in existing website (Live) .<br />\r\n<br />\r\nI will also add functionality in your existing websites and customize as per your requirements.<br />\r\n<br />\r\nI&#39;ll customize an existing website that you have for mobile phones and tablets and make them mobile friendly with 100% responsive design.<br />\r\n<br />\r\nIf you needed extra pages for the existing websites I&#39;ll also design for you.<br />\r\n<br />\r\nNow a days responsive is important for each site the reason is that&nbsp; more than 60% users/visitor visit your site by using mobile phones.</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-create-responsive-html-website-designs', 1, '2022-08-16 10:51:02', 1, NULL),
(222, 3, 'We will provide Business plan', '8', 48, '', 'Basic business plan', 'basic structure of business', '2', '2', 20, 'standard business plan', 'standard structure with finance management', '5', '3', 25, 'Premium business plan', 'Premium business plan with finance management with business tips', '10', '3', 30, '<p>Whether you&#39;re starting a small&nbsp;<strong>business</strong>&nbsp;or exploring ways to expand an existing one, a&nbsp;<strong>business plan</strong>&nbsp;is an&nbsp;<strong>important</strong>&nbsp;tool to help guide your decisions</p>\r\n\r\n<p>We provide annual plan one pager</p>\r\n\r\n<p>Experiment plans and its result</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'we-will-provide-business-plan', 1, '2022-08-16 10:50:32', 1, NULL),
(226, 3, 'We will provide car services and will design you are car', '3', 34, '', 'Basic', 'included car wash', '1', '0', 15, 'Standard', 'included car wash ,oiling', '3', '0', 25, 'Premium', 'included car wash and whole car servicing', '4', '0', 35, '<p>An automobile repair shop is an establishment where automobiles are repaired by auto mechanics and technicians</p>\r\n\r\n<p>We have a&nbsp; 10&nbsp;years experienced mechanics&nbsp;</p>\r\n\r\n<p>We provide insurance claim of car</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'we-will-car-services', 1, '2022-08-16 10:50:00', 1, NULL),
(227, 3, 'I will teach you french language', '8', 51, '', 'Basics french', 'its included a basic french vocabulary', '3', '1', 25, 'Standard French', 'its included standard vocabulary with grammar', '5', '3', 40, 'Premium french', 'its included premium vocabulary with detail grammer, with some notes and ppt presentation', '10', '5', 45, '<p>French is a Romance language of the Indo-European family. It descended from the Vulgar Latin of the Roman Empire, as did all Romance languages</p>\r\n\r\n<p>its widly used&nbsp; language after english laguage</p>\r\n\r\n<p>we provide level5 french languge courses</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-teach-you-french-language', 1, '2022-08-16 10:47:56', 1, NULL),
(228, 3, 'I will design and build a beautiful website', '2', 90, '', 'Silver Web Design Package', 'Custom web design and development service. Google friendly. Perfect for start-ups', '2', '1', 15, 'Gold Web Design Package', 'Custom WordPress web design and development service. Google friendly. Perfect for growing businesses', '4', '1', 20, 'Ecommerce Web Design Package', 'Custom Ecommerce web design and development service. Google friendly. Perfect for online stores.', '5', '1', 30, '<p>As a small, dedicated&nbsp;team of web design professionals we&#39;ve been in business over ten years now.&nbsp;We offer a unique blend of marketing insight combined with dazzling web design skills so you get the full agency service&nbsp;<em>without&nbsp;</em>the price tag.</p>\r\n\r\n<p>Whether you&rsquo;re a start-up taking your first steps into the online world or a web veteran looking to bring your company&rsquo;s website up to date&nbsp;and blitz the competition, we can&rsquo;t wait to help you achieve your&nbsp;goals. Your new website will be visually engaging to impress the pants off your customers, fully responsive to make sure it works beautifully on all of the latest mobiles and tablets and it will also feature an easy to use Content Management System [CMS] to enable&nbsp;even the biggest technophobes&nbsp;in your company to quickly and efficiently update your content.</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-design-and-build-a-beautiful-website', 1, '2022-08-16 10:34:29', 1, NULL),
(229, 4, 'I will mixing and master your song', '4', 36, '', 'Basic', 'Professionally Mix & Master up to 30 audio tracks/stems', '2', '1', 20, 'Standard', 'Professionally Mix & Master up to 20 audio tracks/stems', '3', '4', 30, 'Premium', 'Professionally Mix & Master up to 30 audio tracks/stems', '4', '4', 35, '<p>I have extensive experience in the mixing and mastering of the various musical styles: Rock,Pop,Jazz,Rap/Hip-Hop,House,Techno, Folk,Classical,Music for Film,etc..<br />\r\n<br />\r\nMy love and passion for good sound is unlimited<br />\r\n<br />\r\nI would like to share with you<br />\r\n<br />\r\n<u><strong>Price includes</strong></u><strong>&nbsp;</strong><u><u><strong>f</strong></u><strong>ull</strong></u><u><strong>&nbsp;m</strong><u><strong>aster:</strong></u></u><br />\r\n<br />\r\nDetailed Equalization<br />\r\n<br />\r\nMulti-Band Compression<br />\r\n<br />\r\nDynamic Range Enhancement<br />\r\n<br />\r\nHarmonic Saturation Processing<br />\r\n<br />\r\nStereo Imaging</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-mixing-and-master-your-song', 1, '2022-08-16 10:25:36', 1, NULL),
(230, 4, 'I will teach you instrumental music', '4', 39, '', 'Basic', 'its included one instrument', '5', '1', 20, 'Standard', 'its included 2 instruments as per your choice', '10', '3', 35, 'Premium', 'its included multiple  new  music instrument', '17', '4', 55, '<p>An instrumental is a recording without any vocals, although it might include some inarticulate vocals, such as shouted backup vocals in a Big Band setting</p>\r\n\r\n<p>which uses any combination of instruments, such as strings, woodwinds, brass, or percussion usually without the human voice.</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-teach-you-instrumental-music', 1, '2022-08-16 10:24:00', 1, NULL),
(232, 4, 'Legal Advice for any subject', '101', 102, '', 'Basic', 'Basic legal advice', '1', '1', 20, 'Standard', 'Standard legal advice', '2', '1', 35, 'Premium', 'Premium legal advice', '4', '1', 35, '<p>Legal advice is the giving of a professional or formal opinion regarding the substance or procedure of the law in relation to a particular factual situation. The provision of legal advice will often involve analyzing a set of facts and advising a person to take a specific course of action based on the applicable la</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'legal-advice-for-any-subject', 1, '2022-08-16 10:23:01', 1, NULL),
(233, 4, 'I will make 3d logo with copyrights', '3', 24, '128,52', 'Basic Logo', 'Single Logo with HD JPEG and Transp', '2', '2', 15, 'Standard Logo', '3 Logos + HD JPEG and Transparent B', '4', '3', 25, 'Premium Logo', '3 Logos + HD JPEG, PNG + Sourcefile', '5', '3', 40, '<p>Need a kick-ass Brand Identity? We are here for you! Bizon Production is a team of talented individuals specializing in all aspects of design. Logo design and animation is our passion!<br />\r\n<br />\r\n&nbsp;Our talented team of designers can create a hand-made logo that is unique for your brand. We never use stock images or recycle designs -<strong>&nbsp;your logo is your identity and will be as unique as your business!&nbsp;</strong>We will work together to determine the best style logo for your business. We also specialize in mascot design!</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-make-3d-logo-with-copyrights', 1, '2022-08-16 10:22:05', 1, NULL),
(236, 4, 'I will create an macro excel with excel vba', '1', 18, '', 'Silver', 'If you need a simple excel macro in VBA that automates a repetitive task', '1', '1', 20, 'Golden', 'If you need a more complex excel macro that involves multiple process steps', '2', '3', 40, 'Platinum', 'If you need a customized macro solution, tailored to completely automate your excel workflow', '4', '4', 50, '<p>Wouldn&rsquo;t it be nice if you could have the more&nbsp;<strong>redundant parts&nbsp;</strong>of your Excel reporting processes&nbsp;<strong>performed automatically</strong>?&nbsp;</p>\r\n\r\n<p>Are you worried about handling larger amounts of data and do you want to&nbsp;<strong>avoid&nbsp;manual mistakes&nbsp;</strong>in your excel file?&nbsp;</p>\r\n\r\n<p>Do you run&nbsp;everyday Excel tasks to clean up and format data that are very&nbsp;<strong>time-consuming</strong>?<br />\r\n<br />\r\nIf you replied YES, then I am here to help by creating an Excel macro with VBA.<br />\r\n<br />\r\nAs an excel veteran with 10+ years of experience in macro development, I can assist with automating simple and complex excel tasks.<br />\r\n<br />\r\nMacros massively save you time and expand the functionality of your excel files. You can:<br />\r\n&nbsp;</p>\r\n\r\n<ul><br />\r\n	<li>Automate the creation of quotes, purchase orders, invoices</li>\r\n	<br />\r\n	<li>Automatically remove duplicates in two spreadsheets</li>\r\n	<br />\r\n	<li>Create user forms to guide your users through the file</li>\r\n	<br />\r\n	<li>Add new and custom buttons to the Excel menu</li>\r\n	<br />\r\n	<li>Find and delete corrupt data or blank entries</li>\r\n	<br />\r\n	<li>Import and export data from/to other files</li>\r\n	<br />\r\n	<li>Automatically create charts from your data with the click of a button</li>\r\n	<br />\r\n	<li>Speed up processes with just a single click of a button.</li>\r\n</ul>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'i-will-create-an-macro-excel-with-excel-vba', 1, '2022-08-16 10:10:43', 1, NULL),
(268, 22, 'Laravel', '6', 53, '464,449', 'Laravel basic', 'basic information.', '1', '2', 10, 'Laravel Standard', 'standard information.', '2', '3', 20, 'Laravel Premium', 'All information', '3', '3', 30, '<p>All Laravel pakages are coverd.</p>', '', '', NULL, '', NULL, NULL, NULL, 0, NULL, 'laravel', 1, '2023-02-27 03:40:43', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_images`
--

CREATE TABLE `tbl_images` (
  `id` bigint NOT NULL,
  `gig_id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint NOT NULL DEFAULT '1',
  `main` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_images`
--

INSERT INTO `tbl_images` (`id`, `gig_id`, `name`, `updated_at`, `status`, `main`) VALUES
(1, 1, 'f1990ed9_write-seo-friendly-content.png', '0000-00-00 00:00:00', 1, 0),
(2, 1, '6102ba2c_csc_templat.jpg', '0000-00-00 00:00:00', 1, 0),
(14, 11, '15877889_website.jpeg', '0000-00-00 00:00:00', 1, 0),
(93, 221, 'f58b75d1_7e5cc01a_dgdg.jpg', '0000-00-00 00:00:00', 1, 0),
(94, 222, '07d8ab54_download (4).jpg', '0000-00-00 00:00:00', 1, 0),
(98, 226, '54f373b1_gig-img3.png', '2020-09-15 09:07:22', 1, 0),
(100, 228, '6969a797_images (2).jpg', '0000-00-00 00:00:00', 1, 0),
(101, 228, '8b37cc47_images (3).jpg', '0000-00-00 00:00:00', 1, 0),
(102, 229, 'd17151be_gig-img5.png', '2020-09-15 09:18:46', 1, 0),
(103, 230, '607d7a15_images (1).jpg', '0000-00-00 00:00:00', 1, 0),
(106, 232, 'c020b1ad_gig-img4.png', '2020-09-15 09:14:30', 1, 0),
(107, 232, 'd4501bbe_download (13).jpg', '0000-00-00 00:00:00', 1, 0),
(108, 233, '7529f0a3_download (5).jpg', '0000-00-00 00:00:00', 1, 0),
(109, 233, 'b9e05ded_download (6).jpg', '0000-00-00 00:00:00', 1, 0),
(114, 236, '68af61f9_images (4).jpg', '0000-00-00 00:00:00', 1, 0),
(115, 237, '7f9cf3ca_images (3).jpg', '0000-00-00 00:00:00', 1, 0),
(116, 238, '195f70c7_download (4).png', '0000-00-00 00:00:00', 1, 0),
(117, 244, '88892383_pexels-photo-4348403.jpeg', '0000-00-00 00:00:00', 1, 0),
(118, 245, '64b091f8_pexels-photo-4348403.jpeg', '0000-00-00 00:00:00', 1, 0),
(119, 246, '5a2328b7_pexels-photo-4210784.jpeg', '0000-00-00 00:00:00', 1, 0),
(120, 227, 'fc9ec5d4_gig-img.png', '0000-00-00 00:00:00', 1, 0),
(121, 248, 'd005a765_pexels-photo-267350.jpeg', '0000-00-00 00:00:00', 1, 0),
(122, 249, 'd005a765_pexels-photo-267350.jpeg', '0000-00-00 00:00:00', 1, 0),
(123, 250, '686439f3_pexels-photo-771742.jpeg', '0000-00-00 00:00:00', 1, 0),
(124, 251, '686439f3_pexels-photo-771742.jpeg', '0000-00-00 00:00:00', 1, 0),
(125, 253, '7529f0a3_download (5).jpg', '0000-00-00 00:00:00', 1, 0),
(126, 253, 'b9e05ded_download (6).jpg', '0000-00-00 00:00:00', 1, 0),
(127, 257, 'd005a765_pexels-photo-267350.jpeg', '0000-00-00 00:00:00', 1, 0),
(128, 262, '2dc33d7d__myShoes.jpg', '0000-00-00 00:00:00', 1, 0),
(129, 268, '25e17496_laravel.jpeg', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_messages`
--

CREATE TABLE `tbl_messages` (
  `id` int NOT NULL,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `message` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `time` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_messages`
--

INSERT INTO `tbl_messages` (`id`, `sender_id`, `receiver_id`, `message`, `attachment`, `status`, `created_at`, `updated_at`, `slug`, `time`) VALUES
(6, 4, 3, 'hiii', '', 0, '2019-02-05 04:07:19', '2019-02-05 04:07:19', '43154935943948', 1549359439),
(7, 4, 3, 'hiii', '', 0, '2019-02-05 04:12:47', '2019-02-05 04:12:47', '43154935976757', 1549359767),
(8, 4, 3, 'hi', '', 0, '2019-02-05 04:12:56', '2019-02-05 04:12:56', '43154935977664', 1549359776),
(9, 4, 3, 'hii', '', 0, '2019-02-05 04:13:06', '2019-02-05 04:13:06', '43154935978640', 1549359786),
(12, 4, 3, 'good job', '', 0, '2019-02-05 04:15:34', '2019-02-05 04:15:34', '43154935993488', 1549359934),
(13, 3, 4, 'hi', '', 0, '2019-07-02 03:16:37', '2019-07-02 03:16:38', '34156205719763', 1562057197),
(29, 4, 3, 'Hello , can you help me', NULL, NULL, '2019-11-10 08:58:53', '2019-11-10 08:58:53', '4-e451b3536b9f', NULL),
(30, 3, 4, 'yes how i can help u ?', '', 0, '2019-11-10 08:59:34', '2019-11-10 08:59:34', '34157337637414', 1573376374),
(33, 4, 3, 'yes', '', 0, '2019-11-10 09:03:59', '2019-11-10 09:03:59', '43157337663947', 1573376639),
(39, 3, 4, 'Cool.', '', 0, '2019-11-19 19:47:13', '2019-11-19 19:47:13', '34157419283335', 1574192833),
(51, 3, 4, 'hi', '', 0, '2020-03-09 20:22:20', '2020-03-09 20:22:20', '34158378534072', 1583785340),
(55, 3, 3, 'Hello, \r\nAre you available to do this task? \r\nWaiting to hear from you.\r\nThanks', NULL, NULL, '2020-03-31 06:16:53', '2020-03-31 06:16:53', '3-e67cd799656e', NULL),
(56, 3, 3, 'hey', '', 0, '2020-04-01 02:39:20', '2020-04-01 02:39:20', '33158570876031', 1585708760),
(57, 3, 4, 'who\'s this', '', 0, '2020-04-01 02:39:43', '2020-04-01 02:39:43', '34158570878374', 1585708783),
(58, 3, 3, 'who\'s this', '', 0, '2020-04-01 02:40:04', '2020-04-01 02:40:04', '33158570880489', 1585708804),
(59, 3, 3, 'hello..', '', 0, '2020-04-01 02:40:15', '2020-04-01 02:40:15', '33158570881538', 1585708815),
(66, 3, 4, 'hello', '0b38f58d_Ketchup.png', NULL, '2020-04-27 02:11:44', '2020-04-27 02:11:44', '3-9c2b8b596f83', NULL),
(67, 4, 3, 'how', '', 0, '2020-04-27 02:12:15', '2020-04-27 02:12:15', '43158795353528', 1587953535),
(68, 3, 4, 'merci', '', 0, '2020-04-27 02:12:44', '2020-04-27 02:12:44', '34158795356434', 1587953564),
(81, 3, 4, 'thanks', '', 0, '2020-05-21 17:37:22', '2020-05-21 17:37:22', '34159008264246', 1590082642),
(84, 3, 4, 'kk', '', 0, '2020-05-25 15:09:39', '2020-05-25 15:09:39', '34159041937987', 1590419379),
(85, 4, 3, 'hi', '', 0, '2020-05-27 09:04:54', '2020-05-27 09:04:54', '43159057029411', 1590570294),
(87, 3, 4, 'hi', '', 0, '2020-06-07 11:26:05', '2020-06-07 11:26:05', '34159152916548', 1591529165),
(88, 3, 4, 'hi', NULL, NULL, '2020-06-17 11:41:29', '2020-06-17 11:41:29', '3-f7726530198c', NULL),
(92, 3, 4, 'hi', NULL, NULL, '2020-07-05 07:32:02', '2020-07-05 07:32:02', '3-ba2e4dd1ed72', NULL),
(94, 4, 3, 'Make payment to my account ASAP?', '', 0, '2020-07-09 20:18:36', '2020-07-09 20:18:36', '43159432591627', 1594325916),
(95, 3, 4, 'Hi', '', 0, '2020-07-18 22:20:28', '2020-07-18 22:20:28', '34159511082872', 1595110828),
(96, 3, 4, 'hello', '', 0, '2020-09-17 06:42:19', '2020-09-17 06:42:19', '34160032493987', 1600324939),
(97, 3, 4, 'hello i am waltond', '', 0, '2020-09-17 12:31:48', '2020-09-17 12:31:48', '34160034590861', 1600345908),
(101, 4, 3, 'Hello waltond', '', 0, '2020-09-19 04:52:09', '2020-09-19 04:52:09', '43160049112920', 1600491129),
(102, 4, 3, 'I need some vocabulary of spanish language', '', 0, '2020-09-19 04:52:59', '2020-09-19 04:52:59', '43160049117964', 1600491179),
(103, 4, 3, 'hello i need some setups', '', 0, '2020-09-20 18:40:40', '2020-09-20 18:40:40', '43160062724080', 1600627240),
(105, 4, 3, 'hello\r\nI have a question for you', NULL, NULL, '2020-10-17 19:37:40', '2020-10-17 19:37:40', '4-845c91e72bbb', NULL),
(106, 4, 3, 'I need a project smm', NULL, NULL, '2020-10-21 06:54:59', '2020-10-21 06:54:59', '4-6c6bb59a7f0b', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_myorders`
--

CREATE TABLE `tbl_myorders` (
  `id` int NOT NULL,
  `gig_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `buyer_id` int DEFAULT NULL,
  `seller_id` int DEFAULT NULL,
  `package` varchar(20) DEFAULT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `extra_ids` varchar(255) DEFAULT NULL,
  `extra_amount` float(12,2) DEFAULT NULL,
  `total_amount` float(12,2) DEFAULT NULL,
  `revenue` float(12,2) DEFAULT NULL,
  `admin_amount` float(12,2) DEFAULT NULL,
  `admin_commission` float(12,2) DEFAULT NULL,
  `quantity` int DEFAULT NULL,
  `pay_type` varchar(20) DEFAULT NULL,
  `paypal_trn_id` varchar(50) DEFAULT NULL,
  `wallet_trn_id` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `status` int NOT NULL,
  `is_seller_rate` int DEFAULT '0',
  `is_buyer_rate` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_myorders`
--

INSERT INTO `tbl_myorders` (`id`, `gig_id`, `service_id`, `buyer_id`, `seller_id`, `package`, `amount`, `extra_ids`, `extra_amount`, `total_amount`, `revenue`, `admin_amount`, `admin_commission`, `quantity`, `pay_type`, `paypal_trn_id`, `wallet_trn_id`, `created_at`, `updated_at`, `slug`, `status`, `is_seller_rate`, `is_buyer_rate`) VALUES
(25, 11, NULL, 3, 4, 'basic', 10.00, NULL, 0.00, 12.00, 10.00, 2.00, 0.00, 1, 'Wallet', NULL, '31DB61B3D651E3C1', '2019-10-16 16:56:11', '2022-08-16 13:10:46', 'aa9d3950c6a7d325024275cc6596dbf24960fe23', 2, 0, 0),
(57, 229, NULL, 4, 3, 'basic', 15.00, NULL, 0.00, 16.50, 15.00, 1.50, 13.20, 1, 'PayPal', '7VN069142J661341R', NULL, '2020-09-03 12:55:54', '2022-08-16 13:10:23', '0080a14e85382820c7e6ba5c5705706558bd4198', 2, 0, 0),
(59, 226, NULL, 4, 3, 'basic', 15.00, NULL, 0.00, 16.50, 15.00, 1.50, 13.20, 1, 'PayPal', '5TK558810W8182348', NULL, '2020-09-17 13:24:00', '2020-10-26 12:02:51', '7f5c25537093948279b3bbaccecfd11a86c413fc', 2, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_notifications`
--

CREATE TABLE `tbl_notifications` (
  `id` bigint NOT NULL,
  `from_name` varchar(60) NOT NULL,
  `user_id` int DEFAULT NULL,
  `message` varchar(255) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pages`
--

CREATE TABLE `tbl_pages` (
  `id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `slug` varchar(255) COLLATE latin1_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `tbl_pages`
--

INSERT INTO `tbl_pages` (`id`, `title`, `description`, `slug`, `updated_at`) VALUES
(1, 'Terms of Use', '<p>These Website Terms of Use (&ldquo;Terms of Use&rdquo;) are applicable to the websites of Egreea and all affiliates and subsidiaries. In addition to the Websites, these Terms of Use are also applicable to all tools, documents, applications (including mobile applications), and other services, including the services offered under. Please read this document carefully as it is a legally binding agreement between you and your heirs and representatives (collectively, &ldquo;you&rdquo; or &ldquo;your&rdquo;), and Egreea (together with any Egreea affiliates and subsidiaries, &ldquo;we,&rdquo; &ldquo;our,&rdquo; or &ldquo;us,&rdquo; or the &ldquo;Company&rdquo;).</p>\r\n\r\n<p><strong>1. ACCEPTING THESE TERMS OF USE AND CHANGES TO THESE TERMS OF USE</strong><br />\r\nBy accessing or using the Services, you are agreeing to these Terms of Use and entering into a legally binding agreement with us. If you do not agree to these Terms of Use, including the binding arbitration clause and class action waiver contained in Section 14 below, you may not use the Services or create an account (&ldquo;Egreea Account&rdquo;).</p>\r\n\r\n<p>As our business grows and improves, we may from time to time change these Terms of Use and will post a revised copy on this page. We encourage you to check regularly for any updates. If we make any material changes to these Terms of Use, we will notify you via email or on the Services as appropriate. Otherwise, your continued use of the Services following such changes will constitute your acceptance of the new Terms of Use.</p>\r\n\r\n<p><strong>2. ELIGIBILITY AND REGISTRATION</strong><br />\r\nYou must be at least 18 years old or, if in your jurisdiction the age of majority is above 18 years old, you must be above the age of majority in your jurisdiction, to use the Services. If you may choose to create a Egreea Account, you must provide certain information, including a valid email address and a password and a photo identification. If you want to participate in any marketing or transaction event through the Services, you will have to register with us. You agree to only provide information that is accurate and truthful, and to keep it accurate and updated. It is your responsibility to maintain the confidentiality and security of your account information, and to notify us immediately if you learn of any unauthorized use of your account or information. You may not share your password with unaffiliated third parties. You are fully responsible for all uses of your password, Egreea Account and username, or registration, whether by you or others. We are authorized to act on instructions received through use of your Ten-X Account or registration, and are not liable for any loss or damage arising from your failure to comply with this Section. Your registration and Community participation are subject to our review and approval and we reserve the right not to approve, or withdraw our approval of, your registration or Community participation for any reason or no reason.</p>\r\n\r\n<p>By providing your information, you consent to us contacting you about your interest in us or the Services by email, phone, or through any other contact information you have chosen to provide. You may opt out of marketing by following the instructions in our Privacy Statement.</p>\r\n\r\n<p><strong>3. INTELLECTUAL PROPERTY</strong><br />\r\nAll parts of the Services, including the selection, compilation, arrangement, and presentation of all materials and the Websites, tools, documents and applications, are copyrighted by us or our licensors and content suppliers, and are protected by Australian and international laws. You agree to abide by all applicable copyright laws, as well as copyright notices or restrictions posted on the Services, and you acknowledge that use of any content of the Services without our express prior written permission is strictly prohibited.</p>\r\n\r\n<p>You may not use any of our trademarks, trade names, service marks, copyrights, or logos in any manner which creates the impression that such items belong to or are associated with you, unless you have our written consent, and you acknowledge that you have no ownership rights in or to any of such items.</p>\r\n\r\n<p>You may not frame the Websites. You may link to the Websites, provided that you acknowledge and agree that you will not link the Websites to any website containing any inappropriate, profane, defamatory, infringing, obscene, indecent, or unlawful topic, name, material, or information or that violates any intellectual property, proprietary, privacy, or publicity rights.</p>\r\n\r\n<p><strong>4. YOUR LICENSE TO USE THE SERVICES</strong><br />\r\nThe Services are owned exclusively by us. However, we grant you a limited, non-exclusive, non-transferable license to access and use the Services only as expressly permitted in these Terms of Use. You will not use, copy, adapt, modify, prepare derivative works based upon, distribute, license, sell, transfer, publicly display, publicly perform, transmit, broadcast or otherwise exploit the Services, except as expressly permitted in these Terms of Use. Any violation by you of these license provisions may result in the immediate termination of your right to use the Services. We reserve all right, title and interest not expressly granted under this license to the fullest extent possible under applicable laws.</p>\r\n\r\n<p><strong>5. SERVICE RULES</strong><br />\r\nThere are a number of rules you must follow to use the Services. You agree not to use the Services in any way that:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>Violates these Terms of Use;</p>\r\n	</li>\r\n	<li>\r\n	<p>Allows you to scrape, monitor, or copy any part of the Services in an automated way, using any robot, scraper, or other method of access other than manually accessing the publicly-available portions of the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Violates the restrictions in any robot exclusion headers of the Services, or bypasses or circumvents other measures to prevent or limit access to the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Creates any derivative works from the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Competes with our business or impacts our revenue;</p>\r\n	</li>\r\n	<li>\r\n	<p>Impairs our computer systems or transmits software viruses, worms, or other harmful files;</p>\r\n	</li>\r\n	<li>\r\n	<p>Interferes with any other party&rsquo;s use and enjoyment of the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Attempts to gain unauthorized access to the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Uses any part of the Services in unsolicited mailings or spam material;</p>\r\n	</li>\r\n	<li>\r\n	<p>Violates any third party&rsquo;s rights, including copyright, trademark, privacy rights, or any other intellectual property or proprietary rights;</p>\r\n	</li>\r\n	<li>\r\n	<p>Threatens, stalks, harms, or harasses others, misleads or deceives others, promotes bigotry or discrimination, defames others, or is otherwise objectionable; solicits personal information, promotes illegal substances, or submits or transmits pornography; or</p>\r\n	</li>\r\n	<li>\r\n	<p>Violates any laws.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>6. YOUR CONTENT AND SUBMISSIONS</strong><br />\r\nYou are solely responsible for all content that you post, publish, transmit, upload, distribute or otherwise make available or submit to or through the Services, including without limitation to or through the Community (collectively, &ldquo;Submissions&rdquo;). Your Submissions may be identified by your actual name and/or your username, and may be linked to your Egreea Account and Community profile. You acknowledge that once published, you cannot withdraw such Submissions. Unless we indicate otherwise, you grant us, our subsidiaries, and affiliates a nonexclusive, transferrable, royalty-free, perpetual, irrevocable, and fully sub licensable right to use, reproduce, modify, adapt, publish, translate, create derivative works from, distribute, copy, and display any Submissions throughout the world in any form.</p>\r\n\r\n<p>You represent and warrant that you own or otherwise control all of the rights to your Submissions and that your Submissions will not violate these Terms of Use or cause injury to any other person or entity. We take no responsibility and assume no liability for any material, content, opinion, recommendation, or advice provided by you in your Submissions or by any third party. We have no obligation to post any of your Submissions, and reserve the right to post our own versions of that content (including, but not limited to, photos of properties or property descriptions) instead of yours in our sole discretion.</p>\r\n\r\n<p>You assign us the right to pursue enforcement of copyright and other intellectual property claims against third parties that have, without authorization, and in violation of these Terms of Use, scraped, copied, or distributed content from your Submissions and for which you have not granted such third parties a separate license to use.</p>\r\n\r\n<p>Please review our Privacy Statement prior to making any Submissions. If you do not agree with our Privacy Statement, you may not make any Submissions.</p>\r\n\r\n<p>In addition to complying with the rules specified in these Terms of Use, you agree to comply with the following rules when participating in the Community and/or making any Submissions. This list is not meant to be exhaustive, and we reserve the right to determine what types of conduct we consider to be inappropriate use of the Services. In the case of inappropriate use, we may take such measures as we determine appropriate, in our sole discretion. By way of example, and not as limitation, you agree to abide by the following rules when participating in the Community and/or making any Submissions:</p>\r\n\r\n<ul>\r\n	<li>\r\n	<p>You will remain polite and civil to other users, even if you disagree with content that you come across through your use of the Services;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not be off topic or contain promotions of or solicitations for other products, services or fundraising activities;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not infringe or violate our rights or the rights of a third party;</p>\r\n	</li>\r\n	<li>\r\n	<p>You will not impersonate anyone else, misrepresent your identity or affiliation, or make Submissions from fake or anonymous profiles;</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that we are not liable for Submissions made by you or others;</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that we have the right to remove or edit any content and any Submissions in our sole discretion;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not consist of any inappropriate content, including without limitation personal attacks, offensive remarks, obscenities or any language that we consider foul, vulgar or fraudulent;</p>\r\n	</li>\r\n	<li>\r\n	<p>Your Submissions will not contain images of any person, unless you have received their permission, or the permission of their parent or guardian if the person is under the age of 18 or unable to provide consent for any reason;</p>\r\n	</li>\r\n	<li>\r\n	<p>You will not share viruses or files that have the capability of causing damage to another&rsquo;s computer;</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that we have the right to delete, modify or remove any Submissions, at any time in our sole discretion and that you are solely responsible to backup any such content; and</p>\r\n	</li>\r\n	<li>\r\n	<p>You agree that when you use the Services you do so at your own risk and that you understand that Submissions that you see may not be accurate. While we may monitor Submissions, we are under no obligation to do so.</p>\r\n	</li>\r\n</ul>\r\n\r\n<p><strong>7. REPORTING COPYRIGHT INFRINGEMENT</strong><br />\r\nWe have adopted and implemented a policy that provides for the termination in appropriate circumstances of subscribers and account holders of our Services who are copyright infringers. If you believe your copyright or the copyright of a person on whose behalf you are authorized to act has been infringed, you may provide us with a written Notice of Alleged Infringement (&ldquo;Notice&rdquo;). You must do all of the following in your written Notice for it to be valid:</p>\r\n\r\n<p>A. Identify the copyrighted work that you claim has been infringed, or &ndash; if multiple copyrighted works are covered by this Notice &ndash; you may provide a representative list of the copyrighted works that you claim have been infringed.</p>\r\n\r\n<p>B. Identify the material that you claim is infringing (or to be the subject of infringing activity) and that is to be removed or access to which is to be disabled, and information reasonably sufficient to permit us to locate the material, including (if the Content is on our website) the URL of the link shown on the website where such material may be found.</p>\r\n\r\n<p>C. Include your mailing address, telephone number, and, if available, email address.</p>\r\n\r\n<p>D. Include both of the following statements in the body of the Notice (if these statements are untrue, you cannot submit the Notice):</p>\r\n\r\n<p>&ldquo;I have a good faith belief that the disputed use of the copyrighted material is not authorized by the copyright owner, its agent, or the law (e.g., as a fair use).&rdquo;</p>\r\n\r\n<p>&ldquo;The information in this Notice is accurate and, under penalty of perjury, I affirm that I am the owner, or authorized to act on behalf of the owner, of the copyright or of an exclusive right under the copyright that is allegedly infringed.&rdquo;</p>\r\n\r\n<p>E. Provide your full legal name and your electronic or physical signature.</p>\r\n\r\n<p>Deliver this Notice, with all items completed, to Company&rsquo;s Copyright Agent:</p>\r\n\r\n<p><strong>8. DISCLAIMER OF WARRANTIES</strong><br />\r\nYou agree that your use of the services is at your sole risk and acknowledge that all information contained in the services is provided &ldquo;as is&rdquo; and &ldquo;as available,&rdquo; and that we disclaim all warranties, either express or implied, as to the services, including, but not limited to, implied warranties of merchantability, fitness for a particular purpose, title and non-infringement. We make no representations or guarantees that the Services are compatible with your equipment or that the Services, or that any electronic communications sent by us or our affiliates, are error-free or will be free from loss, destruction, damage, interruption, corruption, attack, viruses, worms, or other harmful, invasive, or corrupted files, interference, hacking, or other security intrusion, and we disclaim any liability relating thereto. You agree that we have the right to change the content or technical specifications of any aspect of the Services at any time in our sole discretion. You further agree that such changes may result in you being unable to access the Services.</p>\r\n\r\n<p>We make no guarantees, representations, or warranties that the Services or information available through the Services, or that the use of or result of the use of the Services, will be accurate, reliable, complete, current, uninterrupted, or without errors. Any documents, pictures, or other information available on the Services are for informational purposes only, and may not represent the current condition of a property or the condition of the property at the time of sale. The posting of pictures on the Services does not constitute a guarantee that any items represented in the pictures will be present when a buyer takes possession of a property. You are encouraged to conduct your own due diligence and investigate all matters relating to any properties. It is recommended that you seek independent advice, including legal advice, to perform your due diligence and that you use good faith efforts in determining that the content of all information provided to or obtained by you is accurate.</p>\r\n\r\n<p>You understand and acknowledge that the information provided through the Services is subject to change. You should check back frequently for updated information as to the properties and/or mortgage notes available, marketing or transaction events, times and locations, relevant terms, and other matters which may be made available by us or our clients.</p>\r\n\r\n<p>Some of the available content, services, and information may include materials that belong to or that are submitted by third parties. You acknowledge that we assume no responsibility for such content, services, or information. The content of other websites, services, goods, or advertisements that may be linked to or from the Services is not maintained or controlled by us. We do not: (i) make any warranty, express or implied, with respect to the use of the links provided on, or to, the Services; (ii) guarantee the accuracy, completeness, usefulness or adequacy of any other websites, services, or goods, that may be linked to or from the Services; or (iii) make any endorsement of any other websites, services, or goods that may be linked to or from the Services.</p>\r\n\r\n<p>You understand and acknowledge that you are capable of evaluating the merits and risks of purchasing or selling a property using the Services, and are able to bear any such risks. You also acknowledge that you have consulted with, had the opportunity to consult with, or waive the right to consult with, legal and tax professionals relating to the legal and tax consequences of any documents used in connection with the Services.</p>\r\n\r\n<p><strong>9. LIMITATIONS OF LIABILITY</strong><br />\r\nUnder no circumstances, including but not limited to negligence, shall we, our subsidiaries, or affiliates be liable to you or any third party for direct, indirect, incidental, consequential, special, punitive, or exemplary damages, arising from use of or inability to use the services, including those caused by any failure of performance, error, omission, interruption, defect, delay in operation of transmission, computer virus, or line failure in connection with your use of the services, even if we have been advised of the possibility of such damages. applicable law may not allow the limitation or exclusion of liability or incidental or consequential damages, so the above exclusions and limitations may or may not apply to you.</p>\r\n\r\n<p><strong>10. INDEMNITY</strong><br />\r\nYou agree to indemnify, defend, and hold us, our subsidiaries, and affiliates harmless, including costs, liabilities and legal fees, from any claim or demand made by any third party arising out of or relating to: (i) your access to or use of the Services; (ii) your violation of any third party right, including without limitation any copyright, property, or privacy right; (iii) the content of your Submissions; or (iv) your breach of these Terms of Use. We reserve the right, at your expense, to assume the exclusive defence and control of any matter subject to indemnification by you, and you agree to cooperate in such defence. You agree not to settle any matter in which you have indemnity obligations without our prior written consent. We will use reasonable efforts to notify you of any such claim, action or proceeding upon becoming aware of it.</p>\r\n\r\n<p><strong>11. PRIVACY STATEMENT</strong><br />\r\nOur use of your information is governed at all times by our Privacy Statement. Our Privacy Statement explains our practices relating to the collection and use of your information in connection with the Services, and is incorporated into these Terms of Use. By using the Services, you consent to the collection and use of your information as set forth in the Privacy Statement.</p>\r\n\r\n<p><strong>12. TERMINATION OR STOPPING USE OF THE SERVICES</strong><br />\r\nYou can stop using the Services at any time and for any reason.</p>\r\n\r\n<p>Without prior notice, we may revoke your registration, suspend your ability to use certain parts of the Services, and/or terminate your access to the Services at any time in our discretion. We may also modify, suspend, or discontinue the Services.<br />\r\nIf you breach or threaten to breach any provision of these Terms of Use, in addition to terminating your right to use the Services, we shall be entitled to seek injunctive relief to enforce the provisions hereof, but nothing herein shall preclude us from pursuing any action or other remedy for breach or threatened breach of these Terms of Use. If we prevail in such action, we shall be entitled to recover from you all reasonable costs, expenses, and attorneys&rsquo; fees incurred in connection therewith.<br />\r\nIn order to protect the Services, we reserve the right at any time to block users from certain IP addresses from accessing and using the Services. We may also request that you stop accessing or permanently destroy certain content or information available through the Services.</p>\r\n\r\n<p><strong>13. Transaction and Negotiations</strong><br />\r\nServices offered by Egreea are exclusively to facilitate a real estate transaction between vendors (sellers) and purchasers (buyers). Egreea holds no liability to negotiating on behalf of the vendor or the purchaser in the process of title transfer between the parties, which holds no accountability for Egreea on achieving a desired price point for the parties involved in the transaction. Parties may seek third party advisors to assist in conducting the transaction process, however Egreea outlines the process and provides the platform for transactions to occur but does not participate in communication, negotiation or persuasion of any kind to produce a price outcome for the parties.<br />\r\n<br />\r\n<strong>14. BINDING ARBITRATION AGREEMENT AND CLASS ACTION WAIVER</strong><br />\r\nPlease read this section carefully &ndash; it may significantly affect your legal rights, including your right to file a lawsuit in court and to have a jury hear your claims.</p>\r\n\r\n<p>By using the Services, you irrevocably agree: (i) to waive all rights to trial in a court before a judge or jury on any claim, action or dispute with us or relating in any way to your use of the Services or the interpretation, applicability, enforceability or formation of these Terms of Use including, but not limited to, any claim that all or any part of this agreement is void or voidable (&ldquo;Claims&rdquo;); (ii) that all Claims will be determined exclusively by final and binding arbitration in Orange County, California before one arbitrator; and (iii) that the arbitrator will not have the authority to consolidate the Claims of other users of the Services (&ldquo;Users&rdquo;) and will not have the authority to fashion a proceeding as a class or collective action or to award relief to a group or class of Users in one arbitration proceeding.</p>\r\n\r\n<p>The arbitration shall be administered in by a third party in pursuant to its Comprehensive Arbitration Rules and Procedures (&ldquo;Rules&rdquo;) and in accordance with the Expedited Procedures in those Rules. Notwithstanding these Rules, however, such proceeding shall be governed by the laws of the State of California. All parties shall maintain the confidential nature of the arbitration proceeding and the award, including the hearing, except as may be necessary to prepare for or conduct the arbitration hearing on the merits, or except as may be necessary in connection with a court application for a preliminary remedy, a judicial challenge to an award or its enforcement, or unless otherwise required by law or judicial decision.</p>\r\n\r\n<p>The arbitrator, and not any federal, state, or local court or agency, shall have exclusive authority to resolve any Claims. However, nothing in this section shall prevent us from enforcing our intellectual property rights and/or remedy unfair competition, misappropriation of trade secrets, unauthorized access, fraud or computer fraud, and/or industrial espionage in court.</p>\r\n\r\n<p>Judgment on any arbitration award may be entered in any court having jurisdiction. The prevailing party shall be entitled to an award of costs and lawyer fees reasonably incurred (a) in connection with any arbitration arising out of or related to these Terms of Use, or (b) to enforce the terms of these Terms of Use to arbitrate. If a party is deemed to be a prevailing party under circumstances where the prevailing party won on some but not all of the claims and counterclaims, the prevailing party may be awarded an appropriate percentage of the costs and attorneys&rsquo; fees reasonably incurred in connection with the arbitration or action.</p>\r\n\r\n<p><strong>15. SERVICES AUDITING AND MONITORING</strong><br />\r\nWe reserve the right to audit and monitor (manually or through automated means) the use of the Services to ensure compliance with these Terms of Use and to maintain and improve the provision of the Services. We also may, but are not required to, monitor the content on the Services using manual review or technical measures to screen, block, filter, edit or remove content. We may terminate or suspend users&rsquo; of Egreea or delete, edit or remove content that we, in our sole discretion, deem illegal, offensive, abusive, in violation of these Terms of Use or our other policies, or otherwise inappropriate or unacceptable. All enforcement determinations are made in our sole discretion, and we will not incur any liability or responsibility if we choose to remove or delete any content.</p>\r\n\r\n<p>You acknowledge, consent, and agree that we may access, preserve, and disclose information about your use of the Services, including your communications and content you submit, if required to do so by law or in a good faith believe that such access, preservation, or disclosure is reasonably necessary to: (i) comply with legal process; (ii) enforce these Terms of Use; (iii) respond to claims that any content you submit violates the rights of third parties; (iv) respond to your requests for customer service; or (v) protect the rights, property or personal safety of us, our users and the public.</p>\r\n\r\n<p><strong>16. SUBMITTING A BID OR OFFER </strong><br />\r\nRegistered buyers (&ldquo;purchasers&rdquo;) using Egreea to conduct negotiations with the seller (&ldquo;vendor&rdquo;), are obligated to fulfil their contractual duties of their states jurisdiction in purchasing a property estate. These obligations and requirements to be performed are outlined in the &lsquo;property listing&rsquo;s&rsquo; relevant forms for the buyer to populate before or after submitting an offer to the seller. It is the buyer&rsquo;s duty to complete these documents for their offer or bidding submission, however can indicate to the seller their interested price without first populating these documents, but by consenting with the submissions &lsquo;I agree&rsquo; terms and conditions of fulfilling their obligations to populate the forms at the later date when their offer is accepted. The buyer will be held binding to their offer submission with or without the relevant forms filled out and held responsible for carrying through with their obligations in continuance of the real estate process thereafter mutual consent to proceed from both the buyer and seller. By using Egreea as a buyer, you agree that you will fulfil your contractual obligations following the purchase of property thereafter your legally binding offer has or has not been accepted.</p>\r\n\r\n<p><strong>17. GENERAL TERMS</strong><br />\r\nA. Force Majeure. No party shall be liable to the other for any default resulting from force majeure, which includes any circumstances beyond the reasonable control of the parties.</p>\r\n\r\n<p>B. Notices and Electronic Communications. We may provide you with notices, including those regarding changes to these Terms of Use by email, regular mail, telephone or communications though the Services. When you use the Services, you consent to receive communications from us electronically and through each of the foregoing methods. By engaging in any telephone conversation with our agents or employees, you consent to our recording such telephone call. You agree that all notices, disclosures, and other communications that we provide to you electronically satisfy any legal requirement that such communications be in writing. You agree that you have the ability to store electronic communications such that they remain accessible to you in an unchanged form.</p>\r\n\r\n<p>C. Compliance with Applicable Laws: The Services are controlled within Australia and directed to individuals residing in the Australia. We do not represent that the materials in the Services are appropriate or available for use in any particular location. Those who choose to access the Services do so on their own initiative and are responsible for compliance with all applicable laws in their own jurisdiction. We reserve the right to limit the availability of the Services to any person, geographic area or jurisdiction at any time in our sole discretion.</p>\r\n\r\n<p>D. Miscellaneous. You acknowledge that these Terms of Use, any other policies or terms incorporated herein, either in their entirety or by explicit reference, and any other terms and conditions on the Services, constitute the entire agreement between you and us and govern your use of the Services. Australian law governs use of the Services and will be applied in any legal action or arbitration involving use of the Services. If any provision of these Terms of Use is found invalid or unenforceable, that provision will be enforced to the maximum extent permissible by law, and the other provisions of these Terms of Use will remain in force. Our failure to exercise or enforce any right or provision of these Terms of Use shall not constitute a waiver of such right or provision unless acknowledged and agreed by us in writing. You may not assign these Terms of Use or the rights hereunder without our prior written consent. We may assign these Terms of Use and delegate certain responsibilities, obligations, and duties under or in connection with these Terms of Use in our sole discretion.</p>', 'terms-and-condition', '0000-00-00 00:00:00');
INSERT INTO `tbl_pages` (`id`, `title`, `description`, `slug`, `updated_at`) VALUES
(2, 'Privacy Policy', '<a href=\"javascript:void(0);\" onclick=\"sccc(1);\" style=\"color: #00afaa; width: 100%; float: left; margin-bottom: 3px;\" >1. Scope of Privacy Statement</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(2);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >2. Commitment to Privacy</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(3);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >3. Collection of Your Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(4);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >4. Use of Your Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(5);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >5. Tailored Advertising</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(6);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >6. Do Not Track Signals</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(7);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" > 7. Disclosure of Your Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(8);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >8. Opting Out of Communications from Us</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(9);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >9. Notice of Privacy Rights of California Residents</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(10);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >10. Security and Account Protection</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(11);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >11. Children’s Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(12);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >12. Accessing, Reviewing, and Changing Personal Information</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(13);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >13. Third Party Links and Services</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(14);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >14. Amendments to Privacy Statement</a>\r\n                <a href=\"javascript:void(0);\" onclick=\"sccc(15);\" style=\"color: #00afaa; width: 100%; float: left;  margin-bottom: 3px;\" >15. International Transfers of Information</a>\r\n                <div class=\"clr\"></div>\r\n                \r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step1\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">1. Scope of Privacy Statement</p>\r\n                    This Privacy Statement (“Privacy Statement”) describes how Egreea, and its affiliates and subsidiaries (collectively, “we,” “us,” “our,” or the “Company”) handle your personal information when you (collectively, “you” or “your”) use the Company’s websites (egree.com and egreea.com.au) and any other website where this Privacy Statement is posted), tools, documents and applications (including mobile applications), and other services, including the services offered. By using the Services, you expressly consent to our collection, storage, use and disclosure of your personal information as described in this Privacy Statement.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step2\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">2. Commitment to Privacy</p>\r\n                    The Company has a strong commitment to providing information tailored to your individual needs while providing excellent service to all of our visitors and customers, including respecting concerns about privacy. We understand that you may have questions about whether and how we collect and use information. This Privacy Statement details the steps we take to respect your privacy concerns.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step3\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">3. Collection of Your Information</p>\r\n                    <u style=\"font-weight:600;\" >Personal Information.</u> We do not collect personal information (such as names, addresses, telephone numbers, email addresses, or financial account information) from you when you browse the Services, unless you have specifically and knowingly provided us with personal information, e.g., by creating an account through the Services (“Egreea”), updating your Egreea Account profile, registering for or participating on the website to submit a legally binding offer or a transaction event and completing online forms or questionnaires.  This information may include, without limitation, information such as your first and last name, e-mail address, telephone number, username, password, billing information, and other information exchanged in connection with real estate transactions. We also may acquire personal information from other sources such as offline records, publicly available information, or from third parties. We use this information to provide the Services and as discussed in this Privacy Statement.\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >Automatically-Collected Information.</u> We may automatically collect information about the computer or devices (including mobile devices) you use to access the Services, and your interactions with the Services. For example, we may collect and store information such as your browser type, IP address, language, operating system, location of your wireless device (e.g., latitude and longitude), the state or country from which you accessed the Services, unique device identifier (e.g., a UDID or IDFA on Apple devices like the iPhone, iPad and iTouch), the pages you view, length of time spent on pages, communications with other users through the Services, the Services you use and the manner in which you use such Services (e.g., the content you access, view, click on, search for, post, favourite, vote, follow, share, upload, or tag), the date and time of your visit, the websites you visited immediately before and after visiting our Company websites, error logs, and other hardware and software information, as well as other geographic and demographic information. We may use third party analytics providers and technologies, including cookies and similar tools, to assist in collecting this information. We may use this information to formulate statistical models about use of the Services, enhance the Services for our users, and provide you with information about new opportunities, and tailored content, advertising, marketing and as otherwise discussed in this Privacy Statement. To the extent that such information is maintained in a manner that identifies your name or contact information, it will be treated as personal information; otherwise, such information will be treated as non-personal information.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p>  <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >Our Use of Cookies.</u> The Services use “cookie” technology and similar online tools, such as web beacons and web pixels. “Cookies” are small files that a website stores on a user’s computer or device. The Services use cookies to keep the information you enter on multiple pages together. A majority of cookies we use are “session” cookies, meaning that they are automatically deleted from your hard drive after you close your browser at the end of your session. Session cookies are used to optimize performance of the Services and to limit the amount of redundant data that is downloaded during a single session. We also use “persistent” cookies, which remain on your computer or device unless deleted by you (or by your browser settings). We use persistent cookies for statistical analysis of performance to ensure the ongoing quality of our services. In either case, we do not use cookies to obtain or retain any personal information about you apart from what you voluntarily provide us. Most web browsers automatically accept cookies, but you may set your browser to block cookies (consult the instructions for your particular browser on how to do this). Please note that if you decide to block cookies, this may interfere with your ability to perform certain transactions, use certain functionality, and access certain content on the Services.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >Google Analytics.</u> The Company websites may use Google Analytics, a vendor’s service that uses cookies, web beacons, web pixels and/or similar technology to collect and store anonymous information about you, which may include non-personal information described above. You can read Google Analytics’ privacy policy at http://www.google.com/analytics/learn/privacy.html and Google Analytics Terms of Use at http://www.google.com/analytics/tos.html. You can opt-out from being tracked by Google Analytics in the future by downloading and installing Google Analytics Opt-out Browser Add-on for your current web browser at http://tools.google.com/dlpage/gaoptout?hl=en.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    \r\n                    <u style=\"font-weight:600;\" >User-Initiated Communication.</u> From time to time, portions of the Services, including, without limitation, Services available through the Community, may enable you to send emails and other types of messages to us or to third parties and to participate in bulletin boards and discussion groups. We reserve the right to use reproduce, modify, adapt, publish, translate, create derivative works from, distribute, copy, and display all such emails, messages and discussion groups throughout the world in any form, pursuant to Section 6 of the Terms of Use. Among other things, this right allows us to review your messages with other users to enforce our Terms of Use. Whenever you choose to initiate these kinds of communication with us, or anyone else, you may be contacted in return. Such communications may be identified by your actual name and/or your username, and may be linked to your Community profile. Please use your discretion when deciding whether and what to post and whom to contact and message. We reserve the right, in our sole discretion, to monitor, edit or delete postings from our bulletin boards and discussion groups. This reservation of rights shall not under any circumstances obligate us to conduct such edits or deletions, nor shall it cause us to be liable for any such edits or deletions.\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    The Services may also contain social plugins for other websites, such as Facebook, Twitter, YouTube, LinkedIn and Google+. We recommend reviewing the privacy policies with respect to the social plugins for each of these websites, prior to clicking on such plugins.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step4\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">4. Use of Your Information</p>\r\n                    We will use your information for the purpose for which you provided it, and we may also use your information for a number of purposes such as to:\r\n                    \r\n                    <ul style=\"float:left; width:100%; margin-top:12px; list-style-type:disc; padding-left:15px;\">\r\n                   <li style=\"float:left; width:100%; margin-bottom:10px;\"> Create and maintain your Egreea and account profile, your Community profile, registration information and communication preferences;\r\n                    Enhance the user experience;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\"> Perform research and analytics; </li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Customize and personalize the content and advertising that you see on the Services;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Respond to and fulfil your requests for Services (including qualification to make bids or offers) or other 					                    inquiries;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Determine your eligibility for certain marketing or transaction events, services, gifts, prizes, and special features of the Services;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Call, email or otherwise contact you to facilitate marketing or transaction events for which you are registered;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Call, email or otherwise contact you regarding new opportunities relating to marketing or transaction events or our other Services;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Administer, register or enrol you in, or facilitate your participation in recreational, educational or entertainment activities; surveys or questionnaires; 		   promotions or sweepstakes, or any other services, events or activities sponsored by us or third parties, or offered in connection with our Services;</li>\r\n                  \r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Send you prizes and gifts;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Enforce our Terms of Use;</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Send you information about topics that may be of interest to you; and</li>\r\n                   <li style=\"float:left; width:100%; margin-bottom:8px;\">  Send you communications related to your Ten-X Account and to alert you to the latest developments and features of the Services.</li>\r\n                    </ul>\r\n                    \r\n                    \r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step5\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">5. Tailored Advertising</p>\r\n                   The Services may include third party tailored ad technology which enables customized and targeted ads to be displayed to you through the Services and on third party websites. We do not share personal information with these third parties; however, when you use the Services, we or third parties operating the ad serving technology may use non-personal information that is collected through cookies, anonymous identifiers, such as an IDFA on iOS devices, web beacons, pixels, or clear GIFs to ensure that appropriate ads are presented and to perform analytics concerning your use of the Services and other websites tracked by these third parties. These technologies also may control the number of times you see a given ad, deliver ads that relate to your interests, and measure the effectiveness of ad campaigns. To the extent any of this information is collected by third parties, you acknowledge and agree that such collection and use is governed by those third parties’ privacy policies and we are not responsible for the privacy practices of such third parties.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step6\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">6. Do Not Track Signals</p>\r\n                  We do not respond to or alter our practices detailed herein based upon your selection of the “Do Not Track” setting or other “opt out” setting or feature that may be offered by your browser; however, we reserve the right to do so in the future.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step7\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">7. Disclosure of Your Information</p>\r\n                    We may share your information in the following ways:\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />\r\n                    We may make information collected through the Services available to subsidiaries and affiliated companies that are under common ownership or control within the Company family.\r\n           			<p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />          \r\n                If you download information on assets listed on our Services or make a bid or offer on a particular asset, the seller and its affiliates and representatives are given access to your information.    \r\n                   <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />      \r\n                    \r\n                    We may share information about our visitors, customers, or former customers with the following types of companies that perform services on our behalf or with whom we have joint marketing agreements:\r\n                    \r\n                      <ul style=\"float:left; width:100%; margin-top:12px; list-style-type:disc; padding-left:15px;\">\r\n                   <li style=\"float:left; width:100%; margin-bottom:10px;\"> \r\n                   Non-financial companies such as envelope stuffers, fulfillment service providers, payment processors, data processors, customer/support services, etc.\r\n                    Enhance the user experience;</li>\r\n                    \r\n				<li>Financial service providers such as companies engaged in banking, mortgage lending, consumer finance, securities, and insurance. </li>                    \r\n                  </ul>\r\n                   <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />      \r\n                  We may share or sell, as allowed by law, information about you with other companies who we believe may have products and services of interest to you. If you would like to opt-out of our sharing of your information with these other companies for their direct marketing purposes, please follow our Third Party Opt-Out Policy described in Section 9 below.\r\n                   \r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br />  \r\n                   We may share your information with any person or entity where we believe in good faith that such disclosure is necessary to: (a) comply with the law or in response to a court order, government request, or other legal process; (b) produce relevant documents or information in connection with litigation, arbitration, mediation, adjudication, government or internal investigations, or other legal or administrative proceedings; (c) protect the interests, rights, safety, or property of the Company or others; (d) enforce the Terms of Use on the Services; (e) provide users of the Services with the services they request; (f) provide you with special offers or promotions from us; (g) allow another company that acquires the Company or some or all of its assets to continue to serve you; or (h) operate the Company’s systems properly.\r\n                     <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br /> \r\n                   We may share your information with any person or entity when we have your consent.\r\n                    <p style=\"float:left; width:100%; padding-bottom:15px;\"></p> <br /> \r\n                    We may use and share non-personal information about you or use of the Services, including any de-identified and aggregated data with third parties without limitation.\r\n                    \r\n                    \r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step8\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">8. Opting Out of Communications from Us</p>\r\n                    By creating a Egreea account or registering for or participating in any marketing or transaction event on one of our Company websites, you agree to receive direct mail, email newsletters and other promotional email communications, as well as promotional telephone communications. Similarly, by creating a Community profile you agree to receive email newsletters and other promotional email communications. For example, from time to time we may send you email notices or news updates alerting you to new features, products, promotions, or services pertaining to offerings from us, new opportunities, surveys or our other Services, and, if you have created a Egreea Account or registered for a marketing or transaction on one of our Company websites, we may send you direct mail or call you with respect to same.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step9\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">9. Notice of Privacy Rights of Australian Residents</p>\r\n                    We have adopted a policy of not sharing your personal information with third parties for their direct marketing purposes if you request that we do not do so (“Third Party Opt-Out Policy”). You may make such a request by sending us an email. When contacting us, please indicate your name, address, email address, and what personal information you do not want us to share with third parties for their direct marketing purposes. Please note that there is no charge for controlling the sharing of your personal information or for processing this request.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step10\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">10. Security and Account Protection</p>\r\n                   We have implemented commercially reasonable physical, administrative, technical, and electronic security measures to protect against the loss, misuse, and alteration of your personal information. Despite our best efforts, however, no security measures are perfect or impenetrable. We appreciate your help in safeguarding the integrity of your own and others’ privacy. We encourage you to let us know immediately if you suspect that any personal information you shared with us is being used contrary to this Privacy Statement.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step11\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">11. Children’s Information</p>\r\n                    The Services are not directed toward persons under 18 years of age. We do not knowingly market to or collect any personal information from children under the age of 18. If you are under 18, you are not permitted to submit any personal information to us or the Services. If you provide information to us through the Services, you represent that you are 18 years of age or older. \r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step12\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">12. Accessing, Reviewing, and Changing Personal Information</p>\r\n                   If your personal information changes or is inaccurate, you agree to update your information by updating the account information located in your Egreea Account profile.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step13\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">13. Third Party Links and Services</p>\r\n                    The Services may contain links to third-party websites, including identity verification and social networking websites. Your use of these features may result in the collection or sharing of information about you, depending on the feature. Please be aware that we are not responsible for the content or privacy practices of other websites or services to which we link. We do not endorse or make any representations about third-party websites or services. The personal information you choose to provide to or that is collected by these third parties is not covered by our Privacy Statement. We strongly encourage you to read such third parties’ privacy statements.\r\n                </div>\r\n                <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step14\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">14. Amendments to Privacy Statement</p>\r\n                   We may amend this Privacy Statement at any time by posting the amended terms on the Services. Any changes to this Privacy Statement will become effective upon posting. Your continued use of the Services following these changes means that you accept such revisions. If we make any material changes to this Privacy Statement, we will post the changes here and notify you in the manner and to the extent required by law.\r\n                </div>\r\n                \r\n                 <div style=\"float: left; width: 100%; margin-top:25px;\" id=\"step15\">\r\n                    <p style=\"color:#000; float:left; width:100%; font-size:20px; font-weight:600; padding-bottom:12px;\">15. International Transfers of Information</p>\r\n                   Some of the uses and disclosures mentioned in this Privacy Statement may involve the transfer of your personal information to various countries around the world that may have different levels of privacy protection than your country. By submitting your personal information, you consent to such transfers. By using the Services, or by submitting your personal information to us, you expressly consent to the storage and processing of your personal information in accordance with the laws of Australia, or in the users designated jurisdiction.\r\n                </div>', 'privacy-policy', '0000-00-00 00:00:00'),
(3, 'Thank You', 'Thank You', 'thank-you', '0000-00-00 00:00:00'),
(4, 'Como funciona Don SIRO?', '<p>How It Works</p>', 'how-it-works', '2020-06-04 16:02:38'),
(5, 'FAQ', '<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>', 'faqs', '2020-06-04 16:02:08'),
(6, 'Noticias', '<p ><strong><h5>Do I need to get a customer&rsquo;s permission in order to send them text messages?</h5></strong></p>\r\n\r\n<p class=”ans”>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p class=”ans”>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>', 'press-and-news', '2020-06-04 16:01:27'),
(7, 'Trust & Safety', '<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p><strong>Do I need to get a customer&rsquo;s permission in order to send them text messages?</strong></p>\r\n\r\n<p>Yes, you do need to get a customer&rsquo;s permission to send them text messages.&nbsp; Federal law consent requirements and industry best practices vary based on whether a text message includes a marketing message. As of October 16, 2013, if you plan to send marketing text messages, prior express written (electronic) consent is a requirement. If you will exclusively send account management text messages (e.g., text messages that alert a consumer about an upcoming payment due date or a missed payment), then you only need &ldquo;prior express consent.&rdquo;</p>\r\n\r\n<p>&nbsp;</p>', 'trust-and-safety', '2018-08-20 07:21:15'),
(8, 'About US', '<p><strong>We Believe In Action. Community. Quality.</strong></p>\r\n\r\n<p>Siamo un&rsquo;azienda, ma soprattutto un insieme di persone che hanno in comune una grandissima passione.&nbsp;Ci ispiriamo agli stessi principi cui fanno riferimento le startup di successo: rapidit&agrave;, capacit&agrave; di adattamento e propensione all&#39;ascolto. Sono i nostri pilastri.</p>\r\n\r\n<p>Proponiamo ai nostri clienti soluzioni efficaci e corrette, con la spinta innovativa e le forti competenze che ci contraddistinguono, fin da quando eravamo una realt&agrave; piccola, ma piena di sogni ed entusiasmo.</p>', 'about-us', '2020-10-16 06:29:13');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_payments`
--

CREATE TABLE `tbl_payments` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `gig_id` int DEFAULT NULL,
  `service_id` int DEFAULT NULL,
  `serviceoffer_id` int DEFAULT NULL,
  `amount` float(12,2) DEFAULT NULL,
  `transaction_id` varchar(100) DEFAULT NULL,
  `order_slug` varchar(100) DEFAULT NULL,
  `order_number` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` int NOT NULL,
  `slug` varchar(100) NOT NULL,
  `wallet_id` int DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_payments`
--

INSERT INTO `tbl_payments` (`id`, `user_id`, `gig_id`, `service_id`, `serviceoffer_id`, `amount`, `transaction_id`, `order_slug`, `order_number`, `updated_at`, `status`, `slug`, `wallet_id`) VALUES
(1, 4, 2, NULL, NULL, 16.50, '35G30672BR6415028', '8569c775b5ecda6406553b473734e7386231de7af05e684e1ad5920a09f4', '35G30672BR6415028', '0000-00-00 00:00:00', 1, 'a582103ef077a80e6417f2b61bd849b965013cf5be6506e5140d18e45e92', NULL),
(3, 1, 13, NULL, NULL, 33.00, '86R17702YP212370M', '17d322eb96a035690cab9e2cf488258e7e7d9adb0df8f0d117ceea165085', '86R17702YP212370M', '0000-00-00 00:00:00', 1, 'cc4ecdc847d388c988357ecf3ce062ec26c44e35893212d5e339d68a9cef', NULL),
(4, 4, 12, NULL, NULL, 44.00, '6DS5665110630733E', 'd89a806cc3b247152c6b23e406b9208d6ffbb483e943d057a8836386f7b4', '6DS5665110630733E', '0000-00-00 00:00:00', 1, '9d661edce8768f53a1473c7f9318f9a5f81421f22476e523cb39e8ec5dbe', NULL),
(8, 3, 19, NULL, NULL, 104.50, '1TF22364SM886921L', '414bc3deb9ccad65291cad93a725e1052999a0ad63e9219e0ba24dd4cb40', '1TF22364SM886921L', '0000-00-00 00:00:00', 1, '3c975225a0b7eb9a4b10ba4ccf33e35bba3cadf4b8b59e0e13024323aab2', NULL),
(9, 3, 19, NULL, NULL, 104.50, '8L468151FT8878907', '30ba0b8acc7befa77570629477f60307adcbd4381362782dfe2a8e9a73e8', '8L468151FT8878907', '0000-00-00 00:00:00', 1, '2b31f2caf4aa9eb87ada88371cddbaa18fdc7513a2bd506bfad58e5e8373', NULL),
(11, 4, 16, NULL, NULL, 66.00, '8WE16329NX4983800', 'e750b617581137ab50827fcd0075a003c180f83c559df30dfd580b9d789e', '8WE16329NX4983800', '0000-00-00 00:00:00', 1, 'f92e45bdeedbae37e56d5ec711c204a13483f6fd29bbfc8116fddc810b4d', NULL),
(12, 3, 11, NULL, NULL, 12.00, 'TT456456456', '294fba2789283b2908b4db5f614fad4ab1710d0b44554b5e92819b8a8ba9', 'TT456456456', '0000-00-00 00:00:00', 1, '21c882e1ef9ad2ec08306e594d228f79fb5019f634dc646baa13498a5e40', NULL),
(13, 3, 11, NULL, NULL, 12.00, 'TT456456456', '84274b7135074e924fab94d34477b6c118559a2435cf4798fb0f1d9b2c57', 'TT456456456', '0000-00-00 00:00:00', 1, '6dd81088df2283328134f3959921bae4445b55967f8d9d2fe65390372d16', NULL),
(18, 3, 2, NULL, NULL, 18.00, '97X21722TX772390K', '9ea0b329e39194440f2c5156ff1cb90d8aff3f6edb1069be001158d197eb', '97X21722TX772390K', '0000-00-00 00:00:00', 1, '42604d10071dee5cf93a1ba0843c2547136c2f67129da606dca298d63368', NULL),
(19, 3, 3, NULL, NULL, 12.00, '0GW663381V2240044', 'a65005f40eeaf615fe998d85ed6674b44b71a1c79d5a4b19ea62b7da5fa5', '0GW663381V2240044', '0000-00-00 00:00:00', 1, '45b9c589f4932375c5ee08b33f5d6d47489181cef41939404e9e51985c34', NULL),
(23, 3, 4, NULL, NULL, 1094.50, '1SY17445TL658745T', '3d9ed8ebe6057753a1e8a1df66603fbde4a5b461dd22f571083622c2a8f8', '1SY17445TL658745T', '0000-00-00 00:00:00', 1, 'ba11248c1310d438dfdd5da67460204ac636c1bad8f4ee61754408faa269', NULL),
(26, 3, 3, NULL, NULL, 44.00, '2V956906TP4558608', '83de0e2012f3181d46563d5abc67964fd2012f7ef3ee32d3c864b4b34bd7', '2V956906TP4558608', '0000-00-00 00:00:00', 1, 'bba42ad3547507a9dc594407bb9a39d6ebb9bb4fe3d1f03b746482fa8c28', NULL),
(28, 3, 234, NULL, NULL, 16.50, '30S39144DG084864V', 'b3c5552a0a732f02d2e24632329e2e1aa934696d55c24e5fd0ad5b6f6654', '30S39144DG084864V', '0000-00-00 00:00:00', 1, '2c8e211c072e81bb527b25517e1b842974cd6cbdf3ab56e882eeb4e931d1', NULL),
(29, 3, 234, NULL, NULL, 16.50, '7E177665AV637862B', '75aea5b47850210195869201b08b0730f3cece6cf3cd193746c8355c258c', '7E177665AV637862B', '0000-00-00 00:00:00', 1, 'eb70f4179380f360f916fce9feb39e5da0b0d5a1280b18a81b1c4f1cba9d', NULL),
(32, 4, 226, NULL, NULL, 16.50, '5TK558810W8182348', '0bdbb1a54351339ca6d1a30366fb87e3c7d22d65d32ebff903a32ec6a10d', '5TK558810W8182348', '0000-00-00 00:00:00', 1, '7d99bfcf4ed8a4b60cdfdadea948ec3c308749df35f23d2fbfbcf25e1c79', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pdfs`
--

CREATE TABLE `tbl_pdfs` (
  `id` bigint NOT NULL,
  `gig_id` bigint NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint NOT NULL DEFAULT '1',
  `main` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_pdfs`
--

INSERT INTO `tbl_pdfs` (`id`, `gig_id`, `name`, `updated_at`, `status`, `main`) VALUES
(1, 1, '69b57_Untitled_Document.pdf', '0000-00-00 00:00:00', 1, 0),
(3, 1, '1f380_5bf8b_6b4384722d995c6ebdc55c7af9e45b5e.jpg', '0000-00-00 00:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_qualifications`
--

CREATE TABLE `tbl_qualifications` (
  `id` int NOT NULL,
  `name` varchar(44) DEFAULT NULL,
  `slug` varchar(48) DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_qualifications`
--

INSERT INTO `tbl_qualifications` (`id`, `name`, `slug`, `status`, `updated_at`) VALUES
(1, 'B.E.', 'be', 1, '2020-08-21 07:10:14'),
(2, 'B.A.', 'b.a.', 1, '2020-08-21 07:10:14'),
(3, 'B.Sc.', 'b.sc.', 1, '2020-08-21 07:10:14'),
(4, 'B.Arch.', 'barch', 1, '2020-08-21 07:10:14'),
(5, 'M.A.', 'm.a.', 1, '2020-08-21 07:10:14'),
(6, 'M.Sc.', 'm.sc.', 1, '2020-08-21 07:10:14'),
(7, 'M.D.', 'm.d.', 1, '2020-08-21 07:10:14'),
(8, 'Ph.D', 'ph.d', 1, '2020-08-21 07:10:14'),
(9, 'LLB', 'llb', 1, '2020-08-21 07:10:14'),
(10, 'LLM', 'llm', 1, '2020-08-21 07:10:14'),
(11, 'Police clearance', 'police-clearance', 1, '2020-08-21 07:10:14');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_reviews`
--

CREATE TABLE `tbl_reviews` (
  `id` int NOT NULL,
  `as_a` varchar(10) DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `otheruser_id` int DEFAULT NULL,
  `rating` float(3,1) DEFAULT NULL,
  `comment` text,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(100) DEFAULT NULL,
  `myorder_id` int DEFAULT NULL,
  `servicesoffer_id` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_reviews`
--

INSERT INTO `tbl_reviews` (`id`, `as_a`, `user_id`, `otheruser_id`, `rating`, `comment`, `status`, `created_at`, `updated_at`, `slug`, `myorder_id`, `servicesoffer_id`) VALUES
(1, 'seller', 1, 4, 4.5, 'best performance.....', 1, '2018-09-28 06:12:36', '2018-09-28 06:12:36', '291217af8e59a8190e8c', 1, 0),
(5, 'seller', 3, 4, 4.5, 'Great working with santosh.', 1, '2018-09-28 07:56:56', '2018-09-28 07:56:56', 'f5fb9b9929024275d0d3', 4, 0),
(8, 'seller', 4, 3, 4.5, 'best', 1, '2020-09-04 13:54:48', '2020-09-04 13:54:48', 'e8e6e57ee3515d8cb81a', 56, 0),
(9, 'seller', 4, 3, 4.0, 'best', 1, '2020-09-05 03:58:01', '2020-09-05 03:58:01', '79b7ade6f50ac54d2a16', 55, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_savedgigs`
--

CREATE TABLE `tbl_savedgigs` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `gig_ids` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_savedgigs`
--

INSERT INTO `tbl_savedgigs` (`id`, `user_id`, `gig_ids`, `updated_at`) VALUES
(20, 3, '222,229,226', '2020-09-04 13:25:30'),
(21, 4, '229,227,232,222', '2020-09-15 07:56:57'),
(22, 22, '', '2023-03-02 05:50:15');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicemessages`
--

CREATE TABLE `tbl_servicemessages` (
  `id` int NOT NULL,
  `service_id` int DEFAULT NULL,
  `servicesoffer_id` int DEFAULT NULL,
  `sender_id` int DEFAULT NULL,
  `receiver_id` int DEFAULT NULL,
  `message` text,
  `attachment` varchar(255) DEFAULT NULL,
  `status` int DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `slug` varchar(60) DEFAULT NULL,
  `time` bigint DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_services`
--

CREATE TABLE `tbl_services` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `description` text CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `category_id` int NOT NULL,
  `subcategory_id` int NOT NULL,
  `day` int NOT NULL,
  `price` int DEFAULT NULL,
  `attachment` varchar(150) DEFAULT NULL,
  `status` int NOT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `serviceoffer_slug` varchar(200) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `is_completed` int NOT NULL DEFAULT '0',
  `pay_type` varchar(20) DEFAULT NULL,
  `payment_status` int DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`id`, `user_id`, `title`, `description`, `category_id`, `subcategory_id`, `day`, `price`, `attachment`, `status`, `slug`, `updated_at`, `serviceoffer_slug`, `is_completed`, `pay_type`, `payment_status`) VALUES
(1, 4, 'Classified Craigslist ad posting experts urgently needed', 'Classified Craigslist ad posting experts needed Urgently Am in need of the services of a classified ad poster on Craigslist. Health and Beauty sections for our company product advertisement. Poster should have all working tools. Poster should have experiences in Craigslist ads posting. Am willing to pay whatever it takes as long as i get good services rendered. If interested Kindly contact me via Skype at moneyorder4', 6, 61, 3, 50, '474c2ecd_ppp.jpg', 1, 'classified-craigslist-ad-posting-experts-urgently-needed', '2020-09-20 18:25:18', NULL, 0, NULL, 0),
(39, 3, 'for classical music', 'for music', 4, 38, 8, 8, NULL, 1, 'for-music', '2022-08-16 10:33:16', NULL, 0, NULL, 0),
(40, 3, 'Basic of c language', 'c programing', 2, 90, 1, 8, NULL, 1, 'basic-of-c-language', '2022-08-16 10:33:00', NULL, 0, NULL, 0),
(41, 4, 'React js programing', 'react js cource', 2, 89, 3, 8, NULL, 1, 'react-js-programing', '2020-09-17 13:20:43', NULL, 0, NULL, 0),
(42, 4, 'Angular', 'I am looking for angular cource', 2, 90, 2, 8, NULL, 1, 'angular', '2020-09-17 13:28:09', NULL, 0, NULL, 0),
(43, 3, 'Crash course of react js', 'I am looking for react js course with setup training within 20 days', 2, 90, 1, 8, NULL, 1, 'crash-course-of-react-js', '2020-09-20 18:15:30', NULL, 0, NULL, 0),
(44, 4, 'I am looking for 3d logo design', 'I want to 3d logo for my Organization.My organization is related to digital marketing.i will provide you whole information which are required for logo', 3, 24, 4, 8, NULL, 1, 'i-am-looking-for-3d-logo-design', '2020-09-21 10:09:54', NULL, 0, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_servicesoffers`
--

CREATE TABLE `tbl_servicesoffers` (
  `id` int NOT NULL,
  `service_id` int NOT NULL,
  `service_user_id` int DEFAULT NULL,
  `user_id` int DEFAULT NULL,
  `amount` int DEFAULT NULL,
  `deliver_in` int DEFAULT NULL,
  `revisions` int DEFAULT NULL,
  `message` text,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `status` int DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `time` bigint DEFAULT NULL,
  `total_amount` float(12,2) DEFAULT NULL,
  `admin_amount` float(12,2) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_servicesoffers`
--

INSERT INTO `tbl_servicesoffers` (`id`, `service_id`, `service_user_id`, `user_id`, `amount`, `deliver_in`, `revisions`, `message`, `created_at`, `updated_at`, `status`, `slug`, `time`, `total_amount`, `admin_amount`) VALUES
(3, 6, 4, 3, 23, 5, 4, 'offer test', '2020-09-04 13:26:31', '2020-09-04 13:26:31', 2, 'ce71ded5987ce6580b632bf74d8fc70cc6be21c7c8bcc79a40', 1542793610, NULL, NULL),
(6, 1, 4, 3, 56, 56, 5, '546456', '2018-12-13 04:35:10', '2018-12-13 04:35:10', 0, '01bb4cedc6490cb869c02cb2d3e46f77838490aab6405444ea', 1544692670, NULL, NULL),
(10, 2, 4, 3, 23, 6, 2, 'Good', '2020-09-04 13:53:21', '2020-09-04 13:53:21', 0, '77f6a8441ac92d55c18d122521ac9301402c285896f25a0b7d', 1544783424, NULL, NULL),
(20, 40, 3, 4, 8, 15, 2, 'whole c lang course', '2020-09-05 04:00:39', '2020-09-05 04:00:39', 0, '68df85afb1abbba2dbef608228d488391c7e1815b76d58a380', 1599278439, NULL, NULL),
(21, 42, 4, 3, 200, 10, 1, 'crash course', '2020-09-20 18:17:45', '2020-09-20 18:17:45', 0, '4dde04d1d08bff12f060790ed9ab34445755da190c14d29ce5', 1600625865, NULL, NULL),
(22, 43, 3, 4, 7, 5, 3, 'i will offer it', '2020-10-28 17:54:22', '2020-10-28 17:54:22', 0, '723d773f4679f65c5f16df79ded4f3154a30f71c55ea1d6ebe', 1602861985, NULL, NULL),
(23, 44, 4, 3, 25, 5, 3, 'i can do that', '2020-10-28 07:58:32', '2020-10-28 07:58:32', 0, 'a961c126f54dca9667aa4894d4b884da7f87585ea68121d4a9', 1603263398, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `id` int NOT NULL,
  `site_title` varchar(100) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `tag_line` varchar(100) DEFAULT NULL,
  `company_name` varchar(100) NOT NULL,
  `contact_number` varchar(30) DEFAULT NULL,
  `contact_email` varchar(50) DEFAULT NULL,
  `address` text NOT NULL,
  `facebook_link` varchar(200) DEFAULT NULL,
  `twitter_link` varchar(200) DEFAULT NULL,
  `google_link` varchar(200) DEFAULT NULL,
  `instagram_link` varchar(200) DEFAULT NULL,
  `linkedin_link` varchar(200) DEFAULT NULL,
  `pinterest_link` varchar(200) DEFAULT NULL,
  `youtube_link` varchar(50) DEFAULT NULL,
  `home_logo` varchar(255) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `favicon` varchar(100) DEFAULT NULL,
  `payment_mode` int DEFAULT '0',
  `paypal_email_address` varchar(50) DEFAULT NULL,
  `api_username` varchar(255) DEFAULT NULL,
  `api_password` varchar(255) DEFAULT NULL,
  `api_signature` varchar(255) DEFAULT NULL,
  `admin_commission` float(7,2) NOT NULL,
  `commission_admin` float(12,2) DEFAULT NULL,
  `final_commission` float(12,2) NOT NULL DEFAULT '0.00',
  `minimum_withdraw_amount` float(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `nextupdate` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`id`, `site_title`, `tag_line`, `company_name`, `contact_number`, `contact_email`, `address`, `facebook_link`, `twitter_link`, `google_link`, `instagram_link`, `linkedin_link`, `pinterest_link`, `youtube_link`, `home_logo`, `logo`, `favicon`, `payment_mode`, `paypal_email_address`, `api_username`, `api_password`, `api_signature`, `admin_commission`, `commission_admin`, `final_commission`, `minimum_withdraw_amount`, `created_at`, `updated_at`, `nextupdate`) VALUES
(1, 'Biznaaz', NULL, 'Biznaaz', '9876543210', 'info@biznaaz.com', 'Bangladesh', 'https://www.facebook.com', 'https://www.twitter.com', 'https://www.google.com', 'https://www.instagram.com/', 'https://www.linkedin.com', NULL, NULL, 'logo.png', 'logo.png', 'favicon.ico', 0, 'alok.tiwari@logicspice.com', 'bhuvanesh.sharma001_api1.logicspice.com', 'ZVDKLTGJ6NDBLEF8', 'AFcWxV21C7fd0v3bYYYRCpSSRl31AwLyGCmVrSyhRhr9z8HrPg4vTYwK', 10.00, 15.00, 25.00, 10.00, '2020-07-13 10:41:20', '2022-11-29 12:39:21', '2022-08-17 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_skills`
--

CREATE TABLE `tbl_skills` (
  `id` int UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `user_id` int NOT NULL DEFAULT '0',
  `slug` varchar(255) NOT NULL,
  `status` tinyint DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_skills`
--

INSERT INTO `tbl_skills` (`id`, `name`, `user_id`, `slug`, `status`, `updated_at`) VALUES
(1, 'Java', 0, 'java', 1, '2018-08-22 01:55:27'),
(2, '3D Max', 0, '3d-max', 1, '2018-08-22 01:55:27'),
(3, 'IOS', 0, 'ios', 1, '2018-08-22 01:55:27'),
(4, 'AngularJS', 0, 'angularJS', 1, '2018-08-22 01:55:27'),
(5, 'Automotive Repair', 0, 'automotive-repair', 1, '2018-08-22 01:55:27'),
(6, 'Computer Programming', 0, 'computer-programming', 1, '2018-08-22 01:55:27'),
(7, 'Pharmacy', 0, 'Pharmacy', 1, '2018-08-22 01:55:27'),
(8, 'Nodejs', 0, 'nodejs', 1, '2018-08-22 01:55:27'),
(9, 'SAP HR', 0, 'sap-hr', 1, '2018-08-22 01:55:27'),
(10, 'Magento', 0, 'magento', 1, '2018-08-22 01:55:27'),
(11, 'SAP MM', 0, 'sap-mm', 1, '2018-08-22 01:55:27'),
(12, 'SAP SD', 0, 'sap-sd', 1, '2018-08-22 01:55:27'),
(13, 'Codeigniter', 0, 'codeigniter', 1, '2018-08-22 01:55:27'),
(14, 'SAP Security', 0, 'sap-security', 1, '2018-08-22 01:55:27'),
(15, '.Net', 0, 'net', 1, '2018-08-22 01:55:27'),
(16, 'Banking', 0, 'banking', 1, '2018-08-22 01:55:27'),
(17, 'Biotechnology', 0, 'biotechnology', 1, '2018-08-22 01:55:27'),
(18, 'Teaching', 0, 'teaching', 1, '2018-08-22 01:55:27'),
(19, 'Finance', 0, 'finance', 1, '2018-08-22 01:55:28'),
(20, 'Nursing', 0, 'nursing', 1, '2018-08-22 01:55:28'),
(21, 'Animation', 0, 'animation', 1, '2018-08-22 01:55:28'),
(22, 'Accounts', 0, 'accounts', 1, '2018-08-22 01:55:28'),
(23, 'Graphic Design', 0, 'graphic-design', 1, '2018-08-22 01:55:28'),
(24, 'Journalism', 0, 'journalism', 1, '2018-08-22 01:55:28'),
(25, 'Writing', 0, 'writing', 1, '2018-08-22 01:55:28'),
(26, 'Photography', 0, 'photography', 1, '2018-08-22 01:55:28'),
(27, 'Advertising', 0, 'advertising', 1, '2018-08-22 01:55:28'),
(28, 'Interior Design', 0, 'interior-design', 1, '2018-08-22 01:55:28'),
(29, 'Architecture', 0, 'architecture', 1, '2018-08-22 01:55:28'),
(30, 'Education', 0, 'education', 1, '2018-08-22 01:55:28'),
(31, 'Visual Merchandising', 0, 'visual-merchandising', 1, '2018-08-22 01:55:28'),
(32, 'Manufacturing', 0, 'manufacturing', 1, '2018-08-22 01:55:28'),
(33, 'SAP Basis', 0, 'sap-basis', 1, '2018-08-22 01:55:28'),
(34, 'SAS', 0, 'sas', 1, '2018-08-22 01:55:28'),
(35, 'CISCO', 0, 'cisco', 1, '2018-08-22 01:55:28'),
(36, 'Dataentry', 0, 'dataentry', 1, '2018-08-22 01:55:28'),
(37, 'VLSI', 0, 'vlsi', 1, '2018-08-22 01:55:28'),
(38, 'Web Designing', 0, 'web-designing', 1, '2018-08-22 01:55:28'),
(39, 'Informatica', 0, 'informatica', 1, '2018-08-22 01:55:28'),
(40, 'Linux', 0, 'linux', 1, '2018-08-22 01:55:28'),
(41, 'Plc', 0, 'plc', 1, '2018-08-22 01:55:28'),
(42, 'ASP.NET', 0, 'asp-net', 1, '2018-08-22 01:55:28'),
(43, 'Datastage', 0, 'datastage', 1, '2018-08-22 01:55:28'),
(44, 'Finacle', 0, 'finacle', 1, '2018-08-22 01:55:28'),
(45, 'SAP CRM', 0, 'sap-crm', 1, '2018-08-22 01:55:28'),
(46, 'Tally', 0, 'tally', 1, '2018-08-22 01:55:28'),
(47, 'Tibco', 0, 'tibco', 1, '2018-08-22 01:55:28'),
(48, 'CATIA', 0, 'catia', 1, '2018-08-22 01:55:28'),
(49, 'Cognos', 0, 'cognos', 1, '2018-08-22 01:55:28'),
(50, 'ITIL', 0, 'itil', 1, '2018-08-22 01:55:28'),
(51, 'Multimedia', 0, 'multimedia', 1, '2018-08-22 01:55:28'),
(52, 'Photoshop', 0, 'photoshop', 1, '2018-08-22 01:55:28'),
(53, 'PRO E', 0, 'pro-e', 1, '2018-08-22 01:55:28'),
(54, 'Backend', 0, 'backend', 1, '2018-08-22 01:55:28'),
(55, 'DTP', 0, 'dtp', 1, '2018-08-22 01:55:29'),
(56, 'ERP', 0, 'erp', 1, '2018-08-22 01:55:29'),
(57, 'Siebel', 0, 'siebel', 1, '2018-08-22 01:55:29'),
(58, 'Video Editing', 0, 'video-editing', 1, '2018-08-22 01:55:29'),
(59, 'AbInitio', 0, 'abinitio', 1, '2018-08-22 01:55:29'),
(60, 'CAD/CAM', 0, 'cad-cam', 1, '2018-08-22 01:55:29'),
(61, 'Digital Marketing', 0, 'digital-marketing', 1, '2018-08-22 01:55:29'),
(62, 'Editing', 0, 'editing', 1, '2018-08-22 01:55:29'),
(63, 'Back Office', 0, 'back-office', 1, '2018-08-22 01:55:29'),
(64, 'Online Marketing', 0, 'online-marketing', 1, '2018-08-22 01:55:29'),
(65, 'Manual Testing', 0, 'manual-testing', 1, '2018-08-22 01:55:29'),
(66, 'CCIE', 0, 'ccie', 1, '2018-08-22 01:55:29'),
(67, 'PeopleSoft', 0, 'peoplesoft', 1, '2018-08-22 01:55:29'),
(68, 'Oracle Apps', 0, 'oracle-apps', 1, '2018-08-22 01:55:29'),
(69, 'Perl', 0, 'perl', 1, '2018-08-22 01:55:29'),
(70, 'Python', 0, 'python', 1, '2018-08-22 01:55:29'),
(71, 'SAP PP', 0, 'sap-pp', 1, '2018-08-22 01:55:29'),
(72, 'SAP PS', 0, 'sap-ps', 1, '2018-08-22 01:55:29'),
(73, 'SQL Server', 0, 'sql-server', 1, '2018-08-22 01:55:29'),
(74, 'Database', 0, 'database', 1, '2018-08-22 01:55:29'),
(75, 'MCSE', 0, 'mcse', 1, '2018-08-22 01:55:29'),
(76, 'PPC', 0, 'ppc', 1, '2018-08-22 01:55:29'),
(77, 'QTP', 0, 'qtp', 1, '2018-08-22 01:55:29'),
(78, 'SAP PM', 0, 'sap-pm', 1, '2018-08-22 01:55:29'),
(79, 'Teradata', 0, 'teradata', 1, '2018-08-22 01:55:29'),
(80, 'CRM', 0, 'crm', 1, '2018-08-22 01:55:29'),
(81, 'Data Warehousing', 0, 'data-warehousing', 1, '2018-08-22 01:55:29'),
(82, 'Flexcube', 0, 'flexcube', 1, '2018-08-22 01:55:29'),
(83, 'MATLAB', 0, 'matlab', 1, '2018-08-22 01:55:29'),
(84, 'PowerBuilder', 0, 'powerbuilder', 1, '2018-08-22 01:55:29'),
(85, 'SAP BW', 0, 'sap-bw', 1, '2018-08-22 01:55:29'),
(86, 'Solaris', 0, 'solaris', 1, '2018-08-22 01:55:29'),
(87, 'AIX', 0, 'aix', 1, '2018-08-22 01:55:29'),
(88, 'ArchiCAD', 0, 'archicad', 1, '2018-08-22 01:55:30'),
(89, 'Business Objects', 0, 'business-objects', 1, '2018-08-22 01:55:30'),
(90, 'Documentum', 0, 'documentum', 1, '2018-08-22 01:55:30'),
(91, 'FACT', 0, 'fact', 1, '2018-08-22 01:55:30'),
(92, 'Hyperion', 0, 'hyperion', 1, '2018-08-22 01:55:30'),
(93, 'SCADA', 0, 'scada', 1, '2018-08-22 01:55:30'),
(94, 'UniGraphics', 0, 'unigraphics', 1, '2018-08-22 01:55:30'),
(95, 'Unix', 0, 'unix', 1, '2018-08-22 01:55:30'),
(96, 'Vision Plu', 0, 'vision-plu', 1, '2018-08-22 01:55:30'),
(97, 'VSAT', 0, 'vsat', 1, '2018-08-22 01:55:30'),
(98, 'WebMethods', 0, 'webmethods', 1, '2018-08-22 01:55:30'),
(99, 'Auto CAD', 0, 'auto-cad', 1, '2018-08-22 01:55:30'),
(100, 'Datawarehousing', 0, 'datawarehousing', 1, '2018-08-22 01:55:30'),
(101, 'Flash', 0, 'flash', 1, '2018-08-22 01:55:30'),
(102, 'Lotus Notes', 0, 'lotus-notes', 1, '2018-08-22 01:55:30'),
(103, 'Automation Testing', 0, 'automation-testing', 1, '2018-08-22 01:55:30'),
(104, 'Delphi', 0, 'delphi', 1, '2018-08-22 01:55:30'),
(105, 'J2EE', 0, 'j2ee', 1, '2018-08-22 01:55:30'),
(106, 'MySQL', 0, 'mysql', 1, '2018-08-22 01:55:30'),
(107, 'RedHat', 0, 'redhat', 1, '2018-08-22 01:55:30'),
(108, 'SAP EP', 0, 'sap-ep', 1, '2018-08-22 01:55:30'),
(109, 'SAP SRM', 0, 'sap-srm', 1, '2018-08-22 01:55:30'),
(110, 'TPF', 0, 'tpf', 1, '2018-08-22 01:55:30'),
(111, 'VB.NET', 0, 'vb-net', 1, '2018-08-22 01:55:30'),
(112, 'VOIP', 0, 'voip', 1, '2018-08-22 01:55:30'),
(113, 'WebLogic', 0, 'weblogic', 1, '2018-08-22 01:55:30'),
(114, 'WebSphere', 0, 'websphere', 1, '2018-08-22 01:55:30'),
(115, 'Active Directory', 0, 'active-directory', 1, '2018-08-22 01:55:30'),
(116, 'Ansys', 0, 'ansys', 1, '2018-08-22 01:55:30'),
(117, 'Data Analysis', 0, 'data-analysis', 1, '2018-08-22 01:55:30'),
(118, 'Documentation', 0, 'documentation', 1, '2018-08-22 01:55:30'),
(119, 'DSP', 0, 'dsp', 1, '2018-08-22 01:55:30'),
(120, 'IMS', 0, 'ims', 1, '2018-08-22 01:55:30'),
(121, 'Remedy', 0, 'remedy', 1, '2018-08-22 01:55:31'),
(122, 'SAP QM', 0, 'sap-qm', 1, '2018-08-22 01:55:31'),
(123, 'SPSS', 0, 'spss', 1, '2018-08-22 01:55:31'),
(124, 'Sybase', 0, 'sybase', 1, '2018-08-22 01:55:31'),
(125, 'TLM', 0, 'tlm', 1, '2018-08-22 01:55:31'),
(126, 'ASIC', 0, 'asic', 1, '2018-08-22 01:55:31'),
(127, 'Blackberry', 0, 'blackberry', 1, '2018-08-22 01:55:31'),
(128, 'Corel Draw', 0, 'corel-draw', 1, '2018-08-22 01:55:31'),
(129, 'CSS', 0, 'css', 1, '2018-08-22 01:55:31'),
(130, 'DB2', 0, 'db2', 1, '2018-08-22 01:55:31'),
(131, 'Embedded C', 0, 'embedded-c', 1, '2018-08-22 01:55:31'),
(132, 'FileNet', 0, 'filenet', 1, '2018-08-22 01:55:31'),
(133, 'FoxPro', 0, 'foxpro', 1, '2018-08-22 01:55:31'),
(134, 'FPGA', 0, 'fpga', 1, '2018-08-22 01:55:31'),
(135, 'J2ME', 0, 'j2me', 1, '2018-08-22 01:55:31'),
(136, 'MCSA', 0, 'mcsa', 1, '2018-08-22 01:55:31'),
(137, 'Murex', 0, 'murex', 1, '2018-08-22 01:55:31'),
(138, 'SAP XI', 0, 'sap-xi', 1, '2018-08-22 01:55:31'),
(139, 'WPF', 0, 'wpf', 1, '2018-08-22 01:55:31'),
(140, 'DCA', 0, 'dca', 1, '2018-08-22 01:55:31'),
(141, 'Distribution', 0, 'distribution', 1, '2018-08-22 01:55:31'),
(142, 'Natural Adabas', 0, 'natural-adabas', 1, '2018-08-22 01:55:31'),
(143, 'ORCAD', 0, 'orcad', 1, '2018-08-22 01:55:31'),
(144, 'Progress 4GL', 0, 'progress-4gl', 1, '2018-08-22 01:55:31'),
(145, 'SAP SCM', 0, 'sap-scm', 1, '2018-08-22 01:55:31'),
(146, 'Silverlight', 0, 'silverlight', 1, '2018-08-22 01:55:31'),
(147, 'Switching', 0, 'switching', 1, '2018-08-22 01:55:31'),
(148, 'Android Development', 0, 'android-development', 1, '2018-08-22 01:55:31'),
(149, 'Calypso', 0, 'calypso', 1, '2018-08-22 01:55:31'),
(150, 'GSM', 0, 'gsm', 1, '2018-08-22 01:55:31'),
(151, 'Load Runner', 0, 'load-runner', 1, '2018-08-22 01:55:31'),
(152, 'MCP', 0, 'mcp', 1, '2018-08-22 01:55:31'),
(153, 'MicroStation', 0, 'microstation', 1, '2018-08-22 01:55:31'),
(154, 'MSCIT', 0, 'mscit', 1, '2018-08-22 01:55:31'),
(155, 'Savvion', 0, 'savvion', 1, '2018-08-22 01:55:31'),
(156, 'Shell Scripting', 0, 'shell-scripting', 1, '2018-08-22 01:55:32'),
(157, 'Spring', 0, 'spring', 1, '2018-08-22 01:55:32'),
(158, 'Affiliate Marketing', 0, 'affiliate-marketing', 1, '2018-08-22 01:55:32'),
(159, 'Eclipse', 0, 'eclipse', 1, '2018-08-22 01:55:32'),
(160, 'Focus', 0, 'focus', 1, '2018-08-22 01:55:32'),
(161, 'ForTran', 0, 'fortran', 1, '2018-08-22 01:55:32'),
(162, 'HP UNIX', 0, 'hp-unix', 1, '2018-08-22 01:55:32'),
(163, 'JSF', 0, 'jsf', 1, '2018-08-22 01:55:32'),
(164, 'MFC', 0, 'mfc', 1, '2018-08-22 01:55:32'),
(165, 'SAP IS-Utilities', 0, 'sap-is-utilities', 1, '2018-08-22 01:55:32'),
(166, 'Verilog', 0, 'verilog', 1, '2018-08-22 01:55:32'),
(167, 'Visual Foxpro', 0, 'visual-foxpro', 1, '2018-08-22 01:55:32'),
(168, 'WCF', 0, 'wcf', 1, '2018-08-22 01:55:32'),
(169, 'Website Development', 0, 'website-development', 1, '2018-08-22 01:55:32'),
(170, 'Dreamweaver', 0, 'dreamweaver', 1, '2018-08-22 01:55:32'),
(171, 'IIS', 0, 'iis', 1, '2018-08-22 01:55:32'),
(172, 'JSP', 0, 'jsp', 1, '2018-08-22 01:55:32'),
(173, 'Nortel', 0, 'nortel', 1, '2018-08-22 01:55:33'),
(174, 'RDO', 0, 'rdo', 1, '2018-08-22 01:55:33'),
(175, 'ActiveX', 0, 'activex', 1, '2018-08-22 01:55:33'),
(176, 'AJAX', 0, 'ajax', 1, '2018-08-22 01:55:33'),
(177, 'ALE', 0, 'ale', 1, '2018-08-22 01:55:33'),
(178, 'Ant', 0, 'ant', 1, '2018-08-22 01:55:33'),
(179, 'Apache Commons', 0, 'apache-commons', 1, '2018-08-22 01:55:33'),
(180, 'Apache Tomcat', 0, 'apache-tomcat', 1, '2018-08-22 01:55:33'),
(181, 'Apache Web Server', 0, 'apache-web-server', 1, '2018-08-22 01:55:33'),
(182, 'AS 400', 0, 'as-400', 1, '2018-08-22 01:55:33'),
(183, 'Assembly Language', 0, 'assembly-language', 1, '2018-08-22 01:55:33'),
(184, 'ATL', 0, 'atl', 1, '2018-08-22 01:55:33'),
(185, 'AutoLISP', 0, 'autolisp', 1, '2018-08-22 01:55:33'),
(186, 'AWT', 0, 'awt', 1, '2018-08-22 01:55:33'),
(187, 'Bluetooth', 0, 'bluetooth', 1, '2018-08-22 01:55:33'),
(188, 'BPCS', 0, 'bpcs', 1, '2018-08-22 01:55:33'),
(189, 'BREW', 0, 'brew', 1, '2018-08-22 01:55:33'),
(190, 'CDMA', 0, 'cdma', 1, '2018-08-22 01:55:33'),
(191, 'Chordiant', 0, 'chordiant', 1, '2018-08-22 01:55:33'),
(192, 'CLDC', 0, 'cldc', 1, '2018-08-22 01:55:33'),
(193, 'Clipper', 0, 'clipper', 1, '2018-08-22 01:55:33'),
(194, 'COM/COM+/DCOM', 0, 'com-com-dcom', 1, '2018-08-22 01:55:33'),
(195, 'CORBA', 0, 'corba', 1, '2018-08-22 01:55:33'),
(196, 'Csharp', 0, 'csharp', 1, '2018-08-22 01:55:33'),
(197, 'Data Structures', 0, 'data-structures', 1, '2018-08-22 01:55:33'),
(198, 'Database Administration', 0, 'database-administration', 1, '2018-08-22 01:55:33'),
(199, 'Db4o', 0, 'db4o', 1, '2018-08-22 01:55:33'),
(200, 'DBase', 0, 'dbase', 1, '2018-08-22 01:55:33'),
(201, 'DCOM', 0, 'dcom', 1, '2018-08-22 01:55:33'),
(202, 'Derby', 0, 'derby', 1, '2018-08-22 01:55:33'),
(203, 'Developer/D2K', 0, 'developer-d2k', 1, '2018-08-22 01:55:33'),
(204, 'DHCP', 0, 'dhcp', 1, '2018-08-22 01:55:33'),
(205, 'DHTML', 0, 'dhtml', 1, '2018-08-22 01:55:33'),
(206, 'DNS', 0, 'dns', 1, '2018-08-22 01:55:33'),
(207, 'DOS', 0, 'dos', 1, '2018-08-22 01:55:33'),
(208, 'Downstream', 0, 'downstream', 1, '2018-08-22 01:55:33'),
(209, 'EJB', 0, 'ejb', 1, '2018-08-22 01:55:34'),
(210, 'Ethernet', 0, 'ethernet', 1, '2018-08-22 01:55:34'),
(211, 'Expeditor', 0, 'expeditor', 1, '2018-08-22 01:55:34'),
(212, 'Finone', 0, 'finone', 1, '2018-08-22 01:55:34'),
(213, 'Firewall', 0, 'firewall', 1, '2018-08-22 01:55:34'),
(214, 'Fireworks', 0, 'fireworks', 1, '2018-08-22 01:55:34'),
(215, 'FlashLite', 0, 'flashlite', 1, '2018-08-22 01:55:34'),
(216, 'FreeBSD', 0, 'freebsd', 1, '2018-08-22 01:55:34'),
(217, 'FTP', 0, 'ftp', 1, '2018-08-22 01:55:34'),
(218, 'GLOSS', 0, 'gloss', 1, '2018-08-22 01:55:34'),
(219, 'Hibernate', 0, 'hibernate', 1, '2018-08-22 01:55:34'),
(220, 'Humming Bird', 0, 'humming-bird', 1, '2018-08-22 01:55:34'),
(221, 'IBatis', 0, 'ibatis', 1, '2018-08-22 01:55:34'),
(222, 'Ideas', 0, 'ideas', 1, '2018-08-22 01:55:34'),
(223, 'ImageReady', 0, 'imageready', 1, '2018-08-22 01:55:34'),
(224, 'Impromptu', 0, 'impromptu', 1, '2018-08-22 01:55:34'),
(225, 'Informix', 0, 'informix', 1, '2018-08-22 01:55:34'),
(226, 'Ingres', 0, 'ingres', 1, '2018-08-22 01:55:34'),
(227, 'Installshield', 0, 'installshield', 1, '2018-08-22 01:55:34'),
(228, 'ISDN', 0, 'isdn', 1, '2018-08-22 01:55:34'),
(229, 'J2SE', 0, 'j2se', 1, '2018-08-22 01:55:34'),
(230, 'Java2D', 0, 'java2d', 1, '2018-08-22 01:55:34'),
(231, 'JavaCard', 0, 'javacard', 1, '2018-08-22 01:55:34'),
(232, 'JavaSE', 0, 'javase', 1, '2018-08-22 01:55:34'),
(233, 'JBoss', 0, 'jboss', 1, '2018-08-22 01:55:34'),
(234, 'JBoss Seam', 0, 'jboss-seam', 1, '2018-08-22 01:55:34'),
(235, 'JCL', 0, 'jcl', 1, '2018-08-22 01:55:34'),
(236, 'JDBC', 0, 'jdbc', 1, '2018-08-22 01:55:34'),
(237, 'JDOM', 0, 'jdom', 1, '2018-08-22 01:55:34'),
(238, 'JFace', 0, 'jface', 1, '2018-08-22 01:55:34'),
(239, 'Jini', 0, 'jini', 1, '2018-08-22 01:55:34'),
(240, 'JIRA', 0, 'jira', 1, '2018-08-22 01:55:34'),
(241, 'JMock', 0, 'jmock', 1, '2018-08-22 01:55:35'),
(242, 'JMS', 0, 'jms', 1, '2018-08-22 01:55:35'),
(243, 'JNI', 0, 'jni', 1, '2018-08-22 01:55:35'),
(244, 'JPA', 0, 'jpa', 1, '2018-08-22 01:55:35'),
(245, 'JSE', 0, 'jse', 1, '2018-08-22 01:55:35'),
(246, 'JUnit', 0, 'junit', 1, '2018-08-22 01:55:35'),
(247, 'Kickboxing', 0, 'kickboxing', 1, '2018-08-22 01:55:35'),
(248, 'KSH', 0, 'ksh', 1, '2018-08-22 01:55:35'),
(249, 'LAN', 0, 'lan', 1, '2018-08-22 01:55:35'),
(250, 'LINQ', 0, 'linq', 1, '2018-08-22 01:55:35'),
(251, 'Log4j', 0, 'log4j', 1, '2018-08-22 01:55:35'),
(252, 'Mac OS', 0, 'mac-os', 1, '2018-08-22 01:55:35'),
(253, 'Maven', 0, 'maven', 1, '2018-08-22 01:55:35'),
(254, 'MIDP', 0, 'midp', 1, '2018-08-22 01:55:35'),
(255, 'MIS Reports', 0, 'mis-reports', 1, '2018-08-22 01:55:35'),
(256, 'MOSS', 0, 'moss', 1, '2018-08-22 01:55:35'),
(257, 'Motif', 0, 'motif', 1, '2018-08-22 01:55:35'),
(258, 'MS DOS', 0, 'ms-dos', 1, '2018-08-22 01:55:35'),
(259, 'MS Project', 0, 'ms-project', 1, '2018-08-22 01:55:35'),
(260, 'MS SQL Server', 0, 'ms-sql-server', 1, '2018-08-22 01:55:35'),
(261, 'MS Visio', 0, 'ms-visio', 1, '2018-08-22 01:55:35'),
(262, 'Multithreading', 0, 'multithreading', 1, '2018-08-22 01:55:35'),
(263, 'MVS', 0, 'mvs', 1, '2018-08-22 01:55:35'),
(264, 'NetWeaver', 0, 'netweaver', 1, '2018-08-22 01:55:35'),
(265, 'Novell', 0, 'novell', 1, '2018-08-22 01:55:35'),
(266, 'ODBC', 0, 'odbc', 1, '2018-08-22 01:55:35'),
(267, 'Office Operations', 0, 'office-operations', 1, '2018-08-22 01:55:35'),
(268, 'OOPS', 0, 'oops', 1, '2018-08-22 01:55:35'),
(269, 'OpenGL ES', 0, 'opengl-es', 1, '2018-08-22 01:55:35'),
(270, 'Operating Systems', 0, 'operating-systems', 1, '2018-08-22 01:55:35'),
(271, 'Oracle WareHouse Builder', 0, 'oracle-warehouse-builder', 1, '2018-08-22 01:55:35'),
(272, 'PASCAL', 0, 'pascal', 1, '2018-08-22 01:55:35'),
(273, 'PL/SQL', 0, 'pl-sql', 1, '2018-08-22 01:55:36'),
(274, 'PL/1', 0, 'pl-1', 1, '2018-08-22 01:55:36'),
(275, 'PostgreSQL', 0, 'postgresql', 1, '2018-08-22 01:55:36'),
(276, 'PowerPlay', 0, 'powerplay', 1, '2018-08-22 01:55:36'),
(277, 'Pro*C', 0, 'pro-c', 1, '2018-08-22 01:55:36'),
(278, 'PVCS', 0, 'pvcs', 1, '2018-08-22 01:55:36'),
(279, 'Quality Assurance/QA', 0, 'quality-assurance-qa', 1, '2018-08-22 01:55:36'),
(280, 'Remoting', 0, 'remoting', 1, '2018-08-22 01:55:36'),
(281, 'REXX', 0, 'rexx', 1, '2018-08-22 01:55:36'),
(282, 'RichFaces', 0, 'richfaces', 1, '2018-08-22 01:55:36'),
(283, 'RMI', 0, 'rmi', 1, '2018-08-22 01:55:36'),
(284, 'Routing', 0, 'routing', 1, '2018-08-22 01:55:36'),
(285, 'RTOS', 0, 'rtos', 1, '2018-08-22 01:55:36'),
(286, 'S60', 0, 's60', 1, '2018-08-22 01:55:36'),
(287, 'SAP Bl', 0, 'sap-bl', 1, '2018-08-22 01:55:36'),
(288, 'SAP COPA', 0, 'sap-copa', 1, '2018-08-22 01:55:36'),
(289, 'SAP Idocs', 0, 'sap-idocs', 1, '2018-08-22 01:55:36'),
(290, 'SAP IS-GAS/OIL', 0, 'sap-is-gas-oil', 1, '2018-08-22 01:55:36'),
(291, 'SAP Practice', 0, 'sap-practice', 1, '2018-08-22 01:55:36'),
(292, 'SAP SEM', 0, 'sap-sem', 1, '2018-08-22 01:55:36'),
(293, 'SAP WMS', 0, 'sap-wms', 1, '2018-08-22 01:55:36'),
(294, 'Seam', 0, 'seam', 1, '2018-08-22 01:55:36'),
(295, 'Sharepoint Server', 0, 'sharepoint-server', 1, '2018-08-22 01:55:36'),
(296, 'SMARTY', 0, 'smarty', 1, '2018-08-22 01:55:36'),
(297, 'SMTP', 0, 'smtp', 1, '2018-08-22 01:55:37'),
(298, 'SoundForge', 0, 'soundforge', 1, '2018-08-22 01:55:37'),
(299, 'Struts', 0, 'struts', 1, '2018-08-22 01:55:37'),
(300, 'SunOS', 0, 'sunos', 1, '2018-08-22 01:55:37'),
(301, 'SWT', 0, 'swt', 1, '2018-08-22 01:55:37'),
(302, 'Symbian C++', 0, 'symbian-c', 1, '2018-08-22 01:55:37'),
(303, 'SyncML', 0, 'syncml', 1, '2018-08-22 01:55:37'),
(304, 'T SQL', 0, 't-sql', 1, '2018-08-22 01:55:37'),
(305, 'TCP/IP', 0, 'tcp-ip', 1, '2018-08-22 01:55:37'),
(306, 'TELNET', 0, 'telnet', 1, '2018-08-22 01:55:37'),
(307, 'TOAD', 0, 'toad', 1, '2018-08-22 01:55:37'),
(308, 'Turbo Pascal', 0, 'turbo-pascal', 1, '2018-08-22 01:55:37'),
(309, 'Tuxedo', 0, 'tuxedo', 1, '2018-08-22 01:55:37'),
(310, 'UIQ', 0, 'uiq', 1, '2018-08-22 01:55:37'),
(311, 'UML', 0, 'uml', 1, '2018-08-22 01:55:37'),
(312, 'Upstream', 0, 'upstream', 1, '2018-08-22 01:55:37'),
(313, 'Vignette', 0, 'vignette', 1, '2018-08-22 01:55:37'),
(314, 'Visual C++', 0, 'visual-c', 1, '2018-08-22 01:55:37'),
(315, 'Visual Interdev', 0, 'visual-interdev', 1, '2018-08-22 01:55:37'),
(316, 'VMS', 0, 'vms', 1, '2018-08-22 01:55:37'),
(317, 'VPN', 0, 'vpn', 1, '2018-08-22 01:55:37'),
(318, 'VSS/Clearcase', 0, 'vss-clearcase', 1, '2018-08-22 01:55:37'),
(319, 'VxWorks', 0, 'vxworks', 1, '2018-08-22 01:55:37'),
(320, 'WAN', 0, 'wan', 1, '2018-08-22 01:55:37'),
(321, 'WAP', 0, 'wap', 1, '2018-08-22 01:55:37'),
(322, 'Winform', 0, 'winform', 1, '2018-08-22 01:55:37'),
(323, 'Winrunner', 0, 'winrunner', 1, '2018-08-22 01:55:37'),
(324, 'WML', 0, 'wml', 1, '2018-08-22 01:55:37'),
(325, 'XDoclet', 0, 'xdoclet', 1, '2018-08-22 01:55:37'),
(326, 'Xenix', 0, 'xenix', 1, '2018-08-22 01:55:37'),
(327, 'XHTML', 0, 'xhtml', 1, '2018-08-22 01:55:37'),
(328, 'XStream', 0, 'xstream', 1, '2018-08-22 01:55:37'),
(329, 'Yantra', 0, 'yantra', 1, '2018-08-22 01:55:38'),
(330, 'Designing', 0, 'designing', 1, '2018-08-22 01:55:38'),
(331, 'SMO', 0, 'smo', 1, '2018-08-22 01:55:38'),
(332, 'VAX/VMS', 0, 'vax-vms', 1, '2018-08-22 01:55:38'),
(333, 'TCL/TK', 0, 'tcl-tk', 1, '2018-08-22 01:55:38'),
(334, 'OS/2', 0, 'os-2', 1, '2018-08-22 01:55:38'),
(335, 'SAP BI', 0, 'sap-bi', 1, '2018-08-22 01:55:38'),
(336, 'Sharepoint MOSS', 0, 'sharepoint-moss', 1, '2018-08-22 01:55:38'),
(337, 'Accounting', 0, 'accounting', 1, '2018-08-22 01:55:38'),
(338, 'Administration', 0, 'administration', 1, '2018-08-22 01:55:38'),
(339, 'Vendor Management', 0, 'vendor-management', 1, '2018-08-22 01:55:38'),
(340, 'Analysis', 0, 'analysis', 1, '2018-08-22 01:55:38'),
(341, 'Banking Insurance', 0, 'banking-insurance', 1, '2018-08-22 01:55:38'),
(342, 'Office Management', 0, 'office-management', 1, '2018-08-22 01:55:38'),
(343, 'Accounts Management', 0, 'accounts-management', 1, '2018-08-22 01:55:38'),
(344, 'Advertisement Sales', 0, 'advertisement-sales', 1, '2018-08-22 01:55:38'),
(345, 'Advertising Account Management', 0, 'advertising-account-management', 1, '2018-08-22 01:55:38'),
(346, 'Advertising Art Direction', 0, 'advertising-art-direction', 1, '2018-08-22 01:55:38'),
(347, 'Advisory', 0, 'advisory', 1, '2018-08-22 01:55:38'),
(348, 'Aquisitions', 0, 'aquisitions', 1, '2018-08-22 01:55:38'),
(349, 'Art Therapy', 0, 'art-therapy', 1, '2018-08-22 01:55:38'),
(350, 'Authoring', 0, 'authoring', 1, '2018-08-22 01:55:38'),
(351, 'Body Art', 0, 'body-art', 1, '2018-08-22 01:55:38'),
(352, 'Bookbinding', 0, 'bookbinding', 1, '2018-08-22 01:55:38'),
(353, 'Busines Analysis', 0, 'busines-analysis', 1, '2018-08-22 01:55:38'),
(354, 'Buying', 0, 'buying', 1, '2018-08-22 01:55:38'),
(355, 'Channel Account Management', 0, 'channel-account-management', 1, '2018-08-22 01:55:38'),
(356, 'Chartered Accountancy', 0, 'chartered-accountancy', 1, '2018-08-22 01:55:38'),
(357, 'Cloth Design', 0, 'cloth-design', 1, '2018-08-22 01:55:38'),
(358, 'Company Laws', 0, 'company-laws', 1, '2018-08-22 01:55:38'),
(359, 'Composing', 0, 'composing', 1, '2018-08-22 01:55:38'),
(360, 'Curating', 0, 'curating', 1, '2018-08-22 01:55:39'),
(361, 'Customer Relations', 0, 'customer-relations', 1, '2018-08-22 01:55:39'),
(362, 'Document Administration', 0, 'document-administration', 1, '2018-08-22 01:55:39'),
(363, 'Electrical Distribution', 0, 'electrical-distribution', 1, '2018-08-22 01:55:39'),
(364, 'Floristry', 0, 'floristry', 1, '2018-08-22 01:55:39'),
(365, 'Guest Service', 0, 'guest-service', 1, '2018-08-22 01:55:39'),
(366, 'Hairdressing', 0, 'hairdressing', 1, '2018-08-22 01:55:39'),
(367, 'Headhunting', 0, 'headhunting', 1, '2018-08-22 01:55:39'),
(368, 'Image Consulting', 0, 'image-consulting', 1, '2018-08-22 01:55:39'),
(369, 'Industrial Designing', 0, 'industrial-designing', 1, '2018-08-22 01:55:39'),
(370, 'Key Accounts Management', 0, 'key-accounts-management', 1, '2018-08-22 01:55:39'),
(371, 'Landscape Gardening', 0, 'landscape-gardening', 1, '2018-08-22 01:55:39'),
(372, 'Make Up Art', 0, 'make-up-art', 1, '2018-08-22 01:55:39'),
(373, 'Map Making', 0, 'map-making', 1, '2018-08-22 01:55:39'),
(374, 'Mathematical', 0, 'mathematical', 1, '2018-08-22 01:55:39'),
(375, 'Merchandise', 0, 'merchandise', 1, '2018-08-22 01:55:39'),
(376, 'Mergers', 0, 'mergers', 1, '2018-08-22 01:55:39'),
(377, 'Motivating Skill', 0, 'motivating-skill', 1, '2018-08-22 01:55:39'),
(378, 'Negotiating Skill', 0, 'negotiating-skill', 1, '2018-08-22 01:55:39'),
(379, 'Personal Services', 0, 'personal-services', 1, '2018-08-22 01:55:39'),
(380, 'Planning And Organising', 0, 'planning-and-organising', 1, '2018-08-22 01:55:39'),
(381, 'Private Tutoring', 0, 'private-tutoring', 1, '2018-08-22 01:55:39'),
(382, 'Producing', 0, 'producing', 1, '2018-08-22 01:55:39'),
(383, 'Record Producing', 0, 'record-producing', 1, '2018-08-22 01:55:39'),
(384, 'Sales Accounting', 0, 'sales-accounting', 1, '2018-08-22 01:55:39'),
(385, 'Sales Planning', 0, 'sales-planning', 1, '2018-08-22 01:55:40'),
(386, 'Store Planning', 0, 'store-planning', 1, '2018-08-22 01:55:40'),
(387, 'Supervising', 0, 'supervising', 1, '2018-08-22 01:55:40'),
(388, 'Tax Audits', 0, 'tax-audits', 1, '2018-08-22 01:55:40'),
(389, 'Tax Laws', 0, 'tax-laws', 1, '2018-08-22 01:55:40'),
(390, 'Instructing', 0, 'instructing', 1, '2018-08-22 01:55:40'),
(391, 'Telling', 0, 'telling', 1, '2018-08-22 01:55:40'),
(392, 'Therapy', 0, 'therapy', 1, '2018-08-22 01:55:40'),
(393, 'Trade Execution', 0, 'trade-execution', 1, '2018-08-22 01:55:40'),
(394, 'Upholstery', 0, 'upholstery', 1, '2018-08-22 01:55:40'),
(395, 'Vehicle Operating', 0, 'vehicle-operating', 1, '2018-08-22 01:55:40'),
(396, 'Visa Expat Management', 0, 'visa-expat-management', 1, '2018-08-22 01:55:40'),
(397, 'Wine Making', 0, 'wine-making', 1, '2018-08-22 01:55:40'),
(398, 'Adobe Photoshop', 0, 'adobe-photoshop', 1, '2018-08-22 01:55:40'),
(399, 'Maximo', 0, 'maximo', 1, '2018-08-22 01:55:40'),
(400, 'Primavera', 0, 'primavera', 1, '2018-08-22 01:55:40'),
(401, 'SAP IS-Retail', 0, 'sap-is-retail', 1, '2018-08-22 01:55:40'),
(402, 'Autosys', 0, 'autosys', 1, '2018-08-22 01:55:40'),
(403, 'COBOL', 0, 'cobol', 1, '2018-08-22 01:55:40'),
(404, 'ColdFusion', 0, 'coldfusion', 1, '2018-08-22 01:55:40'),
(405, 'Maya', 0, 'maya', 1, '2018-08-22 01:55:40'),
(406, 'Programming', 0, 'programming', 1, '2018-08-22 01:55:40'),
(407, 'RIM', 0, 'rim', 1, '2018-08-22 01:55:40'),
(408, 'SAP MDM   XML', 0, 'sap-mdm-xml', 1, '2018-08-22 01:55:40'),
(409, 'C#', 0, 'c', 1, '2018-08-22 01:55:40'),
(410, 'DSP   IMS', 0, 'dsp-ims', 1, '2018-08-22 01:55:40'),
(411, 'ASP', 0, 'asp', 1, '2018-08-22 01:55:40'),
(412, 'Visual Basic', 0, 'visual-basic', 1, '2018-08-22 01:55:40'),
(413, 'Microsoft Excel', 0, 'microsoft-excel', 1, '2018-08-22 01:55:40'),
(414, 'ADO', 0, 'ado', 1, '2018-08-22 01:55:40'),
(415, 'Adobe Illustrator', 0, 'adobe-illustrator', 1, '2018-08-22 01:55:41'),
(416, 'Adobe Pagemaker', 0, 'adobe-pagemaker', 1, '2018-08-22 01:55:41'),
(417, 'BASIC', 0, 'basic', 1, '2018-08-22 01:55:41'),
(418, 'BPEL', 0, 'bpel', 1, '2018-08-22 01:55:41'),
(419, 'CICS', 0, 'cics', 1, '2018-08-22 01:55:41'),
(420, 'CoreJava', 0, 'corejava', 1, '2018-08-22 01:55:41'),
(421, 'Crystal Report', 0, 'crystal-report', 1, '2018-08-22 01:55:41'),
(422, 'Ingres   Installshield', 0, 'ingres-installshield', 1, '2018-08-22 01:55:41'),
(423, 'J++', 0, 'j', 1, '2018-08-22 01:55:41'),
(424, 'JavaFX', 0, 'javafx', 1, '2018-08-22 01:55:41'),
(425, 'Microcontrollers', 0, 'microcontrollers', 1, '2018-08-22 01:55:41'),
(426, 'Microsoft Access', 0, 'microsoft-access', 1, '2018-08-22 01:55:41'),
(427, 'Microsoft Exchange', 0, 'microsoft-exchange', 1, '2018-08-22 01:55:41'),
(428, 'Microsoft Office', 0, 'microsoft-office', 1, '2018-08-22 01:55:41'),
(429, 'Installshield  . ISDN', 0, 'installshield-isdn', 1, '2018-08-22 01:55:41'),
(430, 'Cakephp', 0, 'cakephp-1', 1, '2018-08-22 01:55:41'),
(431, 'C++', 0, 'c-1', 1, '2018-08-22 01:55:41'),
(432, 'Drupal', 0, 'drupal-1', 1, '2018-08-22 01:55:41'),
(433, 'Testing', 0, 'testing-1', 1, '2018-08-22 01:55:41'),
(434, 'Dotnet', 0, 'dotnet-1', 1, '2018-08-22 01:55:41'),
(435, 'Wordpress', 0, 'wordpress-1', 1, '2018-08-22 01:55:41'),
(436, 'Joomla', 0, 'joomla-1', 1, '2018-08-22 01:55:41'),
(437, 'Qa', 0, 'qa-1', 1, '2018-08-22 01:55:41'),
(438, 'Bootstrap', 0, 'bootstrap', 1, '2018-08-22 01:55:41'),
(439, 'Ecommerce Developer', 0, 'ecommerce-developer', 1, '2018-08-22 01:55:41'),
(440, 'PSD To WordPress', 0, 'psd-to-wordpress', 1, '2018-08-22 01:55:41'),
(441, 'Social Media Marketing', 0, 'social-media-marketing', 1, '2018-08-22 01:55:41'),
(442, 'C# Programming', 0, 'c-programming', 1, '2018-08-22 01:55:41'),
(443, 'Copy Typing', 0, 'copy-typing', 1, '2018-08-22 01:55:41'),
(444, 'Logo', 0, 'logo', 1, '2018-08-22 01:55:41'),
(445, 'Website Design', 0, 'website-design', 1, '2018-08-22 01:55:41'),
(446, 'Ghostwriting', 0, '', 1, '2018-08-22 01:55:41'),
(447, 'Article Writing', 0, 'article-writing', 1, '2018-08-22 01:55:41'),
(448, 'Copywriting', 0, 'copywriting-1', 1, '2018-08-22 01:55:41'),
(449, 'PHP', 0, 'php-1', 1, '2018-08-22 01:55:42'),
(450, 'ECommerce', 0, 'ecommerce-1', 1, '2018-08-22 01:55:42'),
(451, 'Swift', 0, 'swift', 1, '2018-08-22 01:55:42'),
(452, 'Objective C', 0, 'objective-c', 1, '2018-08-22 01:55:42'),
(453, 'IPhone App Development', 0, 'iphone-app-development', 1, '2018-08-22 01:55:42'),
(454, 'Link Building', 0, 'link-building', 1, '2018-08-22 01:55:42'),
(455, 'SEO', 0, 'seo-1', 1, '2018-08-22 01:55:42'),
(456, 'On-Page SEO', 0, 'on-page-seo', 1, '2018-08-22 01:55:42'),
(457, 'Off-Page SEO', 0, 'off-page-seo', 1, '2018-08-22 01:55:42'),
(458, 'Logo Design', 0, 'logo-design', 1, '2018-08-22 01:55:42'),
(459, 'Photo Editing', 0, 'photo-editing', 1, '2018-08-22 01:55:42'),
(460, '3D Designer', 0, '3d-designer', 1, '2018-08-22 01:55:42'),
(461, 'Game Designer', 0, 'game-designer', 1, '2018-08-22 01:55:42'),
(462, 'Graphic Designer', 0, 'graphic-designer', 1, '2018-08-22 01:55:42'),
(463, 'Javascript', 0, 'javascript-1', 1, '2018-08-22 01:55:42'),
(464, 'Laravel', 0, 'laravel', 1, '2018-08-22 01:55:42'),
(465, 'Web Development', 0, 'web-development', 1, '2018-08-22 01:55:42'),
(466, 'E-commerce', 0, 'e-commerce', 1, '2018-08-22 01:55:42'),
(467, 'XML', 0, 'xml', 1, '2018-08-22 01:55:42'),
(468, 'Html', 0, 'html-1', 1, '2018-08-22 01:55:42'),
(469, 'Brochure Design', 0, 'brochure-design', 1, '2018-08-22 01:55:42'),
(470, 'Web Banners Design', 0, 'web-banners-design', 1, '2018-08-22 01:55:42'),
(471, 'Catalogues Design', 0, 'catalogues-design', 1, '2018-08-22 01:55:42'),
(472, 'E-book Cover Design', 0, 'e-book-cover-design', 1, '2018-08-22 01:55:42'),
(473, 'Graphics Designing', 0, 'graphics-designing', 1, '2018-08-22 01:55:42'),
(474, 'Online Chatting/Messaging App', 0, 'online-chatting-messaging-app', 1, '2018-08-22 01:55:42'),
(475, 'GoogleMap/GPS App', 0, 'googlemap-gps-app', 1, '2018-08-22 01:55:43'),
(476, 'Photo/camera/Video/Audio App', 0, 'photo-camera-video-audio-app', 1, '2018-08-22 01:55:43'),
(477, 'Web Service API(PHP /MySQL/ JSON/XML/...)', 0, 'web-service-api-php-mysql-json-xml', 1, '2018-08-22 01:55:43'),
(478, 'On Page Optimization', 0, 'on-page-optimization', 1, '2018-08-22 01:55:43'),
(479, 'SEO Audit', 0, 'seo-audit', 1, '2018-08-22 01:55:43'),
(480, 'Keyword Research', 0, 'keyword-research', 1, '2018-08-22 01:55:43'),
(481, 'Responsive Web Design', 0, 'responsive-web-design', 1, '2018-08-22 01:55:43'),
(482, 'Jquery', 0, 'jquery-2', 1, '2018-08-22 01:55:43'),
(483, 'Content', 0, 'content', 1, '2018-08-22 01:55:43'),
(484, 'Content Marketing', 0, 'content-marketing', 1, '2018-08-22 01:55:43'),
(485, 'UI Design', 0, 'ui-design', 1, '2018-08-22 01:55:43'),
(486, 'UX Design', 0, 'ux-design', 1, '2018-08-22 01:55:43'),
(487, 'Cinema 4d', 0, 'cinema-4d', 1, '2018-08-22 01:55:43'),
(488, 'Software Development', 0, 'software-development', 1, '2018-08-22 01:55:43'),
(489, 'API Integration', 0, 'api-integration', 1, '2018-08-22 01:55:43'),
(490, 'CORE PHP', 0, 'core-php', 1, '2018-08-22 01:55:43'),
(491, 'HTML5', 0, 'html5', 1, '2018-08-22 01:55:43'),
(492, 'Woocommerce', 0, 'woocommerce', 1, '2018-08-22 01:55:43'),
(493, 'Yii', 0, 'yii', 1, '2018-08-22 01:55:43'),
(494, 'App Development', 0, 'app-development', 1, '2018-08-22 01:55:43'),
(495, 'Mobile Apps', 0, 'mobile-apps', 1, '2018-08-22 01:55:43'),
(496, 'Atom', 0, 'atom', 1, '2018-08-22 01:55:43'),
(497, 'ANDROID SDK', 0, 'android-sdk', 1, '2018-08-22 01:55:43'),
(498, 'GOOGLE MAP MAKER', 0, 'google-map-maker', 1, '2018-08-22 01:55:43'),
(499, 'GOOGLE MAPS API', 0, 'google-maps-api', 1, '2018-08-22 01:55:43'),
(500, 'Writer', 0, 'writer', 1, '2018-08-22 01:55:43'),
(501, 'Editor', 0, 'editor', 1, '2018-08-22 01:55:43'),
(502, 'Sports Writing', 0, 'sports-writing', 1, '2018-08-22 01:55:43'),
(503, 'Creative Writing', 0, 'creative-writing', 1, '2018-08-22 01:55:43'),
(504, 'Sales Writing', 0, 'sales-writing', 1, '2018-08-22 01:55:43'),
(505, 'Mobile App', 0, 'mobile-app', 1, '2018-08-22 01:55:43'),
(506, 'Android App Development', 0, 'android-app-development', 1, '2018-08-22 01:55:43'),
(507, 'Ios App Development', 0, 'ios-app-development', 1, '2018-08-22 01:55:44'),
(508, 'CSS3', 0, 'css3', 1, '2018-08-22 01:55:44'),
(509, 'PSD To Html', 0, 'psd-to-html', 1, '2018-08-22 01:55:44'),
(510, 'Autodesk Maya', 0, 'autodesk-maya', 1, '2018-08-22 01:55:44'),
(511, 'Email Handling', 0, 'email-handling', 1, '2018-08-22 01:55:44'),
(512, 'Virtal Assistant', 0, 'virtal-assistant', 1, '2018-08-22 01:55:44'),
(513, 'Internet Research', 0, 'internet-research', 1, '2018-08-22 01:55:44'),
(514, 'Lead Generation', 0, 'lead-generation', 1, '2018-08-22 01:55:44'),
(515, 'Blog Writing', 0, 'blog-writing', 1, '2018-08-22 01:55:44'),
(516, 'SEO Writing', 0, 'seo-writing', 1, '2018-08-22 01:55:44'),
(517, 'Speech Writing', 0, 'speech-writing', 1, '2018-08-22 01:55:44'),
(518, 'SEM', 0, 'sem', 1, '2018-08-22 01:55:44'),
(519, 'Mobile App Developers', 0, 'mobile-app-developers', 1, '2018-08-22 01:55:44'),
(521, 'App Developers', 0, 'app-developers', 1, '2018-08-22 01:55:44'),
(522, 'Front End Developer', 0, 'front-end-developer', 1, '2018-08-22 01:55:44'),
(523, 'Website', 0, 'website', 1, '2018-08-22 01:55:44'),
(524, 'React', 0, 'react', 1, '2018-08-22 01:55:44'),
(525, 'App Developer', 0, 'app-developer', 1, '2018-08-22 01:55:44'),
(526, 'Mobile App Development', 0, 'mobile-app-development', 1, '2018-08-22 01:55:44'),
(527, 'Hybrid', 0, 'hybrid', 1, '2018-08-22 01:55:44'),
(528, 'Iphone Development', 0, 'iphone-development', 1, '2018-08-22 01:55:44'),
(529, 'Mobile Development', 0, 'mobile-development', 1, '2018-08-22 01:55:44'),
(530, 'Unity3d', 0, 'unity3d', 1, '2018-08-22 01:55:44'),
(531, 'IOS Development', 0, 'ios-development', 1, '2018-08-22 01:55:44'),
(532, 'Unity 3d Development', 0, 'unity-3d-development', 1, '2018-08-22 01:55:44'),
(533, 'Logo Designing', 0, 'logo-designing', 1, '2018-08-22 01:55:44'),
(534, 'Packaging Design', 0, 'packaging-design', 1, '2018-08-22 01:55:44'),
(535, 'Branding', 0, 'branding', 1, '2018-08-22 01:55:44'),
(536, 'Digital Photography', 0, 'digital-photography', 1, '2018-08-22 01:55:44'),
(537, 'Product Development', 0, 'product-development', 1, '2018-08-22 01:55:44'),
(538, 'IPhone', 0, 'iphone', 1, '2018-08-22 01:55:44'),
(539, 'React Js', 0, 'react-js', 1, '2018-08-22 01:55:45'),
(541, 'Ipad', 0, 'ipad', 1, '2018-08-22 01:55:45'),
(542, 'Mobile App Dvelopment', 0, 'mobile-app-dvelopment', 1, '2018-08-22 01:55:45'),
(543, 'IOS Apps', 0, 'ios-apps', 1, '2018-08-22 01:55:45'),
(544, 'Shopping Carts', 0, 'shopping-carts', 1, '2018-08-22 01:55:45'),
(545, 'Shopify', 0, 'shopify', 1, '2018-08-22 01:55:45'),
(546, 'Android', 0, 'android', 1, '2018-08-22 01:55:45'),
(547, 'Google Map', 0, 'google-map', 1, '2018-08-22 01:55:45'),
(548, 'Banner Design', 0, 'banner-design', 1, '2018-08-22 01:55:45'),
(549, 'Illustrator', 0, 'illustrator', 1, '2018-08-22 01:55:45'),
(550, 'Mobile Application', 0, 'mobile-application', 1, '2018-08-22 01:55:45'),
(551, 'Hybrid App Development', 0, 'hybrid-app-development', 1, '2018-08-22 01:55:45'),
(552, 'Hybrid App', 0, 'hybrid-app', 1, '2018-08-22 01:55:45'),
(553, 'Legal', 0, 'legal', 1, '2018-08-22 01:55:45'),
(554, 'Business', 0, 'business', 1, '2018-08-22 01:55:45'),
(555, 'Bulk Marketing', 0, 'bulk-marketing', 1, '2018-08-22 01:55:45'),
(556, 'Email Marketing', 0, 'email-marketing', 1, '2018-08-22 01:55:45'),
(557, 'Internet Marketing', 0, 'internet-marketing', 1, '2018-08-22 01:55:45'),
(558, 'Marketing', 0, 'marketing', 1, '2018-08-22 01:55:45'),
(559, 'Sales', 0, 'sales', 1, '2018-08-22 01:55:45'),
(560, 'Bookkeeping', 0, 'bookkeeping', 1, '2018-08-22 01:55:46'),
(561, 'Financial Analysis', 0, 'financial-analysis', 1, '2018-08-22 01:55:46'),
(562, 'Financial Reporting', 0, 'financial-reporting', 1, '2018-08-22 01:55:46'),
(563, 'Software', 0, 'software', 1, '2018-08-22 01:55:46'),
(564, '3D Animation', 0, '3d-animation', 1, '2018-08-22 01:55:46'),
(565, '3D Modelling', 0, '3d-modelling', 1, '2018-08-22 01:55:46'),
(566, 'Unity 3D', 0, 'unity-3d', 1, '2018-08-22 01:55:46'),
(567, 'Game Development', 0, 'game-development', 1, '2018-08-22 01:55:46'),
(568, 'Creative Designer', 0, 'creative-designer', 1, '2018-08-22 01:55:46'),
(569, 'Motion Graphics', 0, 'motion-graphics', 1, '2018-08-22 01:55:46'),
(570, 'Mobile Application Development', 0, 'mobile-application-development', 1, '2018-08-22 01:55:46'),
(571, 'Application Developer', 0, 'application-developer', 1, '2018-08-22 01:55:46'),
(572, 'Mobile App Developer', 0, 'mobile-app-developer', 1, '2018-08-22 01:55:46'),
(573, 'Software Architecture', 0, 'software-architecture', 1, '2018-08-22 01:55:46'),
(574, 'Prestashop', 0, 'prestashop', 1, '2018-08-22 01:55:46'),
(575, '2D/3D Design', 0, '2d-3d-design', 1, '2018-08-22 01:55:46'),
(576, 'App Design', 0, 'app-design', 1, '2018-08-22 01:55:46'),
(577, 'Java Script', 0, 'java-script', 1, '2018-08-22 01:55:46'),
(578, 'FACEBOOK ADS', 0, 'facebook-ads', 1, '2018-08-22 01:55:46'),
(579, 'Templates', 0, 'templates', 1, '2018-08-22 01:55:46'),
(580, 'Content Writing', 0, 'content-writing', 1, '2018-08-22 01:55:46'),
(581, 'Technical Writing', 0, 'technical-writing', 1, '2018-08-22 01:55:46'),
(582, 'App Designer', 0, 'app-designer', 1, '2018-08-22 01:55:46'),
(583, 'Coral Draw', 0, 'coral-draw', 1, '2018-08-22 01:55:46'),
(584, 'Xcode', 0, 'xcode', 1, '2018-08-22 01:55:46'),
(585, 'Graphics Designer', 0, 'graphics-designer', 1, '2018-08-22 01:55:46'),
(586, 'Logos', 0, 'logos', 1, '2018-08-22 01:55:46'),
(587, 'Business Card', 0, 'business-card', 1, '2018-08-22 01:55:46'),
(588, 'Design Templates', 0, 'design-templates', 1, '2018-08-22 01:55:46'),
(589, 'Color Correction', 0, 'color-correction', 1, '2018-08-22 01:55:46'),
(590, 'Excel', 0, 'excel', 1, '2018-08-22 01:55:47'),
(591, 'Power Point Presentation', 0, 'power-point-presentation', 1, '2018-08-22 01:55:47'),
(592, 'Publishing', 0, 'publishing', 1, '2018-08-22 01:55:47'),
(593, 'Proofreading', 0, 'proofreading', 1, '2018-08-22 01:55:47'),
(594, 'Mobile App Develoment', 0, 'mobile-app-develoment', 1, '2018-08-22 01:55:47'),
(595, 'Software Testing', 0, 'software-testing', 1, '2018-08-22 01:55:47'),
(596, 'Web Hosting', 0, 'web-hosting', 1, '2018-08-22 01:55:47'),
(597, 'Web Service', 0, 'web-service', 1, '2018-08-22 01:55:47'),
(598, 'Mobile App Development Company', 0, 'mobile-app-development-company', 1, '2018-08-22 01:55:47'),
(599, 'Database Management', 0, 'database-management', 1, '2018-08-22 01:55:47'),
(600, 'resume', 0, 'resume', 0, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_testimonials`
--

CREATE TABLE `tbl_testimonials` (
  `id` bigint NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `client_name` varchar(255) DEFAULT NULL,
  `country` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `status` smallint NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `tbl_testimonials`
--

INSERT INTO `tbl_testimonials` (`id`, `title`, `description`, `client_name`, `country`, `image`, `slug`, `status`, `updated_at`) VALUES
(1, 'Wedding Photography', 'A big thank you to LS Gigger who help me to find a photographer and DJ for my function. Exceptional support from Alexandra who really put me in trust!', 'Mark Smith', 'Newyork,  USA', 'b67b236a_Mark-Smith2-300x300.png', 'wedding-photography', 1, '2020-08-31 10:39:29'),
(2, 'Car Service', 'I love the approachable best service and the fact that they provide for my service.', 'Hallen Mark', 'Sydney, Australia', '9c788abe_wommen.jpg', 'car-service', 1, '2020-08-31 10:39:29'),
(3, 'Resume Writing', 'The writer assigned to my resume did an excellent job with my resume and he  provided honest feedback and insight into why I was getting very little interest in response to my job applications.', 'Dena Marry', 'NSW, Australia', '727acdd6_test.png', 'resume-writing', 1, '2020-08-31 10:39:29'),
(4, 'Facebook Marketing', 'It\'s by far the best service that I have hire, the people that works here are very professional', 'Daniela Couttenye', 'United States', '95fe79be_acvtradeonlne_d00a-01a.jpg', 'facebook-marketing', 1, '2020-09-05 04:08:57');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` bigint NOT NULL,
  `first_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `dob` varchar(20) DEFAULT NULL,
  `gender` varchar(10) DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `profile_image` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `city` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `country_id` int DEFAULT NULL,
  `zipcode` varchar(50) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `forget_password_status` tinyint DEFAULT NULL,
  `slug` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci DEFAULT NULL,
  `status` smallint DEFAULT NULL,
  `user_status` varchar(255) DEFAULT 'Offline',
  `activation_status` smallint DEFAULT NULL,
  `last_login` bigint DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `google_id` varchar(50) DEFAULT NULL,
  `facebook_id` varchar(50) DEFAULT NULL,
  `linkedin_id` varchar(100) DEFAULT NULL,
  `unique_key` varchar(100) DEFAULT NULL,
  `description` text,
  `languages` text,
  `skills` text,
  `educations` text,
  `certifications` text,
  `paypal_email` varchar(100) DEFAULT NULL,
  `average_rating` float(10,1) NOT NULL,
  `total_review` int NOT NULL,
  `buyer_rating` float(10,2) DEFAULT NULL,
  `buyer_count` int DEFAULT NULL,
  `seller_rating` float(10,2) DEFAULT NULL,
  `seller_count` int DEFAULT NULL,
  `device_type` varchar(15) DEFAULT NULL,
  `device_id` varchar(100) DEFAULT NULL,
  `hide_weekend` tinyint NOT NULL DEFAULT '0',
  `accept_orders` tinyint NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `first_name`, `last_name`, `contact`, `dob`, `gender`, `email_address`, `password`, `profile_image`, `address`, `city`, `country_id`, `zipcode`, `forget_password_status`, `slug`, `status`, `user_status`, `activation_status`, `last_login`, `updated_at`, `google_id`, `facebook_id`, `linkedin_id`, `unique_key`, `description`, `languages`, `skills`, `educations`, `certifications`, `paypal_email`, `average_rating`, `total_review`, `buyer_rating`, `buyer_count`, `seller_rating`, `seller_count`, `device_type`, `device_id`, `hide_weekend`, `accept_orders`) VALUES
(3, 'Walt', 'Ond', '6759555555', NULL, 'Male', 'Waltond2@gmail.com', '$2y$10$Z88Qe2UXzm60OnSUDaLNSe34mU02Z0LgrQ3.2hk2ba0YmHMrKT0ui', '22432dc4_d96cf1fb_profile1.jpg', 'Mansarovar\r\nJaipur', 'Toronto', 4, '302026', NULL, 'walt', 1, 'Offline', 1, NULL, '2022-11-28 18:48:08', NULL, '113511857662946434944', NULL, NULL, 'I am software developer and trainer', '{\"spanish\":{\"lang_name\":\"Spanish\",\"lang_level\":\"Basic\"},\"urdu\":{\"lang_name\":\"Urdu\",\"lang_level\":\"Conversational\"},\"english\":{\"lang_name\":\"English\",\"lang_level\":\"Fluent\"},\"hindi\":{\"lang_name\":\"Hindi\",\"lang_level\":\"Fluent\"},\"urdu_83\":{\"lang_name\":\"urdu\",\"lang_level\":\"Fluent\"}}', '518,109,441,296,460,482,2', '{\"it\":{\"country_name\":\"India\",\"university_name\":\"Kota University\",\"qual_name\":\"B.E.\",\"stream_name\":\"IT\",\"year\":\"2016\"},\"law\":{\"country_name\":\"India\",\"university_name\":\"DU\",\"qual_name\":\"LLB\",\"stream_name\":\"Law\",\"year\":\"2018\"}}', '{\"php_serctificate\":{\"certificate_name\":\"PHP Serctificate\",\"certificate_from\":\"Adobe\",\"year\":\"2018\"},\"java\":{\"certificate_name\":\"Java\",\"certificate_from\":\"Oracle Certified\",\"year\":\"2017\"},\"test\":{\"certificate_name\":\"test\",\"certificate_from\":\"test\",\"year\":\"2019\"}}', NULL, 4.5, 1, 4.50, 0, 4.50, 1, 'Android', '', 0, 1),
(4, 'Mark', 'David', '98574635241', NULL, 'Male', 'mark123@gmail.com', '$2y$10$9/QEeIkI7BIBJ2vGfEsjd.zf6atVuEAa9QZntnD0hbt7TEhfLZrNa', '53c18be9_pexels-photo-220453.jpeg', 'test', 'London', 4, 'BF1 AT', NULL, 'mark', 1, 'Online', 1, NULL, '2022-08-16 12:48:11', '', '113511857662946434944', NULL, NULL, 'I am Ad-words and DoubleClick qualified and I have experience in getting the very best out of PPC campaigns. I am a firm believer that clients need to trust that their campaigns are in good hands and the most effective way to this is to ensure that they are informed at regular times of the performance of their ad campaign. I have deep links within the PPC industry which means I am kept up to date, often quicker than the majority. This means I can keep my clients campaigns ahead of the curve and performing at their very best.', '{\"english\":{\"lang_name\":\"English\",\"lang_level\":\"Fluent\"},\"frensh\":{\"lang_name\":\"Frensh\",\"lang_level\":\"Fluent\"},\"punjabi\":{\"lang_name\":\"Punjabi\",\"lang_level\":\"Fluent\"}}', '575,460,175,27,546,88,186,469,430,575,564', '{\"computer\":{\"country_name\":\"Canada\",\"university_name\":\"University of Alberta\",\"qual_name\":\"B.Arch.\",\"stream_name\":\"Computer\",\"year\":\"2015\"},\"ti\":{\"country_name\":\"Canada\",\"university_name\":\"University of Alberta\",\"qual_name\":\"B.E.\",\"stream_name\":\"TI\",\"year\":\"2018\"}}', '{\"google_ads_certfied\":{\"certificate_name\":\"Google Ads Certfied\",\"certificate_from\":\"Google\",\"year\":\"2018\"}}', 'test@test.com', 4.5, 4, 5.00, 1, 4.00, 3, 'iphone', '88BCF06AA43AD650D0279E15BB80FAEDAFFAB274DAF0D7BB2EF80605D8BCB6E3', 0, 1),
(21, '', '', NULL, NULL, NULL, 'santosh.mittal@logicspice.com', '$2y$10$ghWyZy34uNqWPOhrA4k9u.UEHiekZJxNTKMFXZyBHPbx6wb9ErV1e', NULL, NULL, NULL, NULL, NULL, NULL, '', 1, 'Offline', 1, NULL, '0000-00-00 00:00:00', '110054605910799068871', '', '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0),
(22, 'Ritesh', 'Hirapara', '9874561231', NULL, 'Male', 'ritesh@gmail.com', '$2y$10$r8rPcIkV7thSL9ubIM0r2.01.Sc1xfQrvFyH5uQFppNRj5vA1XOVi', '22432dc4_d96cf1fb_profile1.jpg', 'Surat', 'Gujarat', 8, '302026', NULL, 'ritesh-hirapara', 1, 'Online', 1, NULL, '2023-02-27 01:59:06', NULL, NULL, NULL, '606a6193412cc755d367252ecfa9f7c418e3bdfdf34040f577', 'I am software developer and trainer', '{\"spanish\":{\"lang_name\":\"Spanish\",\"lang_level\":\"Basic\"},\"urdu\":{\"lang_name\":\"Urdu\",\"lang_level\":\"Conversational\"},\"english\":{\"lang_name\":\"English\",\"lang_level\":\"Fluent\"},\"hindi\":{\"lang_name\":\"Hindi\",\"lang_level\":\"Fluent\"},\"urdu_83\":{\"lang_name\":\"urdu\",\"lang_level\":\"Fluent\"}}', '518,109,441,296,460,482,2', '{\"it\":{\"country_name\":\"India\",\"university_name\":\"Kota University\",\"qual_name\":\"B.E.\",\"stream_name\":\"IT\",\"year\":\"2016\"},\"law\":{\"country_name\":\"India\",\"university_name\":\"DU\",\"qual_name\":\"LLB\",\"stream_name\":\"Law\",\"year\":\"2018\"}}', '{\"php_serctificate\":{\"certificate_name\":\"PHP Serctificate\",\"certificate_from\":\"Adobe\",\"year\":\"2018\"},\"java\":{\"certificate_name\":\"Java\",\"certificate_from\":\"Oracle Certified\",\"year\":\"2017\"},\"test\":{\"certificate_name\":\"test\",\"certificate_from\":\"test\",\"year\":\"2019\"}}', NULL, 0.0, 0, NULL, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_wallets`
--

CREATE TABLE `tbl_wallets` (
  `id` int NOT NULL,
  `type` int DEFAULT NULL,
  `add_minus` int NOT NULL DEFAULT '0',
  `user_id` int NOT NULL,
  `service_id` int DEFAULT NULL,
  `gig_id` int DEFAULT NULL,
  `amount` int NOT NULL,
  `revenue` float(12,2) DEFAULT NULL,
  `admin_commission` float(12,2) DEFAULT NULL,
  `commission_admin` float(12,2) DEFAULT NULL,
  `trn_id` varchar(20) NOT NULL,
  `slug` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `source` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_general_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_wallets`
--

INSERT INTO `tbl_wallets` (`id`, `type`, `add_minus`, `user_id`, `service_id`, `gig_id`, `amount`, `revenue`, `admin_commission`, `commission_admin`, `trn_id`, `slug`, `created_at`, `updated_at`, `source`, `status`) VALUES
(8, 0, 1, 4, 4, NULL, 160, 144.00, 16.00, NULL, '2018112106F33778C1', '525754d6a40f553390f2cbd71ff14366bc049156', '2018-11-21 09:39:02', '0000-00-00 00:00:00', 'From Request: <b>Experienced craigslist Ad poster Needed Urgently</b>', 1),
(5, 6, 1, 4, NULL, 13, 33, 30.00, 3.00, NULL, '86R17702YP212370M', '58f6defe770d11849c9573261420354d25477bfa', '2018-09-28 13:13:42', '0000-00-00 00:00:00', 'From Gig: <b>I will record you professional electric guitar tracks</b>', 1),
(6, 6, 1, 3, NULL, 12, 44, 40.00, 4.00, NULL, '6DS5665110630733E', 'ecbb022d3b19ecabfb5c1e0c98c55685ea87bf98', '2018-09-28 13:17:49', '0000-00-00 00:00:00', 'From Gig: <b>I will create custom responsive HTML website designs</b>', 1),
(9, 0, 1, 3, 3, NULL, 35, 31.50, 3.50, NULL, '2018112311623E738A', 'a3b1cda6a43644d77dc88a0f5877c3ba11a8b13a', '2018-11-23 04:50:47', '0000-00-00 00:00:00', 'From Request: <b>We need a devlopment php app</b>', 1),
(10, 3, 0, 3, 0, NULL, 50, -50.00, 0.00, NULL, '20190903WT43A46215', 'e4068bcb029b412711d0b504b2e8721198ee7705', '2019-09-03 15:48:33', '2019-09-03 15:48:33', 'Withdraw Amount</b>', 1),
(12, 5, 0, 3, NULL, 7, 17, -16.50, 0.00, NULL, 'AC91A38BAF18625C', 'cfeea15361908768334d5bc91048a8e3e6d1cc5b', '2018-12-17 05:29:39', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(15, 6, 1, 3, NULL, 24, 55, 50.00, 5.00, NULL, '8C3A770067DE4385', '7a74b0ca65bbecdfcdfda89bd194ca2b41dd4568', '2018-12-20 04:30:54', '0000-00-00 00:00:00', 'From Gig: <b>hdg  tdhgcj</b>', 1),
(16, 5, 0, 4, NULL, 24, 55, -55.00, 0.00, NULL, '8C3A770067DE4385', 'bf68f0f29f770bc0e1c189fd0f9fff8d6cc3e2e6', '2018-12-20 04:30:54', '0000-00-00 00:00:00', 'Pay for Gig: <b>hdg  tdhgcj</b>', 1),
(18, 5, 0, 4, NULL, 16, 18, -18.00, 2.25, NULL, '2D9D7F06986775F9', '8bbcc895491c75342c7386449a46df1911748076', '2019-01-24 05:04:07', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(20, 5, 0, 4, NULL, 16, 54, -54.00, 6.75, NULL, 'D85C1D264082160D', 'a2187abadc558e9acf7f6921d26ff9aae8ef7e25', '2019-01-24 05:09:45', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(23, 5, 0, 4, NULL, 16, 18, -18.00, 2.25, NULL, '346ADF68CD67F14D', '35487dc7136efae75c38b36124d73aa7860c4d65', '2019-01-24 05:54:54', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(25, 5, 0, 4, NULL, 16, 18, 15.00, 0.00, NULL, '621C6FF0F69A454A', '58c2930d19bbb6b2a2899e74df5f7a4f7bb85c19', '2019-01-24 06:04:28', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(26, 6, 1, 4, NULL, 11, 12, 8.50, 1.50, NULL, 'TT456456456', '2b18858336c616ed0fadef791ac89381217d428f', '2019-07-19 08:00:24', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(27, 6, 1, 4, NULL, 11, 12, 8.50, 1.50, NULL, 'TT456456456', '25df734bc159ac323ec4c59c31367b98c505b907', '2019-07-19 08:00:52', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(29, 5, 0, 3, NULL, 2, 18, 18.00, 0.00, NULL, '4342B511BA93E00A', '215053947f5f756fa8aaec9e7038a9d49dec36ea', '2019-08-30 08:00:20', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(31, 5, 0, 3, NULL, 3, 12, 12.00, 0.00, NULL, 'C8BB4F489E97CAF2', '30b7604fd51248b7f3a3db0f0c35e211c271a9a6', '2019-09-03 15:45:25', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(32, 6, 1, 4, NULL, 34, 60, 42.50, 10.00, 7.50, '24F0E7EFE743C405', '3174351d6c76fe6dcd2e7f3fec14bfbc7ca80251', '2019-09-05 18:53:01', '0000-00-00 00:00:00', 'From Gig: <b>54656</b>', 1),
(33, 5, 0, 3, NULL, 34, 60, 60.00, 0.00, NULL, '24F0E7EFE743C405', 'b00617290a095fe782ffc1c564cfeb6635617d7e', '2019-09-05 18:53:01', '0000-00-00 00:00:00', 'Pay for Gig: <b>54656</b>', 1),
(34, 6, 1, 4, NULL, 38, 6, 4.25, 0.75, NULL, '7E162318MV7995340', '86dc31d35f3608bebe85760d613adb0e9014af33', '2019-09-06 04:30:38', '0000-00-00 00:00:00', 'From Gig: <b>Vou fazer uma Linda Intro!</b>', 1),
(35, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20191122WT0628BB58', '7a8cbf60317b9fc58ae07a8246c9f61081356c16', '2019-11-22 18:49:12', '2019-11-22 18:49:12', 'Withdraw Amount</b>', 1),
(36, 6, 1, 3, NULL, 42, 0, 0.00, 0.00, 0.00, 'tokencc_bd_hbtm6c_6d', 'ee28230af19e30cbed0df60a071adda84334c3ed', '2019-09-24 04:09:39', '0000-00-00 00:00:00', 'From Gig: <b>This is test gig</b>', 1),
(38, 6, 1, 3, NULL, 26, 0, 0.00, 0.00, 0.00, '5A41FEB05BB80806', 'fab28c3d4e45ea90ad38831482364b6d1cc6053e', '2019-09-25 09:54:56', '0000-00-00 00:00:00', 'From Gig: <b>I will write SEO friendly content for a Website</b>', 1),
(42, 5, 0, 3, NULL, 16, 18, 18.00, 0.00, NULL, '062106103F50EBB2', 'e4959f9bbaed9225cc4b429197a6f24d5bbbae9d', '2019-10-08 18:22:57', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(43, 6, 1, 4, NULL, 11, 12, 10.00, 2.00, 0.00, '31DB61B3D651E3C1', '655e47e940471fc7af813b8c698fb077e3ac79b8', '2019-10-16 16:56:11', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(44, 5, 0, 3, NULL, 11, 12, 12.00, 0.00, NULL, '31DB61B3D651E3C1', '2d3b575d89babec20b5051eba7e4100439d72564', '2019-10-16 16:56:11', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design your professional wix website</b>', 1),
(47, 6, 1, 3, NULL, 23, 6, 5.00, 1.00, 0.00, '735DACCF707E777C', '77a1b374badb64a0032ab0f3e1efc63a42bc7e81', '2019-12-09 18:11:30', '0000-00-00 00:00:00', 'From Gig: <b>PHP developer</b>', 1),
(48, 5, 0, 4, NULL, 23, 6, 6.00, 0.00, NULL, '735DACCF707E777C', '65b1840a9f3c68229691028862cde7417623d5c6', '2019-12-09 18:11:30', '0000-00-00 00:00:00', 'Pay for Gig: <b>PHP developer</b>', 1),
(50, 5, 0, 3, NULL, 2, 24, 24.00, 0.00, NULL, 'CC0B92F1C7E47107', 'bcab634e5c0969e1ecc518c614d55833e7252f20', '2019-12-25 06:45:13', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will do a professional audit of your instagram account</b>', 1),
(93, 5, 0, 3, NULL, 3, 82, -82.50, 0.00, NULL, 'FFDA4E22410FC336', '2b20d26e3cd9d6d7c9cd131534dea49d7dc5300f', '2020-07-30 09:02:21', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(54, 5, 0, 3, NULL, 7, 18, 18.00, 0.00, NULL, '5D2DB3DFCE51F3E5', 'cc1d9c2cb3e7eb9d2759abba5812ba5cf5f8caca', '2020-01-15 15:56:38', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(56, 5, 0, 3, NULL, 3, 48, 48.00, 0.00, NULL, '048785A3DC7394D6', 'e2bf0d76ab7f204cf3c02a9d1a85fa2655bf6a82', '2020-01-20 08:14:05', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(58, 5, 0, 4, NULL, 5, 30, 30.00, 0.00, NULL, '5DFF1079A4F114C8', '218e90d3a84ba3800c56ac12db2c6d36f0e8e466', '2020-01-20 15:40:55', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will make stupendous 3d logo with copyrights</b>', 1),
(59, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200324WTE1B0CF0A', '4c5a5a95f26657d46b8bb5a7d2b10f3765b1bf5a', '2020-03-24 17:09:17', '2020-03-24 17:09:17', 'Withdraw Amount</b>', 1),
(61, 5, 0, 4, NULL, 3, 48, 48.00, 0.00, NULL, '430EE67CF68E6C7E', '74e288a21078f84c3edb8efe7fa122da9c1e0da9', '2020-02-03 17:40:47', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(63, 5, 0, 3, NULL, 3, 12, 12.00, 0.00, NULL, 'C41DFD385EC903BE', 'a218d23520d28eb3648c5bbbbdb8b0f0eea6b86c', '2020-02-15 05:50:36', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(66, 5, 0, 3, NULL, 6, 18, 18.00, 0.00, NULL, '08600F02E29A52FB', 'cb97460884193144f3c491b59c2ff3f612647295', '2020-03-26 12:32:36', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will produce beautiful food photography for your brand</b>', 1),
(67, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200327WT31774394', '01688cba9bd6ce07490d140c6b890c5c8e6a7040', '2020-03-27 22:37:50', '2020-03-27 22:37:50', 'Withdraw Amount</b>', 1),
(69, 5, 0, 3, NULL, 3, 12, 12.00, 0.00, NULL, '92F53183E4B1FA8E', '6cb5556e76f98cb03a156cec013d35ad99b8de51', '2020-03-27 22:27:10', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(71, 5, 0, 3, NULL, 16, 18, 18.00, 0.00, NULL, '0E8E001729560C1D', '1587418b449c3cae6ff985e687035adb4abd2fe5', '2020-03-29 18:56:39', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will write killer sales pages that explode profits</b>', 1),
(73, 5, 0, 4, NULL, 3, 12, 12.00, 0.00, NULL, '161C916C93707FA7', 'eb0ce3131b274a7497130bd03821b3b17e305712', '2020-04-06 18:46:41', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will be your social media marketing manager</b>', 1),
(75, 5, 0, 3, NULL, 7, 18, 18.00, 0.00, NULL, '62B21DF710228A8A', '0f440bb06615be5f0adde6ace45a83b0a70a5f6a', '2020-04-10 15:07:20', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will design and edit your cv, cover letter, and linkedin profile</b>', 1),
(77, 5, 0, 4, NULL, 115, 6, 6.00, 0.00, NULL, '763898AEF4311940', 'fe66c8a430d360aea0ef9ccc7090ccb50fb1ebfa', '2020-04-12 02:24:49', '0000-00-00 00:00:00', 'Pay for Gig: <b>Marki</b>', 1),
(83, 5, 0, 4, NULL, 122, 6, 6.00, 0.00, NULL, '9CA688A30509F9A9', '7647384d6d81db6e66e6cbd714494869b1c35e60', '2020-04-14 01:47:07', '0000-00-00 00:00:00', 'Pay for Gig: <b>I will do ui design for web and mobile device within 24 hours a day</b>', 1),
(84, 5, 0, 4, NULL, 115, 6, -5.50, 0.00, NULL, '29191A0245D82F78', 'e194f695f9a061483d284c7201cfe2c0ad96aa4c', '2020-04-28 23:07:26', '0000-00-00 00:00:00', 'Pay for Gig: <b>Marki</b>', 1),
(85, 6, 1, 3, NULL, 1, 22, 2.40, 2.00, 17.60, 'tokencc_bh_5bzkwc_t2', 'b32ce409b4a76d6f115681fde275f48b3becae96', '2020-05-01 05:15:34', '0000-00-00 00:00:00', 'From Gig: <b>I will write SEO friendly content for a Website</b>', 1),
(106, 6, 1, 4, NULL, 11, 12, 10.00, 0.00, NULL, '31DB61B3D651E3C1', 'df435cbc91e22a5fb3a21803cf2ef19ca0edb62b', '2022-08-16 13:10:46', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(101, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200920WTDA9C9423', '15f8cd972c7cbf9c17681ac89990d61f81f2519e', '2020-09-20 18:22:43', '2020-09-20 18:22:43', 'Withdraw Amount</b>', 1),
(102, 2, 0, 4, 0, NULL, 10, -10.00, 0.00, NULL, '', '671a696aae29aae1d1ca2efd51d845a86e490c5c', '2020-09-21 10:10:19', '0000-00-00 00:00:00', 'Withdraw Amount</b>', 0),
(90, 3, 0, 4, 0, NULL, 47, -47.00, 0.00, NULL, '20200620WTEB8B97AB', '58ae01bdaa9a8dca1d5f884d2bfa84e72efeffe7', '2020-06-20 06:13:12', '2020-06-20 06:13:12', 'Withdraw Amount</b>', 1),
(94, 6, 1, 4, NULL, 234, 16, 15.00, 13.20, NULL, '7E177665AV637862B', 'b6cd35f9bc5f2d2f944754dd69086fddf48ed364', '2020-09-04 13:27:38', '0000-00-00 00:00:00', 'From Gig: <b>I will provide professional format CV</b>', 1),
(95, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200904WTA3DA050E', '373c97453c51518b3421dc607253f5add1c52c13', '2020-09-04 13:59:40', '2020-09-04 13:59:40', 'Withdraw Amount</b>', 1),
(96, 6, 1, 4, NULL, 234, 16, 15.00, 13.20, NULL, '30S39144DG084864V', '1e536f4d28155299c1685889fd574cbc62480b6a', '2020-09-05 03:57:46', '0000-00-00 00:00:00', 'From Gig: <b>I will provide professional format CV</b>', 1),
(97, 3, 0, 3, 0, NULL, 10, -10.00, 0.00, NULL, '20200905WT4F39CD0B', '2a1eb5136363d2e045bfb6c383582b07b2063aca', '2020-09-05 04:03:23', '2020-09-05 04:03:23', 'Withdraw Amount</b>', 1),
(105, 6, 1, 3, NULL, 229, 16, 1.80, 13.20, NULL, '7VN069142J661341R', '99097776e7ee491e567abfc3685dd69e3c82111d', '2022-08-16 13:10:23', '0000-00-00 00:00:00', 'From Gig: <b>I will mixing and master your song</b>', 1),
(99, 6, 1, 4, NULL, 11, 12, 10.00, 0.00, NULL, '31DB61B3D651E3C1', '6794c6e3a2fb3ba366d14cf104352e7f0254246b', '2020-09-08 06:04:37', '0000-00-00 00:00:00', 'From Gig: <b>I will design your professional wix website</b>', 1),
(100, 3, 0, 4, 0, NULL, 10, -10.00, 0.00, NULL, '20200917WTD5DB43D5', 'b01446c508f1c84b2e29586b0827b28f08f991f1', '2020-09-17 13:39:22', '2020-09-17 13:39:22', 'Withdraw Amount</b>', 1),
(103, 6, 1, 3, NULL, 226, 16, 15.00, 13.20, NULL, '5TK558810W8182348', 'de78ce3d771cca4cba3afc83cfeffbce54cee7c4', '2020-10-26 12:02:51', '0000-00-00 00:00:00', 'From Gig: <b>we will car services</b>', 1),
(104, 6, 1, 4, NULL, 234, 16, 15.00, 13.20, NULL, '7E177665AV637862B', '7cf9a85f60a9198deb42a5d3b5365bb286ab6ab3', '2020-10-28 16:38:56', '0000-00-00 00:00:00', 'From Gig: <b>I will provide professional format CV</b>', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_emailtemplates`
--
ALTER TABLE `tbl_emailtemplates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gigextras`
--
ALTER TABLE `tbl_gigextras`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gigfaqs`
--
ALTER TABLE `tbl_gigfaqs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gigmessages`
--
ALTER TABLE `tbl_gigmessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gigrequirements`
--
ALTER TABLE `tbl_gigrequirements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_gigs`
--
ALTER TABLE `tbl_gigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_images`
--
ALTER TABLE `tbl_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `church_id` (`gig_id`),
  ADD KEY `ticket_id` (`gig_id`),
  ADD KEY `ad_id` (`gig_id`);

--
-- Indexes for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_myorders`
--
ALTER TABLE `tbl_myorders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_pdfs`
--
ALTER TABLE `tbl_pdfs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `church_id` (`gig_id`),
  ADD KEY `ticket_id` (`gig_id`),
  ADD KEY `ad_id` (`gig_id`);

--
-- Indexes for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_savedgigs`
--
ALTER TABLE `tbl_savedgigs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_servicemessages`
--
ALTER TABLE `tbl_servicemessages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_servicesoffers`
--
ALTER TABLE `tbl_servicesoffers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_wallets`
--
ALTER TABLE `tbl_wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admins`
--
ALTER TABLE `tbl_admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_banners`
--
ALTER TABLE `tbl_banners`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `tbl_carts`
--
ALTER TABLE `tbl_carts`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_categories`
--
ALTER TABLE `tbl_categories`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `tbl_countries`
--
ALTER TABLE `tbl_countries`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=298;

--
-- AUTO_INCREMENT for table `tbl_emailtemplates`
--
ALTER TABLE `tbl_emailtemplates`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_gigextras`
--
ALTER TABLE `tbl_gigextras`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `tbl_gigfaqs`
--
ALTER TABLE `tbl_gigfaqs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=112;

--
-- AUTO_INCREMENT for table `tbl_gigmessages`
--
ALTER TABLE `tbl_gigmessages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_gigrequirements`
--
ALTER TABLE `tbl_gigrequirements`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=249;

--
-- AUTO_INCREMENT for table `tbl_gigs`
--
ALTER TABLE `tbl_gigs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=269;

--
-- AUTO_INCREMENT for table `tbl_images`
--
ALTER TABLE `tbl_images`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT for table `tbl_messages`
--
ALTER TABLE `tbl_messages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT for table `tbl_myorders`
--
ALTER TABLE `tbl_myorders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `tbl_notifications`
--
ALTER TABLE `tbl_notifications`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_pages`
--
ALTER TABLE `tbl_pages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_payments`
--
ALTER TABLE `tbl_payments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbl_pdfs`
--
ALTER TABLE `tbl_pdfs`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tbl_qualifications`
--
ALTER TABLE `tbl_qualifications`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `tbl_reviews`
--
ALTER TABLE `tbl_reviews`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tbl_savedgigs`
--
ALTER TABLE `tbl_savedgigs`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_servicemessages`
--
ALTER TABLE `tbl_servicemessages`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `tbl_servicesoffers`
--
ALTER TABLE `tbl_servicesoffers`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_skills`
--
ALTER TABLE `tbl_skills`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=601;

--
-- AUTO_INCREMENT for table `tbl_testimonials`
--
ALTER TABLE `tbl_testimonials`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` bigint NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `tbl_wallets`
--
ALTER TABLE `tbl_wallets`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
