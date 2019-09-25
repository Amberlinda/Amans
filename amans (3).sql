-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 13, 2019 at 08:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amans`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(5) NOT NULL,
  `type` varchar(20) NOT NULL,
  `course` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `type`, `course`) VALUES
(1, 'veg', 'starters'),
(2, 'veg', 'starters'),
(3, 'veg', 'dessert'),
(4, 'non-veg', 'starters'),
(5, 'non-veg', 'main-course'),
(6, 'non-veg', 'dessert');

-- --------------------------------------------------------

--
-- Table structure for table `category_p`
--

CREATE TABLE `category_p` (
  `category_id` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dates` date NOT NULL,
  `preference` varchar(60) NOT NULL,
  `selected` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `category_p`
--

INSERT INTO `category_p` (`category_id`, `email`, `dates`, `preference`, `selected`) VALUES
(6, 'faiyaz', '2019-03-17', 'food', 'Package'),
(7, 'faiyaz', '2019-03-17', 'food', 'Package'),
(8, 'faiyaz', '2019-03-17', 'food', 'Customizable'),
(9, 'faiyaz', '2019-03-17', 'food', 'Customizable'),
(10, 'faiyaz', '2019-03-17', 'food', 'Customizable'),
(11, 'faiyaz', '2019-03-17', 'food', 'Customizable'),
(12, '', '2019-03-17', 'food', 'Customizable'),
(13, 'faiyaz', '2019-03-17', 'food,dj', 'Customizable'),
(14, 'faiyaz', '2019-03-18', 'food', 'Package'),
(15, 'faiyaz', '2019-03-20', 'food', 'Package'),
(16, 'faiyaz', '2019-07-23', 'food', '');

-- --------------------------------------------------------

--
-- Table structure for table `custom`
--

CREATE TABLE `custom` (
  `Custom_id` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `numofstarter` int(5) NOT NULL,
  `numofmaincourse` int(5) NOT NULL,
  `numofdesert` int(5) NOT NULL,
  `custom_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `desert`
--

CREATE TABLE `desert` (
  `d_id` int(11) NOT NULL,
  `d_name` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `d_price` int(11) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `desert`
--

INSERT INTO `desert` (`d_id`, `d_name`, `type`, `d_price`, `description`) VALUES
(1, 'Gulab Jamun', 'veg', 30, ''),
(2, 'Nutella Cake', 'non-veg', 55, '');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(11) NOT NULL,
  `email` varchar(30) NOT NULL,
  `user` varchar(30) NOT NULL,
  `pass` varchar(30) NOT NULL,
  `phoneno` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email`, `user`, `pass`, `phoneno`) VALUES
(1, 'aniket@gmail.com', 'Aniket', '12345', 0),
(2, 'kang@gmail.com', 'keng', '1234', 0),
(3, 'faiyazshareef2@gmail.com', 'faiyaz', '1234', 0),
(4, 'faiyazshareef@outlook.com', 'faityaz', '1234', 0),
(5, 'ani@ggg', 'ayan', '1234', 0),
(6, 'libin@gmail', 'Libin', '123', 0),
(7, 'aniket6@gmail.com', 'dfgh', '1234', 0);

-- --------------------------------------------------------

--
-- Table structure for table `maincourse`
--

CREATE TABLE `maincourse` (
  `mc_id` int(5) NOT NULL,
  `mc_name` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `mc_price` int(5) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `maincourse`
--

INSERT INTO `maincourse` (`mc_id`, `mc_name`, `type`, `mc_price`, `description`) VALUES
(1, 'Chicken Biryani', 'non-veg', 100, ''),
(2, 'Dal aur Chawal', 'veg', 90, '');

-- --------------------------------------------------------

--
-- Table structure for table `minicontent`
--

CREATE TABLE `minicontent` (
  `id` int(10) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nonveg_name` varchar(30) NOT NULL,
  `nonvegquantity` int(20) NOT NULL,
  `veg_name` varchar(30) NOT NULL,
  `vegquantity` int(20) NOT NULL,
  `total` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minicontent`
--

INSERT INTO `minicontent` (`id`, `email`, `nonveg_name`, `nonvegquantity`, `veg_name`, `vegquantity`, `total`) VALUES
(3, 'faiyazshareef2@gmail.com', 'Chicken-Sandwich', 9, 'Fries', 10, 300);

-- --------------------------------------------------------

--
-- Table structure for table `minimeal_p`
--

CREATE TABLE `minimeal_p` (
  `m_id` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `dates` date NOT NULL,
  `times` varchar(10) NOT NULL,
  `phoneno` int(15) NOT NULL,
  `address` varchar(100) NOT NULL,
  `request` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `minimeal_p`
--

INSERT INTO `minimeal_p` (`m_id`, `email`, `dates`, `times`, `phoneno`, `address`, `request`) VALUES
(0, '', '0000-00-00', '', 12345678, 'asdfghjk', ''),
(0, 'faiyaz', '2019-03-21', '12:12', 12345678, 'sdfghjkl', 'asdfghjkl'),
(0, 'faiyaz', '2019-03-21', '12:12', 1234567890, 'aswertyuiop', 'asdfghjkl'),
(0, 'faiyaz', '2019-04-04', '12:12', 1234567, 'xcvbnm,', 'zsxcfvghjk'),
(0, 'faiyaz', '2019-03-15', '00:12', 12345678, 'asdfghj', 'wertyuio'),
(0, 'faiyaz', '2019-03-14', '04:01', 2343, 'wefwe', 'wsdwf'),
(0, 'faiyaz', '2019-03-20', '23:20', 123456789, 'cvbnm,./', 'xdfghjk,./'),
(0, 'faiyaz', '2019-03-20', '23:22', 123456789, 'Zxdcfvghjkl', 'ASdrtyuiop'),
(0, 'faiyaz', '2019-03-21', '12:12', 123456789, 'werty', 'zsdfghjk'),
(0, 'faiyaz', '2019-03-06', '12:12', 12345678, 'zasdfghjkl', 'wertyuiop'),
(0, 'faiyaz', '2019-03-14', '12:12', 2147483647, 'Deliver Spoon', 'Banglotrre'),
(0, 'faiyaz', '2019-03-14', '12:12', 123445, 'Spoons', 'Banglore');

-- --------------------------------------------------------

--
-- Table structure for table `package`
--

CREATE TABLE `package` (
  `pk_id` int(5) NOT NULL,
  `pk_name` varchar(40) NOT NULL,
  `Veg/non-veg` varchar(10) NOT NULL,
  `pk_price` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `package-selection`
--

CREATE TABLE `package-selection` (
  `id` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `veg_item_name` varchar(20) NOT NULL,
  `veg_count` int(11) NOT NULL,
  `nonveg_item_name` varchar(11) NOT NULL,
  `nonveg_count` int(11) NOT NULL,
  `total` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `package-selection`
--

INSERT INTO `package-selection` (`id`, `email`, `veg_item_name`, `veg_count`, `nonveg_item_name`, `nonveg_count`, `total`) VALUES
(1, 'faiyazshareef2@gmail.com', 'Veg Sandwich', 2, 'Chicken ', 3, 300);

-- --------------------------------------------------------

--
-- Table structure for table `packaging`
--

CREATE TABLE `packaging` (
  `id` int(5) NOT NULL,
  `email` varchar(40) NOT NULL,
  `nonveg_name` varchar(20) NOT NULL,
  `nonveg_total` int(10) NOT NULL,
  `veg_name` varchar(20) NOT NULL,
  `veg_total` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `register`
--

CREATE TABLE `register` (
  `r_id` int(5) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(40) NOT NULL,
  `phoneno` int(10) NOT NULL,
  `findus` varchar(15) NOT NULL,
  `message` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `register`
--

INSERT INTO `register` (`r_id`, `name`, `email`, `phoneno`, `findus`, `message`) VALUES
(3, 'Libin', 'kang@gmail.com', 545454, 'Search', 'hello'),
(4, 'Faiyaz', 'faiyazshareef2@gmail.com', 1234556, 'friends', 'adsaflka');

-- --------------------------------------------------------

--
-- Table structure for table `starter`
--

CREATE TABLE `starter` (
  `st_id` int(5) NOT NULL,
  `st_name` varchar(40) NOT NULL,
  `type` varchar(10) NOT NULL,
  `st_price` int(5) NOT NULL,
  `description` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `starter`
--

INSERT INTO `starter` (`st_id`, `st_name`, `type`, `st_price`, `description`) VALUES
(1, 'Paneer Fry', 'veg', 70, ''),
(2, 'Tandoor Chicken', 'non-veg', 90, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `category_p`
--
ALTER TABLE `category_p`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `custom`
--
ALTER TABLE `custom`
  ADD PRIMARY KEY (`Custom_id`);

--
-- Indexes for table `desert`
--
ALTER TABLE `desert`
  ADD PRIMARY KEY (`d_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `minicontent`
--
ALTER TABLE `minicontent`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `packaging`
--
ALTER TABLE `packaging`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `register`
--
ALTER TABLE `register`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `starter`
--
ALTER TABLE `starter`
  ADD PRIMARY KEY (`st_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `category_p`
--
ALTER TABLE `category_p`
  MODIFY `category_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `custom`
--
ALTER TABLE `custom`
  MODIFY `Custom_id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `desert`
--
ALTER TABLE `desert`
  MODIFY `d_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `minicontent`
--
ALTER TABLE `minicontent`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `packaging`
--
ALTER TABLE `packaging`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `register`
--
ALTER TABLE `register`
  MODIFY `r_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `starter`
--
ALTER TABLE `starter`
  MODIFY `st_id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
