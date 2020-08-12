-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql108.epizy.com
-- Generation Time: Aug 11, 2020 at 08:36 AM
-- Server version: 5.6.48-88.0
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `epiz_26275616_contest`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_register`
--

CREATE TABLE `admin_register` (
  `id` int(11) NOT NULL,
  `admin_name` varchar(200) NOT NULL,
  `admin_login` varchar(200) NOT NULL,
  `admin_pass` varchar(200) NOT NULL,
  `admin_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `admin_status` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `admin_email` varchar(200) NOT NULL,
  `type` varchar(200) NOT NULL,
  `ipadd` text NOT NULL,
  `admin_date` datetime NOT NULL,
  `admin_city` varchar(200) NOT NULL,
  `admin_state` varchar(200) NOT NULL,
  `admin_country` varchar(200) NOT NULL,
  `admin_bio` varchar(200) NOT NULL,
  `admin_image` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `answere`
--

CREATE TABLE `answere` (
  `id` int(11) NOT NULL,
  `user_ans` double NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_image` varchar(200) NOT NULL,
  `user_login` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL,
  `ipadd` text NOT NULL,
  `ans_linkid` varchar(200) NOT NULL,
  `ans_cat` varchar(200) NOT NULL,
  `user_unique_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `answere`
--

INSERT INTO `answere` (`id`, `user_ans`, `user_email`, `user_id`, `user_name`, `user_image`, `user_login`, `user_type`, `ipadd`, `ans_linkid`, `ans_cat`, `user_unique_id`) VALUES
(3, 67, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '103.25.250.230', '15f1045bce2279', 'Daily Math Challenge', '15f0c17af2e6c9'),
(4, 67, 'sagor89070@gmail.com', 3157, 'sagor', '', 'sagor89070@gmail.com', 'user', '108.162.215.197', '15f1045bce2279', 'Daily Math Challenge', '15f1119ee2bf8a'),
(5, 67, 'ahmeedkawsaar@gmail.com', 3158, 'Kawsar Ahmed', '', 'ahmeedkawsaar@gmail.com', 'user', '172.69.33.132', '15f1045bce2279', 'Daily Math Challenge', '15f111a703f52a'),
(6, 29, 'sagor89070@gmail.com', 3157, 'sagor', '', 'sagor89070@gmail.com', 'user', '108.162.215.191', '15f11205fe922d', 'Daily Math Challenge', '15f1119ee2bf8a'),
(7, -29, 'sagor89070@gmail.com', 3157, 'sagor', '', 'sagor89070@gmail.com', 'user', '172.69.34.215', '15f11205fe922d', 'Daily Math Challenge', '15f1119ee2bf8a'),
(8, -29, 'Mohammadalam7577@gmail.com', 3159, 'Imtiaz IsrakAlam  ', '', 'Mohammadalam7577@gmail.com', 'user', '162.158.207.137', '15f11205fe922d', 'Daily Math Challenge', '15f113c6870ed6'),
(9, 67, 'habib@gmail.com', 3161, 'habib', '', 'habib@gmail.com', 'user', '162.158.207.135', '15f1045bce2279', 'Daily Math Challenge', '15f12b700c30b5'),
(10, -29, 'habib@gmail.com', 3161, 'habib', '', 'habib@gmail.com', 'user', '162.158.207.135', '15f11205fe922d', 'Daily Math Challenge', '15f12b700c30b5'),
(11, -29, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '162.158.158.102', '15f11205fe922d', 'Daily Math Challenge', '15f0c17af2e6c9'),
(12, -29, 'mdmonjurul369@gmail.com', 3162, 'Monjurul', '', 'mdmonjurul369@gmail.com', 'user', '172.69.34.201', '15f11205fe922d', 'Daily Math Challenge', '15f12bc2b43662'),
(13, 30, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '162.158.159.125', '15f131b7b4932e', 'Daily Math Challenge', '15f0c17af2e6c9'),
(14, 287566, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '162.158.154.34', '15f13b0c84f2d1', 'Weekly Math Challenge', '15f0c17af2e6c9'),
(15, 0, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '162.158.207.135', '15f1510d73e0d5', 'Daily Math Challenge', '15f0c17af2e6c9'),
(16, -1, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '172.69.135.97', '15f16f4a3175d5', 'Daily Math Challenge', '15f0c17af2e6c9');

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_category`
--

INSERT INTO `blog_category` (`id`, `cat_name`, `cat_status`) VALUES
(1, 'Math', 'Publish'),
(2, 'Science', 'Publish'),
(3, 'Programming', 'Publish'),
(4, 'Tech', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `post_id` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_description` varchar(200) NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `user_email` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `blog_name` varchar(200) DEFAULT NULL,
  `blog_category` varchar(200) DEFAULT NULL,
  `blog_id` varchar(200) DEFAULT NULL,
  `blog_author_id` varchar(200) DEFAULT NULL,
  `blog_tag` text,
  `blog_author` varchar(200) NOT NULL,
  `blog_status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `blog_title`, `blog_description`, `blog_date`, `user_email`, `image`, `blog_name`, `blog_category`, `blog_id`, `blog_author_id`, `blog_tag`, `blog_author`, `blog_status`, `created_at`) VALUES
(2, 'How to write a good article', 'Today we will learn how to write own article', '2020-08-11 14:04:24', 'sojebsikder@gmail.com', NULL, 'good-article', 'Science', '321212121', '15e33e46e4a171', NULL, 'sojebsikder', 'Publish', '2020-08-11 14:10:15'),
(10, 'Learn calculas', '<h1>Welcome to Tutorial</h1><p><span style=\"background-color: rgb(255, 0, 0);\">Tutorial</span> begin</p>', '2020-08-11 14:04:29', 'sojebsikder@gmail.com', NULL, 'Learn-calculas', 'Math', '15f2fd76c29729', '15e33e46e4a171', 'calculas, math', 'sojebsikder', 'Publish', '2020-08-11 14:10:15');

-- --------------------------------------------------------

--
-- Table structure for table `blog_reply`
--

CREATE TABLE `blog_reply` (
  `id` int(11) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `comment_id` varchar(200) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cat_status`) VALUES
(1, 'Daily Math Challenge', 'Publish'),
(2, 'Weekly Math Challenge', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `mobile` varchar(200) DEFAULT NULL,
  `subject` varchar(200) NOT NULL,
  `message` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `ins_name` varchar(200) NOT NULL,
  `ins_login` varchar(200) NOT NULL,
  `ins_pass` varchar(200) NOT NULL,
  `ins_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `ins_status` varchar(200) NOT NULL,
  `ins_display_name` varchar(200) NOT NULL,
  `ins_email` varchar(200) NOT NULL,
  `ins_type` varchar(200) NOT NULL,
  `ipadd` text NOT NULL,
  `ins_city` varchar(200) DEFAULT NULL,
  `ins_state` varchar(200) DEFAULT NULL,
  `ins_country` varchar(200) DEFAULT NULL,
  `ins_bio` varchar(200) DEFAULT NULL,
  `ins_image` varchar(200) DEFAULT NULL,
  `ins_user_id` varchar(200) NOT NULL,
  `ins_role` varchar(200) DEFAULT NULL,
  `ins_date` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `ins_name`, `ins_login`, `ins_pass`, `ins_registered`, `ins_status`, `ins_display_name`, `ins_email`, `ins_type`, `ipadd`, `ins_city`, `ins_state`, `ins_country`, `ins_bio`, `ins_image`, `ins_user_id`, `ins_role`, `ins_date`) VALUES
(1, 'sojebsikder', 'sojebsikder@gmail.com', 'c0035b21cc82f4cc08b169ba252458d3', '2020-07-16 11:16:17', 'active', 'sojebsikder', 'sojebsikder@gmail.com', 'instructor', '::1', 'Gazipur', 'Dhaka', 'Bangladesh', 'I\'m Programmer', 'img/profile/Assassins_Creed_4-wallpaper-9669711.jpg1594462503-3794-Assassins_Creed_4-wallpaper-9669711.jpg', '15e33e46e4a171', 'admin', '2020-05-11'),
(13, 'Kawsar Ahmed', 'kawsaaraahmed@gmail.com', '3f6325e1e4665fa64374fb7bd6ed19eb', '2020-07-17 03:27:16', 'active', 'Kawsar Ahmed', 'kawsaaraahmed@gmail.com', 'instructor', '172.69.33.132', NULL, NULL, NULL, NULL, NULL, '15f111a0893d93', NULL, NULL),
(14, 'Sagor Ahmed', 'sagor89070@gmail.com', '356823e0fc7007a32387665623983568', '2020-07-17 03:51:13', 'active', 'Sagor Ahmed', 'sagor89070@gmail.com', 'instructor', '172.69.34.143', NULL, NULL, NULL, NULL, NULL, '15f111f86f22dd', NULL, NULL),
(15, 'Abrar Shahriar', 'shariarpritom76@gmail.com', 'af68e18ef89dc88c5a08046703c3d1ce', '2020-07-17 07:29:53', 'active', 'Abrar Shahriar', 'shariarpritom76@gmail.com', 'instructor', '162.158.207.135', NULL, NULL, NULL, NULL, NULL, '15f114fda9d69e', NULL, NULL),
(16, 'Monjurul', 'mdmonjurul369@gmail.com', '32eafac15563f85e2ec1f1a8171bb3bf', '2020-07-18 09:40:38', 'active', 'Monjurul', 'mdmonjurul369@gmail.com', 'instructor', '172.69.34.201', NULL, NULL, NULL, NULL, NULL, '15f12bd130e7fb', NULL, NULL),
(17, 'Dishan Nahiyan Abir', 'gdboydark212@gmail.com', '30232c4feaa1aa12a6589546ebb0e5d0', '2020-07-18 14:13:25', 'active', 'Dishan Nahiyan Abir', 'gdboydark212@gmail.com', 'instructor', '162.158.159.75', NULL, NULL, NULL, NULL, NULL, '15f1302c384173', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `points` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `user_email`, `user_id`, `points`) VALUES
(2, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '15'),
(3, 'sagor89070@gmail.com', '15f1119ee2bf8a', '6'),
(4, 'ahmeedkawsaar@gmail.com', '15f111a703f52a', '2'),
(5, 'Mohammadalam7577@gmail.com', '15f113c6870ed6', '2'),
(6, 'habib@gmail.com', '15f12b700c30b5', '4'),
(7, 'mdmonjurul369@gmail.com', '15f12bc2b43662', '2');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_name` text NOT NULL,
  `type` text NOT NULL,
  `message` text NOT NULL,
  `status` text NOT NULL,
  `date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `username` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `b_number` varchar(200) NOT NULL,
  `b_trans` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `product_id` varchar(200) NOT NULL,
  `useremail` varchar(200) NOT NULL,
  `via` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `date`, `username`, `status`, `b_number`, `b_trans`, `user_id`, `product_id`, `useremail`, `via`) VALUES
(1, 'PHP Tutorial PDF Book', '2020-07-15', 'sojebsikder', 1, '01833962595', ' ttttfcgg', '15e33e46e4a171', '15f0aaeaa7d578', 'sojebsikder@gmail.com', 'sojebsikder@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `orders_detail`
--

CREATE TABLE `orders_detail` (
  `id` int(11) NOT NULL,
  `orders_id` int(11) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `quantity` int(11) NOT NULL,
  `product_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `price`, `quantity`, `product_id`) VALUES
(1, 1, '90', 1, '15f0aaeaa7d578');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(11) NOT NULL,
  `perm_desc` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_author` varchar(200) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `post_content` varchar(200) NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `problem` varchar(200) NOT NULL,
  `post_ans` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_author`, `post_date`, `post_modified`, `post_content`, `post_image`, `category`, `problem`, `post_ans`) VALUES
(6, 'Problem 1', 'sojebsikder', '2020-07-16 12:21:20', '2020-07-16 12:21:20', 'Answer Only In English', 'img/post_image/Logopit_1594901786375-01.jpeg1594901948-5286-Logopit_1594901786375-01.jpeg', 'Daily Math Challenge', '15f1045bce2279', 67),
(7, 'Brain boost 00', 'Sagor Ahmed', '2020-07-17 03:54:11', '2020-07-17 03:54:11', '1Ã—1-5Ã—6=?', 'img/post_image/1594957919-9279-', 'Daily Math Challenge', '15f11205fe922d', -29),
(8, 'problem 2', 'sojebsikder', '2020-07-18 15:57:51', '2020-07-18 15:57:51', '10Ã·30Ã—10Ã—6-30-20+60=?', 'img/post_image/1595087739-2579-', 'Daily Math Challenge', '15f131b7b4932e', 30),
(9, 'problem 1', 'sojebsikder', '2020-07-19 02:34:52', '2020-07-19 02:34:52', '66*66*66+(100/2)+(30-20)*60/30 =?', 'img/post_image/1595125960-1160-', 'Weekly Math Challenge', '15f13b0c84f2d1', 287566),
(10, 'problem 3', 'sojebsikder', '2020-07-20 03:36:59', '2020-07-20 03:36:59', '10-10-10Ã—2+10+10', 'img/post_image/1595216087-8907-', 'Daily Math Challenge', '15f1510d73e0d5', 0),
(11, 'Problem 4', 'sojebsikder', '2020-07-21 14:01:11', '2020-07-21 14:01:11', '(Answer only in English)', 'img/post_image/Logopit_1595340184687-01.jpeg1595341618-4013-Logopit_1595340184687-01.jpeg', 'Daily Math Challenge', '15f16f4a3175d5', -1);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `qnty` int(11) NOT NULL,
  `description` text NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `product_id` varchar(200) NOT NULL,
  `url` varchar(200) DEFAULT NULL,
  `image2` varchar(200) DEFAULT NULL,
  `image3` varchar(200) DEFAULT NULL,
  `meta_keywords` varchar(200) DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `qnty`, `description`, `image`, `product_id`, `url`, `image2`, `image3`, `meta_keywords`, `category`) VALUES
(12, 'php Complete Tutorial (Bangla) pdf', '70', 20, 'basic to advance complete tutorial in bangla pdf book\r\n\r\n1.	à¦¸à§‚à¦šà¦¿à¦ªà¦¤à§à¦°\r\n2.	à¦­à§à¦®à¦¿à¦•à¦¾\r\n3.	à¦‡à¦¨à§à¦¸à¦Ÿà¦²à§‡à¦¶à¦¨\r\n4.	à¦­à§à¦¯à¦¾à¦°à¦¿à¦¯à¦¼à§‡à¦¬à¦² à¦“ à¦¡à¦¾à¦Ÿà¦¾ à¦Ÿà¦¾à¦‡à¦ªà¦¸\r\n5.	à¦•à¦¨à§à¦¸à¦Ÿà§‡à¦¨à§à¦¸ à¦à¦•à§à¦¸à¦ªà§à¦°à§‡à¦¸à¦¨à¦¸ à¦“ à¦…à¦ªà¦¾à¦°à§‡à¦Ÿà¦°à¦¸\r\n6.	à¦•à¦¨à§à¦Ÿà§à¦°à§‹à¦² à¦¸à§à¦Ÿà§à¦°à¦¾à¦•à¦šà¦¾à¦°\r\n7.	à¦«à¦¾à¦‚à¦¶à¦¨à¦¸\r\n8.	à¦à§à¦¯à¦¾à¦°à§‡\r\n9.	à¦•à¦®à¦¨ à¦à§à¦¯à¦¾à¦°à§‡ à¦«à¦¾à¦‚à¦¶à¦¨à¦¸\r\n10.	à¦…à¦¬à¦œà§‡à¦•à§à¦Ÿ à¦“à¦°à¦¿à§Ÿà§‡à¦¨à§à¦Ÿà§‡à¦¡ à¦ªà§à¦°à§‹à¦—à§à¦°à¦¾à¦®à¦¿à¦‚\r\n11.	à¦•à§à¦²à¦¾à¦¸ à¦à¦¬à¦‚ à¦…à¦¬à¦œà§‡à¦•à§à¦Ÿ\r\n12.	à¦ªà§à¦°à§‹à¦ªà¦¾à¦°à§à¦Ÿà¦¿\r\n13.	à¦¨à¦¨ à¦¸à§à¦Ÿà§à¦¯à¦¾à¦Ÿà¦¿à¦• à¦•à¦¨à¦Ÿà§‡à¦•à§à¦¸à¦Ÿ\r\n14.	à¦‡à¦¨à¦¹à§‡à¦°à¦¿à¦Ÿà§à¦¯à¦¾à¦¨à§à¦¸\r\n15.	à¦­à¦¿à¦œà¦¿à¦¬à¦¿à¦²à¦¿à¦Ÿà¦¿\r\n16.	à¦•à¦¨à§à¦¸à¦Ÿà§à¦°à¦¾à¦•à§à¦Ÿà¦°à¦¸\r\n17.	à¦‡à¦¨à§à¦Ÿà¦¾à¦°à¦«à§‡à¦‡à¦¸\r\n18.	à¦à§à¦¯à¦¾à¦¬à¦¸à§à¦Ÿà§à¦°à¦¾à¦•à¦¶à¦¨\r\n19.	à¦Ÿà§à¦°à§‡à¦‡à¦Ÿà¦¸\r\n20.	à¦®à§à¦¯à¦¾à¦œà¦¿à¦• à¦®à§‡à¦¥à¦¡\r\n21.	à¦¨à§‡à¦‡à¦®à¦¸à§à¦ªà§‡à¦‡à¦¸\r\n22.	à¦«à¦¾à¦‡à¦²à¦¸à¦¿à¦¸à§à¦Ÿà§‡à¦® \r\n23. à¦à¦°à¦ªà¦° à¦•à¦¿?\r\n', 'img/product/IMG_20200717_121524-01.jpeg1594967294-7745-IMG_20200717_121524-01.jpeg', '15f1144fe97154', 'assets/file/1594967294-7745-', NULL, NULL, 'php Complete Tutorial (Bangla) pdf, math contest books, shop, math contest shop,', 'Programming'),
(5, 'Neuroner Onuroron by Jafar Iqbal (pdf version)', '75', 20, 'Neuroner Onuroron by Jafar Iqbal (pdf version)', 'img/product/Screenshot_2020-07-16-17-53-02-38_f541918c7893c52dbd1ee5d319333948-01.jpeg1594900428-4529-Screenshot_2020-07-16-17-53-02-38_f541918c7893c52dbd1ee5d319333948-01.jpeg', '15f103fcc9532d', 'assets/file/1594900428-4529-', NULL, NULL, 'Neuroner Onuroron by Jafar Iqbal (pdf version), math contest books, shop, math contest shop,', 'Science'),
(6, 'Neurone Abaro Onuroron by  (pdf version)', '75', 20, 'Neurone Abaro Onuroron by  (pdf version)', 'img/product/IMG_20200715_194628-01.jpeg1594900459-6655-IMG_20200715_194628-01.jpeg', '15f103feb73b88', 'assets/file/1594900459-6655-', NULL, NULL, 'Neurone Abaro Onuroron by  (pdf version), math contest books, shop, math contest shop,', 'Science'),
(7, 'Bigganer 100 mojar khela pdf', '75', 20, 'Bigganer 100 mojar khela by jafar iqbal ', 'img/product/IMG_20200715_221613-01.jpeg1594900644-6726-IMG_20200715_221613-01.jpeg', '15f1040a4c511b', 'assets/file/1594900644-6726-', NULL, NULL, 'Bigganer 100 mojar khela pdf, math contest books, shop, math contest shop, à¦¬à¦¿à¦œà§à¦žà¦¨à§‡à¦°', 'Science'),
(8, 'Be Smart With Mohammed pdf', '80', 20, 'Be Smart With Mohammed', 'img/product/IMG_20200715_210917-01.jpeg1594900704-5090-IMG_20200715_210917-01.jpeg', '15f1040e026277', 'assets/file/1594900704-5090-', NULL, NULL, 'Be Smart With Mohammed pdf, math contest books, shop, math contest shop,', 'Islamic'),
(9, 'Paradoxical Sazid pdf', '75', 20, 'Paradoxical Sazid by arif azad', 'img/product/Screenshot_2020-07-15-19-41-13-21_f541918c7893c52dbd1ee5d319333948-01.jpeg1594900759-6784-Screenshot_2020-07-15-19-41-13-21_f541918c7893c52dbd1ee5d319333948-01.jpeg', '15f104117d6670', 'assets/file/1594900759-6784-', NULL, NULL, 'Paradoxical Sazid pdf, math contest books, shop, math contest shop,', 'Islamic'),
(10, 'Paradoxical Sazid 2 pdf', '75', 20, 'Paradoxical Sazid 2 by arif azad', 'img/product/Screenshot_2020-07-15-19-42-22-02_f541918c7893c52dbd1ee5d319333948-01.jpeg1594900794-5551-Screenshot_2020-07-15-19-42-22-02_f541918c7893c52dbd1ee5d319333948-01.jpeg', '15f10413a4f051', 'assets/file/1594900794-5551-', NULL, NULL, 'Paradoxical Sazid 2 pdf, math contest books, shop, math contest shop,', 'Islamic'),
(11, 'The Vinchi Code by Dan Brown pdf', '80', 20, 'The most sold book of all time. Buy now to read.', 'img/product/Screenshot_2020-07-15-22-11-37-40_f541918c7893c52dbd1ee5d319333948-01.jpeg1594900874-2195-Screenshot_2020-07-15-22-11-37-40_f541918c7893c52dbd1ee5d319333948-01.jpeg', '15f10418a7883f', 'assets/file/1594900874-2195-', NULL, NULL, '\r\nThe Vinchi Code by Dan Brown pdf, math contest books, shop, math contest shop,\r\n', 'Science'),
(13, 'Programming Contest by Mahbubul Hasaan', '65', 20, 'Best for beginner who wants to learn programming and data structure.', 'img/product/IMG_20200728_000247-01.jpeg1595873073-7205-IMG_20200728_000247-01.jpeg', '15f1f1731ed239', 'assets/file/1595873073-7205-', 'img/product/1595873073-7205-', 'img/product/1595873073-7205-', 'programming,books,', 'Programming');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `product_category`
--

INSERT INTO `product_category` (`id`, `cat_name`, `cat_status`) VALUES
(1, 'Novel', 'Publish'),
(2, 'Programming', 'Publish'),
(3, 'Science', 'Publish'),
(4, 'Islamic', 'Publish'),
(5, 'Science Fiction', 'Publish');

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `user_name` varchar(200) NOT NULL,
  `user_login` varchar(200) NOT NULL,
  `user_pass` varchar(200) NOT NULL,
  `user_registered` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_status` varchar(200) NOT NULL,
  `display_name` varchar(200) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `type` varchar(200) DEFAULT NULL,
  `ipadd` text NOT NULL,
  `user_date` date DEFAULT NULL,
  `user_city` varchar(200) DEFAULT NULL,
  `user_state` varchar(200) DEFAULT NULL,
  `user_country` varchar(200) DEFAULT NULL,
  `user_bio` varchar(200) DEFAULT NULL,
  `user_image` varchar(200) DEFAULT NULL,
  `user_id` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_name`, `user_login`, `user_pass`, `user_registered`, `user_status`, `display_name`, `user_email`, `type`, `ipadd`, `user_date`, `user_city`, `user_state`, `user_country`, `user_bio`, `user_image`, `user_id`) VALUES
(6, 'sojebsikder', 'sojebsikder@gmail.com', 'c0035b21cc82f4cc08b169ba252458d3', '2020-07-13 08:13:35', 'active', 'sojebsikder', 'sojebsikder@gmail.com', 'user', '::1', '0000-00-00', '', '', '', '', '', '15f0c17af2e6c9'),
(3163, 'masum09', 'masum09@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-07-25 06:21:17', 'active', 'masum09', 'masum09@gmail.com', 'user', '172.69.135.163', NULL, NULL, NULL, NULL, NULL, NULL, '15f1bced7e0f4f'),
(3162, 'Monjurul', 'mdmonjurul369@gmail.com', '32eafac15563f85e2ec1f1a8171bb3bf', '2020-07-18 09:11:11', 'active', 'Monjurul', 'mdmonjurul369@gmail.com', 'user', '172.69.34.201', NULL, NULL, NULL, NULL, NULL, NULL, '15f12bc2b43662'),
(3161, 'habib', 'habib@gmail.com', '3573dd3c8f7fa2075538bb9c8a3a4d48', '2020-07-18 08:49:08', 'active', 'habib', 'habib@gmail.com', 'user', '162.158.207.135', NULL, NULL, NULL, NULL, NULL, NULL, '15f12b700c30b5'),
(3158, 'Kawsar Ahmed', 'ahmeedkawsaar@gmail.com', '3f6325e1e4665fa64374fb7bd6ed19eb', '2020-07-17 03:28:51', 'active', 'Kawsar Ahmed', 'ahmeedkawsaar@gmail.com', 'user', '172.69.33.132', NULL, NULL, NULL, NULL, NULL, NULL, '15f111a703f52a'),
(3157, 'sagor', 'sagor89070@gmail.com', '356823e0fc7007a32387665623983568', '2020-07-17 03:26:41', 'active', 'sagor', 'sagor89070@gmail.com', 'user', '172.69.33.228', NULL, NULL, NULL, NULL, NULL, NULL, '15f1119ee2bf8a'),
(3159, 'Imtiaz IsrakAlam  ', 'Mohammadalam7577@gmail.com', '1babab4f1e8d89a6da539ce3c30156ad', '2020-07-17 05:53:47', 'active', 'Imtiaz IsrakAlam  ', 'Mohammadalam7577@gmail.com', 'user', '162.158.207.137', NULL, NULL, NULL, NULL, NULL, NULL, '15f113c6870ed6');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_perm`
--

CREATE TABLE `role_perm` (
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `submitted`
--

CREATE TABLE `submitted` (
  `id` int(11) NOT NULL,
  `user_ans` double NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_unique_id` varchar(200) NOT NULL,
  `ip` text NOT NULL,
  `ans_linkid` varchar(200) NOT NULL,
  `ans_cat` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`id`, `user_ans`, `user_email`, `user_unique_id`, `ip`, `ans_linkid`, `ans_cat`, `date`) VALUES
(9, 67, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '103.25.250.230', '15f1045bce2279', 'Daily Math Challenge', '2020-07-16 12:28:43'),
(10, 67, 'sagor89070@gmail.com', '15f1119ee2bf8a', '108.162.215.197', '15f1045bce2279', 'Daily Math Challenge', '2020-07-17 03:29:09'),
(11, 35, 'ahmeedkawsaar@gmail.com', '15f111a703f52a', '172.69.33.132', '15f1045bce2279', 'Daily Math Challenge', '2020-07-17 03:29:33'),
(12, 67, 'ahmeedkawsaar@gmail.com', '15f111a703f52a', '172.69.33.132', '15f1045bce2279', 'Daily Math Challenge', '2020-07-17 03:29:51'),
(13, 29, 'sagor89070@gmail.com', '15f1119ee2bf8a', '108.162.215.191', '15f11205fe922d', 'Daily Math Challenge', '2020-07-17 03:54:46'),
(14, -29, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '103.25.248.246', '15f11205fe922d', 'Daily Math Challenge', '2020-07-17 03:58:10'),
(15, -29, 'sagor89070@gmail.com', '15f1119ee2bf8a', '172.69.34.215', '15f11205fe922d', 'Daily Math Challenge', '2020-07-17 04:02:57'),
(16, -29, 'Mohammadalam7577@gmail.com', '15f113c6870ed6', '162.158.207.137', '15f11205fe922d', 'Daily Math Challenge', '2020-07-17 05:55:50'),
(17, 29, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '162.158.159.125', '15f11205fe922d', 'Daily Math Challenge', '2020-07-18 08:42:59'),
(18, 67, 'habib@gmail.com', '15f12b700c30b5', '162.158.207.135', '15f1045bce2279', 'Daily Math Challenge', '2020-07-18 08:49:49'),
(19, -29, 'habib@gmail.com', '15f12b700c30b5', '162.158.207.135', '15f11205fe922d', 'Daily Math Challenge', '2020-07-18 08:50:19'),
(20, -29, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '162.158.158.102', '15f11205fe922d', 'Daily Math Challenge', '2020-07-18 08:51:49'),
(21, -29, 'mdmonjurul369@gmail.com', '15f12bc2b43662', '172.69.34.201', '15f11205fe922d', 'Daily Math Challenge', '2020-07-18 09:12:32'),
(22, 30, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '162.158.159.125', '15f131b7b4932e', 'Daily Math Challenge', '2020-07-18 15:58:47'),
(23, 287566, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '162.158.154.34', '15f13b0c84f2d1', 'Weekly Math Challenge', '2020-07-19 02:35:41'),
(24, 0, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '162.158.207.135', '15f1510d73e0d5', 'Daily Math Challenge', '2020-07-20 03:37:55'),
(25, -1, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '172.69.135.97', '15f16f4a3175d5', 'Daily Math Challenge', '2020-07-21 14:29:33');

-- --------------------------------------------------------

--
-- Table structure for table `tb_link`
--

CREATE TABLE `tb_link` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_link`
--

INSERT INTO `tb_link` (`id`, `title`, `link`) VALUES
(3, 'Facebook', 'http://facebook.com/');

-- --------------------------------------------------------

--
-- Table structure for table `ucode`
--

CREATE TABLE `ucode` (
  `id` int(11) NOT NULL,
  `code` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ucode`
--

INSERT INTO `ucode` (`id`, `code`, `email`, `date`) VALUES
(1, '15e6f91e2bedc6', 'sojebsikder@gmail.com', '2020-03-16 14:49:06');

-- --------------------------------------------------------

--
-- Table structure for table `user_role`
--

CREATE TABLE `user_role` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`, `date`) VALUES
(1, '::1', '2020-07-06 08:17:05'),
(2, '103.25.248.240', '2020-07-16 09:31:44'),
(3, '173.252.87.8', '2020-07-16 09:38:09'),
(4, '108.162.229.105', '2020-07-16 10:08:25'),
(5, '103.25.248.250', '2020-07-16 10:12:54'),
(6, '162.158.207.133', '2020-07-16 10:38:34'),
(7, '172.68.132.24', '2020-07-16 11:32:08'),
(8, '162.158.165.55', '2020-07-16 11:36:31'),
(9, '172.69.134.36', '2020-07-16 11:36:53'),
(10, '162.158.165.115', '2020-07-16 11:39:13'),
(11, '172.69.135.37', '2020-07-16 11:40:21'),
(12, '172.69.134.6', '2020-07-16 11:40:38'),
(13, '162.158.165.87', '2020-07-16 11:41:03'),
(14, '172.68.146.197', '2020-07-16 11:41:38'),
(15, '162.158.166.216', '2020-07-16 11:42:36'),
(16, '172.69.135.43', '2020-07-16 11:45:51'),
(17, '162.158.165.199', '2020-07-16 11:46:38'),
(18, '172.68.146.239', '2020-07-16 11:46:55'),
(19, '162.158.166.190', '2020-07-16 11:48:37'),
(20, '162.158.165.197', '2020-07-16 11:51:02'),
(21, '162.158.165.41', '2020-07-16 11:51:50'),
(22, '172.69.134.186', '2020-07-16 11:57:23'),
(23, '162.158.165.103', '2020-07-16 11:57:50'),
(24, '172.68.146.77', '2020-07-16 11:59:18'),
(25, '172.68.146.137', '2020-07-16 12:04:10'),
(26, '172.69.135.223', '2020-07-16 12:05:13'),
(27, '108.162.245.87', '2020-07-16 12:05:28'),
(28, '162.158.167.165', '2020-07-16 12:06:43'),
(29, '172.69.134.114', '2020-07-16 12:07:23'),
(30, '162.158.167.115', '2020-07-16 12:07:43'),
(31, '172.69.134.48', '2020-07-16 12:08:42'),
(32, '172.69.134.150', '2020-07-16 12:09:32'),
(33, '172.69.135.109', '2020-07-16 12:09:42'),
(34, '162.158.165.247', '2020-07-16 12:09:53'),
(35, '162.158.165.79', '2020-07-16 12:10:02'),
(36, '172.69.134.12', '2020-07-16 12:12:03'),
(37, '162.158.166.132', '2020-07-16 12:12:42'),
(38, '172.68.146.227', '2020-07-16 12:13:23'),
(39, '103.25.250.242', '2020-07-16 12:20:11'),
(40, '103.25.250.230', '2020-07-16 12:26:49'),
(41, '172.69.71.131', '2020-07-16 12:40:28'),
(42, '162.158.207.137', '2020-07-16 13:53:38'),
(43, '162.158.207.135', '2020-07-16 13:54:05'),
(44, '103.25.250.237', '2020-07-16 14:13:24'),
(45, '162.158.74.246', '2020-07-16 14:18:18'),
(46, '162.158.74.132', '2020-07-16 14:18:18'),
(47, '162.158.158.226', '2020-07-16 14:45:30'),
(48, '162.158.119.78', '2020-07-16 15:20:15'),
(49, '162.158.159.125', '2020-07-16 15:43:57'),
(50, '162.158.154.148', '2020-07-16 15:44:36'),
(51, '162.158.155.113', '2020-07-16 15:49:02'),
(52, '141.101.98.123', '2020-07-16 15:49:07'),
(53, '162.158.119.112', '2020-07-16 15:51:51'),
(54, '162.158.119.48', '2020-07-16 16:01:00'),
(55, '162.158.118.143', '2020-07-16 16:01:02'),
(56, '162.158.118.101', '2020-07-16 16:01:37'),
(57, '162.158.118.107', '2020-07-16 16:17:49'),
(58, '162.158.158.18', '2020-07-16 16:20:48'),
(59, '103.25.250.228', '2020-07-16 16:38:36'),
(60, '141.101.98.225', '2020-07-16 16:47:33'),
(61, '103.25.249.254', '2020-07-16 17:32:54'),
(62, '162.158.106.201', '2020-07-16 18:26:20'),
(63, '172.68.65.205', '2020-07-16 18:34:58'),
(64, '172.69.69.141', '2020-07-16 18:38:23'),
(65, '108.162.246.218', '2020-07-16 19:05:33'),
(66, '172.69.71.93', '2020-07-16 19:21:45'),
(67, '172.69.68.152', '2020-07-16 19:21:48'),
(68, '172.69.71.67', '2020-07-16 19:22:01'),
(69, '108.162.245.153', '2020-07-16 19:38:26'),
(70, '162.158.154.34', '2020-07-16 23:05:12'),
(71, '103.25.250.250', '2020-07-17 03:23:25'),
(72, '172.69.33.132', '2020-07-17 03:26:02'),
(73, '172.69.33.228', '2020-07-17 03:26:14'),
(74, '108.162.215.191', '2020-07-17 03:26:18'),
(75, '108.162.215.189', '2020-07-17 03:28:52'),
(76, '108.162.215.145', '2020-07-17 03:28:52'),
(77, '108.162.215.197', '2020-07-17 03:28:53'),
(78, '172.69.34.191', '2020-07-17 03:30:11'),
(79, '172.69.33.226', '2020-07-17 03:30:13'),
(80, '103.25.248.246', '2020-07-17 03:42:44'),
(81, '172.69.34.143', '2020-07-17 03:49:33'),
(82, '172.69.33.220', '2020-07-17 03:50:45'),
(83, '108.162.215.123', '2020-07-17 03:59:33'),
(84, '172.69.34.163', '2020-07-17 04:00:59'),
(85, '172.69.34.215', '2020-07-17 04:02:28'),
(86, '103.25.250.227', '2020-07-17 04:48:14'),
(87, '103.25.250.241', '2020-07-17 04:58:18'),
(88, '172.69.63.154', '2020-07-17 06:30:55'),
(89, '103.25.250.226', '2020-07-17 07:24:41'),
(90, '162.158.118.47', '2020-07-17 08:30:57'),
(91, '172.68.142.188', '2020-07-17 09:03:53'),
(92, '162.158.159.111', '2020-07-17 09:46:02'),
(93, '141.101.98.121', '2020-07-17 10:00:57'),
(94, '172.69.70.176', '2020-07-17 12:51:52'),
(95, '172.69.70.176', '2020-07-17 12:51:52'),
(96, '141.101.98.119', '2020-07-17 15:41:08'),
(97, '172.69.63.104', '2020-07-17 16:54:23'),
(98, '162.158.78.141', '2020-07-17 16:54:23'),
(99, '162.158.79.246', '2020-07-17 16:54:30'),
(100, '172.69.62.95', '2020-07-17 16:54:30'),
(101, '172.69.63.188', '2020-07-17 16:54:31'),
(102, '172.69.63.184', '2020-07-17 16:54:32'),
(103, '172.69.63.34', '2020-07-17 16:54:32'),
(104, '162.158.187.114', '2020-07-17 16:54:36'),
(105, '108.162.219.47', '2020-07-17 17:52:45'),
(106, '173.245.54.214', '2020-07-17 17:55:11'),
(107, '162.158.79.84', '2020-07-17 17:55:11'),
(108, '173.245.54.126', '2020-07-17 18:13:42'),
(109, '162.158.79.216', '2020-07-17 18:14:06'),
(110, '162.158.78.161', '2020-07-17 18:14:07'),
(111, '162.158.78.31', '2020-07-17 18:14:07'),
(112, '172.69.63.30', '2020-07-17 18:33:37'),
(113, '172.69.63.132', '2020-07-17 18:34:15'),
(114, '162.158.78.127', '2020-07-17 18:35:10'),
(115, '162.158.155.119', '2020-07-17 19:15:19'),
(116, '141.101.105.65', '2020-07-17 19:15:22'),
(117, '108.162.216.133', '2020-07-17 19:15:25'),
(118, '172.68.182.115', '2020-07-17 19:15:52'),
(119, '172.69.71.173', '2020-07-18 02:56:28'),
(120, '141.101.99.214', '2020-07-18 07:20:21'),
(121, '162.158.158.102', '2020-07-18 08:20:22'),
(122, '172.69.33.178', '2020-07-18 09:09:44'),
(123, '172.69.34.201', '2020-07-18 09:10:06'),
(124, '141.101.98.35', '2020-07-18 10:01:37'),
(125, '141.101.98.193', '2020-07-18 11:00:11'),
(126, '162.158.187.58', '2020-07-18 12:19:42'),
(127, '162.158.187.218', '2020-07-18 12:19:42'),
(128, '141.101.98.143', '2020-07-18 14:11:11'),
(129, '162.158.159.75', '2020-07-18 14:12:23'),
(130, '162.158.158.238', '2020-07-18 14:12:25'),
(131, '141.101.107.165', '2020-07-18 14:15:30'),
(132, '162.158.158.122', '2020-07-18 14:40:24'),
(133, '162.158.158.234', '2020-07-18 14:40:29'),
(134, '172.69.68.210', '2020-07-18 16:31:23'),
(135, '172.69.71.107', '2020-07-18 17:06:00'),
(136, '162.158.158.166', '2020-07-18 17:20:01'),
(137, '162.158.159.89', '2020-07-18 17:20:41'),
(138, '172.69.69.199', '2020-07-18 17:21:37'),
(139, '162.158.158.230', '2020-07-18 17:21:58'),
(140, '172.69.70.110', '2020-07-18 17:22:56'),
(141, '172.69.71.85', '2020-07-18 17:23:36'),
(142, '172.69.71.61', '2020-07-18 17:24:24'),
(143, '172.69.71.165', '2020-07-18 17:25:01'),
(144, '172.69.68.246', '2020-07-18 17:28:37'),
(145, '172.69.69.145', '2020-07-18 17:28:48'),
(146, '172.69.68.204', '2020-07-18 17:38:16'),
(147, '162.158.106.15', '2020-07-18 23:29:21'),
(148, '172.69.69.229', '2020-07-18 23:31:02'),
(149, '172.69.70.152', '2020-07-18 23:40:27'),
(150, '141.101.69.12', '2020-07-19 02:01:24'),
(151, '108.162.229.155', '2020-07-19 02:01:25'),
(152, '172.69.71.117', '2020-07-19 02:59:18'),
(153, '172.69.71.109', '2020-07-19 03:07:10'),
(154, '172.69.70.254', '2020-07-19 03:14:42'),
(155, '172.69.71.101', '2020-07-19 03:33:07'),
(156, '172.69.33.56', '2020-07-19 03:34:19'),
(157, '162.158.118.235', '2020-07-19 05:49:41'),
(158, '172.69.69.187', '2020-07-19 09:17:58'),
(159, '172.69.71.167', '2020-07-19 10:14:46'),
(160, '172.69.68.186', '2020-07-19 11:31:02'),
(161, '172.69.69.137', '2020-07-19 11:31:22'),
(162, '172.69.71.47', '2020-07-19 11:31:42'),
(163, '172.69.70.44', '2020-07-19 14:44:16'),
(164, '162.158.74.84', '2020-07-19 15:45:47'),
(165, '108.162.216.231', '2020-07-19 15:45:47'),
(166, '108.162.246.128', '2020-07-19 15:48:21'),
(167, '162.158.107.192', '2020-07-19 15:48:21'),
(168, '172.69.63.106', '2020-07-19 15:48:22'),
(169, '162.158.78.159', '2020-07-19 15:48:22'),
(170, '173.245.54.106', '2020-07-19 15:48:24'),
(171, '173.245.54.64', '2020-07-19 15:48:24'),
(172, '162.158.78.11', '2020-07-19 15:48:24'),
(173, '172.69.63.124', '2020-07-19 15:48:26'),
(174, '162.158.78.253', '2020-07-19 15:48:26'),
(175, '162.158.78.9', '2020-07-19 15:48:27'),
(176, '173.245.54.168', '2020-07-19 15:48:27'),
(177, '162.158.78.237', '2020-07-19 15:48:28'),
(178, '162.158.78.245', '2020-07-19 15:48:28'),
(179, '162.158.78.75', '2020-07-19 15:48:29'),
(180, '172.69.62.221', '2020-07-19 15:48:29'),
(181, '172.69.63.242', '2020-07-19 15:48:30'),
(182, '173.245.54.180', '2020-07-19 15:48:30'),
(183, '162.158.78.113', '2020-07-19 15:48:30'),
(184, '172.69.63.234', '2020-07-19 15:48:31'),
(185, '172.69.63.220', '2020-07-19 15:48:31'),
(186, '173.245.54.80', '2020-07-19 15:48:32'),
(187, '173.245.54.66', '2020-07-19 15:48:32'),
(188, '162.158.78.165', '2020-07-19 15:48:33'),
(189, '162.158.78.81', '2020-07-19 15:48:33'),
(190, '162.158.78.25', '2020-07-19 15:48:33'),
(191, '172.69.62.71', '2020-07-19 15:48:33'),
(192, '173.245.54.184', '2020-07-19 15:48:35'),
(193, '162.158.78.17', '2020-07-19 15:48:35'),
(194, '162.158.79.32', '2020-07-19 15:48:35'),
(195, '173.245.54.102', '2020-07-19 15:48:36'),
(196, '173.245.54.134', '2020-07-19 15:48:36'),
(197, '172.69.63.36', '2020-07-19 15:48:36'),
(198, '173.245.54.166', '2020-07-19 15:48:37'),
(199, '172.68.65.157', '2020-07-19 15:48:37'),
(200, '173.245.54.174', '2020-07-19 15:48:38'),
(201, '172.68.65.253', '2020-07-19 15:48:38'),
(202, '162.158.79.192', '2020-07-19 15:48:39'),
(203, '172.69.63.162', '2020-07-19 15:48:39'),
(204, '172.68.65.43', '2020-07-19 15:48:40'),
(205, '172.69.62.89', '2020-07-19 15:48:40'),
(206, '172.69.63.222', '2020-07-19 15:48:41'),
(207, '173.245.54.78', '2020-07-19 15:48:42'),
(208, '172.69.63.8', '2020-07-19 15:48:42'),
(209, '172.68.65.241', '2020-07-19 15:48:43'),
(210, '172.69.63.232', '2020-07-19 15:48:43'),
(211, '172.68.65.223', '2020-07-19 15:48:44'),
(212, '172.69.63.58', '2020-07-19 15:48:44'),
(213, '172.69.62.245', '2020-07-19 15:48:45'),
(214, '172.69.62.29', '2020-07-19 15:48:45'),
(215, '172.69.63.196', '2020-07-19 15:48:46'),
(216, '172.69.63.74', '2020-07-19 15:48:46'),
(217, '162.158.78.213', '2020-07-19 15:48:46'),
(218, '172.68.65.37', '2020-07-19 15:48:47'),
(219, '173.245.54.230', '2020-07-19 15:48:48'),
(220, '172.69.63.226', '2020-07-19 15:48:48'),
(221, '173.245.54.250', '2020-07-19 15:48:48'),
(222, '173.245.54.96', '2020-07-19 15:48:49'),
(223, '172.69.63.178', '2020-07-19 15:48:50'),
(224, '162.158.79.126', '2020-07-19 15:48:50'),
(225, '173.245.54.140', '2020-07-19 15:48:50'),
(226, '162.158.78.77', '2020-07-19 15:48:51'),
(227, '172.69.63.168', '2020-07-19 15:48:52'),
(228, '162.158.78.101', '2020-07-19 15:48:52'),
(229, '172.69.62.125', '2020-07-19 15:48:53'),
(230, '172.69.62.107', '2020-07-19 15:48:53'),
(231, '172.69.63.92', '2020-07-19 15:48:53'),
(232, '173.245.54.146', '2020-07-19 15:48:54'),
(233, '162.158.78.103', '2020-07-19 21:50:35'),
(234, '141.101.99.224', '2020-07-20 04:09:23'),
(235, '141.101.104.104', '2020-07-20 04:33:12'),
(236, '172.69.70.170', '2020-07-20 04:51:51'),
(237, '172.69.68.66', '2020-07-20 04:54:56'),
(238, '172.69.69.241', '2020-07-20 04:54:56'),
(239, '172.69.69.43', '2020-07-20 05:04:28'),
(240, '172.69.68.48', '2020-07-20 05:10:46'),
(241, '162.158.155.59', '2020-07-20 11:01:49'),
(242, '172.69.68.154', '2020-07-20 14:53:25'),
(243, '172.69.68.146', '2020-07-20 14:53:30'),
(244, '108.162.238.40', '2020-07-20 17:33:43'),
(245, '172.68.146.95', '2020-07-21 05:49:57'),
(246, '162.158.166.66', '2020-07-21 09:15:12'),
(247, '162.158.166.96', '2020-07-21 09:15:35'),
(248, '172.69.70.182', '2020-07-21 09:29:01'),
(249, '172.69.70.200', '2020-07-21 09:29:26'),
(250, '172.69.68.192', '2020-07-21 09:29:52'),
(251, '172.69.70.218', '2020-07-21 09:30:16'),
(252, '162.158.107.206', '2020-07-21 09:31:31'),
(253, '172.69.68.72', '2020-07-21 09:31:56'),
(254, '172.69.68.120', '2020-07-21 09:32:21'),
(255, '172.69.71.75', '2020-07-21 09:32:46'),
(256, '172.69.71.171', '2020-07-21 09:33:12'),
(257, '172.69.71.157', '2020-07-21 09:33:38'),
(258, '172.69.68.164', '2020-07-21 09:34:02'),
(259, '172.69.69.7', '2020-07-21 09:34:26'),
(260, '172.69.71.183', '2020-07-21 09:34:51'),
(261, '172.69.68.54', '2020-07-21 09:35:14'),
(262, '172.69.70.122', '2020-07-21 09:35:40'),
(263, '172.69.68.206', '2020-07-21 09:35:59'),
(264, '172.69.71.133', '2020-07-21 09:36:52'),
(265, '172.69.69.235', '2020-07-21 09:37:10'),
(266, '172.69.71.187', '2020-07-21 09:37:22'),
(267, '172.69.71.105', '2020-07-21 09:37:44'),
(268, '172.69.71.97', '2020-07-21 09:41:46'),
(269, '172.69.70.38', '2020-07-21 09:43:52'),
(270, '172.69.71.193', '2020-07-21 09:44:54'),
(271, '172.69.68.108', '2020-07-21 09:45:42'),
(272, '172.69.69.91', '2020-07-21 09:46:15'),
(273, '172.69.68.172', '2020-07-21 09:52:45'),
(274, '172.69.69.19', '2020-07-21 09:59:30'),
(275, '172.69.63.100', '2020-07-21 10:15:27'),
(276, '162.158.78.157', '2020-07-21 10:15:27'),
(277, '162.158.165.75', '2020-07-21 11:58:35'),
(278, '162.158.166.178', '2020-07-21 12:43:20'),
(279, '162.158.166.62', '2020-07-21 12:45:46'),
(280, '172.69.71.39', '2020-07-21 12:53:40'),
(281, '172.69.71.181', '2020-07-21 12:54:07'),
(282, '172.69.69.97', '2020-07-21 12:55:12'),
(283, '172.69.71.153', '2020-07-21 12:55:17'),
(284, '172.69.71.137', '2020-07-21 12:55:26'),
(285, '172.69.71.57', '2020-07-21 12:55:36'),
(286, '172.69.68.150', '2020-07-21 12:56:13'),
(287, '172.69.70.104', '2020-07-21 12:59:18'),
(288, '172.69.69.207', '2020-07-21 12:59:36'),
(289, '172.69.70.14', '2020-07-21 12:59:55'),
(290, '172.69.68.190', '2020-07-21 13:00:14'),
(291, '172.69.71.87', '2020-07-21 13:00:33'),
(292, '172.69.71.15', '2020-07-21 13:00:51'),
(293, '172.69.70.140', '2020-07-21 13:01:38'),
(294, '172.69.68.176', '2020-07-21 13:02:33'),
(295, '172.69.69.221', '2020-07-21 13:02:58'),
(296, '172.69.70.86', '2020-07-21 13:03:42'),
(297, '172.69.71.195', '2020-07-21 13:03:53'),
(298, '172.69.69.67', '2020-07-21 13:04:05'),
(299, '172.69.70.158', '2020-07-21 13:04:16'),
(300, '172.69.68.162', '2020-07-21 13:04:18'),
(301, '172.69.71.45', '2020-07-21 13:04:35'),
(302, '172.69.69.31', '2020-07-21 13:04:46'),
(303, '172.69.71.127', '2020-07-21 13:05:24'),
(304, '172.69.70.242', '2020-07-21 13:05:33'),
(305, '162.158.167.129', '2020-07-21 13:59:29'),
(306, '162.158.166.56', '2020-07-21 14:06:58'),
(307, '172.69.135.97', '2020-07-21 14:27:51'),
(308, '162.158.106.39', '2020-07-21 14:30:11'),
(309, '162.158.166.170', '2020-07-21 15:06:22'),
(310, '108.162.246.164', '2020-07-21 17:16:16'),
(311, '162.158.165.183', '2020-07-21 17:16:32'),
(312, '173.245.54.198', '2020-07-21 19:16:50'),
(313, '162.158.79.12', '2020-07-22 03:11:23'),
(314, '172.69.63.52', '2020-07-22 03:30:40'),
(315, '162.158.75.15', '2020-07-22 08:51:18'),
(316, '172.69.134.204', '2020-07-22 09:58:51'),
(317, '162.158.166.10', '2020-07-22 13:34:07'),
(318, '162.158.167.13', '2020-07-22 13:34:29'),
(319, '172.68.146.83', '2020-07-22 13:38:02'),
(320, '162.158.78.129', '2020-07-22 22:57:37'),
(321, '162.158.166.112', '2020-07-23 03:17:49'),
(322, '162.158.187.182', '2020-07-23 05:11:21'),
(323, '172.69.63.84', '2020-07-23 06:06:21'),
(324, '162.158.187.102', '2020-07-23 06:27:07'),
(325, '108.162.237.39', '2020-07-23 07:22:41'),
(326, '162.158.187.164', '2020-07-23 07:22:42'),
(327, '162.158.186.243', '2020-07-23 07:47:42'),
(328, '162.158.186.123', '2020-07-23 08:58:41'),
(329, '162.158.187.184', '2020-07-23 09:07:42'),
(330, '162.158.166.198', '2020-07-23 10:37:37'),
(331, '162.158.187.230', '2020-07-23 11:30:15'),
(332, '108.162.238.4', '2020-07-23 12:00:49'),
(333, '162.158.187.64', '2020-07-23 12:46:47'),
(334, '162.158.165.47', '2020-07-23 13:01:32'),
(335, '162.158.166.88', '2020-07-23 13:01:39'),
(336, '172.69.218.139', '2020-07-23 13:46:01'),
(337, '162.158.165.229', '2020-07-23 15:10:42'),
(338, '162.158.186.147', '2020-07-23 15:17:37'),
(339, '162.158.187.236', '2020-07-23 16:37:36'),
(340, '108.162.237.251', '2020-07-23 17:49:11'),
(341, '162.158.187.136', '2020-07-23 19:09:15'),
(342, '108.162.237.25', '2020-07-23 20:20:45'),
(343, '162.158.187.212', '2020-07-23 20:21:10'),
(344, '162.158.187.170', '2020-07-23 20:21:10'),
(345, '162.158.187.68', '2020-07-23 20:21:11'),
(346, '162.158.187.198', '2020-07-23 20:27:09'),
(347, '162.158.186.93', '2020-07-23 21:20:57'),
(348, '162.158.187.244', '2020-07-23 21:24:55'),
(349, '162.158.187.106', '2020-07-23 21:27:41'),
(350, '162.158.187.160', '2020-07-23 21:29:46'),
(351, '108.162.237.239', '2020-07-23 21:30:50'),
(352, '162.158.187.248', '2020-07-23 21:40:51'),
(353, '162.158.187.112', '2020-07-23 22:38:09'),
(354, '162.158.187.224', '2020-07-23 23:56:16'),
(355, '162.158.187.34', '2020-07-24 01:09:36'),
(356, '108.162.237.253', '2020-07-24 02:27:53'),
(357, '108.162.216.173', '2020-07-24 03:06:03'),
(358, '162.158.75.65', '2020-07-24 03:06:03'),
(359, '162.158.165.141', '2020-07-24 03:52:12'),
(360, '162.158.74.26', '2020-07-24 06:17:27'),
(361, '162.158.75.131', '2020-07-24 06:17:50'),
(362, '162.158.75.57', '2020-07-24 07:28:31'),
(363, '108.162.216.157', '2020-07-24 07:28:49'),
(364, '162.158.74.174', '2020-07-24 07:38:11'),
(365, '162.158.74.78', '2020-07-24 07:38:43'),
(366, '108.162.216.61', '2020-07-24 07:39:21'),
(367, '108.162.216.229', '2020-07-24 07:39:59'),
(368, '108.162.216.221', '2020-07-24 07:40:37'),
(369, '108.162.216.237', '2020-07-24 07:41:14'),
(370, '162.158.74.48', '2020-07-24 07:41:35'),
(371, '162.158.74.96', '2020-07-24 07:41:56'),
(372, '162.158.75.187', '2020-07-24 07:42:43'),
(373, '162.158.74.156', '2020-07-24 07:43:26'),
(374, '162.158.75.39', '2020-07-24 07:44:57'),
(375, '162.158.74.120', '2020-07-24 07:45:52'),
(376, '162.158.166.40', '2020-07-24 08:08:37'),
(377, '162.158.74.4', '2020-07-24 08:47:13'),
(378, '162.158.74.8', '2020-07-24 08:47:19'),
(379, '162.158.75.45', '2020-07-24 11:18:09'),
(380, '162.158.75.37', '2020-07-24 11:59:07'),
(381, '162.158.74.216', '2020-07-24 11:59:41'),
(382, '162.158.75.5', '2020-07-24 12:00:16'),
(383, '162.158.74.16', '2020-07-24 12:00:50'),
(384, '162.158.74.164', '2020-07-24 12:01:25'),
(385, '108.162.216.249', '2020-07-24 12:01:58'),
(386, '162.158.74.102', '2020-07-24 12:02:34'),
(387, '162.158.74.118', '2020-07-24 12:03:44'),
(388, '162.158.74.212', '2020-07-24 12:04:20'),
(389, '162.158.74.196', '2020-07-24 13:41:34'),
(390, '108.162.216.37', '2020-07-24 13:47:38'),
(391, '162.158.75.171', '2020-07-24 13:47:38'),
(392, '162.158.74.128', '2020-07-24 13:47:54'),
(393, '108.162.216.195', '2020-07-24 13:57:10'),
(394, '162.158.75.161', '2020-07-24 13:58:03'),
(395, '162.158.75.195', '2020-07-24 13:59:31'),
(396, '162.158.75.109', '2020-07-24 14:01:25'),
(397, '162.158.75.137', '2020-07-24 15:04:16'),
(398, '162.158.74.44', '2020-07-24 15:04:16'),
(399, '162.158.74.66', '2020-07-24 15:08:42'),
(400, '172.69.134.24', '2020-07-24 16:06:00'),
(401, '162.158.167.75', '2020-07-24 16:06:34'),
(402, '162.158.167.163', '2020-07-24 16:15:49'),
(403, '162.158.74.232', '2020-07-24 16:19:02'),
(404, '162.158.74.142', '2020-07-24 17:38:30'),
(405, '162.158.74.86', '2020-07-24 18:02:00'),
(406, '162.158.74.162', '2020-07-24 18:10:31'),
(407, '108.162.216.75', '2020-07-24 18:50:36'),
(408, '162.158.74.146', '2020-07-24 19:28:13'),
(409, '108.162.216.245', '2020-07-24 19:29:45'),
(410, '162.158.75.173', '2020-07-24 19:31:25'),
(411, '162.158.74.166', '2020-07-24 19:33:05'),
(412, '162.158.74.220', '2020-07-24 19:35:02'),
(413, '162.158.74.140', '2020-07-24 19:35:03'),
(414, '108.162.216.63', '2020-07-24 20:07:23'),
(415, '162.158.74.92', '2020-07-24 20:07:45'),
(416, '108.162.216.243', '2020-07-24 20:07:46'),
(417, '108.162.216.193', '2020-07-24 21:08:15'),
(418, '162.158.74.60', '2020-07-24 21:10:33'),
(419, '108.162.216.175', '2020-07-24 21:20:32'),
(420, '162.158.75.185', '2020-07-24 21:22:10'),
(421, '108.162.216.225', '2020-07-24 21:23:23'),
(422, '108.162.216.147', '2020-07-24 22:33:43'),
(423, '108.162.216.239', '2020-07-24 22:35:59'),
(424, '162.158.75.189', '2020-07-24 22:37:57'),
(425, '162.158.74.206', '2020-07-24 22:38:06'),
(426, '162.158.74.172', '2020-07-24 23:47:29'),
(427, '162.158.74.42', '2020-07-24 23:51:14'),
(428, '172.68.146.125', '2020-07-25 02:14:57'),
(429, '162.158.166.86', '2020-07-25 02:15:10'),
(430, '172.69.135.151', '2020-07-25 02:15:16'),
(431, '172.69.135.169', '2020-07-25 04:10:12'),
(432, '172.69.71.179', '2020-07-25 05:11:47'),
(433, '172.69.68.252', '2020-07-25 05:39:11'),
(434, '172.69.135.163', '2020-07-25 06:19:05'),
(435, '172.69.135.67', '2020-07-25 06:19:24'),
(436, '162.158.165.167', '2020-07-25 06:21:25'),
(437, '172.69.71.151', '2020-07-25 06:59:16'),
(438, '172.69.69.247', '2020-07-25 07:08:13'),
(439, '162.158.107.204', '2020-07-25 07:46:36'),
(440, '162.158.106.159', '2020-07-25 07:46:36'),
(441, '172.69.69.175', '2020-07-25 08:11:43'),
(442, '172.69.71.51', '2020-07-25 08:14:54'),
(443, '172.69.70.92', '2020-07-25 08:32:25'),
(444, '172.69.71.155', '2020-07-25 09:12:35'),
(445, '162.158.166.94', '2020-07-25 10:06:46'),
(446, '172.69.135.121', '2020-07-25 10:07:05'),
(447, '162.158.106.27', '2020-07-25 10:07:18'),
(448, '162.158.74.116', '2020-07-25 10:07:19'),
(449, '108.162.245.37', '2020-07-25 10:07:27'),
(450, '162.158.106.249', '2020-07-25 12:28:29'),
(451, '162.158.165.31', '2020-07-25 13:14:32'),
(452, '162.158.166.22', '2020-07-25 13:16:00'),
(453, '172.69.135.25', '2020-07-25 13:16:40'),
(454, '162.158.165.21', '2020-07-25 19:09:19'),
(455, '162.158.186.135', '2020-07-26 01:55:44'),
(456, '108.162.237.173', '2020-07-26 03:00:18'),
(457, '162.158.166.28', '2020-07-26 03:31:58'),
(458, '162.158.166.58', '2020-07-26 03:36:21'),
(459, '162.158.187.188', '2020-07-26 06:19:20'),
(460, '108.162.237.175', '2020-07-26 06:20:26'),
(461, '108.162.237.227', '2020-07-26 06:22:38'),
(462, '162.158.186.183', '2020-07-26 06:23:46'),
(463, '108.162.237.229', '2020-07-26 06:24:42'),
(464, '108.162.237.177', '2020-07-26 06:26:10'),
(465, '108.162.238.8', '2020-07-26 06:27:12'),
(466, '162.158.187.156', '2020-07-26 06:33:42'),
(467, '108.162.238.60', '2020-07-26 07:28:28'),
(468, '162.158.187.128', '2020-07-26 11:17:00'),
(469, '162.158.167.17', '2020-07-26 12:23:43'),
(470, '162.158.166.142', '2020-07-26 12:26:53'),
(471, '108.162.238.6', '2020-07-26 15:07:49'),
(472, '162.158.187.84', '2020-07-26 16:19:04'),
(473, '162.158.107.152', '2020-07-26 16:43:54'),
(474, '162.158.187.126', '2020-07-26 17:39:20'),
(475, '162.158.187.216', '2020-07-26 18:50:32'),
(476, '162.158.186.141', '2020-07-26 23:59:19'),
(477, '172.69.135.221', '2020-07-27 18:07:10'),
(478, '162.158.165.177', '2020-07-27 18:07:38'),
(479, '172.69.135.73', '2020-07-27 18:07:38'),
(480, '162.158.165.243', '2020-07-27 18:07:53'),
(481, '108.162.216.131', '2020-07-27 23:56:37'),
(482, '172.68.146.143', '2020-07-28 08:05:04'),
(483, '162.158.75.181', '2020-07-28 09:37:57'),
(484, '162.158.74.152', '2020-07-28 09:52:04'),
(485, '162.158.74.38', '2020-07-28 14:19:08'),
(486, '162.158.166.146', '2020-07-29 17:29:01'),
(487, '162.158.167.45', '2020-07-29 17:32:11'),
(488, '162.158.165.253', '2020-07-29 17:32:25'),
(489, '108.162.245.127', '2020-07-29 19:29:27'),
(490, '172.69.71.83', '2020-07-30 11:51:05'),
(491, '162.158.167.139', '2020-07-30 12:41:40'),
(492, '172.69.71.113', '2020-07-30 16:44:55'),
(493, '162.158.166.52', '2020-07-31 07:55:58'),
(494, '162.158.75.197', '2020-07-31 11:33:09'),
(495, '162.158.74.100', '2020-07-31 11:49:41'),
(496, '162.158.74.62', '2020-08-01 10:55:27'),
(497, '162.158.167.23', '2020-08-01 17:50:40'),
(498, '162.158.167.43', '2020-08-01 17:52:13'),
(499, '162.158.165.59', '2020-08-01 17:52:19'),
(500, '172.69.135.231', '2020-08-01 17:54:48'),
(501, '162.158.75.105', '2020-08-02 06:35:08'),
(502, '172.69.135.239', '2020-08-03 05:35:12'),
(503, '172.69.135.127', '2020-08-03 05:38:29'),
(504, '172.69.218.141', '2020-08-03 05:38:30'),
(505, '162.158.167.21', '2020-08-03 05:51:19'),
(506, '172.69.218.143', '2020-08-03 10:51:49'),
(507, '172.69.63.142', '2020-08-03 16:35:35'),
(508, '173.245.54.182', '2020-08-03 16:35:35'),
(509, '172.68.146.155', '2020-08-03 17:19:15'),
(510, '162.158.75.77', '2020-08-04 21:57:03'),
(511, '172.69.63.158', '2020-08-05 11:58:33'),
(512, '172.68.65.133', '2020-08-05 11:58:33'),
(513, '172.68.146.203', '2020-08-05 17:10:20'),
(514, '108.162.245.165', '2020-08-05 22:46:44'),
(515, '162.158.106.129', '2020-08-05 22:46:45'),
(516, '172.68.65.229', '2020-08-05 22:46:51'),
(517, '162.158.78.217', '2020-08-05 22:47:00'),
(518, '172.69.63.236', '2020-08-05 22:47:00'),
(519, '173.245.54.228', '2020-08-05 22:47:05'),
(520, '172.69.63.218', '2020-08-05 22:47:05'),
(521, '172.69.63.248', '2020-08-05 22:47:21'),
(522, '172.69.63.180', '2020-08-05 22:47:21'),
(523, '173.245.54.242', '2020-08-05 22:47:22'),
(524, '172.69.63.144', '2020-08-05 22:47:22'),
(525, '162.158.165.127', '2020-08-06 13:23:44'),
(526, '172.69.135.227', '2020-08-06 15:50:02'),
(527, '162.158.165.155', '2020-08-06 15:50:36'),
(528, '162.158.165.179', '2020-08-07 03:57:01'),
(529, '172.69.63.24', '2020-08-07 10:28:57'),
(530, '162.158.78.227', '2020-08-07 10:28:57'),
(531, '162.158.74.210', '2020-08-08 03:04:41'),
(532, '162.158.75.201', '2020-08-08 03:04:44'),
(533, '162.158.165.193', '2020-08-08 03:06:42'),
(534, '172.69.134.162', '2020-08-08 11:19:13'),
(535, '108.162.245.169', '2020-08-08 11:19:35'),
(536, '162.158.165.219', '2020-08-08 13:47:54'),
(537, '172.69.218.133', '2020-08-08 17:28:17'),
(538, '172.69.134.138', '2020-08-09 03:59:01'),
(539, '108.162.219.97', '2020-08-09 09:18:40'),
(540, '162.158.62.88', '2020-08-09 09:57:22'),
(541, '108.162.219.25', '2020-08-09 10:30:53'),
(542, '173.245.52.196', '2020-08-09 11:06:18'),
(543, '173.245.52.80', '2020-08-09 11:27:26'),
(544, '172.69.63.64', '2020-08-10 07:56:00'),
(545, '173.245.54.68', '2020-08-10 07:56:02'),
(546, '162.158.34.199', '2020-08-10 07:56:12'),
(547, '162.158.34.213', '2020-08-10 07:56:13'),
(548, '108.162.215.195', '2020-08-10 07:58:02'),
(549, '162.158.119.236', '2020-08-10 07:58:03'),
(550, '162.158.119.166', '2020-08-10 07:58:08'),
(551, '162.158.118.199', '2020-08-10 07:58:19'),
(552, '162.158.7.182', '2020-08-10 08:04:26'),
(553, '108.162.245.51', '2020-08-10 09:08:06'),
(554, '172.68.146.209', '2020-08-10 13:48:27'),
(555, '162.158.166.92', '2020-08-10 18:18:54'),
(556, '162.158.107.170', '2020-08-10 22:17:33'),
(557, '162.158.165.65', '2020-08-11 11:10:18'),
(558, '162.158.166.188', '2020-08-11 11:10:51'),
(559, '162.158.166.230', '2020-08-11 11:11:18'),
(560, '162.158.165.99', '2020-08-11 11:21:45'),
(561, '162.158.167.103', '2020-08-11 11:24:01'),
(562, '103.25.248.239', '2020-08-11 12:23:28'),
(563, '162.158.167.9', '2020-08-11 12:25:28');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `web_title` varchar(200) NOT NULL,
  `web_slogan` varchar(200) NOT NULL,
  `web_modified` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `about_us` text NOT NULL,
  `contact_us` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` varchar(200) NOT NULL,
  `description` varchar(200) DEFAULT NULL,
  `keywords` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `web_title`, `web_slogan`, `web_modified`, `about_us`, `contact_us`, `email`, `address`, `description`, `keywords`) VALUES
(1, 'Math Corner', 'Prove yourself!', '0000-00-00 00:00:00', 'We are from Gazipur, Bangladesh We organize Math Contest for develop math skill.', ' 27 Road Gazipura              Gazipur, Bangladesh             Email:sojebsoft@gmail.com', 'sojebsoft@gmail.com', 'gazipura', 'The Math Corner Bd For Bangladeshi Student. Math Contest Bd.', 'math competition, math competition bd, math competition Bangladesh, mathcontest bd, math contest bd, bd mathcontest, bd math contest, Bangladesh math contest, Bangladesh mathcontest,contest,sojeb math');

-- --------------------------------------------------------

--
-- Table structure for table `winner_list`
--

CREATE TABLE `winner_list` (
  `id` int(11) NOT NULL,
  `problem_id` varchar(200) NOT NULL,
  `winner_id` varchar(200) NOT NULL,
  `winner_maker_id` varchar(200) NOT NULL,
  `ans_cat` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_register`
--
ALTER TABLE `admin_register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `answere`
--
ALTER TABLE `answere`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_reply`
--
ALTER TABLE `blog_reply`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `instructor`
--
ALTER TABLE `instructor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `leaderboard`
--
ALTER TABLE `leaderboard`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orders_detail`
--
ALTER TABLE `orders_detail`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`perm_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_category`
--
ALTER TABLE `product_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Indexes for table `role_perm`
--
ALTER TABLE `role_perm`
  ADD KEY `role_id` (`role_id`),
  ADD KEY `perm_id` (`perm_id`);

--
-- Indexes for table `submitted`
--
ALTER TABLE `submitted`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_link`
--
ALTER TABLE `tb_link`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ucode`
--
ALTER TABLE `ucode`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_role`
--
ALTER TABLE `user_role`
  ADD KEY `user_id` (`user_id`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `visitor`
--
ALTER TABLE `visitor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `web`
--
ALTER TABLE `web`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `winner_list`
--
ALTER TABLE `winner_list`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_register`
--
ALTER TABLE `admin_register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `answere`
--
ALTER TABLE `answere`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_reply`
--
ALTER TABLE `blog_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `instructor`
--
ALTER TABLE `instructor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `product_category`
--
ALTER TABLE `product_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3164;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ucode`
--
ALTER TABLE `ucode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=564;

--
-- AUTO_INCREMENT for table `web`
--
ALTER TABLE `web`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `winner_list`
--
ALTER TABLE `winner_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
