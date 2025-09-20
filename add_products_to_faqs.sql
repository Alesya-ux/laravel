-- SQL скрипт для добавления поля product_ids в таблицу faqs
-- Выполните этот скрипт в PhpMyAdmin

ALTER TABLE `faqs` 
ADD COLUMN `product_ids` TEXT NULL 
COMMENT 'JSON массив ID товаров, к которым привязан FAQ' 
AFTER `category_id`;
