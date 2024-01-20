@extends('quote.quote')

@section('page-title', 'Cart - Swarn Abhishek')
@section('page-header', 'Quote Details')

@section('tab-content')
    <div class="row mt-5 justify-content-center gap-5">
        <div class="col-7">
            <form method="post" action="{{route('quote-details-submit')}}">
                @csrf
                <div class="border border-1 border-black rounded-1 text-start p-4 mb-4 bg-white">
                    <p class="fs-5">Contact Information</p>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txt_name" name="recipient_name"
                               placeholder="Full Name" value="{{ old('recipient_name') ? old('recipient_name') : Auth::user()->name . ' ' . Auth::user()->surname }}" required>
                        <label for="txt_name">Full Name</label>
                        <x-input-error :messages="$errors->get('recipient_name')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txt_phone_number" name="phone_number"
                               placeholder="Phone number" value="{{ old('phone_number') ? old('phone_number') : Auth::user()->phone_number }}" required>
                        <label for="txt_phone_number" >Phone number</label>
                        <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="txt_email" name="email"
                               placeholder="Email address" value="{{ old('email') ? old('email') : Auth::user()->email }}" required>
                        <label for="txt_email">Email address</label>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>
                </div>

                <div class="border border-1 border-black rounded-1 text-start p-4 mb-4 bg-white">
                    <p class="fs-5">Message (Optional)</p>
                    <textarea type="text" class="form-control mb-3" id="txt_message" name="message"
                              placeholder="Write your message here..." style="height:150px;">{{ old('message') }}</textarea>
                    <x-input-error :messages="$errors->get('message')" class="mt-2" />
                </div>

                <div class="border border-1 border-black rounded-1 text-start p-4 mb-4 bg-white">
                    <p class="fs-5">Address (Optional)</p>

                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txt_street_address" name="address_street" value="{{ old('address_street') }}"
                               placeholder="Street Address">
                        <label for="floatingInput">Street Address</label>
                        <x-input-error :messages="$errors->get('address_street')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txt_city" name="address_city" value="{{ old('address_city') }}"
                               placeholder="Town / City">
                        <label for="floatingInput">Town / City</label>
                        <x-input-error :messages="$errors->get('address_city')" class="mt-2" />
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="txt_country" placeholder="Country"
                               value="India" disabled>
                        <label for="txt_country">Country</label>
                    </div>
                    <div class="row">
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="txt_state" name="address_state" placeholder="State" value="{{ old('address_state') }}">
                            <label for="txt_state" class="ms-2">State</label>
                            <x-input-error :messages="$errors->get('address_state')" class="mt-2" />
                        </div>
                        <div class="col form-floating mb-3">
                            <input type="text" class="form-control" id="txt_postalcode" name="address_code" value="{{ old('address_code') }}"
                                   placeholder="Postal Code">
                            <label for="txt_postalcode" class="ms-2">Postal Code</label>
                            <x-input-error :messages="$errors->get('address_code')" class="mt-2" />
                        </div>
                    </div>
                </div>

                <div class="d-grid">
                    <input type="submit" id="btn_quote_submit" class="btn btn-secondary-classic btn-lg" value="Request Quote">
                </div>
            </form>
        </div>

        <div class="col-4">
            <div class="border border-1 border-black rounded-1 text-start p-4 mb-4">
                <p class="fs-5">Your Cart</p>
                <div class="inter">

                    @foreach($cartItems as $cartItem)
                        <div class="row my-3">
                            <div class="col-auto text-center">
                                <img class="cart-item-img" src="{{ asset('storage/' . $cartItem->catalog->banner) }}" width="60px">
                            </div>
                            <div class="col align-self-center">
                                <p class="m-0 align-middle fw-bold p-1">{{$cartItem->catalog->title}}</p>
                                <p class="m-0 align-middle p-1">Quantity: <b>{{$cartItem->quantity}}</b></p>
                                <p class="p-1 small text-info">{{$cartItem->message}}</p>
                            </div>
                        </div>
                    @endforeach
                    <hr>
                    <div class="d-grid">
                        <button class="btn btn-secondary-classic btn-lg" onclick="document.getElementById('btn_quote_submit').click();">Request Quote</button>
                    </div>

                </div>
            </div>
        </div>
    </div>
@endsection
