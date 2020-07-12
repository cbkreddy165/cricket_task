-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 12, 2020 at 07:16 AM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.4.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cricket_task`
--

-- --------------------------------------------------------

--
-- Table structure for table `matches`
--

CREATE TABLE `matches` (
  `id` int(11) NOT NULL,
  `match_between` varchar(255) NOT NULL,
  `match_start_date` datetime DEFAULT NULL,
  `winner_team` int(4) NOT NULL,
  `lost_team` int(4) NOT NULL,
  `status` int(4) NOT NULL COMMENT '1-active,0-in-active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `matches`
--

INSERT INTO `matches` (`id`, `match_between`, `match_start_date`, `winner_team`, `lost_team`, `status`, `created_at`, `updated_at`) VALUES
(1, '1-3', '2020-07-15 10:46:41', 1, 3, 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(2, '2-4', '2020-07-17 10:46:48', 2, 4, 1, '2020-07-14 10:23:17', '0000-00-00 00:00:00'),
(3, '2-6', '2020-07-20 10:47:10', 2, 6, 1, '0000-00-00 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `players`
--

CREATE TABLE `players` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `imageUri` varchar(255) NOT NULL,
  `jersey_number` int(4) NOT NULL,
  `country` varchar(255) NOT NULL,
  `player_history` text NOT NULL,
  `status` int(4) NOT NULL COMMENT '1-active,0-in-active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `players`
--

INSERT INTO `players` (`id`, `team_id`, `firstName`, `lastName`, `imageUri`, `jersey_number`, `country`, `player_history`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 'Sachin', 'Tendulkar', 'sachin.jpg', 99, 'India', 'a:5:{s:7:\"matches\";i:50;s:4:\"runs\";i:2000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:183;}', 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(2, 2, 'Rohit', 'Sharma', 'rohit.jpg', 10, 'India', 'a:5:{s:7:\"matches\";i:20;s:4:\"runs\";i:1000;s:8:\"hundreds\";i:3;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:153;}', 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(3, 2, 'JASPRIT', 'BUMRAH', 'bumrah.jpg', 12, 'India', 'a:5:{s:7:\"matches\";i:30;s:4:\"runs\";i:3000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:7;s:14:\"highest_scores\";i:123;}', 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(4, 2, 'KIERON', 'POLLARD\r\n', 'pollard.jpg', 44, 'WestIndies', 'a:5:{s:7:\"matches\";i:20;s:4:\"runs\";i:1000;s:8:\"hundreds\";i:3;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:153;}', 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(5, 1, 'Mahendra Singh', 'Dhoni', 'dhoni.png', 7, 'India', 'a:5:{s:7:\"matches\";i:50;s:4:\"runs\";i:2000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:183;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(6, 1, 'Suresh', 'Raina', 'raina.png', 7, 'India', 'a:5:{s:7:\"matches\";i:20;s:4:\"runs\";i:1000;s:8:\"hundreds\";i:3;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:153;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(7, 1, 'Dwayne', 'Bravo', 'bravo.png', 27, 'West Indies', 'a:5:{s:7:\"matches\";i:30;s:4:\"runs\";i:3000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:7;s:14:\"highest_scores\";i:123;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(8, 1, 'Ravindra', 'Jadeja', 'jadeja.png', 17, 'India', 'a:5:{s:7:\"matches\";i:20;s:4:\"runs\";i:1000;s:8:\"hundreds\";i:3;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:153;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(9, 3, 'David', 'Warner', 'warnar.png', 7, 'Australia', 'a:5:{s:7:\"matches\";i:30;s:4:\"runs\";i:3000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:7;s:14:\"highest_scores\";i:123;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(10, 3, 'Sandeep', 'Sharma', 'sandeep.png', 27, 'India', 'a:5:{s:7:\"matches\";i:50;s:4:\"runs\";i:2000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:183;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(11, 4, 'Jason', 'Roy', 'roy.png', 77, 'England', 'a:5:{s:7:\"matches\";i:20;s:4:\"runs\";i:1000;s:8:\"hundreds\";i:3;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:153;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(12, 4, 'Shikhar', 'Dhawan', 'dhawan.png', 47, 'India', 'a:5:{s:7:\"matches\";i:30;s:4:\"runs\";i:3000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:7;s:14:\"highest_scores\";i:123;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(13, 6, 'Eoin', 'Morgan', 'morgan.png', 77, 'England', 'a:5:{s:7:\"matches\";i:50;s:4:\"runs\";i:2000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:183;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(14, 6, 'Andre', 'Russell', 'russell.png', 36, 'West Indies', 'a:5:{s:7:\"matches\";i:20;s:4:\"runs\";i:1000;s:8:\"hundreds\";i:3;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:153;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(15, 5, 'David', 'Miller', 'Millar.png', 77, 'South Africa', 'a:5:{s:7:\"matches\";i:50;s:4:\"runs\";i:2000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:5;s:14:\"highest_scores\";i:183;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35'),
(16, 5, 'Robin', 'Uthappa', 'robin.png', 36, 'India', 'a:5:{s:7:\"matches\";i:30;s:4:\"runs\";i:3000;s:8:\"hundreds\";i:5;s:7:\"fifties\";i:7;s:14:\"highest_scores\";i:123;}', 1, '2020-07-11 08:54:35', '2020-07-11 08:55:35');

-- --------------------------------------------------------

--
-- Table structure for table `points`
--

CREATE TABLE `points` (
  `id` int(11) NOT NULL,
  `team_id` int(4) NOT NULL,
  `match_id` varchar(255) NOT NULL,
  `points` int(4) NOT NULL,
  `status` int(4) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `points`
--

INSERT INTO `points` (`id`, `team_id`, `match_id`, `points`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, '2', 2, 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(2, 2, '3', 2, 1, '2020-07-10 15:35:20', '2020-07-11 08:55:35'),
(3, 1, '1', 2, 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `logoUri` varchar(255) NOT NULL,
  `club_state` int(4) NOT NULL,
  `status` int(4) NOT NULL COMMENT '1-active,0-in-active',
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `logoUri`, `club_state`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Chennai Super Kings', 'chennai.png', 1, 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(2, 'Mumbai Indians', 'mumbai.jpg', 1, 1, '2020-07-10 15:32:20', '2020-07-10 15:32:42'),
(3, 'Hyderabad Sun Risers', 'hyd2.jpg', 1, 1, '2020-07-10 15:32:20', '2020-07-10 15:32:42'),
(4, 'Delhi Capitals', 'delhi.jpg', 1, 1, '2020-07-10 15:32:20', '2020-07-10 15:32:42'),
(5, 'Rajasthan Royals', 'rajasthan.png', 1, 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42'),
(6, 'Kolkata Night Riders', 'kolkata.jpg', 1, 1, '2020-07-10 15:35:20', '2020-07-10 15:35:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `matches`
--
ALTER TABLE `matches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `players`
--
ALTER TABLE `players`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `points`
--
ALTER TABLE `points`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `matches`
--
ALTER TABLE `matches`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `players`
--
ALTER TABLE `players`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `points`
--
ALTER TABLE `points`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
