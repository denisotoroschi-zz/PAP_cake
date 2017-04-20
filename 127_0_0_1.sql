-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Abr-2017 às 09:58
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `12c_classificados`
--
CREATE DATABASE IF NOT EXISTS `12c_classificados` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `12c_classificados`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `adds`
--

CREATE TABLE `adds` (
  `id` int(11) NOT NULL,
  `title` varchar(50) NOT NULL,
  `price` float NOT NULL,
  `description` varchar(255) NOT NULL,
  `average_rating` varchar(50) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `modified` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `type` enum('Venda','Compra','Troca') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `icon` varchar(250) DEFAULT NULL,
  `parent_id` int(11) DEFAULT NULL,
  `lft` int(11) DEFAULT NULL,
  `rgth` int(11) DEFAULT NULL,
  `rght` int(11) NOT NULL,
  `selectable` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `name`, `icon`, `parent_id`, `lft`, `rgth`, `rght`, `selectable`) VALUES
(14, 'Automoveis', 'categories_icon/img-1.png', NULL, 1, 4, 4, 0),
(15, 'Motores', NULL, 14, 2, 3, 3, 1),
(17, 'telemoveis e tablets', 'categories_icon/img-3.png', NULL, 5, 10, 10, 0),
(23, 'tablets', NULL, 17, 6, 7, 7, 1),
(24, 'telemoveis', NULL, 17, 8, 9, 9, 1),
(25, 'tecnologia', 'categories_icon/img-2.png', NULL, 11, 16, 16, 0),
(26, 'computadores', NULL, 25, 12, 13, 13, 1),
(27, 'eletronica', NULL, 25, 14, 15, 15, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `images`
--

CREATE TABLE `images` (
  `id` int(11) NOT NULL,
  `link` varchar(255) NOT NULL,
  `adds_id` int(11) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000',
  `modified` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `rates`
--

CREATE TABLE `rates` (
  `id` int(11) NOT NULL,
  `rating` int(11) NOT NULL,
  `rated` int(11) NOT NULL,
  `rate` int(11) NOT NULL,
  `created` timestamp(6) NOT NULL DEFAULT '0000-00-00 00:00:00.000000'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(250) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `profile_picture` varchar(80) DEFAULT NULL,
  `mobile_number` varchar(50) NOT NULL,
  `average_rating` varchar(50) DEFAULT NULL,
  `user_type` enum('user','admin') NOT NULL DEFAULT 'user',
  `status` enum('Ativado','Inativo','Bloqueado') NOT NULL DEFAULT 'Inativo',
  `hash` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `email`, `username`, `password`, `first_name`, `last_name`, `profile_picture`, `mobile_number`, `average_rating`, `user_type`, `status`, `hash`, `date_of_birth`) VALUES
(1, 'denisotoroschi@live.com.pt', 'denisotoroschi', '$2y$10$9beQILXWGsA58cuCFOCecu0Avv2C.4Xjk/nVBNvTTPPrnY6ezE5EO', 'Denis', 'Otoroschi', NULL, '962205525', NULL, 'admin', 'Ativado', NULL, NULL),
(2, 'goncalopcorreia@hotmail.com', 'Djguu2', '$2y$10$5/nCMbtmP2.jP8qnr2HQPOvSUTLaeB6037nbz.7AuXex8I4TOpxzm', 'Gonçalo', 'Correia ', NULL, '965432123', NULL, 'user', 'Ativado', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adds`
--
ALTER TABLE `adds`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rates`
--
ALTER TABLE `rates`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `mobile_number` (`mobile_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adds`
--
ALTER TABLE `adds`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;
--
-- AUTO_INCREMENT for table `rates`
--
ALTER TABLE `rates`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;--
-- Database: `pap`
--
CREATE DATABASE IF NOT EXISTS `pap` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `pap`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `id` int(11) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos_users`
--

CREATE TABLE `produtos_users` (
  `utilizadores_id` int(11) NOT NULL,
  `produtos_id` int(11) NOT NULL,
  `data_compra` datetime NOT NULL,
  `data_consumo` datetime NOT NULL,
  `quantidade` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicoes`
--

CREATE TABLE `refeicoes` (
  `id` int(11) NOT NULL,
  `preco` float NOT NULL,
  `data` date NOT NULL,
  `sopa` text NOT NULL,
  `prato` text NOT NULL,
  `sobremesa` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `refeicoes`
--

INSERT INTO `refeicoes` (`id`, `preco`, `data`, `sopa`, `prato`, `sobremesa`) VALUES
(4, 123, '2017-02-14', 'asdsd', 'asdasd', 'asdsadas'),
(5, 123, '2017-02-14', 'sdfgsdf', 'cxvzxvc', 'dsfdsf'),
(6, 6757, '2017-02-14', 'yufhghufdgifd', '5rwqrftwdfgshadf', 'djnduhgufd'),
(7, 5454, '2017-02-14', 'rgyuienjvds', 'gejbgfwuejbfe', 'eurhgini'),
(8, 6666, '2017-02-14', 'hybrghefeifvj', 'swedfhiwehgwv', 'aehfiuekef'),
(9, 74774, '2017-02-14', 'dsfsedfvdesfs', 'sdsfsebhtnfgnx cxfwe', 'fsdvcxvxcg');

-- --------------------------------------------------------

--
-- Estrutura da tabela `refeicoes_users`
--

CREATE TABLE `refeicoes_users` (
  `utilizadores_id` int(11) NOT NULL,
  `refeicoes_id` int(11) NOT NULL,
  `data` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `n_processo` smallint(5) UNSIGNED NOT NULL,
  `pin` varchar(255) NOT NULL,
  `morada` text NOT NULL,
  `data_nascimento` date NOT NULL,
  `ano` tinyint(3) NOT NULL,
  `turma` char(1) NOT NULL,
  `tipo` varchar(255) NOT NULL,
  `escalao` char(1) NOT NULL,
  `email` text NOT NULL,
  `nif` int(10) UNSIGNED NOT NULL,
  `saldo` float UNSIGNED NOT NULL,
  `saldo_sub` float UNSIGNED NOT NULL,
  `img` text NOT NULL,
  `horario` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `nome`, `n_processo`, `pin`, `morada`, `data_nascimento`, `ano`, `turma`, `tipo`, `escalao`, `email`, `nif`, `saldo`, `saldo_sub`, `img`, `horario`) VALUES
(6, 'asd', 12345, '$2y$10$kVPH7XEyCklJl4dvx1Alo.UhHgajqvWr.v8w17zUjZEQCLiEW2Mj6', '', '2017-01-31', 1, '1', '1', '1', 'bla2@bla.pt', 1, 1, 1, '', ''),
(8, '123', 123, '$2y$10$kCmmFRxB2Ixy6f2rdWIcKOW.OR5e2g73NKH.M2dsmJb7FWENzt/FK', 'Av.6 São Lourenço da Barrosa, Edif. Carmix. Ap.101 F', '2017-03-23', 12, 'c', 'admin', 'a', 'denisotoroschi@live.com.pt', 2, 2, 2, '', ''),
(9, 'Denis Ciprian Otoroschi', 24148, '$2y$10$qgtDsn2Vmgt2ZFQR5KDxze0cnRThrU1Ot4HBq4Tqlffp9DnzFc9eW', 'Av.6 São Lourenço da Barrosa, Edif. Carmix. Ap.101 F', '2012-08-09', 12, 'C', 'admin', 'c', 'denisotoroschi@live.com.pt', 123456789, 12, 16, 'userFoto.jpg', '12c');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produtos_users`
--
ALTER TABLE `produtos_users`
  ADD PRIMARY KEY (`utilizadores_id`,`produtos_id`,`data_compra`),
  ADD KEY `dfdgfsd` (`produtos_id`);

--
-- Indexes for table `refeicoes`
--
ALTER TABLE `refeicoes`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `refeicoes_users`
--
ALTER TABLE `refeicoes_users`
  ADD PRIMARY KEY (`utilizadores_id`,`refeicoes_id`),
  ADD KEY `asdasd` (`refeicoes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `refeicoes`
--
ALTER TABLE `refeicoes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;--
-- Database: `teste`
--
CREATE DATABASE IF NOT EXISTS `teste` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `teste`;

-- --------------------------------------------------------

--
-- Estrutura da tabela `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `categories`
--

INSERT INTO `categories` (`id`, `nome`) VALUES
(2, 'frutas'),
(5, 'cuco');

-- --------------------------------------------------------

--
-- Estrutura da tabela `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `nome` text NOT NULL,
  `preco` int(11) NOT NULL,
  `validade` date NOT NULL,
  `img` varchar(255) NOT NULL,
  `category_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `products`
--

INSERT INTO `products` (`id`, `nome`, `preco`, `validade`, `img`, `category_id`) VALUES
(37, 'Pedro', 1, '2022-02-08', 'Uploded/14256627_937678946354360_822792069_n.jpg', 5),
(31, 'asdSA', 123, '2017-02-02', 'Uploded/SemTIulo.png', 2),
(33, 'sdasd', 213213, '2018-02-07', 'Uploded/15027861_998282180294036_3568179994257172969_n.jpg', 2),
(34, 'asdasd', 123123, '2017-02-07', 'Uploded/14997232_1064827706963055_1800715082_n.jpg', 2),
(35, 'sdvfdgfdgsdfg', 123124, '2017-02-07', 'Uploded/pir@dev-18.jpg', 2),
(36, 'AASDS', 324, '2017-02-07', 'Uploded/1186057_958399350863369_1786320931845813734_n.jpg', 5),
(39, 'Banana', 55, '2017-02-08', 'Uploded/IMG_20161217_170404.jpg', 5),
(41, 'olaaaa', 123, '2017-02-09', 'Uploded/13072060_1008386402587450_923689381_o.jpg', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(14, 'goncalo', '$2y$10$7gjKQ8qwgTEGZ16yjL.n6ecmj4bPQ96IuleG1zJvaWiYOZdYZRXmq'),
(12, 'gonçalo', '$2y$10$OLGPNAcHKjxpZdDwibScR.9FPjctxXZaJImXQ31X3Wt0rC907T0hm'),
(13, 'denis', '$2y$10$SzWkAd3pzudEWrXDHAaRYeWxsT9wqfmdxcIRXe0O7yls0G9O3UDwq'),
(9, 'mario', '$2y$10$sobKVEXI7zscWbBc6repr.weArCivYrNoLZHwLiYhL1Qlkyt8BgAW');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `categories_id` (`category_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
