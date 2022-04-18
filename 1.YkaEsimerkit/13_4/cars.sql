-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 12.04.2022 klo 14:45
-- Palvelimen versio: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cars`
--
CREATE DATABASE IF NOT EXISTS `cars` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cars`;

-- --------------------------------------------------------

--
-- Rakenne taululle `car`
--

DROP TABLE IF EXISTS `car`;
CREATE TABLE `car` (
  `register` varchar(7) NOT NULL,
  `manufacturer` varchar(30) NOT NULL,
  `model` varchar(30) NOT NULL,
  `colour` varchar(20) NOT NULL,
  `year` int(4) NOT NULL,
  `enginetype` varchar(20) NOT NULL,
  `km` varchar(20) NOT NULL,
  `price` double NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Vedos taulusta `car`
--

INSERT INTO `car` (`register`, `manufacturer`, `model`, `colour`, `year`, `enginetype`, `km`, `price`) VALUES
('KIN-243', 'Opel', 'Astra Sports Tourer', 'Navy Blue', 2011, '1.4 16v', '130000', 8300),
('GEL-295', 'Peugeot', '508', 'White', 2012, '1.8 D', '230000', 4500),
('GEL-123', 'Renault', 'Clio', 'Red', 2015, '1.2', '123000', 7400),
('HJK-123', 'Mercedes Benz', 'C200', 'Brown', 2009, '2.0TDI', '223000', 3400),
('CAC-130', 'Opel', 'Insignia', 'Casablanca White', 2016, '2.0', '90000', 16000),
('YBN-445', 'Peugeot', '3008', 'Blue', 2010, '1.6 HDI', '145000', 12000),
('XIB-909', 'Audi', 'A4 Quattro', 'Black', 2017, '1.8 T', '45000', 22300),
('FFH-121', 'Volkswagen', 'Passat', 'Light blue', 2016, '2.0D', '90000', 22000),
('JBC-223', 'Skoda', 'Octavia', 'Blue', 2018, 'Diesel', '57000', 19900),
('GHH-343', 'Skoda', 'Octavia', 'White', 2017, 'Diesel', '67000', 19000),
('IIV-987', 'Toyota', 'Corolla', 'Silver', 2018, 'Hybrid', '3400', 23000),
('YUY-899', 'Nissan', 'Navara', 'Red', 2015, '2.0 TDI', '34500', 17000),
('LLL-333', 'Volvo', 'V40', 'valkea', 2010, '1.6D', '230000', 5000),
('RUT-123', 'Audi', 'A4 Allroad Quattro', 'Black', 2019, 'Diesel', '67000', 27000),
('GLJ-218', 'Opel', 'Astra Sporst Tourer', 'Ocean blue', 2014, '1.4 Ecoflex', '145000', 9000),
('LNR-213', 'Volvo', 'V60', 'White', 2017, 'D3', '122000', 18900);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `car`
--
ALTER TABLE `car`
  ADD PRIMARY KEY (`register`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
