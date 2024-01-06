@extends('cart.cart')

@section('page-title', 'Cart - Swarn Abhishek')
@section('page-header', 'Check Out')

@section('tab-content')
    <div class="row mt-5 justify-content-center gap-5">
        <div class="col-7">
            <div class="border border-1 border-black rounded-1 text-start p-4 mb-4 bg-white">
                <p class="fs-5">Contact Information</p>
                <div class="row">
                    <div class="col form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                               placeholder="First Name">
                        <label for="floatingInput" class="ms-2">First Name</label>
                    </div>
                    <div class="col form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                               placeholder="Last Name">
                        <label for="floatingInput" class="ms-2">Last Name</label>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput"
                           placeholder="Phone number">
                    <label for="floatingInput">Phone number</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput"
                           placeholder="Email address">
                    <label for="floatingInput">Email address</label>
                </div>
            </div>

            <div class="border border-1 border-black rounded-1 text-start p-4 mb-4 bg-white">
                <p class="fs-5">Shipping Address</p>

                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput"
                           placeholder="Phone number">
                    <label for="floatingInput">Street Address</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="text" class="form-control" id="floatingInput"
                           placeholder="Town / City">
                    <label for="floatingInput">Town / City</label>
                </div>
                <div class="form-floating mb-3">
                    <input type="email" class="form-control" id="floatingInput" placeholder="Country"
                           value="India" disabled>
                    <label for="floatingInput">Country</label>
                </div>
                <div class="row">
                    <div class="col form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="State">
                        <label for="floatingInput" class="ms-2">State</label>
                    </div>
                    <div class="col form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                               placeholder="Postal Code">
                        <label for="floatingInput" class="ms-2">Postal Code</label>
                    </div>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked">
                    <label class="form-check-label text-info" for="flexCheckChecked">
                        Use a different billing address (optional)
                    </label>
                </div>

            </div>
            <div class="d-grid">
                <button class="btn btn-secondary-classic btn-lg">Proceed to Pay</button>
            </div>

        </div>

        <div class="col-4">
            <div class="border border-1 border-black rounded-1 text-start p-4 mb-4">
                <p class="fs-5">Shipping Address</p>
                <div class="inter">

                    <div class="row my-3">
                        <div class="col-auto text-center">
                            <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="60px">
                        </div>
                        <div class="col-8 align-self-center">
                            <p class="m-0 align-middle fw-bold p-1">Engagement Ring</p>
                            <p class="m-0 align-middle p-1"><b>1</b> x Rs.25,000.00</p>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-auto text-center">
                            <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="60px">
                        </div>
                        <div class="col-8 align-self-center">
                            <p class="m-0 align-middle fw-bold p-1">Engagement Ring</p>
                            <p class="m-0 align-middle p-1"><b>1</b> x Rs.25,000.00</p>
                        </div>
                    </div>

                    <div class="row my-3">
                        <div class="col-auto text-center">
                            <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png')}}" width="60px">
                        </div>
                        <div class="col-8 align-self-center">
                            <p class="m-0 align-middle fw-bold p-1">Engagement Ring</p>
                            <p class="m-0 align-middle p-1"><b>1</b> x Rs.25,000.00</p>
                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <p class="col">Shipping</p>
                        <p class="col fw-bolder ms-3 text-primary text-end">FREE<p>
                    </div>
                    <hr class="mt-0">
                    <div class="row">
                        <p class="col">Subtotal</p>
                        <p class="col fw-bolder ms-3 text-primary text-end">Rs. 520,000.00</p>
                    </div>
                    <hr class="mt-0">
                    <div class="row">
                        <p class="col fs-5 fw-bolder">Total</p>
                        <p class="col fw-bolder ms-3 text-primary text-end">Rs. 520,000.00</p>
                    </div>
                    <div class="d-grid">
                        <button class="btn btn-secondary-classic btn-lg">Proceed to Pay</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
