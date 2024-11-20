CREATE TABLE `proyecto` (
  `id_proyecto` int(10) NOT NULL AUTO_INCREMENT,
  `titulo` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `periodo` varchar(50) NOT NULL,
  `curso` varchar(20) NOT NULL,
  `logotipo` mediumblob NOT NULL,
  `pdf_proyecto` varchar(255) NOT NULL,
  `fecha_presentación` date DEFAULT NULL,
  `nota` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_proyecto`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;