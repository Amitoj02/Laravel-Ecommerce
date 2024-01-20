@extends('layouts.app')

{{--Already Done by the child sections--}}
{{--@section('page-title', '')--}}

@section('header-content')
@endsection

@section('content')
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center p-5 inter">
                <h1 class="text-primary mb-5">@yield('page-header')</h1>
                <div class="row step-wizard justify-content-center gap-5">
                    <a class="col-3 step d-flex text-decoration-none">
                        <div class="step-num">
                            <p>1</p>
                        </div>
                        <p class="step-title">Shopping Cart</p>
                    </a>

                    <a class="col-3 step {{ Request::is('quote/details') ? 'step-active' : '' }} d-flex text-decoration-none" >
                        <div class="step-num">
                            <p>2</p>
                        </div>
                        <p class="step-title">Quote Details</p>
                    </a>

                    <a class="col-3 step  {{ Request::is('quote/complete') ? 'step-active' : 'disabled' }} d-flex text-decoration-none">
                        <div class="step-num">
                            <p>3</p>
                        </div>
                        <p class="step-title">Complete</p>
                    </a>
                </div>

                <!--Tab content STARTS-->
                @yield('tab-content')
                <!--Tab content ENDS-->

            </div>
        </div>
    </div>
@endsection
