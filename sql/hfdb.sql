-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Jun 11, 2022 at 06:50 PM
-- Server version: 10.6.5-MariaDB-1:10.6.5+maria~focal
-- PHP Version: 8.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hfdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `Account`
--

CREATE TABLE `Account` (
  `accountId` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `roleId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Account`
--

INSERT INTO `Account` (`accountId`, `firstName`, `lastName`, `email`, `password`, `roleId`) VALUES
(1, 'biniam', 'mehari', 'bini@gmail', 'biniammmmm', 3);

-- --------------------------------------------------------

--
-- Table structure for table `Artist`
--

CREATE TABLE `Artist` (
  `artistId` int(11) NOT NULL,
  `artistName` varchar(255) NOT NULL,
  `style` varchar(255) NOT NULL,
  `youtube` varchar(255) DEFAULT NULL,
  `instaGram` varchar(255) DEFAULT NULL,
  `tikTok` varchar(255) DEFAULT NULL,
  `faceBook` varchar(255) DEFAULT NULL,
  `description` varchar(255) NOT NULL,
  `imageId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Artist`
--

INSERT INTO `Artist` (`artistId`, `artistName`, `style`, `youtube`, `instaGram`, `tikTok`, `faceBook`, `description`, `imageId`) VALUES
(1, 'kingston', 'rock', '@youtube', '@instagram', '@ticktock', NULL, 'this', ''),
(2, 'tiesto', 'Dance', NULL, NULL, NULL, NULL, 'Artist with talent to rock', 'tiesto'),
(3, 'jack', 'slid', 'gfhvjb', 'jnklm,', 'nkm,.', 'kml,.', 'ml,.', ''),
(4, 'King', 'rock', '@fghjnklm', '@fghjnm,.', '@FGBNM<', NULL, '@dfgvhbjnmk,', '');

-- --------------------------------------------------------

--
-- Table structure for table `Customer`
--

CREATE TABLE `Customer` (
  `userid` int(11) NOT NULL,
  `postCode` varchar(11) NOT NULL,
  `street` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Dance`
--

CREATE TABLE `Dance` (
  `eventId` int(255) NOT NULL,
  `specialguest` varchar(255) NOT NULL,
  `venueId` int(11) NOT NULL,
  `artistId` int(11) NOT NULL,
  `eventSession` varchar(255) NOT NULL,
  `duration` int(11) NOT NULL,
  `capacity` int(11) DEFAULT NULL,
  `price` double NOT NULL,
  `vat` double NOT NULL,
  `date` varchar(255) NOT NULL,
  `startTime` varchar(255) NOT NULL,
  `imageId` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Dance`
--

INSERT INTO `Dance` (`eventId`, `specialguest`, `venueId`, `artistId`, `eventSession`, `duration`, `capacity`, `price`, `vat`, `date`, `startTime`, `imageId`) VALUES
(3, 'me', 3, 1, 'enjoy', 40, 200, 12, 0.2, '12/12/2022', '12:00 PM', '3'),
(4, '2018-07-27', 1, 2, 'backback', 60, 100, 24, 0.2, '02/03/2022', '02:34 AM', '4'),
(5, 'sdfghj', 1, 1, 'cvghb', 2345, 2345, 12.9, 0.2, '12/04/2022', '23', '5'),
(6, 'Bruno Mars', 1, 1, 'Have fun', 4, 500000, 33.5, 21, '18/12/22', '15:00', '');

-- --------------------------------------------------------

--
-- Table structure for table `Food`
--

CREATE TABLE `Food` (
  `foodEventID` int(11) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `foodDescription` varchar(2000) NOT NULL,
  `reservationFee` double(11,2) NOT NULL,
  `duration` int(11) NOT NULL,
  `sessions` int(11) NOT NULL,
  `vat` double(11,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Food`
--

INSERT INTO `Food` (`foodEventID`, `restaurantID`, `startDate`, `startTime`, `foodDescription`, `reservationFee`, `duration`, `sessions`, `vat`) VALUES
(1, 1, '2022-07-28', '18:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(2, 1, '2022-07-29', '18:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(3, 1, '2022-07-30', '18:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(4, 1, '2022-07-31', '18:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(5, 2, '2022-07-28', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 3, 0.21),
(6, 2, '2022-07-29', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 3, 0.21),
(7, 2, '2022-07-30', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 3, 0.21),
(8, 2, '2022-07-31', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 3, 0.21),
(9, 3, '2022-07-28', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 2, 0.21),
(10, 3, '2022-07-29', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 2, 0.21),
(11, 3, '2022-07-30', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 2, 0.21),
(12, 3, '2022-07-31', '17:00:00', 'There is currently no information on this event.', 10.00, 120, 2, 0.21),
(13, 4, '2022-07-28', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(14, 4, '2022-07-29', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(15, 4, '2022-07-30', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(16, 4, '2022-07-31', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(17, 5, '2022-07-28', '17:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(18, 5, '2022-07-29', '17:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(19, 5, '2022-07-30', '17:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(20, 5, '2022-07-31', '17:00:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(21, 6, '2022-07-28', '16:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(22, 6, '2022-07-29', '16:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(23, 6, '2022-07-30', '16:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(24, 6, '2022-07-31', '16:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(25, 7, '2022-07-28', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(26, 7, '2022-07-29', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(27, 7, '2022-07-30', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(28, 7, '2022-07-31', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(29, 8, '2022-07-28', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(30, 8, '2022-07-29', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(31, 8, '2022-07-30', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21),
(32, 8, '2022-07-31', '17:30:00', 'There is currently no information on this event.', 10.00, 90, 3, 0.21);

-- --------------------------------------------------------

--
-- Table structure for table `Invoice`
--

CREATE TABLE `Invoice` (
  `invoiceId` int(225) NOT NULL,
  `orderID` int(255) NOT NULL,
  `totalPrice` int(255) NOT NULL,
  `VAT` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `OrderHistory`
--

CREATE TABLE `OrderHistory` (
  `orderid` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Payment`
--

CREATE TABLE `Payment` (
  `paymentId` int(255) NOT NULL,
  `InvoiceId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `Restaurant`
--

CREATE TABLE `Restaurant` (
  `restaurantID` int(11) NOT NULL,
  `restaurantName` varchar(255) NOT NULL,
  `cuisineType` varchar(255) NOT NULL,
  `restaurantDescription` varchar(2000) NOT NULL,
  `streetName` varchar(255) NOT NULL,
  `houseNumber` int(11) NOT NULL,
  `postalCode` varchar(255) NOT NULL,
  `city` varchar(255) NOT NULL,
  `rating` double(11,2) NOT NULL,
  `seats` int(11) NOT NULL,
  `price` double(11,2) NOT NULL,
  `reservationFee` double(11,2) NOT NULL,
  `imageName` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Restaurant`
--

INSERT INTO `Restaurant` (`restaurantID`, `restaurantName`, `cuisineType`, `restaurantDescription`, `streetName`, `houseNumber`, `postalCode`, `city`, `rating`, `seats`, `price`, `reservationFee`, `imageName`) VALUES
(1, 'Restaurant Mr. & Mrs.', 'Dutch, Fish and Seafood, European', 'Mr. & Mrs. offers an ambiance where you feel at ease.\r\n\r\nMr. creates delicious taste explosions with honest products and Mrs. complements the dishes with the best matching wines.', 'Lange Veerstraat', 4, '2011 DB', 'Haarlem', 4.00, 40, 45.00, 10.00, 'mrandmrs'),
(2, 'Ratatouille', 'French, Fish and Seafood, European', 'The successful Michelin restaurant in Haarlem of chef Jozua Jaring is – just like Ratatouille – a mix of French cuisine in today\'s reality with excellent value for money in an accessible environment in Haarlem. For example, in 2013 we started our restaurant in Haarlem in the Lange Veerstraat and after the move in 2015 we will also continue at our unique monumental location at Het Spaarne with our restaurant in Haarlem.', 'Spaarne', 96, '2011 CL', 'Haarlem', 4.00, 52, 45.00, 10.00, 'ratatouille'),
(3, 'Restaurant ML', 'Dutch, Fish and Seafood, European', 'Restaurant ML is located in the heart of the charming national monument at Klokhuisplein. The restaurant is located in the courtyard of former printer Johan Enschedé and in the old style room of the former home of the Enschedé family. The elegant cuisine of chefs Mark Gratama is daring due to the exciting combination of flavors.', 'Kleine Houtstraat', 70, '2011 DR', 'Haarlem', 4.00, 60, 45.00, 10.00, 'ml'),
(4, 'Restaurant Fris', 'Dutch, French, European', 'In the middle of Haarlem, near the Frederikspark, is Restaurant Fris. A modern restaurant where our chef presents dishes based on classic French cuisine, which he knows how to refine with worldwide influences. Taste fris\'s favorite signature dish, or guilty pleasure. A French croissant with duck liver, Ibérico ham, Savoramosterd with VOC spices, and fig ice cream is a taste bomb with worldwide influences. The wine list represents the Old and New Worlds with a global outlook. Respect for pure and honest products from the region is the motto at Fris, because behind every dish and in every wine there is a particularly passionate story.', 'Twijnderslaan', 7, '2012 BG', 'Haarlem', 4.00, 45, 45.00, 10.00, 'fris'),
(5, 'Specktakel', 'European, International, Asian', 'Specktakel is a unique restaurant centrally located in the heart of Haarlem with special courtyard and terrace. At Specktakel you don\'t eat quietly. Not only because of the conviviality of your company, but also because of the international food and the worldly wine that you enjoy. The colors, aromas and flavors create a wonderful interplay that needs to be talked about...', 'Spekstraat', 4, '2011 HM', 'Haarlem', 3.00, 36, 35.00, 10.00, 'specktakel'),
(6, 'Grand Cafe Brinkmann', 'Dutch, European, Modern', 'You can come to this bar after seeing Grote Markt. Don\'t forget to taste mouthwatering bitterballen, hamburgers and ricotta at Grand Café Brinkmann. Eating good apple pie, biscuits and croissants is what most clients recommend. Don\'t miss the opportunity to drink delicious draft beer, gin or wine. At this place, visitors can try great cappuccino, hot chocolate or tonic.', 'Grote Markt', 13, '2011 RC', 'Haarlem', 3.00, 100, 35.00, 10.00, 'brinkmann'),
(7, 'Urban Frenchy Bistro Toujours', 'Dutch, Fish and Seafood, European', 'For an intimate, cozy and beautiful dinner with friends or family, take a seat in our beautiful restaurant area. With radiant daylight thanks to the domes on our roof. Which provide a magical beautiful light in the evening, when dining under the stars comes very close. Our signature dishes? These are the Côte de Boeuf and the lobster. But of course we serve a much more extensive number of beautiful dishes. We especially recommend that you come and try them all.', 'Oude Groenmarkt', 12, '2012 HL', 'Haarlem', 3.00, 48, 35.00, 10.00, 'toujours'),
(8, 'The Golden Bull', 'Steakhouse, Argentinian, European', 'In addition to high quality steaks, we offer a cozy no-nonsense atmosphere. All this in combination with a wide range of special wines. An experience in which your taste buds are extremely stimulated. All our meat is prepared on the lava stone grill, this creates a huge taste sensation. With us you can still enjoy our luxury whisky range from Scotland and Japan after dinner. Excluding Single Malts.', 'Zijlstraat', 39, '2011 TK', 'Haarlem', 3.00, 60, 35.00, 10.00, 'goldenbull');

-- --------------------------------------------------------

--
-- Table structure for table `Role`
--

CREATE TABLE `Role` (
  `roleId` int(11) NOT NULL,
  `roleType` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Role`
--

INSERT INTO `Role` (`roleId`, `roleType`) VALUES
(1, 'User'),
(2, 'Volunteer'),
(3, 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `Session`
--

CREATE TABLE `Session` (
  `sessionID` int(11) NOT NULL,
  `restaurantID` int(11) NOT NULL,
  `startDate` date NOT NULL,
  `startTime` time NOT NULL,
  `duration` time NOT NULL,
  `ticketsSold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Session`
--

INSERT INTO `Session` (`sessionID`, `restaurantID`, `startDate`, `startTime`, `duration`, `ticketsSold`) VALUES
(33, 1, '2022-07-28', '18:00:00', '01:30:00', 0),
(34, 1, '2022-07-28', '19:30:00', '01:30:00', 0),
(35, 1, '2022-07-28', '21:00:00', '01:30:00', 0),
(36, 1, '2022-07-29', '18:00:00', '01:30:00', 0),
(37, 1, '2022-07-29', '19:30:00', '01:30:00', 0),
(38, 1, '2022-07-29', '21:00:00', '01:30:00', 0),
(39, 1, '2022-07-30', '18:00:00', '01:30:00', 0),
(40, 1, '2022-07-30', '19:30:00', '01:30:00', 0),
(41, 1, '2022-07-30', '21:00:00', '01:30:00', 0),
(42, 1, '2022-07-31', '18:00:00', '01:30:00', 0),
(43, 1, '2022-07-31', '19:30:00', '01:30:00', 0),
(44, 1, '2022-07-31', '21:00:00', '01:30:00', 0),
(45, 2, '2022-07-28', '17:00:00', '02:00:00', 0),
(46, 2, '2022-07-28', '19:00:00', '02:00:00', 0),
(47, 2, '2022-07-28', '21:00:00', '02:00:00', 0),
(48, 2, '2022-07-29', '17:00:00', '02:00:00', 0),
(49, 2, '2022-07-29', '19:00:00', '02:00:00', 0),
(50, 2, '2022-07-29', '21:00:00', '02:00:00', 0),
(51, 2, '2022-07-30', '17:00:00', '02:00:00', 0),
(52, 2, '2022-07-30', '19:00:00', '02:00:00', 0),
(53, 2, '2022-07-30', '21:00:00', '02:00:00', 0),
(54, 2, '2022-07-31', '17:00:00', '02:00:00', 0),
(55, 2, '2022-07-31', '19:00:00', '02:00:00', 0),
(56, 2, '2022-07-31', '21:00:00', '02:00:00', 0),
(57, 3, '2022-07-28', '17:00:00', '02:00:00', 0),
(58, 3, '2022-07-28', '19:00:00', '02:00:00', 0),
(59, 3, '2022-07-29', '17:00:00', '02:00:00', 0),
(60, 3, '2022-07-29', '19:00:00', '02:00:00', 0),
(61, 3, '2022-07-30', '17:00:00', '02:00:00', 0),
(62, 3, '2022-07-30', '19:00:00', '02:00:00', 0),
(63, 3, '2022-07-31', '17:00:00', '02:00:00', 0),
(64, 3, '2022-07-31', '19:00:00', '02:00:00', 0),
(65, 4, '2022-07-28', '17:30:00', '01:30:00', 0),
(66, 4, '2022-07-28', '19:00:00', '01:30:00', 0),
(67, 4, '2022-07-28', '20:30:00', '01:30:00', 0),
(68, 4, '2022-07-29', '17:30:00', '01:30:00', 0),
(69, 4, '2022-07-29', '19:00:00', '01:30:00', 0),
(70, 4, '2022-07-29', '20:30:00', '01:30:00', 0),
(71, 4, '2022-07-30', '17:30:00', '01:30:00', 0),
(72, 4, '2022-07-30', '19:00:00', '01:30:00', 0),
(73, 4, '2022-07-30', '20:30:00', '01:30:00', 0),
(74, 4, '2022-07-31', '17:30:00', '01:30:00', 0),
(75, 4, '2022-07-31', '19:00:00', '01:30:00', 0),
(76, 4, '2022-07-31', '20:30:00', '01:30:00', 0),
(77, 5, '2022-07-28', '17:00:00', '01:30:00', 0),
(78, 5, '2022-07-28', '18:30:00', '01:30:00', 0),
(79, 5, '2022-07-28', '20:00:00', '01:30:00', 0),
(80, 5, '2022-07-29', '17:00:00', '01:30:00', 0),
(81, 5, '2022-07-29', '18:30:00', '01:30:00', 0),
(82, 5, '2022-07-29', '20:00:00', '01:30:00', 0),
(83, 5, '2022-07-30', '17:00:00', '01:30:00', 0),
(84, 5, '2022-07-30', '18:30:00', '01:30:00', 0),
(85, 5, '2022-07-30', '20:00:00', '01:30:00', 0),
(86, 5, '2022-07-31', '17:00:00', '01:30:00', 0),
(87, 5, '2022-07-31', '18:30:00', '01:30:00', 0),
(88, 5, '2022-07-31', '20:00:00', '01:30:00', 0),
(89, 6, '2022-07-28', '16:30:00', '01:30:00', 0),
(90, 6, '2022-07-28', '18:00:00', '01:30:00', 0),
(91, 6, '2022-07-28', '19:30:00', '01:30:00', 0),
(92, 6, '2022-07-29', '16:30:00', '01:30:00', 0),
(93, 6, '2022-07-29', '18:00:00', '01:30:00', 0),
(94, 6, '2022-07-29', '19:30:00', '01:30:00', 0),
(95, 6, '2022-07-30', '16:30:00', '01:30:00', 0),
(96, 6, '2022-07-30', '18:00:00', '01:30:00', 0),
(97, 6, '2022-07-30', '19:30:00', '01:30:00', 0),
(98, 6, '2022-07-31', '16:30:00', '01:30:00', 0),
(99, 6, '2022-07-31', '18:00:00', '01:30:00', 0),
(100, 6, '2022-07-31', '19:30:00', '01:30:00', 0),
(101, 7, '2022-07-28', '17:30:00', '01:30:00', 0),
(102, 7, '2022-07-28', '19:00:00', '01:30:00', 0),
(103, 7, '2022-07-28', '20:30:00', '01:30:00', 0),
(104, 7, '2022-07-29', '17:30:00', '01:30:00', 0),
(105, 7, '2022-07-29', '19:00:00', '01:30:00', 0),
(106, 7, '2022-07-29', '20:30:00', '01:30:00', 0),
(107, 7, '2022-07-30', '17:30:00', '01:30:00', 0),
(108, 7, '2022-07-30', '19:00:00', '01:30:00', 0),
(109, 7, '2022-07-30', '20:30:00', '01:30:00', 0),
(110, 7, '2022-07-31', '17:30:00', '01:30:00', 0),
(111, 7, '2022-07-31', '19:00:00', '01:30:00', 0),
(112, 7, '2022-07-31', '20:30:00', '01:30:00', 0),
(113, 8, '2022-07-28', '17:30:00', '01:30:00', 0),
(114, 8, '2022-07-28', '19:00:00', '01:30:00', 0),
(115, 8, '2022-07-28', '20:30:00', '01:30:00', 0),
(116, 8, '2022-07-29', '17:30:00', '01:30:00', 0),
(117, 8, '2022-07-29', '19:00:00', '01:30:00', 0),
(118, 8, '2022-07-29', '20:30:00', '01:30:00', 0),
(119, 8, '2022-07-30', '17:30:00', '01:30:00', 0),
(120, 8, '2022-07-30', '19:00:00', '01:30:00', 0),
(121, 8, '2022-07-30', '20:30:00', '01:30:00', 0),
(122, 8, '2022-07-31', '17:30:00', '01:30:00', 0),
(123, 8, '2022-07-31', '19:00:00', '01:30:00', 0),
(124, 8, '2022-07-31', '20:30:00', '01:30:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `Ticket`
--

CREATE TABLE `Ticket` (
  `ticketId` int(11) NOT NULL,
  `eventId` int(11) NOT NULL,
  `numberOfTickets` int(11) NOT NULL,
  `totalPriceOfTicket` float NOT NULL,
  `orderId` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `User`
--

CREATE TABLE `User` (
  `userID` int(11) NOT NULL,
  `firstName` varchar(255) NOT NULL,
  `lastName` varchar(255) NOT NULL,
  `username` varchar(128) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telephoneNumber` varchar(255) NOT NULL,
  `roleID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `User`
--

INSERT INTO `User` (`userID`, `firstName`, `lastName`, `username`, `email`, `password`, `telephoneNumber`, `roleID`) VALUES
(2, 'Alex', 'Arkhipov', 'paxer2k', 'alex@arkhipov.nl', 'test12345', '06043284938', 1);

-- --------------------------------------------------------

--
-- Table structure for table `Venue`
--

CREATE TABLE `Venue` (
  `venueId` int(11) NOT NULL,
  `venueName` varchar(255) NOT NULL,
  `adress` varchar(255) NOT NULL,
  `houseNumber` int(11) NOT NULL,
  `postCode` varchar(10) NOT NULL,
  `city` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `imageID` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Venue`
--

INSERT INTO `Venue` (`venueId`, `venueName`, `adress`, `houseNumber`, `postCode`, `city`, `description`, `imageID`) VALUES
(1, 'Springffffffff', 'Springstraat', 25, '1089KL', 'Haarlem', 'awesome', ''),
(2, 'sdfg', '2322e3re', 23, 'asdf', 'dfsgh', 'asdfg', ''),
(3, 'xo club', '', 0, '', '', '', ''),
(4, 'vbbbbbbbb', '', 0, '', '', '', ''),
(5, 'vbbbbbbbb', '', 0, '', '', '', ''),
(6, 'vbbbbbbbb', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `_Order`
--

CREATE TABLE `_Order` (
  `orderId` int(11) NOT NULL,
  `totalPriceOfOrder` float NOT NULL,
  `isPaid` varchar(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Account`
--
ALTER TABLE `Account`
  ADD PRIMARY KEY (`accountId`),
  ADD KEY `roleId` (`roleId`);

--
-- Indexes for table `Artist`
--
ALTER TABLE `Artist`
  ADD PRIMARY KEY (`artistId`);

--
-- Indexes for table `Customer`
--
ALTER TABLE `Customer`
  ADD PRIMARY KEY (`userid`);

--
-- Indexes for table `Dance`
--
ALTER TABLE `Dance`
  ADD PRIMARY KEY (`eventId`),
  ADD KEY `venueId` (`venueId`),
  ADD KEY `artistId` (`artistId`);

--
-- Indexes for table `Food`
--
ALTER TABLE `Food`
  ADD PRIMARY KEY (`foodEventID`),
  ADD KEY `restaurantID` (`restaurantID`);

--
-- Indexes for table `Invoice`
--
ALTER TABLE `Invoice`
  ADD PRIMARY KEY (`invoiceId`);

--
-- Indexes for table `OrderHistory`
--
ALTER TABLE `OrderHistory`
  ADD PRIMARY KEY (`orderid`);

--
-- Indexes for table `Payment`
--
ALTER TABLE `Payment`
  ADD PRIMARY KEY (`paymentId`);

--
-- Indexes for table `Restaurant`
--
ALTER TABLE `Restaurant`
  ADD PRIMARY KEY (`restaurantID`);

--
-- Indexes for table `Role`
--
ALTER TABLE `Role`
  ADD PRIMARY KEY (`roleId`);

--
-- Indexes for table `Session`
--
ALTER TABLE `Session`
  ADD PRIMARY KEY (`sessionID`),
  ADD KEY `restaurantID` (`restaurantID`);

--
-- Indexes for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD PRIMARY KEY (`ticketId`),
  ADD KEY `orderId` (`orderId`);

--
-- Indexes for table `User`
--
ALTER TABLE `User`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `roleID` (`roleID`);

--
-- Indexes for table `Venue`
--
ALTER TABLE `Venue`
  ADD PRIMARY KEY (`venueId`);

--
-- Indexes for table `_Order`
--
ALTER TABLE `_Order`
  ADD PRIMARY KEY (`orderId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Account`
--
ALTER TABLE `Account`
  MODIFY `accountId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Artist`
--
ALTER TABLE `Artist`
  MODIFY `artistId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Customer`
--
ALTER TABLE `Customer`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Dance`
--
ALTER TABLE `Dance`
  MODIFY `eventId` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Invoice`
--
ALTER TABLE `Invoice`
  MODIFY `invoiceId` int(225) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `OrderHistory`
--
ALTER TABLE `OrderHistory`
  MODIFY `orderid` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Payment`
--
ALTER TABLE `Payment`
  MODIFY `paymentId` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Restaurant`
--
ALTER TABLE `Restaurant`
  MODIFY `restaurantID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `Role`
--
ALTER TABLE `Role`
  MODIFY `roleId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `Session`
--
ALTER TABLE `Session`
  MODIFY `sessionID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `Ticket`
--
ALTER TABLE `Ticket`
  MODIFY `ticketId` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `User`
--
ALTER TABLE `User`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Venue`
--
ALTER TABLE `Venue`
  MODIFY `venueId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `_Order`
--
ALTER TABLE `_Order`
  MODIFY `orderId` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `Account`
--
ALTER TABLE `Account`
  ADD CONSTRAINT `Account_ibfk_1` FOREIGN KEY (`roleId`) REFERENCES `Role` (`roleId`);

--
-- Constraints for table `Customer`
--
ALTER TABLE `Customer`
  ADD CONSTRAINT `Customer_ibfk_1` FOREIGN KEY (`userid`) REFERENCES `User` (`userID`);

--
-- Constraints for table `Dance`
--
ALTER TABLE `Dance`
  ADD CONSTRAINT `Dance_ibfk_1` FOREIGN KEY (`venueId`) REFERENCES `Venue` (`venueId`),
  ADD CONSTRAINT `Dance_ibfk_2` FOREIGN KEY (`artistId`) REFERENCES `Artist` (`artistId`);

--
-- Constraints for table `Food`
--
ALTER TABLE `Food`
  ADD CONSTRAINT `Food_ibfk_1` FOREIGN KEY (`restaurantID`) REFERENCES `Restaurant` (`restaurantID`);

--
-- Constraints for table `Session`
--
ALTER TABLE `Session`
  ADD CONSTRAINT `Session_ibfk_1` FOREIGN KEY (`restaurantID`) REFERENCES `Restaurant` (`restaurantID`);

--
-- Constraints for table `Ticket`
--
ALTER TABLE `Ticket`
  ADD CONSTRAINT `Ticket_ibfk_1` FOREIGN KEY (`orderId`) REFERENCES `_Order` (`orderId`);

--
-- Constraints for table `User`
--
ALTER TABLE `User`
  ADD CONSTRAINT `User_ibfk_1` FOREIGN KEY (`roleID`) REFERENCES `Role` (`roleId`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
