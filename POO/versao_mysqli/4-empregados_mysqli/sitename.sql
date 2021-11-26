-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: 22-Dez-2017 às 19:53
-- Versão do servidor: 10.1.24-MariaDB
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
-- Database: `sitename`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `utilizadores`
--

CREATE TABLE `utilizadores` (
  `user_id` int(11) NOT NULL,
  `user_nome` varchar(45) NOT NULL,
  `user_apelido` varchar(45) DEFAULT NULL,
  `user_email` varchar(45) NOT NULL,
  `user_senha` varchar(45) NOT NULL,
  `user_dataregisto` datetime DEFAULT NULL,
  `user_ativo` char(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `utilizadores`
--

INSERT INTO `utilizadores` (`user_id`, `user_nome`, `user_apelido`, `user_email`, `user_senha`, `user_dataregisto`, `user_ativo`) VALUES
(5, 'Adelino', 'Amaral', 'adelino@gmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-10-02 00:00:00', ''),
(6, 'Gonçalo', 'Amaral', 'goa@hotmail.com', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-10-30 18:08:03', ''),
(8, 'Raul', 'Amaral', 'roa@sapo.pt', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-11-02 16:15:17', ''),
(9, 'Francisco', 'Amaral', 'fr@jdghv.pt', '7b52009b64fd0a2a49e6d8a939753077792b0554', '2017-11-02 17:06:29', ''),
(10, 'Daniel', 'Gomes', 'da@sd.pt', '7b52009b64fd0a2a49e6d8a939753077792b0554', '2017-11-03 09:58:29', ''),
(11, 'Diogo', 'Costa', 'dc@sapo.pt', '7b52009b64fd0a2a49e6d8a939753077792b0554', '2017-11-03 09:59:12', ''),
(13, 'Lucinda', 'Peixoto', 'pe@sapo.pt', '7c4a8d09ca3762af61e59520943dc26494f8941b', '2017-11-05 19:48:46', '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `utilizadores`
--
ALTER TABLE `utilizadores`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `idxemail` (`user_email`),
  ADD KEY `login` (`user_nome`,`user_senha`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `utilizadores`
--
ALTER TABLE `utilizadores`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
