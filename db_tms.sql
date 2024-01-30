-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               8.0.30 - MySQL Community Server - GPL
-- Server OS:                    Win64
-- HeidiSQL Version:             12.1.0.6537
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for db_testmanagement
CREATE DATABASE IF NOT EXISTS `db_testmanagement` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci */ /*!80016 DEFAULT ENCRYPTION='N' */;
USE `db_testmanagement`;

-- Dumping structure for table db_testmanagement.failed_jobs
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

-- Dumping data for table db_testmanagement.failed_jobs: ~0 rows (approximately)

-- Dumping structure for table db_testmanagement.members
CREATE TABLE IF NOT EXISTS `members` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `user_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telephone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` int unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=111 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.members: ~22 rows (approximately)
INSERT IGNORE INTO `members` (`id`, `user_name`, `unit`, `telephone`, `project_id`, `created_at`, `updated_at`) VALUES
	(89, 'May Newton', 'Et placeat a omnis ', '4', 125, '2023-12-21 18:57:43', '2023-12-21 18:57:43'),
	(90, 'May Newton', 'Et placeat a omnis ', '4', 126, '2023-12-21 18:58:08', '2023-12-21 18:58:08'),
	(91, 'May Newton', 'Et placeat a omnis ', '4', 127, '2023-12-21 18:58:27', '2023-12-21 18:58:27'),
	(92, 'May Newton', 'Et placeat a omnis ', '4', 128, '2023-12-21 18:59:06', '2023-12-21 18:59:06'),
	(93, 'Athena Strong', 'Excepteur quis qui s', '80', 129, '2023-12-21 19:07:08', '2023-12-21 19:07:08'),
	(94, 'Stone Rocha', 'Ex ipsum ipsum hic', '22', 130, '2023-12-21 19:19:09', '2023-12-21 19:19:09'),
	(95, 'Stone Rocha', 'Ex ipsum ipsum hic', '22', 131, '2023-12-21 19:22:58', '2023-12-21 19:22:58'),
	(96, 'Stone Rocha', 'Ex ipsum ipsum hic', '22', 132, '2023-12-21 19:23:31', '2023-12-21 19:23:31'),
	(97, 'Stone Rocha', 'Ex ipsum ipsum hic', '22', 133, '2023-12-21 19:24:35', '2023-12-21 19:24:35'),
	(98, 'Stone Rocha', 'Ex ipsum ipsum hic', '22', 134, '2023-12-21 19:25:00', '2023-12-21 19:25:00'),
	(99, 'Stone Rocha', 'Ex ipsum ipsum hic', '22', 135, '2023-12-21 19:25:26', '2023-12-21 19:25:26'),
	(100, 'Kieran Barron', 'Est magnam do dolore', '52', 136, '2023-12-27 01:50:18', '2023-12-27 01:50:18'),
	(101, 'Kieran Barron', 'Est magnam do dolore', '52', 137, '2023-12-27 01:50:41', '2023-12-27 01:50:41'),
	(102, 'Zane Knapp', 'Aliqua Est quis ve', '26', 138, '2023-12-27 02:00:21', '2023-12-27 02:00:21'),
	(103, 'Carson Elliott', 'Accusantium voluptat', '15', 139, '2023-12-27 02:04:38', '2023-12-27 02:04:38'),
	(104, 'Destiny Pope', 'Quis dolore in sit ', '56', 139, '2023-12-27 02:04:38', '2023-12-27 02:04:38'),
	(105, 'Zia Simmons', 'Blanditiis quas amet', '52', 140, '2023-12-29 08:29:21', '2023-12-29 08:29:21'),
	(106, 'Cruz Cooper', 'Dolorem ullamco tene', '54', 141, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(107, 'Donna Langley', 'Unde aliquam nisi re', '59', 141, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(108, 'Lisandra Huffman', 'Dolor omnis ut fugia', '87', 142, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(109, 'Alan Weber', 'Libero provident im', '75', 143, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(110, 'Olivia Baker', 'Nemo doloremque et a', '55', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04');

-- Dumping structure for table db_testmanagement.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.migrations: ~13 rows (approximately)
INSERT IGNORE INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2023_12_10_012928_create_project_table', 1),
	(6, '2023_12_11_065242_create_roles_table', 2),
	(7, '2023_12_11_065401_create_roles_user', 2),
	(8, '2023_12_13_041918_create_members_table', 3),
	(9, '2023_12_14_073441_create_test_levels_table', 4),
	(10, '2023_12_15_084814_create_sessions_table', 5),
	(11, '2023_12_19_075034_create_scenarios_table', 6),
	(12, '2023_12_20_040804_create_test_cases_table', 7),
	(13, '2023_12_20_083011_create_test_steps_table', 8);

-- Dumping structure for table db_testmanagement.password_reset_tokens
CREATE TABLE IF NOT EXISTS `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.password_reset_tokens: ~0 rows (approximately)

-- Dumping structure for table db_testmanagement.personal_access_tokens
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

-- Dumping data for table db_testmanagement.personal_access_tokens: ~0 rows (approximately)

-- Dumping structure for table db_testmanagement.project
CREATE TABLE IF NOT EXISTS `project` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `jira_code` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_level` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_type` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `desc` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `scope` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `issue` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `credentials` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `sat_process` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `retesting` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `tmp` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `updated_uat` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uat_attendance` varchar(50) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `uat_result` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `other` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `env` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL,
  `members` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci,
  `status` enum('Generated','Not Generated') COLLATE utf8mb4_unicode_ci DEFAULT 'Not Generated',
  `remarks` longtext COLLATE utf8mb4_unicode_ci,
  PRIMARY KEY (`id`),
  KEY `project_user_id_foreign` (`user_id`),
  CONSTRAINT `project_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=145 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.project: ~6 rows (approximately)
INSERT IGNORE INTO `project` (`id`, `name`, `jira_code`, `test_level`, `test_type`, `start_date`, `end_date`, `desc`, `scope`, `issue`, `credentials`, `sat_process`, `retesting`, `tmp`, `updated_uat`, `uat_attendance`, `uat_result`, `other`, `env`, `user_id`, `created_at`, `updated_at`, `members`, `status`, `remarks`) VALUES
	(139, 'Colt Merrill', 'Elit facere repelle', 'SIT', 'Itaque et deserunt c', '1988-11-03', '2012-08-09', 'Porro vel ad ea volu', 'Velit quia in nostr', 'Est eum aspernatur ', 'Suscipit ex libero v', 'Quae pariatur Quia ', 'Velit ea sed sint m', 'Available', 'Available', 'Available', 'Available', 'Available', 'Do illo aut esse re', 2, '2023-12-27 02:04:38', '2023-12-27 02:04:38', NULL, 'Not Generated', NULL),
	(140, 'Kathleen Baldwin', 'Cupiditate dolor vol', 'UAT', 'Laboris amet rerum ', '1970-08-19', '1976-04-11', 'Vitae soluta adipisc', 'Ipsa deleniti nisi ', 'Impedit aspernatur ', 'Omnis nesciunt minu', 'Voluptas dolorem fug', 'Excepteur fuga Ut v', 'Available', 'Not Available', 'Available', 'Available', 'Available', 'Voluptatem mollit m', 2, '2023-12-29 08:29:21', '2023-12-29 08:29:21', NULL, 'Not Generated', NULL),
	(141, 'Heidi Case', 'Et labore necessitat', 'SIT', 'Recusandae Autem il', '2014-12-19', '2016-04-13', 'Nesciunt qui sint ', 'Pariatur Voluptatem', 'Officia nesciunt in', 'Vitae Nam modi nisi ', 'Ea laboriosam conse', 'Minus ut et ut et au', 'Not Available', 'Available', 'Available', 'Available', 'Available', 'Illo consectetur ita', 2, '2023-12-29 08:31:06', '2023-12-29 08:31:06', NULL, 'Not Generated', NULL),
	(142, 'Mari Sherman', 'Quam quia voluptatib', 'SIT', 'Quis itaque fugiat e', '1973-11-26', '1988-02-27', 'Laborum Quia sint d', 'Voluptatum ex eu sus', 'Ut dolor qui volupta', 'Eaque ipsum earum c', 'Delectus libero ess', 'Eum error animi err', 'Available', 'Not Available', 'Available', 'Not Available', 'Available', 'Sunt repellendus A', 2, '2024-01-02 08:19:48', '2024-01-02 08:19:48', NULL, 'Not Generated', NULL),
	(143, 'Karleigh Cross', 'Non ea in qui ad eu ', '', 'Laudantium neque ut', '2024-03-21', '2022-11-11', 'Expedita temporibus ', 'Consequat Ad nostru', 'Lorem lorem inventor', 'Soluta voluptas vel ', 'Aut rem repudiandae ', 'Facere dolor sit qu', 'Available', 'Not Available', 'Available', 'Not Available', 'Not Available', 'Tempore fugiat vol', 2, '2024-01-02 09:58:04', '2024-01-02 09:58:04', NULL, 'Not Generated', NULL),
	(144, 'Sopoline Hewitt', 'Unde quis ullamco ve', 'UAT', 'Ut cupidatat reprehe', '2005-04-13', '2008-11-27', 'Voluptas et nobis no', 'Rem tempore rerum v', 'Vitae sed aliquam ma', 'Doloribus reiciendis', 'Minima maxime sit v', 'Nihil minim id offic', 'Available', 'Not Available', 'Available', 'Available', 'Available', 'Nihil exercitation r', 2, '2024-01-03 07:45:04', '2024-01-03 07:45:04', NULL, 'Not Generated', NULL);

-- Dumping structure for table db_testmanagement.roles
CREATE TABLE IF NOT EXISTS `roles` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.roles: ~2 rows (approximately)
INSERT IGNORE INTO `roles` (`id`, `name`, `created_at`, `updated_at`) VALUES
	(1, 'ADMIN', '2023-12-11 01:05:46', '2023-12-11 01:05:46'),
	(2, 'USER', '2023-12-11 01:08:51', '2023-12-11 01:08:51');

-- Dumping structure for table db_testmanagement.roles_user
CREATE TABLE IF NOT EXISTS `roles_user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint unsigned NOT NULL,
  `role_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.roles_user: ~2 rows (approximately)
INSERT IGNORE INTO `roles_user` (`id`, `user_id`, `role_id`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, '2023-12-11 08:09:19', '2023-12-11 08:09:20'),
	(2, 2, 2, '2023-12-12 03:47:04', '2023-12-12 03:47:05');

-- Dumping structure for table db_testmanagement.scenarios
CREATE TABLE IF NOT EXISTS `scenarios` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `scenario_name` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `project_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.scenarios: ~16 rows (approximately)
INSERT IGNORE INTO `scenarios` (`id`, `scenario_name`, `project_id`, `created_at`, `updated_at`) VALUES
	(17, 'scene1', 139, '2023-12-27 02:04:38', '2023-12-27 02:04:38'),
	(18, 'scene2', 139, '2023-12-29 04:27:37', '2023-12-29 04:27:39'),
	(19, 'Et voluptatibus pari', 140, '2023-12-29 08:29:21', '2023-12-29 08:29:21'),
	(20, 'Vitae eiusmod aut fu', 141, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(21, 'Hic id velit except', 141, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(22, 'Et repellendus Reru', 142, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(23, 'Quam laborum Volupt', 142, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(24, 'Sint exercitationem ', 143, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(25, 'Tempora voluptate au', 143, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(26, 'Ut tempore tenetur ', 143, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(27, 'Similique et eos te', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(28, 'Est corrupti sed es', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(29, 'Non consequatur Con', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(30, 'Consequatur Volupta', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(31, 'Sit voluptatem Eos ', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(32, 'Sit beatae et duis a', 144, '2024-01-03 07:45:04', '2024-01-03 07:45:04');

-- Dumping structure for table db_testmanagement.sessions
CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint unsigned DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.sessions: ~0 rows (approximately)

-- Dumping structure for table db_testmanagement.test_cases
CREATE TABLE IF NOT EXISTS `test_cases` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `case` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.test_cases: ~16 rows (approximately)
INSERT IGNORE INTO `test_cases` (`id`, `case`, `test_id`, `created_at`, `updated_at`) VALUES
	(16, 'case 1 scene 1', 17, '2023-12-27 02:04:38', '2023-12-27 02:04:38'),
	(18, 'case 2 scene 1', 17, '2023-12-28 08:10:44', '2023-12-28 08:10:44'),
	(19, 'Vitae dolor anim tem', 19, '2023-12-29 08:29:21', '2023-12-29 08:29:21'),
	(20, 'Ad ex ipsam autem re', 20, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(21, 'Ad ex ipsam autem re', 21, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(22, 'Aliquid sit modi tem', 22, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(23, 'Aliquid sit modi tem', 23, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(24, 'Atque autem mollitia', 24, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(25, 'Atque autem mollitia', 25, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(26, 'Atque autem mollitia', 26, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(27, 'Laudantium ex nostr', 27, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(28, 'Laudantium ex nostr', 28, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(29, 'Laudantium ex nostr', 29, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(30, 'Laudantium ex nostr', 30, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(31, 'Laudantium ex nostr', 31, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(32, 'Laudantium ex nostr', 32, '2024-01-03 07:45:04', '2024-01-03 07:45:04');

-- Dumping structure for table db_testmanagement.test_levels
CREATE TABLE IF NOT EXISTS `test_levels` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.test_levels: ~2 rows (approximately)
INSERT IGNORE INTO `test_levels` (`id`, `type`, `created_at`, `updated_at`) VALUES
	(1, 'UAT', '2023-12-14 00:45:39', '2023-12-14 00:45:39'),
	(2, 'SIT', '2023-12-14 09:41:26', '2023-12-14 09:41:28');

-- Dumping structure for table db_testmanagement.test_steps
CREATE TABLE IF NOT EXISTS `test_steps` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `test_step_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_step` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `expected_result` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `severity` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `case_id` bigint unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=31 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.test_steps: ~23 rows (approximately)
INSERT IGNORE INTO `test_steps` (`id`, `test_step_id`, `test_step`, `expected_result`, `category`, `severity`, `status`, `case_id`, `created_at`, `updated_at`) VALUES
	(8, '1A', 'Dolores cupidatat cu', 'Modi laborum Provid', 'positive', 'medium', 'passed', 16, '2023-12-27 02:04:38', '2023-12-27 02:04:38'),
	(9, '1B', 'test', 'dasdsa', 'positive', 'medium', 'passed', 16, '2023-12-28 01:08:55', '2023-12-28 01:08:55'),
	(10, '1C', 'test', 'asdsa', 'positive', 'medium', 'passed', 18, '2023-12-28 07:59:00', '2023-12-28 07:59:00'),
	(11, 'Qui asperiores volup', 'Voluptatem Magni al', 'Occaecat in non Nam ', 'negative', 'medium', 'failed', 16, '2023-12-29 08:29:21', '2023-12-29 08:29:21'),
	(12, 'Dolores duis consequ', 'Laborum Esse quae ', 'Dolor laboriosam a ', 'negative', 'low', 'passed', 16, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(13, 'Dolores duis consequ', 'Laborum Esse quae ', 'Dolor laboriosam a ', 'negative', 'low', 'passed', 16, '2023-12-29 08:31:06', '2023-12-29 08:31:06'),
	(14, 'Irure non eaque comm', 'Magnam quia velit a', 'Natus non pariatur ', 'positive', 'medium', 'failed', 22, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(15, 'Irure non eaque comm', 'Magnam quia velit a', 'Natus non pariatur ', 'positive', 'medium', 'failed', 23, '2024-01-02 08:19:48', '2024-01-02 08:19:48'),
	(16, 'Nihil voluptatem ali', 'Consequat Repellend', 'Ut duis veniam culp', 'positive', 'low', 'failed', 24, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(17, 'Nihil voluptatem ali', 'Consequat Repellend', 'Ut duis veniam culp', 'positive', 'low', 'failed', 25, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(18, 'Nihil voluptatem ali', 'Consequat Repellend', 'Ut duis veniam culp', 'positive', 'low', 'failed', 26, '2024-01-02 09:58:04', '2024-01-02 09:58:04'),
	(19, 'Nisi id excepturi ad', 'Incididunt beatae iu', 'Est nulla et aut es', 'positive', 'high', 'passed', 27, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(20, 'Praesentium quis est', 'Commodi aute pariatu', 'Sed aliquip quis dol', 'negative', 'low', 'passed', 27, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(21, 'Nisi id excepturi ad', 'Incididunt beatae iu', 'Est nulla et aut es', 'positive', 'high', 'passed', 28, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(22, 'Praesentium quis est', 'Commodi aute pariatu', 'Sed aliquip quis dol', 'negative', 'low', 'passed', 28, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(23, 'Nisi id excepturi ad', 'Incididunt beatae iu', 'Est nulla et aut es', 'positive', 'high', 'passed', 29, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(24, 'Praesentium quis est', 'Commodi aute pariatu', 'Sed aliquip quis dol', 'negative', 'low', 'passed', 29, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(25, 'Nisi id excepturi ad', 'Incididunt beatae iu', 'Est nulla et aut es', 'positive', 'high', 'passed', 30, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(26, 'Praesentium quis est', 'Commodi aute pariatu', 'Sed aliquip quis dol', 'negative', 'low', 'passed', 30, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(27, 'Nisi id excepturi ad', 'Incididunt beatae iu', 'Est nulla et aut es', 'positive', 'high', 'passed', 31, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(28, 'Praesentium quis est', 'Commodi aute pariatu', 'Sed aliquip quis dol', 'negative', 'low', 'passed', 31, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(29, 'Nisi id excepturi ad', 'Incididunt beatae iu', 'Est nulla et aut es', 'positive', 'high', 'passed', 32, '2024-01-03 07:45:04', '2024-01-03 07:45:04'),
	(30, 'Praesentium quis est', 'Commodi aute pariatu', 'Sed aliquip quis dol', 'negative', 'low', 'passed', 32, '2024-01-03 07:45:04', '2024-01-03 07:45:04');

-- Dumping structure for table db_testmanagement.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `unit` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `department` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_username_unique` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table db_testmanagement.users: ~2 rows (approximately)
INSERT IGNORE INTO `users` (`id`, `name`, `unit`, `department`, `username`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'Ilham Maulana Abdurrahman', 'ASP', 'IT WHA', 'ven.ilham', '$2y$12$YBeu.BGQzROiRBzhzjg5me4U0TTPAbY8h3lx2Xo.dGC6vyDyz4FTq', 'VGlJs50DV3AZQHyFKmu5DDB6WBJi52aq0IDZtVSAgFve2otI3Iibx8MkQkEo', '2023-12-10 19:29:38', '2023-12-10 19:29:38'),
	(2, 'Arif Hartato', 'ASP', 'IT WHA', 'arif.hartato', '$2y$12$Nfc4Bkrf9T2eH3zPYh5bwOYBcFURDiDq4X5nxCNgl0K952lRhq9tm', 'g2CjC3TVB3PJ4jjltkDgcscW7LpHfxGQ2ehn3u0H0oDrfTGDLlGBGq1LggIi', '2023-12-10 19:30:35', '2023-12-10 19:30:35');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
usersprojectproject