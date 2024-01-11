<?php

namespace App\Livewire;

use App\Models\Type;
use Livewire\Attributes\Url;
use Livewire\Component;

class FilterCatalogs extends Component
{
    public $type_id = 'all';
    public $color = ['white_gold', 'rose_gold', 'yellow_gold'];
    public $karat = ['14K', '18K', '22K'];
    public $gender = ['Gents', 'Ladies'];
    public $material = ['Diamond', 'Gold', 'Silver', 'Platinum'];


    public function render()
    {
        $catalog_types = Type::all();
        return view('livewire.filter-catalogs', ['types' => $catalog_types]);
    }

    public function filter() {
        $this->dispatch('reloadCatalogs', $this->type_id, $this->color, $this->karat, $this->gender, $this->material)->to('show-catalogs');
    }
}
