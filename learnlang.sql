-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 17, 2024 at 06:15 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `learnlang`
--

-- --------------------------------------------------------

--
-- Table structure for table `contents`
--

CREATE TABLE `contents` (
  `id` int(11) NOT NULL,
  `chapterNum` int(100) NOT NULL,
  `chapter` varchar(255) NOT NULL,
  `part` varchar(255) NOT NULL,
  `partNum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contents`
--

INSERT INTO `contents` (`id`, `chapterNum`, `chapter`, `part`, `partNum`) VALUES
(1, 1, 'Well wishes', 'Greeting', 1.1),
(2, 1, 'Well wishes', 'Introducting', 1.2),
(3, 1, 'Well wishes', 'Bidding', 1.3),
(4, 2, 'Polite expression', 'please', 2.1),
(5, 2, 'Polite expression', 'Thanks/Thank you', 2.2),
(6, 2, 'Polite expression', 'Sorry', 2.3);

-- --------------------------------------------------------

--
-- Table structure for table `short_dialog`
--

CREATE TABLE `short_dialog` (
  `id` int(11) NOT NULL,
  `bangla` varchar(500) NOT NULL,
  `english` varchar(500) NOT NULL,
  `hindi` varchar(500) NOT NULL,
  `chinese` varchar(500) NOT NULL,
  `japanese` varchar(500) NOT NULL,
  `dia_link` int(11) NOT NULL,
  `chapter` int(11) NOT NULL,
  `partNum` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `short_dialog`
--

INSERT INTO `short_dialog` (`id`, `bangla`, `english`, `hindi`, `chinese`, `japanese`, `dia_link`, `chapter`, `partNum`) VALUES
(1, '', 'Hi, Ramin! How’s everything?', '', '', 'こんにちは、ラミン！調子どうよ？', 2, 1, '1.1'),
(2, '', 'Quite well, thanks. How about you?', '', '', 'そうですね、ありがとう。あなたはどうですか？', 3, 1, '1.1'),
(3, '', 'Not too bad', '', '', '悪くない', 0, 1, '1.1'),
(4, '', 'May I introduce myself? My name\'s Sathy Zaman, How do you do?', '', '', '自己紹介をしてもいいですか？私の名前はサシー・ザマン、お元気ですか？', 5, 1, '1.2'),
(5, '', 'How do you do? I\'m Cathy Williams.', '', '', 'ごきげんよう？私はキャシー・ウィリアムズです。', 0, 1, '1.2');

-- --------------------------------------------------------

--
-- Table structure for table `user_details`
--

CREATE TABLE `user_details` (
  `id` int(11) NOT NULL,
  `mainLang` varchar(255) DEFAULT NULL,
  `learnLang` varchar(255) DEFAULT NULL,
  `user_profileId` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_details`
--

INSERT INTO `user_details` (`id`, `mainLang`, `learnLang`, `user_profileId`) VALUES
(1, 'english', 'japanese', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_profile`
--

CREATE TABLE `user_profile` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user_profile`
--

INSERT INTO `user_profile` (`id`, `name`, `email`, `password`) VALUES
(1, 'aa', 'aaaa@gmail.com', '$2y$10$eGYjuF7qwJG3qoJI6EdpbutkDtjzt8qiWgotMezX1Hu/7.C0rwgcS'),
(2, 'aa', 'aaaa@gmail.com', '$2y$10$abHtSLP6frmM4zzdPcc/cu0FLmkzDxcOsg5XPOGcoC2rPDr2bMxFq'),
(3, 'a', 'aaaa@gmail.com', '$2y$10$Ss2DSOFN538sVKAFfxSjq.GdAGMiCSXYm3xWndrpQzWa4q3jTACyC'),
(4, 'b', 'bbbb@gmail.com', '$2y$10$lg6jWCW64HsuVoei5CaZa.Ek1bQ9aVpq8vBShqbx31rMEGDoHDdiy');

-- --------------------------------------------------------

--
-- Table structure for table `word`
--

CREATE TABLE `word` (
  `id` int(255) NOT NULL,
  `bangla` varchar(500) NOT NULL,
  `english` varchar(500) NOT NULL,
  `hindi` varchar(500) NOT NULL,
  `chinese` varchar(500) NOT NULL,
  `japanese` varchar(500) NOT NULL,
  `chapter` int(11) NOT NULL,
  `partNum` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `word`
--

INSERT INTO `word` (`id`, `bangla`, `english`, `hindi`, `chinese`, `japanese`, `chapter`, `partNum`) VALUES
(1, 'সুপ্রভাত', 'Good Morning', '\r\nशुभ प्रभात', '早上好', 'おはよう', 1, 1.1),
(3, 'শুভ সন্ধ্যা', 'Good evening', 'शुभ संध्या', '晚上好', 'こんばんは', 1, 1.1),
(4, 'শুভ অপরাহ্ন', 'Good afternoon', 'शुभ दोपहर', '下午好', '\r\nこんにちは', 1, 1.1),
(5, 'অনুগ্রহ', 'Please', 'कृपया', '请', 'お願いします', 2, 2.1),
(6, '', 'Thanks', '', '', '', 2, 2.2),
(7, '', 'Thank you', '', '', '', 2, 2.2),
(8, '', 'Sorry', '', '', '', 2, 2.3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `short_dialog`
--
ALTER TABLE `short_dialog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_details`
--
ALTER TABLE `user_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_profileId` (`user_profileId`);

--
-- Indexes for table `user_profile`
--
ALTER TABLE `user_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `word`
--
ALTER TABLE `word`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `contents`
--
ALTER TABLE `contents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `short_dialog`
--
ALTER TABLE `short_dialog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_details`
--
ALTER TABLE `user_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `user_profile`
--
ALTER TABLE `user_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `word`
--
ALTER TABLE `word`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `user_details`
--
ALTER TABLE `user_details`
  ADD CONSTRAINT `user_details_ibfk_1` FOREIGN KEY (`user_profileId`) REFERENCES `user_profile` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
