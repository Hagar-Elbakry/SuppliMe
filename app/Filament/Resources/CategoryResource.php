<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CategoryResource\RelationManagers\DiscountsRelationManager;
use App\Filament\Resources\CategoryResource\RelationManagers\ProductsRelationManager;
use Filament\Forms;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Tables;
use App\Models\Category;
use Filament\Forms\Form;
use Faker\Provider\Image;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\CategoryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\CategoryResource\RelationManagers;

class CategoryResource extends Resource
{
    protected static ?string $model = Category::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                ->schema([
                    TextInput::make('name')
                        ->label('Category Name')
                        ->required()
                        ->maxLength(255),

                    MarkdownEditor::make('description')
                        ->label('Description'),
                ])
                ->columns(1),

            Section::make('Visuals')
                ->schema([
                    FileUpload::make('image')
                        ->label('Category Image')
                        ->image()
                        ->disk('public')
                        ->directory('categories')
                        ->required()
                        ->imageEditor(),

                    Select::make('color')
                        ->label('Color')
                        ->options([
                            'fre-fru' => 'fre-fru',
                            'fre-veg' => 'fre-veg',
                        ])
                        ->default(null)
                        ->nullable(),
                ])
                ->columns(1),
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
                    ->label('Name')
                    ->sortable()
                    ->searchable(),

                TextColumn::make('description')
                    ->label('Description')
                    ->limit(20),


                BadgeColumn::make('color')
                    ->label('Color')
                    ->colors([
                        'warning' => 'fre-fru',
                        'info' => 'fre-veg',
                    ])
                    ->toggleable(isToggledHiddenByDefault: true),

                TextColumn::make('created_at')
                    ->label('Created At')
                    ->date()
                    ->sortable(),
                TextColumn::make('updated_at')
                ->label('Updated At')
                ->date()
                ->sortable(),
            ])
            ->filters([
                SelectFilter::make('color')
                    ->options([
                        'fre-fru' => 'fre-fru',
                        'fre-veg' => 'fre-veg',
                    ])
                    ->label('Color')
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

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                ImageEntry::make('image')
                    ->label('')
                ->disk('public')
                ->circular(),
               \Filament\Infolists\Components\Section::make()
                ->schema([
                    TextEntry::make('name'),
                    TextEntry::make('description'),
                    TextEntry::make('color')
                      ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'fre-fru' => 'warning',
                        'fre-veg' => 'info',
                    })
                    ->hidden(fn ($state) => is_null($state)),
                ])
            ]);
    }

    public static function getRelations(): array
    {
        return [
            ProductsRelationManager::class,
            DiscountsRelationManager::class
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCategories::route('/'),
            'create' => Pages\CreateCategory::route('/create'),
            'view' => Pages\ViewCategory::route('/{record}'),
            'edit' => Pages\EditCategory::route('/{record}/edit'),
        ];
    }
}
