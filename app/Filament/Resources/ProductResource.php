<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
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
use Filament\Forms\Components\Repeater;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use App\Models\ProductSize;
use App\Models\ProductImage;


class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // FileUpload::make('picture')->directory('products'), // Скрыто - используем новую систему изображений
                TextInput::make('name')->columnSpanFull(),
                RichEditor::make('description')->columnSpanFull(),
                
                // Система изображений
                Repeater::make('images')
                    ->relationship('images')
                    ->schema([
                        FileUpload::make('image_path')
                            ->label('Изображение')
                            ->directory('products')
                            ->required()
                            ->image()
                            ->imageEditor()
                            ->imageEditorAspectRatios([
                                '16:9',
                                '4:3',
                                '1:1',
                            ]),
                        TextInput::make('alt_text')
                            ->label('Альтернативный текст')
                            ->placeholder('Описание изображения'),
                        TextInput::make('sort_order')
                            ->label('Порядок')
                            ->numeric()
                            ->default(0)
                            ->placeholder('0'),
                        Forms\Components\Toggle::make('is_main')
                            ->label('Главное изображение')
                            ->default(false),
                    ])
                    ->columns(2)
                    ->addActionLabel('Добавить изображение')
                    ->collapsible()
                    ->defaultItems(1)
                    ->reorderable('sort_order'),
                
                // Система размеров с ценами
                Repeater::make('sizes')
                    ->relationship('sizes')
                    ->schema([
                        TextInput::make('size')
                            ->label('Размер')
                            ->required()
                            ->placeholder('Например: 50*50*3'),
                        TextInput::make('price')
                            ->label('Цена')
                            ->required()
                            ->numeric()
                            ->prefix('руб')
                            ->placeholder('0.00'),
                    ])
                    ->columns(2)
                    ->addActionLabel('Добавить размер')
                    ->collapsible()
                    ->defaultItems(1),
                

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('mainImage.image_path')
                    ->label('Главное изображение')
                    ->size(60),
                TextColumn::make('name'),
                TextColumn::make('images_count')
                    ->label('Изображения')
                    ->counts('images')
                    ->badge(),
                TextColumn::make('sizes_count')
                    ->label('Размеры')
                    ->counts('sizes')
                    ->badge(),
                TextColumn::make('min_price')
                    ->label('Цена от')
                    ->formatStateUsing(function ($record) {
                        if ($record->sizes->count() > 0) {
                            return number_format($record->min_price, 2, ',', ' ') . ' руб';
                        }
                        return $record->price ? number_format((float)$record->price, 2, ',', ' ') . ' руб' : 'Цена не указана';
                    }),
                TextColumn::make('max_price')
                    ->label('Цена до')
                    ->formatStateUsing(function ($record) {
                        if ($record->sizes->count() > 0) {
                            return number_format($record->max_price, 2, ',', ' ') . ' руб';
                        }
                        return '-';
                    }),

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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
