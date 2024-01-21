<?php

namespace App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\CartItem;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Infolists\Components\IconEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class CartItemsRelationManager extends RelationManager
{
    protected static string $relationship = 'cartItems';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('catalog_id')
                    ->label('Product ID'),
            ]);
    }

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->columns(1)
            ->schema([
                TextEntry::make('catalog_id'),
                TextEntry::make('catalog.title'),
            ]);
    }


    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('catalog_id')
            ->columns([

                Tables\Columns\TextColumn::make('product_name')
                    ->state(fn(CartItem $model) => $model->catalog->title),

                Tables\Columns\TextColumn::make('product_code')
                    ->state(fn(CartItem $model) => $model->catalog->product_code),

                Tables\Columns\TextColumn::make('Quantity')
                    ->state(fn(CartItem $model) => $model->quantity),

                Tables\Columns\TextColumn::make('Message')
                    ->state(fn(CartItem $model) => $model->message)
            ])
            ->filters([
                //
            ])
            ->headerActions([
//                Tables\Actions\CreateAction::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make()
                   ->url(fn (CartItem $record): string => env('APP_URL').'/admin/catalogs/'.$record->catalog_id),
//                Tables\Actions\EditAction::make(),
//                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
//                Tables\Actions\BulkActionGroup::make([
//                    Tables\Actions\DeleteBulkAction::make(),
//                ]),
            ]);


    }
}
