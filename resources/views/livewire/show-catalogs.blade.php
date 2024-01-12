<div>

    <!--Listing header-->
    <div class="row mb-3">
        <div class="col my-auto">
            @if($search_text)
                <b>Search Result for "{{$search_text}}"</b>
                <a href="/browse">(Clear Search)</a>
            @else
                <b>Browse Catalogs</b>
            @endif
            <br>
            <small class="text-info">({{$catalogs_count}} items)</small>

            {{--                    <div class="col-auto">--}}
            {{--                        <!-- FilterMenuCatalogs Component -->--}}
            {{--                        <livewire:filter-menu-catalogs/>--}}
            {{--                    </div>--}}
        </div>
    </div>


    <div wire:loading.remove class="row" id="catalog-listing">
        @foreach($catalogs as $catalog)
            <a href="{{route('catalog', ['product_code' => $catalog->product_code])}}" class="d-block text-decoration-none col-auto text-center item-card bg-white my-3">
                <div class="bg-secondary p-2">
                    <div class="d-flex text-primary">
                        <div class="me-auto"><i data-feather="heart"></i></div>
                        <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                    </div>
                    <img src="{{ asset( 'storage/'.$catalog->banner ) }}" class="mx-auto mb-3"
                         style="width:150px;height:150px;" alt="" srcset="">
                </div>
                <div class="p-3">
                    <p class="text-primary m-0 marcellus">{{ $catalog->title }}</p>
                    <small class="text-primary inter fw-lighter">{{ $catalog->gender . ' | ' . $catalog->type->name}}</small>
                    {{--            <br><br>--}}
                    {{--            <div class="d-flex marcellus">--}}
                    {{--                <div class="me-auto text-primary">₹ {{ $catalog->price }}</div>--}}
                    {{--                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>--}}
                    {{--            </div>--}}
                </div>
            </a>
        @endforeach
    </div>

    <div class="row justify-center">
        <div wire:loading class="spinner-border mx-auto" style="margin-top:10rem;margin-bottom:10rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    {{ $catalogs->links(data: ['scrollTo' => '#catalog-listing']) }}
</div>


