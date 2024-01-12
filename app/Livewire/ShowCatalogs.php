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
    public $catalogs_count = 0;

    #[Url(as: 'q')]
    public $search_text;
    #[Url(as: 't')]
    public $type_id = 'all'; //Default

    #[Url(as: 'c')]
    public $color = [];

    #[Url(as: 'k')]
    public $karat = [];

    #[Url(as: 'g')]
    public $gender = [];

    #[Url(as: 'm')]
    public $material = [];


    protected $listeners = ['reloadCatalogs'];

    public function mount() {
        if(isset($_GET['q'])) {
            $this->search_text = $_GET['q'];
        }

        if(isset($_GET['t'])) {
            $this->type_id = $_GET['t'];
        }
        if(isset($_GET['c'])) {
            $this->color = $_GET['c'];
        }
        if(isset($_GET['k'])) {
            $this->karat = $_GET['k'];
        }
        if(isset($_GET['g'])) {
            $this->gender = $_GET['g'];
        }
        if(isset($_GET['m'])) {
            $this->material = $_GET['m'];
        }
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

        if($this->search_text) {
            $catalogs = $catalogs->where('title', 'LIKE', '%'. $this->search_text . '%');
        }

        $catalogs->where('visible', 'LIKE', '1');
        $catalogs->orderBy('id', 'DESC');

        $catalogs = $catalogs->paginate(16);
        $this->catalogs_count = $catalogs->total();

        return view('livewire.show-catalogs', [
            'catalogs' => $catalogs
        ]);
    }

    public function reloadCatalogs($type_id, $color, $karat, $gender, $material) {

//        $this->search_text = ''; //Resetting the search result

        $this->type_id = $type_id;
        $this->color = $color;
        $this->karat = $karat;
        $this->gender = $gender;
        $this->material = $material;

        $this->resetPage();

    }

}
