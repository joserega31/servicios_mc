-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-02-2021 a las 01:22:49
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
-- Estructura de tabla para la tabla `almacenes`
--

CREATE TABLE `almacenes` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_almacen` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ingenios_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`id`, `nombre_almacen`, `ingenios_id`, `created_at`, `updated_at`) VALUES
(1, 'PUNTO BLANCO PIURA', 3, NULL, NULL),
(2, 'PUNTO BLANCO PIURA', 3, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `clientes`
--

CREATE TABLE `clientes` (
  `id` int(10) UNSIGNED NOT NULL,
  `razon_social` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `ruc` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tarifario_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(2, 'Pagado', NULL, NULL);

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
(1, 1, 2, 2, 1, 1, 1, NULL, NULL),
(2, 1, 2, 3, 1, 1, 1, NULL, NULL),
(3, 1, 2, 4, 1, 1, 1, NULL, NULL),
(4, 1, 2, 5, 1, 1, 1, NULL, NULL),
(5, 1, 2, 6, 1, 1, 1, NULL, NULL),
(6, 1, 2, 7, 1, 1, 1, NULL, NULL),
(7, 1, 2, 8, 1, 1, 1, NULL, NULL),
(8, 1, 2, 9, 1, 1, 1, NULL, NULL),
(9, 1, 2, 10, 1, 1, 1, NULL, NULL),
(10, 1, 2, 11, 1, 1, 1, NULL, NULL),
(11, 1, 2, 12, 1, 1, 1, NULL, NULL),
(12, 1, 4, 11, 1, 1, 1, NULL, NULL),
(13, 1, 4, 12, 1, 1, 1, NULL, NULL),
(14, 1, 4, 13, 1, 1, 1, NULL, NULL);

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
(1, 'CAÑA BRAVA', NULL, NULL),
(2, 'COSTEÑO', NULL, NULL),
(3, 'PUNTO BLANCO', NULL, NULL),
(4, 'ÁLVARES BOHL', NULL, NULL);

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
(1, 'ARROZ', NULL, NULL),
(2, 'AZUCAR', NULL, NULL),
(3, 'ABARROTES', NULL, NULL);

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
(1, 'Orden de Servicio', 'fas fa-hand-holding', 'servicio', 1, NULL, NULL),
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
(8, '2020_12_11_212636_create_estados_pagos_table', 1),
(9, '2020_12_11_212747_create_lineas_productos_table', 1),
(10, '2020_12_11_213737_create_tarifarios_table', 1),
(11, '2020_12_11_213739_create_tarifarios_listas_table', 1),
(12, '2020_12_11_214349_create_supervisores_table', 1),
(13, '2020_12_11_214532_create_designaciones_table', 1),
(14, '2020_12_11_222849_create_clientes_table', 1),
(15, '2020_12_21_145805_create_menus_table', 1),
(16, '2020_12_21_145843_create_sub_menus_table', 1),
(17, '2020_12_21_145948_create_funcion_roles_table', 1),
(18, '2020_12_23_223300_create_almacenes_table', 1),
(19, '2020_12_23_223455_create_unidades_table', 1),
(20, '2020_12_24_191513_create_ordenes_servicios_table', 1),
(21, '2020_12_25_203930_create_servicios_table', 1);

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
(1, 'EFECTIVO', NULL, NULL),
(2, 'DEPOSITO', NULL, NULL),
(3, 'CREDITO A 7 DIAS', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ordenes_servicios`
--

CREATE TABLE `ordenes_servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `fecha` date NOT NULL,
  `cliente_id` int(10) UNSIGNED NOT NULL,
  `estatus` int(11) NOT NULL,
  `igv` tinyint(1) NOT NULL,
  `fecha_pago` date DEFAULT NULL,
  `fecha_liquidacion` date DEFAULT NULL,
  `fecha_factura` date DEFAULT NULL,
  `num_factura` varchar(10) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `monto_factura` double DEFAULT NULL,
  `almacen_id` int(10) UNSIGNED NOT NULL,
  `estados_pago_id` int(10) UNSIGNED NOT NULL,
  `modos_pagos_id` int(10) UNSIGNED NOT NULL,
  `ingenio_id` int(10) UNSIGNED NOT NULL,
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
(2, 'Supervisor', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicios`
--

CREATE TABLE `servicios` (
  `id` int(10) UNSIGNED NOT NULL,
  `conductor` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa_unidad` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `placa_carretera` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guia_transportista` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cantidad` double NOT NULL,
  `unidad_id` int(10) UNSIGNED NOT NULL,
  `precio_servicio` double NOT NULL,
  `precio_total_servicio` double NOT NULL,
  `utilidad` double NOT NULL,
  `igv` double NOT NULL,
  `observaciones` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `lineas_productos_id` int(10) UNSIGNED NOT NULL,
  `ordenes_servicios_id` int(10) UNSIGNED NOT NULL,
  `tipo_servicio_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 1, 'Orden de Servicio', 'fas fa-hand-holding', 'servicio', 1, NULL, NULL),
(2, 2, 'Clientes', 'fa fa-user', 'clientes', 1, NULL, NULL),
(3, 2, 'Supervisores', 'fas fa-user-tie', 'supervisores', 2, NULL, NULL),
(4, 2, 'Ingenios', 'fa fa-flask', 'ingenios', 3, NULL, NULL),
(5, 2, 'Tarifarios', 'far fa-calendar-alt', 'tarifarios', 4, NULL, NULL),
(6, 2, 'Lineas de Productos', 'fas fa-shopping-basket', 'lineasprod', 5, NULL, NULL),
(7, 2, 'Modos de Pago', 'fas fa-money-check-alt', 'metpagos', 6, NULL, NULL),
(8, 2, 'Estados de Pago', 'fab fa-bitcoin', 'estpagos', 7, NULL, NULL),
(9, 2, 'Tipos de Servicios', 'fas fa-hand-holding-heart', 'tiposserv', 8, NULL, NULL),
(10, 2, 'Designaciones', 'far fa-calendar-alt', 'designaciones', 9, NULL, NULL),
(11, 2, 'Almacenes', 'fas fa-warehouse', 'almacenes', 10, NULL, NULL),
(12, 2, 'Unidades', 'fas fa-box-open', 'unidades', 11, NULL, NULL),
(13, 4, 'Usuarios', 'fa fa-user', 'usuarios', 1, NULL, NULL),
(14, 4, 'Roles', 'fa fa-users', 'roles', 2, NULL, NULL),
(15, 4, 'Funciones del Rol', 'fas fa-bars', 'funcionrol', 3, NULL, NULL);

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

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifarios`
--

CREATE TABLE `tarifarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `vigente` tinyint(1) NOT NULL,
  `nombre` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `tarifarios`
--

INSERT INTO `tarifarios` (`id`, `vigente`, `nombre`, `created_at`, `updated_at`) VALUES
(1, 1, 'GENERICO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tarifarios_listas`
--

CREATE TABLE `tarifarios_listas` (
  `id` int(10) UNSIGNED NOT NULL,
  `lineas_producto_id` int(10) UNSIGNED NOT NULL,
  `tarifario_id` int(10) UNSIGNED NOT NULL,
  `precio` double NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(1, 'CARGA', NULL, NULL),
(2, 'DESCARGA', NULL, NULL),
(3, 'ENCARPADO', NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidades`
--

CREATE TABLE `unidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `descripcion_corta` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descripcion_larga` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `unidades`
--

INSERT INTO `unidades` (`id`, `descripcion_corta`, `descripcion_larga`, `created_at`, `updated_at`) VALUES
(1, 'TN', 'TONELADAS', NULL, NULL),
(2, 'CJ', 'CAJA', NULL, NULL),
(3, 'CR', 'CARRO', NULL, NULL);

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
(1, 'Administrador', 'webmaster@mcdigitalperu.com', NULL, '$2y$10$GB1yma85bOxRbPHXlP0vMOefKcR4Rf4HlrQzBJi6XF79J6I7/sJOq', 1, NULL, NULL, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `almacenes_ingenios_id_foreign` (`ingenios_id`);

--
-- Indices de la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `clientes_tarifario_id_foreign` (`tarifario_id`);

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
-- Indices de la tabla `ordenes_servicios`
--
ALTER TABLE `ordenes_servicios`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ordenes_servicios_cliente_id_foreign` (`cliente_id`),
  ADD KEY `ordenes_servicios_almacen_id_foreign` (`almacen_id`),
  ADD KEY `ordenes_servicios_estados_pago_id_foreign` (`estados_pago_id`),
  ADD KEY `ordenes_servicios_modos_pagos_id_foreign` (`modos_pagos_id`),
  ADD KEY `ordenes_servicios_ingenio_id_foreign` (`ingenio_id`);

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
  ADD KEY `servicios_unidad_id_foreign` (`unidad_id`),
  ADD KEY `servicios_lineas_productos_id_foreign` (`lineas_productos_id`),
  ADD KEY `servicios_ordenes_servicios_id_foreign` (`ordenes_servicios_id`),
  ADD KEY `servicios_tipo_servicio_id_foreign` (`tipo_servicio_id`);

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
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tarifarios_listas`
--
ALTER TABLE `tarifarios_listas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tarifarios_listas_lineas_producto_id_foreign` (`lineas_producto_id`),
  ADD KEY `tarifarios_listas_tarifario_id_foreign` (`tarifario_id`);

--
-- Indices de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `unidades`
--
ALTER TABLE `unidades`
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
-- AUTO_INCREMENT de la tabla `almacenes`
--
ALTER TABLE `almacenes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `designaciones`
--
ALTER TABLE `designaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

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
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `ingenios`
--
ALTER TABLE `ingenios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `lineas_productos`
--
ALTER TABLE `lineas_productos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT de la tabla `modo_pagos`
--
ALTER TABLE `modo_pagos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `ordenes_servicios`
--
ALTER TABLE `ordenes_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `servicios`
--
ALTER TABLE `servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `sub_menus`
--
ALTER TABLE `sub_menus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `supervisores`
--
ALTER TABLE `supervisores`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tarifarios`
--
ALTER TABLE `tarifarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tarifarios_listas`
--
ALTER TABLE `tarifarios_listas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `tipo_servicios`
--
ALTER TABLE `tipo_servicios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `unidades`
--
ALTER TABLE `unidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `almacenes`
--
ALTER TABLE `almacenes`
  ADD CONSTRAINT `almacenes_ingenios_id_foreign` FOREIGN KEY (`ingenios_id`) REFERENCES `ingenios` (`id`);

--
-- Filtros para la tabla `clientes`
--
ALTER TABLE `clientes`
  ADD CONSTRAINT `clientes_tarifario_id_foreign` FOREIGN KEY (`tarifario_id`) REFERENCES `tarifarios` (`id`);

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
-- Filtros para la tabla `ordenes_servicios`
--
ALTER TABLE `ordenes_servicios`
  ADD CONSTRAINT `ordenes_servicios_almacen_id_foreign` FOREIGN KEY (`almacen_id`) REFERENCES `almacenes` (`id`),
  ADD CONSTRAINT `ordenes_servicios_cliente_id_foreign` FOREIGN KEY (`cliente_id`) REFERENCES `clientes` (`id`),
  ADD CONSTRAINT `ordenes_servicios_estados_pago_id_foreign` FOREIGN KEY (`estados_pago_id`) REFERENCES `estados_pagos` (`id`),
  ADD CONSTRAINT `ordenes_servicios_ingenio_id_foreign` FOREIGN KEY (`ingenio_id`) REFERENCES `ingenios` (`id`),
  ADD CONSTRAINT `ordenes_servicios_modos_pagos_id_foreign` FOREIGN KEY (`modos_pagos_id`) REFERENCES `modo_pagos` (`id`);

--
-- Filtros para la tabla `servicios`
--
ALTER TABLE `servicios`
  ADD CONSTRAINT `servicios_lineas_productos_id_foreign` FOREIGN KEY (`lineas_productos_id`) REFERENCES `lineas_productos` (`id`),
  ADD CONSTRAINT `servicios_ordenes_servicios_id_foreign` FOREIGN KEY (`ordenes_servicios_id`) REFERENCES `ordenes_servicios` (`id`),
  ADD CONSTRAINT `servicios_tipo_servicio_id_foreign` FOREIGN KEY (`tipo_servicio_id`) REFERENCES `tipo_servicios` (`id`),
  ADD CONSTRAINT `servicios_unidad_id_foreign` FOREIGN KEY (`unidad_id`) REFERENCES `unidades` (`id`);

--
-- Filtros para la tabla `sub_menus`
--
ALTER TABLE `sub_menus`
  ADD CONSTRAINT `sub_menus_menu_id_foreign` FOREIGN KEY (`menu_id`) REFERENCES `menus` (`id`);

--
-- Filtros para la tabla `tarifarios_listas`
--
ALTER TABLE `tarifarios_listas`
  ADD CONSTRAINT `tarifarios_listas_lineas_producto_id_foreign` FOREIGN KEY (`lineas_producto_id`) REFERENCES `lineas_productos` (`id`),
  ADD CONSTRAINT `tarifarios_listas_tarifario_id_foreign` FOREIGN KEY (`tarifario_id`) REFERENCES `tarifarios` (`id`);

--
-- Filtros para la tabla `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
