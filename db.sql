-- phpMyAdmin SQL Dump
-- version 4.0.8
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 16, 2013 at 04:28 PM
-- Server version: 5.5.33a-MariaDB-log
-- PHP Version: 5.5.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `cardiff_hack`
--

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE IF NOT EXISTS `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `from_user` int(10) unsigned NOT NULL,
  `to_user` int(10) unsigned NOT NULL,
  `subject` varchar(255) NOT NULL,
  `message` text NOT NULL,
  `created_at` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `from_user` (`from_user`,`to_user`,`created_at`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `from_user`, `to_user`, `subject`, `message`, `created_at`) VALUES
(1, 1, 2, 'You have a new job', 'User has just applied for your job', '2013-11-16 13:17:47'),
(2, 1, 2, '', 'X', '2013-11-16 13:48:50'),
(3, 2, 1, 'Back', 'How are you?', '2013-11-16 15:56:47'),
(4, 1, 2, 'en', 'I''m find thanks.', '2013-11-16 15:56:47');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(16) NOT NULL,
  `email` varchar(128) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`) VALUES
(1, 'alex', 'alex.nicolaides@witlr.com'),
(2, 'byron', 'byron.williams@witlr.com'),
(3, 'nick', 'nick.guy@witlr.com');
