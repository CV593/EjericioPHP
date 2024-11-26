-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2024 at 06:29 PM
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
-- Database: `ejercicio`
--

-- --------------------------------------------------------

--
-- Table structure for table `conexion`
--

CREATE TABLE `conexion` (
  `Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `Id` int(11) NOT NULL,
  `Usuario` varchar(30) DEFAULT NULL,
  `Pass` varchar(255) DEFAULT NULL,
  `Tipo` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`Id`, `Usuario`, `Pass`, `Tipo`) VALUES
(3, 'eli', '$2y$10$/IkzZKf4CoNhI.UlusK48OG8j5h92s2pMgeFY47yAKU1S5bed0iTm', 'admin'),
(4, 'c', '$2y$10$JIfUK3djnyj4vyxuzm5GXeWc7E0/L24qO/W2bKRWCKgJDQV3uuhp2', 'admin'),
(5, 'iris', '$2y$10$BnY/EBbvIypc9QY1AU0o7OFWimwfHhy2.bDGphJ47xPwS6N742J7S', 'normal');

-- --------------------------------------------------------

--
-- Table structure for table `productos`
--

CREATE TABLE `productos` (
  `Id` int(11) NOT NULL,
  `Nombre` varchar(30) NOT NULL,
  `Precio` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `productos`
--

INSERT INTO `productos` (`Id`, `Nombre`, `Precio`) VALUES
(1, 'Pizza', 40),
(2, 'Pollo', 50),
(3, 'Papas', 20);

-- --------------------------------------------------------

--
-- Table structure for table `tareas`
--

CREATE TABLE `tareas` (
  `Id` int(11) NOT NULL,
  `Titulo` varchar(30) DEFAULT NULL,
  `Descripcion` varchar(50) DEFAULT NULL,
  `Estado` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tareas`
--

INSERT INTO `tareas` (`Id`, `Titulo`, `Descripcion`, `Estado`) VALUES
(1, 'Programar', 'Hacer los ejercicios de php', 'En proceso');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `conexion`
--
ALTER TABLE `conexion`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `tareas`
--
ALTER TABLE `tareas`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `conexion`
--
ALTER TABLE `conexion`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `productos`
--
ALTER TABLE `productos`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `tareas`
--
ALTER TABLE `tareas`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
