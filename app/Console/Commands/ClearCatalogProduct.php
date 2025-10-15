<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;

class ClearCatalogProduct extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'catalog:clear-product-relations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Очистить таблицу catalog_product (связи между каталогами и продуктами)';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Подтверждение от пользователя
        if (!$this->confirm('Вы уверены, что хотите очистить все связи между каталогами и продуктами?')) {
            $this->info('Операция отменена.');
            return;
        }

        try {
            // Очищаем таблицу catalog_product
            $deletedCount = DB::table('catalog_product')->delete();
            
            $this->info("Успешно удалено {$deletedCount} связей между каталогами и продуктами.");
            $this->info('Таблица catalog_product очищена.');
            
        } catch (\Exception $e) {
            $this->error('Ошибка при очистке таблицы: ' . $e->getMessage());
            return 1;
        }

        return 0;
    }
}

