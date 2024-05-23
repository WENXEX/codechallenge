-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-05-2024 a las 01:07:02
-- Versión del servidor: 8.0.31
-- Versión de PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `control_incidenias`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `coordinadores`
--

CREATE TABLE `coordinadores` (
  `Id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Nombre` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Usuario` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Correo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Contraseña` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estados`
--

CREATE TABLE `estados` (
  `Id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Estado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `incidencias`
--

CREATE TABLE `incidencias` (
  `Id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Titulo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Descripcion` json NOT NULL,
  `Fecha` datetime NOT NULL,
  `Id_estado` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_Prioridad` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_coordinador` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `nivel_de_prioridad`
--

CREATE TABLE `nivel_de_prioridad` (
  `Id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Nivel` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `reasignacion`
--

CREATE TABLE `reasignacion` (
  `Id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_coordinador_Nuevo` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_coordinador` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revisiones`
--

CREATE TABLE `revisiones` (
  `Id` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Descripcion` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_coordinador` varchar(50) COLLATE utf8mb4_general_ci NOT NULL,
  `Id_incidencia` varchar(50) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `coordinadores`
--
ALTER TABLE `coordinadores`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `estados`
--
ALTER TABLE `estados`ś
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `incidencias`
--
ALTER TABLE `incidencias`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `nivel_de_prioridad`
--
ALTER TABLE `nivel_de_prioridad`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `reasignacion`
--
ALTER TABLE `reasignacion`
  ADD PRIMARY KEY (`Id`);

--
-- Indices de la tabla `revisiones`
--
ALTER TABLE `revisiones`
  ADD PRIMARY KEY (`Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
