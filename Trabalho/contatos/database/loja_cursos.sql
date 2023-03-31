SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";

START TRANSACTION;

SET time_zone = "+00:00";

DROP DATABASE IF EXISTS `lojacursos`;

CREATE DATABASE IF NOT EXISTS `lojacursos`;

USE `lojacursos`;

CREATE TABLE
    `contatos` (
        `id` int(11) NOT NULL,
        `nome` varchar(255) NOT NULL,
        `email` varchar(255) NOT NULL,
        `mensagem` text NOT NULL,
        `tipo` varchar(50) NOT NULL,
        `data` datetime NOT NULL DEFAULT current_timestamp(),
        `lida` tinyint(1) NOT NULL
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

CREATE TABLE
    `cursos` (
        `id` int(11) NOT NULL,
        `nome` varchar(255) NOT NULL,
        `descricao` text NOT NULL,
        `imagem` varchar(255) NOT NULL,
        `data_cadastro` datetime NOT NULL DEFAULT current_timestamp()
    ) ENGINE = InnoDB DEFAULT CHARSET = utf8mb4 COLLATE = utf8mb4_general_ci;

INSERT INTO
    `cursos` (
        `id`,
        `nome`,
        `descricao`,
        `imagem`,
        `data_cadastro`
    )
VALUES (
        1,
        'Analise e Desenvolvimento de Sistemas',
        'Aprende a desenvolver Sistemas (●\'◡\'●)',
        'images/cursos/1679779734-2021.02.25_computacao_pessoas_processamento.jpg',
        '2023-03-25 18:28:54'
    ), (
        4,
        'Agronegocio',
        'Agronegocio (┬┬﹏┬┬)',
        'images/cursos/1679780550-agricultura-no-campo-copia.jpg',
        '2023-03-25 18:42:30'
    );

ALTER TABLE `contatos` ADD PRIMARY KEY (`id`);

ALTER TABLE `cursos` ADD PRIMARY KEY (`id`);

ALTER TABLE
    `contatos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 2;

ALTER TABLE
    `cursos` MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,
    AUTO_INCREMENT = 5;

COMMIT;