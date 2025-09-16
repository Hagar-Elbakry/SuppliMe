<?php

namespace App\Filament\Resources\CategoryResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Product Information')
                    ->description('Basic details about the product')
                    ->schema([
                        TextInput::make('name')
                            ->label('Product Name')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('category_id')
                            ->label('Category')
                            ->default($this->ownerRecord->name)
                            ->disabled(),

                        FileUpload::make('image')
                            ->label('Product Image')
                            ->image()
                            ->directory('products')
                            ->disk('public')
                            ->imageEditor()
                            ->nullable()
                            ->columnSpanFull(),

                    ])->columns(2),

                Section::make('Pricing & Stock')
                    ->description('Set price and inventory details')
                    ->schema([
                        TextInput::make('price')
                            ->numeric()
                            ->prefix('EGP')
                            ->required(),

                        TextInput::make('weight')
                            ->numeric()
                            ->suffix('kg')
                            ->required(),

                        TextInput::make('stock_quantity')
                            ->numeric()
                            ->minValue(0)
                            ->required(),

                        Toggle::make('is_featured')
                            ->label('Featured Product')
                            ->onColor('success')
                            ->Inline(false),

                    ])->columns(2),

                Section::make('Description')
                    ->schema([
                        MarkdownEditor::make('description')
                            ->label('Product Description')
                            ->required(),
                    ]),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('image')
                    ->label('Image')
                    ->disk('public')
                    ->rounded(),

                TextColumn::make('name')
                    ->label('Product Name')
                    ->sortable(),

                TextColumn::make('price')
                    ->money('EGP')
                    ->sortable(),

                TextColumn::make('weight')
                    ->label('Weight')
                    ->suffix(' kg'),

                TextColumn::make('stock_quantity')
                    ->label('Stock')
                    ->sortable(),

                IconColumn::make('is_featured')
                    ->label('Featured')
                    ->boolean(),

                TextColumn::make('created_at')
                    ->date()
                    ->label('Created At'),

                TextColumn::make('updated_at')
                    ->date()
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
