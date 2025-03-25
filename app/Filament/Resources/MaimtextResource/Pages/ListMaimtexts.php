<?php

namespace App\Filament\Resources\MaimtextResource\Pages;

use App\Filament\Resources\MaimtextResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListMaimtexts extends ListRecords
{
    protected static string $resource = MaimtextResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
