-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 08, 2022 at 01:15 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `buurtstemdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `text` varchar(300) NOT NULL,
  `userId` int(11) NOT NULL,
  `topicId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `text`, `userId`, `topicId`) VALUES
(1, 'Het bevordert tevens het sociaal contact tussen buurtbewoners!', 2, 1);

-- --------------------------------------------------------

--
-- Table structure for table `dislikes`
--

CREATE TABLE `dislikes` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `topicId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `topicId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `likes`
--

INSERT INTO `likes` (`id`, `userId`, `topicId`) VALUES
(1, 2, 1),
(2, 1, 2);

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `userId` int(11) NOT NULL,
  `title` varchar(300) NOT NULL,
  `description` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `userId`, `title`, `description`, `date`) VALUES
(1, 1, 'Openluchtfitnesstoestellen', 'Fitness is op dit moment met voorsprong de populairste sport. Deze sporttak is meestal indoor waarbij je verplicht bent om je betalend lid te maken om deze sport uit te oefenen. Fitness is voor kansarme of minder begoede bewoners dan ook geen evidentie om te beoefenen. Mijn voorstel is om, waar mogelijk, openluchtfitnesstoestellen te plaatsen.', '2022-06-08'),
(2, 2, 'Spray Park', 'Kinderen zijn veel zintuiglijker ingesteld dan volwassenen. Voor hen is het belangrijk om te kunnen voelen, te zien en om invloed uit te kunnen oefenen op hun (speel)omgeving. Het spelen met water vervult deze behoefte en kinderen voelen zich dan ook van nature aangetrokken tot water.', '2022-06-08');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(300) NOT NULL,
  `lastname` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `streetname` varchar(300) NOT NULL,
  `number` varchar(300) NOT NULL,
  `place` varchar(300) NOT NULL,
  `profile_picture` varchar(300) NOT NULL DEFAULT 'profile_picture/default.png',
  `biography` varchar(300) NOT NULL DEFAULT 'Schrijf hier een korte introductie van jezelf'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `streetname`, `number`, `place`, `profile_picture`, `biography`) VALUES
(1, 'Marianne', 'Neuts', 'marianneneuts@gmail.com', '$2y$12$IqmmFVtZ0lst7rTfDV.iXOYVp4NaPzB2KeYwWXDRXXql1vGEGapUC', 'Raghenoplein', '21', 'Mechelen', 'profile_picture/default.png', 'Hé, hallo daar! Ik ben Marianne, intussen 20 jaar. Wat fijn dat je langskomt op mijn profiel!'),
(2, 'Lauren', 'Van Der Linden', 'laurenvdl45@gmail.com ', '$2y$12$HzhsXjNXabPlxzJnrnmosulnHnUSVZ.s5j7NJNJhV/joUxzTWoZL.', 'Raghenoplein', '21', 'Mechelen', 'profile_picture/default.png', 'Schrijf hier een korte introductie van jezelf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dislikes`
--
ALTER TABLE `dislikes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dislikes`
--
ALTER TABLE `dislikes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
