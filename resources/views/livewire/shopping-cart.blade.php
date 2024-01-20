<div class="modal-content inter">
    <div class="modal-header p-4">
        <h4 class="text-primary fw-bold my-auto">Shopping Cart</h4>
        <i data-feather="shopping-bag"  class="my-auto"></i>
    </div>

    <div class="px-4 inter">

        @if(count($cartItems) === 0)
            <p class="p-3">No items in the shopping cart</p>
        @else
            @foreach($cartItems as $cartItem)
                <div wire:loading.remove class="row my-3">
                    <div class="col-auto text-center">
                        <img class="cart-item-img" src="{{ asset('storage/' . $cartItem->catalog->banner) }}" width="80px">
                    </div>
                    <div class="col align-self-center">
                        <p class="m-0 align-middle fw-bold p-1">{{$cartItem->catalog->title}}</p>
                        <p class="m-0 align-middle p-1">Quantity: <b>{{$cartItem->quantity}}</b></p>
                        <p class="p-1 small text-info">{{$cartItem->message}}</p>
                    </div>
                    <div class="col-auto"><i wire:click="remove({{$cartItem->item_id}})" class="fa fa-times-circle text-primary fs-5 mt-3" style="cursor: pointer;"></i></div>
                </div>
            @endforeach

            <div class="row justify-center">
                <div wire:loading class="spinner-border mx-auto my-5" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>

            <hr>
            <div class="d-grid gap-2 col-6 mx-auto mb-3">
                <a wire:loading.class="disabled" href="{{ route('quote-details') }}" class="btn btn-outline-secondary mx-2 px-4 rounded-5" type="button">Get Quote</a>
            </div>


        @endif
    </div>

</div>
