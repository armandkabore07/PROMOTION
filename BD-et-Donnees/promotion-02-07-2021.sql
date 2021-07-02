-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1:3306
-- Généré le : ven. 02 juil. 2021 à 14:03
-- Version du serveur :  5.7.31
-- Version de PHP : 7.3.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `promotion`
--

-- --------------------------------------------------------

--
-- Structure de la table `adhesions`
--

DROP TABLE IF EXISTS `adhesions`;
CREATE TABLE IF NOT EXISTS `adhesions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `montantAdhesion` int(11) NOT NULL,
  `dateAdhesion` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `adhesions_userid_foreign` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `adhesions`
--

INSERT INTO `adhesions` (`id`, `userId`, `montantAdhesion`, `dateAdhesion`, `created_at`, `updated_at`) VALUES
(1, 1, 1000, '2021-05-25', '2021-05-25 18:39:10', '2021-05-25 18:39:10'),
(2, 2, 1000, '2021-05-26', '2021-05-26 13:16:57', '2021-05-26 13:16:57'),
(3, 3, 1000, '2021-05-26', '2021-05-26 13:35:27', '2021-05-26 13:35:27'),
(4, 4, 1000, '2021-05-26', '2021-05-26 13:39:32', '2021-05-26 13:39:32'),
(5, 5, 1000, '2021-05-26', '2021-05-26 13:40:55', '2021-05-26 13:40:55'),
(6, 6, 1000, '2021-05-26', '2021-05-26 13:44:26', '2021-05-26 13:44:26'),
(7, 7, 1000, '2021-05-31', '2021-05-31 14:20:55', '2021-05-31 14:20:55'),
(22, 22, 1000, '2021-06-22', '2021-06-22 14:55:52', '2021-06-22 14:55:52'),
(23, 23, 1000, '2021-06-29', '2021-06-29 10:53:00', '2021-06-29 10:53:00'),
(26, 26, 1000, '2021-07-01', '2021-07-01 16:57:22', '2021-07-01 16:57:22'),
(25, 25, 1000, '2021-07-01', '2021-07-01 16:51:03', '2021-07-01 16:51:03'),
(27, 27, 1000, '2021-07-01', '2021-07-01 19:54:40', '2021-07-01 19:54:40');

-- --------------------------------------------------------

--
-- Structure de la table `cotisations`
--

DROP TABLE IF EXISTS `cotisations`;
CREATE TABLE IF NOT EXISTS `cotisations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `userId` bigint(20) NOT NULL,
  `montantPayer` int(11) NOT NULL,
  `montantRestant` int(11) NOT NULL,
  `annee` year(4) NOT NULL,
  `dateCotisation` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `cotisations_userid_foreign` (`userId`)
) ENGINE=MyISAM AUTO_INCREMENT=51 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `cotisations`
--

INSERT INTO `cotisations` (`id`, `userId`, `montantPayer`, `montantRestant`, `annee`, `dateCotisation`, `created_at`, `updated_at`) VALUES
(1, 1, 6000, 0, 2021, '2021-05-25', '2021-05-25 18:39:10', '2021-05-25 18:39:10'),
(2, 2, 6000, 0, 2021, '2021-05-26', '2021-05-26 13:16:57', '2021-05-26 13:16:57'),
(3, 2, 6000, 0, 2022, '2021-05-30', '2021-05-26 13:16:57', '2021-05-30 20:19:47'),
(4, 3, 6000, 0, 2021, '2021-05-26', '2021-05-26 13:35:27', '2021-05-26 13:35:27'),
(5, 3, 3000, 3000, 2022, '2021-05-31', '2021-05-26 13:35:27', '2021-05-31 09:09:09'),
(6, 4, 6000, 0, 2021, '2021-05-26', '2021-05-26 13:39:32', '2021-05-26 13:39:32'),
(7, 4, 5000, 1000, 2022, '2021-05-26', '2021-05-26 13:39:32', '2021-05-26 13:39:32'),
(8, 5, 6000, 0, 2021, '2021-05-26', '2021-05-26 13:40:55', '2021-05-26 13:40:55'),
(9, 5, 6000, 0, 2022, '2021-05-26', '2021-05-26 13:40:55', '2021-05-26 13:40:55'),
(10, 5, 6000, 0, 2023, '2021-05-26', '2021-05-26 13:40:55', '2021-05-26 13:40:55'),
(11, 5, 6000, 0, 2024, '2021-05-31', '2021-05-26 13:40:55', '2021-05-31 14:29:37'),
(12, 6, 6000, 0, 2021, '2021-05-26', '2021-05-26 13:44:26', '2021-05-26 13:44:26'),
(13, 2, 6000, 0, 2023, '2021-05-30', '2021-05-30 20:19:47', '2021-05-30 20:20:17'),
(14, 2, 6000, 0, 2024, '2021-05-30', '2021-05-30 20:20:48', '2021-05-30 20:20:48'),
(15, 2, 6000, 0, 2025, '2021-05-30', '2021-05-30 20:20:48', '2021-05-30 20:20:48'),
(16, 2, 5000, 1000, 2026, '2021-05-30', '2021-05-30 20:21:31', '2021-05-30 20:27:52'),
(17, 7, 6000, 0, 2021, '2021-05-31', '2021-05-31 14:20:55', '2021-05-31 14:23:47'),
(18, 7, 1000, 5000, 2022, '2021-05-31', '2021-05-31 14:23:47', '2021-05-31 14:23:47'),
(19, 5, 6000, 0, 2025, '2021-05-31', '2021-05-31 14:29:37', '2021-05-31 14:29:37'),
(20, 5, 4995, 1005, 2026, '2021-07-02', '2021-05-31 14:29:37', '2021-07-02 13:48:00'),
(21, 1, 6000, 0, 2022, '2021-05-31', '2021-05-31 14:30:39', '2021-05-31 14:30:39'),
(22, 1, 6000, 0, 2023, '2021-05-31', '2021-05-31 14:30:39', '2021-05-31 14:30:39'),
(23, 1, 6000, 0, 2024, '2021-05-31', '2021-05-31 14:30:39', '2021-05-31 14:30:39'),
(24, 1, 6000, 0, 2025, '2021-05-31', '2021-05-31 14:31:15', '2021-05-31 14:31:15'),
(25, 1, 2000, 4000, 2026, '2021-05-31', '2021-05-31 14:31:15', '2021-05-31 14:31:15'),
(44, 23, 6000, 0, 2021, '2021-06-29', '2021-06-29 10:53:00', '2021-06-29 10:53:00'),
(43, 22, 5000, 1000, 2022, '2021-06-22', '2021-06-22 14:55:52', '2021-06-22 14:55:52'),
(42, 22, 6000, 0, 2021, '2021-06-22', '2021-06-22 14:55:52', '2021-06-22 14:55:52'),
(45, 23, 6000, 0, 2022, '2021-06-29', '2021-06-29 10:53:00', '2021-06-29 10:53:00'),
(46, 23, 6000, 0, 2023, '2021-06-29', '2021-06-29 10:53:00', '2021-06-29 10:53:00'),
(47, 23, 6000, 0, 2024, '2021-06-29', '2021-06-29 10:53:00', '2021-06-29 10:53:00'),
(48, 25, 1000, 5000, 2021, '2021-07-01', '2021-07-01 16:51:03', '2021-07-01 16:51:03'),
(49, 26, 1000, 5000, 2021, '2021-07-01', '2021-07-01 16:57:22', '2021-07-01 16:57:22'),
(50, 27, 1000, 5000, 2021, '2021-07-02', '2021-07-01 19:54:40', '2021-07-02 13:54:28');

-- --------------------------------------------------------

--
-- Structure de la table `failed_jobs`
--

DROP TABLE IF EXISTS `failed_jobs`;
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `informations`
--

DROP TABLE IF EXISTS `informations`;
CREATE TABLE IF NOT EXISTS `informations` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` mediumtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `montant_depense` int(11) NOT NULL DEFAULT '0',
  `type_id` bigint(20) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `informations_type_id_foreign` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `informations`
--

INSERT INTO `informations` (`id`, `title`, `body`, `montant_depense`, `type_id`, `created_at`, `updated_at`) VALUES
(1, 'Mariage de M.ZOUNGRAN', 'Bonjour à tous M.ZOUNGRAN a l\'honneur de vous informer de son mariage le mercredi 10juillet 2021 à Ouaga 2000.', 30000, 2, '2021-06-30 14:35:10', '2021-06-30 22:51:41'),
(2, 'Mariage de M.KABORE', 'Bonjour à tous M.KABORE a l\'honneur de vous informer de son mariage le mercredi 10juillet 2021 à Ouaga 2000.', 10000, 2, '2021-06-30 15:51:28', '2021-06-30 15:51:28'),
(3, 'Visite de courtoisie', 'Dynamic properties are \"lazy loading\", meaning they will only load their relationship data when you actually access them. Because of this, developers often use eager loading to pre-load relationships they know will be accessed after loading the model. Eager loading provides a significant reduction in SQL queries that must be executed to load a model\'s relations.', 0, 1, '2021-06-30 15:54:48', '2021-06-30 15:54:48'),
(7, 'Match de foot', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic.', 0, 1, '2021-07-01 00:04:27', '2021-07-01 00:04:27'),
(8, 'Match de foot', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic', 10000, 3, '2021-07-01 00:05:21', '2021-07-01 00:05:21'),
(9, 'Lorem Ipsum', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic', 0, 1, '2021-07-01 17:18:38', '2021-07-01 17:18:38'),
(6, 'Visite de courtoisie', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here', 0, 1, '2021-06-30 16:16:36', '2021-06-30 16:16:36'),
(10, 'Lorem Ipsum2', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic', 10000, 2, '2021-07-01 17:19:57', '2021-07-01 17:19:57'),
(11, 'Lorem Ipsum3', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic', 1000, 2, '2021-07-02 11:36:13', '2021-07-02 11:36:58'),
(12, 'Lorem Ipsum2', 'Lorem Ipsum2', 0, 1, '2021-07-02 11:38:10', '2021-07-02 11:38:10');

-- --------------------------------------------------------

--
-- Structure de la table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=48 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(38, '2014_10_12_000000_create_users_table', 1),
(39, '2014_10_12_100000_create_password_resets_table', 1),
(40, '2019_08_19_000000_create_failed_jobs_table', 1),
(41, '2021_05_12_171737_create_information_table', 1),
(42, '2021_05_18_153035_create_adhesions_table', 1),
(43, '2021_05_18_153322_create_cotisations_table', 1),
(44, '2021_05_18_171040_create_parametres_table', 1),
(45, '2021_06_06_190514_create_permission_tables', 2),
(46, '2021_06_30_101148_create_types_table', 3),
(47, '2021_06_30_095135_create_informations_table', 4);

-- --------------------------------------------------------

--
-- Structure de la table `model_has_permissions`
--

DROP TABLE IF EXISTS `model_has_permissions`;
CREATE TABLE IF NOT EXISTS `model_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`model_id`,`model_type`),
  KEY `model_has_permissions_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `model_has_roles`
--

DROP TABLE IF EXISTS `model_has_roles`;
CREATE TABLE IF NOT EXISTS `model_has_roles` (
  `role_id` bigint(20) UNSIGNED NOT NULL,
  `model_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `model_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`role_id`,`model_id`,`model_type`),
  KEY `model_has_roles_model_id_model_type_index` (`model_id`,`model_type`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `model_has_roles`
--

INSERT INTO `model_has_roles` (`role_id`, `model_type`, `model_id`) VALUES
(1, 'App\\Models\\User', 2),
(1, 'App\\Models\\User', 3),
(1, 'App\\Models\\User', 4),
(1, 'App\\Models\\User', 5),
(1, 'App\\Models\\User', 6),
(1, 'App\\Models\\User', 7),
(1, 'App\\Models\\User', 23),
(1, 'App\\Models\\User', 25),
(1, 'App\\Models\\User', 26),
(1, 'App\\Models\\User', 27),
(2, 'App\\Models\\User', 1),
(2, 'App\\Models\\User', 22);

-- --------------------------------------------------------

--
-- Structure de la table `parametres`
--

DROP TABLE IF EXISTS `parametres`;
CREATE TABLE IF NOT EXISTS `parametres` (
  `id` int(11) NOT NULL,
  `montantAdhesion` int(11) NOT NULL,
  `montantCotisation` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `parametres`
--

INSERT INTO `parametres` (`id`, `montantAdhesion`, `montantCotisation`, `created_at`, `updated_at`) VALUES
(1, 1000, 6000, '2021-05-25 18:29:33', '2021-05-31 16:59:08');

-- --------------------------------------------------------

--
-- Structure de la table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `permissions`
--

DROP TABLE IF EXISTS `permissions`;
CREATE TABLE IF NOT EXISTS `permissions` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `permissions_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guard_name` varchar(125) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_name_guard_name_unique` (`name`,`guard_name`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `roles`
--

INSERT INTO `roles` (`id`, `name`, `guard_name`, `created_at`, `updated_at`) VALUES
(1, 'user', 'web', '2021-06-07 14:57:36', '2021-06-07 14:57:36'),
(2, 'admin', 'web', '2021-06-07 14:57:45', '2021-06-07 14:57:45');

-- --------------------------------------------------------

--
-- Structure de la table `role_has_permissions`
--

DROP TABLE IF EXISTS `role_has_permissions`;
CREATE TABLE IF NOT EXISTS `role_has_permissions` (
  `permission_id` bigint(20) UNSIGNED NOT NULL,
  `role_id` bigint(20) UNSIGNED NOT NULL,
  PRIMARY KEY (`permission_id`,`role_id`),
  KEY `role_has_permissions_role_id_foreign` (`role_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Structure de la table `types`
--

DROP TABLE IF EXISTS `types`;
CREATE TABLE IF NOT EXISTS `types` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `libelle` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `types_libelle_unique` (`libelle`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `types`
--

INSERT INTO `types` (`id`, `libelle`, `created_at`, `updated_at`) VALUES
(1, 'Information', '2021-06-30 12:11:49', '2021-06-30 12:11:56'),
(2, 'Evenement', '2021-06-30 12:12:42', '2021-06-30 12:12:42'),
(3, 'Activite', '2021-06-30 12:13:29', '2021-06-30 12:13:29');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `telephone` int(11) NOT NULL,
  `matricule` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `prenom` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `service` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `premiereConnexion` tinyint(1) NOT NULL DEFAULT '1',
  `soldeInitial` int(11) NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=28 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `telephone`, `matricule`, `nom`, `prenom`, `service`, `email`, `email_verified_at`, `password`, `premiereConnexion`, `soldeInitial`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 63249692, '371569H', 'KABORE', 'ARMAND', 'SERVICE ETUDE ET DEVELOPPEMENT', 'armandkabore07@gmail.com', NULL, '$2y$10$xu1I.yFLYwdRoEMlMunGOeGLWEfkS8FOPsR/0dkW64e0m3bk/zeJm', 1, 7000, NULL, '2021-05-25 18:39:10', '2021-06-24 10:59:07'),
(2, 74545215, '452154L', 'OUEDRAOGO', 'DONATIEN', 'SERVICE ETUDE ET DEVELOPPEMENT', 'danatien@gmail.com', NULL, '$2y$10$spzFCaIFrTv5jOUD6clfSubKLtkdBMkQsq1gyiGJ74SAJImEtIlzG', 1, 8000, NULL, '2021-05-26 13:16:57', '2021-05-26 13:16:57'),
(3, 52487569, '381569Z', 'OUEDRAOGO', 'LEITICIA', 'SERVICE ETUDE ET DEVELOPPEMENT', 'leiticia@gmail.com', NULL, '$2y$10$cm8Q1GQsw6T94z9NDTQsB.MNSntp7nq.57IhuXr1iQBbo/2KrZgVa', 1, 8000, NULL, '2021-05-26 13:35:27', '2021-06-28 11:12:13'),
(4, 52695487, '456214N', 'SAWADOGO', 'ROLAND', 'SERVICE ETUDE ET DEVELOPPEMENT', 'roland@gmail.com', NULL, '$2y$10$VQsyFBRTEAnNwNDleVA8y.jLDVqtAS1XqADB8tLfDoXg6CutwGmFK', 1, 12000, NULL, '2021-05-26 13:39:32', '2021-05-26 13:39:32'),
(5, 58475847, '854756G', 'TRAORE', 'ELVIS', 'ETUDE ET DEVELOPPEMENT', 'elvis@gmail.com', NULL, '$2y$10$5fFiQQmMQ6N9im3RsxFUw.zvJoNGwvi6AdLXvad6t8b0atrruq.US', 1, 20000, NULL, '2021-05-26 13:40:55', '2021-07-02 13:14:10'),
(6, 72475847, '258964D', 'TRAORE', 'SANDRINE', 'ETUDE ET DEVELOPPEMENT', 'sandrine@gmail.com', NULL, '$2y$10$RSQPeLC.5p/FRbd.3AqXjeO8fI/Typtmyi1JBVAT7ET5FZlLEa1Pe', 1, 7000, NULL, '2021-05-26 13:44:26', '2021-07-02 13:14:00'),
(7, 76658654, '452174I', 'TAPSOBA', 'RAMZY', 'ETUDE ET DEVELOPPEMENT', 'ramzy@gmail.com', NULL, '$2y$10$lNFF6aO2HVIxG11YRoU5meu4WgvwxhNW4XPQu8xO.b/4aLA09H8rm', 1, 2000, NULL, '2021-05-31 14:20:55', '2021-07-02 13:13:43'),
(22, 55301586, '370254J', 'KABORE', 'JOSAPHAT', 'ETUDE ET DEVELOPPEMENT', 'kaborerelwindejosaphatarmand@gmail.com', NULL, '$2y$10$5YMvRdwNmTS9nN.tAK/Cc.jQ17D6O5YWcGXn9ezDpOQzfNBcPYR1e', 1, 12000, NULL, '2021-06-22 14:55:52', '2021-07-02 13:13:29'),
(23, 65854582, '458876J', 'KABORE', 'FRANK', 'ETUDE ET DEVELOPPEMENT', 'kaborefrankalain402@gmail.com', NULL, '$2y$10$afTe6xV5PirwT6mtbS/MTuBUpTg.2vZfgMKZcwQipiKrmUSH5VIym', 1, 25000, NULL, '2021-06-29 10:53:00', '2021-07-02 13:13:20'),
(26, 78589868, '371579N', 'TRAORE', 'FABRICE', 'ETUDE ET DEVELOPPEMENT', 'fab@gmail.com', NULL, '$2y$10$5em8P.8n6mSW6au0u0SESO48tS5SSbXHQ/UBTo00qoLA7AigBpzx6', 1, 2000, NULL, '2021-07-01 16:57:22', '2021-07-02 13:13:01'),
(25, 75754858, '75445M', 'SAWADOGO', 'ALI', 'DSI', 'ali@gmail.com', NULL, '$2y$10$rxNlmD3GSE/BxDID93GC.eDMg8j5/dlSCdW6YgnhIuWZq7E4j9IgG', 1, 2000, NULL, '2021-07-01 16:51:03', '2021-07-02 13:17:21'),
(27, 78548742, '784568G', 'NANEMA', 'JALISSA', 'ETUDE ET DEVELOPPEMENT', 'jalissa@gmail.com', NULL, '$2y$10$1tGHT4FPHrxqkIl81NmAHumoeT0NiyJObVEN/NkVGpDEI0K/3wcOS', 1, 1000, NULL, '2021-07-01 19:54:40', '2021-07-02 13:12:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
