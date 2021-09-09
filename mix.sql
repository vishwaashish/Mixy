-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2021 at 10:12 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

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
(295, 13, 11),
(301, 12, 11),
(304, 12, 13);

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
(49, '12', 11, 'asd', '2021-02-13 22:08:30', 1),
(50, '12', 13, 'hello', '2021-02-13 22:08:56', 1),
(51, '11', 13, 'hello', '2021-02-13 22:14:40', 1),
(52, '11', 13, 'hii', '2021-02-13 22:14:44', 1),
(53, '12', 13, 'hii', '2021-02-13 22:18:07', 1),
(54, '12', 11, 'hello', '2021-02-13 22:18:35', 1),
(55, '11', 12, 'hii', '2021-02-13 22:21:28', 0),
(56, '13', 11, 'hello', '2021-02-13 23:03:29', 1),
(57, '11', 12, 'hello', '2021-02-13 23:32:48', 0),
(58, '13', 11, 'kaisa hai bahai', '2021-02-13 23:33:13', 1),
(59, '11', 13, 'hiii', '2021-02-14 18:33:45', 1),
(60, '13', 11, 'hello', '2021-02-14 18:39:04', 1),
(61, '11', 11, 'adasda', '2021-02-14 19:15:10', 1),
(62, '11', 13, 'asdada', '2021-02-14 19:16:49', 1),
(63, '11', 11, 'asd', '2021-02-14 19:19:40', 1),
(64, '11', 11, 'hii', '2021-02-15 20:50:47', 1),
(65, '11', 13, 'hello', '2021-02-15 20:50:55', 1),
(66, '11', 13, 'nooo', '2021-02-15 21:33:27', 1),
(67, '11', 13, 'asd\nasd\nasd', '2021-02-15 21:34:13', 1),
(69, '11', 12, 'hello', '2021-02-16 21:08:50', 1),
(70, '11', 11, 'hello', '2021-02-19 18:37:44', 1),
(71, '11', 13, 'hye', '2021-02-19 19:21:17', 1),
(94, '11', 13, 'asda', '2021-02-19 22:41:34', 1),
(95, '11', 13, 'asdasrtew', '2021-02-19 22:41:45', 1),
(96, '11', 13, '\n<p><img src=\"assets/message_img/1214673541.png\" class=\"img-thumbnail\" width=\"200\" height=\"160\"></p>', '2021-02-19 22:41:55', 1),
(97, '11', 12, 'hii', '2021-02-19 22:43:19', 1),
(98, '11', 12, '\n😎                                        ', '2021-02-19 23:10:45', 1),
(99, '11', 12, '\n🐽                                        ', '2021-02-19 23:11:41', 1),
(100, '13', 11, '\n😋                                        ', '2021-02-19 23:13:05', 1),
(101, '11', 13, '\n😇🇧🇭                                   ', '2021-02-19 23:13:50', 1),
(102, '13', 11, '\n😋', '2021-02-19 23:14:28', 1),
(103, '11', 12, '\n😅                                        ', '2021-02-19 23:31:57', 1),
(104, '11', 12, '\n😅              ', '2021-02-19 23:32:15', 1),
(105, '11', 12, '\n😁😙😅              ', '2021-02-19 23:32:23', 1),
(106, '11', 12, '\n😁😙😅 ', '2021-02-19 23:32:38', 1),
(107, '11', 12, '\n<p><img src=\"assets/message_img/1214673541.png\" class=\"img-thumbnail\" width=\"200\" height=\"160\"></p>', '2021-02-19 23:33:30', 1),
(108, '11', 12, '\n🙃                                        ', '2021-02-19 23:34:44', 1),
(111, '11', 12, '\n<p><img src=\"assets/message_img/1214673541.png\" class=\"img-thumbnail\" width=\"200\" height=\"160\"></p>', '2021-02-20 14:44:53', 1),
(112, '11', 12, '\n😙', '2021-02-20 14:45:02', 1),
(113, '11', 12, '\n<p><img src=\"assets/message_img/4673541.png\" class=\"img-thumbnail\" width=\"200\" height=\"160\"></p>', '2021-02-20 14:52:58', 1),
(114, '11', 12, '\n                                        ', '2021-02-20 14:55:02', 1),
(115, '11', 12, '\n🇧🇭                                        ', '2021-02-20 14:56:46', 1),
(116, '11', 12, '😙\n🇧🇭                                        ', '2021-02-20 14:56:51', 1),
(117, '11', 12, '🤲🏽\n🇬🇧                                        ', '2021-02-20 14:58:05', 1),
(118, '11', 12, '\n                                        ', '2021-02-20 14:59:28', 1),
(119, '11', 12, '\n<p><img src=\"assets/message_img/1214673541.png\" class=\"img-thumbnail\" width=\"200\" height=\"160\">&nbsp;hello</p>', '2021-02-20 15:03:27', 1),
(120, '11', 12, 'hii', '2021-02-20 15:03:31', 1),
(121, '11', 12, 'https://www.webslesson.info/2018/07/live-chat-system-in-php-using-ajax-jquery.html', '2021-02-20 15:11:55', 1),
(122, '11', 12, 'https://www.webslesson.info/2018/07/live-chat-system-in-php-using-ajax-jquery.html\n                                        ', '2021-02-20 15:37:56', 1),
(127, '11', 13, 'hello', '2021-02-20 18:30:08', 1),
(129, '11', 13, 'hello', '2021-02-20 18:49:23', 1),
(131, '11', 13, 'nice', '2021-02-20 19:00:57', 1),
(132, '11', 13, 'yes', '2021-02-20 19:01:02', 1),
(133, '11', 12, 'hello', '2021-02-21 19:25:56', 1),
(134, '11', 14, 'heelo', '2021-02-23 22:29:12', 1);

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
(2, 7, 13, 'like'),
(3, 7, 5, 'like'),
(8, 2, 4, 'like'),
(9, 7, 14, 'like'),
(10, 2, 5, 'like'),
(12, 2, 13, 'like'),
(21, 2, 14, 'like'),
(25, 2, 15, 'like'),
(26, 2, 19, 'like'),
(27, 12, 18, 'like'),
(56, 11, 20, 'like'),
(74, 11, 24, 'like'),
(88, 11, 19, 'like'),
(89, 11, 15, 'like'),
(99, 11, 23, 'like'),
(100, 11, 22, 'like'),
(101, 11, 7, 'like'),
(104, 11, 9, 'like'),
(107, 11, 10, 'like'),
(112, 11, 61, 'like'),
(113, 11, 62, 'like'),
(114, 11, 11, 'like'),
(119, 11, 4, 'like'),
(136, 11, 79, 'like'),
(140, 11, 85, 'like'),
(141, 11, 84, 'like'),
(142, 11, 78, 'like');

-- --------------------------------------------------------

--
-- Table structure for table `tag`
--

CREATE TABLE `tag` (
  `tag_id` int(11) NOT NULL,
  `tag` varchar(255) COLLATE utf8mb4_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_bin;

--
-- Dumping data for table `tag`
--

INSERT INTO `tag` (`tag_id`, `tag`) VALUES
(1, 'blog'),
(2, 'sport'),
(3, 'news'),
(4, 'technology'),
(5, 'business'),
(6, 'fashion'),
(7, 'fitness'),
(8, 'food');

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
(76, 12, 'https://news.google.com/articles/CAIiEAMFNgfsMyNiP6vKU7deNLwqGQgEKhAIACoHCAowyo-HCzD-tIUDMLuIyQY?hl=en-IN&gl=IN&ceid=IN%3Aen', 'Google News - Media coverage prejudicial: Delhi High Court', 'New Delhi, February 19 Advocating a balance between right to privacy, freedom of speech and sovereignty and integrity of India, the Delhi High Court on Friday asked ', 'https://lh3.googleusercontent.com/H22-rf40v8xSwSTdUNwQOTUhPyK9NXZxbya_MZvRlV2z26YqFESM3zYGwrRB2S1xz8JkYvRC6ff_KqZlR_0=rj-w512-h512-pf', 'assets/img/postimage/1614927897.jpg', '2021-02-20 21:14:45', 'neetesh', 'blogs,sports,technology', '1'),
(78, 11, 'https://www.webslesson.info/2020/07/make-social-networking-sites-in-php-mysql-using-ajax.html', 'Make Social Networking Sites in PHP Mysql using Ajax | Webslesson', 'null', 'https://1.bp.blogspot.com/-4i-VRJLgw5s/XxqaGR8KuXI/AAAAAAAABYM/QBn-1YHciZA25MkrLyLApWzrqg5rLFUQwCLcBGAsYHQ/w1200-h630-p-k-no-nu/social-networking-sites-in-php.jpg', 'assets/img/postimage/1614927897.jpg', '2021-02-20 22:09:46', 'ashish', 'blogs,sports,technology', '1'),
(79, 11, 'https://www.webslesson.info/2020/07/make-social-networking-sites-in-php-mysql-using-ajax.html', 'Make Social Networking Sites in PHP Mysql using Ajax | Webslesson', 'null', 'https://1.bp.blogspot.com/-4i-VRJLgw5s/XxqaGR8KuXI/AAAAAAAABYM/QBn-1YHciZA25MkrLyLApWzrqg5rLFUQwCLcBGAsYHQ/w1200-h630-p-k-no-nu/social-networking-sites-in-php.jpg', 'assets/img/postimage/1614927897.jpg', '2021-03-03 17:53:58', 'ashish', 'blogs', '1'),
(84, 11, 'https://twitter.com/YourAnonOne/status/1362790899361677312', '1362790899361677312', 'null', 'assets/image/image.jpg', 'assets/image/image.jpg', '2021-03-04 20:21:53', 'ashish', 'blogs', '1'),
(85, 11, 'https://news.google.com/articles/CAIiEAdkltx1tOZBR1POKvxwzmYqGQgEKhAIACoHCAowzrL9CjDC7vQCMKCT1wU?hl=en-IN&gl=IN&ceid=IN%3Aen', 'Google News - E Sreedharan wears Delhi Metro uniform for last time ahead of political journey', 'KOCHI: Curtain came down on &#39;Metroman&#39; E Sreedharan&#39;s 24-year long career with the Delhi Metro Rail Corporation as he wore the DMRC&#39;s outdoor uniform', 'https://lh3.googleusercontent.com/i7tV_vYMjllluynALAI21It7-BxX-KTBDtzDy6-rW9hPJgXCdyj40U3IlI-h08x6-Mf81OdiZQ7Dz9-yDuA=rj-w512-h512-pf', 'assets/img/postimage/1614927750.jpg', '2021-03-04 20:22:32', 'ashish', 'blogs', '1'),
(86, 11, 'https://www.youtube.com/watch?v=Ddmr2nb7znc', 'Can&#39;t Open JPG Files in Windows 10 (Solved) - YouTube', 'Unable to open JPG image files in Windows 10? Getting unknown error while trying to open jpg files? You can fix the problem easily. Right click on Windows St...', 'https://i.ytimg.com/vi/Ddmr2nb7znc/maxresdefault.jpg', 'assets/img/postimage/1614926436.jpg', '2021-03-05 12:10:36', 'ashish', 'news', '1'),
(87, 13, 'https://www.w3schools.com/howto/howto_css_transition_hover.asp', 'How To - Transition on Hover', 'Well organized and easy to understand Web building tutorials with lots of examples of how to use HTML, CSS, JavaScript, SQL, PHP, Python, Bootstrap, Java and XML.', 'assets/image/image.jpg', 'assets/img/postimage/1614937516.jpg', '2021-03-05 15:15:16', 'mama', 'blogs', '1');

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
  `website` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `name`, `email`, `phone`, `username`, `password`, `uploaded_on`, `profile_image`, `bio`, `follower_number`, `following_number`, `website`) VALUES
(11, 'Ashishkumar1', 'vishwakarmaashish165@gmail.com', '9184248474493', 'ashish', '1aa85fce57ff7a3fb58598ec9568bf80', '2020-10-06 16:01:16', 'assets/upload/16145951334673541-removebg-preview.png', 'I AM ASHISH KUMAR VISHWAKARMA', 1, 2, 'https://www.facebook.com'),
(12, 'NEETESH', 'vishwakarmashish16512@gmail.com', '9082189107', 'neetesh', '1aa85fce57ff7a3fb58598ec9568bf80', '2020-10-07 22:39:43', 'assets/upload/1604670394GitHub-Mark.png', 'hii', 2, 1, 'https://www.facebook.com/13'),
(13, 'mama1', 'mama@gmail.com', '8424847449', 'mama', '1aa85fce57ff7a3fb58598ec9568bf80', '2020-11-04 18:46:48', 'assets/upload/1604498200IMG_20200608_182850.jpg', 'My name is Mama', 2, 1, ''),
(14, 'Ashish1', 'vishwakarmaashish1654@gmail.com', '8424847449', 'ashish1', '1aa85fce57ff7a3fb58598ec9568bf80', '2021-02-23 21:08:12', 'assets/upload/1614100521ashish.jpg', 'Hello', 0, 0, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `follower_info`
--
ALTER TABLE `follower_info`
  ADD PRIMARY KEY (`follow_id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `follower_info`
--
ALTER TABLE `follower_info`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=309;

--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=135;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=143;

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
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
