-- SQL скрипт для исправления таблицы faqs
-- Выполните этот скрипт в PhpMyAdmin

-- Удаляем таблицу, если она существует (осторожно!)
DROP TABLE IF EXISTS `faqs`;

-- Создаем таблицу заново с правильной структурой
CREATE TABLE `faqs` (
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

-- Добавляем тестовые данные
INSERT INTO `faqs` (`question`, `answer`, `category_id`, `sort_order`, `is_active`, `created_at`, `updated_at`) VALUES
('Как выбрать размер?', 'Мы рекомендуем измерить обхват груди и сравнить с нашей таблицей размеров.', 1, 1, 1, NOW(), NOW()),
('Какой срок доставки?', 'Доставка по Москве занимает 1-2 дня, по России - 3-7 дней.', 1, 2, 1, NOW(), NOW()),
('Можно ли вернуть товар?', 'Да, возврат возможен в течение 14 дней с момента покупки.', NULL, 3, 1, NOW(), NOW());
