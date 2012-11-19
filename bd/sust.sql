-- phpMyAdmin SQL Dump
-- version 3.4.5deb1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 16/11/2012 às 00h19min
-- Versão do Servidor: 5.5.28
-- Versão do PHP: 5.3.10-1ubuntu3.4

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sust`
--

-- --------------------------------------------------------
DROP TABLE IF EXISTS `questoes`;
DROP TABLE IF EXISTS `usuario`;
--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questao` varchar(300) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=15 ;

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) DEFAULT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`), 
  UNIQUE (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=2;

 CREATE TABLE IF NOT EXISTS respostas(
  idu INT NOT NULL,
  idq INT NOT NULL,
  resp INT NOT NULL,
  data DATE NOT NULL,
  
  FOREIGN KEY (idu) REFERENCES usuario (id),
  FOREIGN KEY (idq) REFERENCES questoes (id)
)ENGINE=InnoDB  DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `questao`) VALUES
(1, 'Aumento de faturamento e/ou mercado?'),
(2, 'Redução de custos e ganhos de produtividade?'),
(3, 'Fortalecimento da reputação da marca?'),
(4, 'Promoção dos valores da companhia?'),
(5, 'Gestão de conformidade e risco'),
(6, 'Melhoria das condições de acesso a capital'),
(7, 'Convergência com tendências tecnológicas'),
(8, 'Fortalecimento do engajamento com stakeholders'),
(9, 'Amplo escopo de impacto positivo (efeito guarda-chuva)'),
(10, 'Desenvolvimento socioeconômico local/regional'),
(11, 'Desenvolvimento e capacitação de recursos humanos'),
(12, 'Melhoria da eco-eficiência em processos e/ou produtos e serviços'),
(13, 'Resposta a necessidades e desafios críticos locais e regionais'),
(14, 'Aderência a objetivos e metas de desenvolvimento sustentável(ODM)');

INSERT INTO `usuario` (`id`, `nome`, `empresa`, `email`, `senha`) VALUES
(1, 'admin', 'greenitconsultoria', 'admin@greenitconsultoria.com', md5('admin'));
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
