-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 23-09-2022 a las 18:29:09
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `php_final`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

CREATE TABLE `administrador` (
  `id_administrador` int(50) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `estado` varchar(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id_administrador`, `nombre`, `contrasena`, `estado`) VALUES
(123, 'juan', '123', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `codigo_curso` int(50) NOT NULL,
  `nombre_curso` varchar(50) NOT NULL,
  `jornada` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`codigo_curso`, `nombre_curso`, `jornada`) VALUES
(1, 'programacion 56', 'mañana'),
(2, 'español', 'tarde'),
(3, 'Uml', 'mañana'),
(4, 'ingles', 'dia'),
(5, 'fisica', 'mañana'),
(7, 'phpp', 'dia'),
(68, 'lógica de programación ', 'Tarde');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso_matricula`
--

CREATE TABLE `curso_matricula` (
  `codigo_curso` int(50) NOT NULL,
  `codigo_matricula` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `curso_matricula`
--

INSERT INTO `curso_matricula` (`codigo_curso`, `codigo_matricula`) VALUES
(1, 1),
(1, 2),
(1, 8),
(2, 1),
(3, 1),
(3, 2),
(4, 1),
(4, 2),
(5, 1),
(5, 2),
(7, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `id_estudiante` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(50) NOT NULL,
  `contrasena` varchar(50) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`id_estudiante`, `nombre`, `apellido`, `correo`, `contrasena`, `telefono`, `estado`, `sexo`) VALUES
(167, 'hola', 'mundo', 'hola@gmail.com', '167', '321456987', '1', 'Mujer'),
(9875, 'Leydy', 'Gonzale', 'leydy@gmail.com', '9875', '328467854', '1', 'Mujer'),
(12333, 'maria 3434455', 'martinez 3455', 'Maria34888@gmail.com', '1234', '5455545', '1', 'Mujer'),
(123456789, 'Danilo', 'uran', 'danilo@gmail.com', '123456789', '398756', '1', 'Hombre'),
(2147483647, 'yasmin', 'piedrahita x3', 'm@gmail.com', '3215487985', '3215487985', '1', 'Mujer');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `matricula`
--

CREATE TABLE `matricula` (
  `cod_matricula` int(20) NOT NULL,
  `id_estudiante` int(20) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `id_administrador` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `matricula`
--

INSERT INTO `matricula` (`cod_matricula`, `id_estudiante`, `fecha_inicio`, `fecha_fin`, `id_administrador`) VALUES
(1, 12333, '2022-09-14', '2022-09-15', 123),
(2, 12333, '2022-09-14', '2022-09-15', 123),
(3, 12333, '2022-09-14', '2022-09-15', 123),
(4, 12333, '2022-09-14', '2022-09-15', 123),
(5, 12333, '2022-09-14', '2022-09-15', 123),
(6, 12333, '2022-09-14', '2022-09-15', 123),
(8, 9875, '2022-09-01', '2022-09-16', 123);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor`
--

CREATE TABLE `profesor` (
  `id_profesor` int(20) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `apellido` varchar(50) NOT NULL,
  `correo` varchar(20) NOT NULL,
  `profesion` varchar(50) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `estado` varchar(1) NOT NULL,
  `sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor`
--

INSERT INTO `profesor` (`id_profesor`, `nombre`, `apellido`, `correo`, `profesion`, `contrasena`, `estado`, `sexo`) VALUES
(123, 'Valeria hola', 'Ruiz', 'valeria34@gmail.com', 'Lic en filosofia', 'Lic en filosofia', '1', 'Mujer'),
(9834, 'santiago', 'carvajal', 'santiago@gmail.com', 'Lic en artes plasticas', '1234', '1', 'Hombre'),
(369852, 'Valeria', 'Ruiz', 'vale@gmail.com', 'lic en psicologia', '123', '1', 'Mujer'),
(966796, 'los intocables', 'ORTIZ VELEZ fgfgfdgdg modi', 'maria_montoya49q@gma', 'lic  en español', 'lic  en español', '1', 'hombre');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesor_curso`
--

CREATE TABLE `profesor_curso` (
  `id_profesor` int(20) NOT NULL,
  `codigo_curso` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `profesor_curso`
--

INSERT INTO `profesor_curso` (`id_profesor`, `codigo_curso`) VALUES
(123, 1),
(123, 2),
(9834, 4),
(369852, 4),
(966796, 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`id_administrador`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`codigo_curso`);

--
-- Indices de la tabla `curso_matricula`
--
ALTER TABLE `curso_matricula`
  ADD PRIMARY KEY (`codigo_curso`,`codigo_matricula`),
  ADD KEY `curso_matri` (`codigo_curso`,`codigo_matricula`),
  ADD KEY `codigo_matricula` (`codigo_matricula`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`id_estudiante`);

--
-- Indices de la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD PRIMARY KEY (`cod_matricula`),
  ADD KEY `id_estudiante` (`id_estudiante`),
  ADD KEY `id_administrador` (`id_administrador`);

--
-- Indices de la tabla `profesor`
--
ALTER TABLE `profesor`
  ADD PRIMARY KEY (`id_profesor`);

--
-- Indices de la tabla `profesor_curso`
--
ALTER TABLE `profesor_curso`
  ADD PRIMARY KEY (`id_profesor`,`codigo_curso`),
  ADD KEY `tbl_profesor` (`id_profesor`,`codigo_curso`),
  ADD KEY `codigo_curso` (`codigo_curso`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `curso`
--
ALTER TABLE `curso`
  MODIFY `codigo_curso` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT de la tabla `matricula`
--
ALTER TABLE `matricula`
  MODIFY `cod_matricula` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `curso_matricula`
--
ALTER TABLE `curso_matricula`
  ADD CONSTRAINT `curso_matricula_ibfk_1` FOREIGN KEY (`codigo_matricula`) REFERENCES `matricula` (`cod_matricula`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `curso_matricula_ibfk_2` FOREIGN KEY (`codigo_curso`) REFERENCES `curso` (`codigo_curso`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `matricula`
--
ALTER TABLE `matricula`
  ADD CONSTRAINT `matricula_ibfk_1` FOREIGN KEY (`id_estudiante`) REFERENCES `estudiante` (`id_estudiante`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `matricula_ibfk_2` FOREIGN KEY (`id_administrador`) REFERENCES `administrador` (`id_administrador`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `profesor_curso`
--
ALTER TABLE `profesor_curso`
  ADD CONSTRAINT `profesor_curso_ibfk_1` FOREIGN KEY (`id_profesor`) REFERENCES `profesor` (`id_profesor`),
  ADD CONSTRAINT `profesor_curso_ibfk_2` FOREIGN KEY (`codigo_curso`) REFERENCES `curso` (`codigo_curso`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
