-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3307
-- Generation Time: Nov 19, 2021 at 04:46 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cake-order`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_Name` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `full_Name`, `username`, `password`) VALUES
(40, 'Pratik Bangera', 'Reaper', '123');

-- --------------------------------------------------------

--
-- Table structure for table `cakes`
--

CREATE TABLE `cakes` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(200) NOT NULL,
  `price` decimal(10,0) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `category_id` int(10) UNSIGNED NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cakes`
--

INSERT INTO `cakes` (`id`, `title`, `description`, `price`, `image_name`, `category_id`, `featured`, `active`) VALUES
(31, 'Pound Cake', 'Pound cake is a relative of butter cake.', '300', 'cake_name7382.jfif', 48, 'Yes', 'Yes'),
(32, 'Sponge Cake', 'Any recipe that contains no baking soda or baking powder ', '300', 'cake_name1864.jfif', 49, 'Yes', 'Yes'),
(33, 'Butter Cake', 'Any recipe for cake that begins \"cream butter and sugar\" is a butter cake.', '500', 'cake_name4616.jfif', 48, 'Yes', 'Yes'),
(34, 'Genoise Cake', 'In Italy and France, a sponge cake is called genoise;', '150', 'cake_name9476.jfif', 49, 'Yes', 'Yes'),
(35, 'Biscuit Cake', 'Biscuit (always pronounced the French way as bees-kwee) cakes', '600', 'cake_name5472.jfif', 50, 'Yes', 'Yes'),
(36, 'Angel Food Cake', 'Angel food cakes are made with egg whites alone and no yolks.', '400', 'cake_name2599.jfif', 50, 'Yes', 'Yes'),
(37, 'Chiffon Cake', 'This fairly recent American creation was invented by a salesman ', '600', 'cake_name3739.jfif', 51, 'Yes', 'Yes'),
(38, 'Baked Flourless Cake', 'These include baked cheesecakes and flourless chocolate cakes.', '800', 'cake_name7625.jfif', 51, 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `featured` varchar(10) NOT NULL,
  `active` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `image_name`, `featured`, `active`) VALUES
(48, 'Birthday', 'cake_category763.jfif', 'Yes', 'Yes'),
(49, 'Wedding', 'cake_category95.jfif', 'Yes', 'Yes'),
(50, 'Annivarsary', 'cake_category213.jfif', 'Yes', 'Yes'),
(51, 'Special', 'cake_category298.jfif', 'Yes', 'Yes');

-- --------------------------------------------------------

--
-- Table structure for table `jojo`
--

CREATE TABLE `jojo` (
  `id` int(100) NOT NULL,
  `cake` varchar(100) NOT NULL,
  `price` int(10) NOT NULL,
  `quantity` int(10) NOT NULL,
  `cus_name` varchar(100) NOT NULL,
  `cus_phone` int(50) NOT NULL,
  `cus_email` varchar(100) NOT NULL,
  `cus_adds` varchar(100) NOT NULL,
  `total` int(10) NOT NULL,
  `date` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jojo`
--

INSERT INTO `jojo` (`id`, `cake`, `price`, `quantity`, `cus_name`, `cus_phone`, `cus_email`, `cus_adds`, `total`, `date`, `status`) VALUES
(6, 'Pound Cake', 300, 2, 'Pratik Bangera', 2147483647, 'Surajshetty@gmail.com', 'home', 600, '2021-10-12:26:39pm', 'ordered'),
(7, 'Genoise Cake', 150, 4, 'Vinayak pawar', 2147483647, 'admin@admin.com', 'book', 600, '2021-10-12:27:20pm', 'Cancelled'),
(8, 'Angel Food Cake', 400, 2, 'Chaitanya Deshpande`', 2147483647, 'edwordnewgate@gmail.com', 'gogo', 800, '2021-10-12:28:11pm', 'Delivered');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cakes`
--
ALTER TABLE `cakes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jojo`
--
ALTER TABLE `jojo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `cakes`
--
ALTER TABLE `cakes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `jojo`
--
ALTER TABLE `jojo`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
