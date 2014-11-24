-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2014 at 03:07 AM
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
  `recurring` varchar(33) NOT NULL,
  `lease_start` date NOT NULL,
  `lease_end` date NOT NULL,
  `tenant_image` varchar(333) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `remember_token` varchar(333) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`,`unit_id`),
  KEY `unit_id` (`unit_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `leases`
--

INSERT INTO `leases` (`id`, `user_id`, `unit_id`, `rent_amount`, `bond`, `recurring`, `lease_start`, `lease_end`, `tenant_image`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(3, NULL, 1, 599, 599, '', '2014-11-01', '2014-12-01', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `units`
--

INSERT INTO `units` (`id`, `user_id`, `street`, `apt_number`, `city`, `postal_code`, `extra_info`, `unit_type`, `bedrooms`, `bathrooms`, `square_meterage`, `emergency_contact`, `unit_owner`, `desired_rent`, `bank_account`, `unit_image`, `created_at`, `updated_at`, `deleted_at`, `remember_token`) VALUES
(1, 1, '21 Turner Street', '', 'Auckland', '1010', 'A great place!', '', '3', '2', '789', '021 555 6788', 'Bob Smith', 499, 'KIWI BANK 123 678', '', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '');

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
  `company_name` varchar(333) NOT NULL,
  `manager` tinyint(4) NOT NULL DEFAULT '1',
  `tenant_image` varchar(333) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `user_name` (`user_name`,`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `user_name`, `password`, `first_name`, `last_name`, `email`, `phone`, `created_at`, `updated_at`, `deleted_at`, `remember_token`, `company_name`, `manager`, `tenant_image`) VALUES
(1, 'admin', 'admin', 'matthew', 'youngleson', 'matsinyou@gmail.com', '021 262 6382', '2014-11-17 23:05:57', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', 'mdev', 1, ''),
(2, 'tenant1', 'tenant1', 'Tenant', 'One', 't1@email.com', '021 222 4444', '2014-11-17 23:25:59', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '', '', 0, ''),
(7, 'bobsmith', '$2y$10$zNIsR9AEyVzIl8JcC7dsXeP08TJWuQBOiX7b/QBFMH9KKI0f18ZHa', 'bob', 'smith', 'email@email.email', '223525234234', '2014-11-24 01:49:47', '2014-11-23 12:49:47', '0000-00-00 00:00:00', 'QxzDmfAl2yX1s4FEGm4iN8fEf4XeQH4g5LJGBydP8PjqJUtq9A4sTPDhi01p', 'cc', 1, '');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

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
