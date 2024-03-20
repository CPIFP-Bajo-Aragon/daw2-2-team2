-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Servidor: localhost:3306
-- Tiempo de generación: 17-03-2024 a las 22:01:43
-- Versión del servidor: 10.6.16-MariaDB-0ubuntu0.22.04.1
-- Versión de PHP: 8.1.2-1ubuntu2.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `mydb`
--
CREATE DATABASE IF NOT EXISTS `mydb` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `mydb`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `aviso`
--

DROP TABLE IF EXISTS `aviso`;
CREATE TABLE `aviso` (
  `id_aviso` int(11) NOT NULL,
  `titulo_aviso` varchar(255) NOT NULL,
  `contenido_aviso` varchar(255) NOT NULL,
  `fecha_creacion_aviso` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `chatear`
--

DROP TABLE IF EXISTS `chatear`;
CREATE TABLE `chatear` (
  `emisor` int(11) NOT NULL,
  `receptor` int(11) NOT NULL,
  `fecha_chat` timestamp NOT NULL DEFAULT current_timestamp(),
  `mensaje_chat` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `chatear`
--

INSERT INTO `chatear` (`emisor`, `receptor`, `fecha_chat`, `mensaje_chat`) VALUES
(1, 3, '2024-03-17 12:04:49', 'Hola! estaría muy interesado en la oferta!'),
(1, 3, '2024-03-17 17:19:41', 'muy bien. '),
(3, 1, '2024-03-17 17:22:07', 'Hola!');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

DROP TABLE IF EXISTS `documento`;
CREATE TABLE `documento` (
  `id_documento` int(11) NOT NULL,
  `nombre_documento` varchar(45) NOT NULL,
  `descripcion_documento` varchar(45) DEFAULT NULL,
  `tipo_documento` varchar(45) DEFAULT NULL,
  `fecha_subida` timestamp NULL DEFAULT current_timestamp(),
  `ruta_archivo` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id_documento`, `nombre_documento`, `descripcion_documento`, `tipo_documento`, `fecha_subida`, `ruta_archivo`, `id_usuario`) VALUES
(25, 'Proyecto', 'Profitech', 'application/pdf', '2024-03-15 09:06:59', '/srv/www/api/PawBnB/public/DocumentoUsuario/3_Blasco_Oscar_PROYECTO-1.pdf', 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `entidad`
--

DROP TABLE IF EXISTS `entidad`;
CREATE TABLE `entidad` (
  `id_entidad` int(11) NOT NULL,
  `nombre_entidad` varchar(100) NOT NULL,
  `cif_entidad` varchar(20) NOT NULL,
  `sector_entidad` varchar(50) DEFAULT NULL,
  `direccion_entidad` varchar(200) NOT NULL,
  `numero_telefono_entidad` varchar(15) NOT NULL,
  `correo_entidad` varchar(100) NOT NULL,
  `pagina_web_entidad` varchar(100) DEFAULT NULL,
  `activo` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `entidad`
--

INSERT INTO `entidad` (`id_entidad`, `nombre_entidad`, `cif_entidad`, `sector_entidad`, `direccion_entidad`, `numero_telefono_entidad`, `correo_entidad`, `pagina_web_entidad`, `activo`) VALUES
(1, 'Juan', '123456789A', '-as', '-dasd', '-asdasdas', 'asdasd@gmail.com', 'https://192.168.4.247/Otas/misOfertas', 1),
(23, '-', '-', '-', '-', '-', '-', '-', 1),
(24, 'PITER', '77752956F', 'Imprenta', 'Calle 1', '123123123', 'pITER@GMAIL.COM', 'http://www.piter.com', 1),
(25, 'Diego', '123456798', '-', '-', '-', 'diegolopes@gmail.com', 'http://192.168.4.246/Entidades', 1),
(26, 'Jose', '87654321x', '-', '-', '-', 'aaaaaaaaaaa@gmail.com', 'http://192.168.4.246/Entidades', 1),
(40, 'antonio', '67577710F', '-', '-', '-', '-', '-', 1),
(41, 'pol', '21745698l', '-', '-', '-', '-', '-', 1),
(42, 'francisco', '55181821G', '-', '-', '-', '-', '-', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estado`
--

DROP TABLE IF EXISTS `estado`;
CREATE TABLE `estado` (
  `id_estado` int(11) NOT NULL,
  `estado` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `estado`
--

INSERT INTO `estado` (`id_estado`, `estado`) VALUES
(1, 'Excelente'),
(3, 'Bueno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagen`
--

DROP TABLE IF EXISTS `imagen`;
CREATE TABLE `imagen` (
  `id_imagen` int(11) NOT NULL,
  `nombre_imagen` varchar(255) NOT NULL,
  `formato_imagen` varchar(45) NOT NULL,
  `ruta_imagen` varchar(255) NOT NULL,
  `descripcion_imagen` varchar(45) DEFAULT NULL,
  `id_inmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `imagen`
--

INSERT INTO `imagen` (`id_imagen`, `nombre_imagen`, `formato_imagen`, `ruta_imagen`, `descripcion_imagen`, `id_inmueble`) VALUES
(12, '72337591_11723815_foto_322350.jpg', 'image/jpeg', '/images/fotoinmueble/65cf218459c1a_72337591_11723815_foto_322350.jpg', NULL, 38),
(13, '50568073853_daf473e006_b.jpg', 'image/jpeg', '/images/fotoinmueble/65cf21845a3b7_50568073853_daf473e006_b.jpg', NULL, 38),
(14, 'imagesaS.jpeg', 'image/jpeg', '/images/fotoinmueble/65cf21845a85f_imagesaS.jpeg', NULL, 38),
(15, 'img1.jpeg', 'image/jpeg', '/images/fotoinmueble/65cf23865ae56_img1.jpeg', NULL, 39),
(16, 'img2.jpeg', 'image/jpeg', '/images/fotoinmueble/65cf23865af35_img2.jpeg', NULL, 39),
(17, 'img3.jpeg', 'image/jpeg', '/images/fotoinmueble/65cf23865af89_img3.jpeg', NULL, 39),
(18, '50568073853_daf473e006_b.jpg', 'image/jpeg', '/images/fotoinmueble/65cf5a9d6d4bb_50568073853_daf473e006_b.jpg', NULL, 41),
(19, 'alcorisa.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/42/65d32c194ce08_alcorisa.jpeg', NULL, 42),
(20, 'alcorisa1.jpg', 'image/jpeg', '/images/fotoinmueble/123456789A/42/65d32c194ce39_alcorisa1.jpg', NULL, 42),
(21, 'ineterior-casa-armand1.jpg', 'image/jpeg', '/images/fotoinmueble/123456789A/45/65d461cc9e8c5_ineterior-casa-armand1.jpg', NULL, 45),
(22, 'images.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/45/65d461cc9ea75_images.jpeg', NULL, 45),
(23, 'images2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/45/65d461cc9eaa3_images2.jpeg', NULL, 45),
(24, 'ico_10133.jpg', 'image/jpeg', '/images/fotoinmueble/26278104Y/46/65d46360f2c75_ico_10133.jpg', NULL, 46),
(25, 'Sin título.jpeg', 'image/jpeg', '/images/fotoinmueble/123456798/47/65d4675ed9526_Sin título.jpeg', NULL, 47),
(26, 'Sin título1.jpeg', 'image/jpeg', '/images/fotoinmueble/123456798/47/65d4675ed955d_Sin título1.jpeg', NULL, 47),
(27, 'images1.jpeg', 'image/jpeg', '/images/fotoinmueble/123456798/47/65d4675ed9580_images1.jpeg', NULL, 47),
(28, 'images12.jpeg', 'image/jpeg', '/images/fotoinmueble/123456798/47/65d4675ed95a1_images12.jpeg', NULL, 47),
(29, 'casa1.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/48/65d5d6fe3470e_casa1.jpeg', NULL, 48),
(30, 'casa2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/48/65d5d6fe34742_casa2.jpeg', NULL, 48),
(31, 'Captura desde 2024-02-20 11-41-43.png', 'image/png', '/images/fotoinmueble/123456789A/49/65d5d83199c58_Captura desde 2024-02-20 11-41-43.png', NULL, 49),
(32, 'alcorisa.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/50/65d5d973bf530_alcorisa.jpeg', NULL, 50),
(33, 'casa1.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/50/65d5d973bf580_casa1.jpeg', NULL, 50),
(34, 'casa2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/50/65d5d973bf5aa_casa2.jpeg', NULL, 50),
(35, 'Sin título1.jpeg', 'image/jpeg', '/images/fotoinmueble/87654321x/51/65d5d977d2957_Sin título1.jpeg', NULL, 51),
(36, 'Sin título.jpeg', 'image/jpeg', '/images/fotoinmueble/77752956F/52/65d5d9d64cbc0_Sin título.jpeg', NULL, 52),
(37, 'casa1.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/53/65d5da6156bc6_casa1.jpeg', NULL, 53),
(38, 'casa2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/53/65d5da6156bf8_casa2.jpeg', NULL, 53),
(39, 'alcorisa.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/53/65d5da6156c1c_alcorisa.jpeg', NULL, 53),
(40, 'Sin título1.jpeg', 'image/jpeg', '/images/fotoinmueble/77752956F/54/65d5db8838056_Sin título1.jpeg', NULL, 54),
(41, 'images1.jpeg', 'image/jpeg', '/images/fotoinmueble/77752956F/55/65d5dbeba0f6f_images1.jpeg', NULL, 55),
(42, 'upload.jpg', 'image/jpeg', '/images/fotoinmueble/123456789A/60/65d62d49c8780_upload.jpg', NULL, 60),
(43, 'images12.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/61/65d62e6a08507_images12.jpeg', NULL, 61),
(44, 'upload.jpg', 'image/jpeg', '/images/fotoinmueble/123456789A/61/65d62e6a08af5_upload.jpg', NULL, 61),
(45, 'cafeteria1.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/62/65d72a3f247da_cafeteria1.jpeg', NULL, 62),
(46, 'cafeteria2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/62/65d72a3f24c4c_cafeteria2.jpeg', NULL, 62),
(47, 'Sin título.jpeg', 'image/jpeg', '/images/fotoinmueble/77752956F/66/65dcc99310964_Sin título.jpeg', NULL, 66),
(48, 'Captura desde 2024-02-23 14-05-06.png', 'image/png', '/images/fotoinmueble/987654321B/67/65dcc9ee4f255_Captura desde 2024-02-23 14-05-06.png', NULL, 67),
(49, 'Captura desde 2024-02-23 13-56-33.png', 'image/png', '/images/fotoinmueble/987654321B/68/65dccf84d2277_Captura desde 2024-02-23 13-56-33.png', NULL, 68),
(50, 'Captura desde 2024-02-23 14-05-06.png', 'image/png', '/images/fotoinmueble/987654321B/69/65dccfb86b1e9_Captura desde 2024-02-23 14-05-06.png', NULL, 69),
(51, 'Captura desde 2024-02-23 13-56-33.png', 'image/png', '/images/fotoinmueble/987654321B/70/65dcd004ad169_Captura desde 2024-02-23 13-56-33.png', NULL, 70),
(52, 'Captura desde 2024-02-23 13-56-33.png', 'image/png', '/images/fotoinmueble/987654321B/71/65dcd4938fdf5_Captura desde 2024-02-23 13-56-33.png', NULL, 71),
(53, 'Captura desde 2024-02-23 14-01-38.png', 'image/png', '/images/fotoinmueble/987654321B/72/65dcd4ed18380_Captura desde 2024-02-23 14-01-38.png', NULL, 72),
(54, 'Captura desde 2024-02-23 13-55-41.png', 'image/png', '/images/fotoinmueble/987654321B/73/65dcd50f3cac6_Captura desde 2024-02-23 13-55-41.png', NULL, 73),
(55, 'Captura desde 2024-02-23 13-55-41.png', 'image/png', '/images/fotoinmueble/123456789A/74/65dda89fb867a_Captura desde 2024-02-23 13-55-41.png', NULL, 74),
(56, 'Captura desde 2024-02-23 13-55-41.png', 'image/png', '/images/fotoinmueble/123456789A/75/65ddb46d76b16_Captura desde 2024-02-23 13-55-41.png', NULL, 75),
(57, 'Captura desde 2024-02-23 14-06-21.png', 'image/png', '/images/fotoinmueble/123456789A/76/65ddb49eb84cb_Captura desde 2024-02-23 14-06-21.png', NULL, 76),
(58, 'Captura desde 2024-02-23 13-55-41.png', 'image/png', '/images/fotoinmueble/123456789A/77/65ddb9a52a7eb_Captura desde 2024-02-23 13-55-41.png', NULL, 77),
(59, 'vivaperu.png', 'image/png', '/images/fotoinmueble/123456789A/78/65e5ae72c1c01_vivaperu.png', NULL, 78),
(60, 'bar.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/79/65e6db556a2fd_bar.jpeg', NULL, 79),
(61, 'bar2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/79/65e6db556c32a_bar2.jpeg', NULL, 79),
(62, 'gym.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/80/65e6dcbfd47e0_gym.jpeg', NULL, 80),
(63, 'gim2.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/80/65e6dcbfd4955_gim2.jpeg', NULL, 80),
(64, '945d9f0cd2467ea181022e887afef103.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/81/65e6dd88b7800_945d9f0cd2467ea181022e887afef103.jpg', NULL, 81),
(65, '945d9f0cd2467ea181022e887afef103.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/82/65e6ddbcdfa05_945d9f0cd2467ea181022e887afef103.jpg', NULL, 82),
(66, 'depositphotos_7588755-stock-photo-ugly-house.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/82/65e6ddbcdfd19_depositphotos_7588755-stock-photo-ugly-house.jpg', NULL, 82),
(67, 'istockphoto-497153006-612x612.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/82/65e6ddbce002b_istockphoto-497153006-612x612.jpg', NULL, 82),
(68, 'paco_img166122t0.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/83/65e6e02d3849d_paco_img166122t0.jpg', NULL, 83),
(69, 'bar-paco.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/83/65e6e02d389e5_bar-paco.jpg', NULL, 83),
(70, 'photo2jpg.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/83/65e6e02d38d64_photo2jpg.jpg', NULL, 83),
(71, 'C9EBh5ZWAAEcSGx.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/83/65e6e02d3910e_C9EBh5ZWAAEcSGx.jpg', NULL, 83),
(72, 'gym.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/84/65e6e56474b80_gym.jpeg', NULL, 84),
(73, 'bar.jpeg', 'image/jpeg', '/images/fotoinmueble/123456789A/85/65e6e5eeef285_bar.jpeg', NULL, 85),
(74, 'local-alquiler.jpg', 'image/jpeg', '/images/fotoinmueble/67577710F/86/65e6f76639248_local-alquiler.jpg', NULL, 86),
(75, 'imgCasa.jpg', 'image/jpeg', '/images/fotoinmueble/21745698l/87/65e71f842ce1b_imgCasa.jpg', NULL, 87),
(76, 'Objetivo-xs.png', 'image/png', '/images/fotoinmueble/21745698l/88/65e82a7b1f187_Objetivo-xs.png', NULL, 88),
(77, 'maxresdefault.jpg', 'image/jpeg', '/images/fotoinmueble/55181821G/89/65f40c4fd323d_maxresdefault.jpg', NULL, 89),
(78, '1_4.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/91/65f6d9ffafbe7_1_4.jpg', NULL, 91),
(79, '1_3.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/91/65f6d9ffafbfc_1_3.jpg', NULL, 91),
(80, '1_2.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/91/65f6d9ffafc04_1_2.jpg', NULL, 91),
(81, '1_1.jpg', 'image/jpeg', '/images/fotoinmueble/77752956F/91/65f6d9ffafc0c_1_1.jpg', NULL, 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `inmueble`
--

DROP TABLE IF EXISTS `inmueble`;
CREATE TABLE `inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `metros_cuadrados_inmueble` varchar(255) DEFAULT NULL,
  `descripcion_inmueble` varchar(255) DEFAULT NULL,
  `distribucion_inmueble` varchar(255) DEFAULT NULL,
  `precio_inmueble` int(11) DEFAULT NULL,
  `direccion_inmueble` varchar(255) DEFAULT NULL,
  `caracteristicas_inmueble` varchar(255) DEFAULT NULL,
  `equipamiento_inmueble` varchar(255) DEFAULT NULL,
  `latitud_inmueble` varchar(255) DEFAULT NULL,
  `longitud_inmueble` varchar(255) DEFAULT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_estado` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `inmueble`
--

INSERT INTO `inmueble` (`id_inmueble`, `metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`, `precio_inmueble`, `direccion_inmueble`, `caracteristicas_inmueble`, `equipamiento_inmueble`, `latitud_inmueble`, `longitud_inmueble`, `id_municipio`, `id_estado`) VALUES
(1, '120', 'Amplio apartamenteo con buenas vistas al mar', '3 habitaciones, 2 baños, cocina, sala-comedor.', 250000, 'Calle Principal 123, Ciudad Costera', 'Vista al mar, balcon, parqueo privado', 'Amueblado, air acondicionado', '10.123456', '-70.987654', 1, 1),
(7, '234', 'asdf', 'asdf', 2234, 'asdf', 'asdf', 'asd', NULL, NULL, 21, 1),
(8, '132', '-', '-', 2345, '-', '-', '-', NULL, NULL, 21, 1),
(9, '132', '-', '-', 2345, '-', '-', '-', NULL, NULL, 21, 1),
(23, '50000', 'a', 'a', 50000, 'a', 'a', 'a', NULL, NULL, 22, 1),
(24, '200', 'asddsa', 'asd', 50000, 'sadsa', 'asddsa', 'asd', NULL, NULL, 20, 1),
(25, '198', 'wqewqewqeweq', 'wqwqeewq', 200000, 'asdsadasd', 'asdasdsad', 'qewwqeeqw', NULL, NULL, 22, 1),
(26, '200', 'sdadasdsa', 'asdsa', 1234, 'sdadsa', 'saddsadsa', 'asdadsdas', NULL, NULL, 20, 1),
(27, '222', 'asddsa', 'asddsa', 1234, 'asddsa', 'adsdsadsa', 'saddsa', NULL, NULL, 20, 1),
(28, '11', 'asdsad', 'asddsa', 111, 'asdasd', 'sadsad', 'dsasad', NULL, NULL, 23, 1),
(29, '222', 'adsdas', 'sadds', 1232, 'asdasd', 'adsdas', 'sdasda', NULL, NULL, 14, 3),
(30, '22', 'dsa', 'ad', 223, 'asd', 'asd', 'sad', NULL, NULL, 21, 1),
(31, '22', 'sdadas', 'saddas', 33, 'asddsa', 'dsadas', 'asddsa', NULL, NULL, 22, 1),
(32, '222', 'dasads', 'sadsa', 1234, 'asdds', 'sadsda', 'dasdsa', NULL, NULL, 22, 1),
(33, '22', 'asd', 'sddsa', 22, 'asd', 'sad', 'asddsa', NULL, NULL, 22, 1),
(34, '22', 'asd', 'sddsa', 22, 'asd', 'sad', 'asddsa', NULL, NULL, 22, 1),
(35, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 23, 1),
(36, '123', 'dsa', 'ads', 210, 'sda', 'das', 'ads', NULL, NULL, 21, 1),
(37, '138', 'Amplio apartamento con vista a la plaza de españa', 'Tres baños, cuatro habitaciones, cocina y comedor', 500, 'Av. Zaragoza Nº36', 'Cocina recien reformada', 'Aire acondicionado y amueblado', NULL, NULL, 1, 1),
(38, '22', 'asddas', 'asd', 231, 'sad', 'dsaads', 'asd', NULL, NULL, 20, 1),
(39, '150', 'La mejor casa de Alcañiz', 'Tres baños, cuatro habitaciones, cocina y comedor', 500, 'Av. Zaragoza Nº36', 'Cocina reformado', 'Aire acondicionado y amueblado', NULL, NULL, 1, 3),
(40, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 20, 1),
(41, '280', 'casa muy bien cuidada en valdealgorfa', '3 habitaciones', 500, 'calle valderrobles nº 33', 'casa muy bien cuidada en valdealgorfa', 'aire acondicionado', NULL, NULL, 23, 1),
(42, '265', 'aire acondicionado amueblado', '3 habitaciones 1 baño cocina', 400, 'avenida alcorisa n5 1a', 'aire acondicionado amueblado', 'aire acondicionado amueblado', NULL, NULL, 3, 3),
(43, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 4, 1),
(44, '90', 'Inmueble en excelentes condiciones en el centro de Alcañiz con todo a menos de 10 minutos caminando.', 'Cocina-comedor, dos baños, cuatro habitaciones', 450, 'Calle Alejandre Nº5', 'Inmueble reformado hace tres años, y situado en el centro de alcañiz', 'Amueblado y con aire acondicionado', NULL, NULL, 1, 1),
(45, '70', 'Alquiler en el centro de Alcañiz, en muy buen estado.', 'Cocina-comedor, tres habitaciones, dos baños', 500, 'Calle Alejandre Nº5', 'Amueblado, con aire acondicionado', 'Amueblado con vajilla recién comprada.', NULL, NULL, 1, 3),
(46, '120', 'Este luminoso apartamento ofrece una distribución práctica con dos amplios dormitorios, un moderno baño y una cocina abierta totalmente equipada que se integra perfectamente con la acogedora sala de estar.', '2 habitaciones, 1 baño, cocina y comedor', 600, 'camino rural nº5', 'Cocina amueblada con electrodomésticos modernos.\r\nArmarios empotrados en los dormitorios para un amplio espacio de almacenamiento.\r\nAire acondicionado para mayor comodidad durante todo el año.', 'internet incluido', NULL, NULL, 23, 3),
(47, '320', 'Amplia casa con buenas vistas en el centro de Alcorisa, a 10 minutos caminando de todo', 'Cuatro habitaciones, tres baños, comedor, cocina', 550, 'Av. Zaragoza Nº36', 'Muebles del comedor recién cambiados.', 'Amueblado y con aire acondicionado recientemente puesto.', NULL, NULL, 3, 3),
(48, '252', 'Este encantador apartamento cuenta con una distribución funcional y acabados de alta calidad. La cocina abierta fluye elegantemente hacia la sala de estar, creando un espacio perfecto para el entretenimiento.', '2 dormitorios, 1 baño, cocina abierta, sala de estar, comedor.', 180000, 'Calle Principal 123, Ciudad, País', 'Ubicación céntrica, cercano a transporte público, tiendas y restaurantes. Acabados modernos, luminoso y espacioso.', 'Cocina equipada con electrodomésticos modernos, armarios empotrados, aire acondicionado, calefacción central.', NULL, NULL, 16, 1),
(49, '1', 'a', 'a', 1, 'ads', 'a', 'a', NULL, NULL, 19, 1),
(50, '245', 'Encantador apartamento recientemente renovado ubicado en el centro de la ciudad. Ideal para aquellos que buscan comodidad y conveniencia en una ubicación central.', '2 dormitorios, 1 baño, cocina abierta, sala de estar, comedor.', 144999, 'Calle Principal 123, Ciudad, País', 'Encantador apartamento recientemente renovado ubicado en el centro de la ciudad. Ideal para aquellos que buscan comodidad y conveniencia en una ubicación central.', 'Cocina equipada con electrodomésticos modernos, armarios empotrados, aire acondicionado, calefacción central.', NULL, NULL, 13, 1),
(51, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 14, 1),
(52, '2', 'a', 'a', 2, 'a', 'a', 'a', NULL, NULL, 18, 1),
(53, '75', 'Este apartamento ofrece un diseño moderno y funcional con espacios bien iluminados y acabados de alta calidad', '2 dormitorios, 1 baño, cocina abierta, sala de estar, comedor.', 180000, 'Calle Principal 123, Ciudad, País', 'Excelente ubicación céntrica, cerca de transporte público, tiendas y restaurantes.', 'Cocina equipada con electrodomésticos modernos, armarios empotrados, aire acondicionado, calefacción central.', NULL, NULL, 8, 3),
(54, '1', 'b', 'b', 1, 'b', 'b', 'b', NULL, NULL, 13, 1),
(55, '1', 'c', 'c', 1, 'c', 'c', 'c', NULL, NULL, 21, 1),
(56, '120', 'Este apartamento combina elegancia y comodidad, con espacios luminosos y una distribución funcional. <br />\nEl balcón ofrece vistas panorámicas de la ciudad', '3 dormitorios, 2 baños, cocina americana, amplio salón, balcón', 400000, 'Calle Principal 123, Ciudad, País', 'Ubicación céntrica, acabados de alta calidad, seguridad 24/7, estacionamiento subterráneo.', 'Cocina de diseño italiano, electrodomésticos de alta gama, suelos de mármol, sistema de domótica.', NULL, NULL, 17, 1),
(57, '321', 'sa', 'as', 213, 'a', 'a', 'sa', NULL, NULL, 3, 3),
(58, '1', 'a', 'a', 1, 'adsa', 'a', 'a', NULL, NULL, 4, 1),
(59, '1', 'b', 'b', 1, 'b', 'b', 'b', NULL, NULL, 16, 1),
(60, '1', 'z', 'z', 1, 'z', 'z', 'z', NULL, NULL, 20, 1),
(61, '1', 'c', 'c', 1, 'c', 'c', 'c', NULL, NULL, 21, 1),
(62, '80', 'Local comercial de 80m² con diseño moderno y luminoso.', 'Zona de bar, área de cocina, dos baños y espacio para mesas.', 1200, 'Calle Principal, 123, Ciudad XYZ.', 'Aire acondicionado, sistema de sonido ambiente, mobiliario nuevo.', 'Maquinaria de cafetería (cafetera, molinillo, nevera, etc.), mobiliario de sala y cocina.', NULL, NULL, 1, 1),
(63, '2', 'a', 'a', 2, 'Av. Zaragoza Nº36', 'a', 'a', NULL, NULL, 18, 1),
(64, '2', 'a', 'a', 2, 'Av. Zaragoza Nº36', 'a', 'a', NULL, NULL, 18, 1),
(65, '2332', '123', '3', 123, '23', '23', '1231', NULL, NULL, 20, 1),
(66, '2332', '123', '3', 123, '23', '23', '1231', NULL, NULL, 20, 1),
(67, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 23, 1),
(68, '1', 'a', 'a', 1, 'Av. Zaragoza Nº36', 'a', 'a', NULL, NULL, 19, 1),
(69, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 21, 3),
(70, '1', 'a', 'a', 1, 'adsa', 'a', 'a', NULL, NULL, 19, 1),
(71, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 22, 1),
(72, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 16, 1),
(73, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 20, 1),
(74, '1', 'a', 'a', 1, 'adsaa', 'a', 'a', NULL, NULL, 3, 1),
(75, '1', 'a', 'a', 1, 'ads', 'a', 'a', NULL, NULL, 21, 1),
(76, '1', 'a', 'a', 1, 'ads', 'a', 'a', NULL, NULL, 21, 1),
(77, '1', 'aaaaaaaa', 'aaaaaaaaa', 1, 'a', 'a', 'a', NULL, NULL, 19, 1),
(78, '40', 'me obligan a ponerlo, un saludo mis queridos internautas', '2habitaciones, 3 camas, 1baño', 82, 'c/milpalos nº24', 'recien amueblado', 'totalmente equipado', NULL, NULL, 9, 3),
(79, '200', 'Local espacioso con cocina industrial y área de comedor elegante.', 'Cocina, área de comedor, baños para clientes y personal.', 2500, 'Avenida Principal, 456, Ciudad ABC.', 'Aire acondicionado, sistema de sonido ambiente.', 'Mobiliario de restaurante, utensilios de cocina, vajilla.', NULL, NULL, 18, 1),
(80, '300', 'Espacio amplio con áreas de entrenamiento y clases.', 'Zonas de pesas, cardio, estudio de yoga, vestuarios.', 4000, 'Calle Deportista, 789', 'Ventanas grandes para la entrada de luz natural, suelos de madera laminada.', 'Máquinas de última generación, material de entrenamiento, vestuarios equipados.', NULL, NULL, 1, 1),
(81, '500', 'Casa del año 2024 nueva a estrenar se el primero en catarla', 'Muebles nuevos diseñados por una diseñadora francesa', 450000, 'Calle Principal 123', 'Madera de roble artesano realizado por enanos del ecuador sacados de la fabrica de willy wonka.', 'Todo el equipamiento que se te pueda ocurrir lista para vivir', NULL, NULL, 7, 1),
(82, '500', 'Casa del año 2024 nueva a estrenar se el primero en catarla', 'Muebles nuevos diseñados por una diseñadora francesa', 450000, 'Calle Principal 123', 'Madera de roble artesano realizado por enanos del ecuador sacados de la fabrica de willy wonka.', 'Todo el equipamiento que se te pueda ocurrir lista para vivir', NULL, NULL, 7, 1),
(83, '124', 'Local comercial de 120m² con cocina totalmente equipada, área de comedor, bar y zona de terraza al aire libre.', 'Cocina, área de comedor, bar, baños, zona de terraza.', 250000, 'Calle Principal 12', 'Aire acondicionado, sistema de ventilación, sistema de alarma.', 'Mobiliario de restaurante, equipos de cocina, sistema de sonido.', NULL, NULL, 18, 1),
(84, '1', 'a', 'a', 1, 'a', 'a', 'a', NULL, NULL, 21, 3),
(85, '1', 'a', 'a', 1, 'Av. Zaragoza Nº36a', 'a', 'a', NULL, NULL, 21, 1),
(86, '90', 'aadsf', '4 habitaciones', 60, 'ads', 'adsfadfad', 'electrodomesticos', NULL, NULL, 1, 1),
(87, '5646546546464', 'sdvds', 'sdvsdv', 987, 'sdvsdv', 'sdv', 'sdvsvsd', NULL, NULL, 22, 3),
(88, '654', '<div class=\"bg-dark\">a</div><div class=\"bg-dark\">a</div><div class=\"bg-dark\">a</div>', '<div <div class=\"bg-dark\">a</div>', 54, '<div class=\"bg-dark\">a</div><div class=\"bg-dark\">a</div><div class=\"bg-dark\">a</div>', '<div cla<div class=\"bg-dark\">a</div>-2\"><br />\r\n                        <div <div class=\"bg-dark\">a</div>', '<div class=\"bg-dark\">a</div>', NULL, NULL, 21, 3),
(89, '12', 'a', 'a,m.', 12, 'a', 'a', 'a', NULL, NULL, 1, 1),
(90, '200', 'Encantadora casa de estilo colonial con techos altos y suelos de madera. Totalmente renovada con acabados de alta calidad.', 'Planta baja con salón, comedor, cocina y patio. Primera planta con 3 habitaciones y 2 baños.', 250001, 'Calle Real, 123', 'Patio interior, terraza en la azotea con vistas panorámicas, chimenea en el salón.', 'Cocina equipada con electrodomésticos modernos. Aire acondicionado en todas las habitaciones.', NULL, NULL, 3, 1),
(91, '200', 'Encantadora casa de estilo colonial con techos altos y suelos de madera. Totalmente renovada con acabados de alta calidad.', 'Planta baja con salón, comedor, cocina y patio. Primera planta con 3 habitaciones y 2 baños.', 250001, 'Calle Real, 123', 'Patio interior, terraza en la azotea con vistas panorámicas, chimenea en el salón.', 'Cocina equipada con electrodomésticos modernos. Aire acondicionado en todas las habitaciones.', NULL, NULL, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `local`
--

DROP TABLE IF EXISTS `local`;
CREATE TABLE `local` (
  `id_local` int(11) NOT NULL,
  `nombre_local` varchar(45) DEFAULT NULL,
  `capacidad_local` varchar(200) DEFAULT NULL,
  `recursos_local` varchar(200) DEFAULT NULL,
  `id_inmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `local`
--

INSERT INTO `local` (`id_local`, `nombre_local`, `capacidad_local`, `recursos_local`, `id_inmueble`) VALUES
(1, '', '', '', 37),
(2, '', '', '', 38),
(3, '', '', '', 39),
(4, 'a', '1', 'a', 40),
(5, '', '', '', 41),
(6, '', '', '', 42),
(7, 'a', '1', 'a', 43),
(8, '', '', '', 44),
(9, '', '', '', 45),
(10, '', '', '', 46),
(11, '', '', '', 47),
(12, '', '', '', 48),
(13, 'a', '1', 'a', 49),
(14, 'a', '1', 'a', 51),
(15, 'a', '1', 'a', 52),
(16, 'Café del Mar', '50 personas', 'Cocina completamente equipada\r\nMobiliario moderno y confortable\r\nSistema de sonido integrado', 53),
(17, 'b', '1', 'b', 54),
(18, 'c', '1', 'c', 55),
(19, 'dsa', '25', 'asd', 56),
(20, 'a', 'a', 'a', 57),
(21, 'a', '1', 'a', 58),
(22, 'b', '1', 'b', 59),
(23, 'z', '1', 'z', 60),
(24, 'c', '1', 'c', 61),
(25, 'Cafetería El Aroma', 'Aforo para 30 personas.', 'Licencia de actividad en vigor, contrato de alquiler renovable.', 62),
(26, 'a', '1', 'a', 63),
(27, 'a', '1', 'a', 64),
(28, '23', '23', '23', 65),
(29, '23', '23', '23', 66),
(30, 'a', '1', 'a', 67),
(31, 'a', '1', 'a', 68),
(32, 'a', '1', 'a', 69),
(33, 'a', '1', 'a', 70),
(34, 'a', '1', 'a', 71),
(35, 'a', '1', 'a', 72),
(36, 'a', '1', 'a', 73),
(37, 'a', '1', 'a', 74),
(38, 'a', '1', 'a', 75),
(39, 'a', '1', 'a', 76),
(40, 'a', '1', 'a', 77),
(41, '', '', '', 78),
(42, '\"Bar El Encuentro\"', '30 personas', 'Barra completamente equipada, mobiliario moderno, licencia de bar en regla.', 79),
(43, '\"Gimnasio FitLife\"', '230 personas', 'Vestuarios', 80),
(44, '', '', '', 82),
(45, 'Sabor Urbano', '50', 'Máquina de café profesional, horno industrial, sistema de sonido, mesas y sillas de diseño moderno, sistema de iluminación LED.', 83),
(46, 'a', '1', 'a', 84),
(47, 'a', '1', 'a', 85),
(48, '', '', '', 86),
(49, 'ajajaja', 'sdadasd', 'asdadad', 87),
(50, '<div class=\"bg-dark\">a</div>', '<div class=\"bg-dark\">a</div>', '<<div class=\"bg-dark\">a</div>', 88),
(51, '', 's', 's', 89),
(52, '', '', '', 90),
(53, '', '', '', 91);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `municipio`
--

DROP TABLE IF EXISTS `municipio`;
CREATE TABLE `municipio` (
  `id_municipio` int(11) NOT NULL,
  `nombre_municipio` varchar(50) NOT NULL,
  `provincia_municipio` varchar(50) NOT NULL,
  `codigo_postal_municipio` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `municipio`
--

INSERT INTO `municipio` (`id_municipio`, `nombre_municipio`, `provincia_municipio`, `codigo_postal_municipio`) VALUES
(1, 'Alcañiz', 'Teruel', '44600'),
(3, 'Alcorisa', 'Teruel', '44550'),
(4, 'Aguaviva', 'Teruel', '44001'),
(7, 'Belmonte de San José', 'Teruel', '44004'),
(8, 'Berge', 'Teruel', '44005'),
(9, 'Calanda', 'Teruel', '44006'),
(10, 'La Cañada de Verich', 'Teruel', '44007'),
(11, 'Castelserás', 'Teruel', '44008'),
(12, 'La Cerollera', 'Teruel', '44009'),
(13, 'La Codoñera', 'Teruel', '44010'),
(14, 'Foz-Calanda', 'Teruel', '44011'),
(15, 'La Ginebrosa', 'Teruel', '44012'),
(16, 'Mas de las Matas', 'Teruel', '44013'),
(17, 'La Mata de los Olmos', 'Teruel', '44014'),
(18, 'Los Olmos', 'Teruel', '44015'),
(19, 'Las Parras de Castellote', 'Teruel', '44016'),
(20, 'Seno', 'Teruel', '44017'),
(21, 'Torrecilla de Alcañiz', 'Teruel', '44018'),
(22, 'Torrevelilla', 'Teruel', '44019'),
(23, 'Valdealgorfa', 'Teruel', '44020');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `negocio`
--

DROP TABLE IF EXISTS `negocio`;
CREATE TABLE `negocio` (
  `id_negocio` int(11) NOT NULL,
  `titulo_negocio` varchar(255) NOT NULL,
  `motivo_traspaso_negocio` varchar(255) DEFAULT NULL,
  `coste_traspaso_negocio` int(11) DEFAULT NULL,
  `coste_mensual_negocio` int(11) DEFAULT NULL,
  `descripcion_negocio` varchar(250) DEFAULT NULL,
  `capital_minimo_negocio` int(11) DEFAULT NULL,
  `local_id_inmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `negocio`
--

INSERT INTO `negocio` (`id_negocio`, `titulo_negocio`, `motivo_traspaso_negocio`, `coste_traspaso_negocio`, `coste_mensual_negocio`, `descripcion_negocio`, `capital_minimo_negocio`, `local_id_inmueble`) VALUES
(1, 'a', 'a', 1, 1, 'a', 1, 21),
(2, 'b', 'b', 1, 1, 'b', 1, 22),
(3, 'z', 'z', 1, 1, 'z', 1, 23),
(4, 'c', 'c', 1, 1, 'c', 1, 24),
(5, 'Cafetería El Aroma', 'Mudanza del propietario a otro país.', 25000, 2500, 'Cafetería con clientela fija, ambiente acogedor y buena reputación en la zona. Ofrece una variedad de cafés, tés y bocadillos. Cuenta con licencia de restauración y todos los permisos en regla.', 10000, 25),
(6, '123', '123', 123, 123, '123', 123, 28),
(7, '123', '123', 123, 123, '123', 123, 29),
(8, 'a', 'a', 1, 1, 'a', 1, 33),
(9, 'a', 'a', 1, 1, 'a', 1, 34),
(10, 'a', 'a', 1, 1, 'a', 1, 35),
(11, 'a', 'a', 1, 1, 'a', 1, 36),
(12, '\"Restaurante La Delicia\"', 'Cambio de residencia del propietario.', 50000, 5000, 'Restaurante bien establecido con clientela regular y excelente reputación culinaria.', 100000, 42),
(13, '\"Gimnasio FitLife\"', 'Enfoque en otros proyectos.', 60000, 7000, 'Gimnasio totalmente equipado con una sólida base de clientes y programas de fitness exitosos.', 120000, 43),
(14, 'Café y Restaurante \"Sabor Urbano\"', 'Mudanza del propietario a otra ciudad.', 45000, 3000, '\"Sabor Urbano\" es un café y restaurante acogedor que ofrece una variedad de platos caseros y bebidas gourmet. Con una decoración moderna y un ambiente agradable, es un lugar popular tanto para almuerzos de negocios como para reuniones sociales.', 20000, 45),
(15, 'a', 'a', 1, 1, 'a', 1, 47);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

DROP TABLE IF EXISTS `noticia`;
CREATE TABLE `noticia` (
  `id_noticia` int(11) NOT NULL,
  `titulo_noticia` varchar(45) NOT NULL,
  `fecha_publicacion_noticia` timestamp NULL DEFAULT NULL,
  `contenido_noticia` varchar(255) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `notificacion`
--

DROP TABLE IF EXISTS `notificacion`;
CREATE TABLE `notificacion` (
  `id_notificacion` int(11) NOT NULL,
  `leida_notificacion` tinyint(1) DEFAULT 0,
  `contenido_notificacion` varchar(250) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `titulo_notificacion` varchar(255) DEFAULT NULL,
  `fecha_leido` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `notificacion`
--

INSERT INTO `notificacion` (`id_notificacion`, `leida_notificacion`, `contenido_notificacion`, `id_usuario`, `titulo_notificacion`, `fecha_leido`) VALUES
(306, 0, '¡Ha subido un anuncio de alquiler!', 3, 'Anuncio alquiler', NULL),
(307, 0, '¡Ha subido un anuncio de alquiler!', 3, 'Anuncio alquiler', NULL),
(308, 0, 'Nuevo mensaje de Juan Pérez, a las 17/03/24 13:04:49', 3, 'Nuevo mensaje', NULL),
(309, 0, 'Nuevo mensaje de Juan Pérez, a las 17/03/24 18:19:41', 3, 'Nuevo mensaje', NULL),
(310, 1, 'Nuevo mensaje de Óscar Blasco Armengod, a las 17/03/24 18:22:07', 1, 'Nuevo mensaje', '2024-03-17 17:23:50'),
(311, 1, '¡Ha realizado la reserva de un traspaso!', 1, 'Reserva traspaso', '2024-03-17 17:28:47'),
(312, 1, '¡Ha realizado la reserva de un traspaso!', 1, 'Reserva traspaso', '2024-03-17 17:28:46');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta`
--

DROP TABLE IF EXISTS `oferta`;
CREATE TABLE `oferta` (
  `id_oferta` int(11) NOT NULL,
  `titulo_oferta` varchar(255) DEFAULT NULL,
  `fecha_inicio_oferta` date DEFAULT NULL,
  `fecha_fin_oferta` date DEFAULT NULL,
  `condiciones_oferta` varchar(255) NOT NULL,
  `descripcion_oferta` varchar(255) DEFAULT NULL,
  `fecha_publicacion_oferta` date DEFAULT current_timestamp(),
  `id_entidad` int(11) NOT NULL,
  `id_negocio` int(11) DEFAULT NULL,
  `activo` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `oferta`
--

INSERT INTO `oferta` (`id_oferta`, `titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `descripcion_oferta`, `fecha_publicacion_oferta`, `id_entidad`, `id_negocio`, `activo`) VALUES
(1, 'Oferta de Apartamento con Vista al Mar', '2024-02-01', '2024-02-28', 'Aplican condiciones', '¡Aprovecha esta increíble oferta en nuestro apartamento con vista al mar!', '2024-01-25', 1, NULL, 0),
(13, 'asdf', '2024-02-12', '2024-02-20', 'asdf', 'asd', '2024-02-12', 1, NULL, 0),
(14, 'Prueba', '2024-02-12', '2024-03-08', '-', '-', '2024-02-12', 1, NULL, 1),
(15, 'Prueba', '2024-02-12', '2024-03-08', '-', '-', '2024-02-12', 1, NULL, 0),
(22, 'Casa', '2024-02-14', '2024-02-21', 'a', 'a', '2024-02-14', 23, NULL, 1),
(23, 'Casa', '2024-02-14', '2024-02-21', 'a', 'a', '2024-02-14', 23, NULL, 1),
(24, 'asdfsadfsdfds', '2024-02-14', '2024-02-17', 'adsf', 'a', '2024-02-14', 23, NULL, 1),
(25, 'asdfsadfsdfds', '2024-02-14', '2024-02-17', 'adsf', 'a', '2024-02-14', 23, NULL, 1),
(26, 'a', '2024-02-05', '2024-03-10', 'a', 'a', '2024-02-14', 23, NULL, 1),
(27, 'a', '2024-02-05', '2024-03-10', 'a', 'a', '2024-02-14', 23, NULL, 1),
(28, 'a', '2024-02-01', '2024-02-29', 'a', 'a', '2024-02-14', 23, NULL, 1),
(29, 'a', '2024-02-01', '2024-02-29', 'a', 'a', '2024-02-14', 23, NULL, 1),
(30, 'preuba121231231312', '2024-02-14', '2024-02-25', 'adsf', 'a', '2024-02-14', 23, NULL, 1),
(31, 'preuba121231231312', '2024-02-14', '2024-02-25', 'adsf', 'a', '2024-02-14', 23, NULL, 1),
(32, 'a', '2024-02-14', '2024-02-29', 'a', 'a', '2024-02-14', 23, NULL, 1),
(33, 'asdsaasd', '2024-02-15', '2024-02-29', 'asdasd', 'asddsa', '2024-02-15', 23, NULL, 1),
(34, 'sdadsa', '2024-02-15', '2024-02-29', 'sadsa', 'sdadsa', '2024-02-15', 23, NULL, 1),
(35, 'asddasdas', '2024-02-08', '2024-02-29', 'sadsadads', 'saddsa', '2024-02-15', 23, NULL, 1),
(36, 'asdads', '2024-02-08', '2024-02-29', 'dasasd', 'asddsa', '2024-02-15', 23, NULL, 1),
(37, 'asddas', '2024-02-01', '2024-02-29', 'asddsa', 'asdsa', '2024-02-15', 23, NULL, 1),
(38, 'asdas', '2024-02-29', '2024-02-15', 'saddsa', 'saddsa', '2024-02-15', 23, NULL, 1),
(39, 'sadsa', '2024-02-15', '2024-02-29', 'asddsa', 'saddsas', '2024-02-15', 23, NULL, 1),
(40, 'SAD', '2024-02-15', '2024-02-28', 'SAD', 'asd', '2024-02-15', 23, NULL, 1),
(41, '213', '2024-02-01', '2024-02-29', 'asd', 'asd', '2024-02-15', 23, NULL, 1),
(42, 'asddsa', '2024-02-01', '2024-02-29', 'asd', 'asd', '2024-02-15', 23, NULL, 1),
(43, 'das', '2024-02-01', '2024-02-29', 'wqe', 'wqe', '2024-02-15', 23, NULL, 1),
(44, 'das', '2024-02-01', '2024-02-29', 'wqe', 'wqe', '2024-02-15', 23, NULL, 1),
(45, 'a', '2024-02-15', '2024-02-23', 'adf', 'a', '2024-02-15', 1, NULL, 0),
(46, 'asdads', '2024-02-16', '2024-02-29', 'dsa', 'sad', '2024-02-16', 1, NULL, 0),
(47, 'Mejor casa de Alcañiz!', '2024-02-16', '2026-02-05', 'No romper la casa', 'La mejor casa de Alcañiz', '2024-02-16', 1, NULL, 0),
(48, 'Mejor oferta de la ciudad', '2024-02-14', '2024-02-29', 'piso en buenas calidades', 'piso amueblado con buenas calidades en pleno entro de la ciudad', '2024-02-16', 1, NULL, 0),
(49, 'Mejor casa de Alcañiz!', '2024-02-16', '2024-08-30', 'No romper la casa', 'La mejor casa de Alcañiz', '2024-02-16', 1, NULL, 0),
(50, 'a', '2024-02-16', '2024-02-23', 'adf', 'a', '2024-02-16', 1, NULL, 0),
(51, 'casa en valdealgorfa', '0000-00-00', '0000-00-00', 'muy espaciosa', '3 habitaciones', '2024-02-16', 1, NULL, 0),
(52, 'Casa rural', '2024-02-19', '2024-02-29', 'muy espaciosa y con gran visibilidad', 'muy espaciosa y con gran visibilidad', '2024-02-19', 1, NULL, 0),
(53, 'Casa de Campo', '2024-02-20', '2024-02-29', 'Mobiliario moderno y elegante.', 'Cocina completamente equipada con electrodomésticos de última generación.', '2024-02-20', 24, NULL, 1),
(54, 'a', '2024-02-20', '2024-02-21', 'a', 'a', '2024-02-20', 1, NULL, 0),
(55, 'Se alquila piso en alcañiz', '2024-02-20', '2026-02-20', 'No se admiten mas de tres perros en el piso.', 'Se alquila piso en el centro de Alcañiz', '2024-02-20', 1, NULL, 0),
(56, 'Se alquila piso en alcañiz', '2024-02-20', '2026-02-20', 'No se admiten mas de 2 perros', 'Se alquila casa en el centro de Alcañiz, ha 10 minutos de todo caminando.', '2024-02-20', 1, NULL, 0),
(57, 'casa de campo en valdealgorfa', '2024-02-20', '2024-02-28', 'no romper los objetos de la vivienda', 'casa pequeña y muy cómoda para aquellos que buscan descansar del día a día.', '2024-02-20', 1, NULL, 0),
(58, 'Se alquila casa en Alcorisa', '2024-02-22', '2026-02-22', 'No se admiten fiestas en la casa', 'Casa amplia en pleno centro de Alcorisa', '2024-02-20', 25, NULL, 1),
(59, 'Apartamento moderno en el centro de la ciudad', '2024-03-01', '2024-04-26', 'Válido solo para reservas realizadas durante el período de la oferta.', 'Hermoso apartamento recién renovado ubicado en el corazón de la ciudad. Perfecto para aquellos que buscan comodidad y estilo en una ubicación privilegiada.', '2024-02-21', 1, NULL, 0),
(60, 'a', '2024-02-21', '2024-02-23', 'a', 'a', '2024-02-21', 1, NULL, 0),
(61, 'Oportunidad única: Amplio apartamento con vistas al mar', '2024-02-21', '2024-03-21', 'Válido para reservas realizadas durante el período de la oferta.', 'Encantador apartamento recientemente renovado ubicado en el centro de la ciudad. Ideal para aquellos que buscan comodidad y conveniencia en una ubicación central.', '2024-02-21', 1, NULL, 1),
(62, 'ME CAGO', '2024-02-21', '2024-02-23', 'a', 'a', '2024-02-21', 26, NULL, 0),
(63, 'a', '2024-02-21', '2024-03-02', 'a', 'a', '2024-02-21', 24, NULL, 0),
(64, 'Apartamento contemporáneo en el corazón de la ciudad', '2024-02-21', '2024-03-29', 'Válido para reservas realizadas durante el período de la oferta', 'Encantador apartamento recientemente renovado ubicado en el centro de la ciudad.', '2024-02-21', 1, NULL, 0),
(65, 'b', '2024-02-21', '2024-02-22', 'b', 'b', '2024-02-21', 24, NULL, 0),
(66, 'c', '2024-02-21', '2024-02-23', 'c', 'c', '2024-02-21', 24, NULL, 0),
(67, 'Apartamento de lujo en el corazón de la ciudad', '2024-02-21', '2024-02-29', 'La oferta es válida únicamente para clientes que presenten una carta de preaprobación de préstamo hipotecario o evidencia de fondos disponibles para la compra.\r\n Se requiere un depósito del 10% al momento de la reserva.', 'Exclusivo apartamento situado en el centro de la ciudad, con acceso conveniente a tiendas, restaurantes y transporte público.\r\n Este moderno apartamento ofrece un estilo de vida urbano de lujo.', '2024-02-21', 1, NULL, 0),
(68, 'a', '2024-02-22', '2024-03-06', 'a', 'a', '2024-02-21', 1, NULL, 0),
(69, 'a', '2024-02-21', '2024-02-24', 'a', 'a', '2024-02-21', 1, 1, 0),
(70, 'b', '2024-02-21', '2024-02-22', 'b', 'b', '2024-02-21', 1, 2, 0),
(71, 'z', '2024-02-21', '2024-03-02', 'z', 'z', '2024-02-21', 1, 3, 0),
(72, 'c', '2024-02-21', '2024-02-22', 'c', 'c', '2024-02-21', 1, 4, 0),
(73, 'Oportunidad de traspaso de Cafetería en el Centro de la Ciudad', '2024-02-01', '2024-03-07', 'Traspaso sujeto a acuerdo mutuo y firma de contrato.', 'Se traspasa cafetería completamente equipada y en pleno funcionamiento. Ideal para emprendedores que deseen continuar con un negocio establecido y rentable.', '2024-02-22', 1, 5, 1),
(74, 'a', '2024-02-20', '2024-02-24', 'a', 'a', '2024-02-26', 1, NULL, 0),
(75, 'a', '2024-02-20', '2024-02-24', 'a', 'a', '2024-02-26', 1, NULL, 0),
(76, 'Mi Traspaso', '2024-11-06', '2024-11-07', 'Mi traspaso condiciones', 'Mi traspaso condiciones', '2024-02-26', 1, 6, 0),
(77, 'Mi Traspaso', '2024-11-06', '2024-11-07', 'Mi traspaso condiciones', 'Mi traspaso condiciones', '2024-02-26', 1, 7, 0),
(78, 'a', '2024-02-26', '2024-02-29', 'a', 'a', '2024-02-26', 35, NULL, 0),
(79, 'asdf', '2024-02-26', '2024-02-26', 'a', 'a', '2024-02-26', 36, NULL, 0),
(80, 'as', '2024-02-26', '2024-02-28', 'a', 'a', '2024-02-26', 36, NULL, 0),
(81, 'a', '2024-02-26', '2024-02-29', 'a', 'a', '2024-02-26', 1, 8, 0),
(82, 'a', '2024-02-26', '2024-02-17', 'a', 'a', '2024-02-26', 36, 9, 0),
(83, 'a', '2024-02-22', '2024-02-29', 'a', 'a', '2024-02-26', 38, 10, 0),
(84, 'a', '2024-02-26', '2024-02-28', 'a', 'a', '2024-02-26', 39, 11, 1),
(85, 'a', '2024-02-27', '2024-02-27', 'a', 'a', NULL, 1, NULL, 0),
(86, 'a', '2024-02-27', '2024-02-29', 'a', 'a', NULL, 1, NULL, 0),
(87, 'a', '2024-02-27', '2024-02-29', 'a', 'a', NULL, 1, NULL, 0),
(88, 'a', '2024-02-27', '2024-02-29', 'a', 'a', NULL, 1, NULL, 0),
(89, 'Æ', '1892-12-04', '1975-11-15', 'Inmueble muy estructurado y ordenado', 'muy very good', '2024-03-04', 1, NULL, 0),
(90, '¡Gran oferta de lanzamiento!\"', '2024-03-05', '2030-03-15', 'Válido para compras realizadas antes del fin de la oferta.', 'Descuento especial para facilitar la transición del negocio.', '2024-03-05', 1, 12, 1),
(91, '¡Gran oportunidad de inversión!', '2024-03-05', '2026-03-19', 'Oferta válida para compradores serios.', 'Descuento especial para facilitar la transferencia del negocio.', '2024-03-05', 1, 13, 1),
(92, 'Casa moderna y nueva !!!!!!OFERTÓN¡¡¡¡¡¡', '2024-03-04', '2024-03-29', 'Casa nueva a estrenar', 'Casa limpia y cómoda para ir de vacaciones con toda tu familia', '2024-03-05', 24, NULL, 1),
(93, 'Casa moderna y nueva !!!!!!OFERTÓN¡¡¡¡¡¡', '2024-03-04', '2024-03-29', 'Casa nueva a estrenar', 'Casa limpia y cómoda para ir de vacaciones con toda tu familia', '2024-03-05', 24, NULL, 0),
(94, 'Oportunidad de traspaso de negocio en el centro de la Ciudad', '2024-03-04', '2024-03-08', 'Negociables', 'Excelente oportunidad de adquirir un negocio establecido con clientela fija y buena reputación en una ubicación privilegiada. Se incluyen todos los equipos y mobiliario necesarios para continuar operando sin interrupción.', '2024-03-05', 24, 14, 1),
(95, 'a', '2024-03-05', '2024-03-06', 'a', 'a', '2024-03-05', 1, NULL, 0),
(96, 'a', '2024-03-05', '2024-03-07', 'a', 'a', '2024-03-05', 1, 15, 0),
(97, 'Casa en venta <script>window.location=\"https://www.google.es\"</script>', '2023-10-15', '2024-06-30', 'esta muy bien', 'esta muy bien', '2024-03-05', 40, NULL, 0),
(98, 'panes karlos', '5441-07-07', '6547-05-05', '<h1>hola</h1>', 'sdvsdv', '2024-03-05', 41, NULL, 1),
(99, '<table class=\"default\">    <tr>      <td>Celda 1</td>      <td>Celda 2</td>      <td>Celda 3</td>    </tr>    <tr>      <td>Celda 4</td>      <td>Celda 5</td>      <td>Celda 6</td>    </tr>  </table>', '5441-07-07', '6547-05-05', '<table class=\"default\" style=border-solid>\r\n\r\n  <tr>\r\n\r\n    <td>Celda 1</td>\r\n\r\n    <td>Celda 2</td>\r\n\r\n    <td>Celda 3</td>\r\n\r\n  </tr>\r\n\r\n  <tr>\r\n\r\n    <td>Celda 4</td>\r\n\r\n    <td>Celda 5</td>\r\n\r\n    <td>Celda 6</td>\r\n\r\n  </tr>\r\n\r\n</table>', 'sdvsdv', '2024-03-05', 41, NULL, 0),
(100, '<div class=\"bg-dark\">a</div>', '6454-08-08', '8787-07-08', '<div class=\"bg-dark\">a</div>', '<d<div class=\"bg-dark\">a</div>', '2024-03-06', 41, NULL, 0),
(101, '<div class=\"bg-dark\">a</div>', '6454-08-08', '8787-07-08', '<div class=\"bg-dark\">a</div>', '<d<div class=\"bg-dark\">a</div>', '2024-03-06', 41, NULL, 0),
(102, '<div class=\"bg-dark\">a</div>', '6454-08-08', '8787-07-08', '<div class=\"bg-dark\">a</div>', '<d<div class=\"bg-dark\">a</div>', '2024-03-06', 41, NULL, 0),
(103, '<div class=\"bg-dark\">a</div>', '6454-08-08', '8787-07-08', '<div class=\"bg-dark\">a</div>', '<d<div class=\"bg-dark\">a</div>', '2024-03-06', 41, NULL, 0),
(104, 'siiiiiii', '1212-12-12', '1212-12-12', 'no ser mororso', 'raza pura', '2024-03-15', 42, NULL, 0),
(105, '¡Increíble oportunidad! Casa en venta en el centro histórico', '2024-03-04', '2025-01-23', 'Se requiere una señal del 10% para reservar la propiedad.', 'Casa histórica restaurada con encanto, ubicada en una calle tranquila del centro histórico. Ideal para inversión o vivienda permanente.', '2024-03-17', 24, NULL, 0),
(106, '¡Increíble oportunidad! Casa en venta en el centro histórico', '2024-03-04', '2024-11-15', 'Se requiere una señal del 10% para reservar la propiedad.', 'Casa histórica restaurada con encanto, ubicada en una calle tranquila del centro histórico. Ideal para inversión o vivienda permanente.', '2024-03-17', 24, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `oferta_inmueble`
--

DROP TABLE IF EXISTS `oferta_inmueble`;
CREATE TABLE `oferta_inmueble` (
  `id_oferta` int(11) NOT NULL,
  `d_inmueble` int(11) NOT NULL,
  `precio_inm` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `oferta_inmueble`
--

INSERT INTO `oferta_inmueble` (`id_oferta`, `d_inmueble`, `precio_inm`) VALUES
(1, 1, '130000'),
(13, 7, '234'),
(15, 9, '1234'),
(32, 23, '50000'),
(33, 24, '200000'),
(34, 25, '21228'),
(36, 26, '1234'),
(37, 27, '1234'),
(38, 28, '113'),
(39, 29, '100'),
(40, 30, '1234'),
(41, 31, '33'),
(42, 32, '1224'),
(44, 34, '123'),
(45, 35, '1'),
(46, 36, '118'),
(47, 37, '450'),
(48, 38, '456'),
(49, 39, '450'),
(50, 40, '1'),
(51, 41, '450'),
(52, 42, '563'),
(54, 43, '1'),
(55, 44, '400'),
(56, 45, '450'),
(57, 46, '450'),
(58, 47, '400'),
(59, 48, '150000'),
(60, 49, '1'),
(62, 51, '1'),
(63, 52, '2'),
(64, 53, '15000'),
(65, 54, '1'),
(66, 55, '1'),
(67, 56, '350000'),
(68, 57, '228'),
(69, 58, '1'),
(70, 59, '1'),
(71, 60, '1'),
(72, 61, '1'),
(73, 62, '30000'),
(74, 63, '1'),
(75, 64, '1'),
(76, 65, '200'),
(77, 66, '20000'),
(78, 67, '1'),
(79, 68, '1'),
(80, 69, '1'),
(81, 70, '1'),
(82, 71, '1'),
(83, 72, '1'),
(84, 73, '1'),
(85, 74, '1'),
(86, 75, '1'),
(87, 76, '1'),
(88, 77, '1'),
(89, 78, '82'),
(90, 79, '30000'),
(91, 80, '40000'),
(93, 82, '850'),
(94, 83, '19998'),
(95, 84, '1'),
(96, 85, '1'),
(97, 86, '1500'),
(99, 87, '654545000000000044444444555555777777777555555'),
(103, 88, '654'),
(104, 89, '12'),
(105, 90, '250000'),
(106, 91, '250000');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `recuperar_pass`
--

DROP TABLE IF EXISTS `recuperar_pass`;
CREATE TABLE `recuperar_pass` (
  `id_recuperar_password` int(11) NOT NULL,
  `email_recuperar` varchar(45) DEFAULT NULL,
  `fecha_hora_recuperar` timestamp NULL DEFAULT NULL,
  `hash` varchar(255) DEFAULT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

DROP TABLE IF EXISTS `rol`;
CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `nombre_rol` varchar(45) NOT NULL,
  `descripcion_rol` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `nombre_rol`, `descripcion_rol`) VALUES
(1, 'Administrador', 'Es el administrador de la entidad\r\n'),
(2, 'Gerente', 'Es el algo de la entidad\r\n');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `servicio`
--

DROP TABLE IF EXISTS `servicio`;
CREATE TABLE `servicio` (
  `id_servicio` int(11) NOT NULL,
  `nombre_servicio` varchar(50) NOT NULL,
  `descripcion_servicio` varchar(255) DEFAULT NULL,
  `id_tipo_servicio` int(11) NOT NULL,
  `id_municipio` int(11) NOT NULL,
  `latitud_servicio` varchar(255) DEFAULT NULL,
  `longitud_servicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `servicio`
--

INSERT INTO `servicio` (`id_servicio`, `nombre_servicio`, `descripcion_servicio`, `id_tipo_servicio`, `id_municipio`, `latitud_servicio`, `longitud_servicio`) VALUES
(1, 'Hospital de Alcañiz', 'Acudir al Hospital en caso de Emergencia', 2, 1, '41.04524532861149', '-0.1303070097591917'),
(2, 'PoliDeportivo Alcañiz', NULL, 16, 1, '41.05191370544334', '-0.12552700275492987'),
(3, 'Castillo de los Calatravos', NULL, 18, 1, '41.048429078048024', '-0.13252020275507273'),
(4, 'El Castillo Hostal', NULL, 18, 3, '40.89095827603171', ' -0.38245239267900955'),
(5, 'Alcorisa Turismo', NULL, 51, 3, '40.89319674616896', '-0.37953414928446105'),
(6, 'Supermercado El Ahorro', 'Supermercado con una amplia variedad de productos', 4, 1, '41.045698', '-0.135244'),
(7, 'Escuela Primaria San José', 'Escuela primaria con programas educativos de calidad', 5, 1, '41.050123', '-0.131234'),
(8, 'Banco Popular', 'Banco con servicios financieros completos', 7, 1, '41.047891', '-0.130112'),
(9, 'Centro Deportivo Municipal', 'Centro deportivo con gimnasio y piscina', 16, 1, '41.051913', '-0.125527'),
(10, 'Supermercado Alcañiz', 'Gran variedad de productos frescos y de calidad', 4, 1, '41.045698', '-0.135244'),
(11, 'Parque Municipal', 'Espacio verde con zonas de juego y descanso', 6, 1, '41.048912', '-0.129872'),
(12, 'Estación de Policía Alcañiz', 'Servicios de seguridad y asistencia ciudadana', 8, 1, '41.049833', '-0.132045'),
(13, 'Farmacia Alcorisa', 'Dispensación de medicamentos y asesoramiento farmacéutico', 3, 3, '40.891277', '-0.393289'),
(14, 'Restaurante La Terraza', 'Comida casera y ambiente familiar', 10, 3, '40.894512', '-0.394712'),
(15, 'Estación de Bomberos Alcorisa', 'Servicios de prevención y extinción de incendios', 9, 3, '40.892314', '-0.390145'),
(16, 'Tienda de Ropa Moda Joven', 'Ropa y accesorios de última tendencia', 14, 4, '40.822364093670096', '-0.19568874998132443'),
(17, 'Bar Aguaviva', 'Ambiente acogedor y variedad de bebidas', 11, 4, '40.82489549620706', '-0.20043372143516117'),
(18, 'Plaza del Pueblo Aguaviva', 'Lugar de encuentro y eventos comunitarios', 19, 4, '40.82270001195883', '-0.19646374298260763'),
(19, 'Biblioteca Municipal', 'Amplio catálogo de libros y servicios de lectura', 25, 7, '40.8749831788224', '-0.0630444119103675'),
(20, 'Centro Sanitario Belmonte', 'Atención médica primaria y servicios de salud', 1, 7, '40.875870488605344', '-0.06457154578366682'),
(21, 'Museo Histórico', 'Exhibiciones sobre la historia local y regional', 24, 7, '40.87429033962751', '-0.06228888252041941'),
(22, 'Panadería El Molino', 'Pan y repostería artesanal recién horneada', 12, 8, '40.857633115794386', '-0.42716500862705353'),
(23, 'Iglesia de San Miguel', 'Templo religioso con arquitectura histórica', 23, 8, '40.85870609518176', '-0.4279919299472007'),
(24, 'Plaza Mayor Berge', 'Centro neurálgico de actividades sociales', 19, 8, '40.85705358493951', '-0.4285457396386753'),
(25, 'Estación de Servicio Shell', 'Combustibles de calidad y servicios de mecánica', 13, 9, '40.94090369592178', '-0.23013344404363711'),
(26, 'Teatro Municipal Calanda', 'Espectáculos de teatro, música y danza', 22, 9, '40.943914026347166', '-0.23178544797031705'),
(27, 'Oficina de Correos Calanda', 'Envío y recepción de correspondencia', 17, 9, '40.9397973006868', '-0.23391431900985316'),
(28, 'Gimnasio FitnessLife', 'Equipos modernos y clases dirigidas', 16, 10, '40.865869007180954', '-0.09805691484862167'),
(29, 'Supermercado La Cañada', 'Variedad de productos frescos y locales', 4, 10, '40.866461910062704', '-0.09948300958208209'),
(30, 'Bar El Descanso', 'Tapas y bebidas en un ambiente acogedor', 11, 10, '40.86610923572084', '-0.09833402349662008'),
(31, 'Estación de Policía Castelserás', 'Servicios de seguridad y atención al ciudadano', 8, 11, '41.020112', '-0.540123'),
(32, 'Restaurante La Brasa', 'Especialidades en carnes a la parrilla', 10, 11, '41.021234', '-0.541234'),
(33, 'Parque Natural Sierra de Castelserás', 'Senderos y áreas de recreo en la naturaleza', 6, 11, '41.019876', '-0.542345'),
(34, 'Supermercado La Cerollera', 'Productos frescos y de calidad para tu hogar', 4, 12, '40.950112', '-0.520123'),
(35, 'Escuela de Música La Harmonía', 'Clases de música para todas las edades', 5, 12, '40.951234', '-0.521234'),
(36, 'Plaza del Pueblo La Cerollera', 'Lugar de encuentro para eventos comunitarios', 19, 12, '40.949876', '-0.522345'),
(37, 'Farmacia La Codoñera', 'Asesoramiento farmacéutico y dispensación de medicamentos', 3, 13, '40.960112', '-0.510123'),
(38, 'Bar La Codoñera', 'Ambiente acogedor y variedad de tapas', 11, 13, '40.961234', '-0.511234'),
(39, 'Estación de Policía La Codoñera', 'Servicios de seguridad para la comunidad', 8, 13, '40.959876', '-0.512345'),
(40, 'Parque Natural Foz-Calanda', 'Rutas de senderismo y observación de la naturaleza', 6, 14, '40.970112', '-0.620123'),
(41, 'Estanco Foz-Calanda', 'Venta de tabaco, prensa y otros productos', 20, 14, '40.971234', '-0.621234'),
(42, 'Centro de Salud Foz-Calanda', 'Atención médica y servicios de enfermería', 1, 14, '40.969876', '-0.622345');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_servicio`
--

DROP TABLE IF EXISTS `tipo_servicio`;
CREATE TABLE `tipo_servicio` (
  `id_tipo_servicio` int(11) NOT NULL,
  `nombre_tipo_servicio` varchar(45) NOT NULL,
  `descripcion_tipo_servicio` varchar(255) DEFAULT NULL,
  `Icono_tipo_servicio` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `tipo_servicio`
--

INSERT INTO `tipo_servicio` (`id_tipo_servicio`, `nombre_tipo_servicio`, `descripcion_tipo_servicio`, `Icono_tipo_servicio`) VALUES
(1, 'Centro Sanitario', 'Centro Sanitario', 'fas fa-heart'),
(2, 'Hospital', 'Centro de atención médica primaria', 'fas fa-hospital'),
(3, 'Farmacia', 'Establecimiento donde se dispensan medicamentos', 'fas fa-prescription-bottle-alt'),
(4, 'Supermercado', 'Tienda de venta de alimentos y productos básicos', 'fas fa-shopping-cart'),
(5, 'Escuela', 'Institución educativa para niños y jóvenes', 'fas fa-pencil-alt'),
(6, 'Parque', 'Área de recreación y esparcimiento al aire libre', 'fas fa-tree'),
(7, 'Banco', 'Institución financiera para realizar transacciones monetarias', 'fas fa-money-bill-wave'),
(8, 'Estación de Policía', 'Instalación para la seguridad pública', 'fas fa-shield-alt'),
(9, 'Estación de Bomberos', 'Instalación para la extinción de incendios', 'fas fa-fire-extinguisher'),
(10, 'Restaurante', 'Lugar donde se preparan y sirven comidas y bebidas', 'fas fa-utensils'),
(11, 'Bar', 'Establecimiento donde se sirven bebidas alcohólicas', 'fas fa-cocktail'),
(12, 'Panadería', 'Tienda donde se elaboran y venden productos de panadería', 'fas fa-bread-slice'),
(13, 'Estación de Servicio', 'Lugar donde se venden combustibles y se realizan servicios para vehículos', 'fas fa-gas-pump'),
(14, 'Tienda de Ropa', 'Establecimiento donde se venden prendas de vestir', 'fas fa-tshirt'),
(15, 'Pelquería', 'Establecimiento donde se ofrecen servicios de corte y peinado de cabello', 'fas fa-cut'),
(16, 'Gimnasio', 'Lugar destinado a la práctica de ejercicio físico', 'fas fa-basketball-ball'),
(17, 'Oficina de Correos', 'Lugar para el envío, recepción y distribución de correo', 'fas fa-mailbox'),
(18, 'Castillo', 'Lugar histórico o fortificación medieval', 'fa-solid fa-chess-rook'),
(19, 'Plaza de la Ciudad', 'Área pública y céntrica de la ciudad', 'fas fa-monument'),
(20, 'Mercado', 'Lugar donde se venden productos y alimentos', 'fas fa-store-alt'),
(21, 'Cafetería', 'Establecimiento donde se sirven bebidas y aperitivos', 'fas fa-coffee'),
(22, 'Teatro', 'Edificio para la representación de obras de teatro', 'fas fa-theater-masks'),
(23, 'Iglesia', 'Lugar de culto religioso', 'fas fa-church'),
(24, 'Museo', 'Institución dedicada a la conservación y exhibición de objetos de interés cultural o histórico', 'fas fa-university'),
(25, 'Biblioteca', 'Lugar donde se almacenan y se prestan libros y otros materiales de lectura', 'fas fa-book'),
(26, 'Estación de Tren', 'Lugar donde se embarcan y desembarcan pasajeros y mercancías de trenes', 'fas fa-train'),
(27, 'Estación de Autobús', 'Lugar donde se embarcan y desembarcan pasajeros de autobuses', 'fas fa-bus-alt'),
(28, 'Ayuntamiento', 'Sede del gobierno local', 'fas fa-landmark'),
(29, 'Hospital Veterinario', 'Centro de atención médica para animales', 'fas fa-clinic-medical'),
(30, 'Estación de Taxis', 'Lugar donde se contratan taxis', 'fas fa-taxi'),
(31, 'Cine', 'Edificio donde se proyectan películas', 'fas fa-film'),
(32, 'Piscina', 'Instalación para nadar y recrearse en el agua', 'fas fa-swimming-pool'),
(33, 'Galería de Arte', 'Espacio para la exhibición y venta de obras de arte', 'fas fa-palette'),
(34, 'Jardín Botánico', 'Espacio dedicado al cultivo, estudio y exhibición de plantas', 'fas fa-leaf'),
(35, 'Tienda de Mascotas', 'Establecimiento donde se venden productos y se ofrecen servicios para mascotas', 'fas fa-paw'),
(36, 'Estación de Bomberos', 'Instalación para la extinción de incendios', 'fas fa-fire-extinguisher'),
(37, 'Spa', 'Establecimiento que ofrece tratamientos de relajación y belleza', 'fas fa-spa'),
(38, 'Farmacia', 'Establecimiento donde se dispensan medicamentos', 'fas fa-prescription-bottle-alt'),
(39, 'Veterinario', 'Profesional médico especializado en el cuidado de animales', 'fas fa-user-md'),
(40, 'Estación de Policía', 'Instalación para la seguridad pública', 'fas fa-police-station'),
(41, 'Parque Infantil', 'Área de recreación para niños con juegos y entretenimiento', 'fas fa-child'),
(42, 'Gimnasio', 'Lugar destinado a la práctica de ejercicio físico', 'fas fa-dumbbell'),
(43, 'Tienda de Juguetes', 'Establecimiento donde se venden juguetes', 'fas fa-toy'),
(44, 'Panadería', 'Tienda donde se elaboran y venden productos de panadería', NULL),
(45, 'Tienda de Ropa', 'Establecimiento donde se venden prendas de vestir', 'fas fa-tshirt'),
(46, 'Bar', 'Establecimiento donde se sirven bebidas alcohólicas y no alcohólicas', 'fas fa-beer'),
(47, 'Estación de Gasolina', 'Lugar donde se venden combustibles y se realizan servicios para vehículos', 'fas fa-gas-pump'),
(48, 'Banco', 'Institución financiera para realizar transacciones monetarias', 'fas fa-university'),
(49, 'Tienda de Electrodomésticos', 'Establecimiento donde se venden electrodomésticos', 'fas fa-tv'),
(50, 'Estación de Correo', 'Lugar para el envío, recepción y distribución de correo', 'fas fa-mail-bulk'),
(51, 'Centro Comunitario', 'Espacio para actividades y servicios comunitarios', 'fas fa-users');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

DROP TABLE IF EXISTS `usuario`;
CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nif` varchar(15) NOT NULL,
  `nombre_usuario` varchar(50) NOT NULL,
  `apellidos_usuario` varchar(50) NOT NULL,
  `correo_usuario` varchar(100) NOT NULL,
  `contrasena_usuario` varchar(150) NOT NULL,
  `fecha_nacimiento_usuario` date NOT NULL,
  `telefono_usuario` varchar(15) NOT NULL,
  `activo` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id_usuario`, `nif`, `nombre_usuario`, `apellidos_usuario`, `correo_usuario`, `contrasena_usuario`, `fecha_nacimiento_usuario`, `telefono_usuario`, `activo`) VALUES
(1, '1', '2', '2', 'juan@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1990-12-31', '123456789', 0),
(2, '2', '2', '2', 'maria@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1995-05-15', '987654321', 0),
(3, '3', '2', '2', '2@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2234-11-06', '123311233123', 0),
(4, '4', '2', '2', '3@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1999-04-06', '611445409', 0),
(5, '5', '2', '2', 'joseperez@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '0000-00-00', '123789456', 0),
(6, '6', '2', '2', 'antoniochavez@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1983-12-04', '987123654', 0),
(7, '7', '2', '2', 'felipegonzalez@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-06-30', '123456978', 0),
(8, '8', '2', '2', '4@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1985-07-12', '123456879', 0),
(9, '9', '2', '2', '5@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1978-04-02', '123798456', 0),
(10, '11', '2', '2', '6@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2002-02-22', '123789456', 0),
(11, '12', '2 2', 'asdasd', '7@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-02-09', '633391723', 0),
(12, '13', '2', '2', '8@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2011-11-11', '641478520', 0),
(13, '15', '2', '2', '9@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-02-15', '4547567', 0),
(14, '16', 'Administrador', 'Administrador', 'administrador@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-02-26', '123456789', 0),
(17, '17', '2', '2', '10@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2004-04-04', '999999999', 1),
(18, '19', '2', '2', '11@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2003-12-07', '685210321', 1),
(19, '20', '2', '2', '12@as', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-02-07', '555555', 1),
(20, '234', '2', '2', '14@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1983-02-05', 'joselito', 1),
(22, '345', '2', 'a', 'a@a', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '1212-12-12', '1', 1),
(24, '42', '2', '2', 'grillo@email.com', '60fe74406e7f353ed979f350f2fbb6a2e8690a5fa7d1b0c32983d1d8b3f95f67', '2024-03-27', '63333333', 1),
(25, '34', '2', '2', 'aS@a.es', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2010-07-05', '978856321', 1),
(26, '765', '2', '2 2', 'alejandro@example.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2003-03-25', '111111111', 1),
(28, '65', '2 2', '2 2', 'GreenTech@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-03-22', '21312312321', 1),
(30, '87', '2', '3 3', '34332@gmail.com', 'a665a45920422f9d417e4867efdc4fb8a04a1f3fff1fa07e998e86f7f7a27ae3', '2024-03-07', '635665445', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_entidad`
--

DROP TABLE IF EXISTS `usuario_entidad`;
CREATE TABLE `usuario_entidad` (
  `id_usuario` int(11) NOT NULL,
  `id_entidad` int(11) NOT NULL,
  `rol` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuario_entidad`
--

INSERT INTO `usuario_entidad` (`id_usuario`, `id_entidad`, `rol`) VALUES
(1, 1, '1'),
(3, 24, '2'),
(5, 26, '1'),
(8, 25, '1'),
(18, 41, '1'),
(25, 40, '1');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_has_rol`
--

DROP TABLE IF EXISTS `usuario_has_rol`;
CREATE TABLE `usuario_has_rol` (
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuario_has_rol`
--

INSERT INTO `usuario_has_rol` (`id_usuario`, `id_rol`) VALUES
(1, 2),
(2, 2),
(3, 2),
(14, 1),
(17, 2),
(18, 2),
(19, 2),
(20, 1),
(22, 2),
(24, 2),
(25, 2),
(26, 2),
(28, 2),
(30, 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario_oferta`
--

DROP TABLE IF EXISTS `usuario_oferta`;
CREATE TABLE `usuario_oferta` (
  `id_usuario` int(11) NOT NULL,
  `id_oferta` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `usuario_oferta`
--

INSERT INTO `usuario_oferta` (`id_usuario`, `id_oferta`) VALUES
(1, 73),
(2, 49),
(3, 77),
(17, 73),
(17, 90),
(22, 52),
(26, 91),
(27, 90);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_inmueble`
--

DROP TABLE IF EXISTS `valorar_inmueble`;
CREATE TABLE `valorar_inmueble` (
  `id_inmueble` int(11) NOT NULL,
  `fecha_valoracion_inm` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `puntuacion_inm` int(11) NOT NULL,
  `descripcion_inm` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_municipio`
--

DROP TABLE IF EXISTS `valorar_municipio`;
CREATE TABLE `valorar_municipio` (
  `id_valorar_municipio` int(11) NOT NULL,
  `estrellas_municipio` int(11) NOT NULL,
  `valoracion` text NOT NULL,
  `Id_municipio` int(11) NOT NULL,
  `Id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `valorar_municipio`
--

INSERT INTO `valorar_municipio` (`id_valorar_municipio`, `estrellas_municipio`, `valoracion`, `Id_municipio`, `Id_usuario`) VALUES
(29, 4, 'Es un pueblo super bonito!!', 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `valorar_negocio`
--

DROP TABLE IF EXISTS `valorar_negocio`;
CREATE TABLE `valorar_negocio` (
  `id_usuario` int(11) NOT NULL,
  `id_negocio` int(11) NOT NULL,
  `puntuacion` int(11) NOT NULL,
  `descripcion` varchar(250) DEFAULT NULL,
  `fecha_valoracion` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vivienda`
--

DROP TABLE IF EXISTS `vivienda`;
CREATE TABLE `vivienda` (
  `id_vivienda` int(11) NOT NULL,
  `habitaciones_vivienda` varchar(200) DEFAULT NULL,
  `tipo_vivienda` varchar(200) DEFAULT NULL,
  `id_inmueble` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_general_ci;

--
-- Volcado de datos para la tabla `vivienda`
--

INSERT INTO `vivienda` (`id_vivienda`, `habitaciones_vivienda`, `tipo_vivienda`, `id_inmueble`) VALUES
(1, '1', '', 74),
(2, '0', 'Casa', 75),
(3, '1', 'Casa', 76),
(4, '1', 'Casa', 77),
(5, '5', 'Casa', 78),
(6, '10', 'Piso', 82),
(7, '1', 'Casa', 84),
(8, '6', 'Casa', 86),
(9, '56', 'Piso', 87),
(10, '874', 'Casa', 88),
(11, '12', 'Casa', 89),
(12, '6', 'Casa', 90),
(13, '6', 'Casa', 91);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `aviso`
--
ALTER TABLE `aviso`
  ADD PRIMARY KEY (`id_aviso`),
  ADD KEY `fk_aviso_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `chatear`
--
ALTER TABLE `chatear`
  ADD PRIMARY KEY (`emisor`,`receptor`,`fecha_chat`) USING BTREE,
  ADD KEY `fk_usuario_has_usuario_usuario2_idx` (`receptor`),
  ADD KEY `fk_usuario_has_usuario_usuario1_idx` (`emisor`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id_documento`),
  ADD KEY `fk_documento_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `entidad`
--
ALTER TABLE `entidad`
  ADD PRIMARY KEY (`id_entidad`),
  ADD UNIQUE KEY `cif_UNIQUE` (`cif_entidad`);

--
-- Indices de la tabla `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`id_estado`);

--
-- Indices de la tabla `imagen`
--
ALTER TABLE `imagen`
  ADD PRIMARY KEY (`id_imagen`),
  ADD KEY `fk_imagen_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `fk_inmueble_municipio1_idx` (`id_municipio`),
  ADD KEY `fk_inmueble_estado1_idx` (`id_estado`);

--
-- Indices de la tabla `local`
--
ALTER TABLE `local`
  ADD PRIMARY KEY (`id_local`,`id_inmueble`),
  ADD KEY `fk_local_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `municipio`
--
ALTER TABLE `municipio`
  ADD PRIMARY KEY (`id_municipio`);

--
-- Indices de la tabla `negocio`
--
ALTER TABLE `negocio`
  ADD PRIMARY KEY (`id_negocio`),
  ADD KEY `fk_negocio_local1_idx` (`local_id_inmueble`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`id_noticia`),
  ADD KEY `fk_noticia_municipio1_idx` (`id_municipio`),
  ADD KEY `fk_noticia_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  ADD PRIMARY KEY (`id_notificacion`),
  ADD KEY `fk_notificacion_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `oferta`
--
ALTER TABLE `oferta`
  ADD PRIMARY KEY (`id_oferta`),
  ADD KEY `fk_oferta_entidad1_idx` (`id_entidad`),
  ADD KEY `fk_id_negocio` (`id_negocio`);

--
-- Indices de la tabla `oferta_inmueble`
--
ALTER TABLE `oferta_inmueble`
  ADD PRIMARY KEY (`id_oferta`,`d_inmueble`),
  ADD KEY `fk_oferta_has_inmueble_inmueble1_idx` (`d_inmueble`),
  ADD KEY `fk_oferta_has_inmueble_oferta_idx` (`id_oferta`);

--
-- Indices de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  ADD PRIMARY KEY (`id_recuperar_password`),
  ADD KEY `fk_recuperar_pass_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `servicio`
--
ALTER TABLE `servicio`
  ADD PRIMARY KEY (`id_servicio`),
  ADD KEY `fk_servicio_tipo_servicio1_idx` (`id_tipo_servicio`),
  ADD KEY `fk_servicio_municipio1_idx` (`id_municipio`);

--
-- Indices de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  ADD PRIMARY KEY (`id_tipo_servicio`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD UNIQUE KEY `nif_UNIQUE` (`nif`),
  ADD UNIQUE KEY `correo_UNIQUE` (`correo_usuario`);

--
-- Indices de la tabla `usuario_entidad`
--
ALTER TABLE `usuario_entidad`
  ADD PRIMARY KEY (`id_usuario`,`id_entidad`),
  ADD KEY `fk_usuario_has_entidad_entidad1_idx` (`id_entidad`),
  ADD KEY `fk_usuario_has_entidad_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD PRIMARY KEY (`id_usuario`,`id_rol`),
  ADD KEY `fk_usuario_has_rol_rol1_idx` (`id_rol`);

--
-- Indices de la tabla `usuario_oferta`
--
ALTER TABLE `usuario_oferta`
  ADD PRIMARY KEY (`id_usuario`,`id_oferta`),
  ADD KEY `fk_usuario_has_oferta_oferta1_idx` (`id_oferta`),
  ADD KEY `fk_usuario_has_oferta_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `valorar_inmueble`
--
ALTER TABLE `valorar_inmueble`
  ADD PRIMARY KEY (`id_inmueble`),
  ADD KEY `fk_usuario_has_inmueble_inmueble1_idx` (`id_inmueble`);

--
-- Indices de la tabla `valorar_municipio`
--
ALTER TABLE `valorar_municipio`
  ADD PRIMARY KEY (`id_valorar_municipio`),
  ADD KEY `id_municipio` (`Id_municipio`),
  ADD KEY `id_usuario` (`Id_usuario`);

--
-- Indices de la tabla `valorar_negocio`
--
ALTER TABLE `valorar_negocio`
  ADD PRIMARY KEY (`id_usuario`,`id_negocio`),
  ADD KEY `fk_usuario_has_negocio_negocio1_idx` (`id_negocio`),
  ADD KEY `fk_usuario_has_negocio_usuario1_idx` (`id_usuario`);

--
-- Indices de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  ADD PRIMARY KEY (`id_vivienda`,`id_inmueble`),
  ADD KEY `fk_vivienda_inmueble1_idx` (`id_inmueble`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `aviso`
--
ALTER TABLE `aviso`
  MODIFY `id_aviso` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id_documento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT de la tabla `entidad`
--
ALTER TABLE `entidad`
  MODIFY `id_entidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `estado`
--
ALTER TABLE `estado`
  MODIFY `id_estado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `imagen`
--
ALTER TABLE `imagen`
  MODIFY `id_imagen` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT de la tabla `inmueble`
--
ALTER TABLE `inmueble`
  MODIFY `id_inmueble` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT de la tabla `local`
--
ALTER TABLE `local`
  MODIFY `id_local` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT de la tabla `municipio`
--
ALTER TABLE `municipio`
  MODIFY `id_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT de la tabla `negocio`
--
ALTER TABLE `negocio`
  MODIFY `id_negocio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `id_noticia` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `notificacion`
--
ALTER TABLE `notificacion`
  MODIFY `id_notificacion` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=313;

--
-- AUTO_INCREMENT de la tabla `oferta`
--
ALTER TABLE `oferta`
  MODIFY `id_oferta` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=107;

--
-- AUTO_INCREMENT de la tabla `recuperar_pass`
--
ALTER TABLE `recuperar_pass`
  MODIFY `id_recuperar_password` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `servicio`
--
ALTER TABLE `servicio`
  MODIFY `id_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT de la tabla `tipo_servicio`
--
ALTER TABLE `tipo_servicio`
  MODIFY `id_tipo_servicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `valorar_municipio`
--
ALTER TABLE `valorar_municipio`
  MODIFY `id_valorar_municipio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT de la tabla `vivienda`
--
ALTER TABLE `vivienda`
  MODIFY `id_vivienda` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usuario_has_rol`
--
ALTER TABLE `usuario_has_rol`
  ADD CONSTRAINT `fk_usuario` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id_usuario`);

--
-- Filtros para la tabla `valorar_municipio`
--
ALTER TABLE `valorar_municipio`
  ADD CONSTRAINT `id_municipio` FOREIGN KEY (`Id_municipio`) REFERENCES `municipio` (`id_municipio`),
  ADD CONSTRAINT `id_usuario` FOREIGN KEY (`Id_usuario`) REFERENCES `usuario` (`id_usuario`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
