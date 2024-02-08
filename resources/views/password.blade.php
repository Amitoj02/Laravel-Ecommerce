@extends('layouts.app')
@section('page-title', 'Update Password - Swarn Abhishek')
{{--@section('header-content')--}}
{{--@endsection--}}

@section('content')
    <!-- Info section STARTS-->
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container p-5 inter">

                <h1 class="text-primary text-center">Update Password</h1>
                <form method="post" action="{{ route('password.update', ['token' => $token]) }}"  class="inter">
                    @csrf
                    <input type="hidden" name="token" value="{{ $token }}">
                    <div class="row">
                        <div class="col-md-6 offset-md-3 form-floating my-2 ">
                            <input type="email" class="form-control" id="txt_email" name="email" value="{{ old('email') }}" placeholder="Email">
                            <label for="txt_email" class="ms-2">Email</label>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                        <div class="col-md-6 offset-md-3 form-floating my-2">
                            <input type="password" class="form-control" id="txt_password" name="password" placeholder="Password">
                            <label for="txt_password" class="ms-2">Password</label>
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="col-md-6 offset-md-3 form-floating my-2 mb-5">
                            <input type="password" class="form-control" id="txt_confirm_password" name="password_confirmation" placeholder="Confirm Password">
                            <label for="txt_confirm_password" class="ms-2">Confirm Password</label>
                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>
                    <input class="btn btn-outline-secondary btn-lg d-grid gap-2 col-6 col-lg-4 mx-auto" type="submit" value="Update">
                </form>
            </div>
        </div>
    </div>
@endsection
