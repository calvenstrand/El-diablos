-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: May 28, 2012 at 01:30 PM
-- Server version: 5.5.22
-- PHP Version: 5.3.10-1ubuntu3.1

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `diablofy`
--

-- --------------------------------------------------------

--
-- Table structure for table `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `albums`
--

INSERT INTO `albums` (`id`, `name`, `year`) VALUES
(1, 'Somewhere In Time', 1986),
(2, 'Powerslave', 1984),
(3, '...And Justice For All', 1988),
(4, 'City Of Evil', 2005),
(5, 'Nightmare', 2010),
(6, 'In Waves', 2011),
(7, 'One Day Remains', 2004),
(8, 'Back In Black', 1980);

-- --------------------------------------------------------

--
-- Table structure for table `albums_songs`
--

CREATE TABLE IF NOT EXISTS `albums_songs` (
  `albumid` int(10) unsigned NOT NULL,
  `songid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `albums_songs`
--

INSERT INTO `albums_songs` (`albumid`, `songid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(2, 9),
(2, 10),
(2, 11),
(2, 12),
(2, 13),
(2, 14),
(2, 15),
(2, 16),
(3, 17),
(3, 18),
(3, 19),
(3, 20),
(3, 21),
(3, 22),
(3, 23),
(3, 24),
(3, 25),
(4, 26),
(4, 27),
(4, 28),
(4, 29),
(4, 30),
(4, 31),
(4, 32),
(4, 33),
(4, 34),
(4, 35),
(4, 36),
(5, 37),
(5, 38),
(5, 39),
(5, 40),
(5, 41),
(5, 42),
(5, 43),
(5, 44),
(5, 45),
(5, 46),
(5, 47),
(6, 48),
(6, 49),
(6, 50),
(6, 51),
(6, 52),
(6, 53),
(6, 54),
(6, 55),
(6, 56),
(6, 57),
(6, 58),
(6, 59),
(6, 60),
(7, 61),
(7, 62),
(7, 63),
(7, 64),
(7, 65),
(7, 66),
(7, 67),
(7, 68),
(7, 69),
(7, 70),
(7, 71),
(8, 72),
(8, 73),
(8, 74),
(8, 75),
(8, 76),
(8, 77),
(8, 78),
(8, 79),
(8, 80),
(8, 81);

-- --------------------------------------------------------

--
-- Table structure for table `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `genreid` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `artists`
--

INSERT INTO `artists` (`id`, `name`, `genreid`) VALUES
(1, 'Iron Maiden', 3),
(2, 'Metallica', 2),
(3, 'Avenged Sevenfold', 1),
(4, 'Trivium', 2),
(5, 'Alter Bridge', 1),
(6, 'AC/DC', 3);

-- --------------------------------------------------------

--
-- Table structure for table `artists_albums`
--

CREATE TABLE IF NOT EXISTS `artists_albums` (
  `artistid` int(10) unsigned NOT NULL,
  `albumid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists_albums`
--

INSERT INTO `artists_albums` (`artistid`, `albumid`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(3, 5),
(4, 6),
(5, 7),
(6, 8);

-- --------------------------------------------------------

--
-- Table structure for table `artists_songs`
--

CREATE TABLE IF NOT EXISTS `artists_songs` (
  `artistid` int(10) unsigned NOT NULL,
  `songid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `artists_songs`
--

INSERT INTO `artists_songs` (`artistid`, `songid`) VALUES
(1, 1),
(1, 2),
(1, 3),
(1, 4),
(1, 5),
(1, 6),
(1, 7),
(1, 8),
(1, 9),
(1, 10),
(1, 11),
(1, 12),
(1, 13),
(1, 14),
(1, 15),
(1, 16),
(2, 17),
(2, 18),
(2, 19),
(2, 20),
(2, 21),
(2, 22),
(2, 23),
(2, 24),
(2, 25),
(3, 26),
(3, 27),
(3, 28),
(3, 29),
(3, 30),
(3, 31),
(3, 32),
(3, 33),
(3, 34),
(3, 35),
(3, 36),
(3, 37),
(3, 38),
(3, 39),
(3, 40),
(3, 41),
(3, 42),
(3, 43),
(3, 44),
(3, 45),
(3, 46),
(3, 47),
(4, 48),
(4, 49),
(4, 50),
(4, 51),
(4, 52),
(4, 53),
(4, 54),
(4, 55),
(4, 56),
(4, 57),
(4, 58),
(4, 59),
(4, 60),
(5, 61),
(5, 62),
(5, 63),
(5, 64),
(5, 65),
(5, 66),
(5, 67),
(5, 68),
(5, 69),
(5, 70),
(5, 71),
(6, 72),
(6, 73),
(6, 74),
(6, 75),
(6, 76),
(6, 77),
(6, 78),
(6, 79),
(6, 80),
(6, 81);

-- --------------------------------------------------------

--
-- Table structure for table `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `genres`
--

INSERT INTO `genres` (`id`, `name`) VALUES
(1, 'Metal'),
(2, 'Thrash Metal'),
(3, 'Heavy Metal');

-- --------------------------------------------------------

--
-- Table structure for table `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

-- --------------------------------------------------------

--
-- Table structure for table `playlists_songs`
--

CREATE TABLE IF NOT EXISTS `playlists_songs` (
  `playlistid` int(10) unsigned NOT NULL,
  `songid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `length` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=82 ;

--
-- Dumping data for table `songs`
--

INSERT INTO `songs` (`id`, `name`, `length`) VALUES
(1, 'Caught Somewhere In Time', '07:26'),
(2, 'Wasted Years', '05:08'),
(3, 'Sea Of Madness', '05:42'),
(4, 'Heaven Can Wait', '07:21'),
(5, 'The Loneliness Of The Long Distance Runner', '06:31'),
(6, 'Stranger In A Strange Land', '05:45'),
(7, 'Deja-Vu', '04:56'),
(8, 'Alexander The Great', '08:36'),
(9, 'Aces High', '04:29'),
(10, '2 Minutes To Midnight', '06:00'),
(11, 'Losfer Words (Big ''Orra)', '04:13'),
(12, 'Flash Of The Blade', '04:03'),
(13, 'The Duellists', '06:06'),
(14, 'Back In The Village', '05:21'),
(15, 'Powerslave', '06:48'),
(16, 'Rime Of The Ancient Mariner', '13:34'),
(17, 'Blackened', '06:42'),
(18, '...And Justice For All', '09:45'),
(19, 'Eye Of The Beholder', '06:25'),
(20, 'One', '07:24'),
(21, 'The Shortest Straw', '06:35'),
(22, 'Harvester Of Sorrow', '05:45'),
(23, 'The Frayed Ends Of Sanity', '07:43'),
(24, 'To Live Is To Die', '09:48'),
(25, 'Dyers Eve', '05:13'),
(26, 'Beast and the Harlot', '05:40'),
(27, 'Burn It Down', '04:58'),
(28, 'Blinded in Chains', '06:34'),
(29, 'Bat Country', '05:13'),
(30, 'Trashed And Scattered', '05:53'),
(31, 'Seize the Day', '05:32'),
(32, 'Sidewinder', '07:01'),
(33, 'The Wicked End', '07:10'),
(34, 'Strength of the World', '09:14'),
(35, 'Betrayed', '06:47'),
(36, 'M.I.A.', '08:46'),
(37, 'Nightmare', '05:30'),
(38, 'Welcome to the Family', '04:07'),
(39, 'Danger Line', '05:30'),
(40, 'Buried Alive', '06:43'),
(41, 'Natural Born Killer', '05:17'),
(42, 'So Far Away', '05:29'),
(43, 'God Hates Us', '05:21'),
(44, 'Victim', '07:31'),
(45, 'Tonight the World Dies', '04:43'),
(46, 'Fiction', '05:14'),
(47, 'Save Me', '10:56'),
(48, 'Capsizing The Sea', '01:30'),
(49, 'In Waves', '05:02'),
(50, 'Inception Of The End', '03:48'),
(51, 'Dusk Dismantled', '03:47'),
(52, 'Watch The World Burn', '04:53'),
(53, 'Black', '03:27'),
(54, 'A Skyline''s Severance', '04:52'),
(55, 'Built To Fall', '03:08'),
(56, 'Caustic Are The Ties That Bind', '05:34'),
(57, 'Forsake Not The Dream', '05:20'),
(58, 'Chaos Reigns', '04:07'),
(59, 'Of All These Yesterdays', '04:21'),
(60, 'Leaving This World Behind', '01:32'),
(61, 'Find The Real', '04:43'),
(62, 'One Day Remains', '04:05'),
(63, 'Open Your Eyes', '04:58'),
(64, 'Burn It Down', '06:11'),
(65, 'Metalingus', '04:19'),
(66, 'Broken Wings', '05:06'),
(67, 'In Loving Memory', '05:40'),
(68, 'Down To My Last', '04:46'),
(69, 'Watch Your Words', '05:25'),
(70, 'Shed My Skin', '05:08'),
(71, 'The End Is Here', '04:57'),
(72, 'Hells Bells', '05:10'),
(73, 'Shoot To Thrill', '05:17'),
(74, 'What Do You Do For Money Honey', '03:33'),
(75, 'Given The Dog A Bone', '03:30'),
(76, 'Let Me Put My Love Into You', '04:16'),
(77, 'Back In Black', '04:14'),
(78, 'You Shook Me All Night Long', '03:30'),
(79, 'Have A Drink On Me', '03:57'),
(80, 'Shake A Leg', '04:06'),
(81, 'Rock And Roll Ain''t Noise Pollution', '04:15');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

-- --------------------------------------------------------

--
-- Table structure for table `users_playlists`
--

CREATE TABLE IF NOT EXISTS `users_playlists` (
  `userid` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
