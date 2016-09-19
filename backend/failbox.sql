-- phpMyAdmin SQL Dump
-- version 4.4.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-07-2016 a las 10:51:41
-- Versión del servidor: 5.6.24
-- Versión de PHP: 5.6.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `failbox`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bannershome`
--

CREATE TABLE IF NOT EXISTS `bannershome` (
  `idBannersHome` int(11) NOT NULL,
  `BannersHomeImage` varchar(450) NOT NULL,
  `BannersHomeUrl` varchar(450) NOT NULL,
  `BannersHomeName` varchar(200) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bannershome`
--

INSERT INTO `bannershome` (`idBannersHome`, `BannersHomeImage`, `BannersHomeUrl`, `BannersHomeName`) VALUES
(19, '20160707124222', 'http://paratodohayfans.com/web/failbox/', 'http://paratodohayfans.com/web/failbox/'),
(20, '20160707124231', 'http://paratodohayfans.com/web/failbox/', 'http://paratodohayfans.com/web/failbox/'),
(21, '20160707124237', 'http://paratodohayfans.com/web/failbox/', 'http://paratodohayfans.com/web/failbox/');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `caracteristicas`
--

CREATE TABLE IF NOT EXISTS `caracteristicas` (
  `IdCaracteristica` int(11) NOT NULL,
  `NombreCaracteristica` varchar(45) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `caracteristicas`
--

INSERT INTO `caracteristicas` (`IdCaracteristica`, `NombreCaracteristica`) VALUES
(8, 'Color'),
(9, 'Procesador'),
(10, 'Memoria Ram'),
(11, 'Disco Duro'),
(12, 'Sistema Operativo'),
(13, 'Compatibilidad'),
(14, 'Capacidad'),
(15, 'Formatos Soportados'),
(16, 'Cpu'),
(17, 'Conectividad'),
(18, 'Alto'),
(19, 'Ancho'),
(20, 'Profundidad'),
(21, 'Luz'),
(22, 'Undefined'),
(23, 'Prueba'),
(24, 'Prueba2'),
(25, 'Prueba3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE IF NOT EXISTS `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `Categoria` varchar(45) NOT NULL,
  `RouteCategoria` varchar(450) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=50 DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `Categoria`, `RouteCategoria`) VALUES
(38, 'Cómputo y Eletrónica', 'computo-y-eletronica'),
(39, 'Telefonía', 'telefonia'),
(40, 'Videojuegos', 'videojuegos'),
(41, 'Línea Blanca', 'linea-blanca'),
(42, 'Hogar', 'hogar'),
(43, 'Electrónica', 'electronica'),
(44, 'Telefonia', 'telefonia'),
(48, 'Categoria1', 'categoria1'),
(49, 'Categoria2', 'categoria2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ciudades`
--

CREATE TABLE IF NOT EXISTS `ciudades` (
  `IdCiudad` int(11) NOT NULL,
  `Ciudad` varchar(45) NOT NULL,
  `IdEstado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos`
--

CREATE TABLE IF NOT EXISTS `contactos` (
  `IdContacto` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL,
  `Email` varchar(45) DEFAULT NULL,
  `Asunto` varchar(45) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Mensaje` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `datosenvios`
--

CREATE TABLE IF NOT EXISTS `datosenvios` (
  `IdDatosEnvios` int(11) NOT NULL,
  `TipoDireccion` varchar(45) DEFAULT NULL,
  `Estado` varchar(45) DEFAULT NULL,
  `Ciudad` varchar(45) DEFAULT NULL,
  `Direccion` varchar(200) DEFAULT NULL,
  `Colonia` varchar(45) DEFAULT NULL,
  `CP` int(11) DEFAULT NULL,
  `Telefono` int(11) DEFAULT NULL,
  `Celular` int(11) DEFAULT NULL,
  `IdPedido` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE IF NOT EXISTS `estados` (
  `IdEstado` int(11) NOT NULL,
  `Estado` varchar(45) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `marcas`
--

CREATE TABLE IF NOT EXISTS `marcas` (
  `IdMarca` int(11) NOT NULL,
  `Marca` varchar(45) NOT NULL,
  `RouteMarca` varchar(450) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=29 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `marcas`
--

INSERT INTO `marcas` (`IdMarca`, `Marca`, `RouteMarca`) VALUES
(6, 'Osx', 'osx'),
(7, 'Windows', 'windows'),
(8, 'Lg', 'lg'),
(9, 'Samsung', 'samsung'),
(10, 'Motorola', 'motorola'),
(11, 'Iphone', 'iphone'),
(12, 'Xbox 360', 'xbox-360'),
(13, 'Xbox One', 'xbox-one'),
(14, 'Ps4', 'ps4'),
(15, 'Ps3', 'ps3'),
(16, 'Mabe', 'mabe'),
(17, 'Phillips', 'phillips'),
(18, 'Apple', 'apple'),
(19, 'Toshiba', 'toshiba'),
(20, 'Dell', 'dell'),
(21, 'Iottie', 'iottie'),
(22, 'Microsoft', 'microsoft'),
(23, 'Sony', 'sony'),
(24, 'Nintendo', 'nintendo'),
(25, 'Whirlpool', 'whirlpool'),
(27, 'Marca1', 'marca1'),
(28, 'Marca2', 'marca2');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletter`
--

CREATE TABLE IF NOT EXISTS `newsletter` (
  `idNewsletter` int(11) NOT NULL,
  `Email` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `newsletter`
--

INSERT INTO `newsletter` (`idNewsletter`, `Email`) VALUES
(1, 'jose@gmail.com'),
(2, 'pepe@gmail.com'),
(3, 'hola@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE IF NOT EXISTS `pedidos` (
  `IdPedido` int(11) NOT NULL,
  `FechaPedido` datetime DEFAULT NULL,
  `Estatus` varchar(45) DEFAULT NULL,
  `Usuarios_IdUsuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE IF NOT EXISTS `productos` (
  `IdProducto` int(11) NOT NULL,
  `NombreProd` varchar(45) NOT NULL,
  `Descripcion` varchar(2000) NOT NULL,
  `RouteProd` varchar(450) NOT NULL,
  `Stock` int(11) NOT NULL,
  `PrecioLista` float NOT NULL,
  `PrecioFailbox` float NOT NULL,
  `CostoEnvio` int(11) NOT NULL,
  `Garantia` varchar(45) NOT NULL,
  `Modelo` varchar(45) NOT NULL,
  `SKU` varchar(50) NOT NULL,
  `Estatus` varchar(45) NOT NULL,
  `Image` varchar(5000) NOT NULL,
  `urlPaypal` varchar(2000) NOT NULL,
  `Destacado` varchar(45) NOT NULL,
  `FechaAlta` datetime NOT NULL,
  `IdPrivilegio` int(11) NOT NULL,
  `Marcas_IdMarca` int(11) NOT NULL,
  `Categorias_IdCategoria` int(11) NOT NULL,
  `Subcategoria_IdSubcategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`IdProducto`, `NombreProd`, `Descripcion`, `RouteProd`, `Stock`, `PrecioLista`, `PrecioFailbox`, `CostoEnvio`, `Garantia`, `Modelo`, `SKU`, `Estatus`, `Image`, `urlPaypal`, `Destacado`, `FechaAlta`, `IdPrivilegio`, `Marcas_IdMarca`, `Categorias_IdCategoria`, `Subcategoria_IdSubcategoria`) VALUES
(9, 'COMPUTADORA DE ESCRITORIO IMAC', 'Apple MK482E/A 27 Pulgadas Computadora de Escritorio iMac', 'computadora-de-escritorio-imac', 5, 49900, 47500, 100, '1', 'MK482E/A', '00001', 'Activo', 'mac_02.jpg,mac_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-07-06 12:45:46', 1, 18, 38, 11),
(10, 'DELL INSPIRON ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc consequat suscipit dolor aliquam congue. Aenean posuere, metus non sollicitudin suscipit, ipsum massa egestas sapien, ut sollicitudin dui sem finibus mauris. Proin consequat metus sed urna tempor vestibulum. Sed purus ex, faucibus sed nis', 'dell-inspiron-', 3, 18500, 16649, 0, '3', 'I5559_I781TGSLW10S_1', '00002', 'Activo', 'dell_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-06-24 12:06:16', 1, 20, 38, 12),
(11, 'SAMSUNG GALAXY S7 EDGE DORADO ', 'Duis ut leo sapien. Ut eget velit sed eros viverra elementum. Aliquam non erat sed ante facilisis rutrum nec id diam. Sed ac augue semper, porttitor metus et, pharetra mauris. Nulla placerat, sapien vel accumsan hendrerit, ante tellus porta ex, ac sollicitudin eros ex ut purus.', 'samsung-galaxy-s7-edge-dorado-', 5, 17959, 17500, 0, '4', 'SM-G935F', '00003', 'Inactivo', 'sam_04.jpg,sam_03.jpeg,sam_02.jpg,sam_07.png', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-06-24 14:36:40', 1, 9, 39, 13),
(12, 'LOTTIE CARGADOR AUTOMÓVIL FLEX 2 NEGRO', 'Sed ac augue semper, porttitor metus et, pharetra mauris. Nulla placerat, sapien vel accumsan hendrerit, ante tellus porta ex, ac sollicitudin eros ex ut purus. Integer posuere consequat ex, sit amet semper est aliquam sit amet. Quisque maximus bibendum auctor. Duis vitae enim sem. Suspendisse est quam, interdum at dictum id, varius non mi.', 'lottie-cargador-automovil-flex-2-negro', 12, 399, 360, 0, '1', 'HCLR10104', '00004', 'Activo', 'cargador_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'NO', '2016-06-24 16:59:19', 1, 21, 39, 14),
(13, 'APPLE CABLE LIGHTNING BLANCO BLANCO', 'Praesent non malesuada eros, ac semper ex. Maecenas rutrum, turpis sit amet imperdiet aliquam, neque ante molestie libero, quis pulvinar sapien justo sit amet urna. Pellentesque eget commodo metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'apple-cable-lightning-blanco-blanco', 20, 599, 580, 0, '2', 'MD819ZM/A', '00005', 'Activo', 'cargador_02.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'NO', '2016-06-30 18:51:25', 1, 18, 39, 14),
(14, 'XBOX ONE CONSOLA 500 GB + QUANTUM BREAK', 'Praesent non malesuada eros, ac semper ex. Maecenas rutrum, turpis sit amet imperdiet aliquam, neque ante molestie libero, quis pulvinar sapien justo sit amet urna. Pellentesque eget commodo metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ', 'xbox-one-consola-500-gb-+-quantum-break', 5, 8249, 7549, 90, '3', 'Xbox One', '00006', 'Activo', 'xbox_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-06-29 16:32:58', 1, 22, 40, 16),
(15, 'PLAYSTATION 4 CONSOLA 500 GB + FIFA 16', 'Praesent non malesuada eros, ac semper ex. Maecenas rutrum, turpis sit amet imperdiet aliquam, neque ante molestie libero, quis pulvinar sapien justo sit amet urna. Pellentesque eget commodo metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. ', 'playstation-4-consola-500-gb-+-fifa-16', 5, 9299, 8700, 0, '4', 'PlayStation 4', '00007', 'Activo', 'ps4_03.jpg,ps4_02.jpg,ps4_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-06-24 17:12:56', 1, 23, 40, 16),
(16, 'WII U CONSOLA + MARIO KART 8', 'Praesent non malesuada eros, ac semper ex. Maecenas rutrum, turpis sit amet imperdiet aliquam, neque ante molestie libero, quis pulvinar sapien justo sit amet urna. Pellentesque eget commodo metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'wii-u-consola-+-mario-kart-8', 1, 8299, 7799, 0, '2', 'WUP-S-KAGP', '00008', 'Activo', 'wii_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'NO', '2016-06-24 17:19:07', 1, 24, 40, 16),
(17, 'SAMSUNG RT38K5982SL/EM/RT38FEAKDSL REFRIGERAD', 'Praesent non malesuada eros, ac semper ex. Maecenas rutrum, turpis sit amet imperdiet aliquam, neque ante molestie libero, quis pulvinar sapien justo sit amet urna. Pellentesque eget commodo metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'samsung-rt38k5982sl/em/rt38feakdsl-refrigerad', 10, 13999, 10709, 110, '4', 'RT38K5982SL/EM/RT38FEAKDSL', '00009', 'Activo', 'refri_04.jpg,refri_03.jpg,refri_01.jpg,refri_02.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-06-29 16:32:09', 1, 9, 41, 18),
(18, 'WHIRLPOOL WOS92ECOAS HORNO DE 30 PULGADAS ACE', 'Praesent non malesuada eros, ac semper ex. Maecenas rutrum, turpis sit amet imperdiet aliquam, neque ante molestie libero, quis pulvinar sapien justo sit amet urna. Pellentesque eget commodo metus. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.', 'whirlpool-wos92ecoas-horno-de-30-pulgadas-ace', 9, 27999, 20229, 110, '4', 'WOS92ECOAS', '000010', 'Activo', 'est_02.jpg,est_01.jpg', 'https://www.paypal.com/mx/webapps/mpp/home', 'SI', '2016-06-29 16:32:42', 1, 25, 41, 19);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_caracteristicas`
--

CREATE TABLE IF NOT EXISTS `productos_has_caracteristicas` (
  `Productos_IdProducto` int(11) NOT NULL,
  `Caracteristicas_IdCaracteristica` int(11) NOT NULL,
  `DetalleCaracteristica` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_has_caracteristicas`
--

INSERT INTO `productos_has_caracteristicas` (`Productos_IdProducto`, `Caracteristicas_IdCaracteristica`, `DetalleCaracteristica`) VALUES
(9, 8, 'Plata'),
(9, 9, 'Quad Core de 3.3 GHz'),
(9, 10, '8 GB'),
(9, 11, 'Fusion Drive de 2 TB'),
(9, 21, 'HD'),
(10, 8, 'Azul'),
(10, 9, 'Core i7-6500U'),
(10, 10, '8 GB DDR3L 1600 MHz'),
(10, 11, '1 TB 5400 RPM'),
(11, 8, 'Dorado'),
(11, 12, 'Android'),
(12, 8, 'Negro'),
(13, 8, 'Blanco'),
(13, 13, 'iPad, iPhone, iPod Nano, USB'),
(14, 14, '500 GB'),
(14, 15, 'Xbox One, CD, DVD'),
(15, 10, 'GDDR5 de 8 GB'),
(15, 11, '500 GB'),
(15, 16, 'AMD Jaguar x86-64 de baja potencia, 8 núcleos'),
(15, 17, 'Wi-Fi, Bluetooth'),
(16, 13, 'Amiibo (solo para algunos modelos)'),
(16, 14, '32 GB'),
(16, 15, 'Wii U'),
(17, 8, 'Gris acero'),
(17, 14, '14 pies cúbicos'),
(17, 18, '178.5 cm'),
(17, 19, '67.5 cm'),
(17, 20, '71.5 cm'),
(17, 21, 'Led'),
(18, 8, 'Acero inoxidable'),
(18, 14, '5 pies cúbicos'),
(18, 18, '97 cm aproximado'),
(18, 19, '83 cm aproximado'),
(18, 20, '78 cm aproximado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_imagenes`
--

CREATE TABLE IF NOT EXISTS `productos_has_imagenes` (
  `Productos_IdProducto` int(11) NOT NULL,
  `IdImagen` int(11) NOT NULL,
  `NombreImagen` varchar(100) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `productos_has_imagenes`
--

INSERT INTO `productos_has_imagenes` (`Productos_IdProducto`, `IdImagen`, `NombreImagen`) VALUES
(9, 16, 'mac_02.jpg'),
(9, 17, 'mac_01.jpg'),
(10, 18, 'dell_02.jpg'),
(10, 19, 'dell_01.jpg'),
(11, 36, 'sam_04.jpg'),
(11, 42, 'sam_03.jpeg'),
(11, 44, 'sam_02.jpg'),
(11, 45, 'sam_07.png'),
(12, 46, 'cargador_01.jpg'),
(13, 47, 'cargador_02.jpg'),
(14, 48, 'xbox_01.jpg'),
(15, 49, 'ps4_03.jpg'),
(15, 50, 'ps4_02.jpg'),
(15, 51, 'ps4_01.jpg'),
(16, 52, 'wii_01.jpg'),
(17, 53, 'refri_04.jpg'),
(17, 54, 'refri_03.jpg'),
(17, 55, 'refri_01.jpg'),
(17, 56, 'refri_02.jpg'),
(18, 57, 'est_02.jpg'),
(18, 58, 'est_01.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_has_pedidos`
--

CREATE TABLE IF NOT EXISTS `productos_has_pedidos` (
  `Productos_IdProducto` int(11) NOT NULL,
  `Pedidos_IdPedido` int(11) NOT NULL,
  `Cantidad` decimal(18,2) DEFAULT NULL,
  `Precio` float DEFAULT NULL,
  `CostoEnvio` float DEFAULT NULL,
  `Total` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE IF NOT EXISTS `proveedores` (
  `idProveedor` int(11) NOT NULL,
  `RazonSocial` varchar(70) NOT NULL,
  `Direccion` varchar(100) NOT NULL,
  `Colonia` varchar(45) NOT NULL,
  `CP` int(11) NOT NULL,
  `Telefono` int(11) NOT NULL,
  `CostoEnvio` float NOT NULL,
  `PaqChico` float NOT NULL,
  `PaqMediano` float NOT NULL,
  `PaqGrande` float NOT NULL,
  `CodigoProveedor` int(11) NOT NULL,
  `FechaAlta` datetime NOT NULL,
  `IdPrivilegio` int(11) NOT NULL,
  `TipoProveedor_idTipoProveedor` int(11) NOT NULL,
  `Estados_IdEstado` int(11) NOT NULL,
  `Ciudades_IdCiudad` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `subcategoria`
--

CREATE TABLE IF NOT EXISTS `subcategoria` (
  `IdSubcategoria` int(11) NOT NULL,
  `Subcategoria` varchar(45) NOT NULL,
  `RouteSubcategoria` varchar(450) NOT NULL,
  `Categorias_IdCategoria` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=28 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `subcategoria`
--

INSERT INTO `subcategoria` (`IdSubcategoria`, `Subcategoria`, `RouteSubcategoria`, `Categorias_IdCategoria`) VALUES
(11, 'Computadoras de Escritorio', 'computadoras-de-escritorio', 38),
(12, 'Laptops', 'laptops', 38),
(13, 'Celulares', 'celulares', 39),
(14, 'Cargadores', 'cargadores', 39),
(15, 'Baterías', 'baterias', 39),
(16, 'Consolas', 'consolas', 40),
(17, 'Accesorios', 'accesorios', 40),
(18, 'Refrigeradores', 'refrigeradores', 41),
(19, 'Hornos', 'hornos', 41),
(20, 'Licuadoras', 'licuadoras', 41),
(21, 'Planchas', 'planchas', 41),
(24, 'Sub1', 'sub1', 40),
(25, 'Sub2', 'sub2', 49),
(27, 'Cargadores', 'cargadores', 48);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoproveedor`
--

CREATE TABLE IF NOT EXISTS `tipoproveedor` (
  `idTipoProveedor` int(11) NOT NULL,
  `TipoProveedor` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE IF NOT EXISTS `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NombreUser` varchar(45) NOT NULL,
  `Nombre` varchar(45) NOT NULL,
  `Apellido` varchar(45) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(400) NOT NULL,
  `TipoPerfil` varchar(45) NOT NULL,
  `Privilegios` int(11) NOT NULL,
  `UltimaConexion` datetime NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`IdUsuario`, `NombreUser`, `Nombre`, `Apellido`, `Email`, `Password`, `TipoPerfil`, `Privilegios`, `UltimaConexion`) VALUES
(1, 'Admin', 'Admin', 'Admin', 'admin@gmail.com', '$2y$10$K893WptPPtRswyXYeZPj2.mm3KyPnFQaYokzMenTjrMaIJPGtQYpq', 'Administrador', 1, '2016-07-06 10:23:40'),
(2, 'Proveedor1', 'Proveedor_Uno', 'Proveedor1', 'prov1@gmail.com', '$2y$10$K893WptPPtRswyXYeZPj2.mm3KyPnFQaYokzMenTjrMaIJPGtQYpq', 'Proveedor', 2, '2016-06-30 12:35:09'),
(3, 'Proveedor2', 'Proveedor_Dos', 'Proveedor2', 'prov2@gmail.com', '$2y$10$K893WptPPtRswyXYeZPj2.mm3KyPnFQaYokzMenTjrMaIJPGtQYpq', 'Proveedor', 3, '2016-06-16 16:53:26'),
(4, 'Proveedor3', 'Proveedor_Tres', 'Proveedor3', 'prov3@gmail.com', '$2y$10$K893WptPPtRswyXYeZPj2.mm3KyPnFQaYokzMenTjrMaIJPGtQYpq', 'Proveedor', 4, '0000-00-00 00:00:00');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bannershome`
--
ALTER TABLE `bannershome`
  ADD PRIMARY KEY (`idBannersHome`);

--
-- Indices de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  ADD PRIMARY KEY (`IdCaracteristica`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`);

--
-- Indices de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD PRIMARY KEY (`IdCiudad`,`IdEstado`),
  ADD KEY `FK_EstadoCiudad_idx` (`IdEstado`);

--
-- Indices de la tabla `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`IdContacto`);

--
-- Indices de la tabla `datosenvios`
--
ALTER TABLE `datosenvios`
  ADD PRIMARY KEY (`IdDatosEnvios`),
  ADD KEY `FK_DatosPed_idx` (`IdPedido`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`
  ADD PRIMARY KEY (`IdEstado`);

--
-- Indices de la tabla `marcas`
--
ALTER TABLE `marcas`
  ADD PRIMARY KEY (`IdMarca`);

--
-- Indices de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  ADD PRIMARY KEY (`idNewsletter`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`IdPedido`),
  ADD KEY `FK_PedProdu_idx` (`IdPedido`),
  ADD KEY `fk_Pedidos_Usuarios1` (`Usuarios_IdUsuario`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`IdProducto`,`Marcas_IdMarca`,`Categorias_IdCategoria`,`Subcategoria_IdSubcategoria`),
  ADD KEY `fk_Productos_Marcas1_idx` (`Marcas_IdMarca`),
  ADD KEY `fk_Productos_Categorias1_idx` (`Categorias_IdCategoria`),
  ADD KEY `fk_Productos_Subcategoria1_idx` (`Subcategoria_IdSubcategoria`);

--
-- Indices de la tabla `productos_has_caracteristicas`
--
ALTER TABLE `productos_has_caracteristicas`
  ADD PRIMARY KEY (`Productos_IdProducto`,`Caracteristicas_IdCaracteristica`),
  ADD KEY `fk_Productos_has_Caracteristicas_Caracteristicas1_idx` (`Caracteristicas_IdCaracteristica`),
  ADD KEY `fk_Productos_has_Caracteristicas_Productos1_idx` (`Productos_IdProducto`);

--
-- Indices de la tabla `productos_has_imagenes`
--
ALTER TABLE `productos_has_imagenes`
  ADD PRIMARY KEY (`IdImagen`,`Productos_IdProducto`),
  ADD KEY `fk_Productos_has_Imagenes_Productos1_idx` (`Productos_IdProducto`);

--
-- Indices de la tabla `productos_has_pedidos`
--
ALTER TABLE `productos_has_pedidos`
  ADD PRIMARY KEY (`Productos_IdProducto`,`Pedidos_IdPedido`),
  ADD KEY `fk_Productos_has_Pedidos_Pedidos1_idx` (`Pedidos_IdPedido`),
  ADD KEY `fk_Productos_has_Pedidos_Productos1_idx` (`Productos_IdProducto`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`idProveedor`,`TipoProveedor_idTipoProveedor`,`Estados_IdEstado`,`Ciudades_IdCiudad`),
  ADD KEY `fk_Proveedores_TipoProveedor1_idx` (`TipoProveedor_idTipoProveedor`),
  ADD KEY `fk_Proveedores_Estados1_idx` (`Estados_IdEstado`),
  ADD KEY `fk_Proveedores_Ciudades1_idx` (`Ciudades_IdCiudad`);

--
-- Indices de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD PRIMARY KEY (`IdSubcategoria`,`Categorias_IdCategoria`),
  ADD KEY `fk_Subcategoria_Categorias1_idx` (`Categorias_IdCategoria`);

--
-- Indices de la tabla `tipoproveedor`
--
ALTER TABLE `tipoproveedor`
  ADD PRIMARY KEY (`idTipoProveedor`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `bannershome`
--
ALTER TABLE `bannershome`
  MODIFY `idBannersHome` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=22;
--
-- AUTO_INCREMENT de la tabla `caracteristicas`
--
ALTER TABLE `caracteristicas`
  MODIFY `IdCaracteristica` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=50;
--
-- AUTO_INCREMENT de la tabla `ciudades`
--
ALTER TABLE `ciudades`
  MODIFY `IdCiudad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contactos`
--
ALTER TABLE `contactos`
  MODIFY `IdContacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `datosenvios`
--
ALTER TABLE `datosenvios`
  MODIFY `IdDatosEnvios` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `estados`
--
ALTER TABLE `estados`
  MODIFY `IdEstado` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `marcas`
--
ALTER TABLE `marcas`
  MODIFY `IdMarca` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=29;
--
-- AUTO_INCREMENT de la tabla `newsletter`
--
ALTER TABLE `newsletter`
  MODIFY `idNewsletter` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `IdPedido` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `IdProducto` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT de la tabla `productos_has_imagenes`
--
ALTER TABLE `productos_has_imagenes`
  MODIFY `IdImagen` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `idProveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  MODIFY `IdSubcategoria` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT de la tabla `tipoproveedor`
--
ALTER TABLE `tipoproveedor`
  MODIFY `idTipoProveedor` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `ciudades`
--
ALTER TABLE `ciudades`
  ADD CONSTRAINT `FK_EstadoCiudad` FOREIGN KEY (`IdEstado`) REFERENCES `estados` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `datosenvios`
--
ALTER TABLE `datosenvios`
  ADD CONSTRAINT `FK_DatosPed` FOREIGN KEY (`IdPedido`) REFERENCES `pedidos` (`IdPedido`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `fk_Pedidos_Usuarios1` FOREIGN KEY (`Usuarios_IdUsuario`) REFERENCES `usuarios` (`IdUsuario`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_Productos_Categorias1` FOREIGN KEY (`Categorias_IdCategoria`) REFERENCES `categorias` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_Marcas1` FOREIGN KEY (`Marcas_IdMarca`) REFERENCES `marcas` (`IdMarca`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_Subcategoria1` FOREIGN KEY (`Subcategoria_IdSubcategoria`) REFERENCES `subcategoria` (`IdSubcategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_caracteristicas`
--
ALTER TABLE `productos_has_caracteristicas`
  ADD CONSTRAINT `fk_Productos_has_Caracteristicas_Caracteristicas1` FOREIGN KEY (`Caracteristicas_IdCaracteristica`) REFERENCES `caracteristicas` (`IdCaracteristica`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Caracteristicas_Productos1` FOREIGN KEY (`Productos_IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_imagenes`
--
ALTER TABLE `productos_has_imagenes`
  ADD CONSTRAINT `fk_Productos_has_Imagenes_Productos1` FOREIGN KEY (`Productos_IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `productos_has_pedidos`
--
ALTER TABLE `productos_has_pedidos`
  ADD CONSTRAINT `fk_Productos_has_Pedidos_Pedidos1` FOREIGN KEY (`Pedidos_IdPedido`) REFERENCES `pedidos` (`IdPedido`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Productos_has_Pedidos_Productos1` FOREIGN KEY (`Productos_IdProducto`) REFERENCES `productos` (`IdProducto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `fk_Proveedores_Ciudades1` FOREIGN KEY (`Ciudades_IdCiudad`) REFERENCES `ciudades` (`IdCiudad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proveedores_Estados1` FOREIGN KEY (`Estados_IdEstado`) REFERENCES `estados` (`IdEstado`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Proveedores_TipoProveedor1` FOREIGN KEY (`TipoProveedor_idTipoProveedor`) REFERENCES `tipoproveedor` (`idTipoProveedor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `subcategoria`
--
ALTER TABLE `subcategoria`
  ADD CONSTRAINT `fk_Subcategoria_Categorias1` FOREIGN KEY (`Categorias_IdCategoria`) REFERENCES `categorias` (`IdCategoria`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
