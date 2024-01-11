<?php

namespace App\Livewire;

use App\Models\Catalog;
use Livewire\Component;
use Livewire\WithPagination;

class ShowCatalogs extends Component
{
    use WithPagination;
    public $catalogs;
//    public $catalogsLink2; //for pagination

    protected $listeners = ['reloadCatalogs'];

    public function mount() {
        $this->catalogsLink2 = Catalog::Paginate(2);
        $this->catalogs = collect($this->catalogsLink2->items());
    }

    public function render()
    {
//        return view('livewire.show-catalogs');

        $catalogsLink = $this->catalogsLink2;
        return view('livewire.show-catalogs', ['catalogsLink' => $catalogsLink]);

//        return view('livewire.show-catalogs', [
////            'catalogs' => Catalog::paginate(2),
//            'catalogs' => $this->catalogs,
//        ]);
    }

    public function reloadCatalogs($type_id, $color, $karat, $gender, $material) {
        $this->catalogs = Catalog::query();

        if($type_id != 'all') {
            $this->catalogs = $this->catalogs->where('type_id', $type_id);
        }

        if($color) {
            $this->catalogs = $this->catalogs->whereIn('color', $color);
        }

        if($karat) {
            $this->catalogs = $this->catalogs->whereIn('karat', $karat);
        }

        if($gender) {
            $this->catalogs = $this->catalogs->whereIn('gender', $gender);
        }

        if($material) {
            $this->catalogs = $this->catalogs->whereIn('material', $material);
        }

//        $this->catalogs = $this->catalogs->paginate(2);
        $this->catalogsLink2 = $this->catalogs->paginate(2);
        $this->catalogs = collect($this->catalogsLink2->items());
    }
}
