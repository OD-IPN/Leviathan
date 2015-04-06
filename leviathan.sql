-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-04-2015 a las 03:56:00
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `leviathan`
--
CREATE DATABASE IF NOT EXISTS `leviathan` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `leviathan`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comite`
--

CREATE TABLE IF NOT EXISTS `comite` (
  `ID` int(3) NOT NULL AUTO_INCREMENT,
  `Nombre` varchar(30) NOT NULL,
  `Pais` varchar(30) NOT NULL,
  PRIMARY KEY (`ID`),
  KEY `ID` (`ID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `comite`
--

INSERT INTO `comite` (`ID`, `Nombre`, `Pais`) VALUES
(1, 'AIESEC IPN', 'México'),
(2, 'UNAM', 'México');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cursos`
--

CREATE TABLE IF NOT EXISTS `cursos` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `id_programa` int(3) NOT NULL,
  `programa` varchar(10) NOT NULL,
  `idioma` varchar(20) NOT NULL,
  `sede` int(3) NOT NULL,
  `modalidad` varchar(10) NOT NULL,
  `inicio` time NOT NULL,
  `fin` time NOT NULL,
  `disponibilidad` int(3) NOT NULL,
  `registrados` int(3) NOT NULL,
  `status` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `cursos`
--

INSERT INTO `cursos` (`id`, `id_programa`, `programa`, `idioma`, `sede`, `modalidad`, `inicio`, `fin`, `disponibilidad`, `registrados`, `status`) VALUES
(1, 1, 'SL', 'Inglés', 1, 'L-V', '09:00:00', '10:30:00', 30, 2, 1),
(2, 2, 'MLB', 'Inglés', 1, 'S', '09:00:00', '10:30:00', 8, 0, 1),
(3, 1, 'SL', 'Francés', 1, 'L-V', '10:30:00', '12:00:00', 30, 1, 1),
(4, 1, 'SL', 'Alemán', 2, 'S', '09:00:00', '10:30:00', 30, 2, 1),
(5, 2, 'MLB', 'Inglés', 1, 'S', '10:30:00', '12:00:00', 8, 1, 1),
(6, 1, 'SL', 'Alemán', 2, 'S', '12:00:00', '13:30:00', 30, 1, 1),
(7, 1, 'SL', 'Inglés', 1, 'L-V', '10:30:00', '12:00:00', 30, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inscripcion`
--

CREATE TABLE IF NOT EXISTS `inscripcion` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `id_usuario` int(3) NOT NULL,
  `id_curso` int(3) NOT NULL,
  `programa` varchar(10) NOT NULL,
  `idioma` varchar(20) NOT NULL,
  `estado` tinyint(1) DEFAULT '0',
  `pago` varchar(20) NOT NULL DEFAULT '$ 0.00',
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=35 ;

--
-- Volcado de datos para la tabla `inscripcion`
--

INSERT INTO `inscripcion` (`id`, `id_usuario`, `id_curso`, `programa`, `idioma`, `estado`, `pago`) VALUES
(1, 1, 1, 'SL', 'Inglés', 0, '$ 0.00'),
(2, 15, 6, 'SL', 'Alemán', 0, '$ 0.00'),
(3, 15, 7, 'SL', 'Inglés', 0, '$ 0.00'),
(4, 15, 4, 'SL', 'Alemán', 0, '$ 0.00'),
(5, 15, 1, 'SL', 'Inglés', 0, '$ 0.00'),
(18, 1, 5, 'MLB', 'Inglés', 0, '$ 0.00'),
(19, 1, 4, 'SL', 'Alemán', 0, '$ 0.00'),
(20, 1, 3, 'SL', 'Francés', 0, '$ 0.00'),
(21, 1, 1, 'SL', 'Inglés', 0, '$ 0.00'),
(22, 1, 4, 'SL', 'Alemán', 0, '$ 0.00'),
(23, 1, 4, 'SL', 'Alemán', 0, '$ 0.00'),
(24, 1, 1, 'SL', 'Inglés', 0, '$ 0.00'),
(25, 1, 6, 'SL', 'Alemán', 0, '$ 0.00'),
(26, 1, 7, 'SL', 'Inglés', 0, '$ 0.00'),
(27, 1, 6, 'SL', 'Alemán', 0, '$ 0.00'),
(28, 1, 7, 'SL', 'Inglés', 0, '$ 0.00'),
(29, 1, 6, 'SL', 'Alemán', 0, '$ 0.00'),
(30, 1, 7, 'SL', 'Inglés', 0, '$ 0.00'),
(31, 1, 6, 'SL', 'Alemán', 0, '$ 0.00'),
(32, 1, 7, 'SL', 'Inglés', 0, '$ 0.00'),
(33, 1, 7, 'SL', 'Inglés', 0, '$ 0.00'),
(34, 1, 6, 'SL', 'Alemán', 0, '$ 0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `acronimo` varchar(10) DEFAULT NULL,
  `nombre` varchar(50) NOT NULL,
  `descripcion` varchar(500) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `costo` varchar(10) NOT NULL,
  `duracion` varchar(11) NOT NULL,
  `inicio` varchar(15) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id`, `acronimo`, `nombre`, `descripcion`, `imagen`, `costo`, `duracion`, `inicio`) VALUES
(1, 'SL', 'Sharing Languages', 'Is a project focused on teaching languages to university students to provide them the opportunity to improve and perfect their language with native speakers, and allows them to have a multicultural exchange with the different teachers who are part of this program through formal integration activities as panel discussions of topics like global interest, business, sustainability, values and ethics.', 'images/SL.png', '$650.00', '4 Semanas', '07-Junio-2015'),
(2, 'MLB', 'My Language Budy', 'Is a project focused on teaching languages, in a specialized and personalized way, focused on small groups of students, who can choose the time, place and content of the courses in order to provide an international learning experience creating a link between the teacher and students to accelerate learning and ensure the development thereof.', 'images/MLB.png', '$450.00', '4 Semanas', '08-Mayo-2015');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE IF NOT EXISTS `rol` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(25) NOT NULL,
  `valor` varchar(2) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id`, `nombre`, `valor`) VALUES
(1, 'Estudiante', '0'),
(2, 'Administrador SL', '1'),
(3, 'Administrador MLB', '2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sede`
--

CREATE TABLE IF NOT EXISTS `sede` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(30) NOT NULL,
  `nombreCompleto` varchar(100) DEFAULT NULL,
  `direccion` varchar(150) NOT NULL,
  `imagen_url` varchar(150) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `sede`
--

INSERT INTO `sede` (`id`, `nombre`, `nombreCompleto`, `direccion`, `imagen_url`) VALUES
(1, 'ESCOM', 'Escuela Superior de Cómputo', 'Av. Juan de Dios Bátiz esq. Av. Miguel Othón de Mendizábal, Col. Lindavista. Del. Gustavo A. Madero. México, D. F. C. P. 07738', 'images/ESCOM.jpg'),
(2, 'UPIICSA', 'Unidad Profesional Interdisciplinaria de Ingeniería y Ciencas Sociales y Administrativas', 'Av. Té #950 esquina Resina, Col. Granjas México, C.P. 08400, Del. Iztacalco, Distrito Federal, México.', 'images/UPIICSA.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `comite` int(4) NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `apellido` varchar(25) NOT NULL,
  `edad` int(2) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(15) NOT NULL,
  `direccion` varchar(100) CHARACTER SET latin1 COLLATE latin1_bin NOT NULL,
  `escuela` varchar(40) NOT NULL,
  `campus` varchar(15) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `rol` int(1) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=18 ;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `comite`, `nombre`, `apellido`, `edad`, `email`, `password`, `direccion`, `escuela`, `campus`, `telefono`, `rol`) VALUES
(1, 1, 'Miguel', 'Segura Cruz', 23, 'cesar.seguracruz@aiesec.net', 'arigato1', 'Dirección', 'IPN', 'ESCOM', '5523026700', 1),
(2, 1, 'Miguel', 'Segura', 23, 'operations.ipn@aiesec.org.mx', 'arigato1', 'Dirección 2', 'IPN', 'ESCOM', '(55) 2302-6700', 2),
(15, 1, 'Miguel ', 'Segura C', 22, 'zvrol@hotmail.com', 'zurol', 'Direc', 'IPN', 'escom', '200', 0),
(17, 1, 'Juan C ', 'Nieto R', 24, 'vandekamp_jc@hotmail.com', 'hola', 'Mordor MÃ¡gico.', 'IPN', 'ESIME', '553', 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
