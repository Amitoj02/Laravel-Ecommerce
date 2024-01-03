<?php

namespace App\Filament\Resources\CatalogResource\Pages;

use App\Filament\Resources\CatalogResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Notification;
class CreateCatalog extends CreateRecord
{
    protected static string $resource = CatalogResource::class;

    /*protected function getCreatedNotification(): ?Notification
    {
        return Notification::make()
            ->success()
            //->title('Catalog Created')
            ->body('The catalog was created, please attach tags to the catalog.');
    }*/

    // Returning to the index
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
