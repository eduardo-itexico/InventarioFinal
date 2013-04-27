-- phpMyAdmin SQL Dump
-- version 3.4.5
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 27-04-2013 a las 16:32:43
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=40 ;

--
-- Volcado de datos para la tabla `orders`
--

INSERT INTO `orders` (`id`, `fecha`, `subtotal`, `iva`, `total`, `suplier_id`) VALUES
(2, NULL, 12.54, 2.01, 14.55, 1),
(3, NULL, 25.04, 4.01, 29.05, 1),
(4, NULL, 12.54, 2.01, 14.55, 1),
(5, NULL, 12.54, 2.01, 14.55, 1),
(6, NULL, 12.54, 2.01, 14.55, 1),
(7, NULL, 12.54, 2.01, 14.55, 1),
(8, NULL, 12.54, 2.01, 14.55, 1),
(9, NULL, 12.54, 2.01, 14.55, 1),
(10, NULL, 12.54, 2.01, 14.55, 1),
(11, NULL, 12.54, 2.01, 14.55, 1),
(12, NULL, 12.54, 2.01, 14.55, 1),
(13, NULL, 12.54, 2.01, 14.55, 1),
(14, NULL, 12.54, 2.01, 14.55, 1),
(15, NULL, 12.54, 2.01, 14.55, 1),
(16, NULL, 25.04, 4.01, 29.05, 1),
(17, NULL, 276.50, 44.24, 320.74, 1),
(18, NULL, 276.50, 44.24, 320.74, 1),
(19, NULL, 25.04, 4.01, 29.05, 1),
(20, NULL, 12.54, 2.01, 14.55, 1),
(21, NULL, 12.54, 2.01, 14.55, 1),
(22, NULL, 12.54, 2.01, 14.55, 1),
(23, NULL, 12.54, 2.01, 14.55, 1),
(24, NULL, 12.54, 2.01, 14.55, 1),
(27, '2013-04-11 00:00:00', 12.54, 2.01, 14.55, 1),
(28, '2013-04-05 00:00:00', 3250.00, 520.00, 3770.00, 1),
(29, '2013-04-12 00:00:00', 12.54, 2.01, 14.55, 1),
(30, '2013-04-12 00:00:00', 2.54, 0.41, 2.95, 1),
(31, '2013-04-12 00:00:00', 2.54, 0.41, 2.95, 1),
(32, '2013-04-12 00:00:00', 2.54, 0.41, 2.95, 1),
(33, '2013-04-11 00:00:00', 2.54, 0.41, 2.95, 1),
(34, '2013-04-25 00:00:00', 2.54, 0.41, 2.95, 1),
(35, '2013-04-26 00:00:00', 25.04, 4.01, 29.05, 1),
(36, '2013-04-17 00:00:00', 25.04, 4.01, 29.05, 1),
(37, '2013-04-17 00:00:00', 35.08, 5.61, 40.69, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orders_products`
--

CREATE TABLE IF NOT EXISTS `orders_products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `cantidad` decimal(10,2) DEFAULT NULL,
  `precio` varchar(45) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ordernes_has_products_products1` (`product_id`),
  KEY `fk_ordernes_has_products_ordernes1` (`order_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=72 ;

--
-- Volcado de datos para la tabla `orders_products`
--

INSERT INTO `orders_products` (`id`, `order_id`, `product_id`, `cantidad`, `precio`) VALUES
(1, 15, 5, 1.00, '2.54'),
(2, 15, 6, 1.00, '10'),
(4, 16, 5, 1.00, '2.54'),
(5, 16, 6, 1.00, '10'),
(6, 16, 7, 1.00, '12.5'),
(8, 17, 5, 100.00, '2.54'),
(9, 17, 6, 1.00, '10'),
(10, 17, 7, 1.00, '12.5'),
(12, 18, 5, 100.00, '2.54'),
(13, 18, 6, 1.00, '10'),
(14, 18, 7, 1.00, '12.5'),
(15, 19, 5, 1.00, '2.54'),
(16, 19, 6, 1.00, '10'),
(17, 19, 7, 1.00, '12.5'),
(19, 20, 5, 1.00, '2.54'),
(20, 20, 6, 1.00, '10'),
(22, 21, 5, 1.00, '2.54'),
(23, 21, 6, 1.00, '10'),
(24, 22, 5, 1.00, '2.54'),
(25, 22, 6, 1.00, '10'),
(27, 23, 5, 1.00, '2.54'),
(28, 23, 6, 1.00, '10'),
(29, 23, 5, 1.00, '2.54'),
(30, 23, 6, 1.00, '10'),
(31, 24, 5, 1.00, '2.54'),
(32, 24, 6, 1.00, '10'),
(33, 24, 5, 1.00, '2.54'),
(34, 24, 6, 1.00, '10'),
(39, 27, 5, 1.00, '2.54'),
(40, 27, 6, 1.00, '10'),
(41, 27, 5, 1.00, '2.54'),
(42, 27, 6, 1.00, '10'),
(43, 28, 6, 200.00, '10'),
(44, 28, 7, 100.00, '12.5'),
(45, 28, 6, 200.00, '10'),
(46, 28, 7, 100.00, '12.5'),
(47, 29, 5, 1.00, '2.54'),
(48, 29, 6, 1.00, '10'),
(49, 29, 5, 1.00, '2.54'),
(50, 29, 6, 1.00, '10'),
(51, 30, 5, 1.00, '2.54'),
(52, 30, 5, 1.00, '2.54'),
(53, 31, 5, 1.00, '2.54'),
(54, 31, 5, 1.00, '2.54'),
(55, 32, 5, 1.00, '2.54'),
(56, 32, 5, 1.00, '2.54'),
(57, 33, 5, 1.00, '2.54'),
(58, 34, 5, 1.00, '2.54'),
(59, 35, 5, 1.00, '2.54'),
(60, 35, 6, 1.00, '10'),
(61, 35, 7, 1.00, '12.5'),
(62, 36, 5, 1.00, '2.54'),
(63, 36, 6, 1.00, '10'),
(64, 36, 7, 1.00, '12.5'),
(65, 37, 5, 2.00, '2.54'),
(66, 37, 6, 3.00, '10');

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=90 ;

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
(80, 250.40, 40.06, 290.46, 1, 1, '2013-03-03 13:28:17', 0),
(81, 27.58, 4.41, 31.99, 2, 1, '2013-03-30 16:19:44', 0),
(82, 25.04, 4.01, 29.05, 1, 1, '2013-03-30 16:21:09', 0),
(83, 22.50, 3.60, 26.10, 2, 1, '2013-03-30 16:22:12', 0),
(84, 22.50, 3.60, 26.10, 3, 1, '2013-03-30 16:34:00', 0),
(85, 22.50, 3.60, 26.10, 3, 1, '2013-03-30 16:53:27', 0),
(86, 225.00, 36.00, 261.00, 3, 1, '2013-03-30 16:54:06', 0),
(87, 22.50, 3.60, 26.10, 1, 1, '2013-03-30 17:54:46', 0),
(88, 22.50, 3.60, 26.10, 4, 1, '2013-03-30 17:57:05', 0),
(89, 207.50, 33.20, 240.70, 3, 1, '2013-03-30 17:58:00', 0);

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
  `descuento` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `fk_ventas_has_products_products1` (`product_id`),
  KEY `fk_ventas_has_products_ventas1` (`sell_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Volcado de datos para la tabla `sells_products`
--

INSERT INTO `sells_products` (`id`, `sell_id`, `product_id`, `cantidad`, `precio`, `descuento`) VALUES
(22, 47, 5, 1.00, 2.54, 0),
(23, 47, 6, 1.00, 2.54, 0),
(24, 47, 7, 1.00, 12.50, 0),
(25, 48, 5, 1.00, 2.54, 0),
(26, 48, 6, 1.00, 2.54, 0),
(27, 49, 5, 2.00, 2.54, 0),
(28, 49, 7, 3.00, 12.50, 0),
(29, 50, 5, 2.00, 2.54, 0),
(30, 50, 6, 2.00, 2.54, 0),
(31, 51, 5, 1.00, 2.54, 0),
(32, 51, 6, 1.00, 2.54, 0),
(33, 52, 5, 1.00, 2.54, 0),
(34, 52, 7, 10.00, 12.50, 0),
(35, 55, 5, 1.00, 2.54, 0),
(36, 55, 6, 1.00, 10.00, 0),
(37, 55, 7, 1.00, 12.50, 0),
(38, 56, 5, 1.00, 2.54, 0),
(39, 56, 6, 1.00, 10.00, 0),
(40, 57, 5, 1.00, 2.54, 0),
(41, 57, 6, 1.00, 10.00, 0),
(42, 57, 7, 1.00, 12.50, 0),
(43, 58, 5, 1.00, 2.54, 0),
(44, 58, 6, 1.00, 10.00, 0),
(45, 58, 7, 1.00, 12.50, 0),
(46, 59, 5, 1.00, 2.54, 0),
(47, 59, 6, 1.00, 10.00, 0),
(48, 59, 7, 1.00, 12.50, 0),
(49, 60, 5, 1.00, 2.54, 0),
(50, 60, 6, 1.00, 10.00, 0),
(51, 60, 7, 1.00, 12.50, 0),
(52, 61, 5, 1.00, 2.54, 0),
(53, 61, 6, 1.00, 10.00, 0),
(54, 61, 7, 1.00, 12.50, 0),
(55, 62, 5, 1.00, 2.54, 0),
(56, 62, 6, 1.00, 10.00, 0),
(57, 62, 7, 1.00, 12.50, 0),
(58, 63, 5, 1.00, 2.54, 0),
(59, 63, 6, 1.00, 10.00, 0),
(60, 63, 7, 1.00, 12.50, 0),
(61, 64, 5, 1.00, 2.54, 0),
(62, 64, 6, 1.00, 10.00, 0),
(63, 64, 7, 1.00, 12.50, 0),
(64, 65, 5, 1.00, 2.54, 0),
(65, 65, 6, 1.00, 10.00, 0),
(66, 65, 7, 1.00, 12.50, 0),
(67, 66, 5, 1.00, 2.54, 0),
(68, 66, 6, 1.00, 10.00, 0),
(69, 66, 7, 1.00, 12.50, 0),
(70, 67, 5, 1.00, 2.54, 0),
(71, 67, 6, 1.00, 10.00, 0),
(72, 67, 7, 1.00, 12.50, 0),
(73, 68, 5, 1.00, 2.54, 0),
(74, 68, 6, 1.00, 10.00, 0),
(75, 68, 7, 1.00, 12.50, 0),
(76, 69, 5, 1.00, 2.54, 0),
(77, 69, 6, 1.00, 10.00, 0),
(78, 69, 7, 1.00, 12.50, 0),
(79, 70, 5, 1.00, 2.54, 0),
(80, 70, 6, 1.00, 10.00, 0),
(81, 70, 7, 1.00, 12.50, 0),
(82, 71, 5, 1.00, 2.54, 0),
(83, 71, 6, 1.00, 10.00, 0),
(84, 71, 7, 1.00, 12.50, 0),
(85, 72, 5, 1.00, 2.54, 0),
(86, 72, 6, 1.00, 10.00, 0),
(87, 72, 7, 1.00, 12.50, 0),
(88, 73, 5, 1.00, 2.54, 0),
(89, 73, 6, 1.00, 10.00, 0),
(90, 73, 7, 1.00, 12.50, 0),
(91, 74, 5, 1.00, 2.54, 0),
(92, 74, 6, 1.00, 10.00, 0),
(93, 74, 7, 1.00, 12.50, 0),
(94, 75, 5, 1.00, 2.54, 0),
(95, 75, 6, 1.00, 10.00, 0),
(96, 75, 7, 1.00, 12.50, 0),
(97, 76, 5, 1.00, 2.54, 0),
(98, 76, 6, 1.00, 10.00, 0),
(99, 76, 7, 1.00, 12.50, 0),
(100, 77, 5, 1.00, 2.54, 0),
(101, 77, 6, 1.00, 10.00, 0),
(102, 77, 7, 1.00, 12.50, 0),
(103, 78, 5, 1.00, 2.54, 0),
(104, 78, 6, 1.00, 10.00, 0),
(105, 78, 7, 1.00, 12.50, 0),
(106, 79, 5, 1.00, 2.54, 0),
(107, 79, 6, 1.00, 10.00, 0),
(108, 79, 7, 1.00, 12.50, 0),
(109, 80, 5, 10.00, 2.54, 0),
(110, 80, 6, 10.00, 10.00, 0),
(111, 80, 7, 10.00, 12.50, 0),
(112, 81, 5, 1.00, 10.00, 0),
(113, 81, 7, 1.00, 12.50, 0),
(114, 82, 5, 1.00, 10.00, 0),
(115, 82, 7, 1.00, 12.50, 0),
(116, 83, 5, 1.00, 10.00, 0),
(117, 83, 7, 1.00, 12.50, 0),
(118, 84, 6, 1.00, 10.00, 0),
(119, 84, 7, 1.00, 12.50, 0),
(120, 84, 5, NULL, NULL, 0),
(121, 85, 6, 1.00, 10.00, 0),
(122, 85, 7, 1.00, 12.50, 0),
(123, 86, 6, 10.00, 10.00, 0),
(124, 86, 7, 10.00, 12.50, 0),
(125, 88, 6, 1.00, 10.00, 0),
(126, 88, 7, 1.00, 12.50, 0),
(127, 89, 6, 10.00, 10.00, 5),
(128, 89, 7, 10.00, 12.50, 10);

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
(1, 10.00, 100.00, 33.00, 5),
(2, 10.00, 100.00, 12.00, 6),
(3, 10.00, 100.00, 10.00, 7);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Volcado de datos para la tabla `supliers`
--

INSERT INTO `supliers` (`id`, `nombre`, `direccion`, `telefono`, `rfc`, `ciudad`) VALUES
(1, 'Tor MAC', 'Av Lapizlazuli', '234566', 'HHYO 895612', 'Guadalajara');

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
