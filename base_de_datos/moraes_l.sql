-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2025 at 03:46 AM
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
-- Database: `moraes_l`
--

-- --------------------------------------------------------

--
-- Table structure for table `consultas`
--
-- Creation: Jun 26, 2025 at 01:07 AM
-- Last update: Jun 26, 2025 at 01:44 AM
--

CREATE TABLE `consultas` (
  `id_consultas` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `mensaje` text NOT NULL,
  `fecha_envio` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `consultas`
--

INSERT INTO `consultas` (`id_consultas`, `nombre`, `email`, `mensaje`, `fecha_envio`) VALUES
(1, 'Leandro', 'moraesleandro1228@gmail.com', 'Hola, esto es una consulta!', '2025-06-25 22:44:12');

-- --------------------------------------------------------

--
-- Table structure for table `perfiles`
--
-- Creation: Jun 15, 2025 at 04:15 PM
--

CREATE TABLE `perfiles` (
  `id_perfiles` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `perfiles`
--

INSERT INTO `perfiles` (`id_perfiles`, `descripcion`) VALUES
(1, 'admin'),
(2, 'cliente');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--
-- Creation: Jun 15, 2025 at 04:18 PM
-- Last update: Jun 26, 2025 at 01:23 AM
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `usuario` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `pass` varchar(100) NOT NULL,
  `perfil_id` int(11) NOT NULL DEFAULT 2,
  `baja` varchar(2) NOT NULL DEFAULT 'NO'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nombre`, `apellido`, `usuario`, `email`, `pass`, `perfil_id`, `baja`) VALUES
(12, 'admin', 'admin', 'admin', 'admin@correo.com', '$2y$10$A2IBGflrNtMNEUg9q7087ergoZMmjz3qxm0LUgj4GDQivHZs1mK2e', 1, 'NO'),
(13, 'cliente', 'cliente', 'cliente', 'cliente@correo.com', '$2y$10$QcuwY7lsnbyLcJHljE8JVOvKQ48w6tS0ZNV7Y6lygKNlijUlKgqy.', 2, 'NO'),
(17, 'Leandro', 'Moraes', 'leandro1228', 'leandromoraes1228@gmail.com', '$2y$10$KcE28dxKkW34v68lML5MUeyLOgO9iZdpjZRz033qKbdmjTNhfflI2', 2, 'NO'),
(18, 'Lucas', 'Haberles', 'lucas13', 'lucas13@gmail.com', '$2y$10$hkA97ePCQxbFovBGpzZ4TOlWLHQ2YzBLfm1Uc9n2EcVJWrdJ.bhES', 1, 'NO');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `consultas`
--
ALTER TABLE `consultas`
  ADD PRIMARY KEY (`id_consultas`);

--
-- Indexes for table `perfiles`
--
ALTER TABLE `perfiles`
  ADD PRIMARY KEY (`id_perfiles`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `consultas`
--
ALTER TABLE `consultas`
  MODIFY `id_consultas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `perfiles`
--
ALTER TABLE `perfiles`
  MODIFY `id_perfiles` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
