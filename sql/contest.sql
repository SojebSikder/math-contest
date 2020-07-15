-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 14, 2020 at 12:32 PM
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

--
-- Dumping data for table `answere`
--

INSERT INTO `answere` (`id`, `user_ans`, `user_email`, `user_id`, `user_name`, `user_image`, `user_login`, `user_type`, `ipadd`, `ans_linkid`, `ans_cat`, `user_unique_id`) VALUES
(3, 40, 'sikdersojeb@gmail.com', 2, 'sikdersojeb', 'img/profile/Amazing_Spiderman-wallpaper-10278390.jpg1593591408-1064-Amazing_Spiderman-wallpaper-10278390.jpg', 'sikdersojeb@gmail.com', 'user', '::1', '15f0c104d33a10', 'Daily Math Challenge', '13b3d70197c340'),
(4, 20, 'sikdersojeb@gmail.com', 2, 'sikdersojeb', 'img/profile/Amazing_Spiderman-wallpaper-10278390.jpg1593591408-1064-Amazing_Spiderman-wallpaper-10278390.jpg', 'sikdersojeb@gmail.com', 'user', '::1', '15f0c105fc3acd', 'Weekly Math Challenge', '13b3d70197c340'),
(5, 60, 'sojebsikder@gmail.com', 6, 'sojebsikder', '', 'sojebsikder@gmail.com', 'user', '::1', '15f0d888f6078a', 'Daily Math Challenge', '15f0c17af2e6c9');

-- --------------------------------------------------------

--
-- Table structure for table `blog_comments`
--

CREATE TABLE `blog_comments` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `body` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `id` int(11) NOT NULL,
  `blog_title` varchar(200) NOT NULL,
  `blog_description` varchar(200) NOT NULL,
  `blog_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_email` varchar(200) NOT NULL,
  `image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`id`, `blog_title`, `blog_description`, `blog_date`, `user_email`, `image`) VALUES
(2, 'How to write a good article', 'Today we will learn how to write own article', '2020-07-11 08:07:23', 'sojebsikder@gmail.com', NULL),
(3, 'Welcome', 'HEllo guys im, sojeb sikder. Admin', '2020-07-11 08:17:04', 'sojebsikder@gmail.com', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `blog_reply`
--

CREATE TABLE `blog_reply` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `comment_id` int(11) NOT NULL,
  `body` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `cat_name` varchar(200) NOT NULL,
  `cate_status` enum('Publish','Unpublish') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `cat_name`, `cate_status`) VALUES
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
(2, 'sikdersojeb', 'sikdersojeb@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-07-04 09:03:41', 'active', 'sikdersojeb', 'sikdersojeb@gmail.com', 'instructor', '::1', '', '', '', '', '', '15eff156824063', 'instructor', '0000-00-00'),
(11, 'qw', 'qw@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-07-14 09:37:13', 'deactive', 'qw', 'qw@gmail.com', 'instructor', '::1', NULL, NULL, NULL, NULL, NULL, '15f0d7cc9133cb', NULL, '0000-00-00');

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

--
-- Dumping data for table `leaderboard`
--

INSERT INTO `leaderboard` (`id`, `user_email`, `user_id`, `points`) VALUES
(2, 'sikdersojeb@gmail.com', '13b3d70197c340', '7'),
(3, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '2');

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
(3, 'sikdersojeb', 'info', 'Dear, sikdersojeb Your order have been place. Wait 1/2 business day for your order ready. After your order ready we will let you know.', 'read', '2020-07-13 17:00:27');

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
(1, 'CSS PDF BOOK', '2020-07-13', 'sojebsikder', 1, '01833962595', ' fdgf484d8fgfgdfdf1212', '15e33e28c2d1fa', '15f0ae303db484', 'sojebsikder@gmail.com', 'sojebsikder@gmail.com'),
(2, 'PHP Tutorial PDF Book', '2020-07-13', 'sikdersojeb', 0, '01833962595', ' fdgf484d8fgfgdfdf1212', '13b3d70197c340', '15f0aaeaa7d578', 'sikdersojeb@gmail.com', 'sikdersojeb@gmail.com');

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
(1, 1, '70', 1, '15'),
(2, 2, '90', 1, '15');

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
(1, 'problem 1', 'sojebsikder', '2020-07-13 07:42:05', '2020-07-13 07:42:05', '20+20', 'img/post_image/adidas_Water_Drops-wallpaper-10653846.jpg1594626125-2816-adidas_Water_Drops-wallpaper-10653846.jpg', 'Daily Math Challenge', '15f0c104d33a10', 40),
(2, 'problem 1', 'sojebsikder', '2020-07-13 07:42:23', '2020-07-13 07:42:23', '10+10', 'img/post_image/Alan_Walker-418a76d7-f861-4ba0-9e0f-4989119eaa64.jpg1594626143-4139-Alan_Walker-418a76d7-f861-4ba0-9e0f-4989119eaa64.jpg', 'Weekly Math Challenge', '15f0c105fc3acd', 20),
(3, 'problem 3', 'sojebsikder', '2020-07-14 10:27:27', '2020-07-14 10:27:27', '30+30', 'img/post_image/1594722447-8189-', 'Daily Math Challenge', '15f0d888f6078a', 60);

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
  `url` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `name`, `price`, `qnty`, `description`, `image`, `product_id`, `url`) VALUES
(1, 'PHP Tutorial PDF Book', '90', 10, 'This is PHP Tutorial PDF Book', 'img/product/adidas_Water_Drops-wallpaper-10653846.jpg1594535594-8967-adidas_Water_Drops-wallpaper-10653846.jpg', '15f0aaeaa7d578', '');

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
(2, 'sikdersojeb', 'sikdersojeb@gmail.com', '202cb962ac59075b964b07152d234b70', '2001-06-30 06:22:17', 'active', 'sikdersojeb', 'sikdersojeb@gmail.com', 'user', '::1', '2020-01-13', 'Gazipur', 'Dhaka', 'Bangladesh', 'fdf', 'img/profile/Amazing_Spiderman-wallpaper-10278390.jpg1593591408-1064-Amazing_Spiderman-wallpaper-10278390.jpg', '13b3d70197c340'),
(6, 'sojebsikder', 'sojebsikder@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-07-13 08:13:35', 'active', 'sojebsikder', 'sojebsikder@gmail.com', 'user', '::1', '0000-00-00', '', '', '', '', '', '15f0c17af2e6c9');

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

--
-- Dumping data for table `submitted`
--

INSERT INTO `submitted` (`id`, `user_ans`, `user_email`, `user_unique_id`, `ip`, `ans_linkid`, `ans_cat`, `date`) VALUES
(3, 40, 'sikdersojeb@gmail.com', '13b3d70197c340', '::1', '15f0c104d33a10', 'Daily Math Challenge', '2020-07-14 05:06:39'),
(4, 20, 'sikdersojeb@gmail.com', '13b3d70197c340', '::1', '15f0c105fc3acd', 'Weekly Math Challenge', '2020-07-14 05:06:44'),
(5, 60, 'sojebsikder@gmail.com', '15f0c17af2e6c9', '::1', '15f0d888f6078a', 'Daily Math Challenge', '2020-07-14 10:27:47');

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
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `web`
--

INSERT INTO `web` (`id`, `web_title`, `web_slogan`, `web_modified`, `about_us`, `contact_us`, `email`, `address`) VALUES
(1, 'Math Contest', 'Prove yourself!', '0000-00-00 00:00:00', 'We are from Bhawal Badre Alom Govt. College,Gazipur,Bangladesh We organize Math Contest for Intermediate Student to developing math skill.', ' 27 Road Gazipura              Gazipur,Bangladesh             Email:sojebsoft@gmail.com', 'sojebsoft@gmail.com', 'gazipura');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `blog_comments`
--
ALTER TABLE `blog_comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `leaderboard`
--
ALTER TABLE `leaderboard`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `submitted`
--
ALTER TABLE `submitted`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

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
