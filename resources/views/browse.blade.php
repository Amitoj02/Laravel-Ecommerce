@extends('layouts.app')
@section('page-title', 'Catalog - Swarn Abhishek')

@section('header-content')
    <!--Slides Start-->
    <div class="pb-5">
        <div id="main-slider" class="carousel">
            <div class="carousel-inner ">
                <!--This slide is not mobile friendly-->
                <!-- <div class="carousel-item active ">
                    <div class="container bg-gold rounded-4 w-30 p-5">
                        <div class="row">
                            <div class="col-8 m-auto">
                                <h1 class="text-primary">Best Affordable Jewellery</h1>
                                <p>Discover unbeatable value with our IGI-certified jewelry – the perfect blend of affordability, quality, and style. Experience the best today!!</p>
                                <button class="btn btn-outline-secondary">Explore jewellery</button>
                                <button class="btn btn-outline-secondary">IGI Certification</button>
                            </div>
                            <div class="col-4 my-auto">
                                <img src="assets/catalogs/item10.png" width="300px">
                            </div>
                        </div>
                    </div>
                </div> -->
                <div class="carousel-item active">
                    <div class="container text-center w-30">
                        <img class="d-block m-auto p-5" style="height:250px;width:250px;"
                             src="{{ asset('assets/catalogs/item2.png') }}" alt="Item 1">
                        <h3 class="under-border mb-3">Gold Engagement Ring</h3>
                        <h5>Rs 30,000</h5>
                        <p style="color:var(--bs-secondary); opacity:0.7;"><small>This is our new best
                                collection of engagement ring for newely wed couples</small></p>
                        <button type="button" class="btn btn-primary mt-3">View Details</button>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="container text-center w-30">
                        <img class="d-block m-auto p-5" style="height:250px;width:250px;"
                             src="{{ asset('assets/catalogs/item3.png') }}" alt="Item 1">
                        <h3 class="under-border mb-3">Gold Engagement Ring</h3>
                        <h5>Rs 30,000</h5>
                        <p style="color:var(--bs-secondary); opacity:0.7;"><small>This is our new best
                                collection of engagement ring for newely wed couples</small></p>
                        <button type="button" class="btn btn-primary mt-3">View Details</button>
                    </div>
                </div>
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

            <div class="col-9">


                <!--Listing STARTS-->
                <livewire:show-catalogs/>
                <!--Listing ENDS-->

{{--                <nav >--}}
{{--                    <ul class="pagination justify-content-center fw-bold mt-5">--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Previous">--}}
{{--                                <i data-feather="arrow-left" stroke-width="2"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                        <li class="page-item active"><a class="page-link" href="#">1</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">2</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">3</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">4</a></li>--}}
{{--                        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>--}}
{{--                        <li class="page-item"><a class="page-link" href="#">10</a></li>--}}
{{--                        <li class="page-item">--}}
{{--                            <a class="page-link" href="#" aria-label="Next">--}}
{{--                                <i data-feather="arrow-right" stroke-width="2"></i>--}}
{{--                            </a>--}}
{{--                        </li>--}}
{{--                    </ul>--}}
{{--                </nav>--}}

            </div>
        </div>
    </div>
    <!-- Browse section ENDS-->
@endsection
