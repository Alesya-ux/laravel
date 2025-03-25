<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MaimtextResource\Pages;
use App\Filament\Resources\MaimtextResource\RelationManagers;
use App\Models\Maimtext;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;



class MaimtextResource extends Resource
{
    protected static ?string $model = Maimtext::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')->columnSpanFull(),
                TextInput::make('url'),
                Select::make('lang')
                    ->options([
                        'ru'=>'ru',
                        'en'=>'en'
                    ]),
                RichEditor::make('body')->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('url'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListMaimtexts::route('/'),
            'create' => Pages\CreateMaimtext::route('/create'),
            'edit' => Pages\EditMaimtext::route('/{record}/edit'),
        ];
    }
}
