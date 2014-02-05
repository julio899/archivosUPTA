-- phpMyAdmin SQL Dump
-- version 3.4.10.1deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 03-10-2013 a las 16:41:14
-- Versión del servidor: 5.5.32
-- Versión de PHP: 5.3.10-1ubuntu3.8

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `ktuxcaco_upta`
--
CREATE DATABASE `ktuxcaco_upta` DEFAULT CHARACTER SET utf8 COLLATE utf8_spanish2_ci;
USE `ktuxcaco_upta`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarios_noticias`
--

CREATE TABLE IF NOT EXISTS `comentarios_noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_noticia` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `fecha` datetime NOT NULL,
  `comentario` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cometarios_contenidos`
--

CREATE TABLE IF NOT EXISTS `cometarios_contenidos` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `id_contenido` int(4) NOT NULL,
  `id_usuario` int(4) NOT NULL,
  `comentario` text COLLATE utf8_spanish2_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(15) COLLATE utf8_spanish2_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci AUTO_INCREMENT=22 ;

--
-- Volcado de datos para la tabla `cometarios_contenidos`
--

INSERT INTO `cometarios_contenidos` (`id`, `id_contenido`, `id_usuario`, `comentario`, `fecha`, `status`) VALUES
(17, 26, 3, 'On the Horizon\n\nWe’re always excited to bring more features to Jetpack. While we can’t provide any estimates on when these will be included in Jetpack, here are some of the additions or improvements that we are planning:\n\n    Increased customizability of the Subscription feature’s emails.\n    A better Jetpack management interface.\n    A refresh of the Sharing options.', '2013-10-02 14:41:31', 'enviado'),
(18, 26, 3, 'Spanish ..... Hola Mundo !!!', '2013-10-02 15:05:04', 'enviado'),
(19, 26, 6, 'Hola K-tux como estas?', '2013-10-02 15:07:18', 'enviado'),
(20, 25, 6, 'ummmm ...   este contenido no tiene comentarios sere el primero en escribir..\nPrueba. \n1\n2\n3....', '2013-10-02 15:09:58', 'enviado'),
(21, 1, 3, 'Anexo información. Referente a este contenido.  para una mayor aclaratoria.', '2013-10-02 15:42:29', 'enviado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contenidos`
--

CREATE TABLE IF NOT EXISTS `contenidos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `titulo` text COLLATE utf8_unicode_ci NOT NULL,
  `contenido` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `nombre_archivo` text COLLATE utf8_unicode_ci NOT NULL,
  `status` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=28 ;

--
-- Volcado de datos para la tabla `contenidos`
--

INSERT INTO `contenidos` (`id`, `idu`, `titulo`, `contenido`, `fecha`, `nombre_archivo`, `status`) VALUES
(1, 3, 'Contenido Generar Sobre las Bases y Fundamentación de este proyecto', 'Puntos contenidos \n-Seguridad en paginas web y Codeigniter\n-Las herramientas que nos Brindan su conjunto de librerías.\n-Puntos a tener en cuenta en cuanto a la seguridad.\nBibliotecas para ayudar en el desarrollo.\nTips de seguridad\nFunciones en los Active Records \n(Es la abstracción de la base de datos - recorridos ágiles, dinámicos y eficientes)', '2013-09-24 00:23:22', 'disicodeigniter101201092444phpapp01.odp', 'A'),
(25, 3, 'Contenido para T1', '<pre>Contenido de prueba.</pre>\nEn este artículo os comentaré algunos de los detalles más importantes de Elementary OS Luna, la nueva y esperada versión de esta distribución basada en Ubuntu e inspirada en OS X. Las pruebas han sido realizadas a través de una máquina virtual de VirtualBox y mi intención no ha sido medir el rendimiento de Elementary OS a nivel cuantitativo, sino más bien analizar ciertos elementos a la hora de usarlos.\n\n¿Qué es Elementary OS?\n\nSiendo la segunda versión de esta distribución, creo que esta es una pregunta obligada, así que voy a recurrir a Wikipedia para que nos introduzca este sistema operativo:\n\nElementary OS es una distribución Linux basada en Ubuntu. Usa un entorno de escritorio basado en GNOME con un shell propio llamado Pantheon. Dicho entorno destaca por ser más ligero que GNOME Shell y por la integración con otras aplicaciones de elementary OS como Plank (dock) y Midori (el navegador web).\n\nInstalación\n\nDespués de la explicación de Wikipedia, se puede deducir que estamos ante uno de los muchos clones de Ubuntu, aunque por suerte este tiene alguna personalidad y viene a aportar algo.\n\nElementary OS Luna está basada en la versión 12.04 LTS de Ubuntu y su instalación es totalmente clavada, con los mismo pasos, así que a la mayoría de los linuxeros básicos no tendrán ningún problema en instalar Elementary OS.\n', '2013-09-26 11:14:36', '', 'A'),
(26, 3, 'a', 'a b c.\nA B C...\n<pre>Prueba</pre>', '2013-09-30 09:02:13', 'estructura_fuente_2003.ppt', 'A'),
(27, 3, 'Nuevo contenido', 'probando este nuevo contenido.\nSegunda linea', '2013-10-03 14:33:07', '', 'A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuentas`
--

CREATE TABLE IF NOT EXISTS `cuentas` (
  `idu` int(10) NOT NULL AUTO_INCREMENT,
  `usuario` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `clave` varchar(100) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `trayecto` varchar(10) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `fecha` date NOT NULL,
  `tipo` varchar(1) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  `email` varchar(50) CHARACTER SET utf8 COLLATE utf8_spanish_ci NOT NULL,
  PRIMARY KEY (`idu`),
  UNIQUE KEY `usuario` (`usuario`,`email`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

--
-- Volcado de datos para la tabla `cuentas`
--

INSERT INTO `cuentas` (`idu`, `usuario`, `clave`, `nombre`, `apellido`, `trayecto`, `fecha`, `tipo`, `email`) VALUES
(6, 'julio899', '51c30cf5b566235f70673a8092853fa4b0bb60e4', 'Julio Cesar', 'Vinachi', '4', '2013-07-21', 'E', 'julio899@gmail.com'),
(2, 'grupodideco.ventas', 'd19883762715df35c719d9d2a28e8f9ae9d7ce54', 'DIDECO', 'Ventas', '4', '2013-06-28', 'E', 'grupodideco.ventas@gmail.com'),
(3, 'ktuxca', 'c0f18e057964033571407540109be9343af7ea81', 'K-TUX', 'C.A.', '4', '2013-06-28', 'D', 'ktuxca@gmail.com'),
(4, 'unefistamiguel', 'ee4375c34ee19e6914fcd9e409b3158aa9b70928', 'Miguel', 'Diaz', '1', '2013-07-06', '', 'unefistamiguel@hotmail.com'),
(5, 'eeh_guedez', 'bfa7194ccd51024c4a4383df452df8ad20941a7f', 'ELBA', 'HERNANDEZ', '2', '2013-07-16', 'D', 'eeh_guedez@hotmail.com'),
(7, 'marialozada1704', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Maria', 'Lozada', '2', '2013-09-24', 'E', 'marialozada1704@gmail.com'),
(8, 'yerrikhauztariz', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Yerrikha', 'Uztariz', '3', '2013-09-24', 'E', 'yerrikhauztariz@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticias`
--

CREATE TABLE IF NOT EXISTS `noticias` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `titulo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` text COLLATE utf8_unicode_ci NOT NULL,
  `fecha` datetime NOT NULL,
  `status` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tipo` varchar(1) COLLATE utf8_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=3 ;

--
-- Volcado de datos para la tabla `noticias`
--

INSERT INTO `noticias` (`id`, `idu`, `titulo`, `descripcion`, `fecha`, `status`, `tipo`) VALUES
(1, 3, 'Información sobre Proyecto', '- Discusión Martes 23/09/2013.\n<pre>2do. Trayecto Informática Nocturno.</pre>', '2013-09-24 00:17:01', 'A', 'N'),
(2, 3, 'Prueba de noticia', '11111111111111111  \nAlguna noticia\n############\nprobando la publicacion\n/***********************/', '2013-09-26 11:12:06', 'A', 'N');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
