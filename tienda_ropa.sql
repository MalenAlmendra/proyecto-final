-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 07-12-2018 a las 03:01:21
-- Versión del servidor: 10.1.37-MariaDB
-- Versión de PHP: 7.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `tienda_ropa`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colores`
--

CREATE TABLE `colores` (
  `color_codigo` bigint(20) UNSIGNED NOT NULL,
  `color_descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `colores`
--

INSERT INTO `colores` (`color_codigo`, `color_descripcion`) VALUES
(1, 'Negro'),
(2, 'Blanco'),
(3, 'Rojo'),
(4, 'Amarillo'),
(5, 'Verde'),
(6, 'Gris'),
(7, 'Rosa'),
(8, 'Azul'),
(9, 'Celeste'),
(10, 'Marrón');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE `marcas` (
  `marca_codigo` bigint(20) UNSIGNED NOT NULL,
  `marca_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`marca_codigo`, `marca_desc`) VALUES
(1, '47 Street'),
(2, 'Adidas'),
(3, 'Fila'),
(4, 'La Leopolda'),
(5, 'Levis'),
(6, 'Moleca'),
(7, 'Muaa'),
(8, 'Nike'),
(9, 'Paruolo'),
(10, 'Prüne'),
(11, 'Punto1'),
(12, 'Ray-Ban'),
(13, 'Simones'),
(14, 'Taverniti'),
(15, 'Valkur'),
(16, 'Viamo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `prod_cod` bigint(20) UNSIGNED NOT NULL,
  `prod_nomb` varchar(60) NOT NULL,
  `prod_desc` text NOT NULL,
  `prod_img` varchar(500) NOT NULL,
  `prod_precio_unit` decimal(4,0) NOT NULL,
  `prod_marca` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`prod_cod`, `prod_nomb`, `prod_desc`, `prod_img`, `prod_precio_unit`, `prod_marca`) VALUES
(1, 'Anteojos celestes', 'Anteojos de sol unisex', 'images/Accesorios/anteojoscelestes.jpg', '1000', 12),
(101, 'Anteojos verdes', 'anteojos de sol', 'images/Accesorios/anteojosverdes.jpg', '1000', 12),
(102, 'Bolso gamuza', 'Bolso cartera mujer grande estampado de gamuza', 'images/Accesorios/bolsogamuza.jpg', '900', 13),
(103, 'Cartera Cherie', 'Bolso cartera de mujer estampada con adorno', 'images/Accesorios/carteracherie.jpg', '900', 13),
(104, 'Mochila Plateada', 'Mochila amplia para mujer con tiras reguladoras', 'images/Accesorios/mochilaplateada.jpg', '1200', 13),
(105, 'Anteojos Degrade', 'Anteojos de sol', 'images/Accesorios/anteojosdegrade.jpg', '1100', 12),
(106, 'Mochila de Pajaros', 'Mochila boomerang Blanco y verde con estampas de pajaros', 'images/Accesorios/mochilapajaros.jpg', '1400', 4),
(107, 'Cartera con moneder', 'Bolso animal print con monedero', 'images/Accesorios/carteramonedero.jpg', '1900', 10),
(108, 'Mochila Prüne', 'Mochila para mujer con estampas', 'images/Accesorios/mochilaprune.jpg', '1400', 10),
(109, 'Cartera de cuero', 'Cartera de cuero con suela negra y dorada', 'images/Accesorios/carteradecuero.jpg', '900', 4),
(110, 'Cartera Rosa', 'Cartera grande. Alto:28cm Ancho:43cm. Profundidad:14cm. Ecocuero con cierre', 'images/Accesorios/carterarosa.jpg', '1500', 4),
(111, 'Cartera Marrón', 'Cartera mediana. Alto:33cm. Ancho:40cm. Profundidad:10cm. Poliuretano con cierre y bolsillo interno.', 'images/Accesorios/carteramarron.jpg', '1500', 6),
(112, 'Cartera Beige', 'Cartera Mediana. Alto:37cm. Ancho:16,5cm. Profundidad:28cm. Poliuretano', 'images/Accesorios/carterabeige.jpg', '1450', 4),
(113, 'Cartera Negra', 'Cartera pequeña. Alto:21cm. Ancho:24cm. Profundidad:11cm. Poliuretano con bolsillos internos.', 'images/Accesorios/carteranegra.jpg', '1300', 1),
(114, 'Reloj Blanco', 'Reloj para mujer con cronometro.', 'images/Accesorios/relojblanco.jpg', '1600', 15),
(130, 'Jean Azul', ' Jean tiro medio, chupin elastisado', 'images/pantalones/jeanazul.jpg', '1400', 14),
(131, 'Jean con Roturas', 'Jean tiro alto con roturas', 'images/pantalones/jeanroturas.jpg', '1350', 7),
(132, 'Jean Azul oscuro', 'Jean azul oscuro tiro alto chupin', 'images/pantalones/jeanazuloscuro.jpg', '1400', 14),
(133, 'Jean azul roturas', 'JEan tiro medio con detalles de roturas', 'images/pantalones/jeanazulroturas.jpg', '1350', 5),
(134, 'Jean Blanco', 'Jean tiro medio blanco con detalles de rotura', 'images/pantalones/jeanblanco.jpg', '1500', 1),
(135, 'Jean Liso', 'Jean tiro alto liso chupin', 'images/pantalones/jeanliso.jpg', '1400', 7),
(136, 'Jean Oxford', 'Jean tiro alto oxford', 'images/pantalones/jeanoxford.jpg', '1350', 14),
(137, 'Jean roturas celeste', 'Jean tiro alto con roturas chupin', 'images/pantalones/jeanroturasceleste.jpg', '1450', 1),
(138, 'Short Blanco', 'Short blanco tiro alto con detalles de flecos', 'images/pantalones/shortblanco.jpg', '1150', 1),
(139, 'Short blanco bolados', 'Short tiro medio de algodón con detalles de bolados', 'images/pantalones/shortblancobolados.jpg', '1100', 14),
(140, 'Short Rayas', 'Short tiro medio con elástico de poliester y elastano', 'images/pantalones/shortrayas.jpg', '1000', 14),
(141, 'Short Rotura', 'Short tiro alto con roturas', 'images/pantalones/shortroturas.jpg', '1250', 7),
(142, 'Calza Blanca', 'Calza con tachas tiro alto. 60% viscosa, 36% poliester, 4% elastano', 'images/pantalones/calzablanca.jpg', '1100', 7),
(143, 'Calza Engomada', 'Calza tiro alto engomada. 44% Poliamida, 44% poliester, 12% elastano', 'images/pantalones/calzaengomada.jpg', '1100', 7),
(144, 'Jean Azulito', 'Jean Azul tiro medio chupin', 'images/pantalones/jeanazul2.jpg', '1300', 5),
(145, 'Remera Negra Flecos', 'Remera sin mangas confeccionada en Lino Valencia. Con escote redondo y flecos en recorte delantero. Composicion:55% Lino 45% Poliester. Origen: Argentina', 'images/remeras/remeranegraflecos.jpg', '600', 14),
(146, 'Remera Negra Estampada', 'Remera manga corta confexionada con Jersey Pima, con estampa. Composición:100% algodón. Origen: Argentina', 'images/remeras/remeranegraestampa.jpg', '450', 14),
(147, 'Remera Blanca', 'Remera manga corta, confeccionada con jersey pima con estampa. Composición: 100% algodón. Origen: Argentina', 'images/remeras/remerablanca.jpg', '400', 7),
(148, 'Remera Negra Estrellas', 'Remera manga corta en Viscvosa con escote V. Composicion 95% Viscosa- 5% Elastano. Origen: Argentina.', 'images/remeras/remeranegraestrellas.jpg', '450', 7),
(149, 'Remera Gris', 'Remera con escote redondo y manga corta con estampa en el delantero. Composicion: 100% Algodon. Origen: Argentina.', 'images/remeras/remeragris.jpg', '400', 14),
(150, 'Remera Negra Letras Rojas', 'Remera escote redondo y manga corta. Con tajo en los laterales y largos irregulares. Composicion: 100% Rayon. Origen: Argentina.', 'images/remeras/remeranegraletrasrojas.jpg', '400', 14),
(151, 'Remera con rosa', 'Remera escote en V, manga corta y escote en los laterales y largos irregulares. Composicion 100% Rayon. Origen: Argentina.', 'images/remeras/remeraconrosa.jpg', '400', 7),
(152, 'Remera Blanquita', 'Remera de algodón y lycra con estampa.', 'images/remeras/remerablanca2.jpg', '450', 1),
(153, 'Remera Top', 'Remera de algodón sin mangas, top', 'images/remeras/remeratop.jpg', '400', 1),
(154, 'Remera Musculosa', 'Musculosa 100% algodón casual.', 'images/remeras/remeramusculosa.jpg', '400', 1),
(155, 'Remera negra y blanca', 'Remera de algodon, manga corta.', 'images/remeras/remeranegrayblanca.jpg', '450', 1),
(156, 'Remera Mostaza', 'Remera manga larga, 95% viscosa, 5% elastano', 'images/remeras/remeramostaza.jpg', '500', 14),
(157, 'Remera Rainbow', 'Remera manga corta 100% algodón.', 'images/remeras/remerarainbow.jpg', '500', 1),
(158, 'Remera Rayada', 'Remera manga corta 100% viscosa', 'images/remeras/remerarayada.jpg', '500', 14),
(159, 'Remera Espacio', 'Remera manga corta. 65% poliester 35% algodón', 'images/remeras/remeraespacio.jpg', '500', 1),
(160, 'Calza con recorte', 'Calza larga chupin tiro alto, cintura ancha, detalle en red y recorte', 'images/deportiva/calzaconrecorte.jpg', '700', 11),
(161, 'Remera Gris microfibra', 'Remera manga larga de microfibra', 'images/deportiva/remeragrismicrofibra.jpg', '650', 11),
(162, 'Remera Just Do It', 'Remera de algodón y lycra con inscripción Just Do It', 'images/deportiva/remerajustdoit.jpg', '500', 8),
(163, 'Calza gris lisa', 'Calza tiro alto lisa, cintura ancha', 'images/deportiva/calzagrislisa.jpg', '600', 11),
(164, 'Calza gris rosa', 'Calza tiro alto combinada', 'images/deportiva/calzagrisrosa.jpg', '600', 11),
(165, 'Campera Salmón', 'Campera de lycra', 'images/deportiva/camperasalmon.jpg', '650', 2),
(166, 'Musculosa verde', 'Remera de lycra', 'images/deportiva/musculosaverde.jpg', '400', 2),
(167, 'Musculosa rosa negra', 'Musculosa de mujer con estampa', 'images/deportiva/musculosarosanegra.jpg', '400', 11),
(168, 'Calza deportiva', 'Calza deportiva para mujer tiro medio de Supplex Class Life', 'images/deportiva/calzadeportiva.jpg', '450', 3),
(169, 'Campera negra', 'Campera de lycra', 'images/deportiva/camperanegra.jpg', '650', 3),
(170, 'Remera Roja', 'Remera roja, cuello redondo con inscripción en blanco, de lycra con algodón', 'images/deportiva/remeraroja.jpg', '400', 3),
(171, 'Conjunto Deportivo', 'Conjunto para mujer de lycra color negra con detalles de gris', 'images/deportiva/conjuntodep.jpg', '850', 11),
(172, 'Conjunto Deportivo2', 'Conjunto negro con gris y recortes de tul. Top color negro', 'images/deportiva/conjuntodep2.jpg', '850', 11),
(173, 'Conjunto Deportivo3', 'Calza tiro medio gris con naranja. Top naranja', 'images/deportiva/conjuntodep3.jpg', '850', 11),
(174, 'Remera Rosa', 'Remera deportiva 100% algodón.', 'images/deportiva/remerarosa.jpg', '500', 3),
(175, 'Zapatillas Blancas', 'Zapatillas de lycra y cuero con lengueta alta y dome de goma en blanco y fluor. Base deportiva blanca.', 'images/calzados/zapatillablanca.jpg', '1700', 8),
(176, 'Botas con Tachas', 'Botitas bajas. Pulsera con tachas desmontables.', 'images/calzados/botastachas.jpg', '1200', 16),
(177, 'Zapatos Charol', 'Borcegos de charol negro con plataformas', 'images/calzados/zapatoscharol.jpg', '1900', 6),
(178, 'Stiletto', 'Stiletto de cuero con taco de 9.5cm y plataforma de 1.5cm', 'images/calzados/stiletto.jpg', '1500', 16),
(179, 'Botas Negras', 'Botas de cuero caña corta, con cadena plateada.', 'images/calzados/botasnegras.jpg', '1700', 9),
(180, 'Zapatillas Blancas 2', 'Zapatillas de cuero urbanas', 'images/calzados/zapatillasblancas2.jpg', '1500', 16),
(181, 'Chatitas', 'Chatitas de cuero charol negro trenzadas', 'images/calzados/chatitas.jpg', '1400', 4),
(182, 'Bota Mujer', 'Botas de cuero negro', 'images/calzados/botasmujer.jpg', '1700', 9),
(183, 'Zapatillas Deportivas', 'Zapatillas rosa y blanco', 'images/calzados/zapatillasrosayblanco.jpg', '1700', 8),
(184, 'Zapatillas Rosa', 'Zapatillas W Roshe Two', 'images/calzados/zapatillasrosa.jpg', '1700', 8),
(185, 'Zapatillas Neo Cloudfoam', 'Zapatillas deportivas de mujer', 'images/calzados/zapatillasAdidas.jpg', '1600', 8),
(186, 'Sandalias de Cuero', 'Sandalias de cuero para mujer, suela de goma, 3cm de altura', 'images/calzados/sandaliasdecuero.jpg', '1500', 16),
(187, 'Zuecos Negros', 'Zuecos con detalles de lentejuelas, con suela de goma, 2cm de taco.', 'images/calzados/zuecosnegros.jpg', '1000', 16),
(188, 'Zapatillas Blanquitas', 'Zapatillas para mujer con suela de goma.', 'images/calzados/zapatillasblancas3.jpg', '1200', 6),
(189, 'Balerina Negra', 'Balerina sintetica con suela de goma.', 'images/calzados/balerinanegra.jpg', '800', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_detalle`
--

CREATE TABLE `productos_detalle` (
  `articulo` bigint(20) UNSIGNED NOT NULL,
  `talle_codigo` bigint(20) UNSIGNED NOT NULL,
  `color_codigo` bigint(20) UNSIGNED NOT NULL,
  `stock` int(3) NOT NULL,
  `producto_codigo` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos_detalle`
--

INSERT INTO `productos_detalle` (`articulo`, `talle_codigo`, `color_codigo`, `stock`, `producto_codigo`) VALUES
(1, 1, 1, 100, 1),
(77, 1, 5, 100, 101),
(78, 1, 10, 100, 102),
(79, 1, 1, 100, 103),
(80, 1, 2, 100, 104),
(81, 1, 10, 100, 105),
(82, 1, 2, 100, 106),
(83, 1, 10, 100, 107),
(84, 1, 1, 100, 108),
(85, 1, 1, 100, 109),
(86, 1, 7, 100, 110),
(87, 1, 10, 100, 111),
(88, 1, 10, 100, 112),
(89, 1, 1, 100, 113),
(90, 1, 2, 100, 114),
(91, 3, 8, 100, 130),
(92, 2, 8, 100, 131),
(93, 1, 8, 100, 132),
(94, 4, 8, 100, 133),
(95, 3, 2, 100, 134),
(96, 1, 8, 100, 135),
(97, 2, 1, 100, 136),
(98, 4, 8, 100, 137),
(99, 2, 2, 100, 138),
(100, 1, 2, 100, 139),
(101, 1, 2, 100, 140),
(102, 1, 8, 100, 141),
(103, 2, 2, 100, 142),
(104, 3, 1, 100, 143),
(105, 4, 8, 100, 144),
(106, 3, 1, 100, 145),
(107, 1, 1, 100, 146),
(108, 4, 2, 100, 147),
(109, 4, 1, 100, 148),
(110, 2, 6, 100, 149),
(111, 1, 1, 100, 150),
(112, 4, 7, 100, 151),
(113, 2, 2, 100, 152),
(114, 1, 2, 100, 153),
(115, 2, 2, 100, 154),
(116, 1, 1, 100, 155),
(117, 2, 10, 100, 156),
(118, 3, 6, 100, 157),
(119, 1, 1, 100, 158),
(120, 3, 6, 100, 159),
(121, 2, 6, 100, 160),
(122, 3, 6, 100, 161),
(123, 4, 2, 100, 162),
(124, 1, 6, 100, 163),
(125, 4, 7, 100, 164),
(126, 2, 7, 100, 165),
(127, 3, 5, 100, 166),
(128, 2, 3, 100, 167),
(129, 1, 1, 100, 168),
(130, 2, 1, 100, 169),
(131, 4, 3, 100, 170),
(132, 1, 1, 100, 171),
(133, 4, 6, 100, 172),
(134, 3, 6, 100, 173),
(135, 1, 7, 100, 174),
(136, 2, 2, 100, 175),
(137, 7, 1, 100, 176),
(138, 8, 1, 100, 177),
(139, 9, 2, 100, 178),
(140, 10, 1, 100, 179),
(141, 7, 2, 100, 180),
(142, 8, 1, 100, 181),
(143, 5, 1, 100, 182),
(144, 6, 7, 100, 183),
(145, 7, 7, 100, 184),
(146, 5, 7, 100, 185),
(147, 6, 10, 100, 186),
(148, 10, 1, 100, 187),
(149, 9, 2, 100, 188),
(150, 9, 1, 100, 189);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `talles`
--

CREATE TABLE `talles` (
  `talle_codigo` bigint(20) UNSIGNED NOT NULL,
  `talle_sigla` varchar(2) NOT NULL,
  `talle_descripcion` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `talles`
--

INSERT INTO `talles` (`talle_codigo`, `talle_sigla`, `talle_descripcion`) VALUES
(1, 'S', 'SMALL'),
(2, 'M', 'Medium'),
(3, 'L', 'Large'),
(4, 'XL', 'Extra Large'),
(5, '35', '35'),
(6, '36', ''),
(7, '37', ''),
(8, '38', ''),
(9, '39', ''),
(10, '40', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `usuario_id` bigint(20) UNSIGNED NOT NULL,
  `usuario_pass` text NOT NULL,
  `usuario_perfil` char(1) NOT NULL,
  `usuario_nombre` text NOT NULL,
  `usuario_legajo` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`usuario_id`, `usuario_pass`, `usuario_perfil`, `usuario_nombre`, `usuario_legajo`) VALUES
(1, '0bf436282e36db0f39a0e5da9a7e3fcbbe044f036d034192dba2168a762f64f424889c17c0b3037a997bd8e6b1ddf0710ec7cdce9c678c7572568057aa9f2c6b', 'A', 'Miriam Yapura', 2000),
(2, '3bd0ec7e54237c798afb6ede6ebc0feaadce5ab191d7d2f6310ad92072f332251aa7e66af79ee9e8f77e62ef2df0dde0e8872ca92e2d4a57adc334c6f8f830b9', 'E', 'Malen Almendra', 2001),
(3, 'ab4a301aa40357605ddce7b47ed7bcba32206defa7e8a6638528cecf7c4f2a8991fc51fa459e2d328c54af0051161557f280d9e8175606ee7b53da9a53de6866', 'C', 'Maximiliano Aguirre', 2002),
(4, '530c217acd563e1b795ac04bde5aef0433486c62cccbfaaefbf9866abdcd2c88dd9594f5e3a611084f3d711452ea0c098f5ed5c9b40ce282c1f812c0a8657320', 'E', 'Cosme Fulanito', 2003);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `colores`
--
ALTER TABLE `colores`
  ADD PRIMARY KEY (`color_codigo`),
  ADD UNIQUE KEY `color_codigo` (`color_codigo`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`marca_codigo`),
  ADD UNIQUE KEY `marca_codigo` (`marca_codigo`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`prod_cod`),
  ADD UNIQUE KEY `prod_cod` (`prod_cod`),
  ADD KEY `prod_marca` (`prod_marca`);

--
-- Indices de la tabla `productos_detalle`
--
ALTER TABLE `productos_detalle`
  ADD PRIMARY KEY (`articulo`),
  ADD UNIQUE KEY `articulo` (`articulo`),
  ADD KEY `talle_codigo` (`talle_codigo`),
  ADD KEY `color_codigo` (`color_codigo`),
  ADD KEY `producto_codigo` (`producto_codigo`);

--
-- Indices de la tabla `talles`
--
ALTER TABLE `talles`
  ADD PRIMARY KEY (`talle_codigo`),
  ADD UNIQUE KEY `talle_codigo` (`talle_codigo`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD UNIQUE KEY `usuario_id` (`usuario_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `colores`
--
ALTER TABLE `colores`
  MODIFY `color_codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `marca_codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `prod_cod` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=190;

--
-- AUTO_INCREMENT de la tabla `productos_detalle`
--
ALTER TABLE `productos_detalle`
  MODIFY `articulo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT de la tabla `talles`
--
ALTER TABLE `talles`
  MODIFY `talle_codigo` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `usuario_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_marca` FOREIGN KEY (`prod_marca`) REFERENCES `marcas` (`marca_codigo`);

--
-- Filtros para la tabla `productos_detalle`
--
ALTER TABLE `productos_detalle`
  ADD CONSTRAINT `fk_color` FOREIGN KEY (`color_codigo`) REFERENCES `colores` (`color_codigo`),
  ADD CONSTRAINT `fk_producto` FOREIGN KEY (`producto_codigo`) REFERENCES `productos` (`prod_cod`),
  ADD CONSTRAINT `fk_talle` FOREIGN KEY (`talle_codigo`) REFERENCES `talles` (`talle_codigo`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
