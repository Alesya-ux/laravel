<?php

namespace App\Filament\Resources;

use App\Filament\Resources\FaqResource\Pages;
use App\Filament\Resources\FaqResource\RelationManagers;
use App\Models\Faq;
use App\Models\Catalog;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class FaqResource extends Resource
{
    protected static ?string $model = Faq::class;

    protected static ?string $navigationIcon = 'heroicon-o-question-mark-circle';

    protected static ?string $navigationLabel = 'FAQ';

    protected static ?string $modelLabel = 'Вопрос-ответ';

    protected static ?string $pluralModelLabel = 'FAQ';

    protected static ?int $navigationSort = 5;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('question')
                    ->label('Вопрос')
                    ->required()
                    ->maxLength(255)
                    ->columnSpanFull(),
                
                Forms\Components\Textarea::make('answer')
                    ->label('Ответ')
                    ->required()
                    ->rows(4)
                    ->columnSpanFull(),
                
                Forms\Components\Select::make('category_id')
                    ->label('Категория')
                    ->options(Catalog::all()->pluck('name', 'id'))
                    ->placeholder('Выберите категорию (необязательно)')
                    ->searchable(),
                
                Forms\Components\Select::make('product_ids')
                    ->label('Товары')
                    ->multiple()
                    ->options(\App\Models\Product::all()->pluck('name', 'id'))
                    ->placeholder('Выберите товары (необязательно)')
                    ->searchable()
                    ->preload()
                    ->helperText('FAQ будет отображаться на страницах выбранных товаров'),
                
                Forms\Components\TextInput::make('sort_order')
                    ->label('Порядок сортировки')
                    ->numeric()
                    ->default(0)
                    ->helperText('Чем меньше число, тем выше в списке'),
                
                Forms\Components\Toggle::make('is_active')
                    ->label('Активен')
                    ->default(true)
                    ->helperText('Неактивные FAQ не отображаются на сайте'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('question')
                    ->label('Вопрос')
                    ->searchable()
                    ->limit(60)
                    ->weight('bold')
                    ->tooltip(function (Tables\Columns\TextColumn $column): ?string {
                        $state = $column->getState();
                        return strlen($state) > 60 ? $state : null;
                    }),
                
                Tables\Columns\TextColumn::make('category.name')
                    ->label('Категория')
                    ->badge()
                    ->placeholder('Общий')
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('product_count')
                    ->label('Товары')
                    ->formatStateUsing(function ($record) {
                        if (!$record->product_ids || empty($record->product_ids)) {
                            return '0';
                        }
                        return count($record->product_ids);
                    })
                    ->badge()
                    ->tooltip(function ($record) {
                        if (!$record->product_ids || empty($record->product_ids)) {
                            return 'Не привязан к товарам';
                        }
                        
                        $products = \App\Models\Product::whereIn('id', $record->product_ids)->pluck('name');
                        return 'Привязан к товарам: ' . $products->join(', ');
                    })
                    ->toggleable(),
                
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Активен')
                    ->boolean()
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('sort_order')
                    ->label('Порядок')
                    ->sortable()
                    ->badge()
                    ->toggleable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Создан')
                    ->dateTime('d.m.Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category_id')
                    ->label('Категория')
                    ->options(Catalog::all()->pluck('name', 'id'))
                    ->placeholder('Все категории'),
                
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Активен')
                    ->placeholder('Все')
                    ->trueLabel('Только активные')
                    ->falseLabel('Только неактивные'),
            ])
            ->actions([
                Tables\Actions\EditAction::make()
                    ->icon('heroicon-o-pencil'),
                Tables\Actions\DeleteAction::make()
                    ->icon('heroicon-o-trash')
                    ->color('danger'),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('sort_order')
            ->reorderable('sort_order')
            ->paginated([10, 25, 50, 100]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListFaqs::route('/'),
            'create' => Pages\CreateFaq::route('/create'),
            'edit' => Pages\EditFaq::route('/{record}/edit'),
        ];
    }
}
