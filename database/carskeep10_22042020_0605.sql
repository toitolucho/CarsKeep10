-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2020 at 12:04 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `carskeep10`
--

-- --------------------------------------------------------

--
-- Table structure for table `actividadesmantenimiento`
--

CREATE TABLE `actividadesmantenimiento` (
  `IdActividad` int(11) NOT NULL,
  `NombreActividad` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `articulos`
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

-- --------------------------------------------------------

--
-- Table structure for table `categorias`
--

CREATE TABLE `categorias` (
  `IdCategoria` int(11) NOT NULL,
  `NombreCategoria` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `clientes`
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

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
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
-- Table structure for table `ingresosarticulos`
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
-- Table structure for table `ingresosarticulosdetalle`
--

CREATE TABLE `ingresosarticulosdetalle` (
  `IdIngresoArticulo` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL,
  `Cantidad` int(11) NOT NULL,
  `Precio` decimal(10,2) NOT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tiposmantenimientos`
--

CREATE TABLE `tiposmantenimientos` (
  `IdTipoMantenimiento` int(11) NOT NULL,
  `NombreMantenimiento` varchar(100) DEFAULT NULL,
  `Descripcion` varchar(200) DEFAULT NULL,
  `LimiteInferiorKilometraje` decimal(10,2) DEFAULT NULL,
  `LimiteSuperiorKilometraje` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiposmantenimientosdetalle`
--

CREATE TABLE `tiposmantenimientosdetalle` (
  `IdTipoMantenimiento` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `Obligatorio` char(1) DEFAULT NULL,
  `CostoServicio` decimal(10,2) DEFAULT 0.00
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tiposmantenimientosdetallearticulos`
--

CREATE TABLE `tiposmantenimientosdetallearticulos` (
  `IdTipoMantenimiento` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `users`
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
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(3, 'Luis Antonio', 'admin@material.com', '2020-04-20 15:50:59', '$2y$10$SX3JOY./YH7B/WDQtFB9t.j.Lj6lFl7lX2iDrRxFspDm4Y7H3B1xm', 'REn6dkDlwjo60XbAAxELX03vsMCd7Zy0uyd3KMCxoZu9Z7CTUedxOZUqi8op', '2020-04-20 15:50:59', '2020-04-20 17:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
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
-- Table structure for table `ventasservicio`
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
-- Table structure for table `ventasserviciodetallearticulos`
--

CREATE TABLE `ventasserviciodetallearticulos` (
  `IdVentaServicio` int(11) NOT NULL,
  `IdArticulo` int(11) NOT NULL,
  `Cantidad` int(11) DEFAULT NULL,
  `Costo` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ventasserviciodetallemantenimiento`
--

CREATE TABLE `ventasserviciodetallemantenimiento` (
  `IdVentaServicio` int(11) NOT NULL,
  `IdActividad` int(11) NOT NULL,
  `Costo` decimal(10,2) DEFAULT NULL,
  `CodigoEstadoEjecucion` char(1) DEFAULT NULL,
  `Observacion` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `actividadesmantenimiento`
--
ALTER TABLE `actividadesmantenimiento`
  ADD PRIMARY KEY (`IdActividad`),
  ADD UNIQUE KEY `NombreActividad` (`NombreActividad`);

--
-- Indexes for table `articulos`
--
ALTER TABLE `articulos`
  ADD PRIMARY KEY (`IdArticulo`),
  ADD KEY `IdCategoria` (`IdCategoria`);

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`IdCategoria`),
  ADD UNIQUE KEY `NombreCategoria` (`NombreCategoria`);

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`IdCliente`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ingresosarticulos`
--
ALTER TABLE `ingresosarticulos`
  ADD PRIMARY KEY (`IdIngresoArticulo`),
  ADD KEY `IdUsuario` (`IdUsuario`);

--
-- Indexes for table `ingresosarticulosdetalle`
--
ALTER TABLE `ingresosarticulosdetalle`
  ADD PRIMARY KEY (`IdIngresoArticulo`,`IdArticulo`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `tiposmantenimientos`
--
ALTER TABLE `tiposmantenimientos`
  ADD PRIMARY KEY (`IdTipoMantenimiento`);

--
-- Indexes for table `tiposmantenimientosdetalle`
--
ALTER TABLE `tiposmantenimientosdetalle`
  ADD PRIMARY KEY (`IdTipoMantenimiento`,`IdActividad`),
  ADD KEY `IdActividad` (`IdActividad`);

--
-- Indexes for table `tiposmantenimientosdetallearticulos`
--
ALTER TABLE `tiposmantenimientosdetallearticulos`
  ADD PRIMARY KEY (`IdTipoMantenimiento`,`IdActividad`,`IdArticulo`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`IdUsuario`);

--
-- Indexes for table `ventasservicio`
--
ALTER TABLE `ventasservicio`
  ADD PRIMARY KEY (`IdVentaServicio`),
  ADD KEY `IdUsuarioSecretaria` (`IdUsuarioSecretaria`),
  ADD KEY `IdCliente` (`IdCliente`);

--
-- Indexes for table `ventasserviciodetallearticulos`
--
ALTER TABLE `ventasserviciodetallearticulos`
  ADD PRIMARY KEY (`IdVentaServicio`,`IdArticulo`),
  ADD KEY `IdArticulo` (`IdArticulo`);

--
-- Indexes for table `ventasserviciodetallemantenimiento`
--
ALTER TABLE `ventasserviciodetallemantenimiento`
  ADD PRIMARY KEY (`IdVentaServicio`,`IdActividad`),
  ADD KEY `IdActividad` (`IdActividad`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `actividadesmantenimiento`
--
ALTER TABLE `actividadesmantenimiento`
  MODIFY `IdActividad` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `articulos`
--
ALTER TABLE `articulos`
  MODIFY `IdArticulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `IdCategoria` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `IdCliente` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ingresosarticulos`
--
ALTER TABLE `ingresosarticulos`
  MODIFY `IdIngresoArticulo` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `IdUsuario` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ventasservicio`
--
ALTER TABLE `ventasservicio`
  MODIFY `IdVentaServicio` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `articulos`
--
ALTER TABLE `articulos`
  ADD CONSTRAINT `articulos_ibfk_1` FOREIGN KEY (`IdCategoria`) REFERENCES `categorias` (`IdCategoria`);

--
-- Constraints for table `ingresosarticulos`
--
ALTER TABLE `ingresosarticulos`
  ADD CONSTRAINT `ingresosarticulos_ibfk_1` FOREIGN KEY (`IdUsuario`) REFERENCES `usuarios` (`IdUsuario`);

--
-- Constraints for table `ingresosarticulosdetalle`
--
ALTER TABLE `ingresosarticulosdetalle`
  ADD CONSTRAINT `ingresosarticulosdetalle_ibfk_1` FOREIGN KEY (`IdIngresoArticulo`) REFERENCES `ingresosarticulos` (`IdIngresoArticulo`),
  ADD CONSTRAINT `ingresosarticulosdetalle_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulo`);

--
-- Constraints for table `tiposmantenimientosdetalle`
--
ALTER TABLE `tiposmantenimientosdetalle`
  ADD CONSTRAINT `tiposmantenimientosdetalle_ibfk_1` FOREIGN KEY (`IdTipoMantenimiento`) REFERENCES `tiposmantenimientos` (`IdTipoMantenimiento`),
  ADD CONSTRAINT `tiposmantenimientosdetalle_ibfk_2` FOREIGN KEY (`IdActividad`) REFERENCES `actividadesmantenimiento` (`IdActividad`);

--
-- Constraints for table `tiposmantenimientosdetallearticulos`
--
ALTER TABLE `tiposmantenimientosdetallearticulos`
  ADD CONSTRAINT `tiposmantenimientosdetallearticulos_ibfk_1` FOREIGN KEY (`IdTipoMantenimiento`,`IdActividad`) REFERENCES `tiposmantenimientosdetalle` (`IdTipoMantenimiento`, `IdActividad`),
  ADD CONSTRAINT `tiposmantenimientosdetallearticulos_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulo`);

--
-- Constraints for table `ventasservicio`
--
ALTER TABLE `ventasservicio`
  ADD CONSTRAINT `ventasservicio_ibfk_1` FOREIGN KEY (`IdUsuarioSecretaria`) REFERENCES `usuarios` (`IdUsuario`),
  ADD CONSTRAINT `ventasservicio_ibfk_2` FOREIGN KEY (`IdCliente`) REFERENCES `clientes` (`IdCliente`);

--
-- Constraints for table `ventasserviciodetallearticulos`
--
ALTER TABLE `ventasserviciodetallearticulos`
  ADD CONSTRAINT `ventasserviciodetallearticulos_ibfk_1` FOREIGN KEY (`IdVentaServicio`) REFERENCES `ventasservicio` (`IdVentaServicio`),
  ADD CONSTRAINT `ventasserviciodetallearticulos_ibfk_2` FOREIGN KEY (`IdArticulo`) REFERENCES `articulos` (`IdArticulo`);

--
-- Constraints for table `ventasserviciodetallemantenimiento`
--
ALTER TABLE `ventasserviciodetallemantenimiento`
  ADD CONSTRAINT `ventasserviciodetallemantenimiento_ibfk_1` FOREIGN KEY (`IdVentaServicio`) REFERENCES `ventasservicio` (`IdVentaServicio`),
  ADD CONSTRAINT `ventasserviciodetallemantenimiento_ibfk_2` FOREIGN KEY (`IdActividad`) REFERENCES `actividadesmantenimiento` (`IdActividad`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
