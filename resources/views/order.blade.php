@extends('layouts.app')
@section('page-title', 'Track Order - Swaran Abhishek')

{{--@section('header-content')--}}
{{--@endsection--}}

@section('content')
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center p-5 inter mx-md-5">
                <div class="mx-lg-5 px-lg-5">
                    <div class="d-flex">
                        <p class="my-auto text-primary fw-bold fs-5">Order ID: 334654654526</p>
                        <div class="btn btn-secondary-classic my-auto ms-auto">Invoice <i
                                class="fa fa-file-text-o"></i></div>
                    </div>
                    <div class="d-flex gap-3 my-3">
                        <p class="my-auto">
                            <small class="text-info-dark">Order Date:</small>
                            <b>Feb 16, 2022</b>
                        <div class="vr"></div>
                        <i class="fa fa-truck my-auto" aria-hidden="true" style="color:#12B76A;"></i>
                        <b style="color:#12B76A;">Estimated delivery: May 16, 2022</b>
                        </p>
                    </div>
                    <hr class="my-5">

                    <div class="row mb-4">
                        <div class="col-auto text-center">
                            <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                        </div>
                        <div class="col align-self-center text-start">
                            <p class="m-0 align-middle text-primary fw-bold p-1">Engagement Ring</p>
                            <div class="m-0 align-middle p-1">
                                Floral Red | Diamond | 26 Carat
                            </div>
                        </div>
                        <div class="col-auto align-self-center text-start">
                            <p class="m-0 align-middle text-primary fw-bold px-1">Rs. 25,000.00</p>
                            <div class="m-0 align-middle px-1">
                                Qty: 1
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-auto text-center">
                            <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                        </div>
                        <div class="col align-self-center text-start">
                            <p class="m-0 align-middle text-primary fw-bold p-1">Engagement Ring</p>
                            <div class="m-0 align-middle p-1">
                                Floral Red | Diamond | 26 Carat
                            </div>
                        </div>
                        <div class="col-auto align-self-center text-start">
                            <p class="m-0 align-middle text-primary fw-bold px-1">Rs. 25,000.00</p>
                            <div class="m-0 align-middle px-1">
                                Qty: 1
                            </div>
                        </div>
                    </div>

                    <div class="row mb-4">
                        <div class="col-auto text-center">
                            <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                        </div>
                        <div class="col align-self-center text-start">
                            <p class="m-0 align-middle text-primary fw-bold p-1">Engagement Ring</p>
                            <div class="m-0 align-middle p-1">
                                Floral Red | Diamond | 26 Carat
                            </div>
                        </div>
                        <div class="col-auto align-self-center text-start">
                            <p class="m-0 align-middle text-primary fw-bold px-1">Rs. 25,000.00</p>
                            <div class="m-0 align-middle px-1">
                                Qty: 1
                            </div>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row mb-4 text-start">
                        <div class="col-md-6">
                            <p class="text-primary fw-bold">Payment</p>
                            <p><small class="text-info-dark">Visa **56 &nbsp;</small><i class="fa fa-cc-visa"></i></p>
                        </div>
                        <div class="col-md-6">
                            <p class="text-primary fw-bold">Delivery</p>
                            <small class="text-info">Address</small>
                            <p class="text-info-dark">847 Jewess Bridge Adt,<br>174 London, UK<br>474-769-3919</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row mb-4 text-start">
                        <div class="col-md-6">
                            <p class="text-primary fw-bold">Need Help</p>
                            <a class="text-info-dark text-decoration-none mb-2 d-block" href="#"><i class="fa fa-exclamation-circle"></i> Order Issues <i class="fa fa-external-link"></i></a>
                            <a class="text-info-dark text-decoration-none mb-2 d-block" href="#"><i class="fa fa-truck"></i> Delivery Info <i class="fa fa-external-link"></i></a>
                            <a class="text-info-dark text-decoration-none mb-2 d-block" href="#"><i class="fa fa-cube"></i> Returns <i class="fa fa-external-link"></i></a>
                        </div>
                        <div class="col-md-6">
                            <p class="text-primary fw-bold">Order Summary</p>
                            <div class="text-info-dark">
                                <div class="row fw-bold">
                                    <p class="col me-auto mb-2">Subtotal</p>
                                    <p class="col text-end mb-2">Rs 2000</p>
                                </div>
                                <div class="row">
                                    <p class="col me-auto mb-2">Discount</p>
                                    <p class="col text-end mb-2">(10%) - Rs 200</p>
                                </div>
                                <div class="row">
                                    <p class="col me-auto mb-2">Delivery</p>
                                    <p class="col text-end mb-2">Rs 0.00</p>
                                </div>
                                <div class="row mb-2">
                                    <p class="col me-auto mb-2">Tax</p>
                                    <p class="col text-end mb-2">+Rs 500.00</p>
                                </div>
                                <hr>
                                <div class="row fw-bold">
                                    <p class="col me-auto mb-2">Total</p>
                                    <p class="col text-end mb-2 text-black">Rs 75000.00</p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
