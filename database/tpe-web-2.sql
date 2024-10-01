-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-09-2024 a las 17:30:58
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
-- Estructura de tabla para la tabla `libro`
--

CREATE TABLE `libro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `autor` varchar(60) NOT NULL,
  `editorial` varchar(60) DEFAULT NULL,
  `genero` varchar(60) NOT NULL,
  `stock` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `libro`
--

INSERT INTO `libro` (`id`, `nombre`, `autor`, `editorial`, `genero`, `stock`) VALUES
(1, 'Don Quijote de la Mancha', 'Miguel de Cervantes', 'Herrero Hermanos Saturnino Calleja', 'Parodia,Humor,Comedia', 15),
(2, 'La Regenta.', 'Leopoldo Arias Clarín', 'Alba Editorial', 'Ficcion', 10),
(3, 'La cartuja de Parma', 'Stendhal', NULL, 'Ficcion', 5),
(4, 'Drácula', 'Bram Stoker', 'Editorial Anto', 'Terror, Novela', 5),
(5, 'Cementerio de animales', 'Stephen King', 'Alfaguara', 'Terror', 3),
(6, 'Soy leyenda', 'Richard Matheson', 'Minotauro', 'Ciencia ficcion,Terror', 2),
(7, 'El misterio de Salems Lot', 'Stephen King', 'DEBOLS!LLO', 'Novela, Terror', 1),
(8, 'La conjura de los necios', 'John Kennedy Toole', 'Editorial Anagrama', ' Novela, Humor, Comedia', 0),
(9, '50 sombras de Luisi', 'Ángel Sanchidrián', 'Minotauro', 'Humor,Comedia', 3),
(10, 'El proyecto esposa', 'Graeme Simsion', 'SALAMANDRA', 'Novela rosa, Romance', 10),
(11, 'Días de perros', 'Gilles Legardinier', 'Editorial Planeta', ' Ficcion, Humor', 3),
(12, 'Guía del autoestopista galáctico', 'Robbie Stamp, Douglas Adams', 'Editorial Anagrama', ' Ciencia ficcion, Novela, Humor', 2),
(13, 'Esnob', 'Elísabet Benavent', 'SUMA', 'Novela rosa, Ficcion', 15),
(14, 'Forastera', 'Diana Gabaldon', 'SALAMANDRA BOLSILLO', 'Novela,Romance', 2),
(15, 'La Casa Neville 2. No quieras nada vil', 'Florencia Bonelli', NULL, 'Novela rosa, Ficcion', 2),
(16, 'Dune', 'Frank Herbert', 'LA FACTORÍA DE IDEAS', 'Novela, Ciencia ficcion', 3),
(17, 'Fahrenheit 451', 'Ray Bradbury', 'Minotauro', 'Novela, Ciencia ficcion', 2),
(18, 'El marciano', 'Andy Weir', 'B de Books (Ediciones B)', ' Ciencia ficcion, Novela', 1),
(19, 'Un mundo feliz', 'Aldous Huxley', NULL, 'Novela, Ciencia ficcion', 2),
(20, 'El eternauta', 'H.G.Oesterheld, Solano López', 'Planeta Cómic Argentina', 'Historieta, Novela grafica', 5),
(21, 'Asesinato en el Orient Express', 'Agatha Christie', 'Grupo Planeta - Argentina', 'Novela, Ficcion detectivesca, Misterio, Policial', 2),
(23, 'Holly (Edición en español)', 'Stephen King', 'PLAZA & JANÉS', 'Terror, Misterio, Suspenso', 2),
(24, 'El Psicoanalista', 'John Katzenbach', 'Penguin Random House Grupo Editorial España', 'Suspenso, Novela psicologica', 0),
(25, 'El visitante', 'Stephen King', 'DEBOLS!LLO', 'Novela, Terror', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `solicitud`
--

CREATE TABLE `solicitud` (
  `id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `estado` varchar(20) NOT NULL,
  `ID_libro` int(11) NOT NULL,
  `ID_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `solicitud`
--

INSERT INTO `solicitud` (`id`, `fecha`, `estado`, `ID_libro`, `ID_usuario`) VALUES
(1, '2024-09-09', 'aprobado', 1, 1),
(2, '2022-09-12', 'aprobado', 2, 2),
(3, '2024-09-18', 'desaprobado', 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `nombre` varchar(60) NOT NULL,
  `apellido` varchar(60) NOT NULL,
  `dni` int(11) NOT NULL,
  `telefono` int(11) NOT NULL,
  `email` varchar(60) NOT NULL,
  `estado` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `nombre`, `apellido`, `dni`, `telefono`, `email`, `estado`) VALUES
(1, 'Juan', 'Muñiz', 44764321, 596532, 'uni.juan@com', 'no deudor'),
(2, 'Valen', 'Perez', 32546315, 423567, 'valenqueteimporta@com', 'deudor'),
(3, 'pepe', 'pepon', 43865743, 543212, 'pepe.pepom@.com', 'no deudor');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `libro`
--
ALTER TABLE `libro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ID_libro` (`ID_libro`),
  ADD KEY `ID_usuario` (`ID_usuario`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `dni` (`dni`),
  ADD UNIQUE KEY `telefono` (`telefono`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `libro`
--
ALTER TABLE `libro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `solicitud`
--
ALTER TABLE `solicitud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `solicitud`
--
ALTER TABLE `solicitud`
  ADD CONSTRAINT `solicitud_ibfk_1` FOREIGN KEY (`ID_libro`) REFERENCES `libro` (`id`) ON UPDATE CASCADE,
  ADD CONSTRAINT `solicitud_ibfk_2` FOREIGN KEY (`ID_usuario`) REFERENCES `usuario` (`id`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
