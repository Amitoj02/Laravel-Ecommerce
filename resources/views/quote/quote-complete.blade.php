@extends('quote.quote')

@section('page-title', 'Quote Completed!')
@section('page-header', 'Complete!')

@section('tab-content')
    <div class="row justify-content-center">
        <div class="col-md-9 shadow bg-white rounded mt-5 p-5">
            <p class="fs-4 text-info-dark mb-2">Thank You!🎉</p>
            <p class="fs-3 fw-bold mb-2">Your requirements have been received</p>
            <p class="text-info mb-5">A team member will be in contact with you regarding the quote, thank you for your patience.</p>
            <div class="row justify-content-center gap-3">
                @foreach($order->cartItems as $cartItem)
                    <div class="col-auto text-center position-relative">
                        <img class="cart-item-img" src="{{ asset('storage/'.$cartItem->catalog->banner) }}" width="80px">
                        <span class="position-absolute translate-middle badge rounded-pill bg-primary">{{ $cartItem->quantity }}</span>
                    </div>
                @endforeach
            </div>
            <table class="mx-auto my-5 fw-bold">
                <tr>
                    <td class="text-info-dark p-2">Quote ID:</td>
                    <td class="text-primary p-2">#{{$order->id}}</td>
                </tr>
                <tr>
                    <td class="text-info-dark p-2">Date:</td>
                    <td class="text-primary p-2">{{$order->created_at}}</td>
                </tr>
                <tr>
                    <td class="text-info-dark p-2">Email:</td>
                    <td class="text-primary p-2">{{ $order->email }}</td>
                </tr>
                <tr>
                    <td class="text-info-dark p-2">Phone number:</td>
                    <td class="text-primary p-2">{{ $order->phone_number }}</td>
                </tr>
            </table>

            <div class="btn btn-secondary-classic py-3 px-4 rounded-5">Contact Us</div>

        </div>
    </div>
@endsection
