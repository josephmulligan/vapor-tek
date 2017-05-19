-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Host: localhost:3306
-- Generation Time: Jan 12, 2017 at 10:28 AM
-- Server version: 5.5.52-cll-lve
-- PHP Version: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `vaportek_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE IF NOT EXISTS `contact` (
  `contact_id` int(11) NOT NULL AUTO_INCREMENT,
  `date` varchar(25) DEFAULT NULL,
  `name` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `message` varchar(100) NOT NULL,
  `ip` varchar(35) NOT NULL,
  `latitude` float NOT NULL,
  `longitude` float NOT NULL,
  `call_back` varchar(3) NOT NULL,
  `contact_number` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`contact_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=64 ;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`contact_id`, `date`, `name`, `email`, `message`, `ip`, `latitude`, `longitude`, `call_back`, `contact_number`) VALUES
(1, '2016-12-17 13:28:04', 'scott', 'scott@scott.com', 'Test from Microsoft Edge\r\n17/12/16\r\nhome page', '80.3.125.89', 52.22, 6.8957, 'yes', '180055564'),
(2, '2016-12-17 13:29:07', 'scott', 'scott@scott.com', 'test from Microsoft Edge\r\n17/12/16\r\nAll products page', '80.3.125.89', 52.22, 6.8957, 'yes', '180055564'),
(3, '2016-12-17 13:31:17', 'scott', 'scott@scott.com', 'Microsoft Edge\r\n17/12/16\r\nsteelgard page', '80.3.125.89', 52.22, 6.8957, 'yes', '180055564'),
(4, '2016-12-17 13:31:56', 'scott', 'scott@scott.com', 'Microsoft Edge\r\n17/12/16\r\ncablegard page', '80.3.125.89', 52.22, 6.8957, 'yes', '180055564'),
(5, '2016-12-17 13:32:37', 'scott', 'scott@scott.com', 'Microsoft Edge\r\n17/12/16\r\nvaporoil page', '80.3.125.89', 52.22, 6.8957, 'yes', '180055564'),
(6, '2016-12-17 13:33:16', 'scott', 'scott@scott.com', 'Microsoft Edge\r\n17/12/16\r\nFAQ page', '80.3.125.89', 52.22, 6.8957, 'yes', '180055564'),
(7, '2016-12-17 13:35:37', 'Scott', 'Scott@scott.com', 'test from Opera\r\n17/12/16\r\nHome page', '80.3.125.89', 52.22, 6.8957, 'yes', '0800555555'),
(8, '2016-12-17 13:36:45', 'scott', 'scott@scott.com', 'test from Opera\r\n17/12/16\r\nall products page', '80.3.125.89', 52.22, 6.8957, 'yes', '0800800555'),
(9, '2016-12-17 13:37:24', 'scott', 'scott@scott.com', 'test from Opera\r\n17/12/16\r\nsteelgard page', '80.3.125.89', 52.22, 6.8957, 'yes', '0800555500'),
(10, '2016-12-17 13:38:10', 'scott', 'scoytt@scott.com', 'test from Opera\r\n17/12/16\r\ncablegard page', '80.3.125.89', 52.22, 6.8957, 'yes', '0800555500'),
(11, '2016-12-17 13:38:50', 'scott', 'scott@scott.com', 'test from Opera\r\n17/12/16\r\nVaporoil page', '80.3.125.89', 52.22, 6.8957, 'no', 'No number provided'),
(12, '2016-12-17 13:39:35', 'scott', 'scott@scott.com', 'test from Opera\r\n17/12/16\r\nFAQ page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(13, '2016-12-17 13:41:15', 'Scott', 'scott@scott.com', 'test from Safari -PC Platform\r\n17/12/16\r\nHome page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204158896'),
(14, '2016-12-17 13:42:11', 'scott', 'scott@scott.com', 'test from Safari -PC Platform\r\n17/12/16\r\nAll Products page', '80.3.125.89', 52.22, 6.8957, 'yes', '0120415889'),
(15, '2016-12-17 13:42:50', 'scott', 'scott@scott.com', 'test from Safari -PC Platform\r\n17/12/16\r\nsteelgard page', '80.3.125.89', 52.22, 6.8957, 'no', 'No number provided'),
(16, '2016-12-17 13:43:37', 'scott', 'scott@scott.com', 'test from Safari -PC Platform\r\n17/12/16\r\nCablegard page', '80.3.125.89', 52.22, 6.8957, 'yes', '0120415889'),
(17, '2016-12-17 13:44:19', 'scott', 'scott@scott.com', 'test from Safari -PC Platform\r\n17/12/16\r\nvaporoil page', '80.3.125.89', 52.22, 6.8957, 'yes', '0120415889'),
(18, '2016-12-17 13:45:00', 'scott', 'scott@scott.com', 'test from Safari -PC Platform\r\n17/12/16\r\nFAQ page', '80.3.125.89', 52.22, 6.8957, 'yes', '0120415889'),
(19, '2016-12-17 13:51:21', 'scott', 'scottlambert40@gmail.com', 'Test from Firefox\r\n17/12/16\r\nhome page', '80.3.125.89', 52.22, 6.8957, 'yes', '012044199918'),
(20, '2016-12-17 13:51:50', 'scott', 'scottlambert40@gmail.com', 'Test from Firefox\r\n17/12/16\r\nall products page', '80.3.125.89', 52.22, 6.8957, 'yes', '012044199918'),
(21, '2016-12-17 13:52:22', 'scott', 'scottlambert40@gmail.com', 'Test from Firefox\r\n17/12/16\r\nsteelgard page', '80.3.125.89', 52.22, 6.8957, 'yes', '012044199918'),
(22, '2016-12-17 13:52:52', 'scott', 'scottlambert40@gmail.com', 'Test from Firefox\r\n17/12/16\r\ncablegard page', '80.3.125.89', 52.22, 6.8957, 'yes', '012044199918'),
(23, '2016-12-17 13:53:31', 'scott', 'scottlambert40@gmail.com', 'Test from Firefox\r\n17/12/16\r\ncablegard page', '80.3.125.89', 52.22, 6.8957, 'yes', '012044199918'),
(24, '2016-12-17 13:53:56', 'scott', 'scottlambert40@gmail.com', 'Test from Firefox\r\n17/12/16\r\nFAQ page', '80.3.125.89', 52.22, 6.8957, 'yes', '012044199918'),
(25, '2016-12-17 13:54:51', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Test from Chrome\r\n17/12/16\r\nhome page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(26, '2016-12-17 13:55:17', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Test from Chrome\r\n17/12/16\r\nall products page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(27, '2016-12-17 13:56:33', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Test from Chrome\r\n17/12/16\r\nsteelgard page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(28, '2016-12-17 13:57:28', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Test from Chrome\r\n17/12/16\r\ncablegard page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(29, '2016-12-17 13:57:56', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Test from Chrome\r\n17/12/16\r\nvaporoil page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(30, '2016-12-17 13:58:34', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Test from Chrome\r\n17/12/16\r\nfaq page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(31, '2016-12-18 21:13:32', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Chrome \r\niPad mini\r\nIndex page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(32, '2016-12-18 21:14:08', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Chrome \r\niPad mini\r\nAll products  page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(33, '2016-12-18 21:14:45', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Chrome \r\niPad mini\r\nSteelgard page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(34, '2016-12-18 21:15:18', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Chrome \r\niPad mini\r\nCabelgard page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(35, '2016-12-18 21:15:52', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Chrome \r\niPad mini\r\nVaporoil page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(36, '2016-12-18 21:16:22', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'Chrome \r\niPad mini\r\nFAQ  page', '80.3.125.89', 52.22, 6.8957, 'yes', '01204411933'),
(37, '2016-12-22 22:50:44', 'Peter J', 'pj3amt@bolton.ac.uk', 'chrome test 22/12/16 10:50pm', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(38, '2016-12-22 22:51:12', 'Peter', 'peterj1124@hotmail.com', 'chrome test2  22/12/16 10:50pm', '81.96.116.60', 52.22, 6.8957, 'yes', '07312892189'),
(39, '2016-12-22 22:51:39', 'Peter Jedra', 'pj3amt@bolton.ac.uk', 'chrome test3  22/12/16 10:51pm', '81.96.116.60', 52.22, 6.8957, 'yes', '07312892189'),
(40, '2016-12-22 22:52:05', 'Mr Peter Jedra', 'pj3amt@bolton.ac.uk', 'chrome test4 22/12/16 10:51pm', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(41, '2016-12-22 22:52:36', 'Peter', 'pj3amt@bolton.ac.uk', 'IE test 22/12/16 10:52pm', '81.96.116.60', 52.22, 6.8957, 'yes', '07312892189'),
(42, '2016-12-22 22:53:08', 'Peter J', 'pj3amt@bolton.ac.uk', 'firefox test 22/12/16 10:53pm', '81.96.116.60', 52.22, 6.8957, 'yes', '07312892189'),
(43, '2016-12-22 22:53:34', 'Peter J', 'pj3amt@bolton.ac.uk', 'test 22/12/16 10:53pm', '81.96.116.60', 52.22, 6.8957, 'yes', '07312892189'),
(44, '2016-12-22 22:53:36', 'Peter J', 'pj3amt@bolton.ac.uk', 'test 22/12/16 10:53pm', '81.96.116.60', 52.22, 6.8957, 'yes', '07312892189'),
(45, '2016-12-22 22:54:31', 'Peter Jedra', 'pj3amt@bolton.ac.uk', 'IE test2 22/12/16 10:54pm', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(46, '2016-12-28 16:52:03', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'ajax added #1', '80.3.125.89', 0, 0, 'yes', '222222222222'),
(47, '2016-12-28 16:59:07', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'ajax test 2 chrome', '80.3.125.89', 0, 0, 'yes', '01250458885'),
(48, '2016-12-28 17:03:18', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'ajax test 3 chrome', '80.3.125.89', 0, 0, 'no', 'null'),
(49, '2016-12-28 17:35:43', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'ajax removed chrome 1', '80.3.125.89', 52.22, 6.8957, 'yes', '22222222222'),
(50, '2016-12-28 17:36:49', 'scott', 'scottlambert40@gmail.com', 'ajax removed safari', '80.3.125.89', 52.22, 6.8957, 'yes', '123456789'),
(51, '2017-01-05 20:37:27', '', '', '', '5.13.71.30', 52.22, 6.8957, 'no', 'No number provided'),
(52, '2017-01-06 16:16:23', 'scott lambert', 'scottlambert40@gmail.com', 'Kskskskmmsjhxne', '80.3.125.89', 52.22, 6.8957, 'yes', 'Kakakskms'),
(53, '2017-01-09 12:13:02', 'Dylan Palmer', 'dylanp61@live.co.uk', 'Call me back ', '193.63.48.248', 52.22, 6.8957, 'yes', '07892462553'),
(54, '2017-01-10 16:14:02', 'Mr Scott J Lambert', 'scottlambert40@gmail.com', 'test  10 January ', '80.3.125.89', 52.22, 6.8957, 'yes', '07916369473'),
(55, '2017-01-10 20:45:36', 'dylan', 'dylanp@gmail.com', 'Test from Google Chrome 10/01/17 20:46', '95.145.74.46', 52.22, 6.8957, 'no', 'No number provided'),
(56, '2017-01-11 12:27:39', 'Peter Jedra', 'pj3amt@bolton.ac.uk', 'mobile chrome test', '81.96.116.60', 52.22, 6.8957, 'yes', '074832893129'),
(57, '2017-01-11 12:28:33', 'Peter J', 'posdpo@email.com', 'blackberry browser test', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(58, '2017-01-11 12:28:49', 'Peter', 'posdpo@email.com', 'blackberry browser test 2', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(59, '2017-01-11 12:29:40', 'Peter Jedra', 'pj3amt@bolton.ac.uk', 'chrome test (laptop)', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(60, '2017-01-11 12:29:48', 'Peter Jedra', 'pj3amt@bolton.ac.uk', 'chrome test (pc)', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(61, '2017-01-11 12:30:00', 'Peter Jedra', 'pj3amt@bolton.ac.uk', 'mozilla test', '81.96.116.60', 52.22, 6.8957, 'no', 'No number provided'),
(62, '2017-01-11 15:49:29', 'albert', 'albert@fmail.com', 'Albert wuz ere', '192.168.210.39', 52.22, 6.8957, 'yes', '0180045487'),
(63, '2017-01-12 17:28:00', 'Done', 'done@done.com', 'We might now actually be done!', '80.3.125.89', 52.22, 6.8957, 'no', 'No number provided');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `email` varchar(35) NOT NULL,
  `password` varchar(35) NOT NULL,
  PRIMARY KEY (`user_id`),
  UNIQUE KEY `username` (`username`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `password`) VALUES
(1, 'redhouse2k16', 'redhouse2k16@gmail.com', 'redhouse123'),
(3, 'jp6vpr', 'johnpark@live.co.uk', 'johnp61'),
(4, 'pk1vpr', 'peterk@gmail.com', 'peterk76'),
(5, 'test', 'test@test.com', 'testpw'),
(6, 'jaleela', 'redhouse2k16@gmail.com', 'jaleelapw');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
