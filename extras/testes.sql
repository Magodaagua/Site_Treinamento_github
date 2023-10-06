-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 06/10/2023 às 22:56
-- Versão do servidor: 10.4.28-MariaDB
-- Versão do PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `testes`
--

-- --------------------------------------------------------

--
-- Estrutura para tabela `administrador`
--

CREATE TABLE `administrador` (
  `ID_admin` int(200) NOT NULL,
  `email` varchar(500) NOT NULL,
  `senha` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `administrador`
--

INSERT INTO `administrador` (`ID_admin`, `email`, `senha`) VALUES
(1, 'joao@joao', '1234');

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(200) NOT NULL,
  `Nome_cat` varchar(500) NOT NULL,
  `imagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `Nome_cat`, `imagem`) VALUES
(1, 'Administração', 'Administração.png'),
(2, 'Atendimento', 'Atendimento.png'),
(3, 'Contabilidade', 'Contabilidade.png'),
(4, 'Informática', 'Informática.png'),
(5, 'Marketing', 'Marketing.png'),
(6, 'Mecânica', 'Mecânica.png'),
(7, 'Vendas', 'Vendas.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `curso`
--

CREATE TABLE `curso` (
  `ID_curso` int(200) NOT NULL,
  `Nome` varchar(400) NOT NULL,
  `Categoria` varchar(500) NOT NULL,
  `Subcategoria` varchar(400) NOT NULL,
  `Descricao` longtext NOT NULL,
  `Datadecriacao` date NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `pdf` varchar(500) NOT NULL,
  `video` varchar(500) NOT NULL,
  `prova` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`ID_curso`, `Nome`, `Categoria`, `Subcategoria`, `Descricao`, `Datadecriacao`, `imagem`, `pdf`, `video`, `prova`) VALUES
(1, 'Linguagem C', 'Informática', 'Programação', 'Curso para ensinar C básico', '2023-08-20', 'csharp.png', '', '', ''),
(2, 'Python', 'Informática', 'Programação', 'Curso para ensinar Python básico', '2022-12-12', '2.png', '2.pdf', '2.mp4', ''),
(3, 'PacoteOffice', 'Informática', 'Office', 'Curso para ensinar Pacote Office avançado', '2023-08-31', '3.png', '', '', ''),
(4, 'C#', 'Informática', 'Programação Orientada a Objeto', 'Curso para ensinar C# intermediário', '2023-08-18', '4.png', '', '', ''),
(5, 'Administração de Empresas', 'Administração', 'Empresas', 'Curso para ensinar Administração básico', '2023-02-27', '5.png', '', '', ''),
(6, 'Java', 'Informática', 'Programação Orientada a Objeto', 'Curso para ensinar Java básico', '0000-00-00', '6.png', '', '', ''),
(7, 'Contabilidade', 'Contabilidade', 'Empresas', 'Curso para ensinar Administração básico', '2023-02-27', '7.png', '', '', ''),
(8, 'PHP', 'Informática', 'Programação Orientada a Objeto', 'Curso para ensinar Java básico', '2021-04-08', '8.png', '', '', ''),
(10, 'teste', 'Informática', 'Programação Orientada a Objeto', 'Unity é uma ferramenta que permite criar videojogos para diversas plataformas (PC, consolas, mobile, VR e AR) utilizando um editor visual e programação através de scripting,', '2023-09-21', '', '', '', '');

-- --------------------------------------------------------

--
-- Estrutura para tabela `menu`
--

CREATE TABLE `menu` (
  `ID_menu` int(255) NOT NULL,
  `texto1` text NOT NULL,
  `texto2` text NOT NULL,
  `texto3` text NOT NULL,
  `titulo1` varchar(500) NOT NULL,
  `titulo2` varchar(500) NOT NULL,
  `titulo3` varchar(500) NOT NULL,
  `imagem1` varchar(500) NOT NULL,
  `imagem2` varchar(500) NOT NULL,
  `imagem3` varchar(500) NOT NULL,
  `carrosel1` varchar(500) NOT NULL,
  `carrosel2` varchar(500) NOT NULL,
  `carrosel3` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `menu`
--

INSERT INTO `menu` (`ID_menu`, `texto1`, `texto2`, `texto3`, `titulo1`, `titulo2`, `titulo3`, `imagem1`, `imagem2`, `imagem3`, `carrosel1`, `carrosel2`, `carrosel3`) VALUES
(1, 'Some great placeholder content for the first featurette here. Imagine some exciting prose here.', 'Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.', 'And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.', 'First featurette heading. It’ll blow your mind.', 'Oh yeah, it’s that good. See for yourself.', 'And lastly, this one. Checkmate.', 'carrosel.png', 'carrosel2.jpeg', 'carrosel3.jpg', 'carrosel.png', 'carrosel2.jpeg', 'carrosel3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `parceiro`
--

CREATE TABLE `parceiro` (
  `ID_parceiro` int(200) NOT NULL,
  `Nome` varchar(500) NOT NULL,
  `Descricao` varchar(500) NOT NULL,
  `link` text NOT NULL,
  `imagem` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `parceiro`
--

INSERT INTO `parceiro` (`ID_parceiro`, `Nome`, `Descricao`, `link`, `imagem`) VALUES
(1, 'PrintWayy', 'O PrintWayy Dragon disponibiliza integrações através de API, permitindo uma completa incorporação de serviços entre sistemas ERP, WebServices, plataformas de BI e até mesmo outras fontes de dados com os nossos serviços. Encontre mais informações acessando a página dedicada ao assunto.', 'https://app.printwayy.com/Account/Login?ReturnUrl=/', '1.png'),
(2, 'Simpress', 'Solução de locação de notebooks e computadores, com todo suporte necessário para otimizar os processos empresariais. Conte com equipamentos robustos e facilite o acesso às informações em qualquer ambiente com coletores e impressoras térmicas.', 'https://simuniversidade.com.br/login', '2.png'),
(3, 'PaperCut', 'PaperCut é um sistema de monitoramento, cota, cobrança e controle de impressão para redes. Ele foi especificamente projetado para suprir as demandas de instituições de ensino, governo e corporações de todos os tamanhos visando o uso responsável de recursos de Tecnologia.', 'https://portal.papercut.com/login/', '3.png'),
(4, 'Zebra', 'A impressora Zebra serve para a impressão de etiquetas. Ela pode ser usada no segmento de Transporte e Logística para a identificação de caixas e bilhetes de embarque, em supermercados e em muitos outros negócios.', 'https://www.zebra.com/br/pt/products/printers/desktop.html?page=1', '4.png'),
(5, 'SafeQ', 'O YSoft SafeQ é um conjunto de soluções modulares de gestão de impressão empresarial a nível mundial, que permite às organizações assumir o controlo do ambiente de impressão, reduzir custos, aumentar a segurança e a conformidade dos seus documentos, melhorar a produtividade no escritório e, ao mesmo tempo, minimizar o impacto ambiental da impressão.', 'https://www.ysoft.com/en/solutions/print-management', '5.png'),
(6, 'NDDPrint', 'O NDD Print é uma solução internacional voltada para o mercado de impressão, com tecnologias para provedores de outsourcing de impressão e clientes desses provedores.', 'https://kubolms.com.br/nddacademy/', '6.png'),
(7, 'Unity3D', 'Unity é uma ferramenta que permite criar videojogos para diversas plataformas (PC, consolas, mobile, VR e AR) utilizando um editor visual e programação através de scripting,', 'https://unity.com/pt', ''),
(9, 'teste', 'Unity é uma ferramenta que permite criar videojogos para diversas plataformas (PC, consolas, mobile, VR e AR) utilizando um editor visual e programação através de scripting,', 'https://app.printwayy.com/Account/Login?ReturnUrl=/', 'prova.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `rodape`
--

CREATE TABLE `rodape` (
  `ID_rodape` int(2) NOT NULL,
  `politica` varchar(500) NOT NULL,
  `termos` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `rodape`
--

INSERT INTO `rodape` (`ID_rodape`, `politica`, `termos`) VALUES
(1, 'Teste 1', 'Teste 2');

-- --------------------------------------------------------

--
-- Estrutura para tabela `usuario`
--

CREATE TABLE `usuario` (
  `ID_usuario` int(200) NOT NULL,
  `Nome` varchar(400) NOT NULL,
  `CPF` int(200) NOT NULL,
  `RG` int(200) NOT NULL,
  `Cargo` varchar(400) NOT NULL,
  `email` varchar(400) NOT NULL,
  `senha` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `usuario`
--

INSERT INTO `usuario` (`ID_usuario`, `Nome`, `CPF`, `RG`, `Cargo`, `email`, `senha`) VALUES
(1, 'Jorge', 1234567891, 1234567892, 'Informática', 'jooj@jooj', '1234'),
(2, 'Kleiton', 1234567896, 1234567888, 'Mecânica', 'kleiton@gmail.com', 'abc');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Índices de tabela `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `curso`
--
ALTER TABLE `curso`
  ADD PRIMARY KEY (`ID_curso`);

--
-- Índices de tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_menu`);

--
-- Índices de tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`ID_parceiro`);

--
-- Índices de tabela `rodape`
--
ALTER TABLE `rodape`
  ADD PRIMARY KEY (`ID_rodape`);

--
-- Índices de tabela `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_usuario`);

--
-- AUTO_INCREMENT para tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `administrador`
--
ALTER TABLE `administrador`
  MODIFY `ID_admin` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_curso` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `ID_parceiro` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `rodape`
--
ALTER TABLE `rodape`
  MODIFY `ID_rodape` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
