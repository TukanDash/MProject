# Nombre del fichero: mproject.sql

--
-- Base de datos: `Mproject`
--

-- --------------------------------------------------------



# Borramos la base de datos Mproject si existe
DROP DATABASE IF EXISTS Mproject;

# Creamos la base de datos Mproject si no existe.
CREATE DATABASE IF NOT EXISTS Mproject;

# Abrimos la base de datos Mproject
USE Mproject;

# Borramos la tabla proyecto si existe
DROP TABLE IF EXISTS proyecto;

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE IF NOT EXISTS `proyecto` (
  `id_proyecto` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(85) NOT NULL,
  `descripcion` text,
  `porcentaje` decimal(6,2) DEFAULT 0.00,
  `estado` ENUM('abierto','ejecucion','espera','finalizado') NOT NULL DEFAULT 'abierto',
  `archived` boolean DEFAULT 0,
  `es_proceso` boolean DEFAULT 0,
  PRIMARY KEY (`id_proyecto`),
  KEY `i_nombre_pro` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=1001 ;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `nombre`, `descripcion`) VALUES
(1001, 'Proyecto01', 'Descripción generada automáticamente para el proyecto.'),
(1002, 'Proyecto02', 'Descripción generada automáticamente para el proyecto.'),
(1003, 'Proyecto03', 'Descripción generada automáticamente para el proyecto.'),
(1004, 'Proyecto04', 'Descripción generada automáticamente para el proyecto.'),
(1005, 'Proyecto05', 'Descripción generada automáticamente para el proyecto.'),
(1006, 'Proyecto06', 'Descripción generada automáticamente para el proyecto.');

-- --------------------------------------------------------

# Borramos la tabla actividad si existe
DROP TABLE IF EXISTS actividad;

--
-- Estructura de tabla para la tabla `actividad`
--

CREATE TABLE IF NOT EXISTS `actividad` (
  `id_actividad` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(85) NOT NULL,
  `descripcion` text,
  `porcentaje` decimal(6,2) DEFAULT 0.00,
  `es_proceso` boolean DEFAULT 0,
  `id_proyect` int(11),
  PRIMARY KEY (`id_actividad`),
  FOREIGN KEY (`id_proyect`) REFERENCES proyecto(id_proyecto) ON UPDATE CASCADE ON DELETE CASCADE,
  KEY `i_nombre_act` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10001 ;

--
-- Volcado de datos para la tabla `actividad`
--

INSERT INTO `actividad` (`id_actividad`, `nombre`, `id_proyect`) VALUES
(10001, 'Actividad01', 1001),
(10002, 'Actividad02', 1002),
(10003, 'Actividad03', 1002),
(10004, 'Actividad04', 1003),
(10005, 'Actividad05', 1004),
(10006, 'Actividad06', 1004);


-- --------------------------------------------------------

# Borramos la tabla tarea si existe
DROP TABLE IF EXISTS tarea;

--
-- Estructura de tabla para la tabla `tarea`
--

CREATE TABLE IF NOT EXISTS `tarea` (
  `id_tarea` int(11) NOT NULL AUTO_INCREMENT,
  `nombre` varchar(85) NOT NULL,
  `descripcion` text,
  `done` boolean DEFAULT 0,
  `id_act` int(11),
  PRIMARY KEY (`id_tarea`),
  FOREIGN KEY (`id_act`) REFERENCES actividad(id_actividad) ON UPDATE CASCADE ON DELETE CASCADE,
  KEY `i_nombre_tar` (`nombre`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=100001 ;

--
-- Volcado de datos para la tabla `tarea`
--

INSERT INTO `tarea` (`id_tarea`, `nombre`, `id_act`) VALUES
(100001, 'Tarea01', 10001),
(100002, 'Tarea02', 10002),
(100003, 'Tarea03', 10002),
(100004, 'Tarea04', 10003),
(100005, 'Tarea05', 10004),
(100006, 'Tarea06', 10004),
(100007, 'Tarea07', 10001),
(100008, 'Tarea08', 10005),
(100009, 'Tarea09', 10005),
(100010, 'Tarea10', 10005),
(100011, 'Tarea11', 10005),
(100012, 'Tarea12', 10006),
(100013, 'Tarea13', 10006),
(100014, 'Tarea14', 10003),
(100015, 'Tarea15', 10002),
(100016, 'Tarea16', 10003),
(100017, 'Tarea17', 10004),
(100018, 'Tarea18', 10004);