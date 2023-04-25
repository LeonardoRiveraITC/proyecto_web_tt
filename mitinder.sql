-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Apr 25, 2023 at 06:45 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mitinder`
--

-- --------------------------------------------------------

--
-- Table structure for table `catagenero`
--

CREATE TABLE `catagenero` (
  `idGenero` int(11) NOT NULL,
  `Nombre` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `catagenero`
--

INSERT INTO `catagenero` (`idGenero`, `Nombre`) VALUES
(1, 'Mujer'),
(2, 'Hombre');

-- --------------------------------------------------------

--
-- Table structure for table `catarol`
--

CREATE TABLE `catarol` (
  `idRol` int(11) NOT NULL,
  `Nombre` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `catarol`
--

INSERT INTO `catarol` (`idRol`, `Nombre`) VALUES
(1, 'Normal'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Table structure for table `catatendencia`
--

CREATE TABLE `catatendencia` (
  `idTendencia` int(11) NOT NULL,
  `Nombre` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `catatendencia`
--

INSERT INTO `catatendencia` (`idTendencia`, `Nombre`) VALUES
(1, 'Hetero'),
(2, 'Bi'),
(3, 'Lesbi'),
(4, 'Trans'),
(5, 'No Binario'),
(6, 'Queen'),
(7, 'Transgenero'),
(8, 'Gay');

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `Correo` char(80) NOT NULL,
  `Nombre` char(30) NOT NULL,
  `Apellidos` char(35) NOT NULL,
  `Pwd` char(42) NOT NULL,
  `Telefono` char(10) DEFAULT NULL,
  `numeAccesos` int(11) NOT NULL DEFAULT 0,
  `fechaUltAcceso` datetime NOT NULL,
  `idGenero` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `idCataTendencia` int(11) NOT NULL,
  `idRol` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`Correo`, `Nombre`, `Apellidos`, `Pwd`, `Telefono`, `numeAccesos`, `fechaUltAcceso`, `idGenero`, `id`, `idCataTendencia`, `idRol`) VALUES
('20030652@itcelaya.edu.mx', 'ales', 'leon', '*B88F0DADA983436539DCA5F63B73F53C21E99229', '461-254-43', 0, '0000-00-00 00:00:00', 2, 3, 1, 1),
('20031003@itcelaya.edu.mx', 'prueba', 'prueba', '*A8D9593BDB13A78609CFA3FDD39BAD77C7C6DBD0', '461-123-45', 0, '2023-03-30 09:37:09', 2, 11, 2, 1),
('20031030@itcelaya.edu.mx', 'alfito', 'aramburo', '*E76CC101D34801CE24B81AD9FAA229BAC6C61CB7', '461-140-01', 0, '0000-00-00 00:00:00', 2, 4, 1, 1),
('admin@ttinder.com', 'Yomero', 'Sponja', '*E73B1F3C0B737D51EAC590F7750C979FE2B27FD9', '334343', 0, '2023-03-14 17:18:45', 1, 2, 2, 2),
('prueba1@gmail.com', 'ales', 'marin', '1234', '827662', 0, '2023-03-28 17:34:24', 2, 6, 1, 1),
('user1@ttinder.com', 'Brandon', 'Martinez', '*0BCB218B7F4075B859D4149600DC0C7634C7E2B4', '827662', 0, '2023-03-14 17:18:45', 2, 1, 1, 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `catagenero`
--
ALTER TABLE `catagenero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indexes for table `catarol`
--
ALTER TABLE `catarol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indexes for table `catatendencia`
--
ALTER TABLE `catatendencia`
  ADD PRIMARY KEY (`idTendencia`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Correo`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idGenero` (`idGenero`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idCataTendencia` (`idCataTendencia`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `catagenero`
--
ALTER TABLE `catagenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catarol`
--
ALTER TABLE `catarol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `catatendencia`
--
ALTER TABLE `catatendencia`
  MODIFY `idTendencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `catarol` (`idRol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idGenero`) REFERENCES `catagenero` (`idGenero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idCataTendencia`) REFERENCES `catatendencia` (`idTendencia`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
