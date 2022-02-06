-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 06-02-2022 a las 23:51:17
-- Versión del servidor: 10.4.21-MariaDB
-- Versión de PHP: 7.3.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bd_tesjo`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cierreproyecto`
--

CREATE TABLE `cierreproyecto` (
  `id_cierreproyecto` int(11) NOT NULL,
  `opcion` varchar(11) NOT NULL,
  `razon` varchar(1000) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `division`
--

CREATE TABLE `division` (
  `id_division` int(11) NOT NULL,
  `division` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `division`
--

INSERT INTO `division` (`id_division`, `division`) VALUES
(1, 'Arquitectura'),
(2, 'Contador Público'),
(3, 'Ingeniería Electomecánica'),
(4, 'Ingeniería en Gestión Empresarial'),
(5, 'Ingeniería Industrial'),
(6, 'Ingeniería en Materiales'),
(7, 'Ingeniería Mecatrónica'),
(8, 'Ingeniería Química'),
(9, 'Ingeniería en Sistemas Computacionales');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `informe`
--

CREATE TABLE `informe` (
  `id_informe` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `numeroinforme` int(11) NOT NULL,
  `inicioinforme` date NOT NULL,
  `fininforme` date NOT NULL,
  `resumen` varchar(1000) NOT NULL,
  `segumientocronograma` varchar(1000) NOT NULL,
  `fechacronograma` date NOT NULL,
  `impacto` varchar(1000) NOT NULL,
  `observaciones` varchar(1000) NOT NULL,
  `id_cierreproyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `contraseña` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`id_login`, `usuario`, `contraseña`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoesperado`
--

CREATE TABLE `productoesperado` (
  `id_Productoesperado` int(11) NOT NULL,
  `productoE` varchar(100) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `productoesperado`
--

INSERT INTO `productoesperado` (`id_Productoesperado`, `productoE`, `cantidad`, `fecha`, `id_proyecto`) VALUES
(2, 'Articulo indizado', 2, '2022-01-10', 83),
(3, 'Libro', 1, '2022-01-10', 83);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productoobtenido`
--

CREATE TABLE `productoobtenido` (
  `id_productoobtenido` int(11) NOT NULL,
  `producto` varchar(55) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `id_informe` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `id_proyecto` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `nombre` varchar(25) NOT NULL,
  `clave` int(11) NOT NULL,
  `contraseña` varchar(20) NOT NULL,
  `fechainicioproyecto` date NOT NULL,
  `fechafinalproyecto` date NOT NULL,
  `objetivo` varchar(1000) NOT NULL,
  `duracion` int(11) NOT NULL,
  `instituciones` varchar(200) NOT NULL,
  `requerimiento` varchar(1000) NOT NULL,
  `cronograma` varchar(100) NOT NULL,
  `id_division` int(11) NOT NULL,
  `id_tipoinvestigacion` int(11) NOT NULL,
  `id_sector` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`id_proyecto`, `fecha`, `nombre`, `clave`, `contraseña`, `fechainicioproyecto`, `fechafinalproyecto`, `objetivo`, `duracion`, `instituciones`, `requerimiento`, `cronograma`, `id_division`, `id_tipoinvestigacion`, `id_sector`) VALUES
(81, '2022-01-10', 'mi gran proyecto xd', 220104, '123456', '2022-01-13', '2022-02-13', 'tfvgbhnj', 1, '', 'rdcfvgbhu', 'files/', 6, 2, 2),
(82, '2022-01-10', 'mi gran proyecto xd', 220185, '123456', '2022-01-08', '2022-02-08', 'esdrtfgyhu', 1, '', 'dcrtfvgbyh', 'files/El-gran-libro-de-HTML5-CSS3-y-JavaScript.pdf', 3, 2, 1),
(83, '2022-01-10', 'El proyecto', 220160, '123456', '2021-12-30', '2022-03-02', 'objetivos', 2, '', 'requerimientos', 'files/', 5, 2, 1),
(84, '2022-01-10', 'mi gran proyecto xd', 220118, '123456', '2021-12-30', '2022-01-30', 'uio', 1, '', 'ybghunj', 'files/', 5, 1, 2),
(85, '2021-11-15', 'nuevo', 3243232, 'dsv', '2022-01-12', '2022-01-16', 'vdfv', 3, 'vdfvfdv', 'vdfvf', 'vfdvdfv', 1, 1, 4);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `responsables`
--

CREATE TABLE `responsables` (
  `id_responsable` int(11) NOT NULL,
  `nombre_res` varchar(35) NOT NULL,
  `apePa` varchar(35) NOT NULL,
  `apeMa` varchar(35) NOT NULL,
  `rol` varchar(25) NOT NULL,
  `correo` varchar(30) NOT NULL,
  `id_proyecto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `responsables`
--

INSERT INTO `responsables` (`id_responsable`, `nombre_res`, `apePa`, `apeMa`, `rol`, `correo`, `id_proyecto`) VALUES
(5, 'Abdalan', 'Bernardino', 'Hidalgo', 'PTC', '2017150480138@tesjo.edu.mx', 81),
(6, 'Abdalan', 'Bernardino', 'Hidalgo', 'estudiante', '2017150480138@tesjo.edu.mx', 82),
(7, 'Abdalan', 'Bernardino', 'Hidalgo', 'PTC', '2017150480138@tesjo.edu.mx', 83),
(8, 'M. Sandra C.', 'Rodrígue', 'Hidalgo', 'estudiante', '2017150480138@tesjo.edu.mx', 84);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `revision`
--

CREATE TABLE `revision` (
  `id_revision` int(11) NOT NULL,
  `id_proyecto` int(11) NOT NULL,
  `lineaInvestigacion` varchar(100) NOT NULL,
  `proyecto` varchar(100) NOT NULL,
  `campoFormacion` varchar(100) NOT NULL,
  `terminados` varchar(100) NOT NULL,
  `presupuestoSolicitado` varchar(100) NOT NULL,
  `presupuestoAsignado` varchar(100) NOT NULL,
  `fechaAsignacion` date NOT NULL,
  `fuenteFinanciamiento` varchar(100) NOT NULL,
  `totalProfesor` varchar(100) NOT NULL,
  `totalEstudiante` varchar(100) NOT NULL,
  `vigente` varchar(10) NOT NULL,
  `egoraciones` varchar(100) NOT NULL,
  `articuloPublicado` varchar(100) NOT NULL,
  `ponencia` varchar(100) NOT NULL,
  `tesisElaborada` varchar(100) NOT NULL,
  `patentado` varchar(10) NOT NULL,
  `sectorDestinatario` varchar(100) NOT NULL,
  `resultadoAlcanzado` varchar(100) NOT NULL,
  `registradoTecNM` varchar(10) NOT NULL,
  `registradoOtro` varchar(100) NOT NULL,
  `proyectoFinanciado` varchar(10) NOT NULL,
  `proyectoTecnologia` varchar(100) NOT NULL,
  `proyectoRed` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `revision`
--

INSERT INTO `revision` (`id_revision`, `id_proyecto`, `lineaInvestigacion`, `proyecto`, `campoFormacion`, `terminados`, `presupuestoSolicitado`, `presupuestoAsignado`, `fechaAsignacion`, `fuenteFinanciamiento`, `totalProfesor`, `totalEstudiante`, `vigente`, `egoraciones`, `articuloPublicado`, `ponencia`, `tesisElaborada`, `patentado`, `sectorDestinatario`, `resultadoAlcanzado`, `registradoTecNM`, `registradoOtro`, `proyectoFinanciado`, `proyectoTecnologia`, `proyectoRed`) VALUES
(8, 81, ' ', ' ', ' ', ' ', ' ', ' ', '0000-00-00', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(9, 82, '$lineaInvestigacion', '$proyecto', '$campoFormacion', '$terminados', '$presupuestoSolicitado', '$presupuestoAsignado', '2020-01-20', '$fuenteFinanciamiento', '$totalProfesor', '$totalEstudiante', '$vigente', '$egoraciones', '$articuloPublicado', '$ponencia', '$tesisElaborada', '$patentado', '$sectorDestinatario', '$resultadoAlcanzado', '$regi', '$registradoOtro', '$proyeo', '$proyectoTecnologia', '$proyectoRed'),
(10, 83, ' inea', ' ', ' ', ' ', ' ', ' ', '2022-01-27', ' ', ' ', ' ', 'Si', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(11, 84, ' ', ' ', ' ', ' ', ' ', ' ', '0000-00-00', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' '),
(13, 81, ' ', ' ', ' ', ' ', ' ', ' ', '0000-00-00', ' ', ' ', ' ', 'Si', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ', ' ');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `sector`
--

CREATE TABLE `sector` (
  `id_sector` int(11) NOT NULL,
  `sector` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `sector`
--

INSERT INTO `sector` (`id_sector`, `sector`) VALUES
(1, 'Público'),
(2, 'Privado'),
(3, 'Social'),
(4, 'Productivo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoinvestigacion`
--

CREATE TABLE `tipoinvestigacion` (
  `id_tipoinvestigacion` int(50) NOT NULL,
  `investigacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipoinvestigacion`
--

INSERT INTO `tipoinvestigacion` (`id_tipoinvestigacion`, `investigacion`) VALUES
(1, 'Básica'),
(2, 'Aplicada'),
(3, 'Desarrollo');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cierreproyecto`
--
ALTER TABLE `cierreproyecto`
  ADD PRIMARY KEY (`id_cierreproyecto`);

--
-- Indices de la tabla `division`
--
ALTER TABLE `division`
  ADD PRIMARY KEY (`id_division`);

--
-- Indices de la tabla `informe`
--
ALTER TABLE `informe`
  ADD PRIMARY KEY (`id_informe`),
  ADD KEY `id_cierreproyecto` (`id_cierreproyecto`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id_login`);

--
-- Indices de la tabla `productoesperado`
--
ALTER TABLE `productoesperado`
  ADD PRIMARY KEY (`id_Productoesperado`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `productoobtenido`
--
ALTER TABLE `productoobtenido`
  ADD PRIMARY KEY (`id_productoobtenido`),
  ADD KEY `id_informe` (`id_informe`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`id_proyecto`),
  ADD KEY `id_division` (`id_division`),
  ADD KEY `id_tipoinvestigacion` (`id_tipoinvestigacion`),
  ADD KEY `id_sector` (`id_sector`);

--
-- Indices de la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD PRIMARY KEY (`id_responsable`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `revision`
--
ALTER TABLE `revision`
  ADD PRIMARY KEY (`id_revision`),
  ADD KEY `id_proyecto` (`id_proyecto`);

--
-- Indices de la tabla `sector`
--
ALTER TABLE `sector`
  ADD PRIMARY KEY (`id_sector`);

--
-- Indices de la tabla `tipoinvestigacion`
--
ALTER TABLE `tipoinvestigacion`
  ADD PRIMARY KEY (`id_tipoinvestigacion`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cierreproyecto`
--
ALTER TABLE `cierreproyecto`
  MODIFY `id_cierreproyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `division`
--
ALTER TABLE `division`
  MODIFY `id_division` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `informe`
--
ALTER TABLE `informe`
  MODIFY `id_informe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `productoesperado`
--
ALTER TABLE `productoesperado`
  MODIFY `id_Productoesperado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productoobtenido`
--
ALTER TABLE `productoobtenido`
  MODIFY `id_productoobtenido` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `id_proyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT de la tabla `responsables`
--
ALTER TABLE `responsables`
  MODIFY `id_responsable` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `revision`
--
ALTER TABLE `revision`
  MODIFY `id_revision` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `sector`
--
ALTER TABLE `sector`
  MODIFY `id_sector` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `tipoinvestigacion`
--
ALTER TABLE `tipoinvestigacion`
  MODIFY `id_tipoinvestigacion` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `informe`
--
ALTER TABLE `informe`
  ADD CONSTRAINT `informe_ibfk_1` FOREIGN KEY (`id_cierreproyecto`) REFERENCES `cierreproyecto` (`id_cierreproyecto`),
  ADD CONSTRAINT `informe_ibfk_2` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `productoesperado`
--
ALTER TABLE `productoesperado`
  ADD CONSTRAINT `productoesperado_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `productoobtenido`
--
ALTER TABLE `productoobtenido`
  ADD CONSTRAINT `productoobtenido_ibfk_1` FOREIGN KEY (`id_informe`) REFERENCES `informe` (`id_informe`);

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `proyecto_ibfk_1` FOREIGN KEY (`id_sector`) REFERENCES `sector` (`id_sector`),
  ADD CONSTRAINT `proyecto_ibfk_2` FOREIGN KEY (`id_division`) REFERENCES `division` (`id_division`),
  ADD CONSTRAINT `proyecto_ibfk_5` FOREIGN KEY (`id_tipoinvestigacion`) REFERENCES `tipoinvestigacion` (`id_tipoinvestigacion`);

--
-- Filtros para la tabla `responsables`
--
ALTER TABLE `responsables`
  ADD CONSTRAINT `responsables_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);

--
-- Filtros para la tabla `revision`
--
ALTER TABLE `revision`
  ADD CONSTRAINT `revision_ibfk_1` FOREIGN KEY (`id_proyecto`) REFERENCES `proyecto` (`id_proyecto`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
