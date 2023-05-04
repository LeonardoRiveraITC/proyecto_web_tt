-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-05-2023 a las 09:47:42
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mitinder`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `calificacion`
--

CREATE TABLE `calificacion` (
  `idCalificacion` int(11) NOT NULL,
  `idCita` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `calificacion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catagenero`
--

CREATE TABLE `catagenero` (
  `idGenero` int(11) NOT NULL,
  `Nombre` char(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catagenero`
--

INSERT INTO `catagenero` (`idGenero`, `Nombre`) VALUES
(1, 'Mujer'),
(2, 'Hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catagustos`
--

CREATE TABLE `catagustos` (
  `idGusto` int(11) NOT NULL,
  `Nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catarol`
--

CREATE TABLE `catarol` (
  `idRol` int(11) NOT NULL,
  `Nombre` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catarol`
--

INSERT INTO `catarol` (`idRol`, `Nombre`) VALUES
(1, 'Normal'),
(2, 'Administrador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `catatendencia`
--

CREATE TABLE `catatendencia` (
  `idTendencia` int(11) NOT NULL,
  `Nombre` char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `catatendencia`
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
-- Estructura de tabla para la tabla `cita`
--

CREATE TABLE `cita` (
  `idCita` int(11) NOT NULL,
  `lugar` text NOT NULL,
  `observaciones` text NOT NULL,
  `fecha` datetime NOT NULL,
  `idInvita` int(11) NOT NULL,
  `idAcepta` int(11) NOT NULL,
  `idEstatus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `idEstatus` int(11) NOT NULL,
  `nombre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuagustos`
--

CREATE TABLE `usuagustos` (
  `idUsuaGusto` int(11) NOT NULL,
  `idUsuario` int(11) NOT NULL,
  `idGusto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
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
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`Correo`, `Nombre`, `Apellidos`, `Pwd`, `Telefono`, `numeAccesos`, `fechaUltAcceso`, `idGenero`, `id`, `idCataTendencia`, `idRol`) VALUES
('20030652@itcelaya.edu.mx', 'ales', 'leon', '*B88F0DADA983436539DCA5F63B73F53C21E99229', '461-254-43', 0, '0000-00-00 00:00:00', 2, 3, 1, 1),
('20031003@itcelaya.edu.mx', 'prueba', 'prueba', '*A8D9593BDB13A78609CFA3FDD39BAD77C7C6DBD0', '461-123-45', 0, '2023-03-30 09:37:09', 2, 11, 2, 1),
('20031030@itcelaya.edu.mx', 'Alfito', 'Equisde', '*23DE6874DE55999B0D25DA1EA01963CEEE57E26E', '66642069', 2, '2023-04-30 11:08:38', 2, 12, 1, 1),
('admin@ttinder.com', 'Yomero', 'Sponja', '*E73B1F3C0B737D51EAC590F7750C979FE2B27FD9', '334343', 0, '2023-03-14 17:18:45', 1, 2, 2, 2),
('prueba1@gmail.com', 'ales', 'marin', '1234', '827662', 0, '2023-03-28 17:34:24', 2, 6, 1, 1),
('user1@ttinder.com', 'Brandon', 'Martinez', '*0BCB218B7F4075B859D4149600DC0C7634C7E2B4', '827662', 0, '2023-03-14 17:18:45', 2, 1, 1, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD PRIMARY KEY (`idCalificacion`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `catagenero`
--
ALTER TABLE `catagenero`
  ADD PRIMARY KEY (`idGenero`);

--
-- Indices de la tabla `catagustos`
--
ALTER TABLE `catagustos`
  ADD PRIMARY KEY (`idGusto`);

--
-- Indices de la tabla `catarol`
--
ALTER TABLE `catarol`
  ADD PRIMARY KEY (`idRol`);

--
-- Indices de la tabla `catatendencia`
--
ALTER TABLE `catatendencia`
  ADD PRIMARY KEY (`idTendencia`);

--
-- Indices de la tabla `cita`
--
ALTER TABLE `cita`
  ADD PRIMARY KEY (`idCita`),
  ADD KEY `idInvita` (`idInvita`),
  ADD KEY `idAcepta` (`idAcepta`),
  ADD KEY `idEstatus` (`idEstatus`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`idEstatus`);

--
-- Indices de la tabla `usuagustos`
--
ALTER TABLE `usuagustos`
  ADD PRIMARY KEY (`idUsuaGusto`),
  ADD KEY `idGusto` (`idGusto`),
  ADD KEY `idUsuario` (`idUsuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`Correo`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `idGenero` (`idGenero`),
  ADD KEY `idRol` (`idRol`),
  ADD KEY `idCataTendencia` (`idCataTendencia`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `calificacion`
--
ALTER TABLE `calificacion`
  MODIFY `idCalificacion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catagenero`
--
ALTER TABLE `catagenero`
  MODIFY `idGenero` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `catagustos`
--
ALTER TABLE `catagustos`
  MODIFY `idGusto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `catarol`
--
ALTER TABLE `catarol`
  MODIFY `idRol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `catatendencia`
--
ALTER TABLE `catatendencia`
  MODIFY `idTendencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cita`
--
ALTER TABLE `cita`
  MODIFY `idCita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `idEstatus` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuagustos`
--
ALTER TABLE `usuagustos`
  MODIFY `idUsuaGusto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `calificacion`
--
ALTER TABLE `calificacion`
  ADD CONSTRAINT `calificacion_ibfk_1` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `cita`
--
ALTER TABLE `cita`
  ADD CONSTRAINT `cita_ibfk_1` FOREIGN KEY (`idInvita`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_2` FOREIGN KEY (`idAcepta`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `cita_ibfk_3` FOREIGN KEY (`idEstatus`) REFERENCES `estatus` (`idEstatus`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuagustos`
--
ALTER TABLE `usuagustos`
  ADD CONSTRAINT `usuagustos_ibfk_1` FOREIGN KEY (`idGusto`) REFERENCES `catagustos` (`idGusto`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuagustos_ibfk_2` FOREIGN KEY (`idUsuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`idRol`) REFERENCES `catarol` (`idRol`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`idGenero`) REFERENCES `catagenero` (`idGenero`) ON UPDATE CASCADE,
  ADD CONSTRAINT `usuario_ibfk_3` FOREIGN KEY (`idCataTendencia`) REFERENCES `catatendencia` (`idTendencia`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
