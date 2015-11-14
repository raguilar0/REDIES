-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2015 a las 23:45:50
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `redies_indicadores`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cn`
--

CREATE TABLE IF NOT EXISTS `cn` (
  `CN_I_RS` double(6,2) NOT NULL COMMENT 'Inventario de Emisiones de Gases de Efecto Invernadero',
  `CN_II_I_RC` double(6,2) NOT NULL,
  `CN_II_II_RC` double(6,2) NOT NULL,
  `CN_II_III_RC` double(6,2) NOT NULL,
  `CN_II_IV_RC` double(6,2) NOT NULL,
  `CN_III_G` double(6,2) NOT NULL,
  `CN_IV_I_G` int(11) NOT NULL,
  `CN_IV_II_G` int(11) NOT NULL,
  `CN_V_RC` double(6,2) NOT NULL,
  `FORMULARIO_ID` varchar(30) NOT NULL,
  `FECHA_I` date DEFAULT NULL,
  `FECHA_F` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Carbono Neutralidad';

--
-- Volcado de datos para la tabla `cn`
--

INSERT INTO `cn` (`CN_I_RS`, `CN_II_I_RC`, `CN_II_II_RC`, `CN_II_III_RC`, `CN_II_IV_RC`, `CN_III_G`, `CN_IV_I_G`, `CN_IV_II_G`, `CN_V_RC`, `FORMULARIO_ID`, `FECHA_I`, `FECHA_F`) VALUES
(2.10, 2.40, 2.55, 2.77, 2.90, 8.40, 2, 4, 6.40, '1', NULL, NULL),
(7.80, 8.70, 9.50, 55.40, 47.50, 5.60, 1, 1, 9.70, '2', NULL, NULL),
(8448.70, 12.14, 23.10, 26.50, 26.40, 5.40, 1, 2, 36.90, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `formulario`
--

CREATE TABLE IF NOT EXISTS `formulario` (
  `ANHO` int(11) NOT NULL,
  `USUARIOS_CORREO` varchar(50) NOT NULL,
  `ID` varchar(30) NOT NULL,
  `UNIVERSIDAD_ID` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `formulario`
--

INSERT INTO `formulario` (`ANHO`, `USUARIOS_CORREO`, `ID`, `UNIVERSIDAD_ID`) VALUES
(2015, 'machoquiros@gmail.com', '1', 1),
(2015, 'ricardo@R.com', '2', 2),
(2014, 'Slon@S.com', '3', 2),
(2013, 'Brandon@B.com', '4', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gr`
--

CREATE TABLE IF NOT EXISTS `gr` (
  `GR_I_G` tinyint(1) NOT NULL,
  `GR_II_G` tinyint(1) NOT NULL,
  `GR_III_G` int(11) NOT NULL,
  `GR_IV_G` tinyint(1) NOT NULL,
  `GR_V_RC` int(11) NOT NULL,
  `GR_VI_G` int(11) NOT NULL,
  `GR_VII_G` tinyint(1) NOT NULL,
  `FORMULARIO_ID` varchar(30) NOT NULL,
  `FECHA_I` date DEFAULT NULL,
  `FECHA_F` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gr`
--

INSERT INTO `gr` (`GR_I_G`, `GR_II_G`, `GR_III_G`, `GR_IV_G`, `GR_V_RC`, `GR_VI_G`, `GR_VII_G`, `FORMULARIO_ID`, `FECHA_I`, `FECHA_F`) VALUES
(2, 1, 1, 1, 1, 1, 1, '1', '0000-00-00', NULL),
(1, 1, 1, 2, 5, 1, 1, '2', '0000-00-00', NULL),
(1, 1, 54, 1, 54, 36, 1, '3', '0000-00-00', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `gre`
--

CREATE TABLE IF NOT EXISTS `gre` (
  `GRE_I_G` tinyint(1) NOT NULL,
  `GRE_II_I_RC` int(11) NOT NULL,
  `GRE_II_II_RC` double(6,2) NOT NULL,
  `GRE_III_G` double(6,3) NOT NULL,
  `GRE_IV_G` double(6,2) NOT NULL,
  `GRE_V_RC` double(6,2) NOT NULL,
  `FORMULARIO_ID` varchar(30) NOT NULL,
  `FECHA_I` date DEFAULT NULL,
  `FECHA_F` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `gre`
--

INSERT INTO `gre` (`GRE_I_G`, `GRE_II_I_RC`, `GRE_II_II_RC`, `GRE_III_G`, `GRE_IV_G`, `GRE_V_RC`, `FORMULARIO_ID`, `FECHA_I`, `FECHA_F`) VALUES
(1, 11, 1.50, 5.900, 9.70, 4.60, '1', NULL, NULL),
(1, 54, 45.99, 85.700, 7.90, 5.55, '2', NULL, NULL),
(1, 46, 45.90, 48.700, 23.10, 15.90, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `grs`
--

CREATE TABLE IF NOT EXISTS `grs` (
  `GRS_I_I_RS` double(6,2) NOT NULL,
  `GRS_I_II_RS` double(6,2) NOT NULL,
  `GRS_I_III_RS` double(6,2) NOT NULL,
  `GRS_I_IV_RS` double(6,2) NOT NULL,
  `GRS_I_V_RS` double(6,2) NOT NULL,
  `GRS_I_VI_RS` double(6,2) NOT NULL,
  `GRS_I_VII_RS` double(6,2) NOT NULL,
  `GRS_I_VIII_RS` double(6,2) NOT NULL,
  `GRS_II_G` tinyint(1) NOT NULL,
  `GRS_III_RS` double(6,2) NOT NULL,
  `GRS_IV_RS` double(6,2) NOT NULL,
  `GRS_V_RS` double(6,2) NOT NULL,
  `GRS_VI_G` int(11) NOT NULL,
  `GRS_VII_RS` double(6,2) NOT NULL,
  `FORMULARIO_ID` varchar(30) NOT NULL,
  `FECHA_I` date DEFAULT NULL,
  `FECHA_F` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `grs`
--

INSERT INTO `grs` (`GRS_I_I_RS`, `GRS_I_II_RS`, `GRS_I_III_RS`, `GRS_I_IV_RS`, `GRS_I_V_RS`, `GRS_I_VI_RS`, `GRS_I_VII_RS`, `GRS_I_VIII_RS`, `GRS_II_G`, `GRS_III_RS`, `GRS_IV_RS`, `GRS_V_RS`, `GRS_VI_G`, `GRS_VII_RS`, `FORMULARIO_ID`, `FECHA_I`, `FECHA_F`) VALUES
(48.90, 54.40, 23.60, 41.50, 78.50, 12.11, 16.90, 99.90, 1, 15.90, 146.90, 288.90, 11, 14.90, '1', NULL, NULL),
(89.70, 21.40, 15.90, 18.80, 12.90, 15.90, 17.80, 152.90, 1, 14.99, 5.70, 5.85, 1, 15.90, '2', NULL, NULL),
(45.60, 12.60, 4.15, 12.90, 15.90, 15.98, 14.70, 12.80, 1, 14.60, 159.90, 4.70, 1, 12.99, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh_ach`
--

CREATE TABLE IF NOT EXISTS `rh_ach` (
  `RH_ACH_I_RC` double(6,2) NOT NULL COMMENT 'Consumo de agua per cápita en alcance definido',
  `RH_ACH_II_I_G` int(11) NOT NULL COMMENT 'Inventario de fuentes de agua -> #pozos',
  `RH_ACH_II_II_G` int(11) NOT NULL COMMENT 'Inventario de fuentes de agua->#nacientes',
  `RH_ACH_II_III_G` int(11) NOT NULL COMMENT 'Inventario de fuentes de agua->#ríos',
  `RH_ACH_II_IV_G` int(11) NOT NULL COMMENT 'Inventario de fuentes de agua->#hidrómetros',
  `RH_ACH_III_RC` double(6,2) NOT NULL COMMENT 'Registros de consumo de agua',
  `RH_ACH_IV_G` tinyint(1) NOT NULL COMMENT 'Se realizan análisis de calidad de agua',
  `RH_ACH_V_G` double(6,2) NOT NULL COMMENT 'Plan de ahorro de agua',
  `RH_ACH_VI_G` tinyint(1) NOT NULL COMMENT 'Plan de manejo de cuerpos de agua',
  `RH_ACH_VII_G` tinyint(1) NOT NULL COMMENT ' Permisos de explotación de pozos',
  `RH_ACH_VIII_G` tinyint(1) NOT NULL COMMENT 'Plan de mantenimiento de sistemas de abastecimiento de agua',
  `FORMULARIO_ID` varchar(30) NOT NULL,
  `FECHA_I` date DEFAULT NULL,
  `FECHA_F` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='Recurso Hídrico: Agua para consumo humano';

--
-- Volcado de datos para la tabla `rh_ach`
--

INSERT INTO `rh_ach` (`RH_ACH_I_RC`, `RH_ACH_II_I_G`, `RH_ACH_II_II_G`, `RH_ACH_II_III_G`, `RH_ACH_II_IV_G`, `RH_ACH_III_RC`, `RH_ACH_IV_G`, `RH_ACH_V_G`, `RH_ACH_VI_G`, `RH_ACH_VII_G`, `RH_ACH_VIII_G`, `FORMULARIO_ID`, `FECHA_I`, `FECHA_F`) VALUES
(45.90, 1, 2, 3, 4, 82.90, 1, 15.80, 1, 1, 1, '1', NULL, NULL),
(58.99, 5, 1, 4, 2, 15.90, 1, 17.90, 1, 1, 1, '2', NULL, NULL),
(47.90, 56, 28, 14, 24, 49.80, 1, 16.70, 1, 1, 1, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rh_ar`
--

CREATE TABLE IF NOT EXISTS `rh_ar` (
  `RH_AR_I_I_RS` int(11) NOT NULL,
  `RH_AR_I_II_RS` int(11) NOT NULL,
  `RH_AR_I_III_RS` int(11) NOT NULL,
  `RH_AR_II_RS` tinyint(1) NOT NULL,
  `RH_AR_III_RS` tinyint(1) NOT NULL,
  `RH_AR_IV_G` int(11) NOT NULL,
  `FORMULARIO_ID` varchar(30) NOT NULL,
  `FECHA_I` date DEFAULT NULL,
  `FECHA_F` date DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `rh_ar`
--

INSERT INTO `rh_ar` (`RH_AR_I_I_RS`, `RH_AR_I_II_RS`, `RH_AR_I_III_RS`, `RH_AR_II_RS`, `RH_AR_III_RS`, `RH_AR_IV_G`, `FORMULARIO_ID`, `FECHA_I`, `FECHA_F`) VALUES
(47, 45, 46, 1, 1, 21, '1', NULL, NULL),
(15, 665, 14, 1, 1, 18, '2', NULL, NULL),
(45, 42, 42, 1, 1, 21, '3', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `universidad`
--

CREATE TABLE IF NOT EXISTS `universidad` (
  `ID` int(11) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `TELEFONO` varchar(12) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `universidad`
--

INSERT INTO `universidad` (`ID`, `NOMBRE`, `TELEFONO`) VALUES
(1, 'UCR', '122345'),
(2, 'TEC', '123456'),
(3, 'UNA', '4545676'),
(4, 'Privada', '32443439');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `UNIVERSIDAD_ID` int(11) NOT NULL,
  `CORREO` varchar(50) NOT NULL,
  `NOMBRE` varchar(20) NOT NULL,
  `APELLIDO_I` varchar(20) NOT NULL,
  `APELLIDO_II` varchar(20) NOT NULL,
  `PASS` varchar(100) NOT NULL,
  `ESTADO` tinyint(1) NOT NULL,
  `INTENTOS` tinyint(4) NOT NULL,
  `rol` varchar(20) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`UNIVERSIDAD_ID`, `CORREO`, `NOMBRE`, `APELLIDO_I`, `APELLIDO_II`, `PASS`, `ESTADO`, `INTENTOS`, `rol`) VALUES
(3, 'ricardo.aguilar@redies.cr', 'Ricardo', 'Aguilar', '', '654321', 1, 0, 'representante'),
(2, 'jose.slon@redies.cr', 'Jose', 'Slon', 'B', 'we34', 0, 0, 'representante'),
(1, 'luis.mata@redies.cr', 'Luis ', 'Mata', 'Reyes', '123456', 0, 0, 'administrador');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cn`
--
ALTER TABLE `cn`
 ADD KEY `CN_FOLMULARIO` (`FORMULARIO_ID`);

--
-- Indices de la tabla `formulario`
--
ALTER TABLE `formulario`
 ADD PRIMARY KEY (`ID`), ADD KEY `FOLMULARIO_UNIVERSIDAD` (`UNIVERSIDAD_ID`), ADD KEY `FOLMULARIO_USUARIOS` (`USUARIOS_CORREO`);

--
-- Indices de la tabla `gr`
--
ALTER TABLE `gr`
 ADD KEY `GR_FOLMULARIO` (`FORMULARIO_ID`);

--
-- Indices de la tabla `gre`
--
ALTER TABLE `gre`
 ADD KEY `GRE_FOLMULARIO` (`FORMULARIO_ID`);

--
-- Indices de la tabla `grs`
--
ALTER TABLE `grs`
 ADD KEY `GRS_FOLMULARIO` (`FORMULARIO_ID`);

--
-- Indices de la tabla `rh_ach`
--
ALTER TABLE `rh_ach`
 ADD KEY `RH_ACH_FOLMULARIO` (`FORMULARIO_ID`);

--
-- Indices de la tabla `rh_ar`
--
ALTER TABLE `rh_ar`
 ADD KEY `RH_AR_FOLMULARIO` (`FORMULARIO_ID`);

--
-- Indices de la tabla `universidad`
--
ALTER TABLE `universidad`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
 ADD PRIMARY KEY (`CORREO`), ADD KEY `USUARIOS_UNIVERSIDAD` (`UNIVERSIDAD_ID`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
