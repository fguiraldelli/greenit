-- phpMyAdmin SQL Dump
-- version 3.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tempo de Geração: 
-- Versão do Servidor: 5.5.24-log
-- Versão do PHP: 5.3.13

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Banco de Dados: `sust`
--
-- Apaga Tabelas se existem
--
DROP TABLE IF EXISTS `just-matriz`;
DROP TABLE IF EXISTS `matriz`;
DROP TABLE IF EXISTS `proj-tec`;
DROP TABLE IF EXISTS `respostas`;
DROP TABLE IF EXISTS `tecnologia`;
DROP TABLE IF EXISTS `tipo_resposta`;
DROP TABLE IF EXISTS `projeto`;
DROP TABLE IF EXISTS `questoes`;
DROP TABLE IF EXISTS `usuario`;
-- --------------------------------------------------------
--
-- Estrutura da tabela `just-matriz`
--

CREATE TABLE IF NOT EXISTS `just-matriz` (
  `idm` int(11) NOT NULL,
  `idp` int(11) NOT NULL,
  `comentario` varchar(700) NOT NULL,
  PRIMARY KEY (`idm`,`idp`),
  KEY `idp` (`idp`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `matriz`
--

CREATE TABLE IF NOT EXISTS `matriz` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `conteudo` varchar(300) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `matriz`
--

INSERT INTO `matriz` (`id`, `conteudo`) VALUES
(1, 'Aumento do faturamento (de vendas) & Parcela de mercado (market share) '),
(2, 'Redução de custos e/ou ganhos de produtividade '),
(3, 'Fortalecimento da reputação '),
(4, 'Promoção dos principais valores'),
(5, 'Promoção da segura gestão de conformidade legal e risco'),
(6, 'Promoção da melhoria das condições de acesso a capital'),
(7, 'Alcance de um novo nicho de mercado'),
(8, 'Convergência com tendências tecnológicas'),
(9, 'Conceitos de Ecodesign'),
(10, 'Incorporação de resíduos reciclados ou reaproveitados'),
(11, 'Utilização de recursos não-renováveis por recursos renováveis e/ou Eliminação de substâncias críticas / tóxicas'),
(12, 'Substituição de produto antigo e obsoleto'),
(13, 'Melhoria da ecoeficiência de processos produtivos'),
(14, 'Promoção de comportamento responsável / sustentável'),
(15, 'Melhora de condições ambientais, de saúde e de segurança'),
(16, 'Promoção de consumo mais adequado (menos impactante)'),
(17, 'Promoção da ecoeficência'),
(18, 'Clientes / Consumidores focais da base da pirâmide socioeconômica'),
(19, 'Fortalecimento do engajamento com stakeholders chave'),
(20, 'Asseguração de conformidade com questões ambientais, trabalhistas e de direitos humanos'),
(21, 'Promoção do compartilhamento do valor gerado pela solução (dos impactos posistivos e benefícios)'),
(22, 'Promoção do compartilhamento da responsabilidade pelos impactos negativos'),
(23, 'Promoção de impacto social e coletivo'),
(24, 'Aderência a objetivos e metas de desenvolvimento sustentável'),
(25, 'Resposta a necessidades e desafios críticos locais e regionais'),
(26, 'Cumprimento a princípio(s) de responsabilidade empresarial e/ou cidadania corporativa'),
(27, 'Promoção de desenvolvimento socioeconômico regional'),
(28, 'Promoção de desenvolvimento e capacitação de recursos humanos');

-- --------------------------------------------------------

--
-- Estrutura da tabela `proj-tec`
--

CREATE TABLE IF NOT EXISTS `proj-tec` (
  `idp` int(11) NOT NULL,
  `idt` int(11) NOT NULL,
  `descricao` varchar(700) NOT NULL,
  `confidencial` tinyint(1) NOT NULL,
  PRIMARY KEY (`idp`,`idt`),
  KEY `idt` (`idt`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estrutura da tabela `projeto`
--

CREATE TABLE IF NOT EXISTS `projeto` (
  `idp` int(11) NOT NULL AUTO_INCREMENT,
  `idu` int(11) NOT NULL,
  `titulo` varchar(100) NOT NULL,
  `descr` varchar(700) NOT NULL,
  `data` date NOT NULL,
  PRIMARY KEY (`idp`,`idu`),
  KEY `idu` (`idu`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `questoes`
--

CREATE TABLE IF NOT EXISTS `questoes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `questao` varchar(300) DEFAULT NULL,
  `tipo` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=29 ;

--
-- Extraindo dados da tabela `questoes`
--

INSERT INTO `questoes` (`id`, `questao`, `tipo`) VALUES
(1, 'O negócio / a solução / o produto promove o aumento do faturamento (de vendas) e consequentemente de parcela de mercado (market share)?', 1),
(2, 'O negócio / a solução / o produto promove a redução de custos e/ou ganhos de produtividade?', 1),
(3, 'O negócio / a solução / o produto promove o fortalecimento da reputação da marca / do profissional / do empreendedor perante seus stakeholders?', 1),
(4, 'O negócio / a solução / o produto promove os principais valores da companhia / do profissional / do empreendedor?', 1),
(5, 'O negócio / a solução / o produto promove a segura gestão de conformidade legal e de riscos do negócio?', 1),
(6, 'O negócio / a solução / o produto promove a melhoria das condições de acesso a capital da companhia / do profissional / do empreendedor?', 1),
(7, 'O negócio / a solução / o produto possibilita à companhia / ao profissional / ao empreendedor alcançar um novo nicho de mercado (já existente ou inédito)?', 1),
(8, 'O negócio / a solução / o produto possui convergência com as tendências tecnológicas da atualidade?', 1),
(9, 'A concepção do produto baseia-se em conceitos claros de ecodesign?', 2),
(10, 'O produto incorpora / utiliza resíduos reciclados ou reaproveitados?', 2),
(11, 'O produto substitui a utilização de recursos não-renováveis por recursos renováveis e/ou elimina a utilização de substâncias críticas / tóxicas?', 2),
(12, 'O produto substitui um produto antigo e obsoleto, e ainda provê mecanismos para garantir a reutilização ou destinação adequadas do produto substituído?', 2),
(13, 'O produto é resultado da melhoria da ecoeficiência de processos produtivos (desenvolvido com menos recursos)?', 2),
(14, 'O negócio / a solução promove ou possibilita um comportamento responsável do ponto de vista socioambiental / sustentável?', 2),
(15, 'O produto melhora condições ambientais, de saúde e de segurança relacionadas ao seu consumo / à sua utilização?', 2),
(16, 'O negócio / solução promove ou possibilita uma utilização / um consumo mais adequada(o) de um produto, recurso ou serviço (menos impactante)?', 2),
(17, 'O produto promove ou possibilita a melhoria da ecoeficência por meio de sua utilização / seu consumo?', 2),
(18, 'Clientes / Consumidores focais da solução / produto representam principalmente a base da pirâmide socioeconômica?', 2),
(19, 'O negócio / a solução promove ou fortalece o engajamento com stakeholders chave (ONGs, comunidades, governos, concorrentes, pequenos fornecedores locais / regionais)?', 2),
(20, 'O negócio / a solução garante o respeito e conformidade às questões ambientais, trabalhistas e de direitos humanos em geral, ao longo de todo o ciclo de vida do produto?', 2),
(21, 'O negócio possibilita o compartilhamento do valor gerado pela solução por parte de todos os entes envolvidos ao longo da cadeia de desenvolvimento, consumo / utilização e destinação final do produto (compartilhamento dos impactos posistivos e benefícios)?', 2),
(22, 'O negócio possibilita o compartilhamento da responsabilidade decorrente do desenvolvimento, consumo / utilização e destinação final do produto por parte de todos os entes envolvidos em seu ciclo de vida (compartilhamento da responsabilidade pelos impactos negativos)?', 2),
(23, 'Por força de sua missão, a solução possui / promove, direta ou indiretamente, um impacto social e coletivo (artístico, cultural, etc) que deve prevalecer sobre o sucesso econômico do negócio?', 2),
(24, 'O negócio / produto / a solução é aderente a objetivos e metas de desenvolvimento sustentável globais (ODM - objetivos de desenvolvimento do milênio)?', 2),
(25, 'O negócio / produto / a solução apresenta resposta a necessidades e desafios críticos locais e regionais?', 2),
(26, 'O negócio / produto / a solução apresenta uma iniciativa capaz de atender princípio(s) de responsabilidade empresarial e/ou cidadania corporativa?', 2),
(27, 'O negócio / produto / a solução promove diretamente o desenvolvimento socioeconômico na(s) região(ões) onde é desenvolvido e/ou utilizado ou consumido?', 2),
(28, 'O negócio / produto / a solução promove diretamente o desenvolvimento e capacitação de recursos humanos na(s) região(ões) onde é desenvolvido e/ou utilizado ou consumido?', 2);

-- --------------------------------------------------------

--
-- Estrutura da tabela `respostas`
--

CREATE TABLE IF NOT EXISTS `respostas` (
  `idp` int(11) NOT NULL,
  `idq` int(11) NOT NULL,
  `resp` int(11) NOT NULL,
  `just` text,
  PRIMARY KEY (`idp`,`idq`),
  KEY `idq` (`idq`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tecnologia`
--

CREATE TABLE IF NOT EXISTS `tecnologia` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nome` (`nome`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Estrutura da tabela `tipo_resposta`
--

CREATE TABLE IF NOT EXISTS `tipo_resposta` (
  `tipo` int(11) NOT NULL,
  `rotulo` varchar(70) NOT NULL,
  `resp` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Extraindo dados da tabela `tipo_resposta`
--

INSERT INTO `tipo_resposta` (`tipo`, `rotulo`, `resp`) VALUES
(2, 'Pelo contrário, acarreta impacto negativo sobre o aspecto', -1),
(2, 'Não', 0),
(2, 'Talvez - Incerto - Parcialmente\n', 1),
(2, 'Sim - Plenamente', 2),
(1, 'Sim - Plenamente', 2),
(1, 'Talvez - Incerto - Parcialmente', 1),
(1, 'Não', 0);

-- --------------------------------------------------------

--
-- Estrutura da tabela `usuario`
--

CREATE TABLE IF NOT EXISTS `usuario` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) DEFAULT NULL,
  `empresa` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `senha` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Extraindo dados da tabela `usuario`
--

INSERT INTO `usuario` (`id`, `nome`, `empresa`, `email`, `senha`) VALUES
(1, 'admin', 'greenitconsultoria', 'admin@greenitconsultoria.com', '21232f297a57a5a743894a0e4a801fc3'),
(2, 'nahim', 'Do Nahim', 'nahim@nahim.com', 'fcea920f7412b5da7be0cf42b8c93759'),
(3, 'Nahim Alves de Souza', 'Ufscar', 'nahimsouza@yahoo.com.br', 'fcea920f7412b5da7be0cf42b8c93759');

--
-- Restrições para as tabelas dumpadas
--

--
-- Restrições para a tabela `just-matriz`
--
ALTER TABLE `just-matriz`
  ADD CONSTRAINT `just@002dmatriz_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `projeto` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `proj-tec`
--
ALTER TABLE `proj-tec`
  ADD CONSTRAINT `proj@002dtec_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `projeto` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proj@002dtec_ibfk_2` FOREIGN KEY (`idt`) REFERENCES `tecnologia` (`id`);

--
-- Restrições para a tabela `projeto`
--
ALTER TABLE `projeto`
  ADD CONSTRAINT `projeto_ibfk_1` FOREIGN KEY (`idu`) REFERENCES `usuario` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Restrições para a tabela `respostas`
--
ALTER TABLE `respostas`
  ADD CONSTRAINT `respostas_ibfk_1` FOREIGN KEY (`idp`) REFERENCES `projeto` (`idp`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `respostas_ibfk_2` FOREIGN KEY (`idq`) REFERENCES `questoes` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
