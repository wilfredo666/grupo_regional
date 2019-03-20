-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 20-03-2019 a las 14:52:28
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
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`codigo`, `nombre`) VALUES
('01', 'TIGO'),
('02', 'UNILEVER'),
('03', 'MATADERO FRIGORIFICO SCZ S.A.'),
('04', 'KIMBERLY'),
('05', 'LUIS GUTIERREZ'),
('06', 'SERGIO ABASTOFLOR'),
('07', 'AGREGADOS GERARDO/MIRIAM PARDO'),
('08', 'UPAL'),
('09', 'VG PRESENTACIONES'),
('10', 'COMERCIAL ITIENDA S.R.L.'),
('11', 'FEDERACION BOLIVIANA DE GOLF'),
('12', 'ENRRIQUE CAMACHO'),
('13', 'CBN'),
('14', 'IMCRUZ'),
('15', 'MARIO KISEN'),
('16', 'SOFIA LTDA'),
('17', 'ALICORP'),
('18', 'D&M'),
('19', 'WILSON'),
('20', 'COMERCIAL IPORRE'),
('21', 'MANJAR DE ORO'),
('22', 'MAD CENTER'),
('23', 'DAHER'),
('24', 'LA HERRADURA'),
('25', 'HIPERMARCAS'),
('26', 'PUBLICARTE'),
('27', 'SACI'),
('28', 'MADISA'),
('29', 'GUIDO SALVATIERRA ZABALA'),
('30', 'COMPANEX'),
('31', 'VADIKO'),
('32', 'ASTRIX'),
('33', 'EMSERSO'),
('34', 'IASA'),
('35', 'FAGAL'),
('36', 'FONDO DE LA COMUNIDAD'),
('37', 'BATA'),
('38', 'ARCOR'),
('39', 'ALEJANDRO BAKIR (BAGAPOS)'),
('40', 'PROYECTOS INMOBILIARIOS EL DORAL S.A.'),
('41', 'CIMAL'),
('42', 'IMCRUZ'),
('43', 'FACTORY'),
('44', 'JEFATURA ATL'),
('45', 'JEFATURA BTL'),
('46', ''),
('47', 'RELEVANT COMMS LTDA'),
('48', 'BNB'),
('49', 'RIVERO'),
('50', 'OLIVA'),
('51', 'BUGGY'),
('52', 'GALINDO'),
('53', 'EL CORTIJO'),
('54', 'ROJAS'),
('55', 'TROPICAL TOURS LTDA'),
('56', 'REMAX'),
('57', 'BCO. MERCANTIL SANTA CRUZ'),
('58', 'LINK GROUP'),
('59', 'TECHO'),
('60', 'FUMIMASTER'),
('61', ''),
('62', 'JUAN MERCADO'),
('63', 'ITACAMBA'),
('64', 'BIS OVERSEAS'),
('65', 'SIGMA'),
('66', 'AIDISA BOLIVIA'),
('67', 'HOTEL CBBA'),
('68', 'MASIVOS SRL'),
('69', 'ANGELA SANCHEZ'),
('70', 'BAT BOLIVIA S.A.'),
('71', 'DANIEL CHAIN'),
('72', 'HUAWEI'),
('73', 'AUTOKORP'),
('74', 'AGROINCO'),
('75', 'EXPOCRUZ'),
('76', 'PROTEC (JUAN HINOJOSA)'),
('77', 'TRIPLEX LTDA'),
('78', 'KENIA'),
('79', 'ALEJANDRO'),
('80', 'OPAL'),
('81', 'EMACRUZ (PATRICIO REYNALDO DESPUSE)'),
('82', 'INSTITUTO ARGENTINO (WALTER TELL)'),
('83', 'BCO. BISA'),
('84', 'COLEGIO DE ARQUITECTOS DE SANTA CRUZ'),
('85', 'CHINGA DECORACIONES S.R.L.'),
('86', 'PANCARTA'),
('87', 'METALTELA LTDA'),
('88', 'CODESUR / MINISTERIO DE DEPORTES'),
('89', 'FUTURO VIRTUAL'),
('90', 'EDUARDO OROZCO'),
('91', 'ADRIANA QUIROGA'),
('92', 'MARCELA MOLINA'),
('93', 'CARRASCO'),
('94', 'PELUQUERIA (PARTICULAR)'),
('95', 'KETAL'),
('96', 'LA OPTICA'),
('97', 'POLY PLAST S.R.L.'),
('98', 'BCO. PRODEM'),
('99', 'JOSE MARIA GALVAN');

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
  `costo_programado_proyecto` decimal(10,2) NOT NULL,
  `costo_estimado_proyecto` decimal(10,2) NOT NULL,
  `diferencia` decimal(10,2) NOT NULL,
  `costo_acumulado_programado` decimal(10,2) NOT NULL,
  `tas_apliacacion` decimal(10,2) NOT NULL,
  `costo_programado_costos_indirectos` decimal(10,2) NOT NULL,
  `tiempo_programado` int(5) NOT NULL,
  `tasa_fiannciera` decimal(10,2) NOT NULL,
  `total_programado_financiero` decimal(10,2) NOT NULL,
  `fee_programado` decimal(10,2) NOT NULL,
  `fee_variable` decimal(10,2) NOT NULL,
  `costo_total_proyecto_ejcutado` decimal(10,2) NOT NULL,
  `costo_total_proyecto_feevariable` decimal(10,2) NOT NULL,
  `fee_ejecutado` decimal(10,2) NOT NULL,
  `fee_feevariable` decimal(10,2) NOT NULL,
  `costo_total_proyecto_mas_feeejecutado` decimal(10,2) NOT NULL,
  `costo_total_proyecto_mas_impuestos_ejecutado` decimal(10,2) NOT NULL,
  `costo_total_proyecto_mas_impuestos_feevariable` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `costos_totales_atl`
--

INSERT INTO `costos_totales_atl` (`id_costos_totales`, `id_hoja_costos_atl`, `costo_programado_proyecto`, `costo_estimado_proyecto`, `diferencia`, `costo_acumulado_programado`, `tas_apliacacion`, `costo_programado_costos_indirectos`, `tiempo_programado`, `tasa_fiannciera`, `total_programado_financiero`, `fee_programado`, `fee_variable`, `costo_total_proyecto_ejcutado`, `costo_total_proyecto_feevariable`, `fee_ejecutado`, `fee_feevariable`, `costo_total_proyecto_mas_feeejecutado`, `costo_total_proyecto_mas_impuestos_ejecutado`, `costo_total_proyecto_mas_impuestos_feevariable`) VALUES
(8, 20, '13628.17', '12988.80', '2247.03', '8751.78', '0.17', '1487.80', 30, '0.05', '167.38', '10.00', '10.00', '10406.96', '14432.00', '1040.70', '1443.20', '11447.66', '13628.17', '15875.20'),
(25, 37, '8155.87', '10912.36', '2756.49', '5009.84', '0.17', '851.67', 30, '0.05', '95.81', '15.00', '0.00', '5957.33', '10912.36', '893.60', '0.00', '6850.93', '8155.87', '10912.36');

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
  `numero_factura` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `hoja_costos_atl`
--

INSERT INTO `hoja_costos_atl` (`id_hoja_costos`, `codigo_hoja_costos`, `cliente`, `correo_cliente`, `fecha_inicio`, `tiempo_credito`, `nombre_proyecto`, `fecha_fin`, `tipo_proyecto`, `fecha_hora_creacion`, `id_usuario`, `estado`, `fecha_facturacion`, `numero_factura`) VALUES
(20, '4111010007', '01', 'tigo@correo.com', '2019-03-07', 30, 'convencion de Tigo', '2019-03-30', 'EXTERNO', '2019-03-07 21:17:12', 3, 1, '0000-00-00', ''),
(37, '4211010008', '01', 'tigo@correo.com', '2019-03-11', 30, 'btl movil fuerza de ventas', '0000-00-00', 'EXTERNO', '2019-03-11 19:20:33', 3, 1, '0000-00-00', '');

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
(26, 20, 'EJECUTIVO DE CUENTAS', 'jimena', 'HORAS', 6, 1, '30.00', '180.00', '550.00'),
(27, 20, 'ENCARGADO LOGISTICO', 'carlos', 'HORAS', 6, 2, '26.00', '312.00', '560.00'),
(45, 37, 'EJECUTIVO DE CUENTAS', 'jimena', 'HORAS', 4, 1, '30.00', '120.00', '550.00');

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
(7, 20, 'alquiler de sala comercial cine center quillacollo', 'cine center', '1', 1, '1400.00', 'FACTURA', '1218.00', '1442.00'),
(8, 20, 'proyector de 300 lumenes', 'mediterraneo', '1', 1, '650.00', 'FACTURA', '565.50', '1500.00'),
(9, 20, 'equipo de sonido (2 parlantes, consola, 2 microfon', 'mediterraneo', '1', 1, '1624.00', 'FACTURA', '1412.88', '2800.00'),
(16, 37, 'alquiler de pantalla', 'mediterraneo', '1', 1, '3000.00', 'FACTURA', '2610.00', '4500.00'),
(17, 37, 'eventual', 'gr', '1', 1, '75.00', 'RECIBO', '88.76', '0.00'),
(18, 37, 'perifoneo con m.', 'gr', '1', 1, '70.00', 'FACTURA', '60.90', '1603.17'),
(19, 37, 'hora loca', 'star p.', '1', 1, '1800.00', 'RECIBO', '2130.18', '4259.19');

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
  MODIFY `id_costos_totales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

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
-- AUTO_INCREMENT de la tabla `equipos_materiales_btl2`
--
ALTER TABLE `equipos_materiales_btl2`
  MODIFY `id_materiales_equipos` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `equipo_propio_atl`
--
ALTER TABLE `equipo_propio_atl`
  MODIFY `id_equipo_propio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
  MODIFY `id_hoja_costos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id_materiales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

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
-- AUTO_INCREMENT de la tabla `personal_directo_atl`
--
ALTER TABLE `personal_directo_atl`
  MODIFY `id_personal_directo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

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
  MODIFY `id_producto_propio_taller` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `servicios_btl2`
--
ALTER TABLE `servicios_btl2`
  MODIFY `id_servicios` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicios_contratados_atl`
--
ALTER TABLE `servicios_contratados_atl`
  MODIFY `id_servicios_contratados` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

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
