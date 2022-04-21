-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: 20.04.2022 klo 20:04
-- Palvelimen versio: 10.5.13-MariaDB-1:10.5.13+maria~buster
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tietojenkasittely_lainaus`
--

-- --------------------------------------------------------

--
-- Rakenne taululle `lainaus`
--

CREATE TABLE `lainaus` (
  `LainausID` int(11) NOT NULL,
  `LainausTeksti` text NOT NULL,
  `LainausAlkupera` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vedos taulusta `lainaus`
--

INSERT INTO `lainaus` (`LainausID`, `LainausTeksti`, `LainausAlkupera`) VALUES
(1, 'Ei elämästä selviä hengissä', 'Juice Leskinen'),
(2, 'Imagine there is no heaven No hell below us', 'John Lennon'),
(3, 'Harva meistä on rautaa', 'Frederik'),
(4, 'Katson sineen taivaan', 'Katri Helena'),
(5, 'Minä olin lentäjän poika lähes sankari siis itsekin', 'Edu Kettunen'),
(6, 'Älä pure mun ananasta', 'Lapinlahden Linnut'),
(7, 'Rappiolla on hyvä olla', 'Hassisen Kone'),
(8, 'On a dark desert highway, cool wind in my hair. Warm smell of colitas, rising up through the air', 'The Eagles'),
(9, 'Morning has broken like the first morning. Blackbird has spoken like the first bird', 'Cat Stevens'),
(10, 'Sä olet yksin yksinäinen. Mä olen yksin yksinäinen. Mä olen onnen kerjäläinen. Kurjuuden kuningas', 'Tuomari Nurmio'),
(11, 'Tyttö näki sillalta kuinka mustaa. Vesi oli alhaall jossakin.', 'Hector'),
(12, 'Pidä huolta. Itsestäs ja niistä jotka kärsii.', 'Pave Maijanen'),
(13, 'Hello darkness my old friend. I\'ve come to talk with you again.', 'Simon&Garfunkel'),
(14, 'Tänään on tullut sun päiväsi, nyt on sinun vuorosi loistaa', 'Juha Tapio'),
(15, 'Yksi päivä seitsemästä, aurinkoista toivoin tästä. Sunnuntaina sataa aina pian on sunnuntai.', 'Tapio Rautavaara'),
(16, 'Sanovat jos jossain huomaa tähdenlennon niin Toivoa voit\'silloin mitä vaan', 'Jenni Vartiainen'),
(17, 'En tavallisesti, tai milloinkaan. Ole lumoutunut kuten aamulla', 'Kauko Röyhkä'),
(18, 'Pieni ja hento ote ihmisestä kiinni', 'Dave Lindholm'),
(19, 'Some folks are born silver spoon in hand', 'John Foverty (CCR)'),
(20, 'You spend your life waiting for a moment that just don\'t come', 'Bruce Springsteen'),
(21, 'And the sun went down as I crossed the hill. And the town lit up, the world got still', 'Tom Petty');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lainaus`
--
ALTER TABLE `lainaus`
  ADD PRIMARY KEY (`LainausID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lainaus`
--
ALTER TABLE `lainaus`
  MODIFY `LainausID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
