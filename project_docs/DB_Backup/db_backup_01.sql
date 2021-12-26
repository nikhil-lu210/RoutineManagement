-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for routine_management
CREATE DATABASE IF NOT EXISTS `routine_management` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `routine_management`;

-- Dumping structure for table routine_management.class_routines
CREATE TABLE IF NOT EXISTS `class_routines` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `day_id` bigint(20) unsigned NOT NULL,
  `period_id` bigint(20) unsigned NOT NULL,
  `routine_group_id` bigint(20) unsigned NOT NULL,
  `routine_group_teacher_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `day_period_routine_group_unique` (`day_id`,`period_id`,`routine_group_id`),
  UNIQUE KEY `day_period_routine_group_routine_group_teacher_unique` (`day_id`,`period_id`,`routine_group_id`,`routine_group_teacher_id`),
  KEY `class_routines_period_id_foreign` (`period_id`),
  KEY `class_routines_routine_group_id_foreign` (`routine_group_id`),
  KEY `class_routines_routine_group_teacher_id_foreign` (`routine_group_teacher_id`),
  CONSTRAINT `class_routines_day_id_foreign` FOREIGN KEY (`day_id`) REFERENCES `days` (`id`),
  CONSTRAINT `class_routines_period_id_foreign` FOREIGN KEY (`period_id`) REFERENCES `periods` (`id`),
  CONSTRAINT `class_routines_routine_group_id_foreign` FOREIGN KEY (`routine_group_id`) REFERENCES `routine_groups` (`id`),
  CONSTRAINT `class_routines_routine_group_teacher_id_foreign` FOREIGN KEY (`routine_group_teacher_id`) REFERENCES `routine_group_teachers` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.class_routines: ~0 rows (approximately)
/*!40000 ALTER TABLE `class_routines` DISABLE KEYS */;
INSERT INTO `class_routines` (`id`, `day_id`, `period_id`, `routine_group_id`, `routine_group_teacher_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, 1, 1, '2021-12-26 10:14:34', '2021-12-26 10:14:34', NULL),
	(2, 1, 2, 1, 2, '2021-12-26 10:17:02', '2021-12-26 10:17:02', NULL),
	(3, 1, 3, 1, 3, '2021-12-26 10:17:17', '2021-12-26 10:17:17', NULL),
	(4, 1, 4, 1, 4, '2021-12-26 10:17:27', '2021-12-26 10:17:27', NULL),
	(5, 1, 5, 1, 5, '2021-12-26 10:17:48', '2021-12-26 10:17:48', NULL),
	(6, 1, 1, 2, 8, '2021-12-26 10:19:38', '2021-12-26 10:19:38', NULL),
	(7, 1, 2, 2, 7, '2021-12-26 10:20:02', '2021-12-26 10:20:02', NULL),
	(8, 1, 3, 2, 10, '2021-12-26 10:20:48', '2021-12-26 10:20:48', NULL),
	(9, 1, 4, 2, 9, '2021-12-26 10:20:57', '2021-12-26 10:20:57', NULL),
	(10, 1, 5, 2, 12, '2021-12-26 10:21:08', '2021-12-26 10:21:08', NULL),
	(11, 2, 1, 1, 1, '2021-12-26 10:22:14', '2021-12-26 10:22:14', NULL),
	(12, 2, 2, 1, 3, '2021-12-26 10:22:34', '2021-12-26 10:22:34', NULL),
	(13, 2, 3, 1, 2, '2021-12-26 10:23:02', '2021-12-26 10:23:02', NULL),
	(14, 3, 1, 1, 1, '2021-12-26 10:23:52', '2021-12-26 10:23:52', NULL),
	(15, 2, 1, 2, 9, '2021-12-26 10:25:19', '2021-12-26 10:25:19', NULL),
	(16, 2, 2, 2, 8, '2021-12-26 10:25:38', '2021-12-26 10:25:38', NULL),
	(17, 2, 3, 2, 12, '2021-12-26 10:26:50', '2021-12-26 10:26:50', NULL),
	(18, 3, 2, 2, 11, '2021-12-26 10:27:05', '2021-12-26 10:27:05', NULL),
	(19, 4, 1, 2, 9, '2021-12-26 10:27:36', '2021-12-26 10:27:36', NULL),
	(20, 5, 1, 1, 1, '2021-12-26 10:28:04', '2021-12-26 10:28:04', NULL),
	(21, 6, 2, 2, 9, '2021-12-26 10:28:31', '2021-12-26 10:28:31', NULL);
/*!40000 ALTER TABLE `class_routines` ENABLE KEYS */;

-- Dumping structure for table routine_management.days
CREATE TABLE IF NOT EXISTS `days` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `holiday` tinyint(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.days: ~0 rows (approximately)
/*!40000 ALTER TABLE `days` DISABLE KEYS */;
INSERT INTO `days` (`id`, `name`, `holiday`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Saturday', 0, '2021-12-26 09:23:48', '2021-12-26 09:23:48', NULL),
	(2, 'Sunday', 0, '2021-12-26 09:23:54', '2021-12-26 09:23:54', NULL),
	(3, 'Monday', 0, '2021-12-26 09:23:59', '2021-12-26 09:23:59', NULL),
	(4, 'Tuesday', 0, '2021-12-26 09:24:13', '2021-12-26 09:24:13', NULL),
	(5, 'Wednesday', 0, '2021-12-26 09:24:19', '2021-12-26 09:24:19', NULL),
	(6, 'Thursday', 0, '2021-12-26 09:24:25', '2021-12-26 09:24:25', NULL),
	(7, 'Friday', 0, '2021-12-26 09:24:34', '2021-12-26 09:24:34', NULL);
/*!40000 ALTER TABLE `days` ENABLE KEYS */;

-- Dumping structure for table routine_management.failed_jobs
CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.failed_jobs: ~0 rows (approximately)
/*!40000 ALTER TABLE `failed_jobs` DISABLE KEYS */;
/*!40000 ALTER TABLE `failed_jobs` ENABLE KEYS */;

-- Dumping structure for table routine_management.migrations
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.migrations: ~17 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2019_08_19_000000_create_failed_jobs_table', 1),
	(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
	(5, '2021_09_26_093026_create_teachers_table', 1),
	(6, '2021_09_26_093040_create_students_table', 1),
	(7, '2021_09_26_105611_create_student_classes_table', 1),
	(8, '2021_09_26_105631_create_sections_table', 1),
	(9, '2021_09_26_105647_create_subjects_table', 1),
	(10, '2021_09_26_105700_create_days_table', 1),
	(11, '2021_09_26_105714_create_periods_table', 1),
	(12, '2021_09_26_105738_create_years_table', 1),
	(13, '2021_09_26_105806_create_routine_groups_table', 1),
	(14, '2021_09_26_105819_create_routine_group_students_table', 1),
	(15, '2021_09_26_105831_create_routine_group_teachers_table', 1),
	(16, '2021_09_26_105845_create_class_routines_table', 1),
	(17, '2021_09_28_033324_create_student_class_subjects_table', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping structure for table routine_management.password_resets
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping structure for table routine_management.periods
CREATE TABLE IF NOT EXISTS `periods` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `start` time NOT NULL,
  `end` time NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `periods_start_unique` (`start`),
  UNIQUE KEY `periods_end_unique` (`end`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.periods: ~0 rows (approximately)
/*!40000 ALTER TABLE `periods` DISABLE KEYS */;
INSERT INTO `periods` (`id`, `start`, `end`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, '10:00:00', '10:55:00', '2021-12-26 09:41:01', '2021-12-26 09:41:01', NULL),
	(2, '11:00:00', '11:55:00', '2021-12-26 09:41:35', '2021-12-26 09:41:35', NULL),
	(3, '12:00:00', '12:55:00', '2021-12-26 09:41:48', '2021-12-26 09:42:36', NULL),
	(4, '14:00:00', '14:55:00', '2021-12-26 09:42:26', '2021-12-26 09:42:26', NULL),
	(5, '15:00:00', '15:55:00', '2021-12-26 09:42:55', '2021-12-26 09:42:55', NULL);
/*!40000 ALTER TABLE `periods` ENABLE KEYS */;

-- Dumping structure for table routine_management.personal_access_tokens
CREATE TABLE IF NOT EXISTS `personal_access_tokens` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) unsigned NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.personal_access_tokens: ~0 rows (approximately)
/*!40000 ALTER TABLE `personal_access_tokens` DISABLE KEYS */;
/*!40000 ALTER TABLE `personal_access_tokens` ENABLE KEYS */;

-- Dumping structure for table routine_management.routine_groups
CREATE TABLE IF NOT EXISTS `routine_groups` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year_id` bigint(20) unsigned NOT NULL,
  `class_id` bigint(20) unsigned NOT NULL,
  `section_id` bigint(20) unsigned DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `year_class_section_unique` (`year_id`,`class_id`,`section_id`),
  KEY `routine_groups_class_id_foreign` (`class_id`),
  KEY `routine_groups_section_id_foreign` (`section_id`),
  CONSTRAINT `routine_groups_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `student_classes` (`id`),
  CONSTRAINT `routine_groups_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`),
  CONSTRAINT `routine_groups_year_id_foreign` FOREIGN KEY (`year_id`) REFERENCES `years` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.routine_groups: ~0 rows (approximately)
/*!40000 ALTER TABLE `routine_groups` DISABLE KEYS */;
INSERT INTO `routine_groups` (`id`, `year_id`, `class_id`, `section_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 1, NULL, '2021-12-26 09:45:19', '2021-12-26 09:45:19', NULL),
	(2, 1, 2, NULL, '2021-12-26 09:45:27', '2021-12-26 09:45:27', NULL),
	(3, 1, 3, NULL, '2021-12-26 09:45:39', '2021-12-26 09:45:39', NULL),
	(4, 1, 4, NULL, '2021-12-26 09:45:46', '2021-12-26 09:45:46', NULL),
	(5, 1, 5, NULL, '2021-12-26 09:45:56', '2021-12-26 09:45:56', NULL),
	(6, 1, 6, NULL, '2021-12-26 09:46:16', '2021-12-26 09:46:16', NULL),
	(7, 1, 7, NULL, '2021-12-26 09:46:25', '2021-12-26 09:46:25', NULL),
	(8, 1, 8, 1, '2021-12-26 09:46:42', '2021-12-26 09:46:42', NULL),
	(9, 1, 8, 2, '2021-12-26 09:46:51', '2021-12-26 09:46:51', NULL),
	(10, 1, 9, 1, '2021-12-26 09:47:05', '2021-12-26 09:47:05', NULL),
	(11, 1, 9, 2, '2021-12-26 09:47:28', '2021-12-26 09:47:28', NULL),
	(12, 1, 9, 3, '2021-12-26 09:47:46', '2021-12-26 09:47:46', NULL);
/*!40000 ALTER TABLE `routine_groups` ENABLE KEYS */;

-- Dumping structure for table routine_management.routine_group_students
CREATE TABLE IF NOT EXISTS `routine_group_students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `routine_group_id` bigint(20) unsigned NOT NULL,
  `student_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `routine_group_students_routine_group_id_foreign` (`routine_group_id`),
  KEY `routine_group_students_student_id_foreign` (`student_id`),
  CONSTRAINT `routine_group_students_routine_group_id_foreign` FOREIGN KEY (`routine_group_id`) REFERENCES `routine_groups` (`id`),
  CONSTRAINT `routine_group_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.routine_group_students: ~0 rows (approximately)
/*!40000 ALTER TABLE `routine_group_students` DISABLE KEYS */;
/*!40000 ALTER TABLE `routine_group_students` ENABLE KEYS */;

-- Dumping structure for table routine_management.routine_group_teachers
CREATE TABLE IF NOT EXISTS `routine_group_teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `routine_group_id` bigint(20) unsigned NOT NULL,
  `teacher_id` bigint(20) unsigned NOT NULL,
  `subject_id` bigint(20) unsigned NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `routine_teacher_subject_unique` (`routine_group_id`,`teacher_id`,`subject_id`),
  KEY `routine_group_teachers_teacher_id_foreign` (`teacher_id`),
  KEY `routine_group_teachers_subject_id_foreign` (`subject_id`),
  CONSTRAINT `routine_group_teachers_routine_group_id_foreign` FOREIGN KEY (`routine_group_id`) REFERENCES `routine_groups` (`id`),
  CONSTRAINT `routine_group_teachers_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`),
  CONSTRAINT `routine_group_teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.routine_group_teachers: ~0 rows (approximately)
/*!40000 ALTER TABLE `routine_group_teachers` DISABLE KEYS */;
INSERT INTO `routine_group_teachers` (`id`, `routine_group_id`, `teacher_id`, `subject_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 1, 2, 1, '2021-12-26 09:59:55', '2021-12-26 09:59:55', NULL),
	(2, 1, 5, 2, '2021-12-26 10:00:06', '2021-12-26 10:00:06', NULL),
	(3, 1, 6, 3, '2021-12-26 10:00:17', '2021-12-26 10:00:17', NULL),
	(4, 1, 7, 4, '2021-12-26 10:00:32', '2021-12-26 10:00:32', NULL),
	(5, 1, 8, 5, '2021-12-26 10:01:43', '2021-12-26 10:01:43', NULL),
	(6, 1, 9, 6, '2021-12-26 10:01:55', '2021-12-26 10:01:55', NULL),
	(7, 2, 2, 1, '2021-12-26 10:09:19', '2021-12-26 10:09:19', NULL),
	(8, 2, 5, 2, '2021-12-26 10:12:00', '2021-12-26 10:12:00', NULL),
	(9, 2, 6, 3, '2021-12-26 10:12:12', '2021-12-26 10:12:12', NULL),
	(10, 2, 7, 4, '2021-12-26 10:12:28', '2021-12-26 10:12:28', NULL),
	(11, 2, 8, 5, '2021-12-26 10:12:45', '2021-12-26 10:12:45', NULL),
	(12, 2, 9, 6, '2021-12-26 10:12:56', '2021-12-26 10:12:56', NULL);
/*!40000 ALTER TABLE `routine_group_teachers` ENABLE KEYS */;

-- Dumping structure for table routine_management.sections
CREATE TABLE IF NOT EXISTS `sections` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.sections: ~0 rows (approximately)
/*!40000 ALTER TABLE `sections` DISABLE KEYS */;
INSERT INTO `sections` (`id`, `title`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Section A', '2021-12-26 09:44:15', '2021-12-26 09:44:15', NULL),
	(2, 'Section B', '2021-12-26 09:44:22', '2021-12-26 09:44:22', NULL),
	(3, 'Section C', '2021-12-26 09:44:29', '2021-12-26 09:44:29', NULL),
	(4, 'Section D', '2021-12-26 09:44:36', '2021-12-26 09:44:36', NULL),
	(5, 'Section E', '2021-12-26 09:44:42', '2021-12-26 09:44:42', NULL);
/*!40000 ALTER TABLE `sections` ENABLE KEYS */;

-- Dumping structure for table routine_management.students
CREATE TABLE IF NOT EXISTS `students` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `student_id` bigint(20) unsigned NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `students_student_id_foreign` (`student_id`),
  CONSTRAINT `students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.students: ~0 rows (approximately)
/*!40000 ALTER TABLE `students` DISABLE KEYS */;
INSERT INTO `students` (`id`, `student_id`, `mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 4, '01726297811', '2021-12-26 09:52:25', '2021-12-26 09:52:25', NULL);
/*!40000 ALTER TABLE `students` ENABLE KEYS */;

-- Dumping structure for table routine_management.student_classes
CREATE TABLE IF NOT EXISTS `student_classes` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `category` enum('boys','girls') COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.student_classes: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_classes` DISABLE KEYS */;
INSERT INTO `student_classes` (`id`, `title`, `category`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Class 1', NULL, '2021-12-26 09:19:06', '2021-12-26 09:19:06', NULL),
	(2, 'Class 2', NULL, '2021-12-26 09:19:14', '2021-12-26 09:19:14', NULL),
	(3, 'Class 3', NULL, '2021-12-26 09:19:21', '2021-12-26 09:19:21', NULL),
	(4, 'Class 4', NULL, '2021-12-26 09:19:28', '2021-12-26 09:19:28', NULL),
	(5, 'Class 5', NULL, '2021-12-26 09:19:34', '2021-12-26 09:19:34', NULL),
	(6, 'Class 6', 'boys', '2021-12-26 09:19:57', '2021-12-26 09:19:57', NULL),
	(7, 'Class 6', 'girls', '2021-12-26 09:20:06', '2021-12-26 09:20:06', NULL),
	(8, 'Class 7', 'boys', '2021-12-26 09:20:17', '2021-12-26 09:20:17', NULL),
	(9, 'Class 7', 'girls', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL),
	(10, 'Class 8', 'boys', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL),
	(11, 'Class 8', 'girls', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL),
	(12, 'Class 9', 'boys', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL),
	(13, 'Class 9', 'girls', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL),
	(14, 'Class 10', 'boys', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL),
	(15, 'Class 10', 'girls', '2021-12-26 09:20:28', '2021-12-26 09:20:28', NULL);
/*!40000 ALTER TABLE `student_classes` ENABLE KEYS */;

-- Dumping structure for table routine_management.student_class_subjects
CREATE TABLE IF NOT EXISTS `student_class_subjects` (
  `class_id` bigint(20) unsigned NOT NULL,
  `subject_id` bigint(20) unsigned NOT NULL,
  KEY `student_class_subjects_class_id_foreign` (`class_id`),
  KEY `student_class_subjects_subject_id_foreign` (`subject_id`),
  CONSTRAINT `student_class_subjects_class_id_foreign` FOREIGN KEY (`class_id`) REFERENCES `student_classes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_class_subjects_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.student_class_subjects: ~0 rows (approximately)
/*!40000 ALTER TABLE `student_class_subjects` DISABLE KEYS */;
/*!40000 ALTER TABLE `student_class_subjects` ENABLE KEYS */;

-- Dumping structure for table routine_management.subjects
CREATE TABLE IF NOT EXISTS `subjects` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `subjects_name_unique` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.subjects: ~0 rows (approximately)
/*!40000 ALTER TABLE `subjects` DISABLE KEYS */;
INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Bangla', '2021-12-26 09:22:01', '2021-12-26 09:22:01', NULL),
	(2, 'English', '2021-12-26 09:22:08', '2021-12-26 09:22:08', NULL),
	(3, 'Mathematics', '2021-12-26 09:22:16', '2021-12-26 09:22:16', NULL),
	(4, 'General Science', '2021-12-26 09:22:47', '2021-12-26 09:22:47', NULL),
	(5, 'Social Science', '2021-12-26 09:23:00', '2021-12-26 09:23:00', NULL),
	(6, 'Agriculture', '2021-12-26 09:23:15', '2021-12-26 09:23:15', NULL);
/*!40000 ALTER TABLE `subjects` ENABLE KEYS */;

-- Dumping structure for table routine_management.teachers
CREATE TABLE IF NOT EXISTS `teachers` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `teacher_id` bigint(20) unsigned NOT NULL,
  `mobile` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teachers_teacher_id_foreign` (`teacher_id`),
  CONSTRAINT `teachers_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.teachers: ~0 rows (approximately)
/*!40000 ALTER TABLE `teachers` DISABLE KEYS */;
INSERT INTO `teachers` (`id`, `teacher_id`, `mobile`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 5, '01123298375', '2021-12-26 09:52:32', '2021-12-26 09:52:32', NULL),
	(2, 6, '01429479497', '2021-12-26 09:53:06', '2021-12-26 09:53:06', NULL),
	(3, 7, '01924617811', '2021-12-26 09:53:12', '2021-12-26 09:53:12', NULL),
	(4, 8, '01162413811', '2021-12-26 09:53:17', '2021-12-26 09:53:17', NULL),
	(5, 2, '01162413815', '2021-12-26 09:53:17', '2021-12-26 09:53:17', NULL),
	(6, 9, '01474655222', '2021-12-26 09:57:26', '2021-12-26 09:57:26', NULL);
/*!40000 ALTER TABLE `teachers` ENABLE KEYS */;

-- Dumping structure for table routine_management.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `role` enum('admin','teacher','student') COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `role`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'Demo Admin', 'admin@mail.com', '2021-12-26 09:18:13', '$2y$10$r99FLvyFl4pPVpuBtpc0yO5X3MfdtjSoriy.2wkJxIQp9DQJ3yaIa', NULL, '2021-12-26 09:18:13', '2021-12-26 09:18:13', NULL),
	(2, 'teacher', 'Demo Teacher', 'teacher@mail.com', '2021-12-26 09:18:13', '$2y$10$yvW9XRestRM1.Dsd68D0O.ym98pyx98j0Iz4hww2zGEwoutmTnxje', NULL, '2021-12-26 09:18:13', '2021-12-26 09:18:13', NULL),
	(3, 'student', 'Demo Student', 'student@mail.com', '2021-12-26 09:18:13', '$2y$10$TfEXIBwIG17oonStjufI1OyqEmCcbMQD6jM73nWg.3d1WLKbzlbBa', NULL, '2021-12-26 09:18:13', '2021-12-26 09:18:13', NULL),
	(4, 'student', 'Rose Welch', 'wusuvy@mailinator.com', '2021-12-26 15:54:42', '$2y$10$TKFBm4FnmuYXCZ5vG1CoxOD6mZrYS/FbIjyyE7Q7/44INeJ5gdaWe', NULL, '2021-12-26 09:52:25', '2021-12-26 09:52:25', NULL),
	(5, 'teacher', 'Farrah Kirby', 'mixymimavu@mailinator.com', '2021-12-26 15:54:42', '$2y$10$R/8yUmiKDSws8yfuTaP1fuXVore6EeMdFcy2skh71gulkypKlzmjO', NULL, '2021-12-26 09:52:32', '2021-12-26 09:52:32', NULL),
	(6, 'teacher', 'Hilel Stephens', 'pyze@mailinator.com', '2021-12-26 15:54:43', '$2y$10$qBhErNxN0phNWH3Q1s2GCeiMMSSF7AMtWc6sFBw2IulbNf5yJMLSq', NULL, '2021-12-26 09:53:06', '2021-12-26 09:53:06', NULL),
	(7, 'teacher', 'Vladimir Pennington', 'nykuqoduji@mailinator.com', '2021-12-26 15:54:44', '$2y$10$shbAcw3OHtK46.e8h/6yKuGcWVG97yqX2WaKE1JnXgYLl20tzLq5K', NULL, '2021-12-26 09:53:12', '2021-12-26 09:53:12', NULL),
	(8, 'teacher', 'Nicholas King', 'genaryxesa@mailinator.com', '2021-12-26 15:54:44', '$2y$10$UUFBlE46ADevSgaxFZDezuvQnWR/VZPx9FRPuals78NE90GBQG8wK', NULL, '2021-12-26 09:53:17', '2021-12-26 09:53:17', NULL),
	(9, 'teacher', 'Byron Hyde', 'beva@mailinator.com', NULL, '$2y$10$SFHMjzI5R5kwSu89Sb3/pugpM6do4uLxtq/yT2h7.TQVaUPt23xM2', NULL, '2021-12-26 09:57:26', '2021-12-26 09:57:26', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

-- Dumping structure for table routine_management.years
CREATE TABLE IF NOT EXISTS `years` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `year` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `years_year_unique` (`year`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Dumping data for table routine_management.years: ~0 rows (approximately)
/*!40000 ALTER TABLE `years` DISABLE KEYS */;
INSERT INTO `years` (`id`, `year`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 2021, '2021-12-26 09:23:24', '2021-12-26 09:23:24', NULL),
	(2, 2022, '2021-12-26 09:23:34', '2021-12-26 09:23:34', NULL);
/*!40000 ALTER TABLE `years` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
