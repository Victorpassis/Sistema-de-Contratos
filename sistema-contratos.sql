-- phpMyAdmin SQL Dump
-- version 4.6.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 22-Set-2017 às 18:24
-- Versão do servidor: 5.7.14
-- PHP Version: 7.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sistema-contratos`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `idCliente` int(11) NOT NULL,
  `nomeCliente` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `dados` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `cidade` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `cep` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `estado` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `endereco` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `numero` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `bairro` varchar(150) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `clientes`
--

INSERT INTO `clientes` (`idCliente`, `nomeCliente`, `dados`, `cidade`, `cep`, `estado`, `endereco`, `numero`, `bairro`) VALUES
(6, 'Victor Pereira de Assis', '12293251667', 'Extrema', '37640-000', 'MG', 'Rua Pau Brasil 284', '284', 'Vila Rica'),
(10, 'Victor Pereira de Assis', '12293251666', 'Extrema', '37640-000', 'MG', 'Rua Pau Brasil 284', '284', 'Vila Rica'),
(12, 'Victor Pereira de Assis', '12293251676', 'Extrema', '37640-000', 'MG', 'Rua Pau Brasil 284', '284', 'Centro');

-- --------------------------------------------------------

--
-- Estrutura da tabela `contratos`
--

CREATE TABLE `contratos` (
  `idContrato` int(11) NOT NULL,
  `valor` double NOT NULL,
  `valorExtenco` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `dataAtual` date NOT NULL,
  `data_inicio` date NOT NULL,
  `data_fim` date NOT NULL,
  `num_parcelas` int(11) NOT NULL,
  `dataVencimento` date NOT NULL,
  `idCliente` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `contratos`
--

INSERT INTO `contratos` (`idContrato`, `valor`, `valorExtenco`, `dataAtual`, `data_inicio`, `data_fim`, `num_parcelas`, `dataVencimento`, `idCliente`) VALUES
(23, 424, '424', '2017-09-22', '2017-09-23', '2017-09-24', 424, '2017-09-27', 6),
(24, 465456, '5746', '2017-09-23', '2017-09-26', '2017-09-29', 456, '2017-09-30', 6),
(25, 456, '756', '2017-09-23', '2017-09-23', '2017-09-23', 45, '2017-09-28', 6),
(26, 45645, '546', '2017-09-23', '2017-09-30', '2017-09-28', 546, '2017-09-29', 10);

-- --------------------------------------------------------

--
-- Estrutura da tabela `listaprodutos`
--

CREATE TABLE `listaprodutos` (
  `idListaProdutos` int(11) NOT NULL,
  `idContrato` int(11) NOT NULL,
  `idProduto` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Extraindo dados da tabela `listaprodutos`
--

INSERT INTO `listaprodutos` (`idListaProdutos`, `idContrato`, `idProduto`) VALUES
(1, 23, 1),
(2, 23, 2),
(3, 23, 5),
(4, 24, 1),
(5, 24, 2),
(6, 24, 5),
(7, 26, 1),
(8, 26, 2),
(9, 26, 5);

-- --------------------------------------------------------

--
-- Estrutura da tabela `produtos`
--

CREATE TABLE `produtos` (
  `idProduto` int(11) NOT NULL,
  `nomeProduto` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `descricao` varchar(750) COLLATE utf8_unicode_ci NOT NULL,
  `valor` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `produtos`
--

INSERT INTO `produtos` (`idProduto`, `nomeProduto`, `descricao`, `valor`) VALUES
(1, 'Produto10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend fermentum fringilla. Nunc id bibendum dui. Etiam quis accumsan ex. Proin mauris felis, tincidunt sed laoreet quis, accumsan et mauris.', 2050),
(2, 'Produto 200', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend fermentum fringilla. Nunc id bibendum dui. Etiam quis accumsan ex. Proin mauris felis, tincidunt sed laoreet quis, accumsan et mauris.', 200.6),
(5, 'Produto 10', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce eleifend fermentum fringilla. Nunc id bibendum dui. Etiam quis accumsan ex. Proin mauris felis, tincidunt sed laoreet quis, accumsan et mauris.', 2500);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `idUsuario` int(11) NOT NULL,
  `usuario` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `senha` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `nivel` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`idUsuario`, `usuario`, `senha`, `nivel`) VALUES
(1, 'victor', 'c24b74335f4679065658070f95f3a83e', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`idCliente`),
  ADD UNIQUE KEY `dados` (`dados`);

--
-- Indexes for table `contratos`
--
ALTER TABLE `contratos`
  ADD PRIMARY KEY (`idContrato`),
  ADD KEY `idCliente` (`idCliente`) USING BTREE;

--
-- Indexes for table `listaprodutos`
--
ALTER TABLE `listaprodutos`
  ADD PRIMARY KEY (`idListaProdutos`),
  ADD KEY `idProduto` (`idProduto`),
  ADD KEY `idContrato` (`idContrato`) USING BTREE;

--
-- Indexes for table `produtos`
--
ALTER TABLE `produtos`
  ADD PRIMARY KEY (`idProduto`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`idUsuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clientes`
--
ALTER TABLE `clientes`
  MODIFY `idCliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `contratos`
--
ALTER TABLE `contratos`
  MODIFY `idContrato` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `listaprodutos`
--
ALTER TABLE `listaprodutos`
  MODIFY `idListaProdutos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `produtos`
--
ALTER TABLE `produtos`
  MODIFY `idProduto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `idUsuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `contratos`
--
ALTER TABLE `contratos`
  ADD CONSTRAINT `idCliente` FOREIGN KEY (`idCliente`) REFERENCES `clientes` (`idCliente`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `listaprodutos`
--
ALTER TABLE `listaprodutos`
  ADD CONSTRAINT `idContrato` FOREIGN KEY (`idContrato`) REFERENCES `contratos` (`idContrato`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `idProduto` FOREIGN KEY (`idProduto`) REFERENCES `produtos` (`idProduto`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
