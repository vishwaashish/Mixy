-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 09, 2022 at 06:48 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mix`
--

-- --------------------------------------------------------

--
-- Table structure for table `ashish`
--

CREATE TABLE `ashish` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `follower_info`
--

CREATE TABLE `follower_info` (
  `follow_id` int(11) NOT NULL,
  `sender_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `follower_info`
--

INSERT INTO `follower_info` (`follow_id`, `sender_id`, `receiver_id`) VALUES
(332, 16, 15),
(333, 20, 15),
(334, 21, 20);

-- --------------------------------------------------------

--
-- Table structure for table `kajal`
--

CREATE TABLE `kajal` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `user_id` varchar(100) COLLATE utf8mb4_bin NOT NULL,
  `ToUser` int(100) NOT NULL,
  `Message` varchar(1000) COLLATE utf8mb4_bin NOT NULL,
  `uploaded_on_msg` datetime NOT NULL,
  `message_status` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `user_id`, `ToUser`, `Message`, `uploaded_on_msg`, `message_status`) VALUES
(141, '15', 16, 'hii', '2022-02-27 12:51:35', 1),
(142, '18', 20, 'hii<div><br></div>', '2022-02-27 20:09:37', 1),
(143, '20', 21, 'hello', '2022-02-27 20:26:56', 1),
(144, '21', 20, 'hello<div><br></div>', '2022-02-27 20:27:12', 1);

-- --------------------------------------------------------

--
-- Table structure for table `neetesh`
--

CREATE TABLE `neetesh` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `neetesh165`
--

CREATE TABLE `neetesh165` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating_info`
--

CREATE TABLE `rating_info` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL,
  `rating_action` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rating_info`
--

INSERT INTO `rating_info` (`like_id`, `user_id`, `content_id`, `rating_action`) VALUES
(158, 15, 109, 'like'),
(159, 15, 114, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_like`
--

CREATE TABLE `tbl_like` (
  `like_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `urlfetcher`
--

CREATE TABLE `urlfetcher` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urlfetcher`
--

INSERT INTO `urlfetcher` (`content_id`, `user_id`, `url`, `title`, `description`, `imageurl`, `image`, `uploaded_on`, `account`, `catagories`, `post_status`) VALUES
(133, 21, 'https://blogs.worldbank.org/voices/hidden-1-trillion-halting-waste-public-procurement', 'The hidden $1 trillion: Halting waste in public procurement', 'Governments today spend an estimated $13 trillion each year on public contracts for goods, services and public works. As much as a quarter of that is wasted in ineff', 'https://blogs.worldbank.org/sites/default/files/styles/card/public/2022-01/procurement_blog780.jpeg?itok=lvwkwIVV', 'assets/img/postimage/1645973683.jpg', '2022-02-27 20:24:43', 'Neetesh165', 'blogs', '1'),
(134, 20, 'https://www.timeshighereducation.com/student/blogs/brits-america-final-chapter-harvard-university', 'Brits in America: the final chapter at Harvard University | Student', 'Regular THE Student blogger Raphaëlle Soffe shares some final reflections on her time at Harvard University as she prepares to move on to her master&#x27;s degree', 'https://www.timeshighereducation.com/student/sites/default/files/harvard_gates.jpg', 'assets/img/postimage/1645973779.jpg', '2022-02-27 20:26:19', 'kajal', 'blogs', '1');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `phone` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `uploaded_on` datetime DEFAULT NULL,
  `profile_image` varchar(255) NOT NULL,
  `bio` varchar(255) NOT NULL,
  `follower_number` int(11) NOT NULL,
  `following_number` int(11) NOT NULL,
  `website` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `username`, `password`, `uploaded_on`, `profile_image`, `bio`, `follower_number`, `following_number`, `website`, `status`) VALUES
(20, 'Kajal', 'kajal@gmail.com', '7896541235', 'kajal', '1aa85fce57ff7a3fb58598ec9568bf80', '2022-02-27 16:11:20', '', '', 1, 1, '', 'user'),
(21, 'Neetesh Vishwakarma', 'vishwakarmaneetesh1654@gmail.com', '09082189107', 'Neetesh165', '1aa85fce57ff7a3fb58598ec9568bf80', '2022-02-27 20:13:25', '', '', 1, 0, '', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `vishwakarmaashish1654@gmail.com`
--

CREATE TABLE `vishwakarmaashish1654@gmail.com` (
  `content_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ashish`
--
ALTER TABLE `ashish`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `follower_info`
--
ALTER TABLE `follower_info`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `kajal`
--
ALTER TABLE `kajal`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `neetesh`
--
ALTER TABLE `neetesh`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `neetesh165`
--
ALTER TABLE `neetesh165`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`content_id`);

--
-- Indexes for table `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `urlfetcher`
--
ALTER TABLE `urlfetcher`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `vishwakarmaashish1654@gmail.com`
--
ALTER TABLE `vishwakarmaashish1654@gmail.com`
  ADD PRIMARY KEY (`content_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ashish`
--
ALTER TABLE `ashish`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follower_info`
--
ALTER TABLE `follower_info`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=335;

--
-- AUTO_INCREMENT for table `kajal`
--
ALTER TABLE `kajal`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=145;

--
-- AUTO_INCREMENT for table `neetesh`
--
ALTER TABLE `neetesh`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `neetesh165`
--
ALTER TABLE `neetesh165`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=160;

--
-- AUTO_INCREMENT for table `tag`
--
ALTER TABLE `tag`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `urlfetcher`
--
ALTER TABLE `urlfetcher`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `vishwakarmaashish1654@gmail.com`
--
ALTER TABLE `vishwakarmaashish1654@gmail.com`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
