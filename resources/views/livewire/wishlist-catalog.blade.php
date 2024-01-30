<div class="ms-auto">

    @auth
        @if($catalog->isWishlisted())
            <i class="fa fa-heart fs-4" wire:loading.remove wire:click="remove()" style="cursor: pointer;"></i>
        @else
            <i class="fa fa-heart-o fs-4" wire:loading.remove wire:click="add()" style="cursor: pointer;"></i>
        @endif
            <div wire:loading class="spinner-border spinner-border-sm" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
    @endauth

    @guest
        <i class="fa fa-heart-o fs-4" style="cursor: pointer;" onclick="showLogin()"></i>
    @endguest
</div>
