-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 14-12-2013 a las 23:57:56
-- Versión del servidor: 5.6.14
-- Versión de PHP: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `upo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Asignatura`
--

CREATE TABLE IF NOT EXISTS `Asignatura` (
  `asignatura_id` int(11) NOT NULL AUTO_INCREMENT,
  `grado_id` int(11) NOT NULL,
  `nombre_asi` varchar(50) NOT NULL,
  `horarioEB_ini` date NOT NULL,
  `horarioEB_fin` date NOT NULL,
  `horarioEP_ini` date NOT NULL,
  `horarioEP_fin` date NOT NULL,
  PRIMARY KEY (`asignatura_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Aulas`
--

CREATE TABLE IF NOT EXISTS `Aulas` (
  `aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura_id` int(11) NOT NULL,
  `numero_ed` int(11) NOT NULL,
  `planta_aul` int(11) NOT NULL,
  `comentario_aul` int(11) NOT NULL,
  PRIMARY KEY (`aula_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Despacho`
--

CREATE TABLE IF NOT EXISTS `Despacho` (
  `despacho_id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ed` int(11) NOT NULL,
  `planta_des` int(11) NOT NULL,
  `numero_des` int(11) NOT NULL,
  PRIMARY KEY (`despacho_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Edificio`
--

CREATE TABLE IF NOT EXISTS `Edificio` (
  `numero_ed` int(11) NOT NULL,
  `nombre_ed` varchar(30) NOT NULL,
  `ubicaciones` varchar(100) NOT NULL,
  `plantas_ed` int(11) NOT NULL,
  `comentario_ed` varchar(300) NOT NULL,
  PRIMARY KEY (`numero_ed`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Grado`
--

CREATE TABLE IF NOT EXISTS `Grado` (
  `grado_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) NOT NULL,
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Profesor`
--

CREATE TABLE IF NOT EXISTS `Profesor` (
  `profesor_id` varchar(9) NOT NULL,
  `nombres_prof` varchar(30) NOT NULL,
  `apellido1_prof` varchar(20) NOT NULL,
  `apellido2_prof` varchar(20) NOT NULL,
  `asignatura_id` int(11) NOT NULL,
  `despacho_id` int(11) NOT NULL,
  PRIMARY KEY (`profesor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
