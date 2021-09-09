-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 19, 2020 at 04:43 PM
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

--
-- Indexes for dumped tables
--

--
-- Indexes for table `urlfetcher`
--
ALTER TABLE `urlfetcher`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `urlfetcher`
--
ALTER TABLE `urlfetcher`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
