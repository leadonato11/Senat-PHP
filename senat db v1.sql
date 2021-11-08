-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 27-09-2021 a las 02:39:21
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `senat`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alimentos`
--

CREATE TABLE `alimentos` (
  `idalimentos` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cant` float NOT NULL,
  `umedida` varchar(200) NOT NULL,
  `porcion1` float NOT NULL,
  `porcion2` float NOT NULL,
  `porcion3` float NOT NULL,
  `porcion4` float NOT NULL,
  `grupo` varchar(200) NOT NULL,
  `energia` float NOT NULL,
  `grasa` float NOT NULL,
  `hcarbono` float NOT NULL,
  `proteina` float NOT NULL,
  `colesterol` float NOT NULL,
  `falimentaria` float NOT NULL,
  `sodio` float NOT NULL,
  `agua` float NOT NULL,
  `vitaminaa` float NOT NULL,
  `vitaminab6` float NOT NULL,
  `vitaminab12` float NOT NULL,
  `vitaminac` float NOT NULL,
  `vitaminad` float NOT NULL,
  `vitaminae` float NOT NULL,
  `vitaminak` float NOT NULL,
  `almidon` float NOT NULL,
  `lactosa` float NOT NULL,
  `alcohol` float NOT NULL,
  `cafeina` float NOT NULL,
  `azucares` float NOT NULL,
  `calcio` float NOT NULL,
  `hierro` float NOT NULL,
  `magnesio` float NOT NULL,
  `fosforo` float NOT NULL,
  `cinc` float NOT NULL,
  `cobre` float NOT NULL,
  `fluor` float NOT NULL,
  `manganeso` float NOT NULL,
  `selenio` float NOT NULL,
  `tiamina` float NOT NULL,
  `acpant` float NOT NULL,
  `riboflavina` float NOT NULL,
  `niacina` float NOT NULL,
  `folato` float NOT NULL,
  `acfolico` float NOT NULL,
  `grasast` float NOT NULL,
  `grasasmi` float NOT NULL,
  `grasaspi` float NOT NULL,
  `cloruro` float NOT NULL,
  `caroteno` float NOT NULL,
  `fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`idalimentos`, `nombre`, `cant`, `umedida`, `porcion1`, `porcion2`, `porcion3`, `porcion4`, `grupo`, `energia`, `grasa`, `hcarbono`, `proteina`, `colesterol`, `falimentaria`, `sodio`, `agua`, `vitaminaa`, `vitaminab6`, `vitaminab12`, `vitaminac`, `vitaminad`, `vitaminae`, `vitaminak`, `almidon`, `lactosa`, `alcohol`, `cafeina`, `azucares`, `calcio`, `hierro`, `magnesio`, `fosforo`, `cinc`, `cobre`, `fluor`, `manganeso`, `selenio`, `tiamina`, `acpant`, `riboflavina`, `niacina`, `folato`, `acfolico`, `grasast`, `grasasmi`, `grasaspi`, `cloruro`, `caroteno`, `fecha`) VALUES
(3, 'Manzana', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 01:28:56'),
(4, 'Pera', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 01:30:58'),
(5, 'Mandarina', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 01:33:09'),
(6, 'Arroz', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 01:35:25'),
(7, 'brd', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 01:35:43'),
(8, 'drby', 0, '', 0, 0, 0, 0, '', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2021-09-20 01:41:30'),
(10, 'Pan de Salvado', 100, 'gr', 100, 200, 300, 450, 'Harinas', 1.2, 2.3, 3.4, 5.633, 1.25, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 20.3, '2021-09-26 20:33:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestas`
--

CREATE TABLE `encuestas` (
  `idencuestas` int(11) NOT NULL,
  `idcreador` int(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `estado` varchar(200) NOT NULL,
  `fechac` datetime NOT NULL,
  `fechaum` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idgrupos` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idgrupos`, `nombres`) VALUES
(1, 'Fruta'),
(2, 'Lacteo'),
(3, 'Huevo'),
(4, 'Harinas'),
(5, 'Legumbres'),
(6, 'LegumHarinasbres'),
(7, 'Carnes Blancas');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lastupdate`
--

CREATE TABLE `lastupdate` (
  `lastupdate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lastupdate`
--

INSERT INTO `lastupdate` (`lastupdate`) VALUES
('2021-07-11 03:00:00'),
('2021-07-11 03:00:00'),
('2021-07-11 03:00:00'),
('2021-07-11 03:00:00'),
('2021-07-11 03:00:00'),
('2021-07-11 03:00:00'),
('2021-07-11 03:00:00'),
('2021-08-03 01:39:02'),
('2021-08-03 01:47:02'),
('2021-08-03 01:50:37'),
('2021-08-02 03:00:00'),
('2021-09-15 19:01:55'),
('2021-09-15 19:05:25'),
('2021-09-16 20:43:23'),
('2021-09-16 20:52:06'),
('2021-09-20 03:50:17'),
('2021-09-20 03:53:04'),
('2021-09-20 04:28:56'),
('2021-09-20 04:30:58'),
('2021-09-20 04:33:09'),
('2021-09-20 04:35:25'),
('2021-09-20 04:35:43'),
('2021-09-20 04:41:30'),
('2021-09-26 21:08:56'),
('2021-09-26 23:33:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `idusuario` int(11) NOT NULL,
  `dni` varchar(200) NOT NULL,
  `clave` varchar(200) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `apellido` varchar(200) NOT NULL,
  `rol` varchar(200) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `foto` varchar(200) NOT NULL,
  `estado` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`idusuario`, `dni`, `clave`, `nombre`, `apellido`, `rol`, `correo`, `foto`, `estado`) VALUES
(1, '0000', 'senat', 'Joe', 'Doee', 'admin', 'joe@gmail.com', 'TEM.jpg', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idalimentos`);

--
-- Indices de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  ADD PRIMARY KEY (`idencuestas`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idgrupos`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idalimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `encuestas`
--
ALTER TABLE `encuestas`
  MODIFY `idencuestas` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
