
--
-- Base de datos: `Mproject`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `participante`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(85) NOT NULL,
  `descripcion` text,
  `porcentaje` decimal(6,2) DEFAULT 0.00,
  `closed` boolean DEFAULT 0,
  --`num_proyectos` int(11) DEFAULT 0,
  PRIMARY KEY (`id_proyecto`),
  KEY `i_nombre` (`nombre`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1001 ;

--
-- Volcado de datos para la tabla `participante`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre`, `descripcion`) VALUES
(1001, 'Proyecto01');
(1002, 'Proyecto02');
(1003, 'Proyecto03');
(1004, 'Proyecto04');
(1005, 'Proyecto05');
(1006, 'Proyecto06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `regalo`
--

CREATE TABLE IF NOT EXISTS `regalo` (
  `id_regalo` int(11) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(55) NOT NULL,
  `beneficiario` int(11) NOT NULL,
  `valor` decimal(8,2) NOT NULL,
  `ffijacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `fconsolidacion` date DEFAULT NULL,
  `total_logrado` decimal (8.2) DEFAULT 0,
  `costo_paquete` decimal(8,2) DEFAULT 0,
  `plazo` enum('INMINENTE','CORTO PLAZO','MEDIO PLAZO','LARGO PLAZO') DEFAULT 'MEDIO PLAZO',
  `descripcion` text DEFAULT NULL,
  PRIMARY KEY (`id_regalo`),
  FOREIGN KEY (`beneficiario`)
      REFERENCES participante(`id_participante`)
      ON UPDATE CASCADE ON DELETE RESTRICT,
  KEY `i_titulo` (`titulo`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=10001 ;

--
-- Volcado de datos para la tabla `regalo`
--

INSERT INTO `regalo` (`id_regalo`, `titulo`, `beneficiario`, `valor`) VALUES
(10001, 'Wacom Cintiq HD13', 1001, 850),
(10002, 'MacBook Pro', 1001, 1200);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `donacion`
--

CREATE TABLE IF NOT EXISTS `donacion` (
  `id_donacion` int(11) NOT NULL AUTO_INCREMENT,
  `donante` int(11) NOT NULL,
  `regalo` int(11) NOT NULL,
  `cantidad` decimal(8,2) NOT NULL,
  `fdonacion` DATETIME DEFAULT CURRENT_TIMESTAMP,
  `motivo` text DEFAULT NULL,
  PRIMARY KEY (`id_donacion`),
  FOREIGN KEY (`donante`)
      REFERENCES participante(`id_participante`)
      ON UPDATE CASCADE ON DELETE RESTRICT,
  FOREIGN KEY (`regalo`)
      REFERENCES regalo(`id_regalo`)
      ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=100001 ;

--
-- Volcado de datos para la tabla `donacion`
--

INSERT INTO `donacion` (`id_donacion`, `donante`, `regalo`, `cantidad`) VALUES
(100001, 1001, 10001, 50),
(100002, 1002, 10001, 100),
(100003, 1002, 10002, 200),
(100004, 1005, 10001, 50);