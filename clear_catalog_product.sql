-- Скрипт для очистки таблицы catalog_product
-- ВНИМАНИЕ: Этот скрипт удалит ВСЕ связи между каталогами и продуктами!

-- Проверяем текущее количество записей
SELECT COUNT(*) as current_relations_count FROM catalog_product;

-- Очищаем таблицу catalog_product
DELETE FROM catalog_product;

-- Проверяем результат
SELECT COUNT(*) as remaining_relations_count FROM catalog_product;

-- Показываем информацию о таблице
SELECT 'Таблица catalog_product успешно очищена' as status;

