-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 16, 2021 at 02:09 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shadowlandsauctioneer`
--

-- --------------------------------------------------------

--
-- Table structure for table `auction`
--

CREATE TABLE `auction` (
  `auctionID` int(11) NOT NULL,
  `itemID` int(11) NOT NULL,
  `owner` varchar(55) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `auction`
--

INSERT INTO `auction` (`auctionID`, `itemID`, `owner`, `quantity`) VALUES
(24, 50, 'Siggy905', 6),
(26, 1, 'Bodhi', 25);

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `itemID` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `profession` varchar(50) NOT NULL,
  `professionID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`itemID`, `name`, `price`, `profession`, `professionID`) VALUES
(1, 'Shadowghast Ingot', 112.98, 'Blacksmithing', 1),
(2, 'Laestrite Skeleton Key', 3, 'Blacksmithing', 1),
(3, 'Shaded Sharpening Stone', 29, 'Blacksmithing', 1),
(4, 'Shaded Weightstone', 28.86, 'Blacksmithing', 1),
(5, 'Porous Sharpening Stone', 7, 'Blacksmithing', 1),
(6, 'Porous Weightstone', 0.93, 'Blacksmithing', 1),
(7, 'Relic of the Past I', 55, 'Blacksmithing', 1),
(8, 'Relic of the Past II', 899.9, 'Blacksmithing', 1),
(9, 'Relic of the Past III', 160, 'Blacksmithing', 1),
(10, 'Relic of the Past IV', 200.1, 'Blacksmithing', 1),
(11, 'Relic of the Past V', 2340.86, 'Blacksmithing', 1),
(12, 'Heavy Desolate Leather', 24.71, 'Leatherworking', 2),
(13, 'Heavy Callous Hide', 263.53, 'Leatherworking', 2),
(14, 'Heavy Desolate Armor Kit', 399.61, 'Leatherworking', 2),
(15, 'Desolate Armor Kit', 60, 'Leatherworking', 2),
(16, 'Drums of Deathly Ferocity', 169.98, 'Leatherworking', 2),
(17, 'Comfortable Rider\'s Barding', 290, 'Leatherworking', 2),
(18, 'Relic of the Past I', 55, 'Leatherworking', 2),
(19, 'Relic of the Past II', 899.9, 'Leatherworking', 2),
(20, 'Relic of the Past III', 160, 'Leatherworking', 2),
(21, 'Relic of the Past IV', 200.1, 'Leatherworking', 2),
(22, 'Relic of the Past V', 2340.86, 'Leatherworking', 2),
(23, 'Enchanted Lightless Silk', 36.44, 'Tailoring', 3),
(24, 'Lightless Silk', 3.75, 'Tailoring', 3),
(25, 'Shrouded Cloth', 1.67, 'Tailoring', 3),
(26, 'Lightless Silk Pouch', 320.97, 'Tailoring', 3),
(27, 'Shrouded Cloth Bag', 171.34, 'Tailoring', 3),
(28, 'Shrouded Cloth Bandage', 43, 'Tailoring', 3),
(29, 'Heavy Shrouded Cloth Bandage', 7, 'Tailoring', 3),
(30, 'Relic of the Past I', 55, 'Tailoring', 3),
(31, 'Relic of the Past II', 899.9, 'Tailoring', 3),
(32, 'Relic of the Past III', 160, 'Tailoring', 3),
(33, 'Relic of the Past IV', 200.1, 'Tailoring', 3),
(34, 'Relic of the Past V', 2340.86, 'Tailoring', 3),
(35, 'Marrowroot', 34.05, 'Herbalism', 4),
(36, 'Nightshade', 29.96, 'Herbalism', 4),
(37, 'Widowbloom', 28.8, 'Herbalism', 4),
(38, 'Vigil\'s Torch', 19.87, 'Herbalism', 4),
(39, 'Rising Glory', 14.49, 'Herbalism', 4),
(40, 'Death Blossom', 10.16, 'Herbalism', 4),
(41, 'Ground Nightshade', 122.51, 'Herbalism', 4),
(42, 'Ground Marrowroot', 122.49, 'Herbalism', 4),
(43, 'Ground Rising Glory', 58.1, 'Herbalism', 4),
(44, 'Ground Widowbloom', 45.08, 'Herbalism', 4),
(45, 'Ground Death Blossom', 35, 'Herbalism', 4),
(46, 'Ground Vigil\'s Torch', 16, 'Herbalism', 4),
(47, 'Elethium Ore', 62.02, 'Mining', 5),
(48, 'Solenium Ore', 25.48, 'Mining', 5),
(49, 'Sinvyr Ore', 16, 'Mining', 5),
(50, 'Phaedrum Ore', 14.7, 'Mining', 5),
(51, 'Oxxein Ore', 8.99, 'Mining', 5),
(52, 'Laestrite Ore', 5.91, 'Mining', 5),
(53, 'Shaded Stone', 2.02, 'Mining', 5),
(54, 'Porous Stone', 1.57, 'Mining', 5),
(55, 'Twilight Bark', 0.75, 'Mining', 5),
(56, 'Heavy Callous Hide', 368.53, 'Skinning', 6),
(57, 'Callous Hide', 37.51, 'Skinning', 6),
(58, 'Heavy Desolate Leather', 24.71, 'Skinning', 6),
(59, 'Pallid Bone', 2.73, 'Skinning', 6),
(60, 'Desolate Leather', 2.7, 'Skinning', 6);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `userID` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`userID`, `username`, `email`, `password`) VALUES
(2, 'Siggy905', 'ajseig728@gmail.com', '$2y$12$mTxofJ6hwEpTDPaW6FfCK.0oZ1YPfoti9lN9a2GmblEw9cKhgsHSe'),
(3, 'testuser', 'test@email', '$2y$12$dIQJbbWTezC3DCcijPh/oO1XwT9P2V17Ymrvz/8kKkq15CSHuKYvO'),
(4, 'Bodhi', 'bodhijoey@gmail.com', '$2y$12$F3C6N4YdQrWxewn0B7DSvufC/qV6bgiKnQ7mtrkqjpMBf55s.t9Ci');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `auction`
--
ALTER TABLE `auction`
  ADD PRIMARY KEY (`auctionID`),
  ADD KEY `FK2` (`itemID`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`itemID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `auction`
--
ALTER TABLE `auction`
  MODIFY `auctionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `itemID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
