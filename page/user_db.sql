-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 12, 2022 at 02:13 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `kupljenekarte`
--

CREATE TABLE `kupljenekarte` (
  `id` int(11) NOT NULL,
  `datum` date NOT NULL,
  `film` varchar(25) NOT NULL,
  `termin` varchar(25) NOT NULL,
  `broj_karata` int(25) NOT NULL,
  `cijena` varchar(100) NOT NULL,
  `ukupnacijena` varchar(25) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kupljenekarte`
--

INSERT INTO `kupljenekarte` (`id`, `datum`, `film`, `termin`, `broj_karata`, `cijena`, `ukupnacijena`, `user_id`) VALUES
(68, '2022-12-31', 'Fight Club - Remastered', '12:00', 1, '2.4', '2.4', 1),
(69, '2022-12-23', 'Harry Potter', '12:00', 1, '2.4', '2.4', 1),
(72, '2022-12-29', 'Harry Potter', '20:00', 1, '2.4', '2.4', 1),
(74, '2022-12-28', 'Harry Potter', '12:00', 1, '2.4', '2.4', 1),
(75, '2022-12-30', 'Harry Potter', '20:00', 3, '2.4', '7.2', 1),
(78, '2022-12-23', 'Harry Potter', '20:00', 1, '2.4', '2.4', 3);

-- --------------------------------------------------------

--
-- Table structure for table `movies`
--

CREATE TABLE `movies` (
  `id` int(25) NOT NULL,
  `movie` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `movies`
--

INSERT INTO `movies` (`id`, `movie`) VALUES
(1, 'Harry Potter'),
(3, 'The Lord of the Rings'),
(4, 'Fight Club - Remastered');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `surname` varchar(150) NOT NULL,
  `username` varchar(150) NOT NULL,
  `email` varchar(150) NOT NULL,
  `broj` varchar(150) NOT NULL,
  `grad` varchar(150) NOT NULL,
  `date` date NOT NULL,
  `password` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `surname`, `username`, `email`, `broj`, `grad`, `date`, `password`) VALUES
(1, 'Jovan', 'Soskic', 'jsoskic', 'jovansoskic1@gmail.com', '+382 688888', 'bar', '1999-07-22', 'sifrica1'),
(2, 'Test', 'Testic', 'testic87', 'john@gmail.com', '+889933', 'niksic', '1999-07-30', 'testic1'),
(3, 'Mell', 'Gibson', 'mellg', 'mel@gmail.com', '+389022332', 'podgorica', '1999-07-22', 'sifra1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kupljenekarte`
--
ALTER TABLE `kupljenekarte`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_KartaUser` (`user_id`);

--
-- Indexes for table `movies`
--
ALTER TABLE `movies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kupljenekarte`
--
ALTER TABLE `kupljenekarte`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `movies`
--
ALTER TABLE `movies`
  MODIFY `id` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `kupljenekarte`
--
ALTER TABLE `kupljenekarte`
  ADD CONSTRAINT `FK_KartaUser` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
