-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3307
-- Generation Time: Jul 01, 2020 at 08:30 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `movie`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `comment` text NOT NULL,
  `commented_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `movie_id`, `name`, `comment`, `commented_at`) VALUES
(1, 2, 'ren', 'this is <b>awesome</b>', '2020-06-30 14:39:08'),
(2, 4, 'tejas', 'great  action movie', '2020-06-30 14:39:50'),
(3, 2, 'test', 'wfefwefew', '2020-06-30 14:51:29');

-- --------------------------------------------------------

--
-- Table structure for table `movie`
--

CREATE TABLE `movie` (
  `id` int(11) NOT NULL,
  `movie_id` int(11) NOT NULL,
  `movie_name` varchar(100) NOT NULL,
  `genre` varchar(100) NOT NULL,
  `img` varchar(200) NOT NULL,
  `video` text NOT NULL,
  `video_origin` varchar(100) NOT NULL,
  `video_type` varchar(100) NOT NULL,
  `folder` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movie`
--

INSERT INTO `movie` (`id`, `movie_id`, `movie_name`, `genre`, `img`, `video`, `video_origin`, `video_type`, `folder`) VALUES
(1, 1, 'Mirzapur', 'Action', '15933446632020-06-28_Poster_of_Mirzapur_2018.jpg', 'MirzapurS01E01 (Jhandu).mkv,MirzapurS01E02 (Gooda).mkv,MirzapurS01E03 (Wafadar).mkv,Mirzapur S01E04 (Virginity).mkv,Mirzapur S01E05 (Barfi) (Lions of Mirzapur).mkv,JMIRZ_S01E06H3.mkv,Mirzapur S01E08 (Tandav).mkv', 'bollywood', 'web series', 'Mirzapur'),
(2, 2, 'Pursuit of Happyness', 'Adventure', '15933447792020-06-28_the-pursuit-of-happyness-full-movie-in-hindi.jpg', 'Pursuit of Happyness.mkv', 'hollywood', 'movie', 'Pursuit of Happyness'),
(3, 3, 'Escape Plan', 'Strategy', '15933447962020-06-28_Escapeplanfilmposter.jpg', 'Escape Plan.mkv', 'hollywood', 'movie', 'Escape Plan'),
(4, 4, '36th Chamber of Shaolin', 'Action', '15933448172020-06-28_The_36th_Chamber_of_Shaolin.jpg', '36th Chamber of Shaolin.mkv', 'hollywood', 'movie', '36th Chamber of Shaolin'),
(5, 5, 'Sacred Games', 'Thriller', '15934409372020-06-29_sacred_games.jpg', 'Sacred.Games.S01E01.480p.Film2Movie_US.mkv,Sacred.Games.S01E02.480p.Film2Movie_US.mkv,Sacred.Games.S01E03.480p.Film2Movie_US.mkv,Sacred.Games.S01E04.480p.Film2Movie_US.mkv,Sacred.Games.S01E05.480p.Film2Movie_US.mkv,Sacred.Games.S01E06.480p.Film2Movie_US.mkv,Sacred.Games.S01E07.480p.Film2Movie_US.mkv,Sacred.Games.S01E08.480p.Film2Movie_US.mkv,Sacred.Games.S02E01.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E02.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E03.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E04.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E05.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E06.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E07.Hindi.MoviesFlix.NeT.mkv,Sacred.Games.S02E08.Hindi.MoviesFlix.NeT.mkv', 'bollywood', 'web series', 'Sacred Games');

-- --------------------------------------------------------

--
-- Table structure for table `superadmin`
--

CREATE TABLE `superadmin` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `superadmin`
--

INSERT INTO `superadmin` (`id`, `name`, `username`, `password`) VALUES
(1, 'admin', 'admin', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `movie`
--
ALTER TABLE `movie`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `superadmin`
--
ALTER TABLE `superadmin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `movie`
--
ALTER TABLE `movie`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `superadmin`
--
ALTER TABLE `superadmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
