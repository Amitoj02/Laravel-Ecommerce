<div class="col-3" >
    <p class="fw-bold">Filter</p>

    <!--Gender-->
    <p class="small fw-bold mb-1">Type</p>
    <div class="small" >
        <select wire:model="type_id" wire:change="filter" wire:loading.attr="disabled" class="form-select" aria-label="Types">
            <option value="all" selected>All</option>
            @foreach($types as $type)
                <option value="{{$type->id}}">{{$type->name}}</option>
            @endforeach
        </select>
    </div>
    <hr>

    <!--Gender-->
    <p class="small fw-bold mb-1">Gender</p>
    <div class="small">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="gender" wire:change="filter" wire:loading.attr="disabled" value="Gents" id="filter_g_gents" >
            <label class="form-check-label" for="filter_g_gents">
                Gents
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="gender" wire:change="filter" wire:loading.attr="disabled" value="Ladies" id="filter_g_ladies" >
            <label class="form-check-label" for="filter_g_ladies">
                Ladies
            </label>
        </div>
    </div>
    <hr>
    <!--Color-->
    <p class="small fw-bold mb-1">Color</p>
    <div class="small">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="color" wire:change="filter" wire:loading.attr="disabled" value="white_gold" id="filter_c_white_gold" checked>
            <label class="form-check-label color-badge cb-white-gold" for="filter_c_white_gold">
                White Gold
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="color" wire:change="filter" wire:loading.attr="disabled" value="rose_gold" id="filter_c_rose_gold" checked>
            <label class="form-check-label color-badge cb-rose-gold" for="filter_c_rose_gold">
                Rose Gold
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="color" wire:change="filter" wire:loading.attr="disabled" value="yellow_gold" id="filter_c_yellow_gold" checked>
            <label class="form-check-label color-badge cb-yellow-gold" for="filter_c_yellow_gold">
                Yellow Gold
            </label>
        </div>
    </div>
    <hr>
    <!--Material-->
    <p class="small fw-bold mb-1">Material</p>
    <div class="small">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="material" wire:change="filter" wire:loading.attr="disabled" value="Diamond" id="filter_m_diamond" checked>
            <label class="form-check-label" for="filter_m_diamond">
                Diamond
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="material" wire:change="filter" wire:loading.attr="disabled" value="Gold" id="filter_m_gold" checked>
            <label class="form-check-label" for="filter_m_gold">
                Gold
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="material" wire:change="filter" wire:loading.attr="disabled" value="Silver" id="filter_m_silver" checked>
            <label class="form-check-label" for="filter_m_silver">
                Silver
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="material" wire:change="filter" wire:loading.attr="disabled" value="Platinum" id="filter_m_platinum" checked>
            <label class="form-check-label" for="filter_m_platinum">
                Platinum
            </label>
        </div>
    </div>
    <hr>

    <!--Material-->
    <p class="small fw-bold mb-1">Karat</p>
    <div class="small">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="karat" wire:change="filter" wire:loading.attr="disabled" value="14K" id="filter_k_14" checked>
            <label class="form-check-label" for="filter_k_14">
                14K
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="karat" wire:change="filter" wire:loading.attr="disabled" value="18K" id="filter_k_18" checked>
            <label class="form-check-label" for="filter_k_18">
                18K
            </label>
        </div>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" wire:model="karat" wire:change="filter" wire:loading.attr="disabled" value="22K" id="filter_k_22" checked>
            <label class="form-check-label" for="filter_k_22">
                22K
            </label>
        </div>
    </div>
    <hr>

</div>
