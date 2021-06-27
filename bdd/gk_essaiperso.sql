-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE `avis` (
                        `id` int(11) NOT NULL AUTO_INCREMENT,
                        `titre` varchar(255) NOT NULL,
                        `description` longtext NOT NULL,
                        `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
                        `actif` tinyint(1) NOT NULL DEFAULT '0',
                        `users_id` int(11) NOT NULL,
                        PRIMARY KEY (`id`),
                        KEY `users_id` (`users_id`),
                        CONSTRAINT `avis_ibfk_1` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

INSERT INTO `avis` (`id`, `titre`, `description`, `created_at`, `actif`, `users_id`) VALUES
(3,	'gaelle1',	'alban est  le  meilleure  codeur énorme',	'2021-04-27 09:50:25',	1,	7),
(7,	'gaelle2',	'Gaelle  c\'est ma maman adorer.❤❤❤❤❤????????????????',	'2021-04-28 00:24:04',	1,	7),
(8,	'test1',	'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	'2021-04-28 00:32:51',	1,	10),
(9,	'test2',	'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	'2021-04-28 00:33:37',	1,	10),
(10,	'bidule',	'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	'2021-04-28 00:34:12',	0,	8),
(11,	'bidule1',	'What is Lorem Ipsum?\r\nLorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',	'2021-04-28 00:34:26',	1,	8);

CREATE TABLE `cv` (
                      `id` int(11) NOT NULL AUTO_INCREMENT,
                      `titre` varchar(255) NOT NULL,
                      `ecole` varchar(250) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
                      `nom_entreprise` varchar(255) NOT NULL,
                      `lien` varchar(250) DEFAULT NULL,
                      `description` varchar(255) NOT NULL,
                      `annee` year(4) NOT NULL,
                      `duree` int(11) NOT NULL,
                      `actif` tinyint(1) NOT NULL,
                      PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `cv` (`id`, `titre`, `ecole`, `nom_entreprise`, `lien`, `description`, `annee`, `duree`, `actif`) VALUES
(2,	'Développeuse Intégratrice Web',	NULL,	'Seeweb',	'https://www.seeweb.fr/',	'Durant ce stage j\'ai utlisé les language et outils suivant :   Php , mySQL,',	'2020',	2,	1),
(3,	'Développeuse Intégratrice Web',	NULL,	'Iole Solution',	'https://www.iole.fr/',	'Durant ce stage j\'ai utlisé les language et outils suivant :   Php(POO) , postgrSQL, Javascript(POO), ',	'2020',	2,	1),
(4,	'Développeuse Intégratrice  En Réalisation d\'application Web',	'Greta Bretagne Sud',	'',	'https://www.grandeecolenumerique.fr/formations/apgen_069-greta-bretagne-sud-kercode',	'Formation KERCODE , language et outils appris : Javascript, Jquery, bootstrap, Wordpress, php, Laravel, MySQL, photoshop, Css, Html',	'2019',	7,	1),
(5,	'Concepteur Développeur  D\'application Web',	'3W Academy',	'',	NULL,	'Durant cette periode j\'ai appris reactJs, je n\'ai paspu terminer la formation faute d\'avoir trouvre un contrat d\'apprentissage dans les temps donné mais cela ma permis d\'apprendre react',	'2020',	6,	1);

CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `nom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                         `prenom` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
                         `roles` json DEFAULT NULL,
                         `actif` tinyint(1) NOT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2021-06-27 16:30:47