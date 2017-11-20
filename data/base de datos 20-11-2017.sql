-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 21, 2017 at 12:04 AM
-- Server version: 10.1.25-MariaDB
-- PHP Version: 5.6.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tp_final_final`
--

-- --------------------------------------------------------

--
-- Table structure for table `alumno`
--

CREATE TABLE `alumno` (
  `id_persona` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `alumno`
--

INSERT INTO `alumno` (`id_persona`) VALUES
(3),
(5),
(6),
(7);

-- --------------------------------------------------------

--
-- Table structure for table `asignatura`
--

CREATE TABLE `asignatura` (
  `id_asignatura` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `id_nivel` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `carga`
--

CREATE TABLE `carga` (
  `id_docente` int(8) NOT NULL,
  `id_documento` int(20) NOT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `carga`
--

INSERT INTO `carga` (`id_docente`, `id_documento`, `fecha_creacion`) VALUES
(1, 1, '2017-10-17'),
(1, 2, '2017-10-18'),
(1, 3, '2017-10-17'),
(1, 4, '2017-10-15');

-- --------------------------------------------------------

--
-- Table structure for table `categoria`
--

CREATE TABLE `categoria` (
  `id_categoria` int(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `categoria`
--

INSERT INTO `categoria` (`id_categoria`, `nombre`) VALUES
(1, 'Matemática'),
(2, 'Lengua'),
(3, 'Ingles'),
(4, 'Química'),
(5, 'Física'),
(6, 'Matemática'),
(7, 'Lengua'),
(8, 'Ingles'),
(9, 'Química'),
(10, 'Física'),
(11, 'Matemática'),
(12, 'Lengua'),
(13, 'Ingles'),
(14, 'Química'),
(15, 'Física');

-- --------------------------------------------------------

--
-- Table structure for table `contiene`
--

CREATE TABLE `contiene` (
  `id_documento` int(20) NOT NULL,
  `id_etiqueta` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contiene`
--

INSERT INTO `contiene` (`id_documento`, `id_etiqueta`) VALUES
(10, 10),
(10, 12);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `link` varchar(50) DEFAULT NULL,
  `id_asignatura` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `dicta`
--

CREATE TABLE `dicta` (
  `id_curso` int(20) NOT NULL,
  `id_docente` int(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `docente`
--

CREATE TABLE `docente` (
  `id_persona` int(8) NOT NULL,
  `cuil` int(11) DEFAULT NULL,
  `habilitado` int(1) NOT NULL,
  `cert_serv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id_persona`, `cuil`, `habilitado`, `cert_serv`) VALUES
(1, 2147483647, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `extension` varchar(30) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL,
  `habilitado` int(1) DEFAULT NULL,
  `id_categoria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre`, `ruta`, `extension`, `descripcion`, `habilitado`, `id_categoria`) VALUES
(1, 'a', 'files/a.jpg', 'jpg', 'fotogggggggggg', NULL, 1),
(2, 'algebra de boole', 'files/algebra de boole.pdf', 'pdf', 'algebra de book es ...', NULL, 2),
(3, 'dibujo', 'files/dibujo.pdf', 'pdf', 'dibujo de un unicornio', NULL, 1),
(4, 'horarios', 'files/horarios.pdf', 'pdf', 'horarios de cursado', NULL, 3),
(5, 'a', 'files/a.jpg', 'jpg', 'foto', NULL, 1),
(6, 'algebra de boole', 'files/algebra de boole.pdf', 'pdf', 'algebra de book es ...', NULL, 2),
(7, 'dibujo', 'files/dibujo.pdf', 'pdf', 'dibujo de un unicornio', NULL, 1),
(8, 'horarios', 'files/horarios.pdf', 'pdf', 'horarios de cursado', NULL, 3),
(10, 'illustration2', 'files/illustration2.jpg', 'jpg', 'Ingrese detalles del archivo...', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `etiqueta`
--

CREATE TABLE `etiqueta` (
  `id_etiqueta` int(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `etiqueta`
--

INSERT INTO `etiqueta` (`id_etiqueta`, `nombre`) VALUES
(1, 'Matemática_I'),
(2, 'Lengua_I'),
(3, 'Ingles_II'),
(4, 'Química_Inorgaica'),
(5, 'Programación'),
(6, 'Matemática_I'),
(7, 'Lengua_I'),
(8, 'Ingles_II'),
(9, 'Química_Inorgaica'),
(10, 'Programación'),
(11, 'Matemática_I'),
(12, 'Lengua_I'),
(13, 'Ingles_II'),
(14, 'Química_Inorgaica'),
(15, 'Programación');

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `obtuvo`
--

CREATE TABLE `obtuvo` (
  `id_titulo` int(20) NOT NULL,
  `id_docente` int(8) NOT NULL,
  `anio_obtension` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `participa`
--

CREATE TABLE `participa` (
  `id_alumno` int(8) NOT NULL,
  `id_curso` int(20) NOT NULL,
  `f_inicio` date DEFAULT NULL,
  `f_fin` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `persona`
--

CREATE TABLE `persona` (
  `id_persona` int(8) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `apellido` varchar(50) DEFAULT NULL,
  `fecha_nac` date DEFAULT NULL,
  `genero` varchar(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `persona`
--

INSERT INTO `persona` (`id_persona`, `nombre`, `apellido`, `fecha_nac`, `genero`) VALUES
(1, 'docente', 'aprender', '1993-11-16', NULL),
(2, 'alam', 'ravbar', '1991-07-27', NULL),
(3, 'alam', 'admin', '1991-07-27', 'm'),
(5, 'pepe', 'pepe', '1991-07-27', 'f'),
(6, 'perez', 'perez', '2017-12-01', 'f'),
(7, 'samir', 'samir', '2017-11-24', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(20) NOT NULL,
  `rol` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rol`
--

INSERT INTO `rol` (`id_rol`, `rol`) VALUES
(1, 'alumno'),
(2, 'docente'),
(3, 'moderador'),
(4, 'administrador');

-- --------------------------------------------------------

--
-- Table structure for table `titulo`
--

CREATE TABLE `titulo` (
  `id_titulo` int(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(20) NOT NULL,
  `mail` varchar(50) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `psw` varchar(50) DEFAULT NULL,
  `habilitado` int(1) DEFAULT NULL,
  `id_rol` int(20) NOT NULL,
  `id_persona` int(8) NOT NULL,
  `fecha_creacion` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `mail`, `nombre`, `psw`, `habilitado`, `id_rol`, `id_persona`, `fecha_creacion`) VALUES
(1, 'marceasdfg@gmail.com', 'admin', 'admin', 1, 4, 2, NULL),
(2, 'unmail@algo.com', 'docente', '202cb962ac59075b964b07152d234b70', 1, 2, 2, NULL),
(3, 'admin@gmail.com', 'alam', 'admin', 1, 3, 3, '2017-11-16'),
(5, 'pepe@gmail.com', 'pepe', 'pepe', 1, 4, 5, '2017-11-16'),
(6, 'perez@gmail.com', 'perez', 'perez', 1, 1, 6, '2017-11-17'),
(7, 'samir@gmail.com', 'samir', 'samir', 1, 1, 7, '2017-11-17');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD PRIMARY KEY (`id_asignatura`),
  ADD KEY `id_nivel` (`id_nivel`);

--
-- Indexes for table `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id_docente`,`id_documento`),
  ADD KEY `id_documento` (`id_documento`);

--
-- Indexes for table `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

--
-- Indexes for table `contiene`
--
ALTER TABLE `contiene`
  ADD PRIMARY KEY (`id_documento`,`id_etiqueta`),
  ADD KEY `id_etiqueta` (`id_etiqueta`);

--
-- Indexes for table `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`id_curso`),
  ADD KEY `id_asignatura` (`id_asignatura`);

--
-- Indexes for table `dicta`
--
ALTER TABLE `dicta`
  ADD PRIMARY KEY (`id_curso`,`id_docente`),
  ADD KEY `dni_docente` (`id_docente`);

--
-- Indexes for table `docente`
--
ALTER TABLE `docente`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indexes for table `etiqueta`
--
ALTER TABLE `etiqueta`
  ADD PRIMARY KEY (`id_etiqueta`);

--
-- Indexes for table `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id_nivel`);

--
-- Indexes for table `obtuvo`
--
ALTER TABLE `obtuvo`
  ADD PRIMARY KEY (`id_titulo`,`id_docente`),
  ADD KEY `id_docente` (`id_docente`);

--
-- Indexes for table `participa`
--
ALTER TABLE `participa`
  ADD PRIMARY KEY (`id_alumno`,`id_curso`),
  ADD KEY `id_curso` (`id_curso`);

--
-- Indexes for table `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id_persona`);

--
-- Indexes for table `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indexes for table `titulo`
--
ALTER TABLE `titulo`
  ADD PRIMARY KEY (`id_titulo`);

--
-- Indexes for table `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_persona` (`id_persona`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asignatura`
--
ALTER TABLE `asignatura`
  MODIFY `id_asignatura` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `id_etiqueta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(20) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Constraints for table `asignatura`
--
ALTER TABLE `asignatura`
  ADD CONSTRAINT `asignatura_ibfk_1` FOREIGN KEY (`id_nivel`) REFERENCES `nivel` (`id_nivel`);

--
-- Constraints for table `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `carga_ibfk_1` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_persona`),
  ADD CONSTRAINT `carga_ibfk_2` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`);

--
-- Constraints for table `contiene`
--
ALTER TABLE `contiene`
  ADD CONSTRAINT `contiene_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`),
  ADD CONSTRAINT `contiene_ibfk_2` FOREIGN KEY (`id_etiqueta`) REFERENCES `etiqueta` (`id_etiqueta`);

--
-- Constraints for table `curso`
--
ALTER TABLE `curso`
  ADD CONSTRAINT `curso_ibfk_1` FOREIGN KEY (`id_asignatura`) REFERENCES `asignatura` (`id_asignatura`);

--
-- Constraints for table `dicta`
--
ALTER TABLE `dicta`
  ADD CONSTRAINT `dicta_ibfk_1` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`),
  ADD CONSTRAINT `dicta_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_persona`);

--
-- Constraints for table `docente`
--
ALTER TABLE `docente`
  ADD CONSTRAINT `docente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);

--
-- Constraints for table `documento`
--
ALTER TABLE `documento`
  ADD CONSTRAINT `documento_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id_categoria`);

--
-- Constraints for table `obtuvo`
--
ALTER TABLE `obtuvo`
  ADD CONSTRAINT `obtuvo_ibfk_1` FOREIGN KEY (`id_titulo`) REFERENCES `titulo` (`id_titulo`),
  ADD CONSTRAINT `obtuvo_ibfk_2` FOREIGN KEY (`id_docente`) REFERENCES `docente` (`id_persona`);

--
-- Constraints for table `participa`
--
ALTER TABLE `participa`
  ADD CONSTRAINT `participa_ibfk_1` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_persona`),
  ADD CONSTRAINT `participa_ibfk_2` FOREIGN KEY (`id_curso`) REFERENCES `curso` (`id_curso`);

--
-- Constraints for table `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `usuario_ibfk_2` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id_persona`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
