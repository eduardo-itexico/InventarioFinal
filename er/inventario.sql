-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-03-2013 a las 14:01:45
-- Versión del servidor: 5.5.16
-- Versión de PHP: 5.3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `inventario_good`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE IF NOT EXISTS `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  `status` enum('0','1') DEFAULT '1',
  `category_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_categories_categories1_idx` (`category_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10 ;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `status`, `category_id`) VALUES
(1, 'base', '1', NULL),
(2, 'tuercas', '0', 1),
(3, 'tornillos', '0', 1),
(4, 'birlos', '0', 1),
(5, 'rondanas', '0', 1),
(6, 'herramienta', '0', 1),
(7, 'herramienta', '1', 1),
(8, 'jardin', '0', 1),
(9, 'podadoras', '0', 8);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `customers`
--

CREATE TABLE IF NOT EXISTS `customers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `direccion` varchar(45) DEFAULT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `rfc` varchar(45) DEFAULT NULL,
  `ciudad` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Volcado de datos para la tabla `customers`
--

INSERT INTO `customers` (`id`, `nombre`, `direccion`, `telefono`, `rfc`, `ciudad`) VALUES
(1, 'pepe', 'su casa', '1111', '11111', 'gdl'),
(2, 'Hector', 'la flor', '12 345 647', 'd2r2f34t53t', 'gdl'),
(3, 'Hector', 'su casa', '123 443 56', '1f3g46h75j', 'GDL'),
(4, 'pepito', 'ddddddddd', '1232134', 'dsfwef', 'dffsdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders`
--

CREATE TABLE IF NOT EXISTS `orders` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fecha` datetime DEFAULT NULL,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `suplier_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ordernes_proveedores1` (`suplier_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `price` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ordernes_has_products_products1` (`product_id`),
  KEY `fk_ordernes_has_products_ordernes1` (`order_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(45) DEFAULT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `category_id` int(11) NOT NULL,
  `precio` varchar(45) DEFAULT NULL,
  `imagen` mediumtext,
  `unity_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_products_categories` (`category_id`),
  KEY `fk_products_unidades1` (`unity_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `nombre`, `descripcion`, `category_id`, `precio`, `imagen`, `unity_id`) VALUES
(5, 'tcxn120', 'tornillo mastro triple', 9, '2.54', '', 3),
(6, 'tcxn130', 'hEXAGONAL 1/2 *3', 9, '10', '', 3),
(7, 'THEX412', 'ALLEN 1/2 *5', 9, '12.5', '', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sells`
--

CREATE TABLE IF NOT EXISTS `sells` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subtotal` decimal(10,2) DEFAULT NULL,
  `iva` decimal(10,2) DEFAULT NULL,
  `total` decimal(10,2) DEFAULT NULL,
  `customer_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` datetime DEFAULT NULL,
  `facturado` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_clientes1` (`customer_id`),
  KEY `fk_ventas_users1` (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=81 ;

--
-- Volcado de datos para la tabla `sells`
--

INSERT INTO `sells` (`id`, `subtotal`, `iva`, `total`, `customer_id`, `user_id`, `date`, `facturado`) VALUES
(1, 23.00, 23.00, 23.00, 1, 1, '2012-12-12 00:00:00', NULL),
(10, 1.00, 1.00, 1.00, 1, 1, '2013-02-04 18:02:14', 0),
(11, 1.00, 1.00, 1.00, 1, 1, '2013-02-04 18:02:14', 0),
(12, 249.54, 37.43, 286.97, 1, 1, '2013-02-04 18:02:15', 0),
(13, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 18:17:20', 0),
(14, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 18:40:13', 0),
(15, 249.54, 37.43, 286.97, 1, 1, '2013-02-04 18:49:13', 0),
(16, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 18:52:03', 0),
(17, 247.00, 37.05, 284.05, 1, 1, '2013-02-04 18:58:29', 0),
(18, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:07:22', 0),
(19, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:15:54', 0),
(20, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:17:36', 0),
(21, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:19:23', 0),
(22, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:22:22', 0),
(23, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:25:37', 0),
(24, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:26:56', 0),
(25, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:27:40', 0),
(26, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:31:50', 0),
(27, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:33:08', 0),
(28, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:36:00', 0),
(29, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:36:27', 0),
(30, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:37:20', 0),
(31, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:38:04', 0),
(32, 126.04, 18.91, 144.95, 1, 1, '2013-02-04 19:41:38', 0),
(33, 2.54, 0.38, 2.92, 1, 1, '2013-02-04 19:42:23', 0),
(34, 17.58, 2.64, 20.22, 1, 1, '2013-02-04 19:43:26', 0),
(35, 27.74, 4.16, 31.90, 1, 1, '2013-02-04 19:44:42', 0),
(36, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 19:46:35', 0),
(37, 15.04, 2.26, 17.30, 1, 1, '2013-02-04 19:55:03', 0),
(38, 2.54, 0.38, 2.92, 1, 1, '2013-02-04 19:55:28', 0),
(39, 12.50, 1.88, 14.38, 1, 1, '2013-02-04 19:55:53', 0),
(40, 12.50, 1.88, 14.38, 1, 1, '2013-02-04 20:12:46', 0),
(41, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 20:18:15', 0),
(42, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 20:19:15', 0),
(43, 7.62, 1.14, 8.76, 1, 1, '2013-02-04 20:26:49', 0),
(44, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 20:28:54', 0),
(45, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 20:33:05', 0),
(46, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 20:38:51', 0),
(47, 17.58, 2.64, 20.22, 1, 1, '2013-02-04 20:39:22', 0),
(48, 5.08, 0.76, 5.84, 1, 1, '2013-02-04 20:40:18', 0),
(49, 42.58, 6.39, 48.97, 1, 1, '2013-02-04 20:41:10', 0),
(50, 10.16, 1.52, 11.68, 1, 1, '2013-02-04 20:42:02', 0),
(51, 5.08, 0.81, 5.84, 1, 1, '2013-02-04 20:50:28', 0),
(52, 127.54, 20.41, 146.67, 1, 1, '2013-02-04 20:51:51', 0),
(55, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 12:21:12', 0),
(56, 12.54, 2.01, 14.55, 2, 1, '2013-03-03 12:23:35', 0),
(57, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 12:48:44', 0),
(58, 25.04, 4.01, 29.05, 1, 1, '2013-03-03 12:49:41', 0),
(59, 25.04, 4.01, 29.05, 1, 1, '2013-03-03 12:51:53', 0),
(60, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 12:54:49', 0),
(61, 25.04, 4.01, 29.05, 1, 1, '2013-03-03 12:56:14', 0),
(62, 25.04, 4.01, 29.05, 1, 1, '2013-03-03 12:57:18', 0),
(63, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:00:18', 0),
(64, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:01:34', 0),
(65, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:02:25', 0),
(66, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:03:18', 0),
(67, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:04:52', 0),
(68, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:05:57', 0),
(69, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:06:57', 0),
(70, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:07:54', 0),
(71, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:09:09', 0),
(72, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:09:54', 0),
(73, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:21:14', 0),
(74, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:22:20', 0),
(75, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:23:36', 0),
(76, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:23:48', 0),
(77, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:24:06', 0),
(78, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:26:15', 0),
(79, 25.04, 4.01, 29.05, 2, 1, '2013-03-03 13:26:30', 0),
(80, 250.40, 40.06, 290.46, 1, 1, '2013-03-03 13:28:17', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sells_products`
--

CREATE TABLE IF NOT EXISTS `sells_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sell_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio` decimal(10,2) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_has_products_products1` (`product_id`),
  KEY `fk_ventas_has_products_ventas1` (`sell_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=112 ;

--
-- Volcado de datos para la tabla `sells_products`
--

INSERT INTO `sells_products` (`id`, `sell_id`, `product_id`, `cantidad`, `precio`) VALUES
(22, 47, 5, 1.00, 2.54),
(23, 47, 6, 1.00, 2.54),
(24, 47, 7, 1.00, 12.50),
(25, 48, 5, 1.00, 2.54),
(26, 48, 6, 1.00, 2.54),
(27, 49, 5, 2.00, 2.54),
(28, 49, 7, 3.00, 12.50),
(29, 50, 5, 2.00, 2.54),
(30, 50, 6, 2.00, 2.54),
(31, 51, 5, 1.00, 2.54),
(32, 51, 6, 1.00, 2.54),
(33, 52, 5, 1.00, 2.54),
(34, 52, 7, 10.00, 12.50),
(35, 55, 5, 1.00, 2.54),
(36, 55, 6, 1.00, 10.00),
(37, 55, 7, 1.00, 12.50),
(38, 56, 5, 1.00, 2.54),
(39, 56, 6, 1.00, 10.00),
(40, 57, 5, 1.00, 2.54),
(41, 57, 6, 1.00, 10.00),
(42, 57, 7, 1.00, 12.50),
(43, 58, 5, 1.00, 2.54),
(44, 58, 6, 1.00, 10.00),
(45, 58, 7, 1.00, 12.50),
(46, 59, 5, 1.00, 2.54),
(47, 59, 6, 1.00, 10.00),
(48, 59, 7, 1.00, 12.50),
(49, 60, 5, 1.00, 2.54),
(50, 60, 6, 1.00, 10.00),
(51, 60, 7, 1.00, 12.50),
(52, 61, 5, 1.00, 2.54),
(53, 61, 6, 1.00, 10.00),
(54, 61, 7, 1.00, 12.50),
(55, 62, 5, 1.00, 2.54),
(56, 62, 6, 1.00, 10.00),
(57, 62, 7, 1.00, 12.50),
(58, 63, 5, 1.00, 2.54),
(59, 63, 6, 1.00, 10.00),
(60, 63, 7, 1.00, 12.50),
(61, 64, 5, 1.00, 2.54),
(62, 64, 6, 1.00, 10.00),
(63, 64, 7, 1.00, 12.50),
(64, 65, 5, 1.00, 2.54),
(65, 65, 6, 1.00, 10.00),
(66, 65, 7, 1.00, 12.50),
(67, 66, 5, 1.00, 2.54),
(68, 66, 6, 1.00, 10.00),
(69, 66, 7, 1.00, 12.50),
(70, 67, 5, 1.00, 2.54),
(71, 67, 6, 1.00, 10.00),
(72, 67, 7, 1.00, 12.50),
(73, 68, 5, 1.00, 2.54),
(74, 68, 6, 1.00, 10.00),
(75, 68, 7, 1.00, 12.50),
(76, 69, 5, 1.00, 2.54),
(77, 69, 6, 1.00, 10.00),
(78, 69, 7, 1.00, 12.50),
(79, 70, 5, 1.00, 2.54),
(80, 70, 6, 1.00, 10.00),
(81, 70, 7, 1.00, 12.50),
(82, 71, 5, 1.00, 2.54),
(83, 71, 6, 1.00, 10.00),
(84, 71, 7, 1.00, 12.50),
(85, 72, 5, 1.00, 2.54),
(86, 72, 6, 1.00, 10.00),
(87, 72, 7, 1.00, 12.50),
(88, 73, 5, 1.00, 2.54),
(89, 73, 6, 1.00, 10.00),
(90, 73, 7, 1.00, 12.50),
(91, 74, 5, 1.00, 2.54),
(92, 74, 6, 1.00, 10.00),
(93, 74, 7, 1.00, 12.50),
(94, 75, 5, 1.00, 2.54),
(95, 75, 6, 1.00, 10.00),
(96, 75, 7, 1.00, 12.50),
(97, 76, 5, 1.00, 2.54),
(98, 76, 6, 1.00, 10.00),
(99, 76, 7, 1.00, 12.50),
(100, 77, 5, 1.00, 2.54),
(101, 77, 6, 1.00, 10.00),
(102, 77, 7, 1.00, 12.50),
(103, 78, 5, 1.00, 2.54),
(104, 78, 6, 1.00, 10.00),
(105, 78, 7, 1.00, 12.50),
(106, 79, 5, 1.00, 2.54),
(107, 79, 6, 1.00, 10.00),
(108, 79, 7, 1.00, 12.50),
(109, 80, 5, 10.00, 2.54),
(110, 80, 6, 10.00, 10.00),
(111, 80, 7, 10.00, 12.50);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `stocks`
--

CREATE TABLE IF NOT EXISTS `stocks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `minimo` decimal(10,2) DEFAULT NULL,
  `maximo` decimal(10,2) DEFAULT NULL,
  `actual` decimal(10,2) DEFAULT NULL,
  `product_id` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_stocks_products1` (`product_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `stocks`
--

INSERT INTO `stocks` (`id`, `minimo`, `maximo`, `actual`, `product_id`) VALUES
(1, 10.00, 100.00, 38.00, 5),
(2, 10.00, 100.00, 37.00, 6),
(3, 10.00, 100.00, 36.00, 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supliers`
--

CREATE TABLE IF NOT EXISTS `supliers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` mediumtext,
  `direccion` text,
  `telefono` varchar(200) DEFAULT NULL,
  `rfc` varchar(100) DEFAULT NULL,
  `ciudad` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unities`
--

CREATE TABLE IF NOT EXISTS `unities` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `unities`
--

INSERT INTO `unities` (`id`, `name`) VALUES
(1, 'pz'),
(2, 'rollo'),
(3, 'litros');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(45) NOT NULL,
  `pass` varchar(45) NOT NULL,
  `nombre` varchar(200) DEFAULT NULL,
  `status` enum('0','1') DEFAULT NULL,
  `email` mediumtext,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `pass`, `nombre`, `status`, `email`) VALUES
(1, 'tomas', 'abc123', 'tomas anderson', NULL, NULL),
(2, 'pedro', 'abc123', 'pedro enrique', NULL, 'pedro@pedro.com'),
(3, 'geringa', 'abc123', 'gerardo', NULL, 'gegeeg@geeg.com');

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `categories`
--
ALTER TABLE `categories`
  ADD CONSTRAINT `fk_categories_categories1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `fk_ordernes_proveedores1` FOREIGN KEY (`suplier_id`) REFERENCES `supliers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `orders_products`
--
ALTER TABLE `orders_products`
  ADD CONSTRAINT `fk_ordernes_has_products_ordernes1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ordernes_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `fk_products_categories` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_products_unidades1` FOREIGN KEY (`unity_id`) REFERENCES `unities` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sells`
--
ALTER TABLE `sells`
  ADD CONSTRAINT `fk_ventas_clientes1` FOREIGN KEY (`customer_id`) REFERENCES `customers` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_users1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `sells_products`
--
ALTER TABLE `sells_products`
  ADD CONSTRAINT `fk_ventas_has_products_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ventas_has_products_ventas1` FOREIGN KEY (`sell_id`) REFERENCES `sells` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `stocks`
--
ALTER TABLE `stocks`
  ADD CONSTRAINT `fk_stocks_products1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
