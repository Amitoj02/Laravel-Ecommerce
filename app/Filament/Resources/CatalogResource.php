<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CatalogResource\Pages;
use App\Filament\Resources\CatalogResource\RelationManagers;
use App\Models\Catalog;
use Filament\Forms;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Grouping\Group;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;

class CatalogResource extends Resource
{
    protected static ?string $model = Catalog::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()->schema([
                    TextInput::make('title')
                    ->maxLength(150)
                    ->required(),
                ]),


                Section::make()->schema([

                    FileUpload::make('banner')
                        ->label('Banner Image')
                        ->helperText('This image will be shown in the catalog list of store page.')
                        ->image()
                        ->imageEditor()
                        ->visibility('public')
                        ->required(),

                    Textarea::make('introduction')
                        ->rows(5)
                        ->required(),

                    FileUpload::make('images')
                        ->helperText('Multiple images can be uploaded for showcasing the item.')
                        ->image()
                        ->imageEditor()
                        ->visibility('public')
                        ->multiple()
                        ->reorderable(),

                    RichEditor::make('description')
                        ->fileAttachmentsVisibility('public')
                        ->required(),

                    Grid::make()->schema(
                        [
                            Select::make('type_id')
                            ->label('Type')
                            ->native(false)
                            ->searchable(true)
                            ->relationship(name: 'type', titleAttribute: 'name')
                            ->required()
                            ->preload(),

                            Select::make('gender')
                            ->native(false)
                            ->required()
                            ->options([
                                'Gents'=>'Gents',
                                'Ladies'=>'Ladies'
                            ]),
                        ]
                    )->columns(2),

                    Grid::make()->schema(
                        [
                            Select::make('color')
                            ->native(false)
                            ->required()
                            ->options([
                                'white_gold' => 'White Gold',
                                'rose_gold' => 'Rose Gold',
                                'yellow_gold' => 'Yellow Gold',
                            ]),

                            Select::make('karat')
                            ->native(false)
                            ->required()
                            ->options([
                                '14K'=>'14K',
                                '18K'=>'18K',
                                '22K'=>'22K'
                            ])
                        ]
                    )->columns(2),

                    Select::make('material')
                        ->native(false)
                        ->required()
                        ->options([
                            'Diamond' => 'Diamond',
                            'Gold' => 'Gold',
                            'Platinum' => 'Platinum',
                            'Silver' => 'Silver'
                        ]),

                ]),

                Section::make('Store Listing')->schema([
                    Toggle::make('best_seller')
                        ->helperText(str('Make the post visible in "Best Seller" sections')->markdown()->toHtmlString())
                        ->default(true)
                        ->onIcon('heroicon-m-check')
                        ->onColor('success')
                        ->offIcon('heroicon-m-x-mark')
                        ->offColor('danger'),

                    Toggle::make('is_slide')
                        ->label('Slide')
                        ->helperText(str('Make the post visible in slideshow in homepage and catalog listing.')->markdown()->toHtmlString())
                        ->default(true)
                        ->onIcon('heroicon-m-check')
                        ->onColor('success')
                        ->offIcon('heroicon-m-x-mark')
                        ->offColor('danger')

                ])->columns(2),

                Section::make('Inventory')->schema([
                    TextInput::make('product_code')
                        ->maxLength(50)
                        ->required()
                        ->unique(ignoreRecord: true)
                        ->helperText(str('The product should be unique from other catalog\'s codes.')->markdown()->toHtmlString()),

                ])->columns(1),

                Toggle::make('visible')
                    ->helperText(str('Make the post visible publicly')->markdown()->toHtmlString())
                    ->default(true)
                    ->onIcon('heroicon-m-check')
                    ->onColor('success')
                    ->offIcon('heroicon-m-x-mark')
                    ->offColor('danger')

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('id')
                    ->searchable()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('product_code')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('title')
                    ->searchable()
                    ->sortable()
                    ->toggleable(),
                ImageColumn::make('banner')
                    ->toggleable(isToggledHiddenByDefault: true),

                IconColumn::make('visible')
                    ->boolean()
                    ->toggleable(),

                TextColumn::make('type.name')
                    ->badge()
                    ->toggleable(),

            ])
            ->defaultSort('id', 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->relationship('type', 'name')
                    ->multiple()
                    ->searchable()
                    ->preload(),
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
                    ->native(false)
            ])
            ->groups([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                //Tables\Actions\ViewAction::make(),
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
            RelationManagers\ReviewsRelationManager::class,
        ];
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListCatalogs::route('/'),
            'create' => Pages\CreateCatalog::route('/create'),
            'edit' => Pages\EditCatalog::route('/{record}/edit'),
            'view' => Pages\ViewCatalog::route('/{record}')
        ];
    }
}
