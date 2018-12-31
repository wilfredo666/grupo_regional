-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 31-12-2018 a las 06:05:10
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
(2, 410, 'JEFATURA DE EVENTOS Y ATL'),
(3, 411, 'COORDINACION OPERATIVO ATL CBBA'),
(4, 412, 'COORDINACION OPERATIVO ATL SCZ'),
(5, 413, 'COORDINACION OPERATIVO ATL LP'),
(6, 420, 'JEFATURA DE ACTIVACIONES Y BTL'),
(7, 421, 'COORDINACION OPERATIVO BTL CBBA'),
(8, 422, 'COORDINACION OPERATIVO BTL SCZ'),
(9, 423, 'COORDINACION OPERATIVO BTL LP'),
(10, 430, 'JEFATURA TALLER DISEÑO'),
(11, 431, 'TALLER REGIONAL CBBA'),
(12, 432, 'TALLER REGIONAL SCZ'),
(13, 433, 'TALLER REGIONAL LP'),
(14, 440, 'OPERACIONES COMERCIAL'),
(15, 441, 'OPERACIONES COMERCIAL ATL'),
(16, 442, 'OPERACIONES COMERCIAL BTL'),
(17, 443, 'OPERACIONES COMERCIAL TALLER'),
(18, 600, 'CENTRO DE COSTO TEMPORAL OPERACIONES');

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
  `id_cliente` int(11) NOT NULL,
  `codigo` varchar(3) NOT NULL,
  `nombre` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `codigo`, `nombre`) VALUES
(1, '01', 'TIGO'),
(2, '02', 'UNILEVER'),
(3, '03', 'MATADERO FRIGORIFICO SCZ S.A.'),
(4, '04', 'KIMBERLY'),
(5, '05', 'LUIS GUTIERREZ'),
(6, '06', 'SERGIO ABASTOFLOR'),
(7, '07', 'AGREGADOS GERARDO/MIRIAM PARDO'),
(8, '08', 'UPAL'),
(9, '09', 'VG PRESENTACIONES'),
(10, '10', 'COMERCIAL ITIENDA S.R.L.'),
(11, '11', 'FEDERACION BOLIVIANA DE GOLF'),
(12, '12', 'ENRRIQUE CAMACHO'),
(13, '13', 'CBN'),
(14, '14', 'IMCRUZ'),
(15, '15', 'MARIO KISEN'),
(16, '16', 'SOFIA LTDA'),
(17, '17', 'ALICORP'),
(18, '18', 'D&M'),
(19, '19', 'WILSON'),
(20, '20', 'COMERCIAL IPORRE'),
(21, '21', 'MANJAR DE ORO'),
(22, '22', 'MAD CENTER'),
(23, '23', 'DAHER'),
(24, '24', 'LA HERRADURA'),
(25, '25', 'HIPERMARCAS'),
(26, '26', 'PUBLICARTE'),
(27, '27', 'SACI'),
(28, '28', 'MADISA'),
(29, '29', 'GUIDO SALVATIERRA ZABALA'),
(30, '30', 'COMPANEX'),
(31, '31', 'VADIKO'),
(32, '32', 'ASTRIX'),
(33, '33', 'EMSERSO'),
(34, '34', 'IASA'),
(35, '35', 'FAGAL'),
(36, '36', 'FONDO DE LA COMUNIDAD'),
(37, '37', 'BATA'),
(38, '38', 'ARCOR'),
(39, '39', 'ALEJANDRO BAKIR (BAGAPOS)'),
(40, '40', 'PROYECTOS INMOBILIARIOS EL DORAL S.A.'),
(41, '41', 'CIMAL'),
(42, '42', 'IMCRUZ'),
(43, '43', 'FACTORY'),
(44, '44', 'JEFATURA ATL'),
(45, '45', 'JEFATURA BTL'),
(46, '46', ''),
(47, '47', 'RELEVANT COMMS LTDA'),
(48, '48', 'BNB'),
(49, '49', 'RIVERO'),
(50, '50', 'OLIVA'),
(51, '51', 'BUGGY'),
(52, '52', 'GALINDO'),
(53, '53', 'EL CORTIJO'),
(54, '54', 'ROJAS'),
(55, '55', 'TROPICAL TOURS LTDA'),
(56, '56', 'REMAX'),
(57, '57', 'BCO. MERCANTIL SANTA CRUZ'),
(58, '58', 'LINK GROUP'),
(59, '59', 'TECHO'),
(60, '60', 'FUMIMASTER'),
(61, '61', ''),
(62, '62', 'JUAN MERCADO'),
(63, '63', 'ITACAMBA'),
(64, '64', 'BIS OVERSEAS'),
(65, '65', 'SIGMA'),
(66, '66', 'AIDISA BOLIVIA'),
(67, '67', 'HOTEL CBBA'),
(68, '68', 'MASIVOS SRL'),
(69, '69', 'ANGELA SANCHEZ'),
(70, '70', 'BAT BOLIVIA S.A.'),
(71, '71', 'DANIEL CHAIN'),
(72, '72', 'HUAWEI'),
(73, '73', 'AUTOKORP'),
(74, '74', 'AGROINCO'),
(75, '75', 'EXPOCRUZ'),
(76, '76', 'PROTEC (JUAN HINOJOSA)'),
(77, '77', 'TRIPLEX LTDA'),
(78, '78', 'KENIA'),
(79, '79', 'ALEJANDRO'),
(80, '80', 'OPAL'),
(81, '81', 'EMACRUZ (PATRICIO REYNALDO DESPUSE)'),
(82, '82', 'INSTITUTO ARGENTINO (WALTER TELL)'),
(83, '83', 'BCO. BISA'),
(84, '84', 'COLEGIO DE ARQUITECTOS DE SANTA CRUZ'),
(85, '85', 'CHINGA DECORACIONES S.R.L.'),
(86, '86', 'PANCARTA'),
(87, '87', 'METALTELA LTDA'),
(88, '88', 'CODESUR / MINISTERIO DE DEPORTES'),
(89, '89', 'FUTURO VIRTUAL'),
(90, '90', 'EDUARDO OROZCO'),
(91, '91', 'ADRIANA QUIROGA'),
(92, '92', 'MARCELA MOLINA'),
(93, '93', 'CARRASCO'),
(94, '94', 'PELUQUERIA (PARTICULAR)'),
(95, '95', 'KETAL'),
(96, '96', 'LA OPTICA'),
(97, '97', 'POLY PLAST S.R.L.'),
(98, '98', 'BCO. PRODEM'),
(99, '99', 'JOSE MARIA GALVAN');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datos_laborales`
--

CREATE TABLE `datos_laborales` (
  `id_datos_laborales` int(11) NOT NULL,
  `ci_empleado` varchar(30) NOT NULL,
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
(1, '7904767', 0, 'sistemas@gruporegional.com', 'encargado de sistemas', '', 0, 0, '', 0, '', '0000-00-00', '0000-00-00', '', '3151.25', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `id_empleado` int(11) NOT NULL,
  `ci` varchar(30) NOT NULL,
  `expedido` varchar(20) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `segundo_nombre` varchar(30) NOT NULL,
  `apellido_paterno` varchar(30) NOT NULL,
  `apellido_materno` varchar(30) NOT NULL,
  `sexo` varchar(20) NOT NULL,
  `estado_civil` varchar(20) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `nacionalidad` varchar(30) NOT NULL,
  `direccion` int(50) NOT NULL,
  `celular` int(11) NOT NULL,
  `telefono_fijo` int(11) NOT NULL,
  `correo_electronico` varchar(50) NOT NULL,
  `estado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `ci_empleado` varchar(30) NOT NULL,
  `nombre_usuario` varchar(20) NOT NULL,
  `clave` varchar(32) NOT NULL,
  `nivel` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `ci_empleado`, `nombre_usuario`, `clave`, `nivel`) VALUES
(1, '7904767', 'administrador', 'admin123', 'Administrador');

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
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `datos_laborales`
--
ALTER TABLE `datos_laborales`
  ADD PRIMARY KEY (`id_datos_laborales`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`id_empleado`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `centro_costos`
--
ALTER TABLE `centro_costos`
  MODIFY `id_centro_costos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `ciudad`
--
ALTER TABLE `ciudad`
  MODIFY `id_ciudad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT de la tabla `datos_laborales`
--
ALTER TABLE `datos_laborales`
  MODIFY `id_datos_laborales` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `empleado`
--
ALTER TABLE `empleado`
  MODIFY `id_empleado` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
