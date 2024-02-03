@extends('layouts.app')
@section('page-title', 'Swarn Abhishek &bull; ' . htmlspecialchars($catalog->title))

@section('meta-tags')
    <meta name="name"        content="Swarn Abhishek &bull; {{$catalog->title}}">
    <meta name="description" content="{{ $catalog->introduction }}">
    <meta name="keywords"    content="Swarn, Abhishek, Swaran Abhishek, {{$catalog->title}}">
    <meta name="theme-color" content="#0A3A3A">

    <meta property="og:type"        content="article">
    <meta property="og:title"       content="Swarn Abhishek &bull; {{$catalog->title}}">
    <meta property="og:url"         content="{{ route('catalog', ['product_code' => $catalog->product_code]) }} ">
    <meta property="og:image"       content="{{ asset('storage/' . $catalog->banner) }}">
    <meta property="og:description" content="{{ $catalog->introduction }}">

@endsection

{{--@section('header-content')--}}
{{--@endsection--}}

@section('content')
    <!-- Info section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container px-lg-5 py-5 inter">
                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col">
                        <!--Product gallery-->
                        <div class="slider-galeria-thumbs">
                            @foreach($catalog->images as $image)
                                <div><span class="p-2"><img src="{{ asset('storage/' . $image) }}" height="55px" class="m-auto"></span></div>
                            @endforeach
                        </div>

                        <div class="slider-galeria mb-5">
                            @foreach($catalog->images as $image)
                                <div><span class="p-5"><img src="{{ asset('storage/' . $image) }}" width="100%" class="m-auto"></span></div>
                            @endforeach
                        </div>
                    </div>

                    <div class="col">
                        <!--Product Titles-->
                        <div class="d-flex text-primary px-2">
                            <p class="fs-2 mb-0">{{$catalog->title}}</p>
                            <livewire:wishlist-catalog :$catalog/>
                        </div>

                        <a class="d-flex text-decoration-none" href="#tabs-section" onclick="document.getElementById('pills-tab-reviews').click()">
                            <div class="p-2 fs-5" style="color:#FFC700;">
                                @for($i = 0; $i < 5; $i++)
                                    @if($averageStars > $i)
                                        <i class="fa fa-star"></i>
                                    @else
                                        <i class="fa fa-star-o"></i>
                                    @endif
                                @endfor
                            </div>
                            <div class="vr my-1 text-primary"></div>
                            <p class="text-info mx-0 my-auto small p-2">{{ $reviews->count() }} Customer Review</p>

                        </a>

                        <p class="small p-2">{{$catalog->introduction}}</p>
                        <div class="pb-2">
                            @guest
                            <div class="d-grid gap-2 col-6 mb-3">
                                <div class="btn btn-secondary-classic mx-2 px-4" type="button" onclick="document.getElementById('nav-profile-icon').click()">Get Quote</div>
                            </div>
                            @endguest

                            @auth
                            <form method="post" action="{{ route('addToCart', ['product_code' => $catalog->product_code]) }}" class="px-2">
                                @csrf
                                <input type="hidden" name="catalog_id" value="{{$catalog->id}}">
                                <div class="form-floating mb-3">
                                    <textarea class="form-control" placeholder="Leave a comment here" name="message" id="txt_comment" style="height: 100px"></textarea>
                                    <label class=" text-info" for="txt_comment">Write here for customization (Optional): </label>
                                </div>
                                <div class="row align-items-center">
                                    <div class="col-6 shop-quantity p-0 pe-3">
                                        <span class="sign minus">-</span>
                                        <input type="number" class="form-control" id="quantity" name="quantity" placeholder="Quantity"
                                               value="1">
                                        <span class="sign plus">+</span>
                                    </div>
                                    <input class="col-6 btn btn-secondary-classic" type="submit" value="Add To Cart">
                                    <x-input-error :messages="$errors->get('cart')" class="mt-2"/>
                                </div>
                            </form>
                            @endauth
                        </div>

                        @if(Session::get('item_added') === true)
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                The item was added in cart! <a href="#" onclick="document.getElementById('nav-cart-icon').click()">click here</a> to open the cart!
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

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

                <div class="container px-lg-5" id="tabs-section">
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
                                    aria-selected="false">Reviews [{{ $reviews->count() }}]</button>
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

                            <div class="row row-cols-1 justify-content-center">

                                @auth
                                <!--Review Form-->
                                <div class="col-lg-8 rounded shadow px-3 py-3 mx-lg-3 my-3">
                                    <div class="text-center">

                                        <h3 class="text-primary mb-2">Write Review</h3>
                                        <p class="mb-0">Please tell us about your experience with the product.</p>
                                        <div class="p-2 fs-2" style="color:#FFC700;" id="rating_bar">
                                            <i class="fa fa-star-o" onclick="rb(1)"></i>
                                            <i class="fa fa-star-o" onclick="rb(2)"></i>
                                            <i class="fa fa-star-o" onclick="rb(3)"></i>
                                            <i class="fa fa-star-o" onclick="rb(4)"></i>
                                            <i class="fa fa-star-o" onclick="rb(5)"></i>
                                        </div>
                                    </div>
                                    <form method="post" action="{{ route('addReview', ['product_code' => $catalog->product_code]) }}">
                                        @csrf

                                        <input type="hidden" id="form_review_star" name="star" value="5" autocomplete="off">
                                        <input type="hidden" name="catalog_id" value="{{$catalog->id}}" autocomplete="off">

                                        <div class="form-floating mb-3">
                                            <input type="text" class="form-control" id="review_title" name="title" value="{{ old('title') ? old('title') : $userReview->title }}" placeholder="Review Title">
                                            <label for="review_title">Review title</label>
                                            <x-input-error :messages="$errors->review->get('title')" class="mt-2"/>
                                        </div>
                                        <div class="form-floating">
                                            <textarea class="form-control" placeholder="Review Message" id="review_message" name="message" style="height: 100px">{{ old('message') ? old('message') : $userReview->message }}</textarea>
                                            <label for="review_message">Review Message</label>
                                            <x-input-error :messages="$errors->review->get('star')" class="mt-2"/>
                                            <x-input-error :messages="$errors->review->get('message')" class="mt-2"/>
                                        </div>
                                        <div class="d-grid col-5 mx-auto mt-3">
                                            <button class="btn btn-secondary-classic"><i class="fa fa-pencil-square-o"></i> Write Review</button>
                                        </div>
                                    </form>
                                </div>
                                @endauth

                                @guest
                                    <div class="alert alert-light alert-dismissible fade show" role="alert">
                                        You will need to <a href="#" onclick="showLogin()">login</a> for writing a review.
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endguest

                                @foreach($reviews as $review)
                                    <div class="col rounded border p-3 mx-lg-3 my-3">
                                        <div class="row">
                                            <div class="col-auto align-self-center">
                                                <img src="{{ asset('assets/sample-avatar.png') }}" class="rounded-circle" width="55px">
                                            </div>
                                            <div class="col p-0 align-self-center">
                                                <p class="fw-bold m-1">{{ $review->user->name }}</p>
                                                <p class="text-info m-1">{{ $review->updated_at->diffForHumans() }}</p>
                                            </div>
                                        </div>

                                        <div class="d-flex">
                                            <div class="p-2 fs-5" style="color:#FFC700;">
                                                @for($i = 0; $i < 5; $i++)
                                                    @if($review->star > $i)
                                                        <i class="fa fa-star"></i>
                                                    @else
                                                        <i class="fa fa-star-o"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                        <p class="fw-bold mb-2">{{ $review->title }}</p>
                                        <p class="">{{ $review->message }}</p>
                                    </div>
                                @endforeach


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
                            <x-catalog :catalog="$relatedCatalog"/>
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
