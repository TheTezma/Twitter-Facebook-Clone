-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2016 at 11:55 AM
-- Server version: 10.1.10-MariaDB
-- PHP Version: 7.0.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `usersystem`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment_user_id` int(11) NOT NULL,
  `comment_username` varchar(255) NOT NULL,
  `comment_picture` varchar(255) NOT NULL,
  `comment_content` varchar(240) NOT NULL,
  `comment_date` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `comment_user_id`, `comment_username`, `comment_picture`, `comment_content`, `comment_date`) VALUES
(6, 40, 3, 'Tezma', 'fb_icon_325x325.png', 'asdfadsf', 1477490541),
(7, 40, 3, 'Tezma', 'fb_icon_325x325.png', 'asdfasdaf', 1477490544),
(8, 40, 3, 'Tezma', 'fb_icon_325x325.png', 'TESTING COMMENTS\r\nASDF ASDF\r\nASDF', 1477490551),
(9, 38, 3, 'Tezma', 'fb_icon_325x325.png', 'asdfasdf', 1477714924),
(10, 11, 3, 'Tezma', 'fb_icon_325x325.png', 'dafds fasd fasdf asdfasdfa', 1477805091),
(11, 40, 4, 'Admin', 'default.jpg', 'testaseta', 1477914010);

-- --------------------------------------------------------

--
-- Table structure for table `following`
--

CREATE TABLE `following` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `following`
--

INSERT INTO `following` (`id`, `user_id1`, `user_id2`) VALUES
(10, 4, 3),
(12, 3, 4);

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `post_id`, `user_id`) VALUES
(7, 0, 0),
(8, 0, 0),
(9, 0, 0),
(10, 0, 0),
(11, 0, 0),
(12, 0, 0),
(13, 0, 0),
(14, 0, 0),
(15, 0, 0),
(16, 0, 0),
(17, 0, 0),
(18, 0, 0),
(19, 0, 0),
(20, 0, 0),
(21, 0, 0),
(22, 0, 0),
(23, 0, 0),
(24, 0, 0),
(25, 0, 0),
(26, 0, 0),
(27, 0, 0),
(28, 0, 0),
(29, 0, 0),
(30, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `user_id1`, `user_id2`, `message`, `timestamp`) VALUES
(41, 3, 4, 'adfasdfa', 1476597828),
(44, 3, 4, 'asdf', 0),
(45, 3, 4, 'fa', 0),
(46, 3, 4, 'asdf', 1478854500),
(47, 3, 0, 'test', 1478978041),
(48, 3, 0, 'test', 1478978043),
(49, 3, 0, 'asdf', 1478978102),
(50, 3, 0, 'sadf', 1479198575),
(51, 3, 0, 'sadf', 1479813721),
(52, 3, 0, 'asdfasdfasdf', 1479813724),
(53, 3, 0, 'asdf', 1480229032),
(54, 4, 3, 'sadf', 1480231135),
(55, 4, 3, 'sadf', 1480231136),
(56, 4, 3, 'sadf', 1480231137),
(57, 4, 3, 'sadf', 1480231137),
(58, 4, 3, 'asdf', 1480231142),
(59, 3, 0, '<?php echo $Username ?>', 1480732345),
(60, 3, 0, 'asdf', 1480732551),
(61, 3, 0, 'asdf', 1480732563),
(62, 3, 0, 't', 1480732614),
(63, 3, 0, 'tt', 1480732676),
(64, 3, 0, 'teat', 1480733145),
(65, 3, 0, 'adsf', 1480733668),
(66, 3, 0, 'asdf', 1480733805),
(67, 3, 0, 't', 1480733870),
(68, 3, 0, 'fsadf', 1480733879),
(69, 3, 0, 'fdasf', 1480733910),
(70, 3, 0, 'asdfad', 1480733919),
(71, 3, 0, 'asdf', 1480733935),
(72, 3, 0, 'asdf', 1480734096),
(73, 4, 0, 'asdf', 1480735160),
(74, 4, 0, 'asdf', 1480735167),
(75, 4, 0, 'ga', 1480735168),
(76, 4, 0, 'sdga', 1480735168),
(77, 4, 0, 'sdg', 1480735168),
(78, 4, 0, 'asd', 1480735169),
(79, 4, 0, 'g', 1480735169);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `user_id1` int(11) NOT NULL,
  `user_id2` int(11) NOT NULL,
  `notification_desc` varchar(255) NOT NULL,
  `notification_picture` varchar(255) NOT NULL,
  `notification_time` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `user_id1`, `user_id2`, `notification_desc`, `notification_picture`, `notification_time`) VALUES
(2, 4, 3, 'Admin has followed you!', 'default.jpg', 1477719307);

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `picture` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `timestamp` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `username`, `picture`, `content`, `timestamp`) VALUES
(107, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481011886),
(108, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481011985),
(109, 3, 'Tezma', 'uCqHd16.jpg', 'hafghareyagf', 1481011987),
(110, 3, 'Tezma', 'uCqHd16.jpg', 'hndhgaag', 1481011990),
(111, 3, 'Tezma', 'uCqHd16.jpg', 'haeRADGADG', 1481011992),
(112, 3, 'Tezma', 'uCqHd16.jpg', '23141234', 1481012313),
(113, 3, 'Tezma', 'uCqHd16.jpg', 'dfa', 1481012417),
(114, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481012438),
(115, 3, 'Tezma', 'uCqHd16.jpg', 'gadf', 1481012439),
(116, 3, 'Tezma', 'uCqHd16.jpg', 'hadfh', 1481012440),
(117, 3, 'Tezma', 'uCqHd16.jpg', 'hga', 1481012441),
(118, 3, 'Tezma', 'uCqHd16.jpg', 'hadfh', 1481012442),
(119, 3, 'Tezma', 'uCqHd16.jpg', '254', 1481012449),
(120, 3, 'Tezma', 'uCqHd16.jpg', '2354', 1481012450),
(121, 3, 'Tezma', 'uCqHd16.jpg', '65462', 1481012451),
(122, 3, 'Tezma', 'uCqHd16.jpg', '345', 1481012452),
(123, 3, 'Tezma', 'uCqHd16.jpg', '7547', 1481012454),
(124, 3, 'Tezma', 'uCqHd16.jpg', '272', 1481012455),
(125, 3, 'Tezma', 'uCqHd16.jpg', '75437', 1481012456),
(126, 3, 'Tezma', 'uCqHd16.jpg', '25624', 1481012457),
(127, 3, 'Tezma', 'uCqHd16.jpg', '134545', 1481012458),
(128, 3, 'Tezma', 'uCqHd16.jpg', '57347', 1481012459),
(129, 3, 'Tezma', 'uCqHd16.jpg', '2346', 1481012461),
(130, 3, 'Tezma', 'uCqHd16.jpg', '5463', 1481012462),
(131, 3, 'Tezma', 'uCqHd16.jpg', '2546256', 1481012463),
(132, 3, 'Tezma', 'uCqHd16.jpg', '2345', 1481012466),
(133, 3, 'Tezma', 'uCqHd16.jpg', '2562', 1481012467),
(134, 3, 'Tezma', 'uCqHd16.jpg', '8268', 1481012468),
(135, 3, 'Tezma', 'uCqHd16.jpg', '134', 1481012469),
(136, 3, 'Tezma', 'uCqHd16.jpg', '567256', 1481012471),
(137, 3, 'Tezma', 'uCqHd16.jpg', '45', 1481012473),
(138, 3, 'Tezma', 'uCqHd16.jpg', 'sdf', 1481012474),
(139, 3, 'Tezma', 'uCqHd16.jpg', 'aSD', 1481012861),
(140, 3, 'Tezma', 'uCqHd16.jpg', 'ASDF', 1481012930),
(141, 3, 'Tezma', 'uCqHd16.jpg', 'ASDF', 1481012934),
(142, 3, 'Tezma', 'uCqHd16.jpg', 'ASDF', 1481012936),
(143, 3, 'Tezma', 'uCqHd16.jpg', 'FADHAFDH', 1481012938),
(144, 3, 'Tezma', 'uCqHd16.jpg', 'ADF', 1481012939),
(145, 3, 'Tezma', 'uCqHd16.jpg', 'as', 1481013462),
(146, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481061194),
(147, 3, 'Tezma', 'uCqHd16.jpg', 'asdfg', 1481061202),
(148, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481071355),
(149, 4, 'Admin', 'default.jpg', 'sdfg', 1481071580),
(150, 4, 'Admin', 'default.jpg', 'asdf', 1481071585),
(151, 4, 'Admin', 'default.jpg', 'gfadg', 1481071586),
(152, 4, 'Admin', 'default.jpg', 'asdf', 1481071844),
(153, 4, 'Admin', 'default.jpg', 'asdf', 1481071853),
(154, 3, 'Tezma', 'uCqHd16.jpg', 'adsf', 1481071858),
(155, 3, 'Tezma', 'uCqHd16.jpg', '54', 1481071865),
(156, 3, 'Tezma', 'uCqHd16.jpg', 'g', 1481145371),
(157, 4, 'Admin', 'default.jpg', 'dasf', 1481152818),
(158, 4, 'Admin', 'default.jpg', 'asdf', 1481152840),
(159, 4, 'Admin', 'default.jpg', 'adsf', 1481152892),
(160, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481153251),
(161, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481162979),
(162, 3, 'Tezma', 'uCqHd16.jpg', 'g', 1481321326),
(163, 3, 'Tezma', 'uCqHd16.jpg', 'asdassd rf', 1481602107),
(164, 3, 'Tezma', 'uCqHd16.jpg', 'asd #test', 1481633024),
(165, 3, 'Tezma', 'uCqHd16.jpg', '#test', 1481633044),
(166, 3, 'Tezma', 'uCqHd16.jpg', 'sadf', 1481693236),
(167, 3, 'Tezma', 'uCqHd16.jpg', 'asdf', 1481693253),
(168, 3, 'Tezma', 'uCqHd16.jpg', 'asdfasdf', 1481693254),
(169, 3, 'Tezma', 'uCqHd16.jpg', 'hgadfhadfhadfh', 1481693255),
(170, 3, 'Tezma', 'uCqHd16.jpg', 'asdfasdf', 1481693420),
(171, 3, 'Tezma', 'uCqHd16.jpg', 'adsf', 1481693522),
(172, 3, 'Tezma', 'uCqHd16.jpg', 'd', 1481694036),
(173, 3, 'Tezma', 'uCqHd16.jpg', 'f', 1481694041),
(174, 3, 'Tezma', 'uCqHd16.jpg', 'asdasdasd', 1481694218);

-- --------------------------------------------------------

--
-- Table structure for table `privacy`
--

CREATE TABLE `privacy` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `info_vis` int(11) NOT NULL DEFAULT '1' COMMENT 'Is information visible to anyone',
  `photo_vis` int(11) NOT NULL DEFAULT '1' COMMENT 'Is photos visible to anyone'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `privacy`
--

INSERT INTO `privacy` (`id`, `user_id`, `info_vis`, `photo_vis`) VALUES
(1, 3, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `trending`
--

CREATE TABLE `trending` (
  `id` int(11) NOT NULL,
  `hashtag` varchar(255) NOT NULL,
  `hits` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `trending`
--

INSERT INTO `trending` (`id`, `hashtag`, `hits`) VALUES
(1, 'TESTTREND', 135124);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(25) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_pass` varchar(255) NOT NULL,
  `user_picture` varchar(255) NOT NULL DEFAULT 'default.jpg',
  `user_posts` int(11) NOT NULL,
  `user_followers` int(11) NOT NULL,
  `user_following` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_email`, `user_pass`, `user_picture`, `user_posts`, `user_followers`, `user_following`) VALUES
(3, 'Tezma', 'tezma909@gmail.com', '$2y$10$nTpx3wc44GyLLldQeXKBuOeXM6WgSKztVFCQ5TC7i/tMFMacMQpBy', 'uCqHd16.jpg', 7, 0, 1),
(5, 'Admin2', 'weridefilmedit@gmail.com', '$2y$10$poZRbnCy/eZ03S7fxLteaufNKnq5F6A7WcFF8sn4Y2V6TF/OeBMz6', 'default.jpg', 0, 0, 0),
(4, 'Admin', 'admin@gmail.com', '$2y$10$i7PW2EFWj7kDooLeZEwgku/MQkKIv7i9.F0om0c1IwW.LqzK.yZLW', 'default.jpg', 3, 0, 1),
(6, 'Test', 'testest@gmail.com', '$2y$10$je5hahr04wkLejJdJXH1lepn9sFO24QcFX.uqiTh/Gcg7qW/wVUFi', 'default.jpg', 0, 0, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `following`
--
ALTER TABLE `following`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `privacy`
--
ALTER TABLE `privacy`
  ADD UNIQUE KEY `user_id` (`user_id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `trending`
--
ALTER TABLE `trending`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`user_email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `following`
--
ALTER TABLE `following`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;
--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=175;
--
-- AUTO_INCREMENT for table `privacy`
--
ALTER TABLE `privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `trending`
--
ALTER TABLE `trending`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
