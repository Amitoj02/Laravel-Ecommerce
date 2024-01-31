@extends('layouts.app')
@section('page-title', 'Wishlist - Swarn Abhishek')

{{--@section('header-content')--}}
{{--@endsection--}}

@section('content')
    <!-- Wishlist section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="mx-lg-5 px-lg-5">
                <div class="row mx-5 p-5 inter justify-content-center" id="catalog-listing">
                    @foreach($catalogs as $catalog)
                        <x-catalog is_carousel="0" :catalog="$catalog"/>
                    @endforeach
                    @if($catalogs->count() === 0)
                        <div class="shadow rounded col-lg-8 p-5 bg-white text-center">
                            <h1 class="text-primary">Empty</h1>
                            Add items to the wishlist to be able to view them here.
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist section ENDS-->
@endsection

