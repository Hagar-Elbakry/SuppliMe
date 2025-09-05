<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Product;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\DeleteAction;
use Symfony\Component\Yaml\Inline;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Filters\TernaryFilter;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\ProductResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ProductResource\RelationManagers;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-bag';

    public static function form(Form $form): Form
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

                    Select::make('category_id')
                        ->label('Category')
                        ->relationship('category', 'name')
                        ->searchable()
                        ->preload()
                        ->required(),

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

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                ->label('Image')
                ->disk('public')
                ->rounded(),

                TextColumn::make('name')
                ->label('Product Name')
                ->searchable()
                ->sortable(),

                TextColumn::make('category.name')
                ->label('Category'),

                TextColumn::make('price')
                ->money('EGP')
                ->sortable()
                ->searchable(),

                TextColumn::make('weight')
                ->label('Weight')
                ->suffix(' kg')
                ->searchable(),

                TextColumn::make('stock_quantity')
                ->label('Stock')
                ->sortable()
                ->searchable(),

                IconColumn::make('is_featured')
                ->label('Featured')
                ->boolean(),

                TextColumn::make('created_at')
                ->date()
                ->label('Created At')
                ->toggleable(),

                TextColumn::make('updated_at')
                ->date()
                ->label('Updated At')
                ->toggleable(),
            ])
            ->filters([
                TernaryFilter::make('is_featured')
                ->label('Featured'),

                SelectFilter::make('category_id')
                ->label('Category')
                ->relationship('category', 'name'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
