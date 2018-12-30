-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-12-2018 a las 21:12:07
-- Versión del servidor: 10.1.32-MariaDB
-- Versión de PHP: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `veterinaria`
--
CREATE DATABASE IF NOT EXISTS `veterinaria` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `veterinaria`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `brindar_servicio`
--

CREATE TABLE `brindar_servicio` (
  `cod_brindar_servicio` int(10) UNSIGNED NOT NULL,
  `cod_turno` int(10) UNSIGNED NOT NULL,
  `cod_personal` int(10) UNSIGNED NOT NULL,
  `cod_servicio` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `cod_cliente` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_documento` varchar(3) NOT NULL,
  `nro_documento` int(8) UNSIGNED NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`cod_cliente`, `nombre`, `apellido`, `tipo_documento`, `nro_documento`, `direccion`, `telefono`, `email`) VALUES
(1, 'Félix', 'Carlovich', 'DNI', 32699788, 'Carlos Casares 1230', '15-3666-7889', 'carlovich@gmail.com'),
(2, 'Estela', 'Carrizo', 'DNI', 20211333, 'Venezuela 1234', '4441-2358', 'carrizoe@gmail.com'),
(3, 'Pedro', 'Picapiedra', 'DNI', 4899366, 'Bolivar 4588', '4441-3522', 'picapiedra@gmail.com'),
(4, 'Epifanio', 'Namuncurá', 'LE', 870632, 'Av. Santa Fe 233', '4408-1235', 'epifanio_n@gmail.com'),
(6, 'Jorge', 'Peperulo', 'DNI', 26988122, 'Acevedo 1055', '4855-9888', 'peperulo@hotmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `creditos`
--

CREATE TABLE `creditos` (
  `cod_credito` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(200) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `monto` decimal(10,2) UNSIGNED NOT NULL,
  `cod_cliente` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `creditos`
--

INSERT INTO `creditos` (`cod_credito`, `descripcion`, `monto`, `cod_cliente`) VALUES
(1, 'Producto Equivocado.', '276.00', 2),
(2, 'Medida Equivocada.', '200.00', 4),
(3, 'SE murieron los gatos.', '600.00', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cronograma_vacunacion`
--

CREATE TABLE `cronograma_vacunacion` (
  `cod_cronograma` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `horario` time DEFAULT NULL,
  `estado` varchar(2) DEFAULT NULL,
  `cod_mascota` int(10) UNSIGNED NOT NULL,
  `cod_cliente` int(10) UNSIGNED NOT NULL,
  `cod_vacuna` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cronograma_vacunacion`
--

INSERT INTO `cronograma_vacunacion` (`cod_cronograma`, `fecha`, `horario`, `estado`, `cod_mascota`, `cod_cliente`, `cod_vacuna`) VALUES
(2, '2018-11-22', NULL, 'SI', 7, 6, 1),
(3, '2018-11-20', NULL, 'NO', 7, 6, 1),
(4, '2018-11-30', NULL, NULL, 2, 2, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_factura`
--

CREATE TABLE `detalle_factura` (
  `cod_detalle_factura` int(10) UNSIGNED NOT NULL,
  `cod_items_venta` int(10) UNSIGNED NOT NULL,
  `cod_factura` int(10) UNSIGNED NOT NULL,
  `cantidad` int(5) UNSIGNED NOT NULL,
  `monto` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `diagnostico_medico`
--

CREATE TABLE `diagnostico_medico` (
  `cod_diagnostico` int(10) UNSIGNED NOT NULL,
  `cod_turno` int(10) UNSIGNED NOT NULL,
  `cod_profesional` int(10) UNSIGNED NOT NULL,
  `cod_pm` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especies`
--

CREATE TABLE `especies` (
  `cod_especie` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `especies`
--

INSERT INTO `especies` (`cod_especie`, `nombre`) VALUES
(1, 'Canina'),
(2, 'Felina');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `facturas`
--

CREATE TABLE `facturas` (
  `cod_factura` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `fecha` date NOT NULL,
  `monto_total` decimal(10,2) UNSIGNED NOT NULL,
  `cod_cliente` int(10) UNSIGNED DEFAULT NULL,
  `cod_proveedor` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `items_venta`
--

CREATE TABLE `items_venta` (
  `cod_items_venta` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci DEFAULT NULL,
  `cod_producto` int(10) UNSIGNED DEFAULT NULL,
  `cod_servicio` int(10) UNSIGNED DEFAULT NULL,
  `cod_vacuna` int(10) UNSIGNED DEFAULT NULL,
  `cod_pm` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mascotas`
--

CREATE TABLE `mascotas` (
  `cod_mascota` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `sexo` varchar(10) NOT NULL,
  `peso` int(5) UNSIGNED DEFAULT NULL,
  `edad` int(3) UNSIGNED DEFAULT NULL,
  `cod_cliente` int(10) UNSIGNED NOT NULL,
  `cod_raza` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `mascotas`
--

INSERT INTO `mascotas` (`cod_mascota`, `nombre`, `sexo`, `peso`, `edad`, `cod_cliente`, `cod_raza`) VALUES
(1, 'Simón', 'Macho', 25000, 24, 1, 1),
(2, 'Michifuz', 'Macho', 3000, 36, 2, 2),
(3, 'Pipi', 'Hembra', 3000, 24, 1, 5),
(4, 'Lola', 'Hembra', 20000, 24, 3, 15),
(6, 'Clara', 'Hembra', 800, 3, 1, 8),
(7, 'Trueno', 'Macho', 18350, 40, 6, 11);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos`
--

CREATE TABLE `pagos` (
  `cod_pago` int(10) UNSIGNED NOT NULL,
  `tipo_pago` varchar(30) NOT NULL,
  `nro_tarjeta` int(16) UNSIGNED DEFAULT NULL,
  `cuotas` int(2) UNSIGNED DEFAULT NULL,
  `fecha` date NOT NULL,
  `cod_cliente` int(10) UNSIGNED DEFAULT NULL,
  `cod_factura` int(10) UNSIGNED NOT NULL,
  `cod_proveedor` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal`
--

CREATE TABLE `personal` (
  `cod_personal` int(10) UNSIGNED NOT NULL,
  `cuil` varchar(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_documento` varchar(3) NOT NULL,
  `nro_documento` int(8) UNSIGNED NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `personal`
--

INSERT INTO `personal` (`cod_personal`, `cuil`, `nombre`, `apellido`, `tipo_documento`, `nro_documento`, `direccion`, `telefono`, `email`) VALUES
(1, '20-35206175-2', 'Alejandro', 'Pedrozo', 'DNI', 35206175, 'Acevedo 4100', '15-0800-1111', 'adpedrozo@gmail.com'),
(2, '20-30123456-2', 'Ricardo', 'Martinez', 'DNI', 30123456, 'Av. de Mayo 543', '15-5588-3232', 'rmartinez@gmail.com'),
(3, '27-28522533-2', 'Maria', 'Pereyra', 'DNI', 28522533, 'Sgto. Cabral 135', '15-5656-3000', 'mpereyra@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `prestaciones_medicas`
--

CREATE TABLE `prestaciones_medicas` (
  `cod_pm` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precio_unitario` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `prestaciones_medicas`
--

INSERT INTO `prestaciones_medicas` (`cod_pm`, `descripcion`, `precio_unitario`) VALUES
(1, 'Consulta', '100.00'),
(2, 'Radiografía', '300.00'),
(3, 'Castración', '1200.00'),
(4, 'Vacunación', '300.00'),
(5, 'Operación Menor', '1500.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `cod_producto` int(10) UNSIGNED NOT NULL,
  `nombre_producto` varchar(50) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_elaboracion` date DEFAULT NULL,
  `fecha_vencimiento` date DEFAULT NULL,
  `nro_lote` varchar(10) DEFAULT NULL,
  `precio_unitario` decimal(10,2) UNSIGNED NOT NULL,
  `stock` int(5) UNSIGNED NOT NULL,
  `punto_reposicion` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`cod_producto`, `nombre_producto`, `fecha_elaboracion`, `fecha_vencimiento`, `nro_lote`, `precio_unitario`, `stock`, `punto_reposicion`) VALUES
(1, 'Sabrositos Perro Adulto 15 KG', '2018-09-05', '2019-10-30', '41369', '950.00', 20, 5),
(2, 'Purina Gatos Excellent 3 KG', '2018-09-10', '2019-11-10', 'Q7888', '350.00', 50, 5),
(3, 'Purina Gatos Excellent 1 KG', '2018-09-10', '2019-08-10', 'Q5632', '138.00', 52, 5),
(4, 'Purina Dog Chow Adultos 8 KG', '2018-08-15', '2019-09-10', '38269', '800.00', 25, 5),
(5, 'Sabrositos Perro Cachorro 3 KG', '2018-11-01', '2019-06-01', 'T8988', '345.00', 30, 5),
(6, 'Collar de Perro Snoopy Chico', NULL, NULL, NULL, '150.00', 20, 5),
(7, 'Collar de Perro Snoopy Grande', NULL, NULL, NULL, '200.00', 20, 5),
(8, 'Collar de Gato Pimpx Chico', NULL, NULL, NULL, '120.00', 25, 5),
(9, 'Collar de Gato Pimpx Mediano', NULL, NULL, NULL, '180.00', 15, 5),
(10, 'Shampoo Clear para Perro 500ml', NULL, NULL, NULL, '95.00', 20, 5),
(11, 'Shampoo Clear para Gato 500ml', NULL, NULL, NULL, '80.00', 20, 5),
(12, 'Hueso REX de Juguete Perro', NULL, NULL, NULL, '50.00', 30, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `profesionales`
--

CREATE TABLE `profesionales` (
  `cod_profesional` int(10) UNSIGNED NOT NULL,
  `cuil` varchar(13) NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `apellido` varchar(30) NOT NULL,
  `tipo_documento` varchar(3) NOT NULL,
  `nro_documento` int(8) UNSIGNED NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `profesionales`
--

INSERT INTO `profesionales` (`cod_profesional`, `cuil`, `nombre`, `apellido`, `tipo_documento`, `nro_documento`, `direccion`, `telefono`, `email`) VALUES
(1, '20-26588789-2', 'Sergio', 'Paez', 'DNI', 26588789, 'Pueyrredon 533', '15-1222-5888', 'paezsergio@gmail.com'),
(2, '27-32500700-3', 'Paula', 'Romano', 'DNI', 32500700, 'America 650', '15-6322-4556', 'romanop@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `cod_proveedor` int(10) UNSIGNED NOT NULL,
  `cuit` varchar(13) NOT NULL,
  `razon_social` varchar(30) NOT NULL,
  `nombre_contacto` varchar(30) NOT NULL,
  `direccion` varchar(30) NOT NULL,
  `telefono` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`cod_proveedor`, `cuit`, `razon_social`, `nombre_contacto`, `direccion`, `telefono`, `email`) VALUES
(1, '30-18233566-3', 'Alimentos Pepe SRL', 'Pepe Graziani', 'Av. Gaona 3606', '4652-5888', 'contacto@alimentospepe.com'),
(2, '30-15688988-3', 'Fernandez & Hnos. SRL', 'Esteban Fernandez', 'Av. Rivadavia 14520', '4657-2555', 'administracion@fernandezempresa.com'),
(3, '30-553322-3', 'Laboratorio Mendez SRL', 'Agustina Suarez', 'Av. Directorio 5123', '4650-1222', 'info@mendezlabs.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provisto_por`
--

CREATE TABLE `provisto_por` (
  `cod_provisto_por` int(10) UNSIGNED NOT NULL,
  `cod_producto` int(10) UNSIGNED NOT NULL,
  `cod_proveedor` int(10) UNSIGNED NOT NULL,
  `precio_costo` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provisto_por`
--

INSERT INTO `provisto_por` (`cod_provisto_por`, `cod_producto`, `cod_proveedor`, `precio_costo`) VALUES
(1, 1, 1, '380.00'),
(2, 2, 1, '140.00'),
(3, 3, 1, '75.00'),
(4, 4, 1, '420.00'),
(5, 5, 1, '110.00'),
(6, 6, 2, '80.00'),
(7, 7, 2, '110.00'),
(8, 8, 2, '60.00'),
(9, 9, 2, '95.00'),
(10, 10, 2, '40.00'),
(11, 11, 2, '40.00'),
(12, 12, 2, '25.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `provisto_vacunas`
--

CREATE TABLE `provisto_vacunas` (
  `cod_provisto_vacunas` int(10) UNSIGNED NOT NULL,
  `cod_vacuna` int(10) UNSIGNED NOT NULL,
  `cod_proveedor` int(10) UNSIGNED NOT NULL,
  `precio_costo` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `provisto_vacunas`
--

INSERT INTO `provisto_vacunas` (`cod_provisto_vacunas`, `cod_vacuna`, `cod_proveedor`, `precio_costo`) VALUES
(1, 1, 3, '100.00'),
(2, 2, 3, '100.00'),
(3, 3, 3, '100.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `razas`
--

CREATE TABLE `razas` (
  `cod_raza` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(30) NOT NULL,
  `cod_especie` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `razas`
--

INSERT INTO `razas` (`cod_raza`, `nombre`, `cod_especie`) VALUES
(1, 'Doberman', 1),
(2, 'Angora', 2),
(3, 'Bulldog', 1),
(4, 'Siamés', 2),
(5, 'Caniche', 1),
(6, 'Persa', 2),
(7, 'Mestizo', 2),
(8, 'Tricolor', 2),
(9, 'INDEFINIDO', 2),
(10, 'Labrador', 1),
(11, 'Ovejero Alemán', 1),
(12, 'Pitbull', 1),
(13, 'Salchicha', 1),
(14, 'INDEFINIDO', 1),
(15, 'Dálmata', 1),
(16, 'Mestizo', 1),
(17, 'Golder Retriever', 1),
(18, 'Pug', 1),
(19, 'Boxer', 1),
(20, 'Siberiano', 1),
(21, 'Chow Chow', 1),
(22, 'Gran Danés', 1),
(23, 'Akita', 1),
(24, 'Bull Terrier', 1),
(25, 'Galgo', 1),
(26, 'Border Collie', 1),
(27, 'Cocker', 1),
(28, 'Pekinés', 1),
(29, 'Bengala', 2),
(30, 'Maine Coon', 2),
(31, 'Sphynx', 2),
(32, 'Azul Ruso', 2),
(33, 'Albino', 2),
(34, 'Jack Russell Terrier', 1),
(35, 'Fox Terrier', 1),
(36, 'British Shorthair', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `cod_servicio` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `precio_unitario` decimal(10,2) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`cod_servicio`, `descripcion`, `precio_unitario`) VALUES
(1, 'Peluquería', '250.00'),
(2, 'Baño', '160.00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `turnos`
--

CREATE TABLE `turnos` (
  `cod_turno` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `horario` time NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `asistencia` varchar(2) DEFAULT NULL,
  `cod_cliente` int(10) UNSIGNED NOT NULL,
  `cod_mascota` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `turnos`
--

INSERT INTO `turnos` (`cod_turno`, `fecha`, `horario`, `descripcion`, `asistencia`, `cod_cliente`, `cod_mascota`) VALUES
(1, '2018-11-20', '10:00:00', 'Baño', 'SI', 2, 2),
(2, '2018-11-19', '17:30:00', 'Radiografía', 'NO', 1, 1),
(3, '2018-11-16', '16:00:00', 'Peluquería', 'SI', 1, 3),
(6, '2018-11-20', '11:30:00', 'Consulta', 'SI', 3, 4),
(7, '2018-11-22', '14:30:00', 'Consulta', 'SI', 6, 7),
(8, '2018-11-28', '11:00:00', 'Castración', NULL, 3, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vacunas`
--

CREATE TABLE `vacunas` (
  `cod_vacuna` int(10) UNSIGNED NOT NULL,
  `descripcion` varchar(100) CHARACTER SET latin1 COLLATE latin1_spanish_ci NOT NULL,
  `fecha_elaboracion` date NOT NULL,
  `fecha_vencimiento` date NOT NULL,
  `nro_lote` varchar(10) NOT NULL,
  `precio_unitario` decimal(10,2) UNSIGNED NOT NULL,
  `stock` int(5) UNSIGNED NOT NULL,
  `punto_reposicion` int(5) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `vacunas`
--

INSERT INTO `vacunas` (`cod_vacuna`, `descripcion`, `fecha_elaboracion`, `fecha_vencimiento`, `nro_lote`, `precio_unitario`, `stock`, `punto_reposicion`) VALUES
(1, 'Antirrabica BH-RAB', '2018-10-10', '2020-10-25', '4588', '235.00', 49, 10),
(2, 'Moquillo Canino DM55', '2018-10-03', '2019-08-15', 'R898', '200.00', 50, 10),
(3, 'Moquillo Felino 85G', '2018-10-03', '2019-06-05', '85123', '200.00', 49, 10);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `brindar_servicio`
--
ALTER TABLE `brindar_servicio`
  ADD PRIMARY KEY (`cod_brindar_servicio`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`cod_cliente`),
  ADD UNIQUE KEY `nro_documento` (`nro_documento`);

--
-- Indices de la tabla `creditos`
--
ALTER TABLE `creditos`
  ADD PRIMARY KEY (`cod_credito`);

--
-- Indices de la tabla `cronograma_vacunacion`
--
ALTER TABLE `cronograma_vacunacion`
  ADD PRIMARY KEY (`cod_cronograma`);

--
-- Indices de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  ADD PRIMARY KEY (`cod_detalle_factura`);

--
-- Indices de la tabla `diagnostico_medico`
--
ALTER TABLE `diagnostico_medico`
  ADD PRIMARY KEY (`cod_diagnostico`);

--
-- Indices de la tabla `especies`
--
ALTER TABLE `especies`
  ADD PRIMARY KEY (`cod_especie`);

--
-- Indices de la tabla `facturas`
--
ALTER TABLE `facturas`
  ADD PRIMARY KEY (`cod_factura`);

--
-- Indices de la tabla `items_venta`
--
ALTER TABLE `items_venta`
  ADD PRIMARY KEY (`cod_items_venta`);

--
-- Indices de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  ADD PRIMARY KEY (`cod_mascota`);

--
-- Indices de la tabla `pagos`
--
ALTER TABLE `pagos`
  ADD PRIMARY KEY (`cod_pago`);

--
-- Indices de la tabla `personal`
--
ALTER TABLE `personal`
  ADD PRIMARY KEY (`cod_personal`),
  ADD UNIQUE KEY `cuil` (`cuil`),
  ADD UNIQUE KEY `nro_documento` (`nro_documento`);

--
-- Indices de la tabla `prestaciones_medicas`
--
ALTER TABLE `prestaciones_medicas`
  ADD PRIMARY KEY (`cod_pm`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`cod_producto`);

--
-- Indices de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  ADD PRIMARY KEY (`cod_profesional`),
  ADD UNIQUE KEY `nro_documento` (`nro_documento`),
  ADD UNIQUE KEY `cuil` (`cuil`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`cod_proveedor`),
  ADD UNIQUE KEY `cuit` (`cuit`);

--
-- Indices de la tabla `provisto_por`
--
ALTER TABLE `provisto_por`
  ADD PRIMARY KEY (`cod_provisto_por`);

--
-- Indices de la tabla `provisto_vacunas`
--
ALTER TABLE `provisto_vacunas`
  ADD PRIMARY KEY (`cod_provisto_vacunas`);

--
-- Indices de la tabla `razas`
--
ALTER TABLE `razas`
  ADD PRIMARY KEY (`cod_raza`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`cod_servicio`);

--
-- Indices de la tabla `turnos`
--
ALTER TABLE `turnos`
  ADD PRIMARY KEY (`cod_turno`);

--
-- Indices de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  ADD PRIMARY KEY (`cod_vacuna`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `brindar_servicio`
--
ALTER TABLE `brindar_servicio`
  MODIFY `cod_brindar_servicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `cod_cliente` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `creditos`
--
ALTER TABLE `creditos`
  MODIFY `cod_credito` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `cronograma_vacunacion`
--
ALTER TABLE `cronograma_vacunacion`
  MODIFY `cod_cronograma` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `detalle_factura`
--
ALTER TABLE `detalle_factura`
  MODIFY `cod_detalle_factura` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `diagnostico_medico`
--
ALTER TABLE `diagnostico_medico`
  MODIFY `cod_diagnostico` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `especies`
--
ALTER TABLE `especies`
  MODIFY `cod_especie` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `facturas`
--
ALTER TABLE `facturas`
  MODIFY `cod_factura` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `items_venta`
--
ALTER TABLE `items_venta`
  MODIFY `cod_items_venta` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `mascotas`
--
ALTER TABLE `mascotas`
  MODIFY `cod_mascota` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `pagos`
--
ALTER TABLE `pagos`
  MODIFY `cod_pago` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal`
--
ALTER TABLE `personal`
  MODIFY `cod_personal` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `prestaciones_medicas`
--
ALTER TABLE `prestaciones_medicas`
  MODIFY `cod_pm` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `cod_producto` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `profesionales`
--
ALTER TABLE `profesionales`
  MODIFY `cod_profesional` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `cod_proveedor` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `provisto_por`
--
ALTER TABLE `provisto_por`
  MODIFY `cod_provisto_por` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `provisto_vacunas`
--
ALTER TABLE `provisto_vacunas`
  MODIFY `cod_provisto_vacunas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `razas`
--
ALTER TABLE `razas`
  MODIFY `cod_raza` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `cod_servicio` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `turnos`
--
ALTER TABLE `turnos`
  MODIFY `cod_turno` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `vacunas`
--
ALTER TABLE `vacunas`
  MODIFY `cod_vacuna` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
