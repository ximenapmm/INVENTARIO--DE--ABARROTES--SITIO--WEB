-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1:3306
-- Tiempo de generación: 02-05-2025 a las 00:57:41
-- Versión del servidor: 9.1.0
-- Versión de PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_abarrotes`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `administrador`
--

DROP TABLE IF EXISTS `administrador`;
CREATE TABLE IF NOT EXISTS `administrador` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `pass` varchar(255) NOT NULL,
  `fecha_registro` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `correo` (`correo`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Volcado de datos para la tabla `administrador`
--

INSERT INTO `administrador` (`id`, `nombre`, `correo`, `pass`, `fecha_registro`) VALUES
(1, 'Manuel Enrique', 'manuelnava123@gmail.com', '$2y$10$pPL52ZA5o/m0g/ycVah3nu9PEY5CIKki1vw/Rmp3ii9tokiSdTooi', '2025-04-19 21:53:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

DROP TABLE IF EXISTS `productos`;
CREATE TABLE IF NOT EXISTS `productos` (
  `id` int NOT NULL AUTO_INCREMENT,
  `nombre` varchar(100) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `cantidad` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `categoria` varchar(50) COLLATE utf8mb4_spanish2_ci NOT NULL,
  `codigo_barras` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_spanish2_ci NOT NULL,
  `fecha_registro` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_spanish2_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `nombre`, `precio`, `cantidad`, `categoria`, `codigo_barras`, `fecha_registro`) VALUES
(1, 'arroz', 21.00, '1 kilo', 'canasta basica', '750103131130', '2025-05-01 21:10:40'),
(2, 'leche', 25.00, '1 litro', 'canasta basica', '750123456789', '2025-05-01 21:13:18'),
(3, 'Huevo', 50.00, '1 kilo', 'canasta basica', '750987654321', '2025-05-01 23:07:20'),
(4, 'Harina', 21.00, '1 kilo', 'canasta basica', '750123098765', '2025-05-02 00:05:38'),
(5, 'Azucar', 25.00, '1 kilo', 'canasta basica', '012345678905', '2025-05-02 00:42:41'),
(6, 'Frijol negro', 35.00, '1 kilo', 'canasta basica', '123456789012', '2025-05-02 00:42:41'),
(7, 'Papel higienico', 60.00, '4 rollos', 'Higiene personal', '234567890123', '2025-05-02 00:42:41'),
(8, 'Jabon en barra', 12.00, '1 pieza', 'higiene personal', '345678901234', '2025-05-02 00:42:41'),
(9, 'Pasta para sopa', 10.50, '500 gramos', 'Canasta basica', '456789012345', '2025-05-02 00:42:41'),
(10, 'Sardina en lata', 20.00, '1 lata', 'canasta basica', '567890123456', '2025-05-02 00:42:41'),
(11, 'Sal de mesa', 15.00, '1 kilo', 'canasta basica', '678901234567', '2025-05-02 00:42:41'),
(12, 'Cafe soluble', 45.00, '100 gramos', 'Canasta basica', '789012345678', '2025-05-02 00:42:41'),
(13, 'Detergente en polvo', 30.00, '1 kilo', 'limpieza', '890123456789', '2025-05-02 00:42:41'),
(14, 'Cloro', 18.00, '1 litro', 'limpieza', '901234567890', '2025-05-02 00:42:41'),
(15, 'Agua purificada', 15.00, '1.5 litros', 'bebidas', '147258369014', '2025-05-02 00:42:41'),
(16, 'Refresco sabor cola', 39.00, '2.5 litros', 'bebidas', '258369147025', '2025-05-02 00:42:41'),
(17, 'Cuaderno profesional', 35.00, '100 hojas', 'papeleria', '369147258036', '2025-05-02 00:42:41'),
(18, 'Pluma azul', 8.00, '1 pieza', 'papeleria', '159357258048', '2025-05-02 00:42:41'),
(19, 'Pan de caja', 40.00, '680 gramos', 'Canasta basica', '741852963059', '2025-05-02 00:42:41'),
(20, 'Mayonesa', 28.00, '390 gramos', 'Alimentos envasados', '852963741060', '2025-05-02 00:42:41');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
