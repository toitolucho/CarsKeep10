-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-05-2020 a las 12:49:52
-- Versión del servidor: 10.4.6-MariaDB
-- Versión de PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `carskeep10`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividadesmantenimiento`
--

CREATE TABLE `actividadesmantenimiento` (
  `IdActividad` int(11) NOT NULL,
  `NombreActividad` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `actividadesmantenimiento`
--

INSERT INTO `actividadesmantenimiento` (`IdActividad`, `NombreActividad`) VALUES
(45, 'Afinado de motor.                                             '),
(46, 'Agua refrigerante de motor                                    '),
(47, 'Alineado y balanceado de ruedas.                              '),
(48, 'Balanceo de llantas.                                          '),
(49, 'Bujías.                                                       '),
(50, 'Cambiar aceite de caja y/o diferenciales.                     '),
(51, 'Cambiar aceite de motor.                                      '),
(52, 'Cambiar aceite de sistema de transferencia.                   '),
(53, 'Cambiar aceite de sistema de transmisión manual.              '),
(54, 'Cambiar filtro aire.                                          '),
(55, 'Cambiar filtro de aceite.                                     '),
(56, 'Cambiar filtro de polen.                                      '),
(57, 'Cambio correa de distribución.                                '),
(58, 'Engrase cardan modelos 4x4                                    '),
(59, 'Engrase rodamientos de maseros.                               '),
(60, 'Inspección de líquido de frenos y/o embrague.                 '),
(61, 'Inspeccion de sistema de dirección.                           '),
(62, 'inspección filtro de combustible.                             '),
(63, 'Inspección funcionamiento de motor.                           '),
(64, 'Inspeccion nivel de agua deposito limpiaparabrisas.           '),
(65, 'Inspeccion nivel de líquido refrigerante.                     '),
(66, 'Inspección nivel de solución de batería.                      '),
(67, 'Inspeccion sistema de dirección.                              '),
(68, 'Inspeccion sistema de suspensión.                             '),
(69, 'Inspeccion y limpieza de frenos.                              '),
(70, 'Limpieza e inspección chisguete y escobillas limpiaparabrisas '),
(71, 'Limpieza y calibrado de inyectores.                           '),
(72, 'Lubricado de bisagras de puertas.                             '),
(73, 'Regulado de embrague.                                         '),
(74, 'Revisión de luces en general.                                 '),
(75, 'Revisión de niveles en general.                               '),
(76, 'Revisión presión de llantas.                                  ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `articulos`
--

CREATE TABLE `articulos` (
  `IdArticulo` int(11) NOT NULL,
  `NombreArticulo` varchar(200) DEFAULT NULL,
  `IdCategoria` int(11) DEFAULT NULL,
  `CantidadExistencia` int(11) DEFAULT NULL,
  `PrecioVigente` decimal(10,2) DEFAULT NULL,
  `TipoInventario` char(1) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `articulos`
--

INSERT INTO `articulos` (`IdArticulo`, `NombreArticulo`, `IdCategoria`, `CantidadExistencia`, `PrecioVigente`, `TipoInventario`, `Descripcion`) VALUES
(1, 'Té Dharamsala editado', 15, 15, '57.00', 'U', 'descripcion'),
(2, 'Cerveza tibetana modificado', 12, 100, '100.00', 'U', 'modificado'),
(4, 'Especias Cajun del chef Anton', 6, 0, '0.00', 'P', NULL),
(5, 'Mezcla Gumbo del chef Anton', 11, 0, '0.00', 'P', NULL),
(6, 'Mermelada de grosellas de la abuela', 8, 0, '0.00', 'P', NULL),
(7, 'Peras secas orgánicas del tío Bob', 5, 0, '0.00', 'P', NULL),
(8, 'Salsa de arándanos Northwoods', 2, 0, '0.00', 'P', NULL),
(9, 'Buey Mishi Kobe', 8, 0, '0.00', 'P', NULL),
(10, 'Pez espada', 2, 0, '0.00', 'P', NULL),
(11, 'Queso Cabrales', 4, 0, '0.00', 'P', NULL),
(12, 'Queso Manchego La Pastora', 11, 0, '0.00', 'P', NULL),
(13, 'Algas Konbu', 14, 0, '0.00', 'P', NULL),
(14, 'Cuajada de judías', 7, 0, '0.00', 'P', NULL),
(15, 'Salsa de soja baja en sodio', 6, 0, '0.00', 'P', NULL),
(16, 'Postre de merengue Pavlova', 10, 0, '0.00', 'P', NULL),
(17, 'Cordero Alice Springs', 1, 0, '0.00', 'P', NULL),
(18, 'Langostinos tigre Carnarvon', 4, 0, '0.00', 'P', NULL),
(19, 'Pastas de té de chocolate', 3, 0, '0.00', 'P', NULL),
(20, 'Mermelada de Sir Rodneys', 3, 0, '0.00', 'P', NULL),
(21, 'Bollos de Sir Rodneys', 6, 0, '0.00', 'P', NULL),
(22, 'Pan de centeno crujiente estilo Gustafs', 6, 0, '0.00', 'P', NULL),
(23, 'Pan fino', 8, 0, '0.00', 'P', NULL),
(24, 'Refresco Guaraná Fantástica', 10, 0, '0.00', 'P', NULL),
(25, 'Crema de chocolate y nueces NuNuCa', 10, 0, '0.00', 'P', NULL),
(26, 'Ositos de goma Gumbär', 2, 0, '0.00', 'P', NULL),
(27, 'Chocolate Schoggi', 12, 0, '0.00', 'P', NULL),
(28, 'Col fermentada Rössle', 9, 0, '0.00', 'P', NULL),
(29, 'Salchicha Thüringer', 9, 0, '0.00', 'P', NULL),
(30, 'Arenque blanco del noroeste', 2, 0, '0.00', 'P', NULL),
(31, 'Queso gorgonzola Telino', 11, 0, '0.00', 'P', NULL),
(32, 'Queso Mascarpone Fabioli', 3, 0, '0.00', 'P', NULL),
(33, 'Queso de cabra', 13, 0, '0.00', 'P', NULL),
(34, 'Cerveza Sasquatch', 9, 0, '0.00', 'P', NULL),
(35, 'Cerveza negra Steeleye', 8, 0, '0.00', 'P', NULL),
(36, 'Escabeche de arenque', 12, 0, '0.00', 'P', NULL),
(37, 'Salmón ahumado Gravad', 5, 0, '0.00', 'P', NULL),
(38, 'Vino Côte de Blaye', 2, 0, '0.00', 'P', NULL),
(39, 'Licor verde Chartreuse', 9, 0, '0.00', 'P', NULL),
(40, 'Carne de cangrejo de Boston', 9, 0, '0.00', 'P', NULL),
(41, 'Crema de almejas estilo Nueva Inglaterra', 1, 0, '0.00', 'P', NULL),
(42, 'Tallarines de Singapur', 10, 0, '0.00', 'P', NULL),
(43, 'Café de Malasia', 15, 0, '0.00', 'P', NULL),
(44, 'Azúcar negra Malacca', 14, 0, '0.00', 'P', NULL),
(45, 'Arenque ahumado', 10, 0, '0.00', 'P', NULL),
(46, 'Arenque salado', 6, 0, '0.00', 'P', NULL),
(47, 'Galletas Zaanse', 1, 0, '0.00', 'P', NULL),
(48, 'Chocolate holandés', 2, 0, '0.00', 'P', NULL),
(49, 'Regaliz', 5, 0, '0.00', 'P', NULL),
(50, 'Chocolate blanco', 3, 0, '0.00', 'P', NULL),
(51, 'Manzanas secas Manjimup', 14, 0, '0.00', 'P', NULL),
(52, 'Cereales para Filo', 15, 0, '0.00', 'P', NULL),
(53, 'Empanada de carne', 3, 0, '0.00', 'P', NULL),
(54, 'Empanada de cerdo', 2, 0, '0.00', 'P', NULL),
(55, 'Paté chino', 13, 0, '0.00', 'P', NULL),
(56, 'Gnocchi de la abuela Alicia', 1, 0, '0.00', 'P', NULL),
(57, 'Raviolis Angelo', 9, 0, '0.00', 'P', NULL),
(58, 'Caracoles de Borgoña', 11, 0, '0.00', 'P', NULL),
(59, 'Raclet de queso Courdavault', 13, 0, '0.00', 'P', NULL),
(60, 'Camembert Pierrot', 3, 0, '0.00', 'P', NULL),
(61, 'Sirope de arce', 5, 0, '0.00', 'P', NULL),
(62, 'Tarta de azúcar', 13, 0, '0.00', 'P', NULL),
(63, 'Sandwich de vegetales', 7, 0, '0.00', 'P', NULL),
(64, 'Bollos de pan de Wimmer', 11, 0, '0.00', 'P', NULL),
(65, 'Salsa de pimiento picante de Luisiana', 3, 0, '0.00', 'P', NULL),
(66, 'Especias picantes de Luisiana', 10, 0, '0.00', 'P', NULL),
(67, 'Cerveza Laughing Lumberjack', 13, 0, '0.00', 'P', NULL),
(68, 'Barras de pan de Escocia', 2, 0, '0.00', 'P', NULL),
(69, 'Queso Gudbrandsdals', 14, 0, '0.00', 'P', NULL),
(70, 'Cerveza Outback', 7, 0, '0.00', 'P', NULL),
(71, 'Crema de queso Fløtemys', 5, 0, '0.00', 'P', NULL),
(72, 'Queso Mozzarella Giovanni', 4, 0, '0.00', 'P', NULL),
(73, 'Caviar rojo', 7, 0, '0.00', 'P', NULL),
(74, 'Queso de soja Longlife', 4, 0, '0.00', 'P', NULL),
(75, 'Cerveza Klosterbier Rhönbräu', 2, 0, '0.00', 'P', NULL),
(76, 'Licor Cloudberry', 10, 0, '0.00', 'P', NULL),
(77, 'Salsa verde original Frankfurter', 14, 0, '0.00', 'P', NULL),
(78, '01 Articulo de prueba modificado', 10, 100, '100.00', 'P', 'modificado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`IdCategoria`, `NombreCategoria`) VALUES
(3, 'Accesorios de materiales textiles  editado'),
(1, 'Aceites vegetales'),
(82, 'Alcoholes'),
(4, 'Alfombras y tapicería'),
(5, 'Algodón'),
(15, 'Almidón'),
(67, 'Aluminio y sus manufacturas'),
(31, 'Animales vivos'),
(62, 'Aparatos eléctricos'),
(40, 'Arroz'),
(76, 'Art. p/ el transp. o envasado, de plást.'),
(46, 'Artículos para baño de cerámica'),
(16, 'Azúcares'),
(73, 'Balanceado para animales'),
(17, 'Bebidas'),
(92, 'benjamin'),
(55, 'Café, té y Yerba Mate'),
(6, 'Calzados'),
(24, 'Carbón y leña'),
(32, 'Carne bovina congelada'),
(33, 'Carne bovina fresca o refrigerada'),
(34, 'Carne de ave'),
(35, 'Carnes procesadas'),
(77, 'Caucho en formas primarias'),
(68, 'Chapas, varillas, perfiles etc. de hierro y acero'),
(69, 'Cobre y sus manufacturas'),
(60, 'Cosmético'),
(36, 'Cueros bovinos o equinos'),
(18, 'Demás alimentos preparados'),
(7, 'Demás artículos confeccionados'),
(41, 'Demás cereales'),
(78, 'Demás manufacturas de caucho'),
(47, 'Demás manufacturas de cerámica'),
(79, 'Demás manufacturas de plástico'),
(74, 'Demás pelets y forrajes'),
(51, 'Demás productos manufacturados'),
(83, 'Demás productos químicos'),
(8, 'Demás productos textiles'),
(37, 'Despojos de carne'),
(84, 'Detergentes'),
(19, 'Esteviósido'),
(61, 'Farmacéutico'),
(9, 'Fibras sintéticas, sus hilados y tejidos'),
(56, 'Frutas'),
(2, 'Grasas animales'),
(20, 'Harinas y grañones'),
(70, 'Herramientas y utensilios de metal'),
(57, 'Hierbas medicinales, Stevia y demás hierbas'),
(71, 'Hierro y acero en formas primarias'),
(10, 'Hilados y tejidos de algodón'),
(58, 'Hortalizas'),
(85, 'Insecticidas y demás plaguicidas'),
(63, 'Instrumentos de precisión'),
(52, 'Juegos, juguetes y artículos deportivos'),
(59, 'Jugos de frutas o de hortalizas'),
(21, 'Lácteos'),
(48, 'Ladrillos, tejas y tubs de cerámica'),
(25, 'Madera aserrada'),
(26, 'Madera chapada'),
(27, 'Madera en bruto'),
(28, 'Madera para pisos'),
(42, 'Maíz'),
(72, 'Manufacturas de hierro y acero'),
(65, 'Máquinas industriales y accesorios'),
(64, 'Materiales de transporte terrestre'),
(22, 'Melaza'),
(86, 'Minerales'),
(29, 'Muebles'),
(80, 'Neumáticos'),
(43, 'Oleaginosas distintas a la soja'),
(30, 'Otros productos de madera'),
(23, 'Panadería y Pastelería'),
(53, 'Papeles y cartones'),
(75, 'Pelets y tortas de soja'),
(87, 'Piedras'),
(49, 'Placas y baldosas de cerámica'),
(81, 'Plástico en formas primarias'),
(11, 'Prendas de vestir de punto'),
(12, 'Prendas de vestir, no de punto'),
(38, 'Productos animales no comestibles'),
(39, 'Productos de cuero'),
(88, 'Productos de química anorgánica'),
(89, 'Productos de química orgánica'),
(54, 'Productos para procesamiento de papel'),
(13, 'Ropa de cama, mesa, tocador o cocina, mantas'),
(14, 'Seda'),
(44, 'Soja'),
(66, 'Soportes para la grabación'),
(90, 'Tabacos'),
(45, 'Trigo'),
(50, 'Vidrios');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `IdCliente` int(11) NOT NULL,
  `ci` char(10) DEFAULT NULL,
  `Nombres` varchar(100) DEFAULT NULL,
  `Apellidos` varchar(100) DEFAULT NULL,
  `NroCelular` int(11) DEFAULT NULL,
  `CorreoElectronico` varchar(200) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`IdCliente`, `ci`, `Nombres`, `Apellidos`, `NroCelular`, `CorreoElectronico`, `FechaRegistro`) VALUES
(6, '390338', 'Jayson Modificado', 'Erdman  Modificado', 7284863, 'shanel.bode@gmail.com', '1973-07-03 08:26:32'),
(7, '7841592', 'Lewis', 'Borer', 0, 'bruce84@ohara.com', '2012-12-15 13:12:59'),
(8, '5628248', 'Chauncey', 'Swaniawski', 0, 'turner.casey@swift.info', '2013-09-02 23:05:28'),
(9, '4873823', 'Chris', 'O\'Conner', 0, 'hallie45@gmail.com', '1987-08-28 19:51:21'),
(10, '9764770', 'Donato', 'Swaniawski', 0, 'veum.zander@hotmail.com', '2019-07-30 03:50:24'),
(11, '9993602', 'Quinten', 'Walker', 0, 'writchie@hotmail.com', '2016-02-22 05:30:57'),
(12, '4945804', 'Rene', 'Kunze', 0, 'javier50@yahoo.com', '1975-12-02 22:58:13'),
(13, '6157619', 'Linwood', 'Kerluke', 0, 'hlueilwitz@schmidt.biz', '1994-07-23 09:03:42'),
(14, '9036486', 'Ignacio', 'Cruickshank', 0, 'dgerlach@hotmail.com', '2019-07-06 06:38:46'),
(15, '6040406', 'Laurel', 'Lehner', 0, 'ernestina.champlin@hoppe.info', '2013-07-19 15:41:52'),
(16, '6111770', 'Earl', 'Hackett', 0, 'faustino.altenwerth@kertzmann.com', '1980-12-16 14:56:16'),
(17, '8552905', 'Moriah', 'Rau', 0, 'haskell04@goldner.com', '1975-12-12 21:22:31'),
(18, '8815087', 'Alexys', 'Friesen', 0, 'dicki.haven@ruecker.com', '1979-11-12 11:06:27'),
(19, '2645150', 'Brannon', 'Boyle', 0, 'gay.gislason@yahoo.com', '2008-01-22 02:20:24'),
(20, '3556505', 'Davon', 'Kris', 0, 'jjacobs@hotmail.com', '1982-01-25 20:30:31'),
(21, '2160902', 'Cooper', 'Heller', 0, 'ramon.russel@aufderhar.com', '1988-09-27 13:11:48'),
(22, '8494112', 'Hazle', 'Mills', 0, 'emmett85@hotmail.com', '2006-05-20 00:41:27'),
(23, '2022119', 'Moises', 'Haley', 0, 'morissette.alex@heaney.net', '1977-07-01 10:24:43'),
(24, '555387', 'Gavin', 'Maggio', 0, 'dejuan.langworth@skiles.net', '1971-09-16 15:41:33'),
(25, '6301142', 'Brice', 'Mayert', 0, 'chauncey.rodriguez@funk.net', '2013-07-22 04:53:43'),
(26, '4616168', 'Adan', 'Wolf', 0, 'lkihn@dach.org', '2001-07-23 23:10:00'),
(27, '8535955', 'Burley', 'Fahey', 0, 'welch.cayla@hotmail.com', '1993-09-18 02:46:47'),
(28, '5412400', 'Duncan', 'Bergstrom', 0, 'schmitt.jacquelyn@yahoo.com', '1970-10-23 08:56:50'),
(29, '3184027', 'Alvis', 'Gutmann', 0, 'labadie.frederic@yahoo.com', '1998-01-19 23:58:28'),
(30, '5704096', 'Delaney', 'Strosin', 0, 'thand@feest.com', '1997-11-20 02:18:42'),
(31, '6740462', 'Laurel', 'Langosh', 0, 'matteo76@mccullough.org', '1985-06-01 17:51:33'),
(32, '7363879', 'Arnulfo', 'Zieme', 0, 'joyce.watsica@gmail.com', '1982-05-29 23:19:26'),
(33, '8865423', 'Sonny', 'Skiles', 0, 'cindy.miller@hotmail.com', '2013-06-09 04:31:48'),
(34, '8252491', 'Rollin', 'Deckow', 0, 'domenic.hegmann@gmail.com', '1973-01-18 11:09:43'),
(35, '7720961', 'Matteo', 'Purdy', 0, 'bbergnaum@hotmail.com', '1992-05-11 12:01:03'),
(36, '6236978', 'Roman', 'Orn', 0, 'estelle.abernathy@metz.net', '1983-12-22 14:22:16'),
(37, '5655852', 'Lisandro', 'Mayert', 0, 'pamela.okeefe@gmail.com', '1984-09-29 01:22:30'),
(38, '2882716', 'Wilton', 'Brekke', 0, 'waylon.christiansen@ortiz.biz', '1995-05-24 20:18:10'),
(39, '2658611', 'Horace', 'Grimes', 0, 'mpaucek@schulist.com', '1982-01-05 03:37:02'),
(40, '3705953', 'Blair', 'Berge', 0, 'littel.grace@schroeder.com', '1988-04-25 23:24:05'),
(41, '9750766', 'Dan', 'Pagac', 0, 'wiegand.geraldine@rath.com', '1975-04-17 20:13:24'),
(42, '8027326', 'Domenic', 'Bergnaum', 0, 'avon@gmail.com', '2013-11-19 20:17:23'),
(43, '6598116', 'Magnus', 'Schmeler', 0, 'aupton@kunde.info', '2009-01-20 13:27:12'),
(44, '7862150', 'Luther', 'Zulauf', 0, 'koch.leola@hotmail.com', '1999-04-09 22:06:11'),
(45, '155056', 'Benjamin', 'Marvin', 0, 'hildegard.mueller@romaguera.com', '1971-12-25 08:40:31'),
(46, '5041028', 'Russell editado', '165456798', NULL, 'koch.stephon@hotmail.com', '1998-08-03 00:34:29'),
(47, '2891038', 'Oda', 'Bartell', 0, 'ldenesik@johns.com', '1994-02-07 01:57:10'),
(48, '4456704', 'Clifford', 'Hickle', 0, 'carroll.kris@jaskolski.com', '2006-02-06 02:16:20'),
(49, '813018', 'Drake', 'Stiedemann', 0, 'pluettgen@gmail.com', '2008-05-06 17:05:16'),
(50, '8647130', 'Kaden', 'Reichel', 0, 'josiane.heathcote@hotmail.com', '1989-09-24 05:32:07'),
(51, NULL, 'Fernando Ayala', '7446897', NULL, 'a@g.com', '2020-04-22 21:50:16'),
(52, NULL, 'Luis Fernando', 'Aguilar', 7989, 'fernando@gmail.com', '2020-04-22 21:57:48');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosarticulos`
--

CREATE TABLE `ingresosarticulos` (
  `IdIngresoArticulo` int(11) NOT NULL,
  `IdUsuario` int(11) DEFAULT NULL,
  `IdProveedor` int(11) DEFAULT NULL,
  `FechaHoraRegistro` datetime DEFAULT NULL,
  `CodigoEstadoIngreso` char(1) DEFAULT NULL,
  `Observaciones` varchar(600) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `ingresosarticulos`
--

INSERT INTO `ingresosarticulos` (`IdIngresoArticulo`, `IdUsuario`, `IdProveedor`, `FechaHoraRegistro`, `CodigoEstadoIngreso`, `Observaciones`) VALUES
(101, NULL, 21, '1989-05-29 00:15:54', 'F', 'Fugit in id odio voluptatem esse quod non ut autem repudiandae est quidem et deleniti voluptas amet molestiae rerum sed ea voluptas eveniet est libero.'),
(102, NULL, 4, '1988-11-09 21:01:55', 'A', 'Voluptatem qui omnis explicabo nihil cumque aut dolorum quas saepe et atque ullam ratione.'),
(103, NULL, 7, '2015-03-11 10:26:24', 'I', 'Officia et fugit harum dolor doloremque omnis harum iusto et in expedita voluptate dolor.'),
(104, NULL, 49, '1995-01-18 23:21:00', 'I', 'A molestias sunt mollitia officiis est qui quia nihil rerum est atque tempora vero odio et.'),
(105, NULL, 25, '2009-08-31 19:41:06', 'A', 'Sunt aut magni eius soluta quas nulla facere unde molestiae et ut in ut nisi maiores dolor ut non quaerat officiis placeat.'),
(106, NULL, 31, '2005-04-02 13:57:29', 'A', 'Soluta aliquid ipsum inventore et praesentium qui neque eaque et quia illum ex tenetur reiciendis neque similique accusantium aut explicabo.'),
(107, NULL, 37, '1986-04-06 06:55:29', 'F', 'Ut laudantium cupiditate vero quo omnis odio qui in sed voluptatem enim corporis necessitatibus voluptatem mollitia unde sit aut iure nisi similique explicabo eveniet.'),
(108, NULL, 18, '1997-07-01 13:55:44', 'A', 'Ab qui minus quia quaerat sunt aut aut quis assumenda rerum eaque nulla vel.'),
(109, NULL, 37, '1984-02-25 15:00:49', 'F', 'Quibusdam voluptatem sunt magnam ex quos blanditiis autem ea fugiat dignissimos beatae eius id delectus dolores in similique eligendi voluptas voluptates ut perferendis sed impedit earum sed.'),
(110, NULL, 49, '1979-01-09 08:46:59', 'I', 'Fugit impedit quia asperiores neque sed aut ipsum velit ea velit non sit quis eaque ut et commodi doloremque officiis officia eos voluptatibus.'),
(111, NULL, 50, '1995-10-05 18:24:11', 'I', 'Incidunt quam praesentium ab tempore eligendi deleniti asperiores doloribus aliquid officiis non nobis.'),
(112, NULL, 49, '1976-09-17 21:53:06', 'I', 'Qui ex voluptas atque cumque minus alias enim nihil ea est velit impedit fugiat et nulla impedit dolor eos sed quidem consequatur vero dolorem molestiae alias eligendi pariatur.'),
(113, NULL, 35, '1995-10-02 17:51:30', 'I', 'Unde qui unde animi occaecati quidem suscipit eos enim non sit optio est minima dolore sapiente.'),
(114, NULL, 13, '1970-09-26 05:42:13', 'F', 'Consectetur inventore accusantium similique autem omnis cum ut vel quod enim illo nihil rem dolores nisi corporis voluptas assumenda facere temporibus voluptatibus fugit reiciendis et adipisci quos ratione.'),
(115, NULL, 15, '1988-05-17 03:47:53', 'F', 'Veniam esse culpa est laboriosam nam vitae non nam maxime in laboriosam hic omnis ab sed nihil necessitatibus voluptatem sint qui reiciendis est odit porro eum.'),
(116, NULL, 45, '2009-01-22 08:46:51', 'I', 'Est eum occaecati accusamus praesentium qui sint sed ut iure dolore aliquam blanditiis qui.'),
(117, NULL, 17, '2001-11-02 15:35:35', 'I', 'Dignissimos voluptates magnam expedita aut possimus nulla optio nostrum qui quo aut voluptate ratione ratione dolorem voluptate laborum ratione dignissimos expedita deserunt atque quia expedita.'),
(118, NULL, 50, '2008-03-04 23:34:12', 'F', 'Laboriosam nemo rem molestiae inventore omnis qui ducimus omnis ipsam exercitationem accusantium sunt molestiae quae dolorem architecto at sapiente et ut.'),
(119, NULL, 11, '2007-12-02 04:43:49', 'A', 'Est ut eaque laudantium autem deleniti necessitatibus iste aut ad maiores laudantium cupiditate neque dolorem ut et deserunt corporis consectetur.'),
(120, NULL, 15, '1981-08-14 23:54:24', 'F', 'Repudiandae quas earum sit aperiam possimus voluptatum inventore voluptatem quia itaque illum voluptatem.'),
(121, NULL, 41, '2014-01-22 20:45:35', 'F', 'Voluptas maiores inventore beatae repellendus provident et rerum quia pariatur ipsam laudantium dolorum sit.'),
(122, NULL, 25, '1974-05-23 20:40:19', 'A', 'Facere reprehenderit vel numquam eaque deleniti earum itaque omnis sunt aut nemo qui in.'),
(123, NULL, 18, '2015-12-19 13:36:36', 'F', 'Amet architecto rerum ut ea vitae et qui ut numquam facere veniam quasi.'),
(124, NULL, 1, '1988-05-19 14:31:07', 'F', 'Voluptatem placeat quam reprehenderit qui enim cum in veniam necessitatibus aliquam suscipit accusamus et et expedita dolorum earum nobis neque doloribus accusamus.'),
(125, NULL, 43, '2001-02-12 22:04:01', 'F', 'Rerum nemo neque voluptas voluptate molestiae laborum voluptatum non sed voluptas aut corporis ullam voluptate optio ullam dicta reprehenderit aut perspiciatis perferendis architecto vel non exercitationem qui est.'),
(126, NULL, 30, '1988-02-04 07:09:56', 'I', 'Culpa sapiente labore eos omnis ea cumque corrupti quis aut officia libero quia iste facilis autem autem perferendis adipisci quidem rerum aperiam neque quo.'),
(127, NULL, 44, '1972-11-17 00:06:38', 'I', 'Eum ut iusto cum similique dolor eos ipsum pariatur at aut atque reiciendis fugiat doloribus odit quas aliquam alias voluptas maxime quam.'),
(128, NULL, 25, '1988-09-15 10:12:24', 'I', 'Maiores in vel ut voluptate illo nemo doloribus nulla est dolor vel reprehenderit cum sapiente odio fuga omnis nobis ut velit occaecati quasi omnis placeat nostrum iusto.'),
(129, NULL, 11, '1992-05-22 05:42:49', 'I', 'Libero magnam accusamus ut voluptate eum dignissimos sint sunt fugit soluta optio et iste et et voluptatem dolor laudantium ut ab dolorem aut.'),
(130, NULL, 22, '2002-05-31 05:47:47', 'F', 'Enim quod adipisci porro reiciendis blanditiis maiores id aut soluta illum est voluptates quia consequuntur qui ut amet vitae.'),
(131, NULL, 40, '1971-12-15 15:12:27', 'I', 'Iusto quas aliquam ut molestiae repellendus deleniti ut id earum neque similique ea est dolorum sapiente sint.'),
(132, NULL, 10, '2004-06-29 14:13:20', 'I', 'Deserunt vel delectus voluptas et beatae voluptatum sunt eos sit iste ducimus inventore sit ipsam sunt corporis repellat pariatur aspernatur provident possimus.'),
(133, NULL, 43, '2001-08-12 20:11:54', 'F', 'Voluptas maiores excepturi cumque possimus a aut id sapiente iste qui facilis minima nihil eos aut ipsa.'),
(134, NULL, 37, '1992-04-11 07:34:07', 'I', 'Nobis ea in eius soluta sequi quas dicta saepe cumque dolorem non consequuntur explicabo omnis et eum animi saepe laboriosam dolores commodi porro iusto.'),
(135, NULL, 2, '1975-04-22 22:11:59', 'F', 'Dolorem ratione quidem possimus saepe dignissimos exercitationem nesciunt sed voluptates voluptate similique et nam suscipit modi vel quod.'),
(136, NULL, 25, '2004-06-17 21:43:38', 'I', 'Autem sed corporis quia ex impedit reprehenderit molestias officia quibusdam deleniti numquam ut non et labore distinctio perspiciatis eum.'),
(137, NULL, 15, '1983-12-05 23:00:36', 'I', 'Culpa et libero dolore et pariatur eos iste est qui enim laborum nihil minima dolore ex aut.'),
(138, NULL, 13, '2015-01-29 19:10:38', 'F', 'Quo earum in harum iusto eos est quidem qui pariatur nemo corporis culpa molestiae alias aut suscipit dolorem voluptas ipsa rem sit quis qui est architecto rem.'),
(139, NULL, 30, '1990-07-20 16:28:04', 'I', 'Aut dolore incidunt ad quas delectus quis omnis suscipit fuga id eligendi dolores architecto delectus qui et ut at.'),
(140, NULL, 9, '1978-01-18 03:18:20', 'F', 'Vel eum accusamus est aperiam suscipit mollitia debitis laborum eaque ullam quisquam accusantium quia hic beatae quia unde.'),
(141, NULL, 45, '1986-07-09 19:59:10', 'F', 'Necessitatibus a error eum nam eos reprehenderit qui illo molestias perferendis officiis qui ut ea quam culpa excepturi perferendis ipsa qui.'),
(142, NULL, 22, '2013-05-17 02:42:57', 'A', 'Qui dignissimos velit debitis sit est recusandae modi ducimus laudantium iure aut aut et ipsum asperiores qui optio dolorem velit blanditiis quia aliquam cum amet officiis voluptatem officia.'),
(143, NULL, 31, '1972-04-25 11:52:50', 'I', 'Dolor aut et autem et libero quia quo quam aut voluptatem nemo pariatur omnis veritatis eaque saepe omnis nisi.'),
(144, NULL, 35, '1981-01-29 01:55:06', 'F', 'Tempore molestiae ut alias placeat rerum est sunt sint ducimus inventore incidunt natus id sed recusandae animi voluptatem.'),
(145, NULL, 42, '1971-08-30 23:18:12', 'F', 'Labore officiis et id praesentium architecto non ex corrupti iure sit dolor ullam illum ut reprehenderit mollitia aut eum qui quasi totam nemo eius maiores provident.'),
(146, NULL, 17, '1972-07-04 13:05:11', 'I', 'Voluptates facere veniam sunt repellat laboriosam et molestiae sit sed odio facere eos doloremque officia sit odit minima nobis delectus explicabo excepturi illum.'),
(147, NULL, 32, '2005-07-28 19:26:46', 'F', 'Facere rerum exercitationem et eius ullam aut nihil assumenda recusandae id quae quos et cum incidunt illo officiis repudiandae aut velit aspernatur ullam.'),
(148, NULL, 16, '2016-12-24 12:26:21', 'A', 'Qui est non maiores veritatis est debitis quam exercitationem id soluta ut nobis possimus sunt dicta sed earum aperiam voluptas voluptatibus soluta minus.'),
(149, NULL, 44, '1982-06-24 05:15:03', 'A', 'Dolorem eum exercitationem fuga tempora optio ducimus voluptates et nihil distinctio aut in voluptate accusantium accusantium totam amet in soluta.'),
(150, NULL, 49, '1991-03-11 12:21:51', 'F', 'Impedit aliquam occaecati sapiente iste quod doloribus distinctio eos impedit voluptas autem voluptatibus exercitationem unde aliquam quasi quis fuga.'),
(151, NULL, 37, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingresosarticulosdetalle`
--

CREATE TABLE `ingresosarticulosdetalle` (
  `IdIngresoArticulo` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ;

--
-- Volcado de datos para la tabla `ingresosarticulosdetalle`
--

INSERT INTO `ingresosarticulosdetalle` (`IdIngresoArticulo`, `IdArticulo`, `Cantidad`, `Precio`) VALUES
(101, 7, 306, '3904.93'),
(101, 18, 551, '4796.44'),
(101, 52, 93, '7506.96'),
(103, 6, 840, '7782.42'),
(103, 31, 275, '2203.90'),
(103, 47, 758, '1536.28'),
(104, 32, 653, '2551.60'),
(104, 73, 451, '1263.27'),
(105, 21, 31, '3552.87'),
(105, 61, 915, '5760.79'),
(106, 11, 495, '6526.34'),
(106, 18, 263, '5765.71'),
(106, 22, 272, '4568.22'),
(106, 73, 797, '4837.55'),
(107, 12, 247, '8387.87'),
(107, 21, 9, '4519.84'),
(107, 24, 803, '4588.48'),
(107, 59, 272, '8655.04'),
(107, 61, 509, '5710.38'),
(107, 66, 453, '2515.67'),
(108, 24, 904, '1324.74'),
(109, 58, 810, '4599.59'),
(109, 61, 690, '7281.31'),
(110, 27, 86, '2909.99'),
(110, 48, 707, '9154.22'),
(111, 1, 371, '1458.05'),
(111, 22, 161, '7757.53'),
(112, 4, 557, '9186.61'),
(112, 11, 293, '3356.70'),
(112, 21, 909, '9530.91'),
(112, 40, 951, '7954.76'),
(112, 65, 124, '4461.79'),
(113, 4, 835, '303.63'),
(113, 16, 298, '9309.20'),
(113, 66, 380, '3076.06'),
(115, 41, 129, '6991.54'),
(117, 24, 956, '7563.53'),
(118, 37, 498, '7066.85'),
(118, 73, 911, '1005.17'),
(118, 74, 572, '8340.83'),
(119, 67, 89, '4534.46'),
(120, 15, 884, '5480.36'),
(121, 5, 856, '1799.29'),
(121, 63, 874, '5333.26'),
(121, 73, 965, '7884.06'),
(122, 66, 287, '5784.08'),
(123, 43, 303, '4685.72'),
(124, 1, 96, '3133.61'),
(124, 39, 935, '5234.83'),
(126, 64, 933, '4633.54'),
(126, 65, 612, '5773.98'),
(127, 69, 40, '2961.62'),
(128, 11, 455, '6038.83'),
(128, 33, 902, '1048.65'),
(129, 74, 32, '3593.24'),
(130, 27, 109, '7408.36'),
(130, 52, 932, '7958.26'),
(131, 12, 64, '9228.92'),
(132, 22, 581, '2858.06'),
(132, 72, 743, '4796.43'),
(133, 53, 998, '1591.02'),
(134, 21, 488, '4599.76'),
(134, 35, 752, '5893.31'),
(134, 43, 161, '8555.38'),
(134, 47, 719, '7340.86'),
(134, 67, 276, '6663.52'),
(136, 38, 34, '4641.74'),
(136, 49, 323, '4532.56'),
(136, 57, 941, '2476.68'),
(136, 61, 315, '4500.59'),
(137, 46, 366, '2315.70'),
(137, 66, 366, '3416.34'),
(138, 59, 148, '8086.39'),
(140, 45, 342, '4486.82'),
(140, 73, 85, '3810.47'),
(141, 40, 890, '5459.72'),
(142, 51, 971, '8461.41'),
(142, 55, 133, '6062.11'),
(142, 70, 334, '2323.13'),
(143, 5, 300, '1554.23'),
(144, 24, 235, '1356.74'),
(144, 41, 851, '5372.17'),
(144, 48, 511, '804.85'),
(146, 45, 404, '9388.55'),
(147, 47, 604, '8420.25'),
(147, 48, 609, '1456.47'),
(147, 49, 315, '3999.11'),
(147, 50, 135, '7677.72'),
(147, 71, 581, '618.02'),
(148, 46, 415, '4541.15'),
(148, 57, 442, '3157.63'),
(149, 27, 75, '6127.52'),
(150, 49, 104, '4020.54'),
(150, 67, 827, '477.93');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `IdProveedor` int(11) NOT NULL,
  `NombreRazonSocial` varchar(200) DEFAULT NULL,
  `NombreRepresentante` varchar(200) DEFAULT NULL,
  `Direccion` varchar(150) DEFAULT NULL,
  `NroCelular` char(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`IdProveedor`, `NombreRazonSocial`, `NombreRepresentante`, `Direccion`, `NroCelular`) VALUES
(1, 'Llewellyn', 'Walsh', '810 Octavia Pine Apt. 177\nEast Brady, OR 95484-0802', '0'),
(2, 'Miles', 'Hansen', '48089 D\'Amore Course\nLeuschkefort, WV 86547-4452', '0'),
(3, 'Alexandre', 'Morar', '5692 Genesis Rest Suite 767\nBernardoborough, MI 32008', '0'),
(4, 'Adelbert', 'Krajcik', '94902 Beer Crossroad\nNew Krista, NE 38949-0268', '0'),
(5, 'Pierce', 'Kozey', '6024 Feeney Forest Suite 167\nLindbury, NH 24829-5195', '0'),
(6, 'Berry', 'Leuschke', '33994 Concepcion Freeway Apt. 600\nEast Queen, NY 97006', '0'),
(7, 'Mohammed', 'Marks', '72151 Treutel Canyon\nNienowberg, ND 30660', '0'),
(8, 'Durward', 'Fahey', '891 Frami Summit\nEast Milesberg, MI 23625-9640', '0'),
(9, 'Louisa', 'Watsica', '5547 Beahan Shoal Suite 235\nRoobstad, NJ 80966-3064', '0'),
(10, 'Madisen', 'Stamm', '73219 Ray Common\nWest Myronland, IL 44834-2794', '0'),
(11, 'Morris', 'Kuhn', '9073 Malvina Port Suite 909\nSchneiderberg, MD 81851-2005', '0'),
(12, 'Brandon', 'Towne', '7112 Jerde Common Apt. 946\nLitzyborough, MN 28900-5767', '0'),
(13, 'Emmett', 'Schumm', '997 Kobe Meadows\nKatelinhaven, GA 89772-7671', '0'),
(14, 'Ahmad', 'Grant', '18001 Jamie Curve\nRichiehaven, TX 13075-3915', '0'),
(15, 'Anastacio', 'Bechtelar', '590 Greenfelder Walks Suite 903\nPort Danielaberg, MS 53003', '0'),
(16, 'Cary', 'Stamm', '993 Cremin Extension\nPort Elian, AZ 31567', '0'),
(17, 'Timothy', 'Prosacco', '3999 Elijah Tunnel\nHelmerside, DE 79420-3969', '0'),
(18, 'Uriah', 'Wolf', '4950 Rice Common Suite 242\nEast Lily, CT 37596', '0'),
(19, 'Stan', 'Crist', '932 Runte Heights\nRathport, FL 23282-2067', '0'),
(20, 'Nat', 'Howe', '22182 Lucio Place\nPort Christelle, OH 81871-5279', '0'),
(21, 'Darien', 'Morar', '80517 Murphy Stream\nNew Norwood, OR 87646', '0'),
(22, 'Ron', 'Heaney', '730 Kub Courts Apt. 312\nNicolasshire, CO 84164-3174', '0'),
(23, 'Leopold', 'Kozey', '3317 Walker Spur Apt. 960\nLake Prudencemouth, WI 11658', '0'),
(24, 'Dameon', 'Hudson', '88884 Gulgowski Court Suite 023\nWest Bridgetmouth, MS 57191', '0'),
(25, 'Lennie', 'Shields', '8205 Jast Skyway Apt. 391\nSouth Fanniemouth, FL 69536', '0'),
(26, 'Brad', 'Ratke', '25468 Stanton Plains\nWest Mckaylafort, NM 42531-1682', '0'),
(27, 'Hilario', 'Mueller', '9974 Trever Turnpike\nWaltermouth, VA 86267', '0'),
(28, 'Kelley', 'Feest', '4994 Ruecker Street\nSouth Ryderville, NV 59528', '0'),
(29, 'Angelo', 'Effertz', '9502 Koepp Plain Suite 215\nPort Antwan, KS 88378', '0'),
(30, 'Ibrahim', 'Mills', '883 Hoeger Dale\nSavannafurt, AL 07981-0189', '0'),
(31, 'Demarco', 'O\'Hara', '83955 Bernhard Tunnel Suite 624\nWest Evan, NC 28650-2601', '0'),
(32, 'Spencer', 'Hettinger', '8464 Hammes Village\nGreenfelderburgh, OR 59197-3950', '0'),
(33, 'Alejandrin', 'Dooley', '333 Ned Springs Apt. 806\nRaphaelleborough, HI 44507', '0'),
(34, 'Glennie', 'Altenwerth', '6933 Mafalda Flats Suite 176\nWest Patience, HI 51905-4704', '0'),
(35, 'Henri', 'Runolfsdottir', '900 Lucienne Mill\nPort Craig, KS 17648', '0'),
(36, 'Isai', 'Mante', '713 Emard Hills\nNew Cornellside, NM 43096', '0'),
(37, 'Kacey', 'Baumbach', '163 Carlie Rapids Apt. 937\nSouth Cristopher, AK 55670-7486', '0'),
(38, 'Wilbert', 'Bahringer', '989 Abigail Union Suite 834\nLake Carolfurt, DE 40283', '0'),
(39, 'Dereck', 'Bartoletti', '5035 Schmidt Spurs Apt. 334\nNorth Harmon, TN 55715-9999', '0'),
(40, 'Devan', 'Hessel', '78138 Rempel Radial Apt. 389\nPort Asha, MN 31745-4009', '0'),
(41, 'Adam', 'Lockman', '48889 Robin Forest Suite 663\nEast Margarettmouth, NV 20170', '0'),
(42, 'Reilly', 'King', '957 Edythe Tunnel Apt. 753\nNew Daphnee, VT 88165-2406', '0'),
(43, 'Rodrick', 'Nolan', '962 Ratke Summit\nParkerbury, OK 08278', '0'),
(44, 'Braeden', 'Anderson', '2153 Feil Mills Apt. 408\nCecileshire, OR 47122-2771', '0'),
(45, 'Gunnar', 'Parisian', '382 Emily Grove Suite 175\nNorth Bette, SC 21642', '0'),
(46, 'Zechariah', 'Bogan', '709 Kris Fort\nNorth Maxie, RI 89654-5353', '0'),
(47, 'Immanuel', 'Yundt', '74778 Lilliana Row\nMillershire, WV 11441', '0'),
(48, 'Lincoln', 'Jacobs', '97040 Nader Ways Apt. 876\nNew Johnathan, ID 48927-3634', '0'),
(49, 'Lon', 'Zieme', '2827 Diamond Roads\nNew Neomatown, MS 19581', '0'),
(50, 'Mario', 'Kovacek', '3318 Forest Tunnel\nLake Nickolashaven, DE 03592', '0');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmantenimientos`
--

CREATE TABLE `tiposmantenimientos` (
  `IdTipoMantenimiento` int(11) NOT NULL,
  `NombreMantenimiento` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `LimiteInferiorKilometraje` decimal(10,2) DEFAULT NULL,
  `LimiteSuperiorKilometraje` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tiposmantenimientos`
--

INSERT INTO `tiposmantenimientos` (`IdTipoMantenimiento`, `NombreMantenimiento`, `Descripcion`, `LimiteInferiorKilometraje`, `LimiteSuperiorKilometraje`) VALUES
(0, 'MANTENIMIENTO DE 5000KM.', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmantenimientosdetalle`
--

CREATE TABLE `tiposmantenimientosdetalle` (
  `IdTipoMantenimiento` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `Obligatorio` char(1) DEFAULT NULL,
  `CostoServicio` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tiposmantenimientosdetallearticulos`
--

CREATE TABLE `tiposmantenimientosdetallearticulos` (
  `IdTipoMantenimiento` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Luis Antonio', 'admin@material.com', '2020-04-20 15:50:59', '$2y$10$SX3JOY./YH7B/WDQtFB9t.j.Lj6lFl7lX2iDrRxFspDm4Y7H3B1xm', 'REn6dkDlwjo60XbAAxELX03vsMCd7Zy0uyd3KMCxoZu9Z7CTUedxOZUqi8op', '2020-04-20 15:50:59', '2020-04-20 17:04:02');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `IdUsuario` int(11) NOT NULL,
  `NombreCompleto` varchar(200) DEFAULT NULL,
  `NombreUsuario` varchar(100) DEFAULT NULL,
  `Contrasenia` varchar(100) DEFAULT NULL,
  `FechaRegistro` datetime DEFAULT NULL,
  `TipoUsuario` char(1) DEFAULT NULL,
  `CodigoEstadoDisposicion` char(1) DEFAULT NULL,
  `CodigoEstado` char(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasservicio`
--

CREATE TABLE `ventasservicio` (
  `IdVentaServicio` int(11) NOT NULL,
  `IdUsuarioSecretaria` int(11) DEFAULT NULL,
  `IdUsuarioTecnico` int(11) DEFAULT NULL,
  `IdCliente` int(11) DEFAULT NULL,
  `FechaHoraVenta` datetime DEFAULT NULL,
  `CodigoEstadoVenta` char(1) DEFAULT NULL,
  `Kilometraje` decimal(10,2) DEFAULT NULL,
  `MarcaMovilidad` varchar(10) DEFAULT NULL,
  `Observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasserviciodetallearticulos`
--

CREATE TABLE `ventasserviciodetallearticulos` (
  `IdVentaServicio` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ventasserviciodetallemantenimiento`
--

CREATE TABLE `ventasserviciodetallemantenimiento` (
  `IdVentaServicio` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `Costo` decimal(10,2) DEFAULT NULL,
  `CodigoEstadoEjecucion` char(1) DEFAULT NULL,
  `Observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividadesmantenimiento`
--
ALTER TABLE `actividadesmantenimiento`
  ADD PRIMARY KEY (`IdActividad`),
  ADD UNIQUE KEY `NombreActividad` (`NombreActividad`);

--
-- Indices de la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`IdArticulo`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`),
  ADD UNIQUE KEY `NombreCategoria` (`NombreCategoria`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `ingresosarticulos`
--
ALTER TABLE `ingresosarticulos`
  ADD PRIMARY KEY (`IdIngresoArticulo`),
  ADD KEY `IdUsuario` (`IdUsuario`),
  ADD KEY `IdProveedor` (`IdProveedor`);

--
-- Indices de la tabla `ingresosarticulosdetalle`
--
ALTER TABLE `ingresosarticulosdetalle`
  ADD PRIMARY KEY (`IdIngresoArticulo`,`IdArticulo`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`IdProveedor`),
  ADD UNIQUE KEY `NombreRazonSocial` (`NombreRazonSocial`);

--
-- Indices de la tabla `tiposmantenimientos`
--
ALTER TABLE `tiposmantenimientos`
  ADD PRIMARY KEY (`IdTipoMantenimiento`);

--
-- Indices de la tabla `tiposmantenimientosdetalle`
--
ALTER TABLE `tiposmantenimientosdetalle`
  ADD PRIMARY KEY (`IdTipoMantenimiento`,`IdActividad`),
  ADD KEY `IdActividad` (`IdActividad`);

--
-- Indices de la tabla `tiposmantenimientosdetallearticulos`
--
ALTER TABLE `tiposmantenimientosdetallearticulos`
  ADD PRIMARY KEY (`IdTipoMantenimiento`,`IdActividad`,`IdArticulo`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indices de la tabla `ventasservicio`
--
ALTER TABLE `ventasservicio`
  ADD PRIMARY KEY (`IdVentaServicio`),
  ADD KEY `IdUsuarioSecretaria` (`IdUsuarioSecretaria`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indices de la tabla `ventasserviciodetallearticulos`
--
ALTER TABLE `ventasserviciodetallearticulos`
  ADD PRIMARY KEY (`IdVentaServicio`,`IdArticulo`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indices de la tabla `ventasserviciodetallemantenimiento`
--
ALTER TABLE `ventasserviciodetallemantenimiento`
  ADD PRIMARY KEY (`IdVentaServicio`,`IdActividad`),
  ADD KEY `IdActividad` (`IdActividad`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividadesmantenimiento`
--
ALTER TABLE `actividadesmantenimiento`
  MODIFY `IdActividad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT de la tabla `articulos`
--
ALTER TABLE `articulos`
  MODIFY `IdArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ingresosarticulos`
--
ALTER TABLE `ingresosarticulos`
  MODIFY `IdIngresoArticulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=152;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `IdProveedor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `ventasservicio`
--
ALTER TABLE `ventasservicio`
  MODIFY `IdVentaServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`);

--
-- Filtros para la tabla `ingresosarticulos`
--
ALTER TABLE `ingresosarticulos`
  ADD CONSTRAINT `ingresosarticulos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `ingresosarticulos_ibfk_2` FOREIGN KEY (`IdProveedor`) REFERENCES `proveedores` (`IdProveedor`);

--
-- Filtros para la tabla `ingresosarticulosdetalle`
--
ALTER TABLE `ingresosarticulosdetalle`
  ADD CONSTRAINT `ingresosarticulosdetalle_ibfk_1` FOREIGN KEY (`IdIngresoArticulo`) REFERENCES `ingresosarticulos` (`IdIngresoArticulo`),
  ADD CONSTRAINT `ingresosarticulosdetalle_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulo`);

--
-- Filtros para la tabla `tiposmantenimientosdetalle`
--
ALTER TABLE `tiposmantenimientosdetalle`
  ADD CONSTRAINT `tiposmantenimientosdetalle_ibfk_1` FOREIGN KEY (`IdTipoMantenimiento`) REFERENCES `tiposmantenimientos` (`IdTipoMantenimiento`),
  ADD CONSTRAINT `tiposmantenimientosdetalle_ibfk_2` FOREIGN KEY (`IdActividad`) REFERENCES `actividadesmantenimiento` (`IdActividad`);

--
-- Filtros para la tabla `tiposmantenimientosdetallearticulos`
--
ALTER TABLE `tiposmantenimientosdetallearticulos`
  ADD CONSTRAINT `tiposmantenimientosdetallearticulos_ibfk_1` FOREIGN KEY (`IdTipoMantenimiento`,`IdActividad`) REFERENCES `tiposmantenimientosdetalle` (`IdTipoMantenimiento`, `IdActividad`),
  ADD CONSTRAINT `tiposmantenimientosdetallearticulos_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulo`);

--
-- Filtros para la tabla `ventasservicio`
--
ALTER TABLE `ventasservicio`
  ADD CONSTRAINT `ventasservicio_ibfk_1` FOREIGN KEY (`IdUsuarioSecretaria`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `ventasservicio_ibfk_2` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`);

--
-- Filtros para la tabla `ventasserviciodetallearticulos`
--
ALTER TABLE `ventasserviciodetallearticulos`
  ADD CONSTRAINT `ventasserviciodetallearticulos_ibfk_1` FOREIGN KEY (`IdVentaServicio`) REFERENCES `ventasservicio` (`IdVentaServicio`),
  ADD CONSTRAINT `ventasserviciodetallearticulos_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulo`);

--
-- Filtros para la tabla `ventasserviciodetallemantenimiento`
--
ALTER TABLE `ventasserviciodetallemantenimiento`
  ADD CONSTRAINT `ventasserviciodetallemantenimiento_ibfk_1` FOREIGN KEY (`IdVentaServicio`) REFERENCES `ventasservicio` (`IdVentaServicio`),
  ADD CONSTRAINT `ventasserviciodetallemantenimiento_ibfk_2` FOREIGN KEY (`IdActividad`) REFERENCES `actividadesmantenimiento` (`IdActividad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
