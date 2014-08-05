-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Aug 05, 2014 at 07:35 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `fpl`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `TID` int(10) NOT NULL AUTO_INCREMENT,
  `UID` int(10) NOT NULL,
  `MID` int(5) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `commentText` varchar(256) NOT NULL,
  PRIMARY KEY (`TID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`TID`, `UID`, `MID`, `user_name`, `commentText`) VALUES
(1, 26, 1, 'ssanket2008', 'Brazil');

-- --------------------------------------------------------

--
-- Table structure for table `databaselogin_details`
--

CREATE TABLE IF NOT EXISTS `databaselogin_details` (
  `data_hash_password` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `data_salt` varchar(40) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `databaselogin_details`
--

INSERT INTO `databaselogin_details` (`data_hash_password`, `data_salt`) VALUES
('1adb876615cac01f029d4f7022993a0e30c762528a0446be48f375e0e6acf064', '248418757532abc92c78384.03978258');

-- --------------------------------------------------------

--
-- Table structure for table `fixture`
--

CREATE TABLE IF NOT EXISTS `fixture` (
  `TID` int(5) NOT NULL AUTO_INCREMENT,
  `MID` int(5) NOT NULL,
  `team1` varchar(20) NOT NULL,
  `team2` varchar(20) NOT NULL,
  `team1ATTR` varchar(5) NOT NULL,
  `team2ATTR` varchar(5) NOT NULL,
  `score1` int(2) NOT NULL DEFAULT '0',
  `score2` int(2) NOT NULL DEFAULT '0',
  `team1SUP` int(10) NOT NULL DEFAULT '0',
  `team2SUP` int(10) NOT NULL DEFAULT '0',
  `draw` int(10) NOT NULL DEFAULT '0',
  `matchType` varchar(20) NOT NULL,
  `matchTime` datetime NOT NULL,
  `lockTime` datetime NOT NULL,
  `Live` varchar(3) NOT NULL,
  `updateStatus` varchar(3) NOT NULL DEFAULT 'no',
  PRIMARY KEY (`TID`),
  UNIQUE KEY `MID` (`MID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=65 ;

--
-- Dumping data for table `fixture`
--

INSERT INTO `fixture` (`TID`, `MID`, `team1`, `team2`, `team1ATTR`, `team2ATTR`, `score1`, `score2`, `team1SUP`, `team2SUP`, `draw`, `matchType`, `matchTime`, `lockTime`, `Live`, `updateStatus`) VALUES
(1, 1, 'Brazil', 'Croatia', 'BRA', 'HRV', 3, 1, 17, 8, 2, 'GroupMatch', '2014-06-13 01:30:00', '2014-06-13 00:30:00', 'yes', 'no'),
(2, 2, 'Mexico', 'Cameroon', 'MEX', 'CMR', 1, 1, 9, 3, 6, 'GroupMatch', '2014-06-13 21:30:00', '2014-06-13 20:30:00', 'yes', 'no'),
(3, 3, 'Spain', 'Netherlands', 'ESP', 'NLD', 0, 0, 9, 2, 0, 'GroupMatch', '2014-06-14 00:30:00', '2014-06-13 23:30:00', 'yes', 'no'),
(4, 4, 'Chile', 'Australia', 'CHL', 'AUS', 0, 0, 6, 4, 0, 'GroupMatch', '2014-06-14 03:30:00', '2014-06-14 02:30:00', 'yes', 'no'),
(5, 5, 'Colombia', 'Greece', 'COL', 'GRC', 0, 0, 5, 0, 0, 'GroupMatch', '2014-06-14 21:30:00', '2014-06-14 20:30:00', 'yes', 'no'),
(6, 6, 'Uruguay', 'Costa Rica', 'URY', 'CRC', 0, 0, 5, 0, 0, 'GroupMatch', '2014-06-15 00:30:00', '2014-06-14 23:30:00', 'yes', 'no'),
(7, 7, 'England', 'Italy', 'ENG', 'ITA', 0, 0, 1, 4, 0, 'GroupMatch', '2014-06-15 03:30:00', '2014-06-15 02:30:00', 'yes', 'no'),
(8, 8, 'Ivory Coast', 'Japan', 'CIV', 'JPN', 0, 0, 0, 4, 1, 'GroupMatch', '2014-06-15 06:30:00', '2014-06-15 05:30:00', 'yes', 'no'),
(9, 9, 'Switzerland', 'Ecuador', 'SWI', 'ECU', 0, 0, 0, 4, 1, 'GroupMatch', '2014-06-15 21:30:00', '2014-06-15 20:30:00', 'yes', 'no'),
(10, 10, 'France', 'Honduras', 'FRA', 'HND', 0, 0, 4, 0, 1, 'GroupMatch', '2014-06-16 00:30:00', '2014-06-15 23:30:00', 'yes', 'no'),
(11, 11, 'Argentina', 'Bosnia-Herzegovina', 'ARG', 'BIH', 0, 0, 5, 0, 0, 'GroupMatch', '2014-06-16 03:30:00', '2014-06-16 02:30:00', 'yes', 'no'),
(12, 12, 'Germany', 'Portugal', 'GER', 'PRT', 0, 0, 0, 1, 2, 'GroupMatch', '2014-06-16 21:30:00', '2014-06-16 20:30:00', 'yes', 'no'),
(13, 13, 'Iran', 'Nigeria', 'IRN', 'NGA', 0, 0, 0, 3, 0, 'GroupMatch', '2014-06-17 00:30:00', '2014-06-16 23:30:00', 'yes', 'no'),
(14, 14, 'Ghana', 'USA', 'GHA', 'USA', 0, 0, 0, 1, 2, 'GroupMatch', '2014-06-17 03:30:00', '2014-06-17 02:30:00', 'yes', 'no'),
(15, 15, 'Belgium', 'Algeria', 'BEL', 'DZA', 0, 0, 2, 0, 0, 'GroupMatch', '2014-06-17 21:30:00', '2014-06-17 20:30:00', 'yes', 'no'),
(16, 16, 'Russia', 'South Korea', 'RUS', 'KOR', 0, 0, 2, 0, 0, 'GroupMatch', '2014-06-18 03:30:00', '2014-06-18 02:30:00', 'yes', 'no'),
(17, 17, 'Brazil', 'Mexico', 'BRA', 'MEX', 0, 0, 2, 0, 0, 'GroupMatch', '2014-06-18 00:30:00', '2014-06-17 23:30:00', 'yes', 'no'),
(18, 18, 'Australia', 'Netherlands', 'AUS', 'NLD', 0, 0, 1, 1, 0, 'GroupMatch', '2014-06-18 21:30:00', '2014-06-18 20:30:00', 'yes', 'no'),
(19, 19, 'Spain', 'Chile', 'ESP', 'CHL', 0, 0, 1, 0, 1, 'GroupMatch', '2014-06-19 00:30:00', '2014-06-18 23:30:00', 'yes', 'no'),
(20, 20, 'Cameroon', 'Croatia', 'CMR', 'HRV', 0, 0, 0, 2, 0, 'GroupMatch', '2014-06-19 03:30:00', '2014-06-19 02:30:00', 'yes', 'no'),
(21, 21, 'Colombia', 'Ivory Coast', 'COL', 'CIV', 0, 0, 1, 0, 1, 'GroupMatch', '2014-06-19 21:30:00', '2014-06-19 20:30:00', 'yes', 'no'),
(22, 22, 'Uruguay', 'England', 'URY', 'ENG', 0, 0, 0, 2, 0, 'GroupMatch', '2014-06-20 00:30:00', '2014-06-19 23:30:00', 'yes', 'no'),
(23, 23, 'Japan', 'Greece', 'JPN', 'GRC', 0, 0, 1, 0, 1, 'GroupMatch', '2014-06-20 03:30:00', '2014-06-20 02:30:00', 'yes', 'no'),
(24, 24, 'Italy', 'Costa Rica', 'ITA', 'CRC', 0, 0, 2, 0, 0, 'GroupMatch', '2014-06-20 21:30:00', '2014-06-20 20:30:00', 'yes', 'no'),
(25, 25, 'Switzerland', 'France', 'SWI', 'FRA', 0, 0, 0, 2, 0, 'GroupMatch', '2014-06-21 00:30:00', '2014-06-20 23:30:00', 'yes', 'no'),
(26, 26, 'Honduras', 'Ecuador', 'HND', 'ECU', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-21 03:30:00', '2014-06-21 02:30:00', 'yes', 'no'),
(27, 27, 'Argentina', 'Iran', 'ARG', 'IRN', 0, 0, 1, 0, 0, 'GroupMatch', '2014-06-21 21:30:00', '2014-06-21 20:30:00', 'yes', 'no'),
(28, 28, 'Germany', 'Ghana', 'GER', 'GHA', 0, 0, 1, 0, 0, 'GroupMatch', '2014-06-22 00:30:00', '2014-06-21 23:30:00', 'yes', 'no'),
(29, 29, 'Nigeria', 'Bosnia-Herzegovina', 'NGA', 'BIH', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-22 03:30:00', '2014-06-22 02:30:00', 'yes', 'no'),
(30, 30, 'Belgium', 'Russia', 'BEL', 'RUS', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-22 21:30:00', '2014-06-22 20:30:00', 'yes', 'no'),
(31, 31, 'South Korea', 'Algeria', 'KOR', 'DZA', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-23 00:30:00', '2014-06-22 23:30:00', 'yes', 'no'),
(32, 32, 'USA', 'Portugal', 'USA', 'PRT', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-23 03:30:00', '2014-06-23 02:30:00', 'yes', 'no'),
(33, 33, 'Australia', 'Spain', 'AUS', 'ESP', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-23 21:30:00', '2014-06-23 20:30:00', 'yes', 'no'),
(34, 34, 'Netherlands', 'Chile', 'NLD', 'CHL', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-23 21:30:00', '2014-06-23 20:30:00', 'yes', 'no'),
(35, 35, 'Cameroon', 'Brazil', 'CMR', 'BRA', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-24 01:30:00', '2014-06-24 00:30:00', 'yes', 'no'),
(36, 36, 'Croatia', 'Mexico', 'HRV', 'MEX', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-24 01:30:00', '2014-06-24 00:30:00', 'yes', 'no'),
(37, 37, 'Italy', 'Uruguay', 'ITA', 'URY', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-24 21:30:00', '2014-06-24 20:30:00', 'yes', 'no'),
(38, 38, 'Costa Rica', 'England', 'CRC', 'ENG', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-24 21:30:00', '2014-06-24 20:30:00', 'yes', 'no'),
(39, 39, 'Japan', 'Colombia', 'JPN', 'COL', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-25 01:30:00', '2014-06-25 00:30:00', 'yes', 'no'),
(40, 40, 'Greece', 'Ivory Coast', 'GRC', 'CIV', 0, 0, 1, 0, 0, 'GroupMatch', '2014-06-25 01:30:00', '2014-06-25 00:30:00', 'yes', 'no'),
(41, 41, 'Nigeria', 'Argentina', 'NGA', 'ARG', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-25 21:30:00', '2014-06-25 20:30:00', 'yes', 'no'),
(42, 42, 'Bosnia-Herzegovina', 'Iran', 'BIH', 'IRN', 0, 0, 0, 0, 1, 'GroupMatch', '2014-06-25 21:30:00', '2014-06-25 20:30:00', 'yes', 'no'),
(43, 43, 'Honduras', 'Switzerland', 'HND', 'SWI', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-26 01:30:00', '2014-06-26 00:30:00', 'yes', 'no'),
(44, 44, 'Ecuador', 'France', 'ECU', 'FRA', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-26 01:30:00', '2014-06-26 00:30:00', 'yes', 'no'),
(45, 45, 'USA', 'Germany', 'USA', 'GER', 0, 0, 0, 1, 0, 'GroupMatch', '2014-06-26 21:30:00', '2014-06-26 20:30:00', 'yes', 'no'),
(46, 46, 'Ghana', 'Portugal', 'GHA', 'PRT', 0, 0, 0, 0, 0, 'GroupMatch', '2014-06-26 21:30:00', '2014-06-26 20:30:00', 'yes', 'no'),
(47, 47, 'South Korea', 'Belgium', 'KOR', 'BEL', 0, 0, 0, 0, 0, 'GroupMatch', '2014-06-27 01:30:00', '2014-06-27 00:30:00', 'yes', 'no'),
(48, 48, 'Algeria', 'Russia', 'DZA', 'RUS', 0, 0, 0, 0, 0, 'GroupMatch', '2014-06-27 01:30:00', '2014-06-27 00:30:00', 'yes', 'no'),
(49, 49, '1A', '2B', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-06-28 21:30:00', '2014-06-28 20:30:00', '', 'no'),
(50, 50, '1C', '2D', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-06-29 01:30:00', '2014-06-29 00:30:00', '', 'no'),
(51, 51, '1B', '2A', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-06-29 21:30:00', '2014-06-29 20:30:00', '', 'no'),
(52, 52, '1D', '2C', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-06-30 01:30:00', '2014-06-30 00:30:00', '', 'no'),
(53, 53, '1E', '2F', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-06-30 21:30:00', '2014-06-30 20:30:00', '', 'no'),
(54, 54, '1G', '2H', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-07-01 01:30:00', '2014-07-01 00:30:00', '', 'no'),
(55, 55, '1F', '2E', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-07-01 21:30:00', '2014-07-01 20:30:00', '', 'no'),
(56, 56, '1H', '2G', '', '', 0, 0, 0, 0, 0, 'Round16', '2014-07-02 01:30:00', '2014-07-02 00:30:00', '', 'no'),
(57, 57, 'Winner 1E/2F', 'Winner 1G/2H', '', '', 0, 0, 0, 0, 0, 'Quater Finla', '2014-07-04 21:30:00', '2014-07-04 20:30:00', '', 'no'),
(58, 58, 'Winner 1A/2B', 'Winner 1C/2D', '', '', 0, 0, 0, 0, 0, 'Quater Finla', '2014-07-05 01:30:00', '2014-07-05 00:30:00', '', 'no'),
(59, 59, 'Winner 1F/2E', 'Winner 1H/2G', '', '', 0, 0, 0, 0, 0, 'Quater Finla', '2014-07-05 21:30:00', '2014-07-05 20:30:00', '', 'no'),
(60, 60, 'Winner 1B/2A', 'Winner 1D/2C', '', '', 0, 0, 0, 0, 0, 'Quater Finla', '2014-07-06 01:30:00', '2014-07-06 00:30:00', '', 'no'),
(61, 61, 'Winner QF1', 'Winner QF2', '', '', 0, 0, 0, 0, 0, 'Semi Final', '2014-07-09 01:30:00', '2014-07-09 00:30:00', '', 'no'),
(62, 62, 'Winner QF3', 'Winner QF4', '', '', 0, 0, 0, 0, 0, 'Semi Final', '2014-07-10 01:30:00', '2014-07-10 00:30:00', '', 'no'),
(63, 63, 'Loser SF1', 'Loser SF2', '', '', 0, 0, 0, 0, 0, 'Third Place', '2014-07-13 01:30:00', '2014-07-13 00:30:00', '', 'no'),
(64, 64, 'Winner SF1', 'Winner SF2', '', '', 0, 0, 0, 0, 0, 'Final', '2014-07-14 00:30:00', '2014-07-13 23:30:00', '', 'no');

-- --------------------------------------------------------

--
-- Table structure for table `leaguecode`
--

CREATE TABLE IF NOT EXISTS `leaguecode` (
  `leagueID` int(8) NOT NULL,
  `leagueName` varchar(18) NOT NULL,
  `leagueCode` varchar(12) NOT NULL,
  `type` varchar(10) NOT NULL,
  `adminID` varchar(40) NOT NULL,
  `members` int(6) NOT NULL,
  PRIMARY KEY (`leagueID`),
  UNIQUE KEY `leagueName` (`leagueName`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaguecode`
--

INSERT INTO `leaguecode` (`leagueID`, `leagueName`, `leagueCode`, `type`, `adminID`, `members`) VALUES
(18320821, 'jasssss', '121212', 'public', 'hardikg23@gmail.com', 1),
(61122077, 'xdSSSSSS', '123456', 'public', 'har@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `leaguemember`
--

CREATE TABLE IF NOT EXISTS `leaguemember` (
  `leagueID` int(8) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  UNIQUE KEY `leagueID` (`leagueID`,`user_email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `leaguemember`
--

INSERT INTO `leaguemember` (`leagueID`, `user_email`) VALUES
(18320821, 'hardikg23@gmail.com'),
(61122077, 'har@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `userdata`
--

CREATE TABLE IF NOT EXISTS `userdata` (
  `UID` int(10) NOT NULL AUTO_INCREMENT,
  `fullName` varchar(50) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_password` varchar(150) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `join_date` datetime NOT NULL,
  `user_password_salt` varchar(40) NOT NULL,
  PRIMARY KEY (`UID`),
  UNIQUE KEY `user_email` (`user_email`),
  UNIQUE KEY `user_name` (`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `userdata`
--

INSERT INTO `userdata` (`UID`, `fullName`, `user_email`, `user_password`, `user_name`, `join_date`, `user_password_salt`) VALUES
(1, 'jay shah', 'hardikg23@gmail.com', 'fe1513cc5fc528278737244b2ee1f58e95159dea6b4d0d013d04fd69aba01d33', 'jay', '2014-06-07 22:36:38', '4280909485393469ef08b86.85294974'),
(2, 'xDsss', 'har@gmail.com', '5e76b6eb705ea8fc6c9cb8aaeac8c0dc9438bcbbd60da7a7664ce58f6543572e', 'xDsss', '2014-06-07 23:22:00', '564589536539351401f6301.73186758'),
(3, 'yoyo', 'yoyo@gmail.com', 'ac74da64065698a125093b5c104656a32d36a994691dc6c257b9d24af48de25e', 'yoyo', '2014-06-08 00:34:55', '174296050153936257261303.7408119'),
(4, 'Akash Doshi', 'add9219@gmail.com', '55989267c31cf38fc9bda5e28b423746b56422c3c1e56e808de1a4e2538134df', 'akashdoshi', '2014-06-08 10:21:00', '4999739415393ebb499c475.20908191'),
(5, 'madhusudhan rao', 'madhupachava3@gmail.com', 'd404762e34fe481a6662dd32a3b3940e9a3c481f12cfd9f130135d072149277b', 'mspachava', '2014-06-08 16:34:00', '14615732205394432067bf01.3310493'),
(6, 'ganesh anant mahadkar', 'ganeshmahadkar09@gmail.com', 'd565ec2ab17a5b8ecc0e37fcebe24c13fdadc186acaf451a294958c333acb722', 'gmahadkar', '2014-06-08 20:17:53', '201120411553947799540703.5042139'),
(7, 'Rakesh Jayasingh', 'rakesh.jayasingh20@gmail.com', 'de40aa9c6bc9a53b5a015692e2584cf4b127514b3c19fbc1f2bf286d82b2ec92', 'Rk7', '2014-06-08 23:21:33', '12361573755394a2a50aed70.6366532'),
(8, 'sudeep desai', 'sudeep_desai@yahoo.com', 'cd08b3e1797f43690a9d77b6501c6a4ecdb09a08b90256040065c1612c2cb9f1', 'velocity', '2014-06-09 13:24:43', '2098700685395684362e0a0.98109994'),
(9, 'Abhi Shah', 'aniketshinde007@gmail.com', 'b271f23a6f808e1e43603644d44d79fe9745ad960fdaca370d82d514572e8b62', 'abhi.shah', '2014-06-09 18:31:25', '7009190055395b025ca8930.65013693'),
(10, 'Krishanu Bhattacharjee', 'krishanu8@gmail.com', '465f0926d45ef2bbe567ff8ea978ac172be89edaad64ca55e271bef7239c0543', 'krishanu8', '2014-06-09 23:43:09', '15320436155395f9352d6317.3366358'),
(11, 'kashyap v', 'kashyap.v32@gmail.com', '855a9083685d9328ea245318017f307eed4733ed6f18d89db0d4152473a4506f', 'kashyapv224', '2014-06-10 00:40:34', '1135190051539606aa1cf2d0.8822045'),
(12, 'biswojit', 'biswojtdas094@gmail.com', '54869b344890b86387e76dace1087ddcfbd2fba1c78d8c220e17cd5d7a10d248', 'biswojit das', '2014-06-10 15:52:31', '653156555396dc678bf5c9.84775575'),
(13, 'Ihab Mohammed', 'ihabmohammed79@gmail.com', '5e3224c4bc78b5e3deb106e21c792dc9d915fef04ed0089c191c8a03d7174f10', 'ihab', '2014-06-10 20:35:37', '177115148953971ec14da6f8.6012835'),
(14, 'Durga sarangi', 'durga293@yahoo.in', '049b8b29eab99c36d14cdf60e94edce56388d9957c49e2cbfc8cc6ac83cd9de5', 'durga293', '2014-06-11 07:26:59', '12873087965397b76be29388.3425074'),
(15, 'Sureshkumar', 'srinisuva52@gmail.com', '835c88f2c7c5c4139a55546f090a1f360e31c751e14bd149232c2d6b2f7e471c', 'Suresh19', '2014-06-11 10:04:35', '5734202585397dc5b175c77.38629590'),
(16, 'mayank J', 'demo100@live.com', '6c51691916de9441c258d030caaf01c64214d5e39c801564b93e149d1ef44d25', 'may99', '2014-06-11 12:54:18', '18084093155398042259b496.9533736'),
(17, 'suchit jami', 'demo101@live.com', 'ef5917f0c4324f3fc514bf95da07213a3f172837cad57df06997e6f88a1d5094', 'rockyy', '2014-06-11 12:55:35', '16382077665398046f88be78.4920920'),
(18, 'neha mehta', 'demo102@live.com', 'ba646d6564981c15efb31f8eae515a1f288da80238771f50e93fc2b8840f3795', 'neeee', '2014-06-11 12:56:56', '1159545438539804c026b675.5463870'),
(19, 'ashik Gajera', 'demo103@live.com', '00c93ac75b5366b0657a8f1471f19dfbc9f2660082b4583bf940c16bfdfcc577', 'gajeras', '2014-06-11 12:58:16', '1898103407539805102c62d4.5221966'),
(20, 'bakul patel', 'demo105@live.com', '89044075ada53734d99a44f3520f56158d2a5ae14d78106808ee735e43177dc1', 'patelB', '2014-06-11 12:59:16', '13265929405398054cb35e99.4283935'),
(21, 'satyajit sarkar', 'satyajit.axom@gmail.com', 'fb0b8817a3cf8dc27246cee2911879c56d86c7cd60a9a939f07732cd0da2af46', 'satyajit1987', '2014-06-11 17:01:03', '79820456053983df7a808f9.79119299'),
(22, 'Snehasis chakraborty', 'snehasish_777@yahoo.co.in', 'badeb2854156832ac4cc9adbe17dad6598647feb07b0c85618db2b4466f10e5f', 'Crazybrazil', '2014-06-11 19:18:02', '157167964853985e12385a36.9782809'),
(23, 'Shashank', 'Shashankachandra@gmail.com', '68e6d1a3877f039b2b9c770b9480e9bdc5a9513e32cd4980b5fddfea7ef2e13d', 'shashank', '2014-06-12 08:12:52', '267691868539913acbacf27.89003291'),
(24, 'guruking', 'gurushowoff@gmail.com', '56f42c8926fd3050b3ca4f66ba25ac5abe594953ed0fd891e9542f8c76b31975', 'guruking', '2014-06-12 11:32:39', '3341715405399427f470c88.05333605'),
(25, 'Aravindh Nagappan', 'annavindh005@gmail.com', '2b54db83d336cdd5e61123e48702d21fd0be900ec512083a599878af809c5e93', 'Aravindh', '2014-06-12 18:08:42', '22321825853999f5282b6b4.69720069'),
(26, 'Sanket Sawant ', 'ssanket2008@yahoo.com', '420a246aa61d0622cc9051ccaa36426794f6c55f14c307c3a8b7e9f43c15872f', 'ssanket2008', '2014-06-12 19:14:17', '1188789675399aeb10c0f52.52133215'),
(27, 'mitesh dhami', 'demo106@gmail.com', 'aba684bc02d75487e5819fac8a9154bebdd90ea9f9081d853a069f561b745f7c', 'mit', '2014-06-12 21:31:57', '4671505595399cef5d95e69.07349184'),
(28, 'Hitendra', 'demo107@gmail.com', '5554b56d49e84fafd637f566512a3c4e5c5daf8fd26fc8f1e5ecfa31ce436137', 'Hitendra99', '2014-06-12 21:34:20', '18391913315399cf845ab0f5.5543645'),
(29, 'sagar shah', 'demo108@gmail.com', '8b22234d15c7d7f627b9fbeb4f4b2acff53376513da0b84cb22d3d394430dbfe', 'sagar88', '2014-06-12 21:36:17', '8354811785399cff9b42613.42881584'),
(30, 'PRINCE RAJ ', 'Smartp76@gmail.com', '7009af88ac342233fe2b3619f6eed681678025038828b2832e2da99dd4f56106', 'Smartprince ', '2014-06-12 23:20:00', '11591448915399e848a28c88.9958545'),
(31, 'dixit kanani', 'dixit.kanani@ymail.com', '22e695e8a7f9fedc278207479fdd282f6e40a734f423e23932b089009d593886', 'dixit2511', '2014-06-13 11:00:27', '1282766189539a8c735ad9d6.9409362'),
(32, 'nammaborg', 'nammaborgi@gmail.com', '457a8113f04bb3573365f76116e9cd9487174dba7b919b71f979d73b33b60357', 'NAMMABORGI', '2014-06-13 12:25:45', '1527172751539aa071cf23c1.6303615');

-- --------------------------------------------------------

--
-- Table structure for table `usermatchscore`
--

CREATE TABLE IF NOT EXISTS `usermatchscore` (
  `TID` int(10) NOT NULL AUTO_INCREMENT,
  `UID` int(10) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `MID` int(5) NOT NULL,
  `score1` int(2) NOT NULL,
  `score2` int(2) NOT NULL,
  `mPoints` int(3) NOT NULL,
  `goalDiff` int(2) NOT NULL DEFAULT '0',
  PRIMARY KEY (`TID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=153 ;

--
-- Dumping data for table `usermatchscore`
--

INSERT INTO `usermatchscore` (`TID`, `UID`, `user_email`, `user_name`, `MID`, `score1`, `score2`, `mPoints`, `goalDiff`) VALUES
(1, 1, 'hardikg23@gmail.com', 'jay', 1, 2, 3, -2, 1),
(2, 3, 'yoyo@gmail.com', 'yoyo', 1, 7, 4, 15, 7),
(3, 4, 'add9219@gmail.com', 'akashdoshi', 1, 3, 0, 27, 1),
(4, 4, 'add9219@gmail.com', 'akashdoshi', 2, 1, 1, 34, 0),
(5, 4, 'add9219@gmail.com', 'akashdoshi', 3, 2, 1, 0, 0),
(6, 4, 'add9219@gmail.com', 'akashdoshi', 4, 2, 3, 0, 0),
(7, 4, 'add9219@gmail.com', 'akashdoshi', 5, 2, 1, 0, 0),
(8, 4, 'add9219@gmail.com', 'akashdoshi', 6, 3, 1, 0, 0),
(9, 4, 'add9219@gmail.com', 'akashdoshi', 7, 0, 1, 0, 0),
(10, 4, 'add9219@gmail.com', 'akashdoshi', 8, 1, 2, 0, 0),
(11, 4, 'add9219@gmail.com', 'akashdoshi', 9, 1, 2, 0, 0),
(12, 4, 'add9219@gmail.com', 'akashdoshi', 10, 1, 0, 0, 0),
(13, 4, 'add9219@gmail.com', 'akashdoshi', 11, 4, 1, 0, 0),
(14, 5, 'madhupachava3@gmail.com', 'mspachava', 1, 2, 1, 27, 1),
(15, 6, 'ganeshmahadkar09@gmail.com', 'gmahadkar', 1, 2, 1, 27, 1),
(16, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 1, 1, 0, 23, 3),
(17, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 2, 1, 1, 34, 0),
(18, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 3, 2, 1, 0, 0),
(19, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 4, 2, 0, 0, 0),
(20, 8, 'sudeep_desai@yahoo.com', 'velocity', 1, 2, 0, 25, 2),
(21, 9, 'aniketshinde007@gmail.com', 'abhi.shah', 1, 10, 0, 17, 6),
(22, 5, 'madhupachava3@gmail.com', 'mspachava', 2, 2, 0, 0, 0),
(23, 10, 'krishanu8@gmail.com', 'krishanu8', 1, 3, 1, 29, 0),
(24, 12, 'biswojtdas094@gmail.com', 'biswojit das', 1, 3, 0, 27, 1),
(25, 13, 'ihabmohammed79@gmail.com', 'ihab', 1, 3, 0, 27, 1),
(26, 14, 'durga293@yahoo.in', 'durga293', 1, 2, 0, 25, 2),
(27, 14, 'durga293@yahoo.in', 'durga293', 2, 2, 1, -2, 1),
(28, 15, 'srinisuva52@gmail.com', 'Suresh19', 1, 2, 1, 27, 1),
(29, 16, 'demo100@live.com', 'may99', 1, 1, 2, -2, 1),
(30, 16, 'demo100@live.com', 'may99', 2, 2, 2, 30, 2),
(31, 17, 'demo101@live.com', 'rockyy', 1, 1, 2, -2, 1),
(32, 18, 'demo102@live.com', 'neeee', 1, 0, 1, -6, 3),
(33, 19, 'demo103@live.com', 'gajeras', 1, 1, 1, -4, 2),
(34, 20, 'demo105@live.com', 'patelB', 1, 2, 3, -2, 1),
(35, 21, 'satyajit.axom@gmail.com', 'satyajit1987', 1, 2, 2, 0, 0),
(36, 21, 'satyajit.axom@gmail.com', 'satyajit1987', 2, 2, 1, -2, 1),
(37, 22, 'snehasish_777@yahoo.co.in', 'Crazybrazil', 1, 3, 0, 27, 1),
(38, 1, 'hardikg23@gmail.com', 'jay', 2, 1, 2, -2, 1),
(39, 1, 'hardikg23@gmail.com', 'jay', 3, 1, 2, 0, 0),
(40, 23, 'Shashankachandra@gmail.com', 'shashank', 1, 2, 0, 25, 2),
(41, 24, 'gurushowoff@gmail.com', 'guruking', 1, 3, 1, 29, 0),
(42, 25, 'annavindh005@gmail.com', 'Aravindh', 1, 3, 1, 29, 0),
(43, 25, 'annavindh005@gmail.com', 'Aravindh', 2, 2, 2, 30, 2),
(44, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 1, 4, 1, 27, 1),
(45, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 2, 1, 0, -2, 1),
(46, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 3, 2, 1, 0, 0),
(47, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 4, 0, 3, 0, 0),
(48, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 5, 3, 0, 0, 0),
(49, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 6, 2, 0, 0, 0),
(50, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 7, 1, 3, 0, 0),
(51, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 8, 0, 2, 0, 0),
(52, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 9, 0, 3, 0, 0),
(53, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 10, 2, 0, 0, 0),
(54, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 11, 2, 1, 0, 0),
(55, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 12, 1, 2, 0, 0),
(56, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 13, 1, 2, 0, 0),
(57, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 14, 2, 3, 0, 0),
(58, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 15, 1, 0, 0, 0),
(59, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 16, 2, 1, 0, 0),
(60, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 17, 3, 1, 0, 0),
(61, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 18, 2, 1, 0, 0),
(62, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 19, 2, 2, 0, 0),
(63, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 20, 0, 1, 0, 0),
(64, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 21, 3, 2, 0, 0),
(65, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 22, 1, 2, 0, 0),
(66, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 23, 2, 1, 0, 0),
(67, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 24, 1, 0, 0, 0),
(68, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 25, 2, 3, 0, 0),
(69, 27, 'demo106@gmail.com', 'mit', 1, 0, 1, -6, 3),
(70, 28, 'demo107@gmail.com', 'Hitendra99', 1, 2, 3, -2, 1),
(71, 29, 'demo108@gmail.com', 'sagar88', 1, 1, 2, -2, 1),
(72, 10, 'krishanu8@gmail.com', 'krishanu8', 2, 1, 1, 34, 0),
(73, 10, 'krishanu8@gmail.com', 'krishanu8', 3, 1, 2, 0, 0),
(74, 10, 'krishanu8@gmail.com', 'krishanu8', 4, 1, 0, 0, 0),
(75, 5, 'madhupachava3@gmail.com', 'mspachava', 3, 1, 0, 0, 0),
(76, 30, 'Smartp76@gmail.com', 'Smartprince ', 2, 3, 2, -6, 3),
(77, 25, 'annavindh005@gmail.com', 'Aravindh', 3, 3, 2, 0, 0),
(78, 25, 'annavindh005@gmail.com', 'Aravindh', 4, 1, 2, 0, 0),
(79, 25, 'annavindh005@gmail.com', 'Aravindh', 5, 1, 0, 0, 0),
(80, 25, 'annavindh005@gmail.com', 'Aravindh', 6, 2, 0, 0, 0),
(81, 25, 'annavindh005@gmail.com', 'Aravindh', 7, 1, 3, 0, 0),
(82, 25, 'annavindh005@gmail.com', 'Aravindh', 8, 0, 2, 0, 0),
(83, 25, 'annavindh005@gmail.com', 'Aravindh', 9, 1, 2, 0, 0),
(84, 25, 'annavindh005@gmail.com', 'Aravindh', 10, 2, 2, 0, 0),
(85, 25, 'annavindh005@gmail.com', 'Aravindh', 11, 3, 0, 0, 0),
(86, 25, 'annavindh005@gmail.com', 'Aravindh', 12, 2, 2, 0, 0),
(87, 25, 'annavindh005@gmail.com', 'Aravindh', 13, 0, 2, 0, 0),
(88, 25, 'annavindh005@gmail.com', 'Aravindh', 14, 1, 1, 0, 0),
(89, 14, 'durga293@yahoo.in', 'durga293', 3, 2, 0, 0, 0),
(90, 14, 'durga293@yahoo.in', 'durga293', 4, 3, 1, 0, 0),
(91, 31, 'dixit.kanani@ymail.com', 'dixit2511', 2, 2, 0, 0, 0),
(92, 31, 'dixit.kanani@ymail.com', 'dixit2511', 3, 1, 0, 0, 0),
(93, 24, 'gurushowoff@gmail.com', 'guruking', 2, 1, 0, -2, 1),
(94, 24, 'gurushowoff@gmail.com', 'guruking', 3, 2, 0, 0, 0),
(95, 24, 'gurushowoff@gmail.com', 'guruking', 4, 1, 0, 0, 0),
(96, 32, 'nammaborgi@gmail.com', 'NAMMABORGI', 2, 2, 1, -2, 1),
(97, 32, 'nammaborgi@gmail.com', 'NAMMABORGI', 3, 3, 1, 0, 0),
(98, 32, 'nammaborgi@gmail.com', 'NAMMABORGI', 4, 2, 1, 0, 0),
(99, 17, 'demo101@live.com', 'rockyy', 2, 1, 2, -2, 1),
(100, 18, 'demo102@live.com', 'neeee', 2, 1, 2, -2, 1),
(101, 19, 'demo103@live.com', 'gajeras', 2, 1, 1, 34, 0),
(102, 5, 'madhupachava3@gmail.com', 'mspachava', 4, 2, 1, 0, 0),
(103, 5, 'madhupachava3@gmail.com', 'mspachava', 5, 2, 0, 0, 0),
(104, 5, 'madhupachava3@gmail.com', 'mspachava', 6, 3, 0, 0, 0),
(105, 5, 'madhupachava3@gmail.com', 'mspachava', 7, 1, 2, 0, 0),
(106, 5, 'madhupachava3@gmail.com', 'mspachava', 8, 1, 1, 0, 0),
(107, 5, 'madhupachava3@gmail.com', 'mspachava', 9, 0, 2, 0, 0),
(108, 5, 'madhupachava3@gmail.com', 'mspachava', 10, 2, 0, 0, 0),
(109, 5, 'madhupachava3@gmail.com', 'mspachava', 11, 3, 0, 0, 0),
(110, 5, 'madhupachava3@gmail.com', 'mspachava', 12, 2, 2, 0, 0),
(111, 5, 'madhupachava3@gmail.com', 'mspachava', 13, 1, 3, 0, 0),
(112, 5, 'madhupachava3@gmail.com', 'mspachava', 14, 1, 1, 0, 0),
(113, 5, 'madhupachava3@gmail.com', 'mspachava', 15, 2, 1, 0, 0),
(114, 5, 'madhupachava3@gmail.com', 'mspachava', 16, 3, 0, 0, 0),
(115, 5, 'madhupachava3@gmail.com', 'mspachava', 17, 3, 1, 0, 0),
(116, 5, 'madhupachava3@gmail.com', 'mspachava', 18, 1, 2, 0, 0),
(117, 5, 'madhupachava3@gmail.com', 'mspachava', 19, 2, 1, 0, 0),
(118, 5, 'madhupachava3@gmail.com', 'mspachava', 20, 0, 2, 0, 0),
(119, 5, 'madhupachava3@gmail.com', 'mspachava', 21, 1, 1, 0, 0),
(120, 5, 'madhupachava3@gmail.com', 'mspachava', 22, 0, 3, 0, 0),
(121, 5, 'madhupachava3@gmail.com', 'mspachava', 23, 1, 1, 0, 0),
(122, 5, 'madhupachava3@gmail.com', 'mspachava', 24, 3, 0, 0, 0),
(123, 5, 'madhupachava3@gmail.com', 'mspachava', 25, 0, 2, 0, 0),
(124, 5, 'madhupachava3@gmail.com', 'mspachava', 26, 1, 1, 0, 0),
(125, 5, 'madhupachava3@gmail.com', 'mspachava', 27, 3, 1, 0, 0),
(126, 5, 'madhupachava3@gmail.com', 'mspachava', 28, 2, 1, 0, 0),
(127, 5, 'madhupachava3@gmail.com', 'mspachava', 29, 0, 1, 0, 0),
(128, 5, 'madhupachava3@gmail.com', 'mspachava', 30, 1, 1, 0, 0),
(129, 5, 'madhupachava3@gmail.com', 'mspachava', 31, 1, 1, 0, 0),
(130, 5, 'madhupachava3@gmail.com', 'mspachava', 32, 1, 2, 0, 0),
(131, 5, 'madhupachava3@gmail.com', 'mspachava', 33, 1, 1, 0, 0),
(132, 5, 'madhupachava3@gmail.com', 'mspachava', 34, 0, 1, 0, 0),
(133, 5, 'madhupachava3@gmail.com', 'mspachava', 35, 1, 3, 0, 0),
(134, 5, 'madhupachava3@gmail.com', 'mspachava', 36, 0, 2, 0, 0),
(135, 5, 'madhupachava3@gmail.com', 'mspachava', 37, 1, 1, 0, 0),
(136, 5, 'madhupachava3@gmail.com', 'mspachava', 38, 0, 2, 0, 0),
(137, 5, 'madhupachava3@gmail.com', 'mspachava', 39, 1, 1, 0, 0),
(138, 5, 'madhupachava3@gmail.com', 'mspachava', 40, 1, 0, 0, 0),
(139, 5, 'madhupachava3@gmail.com', 'mspachava', 41, 1, 2, 0, 0),
(140, 5, 'madhupachava3@gmail.com', 'mspachava', 42, 0, 0, 0, 0),
(141, 5, 'madhupachava3@gmail.com', 'mspachava', 43, 0, 2, 0, 0),
(142, 5, 'madhupachava3@gmail.com', 'mspachava', 44, 1, 2, 0, 0),
(143, 5, 'madhupachava3@gmail.com', 'mspachava', 45, 1, 2, 0, 0),
(144, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 5, 2, 1, 0, 0),
(145, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 6, 2, 0, 0, 0),
(146, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 7, 2, 1, 0, 0),
(147, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 8, 0, 1, 0, 0),
(148, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 9, 1, 1, 0, 0),
(149, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 10, 2, 1, 0, 0),
(150, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 11, 3, 0, 0, 0),
(151, 23, 'Shashankachandra@gmail.com', 'shashank', 2, 2, 1, -2, 1),
(152, 1, 'hardikg23@gmail.com', 'jay', 4, 0, 1, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userscore`
--

CREATE TABLE IF NOT EXISTS `userscore` (
  `TID` int(10) NOT NULL AUTO_INCREMENT,
  `UID` int(10) NOT NULL,
  `user_email` varchar(40) NOT NULL,
  `user_name` varchar(20) NOT NULL,
  `points` int(5) NOT NULL,
  `goalDiff` int(5) NOT NULL,
  PRIMARY KEY (`TID`),
  UNIQUE KEY `UID` (`UID`),
  UNIQUE KEY `user_email` (`user_email`,`user_name`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=33 ;

--
-- Dumping data for table `userscore`
--

INSERT INTO `userscore` (`TID`, `UID`, `user_email`, `user_name`, `points`, `goalDiff`) VALUES
(1, 1, 'hardikg23@gmail.com', 'jay', -4, 2),
(2, 2, 'har@gmail.com', 'xDsss', 0, 0),
(3, 3, 'yoyo@gmail.com', 'yoyo', 15, 7),
(4, 4, 'add9219@gmail.com', 'akashdoshi', 61, 1),
(5, 5, 'madhupachava3@gmail.com', 'mspachava', 27, 1),
(6, 6, 'ganeshmahadkar09@gmail.com', 'gmahadkar', 27, 1),
(7, 7, 'rakesh.jayasingh20@gmail.com', 'Rk7', 57, 3),
(8, 8, 'sudeep_desai@yahoo.com', 'velocity', 25, 2),
(9, 9, 'aniketshinde007@gmail.com', 'abhi.shah', 17, 6),
(10, 10, 'krishanu8@gmail.com', 'krishanu8', 63, 0),
(11, 11, 'kashyap.v32@gmail.com', 'kashyapv224', 0, 0),
(12, 12, 'biswojtdas094@gmail.com', 'biswojit das', 27, 1),
(13, 13, 'ihabmohammed79@gmail.com', 'ihab', 27, 1),
(14, 14, 'durga293@yahoo.in', 'durga293', 23, 3),
(15, 15, 'srinisuva52@gmail.com', 'Suresh19', 27, 1),
(16, 16, 'demo100@live.com', 'may99', 28, 3),
(17, 17, 'demo101@live.com', 'rockyy', -4, 2),
(18, 18, 'demo102@live.com', 'neeee', -8, 4),
(19, 19, 'demo103@live.com', 'gajeras', 30, 2),
(20, 20, 'demo105@live.com', 'patelB', -2, 1),
(21, 21, 'satyajit.axom@gmail.com', 'satyajit1987', -2, 1),
(22, 22, 'snehasish_777@yahoo.co.in', 'Crazybrazil', 27, 1),
(23, 23, 'Shashankachandra@gmail.com', 'shashank', 23, 3),
(24, 24, 'gurushowoff@gmail.com', 'guruking', 27, 1),
(25, 25, 'annavindh005@gmail.com', 'Aravindh', 59, 2),
(26, 26, 'ssanket2008@yahoo.com', 'ssanket2008', 25, 2),
(27, 27, 'demo106@gmail.com', 'mit', -6, 3),
(28, 28, 'demo107@gmail.com', 'Hitendra99', -2, 1),
(29, 29, 'demo108@gmail.com', 'sagar88', -2, 1),
(30, 30, 'Smartp76@gmail.com', 'Smartprince ', -6, 3),
(31, 31, 'dixit.kanani@ymail.com', 'dixit2511', 0, 0),
(32, 32, 'nammaborgi@gmail.com', 'NAMMABORGI', -2, 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
