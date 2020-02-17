-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 17, 2020 at 12:22 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mvc`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(11) NOT NULL,
  `CategoryName` text NOT NULL,
  `urlKey` text NOT NULL,
  `image` text DEFAULT NULL,
  `status` text NOT NULL,
  `description` text NOT NULL,
  `parentCategory` text NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `CategoryName`, `urlKey`, `image`, `status`, `description`, `parentCategory`, `createdAt`, `updatedAt`) VALUES
(1, 'mobile', 'mobile', 'mobile.jpg', 'Not-Available', 'this is mobile', 'electronics', '0000-00-00 00:00:00', '2020-02-15 06:27:25'),
(2, 'fruits', 'fruits', 'fruits.jpg', 'available', 'fruits', 'food', '0000-00-00 00:00:00', '2020-02-15 06:28:01'),
(3, 'pen', 'pen', 'stationary.jpg', 'available', 'This is Pen Category.', 'stationery', '0000-00-00 00:00:00', '2020-02-17 06:22:35');

-- --------------------------------------------------------

--
-- Table structure for table `cms_page`
--

CREATE TABLE `cms_page` (
  `id` int(3) NOT NULL,
  `pageTitle` varchar(20) NOT NULL,
  `urlKey` varchar(30) NOT NULL,
  `status` varchar(20) NOT NULL,
  `content` varchar(200) NOT NULL,
  `createdAt` varchar(30) NOT NULL DEFAULT current_timestamp(),
  `updatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cms_page`
--

INSERT INTO `cms_page` (`id`, `pageTitle`, `urlKey`, `status`, `content`, `createdAt`, `updatedAt`) VALUES
(1, 'home', 'home', 'available', 'This is Home page.\r\nWelcome User!!', '17-02-2020', '2020-02-15 09:36:45'),
(2, 'aboutus', 'aboutus', 'available', 'This is About Us Page\r\n', '17-02-2020', '2020-02-17 06:14:16'),
(3, 'contact', 'contactUs', 'available', 'This is Contact Us page.\"', '17-02-2020', '2020-02-17 06:17:52'),
(4, 'privacy', 'privacy', 'Not-Available', 'This is Privacy Page.\"', '17-02-2020', '2020-02-17 06:19:26');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parentCategoryId` int(3) NOT NULL,
  `parentCategoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`parentCategoryId`, `parentCategoryName`) VALUES
(1, 'electronics'),
(2, 'food'),
(3, 'clothes'),
(4, 'books'),
(5, 'stationery');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` int(3) NOT NULL,
  `title` text NOT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `created_at`) VALUES
(1, 'Post 1edit', 'This is First Post with edit', '2020-02-14 06:13:46'),
(2, 'Post 2', 'This is Post2', '2020-02-13 07:36:14'),
(5, 'Post 3', 'This is Post 3', '2020-02-13 11:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productId` int(3) NOT NULL,
  `producName` text NOT NULL,
  `sku` text NOT NULL,
  `urlKey` text NOT NULL,
  `image` text DEFAULT NULL,
  `status` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `shortDescription` text NOT NULL,
  `price` int(10) NOT NULL,
  `stock` int(10) NOT NULL,
  `createdAt` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `UpdatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`productId`, `producName`, `sku`, `urlKey`, `image`, `status`, `description`, `shortDescription`, `price`, `stock`, `createdAt`, `UpdatedAt`) VALUES
(1, 'samsung', '10', 'samsung', 'samsung.jpg', 'available', 'samsung', 'samsung', 12000, 10, '0000-00-00 00:00:00', '2020-02-15 06:28:50'),
(2, 'apple', '50', 'apple', 'apple.jpg', 'available', 'apple', 'apple', 100, 20, '0000-00-00 00:00:00', '2020-02-15 06:29:28'),
(3, 'banana', '10', 'banana', 'banana.jpg', 'Not-Available', 'banana', 'banana', 10, 50, '0000-00-00 00:00:00', '2020-02-15 10:29:31'),
(4, 'SainoSofteck', '50', 'SainoSofteck', 'sainosoftek.jpg', 'available', 'This is Saino Softeck Pen.', 'smooth pen', 3, 10, '0000-00-00 00:00:00', '2020-02-17 06:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `products_category`
--

CREATE TABLE `products_category` (
  `productId` int(11) NOT NULL,
  `categoryId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products_category`
--

INSERT INTO `products_category` (`productId`, `categoryId`) VALUES
(1, 1),
(2, 2),
(3, 2),
(4, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `urlKey` (`urlKey`) USING HASH;

--
-- Indexes for table `cms_page`
--
ALTER TABLE `cms_page`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `urlKey` (`urlKey`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parentCategoryId`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productId`),
  ADD UNIQUE KEY `urlKey` (`urlKey`) USING HASH;

--
-- Indexes for table `products_category`
--
ALTER TABLE `products_category`
  ADD KEY `productId` (`productId`),
  ADD KEY `products_category_ibfk_1` (`categoryId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `cms_page`
--
ALTER TABLE `cms_page`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `products_category`
--
ALTER TABLE `products_category`
  ADD CONSTRAINT `products_category_ibfk_1` FOREIGN KEY (`categoryId`) REFERENCES `category` (`categoryId`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
