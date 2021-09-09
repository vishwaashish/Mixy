-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2020 at 07:51 AM
-- Server version: 10.3.15-MariaDB
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ashish`
--

INSERT INTO `ashish` (`content_id`, `user_id`, `url`, `title`, `description`, `imageurl`, `uploaded_on`, `account`, `catagories`, `post_status`) VALUES
(4, 2, 'https://www.indiatoday.in/sports/cricket/story/ricky-ponting-ajinkya-rahane-delhi-capitals-ipl-2020-indian-premier-league-t20-batting-shreyas-iyer-1723616-2020-09-20', 'IPL 2020: Ajinkya Rahane not an automatic selection for Delhi Capitals, says coach Ricky Ponting', 'Speaking ahead of the first IPL 2020 match, Delhi Capitals coach Ricky Ponting said that batsman Ajinkya Rahaneâ€™s spot in playing XI is not guaranteed, but heâ€™s ', 'https://akm-img-a-in.tosshub.com/indiatoday/images/story/202009/Ajinkya_Rahane_Twitter-647x363.jpeg?irfzI1Nz0mjTQpaDf1_.Pp1YNxoz09.c', '2020-09-20 16:12:33', 'ashish', 'sports', '1'),
(5, 2, 'https://www.indiatoday.in/trending-news/story/ever-seen-a-spider-eating-a-bird-viral-video-is-giving-netizens-the-jitters-1723572-2020-09-20', 'Ever seen a spider eating a bird? Viral video is giving netizens the jitters', 'A hair-raising video of a tarantula eating a bird has gone viral on the internet.', 'https://akm-img-a-in.tosshub.com/indiatoday/images/story/202009/imgonline-com-ua-FrameBlurred-_24-647x363.jpeg?nIYvH0Xhi2Jzda19g0Ehizcju.Nq3tsE', '2020-09-20 16:14:48', 'ashish', 'news', '1'),
(13, 2, 'https://www.webslesson.info/2017/09/php-like-system-with-notification-using-ajax-jquery.html', 'PHP Like System with Notification using Ajax Jquery | Webslesson', 'If you are looking for PHP Ajax Web development tutorial on post or image like system with notification then you have come right place, here we have discuss small an', 'https://4.bp.blogspot.com/-LoczTRya87k/WbZNMBL7HXI/AAAAAAAAAlc/l2fGqLMoW24-zgFp_70taz6B44Src3CyQCLcBGAs/w1200-h630-p-k-no-nu/php-like-system-with-notification-using-ajax-jquery.jpg', '2020-09-26 15:19:52', 'ashish', 'blogs', '1'),
(14, 2, 'https://www.youtube.com/watch?v=0bqm-2wLKW4', 'Like Dislike system with PHP and  MySQL - YouTube', 'This system works exactly like the Like/Dislike system YouTube implements for its videos. On YouTube, the buttons are placed on videos. Since we are not buil...', 'https://i.ytimg.com/vi/0bqm-2wLKW4/maxresdefault.jpg', '2020-09-26 19:41:29', 'ashish', 'blogs', '1'),
(15, 2, 'https://codewithawa.com/posts/like-and-unlike-system-using-php-and-mysql-database', '  Like and Unlike system using PHP and MySQL database\n | CodeWithAwa', 'null', 'https://codewithawa.com/assets/featured_images/like_unlike.png.2017-09-26.like-and-unlike-system-using-php-and-mysql-database.png', '2020-09-27 21:59:29', 'ashish', 'blogs', '1'),
(16, 2, 'https://dev.to/ga/7-javascript-tips-and-tricks-3d2o', '7 Javascript Tips and Tricks - DEV', 'Filter Unique Values   The Set object type was introduced in ES6, and along with (...), the... Tagged with javascript, webdev.', 'https://dev.to/social_previews/article/466295.png', '2020-09-27 22:17:41', 'ashish', 'blogs', '1'),
(18, 2, 'https://www.youtube.com/watch?v=kF_O8BAKFWQ', 'How to insert data to database using ajax Codeigniter - YouTube', 'Share your videos with friends, family, and the world', 'https://i.ytimg.com/vi/kF_O8BAKFWQ/hqdefault.jpg', '2020-10-03 14:19:46', 'ashish', 'blogs', '1'),
(19, 2, 'https://www.indiatoday.in/india/story/covid-19-vaccine-likely-by-early-2021-says-harsh-vardhan-offers-to-take-first-shot-1721459-2020-09-13', 'Covid-19 vaccine likely by early 2021, says Harsh Vardhan, offers to take 1st shot to build trust - India News', '&quot;Government is taking full precautions in conducting the human trials of the (Covid-19) vaccine&quot;, Union Health Minister Dr Harsh Vardhan said on Sunday.', 'https://akm-img-a-in.tosshub.com/indiatoday/images/story/202009/Dr_Harsh_Vardhan-647x363.png?2xNiukiEwJY5cm7cY5QdmjlobiB8tnmZ', '2020-10-03 14:21:47', 'ashish', 'news', '1'),
(20, 11, 'https://www.kohinoorsapphirepune.com/', 'Kohinoor Sapphire: 2 BHK in Tathawade for Sale[Official Website] - Kohinoor Sapphire Pune', 'Premium 2 bhk homes at Tathawade starting from Rs. 50.43 lacs', 'https://www.kohinoorsapphirepune.com/wp-content/uploads/2020/10/Kohinoor-Sapphire-LP-Logo-1.png', '2020-11-06 21:17:00', 'ashish', 'business', '1'),
(22, 11, 'https://www.kohinoorsapphirepune.com/', 'Kohinoor Sapphire: 2 BHK in Tathawade for Sale[Official Website] - Kohinoor Sapphire Pune', 'Premium 2 bhk homes at Tathawade starting from Rs. 50.43 lacs', 'https://www.kohinoorsapphirepune.com/wp-content/uploads/2020/10/Kohinoor-Sapphire-LP-Logo-1.png', '2020-11-27 20:23:37', 'ashish', 'blogs', '1'),
(23, 11, 'https://technotaught.com/', 'Home - Technotaught', 'Technotaught is a technology-related blog. Here you can find a post like Linux, Windows, Android, mobile phones, games, google product, app...', 'https://i1.wp.com/technotaught.com/wp-content/uploads/2020/05/technotaugh-e1604237752263.png?fit=313%2C200&ssl=1', '2020-11-27 20:24:48', 'ashish', 'blogs', '1');

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
(225, 13, 11),
(226, 12, 11),
(228, 11, 13),
(229, 11, 12),
(230, 13, 12);

-- --------------------------------------------------------

--
-- Table structure for table `mama`
--

CREATE TABLE `mama` (
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mama`
--

INSERT INTO `mama` (`content_id`, `user_id`, `url`, `title`, `description`, `imageurl`, `uploaded_on`, `account`, `catagories`, `post_status`) VALUES
(3, 7, 'https://technotaught.com/six-sigma-methodology-in-project-management/', 'Six Sigma methodology in project management - Technotaught', 'Six Sigma project management helps you to shape up your corporate strategy ... the application tools will let you concentrate on the areas ...', 'https://i1.wp.com/technotaught.com/wp-content/uploads/2020/08/6-sigma-.png?fit=739%2C415&ssl=1', '2020-09-27 19:09:10', 'mama', 'blogs', '1');

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `neetesh`
--

INSERT INTO `neetesh` (`content_id`, `user_id`, `url`, `title`, `description`, `imageurl`, `uploaded_on`, `account`, `catagories`, `post_status`) VALUES
(2, 10, 'https://news.google.com/articles/CBMieGh0dHBzOi8vc2Nyb2xsLmluL2xhdGVzdC85NzQyNTAvZmFybS1iaWxscy1wbG95LXRvLW1ha2UtY29ycG9yYXRlcy1uZXctbGFuZGxvcmRzLXNheXMta2FtYWwtaGFhc2FuLWF0dGFja3MtcnVsaW5nLWFpYWRta9IBfGh0dHBzOi8vYW1wLnNjcm9sbC5pbi9sYXRlc3QvOTc0MjUwL2Zhcm', 'Google News - ', 'Comprehensive, up-to-date news coverage, aggregated from sources all over the world by Google News.', 'https://lh3.googleusercontent.com/J6_coFbogxhRI9iM864NL_liGXvsQp2AupsKei7z0cNNfDvGUmWUy20nuUhkREQyrpY4bEeIBuc=w300', '2020-09-28 11:40:27', 'neetesh', 'blogs', '1');

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
(29, 11, 20, 'like'),
(30, 11, 18, 'like'),
(31, 11, 23, 'like'),
(34, 11, 13, 'like'),
(35, 11, 5, 'like');

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
  `id` int(11) NOT NULL,
  `url` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageurl` varchar(255) NOT NULL,
  `uploaded_on` datetime NOT NULL,
  `account` varchar(11) NOT NULL,
  `catagories` varchar(255) CHARACTER SET utf8 NOT NULL,
  `post_status` enum('0','1') CHARACTER SET utf8 NOT NULL COMMENT '0-active,1-inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `urlfetcher`
--

INSERT INTO `urlfetcher` (`id`, `url`, `title`, `description`, `imageurl`, `uploaded_on`, `account`, `catagories`, `post_status`) VALUES
(1, 'https://technotaught.com/best-3-ways-to-convert-gif-to-pdf/', 'Best 3 ways to convert GIF to PDF - Technotaught', '3 best way to convert GIF to PDF in high quality using this free online file converter, Adobe Acrobat, Windows Photo Application.', 'https://i1.wp.com/technotaught.com/wp-content/uploads/2020/09/gifToPdf.png?fit=1573%2C719&ssl=1', '2020-09-12 22:53:56', 'ashish', 'blogs', '1'),
(2, 'https://www.mysqltutorial.org/mysql-primary-key/#:~:text=If%20a%20table%2C%20for%20some,column%20to%20the%20primary%20key.', 'MySQL Primary Key', 'In this tutorial, you will learn how to use MySQL primary key constraint to create the primary key for a table.', 'http://www.mysqltutorial.org/wp-content/uploads/2013/05/mysql-primary-key.png', '2020-09-12 23:01:06', 'ashish', 'blogs', '1'),
(3, 'https://technotaught.com/download-videoder-download-videos-for-free-pc-mobile/', 'Download Videoder-download videos for free (PC/Mobile) - Technotaught', 'Download videos for free Videoderâ€‹ .. whichâ€‹ â€‹letsâ€‹ â€‹youâ€‹ â€‹downloadâ€‹ â€‹videosâ€‹ â€‹from Youtube,â€‹ â€‹Facebook,â€‹ â€‹Instagram,. converter', 'https://i1.wp.com/technotaught.com/wp-content/uploads/2020/09/phone-and-mac.png?fit=1205%2C723&ssl=1', '2020-09-13 12:46:42', 'ashish', 'blogs', '1'),
(4, 'https://metroui.org.ua/tag-input.html#_input_max_tags', 'Metro 4 Components Library', 'Enhancement for standard HTML input[type=text] to tag input - managing tags. Excellent to create the element for pin enter. The most popular HTML, CSS, and JS librar', 'https://metroui.org.ua/images/m4-logo-social.png', '2020-09-13 15:25:41', 'ashish', 'tech', '1'),
(5, 'https://www.voanews.com/middle-east/voa-news-iran/jailed-iranian-blogger-coronavirus-infected-prisoners-not-hospitalized', 'Jailed Iranian Blogger: Coronavirus-infected Prisoners Not Hospitalized Until Near Death', 'A jailed Iranian blogger is intensifying his campaign to raise international awareness about worsening conditions at the notorious prison where he is detained, sayin', 'https://im-media.voltron.voanews.com/Drupal/01live-166/2020-09/Soheil%20Arabi%20%28VOA%20Persian%29.png', '2020-09-13 15:27:41', 'ashish', 'blogs', '1'),
(6, 'https://www.technotaught.com/basic-networking-command-in-linux-unix/', 'Basic networking commands of Linux/Unix', 'Basic networking commands (such as tracert, traceroute, ping, netstat, ipconfig, hostname, tcp dump and nslookup) . And their arguments, options and parameters in de', 'https://i0.wp.com/technotaught.com/wp-content/uploads/2019/02/1320362_1b73_6_mh1549098353928.jpg?fit=750%2C422&ssl=1', '2020-09-13 16:33:35', 'ashish', 'networks', '1'),
(7, 'https://www.youtube.com/watch?v=kF_O8BAKFWQ', 'How to insert data to database using ajax Codeigniter', 'This tutorial help you to insert data using ajax and codeigniter. Ajax insert data without refreshing the page. Blog post Link: https://www.guptatreepoint.co...', 'https://i.ytimg.com/vi/kF_O8BAKFWQ/hqdefault.jpg', '2020-09-13 16:34:28', 'ashish', 'language', '1'),
(8, 'https://technotaught.com/six-sigma-methodology-in-project-management/', 'Six Sigma methodology in project management - Technotaught', 'Six Sigma project management helps you to shape up your corporate strategy ... the application tools will let you concentrate on the areas ...', 'https://i1.wp.com/technotaught.com/wp-content/uploads/2020/08/6-sigma-.png?fit=739%2C415&ssl=1', '2020-09-13 16:35:08', 'ashish', 'management', '1'),
(9, 'https://www.indiatoday.in/india/story/covid-19-vaccine-likely-by-early-2021-says-harsh-vardhan-offers-to-take-first-shot-1721459-2020-09-13', 'Covid-19 vaccine likely by early 2021, says Harsh Vardhan, offers to take 1st shot to build trust', '\"Government is taking full precautions in conducting the human trials of the (Covid-19) vaccine\", Union Health Minister Dr Harsh Vardhan said on Sunday.', 'https://akm-img-a-in.tosshub.com/indiatoday/images/story/202009/Dr_Harsh_Vardhan-647x363.png?2xNiukiEwJY5cm7cY5QdmjlobiB8tnmZ', '2020-09-13 21:08:15', 'ashish', 'news', '1'),
(10, 'https://www.indiatoday.in/trending-news/story/indonesian-fans-recreate-bole-chudiyan-in-viral-video-internet-cannot-get-over-the-similarities-1721362-2020-09-13', 'Indonesian fans recreate Bole Chudiyan in viral video. Internet cannot get over the similarities', 'A video of Indonesian fans recreating the hit song Bole Chudiyan from Kabhi Khushi Kabhie Gham has gone viral online. ', 'https://akm-img-a-in.tosshub.com/indiatoday/images/story/202009/bole_chudiyan-647x363.png?hWHImZk1YJMLPHZAkDbFnsnedX1aFIjH', '2020-09-13 22:39:04', 'mama', 'blogs', '1'),
(11, 'https://technotaught.com/best-3-ways-to-convert-gif-to-pdf/', 'Best 3 ways to convert GIF to PDF - Technotaught', '3 best way to convert GIF to PDF in high quality using this free online file converter, Adobe Acrobat, Windows Photo Application.', 'https://i1.wp.com/technotaught.com/wp-content/uploads/2020/09/gifToPdf.png?fit=1573%2C719&ssl=1', '2020-09-16 21:07:52', 'ashish', 'blogs', '1'),
(12, 'https://technotaught.com/the-complete-guide-to-develop-user-centered-design/', 'The Complete Guide to Develop user-centered design - Technotaught', 'The user-centered design ensures that content is tailored to the needs of the user through user stories, functional specifications, basic wireframes...', 'https://i2.wp.com/technotaught.com/wp-content/uploads/2020/05/User-Centric-Design.jpg?fit=1140%2C500&ssl=1', '2020-09-16 21:29:53', 'ashish', 'business', '1');

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
(11, 'Ashishkumar', 'vishwakarmaashish165@gmail.com', '918424847449', 'ashish', '1aa85fce57ff7a3fb58598ec9568bf80', '2020-10-06 16:01:16', 'upload/160449622820170315_163859.jpg', 'I AM ASHISH KUMAR VISHWAKARMA\n\n', 2, 2, 'https://www.facebook.com'),
(12, 'NEETESH SHRAWAN KUMAR23', 'vishwakarmashish165@gmail.com', '9082189107', 'neetesh', '1aa85fce57ff7a3fb58598ec9568bf80', '2020-10-07 22:39:43', 'upload/1604670394GitHub-Mark.png', 'hii', 1, 2, 'https://www.facebook.com/13'),
(13, 'mama1', 'mama@gmail.com', '8424847449', 'mama', '1aa85fce57ff7a3fb58598ec9568bf80', '2020-11-04 18:46:48', 'upload/1604498200IMG_20200608_182850.jpg', 'My name is Mama', 2, 1, '');

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
-- Indexes for table `mama`
--
ALTER TABLE `mama`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `neetesh`
--
ALTER TABLE `neetesh`
  ADD PRIMARY KEY (`content_id`);

--
-- Indexes for table `rating_info`
--
ALTER TABLE `rating_info`
  ADD PRIMARY KEY (`like_id`),
  ADD UNIQUE KEY `UC_rating_info` (`user_id`,`content_id`);

--
-- Indexes for table `tbl_like`
--
ALTER TABLE `tbl_like`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `urlfetcher`
--
ALTER TABLE `urlfetcher`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ashish`
--
ALTER TABLE `ashish`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `follower_info`
--
ALTER TABLE `follower_info`
  MODIFY `follow_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=231;

--
-- AUTO_INCREMENT for table `mama`
--
ALTER TABLE `mama`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `neetesh`
--
ALTER TABLE `neetesh`
  MODIFY `content_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating_info`
--
ALTER TABLE `rating_info`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `tbl_like`
--
ALTER TABLE `tbl_like`
  MODIFY `like_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `urlfetcher`
--
ALTER TABLE `urlfetcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
