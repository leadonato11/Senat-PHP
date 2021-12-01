-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2021 a las 23:59:49
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

--
-- Volcado de datos para la tabla `alimentoencuesta`
--

INSERT INTO `alimentoencuesta` (`idalimentoencuesta`, `idencuesta`, `idalimento`) VALUES
(95, 43, 39),
(96, 44, 39),
(97, 45, 39),
(98, 46, 39),
(99, 46, 42),
(100, 47, 41),
(101, 47, 42),
(102, 47, 43),
(103, 47, 44),
(104, 48, 42),
(105, 49, 41),
(106, 49, 43),
(107, 50, 43),
(108, 50, 45);

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

--
-- Volcado de datos para la tabla `alimentos`
--

INSERT INTO `alimentos` (`idalimentos`, `nombre`, `cant`, `umedida`, `porcion1`, `porcion2`, `porcion3`, `porcion4`, `grupo`, `energia`, `grasa`, `hcarbono`, `proteina`, `colesterol`, `falimentaria`, `sodio`, `agua`, `vitaminaa`, `vitaminab6`, `vitaminab12`, `vitaminac`, `vitaminad`, `vitaminae`, `vitaminak`, `almidon`, `lactosa`, `alcohol`, `cafeina`, `azucares`, `calcio`, `hierro`, `magnesio`, `fosforo`, `cinc`, `cobre`, `fluor`, `manganeso`, `selenio`, `tiamina`, `acpant`, `riboflavina`, `niacina`, `folato`, `acfolico`, `grasast`, `grasasmi`, `grasaspi`, `cloruro`, `caroteno`, `estado`) VALUES
(39, 'Leche Entera', 100, 'cc', 83, 166, 249, 332, 'Lacteos', 56.9, 2.9, 4.6, 3.1, 10, 0, 0, 88.7, 28, 0, 0.435, 0, 0, 56.9, 137, 0, 0, 0, 123, 0, 0, 0.07, 0, 0, 0.33, 0, 0, 0, 0, 0, 0, 0, 0.11, 5, 0, 0, 0, 0, 0, 0, 1),
(41, 'Melon Blanco', 100, 'gr', 50, 100, 150, 200, 'Frutas', 24.2, 0.2, 5.9, 0.6, 0, 0.9, 17, 92.7, 0, 0, 0, 14.8, 0, 0, 275, 0, 0, 0, 0, 0, 17, 0.52, 0, 18, 0.07, 0, 0, 0, 0, 0, 0, 0, 0.3, 8, 0, 0, 0.001, 0.038, 0, 0, 1),
(42, 'Sandia', 100, 'gr', 30, 60, 90, 120, 'Frutas', 29.8, 0.2, 6.9, 0.5, 0, 0.4, 6, 92.1, 28, 0, 0, 9.1, 0, 0, 0, 0, 0, 0, 0, 0, 11, 0.23, 0, 3, 0.1, 0, 0, 0, 0, 0, 0, 0, 0.18, 3, 0, 0, 0.036, 0.049, 0, 0, 1),
(43, 'Ensalada de Frutas', 100, 'gr', 25, 50, 75, 100, 'Frutas', 313.82, 0.1, 76.4, 3.5, 0, 1.67, 0, 20, 1.52, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 30, 0.74, 0, 29, 0.09, 0, 0, 0, 0, 0, 0, 0, 0.2, 17, 0, 0, 0, 0, 0, 0, 1),
(44, 'Lechuga', 100, 'gr', 20, 45, 85, 120, 'Verduras', 14, 9, 2, 3, 98, 0, 0, 45, 80, 0, 0, 0, 12, 0, 0, 78, 0, 0, 55, 0, 0, 12, 0, 21, 0, 0, 0, 0, 66, 0, 0, 6, 0, 0, 23, 0, 21, 0, 0, 0, 1),
(45, 'Manzana Roja con piel', 100, 'gr', 15.6, 35.7, 48.6, 66.1, 'Frutas', 48.21, 0.17, 13.8, 0.26, 0, 2.4, 1, 85.56, 3, 0, 0, 4.6, 0, 0, 0, 0, 0, 0, 0, 0, 6, 0.12, 0, 11, 0.04, 0, 0, 0, 0, 0, 0, 0, 0.09, 3, 0, 0.028, 0.007, 0.051, 0, 0, 1);

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

--
-- Volcado de datos para la tabla `encuesta`
--

INSERT INTO `encuesta` (`idencuesta`, `idusuario`, `nombre`, `descripcion`, `estado`, `fechacreacion`, `fechaumod`) VALUES
(49, 1, 'Encuesta de prueba', 'Esta es una encuesta de prueba', 1, '2021-11-30 16:18:23', '2021-11-30 00:00:00'),
(50, 1, 'Azúcares verano 2021', 'Encuesta para evaluar la ingesta de azúcares en la población', 2, '2021-11-30 23:47:29', '2021-11-30 00:00:00');

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

--
-- Volcado de datos para la tabla `encuestado`
--

INSERT INTO `encuestado` (`idencuestado`, `idusuario`, `idencuesta`, `edad`, `sexo`) VALUES
(21, 1, 46, 32, 'Masculino'),
(25, 1, 43, 45, 'Masculino'),
(26, 1, 43, 54, 'Femenino'),
(27, 1, 43, 52, 'Femenino'),
(28, 1, 43, 46358, 'Femenino'),
(29, 1, 43, 25, 'Femenino'),
(30, 1, 43, 25, 'Masculino'),
(31, 12, 47, 21, 'Masculino'),
(32, 12, 47, 23, 'Masculino'),
(33, 12, 47, 87, 'Femenino'),
(34, 12, 47, 45, 'Femenino'),
(35, 1, 47, 11, 'Femenino'),
(36, 1, 47, 13, 'Femenino'),
(37, 1, 47, 15, 'Masculino'),
(38, 1, 47, 10, 'Masculino'),
(39, 1, 43, 35, 'Masculino'),
(40, 1, 43, 55, 'Femenino'),
(41, 1, 48, 12, 'Femenino'),
(42, 1, 48, 13, 'Femenino'),
(43, 1, 48, 14, 'Femenino'),
(44, 1, 48, 15, 'Femenino'),
(45, 1, 48, 16, 'Femenino'),
(46, 1, 48, 17, 'Femenino'),
(47, 1, 48, 18, 'Femenino'),
(48, 1, 48, 19, 'Femenino'),
(49, 1, 48, 54, 'Masculino'),
(50, 1, 48, 34, 'Masculino'),
(51, 1, 48, 56, 'Femenino'),
(52, 1, 48, 56, 'Masculino'),
(53, 1, 48, 12, 'Femenino'),
(54, 1, 48, 20, 'Masculino'),
(55, 1, 48, 21, 'Masculino'),
(56, 1, 48, 22, 'Masculino'),
(57, 1, 48, 23, 'Masculino'),
(58, 1, 43, 11, 'Masculino'),
(59, 1, 49, 30, 'Femenino'),
(60, 1, 49, 31, 'Masculino'),
(61, 1, 49, 32, 'Femenino'),
(62, 1, 49, 33, 'Masculino'),
(63, 1, 49, 30, 'Masculino'),
(64, 1, 49, 37, 'Masculino'),
(65, 1, 49, 36, 'Femenino'),
(66, 1, 49, 33, 'Femenino'),
(67, 1, 49, 36, 'Masculino'),
(68, 1, 49, 34, 'Femenino'),
(69, 1, 50, 23, 'Femenino'),
(70, 1, 50, 89, 'Masculino'),
(71, 1, 50, 15, 'Femenino');

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
(127, 7, 42),
(128, 3, 43),
(129, 4, 43),
(130, 5, 43),
(131, 5, 44),
(132, 6, 44),
(133, 7, 44),
(134, 2, 45),
(135, 3, 45),
(136, 5, 45),
(137, 3, 46),
(138, 4, 46),
(139, 6, 46),
(140, 3, 47),
(141, 6, 47),
(142, 7, 47),
(143, 5, 47),
(144, 2, 48),
(145, 3, 48),
(146, 4, 48),
(147, 5, 48),
(148, 6, 48),
(149, 7, 48),
(150, 3, 49),
(151, 5, 49),
(152, 7, 49),
(153, 2, 50),
(154, 3, 50),
(155, 4, 50);

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

--
-- Volcado de datos para la tabla `grupos`
--

INSERT INTO `grupos` (`idgrupos`, `nombres`) VALUES
(19, 'Lacteos'),
(20, 'Frutas'),
(22, 'Verduras');

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
(1, '2021-11-30 18:44:45', '2021-11-30 19:17:51', '2021-11-30 23:47:29');

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

--
-- Volcado de datos para la tabla `respuestas`
--

INSERT INTO `respuestas` (`idrespuesta`, `idencuesta`, `idalimento`, `idfrecuencia`, `idporcion`) VALUES
(44, 21, 39, 7, 2),
(45, 21, 42, 3, 4),
(46, 26, 39, 1, 2),
(47, 28, 39, 0, 0),
(48, 29, 39, 0, 1),
(49, 30, 39, 0, 2),
(50, 31, 41, 1, 2),
(51, 31, 42, 10, 1),
(52, 31, 43, 7, 3),
(53, 31, 44, 5, 4),
(54, 32, 41, 7, 3),
(55, 32, 42, 7, 4),
(56, 32, 43, 5, 3),
(57, 32, 44, 10, 1),
(58, 33, 41, 1, 1),
(59, 33, 42, 7, 4),
(60, 33, 43, 7, 4),
(61, 33, 44, 10, 3),
(62, 34, 41, 7, 1),
(63, 34, 42, 1, 2),
(64, 34, 43, 7, 3),
(65, 34, 44, 7, 2),
(66, 35, 41, 7, 2),
(67, 35, 42, 7, 2),
(68, 35, 43, 7, 2),
(69, 35, 44, 7, 2),
(70, 36, 41, 1, 1),
(71, 36, 42, 1, 1),
(72, 36, 43, 1, 1),
(73, 36, 44, 1, 1),
(74, 37, 41, 5, 4),
(75, 37, 42, 5, 4),
(76, 37, 43, 5, 4),
(77, 37, 44, 5, 4),
(78, 38, 41, 7, 1),
(79, 38, 42, 7, 1),
(80, 38, 43, 7, 1),
(81, 38, 44, 7, 1),
(82, 39, 39, 1, 1),
(83, 40, 39, 4, 2),
(84, 41, 42, 2, 1),
(85, 42, 42, 3, 1),
(86, 43, 42, 4, 1),
(87, 44, 42, 5, 1),
(88, 45, 42, 6, 1),
(89, 46, 42, 7, 1),
(90, 47, 42, 0, 0),
(91, 48, 42, 0, 3),
(92, 49, 42, 1, 2),
(93, 50, 42, 1, 0),
(94, 51, 42, 0, 0),
(95, 52, 42, 1, 4),
(96, 53, 42, 7, 4),
(97, 54, 42, 1, 0),
(98, 55, 42, 1, 0),
(99, 56, 42, 7, 0),
(100, 57, 42, 7, 4),
(101, 58, 39, 4, 2),
(102, 59, 41, 1, 0),
(103, 59, 43, 3, 1),
(104, 60, 41, 5, 2),
(105, 60, 43, 7, 4),
(106, 61, 41, 1, 4),
(107, 61, 43, 5, 3),
(108, 62, 41, 5, 3),
(109, 62, 43, 3, 4),
(110, 63, 41, 5, 2),
(111, 63, 43, 7, 3),
(112, 64, 41, 7, 2),
(113, 64, 43, 3, 4),
(114, 65, 41, 5, 2),
(115, 65, 43, 5, 3),
(116, 66, 41, 5, 1),
(117, 66, 43, 3, 2),
(118, 67, 41, 3, 3),
(119, 67, 43, 5, 4),
(120, 68, 41, 7, 4),
(121, 68, 43, 3, 3),
(122, 69, 43, 4, 3),
(123, 69, 45, 3, 4),
(124, 70, 43, 3, 0),
(125, 70, 45, 3, 3),
(126, 71, 43, 3, 4),
(127, 71, 45, 4, 2);

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
(1, '0000', 'senat', 'Admin', 'Admin', '1', 'admin@ad.com', '', 1),
(8, '123456789', '12354', 'Usuario 1', 'Usuario 1', '1', 'user1@user1.com', '', 1),
(9, '11212121', '1234', 'Juan', 'Casalis', '1', 'juan.casalis@mail.com', 'default-user-image.png', 1),
(10, '35487889', 'matialmada', 'Matias', 'Almada', '2', 'almada@gmail.com', '', 0),
(11, '24987398', '1234', 'Hernan', 'Sosa', '2', 'hernan.sosa@gmail.com', 'image.jpg', 1),
(12, '38564789', '1234', 'Luciano', 'Ripani', '2', 'lucho.ripa@gmail.com', '2021-11-29 20_48_17-Window.png', 1);

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
  MODIFY `idalimentoencuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT de la tabla `alimentos`
--
ALTER TABLE `alimentos`
  MODIFY `idalimentos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT de la tabla `encuesta`
--
ALTER TABLE `encuesta`
  MODIFY `idencuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `encuestado`
--
ALTER TABLE `encuestado`
  MODIFY `idencuestado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT de la tabla `encuestafrecuencia`
--
ALTER TABLE `encuestafrecuencia`
  MODIFY `idencuestafrecuencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=156;

--
-- AUTO_INCREMENT de la tabla `frecuencias`
--
ALTER TABLE `frecuencias`
  MODIFY `idfrecuencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `grupos`
--
ALTER TABLE `grupos`
  MODIFY `idgrupos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `lastupdate`
--
ALTER TABLE `lastupdate`
  MODIFY `idlastupdate` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `respuestas`
--
ALTER TABLE `respuestas`
  MODIFY `idrespuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=128;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
