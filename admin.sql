-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 15-06-2021 a las 15:54:20
-- Versión del servidor: 10.4.18-MariaDB
-- Versión de PHP: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `admin`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'cordon', '2021-06-14 03:41:59', '2021-06-14 03:42:02'),
(2, 'cinta', '2021-06-14 03:42:22', '2021-06-14 03:42:19');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `colors`
--

CREATE TABLE `colors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `exa` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `reference` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `colors`
--

INSERT INTO `colors` (`id`, `name`, `exa`, `created_at`, `updated_at`, `reference`) VALUES
(3, 'negro', '#000000', '2021-06-14 22:17:04', '2021-06-15 02:31:31', 'negro'),
(4, 'rojo', '#f40606', '2021-06-14 22:17:20', '2021-06-15 02:31:41', 'rojo'),
(7, 'verde', '#2dcd18', '2021-06-15 03:48:50', '2021-06-15 03:48:50', 'verde'),
(8, 'amarillo', '#fbff00', '2021-06-15 03:49:16', '2021-06-15 03:49:16', 'amarillo'),
(9, 'azul', '#181ff2', '2021-06-15 03:49:31', '2021-06-15 03:49:31', 'azul');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `color_product`
--

CREATE TABLE `color_product` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `color_id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `color_product`
--

INSERT INTO `color_product` (`id`, `color_id`, `product_id`, `created_at`, `updated_at`) VALUES
(5, 7, 5, NULL, NULL),
(6, 8, 5, NULL, NULL),
(7, 9, 5, NULL, NULL),
(8, 3, 1, NULL, NULL),
(9, 4, 1, NULL, NULL),
(10, 3, 6, NULL, NULL),
(11, 4, 6, NULL, NULL),
(12, 7, 6, NULL, NULL),
(13, 8, 6, NULL, NULL),
(14, 9, 6, NULL, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `companies`
--

CREATE TABLE `companies` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `companies`
--

INSERT INTO `companies` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Hilos Libertad', '2021-06-14 06:10:10', '2021-06-14 06:10:10');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contents`
--

CREATE TABLE `contents` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `order` varchar(2) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `image` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_1` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_2` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_3` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `content_4` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `contents`
--

INSERT INTO `contents` (`id`, `section_id`, `order`, `image`, `content_1`, `content_2`, `content_3`, `content_4`, `created_at`, `updated_at`) VALUES
(1, 1, 'AA', 'images/74bchTQI4zCKv1Ehr8SPeFVYOLPyVLMAKnFlroaD.png', 'Hilos libertad', 'Nos especializamos en Grafica, Publicidad y Packaging.', NULL, NULL, '2021-06-14 06:10:14', '2021-06-14 06:15:05'),
(2, 2, NULL, 'images/sC0XbHg805eZpwZPsY03jGVPTEBSUGRfTGwlh3da.svg', 'Cordones', 'Fabricamos cordones tubulares y trenzados en Poliester y Lurex, desde 1mm hasta 6mm.', NULL, NULL, '2021-06-14 06:10:14', '2021-06-14 06:16:13'),
(3, 2, NULL, 'images/3BYdYy85hwtrSDXbLLTjztWx73EiUla5Yvs9XISu.svg', 'Cintas', 'Fabricamos cintas de Poliester 100% de 20 - 30 - 40mm Liviana y Pesada.', NULL, NULL, '2021-06-14 06:10:14', '2021-06-14 06:16:56'),
(4, 3, NULL, 'images/pobtUGLJmJw2ceKmCgC2AGpUfA0pi04966lwKzUz.png', 'Hilos libertad', 'Somos una empresa PYME familiar situada en el Gran Buenos Aires con una amplia trayectoria textil.', NULL, NULL, '2021-06-14 06:10:15', '2021-06-15 16:44:06'),
(5, 4, NULL, 'images/0Qy1Hm3v5K8grtOqSfRlPTl4lFspFZ5reHly1Nnv.png', 'Solicitar presupuesto', 'Envíanos toda la información de tu proyecto para que podamos cotizarlo.', NULL, NULL, '2021-06-14 06:10:15', '2021-06-14 06:33:27'),
(6, 5, 'AA', 'images/D01XCXr4ScsfvwGsV5deUVd2ynVLmsSE9Xmp4WZF.png', NULL, NULL, NULL, NULL, '2021-06-14 06:10:15', '2021-06-14 06:43:05'),
(7, 6, NULL, NULL, 'Somos una empresa PYME familiar situada en el Gran Buenos Aires con una amplia trayectoria textil.', NULL, NULL, NULL, '2021-06-14 06:10:15', '2021-06-14 06:43:23'),
(8, 7, NULL, NULL, '<p>Nos dedicamos a la produccion de cintas y cordones para bolsas de papel, grafica, publicidad y packaging. Contamos con un amplio stock de productos y colores, para atender la necesidad de nuestros clientes de una pronta entrega.</p><p>Despachamos a todo el pais a traves de expresos con deposito en Buenos Aires, los dias Lunes o bien se puede retirar en nuestra planta de San Martin</p>', '<iframe class=\"w-100\" height=\"289\" src=\"https://www.youtube.com/embed/wYYe9nH4fFI?list=RDMMwYYe9nH4fFI\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture\" allowfullscreen></iframe>', NULL, NULL, '2021-06-14 06:10:15', '2021-06-15 05:53:13'),
(9, 8, NULL, 'images/VqInDnMsg8dRRZuGuXV706SnC0skf90lY4y23kr1.svg', 'Cordones', 'Fabricamos cordones tubulares y trenzados en Poliester y Lurex, desde 1mm hasta 6mm. Nos especializamos en Grafica, Publicidad y Packaging.', NULL, NULL, '2021-06-14 06:10:15', '2021-06-14 06:59:41'),
(10, 9, NULL, 'images/91SPeNs31JDee9PJHbz6lacN9ubPNcoaPva44qCb.svg', 'Cintas', 'Fabricamos cintas de Poliester 100% de 20 - 30 - 40mm Liviana y Pesada.', NULL, NULL, '2021-06-14 06:10:16', '2021-06-14 07:04:58'),
(11, 10, 'AA', 'images/7ypxsSOthd1kUrZ2TlMojanbo4LFgDfvxvWrp5aU.svg', 'Corte', 'Corte con calor a medida por par desde 35cm a un máximo de 80cm.', 'Se entrega en bolsas de 500 tiras, con un pedido mínimo de 2000 tiras.', NULL, '2021-06-14 06:10:16', '2021-06-14 22:15:14'),
(12, 10, 'BB', 'images/tq0QdD6qYbUHqJ7kkaDcmWNwehr1C2pmjVAWBdqR.svg', 'Puntera', 'Colocación de puntera plástica transparente por par desde 35cm a un máximo de 56cm.', 'Se entrega en bolsas de 500 tiras, con un pedido mínimo de 2000 tiras.', NULL, '2021-06-14 06:10:16', '2021-06-14 18:19:28'),
(13, 10, 'CC', 'images/b5enDchbDuABbcOq9R4YHUy8nEXN6WiBoK9uAY83.svg', 'Encarretelado', 'Los metros por carretel varían según el articulo, debajo se muestra cada articulo con sus correspondientes metros.', '<table class=\"table-servicios\" style=\"font-size: 9px; width: 100%;\">            <tbody>                <tr>                    <td>Metros</td>                    <td>Yute</td>                    <td>171</td>                    <td>Lurex</td>                    <td>T5</td>                    <td>Soga <br> Pesada</td>                    <td>Cinta <br> Liviana</td>                    <td>Cinta <br> Pesada</td>                </tr>                <tr>                    <td>300</td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"oscuro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                </tr>                <tr>                    <td class=\"\">400</td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"oscuro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"oscuro\"></td>                </tr>                <tr>                    <td class=\"\">500</td>                    <td class=\"claro\"></td>                    <td class=\"oscuro\"></td>                    <td class=\"oscuro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"oscuro\"></td>                    <td class=\"claro\"></td>                </tr>                <tr>                    <td class=\"\">1000</td>                    <td class=\"oscuro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                    <td class=\"claro\"></td>                </tr>            </tbody>        </table>', NULL, '2021-06-14 06:10:16', '2021-06-14 18:19:56'),
(14, 11, NULL, NULL, 'Bolsas', 'Complete los datos para calcular la cantidad de metros necesarios.', NULL, NULL, '2021-06-14 06:10:16', '2021-06-14 07:23:20');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `data`
--

CREATE TABLE `data` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `company_id` bigint(20) UNSIGNED NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone1` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone2` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_header` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `logo_footer` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `youtube` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `facebook` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `instagram` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `description` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `data`
--

INSERT INTO `data` (`id`, `company_id`, `address`, `email`, `phone1`, `phone2`, `logo_header`, `logo_footer`, `youtube`, `facebook`, `instagram`, `created_at`, `updated_at`, `description`) VALUES
(1, 1, 'Ricardo Güiraldes 5760, Billinghurst', 'hiloslibertad@gmail.com', '4-844-9534', '4-844-2161', 'images/data/YDcV2hwp0fI6b9hCa45axfwXie8iYqvgmMq7v7db.svg', 'images/data/wp8JFTbK7HJ4CiXYJmiwsYtnNNHtv6JwujKlzcVv.svg', NULL, NULL, NULL, '2021-06-14 06:10:10', '2021-06-14 19:49:08', 'esto es una prueba');

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
(246, '2014_10_12_000000_create_users_table', 1),
(247, '2014_10_12_100000_create_password_resets_table', 1),
(248, '2019_08_19_000000_create_failed_jobs_table', 1),
(249, '2021_06_02_205210_create_permission_tables', 1),
(250, '2021_06_06_163021_create_companies_table', 1),
(251, '2021_06_06_163959_create_data_table', 1),
(252, '2021_06_06_170105_create_pages_table', 1),
(253, '2021_06_06_170412_create_sections_table', 1),
(254, '2021_06_06_170920_create_contents_table', 1),
(255, '2021_06_06_171325_create_categories_table', 1),
(256, '2021_06_06_171457_create_colors_table', 1),
(257, '2021_06_06_171522_create_products_table', 1),
(258, '2021_06_06_172502_create_color_product_table', 1),
(259, '2021_06_06_172756_create_variable_products_table', 1),
(260, '2021_06_06_193145_create_product_picture_table', 1),
(261, '2021_06_14_010105_create_newsletters_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `newsletters`
--

CREATE TABLE `newsletters` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pages`
--

CREATE TABLE `pages` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `pages`
--

INSERT INTO `pages` (`id`, `name`, `created_at`, `updated_at`, `keywords`) VALUES
(1, 'home', '2021-06-14 06:10:10', '2021-06-15 02:03:53', NULL),
(2, 'empresa', '2021-06-14 06:10:10', '2021-06-15 02:03:54', NULL),
(3, 'cordon', '2021-06-14 06:10:10', '2021-06-15 02:03:54', NULL),
(4, 'cinta', '2021-06-14 06:10:11', '2021-06-14 06:10:11', NULL),
(5, 'servicios', '2021-06-14 06:10:11', '2021-06-14 06:10:11', NULL),
(6, 'colores', '2021-06-14 06:10:11', '2021-06-14 06:10:11', NULL),
(7, 'solicitud-de-presupuesto', '2021-06-14 06:10:11', '2021-06-14 06:10:11', NULL),
(8, 'contacto', '2021-06-14 06:10:11', '2021-06-14 06:10:11', NULL),
(9, 'productos', '2021-06-14 21:30:56', '2021-06-14 21:31:00', NULL);

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
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `permissions`
--

INSERT INTO `permissions` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-06-14 13:51:41', '2021-06-14 13:51:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `characteristic` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `presentation` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `application` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `keywords` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`id`, `category_id`, `name`, `characteristic`, `presentation`, `application`, `extra`, `created_at`, `updated_at`, `keywords`) VALUES
(1, 1, 'Soga pesada', NULL, NULL, NULL, NULL, '2021-06-14 07:42:55', '2021-06-14 07:42:55', NULL),
(5, 1, 'product2', NULL, NULL, NULL, NULL, '2021-06-15 02:22:54', '2021-06-15 02:22:54', NULL),
(6, 2, 'product3', NULL, NULL, NULL, NULL, '2021-06-15 17:40:31', '2021-06-15 17:40:31', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product_picture`
--

CREATE TABLE `product_picture` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'web', '2021-06-14 06:10:08', '2021-06-14 06:10:08'),
(2, 'Gestor', 'web', '2021-06-14 06:10:08', '2021-06-14 06:10:08');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_has_permissions`
--

CREATE TABLE `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `role_has_permissions`
--

INSERT INTO `role_has_permissions` (`permission_id`, `role_id`) VALUES
(1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sections`
--

CREATE TABLE `sections` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `sections`
--

INSERT INTO `sections` (`id`, `page_id`, `name`, `created_at`, `updated_at`) VALUES
(1, 1, 'section_1', '2021-06-14 06:10:11', '2021-06-14 06:10:11'),
(2, 1, 'section_2', '2021-06-14 06:10:12', '2021-06-14 06:10:12'),
(3, 1, 'section_3', '2021-06-14 06:10:12', '2021-06-14 06:10:12'),
(4, 1, 'section_4', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(5, 2, 'section_1', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(6, 2, 'section_2', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(7, 2, 'section_3', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(8, 3, 'section_1', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(9, 4, 'section_1', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(10, 5, 'section_1', '2021-06-14 06:10:14', '2021-06-14 06:10:14'),
(11, 5, 'section_2', '2021-06-14 06:10:14', '2021-06-14 06:10:14');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'pablo', 'admin@admin.com', NULL, '$2y$10$2iXQzNCuKhLS6XRxiy.EHel0ikYh/ltBPmQsY5UEX/zZISbmsGnqO', NULL, '2021-06-14 06:10:08', '2021-06-14 06:10:08'),
(2, 'Genyerling', 'genyi@gmail.com', NULL, '$2y$10$QUNLkTMoptM9QCXKI4gxVuDVjC9reOHdMNlFLXRzvs84UcV9xWL92', NULL, '2021-06-14 17:53:29', '2021-06-14 17:53:29');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users_has_permissions`
--

CREATE TABLE `users_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user_has_roles`
--

CREATE TABLE `user_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `user_has_roles`
--

INSERT INTO `user_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\User', 1),
(2, 'App\\User', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `variable_products`
--

CREATE TABLE `variable_products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `product_id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `measure` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `packaging` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `extra` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Volcado de datos para la tabla `variable_products`
--

INSERT INTO `variable_products` (`id`, `product_id`, `code`, `measure`, `packaging`, `extra`, `created_at`, `updated_at`) VALUES
(10, 1, '01', '1mm', '1000 mts', NULL, '2021-06-15 16:16:51', '2021-06-15 16:16:51'),
(11, 1, '02', '2mm', '10mts', NULL, '2021-06-15 17:02:23', '2021-06-15 17:02:23'),
(13, 6, '001', '1mm', '1000 mts', NULL, '2021-06-15 17:41:07', '2021-06-15 17:41:07');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `colors`
--
ALTER TABLE `colors`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `color_product`
--
ALTER TABLE `color_product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `color_product_color_id_foreign` (`color_id`),
  ADD KEY `color_product_product_id_foreign` (`product_id`);

--
-- Indices de la tabla `companies`
--
ALTER TABLE `companies`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `contents`
--
ALTER TABLE `contents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `contents_section_id_foreign` (`section_id`);

--
-- Indices de la tabla `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`id`),
  ADD KEY `data_company_id_foreign` (`company_id`);

--
-- Indices de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_category_id_foreign` (`category_id`);

--
-- Indices de la tabla `product_picture`
--
ALTER TABLE `product_picture`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_picture_product_id_foreign` (`product_id`);

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
-- Indices de la tabla `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_page_id_foreign` (`page_id`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indices de la tabla `users_has_permissions`
--
ALTER TABLE `users_has_permissions`
  ADD PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  ADD KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  ADD KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`);

--
-- Indices de la tabla `variable_products`
--
ALTER TABLE `variable_products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `variable_products_product_id_foreign` (`product_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `colors`
--
ALTER TABLE `colors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `color_product`
--
ALTER TABLE `color_product`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT de la tabla `companies`
--
ALTER TABLE `companies`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `contents`
--
ALTER TABLE `contents`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `data`
--
ALTER TABLE `data`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=262;

--
-- AUTO_INCREMENT de la tabla `newsletters`
--
ALTER TABLE `newsletters`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `pages`
--
ALTER TABLE `pages`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `product_picture`
--
ALTER TABLE `product_picture`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `sections`
--
ALTER TABLE `sections`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `variable_products`
--
ALTER TABLE `variable_products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `color_product`
--
ALTER TABLE `color_product`
  ADD CONSTRAINT `color_product_color_id_foreign` FOREIGN KEY (`color_id`) REFERENCES `colors` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `color_product_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `contents`
--
ALTER TABLE `contents`
  ADD CONSTRAINT `contents_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `data`
--
ALTER TABLE `data`
  ADD CONSTRAINT `data_company_id_foreign` FOREIGN KEY (`company_id`) REFERENCES `companies` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `product_picture`
--
ALTER TABLE `product_picture`
  ADD CONSTRAINT `product_picture_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `role_has_permissions`
--
ALTER TABLE `role_has_permissions`
  ADD CONSTRAINT `role_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `role_has_permissions_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_page_id_foreign` FOREIGN KEY (`page_id`) REFERENCES `pages` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `users_has_permissions`
--
ALTER TABLE `users_has_permissions`
  ADD CONSTRAINT `users_has_permissions_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `user_has_roles`
--
ALTER TABLE `user_has_roles`
  ADD CONSTRAINT `user_has_roles_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE;

--
-- Filtros para la tabla `variable_products`
--
ALTER TABLE `variable_products`
  ADD CONSTRAINT `variable_products_product_id_foreign` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
