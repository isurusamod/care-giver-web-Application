-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 03, 2024 at 01:01 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `caregiver`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`id`, `full_name`, `username`, `password`) VALUES
(12, 'Administrator', 'admin', 'E10ADC3949BA59ABBE56E057F20F883E');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_category`
--

CREATE TABLE `tbl_category` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_category`
--

INSERT INTO `tbl_category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(18, 'Male', 'Food_Category_489.jpg', 'Yes', 'Yes'),
(22, 'Female', 'Food_Category_942.jpg', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_food`
--

CREATE TABLE `tbl_caregiver` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_name` varchar(255) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_food`
--

INSERT INTO `tbl_caregiver` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(55, 'kalani ', 'she has one year experience', 2500.00, 'Food-Name-1740.jpg', 22, 'Yes', 'Yes'),
(56, 'nethmi', 'she has two year experience', 2500.00, 'Food-Name-7503.jpg', 22, 'Yes', 'Yes'),
(57, 'udeshika', 'she has three year experience', 3143.00, 'Food-Name-5695.jpg', 22, 'Yes', 'Yes'),
(60, 'Sahan', 'he has three year experience', 2300.00, 'Food-Name-4856.jpg', 18, 'Yes', 'Yes'),
(63, 'samod', 'he has one year experience', 1260.00, 'Food-Name-8388.jpg', 18, 'Yes', 'Yes'),
(66, 'kalani', 'etwete', 1233.00, 'Food-Name-4712.jpg', 22, 'Yes', 'Yes'),
(71, 'sashika', 'one year expirenced', 1400.00, 'Food-Name-8078.jpg', 18, 'Yes', 'Yes'),
(72, 'grey', 'ryeryre', 123.00, 'Food-Name-8846.jpg', 23, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_order`
--

CREATE TABLE `tbl_order` (
  `id` int(10) UNSIGNED NOT NULL,
  `food` varchar(150) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `qty` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `order_date` datetime NOT NULL,
  `status` varchar(50) NOT NULL,
  `customer_name` varchar(150) NOT NULL,
  `customer_contact` varchar(20) NOT NULL,
  `customer_email` varchar(150) NOT NULL,
  `customer_address` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_general_ci;

--
-- Dumping data for table `tbl_order`
--

INSERT INTO `tbl_order` (`id`, `food`, `price`, `qty`, `total`, `order_date`, `status`, `customer_name`, `customer_contact`, `customer_email`, `customer_address`) VALUES
(21, 'udeshika', 2143.00, 1, 2143.00, '2024-05-27 04:49:02', 'Ordered', 'Isuru Samod kularathna', '0702019784', 'samodkularathna999@gmail.com', 'F27/02 Dambulla.Udagaladeniya, Rambukkana'),
(26, 'Sahan', 2300.00, 3, 6900.00, '2024-06-02 02:50:52', 'Ordered', 'Isuru Samod kularathna', '0702019784', 'samodkularathna999@gmail.com', 'F27/02 Dambulla.Udagaladeniya, Rambukkana'),
(27, 'Sahan', 2300.00, 2, 4600.00, '2024-06-02 02:52:11', 'Ordered', 'Isuru Samod kularathna', '0702019784', 'samodkularathna999@gmail.com', 'F27/02 Dambulla.Udagaladeniya, Rambukkana'),
(28, 'nethmi', 2500.00, 2013, 5060000.00, '2024-06-02 02:55:49', 'Ordered', 'Isuru Samod kularathna', '0702019784', 'samodkularathna999@gmail.com', 'F27/02 Dambulla.Udagaladeniya, Rambukkana'),
(29, 'Sahan', 2300.00, 2014, 4632200.00, '2024-06-02 02:59:17', 'Cancelled', 'Isuru Samod kularathna', '0702019784', 'samodkularathna999@gmail.com', 'F27/02 Dambulla.Udagaladeniya, Rambukkana'),
(30, 'samod', 1260.00, 2015, 2538900.00, '2024-06-02 03:01:52', 'On Delivery', 'Isuru Samod kularathna', '0702019784', 'samodkularathna999@gmail.com', 'F27/02 Dambulla.Udagaladeniya, Rambukkana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_category`
--
ALTER TABLE `tbl_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_food`
--
ALTER TABLE `tbl_food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_order`
--
ALTER TABLE `tbl_order`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tbl_category`
--
ALTER TABLE `tbl_category`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tbl_food`
--
ALTER TABLE `tbl_food`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `tbl_order`
--
ALTER TABLE `tbl_order`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
