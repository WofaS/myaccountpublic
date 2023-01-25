-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 11, 2023 at 08:21 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sampacop`
--

-- --------------------------------------------------------

--
-- Table structure for table `activities`
--

CREATE TABLE `activities` (
  `id` int(11) NOT NULL,
  `activity_name` text NOT NULL,
  `date` datetime NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `created_by` varchar(100) DEFAULT NULL,
  `activity_color` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `activities`
--

INSERT INTO `activities` (`id`, `activity_name`, `date`, `date_created`, `created_by`, `activity_color`) VALUES
(2, 'Kohinta 2023', '2023-01-06 00:00:00', '2023-01-06 18:56:06', 'Abraham Albert Sam', 'success'),
(3, 'My wife\'s birthday', '2023-01-06 00:00:00', '2023-01-07 00:35:45', 'Abraham Albert Sam', 'warning'),
(4, 'Training of Local I.T teams', '2023-01-07 00:00:00', '2023-01-07 00:33:53', 'Abraham Albert Sam', 'info'),
(5, 'Constitution Day', '0000-00-00 00:00:00', '2023-01-08 13:38:11', 'Abraham Albert Sam', 'success'),
(6, 'English Assembly Started Church @ new Building', '2023-01-08 00:00:00', '2023-01-08 13:34:19', 'Abraham Albert Sam', 'info');

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` bigint(20) NOT NULL DEFAULT 4,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `about` varchar(2045) DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `country` varchar(100) DEFAULT NULL,
  `address` varchar(1024) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0,
  `marital_status_id` varchar(50) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `father_phone` varchar(13) DEFAULT NULL,
  `mother_phone` varchar(13) DEFAULT NULL,
  `hometown` varchar(100) DEFAULT NULL,
  `residence` varchar(1024) DEFAULT NULL,
  `position_id` varchar(50) DEFAULT NULL,
  `localposition_id` varchar(50) DEFAULT NULL,
  `category_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `gender`, `dob`, `about`, `company`, `job`, `country`, `address`, `phone`, `date`, `slug`, `image`, `disabled`, `marital_status_id`, `father_name`, `mother_name`, `father_phone`, `mother_phone`, `hometown`, `residence`, `position_id`, `localposition_id`, `category_id`) VALUES
(1, 'Abraham', 'Albert Sam', 'mail@mail.com', '$2y$10$8mi5tZaMZWIomKOvqDjA2OfGepzXtkm2T9LhYZ5tcWVuA8qNNhArG', 2, 'male', '1992-01-15', '', '', 'Teacher', '', 'hhg', '0548214842', '2022-11-12 18:14:45', '', 'uploads/images/1673404216SamAbraham.jpg', 0, 'Married', 'Mr James K Sam', 'Mrs Gladys Essiam', '', '', 'New Ebu', 'Sampa Off Sampa-Kabile Road', 'Dist. SoM Coordi', 'Usher', 'English'),
(48, 'Eric', 'Danso', 'eric@gmail.com', '$2y$10$hEH9GT3QWRZ4MHYFYIHMNelGWcfoee1Urbw2rjBaecu6WOvVXNBI.', 2, 'male', '1989-01-10', '', '', 'Teaching', '', '', '0247823208', '2022-11-22 13:33:27', 'english', 'uploads/images/1669120787erico.jpg', 0, 'married', 'Eric Kofi Sam', 'Ernestina Aboagyewaah', '', '', 'Asamankese', 'Aberwankor  Savannah Hotel', '', NULL, 'English');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(30) NOT NULL,
  `disabled` tinyint(1) NOT NULL DEFAULT 0,
  `slug` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `category`, `disabled`, `slug`) VALUES
(1, 'English', 0, 'english'),
(2, 'Central', 0, 'central'),
(3, 'New Town', 0, 'new-town'),
(4, 'Royals', 0, 'royals'),
(5, 'Dunamis', 0, 'dunamis'),
(6, 'New Japan', 0, 'new-japan'),
(7, 'Buko', 0, 'buko'),
(8, 'Duadaso No.1', 0, 'duadaso-no-1'),
(9, 'Duadaso No.2', 0, 'duadaso-no-2'),
(10, 'Latter Rain', 0, 'latter-rain'),
(11, 'Mercy Seat', 0, 'mercy-seat'),
(12, 'Elshadai', 0, 'elshadai'),
(13, 'Jamera', 0, 'jamera'),
(14, 'Shallom', 0, 'shallom'),
(15, 'Kabile', 0, 'kabile'),
(16, 'Glorious', 0, 'glorious'),
(17, 'Tetelestai', 0, 'tetelestai'),
(18, 'Home Cell', 0, 'home-cell');

-- --------------------------------------------------------

--
-- Table structure for table `category_sub`
--

CREATE TABLE `category_sub` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_sub`
--

INSERT INTO `category_sub` (`id`, `category_id`, `sub_category_name`) VALUES
(1, 1, 'teens'),
(2, 1, 'schools outreach'),
(3, 2, 'Virteous ladies'),
(4, 3, 'Faithful Gents');

-- --------------------------------------------------------

--
-- Table structure for table `localpositions`
--

CREATE TABLE `localpositions` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `disabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `localpositions`
--

INSERT INTO `localpositions` (`id`, `position`, `disabled`) VALUES
(1, 'Local Presiding', 0),
(3, 'Local YM Leader', 0),
(7, 'Local Women\'s Ldr.', 0),
(12, 'District Pastor', 0),
(16, 'Local Ass. Youth Ldr.', 0),
(27, 'CM Teacher', 0),
(28, 'Local CM Ldr. ', 0),
(31, 'Local FS', 0),
(32, 'Local PEMEM Ldr', 0),
(35, 'Local Secretary', 0),
(38, 'Local Evang. Ldr.', 0),
(39, 'Local Teens Ldr.', 0),
(40, 'Usher', 0),
(41, 'Sofomaame', 0);

-- --------------------------------------------------------

--
-- Table structure for table `marital_status`
--

CREATE TABLE `marital_status` (
  `id` int(11) NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `disabled` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `marital_status`
--

INSERT INTO `marital_status` (`id`, `marital_status`, `disabled`) VALUES
(1, 'Single', 0),
(2, 'Married', 0),
(3, 'Widowed', 0),
(4, 'Divorced', 0),
(5, 'Complicated', 0),
(6, 'Dating', 0);

-- --------------------------------------------------------

--
-- Table structure for table `members`
--

CREATE TABLE `members` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` bigint(20) NOT NULL DEFAULT 4,
  `gender` varchar(10) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `company` varchar(100) DEFAULT NULL,
  `job` varchar(100) DEFAULT NULL,
  `phone` varchar(13) DEFAULT NULL,
  `date` datetime DEFAULT NULL,
  `slug` varchar(100) NOT NULL,
  `image` varchar(1024) DEFAULT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0,
  `marital_status_id` varchar(50) DEFAULT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `father_phone` varchar(13) DEFAULT NULL,
  `mother_phone` varchar(13) DEFAULT NULL,
  `hometown` varchar(100) DEFAULT NULL,
  `residence` varchar(1024) DEFAULT NULL,
  `position_id` varchar(50) DEFAULT '0',
  `localposition_id` varchar(50) DEFAULT NULL,
  `category_id` varchar(50) DEFAULT NULL,
  `gps_address` varchar(20) DEFAULT NULL,
  `water_baptized` varchar(10) DEFAULT NULL,
  `holyghost_baptized` varchar(10) DEFAULT NULL,
  `communicant_status` varchar(10) DEFAULT NULL,
  `emergecy_name` varchar(50) DEFAULT NULL,
  `emergecy_contact` varchar(15) DEFAULT NULL,
  `children` text DEFAULT NULL,
  `spouse_name` varchar(50) DEFAULT NULL,
  `spouse_phone` varchar(15) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `members`
--

INSERT INTO `members` (`id`, `firstname`, `lastname`, `email`, `password`, `role`, `gender`, `dob`, `company`, `job`, `phone`, `date`, `slug`, `image`, `disabled`, `marital_status_id`, `father_name`, `mother_name`, `father_phone`, `mother_phone`, `hometown`, `residence`, `position_id`, `localposition_id`, `category_id`, `gps_address`, `water_baptized`, `holyghost_baptized`, `communicant_status`, `emergecy_name`, `emergecy_contact`, `children`, `spouse_name`, `spouse_phone`) VALUES
(1, 'Abraham', 'Albert Sam', 'mail@mail.com', '$2y$10$8mi5tZaMZWIomKOvqDjA2OfGepzXtkm2T9LhYZ5tcWVuA8qNNhArG', 5, 'male', '1992-01-15', '', 'Teacher', '0548214842', '2022-11-12 18:14:45', 'english', 'uploads/images/1673420390SamAbraham.jpg', 0, 'Married', 'Mr James K Sam', 'Mrs Gladys Essiam', '', '', 'New Ebu', 'Sampa Off Sampa-Kabile Road', 'Dist. SoM Coordi', 'Local Evang. Ldr.', 'English', '', 'no', 'yes', 'yes', 'Georgina Osaebea Sam', '0241929028', 'Alvin Nyansah Sam', 'Georgina O. Sam', '0241929028'),
(11, 'Raymond', 'Ahadzie', 'raymond@gmail.com', '$2y$10$GyrLEwJahcYQ/P48/53M6u7UDIWOo64QzMnRcMNgM/kU80dl8Srki', 5, 'male', '1988-05-20', '', 'Teaching', '0546762061', '2022-11-17 18:11:33', 'english', 'uploads/images/1668876890man-avatar.jpg', 0, 'Married', 'George Famous Ahadzi', 'Gloria Nyatorwonu', '', '', 'Akatsi', 'Nipaba brew area ', 'Dist. Evg. Ldr.', 'Local Presiding', 'English', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(18, 'Alvin', 'Nyansah Sam', 'alvin@mail.com', '$2y$10$PK5kF4dQrfCLJTqaB28o5e0/kbfNVK2f4T6hhCRqVnWNjBcc7LF3S', 8, 'male', '2021-05-19', '', 'Student', '0548214842', '2022-11-18 17:19:37', 'english', 'uploads/images/1669759640alvin8.jpg', 0, 'Single', 'Abraham Sam', 'Georgina O. Sam', '0548214842', '0241929028', 'Akwamufie', 'Opposite King-promise pub of Sampa-Kabile Road', '', '', 'English', '', 'no', 'no', 'no', 'Georgina O. Sam', '0241929028', '', '', ''),
(19, 'Wisdom', 'Mador', 'wisdom@mail.com', '$2y$10$ZvqWPmBGcEazk3CSkqgM9OEe7H9OZk9.mnUubgMQOcqfumCvSQayq', 4, 'male', '1990-07-20', '', 'Health Promotion Officer', '0543549535', '2022-11-18 17:37:55', 'english', 'uploads/images/1669830991IMG-20221110-WA0000.jpg', 0, 'Married', 'Emmanuel Mador', 'Rita Adjasi-Mador', '', '', 'Adaklu Ablornu', 'Aberwankor around Nipa Ba brew', '', '', 'English', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(20, 'Abigail', 'Soboe', 'abigailsoboe@gmail.com', '$2y$10$SoLxQtkANtJsMrvpkICc.ujVidi05p7ldRJlQmvb1G18bSoBq59g6', 6, 'female', '1992-04-20', '', 'Nursing', '0241509812', '2022-11-18 17:42:25', 'english', NULL, 0, 'Married', 'Soboe Stephen', 'Elizabeth Awini', '', '', 'Garu', 'Around Islamic Basic School ', '', 'Local Women\'s Ldr.', 'English', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(21, 'Francis', 'Yeboah', 'yeboahfrancis@gmail.com', '$2y$10$LhqdVn4aw.5Ye7r59FY9de4VgNAg9rRWzSktyRubRI6xw.LMn/ruS', 4, 'male', '1992-08-02', '', 'Nursing', '0545453706', '2022-11-18 17:51:54', 'english', NULL, 0, 'Single', 'Daniel Wiafe', 'Janet Appiah', '', '', 'Awukuguah', 'Aberwankor around Nipa Ba brew', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(22, 'Famous', 'Yiborku', 'famous@gmail.com', '$2y$10$WgonqNjb7yb6sfV5BRvbeOFUyWMrK7qWTmo0NArN1kJe0uk5dtiYm', 4, 'male', '1987-07-07', '', 'Health Promoter', '0245186287', '2022-11-18 17:54:42', 'english', NULL, 0, 'married', 'Paul Ama Dume', 'Ayite Janet', '', '', 'Sogakope', 'Aberwankor around Nipa Ba brew', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(24, 'Christopher', 'Atta Damoah', 'damoah@gmail.com', '$2y$10$qHL71nLa86TGYQnUJSEt2uhusVfnsEGmeq7aXIdTZSTrRqUW3g6QS', 5, 'male', '1984-12-18', '', 'Teaching', '0542177273', '2022-11-18 18:01:07', 'english', NULL, 0, 'Married', 'Mr. Nicholas Asante', 'Rebecca Damoah', '', '', 'Berekum', 'Aberwankor Area opposite CAC', '', 'Local Secretary', 'English', '', '', 'yes', '', '', '', '', '', ''),
(39, 'Nyinbe', 'Sophia', 'sophia@gmail.com', '$2y$10$6RV.YmsbHEe6ylUDj6Q9de8/idGcwbiKb4vEOu9hwhTsf5zqYgZxW', 9, 'female', '2003-01-25', '', 'Student', '0540616804', '2022-11-19 19:26:08', 'english', NULL, 0, 'single', 'Nyibe Tojah', 'Nbola Nyibe', '', '', 'Lepusi', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(40, 'Manyang', 'Diana M.', 'diana@mail.com', '$2y$10$NavZUIbkTWjm3Md43ixuTOKnnKb7PuBsfjAZoN8RHa/WiyxX053XK', 9, 'female', '1999-11-18', '', 'Student', '0551802946', '2022-11-19 19:31:25', 'english', NULL, 0, 'single', 'Manyang Jagri', 'Elizabeth Jagri', '', '', 'Kpassa', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(41, 'Lydia', 'Nkungin', 'nkungin@gmail.com', '$2y$10$POzGvfFsr5D9Y/rIw28CY.7J3OPrBQDhuAikoGfRMh1p2g/iMi2xu', 9, 'female', '2002-03-01', '', 'Student', '0599185007', '2022-11-19 19:34:41', 'english', NULL, 0, 'single', 'Bijido Kofi', 'Abena Bijido', '', '', 'Kpandai', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(42, 'Joyce', 'Konjour', 'konjour@gmail.com', '$2y$10$Yw26ZtlflE96GA84BXhlYuAPaTJp7nnuPo918l.Lo7KzhdidrRXZi', 9, 'female', '1998-03-30', '', 'Student', '0548424233', '2022-11-19 19:43:36', 'english', NULL, 0, 'single', 'Samuel Konjour', 'Martha Konjour', '', '', 'Danivaari', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(43, 'Jessica', 'Matir', 'matir@gmail.com', '$2y$10$LgNNLyrkii8rIdSh.uEG1.72jwqEWoL/1Fqqyl3VY8QuLEJMr7SNq', 9, 'female', '2000-03-11', '', 'Student', '0241769930', '2022-11-19 19:47:40', 'english', NULL, 0, 'single', 'Gmanjur Matir', 'Mbmonba Matir', '', '', 'Yeji', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(44, 'Jennifer', 'Niwirdo Akos', 'niwirdo@gmail.com', '$2y$10$p98wM35YnOYqndbwT2SpiuFVG0/v0I4WBRkuo4hCMdcHjv33g/9mK', 9, 'female', '2001-10-08', '', 'Student', '0256838806', '2022-11-19 19:52:22', 'english', NULL, 0, 'single', 'Niwirdo Batiye', 'Nayide Niwirdo', '', '', 'Demong', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(45, 'James', 'A. Ayambila', 'janaba@gmail.com', '$2y$10$uzUgTkVXK0XkJ0HJ2ixLReMxGvBRX2Klec7So.z3oXyfKeAw8XVIC', 5, 'male', '1986-12-14', '', 'Teaching', '0246426887', '2022-11-19 19:57:57', 'english', 'uploads/images/1673408870IMG-20221214-WA0007.jpg', 0, 'Divorced', 'Ayambila Atubiga', 'Sophia Awini', '', '', 'Dabia Pusiga', 'Around Islamic Basic School', 'Dist. PEMEM Exe. Memb.', 'Local Presiding', 'English', '', '', '', '', '', '', '', '', ''),
(46, 'Ebenezer', 'Sarfo', 'sarfo@gmail.com', '$2y$10$6Lu6MfznugRo2C4E9o1WbOoLUJYxUXvEB6GpbCISjQMb38rjy5VwO', 9, 'male', '2001-02-17', '', 'Student', '0557669202', '2022-11-19 20:01:00', 'english', NULL, 0, 'single', 'Agyen David', 'Comfort Abrefaa', '', '', 'Wenchi', 'Maranatha School', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(47, 'Daniel', 'Yeboah', 'danny@gmail.com', '$2y$10$mXPxJhf9Z6mHJ62dV87SwOiHh8QlVDIh1VzsqCLTdqTd.ewjD6p3i', 4, 'male', '1999-10-10', '', 'Mason', '0554191775', '2022-11-19 20:03:32', 'english', NULL, 0, 'Single', 'Donkor Emmanuel', 'Monica Kuma', '0249230204', '0544964665', 'Buni', 'New Town behind new insurance office', '', '', 'English', '', 'yes', 'yes', 'yes', 'Mary Krah', '0554698715', '', '', ''),
(48, 'Eric', 'Danso', 'eric@gmail.com', '$2y$10$hEH9GT3QWRZ4MHYFYIHMNelGWcfoee1Urbw2rjBaecu6WOvVXNBI.', 5, 'male', '1989-01-10', '', 'Teaching', '0247823208', '2022-11-22 13:33:27', 'english', 'uploads/images/1669120787erico.jpg', 0, 'Married', 'Eric Kofi Sam', 'Ernestina Aboagyewaah', '', '', 'Asamankese', 'Aberwankor  Savannah Hotel', '', '', 'English', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(49, 'Benjamin', 'Nobi Narh', 'ben@gmail.com', '$2y$10$7bJYjzyQzbmUfw28XUvEz.i/EbG0wiZhl1548/Gx.9ouqpkFBkGHq', 10, 'male', '1965-11-21', '', 'Pastor', '0540776159', '2022-11-27 18:04:03', 'central', 'uploads/images/1670108500Ps. Ben Nobi 2.jpeg', 0, 'Married', 'Andrew S. Nobi', 'Sarah Nobi', '', '', 'Agormanya', 'Pentecost Mission House', 'Dist. Pastor', 'District Pastor', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(51, 'Daniel', 'Dansah', 'dansa@gmail.com', '$2y$10$Rw5PvHAPHfYG3k6MK7I2iONmE58MJrDxncrLrlI9O9jo5xq/Zqycu', 5, 'male', '1991-11-08', NULL, 'Trader', '0244444444', '2022-12-02 13:37:00', 'duadaso-no-1', NULL, 0, 'married', 'John Dansah', 'Diana Dansah', '', '', 'Duadaso No.1', 'Kurkato at Duadaso No.1', 'Local Secretary', '', 'Duadaso No.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(52, 'Daniel', 'Asante Dwomoh', 'ewuradebra442@gmail.com', '$2y$10$Dob3kJd.oGE2hibAOPkdDOHeYYVPSBB9o77DsuLUJAPqrUuorPLhC', 5, 'male', '1992-04-18', '', 'Teaching', '0245227285', '2022-12-03 12:34:02', 'duadaso-no-1', NULL, 0, 'Single', 'Kofi Dwomoh', 'Dorcas Nyamekye', '0243160548', '0240095995', 'Ejisu', 'Habitat around Duadaso No1 COP', 'Dist. Evg. Exec. Memb.', 'Local Evang. Ldr.', 'Duadaso No.1', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(53, 'Mercy', 'Barnes', 'mercybarnes17@gmail.com', '$2y$10$WlQ8WSAXzq4q02iWU/Ivb.cr.pq31mkjBhJY1ZYaaZcJSknsw8ftW', 6, 'female', '1983-07-17', '', 'Secretary Social Welfare Com. Dev', '0241674157', '2022-12-03 12:58:27', 'dunamis', 'uploads/images/1670086564IMG_20211226_120652_0_071355.jpg', 0, 'Married', 'Osei Moses', 'Osei Vida', '', '', 'Debibi', 'Near the central chapel', 'Dist. Women Ldr.', '', 'Dunamis', '', 'yes', 'yes', 'yes', '', '', '', 'Theophilus Barnes', ''),
(54, 'Faustina', 'Asibi', 'faustina@gmail.com', '$2y$10$ocO7atqWx0vG3/C4lksWaeL/CRfVIJsVJJ3XW/ot9e8F8uxNQ97yq', 4, 'female', '2003-08-14', '', 'Student', '0595422857', '2022-12-03 13:07:25', 'duadaso-no-1', NULL, 0, 'Single', 'Woli Kwasi Daniel', 'Anane Abena Monica', '', '', 'Duadaso No.1', 'Bonyikator around Malam\'s residence Duadaso No.1', '', '', 'Duadaso No.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(55, 'Suasan', 'Yaw Frank', 'kambiresuasanfrank@gmail.com', '$2y$10$9mcOSWNIn2zoyYrKofW26e8hHHvXtxfO5UcuWr5NOyVAq60eOy/.O', 4, 'male', '2000-02-15', '', 'Tailor', '0594967416', '2022-12-03 13:13:26', 'duadaso-no-1', NULL, 0, 'Single', 'Yaw Gutar', 'Pwaro Memuna', '', '', 'Lawrah', 'Bonyikator around Kwaku store opposite Kwadwo Funa\'s House', '', '', 'Duadaso No.1', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(56, 'Twenewaa', 'Odert', 'odert@gmail.com', '$2y$10$2a3SvsxzHKOTPCSGCAH9p.GnqE.xZAzeUxcq.EAfbp3U3rrNLmVw6', 4, 'female', '1989-03-03', NULL, 'Farmer', '0248815149', '2022-12-03 13:27:31', 'jamera', NULL, 0, 'Single', 'Bosomtwe Kofi', 'Monica Krah', '', '', 'Jamera', 'Nokala Afia Gbkye\'s house', '', '', 'Jamera', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(57, 'Seli', 'Akosua Sarah', 'seli@gmail.com', '$2y$10$3fSXD5B2mrgmUpRkVM/yw.xAovPyumZK.uF4DFAeg02wDnB0ifbsa', 4, 'female', '1996-07-19', '', 'Tailor', '0549333611', '2022-12-03 13:33:28', 'latter-rain', NULL, 0, 'Single', 'Eld. James Sie', 'Dcns. Bertha Sie', '0248267081', '', 'Duadaso No.2', 'Eld. Jame\'s House Near Presby Church Duadaso No.2', '', 'Local CM Ldr. ', 'Latter Rain', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(58, 'Nyini', 'Yaa Monica', 'nyini@gmail.com', '$2y$10$LqqnAuBos4uY6oo17y4tdupn7BIKpT4J4/ZohG86hAPnKC0wvWdci', 6, 'female', '1996-07-17', NULL, 'Mobile Banker', '0543964259', '2022-12-03 13:46:12', 'duadaso-no-2', NULL, 0, 'Single', 'Dominic Kwaben Kumah', 'Elizabeth Adwoa Fordjour', '', '', 'Duadaso No.2', 'New Town Auntie Fordjour\'s house Duadaso No.2', '', 'Local CM Ldr. ', 'Duadaso No.2', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(59, 'Yeli', 'Ruth Amma', 'yeliruth7@gmail.com', '$2y$10$ppWAKom50N4UN3Uw7T/6Y.P.QWXYdAL/H1/sqW4MGyAxHPTlafqyK', 4, 'female', '2002-11-23', '', 'Student', '0554603163', '2022-12-03 13:51:27', 'glorious', NULL, 0, 'Single', 'Eld. Samuel Sah Kwabena', 'Yeli Paulina', '0543973608', '0547496269', 'Kabile', 'Kabile Kasinge Eld. Samuel\'s house', 'CM Teacher', '', 'Glorious', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(60, 'Sie', 'K. Shadrack', 'kshadrack@gmail.com', '$2y$10$uFR0c6ZZtsinmhSoL/N34efGRqL4ENNwHnFLCfaDb8P5Q8bzwOYlW', 7, 'male', '1992-12-12', '', 'Electrician', '0541280676', '2022-12-03 13:58:45', 'jamera', NULL, 0, 'Married', 'Obah Kwasi John', 'Monica Yaa Manu', '0596608042', '', 'Jamera', 'Kalie Maame Boasi\'s house @ Jamera', '', 'Local CM Ldr. ', 'Jamera', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(61, 'Najah', 'Simon', 'simonnajah916@gmail.com', '$2y$10$6OS0qwRh9ZUJhV.czNCldu4PkTbEYqU29idO27/V2OTzFmg0H2zkO', 5, 'male', '1999-09-15', NULL, 'Teaching', '0557202669', '2022-12-03 14:07:00', 'dunamis', NULL, 0, 'Single', 'Najah Nakpator', 'Sampaka Ngola', '', '', 'Atebubu', 'Opposite Sampa District Police Headquaters', 'CM Teacher', '', 'Dunamis', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(62, 'Agnes', 'Fortwe', 'agifortwe@gmail.com', '$2y$10$uoZdEOtwf4RNzmT/8/Zhk.ASxjjiF7D5NkiMoo6sRRw3RcKnhpMDe', 6, 'female', '1971-04-02', '', 'Trader', '0247409431', '2022-12-03 14:12:45', 'central', NULL, 0, 'Married', 'Kofi Jakson', 'Adwoa Manan', '', '', 'Abura Obukah', 'Nusala Ante Efua\'s House', 'Dist. CM Exec. Memb.', '', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(63, 'Twenewaa', 'Joana', 'twenewaaj@gmail.com', '$2y$10$Czp96gURVAvdBVtHiYEXfOJH0sFPdjJlVA..gNwcOkysh2BLCX.za', 4, 'female', '1999-05-23', NULL, 'Student', '0247261236', '2022-12-03 14:17:21', 'royals', NULL, 0, 'Married', 'Twene Alexander', 'Amyaa Elizabeth', '', '', 'Berekum', 'Behind Suma Rural Bank-Sampa', '', '', 'Royals', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(64, 'Theophilus', 'Barnes', 'barnesntim@gmail.com', '$2y$10$robIMR3xu4/zjdDp3sEI6O9Qg5peRXESsbFmdGRRelmq34JMtNK6G', 5, 'male', '1979-02-16', '', 'Teaching', '0240600051', '2022-12-03 14:30:37', 'dunamis', 'uploads/images/1670086288IMG_20220709_004432_064.jpg', 0, 'Married', 'Edwin Barnes', 'Elizabeth Manu', '', '', 'Sampa', 'Near the central chapel', 'Dist. SoM Coordi', 'Local Presiding', 'Dunamis', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(65, 'Rose', 'Ahadzi', 'rosetwumsiwaa89@gmail.com', '$2y$10$RWmY9JmdjiHD7Ig3jEFDlultNo3bblLFRA/XiZeLSCva/Tdq7/ryW', 6, 'female', '1992-11-04', '', 'Teaching', '0542105920', '2022-12-03 16:40:21', 'english', 'uploads/images/1673403381IMG-20221106-WA0002.jpg', 0, 'Married', 'Nketiah Samuel', 'Twumasiwaa Rose', '0542680520', '0243871927', 'Seikwa', 'Adjacent Residence house @ Sampa', 'Dist. CM Exec. Memb.', '', 'English', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(66, 'David', 'Appiadu', 'appiadudavid803@gmail.com', '$2y$10$O0z38YoaOA9gdS3/KiMYN.xJs9PO4kL0BeBaoxX130oTSYvQrYDOm', 5, 'male', '1987-11-16', '', 'Teaching', '0548561858', '2022-12-03 16:46:32', 'new-town', NULL, 0, 'Married', 'Stephen Coffie', 'Mary Mensah', '', '', 'Toase', 'opposite victory house', '', 'Local Secretary', 'New Town', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(67, 'Daniel', 'Adjei', 'adjeidanny95@gmail.com', '$2y$10$LYaEJln8iXXwmqTJvvAy2uUM47g/m14gd517VnXSf8r46IdKp5ZIG', 4, 'male', '1992-03-21', NULL, 'Agriculturist', '0248060079', '2022-12-03 16:51:47', 'central', NULL, 0, 'Single', 'Jacob Addo', 'Lydia Agyei', '', '', 'Kwahu Asakraka', 'District Assembly - Agric Quaters 1', '', 'Local FS', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(68, 'Mawuli', 'Asamoah Asiedu', 'mawuliasamoah@gmail.com', '$2y$10$LqbpsezXHB14/jwEYi31aOOjRE3ELqAZ4omesc1GM8q7ZGsOC7zia', 8, 'male', '2020-08-04', '', 'Student', '0542105920', '2022-12-04 11:31:31', 'english', NULL, 0, 'Single', 'Raymond Ahadzi', 'Rose Ahadzi', '0546762061', '0542105920', 'Akatsi', 'Adjacent Residence house @ Sampa', '', '', 'English', '', 'no', 'no', 'no', 'Rose Ahadzi', '0542105920', '', '', ''),
(69, 'Prosper', 'Kukuiah', 'prosperkukuiah10@gmail.com', '', 5, 'male', '1979-06-01', '', 'Teaching', '0248685712', '2022-12-04 13:47:32', 'central', 'uploads/images/1670158354IMG-20220619-WA0020.jpg', 0, 'Married', 'John Kukuiah', 'Charity Kukuiah', '', '0594089034', 'Blekusu - Volta Ketu South District', 'Suma Domiabra Bra. Kwame\'s house', 'Dist. Finance Chair', '', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(70, 'Ferdinand', 'Nii Ahele Nunoo', 'niiahele4m@yahoo.com', '', 5, 'male', '1969-01-19', NULL, 'Agriculturist', '0243439326', '2022-12-04 14:10:50', 'central', NULL, 0, 'Married', 'Amos Micah Nunoo', 'Emily Adinorki Nunoo', '', '', 'Abola Kpatashie James Town', 'Agric Quaters 1 Near Old Courthouse', 'Dist. PEMEM Ldr.', 'Local Secretary', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(71, 'Kofi', 'Abraham', 'kofiabraham@gmail.com', '', 4, 'male', '2002-02-05', NULL, 'Carpentry', '0547217784', '2022-12-04 16:22:22', 'central', NULL, 0, 'Single', 'Kweku Osei', 'Abena Mansah', '0599051690', '0592593417', 'Burkina Faso -Gawa Area', 'Maame Hanah\'s house opposite Sampa District police headquaters', '', '', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(72, 'Victor', 'Baapere', 'victorbaapere@gmail.com', '', 9, 'male', '2002-05-27', NULL, 'Student', '0594116715', '2022-12-04 16:27:36', '', NULL, 0, 'Single', 'Baapere Annye', 'Comfort Baapere ', '', '', 'Nandom', 'zongo area Hajiah Kalewele house', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(73, 'Cecilia', 'Djorkah', 'ceciliadjorkah@gmail.com', '', 4, 'female', '2004-11-12', NULL, 'Student', '0552405749', '2022-12-04 16:33:02', 'english', NULL, 0, 'Single', 'Ps. Benjamin Nah Nobi', 'Mrs. Bernice Nobi', '0540776159', '0243627573', 'Agormanya', 'Mission House', '', '', 'English', '', 'yes', 'yes', 'yes', 'Bernice Nobi', '0243627573', '', '', ''),
(74, 'Samuel', 'Narh', 'samuelnarhnii@gmail.com', '', 7, 'male', '1997-05-18', NULL, 'Graphics Designer', '0547598927', '2022-12-04 16:42:16', 'central', NULL, 0, 'Married', 'Nanor Noah', 'Magaret Aku', '', '', 'Kotobaabi', 'around the central church', '', 'Local YM Leader', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(75, 'Bernice', 'Nobi', 'ekuanobi@gmail.com', '', 11, 'female', '1966-05-01', '', 'Pastor\'s Wife', '0243627573', '2022-12-06 19:31:15', 'central', NULL, 0, 'Married', 'J.A. Arhin', 'Endurance Gyebi', '', '', 'Akuapim Abiriw', 'District Mission house', 'Sofomaame', 'Sofomaame', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(79, 'Naadribe', 'Benedicta', 'naadribebeb@gmail.com', '', 9, 'female', '1998-03-08', '', 'Student', '0559654685', '2022-12-11 10:56:39', 'english', NULL, 0, 'Single', 'Awusie Bakwai', 'Christiana Tuomanso', '0240134660', '0552861477', 'Doung', 'Nurses Hostel - New Japan', '', '', 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(80, 'Rita', 'Attaa', 'akosuarita055@gmail.com', '', 6, 'female', '1995-03-01', NULL, 'Teaching', '0554411430', '2022-12-11 11:05:23', 'english', NULL, 0, 'Single', 'Bio Gabriel', 'Akua Anane', '0554411430', '0553501888', 'Bonakrie', 'Near Church of Pentecost Central', '', 'Local CM Ldr. ', 'English', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(81, 'Patience', 'Nketsiah', 'nketsiahpatience@yahoo.com', '', 9, 'female', '1993-08-08', NULL, 'Student Nurse', '0591630637', '2022-12-11 11:22:17', '', NULL, 0, 'Single', 'Albert Nketsiah', 'Doris Ayebe', '0242724001', '0547776044', 'Takoradi Incaban', 'Opposite St. Annes Senior High Buko-road', '', NULL, 'English', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(87, 'Frank', 'Peprah', 'peprah.frank19@gmail.com', '', 5, 'male', '1985-04-06', NULL, 'Teaching', '0249942775', '2022-12-13 16:29:06', 'central', NULL, 0, 'Married', 'Bismark Mensah', 'Florence Afriyie', '', '', 'Atronie', 'Chris Palace Alhaji Saalia\'s house', 'Dist. Secretary', '', 'Central', '', 'yes', 'yes', 'yes', '', '', '', '', ''),
(89, 'Serwaa', 'Afia Abigail', 'serwaaabigail@gmail.com', '', 6, 'female', '1991-08-23', NULL, 'Student', '0246244397', '2022-12-18 11:07:07', 'central', NULL, 0, 'Single', 'Stephen Kwasi Manu', 'Selina Abena Kwayie', '', '', 'Jamera', 'Agi\'s store', '', 'CM Teacher', 'Central', '', 'yes', 'yes', 'yes', 'Agnes Sange', '0542913369', '', '', ''),
(90, 'Elijah', 'Gyabaa', 'gyabaa.elijah@yahoo.com', '', 5, 'male', '1981-12-28', NULL, 'Business', '0207506670', '2022-12-18 14:32:09', 'central', NULL, 0, 'Married', 'John Kofi Febiri', 'Veronica Akosua Amponsaa', '', '0543940327', 'Wamanafo', 'New Town 126 Sampa', '', '', 'Central', '', 'yes', 'yes', 'yes', 'Patience Agyeiwaa Appiah', '0243189202', 'Benita Amponsaa Gyabaa, Jude Kofi Gyabaa and Jeremy Agyei Gyabaa', 'Patience Agyeiwaa Appiah', '0243189202'),
(91, 'Sandra', 'Mensah', 'sandraekuamensah@gmail.com', '', 4, 'female', '2004-04-14', NULL, 'Decorator', '0548402972', '2022-12-20 13:15:21', 'english', NULL, 0, 'Single', 'Ps. Benjamin Nah Nobi', 'Mrs. Bernice Nobi', '0540776159', '0243627573', 'Agormanya', 'Pentecost Mission House', '', '', 'English', '', 'yes', 'yes', 'yes', 'Bernice Nobi', '0243627573', '', '', ''),
(92, 'Blessing', 'Konadu', 'konadublessing@gmail.com', '', 4, 'female', '2007-11-17', NULL, 'Student', '0546797541', '2022-12-20 13:19:29', '', NULL, 0, 'Single', 'Kofi Konadu', 'Grace Twenewaa', '', '0546797541', 'Suma Ahenkro', 'Opposite Fountain Care Hospital', '', NULL, 'Central', '', 'yes', 'yes', 'yes', 'Grace Twenewaa', '0546797541', '', '', ''),
(93, 'Emmanuel', 'Agyare', 'oyokoonanaakwasiagyare@gmail.com', '', 5, 'male', '1992-09-29', NULL, 'Librarian', '0240859135', '2022-12-25 13:30:51', 'dunamis', 'uploads/images/1673403272IMG-20221025-WA0003.jpg', 0, 'Married', 'Twumasi Charles ', 'Grace Pomah', '', '0245482420', 'Oyoko', 'Nipaba brew area', '', '', 'Dunamis', '', 'yes', 'yes', 'yes', 'Philip Boateng', '0242723002', 'Shallom Akwasi Agyare, Philipa Agyare and Faith Agyare', 'Dorothy Asampong', '0543946229'),
(94, 'Opoku', 'Mensah Alex', 'opokumensahalex5050@gmail.com', '', 5, 'male', '1986-09-25', NULL, 'Supply Officer', '0546561452', '2022-12-25 13:37:48', 'dunamis', 'uploads/images/1673402799IMG-20220712-WA0003.jpg', 0, 'Married', 'James Opoku Appiah', 'Agnes Achiaa Amponsah', '', '', 'Dwomo', 'Nipaba brew area opposite He Who\'s house', '', '', 'Dunamis', 'BJ-0030-3884', 'yes', 'yes', 'yes', 'Bismark Opoku Boakye', '0244242342', 'Nyameyekese Opoku Appiah', 'Asomah Stella', '0547019453'),
(95, 'Georgina', 'Osaebea Sam', 'geosfori@gmail.com', '', 6, 'female', '1992-01-06', NULL, 'Nursing', '0241929028', '2023-01-06 21:59:06', 'english', 'uploads/images/1673418223IMG-20221128-WA0036.jpg', 0, 'Married', 'Isaac Ofori', 'Diana Ofori', '', '', 'Akwamufie', 'Opposite King-promise pub of Sampa-Kabile Road', '', '', 'English', '', 'yes', 'yes', 'yes', 'Abraham Sam', '0548214842', 'Alvin Nyansah Sam', 'Abraham Sam', '0548214842'),
(96, 'Adongo', 'Josephine', 'adongojosephine@gmail.com', '', 4, 'female', '1990-05-01', NULL, 'Vertinarian', '0245656886', '2023-01-08 12:53:39', 'english', NULL, 0, 'Married', 'Adongo A. Erasmus', 'Adongo A. Rita', '', '0549620290', 'Bolgatanga', 'Vertinary Quaters Sampa', '', '', 'English', 'BJ-005-0094', 'yes', 'yes', 'yes', 'Mador Wisdom', '0543549353', '', 'Wisdom Mador', '0543549535');

-- --------------------------------------------------------

--
-- Table structure for table `operations`
--

CREATE TABLE `operations` (
  `id` int(11) NOT NULL,
  `appname` varchar(100) NOT NULL,
  `district_name` varchar(50) NOT NULL,
  `area_name` varchar(50) NOT NULL,
  `church_name` varchar(100) NOT NULL,
  `location` varchar(200) NOT NULL,
  `image` varchar(2048) DEFAULT NULL,
  `disabled` tinyint(4) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `operations`
--

INSERT INTO `operations` (`id`, `appname`, `district_name`, `area_name`, `church_name`, `location`, `image`, `disabled`) VALUES
(1, 'scopApp', 'Sampa District', 'Berekum Area', 'The Church of Pentecost', 'Sampa, Jaman North District', 'uploads/images/1670584613cop logo.png', 0);

-- --------------------------------------------------------

--
-- Table structure for table `permissions_map`
--

CREATE TABLE `permissions_map` (
  `id` int(11) NOT NULL,
  `role_id` int(20) NOT NULL,
  `permission` varchar(100) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `permissions_map`
--

INSERT INTO `permissions_map` (`id`, `role_id`, `permission`, `disabled`) VALUES
(1, 1, 'view_admin_area', 1),
(2, 1, 'view_categories', 0),
(3, 1, 'add_categories', 1),
(4, 1, 'edit_categories', 1),
(5, 1, 'delete_categories', 1),
(6, 1, 'view_permissions', 0),
(7, 1, 'add_permissions', 1),
(8, 1, 'edit_permissions', 1),
(9, 1, 'delete_permissions', 1),
(10, 1, 'view_roles', 0),
(11, 1, 'add_roles', 1),
(12, 1, 'edit_roles', 1),
(13, 1, 'delete_roles', 1),
(14, 1, 'edit_slider_images', 1),
(15, 1, 'view_dashboard', 0),
(16, 1, 'view_sales', 0),
(17, 1, 'edit_sales', 1),
(18, 1, 'delete_sales', 1),
(37, 2, 'view_admin_area', 1),
(38, 2, 'view_categories', 1),
(39, 2, 'add_categories', 1),
(40, 2, 'edit_categories', 1),
(41, 2, 'delete_categories', 1),
(42, 2, 'view_permissions', 1),
(43, 2, 'add_permissions', 1),
(44, 2, 'edit_permissions', 1),
(45, 2, 'delete_permissions', 1),
(46, 2, 'view_roles', 1),
(47, 2, 'add_roles', 1),
(48, 2, 'edit_roles', 1),
(49, 2, 'delete_roles', 1),
(50, 2, 'edit_slider_images', 1),
(51, 2, 'view_dashboard', 1),
(52, 2, 'view_sales', 1),
(53, 2, 'edit_sales', 1),
(54, 2, 'delete_sales', 1),
(55, 1, 'view_home', 0),
(56, 4, 'view_home', 0),
(57, 4, 'view_categories', 0),
(58, 4, 'view_permissions', 0),
(59, 4, 'view_roles', 0),
(60, 5, 'view_home', 0),
(61, 5, 'view_admin_area', 0),
(62, 5, 'view_categories', 0),
(63, 5, 'add_categories', 0),
(64, 5, 'view_permissions', 0),
(65, 5, 'grant_permissions', 0),
(66, 5, 'view_roles', 0),
(67, 5, 'assign_roles', 0),
(68, 5, 'add_roles', 0),
(69, 5, 'view_dashboard', 0),
(70, 5, 'view_sales', 0),
(71, 5, 'edit_sales', 0),
(72, 5, 'add_marital_status', 0),
(73, 5, 'view_marital_status', 0),
(74, 5, 'edit_marital_status', 0),
(75, 5, 'delete_marital_status', 0),
(76, 5, 'edit_user', 0);

-- --------------------------------------------------------

--
-- Table structure for table `positions`
--

CREATE TABLE `positions` (
  `id` int(11) NOT NULL,
  `position` varchar(50) NOT NULL,
  `disabled` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `positions`
--

INSERT INTO `positions` (`id`, `position`, `disabled`) VALUES
(4, 'Dist. CM Leader', 0),
(5, 'Dist. Evg. Ldr.', 0),
(6, 'Dist. PEMEM Ldr.', 0),
(8, 'Dist. MPWDs Coordi', 0),
(9, 'Dist. HUM Coordi', 0),
(10, 'Dist. SoM Coordi', 0),
(12, 'Sofomaame', 0),
(13, 'Dist. Secretary', 0),
(14, 'Dist. Finance Chair', 0),
(15, 'Dist. Exe. Member', 0),
(19, 'Dist. Ass. CM Ldr.', 0),
(20, 'Dist. Ass. PEMEM Ldr.', 0),
(21, 'Dist. Evg. Exec. Memb.', 0),
(22, 'Dist. YM Exe. Mem.', 0),
(23, 'Dist. PEMEM Exe. Memb.', 0),
(24, 'Dist. CM Exec. Memb.', 0),
(25, 'Dist. Women Exe. Memb.', 0),
(26, 'Dist. Women Ldr.', 0),
(30, 'Dist. YM Ldr.', 0),
(33, 'Dist. Ass. YM Ldr.', 0),
(34, 'Dist. Ass. Women\'s Ldr.', 0),
(36, 'Dist. CM Sec.', 0),
(37, 'Dist. Pastor', 0),
(38, 'Dist. Ass. Evange. Ldr.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `id` int(11) NOT NULL,
  `member_id` varchar(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `month` varchar(15) NOT NULL,
  `status` varchar(10) NOT NULL,
  `comment` text DEFAULT NULL,
  `marked_by` varchar(20) NOT NULL,
  `marked_on` date NOT NULL,
  `updated_by` varchar(40) NOT NULL,
  `updated_on` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`id`, `member_id`, `name`, `gender`, `month`, `status`, `comment`, `marked_by`, `marked_on`, `updated_by`, `updated_on`) VALUES
(1, '20', 'Abigail Soboe', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(2, '1', 'Abraham Albert Sam', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(3, '62', 'Agnes Fortwe', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(4, '18', 'Alvin Nyansah Sam', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(5, '49', 'Benjamin Nobi Narh', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(6, '75', 'Bernice Nobi', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(7, '92', 'Blessing Konadu', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(8, '73', 'Cecilia Djorkah', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(9, '24', 'Christopher Atta Damoah', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(10, '67', 'Daniel Adjei', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(11, '52', 'Daniel Asante Dwomoh', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(12, '51', 'Daniel Dansah', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(13, '47', 'Daniel Yeboah', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(14, '66', 'David Appiadu', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(15, '46', 'Ebenezer Sarfo', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(16, '90', 'Elijah Gyabaa', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(17, '93', 'Emmanuel Agyare', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(18, '48', 'Eric Danso', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(19, '22', 'Famous Yiborku', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(20, '54', 'Faustina Asibi', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(21, '70', 'Ferdinand Nii Ahele Nunoo', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(22, '21', 'Francis Yeboah', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(23, '87', 'Frank Peprah', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(24, '45', 'James A. Ayambila', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(25, '44', 'Jennifer Niwirdo Akos', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(26, '43', 'Jessica Matir', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(27, '42', 'Joyce Konjour', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(28, '71', 'Kofi Abraham', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(29, '41', 'Lydia Nkungin', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(30, '40', 'Manyang Diana M.', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(31, '68', 'Mawuli Asamoah Asiedu', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(32, '53', 'Mercy Barnes', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(33, '79', 'Naadribe Benedicta', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(34, '61', 'Najah Simon', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(35, '39', 'Nyinbe Sophia', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(36, '58', 'Nyini Yaa Monica', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(37, '94', 'Opoku Mensah Alex', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(38, '81', 'Patience Nketsiah', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(39, '69', 'Prosper Kukuiah', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(40, '11', 'Raymond Ahadzie', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(41, '80', 'Rita Attaa', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(42, '65', 'Rose Ahadzi', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(43, '74', 'Samuel Narh', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(44, '91', 'Sandra Mensah', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(45, '57', 'Seli Akosua Sarah', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(46, '89', 'Serwaa Afia Abigail', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(47, '60', 'Sie K. Shadrack', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(48, '55', 'Suasan Yaw Frank', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(49, '64', 'Theophilus Barnes', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(50, '63', 'Twenewaa Joana', 'female', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(51, '56', 'Twenewaa Odert', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(52, '19', 'Wisdom Mador', 'male', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(53, '59', 'Yeli Ruth Amma', 'female', 'Sat, 31st Dec, ', 'PRESENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(54, '72', 'Victor Baapere', 'male', 'Sat, 31st Dec, ', 'ABSENT', '', 'Abraham Albert Sam', '2022-12-31', '', '0000-00-00'),
(55, '20', 'Abigail Soboe', 'female', 'Sun, 1st Jan, 2', 'PRESENT', '', 'Abraham Albert Sam', '2023-01-01', '', '0000-00-00'),
(56, '1', 'Abraham Albert Sam', 'female', 'Sun, 1st Jan, 2', 'PRESENT', '', 'Abraham Albert Sam', '2023-01-01', '', '0000-00-00'),
(57, '18', 'Alvin Nyansah Sam', 'male', '1st Jan, 2023', 'PRESENT', '', 'Abraham Albert Sam', '2023-01-01', '', '0000-00-00'),
(58, '49', 'Benjamin Nobi Narh', 'male', '1st Jan, 2023', 'PRESENT', '', 'Abraham Albert Sam', '2023-01-01', '', '0000-00-00'),
(59, '62', 'Agnes Fortwe', 'female', '1st Jan, 2023', 'PRESENT', '', 'Abraham Albert Sam', '2023-01-01', '', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role` varchar(30) NOT NULL,
  `member_role1` varchar(50) NOT NULL,
  `member_role2` varchar(50) NOT NULL,
  `member_role3` varchar(50) NOT NULL,
  `member_role4` varchar(50) NOT NULL,
  `member_role5` varchar(50) NOT NULL,
  `disabled` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role`, `member_role1`, `member_role2`, `member_role3`, `member_role4`, `member_role5`, `disabled`) VALUES
(1, 'user', '', '', '', '', '', 0),
(2, 'admin', 'Abraham Albert Sam', 'Daniel Dansah', 'Ferdinand Nii Ahele Nunoo', 'Lydia Nkungin', 'Ebenezer Sarfo', 0),
(4, 'member', '', '', '', '', '', 0),
(5, 'elder', '', '', '', '', '', 0),
(6, 'deaconess', '', '', '', '', '', 0),
(7, 'deacon', '', '', '', '', '', 0),
(8, 'child', 'Abigail Soboe', 'Daniel Asante Dwomoh', 'Agnes Fortwe', 'James A. Ayambila', 'Naadribe Benedicta', 0),
(9, 'visitor', '', '', '', '', '', 0),
(10, 'pastor', '', '', '', '', '', 0),
(11, 'sofomaame', '', '', '', '', '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activities`
--
ALTER TABLE `activities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `role` (`role`),
  ADD KEY `date` (`date`),
  ADD KEY `slug` (`slug`),
  ADD KEY `gender` (`gender`),
  ADD KEY `marital_status_id` (`marital_status_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `dob` (`dob`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category` (`category`),
  ADD KEY `disabled` (`disabled`);

--
-- Indexes for table `category_sub`
--
ALTER TABLE `category_sub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `localpositions`
--
ALTER TABLE `localpositions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `marital_status`
--
ALTER TABLE `marital_status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `members`
--
ALTER TABLE `members`
  ADD PRIMARY KEY (`id`),
  ADD KEY `email` (`email`),
  ADD KEY `firstname` (`firstname`),
  ADD KEY `lastname` (`lastname`),
  ADD KEY `role` (`role`),
  ADD KEY `date` (`date`),
  ADD KEY `slug` (`slug`),
  ADD KEY `gender` (`gender`),
  ADD KEY `marital_status_id` (`marital_status_id`),
  ADD KEY `position_id` (`position_id`),
  ADD KEY `dob` (`dob`),
  ADD KEY `localposition_id` (`localposition_id`);

--
-- Indexes for table `operations`
--
ALTER TABLE `operations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `permissions_map`
--
ALTER TABLE `permissions_map`
  ADD PRIMARY KEY (`id`),
  ADD KEY `permission` (`permission`),
  ADD KEY `disabled` (`disabled`),
  ADD KEY `role_id` (`role_id`);

--
-- Indexes for table `positions`
--
ALTER TABLE `positions`
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
  ADD PRIMARY KEY (`id`),
  ADD KEY `disabled` (`disabled`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activities`
--
ALTER TABLE `activities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `category_sub`
--
ALTER TABLE `category_sub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `localpositions`
--
ALTER TABLE `localpositions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `marital_status`
--
ALTER TABLE `marital_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `members`
--
ALTER TABLE `members`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=97;

--
-- AUTO_INCREMENT for table `operations`
--
ALTER TABLE `operations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `permissions_map`
--
ALTER TABLE `permissions_map`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `positions`
--
ALTER TABLE `positions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
