-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-08-2018 a las 20:33:15
-- Versión del servidor: 10.1.28-MariaDB
-- Versión de PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `inventario`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `antivirus`
--

CREATE TABLE `antivirus` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `antivirus`
--

INSERT INTO `antivirus` (`id`, `descripcion`, `estado`) VALUES
(1, 'Nod 32', 1),
(2, 'Avast 8', 0),
(3, 'Karpesky 7', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `estado`) VALUES
(1, 'Recursos Humanos', 1),
(2, 'Contabilidad', 0),
(3, 'Samsung', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadoras`
--

CREATE TABLE `computadoras` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `presentacion_id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `finca_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `contacto` varchar(250) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `procesador_id` int(11) NOT NULL,
  `ram_id` int(11) NOT NULL,
  `disco_id` int(11) NOT NULL,
  `so_id` int(11) NOT NULL,
  `serial_so` int(11) NOT NULL,
  `office_id` int(11) NOT NULL,
  `serial_office` int(11) NOT NULL,
  `antivirus_id` int(11) NOT NULL,
  `ip` varchar(50) NOT NULL,
  `mac` varchar(50) NOT NULL,
  `bitacora` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_mante` date DEFAULT NULL,
  `fecregistro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `computadoras`
--

INSERT INTO `computadoras` (`id`, `codigo`, `monitor_id`, `presentacion_id`, `proveedor_id`, `finca_id`, `area_id`, `contacto`, `fabricante_id`, `procesador_id`, `ram_id`, `disco_id`, `so_id`, `serial_so`, `office_id`, `serial_office`, `antivirus_id`, `ip`, `mac`, `bitacora`, `estado`, `ultimo_mante`, `fecregistro`, `usuario_id`) VALUES
(1, 9121, 1, 1, 2, 1, 2, 'Jose Perez', 1, 1, 2, 1, 1, 1010212, 1, 11221, 2, '192.168.1.1', '12123121', 'Esta todo ok', 1, '2018-06-11', '2018-06-11 07:09:11', 1),
(2, 99112, 1, 2, 1, 1, 1, 'Maria Cortez', 2, 1, 1, 1, 2, 120011, 1, 101212, 2, '192.168.1.1', '12123121', 'esta funcionable', 1, '2018-06-11', '2018-06-11 04:21:16', 1),
(3, 991, 1, 2, 2, 1, 2, 'juan Cortez', 1, 1, 2, 1, 1, 121212, 1, 12131, 1, '192.168.1.1', '112-11111', 'Too esta funcionando', 1, '2018-06-13', '2018-06-12 10:00:00', 1),
(4, 12, 2, 1, 1, 1, 1, 'Carlos Gomez', 1, 1, 2, 1, 1, 121212, 1, 12121, 2, '192.185.1.1', '121-1212', 'Funcionando muy Bien', 1, NULL, '2018-06-24 17:04:29', 1),
(5, 12112, 1, 1, 1, 1, 2, 'Carlos Gomez', 1, 1, 1, 1, 2, 121212, 1, 131214, 1, '192.185.1.1', '121-1212', 'Funcionando muy Bien', 1, NULL, '2018-06-30 11:12:10', 1),
(6, 1212, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(7, 1313, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(8, 1212, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(9, 1313, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(10, 901125, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(11, 900124, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(12, 89812, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(13, 89123, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(14, 89812, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(15, 89123, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(16, 89812, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(17, 89123, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(18, 5675, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(19, 6575, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(20, 5675, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(21, 6575, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(22, 5675, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(23, 6575, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1),
(24, 435, 1, 1, 1, 1, 1, 'Carmen gonzales', 1, 1, 1, 1, 1, 12, 1, 1212, 1, '192.168.1.1', '1212-1212', 'Esta Funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(25, 121, 1, 1, 1, 1, 1, 'Jose Martinez', 1, 1, 1, 1, 1, 11012, 1, 1212, 1, '192.168.1.2', '1212-1213', 'Fallo en el prendido', 1, NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `computadoras_mantenimientos`
--

CREATE TABLE `computadoras_mantenimientos` (
  `id` int(11) NOT NULL,
  `computadora_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tecnico` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `computadoras_mantenimientos`
--

INSERT INTO `computadoras_mantenimientos` (`id`, `computadora_id`, `fecha`, `tecnico`, `descripcion`) VALUES
(1, 1, '2018-06-11', 'Jose Luis Fernandez', 'Cambio de pila'),
(2, 1, '2018-06-11', 'Jhon Manrique', 'Cambio de Memoria'),
(3, 2, '2018-06-11', 'Jose Luis Fernandez', 'Cambio de Respuesto'),
(4, 3, '2018-06-13', 'Jose Martinez', 'Limpieza interna');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `discos`
--

CREATE TABLE `discos` (
  `id` int(11) NOT NULL,
  `capacidad` varchar(250) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `discos`
--

INSERT INTO `discos` (`id`, `capacidad`, `fabricante_id`, `estado`) VALUES
(1, '1024 mb', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fabricantes`
--

CREATE TABLE `fabricantes` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fabricantes`
--

INSERT INTO `fabricantes` (`id`, `nombre`, `estado`) VALUES
(1, 'Chipset ', 0),
(2, 'Intel', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fincas`
--

CREATE TABLE `fincas` (
  `id` int(11) NOT NULL,
  `nit` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `fincas`
--

INSERT INTO `fincas` (`id`, `nit`, `nombre`, `direccion`, `telefono`, `descripcion`, `estado`) VALUES
(1, 10012, 'Finca 1', 'Direccion de la Finca 01', '053464642', 'Esta es la finca 01', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresoras`
--

CREATE TABLE `impresoras` (
  `id` int(11) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `finca_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `contacto` varchar(150) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `serial_fabricante` int(11) NOT NULL,
  `bitacora` text NOT NULL,
  `codigo` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_mante` date DEFAULT NULL,
  `fecregistro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `impresoras`
--

INSERT INTO `impresoras` (`id`, `proveedor_id`, `finca_id`, `area_id`, `contacto`, `fabricante_id`, `referencia`, `serial_fabricante`, `bitacora`, `codigo`, `estado`, `ultimo_mante`, `fecregistro`, `usuario_id`) VALUES
(1, 1, 1, 2, 'Jose Perez', 1, 'refencia 01', 12129991, 'Esta todo bueno', 100143, 1, '0000-00-00', '2018-06-10 01:15:08', 1),
(2, 2, 1, 1, 'Jose Perez', 1, 'refencia 01', 12129992, 'equipo funcionable', 100143, 1, '0000-00-00', '2018-06-10 07:22:40', 1),
(3, 1, 1, 2, 'Jose Perez', 2, 'referencia de la impresora 01', 11201212, 'esta funcionable', 10012, 1, '2018-06-11', '2018-06-11 01:06:06', 1),
(4, 1, 1, 1, 'Julio Quintero', 1, 'referencia de la impresora', 121212, 'Esta funcionable', 1212, 1, NULL, '0000-00-00 00:00:00', 1),
(5, 1, 1, 1, 'Julio Gomez', 1, 'referencia de la impresora', 121212, 'Esta funcionable', 1231, 1, NULL, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `impresoras_mantenimientos`
--

CREATE TABLE `impresoras_mantenimientos` (
  `id` int(11) NOT NULL,
  `impresora_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tecnico` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `impresoras_mantenimientos`
--

INSERT INTO `impresoras_mantenimientos` (`id`, `impresora_id`, `fecha`, `tecnico`, `descripcion`) VALUES
(1, 3, '2018-06-11', 'Jhon Manrique', 'Cambio de Cartuchos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectores`
--

CREATE TABLE `lectores` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_mante` date NOT NULL,
  `fecregistro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lectores`
--

INSERT INTO `lectores` (`id`, `codigo`, `fabricante_id`, `modelo`, `descripcion`, `estado`, `ultimo_mante`, `fecregistro`, `usuario_id`) VALUES
(1, 122, 1, 'modelo del lector 1', 'descripcion del lector 1', 1, '2018-06-11', '2018-06-12 14:32:29', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lectores_mantenimientos`
--

CREATE TABLE `lectores_mantenimientos` (
  `id` int(11) NOT NULL,
  `lector_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tecnico` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `lectores_mantenimientos`
--

INSERT INTO `lectores_mantenimientos` (`id`, `lector_id`, `fecha`, `tecnico`, `descripcion`) VALUES
(1, 1, '2018-06-11', 'Jose Luis Fernandez', 'cambiode lector');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL,
  `modulo` varchar(200) NOT NULL,
  `accion` varchar(200) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `logs`
--

INSERT INTO `logs` (`id`, `fecha`, `usuario_id`, `modulo`, `accion`, `descripcion`) VALUES
(1, '2018-06-13 05:05:38', 1, 'Usuarios', '', 'Cierre de sesión'),
(2, '2018-06-13 05:05:45', 1, 'Usuarios', '', 'Inicio de sesión'),
(3, '2018-06-13 05:14:54', 1, 'Computadoras', '', 'Inserción de nueva Computadora con Codigo 0991'),
(4, '2018-06-13 05:15:15', 1, 'Computadoras', '', 'Actualización de la Computadora con Codigo 991'),
(5, '2018-06-13 05:15:39', 1, 'Computadoras', '', 'Registro de Mantenimiento a la Computadora con Codigo 991'),
(6, '2018-06-13 15:23:48', 1, 'Usuarios', '', 'Inicio de sesión'),
(7, '2018-06-14 21:11:29', 1, 'Usuarios', '', 'Inicio de sesión'),
(8, '2018-06-16 15:21:35', 1, 'Usuarios', '', 'Inicio de sesión'),
(9, '2018-06-17 04:07:29', 1, 'Usuarios', '', 'Inicio de sesión'),
(10, '2018-06-17 06:57:13', 1, 'Computadoras', '', 'Inserción de nueva Computadora con Codigo 011-1012'),
(11, '2018-06-17 06:59:07', 1, 'Computadoras', '', 'Actualización de la Computadora con Codigo 11'),
(12, '2018-06-17 14:46:09', 1, 'Usuarios', '', 'Inicio de sesión'),
(13, '2018-06-18 03:55:35', 1, 'Usuarios', '', 'Inicio de sesión'),
(14, '2018-06-18 15:15:11', 1, 'Usuarios', '', 'Inicio de sesión'),
(15, '2018-06-19 04:31:01', 1, 'Usuarios', '', 'Inicio de sesión'),
(16, '2018-06-20 16:08:01', 1, 'Usuarios', '', 'Inicio de sesión'),
(17, '2018-06-22 06:50:04', 1, 'Usuarios', '', 'Inicio de sesión'),
(18, '2018-06-22 16:03:39', 1, 'Usuarios', '', 'Inicio de sesión'),
(19, '2018-06-22 20:43:19', 1, 'Usuarios', '', 'Inicio de sesión'),
(20, '2018-06-23 16:37:40', 1, 'Usuarios', '', 'Inicio de sesión'),
(21, '2018-06-23 19:46:13', 1, 'Usuarios', '', 'Inicio de sesión'),
(22, '2018-06-24 03:07:26', 1, 'Usuarios', '', 'Inicio de sesión'),
(23, '2018-06-24 04:41:51', 1, 'Usuarios', '', 'Inicio de sesión'),
(24, '2018-06-24 06:46:02', 1, 'Computadoras', '', 'Inserción de nueva Computadora con Codigo 0012112'),
(25, '2018-06-24 15:12:25', 1, 'Usuarios', '', 'Inicio de sesión'),
(26, '2018-06-24 17:04:30', 1, 'Computadoras', '', 'Actualización de la Computadora con Codigo 12'),
(27, '2018-06-24 20:47:26', 1, 'Usuarios', '', 'Inicio de sesión'),
(28, '2018-06-25 04:59:39', 1, 'Usuarios', '', 'Inicio de sesión'),
(29, '2018-06-25 16:25:16', 1, 'Usuarios', '', 'Inicio de sesión'),
(30, '2018-06-25 18:10:05', 1, 'Usuarios', '', 'Cierre de sesión'),
(31, '2018-06-25 18:38:59', 1, 'Usuarios', '', 'Inicio de sesión'),
(32, '2018-06-25 19:50:49', 1, 'Usuarios', '', 'Inicio de sesión'),
(33, '2018-06-26 05:50:03', 1, 'Usuarios', '', 'Inicio de sesión'),
(34, '2018-06-26 14:41:49', 1, 'Usuarios', '', 'Inicio de sesión'),
(35, '2018-06-26 20:26:12', 1, 'Monitores', '', 'Eliminación del Monitor con Codigo '),
(36, '2018-06-26 20:26:47', 1, 'Monitores', '', 'Eliminación del Monitor con Codigo '),
(37, '2018-06-26 20:28:59', 1, 'Monitores', '', 'Actualización del Monitor con Codigo 10012'),
(38, '2018-06-26 20:29:05', 1, 'Monitores', '', 'Eliminación del Monitor con Codigo '),
(39, '2018-06-26 20:31:04', 1, 'Monitores', '', 'Actualización del Monitor con Codigo 10012'),
(40, '2018-06-26 20:31:08', 1, 'Monitores', '', 'Eliminación del Monitor con Codigo 10012'),
(41, '2018-06-26 20:31:17', 1, 'Impresoras', '', 'Eliminación de la Impresoras con Codigo 10012'),
(42, '2018-06-26 20:31:29', 1, 'Tablets', '', 'Eliminación de la Tablet con Codigo 10012'),
(43, '2018-06-26 20:31:42', 1, 'Proyectos', '', 'Eliminación del Proyector con Codigo 100143'),
(44, '2018-06-26 20:31:47', 1, 'Proyectos', '', 'Actualización del Proyector con Codigo 100143'),
(45, '2018-06-26 20:31:54', 1, 'Lector de Barra', '', 'Eliminación del Lector con Codigo 122'),
(46, '2018-06-26 20:31:59', 1, 'Lector de Barra', '', 'Actualización del Lector con Codigo 122'),
(47, '2018-06-26 20:32:19', 1, 'Impresoras', '', 'Actualización de la Impresora con Codigo 10012'),
(48, '2018-06-26 20:32:36', 1, 'Monitores', '', 'Actualización del Monitor con Codigo 19122'),
(49, '2018-06-26 20:32:45', 1, 'Monitores', '', 'Actualización del Monitor con Codigo 19122'),
(50, '2018-06-26 20:32:58', 1, 'Monitores', '', 'Actualización del Monitor con Codigo 10012'),
(51, '2018-06-28 15:50:37', 1, 'Usuarios', '', 'Inicio de sesión'),
(52, '2018-06-30 23:48:41', 1, 'Usuarios', '', 'Inicio de sesión'),
(53, '2018-07-01 14:57:20', 1, 'Usuarios', '', 'Inicio de sesión'),
(54, '2018-07-03 17:57:08', 1, 'Usuarios', '', 'Cierre de sesión'),
(55, '2018-07-03 17:57:14', 3, 'Usuarios', '', 'Inicio de sesión'),
(56, '2018-07-03 17:57:40', 3, 'Usuarios', '', 'Cierre de sesión'),
(57, '2018-07-30 16:01:20', 2, 'Usuarios', '', 'Inicio de sesión'),
(58, '2018-07-30 16:02:10', 2, 'Usuarios', '', 'Cierre de sesión'),
(59, '2018-07-30 16:02:16', 1, 'Usuarios', '', 'Inicio de sesión'),
(60, '2018-08-14 20:06:34', 2, 'Usuarios', '', 'Inicio de sesión');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `memorias`
--

CREATE TABLE `memorias` (
  `id` int(11) NOT NULL,
  `capacidad` varchar(250) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `memorias`
--

INSERT INTO `memorias` (`id`, `capacidad`, `fabricante_id`, `estado`) VALUES
(1, '4000 mb', 1, 1),
(2, '8000 mb', 1, 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores`
--

CREATE TABLE `monitores` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `tamaño` varchar(100) NOT NULL,
  `proveedor_id` int(11) NOT NULL,
  `finca_id` int(11) NOT NULL,
  `area_id` int(11) NOT NULL,
  `contacto` varchar(250) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `serial_fabricante` varchar(100) NOT NULL,
  `referencia` varchar(100) NOT NULL,
  `bitacora` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_mante` text,
  `fecregistro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monitores`
--

INSERT INTO `monitores` (`id`, `codigo`, `tamaño`, `proveedor_id`, `finca_id`, `area_id`, `contacto`, `fabricante_id`, `serial_fabricante`, `referencia`, `bitacora`, `estado`, `ultimo_mante`, `fecregistro`, `usuario_id`) VALUES
(1, 19122, '19\' pulgadas', 1, 1, 2, 'Jose Perez', 1, '11201212', 'referencia de la monior 01', 'esta funcionable', 1, '2018-06-11', '2018-06-10 03:08:09', 1),
(2, 10012, '19\' pulgadas', 2, 1, 1, 'Maria Cortez', 1, '11201212', 'refencia 01', 'esta funcionable', 1, '2018-06-11', '2018-06-11 08:26:22', 1),
(3, 7870, '19 pulgadas', 1, 1, 1, 'Carmen Salinas', 1, '1991121', 'referenca 01', 'esta funcionable', 1, NULL, '0000-00-00 00:00:00', 1),
(4, 7871, '19 pulgadas', 1, 1, 2, 'Carmen Salinas', 1, '1991121', 'referenca 01', 'No muestra pantalla', 1, NULL, '0000-00-00 00:00:00', 1),
(5, 7872, '19 pulgadas', 1, 1, 1, 'Carmen Salinas', 1, '1991121', 'referenca 01', '43311.770833333', 1, NULL, '0000-00-00 00:00:00', 1),
(6, 7873, '19 pulgadas', 1, 1, 2, 'Carmen Salinas', 1, '1991121', 'referenca 01', 'No muestra pantalla', 1, NULL, '0000-00-00 00:00:00', 1),
(7, 7874, '19 pulgadas', 1, 1, 1, 'Carmen Salinas', 1, '1991121', 'referenca 01', '43311.770833333', 1, NULL, '1970-01-01 01:00:00', 1),
(8, 7875, '19 pulgadas', 1, 1, 2, 'Carmen Salinas', 1, '1991121', 'referenca 01', 'No muestra pantalla', 1, NULL, '1970-01-01 01:00:00', 1),
(9, 7876, '19 pulgadas', 1, 1, 1, 'Carmen Salinas', 1, '1991121', 'referenca 01', '43311.770833333', 1, NULL, '2018-07-30 18:30:00', 1),
(10, 7877, '19 pulgadas', 1, 1, 2, 'Carmen Salinas', 1, '1991121', 'referenca 01', 'No muestra pantalla', 1, NULL, '2018-07-31 18:30:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `monitores_mantenimientos`
--

CREATE TABLE `monitores_mantenimientos` (
  `id` int(11) NOT NULL,
  `monitor_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tecnico` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `monitores_mantenimientos`
--

INSERT INTO `monitores_mantenimientos` (`id`, `monitor_id`, `fecha`, `tecnico`, `descripcion`) VALUES
(1, 1, '2018-06-14', 'Jose Luis Fernandez Aguilar', 'Limpieza interna'),
(2, 2, '2018-06-11', 'Jhon Manrique', 'Limpieza interna'),
(3, 1, '2018-06-11', 'Jhon Manrique', 'Cambio de Repuesto');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `office`
--

CREATE TABLE `office` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `office`
--

INSERT INTO `office` (`id`, `nombre`, `estado`) VALUES
(1, 'Office 2013', 1),
(2, 'Office 2016', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `presentaciones`
--

CREATE TABLE `presentaciones` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `presentaciones`
--

INSERT INTO `presentaciones` (`id`, `nombre`, `estado`) VALUES
(1, 'Presentacion 01', 1),
(2, 'Presentacion 2', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `procesadores`
--

CREATE TABLE `procesadores` (
  `id` int(11) NOT NULL,
  `referencia` varchar(250) NOT NULL,
  `velocidad` varchar(250) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `procesadores`
--

INSERT INTO `procesadores` (`id`, `referencia`, `velocidad`, `fabricante_id`, `estado`) VALUES
(1, 'refencia 01', '100 mb', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` int(11) NOT NULL,
  `nombre` varchar(250) NOT NULL,
  `nit` varchar(100) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `correo` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `nit`, `direccion`, `correo`, `estado`) VALUES
(1, 'Proveedor 01', '120121', 'Calle Pichincha 310', 'proveedor@gmail.com', 1),
(2, 'Proveedor 2', '', '', '', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectores`
--

CREATE TABLE `proyectores` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_mante` date DEFAULT NULL,
  `fecregistro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectores`
--

INSERT INTO `proyectores` (`id`, `codigo`, `fabricante_id`, `modelo`, `descripcion`, `estado`, `ultimo_mante`, `fecregistro`, `usuario_id`) VALUES
(1, 100143, 1, 'modelo proyector 1', 'Descripcion del proyector 1', 1, '2018-06-11', '2018-06-03 12:30:24', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyectores_mantenimientos`
--

CREATE TABLE `proyectores_mantenimientos` (
  `id` int(11) NOT NULL,
  `proyector_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tecnico` date NOT NULL,
  `descripcion` text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proyectores_mantenimientos`
--

INSERT INTO `proyectores_mantenimientos` (`id`, `proyector_id`, `fecha`, `tecnico`, `descripcion`) VALUES
(1, 1, '2018-06-11', '0000-00-00', 'Cambio de Ventilador');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `descripcion`) VALUES
(1, 'Administrador', ''),
(2, 'Usuario', ''),
(3, 'Reportes', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sistemas`
--

CREATE TABLE `sistemas` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `sistemas`
--

INSERT INTO `sistemas` (`id`, `descripcion`, `estado`) VALUES
(1, 'Windows 8', 1),
(2, 'Windows 10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablets`
--

CREATE TABLE `tablets` (
  `id` int(11) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fabricante_id` int(11) NOT NULL,
  `modelo` varchar(100) NOT NULL,
  `descripcion` varchar(250) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ultimo_mante` date DEFAULT NULL,
  `fecregistro` datetime NOT NULL,
  `usuario_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablets`
--

INSERT INTO `tablets` (`id`, `codigo`, `fabricante_id`, `modelo`, `descripcion`, `estado`, `ultimo_mante`, `fecregistro`, `usuario_id`) VALUES
(1, 10012, 1, 'modelo 01', 'descripcion de la tablet 01', 0, '2018-06-11', '2018-06-10 09:47:28', 1),
(2, 100143, 1, 'modelo 01', 'descripcion de la tablet 02', 1, NULL, '2018-06-10 13:24:33', 1),
(3, 911, 1, 'modelo proyector 01', 'Descripcion del proyector 01', 1, NULL, '2018-06-11 11:29:33', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tablets_mantenimientos`
--

CREATE TABLE `tablets_mantenimientos` (
  `id` int(11) NOT NULL,
  `tablet_id` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `tecnico` varchar(250) NOT NULL,
  `descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tablets_mantenimientos`
--

INSERT INTO `tablets_mantenimientos` (`id`, `tablet_id`, `fecha`, `tecnico`, `descripcion`) VALUES
(1, 1, '2018-06-11', 'Jhon Manrique', 'Cambuo de Carcasa');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombres` varchar(200) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(100) NOT NULL,
  `cedula` int(11) NOT NULL,
  `sexo` varchar(100) NOT NULL,
  `rol_id` int(11) DEFAULT NULL,
  `estado` tinyint(1) NOT NULL,
  `imagen` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombres`, `email`, `password`, `cedula`, `sexo`, `rol_id`, `estado`, `imagen`) VALUES
(1, 'Gean Carlos Mamani', 'gean@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 10011, 'M', 1, 1, 'avatar11.png'),
(2, 'yony', 'yonybrondy17@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 12912, 'M', 2, 1, 'imagen_masculino.jpg'),
(3, 'miguel cervantez', 'miguel@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', 1012121, 'M', 3, 1, 'imagen_masculino.jpg');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `antivirus`
--
ALTER TABLE `antivirus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `computadoras`
--
ALTER TABLE `computadoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `computadoras_mantenimientos`
--
ALTER TABLE `computadoras_mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `discos`
--
ALTER TABLE `discos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `fincas`
--
ALTER TABLE `fincas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `impresoras_mantenimientos`
--
ALTER TABLE `impresoras_mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lectores`
--
ALTER TABLE `lectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lectores_mantenimientos`
--
ALTER TABLE `lectores_mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `memorias`
--
ALTER TABLE `memorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitores`
--
ALTER TABLE `monitores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `monitores_mantenimientos`
--
ALTER TABLE `monitores_mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `office`
--
ALTER TABLE `office`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `procesadores`
--
ALTER TABLE `procesadores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectores`
--
ALTER TABLE `proyectores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `proyectores_mantenimientos`
--
ALTER TABLE `proyectores_mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tablets`
--
ALTER TABLE `tablets`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tablets_mantenimientos`
--
ALTER TABLE `tablets_mantenimientos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `antivirus`
--
ALTER TABLE `antivirus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `computadoras`
--
ALTER TABLE `computadoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `computadoras_mantenimientos`
--
ALTER TABLE `computadoras_mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `discos`
--
ALTER TABLE `discos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `fabricantes`
--
ALTER TABLE `fabricantes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `fincas`
--
ALTER TABLE `fincas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `impresoras`
--
ALTER TABLE `impresoras`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `impresoras_mantenimientos`
--
ALTER TABLE `impresoras_mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lectores`
--
ALTER TABLE `lectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `lectores_mantenimientos`
--
ALTER TABLE `lectores_mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `memorias`
--
ALTER TABLE `memorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `monitores`
--
ALTER TABLE `monitores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `monitores_mantenimientos`
--
ALTER TABLE `monitores_mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `office`
--
ALTER TABLE `office`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `presentaciones`
--
ALTER TABLE `presentaciones`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `procesadores`
--
ALTER TABLE `procesadores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proyectores`
--
ALTER TABLE `proyectores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `proyectores_mantenimientos`
--
ALTER TABLE `proyectores_mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sistemas`
--
ALTER TABLE `sistemas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tablets`
--
ALTER TABLE `tablets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tablets_mantenimientos`
--
ALTER TABLE `tablets_mantenimientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
