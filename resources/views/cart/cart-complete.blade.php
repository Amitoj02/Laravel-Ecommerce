@extends('cart.cart')

@section('page-title', 'Order Completed!')
@section('page-header', 'Complete!')

@section('tab-content')
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
@endsection
