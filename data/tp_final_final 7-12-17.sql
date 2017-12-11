-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Dec 07, 2017 at 08:35 PM
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
(12),
(15);

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

--
-- Dumping data for table `asignatura`
--

INSERT INTO `asignatura` (`id_asignatura`, `nombre`, `descripcion`, `id_nivel`) VALUES
(1, 'Matematica 1er grado', 'Matematica I grado', 1),
(2, 'Lengua 1er grado', 'En esta asignatura ingresan los temas: \nSilabas: ma,me,mi,mo,mu, etc.', 1),
(3, 'Ingles de 3ero', 'Ingles de 3ero involucra: verbo to-be, have got, etc.', 14),
(4, 'Lenguaje de Señas', 'Lenguaje de Seña', 15),
(5, 'Ciencias Sociales', 'Ciencias Sociales para chicos de 10 a 13 años', 1);

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
(11, 227, '2017-12-01'),
(11, 228, '2017-12-01'),
(11, 229, '2017-12-01'),
(11, 238, '2017-12-07'),
(11, 239, '2017-12-07'),
(13, 237, '2017-12-04');

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
(17, 'Matemática'),
(18, 'Lengua'),
(19, 'Geografía'),
(20, 'Informática'),
(21, 'Educación Civica'),
(22, 'Quimica'),
(24, 'Fisica'),
(25, 'Rifas'),
(26, 'Videos'),
(27, 'Diseño Gráfico');

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
(227, 29),
(227, 30),
(228, 19),
(229, 19),
(229, 31),
(237, 39),
(237, 40),
(238, 41),
(239, 41);

-- --------------------------------------------------------

--
-- Table structure for table `curso`
--

CREATE TABLE `curso` (
  `id_curso` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `id_asignatura` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `curso`
--

INSERT INTO `curso` (`id_curso`, `nombre`, `link`, `id_asignatura`) VALUES
(1, 'Lenguaje de Señas I ', 'http://localhost/aprender2/Plataforma/go.php/1/ind', 4),
(2, 'Lenguaje de Señas II', 'http://localhost/aprender2/Plataforma/go.php/1/ind', 4),
(3, 'Ciencias Sociales 6to grado', 'http://localhost/aprender2/Plataforma/go.php/1/ind', 1);

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
  `cert_serv` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `docente`
--

INSERT INTO `docente` (`id_persona`, `cuil`, `cert_serv`) VALUES
(11, 2147483647, 1),
(13, 2147483647, 0),
(14, 2036343257, 1);

-- --------------------------------------------------------

--
-- Table structure for table `documento`
--

CREATE TABLE `documento` (
  `id_documento` int(20) NOT NULL,
  `nombre` varchar(500) NOT NULL,
  `ruta` varchar(500) DEFAULT NULL,
  `extension` varchar(30) DEFAULT NULL,
  `descripcion` varchar(5000) DEFAULT NULL,
  `estado` int(1) DEFAULT NULL,
  `id_categoria` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre`, `ruta`, `extension`, `descripcion`, `estado`, `id_categoria`) VALUES
(227, 'Año de la Misericordia', 'files/Año de la Misericordia.mp4', 'mp4', 'Año Misericordia 3', 1, 26),
(228, 'Manual_Kumbia_PHP_Framework_v0-5', 'files/Manual_Kumbia_PHP_Framework_v0-5.pdf', 'pdf', 'Manual', 2, 20),
(229, 'j25es', 'files/j25es.pdf', 'pdf', 'Jdadalksdjfñlajsdf', 1, 17),
(237, 'Perspectivas', 'files/Perspectivas.pdf', 'pdf', 'Perspectivas', 2, 27),
(238, 'Accesibilidad_Web', 'files/Accesibilidad_Web.pdf', 'pdf', '', 0, 18),
(239, 'Accesibilidad_Web', 'files/Accesibilidad_Web.pdf', 'pdf', '', 0, 18);

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
(15, 'Programación'),
(16, 'Lengua_II'),
(17, 'Lengua_IV'),
(18, 'hola'),
(19, 'manual'),
(20, 'kumbia'),
(21, 'español'),
(22, 'Fichas'),
(23, 'Ahijados'),
(24, 'Rifas'),
(25, 'Fichas_Padrinos'),
(26, 'prejornadas'),
(27, 'projimo'),
(28, 'mi vida'),
(29, 'videos'),
(30, 'papa'),
(31, 'j2dasd'),
(32, 'etiqueta'),
(33, 'algo'),
(34, 'ejemplo'),
(35, 'php'),
(36, 'diario'),
(37, 'luciernaga'),
(38, 'persepectivas'),
(39, 'perspectiva'),
(40, 'años'),
(41, 'pepe');

-- --------------------------------------------------------

--
-- Table structure for table `nivel`
--

CREATE TABLE `nivel` (
  `id_nivel` int(20) NOT NULL,
  `nombre` varchar(50) DEFAULT NULL,
  `descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nivel`
--

INSERT INTO `nivel` (`id_nivel`, `nombre`, `descripcion`) VALUES
(1, 'Nivel Primario', 'NIvel Primario'),
(14, 'Nivel Secundario', 'Nivel secundario involucra a chicos de entre 13 a 19 años'),
(15, 'Nivel Terciario', 'Este nivel corresponde a jovenes y adultos de 19 años en adelante');

-- --------------------------------------------------------

--
-- Table structure for table `observacion`
--

CREATE TABLE `observacion` (
  `id` int(20) NOT NULL,
  `descripcion` varchar(5000) DEFAULT NULL,
  `fecha` date NOT NULL,
  `id_moderador` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `observacion`
--

INSERT INTO `observacion` (`id`, `descripcion`, `fecha`, `id_moderador`) VALUES
(1, 'Primera Observación', '2017-12-04', 13),
(2, 'Sabes que no me gusto el video, arreglalo! ', '2017-12-04', 13),
(3, 'Me sigue sin gustar', '2017-12-04', 13),
(4, '3era observación! ', '2017-12-04', 13),
(5, '4ta observación!  ', '2017-12-04', 13),
(6, 'Nombre poco claro del archivo', '2017-12-04', 13),
(7, 'No validado! ', '2017-12-04', 13),
(8, 'NO validado! ', '2017-12-04', 13),
(9, 'No me gusto como presentaste .... etc', '2017-12-07', 13);

-- --------------------------------------------------------

--
-- Table structure for table `obtuvo`
--

CREATE TABLE `obtuvo` (
  `id_titulo` int(20) NOT NULL,
  `id_docente` int(8) NOT NULL,
  `anio_obtension` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `obtuvo`
--

INSERT INTO `obtuvo` (`id_titulo`, `id_docente`, `anio_obtension`) VALUES
(1, 11, 2010),
(2, 13, 2016);

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
(11, 'docente_alam', 'docente_alam', '2017-12-14', 'm'),
(12, 'alumno_alam', 'alumno_alam', '2017-12-07', 'm'),
(13, 'moderador_alam', 'moderador_alam', '1900-01-06', 'm'),
(14, 'admin_alam', 'admin_alam', '1900-01-07', 'f'),
(15, 'docente_marcela', 'aprender', '2017-12-14', 'm');

-- --------------------------------------------------------

--
-- Table structure for table `presenta`
--

CREATE TABLE `presenta` (
  `id_documento` int(20) NOT NULL,
  `id_observacion` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `presenta`
--

INSERT INTO `presenta` (`id_documento`, `id_observacion`) VALUES
(227, 1),
(227, 2),
(227, 3),
(227, 4),
(227, 5),
(227, 7),
(228, 8),
(229, 6),
(237, 9);

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

--
-- Dumping data for table `titulo`
--

INSERT INTO `titulo` (`id_titulo`, `nombre`, `descripcion`) VALUES
(1, 'Tecnico en Electrónica', 'etc'),
(2, 'Tec.Elec', 'Tec.Elec'),
(3, 'Tec.Elec', 'Tec.Elec');

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
(11, 'docente_alam@gmail.com', 'docente_alam', 'docente_alam', 1, 2, 11, '2017-11-30'),
(12, 'alumno_alam@gmail.com', 'alumno_alam', 'alumno_alam', 1, 1, 12, '2017-11-30'),
(13, 'moderador_alam@gmail.com', 'moderador_alam', 'moderador_alam', 1, 3, 13, '2017-11-30'),
(14, 'admin_alam@gmail.com', 'admin_alam', 'admin_alam', 1, 4, 14, '2017-11-30'),
(15, 'docente_marcela@gmail.com', 'docente_marcela', 'docente_marcela', 1, 1, 15, '2017-12-07');

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
-- Indexes for table `observacion`
--
ALTER TABLE `observacion`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `presenta`
--
ALTER TABLE `presenta`
  ADD PRIMARY KEY (`id_documento`,`id_observacion`),
  ADD KEY `id_observacion` (`id_observacion`);

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
  MODIFY `id_asignatura` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id_categoria` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `curso`
--
ALTER TABLE `curso`
  MODIFY `id_curso` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=240;
--
-- AUTO_INCREMENT for table `etiqueta`
--
ALTER TABLE `etiqueta`
  MODIFY `id_etiqueta` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id_nivel` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `observacion`
--
ALTER TABLE `observacion`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `persona`
--
ALTER TABLE `persona`
  MODIFY `id_persona` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `titulo`
--
ALTER TABLE `titulo`
  MODIFY `id_titulo` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
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
-- Constraints for table `presenta`
--
ALTER TABLE `presenta`
  ADD CONSTRAINT `presenta_ibfk_1` FOREIGN KEY (`id_documento`) REFERENCES `documento` (`id_documento`),
  ADD CONSTRAINT `presenta_ibfk_2` FOREIGN KEY (`id_observacion`) REFERENCES `observacion` (`id`);

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
