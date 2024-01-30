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
            <x-catalog is_carousel="0" :catalog="$catalog"/>
        @endforeach
    </div>

    <div class="row justify-center">
        <div wire:loading class="spinner-border mx-auto" style="margin-top:10rem;margin-bottom:10rem;" role="status">
            <span class="visually-hidden">Loading...</span>
        </div>
    </div>


    {{ $catalogs->links(data: ['scrollTo' => '#catalog-listing']) }}
</div>


