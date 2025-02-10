-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-01-2025 a las 21:36:48
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
-- Base de datos: `tiendaweb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id_item_carrito` int(11) NOT NULL,
  `id_producto_carrito_fk` int(11) NOT NULL,
  `id_user_carrito_fk` int(11) NOT NULL,
  `cantidad_carrito` int(11) NOT NULL,
  `id_carrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `compras`
--

CREATE TABLE `compras` (
  `id_compra` int(20) NOT NULL,
  `id_producto_compra_fk` int(20) NOT NULL,
  `id_user_compra_fk` int(20) NOT NULL,
  `fecha_compra` date NOT NULL,
  `cantidad` int(11) NOT NULL,
  `id_carrito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `compras`
--

INSERT INTO `compras` (`id_compra`, `id_producto_compra_fk`, `id_user_compra_fk`, `fecha_compra`, `cantidad`, `id_carrito`) VALUES
(28, 3, 3437, '2025-01-15', 1, 1),
(29, 4, 3437, '2025-01-15', 1, 1),
(30, 6, 3437, '2025-01-15', 1, 1),
(31, 5, 3437, '2025-01-15', 1, 1),
(32, 10, 3437, '2025-01-15', 5, 2),
(33, 3, 3437, '2025-01-15', 1999, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(20) NOT NULL,
  `Nombre_producto` varchar(255) NOT NULL,
  `Precio` decimal(10,2) NOT NULL,
  `descripcion_producto` text NOT NULL,
  `clase` varchar(255) NOT NULL,
  `id_mono` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `Nombre_producto`, `Precio`, `descripcion_producto`, `clase`, `id_mono`) VALUES
(3, 'Mono Dardo', 170.00, 'Lanza dardos a Bloons cercanos.', 'primario', 'dardo'),
(4, 'Mono Bumerán', 275.00, 'Lanza un bumerán en una direcion curva.', 'primario', 'bumeran'),
(5, 'Lanza Bombas', 445.00, 'Lanza una poderosa bomba a los Bloons.', 'primario', 'bomba'),
(6, 'Lanza Chinchetas', 240.00, 'Lanza chinchetas en 8 direcciones.', 'primario', 'tack'),
(7, 'Mono de Hielo', 450.00, 'Explota y congela globos cercanos.', 'primario', 'hielo'),
(8, 'Mono de Pegamento', 235.00, 'Dispara una bola de pegamento que ralentiza Bloons.', 'primario', 'pegamento'),
(9, 'Mono Francotirador', 300.00, 'Puede disparar a cualquier Bloon que este en pantalla con su rifle.', 'militar', 'sniper'),
(10, 'Mono Submarino', 275.00, 'Dispara torpedos teledirigidos a Bloons cercanos. Debe estar en el agua.', 'militar', 'submarino'),
(11, 'Mono Bucanero', 425.00, 'Dispara un dardo pesado a cada lado de su barco. Debe estar en el agua.', 'militar', 'bucanero'),
(12, 'Mono As', 680.00, 'Vuela por la pantalla disparando oleadas de dardos.', 'militar', 'avion'),
(13, 'Mono Mortero', 640.00, 'Lanza un proyectil explosivo a una zona del mapa.', 'militar', 'mortero'),
(14, 'Mono Gatling', 720.00, 'Usa una ametralladora de dardos.', 'militar', 'gatling'),
(15, 'Mono Brujo', 320.00, 'Lanza bolas de energía a los Bloons.', 'magia', 'brujo'),
(16, 'Super Mono', 2125.00, 'Lanza cientos de dardos a velocidades hipersónicas con un gran alcance. ', 'magia', 'super'),
(17, 'Mono Ninja', 425.00, 'Lanza shurikens a los Bloons cercanos. Puede alcanzar a Bloons camuflados.', 'magia', 'ninja'),
(18, 'Alquimista', 470.00, 'Mancha a los Bloons cercanos con acido. También puede mejorar a monos cercanos con sus pociones.', 'magia', 'alquimia'),
(19, 'Druida', 340.00, 'Crea una explosión de espinos en cada ataque.', 'magia', 'druida'),
(20, 'Granja de Bananas', 1060.00, 'Genera bananas cada ronda para convertirlas en dinero.', 'apoyo', 'granja'),
(21, 'Fábrica de chinchetas', 850.00, 'Genera chinchetas y las deja en el suelo cercano para pinchar los Bloons que pasen.', 'apoyo', 'fabrica'),
(22, 'Pueblo Mono', 1020.00, 'Centro de la sociedad Mono. Mejora a los monos cercanos.', 'apoyo', 'pueblo'),
(23, 'Mono Ingeniero', 380.00, 'Pone torretas y puede mejorar a aliados.', 'apoyo', 'ingeniero');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_user` int(20) NOT NULL,
  `Nombre_user` varchar(255) NOT NULL,
  `contrasena` text NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `genero` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `administrador` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_user`, `Nombre_user`, `contrasena`, `fecha_nacimiento`, `genero`, `email`, `administrador`) VALUES
(3436, 'Pablo', '$2y$10$DXI1LFnPkrQbzexBTC3zfOKP9FkaGM8/L9jFJLIc9FAbGrZujlFC.', '2002-04-30', 'hombre', 'pablo@gmail.com', 0),
(3437, 'root', '$2y$10$cpISCD9u4lIXK2HWB1sY/OeWrAM4ZGREvzaL8YYO/RAMQqjggWjlu', '2002-04-30', 'hombre', 'root@root.com', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_item_carrito`),
  ADD KEY `id_producto_carrito_fk` (`id_producto_carrito_fk`),
  ADD KEY `id_user_carrito_fk` (`id_user_carrito_fk`);

--
-- Indices de la tabla `compras`
--
ALTER TABLE `compras`
  ADD PRIMARY KEY (`id_compra`),
  ADD KEY `id_user_compra_fk` (`id_user_compra_fk`),
  ADD KEY `id_producto_compra_fk` (`id_producto_compra_fk`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD UNIQUE KEY `id_mono` (`id_mono`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id_item_carrito` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `compras`
--
ALTER TABLE `compras`
  MODIFY `id_compra` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_user` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3438;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`id_producto_carrito_fk`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`id_user_carrito_fk`) REFERENCES `usuarios` (`id_user`);

--
-- Filtros para la tabla `compras`
--
ALTER TABLE `compras`
  ADD CONSTRAINT `id_producto_compra_fk` FOREIGN KEY (`id_producto_compra_fk`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `id_user_compra_fk` FOREIGN KEY (`id_user_compra_fk`) REFERENCES `usuarios` (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
