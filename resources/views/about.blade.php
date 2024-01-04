@extends('layouts.app')
@section('page-title', 'About - Swarn Abhishek')
@section('header-content')
    <div class="text-center pb-5">
        <h1 class="p-5 mt-5" style="font-size: 5rem;">Swarn Abhishek</h1>
        <h3 class="p-5">
            Elevating Elegance: A Legacy of Trustworthiness,<br>Affordability, and Authencity
        </h3>
        <div class="scroll-downs mx-auto my-4">
            <div class="mousey">
                <div class="scroller"></div>
            </div>
        </div>
    </div>
@endsection

@section('content')
    <div class="section-leaf1">
        <div class="section-leaf2">
            <div class="container text-center p-5">
                <h1 class="text-primary m-lg-5 p-lg-5" style="font-size: 4rem;">Our Core Values</h1>

                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col p-lg-5 mt-5">
                        <div class="outline-img mx-auto" style="width:fit-content">
                            <img src="{{ asset('assets/aboutus_1.png') }}" width="350px">
                        </div>
                    </div>
                    <div class="col text-start p-5 my-auto">
                        <h2 class="text-primary under-border-left mb-3">Trustworthy</h2>
                        <p class="text-info">
                            Trustworthiness is the cornerstone of our brand. We prioritize transparency and integrity in every aspect of our business. To instill confidence in our customers, we go the extra mile by providing IGI certification with every jewelry piece, offering a clear and objective assurance of quality and authenticity. Our commitment to ethical sourcing, responsible practices, and the highest craftsmanship standards further underscores our dedication to trust. With every purchase, customers experience the peace of mind that comes from knowing they've chosen a brand that consistently delivers on its promises, building a foundation of trust that lasts through generations.
                        </p>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col text-start p-5 my-auto">
                        <h2 class="text-primary under-border-left mb-3">Affordable</h2>
                        <p class="text-info">
                            We believe that exceptional jewelry shouldn't come with an extravagant price tag. Our commitment to affordability drives us to carefully source materials and optimize our production processes to offer competitive pricing without compromising on quality. We strive to make luxury accessible to all, ensuring that everyone can indulge in the beauty and elegance of fine jewelry without breaking their budget. Our dedication to affordability isn't just a promise; it's a pledge to empower our customers to express their unique style and celebrate life's moments with exquisite jewelry that doesn't strain their finances.
                        </p>
                    </div>
                    <div class="col p-lg-5 mt-5">
                        <div class="outline-img-right mx-auto" style="width:fit-content">
                            <img src="{{ asset('assets/aboutus_2.png') }}" width="350px">
                        </div>
                    </div>
                </div>

                <div class="row row-cols-1 row-cols-lg-2">
                    <div class="col p-lg-5 mt-5">
                        <div class="outline-img mx-auto" style="width:fit-content">
                            <img src="{{ asset('assets/aboutus_1.png') }}" width="350px">
                        </div>
                    </div>
                    <div class="col text-start p-5 my-auto">
                        <h2 class="text-primary under-border-left mb-3">Authentic</h2>
                        <p class="text-info">
                            We create jewelry that's not just beautiful but also true to the core. Each piece in our collection is a testament to genuine artistry, precision, and attention to detail. We don't just sell jewelry; we craft meaningful, authentic heirlooms that resonate with your unique identity. Our commitment to authenticity extends beyond design; it's a promise that every aspect of our jewelry, from materials to craftsmanship, aligns with our unwavering dedication to genuine expression. With us, you can be certain that you're acquiring jewelry that's as authentic as your individuality.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Our Core Value ENDS-->

    <!-- Why Choose Us STARTS-->
    <div class="bg-secondary py-2 px-sm-5 info-section">
        <div class="text-center mx-lg-5 px-lg-5 py-2">
            <h1 class="text-primary p-5">For Your Peace Of Mind</h1>
            <div class="row p-3">
                <div class="col">
                    <i data-feather="award" height="60px" width="60px" stroke-width="0.5"></i>
                    <p>Certified Jewellery</p>
                </div>
                <div class="col">
                    <i data-feather="sliders" height="60px" width="60px" stroke-width="0.5"></i>
                    <p>Lifetime Free Resizing</p>
                </div>
                <div class="col">
                    <i data-feather="heart" height="60px" width="60px" stroke-width="0.5"></i>
                    <p>Complimentary Aftercare</p>
                </div>
            </div>
        </div>
    </div>
    <!-- Why Choose Us ENDS-->

    <!--Visit us STARTS-->
    <div>
        <div class="container text-center py-5 px-sm-5 info-section">
            <p>V I S I T &nbsp;&nbsp; U S</p>
            <h1 class="text-primary" style="font-size: 3rem;">At Our Store</h1>
            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col text-start mt-5">
                    <h2 class="text-primary">Book An<br>Appointment</h2>
                    <p class="under-border-left"></p>
                    <p class="text-info">
                        Visit our store and experience the allure of fine craftsmanship in person. Explore our exquisite jewelry collections, each piece a testament to artistry and elegance. Discover the perfect jewelry piece that resonates with your style and story. Immerse yourself in a world of timeless beauty at our physical location.
                    </p>
                    <div class="my-5">
                        <b class="text-primary inter"><i class="me-2" data-feather="map-pin" stroke-width="2px"></i>B 67-0182, Sarafaan Bazaar, Batala-143505</b>
                    </div>
                    <button class="btn btn-outline-secondary">Directions &gt;</button>
                </div>
                <div class="col mt-5">
                    <img src="{{ asset('assets/map_point.png') }}" style="width:100%;">
                </div>
            </div>
        </div>
    </div>
@endsection
