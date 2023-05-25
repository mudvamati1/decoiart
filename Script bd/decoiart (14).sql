-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 19-12-2022 a las 12:32:47
-- Versión del servidor: 10.4.24-MariaDB
-- Versión de PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `decoiart`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `id` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(400) NOT NULL,
  `imagen` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Cuadros', 'Cuadros hechos a mano', 'cuadro.jpg'),
(2, 'Posters', 'Posters de tu serie favorita', 'Avengers.jpg'),
(3, 'Tejidos', 'Tejidos hechos a crochet', 'Crochet.jpg'),
(4, 'Album', 'Albums musicales', 'Album.jpg'),
(5, 'Joyas', 'Joyas artesanales', 'Joyas.jpg'),
(6, 'Cartel', 'Cartel', 'cartel.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comuna`
--

CREATE TABLE `comuna` (
  `id` int(11) NOT NULL,
  `id_region` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comuna`
--

INSERT INTO `comuna` (`id`, `id_region`, `nombre`) VALUES
(1, 1, 'Arica'),
(2, 1, 'Camarones'),
(3, 1, 'General lagos'),
(4, 1, 'Putre'),
(5, 2, 'Alto hospicio'),
(6, 2, 'Camiña'),
(7, 2, 'Colchane'),
(8, 2, 'Huara'),
(9, 2, 'Iquique'),
(10, 2, 'Pozo almonte'),
(11, 2, 'Pica'),
(12, 3, 'Antofagasta'),
(13, 3, 'Calama'),
(14, 3, 'Maria Elena'),
(15, 3, 'Mejillones'),
(16, 3, 'Ollagüe'),
(17, 3, 'San pedro de atacama'),
(18, 3, 'Sierra Gorda'),
(19, 3, 'Taltal'),
(20, 3, 'Tocopilla'),
(21, 4, 'Alto del carmen'),
(22, 4, 'Chañaral'),
(23, 4, 'Copiapo'),
(24, 4, 'Caldera'),
(25, 4, 'Diego de Almagro'),
(26, 4, 'Freirina'),
(27, 4, 'Huasco'),
(28, 4, 'Tierra amarilla'),
(29, 4, 'Vallenar'),
(30, 5, 'Andacollo'),
(31, 5, 'Canela'),
(32, 5, 'Combarbala'),
(33, 5, 'Coquimbo'),
(34, 5, 'Illapel'),
(35, 5, 'La higuera'),
(36, 5, 'La serena'),
(37, 5, 'Los vilos'),
(38, 5, 'Monte patria'),
(39, 5, 'Ovalle'),
(40, 5, 'Paiguano'),
(41, 5, 'Punitaqui'),
(42, 5, 'Rio Hurtado'),
(43, 5, 'Salamanca'),
(44, 5, 'Vicuña'),
(45, 6, 'Algarrobo'),
(46, 6, 'Cabildo'),
(47, 6, 'Calle larga'),
(48, 6, 'Cartagena'),
(49, 6, 'Casablanca'),
(50, 6, 'Catemu'),
(51, 6, 'Concon'),
(52, 6, 'El Quisco'),
(53, 6, 'El tabo'),
(54, 6, 'Hijuela'),
(55, 6, 'Isla de pascua'),
(56, 6, 'Juan fernandez'),
(57, 6, 'La calera'),
(58, 6, 'La cruz'),
(59, 6, 'La ligua'),
(60, 6, 'Limache'),
(61, 6, 'LLayLLay'),
(62, 6, 'Los Andes'),
(63, 6, 'Nogales'),
(64, 6, 'Olmue'),
(65, 6, 'Panquehue'),
(66, 6, 'Papudo'),
(67, 6, 'Petorca'),
(68, 6, 'Puchuncavi'),
(69, 6, 'Putaendo'),
(70, 6, 'Quillota'),
(71, 6, 'Quilpue'),
(72, 6, 'Quintero'),
(73, 6, 'Rinconada'),
(74, 6, 'San Antonio'),
(75, 6, 'San Esteban'),
(76, 6, 'San Felipe'),
(77, 6, 'Santa maria'),
(78, 6, 'Santo Domingo'),
(79, 6, 'Valparaiso'),
(80, 6, 'Villa Alemana'),
(81, 6, 'Viña del mar'),
(82, 6, 'Zapallar'),
(85, 7, 'Alhue'),
(86, 7, 'Buin'),
(87, 7, 'Calera de tango'),
(88, 7, 'Cerrillos'),
(89, 7, 'Cerro Navia'),
(90, 7, 'Colina'),
(91, 7, 'Conchali'),
(92, 7, 'Curacavi'),
(93, 7, 'El bosque'),
(94, 7, 'El monte'),
(95, 7, 'Estacion Central'),
(96, 7, 'Huechuraba'),
(97, 7, 'Independencia'),
(98, 7, 'Isla De Maipo'),
(99, 7, 'La Cisterna'),
(100, 7, 'La Florida'),
(101, 7, 'La Granja'),
(102, 7, 'La Pintana'),
(103, 7, 'La Reina'),
(104, 7, 'Lampa'),
(105, 7, 'Las Condes'),
(106, 7, 'Lo Barnechea'),
(107, 7, 'Lo Espejo'),
(108, 7, 'Lo Prado'),
(109, 7, 'Macul'),
(110, 7, 'Maipu'),
(111, 7, 'Maria Pinto'),
(112, 7, 'Melipilla'),
(113, 7, 'Ñuñoa'),
(114, 7, 'Padre Hurtado'),
(115, 7, 'Paine'),
(116, 7, 'Pedro Aguirre Cerda'),
(117, 7, 'Peñaflor'),
(118, 7, 'Peñalolen'),
(119, 7, 'Pirque'),
(120, 7, 'Providencia'),
(121, 7, 'Pudahuel'),
(122, 7, 'Puente Alto'),
(123, 7, 'Quilicura'),
(124, 7, 'Quinta normal'),
(125, 7, 'Recoleta'),
(126, 7, 'San Bernardo'),
(127, 7, 'San Joaquin'),
(128, 7, 'San Jose de Maipo'),
(129, 7, 'San Miguel'),
(130, 7, 'San Pedro'),
(131, 7, 'San Ramon'),
(132, 7, 'Santiago'),
(133, 7, 'Talagante'),
(134, 7, 'Til-Til'),
(135, 7, 'Vitacura'),
(136, 8, 'Chepica'),
(137, 8, 'Chimbarongo'),
(138, 8, 'Codegua'),
(139, 8, 'Coinco'),
(140, 8, 'Coltauco'),
(141, 8, 'Doñigue'),
(142, 8, 'Graneros'),
(143, 8, 'La Estrella'),
(144, 8, 'Las Cabras'),
(145, 8, 'Litueche'),
(146, 8, 'Lolol'),
(147, 8, 'Machali'),
(148, 8, 'Malloa'),
(149, 8, 'Marchihue'),
(150, 8, 'Mostazal'),
(151, 8, 'Nancagua'),
(152, 8, 'Navidad'),
(153, 8, 'Olivar'),
(154, 8, 'Palmilla'),
(155, 8, 'Paredones'),
(156, 8, 'Peralillo'),
(157, 8, 'Peumo'),
(158, 8, 'Pichidegua'),
(159, 8, 'Pichilemu'),
(160, 8, 'Placilla'),
(161, 8, 'Pumanque'),
(162, 8, 'Quinta de Tilcoco'),
(163, 8, 'Rancagua'),
(164, 8, 'Rengo'),
(165, 8, 'Requinoa'),
(166, 8, 'San Fernando'),
(167, 8, 'San Vicente'),
(168, 8, 'Santa Cruz'),
(169, 9, 'Cauquenes'),
(170, 9, 'Chanco'),
(171, 9, 'Colbun'),
(172, 9, 'Constitucion'),
(173, 9, 'Curepto'),
(174, 9, 'Curico'),
(175, 9, 'Empedrado'),
(176, 9, 'Hualañe'),
(177, 9, 'Licanten'),
(178, 9, 'Linares'),
(179, 9, 'Longavi'),
(180, 9, 'Maule'),
(181, 9, 'Molina'),
(182, 9, 'Parral'),
(183, 9, 'Pelarco'),
(184, 9, 'Pelluhue'),
(185, 9, 'Pencahue'),
(186, 9, 'Rauco'),
(187, 9, 'Retiro'),
(188, 9, 'Rio Claro'),
(189, 9, 'Romeral'),
(190, 9, 'Sagrada Familia'),
(191, 9, 'San Clemente'),
(192, 9, 'San Javier'),
(193, 9, 'San Rafael'),
(194, 9, 'Talca'),
(195, 9, 'Teno'),
(196, 9, 'Vichuquen'),
(197, 9, 'Villa Alegre'),
(198, 9, 'Yerbas Buenas'),
(199, 10, 'Bulnes'),
(200, 10, 'Chillan'),
(201, 10, 'Chillan Viejo'),
(202, 10, 'Cobquecura'),
(203, 10, 'Coelemu'),
(204, 10, 'Coihueco'),
(205, 10, 'El Carmen'),
(206, 10, 'Ninhue'),
(207, 10, 'Ñiquen'),
(208, 10, 'Pemuco'),
(209, 10, 'Pinto'),
(210, 10, 'Portezuelo'),
(211, 10, 'Quillon'),
(212, 10, 'Quirihue'),
(213, 10, 'Ranquil'),
(214, 10, 'San Carlos'),
(215, 10, 'San Fabian'),
(216, 10, 'San Ignacio'),
(217, 10, 'San Nicolas'),
(218, 10, 'Trehuaco'),
(219, 10, 'Yungay'),
(222, 11, 'Alto Bio-Bio'),
(223, 11, 'Antuco'),
(224, 11, 'Arauco'),
(225, 11, 'Cabrero'),
(226, 11, 'Cañete'),
(227, 11, 'Chiguayante'),
(228, 11, 'Concepcion'),
(229, 11, 'Contulmo'),
(230, 11, 'Coronel'),
(231, 11, 'Curanilahue'),
(232, 11, 'Florida'),
(233, 11, 'Hualpen'),
(234, 11, 'Hualqui'),
(235, 11, 'Laja'),
(236, 11, 'Lebu'),
(237, 11, 'Los Alamos'),
(238, 11, 'Los Angeles'),
(239, 11, 'Lota'),
(240, 11, 'Mulchen'),
(241, 11, 'Nacimiento'),
(242, 11, 'Negrete'),
(243, 11, 'Penco'),
(244, 11, 'Quilaco'),
(245, 11, 'Quilleco'),
(246, 11, 'San Pedro de la Paz'),
(247, 11, 'San Rosendo'),
(248, 11, 'Santa Barbara'),
(249, 11, 'Santa Juana'),
(250, 11, 'Talcahuano'),
(251, 11, 'Tirua'),
(252, 11, 'Tome'),
(253, 11, 'Tucapel'),
(254, 11, 'Yumbel'),
(255, 12, 'Angol'),
(256, 12, 'Carahue'),
(257, 12, 'Cholchol'),
(258, 12, 'Collipulli'),
(259, 12, 'Cunco'),
(260, 12, 'Curacautin'),
(261, 12, 'Curarrehue'),
(262, 12, 'Ercilla'),
(263, 12, 'Freire'),
(264, 12, 'Galvarino'),
(265, 12, 'Gorbea'),
(266, 12, 'Lautaro'),
(267, 12, 'Loncoche'),
(268, 12, 'Lonquimay'),
(269, 12, 'Los Sauces'),
(270, 12, 'Lumaco'),
(271, 12, 'Melipeuco'),
(272, 12, 'Nueva Imperial'),
(273, 12, 'Padre Las Casas'),
(274, 12, 'Perquenco'),
(275, 12, 'Pitrufquen'),
(276, 12, 'Pucon'),
(277, 12, 'Puren'),
(278, 12, 'Renaico'),
(279, 12, 'Saavedra'),
(280, 12, 'Temuco'),
(281, 12, 'Teodoro Schmidt'),
(282, 12, 'Tolten'),
(283, 12, 'Traiguen'),
(284, 12, 'Victoria'),
(285, 12, 'Vilcun'),
(286, 12, 'Villarica'),
(287, 13, 'Corral'),
(288, 13, 'Futrono'),
(289, 13, 'La Union'),
(290, 13, 'Lago Ranco'),
(291, 13, 'Lanco'),
(292, 13, 'Los Lagos'),
(293, 13, 'Mafil'),
(294, 13, 'Mariquina'),
(295, 13, 'Paillaco'),
(296, 13, 'Panguipulli'),
(297, 13, 'Rio Bueno'),
(298, 13, 'Valdivia'),
(299, 14, 'Ancud'),
(300, 14, 'Calbuco'),
(301, 14, 'Castro'),
(302, 14, 'Chaiten'),
(303, 14, 'Chanchi'),
(304, 14, 'Cochamo'),
(305, 14, 'Curaco de Velez'),
(306, 14, 'Dalcachue'),
(307, 14, 'Fresia'),
(308, 14, 'Frutillar'),
(309, 14, 'Futaleufu'),
(310, 14, 'Hualaihue'),
(311, 14, 'Llanquihue'),
(312, 14, 'Los Muermos'),
(313, 14, 'Maullin'),
(314, 14, 'Osorno'),
(315, 14, 'Palena'),
(316, 14, 'Puerto Montt'),
(317, 14, 'Puerto Octay'),
(318, 14, 'Puerto Varas'),
(319, 14, 'Puqueldon'),
(320, 14, 'Purrance'),
(321, 14, 'Puyehue'),
(322, 14, 'Queilen'),
(323, 14, 'Quellon'),
(324, 14, 'Quemchi'),
(325, 14, 'Quinchao'),
(326, 14, 'Rio Negro'),
(327, 14, 'San Juan de la Costa'),
(328, 14, 'San Pablo'),
(329, 15, 'Aysen'),
(330, 15, 'Chile Chico'),
(331, 15, 'Cisnes'),
(332, 15, 'Cochrane'),
(333, 15, 'Coyhaique'),
(334, 15, 'Guaitecas'),
(335, 15, 'Lago Verde'),
(336, 15, 'O´Higgins'),
(337, 15, 'Rio Ibañez'),
(338, 15, 'Tortel'),
(339, 16, 'Antartica'),
(340, 16, 'Cabo de Hornos'),
(341, 16, 'Laguna Blanca'),
(342, 16, 'Natales'),
(343, 16, 'Porvenir'),
(344, 16, 'Primavera'),
(345, 16, 'Punta Arenas'),
(346, 16, 'Rio Verde'),
(347, 16, 'San Gregorio'),
(348, 16, 'Timaukel'),
(349, 16, 'Torres del Paine');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `id_contacto` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `telefono` varchar(12) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `mensaje` varchar(300) NOT NULL,
  `adjunto` varchar(200) DEFAULT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `contacto`
--

INSERT INTO `contacto` (`id_contacto`, `nombre`, `telefono`, `correo`, `mensaje`, `adjunto`, `fecha`, `estado`) VALUES
(22, 'prueba', '950126772', 'mortalacevedo@gmail.com', 'asdasdas', NULL, '2022-12-05 02:16:15', 1),
(23, 'prueba', '950126772', 'mortalacevedo1@gmail.com', 'sadsadsa', '1669939397.png', '2022-12-02 19:32:23', 2),
(25, 'prueba', '950126772', 'mortalacevedo1@gmail.com', 'asdasda', NULL, '2022-12-02 00:04:38', 1),
(26, 'prueba', '950126772', 'mortalacevedo1@gmail.com', 'ASDASD', NULL, '2022-12-02 00:15:25', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones`
--

CREATE TABLE `cotizaciones` (
  `id_cotizacion` int(11) NOT NULL,
  `rut_usuario` char(10) NOT NULL,
  `rut_vendedor` char(10) NOT NULL,
  `id_medida` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `medidas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizaciones`
--

INSERT INTO `cotizaciones` (`id_cotizacion`, `rut_usuario`, `rut_vendedor`, `id_medida`, `estatus`, `imagen`, `descripcion`, `cantidad`, `created_at`, `medidas`) VALUES
(1, '20448722-7', '76555678-6', 6000, 1, '1670517771.jpg', 'Prueba usuario logeado cotizacion', 3, '2022-12-12 12:10:19', '100x100cm'),
(2, '20448722-7', '76555678-6', 5000, 1, '1670528429.jpg', 'Prueba usuario logeado parte 2', 5, '2022-12-11 21:08:21', '100x100cm'),
(3, '20448722-7', '20448722-7', 6000, 1, '1670626866.jpg', 'Prueba usuario logeado cotizacion 09-12-2022', 3, '2022-12-11 00:42:43', '100x100cm'),
(4, '20448722-7', '22029127-8', NULL, 5, '1670811628.jpg', 'asdsad', 2, '2022-12-12 02:20:28', '123');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cotizaciones_invitado`
--

CREATE TABLE `cotizaciones_invitado` (
  `id_cotizacion` int(11) NOT NULL,
  `rut_usuario` char(10) NOT NULL,
  `nombre` varchar(150) NOT NULL,
  `apellido` varchar(150) NOT NULL,
  `correo` varchar(200) NOT NULL,
  `rut_vendedor` char(10) NOT NULL,
  `id_medida` int(11) DEFAULT NULL,
  `estatus` int(11) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `cantidad` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `medidas` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cotizaciones_invitado`
--

INSERT INTO `cotizaciones_invitado` (`id_cotizacion`, `rut_usuario`, `nombre`, `apellido`, `correo`, `rut_vendedor`, `id_medida`, `estatus`, `imagen`, `descripcion`, `cantidad`, `created_at`, `medidas`) VALUES
(1, '20448722-7', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '20448722-7', NULL, 6, '1670353014.jpg', 'Quiero que quede bonito con madera de alerce ', 2, '2022-12-12 11:51:56', '150x200'),
(2, '20448722-7', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '76555678-6', 7000, 1, '1670518013.jpg', 'Prueba usuario invitado cotizacion', 2, '2022-12-11 00:40:13', '100x100cm'),
(3, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', '76555678-6', 6000, 6, '1670626655.jpg', 'Prueba invitado 09-12-2022', 3, '2022-12-10 19:15:41', '100x100cm'),
(4, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '76555678-6', 5000, 1, '1670694631.jpg', 'Precio', 2, '2022-12-12 12:00:07', '100x100cm'),
(5, '9618565-0', 'Roberto', 'Acevedo', 'roberto@gmail.com', '20448722-7', 20000, 1, '1671412635.jpg', 'Prueba cotizacion usuario invitado', 5, '2022-12-19 01:18:23', '100x100cm');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cuadros`
--

CREATE TABLE `cuadros` (
  `id` int(11) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `medidas` varchar(100) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` int(11) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `vendedor` char(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cuadros`
--

INSERT INTO `cuadros` (`id`, `nombre`, `medidas`, `imagen`, `descripcion`, `precio`, `inventario`, `id_categoria`, `vendedor`) VALUES
(9, 'Cuadro avengers', '100x100cm', '1665857579.jpg', 'CUADRO DE AVENGERS DE MADERA DE ROBLE DIMENSIONES 100X100CM', 10000, 50, 1, '76555678-6'),
(10, 'Cuadro de prueba', '150x200cm', '1665854428.png', 'Este es un cuadro de prueba para verificar el agregar cuadro para decoiart', 5000, 30, 1, '76555678-6'),
(12, 'prueba', '150x200cm', '1665856031.jpg', 'Album musical de Michael Jackson', 120, 123, 1, '76555678-6'),
(13, 'Prueba 3', '100x100cm', '1666192461.jpg', 'prueba 3', 12345, 30, 1, '76555678-6'),
(14, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10003, 50, 1, '76555678-6'),
(15, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 30000, 50, 1, '76555678-6'),
(16, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(17, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(18, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(19, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(20, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(21, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(22, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(23, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(24, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6'),
(25, 'Cuadro Prueba', '100x100cm', '1665857579.jpg', 'Descripcion de prueba', 10000, 50, 1, '76555678-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios`
--

CREATE TABLE `envios` (
  `id_envio` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `comuna` int(11) NOT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `id_venta` int(11) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `estado_envio` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios`
--

INSERT INTO `envios` (`id_envio`, `region`, `direccion`, `comuna`, `cp`, `id_venta`, `telefono`, `estado_envio`) VALUES
(53, 7, 'Rene schneider 9465', 131, '9999999', 198, '+56950126772', 1),
(54, 7, 'Rene schneider 9465', 89, '8888', 199, '+56950126772', 2),
(55, 7, 'Rene schneider 9465', 131, '9999999', 202, '+56950126772', 1),
(56, 14, 'Rene Schneider 9465', 301, '999999', 259, '+56950126772', 1),
(57, 7, 'Rene schneider 9465', 100, '9999999', 270, '+56950126772', 1),
(58, 7, 'Rene schneider 9465', 131, '9999999', 276, '+56950126772', 1),
(59, 1, 'Rene schneider 9465', 3, '9999999', 278, '+56950126772', 1),
(60, 7, 'Rene schneider 9465', 131, '9999999', 280, '+56950126772', 1),
(61, 7, 'Rene schneider 9465', 99, '9999999', 282, '+56950126772', 1),
(62, 7, 'Rene Schneider 9465', 131, '999999', 292, '+56950126772', 1),
(63, 7, 'Rene Schneider 9465', 131, '999999', 293, '+56950126772', 1),
(64, 7, 'Rene Schneider 9465', 131, '999999', 295, '+56950126772', 1),
(65, 7, 'Rene Schneider 9465', 87, '999999', 297, '+56950126772', 1),
(66, 7, 'Rene Schneider 9465', 87, '999999', 299, '+56950126772', 1),
(67, 7, 'Rene Schneider 9465', 87, '999999', 301, '+56950126772', 1),
(68, 7, 'Rene Schneider 9465', 87, '999999', 303, '+56950126772', 1),
(69, 7, 'Rene Schneider 9465', 131, '999999', 305, '+56950126772', 1),
(70, 11, 'Rene Schneider 9465', 225, '999999', 307, '+56950126772', 1),
(71, 4, 'Rene Schneider 9465', 23, '999999', 310, '+56950126772', 1),
(72, 7, 'Rene Schneider 9465', 131, '999999', 312, '+56950126772', 1),
(73, 7, 'Rene Schneider 9465', 91, '999999', 313, '+56950126772', 1),
(74, 2, 'Rene Schneider 9465', 5, '999999', 315, '+56950126772', 1),
(75, 10, 'Rene Schneider 9465', 201, '999999', 318, '+56950126772', 1),
(76, 3, 'Rene Schneider 9465', 13, '999999', 320, '+56950126772', 1),
(77, 14, 'Rene Schneider 9465', 301, '999999', 322, '+56950126772', 1),
(78, 11, '', 225, '999999', 324, '+56950126772', 1),
(79, 2, 'Rene Schneider 9465', 6, '999999', 326, '+56950126772', 1),
(80, 7, 'Rene Schneider 9465', 131, '999999', 328, '+56950126772', 1),
(82, 7, 'Rene Schneider 9465', 91, '999999', 331, '+56950126772', 1),
(83, 10, 'Rene Schneider 9465', 206, '999999', 332, '+56950126772', 1),
(84, 12, 'Rene Schneider 9465', 257, '999999', 333, '+56950126772', 1),
(85, 3, 'Rene Schneider 9465', 12, '999999', 334, '+56950126772', 1),
(86, 9, 'Rene Schneider 9465', 173, '999999', 335, '+56950126772', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios_cotizacion`
--

CREATE TABLE `envios_cotizacion` (
  `id_envio` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `comuna` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `estado_envio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios_cotizacion`
--

INSERT INTO `envios_cotizacion` (`id_envio`, `region`, `direccion`, `comuna`, `id_venta`, `estado_envio`) VALUES
(1, 7, 'Rene schneider', 131, 1, 1),
(2, 8, 'Rene schneider 9465', 144, 2, 1),
(3, 6, 'Rene schneider 9465', 49, 3, 1),
(4, 2, 'Rene schneider 9465', 6, 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios_cotizacion_invitado`
--

CREATE TABLE `envios_cotizacion_invitado` (
  `id_envio` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `comuna` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `estado_envio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios_cotizacion_invitado`
--

INSERT INTO `envios_cotizacion_invitado` (`id_envio`, `region`, `direccion`, `comuna`, `id_venta`, `estado_envio`) VALUES
(1, 7, 'Rene schneider 9465', 131, 1, 1),
(2, 7, 'Rene schneider 9465', 131, 2, 1),
(3, 7, 'Rene schneider', 94, 3, 1),
(4, 7, 'Rene schneider 9465', 131, 4, 1),
(5, 10, 'Rene schneider 9465', 208, 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `envios_invitado`
--

CREATE TABLE `envios_invitado` (
  `id_envio` int(11) NOT NULL,
  `region` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `comuna` int(11) NOT NULL,
  `cp` varchar(50) DEFAULT NULL,
  `id_venta` int(11) NOT NULL,
  `telefono` varchar(30) NOT NULL,
  `estado_envio` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `envios_invitado`
--

INSERT INTO `envios_invitado` (`id_envio`, `region`, `direccion`, `comuna`, `cp`, `id_venta`, `telefono`, `estado_envio`) VALUES
(1, 7, 'Rene Schneider 9465', 131, '999999', 1, '+56950126772', 1),
(2, 7, 'Rene Schneider 9465', 131, '999999', 2, '+56950126772', 1),
(5, 7, 'Rene Schneider 9465', 91, '999999', 3, '+56950126772', 2),
(6, 7, 'Rene Schneider 9465', 93, '999999', 4, '+56950126772', 1),
(7, 6, 'Rene Schneider 9465', 47, '999999', 5, '+56950126772', 1),
(8, 6, 'Rene Schneider 9465', 48, '999999', 6, '+56950126772', 1),
(9, 5, 'Rene Schneider 9465', 34, '999999', 7, '+56950126772', 1),
(10, 5, 'Rene Schneider 9465', 33, '999999', 8, '+56950126772', 1),
(11, 10, 'Rene Schneider 9465', 206, '999999', 9, '+56950126772', 1),
(12, 7, 'Rene Schneider 9465', 91, '999999', 10, '+56950126772', 1),
(13, 6, 'Rene Schneider 9465', 49, '999999', 11, '+56950126772', 1),
(14, 4, 'Rene Schneider 9465', 24, '999999', 12, '+56950126772', 1),
(15, 5, 'Rene Schneider 9465', 35, '999999', 13, '+56950126772', 1),
(16, 1, 'Rene Schneider 9465', 1, '999999', 14, '+56950126772', 1),
(17, 4, 'Rene Schneider 9465', 23, '999999', 15, '+56950126772', 1),
(18, 7, 'Rene Schneider 9465', 88, '999999', 16, '+56950126772', 1),
(19, 8, 'Rene Schneider 9465', 142, '999999', 17, '+56950126772', 1),
(20, 7, 'Rene Schneider 9465', 90, '', 19, '+56950126772', 1),
(21, 7, 'Rene schneider 9465', 131, '', 20, '+56950126772', 1),
(22, 7, 'Rene schneider 9465', 131, '', 21, '+56950126772', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_contacto`
--

CREATE TABLE `estado_contacto` (
  `id_contacto` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_contacto`
--

INSERT INTO `estado_contacto` (`id_contacto`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Contestado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado_envio`
--

CREATE TABLE `estado_envio` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estado_envio`
--

INSERT INTO `estado_envio` (`id`, `descripcion`) VALUES
(1, 'Pendiente'),
(2, 'Enviado'),
(3, 'Entregado'),
(4, 'Anulado'),
(5, 'Enviado'),
(6, 'Entregado al courrier');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estatus`
--

CREATE TABLE `estatus` (
  `id` int(11) NOT NULL,
  `estatus` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `estatus`
--

INSERT INTO `estatus` (`id`, `estatus`) VALUES
(1, 'Pendiente\n'),
(2, 'En preparación'),
(3, 'Listo para ser enviado'),
(4, 'Cancelado'),
(5, 'En espera de cotización'),
(6, 'En espera de pago'),
(7, 'Enviado'),
(8, 'Entregado al courrier'),
(9, 'Entregado al destinatario');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `invitado`
--

CREATE TABLE `invitado` (
  `id_invitado` int(11) NOT NULL,
  `rut` char(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(150) NOT NULL,
  `fecha_nac` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `invitado`
--

INSERT INTO `invitado` (`id_invitado`, `rut`, `nombre`, `apellidos`, `correo`, `fecha_nac`, `created_at`) VALUES
(1, '20448722-7', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-05 20:56:27'),
(2, '12345678-9', 'Prueba', 'Invitado', 'invitado@gmail.com', '2000-06-23', '2022-12-05 21:07:49'),
(6, '20448722-7', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-09 22:54:27'),
(7, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 19:36:23'),
(8, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 19:42:52'),
(9, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 19:46:29'),
(10, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-05-22', '2022-12-11 19:48:56'),
(11, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 20:00:02'),
(12, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 20:06:03'),
(13, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 20:17:40'),
(14, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-05-23', '2022-12-11 20:40:05'),
(15, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 20:41:26'),
(16, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 20:45:41'),
(17, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 20:54:08'),
(18, '99999999-9', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-11 21:17:37'),
(19, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', '2000-06-23', '2022-12-12 04:59:25'),
(20, '20448722-7', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-12 04:59:50'),
(21, '20448722-7', 'Matias', 'Acevedo', 'mortalacevedo@gmail.com', '2000-06-23', '2022-12-12 11:10:00'),
(22, '9618565-0', 'Roberto', 'Acevedo', 'roberto@gmail.com', '2000-06-23', '2022-12-19 11:09:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `medidas`
--

CREATE TABLE `medidas` (
  `id_medida` int(11) NOT NULL,
  `medida` varchar(100) NOT NULL,
  `precio` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `medidas`
--

INSERT INTO `medidas` (`id_medida`, `medida`, `precio`) VALUES
(1, '50x50cm', 10000),
(2, '100x100cm', 20000),
(3, '150x70cm', 15000);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel`
--

CREATE TABLE `nivel` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `nivel`
--

INSERT INTO `nivel` (`id`, `descripcion`) VALUES
(1, 'cliente'),
(2, 'vendedor'),
(3, 'admin'),
(4, 'superAdmin');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `id_pago` int(11) NOT NULL,
  `metodo` varchar(60) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos`
--

INSERT INTO `pagos` (`id_pago`, `metodo`, `id_venta`) VALUES
(31, 'paypal', 198),
(32, 'paypal', 199),
(33, 'paypal', 202),
(34, 'paypal', 259),
(35, 'paypal', 276),
(38, 'paypal', 278),
(39, 'paypal', 280),
(40, 'paypal', 282),
(41, 'paypal', 293),
(42, 'paypal', 303),
(43, 'paypal', 303),
(44, 'paypal', 303),
(45, 'paypal', 303),
(46, 'paypal', 312),
(47, 'paypal', 315),
(48, 'paypal', 315),
(49, 'paypal', 315),
(50, 'paypal', 318),
(51, 'paypal', 324),
(52, 'paypal', 324),
(53, 'paypal', 326),
(54, 'paypal', 328),
(56, 'paypal', 331),
(58, 'paypal', 332),
(59, '', 332),
(60, 'paypal', 333),
(61, '', 333),
(62, '', 333),
(63, '', 333),
(64, '', 333),
(65, '', 333),
(66, '', 333),
(67, '', 333),
(68, '', 333),
(69, '', 333),
(70, '', 333),
(71, '', 333),
(72, '', 333),
(73, '', 333),
(74, '', 333),
(75, '', 333),
(76, '', 333),
(77, '', 333),
(78, '', 333),
(79, '', 333),
(80, '', 333),
(81, '', 333),
(82, '', 333),
(83, '', 333),
(84, '', 333),
(85, '', 333),
(86, '', 333),
(87, '', 333),
(88, '', 333),
(89, '', 333),
(90, '', 333),
(91, '', 333),
(92, '', 333),
(93, '', 333),
(94, '', 333),
(95, '', 333),
(96, '', 333),
(97, '', 333),
(98, '', 333),
(99, '', 333),
(100, 'paypal', 333),
(101, '', 333),
(102, '', 333),
(103, '', 333),
(104, '', 333),
(105, '', 333),
(106, '', 333),
(107, '', 333),
(108, '', 333),
(109, '', 333),
(110, '', 333),
(111, '', 333),
(112, '', 333),
(113, '', 333),
(114, '', 333),
(115, '', 333),
(116, '', 333),
(117, '', 333),
(118, '', 333),
(119, '', 333),
(120, '', 333),
(121, '', 333),
(122, '', 333),
(123, '', 333),
(124, '', 333),
(125, '', 333),
(126, '', 333),
(127, '', 333),
(128, '', 333),
(129, '', 333),
(130, '', 333),
(131, '', 333),
(132, '', 333),
(133, '', 333),
(134, '', 333),
(135, '', 333),
(136, '', 333),
(137, '', 333),
(138, '', 333),
(139, '', 333),
(140, 'paypal', 335),
(141, 'paypal', 335),
(142, 'paypal', 335),
(143, 'paypal', 335),
(144, 'paypal', 335),
(145, 'paypal', 335);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_cotizacion`
--

CREATE TABLE `pagos_cotizacion` (
  `id_pago` int(11) NOT NULL,
  `metodo` varchar(60) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_cotizacion`
--

INSERT INTO `pagos_cotizacion` (`id_pago`, `metodo`, `id_venta`) VALUES
(1, 'paypal', 1),
(3, 'paypal', 2),
(4, 'paypal', 3),
(15, 'paypal', 3),
(16, 'paypal', 3),
(17, 'mercado_pago', 2),
(18, 'paypal', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_cotizacion_invitado`
--

CREATE TABLE `pagos_cotizacion_invitado` (
  `id_pago` int(11) NOT NULL,
  `metodo` varchar(60) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_cotizacion_invitado`
--

INSERT INTO `pagos_cotizacion_invitado` (`id_pago`, `metodo`, `id_venta`) VALUES
(1, 'paypal', 2),
(6, 'paypal', 2),
(7, 'paypal', 4),
(8, 'paypal', 4),
(9, 'paypal', 4),
(10, 'paypal', 4),
(11, 'paypal', 4),
(12, 'paypal', 4),
(13, 'paypal', 4),
(14, 'paypal', 4),
(15, 'paypal', 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_invitado`
--

CREATE TABLE `pagos_invitado` (
  `id_pago` int(11) NOT NULL,
  `metodo` varchar(15) NOT NULL,
  `id_venta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `pagos_invitado`
--

INSERT INTO `pagos_invitado` (`id_pago`, `metodo`, `id_venta`) VALUES
(444, 'paypal', 11),
(445, 'paypal', 11),
(446, 'paypal', 12),
(447, 'paypal', 13),
(457, 'mercado_pago', 14),
(458, 'paypal', 15),
(459, 'paypal', 19),
(460, 'paypal', 20),
(461, 'paypal', 21);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `passwords`
--

CREATE TABLE `passwords` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `token` varchar(200) NOT NULL,
  `codigo` int(11) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `passwords`
--

INSERT INTO `passwords` (`id`, `email`, `token`, `codigo`, `fecha`) VALUES
(22, 'mortalacevedo@gmail.com', '2240a5aa94', 5362, '2022-12-11 17:45:35'),
(23, 'mortalacevedo@gmail.com', '7b7a0bbea7', 3595, '2022-12-11 17:52:35'),
(24, 'mortalacevedo@gmail.com', 'f91448c3e5', 6666, '2022-12-11 18:01:34'),
(25, 'mortalacevedo@gmail.com', '36146ab139', 5779, '2022-12-11 18:02:53'),
(26, 'mortalacevedo@gmail.com', '00931cfd2a', 6858, '2022-12-11 19:15:39'),
(27, 'mortalacevedo@gmail.com', '4cec4d4e0e', 3848, '2022-12-11 21:18:41'),
(28, 'imagineart@gmail.com', 'eb1182c3b8', 9064, '2022-12-19 11:24:20'),
(29, 'imagineart@gmail.com', '73d79a8a74', 1173, '2022-12-19 11:30:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id_producto` int(11) NOT NULL,
  `nombre` varchar(300) NOT NULL,
  `descripcion` text NOT NULL,
  `precio` double NOT NULL,
  `imagen` varchar(200) NOT NULL,
  `inventario` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `talla` varchar(100) NOT NULL,
  `rut_vendedor` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id_producto`, `nombre`, `descripcion`, `precio`, `imagen`, `inventario`, `id_categoria`, `talla`, `rut_vendedor`) VALUES
(256, 'Cuadro N° 0', 'Cuadros para ti', 371, 'cuadro.jpg', 65, 1, '100x60cm, Madera de alerce', '20448722-7'),
(257, 'Cuadro N° 1', 'Cuadros para ti', 437, 'cuadro.jpg', 26, 1, '100x60cm, Madera de alerce', '20448722-7'),
(258, 'Cuadro N° 2', 'Cuadros para ti', 658, 'cuadro.jpg', 30, 1, '100x60cm, Madera de alerce', '20448722-7'),
(259, 'Cuadro N° 3', 'Cuadros para ti', 478, 'cuadro.jpg', 71, 1, '100x60cm, Madera de alerce', '20448722-7'),
(260, 'Cuadro N° 4', 'Cuadros para ti', 893, 'cuadro.jpg', 36, 1, '100x60cm, Madera de alerce', '20448722-7'),
(261, 'Cuadro N° 5', 'Cuadros para ti', 705, 'cuadro.jpg', 3, 1, '100x60cm, Madera de alerce', '20448722-7'),
(262, 'Cuadro N° 6', 'Cuadros para ti', 134, 'cuadro.jpg', 22, 1, '100x60cm, Madera de alerce', '20448722-7'),
(263, 'Cuadro N° 7', 'Cuadros para ti', 445, 'cuadro.jpg', 92, 1, '100x60cm, Madera de alerce', '20448722-7'),
(264, 'Cuadro N° 8', 'Cuadros para ti', 411, 'cuadro.jpg', 48, 1, '100x60cm, Madera de alerce', '20448722-7'),
(265, 'Cuadro N° 9', 'Cuadros para ti', 662, 'cuadro.jpg', 38, 1, '100x60cm, Madera de alerce', '20448722-7'),
(266, 'Cuadro N° 10', 'Cuadros para ti', 310, 'cuadro.jpg', 32, 1, '100x60cm, Madera de alerce', '20448722-7'),
(267, 'Cuadro N° 11', 'Cuadros para ti', 859, 'cuadro.jpg', 71, 1, '100x60cm, Madera de alerce', '20448722-7'),
(268, 'Cuadro N° 12', 'Cuadros para ti', 223, 'cuadro.jpg', 79, 1, '100x60cm, Madera de alerce', '20448722-7'),
(269, 'Cuadro N° 13', 'Cuadros para ti', 23, 'cuadro.jpg', 27, 1, '100x60cm, Madera de alerce', '20448722-7'),
(270, 'Cuadro N° 14', 'Cuadros para ti', 136, 'cuadro.jpg', 7, 1, '100x60cm, Madera de alerce', '20448722-7'),
(271, 'Cuadro N° 15', 'Cuadros para ti', 86, 'cuadro.jpg', 34, 1, '100x60cm, Madera de alerce', '20448722-7'),
(272, 'Cuadro N° 16', 'Cuadros para ti', 768, 'cuadro.jpg', 79, 1, '100x60cm, Madera de alerce', '20448722-7'),
(273, 'Cuadro N° 17', 'Cuadros para ti', 600, 'cuadro.jpg', 61, 1, '100x60cm, Madera de alerce', '20448722-7'),
(274, 'Cuadro N° 18', 'Cuadros para ti', 868, 'cuadro.jpg', 12, 1, '100x60cm, Madera de alerce', '20448722-7'),
(275, 'Cuadro N° 19', 'Cuadros para ti', 468, 'cuadro.jpg', 63, 1, '100x60cm, Madera de alerce', '20448722-7'),
(276, 'Poster N° 0', 'Posters para ti', 412, 'Avengers.jpg', 98, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(277, 'Poster N° 1', 'Posters para ti', 244, 'Avengers.jpg', 62, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(278, 'Poster N° 2', 'Posters para ti', 980, 'Avengers.jpg', 91, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(279, 'Poster N° 3', 'Posters para ti', 76, 'Avengers.jpg', 65, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(280, 'Poster N° 4', 'Posters para ti', 935, 'Avengers.jpg', 92, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(281, 'Poster N° 5', 'Posters para ti', 974, 'Avengers.jpg', 29, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(282, 'Poster N° 6', 'Posters para ti', 47, 'Avengers.jpg', 61, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(283, 'Poster N° 7', 'Posters para ti', 983, 'Avengers.jpg', 11, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(284, 'Poster N° 8', 'Posters para ti', 800, 'Avengers.jpg', 65, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(285, 'Poster N° 9', 'Posters para ti', 630, 'Avengers.jpg', 16, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(286, 'Poster N° 10', 'Posters para ti', 845, 'Avengers.jpg', 95, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(287, 'Poster N° 11', 'Posters para ti', 830, 'Avengers.jpg', 65, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(288, 'Poster N° 12', 'Posters para ti', 542, 'Avengers.jpg', 65, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(289, 'Poster N° 13', 'Posters para ti', 634, 'Avengers.jpg', 9, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(290, 'Poster N° 14', 'Posters para ti', 633, 'Avengers.jpg', 27, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(291, 'Poster N° 15', 'Posters para ti', 483, 'Avengers.jpg', 38, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(292, 'Poster N° 16', 'Posters para ti', 217, 'Avengers.jpg', 32, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(293, 'Poster N° 17', 'Posters para ti', 761, 'Avengers.jpg', 36, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(294, 'Poster N° 18', 'Posters para ti', 487, 'Avengers.jpg', 77, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(295, 'Poster N° 19', 'Posters para ti', 988, 'Avengers.jpg', 51, 2, '100x60cm, Papel Fotografico brillante', '9618565-0'),
(296, 'Tejido N° 0', 'Tejidos para ti', 959, 'Crochet.jpg', 26, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(297, 'Tejido N° 1', 'Tejidos para ti', 481, 'Crochet.jpg', 35, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(298, 'Tejido N° 2', 'Tejidos para ti', 583, 'Crochet.jpg', 71, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(299, 'Tejido N° 3', 'Tejidos para ti', 871, 'Crochet.jpg', 7, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(300, 'Tejido N° 4', 'Tejidos para ti', 644, 'Crochet.jpg', 98, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(301, 'Tejido N° 5', 'Tejidos para ti', 637, 'Crochet.jpg', 76, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(302, 'Tejido N° 6', 'Tejidos para ti', 539, 'Crochet.jpg', 74, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(303, 'Tejido N° 7', 'Tejidos para ti', 489, 'Crochet.jpg', 65, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(304, 'Tejido N° 8', 'Tejidos para ti', 979, 'Crochet.jpg', 38, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(305, 'Tejido N° 9', 'Tejidos para ti', 133, 'Crochet.jpg', 21, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(306, 'Tejido N° 10', 'Tejidos para ti', 814, 'Crochet.jpg', 41, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(307, 'Tejido N° 11', 'Tejidos para ti', 95, 'Crochet.jpg', 49, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(308, 'Tejido N° 12', 'Tejidos para ti', 88, 'Crochet.jpg', 14, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(309, 'Tejido N° 13', 'Tejidos para ti', 437, 'Crochet.jpg', 68, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(310, 'Tejido N° 14', 'Tejidos para ti', 857, 'Crochet.jpg', 23, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(311, 'Tejido N° 15', 'Tejidos para ti', 811, 'Crochet.jpg', 64, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(312, 'Tejido N° 16', 'Tejidos para ti', 685, 'Crochet.jpg', 67, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(313, 'Tejido N° 17', 'Tejidos para ti', 416, 'Crochet.jpg', 56, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(314, 'Tejido N° 18', 'Tejidos para ti', 102, 'Crochet.jpg', 11, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(315, 'Tejido N° 19', 'Tejidos para ti', 382, 'Crochet.jpg', 76, 3, '30x30cm, Tecnica Crochet', '20448722-7'),
(316, 'Album N° 0', 'Albums para ti', 215, 'Album.jpg', 20, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(317, 'Album N° 1', 'Albums para ti', 729, 'Album.jpg', 10, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(318, 'Album N° 2', 'Albums para ti', 945, 'Album.jpg', 34, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(319, 'Album N° 3', 'Albums para ti', 729, 'Album.jpg', 18, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(320, 'Album N° 4', 'Albums para ti', 515, 'Album.jpg', 51, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(321, 'Album N° 5', 'Albums para ti', 83, 'Album.jpg', 88, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(322, 'Album N° 6', 'Albums para ti', 138, 'Album.jpg', 84, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(323, 'Album N° 7', 'Albums para ti', 256, 'Album.jpg', 79, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(324, 'Album N° 8', 'Albums para ti', 487, 'Album.jpg', 21, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(325, 'Album N° 9', 'Albums para ti', 258, 'Album.jpg', 96, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(326, 'Album N° 10', 'Albums para ti', 712, 'Album.jpg', 26, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(327, 'Album N° 11', 'Albums para ti', 71, 'Album.jpg', 93, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(328, 'Album N° 12', 'Albums para ti', 256, 'Album.jpg', 6, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(329, 'Album N° 13', 'Albums para ti', 259, 'Album.jpg', 33, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(330, 'Album N° 14', 'Albums para ti', 833, 'Album.jpg', 47, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(331, 'Album N° 15', 'Albums para ti', 135, 'Album.jpg', 70, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(332, 'Album N° 16', 'Albums para ti', 538, 'Album.jpg', 97, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(333, 'Album N° 17', 'Albums para ti', 369, 'Album.jpg', 44, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(334, 'Album N° 18', 'Albums para ti', 894, 'Album.jpg', 99, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(335, 'Album N° 19', 'Albums para ti', 88, 'Album.jpg', 83, 4, 'Genero Kpop, 9 canciones', '9618565-0'),
(336, 'JOya N° 0', 'Joyas para ti', 717, 'Joyas.jpg', 20, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(337, 'JOya N° 1', 'Joyas para ti', 158, 'Joyas.jpg', 81, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(338, 'JOya N° 2', 'Joyas para ti', 547, 'Joyas.jpg', 24, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(339, 'JOya N° 3', 'Joyas para ti', 813, 'Joyas.jpg', 92, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(340, 'JOya N° 4', 'Joyas para ti', 135, 'Joyas.jpg', 55, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(341, 'JOya N° 5', 'Joyas para ti', 299, 'Joyas.jpg', 12, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(342, 'JOya N° 6', 'Joyas para ti', 158, 'Joyas.jpg', 24, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(343, 'JOya N° 7', 'Joyas para ti', 762, 'Joyas.jpg', 39, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(344, 'JOya N° 8', 'Joyas para ti', 876, 'Joyas.jpg', 33, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(345, 'JOya N° 9', 'Joyas para ti', 445, 'Joyas.jpg', 99, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(346, 'JOya N° 10', 'Joyas para ti', 135, 'Joyas.jpg', 67, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(347, 'JOya N° 11', 'Joyas para ti', 534, 'Joyas.jpg', 17, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(348, 'JOya N° 12', 'Joyas para ti', 639, 'Joyas.jpg', 31, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(349, 'JOya N° 13', 'Joyas para ti', 42, 'Joyas.jpg', 50, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(350, 'JOya N° 14', 'Joyas para ti', 783, 'Joyas.jpg', 52, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(351, 'JOya N° 15', 'Joyas para ti', 823, 'Joyas.jpg', 67, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(352, 'JOya N° 16', 'Joyas para ti', 981, 'Joyas.jpg', 40, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(353, 'JOya N° 17', 'Joyas para ti', 590, 'Joyas.jpg', 36, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(354, 'JOya N° 18', 'Joyas para ti', 857, 'Joyas.jpg', 39, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(355, 'JOya N° 19', 'Joyas para ti', 516, 'Joyas.jpg', 18, 5, 'Ruby, esmeraldas, jade', '20448722-7'),
(357, 'Cuadro Decoiart', 'lalala', 30000, 'cuadro.jpg', 26, 1, '100x100cm', '76555678-6'),
(358, 'Cuadros Decoiart N° 0', 'Cuadro decoiart', 633, 'cuadro.jpg', 31, 1, 'Cuadro marca decoiart', '76555678-6'),
(360, 'Cuadro Decoiart N° 2', 'Cuadro decoiart', 990, 'cuadro.jpg', 42, 1, 'Cuadro marca decoiart', '76555678-6'),
(361, 'Cuadro Decoiart N° 3', 'Cuadro decoiart', 336, 'cuadro.jpg', 96, 1, 'Cuadro marca decoiart', '76555678-6'),
(362, 'Cuadro Decoiart N° 4', 'Cuadro decoiart', 770, 'cuadro.jpg', 22, 1, 'Cuadro marca decoiart', '76555678-6'),
(363, 'Cuadro Decoiart N° 5', 'Cuadro decoiart', 520, 'cuadro.jpg', 76, 1, 'Cuadro marca decoiart', '76555678-6'),
(364, 'Cuadro Decoiart N° 6', 'Cuadro decoiart', 834, 'cuadro.jpg', 52, 1, 'Cuadro marca decoiart', '76555678-6'),
(365, 'Cuadro Decoiart N° 7', 'Cuadro decoiart', 786, 'cuadro.jpg', 84, 1, 'Cuadro marca decoiart', '76555678-6'),
(366, 'Cuadro Decoiart N° 8', 'Cuadro decoiart', 290, 'cuadro.jpg', 8, 1, 'Cuadro marca decoiart', '76555678-6'),
(367, 'Cuadro Decoiart N° 9', 'Cuadro decoiart', 858, 'cuadro.jpg', 41, 1, 'Cuadro marca decoiart', '76555678-6'),
(368, 'Cuadro Decoiart N° 10', 'Cuadro decoiart', 218, 'cuadro.jpg', 21, 1, 'Cuadro marca decoiart', '76555678-6'),
(369, 'Cuadro Decoiart N° 11', 'Cuadro decoiart', 617, 'cuadro.jpg', 24, 1, 'Cuadro marca decoiart', '76555678-6'),
(370, 'Cuadro Decoiart N° 12', 'Cuadro decoiart', 201, 'cuadro.jpg', 23, 1, 'Cuadro marca decoiart', '76555678-6'),
(371, 'Cuadro Decoiart N° 13', 'Cuadro decoiart', 109, 'cuadro.jpg', 91, 1, 'Cuadro marca decoiart', '76555678-6'),
(372, 'Cuadro Decoiart N° 14', 'Cuadro decoiart', 100, 'cuadro.jpg', 52, 1, 'Cuadro marca decoiart', '76555678-6'),
(373, 'Cuadro Decoiart N° 15', 'Cuadro decoiart', 689, 'cuadro.jpg', 60, 1, 'Cuadro marca decoiart', '76555678-6'),
(374, 'Cuadro Decoiart N° 16', 'Cuadro decoiart', 86, 'cuadro.jpg', 92, 1, 'Cuadro marca decoiart', '76555678-6'),
(375, 'Cuadro Decoiart N° 17', 'Cuadro decoiart', 631, 'cuadro.jpg', 20, 1, 'Cuadro marca decoiart', '76555678-6'),
(376, 'Cuadro Decoiart N° 18', 'Cuadro decoiart', 10, 'cuadro.jpg', 82, 1, 'Cuadro marca decoiart', '76555678-6'),
(377, 'Cuadro Decoiart N° 19', 'Cuadro decoiart', 868, 'cuadro.jpg', 51, 1, 'Cuadro marca decoiart', '76555678-6'),
(378, 'Poster Decoiart N° 0', 'Poster decoiart', 956, 'Avengers.jpg', 24, 2, 'Poster marca decoiart', '76555678-6'),
(379, 'Poster Decoiart N° 1', 'Poster decoiart', 87, 'Avengers.jpg', 36, 2, 'Poster marca decoiart', '76555678-6'),
(380, 'Poster Decoiart N° 2', 'Poster decoiart', 327, 'Avengers.jpg', 47, 2, 'Poster marca decoiart', '76555678-6'),
(381, 'Poster Decoiart N° 3', 'Poster decoiart', 757, 'Avengers.jpg', 73, 2, 'Poster marca decoiart', '76555678-6'),
(382, 'Poster Decoiart N° 4', 'Poster decoiart', 20, 'Avengers.jpg', 14, 2, 'Poster marca decoiart', '76555678-6'),
(383, 'Poster Decoiart N° 5', 'Poster decoiart', 192, 'Avengers.jpg', 19, 2, 'Poster marca decoiart', '76555678-6'),
(384, 'Poster Decoiart N° 6', 'Poster decoiart', 182, 'Avengers.jpg', 58, 2, 'Poster marca decoiart', '76555678-6'),
(385, 'Poster Decoiart N° 7', 'Poster decoiart', 624, 'Avengers.jpg', 45, 2, 'Poster marca decoiart', '76555678-6'),
(386, 'Poster Decoiart N° 8', 'Poster decoiart', 516, 'Avengers.jpg', 70, 2, 'Poster marca decoiart', '76555678-6'),
(387, 'Poster Decoiart N° 9', 'Poster decoiart', 221, 'Avengers.jpg', 81, 2, 'Poster marca decoiart', '76555678-6'),
(388, 'Poster Decoiart N° 10', 'Poster decoiart', 136, 'Avengers.jpg', 60, 2, 'Poster marca decoiart', '76555678-6'),
(389, 'Poster Decoiart N° 11', 'Poster decoiart', 586, 'Avengers.jpg', 30, 2, 'Poster marca decoiart', '76555678-6'),
(390, 'Poster Decoiart N° 12', 'Poster decoiart', 878, 'Avengers.jpg', 12, 2, 'Poster marca decoiart', '76555678-6'),
(391, 'Poster Decoiart N° 13', 'Poster decoiart', 386, 'Avengers.jpg', 95, 2, 'Poster marca decoiart', '76555678-6'),
(392, 'Poster Decoiart N° 14', 'Poster decoiart', 360, 'Avengers.jpg', 13, 2, 'Poster marca decoiart', '76555678-6'),
(393, 'Poster Decoiart N° 15', 'Poster decoiart', 978, 'Avengers.jpg', 14, 2, 'Poster marca decoiart', '76555678-6'),
(394, 'Poster Decoiart N° 16', 'Poster decoiart', 228, 'Avengers.jpg', 9, 2, 'Poster marca decoiart', '76555678-6'),
(395, 'Poster Decoiart N° 17', 'Poster decoiart', 951, 'Avengers.jpg', 93, 2, 'Poster marca decoiart', '76555678-6'),
(396, 'Poster Decoiart N° 18', 'Poster decoiart', 384, 'Avengers.jpg', 13, 2, 'Poster marca decoiart', '76555678-6'),
(397, 'Poster Decoiart N° 19', 'Poster decoiart', 67, 'Avengers.jpg', 47, 2, 'Poster marca decoiart', '76555678-6'),
(398, 'prueba', 'sadasd', 2134, '1669748902.jpg', 10, 1, 'adssadasd', '20448722-7'),
(399, 'prueba', 'Decoiart inc', 9999, '1669748902.jpg', 65, 4, 'Decoiart inc', '76555678-6'),
(400, 'Nuevo', 'Producto', 3567, '1670786599.jpg', 339, 3, 'Decoiart inc', '20448722-7'),
(401, 'Nuevo2', 'sadasd', 34353, '1670786735.jpg', 35, 2, 'Decoiart inc', '20448722-7'),
(402, 'Linux1', 'Producto', 3242, '1670786895.jpg', 427, 4, 'Decoiart inc', '20448722-7'),
(404, 'prueba', 'Producto', 3424, '1670816798.jpg', 23, 2, 'Decoiart inc', '76555678-6'),
(405, 'prueba', 'Producto', 123, '1670816819.jpg', 23, 4, 'Decoiart inc', '76555678-6'),
(406, 'prueba', 'Producto', 31212, '1670816894.jpg', 212, 2, 'Decoiart inc', '76555678-6');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta`
--

CREATE TABLE `productos_venta` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL,
  `rut_vendedor` char(10) NOT NULL,
  `estatus` int(100) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_venta`
--

INSERT INTO `productos_venta` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`, `rut_vendedor`, `estatus`, `id_categoria`) VALUES
(56, 198, 295, 2, 988, 988, '20448722-7', 1, 1),
(57, 199, 354, 1, 857, 857, '20448722-7', 1, 1),
(58, 202, 355, 1, 516, 516, '20448722-7', 2, 2),
(59, 202, 294, 1, 487, 487, '9618565-0', 2, 3),
(60, 202, 335, 1, 88, 88, '9618565-0', 2, 1),
(62, 259, 357, 1, 30000, 30000, '76555678-6', 1, 0),
(63, 259, 355, 1, 516, 516, '20448722-7', 1, 0),
(64, 270, 357, 1, 30000, 30000, '76555678-6', 1, 0),
(65, 270, 355, 1, 516, 516, '20448722-7', 1, 0),
(66, 276, 357, 1, 30000, 30000, '76555678-6', 6, 1),
(67, 276, 355, 1, 516, 516, '20448722-7', 6, 1),
(68, 278, 357, 1, 30000, 30000, '76555678-6', 1, 1),
(69, 278, 355, 1, 516, 516, '20448722-7', 1, 5),
(70, 280, 357, 1, 30000, 30000, '76555678-6', 1, 1),
(71, 280, 355, 1, 516, 516, '20448722-7', 1, 5),
(72, 282, 357, 1, 30000, 30000, '76555678-6', 1, 1),
(73, 282, 351, 1, 823, 823, '20448722-7', 1, 5),
(75, 292, 377, 1, 868, 868, '76555678-6', 6, 1),
(76, 293, 397, 1, 67, 67, '76555678-6', 1, 2),
(77, 295, 396, 2, 384, 768, '76555678-6', 6, 2),
(78, 295, 376, 1, 10, 10, '76555678-6', 6, 1),
(79, 297, 397, 1, 67, 67, '76555678-6', 6, 2),
(80, 297, 377, 1, 868, 868, '76555678-6', 6, 1),
(81, 299, 397, 1, 67, 67, '76555678-6', 6, 2),
(82, 299, 377, 1, 868, 868, '76555678-6', 6, 1),
(83, 301, 397, 1, 67, 67, '76555678-6', 6, 2),
(84, 301, 377, 1, 868, 868, '76555678-6', 6, 1),
(85, 303, 397, 1, 67, 67, '76555678-6', 1, 2),
(86, 303, 377, 1, 868, 868, '76555678-6', 1, 1),
(87, 305, 396, 1, 384, 384, '76555678-6', 6, 2),
(88, 305, 376, 1, 10, 10, '76555678-6', 6, 1),
(89, 307, 397, 1, 67, 67, '76555678-6', 6, 2),
(90, 307, 376, 1, 10, 10, '76555678-6', 6, 1),
(91, 310, 397, 1, 67, 67, '76555678-6', 6, 2),
(92, 310, 376, 1, 10, 10, '76555678-6', 6, 1),
(93, 310, 395, 1, 951, 951, '76555678-6', 6, 2),
(94, 312, 397, 1, 67, 67, '76555678-6', 1, 2),
(95, 312, 376, 1, 10, 10, '76555678-6', 1, 1),
(96, 313, 396, 2, 384, 768, '76555678-6', 6, 2),
(97, 315, 396, 1, 384, 384, '76555678-6', 1, 2),
(98, 315, 375, 1, 631, 631, '76555678-6', 1, 1),
(99, 318, 396, 1, 384, 384, '76555678-6', 1, 2),
(100, 318, 375, 1, 631, 631, '76555678-6', 1, 1),
(101, 318, 397, 1, 67, 67, '76555678-6', 1, 2),
(102, 320, 397, 1, 67, 67, '76555678-6', 6, 2),
(103, 320, 376, 1, 10, 10, '76555678-6', 6, 1),
(104, 322, 397, 1, 67, 67, '76555678-6', 6, 2),
(105, 322, 376, 1, 10, 10, '76555678-6', 6, 1),
(106, 324, 396, 1, 384, 384, '76555678-6', 1, 2),
(107, 324, 375, 1, 631, 631, '76555678-6', 1, 1),
(108, 326, 392, 1, 360, 360, '76555678-6', 1, 2),
(109, 326, 375, 1, 631, 631, '76555678-6', 1, 1),
(110, 328, 399, 1, 9999, 9999, '76555678-6', 1, 4),
(111, 328, 398, 1, 2134, 2134, '20448722-7', 1, 1),
(112, 331, 398, 1, 2134, 2134, '20448722-7', 1, 1),
(113, 332, 401, 1, 34353, 34353, '20448722-7', 1, 2),
(114, 333, 401, 1, 34353, 34353, '20448722-7', 1, 2),
(115, 334, 396, 1, 384, 384, '76555678-6', 6, 2),
(116, 335, 401, 1, 34353, 34353, '20448722-7', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_venta_invitado`
--

CREATE TABLE `productos_venta_invitado` (
  `id` int(11) NOT NULL,
  `id_venta` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `cantidad` double NOT NULL,
  `precio` double NOT NULL,
  `subtotal` double NOT NULL,
  `rut_vendedor` char(10) NOT NULL,
  `estatus` int(11) NOT NULL,
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productos_venta_invitado`
--

INSERT INTO `productos_venta_invitado` (`id`, `id_venta`, `id_producto`, `cantidad`, `precio`, `subtotal`, `rut_vendedor`, `estatus`, `id_categoria`) VALUES
(1, 1, 398, 1, 5000, 9999, '76555678-6', 1, 4),
(2, 2, 395, 1, 9999, 9999, '76555678-6', 1, 4),
(3, 3, 395, 1, 9999, 9999, '76555678-6', 1, 4),
(4, 4, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(5, 5, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(6, 6, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(7, 7, 401, 1, 34353, 34353, '20448722-7', 1, 2),
(8, 8, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(9, 9, 401, 1, 34353, 34353, '20448722-7', 1, 2),
(10, 10, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(11, 11, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(12, 12, 401, 1, 34353, 34353, '20448722-7', 1, 2),
(13, 13, 401, 1, 34353, 34353, '20448722-7', 1, 2),
(14, 14, 402, 1, 3242, 3242, '20448722-7', 1, 4),
(15, 15, 400, 1, 3567, 3567, '20448722-7', 1, 3),
(16, 16, 400, 1, 3567, 3567, '20448722-7', 6, 3),
(17, 17, 400, 1, 3567, 3567, '20448722-7', 6, 3),
(18, 18, 400, 1, 3567, 3567, '20448722-7', 6, 3),
(19, 19, 400, 1, 3567, 3567, '20448722-7', 1, 3),
(20, 20, 400, 1, 3567, 3567, '20448722-7', 1, 3),
(21, 21, 406, 1, 31212, 31212, '76555678-6', 1, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `region`
--

CREATE TABLE `region` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `region`
--

INSERT INTO `region` (`id`, `nombre`) VALUES
(1, 'Region de Arica y parinacota'),
(2, 'Region de Tarapaca'),
(3, 'Region de Antofagasta'),
(4, 'Region de Atacama'),
(5, 'Region de Coquimbo'),
(6, 'Region de Valparaiso'),
(7, 'Region Metropolitana'),
(8, 'Region del Libertador bernardo O´Higgins'),
(9, 'Region del Maule'),
(10, 'Region del Ñuble'),
(11, 'Region del Bio-Bio'),
(12, 'Region de la Araucania'),
(13, 'Region de los Rios'),
(14, 'Region de los Lagos'),
(15, 'Region de Aysen del Gral. Carlos Ibañez Del Campo'),
(16, 'Region de Magallanes y de la Antártica Chilena');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `respuesta`
--

CREATE TABLE `respuesta` (
  `id_respuesta` int(11) NOT NULL,
  `id_correo` int(11) NOT NULL,
  `respuesta` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `respuesta`
--

INSERT INTO `respuesta` (`id_respuesta`, `id_correo`, `respuesta`) VALUES
(1, 23, 'No se crack jaja salu2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `trabajos`
--

CREATE TABLE `trabajos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `descripcion` varchar(150) NOT NULL,
  `imagen` varchar(150) NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp(),
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `trabajos`
--

INSERT INTO `trabajos` (`id`, `nombre`, `descripcion`, `imagen`, `fecha`, `id_categoria`) VALUES
(3, 'Cuadro Paisaje africano', 'Cuadro africa, medidas 100x100cm', 'Africa.jpg', '2022-12-16 18:22:21', 1),
(4, 'Cuadro anuel', 'Cuadro Anuel AA, medidas 100x100cm', 'anuel.jpg', '2022-12-16 18:22:21', 1),
(5, 'Cuadro astronauta', 'Cuadro astronauta, medidas 50x50cm', 'Astronauta.jpg', '2022-12-16 18:22:21', 1),
(6, 'Cuadro auto', 'Cuadro auto medidas 150x150cm', 'auto.jpg', '2022-12-16 18:22:21', 1),
(7, 'cuadro auto 2', 'Cuadro auto 2, medidas 100x100cm', 'auto2.jpg', '2022-12-16 18:22:21', 1),
(8, 'Cuadro avengers', 'Cuadro avengers, medida 100x100cm', 'Avengers.jpg', '2022-12-16 18:22:21', 1),
(9, 'Cuadro barco los simpsons', 'Cuadro barco los simpsons, medidas 100x100cm', 'Barco.jpg', '2022-12-16 18:22:21', 1),
(10, 'Cuadro Batman', 'Cuadro Batman, medidas 150x100cm', 'Batman.jpg', '2022-12-16 18:22:21', 1),
(11, 'Cuadro Bleach', 'Cuadro bleach, medidas 100x100cm', 'Bleach.jpg', '2022-12-16 18:32:06', 1),
(12, 'Cartel Barber Shop', 'Cartel barber shop, medidas 50x150cm', 'Cartel.jpg', '2022-12-16 18:32:06', 6),
(13, 'Cartel Se vende', 'Cartel se vende 50x150cm', 'Cartel2.jpg', '2022-12-16 18:32:06', 6),
(14, 'Cuadro castillo', 'Cuadro castillo, medidas 100x100cm', 'Castillo.jpg', '2022-12-16 18:32:06', 1),
(15, 'Cuadro Dbz', 'Cuadro dbz, medidas 100x100cm', 'dbz.jpg', '2022-12-16 18:32:06', 1),
(18, 'Cuadro Fortnite', 'Cuadro fortnite, medidas 100x100cm', 'Fortnite.jpg', '2022-12-16 19:19:34', 1),
(19, 'Cuadro Gasolinera', 'Cuadro Gasolinera, medidas 100x100cm', 'Gasolinera.jpg', '2022-12-16 19:19:34', 1),
(20, 'Cuadro Itachi y Sasuke', 'Cuadro Itachi, medidas 100x100cm', 'Itachi.jpg', '2022-12-16 19:25:40', 1),
(21, 'Cuadro King kong vs Godzilla', 'Cuadro King kong vs godzilla, medidas 100x100cm', 'KingKong.jpg', '2022-12-16 19:25:40', 1),
(22, 'Cuadro león multicolor', 'Cuadro leon multicolor, medidas 100x100cm', 'Leon.jpg', '2022-12-16 19:25:40', 1),
(23, 'Cuadro Leones', 'Cuadro leones, medidas 100x100cm', 'Leones.jpg', '2022-12-16 19:25:40', 1),
(24, 'Cuadro Lobo', 'Cuadro Lobo, medidas 100x100cm', 'Lobo.jpg', '2022-12-16 19:25:40', 1),
(25, 'Cuadro Mandalorian', 'Cuadro Mandalorian, Medidas 100x100cm', 'Mandalorian.jpg', '2022-12-16 19:25:40', 1),
(26, 'Cuadro Lionel Messi', 'Cuadro Lionel Messi, medidas 100x100cm', 'Messi.jpg', '2022-12-16 19:25:40', 1),
(27, 'Cuadro Mew y Mewtoo', 'Cuadro Mew y Mewtoo, Medidas 100x100cm', 'Mew.jpg', '2022-12-16 19:25:40', 1),
(28, 'Cuadro bandoleras', 'Cuadro bandoleras, medidas 100x100cm', 'Pistola.jpg', '2022-12-16 19:27:56', 1),
(29, 'Cuadro Pulp Fiction', 'Cuadro Pulp Fiction, Medidas 100x100cm', 'Pulpfiction.jpg', '2022-12-16 19:27:56', 1),
(30, 'Poster Rayquaza', 'Poster Rayquaza, medidas 100x50cm', 'Rayquaza.jpg', '2022-12-16 19:30:30', 2),
(31, 'Cuadro Rick y Morty', 'Cuadro Rick y morty, medidas 100x100cm', 'Rick.jpg', '2022-12-16 19:30:30', 1),
(32, 'Cuadro los simpsons', 'Cuadro los simpsons, medidas 100x100cm', 'Simpsons.jpg', '2022-12-16 19:31:44', 1),
(33, 'Cuadro Spiderman,Hulk,Iron man', 'Cuadro Avengers, medidas 100x100cm', 'spider.jpg', '2022-12-17 19:50:36', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `rut` char(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_nac` date DEFAULT NULL,
  `comuna` int(11) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `region` int(11) DEFAULT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`rut`, `nombre`, `apellidos`, `correo`, `password`, `fecha_nac`, `comuna`, `direccion`, `region`, `estado`, `created_at`, `nivel`) VALUES
('00000000-0', 'Juan', 'Jurado', 'juan@juan.com', '1498ad1cee566bfdb39ca1d6f8dc53043cd3ac51', '2000-05-23', 131, 'Rene schneider 9465', 7, 0, '2022-11-26 19:10:46', 1),
('10867564-6', 'Prueba', 'prueba', 'lulu@gmail.com', '03e16f37189b635e91b0148c213367316e0d0c55', '2000-06-23', 96, 'Rene schneider 9465', 7, 0, '2022-12-12 01:30:09', 1),
('14576876-9', 'prueba', 'prueba', 'rut@gmail.com', '03e16f37189b635e91b0148c213367316e0d0c55', '2000-06-23', 97, 'Rene schneider 9465', 7, 0, '2022-12-12 01:40:36', 1),
('20448722-6', 'Juan', 'Jurado', 'juan@juan.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2000-06-23', 92, 'Rene schneider 9465', 7, 0, '2022-09-28 17:16:06', 1),
('20448722-7', 'Matias', 'Acevedo Duran', 'mortalacevedo@gmail.com', '03e16f37189b635e91b0148c213367316e0d0c55', '2000-06-23', 150, 'Rene schneider 9465', 8, 0, '2022-12-11 21:24:05', 1),
('22029127-8', 'Prueba', 'prueba', 'prueba8@gmail.com', '03e16f37189b635e91b0148c213367316e0d0c55', '2000-06-23', 92, 'Rene schneider 9465', 7, 0, '2022-12-12 01:56:06', 1),
('22222222-2', 'prueba', 'prueba', 'prueba4@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2000-06-23', 96, 'Rene schneider 9465', 7, 0, '2022-12-04 18:11:15', 1),
('33333333-3', 'Prueba', 'Prueba', 'prueba5@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2000-06-23', 214, 'Rene schneider 9465', 10, 0, '2022-12-04 18:11:57', 1),
('76555678-6', 'Decoiart', 'Inc', 'imagineart.contact@gmail.com', '1498ad1cee566bfdb39ca1d6f8dc53043cd3ac51', '1967-05-27', 131, 'Rene schneider 9465', 7, 0, '2022-10-15 12:14:12', 3),
('9618565-0', 'Roberto', 'Acevedo Isla', 'roberto@gmail.com', '1498ad1cee566bfdb39ca1d6f8dc53043cd3ac51', '1964-08-08', 100, 'Rene schneider 9465', 7, 0, '2022-08-10 07:24:07', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vendedores`
--

CREATE TABLE `vendedores` (
  `rut_vendedor` char(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellidos` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `fecha_nac` date NOT NULL,
  `comuna` int(11) NOT NULL,
  `direccion` varchar(100) NOT NULL,
  `region` int(11) NOT NULL,
  `estado` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `nivel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `vendedores`
--

INSERT INTO `vendedores` (`rut_vendedor`, `nombre`, `apellidos`, `correo`, `password`, `fecha_nac`, `comuna`, `direccion`, `region`, `estado`, `created_at`, `nivel`) VALUES
('20448722-7', 'Matias', 'Acevedo', 'mortalacevedo1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2000-06-23', 213, 'Rene schneider 9465', 10, 0, '2022-11-25 23:14:21', 2),
('22029127-8', 'prueba', 'prueba', 'prueba1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2000-06-23', 131, 'Rene schneider 9465', 7, 0, '2022-11-25 23:29:21', 2),
('22222222-2', 'prueba', 'asdsa', 'prueba2@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '2000-06-23', 336, 'Rene schneider 9465', 15, 0, '2022-12-04 18:09:20', 1),
('33333333-3', 'Prueba', 'Prueba', 'prueba3@gmail.com', '1498ad1cee566bfdb39ca1d6f8dc53043cd3ac51', '2000-06-23', 2, 'Rene schneider 9465', 1, 0, '2022-12-04 18:10:17', 1),
('76555678-6', 'Decoiart', 'Inc', 'imagineart@gmail.com', '03e16f37189b635e91b0148c213367316e0d0c55', '2000-06-23', 131, 'Rene schneider', 7, 0, '2022-12-19 11:31:09', 3),
('9618565-0', 'Roberto', 'Acevedo', 'roberto1@gmail.com', '7110eda4d09e062aa5e4a390b0a572ac0d2c0220', '1964-08-08', 131, 'Rene schneider 9465', 7, 0, '2022-08-09 19:19:04', 2),
('99999999-9', 'Prueba', 'Prueba', 'lala@gmail.com', '1498ad1cee566bfdb39ca1d6f8dc53043cd3ac51', '1956-05-20', 308, 'Rene schneider 9465', 14, 0, '2022-12-04 18:30:43', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas`
--

CREATE TABLE `ventas` (
  `id` int(11) NOT NULL,
  `rut_usuario` char(10) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rut_vendedor` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas`
--

INSERT INTO `ventas` (`id`, `rut_usuario`, `total`, `fecha`, `rut_vendedor`) VALUES
(198, '20448722-7', 988, '2022-08-17 17:01:58', '9618565-0'),
(199, '20448722-7', 857, '2022-08-02 12:10:14', '20448722-7'),
(200, '20448722-7', 1091, '2022-09-02 13:10:05', '20448722-7'),
(201, '20448722-7', 1091, '2022-10-10 04:24:01', '9618565-0'),
(202, '20448722-7', 500, '2022-11-17 19:10:49', '9618565-0'),
(203, '20448722-7', 6000, '2022-10-19 19:48:24', '9618565-0'),
(204, '20448722-6', 30000, '2022-09-19 12:43:44', '20448722-7'),
(205, '20448722-7', 6000, '2022-11-16 12:44:43', '20448722-7'),
(206, '9618565-0', 20000, '2022-11-21 12:46:42', '9618565-0'),
(207, '20448722-7', 54500, '2022-11-21 12:58:18', '20448722-7'),
(209, '9618565-0', 54500, '2022-11-15 13:18:29', '76555678-6'),
(210, '9618565-0', 55555, '2022-11-15 13:18:29', '76555678-6'),
(211, '9618565-0', 55555, '2022-10-15 13:18:29', '76555678-6'),
(212, '9618565-0', 20000, '2022-10-15 13:18:29', '76555678-6'),
(213, '9618565-0', 20000, '2022-09-15 13:18:29', '76555678-6'),
(214, '9618565-0', 39213, '2022-09-15 13:18:29', '76555678-6'),
(215, '20448722-6', 54500, '2022-10-11 16:42:03', '20448722-7'),
(216, '20448722-6', 29584, '2022-10-18 16:42:03', '20448722-7'),
(217, '20448722-6', 54500, '2022-11-22 16:50:01', '76555678-6'),
(218, '20448722-6', 20000, '2022-10-20 16:51:58', '76555678-6'),
(219, '20448722-7', 21032, '2022-11-26 05:11:13', '20448722-7'),
(221, '20448722-7', 21032, '2022-11-26 05:11:00', '20448722-7'),
(223, '20448722-7', 21032, '2022-11-26 05:11:17', '20448722-7'),
(225, '20448722-7', 21032, '2022-11-26 05:11:20', '20448722-7'),
(227, '20448722-7', 21032, '2022-11-26 05:11:21', '20448722-7'),
(258, '20448722-7', 30516, '2022-11-26 06:11:33', '76555678-6'),
(259, '20448722-7', 30516, '2022-11-26 06:11:33', '20448722-7'),
(269, '20448722-7', 30516, '2022-11-26 09:11:40', '76555678-6'),
(270, '20448722-7', 30516, '2022-11-26 09:11:40', '20448722-7'),
(271, '20448722-7', 30516, '2022-11-26 09:11:04', '76555678-6'),
(272, '20448722-7', 30516, '2022-11-26 09:11:04', '20448722-7'),
(273, '20448722-7', 30516, '2022-11-26 09:11:25', '76555678-6'),
(274, '20448722-7', 30516, '2022-11-26 09:11:25', '20448722-7'),
(275, '20448722-7', 30516, '2022-11-26 09:11:00', '76555678-6'),
(276, '20448722-7', 30516, '2022-11-26 09:11:00', '20448722-7'),
(277, '20448722-7', 30516, '2022-11-26 09:11:40', '76555678-6'),
(278, '20448722-7', 30516, '2022-11-26 09:11:40', '20448722-7'),
(279, '00000000-0', 30516, '2022-11-26 11:11:46', '76555678-6'),
(280, '00000000-0', 30516, '2022-11-26 11:11:46', '20448722-7'),
(281, '00000000-0', 30823, '2022-11-26 11:11:03', '76555678-6'),
(282, '00000000-0', 30823, '2022-11-26 11:11:03', '20448722-7'),
(283, '20448722-7', 10516, '2022-11-27 04:11:04', '76555678-6'),
(284, '20448722-7', 10516, '2022-11-27 04:11:04', '20448722-7'),
(285, '20448722-7', 10516, '2022-11-27 04:11:18', '76555678-6'),
(286, '20448722-7', 10516, '2022-11-27 04:11:18', '20448722-7'),
(287, '20448722-7', 10516, '2022-11-27 04:11:24', '76555678-6'),
(288, '20448722-7', 10516, '2022-11-27 04:11:24', '20448722-7'),
(289, '20448722-7', 10516, '2022-11-27 04:11:33', '76555678-6'),
(290, '20448722-7', 10516, '2022-11-27 04:11:33', '20448722-7'),
(292, '20448722-7', 868, '2022-11-27 08:11:35', '76555678-6'),
(293, '20448722-7', 67, '2022-11-27 08:11:23', '76555678-6'),
(294, '20448722-7', 778, '2022-11-27 08:11:48', '76555678-6'),
(295, '20448722-7', 778, '2022-11-27 08:11:48', '76555678-6'),
(296, '20448722-7', 935, '2022-11-27 11:11:18', '76555678-6'),
(297, '20448722-7', 935, '2022-11-27 11:11:18', '76555678-6'),
(298, '20448722-7', 935, '2022-11-27 11:11:31', '76555678-6'),
(299, '20448722-7', 935, '2022-11-27 11:11:31', '76555678-6'),
(300, '20448722-7', 935, '2022-11-27 11:11:09', '76555678-6'),
(301, '20448722-7', 935, '2022-11-27 11:11:09', '76555678-6'),
(302, '20448722-7', 935, '2022-11-27 11:11:20', '76555678-6'),
(303, '20448722-7', 935, '2022-11-27 11:11:20', '76555678-6'),
(304, '20448722-7', 394, '2022-11-27 12:11:51', '76555678-6'),
(305, '20448722-7', 394, '2022-11-27 12:11:51', '76555678-6'),
(306, '20448722-7', 77, '2022-11-27 12:11:02', '76555678-6'),
(307, '20448722-7', 77, '2022-11-27 12:11:02', '76555678-6'),
(308, '20448722-7', 1028, '2022-11-27 13:11:44', '76555678-6'),
(309, '20448722-7', 1028, '2022-11-27 13:11:44', '76555678-6'),
(310, '20448722-7', 1028, '2022-11-27 13:11:44', '76555678-6'),
(311, '20448722-7', 77, '2022-11-28 05:11:04', '76555678-6'),
(312, '20448722-7', 77, '2022-11-28 05:11:04', '76555678-6'),
(313, '20448722-7', 768, '2022-11-28 05:11:01', '76555678-6'),
(314, '20448722-7', 1015, '2022-11-28 05:11:08', '76555678-6'),
(315, '20448722-7', 1015, '2022-11-28 05:11:08', '76555678-6'),
(316, '20448722-7', 1082, '2022-11-28 05:11:34', '76555678-6'),
(317, '20448722-7', 1082, '2022-11-28 05:11:34', '76555678-6'),
(318, '20448722-7', 1082, '2022-11-28 05:11:34', '76555678-6'),
(319, '20448722-7', 77, '2022-11-28 05:11:21', '76555678-6'),
(320, '20448722-7', 77, '2022-11-28 05:11:21', '76555678-6'),
(321, '20448722-7', 77, '2022-11-28 05:11:10', '76555678-6'),
(322, '20448722-7', 77, '2022-11-28 05:11:10', '76555678-6'),
(323, '20448722-7', 1015, '2022-11-28 05:11:07', '76555678-6'),
(324, '20448722-7', 1015, '2022-11-28 05:11:07', '76555678-6'),
(325, '20448722-7', 991, '2022-11-28 05:11:26', '76555678-6'),
(326, '20448722-7', 991, '2022-11-28 05:11:26', '76555678-6'),
(327, '20448722-7', 12133, '2022-12-05 12:12:27', '76555678-6'),
(328, '20448722-7', 12133, '2022-12-05 12:12:27', '20448722-7'),
(331, '20448722-7', 2134, '2022-12-09 14:12:10', '20448722-7'),
(332, '20448722-7', 34353, '2022-12-11 11:12:22', '20448722-7'),
(333, '20448722-7', 34353, '2022-12-11 11:12:13', '20448722-7'),
(334, '20448722-7', 384, '2022-12-11 11:12:16', '76555678-6'),
(335, '20448722-7', 34353, '2022-12-11 12:12:48', '20448722-7');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventas_invitado`
--

CREATE TABLE `ventas_invitado` (
  `id` int(11) NOT NULL,
  `rut_usuario` char(10) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `apellido` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `total` double NOT NULL,
  `fecha` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `rut_vendedor` char(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `ventas_invitado`
--

INSERT INTO `ventas_invitado` (`id`, `rut_usuario`, `nombre`, `apellido`, `correo`, `total`, `fecha`, `rut_vendedor`) VALUES
(1, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 9999, '2022-12-19 10:56:51', '76555678-6'),
(2, '12345678-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 9999, '2022-12-19 10:56:51', '76555678-6'),
(3, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 9999, '2022-12-19 10:56:51', '76555678-6'),
(4, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(5, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(6, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(7, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 34353, '2022-12-19 10:56:51', '20448722-7'),
(8, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(9, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 34353, '2022-12-19 10:56:51', '20448722-7'),
(10, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(11, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(12, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 34353, '2022-12-19 10:56:51', '20448722-7'),
(13, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 34353, '2022-12-19 10:56:51', '20448722-7'),
(14, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3242, '2022-12-19 10:56:51', '20448722-7'),
(15, '99999999-9', 'Matias', 'Acevedo', 'invitado@gmail.com', 3567, '2022-12-19 10:56:51', '20448722-7'),
(16, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 3567, '2022-12-19 10:56:51', '20448722-7'),
(17, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 3567, '2022-12-19 10:56:51', '20448722-7'),
(18, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 3567, '2022-12-19 10:56:51', '20448722-7'),
(19, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 3567, '2022-12-19 10:56:51', '20448722-7'),
(20, '20448722-7', 'Matias', 'Acevedo', 'invitado@gmail.com', 3567, '2022-12-19 10:56:51', '20448722-7'),
(21, '9618565-0', 'Roberto', 'Acevedo', 'roberto@gmail.com', 31212, '2022-12-19 15:12:21', '76555678-6');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_region` (`id_region`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `fk_contacto_estado` (`estado`);

--
-- Indices de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `fk_rut_usuario_cotizacion` (`rut_usuario`),
  ADD KEY `fk_rut_vendedor_cotizacion` (`rut_vendedor`),
  ADD KEY `fk_estatus_cotizacion` (`estatus`);

--
-- Indices de la tabla `cotizaciones_invitado`
--
ALTER TABLE `cotizaciones_invitado`
  ADD PRIMARY KEY (`id_cotizacion`),
  ADD KEY `fk_rut_vendedor_cotizacion_invitado` (`rut_vendedor`),
  ADD KEY `fk_estatus_cotizacion_invitado` (`estatus`);

--
-- Indices de la tabla `cuadros`
--
ALTER TABLE `cuadros`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_categoria_cuadors` (`id_categoria`),
  ADD KEY `fk_vendedor_cuadros` (`vendedor`);

--
-- Indices de la tabla `envios`
--
ALTER TABLE `envios`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `estado_envio` (`estado_envio`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `fk_region_envios` (`region`),
  ADD KEY `fk_comuna_envios` (`comuna`);

--
-- Indices de la tabla `envios_cotizacion`
--
ALTER TABLE `envios_cotizacion`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `fk_estado_envio_ec` (`estado_envio`),
  ADD KEY `fk_id_venta_ec` (`id_venta`),
  ADD KEY `fk_comuna_ec` (`comuna`),
  ADD KEY `fk_region_ec` (`region`);

--
-- Indices de la tabla `envios_cotizacion_invitado`
--
ALTER TABLE `envios_cotizacion_invitado`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `fk_region_eci` (`region`),
  ADD KEY `fk_comuna_eci` (`comuna`),
  ADD KEY `fk_id_venta_eci` (`id_venta`),
  ADD KEY `fk_estado_envio_eci` (`estado_envio`);

--
-- Indices de la tabla `envios_invitado`
--
ALTER TABLE `envios_invitado`
  ADD PRIMARY KEY (`id_envio`),
  ADD KEY `fk_ei_region` (`region`),
  ADD KEY `fk_ei_comuna` (`comuna`),
  ADD KEY `fk_ei_id_venta` (`id_venta`),
  ADD KEY `fk_ei_estado_envio` (`estado_envio`);

--
-- Indices de la tabla `estado_contacto`
--
ALTER TABLE `estado_contacto`
  ADD PRIMARY KEY (`id_contacto`);

--
-- Indices de la tabla `estado_envio`
--
ALTER TABLE `estado_envio`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estatus`
--
ALTER TABLE `estatus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `invitado`
--
ALTER TABLE `invitado`
  ADD PRIMARY KEY (`id_invitado`);

--
-- Indices de la tabla `medidas`
--
ALTER TABLE `medidas`
  ADD PRIMARY KEY (`id_medida`);

--
-- Indices de la tabla `nivel`
--
ALTER TABLE `nivel`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `id_venta` (`id_venta`);

--
-- Indices de la tabla `pagos_cotizacion`
--
ALTER TABLE `pagos_cotizacion`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_id_venta_pagos_c` (`id_venta`);

--
-- Indices de la tabla `pagos_cotizacion_invitado`
--
ALTER TABLE `pagos_cotizacion_invitado`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_id_venta_pagos_ci` (`id_venta`);

--
-- Indices de la tabla `pagos_invitado`
--
ALTER TABLE `pagos_invitado`
  ADD PRIMARY KEY (`id_pago`),
  ADD KEY `fk_pi_id_venta` (`id_venta`);

--
-- Indices de la tabla `passwords`
--
ALTER TABLE `passwords`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id_producto`),
  ADD KEY `rut_vendedor` (`rut_vendedor`),
  ADD KEY `id_categoria` (`id_categoria`);

--
-- Indices de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `estatus` (`estatus`),
  ADD KEY `id_venta` (`id_venta`),
  ADD KEY `id_producto` (`id_producto`),
  ADD KEY `rut_vendedor` (`rut_vendedor`);

--
-- Indices de la tabla `productos_venta_invitado`
--
ALTER TABLE `productos_venta_invitado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pri_id_venta` (`id_venta`),
  ADD KEY `fk_pri_id_producto` (`id_producto`),
  ADD KEY `fk_pri_rut_vendedor` (`rut_vendedor`),
  ADD KEY `fk_pri_estatus` (`estatus`);

--
-- Indices de la tabla `region`
--
ALTER TABLE `region`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD PRIMARY KEY (`id_respuesta`),
  ADD KEY `fk_id_correo` (`id_correo`);

--
-- Indices de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_id_categoria_trabajos` (`id_categoria`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`rut`),
  ADD KEY `nivel` (`nivel`),
  ADD KEY `fk_usuarios_region` (`region`),
  ADD KEY `fk_usuarios_comuna` (`comuna`);

--
-- Indices de la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD PRIMARY KEY (`rut_vendedor`),
  ADD KEY `nivel` (`nivel`),
  ADD KEY `fk_region_vendedores` (`region`),
  ADD KEY `fk_comuna_vendedores` (`comuna`);

--
-- Indices de la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `rut_usuario` (`rut_usuario`),
  ADD KEY `rut_vendedor` (`rut_vendedor`);

--
-- Indices de la tabla `ventas_invitado`
--
ALTER TABLE `ventas_invitado`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_vendedor_invitado` (`rut_vendedor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `comuna`
--
ALTER TABLE `comuna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=350;

--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `cotizaciones_invitado`
--
ALTER TABLE `cotizaciones_invitado`
  MODIFY `id_cotizacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `cuadros`
--
ALTER TABLE `cuadros`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=357;

--
-- AUTO_INCREMENT de la tabla `envios`
--
ALTER TABLE `envios`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=87;

--
-- AUTO_INCREMENT de la tabla `envios_cotizacion`
--
ALTER TABLE `envios_cotizacion`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `envios_cotizacion_invitado`
--
ALTER TABLE `envios_cotizacion_invitado`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `envios_invitado`
--
ALTER TABLE `envios_invitado`
  MODIFY `id_envio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `estado_contacto`
--
ALTER TABLE `estado_contacto`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estado_envio`
--
ALTER TABLE `estado_envio`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `estatus`
--
ALTER TABLE `estatus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `invitado`
--
ALTER TABLE `invitado`
  MODIFY `id_invitado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de la tabla `medidas`
--
ALTER TABLE `medidas`
  MODIFY `id_medida` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `nivel`
--
ALTER TABLE `nivel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=146;

--
-- AUTO_INCREMENT de la tabla `pagos_cotizacion`
--
ALTER TABLE `pagos_cotizacion`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `pagos_cotizacion_invitado`
--
ALTER TABLE `pagos_cotizacion_invitado`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `pagos_invitado`
--
ALTER TABLE `pagos_invitado`
  MODIFY `id_pago` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=462;

--
-- AUTO_INCREMENT de la tabla `passwords`
--
ALTER TABLE `passwords`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id_producto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=407;

--
-- AUTO_INCREMENT de la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

--
-- AUTO_INCREMENT de la tabla `productos_venta_invitado`
--
ALTER TABLE `productos_venta_invitado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `region`
--
ALTER TABLE `region`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT de la tabla `respuesta`
--
ALTER TABLE `respuesta`
  MODIFY `id_respuesta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `trabajos`
--
ALTER TABLE `trabajos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT de la tabla `ventas`
--
ALTER TABLE `ventas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=336;

--
-- AUTO_INCREMENT de la tabla `ventas_invitado`
--
ALTER TABLE `ventas_invitado`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comuna`
--
ALTER TABLE `comuna`
  ADD CONSTRAINT `fk_region` FOREIGN KEY (`id_region`) REFERENCES `region` (`id`);

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_estado` FOREIGN KEY (`estado`) REFERENCES `estado_contacto` (`id_contacto`);

--
-- Filtros para la tabla `cotizaciones`
--
ALTER TABLE `cotizaciones`
  ADD CONSTRAINT `fk_estatus_cotizacion` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id`),
  ADD CONSTRAINT `fk_rut_usuario_cotizacion` FOREIGN KEY (`rut_usuario`) REFERENCES `usuarios` (`rut`),
  ADD CONSTRAINT `fk_rut_vendedor_cotizacion` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`);

--
-- Filtros para la tabla `cotizaciones_invitado`
--
ALTER TABLE `cotizaciones_invitado`
  ADD CONSTRAINT `fk_estatus_cotizacion_invitado` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id`),
  ADD CONSTRAINT `fk_rut_vendedor_cotizacion_invitado` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`);

--
-- Filtros para la tabla `cuadros`
--
ALTER TABLE `cuadros`
  ADD CONSTRAINT `fk_categoria_cuadors` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`),
  ADD CONSTRAINT `fk_vendedor_cuadros` FOREIGN KEY (`vendedor`) REFERENCES `usuarios` (`rut`);

--
-- Filtros para la tabla `envios`
--
ALTER TABLE `envios`
  ADD CONSTRAINT `envios_ibfk_1` FOREIGN KEY (`estado_envio`) REFERENCES `estado_envio` (`id`),
  ADD CONSTRAINT `envios_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `fk_comuna_envios` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `fk_region_envios` FOREIGN KEY (`region`) REFERENCES `region` (`id`);

--
-- Filtros para la tabla `envios_cotizacion`
--
ALTER TABLE `envios_cotizacion`
  ADD CONSTRAINT `fk_comuna_ec` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `fk_estado_envio_ec` FOREIGN KEY (`estado_envio`) REFERENCES `estado_envio` (`id`),
  ADD CONSTRAINT `fk_id_venta_ec` FOREIGN KEY (`id_venta`) REFERENCES `cotizaciones` (`id_cotizacion`),
  ADD CONSTRAINT `fk_region_ec` FOREIGN KEY (`region`) REFERENCES `region` (`id`);

--
-- Filtros para la tabla `envios_cotizacion_invitado`
--
ALTER TABLE `envios_cotizacion_invitado`
  ADD CONSTRAINT `fk_comuna_eci` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `fk_estado_envio_eci` FOREIGN KEY (`estado_envio`) REFERENCES `estado_envio` (`id`),
  ADD CONSTRAINT `fk_id_venta_eci` FOREIGN KEY (`id_venta`) REFERENCES `cotizaciones_invitado` (`id_cotizacion`),
  ADD CONSTRAINT `fk_region_eci` FOREIGN KEY (`region`) REFERENCES `region` (`id`);

--
-- Filtros para la tabla `envios_invitado`
--
ALTER TABLE `envios_invitado`
  ADD CONSTRAINT `fk_ei_comuna` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `fk_ei_estado_envio` FOREIGN KEY (`estado_envio`) REFERENCES `estado_envio` (`id`),
  ADD CONSTRAINT `fk_ei_id_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas_invitado` (`id`),
  ADD CONSTRAINT `fk_ei_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`);

--
-- Filtros para la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD CONSTRAINT `pagos_ibfk_1` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`);

--
-- Filtros para la tabla `pagos_cotizacion`
--
ALTER TABLE `pagos_cotizacion`
  ADD CONSTRAINT `fk_id_venta_pagos_c` FOREIGN KEY (`id_venta`) REFERENCES `cotizaciones` (`id_cotizacion`);

--
-- Filtros para la tabla `pagos_cotizacion_invitado`
--
ALTER TABLE `pagos_cotizacion_invitado`
  ADD CONSTRAINT `fk_id_venta_pagos_ci` FOREIGN KEY (`id_venta`) REFERENCES `cotizaciones_invitado` (`id_cotizacion`);

--
-- Filtros para la tabla `pagos_invitado`
--
ALTER TABLE `pagos_invitado`
  ADD CONSTRAINT `fk_pi_id_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas_invitado` (`id`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_ibfk_1` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`),
  ADD CONSTRAINT `productos_ibfk_2` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `productos_venta`
--
ALTER TABLE `productos_venta`
  ADD CONSTRAINT `productos_venta_ibfk_1` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id`),
  ADD CONSTRAINT `productos_venta_ibfk_2` FOREIGN KEY (`id_venta`) REFERENCES `ventas` (`id`),
  ADD CONSTRAINT `productos_venta_ibfk_3` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `productos_venta_ibfk_4` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`);

--
-- Filtros para la tabla `productos_venta_invitado`
--
ALTER TABLE `productos_venta_invitado`
  ADD CONSTRAINT `fk_pri_estatus` FOREIGN KEY (`estatus`) REFERENCES `estatus` (`id`),
  ADD CONSTRAINT `fk_pri_id_producto` FOREIGN KEY (`id_producto`) REFERENCES `productos` (`id_producto`),
  ADD CONSTRAINT `fk_pri_id_venta` FOREIGN KEY (`id_venta`) REFERENCES `ventas_invitado` (`id`),
  ADD CONSTRAINT `fk_pri_rut_vendedor` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`);

--
-- Filtros para la tabla `respuesta`
--
ALTER TABLE `respuesta`
  ADD CONSTRAINT `fk_id_correo` FOREIGN KEY (`id_correo`) REFERENCES `contacto` (`id_contacto`);

--
-- Filtros para la tabla `trabajos`
--
ALTER TABLE `trabajos`
  ADD CONSTRAINT `fk_id_categoria_trabajos` FOREIGN KEY (`id_categoria`) REFERENCES `categorias` (`id`);

--
-- Filtros para la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `fk_usuarios_comuna` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `fk_usuarios_region` FOREIGN KEY (`region`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `usuarios_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`);

--
-- Filtros para la tabla `vendedores`
--
ALTER TABLE `vendedores`
  ADD CONSTRAINT `fk_comuna_vendedores` FOREIGN KEY (`comuna`) REFERENCES `comuna` (`id`),
  ADD CONSTRAINT `fk_region_vendedores` FOREIGN KEY (`region`) REFERENCES `region` (`id`),
  ADD CONSTRAINT `vendedores_ibfk_1` FOREIGN KEY (`nivel`) REFERENCES `nivel` (`id`);

--
-- Filtros para la tabla `ventas`
--
ALTER TABLE `ventas`
  ADD CONSTRAINT `ventas_ibfk_1` FOREIGN KEY (`rut_usuario`) REFERENCES `usuarios` (`rut`),
  ADD CONSTRAINT `ventas_ibfk_2` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`);

--
-- Filtros para la tabla `ventas_invitado`
--
ALTER TABLE `ventas_invitado`
  ADD CONSTRAINT `fk_vendedor_invitado` FOREIGN KEY (`rut_vendedor`) REFERENCES `vendedores` (`rut_vendedor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
