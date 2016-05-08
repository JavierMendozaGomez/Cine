-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 08-05-2016 a las 12:04:14
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yourmedia`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `game`
--

CREATE TABLE `game` (
  `idUser` varchar(300) NOT NULL,
  `idGame` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `game`
--

INSERT INTO `game` (`idUser`, `idGame`) VALUES
('mario@gmail.com', 'tt0244783'),
('django@gmail.com', 'tt5114332'),
('bobMarley@gmail.com', 'tt3304506');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `movie`
--

CREATE TABLE `movie` (
  `idUser` varchar(300) NOT NULL,
  `idMovie` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `movie`
--

INSERT INTO `movie` (`idUser`, `idMovie`) VALUES
('bobMarley@gmail.com', 'tt1524134'),
('mario@gmail.com', 'tt0372237'),
('mario@gmail.com', 'tt0071544'),
('bobMarley@gmail.com', 'tt0439815'),
('django@gmail.com', 'tt2294629'),
('bobMarley@gmail.com', 'tt4257926');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `series`
--

CREATE TABLE `series` (
  `idUser` varchar(300) NOT NULL,
  `idSeries` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `series`
--

INSERT INTO `series` (`idUser`, `idSeries`) VALUES
('bobMarley@gmail.com', 'tt3006802'),
('bobMarley@gmail.com', 'tt1806234'),
('bobMarley@gmail.com', 'tt1520211'),
('bobMarley@gmail.com', 'tt0046600'),
('mario@gmail.com', 'tt0411008'),
('bobMarley@gmail.com', 'tt1382579'),
('django@gmail.com', 'tt2618986'),
('django@gmail.com', 'tt2707408'),
('django@gmail.com', 'tt1124373');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `email` varchar(300) NOT NULL,
  `contrasena` varchar(300) NOT NULL,
  `nick` varchar(300) NOT NULL,
  `newOffers` bit(1) NOT NULL,
  `image` varchar(300) NOT NULL,
  `city` varchar(300) NOT NULL,
  `country` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`email`, `contrasena`, `nick`, `newOffers`, `image`, `city`, `country`) VALUES
('bobMarley@gmail.com', '123456', 'bobMarley', b'0', 'http://cps-static.rovicorp.com/3/JPG_400/MI0003/146/MI0003146038.jpg?partner=allrovi.com', 'Kingston', 'Jamaica'),
('mario@gmail.com', '123456', 'mario', b'1', 'http://cdn.wccftech.com/wp-content/uploads/2015/04/mario-2.png', 'Madrid', 'EspaÃ±a'),
('django@gmail.com', '123456', 'django', b'1', 'http://pre09.deviantart.net/e98f/th/pre/f/2013/087/5/d/django_by_jow3ew0l-d5zlnyt.jpg', 'Madrid', 'EspaÃ±a');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
