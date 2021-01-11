-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 04-01-2021 a las 19:09:41
-- Versión del servidor: 10.4.11-MariaDB
-- Versión de PHP: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `servicio_mc`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `razon_social` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruc` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `clientes`
--

INSERT INTO `clientes` (`id`, `razon_social`, `ruc`, `created_at`, `updated_at`) VALUES
(1, 'Cliente Nuevo', '15604284080', '2020-12-23 01:31:26', '2020-12-23 01:31:26'),
(2, 'Nuevo cliente de prueba', '20603315902', '2020-12-23 01:31:31', '2020-12-23 01:31:31'),
(3, 'Empresas Sac', '20603315902', '2020-12-23 21:21:27', '2020-12-23 21:21:27'),
(4, 'dssfsdfsdfsdfsdf', '15604284080', '2021-01-04 21:32:21', '2021-01-04 21:32:21');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `designaciones`
--

CREATE TABLE `designaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `supervisores_id` int(10) UNSIGNED NOT NULL,
  `ingenios_id` int(10) UNSIGNED NOT NULL,
  `fecha_inicio` date NOT NULL,
  `fecha_fin` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `designaciones`
--

INSERT INTO `designaciones` (`id`, `supervisores_id`, `ingenios_id`, `fecha_inicio`, `fecha_fin`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2020-12-22', '2020-12-27', '2020-12-23 01:33:28', '2020-12-23 01:33:28'),
(2, 2, 2, '2020-12-29', '2020-12-31', '2020-12-23 01:33:43', '2020-12-23 01:33:43'),
(3, 2, 2, '2020-12-23', '2020-12-26', '2020-12-23 21:24:27', '2020-12-23 21:24:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados_pagos`
--

CREATE TABLE `estados_pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `estados_pagos`
--

INSERT INTO `estados_pagos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Pendiente', NULL, NULL),
(2, 'Pagado', NULL, '2020-12-23 21:27:30');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `funcion_roles`
--

CREATE TABLE `funcion_roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `sub_menu_id` int(10) UNSIGNED NOT NULL,
  `crear` tinyint(1) DEFAULT NULL,
  `editar` tinyint(1) DEFAULT NULL,
  `eliminar` tinyint(1) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `funcion_roles`
--

INSERT INTO `funcion_roles` (`id`, `rol_id`, `menu_id`, `sub_menu_id`, `crear`, `editar`, `eliminar`, `created_at`, `updated_at`) VALUES
(1, 1, 4, 11, 1, 0, 1, '2020-12-22 05:46:03', '2020-12-23 21:20:40'),
(2, 1, 4, 12, 1, 1, 1, '2020-12-22 07:45:42', '2020-12-22 07:45:42'),
(3, 1, 4, 13, 1, 1, 1, '2020-12-22 07:45:57', '2020-12-22 07:46:02'),
(4, 1, 2, 2, 1, 1, 1, '2020-12-22 07:58:01', '2020-12-22 07:58:01'),
(5, 1, 2, 10, 1, 1, 1, '2020-12-22 07:58:31', '2020-12-22 07:58:31'),
(6, 1, 2, 7, 1, 1, 1, '2020-12-22 08:02:45', '2020-12-22 08:02:45'),
(7, 1, 2, 6, 1, 1, 1, '2020-12-23 01:19:37', '2020-12-23 01:19:37'),
(8, 2, 2, 2, 1, 1, 1, '2020-12-23 01:21:51', '2020-12-23 01:21:51'),
(9, 1, 2, 3, 1, 1, 1, '2020-12-23 01:30:00', '2020-12-23 01:30:00'),
(10, 1, 2, 4, 1, 1, 1, '2020-12-23 01:30:11', '2020-12-23 01:30:11'),
(11, 1, 2, 5, 1, 1, 1, '2020-12-23 01:30:27', '2020-12-23 01:30:27'),
(12, 1, 2, 9, 1, 1, 1, '2020-12-23 01:39:35', '2020-12-23 01:39:35'),
(13, 1, 2, 8, 1, 1, 1, '2020-12-23 01:42:28', '2020-12-23 01:42:28'),
(14, 2, 2, 4, 1, 1, 1, '2020-12-23 03:22:26', '2020-12-23 03:22:26'),
(15, 2, 4, 12, 0, 0, 0, '2020-12-23 06:11:11', '2020-12-23 06:11:11'),
(16, 2, 2, 10, 1, 1, 0, '2020-12-23 21:56:04', '2020-12-23 21:56:04'),
(17, 2, 2, 5, 1, 0, 0, '2020-12-23 21:59:36', '2020-12-23 21:59:36');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ingenios`
--

CREATE TABLE `ingenios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `ingenios`
--

INSERT INTO `ingenios` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Caña brava 3', '2020-12-23 01:32:55', '2020-12-23 21:25:46'),
(2, 'Nuevo Ingenio', '2020-12-23 01:33:06', '2020-12-23 01:33:06');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lineas_productos`
--

CREATE TABLE `lineas_productos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `lineas_productos`
--

INSERT INTO `lineas_productos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Nueva linea de productos', '2020-12-23 01:34:19', '2020-12-23 01:34:19'),
(2, 'Nueva linea de productos 2', '2020-12-23 01:34:24', '2020-12-23 01:34:24');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `menus`
--

CREATE TABLE `menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `menus`
--

INSERT INTO `menus` (`id`, `nombre`, `icono`, `url`, `orden`, `created_at`, `updated_at`) VALUES
(1, 'Servicio', 'fas fa-hand-holding', 'servicio', 1, NULL, NULL),
(2, 'Maestros', 'fa fa-user', 'maestros', 2, NULL, NULL),
(3, 'Reportes', 'fa fa-file', 'reportes', 3, NULL, NULL),
(4, 'Configuracion', 'fas fa-cog', 'configuracion', 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_09_21_145539_create_roles_table', 1),
(2, '2014_10_12_000000_create_users_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2020_12_11_211424_create_ingenios_table', 1),
(6, '2020_12_11_212409_create_modo_pagos_table', 1),
(7, '2020_12_11_212504_create_tipo_servicios_table', 1),
(8, '2020_12_11_212532_create_observaciones_table', 1),
(9, '2020_12_11_212636_create_estados_pagos_table', 1),
(10, '2020_12_11_212747_create_lineas_productos_table', 1),
(11, '2020_12_11_212819_create_clientes_table', 1),
(12, '2020_12_11_213737_create_tarifarios_table', 1),
(13, '2020_12_11_214349_create_supervisores_table', 1),
(14, '2020_12_11_214532_create_designaciones_table', 1),
(15, '2020_12_21_145805_create_menus_table', 1),
(16, '2020_12_21_145843_create_sub_menus_table', 1),
(17, '2020_12_21_145948_create_funcion_roles_table', 1),
(18, '2020_12_25_203930_create_servicios_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modo_pagos`
--

CREATE TABLE `modo_pagos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `modo_pagos`
--

INSERT INTO `modo_pagos` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'modo de pago 1', '2020-12-23 01:34:05', '2020-12-23 01:34:05'),
(2, 'modo de pago 2', '2020-12-23 01:34:09', '2020-12-23 01:34:09');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `observaciones`
--

CREATE TABLE `observaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `password_resets`
--

INSERT INTO `password_resets` (`email`, `token`, `created_at`) VALUES
('joserega31@gmail.com', '$2y$10$mY8CIWwQpNVcibrEIE44n.Pl4EjjhfKwXG0NiFrQR9oIUWa0/4Fpe', '2020-12-23 21:30:15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', NULL, NULL),
(2, 'Supervisor', NULL, NULL),
(4, 'Administrador prueba cors', '2021-01-04 22:39:20', '2021-01-04 22:39:20'),
(5, 'Administrador rol', '2021-01-04 22:59:01', '2021-01-04 22:59:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `ingenio_id` int(10) UNSIGNED NOT NULL,
  `empresa_transporte` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `conductor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa_unidad` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa_carretera` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guia_transportista` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `almacen` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `unidad` varchar(5) COLLATE utf8mb4_unicode_ci NOT NULL,
  `costo_unitario_estiba` double NOT NULL,
  `costo_operativo_extra_estiba` double NOT NULL,
  `costo_flat_estiba` double NOT NULL,
  `costo_total_servicio` double NOT NULL,
  `costo_extra_estiba` double NOT NULL,
  `precio_extra_estiba` double NOT NULL,
  `precio_servicio` double NOT NULL,
  `precio_total_servicio` double NOT NULL,
  `utilidad` double NOT NULL,
  `igv` double NOT NULL,
  `fecha_servicio` date NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `fecha_liquidacion` date DEFAULT NULL,
  `facturado` tinyint(1) NOT NULL,
  `fecha_factura` date DEFAULT NULL,
  `num_factura` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto_factura` double DEFAULT NULL,
  `lineas_productos_id` int(10) UNSIGNED NOT NULL,
  `estados_pago_id` int(10) UNSIGNED NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `tipo_servicio_id` int(10) UNSIGNED NOT NULL,
  `modos_pagos_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `servicios`
--

INSERT INTO `servicios` (`id`, `ingenio_id`, `empresa_transporte`, `conductor`, `placa_unidad`, `placa_carretera`, `guia_transportista`, `almacen`, `cantidad`, `unidad`, `costo_unitario_estiba`, `costo_operativo_extra_estiba`, `costo_flat_estiba`, `costo_total_servicio`, `costo_extra_estiba`, `precio_extra_estiba`, `precio_servicio`, `precio_total_servicio`, `utilidad`, `igv`, `fecha_servicio`, `fecha_pago`, `fecha_liquidacion`, `facturado`, `fecha_factura`, `num_factura`, `monto_factura`, `lineas_productos_id`, `estados_pago_id`, `cliente_id`, `tipo_servicio_id`, `modos_pagos_id`, `created_at`, `updated_at`) VALUES
(1, 1, 'dfsfsdffsdfdsfsdf', 'jose regalado', 'fsdfsdf', 'sdfsdfdsf', 'sdfsdfdsf', 'dfsfsdfdsfsdf', 3, 'KG', 2.9, 40, 0, 2.9, 13, 10, 25, 67, 3.1, 71.1, '2020-12-22', '2020-12-23', NULL, 1, '2020-12-23', '4353545', 123, 1, 1, 2, 1, 1, '2020-12-23 01:41:20', '2020-12-23 21:50:24'),
(2, 2, 'empresa de transporte', 'jose regalado', 'xdfdf', 'sdfsdfdsf', 'sdfsdfdsf', 'dfsfsdfdsfsdf', 5, 'KG', 1.7, 2, 0, 1.9, 2, 1.9, 2.3, 2.1, 2, 2.1, '2020-12-22', NULL, NULL, 1, '2020-12-23', '4353545', 17, 2, 2, 2, 2, 2, '2020-12-23 02:51:35', '2020-12-23 21:50:49');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sub_menus`
--

CREATE TABLE `sub_menus` (
  `id` int(10) UNSIGNED NOT NULL,
  `menu_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `icono` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `orden` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sub_menus`
--

INSERT INTO `sub_menus` (`id`, `menu_id`, `nombre`, `icono`, `url`, `orden`, `created_at`, `updated_at`) VALUES
(1, 1, 'Servicio', 'fas fa-hand-holding', 'servicio', 1, NULL, NULL),
(2, 2, 'Clientes', 'fa fa-user', 'clientes', 1, NULL, NULL),
(3, 2, 'Supervisores', 'fa fa-users', 'supervisores', 2, NULL, NULL),
(4, 2, 'Ingenios', 'fa fa-flask', 'ingenios', 3, NULL, NULL),
(5, 2, 'Tarifarios', 'far fa-calendar-alt', 'tarifarios', 4, NULL, NULL),
(6, 2, 'Lineas de Productos', 'fas fa-shopping-basket', 'lineasprod', 5, NULL, NULL),
(7, 2, 'Modos de Pago', 'fas fa-money-check-alt', 'metpagos', 6, NULL, NULL),
(8, 2, 'Estados de Pago', 'fab fa-bitcoin', 'estpagos', 7, NULL, NULL),
(9, 2, 'Tipos de Servicios', 'fas fa-hand-holding-heart', 'tiposserv', 8, NULL, NULL),
(10, 2, 'Designaciones', 'far fa-calendar-alt', 'designaciones', 9, NULL, NULL),
(11, 4, 'Usuarios', 'fa fa-user', 'usuarios', 1, NULL, NULL),
(12, 4, 'Roles', 'fa fa-users', 'roles', 2, NULL, NULL),
(13, 4, 'Funciones del Rol', 'fas fa-bars', 'funcionrol', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `supervisores`
--

CREATE TABLE `supervisores` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombres` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `apellidos` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dni` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `numcuenta` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `cci` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `banco` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `supervisores`
--

INSERT INTO `supervisores` (`id`, `nombres`, `apellidos`, `dni`, `numcuenta`, `cci`, `banco`, `created_at`, `updated_at`) VALUES
(1, 'Daniel', 'Ramirez', '45345345', '44354543534545', '45353453543543', 'INTERBANK', '2020-12-23 01:32:06', '2020-12-23 01:32:06'),
(2, 'maria', 'suarez', '45345345', '44354543534545', '45353453543543', 'INTERBANK', '2020-12-23 01:32:27', '2020-12-23 01:32:27');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifarios`
--

CREATE TABLE `tarifarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `lineas_producto_id` int(10) UNSIGNED NOT NULL,
  `clientes_id` int(10) UNSIGNED NOT NULL,
  `precio` double NOT NULL,
  `unidad` varchar(10) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tarifarios`
--

INSERT INTO `tarifarios` (`id`, `lineas_producto_id`, `clientes_id`, `precio`, `unidad`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 12, 'UND', '2020-12-23 01:34:51', '2020-12-23 01:38:47'),
(2, 2, 1, 4, 'KG', '2020-12-23 01:35:09', '2020-12-23 01:38:56'),
(3, 2, 2, 120, 'KG', '2020-12-23 21:26:18', '2020-12-23 21:26:18');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicios`
--

CREATE TABLE `tipo_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tipo_servicios`
--

INSERT INTO `tipo_servicios` (`id`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 'tipo de servicio', '2020-12-23 01:39:49', '2020-12-23 01:39:49'),
(2, 'tipo servicio 2', '2020-12-23 01:39:54', '2020-12-23 01:39:54'),
(3, 'TIPO SERVICIO 3', '2020-12-23 21:26:50', '2020-12-23 21:26:50');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rol_id` int(10) UNSIGNED NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `rol_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'jose Regalado', 'joserega31@gmail.com', NULL, '$2y$10$UZq8jFTAfT.vdSGjdOIbrutSxT/YGDYxfQIj1B.1t.ejnLeucqwZq', 1, NULL, NULL, NULL),
(3, 'pedro suarez', 'pedro@gmail.com', NULL, '$2y$10$UZq8jFTAfT.vdSGjdOIbrutSxT/YGDYxfQIj1B.1t.ejnLeucqwZq', 2, NULL, '2020-12-22 05:13:45', '2020-12-22 05:13:45');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `designaciones`
--
ALTER TABLE `designaciones`
  ADD PRIMARY KEY (`id`),
  ADD KEY `designaciones_supervisores_id_foreign` (`supervisores_id`),
  ADD KEY `designaciones_ingenios_id_foreign` (`ingenios_id`);

--
-- Indices de la tabla `estados_pagos`
--
ALTER TABLE `estados_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indices de la tabla `funcion_roles`
--
ALTER TABLE `funcion_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `funcion_roles_rol_id_foreign` (`rol_id`),
  ADD KEY `funcion_roles_menu_id_foreign` (`menu_id`),
  ADD KEY `funcion_roles_sub_menu_id_foreign` (`sub_menu_id`);

--
-- Indices de la tabla `ingenios`
--
ALTER TABLE `ingenios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `lineas_productos`
--
ALTER TABLE `lineas_productos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modo_pagos`
--
ALTER TABLE `modo_pagos`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `servicios_ingenio_id_foreign` (`ingenio_id`),
  ADD KEY `servicios_lineas_productos_id_foreign` (`lineas_productos_id`),
  ADD KEY `servicios_estados_pago_id_foreign` (`estados_pago_id`),
  ADD KEY `servicios_cliente_id_foreign` (`cliente_id`),
  ADD KEY `servicios_tipo_servicio_id_foreign` (`tipo_servicio_id`),
  ADD KEY `servicios_modos_pagos_id_foreign` (`modos_pagos_id`);

--
-- Indices de la tabla `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sub_menus_menu_id_foreign` (`menu_id`);

--
-- Indices de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifarios`
--
ALTER TABLE `tarifarios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarifarios_lineas_producto_id_foreign` (`lineas_producto_id`),
  ADD KEY `tarifarios_clientes_id_foreign` (`clientes_id`);

--
-- Indices de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`),
  ADD KEY `users_rol_id_foreign` (`rol_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `designaciones`
--
ALTER TABLE `designaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `estados_pagos`
--
ALTER TABLE `estados_pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `funcion_roles`
--
ALTER TABLE `funcion_roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de la tabla `ingenios`
--
ALTER TABLE `ingenios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `lineas_productos`
--
ALTER TABLE `lineas_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT de la tabla `modo_pagos`
--
ALTER TABLE `modo_pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `observaciones`
--
ALTER TABLE `observaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `tarifarios`
--
ALTER TABLE `tarifarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `designaciones`
--
ALTER TABLE `designaciones`
  ADD CONSTRAINT `designaciones_ingenios_id_foreign` FOREIGN KEY (`ingenios_id`) REFERENCES `ingenios` (`id`),
  ADD CONSTRAINT `designaciones_supervisores_id_foreign` FOREIGN KEY (`supervisores_id`) REFERENCES `supervisores` (`id`);

--
-- Filtros para la tabla `funcion_roles`
--
ALTER TABLE `funcion_roles`
  ADD CONSTRAINT `funcion_roles_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`),
  ADD CONSTRAINT `funcion_roles_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`),
  ADD CONSTRAINT `funcion_roles_sub_menu_id_foreign` FOREIGN KEY (`sub_menu_id`) REFERENCES `sub_menus` (`id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `servicios_estados_pago_id_foreign` FOREIGN KEY (`estados_pago_id`) REFERENCES `estados_pagos` (`id`),
  ADD CONSTRAINT `servicios_ingenio_id_foreign` FOREIGN KEY (`ingenio_id`) REFERENCES `ingenios` (`id`),
  ADD CONSTRAINT `servicios_lineas_productos_id_foreign` FOREIGN KEY (`lineas_productos_id`) REFERENCES `lineas_productos` (`id`),
  ADD CONSTRAINT `servicios_modos_pagos_id_foreign` FOREIGN KEY (`modos_pagos_id`) REFERENCES `modo_pagos` (`id`),
  ADD CONSTRAINT `servicios_tipo_servicio_id_foreign` FOREIGN KEY (`tipo_servicio_id`) REFERENCES `tipo_servicios` (`id`);

--
-- Filtros para la tabla `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Filtros para la tabla `tarifarios`
--
ALTER TABLE `tarifarios`
  ADD CONSTRAINT `tarifarios_clientes_id_foreign` FOREIGN KEY (`clientes_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `tarifarios_lineas_producto_id_foreign` FOREIGN KEY (`lineas_producto_id`) REFERENCES `lineas_productos` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
