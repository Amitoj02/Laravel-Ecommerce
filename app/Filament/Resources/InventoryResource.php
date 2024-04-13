<?php

namespace App\Filament\Resources;

use App\Filament\Resources\InventoryResource\Pages;
use App\Filament\Resources\InventoryResource\RelationManagers;
use App\Models\Inventory;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\KeyValue;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Actions\BulkAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\Layout\Split;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Blade;

class InventoryResource extends Resource
{
    protected static ?string $model = Inventory::class;
    public static ?string $label = 'Vault Item';
    protected static ?string $navigationGroup = 'Inventory';
    public static ?string $navigationLabel = 'Vault';
    protected static ?string $navigationIcon = 'heroicon-o-key';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->columns(3)
                    ->schema([
                        TextInput::make('item_code')->unique(ignoreRecord: true),
                        TextInput::make('item_name'),
                        TextInput::make('report_id')->unique(ignoreRecord: true),
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->visibility('public')
                            ->columnSpanFull(),
                    ]),
                Section::make()
                    ->columns(3)
                    ->schema([
                        Select::make('gender')
                            ->native(false)
                            ->required()
                            ->options([
                                'Gents'=>'Gents',
                                'Ladies'=>'Ladies'
                            ]),
                        TextInput::make('gross_weight')
                            ->numeric()
                            ->inputMode('decimal')
                            ->suffix('gram'),
                        TextInput::make('net_weight')
                            ->numeric()
                            ->inputMode('decimal')
                            ->suffix('gram'),
                        Select::make('karat')
                            ->native(false)
                            ->required()
                            ->options([
                                '14K'=>'14K',
                                '18K'=>'18K',
                                '22K'=>'22K'
                            ]),
                        TextInput::make('diamond_quality'),
                        TextInput::make('diamond_weight')
                            ->numeric()
                            ->inputMode('decimal')
                            ->suffix('carat'),
                        TextInput::make('diamond_pcs')
                            ->numeric()
                            ->inputMode('decimal'),
                        TextInput::make('color_stone'),
                    ]),
                Section::make()
                    ->schema([
                        KeyValue::make('others')
                        ->label('Additional Fields')
                            ->keyLabel('Field')
                        ->keyPlaceholder('Field name')
                        ->valuePlaceholder('Field value')
                        ->reorderable()
                    ]),
                Toggle::make('in_stock')
                    ->onColor('success')
                    ->offColor('danger')
                    ->onIcon('heroicon-m-check')
                    ->offIcon('heroicon-m-x-mark')
                    ->default(true)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('item_name')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                ImageColumn::make('image')
                    ->sortable()
                    ->size(80)
                    ->toggleable(),
                TextColumn::make('item_code')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
                IconColumn::make('in_stock')
                    ->boolean()
                    ->toggleable(),
                TextColumn::make('gross_weight')
                    ->sortable()
                    ->suffix('g')
                    ->toggleable(),
                TextColumn::make('net_weight')
                    ->sortable()
                    ->suffix('g')
                    ->toggleable(),
                TextColumn::make('karat')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('gender')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('diamond_quality')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('diamond_weight')
                    ->sortable()
                    ->suffix('g')
                    ->toggleable(),
                TextColumn::make('diamond_pcs')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('color_stone')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('report_id')
                    ->sortable()
                    ->searchable()
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('gender')
                    ->options([
                        'gents' => 'Gents',
                        'ladies' => 'Ladies',
                    ])
                    ->native(false),
                SelectFilter::make('karat')
                    ->options([
                        '14K'=>'14K',
                        '18K'=>'18K',
                        '22K'=>'22K'
                    ])
                    ->native(false),
                SelectFilter::make('in_stock')
                    ->label('Stock')
                    ->options([
                        '1'=>'In Stock',
                        '0'=>'Out of Stock',
                    ])
                    ->native(false),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    BulkAction::make('print')
                        ->requiresConfirmation()
                        ->icon('heroicon-s-printer')
                        ->color('success')
                        ->action(function (Collection $records) {
                            return response()->streamDownload(function () use ($records) {
                                echo Pdf::loadHtml(
                                    Blade::render('inventory_list_pdf', ['records' => $records])
                                )->setPaper('A4')->stream();
                            }, Carbon::now()->format('d-m-Y') . '.pdf');
                        })
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
            'index' => Pages\ListInventories::route('/'),
            'create' => Pages\CreateInventory::route('/create'),
            'edit' => Pages\EditInventory::route('/{record}/edit'),
        ];
    }
}
