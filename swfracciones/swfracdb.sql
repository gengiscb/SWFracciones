-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-04-2013 a las 14:59:22
-- Versión del servidor: 5.5.27
-- Versión de PHP: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `swfracdb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE IF NOT EXISTS `actividades` (
  `idActividad` int(11) NOT NULL AUTO_INCREMENT,
  `numeroActividad` varchar(30) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  PRIMARY KEY (`idActividad`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`idActividad`, `numeroActividad`, `nombre`) VALUES
(1, '11', 'Medicion y comparacion de longitudes'),
(2, '12', 'Medicion y comparacion de superficies');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadesalumno`
--

CREATE TABLE IF NOT EXISTS `actividadesalumno` (
  `idActividad` int(11) NOT NULL,
  `idAlumno` int(11) NOT NULL,
  `ingresos` int(11) NOT NULL DEFAULT '0',
  `estado` varchar(45) NOT NULL,
  `intentos` int(11) NOT NULL DEFAULT '0',
  `fechaInicio` datetime NOT NULL,
  `fechaFinalizacion` datetime NOT NULL,
  `Aciertos` int(11) NOT NULL,
  `Fallos` int(11) NOT NULL,
  PRIMARY KEY (`idActividad`,`idAlumno`),
  KEY `idAlumno` (`idAlumno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `actividadesalumno`
--

INSERT INTO `actividadesalumno` (`idActividad`, `idAlumno`, `ingresos`, `estado`, `intentos`, `fechaInicio`, `fechaFinalizacion`, `Aciertos`, `Fallos`) VALUES
(1, 33, 0, 'Finalizado', 0, '2013-04-08 10:00:00', '2013-04-09 10:00:00', 0, 0),
(2, 33, 5, 'Finalizada', 0, '2013-04-09 12:00:00', '2013-04-10 12:00:00', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE IF NOT EXISTS `alumno` (
  `idAlumno` int(11) NOT NULL AUTO_INCREMENT,
  `Edad` int(11) NOT NULL,
  `Grupo` varchar(11) NOT NULL,
  `usuarioId` int(11) NOT NULL,
  PRIMARY KEY (`idAlumno`),
  KEY `usuarioId` (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`idAlumno`, `Edad`, `Grupo`, `usuarioId`) VALUES
(14, 0, '5', 33);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE IF NOT EXISTS `profesor` (
  `idProfesor` int(11) NOT NULL AUTO_INCREMENT,
  `usuarioId` int(11) NOT NULL,
  PRIMARY KEY (`idProfesor`),
  KEY `usuarioId` (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`idProfesor`, `usuarioId`) VALUES
(5, 31),
(6, 32);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuarioId` int(11) NOT NULL AUTO_INCREMENT,
  `contrasenia` varchar(45) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `apellidoP` varchar(45) NOT NULL,
  `apellidoM` varchar(45) NOT NULL,
  `matricula` varchar(6) NOT NULL,
  `tipoUsuario` int(11) NOT NULL,
  PRIMARY KEY (`usuarioId`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuarioId`, `contrasenia`, `nombre`, `apellidoP`, `apellidoM`, `matricula`, `tipoUsuario`) VALUES
(29, 'admin', 'admin', 'admin', 'admin', 'admin', 1),
(31, 'profe1', 'Prof', 'ProfM', 'Prof', 'profe1', 2),
(32, 'profe1', 'prof2', 'prof2', 'prof2', 'profe2', 2),
(33, 'alumn1', 'Alumn1', 'Alumn', 'alumn1', 'alumn1', 3);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD CONSTRAINT `alumno_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD CONSTRAINT `profesor_ibfk_1` FOREIGN KEY (`usuarioId`) REFERENCES `usuarios` (`usuarioId`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
