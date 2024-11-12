-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 06, 2024 at 11:19 PM
-- Server version: 9.0.1
-- PHP Version: 8.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `suda`
--

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` int NOT NULL,
  `created` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `visit_hash` varchar(255) NOT NULL,
  `visit_ip` varchar(45) DEFAULT NULL,
  `s1_nome` varchar(255) DEFAULT NULL,
  `s1_confirma` tinyint(1) DEFAULT NULL,
  `s2_email` varchar(255) DEFAULT NULL,
  `s2_telefone` varchar(20) DEFAULT NULL,
  `s2_confirma` tinyint(1) DEFAULT NULL,
  `s3_dia` tinyint DEFAULT NULL,
  `s3_mes` tinyint DEFAULT NULL,
  `s3_ano` smallint DEFAULT NULL,
  `s3_nascimento` date DEFAULT NULL,
  `s4_mensalidade` decimal(10,2) DEFAULT NULL,
  `s4_produtos` json DEFAULT NULL,
  `s5_escolha` varchar(255) DEFAULT NULL,
  `s5_cadastro` tinyint(1) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `created`, `updated`, `visit_hash`, `visit_ip`, `s1_nome`, `s1_confirma`, `s2_email`, `s2_telefone`, `s2_confirma`, `s3_dia`, `s3_mes`, `s3_ano`, `s3_nascimento`, `s4_mensalidade`, `s4_produtos`, `s5_escolha`, `s5_cadastro`) VALUES
(1, '2024-11-06 21:01:41', '2024-11-06 21:01:41', 'abc123', '192.168.0.1', 'João da Silva', 1, 'joao@example.com', '11999999999', 1, 27, 1, 1986, '1986-01-27', 150.00, '[{\"valor\": 10000, \"produto_id\": 1}]', 'produto1', 1),
(2, '2024-11-06 21:01:41', '2024-11-06 21:01:41', 'def456', '192.168.0.2', 'Maria Oliveira', 1, 'maria@example.com', '11988888888', 1, 15, 5, 1990, '1990-05-15', 200.00, '[{\"valor\": 20000, \"produto_id\": 2}]', 'produto2', 0),
(3, '2024-11-07 00:31:11', '2024-11-07 00:44:49', '767eb410a364f2052e639f9aaf131fe1', NULL, 'Dyego', 0, 'dyego@efkz.com.br', '41999527868', 0, 27, 1, 1986, '1986-01-27', 92.00, '[{\"id\": 0, \"preco\": \"R$65\", \"valor\": \"R$50.000\"}, {\"id\": 1, \"preco\": \"R$15\", \"valor\": \"R$5.000\"}, {\"id\": 2, \"preco\": \"R$12\", \"valor\": \"R$4.000\"}]', 'Gostei, quero contratar agora', 0),
(4, '2024-11-07 00:46:42', '2024-11-07 00:46:42', 'f39992adbb2016bed037b313d9228ba8', NULL, 'Dyego', 0, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'usuario1@example.com', '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36k8vZy5f1IQl4qs5.9o5eK', '2024-11-06 21:01:41'),
(2, 'usuario2@example.com', '$2y$10$EixZaYVK1fsbw1ZfbX3OXePaWxn96p36k8vZy5f1IQl4qs5.9o5eK', '2024-11-06 21:01:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sessions`
--
ALTER TABLE `sessions`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
