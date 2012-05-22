-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Värd: localhost
-- Skapad: 22 maj 2012 kl 14:25
-- Serverversion: 5.5.16
-- PHP-version: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Databas: `diablofy`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `albums`
--

CREATE TABLE IF NOT EXISTS `albums` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `year` int(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumpning av Data i tabell `albums`
--

INSERT INTO `albums` (`id`, `name`, `year`) VALUES
(1, 'Somewhere In Time', 1986),
(2, 'Powerslave', 1984),
(3, '...And Justice For All', 1988),
(4, 'City Of Evil', 2005),
(5, 'Nightmare', 2010);

-- --------------------------------------------------------

--
-- Tabellstruktur `albums_songs`
--

CREATE TABLE IF NOT EXISTS `albums_songs` (
  `albumid` int(10) unsigned NOT NULL,
  `songid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `albums_songs`
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
(5, 47);

-- --------------------------------------------------------

--
-- Tabellstruktur `artists`
--

CREATE TABLE IF NOT EXISTS `artists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=19 ;

--
-- Dumpning av Data i tabell `artists`
--

INSERT INTO `artists` (`id`, `name`) VALUES
(1, 'Iron Maiden'),
(2, 'Metallica'),
(3, 'Avenged Sevenfold');

-- --------------------------------------------------------

--
-- Tabellstruktur `artists_albums`
--

CREATE TABLE IF NOT EXISTS `artists_albums` (
  `artistid` int(10) unsigned NOT NULL,
  `albumid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `artists_albums`
--

INSERT INTO `artists_albums` (`artistid`, `albumid`) VALUES
(1, 1),
(1, 2),
(2, 3),
(3, 4),
(3, 5);

-- --------------------------------------------------------

--
-- Tabellstruktur `artists_songs`
--

CREATE TABLE IF NOT EXISTS `artists_songs` (
  `artistid` int(10) unsigned NOT NULL,
  `songid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `artists_songs`
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
(3, 47);

-- --------------------------------------------------------

--
-- Tabellstruktur `genres`
--

CREATE TABLE IF NOT EXISTS `genres` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `playlists`
--

CREATE TABLE IF NOT EXISTS `playlists` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `playlists_songs`
--

CREATE TABLE IF NOT EXISTS `playlists_songs` (
  `playlistid` int(10) unsigned NOT NULL,
  `songid` int(10) unsigned NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Tabellstruktur `songs`
--

CREATE TABLE IF NOT EXISTS `songs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `length` varchar(30) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=48 ;

--
-- Dumpning av Data i tabell `songs`
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
(47, 'Save Me', '10:56');

-- --------------------------------------------------------

--
-- Tabellstruktur `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `email` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Tabellstruktur `users_playlists`
--

CREATE TABLE IF NOT EXISTS `users_playlists` (
  `userid` int(11) NOT NULL,
  `playlistid` int(11) NOT NULL,
  `owner` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
