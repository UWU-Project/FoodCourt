-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2022 at 08:30 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ofc`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(45) NOT NULL,
  `username` varchar(45) NOT NULL,
  `password` varchar(45) NOT NULL,
  `f_name` varchar(50) NOT NULL,
  `l_name` varchar(50) NOT NULL,
  `mob_number` int(20) NOT NULL,
  `email` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `username`, `password`, `f_name`, `l_name`, `mob_number`, `email`, `code`, `status`) VALUES
(1, 'admin', '12345', 'Akila', 'Pramod', 714064114, 'manager.orchidbliss.lk@gmail.com', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `billing_details`
--

CREATE TABLE `billing_details` (
  `billing_id` int(10) NOT NULL,
  `member_id` int(15) NOT NULL,
  `Street_Address` varchar(100) NOT NULL,
  `P_O_Box_No` varchar(15) NOT NULL,
  `City` text NOT NULL,
  `Mobile_No` varchar(15) NOT NULL,
  `Landline_No` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `billing_details`
--

INSERT INTO `billing_details` (`billing_id`, `member_id`, `Street_Address`, `P_O_Box_No`, `City`, `Mobile_No`, `Landline_No`) VALUES
(1, 17, 'Henegedara', '35/5,', 'Maharagama', '0714064114', '0112847545'),
(2, 16, '35/5, Henegedara Road, Maharagama', '123', 'freveverververerverv', '0714064114', 'd21321312312'),
(3, 17, 'Henegedara Taukanda', '35/5,', 'Maharagama', '0714064114', '0112847545'),
(5, 17, 'Henegedara Taukanda', '35/5,', 'Maharagama', '0714064114', '721572712'),
(6, 15, 'Duck Street', '65/2', 'Pentagon', '071452358', '0154789'),
(7, 18, 'walsmulla', '123', 'matara', '1234567', '123'),
(8, 15, 'duc gedara road', '65/2', 'maharagama', '0714064235', ''),
(9, 23, 'tuckplace', '54/3', 'tuckworld', '0714064114', ''),
(10, 29, 'Maharagama', '23/4', 'tuckworld', '0714064114', '0714065'),
(11, 29, 'maharagama', '123', 'awsd', '02124', '0240404'),
(12, 41, 'erw', '32', 'erw', '123', '4242'),
(14, 42, 'ddgdg', '23', 'rtggd', '2345', '342353'),
(15, 44, 'Galkissa Road', '95/14', 'Mount Lavinia', '0714065231', '0115896472'),
(16, 45, 'Matara Road', '23/4', 'Kalmunai', '0714236589', ''),
(17, 29, 'adada', '213', 'fesfesf', '21321431', '21431432'),
(18, 46, 'sdgsdg', 'fsf', 'dfgdgd', '01234567891', '01234567890');

-- --------------------------------------------------------

--
-- Table structure for table `cart_details`
--

CREATE TABLE `cart_details` (
  `cart_id` int(15) NOT NULL,
  `member_id` int(15) NOT NULL,
  `lt` varchar(10) NOT NULL,
  `food_id` int(15) NOT NULL,
  `quantity_id` int(15) NOT NULL,
  `total` float NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_details`
--

INSERT INTO `cart_details` (`cart_id`, `member_id`, `lt`, `food_id`, `quantity_id`, `total`, `flag`) VALUES
(12, 7, 'food', 24, 1, 100, 1),
(16, 14, 'food', 12, 1, 12000, 0),
(17, 14, 'food', 13, 1, 10000, 0),
(18, 14, 'food', 14, 1, 2600, 0),
(19, 14, 'food', 14, 1, 2600, 0),
(25, 14, 'food', 12, 1, 12000, 0),
(30, 14, 'food', 12, 1, 12000, 0),
(38, 16, 'food', 12, 1, 12000, 1),
(47, 16, 'food', 12, 1, 12000, 1),
(51, 16, 'food', 12, 1, 12000, 1),
(52, 16, 'food', 1, 1, 1600, 0),
(53, 16, 'food', 3, 1, 1400, 0),
(68, 17, 'food', 12, 1, 12000, 1),
(69, 17, 'food', 2, 1, 6000, 1),
(71, 17, 'food', 12, 1, 12000, 1),
(72, 17, 'food', 13, 1, 10000, 1),
(73, 17, 'food', 3, 1, 1400, 1),
(74, 17, 'food', 2, 1, 6000, 1),
(75, 17, 'food', 14, 1, 2600, 1),
(76, 17, 'food', 13, 1, 10000, 1),
(86, 17, 'food', 12, 1, 12000, 1),
(87, 17, 'food', 13, 1, 10000, 1),
(88, 17, 'food', 14, 1, 2600, 1),
(90, 17, 'food', 2, 1, 6000, 1),
(92, 16, 'food', 12, 1, 12000, 1),
(93, 16, 'food', 13, 1, 10000, 0),
(94, 17, 'food', 13, 2, 12500, 1),
(96, 17, 'food', 13, 2, 12500, 1),
(97, 17, 'food', 2, 2, 0, 1),
(98, 17, 'food', 1, 1, 1600, 1),
(99, 17, 'food', 13, 1, 2500, 1),
(100, 15, 'food', 12, 1, 3000, 1),
(101, 15, 'food', 13, 1, 2500, 1),
(102, 15, 'food', 14, 1, 650, 1),
(103, 15, 'food', 13, 1, 2500, 1),
(104, 15, 'food', 14, 1, 650, 1),
(105, 15, 'food', 1, 1, 400, 1),
(106, 15, 'food', 2, 1, 1500, 1),
(107, 15, 'food', 3, 1, 350, 1),
(108, 15, 'food', 1, 1, 400, 1),
(109, 15, 'food', 2, 1, 1500, 1),
(116, 15, 'food', 14, 1, 650, 1),
(118, 15, 'food', 12, 1, 3000, 1),
(119, 15, 'food', 12, 1, 3000, 1),
(120, 15, 'food', 12, 1, 3000, 1),
(122, 15, 'food', 12, 1, 3000, 1),
(123, 15, 'food', 13, 1, 2500, 1),
(130, 18, 'food', 12, 1, 3000, 1),
(131, 18, 'food', 14, 1, 650, 1),
(132, 18, 'food', 13, 1, 2500, 1),
(133, 18, 'food', 13, 1, 2500, 1),
(134, 18, 'food', 14, 1, 650, 1),
(135, 18, 'food', 12, 1, 3000, 1),
(136, 18, 'food', 13, 1, 2500, 1),
(137, 18, 'food', 14, 1, 650, 1),
(138, 18, 'food', 12, 1, 3000, 1),
(139, 18, 'food', 12, 1, 3000, 1),
(140, 18, 'food', 13, 1, 2500, 1),
(141, 18, 'food', 14, 1, 650, 1),
(142, 18, 'food', 12, 1, 3000, 1),
(143, 18, 'food', 13, 1, 2500, 1),
(144, 18, 'food', 14, 1, 650, 1),
(145, 15, 'food', 1, 1, 400, 1),
(146, 15, 'food', 2, 1, 1500, 1),
(147, 15, 'food', 3, 1, 350, 1),
(148, 15, 'food', 2, 1, 1500, 1),
(149, 15, 'food', 3, 1, 350, 1),
(150, 15, 'food', 1, 1, 400, 1),
(151, 15, 'food', 2, 1, 1500, 1),
(152, 15, 'food', 1, 1, 400, 1),
(153, 15, 'food', 12, 1, 3000, 1),
(154, 15, 'food', 13, 1, 2500, 1),
(155, 15, 'food', 13, 1, 2500, 1),
(156, 15, 'food', 14, 1, 650, 1),
(157, 15, 'food', 12, 1, 3000, 1),
(158, 15, 'food', 1, 1, 400, 1),
(159, 15, 'food', 2, 1, 1500, 1),
(160, 15, 'food', 3, 1, 350, 1),
(161, 15, 'food', 12, 1, 3000, 1),
(162, 15, 'food', 13, 1, 2500, 1),
(163, 15, 'food', 14, 1, 650, 1),
(164, 15, 'food', 12, 1, 3000, 1),
(165, 15, 'food', 13, 1, 2500, 1),
(166, 15, 'food', 14, 1, 650, 1),
(167, 15, 'food', 13, 1, 2500, 1),
(168, 15, 'food', 14, 1, 650, 1),
(169, 15, 'food', 12, 1, 3000, 1),
(172, 15, 'food', 13, 1, 2500, 1),
(173, 15, 'food', 12, 1, 3000, 1),
(174, 15, 'food', 14, 1, 650, 1),
(178, 15, 'food', 12, 1, 3000, 1),
(179, 15, 'food', 13, 1, 2500, 1),
(180, 15, 'food', 14, 1, 650, 1),
(181, 15, 'food', 12, 1, 3000, 1),
(182, 15, 'food', 13, 1, 2500, 1),
(183, 15, 'food', 14, 1, 650, 1),
(184, 15, 'food', 12, 1, 3000, 1),
(185, 15, 'food', 14, 1, 650, 1),
(186, 15, 'food', 12, 1, 3000, 1),
(187, 15, 'food', 13, 1, 2500, 1),
(188, 15, 'food', 14, 1, 650, 1),
(189, 15, 'food', 12, 1, 3000, 1),
(190, 15, 'food', 13, 1, 2500, 1),
(191, 15, 'food', 14, 1, 650, 1),
(192, 15, 'food', 12, 1, 3000, 1),
(193, 15, 'food', 13, 1, 2500, 1),
(194, 15, 'food', 14, 1, 650, 1),
(195, 15, 'food', 12, 1, 3000, 1),
(196, 15, 'food', 13, 1, 2500, 1),
(197, 15, 'food', 14, 1, 650, 1),
(198, 15, 'food', 12, 1, 3000, 1),
(199, 15, 'food', 13, 1, 2500, 1),
(200, 15, 'food', 14, 1, 650, 1),
(201, 15, 'food', 12, 1, 3000, 1),
(202, 15, 'food', 13, 1, 2500, 1),
(203, 15, 'food', 14, 1, 650, 1),
(204, 15, 'food', 12, 1, 3000, 1),
(205, 15, 'food', 13, 1, 2500, 1),
(206, 15, 'food', 14, 1, 650, 1),
(207, 15, 'food', 12, 1, 3000, 1),
(208, 15, 'food', 13, 1, 2500, 1),
(209, 15, 'food', 25001, 1, 400, 1),
(210, 15, 'food', 25002, 1, 1500, 1),
(211, 15, 'food', 12, 1, 3000, 1),
(212, 15, 'food', 13, 1, 2500, 1),
(213, 15, 'food', 14, 1, 650, 1),
(214, 15, 'food', 25003, 1, 350, 1),
(215, 15, 'food', 25002, 1, 1500, 1),
(216, 15, 'food', 25001, 1, 400, 1),
(217, 15, 'food', 25004, 1, 500, 1),
(218, 15, 'food', 12, 1, 3000, 1),
(219, 15, 'food', 25002, 1, 1500, 1),
(220, 15, 'food', 12, 1, 3000, 1),
(221, 15, 'food', 13, 1, 2500, 1),
(222, 15, 'food', 25002, 1, 1500, 1),
(223, 15, 'food', 25003, 1, 350, 1),
(224, 15, 'food', 12, 1, 3000, 1),
(225, 15, 'food', 13, 1, 2500, 1),
(226, 15, 'food', 12, 1, 3000, 1),
(227, 15, 'food', 13, 1, 2500, 1),
(228, 15, 'food', 13, 1, 2500, 1),
(229, 15, 'food', 12, 1, 3000, 1),
(230, 15, 'food', 12, 1, 3000, 1),
(231, 15, 'food', 13, 1, 2500, 1),
(232, 15, 'food', 14, 1, 650, 1),
(233, 15, 'food', 25001, 1, 400, 1),
(234, 15, 'food', 25002, 1, 1500, 1),
(235, 15, 'food', 25003, 1, 350, 1),
(236, 15, 'food', 12, 1, 3000, 1),
(237, 15, 'food', 13, 1, 2500, 1),
(238, 15, 'food', 14, 1, 650, 1),
(239, 15, 'food', 12, 1, 3000, 1),
(240, 15, 'food', 13, 1, 2500, 1),
(241, 15, 'food', 14, 1, 650, 1),
(242, 15, 'food', 25001, 1, 400, 1),
(243, 15, 'food', 12, 1, 3000, 1),
(244, 15, 'food', 14, 1, 650, 1),
(245, 15, 'food', 12, 1, 3000, 1),
(246, 15, 'food', 13, 1, 2500, 1),
(247, 15, 'food', 12, 1, 3000, 1),
(248, 15, 'food', 13, 1, 2500, 1),
(249, 15, 'food', 12, 1, 3000, 1),
(250, 15, 'food', 13, 2, 5000, 1),
(251, 15, 'food', 14, 1, 650, 1),
(252, 15, 'food', 25001, 1, 400, 1),
(253, 15, 'food', 25002, 1, 1500, 1),
(254, 15, 'food', 25003, 1, 350, 1),
(255, 15, 'food', 12, 1, 3000, 1),
(256, 15, 'food', 13, 1, 2500, 1),
(260, 23, 'food', 12, 1, 3000, 1),
(261, 23, 'food', 13, 1, 2500, 1),
(262, 29, 'food', 12, 1, 3000, 1),
(263, 29, 'food', 13, 1, 2500, 1),
(264, 29, 'food', 12, 1, 3000, 1),
(265, 29, 'food', 13, 1, 2500, 1),
(266, 29, 'food', 13, 1, 2500, 1),
(267, 29, 'food', 14, 1, 650, 1),
(268, 29, 'food', 12, 1, 3000, 1),
(269, 29, 'food', 25001, 1, 400, 1),
(270, 29, 'food', 25002, 1, 1500, 1),
(271, 29, 'food', 13, 1, 2500, 1),
(272, 29, 'food', 14, 1, 650, 1),
(273, 41, 'food', 12, 1, 3000, 1),
(274, 41, 'food', 13, 1, 2500, 1),
(275, 41, 'food', 12, 1, 3000, 1),
(276, 41, 'food', 13, 1, 2500, 1),
(277, 41, 'food', 25001, 1, 400, 1),
(278, 41, 'food', 25002, 1, 1500, 1),
(279, 41, 'food', 12, 2, 6000, 1),
(280, 41, 'food', 13, 1, 2500, 1),
(281, 41, 'food', 12, 1, 3000, 1),
(282, 41, 'food', 13, 2, 5000, 1),
(284, 41, 'food', 14, 1, 650, 1),
(285, 41, 'food', 12, 1, 3000, 1),
(286, 41, 'food', 13, 1, 2500, 1),
(287, 41, 'food', 25001, 1, 400, 1),
(288, 41, 'food', 12, 1, 3000, 1),
(289, 41, 'food', 13, 1, 2500, 1),
(290, 41, 'food', 25003, 1, 350, 1),
(291, 41, 'food', 25002, 1, 1500, 1),
(292, 41, 'food', 13, 1, 2500, 1),
(293, 41, 'food', 14, 1, 650, 1),
(294, 41, 'food', 25001, 1, 400, 1),
(295, 41, 'food', 25002, 1, 1500, 1),
(296, 41, 'food', 12, 1, 3000, 1),
(297, 41, 'food', 13, 1, 2500, 1),
(298, 41, 'food', 12, 1, 3000, 1),
(299, 41, 'food', 25001, 1, 400, 1),
(300, 41, 'food', 25002, 1, 1500, 1),
(301, 41, 'food', 12, 2, 6000, 1),
(302, 41, 'food', 13, 1, 2500, 1),
(303, 1, 'food', 12, 2, 6000, 0),
(304, 1, 'food', 13, 2, 5000, 0),
(305, 41, 'food', 12, 2, 6000, 1),
(307, 41, 'food', 25001, 1, 400, 1),
(308, 41, 'food', 25002, 1, 1500, 1),
(309, 41, 'food', 13, 1, 2500, 1),
(310, 41, 'food', 12, 1, 3000, 1),
(311, 41, 'food', 12, 1, 3000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `currencies`
--

CREATE TABLE `currencies` (
  `currency_id` int(5) NOT NULL,
  `currency_symbol` varchar(15) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `currencies`
--

INSERT INTO `currencies` (`currency_id`, `currency_symbol`, `flag`) VALUES
(1, 'Rs.', 0),
(2, 'LKR', 1),
(4, 'Rupees', 0);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `member_id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `question_id` int(5) NOT NULL,
  `answer` varchar(45) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`member_id`, `firstname`, `lastname`, `email`, `password`, `question_id`, `answer`, `code`, `status`) VALUES
(1, 'dileesha', 'weliwaththa', 'dkhultraone2@gmail.com', '827ccb0eea8a706c4c34a16891f84e7b', 2, '06d80eb0c50b49a509b49f2424e8c805', 0, '0'),
(32, 'Dileesha', 'Weliwaththa', 'cst18051@std.uwu.ac.lk', '$2y$10$GSu6cvbSNsf2IidM9Fcdi.cGEAgodkpqMu0TMCeWs5RiRC0gAxLoO', 0, '', 0, 'verified'),
(38, 'qwas', 'qwas', 'qwas@gmail.com', '$2y$10$DhshMl40T10/10vJUoUy8eg7K/rgscf4n6Tnqj4c2mmvbVLJll89O', 0, '', 0, 'verified'),
(39, 'ffdfgdf', 'dfgdfgd', 'dfgdfgd@gmail.com', '$2y$10$n4UY6OQ5VzN5NF7N2GBtdOgc4PybJOvh98UIe.riT8vlizvyPdYwy', 0, '', 0, 'verified'),
(41, 'Krishna', 'sdaw', 'a@gmail.com', '$2y$10$XoPbJ0oD5.tS0/mWqAxf7OL4/Zxe7pir0HGeaw9LQD/go2vcJ7Bwi', 0, '', 0, 'verified'),
(42, 'sfssf', 'fsefegsg', 'b@gmail.com', '$2y$10$ICL01HhMLoHF05.wnhO7heM5LkAqmeXyBXQS3SPm6pCV25Nb83v92', 0, '', 0, 'verified'),
(43, 'Dog', 'Bark', 'c@gmail.com', '$2y$10$4PJxTqpJFCE9XCwLrPZR7.9NSZr5G/nhxJKJ363HwInJa8YmeBPv6', 0, '', 0, 'verified'),
(44, 'Akila', 'Pramod', 'akilapramod96@gmail.com', '$2y$10$Gx8TJBPYYUkcR5FXZ8dfAej8R3H6F1rZdN26NSsF.gPAkU5tqgvJy', 0, '', 0, 'verified'),
(46, 'fesfs', 'fsefs', 'wdedweliwaththa@gmail.com', '$2y$10$uUj4ZHYFxqYuCHFPtg3/K.RQZJNGQFnHiJiOamHsi0mhs510/YEMq', 0, '', 0, 'verified');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories`
--

CREATE TABLE `food_categories` (
  `category_id` int(15) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_categories`
--

INSERT INTO `food_categories` (`category_id`, `category_name`) VALUES
(7, 'Cakes'),
(8, 'Pastry'),
(10, 'Bakes');

-- --------------------------------------------------------

--
-- Table structure for table `food_categories_lounge`
--

CREATE TABLE `food_categories_lounge` (
  `category_id` int(15) NOT NULL,
  `category_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_categories_lounge`
--

INSERT INTO `food_categories_lounge` (`category_id`, `category_name`) VALUES
(1, 'Rice Varieties'),
(2, 'Koththu Varieties'),
(220, 'pastry');

-- --------------------------------------------------------

--
-- Table structure for table `food_details`
--

CREATE TABLE `food_details` (
  `food_id` int(15) NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_description` text NOT NULL,
  `food_price` float NOT NULL,
  `food_photo` text NOT NULL,
  `food_category` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_details`
--

INSERT INTO `food_details` (`food_id`, `food_name`, `food_description`, `food_price`, `food_photo`, `food_category`) VALUES
(4, 'Lasagna', 'Healthy Diet Food', 450, 'category-image-2.jpg', 2),
(5, 'Pasta', 'Healthy diet food', 1234, 'blog-1.jpg', 4),
(8, 'Beef', 'Smoked Beef Portion', 600, 'category-image-1.jpg', 1),
(10, 'Pasta', 'Healthy Pasta Portion', 400, 'product-image.jpg', 2),
(12, 'Fruit Gateu', 'White sponge soaked in orange syrup, filled with fresh seasonal fruits and topped with Chantilly cream', 3000, 'cake3.jpg', 7),
(13, 'Gateu', 'Chocolate gateau – a sinfully delicious chocolate cake layered with a chocolate-heavy cream filling.', 2500, 'cake1.jpg', 7),
(14, 'Burger', 'The Beef, Cheese and Egg Burger', 650, 'food1.jpg', 8),
(24, 'pizza', 'eddsfs', 500, 'WhatsApp Image 2021-08-25 at 11.48.32.jpeg', 7);

-- --------------------------------------------------------

--
-- Table structure for table `food_details_lounge`
--

CREATE TABLE `food_details_lounge` (
  `food_id` int(15) NOT NULL,
  `food_name` varchar(45) NOT NULL,
  `food_description` text NOT NULL,
  `food_price` float NOT NULL,
  `food_photo` text NOT NULL,
  `food_category` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `food_details_lounge`
--

INSERT INTO `food_details_lounge` (`food_id`, `food_name`, `food_description`, `food_price`, `food_photo`, `food_category`) VALUES
(25001, 'Biryani', 'Indian Style Biryani with egg', 400, 'b3.jpg', 1),
(25002, 'Sawan', 'For 8 Person', 1500, 'b2.jpg', 1),
(25003, 'Cheesy', 'Fish Koththu', 350, 'b1.jpg', 2),
(25004, 'Fried Rice', 'For 2 Persons', 500, '2ee511b4-3d7d-43ef-bc33-e1a5c52d6146_data_processing_steps.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `orders_details`
--

CREATE TABLE `orders_details` (
  `order_id` int(10) NOT NULL,
  `member_id` int(10) NOT NULL,
  `billing_id` int(10) NOT NULL,
  `cart_id` int(15) NOT NULL,
  `delivery_date` date NOT NULL,
  `StaffID` int(15) NOT NULL,
  `flag` int(1) NOT NULL,
  `time_stamp` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_details`
--

INSERT INTO `orders_details` (`order_id`, `member_id`, `billing_id`, `cart_id`, `delivery_date`, `StaffID`, `flag`, `time_stamp`) VALUES
(3, 17, 1, 71, '2021-07-13', 1, 1, '10:02:48'),
(5, 17, 1, 75, '2021-07-13', 14, 1, '10:07:20'),
(6, 17, 1, 76, '2021-07-13', 1, 1, '10:07:44'),
(7, 17, 1, 77, '2021-07-13', 15, 1, '14:02:47'),
(8, 17, 1, 73, '2021-07-13', 4, 0, '16:10:44'),
(9, 17, 1, 74, '2021-07-13', 14, 1, '16:11:33'),
(10, 17, 1, 78, '2021-07-13', 4, 0, '17:17:17'),
(11, 17, 1, 79, '2021-07-13', 4, 0, '20:36:44'),
(12, 17, 1, 80, '2021-07-13', 17, 1, '20:36:57'),
(13, 17, 1, 81, '2021-07-13', 16, 1, '20:49:13'),
(14, 17, 1, 82, '2021-07-13', 4, 0, '20:50:29'),
(15, 17, 1, 86, '2021-07-13', 4, 0, '20:51:57'),
(16, 17, 1, 87, '2021-07-13', 4, 0, '20:52:27'),
(17, 16, 2, 38, '2021-07-13', 4, 0, '20:58:04'),
(18, 16, 2, 47, '2021-07-13', 4, 0, '20:58:12'),
(19, 16, 2, 51, '2021-07-13', 4, 0, '20:59:53'),
(20, 16, 2, 92, '2021-07-13', 4, 0, '21:00:05'),
(21, 17, 1, 90, '2021-07-13', 4, 0, '21:04:16'),
(22, 17, 1, 88, '2021-07-13', 4, 0, '21:07:00'),
(23, 17, 1, 94, '2021-07-14', 4, 0, '08:22:43'),
(24, 17, 1, 96, '2021-07-14', 4, 0, '08:28:07'),
(25, 17, 1, 97, '2021-07-14', 4, 0, '08:28:20'),
(26, 17, 1, 98, '2021-07-14', 4, 0, '21:46:46'),
(30, 17, 1, 99, '2021-07-15', 4, 0, '06:12:28'),
(31, 15, 6, 100, '2021-07-15', 4, 0, '06:37:30'),
(32, 15, 6, 101, '2021-07-15', 4, 0, '06:50:18'),
(33, 15, 6, 102, '2021-07-15', 4, 0, '08:45:58'),
(34, 15, 6, 103, '2021-07-15', 4, 0, '08:48:28'),
(35, 15, 6, 104, '2021-07-15', 4, 0, '08:56:23'),
(36, 15, 6, 105, '2021-07-15', 4, 0, '09:10:39'),
(37, 15, 6, 106, '2021-07-15', 4, 0, '09:12:33'),
(38, 15, 6, 107, '2021-07-15', 4, 0, '09:21:54'),
(39, 15, 6, 108, '2021-07-15', 4, 0, '09:23:24'),
(40, 15, 6, 109, '2021-07-15', 4, 0, '09:25:36'),
(41, 15, 6, 116, '2021-07-15', 4, 0, '15:20:04'),
(42, 15, 6, 118, '2021-07-15', 4, 0, '15:58:04'),
(43, 15, 6, 119, '2021-07-17', 4, 0, '07:21:59'),
(44, 15, 6, 120, '2021-07-17', 4, 0, '08:41:05'),
(45, 15, 6, 122, '2021-07-17', 4, 0, '08:43:46'),
(46, 15, 6, 123, '2021-07-17', 4, 0, '08:44:19'),
(47, 15, 6, 124125126, '2021-07-17', 4, 0, '08:45:43'),
(48, 15, 6, 124125126, '2021-07-17', 4, 0, '08:45:44'),
(49, 15, 6, 124125126, '2021-07-17', 4, 0, '08:45:45'),
(50, 15, 6, 124125126, '2021-07-17', 4, 0, '08:45:46'),
(51, 15, 6, 124125126, '2021-07-17', 4, 0, '08:45:46'),
(52, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:28'),
(53, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:30'),
(54, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:31'),
(55, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:31'),
(56, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:33'),
(57, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:34'),
(58, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:35'),
(59, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:35'),
(60, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:35'),
(61, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:36'),
(62, 15, 6, 124125126, '2021-07-17', 4, 0, '08:46:53'),
(63, 15, 6, 2147483647, '2021-07-17', 4, 0, '08:47:13'),
(64, 15, 6, 2147483647, '2021-07-17', 4, 0, '08:47:14'),
(65, 15, 6, 2147483647, '2021-07-17', 4, 0, '08:47:15'),
(66, 15, 6, 2147483647, '2021-07-17', 4, 0, '08:47:15'),
(67, 15, 6, 2147483647, '2021-07-17', 4, 0, '08:47:26'),
(68, 15, 6, 2147483647, '2021-07-17', 4, 0, '08:47:27'),
(69, 18, 7, 130, '2021-07-17', 4, 0, '09:14:03'),
(70, 18, 7, 131, '2021-07-17', 4, 0, '09:15:35'),
(71, 18, 7, 0, '2021-07-17', 4, 0, '09:44:18'),
(72, 18, 7, 0, '2021-07-17', 4, 0, '09:44:57'),
(73, 18, 7, 0, '2021-07-17', 4, 0, '09:46:10'),
(74, 18, 7, 0, '2021-07-17', 4, 0, '09:46:57'),
(75, 18, 7, 0, '2021-07-17', 4, 0, '09:47:44'),
(76, 18, 7, 0, '2021-07-17', 4, 0, '09:49:05'),
(77, 18, 7, 0, '2021-07-17', 4, 0, '09:49:41'),
(78, 18, 7, 132133134, '2021-07-17', 4, 0, '09:56:14'),
(79, 18, 7, 132, '2021-07-17', 4, 0, '09:57:49'),
(80, 18, 7, 133, '2021-07-17', 4, 0, '10:07:48'),
(81, 18, 7, 134, '2021-07-17', 4, 0, '10:07:48'),
(83, 18, 7, 135, '2021-07-17', 4, 0, '10:09:42'),
(84, 18, 7, 136, '2021-07-17', 4, 0, '10:09:42'),
(85, 18, 7, 137, '2021-07-17', 4, 0, '10:09:42'),
(86, 18, 7, 138, '2021-07-17', 4, 0, '10:09:42'),
(87, 18, 7, 0, '2021-07-17', 4, 0, '10:09:42'),
(88, 18, 7, 139, '2021-07-17', 4, 0, '10:16:40'),
(89, 18, 7, 140, '2021-07-17', 4, 0, '10:16:40'),
(90, 18, 7, 141, '2021-07-17', 4, 0, '10:16:40'),
(91, 18, 7, 0, '2021-07-17', 4, 0, '10:16:40'),
(92, 18, 7, 142, '2021-07-17', 4, 0, '10:18:40'),
(93, 18, 7, 143, '2021-07-17', 4, 0, '10:18:40'),
(94, 18, 7, 144, '2021-07-17', 4, 0, '10:18:40'),
(95, 15, 6, 145, '2021-07-17', 4, 0, '10:29:37'),
(96, 15, 6, 146, '2021-07-17', 4, 0, '10:29:37'),
(97, 15, 6, 147, '2021-07-17', 4, 0, '10:29:37'),
(98, 15, 6, 148, '2021-07-17', 4, 0, '14:11:00'),
(99, 15, 6, 149, '2021-07-17', 4, 0, '14:11:00'),
(100, 15, 6, 150, '2021-07-17', 4, 0, '14:11:00'),
(101, 15, 6, 151, '2021-07-17', 4, 0, '14:12:41'),
(102, 15, 6, 152, '2021-07-17', 4, 0, '14:12:41'),
(103, 15, 6, 153, '2021-07-18', 4, 0, '04:58:11'),
(104, 15, 6, 154, '2021-07-18', 4, 0, '11:06:46'),
(105, 15, 6, 155, '2021-07-18', 4, 0, '11:06:46'),
(106, 15, 6, 156, '2021-07-18', 4, 0, '11:06:46'),
(107, 15, 6, 157, '2021-07-18', 4, 0, '11:06:46'),
(108, 15, 6, 158, '2021-07-18', 4, 0, '11:06:46'),
(109, 15, 6, 159, '2021-07-18', 4, 0, '11:06:46'),
(110, 15, 6, 160, '2021-07-18', 4, 0, '11:06:46'),
(111, 15, 6, 0, '2021-07-18', 4, 0, '12:00:06'),
(112, 15, 6, 161, '2021-07-18', 4, 0, '14:04:13'),
(113, 15, 6, 162, '2021-07-18', 4, 0, '14:04:13'),
(114, 15, 6, 163, '2021-07-18', 4, 0, '14:04:13'),
(115, 15, 6, 0, '2021-07-18', 4, 0, '15:56:34'),
(116, 15, 6, 0, '2021-07-18', 4, 0, '15:57:17'),
(117, 15, 6, 164, '2021-07-18', 4, 0, '15:57:57'),
(118, 15, 6, 165, '2021-07-18', 4, 0, '15:57:57'),
(119, 15, 6, 166, '2021-07-18', 4, 0, '15:57:57'),
(120, 15, 6, 167, '2021-07-18', 4, 0, '16:09:29'),
(121, 15, 6, 168, '2021-07-18', 4, 0, '16:09:29'),
(122, 15, 6, 169, '2021-07-18', 4, 0, '16:09:29'),
(123, 15, 6, 172, '2021-07-18', 4, 0, '16:34:31'),
(124, 15, 6, 173, '2021-07-18', 4, 0, '16:34:31'),
(125, 15, 6, 174, '2021-07-18', 4, 0, '16:34:31'),
(126, 15, 6, 178, '2021-07-18', 4, 0, '16:54:51'),
(127, 15, 6, 179, '2021-07-18', 4, 0, '16:54:51'),
(128, 15, 6, 180, '2021-07-18', 4, 0, '16:54:51'),
(129, 15, 6, 181, '2021-07-18', 4, 0, '19:07:19'),
(130, 15, 6, 182, '2021-07-18', 4, 0, '19:07:19'),
(131, 15, 6, 183, '2021-07-18', 4, 0, '19:07:19'),
(132, 15, 6, 184, '2021-07-19', 4, 0, '04:03:10'),
(133, 15, 6, 185, '2021-07-19', 4, 0, '04:03:10'),
(134, 15, 6, 186, '2021-07-19', 4, 0, '04:03:10'),
(135, 15, 6, 187, '2021-07-19', 4, 0, '04:03:10'),
(136, 15, 6, 188, '2021-07-19', 4, 0, '04:03:10'),
(137, 15, 6, 189, '2021-07-19', 4, 0, '04:13:38'),
(138, 15, 6, 190, '2021-07-19', 4, 0, '04:13:38'),
(139, 15, 6, 191, '2021-07-19', 4, 0, '04:13:38'),
(140, 15, 6, 192, '2021-07-19', 4, 0, '04:13:38'),
(141, 15, 6, 193, '2021-07-19', 4, 0, '04:13:38'),
(142, 15, 6, 194, '2021-07-19', 4, 0, '04:13:38'),
(143, 15, 6, 189, '2021-07-19', 4, 0, '04:14:13'),
(144, 15, 6, 190, '2021-07-19', 4, 0, '04:14:13'),
(145, 15, 6, 191, '2021-07-19', 4, 0, '04:14:13'),
(146, 15, 6, 192, '2021-07-19', 4, 0, '04:14:13'),
(147, 15, 6, 193, '2021-07-19', 4, 0, '04:14:13'),
(148, 15, 6, 194, '2021-07-19', 4, 0, '04:14:13'),
(149, 15, 6, 189, '2021-07-19', 4, 0, '04:17:07'),
(150, 15, 6, 190, '2021-07-19', 4, 0, '04:17:07'),
(151, 15, 6, 191, '2021-07-19', 4, 0, '04:17:07'),
(152, 15, 6, 192, '2021-07-19', 4, 0, '04:17:07'),
(153, 15, 6, 193, '2021-07-19', 4, 0, '04:17:07'),
(154, 15, 6, 194, '2021-07-19', 4, 0, '04:17:07'),
(155, 15, 6, 189, '2021-07-19', 4, 0, '04:17:42'),
(156, 15, 6, 190, '2021-07-19', 4, 0, '04:17:42'),
(157, 15, 6, 191, '2021-07-19', 4, 0, '04:17:42'),
(158, 15, 6, 192, '2021-07-19', 4, 0, '04:17:42'),
(159, 15, 6, 193, '2021-07-19', 4, 0, '04:17:42'),
(160, 15, 6, 194, '2021-07-19', 4, 0, '04:17:42'),
(161, 15, 6, 195, '2021-07-19', 4, 0, '05:35:01'),
(162, 15, 6, 196, '2021-07-19', 4, 0, '05:35:01'),
(163, 15, 6, 197, '2021-07-19', 4, 0, '05:35:01'),
(164, 15, 6, 198, '2021-07-19', 4, 0, '06:08:02'),
(165, 15, 6, 199, '2021-07-19', 4, 0, '06:08:02'),
(166, 15, 6, 200, '2021-07-19', 4, 0, '06:08:02'),
(167, 15, 6, 201, '2021-07-19', 4, 0, '07:06:33'),
(168, 15, 6, 202, '2021-07-19', 4, 0, '07:06:33'),
(169, 15, 6, 203, '2021-07-19', 4, 0, '07:06:33'),
(170, 15, 6, 204, '2021-07-19', 4, 0, '08:42:55'),
(171, 15, 6, 205, '2021-07-19', 4, 0, '08:42:55'),
(172, 15, 6, 206, '2021-07-19', 4, 0, '08:42:55'),
(173, 15, 6, 207, '2021-07-19', 4, 0, '15:54:43'),
(174, 15, 6, 208, '2021-07-19', 4, 0, '15:54:43'),
(175, 15, 6, 209, '2021-07-19', 4, 0, '16:15:06'),
(176, 15, 6, 210, '2021-07-19', 4, 0, '16:15:06'),
(177, 15, 6, 211, '2021-07-20', 4, 0, '08:44:27'),
(178, 15, 6, 212, '2021-07-20', 4, 0, '08:44:27'),
(179, 15, 6, 213, '2021-07-20', 4, 0, '08:44:27'),
(180, 15, 6, 214, '2021-07-20', 4, 0, '08:44:27'),
(181, 15, 6, 215, '2021-07-20', 4, 0, '08:44:27'),
(182, 15, 6, 216, '2021-07-20', 4, 0, '08:44:27'),
(183, 15, 6, 217, '2021-07-20', 4, 0, '08:44:27'),
(184, 15, 6, 218, '2021-07-20', 4, 0, '18:49:54'),
(185, 15, 6, 220, '2021-07-20', 4, 0, '18:49:54'),
(186, 15, 6, 221, '2021-07-20', 4, 0, '18:49:54'),
(187, 15, 6, 219, '2021-07-20', 4, 0, '18:49:54'),
(188, 15, 6, 222, '2021-07-20', 4, 0, '18:49:54'),
(189, 15, 6, 223, '2021-07-20', 4, 0, '18:49:54'),
(190, 15, 6, 224, '2021-07-20', 4, 0, '19:27:50'),
(191, 15, 6, 225, '2021-07-20', 4, 0, '19:27:50'),
(192, 15, 6, 226, '2021-07-20', 4, 0, '19:27:50'),
(193, 15, 6, 227, '2021-07-20', 4, 0, '19:27:50'),
(194, 15, 6, 228, '2021-07-20', 4, 0, '19:39:04'),
(195, 15, 6, 229, '2021-07-20', 4, 0, '19:39:04'),
(196, 15, 6, 230, '2021-07-20', 4, 0, '19:39:18'),
(197, 15, 6, 231, '2021-07-20', 4, 0, '19:39:18'),
(198, 15, 6, 232, '2021-07-20', 4, 0, '19:39:18'),
(199, 15, 6, 236, '2021-07-20', 4, 0, '19:39:43'),
(200, 15, 6, 237, '2021-07-20', 4, 0, '19:39:43'),
(201, 15, 6, 238, '2021-07-20', 4, 0, '19:39:43'),
(202, 15, 6, 233, '2021-07-20', 4, 0, '19:39:43'),
(203, 15, 6, 234, '2021-07-20', 4, 0, '19:39:43'),
(204, 15, 6, 235, '2021-07-20', 4, 0, '19:39:43'),
(205, 15, 6, 239, '2021-07-20', 4, 0, '20:56:06'),
(206, 15, 6, 240, '2021-07-20', 4, 0, '20:56:06'),
(207, 15, 6, 241, '2021-07-20', 4, 0, '20:56:06'),
(208, 15, 6, 242, '2021-07-20', 4, 0, '20:56:06'),
(209, 15, 6, 243, '2021-07-20', 4, 0, '21:56:27'),
(210, 15, 6, 244, '2021-07-20', 4, 0, '21:56:27'),
(211, 15, 6, 245, '2021-07-20', 4, 0, '22:03:37'),
(212, 15, 6, 246, '2021-07-20', 4, 0, '22:03:37'),
(213, 15, 6, 247, '2021-07-20', 4, 0, '22:17:46'),
(214, 15, 6, 248, '2021-07-20', 4, 0, '22:17:46'),
(215, 15, 6, 249, '2021-07-21', 4, 0, '06:38:45'),
(216, 15, 6, 250, '2021-07-21', 4, 0, '06:38:45'),
(217, 15, 6, 251, '2021-07-21', 4, 0, '06:38:45'),
(218, 15, 6, 252, '2021-07-21', 4, 0, '06:38:45'),
(219, 15, 6, 253, '2021-07-21', 4, 0, '06:38:45'),
(220, 15, 6, 254, '2021-07-21', 4, 0, '06:38:45'),
(221, 15, 6, 255, '2021-07-21', 4, 0, '06:57:12'),
(222, 15, 6, 256, '2021-07-21', 4, 0, '06:57:12'),
(223, 23, 9, 260, '2021-07-25', 4, 0, '11:30:52'),
(224, 23, 9, 261, '2021-07-25', 4, 0, '11:30:52'),
(225, 29, 10, 262, '2021-07-25', 4, 0, '18:06:27'),
(226, 29, 10, 263, '2021-07-25', 4, 0, '18:06:27'),
(227, 29, 10, 264, '2021-07-25', 4, 0, '18:06:27'),
(228, 29, 10, 265, '2021-07-25', 4, 0, '18:06:27'),
(229, 29, 10, 266, '2021-07-25', 4, 0, '18:08:55'),
(230, 29, 10, 267, '2021-07-25', 4, 0, '18:08:55'),
(231, 29, 10, 268, '2021-07-25', 4, 0, '18:08:55'),
(232, 29, 10, 269, '2021-07-25', 4, 0, '18:08:55'),
(233, 29, 10, 270, '2021-07-25', 4, 0, '18:08:55'),
(234, 29, 10, 271, '2021-07-25', 4, 0, '19:38:25'),
(235, 29, 10, 272, '2021-07-25', 4, 0, '19:38:25'),
(236, 41, 12, 273, '2021-07-31', 4, 0, '07:27:35'),
(237, 41, 12, 274, '2021-07-31', 4, 0, '07:27:35'),
(238, 41, 12, 275, '2021-07-31', 4, 0, '16:21:03'),
(239, 41, 12, 276, '2021-07-31', 4, 0, '16:21:03'),
(240, 41, 12, 277, '2021-07-31', 4, 0, '16:21:03'),
(241, 41, 12, 278, '2021-07-31', 4, 0, '16:21:03'),
(242, 41, 12, 279, '2021-07-31', 4, 0, '16:43:17'),
(243, 41, 12, 280, '2021-07-31', 4, 0, '16:43:17'),
(244, 41, 12, 281, '2021-07-31', 4, 0, '16:54:31'),
(245, 41, 12, 282, '2021-07-31', 4, 0, '16:54:31'),
(246, 41, 12, 284, '2021-07-31', 4, 0, '17:08:28'),
(247, 41, 12, 285, '2021-07-31', 4, 0, '17:08:28'),
(248, 41, 12, 286, '2021-07-31', 4, 0, '17:08:28'),
(249, 41, 12, 287, '2021-07-31', 4, 0, '17:08:28'),
(250, 41, 12, 288, '2021-07-31', 4, 0, '17:14:55'),
(251, 41, 12, 289, '2021-07-31', 4, 0, '17:14:55'),
(252, 41, 12, 290, '2021-07-31', 4, 0, '17:14:55'),
(253, 41, 12, 291, '2021-07-31', 4, 0, '17:14:55'),
(254, 41, 12, 292, '2021-07-31', 4, 0, '17:21:19'),
(255, 41, 12, 293, '2021-07-31', 4, 0, '17:21:19'),
(256, 41, 12, 294, '2021-07-31', 4, 0, '17:21:19'),
(257, 41, 12, 295, '2021-07-31', 4, 0, '17:21:19'),
(258, 41, 12, 296, '2021-08-02', 4, 0, '14:23:36'),
(259, 41, 12, 297, '2021-08-02', 4, 0, '14:23:36'),
(260, 41, 12, 298, '2021-08-10', 4, 0, '18:39:41'),
(261, 41, 12, 299, '2021-08-10', 4, 0, '18:39:41'),
(262, 41, 12, 300, '2021-08-10', 4, 0, '18:39:41'),
(263, 41, 12, 301, '2021-08-24', 4, 0, '17:51:06'),
(264, 41, 12, 302, '2021-08-24', 4, 0, '17:51:06'),
(265, 41, 12, 305, '2021-08-24', 4, 0, '17:51:06'),
(266, 41, 12, 309, '2021-08-25', 4, 0, '07:29:11'),
(267, 41, 12, 310, '2021-08-25', 4, 0, '07:29:11'),
(268, 41, 12, 307, '2021-08-25', 4, 0, '07:29:11'),
(269, 41, 12, 308, '2021-08-25', 4, 0, '07:29:11');

-- --------------------------------------------------------

--
-- Table structure for table `orders_paid`
--

CREATE TABLE `orders_paid` (
  `ID` int(11) NOT NULL,
  `member_id` int(10) NOT NULL,
  `total` int(10) NOT NULL,
  `food_id` varchar(500) NOT NULL,
  `quantity` varchar(100) NOT NULL,
  `delivered` tinyint(1) NOT NULL DEFAULT 0,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `flag` tinyint(1) NOT NULL DEFAULT 0,
  `StaffID` int(15) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orders_paid`
--

INSERT INTO `orders_paid` (`ID`, `member_id`, `total`, `food_id`, `quantity`, `delivered`, `date`, `flag`, `StaffID`) VALUES
(2, 23, 324, '25002', '3', 1, '2021-08-01 00:14:32', 1, 14),
(5, 41, 6900, '12 - Fruit Gateu,13 - Gateu,14 - Burger,25001 - Biryani,25003 - Cheesy,', '1,1,1,1,1,', 2, '2021-08-11 01:04:00', 1, 23),
(6, 41, 7000, '12 - Fruit Gateu,13 - Gateu,14 - Burger,25001 - Biryani,25003 - Cheesy,', '1,2,1,2,3,', 1, '2021-08-11 18:52:06', 1, 25);

-- --------------------------------------------------------

--
-- Table structure for table `quantities`
--

CREATE TABLE `quantities` (
  `quantity_id` int(5) NOT NULL,
  `quantity_value` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `quantities`
--

INSERT INTO `quantities` (`quantity_id`, `quantity_value`) VALUES
(1, 1),
(2, 2);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `question_id` int(5) NOT NULL,
  `question_text` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`question_id`, `question_text`) VALUES
(1, 'What is the Name of your Mom?'),
(2, 'What is the name of your First Pet?'),
(3, 'what is you maiden name');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rate_id` int(5) NOT NULL,
  `rate_name` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations_details`
--

CREATE TABLE `reservations_details` (
  `ReservationID` int(15) NOT NULL,
  `member_id` int(15) NOT NULL,
  `table_id` int(5) NOT NULL,
  `Reserve_Date` date NOT NULL,
  `Reserve_Time` time NOT NULL,
  `StaffID` int(15) NOT NULL,
  `flag` int(1) NOT NULL,
  `table_flag` int(1) NOT NULL,
  `reason` mediumtext NOT NULL,
  `allocat` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations_details`
--

INSERT INTO `reservations_details` (`ReservationID`, `member_id`, `table_id`, `Reserve_Date`, `Reserve_Time`, `StaffID`, `flag`, `table_flag`, `reason`, `allocat`) VALUES
(46, 41, 7, '2021-08-11', '08:00:00', 5, 2, 1, 'svdsvs', 0),
(47, 41, 11, '2021-09-01', '12:00:00', 5, 2, 1, 'fwfe', 0),
(53, 41, 6, '2021-09-16', '17:00:00', 5, 2, 1, 'sfgshegsgewf', 0),
(54, 41, 4, '2021-09-16', '08:00:00', 14, 1, 1, '', 1),
(55, 41, 3, '2021-09-16', '12:00:00', 5, 2, 1, 'bgndntrnrtnrn', 0),
(56, 41, 2, '2021-09-16', '08:00:00', 17, 1, 1, '', 1),
(57, 41, 5, '2021-09-16', '17:00:00', 1, 1, 1, '', 1),
(82, 44, 1, '2021-08-10', '12:00:00', 17, 0, 1, '', 0),
(83, 45, 5, '2021-09-17', '08:00:00', 17, 0, 1, '', 0),
(84, 41, 11, '2021-08-31', '08:00:00', 16, 1, 1, '', 1),
(85, 41, 5, '2021-08-11', '12:00:00', 5, 2, 1, 'fdejadhjioejwefnowikv', 0),
(86, 41, 7, '2021-08-19', '17:00:00', 23, 1, 1, '', 0),
(87, 41, 2, '2021-08-05', '17:00:00', 5, 1, 1, '', 0),
(88, 41, 1, '2021-08-01', '12:00:00', 5, 2, 1, 'neksfhlksefv', 0),
(89, 46, 9, '2021-08-26', '12:00:00', 5, 0, 1, '', 0),
(90, 46, 7, '2021-08-26', '00:00:00', 5, 0, 1, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `specials`
--

CREATE TABLE `specials` (
  `special_id` int(15) NOT NULL,
  `special_name` varchar(25) NOT NULL,
  `special_description` text NOT NULL,
  `special_price` float NOT NULL,
  `special_start_date` date NOT NULL,
  `special_end_date` date NOT NULL,
  `special_photo` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `specials`
--

INSERT INTO `specials` (`special_id`, `special_name`, `special_description`, `special_price`, `special_start_date`, `special_end_date`, `special_photo`) VALUES
(3, 'Orange Drink', '50% OFF! Limited Offer!! Grab Now', 50, '2021-06-10', '2021-06-29', 'food2.jpg'),
(4, 'asdwe', '50% off', 123, '2021-06-22', '2021-07-07', 'category-image-2.jpg'),
(9, 'sdwad', 'ksfsdfs', 123, '2021-08-22', '2021-08-31', 'WhatsApp Image 2021-08-25 at 11.48.32.jpeg'),
(10, 'gwergser', 'jktdnbvktbnmdklftjbd', 142, '2021-08-24', '2021-08-28', 'WhatsApp Image 2021-08-25 at 11.48.32.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `StaffID` int(15) NOT NULL,
  `firstname` varchar(25) NOT NULL,
  `lastname` varchar(25) NOT NULL,
  `Street_Address` text NOT NULL,
  `Mobile_Tel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`StaffID`, `firstname`, `lastname`, `Street_Address`, `Mobile_Tel`) VALUES
(23, 'Akila', 'Gunasekara', 'tuck@gmail.com', '0714065231'),
(25, 'Dileesha', 'Weliwaththa', 'wdedweliwaththa@gmail.com', '0714064114'),
(26, 'asds', 'Weliwaththa', 'wdedweliwaththa@gmail.com', '0714392555');

-- --------------------------------------------------------

--
-- Table structure for table `tables`
--

CREATE TABLE `tables` (
  `table_id` int(5) NOT NULL,
  `table_name` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tables`
--

INSERT INTO `tables` (`table_id`, `table_name`) VALUES
(1, 'couple'),
(2, 'couple2'),
(3, 'couple3'),
(4, 'couple4');

-- --------------------------------------------------------

--
-- Table structure for table `timezones`
--

CREATE TABLE `timezones` (
  `timezone_id` int(5) NOT NULL,
  `timezone_reference` varchar(45) NOT NULL,
  `flag` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `timezones`
--

INSERT INTO `timezones` (`timezone_id`, `timezone_reference`, `flag`) VALUES
(1, 'GMT+05', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `member_id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL,
  `question_id` int(5) NOT NULL,
  `answer` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`member_id`, `firstname`, `lastname`, `email`, `password`, `code`, `status`, `question_id`, `answer`) VALUES
(1, 'Akila', 'Gunasekara', 'akila@gmail.com', '$2y$10$c8O4.njhDNt2f409bvShnuFR/8zjRrs/kJHlstQwMhwggl8kVes6C', 160343, 'notverified', 0, ''),
(2, 'Dulana', 'Senevirathna', 'dulana.senavirathna@gmail.com', '$2y$10$adFkFvkouRhUdNFicCio6Oj018RxPHdOmkiAv6eqLPmms6PzYHQKu', 229503, 'notverified', 0, ''),
(3, 'weefewf', 'wewewe', 'dileesa@gmail.com', '$2y$10$S/dUGvGjk3Voz1J1u7BG0.qPRiOISSHOde2owuzJyiOv93V6A4hoi', 371658, 'notverified', 0, ''),
(5, 'Dileesha', 'weliwaththa', 'dkh@gmail.com', '$2y$10$UaZigJqgaIL8.yrix6DaZOu6Vd5pFGMRTZQZjaILgZ2wlzOND2Jse', 293331, 'notverified', 0, ''),
(6, 'Dileesha', 'weliwaththa', 'dkhultraone2@gmail.com', '$2y$10$p8aQw4TbSexnvFeuPyl4EOejJAtXqpUllMwtRw1dJzfrXcUFlnRye', 617665, 'notverified', 0, ''),
(7, 'Dileesha', 'weliwaththa', 'dulana@gmail.com', '$2y$10$tUNfK3zHWJ7hS1TxYn1vs.L/WcwSbJQTrFaRJhxt4SvZO66ofiCZe', 797272, 'notverified', 0, ''),
(9, 'Dileesha', 'Weliwaththa', 'wdedweliwaththa@gmail.com', '$2y$10$f.zFG6CfrFV1fSDwZAUoUOA.EkLDqFT3z5e/UoHNDP7zmkHcEKPv.', 0, 'verified', 0, '');

-- --------------------------------------------------------

--
-- Table structure for table `usertable`
--

CREATE TABLE `usertable` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `code` mediumint(50) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `usertable`
--

INSERT INTO `usertable` (`id`, `name`, `email`, `password`, `code`, `status`) VALUES
(1, 'Dileesha', 'dileesa@gmail.com', '$2y$10$OkJWRdlZokRsmaWXyAJDIOWazkwUJcLEDqpNBNzRVaQ0gcNXHbXRO', 500857, 'notverified');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `billing_details`
--
ALTER TABLE `billing_details`
  ADD PRIMARY KEY (`billing_id`);

--
-- Indexes for table `cart_details`
--
ALTER TABLE `cart_details`
  ADD PRIMARY KEY (`cart_id`);

--
-- Indexes for table `currencies`
--
ALTER TABLE `currencies`
  ADD PRIMARY KEY (`currency_id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `food_categories`
--
ALTER TABLE `food_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `food_categories_lounge`
--
ALTER TABLE `food_categories_lounge`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `food_details`
--
ALTER TABLE `food_details`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `food_details_lounge`
--
ALTER TABLE `food_details_lounge`
  ADD PRIMARY KEY (`food_id`);

--
-- Indexes for table `orders_details`
--
ALTER TABLE `orders_details`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `orders_paid`
--
ALTER TABLE `orders_paid`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `quantities`
--
ALTER TABLE `quantities`
  ADD PRIMARY KEY (`quantity_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`question_id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rate_id`);

--
-- Indexes for table `reservations_details`
--
ALTER TABLE `reservations_details`
  ADD PRIMARY KEY (`ReservationID`);

--
-- Indexes for table `specials`
--
ALTER TABLE `specials`
  ADD PRIMARY KEY (`special_id`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`StaffID`);

--
-- Indexes for table `tables`
--
ALTER TABLE `tables`
  ADD PRIMARY KEY (`table_id`);

--
-- Indexes for table `timezones`
--
ALTER TABLE `timezones`
  ADD PRIMARY KEY (`timezone_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`member_id`);

--
-- Indexes for table `usertable`
--
ALTER TABLE `usertable`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(45) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `billing_details`
--
ALTER TABLE `billing_details`
  MODIFY `billing_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `cart_details`
--
ALTER TABLE `cart_details`
  MODIFY `cart_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=312;

--
-- AUTO_INCREMENT for table `currencies`
--
ALTER TABLE `currencies`
  MODIFY `currency_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `food_categories`
--
ALTER TABLE `food_categories`
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `food_categories_lounge`
--
ALTER TABLE `food_categories_lounge`
  MODIFY `category_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=221;

--
-- AUTO_INCREMENT for table `food_details`
--
ALTER TABLE `food_details`
  MODIFY `food_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `food_details_lounge`
--
ALTER TABLE `food_details_lounge`
  MODIFY `food_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25005;

--
-- AUTO_INCREMENT for table `orders_details`
--
ALTER TABLE `orders_details`
  MODIFY `order_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=270;

--
-- AUTO_INCREMENT for table `orders_paid`
--
ALTER TABLE `orders_paid`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `quantities`
--
ALTER TABLE `quantities`
  MODIFY `quantity_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `question_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rate_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `reservations_details`
--
ALTER TABLE `reservations_details`
  MODIFY `ReservationID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=91;

--
-- AUTO_INCREMENT for table `specials`
--
ALTER TABLE `specials`
  MODIFY `special_id` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `staff`
--
ALTER TABLE `staff`
  MODIFY `StaffID` int(15) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tables`
--
ALTER TABLE `tables`
  MODIFY `table_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `timezones`
--
ALTER TABLE `timezones`
  MODIFY `timezone_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `member_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `usertable`
--
ALTER TABLE `usertable`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
