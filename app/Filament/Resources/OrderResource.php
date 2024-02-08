<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OrderResource\Pages;
use App\Filament\Resources\OrderResource\RelationManagers;

use App\Models\Order;
use App\Models\User;
use Barryvdh\DomPDF\Facade\Pdf;
use Filament\Forms;


use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Forms\Set;
use Filament\Infolists;

use Filament\Infolists\Components\Actions;
use Filament\Infolists\Components\Actions\Action;
use Filament\Infolists\Components\ImageEntry;
use Filament\Infolists\Components\RepeatableEntry;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Infolist;
use Filament\Resources\Resource;
use Filament\Support\Enums\FontWeight;
use Filament\Tables;
use Filament\Tables\Columns\SelectColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Str;

//Custom package names due to clashing namespaces
use Filament\Infolists\Components\Section as InfoSection;

class OrderResource extends Resource
{
    protected static ?string $model = Order::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Wizard::make([
                    Wizard\Step::make('Order Details')
                        ->schema([
                            Select::make('user_id')
                                ->label('Customer Email')
                                ->relationship(name: 'user', titleAttribute: 'email')
                                ->searchable()
//                                ->preload()
                                ->required()
                                ->live()
                                ->afterStateUpdated(function (Select $component, Set $set) {
                                    $model = $component->getSelectedRecord();
                                    if(isset($model->name)) {
                                        $set('recipient_name', $model->name);
                                        $set('phone_number', $model->phone_number);
                                        $set('address', $model->address);
                                    }
                                }),
                            TextInput::make('recipient_name')
                                ->maxLength(50)
                                ->required(),
                            TextInput::make('phone_number')
                                ->numeric()
                                ->prefix('+91')
                                ->required(),
                            TextInput::make('email')
                                ->maxLength(60)
                                ->required(),
                            Textarea::make('address')
                                ->maxLength(500)
                                ->required(),
                            Textarea::make('message')
                                ->label('Message (Optional)')
                                ->maxLength(2000),
                        ])->columns(2),
                    Wizard\Step::make('Order Items')
                        ->schema([
                            Repeater::make('cartItems')
                                ->relationship()
                                ->addActionLabel('Add Items')
                                ->reorderableWithButtons()
                                ->reorderable(true)
                                ->minItems(1)
                                ->schema([
                                    Grid::make('item')->schema([
                                        Select::make('catalog_id')
                                            ->label('Catalog Item')
                                            ->relationship(name: 'catalog', titleAttribute: 'title')
                                            ->searchable()
                                            ->preload()
                                            ->required(),
                                        TextInput::make('quantity')
                                            ->numeric()
                                            ->required()
                                            ->default(1),
                                    ])->columns(2),
                                    Textarea::make('message')
                                        ->label('Message (Optional)')
                                        ->columnSpanFull()
                                ])
                                ->columns(3),
                        ]),
                ])
                    ->columnSpanFull(),
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {

        return $infolist
            ->schema([
                InfoSection::make('Recipient Details')
                    ->schema([
                        Infolists\Components\TextEntry::make('recipient_name')
                            ->icon('heroicon-m-user'),
                        Infolists\Components\TextEntry::make('phone_number')
                            ->icon('heroicon-m-phone'),
                        Infolists\Components\TextEntry::make('address')
                            ->default('(None)')
                            ->icon('heroicon-m-map-pin'),
                        Infolists\Components\TextEntry::make('customer')
                            ->state(function(Model $record): string{
                                return $record->user->name.' ('.$record->user->email.')';
                            })
                            ->url(function(Model $record): string{
                                return env('APP_URL').'/admin/users/'.$record->user_id.'/edit';
                            })
                            ->color('primary')
                            ->icon('heroicon-m-user'),
                    ])
                ->columns(2),
                InfoSection::make('Order Summary')
                    ->schema([
                        TextEntry::make('id')
                            ->label('Order ID'),
                        TextEntry::make('created_at')
                            ->label('Ordered at')
                            ->date('d M, Y - h:i a'),
                        TextEntry::make('message')
                            ->default('(None)'),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('recipient_name')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('phone_number')
                    ->searchable()
                    ->toggleable(),
                TextColumn::make('created_at')
                    ->label('Ordered at')
                    ->sortable()
                    ->date('d M, Y - h:i a')
                    ->toggleable(),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('orders_from'),
                        DatePicker::make('orders_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['orders_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['orders_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    })
                ->indicateUsing(function (array $data): array {
                    $indicators = [];

                    if ($data['orders_from'] ?? null) {
                        $indicators['orders_from'] = 'Orders from ' . Carbon::parse($data['orders_from'])->toFormattedDateString();
                    }

                    if ($data['orders_until'] ?? null) {
                        $indicators['orders_until'] = 'Orders until ' . Carbon::parse($data['orders_until'])->toFormattedDateString();
                    }

                    return $indicators;
                })
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\ViewAction::make(),
//                Tables\Actions\Action::make('pdf')
//                    ->label('PDF')
//                    ->color('success')
//                    ->icon('heroicon-s-arrow-down-tray')
//                    ->action(function (Model $record) {
//                        return response()->streamDownload(function () use ($record) {
//                            echo Pdf::loadHtml(
//                                Blade::render('receiptpdf', ['record' => $record])
//                            )->stream();
//                        }, $record->id . '.pdf');
//                    }),
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
            RelationManagers\CartItemsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListOrders::route('/'),
            'create' => Pages\CreateOrder::route('/create'),
            'edit' => Pages\EditOrder::route('/{record}/edit'),
            'view' => Pages\ViewOrder::route('/{record}'),
        ];
    }
}
