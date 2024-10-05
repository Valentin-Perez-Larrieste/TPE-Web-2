-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 05-10-2024 a las 18:38:44
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
-- Base de datos: `tpe-web-2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `géneros`
--

CREATE TABLE `géneros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `géneros`
--

INSERT INTO `géneros` (`id`, `nombre`) VALUES
(4, 'Ciencia ficción'),
(5, 'Comedia'),
(6, 'Ficción'),
(7, 'Ficción detectivesca'),
(8, 'Historieta'),
(9, 'Humor'),
(10, 'Misterio'),
(11, 'Novela'),
(12, 'Novela gráfica'),
(13, 'Novela rosa'),
(14, 'Parodia'),
(15, 'Policial'),
(16, 'Romance'),
(17, 'Suspenso'),
(18, 'Terror'),
(19, 'Novela Psicológica');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `géneros`
--
ALTER TABLE `géneros`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `géneros`
--
ALTER TABLE `géneros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
