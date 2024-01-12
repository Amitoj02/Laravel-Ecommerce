<?php

namespace App\Livewire;

use App\Models\Catalog;
use Exception;
use Illuminate\Support\Collection;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Pagination\LengthAwarePaginator;

class ShowCatalogs extends Component
{
    use WithPagination;
    public $catalogsQuery; //for pagination

    public $type_id = 'all'; //Default
    public $color, $karat, $gender, $material = [];


    protected $listeners = ['reloadCatalogs'];

    public function mount() {

    }

    public function render()
    {

        $catalogs = Catalog::query();

        if($this->type_id != 'all') {
            $catalogs = $catalogs->where('type_id', $this->type_id);
        }

        if($this->color) {
            $catalogs = $catalogs->whereIn('color', $this->color);
        }

        if($this->karat) {
            $catalogs = $catalogs->whereIn('karat', $this->karat);
        }

        if($this->gender) {
            $catalogs = $catalogs->whereIn('gender', $this->gender);
        }

        if($this->material) {
            $catalogs = $catalogs->whereIn('material', $this->material);
        }

        $catalogs = $catalogs->paginate(2);

        return view('livewire.show-catalogs', [
            'catalogs' => $catalogs
        ]);
    }

    public function reloadCatalogs($type_id, $color, $karat, $gender, $material) {

        $this->type_id = $type_id;
        $this->color = $color;
        $this->karat = $karat;
        $this->gender = $gender;
        $this->material = $material;

        $this->resetPage();

    }

}
