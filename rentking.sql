-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2014 at 03:03 AM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `rentking`
--

-- --------------------------------------------------------

--
-- Table structure for table `leases`
--

CREATE TABLE IF NOT EXISTS `leases` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL,
  `unit_id` int(11) NOT NULL,
  `rent_amount` float NOT NULL,
  `bond` float NOT NULL,
  `recurring` varchar(333) NOT NULL,
  `lease_start` date NOT NULL,
  `lease_end` date NOT NULL,
  `tenant_image` varchar(333) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(333) NOT NULL,
  `first_payment` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`unit_id`),
  KEY `unit_id` (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `user_id`, `unit_id`, `rent_amount`, `bond`, `recurring`, `lease_start`, `lease_end`, `tenant_image`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `first_payment`) VALUES
(3, NULL, 1, 599, 599, '', '2014-11-01', '2014-12-01', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '0000-00-00'),
(6, 1, 12, 400, 800, 'Weekly', '0000-00-00', '0000-00-00', '', '2014-12-01 10:07:54', '2014-12-01 10:07:54', '0000-00-00 00:00:00', '', '0000-00-00'),
(7, 12, 12, 250, 800, 'Monthly', '2015-01-01', '2015-01-31', '', '2014-12-01 10:11:21', '2014-12-03 11:55:34', '0000-00-00 00:00:00', '', '2014-12-01');

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE IF NOT EXISTS `replies` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `workorder_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `message` varchar(333) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(333) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `workorder_id` (`workorder_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `workorder_id`, `user_id`, `message`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 1, 2, 'thank you so much', '2014-11-17 23:37:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 2, 1, 'I will get right on it', '2014-11-17 23:37:36', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `units`
--

CREATE TABLE IF NOT EXISTS `units` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `street` varchar(333) NOT NULL,
  `apt_number` varchar(33) NOT NULL,
  `city` varchar(33) NOT NULL,
  `postal_code` varchar(33) NOT NULL,
  `extra_info` varchar(333) NOT NULL,
  `unit_type` varchar(333) NOT NULL,
  `bedrooms` varchar(33) NOT NULL,
  `bathrooms` varchar(33) NOT NULL,
  `square_meterage` varchar(33) NOT NULL,
  `emergency_contact` varchar(33) NOT NULL,
  `unit_owner` varchar(33) NOT NULL,
  `desired_rent` float NOT NULL,
  `bank_account` varchar(333) NOT NULL,
  `unit_image` varchar(333) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(333) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `street`, `apt_number`, `city`, `postal_code`, `extra_info`, `unit_type`, `bedrooms`, `bathrooms`, `square_meterage`, `emergency_contact`, `unit_owner`, `desired_rent`, `bank_account`, `unit_image`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 7, '33 Turner Street', '4B', 'Auckland', '1010', 'A great place!', '0', '4', '3', '1200', '021 555 6788', 'Bob Smith', 999, 'KIWI BANK 123 678', '55 fractal street.jpg', '0000-00-00 00:00:00', '2014-11-26 12:29:03', '0000-00-00 00:00:00', ''),
(8, 7, '55 test str', '', 'auck', '5656', '', '0', '', '', '', '', 'person', 0, '', '33 fractal street.jpg', '2014-11-25 11:48:24', '2014-11-26 11:59:22', '0000-00-00 00:00:00', ''),
(9, 7, '99 K Road', '', 'Auckland', '1212', '', '0', '', '', '', '', 'jack smith', 0, '', '21 fractal street.jpg', '2014-11-25 13:01:59', '2014-11-26 11:57:11', '0000-00-00 00:00:00', ''),
(10, 7, '99 Turner Street', '4A', 'Auckland', '5656', 'A home with a view!', '0', '2', '4', '988', '021 565 3434', 'Lauren Patra', 899, '56565 65656 73737', '56 fractal street.jpg', '2014-11-25 13:13:32', '2014-11-26 11:45:47', '0000-00-00 00:00:00', ''),
(11, 8, '56 fractal street', '', 'Berlin', '8889', 'Our house!', '0', '4', '2', '800', '888 88 888888', 'Gabriel', 699, '456363454353434', '56 fractal street.jpg', '2014-11-26 10:19:21', '2014-11-26 12:01:23', '0000-00-00 00:00:00', ''),
(12, 7, '21 jump street', '7B', 'auck', '1212', 'some info', 'House', '3', '2', '790', '032 678 9934', 'Jack A', 900, '456456 456 456 456 BANK B', '55 far str.jpg', '2014-11-30 10:19:32', '2014-11-30 10:22:25', '0000-00-00 00:00:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_name` varchar(33) NOT NULL,
  `password` varchar(333) NOT NULL,
  `first_name` varchar(33) NOT NULL,
  `last_name` varchar(33) NOT NULL,
  `email` varchar(72) NOT NULL,
  `phone` varchar(33) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(333) NOT NULL,
  `company_name` varchar(333) DEFAULT NULL,
  `manager` tinyint(4) NOT NULL DEFAULT '1',
  `tenant_image` varchar(333) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `company_name`, `manager`, `tenant_image`) VALUES
(1, 'admin', 'admin', 'matthew', 'youngleson', 'matsinyou@gmail.com', '021 262 6382', '2014-12-03 01:15:02', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'mdev', 1, 'Jellyfish.jpg'),
(2, 'tenant1', 'tenant1', 'Tenant', 'One', 't1@email.com', '021 222 4444', '2014-11-17 23:25:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, ''),
(7, 'bobsmith', '$2y$10$zNIsR9AEyVzIl8JcC7dsXeP08TJWuQBOiX7b/QBFMH9KKI0f18ZHa', 'bob', 'smith', 'email@email.email', '021 236 5656', '2014-12-07 23:36:06', '2014-12-07 10:36:06', '0000-00-00 00:00:00', '5Sxx7XZzLEXXzZupeEGyNgUh9RH57FNp2WwD4cXiYgQ20MpdCFPdAT7mlnrq', 'cc', 1, 'Jellyfish.jpg'),
(8, 'prometheus', '$2y$10$sCoiQL2K5fdL0dLq/LIcdedBjuv4Dc1qHo5igfu4HmKbTjXNfa.Ti', 'p', 'rising', 'p@rising.net', '09 4545 678', '2014-11-26 23:50:22', '2014-11-26 10:50:22', '0000-00-00 00:00:00', 'l8oiMy8st5G7zDsYf9YtitQy4LGWkQVLUdOWzoNjBFLHh5OB1uuwnhD58WNM', 'proM', 1, ''),
(10, 'newtenant', '$2y$10$pNKW9FsOFnj6tLcZ.qtaDeEbg5Dljpo2D94.LU5aOZxd/SIM2wHkq', 'new', 'tenant', 'new@new.new', '2535454534', '2014-12-05 01:00:02', '2014-12-04 12:00:02', '0000-00-00 00:00:00', 'VmI6Zu1Cm6Qy1dZox7rYSqGYuBSo4vEJcRRgx7NjcWu7ncVqgTHuJ5jnV7yf', '', 1, '2014_12_05_00_57_08Penguins.jpg'),
(11, 'tenant2', '$2y$10$/d8tyzU7uy0iHnRcAjGz7.Pj1vVMiEJwfW9Gb/d7weYolFsEwiUiC', 'tenant', 'two', 't2@t2.t2', '324234234666', '2014-12-07 10:26:12', '2014-12-07 10:26:12', '0000-00-00 00:00:00', '', NULL, 1, '2014_12_07_23_26_12Jellyfish.jpg'),
(12, 'tenant3', '$2y$10$LAIgNpBOnRWJze8VcwNymOQkKvYeh3c6q5sOeM.Ma/P.PkGMdo9cO', 'tenant', 'three', 't3@t3.t3', '3453457457 5475', '2014-12-07 23:37:32', '2014-12-07 10:37:32', '0000-00-00 00:00:00', 'Kpu4zhDCP13FIkZ0Y2UC3tQL237FvT6TXl1DKhGtEKgMWi2uMi8ihKrgYAcT', NULL, 0, '2014_12_07_23_35_30Chrysanthemum.jpg'),
(13, 'terminator4', '$2y$10$wY3B3L8Fs6hj0eU6XA8sCu7utupMlWmhLOkjooN.uuqWN0NxPEHVm', 'terminator', 'four', 't4@t4.t4', '435345346567', '2014-12-07 10:51:52', '2014-12-07 10:51:52', '0000-00-00 00:00:00', '', NULL, 0, '2014_12_07_23_51_52Koala.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `workorders`
--

CREATE TABLE IF NOT EXISTS `workorders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `unit_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `description` varchar(2000) NOT NULL,
  `priority` varchar(33) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remembe_token` varchar(333) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `unit_id` (`unit_id`,`user_id`),
  KEY `user_id` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `workorders`
--

INSERT INTO `workorders` (`id`, `unit_id`, `user_id`, `description`, `priority`, `created_at`, `updated_at`, `deleted_at`, `remembe_token`) VALUES
(1, 1, 1, 'There is a massive flood in the bathroom! Must Fix!', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', ''),
(2, 1, 2, 'There are rats in the house, help', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `leases`
--
ALTER TABLE `leases`
  ADD CONSTRAINT `leases_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `leases_ibfk_2` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`);

--
-- Constraints for table `replies`
--
ALTER TABLE `replies`
  ADD CONSTRAINT `replies_ibfk_1` FOREIGN KEY (`workorder_id`) REFERENCES `workorders` (`id`),
  ADD CONSTRAINT `replies_ibfk_3` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `units`
--
ALTER TABLE `units`
  ADD CONSTRAINT `units_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `workorders`
--
ALTER TABLE `workorders`
  ADD CONSTRAINT `workorders_ibfk_1` FOREIGN KEY (`unit_id`) REFERENCES `units` (`id`),
  ADD CONSTRAINT `workorders_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
