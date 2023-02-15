-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-02-2023 a las 04:48:07
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `plataforma`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivos`
--

CREATE TABLE `archivos` (
  `id_archivo` int(11) NOT NULL,
  `id_categoria` int(11) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `tipo` varchar(255) DEFAULT NULL,
  `ruta` text DEFAULT NULL,
  `fecha` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivos`
--

INSERT INTO `archivos` (`id_archivo`, `id_categoria`, `id_usuario`, `nombre`, `tipo`, `ruta`, `fecha`) VALUES
(6, 2, 1, 'Desfile.jpg', 'jpg', '../../archivos/1/Desfile.jpg', '2023-02-08 07:22:37'),
(8, 3, 1, 'abril.png', 'png', '../../archivos/1/abril.png', '2023-03-08 11:56:33'),
(9, 2, 1, 'junio.png', 'png', '../../archivos/1/junio.png', '2023-03-08 11:56:49'),
(10, 2, 1, 'marzo.jpg', 'jpg', '../../archivos/1/marzo.jpg', '2023-03-08 11:56:49'),
(11, 2, 1, 'octubre.jpg', 'jpg', '../../archivos/1/octubre.jpg', '2023-03-08 11:56:49'),
(17, 6, 6, 'zyro-image.png', 'png', '../../archivos/6/zyro-image.png', '2023-02-13 10:48:12'),
(18, 5, 2, 'Contraseña de cuenta imss.txt', 'txt', '../../archivos/2/Contraseña de cuenta imss.txt', '2023-02-14 09:08:01'),
(21, 5, 2, 'LOGO NUEVO.png', 'png', '../../archivos/2/LOGO NUEVO.png', '2023-02-14 09:18:53'),
(24, 7, 2, 'zyro-image.png', 'png', '../../archivos/2/zyro-image.png', '2023-02-14 11:00:05'),
(25, 5, 2, 'Día de la amistad.png', 'png', '../../archivos/2/Día de la amistad.png', '2023-02-14 11:05:39'),
(26, 7, 2, 'sistema biblioteca php.rar', 'rar', '../../archivos/2/sistema biblioteca php.rar', '2023-02-14 12:01:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id_categoria` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `fecha_insert` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id_categoria`, `id_usuario`, `nombre`, `fecha_insert`) VALUES
(2, 1, '3° C', '2023-02-07 09:03:43'),
(3, 1, 'Videos', '2023-02-08 09:52:35'),
(4, 1, 'Fotos', '2023-02-09 07:51:05'),
(5, 2, '3° B', '2023-02-11 16:17:11'),
(6, 6, 'Fotos', '2023-02-13 10:47:54'),
(7, 2, '3° C', '2023-02-14 10:57:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id_rol` int(11) NOT NULL,
  `rol` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id_rol`, `rol`) VALUES
(1, 'Maestro'),
(2, 'Secretario'),
(3, 'Bibliotecario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `foto` longblob DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `id_rol`, `nombre`, `email`, `password`, `foto`) VALUES
(1, 1, 'Rafael Irabien', 'rafa.irabien@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(2, 2, 'Rafael Criollo', 'rafa@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(5, 1, 'Rocky', 'rocky@gmail.com', '8cb2237d0679ca88db6464eac60da96345513964', NULL),
(6, 3, 'Karely', 'karely@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL),
(7, 2, 'Deku', 'deku@gmail.com', '40bd001563085fc35165329ea1ff5c5ecbdbbeef', NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD PRIMARY KEY (`id_archivo`),
  ADD KEY `fkArchivosCategorias_idx` (`id_categoria`),
  ADD KEY `fkArchivosUsuarios_idx` (`id_usuario`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id_categoria`),
  ADD KEY `fkCategoriaUsuario_idx` (`id_usuario`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `fkUsuariosRoles_idx` (`id_rol`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivos`
--
ALTER TABLE `archivos`
  MODIFY `id_archivo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id_categoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `archivos`
--
ALTER TABLE `archivos`
  ADD CONSTRAINT `fkArchivosCategorias` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id_categoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fkArchivosUsuarios` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD CONSTRAINT `fkCategoriaUsuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuarios` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
