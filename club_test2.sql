-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Mar 12, 2023 at 11:18 AM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `club_test2`
--

-- --------------------------------------------------------

--
-- Table structure for table `add_logo`
--

CREATE TABLE `add_logo` (
  `id` int NOT NULL,
  `img` varchar(200) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `add_logo`
--

INSERT INTO `add_logo` (`id`, `img`) VALUES
(2, 'club-logo-new1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `admin_info`
--

CREATE TABLE `admin_info` (
  `admin_id` int NOT NULL,
  `admin_email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `admin_pass` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `role` int NOT NULL DEFAULT '1',
  `default_lang` char(2) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'en'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin_info`
--

INSERT INTO `admin_info` (`admin_id`, `admin_email`, `admin_pass`, `role`, `default_lang`) VALUES
(1, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 1, 'en'),
(3, 'moazzem@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'en'),
(4, 'yearul@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', 2, 'en'),
(5, 'new@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 1, 'en');

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `booking_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `game_id` int NOT NULL,
  `club_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `booking_from` int NOT NULL,
  `booking_to` int NOT NULL,
  `timestamp` int NOT NULL,
  `object_id` int NOT NULL,
  `object` char(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`booking_id`, `name`, `email`, `phone`, `game_id`, `club_id`, `price`, `booking_from`, `booking_to`, `timestamp`, `object_id`, `object`) VALUES
(2, 'Mohd Zaid', 'nmzaid376@gmail.com', '9759955376', 15, 20, '0.00', 1672170420, 1673120820, 1671982081, 0, ''),
(3, 'Mohd Zaid', 'mds@gmail.com', '9759955376', 15, 20, '112.22', 1672143000, 1672146600, 1672159289, 0, ''),
(5, 'jg', 'nmzaid376@gmail.com', '9759955376', 16, 46, '345.40', 1674944520, 1674930360, 1674913932, 0, ''),
(6, 'Test Booking', 'test@gmail.com', '6555578888', 0, 52, '56.00', 1676388600, 1675621800, 1675594863, 0, ''),
(7, 'tes', 'admin45@gmail.com', '9759955376', 19, 52, '56.00', 1675956960, 1675784040, 1675595048, 6, 'T'),
(8, 'Mohd Zaid', 'nmzaid376@gmail.com', '9759955376', 19, 52, '49.00', 1675624200, 1675620600, 1675597246, 6, 'T'),
(9, 'Mohd Zaid', 'mds@gmail.com', '9759955376', 40, 52, '470.40', 1675616400, 1675789200, 1675600923, 6, 'T'),
(10, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 36, 52, '0.00', 1676319000, 1676319000, 1676288419, 1, 'G'),
(11, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 36, 52, '2.88', 1676311920, 1676319180, 1676292011, 1, 'G'),
(12, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 36, 52, '2.88', 1676311980, 1676322660, 1676292081, 1, 'G'),
(13, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 36, 52, '417.94', 1676311980, 1677359460, 1676292105, 1, 'G'),
(14, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 40, 52, '0.00', 1676312700, 1676668980, 1676292801, 2, 'P'),
(15, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 40, 52, '3517.20', 1676312700, 1676571900, 1676292878, 2, 'P'),
(16, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 42, 52, '3.39', 1675284780, 1680382380, 1676301837, 1, 'M'),
(17, 'Mohd Zaid', 'admin@gmail.com', '09759955376', 38, 52, '0.00', 1678710360, 1678883160, 1678604296, 12, 'T');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `category_id` int NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'A'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`category_id`, `status`) VALUES
(1, 'A'),
(2, 'A'),
(5, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `category_descriptions`
--

CREATE TABLE `category_descriptions` (
  `category_id` int NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category_descriptions`
--

INSERT INTO `category_descriptions` (`category_id`, `category`, `description`, `lang_code`) VALUES
(1, 'New Test Category', 'Desc', 'ar'),
(1, 'New Test Categoryhh', 'Descgg', 'en'),
(2, 'New Test Category disabled', 'Desc', 'ar'),
(2, 'New Test Category disabled', 'Desc', 'en'),
(3, 'ft', 'Desc', 'ar'),
(3, 'ft', 'Desc', 'en'),
(5, 'New Test Category', 'Desc', 'ar'),
(5, 'New Test Category', 'Desc', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `clubs`
--

CREATE TABLE `clubs` (
  `club_id` int NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `contact_person` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `website` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` int NOT NULL,
  `default_lang` char(2) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'en',
  `game_ids` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `licence_expiry` int NOT NULL,
  `subscription_id` int NOT NULL DEFAULT '0',
  `type` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'C'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clubs`
--

INSERT INTO `clubs` (`club_id`, `address`, `city`, `contact_person`, `email`, `phone`, `website`, `status`, `password`, `timestamp`, `default_lang`, `game_ids`, `licence_expiry`, `subscription_id`, `type`) VALUES
(45, '', 'Moradabad', 'Mohd Zaid', 'club12@gmail.com', '9759955376', 'http://www.comp.com', 'D', '827ccb0eea8a706c4c34a16891f84e7b', 1674374170, 'en', '16,19', 1676138700, 1, 'G'),
(47, 'This is full address', 'Moradabad', 'Mohd Zaid', 'admin@gmail.com', '7877978765', 'http://www.comp.com', 'A', '25d55ad283aa400af464c76d713c07ad', 1674912742, 'en', '', 1676743500, 1, 'C'),
(48, '', 'Moradabad', 'Mohd Zaid', 'admin33@gmail.com', '9759955376', 'http://www.comp.com', 'D', '827ccb0eea8a706c4c34a16891f84e7b', 1674991822, 'en', '', 0, 0, 'C'),
(49, '', 'Moradabad', 'Mohd Zaid', 'admindfef@gmail.com', '776767776767', 'http://www.comp.com', 'D', '827ccb0eea8a706c4c34a16891f84e7b', 1674991923, 'en', '', 0, 0, 'C'),
(50, '', 'Moradabad', 'Mohd Zaid', 'admindfef@gmail.com', '77676777676733', 'http://www.comp.com', 'D', '827ccb0eea8a706c4c34a16891f84e7b', 1674992297, 'en', '15,16,19', 0, 1, 'C'),
(51, '', 'Moradabad', 'Mohd Zaid', 'admin@gmail.com', '975995567', 'http://www.comp.com', 'D', '827ccb0eea8a706c4c34a16891f84e7b', 1675007566, 'en', '15', 0, 4, 'G'),
(52, '', 'Moradabad', 'Mohd Zaid', 'admin55555@gmail.com', '9759955376', 'http://www.comp.com', 'D', 'e10adc3949ba59abbe56e057f20f883e', 1675445913, 'en', '42,41,40,35,36,38', 0, 1, 'G'),
(53, '', 'Moradabad', 'Mohd Zaid', '4555@gmail.com', '97599555656', 'http://www.comp.com', 'D', '827ccb0eea8a706c4c34a16891f84e7b', 1675448261, 'en', '15,21,22,23,24,25,26,27,28,29,30,31', 0, 4, 'C'),
(55, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'adeeeeemin@gmail.com', '097554444376', 'http://www.comp.com', 'A', '81dc9bdb52d04dc20036dbd8313ed055', 1676476570, 'en', NULL, 1676503380, 0, 'C'),
(56, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'admggggggin@gmail.com', '09759955376', 'http://www.comp.com', 'A', '81dc9bdb52d04dc20036dbd8313ed055', 1676477196, 'en', NULL, 1676464560, 5, 'C'),
(57, '', 'Moradabad', 'Mohd Zaid', 'admi6655n55555@gmail.com', '09759955376', 'http://www.comp.com', 'A', 'e10adc3949ba59abbe56e057f20f883e', 1676655859, 'en', NULL, 1677287580, 4, 'C'),
(58, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'root55@gmail.com', '097566555555', 'http://www.comp.com', 'A', 'e10adc3949ba59abbe56e057f20f883e', 1676805986, 'en', NULL, 1676836500, 4, 'C'),
(59, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'root@55gmail.com', '09759944444', 'http://www.comp.com', 'A', 'e10adc3949ba59abbe56e057f20f883e', 1676808534, 'en', NULL, 1676835480, 1, 'C'),
(62, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'root333322@gmail.com', '09759433333', 'http://www.comp.com', 'A', '25d55ad283aa400af464c76d713c07ad', 1676809903, 'en', NULL, 1676836860, 1, 'C'),
(64, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'root@ggffs.comnn', '095444335376', 'http://www.comp.com', 'A', '81c3b080dad537de7e10e0987a4bf52e', 1676812692, 'en', NULL, 1676839620, 1, 'C'),
(65, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'ro65554@gmail.com2', '097988877655', 'http://www.comp.com', 'A', '81c3b080dad537de7e10e0987a4bf52e', 1676813251, 'en', NULL, 1676840220, 4, 'C'),
(75, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', '44@gmail.com', '0954440376', 'http://www.comp.com', 'A', 'e10adc3949ba59abbe56e057f20f883e', 1676826928, 'en', NULL, 1676817840, 1, 'C'),
(76, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'rootssss@55gmail.com', '09759955376', 'http://www.comp.com', 'A', '81c3b080dad537de7e10e0987a4bf52e', 1678522161, 'en', NULL, 1678549080, 4, 'C'),
(77, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'root$@gggmm.com', '09759955376', 'http://www.comp.com', 'A', '81c3b080dad537de7e10e0987a4bf52e', 1678524707, 'en', NULL, 1678548060, 1, 'C'),
(78, 'Moradabad,Uttar Pradesh', 'Moradabad', 'Mohd Zaid', 'root$@gggmm.com', '09759955376', 'http://www.comp.com', 'A', '81c3b080dad537de7e10e0987a4bf52e', 1678524814, 'en', NULL, 1678548060, 1, 'G'),
(79, '', 'testhhh', 'Mohd Zaid', 'testemailllll@gmail.com', '096555555444', 'http://www.comp.com', 'D', '9b569f88da56bc5530c11dca4ea52c58', 1678525561, 'en', NULL, 1678552500, 4, 'G'),
(80, '', 'Moradabad', 'Mohd Zaid', 'tettrrrrlllll@gmail.com', '0665555376', 'http://www.comp.com', 'D', '9b569f88da56bc5530c11dca4ea52c58', 1678525702, 'en', NULL, 1678459080, 5, 'G');

-- --------------------------------------------------------

--
-- Table structure for table `club_descriptions`
--

CREATE TABLE `club_descriptions` (
  `club_id` int NOT NULL,
  `club` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `activities_desc` text COLLATE utf8mb4_general_ci NOT NULL,
  `history` text COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `club_descriptions`
--

INSERT INTO `club_descriptions` (`club_id`, `club`, `activities_desc`, `history`, `lang_code`) VALUES
(32, 'tftfwd', '', '', 'ar'),
(32, 'tftfwd', '', '', 'en'),
(33, '', '', '', 'ar'),
(33, '', '', '', 'en'),
(34, 'jsgf', '', '', 'ar'),
(34, 'jsgf', '', '', 'en'),
(35, 'jsgf', '', '', 'ar'),
(35, 'jsgf', '', '', 'en'),
(36, 'gegewf', '', '', 'ar'),
(36, 'gegewf', '', '', 'en'),
(37, 'gegewf', '', '', 'ar'),
(37, 'gegewf', '', '', 'en'),
(38, 'ugiegf', '', '', 'ar'),
(38, 'ugiegf', '', '', 'en'),
(39, 'dgdg', '', '', 'ar'),
(39, 'dgdg', '', '', 'en'),
(45, 'gegewf', '', '', 'ar'),
(45, 'gegewf', '', '', 'en'),
(47, 'This is club', 'This is club', 'Club History', 'ar'),
(47, 'This is club jgfyge gfg', 'This is club', 'Club History', 'en'),
(48, 'Testsg', '', '', 'ar'),
(48, 'Testsg', '', '', 'en'),
(49, 'jywgygw', '', '', 'ar'),
(49, 'jywgygw', '', '', 'en'),
(50, 'jywgygw', '', '', 'ar'),
(50, 'jywgygw', '', '', 'en'),
(51, 'gegewf', '', '', 'ar'),
(51, 'gegewf', '', '', 'en'),
(52, 'gegewf', '', '', 'ar'),
(52, 'gegewf', '', '', 'en'),
(53, 'gegewf', '', '', 'ar'),
(53, 'gegewf', '', '', 'en'),
(55, 'Dubai Snooker Club', 'ss', 'sss', 'ar'),
(55, 'Dubai Snooker Club', 'ss', 'sss', 'en'),
(56, 'Dubai Snooker Club', 'gggg', 'fff', 'ar'),
(56, 'Dubai Snooker Club', 'gggg', 'fff', 'en'),
(57, 'Dubai Snooker Club', '', '', 'ar'),
(57, 'Dubai Snooker Club', '', '', 'en'),
(58, 'Dubai Snooker Club', 'dd', 'sss', 'ar'),
(58, 'Dubai Snooker Club', 'dd', 'sss', 'en'),
(59, 'Dubai Snooker Club', 'ggg', 'gg', 'ar'),
(59, 'Dubai Snooker Club', 'ggg', 'gg', 'en'),
(62, 'Dubai Snooker Club', 'ggg', 'ggg', 'ar'),
(62, 'Dubai Snooker Club', 'ggg', 'ggg', 'en'),
(64, 'Dubai Snooker Club', 'dddd', 'ddd', 'ar'),
(64, 'Dubai Snooker Club', 'dddd', 'ddd', 'en'),
(65, 'Dubai Snooker Club', 'ddd', 'ggg', 'ar'),
(65, 'Dubai Snooker Club', 'ddd', 'ggg', 'en'),
(75, 'Test Club', 'sss', 'sss', 'ar'),
(75, 'Test Club', 'sss', 'sss', 'en'),
(76, 'Dubai Snooker Club', 'sss', 'ss', 'ar'),
(76, 'Dubai Snooker Club', 'sss', 'ss', 'en'),
(77, 'Test gov', 'sggs', 'ttts', ''),
(77, 'Test gov', 'sggs', 'ttts', 'ar'),
(77, 'Test gov', 'sggs', 'ttts', 'en'),
(78, 'Test gov', 'sggs', 'ttts', 'ar'),
(78, 'Test gov', 'sggs', 'ttts', 'en'),
(79, 'test gv register', '', '', 'ar'),
(79, 'test gv register', '', '', 'en'),
(80, 'etts', '', '', 'ar'),
(80, 'etts', '', '', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `cupon`
--

CREATE TABLE `cupon` (
  `cupon_id` int NOT NULL,
  `cupon_code` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `discount` int NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'A',
  `expiry_date` int NOT NULL,
  `club_id` int NOT NULL,
  `influencer_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `influencer_amount` decimal(10,2) NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cupon`
--

INSERT INTO `cupon` (`cupon_id`, `cupon_code`, `description`, `discount`, `status`, `expiry_date`, `club_id`, `influencer_name`, `influencer_amount`, `price`) VALUES
(1, 'fruitsbazar', 'It\'s a discount coupon.', 10, 'D', 0, 0, '', '0.00', '0.00'),
(2, 'eid2021', 'Eid discount', 15, 'D', 0, 0, '', '0.00', '0.00'),
(3, 'eid2021', 'Eid discount', 15, 'D', 0, 0, '', '0.00', '0.00'),
(4, 'xgdg', 'sdfes', 22, 'D', 1613068264, 0, '', '0.00', '0.00'),
(5, 'CODE', 'jghfj', 333, 'A', 1708021864, 0, '', '0.00', '0.00'),
(6, 'THIS', 'This', 66, 'D', 0, 0, '', '0.00', '0.00'),
(7, 'THIS', 'This', 66, 'D', 0, 0, '', '0.00', '0.00'),
(8, 'CODE', 'jghfj', 67, 'D', 1675769280, 0, '', '0.00', '0.00'),
(9, 'CODE', 'jghfj', 64, 'D', 1675769400, 52, '', '0.00', '0.00');

-- --------------------------------------------------------

--
-- Table structure for table `customer_feedback`
--

CREATE TABLE `customer_feedback` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pdt_id` int NOT NULL,
  `comment` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `comment_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer_feedback`
--

INSERT INTO `customer_feedback` (`id`, `user_id`, `user_name`, `pdt_id`, `comment`, `comment_date`) VALUES
(1, 1, 'saiful', 4, 'This product is very good', '2021-09-11'),
(4, 5, 'karim', 6, 'Good product', '2021-09-15');

-- --------------------------------------------------------

--
-- Table structure for table `expenses`
--

CREATE TABLE `expenses` (
  `expense_id` int NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `supplier_id` int NOT NULL,
  `timestamp` int NOT NULL,
  `club_id` int NOT NULL,
  `amount` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `expenses`
--

INSERT INTO `expenses` (`expense_id`, `name`, `description`, `supplier_id`, `timestamp`, `club_id`, `amount`) VALUES
(1, 'tests', 'descss', 2, 1678924800, 52, '22.00'),
(2, 'Mohd Zaid', 'ss', 1, 1678838400, 52, '10.00'),
(4, 'test', 'hhs', 1, 1678579200, 52, '10.00');

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `game_id` int NOT NULL,
  `booking_by` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `min_players` int NOT NULL,
  `field_type` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` int NOT NULL,
  `time_slot` int NOT NULL,
  `subscription_type` char(1) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`game_id`, `booking_by`, `min_players`, `field_type`, `status`, `timestamp`, `time_slot`, `subscription_type`) VALUES
(15, 'S', 12, 'T', 'A', 1671364981, 0, 'Y'),
(33, 'S', 20, 'T', 'A', 1674929861, 0, 'Y'),
(35, 'H', 50, 'T', 'A', 1675790588, 0, ''),
(36, 'T', 56, 'G', 'A', 1676200355, 34, ''),
(38, 'H', 38, 'T', 'A', 1676200582, 0, ''),
(40, 'T', 12, 'P', 'A', 1676278807, 1, ''),
(42, 'M', 39, 'M', 'A', 1676294189, 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `game_descriptions`
--

CREATE TABLE `game_descriptions` (
  `game_id` int NOT NULL,
  `game` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_descriptions`
--

INSERT INTO `game_descriptions` (`game_id`, `game`, `lang_code`) VALUES
(15, 'كريكيت', 'ar'),
(15, 'ytdyarabic ga', 'en'),
(33, 'hhfde', 'ar'),
(33, 'hhfde', 'en'),
(35, 'this is game', 'ar'),
(35, 'sthis is games', 'en'),
(36, 'Ground Game', 'ar'),
(36, 'Ground Game', 'en'),
(38, 'this game 7', 'ar'),
(38, 'this game 7', 'en'),
(40, 'Test Pitch Game', 'ar'),
(40, 'Test Pitch Game', 'en'),
(42, 'Mothly Test', 'ar'),
(42, 'Mothly Test', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `game_grounds`
--

CREATE TABLE `game_grounds` (
  `ground_id` int NOT NULL,
  `game_id` int NOT NULL,
  `club_id` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_grounds`
--

INSERT INTO `game_grounds` (`ground_id`, `game_id`, `club_id`, `price`) VALUES
(1, 36, 52, 49),
(2, 36, 52, 49);

-- --------------------------------------------------------

--
-- Table structure for table `game_ground_descriptions`
--

CREATE TABLE `game_ground_descriptions` (
  `ground_id` int NOT NULL,
  `ground_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_ground_descriptions`
--

INSERT INTO `game_ground_descriptions` (`ground_id`, `ground_name`, `lang_code`) VALUES
(1, 'Ground Tets', 'ar'),
(1, 'Ground Tetsdd', 'en'),
(2, 'Ground Tets', 'ar'),
(2, 'Ground Tets', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `game_memberships`
--

CREATE TABLE `game_memberships` (
  `membership_id` int NOT NULL,
  `game_id` int NOT NULL,
  `club_id` int NOT NULL,
  `months` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_memberships`
--

INSERT INTO `game_memberships` (`membership_id`, `game_id`, `club_id`, `months`, `price`) VALUES
(1, 42, 52, 28, '49.00'),
(2, 42, 52, 24, '48.86');

-- --------------------------------------------------------

--
-- Table structure for table `game_membership_descriptions`
--

CREATE TABLE `game_membership_descriptions` (
  `membership_id` int NOT NULL,
  `membership_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_membership_descriptions`
--

INSERT INTO `game_membership_descriptions` (`membership_id`, `membership_name`, `lang_code`) VALUES
(1, 'tttt', 'ar'),
(1, 'tttt', 'en'),
(2, 'tttt', 'ar'),
(2, 'ggg', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `game_pitches`
--

CREATE TABLE `game_pitches` (
  `pitch_id` int NOT NULL,
  `game_id` int NOT NULL,
  `club_id` int NOT NULL,
  `price` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_pitches`
--

INSERT INTO `game_pitches` (`pitch_id`, `game_id`, `club_id`, `price`) VALUES
(2, 40, 52, '48.85'),
(3, 40, 52, '49.19');

-- --------------------------------------------------------

--
-- Table structure for table `game_pitch_descriptions`
--

CREATE TABLE `game_pitch_descriptions` (
  `pitch_id` int NOT NULL,
  `pitch_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_pitch_descriptions`
--

INSERT INTO `game_pitch_descriptions` (`pitch_id`, `pitch_name`, `lang_code`) VALUES
(2, 'Test Pitch', 'ar'),
(2, 'Test Pitch', 'en'),
(3, 'Test Pitch2', 'ar'),
(3, 'Test Pitch233', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `game_tables`
--

CREATE TABLE `game_tables` (
  `table_id` int NOT NULL,
  `game_id` int NOT NULL,
  `club_id` int NOT NULL,
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_tables`
--

INSERT INTO `game_tables` (`table_id`, `game_id`, `club_id`, `price`) VALUES
(6, 19, 52, 49),
(7, 19, 52, 78),
(8, 0, 52, 48),
(9, 19, 52, 45),
(12, 38, 52, 33),
(13, 38, 52, 49);

-- --------------------------------------------------------

--
-- Table structure for table `game_table_descriptions`
--

CREATE TABLE `game_table_descriptions` (
  `table_id` int NOT NULL,
  `table_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `game_table_descriptions`
--

INSERT INTO `game_table_descriptions` (`table_id`, `table_name`, `lang_code`) VALUES
(6, 'Table 5', 'ar'),
(6, 'Table 66', 'en'),
(7, 'Tbrf', 'ar'),
(7, 'Tbale 2', 'en'),
(8, 'Table 5', 'ar'),
(8, 'Table 5', 'en'),
(9, 'Table', 'ar'),
(9, 'Table', 'en'),
(12, 'Table Add', 'ar'),
(12, 'Table Add', 'en'),
(13, 'Table Add2', 'ar'),
(13, 'Table Add2', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `header_info`
--

CREATE TABLE `header_info` (
  `id` int NOT NULL,
  `email` varchar(30) COLLATE utf8mb4_general_ci NOT NULL,
  `tweeter` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `fb_link` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `pinterest` varchar(500) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `header_info`
--

INSERT INTO `header_info` (`id`, `email`, `tweeter`, `fb_link`, `pinterest`, `phone`) VALUES
(10, 'switech@gmail.com', 'https://twitter.com/', 'https://facebook.com/', 'https://pinerest.com/', '01982364958');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `job_id` int NOT NULL,
  `type` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `salary` decimal(10,2) NOT NULL,
  `show_company_name` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'A',
  `timestamp` int NOT NULL,
  `club_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`job_id`, `type`, `salary`, `show_company_name`, `status`, `timestamp`, `club_id`) VALUES
(3, 'C', '2000.00', 'Y', 'A', 1672553594, 0),
(6, 'F', '5455.00', 'A', 'D', 1675590025, 52);

-- --------------------------------------------------------

--
-- Table structure for table `job_applicants`
--

CREATE TABLE `job_applicants` (
  `applicant_id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `phone` text COLLATE utf8mb4_general_ci NOT NULL,
  `job_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_applicants`
--

INSERT INTO `job_applicants` (`applicant_id`, `name`, `email`, `phone`, `job_id`) VALUES
(1, 'HHH', 'ddd@gm.com', '97766666655', 6),
(2, 'Mohd Zaid', 'test@gmail.com', '9877777655', 6);

-- --------------------------------------------------------

--
-- Table structure for table `job_descriptions`
--

CREATE TABLE `job_descriptions` (
  `job_id` int NOT NULL,
  `job_position` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `skills` text COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `job_descriptions`
--

INSERT INTO `job_descriptions` (`job_id`, `job_position`, `description`, `skills`, `lang_code`) VALUES
(3, '7e87tuiqr', 'efewfrewfefe', 'efefefe', 'ar'),
(3, '7e87tuiqr', 'efewfrewfefe', 'efefefe', 'en'),
(6, '7e87tuiqr1', 'yt', 'gu', 'ar'),
(6, '7e87tuiqr1', 'yt', 'gu', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `notification_id` int NOT NULL,
  `notification_text` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'A',
  `club_id` int NOT NULL DEFAULT '0',
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`notification_id`, `notification_text`, `status`, `club_id`, `timestamp`) VALUES
(1, 'Licence expried for club for club gegewf<a href=\"edit_club.php?action=edit&club_id=45\">Click To Renew</a>', 'A', 0, 0),
(2, 'Licence expried for club for club Snooker<a href=\"edit_club.php?action=edit&club_id=46\">Click To Renew</a>', 'A', 0, 0),
(7, 'Licence expried for club for club gegewf<a href=\"edit_club.php?action=edit&club_id=52\">Click To Renew</a>', 'A', 0, 0),
(8, 'Licence expried for club for club gegewf<a href=\"edit_club.php?action=edit&club_id=53\">Click To Renew</a>', 'A', 0, 0),
(17, '', 'A', 0, 1676221985),
(18, '', 'C', 0, 1676222788);

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int NOT NULL,
  `user_data` text COLLATE utf8mb4_general_ci NOT NULL,
  `products_data` text COLLATE utf8mb4_general_ci NOT NULL,
  `shipping_address` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `club_id` int NOT NULL DEFAULT '0',
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `user_data`, `products_data`, `shipping_address`, `club_id`, `status`, `price`, `timestamp`) VALUES
(3, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:1:{i:1;a:2:{s:10:\"product_id\";s:1:\"1\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 0, 'C', '49.00', 1642587385),
(4, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:3:{i:1;a:2:{s:10:\"product_id\";s:1:\"2\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:1:\"4\";s:5:\"price\";s:5:\"49.00\";}i:3;a:2:{s:10:\"product_id\";s:1:\"5\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 0, 'D', '147.00', 1674123385),
(6, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:3:{i:1;a:2:{s:10:\"product_id\";s:1:\"2\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:1:\"2\";s:5:\"price\";s:5:\"49.00\";}i:3;a:2:{s:10:\"product_id\";s:1:\"2\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '147.00', 1676270447),
(7, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:1:{i:1;a:2:{s:10:\"product_id\";s:1:\"4\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 0, 'D', '49.00', 1676728662),
(8, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:1:{i:1;a:2:{s:10:\"product_id\";s:1:\"5\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 0, 'D', '49.00', 1676801448),
(9, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:3:{i:1;a:2:{s:10:\"product_id\";s:1:\"7\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}i:3;a:2:{s:10:\"product_id\";s:2:\"23\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '98.01', 1678602179),
(10, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:1:{i:1;a:2:{s:10:\"product_id\";s:1:\"7\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 52, 'C', '49.00', 1678602933),
(11, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678603609),
(12, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678603726),
(13, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678603742),
(14, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678603782),
(15, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678603854),
(16, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678603861),
(17, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '49.01', 1678604116),
(18, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"7\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"23\";s:5:\"price\";s:5:\"49.00\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '98.00', 1678604134),
(19, 'a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}', 'a:2:{i:1;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}', 'Moradabad,Uttar Pradesh', 52, 'D', '0.02', 1678605202);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `product_id` int NOT NULL,
  `amount` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci DEFAULT 'A',
  `club_id` int NOT NULL DEFAULT '0',
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`product_id`, `amount`, `price`, `category_id`, `status`, `club_id`, `timestamp`) VALUES
(4, 10, '49.00', 2, 'A', 0, 0),
(5, 10, '49.00', 1, 'A', 0, 0),
(7, 10, '49.00', 2, 'A', 52, 0),
(8, 10, '49.00', 2, 'A', 52, 0),
(9, 10, '49.00', 2, 'A', 0, 0),
(10, 10, '345.40', 1, 'A', 0, 0),
(11, 10, '56.00', 2, 'A', 0, 0),
(12, 10, '56.00', 2, 'A', 0, 0),
(13, 27, '49.00', 1, 'A', 0, 0),
(14, 13, '49.00', 2, 'A', 0, 0),
(15, 10, '49.00', 1, 'A', 57, 0),
(16, 10, '49.00', 2, 'A', 0, 0),
(17, 10, '49.00', 1, 'A', 0, 0),
(18, 37, '49.03', 1, 'A', 0, 0),
(21, 10, '49.00', 1, 'A', 0, 0),
(22, 2, '0.01', 1, 'A', 52, 0),
(23, 14, '49.00', 1, 'A', 52, 0),
(24, 10, '49.00', 1, 'A', 52, 0);

-- --------------------------------------------------------

--
-- Table structure for table `product_descriptions`
--

CREATE TABLE `product_descriptions` (
  `product_id` int NOT NULL,
  `product` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product_descriptions`
--

INSERT INTO `product_descriptions` (`product_id`, `product`, `description`, `lang_code`) VALUES
(4, 'Test Product', 'gf', 'ar'),
(4, 'Test Product', 'gf ', 'en'),
(5, 'Test Product', 'ytf', 'ar'),
(5, 'Test Product', 'ytf ', 'en'),
(7, 'Test Product crrrlubhh', '6ye ff    ', 'ar'),
(7, 'Test Product clubhhhhh', '6ye  ', 'en'),
(8, 'Test Product', 'dddd', 'ar'),
(8, 'Test Product', 'dddd', 'en'),
(9, 'Test Product', 'fff', 'ar'),
(9, 'Test Product', 'fff', 'en'),
(10, 'Test Productttt', 'fg', 'ar'),
(10, 'Test Productttt', 'fg', 'en'),
(11, 'Test Producteeee', 'fhff', 'ar'),
(11, 'Test Producteeee', 'fhff', 'en'),
(12, 'Test Producteeee', 'fhff', 'ar'),
(12, 'Test Producteeee', 'fhff', 'en'),
(13, 'Test Producteee', 'ee', 'ar'),
(13, 'Test Producteee', 'ee', 'en'),
(14, 'Test Product', 'ddd', 'ar'),
(14, 'Test Product', 'ddd      ', 'en'),
(15, 'ttt', 'ss', 'ar'),
(15, 'ttt', 'ss', 'en'),
(16, 'Test Product', 'dd', 'ar'),
(16, 'Test Product', 'dd', 'en'),
(17, 'Test Product', 'eee', 'ar'),
(17, 'Test Product', 'eee', 'en'),
(18, 'Test Product2hh', 'fff', 'ar'),
(18, 'Test Product2hh', 'fff', 'en'),
(21, 'Test Product', 'dd', 'ar'),
(21, 'Test Product', 'dd  ', 'en'),
(22, 'Test Product', 'dd', 'ar'),
(22, 'Test Product', 'dd ', 'en'),
(23, 'Test Product', 'f', 'ar'),
(23, 'Test Product', 'f', 'en'),
(24, 'Test Product', 'ggg', 'ar'),
(24, 'Test Product', 'ggg', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `sales`
--

CREATE TABLE `sales` (
  `sale_id` int NOT NULL,
  `object_id` int NOT NULL,
  `object_type` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `data` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `total_price` decimal(10,2) NOT NULL,
  `club_id` int NOT NULL,
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sales`
--

INSERT INTO `sales` (`sale_id`, `object_id`, `object_type`, `data`, `total_price`, `club_id`, `timestamp`) VALUES
(2, 17, 'O', 'a:7:{s:8:\"products\";a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"8\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"22\";s:5:\"price\";s:4:\"0.01\";}}s:6:\"amount\";s:2:\"99\";s:9:\"user_data\";a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}s:16:\"shipping_address\";s:23:\"Moradabad,Uttar Pradesh\";s:6:\"status\";s:1:\"D\";s:12:\"create_order\";s:14:\"__create_order\";s:7:\"club_id\";s:2:\"52\";}', '49.01', 52, 1678604116),
(3, 18, 'O', 'a:7:{s:8:\"products\";a:2:{i:1;a:2:{s:10:\"product_id\";s:1:\"7\";s:5:\"price\";s:5:\"49.00\";}i:2;a:2:{s:10:\"product_id\";s:2:\"23\";s:5:\"price\";s:5:\"49.00\";}}s:6:\"amount\";s:2:\"15\";s:9:\"user_data\";a:2:{s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"phone\";s:11:\"09759955376\";}s:16:\"shipping_address\";s:23:\"Moradabad,Uttar Pradesh\";s:6:\"status\";s:1:\"D\";s:12:\"create_order\";s:14:\"__create_order\";s:7:\"club_id\";s:2:\"52\";}', '98.00', 52, 1678604134),
(4, 17, 'B', 'a:10:{s:7:\"game_id\";s:2:\"38\";s:9:\"object_id\";s:2:\"12\";s:6:\"object\";s:1:\"T\";s:4:\"name\";s:9:\"Mohd Zaid\";s:5:\"email\";s:15:\"admin@gmail.com\";s:5:\"phone\";s:11:\"09759955376\";s:12:\"booking_from\";s:16:\"2023-03-13T12:26\";s:10:\"booking_to\";s:16:\"2023-03-15T12:26\";s:11:\"add_booking\";s:10:\"__book_now\";s:7:\"club_id\";s:2:\"52\";}', '0.00', 52, 1678604296);

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `slider_id` int NOT NULL,
  `first_line` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `second_line` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `third_line` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_left` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `btn_right` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `slider_img` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`slider_id`, `first_line`, `second_line`, `third_line`, `btn_left`, `btn_right`, `slider_img`) VALUES
(1, 'Pomegranate', 'Fruits 100% Organic', 'A blend of freshly squeezed green apple & fruits', 'Shop now', 'View lookbook', 'green-slide-01.jpg'),
(2, 'Pomegranate', 'Orange 100% Organic', 'A blend of freshly squeezed green apple & fruits', 'Shop now', 'View lookbook', 'green-slide-02.jpg'),
(3, 'Pomegranate', 'Banana 100% Organic', 'A blend of freshly squeezed green apple & fruits', 'Shop now', 'View lookbook', 'green-slide-01.jpg'),
(4, 'Pomegranate', 'Apple 100% Organic', 'A blend of freshly squeezed green apple & fruits', 'Shop now', 'View lookbook', 'green-slide-02.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sponsors`
--

CREATE TABLE `sponsors` (
  `sponsor_id` int NOT NULL,
  `sponsor_type` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `degree_of_care` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `care_value` int NOT NULL,
  `tournament_id` int NOT NULL,
  `club_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsors`
--

INSERT INTO `sponsors` (`sponsor_id`, `sponsor_type`, `degree_of_care`, `care_value`, `tournament_id`, `club_id`) VALUES
(9, 'B', 'B', 345, 10, 5),
(10, 'A', 'A', 1, 14, 0),
(11, 'A', 'A', 33, 22, 52),
(13, 'A', 'A', 3, 0, 0),
(14, 'A', 'A', 3, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `sponsor_description`
--

CREATE TABLE `sponsor_description` (
  `sponsor_id` int NOT NULL,
  `sponsor_name` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `sponsor_about` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(3) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sponsor_description`
--

INSERT INTO `sponsor_description` (`sponsor_id`, `sponsor_name`, `sponsor_about`, `lang_code`) VALUES
(1, 'sponsor1', 'wvfjhbfhjvgcvcgvsg', 'en'),
(2, 'sponsor1', 'wvfjhbfhjvgcvcgvsg', 'en'),
(4, 's1', 'vdvd', 'ar'),
(4, 's1', 'vdvd', 'en'),
(5, 's2', 'fed', 'ar'),
(5, 's2', 'fed', 'en'),
(6, 'sponser1', 'sdfd', 'ar'),
(6, 'sponser1', 'sdfd', 'en'),
(7, 'sponser2', 'dhvhgz', 'ar'),
(7, 'sponser2', 'dhvhgz', 'en'),
(9, 'sponser2', 'gfdtrgdg', 'ar'),
(9, 'sponser2', 'gfdtrgdg', 'en'),
(10, 'ss', 'rr', 'ar'),
(10, 'ss', 'rr', 'en'),
(11, 'test', '22dddd', 'ar'),
(11, '33', '22dddd', 'en'),
(13, 'rr', 'eee', 'ar'),
(13, 'rr', 'eee', 'en'),
(14, 'rrhh', 'eee', 'ar'),
(14, 'gggddrre', 'eee', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int NOT NULL,
  `validity_months` int NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `validity_months`, `price`, `status`, `timestamp`) VALUES
(1, 2, '345.45', 'A', 1671370846),
(4, 2, '233.00', 'A', 1674988327),
(5, 2, '49.00', 'A', 1676477087);

-- --------------------------------------------------------

--
-- Table structure for table `subscription_descriptions`
--

CREATE TABLE `subscription_descriptions` (
  `subscription_id` int NOT NULL,
  `subscription` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` text COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `subscription_descriptions`
--

INSERT INTO `subscription_descriptions` (`subscription_id`, `subscription`, `description`, `lang_code`) VALUES
(1, 'Gold', 'yrtyftf', 'ar'),
(1, 'Golded', 'Design, photograph, download and publish products The club has 21 - 40 products.\r\nIn the event of content modification and image change 35 dirhams for each amendment', 'en'),
(4, 'Silver', 'hfy', 'ar'),
(4, 'Silver', 'Design, photograph, download and publish products The club has 21 - 40 products.\r\nIn the event of content modification and image change 35 dirhams for each amendment', 'en'),
(5, 'Goldedtttt', 'ggg', 'ar'),
(5, 'Golded Endee', 'Design, photograph, download and publish products The club has 20 products.\r\nIn the event of content modification and image change 50 dirhams for each amendment', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `suppliers`
--

CREATE TABLE `suppliers` (
  `supplier_id` int NOT NULL,
  `name` varchar(155) COLLATE utf8mb4_general_ci NOT NULL,
  `address` text COLLATE utf8mb4_general_ci NOT NULL,
  `product_or_services` text COLLATE utf8mb4_general_ci NOT NULL,
  `club_id` int NOT NULL,
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `suppliers`
--

INSERT INTO `suppliers` (`supplier_id`, `name`, `address`, `product_or_services`, `club_id`, `timestamp`) VALUES
(1, 'test supplier', 'tesd address', 'srfffffsssssss', 52, 1678607764),
(2, 'test more', 'adddd', 'srfffff', 52, 1678608393);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments`
--

CREATE TABLE `tournaments` (
  `t_id` int NOT NULL,
  `type` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `tournament_start_date` int NOT NULL,
  `reg_start_date` int NOT NULL,
  `reg_end_date` int NOT NULL,
  `status` char(1) COLLATE utf8mb4_general_ci NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `is_sponser` char(1) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N',
  `club_id` int NOT NULL DEFAULT '0',
  `free_entry` char(1) COLLATE utf8mb4_general_ci NOT NULL DEFAULT 'N',
  `timestamp` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournaments`
--

INSERT INTO `tournaments` (`t_id`, `type`, `tournament_start_date`, `reg_start_date`, `reg_end_date`, `status`, `fee`, `is_sponser`, `club_id`, `free_entry`, `timestamp`) VALUES
(3, 'W', 0, 1676140320, 1676140320, 'A', '101.00', 'Y', 0, 'N', 0),
(4, 'K', 0, 1676221500, 1676221500, 'A', '123.00', 'Y', 0, 'N', 0),
(5, 'K', 0, 1676235960, 1676235960, 'A', '3.00', 'Y', 0, 'N', 0),
(6, 'K', 0, 1676235960, 1676235960, 'A', '3.00', 'Y', 0, 'N', 0),
(7, 'K', 0, 1676235960, 1676235960, 'A', '3.00', 'Y', 0, 'N', 0),
(8, 'K', 0, 1676235960, 1676235960, 'A', '3.00', 'Y', 0, 'N', 0),
(9, 'L', 0, 1676200860, 1676200860, 'A', '11111.00', 'Y', 0, 'N', 0),
(10, 'K', 0, 1676202960, 1676202960, 'A', '111.00', 'Y', 0, 'N', 0),
(11, 'L', 1676640780, 1676637180, 1676644380, 'A', '2.00', 'N', 0, 'N', 0),
(12, 'L', 1676731800, 1677329400, 1676735400, 'A', '0.24', 'N', 0, 'N', 0),
(13, 'L', 1676728260, 1676731860, 1675515120, 'A', '0.17', 'Y', 0, 'N', 0),
(15, 'L', 1676734200, 1676734200, 1676737800, 'A', '0.03', 'N', 52, 'N', 0),
(18, 'K', 1676728980, 1676739720, 1677348120, 'D', '8.06', 'N', 52, 'N', 0),
(19, 'L', 1676738520, 1676742120, 1677336120, 'A', '0.15', 'N', 52, 'N', 0),
(20, 'L', 1676738640, 1676817840, 1676742240, 'A', '0.07', 'N', 52, 'N', 0),
(21, 'L', 1676742300, 1676990760, 1676558760, 'A', '0.08', 'N', 52, 'N', 0),
(22, 'L', 1676746920, 1676746920, 1676746920, 'A', '0.15', 'Y', 52, 'N', 0),
(23, 'L', 1678550580, 1678550580, 1678557780, 'A', '0.00', 'N', 52, 'Y', 1678520000);

-- --------------------------------------------------------

--
-- Table structure for table `tournaments_descriptions`
--

CREATE TABLE `tournaments_descriptions` (
  `t_id` int NOT NULL,
  `tournament` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `description` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `history` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` varchar(11) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tournaments_descriptions`
--

INSERT INTO `tournaments_descriptions` (`t_id`, `tournament`, `description`, `history`, `lang_code`) VALUES
(1, 'sad', '', '', 'ar'),
(2, 'test1', 'jbckjscksb', 'dhdhjsvj', 'ar'),
(2, 'test1', 'jbckjscksb', 'dhdhjsvj', 'en'),
(3, 'test1', 'bdvkjdvbkd', 'bhjdsjdv', 'ar'),
(3, 'test2', 'ebfewhufwek', 'test1wbhhf', 'en'),
(4, 'sad', '', 'aedad', 'ar'),
(4, 'sad', '', 'aedad', 'en'),
(5, 'sad', '', '', 'ar'),
(5, 'sad', '', '', 'en'),
(6, 'sad', '', '', 'ar'),
(6, 'sad', '', '', 'en'),
(7, 'sad', '', '', 'ar'),
(7, 'sadhhh', 'sad', '', 'en'),
(8, 'sad', '', '', 'ar'),
(8, 'sad', '', '', 'en'),
(9, 'new1', '', '', 'ar'),
(9, 'new1', '', '', 'en'),
(10, 'test1', 'vjh', 'vgh', 'ar'),
(10, 'test1', 'vjh', 'vgh', 'en'),
(11, 'ttt', 'fffss', 'hf', 'ar'),
(11, 'ttt', 'fffss', 'hf', 'en'),
(12, 'sadhhh', 'ghh', 'ffgfgs', 'ar'),
(12, 'sadhhh', 'ghh', 'ffgfgs', 'en'),
(13, 'fff', 'hhh', 'ggg', 'ar'),
(13, 'fff', 'hhh', 'ggg', 'en'),
(15, 'ttt', 'd', 'd', 'ar'),
(15, 'ttt', 'd', 'd', 'en'),
(18, 'sadhhh', 'ee', 'ee', 'ar'),
(18, 'sadhhhhhhdd', 'sadhhhhhhdd', 'sadhhhhhhddsss', 'en'),
(19, 'sadhhh', 'b', 'ggg', 'ar'),
(19, 'sadhhh', 'b', 'ggg', 'en'),
(20, 'sadhhh', 'ss', 'ggg', 'ar'),
(20, 'sadhhh', 'ss', 'ggg', 'en'),
(21, 'sadhhh', 'ddd', 'dd', 'ar'),
(21, 'sadhhh', 'ddd', 'dd', 'en'),
(22, 'sadhhh', 'd', 'dd', 'ar'),
(22, 'sadhhh', 'd', 'dd', 'en'),
(23, 'test', 'sss', 'sss', 'ar'),
(23, 'test', 'test', 'test', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `translations`
--

CREATE TABLE `translations` (
  `translation_id` int NOT NULL,
  `language_variable` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `translation` longtext COLLATE utf8mb4_general_ci NOT NULL,
  `lang_code` char(2) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `translations`
--

INSERT INTO `translations` (`translation_id`, `language_variable`, `translation`, `lang_code`) VALUES
(6, 'dashboard', 'Dashboard', 'en'),
(7, 'add_translation', 'Add Translation', 'en'),
(8, 'games', 'Games', 'en'),
(9, 'languages', 'Languages', 'en'),
(10, 'add_language_translation', 'Add Language Translation', 'en'),
(11, 'manage_language_translations', 'Manage Language Translations', 'en'),
(12, 'orders', 'طلبات', 'ar'),
(13, 'orders', 'Orders', 'en'),
(14, 'members', 'أعضاء', 'ar'),
(15, 'tournaments', 'البطولات', 'ar'),
(16, 'clubs', 'النوادي', 'ar'),
(17, 'points', 'نقاط', 'ar'),
(18, 'members', 'Members', 'en'),
(19, 'tournaments', 'Tournaments', 'en'),
(20, 'clubs', 'Clubs', 'en'),
(21, 'points', 'Points', 'en'),
(22, 'categories', 'Categories', 'en'),
(23, 'products', 'Products', 'en'),
(24, 'subscriptions', 'Subscriptions', 'en'),
(25, 'special_offers', 'Special Offers', 'en'),
(26, 'jobs', 'Jobs', 'en'),
(27, 'users', 'Users', 'en'),
(28, 'reviews', 'Reviews', 'en'),
(29, 'customizations', 'Customizations', 'en'),
(30, 'report', 'Report', 'en'),
(31, 'add_game', 'Add Game', 'en'),
(32, 'manage_games', 'Manage Games', 'en'),
(33, 'add_club', 'Add Club', 'en'),
(34, 'manage_clubs', 'Manage Clubs', 'en'),
(35, 'add_category', 'Add Category', 'en'),
(36, 'manage_categories', 'Manage Categories', 'en'),
(37, 'add_product', 'Add Product', 'en'),
(38, 'manage_products', 'Manage Products', 'en'),
(39, 'all_tournaments', 'All Tournaments', 'en'),
(40, 'sponsors', 'Sponsors', 'en'),
(41, 'club_sponsors', 'Club Sponsors', 'en'),
(42, 'cllllb_sponsors', 'Cllllb Sponsors', 'en'),
(43, 'dashboard', 'لوحة القيادة', 'ar'),
(44, 'games', 'ألعاب', 'ar'),
(45, 'field_or_ground_names', 'Field/Ground Names', 'en'),
(46, 'club_games_or_activities', 'Club Games/Activities', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int NOT NULL,
  `user_name` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `user_firstname` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `user_lastname` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `user_email` varchar(60) COLLATE utf8mb4_general_ci NOT NULL,
  `user_password` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `user_mobile` int NOT NULL,
  `user_address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_name`, `user_firstname`, `user_lastname`, `user_email`, `user_password`, `user_mobile`, `user_address`, `created_at`, `modified_at`) VALUES
(1, 'saiful', ' saiful', ' islam', 'saifulislamsapon@gmail.com', '202cb962ac59075b964b07152d234b70', 1246798, 'SubarnaChar, Noakhali', '2021-08-21 13:38:23', '2021-08-21 13:38:23'),
(2, 'Yearul', ' Yerarul', ' islam', 'yearul@gmail.com', '202cb962ac59075b964b07152d234b70', 1246798, 'Maijdee, Noakhali', '2021-08-21 13:38:23', '2021-08-21 13:38:23'),
(3, 'Omar6627', ' Omar Bin', ' Faruk', 'omarbfaruk@gmail.com', 'ad126b79a449eb003915c3917c8a30e1', 1684734323, 'Feni', '2021-08-21 18:56:24', '2021-08-21 18:56:24'),
(4, 'Omar_6627', ' Omar Bin', ' Faruk', 'omarbinfaruk97@gmail.com', '8d5dcd9520e2712d648297f0f116c284', 1684734323, 'Dhaka', '2021-08-30 11:04:09', '2021-08-30 11:04:09'),
(5, 'karim', ' karim', ' ', 'karim@gmail.com', '202cb962ac59075b964b07152d234b70', 1840239402, 'Jatrabari, Dhaka', '2021-09-14 05:03:25', '2021-09-14 05:03:25'),
(6, 'rahim', ' Rahim', ' ', 'rahim@gmail.com', '202cb962ac59075b964b07152d234b70', 1840239415, 'Mirpur, Dhaka. ', '2021-09-14 07:05:48', '2021-09-14 07:05:48');

-- --------------------------------------------------------

--
-- Table structure for table `user_address`
--

CREATE TABLE `user_address` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `user_address` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `postal_code` varchar(8) COLLATE utf8mb4_general_ci NOT NULL,
  `city` varchar(25) COLLATE utf8mb4_general_ci NOT NULL,
  `country` varchar(25) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user_payment`
--

CREATE TABLE `user_payment` (
  `id` int NOT NULL,
  `user_id` int NOT NULL,
  `payment_type` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `provider` varchar(35) COLLATE utf8mb4_general_ci NOT NULL,
  `account_no` int DEFAULT NULL,
  `expiry` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `add_logo`
--
ALTER TABLE `add_logo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_info`
--
ALTER TABLE `admin_info`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`booking_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_descriptions`
--
ALTER TABLE `category_descriptions`
  ADD UNIQUE KEY `category_id` (`category_id`,`lang_code`);

--
-- Indexes for table `clubs`
--
ALTER TABLE `clubs`
  ADD PRIMARY KEY (`club_id`);

--
-- Indexes for table `club_descriptions`
--
ALTER TABLE `club_descriptions`
  ADD UNIQUE KEY `club_id` (`club_id`,`lang_code`);

--
-- Indexes for table `cupon`
--
ALTER TABLE `cupon`
  ADD PRIMARY KEY (`cupon_id`);

--
-- Indexes for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `expenses`
--
ALTER TABLE `expenses`
  ADD PRIMARY KEY (`expense_id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`game_id`);

--
-- Indexes for table `game_descriptions`
--
ALTER TABLE `game_descriptions`
  ADD UNIQUE KEY `game_id` (`game_id`,`lang_code`);

--
-- Indexes for table `game_grounds`
--
ALTER TABLE `game_grounds`
  ADD PRIMARY KEY (`ground_id`);

--
-- Indexes for table `game_ground_descriptions`
--
ALTER TABLE `game_ground_descriptions`
  ADD UNIQUE KEY `ground_id` (`ground_id`,`lang_code`);

--
-- Indexes for table `game_memberships`
--
ALTER TABLE `game_memberships`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `game_membership_descriptions`
--
ALTER TABLE `game_membership_descriptions`
  ADD UNIQUE KEY `membership_id` (`membership_id`,`lang_code`);

--
-- Indexes for table `game_pitches`
--
ALTER TABLE `game_pitches`
  ADD PRIMARY KEY (`pitch_id`);

--
-- Indexes for table `game_pitch_descriptions`
--
ALTER TABLE `game_pitch_descriptions`
  ADD UNIQUE KEY `pitch_id` (`pitch_id`,`lang_code`);

--
-- Indexes for table `game_tables`
--
ALTER TABLE `game_tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `game_table_descriptions`
--
ALTER TABLE `game_table_descriptions`
  ADD UNIQUE KEY `table_id` (`table_id`,`lang_code`);

--
-- Indexes for table `header_info`
--
ALTER TABLE `header_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`job_id`);

--
-- Indexes for table `job_applicants`
--
ALTER TABLE `job_applicants`
  ADD PRIMARY KEY (`applicant_id`);

--
-- Indexes for table `job_descriptions`
--
ALTER TABLE `job_descriptions`
  ADD UNIQUE KEY `job_id` (`job_id`,`lang_code`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`notification_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `product_descriptions`
--
ALTER TABLE `product_descriptions`
  ADD UNIQUE KEY `product_id` (`product_id`,`lang_code`);

--
-- Indexes for table `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`slider_id`);

--
-- Indexes for table `sponsors`
--
ALTER TABLE `sponsors`
  ADD PRIMARY KEY (`sponsor_id`);

--
-- Indexes for table `sponsor_description`
--
ALTER TABLE `sponsor_description`
  ADD PRIMARY KEY (`sponsor_id`,`lang_code`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`);

--
-- Indexes for table `subscription_descriptions`
--
ALTER TABLE `subscription_descriptions`
  ADD UNIQUE KEY `subscription_id` (`subscription_id`,`lang_code`);

--
-- Indexes for table `suppliers`
--
ALTER TABLE `suppliers`
  ADD PRIMARY KEY (`supplier_id`);

--
-- Indexes for table `tournaments`
--
ALTER TABLE `tournaments`
  ADD PRIMARY KEY (`t_id`);

--
-- Indexes for table `tournaments_descriptions`
--
ALTER TABLE `tournaments_descriptions`
  ADD UNIQUE KEY `t_id` (`t_id`,`lang_code`);

--
-- Indexes for table `translations`
--
ALTER TABLE `translations`
  ADD PRIMARY KEY (`translation_id`),
  ADD UNIQUE KEY `language_variable` (`language_variable`,`lang_code`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_name` (`user_name`),
  ADD UNIQUE KEY `user_email` (`user_email`);

--
-- Indexes for table `user_address`
--
ALTER TABLE `user_address`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_payment`
--
ALTER TABLE `user_payment`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `add_logo`
--
ALTER TABLE `add_logo`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `admin_info`
--
ALTER TABLE `admin_info`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `booking_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `clubs`
--
ALTER TABLE `clubs`
  MODIFY `club_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=81;

--
-- AUTO_INCREMENT for table `cupon`
--
ALTER TABLE `cupon`
  MODIFY `cupon_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `customer_feedback`
--
ALTER TABLE `customer_feedback`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `expenses`
--
ALTER TABLE `expenses`
  MODIFY `expense_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `game_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `game_grounds`
--
ALTER TABLE `game_grounds`
  MODIFY `ground_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `game_memberships`
--
ALTER TABLE `game_memberships`
  MODIFY `membership_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `game_pitches`
--
ALTER TABLE `game_pitches`
  MODIFY `pitch_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `game_tables`
--
ALTER TABLE `game_tables`
  MODIFY `table_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `header_info`
--
ALTER TABLE `header_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `job_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `job_applicants`
--
ALTER TABLE `job_applicants`
  MODIFY `applicant_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `notification_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `sales`
--
ALTER TABLE `sales`
  MODIFY `sale_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `slider_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sponsors`
--
ALTER TABLE `sponsors`
  MODIFY `sponsor_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `suppliers`
--
ALTER TABLE `suppliers`
  MODIFY `supplier_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tournaments`
--
ALTER TABLE `tournaments`
  MODIFY `t_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `translations`
--
ALTER TABLE `translations`
  MODIFY `translation_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user_address`
--
ALTER TABLE `user_address`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user_payment`
--
ALTER TABLE `user_payment`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
