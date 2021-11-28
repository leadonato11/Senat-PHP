-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-11-2021 a las 02:51:06
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
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
-- Estructura de tabla para la tabla `alimentoencuesta`
--

CREATE TABLE `alimentoencuesta` (
  `idalimentoencuesta` int(11) NOT NULL,
  `idencuesta` int(11) NOT NULL,
  `idalimento` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuesta`
--

CREATE TABLE `encuesta` (
  `idencuesta` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(300) NOT NULL,
  `estado` int(11) NOT NULL,
  `fechacreacion` datetime NOT NULL,
  `fechaumod` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestado`
--

CREATE TABLE `encuestado` (
  `idencuestado` int(11) NOT NULL,
  `idusuario` int(11) NOT NULL,
  `idencuesta` int(11) NOT NULL,
  `edad` int(11) NOT NULL,
  `sexo` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `encuestafrecuencia`
--

CREATE TABLE `encuestafrecuencia` (
  `idencuestafrecuencia` int(11) NOT NULL,
  `idfrecuencia` int(11) NOT NULL,
  `idencuesta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `encuestafrecuencia`
--

INSERT INTO `encuestafrecuencia` (`idencuestafrecuencia`, `idfrecuencia`, `idencuesta`) VALUES
(61, 3, 32),
(62, 4, 32),
(63, 5, 32),
(64, 6, 32),
(65, 1, 33),
(66, 4, 33),
(67, 7, 33),
(68, 1, 34),
(69, 2, 34),
(70, 4, 34),
(71, 5, 34),
(72, 6, 34),
(73, 7, 32),
(74, 7, 31),
(75, 2, 31),
(76, 1, 31),
(77, 2, 31),
(78, 4, 31),
(80, 7, 31),
(81, 1, 31),
(82, 2, 31),
(83, 4, 31),
(85, 7, 31),
(86, 1, 31),
(87, 2, 31),
(88, 4, 31),
(90, 7, 31),
(91, 1, 31),
(92, 2, 31),
(93, 4, 31),
(95, 7, 31),
(96, 3, 31),
(97, 1, 35),
(98, 2, 35),
(99, 3, 35),
(100, 4, 35),
(101, 1, 36),
(102, 2, 36),
(103, 3, 36),
(104, 4, 36),
(105, 1, 37),
(106, 5, 37),
(107, 6, 37),
(108, 7, 37),
(109, 2, 38),
(110, 3, 38),
(111, 4, 38),
(112, 5, 38),
(113, 2, 39),
(114, 3, 39),
(115, 4, 39),
(116, 5, 39),
(117, 2, 40),
(118, 3, 40),
(119, 4, 40),
(120, 5, 40),
(121, 4, 41),
(122, 2, 42),
(123, 3, 42),
(124, 4, 42),
(125, 5, 42),
(126, 6, 42),
(127, 7, 42);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `frecuencias`
--

CREATE TABLE `frecuencias` (
  `idfrecuencia` int(11) NOT NULL,
  `nombrefrec` varchar(50) NOT NULL,
  `valorfrec` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `frecuencias`
--

INSERT INTO `frecuencias` (`idfrecuencia`, `nombrefrec`, `valorfrec`) VALUES
(1, 'Nunca', 0),
(2, 'Menos de 1 vez por semana', 0.5),
(3, '1 vez por semana', 1),
(4, '2-3 veces por semana', 2.5),
(5, '4-6 veces por semana', 5),
(6, 'Diariamente', 7),
(7, 'Más de 1 vez al día', 10);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grupos`
--

CREATE TABLE `grupos` (
  `idgrupos` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lastupdate`
--

CREATE TABLE `lastupdate` (
  `idlastupdate` int(11) NOT NULL,
  `usuarios` datetime NOT NULL,
  `alimentos` datetime NOT NULL,
  `encuestas` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `lastupdate`
--

INSERT INTO `lastupdate` (`idlastupdate`, `usuarios`, `alimentos`, `encuestas`) VALUES
(1, '2021-11-27 22:17:51', '2021-11-26 00:50:45', '2021-11-27 21:12:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuestas`
--

CREATE TABLE `respuestas` (
  `idrespuesta` int(11) NOT NULL,
  `idencuesta` int(11) NOT NULL,
  `idalimento` int(11) NOT NULL,
  `idfrecuencia` int(11) NOT NULL,
  `idporcion` int(11) NOT NULL COMMENT 'Peso de la porcion'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, '0000', 'senat', 'Administrador', 'Administrador', '1', 'administrador@administrador.com', 'Lechuga 01.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alimentoencuesta`
--
ALTER TABLE `alimentoencuesta`
  ADD PRIMARY KEY (`idalimentoencuesta`);

--
-- Indices de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  ADD PRIMARY KEY (`idalimentos`);

--
-- Indices de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  ADD PRIMARY KEY (`idencuesta`);

--
-- Indices de la tabla `encuestado`
--
ALTER TABLE `encuestado`
  ADD PRIMARY KEY (`idencuestado`);

--
-- Indices de la tabla `encuestafrecuencia`
--
ALTER TABLE `encuestafrecuencia`
  ADD PRIMARY KEY (`idencuestafrecuencia`);

--
-- Indices de la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
  ADD PRIMARY KEY (`idfrecuencia`);

--
-- Indices de la tabla `grupos`
--
ALTER TABLE `grupos`
  ADD PRIMARY KEY (`idgrupos`);

--
-- Indices de la tabla `lastupdate`
--
ALTER TABLE `lastupdate`
  ADD PRIMARY KEY (`idlastupdate`);

--
-- Indices de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  ADD PRIMARY KEY (`idrespuesta`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alimentoencuesta`
--
ALTER TABLE `alimentoencuesta`
  MODIFY `idalimentoencuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=95;

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idalimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idencuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `encuestado`
--
ALTER TABLE `encuestado`
  MODIFY `idencuestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `encuestafrecuencia`
--
ALTER TABLE `encuestafrecuencia`
  MODIFY `idencuestafrecuencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
  MODIFY `idfrecuencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `lastupdate`
--
ALTER TABLE `lastupdate`
  MODIFY `idlastupdate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
