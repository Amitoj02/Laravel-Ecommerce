@extends('layouts.app')
@section('page-title', 'Order Completed')

@section('header-content')
@endsection

@section('content')
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center p-5 inter">
                <h1 class="text-primary mb-5">Complete!</h1>
                <div class="row step-wizard justify-content-center gap-5">
                    <div class="col-3 step step-finished d-flex">
                        <div class="step-num">
                            <p>1</p>
                        </div>
                        <p class="step-title">Shopping Cart</p>
                    </div>

                    <div class="col-3 step step-finished d-flex">
                        <div class="step-num">
                            <p>2</p>
                        </div>
                        <p class="step-title">Checkout Details</p>
                    </div>

                    <div class="col-3 step step-active d-flex">
                        <div class="step-num">
                            <p>3</p>
                        </div>
                        <p class="step-title">Order Complete</p>
                    </div>
                </div>

                <div class="row justify-content-center">
                    <div class="col-md-9 shadow bg-white rounded mt-5 p-5">
                        <p class="fs-4 text-info-dark mb-2">Thank You!🎉</p>
                        <p class="fs-3 fw-bold">Your order has been received</p>
                        <div class="row justify-content-center gap-3">
                            <div class="col-auto text-center position-relative">
                                <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                                <span class="position-absolute translate-middle badge rounded-pill bg-primary">1</span>
                            </div>
                            <div class="col-auto text-center position-relative">
                                <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                                <span class="position-absolute translate-middle badge rounded-pill bg-primary">1</span>
                            </div>
                            <div class="col-auto text-center position-relative">
                                <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                                <span class="position-absolute translate-middle badge rounded-pill bg-primary">1</span>
                            </div>
                        </div>
                        <table class="mx-auto my-5 fw-bold">
                            <tr >
                                <td class="text-info-dark p-2">Order code: </td>
                                <td class="text-primary p-2">#0123_4567</td>
                            </tr>
                            <tr>
                                <td class="text-info-dark p-2">Date: </td>
                                <td class="text-primary p-2">October 19, 2023</td>
                            </tr>
                            <tr>
                                <td class="text-info-dark p-2">Total: </td>
                                <td class="text-primary p-2">Rs 25,000.00</td>
                            </tr>
                            <tr>
                                <td class="text-info-dark p-2">Payment Method: </td>
                                <td class="text-primary p-2">Credit Cash</td>
                            </tr>
                        </table>

                        <div class="btn btn-secondary-classic py-3 px-4 rounded-5">Track your Order</div>

                    </div>
                </div>


            </div>
        </div>
    </div>
@endsection
