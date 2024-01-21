@extends('layouts.app')
@section('page-title', 'Swarn Abhishek')

@section('header-content')
    <!--Slides Start-->
    <div class="pb-5">
        <div id="main-slider" class="carousel">
            <div class="carousel-inner">
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
    <!-- Category section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center p-5">
                <h2 class="text-primary">Shop by Gender</h2>
                <p class="text-info small">Discover jewelery for every gender and age group, ensuring that everyone
                    can find
                    the perfect piece to elevate their styles.</p>

                <!-- Gender cards STARTS -->
                <div class="row justify-content-evenly px-5 py-3">
                    <div class="col-md-3 col-12 item-card">
                        <img src="{{ asset('assets/g_1.png') }}" class="w-100" alt="Men">
                        <div class="d-flex">
                            <div class="text-primary fw-bold text-start p-2">Men</div>
                            <div class="view-more small">Explore More <i data-feather="chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 item-card">
                        <img src="{{ asset('assets/g_2.png') }}" class="w-100" alt="Kids">
                        <div class="d-flex">
                            <div class="text-primary fw-bold text-start p-2">Kids</div>
                            <div class="view-more small">Explore More <i data-feather="chevron-right"></i></div>
                        </div>
                    </div>
                    <div class="col-md-3 col-12 item-card">
                        <img src="{{ asset('assets/g_3.png') }}" class="w-100" alt="Women">
                        <div class="d-flex">
                            <div class="text-primary fw-bold text-start p-2">Women</div>
                            <div class="view-more small">Explore More <i data-feather="chevron-right"></i></div>
                        </div>
                    </div>
                </div>
                <!-- Gender cards ENDS -->

                <h2 class="text-primary mt-5">Shop by Category</h2>
                <p class="text-info small">Explore our Shop by Category section and easily find the perfect piece
                    that match
                    your style and preferences.</p>

                <div class="container text-center p-5">
                    <div class="row row-cols-auto justify-content-center row-cols-lg-auto justify-content-md-center">
                        @foreach($types as $type)
                            <a href="{{ route('browse', ['t' => $type->id]) }}" class="d-block text-decoration-none col category-card mx-auto">
                                <img src="{{ asset('storage/' . $type->image) }}" />
                                <small class="text-primary">{{ $type->name }}</small>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Category section ENDS-->

    <!-- Why Choose Us STARTS-->
    <div class="bg-secondary py-2 px-sm-5 info-section">
        <div class="row mx-lg-5 px-lg-5 py-2">
            <div class="col-md-6 col-12 my-auto">
                <div class="curly-img m-5">
                    <img src="assets/vector_1_lady.png" width="100%" alt="" srcset="">
                </div>
            </div>
            <div class="col-md-6 col-12 my-auto px-5">
                <small>WHY CHOOSE US</small>
                <br><br>
                <h2 class="text-primary">Trusted Source For Affordable Elegance</h2>
                <br>
                <small>
                    <b class="inter">IGI Certification</b>
                    <p class="inter">We provide IGI certification with every jewelery piece, ensuring transparency
                        and authencity in every purchase.</p>
                    <b class="inter">Affordable</b>
                    <p class="inter">Affordability is at the heart of our mission. We offer stunning jewelry that
                        won't break the bank, so you can enjoy elegance without compromise.</p>
                    <b class="inter">Custom Design</b>
                    <p class="inter">Unlock your unique style with our design services, where your dream jewelry
                        pieces come to life, reflecting your individually in every exquisite detail.</p>
                </small>
            </div>
        </div>
    </div>
    <!-- Why Choose Us ENDS-->

    <!--Latest Collection STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center py-2 px-sm-5 info-section">
                <h1 class="text-primary mt-5">Latest Collection</h1>
                <p class="text-info small">Explore our newest arrivals and stay ahead of the fashion curve with our
                    latest
                    collection of exquisite jewelry pieces.</p>

                <div class="owl-carousel p-4">

                    <!--Collection items-->
                    @foreach($latestCatalogs as $latestCatalog)
                        <x-catalog :catalog="$latestCatalog"/>
                    @endforeach

                </div>

                <!-- Sale banners -->
                <div class="row mt-5">
                    <div class="col-12 col-md-6 mx-auto">
                        <div class="sale-banner row h-100">
                            <div class="col-8 p-4">
                                <h2>New Arrival</h2>
                                <small>Discover our new arrivals and be among the first to adorn yourself with
                                    latest trend.</small>
                                <div class="btn btn-secondary mt-2">Shop Now &gt;</div>
                            </div>
                            <div class="col-4 p-0">
                                <img src="{{ asset('assets/catalogs/item2.png') }}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 mx-auto my-2">
                        <div class="sale-banner row h-100">
                            <div class="col-8">
                                <h3>Women's Earrings</h3>
                                <h2>40% OFF</h2>
                                <div class="btn btn-secondary">Shop Now &gt;</div>
                            </div>
                            <div class="col-4 p-0">
                                <img src="{{ asset('assets/vector_2_lady.png') }}" class="img-fluid" />
                            </div>
                        </div>
                    </div>
                </div>

                <!--Best Seller-->
                <h1 class="text-primary mt-5">Best Sellers</h1>
                <p class="text-info small">Explore our Best Sellers and find out why these exquiste pieces have
                    captured the hearts of jewelry enthusiasts.</p>

                <div class="owl-carousel p-4 mb-4">

                    <!--Items-->
                    @foreach($bestSellers as $bestSeller)
                        <x-catalog :catalog="$bestSeller"/>
                    @endforeach

                </div>
                <!--Best Sellers ENDS-->
            </div>
        </div>
    </div>


    <!-- Customer Reviews STARTS-->
    <div class="bg-primary py-2 px-sm-5 info-section-primary mt-5">
        <div id="review-slider" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="row mx-lg-5 px-lg-5 py-2">
                        <div class="col-md-6 col-12 my-auto px-5 pt-5">
                            <h2>What our Customers Says About us</h2>
                            <br>
                            <p>“Absolutely thrilled with my purchase! Beautiful jewelry, unbeatable prices, and
                                fantastic
                                customer service. I'm a customer for life! Can't wait to shop here again!”</p>
                        </div>
                        <div class="col-md-6 col-12 my-auto">
                            <div class="curly-img secondary m-5">
                                <img src="{{ asset('assets/vector_1_lady.png') }}" width="100%" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row mx-lg-5 px-lg-5 py-2">
                        <div class="col-md-6 col-12 my-auto px-5 pt-5">
                            <h2>What our Customers Says About us</h2>
                            <br>
                            <p>“Absolutely thrilled with my purchase! Beautiful jewelry, unbeatable prices, and
                                fantastic
                                customer service. I'm a customer for life! Can't wait to shop here again!”</p>
                        </div>
                        <div class="col-md-6 col-12 my-auto">
                            <div class="curly-img secondary m-5">
                                <img src="{{ asset('assets/vector_1_lady.png') }}" width="100%" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="row mx-lg-5 px-lg-5 py-2">
                        <div class="col-md-6 col-12 my-auto px-5 pt-5">
                            <h2>What our Customers Says About us</h2>
                            <br>
                            <p>“Absolutely thrilled with my purchase! Beautiful jewelry, unbeatable prices, and
                                fantastic
                                customer service. I'm a customer for life! Can't wait to shop here again!”</p>
                        </div>
                        <div class="col-md-6 col-12 my-auto">
                            <div class="curly-img secondary m-5">
                                <img src="{{ asset('assets/vector_1_lady.png') }}" width="100%" alt="" srcset="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#review-slider"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#review-slider"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
    <!-- Customer Reviews ENDS-->

    <!-- Follow Us STARTS-->
    <div class="section-artboard">
        <div class="container text-center py-2 px-sm-5 info-section">
            <h1 class="text-primary mt-5">Follow us on Instagram</h1>
            <p class="text-info">@Swarnabhishek</p>

            <div class="row row-cols-md-4 row-cols-sm-2 m-5">
                <div class="col p-2">
                    <img src="{{ asset('assets/sq_1.png') }}" width="200px" />
                </div>
                <div class="col p-2">
                    <img src="{{ asset('assets/sq_2.png') }}" width="200px" />
                </div>
                <div class="col p-2">
                    <img src="{{ asset('assets/sq_3.png') }}" width="200px" />
                </div>
                <div class="col p-2">
                    <img src="{{ asset('assets/sq_4.png') }}" width="200px" />
                </div>
            </div>
        </div>
    </div>
    <!-- Follow Us ENDS-->
@endsection
