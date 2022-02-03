-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Tempo de geração: 03-Fev-2022 às 02:00
-- Versão do servidor: 10.4.22-MariaDB
-- versão do PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `tcc`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `clientes`
--

CREATE TABLE `clientes` (
  `id` int(5) NOT NULL,
  `nome` varchar(70) NOT NULL,
  `user` varchar(45) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `filmes` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estrutura da tabela `filmes`
--

CREATE TABLE `filmes` (
  `id` int(11) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `descricao` varchar(500) NOT NULL,
  `elenco` varchar(100) NOT NULL,
  `valor` varchar(10) NOT NULL,
  `quant` int(5) NOT NULL,
  `duracao` time NOT NULL,
  `genero` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `filmes`
--

INSERT INTO `filmes` (`id`, `nome`, `descricao`, `elenco`, `valor`, `quant`, `duracao`, `genero`) VALUES
(3, 'Baby Driver', 'O talentoso motorista de fuga Baby confia nas batidas de sua própria trilha sonora para ser o melhor que existe. A música silencia um zumbido que o perturba desde um acidente na infância. Após conhecer a mulher dos seus sonhos, ele reconhece uma oportunidade de se livrar do estilo de vida questionável e recomeçar do zero. Obrigado a trabalhar para um chefão do crime, Baby lida com a música ao mesmo tempo em que um golpe fadado ao fracasso ameaça sua vida, seu amor e sua liberdade.', 'Ansel Elgort, Lily James, Jon Hamm, Jamie Foxx', '30,00', 17, '01:55:00', 'Ação'),
(4, 'Django Livre', 'No sul dos Estados Unidos, o ex-escravo Django faz uma aliança inesperada com o caçador de recompensas Schultz para caçar os criminosos mais procurados do país e resgatar sua esposa de um fazendeiro que força seus escravos a participar de competições mortais.', 'Quentin Tarantino, Jamie Foxx, Leonardo DiCaprio, Samuel L. Jackson', '30,00', 10, '02:45:00', 'Ação'),
(5, 'Infiltrado', 'Harry, conhecido apenas como H, é um homem misterioso que trabalha para uma empresa de carros-fortes e movimenta grandes quantias de dinheiro pela cidade de Los Angeles. Quando, ao impedir um assalto, ele surpreende a todos com suas habilidades de combate, suas verdadeiras intenções começam a ser questionadas e um plano maior é revelado.', 'Jason Statham, Scott Eastwood, Niamh Algar, Josh Hartnett', '15,00', 12, '01:58:00', 'Ação'),
(6, 'John Wick 2', 'John Wick é forçado a deixar a aposentadoria mais uma vez por causa de uma promessa antiga e viaja para Roma, com o objetivo de ajudar um velho amigo a derrubar uma organização secreta, perigosa e mortal de assassinos procurados em todo o mundo.', 'Keanu Reeves, Ian McShane, Lance Reddick, Laurence Fishburne', '45,00', 12, '02:02:00', 'Ação'),
(7, 'Joker', 'Isolado, intimidado e desconsiderado pela sociedade, o fracassado comediante Arthur Fleck inicia seu caminho como uma mente criminosa após assassinar três homens em pleno metrô. Sua ação inicia um movimento popular contra a elite de Gotham City, da qual Thomas Wayne é seu maior representante.', 'Joaquin Phoenix, Robert De Niro, Zazie Beetz, Frances Conroy', '40,00', 10, '02:02:00', 'Ação'),
(8, 'Matrix', 'Da visionária realizadora Lana Wachowski chega-nos MATRIX RESURRECTIONS o tão aguardado 4º filme do inovador franchise que redefiniu o género. O novo filme reúne os protagonistas originais Keanu Reeves e Carrie-Anne Moss nos icónicos personagens que os tornaram famosos, Neo e Trinity.', 'Keanu Reeves, Laurence Fishburne, Jessica Henwick, Carrie‑Anne Moss', '35,00', 2, '02:28:00', 'Ação'),
(9, 'Venom', 'O relacionamento entre Eddie e Venom está evoluindo. Buscando a melhor forma de lidar com a inevitável simbiose, esse dois lados descobrem como viver juntos e, de alguma forma, se tornarem melhores juntos do que separados.', 'Tom Holland, Tom Hardy, Woody Harrelson, Michelle Williams', '30,00', 10, '01:45:00', 'Ação'),
(10, 'Vingadores A Era de Ultron', 'Ao tentar proteger o planeta de ameaças, Tony Stark constrói um sistema de inteligência artificial que cuidaria da paz mundial. O projeto acaba dando errado e gera o nascimento do Ultron. Com o destino da Terra em jogo, Capitão América, Homem de Ferro, Thor, Hulk, Viúva Negra e Gavião Arqueiro terão que se unir para mais uma vez salvar a raça humana da extinção.', 'Robert Downey Jr, Scarlett Johansson, Chris Evans, Elizabeth Olsen', '50,00', 20, '02:21:00', 'Ação'),
(12, 'After - Depois do Desencontro', 'Tessa toma uma decisão que pode mudar sua vida, mas isso prejudica seu relacionamento com Hardin. Em meio a brigas constantes, o casal tenta achar um ponto de equilíbrio.', 'Hero Fiennes Tiffin, Josephine Langford, Arielle Kebbel, Stephen Moyer', '45,00', 20, '01:38:00', 'Romance'),
(13, 'Homem-Aranha Sem Volta para Casa', 'Em Homem-Aranha: Sem Volta para Casa, Peter Parker (Tom Holland) precisará lidar com as consequências da sua identidade como o herói mais querido do mundo após ter sido revelada pela reportagem do Clarim Diário, com uma gravação feita por Mysterio (Jake Gyllenhaal) no filme anterior. Incapaz de separar sua vida normal das aventuras de ser um super-herói, além de ter sua reputação arruinada por acharem que foi ele quem matou Mysterio e pondo em risco seus entes mais queridos, Parker pede ao Douto', 'Tom Holland, Zendaya, Benedict Cumberbatch, Jacob Batalon', '20,00', 20, '02:29:00', 'Ação'),
(14, 'Até que a Sorte nos Separe', 'Tino é um pai de família que tem sua rotina transformada ao ganhar na loteria. Em dez anos, o fanfarrão e sua mulher Jane gastam todo o dinheiro com uma vida de ostentação. Ao descobrir que está falido, ele é obrigado a aceitar a ajuda de Amauri, seu vizinho, um consultor financeiro nada divertido.', 'Leandro Hassum, Kiko Mascaren, Julia Dalavia, Danielle Winits ', '15,00', 20, '01:44:00', 'Comédia'),
(15, 'Os Farofeiros', 'Quatro colegas de trabalho se programam para curtir o feriado prolongado em uma casa de praia. Lá, eles descobrem que se meteram em uma tremenda roubada.', 'Danielle Winits, Ana Cecília Banal, Elisa Pinheiro, Antônio Fragoso', '15,00', 20, '01:43:00', 'Comédia'),
(19, 'O Auto da Compadecida', 'As aventuras de João Grilo e Chicó, dois nordestinos pobres que vivem de golpes para sobreviver. Eles estão sempre enganando o povo de um pequeno vilarejo, inclusive o temido cangaceiro Severino de Aracaju, que os persegue pela região.', 'Matheus Nachterga, Selton Mello, Virgínia Cavendish', '15', 4, '01:44:00', 'Comédia'),
(20, 'Um Dia', 'Emma Morley e Dexter Mayhew sentem uma conexão especial desde o dia em que se conheceram. Apesar de seguirem rumos diferentes, eles acabam se reencontrando todos os anos no dia', 'Anne Hathaway, Jim Sturgess', '15,00', 1, '01:47:00', 'Romance'),
(21, 'Querido John', 'Quando o soldado John Tyree conhece Savannah Curtis, universitária idealista, um forte romance nasce entre eles. Durante sete anos de um tumultuado relacionamento, o casal se encontra apenas esporadicamente e mantém contato por meio de cartas de amor. Porém, a correspondência entre o casal desencadeia consequências imprevisíveis.', 'Channing Tatum Amanda Seyfried Richard Jenkins Jamie Linden', '20,00', 1, '00:00:01', 'Romance'),
(22, 'Cartas para Julieta', 'Em visita à cidade italiana de Verona com seu noivo ocupado, uma jovem chamada Sophie visita um muro onde os desiludidos deixam cartas para a trágica heroína de Shakespeare, Julieta Capuleto. Ao encontrar uma dessas cartas, de 1957, a jovem decide escrever à autora, Claire. Inspirada pela atitude de Sophie, Claire decide procurar por seu antigo amor.', 'Amanda Seyfried, Vanessa Redgrave, Gael García, Christopher Egan', '20,00', 1, '01:45:00', 'Romance');

-- --------------------------------------------------------

--
-- Estrutura da tabela `funcionarios`
--

CREATE TABLE `funcionarios` (
  `id` int(5) NOT NULL,
  `nome` varchar(50) NOT NULL,
  `user` varchar(25) NOT NULL,
  `senha` varchar(100) NOT NULL,
  `cargo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Extraindo dados da tabela `funcionarios`
--

INSERT INTO `funcionarios` (`id`, `nome`, `user`, `senha`, `cargo`) VALUES
(1, 'Sarah Gomes', 'sarah', 'd9b1d7db4cd6e70935368a1efb10e377', 'Gerente'),
(2, 'Rafaelle', 'rafa', 'ec6a6536ca304edf844d1d248a4f08dc', 'Gerente'),
(3, 'Michaelle', 'michaelle', 'ec6a6536ca304edf844d1d248a4f08dc', 'gerente'),
(4, 'camily rocha', 'mily', 'ec6a6536ca304edf844d1d248a4f08dc', 'vendedora'),
(5, 'Mariana Silva', 'Mari', 'd9b1d7db4cd6e70935368a1efb10e377', 'vendedora');

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `clientes`
--
ALTER TABLE `clientes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `filmes`
--
ALTER TABLE `filmes`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `clientes`
--
ALTER TABLE `clientes`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT de tabela `filmes`
--
ALTER TABLE `filmes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT de tabela `funcionarios`
--
ALTER TABLE `funcionarios`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
