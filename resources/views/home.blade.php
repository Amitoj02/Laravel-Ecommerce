@extends('layouts.app')
@section('page-title', 'Swarn Abhishek')

@section('header-content')
    <!--Slides Start-->
    <div class="pb-5">
        <div id="main-slider" class="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="container text-center w-30">
                        <img class="d-block m-auto p-5" style="height:250px;width:250px;"
                             src="{{ asset('assets/catalogs/item1.png') }}" alt="Item 1">
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
    <!-- Category section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center p-5">
                <h2 class="text-primary">Shop by Gender</h2>
                <p class="text-info small">Discover jewelery for every gender and age group, ensuring that everyone
                    can find
                    the perfect piece to elevate their styles.</p>

                <!-- Gender cards STARTS -->
                <div class="row px-5 py-3">
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
                    <div class="row row-cols-auto row-cols-lg-auto justify-content-md-center">
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item1.png') }}" alt="" srcset="">
                            <small>Rings</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item11.png') }}" alt="" srcset="">
                            <small>Necklaces</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item10.png') }}" alt="" srcset="">
                            <small>Earrings</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item8.png') }}" alt="" srcset="">
                            <small>Bracelets</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item7.png') }}" alt="" srcset="">
                            <small>Jewellery Sets</small>
                        </div>

                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item12.png') }}" alt="" srcset="">
                            <small>Managalsutras</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item4.png') }}" alt="" srcset="">
                            <small>Personalised</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item5.png') }}" alt="" srcset="">
                            <small>Nose Pins</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item6.png') }}" alt="" srcset="">
                            <small>Chains</small>
                        </div>
                        <div class="col category-card mx-auto">
                            <img src="{{ asset('assets/catalogs/item13.png') }}" alt="" srcset="">
                            <small>Toe Rings</small>
                        </div>
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

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item10.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item1.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">GOLD ENGAGEMENT RINGS</p>
                            <small class="text-primary inter fw-lighter">Couples | Wedding Rings</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 80,000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item11.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">PURE GOLD NECKLACE</p>
                            <small class="text-primary inter fw-lighter">Women | Necklace</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 70,000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item1.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">GOLD ENGAGEMENT RINGS</p>
                            <small class="text-primary inter fw-lighter">Couples | Wedding Rings</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 80,000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
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

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item10.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item1.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">GOLD ENGAGEMENT RINGS</p>
                            <small class="text-primary inter fw-lighter">Couples | Wedding Rings</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 80,000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item11.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">PURE GOLD NECKLACE</p>
                            <small class="text-primary inter fw-lighter">Women | Necklace</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 70,000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <div class="item item-card">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item1.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0">GOLD ENGAGEMENT RINGS</p>
                            <small class="text-primary inter fw-lighter">Couples | Wedding Rings</small>
                            <br><br>
                            <div class="d-flex">
                                <div class="me-auto text-primary">₹ 80,000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>
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
                        <div class="col-md-6 col-12 my-auto">
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
                        <div class="col-md-6 col-12 my-auto">
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
