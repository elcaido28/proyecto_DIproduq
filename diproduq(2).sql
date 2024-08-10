-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-12-2020 a las 20:45:15
-- Versión del servidor: 10.1.36-MariaDB
-- Versión de PHP: 7.0.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `diproduq`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `abonar_pago`
--

CREATE TABLE `abonar_pago` (
  `id_abonar_pago` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `id_control_pagos` int(11) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cargos`
--

CREATE TABLE `cargos` (
  `id_cargos` int(11) NOT NULL,
  `descrip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cargos`
--

INSERT INTO `cargos` (`id_cargos`, `descrip`) VALUES
(1, 'Administrador'),
(2, 'Secretaria'),
(3, 'Bodegero'),
(4, 'Vendedor'),
(5, 'Vendedor Auxiliar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id_clientes` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `ruc_ci` varchar(15) NOT NULL,
  `nombre_comercial` varchar(200) NOT NULL,
  `nombre_dueno` varchar(200) NOT NULL,
  `apellido_dueno` varchar(200) NOT NULL,
  `direccion` text NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(250) NOT NULL,
  `zona` varchar(15) NOT NULL,
  `estado` int(11) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id_clientes`, `fecha`, `ruc_ci`, `nombre_comercial`, `nombre_dueno`, `apellido_dueno`, `direccion`, `telefono`, `email`, `zona`, `estado`, `id_empleados`) VALUES
(1, '2020-02-27', '0950039982', 'rcjmlemdkcmrlcmlmcleerepmpo', 'cremkremrkem', 'wmxlkwmecl', 'fvjndflvkndlfkndkln', '0943778878', 'meklmcercmel@cjsndjcksd.com', 'Sur', 2, 2),
(2, '2020-02-27', '0950038982', 'lnldkfnvlkdfnvlkndflkk', 'lknlkcnldknf', 'lnldcnlfnkdkn', 'kjncknlcnsklnvlknfldnl', '089493453', 'ckldkscsd@corpdedesarrollorapido.com', 'Norte', 2, 3),
(3, '2020-11-04', '9999999999', 'ADRIANA TORRES', 'ADRIANA', 'TORRES', 'SUR', '', '', 'Norte', 1, 4),
(4, '2020-11-04', '258585855', 'AIRTON', 'AIRTON', 'AIRTON', 'MAPASINGUE OESTE', '', '', 'Oeste', 1, 4),
(5, '2020-11-06', '9999999999', 'ALEXANDRA ROMAN', 'ALEXANDRA', 'ROMAN', 'NORTE', '0995020132', '', 'Norte', 1, 4),
(6, '2020-11-06', '9999999999', 'AMIGO DE MIGUEL', 'MIGUEL', 'A', 'LA FLORESTA', '0995020132', '', 'Sur', 1, 4),
(7, '2020-11-06', '9999999999', 'ANA MACIAS', 'ANA ', 'MACIAS', 'SAUCES', '0995020132', '', 'Norte', 1, 4),
(8, '2020-11-06', '9999999999', 'ANA PILALOA', 'ANA', 'PILALOA', 'FLORIDA', '0995020132', '', 'Norte', 1, 4),
(9, '2020-11-06', '9999999999', 'ANA PILALOA', 'ANA', 'PILALOA', 'FLORIDA', '0995020132', '', 'Norte', 2, 4),
(10, '2020-11-06', '9999999999', 'ARACELY', 'ARACELY', 'A', 'PANCHO JACOME', '0995020132', '', 'Norte', 1, 4),
(11, '2020-11-06', '9999999999', 'BELFIDA ORRALA', 'BELFIDA', 'ORRALA', 'CONSEGUIR', '0416415466', '', 'Norte', 1, 4),
(12, '2020-11-06', '9999999999', 'CARLOS RONQUILLO', 'CARLOS ', 'RONQUILLO', 'Km 8 1/2 Via Daule Colinas Al Sol', '0995020132', '', 'Norte', 1, 4),
(13, '2020-11-06', '9999999999', 'CITY LLANTA', 'C', 'LL', 'Km 8 1/2 Via Daule Colinas Al Sol', '0995020132', '', 'Norte', 1, 4),
(14, '2020-11-06', '9999999999', 'DAYANNA MORALES', 'DAYANNA', 'MORALES', 'QUITO', '0995020132', '', 'Norte', 1, 4),
(15, '2020-11-06', '9999999999', 'DON CLAUDIO', 'DON CLAUDIO', 'R', 'Mapasingue Oeste Av. 6ta y calle 4ta esq. Frente a la farmacia Keyla, Guayaquil', '0995020132', '', 'Norte', 1, 4),
(16, '2020-11-06', '9999999999', 'DON PEDRO', 'DON', 'PEDRO', 'MAPASINGUE ', '0995020132', '', 'Norte', 1, 4),
(17, '2020-11-06', '9999999999', 'DON PEPE', 'DON ', 'PEPE', 'FLORIDA', '0995020132', '', 'Norte', 1, 4),
(18, '2020-11-06', '9999999999', 'DRA. BAUX', 'DRA.', 'BAUX', 'ESTEROS', '0995020132', '', 'Sur', 1, 4),
(19, '2020-11-06', '9999999999', 'EDISON ASTUDILLO', 'EDISON ', 'ASTUDILLO', 'FLORIDA', '0995020132', '', 'Norte', 1, 4),
(20, '2020-11-06', '9999999999', 'ELVIS SALVATIERRA', 'ELVIS ', 'SALVATIERRA', 'ESTEROS', '0995020132', '', 'Sur', 1, 4),
(21, '2020-11-06', '9999999999', 'ERAZO', 'ERAZO', '.', 'LA JOYA', '0995020132', '', 'Norte', 1, 4),
(22, '2020-11-06', '9999999999', 'GEOVANNY CHARVERT', 'GEOVANNY ', 'CHARVERT', 'ESTEROS', '0995020132', '', 'Sur', 1, 4),
(23, '2020-11-06', '9999999999', 'GUSTAVO AVILES', 'GUSTAVO ', 'AVILES', 'ESTEROS', '0995020132', '', 'Sur', 1, 4),
(24, '2020-11-06', '9999999999', 'INES VALERO', 'INES ', 'VALERO', 'ESTEROS', '0995020132', '', 'Sur', 1, 4),
(25, '2020-11-06', '9999999999', 'INGRID REYES', 'INGRID', 'REYES', 'FLORIDA', '0995020132', '', 'Norte', 1, 4),
(26, '2020-11-06', '9999999999', 'ISABEL CASTILLO', 'ISABEL ', 'CASTILLO', 'QUISQUIS', '0995020132', '', 'Norte', 1, 4),
(27, '2020-11-06', '9999999999', 'ISMAEL MORALES', 'ISMAEL ', 'MORALES', 'CIUDADELA QUISQUIS', '0995020132', '', 'Norte', 1, 4),
(28, '2020-11-06', '', 'AIRTON', 'CARLOS ELIAS', 'MACIAS VELEZ', 'https://www.google.com/maps/place/Cdla.+Quisquis/@-2.1579524,-79.921162,17z/data=!4m5!3m4!1s0x902d72787c85f04f:0x188d4ae6dcb71e6f!8m2!3d-2.1581691!4d-79.91982?hl=es', '', 'carlos@gotmail.com', 'Centro', 1, 2),
(29, '2020-11-11', '', 'ALBERTO ORTIZ', 'ALBERTO', 'ORTIZ', 'BRAHMA', '', '', 'Norte', 1, 6),
(30, '2020-11-11', '', 'AMALIA TORRES', 'AMALIA ', 'TORRES', 'BRAHMA', '', '', 'Norte', 1, 6),
(31, '2020-11-11', '', 'ANDREA BACACELA', 'ANDREA', 'BACACELA', 'BRAHMA', '', '', 'Norte', 1, 6),
(32, '2020-11-11', '', 'ARACELY COLLAHUASO', 'ARACELY', 'COLLAHUASO', 'BRAHMA', '', '', 'Norte', 1, 6),
(33, '2020-11-11', '', 'AURELIO TUBAY', 'AURELIO ', 'TUBAY', 'BRAHMA', '', '', 'Norte', 1, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `control_pagos`
--

CREATE TABLE `control_pagos` (
  `id_control_pagos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `valor_t` double(8,2) NOT NULL,
  `valor_abono` double(8,2) NOT NULL,
  `adeuda` double(8,2) NOT NULL,
  `id_factura` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factu_mp`
--

CREATE TABLE `detalle_factu_mp` (
  `id_detalle_factu_mp` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_u` double(8,2) NOT NULL,
  `valor_t` double(8,2) NOT NULL,
  `id_inventario_mp` int(11) NOT NULL,
  `id_factura_mp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factu_produc`
--

CREATE TABLE `detalle_factu_produc` (
  `id_detalle_factu_produc` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `valor_u` double(8,2) NOT NULL,
  `valor_t` double(8,2) NOT NULL,
  `id_inventario_produc` int(11) NOT NULL,
  `id_factura_productos` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inv_insumos`
--

CREATE TABLE `detalle_inv_insumos` (
  `id_detalle_inv_insumos` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `id_inventario_insumo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_inv_insumos`
--

INSERT INTO `detalle_inv_insumos` (`id_detalle_inv_insumos`, `fecha`, `cantidad`, `id_inventario_insumo`) VALUES
(1, '2020-03-10', 60.00, 2),
(2, '2020-10-30', 100.00, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_inv_mp`
--

CREATE TABLE `detalle_inv_mp` (
  `id_detalle_inv_mp` int(11) NOT NULL,
  `id_inventario_mp` int(11) NOT NULL,
  `cantidad` double(14,4) NOT NULL,
  `costo` double(8,2) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `fecha` date NOT NULL,
  `ingre` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_inv_mp`
--

INSERT INTO `detalle_inv_mp` (`id_detalle_inv_mp`, `id_inventario_mp`, `cantidad`, `costo`, `precio`, `fecha`, `ingre`) VALUES
(2, 23, 200.0000, 6.50, 8.50, '2020-11-28', 1),
(3, 21, 200.0000, 1.50, 3.00, '2020-11-28', 1),
(4, 19, 200.0000, 0.10, 2.00, '2020-11-28', 1),
(5, 8, 200.0000, 25.00, 30.00, '2020-11-28', 1),
(6, 33, 100.0000, 1.68, 3.36, '2020-11-28', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ordenp`
--

CREATE TABLE `detalle_ordenp` (
  `id_detalle_ordenp` int(11) NOT NULL,
  `id_inventario_mp` int(11) NOT NULL,
  `cantidad` double(14,4) NOT NULL,
  `unidad` varchar(15) NOT NULL,
  `id_orden_produccion` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_ordenp`
--

INSERT INTO `detalle_ordenp` (`id_detalle_ordenp`, `id_inventario_mp`, `cantidad`, `unidad`, `id_orden_produccion`) VALUES
(105, 39, 80.0000, 'Litro', 9),
(106, 13, 20.0000, 'Litro', 9),
(107, 17, 20.0000, 'Gramo', 9),
(108, 37, 250.0000, 'Mililitro', 9),
(109, 18, 25.0000, 'Mililitro', 9);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_prod_orden`
--

CREATE TABLE `detalle_prod_orden` (
  `id_detalle_prod_orden` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_orden_produccion` int(11) NOT NULL,
  `id_inventario_produc` int(11) NOT NULL,
  `cantidad` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_receta`
--

CREATE TABLE `detalle_receta` (
  `id_detalle_receta` int(11) NOT NULL,
  `componente` varchar(250) NOT NULL,
  `cantidad` double(14,4) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `id_recetas` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `detalle_receta`
--

INSERT INTO `detalle_receta` (`id_detalle_receta`, `componente`, `cantidad`, `id_unidad`, `id_recetas`) VALUES
(81, '39', 80.0000, 2, 5),
(82, '13', 20.0000, 2, 5),
(83, '17', 20.0000, 3, 5),
(84, '37', 250.0000, 7, 5),
(85, '18', 25.0000, 7, 5),
(94, '33', 25.0000, 1, 6),
(95, '40', 11.0000, 1, 6),
(96, '17', 100.0000, 3, 6),
(97, '15', 400.0000, 3, 6),
(98, '26', 400.0000, 3, 6),
(99, '37', 200.0000, 7, 6),
(100, '41', 8.0000, 3, 6),
(101, '40', 169.8000, 2, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empaque`
--

CREATE TABLE `empaque` (
  `id_empaque` int(11) NOT NULL,
  `descrip` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empaque`
--

INSERT INTO `empaque` (`id_empaque`, `descrip`) VALUES
(1, 'Botella'),
(2, 'Funda');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id_empleados` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `cedula` varchar(13) NOT NULL,
  `foto` varchar(100) NOT NULL,
  `nombres` varchar(150) NOT NULL,
  `apellidos` varchar(150) NOT NULL,
  `direccion` varchar(250) NOT NULL,
  `telefono` varchar(13) NOT NULL,
  `id_cargos` int(11) NOT NULL,
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id_empleados`, `fecha`, `cedula`, `foto`, `nombres`, `apellidos`, `direccion`, `telefono`, `id_cargos`, `estado`) VALUES
(1, '2020-02-25', '0950303031', 'img_usuarios/usuario.jpg', 'admin', 'admin', 'Los Esteros', '0903847733', 1, 1),
(2, '2020-02-27', '0950039982', 'img_usuarios/usuario.jpg', 'Erick', 'Maldonado', 'lmdcklkwmmcdwmcms', '0974234566', 4, 2),
(3, '2020-02-27', '0950039982', 'img_usuarios/usuario.jpg', 'Manuel', 'Cuero', 'kdklndksndlkslhoihoih', '0923768726', 4, 2),
(4, '2020-11-04', '9999999999', 'img_usuarios/usuario.jpg', 'GUSTAVO ', 'AVILES ', 'SUR-ESTEROS', '0995020132', 4, 1),
(5, '2020-11-04', '9999999999', 'img_usuarios/usuario.jpg', 'GUSTAVO ', 'AVILES', 'SUR- ESTEROS', '0995020132', 4, 2),
(6, '2020-11-06', '9999999999', 'img_usuarios/usuario.jpg', 'JOSEP ', 'CRUZ', 'SAUCES', '0995020132', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_mp`
--

CREATE TABLE `factura_mp` (
  `id_factura_mp` int(11) NOT NULL,
  `num_factura` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_tipo_pago` int(11) NOT NULL,
  `valort` double(8,2) NOT NULL,
  `descuento` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `iva` double(8,2) NOT NULL,
  `totalp` double(8,2) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura_productos`
--

CREATE TABLE `factura_productos` (
  `id_factura_productos` int(11) NOT NULL,
  `num_factu` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL,
  `id_tipo_pago` int(11) NOT NULL,
  `valort` double(8,2) NOT NULL,
  `descuento` double(8,2) NOT NULL,
  `subtotal` double(8,2) NOT NULL,
  `iva` double(8,2) NOT NULL,
  `totalp` double(8,2) NOT NULL,
  `vendedor` int(11) NOT NULL,
  `id_clientes` int(11) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_insumo`
--

CREATE TABLE `inventario_insumo` (
  `id_inventario_insumo` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `id_empaque` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_insumo`
--

INSERT INTO `inventario_insumo` (`id_inventario_insumo`, `nombre`, `cantidad`, `id_empaque`, `id_unidad`) VALUES
(2, 'tapas', 510.00, 1, 4),
(3, 'tapas', 300.00, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_mp`
--

CREATE TABLE `inventario_mp` (
  `id_inventario_mp` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `descrip` text NOT NULL,
  `cantidad` double(14,4) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `costo` double(8,2) NOT NULL,
  `preciov` double(8,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `inventario_mp`
--

INSERT INTO `inventario_mp` (`id_inventario_mp`, `codigo`, `nombre`, `descrip`, `cantidad`, `id_unidad`, `costo`, `preciov`) VALUES
(5, '001', 'CARBONATO DE CALCIO', ' compuesto químico de fórmula CaCO?.', 28.6000, 1, 0.10, 0.15),
(6, '002', 'CLORO LIQUIDO CONCENTRADO', 'ESENCIA', 549.7000, 1, 1.34, 2.00),
(7, '003', 'ALCOHOL POTABLE', 'ALCOHOL- REGULARIZAR CANTIDADES', 14.9000, 1, 1.50, 2.00),
(8, '004', 'ALCACHOFA', 'EXTRACTO', 208.8000, 1, 25.00, 30.00),
(9, '005', 'CELLOSIDE', 'COMPUESTO', 13.4000, 1, 4.34, 5.43),
(10, '006', 'DEYQUART', 'ESPECIE DE AMONIO', 14.2800, 1, 3.41, 6.15),
(11, '007', 'QUINQUA', 'EXTRACTO', 3.1000, 1, 6.00, 6.00),
(12, '008', 'CURCUMA', 'EXTRACTO', 10.0000, 1, 2.50, 3.00),
(13, '009', 'SILICONE', 'MATERIA PRIMA', 63.5000, 1, 4.37, 10.00),
(14, '010', 'GLICERINA', 'MATERIA PRIMA', -8.5000, 1, 1.06, 3.50),
(15, '011', 'METASILICATO DE SODIO', 'MATERIA PRIMA', 35.4000, 1, 0.84, 1.20),
(16, '012', 'MENTOL CRISTALIZADO', 'MATERIA PRIMA', 1.9000, 1, 1.34, 2.00),
(17, '013', 'BENZOATO DE SODIO', 'MATERIA PRIMA', 5.3400, 1, 2.24, 1.50),
(18, '014', 'NONIL FENOL', 'MATERIA PRIMA', 93.6750, 1, 2.69, 4.50),
(19, '015', 'ACIDO ESTEARICO', 'MATERIA PRIMA', 220.5000, 1, 0.10, 2.00),
(20, '018', 'CLORO GRANULADO', 'MATERIA PRIMA', 23.2000, 1, 0.70, 2.20),
(21, '018', 'ACIDO SULFONICO', 'MATERIA PRIMA', 232.5000, 1, 1.50, 3.00),
(22, '019', 'CRESOL', 'MATERIA PRIMA', 32.5000, 1, 2.80, 6.72),
(23, '020', 'SALICILATO DE METILO', 'MATERIA PRIMA', 222.3000, 1, 6.50, 8.50),
(24, '021', 'ALCANFOR', 'MATERIA PRIMA', 24.0000, 1, 11.76, 15.00),
(25, '022', 'TALCO CHINO', 'MATERIA PRIMA', 15.1000, 1, 2.00, 3.00),
(26, '023', 'TRIPOLIFOSFATO', 'MATERIA PRIMA', 24.2000, 1, 1.00, 2.24),
(27, '024', 'SULFATO DE ALUMINIO', 'MATERIA PRIMA', 23.3000, 1, 2.50, 3.00),
(28, '025', 'SULFATO DE COBRE', 'MATERIA PRIMA', 23.4000, 1, 1.34, 2.00),
(29, '026', 'LACTOSA', 'MATERIA PRIMA', 15.5000, 1, 2.00, 2.50),
(30, '027', 'CLORURO DE MAGNESIO', 'MATERIA PRIMA', 25.0000, 1, 2.50, 3.50),
(31, '026', 'ESTEARATO DE MAGNESIO', 'MATERIA PRIMA', 16.3000, 1, 1.34, 2.50),
(32, '027', 'BUTIL GLICOL', 'MATERIA PRIMA', 48.6000, 1, 20.40, 3.20),
(33, '028', 'LAURIL SULFATO DE SODIO', 'MATERIA PRIMA', 70.9000, 1, 1.68, 3.36),
(34, '029', 'AMONIO CUATERNARIO', 'MATERIA PRIMA', 10.3000, 1, 3.00, 9.00),
(35, '030', 'SUAVIZANTE NEUTRO', 'MATERIA PRIMA', 200000.0000, 1, 2.00, 4.00),
(36, '005', 'ALCOHOL CETILICO', 'ALCOHOL', 33.6000, 1, 0.50, 0.70),
(37, '055', 'ESENCIA BRISA MARINA', 'B. MARINA', 28.4000, 1, 0.80, 2.00),
(38, '058', 'COLORANTE AZUL', 'COLOR AZUL', 3.0000, 1, 3.00, 5.00),
(39, '100', 'AGUA', 'AGUA DE PRODUCCION', 77.8000, 1, 0.15, 0.35),
(40, '037', 'SAL', 'sal - sodio', 128.8000, 1, 0.35, 0.60),
(41, '038', 'Color', 'Color verde', 39.9940, 1, 0.60, 1.00);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_produc`
--

CREATE TABLE `inventario_produc` (
  `id_inventario_produc` int(11) NOT NULL,
  `codigo` varchar(20) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descrip` text NOT NULL,
  `cantidad` double(8,2) NOT NULL,
  `cantidad_presenta` double(8,2) NOT NULL,
  `precio` double(8,2) NOT NULL,
  `id_empaque` int(11) NOT NULL,
  `id_unidad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_produccion`
--

CREATE TABLE `orden_produccion` (
  `id_orden_produccion` int(11) NOT NULL,
  `num_orden` int(11) NOT NULL,
  `num_lote` int(11) NOT NULL,
  `id_recetas` int(11) NOT NULL,
  `tamano_lote` double(8,2) NOT NULL,
  `unidad` varchar(15) NOT NULL,
  `fecha` date NOT NULL,
  `rendimiento_lote` double(8,2) NOT NULL,
  `tope_rendi_lote` double(8,2) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `orden_produccion`
--

INSERT INTO `orden_produccion` (`id_orden_produccion`, `num_orden`, `num_lote`, `id_recetas`, `tamano_lote`, `unidad`, `fecha`, `rendimiento_lote`, `tope_rendi_lote`, `id_empleados`) VALUES
(9, 1, 1, 5, 100.00, 'Litro', '2020-11-30', 0.00, 0.00, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recetas`
--

CREATE TABLE `recetas` (
  `id_recetas` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `descrip` text NOT NULL,
  `tamano` double(8,2) NOT NULL,
  `id_unidad` int(11) NOT NULL,
  `fecha` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `recetas`
--

INSERT INTO `recetas` (`id_recetas`, `nombre`, `descrip`, `tamano`, `id_unidad`, `fecha`) VALUES
(5, 'Brillo Panel', 'Biillo de interior de carros', 100.00, 2, '2020-11-28'),
(6, 'Shampoo de carro', 'Shampoo para carros', 200.00, 2, '2020-11-28');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_pago`
--

CREATE TABLE `tipo_pago` (
  `id_tipo_pago` int(11) NOT NULL,
  `descrip` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tipo_pago`
--

INSERT INTO `tipo_pago` (`id_tipo_pago`, `descrip`) VALUES
(1, 'Efectivo'),
(2, 'Credito');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE `unidad` (
  `id_unidad` int(11) NOT NULL,
  `descrip` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`id_unidad`, `descrip`) VALUES
(1, 'Kilo'),
(2, 'Litro'),
(3, 'Gramo'),
(4, 'Galon'),
(5, 'Garrafon'),
(6, 'Tanque'),
(7, 'Mililitro');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuarios` int(11) NOT NULL,
  `usuario` varchar(25) NOT NULL,
  `clave` varchar(25) NOT NULL,
  `id_empleados` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id_usuarios`, `usuario`, `clave`, `id_empleados`) VALUES
(1, 'admin', 'admin', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `abonar_pago`
--
ALTER TABLE `abonar_pago`
  ADD PRIMARY KEY (`id_abonar_pago`),
  ADD KEY `id_control_pagos` (`id_control_pagos`),
  ADD KEY `id_empleados` (`id_empleados`);

--
-- Indices de la tabla `cargos`
--
ALTER TABLE `cargos`
  ADD PRIMARY KEY (`id_cargos`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id_clientes`),
  ADD KEY `id_empleados` (`id_empleados`);

--
-- Indices de la tabla `control_pagos`
--
ALTER TABLE `control_pagos`
  ADD PRIMARY KEY (`id_control_pagos`);

--
-- Indices de la tabla `detalle_factu_mp`
--
ALTER TABLE `detalle_factu_mp`
  ADD PRIMARY KEY (`id_detalle_factu_mp`),
  ADD KEY `id_factura_mp` (`id_factura_mp`),
  ADD KEY `id_inventario_mp` (`id_inventario_mp`);

--
-- Indices de la tabla `detalle_factu_produc`
--
ALTER TABLE `detalle_factu_produc`
  ADD PRIMARY KEY (`id_detalle_factu_produc`),
  ADD KEY `id_factura_productos` (`id_factura_productos`),
  ADD KEY `id_inventario_produc` (`id_inventario_produc`) USING BTREE;

--
-- Indices de la tabla `detalle_inv_insumos`
--
ALTER TABLE `detalle_inv_insumos`
  ADD PRIMARY KEY (`id_detalle_inv_insumos`),
  ADD KEY `id_inventario_insumo` (`id_inventario_insumo`);

--
-- Indices de la tabla `detalle_inv_mp`
--
ALTER TABLE `detalle_inv_mp`
  ADD PRIMARY KEY (`id_detalle_inv_mp`),
  ADD KEY `id_inventario_mp` (`id_inventario_mp`);

--
-- Indices de la tabla `detalle_ordenp`
--
ALTER TABLE `detalle_ordenp`
  ADD PRIMARY KEY (`id_detalle_ordenp`),
  ADD KEY `id_inventario_mp` (`id_inventario_mp`),
  ADD KEY `id_orden_produccion` (`id_orden_produccion`);

--
-- Indices de la tabla `detalle_prod_orden`
--
ALTER TABLE `detalle_prod_orden`
  ADD PRIMARY KEY (`id_detalle_prod_orden`),
  ADD KEY `id_orden_produccion` (`id_orden_produccion`),
  ADD KEY `id_inventario_produc` (`id_inventario_produc`) USING BTREE;

--
-- Indices de la tabla `detalle_receta`
--
ALTER TABLE `detalle_receta`
  ADD PRIMARY KEY (`id_detalle_receta`),
  ADD KEY `id_unidad` (`id_unidad`),
  ADD KEY `id_receta` (`id_recetas`);

--
-- Indices de la tabla `empaque`
--
ALTER TABLE `empaque`
  ADD PRIMARY KEY (`id_empaque`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id_empleados`),
  ADD KEY `id_cargo` (`id_cargos`);

--
-- Indices de la tabla `factura_mp`
--
ALTER TABLE `factura_mp`
  ADD PRIMARY KEY (`id_factura_mp`),
  ADD KEY `id_clientes` (`id_clientes`),
  ADD KEY `id_empleados` (`id_empleados`),
  ADD KEY `id_tipo_pago` (`id_tipo_pago`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `factura_productos`
--
ALTER TABLE `factura_productos`
  ADD PRIMARY KEY (`id_factura_productos`),
  ADD KEY `id_clientes` (`id_clientes`),
  ADD KEY `id_empleados` (`id_empleados`),
  ADD KEY `id_tipo_pago` (`id_tipo_pago`),
  ADD KEY `vendedor` (`vendedor`);

--
-- Indices de la tabla `inventario_insumo`
--
ALTER TABLE `inventario_insumo`
  ADD PRIMARY KEY (`id_inventario_insumo`),
  ADD KEY `id_empaque` (`id_empaque`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indices de la tabla `inventario_mp`
--
ALTER TABLE `inventario_mp`
  ADD PRIMARY KEY (`id_inventario_mp`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indices de la tabla `inventario_produc`
--
ALTER TABLE `inventario_produc`
  ADD PRIMARY KEY (`id_inventario_produc`),
  ADD KEY `id_empaque` (`id_empaque`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indices de la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  ADD PRIMARY KEY (`id_orden_produccion`),
  ADD KEY `id_recetas` (`id_recetas`),
  ADD KEY `id_empleados` (`id_empleados`) USING BTREE;

--
-- Indices de la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD PRIMARY KEY (`id_recetas`),
  ADD KEY `id_unidad` (`id_unidad`);

--
-- Indices de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  ADD PRIMARY KEY (`id_tipo_pago`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
  ADD PRIMARY KEY (`id_unidad`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuarios`),
  ADD KEY `id_empleados` (`id_empleados`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `abonar_pago`
--
ALTER TABLE `abonar_pago`
  MODIFY `id_abonar_pago` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `cargos`
--
ALTER TABLE `cargos`
  MODIFY `id_cargos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id_clientes` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de la tabla `control_pagos`
--
ALTER TABLE `control_pagos`
  MODIFY `id_control_pagos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factu_mp`
--
ALTER TABLE `detalle_factu_mp`
  MODIFY `id_detalle_factu_mp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_factu_produc`
--
ALTER TABLE `detalle_factu_produc`
  MODIFY `id_detalle_factu_produc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_inv_insumos`
--
ALTER TABLE `detalle_inv_insumos`
  MODIFY `id_detalle_inv_insumos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `detalle_inv_mp`
--
ALTER TABLE `detalle_inv_mp`
  MODIFY `id_detalle_inv_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `detalle_ordenp`
--
ALTER TABLE `detalle_ordenp`
  MODIFY `id_detalle_ordenp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=110;

--
-- AUTO_INCREMENT de la tabla `detalle_prod_orden`
--
ALTER TABLE `detalle_prod_orden`
  MODIFY `id_detalle_prod_orden` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `detalle_receta`
--
ALTER TABLE `detalle_receta`
  MODIFY `id_detalle_receta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=102;

--
-- AUTO_INCREMENT de la tabla `empaque`
--
ALTER TABLE `empaque`
  MODIFY `id_empaque` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id_empleados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `factura_mp`
--
ALTER TABLE `factura_mp`
  MODIFY `id_factura_mp` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura_productos`
--
ALTER TABLE `factura_productos`
  MODIFY `id_factura_productos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `inventario_insumo`
--
ALTER TABLE `inventario_insumo`
  MODIFY `id_inventario_insumo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `inventario_mp`
--
ALTER TABLE `inventario_mp`
  MODIFY `id_inventario_mp` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT de la tabla `inventario_produc`
--
ALTER TABLE `inventario_produc`
  MODIFY `id_inventario_produc` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  MODIFY `id_orden_produccion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `recetas`
--
ALTER TABLE `recetas`
  MODIFY `id_recetas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `tipo_pago`
--
ALTER TABLE `tipo_pago`
  MODIFY `id_tipo_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
  MODIFY `id_unidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuarios` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_ibfk_1` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`);

--
-- Filtros para la tabla `detalle_factu_mp`
--
ALTER TABLE `detalle_factu_mp`
  ADD CONSTRAINT `detalle_factu_mp_ibfk_1` FOREIGN KEY (`id_factura_mp`) REFERENCES `factura_mp` (`id_factura_mp`),
  ADD CONSTRAINT `detalle_factu_mp_ibfk_2` FOREIGN KEY (`id_inventario_mp`) REFERENCES `inventario_mp` (`id_inventario_mp`);

--
-- Filtros para la tabla `detalle_factu_produc`
--
ALTER TABLE `detalle_factu_produc`
  ADD CONSTRAINT `detalle_factu_produc_ibfk_1` FOREIGN KEY (`id_inventario_produc`) REFERENCES `inventario_produc` (`id_inventario_produc`),
  ADD CONSTRAINT `detalle_factu_produc_ibfk_2` FOREIGN KEY (`id_factura_productos`) REFERENCES `factura_productos` (`id_factura_productos`);

--
-- Filtros para la tabla `detalle_inv_insumos`
--
ALTER TABLE `detalle_inv_insumos`
  ADD CONSTRAINT `detalle_inv_insumos_ibfk_1` FOREIGN KEY (`id_inventario_insumo`) REFERENCES `inventario_insumo` (`id_inventario_insumo`);

--
-- Filtros para la tabla `detalle_inv_mp`
--
ALTER TABLE `detalle_inv_mp`
  ADD CONSTRAINT `detalle_inv_mp_ibfk_1` FOREIGN KEY (`id_inventario_mp`) REFERENCES `inventario_mp` (`id_inventario_mp`);

--
-- Filtros para la tabla `detalle_ordenp`
--
ALTER TABLE `detalle_ordenp`
  ADD CONSTRAINT `detalle_ordenp_ibfk_1` FOREIGN KEY (`id_orden_produccion`) REFERENCES `orden_produccion` (`id_orden_produccion`),
  ADD CONSTRAINT `detalle_ordenp_ibfk_2` FOREIGN KEY (`id_inventario_mp`) REFERENCES `inventario_mp` (`id_inventario_mp`);

--
-- Filtros para la tabla `detalle_prod_orden`
--
ALTER TABLE `detalle_prod_orden`
  ADD CONSTRAINT `detalle_prod_orden_ibfk_1` FOREIGN KEY (`id_inventario_produc`) REFERENCES `inventario_produc` (`id_inventario_produc`),
  ADD CONSTRAINT `detalle_prod_orden_ibfk_2` FOREIGN KEY (`id_orden_produccion`) REFERENCES `orden_produccion` (`id_orden_produccion`);

--
-- Filtros para la tabla `detalle_receta`
--
ALTER TABLE `detalle_receta`
  ADD CONSTRAINT `detalle_receta_ibfk_1` FOREIGN KEY (`id_recetas`) REFERENCES `recetas` (`id_recetas`),
  ADD CONSTRAINT `detalle_receta_ibfk_2` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`);

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_ibfk_2` FOREIGN KEY (`id_cargos`) REFERENCES `cargos` (`id_cargos`);

--
-- Filtros para la tabla `factura_mp`
--
ALTER TABLE `factura_mp`
  ADD CONSTRAINT `factura_mp_ibfk_1` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`),
  ADD CONSTRAINT `factura_mp_ibfk_2` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`),
  ADD CONSTRAINT `factura_mp_ibfk_3` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipo_pago` (`id_tipo_pago`);

--
-- Filtros para la tabla `factura_productos`
--
ALTER TABLE `factura_productos`
  ADD CONSTRAINT `factura_productos_ibfk_1` FOREIGN KEY (`id_tipo_pago`) REFERENCES `tipo_pago` (`id_tipo_pago`),
  ADD CONSTRAINT `factura_productos_ibfk_2` FOREIGN KEY (`id_clientes`) REFERENCES `clientes` (`id_clientes`),
  ADD CONSTRAINT `factura_productos_ibfk_3` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`);

--
-- Filtros para la tabla `inventario_insumo`
--
ALTER TABLE `inventario_insumo`
  ADD CONSTRAINT `inventario_insumo_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `inventario_insumo_ibfk_2` FOREIGN KEY (`id_empaque`) REFERENCES `empaque` (`id_empaque`);

--
-- Filtros para la tabla `inventario_mp`
--
ALTER TABLE `inventario_mp`
  ADD CONSTRAINT `inventario_mp_ibfk_2` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`);

--
-- Filtros para la tabla `inventario_produc`
--
ALTER TABLE `inventario_produc`
  ADD CONSTRAINT `inventario_produc_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`),
  ADD CONSTRAINT `inventario_produc_ibfk_2` FOREIGN KEY (`id_empaque`) REFERENCES `empaque` (`id_empaque`);

--
-- Filtros para la tabla `orden_produccion`
--
ALTER TABLE `orden_produccion`
  ADD CONSTRAINT `orden_produccion_ibfk_1` FOREIGN KEY (`id_recetas`) REFERENCES `recetas` (`id_recetas`),
  ADD CONSTRAINT `orden_produccion_ibfk_2` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`);

--
-- Filtros para la tabla `recetas`
--
ALTER TABLE `recetas`
  ADD CONSTRAINT `recetas_ibfk_1` FOREIGN KEY (`id_unidad`) REFERENCES `unidad` (`id_unidad`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`id_empleados`) REFERENCES `empleados` (`id_empleados`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
