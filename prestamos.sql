-- phpMyAdmin SQL Dump
-- version 4.7.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 22, 2017 at 04:22 PM
-- Server version: 10.1.24-MariaDB
-- PHP Version: 7.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prestamos`
--

-- --------------------------------------------------------

--
-- Table structure for table `autor`
--

CREATE TABLE `autor` (
  `autor_id` int(6) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `nacionalidad` varchar(45) DEFAULT NULL,
  `nacimiento` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor`
--

INSERT INTO `autor` (`autor_id`, `nombre`, `nacionalidad`, `nacimiento`) VALUES
(1, 'Gabriel García Márquez', NULL, NULL),
(2, 'William Shakespeare', NULL, NULL),
(3, 'Miguel De Cervantes Saavedra', NULL, NULL),
(4, 'Pablo Neruda', NULL, NULL),
(5, 'Mario Vargas Llosa', NULL, NULL),
(6, 'Ana Frank', NULL, NULL),
(7, 'Mario Benedetti', NULL, NULL),
(8, 'Paulo Coelho', NULL, NULL),
(9, 'Jorge Luis Borges', NULL, NULL),
(10, 'Charles Dickens', NULL, NULL),
(11, 'Federico García Lorca', NULL, NULL),
(12, 'Gabriela Mistral', NULL, NULL),
(13, 'Isabel Allende', NULL, NULL),
(14, 'Agatha Christie', NULL, NULL),
(15, 'Nicolás Maquiavelo', NULL, NULL),
(16, 'Alejandro Dumas', NULL, NULL),
(17, 'Albert Camus', NULL, NULL),
(18, 'Rosalia de Castro', NULL, NULL),
(19, 'José Mauro De Vasconcelos', NULL, NULL),
(20, 'José Pablo Feinmann', NULL, NULL),
(21, 'Arturo Pérez-Reverte', NULL, NULL),
(22, 'Pedro Antonio de Alarcón', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `autor_has_libros`
--

CREATE TABLE `autor_has_libros` (
  `autor_autor_id` int(6) NOT NULL,
  `libros_libros_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `autor_has_libros`
--

INSERT INTO `autor_has_libros` (`autor_autor_id`, `libros_libros_id`) VALUES
(2, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Table structure for table `deposito`
--

CREATE TABLE `deposito` (
  `deposito_id` smallint(6) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `deposito`
--

INSERT INTO `deposito` (`deposito_id`, `descripcion`) VALUES
(1, 'Depósito 1'),
(2, 'Depósito 2');

-- --------------------------------------------------------

--
-- Table structure for table `estado`
--

CREATE TABLE `estado` (
  `estado_id` smallint(6) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado`
--

INSERT INTO `estado` (`estado_id`, `descripcion`) VALUES
(1, 'Disponible'),
(2, 'Prestado'),
(3, 'En reparación'),
(4, 'De baja');

-- --------------------------------------------------------

--
-- Table structure for table `estado_lector`
--

CREATE TABLE `estado_lector` (
  `estado_id` int(11) NOT NULL,
  `descripcion` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `estado_lector`
--

INSERT INTO `estado_lector` (`estado_id`, `descripcion`) VALUES
(1, 'Activo'),
(2, 'Sancionado');

-- --------------------------------------------------------

--
-- Table structure for table `lectores`
--

CREATE TABLE `lectores` (
  `lectores_id` int(11) NOT NULL,
  `nombre` varchar(45) NOT NULL,
  `documento` varchar(45) NOT NULL,
  `tipo_lector_id` int(6) NOT NULL,
  `tipo_documento_id` int(6) NOT NULL,
  `direccion` varchar(70) DEFAULT NULL,
  `telefono` varchar(15) DEFAULT NULL,
  `mail` varchar(50) DEFAULT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `estado` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `lectores`
--

INSERT INTO `lectores` (`lectores_id`, `nombre`, `documento`, `tipo_lector_id`, `tipo_documento_id`, `direccion`, `telefono`, `mail`, `created_at`, `updated_at`, `created_by`, `updated_by`, `estado`) VALUES
(1, 'Alejandro Lopez', '18225744', 4, 1, 'Jose Hernandez 2248', '36599872', 'lopalejandro@gmail.com', '2017-06-14 16:03:56', '2017-06-14 16:03:56', NULL, NULL, 1),
(2, 'Marisa Concheso', '21116047', 1, 1, '', '', '', '2017-06-15 11:45:22', '2017-06-15 11:45:22', NULL, NULL, 1),
(3, 'Lector 3', '25689752', 2, 2, '', '', '', '2017-06-22 11:36:27', '2017-06-22 11:36:27', NULL, NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `libros`
--

CREATE TABLE `libros` (
  `libros_id` int(11) NOT NULL,
  `titulo` varchar(45) NOT NULL,
  `editorial` varchar(45) DEFAULT NULL,
  `ano` int(11) DEFAULT NULL,
  `edicion` int(11) DEFAULT NULL,
  `ejemplar` int(11) NOT NULL,
  `nro_libro` int(11) NOT NULL,
  `estado_id` smallint(6) NOT NULL,
  `deposito_id` smallint(6) NOT NULL,
  `tipo_libro_id` smallint(6) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `libros`
--

INSERT INTO `libros` (`libros_id`, `titulo`, `editorial`, `ano`, `edicion`, `ejemplar`, `nro_libro`, `estado_id`, `deposito_id`, `tipo_libro_id`, `created_at`, `updated_at`, `created_by`, `updated_by`) VALUES
(1, 'Libro Numero 1', 'Editorial 1', 1987, 12, 1, 100001, 1, 1, 1, '2017-06-19 09:45:39', '2017-06-22 12:56:25', 'admin', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `multas`
--

CREATE TABLE `multas` (
  `multas_id` int(11) NOT NULL,
  `fin_multa` date NOT NULL,
  `activa` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `multas_has_prestamos`
--

CREATE TABLE `multas_has_prestamos` (
  `multas_multas_id` int(11) NOT NULL,
  `prestamos_prestamos_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prestamos`
--

CREATE TABLE `prestamos` (
  `prestamos_id` int(11) NOT NULL,
  `extension` tinyint(1) NOT NULL,
  `fecha_devolucion` date NOT NULL,
  `lectores_id` int(11) NOT NULL,
  `activo` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_by` varchar(45) DEFAULT NULL,
  `updated_by` varchar(45) DEFAULT NULL,
  `nro_prestamo` int(11) NOT NULL,
  `libros_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prestamos_has_libros`
--

CREATE TABLE `prestamos_has_libros` (
  `prestamos_prestamos_id` int(11) NOT NULL,
  `libros_libros_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tipo_documento`
--

CREATE TABLE `tipo_documento` (
  `tipo_documento_id` int(6) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_documento`
--

INSERT INTO `tipo_documento` (`tipo_documento_id`, `descripcion`) VALUES
(1, 'DNI'),
(2, 'Pasaporte');

-- --------------------------------------------------------

--
-- Table structure for table `tipo_lector`
--

CREATE TABLE `tipo_lector` (
  `tipo_lector_id` int(6) NOT NULL,
  `descripcion` varchar(45) NOT NULL,
  `prestamo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_lector`
--

INSERT INTO `tipo_lector` (`tipo_lector_id`, `descripcion`, `prestamo`) VALUES
(1, 'Alumno FADU', 7),
(2, 'Alumno CBC', 7),
(3, 'Docente', 7),
(4, 'No Docente', 7),
(5, 'Autoridad', 7),
(6, 'Otras Bibliotecas', 7);

-- --------------------------------------------------------

--
-- Table structure for table `tipo_libro`
--

CREATE TABLE `tipo_libro` (
  `tipo_libro_id` smallint(6) NOT NULL,
  `descripcion` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tipo_libro`
--

INSERT INTO `tipo_libro` (`tipo_libro_id`, `descripcion`) VALUES
(1, 'Préstamo en sala'),
(2, 'Préstamo de semana'),
(3, 'Préstamo de Fin de Semana');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`autor_id`);

--
-- Indexes for table `autor_has_libros`
--
ALTER TABLE `autor_has_libros`
  ADD PRIMARY KEY (`autor_autor_id`,`libros_libros_id`),
  ADD KEY `fk_autor_has_libros_libros1_idx` (`libros_libros_id`),
  ADD KEY `fk_autor_has_libros_autor1_idx` (`autor_autor_id`);

--
-- Indexes for table `deposito`
--
ALTER TABLE `deposito`
  ADD PRIMARY KEY (`deposito_id`);

--
-- Indexes for table `estado`
--
ALTER TABLE `estado`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indexes for table `estado_lector`
--
ALTER TABLE `estado_lector`
  ADD PRIMARY KEY (`estado_id`);

--
-- Indexes for table `lectores`
--
ALTER TABLE `lectores`
  ADD PRIMARY KEY (`lectores_id`),
  ADD KEY `lectores_tipo_documento_FK` (`tipo_documento_id`),
  ADD KEY `lectores_tipo_lector_FK` (`tipo_lector_id`),
  ADD KEY `lectores_estado_lector_FK` (`estado`);

--
-- Indexes for table `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`libros_id`),
  ADD KEY `deposito_id` (`deposito_id`),
  ADD KEY `tipo_libro_id` (`tipo_libro_id`),
  ADD KEY `estado_id` (`estado_id`);

--
-- Indexes for table `multas`
--
ALTER TABLE `multas`
  ADD PRIMARY KEY (`multas_id`);

--
-- Indexes for table `multas_has_prestamos`
--
ALTER TABLE `multas_has_prestamos`
  ADD PRIMARY KEY (`multas_multas_id`,`prestamos_prestamos_id`),
  ADD KEY `fk_multas_has_prestamos_prestamos1_idx` (`prestamos_prestamos_id`),
  ADD KEY `fk_multas_has_prestamos_multas1_idx` (`multas_multas_id`);

--
-- Indexes for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD PRIMARY KEY (`prestamos_id`),
  ADD UNIQUE KEY `prestamos_UN` (`nro_prestamo`),
  ADD KEY `prestamos_lectores_FK` (`lectores_id`),
  ADD KEY `prestamos_libros_FK` (`libros_id`);

--
-- Indexes for table `prestamos_has_libros`
--
ALTER TABLE `prestamos_has_libros`
  ADD PRIMARY KEY (`prestamos_prestamos_id`,`libros_libros_id`),
  ADD KEY `fk_prestamos_has_libros_libros1_idx` (`libros_libros_id`),
  ADD KEY `fk_prestamos_has_libros_prestamos1_idx` (`prestamos_prestamos_id`);

--
-- Indexes for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  ADD PRIMARY KEY (`tipo_documento_id`);

--
-- Indexes for table `tipo_lector`
--
ALTER TABLE `tipo_lector`
  ADD PRIMARY KEY (`tipo_lector_id`);

--
-- Indexes for table `tipo_libro`
--
ALTER TABLE `tipo_libro`
  ADD PRIMARY KEY (`tipo_libro_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `autor`
--
ALTER TABLE `autor`
  MODIFY `autor_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `estado_lector`
--
ALTER TABLE `estado_lector`
  MODIFY `estado_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `lectores`
--
ALTER TABLE `lectores`
  MODIFY `lectores_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `libros`
--
ALTER TABLE `libros`
  MODIFY `libros_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `multas`
--
ALTER TABLE `multas`
  MODIFY `multas_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `prestamos`
--
ALTER TABLE `prestamos`
  MODIFY `prestamos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tipo_documento`
--
ALTER TABLE `tipo_documento`
  MODIFY `tipo_documento_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tipo_lector`
--
ALTER TABLE `tipo_lector`
  MODIFY `tipo_lector_id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `autor_has_libros`
--
ALTER TABLE `autor_has_libros`
  ADD CONSTRAINT `fk_autor_has_libros_autor1` FOREIGN KEY (`autor_autor_id`) REFERENCES `autor` (`autor_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_autor_has_libros_libros1` FOREIGN KEY (`libros_libros_id`) REFERENCES `libros` (`libros_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `lectores`
--
ALTER TABLE `lectores`
  ADD CONSTRAINT `lectores_estado_lector_FK` FOREIGN KEY (`estado`) REFERENCES `estado_lector` (`estado_id`),
  ADD CONSTRAINT `lectores_tipo_documento_FK` FOREIGN KEY (`tipo_documento_id`) REFERENCES `tipo_documento` (`tipo_documento_id`),
  ADD CONSTRAINT `lectores_tipo_lector_FK` FOREIGN KEY (`tipo_lector_id`) REFERENCES `tipo_lector` (`tipo_lector_id`);

--
-- Constraints for table `libros`
--
ALTER TABLE `libros`
  ADD CONSTRAINT `libros_ibfk_1` FOREIGN KEY (`deposito_id`) REFERENCES `deposito` (`deposito_id`),
  ADD CONSTRAINT `libros_ibfk_2` FOREIGN KEY (`tipo_libro_id`) REFERENCES `tipo_libro` (`tipo_libro_id`),
  ADD CONSTRAINT `libros_ibfk_3` FOREIGN KEY (`estado_id`) REFERENCES `estado` (`estado_id`);

--
-- Constraints for table `multas_has_prestamos`
--
ALTER TABLE `multas_has_prestamos`
  ADD CONSTRAINT `fk_multas_has_prestamos_multas1` FOREIGN KEY (`multas_multas_id`) REFERENCES `multas` (`multas_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_multas_has_prestamos_prestamos1` FOREIGN KEY (`prestamos_prestamos_id`) REFERENCES `prestamos` (`prestamos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `prestamos`
--
ALTER TABLE `prestamos`
  ADD CONSTRAINT `prestamos_lectores_FK` FOREIGN KEY (`lectores_id`) REFERENCES `lectores` (`lectores_id`),
  ADD CONSTRAINT `prestamos_libros_FK` FOREIGN KEY (`libros_id`) REFERENCES `libros` (`libros_id`);

--
-- Constraints for table `prestamos_has_libros`
--
ALTER TABLE `prestamos_has_libros`
  ADD CONSTRAINT `fk_prestamos_has_libros_libros1` FOREIGN KEY (`libros_libros_id`) REFERENCES `libros` (`libros_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_prestamos_has_libros_prestamos1` FOREIGN KEY (`prestamos_prestamos_id`) REFERENCES `prestamos` (`prestamos_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
