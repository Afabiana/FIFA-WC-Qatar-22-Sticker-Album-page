-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 18-10-2022 a las 04:48:08
-- Versión del servidor: 10.4.25-MariaDB
-- Versión de PHP: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_stickers`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `figuritas`
--

CREATE TABLE `figuritas` (
  `numero` int(2) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(20) NOT NULL,
  `image_dir` varchar(45) NOT NULL,
  `id_pais` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `figuritas`
--

INSERT INTO `figuritas` (`numero`, `nombre`, `apellido`, `image_dir`, `id_pais`) VALUES
(1, 'test', 'argentina', 'images/figuritas/escudo-argentina.png', 1),
(2, 'emiliano', 'martinez', 'images/figuritas/emiliano-martinez.png', 1),
(8, 'cristian', 'romero', 'images/figuritas/cristian-romero.png', 1),
(12, 'leandro', 'paredes', 'images/figuritas/leandro-paredes.png', 1),
(14, 'eden', 'hazard', 'images/figuritas/eden-hazard.png', 2),
(18, 'lionel', 'messi', 'images/figuritas/634e0f5104bc9.png', 1),
(21, 'thibaut', 'courtois', 'images/figuritas/thibaut-courtois.png', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `selecciones`
--

CREATE TABLE `selecciones` (
  `id_pais` int(2) NOT NULL,
  `pais` varchar(20) NOT NULL,
  `bandera_dir` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `selecciones`
--

INSERT INTO `selecciones` (`id_pais`, `pais`, `bandera_dir`) VALUES
(1, 'argentina', 'images/banderas/arg.png'),
(2, 'belgica', './images/banderas/bel.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `email` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`email`, `password`) VALUES
('hola@muchogusto.com', '$2a$12$Uk1wI./HSgqBgWM.4ZjFC.puvNXEYHygUHo2DlRgEcD9kc4pGj2QO');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `figuritas`
--
ALTER TABLE `figuritas`
  ADD PRIMARY KEY (`numero`),
  ADD KEY `id_pais` (`id_pais`);

--
-- Indices de la tabla `selecciones`
--
ALTER TABLE `selecciones`
  ADD PRIMARY KEY (`id_pais`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `selecciones`
--
ALTER TABLE `selecciones`
  MODIFY `id_pais` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `figuritas`
--
ALTER TABLE `figuritas`
  ADD CONSTRAINT `figuritas_ibfk_1` FOREIGN KEY (`id_pais`) REFERENCES `selecciones` (`id_pais`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
