-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-10-2024 a las 20:07:39
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `albumes`
--

CREATE TABLE `albumes` (
  `album_id` int(11) NOT NULL,
  `album_foto` varchar(255) DEFAULT NULL,
  `album_nombre` varchar(255) NOT NULL,
  `album_precio` decimal(10,2) NOT NULL,
  `id_artista` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `albumes`
--

INSERT INTO `albumes` (`album_id`, `album_foto`, `album_nombre`, `album_precio`, `id_artista`) VALUES
(1, 'Bleach_92.jpg', 'Bleach', 79579.00, 1),
(2, '2.png', '2', 66991.00, 2),
(4, 'Ay_Ay_Ay_9.jpg', 'Ay Ay Ay', 9581.00, 5),
(5, 'Sehnsucht_70.jpg', 'Sehnsucht', 80100.00, 4),
(7, 'Made_in_Germany_(1995_2011)_84.jpg', 'Made in Germany (1995-2011)', 54400.00, 4),
(8, 'Another_One_67.jpg', 'Another One', 54081.00, 2),
(9, 'Incesticide_21.jpg', 'Incesticide', 46000.00, 1),
(10, 'PelusÃ³n_of_milk_28.jpg', 'PelusÃ³n of milk', 50000.00, 7),
(13, 'Utopia_1.jpg', 'Utopia', 65000.00, 9),
(14, 'Tell_All_Your_Friend_69.jpg', 'Tell All Your Friend', 40000.00, 15),
(15, 'Clics_Modernos_22.jpg', 'Clics Modernos', 51000.00, 13),
(16, 'The_Man_Who_Sold_The_Wld_51.jpg', 'The Man Who Sold The Wld', 70000.00, 8),
(17, 'Cowboys_From_Hell_84.jpg', 'Cowboys From Hell', 63000.00, 17),
(18, 'VidaVida_10.jpg', 'Vida\r\n', 38000.00, 14),
(19, 'Piano_Bar_75.jpg', 'Piano Bar', 60000.00, 13),
(20, 'The_Queen_Is_Dead_12.png', 'The Queen Is Dead', 75000.00, 18),
(21, 'MTV_Unplugged_in_New_Yk_42.jpg', 'MTV Unplugged in New Yk', 90000.00, 1),
(22, 'Hunky_Dy_69.jpg', 'Hunky Dy', 50000.00, 8),
(23, 'Nevermind_90.jpg', 'Nevermind', 80000.00, 1),
(24, 'This_Old_Dog_15.jpg', 'This Old Dog', 64000.00, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `artistas`
--

CREATE TABLE `artistas` (
  `artista_id` int(11) NOT NULL,
  `artista_nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `artistas`
--

INSERT INTO `artistas` (`artista_id`, `artista_nombre`) VALUES
(1, 'Nirvana'),
(2, 'Mac Demarco'),
(3, 'Estelares'),
(4, 'Rammstein'),
(5, 'Los Piojos'),
(6, 'Almendra'),
(7, 'Luis Alberto Spinetta'),
(8, 'David Bowie'),
(9, 'Travis Scott'),
(11, 'Ozzy Osbourne'),
(12, 'TV Girl'),
(13, 'Charly GarcÃ­a'),
(14, 'Canserbero'),
(15, 'Okey Dokey'),
(16, 'Iron Maiden'),
(17, 'Pantera'),
(18, 'The Smiths'),
(20, 'King Crimson'),
(21, 'Frank Sinatra'),
(22, 'Lisa Ono'),
(24, 'Tom Jobim'),
(25, 'Kanye West');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `canciones`
--

CREATE TABLE `canciones` (
  `cancion_id` int(11) NOT NULL,
  `cancion_nombre` varchar(255) NOT NULL,
  `cancion_duracion` time DEFAULT NULL,
  `genero` varchar(100) DEFAULT NULL,
  `album_id` int(11) DEFAULT NULL,
  `artista_id` int(11) DEFAULT NULL,
  `artista_colab` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `generos`
--

CREATE TABLE `generos` (
  `genero_id` int(10) NOT NULL,
  `genero_nombre` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `generos`
--

INSERT INTO `generos` (`genero_id`, `genero_nombre`) VALUES
(1, 'Grunge'),
(2, 'Rock alternativo'),
(3, 'Jazz'),
(4, 'Bossa nova'),
(5, 'Metal'),
(6, 'Pop'),
(7, 'Jizz jazz'),
(8, 'Samba'),
(9, 'Hip Hop'),
(10, 'Punk'),
(11, 'Trap');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `rol_id` int(11) NOT NULL,
  `rol_rol` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `usuario_id` int(11) NOT NULL,
  `usuario_email` text NOT NULL,
  `usuario_username` text NOT NULL,
  `usuario_clave` text NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD PRIMARY KEY (`album_id`),
  ADD KEY `id_artista` (`id_artista`);

--
-- Indices de la tabla `artistas`
--
ALTER TABLE `artistas`
  ADD PRIMARY KEY (`artista_id`);

--
-- Indices de la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD PRIMARY KEY (`cancion_id`),
  ADD KEY `album_id` (`album_id`),
  ADD KEY `artista_id` (`artista_id`),
  ADD KEY `artista_colab` (`artista_colab`);

--
-- Indices de la tabla `generos`
--
ALTER TABLE `generos`
  ADD PRIMARY KEY (`genero_id`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`rol_id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `albumes`
--
ALTER TABLE `albumes`
  MODIFY `album_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `artistas`
--
ALTER TABLE `artistas`
  MODIFY `artista_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `canciones`
--
ALTER TABLE `canciones`
  MODIFY `cancion_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `generos`
--
ALTER TABLE `generos`
  MODIFY `genero_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `rol_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `usuario_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `albumes`
--
ALTER TABLE `albumes`
  ADD CONSTRAINT `albumes_ibfk_1` FOREIGN KEY (`id_artista`) REFERENCES `artistas` (`artista_id`);

--
-- Filtros para la tabla `canciones`
--
ALTER TABLE `canciones`
  ADD CONSTRAINT `canciones_ibfk_1` FOREIGN KEY (`album_id`) REFERENCES `albumes` (`album_id`),
  ADD CONSTRAINT `canciones_ibfk_2` FOREIGN KEY (`artista_id`) REFERENCES `artistas` (`artista_id`),
  ADD CONSTRAINT `canciones_ibfk_3` FOREIGN KEY (`artista_colab`) REFERENCES `artistas` (`artista_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
