<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductSizeResource\Pages;
use App\Models\ProductSize;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;

class ProductSizeResource extends Resource
{
    protected static ?string $model = ProductSize::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';
    
    protected static ?string $navigationLabel = 'Размеры товаров';
    
    protected static ?string $modelLabel = 'Размер товара';
    
    protected static ?string $pluralModelLabel = 'Размеры товаров';
    
    // Скрываем из навигации, так как управление размерами есть в ProductResource
    public static function shouldRegisterNavigation(): bool
    {
        return false;
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('product_id')
                    ->label('Товар')
                    ->relationship('product', 'name')
                    ->required()
                    ->searchable()
                    ->preload(),
                Forms\Components\TextInput::make('size')
                    ->label('Размер')
                    ->required()
                    ->placeholder('Например: 50*50*3'),
                Forms\Components\TextInput::make('price')
                    ->label('Цена')
                    ->required()
                    ->numeric()
                    ->prefix('руб')
                    ->placeholder('0.00'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->defaultSort('price', 'asc')
            ->columns([
                Tables\Columns\TextColumn::make('product.name')
                    ->label('Товар')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('size')
                    ->label('Размер')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('price')
                    ->label('Цена')
                    ->money('RUB')
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('product_id')
                    ->label('Товар')
                    ->relationship('product', 'name')
                    ->searchable()
                    ->preload(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProductSizes::route('/'),
            'create' => Pages\CreateProductSize::route('/create'),
            'edit' => Pages\EditProductSize::route('/{record}/edit'),
        ];
    }
}
