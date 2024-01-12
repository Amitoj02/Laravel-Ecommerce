<?php

namespace App\Livewire;

use App\Models\Type;
use Livewire\Attributes\Url;
use Livewire\Component;

class FilterCatalogs extends Component
{
    #[Url(as: 't')]
    public $type_id = 'all';

    #[Url(as: 'c')]
    public $color = ['white_gold', 'rose_gold', 'yellow_gold'];

    #[Url(as: 'k')]
    public $karat = ['14K', '18K', '22K'];

    #[Url(as: 'g')]
    public $gender = ['Gents', 'Ladies'];

    #[Url(as: 'm')]
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
