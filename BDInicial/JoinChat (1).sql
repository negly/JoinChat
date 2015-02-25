-- phpMyAdmin SQL Dump
-- version 4.0.10deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 25-02-2015 a las 20:32:18
-- Versión del servidor: 5.5.41-0ubuntu0.14.04.1
-- Versión de PHP: 5.5.9-1ubuntu4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `JoinChat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `HistorialLogin`
--

CREATE TABLE IF NOT EXISTS `HistorialLogin` (
  `usuario` varchar(20) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  PRIMARY KEY (`usuario`,`fecha`,`hora`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `HistorialLogin`
--

INSERT INTO `HistorialLogin` (`usuario`, `fecha`, `hora`) VALUES
('Felipe', '2015-02-16', '17:50:00'),
('Felipe', '2015-02-16', '18:30:00'),
('Isabel', '2015-02-19', '02:50:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Login`
--

CREATE TABLE IF NOT EXISTS `Login` (
  `usuario` varchar(20) NOT NULL,
  `password` varchar(10) NOT NULL,
  `status` tinyint(1) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Login`
--

INSERT INTO `Login` (`usuario`, `password`, `status`) VALUES
('Felipe', 'abc123', 1),
('Isabel', '123abc', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `Usuario`
--

CREATE TABLE IF NOT EXISTS `Usuario` (
  `usuario` varchar(20) NOT NULL,
  `nickname` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `Usuario`
--

INSERT INTO `Usuario` (`usuario`, `nickname`, `email`) VALUES
('Felipe', 'FelipeCalad', 'felipe@gmail.com'),
('Isabel', 'Azula', 'isa@hotmail.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `HistorialLogin`
--
ALTER TABLE `HistorialLogin`
  ADD CONSTRAINT `HistorialLogin_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Login` (`usuario`);

--
-- Filtros para la tabla `Usuario`
--
ALTER TABLE `Usuario`
  ADD CONSTRAINT `Usuario_ibfk_1` FOREIGN KEY (`usuario`) REFERENCES `Login` (`usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
