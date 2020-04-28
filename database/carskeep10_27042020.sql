-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-04-2020 a las 02:24:04
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.2.26

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
  `FechaHoraRegistro` datetime DEFAULT NULL,
  `CodigoEstadoIngreso` char(1) DEFAULT NULL,
  `Observaciones` varchar(500) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'MANTENIMIENTO DE 5000KM.', 'aaaaaaaaaaa', '23.00', '500.00'),
(2, 'MANTENIMIENTO DE 10000KM.', 'editatdo', '5000.00', '30000.00'),
(3, 'MANTENIMIENTO DE 15000KM.', NULL, NULL, NULL),
(4, 'MANTENIMIENTO DE 20000KM.', NULL, NULL, NULL),
(5, 'MANTENIMIENTO DE 25000KM.', NULL, NULL, NULL),
(6, 'MANTENIMIENTO DE 30000KM.', NULL, NULL, NULL),
(7, 'MANTENIMIENTO DE 35000KM.', NULL, NULL, NULL),
(8, 'MANTENIMIENTO DE 40000KM.', NULL, NULL, NULL),
(9, 'MANTENIMIENTO DE 45000KM.', NULL, NULL, NULL),
(10, 'MANTENIMIENTO DE 50000KM.', NULL, NULL, NULL),
(11, 'MANTENIMIENTO DE 55000KM.', NULL, NULL, NULL),
(12, 'MANTENIMIENTO DE 60000KM. A', NULL, NULL, NULL),
(13, 'MANTENIMIENTO DE 60000KM. B', NULL, NULL, NULL),
(14, 'MANTENIMIENTO DE 65000KM.', NULL, NULL, NULL),
(15, 'MANTENIMIENTO DE 70000KM.', NULL, NULL, NULL),
(16, 'MANTENIMIENTO DE 75000KM.', NULL, NULL, NULL),
(17, 'MANTENIMIENTO DE 80000KM.', NULL, NULL, NULL),
(18, 'MANTENIMIENTO DE 85000KM.', NULL, NULL, NULL),
(19, 'MANTENIMIENTO DE 90000KM.', NULL, NULL, NULL),
(20, 'MANTENIMIENTO DE 95000KM.', NULL, NULL, NULL),
(21, 'MANTENIMIENTO DE 100000KM.', NULL, NULL, NULL),
(22, 'Prueba de Datos', 'aaaaaaaaaaaaaaaaaaa', '15.00', '300.00');

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
(3, 'Luis Antonio', 'admin@material.com', '2020-04-20 15:50:59', '$2y$10$SX3JOY./YH7B/WDQtFB9t.j.Lj6lFl7lX2iDrRxFspDm4Y7H3B1xm', 'sUtel0VMt7PCnhilKh7sGEOQrFn64xl4jkBPzQND12Yt8Zs1Ck5dj3koAQcD', '2020-04-20 15:50:59', '2020-04-20 17:04:02');

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
  ADD KEY `IdUsuario` (`IdUsuario`);

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
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

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
  MODIFY `IdIngresoArticulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tiposmantenimientos`
--
ALTER TABLE `tiposmantenimientos`
  MODIFY `IdTipoMantenimiento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

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
  ADD CONSTRAINT `ingresosarticulos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

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
