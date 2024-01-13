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
                                ->preload()
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
                            Select::make('status')
                                ->options([
                                    'new' => 'New',
                                    'processing' => 'Processing',
                                    'shipped' => 'Shipped',
                                    'delivered' => 'Delivered',
                                    'cancelled' => 'Cancelled'
                                ])
                                ->default('new')
                                ->required()
                                ->native(false),
                            Textarea::make('address')
                                ->maxLength(500)
                                ->required(),
                            Textarea::make('notes')
                                ->label('Notes (Optional)')
                                ->maxLength(500),
                            TextInput::make('transaction_id')
                                ->label('Transaction ID (optional)')
                                ->maxLength(50),
                        ])->columns(2),
                    Wizard\Step::make('Order Items')
                        ->afterValidation(function (Set $set, Get $get) {
                            $total_price = 0;
                            $total_quantity = 0;
                            foreach($get('cartItems') as $cartItem) {
                                $total_price += $cartItem['total_price'];
                                $total_quantity += $cartItem['quantity'];
                            }
                            $set('total_price', $total_price);
                            $set('total_items', $total_quantity);
                        })
                        ->schema([
                            Repeater::make('cartItems')
                                ->relationship()
                                ->addActionLabel('Add Items')
                                ->reorderableWithButtons()
                                ->reorderable(true)
                                ->minItems(1)
                                ->schema([
                                    Select::make('catalog_id')
                                        ->label('Catalog Item')
                                        ->relationship(name: 'catalog', titleAttribute: 'title')
                                        ->searchable()
                                        ->preload()
                                        ->required()
                                        ->columnSpanFull()
                                        ->live()
                                        ->afterStateUpdated(function (Select $component, Set $set, Get $get) {
                                            $model = $component->getSelectedRecord();
                                            $set('unit_price', $model->price);
                                            $set('total_price', $model->price * (int)$get('quantity'));
                                        }),
                                    TextInput::make('unit_price')
                                        ->numeric()
                                        ->prefixIcon('heroicon-m-currency-rupee')
                                        ->afterStateUpdated(fn (Set $set, ?int $state, Get $get) => $set('total_price', (int)$get('quantity') * (float)$state))
                                        ->debounce(600)
                                        ->default(0)
                                        ->required(),
                                    TextInput::make('quantity')
                                        ->numeric()
                                        ->required()
                                        ->helperText(str('This quantity will not effect the inventory of the products!')->markdown()->toHtmlString())
                                        ->afterStateUpdated(fn (Set $set, ?int $state, Get $get) => $set('total_price', (int)$state * (float)$get('unit_price')))
                                        ->debounce(600)
                                        ->default(1),
                                    TextInput::make('total_price')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->prefixIcon('heroicon-m-currency-rupee')
                                        ->default(0)
                                ])
                                ->columns(3),
                        ]),
                    Wizard\Step::make('Summary')
                        ->schema([
                            Grid::make()
                                ->columns(2)
                                ->schema([
                                    TextInput::make('total_items')
                                        ->label('Order\'s total items')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->prefixIcon('heroicon-m-archive-box')
                                        ->default(0),
                                    TextInput::make('total_price')
                                        ->label('Order\'s total price')
                                        ->numeric()
                                        ->required()
                                        ->disabled()
                                        ->dehydrated()
                                        ->prefixIcon('heroicon-m-currency-rupee')
                                        ->default(0)
                                ]),
                        ])
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
                        TextEntry::make('transaction_id')
                            ->label('Transaction ID')
                            ->default('(Not Found)')
                            ->copyable()
                            ->copyMessage('Copied!'),
                        TextEntry::make('created_at')
                            ->label('Ordered at')
                            ->date('d M, Y - h:i a'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'new', 'processing' => 'warning',
                                'shipped' => 'success',
                                'delivered' => 'gray',
                                'cancelled' => 'danger'
                            })
                            ->formatStateUsing(fn (string $state): string => match ($state) {
                                'new' => 'New',
                                'processing' => 'Processing',
                                'shipped' => 'Shipped',
                                'delivered' => 'Delivered',
                                'cancelled' => 'Cancelled'
                            }),
                        TextEntry::make('total_price')
                            ->weight(FontWeight::Bold)
                            ->money('inr'),
                        TextEntry::make('total_items'),
                        TextEntry::make('notes')
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
                TextColumn::make('total_price')
                    ->searchable()
                    ->money('inr')
                    ->sortable()
                    ->toggleable(),
                SelectColumn::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Processing',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled'
                    ])
                    ->toggleable(),
                TextColumn::make('total_items')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('created_at')
                    ->label('Ordered at')
                    ->sortable()
                    ->date('d M, Y - h:i a')
                    ->toggleable(),
            ])
            ->filters([
                SelectFilter::make('status')
                    ->options([
                        'new' => 'New',
                        'processing' => 'Warning',
                        'shipped' => 'Shipped',
                        'delivered' => 'Delivered',
                        'cancelled' => 'Cancelled'
                    ])
                    ->multiple()
                    ->native(false),
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
                Tables\Actions\Action::make('pdf')
                    ->label('PDF')
                    ->color('success')
                    ->icon('heroicon-s-arrow-down-tray')
                    ->action(function (Model $record) {
                        return response()->streamDownload(function () use ($record) {
                            echo Pdf::loadHtml(
                                Blade::render('receiptpdf', ['record' => $record])
                            )->stream();
                        }, $record->id . '.pdf');
                    }),
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
