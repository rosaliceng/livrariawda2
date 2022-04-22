-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Tempo de geração: 22-Abr-2022 às 01:03
-- Versão do servidor: 10.4.21-MariaDB
-- versão do PHP: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Banco de dados: `id18820404_lib_database`
--

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `available_companies`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `available_companies` (
`id` int(11)
,`name` varchar(200)
,`city` varchar(200)
,`avaible` int(1)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(300) CHARACTER SET utf8 NOT NULL,
  `author` varchar(20) CHARACTER SET utf8 NOT NULL,
  `company_id` int(11) NOT NULL,
  `launch` date NOT NULL,
  `quantity` int(4) NOT NULL,
  `status` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `company_id`, `launch`, `quantity`, `status`) VALUES
(1, 'Clean Code', 'Uncle Bob', 2, '2022-05-28', 5, 1),
(2, 'teste2', 'sen', 1, '2022-05-31', 12, 0),
(3, 'Design Patterns', 'GoF', 2, '2022-04-20', 90, 1),
(4, 'Livro novo', 'Desconhecido', 2, '2022-04-01', 5, 1);

-- --------------------------------------------------------

--
-- Estrutura da tabela `books_users`
--

CREATE TABLE `books_users` (
  `id` int(11) NOT NULL,
  `book_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `pick_date` date NOT NULL,
  `exp_date` date NOT NULL,
  `return_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `books_users`
--

INSERT INTO `books_users` (`id`, `book_id`, `user_id`, `pick_date`, `exp_date`, `return_date`) VALUES
(1, 1, 29, '2022-04-15', '2022-04-18', '2022-04-23'),
(2, 3, 6, '2022-04-21', '2022-04-22', '2022-03-04'),
(3, 1, 13, '2022-04-21', '2022-04-22', '2022-03-04'),
(4, 3, 13, '2022-04-21', '2022-04-23', NULL),
(5, 3, 1, '2022-04-21', '2022-04-23', NULL),
(6, 4, 1, '2022-04-21', '2022-04-23', NULL);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `books_view`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `books_view` (
`id` int(11)
,`name` varchar(300)
,`author` varchar(20)
,`company_id` int(11)
,`launch` date
,`quantity` int(4)
,`status` int(1)
,`editora` varchar(200)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) CHARACTER SET utf8 NOT NULL,
  `city` varchar(200) CHARACTER SET utf8 NOT NULL,
  `avaible` int(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `company`
--

INSERT INTO `company` (`id`, `name`, `city`, `avaible`) VALUES
(1, 'saraivax', 'fortalezax', 1),
(2, 'europa', 'caucacia', 1),
(3, 'teste', 'assadas', 0),
(4, 'Alegre', 'maranguape', 1),
(5, 'Alegre', 'Caucaia', 1);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `locacao_livros`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `locacao_livros` (
`id` int(11)
,`book_id` int(11)
,`user_id` int(11)
,`pick_date` date
,`exp_date` date
,`returned` date
,`book` varchar(300)
,`username` varchar(80)
);

-- --------------------------------------------------------

--
-- Estrutura stand-in para vista `top_locacao`
-- (Veja abaixo para a view atual)
--
CREATE TABLE `top_locacao` (
`book` varchar(300)
,`quantity` bigint(21)
);

-- --------------------------------------------------------

--
-- Estrutura da tabela `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(80) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(33) COLLATE utf8_unicode_ci NOT NULL DEFAULT '202cb962ac59075b964b07152d234b70',
  `level` int(1) NOT NULL DEFAULT 0,
  `city` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(11) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Extraindo dados da tabela `users`
--

INSERT INTO `users` (`id`, `name`, `password`, `level`, `city`, `address`, `email`, `status`) VALUES
(1, 'Admin', '45cb41b32dcfb917ccd8614f1536d6da', 1, 'Fortaleza/Ce', 'Rua Dr Helio Viana 1516 casa B', 'adm@email.com', 1),
(2, '1', '5', 0, '2', '3', '4', 0),
(3, 'alice', '', 0, 'fortaleza', 'rua das casas 123', 'alice@mail.com', 0),
(4, 'alcides', '', 0, 'fortaleza', 'rua das casas 123', 'alcides@mail.com', 0),
(5, 'teste', '', 0, 'cidade', 'end', 'mail@gmail.com', 0),
(6, 'Rosalice Nogueira', '', 0, 'Fortaleza', 'rua das casas 123', 'rosaliceng@gmail.com', 1),
(8, 'cris', '', 0, 'Fortaleza', 'rua das casas 123', 'cris@mail.com', 0),
(9, 'teste', '123123', 0, 'aaaa', 'aassss', 'dddd', 0),
(13, 'junior', '202cb962ac59075b964b07152d234b70', 0, 'maranguape', 'rua das casas 123', 'mail@gmail.com', 1),
(14, 'junior', '202cb962ac59075b964b07152d234b70', 0, 'fortaleza', 'asdadsasd', 'alice@mail.com', 0),
(15, 'asdasd', '202cb962ac59075b964b07152d234b70', 0, 'adasd', 'asda', 'asdasdadasd', 0),
(16, 'asd', '202cb962ac59075b964b07152d234b70', 0, 'asdasdad', 'asdasd', 'asdasd', 0),
(17, 'asd', '202cb962ac59075b964b07152d234b70', 0, 'asdasdad', 'asdasd', 'asdasd', 0),
(18, 'asd', '202cb962ac59075b964b07152d234b70', 0, 'asdasdad', 'asdasd', 'asdasd', 0),
(19, 'asd', '202cb962ac59075b964b07152d234b70', 0, 'asdasdad', 'asdasd', 'asdasd', 0),
(20, 'Professor', '202cb962ac59075b964b07152d234b70', 0, 'Sem definida', 'Sem endereco', 'email@mail.com.br', 0),
(21, 'Teste', '202cb962ac59075b964b07152d234b70', 0, 'Caucaia', 'Rua tal 897', 'teste@gmail.com', 0),
(22, '', '202cb962ac59075b964b07152d234b70', 0, '', '', '', 0),
(23, '', '202cb962ac59075b964b07152d234b70', 0, '', '', '', 0),
(24, 'ggg', '202cb962ac59075b964b07152d234b70', 0, 'fortaleza', 'ddd', 'dddd', 0),
(25, '', '202cb962ac59075b964b07152d234b70', 0, '', '', '', 0),
(26, 'alice', '202cb962ac59075b964b07152d234b70', 0, 'maranguape', 'rua das casas 123', 'alice@mail.com', 0),
(27, '', '202cb962ac59075b964b07152d234b70', 0, '', '', '', 0),
(28, '', '202cb962ac59075b964b07152d234b70', 0, '', '', '', 0),
(29, 'Professor', '202cb962ac59075b964b07152d234b70', 0, 'Campinas/SP', 'Rua das flores margaridas, 176', 'professor@campinas.com.br', 1),
(30, 'asdasdasdasda', '202cb962ac59075b964b07152d234b70', 0, '', '', '', 0);

-- --------------------------------------------------------

--
-- Estrutura para vista `available_companies`
--
DROP TABLE IF EXISTS `available_companies`;

CREATE VIEW `available_companies`  AS SELECT `company`.`id` AS `id`, `company`.`name` AS `name`, `company`.`city` AS `city`, `company`.`avaible` AS `avaible` FROM `company` WHERE `company`.`avaible` = 11  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `books_view`
--
DROP TABLE IF EXISTS `books_view`;

CREATE VIEW `books_view`  AS SELECT `books`.`id` AS `id`, `books`.`name` AS `name`, `books`.`author` AS `author`, `books`.`company_id` AS `company_id`, `books`.`launch` AS `launch`, `books`.`quantity` AS `quantity`, `books`.`status` AS `status`, `company`.`name` AS `editora` FROM (`books` join `company`) WHERE `books`.`company_id` = `company`.`id` AND `books`.`status` = 11  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `locacao_livros`
--
DROP TABLE IF EXISTS `locacao_livros`;

CREATE VIEW `locacao_livros`  AS SELECT `books_users`.`id` AS `id`, `books_users`.`book_id` AS `book_id`, `books_users`.`user_id` AS `user_id`, `books_users`.`pick_date` AS `pick_date`, `books_users`.`exp_date` AS `exp_date`, `books_users`.`return_date` AS `returned`, `books`.`name` AS `book`, `users`.`name` AS `username` FROM ((`books_users` join `books`) join `users`) WHERE `books_users`.`book_id` = `books`.`id` AND `books_users`.`user_id` = `users`.`id`  ;

-- --------------------------------------------------------

--
-- Estrutura para vista `top_locacao`
--
DROP TABLE IF EXISTS `top_locacao`;

CREATE VIEW `top_locacao`  AS SELECT `locacao_livros`.`book` AS `book`, count(0) AS `quantity` FROM `locacao_livros` GROUP BY `locacao_livros`.`book_id` ORDER BY count(0) AS `DESC` ASC  ;

--
-- Índices para tabelas despejadas
--

--
-- Índices para tabela `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `company_id` (`company_id`);

--
-- Índices para tabela `books_users`
--
ALTER TABLE `books_users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `book_id` (`book_id`,`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Índices para tabela `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Índices para tabela `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- AUTO_INCREMENT de tabelas despejadas
--

--
-- AUTO_INCREMENT de tabela `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de tabela `books_users`
--
ALTER TABLE `books_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de tabela `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de tabela `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Restrições para despejos de tabelas
--

--
-- Limitadores para a tabela `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `books_ibfk_1` FOREIGN KEY (`company_id`) REFERENCES `company` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Limitadores para a tabela `books_users`
--
ALTER TABLE `books_users`
  ADD CONSTRAINT `books_users_ibfk_1` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `books_users_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
