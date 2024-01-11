<div>

    <!--Listing header-->
    <div class="row mb-3">
        <div class="col my-auto">
            @if(isset($_GET['q']))
                <b>Search Result for "{{$_GET['q']}}"</b>
            @else
                <b>Browse Catalogs</b>
            @endif
            <small class="text-info">(52 items)</small>

            {{--                    <div class="col-auto">--}}
            {{--                        <!-- FilterMenuCatalogs Component -->--}}
            {{--                        <livewire:filter-menu-catalogs/>--}}
            {{--                    </div>--}}
        </div>
    </div>

    <div wire:loading.remove class="row" id="catalog-listing">
        @foreach($catalogs as $catalog)
            <div class="col-auto text-center item-card bg-white my-3">
                <div class="bg-secondary p-2">
                    <div class="d-flex">
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
            </div>
        @endforeach
    </div>

    <div class="row justify-center">
        <div wire:loading class="spinner-border mx-auto" style="margin-top:10rem;margin-bottom:10rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>

    {{ $catalogsLink->links(data: ['scrollTo' => '#catalog-listing']) }}
</div>


