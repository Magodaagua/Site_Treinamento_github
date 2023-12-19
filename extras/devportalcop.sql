-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 19/12/2023 às 13:03
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
-- Banco de dados: `devportalcop`
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
-- Estrutura para tabela `aulas`
--

CREATE TABLE `aulas` (
  `id` int(200) NOT NULL,
  `titulo` varchar(500) NOT NULL,
  `conteudo` text NOT NULL,
  `pdf` text NOT NULL,
  `resumo` text NOT NULL,
  `ordem` int(11) NOT NULL,
  `assistido` tinyint(2) NOT NULL,
  `modulo_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `aulas`
--

INSERT INTO `aulas` (`id`, `titulo`, `conteudo`, `pdf`, `resumo`, `ordem`, `assistido`, `modulo_id`) VALUES
(1, 'Aula 1', '<div class=\"video-container\">\r\n        <h2>Aula 1: Introdução ao Curso</h2>\r\n        <iframe\r\n            width=\"560\"\r\n            height=\"315\"    src=\"https://www.youtube.com/embed/UahN4VjjAo0?si=L7a2o007F7sHczpN\"\r\n            title=\"YouTube video player\"\r\n            frameborder=\"0\"\r\n            allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\"\r\n            allowfullscreen\r\n        ></iframe>\r\n        <br><br>\r\n</div>', '<div style=\"display: inline-block; margin-right: 20px;\">                                                      <img src=\'admin/pdf/arquivo.png\' width=\'150\'><br><br>LinguagemC.pdf<br><br>                                                         <button class=\'btn btn-outline-info btn-sm\'><a href=\'admin/pdf/32/sites.txt\' download>Download</a></button>                                                  </div>                                                  <div style=\"display: inline-block;\">                                                   <img src=\'admin/pdf/arquivo.png\' width=\'150\'><br><br>LinguagemC.pdf<br><br>                                                     <button class=\'btn btn-outline-info btn-sm\'><a href=\'admin/pdf/32/sites.txt\' download>Download</a></button><br>                                                  </div>', 'A linguagem C existe desde antes da internet e foi criada pelo cientista da computação Dennis Ritchie e Ken Thompson, em 1972. O propósito inicial era que fosse uma linguagem usada no desenvolvimento de uma nova versão do sistema operacional Unix, mas hoje é aplicada para criar softwares. É também muito usada em banco de dados para todos os tipos de sistemas: financeiro, governamental, mídia, entretenimento, telecomunicações, saúde, educação, varejo, redes sociais, etc. Grandes empresas como Apple, Microsoft, Oracle usam a linguagem C.\r\n', 1, 1, 1),
(2, 'Aula 3', '<p>Aula 3 do módulo 1 e do curso 1</p>\r\n<iframe width=\"560\" height=\"315\" src=\"https://www.youtube.com/embed/YoQHFloNPZ0?si=hWO8IIuXKXjp7RC2\" title=\"YouTube video player\" frameborder=\"0\" allow=\"accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share\" allowfullscreen></iframe>', '', '', 3, 1, 1),
(3, 'Aula 2', '<p>Aula 2 do módulo 1 e do curso 1</p>', '', '', 2, 1, 1),
(4, 'Aula 1', '', '', '', 1, 1, 2),
(5, 'Aula 1', '', '', '', 1, 1, 3),
(6, 'Prova', 'Prova do Módulo 1', '', '', 4, 1, 1);

-- --------------------------------------------------------

--
-- Estrutura para tabela `categoria`
--

CREATE TABLE `categoria` (
  `id` int(200) NOT NULL,
  `Nome_cat` varchar(500) NOT NULL,
  `imagem` varchar(500) NOT NULL,
  `tipo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `categoria`
--

INSERT INTO `categoria` (`id`, `Nome_cat`, `imagem`, `tipo`) VALUES
(1, 'Administração', 'Administração.png', 'Particular'),
(2, 'Atendimento', 'Atendimento.png', 'Particular'),
(3, 'Contabilidade', 'Contabilidade.png', 'Particular'),
(4, 'Informática', 'Informática.png', 'Particular'),
(5, 'Marketing', 'Marketing.png', 'Particular'),
(6, 'Mecânica', 'Mecânica.png', 'Particular'),
(7, 'Vendas', 'Vendas.png', 'Particular'),
(16, 'Geral', '1250622.png', 'Pública'),
(17, 'teste', '4909732.png', 'Pública');

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
  `conclusao` int(2) NOT NULL,
  `valido` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Despejando dados para a tabela `curso`
--

INSERT INTO `curso` (`ID_curso`, `Nome`, `Categoria`, `Subcategoria`, `Descricao`, `Datadecriacao`, `imagem`, `pdf`, `video`, `conclusao`, `valido`) VALUES
(1, 'Linguagem C', 'Informática', 'Programação', 'Curso para ensinar C básico', '2023-08-20', 'csharp.png', '', '', 1, 100),
(2, 'Python', 'Informática', 'Programação', 'Curso para ensinar Python básico', '2022-12-12', '2.png', '2.pdf', '2.mp4', 2, 0),
(3, 'PacoteOffice', 'Informática', 'Office', 'Curso para ensinar Pacote Office avançado', '2023-08-31', '3.png', '', '', 0, 0),
(4, 'C#', 'Informática', 'Programação Orientada a Objeto', 'Curso para ensinar C# intermediário', '2023-08-18', '4.png', '', '', 0, 0),
(5, 'Administração de Empresas', 'Administração', 'Empresas', 'Curso para ensinar Administração básico', '2023-02-27', '5.png', '', '', 0, 0),
(6, 'Java', 'Informática', 'Programação Orientada a Objeto', 'Curso para ensinar Java básico', '0000-00-00', '6.png', '', '', 0, 0),
(7, 'Contabilidade', 'Contabilidade', 'Empresas', 'Curso para ensinar Administração básico', '2023-02-27', '7.png', '', '', 0, 0),
(8, 'PHP', 'Informática', 'Programação Orientada a Objeto', 'Curso para ensinar Java básico', '2021-04-07', '8.png', '', '', 0, 0);

-- --------------------------------------------------------

--
-- Estrutura para tabela `escolha`
--

CREATE TABLE `escolha` (
  `id` int(5) NOT NULL,
  `tipo` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `escolha`
--

INSERT INTO `escolha` (`id`, `tipo`) VALUES
(1, 'Particular'),
(2, 'Pública');

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
(1, 'Some great placeholder content for the first featurette here. Imagine some exciting prose here.', 'Another featurette? Of course. More placeholder content here to give you an idea of how this layout would work with some actual real-world content in place.', 'And yes, this is the last block of representative placeholder content. Again, not really intended to be actually read, simply here to give you a better view of what this would look like with some actual content. Your content.', 'First featurette heading. It’ll blow your mind.', 'Oh yeah, it’s that good. See for yourself.', 'And lastly, this one. Checkmate..', 'carrosel.png', 'carrosel2.jpeg', 'carrosel3.jpg', 'carrosel.png', 'carrosel2.jpeg', 'carrosel3.jpg');

-- --------------------------------------------------------

--
-- Estrutura para tabela `modulos`
--

CREATE TABLE `modulos` (
  `id` int(200) NOT NULL,
  `nome` varchar(600) NOT NULL,
  `ordem` int(200) NOT NULL,
  `curso_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `modulos`
--

INSERT INTO `modulos` (`id`, `nome`, `ordem`, `curso_id`) VALUES
(1, 'Módulo 1 do curso 1', 1, 1),
(2, 'Módulo 3 do curso 1', 3, 1),
(3, 'Módulo 2 do curso 1', 2, 1);

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
(6, 'NDDPrint', 'O NDD Print é uma solução internacional voltada para o mercado de impressão, com tecnologias para provedores de outsourcing de impressão e clientes desses provedores.', 'https://kubolms.com.br/nddacademy/', '6.png');

-- --------------------------------------------------------

--
-- Estrutura para tabela `pdf_aula`
--

CREATE TABLE `pdf_aula` (
  `pdfid` int(200) NOT NULL,
  `nome` varchar(500) NOT NULL,
  `aula_id` int(200) NOT NULL,
  `modulo_id` int(200) NOT NULL,
  `curso_id` int(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Despejando dados para a tabela `pdf_aula`
--

INSERT INTO `pdf_aula` (`pdfid`, `nome`, `aula_id`, `modulo_id`, `curso_id`) VALUES
(1, 'LinguagemC.pdf            ', 1, 1, 1),
(2, 'Batata.pdf', 1, 1, 1),
(3, 'teste4', 1, 2, 1),
(4, 'teste5', 1, 1, 1),
(5, 'teste6', 2, 1, 1),
(6, 'Teste10', 3, 1, 1),
(7, 'testes20', 1, 1, 1);

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
(2, 'Kleiton', 1234567896, 1234567888, 'Mecânica', 'kleiton@gmail.com', 'abc'),
(4, 'Patricia Canciano', 1234567890, 1234567890, 'Analista', 'suporte.atendimento@copimaq.com.br', '123'),
(5, 'Guilherme Patez', 1234567890, 1234567890, 'Analista', 'suporte.ti@copimaq.com.br', '12345678'),
(6, 'Herculano Nascimento', 1234567890, 1234567890, 'Gerente', 'ti@copimaq.com.br', '123'),
(7, 'Victor Sofiato', 1234567891, 1234567898, 'Suporte', 'suporte@copimaq.com.br', '1234'),
(8, 'Leonardo Oliveira', 1234567891, 1234567898, 'Supervisor', 'suporte.solucoes@copimaq.com.br', '12345678');

--
-- Índices para tabelas despejadas
--

--
-- Índices de tabela `administrador`
--
ALTER TABLE `administrador`
  ADD PRIMARY KEY (`ID_admin`);

--
-- Índices de tabela `aulas`
--
ALTER TABLE `aulas`
  ADD PRIMARY KEY (`id`);

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
-- Índices de tabela `escolha`
--
ALTER TABLE `escolha`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`ID_menu`);

--
-- Índices de tabela `modulos`
--
ALTER TABLE `modulos`
  ADD PRIMARY KEY (`id`);

--
-- Índices de tabela `parceiro`
--
ALTER TABLE `parceiro`
  ADD PRIMARY KEY (`ID_parceiro`);

--
-- Índices de tabela `pdf_aula`
--
ALTER TABLE `pdf_aula`
  ADD PRIMARY KEY (`pdfid`);

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
-- AUTO_INCREMENT de tabela `aulas`
--
ALTER TABLE `aulas`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `categoria`
--
ALTER TABLE `categoria`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT de tabela `curso`
--
ALTER TABLE `curso`
  MODIFY `ID_curso` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT de tabela `escolha`
--
ALTER TABLE `escolha`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de tabela `menu`
--
ALTER TABLE `menu`
  MODIFY `ID_menu` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `modulos`
--
ALTER TABLE `modulos`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de tabela `parceiro`
--
ALTER TABLE `parceiro`
  MODIFY `ID_parceiro` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de tabela `pdf_aula`
--
ALTER TABLE `pdf_aula`
  MODIFY `pdfid` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de tabela `rodape`
--
ALTER TABLE `rodape`
  MODIFY `ID_rodape` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de tabela `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_usuario` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
