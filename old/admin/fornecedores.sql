-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 28-Mar-2016 às 12:03
-- Versão do servidor: 10.1.10-MariaDB
-- PHP Version: 5.5.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fornecedores`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `fornecedores`
--

CREATE TABLE `fornecedores` (
  `id_fornecedor` smallint(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `servico` varchar(255) NOT NULL,
  `descricao` varchar(255) NOT NULL,
  `contato` varchar(255) NOT NULL,
  `telefone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `fornecedores`
--

INSERT INTO `fornecedores` (`id_fornecedor`, `nome`, `servico`, `descricao`, `contato`, `telefone`, `email`) VALUES
(4, 'Nazacom', 'Publicidade', 'Agência', 'Emanuel', '85 3261-5999 85 3268- 4001', 'emanuel@nazacom.com.br financeiro@nazacom.com.br'),
(5, 'Empresa nova', 'Publicidade', 'Agência', 'João Lucas', '85 39999999', 'empresanova@hotmail.com'),
(6, 'João Carvalho', 'Marcenaria', 'Lorem Ipsum é simplesmente uma simulação', 'Kleber Silva', '85 0000000', 'jcarvalho@jcarvalho.com.br'),
(7, 'Max Games', 'Games', 'Aluguel de videogames', 'Maria João', '85 99999-9999', 'mjoao@maxgames.com.br'),
(8, 'Info Max', 'Equipamentos', 'Locação de máquinas e equipamentos de informática', 'Pedro SIlva', '85 3035-1890', 'pedrosilva@infomax.com.br'),
(9, 'Padaria Comer Bem', 'Alimentação', 'Serviços de buffet', 'Aline Barros', '85 3232-3232', 'alinebarros@padariacomerbem.com.br'),
(10, 'Bom Sabor', 'Alimentação', 'Self service', 'Zilma, David', '85 3030-3030', 'contato@bomsabor.com.br'),
(11, 'Helder Lanches', 'Alimentação', 'Self service e lanches', 'Helder', '85 99999-9999', 'helder@hotmail.com'),
(12, 'Esquina', 'Alimentação', 'Self service', 'Lucas', '85 99999-9999, 8599999-99999', 'contato@esquina.com.br'),
(13, 'Print Jet', 'Impressoras', 'Recarga e locação', 'Carlos Henrique', '85 3030-3030', 'chenrique@ptinjet.com.br'),
(14, 'JPT Serviços Gerais', 'Serviço de limpeza', 'Terceirização de auxiliar de serviços', 'Eduardo Graça', '88 97979-8585', 'contato@jpt.com.br'),
(15, 'Flores Elegantes', 'Floricultura', 'Compra e aluguel de plantas', 'Diego Costa', '85 36666-6666', 'diego@felegantes.com.br'),
(16, 'Vitor Marques', 'teste', 'teste', 'teste', '(085) 98888-8888', 'teste@teste.com'),
(17, 'Vitor Marques', 'ttttt', 'ttttt', 'tttt', '(085) 98888-8888', 'tttt@ttt.com'),
(18, 'Vitor Marques', '89798987978', '879789789879', '879789789', '879879879879', '87987987989');

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_usuario`
--

CREATE TABLE `tipo_usuario` (
  `id_tipo_usuario` smallint(6) NOT NULL,
  `nome` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_usuario`
--

INSERT INTO `tipo_usuario` (`id_tipo_usuario`, `nome`) VALUES
(1, 'administrador'),
(2, 'usuario');

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuarios`
--

CREATE TABLE `usuarios` (
  `id_usuario` smallint(6) NOT NULL,
  `nome` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `senha` varchar(255) NOT NULL,
  `login` varchar(255) NOT NULL,
  `telefone` char(20) NOT NULL,
  `id_tipo_usuario` smallint(6) NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `usuarios`
--

INSERT INTO `usuarios` (`id_usuario`, `nome`, `email`, `senha`, `login`, `telefone`, `id_tipo_usuario`, `status`) VALUES
(2, 'Vitor Marques', 'vitormarques@opovodigital.com', '123456', 'vitormarques', '085 99674-2990', 1, 1),
(11, 'Leandro Mendes', 'leandromendes@opovodigital.com', '456546', 'leandro', '(085) 98888-8888', 1, 0),
(12, 'Mariana Marques', 'mari@hotmail.com', '098765', 'mari', '(085) 99999-9999', 2, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fornecedores`
--
ALTER TABLE `fornecedores`
  ADD PRIMARY KEY (`id_fornecedor`);

--
-- Indexes for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  ADD PRIMARY KEY (`id_tipo_usuario`);

--
-- Indexes for table `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `FK1_tipo_usuario` (`id_tipo_usuario`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fornecedores`
--
ALTER TABLE `fornecedores`
  MODIFY `id_fornecedor` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `tipo_usuario`
--
ALTER TABLE `tipo_usuario`
  MODIFY `id_tipo_usuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id_usuario` smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- Constraints for dumped tables
--

--
-- Limitadores para a tabela `usuarios`
--
ALTER TABLE `usuarios`
  ADD CONSTRAINT `FK1_tipo_usuario` FOREIGN KEY (`id_tipo_usuario`) REFERENCES `tipo_usuario` (`id_tipo_usuario`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
