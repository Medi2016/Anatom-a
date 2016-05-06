-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-05-2016 a las 17:37:51
-- Versión del servidor: 10.1.10-MariaDB
-- Versión de PHP: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prueba`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulo`
--

CREATE TABLE `articulo` (
  `Id` int(11) NOT NULL,
  `NombreArticulo` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Lugar` varchar(50) CHARACTER SET latin1 DEFAULT NULL,
  `Categoria` varchar(50) CHARACTER SET latin1 DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `articulo`
--

INSERT INTO `articulo` (`Id`, `NombreArticulo`, `Lugar`, `Categoria`) VALUES
(1, 'Calota', 'General', 'Huesos'),
(2, 'Calota', 'General', 'Huesos'),
(3, 'Cráneo', 'General', 'Huesos'),
(4, 'Mandíbula', 'General', 'Huesos'),
(5, 'Vértebras', 'General', 'Huesos'),
(6, 'Atlas', 'General', 'Huesos'),
(7, 'Axis', 'General', 'Huesos'),
(8, 'Cervical', 'General', 'Huesos'),
(9, 'Dorsal', 'General', 'Huesos'),
(10, 'Lumbar', 'General', 'Huesos'),
(11, 'Coxis', 'General', 'Huesos'),
(12, 'Costillas', 'General', 'Huesos'),
(13, 'Omoplato', 'General', 'Huesos'),
(14, 'Clavícula', 'General', 'Huesos'),
(15, 'Húmero', 'General', 'Huesos'),
(16, 'Radio', 'General', 'Huesos'),
(17, 'Ulna', 'General', 'Huesos'),
(18, 'Mano', 'General', 'Huesos'),
(19, 'Pélvis', 'General', 'Huesos'),
(20, 'Coxal', 'General', 'Huesos'),
(21, 'Fémur', 'General', 'Huesos'),
(22, 'Tibia', 'General', 'Huesos'),
(23, 'Fíbula', 'General', 'Huesos'),
(24, 'Pie', 'General', 'Huesos'),
(25, 'Parrilla Costal', 'General', 'Huesos'),
(26, 'Cerebro', 'General', 'Órganos'),
(27, 'Hemi-cerebro', 'General', 'Órganos'),
(28, 'Tráquea', 'General', 'Órganos'),
(29, 'Lengua', 'General', 'Órganos'),
(30, 'Esófago', 'General', 'Órganos'),
(31, 'Pulmón derecho', 'General', 'Órganos'),
(32, 'Pulmón Izquierdo', 'General', 'Órganos'),
(33, 'Corazón abierto', 'General', 'Órganos'),
(34, 'Corazón cerrado', 'General', 'Órganos'),
(35, 'Riñones', 'General', 'Órganos'),
(36, 'Bazo', 'General', 'Órganos'),
(37, 'Estómago', 'General', 'Órganos'),
(38, 'Páncreas', 'General', 'Órganos'),
(39, 'Hígado', 'General', 'Órganos'),
(40, 'Útero', 'General', 'Órganos'),
(41, 'Intestinos', 'General', 'Órganos'),
(42, 'Pene', 'General', 'Órganos'),
(43, 'Testículos', 'General', 'Órganos'),
(44, 'Placenta', 'General', 'Órganos'),
(45, 'Fetos', 'General', 'Órganos'),
(46, 'Cuerpo', 'Biociencias', 'Cuerpos'),
(47, 'Cuerpo', 'Medicina', 'Cuerpos'),
(48, 'Corazón', 'General', 'Maquetas'),
(49, 'Cerebro', 'General', 'Maquetas'),
(50, 'Riñones', 'General', 'Maquetas'),
(51, 'Microscopio', 'General', 'Lab-Histología'),
(52, 'Caja-láminas', 'General', 'Lab-Histología');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `curso`
--

CREATE TABLE `curso` (
  `Sigla` varchar(50) NOT NULL,
  `NombreCurso` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `curso`
--

INSERT INTO `curso` (`Sigla`, `NombreCurso`) VALUES
('MED-0411', 'Histología para Medicina'),
('MED-0412', 'Anatomía descriptiva'),
('MED-0421', 'Embriología para medicina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estudiante`
--

CREATE TABLE `estudiante` (
  `Carnet` varchar(50) NOT NULL,
  `Rol` varchar(50) DEFAULT 'Estudiante',
  `Contrasena` varchar(50) DEFAULT NULL,
  `NombreEstudiante` varchar(50) DEFAULT NULL,
  `Correo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `estudiante`
--

INSERT INTO `estudiante` (`Carnet`, `Rol`, `Contrasena`, `NombreEstudiante`, `Correo`) VALUES
('admin', 'Moderador', 'admin', 'admin', 'escuelamedicinaucr@gmail.com'),
('medi', 'Estudiante', 'medi', 'medi', 'escuelamedicinaucr@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo`
--

CREATE TABLE `prestamo` (
  `Id` int(11) NOT NULL,
  `Fecha` date NOT NULL,
  `Hora` time NOT NULL,
  `Entrega` varchar(50) NOT NULL,
  `EstudianteIdFK` varchar(50) NOT NULL,
  `CursoIdFK` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo`
--

INSERT INTO `prestamo` (`Id`, `Fecha`, `Hora`, `Entrega`, `EstudianteIdFK`, `CursoIdFK`) VALUES
(11, '2016-04-27', '02:25:26', 'Alejandro', 'medi', 'MED-0411'),
(12, '2016-05-03', '09:32:36', 'Alejandro', 'medi', 'MED-0411');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestamo_articulo`
--

CREATE TABLE `prestamo_articulo` (
  `PrestamoIdFK` int(11) NOT NULL,
  `ArticuloIdFK` int(11) NOT NULL,
  `Recibe` varchar(50) NOT NULL,
  `Cantidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestamo_articulo`
--

INSERT INTO `prestamo_articulo` (`PrestamoIdFK`, `ArticuloIdFK`, `Recibe`, `Cantidad`) VALUES
(11, 2, 'Ninguno', 1),
(11, 18, 'Ninguno', 2),
(12, 43, 'Ninguno', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `articulo`
--
ALTER TABLE `articulo`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`Sigla`);

--
-- Indices de la tabla `estudiante`
--
ALTER TABLE `estudiante`
  ADD PRIMARY KEY (`Carnet`);

--
-- Indices de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `EstudianteId_prestamo_fk` (`EstudianteIdFK`),
  ADD KEY `CursoId_prestamo_fk` (`CursoIdFK`);

--
-- Indices de la tabla `prestamo_articulo`
--
ALTER TABLE `prestamo_articulo`
  ADD PRIMARY KEY (`PrestamoIdFK`,`ArticuloIdFK`),
  ADD KEY `articuloId_prestamo_fk` (`ArticuloIdFK`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `articulo`
--
ALTER TABLE `articulo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;
--
-- AUTO_INCREMENT de la tabla `prestamo`
--
ALTER TABLE `prestamo`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `prestamo`
--
ALTER TABLE `prestamo`
  ADD CONSTRAINT `CursoId_prestamo_fk` FOREIGN KEY (`CursoIdFK`) REFERENCES `curso` (`Sigla`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `EstudianteId_prestamo_fk` FOREIGN KEY (`EstudianteIdFK`) REFERENCES `estudiante` (`Carnet`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `prestamo_articulo`
--
ALTER TABLE `prestamo_articulo`
  ADD CONSTRAINT `articuloId_prestamo_fk` FOREIGN KEY (`ArticuloIdFK`) REFERENCES `articulo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `prestamoId_prestamo_fk` FOREIGN KEY (`PrestamoIdFK`) REFERENCES `prestamo` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
