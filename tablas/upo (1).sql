-- phpMyAdmin SQL Dump
-- version 4.0.4.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-02-2014 a las 13:58:46
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.4.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `upo`
--
CREATE DATABASE IF NOT EXISTS `upo` DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE `upo`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `asignatura`
--

CREATE TABLE IF NOT EXISTS `asignatura` (
  `asignatura_id` int(11) NOT NULL AUTO_INCREMENT,
  `grado_id` int(11) NOT NULL,
  `nombre_asi` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`asignatura_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=33 ;

--
-- Volcado de datos para la tabla `asignatura`
--

INSERT INTO `asignatura` (`asignatura_id`, `grado_id`, `nombre_asi`) VALUES
(1, 1, 'calculo'),
(2, 1, 'Programacion avanzada'),
(3, 1, 'Computadores'),
(4, 1, 'Algor?tmica'),
(5, 1, 'Miner?a de datos'),
(6, 1, 'Arquitectura bases de datos'),
(8, 1, 'Integraci?n de tecnolog?as'),
(9, 1, 'Mantenimiento Bases de datos'),
(10, 2, 'Microeconom'),
(11, 2, 'Derecho mercantil'),
(12, 2, 'Gesti?n de empresas'),
(13, 2, 'Matem?ticas'),
(14, 2, 'Econom'),
(15, 2, 'Contabilidad'),
(16, 3, 'Biolog'),
(17, 3, 'Inform?tica'),
(18, 3, 'Qu?mica'),
(19, 3, 'Metabolismo'),
(20, 3, 'Bioqu?mica estructural'),
(21, 3, 'Fisiolog?a de sistemas'),
(22, 4, 'Geolog'),
(23, 4, 'Hidrolog'),
(24, 4, 'Ingiener?a ambiental'),
(25, 4, 'Ecolog'),
(26, 5, 'Anatom?a humana'),
(27, 5, 'Psicolog?a general'),
(28, 5, 'G?netica humana'),
(29, 5, 'Alimentaci?n y cultura'),
(30, 5, 'Nutrici?n basica'),
(31, 5, 'Higiene'),
(32, 5, 'Diet?tica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aulas`
--

CREATE TABLE IF NOT EXISTS `aulas` (
  `aula_id` int(11) NOT NULL AUTO_INCREMENT,
  `asignatura_id` int(11) NOT NULL,
  `numero_ed` int(11) NOT NULL,
  `planta_aul` int(11) NOT NULL,
  `comentario_aul` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`aula_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `aulas`
--

INSERT INTO `aulas` (`aula_id`, `asignatura_id`, `numero_ed`, `planta_aul`, `comentario_aul`) VALUES
(1, 1, 4, 1, 'con proyector'),
(2, 2, 10, 1, 'con proyector'),
(3, 3, 4, 2, 'sin proyector'),
(4, 5, 16, 2, 'con proyector'),
(5, 9, 16, 1, 'con proyector'),
(6, 13, 8, 2, 'con proyector'),
(7, 17, 5, 1, 'con proyector'),
(8, 21, 24, 2, 'con proyector'),
(9, 25, 29, 1, 'con proyector'),
(10, 29, 23, 1, 'con proyector'),
(11, 32, 9, 2, 'con proyector'),
(12, 8, 4, 1, 'con proyector'),
(13, 11, 15, 1, 'con proyector'),
(14, 14, 24, 2, 'con proyector'),
(15, 16, 11, 1, 'con proyector'),
(16, 19, 7, 2, 'con proyector'),
(17, 22, 24, 1, 'sin proyector'),
(18, 24, 29, 1, 'con proyector'),
(19, 27, 10, 1, 'con proyector'),
(20, 30, 12, 2, 'con proyector'),
(21, 6, 14, 1, 'con proyector'),
(22, 10, 23, 2, 'con proyector'),
(23, 12, 29, 1, 'con proyector'),
(24, 15, 13, 2, 'con proyector'),
(25, 18, 9, 1, 'sin proyector'),
(26, 23, 6, 2, 'con proyector'),
(27, 26, 11, 1, 'con proyector'),
(28, 28, 12, 1, 'con proyector'),
(29, 31, 10, 1, 'con proyector'),
(30, 7, 6, 2, 'con proyector'),
(31, 20, 14, 1, 'con proyector'),
(32, 0, 16, 2, 'con proyector'),
(33, 0, 23, 1, 'con proyector'),
(34, 0, 12, 1, 'con proyector'),
(35, 0, 24, 2, 'con proyector'),
(36, 0, 16, 1, 'con proyector'),
(37, 0, 8, 2, 'con proyector'),
(38, 0, 6, 1, 'con proyector'),
(39, 0, 13, 1, 'con proyector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `despacho`
--

CREATE TABLE IF NOT EXISTS `despacho` (
  `despacho_id` int(11) NOT NULL AUTO_INCREMENT,
  `numero_ed` int(11) NOT NULL,
  `planta_des` int(11) NOT NULL,
  `numero_des` int(11) NOT NULL,
  PRIMARY KEY (`despacho_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `despacho`
--

INSERT INTO `despacho` (`despacho_id`, `numero_ed`, `planta_des`, `numero_des`) VALUES
(1, 11, 1, 29),
(2, 13, 1, 2),
(3, 14, 1, 25),
(4, 12, 1, 9),
(5, 3, 2, 16),
(6, 9, 2, 7),
(7, 11, 2, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `edificio`
--

CREATE TABLE IF NOT EXISTS `edificio` (
  `numero_ed` int(11) NOT NULL,
  `nombre_ed` varchar(30) CHARACTER SET latin1 NOT NULL,
  `ubicaciones` varchar(100) CHARACTER SET latin1 NOT NULL,
  `plantas_ed` int(11) NOT NULL,
  `comentario_ed` varchar(300) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`numero_ed`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `edificio`
--

INSERT INTO `edificio` (`numero_ed`, `nombre_ed`, `ubicaciones`, `plantas_ed`, `comentario_ed`) VALUES
(1, 'Cafetería Plaza de América', '37.35444539442762;-5.937520265579224', 2, 'Cafetería Plaza de América'),
(2, 'Antonio de Ulloa', '37.35431533739523;-5.936731696128845', 2, 'Antonio de Ulloa Decanatos'),
(3, 'José Moñino', '37.354854752796506;-5.937788486480713', 2, 'José Moñino'),
(4, 'Marqués de la Ensenada', '37.35464367766634;-5.937088429927826', 2, 'Zenón de Somodevilla y Bengoechea Marqués de la Ensenada'),
(5, 'José María Blanco White', '37.35514897774522;-5.93808889389038', 2, 'José María Blanco White'),
(6, 'Manuel José de Ayala', '37.35507435558477;-5.937294960021973', 2, 'Manuel José de Ayala'),
(7, 'Pedro Rodríguez Campomanes', '37.355586048909444;-5.938383936882019', 2, 'Pedro Rodríguez Campomanes'),
(8, 'Félix de Azara', '37.35539203226774;-5.937659740447997', 2, 'Félix de Azara'),
(9, 'Francisco de Miranda', '37.35592291177742;-5.938673615455627', 2, 'Francisco de Miranda'),
(10, 'Francisco de Goya y Lucientes', '37.35579498934739;-5.9379252791404715', 2, 'Francisco de Goya y Lucientes'),
(11, 'Pedro Pablo Abarca de Bolea', '37.356281093421664;-5.938998162746429', 2, 'Pedro Pablo Abarca de Bolea; Conde de Aranda'),
(12, 'Alejandro Malaspina', '37.35612545517909;-5.938193500041961', 2, 'Alejandro Malaspina'),
(13, 'Francisco José de Caldas', '37.35660089701683;-5.939303934574126', 2, 'Francisco José de Caldas'),
(14, 'Gaspar Melchor de Jovellanos', '37.356517748213186;-5.938531458377838', 2, 'Gaspar Melchor de Jovellanos'),
(15, 'José Celestino Mutis', '37.35690577517552;-5.939556062221527', 2, 'Residencia Universitaria José Celestino Mutis'),
(16, 'José Cadalso y Vázquez', '37.356794910533836;-5.9388506412506095', 2, 'José Cadalso y Vázquez'),
(17, 'nombre', '37.357319384124416;-5.939531922340393', 3, 'José Celestino Mutis'),
(18, 'José Celestino Mutis', '37.35717440805126;-5.939065217971802', 3, 'José Celestino Mutis'),
(20, 'El CABD', '37.35913156141107;-5.9384214878082275', 2, 'Centro Andaluz de Biología del Desarrollo El CABD se fundó en el año 2003 como el primer instituto español especializado en el estudio de la Biología del Desarrollo. El CABD es un centro mixto del CSIC  la Junta de Andalucía y la UPO. '),
(21, 'SCI', '37.359609116140625;-5.936661958694458', 3, 'Servicios Centralizados de Investigación'),
(22, 'Laboratorios de Investigación', '37.35867105932969;-5.936779975891113', 2, 'Laboratorios de Investigación Despachos de profesores'),
(23, 'Laboratorios de Investigación', '37.359105978036226;-5.9359002113342285', 2, 'Laboratorios de Docencia de Ciencias Experimentales'),
(24, 'Aularios', '37.35853461372591;-5.936254262924194', 2, 'Aularios'),
(25, 'Juan Bautista Muñoz', '37.35766476717047;-5.935996770858765', 2, 'Biblioteca Universitaria Edificio Juan Bautista Muñoz'),
(26, 'Gimnasio', '37.35628322545016;-5.93585729598999', 0, 'Gimnasio'),
(27, 'Edificio 27', '37.35525131658747;-5.934961438179016', 2, 'Edifio 27'),
(29, 'Aularios', '37.35860283655879;-5.935664176940917', 2, 'Aularios'),
(31, 'Paraninfo', '37.35400831662156;-5.938048660755157', 2, 'Paraninfo'),
(32, 'Rectorado', '37.35382282429562;-5.937504172325134', 2, 'Rectorado'),
(33, 'Teatro', '37.35334949697302;-5.936946272850037', 2, 'Teatro'),
(35, 'Torre', '37.353213041695135;-5.9372976422309875', 2, 'Torre'),
(36, 'Edificio 36', '37.35270986071424;-5.9387218952178955', 2, ' Este es el Edificio 36'),
(37, 'Pabellón Deportivo 1', '37.35431320531083;-5.939515829086304', 2, 'Pabellón Deportivo 1'),
(38, 'Sala Deportiva', '37.355029582252904;-5.940041542053222', 2, 'Sala Deportiva'),
(39, 'Pabellón Deportivo 2', '37.35576300870579;-5.940663814544678', 2, 'Pabellón Deportivo 2'),
(41, 'Teatro', '37.35314481396321;-5.936082601547241', 2, 'Teatro'),
(44, 'Josefa Amar', '37.35408720402354;-5.935535430908203', 2, 'Josefa Amar Centro de Investigación Josefa Amar Área de Investigación'),
(45, 'Alexander von Humboldt', '37.35657318075919;-5.943171679973602', 2, 'Alexander von Humboldt'),
(46, 'Instituto de la Grasa', '37.359847892365835;-5.938657522201538', 2, 'Instituto de la Grasa. Consejo Superior de Investigaciones Científicas'),
(47, 'Ampliación de SCI', '37.36015915309024;-5.936594903469086', 3, 'Ampliación Servicios Centralizados de Investigación');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grado`
--

CREATE TABLE IF NOT EXISTS `grado` (
  `grado_id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(50) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`grado_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=6 ;

--
-- Volcado de datos para la tabla `grado`
--

INSERT INTO `grado` (`grado_id`, `nombre`) VALUES
(1, 'Ingieneria informatica'),
(2, 'Administracion de empresa'),
(3, 'Biotecnologia'),
(4, 'Ciencias Ambientales'),
(5, 'Nutricion humana y dietetica');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lugares`
--

CREATE TABLE IF NOT EXISTS `lugares` (
  `lugar_id` int(20) NOT NULL AUTO_INCREMENT,
  `ubicacion` varchar(50) CHARACTER SET latin1 NOT NULL,
  `tipo` varchar(50) CHARACTER SET latin1 NOT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 NOT NULL,
  `tag` varchar(30) NOT NULL,
  PRIMARY KEY (`lugar_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=31 ;

--
-- Volcado de datos para la tabla `lugares`
--

INSERT INTO `lugares` (`lugar_id`, `ubicacion`, `tipo`, `descripcion`, `tag`) VALUES
(1, '37.35741745601511;-5.939558744430542', 'comidas', 'Restaurante cafeteria Edificio Celestino Mutis', 'Cafeteria'),
(2, '37.354449658588806;-5.937541723251343', 'comidas', 'Restaurante cafeteria Plaza de Am?rica', 'Cafeteria'),
(3, '37.3575880155198;-5.939065217971802', 'comidas', 'Pizer?a Santa Clara', 'Pizer'),
(4, '37.357306592129234;-5.939440727233887', 'comidas', 'Golosinas dulces bebidas..', 'kiosko'),
(5, '37.355259844818015;-5.934945344924926', 'deportes', 'Gimnasio', 'Gimnasio'),
(6, '37.35514897774522;-5.933293104171753', 'deportes', 'Pista de atletismo y campo de rugby', 'Rugby'),
(7, '37.35689724713198;-5.935331583023071', 'deportes', 'pista f?tbol sala', 'Pista'),
(8, '37.356939887340026;-5.935792922973633', 'deportes', 'pista de padel', 'pista'),
(9, '37.35505516701724;-5.940964221954346', 'deportes', 'Campo de f?tbol 2', 'pista'),
(10, '37.35520014718377;-5.942080020904541', 'deportes', 'Campo de f?tbol 1', 'pista'),
(11, '37.35578006504967;-5.940738916397095', 'deportes', 'Pabell?n deportivo', 'pabel'),
(12, '37.35508075177285;-5.9401702880859375', 'deportes', 'Pista cubierta de f?tbol sala', 'pista'),
(13, '37.35432173364799;-5.93960165977478', 'deportes', 'Pista de baloncesto', 'pista'),
(14, '37.353059529211045;-5.9360504150390625', 'deportes', 'Pabell?n polideportivo', 'pabell'),
(15, '37.35494429964211;-5.938786268234253', 'aparcamientos', 'Aparcamiento 1', 'aparcamiento'),
(16, '37.35559244505394;-5.939279794692993', 'aparcamientos', 'Aparcamiento 2', 'aparcamiento'),
(17, '37.35619794426373;-5.9398698806762695', 'aparcamientos', 'Aparcamiento 3', 'aparcamiento'),
(18, '37.35712750396765;-5.938045978546143', 'aparcamientos', 'Aparcamiento 5', 'aparcamiento'),
(19, '37.356590236918954;-5.9375739097595215', 'aparcamientos', 'Aparcamiento 6', 'aparcamiento'),
(20, '37.35569478329155;-5.936790704727173', 'aparcamientos', 'Aparcamiento 7', 'aparcamiento'),
(21, '37.3550125257385;-5.9362757205963135', 'aparcamientos', 'Aparcamiento 8', 'aparcamiento'),
(22, '37.35447524355082;-5.93611478805542', 'aparcamientos', 'Aparcamiento 9', 'aparcamiento'),
(23, '37.359012172253884;-5.934494733810424', 'aparcamientos', 'Aparcamiento 10', 'aparcamiento'),
(24, '37.359506783240086;-5.937713384628296', 'aparcamientos', 'Aparcamiento 11', 'aparcamiento'),
(25, '37.35400618452846;-5.943152904510498', 'transportes', 'metro', 'metro'),
(26, '37.357016639653466;-5.941929817199707', 'transportes', 'tussam 38', 'bus'),
(27, '37.356436731341525;-5.940642356872559', 'transportes', 'M130', 'bus'),
(28, '37.353980599406576;-5.939505100250244', 'transportes', 'M123', 'bus'),
(29, '37.353946485897175;-5.939784049987793', 'transportes', 'M133', 'bus'),
(30, '37.357195728079596;-5.939054489135742', 'estudiantes', 'gestion', 'interes');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `profesor_id` int(9) NOT NULL AUTO_INCREMENT,
  `nombre_prof` varchar(30) CHARACTER SET latin1 NOT NULL,
  `apellido1_prof` varchar(20) CHARACTER SET latin1 NOT NULL,
  `apellido2_prof` varchar(20) CHARACTER SET latin1 NOT NULL,
  `asignatura_id` int(11) NOT NULL,
  `despacho_id` int(11) NOT NULL,
  PRIMARY KEY (`profesor_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`profesor_id`, `nombre_prof`, `apellido1_prof`, `apellido2_prof`, `asignatura_id`, `despacho_id`) VALUES
(1, 'carlos', 'barranco', 'Gonz?lez', 2, 2),
(2, 'manuel', 'benitez', 'sanchez', 24, 6),
(3, 'Edwin', 'Quishpe', 'macdonado', 7, 3),
(4, 'Paco', 'lopez', 'baena', 16, 4),
(5, 'Domingo', 'savio', 'rodriguez', 9, 1),
(6, 'sergio', 'bermuso', 'navarrete', 1, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(30) NOT NULL,
  `contrasenya` varchar(30) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `contrasenya`) VALUES
('edwin', 'mauricio'),
('francisco', 'baena'),
('manuel', 'manolo');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
