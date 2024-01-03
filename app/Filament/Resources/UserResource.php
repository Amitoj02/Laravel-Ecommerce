<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([

                    TextInput::make('name')
                        ->maxLength(100)
                        ->required(),

                    TextInput::make('email')
                        ->maxLength(60)
                        ->required()
                        ->unique(ignoreRecord: true),

                    TextInput::make('password')
                        ->password()
                        ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                        ->dehydrated(fn (?string $state): bool => filled($state))
                        ->required(fn (string $operation): bool => $operation === 'create')
                        ->helperText(fn (string $operation): string => $operation === 'create' ? '':'Leave empty if you don\'t want to change the password'),

                    DateTimePicker::make('email_verified_at')
                        ->native(false)
                        ->seconds(false)
                        ->helperText(str('Fill any date to verify the user\'s email (optional)')->markdown()->toHtmlString()),

                    TextInput::make('address')
                        ->label('Address (Optional)')
                        ->maxLength(150),

                    TextInput::make('phone_number')
                        ->prefix('+91')
                        ->label('Phone number (Optional)')
                        ->maxLength(10)
                        ->numeric(),
                ])->columns(2),

                Toggle::make('is_admin')
                    ->label('Make Admin')
                    ->onIcon('heroicon-m-bolt')
                    ->offIcon('heroicon-m-user')
                    ->helperText(str('**Caution:** Making the user admin will give him full access to the admin dashboard.')->markdown()->toHtmlString()),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->toggleable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('name')
//                    ->icon('heroicon-m-wrench')
                    ->icon(function (Model $record): string {
                        return ($record->is_admin) ? 'heroicon-m-wrench': '';
                    })
                    ->toggleable()
                    ->searchable()
                    ->sortable(),
                TextColumn::make('email')
                    ->toggleable()
                    ->searchable()
                    ->sortable()
                    ->copyable()
                    ->copyMessage('Email address copied')
                    ->copyMessageDuration(1500),
                IconColumn::make('email_verified_at')
                    ->toggleable()
                    ->label('Email Verified')
                    ->boolean()
                    ->state(fn (Model $record): bool => !is_null($record->email_verified_at))
                    ->tooltip(fn (Model $record): string => "{$record->email_verified_at}"),
                TextColumn::make('phone_number')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('address')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable(),
                TextColumn::make('created_at')
                    ->toggleable()
                    ->sortable()
                    ->dateTime(),
                TextColumn::make('updated_at')
                    ->toggleable(isToggledHiddenByDefault: true)
                    ->sortable()
                    ->dateTime()
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
            ])
            ->emptyStateActions([
                Tables\Actions\CreateAction::make(),
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
