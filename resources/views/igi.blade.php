@extends('layouts.app')
@section('page-title', 'IGI - Swarn Abhishek')
@section('header-content')
    <div class="text-center pb-5">
        <h1 class="p-5 mt-5" style="font-size: 4rem;">Diamond Decoded</h1>
        <h3 class="p-5">
            A Comprehensive Guide to Informed Diamond Purchases
        </h3>
        <div class="scroll-downs mx-auto my-4">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div>
        <div class="container text-center p-5">
            <h2 class="text-primary">DIAMOND GRADING CHART</h2>
            <a href="{{ asset('assets/docs/igi_diamond_grading.pdf') }}" target="_blank" class="btn btn-primary my-3">Download PDF</a>
            <img src="{{ asset('assets/igi_chart_preview.png') }}" width="100%"/>
        </div>
    </div>
@endsection
