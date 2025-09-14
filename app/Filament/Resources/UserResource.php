<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\Pages\CreateUser;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Component;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\ActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\ViewAction;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user-group';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Basic Information')
                ->schema([
                  Group::make()
                    ->schema([
                       TextInput::make('name')
                        ->required(),
                        TextInput::make('password')
                        ->password()
                        ->maxLength(50)
                        ->minLength(8)
                        ->hiddenOn('edit')
                        ->revealable()
                        ->dehydrated(fn ($state) => filled($state))
                        ->required(fn (Component $component) => $component->getLivewire() instanceof CreateUser)
                    ])->columns(2),

                    Group::make()
                        ->schema([
                            TextInput::make('email')
                                ->unique(ignoreRecord: true)
                                ->required(),
                            DateTimePicker::make('email_verified_at')
                                ->timezone('Africa/Cairo')
                                ->default(now())
                        ])->columns(2),
                           Group::make()
                            ->schema([
                                Select::make('role')
                                    ->options([
                                        'admin' => 'Admin',
                                        'user' => 'User',
                                        'delivery' => 'Delivery',
                                    ])
                                    ->live()
                                   ->required(),

                                TextInput::make('salary')
                                    ->visible(fn (Get $get): bool =>  ($get('role')  == 'delivery' || $get('role') == 'admin'))
                                    ->reactive()
                                    ->numeric()
                                    ->required()
                                ->prefix('EGP')
                            ])->columns(2),
                    FileUpload::make('image')
                        ->image()
                        ->disk('public')
                        ->directory('avatars'),
                ])->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                ->searchable(),
                TextColumn::make('email'),
                TextColumn::make('email_verified_at')
               ->toggleable(isToggledHiddenByDefault: true),
                ImageColumn::make('image')
                ->disk('public')
                ->default(asset('images/default-avatar.jpg'))
                ->rounded(),
                TextColumn::make('role')
                ->searchable(),
                TextColumn::make('salary')
                ->formatStateUsing(fn ($state,  $record) => $record->role == 'user' ?  '-' : $state)
                  ->default('-')
                ->money('EGP')
                ->searchable(),
                TextColumn::make('created_at')
                ->date(),
                TextColumn::make('updated_at')
                ->date(),
            ])
            ->filters([
                 SelectFilter::make('role')
                ->options([
                    'admin' => 'Admin',
                    'user' => 'User',
                    'delivery' => 'Delivery',
                ])
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
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
