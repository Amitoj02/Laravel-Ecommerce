<?php

namespace App\Livewire;

use App\Models\Catalog;
use Livewire\Component;

class ShowCatalogs extends Component
{
    public function render()
    {
        $catalogs = Catalog::get();

        return view('livewire.show-catalogs', ['catalogs' => $catalogs]);
    }
}
