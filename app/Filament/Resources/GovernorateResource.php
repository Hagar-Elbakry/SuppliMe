<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Table;
use App\Models\Governorate;
use Filament\Resources\Resource;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\GovernorateResource\Pages;
use App\Filament\Resources\GovernorateResource\RelationManagers;

class GovernorateResource extends Resource
{
    protected static ?string $model = Governorate::class;

    protected static ?string $navigationIcon = 'heroicon-o-building-office-2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->label('Governorate Name')
                ->required()
                ->maxLength(255),

                TextInput::make('shipping_cost')
                ->label('Shipping Cost (EGP)')
                ->numeric()
                ->required()
                ->minValue(0),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->searchable()->sortable(),
                TextColumn::make('shipping_cost')->prefix('EGP')->sortable(),
                TextColumn::make('created_at')->date()->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')->date()->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                DeleteAction::make()
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
            'index' => Pages\ListGovernorates::route('/'),
            'create' => Pages\CreateGovernorate::route('/create'),
            'edit' => Pages\EditGovernorate::route('/{record}/edit'),
        ];
    }
}
