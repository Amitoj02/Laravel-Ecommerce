@extends('layouts.app')
@section('page-title', 'Profile - Swarn Abhishek')
@section('header-content')
@endsection

@section('content')
    <!-- Info section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container p-5 inter">

{{--                <div class="alert alert-warning" role="alert">--}}
{{--                    Your account email is not verified, click here to resubmit the verification email.--}}
{{--                </div>--}}

{{--                <div class="alert alert-success" role="alert">--}}
{{--                    A verification link has been sent to your email.--}}
{{--                </div>--}}

                @if(Session::get('updated') === true)
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        The profile was updated!
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <h1 class="text-primary text-center">Update Profile</h1>
                <form method="post" action="{{ route('profile-update') }}"  class="inter">
                    @csrf
                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col form-floating my-2">
                            <input type="text" class="form-control" id="txt_name" name="name" value="{{ old('name') ? old('name') : Auth::user()->name }}" placeholder="Name">
                            <label for="txt_name" class="ms-2">Name</label>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="col form-floating my-2">
                            <input type="text" class="form-control" id="txt_surname" name="surname" value="{{ old('surname') ? old('surname') : Auth::user()->surname }}" placeholder="Surname">
                            <label for="txt_surname" class="ms-2">Surname</label>
                            <x-input-error :messages="$errors->get('surname')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-lg-2">
                        <div class="col form-floating my-2">
                            <input type="email" class="form-control" id="txt_email" name="email" value="{{ Auth::user()->email }}" placeholder="Email" disabled>
                            <label for="txt_email" class="ms-2">Email</label>
                        </div>
                        <div class="col form-floating my-2 mb-2">
                            <input type="text" class="form-control" id="txt_phone" name="phone_number" value="{{ old('phone_number') ? old('phone_number') : Auth::user()->phone_number }}" placeholder="Phone">
                            <label for="txt_phone" class="ms-2">Phone</label>
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="col form-floating my-2 mb-5">
                            <input type="text" class="form-control" id="txt_address" name="address" value="{{ old('address') ? old('address') : Auth::user()->address }}" placeholder="Address">
                            <label for="txt_address">Address</label>
                            <x-input-error :messages="$errors->get('address')" class="mt-2" />
                        </div>
                    </div>
                    <input class="btn btn-outline-secondary btn-lg d-grid gap-2 col-6 col-lg-4 mx-auto" type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
