-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 30-06-2025 a las 07:24:36
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
(2, 'El Alto', 'Calle cochabamba nro 123', NULL, '2025-06-27 07:14:36');

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
(4, 1, 4, 0, 100, 51, 'a-012', 1, 1, '2025-06-26 07:00:27', '2025-06-26 07:57:50'),
(5, 2, 4, 0, 200, 30, 'e3', 1, 1, '2025-06-26 07:00:27', '2025-06-26 07:58:11'),
(6, 1, 5, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:04:21', '2025-06-26 07:04:21'),
(7, 2, 5, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:04:21', '2025-06-26 07:04:21'),
(8, 1, 6, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:04:38', '2025-06-26 07:04:38'),
(9, 2, 6, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:04:38', '2025-06-26 07:04:38'),
(10, 1, 7, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:04:58', '2025-06-26 07:04:58'),
(11, 2, 7, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:04:58', '2025-06-26 07:04:58'),
(12, 1, 8, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:05:18', '2025-06-26 07:05:18'),
(13, 2, 8, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:05:18', '2025-06-26 07:05:18'),
(14, 1, 9, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:05:35', '2025-06-26 07:05:35'),
(15, 2, 9, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:05:35', '2025-06-26 07:05:35'),
(16, 1, 10, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:34:16', '2025-06-30 09:10:13'),
(17, 2, 10, 0, 0, 0, '-', 1, NULL, '2025-06-26 07:34:16', '2025-06-26 07:34:16'),
(18, 1, 11, 0, 0, 0, '-', 1, NULL, '2025-06-27 06:50:48', '2025-06-27 06:50:48'),
(19, 2, 11, 0, 0, 0, '-', 1, NULL, '2025-06-27 06:50:48', '2025-06-27 06:50:48');

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

--
-- Volcado de datos para la tabla `cache`
--

INSERT INTO `cache` (`key`, `value`, `expiration`) VALUES
('laravel_cache_83dacac86f5ee86c0d26477f8925853d', 'i:1;', 1751259344),
('laravel_cache_83dacac86f5ee86c0d26477f8925853d:timer', 'i:1751259344;', 1751259344);

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
(4, 'Papel Higiénico', '2025-06-26 02:07:51', NULL),
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
(2, 'prueba2', 'prueba2', '222222222', '22222222222', NULL, NULL, 0.00, 0.00, 0.00, 1, NULL, '2025-06-29 14:34:35', '2025-06-29 14:34:35'),
(3, 'aaaaaaa', '222222', '333333333333', '33333333333', NULL, '33@gmail.com', 0.00, 0.00, 0.00, 1, 1, '2025-06-29 14:35:15', '2025-06-29 14:51:07'),
(4, 'prueba3', '3333333', '3333333', '3333333333', NULL, NULL, 0.00, 0.00, 0.00, 1, NULL, '2025-06-29 14:39:05', '2025-06-29 14:39:05');

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
(8, 1, 'Martin', 'Gutierrez', NULL, NULL, 'mgutierrez@gmail.com', '4924998', '1982-08-11', '2015-05-17', 2, 1, 'storage/img/empleados/Ofhua3O4djv9friixxMrV2SJw7KmHrqLSaTIU7xp.jpg', NULL, NULL, '2025-06-25 04:50:21', '2025-06-25 05:48:51'),
(9, 2, 'Mauricio', 'Maldonado', NULL, NULL, 'mmaldonado@gmail.com', '12345678', '2000-01-01', '2025-06-02', 2, 2, 'storage/img/empleados/O5lIXKywmOGLwbIxFdAn1ThyFkyssfESX7Bz3dJ3.png', NULL, NULL, '2025-06-25 05:50:36', '2025-06-27 06:25:30');

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
  `estado_ingreso` enum('pedido','entrada_mercaderia','facturado') NOT NULL DEFAULT 'pedido',
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
(1, 2, 'aaaaaa', '2025-06-30', '2025-06-30', 'facturado', 1000.00, 'aaaaa', NULL, NULL, 1, 1, 1, '2025-06-30 06:16:21', '2025-06-30 09:22:44');

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
(3, 1, 10, 100.00, 10, 1000.00, '2025-06-30 06:19:16', '2025-06-30 06:19:16');

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
  `guia_ingreso_id` bigint(20) UNSIGNED NOT NULL,
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

INSERT INTO `kardex` (`id`, `guia_ingreso_id`, `producto_id`, `almacen_id`, `cantidad`, `precio_unitario`, `fecha_entrada`, `user_id`, `created_at`, `updated_at`) VALUES
(4, 1, 10, 1, 10, 100.00, '2025-06-30', 1, '2025-06-30 09:10:13', '2025-06-30 09:10:13'),
(5, 1, 10, 1, -10, 100.00, '2025-06-30', 1, '2025-06-30 09:19:04', '2025-06-30 09:19:04');

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
(2, '2025', 1, '2025-01-01', '2025-09-03', 1, 1, '2025-06-28 14:21:46', '2025-06-29 06:31:08'),
(7, '2027', 0, '2027-01-01', '2027-01-31', 1, 1, '2025-06-29 06:24:41', '2025-06-29 06:30:55');

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
(4, 2, 4, 1000.00, 1, 1, '2025-06-28 14:21:47', '2025-06-29 07:34:53'),
(5, 2, 5, 0.00, 1, NULL, '2025-06-28 14:21:47', '2025-06-28 14:21:47'),
(6, 2, 6, 0.00, 1, NULL, '2025-06-28 14:21:47', '2025-06-28 14:21:47'),
(7, 2, 7, 0.00, 1, NULL, '2025-06-28 14:21:47', '2025-06-28 14:21:47'),
(8, 2, 8, 0.00, 1, NULL, '2025-06-28 14:21:47', '2025-06-28 14:21:47'),
(9, 2, 9, 50.00, 1, 1, '2025-06-28 14:21:47', '2025-06-29 07:41:47'),
(10, 2, 10, 0.00, 1, NULL, '2025-06-28 14:21:47', '2025-06-28 14:21:47'),
(11, 2, 11, 0.00, 1, NULL, '2025-06-28 14:21:47', '2025-06-28 14:21:47'),
(20, 7, 4, 70.00, 1, 1, '2025-06-29 06:24:41', '2025-06-29 07:47:55'),
(21, 7, 5, 0.00, 1, NULL, '2025-06-29 06:24:41', '2025-06-29 06:24:41'),
(22, 7, 6, 505.00, 1, 1, '2025-06-29 06:24:41', '2025-06-29 07:41:08'),
(23, 7, 7, 0.00, 1, NULL, '2025-06-29 06:24:41', '2025-06-29 06:24:41'),
(24, 7, 8, 0.00, 1, NULL, '2025-06-29 06:24:41', '2025-06-29 06:24:41'),
(25, 7, 9, 0.00, 1, NULL, '2025-06-29 06:24:41', '2025-06-29 06:24:41'),
(26, 7, 10, 200.00, 1, 1, '2025-06-29 06:24:41', '2025-06-29 07:12:40'),
(27, 7, 11, 50.00, 1, 1, '2025-06-29 06:24:41', '2025-06-29 06:32:43');

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
(30, '2025_06_30_010048_create_kardex_table', 12);

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
(4, 3, 'ambientador 300oz123', 'ambi_300a', 1, 1, '2025-06-26 07:00:27', '2025-06-27 06:09:38'),
(5, 5, 'Cloralex Desinfectante 5L', 'Col_005', 1, 1, '2025-06-26 07:04:21', '2025-06-26 07:06:38'),
(6, 2, 'Lysoform Líquido 1L', 'Lys002', 1, NULL, '2025-06-26 07:04:38', '2025-06-26 07:04:38'),
(7, 2, 'Detergente OMO Matic 3L', 'OMO001', 1, NULL, '2025-06-26 07:04:58', '2025-06-26 07:04:58'),
(8, 1, 'Lavavajillas Axion Limón 750m', 'Axion001', 1, NULL, '2025-06-26 07:05:18', '2025-06-26 07:05:18'),
(9, 2, 'Detergente Ariel Power 2.8L', 'Ariel001', 1, NULL, '2025-06-26 07:05:35', '2025-06-26 07:05:35'),
(10, 5, 'Ambientador Poett Lavanda', 'Poett01', 1, NULL, '2025-06-26 07:34:16', '2025-06-26 07:34:16'),
(11, 5, 'aaaaaa', 'aaaaaa', 1, NULL, '2025-06-27 06:50:48', '2025-06-27 06:50:48');

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
(2, 'aaaaa', 'aqqqq', '1231', NULL, NULL, NULL, 0.00, 0.00, 0.00, 1, 1, '2025-06-29 16:19:21', '2025-06-29 16:26:37'),
(4, 'qqqqqqqq', 'qqqqq', '12121', 'qqqqqq', '12121', 'q@gmail.com', 0.00, 0.00, 0.00, 1, NULL, '2025-06-29 16:30:24', '2025-06-29 16:30:24');

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
('MCdv2NkSpBB75lJkNnqRSEVavBkhytpSyaqnqrDa', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoic1h0ZkJPVkthVThFalQ1cXNMRXBLWFVlcnZPS0p6SGdsSURXdWtkRyI7czozOiJ1cmwiO2E6MDp7fXM6OToiX3ByZXZpb3VzIjthOjE6e3M6MzoidXJsIjtzOjI2OiJodHRwOi8vZW11bmFoLnRlc3QvY29tcHJhcyI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fXM6NTA6ImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjtpOjE7fQ==', 1751260976),
('s3W4RVGOnButF0G7kqZh0i5aGnmalctPgfFQGK7R', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:140.0) Gecko/20100101 Firefox/140.0', 'YTo1OntzOjY6Il90b2tlbiI7czo0MDoiUlBNODlsSGFpY1VBaVJ0OTNwRjZJRWRmdVBza1VHcDM1YmppeU1CbCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjY6Imh0dHA6Ly9lbXVuYWgudGVzdC9jb21wcmFzIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MTp7aTowO3M6Nzoic3VjY2VzcyI7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTtzOjIxOiJwYXNzd29yZF9oYXNoX3NhbmN0dW0iO3M6NjA6IiQyeSQxMiRDdDBqbEswLzhJTHZCOXJCQzVtY2l1Q0JDSldQVGNxZWNiMnZIRFRhVzFpYmJGVEtLZDhiTyI7fQ==', 1751249956);

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
(1, 'Martin', 'martingutierrezc4@gmail.com', NULL, '$2y$12$Ct0jlK0/8ILvB9rBC5mciuCBCJWPTcqecb2vHDTaW1ibbFTKKd8bO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-24 00:22:54', '2025-06-24 00:22:54'),
(2, 'mmaldonado', 'mmaldonado@gmail.com', NULL, '$2y$12$9iX.6IGt8onNHFAgPzCPQOT5xvkUszU1Wjt9lmPf3SlPegBSJADZO', NULL, NULL, NULL, NULL, NULL, NULL, '2025-06-25 04:31:13', '2025-06-25 04:31:13');

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
  ADD KEY `kardex_user_id_foreign` (`user_id`);

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `almacen_productos`
--
ALTER TABLE `almacen_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `contactos_proveedores`
--
ALTER TABLE `contactos_proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `empleados`
--
ALTER TABLE `empleados`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `guia_ingresos`
--
ALTER TABLE `guia_ingresos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `guia_ingreso_detalles`
--
ALTER TABLE `guia_ingreso_detalles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `kardex`
--
ALTER TABLE `kardex`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `lista_precios`
--
ALTER TABLE `lista_precios`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `lista_precios_productos`
--
ALTER TABLE `lista_precios_productos`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `proveedores`
--
ALTER TABLE `proveedores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

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
-- Filtros para la tabla `pagos_compras`
--
ALTER TABLE `pagos_compras`
  ADD CONSTRAINT `pagos_compras_created_by_foreign` FOREIGN KEY (`created_by`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `pagos_compras_guia_ingreso_id_foreign` FOREIGN KEY (`guia_ingreso_id`) REFERENCES `guia_ingresos` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `pagos_compras_updated_by_foreign` FOREIGN KEY (`updated_by`) REFERENCES `users` (`id`);

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
