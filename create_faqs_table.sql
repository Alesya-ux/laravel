-- SQL скрипт для создания таблицы faqs
-- Выполните этот скрипт в PhpMyAdmin или другом инструменте для работы с БД

-- Создаем таблицу faqs, если она не существует
CREATE TABLE IF NOT EXISTS `faqs` (
  `id` bigint unsigned NOT NULL AUTO_INCREMENT,
  `question` varchar(255) NOT NULL,
  `answer` text NOT NULL,
  `category_id` bigint unsigned DEFAULT NULL,
  `sort_order` int NOT NULL DEFAULT '0',
  `is_active` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `faqs_category_id_foreign` (`category_id`),
  KEY `faqs_category_id_is_active_sort_order_index` (`category_id`,`is_active`,`sort_order`),
  CONSTRAINT `faqs_category_id_foreign` FOREIGN KEY (`category_id`) REFERENCES `catalogs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Если таблица уже существует, добавляем столбец is_active
ALTER TABLE `faqs` 
ADD COLUMN IF NOT EXISTS `is_active` tinyint(1) NOT NULL DEFAULT '1' AFTER `sort_order`;

-- Добавляем индекс, если его нет
ALTER TABLE `faqs` 
ADD INDEX IF NOT EXISTS `faqs_category_id_is_active_sort_order_index` (`category_id`,`is_active`,`sort_order`);
