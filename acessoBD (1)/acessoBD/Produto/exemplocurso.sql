-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 22-Maio-2024 às 20:25
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `exemplocurso`
--
CREATE DATABASE `exemplocurso`;
USE `exemplocurso`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produto`
--

CREATE TABLE `produto` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `estoque` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `produto`
--

INSERT INTO `produto` (`id`, `nome`, `estoque`) VALUES
(3, 'Camiseta', 50),
(4, 'Caneta', 100),
(5, 'Caderno', 80),
(6, 'Smartphone', 20),
(7, 'Mouse', 70);

 CREATE TABLE `usuario` (
    `Login` varchar(5) NOT NULL,
    `Senha` int(11) NOT NULL
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


--
-- Estrutura dos dados da  Tabela Usuário
--

 INSERT INTO `usuario` (`Login` , `Senha`) VALUES
    ('a',123),
    ('b',456);


--
-- Índices para tabelas despejadas
--

-- --
-- -- Índices para tabela `produto`
-- --
-- ALTER TABLE `produto`
--   ADD PRIMARY KEY (`id`);

-- --
-- -- AUTO_INCREMENT de tabelas despejadas
-- --

-- --
-- -- AUTO_INCREMENT de tabela `produto`
-- --
-- ALTER TABLE `produto`
--   MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
-- COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
