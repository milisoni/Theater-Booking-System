-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 11, 2024 at 07:32 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbmovies`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `bookingid` int(11) NOT NULL,
  `theaterid` int(11) NOT NULL,
  `bookingdate` date NOT NULL,
  `person` varchar(50) NOT NULL,
  `userid` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`bookingid`, `theaterid`, `bookingdate`, `person`, `userid`, `status`) VALUES
(1, 9, '2024-10-19', '2', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `catid` int(11) NOT NULL,
  `catname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`catid`, `catname`) VALUES
(1, 'Hollywood'),
(2, 'Bollywood');

-- --------------------------------------------------------

--
-- Table structure for table `classes`
--

CREATE TABLE `classes` (
  `classid` int(11) NOT NULL,
  `classname` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `movieid` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` varchar(250) NOT NULL,
  `releasedate` date NOT NULL,
  `image` varchar(1000) NOT NULL,
  `trailer` varchar(1000) NOT NULL,
  `rating` varchar(50) NOT NULL,
  `catid` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`movieid`, `title`, `description`, `releasedate`, `image`, `trailer`, `rating`, `catid`) VALUES
(1, 'Kalki 2898-AD', 'The future of those in the dystopian city of Kasi is altered when the destined arrival of Lord Vishnus final avatar launches a war against darkness.', '2024-08-30', 'KALKI -2898 AD.jpg', 'Kalki Trailer.mp4', '', 2),
(2, ' Dune: Part Two', 'Paul Atreides unites with Chani and the Fremen while seeking revenge against the conspirators who destroyed his family.', '2024-09-06', 'Dune.jpg', 'Dune 2 Trailer.mp4', '', 1),
(3, 'Jigra', 'It is a heart wrenching tale of a sister taking on the world to avenge her brother. Their odyssey of reunification tests their bond, their morals, and their inner strengths. Who wouldnt set the world on fire to protect whats theirs?', '2024-10-11', 'Jigra.jpeg', 'Jigra.mp4', '', 2),
(4, ' Joker: Folie à Deux', 'Struggling with his dual identity, failed comedian Arthur Fleck meets the love of his life, Harley Quinn, while incarcerated at Arkham State Hospital.', '2024-10-04', 'Joker- Folie a Deux.jpeg', 'Joker.mp4', '', 1),
(5, 'Land of Bad', 'A Delta Force team fights for survival as an Air Force drone pilot becomes its eyes in the sky.', '2024-09-13', 'Land Of Bad.jpg', 'Land of Bad Trailer.mp4', '', 1),
(6, 'Stree 2', 'After the events of Stree, the town of Chanderi is being haunted again. This time, women are mysteriously abducted by a terrifying headless entity. Once again, its up to Vicky and his friends to save their town and loved ones.', '2024-09-20', 'Stree 2.jpeg', 'Stree 2.mp4', '', 2),
(7, 'Vedaa', 'The journey of a young woman, who faces and resists a repressive system against portrayal of an antagonist.', '2024-09-20', 'Vedaa.jpg', 'Vedaa Trailer.mp4', '', 2),
(8, 'Venom: The Last Dance', 'Eddie and Venom are on the run. Hunted by both of their worlds and with the net closing in, the duo are forced into a devastating decision that will bring the curtains down on Venom and Eddies last dance.', '2024-10-25', 'Venom - The Last Dance.jpg', 'Venom - The Last Dnace - trailer.mp4', '', 1),
(9, 'Udan Chhoo', 'Udan Chhoo is a Gujarati Movie starring Deven Bhojani, Prachee Shah Paandya, Aarohi and Aarjav Trivedi in prominent roles.', '2024-10-04', 'Udan Chhoo.jpeg', 'Udan Chhoo.mp4', '', 2);

-- --------------------------------------------------------

--
-- Table structure for table `theater`
--

CREATE TABLE `theater` (
  `theaterid` int(11) NOT NULL,
  `theater_name` varchar(50) NOT NULL,
  `location` varchar(100) NOT NULL,
  `movieid` varchar(50) NOT NULL,
  `timing` varchar(50) NOT NULL,
  `days` varchar(50) NOT NULL,
  `date` date NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theater`
--

INSERT INTO `theater` (`theaterid`, `theater_name`, `location`, `movieid`, `timing`, `days`, `date`, `price`) VALUES
(1, 'Cinepolis: Inorbit Mall', 'Inorbit Mall Vadodara', '1', '20:20', 'Friday', '2024-10-11', 220),
(2, 'INOX: Taksh Galaxy Mall', 'Taksh Galaxy Mall, Vadodara', '1', '16:40', 'Saturday', '2024-10-12', 250),
(3, 'INOX: Race Course Circle', 'Race Course Rd', '9', '18:15', 'Sunday', '2024-10-13', 150),
(4, 'Bansal Movieplex Gotri', 'Gotri-Vasna Road, Vadodara', '6', '15:00', 'Saturday', '2024-10-12', 180),
(5, 'Cinemarc: Akota, Vadodara', 'Akota Rd, Vadodara', '7', '10:20', 'Sunday', '2024-10-13', 140),
(6, 'PVR: EVA Mall', 'EVA Mall, Vadodara', '4', '15:25', 'Monday', '2024-10-14', 210),
(7, 'PVR: Nilamber Triumph', 'Nilamber Triumph, Vadodara', '5', '21:30', 'Saturday', '2024-10-19', 190),
(8, 'INOX: Reliance Mega Mall', 'Reliance Mega Mall, Vadodara', '8', '14:20', 'Friday', '2024-10-18', 200),
(9, 'PVR: EVA Mall', 'EVA Mall, Vadodara', '6', '10:30', 'Saturday', '2024-10-19', 130);

-- --------------------------------------------------------

--
-- Table structure for table `theaterlist`
--

CREATE TABLE `theaterlist` (
  `theaterid` int(10) NOT NULL,
  `theatername` varchar(50) NOT NULL,
  `theateraddr` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `theaterlist`
--

INSERT INTO `theaterlist` (`theaterid`, `theatername`, `theateraddr`) VALUES
(1, 'Cinepolis: Inorbit Mall', 'Inorbit Mall Vadodara'),
(2, 'INOX: Race Course Circle', 'Race Course Rd'),
(3, 'INOX: Reliance Mega Mall', 'Reliance Mega Mall, Vadodara'),
(4, 'Bansal Movieplex Gotri', 'Gotri-Vasna Road, Vadodara'),
(5, 'Cinemarc: Akota, Vadodara', 'Akota Rd, Vadodara'),
(6, 'INOX: Taksh Galaxy Mall', 'Taksh Galaxy Mall, Vadodara'),
(7, 'PVR: EVA Mall', 'EVA Mall, Vadodara'),
(8, 'PVR: Nilamber Triumph', 'Nilamber Triumph, Vadodara');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userId` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `rotype` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userId`, `name`, `email`, `password`, `rotype`) VALUES
(1, 'admin', 'admin@gmail.com', '123', 1),
(2, 'Mili Soni', 'milisoni0702@gmail.com', 'mypassword123', 2),
(3, 'Shruti', 'shruti@gmail.com', 'password', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`bookingid`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`catid`);

--
-- Indexes for table `classes`
--
ALTER TABLE `classes`
  ADD PRIMARY KEY (`classid`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`movieid`);

--
-- Indexes for table `theater`
--
ALTER TABLE `theater`
  ADD PRIMARY KEY (`theaterid`);

--
-- Indexes for table `theaterlist`
--
ALTER TABLE `theaterlist`
  ADD PRIMARY KEY (`theaterid`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `bookingid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `catid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `classes`
--
ALTER TABLE `classes`
  MODIFY `classid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `movieid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theater`
--
ALTER TABLE `theater`
  MODIFY `theaterid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `theaterlist`
--
ALTER TABLE `theaterlist`
  MODIFY `theaterid` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
