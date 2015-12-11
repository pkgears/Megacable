-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2014 a las 04:27:19
-- Versión del servidor: 5.6.16
-- Versión de PHP: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `admin_digital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bitacoras`
--

CREATE TABLE IF NOT EXISTS `bitacoras` (
  `id_bit` int(6) NOT NULL,
  `no_serie` int(20) NOT NULL,
  `suscriptor` int(40) NOT NULL,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `inicio_coaxialRG6` int(10) DEFAULT NULL,
  `fin_coaxialRG6` int(10) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `inicio_coaxialRG6auto` int(10) DEFAULT NULL,
  `fin_coaxialRG6auto` int(10) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  `captura` int(20) NOT NULL AUTO_INCREMENT,
  PRIMARY KEY (`captura`),
  UNIQUE KEY `no_serie` (`no_serie`),
  UNIQUE KEY `captura` (`captura`),
  KEY `suscriptor` (`suscriptor`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bit_fecha`
--
CREATE TABLE IF NOT EXISTS `bit_fecha` (
`id_bit` int(6)
,`fecha` date
);
-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `bit_tecnicos`
--
CREATE TABLE IF NOT EXISTS `bit_tecnicos` (
`id_bit` int(6)
,`fecha` date
,`id_tecnico` int(3)
);
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `equipos`
--

CREATE TABLE IF NOT EXISTS `equipos` (
  `no_serie` int(20) NOT NULL,
  `id_tecnico` varchar(10) DEFAULT 'S/A',
  `fec_inst` date DEFAULT NULL,
  `suscriptor` int(40) DEFAULT NULL,
  `estado` varchar(20) NOT NULL DEFAULT 'No entregado',
  PRIMARY KEY (`no_serie`),
  KEY `tecnico` (`id_tecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos`
--

CREATE TABLE IF NOT EXISTS `fotos` (
  `id_foto` int(11) NOT NULL,
  `nombre_foto` varchar(100) NOT NULL,
  PRIMARY KEY (`id_foto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fotos`
--

INSERT INTO `fotos` (`id_foto`, `nombre_foto`) VALUES
(0, '../fotos/nada.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `fotos_auto`
--

CREATE TABLE IF NOT EXISTS `fotos_auto` (
  `id_foto_auto` int(3) NOT NULL,
  `nombre_foto_auto` varchar(100) CHARACTER SET latin1 NOT NULL,
  PRIMARY KEY (`id_foto_auto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `fotos_auto`
--

INSERT INTO `fotos_auto` (`id_foto_auto`, `nombre_foto_auto`) VALUES
(0, '../fotos_auto/nada.png');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `index_bitacora`
--

CREATE TABLE IF NOT EXISTS `index_bitacora` (
  `id_bit` int(6) NOT NULL AUTO_INCREMENT,
  `id_tecnico` int(3) NOT NULL,
  PRIMARY KEY (`id_bit`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario`
--

CREATE TABLE IF NOT EXISTS `inventario` (
  `id_inventario` int(4) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_inventario`),
  UNIQUE KEY `id_inventario` (`id_inventario`),
  KEY `id_recibo` (`id_inventario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inventario_tecnico`
--

CREATE TABLE IF NOT EXISTS `inventario_tecnico` (
  `id_inv_tec` int(3) NOT NULL AUTO_INCREMENT,
  `id_tecnico` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  KEY `id_tecnico` (`id_tecnico`),
  KEY `id_inv_tec` (`id_inv_tec`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_entregado`
--

CREATE TABLE IF NOT EXISTS `material_entregado` (
  `id_entrega` int(3) NOT NULL AUTO_INCREMENT,
  `id_tecnico` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  KEY `id_tecnico` (`id_tecnico`),
  KEY `id_entrega` (`id_entrega`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_recibido`
--

CREATE TABLE IF NOT EXISTS `material_recibido` (
  `id_recibo` int(3) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_recibo`),
  UNIQUE KEY `id_recibo_2` (`id_recibo`),
  KEY `id_recibo` (`id_recibo`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_utilizado`
--

CREATE TABLE IF NOT EXISTS `material_utilizado` (
  `id_util` int(3) NOT NULL AUTO_INCREMENT,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_util`),
  UNIQUE KEY `id_util` (`id_util`),
  KEY `id_recibo` (`id_util`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `material_utilizado_tecnicos`
--

CREATE TABLE IF NOT EXISTS `material_utilizado_tecnicos` (
  `id_util` int(3) NOT NULL AUTO_INCREMENT,
  `id_tecnico` int(3) NOT NULL,
  `fecha` date NOT NULL,
  `barril` int(5) DEFAULT NULL,
  `divisor2` int(5) DEFAULT NULL,
  `divisor3` int(5) DEFAULT NULL,
  `grapaRG6` int(5) DEFAULT NULL,
  `coaxialRG6` int(5) DEFAULT NULL,
  `coaxialRG6auto` int(5) DEFAULT NULL,
  `conectorRG6` int(5) DEFAULT NULL,
  `grapaO` int(5) DEFAULT NULL,
  `tapon_sellamuros` int(5) DEFAULT NULL,
  `cinta_ponchable` int(5) DEFAULT NULL,
  `access` int(5) DEFAULT NULL,
  `modem` int(5) DEFAULT NULL,
  PRIMARY KEY (`id_util`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tecnicos`
--

CREATE TABLE IF NOT EXISTS `tecnicos` (
  `id_tecnico` int(3) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(40) NOT NULL,
  `apellido` varchar(40) NOT NULL,
  `fec_contrato` date NOT NULL,
  `fec_salida` date DEFAULT NULL,
  `direccion` varchar(100) NOT NULL,
  `telefono` varchar(20) NOT NULL,
  `comentarios` varchar(512) DEFAULT 'Sin comentarios',
  `comentarios_after` varchar(512) DEFAULT 'Sin comentarios',
  `id_foto` int(4) DEFAULT '0',
  `id_foto_auto` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_tecnico`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `usuario` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `primer_nombre` varchar(40) NOT NULL,
  `segundo_nombre` varchar(40) DEFAULT NULL,
  `apellido_paterno` varchar(40) NOT NULL,
  `apellido_materno` varchar(40) DEFAULT NULL,
  PRIMARY KEY (`usuario`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`usuario`, `password`, `primer_nombre`, `segundo_nombre`, `apellido_paterno`, `apellido_materno`) VALUES
('cesar', '123', 'Cesar', 'Eduardo', 'Ortiz', 'Salazar'),
('eduardo', '1234', 'Eduardo', NULL, 'Salazar', NULL);

-- --------------------------------------------------------

--
-- Estructura para la vista `bit_fecha`
--
DROP TABLE IF EXISTS `bit_fecha`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bit_fecha` AS (select `bitacoras`.`id_bit` AS `id_bit`,`bitacoras`.`fecha` AS `fecha` from `bitacoras` group by `bitacoras`.`id_bit`);

-- --------------------------------------------------------

--
-- Estructura para la vista `bit_tecnicos`
--
DROP TABLE IF EXISTS `bit_tecnicos`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `bit_tecnicos` AS (select `bit_fecha`.`id_bit` AS `id_bit`,`bit_fecha`.`fecha` AS `fecha`,`index_bitacora`.`id_tecnico` AS `id_tecnico` from (`bit_fecha` join `index_bitacora`) where (`bit_fecha`.`id_bit` = `index_bitacora`.`id_bit`));

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
