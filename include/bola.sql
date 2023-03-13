-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2023 at 11:01 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bola`
--

-- --------------------------------------------------------

--
-- Table structure for table `klub`
--

CREATE TABLE `klub` (
  `id` int(11) NOT NULL,
  `nama_klub` varchar(200) NOT NULL,
  `nama_kota` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `klub`
--

INSERT INTO `klub` (`id`, `nama_klub`, `nama_kota`) VALUES
(1, 'Persib FC', 'Bandung'),
(2, 'Persija Fc', 'Jakarta'),
(3, 'Persibaya FC', 'Surabaya'),
(4, 'Borneo FC', 'Kalimantan');

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `id_klub` int(11) NOT NULL,
  `main` int(11) NOT NULL,
  `menang` int(11) NOT NULL,
  `seri` int(11) NOT NULL,
  `kalah` int(11) NOT NULL,
  `goal_menang` int(11) NOT NULL,
  `goal_kalah` int(11) NOT NULL,
  `point` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `score`
--

INSERT INTO `score` (`id`, `id_klub`, `main`, `menang`, `seri`, `kalah`, `goal_menang`, `goal_kalah`, `point`) VALUES
(1, 1, 5, 3, 0, 2, 18, 3, 9),
(2, 2, 6, 3, 1, 3, 18, 7, 10),
(3, 3, 3, 1, 1, 3, 5, 10, 4),
(4, 4, 3, 1, 2, 1, 9, 2, 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `klub`
--
ALTER TABLE `klub`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `klub`
--
ALTER TABLE `klub`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
