-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 17, 2024 at 10:34 AM
-- Server version: 5.7.24
-- PHP Version: 8.1.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pharm`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` char(55) NOT NULL,
  `email` char(55) NOT NULL,
  `wilaya` int(2) NOT NULL,
  `conferm` char(6) NOT NULL DEFAULT 'admin',
  `password` char(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `email`, `wilaya`, `conferm`, `password`) VALUES
(1, 'wafaa', 'wafaa@gmail.com', 35, 'admin', 'wafaawafaa');

-- --------------------------------------------------------

--
-- Table structure for table `agent_dsp`
--

CREATE TABLE `agent_dsp` (
  `id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `email` char(55) NOT NULL,
  `phone` int(11) NOT NULL,
  `password` int(11) NOT NULL,
  `conferm` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `contacte`
--

CREATE TABLE `contacte` (
  `pharm` int(11) NOT NULL,
  `patient` int(11) NOT NULL,
  `id_rest` int(11) NOT NULL,
  `id_send` int(11) NOT NULL,
  `msg` varchar(1000) NOT NULL,
  `time` datetime(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contacte`
--

INSERT INTO `contacte` (`pharm`, `patient`, `id_rest`, `id_send`, `msg`, `time`) VALUES
(12, 5, 12, 5, 'kjhjhkhkjh', '2024-06-14 23:51:16.000000'),
(12, 2, 12, 2, 'gdfgdfd', '2024-06-22 23:51:16.000000'),
(5, 11, 5, 11, 'kjhkjhkjh', '2024-06-14 00:10:20.000000'),
(12, 1, 12, 1, 'ayoub', '2024-06-12 10:29:00.000000'),
(1, 5, 1, 5, 'dfsdfsdf', '2024-06-12 10:37:00.000000'),
(5, 1, 5, 1, 'success', '2024-06-12 10:39:00.000000'),
(2, 5, 2, 5, 'hello', '2024-06-12 11:01:00.000000'),
(2, 5, 2, 5, 'hello', '2024-06-12 11:19:00.000000'),
(5, 2, 5, 2, 'what', '2024-06-12 11:19:00.000000'),
(7, 1, 7, 1, 'slt', '2024-06-13 07:28:00.000000'),
(12, 1, 12, 1, 'wafaa', '2024-06-15 09:36:00.000000'),
(12, 1, 12, 1, 'wafaa', '2024-06-15 09:38:00.000000'),
(12, 1, 12, 1, 'wafaa', '2024-06-15 09:39:00.000000'),
(12, 1, 12, 1, 'wafaa', '2024-06-15 09:39:00.000000'),
(5, 1, 5, 1, 'kjhkjhkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2024-06-17 10:21:00.000000'),
(5, 1, 5, 1, 'kjhkjhkjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjjj', '2024-06-17 10:22:00.000000'),
(5, 1, 5, 1, 'fsdfsddddddddddddddddd sdfsssssssssssssssssssss sdffffffffffffffffffff sdfffffffffffffffffffffff dfsssssssssssssssss', '2024-06-17 10:31:00.000000');

-- --------------------------------------------------------

--
-- Table structure for table `evenment`
--

CREATE TABLE `evenment` (
  `id` int(11) NOT NULL,
  `name_even` char(60) NOT NULL,
  `date` date NOT NULL,
  `articl` varchar(10000) NOT NULL,
  `name_file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `evenment`
--

INSERT INTO `evenment` (`id`, `name_even`, `date`, `articl`, `name_file`) VALUES
(2, '4 avril', '2024-06-04', 'articl', '273797479.cancer du sein.PNG'),
(3, '19 juin', '2024-06-17', 'articl', '348272984.anemie.PNG'),
(5, '19 juin', '2024-06-21', 'articl', '199576448.anemie.PNG'),
(6, '19 juin', '2024-06-22', 'articl', '599713149.anemie.PNG'),
(7, '19 juin', '2024-06-23', 'articl', '751734050.anemie.PNG'),
(8, 'pomon', '2024-06-24', 'articl', '951215446.poumon.PNG'),
(9, 'pomon', '2024-06-25', 'articl', '302576898.poumon.PNG'),
(10, 'pomon', '2024-06-30', 'articl', '352485413.poumon.PNG'),
(11, 'pomon', '2024-06-29', 'articl', '101436166.poumon.PNG'),
(13, '16', '2024-08-16', 'articl', '325997366.logo ihm.jpg'),
(14, '13', '2024-06-18', 'articl', '453422047.Capturephar.PNG');

-- --------------------------------------------------------

--
-- Table structure for table `medicament`
--

CREATE TABLE `medicament` (
  `id` int(11) NOT NULL,
  `id_pharm` int(11) NOT NULL,
  `name_med` char(50) NOT NULL,
  `prix` int(5) NOT NULL,
  `category` char(20) NOT NULL,
  `name_file` varchar(100) NOT NULL,
  `count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicament`
--

INSERT INTO `medicament` (`id`, `id_pharm`, `name_med`, `prix`, `category`, `name_file`, `count`) VALUES
(1, 10, 'sdfsdf', 100, 'fgdf', '214106577.25Z_2012.w003.n001.76B.p12.76.jpg', 0),
(7, 7, 'para', 500, 'rt', '873517700.25Z_2012.w003.n001.76B.p12.76.jpg', 500),
(16, 4, 'para', 500, 'rt', '810093772.25Z_2012.w003.n001.76B.p12.76.jpg', 500),
(18, 5, 'paracitamol', 50, 'upd', '140507159.570283058.add.png', 601),
(19, 5, 'rapidus', 400, 'rp', '401451497.cap 1.PNG', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id_rest` char(11) NOT NULL,
  `id_send` char(11) NOT NULL,
  `message` varchar(300) NOT NULL,
  `time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id_rest`, `id_send`, `message`, `time`) VALUES
('4', 'admin', 'fgdfgdfgfdgd', '2024-06-05 18:31:06'),
('admin', '4', 'fsdfdfdfdsfsdf', '2024-06-05 18:31:06'),
('admin', '4', 'rgdfgdfgfdgfdgdfg', '2024-06-05 18:31:48'),
('admin', '5', 'dfgdgfdgdfgdf', '2024-06-05 18:42:59'),
('admin', '4', 'dsqdqsdqsdqsd', '2024-06-05 07:05:00'),
('5', '2', 'lkllkmlkmlk', '2024-06-06 08:06:11'),
('admin', '4', 'test', '2024-06-06 08:15:00'),
('agent', '5', 'agent', '2024-06-06 08:17:00'),
('admin', '4', 'test', '2024-06-06 08:45:00'),
('admin', '', 'test', '2024-06-06 08:45:00'),
('4', 'admin', 'dvsdvdsvdv', '2024-06-07 13:54:44'),
('4', 'agent', 'sdsdfsfs', '2024-06-07 13:54:44'),
('admin', '2', 'dsdsqdsdqs', '2024-06-07 13:54:44'),
('4', '4', 'hello', '2024-06-07 04:00:00'),
('5', '4', 'hi', '2024-06-07 08:43:00'),
('4', '4', 'hi', '2024-06-07 08:46:00'),
('4', '4', 'gdfgfgfd', '2024-06-07 08:57:00'),
('5', '4', 'fdfdfddf', '2024-06-07 08:57:00'),
('5', '4', 'fdfdfddf', '2024-06-07 08:58:00'),
('5', '4', 'jhgjhgh', '2024-06-07 08:58:00'),
('5', '4', 'jhgjhgh', '2024-06-07 09:00:00'),
('agent', '5', 'hello', '2024-06-07 09:02:00'),
('5', 'agent', 'hi', '2024-06-07 09:04:00'),
('agent', '5', 'hi', '2024-06-07 09:04:00'),
('5', 'agent', 'hi', '2024-06-07 09:05:00'),
('agent', '5', 'hi', '2024-06-07 09:05:00'),
('5', 'agent', 'hi', '2024-06-07 09:06:00'),
('agent', '6', 'hello im ishak', '2024-06-07 09:07:00'),
('5', 'agent', 'hi', '2024-06-07 09:07:00'),
('6', 'agent', 'fsfds', '2024-06-07 10:33:00'),
('6', 'agent', 'test', '2024-06-07 10:38:00'),
('6', 'agent', 'test', '2024-06-07 10:39:00'),
('1', 'agent', 'hello', '2024-06-07 10:50:00'),
('7', 'agent', 'inch', '2024-06-07 10:53:00'),
('agent', '6', 'rest', '2024-06-08 11:15:00'),
('admin', '4', 'uio', '2024-06-11 11:28:00'),
('4', 'admin', 'yes', '2024-06-11 11:29:00'),
('', 'admin', 'fdsfsdfsdfsdf', '2024-06-12 01:11:00'),
('', 'admin', 'fdsfsdfsdfsdf', '2024-06-12 01:12:00'),
('', 'admin', 'fdsfsdfsdfsdf', '2024-06-12 01:13:00'),
('', 'admin', 'fdsfsdfsdfsdf', '2024-06-12 01:19:00'),
('4', 'admin', 'sdsdsd', '2024-06-12 01:49:00'),
('4', 'admin', 'sdsdsd', '2024-06-12 01:50:00'),
('idr', 'idr', 'text', '2024-06-05 18:31:06'),
('idr', 'idr', 'text', '2024-06-12 02:39:00'),
('idr', '5.admin', 'test test', '2024-06-12 02:40:00'),
('pharm 5', 'patient 5', 'yes', '2024-06-12 02:41:00'),
('agent', '5', 'kjhkjhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhhk', '2024-06-17 12:59:00'),
('agent', '5', 'efzerzerezrze vefsddfdf', '2024-06-17 10:29:00'),
('agent', '5', 'zzerzrrrrrrrrrrrrrrrrrrr fsdddddddddddddddd sdfdsfsdffffffssfdfssdsd', '2024-06-17 10:29:00'),
('agent', '5', 'qdsqdqsdsqdqsdqsdqsdqsdqsdsdqsdqsdqs', '2024-06-17 10:30:00'),
('agent', '5', 'qdsqdqsdsqdqsdqsdqsdqsdqsdsdqsdqsdqs', '2024-06-17 10:32:00');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `id` int(11) NOT NULL,
  `name` char(30) NOT NULL,
  `last_name` char(30) NOT NULL,
  `email` varchar(60) NOT NULL,
  `phone` int(11) NOT NULL,
  `wilaya` int(4) NOT NULL,
  `commun` char(30) NOT NULL,
  `pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`id`, `name`, `last_name`, `email`, `phone`, `wilaya`, `commun`, `pass`) VALUES
(1, 'hanan', 'hana', 'hana@gmail.com', 659641935, 35, 'bordj', 111111),
(2, 'rahma', 'rahma', 'rahma@gmail.com', 659874122, 12, 'tizi', 123654);

-- --------------------------------------------------------

--
-- Table structure for table `pharmacier`
--

CREATE TABLE `pharmacier` (
  `id` int(11) NOT NULL,
  `name` char(50) NOT NULL,
  `email` varchar(70) NOT NULL,
  `phone` int(10) NOT NULL,
  `location` varchar(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `wilaya` int(2) NOT NULL,
  `commun` varchar(25) NOT NULL,
  `gard` varchar(100) DEFAULT '[]',
  `conferm` tinyint(1) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pharmacier`
--

INSERT INTO `pharmacier` (`id`, `name`, `email`, `phone`, `location`, `password`, `wilaya`, `commun`, `gard`, `conferm`) VALUES
(4, ' صيدلية الوئام', 'ayoub@gmail.com', 659641935, '', '145236', 0, '', '[2,9,10,6,5]', 2),
(5, 'صيدلية الوفاء', 'asma@gmail.com', 659641935, 'sidi aissa', '147852', 28, 'sidi aissa', '[4,3,17]', 1),
(6, 'صيدلية السلام', 'ishak@gmail.com', 6596419, 'boumerdes', '147852', 35, '', '[15,25,28,31,29,1,12,14,27,26]', 1),
(7, 'ayoub', 'malek@gmail.com', 659641935, 'tizi ouzou', '145632', 15, 'tizi ouzou', '[19,20,21,14,13,6,7,24]', 1),
(9, 'ahma', 'rahma@gmail.com', 659641935, 'batna', '145632', 5, 'batna', '[1,2,3,5]', 1),
(10, 'awass', 'awass@gmail.com', 21546987, '28002', '123654', 16, 'sidi aissa', '[2,9,12,5,7]', 1),
(11, 'el fourkan', 'forkan@gmail.com', 123654789, '35', '123654789', 1, 'borj mnayl', '[5,12,13,18,17,23,24,15,31,30,25,8]', 1),
(12, 'wafaa', 'wafaa@gmail.com', 659641935, 'awass', 'wafaawafaa', 35, 'sidi aissa', '[]', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent_dsp`
--
ALTER TABLE `agent_dsp`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `evenment`
--
ALTER TABLE `evenment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medicament`
--
ALTER TABLE `medicament`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pharmacier`
--
ALTER TABLE `pharmacier`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent_dsp`
--
ALTER TABLE `agent_dsp`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `evenment`
--
ALTER TABLE `evenment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `medicament`
--
ALTER TABLE `medicament`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `patient`
--
ALTER TABLE `patient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pharmacier`
--
ALTER TABLE `pharmacier`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
