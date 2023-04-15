-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-04-2023 a las 22:26:12
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `web_service`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_table`
--

CREATE TABLE `productos_table` (
  `cod_producto` int(11) NOT NULL,
  `name_producto` varchar(50) NOT NULL,
  `category_producto` varchar(50) NOT NULL,
  `description_producto` varchar(255) DEFAULT NULL,
  `price_producto` decimal(10,2) NOT NULL,
  `status_producto` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_table`
--

INSERT INTO `productos_table` (`cod_producto`, `name_producto`, `category_producto`, `description_producto`, `price_producto`, `status_producto`) VALUES
(0, '', '', '', '0.00', 0),
(123, 'PC', 'Tecnologia', 'Acer  nitro 5 pc gamer', '2500000.00', 1),
(456, 'Smarphone', 'Tecnologia', 'lkjflskjdfdklsjñj', '9999.00', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `productos_table`
--
ALTER TABLE `productos_table`
  ADD PRIMARY KEY (`cod_producto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
