<?php

namespace App\Filament\Resources\CatalogResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use IbrahimBougaoua\FilamentRatingStar\Actions\RatingStar;
use IbrahimBougaoua\FilamentRatingStar\Columns\RatingStarColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ReviewsRelationManager extends RelationManager
{
    protected static string $relationship = 'reviews';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('user_id')
                    ->label('Customer Email')
                    ->relationship(name: 'user', titleAttribute: 'email')
                    ->searchable()
                    ->required()
                    ->live(),
                RatingStar::make('star')
                    ->label('Rating'),
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\Textarea::make('message')
                    ->maxLength(2000),

            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('title')
            ->columns([
                Tables\Columns\TextColumn::make('user_id')
                    ->state(function(Model $record): string{
                    return $record->user->name.' ('.$record->user->email.')';
                })
                ->url(function(Model $record): string{
                    return env('APP_URL').'/admin/users/'.$record->user_id.'/edit';
                })
                ->color('primary')
                ->icon('heroicon-m-user'),

                Tables\Columns\TextColumn::make('title'),
                RatingStarColumn::make('star')
                    ->label('Rating')
                    ->state(function(Model $record): string{
                        return (6-$record->star);
                    }),
                Tables\Columns\TextColumn::make('message'),
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
