-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-07-2016 a las 20:45:02
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `estadomaquinas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arcade`
--

CREATE TABLE `arcade` (
  `idmaquina` int(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `arcade`
--

INSERT INTO `arcade` (`idmaquina`, `descripcion`) VALUES
(1, 'maquina comando'),
(3, 'carrera'),
(5, 'disparo'),
(7, 'disparo'),
(17, 'maquina comando'),
(22, 'maquina comando'),
(33, 'maquina comando');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kiddies`
--

CREATE TABLE `kiddies` (
  `idmaquina` int(50) NOT NULL,
  `cantluces` int(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `kiddies`
--

INSERT INTO `kiddies` (`idmaquina`, `cantluces`) VALUES
(2, 80),
(10, 20),
(11, 79);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquina`
--

CREATE TABLE `maquina` (
  `idmaquina` int(50) NOT NULL,
  `nombre` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquina`
--

INSERT INTO `maquina` (`idmaquina`, `nombre`) VALUES
(1, 'Fifa 2000'),
(2, 'fruit ninja'),
(3, 'Mario Kart'),
(5, 'Call Of Dutty'),
(7, 'Counter Strike'),
(10, 'sacapeluches'),
(11, 'maquina saltarina'),
(17, 'pac-man'),
(22, 'NBA 2008'),
(33, 'fifa 2000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maquinatienereparacion`
--

CREATE TABLE `maquinatienereparacion` (
  `idmaquina` int(50) DEFAULT NULL,
  `idreparacion` int(50) DEFAULT NULL,
  `fecha` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `maquinatienereparacion`
--

INSERT INTO `maquinatienereparacion` (`idmaquina`, `idreparacion`, `fecha`) VALUES
(22, 1, '2016-02-12'),
(1, 2, '2008-02-12'),
(1, 2, '2016-03-02'),
(3, 2, '2009-07-08'),
(1, 2, '2016-03-12'),
(1, 2, '2020-03-30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reparacion`
--

CREATE TABLE `reparacion` (
  `idreparacion` int(50) NOT NULL,
  `descripcion` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `reparacion`
--

INSERT INTO `reparacion` (`idreparacion`, `descripcion`) VALUES
(1, 'falla'),
(2, 'mantenimiento');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `repuesto`
--

CREATE TABLE `repuesto` (
  `idrepuesto` int(50) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `idreparacion` int(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `repuesto`
--

INSERT INTO `repuesto` (`idrepuesto`, `nombre`, `idreparacion`) VALUES
(1, 'luces led', 1),
(2, 'monitor', 1),
(12, 'palanca', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arcade`
--
ALTER TABLE `arcade`
  ADD PRIMARY KEY (`idmaquina`);

--
-- Indices de la tabla `kiddies`
--
ALTER TABLE `kiddies`
  ADD PRIMARY KEY (`idmaquina`);

--
-- Indices de la tabla `maquina`
--
ALTER TABLE `maquina`
  ADD PRIMARY KEY (`idmaquina`);

--
-- Indices de la tabla `maquinatienereparacion`
--
ALTER TABLE `maquinatienereparacion`
  ADD KEY `idmaquina` (`idmaquina`),
  ADD KEY `idreparacion` (`idreparacion`);

--
-- Indices de la tabla `reparacion`
--
ALTER TABLE `reparacion`
  ADD PRIMARY KEY (`idreparacion`);

--
-- Indices de la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD PRIMARY KEY (`idrepuesto`),
  ADD KEY `idreparacion` (`idreparacion`);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `arcade`
--
ALTER TABLE `arcade`
  ADD CONSTRAINT `arcade_ibfk_1` FOREIGN KEY (`idmaquina`) REFERENCES `maquina` (`idmaquina`);

--
-- Filtros para la tabla `kiddies`
--
ALTER TABLE `kiddies`
  ADD CONSTRAINT `kiddies_ibfk_1` FOREIGN KEY (`idmaquina`) REFERENCES `maquina` (`idmaquina`);

--
-- Filtros para la tabla `maquinatienereparacion`
--
ALTER TABLE `maquinatienereparacion`
  ADD CONSTRAINT `maquinatienereparacion_ibfk_1` FOREIGN KEY (`idmaquina`) REFERENCES `maquina` (`idmaquina`),
  ADD CONSTRAINT `maquinatienereparacion_ibfk_2` FOREIGN KEY (`idreparacion`) REFERENCES `reparacion` (`idreparacion`);

--
-- Filtros para la tabla `repuesto`
--
ALTER TABLE `repuesto`
  ADD CONSTRAINT `repuesto_ibfk_1` FOREIGN KEY (`idreparacion`) REFERENCES `reparacion` (`idreparacion`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
