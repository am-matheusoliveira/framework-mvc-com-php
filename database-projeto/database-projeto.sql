DROP DATABASE IF EXISTS depoimentos;

CREATE DATABASE depoimentos
DEFAULT CHARACTER SET utf8mb4
DEFAULT COLLATE utf8mb4_general_ci;

USE depoimentos;

DROP TABLE IF EXISTS depoimentos;
CREATE TABLE depoimentos (
  id INT NOT NULL AUTO_INCREMENT,
  nome VARCHAR(50) COLLATE utf8mb4_general_ci NOT NULL,
  mensagem VARCHAR(200) COLLATE utf8mb4_general_ci NOT NULL,
  data timestamp NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=147 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO depoimentos VALUES 
(134,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:31'),
(132,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:25'),
(133,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:28'),
(130,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:20'),
(129,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:18'),
(128,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:15'),
(127,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:12'),
(126,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:09'),
(113,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:17'),
(114,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:24'),
(115,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:31'),
(116,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:37'),
(117,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:40'),
(118,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:43'),
(119,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:46'),
(120,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:49'),
(121,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:52'),
(122,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:55'),
(123,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:10:58'),
(124,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:01'),
(125,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:05'),
(131,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:23'),
(135,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:34'),
(136,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:36'),
(137,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:39'),
(138,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:42'),
(139,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:45'),
(140,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:47'),
(141,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:50'),
(142,'Envie seu depoimento','Envie seu depoimento\r\n','2023-07-17 01:11:52');

DROP TABLE IF EXISTS usuario;
CREATE TABLE usuario (
  id INT NOT NULL AUTO_INCREMENT,
  email VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
  senha VARCHAR(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  nome VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
  endereco VARCHAR(100) COLLATE utf8mb4_general_ci NOT NULL,
  cidade VARCHAR(50) COLLATE utf8mb4_general_ci NOT NULL,
  estado CHAR(2) COLLATE utf8mb4_general_ci NOT NULL,
  cep CHAR(8) COLLATE utf8mb4_general_ci NOT NULL,
  PRIMARY KEY (id)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

INSERT INTO usuario VALUES 
(13,'matheus.pereira@gmail.com','$2y$10$gw0GLcmLo4k3EZx6rPQQkeDossjRE7mF5MiLVC7ZYv2/9dZA3tGC.','MATHEUS.PEREIRA','','','',''),
(2,'pedro.filho@gmail.com','$2y$10$8ysDhVU3vtW8z07phCVMPep7Qe1ATmD8tOPXh23Kn5dpzUQ1FzVCy','PEDRO.FILHO','','','',''),
(3,'bruno.rodrigues@gmail.com','$2y$10$aoX.iQqBu6f/ul4AJEAaLOfN8CkJBFfBdYtuJmexuPcCwcONZohtS','BRUNO.RODRIGUES','','','',''),
(5,'marcel.filho@gmail.com','$2y$10$74jftz4k.AMQtFyvcYItTe0nO/if5FlPhS7I3aEJXTqm2nHCFs8yi','MARCEL.FILHO','','','','');