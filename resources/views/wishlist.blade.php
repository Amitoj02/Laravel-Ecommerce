@extends('layouts.app')
@section('page-title', 'Wishlist - Swarn Abhishek')

@section('header-content')
@endsection

@section('content')
    <!-- Wishlist section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="mx-lg-5 px-lg-5">
                <div class="row mx-5 p-5 inter justify-content-center" id="catalog-listing">
                    @foreach($catalogs as $catalog)
                        <x-catalog is_carousel="0" :catalog="$catalog"/>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist section ENDS-->
@endsection

