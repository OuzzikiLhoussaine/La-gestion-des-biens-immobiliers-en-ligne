-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le : lun. 09 mai 2022 à 22:52
-- Version du serveur : 10.4.22-MariaDB
-- Version de PHP : 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `estateagency`
--

-- --------------------------------------------------------

--
-- Structure de la table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(55) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', 'admin', 'admin@gmail.com');

-- --------------------------------------------------------

--
-- Structure de la table `agents`
--

CREATE TABLE `agents` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Mobile_no` varchar(15) NOT NULL,
  `cnic_no` varchar(20) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `contact_no` varchar(15) NOT NULL,
  `comments` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `p_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `Name`, `email`, `contact_no`, `comments`, `date`, `p_id`) VALUES
(6, 'Mourad Ouzziki', 'mouradouzziki@gmail.com', '0650417675', 'heloo i am ', '2030-04-22 04:03:00', 5);

-- --------------------------------------------------------

--
-- Structure de la table `flats`
--

CREATE TABLE `flats` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(55) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL,
  `pic5` varchar(255) DEFAULT NULL,
  `pic6` varchar(255) DEFAULT NULL,
  `location` varchar(100) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `rooms` varchar(20) NOT NULL,
  `bathrooms` varchar(20) NOT NULL,
  `garage` varchar(10) NOT NULL,
  `kitchan` varchar(10) NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `flats`
--

INSERT INTO `flats` (`id`, `area`, `price`, `status`, `pic`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `location`, `discription`, `Date`, `rooms`, `bathrooms`, `garage`, `kitchan`, `u_id`) VALUES
(5, '6000', '5000', 'RENT', '4.png', '4.png', '3.png', '4.png', '1.png', '3.png', 'ouarzazate', 'appartemant pour location', '2023-04-22 08:55:00', '5', '5', '1', '2', 14),
(9, '60000', '300000', 'SALE', '11.png', '22.png', '33.png', '44.png', '55.png', '66.png', 'Maroc Tanger', 'Maison trés bonne', '2002-05-22 11:32:00', '4', '4', '1', '1', 15),
(10, '586', '460000', 'SALE', 'property-6.jpg', 'property-7.jpg', 'property-8.jpg', 'property-9.jpg', 'property-10.jpg', 'property-7.jpg', 'maroc, agadir', 'un maison a vendre', '2009-05-22 03:06:00', '6', '4', '1', '2', 16);

-- --------------------------------------------------------

--
-- Structure de la table `lands`
--

CREATE TABLE `lands` (
  `id` int(11) NOT NULL,
  `area` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `status` varchar(55) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL,
  `pic5` varchar(255) DEFAULT NULL,
  `pic6` varchar(255) DEFAULT NULL,
  `location` varchar(255) NOT NULL,
  `discription` varchar(255) NOT NULL,
  `Date` datetime NOT NULL,
  `u_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `lands`
--

INSERT INTO `lands` (`id`, `area`, `price`, `status`, `pic`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `location`, `discription`, `Date`, `u_id`) VALUES
(5, '10000', '50000', 'LEASE', 'WhatsApp Image 2022-05-04 at 12.51.38.jpeg', 'WhatsApp Image 2022-05-04 at 12.51.36.jpeg', NULL, NULL, NULL, NULL, 'marakech', 'discription ', '2004-05-22 03:23:00', 14),
(6, '200', '50000', 'LEASE', 'WhatsApp Image 2022-05-04 at 12.51.36 (1).jpeg', 'WhatsApp Image 2022-05-04 at 12.51.37.jpeg', NULL, NULL, NULL, NULL, 'mrakech', 'discription', '2005-05-22 03:03:00', 15);

-- --------------------------------------------------------

--
-- Structure de la table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `subject` varchar(100) NOT NULL,
  `message` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `properties`
--

CREATE TABLE `properties` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `property_type` varchar(255) NOT NULL,
  `area` varchar(100) NOT NULL,
  `price` varchar(100) NOT NULL,
  `rooms` varchar(20) NOT NULL,
  `bathrooms` varchar(20) NOT NULL,
  `garage` varchar(20) NOT NULL,
  `kitchan` varchar(20) NOT NULL,
  `year` date NOT NULL,
  `status` varchar(20) NOT NULL,
  `pic` varchar(255) NOT NULL,
  `pic2` varchar(255) NOT NULL,
  `pic3` varchar(255) DEFAULT NULL,
  `pic4` varchar(255) DEFAULT NULL,
  `pic5` varchar(255) DEFAULT NULL,
  `pic6` varchar(255) DEFAULT NULL,
  `discription` varchar(255) NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `properties`
--

INSERT INTO `properties` (`id`, `location`, `property_type`, `area`, `price`, `rooms`, `bathrooms`, `garage`, `kitchan`, `year`, `status`, `pic`, `pic2`, `pic3`, `pic4`, `pic5`, `pic6`, `discription`, `u_id`) VALUES
(2, 'KDA, Karak, KPK.', 'HOUSE', '20', '255000', '4', '3', '1', '1', '2020-08-20', 'SALE', 'property-6.jpg', 'post-7.jpg', NULL, NULL, NULL, NULL, '', 0),
(3, 'Sabar Abad, KPK, Pakisatan.', 'LAND', '17', '176000', '0', '0', '0', '0', '2020-08-30', 'SALE', 'IMG-20200804-WA0039.jpg', 'IMG-20200804-WA0039.jpg', NULL, NULL, NULL, NULL, '', 0),
(4, 'Mita Khel, KPK, Pakistan.', 'HOSTEL', '400', '455000', '104', '65', '23', '4', '2020-08-31', 'RENT', 'post-1.jpg', 'post-1.jpg', NULL, NULL, NULL, NULL, '', 0);

-- --------------------------------------------------------

--
-- Structure de la table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `reply` varchar(255) NOT NULL,
  `date` datetime NOT NULL,
  `pic` varchar(255) NOT NULL,
  `u_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `F_name` varchar(100) NOT NULL,
  `Address` varchar(255) NOT NULL,
  `cnic_no` varchar(20) NOT NULL,
  `contact_no` varchar(20) NOT NULL,
  `user_status` varchar(20) NOT NULL DEFAULT '1',
  `email` varchar(255) NOT NULL,
  `password` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `Name`, `F_name`, `Address`, `cnic_no`, `contact_no`, `user_status`, `email`, `password`, `image`) VALUES
(14, 'Mourad', 'mmm', 'ouarzazate', '1234567890123', '0650417675', '1', 'mouradouzziki@gmail.com', '1234', 'student.png'),
(15, 'soukaina', 'yyy', ' Maroc tanger ', '111111111111111', '+212660606060', '1', 'soukaina@gmail.com', '1212', 'profil1.png'),
(16, 'Ahmed', 'mohamed', 'Maroc, Agadir ', '111111111111112', '+2126606060', '1', 'ahmed@gamil.com', '1234', 'about-2.jpg');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `agents`
--
ALTER TABLE `agents`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `flats`
--
ALTER TABLE `flats`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `lands`
--
ALTER TABLE `lands`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `properties`
--
ALTER TABLE `properties`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT pour la table `agents`
--
ALTER TABLE `agents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `flats`
--
ALTER TABLE `flats`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT pour la table `lands`
--
ALTER TABLE `lands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT pour la table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `properties`
--
ALTER TABLE `properties`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
