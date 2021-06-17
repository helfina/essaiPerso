-- Adminer 4.7.8 MySQL dump

SET NAMES utf8;
SET time_zone = '+00:00';
SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

SET NAMES utf8mb4;

CREATE TABLE `articles` (
                            `id` int(11) NOT NULL AUTO_INCREMENT,
                            `titre` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
                            `content` int(255) NOT NULL,
                            PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


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
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


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


CREATE TABLE `users` (
                         `id` int(11) NOT NULL AUTO_INCREMENT,
                         `email` varchar(255) NOT NULL,
                         `password` varchar(255) NOT NULL,
                         `roles` json DEFAULT NULL,
                         PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;


-- 2021-06-17 09:41:40

-- 17/06/21 -
ALTER TABLE `users`
    ADD `actif` tinyint(1) NOT NULL;