-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 20-Jun-2024 às 19:56
-- Versão do servidor: 10.4.27-MariaDB
-- versão do PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `bd_autoria`
--
CREATE DATABASE `bd_autoria`;
USE `bd_autoria`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `autor`
--

CREATE TABLE `autor` (
  `Cod_autor` int(11) NOT NULL,
  `NomeAutor` varchar(50) NOT NULL,
  `Sobrenome` varchar(50) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Nasc` date NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autor`
--

INSERT INTO `autor` (`Cod_autor`, `NomeAutor`, `Sobrenome`, `Email`, `Nasc`) VALUES
(1, 'Gabriel', 'Silva', 'gabriel.silva@example.com', '1927-03-06'),
(2, 'Ana', 'Santos', 'ana.santos@example.com', '1775-12-16'),
(3, 'Miguel', 'Oliveira', 'miguel.oliveira@example.com', '1547-09-29'),
(4, 'Carlos', 'Souza', 'carlos.souza@example.com', '1903-06-25'),
(5, 'Fernanda', 'Pereira', 'fernanda.pereira@example.com', '1947-08-24'),
(6, 'Rafael', 'Costa', 'rafael.costa@example.com', '1900-06-29'),
(7, 'Juliana', 'Martins', 'juliana@example.com', '1947-09-21');

-- --------------------------------------------------------

--
-- Estrutura da tabela `autoria`
--

CREATE TABLE `autoria` (
  `Cod_autor` int(11) NOT NULL,
  `Cod_livro` int(11) NOT NULL,
  `DataLancamento` date NOT NULL,
  `Editora` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `autoria`
--

INSERT INTO `autoria` (`Cod_autor`, `Cod_livro`, `DataLancamento`, `Editora`) VALUES
(1, 1, '2000-01-15', 'Maria da Silva Editora'),
(2, 2, '1995-07-20', 'João Santos Produções'),
(3, 3, '2005-03-10', 'Luiza Miranda Publicações'),
(4, 4, '2010-11-05', 'Fernando Oliveira Books'),
(5, 5, '2008-09-15', 'Carla Ribeiro Edições'),
(5, 1, '2008-09-15', 'Maria da Silva Editora'),
(4, 3, '2012-04-30', 'Ricardo Silva Publishing'),
(7, 4, '2018-06-25', 'Patrícia Lima Livros');

-- --------------------------------------------------------

--
-- Estrutura da tabela `livro`
--

CREATE TABLE `livro` (
  `Cod_livro` int(11) NOT NULL,
  `Titulo` varchar(50) NOT NULL,
  `Categoria` varchar(50) NOT NULL,
  `ISBN` varchar(30) NOT NULL,
  `Idioma` varchar(30) NOT NULL,
  `QtdPag` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Extraindo dados da tabela `livro`
--

INSERT INTO `livro` (`Cod_livro`, `Titulo`, `Categoria`, `ISBN`, `Idioma`, `QtdPag`) VALUES
(1, 'Marte Vermelho', 'Ficção Científica', '2147483647', 'Português', 417),
(2, 'Saturno Azul', 'Romance', '2147483647', 'Inglês', 279),
(3, 'Vênus Dourado', 'Fantasia', '2147483647', 'Espanhol', 1023),
(4, 'Júpiter Negro', 'Distopia', '2147483647', 'Inglês', 328),
(5, 'Urano Prateado', 'Ficção Científica', '2147483647', 'Português', 208);

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `autor`
--
ALTER TABLE `autor`
  ADD PRIMARY KEY (`Cod_autor`);

--
-- Índices para tabela `livro`
--
ALTER TABLE `livro`
  ADD PRIMARY KEY (`Cod_livro`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `autor`
--
ALTER TABLE `autor`
  MODIFY `Cod_autor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `livro`
--
ALTER TABLE `livro`
  MODIFY `Cod_livro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
