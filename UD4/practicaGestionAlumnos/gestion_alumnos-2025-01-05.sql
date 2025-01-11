-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 10-01-2025 a las 02:41:57
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `gestion_alumnos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `alumno`
--

CREATE TABLE `alumno` (
  `id_alumno` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `alumno`
--

INSERT INTO `alumno` (`id_alumno`, `nombre`, `apellidos`, `password`) VALUES
(1, 'Javier', 'Garcia', 'javiergarcia'),
(2, 'Diego', 'Galante', 'aaaaaaaaaaaa'),
(3, 'Clara', 'Martinez', 'xxxxxxxxxx');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `curso` varchar(255) NOT NULL,
  `nota` int(11) NOT NULL,
  `fecha_presentacion` date DEFAULT NULL,
  `pdf_proyecto` varchar(255) NOT NULL,
  `logotipo` mediumblob NOT NULL,
  `id_alumno` int(11) DEFAULT NULL,
  `id_tutor` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `titulo`, `descripcion`, `curso`, `nota`, `fecha_presentacion`, `pdf_proyecto`, `logotipo`, `id_alumno`, `id_tutor`) VALUES
(2, 'hola', '', '33', 3, '2025-01-16', '2.pdf', "", NULL, NULL);
INSERT INTO `proyecto` (`id_proyecto`, `titulo`, `descripcion`, `curso`, `nota`, `fecha_presentacion`, `pdf_proyecto`, `logotipo`, `id_alumno`, `id_tutor`) VALUES
(3, 'holax', '', '2023', 4, '2025-01-15', '3.pdf', "", 1, 12);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tutor`
--

CREATE TABLE `tutor` (
  `id_tutor` int(11) NOT NULL,
  `correo` varchar(255) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `tipo_usu` int(11) NOT NULL,
  `baja` tinyint(1) NOT NULL,
  `activada` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish_ci;

--
-- Volcado de datos para la tabla `tutor`
--

INSERT INTO `tutor` (`id_tutor`, `correo`, `nombre`, `apellidos`, `password`, `tipo_usu`, `baja`, `activada`) VALUES
(0, 'admin@admin.com', 'admin', '', '$2y$10$rl1CD4HvtSW0UiqU8lvOkOum1nIVGWCbw7PBcK0s0fZUswkNlf2lG', 1, 0, 1),
(11, 'hola@hola.com', 'hola', 'hola', '$2y$10$J6iQDzG/veNfeBxHe2M92.SZ2tnqSATe6J5gEvyrKDTnwm8M2wkOW', 2, 0, 1),
(12, 'pablo@campu.com', 'Pablo', 'Campuzano Cuadrado', '$2y$10$kUAoYBO0T2RxxzhY.C3PH.ik/tItkS0H8Hi2ir9WBWJbUH1a6dbb.', 2, 0, 1),
(13, 'buenos@dias.com', 'buenos', 'dias', '$2y$10$h94uQiSkFWGxqfzyz8EG3uIFpbN0rVhZXJizLHmOFuacQAwBsOOte', 2, 0, 1),
(14, 'hola2@hola.com', 'hola', 'hola', '$2y$10$WcD5aD96Cih0Zv9kC82SQ.GcJikCUKTfLnpLk4nuVkVZCJy5qF6i2', 2, 0, 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `alumno`
--
ALTER TABLE `alumno`
  ADD PRIMARY KEY (`id_alumno`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `proyecto_alumno_FK` (`id_alumno`),
  ADD KEY `proyecto_tutor_FK` (`id_tutor`);

--
-- Indices de la tabla `tutor`
--
ALTER TABLE `tutor`
  ADD PRIMARY KEY (`id_tutor`),
  ADD UNIQUE KEY `tutor_correo_unique` (`correo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `alumno`
--
ALTER TABLE `alumno`
  MODIFY `id_alumno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tutor`
--
ALTER TABLE `tutor`
  MODIFY `id_tutor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_alumno_FK` FOREIGN KEY (`id_alumno`) REFERENCES `alumno` (`id_alumno`) ON DELETE SET NULL ON UPDATE CASCADE,
  ADD CONSTRAINT `proyecto_tutor_FK` FOREIGN KEY (`id_tutor`) REFERENCES `tutor` (`id_tutor`) ON DELETE SET NULL ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
