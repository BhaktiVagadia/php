-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 05, 2020 at 07:28 AM
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
-- Database: `evaluationtest2`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog_post`
--

CREATE TABLE `blog_post` (
  `postId` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `category` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `publishedAt` varchar(30) NOT NULL,
  `createdAt` varchar(30) NOT NULL,
  `updatedAt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog_post`
--

INSERT INTO `blog_post` (`postId`, `userId`, `title`, `url`, `content`, `category`, `image`, `publishedAt`, `createdAt`, `updatedAt`) VALUES
(1, 1, 'gravity', 'gravity', 'gravity', 'physics', 'uploads/p1.JPG', '1580881812', '1580881812', '0'),
(2, 1, 'force', 'force', 'force theory', 'physics', '', '0', '0', '0'),
(3, 1, 'nano technology', 'nano technology', 'nano technology theory', 'physics', '', '2020-02-01', 'Wed/Feb/2020 07:02:36', 'Wed/Feb/2020 07:02:53'),
(4, 1, 'xyz', 'abc', 'abc', 'physics', '', '2020-02-02', 'Wed/Feb/2020 07:18:08', 'Wed/Feb/2020 07:18:54');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `categoryId` int(3) NOT NULL,
  `userId` int(3) NOT NULL,
  `parentCategoryId` int(3) NOT NULL,
  `title` varchar(50) NOT NULL,
  `metaTitle` varchar(50) NOT NULL,
  `url` varchar(100) NOT NULL,
  `content` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `createdAt` varchar(20) NOT NULL,
  `UpdatedAt` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`categoryId`, `userId`, `parentCategoryId`, `title`, `metaTitle`, `url`, `content`, `image`, `createdAt`, `UpdatedAt`) VALUES
(1, 1, 2, 'physics', 'physics', 'physics', 'physics', 'uploads/p1.JPG', '1580881775', '0'),
(2, 1, 2, 'chemistry', 'chemistry', 'chemistry', 'chemistry', 'uploads/p2.jpg', '0', '0'),
(3, 1, 2, 'biology', 'biology', 'biology', 'biology', 'uploads/p1.JPG', 'Wed/Feb/2020 07:22:3', '');

-- --------------------------------------------------------

--
-- Table structure for table `parentcategory`
--

CREATE TABLE `parentcategory` (
  `parentCategoryId` int(3) NOT NULL,
  `ParentCategoryName` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `parentcategory`
--

INSERT INTO `parentcategory` (`parentCategoryId`, `ParentCategoryName`) VALUES
(1, 'Health'),
(2, 'Science'),
(3, 'Agriculture'),
(4, 'Technology');

-- --------------------------------------------------------

--
-- Table structure for table `post_category`
--

CREATE TABLE `post_category` (
  `postid` int(3) NOT NULL,
  `categoryId` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post_category`
--

INSERT INTO `post_category` (`postid`, `categoryId`) VALUES
(1, 1),
(2, 1),
(3, 1),
(4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userId` int(3) NOT NULL,
  `prefix` varchar(4) NOT NULL,
  `firstName` varchar(20) NOT NULL,
  `lastName` varchar(20) NOT NULL,
  `mobile` int(10) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `lastLogin` varchar(30) NOT NULL,
  `information` varchar(100) NOT NULL,
  `createdAt` varchar(30) NOT NULL,
  `updatedAt` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userId`, `prefix`, `firstName`, `lastName`, `mobile`, `email`, `password`, `lastLogin`, `information`, `createdAt`, `updatedAt`) VALUES
(1, 'Miss', 'Bhakti', 'Vagadia', 2147483647, 'bhakti@gmail.com', '202cb962ac59075b964b07152d234b70', '', 'bhakti', 'Wed/Feb/2020 06:27:32', '0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD PRIMARY KEY (`postId`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `userId` (`userId`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`categoryId`),
  ADD UNIQUE KEY `url` (`url`),
  ADD KEY `userId` (`userId`),
  ADD KEY `parentCategoryId` (`parentCategoryId`);

--
-- Indexes for table `parentcategory`
--
ALTER TABLE `parentcategory`
  ADD PRIMARY KEY (`parentCategoryId`);

--
-- Indexes for table `post_category`
--
ALTER TABLE `post_category`
  ADD KEY `categoryId` (`categoryId`),
  ADD KEY `post_category_ibfk_1` (`postid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog_post`
--
ALTER TABLE `blog_post`
  MODIFY `postId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `categoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `parentcategory`
--
ALTER TABLE `parentcategory`
  MODIFY `parentCategoryId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userId` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `blog_post`
--
ALTER TABLE `blog_post`
  ADD CONSTRAINT `blog_post_ibfk_1` FOREIGN KEY (`userId`) REFERENCES `user` (`userId`);

--
-- Constraints for table `category`
--
ALTER TABLE `category`
  ADD CONSTRAINT `category_ibfk_1` FOREIGN KEY (`parentCategoryId`) REFERENCES `parentcategory` (`parentCategoryId`);

--
-- Constraints for table `post_category`
--
ALTER TABLE `post_category`
  ADD CONSTRAINT `post_category_ibfk_1` FOREIGN KEY (`postid`) REFERENCES `blog_post` (`postId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
