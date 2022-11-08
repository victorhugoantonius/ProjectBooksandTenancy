-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2022 at 11:02 AM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aplikasi sewa buku`
--

-- --------------------------------------------------------

--
-- Table structure for table `ms_admin`
--

CREATE TABLE `ms_admin` (
  `admin_id` int(11) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_username` varchar(50) NOT NULL,
  `admin_pass` varchar(50) NOT NULL,
  `admin_phone` varchar(20) NOT NULL,
  `admin_email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_admin`
--

INSERT INTO `ms_admin` (`admin_id`, `admin_name`, `admin_username`, `admin_pass`, `admin_phone`, `admin_email`) VALUES
(1, 'Victor Hugo', 'vicc', '123', '081129378713', 'Victor1234@gmail.com  ');

-- --------------------------------------------------------

--
-- Table structure for table `ms_cart`
--

CREATE TABLE `ms_cart` (
  `cart_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `price` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_cart`
--

INSERT INTO `ms_cart` (`cart_id`, `admin_id`, `name`, `price`, `duration`, `image`) VALUES
(7, 0, 'Bayes Theorem', 20000, 1, 'uploaded_img/Buku1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `ms_product`
--

CREATE TABLE `ms_product` (
  `product_id` int(11) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `product_name` varchar(50) NOT NULL,
  `product_price` int(11) NOT NULL,
  `duration` int(11) DEFAULT NULL,
  `product_image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ms_product`
--

INSERT INTO `ms_product` (`product_id`, `admin_id`, `product_name`, `product_price`, `duration`, `product_image`) VALUES
(1, 1, 'Bayes Theorem', 20000, NULL, 'uploaded_img/Buku1.jpg'),
(2, 1, 'Laskar Pelangi', 15000, NULL, 'uploaded_img/Buku2.jpg'),
(3, 1, 'Pancasila', 80000, NULL, 'uploaded_img/Buku3.jpg'),
(4, 1, 'Hujan', 110000, NULL, 'uploaded_img/Buku4.jfif'),
(5, 1, 'Koala Kumal', 60000, NULL, 'uploaded_img/Buku5.jpg'),
(6, 1, 'Matematika 6', 50000, NULL, 'uploaded_img/Buku6.jpg'),
(7, 1, 'Strategi Penulisan Artikel ', 90000, NULL, 'uploaded_img/Buku7.jfif'),
(8, 1, 'Hope', 105000, NULL, 'uploaded_img/Buku8.jpg'),
(9, 1, 'Buku Web Programming', 135000, NULL, 'uploaded_img/Buku9.jpg'),
(10, 1, 'Ronggeng Dukuh Paruk', 110000, NULL, 'uploaded_img/Buku10.jpg'),
(11, 1, 'Strategi Pembelajaran Online', 80000, NULL, 'uploaded_img/Buku11.jpg'),
(12, 1, 'Metodologi Pembelajaran IPS', 54000, NULL, 'uploaded_img/Buku12.jpg'),
(13, 1, 'Cara Mengejar Kreatif', 120000, NULL, 'uploaded_img/Buku13.jpg'),
(14, 1, 'Algoritma Machine Learning', 65000, NULL, 'uploaded_img/Buku14.jpg'),
(15, 1, 'Metode Penelitian Kuantitatif', 40000, NULL, 'uploaded_img/Buku15.jpg'),
(16, 1, 'Komik - Taksi Online', 30000, NULL, 'uploaded_img/Buku16.jpg'),
(17, 1, 'Pendidikan Pancasila', 75000, NULL, 'uploaded_img/Buku17.jfif'),
(18, 1, 'Dasar Aljabar Linear', 110000, NULL, 'uploaded_img/Buku18.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ms_admin`
--
ALTER TABLE `ms_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `ms_cart`
--
ALTER TABLE `ms_cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `ms_product`
--
ALTER TABLE `ms_product`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ms_admin`
--
ALTER TABLE `ms_admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `ms_cart`
--
ALTER TABLE `ms_cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `ms_product`
--
ALTER TABLE `ms_product`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
