@extends('layouts.app')
@section('page-title', 'Contact - Swarn Abhishek')

@section('header-content')
    <!--Header Start-->
    <div class="container-sm pb-5">
        <div class="bg-white section-leaf1">
            <div class="section-leaf2">

                <div class="m-lg-5 p-5">
                    <p class="inter text-center">To make an enquire please use our</p>
                    <h1 class="text-primary text-center">Contact Form</h1>
                    <form class="mt-5 px-lg-5 inter">
                        <div class="row row-cols-1 row-cols-lg-2">
                            <div class="col form-floating my-3">
                                <input type="text" class="form-control" id="name" placeholder="Name">
                                <label for="name" class="ms-2">Name</label>
                            </div>
                            <div class="col form-floating my-3">
                                <input type="text" class="form-control" id="surname" placeholder="Surname">
                                <label for="surname" class="ms-2">Surname</label>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-lg-2">
                            <div class="col form-floating my-3">
                                <input type="email" class="form-control" id="email" placeholder="Email">
                                <label for="email" class="ms-2">Email</label>
                            </div>
                            <div class="col form-floating my-3 mb-4">
                                <input type="text" class="form-control" id="phone" placeholder="Phone">
                                <label for="phone" class="ms-2">Phone</label>
                            </div>
                        </div>

                        <b class="text-start">I'm Interested In</b><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox1"
                                   value="option1">
                            <label class="form-check-label" for="inlineCheckbox1">Gold Jewellery</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox2"
                                   value="option2">
                            <label class="form-check-label" for="inlineCheckbox2">Silver Jewellery</label>
                        </div>
                        <div class="form-check form-check-inline mb-4">
                            <input class="form-check-input" type="checkbox" id="inlineCheckbox3"
                                   value="option3">
                            <label class="form-check-label" for="inlineCheckbox3">Diamonds</label>
                        </div>

                        <div class="form-floating">
                                            <textarea class="form-control mb-4" placeholder="Leave a message here"
                                                      id="floatingTextarea2" style="height: 200px" ></textarea>
                            <label for="floatingTextarea2">Message</label>
                        </div>

                        <input class="btn btn-outline-secondary btn-lg d-grid gap-2 col-6 col-lg-4 mx-auto" type="submit" value="Send Form">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--Header End-->
@endsection

@section('content')
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
                        Visit our store and experience the allure of fine craftsmanship in person. Explore our
                        exquisite jewelry collections, each piece a testament to artistry and elegance. Discover the
                        perfect jewelry piece that resonates with your style and story. Immerse yourself in a world
                        of timeless beauty at our physical location.
                    </p>
                    <div class="my-5">
                        <b class="text-primary inter"><i class="me-2" data-feather="map-pin"
                                                         stroke-width="2px"></i>B 67-0182, Sarafaan Bazaar, Batala-143505</b>
                    </div>
                    <button class="btn btn-outline-secondary">Directions &gt;</button>
                </div>
                <div class="col mt-5">
                    <img src="{{ asset('assets/map_point.png') }}" style="width:100%;">
                </div>
            </div>

        </div>
    </div>
    <!--Visit us ENDS-->
@endsection
