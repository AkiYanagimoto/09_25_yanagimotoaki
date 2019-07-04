-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 04, 2019 at 10:01 AM
-- Server version: 5.7.25
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gsf_d03_db25`
--

-- --------------------------------------------------------

--
-- Table structure for table `php02_table`
--

CREATE TABLE `php02_table` (
  `id` int(12) NOT NULL,
  `category` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `hashtag` text COLLATE utf8_unicode_ci NOT NULL,
  `rating` text COLLATE utf8_unicode_ci NOT NULL,
  `ocrtext` text COLLATE utf8_unicode_ci,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `php02_table`
--

INSERT INTO `php02_table` (`id`, `category`, `hashtag`, `rating`, `ocrtext`, `indate`) VALUES
(18, 'uuu', 'hhh', '2', 'lll', '2019-06-18 16:06:03'),
(19, 'uuu', 'iii', '4', 'llll', '2019-06-20 00:04:52'),
(20, 'iii', 'iii', '4', '                    ggg                ', '2019-06-20 00:12:02'),
(21, 'yyy', 'kkkk', '1', '            NO1 77%\r\nLTE+\r\n午後3:03\r\n「国立銀行」\r\n設立の日\r\n明治期を代表する実業家ですが、\r\n実は商人で\r\nはなく農民(名主)出身です。\r\n(ただ、幕末には名主も商業に携わるケース\r\nが多かったのですが)\r\n江戸時代末期に幕臣となりましたが、明治政\r\n府のもとで大蔵大輔\r\n·井上馨の下で財政政策\r\nを行いました。\r\n身分や敵味方を超えて重用されたあたり、\r\n極\r\nめて優秀な人物であったことが伺えます。\r\nO\r\n退官後は実業家に転じ、\r\n第一国立銀行や理化\r\n学研究所、東京証券取引所といった多種多様\r\nな企業の設立·経営に関わりました。\r\nその功績から「日本資本主義の父」とも言\r\nわれ、2024年の新紙幣(1万円札)の肖像と\r\nなることも決まっています。\r\nO\r\n        ', '2019-06-20 11:17:04');

-- --------------------------------------------------------

--
-- Table structure for table `php03_table`
--

CREATE TABLE `php03_table` (
  `id` int(12) NOT NULL,
  `task` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `deadline` date NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `indate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `php03_table`
--

INSERT INTO `php03_table` (`id`, `task`, `deadline`, `comment`, `indate`) VALUES
(2, 'aa', '2019-06-15', 'aaa', '2019-06-15 14:54:59'),
(3, 'yyy', '2019-06-16', 'uuu', '2019-06-15 15:47:09');

-- --------------------------------------------------------

--
-- Table structure for table `php03_user_table`
--

CREATE TABLE `php03_user_table` (
  `id` int(12) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `lid` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `lpw` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `kanri_flg` int(1) NOT NULL DEFAULT '0',
  `life_flg` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `php03_user_table`
--

INSERT INTO `php03_user_table` (`id`, `name`, `lid`, `lpw`, `kanri_flg`, `life_flg`) VALUES
(3, 'kkk', '333', '888', 0, 0),
(5, 'aaa', 'aaa', 'bbb', 0, 0),
(6, 'Aki', 'Aki', '0000', 1, 0),
(7, 'yanagimoto', 'yanagimoto', '1111', 0, 0),
(8, 'Natsu', 'Natsu', '2222', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `php02_table`
--
ALTER TABLE `php02_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php03_table`
--
ALTER TABLE `php03_table`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `php03_user_table`
--
ALTER TABLE `php03_user_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `php02_table`
--
ALTER TABLE `php02_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `php03_table`
--
ALTER TABLE `php03_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `php03_user_table`
--
ALTER TABLE `php03_user_table`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
