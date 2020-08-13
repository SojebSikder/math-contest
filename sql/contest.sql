-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 13, 2020 at 01:23 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `contest`
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
  `admin_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_category`
--

CREATE TABLE `blog_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `body` text NOT NULL,
  `comment_id` varchar(200) NOT NULL,
  `user_type` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_comments`
--

INSERT INTO `blog_comments` (`id`, `user_id`, `post_id`, `created_at`, `updated_at`, `body`, `comment_id`, `user_type`) VALUES
(8, '15f0c17af2e6c9', '15f2fda81053ec', '2020-08-10 05:55:12', NULL, 'hello my comments', '15f30e140125ee', 'user'),
(10, '15e33e46e4a171', '15f2fda81053ec', '2020-08-11 08:45:13', NULL, 'hello im instructor', '15f325a995b9d6', 'instructor');

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_description` text NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_email` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL,
  `blog_name` varchar(200) DEFAULT NULL,
  `blog_category` varchar(200) DEFAULT NULL,
  `blog_id` varchar(200) DEFAULT NULL,
  `blog_author_id` varchar(200) DEFAULT NULL,
  `blog_tag` text DEFAULT NULL,
  `blog_author` varchar(200) NOT NULL,
  `blog_status` varchar(200) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `blog_title`, `blog_description`, `blog_date`, `user_email`, `image`, `blog_name`, `blog_category`, `blog_id`, `blog_author_id`, `blog_tag`, `blog_author`, `blog_status`, `created_at`) VALUES
(10, 'Learn calculas', '<h1>Welcome to Tutorial</h1><p><span style=\"background-color: rgb(255, 0, 0);\">Tutorial</span> begin</p>', '2020-08-11 10:04:29', 'sojebsikder@gmail.com', NULL, 'Learn-calculas', 'Math', '15f2fd76c29729', '15e33e46e4a171', 'calculas, math', 'sojebsikder', 'Publish', '2020-08-11 10:10:15'),
(12, 'post with image', '<h1>Post with image</h1>', '2020-08-11 10:04:35', 'sojebsikder@gmail.com', 'assets/images/blog/adidas_Water_Drops-wallpaper-10653846.jpg1596971649-6862-adidas_Water_Drops-wallpaper-10653846.jpg', 'post-with-image', 'Math', '15f2fda81053ec', '15e33e46e4a171', 'image, with, post', 'sojebsikder', 'Publish', '2020-08-11 10:10:15'),
(15, 'আমার নাম সজিব', '<p>dsfedfd</p>', '2020-08-12 06:17:49', 'sojebsikder@gmail.com', 'assets/images/blog/1597213057-2403-', 'আমার-নাম-সজিব', 'Math', '15f33898101428', '15e33e46e4a171', '', 'sojebsikder', 'Publish', '2020-08-12 06:17:37'),
(17, 'as', '<p>asas</p>', '2020-08-13 10:25:29', 'sojebsikder@gmail.com', 'assets/images/blog/Argentina-a248e746-309a-40be-8152-ce1bb49bcd4a.jpg1597217403-5281-Argentina-a248e746-309a-40be-8152-ce1bb49bcd4a.jpg', 'as', 'Science', '15f339a7b5415a', '15e33e46e4a171', 'as', 'sojebsikder', 'Publish', '2020-08-12 07:30:03'),
(18, 'test (asdasd)', '<p>saddsd</p>', '2020-08-13 10:25:31', 'sojebsikder@gmail.com', 'assets/images/blog/1597314289-9728-', 'test-(asdasd)', 'Math', '15f3514f114093', '15e33e46e4a171', 'sd', 'sojebsikder', 'Publish', '2020-08-13 10:24:49'),
(19, 'পৃথিবীতে-পাহাড়ের-ভূমিকা-কি?-(কুরান-এবং-বিজ্ঞান-কি-বলে-এ-ব্যাপারে)', '<p>hello worldxc</p>', '2020-08-13 11:04:40', 'sojebsikder@gmail.com', 'assets/images/blog/Allah_arabic_words-98cae692-c1d2-4ed3-913e-212cedfa448d.jpg1597316680-4340-Allah_arabic_words-98cae692-c1d2-4ed3-913e-212cedfa448d.jpg', 'পৃথিবীতে-পাহাড়ের-ভূমিকা-কি?-(কুরান-এবং-বিজ্ঞান-কি-বলে-এ-ব্যাপারে)', 'Science', '15f351607cee92', '15e33e46e4a171', 'test', 'sojebsikder', 'Publish', '2020-08-13 10:29:27');

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
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(200) NOT NULL,
  `reply_id` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_reply`
--

INSERT INTO `blog_reply` (`id`, `user_id`, `comment_id`, `body`, `created_at`, `updated_at`, `user_type`, `reply_id`) VALUES
(16, '15f0c17af2e6c9', '15f30d64a2f4f1', 'hello', '2020-08-10 05:50:21', NULL, 'user', '15f30e01d2b927'),
(18, '15e33e46e4a171', '15f30e140125ee', 'my reply', '2020-08-11 08:47:31', NULL, 'instructor', '15f325b237020f');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `instructor`
--

CREATE TABLE `instructor` (
  `id` int(11) NOT NULL,
  `ins_name` varchar(200) NOT NULL,
  `ins_login` varchar(200) NOT NULL,
  `ins_pass` varchar(200) NOT NULL,
  `ins_registered` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `instructor`
--

INSERT INTO `instructor` (`id`, `ins_name`, `ins_login`, `ins_pass`, `ins_registered`, `ins_status`, `ins_display_name`, `ins_email`, `ins_type`, `ipadd`, `ins_city`, `ins_state`, `ins_country`, `ins_bio`, `ins_image`, `ins_user_id`, `ins_role`, `ins_date`) VALUES
(1, 'sojebsikder', 'sojebsikder@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-07-14 10:12:41', 'active', 'sojebsikder', 'sojebsikder@gmail.com', 'instructor', '::1', 'Gazipur', 'Dhaka', 'Bangladesh', 'I\'m Programmer', 'img/profile/Assassins_Creed_4-wallpaper-9669711.jpg1594462503-3794-Assassins_Creed_4-wallpaper-9669711.jpg', '15e33e46e4a171', 'admin', '2020-05-11'),
(2, 'sikdersojeb', 'sikdersojeb@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-07-04 09:03:41', 'active', 'sikdersojeb', 'sikdersojeb@gmail.com', 'instructor', '::1', '', '', '', '', '', '15eff156824063', 'instructor', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `leaderboard`
--

CREATE TABLE `leaderboard` (
  `id` int(11) NOT NULL,
  `user_email` varchar(200) NOT NULL,
  `user_id` varchar(200) NOT NULL,
  `points` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_name`, `type`, `message`, `status`, `date`) VALUES
(1, 'sojebsikder', 'info', 'Dear, sojebsikder Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.', 'read', '2020-07-13 12:32:49'),
(2, 'sojebsikder', 'info', 'Dear, sojebsikder Your order process have completed. Please check your email in 10 minute to get your product', 'read', '2020-07-13 12:53:57'),
(3, 'sikdersojeb', 'info', 'Dear, sikdersojeb Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.', 'read', '2020-07-13 17:00:27'),
(4, 'sojebsikder', 'info', 'Dear, sojebsikder Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.', 'read', '2020-07-15 12:33:22'),
(5, 'sojebsikder', 'info', 'Dear, sojebsikder Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.', 'read', '2020-07-15 12:38:52'),
(6, 'sojebsikder', 'info', 'Dear, sojebsikder Your order process have completed. Please check your email in 10 minutes to get your product', 'read', '2020-07-15 12:40:01'),
(7, 'sojebsikder', 'info', 'Dear, sojebsikder Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.', 'read', '2020-07-17 13:01:37');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `name`, `date`, `username`, `status`, `b_number`, `b_trans`, `user_id`, `product_id`, `useremail`, `via`) VALUES
(1, 'PHP Tutorial PDF Book', '2020-07-15', 'sojebsikder', 1, '01833962595', ' ttttfcgg', '15e33e46e4a171', '15f0aaeaa7d578', 'sojebsikder@gmail.com', 'sojebsikder@gmail.com'),
(2, 'PHP Tutorial PDF Book', '2020-07-17', 'sojebsikder', 0, '45245', ' 44524', '15f0c17af2e6c9', '15f0aaeaa7d578', 'sojebsikder@gmail.com', 'sojebsikder@gmail.com');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_detail`
--

INSERT INTO `orders_detail` (`id`, `orders_id`, `price`, `quantity`, `product_id`) VALUES
(1, 1, '90', 1, '15f0aaeaa7d578'),
(2, 2, '90', 1, '15f0aaeaa7d578');

-- --------------------------------------------------------

--
-- Table structure for table `permissions`
--

CREATE TABLE `permissions` (
  `perm_id` int(11) NOT NULL,
  `perm_desc` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `post_title` varchar(200) NOT NULL,
  `post_author` varchar(200) NOT NULL,
  `post_date` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `post_content` varchar(200) NOT NULL,
  `post_image` varchar(200) NOT NULL,
  `category` varchar(200) NOT NULL,
  `problem` varchar(200) NOT NULL,
  `post_ans` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `post_title`, `post_author`, `post_date`, `post_modified`, `post_content`, `post_image`, `category`, `problem`, `post_ans`) VALUES
(4, 'df', 'sojebsikder', '2020-08-12 07:09:49', '2020-08-12 07:09:49', 'df', 'img/post_image/1597216189-9508-', 'Daily Math Challenge', '15f3395bd49ac3', 10);

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `qnty`, `description`, `image`, `product_id`, `url`, `image2`, `image3`, `meta_keywords`, `category`) VALUES
(1, 'PHP Tutorial PDF Book', '90', 10, 'This is PHP Tutorial PDF Book', 'img/product/Assassins_Creed_4-wallpaper-9669711.jpg1595068271-7622-Assassins_Creed_4-wallpaper-9669711.jpg', '15f0aaeaa7d578', '', NULL, NULL, 'php books,', 'Programming'),
(5, 'asd', '0', 20, 'hghg', 'img/product/1594979470-4198-', '15f11748e3b085', 'assets/file/1594979470-4198-', NULL, NULL, NULL, 'Science'),
(6, 'dfgf', '0', 10, 'dgfg', 'img/product/1594979631-6222-', '15f11752f3e134', 'assets/file/1594979631-6222-', NULL, NULL, NULL, 'Novel'),
(7, 'dfsgfdsgdfs', '0', 10, 'jlkjlk', 'img/product/1594979645-3428-', '15f11753db7854', 'assets/file/1594979645-3428-', NULL, NULL, NULL, 'Novel'),
(8, '4545', '4545', 5454, '54545', 'img/product/1594979649-4883-', '15f117541a3a4a', 'assets/file/1594979649-4883-', NULL, NULL, NULL, NULL),
(9, '4545', '545', 4545, '4545', 'img/product/1594979652-3008-', '15f1175449dfc7', 'assets/file/1594979652-3008-', NULL, NULL, NULL, NULL),
(10, '4545', '545', 4545, '4545', 'img/product/1594979655-8358-', '15f1175475be58', 'assets/file/1594979655-8358-', NULL, NULL, NULL, NULL),
(11, '5454', '454', 545, '4545', 'img/product/1594979659-3231-', '15f11754b1f68d', 'assets/file/1594979659-3231-', NULL, NULL, NULL, NULL),
(12, '3', '63535', 53245, '32542', 'img/product/Fractal_Lion-wallpaper-10874951.jpg1595056200-6201-Fractal_Lion-wallpaper-10874951.jpg', '15f12a048541dc', 'assets/file/1595056200-6201-', 'img/product/Happy_New_Year-wallpaper-9459272.jpg1595056200-6201-Happy_New_Year-wallpaper-9459272.jpg', 'img/product/Goku_god-wallpaper-10719080.jpg1595056200-6201-Goku_god-wallpaper-10719080.jpg', NULL, NULL),
(13, 'wewe', '90', 1241, 'mpbec', 'img/product/1595138260-1346-', '15f13e0d4dc5ee', 'assets/file/1595138260-1346-', 'img/product/1595138260-1346-', 'img/product/1595138260-1346-', '', 'Islamic');

-- --------------------------------------------------------

--
-- Table structure for table `product_category`
--

CREATE TABLE `product_category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cat_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `user_registered` timestamp NOT NULL DEFAULT current_timestamp(),
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `user_name`, `user_login`, `user_pass`, `user_registered`, `user_status`, `display_name`, `user_email`, `type`, `ipadd`, `user_date`, `user_city`, `user_state`, `user_country`, `user_bio`, `user_image`, `user_id`) VALUES
(6, 'sojebsikder', 'sojebsikder@gmail.com', 'c0035b21cc82f4cc08b169ba252458d3', '2020-07-13 08:13:35', 'active', 'sojebsikder', 'sojebsikder@gmail.com', 'user', '::1', '0000-00-00', '', '', '', '', 'img/profile/Argentina-a248e746-309a-40be-8152-ce1bb49bcd4a.jpg1596975834-7184-Argentina-a248e746-309a-40be-8152-ce1bb49bcd4a.jpg', '15f0c17af2e6c9');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `role_perm`
--

CREATE TABLE `role_perm` (
  `role_id` int(11) NOT NULL,
  `perm_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tb_link`
--

CREATE TABLE `tb_link` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `link` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `visitor`
--

CREATE TABLE `visitor` (
  `id` int(11) NOT NULL,
  `ip` text NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor`
--

INSERT INTO `visitor` (`id`, `ip`, `date`) VALUES
(1, '::1', '2020-07-06 08:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `web`
--

CREATE TABLE `web` (
  `id` int(11) NOT NULL,
  `web_title` varchar(200) NOT NULL,
  `web_slogan` varchar(200) NOT NULL,
  `web_modified` timestamp NOT NULL DEFAULT current_timestamp(),
  `about_us` text NOT NULL,
  `contact_us` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `address` text DEFAULT NULL,
  `description` text DEFAULT NULL,
  `keywords` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `web_title`, `web_slogan`, `web_modified`, `about_us`, `contact_us`, `email`, `address`, `description`, `keywords`) VALUES
(1, 'Math Corner', 'Prove yourself!', '0000-00-00 00:00:00', 'We are from Bhawal Badre Alom Govt. College,Gazipur,Bangladesh We organize Math Contest for Intermediate Student to developing math skill.', ' 27 Road Gazipura              Gazipur,Bangladesh             Email:sojebsoft@gmail.com', 'sojebsoft@gmail.com', 'gazipura', 'The Math Contest.', 'sojebsoft, sojebsoft download, math, contest');

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
-- Indexes for table `blog_category`
--
ALTER TABLE `blog_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_comments`
--
ALTER TABLE `blog_comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blog_category`
--
ALTER TABLE `blog_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `blog_reply`
--
ALTER TABLE `blog_reply`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `orders_detail`
--
ALTER TABLE `orders_detail`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `permissions`
--
ALTER TABLE `permissions`
  MODIFY `perm_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `tb_link`
--
ALTER TABLE `tb_link`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ucode`
--
ALTER TABLE `ucode`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visitor`
--
ALTER TABLE `visitor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

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

--
-- Constraints for dumped tables
--

--
-- Constraints for table `role_perm`
--
ALTER TABLE `role_perm`
  ADD CONSTRAINT `role_perm_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`),
  ADD CONSTRAINT `role_perm_ibfk_2` FOREIGN KEY (`perm_id`) REFERENCES `permissions` (`perm_id`);

--
-- Constraints for table `user_role`
--
ALTER TABLE `user_role`
  ADD CONSTRAINT `user_role_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `register` (`id`),
  ADD CONSTRAINT `user_role_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
