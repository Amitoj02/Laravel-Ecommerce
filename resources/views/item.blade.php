@extends('layouts.app')
@section('page-title', 'Catalog - Swarn Abhishek')

@section('header-content')
@endsection

@section('content')
    <!-- Info section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container p-5 inter">
                <div class="row">
                    <div class="col-6">
                        <!--Product gallery-->
                        <div class="slider-galeria-thumbs">
                            @foreach($catalog->images as $image)
                                <div><span class="p-2"><img src="{{ asset('storage/' . $image) }}" height="55px" class="m-auto"></span></div>
                            @endforeach
                        </div>

                        <div class="slider-galeria">
                            @foreach($catalog->images as $image)
                                <div><span class="p-5"><img src="{{ asset('storage/' . $image) }}" width="100%" class="m-auto"></span></div>
                            @endforeach
                        </div>
                    </div>
                    <div class="col-6">
                        <!--Product Titles-->
                        <p class="mb-1 fs-2">{{$catalog->title}}</p>
{{--                        <p class="mb-1 text-info fs-5">Rs. 250,000.00</p>--}}
                        <div class="d-flex">
                            <div class="p-2 fs-5" style="color:#FFC700;">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-o"></i>
                            </div>
                            <div class="vr my-1"></div>
                            <p class="text-info mx-0 my-auto small p-2">5 Customer Review</p>
                        </div>

                        <p class="small">{{$catalog->introduction}}</p>
                        <div class="row align-items-center pb-2">
                            <div class="col-4 shop-quantity">
                                <span class="sign minus">-</span>
                                <input type="number" class="form-control" id="quantity" placeholder="Quantity"
                                       value="1">
                                <span class="sign plus">+</span>
                            </div>
                            <div class="col-5 btn btn-outline-secondary">Add To Cart</div>
                        </div>

                        <hr class="my-4">

                        <table class="shop-table text-info small">
                            <tr>
                                <td>No.</td>
                                <td>:</td>
                                <td>{{$catalog->product_code}}</td>
                            </tr>
                            <tr>
                                <td>Category</td>
                                <td>:</td>
                                <td>{{$catalog->type->name . ' (' . $catalog->gender . ')'}}</td>
                            </tr>
                            <tr>
                                <td>Material</td>
                                <td>:</td>
                                <td>{{$catalog->material . ' ' . $catalog->karat}}</td>
                            </tr>
                            <tr>
                                <td>Color</td>
                                <td>:</td>
                                <td>{{ucwords(str_replace('_', ' ', $catalog->color))}}</td>
                            </tr>
                            <tr>
                                <td>Share</td>
                                <td>:</td>
                                <td class="text-black fs-5">
                                    <i class="fa fa-facebook-square"></i>
                                    <i class="fa fa-instagram"></i>
                                    <i class="fa fa-whatsapp"></i>
                                </td>
                            </tr>
                        </table>
                    </div>
                </div>

                <hr class="mt-5 mb-4">

                <div class="container px-5">
                    <ul class="nav nav-pills shop-tabs justify-content-center my-3" id="pills-tab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="pills-tab-description" data-bs-toggle="pill"
                                    data-bs-target="#tab-description" type="button" role="tab"
                                    aria-controls="tab-description" aria-selected="true">Description</button>
                        </li>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="pills-tab-reviews" data-bs-toggle="pill"
                                    data-bs-target="#tab-reviews" type="button" role="tab" aria-controls="tab-reviews"
                                    aria-selected="false">Reviews [5]</button>
                        </li>
                    </ul>
                    <div class="tab-content p-3" id="pills-tabContent">
                        <!--Description Tab Section-->
                        <div class="tab-pane fade show active" id="tab-description" role="tabpanel"
                             aria-labelledby="pills-tab-description" tabindex="0">
                            <p class="text-info">{!!$catalog->description !!}</p>

{{--                            <div class="row shop-gallery text-center">--}}
{{--                                <div class="col">--}}
{{--                                    <img class="" src="{{ asset('assets/catalogs/item1.png') }}" height="200px">--}}
{{--                                </div>--}}
{{--                                <div class="col">--}}
{{--                                    <img src="{{ asset('assets/catalogs/item1.png') }}" height="200px">--}}
{{--                                </div>--}}
{{--                            </div>--}}

                        </div>

                        <!--Reviews Section-->
                        <div class="tab-pane fade" id="tab-reviews" role="tabpanel"
                             aria-labelledby="pills-tab-reviews" tabindex="0">

                            <div class="row row-cols-1">
                                <!--Review Item-->
                                <div class="col rounded border p-3 m-3">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <img src="{{ asset('assets/sample-avatar-1.png') }}" class="rounded-circle" width="55px">
                                        </div>
                                        <div class="col p-0 align-self-center">
                                            <p class="fw-bold m-1">Amitoj Singh</p>
                                            <p class=" text-info m-1">2 Month ago</p>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="p-2 fs-5" style="color:#FFC700;">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <p class="fw-bold mb-2">Review Title Here</p>
                                    <p class="">And I absolutely mean it what I said in Headline of my comment. I have been following coach.com from very long. His one article has absolutely changed my life, imagine what this book can offer to you.</p>
                                </div>

                                <div class="col rounded border p-3 m-3">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <img src="{{ asset('assets/sample-avatar-1.png') }}" class="rounded-circle" width="55px">
                                        </div>
                                        <div class="col p-0 align-self-center">
                                            <p class="fw-bold m-1">Amitoj Singh</p>
                                            <p class=" text-info m-1">2 Month ago</p>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="p-2 fs-5" style="color:#FFC700;">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <p class="fw-bold mb-2">Review Title Here</p>
                                    <p class="">And I absolutely mean it what I said in Headline of my comment. I have been following coach.com from very long. His one article has absolutely changed my life, imagine what this book can offer to you.</p>
                                </div>

                                <div class="col rounded border p-3 m-3">
                                    <div class="row">
                                        <div class="col-auto align-self-center">
                                            <img src="{{ asset('assets/sample-avatar-1.png') }}" class="rounded-circle" width="55px">
                                        </div>
                                        <div class="col p-0 align-self-center">
                                            <p class="fw-bold m-1">Amitoj Singh</p>
                                            <p class=" text-info m-1">2 Month ago</p>
                                        </div>
                                    </div>

                                    <div class="d-flex">
                                        <div class="p-2 fs-5" style="color:#FFC700;">
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </div>
                                    </div>
                                    <p class="fw-bold mb-2">Review Title Here</p>
                                    <p class="">And I absolutely mean it what I said in Headline of my comment. I have been following coach.com from very long. His one article has absolutely changed my life, imagine what this book can offer to you.</p>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

                <hr class="mt-3">
                <!--Related Items STARTS-->
                <div class="text-center marcellus">
                    <h1 class="text-primary mt-5">Related Items</h1>
                    <p class="text-info small">More items like you were exploring similar to your taste</p>

                    <div class="owl-carousel p-4 ">

                        <!--Items-->
                        @foreach($relatedCatalogs as $relatedCatalog)
                            <a href="{{route('catalog', ['product_code' => $relatedCatalog->product_code])}}" onmouseover="checkOverflow(this)" class="d-block text-decoration-none item-card text-center bg-white my-3">
                                <div class="bg-secondary p-2">
                                    <div class="d-flex text-primary">
                                        <div class="me-auto"><i data-feather="heart"></i></div>
                                        <div class="ms-auto"><i data-feather="shopping-bag"></i></div>
                                    </div>
                                    <img src="{{ asset( 'storage/'.$relatedCatalog->banner ) }}" class="mx-auto mb-3"
                                         style="width:150px;height:150px;" alt="" srcset="">
                                </div>
                                <div class="p-3 overflow-hidden" >
                                    <p class="text-primary m-0 marcellus text-uppercase text-nowrap" >{{ $relatedCatalog->title }}</p>
                                    <small class="text-primary inter fw-lighter">{{ $relatedCatalog->gender . ' | ' . $relatedCatalog->type->name}}</small>
                                </div>
                            </a>
                        @endforeach

                    </div>

{{--                    <button class="btn btn-outline-secondary px-4">Show more</button>--}}

                </div>
                <!--Related Items ENDS-->

            </div>
        </div>
    </div>
    <!-- Info section ENDS-->
@endsection
