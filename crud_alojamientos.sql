-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 06, 2025 at 03:36 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `crud_alojamientos`
--

-- --------------------------------------------------------

--
-- Table structure for table `alojamiento`
--

CREATE TABLE `alojamiento` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `direccion` text NOT NULL,
  `horarios` text NOT NULL,
  `huespedes` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `imagen` varchar(255) NOT NULL,
  `fecha_creacion` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alojamiento`
--

INSERT INTO `alojamiento` (`id`, `nombre`, `direccion`, `horarios`, `huespedes`, `precio`, `imagen`, `fecha_creacion`) VALUES
(1, 'Casco Viejo Apartment', 'Casco Viejo, Ciudad de Panamá, Panamá', '9 AM - 6 PM', 4, 120.00, 'uploads/casco_viejo.jpg', '2025-04-05 06:08:11'),
(2, 'Boquete Mountain Retreat', 'Boquete, Chiriquí, Panamá', 'Todo el día', 6, 150.00, 'uploads/boquete_retreat.jpg', '2025-04-05 06:08:11'),
(3, 'Panama Canal View Suite', 'Área del Canal de Panamá, Panamá', '8 AM - 10 PM', 2, 200.00, 'uploads/canal_suite.jpg', '2025-04-05 06:08:11'),
(4, 'Suchitoto Colonial House', 'Suchitoto, Cuscatlán, El Salvador', '10 AM - 7 PM', 5, 100.00, 'uploads/suchitoto_colonial.jpg', '2025-04-05 06:08:11'),
(5, 'El Tunco Beach Bungalow', 'Playa El Tunco, La Libertad, El Salvador', 'Todo el día', 3, 180.00, 'uploads/el_tunco.jpg', '2025-04-05 06:08:11'),
(7, 'Anton Valley Serenade', 'El Valle de Antón, Panamá', '3 PM - 11 AM', 6, 66.00, '../uploads/anton_serenade.jpg', '2025-04-05 18:35:47');

-- --------------------------------------------------------

--
-- Table structure for table `alojamientos`
--

CREATE TABLE `alojamientos` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) DEFAULT NULL,
  `descripcion` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `alojamientos`
--

INSERT INTO `alojamientos` (`id`, `nombre`, `descripcion`, `imagen`) VALUES
(1, 'Habitacion sencilla', 'Habitacion para 2 personas', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `nombre` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `tipo` enum('usuario','admin','cliente') NOT NULL,
  `apellido` varchar(255) NOT NULL,
  `lugar` varchar(255) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `estado` varchar(50) DEFAULT NULL,
  `direccion` text DEFAULT NULL,
  `ciudad` varchar(100) DEFAULT NULL,
  `pais` varchar(100) DEFAULT NULL,
  `codigo_postal` varchar(20) DEFAULT NULL,
  `acerca_de` text DEFAULT NULL,
  `imagen` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `usuarios`
--

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `tipo`, `apellido`, `lugar`, `fecha`, `estado`, `direccion`, `ciudad`, `pais`, `codigo_postal`, `acerca_de`, `imagen`) VALUES
(1, 'Eduardo Crespin', 'crespin@kodigo.com', '$2y$10$rixg5qDPylPCYOu9XJLO6.7KVzNBHF04gDP7Z8xSwn2b081OdUBX.', 'cliente', 'Crespin', 'San Salvador, El Salvador', '2025-04-05', 'activo', 'Calle Principal, Edificio 5A', 'San Salvador', 'El Salvador', '1101', 'Me gusta subir montañas.', 'uploads/eduardo_crespin_user.jpg'),
(2, 'Eduardo Crespin', 'eduardo@gmail.com', '$2y$10$wAaY86CbxCKcHl9oevU2ae2ey6qo5RYUf5/6hcorOFh0OXKaRz/9m', 'admin', 'Crespin', NULL, NULL, 'activo', 'Zona Alta, Oficina 7', 'San Salvador', 'El Salvador', '3301', 'Administrador y desarrollador Full Stack Jr.', 'uploads/eduardo_crespin_admin.jpg'),
(3, 'Luis', 'luis@gmail.com', '$2y$10$wAaY86CbxCKcHl9oevU2ae2ey6qo5RYUf5/6hcorOFh0OXKaRz/9m', 'cliente', 'Crespin', 'Itapuã, El Salvador', '2025-04-01', 'activo', 'Avenida Norte, Casa 3B', 'San Miguel', 'El Salvador', '3201', 'Programador Jr. apasionado por la tecnología.', 'uploads/luis_crespin.jpg'),
(4, 'Luz', 'luz@gmail.com', '$2y$10$KRMN6uSUlBgG33zQevCQ/OjrEcK0XI306rJT163v97AH4latHAzSe', 'cliente', 'De León', 'Casco Viejo, Panamá', '2025-03-25', 'activo', 'Calle 50, Apartamento 12', 'Ciudad de Panamá', 'Panamá', '080101', 'Artista apasionada por el dibujo, las artes visuales y programación.', 'uploads/luz_de_leon.jpg'),
(8, 'Angélica', 'angelica@gmail.com', '$2y$10$IpNNGgiyLVEzH8NPhcoJBu8lfWy8ASFqqGVvtPNI94tlka47JPS06', 'admin', 'Rodríguez', NULL, NULL, 'activo', 'Calle Uruguay, Edificio Blue Tower', 'Ciudad de Panamá', 'Panamá', '080102', 'Desarrolladora Front-End con gran pasión por el diseño web.', 'uploads/angelica_rodriguez.jpg'),
(12, 'Admin1', 'admin1@example.com', '$2y$10$Q3X0JoJikWLYsJqepZx9xerqxQPnDdcNJ2dng1WbiQKg3m86fQBbu', 'admin', 'Pérez', NULL, NULL, 'activo', 'Oficina central, Piso 2', 'Ciudad de Panamá', 'Panamá', '00001', 'Encargado de la gestión y supervisión.', 'uploads/admin1_perez.jpg'),
(13, 'Admin2', 'admin2@example.com', '$2y$10$ShZCd/VofzmRZJGE9j52WuW/oy4ltNea2w7Ex5AfAoq8C.j3GtGry', 'admin', 'Ramírez', NULL, NULL, 'activo', 'Zona Comercial, Edificio Azul', 'San Miguel', 'El Salvador', '3302', 'Administrador con enfoque en atención al cliente.', 'uploads/admin2_ramirez.jpg'),
(14, 'Admin3', 'admin3@example.com', '$2y$10$FDGdKVQc/FjmybFSUU7JW.T7hydwPSd50IW3/L2P9U7dMYQkShKka', 'admin', 'Sánchez', NULL, NULL, 'activo', 'Barrio Industrial, Local 22', 'Colón', 'Panamá', '3210', 'Soy el responsable de nuevas integraciones.', 'uploads/admin3_sanchez.jpg'),
(15, 'Admin4', 'admin4@example.com', '$2y$10$IgKax9VSed0lUg0awt00Ku9zkbJQh.4XQymbLprdQURmP50GAEWg6', 'admin', 'López', NULL, NULL, 'activo', 'Plaza Central, Oficina 5', 'Santa Tecla', 'El Salvador', '1204', 'Líder en estrategia y operaciones.', 'uploads/admin4_lopez.jpg'),
(16, 'Ana', 'ana@example.com', '$2y$10$iEpU3Uk6bGmVZ8GwrQstDul.Wupm.ZL6tC80vZXOO0CsAfDZ39jJ.', 'cliente', 'González', 'Ciudad de Panamá, Panamá', '2025-04-05', 'activo', 'Calle 10, Casa 45', 'Ciudad de Panamá', 'Panamá', '080101', 'Soy una persona apasionada por los viajes y las experiencias culturales.', 'uploads/ana_gonzalez.jpg'),
(17, 'Carlos', 'carlos@example.com', '$2y$10$EpTlryFEGLECnRvWXjSOmOq/tsPgQF6AM50rL3gO3nckDbUKrqsw2', 'cliente', 'Martínez', 'San Salvador, El Salvador', '2025-04-01', 'activo', 'Avenida Central, Edificio 3A', 'San Salvador', 'El Salvador', '1101', 'Disfruto de los deportes y la tecnología.', 'uploads/carlos_martinez.jpg'),
(18, 'Laura', 'laura@example.com', '$2y$10$N/MzZxkU5L6KLYqAyYAIPe/mrRcQMTSuKb20C/QhoIKmgVcPcgJwq', 'cliente', 'Hernández', 'David, Chiriquí, Panamá', '2025-03-28', 'activo', 'Calle 7, Apartamento 12B', 'David', 'Panamá', '0412', 'Amo los paisajes montañosos y la fotografía.', 'uploads/laura_hernandez.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `usuario_alojamientos`
--

CREATE TABLE `usuario_alojamientos` (
  `id` int(11) NOT NULL,
  `usuario_id` int(11) DEFAULT NULL,
  `alojamiento_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `alojamiento`
--
ALTER TABLE `alojamiento`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `alojamientos`
--
ALTER TABLE `alojamientos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `usuario_alojamientos`
--
ALTER TABLE `usuario_alojamientos`
  ADD PRIMARY KEY (`id`),
  ADD KEY `usuario_id` (`usuario_id`),
  ADD KEY `alojamiento_id` (`alojamiento_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `alojamiento`
--
ALTER TABLE `alojamiento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `alojamientos`
--
ALTER TABLE `alojamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `usuario_alojamientos`
--
ALTER TABLE `usuario_alojamientos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `usuario_alojamientos`
--
ALTER TABLE `usuario_alojamientos`
  ADD CONSTRAINT `usuario_alojamientos_ibfk_1` FOREIGN KEY (`usuario_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `usuario_alojamientos_ibfk_2` FOREIGN KEY (`alojamiento_id`) REFERENCES `alojamientos` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
