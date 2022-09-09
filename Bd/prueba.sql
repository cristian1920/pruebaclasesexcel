-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-09-2022 a las 03:37:14
-- Versión del servidor: 10.4.22-MariaDB
-- Versión de PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
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
-- Estructura de tabla para la tabla `carros`
--

CREATE TABLE `carros` (
  `idcarro` int(11) NOT NULL,
  `IdReferencia` int(100) DEFAULT NULL,
  `NombreCarro` varchar(200) DEFAULT NULL,
  `PlantaProduce` varchar(200) DEFAULT NULL,
  `FechaEnsamble` date DEFAULT NULL,
  `Modelo` int(100) DEFAULT NULL,
  `CiudadAlmacen` varchar(100) DEFAULT NULL,
  `FechaIngreso` date DEFAULT NULL,
  `Estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carros`
--

INSERT INTO `carros` (`idcarro`, `IdReferencia`, `NombreCarro`, `PlantaProduce`, `FechaEnsamble`, `Modelo`, `CiudadAlmacen`, `FechaIngreso`, `Estado`) VALUES
(1, 1, 'twingo', 'brasil', '2022-05-21', 2022, 'medellin', '2022-05-21', 0),
(2, 2, 'clio2', 'brasil', '2022-02-21', 2022, 'bello', '2022-02-25', 1),
(3, 3, 'clio', 'brasil', '2022-05-14', 2022, 'bello', '2022-05-21', 1),
(4, 4, 'megane', 'uk', '2022-05-28', 2022, 'medellin', '2022-05-21', 1),
(5, 5, 'clio', 'brasil', '2022-05-21', 2022, 'medellin', '2022-05-21', 1),
(6, 6, 'twingo', 'brasil', '2022-05-28', 2022, 'bello', '2022-05-21', 1),
(7, 7, 'joy', 'medellin', '2022-05-28', 2022, 'bello', '2022-05-21', 1),
(8, 8, 'koleos', 'brasil', '2022-05-28', 2022, 'bello', '2022-05-21', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `Cedula` int(100) DEFAULT NULL,
  `NombreCliente` varchar(100) DEFAULT NULL,
  `ApellidoCliente` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`idCliente`, `Cedula`, `NombreCliente`, `ApellidoCliente`) VALUES
(1, 1020464, 'Cristian', 'Londoño'),
(2, 464889, 'Camilo', 'meneses');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reserva`
--

CREATE TABLE `reserva` (
  `idreserva` int(11) NOT NULL,
  `idcarro_reserva` int(11) NOT NULL,
  `idcliente_reserva` int(11) NOT NULL,
  `FechaReserva` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `reserva`
--

INSERT INTO `reserva` (`idreserva`, `idcarro_reserva`, `idcliente_reserva`, `FechaReserva`) VALUES
(1, 1, 1, '2022-05-22'),
(2, 2, 2, '2022-05-22'),
(3, 3, 1, '2022-05-22'),
(4, 4, 1, '2022-05-22'),
(5, 5, 1, '2022-05-22'),
(6, 6, 2, '2022-05-22'),
(7, 7, 2, '2022-05-22'),
(8, 8, 2, '2022-05-22'),
(9, 2, 1, '2022-05-24'),
(16, 2, 1, '2022-09-08'),
(17, 8, 2, '2022-09-08'),
(18, 7, 1, '2022-09-08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `idusuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `contraseña` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`idusuario`, `nombre`, `usuario`, `contraseña`) VALUES
(1, 'Cristian', 'Admin', 'admin');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carros`
--
ALTER TABLE `carros`
  ADD PRIMARY KEY (`idcarro`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`);

--
-- Indices de la tabla `reserva`
--
ALTER TABLE `reserva`
  ADD PRIMARY KEY (`idreserva`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idusuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carros`
--
ALTER TABLE `carros`
  MODIFY `idcarro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `reserva`
--
ALTER TABLE `reserva`
  MODIFY `idreserva` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idusuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
