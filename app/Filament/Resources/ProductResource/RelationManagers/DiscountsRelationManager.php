<?php

namespace App\Filament\Resources\ProductResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class DiscountsRelationManager extends RelationManager
{
    protected static string $relationship = 'discounts';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Discount Details')
                    ->schema([

                        TextInput::make('discount_percentage')
                            ->numeric()
                            ->minValue(0)
                            ->maxValue(100)
                            ->step(0.01)
                            ->required()
                            ->label('Discount %'),

                        Toggle::make('is_daily')
                            ->label('Daily Discount?')
                            ->default(false)
                            ->onColor('success')
                            ->onIcon('heroicon-o-gift')
                            ->inline(false)
                            ->reactive()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $set('start_date', now()->format('Y-m-d H:i:s'));
                                    $set('end_date', now()->addDay()->format('Y-m-d H:i:s'));
                                }
                            }),

                        Radio::make('discount_type')
                            ->options([
                                'product' => 'Product',
                                'category' => 'Category',
                            ])
                            ->reactive()
                            ->inline()
                            ->inlineLabel(false)
                            ->required(),



                        Select::make('product_id')
                            ->label('Product')
                            ->relationship('product', 'name')
                            ->searchable()
                            ->preload()
                            ->hidden(fn (callable $get) => $get('discount_type') !== 'product')
                            ->required(fn (callable $get) => $get('discount_type') === 'product'),

                        Select::make('category_id')
                            ->label('Category')
                            ->relationship('category', 'name')
                            ->searchable()
                            ->preload()
                            ->hidden(fn (callable $get) => $get('discount_type') !== 'category')
                            ->required(fn (callable $get) => $get('discount_type') === 'category'),

                        Grid::make(2)
                            ->schema([
                                DateTimePicker::make('start_date')
                                    ->required(),

                                DateTimePicker::make('end_date')
                                    ->required()
                                    ->rule('after:start_date'),
                            ]),
                    ])->columns(2),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('discount_percentage')
            ->columns([
                TextColumn::make('discount_percentage'),
               IconColumn::make('is_daily')->boolean()->label('Daily?'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->label('Created At'),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->label('Updated At'),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
