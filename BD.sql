-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-03-2017 a las 21:17:12
-- Versión del servidor: 10.1.16-MariaDB
-- Versión de PHP: 5.5.38

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `yii2`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('administrador', '1', 1489521666),
('cliente', '2', 1489521728);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` int(11) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('administrador', 1, NULL, NULL, NULL, 1489521569, 1489521569),
('administrar', 2, 'administracion del sitio', NULL, NULL, 1489521569, 1489521569),
('calificar', 2, 'calificar especialidad y proyectos', NULL, NULL, 1489521568, 1489521568),
('cliente', 1, NULL, NULL, NULL, 1489521569, 1489521569),
('comentar', 2, 'comentar especialidad y proyectos', NULL, NULL, 1489521568, 1489521568);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('administrador', 'administrar'),
('administrador', 'cliente'),
('cliente', 'calificar'),
('cliente', 'comentar');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` text COLLATE utf8_unicode_ci,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoriaespecialidad`
--

CREATE TABLE `categoriaespecialidad` (
  `idCategoriaEspecialidad` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoriaespecialidad`
--

INSERT INTO `categoriaespecialidad` (`idCategoriaEspecialidad`, `Nombre`) VALUES
(1, 'Programacion'),
(2, 'Diseño');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioalumno`
--

CREATE TABLE `comentarioalumno` (
  `idComentarioAlumno` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioespecialidad`
--

CREATE TABLE `comentarioespecialidad` (
  `idComentarioEspecialidad` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Especialidad_idEspecialidades` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioevento`
--

CREATE TABLE `comentarioevento` (
  `idComentarioEvento` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `fecha` datetime NOT NULL,
  `evento_idevento` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarionoticia`
--

CREATE TABLE `comentarionoticia` (
  `idcomentarioNoticia` int(11) NOT NULL,
  `noticia_idnoticia` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentarioproyecto`
--

CREATE TABLE `comentarioproyecto` (
  `idComentarioProyecto` int(11) NOT NULL,
  `Descripcion` varchar(255) NOT NULL,
  `Fecha` datetime NOT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `contacto`
--

CREATE TABLE `contacto` (
  `idcontacto` int(11) NOT NULL,
  `nombre` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `leido` tinyint(1) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `mensaje` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `especialidad`
--

CREATE TABLE `especialidad` (
  `idEspecialidades` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Visitas` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `CategoriaEspecialidad_idCategoriaEspecialidad` int(11) NOT NULL,
  `TipoEspecialidad_idTipoEspecialidad` int(11) NOT NULL,
  `imagen` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `especialidad`
--

INSERT INTO `especialidad` (`idEspecialidades`, `Titulo`, `Descripcion`, `Visitas`, `user_id`, `CategoriaEspecialidad_idCategoriaEspecialidad`, `TipoEspecialidad_idTipoEspecialidad`, `imagen`) VALUES
(1, 'Photoshop CC 2016', '<p>There are many varians of sages of Lorem Ipsum available, but the mrity have suffered alteration in soe orm, by injected humour,There are many buthe mri have suffered alteration in some</p><p>but the mrity have suffered alteration in some orm, mora ekt', 59, 1, 1, 1, '1.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `evento`
--

CREATE TABLE `evento` (
  `idevento` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `hora_inicio` time(3) DEFAULT NULL,
  `hora_fin` time(3) DEFAULT NULL,
  `lugar` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `evento`
--

INSERT INTO `evento` (`idevento`, `titulo`, `descripcion`, `imagen`, `fecha`, `hora_inicio`, `hora_fin`, `lugar`, `user_id`) VALUES
(1, 'Learn English in ease', 'There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr sarata din megla', '1.jpg', '0000-00-00', '12:01:00.000', '12:01:00.000', 'Zacatecas IPN', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencia`
--

CREATE TABLE `experiencia` (
  `idExperiencia` int(11) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `valor` int(11) DEFAULT '0',
  `user_id` int(11) NOT NULL,
  `orientacion` int(11) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `experiencia`
--

INSERT INTO `experiencia` (`idExperiencia`, `descripcion`, `valor`, `user_id`, `orientacion`) VALUES
(1, 'Programming', 80, 1, 0),
(2, 'Programming', 75, 1, 1),
(3, 'Designing', 75, 1, 0),
(4, 'Creative Writing', 90, 1, 0),
(5, 'Designing', 80, 1, 1),
(6, 'English Lessons', 70, 1, 0),
(7, 'English Lessons', 100, 1, 1),
(8, 'Creative Writing', 90, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `maestro`
--

CREATE TABLE `maestro` (
  `idMaestro` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL,
  `imagen` varchar(100) DEFAULT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `linkFace` varchar(100) DEFAULT NULL,
  `linkTwitter` varchar(100) DEFAULT NULL,
  `linkGoogle` varchar(100) DEFAULT NULL,
  `linkInstagram` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `maestro`
--

INSERT INTO `maestro` (`idMaestro`, `nombre`, `tipo`, `imagen`, `descripcion`, `linkFace`, `linkTwitter`, `linkGoogle`, `linkInstagram`, `user_id`) VALUES
(1, 'Louis Smith', 'Teacher', '1.png', 'There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr', NULL, NULL, NULL, NULL, 1),
(2, 'Louis Smith', 'Teacher', 'l-2.jpg', 'There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr', NULL, NULL, NULL, NULL, 1),
(3, 'Louis Smith', 'Teacher', 'l-2.jpg', 'There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr', NULL, NULL, NULL, NULL, 1),
(4, 'Louis Smith', 'Teacher', 'l-2.jpg', 'There are many variaons of passa of Lorem Ipsuable, amrn in sofby injected humour, amr', NULL, NULL, NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1489521555),
('m140506_102106_rbac_init', 1489521560);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `noticia`
--

CREATE TABLE `noticia` (
  `idnoticia` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `descripcion` varchar(800) DEFAULT NULL,
  `imagen` varchar(45) DEFAULT NULL,
  `visitas` int(11) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `link` varchar(255) DEFAULT NULL,
  `fecha` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `noticia`
--

INSERT INTO `noticia` (`idnoticia`, `titulo`, `descripcion`, `imagen`, `visitas`, `user_id`, `link`, `fecha`) VALUES
(1, 'Learn English in ease', 'There are many variaons of passages of Lorem Ipsuable, amrn in some by injected humour, ', '1.jpg', 19, 1, NULL, '2012-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginacontacto`
--

CREATE TABLE `paginacontacto` (
  `idPaginaContacto` int(11) NOT NULL,
  `telefono` varchar(45) DEFAULT NULL,
  `correo` varchar(45) DEFAULT NULL,
  `direccion` varchar(100) DEFAULT NULL,
  `faceLink` varchar(100) DEFAULT NULL,
  `rssLink` varchar(100) DEFAULT NULL,
  `googleLink` varchar(100) DEFAULT NULL,
  `pintLink` varchar(100) DEFAULT NULL,
  `instagramLink` varchar(100) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `paginaWeb` varchar(100) DEFAULT NULL,
  `PiePagina` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paginacontacto`
--

INSERT INTO `paginacontacto` (`idPaginaContacto`, `telefono`, `correo`, `direccion`, `faceLink`, `rssLink`, `googleLink`, `pintLink`, `instagramLink`, `user_id`, `paginaWeb`, `PiePagina`) VALUES
(1, '+88 018 785 4589', 'devitems@email.com', 'ur address goes here,street.', NULL, NULL, NULL, NULL, NULL, 1, 'www.devitems.com', 'There are many variations of passg of Lorem Ipsum available, but thmajority have suffered altem.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginaenlaces`
--

CREATE TABLE `paginaenlaces` (
  `idEnlaces` int(11) NOT NULL,
  `titulo` varchar(45) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paginaenlaces`
--

INSERT INTO `paginaenlaces` (`idEnlaces`, `titulo`, `link`, `user_id`) VALUES
(1, 'Teachers & Staff', NULL, 1),
(2, 'Our Courses', NULL, 1),
(3, 'Courses Categories', NULL, 1),
(4, 'Support', NULL, 1),
(5, 'Terms & Conditions', NULL, 1),
(6, 'Privacy Policy', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginaimagenportada`
--

CREATE TABLE `paginaimagenportada` (
  `idPaginaImagenPortada` int(11) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paginaimagenportada`
--

INSERT INTO `paginaimagenportada` (`idPaginaImagenPortada`, `imagen`, `descripcion`, `user_id`) VALUES
(1, '1.jpg', 'INICIO', 1),
(2, '4.jpg', 'NOSOTROS', 1),
(3, '4.jpg', 'ESPECIALIDADES', 1),
(4, '4.jpg', 'PROYECTOS', 1),
(5, '4.jpg', 'NOTICIAS', 1),
(6, '4.jpg', 'EVENTOS', 1),
(7, '4.jpg', 'CONTACTO', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginainicio`
--

CREATE TABLE `paginainicio` (
  `idPaginaInicio` int(11) NOT NULL,
  `tituloPortada` varchar(100) NOT NULL,
  `descripcionPortada` varchar(500) NOT NULL,
  `cantidadAlumnos` int(11) NOT NULL,
  `cantidadPremios` int(11) NOT NULL,
  `imagenAlumnos` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL,
  `imagenCifras` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paginainicio`
--

INSERT INTO `paginainicio` (`idPaginaInicio`, `tituloPortada`, `descripcionPortada`, `cantidadAlumnos`, `cantidadPremios`, `imagenAlumnos`, `user_id`, `imagenCifras`) VALUES
(1, '¿ PORQUÉ UPIIZ ?', 'La carrera de <b>Ingeniería en Sistemas Computacionales</b> pertenece a la Unidad Profesional Interdisciplinaria de Ingeniería Campus Zacatecas (UPIIZ) del Instituto Politécnico Nacional (IPN). El IPN ocupa el tercer lugar a nivel nacional como mejor universidad.</p><p>El IPN te ofrece beca desde el primer semestre, movilidad internacional, asistencia a eventos como Campus Party, concursos de programación, certificaciones, cursos extracurriculares y mucho más.</p>', 700, 5, '3.jpg', 1, '2.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paginanosotros`
--

CREATE TABLE `paginanosotros` (
  `idPaginaNosotros` int(11) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `paginanosotros`
--

INSERT INTO `paginanosotros` (`idPaginaNosotros`, `descripcion`, `imagen`, `user_id`) VALUES
(1, '<p><span>Well come to Educat</span> come with us, we also teach children about the basic values of human beings as honesty, kindness, generosity, courage, freedom, equality and respect. Learn to celebrate diversity in a spirit of understanding and tolerance and develop a positive regard and awareness of other people. They are taught the values and responsibilities needed to become active members of the community, tolerance and develop something which the modern world is desperate for norem ipsum dolor sit amet desperate.</p><div class="about-us"><span>Nam gravida magna vitae ante dignissim</span><span>Duis rhoncus lectus at velit hendrerit quis</span><span>Sed fringilla tempor arcu feugiat risus</span><span>Vivamus semper odio in nibh ultricies</span></div><p>Snos trud exerci tation ullorper suscipit lobo maeisrn roester maeoirqs iserrtis nisl ut aliq poerwse thesr oper balinp asein hoinws mawsoib equat. Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more tolerance and develop obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through makin of the word in classical literature.</p>', '6.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proyecto`
--

CREATE TABLE `proyecto` (
  `idProyecto` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(255) DEFAULT NULL,
  `Url` varchar(100) DEFAULT NULL,
  `Imagen` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `Fecha` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `proyecto`
--

INSERT INTO `proyecto` (`idProyecto`, `Titulo`, `Descripcion`, `Url`, `Imagen`, `user_id`, `Fecha`) VALUES
(1, 'Title Product Here', 'Book', NULL, '2.jpg', 1, '2012-10-08 00:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratingespecialidad`
--

CREATE TABLE `ratingespecialidad` (
  `idRatingEspecialidad` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Especialidad_idEspecialidades` int(11) NOT NULL,
  `Rating` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ratingproyecto`
--

CREATE TABLE `ratingproyecto` (
  `idRatingProyecto` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Proyecto_idProyecto` int(11) NOT NULL,
  `Rating` float DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `slide`
--

CREATE TABLE `slide` (
  `idSlide` int(11) NOT NULL,
  `Titulo` varchar(45) DEFAULT NULL,
  `Descripcion` varchar(500) DEFAULT NULL,
  `Imagen` varchar(45) DEFAULT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `slide`
--

INSERT INTO `slide` (`idSlide`, `Titulo`, `Descripcion`, `Imagen`, `user_id`) VALUES
(1, 'Education Needs<br>Complete Solution', 'There are many variations of passages of Lorem Ipsum available, but the majority have<br>suffered alteration in some form, by injected humour, or randomised words which<br>don''t look even slightly believable.', '1.jpg', 1),
(2, 'Education Needs<br>Complete Solution2', 'There are many variations of passages of Lorem Ipsum available, but the majority have<br>suffered alteration in some form, by injected humour, or randomised words which<br>don''t look even slightly believable.', '4.jpg', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipoespecialidad`
--

CREATE TABLE `tipoespecialidad` (
  `idTipoEspecialidad` int(11) NOT NULL,
  `Nombre` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipoespecialidad`
--

INSERT INTO `tipoespecialidad` (`idTipoEspecialidad`, `Nombre`) VALUES
(1, 'Diseño web'),
(2, 'Desarrollo');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `auth_key` varchar(32) DEFAULT NULL,
  `password_hash` varchar(255) NOT NULL,
  `password_reset_token` varchar(255) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `status` smallint(6) DEFAULT NULL,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL,
  `nombre` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `nombre`) VALUES
(1, 'admin', 'f3yRrudthere3f9YOUH4K1DWU_qQ1fap', '$2y$13$Gh3FdBUNuxDlWsC4tRwCReo7UZm1sgsH9IFedvKF.cQdKaOUnPnkC', NULL, 'admin@admin.com', 10, 1489521666, 1489521666, NULL),
(2, 'cliente', 'ZYpuIBXsM40z4sf2Q1H9aiSGXr5qMc65', '$2y$13$YgpjVS8bm0z/qeC.zpBKHOetR7.Q73mqUxIm0Eh424Hjf91dEIhxe', NULL, 'cliente@cliente.com', 10, 1489521728, 1489521728, NULL);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`);

--
-- Indices de la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Indices de la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Indices de la tabla `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Indices de la tabla `categoriaespecialidad`
--
ALTER TABLE `categoriaespecialidad`
  ADD PRIMARY KEY (`idCategoriaEspecialidad`);

--
-- Indices de la tabla `comentarioalumno`
--
ALTER TABLE `comentarioalumno`
  ADD PRIMARY KEY (`idComentarioAlumno`,`user_id`),
  ADD KEY `fk_ComentarioAlumno_user1_idx` (`user_id`);

--
-- Indices de la tabla `comentarioespecialidad`
--
ALTER TABLE `comentarioespecialidad`
  ADD PRIMARY KEY (`idComentarioEspecialidad`,`Especialidad_idEspecialidades`,`user_id`),
  ADD KEY `fk_ComentarioEspecialidad_Especialidad1_idx` (`Especialidad_idEspecialidades`),
  ADD KEY `fk_ComentarioEspecialidad_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `comentarioevento`
--
ALTER TABLE `comentarioevento`
  ADD PRIMARY KEY (`idComentarioEvento`,`evento_idevento`,`user_id`),
  ADD KEY `fk_ComentarioEvento_evento1_idx` (`evento_idevento`),
  ADD KEY `fk_ComentarioEvento_user1_idx` (`user_id`);

--
-- Indices de la tabla `comentarionoticia`
--
ALTER TABLE `comentarionoticia`
  ADD PRIMARY KEY (`idcomentarioNoticia`,`noticia_idnoticia`,`user_id`),
  ADD KEY `fk_comentarioNoticia_noticia1_idx` (`noticia_idnoticia`),
  ADD KEY `fk_comentarioNoticia_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `comentarioproyecto`
--
ALTER TABLE `comentarioproyecto`
  ADD PRIMARY KEY (`idComentarioProyecto`,`Proyecto_idProyecto`,`user_id`),
  ADD KEY `fk_ComentarioProyecto_Proyecto1_idx` (`Proyecto_idProyecto`),
  ADD KEY `fk_ComentarioProyecto_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD PRIMARY KEY (`idcontacto`,`user_id`),
  ADD KEY `fk_contacto_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD PRIMARY KEY (`idEspecialidades`,`user_id`,`CategoriaEspecialidad_idCategoriaEspecialidad`,`TipoEspecialidad_idTipoEspecialidad`),
  ADD KEY `fk_Especialidad_Usuario1_idx` (`user_id`),
  ADD KEY `fk_Especialidad_CategoriaEspecialidad1_idx` (`CategoriaEspecialidad_idCategoriaEspecialidad`),
  ADD KEY `fk_Especialidad_TipoEspecialidad1_idx` (`TipoEspecialidad_idTipoEspecialidad`);

--
-- Indices de la tabla `evento`
--
ALTER TABLE `evento`
  ADD PRIMARY KEY (`idevento`,`user_id`),
  ADD KEY `fk_evento_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD PRIMARY KEY (`idExperiencia`,`user_id`),
  ADD KEY `fk_Experiencia_user1_idx` (`user_id`);

--
-- Indices de la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD PRIMARY KEY (`idMaestro`,`user_id`),
  ADD KEY `fk_Maestro_user1_idx` (`user_id`);

--
-- Indices de la tabla `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Indices de la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD PRIMARY KEY (`idnoticia`,`user_id`),
  ADD KEY `fk_noticia_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `paginacontacto`
--
ALTER TABLE `paginacontacto`
  ADD PRIMARY KEY (`idPaginaContacto`,`user_id`),
  ADD KEY `fk_PaginaContacto_user1_idx` (`user_id`);

--
-- Indices de la tabla `paginaenlaces`
--
ALTER TABLE `paginaenlaces`
  ADD PRIMARY KEY (`idEnlaces`,`user_id`),
  ADD KEY `fk_PaginaEnlaces_user1_idx` (`user_id`);

--
-- Indices de la tabla `paginaimagenportada`
--
ALTER TABLE `paginaimagenportada`
  ADD PRIMARY KEY (`idPaginaImagenPortada`,`user_id`),
  ADD KEY `fk_PaginaImagenPortada_user1_idx` (`user_id`);

--
-- Indices de la tabla `paginainicio`
--
ALTER TABLE `paginainicio`
  ADD PRIMARY KEY (`idPaginaInicio`,`user_id`),
  ADD KEY `fk_PaginaInicio_user1_idx` (`user_id`);

--
-- Indices de la tabla `paginanosotros`
--
ALTER TABLE `paginanosotros`
  ADD PRIMARY KEY (`idPaginaNosotros`,`user_id`),
  ADD KEY `fk_PaginaNosotros_user1_idx` (`user_id`);

--
-- Indices de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD PRIMARY KEY (`idProyecto`,`user_id`),
  ADD KEY `fk_Proyecto_Usuario1_idx` (`user_id`);

--
-- Indices de la tabla `ratingespecialidad`
--
ALTER TABLE `ratingespecialidad`
  ADD PRIMARY KEY (`idRatingEspecialidad`,`user_id`,`Especialidad_idEspecialidades`),
  ADD KEY `fk_ratingEspecialidad_Usuario1_idx` (`user_id`),
  ADD KEY `fk_ratingEspecialidad_Especialidad1_idx` (`Especialidad_idEspecialidades`);

--
-- Indices de la tabla `ratingproyecto`
--
ALTER TABLE `ratingproyecto`
  ADD PRIMARY KEY (`idRatingProyecto`,`user_id`,`Proyecto_idProyecto`),
  ADD KEY `fk_ratingProyecto_Usuario1_idx` (`user_id`),
  ADD KEY `fk_ratingProyecto_Proyecto1_idx` (`Proyecto_idProyecto`);

--
-- Indices de la tabla `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`idSlide`,`user_id`),
  ADD KEY `fk_Slide_user1_idx` (`user_id`);

--
-- Indices de la tabla `tipoespecialidad`
--
ALTER TABLE `tipoespecialidad`
  ADD PRIMARY KEY (`idTipoEspecialidad`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoriaespecialidad`
--
ALTER TABLE `categoriaespecialidad`
  MODIFY `idCategoriaEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `comentarioalumno`
--
ALTER TABLE `comentarioalumno`
  MODIFY `idComentarioAlumno` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarioespecialidad`
--
ALTER TABLE `comentarioespecialidad`
  MODIFY `idComentarioEspecialidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarioevento`
--
ALTER TABLE `comentarioevento`
  MODIFY `idComentarioEvento` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarionoticia`
--
ALTER TABLE `comentarionoticia`
  MODIFY `idcomentarioNoticia` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `comentarioproyecto`
--
ALTER TABLE `comentarioproyecto`
  MODIFY `idComentarioProyecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `contacto`
--
ALTER TABLE `contacto`
  MODIFY `idcontacto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `especialidad`
--
ALTER TABLE `especialidad`
  MODIFY `idEspecialidades` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `evento`
--
ALTER TABLE `evento`
  MODIFY `idevento` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `experiencia`
--
ALTER TABLE `experiencia`
  MODIFY `idExperiencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT de la tabla `maestro`
--
ALTER TABLE `maestro`
  MODIFY `idMaestro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `noticia`
--
ALTER TABLE `noticia`
  MODIFY `idnoticia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `paginacontacto`
--
ALTER TABLE `paginacontacto`
  MODIFY `idPaginaContacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `paginaenlaces`
--
ALTER TABLE `paginaenlaces`
  MODIFY `idEnlaces` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT de la tabla `paginaimagenportada`
--
ALTER TABLE `paginaimagenportada`
  MODIFY `idPaginaImagenPortada` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `paginainicio`
--
ALTER TABLE `paginainicio`
  MODIFY `idPaginaInicio` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `paginanosotros`
--
ALTER TABLE `paginanosotros`
  MODIFY `idPaginaNosotros` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `proyecto`
--
ALTER TABLE `proyecto`
  MODIFY `idProyecto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `ratingespecialidad`
--
ALTER TABLE `ratingespecialidad`
  MODIFY `idRatingEspecialidad` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `ratingproyecto`
--
ALTER TABLE `ratingproyecto`
  MODIFY `idRatingProyecto` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `slide`
--
ALTER TABLE `slide`
  MODIFY `idSlide` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `tipoespecialidad`
--
ALTER TABLE `tipoespecialidad`
  MODIFY `idTipoEspecialidad` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD CONSTRAINT `auth_assignment_ibfk_1` FOREIGN KEY (`item_name`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item`
--
ALTER TABLE `auth_item`
  ADD CONSTRAINT `auth_item_ibfk_1` FOREIGN KEY (`rule_name`) REFERENCES `auth_rule` (`name`) ON DELETE SET NULL ON UPDATE CASCADE;

--
-- Filtros para la tabla `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD CONSTRAINT `auth_item_child_ibfk_1` FOREIGN KEY (`parent`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `auth_item_child_ibfk_2` FOREIGN KEY (`child`) REFERENCES `auth_item` (`name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `comentarioalumno`
--
ALTER TABLE `comentarioalumno`
  ADD CONSTRAINT `fk_ComentarioAlumno_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarioespecialidad`
--
ALTER TABLE `comentarioespecialidad`
  ADD CONSTRAINT `fk_ComentarioEspecialidad_Especialidad1` FOREIGN KEY (`Especialidad_idEspecialidades`) REFERENCES `especialidad` (`idEspecialidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ComentarioEspecialidad_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarioevento`
--
ALTER TABLE `comentarioevento`
  ADD CONSTRAINT `fk_ComentarioEvento_evento1` FOREIGN KEY (`evento_idevento`) REFERENCES `evento` (`idevento`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ComentarioEvento_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarionoticia`
--
ALTER TABLE `comentarionoticia`
  ADD CONSTRAINT `fk_comentarioNoticia_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_comentarioNoticia_noticia1` FOREIGN KEY (`noticia_idnoticia`) REFERENCES `noticia` (`idnoticia`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `comentarioproyecto`
--
ALTER TABLE `comentarioproyecto`
  ADD CONSTRAINT `fk_ComentarioProyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ComentarioProyecto_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `contacto`
--
ALTER TABLE `contacto`
  ADD CONSTRAINT `fk_contacto_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `especialidad`
--
ALTER TABLE `especialidad`
  ADD CONSTRAINT `fk_Especialidad_CategoriaEspecialidad1` FOREIGN KEY (`CategoriaEspecialidad_idCategoriaEspecialidad`) REFERENCES `categoriaespecialidad` (`idCategoriaEspecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Especialidad_TipoEspecialidad1` FOREIGN KEY (`TipoEspecialidad_idTipoEspecialidad`) REFERENCES `tipoespecialidad` (`idTipoEspecialidad`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Especialidad_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `evento`
--
ALTER TABLE `evento`
  ADD CONSTRAINT `fk_evento_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `experiencia`
--
ALTER TABLE `experiencia`
  ADD CONSTRAINT `fk_Experiencia_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `maestro`
--
ALTER TABLE `maestro`
  ADD CONSTRAINT `fk_Maestro_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `noticia`
--
ALTER TABLE `noticia`
  ADD CONSTRAINT `fk_noticia_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paginacontacto`
--
ALTER TABLE `paginacontacto`
  ADD CONSTRAINT `fk_PaginaContacto_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paginaenlaces`
--
ALTER TABLE `paginaenlaces`
  ADD CONSTRAINT `fk_PaginaEnlaces_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paginaimagenportada`
--
ALTER TABLE `paginaimagenportada`
  ADD CONSTRAINT `fk_PaginaImagenPortada_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paginainicio`
--
ALTER TABLE `paginainicio`
  ADD CONSTRAINT `fk_PaginaInicio_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paginanosotros`
--
ALTER TABLE `paginanosotros`
  ADD CONSTRAINT `fk_PaginaNosotros_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `proyecto`
--
ALTER TABLE `proyecto`
  ADD CONSTRAINT `fk_Proyecto_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ratingespecialidad`
--
ALTER TABLE `ratingespecialidad`
  ADD CONSTRAINT `fk_ratingEspecialidad_Especialidad1` FOREIGN KEY (`Especialidad_idEspecialidades`) REFERENCES `especialidad` (`idEspecialidades`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ratingEspecialidad_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `ratingproyecto`
--
ALTER TABLE `ratingproyecto`
  ADD CONSTRAINT `fk_ratingProyecto_Proyecto1` FOREIGN KEY (`Proyecto_idProyecto`) REFERENCES `proyecto` (`idProyecto`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ratingProyecto_Usuario1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `slide`
--
ALTER TABLE `slide`
  ADD CONSTRAINT `fk_Slide_user1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
