<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Discount;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Radio;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\DateTimePicker;
use App\Filament\Resources\DiscountResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\DiscountResource\RelationManagers;

class DiscountResource extends Resource
{
    protected static ?string $model = Discount::class;

    protected static ?int $navigationSort = 5;

    protected static ?string $navigationIcon = 'heroicon-o-gift';

    public static function form(Form $form): Form
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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('discount_percentage')
                ->label('Discount')
                ->suffix('%')
                ->sortable(),

                BadgeColumn::make('discount_type')
                ->colors([
                    'info' => 'product',
                    'primary' => 'category',
                ]),

                IconColumn::make('is_daily')
                ->boolean()
                ->label('Daily'),

                TextColumn::make('target')
                ->label('Product/Category')
                ->getStateUsing(fn ($record) => $record->product?->name ?? $record->category?->name ?? '-')
                ->searchable(),


                TextColumn::make('duration')
                ->label('Duration')
                ->getStateUsing(fn ($record) => "{$record->start_date->format('d M Y')} - {$record->end_date->format('d M Y')}")
                ->color(fn ($record) => $record->end_date->isPast() ? 'danger' : 'success'),

            ])
            ->filters([
                SelectFilter::make('discount_type')
                ->options([
                    'product' => 'Product',
                    'category' => 'Category',
                ]),

                TernaryFilter::make('is_daily'),
            ])
            ->actions([
                ActionGroup::make([
                    ViewAction::make(),
                    EditAction::make(),
                    DeleteAction::make(),
                ])->tooltip('Actions')
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
            'index' => Pages\ListDiscounts::route('/'),
            'create' => Pages\CreateDiscount::route('/create'),
            'edit' => Pages\EditDiscount::route('/{record}/edit'),
        ];
    }
}
