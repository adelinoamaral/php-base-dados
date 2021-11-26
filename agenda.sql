-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 07-Dez-2018 às 13:37
-- Versão do servidor: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agenda`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `categorias`
--

CREATE TABLE `categorias` (
  `idcategoria` int(11) NOT NULL,
  `designacao` varchar(100) NOT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `categorias`
--

INSERT INTO `categorias` (`idcategoria`, `designacao`, `criado_em`, `atualizado_em`) VALUES
(0, 'ESEN', '2018-12-05 00:00:00', NULL),
(1, 'Alunos 11H', '2018-11-30 00:00:00', NULL),
(2, 'Atletismo', '2018-11-30 00:00:00', NULL),
(3, 'Todos', '2018-11-30 00:00:00', NULL),
(4, 'Restaurantes', '2018-11-30 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Estrutura da tabela `contactos`
--

CREATE TABLE `contactos` (
  `id_contacto` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `apelido` varchar(20) DEFAULT NULL,
  `telefone` varchar(20) NOT NULL,
  `empresa` varchar(50) DEFAULT NULL,
  `cargo` varchar(30) DEFAULT NULL,
  `email` varchar(80) DEFAULT NULL,
  `dataNascimento` date DEFAULT NULL,
  `endereco1` varchar(100) DEFAULT NULL,
  `endereco2` varchar(100) DEFAULT NULL,
  `codPostal` char(8) DEFAULT NULL,
  `localidade` varchar(80) DEFAULT NULL,
  `notas` varchar(250) DEFAULT NULL,
  `num_filhos` tinyint(4) NOT NULL,
  `criado_em` datetime DEFAULT NULL,
  `atualizado_em` datetime DEFAULT NULL,
  `idcategoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `contactos`
--

INSERT INTO `contactos` (`id_contacto`, `nome`, `apelido`, `telefone`, `empresa`, `cargo`, `email`, `dataNascimento`, `endereco1`, `endereco2`, `codPostal`, `localidade`, `notas`, `num_filhos`, `criado_em`, `atualizado_em`, `idcategoria`) VALUES
(1, 'Adelino', 'Amaral', '912365986', 'ESEN', 'Professor', 'p389@esenviseu.net', NULL, NULL, NULL, '3505-566', 'Viseu', NULL, 2, '2018-11-14 00:00:00', NULL, 2),
(2, 'João', 'Galega', '934128452', 'Silver Serv', 'Presidente', 'joaogalega@gmail.com', NULL, NULL, NULL, '3510-008', 'Viseu', NULL, 0, '2018-11-14 00:00:00', NULL, 1),
(3, 'Pedro', 'Santos', '963232567', 'ESEN', 'Aluno', 'a21986@esenviseu.net', NULL, NULL, NULL, '3500-123', 'Viseu', NULL, 1, '2018-11-14 00:00:00', NULL, 2),
(4, 'Tiburcio', 'Africano', '969696989', 'Mecanica do Zé', 'Diretor', 'Tiburcio@superfixe', '2018-11-28', 'Rua debaixo da ponte', 'Barraco', '3500-123', 'Nelas', 'Notas 20 Leulos', 50, '2018-11-14 00:00:00', '2018-11-17 00:00:00', 3),
(5, 'Alberto', 'da Ponte', '912567123', NULL, NULL, 'alberto.gmail.com', NULL, NULL, NULL, NULL, 'Mangualde', NULL, 2, '2018-12-01 00:00:00', NULL, 3),
(6, 'Zé', 'Cebolas', '923456789', NULL, NULL, NULL, '2000-01-09', NULL, NULL, NULL, NULL, NULL, 0, '2018-12-01 00:00:00', NULL, 2),
(7, 'Armindo', 'Peres', '932465798', 'Vidreira', 'Funcionário', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1, '2018-12-01 00:00:00', NULL, 4),
(8, 'Ralex', 'Bronze', '978645312', NULL, NULL, NULL, NULL, NULL, NULL, NULL, 'Viseu', NULL, 3, '2018-12-01 00:00:00', NULL, 1),
(9, 'António', 'Gomes', '9613456978', NULL, NULL, 'ag@sapo.pt', NULL, NULL, NULL, NULL, NULL, NULL, 2, '2018-12-01 00:00:00', NULL, 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`idcategoria`);

--
-- Indexes for table `contactos`
--
ALTER TABLE `contactos`
  ADD PRIMARY KEY (`id_contacto`),
  ADD KEY `FK_idcontacto` (`idcategoria`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categorias`
--
ALTER TABLE `categorias`
  MODIFY `idcategoria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contactos`
--
ALTER TABLE `contactos`
  MODIFY `id_contacto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contactos`
--
ALTER TABLE `contactos`
  ADD CONSTRAINT `FK_idcontacto` FOREIGN KEY (`idcategoria`) REFERENCES `categorias` (`idcategoria`) ON DELETE NO ACTION ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
