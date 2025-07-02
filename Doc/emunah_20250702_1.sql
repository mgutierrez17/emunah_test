-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 02-07-2025 a las 11:50:54
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `emunah_test`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_almacen` varchar(50) NOT NULL,
  `direccion_almacen` varchar(200) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `nom_almacen`, `direccion_almacen`, `created_at`, `updated_at`) VALUES
(1, 'La Paz', 'Avenida La bandera nro 123', NULL, '2025-06-27 06:48:28'),
(7, 'El alto', 'Av. Panamericana s/n Zona Rosas Pampa', '2025-07-01 21:51:36', '2025-07-01 21:51:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacen_productos`
--

CREATE TABLE `almacen_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `almacen_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `stock` int(11) NOT NULL,
  `cantidad_optima` int(11) NOT NULL,
  `cantidad_minima` int(11) NOT NULL,
  `ubicacion` varchar(50) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacen_productos`
--

INSERT INTO `almacen_productos` (`id`, `almacen_id`, `producto_id`, `stock`, `cantidad_optima`, `cantidad_minima`, `ubicacion`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(47, 1, 13, 300, 100, 50, 'e-02', 1, NULL, '2025-07-01 06:34:53', '2025-07-02 07:39:42'),
(49, 1, 14, 150, 200, 0, 'e-03', 1, NULL, '2025-07-01 06:35:31', '2025-07-02 07:46:44'),
(51, 1, 15, 600, 500, 0, 'e-04', 1, NULL, '2025-07-01 06:35:46', '2025-07-02 07:39:42'),
(53, 1, 16, 80, 100, 10, 'a-1', 1, 1, '2025-07-01 06:36:00', '2025-07-02 07:46:44'),
(55, 1, 17, 120, 100, 50, '-', 1, NULL, '2025-07-01 06:36:11', '2025-07-02 07:46:44'),
(57, 1, 18, 320, 100, 20, '-', 1, NULL, '2025-07-01 06:36:28', '2025-07-02 07:39:42'),
(59, 1, 19, 40, 120, 24, '-', 1, NULL, '2025-07-01 06:36:43', '2025-07-02 07:46:44'),
(61, 1, 20, 500, 100, 50, '-', 1, NULL, '2025-07-01 06:36:58', '2025-07-02 07:39:42'),
(63, 1, 21, 300, 0, 0, '-', 1, NULL, '2025-07-01 06:37:25', '2025-07-02 07:39:42'),
(65, 1, 22, 150, 0, 0, '-', 1, NULL, '2025-07-01 06:37:39', '2025-07-02 07:46:44'),
(67, 1, 23, 300, 0, 0, '-', 1, NULL, '2025-07-01 06:37:53', '2025-07-02 07:46:44'),
(69, 1, 24, 250, 0, 0, '-', 1, NULL, '2025-07-01 06:38:07', '2025-07-02 07:46:44'),
(71, 1, 25, 50, 0, 0, '-', 1, NULL, '2025-07-01 06:38:23', '2025-07-02 07:46:44'),
(73, 1, 26, 0, 0, 0, '-', 1, NULL, '2025-07-01 06:38:39', '2025-07-01 06:38:39'),
(75, 1, 27, -80, 0, 0, '-', 1, NULL, '2025-07-01 06:39:02', '2025-07-01 06:39:02'),
(77, 1, 28, 350, 0, 0, '-', 1, NULL, '2025-07-01 06:39:15', '2025-07-02 07:39:42'),
(79, 1, 29, 0, 0, 0, '-', 1, NULL, '2025-07-01 06:39:29', '2025-07-01 06:39:29'),
(81, 1, 30, 420, 0, 0, '-', 1, NULL, '2025-07-01 06:39:41', '2025-07-02 07:39:42'),
(83, 1, 31, 440, 0, 0, '-', 1, NULL, '2025-07-01 06:39:54', '2025-07-02 07:39:42'),
(85, 1, 32, -100, 0, 0, '-', 1, NULL, '2025-07-01 06:40:07', '2025-07-01 06:40:07'),
(87, 7, 13, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(88, 7, 14, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(89, 7, 15, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(90, 7, 16, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(91, 7, 17, 500, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-02 07:30:22'),
(92, 7, 18, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(93, 7, 19, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(94, 7, 20, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:36', '2025-07-01 21:51:36'),
(95, 7, 21, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-01 21:51:37'),
(96, 7, 22, 1500, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:23'),
(97, 7, 23, 150, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:23'),
(98, 7, 24, 100, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:23'),
(99, 7, 25, 100, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:22'),
(100, 7, 26, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-01 21:51:37'),
(101, 7, 27, 300, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:23'),
(102, 7, 28, 100, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:24'),
(103, 7, 29, 50, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:24'),
(104, 7, 30, 0, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-01 21:51:37'),
(105, 7, 31, 2300, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:24'),
(106, 7, 32, 1300, 0, 0, '-', 1, NULL, '2025-07-01 21:51:37', '2025-07-02 07:30:24'),
(109, 1, 34, 0, 0, 0, '-', 1, NULL, '2025-07-02 08:01:09', '2025-07-02 08:01:09'),
(110, 7, 34, 0, 0, 0, '-', 1, NULL, '2025-07-02 08:01:09', '2025-07-02 08:01:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `areas`
--

CREATE TABLE `areas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `areas`
--

INSERT INTO `areas` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'administracion', NULL, NULL),
(2, 'ventas', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_categoria` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`id`, `nom_categoria`, `created_at`, `updated_at`) VALUES
(1, 'Desinfectantes', '2025-06-26 02:07:51', NULL),
(2, 'Detergentes', '2025-06-26 02:07:51', NULL),
(3, 'Papel Higiénico', '2025-06-26 02:07:51', NULL),
(5, 'Ambientadores', '2025-06-26 02:07:51', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `razon_social` varchar(255) NOT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `saldo_pedido` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_entregas` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_deuda` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `nombre`, `razon_social`, `nit`, `direccion`, `telefono`, `correo`, `saldo_pedido`, `saldo_entregas`, `saldo_deuda`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'José Luis Mamani', 'Mamani Servicios Generales', '56321401', 'Av. Naciones Unidas #123, El Alto', '71543210', 'jmamani@gmail.com', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 06:58:47', '2025-07-01 06:58:47'),
(6, 'EcoHogar Bolivia', 'EcoHogar Productos de Limpieza SRL', '1032100011', 'Calle 10, Obrajes, La Paz', '22200112', 'ventas@ecohogar.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:02:18', '2025-07-01 07:02:18'),
(7, 'Limpiezas Integrales SRL', 'Limpiezas Integrales SRL', '106789321', 'Calle Illampu #67, Centro, La Paz', '22098765', 'info@limpiezasintegrales.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:03:29', '2025-07-01 07:03:29'),
(8, 'Higiene Total Soluciones Integrales', 'Higiene Total SRL', '109876543', 'Calle Aspiazu #1231, La Paz', '22456789', 'higienetotal@gmail.com', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:04:18', '2025-07-01 07:04:18'),
(9, 'LimpiaMax Bolivia', 'LimpiaMax SRL', '105432109', 'Av. Buenos Aires #21, La Paz', '22345678', 'limpiezamax@gmail.com', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:05:13', '2025-07-01 07:05:13'),
(10, 'CleanPro Bolivia', 'CleanPro Soluciones de Limpieza SRL', '104567893', 'Calle 21, Calacoto, La Paz', '22987654', 'contacto@cleanpro.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:05:50', '2025-07-01 07:05:50'),
(11, 'Victor Callisaya', 'Callisaya Higiene Profesional', '78932100', 'Av. La Ceja, El Alto', '77654321', 'vcallisaya@gmail.com', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:06:24', '2025-07-01 07:06:24'),
(12, 'Brillo Hogar Distribuciones', 'Brillo Hogar S.R.L.', '109876001', 'Av. Tejada Sorzano #82, La Paz', '22678900', 'ventas@brillohogar.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:07:01', '2025-07-01 07:07:01'),
(13, 'Roxana Limachi', 'De Roxana Limachi', '65478910', 'Zona Santiago II, El Alto', '76890123', 'rlimachi@gmail.com', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:07:38', '2025-07-01 07:07:38'),
(14, 'Mega Limpieza SRL', 'Mega Limpieza y Servicios SRL', '109001237', 'Calle Comercio #58, Centro, La Paz', '22881234', 'contacto@megalimpieza.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:08:53', '2025-07-01 07:08:53'),
(15, 'Soluciones Higiénicas', 'Soluciones Higiénicas del Sur SRL', '110023457', 'Calle 30, Achumani, La Paz', '22994567', 'ventas@shigienicas.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:09:29', '2025-07-01 07:09:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contactos_proveedores`
--

CREATE TABLE `contactos_proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proveedor_id` bigint(20) UNSIGNED NOT NULL,
  `nombre_contacto` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `notas` text DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleados`
--

CREATE TABLE `empleados` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `correo` varchar(255) NOT NULL,
  `nro_carnet` varchar(255) NOT NULL,
  `fecha_nacimiento` date NOT NULL,
  `fecha_contratacion` date NOT NULL,
  `almacen_id` bigint(20) UNSIGNED NOT NULL,
  `area_id` bigint(20) UNSIGNED NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `empleados`
--

INSERT INTO `empleados` (`id`, `user_id`, `nombre`, `apellido`, `telefono`, `direccion`, `correo`, `nro_carnet`, `fecha_nacimiento`, `fecha_contratacion`, `almacen_id`, `area_id`, `foto`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(10, 2, 'Mauricio', 'Maldonado', NULL, NULL, 'mmaldonado@gmail.com', '12345678', '1985-07-15', '2015-08-20', 1, 1, NULL, NULL, NULL, '2025-07-02 04:41:37', '2025-07-02 04:41:37'),
(11, 3, 'Javier', 'Mancilla', NULL, NULL, 'jmancilla@gmail.com', '4869563', '1980-06-14', '2018-09-20', 1, 1, NULL, NULL, NULL, '2025-07-02 04:43:34', '2025-07-02 04:43:34'),
(12, 4, 'Ariel', 'Campero', NULL, NULL, 'acampero@gmail.com', '4857962', '1992-02-29', '2020-03-08', 1, 1, NULL, NULL, NULL, '2025-07-02 04:47:43', '2025-07-02 04:47:43');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_ingresos`
--

CREATE TABLE `guia_ingresos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proveedor_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_compra` date NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `estado_ingreso` enum('pedido','entrada_mercaderia','facturado','devolucion','cancelado','pagado','anulado') DEFAULT 'pedido',
  `total_pedido` decimal(10,2) NOT NULL DEFAULT 0.00,
  `comentarios` text DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `comprobante_pago` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `almacen_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guia_ingresos`
--

INSERT INTO `guia_ingresos` (`id`, `proveedor_id`, `descripcion`, `fecha_compra`, `fecha_ingreso`, `estado_ingreso`, `total_pedido`, `comentarios`, `fecha_pago`, `comprobante_pago`, `created_by`, `updated_by`, `almacen_id`, `created_at`, `updated_at`) VALUES
(4, 12, 'Pedido de papel', '2025-05-20', '2025-05-23', 'entrada_mercaderia', 15000.00, NULL, NULL, NULL, 1, 1, 7, '2025-07-02 07:26:50', '2025-07-02 07:30:24'),
(5, 5, 'Detergentes para hospitales', '2025-05-30', '2025-05-31', 'entrada_mercaderia', 20450.00, NULL, NULL, NULL, 1, 1, 7, '2025-07-02 07:28:19', '2025-07-02 07:30:23'),
(6, 6, 'Pedido de stock ', '2025-06-02', '2025-06-04', 'entrada_mercaderia', 57500.00, NULL, NULL, NULL, 1, 1, 7, '2025-07-02 07:30:10', '2025-07-02 07:30:22'),
(7, 13, 'Stock La Paz', '2025-05-21', '2025-05-04', 'entrada_mercaderia', 29490.00, NULL, NULL, NULL, 1, 1, 1, '2025-07-02 07:39:26', '2025-07-02 07:39:42'),
(8, 8, 'Pedido para cubrir demanda', '2025-05-15', '2025-05-17', 'entrada_mercaderia', 11845.00, NULL, NULL, NULL, 1, 1, 1, '2025-07-02 07:46:36', '2025-07-02 07:46:44'),
(9, 5, 'prueba compra', '2025-07-02', '2025-07-02', 'pedido', 200.00, NULL, NULL, NULL, 1, 1, 7, '2025-07-02 07:50:27', '2025-07-02 07:53:46'),
(10, 10, 'prueba compra', '2025-07-02', '2025-07-02', 'pedido', 100.00, NULL, NULL, NULL, 1, NULL, 7, '2025-07-02 08:01:37', '2025-07-02 08:01:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `guia_ingreso_detalles`
--

CREATE TABLE `guia_ingreso_detalles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guia_ingreso_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `guia_ingreso_detalles`
--

INSERT INTO `guia_ingreso_detalles` (`id`, `guia_ingreso_id`, `producto_id`, `precio_unitario`, `cantidad`, `precio_total`, `created_at`, `updated_at`) VALUES
(7, 4, 32, 20.00, 100, 2000.00, '2025-07-02 07:26:50', '2025-07-02 07:26:50'),
(8, 4, 31, 15.00, 50, 750.00, '2025-07-02 07:26:50', '2025-07-02 07:26:50'),
(9, 4, 32, 30.00, 200, 6000.00, '2025-07-02 07:26:50', '2025-07-02 07:26:50'),
(10, 4, 28, 50.00, 100, 5000.00, '2025-07-02 07:26:50', '2025-07-02 07:26:50'),
(11, 4, 29, 25.00, 50, 1250.00, '2025-07-02 07:26:50', '2025-07-02 07:26:50'),
(12, 5, 24, 12.00, 100, 1200.00, '2025-07-02 07:28:19', '2025-07-02 07:28:19'),
(13, 5, 23, 15.00, 150, 2250.00, '2025-07-02 07:28:19', '2025-07-02 07:28:19'),
(14, 5, 27, 15.00, 300, 4500.00, '2025-07-02 07:28:19', '2025-07-02 07:28:19'),
(15, 5, 22, 25.00, 500, 12500.00, '2025-07-02 07:28:19', '2025-07-02 07:28:19'),
(16, 6, 32, 10.00, 1000, 10000.00, '2025-07-02 07:30:10', '2025-07-02 07:30:10'),
(17, 6, 31, 15.00, 2000, 30000.00, '2025-07-02 07:30:10', '2025-07-02 07:30:10'),
(18, 6, 25, 20.00, 100, 2000.00, '2025-07-02 07:30:10', '2025-07-02 07:30:10'),
(19, 6, 31, 12.00, 250, 3000.00, '2025-07-02 07:30:10', '2025-07-02 07:30:10'),
(20, 6, 22, 5.00, 1000, 5000.00, '2025-07-02 07:30:10', '2025-07-02 07:30:10'),
(21, 6, 17, 15.00, 500, 7500.00, '2025-07-02 07:30:10', '2025-07-02 07:30:10'),
(22, 7, 21, 10.00, 100, 1000.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(23, 7, 21, 15.00, 200, 3000.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(24, 7, 15, 7.50, 250, 1875.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(25, 7, 20, 12.50, 500, 6250.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(26, 7, 13, 10.00, 300, 3000.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(27, 7, 31, 10.00, 500, 5000.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(28, 7, 28, 7.50, 350, 2625.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(29, 7, 30, 8.00, 420, 3360.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(30, 7, 15, 6.00, 350, 2100.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(31, 7, 18, 4.00, 320, 1280.00, '2025-07-02 07:39:26', '2025-07-02 07:39:26'),
(32, 8, 14, 8.00, 150, 1200.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(33, 8, 16, 9.50, 80, 760.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(34, 8, 17, 12.00, 120, 1440.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(35, 8, 19, 9.50, 60, 570.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(36, 8, 22, 6.50, 150, 975.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(37, 8, 23, 8.50, 300, 2550.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(38, 8, 24, 7.00, 250, 1750.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(39, 8, 25, 52.00, 50, 2600.00, '2025-07-02 07:46:36', '2025-07-02 07:46:36'),
(41, 9, 31, 20.00, 10, 200.00, '2025-07-02 07:53:46', '2025-07-02 07:53:46'),
(42, 10, 34, 10.00, 10, 100.00, '2025-07-02 08:01:37', '2025-07-02 08:01:37');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `kardex`
--

CREATE TABLE `kardex` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guia_ingreso_id` bigint(20) UNSIGNED DEFAULT NULL,
  `pedido_id` bigint(20) UNSIGNED DEFAULT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `almacen_id` bigint(20) UNSIGNED NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `fecha_entrada` date NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `kardex`
--

INSERT INTO `kardex` (`id`, `guia_ingreso_id`, `pedido_id`, `producto_id`, `almacen_id`, `cantidad`, `precio_unitario`, `fecha_entrada`, `user_id`, `created_at`, `updated_at`) VALUES
(34, 6, NULL, 32, 7, 1000, 10.00, '2025-07-02', 1, '2025-07-02 07:30:22', '2025-07-02 07:30:22'),
(35, 6, NULL, 31, 7, 2000, 15.00, '2025-07-02', 1, '2025-07-02 07:30:22', '2025-07-02 07:30:22'),
(36, 6, NULL, 25, 7, 100, 20.00, '2025-07-02', 1, '2025-07-02 07:30:22', '2025-07-02 07:30:22'),
(37, 6, NULL, 31, 7, 250, 12.00, '2025-07-02', 1, '2025-07-02 07:30:22', '2025-07-02 07:30:22'),
(38, 6, NULL, 22, 7, 1000, 5.00, '2025-07-02', 1, '2025-07-02 07:30:22', '2025-07-02 07:30:22'),
(39, 6, NULL, 17, 7, 500, 15.00, '2025-07-02', 1, '2025-07-02 07:30:22', '2025-07-02 07:30:22'),
(40, 5, NULL, 24, 7, 100, 12.00, '2025-07-02', 1, '2025-07-02 07:30:23', '2025-07-02 07:30:23'),
(41, 5, NULL, 23, 7, 150, 15.00, '2025-07-02', 1, '2025-07-02 07:30:23', '2025-07-02 07:30:23'),
(42, 5, NULL, 27, 7, 300, 15.00, '2025-07-02', 1, '2025-07-02 07:30:23', '2025-07-02 07:30:23'),
(43, 5, NULL, 22, 7, 500, 25.00, '2025-07-02', 1, '2025-07-02 07:30:23', '2025-07-02 07:30:23'),
(44, 4, NULL, 32, 7, 100, 20.00, '2025-07-02', 1, '2025-07-02 07:30:24', '2025-07-02 07:30:24'),
(45, 4, NULL, 31, 7, 50, 15.00, '2025-07-02', 1, '2025-07-02 07:30:24', '2025-07-02 07:30:24'),
(46, 4, NULL, 32, 7, 200, 30.00, '2025-07-02', 1, '2025-07-02 07:30:24', '2025-07-02 07:30:24'),
(47, 4, NULL, 28, 7, 100, 50.00, '2025-07-02', 1, '2025-07-02 07:30:24', '2025-07-02 07:30:24'),
(48, 4, NULL, 29, 7, 50, 25.00, '2025-07-02', 1, '2025-07-02 07:30:24', '2025-07-02 07:30:24'),
(49, 7, NULL, 21, 1, 100, 10.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(50, 7, NULL, 21, 1, 200, 15.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(51, 7, NULL, 15, 1, 250, 7.50, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(52, 7, NULL, 20, 1, 500, 12.50, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(53, 7, NULL, 13, 1, 300, 10.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(54, 7, NULL, 31, 1, 500, 10.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(55, 7, NULL, 28, 1, 350, 7.50, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(56, 7, NULL, 30, 1, 420, 8.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(57, 7, NULL, 15, 1, 350, 6.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(58, 7, NULL, 18, 1, 320, 4.00, '2025-07-02', 1, '2025-07-02 07:39:42', '2025-07-02 07:39:42'),
(59, 8, NULL, 14, 1, 150, 8.00, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(60, 8, NULL, 16, 1, 80, 9.50, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(61, 8, NULL, 17, 1, 120, 12.00, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(62, 8, NULL, 19, 1, 60, 9.50, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(63, 8, NULL, 22, 1, 150, 6.50, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(64, 8, NULL, 23, 1, 300, 8.50, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(65, 8, NULL, 24, 1, 250, 7.00, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(66, 8, NULL, 25, 1, 50, 52.00, '2025-07-02', 1, '2025-07-02 07:46:44', '2025-07-02 07:46:44'),
(67, NULL, 7, 31, 7, -50, 12.00, '2025-07-02', 1, '2025-07-02 08:27:26', '2025-07-02 08:27:26'),
(68, NULL, 7, 32, 7, -100, 25.00, '2025-07-02', 1, '2025-07-02 08:27:26', '2025-07-02 08:27:26'),
(69, NULL, 7, 28, 7, -80, 16.00, '2025-07-02', 1, '2025-07-02 08:27:26', '2025-07-02 08:27:26'),
(70, NULL, 7, 30, 7, -15, 15.00, '2025-07-02', 1, '2025-07-02 08:27:26', '2025-07-02 08:27:26'),
(71, NULL, 7, 17, 7, -20, 16.00, '2025-07-02', 1, '2025-07-02 08:27:26', '2025-07-02 08:27:26'),
(72, NULL, 7, 31, 7, 50, 12.00, '2025-07-02', 1, '2025-07-02 08:28:09', '2025-07-02 08:28:09'),
(73, NULL, 7, 32, 7, 100, 25.00, '2025-07-02', 1, '2025-07-02 08:28:09', '2025-07-02 08:28:09'),
(74, NULL, 7, 28, 7, 80, 16.00, '2025-07-02', 1, '2025-07-02 08:28:09', '2025-07-02 08:28:09'),
(75, NULL, 7, 30, 7, 15, 15.00, '2025-07-02', 1, '2025-07-02 08:28:09', '2025-07-02 08:28:09'),
(76, NULL, 7, 17, 7, 20, 16.00, '2025-07-02', 1, '2025-07-02 08:28:09', '2025-07-02 08:28:09'),
(77, NULL, 6, 32, 1, -100, 25.00, '2025-07-02', 1, '2025-07-02 08:54:46', '2025-07-02 08:54:46'),
(78, NULL, 6, 31, 1, -50, 12.00, '2025-07-02', 1, '2025-07-02 08:54:47', '2025-07-02 08:54:47'),
(79, NULL, 6, 27, 1, -80, 33.00, '2025-07-02', 1, '2025-07-02 08:54:47', '2025-07-02 08:54:47'),
(80, NULL, 9, 31, 1, -10, 12.00, '2025-07-02', 1, '2025-07-02 08:57:11', '2025-07-02 08:57:11'),
(81, NULL, 9, 19, 1, -20, 8.00, '2025-07-02', 1, '2025-07-02 08:57:11', '2025-07-02 08:57:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precios`
--

CREATE TABLE `lista_precios` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nom_lista` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `fecha_inicio` date NOT NULL,
  `fecha_final` date NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_precios`
--

INSERT INTO `lista_precios` (`id`, `nom_lista`, `estado`, `fecha_inicio`, `fecha_final`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(8, '2025', 1, '2025-01-01', '2025-12-31', 1, NULL, '2025-07-01 06:55:11', '2025-07-01 06:55:11');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_precios_productos`
--

CREATE TABLE `lista_precios_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `lista_precio_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lista_precios_productos`
--

INSERT INTO `lista_precios_productos` (`id`, `lista_precio_id`, `producto_id`, `precio`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(28, 8, 13, 15.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:05:56'),
(29, 8, 14, 10.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:12:36'),
(30, 8, 15, 10.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:12:41'),
(31, 8, 16, 15.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:12:48'),
(32, 8, 17, 16.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:12:54'),
(33, 8, 18, 15.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:13:00'),
(34, 8, 19, 8.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:13:06'),
(35, 8, 20, 25.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:13:14'),
(36, 8, 21, 12.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:13:30'),
(37, 8, 22, 15.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:12:29'),
(38, 8, 23, 25.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:07:14'),
(39, 8, 24, 70.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:06:09'),
(40, 8, 25, 150.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:06:19'),
(41, 8, 26, 15.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:06:26'),
(42, 8, 27, 33.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:06:37'),
(43, 8, 28, 16.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:06:48'),
(44, 8, 29, 25.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:06:54'),
(45, 8, 30, 15.00, 1, 1, '2025-07-01 06:55:11', '2025-07-02 04:55:01'),
(46, 8, 31, 12.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:07:05'),
(47, 8, 32, 25.00, 1, 1, '2025-07-01 06:55:11', '2025-07-01 08:13:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2025_06_23_201650_add_two_factor_columns_to_users_table', 1),
(5, '2025_06_23_201731_create_personal_access_tokens_table', 1),
(6, '2025_06_23_202154_create_permission_tables', 2),
(7, '2025_06_24_014658_create_areas_table', 3),
(8, '2025_06_24_014706_create_almacenes_table', 3),
(9, '2025_06_24_014712_create_categorias_table', 3),
(10, '2025_06_24_014717_create_productos_table', 3),
(11, '2025_06_24_014722_create_almacen_productos_table', 3),
(12, '2025_06_24_014728_create_empleados_table', 3),
(13, '2025_06_24_142921_create_clientes_table', 4),
(14, '2025_06_24_142927_create_contactos_clientes_table', 4),
(18, '2025_06_24_151553_create_lista_precios_table', 5),
(19, '2025_06_24_151600_create_lista_precios_productos_table', 5),
(20, '2025_06_29_041426_create_clientes_table', 6),
(21, '2025_06_24_142933_create_proveedores_table', 7),
(22, '2025_06_24_142939_create_contactos_proveedores_table', 8),
(27, '2025_06_29_225738_create_guia_ingresos_table', 9),
(28, '2025_06_29_225739_create_guia_ingreso_detalles_table', 10),
(29, '2025_06_29_225740_create_pagos_compras_table', 11),
(30, '2025_06_30_010048_create_kardex_table', 12),
(31, '2025_06_30_132701_update_estado_ingreso_enum_in_guia_ingresos_table', 13),
(32, '2025_07_01_005121_create_pedidos_table', 14),
(33, '2025_07_01_005318_create_pedido_productos_table', 15),
(34, '2025_07_01_022229_add_pedido_id_to_kardex_table', 16),
(35, '2025_07_01_104527_create_paginas_table', 17),
(36, '2025_07_01_104754_create_pagina_role_table', 18);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_permissions`
--

CREATE TABLE `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `model_has_roles`
--

CREATE TABLE `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 1),
(1, 'App\\Models\\User', 3),
(2, 'App\\Models\\User', 2),
(2, 'App\\Models\\User', 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginas`
--

CREATE TABLE `paginas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `icono` varchar(255) DEFAULT NULL,
  `ruta` varchar(255) NOT NULL,
  `estado` tinyint(1) NOT NULL DEFAULT 1,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `paginas`
--

INSERT INTO `paginas` (`id`, `nombre`, `icono`, `ruta`, `estado`, `created_at`, `updated_at`) VALUES
(1, 'Empleados', 'users', '/empleados', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(2, 'Almacenes', 'warehouse', '/almacenes', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(3, 'Categorías', 'tags', '/categorias', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(4, 'Lista de Precios', 'list', '/lista-precios', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(6, 'Clientes', 'user', '/clientes', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(7, 'Productos', 'box', '/productos', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(8, 'Ventas', 'shopping-cart', '/ventas', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(9, 'Proveedores', 'truck', '/proveedores', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(10, 'Compras', 'shopping-bag', '/compras', 1, '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(11, 'Usuarios', 'user-shield', '/usuarios', 1, '2025-07-01 20:05:53', '2025-07-01 20:05:53'),
(12, 'Reportes', NULL, '/reportes', 1, '2025-07-02 06:02:06', '2025-07-02 06:02:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagina_role`
--

CREATE TABLE `pagina_role` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pagina_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pagina_role`
--

INSERT INTO `pagina_role` (`id`, `pagina_id`, `role_id`) VALUES
(1, 1, 1),
(2, 2, 1),
(3, 3, 1),
(4, 4, 1),
(6, 6, 1),
(7, 7, 1),
(8, 8, 1),
(9, 9, 1),
(10, 10, 1),
(11, 2, 4),
(12, 3, 4),
(13, 4, 4),
(15, 6, 2),
(16, 7, 2),
(17, 8, 2),
(18, 2, 2),
(19, 3, 2),
(20, 4, 2),
(22, 9, 3),
(23, 10, 3),
(24, 2, 3),
(25, 3, 3),
(26, 4, 3),
(28, 11, 1),
(29, 12, 1),
(30, 12, 2),
(31, 12, 3),
(32, 12, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pagos_compras`
--

CREATE TABLE `pagos_compras` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `guia_ingreso_id` bigint(20) UNSIGNED NOT NULL,
  `fecha_pago` date NOT NULL,
  `nro_comprobante` varchar(255) NOT NULL,
  `banco` varchar(255) NOT NULL,
  `monto_pagado` decimal(10,2) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `cliente_id` bigint(20) UNSIGNED NOT NULL,
  `almacen_id` bigint(20) UNSIGNED NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha_pedido` date NOT NULL,
  `fecha_entrega` date NOT NULL,
  `estado_pedido` enum('pedido','entrega','facturado','devolucion','cancelado','pagado','anulado') NOT NULL DEFAULT 'pedido',
  `total_pedido` decimal(10,2) NOT NULL,
  `comentarios` text DEFAULT NULL,
  `fecha_pago` date DEFAULT NULL,
  `comprobante_pago` varchar(255) DEFAULT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`id`, `cliente_id`, `almacen_id`, `descripcion`, `fecha_pedido`, `fecha_entrega`, `estado_pedido`, `total_pedido`, `comentarios`, `fecha_pago`, `comprobante_pago`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 10, 1, 'Papel higienico', '2025-05-10', '0008-05-12', 'pedido', 10330.00, 'Entregar por la mañana', NULL, NULL, 1, 1, '2025-07-01 07:21:32', '2025-07-01 08:21:33'),
(6, 12, 1, 'Productos Varios', '2025-07-02', '2025-07-02', 'entrega', 5740.00, NULL, NULL, NULL, 1, 1, '2025-07-02 04:53:02', '2025-07-02 08:54:47'),
(7, 11, 7, 'Compra de stock para tienda', '2025-06-02', '2025-06-05', 'devolucion', 4925.00, NULL, NULL, NULL, 1, 1, '2025-07-02 04:55:28', '2025-07-02 08:28:09'),
(9, 8, 1, 'Pedido de insumos de limpieza', '2025-06-16', '2025-06-19', 'facturado', 280.00, NULL, NULL, NULL, 1, 1, '2025-07-02 08:56:54', '2025-07-02 08:57:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido_productos`
--

CREATE TABLE `pedido_productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `pedido_id` bigint(20) UNSIGNED NOT NULL,
  `producto_id` bigint(20) UNSIGNED NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_total` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pedido_productos`
--

INSERT INTO `pedido_productos` (`id`, `pedido_id`, `producto_id`, `precio_unitario`, `cantidad`, `precio_total`, `created_at`, `updated_at`) VALUES
(14, 5, 14, 500.00, 20, 10000.00, '2025-07-01 08:19:21', '2025-07-01 08:19:21'),
(15, 5, 13, 15.00, 14, 210.00, '2025-07-01 08:19:21', '2025-07-01 08:19:21'),
(16, 5, 31, 12.00, 10, 120.00, '2025-07-01 08:19:21', '2025-07-01 08:19:21'),
(17, 6, 32, 25.00, 100, 2500.00, '2025-07-02 04:53:02', '2025-07-02 04:53:02'),
(18, 6, 31, 12.00, 50, 600.00, '2025-07-02 04:53:02', '2025-07-02 04:53:02'),
(19, 6, 27, 33.00, 80, 2640.00, '2025-07-02 04:53:02', '2025-07-02 04:53:02'),
(24, 7, 31, 12.00, 50, 600.00, '2025-07-02 07:35:58', '2025-07-02 07:35:58'),
(25, 7, 32, 25.00, 100, 2500.00, '2025-07-02 07:35:58', '2025-07-02 07:35:58'),
(26, 7, 28, 16.00, 80, 1280.00, '2025-07-02 07:35:58', '2025-07-02 07:35:58'),
(27, 7, 30, 15.00, 15, 225.00, '2025-07-02 07:35:58', '2025-07-02 07:35:58'),
(28, 7, 17, 16.00, 20, 320.00, '2025-07-02 07:35:58', '2025-07-02 07:35:58'),
(30, 9, 31, 12.00, 10, 120.00, '2025-07-02 08:56:54', '2025-07-02 08:56:54'),
(31, 9, 19, 8.00, 20, 160.00, '2025-07-02 08:56:54', '2025-07-02 08:56:54');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `categoria_id` bigint(20) UNSIGNED NOT NULL,
  `nom_producto` varchar(200) NOT NULL,
  `codigo_venta` varchar(50) NOT NULL,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`id`, `categoria_id`, `nom_producto`, `codigo_venta`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(13, 5, 'Ambientador Glade Aerosol Lavanda', 'AMB-GLD-LAV300', 1, NULL, '2025-07-01 06:34:53', '2025-07-01 06:34:53'),
(14, 5, 'Ambientador Binner Manzana 360 ml', 'AMB-BIN-MNZ360', 1, NULL, '2025-07-01 06:35:31', '2025-07-01 06:35:31'),
(15, 5, 'Ambientador Poett Floral 360 ml', 'AMB-POT-FLR360', 1, NULL, '2025-07-01 06:35:46', '2025-07-01 06:35:46'),
(16, 5, 'Ambientador Automático Air Wick Vainilla', 'AMB-ARW-VAN-AUTO', 1, NULL, '2025-07-01 06:36:00', '2025-07-01 06:36:00'),
(17, 5, 'Ambientador Spray Fabuloso Tropical', 'AMB-FAB-TRP300', 1, NULL, '2025-07-01 06:36:11', '2025-07-01 06:36:11'),
(18, 1, 'Desinfectante Líquido Binner 1L', 'DES-BIN-1000', 1, NULL, '2025-07-01 06:36:28', '2025-07-01 06:36:28'),
(19, 1, 'Lavandina Cloralex Tradicional 1L', 'DES-CLR-TRA1000', 1, NULL, '2025-07-01 06:36:43', '2025-07-01 06:36:43'),
(20, 1, 'Limpiador Desinfectante Poett Limón', 'DES-POT-LIM900', 1, NULL, '2025-07-01 06:36:58', '2025-07-01 06:36:58'),
(21, 1, 'Desinfectante Lysoform Spray', 'DES-LYS-SPR400', 1, NULL, '2025-07-01 06:37:25', '2025-07-01 06:37:25'),
(22, 1, 'Desinfectante Ayudín con cloro', 'DES-AYU-CL1000', 1, NULL, '2025-07-01 06:37:39', '2025-07-01 06:37:39'),
(23, 2, 'Detergente OMO Matic 1kg', 'DET-OMO-MAT1000', 1, NULL, '2025-07-01 06:37:53', '2025-07-01 06:37:53'),
(24, 2, 'Detergente Bolívar Floral 1kg', 'DET-BOL-FLR1000', 1, NULL, '2025-07-01 06:38:07', '2025-07-01 06:38:07'),
(25, 2, 'Detergente Líquido Ariel 3.8L', 'DET-ARI-LIQ3800', 1, NULL, '2025-07-01 06:38:23', '2025-07-01 06:38:23'),
(26, 2, 'Jabón Bolívar en Pan 400g', 'DET-BOL-JBP400', 1, NULL, '2025-07-01 06:38:39', '2025-07-01 06:38:39'),
(27, 2, 'Detergente Patito Multiacción 900g', 'DET-PAT-MUL900', 1, NULL, '2025-07-01 06:39:02', '2025-07-01 06:39:02'),
(28, 3, 'Papel Higiénico Scott Doble Hoja 4u', 'PHG-SCT-DH004', 1, NULL, '2025-07-01 06:39:15', '2025-07-01 06:39:15'),
(29, 3, 'Papel Higiénico Elite Jumbo 300m', 'PHG-ELT-JMB300', 1, NULL, '2025-07-01 06:39:29', '2025-07-01 06:39:29'),
(30, 3, 'Papel Higiénico Familia Hoja Simple', 'PHG-FAM-HS012', 1, NULL, '2025-07-01 06:39:41', '2025-07-01 06:39:41'),
(31, 3, 'Papel Higiénico Rosal Plus 6u', 'PHG-RSL-PLS006', 1, NULL, '2025-07-01 06:39:54', '2025-07-01 06:39:54'),
(32, 3, 'Papel Higiénico Confort 12u', 'PHG-CFT-DH012', 1, NULL, '2025-07-01 06:40:07', '2025-07-01 06:40:07'),
(34, 1, 'Prueba', 'prueba', 1, NULL, '2025-07-02 08:01:09', '2025-07-02 08:01:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proveedores`
--

CREATE TABLE `proveedores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `razon_social` varchar(255) DEFAULT NULL,
  `nit` varchar(255) DEFAULT NULL,
  `direccion` varchar(255) DEFAULT NULL,
  `telefono` varchar(255) DEFAULT NULL,
  `correo` varchar(255) DEFAULT NULL,
  `saldo_pedido` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_ingresos` decimal(10,2) NOT NULL DEFAULT 0.00,
  `saldo_deuda` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_by` bigint(20) UNSIGNED DEFAULT NULL,
  `updated_by` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `proveedores`
--

INSERT INTO `proveedores` (`id`, `nombre`, `razon_social`, `nit`, `direccion`, `telefono`, `correo`, `saldo_pedido`, `saldo_ingresos`, `saldo_deuda`, `created_by`, `updated_by`, `created_at`, `updated_at`) VALUES
(5, 'Copelme', 'Copelme S.A.', '102938475', 'Av. Mariscal Santa Cruz #1023, La Paz', '22871234', 'info@copelme.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:12:31', '2025-07-01 07:12:31'),
(6, 'Prolimpia Bolivia', 'Prolimpia Soluciones Integrales SRL', '104567890', 'Calle 21, Calacoto, La Paz', '22789012', 'contacto@prolimpia.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:13:07', '2025-07-01 07:13:07'),
(7, 'Daryza SRL', 'Daryza Importaciones SRL', '109876543', 'Av. 6 de Marzo, El Alto', '28450921', 'ventas@daryza.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:13:35', '2025-07-01 07:13:35'),
(8, 'Limpimarket', 'Limpimarket Bolivia S.R.L.', '103210999', 'Av. Montes #543, La Paz', '22887654', 'info@limpimarket.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:14:06', '2025-07-01 07:14:06'),
(9, 'Comercial Rocsa', 'Comercial Rocsa Ltda.', '106789123', 'Calle Colombia, La Paz', '22870120', 'contacto@rocsa.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:15:06', '2025-07-01 07:15:06'),
(10, 'Induquim Bolivia', 'Industrias Químicas Bolivia S.R.L.', '102301789', 'Calle México #145, La Paz', '22870087', 'ventas@induquim.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:15:43', '2025-07-01 07:15:43'),
(11, 'Maxiclean Servicios Integrales', 'Maxiclean S.R.L.', '109998877', 'Zona Río Seco, El Alto', '28331245', 'contacto@maxiclean.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 07:17:01', '2025-07-01 07:17:01'),
(12, 'COIMSA', 'COIMSA S.R.L.', '1027129029 ', 'Av. Alemana, Calle Tamarindo # 2110', '3453579 ', 'ventas@coimsa.com.bo', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 21:26:39', '2025-07-01 21:26:39'),
(13, 'ROJAS DISTRIBUCIONES Y REPRESENTACIONES', 'ROJAS DISTRIBUCIONES Y REPRESENTACIONES SRL', '2718202012', 'CALLE YUNGAS N° 876', '73037301 ', 'ventas@rojas.com', 0.00, 0.00, 0.00, 1, NULL, '2025-07-01 21:33:47', '2025-07-01 21:33:47');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `guard_name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'web', '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(2, 'ventas', 'web', '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(3, 'compras', 'web', '2025-07-01 17:45:45', '2025-07-01 17:45:45'),
(4, 'almacenes', 'web', '2025-07-01 17:45:45', '2025-07-01 17:45:45');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('ifdrNDOyWIYMG2CbFQQHuqnyPb1vClt4WORtt1J6', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiNFhITGJHSjFNVnBUWHhCbEZFek0xMW5PUml5SWZvVWhNUEJrTHlnWSI7czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mjc6Imh0dHA6Ly9lbXVuYWgudGVzdC9yZXBvcnRlcyI7fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7czoyMToicGFzc3dvcmRfaGFzaF9zYW5jdHVtIjtzOjYwOiIkMnkkMTIkQ3QwamxLMC84SUx2QjlyQkM1bWNpdUNCQ0pXUFRjcWVjYjJ2SERUYVcxaWJiRlRLS2Q4Yk8iO30=', 1751449773);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `two_factor_secret` text DEFAULT NULL,
  `two_factor_recovery_codes` text DEFAULT NULL,
  `two_factor_confirmed_at` timestamp NULL DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `current_team_id` bigint(20) UNSIGNED DEFAULT NULL,
  `profile_photo_path` varchar(2048) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `two_factor_secret`, `two_factor_recovery_codes`, `two_factor_confirmed_at`, `remember_token`, `current_team_id`, `profile_photo_path`, `created_at`, `updated_at`) VALUES
(1, 'Martin Gutierrez', 'martingutierrezc4@gmail.com', NULL, '$2y$12$Ct0jlK0/8ILvB9rBC5mciuCBCJWPTcqecb2vHDTaW1ibbFTKKd8bO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24 00:22:54', '2025-07-02 05:14:48'),
(2, 'mmaldonado', 'mmaldonado@gmail.com', NULL, '$2y$12$ET6wQoPAtJPZpv28DF7wq.setlgcsOgodtX2EhNYhN0hwIX1Ljxuy', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-25 04:31:13', '2025-07-02 04:40:05'),
(3, 'Javier Mancilla', 'jmancilla@gmail.com', NULL, '$2y$12$wMtc2beANrijAC954/bY4u2Ybl/9JtXXj.CmKH60RHROrOjoH1le.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-02 04:42:23', '2025-07-02 04:42:23'),
(4, 'Ariel Campero', 'acampero1@gmail.com', NULL, '$2y$12$U.mXTvdancJJGuABW3Sk1OYatutG2zDtKEr8yuscw9zLttTClXBO.', NULL, NULL, NULL, NULL, NULL, NULL, '2025-07-02 04:46:24', '2025-07-02 05:27:15');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `almacen_productos_almacen_id_foreign` (`almacen_id`),
  ADD KEY `almacen_productos_producto_id_foreign` (`producto_id`),
  ADD KEY `almacen_productos_created_by_foreign` (`created_by`),
  ADD KEY `almacen_productos_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `areas`
--
ALTER TABLE `areas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_created_by_foreign` (`created_by`),
  ADD KEY `clientes_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contactos_proveedores_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `contactos_proveedores_created_by_foreign` (`created_by`),
  ADD KEY `contactos_proveedores_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD PRIMARY KEY (`id`),
  ADD KEY `empleados_user_id_foreign` (`user_id`),
  ADD KEY `empleados_almacen_id_foreign` (`almacen_id`),
  ADD KEY `empleados_area_id_foreign` (`area_id`),
  ADD KEY `empleados_created_by_foreign` (`created_by`),
  ADD KEY `empleados_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guia_ingresos_proveedor_id_foreign` (`proveedor_id`),
  ADD KEY `guia_ingresos_created_by_foreign` (`created_by`),
  ADD KEY `guia_ingresos_updated_by_foreign` (`updated_by`),
  ADD KEY `guia_ingresos_almacen_id_foreign` (`almacen_id`);

--
-- Indices de la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `guia_ingreso_detalles_guia_ingreso_id_foreign` (`guia_ingreso_id`),
  ADD KEY `guia_ingreso_detalles_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indices de la tabla `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kardex_guia_ingreso_id_foreign` (`guia_ingreso_id`),
  ADD KEY `kardex_producto_id_foreign` (`producto_id`),
  ADD KEY `kardex_almacen_id_foreign` (`almacen_id`),
  ADD KEY `kardex_user_id_foreign` (`user_id`),
  ADD KEY `kardex_pedido_id_foreign` (`pedido_id`);

--
-- Indices de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lista_precios_created_by_foreign` (`created_by`),
  ADD KEY `lista_precios_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `lista_precios_productos_lista_precio_id_foreign` (`lista_precio_id`),
  ADD KEY `lista_precios_productos_producto_id_foreign` (`producto_id`),
  ADD KEY `lista_precios_productos_created_by_foreign` (`created_by`),
  ADD KEY `lista_precios_productos_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `paginas`
--
ALTER TABLE `paginas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pagina_role`
--
ALTER TABLE `pagina_role`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagina_role_pagina_id_foreign` (`pagina_id`),
  ADD KEY `pagina_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pagos_compras_guia_ingreso_id_foreign` (`guia_ingreso_id`),
  ADD KEY `pagos_compras_created_by_foreign` (`created_by`),
  ADD KEY `pagos_compras_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedidos_cliente_id_foreign` (`cliente_id`),
  ADD KEY `pedidos_almacen_id_foreign` (`almacen_id`),
  ADD KEY `pedidos_created_by_foreign` (`created_by`),
  ADD KEY `pedidos_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `pedido_productos_pedido_id_foreign` (`pedido_id`),
  ADD KEY `pedido_productos_producto_id_foreign` (`producto_id`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `productos_categoria_id_foreign` (`categoria_id`),
  ADD KEY `productos_created_by_foreign` (`created_by`),
  ADD KEY `productos_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `proveedores_created_by_foreign` (`created_by`),
  ADD KEY `proveedores_updated_by_foreign` (`updated_by`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `role_has_permissions_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;

--
-- AUTO_INCREMENT de la tabla `areas`
--
ALTER TABLE `areas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `paginas`
--
ALTER TABLE `paginas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `pagina_role`
--
ALTER TABLE `pagina_role`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT de la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  ADD CONSTRAINT `almacen_productos_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `almacen_productos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `almacen_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `almacen_productos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `clientes_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  ADD CONSTRAINT `contactos_proveedores_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `contactos_proveedores_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `contactos_proveedores_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `empleados`
--
ALTER TABLE `empleados`
  ADD CONSTRAINT `empleados_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_area_id_foreign` FOREIGN KEY (`area_id`) REFERENCES `areas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `empleados_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `empleados_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `empleados_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  ADD CONSTRAINT `guia_ingresos_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guia_ingresos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `guia_ingresos_proveedor_id_foreign` FOREIGN KEY (`proveedor_id`) REFERENCES `proveedores` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guia_ingresos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  ADD CONSTRAINT `guia_ingreso_detalles_guia_ingreso_id_foreign` FOREIGN KEY (`guia_ingreso_id`) REFERENCES `guia_ingresos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `guia_ingreso_detalles_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `kardex`
--
ALTER TABLE `kardex`
  ADD CONSTRAINT `kardex_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kardex_guia_ingreso_id_foreign` FOREIGN KEY (`guia_ingreso_id`) REFERENCES `guia_ingresos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kardex_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `kardex_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kardex_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  ADD CONSTRAINT `lista_precios_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lista_precios_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  ADD CONSTRAINT `lista_precios_productos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `lista_precios_productos_lista_precio_id_foreign` FOREIGN KEY (`lista_precio_id`) REFERENCES `lista_precios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lista_precios_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `lista_precios_productos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `model_has_permissions`
--
ALTER TABLE `model_has_permissions`
  ADD CONSTRAINT `model_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `model_has_roles`
--
ALTER TABLE `model_has_roles`
  ADD CONSTRAINT `model_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagina_role`
--
ALTER TABLE `pagina_role`
  ADD CONSTRAINT `pagina_role_pagina_id_foreign` FOREIGN KEY (`pagina_id`) REFERENCES `paginas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagina_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  ADD CONSTRAINT `pagos_compras_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pagos_compras_guia_ingreso_id_foreign` FOREIGN KEY (`guia_ingreso_id`) REFERENCES `guia_ingresos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagos_compras_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD CONSTRAINT `pedidos_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedidos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `pedidos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `pedido_productos`
--
ALTER TABLE `pedido_productos`
  ADD CONSTRAINT `pedido_productos_pedido_id_foreign` FOREIGN KEY (`pedido_id`) REFERENCES `pedidos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pedido_productos_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `productos_categoria_id_foreign` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `productos_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `productos_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `proveedores`
--
ALTER TABLE `proveedores`
  ADD CONSTRAINT `proveedores_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`) ON DELETE SET NULL,
  ADD CONSTRAINT `proveedores_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`) ON DELETE SET NULL;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
