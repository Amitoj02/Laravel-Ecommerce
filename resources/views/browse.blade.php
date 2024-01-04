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
            <div class="col-3">
                <p class="fw-bold">Filter</p>

                <!--Gender-->
                <p class="small fw-bold mb-1">Gender</p>
                <div class="small">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_gender_male">
                        <label class="form-check-label" for="filter_gender_male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_gender_female">
                        <label class="form-check-label" for="filter_gender_female">
                            Female
                        </label>
                    </div>
                </div>
                <hr>
                <!--Color-->
                <p class="small fw-bold mb-1">Color</p>
                <div class="small">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_color_red">
                        <label class="form-check-label color-badge cb-red" for="filter_color_red">
                            Red
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_color_apricot">
                        <label class="form-check-label color-badge cb-apricot" for="filter_color_apricot">
                            Apricot
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_color_black">
                        <label class="form-check-label color-badge cb-black" for="filter_color_black">
                            Black
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_color_black_white">
                        <label class="form-check-label color-badge cb-black-white" for="filter_color_black_white">
                            Black & White
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_color_silver">
                        <label class="form-check-label color-badge cb-silver" for="filter_color_silver">
                            Silver
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_color_tan">
                        <label class="form-check-label color-badge cb-tan" for="filter_color_tan">
                            Tan
                        </label>
                    </div>
                </div>
                <hr>
                <!--Price-->
                <p class="small fw-bold mb-1">Price</p>
                <div class="row">
                    <div class="col form-floating mb-3">
                        <input type="number" class="form-control" id="filter_min" placeholder="Min">
                        <label for="filter_min" class="ms-2">Min</label>
                    </div>
                    <div class="col form-floating mb-3">
                        <input type="number" class="form-control" id="filter_max" placeholder="Max">
                        <label for="filter_max" class="ms-2">Max</label>
                    </div>
                </div>
                <hr>
                <!--Breed/Size-->
                <p class="small fw-bold mb-1">Breed</p>
                <div class="small">
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_breed_small">
                        <label class="form-check-label" for="filter_breed_small">
                            Small
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_breed_medium">
                        <label class="form-check-label" for="filter_breed_medium">
                            Medium
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="filter_breed_large">
                        <label class="form-check-label" for="filter_breed_large">
                            Large
                        </label>
                    </div>
                </div>
                <hr>


            </div>
            <!--Filter section ENDS-->

            <div class="col-9">
                <!--Listing header-->
                <div class="row mb-3">
                    <div class="col my-auto">
                        <b>Browse Catalogs</b>
                        <small class="text-info">(52 items)</small>

                    </div>
                    <div class="col-auto">
                        <div class="form-floating">
                            <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                <option value="popular" selected>Popular</option>
                                <option value="new">New</option>
                                <option value="price">Price</option>
                            </select>
                            <label for="floatingSelect">Sort By:</label>
                        </div>
                    </div>
                </div>

                <!--Listing STARTS-->
                <div class="row">

                    <!--Catalog item-->
                    <div class="col-auto text-center item-card bg-white my-3 mx-auto">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item1.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0 marcellus">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex marcellus">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!--Catalog item-->
                    <div class="col-auto text-center item-card bg-white my-3 mx-auto">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item2.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0 marcellus">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex marcellus">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!--Catalog item-->
                    <div class="col-auto text-center item-card bg-white my-3 mx-auto">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item3.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0 marcellus">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex marcellus">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!--Catalog item-->
                    <div class="col-auto text-center item-card bg-white my-3 mx-auto">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item4.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0 marcellus">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex marcellus">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!--Catalog item-->
                    <div class="col-auto text-center item-card bg-white my-3 mx-auto">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item5.png') }}" class="mx-auto mb-3"
                                 style="width:150px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0 marcellus">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex marcellus">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>

                    <!--Catalog item-->
                    <div class="col-auto text-center item-card bg-white my-3 mx-auto">
                        <div class="bg-secondary p-2">
                            <div class="d-flex">
                                <div class="me-auto"><i data-feather="heart"></i></div>
                                <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                            </div>
                            <img src="{{ asset('assets/catalogs/item6.png') }}" class="mx-auto mb-3"
                                 style="width:200px;height:150px;" alt="" srcset="">
                        </div>
                        <div class="p-2">
                            <p class="text-primary m-0 marcellus">STYLISH SILVER EARRINGS</p>
                            <small class="text-primary inter fw-lighter">Women | Earrings</small>
                            <br><br>
                            <div class="d-flex marcellus">
                                <div class="me-auto text-primary">₹ 6000</div>
                                <div class="ms-auto">Explore<i data-feather="chevron-right"></i></div>
                            </div>
                        </div>
                    </div>




                </div>
                <!--Listing ENDS-->

                <nav >
                    <ul class="pagination justify-content-center fw-bold mt-5">
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Previous">
                                <i data-feather="arrow-left" stroke-width="2"></i>
                            </a>
                        </li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">4</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#">...</a></li>
                        <li class="page-item"><a class="page-link" href="#">10</a></li>
                        <li class="page-item">
                            <a class="page-link" href="#" aria-label="Next">
                                <i data-feather="arrow-right" stroke-width="2"></i>
                            </a>
                        </li>
                    </ul>
                </nav>

            </div>
        </div>
    </div>
    <!-- Browse section ENDS-->
@endsection
