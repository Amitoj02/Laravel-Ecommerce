@extends('layouts.app')
@section('page-title', 'Catalog - Swarn Abhishek')

@section('header-content')
    <!--Slides Start-->
    <div class="pb-5">
        <div id="main-slider" class="carousel">
            <div class="carousel-inner ">
                @foreach($slides as $slide)
                    <div class="carousel-item @if($loop->first) active @endif">
                        <div class="container text-center w-30">
                            <img class="d-block m-auto p-5" style="height:250px;width:250px;"
                                 src="{{ asset('storage/' . $slide->banner) }}">
                            <h3 class="under-border mb-3">{{ $slide->title }}</h3>
                            {{--                            <h5>Rs 30,000</h5>--}}
                            <p style="color:var(--bs-secondary); opacity:0.7;"><small>{{ $slide->introduction  }}</small></p>
                            <a href="{{ route('catalog', ['product_code' => $slide->product_code]) }}" type="button" class="btn btn-primary mt-3">View Details</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#main-slider"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#main-slider"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!--Slides End-->
@endsection

@section('content')
    <!-- Browse section STARTS-->
    <div class="section-leaf2">
        <div class="row mx-5 p-5 inter">
            <!--Filter section STARTS-->
            <livewire:filter-catalogs/>
            <!--Filter section ENDS-->

            <div class="col-lg-9">

                <!--Listing STARTS-->
                <livewire:show-catalogs/>
                <!--Listing ENDS-->

            </div>
        </div>
    </div>
    <!-- Browse section ENDS-->
@endsection

