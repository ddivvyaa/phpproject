-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 01, 2020 at 08:21 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.1.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstorecreator`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookinventory`
--

CREATE TABLE `bookinventory` (
  `BookId` int(11) NOT NULL,
  `InventoryId` int(11) NOT NULL,
  `NumberOfCopies` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `bookinventory`
--

INSERT INTO `bookinventory` (`BookId`, `InventoryId`, `NumberOfCopies`) VALUES
(1, 1, 5),
(2, 2, 6),
(3, 3, 18),
(4, 4, 20),
(5, 5, 20);

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `BookId` int(11) NOT NULL,
  `BookName` varchar(100) NOT NULL,
  `BookCost` int(11) NOT NULL,
  `BookDescription` varchar(500) NOT NULL,
  `BookImage` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`BookId`, `BookName`, `BookCost`, `BookDescription`, `BookImage`) VALUES
(1, 'Study With PHP', 99, 'A book with all methods and learning on Php.', 'abook.jpg'),
(2, 'HTML and CSS', 59, 'Some descriptions and examples on HTML and CSS styling and Bootstrap.', 'bbook.jpg'),
(3, 'Android Studio', 109, 'Learn how to develop an innovative Android application for a leading company.', 'dbook.jpg'),
(4, '.Net Framework', 89, 'Let\'s see how .Net frameworks can help you develop a responsive website.', 'cbook.jpg'),
(5, 'Photoshop', 79, 'Now create and design amazing pictures and videos for your company.', 'ebook.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `buyers`
--

CREATE TABLE `buyers` (
  `BuyerId` int(11) NOT NULL,
  `BookId` int(11) NOT NULL,
  `FirstName` varchar(100) NOT NULL,
  `LastName` varchar(100) NOT NULL,
  `PaymentOptions` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buyers`
--

INSERT INTO `buyers` (`BuyerId`, `BookId`, `FirstName`, `LastName`, `PaymentOptions`) VALUES
(1, 2, 'DIVYA', 'GUPTA', 'credit'),
(2, 2, 'DIVYA', 'GUPTA', 'cod'),
(3, 1, 'diva', 'guhh', 'cod'),
(4, 1, 'sxsxsxs', 'xs', 'credit'),
(5, 1, 'sxsxsxs', 'xs', 'credit'),
(6, 1, 'sss', 'sss', 'debit'),
(7, 2, 's', 's', 'credit'),
(8, 1, 'eg', 'gerge', 'cod');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookinventory`
--
ALTER TABLE `bookinventory`
  ADD PRIMARY KEY (`InventoryId`);

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`BookId`);

--
-- Indexes for table `buyers`
--
ALTER TABLE `buyers`
  ADD PRIMARY KEY (`BuyerId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookinventory`
--
ALTER TABLE `bookinventory`
  MODIFY `InventoryId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `BookId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `buyers`
--
ALTER TABLE `buyers`
  MODIFY `BuyerId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
