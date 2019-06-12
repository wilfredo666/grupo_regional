-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-06-2019 a las 22:20:23
-- Versión del servidor: 10.1.26-MariaDB
-- Versión de PHP: 7.0.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo_regional`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costos`
--

CREATE TABLE `centro_costos` (
  `id_centro_costos` int(11) NOT NULL,
  `prefijo` int(11) NOT NULL,
  `grupo` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centro_costos`
--

INSERT INTO `centro_costos` (`id_centro_costos`, `prefijo`, `grupo`) VALUES
(1, 400, 'GERENCIA DE OPERACIONES'),
(2, 410, 'JEFATURA DE EVENTOS Y ATL CBBA'),
(6, 420, 'JEFATURA DE EVENTOS Y BTL CBBA'),
(11, 430, 'TALLER REGIONAL CBBA'),
(12, 230, 'TALLER REGIONAL SCZ'),
(13, 330, 'TALLER REGIONAL LPZ'),
(19, 210, 'JEFATURA DE EVENTOS Y ATL SCZ'),
(20, 310, 'JEFATURA DE EVENTOS Y ATL LPZ'),
(21, 220, 'JEFATURA DE EVENTOS Y BTL SCZ'),
(22, 320, 'JEFATURA DE EVENTOS Y BTL LPZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `centro_costos_interno`
--

CREATE TABLE `centro_costos_interno` (
  `id_centro_costos_interno` int(11) NOT NULL,
  `codigo` varchar(10) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `centro_costos_interno`
--

INSERT INTO `centro_costos_interno` (`id_centro_costos_interno`, `codigo`, `descripcion`) VALUES
(1, '1000000000', 'GERENCIA GENERAL'),
(2, '1010000000', 'COORDINADOR REGIONAL CBBA'),
(3, '1020000000', 'COORDINADOR REGIONAL SCZ'),
(4, '1030000000', 'COORDINADOR REGIONAL LPZ'),
(5, '1100000000', 'GERENCIA ADMINISTRATIVA FINANCIERA'),
(6, '1110000000', 'JEFATURA DE PLANIFICACION Y CONTROL'),
(7, '1120000000', 'JEFATURA DE CONTABILIDAD'),
(8, '1130000000', 'JEFATURA DE GESTION HUMANA'),
(9, '1200000000', 'GERENCIA DE COMERCIALIZACION'),
(10, '1210000000', 'COORDINADOR COMERCIAL CBBA'),
(11, '1220000000', 'COORDINADOR COMERCIAL SCZ'),
(12, '1230000000', 'COORDINADOR COMERCIAL LPZ'),
(13, '2000000000', 'GERENCIA OPERACIONES SCZ'),
(14, '2100000000', 'JEFATURA REGIONAL SCZ'),
(15, '2110000000', 'EJECUTIVO DE CUENTAS REGIONAL SCZ'),
(16, '2300000000', 'JEFATURA TALLER REGIONAL SCZ'),
(17, '2310000000', 'TALLER REGIONAL SCZ'),
(18, '3000000000', 'GERENCIA OPERACIONES LPZ'),
(19, '3100000000', 'JEFATURA REGIONAL LPZ'),
(20, '3110000000', 'EJECUTIVO DE CUENTAS REGIONAL LPZ'),
(21, '3300000000', 'JEFATURA TALLER REGIONAL LPZ'),
(22, '3310000000', 'TALLER REGIONAL LPZ'),
(23, '4000000000', 'GERENCIA DE OPERACIONES CBBA'),
(24, '4100000000', 'JEFATURA REGIONAL CBBA'),
(25, '4110000000', 'EJECUTIVO DE CUENTAS REGIONAL CBBA'),
(26, '4300000000', 'JEFATURA TALLER REGIONAL CBBA'),
(27, '4310000000', 'TALLER REGIONAL CBBA'),
(28, '6000000000', 'CUENTA TRANSITORIA'),
(29, '7000000000', 'GASTOS FINANCIEROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudad`
--

CREATE TABLE `ciudad` (
  `id_ciudad` int(11) NOT NULL,
  `nom_ciudad` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `ciudad`
--

INSERT INTO `ciudad` (`id_ciudad`, `nom_ciudad`) VALUES
(1, 'COCHABAMBA'),
(2, 'SANTA CRUZ'),
(3, 'LA PAZ'),
(4, 'EJE TRONCAL'),
(5, 'CBBA-SCZ'),
(6, 'CBBA-LP'),
(7, 'SCZ-LP'),
(8, 'OTROS');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `codigo` varchar(3) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `dias_credito` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo`, `nombre`, `dias_credito`) VALUES
('01', 'TIGO', 30),
('02', 'UNILEVER', 30),
('04', 'KIMBERLY', 30),
('08', 'UPAL', 0),
('09', 'CARMAX', 20),
('13', 'CBN', 120),
('16', 'SOFIA LTDA', 0),
('38', 'ARCOR', 0),
('63', 'ITACAMBA', 45),
('66', 'AIDISA BOLIVIA', 30),
('68', 'GLADIMAR', 0),
('72', 'HUAWEI', 30);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_implicitos_btl2`
--

CREATE TABLE `costos_implicitos_btl2` (
  `id_costos_implicitos` int(11) NOT NULL,
  `id_hoja_costos_btl2` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_indirectos_de_operaciones_taller`
--

CREATE TABLE `costos_indirectos_de_operaciones_taller` (
  `id_costos_indirectos` int(11) NOT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `costo_acumulado_programado` decimal(10,2) NOT NULL,
  `tasa_de_aplicacion` decimal(10,2) NOT NULL,
  `costo_programado_costos_indirectos` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_laborales_btl2`
--

CREATE TABLE `costos_laborales_btl2` (
  `id_costos_laborales` int(11) NOT NULL,
  `id_hoja_costos_btl2` int(11) NOT NULL,
  `segundo_aguinaldo` decimal(10,2) NOT NULL,
  `seguro_accidente` decimal(10,2) NOT NULL,
  `vacaciones` decimal(10,2) NOT NULL,
  `previcion_subcidio` decimal(10,2) NOT NULL,
  `previcion_deshaucio` decimal(10,2) NOT NULL,
  `bono_meta` decimal(10,2) NOT NULL,
  `bono_transporte` decimal(10,2) NOT NULL,
  `bono_antiguedad` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_proyecto_btl`
--

CREATE TABLE `costos_proyecto_btl` (
  `id_costos_proyecto` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `acumulado_programado` decimal(10,2) NOT NULL,
  `tasa_aplicacion` decimal(10,2) NOT NULL,
  `programado_costos_indirectos` decimal(10,2) NOT NULL,
  `tiempo_programado` decimal(10,2) NOT NULL,
  `tasa_financiera` decimal(10,2) NOT NULL,
  `programado_financiero` decimal(10,2) NOT NULL,
  `fee_programado` decimal(10,2) NOT NULL,
  `fee_variable` decimal(10,2) NOT NULL,
  `costo_total_proyecto` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `total_proyecto_mas_fee` decimal(10,2) NOT NULL,
  `total_proyecto_mas_impuesto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_proyecto_btl2`
--

CREATE TABLE `costos_proyecto_btl2` (
  `id_costos_proyecto` int(11) NOT NULL,
  `id_hoja_costos` int(11) NOT NULL,
  `acumulado_programado` decimal(10,2) NOT NULL,
  `tasa_aplicacion` decimal(10,2) NOT NULL,
  `total_costo_indirecto` decimal(10,2) NOT NULL,
  `tiempo_programado` int(11) NOT NULL,
  `tasa_financiera` decimal(10,2) NOT NULL,
  `total_programado_financiero` decimal(10,2) NOT NULL,
  `costo_total_proyecto` decimal(10,2) NOT NULL,
  `fee_programado` decimal(10,2) NOT NULL,
  `total_proyecto_mas_fee` decimal(10,2) NOT NULL,
  `total_proyecto_mas_impuestos` decimal(10,2) NOT NULL,
  `total_personal` decimal(10,2) NOT NULL,
  `total_materiales_servicios` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_totales_atl`
--

CREATE TABLE `costos_totales_atl` (
  `id_costos_totales` int(11) NOT NULL,
  `id_hoja_costos_atl` int(11) NOT NULL,
  `total_item` decimal(10,2) NOT NULL,
  `tasa_aplicacion` decimal(10,2) NOT NULL,
  `costo_indirecto` decimal(10,2) NOT NULL,
  `tiempo_programado` int(5) NOT NULL,
  `tasa_financiera` decimal(10,3) NOT NULL,
  `costo_financiero` decimal(10,2) NOT NULL,
  `total_sin_fee` decimal(10,2) NOT NULL,
  `fee` decimal(10,2) NOT NULL,
  `fee_cot_sin_fee` decimal(10,2) NOT NULL,
  `cotizacion_cliente` decimal(10,2) NOT NULL,
  `diferencia` decimal(10,2) NOT NULL,
  `costo_proyecto` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `costos_totales_atl`
--

INSERT INTO `costos_totales_atl` (`id_costos_totales`, `id_hoja_costos_atl`, `total_item`, `tasa_aplicacion`, `costo_indirecto`, `tiempo_programado`, `tasa_financiera`, `costo_financiero`, `total_sin_fee`, `fee`, `fee_cot_sin_fee`, `cotizacion_cliente`, `diferencia`, `costo_proyecto`) VALUES
(1, 9, '1020.00', '0.14', '142.80', 30, '0.050', '18.60', '1950.00', '10.00', '195.00', '2145.00', '597.93', '1547.07');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costos_totales_taller`
--

CREATE TABLE `costos_totales_taller` (
  `id_costos_totales` int(11) NOT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `costo_total_proyecto` decimal(10,2) NOT NULL,
  `fee_programado_proyecto` decimal(10,2) NOT NULL,
  `costo_proyecto_mas_fee` decimal(10,2) NOT NULL,
  `costo_total_proyecto_mas_impuestos` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `costo_financiero_taller`
--

CREATE TABLE `costo_financiero_taller` (
  `id_costo_financiero` int(11) DEFAULT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `tiempo_programado` int(5) NOT NULL,
  `tasa_financiera` decimal(10,2) NOT NULL,
  `costo_programado_financiero` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_laborales`
--

CREATE TABLE `datos_laborales` (
  `id_datos_laborales` int(11) NOT NULL,
  `ci_empleado` varchar(15) NOT NULL,
  `telefono_corporativo` int(11) NOT NULL,
  `correo_corporativo` varchar(100) NOT NULL,
  `cargo` varchar(100) NOT NULL,
  `afp_entidad` varchar(50) NOT NULL,
  `nua` int(11) NOT NULL,
  `cod_delta` int(11) NOT NULL,
  `sucursal` varchar(50) NOT NULL,
  `id_centro_costos` int(11) NOT NULL,
  `tipo_contrato` varchar(50) NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `fecha_retiro` date NOT NULL,
  `motivo` varchar(150) NOT NULL,
  `haber_basico` decimal(10,2) NOT NULL,
  `cuenta_bcp` varchar(30) NOT NULL,
  `cuenta_mercantil` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `datos_laborales`
--

INSERT INTO `datos_laborales` (`id_datos_laborales`, `ci_empleado`, `telefono_corporativo`, `correo_corporativo`, `cargo`, `afp_entidad`, `nua`, `cod_delta`, `sucursal`, `id_centro_costos`, `tipo_contrato`, `fecha_ingreso`, `fecha_retiro`, `motivo`, `haber_basico`, `cuenta_bcp`, `cuenta_mercantil`) VALUES
(1, '7904767', 0, 'sistemas@gruporegional.com', 'Encargado de sistemas', '', 0, 0, '', 0, '', '0000-00-00', '0000-00-00', '', '3151.25', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_ordencompra`
--

CREATE TABLE `detalle_ordencompra` (
  `id_detalle` int(11) NOT NULL,
  `id_ordenCompra` int(11) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `descripcion` varchar(100) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `documento` varchar(10) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `detalle_ordencompra`
--

INSERT INTO `detalle_ordencompra` (`id_detalle`, `id_ordenCompra`, `cantidad`, `descripcion`, `costo_unitario`, `documento`, `total`) VALUES
(10, 6, 1, 'Algo', '80.00', 'FACTURA', '80.00'),
(18, 13, 1, 'd', '100.00', 'FACTURA', '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `ci` varchar(15) NOT NULL,
  `expedido` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(30) NOT NULL,
  `direccion` varchar(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `telefono_fijo` int(11) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`ci`, `expedido`, `nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`, `sexo`, `estado_civil`, `fecha_nacimiento`, `nacionalidad`, `direccion`, `celular`, `telefono_fijo`, `correo_electronico`, `estado`) VALUES
('7904767', 'cochabamba', 'Wilfredo', '', 'Saez', 'Garcia', 'Masculino', 'Soltero', '1989-06-05', 'Boliviana', 'Calle Los Lirios #2048', 71446134, 4455454, 'wilfredosaez@hotmail.com', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos_materiales_btl2`
--

CREATE TABLE `equipos_materiales_btl2` (
  `id_materiales_equipos` int(11) NOT NULL,
  `id_hoja_costos_btl2` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_propio_atl`
--

CREATE TABLE `equipo_propio_atl` (
  `id_equipo_propio` int(11) NOT NULL,
  `id_hoja_costos_atl` int(11) NOT NULL,
  `descripcion_equipo` varchar(100) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL,
  `precio_cotizado_sin_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_propio_btl`
--

CREATE TABLE `equipo_propio_btl` (
  `id_equipo_propio` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipo_propio_taller`
--

CREATE TABLE `equipo_propio_taller` (
  `id_equipo_propio` int(11) NOT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `descripcion_equipo` varchar(50) NOT NULL,
  `area_servicio` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_costos_atl`
--

CREATE TABLE `hoja_costos_atl` (
  `id_hoja_costos` int(11) NOT NULL,
  `codigo_hoja_costos` varchar(10) CHARACTER SET utf8 NOT NULL,
  `cliente` varchar(3) CHARACTER SET utf8 NOT NULL,
  `correo_cliente` varchar(50) CHARACTER SET utf8 NOT NULL,
  `fecha_inicio` date NOT NULL,
  `tiempo_credito` int(11) NOT NULL,
  `nombre_proyecto` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo_proyecto` varchar(30) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `fecha_facturacion` date NOT NULL,
  `numero_factura` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_aprobacion` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hoja_costos_atl`
--

INSERT INTO `hoja_costos_atl` (`id_hoja_costos`, `codigo_hoja_costos`, `cliente`, `correo_cliente`, `fecha_inicio`, `tiempo_credito`, `nombre_proyecto`, `fecha_fin`, `tipo_proyecto`, `fecha_hora_creacion`, `id_usuario`, `estado`, `fecha_facturacion`, `numero_factura`, `fecha_aprobacion`) VALUES
(9, '4101010010', '01', 'unilever@correo.com', '2019-05-12', 30, 'prueba', '2019-05-14', 'EXTERNO', '2019-05-21 20:51:05', 3, 1, '2019-05-22', 'f-1254', '2019-05-12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_costos_btl`
--

CREATE TABLE `hoja_costos_btl` (
  `id_hoja_costos` int(11) NOT NULL,
  `codigo_hoja_costos` varchar(10) NOT NULL,
  `cliente` varchar(3) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `tiempo_credito` int(11) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `nombre_proyecto` varchar(30) NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo_proyecto` varchar(30) NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_costos_btl2`
--

CREATE TABLE `hoja_costos_btl2` (
  `id_hoja_costos` int(11) NOT NULL,
  `cod_hoja_costos` varchar(10) NOT NULL,
  `cliente` varchar(3) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `total_meses` int(11) NOT NULL,
  `periodo_prueba` varchar(5) NOT NULL,
  `cargo` varchar(50) NOT NULL,
  `fecha_fin` date NOT NULL,
  `forma_pago` varchar(30) NOT NULL,
  `tiempo_pago` int(11) NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `hoja_costos_taller`
--

CREATE TABLE `hoja_costos_taller` (
  `id_hoja_costos` int(11) NOT NULL,
  `cod_hoja_costos_taller` varchar(10) NOT NULL,
  `cliente` varchar(3) NOT NULL,
  `correo_cliente` varchar(50) NOT NULL,
  `fecha_inicio` date NOT NULL,
  `tiempo_credito` int(11) NOT NULL,
  `nombre_proyecto` varchar(30) NOT NULL,
  `fecha_fin` date NOT NULL,
  `tipo_proyecto` varchar(30) NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `id_usuario` int(11) NOT NULL,
  `estado` tinyint(1) NOT NULL,
  `ubicacion` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_atl`
--

CREATE TABLE `materiales_atl` (
  `id_materiales` int(11) NOT NULL,
  `id_hoja_costos_atl` int(11) NOT NULL,
  `descripcion_material` varchar(100) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `cantidad_estimada` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `costo_total_estimado` decimal(10,2) NOT NULL,
  `precio_cotizado_sin_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_btl`
--

CREATE TABLE `materiales_btl` (
  `id_materiales` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `unidad_medida` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `materiales_taller`
--

CREATE TABLE `materiales_taller` (
  `id_materiales_taller` int(11) NOT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `descripcion_material` varchar(50) NOT NULL,
  `nombre_proveedor` varchar(30) NOT NULL,
  `unidad_medida` varchar(20) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `costo_total_estimado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE `orden_compra` (
  `id_ordenCompra` int(11) NOT NULL,
  `cod_ordenCompra` varchar(30) NOT NULL,
  `id_proveedor` int(11) NOT NULL,
  `id_empleado` int(11) NOT NULL,
  `fecha_hora_creacion` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `dias_credito_oc` int(11) NOT NULL,
  `ciudad_oc` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `orden_compra`
--

INSERT INTO `orden_compra` (`id_ordenCompra`, `cod_ordenCompra`, `id_proveedor`, `id_empleado`, `fecha_hora_creacion`, `dias_credito_oc`, `ciudad_oc`) VALUES
(6, '1210000000', 1, 3, '2019-05-24 15:51:39', 25, 'CBBA'),
(13, '1000000000', 1, 3, '2019-05-24 20:52:05', 0, 'LPZ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_directo_atl`
--

CREATE TABLE `personal_directo_atl` (
  `id_personal_directo` int(11) NOT NULL,
  `id_hoja_costos_atl` int(11) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  `nombre_personal` varchar(30) NOT NULL,
  `tiempo` varchar(10) NOT NULL,
  `tiempo_programado` int(5) NOT NULL,
  `cantidad_personas` int(5) NOT NULL,
  `tasa_presupuestaria` decimal(10,2) NOT NULL,
  `costo_total_programado` decimal(10,2) NOT NULL,
  `precio_cotizado_sin_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `personal_directo_atl`
--

INSERT INTO `personal_directo_atl` (`id_personal_directo`, `id_hoja_costos_atl`, `detalle`, `nombre_personal`, `tiempo`, `tiempo_programado`, `cantidad_personas`, `tasa_presupuestaria`, `costo_total_programado`, `precio_cotizado_sin_fee`) VALUES
(15, 9, 'SOPORTE LOGISTICO', 'b', 'DIAS', 2, 2, '208.00', '832.00', '1500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_directo_taller`
--

CREATE TABLE `personal_directo_taller` (
  `id_personal_directo` int(11) NOT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  `tiempo` varchar(10) NOT NULL,
  `tiempo_programado` int(5) NOT NULL,
  `cantidad_personas` int(5) NOT NULL,
  `tasa_presupuestaria` decimal(10,2) NOT NULL,
  `costo_total_programado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_externo_directo_btl`
--

CREATE TABLE `personal_externo_directo_btl` (
  `id_personal_externo` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  `cant_personas` int(5) NOT NULL,
  `cant_activaciones` int(5) NOT NULL,
  `pago_activacion` decimal(10,2) NOT NULL,
  `ubicacion` varchar(20) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_interno_directo_btl`
--

CREATE TABLE `personal_interno_directo_btl` (
  `id_personal_interno` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(30) NOT NULL,
  `tiempo` varchar(10) NOT NULL,
  `tiempo_programado` int(5) NOT NULL,
  `cantidad_personas` int(5) NOT NULL,
  `tasa_presupuestaria` decimal(10,2) NOT NULL,
  `costo_total_programado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_proyecto_btl2`
--

CREATE TABLE `personal_proyecto_btl2` (
  `id_personal_proyecto` int(11) NOT NULL,
  `id_hoja_costos_btl2` int(11) NOT NULL,
  `ciudad` varchar(30) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `liquido_ganado` decimal(10,2) NOT NULL,
  `mas_cargas_sociales` decimal(10,2) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_propios_btl`
--

CREATE TABLE `productos_propios_btl` (
  `id_producto_propio` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `unidad_medida` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_propio_taller_atl`
--

CREATE TABLE `producto_propio_taller_atl` (
  `id_producto_propio_taller` int(11) NOT NULL,
  `id_hoja_costos_atl` int(11) NOT NULL,
  `descripcion_producto` varchar(100) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL,
  `precio_cotizado_sin_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_propio_taller_atl`
--

INSERT INTO `producto_propio_taller_atl` (`id_producto_propio_taller`, `id_hoja_costos_atl`, `descripcion_producto`, `cantidad`, `costo_unitario`, `costo_total`, `precio_cotizado_sin_fee`) VALUES
(5, 9, 'roler', 1, '20.00', '20.00', '0.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedor`
--

CREATE TABLE `proveedor` (
  `id_proveedor` int(11) NOT NULL,
  `nombre` varchar(50) NOT NULL,
  `nit` varchar(30) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `num_contactos` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proveedor`
--

INSERT INTO `proveedor` (`id_proveedor`, `nombre`, `nit`, `direccion`, `num_contactos`, `estado`) VALUES
(1, 'CHURRASQUERIA LAS BRASAS', '2860986018', 'Av. Melchor Urquidi', '71747540', 1),
(2, 'ACRICOLOR GRAFICA S.R.L.', '166208027', 'Av. Blanco Galindo Esq. Beijing Edif. Ribepar', '4-4425976', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_btl`
--

CREATE TABLE `servicios_btl` (
  `id_servicios` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `proveedor` varchar(50) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_btl2`
--

CREATE TABLE `servicios_btl2` (
  `id_servicios` int(11) NOT NULL,
  `id_hoja_costos_btl2` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `sub_total` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(20) NOT NULL,
  `total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_contratados_atl`
--

CREATE TABLE `servicios_contratados_atl` (
  `id_servicios_contratados` int(11) NOT NULL,
  `id_hoja_costos_atl` int(11) NOT NULL,
  `descripcion_servicios` varchar(100) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `tiempo` varchar(30) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `costo_total_programado` decimal(10,2) NOT NULL,
  `precio_cotizado_sin_fee` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `servicios_contratados_atl`
--

INSERT INTO `servicios_contratados_atl` (`id_servicios_contratados`, `id_hoja_costos_atl`, `descripcion_servicios`, `nombre_proveedor`, `tiempo`, `cantidad`, `costo_unitario`, `tipo_documento`, `costo_total_programado`, `precio_cotizado_sin_fee`) VALUES
(12, 9, 'a', 'b', '1', 2, '252.00', 'FACTURA', '438.48', '600.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_contratados_taller`
--

CREATE TABLE `servicios_contratados_taller` (
  `id_servicios_contratados` int(11) NOT NULL,
  `id_hoja_costos_taller` int(11) NOT NULL,
  `descripcion_servicios` varchar(50) NOT NULL,
  `nombre_proveedor` varchar(50) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `tipo_documento` varchar(30) NOT NULL,
  `costo_total_programado` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios_propios_btl`
--

CREATE TABLE `servicios_propios_btl` (
  `id_servicios_propios` int(11) NOT NULL,
  `id_hoja_costos_btl` int(11) NOT NULL,
  `detalle` varchar(50) NOT NULL,
  `cantidad` int(5) NOT NULL,
  `costo_unitario` decimal(10,2) NOT NULL,
  `costo_total` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `ci_empleado` varchar(15) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `ci_empleado`, `nombre_usuario`, `clave`, `nivel`) VALUES
(3, '7904767', 'administrador', 'admin123', 'Administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `centro_costos`
--
ALTER TABLE `centro_costos`
  ADD PRIMARY KEY (`id_centro_costos`);

--
-- Indices de la tabla `centro_costos_interno`
--
ALTER TABLE `centro_costos_interno`
  ADD PRIMARY KEY (`id_centro_costos_interno`);

--
-- Indices de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  ADD PRIMARY KEY (`id_ciudad`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`codigo`);

--
-- Indices de la tabla `costos_implicitos_btl2`
--
ALTER TABLE `costos_implicitos_btl2`
  ADD PRIMARY KEY (`id_costos_implicitos`);

--
-- Indices de la tabla `costos_indirectos_de_operaciones_taller`
--
ALTER TABLE `costos_indirectos_de_operaciones_taller`
  ADD PRIMARY KEY (`id_costos_indirectos`);

--
-- Indices de la tabla `costos_laborales_btl2`
--
ALTER TABLE `costos_laborales_btl2`
  ADD PRIMARY KEY (`id_costos_laborales`);

--
-- Indices de la tabla `costos_proyecto_btl`
--
ALTER TABLE `costos_proyecto_btl`
  ADD PRIMARY KEY (`id_costos_proyecto`);

--
-- Indices de la tabla `costos_proyecto_btl2`
--
ALTER TABLE `costos_proyecto_btl2`
  ADD PRIMARY KEY (`id_costos_proyecto`);

--
-- Indices de la tabla `costos_totales_atl`
--
ALTER TABLE `costos_totales_atl`
  ADD PRIMARY KEY (`id_costos_totales`),
  ADD KEY `id_hoja_costos_atl` (`id_hoja_costos_atl`);

--
-- Indices de la tabla `costos_totales_taller`
--
ALTER TABLE `costos_totales_taller`
  ADD PRIMARY KEY (`id_costos_totales`);

--
-- Indices de la tabla `datos_laborales`
--
ALTER TABLE `datos_laborales`
  ADD PRIMARY KEY (`id_datos_laborales`),
  ADD KEY `ci_empleado` (`ci_empleado`);

--
-- Indices de la tabla `detalle_ordencompra`
--
ALTER TABLE `detalle_ordencompra`
  ADD PRIMARY KEY (`id_detalle`),
  ADD KEY `id_ordenCompra` (`id_ordenCompra`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`ci`);

--
-- Indices de la tabla `equipos_materiales_btl2`
--
ALTER TABLE `equipos_materiales_btl2`
  ADD PRIMARY KEY (`id_materiales_equipos`);

--
-- Indices de la tabla `equipo_propio_atl`
--
ALTER TABLE `equipo_propio_atl`
  ADD PRIMARY KEY (`id_equipo_propio`),
  ADD KEY `id_hoja_costos_atl` (`id_hoja_costos_atl`);

--
-- Indices de la tabla `equipo_propio_btl`
--
ALTER TABLE `equipo_propio_btl`
  ADD PRIMARY KEY (`id_equipo_propio`);

--
-- Indices de la tabla `equipo_propio_taller`
--
ALTER TABLE `equipo_propio_taller`
  ADD PRIMARY KEY (`id_equipo_propio`),
  ADD KEY `id_hoja_costos_taller_2` (`id_hoja_costos_taller`);

--
-- Indices de la tabla `hoja_costos_atl`
--
ALTER TABLE `hoja_costos_atl`
  ADD PRIMARY KEY (`id_hoja_costos`),
  ADD KEY `cliente` (`cliente`),
  ADD KEY `empleado_ci` (`id_usuario`);

--
-- Indices de la tabla `hoja_costos_btl`
--
ALTER TABLE `hoja_costos_btl`
  ADD PRIMARY KEY (`id_hoja_costos`);

--
-- Indices de la tabla `hoja_costos_btl2`
--
ALTER TABLE `hoja_costos_btl2`
  ADD PRIMARY KEY (`id_hoja_costos`);

--
-- Indices de la tabla `hoja_costos_taller`
--
ALTER TABLE `hoja_costos_taller`
  ADD PRIMARY KEY (`id_hoja_costos`);

--
-- Indices de la tabla `materiales_atl`
--
ALTER TABLE `materiales_atl`
  ADD PRIMARY KEY (`id_materiales`),
  ADD KEY `id_hoja_costos_atl` (`id_hoja_costos_atl`);

--
-- Indices de la tabla `materiales_btl`
--
ALTER TABLE `materiales_btl`
  ADD PRIMARY KEY (`id_materiales`);

--
-- Indices de la tabla `materiales_taller`
--
ALTER TABLE `materiales_taller`
  ADD PRIMARY KEY (`id_materiales_taller`);

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`id_ordenCompra`),
  ADD KEY `id_empleado` (`id_empleado`),
  ADD KEY `id_proveedor` (`id_proveedor`);

--
-- Indices de la tabla `personal_directo_atl`
--
ALTER TABLE `personal_directo_atl`
  ADD PRIMARY KEY (`id_personal_directo`),
  ADD KEY `cod_hoja_costos_atl` (`id_hoja_costos_atl`);

--
-- Indices de la tabla `personal_directo_taller`
--
ALTER TABLE `personal_directo_taller`
  ADD PRIMARY KEY (`id_personal_directo`);

--
-- Indices de la tabla `personal_externo_directo_btl`
--
ALTER TABLE `personal_externo_directo_btl`
  ADD PRIMARY KEY (`id_personal_externo`);

--
-- Indices de la tabla `personal_interno_directo_btl`
--
ALTER TABLE `personal_interno_directo_btl`
  ADD PRIMARY KEY (`id_personal_interno`);

--
-- Indices de la tabla `producto_propio_taller_atl`
--
ALTER TABLE `producto_propio_taller_atl`
  ADD PRIMARY KEY (`id_producto_propio_taller`),
  ADD KEY `id_hoja_costos_atl` (`id_hoja_costos_atl`);

--
-- Indices de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  ADD PRIMARY KEY (`id_proveedor`);

--
-- Indices de la tabla `servicios_btl2`
--
ALTER TABLE `servicios_btl2`
  ADD PRIMARY KEY (`id_servicios`);

--
-- Indices de la tabla `servicios_contratados_atl`
--
ALTER TABLE `servicios_contratados_atl`
  ADD PRIMARY KEY (`id_servicios_contratados`),
  ADD KEY `id_hoja_costos_atl` (`id_hoja_costos_atl`);

--
-- Indices de la tabla `servicios_contratados_taller`
--
ALTER TABLE `servicios_contratados_taller`
  ADD PRIMARY KEY (`id_servicios_contratados`);

--
-- Indices de la tabla `servicios_propios_btl`
--
ALTER TABLE `servicios_propios_btl`
  ADD PRIMARY KEY (`id_servicios_propios`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `ci_empleado` (`ci_empleado`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centro_costos`
--
ALTER TABLE `centro_costos`
  MODIFY `id_centro_costos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `centro_costos_interno`
--
ALTER TABLE `centro_costos_interno`
  MODIFY `id_centro_costos_interno` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `costos_implicitos_btl2`
--
ALTER TABLE `costos_implicitos_btl2`
  MODIFY `id_costos_implicitos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costos_indirectos_de_operaciones_taller`
--
ALTER TABLE `costos_indirectos_de_operaciones_taller`
  MODIFY `id_costos_indirectos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costos_laborales_btl2`
--
ALTER TABLE `costos_laborales_btl2`
  MODIFY `id_costos_laborales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costos_proyecto_btl`
--
ALTER TABLE `costos_proyecto_btl`
  MODIFY `id_costos_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costos_proyecto_btl2`
--
ALTER TABLE `costos_proyecto_btl2`
  MODIFY `id_costos_proyecto` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `costos_totales_atl`
--
ALTER TABLE `costos_totales_atl`
  MODIFY `id_costos_totales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `costos_totales_taller`
--
ALTER TABLE `costos_totales_taller`
  MODIFY `id_costos_totales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `datos_laborales`
--
ALTER TABLE `datos_laborales`
  MODIFY `id_datos_laborales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `detalle_ordencompra`
--
ALTER TABLE `detalle_ordencompra`
  MODIFY `id_detalle` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `equipos_materiales_btl2`
--
ALTER TABLE `equipos_materiales_btl2`
  MODIFY `id_materiales_equipos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_propio_atl`
--
ALTER TABLE `equipo_propio_atl`
  MODIFY `id_equipo_propio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_propio_btl`
--
ALTER TABLE `equipo_propio_btl`
  MODIFY `id_equipo_propio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_propio_taller`
--
ALTER TABLE `equipo_propio_taller`
  MODIFY `id_equipo_propio` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoja_costos_atl`
--
ALTER TABLE `hoja_costos_atl`
  MODIFY `id_hoja_costos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `hoja_costos_btl`
--
ALTER TABLE `hoja_costos_btl`
  MODIFY `id_hoja_costos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoja_costos_btl2`
--
ALTER TABLE `hoja_costos_btl2`
  MODIFY `id_hoja_costos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `hoja_costos_taller`
--
ALTER TABLE `hoja_costos_taller`
  MODIFY `id_hoja_costos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales_atl`
--
ALTER TABLE `materiales_atl`
  MODIFY `id_materiales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales_btl`
--
ALTER TABLE `materiales_btl`
  MODIFY `id_materiales` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `materiales_taller`
--
ALTER TABLE `materiales_taller`
  MODIFY `id_materiales_taller` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `id_ordenCompra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `personal_directo_atl`
--
ALTER TABLE `personal_directo_atl`
  MODIFY `id_personal_directo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `personal_directo_taller`
--
ALTER TABLE `personal_directo_taller`
  MODIFY `id_personal_directo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_externo_directo_btl`
--
ALTER TABLE `personal_externo_directo_btl`
  MODIFY `id_personal_externo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_interno_directo_btl`
--
ALTER TABLE `personal_interno_directo_btl`
  MODIFY `id_personal_interno` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `producto_propio_taller_atl`
--
ALTER TABLE `producto_propio_taller_atl`
  MODIFY `id_producto_propio_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `proveedor`
--
ALTER TABLE `proveedor`
  MODIFY `id_proveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios_btl2`
--
ALTER TABLE `servicios_btl2`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios_contratados_atl`
--
ALTER TABLE `servicios_contratados_atl`
  MODIFY `id_servicios_contratados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `servicios_contratados_taller`
--
ALTER TABLE `servicios_contratados_taller`
  MODIFY `id_servicios_contratados` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios_propios_btl`
--
ALTER TABLE `servicios_propios_btl`
  MODIFY `id_servicios_propios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `costos_totales_atl`
--
ALTER TABLE `costos_totales_atl`
  ADD CONSTRAINT `costos_totales_atl_ibfk_1` FOREIGN KEY (`id_hoja_costos_atl`) REFERENCES `hoja_costos_atl` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `datos_laborales`
--
ALTER TABLE `datos_laborales`
  ADD CONSTRAINT `datos_laborales_ibfk_1` FOREIGN KEY (`ci_empleado`) REFERENCES `empleado` (`ci`);

--
-- Filtros para la tabla `detalle_ordencompra`
--
ALTER TABLE `detalle_ordencompra`
  ADD CONSTRAINT `detalle_ordencompra_ibfk_1` FOREIGN KEY (`id_ordenCompra`) REFERENCES `orden_compra` (`id_ordenCompra`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_propio_atl`
--
ALTER TABLE `equipo_propio_atl`
  ADD CONSTRAINT `equipo_propio_atl_ibfk_1` FOREIGN KEY (`id_hoja_costos_atl`) REFERENCES `hoja_costos_atl` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `equipo_propio_taller`
--
ALTER TABLE `equipo_propio_taller`
  ADD CONSTRAINT `equipo_propio_taller_ibfk_1` FOREIGN KEY (`id_hoja_costos_taller`) REFERENCES `hoja_costos_taller` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `hoja_costos_atl`
--
ALTER TABLE `hoja_costos_atl`
  ADD CONSTRAINT `hoja_costos_atl_ibfk_1` FOREIGN KEY (`cliente`) REFERENCES `cliente` (`codigo`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `hoja_costos_atl_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `materiales_atl`
--
ALTER TABLE `materiales_atl`
  ADD CONSTRAINT `materiales_atl_ibfk_1` FOREIGN KEY (`id_hoja_costos_atl`) REFERENCES `hoja_costos_atl` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD CONSTRAINT `orden_compra_ibfk_2` FOREIGN KEY (`id_proveedor`) REFERENCES `proveedor` (`id_proveedor`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `orden_compra_ibfk_3` FOREIGN KEY (`id_empleado`) REFERENCES `usuario` (`id_usuario`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Filtros para la tabla `personal_directo_atl`
--
ALTER TABLE `personal_directo_atl`
  ADD CONSTRAINT `personal_directo_atl_ibfk_1` FOREIGN KEY (`id_hoja_costos_atl`) REFERENCES `hoja_costos_atl` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `producto_propio_taller_atl`
--
ALTER TABLE `producto_propio_taller_atl`
  ADD CONSTRAINT `producto_propio_taller_atl_ibfk_1` FOREIGN KEY (`id_hoja_costos_atl`) REFERENCES `hoja_costos_atl` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `servicios_contratados_atl`
--
ALTER TABLE `servicios_contratados_atl`
  ADD CONSTRAINT `servicios_contratados_atl_ibfk_1` FOREIGN KEY (`id_hoja_costos_atl`) REFERENCES `hoja_costos_atl` (`id_hoja_costos`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `usuario_ibfk_1` FOREIGN KEY (`ci_empleado`) REFERENCES `empleado` (`ci`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
