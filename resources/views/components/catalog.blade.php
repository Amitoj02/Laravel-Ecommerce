
{{--By Default, the catalog view will be built for listings,
    it needs to be specifically mentioned if the view is for
    carousel--}}
@props ([
    'is_carousel' => true
])


<div onmouseover="checkOverflow(this)"
{{--     href="{{route('catalog', ['product_code' => $catalog->product_code])}}"--}}
    @class([
        'item-card',
        'text-center',
        'bg-white',
        'my-3',
        'col-lg-3' => !$is_carousel
    ]) >
    <div class="bg-secondary p-2">
        <div class="d-flex text-primary">
            <livewire:wishlist-catalog :$catalog/>
            {{--            <div class="ms-auto"><i data-feather="shopping-bag"></i></div>--}}
        </div>
        <a href="{{route('catalog', ['product_code' => $catalog->product_code])}}" class="text-decoration-none">
            <img src="{{ asset( 'storage/'.$catalog->banner ) }}" class="mx-auto mb-3"
                 style="width:150px;height:150px;" alt="" srcset="">
        </a>
    </div>
    <a href="{{route('catalog', ['product_code' => $catalog->product_code])}}" class="text-decoration-none">
        <div class="p-3 overflow-hidden" >
            <p class="text-primary m-0 marcellus text-uppercase text-nowrap" >{{ $catalog->title }}</p>
            <small class="text-primary inter fw-lighter">{{ $catalog->gender . ' | ' . $catalog->type->name}}</small>
            {{--            <br><br>--}}
            {{--            <div class="d-flex marcellus">--}}
            {{--                <div class="me-auto text-primary">₹ {{ $catalog->price }}</div>--}}
            {{--                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>--}}
            {{--            </div>--}}
        </div>
    </a>
</div>

