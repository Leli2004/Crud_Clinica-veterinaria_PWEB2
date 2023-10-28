-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.30 - MySQL Community Server - GPL
-- OS do Servidor:               Win64
-- HeidiSQL Versão:              12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Copiando estrutura do banco de dados para db_clinica
CREATE DATABASE IF NOT EXISTS `db_clinica` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_clinica`;

-- Copiando estrutura para tabela db_clinica.animal
CREATE TABLE IF NOT EXISTS `animal` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `peso` varchar(8) COLLATE utf8mb4_unicode_ci NOT NULL,
  `porte` varchar(7) COLLATE utf8mb4_unicode_ci NOT NULL,
  `raca` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tutor_id` bigint unsigned DEFAULT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `animal_tutor_id_foreign` (`tutor_id`),
  CONSTRAINT `animal_tutor_id_foreign` FOREIGN KEY (`tutor_id`) REFERENCES `tutor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.animal: ~10 rows (aproximadamente)
INSERT INTO `animal` (`id`, `nome`, `peso`, `porte`, `raca`, `tutor_id`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Lutero', '55', 'P', 'talita35', 1, NULL, NULL, NULL),
	(2, 'Marinho', '14', 'M', 'solano.rebeca', 3, NULL, NULL, NULL),
	(3, 'Pereira', '17', 'M', 'benjamin.faria', 1, NULL, NULL, NULL),
	(4, 'Delatorre', '71', 'P', 'sergio41', 1, NULL, NULL, NULL),
	(5, 'Cordeiro', '79', 'P', 'flores.ohana', 1, NULL, NULL, NULL),
	(6, 'de Souza', '8', 'M', 'molina.lara', 2, NULL, NULL, NULL),
	(7, 'Valência', '33', 'M', 'esantacruz', 5, NULL, NULL, NULL),
	(8, 'Maldonado', '100', 'M', 'nathalia80', 1, NULL, NULL, NULL),
	(9, 'Cruz', '81', 'P', 'antonella38', 3, NULL, NULL, NULL),
	(10, 'Campos', '10', 'P', 'cdearruda', 5, NULL, NULL, NULL);

-- Copiando estrutura para tabela db_clinica.colaborador
CREATE TABLE IF NOT EXISTS `colaborador` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cargo` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.colaborador: ~10 rows (aproximadamente)
INSERT INTO `colaborador` (`id`, `nome`, `cpf`, `telefone`, `cargo`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Sr. Eduardo Matias', '234.033.750-05', '(35) 98622-9067', 'qui', NULL, NULL, NULL),
	(2, 'Sra. Naiara Rafaela Benites', '132.838.505-18', '(49) 92268-2333', 'qui', NULL, NULL, NULL),
	(3, 'Dr. Breno Martines Neto', '648.432.352-61', '(41) 3140-5741', 'quo', NULL, NULL, NULL),
	(4, 'Dr. Isabelly Fabiana Zamana Filho', '871.174.599-13', '(19) 95182-6747', 'quia', NULL, NULL, NULL),
	(5, 'Jennifer Espinoza', '830.527.324-55', '(62) 2303-8360', 'laudantium', NULL, NULL, NULL),
	(6, 'Cauan Marcelo Fontes Sobrinho', '904.531.727-33', '(69) 94828-7054', 'consequatur', NULL, NULL, NULL),
	(7, 'Sr. Sergio Horácio Fonseca Filho', '804.516.003-98', '(24) 3843-2817', 'pariatur', NULL, NULL, NULL),
	(8, 'Ricardo Matheus Ávila', '340.977.771-73', '(42) 4411-9638', 'quis', NULL, NULL, NULL),
	(9, 'Vanessa Leal', '983.912.836-15', '(18) 91515-2582', 'ut', NULL, NULL, NULL),
	(10, 'Benício Pontes Tamoio', '001.221.375-66', '(45) 2287-9323', 'ut', NULL, NULL, NULL);

-- Copiando estrutura para tabela db_clinica.consulta
CREATE TABLE IF NOT EXISTS `consulta` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `data` varchar(12) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hora` varchar(6) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `descricao` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `animal_id` bigint unsigned DEFAULT NULL,
  `colaborador_id` bigint unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `consulta_animal_id_foreign` (`animal_id`),
  KEY `consulta_colaborador_id_foreign` (`colaborador_id`),
  CONSTRAINT `consulta_animal_id_foreign` FOREIGN KEY (`animal_id`) REFERENCES `animal` (`id`) ON DELETE CASCADE,
  CONSTRAINT `consulta_colaborador_id_foreign` FOREIGN KEY (`colaborador_id`) REFERENCES `colaborador` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.consulta: ~10 rows (aproximadamente)
INSERT INTO `consulta` (`id`, `data`, `hora`, `tipo`, `descricao`, `animal_id`, `colaborador_id`, `created_at`, `updated_at`) VALUES
	(1, '1984-03-09', '17:52', 'Exame', 'Travessa Maicon', 5, 4, NULL, NULL),
	(2, '2009-06-27', '05:59', 'Exame', 'R. Santacruz', 4, 5, NULL, NULL),
	(3, '1993-08-30', '08:53', 'Consulta', 'Av. de Aguiar', 4, 3, NULL, NULL),
	(4, '1976-07-20', '18:47', 'Cirurgia', 'Avenida Paulina Paes', 1, 6, NULL, NULL),
	(5, '1990-04-01', '08:34', 'Consulta', 'Rua Esther', 2, 3, NULL, NULL),
	(6, '1992-03-30', '23:30', 'Cirurgia', 'Largo Joaquin', 2, 10, NULL, NULL),
	(7, '1999-03-07', '11:28', 'Consulta', 'Largo Vieira', 2, 3, NULL, NULL),
	(8, '2021-04-06', '13:57', 'Cirurgia', 'R. Vitor', 1, 9, NULL, NULL),
	(9, '2019-07-06', '17:02', 'Consulta', 'Largo Luna', 4, 1, NULL, NULL),
	(10, '2010-04-18', '04:12', 'Cirurgia', 'Travessa Kléber Barreto', 3, 2, NULL, NULL);

-- Copiando estrutura para tabela db_clinica.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.failed_jobs: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_clinica.fornecedor
CREATE TABLE IF NOT EXISTS `fornecedor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cnpj` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.fornecedor: ~10 rows (aproximadamente)
INSERT INTO `fornecedor` (`id`, `nome`, `cnpj`, `telefone`, `endereco`, `created_at`, `updated_at`) VALUES
	(1, 'Sra. Mila Martines Vale Neto', '747.876.052-08', '(83) 90020-7926', 'Avenida da Silva, 2458. Fundos', NULL, NULL),
	(2, 'Srta. Rafaela Padilha Jr.', '567.137.182-13', '(94) 3927-4398', 'R. Luna Ramires, 537', NULL, NULL),
	(3, 'Dr. Joaquim Faro Ramires', '625.211.793-53', '(43) 97698-4941', 'Largo Barreto, 9701', NULL, NULL),
	(4, 'Alexandre Camacho Salazar Filho', '503.622.675-53', '(96) 90749-2642', 'R. Luzia Galindo, 13711', NULL, NULL),
	(5, 'Daniela Antonella Toledo', '131.233.042-21', '(75) 3683-7824', 'Travessa Pontes, 57. Bc. 09 Ap. 25', NULL, NULL),
	(6, 'Srta. Márcia Leon Neto', '167.214.339-07', '(42) 90428-1916', 'R. Vicente, 13522. Bc. 2 Ap. 16', NULL, NULL),
	(7, 'Elis Marisa das Neves Filho', '621.249.572-60', '(83) 94139-0411', 'Largo Willian Godói, 481', NULL, NULL),
	(8, 'Dr. Filipe Rangel Neto', '581.625.721-80', '(55) 2730-7053', 'Travessa Raysa Pontes, 94', NULL, NULL),
	(9, 'Gabriela Pena Delgado', '857.457.800-29', '(46) 4437-7901', 'Largo Denis, 973', NULL, NULL),
	(10, 'Srta. Manuela Padilha das Dores', '595.892.922-40', '(66) 97095-7520', 'Av. Lilian, 529', NULL, NULL);

-- Copiando estrutura para tabela db_clinica.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.migrations: ~10 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_08_30_210203_create_tutors_table', 1),
	(6, '2023_09_01_002242_create_animals_table', 1),
	(7, '2023_10_25_022024_create_fornecedor_table', 1),
	(8, '2023_10_25_022038_create_produtos_table', 1),
	(9, '2023_10_25_022718_create_colaboradors_table', 1),
	(10, '2023_10_25_022718_create_consulta_table', 1);

-- Copiando estrutura para tabela db_clinica.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.password_reset_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_clinica.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.personal_access_tokens: ~0 rows (aproximadamente)

-- Copiando estrutura para tabela db_clinica.produto
CREATE TABLE IF NOT EXISTS `produto` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tipo` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fornecedor_id` bigint unsigned DEFAULT NULL,
  `imagem` varchar(150) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `produto_fornecedor_id_foreign` (`fornecedor_id`),
  CONSTRAINT `produto_fornecedor_id_foreign` FOREIGN KEY (`fornecedor_id`) REFERENCES `fornecedor` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.produto: ~10 rows (aproximadamente)
INSERT INTO `produto` (`id`, `nome`, `tipo`, `fornecedor_id`, `imagem`, `created_at`, `updated_at`) VALUES
	(1, 'Ferreira', 'molestiae', 3, NULL, NULL, NULL),
	(2, 'Verdara', 'eaque', 2, NULL, NULL, NULL),
	(3, 'Medina', 'molestiae', 4, NULL, NULL, NULL),
	(4, 'Santacruz', 'nostrum', 10, NULL, NULL, NULL),
	(5, 'Delgado', 'ea', 6, NULL, NULL, NULL),
	(6, 'Pena', 'nam', 9, NULL, NULL, NULL),
	(7, 'Matias', 'voluptatem', 5, NULL, NULL, NULL),
	(8, 'Bezerra', 'praesentium', 3, NULL, NULL, NULL),
	(9, 'Dias', 'incidunt', 9, NULL, NULL, NULL),
	(10, 'Molina', 'enim', 7, NULL, NULL, NULL);

-- Copiando estrutura para tabela db_clinica.tutor
CREATE TABLE IF NOT EXISTS `tutor` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `nome` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cpf` varchar(14) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(120) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telefone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endereco` varchar(300) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.tutor: ~10 rows (aproximadamente)
INSERT INTO `tutor` (`id`, `nome`, `cpf`, `email`, `telefone`, `endereco`, `created_at`, `updated_at`) VALUES
	(1, 'Késia Aguiar Lozano', '616.448.392-10', 'caroline.lovato@uol.com.br', '(16) 98439-2659', 'Largo Abgail, 3096. Bc. 42 Ap. 25', NULL, NULL),
	(2, 'Davi Vieira Godói', '220.735.796-12', 'mariana49@saraiva.org', '(24) 2013-7410', 'Av. Bianca Arruda, 19410. Anexo', NULL, NULL),
	(3, 'Sr. Thiago Gusmão Zaragoça', '324.084.458-33', 'bezerra.wilson@maia.net.br', '(43) 97857-8362', 'Travessa Máximo Valência, 59. Bc. 50 Ap. 08', NULL, NULL),
	(4, 'Dr. Augusto Faria Camacho', '936.823.809-06', 'monica64@uol.com.br', '(27) 3641-5992', 'Av. Juan Alves, 173. 47º Andar', NULL, NULL),
	(5, 'Suzana Rivera Rios Neto', '449.653.540-87', 'ester.quintana@yahoo.com', '(31) 94434-7216', 'Largo Naomi Azevedo, 29134. Apto 69', NULL, NULL),
	(6, 'Natal Tomás Rivera Jr.', '569.522.428-48', 'paes.suelen@benites.br', '(61) 3693-0604', 'Rua Cruz, 618. Bc. 53 Ap. 25', NULL, NULL),
	(7, 'Dr. Elis Pontes Filho', '261.521.550-70', 'suzana35@aragao.net.br', '(91) 93427-9383', 'Av. Jean Medina, 78416', NULL, NULL),
	(8, 'Madalena Thalissa Paz', '038.084.303-03', 'lfeliciano@uol.com.br', '(48) 3427-1044', 'Rua Máximo Aragão, 96. Fundos', NULL, NULL),
	(9, 'Dr. Bruna Martines Rezende', '051.031.438-44', 'wellington84@rosa.com.br', '(98) 92638-4792', 'Travessa Enzo, 1', NULL, NULL),
	(10, 'Márcio Ferminiano Faro', '722.631.393-62', 'michael.valente@salas.com', '(88) 91299-7215', 'Largo Isaac, 4. 89º Andar', NULL, NULL);

-- Copiando estrutura para tabela db_clinica.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Copiando dados para a tabela db_clinica.users: ~0 rows (aproximadamente)

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
