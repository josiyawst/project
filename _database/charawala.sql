-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Mar 15, 2019 at 07:05 AM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `charawala`
--

-- --------------------------------------------------------

--
-- Table structure for table `cw_category`
--

CREATE TABLE `cw_category` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `image` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_content`
--

CREATE TABLE `cw_content` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `website_url` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw_content`
--

INSERT INTO `cw_content` (`id`, `title`, `content`, `website_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'About Us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, 1, '2019-03-15 06:01:53', '2019-03-15 06:01:53'),
(2, 'Concept Info', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, 1, '2019-03-15 06:01:53', '2019-03-15 06:01:53'),
(3, 'Privacy Policy', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, 1, '2019-03-15 06:01:53', '2019-03-15 06:01:53'),
(4, 'Terms & Conditions', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.\r\n\r\nSed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur?', NULL, 1, '2019-03-15 06:01:53', '2019-03-15 06:01:53');

-- --------------------------------------------------------

--
-- Table structure for table `cw_customer`
--

CREATE TABLE `cw_customer` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `business_name` varchar(255) DEFAULT NULL,
  `primary_phone` varchar(255) DEFAULT NULL,
  `alternate_phone` varchar(255) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `city_village` varchar(100) NOT NULL,
  `district` varchar(100) NOT NULL,
  `taluk` varchar(100) NOT NULL,
  `area` varchar(100) NOT NULL,
  `pincode` varchar(10) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw_customer`
--

INSERT INTO `cw_customer` (`id`, `role_id`, `name`, `business_name`, `primary_phone`, `alternate_phone`, `address`, `city_village`, `district`, `taluk`, `area`, `pincode`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'John Doe', NULL, '1234567890', NULL, '', '', '', '', '', '', 1, '2018-10-04 06:16:47', '2019-03-14 03:59:24');

-- --------------------------------------------------------

--
-- Table structure for table `cw_customer_role`
--

CREATE TABLE `cw_customer_role` (
  `id` int(11) NOT NULL,
  `role` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw_customer_role`
--

INSERT INTO `cw_customer_role` (`id`, `role`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Farmer', 1, '2019-03-14 06:24:54', '2019-03-14 06:24:54'),
(2, 'Fertilizer Supplier', 1, '2019-03-14 06:24:54', '2019-03-14 06:24:54'),
(3, 'Agri Equipment Supplier', 1, '2019-03-14 06:24:54', '2019-03-14 06:24:54'),
(4, 'Cold Storage', 1, '2019-03-14 06:24:54', '2019-03-14 06:24:54'),
(5, 'Wholesaler', 1, '2019-03-14 06:24:54', '2019-03-14 06:24:54'),
(6, 'Exporters', 1, '2019-03-14 06:24:54', '2019-03-14 06:24:54');

-- --------------------------------------------------------

--
-- Table structure for table `cw_notification`
--

CREATE TABLE `cw_notification` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `sent_status` tinyint(4) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_notification_user`
--

CREATE TABLE `cw_notification_user` (
  `id` int(11) NOT NULL,
  `notification_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `read_status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_produce`
--

CREATE TABLE `cw_produce` (
  `id` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `selling_unit_id` int(11) NOT NULL,
  `produce_name` varchar(255) NOT NULL,
  `grade_quality` varchar(255) NOT NULL,
  `unit_price` decimal(16,2) NOT NULL,
  `available_quantity` int(5) NOT NULL,
  `details` varchar(500) DEFAULT NULL,
  `image1` varchar(255) DEFAULT NULL,
  `image2` varchar(255) DEFAULT NULL,
  `image3` varchar(255) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_selling_unit`
--

CREATE TABLE `cw_selling_unit` (
  `id` int(11) NOT NULL,
  `unit` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `cw_user`
--

CREATE TABLE `cw_user` (
  `id` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `address` text,
  `facebook_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `pinterest_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `twitter_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `youtube_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `linkedin_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `instagram_enabled` tinyint(4) NOT NULL DEFAULT '1',
  `facebook_url` varchar(255) NOT NULL,
  `pinterest_url` varchar(255) NOT NULL,
  `twitter_url` varchar(255) NOT NULL,
  `youtube_url` varchar(255) NOT NULL,
  `linkedin_url` varchar(255) NOT NULL,
  `instagram_url` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `reset_pwd_status` int(11) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw_user`
--

INSERT INTO `cw_user` (`id`, `group_id`, `name`, `email`, `phone`, `address`, `facebook_enabled`, `pinterest_enabled`, `twitter_enabled`, `youtube_enabled`, `linkedin_enabled`, `instagram_enabled`, `facebook_url`, `pinterest_url`, `twitter_url`, `youtube_url`, `linkedin_url`, `instagram_url`, `password`, `reset_pwd_status`, `remember_token`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Charawala', 'johndoetesting123@gmail.com', '1234567890', 'Lorem ipsum, \r\ndolor sit amet,\r\nabcdefg - 123456', 1, 1, 1, 1, 1, 1, '', '', '', '', '', '', '$2y$10$P1n5DUSGtwMeris9OUkVY.O9I9xJgopLXC.BJshbSEwHtD1/UgH9W', 2, 'u47x5BY0ATSwfX1SkL0htjGnJiiEDsRjQy2cREy2kdKu5rH5kJdh4AQELhZe', 1, '2018-10-04 06:16:47', '2019-03-15 05:01:38');

-- --------------------------------------------------------

--
-- Table structure for table `cw_user_group`
--

CREATE TABLE `cw_user_group` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cw_user_group`
--

INSERT INTO `cw_user_group` (`id`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Super Administrator Group', 1, '2018-11-03 06:35:35', '2018-12-07 04:35:34');

-- --------------------------------------------------------

--
-- Table structure for table `cw_video`
--

CREATE TABLE `cw_video` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `youtube_video_url` varchar(255) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cw_category`
--
ALTER TABLE `cw_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_content`
--
ALTER TABLE `cw_content`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_customer`
--
ALTER TABLE `cw_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_customer_role`
--
ALTER TABLE `cw_customer_role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_notification`
--
ALTER TABLE `cw_notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_notification_user`
--
ALTER TABLE `cw_notification_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_produce`
--
ALTER TABLE `cw_produce`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_selling_unit`
--
ALTER TABLE `cw_selling_unit`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_user`
--
ALTER TABLE `cw_user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_user_group`
--
ALTER TABLE `cw_user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cw_video`
--
ALTER TABLE `cw_video`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cw_category`
--
ALTER TABLE `cw_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cw_content`
--
ALTER TABLE `cw_content`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `cw_customer`
--
ALTER TABLE `cw_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_customer_role`
--
ALTER TABLE `cw_customer_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cw_notification`
--
ALTER TABLE `cw_notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `cw_notification_user`
--
ALTER TABLE `cw_notification_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `cw_produce`
--
ALTER TABLE `cw_produce`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cw_selling_unit`
--
ALTER TABLE `cw_selling_unit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `cw_user`
--
ALTER TABLE `cw_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_user_group`
--
ALTER TABLE `cw_user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `cw_video`
--
ALTER TABLE `cw_video`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
