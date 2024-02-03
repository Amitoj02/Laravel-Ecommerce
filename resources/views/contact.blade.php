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
                    <form class="mt-5 px-lg-5 inter" action="#" onsubmit="return submitContactForm()">
                        <div class="row row-cols-1 row-cols-lg-2">
                            <div class="col form-floating my-3">
                                <input type="text" class="form-control" id="firstName" placeholder="Name" @auth value="{{ Auth::user()->name }}" @endauth>
                                <label for="firstName" class="ms-2">Name</label>
                            </div>
                            <div class="col form-floating my-3">
                                <input type="text" class="form-control" id="lastName" @auth value="{{ Auth::user()->surname }}" @endauth placeholder="Surname">
                                <label for="lastName" class="ms-2">Surname</label>
                            </div>
                        </div>
                        <div class="row row-cols-1 row-cols-lg-2">
                            <div class="col form-floating my-3">
                                <input type="email" class="form-control" id="email" @auth value="{{ Auth::user()->email }}" @endauth placeholder="Email">
                                <label for="email" class="ms-2">Email</label>
                            </div>
                            <div class="col form-floating my-3 mb-4">
                                <input type="text" class="form-control" id="phone" @auth value="{{ Auth::user()->phone_number }}" @endauth placeholder="Phone">
                                <label for="phone" class="ms-2">Phone</label>
                            </div>
                        </div>

                        <b class="text-start">I'm Interested In</b><br />
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="gold" name="interest"
                                   value="Gold Jewellery">
                            <label class="gold" for="inlineCheckbox1">Gold Jewellery</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="checkbox" id="silver" name="interest"
                                   value="Silver Jewellery">
                            <label class="silver" for="inlineCheckbox2">Silver Jewellery</label>
                        </div>
                        <div class="form-check form-check-inline mb-4">
                            <input class="form-check-input" type="checkbox" id="diamonds" name="interest"
                                   value="Diamonds">
                            <label class="diamonds" for="inlineCheckbox3">Diamonds</label>
                        </div>

                        <div class="form-floating">
                                            <textarea class="form-control mb-4" placeholder="Leave a message here"
                                                      id="message" name="message" style="height: 200px" ></textarea>
                            <label for="message">Message</label>
                        </div>

                        <input class="btn btn-outline-secondary btn-lg d-grid gap-2 col-6 col-lg-4 mx-auto" type="submit" value="Send Form">
                    </form>
                    <script>
                        function submitContactForm() {
                            var firstName = document.getElementById('firstName').value;
                            var lastName = document.getElementById('lastName').value;
                            var email = document.getElementById('email').value;
                            var phone = document.getElementById('phone').value;
                            var interests = document.querySelectorAll('input[name="interest"]:checked');
                            var message = document.getElementById('message').value;

                            // Construct the email body
                            var emailBody = 'First Name: ' + firstName + ' ' + lastName + '\n'
                                + 'Email: ' + email + '\n'
                                + 'Phone: ' + phone + '\n'
                                + 'Interested in: ' + Array.from(interests).map(i => i.value).join(', ') + '\n'
                                + 'Message: \n\n' + message;

                            // Redirect user to email client with pre-filled subject and body
                            window.location.href = 'mailto:info@swarnabhishek.com?subject=Contact Request&body=' + encodeURIComponent(emailBody);

                            // Return false to prevent the form from being submitted in the traditional way
                            return false;
                        }
                    </script>
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

            <div class="row row-cols-1 row-cols-lg-2">
                <div class="col text-start mt-5">
                    <p>V I S I T &nbsp;&nbsp; U S</p>
                    <h2 class="text-primary under-border-left mb-3"  >At Our Store</h2>
                    {{--                    <p class="under-border-left"></p>--}}
                    <p class="text-info">
                        Visit our store and experience the allure of fine craftsmanship in person. Explore our exquisite jewellery collections, each piece a testament to artistry and elegance. Discover the perfect jewellery piece that resonates with your style and story. Immerse yourself in a world of timeless beauty at our physical location.
                    </p>
                    <div class="my-5">
                        <b class="text-primary inter"><i class="me-2" data-feather="phone" stroke-width="2px"></i>+91 98765-43210</b><br><br>
                        <b class="text-primary inter"><i class="me-2" data-feather="map-pin" stroke-width="2px"></i>B 67-0182, Sarafaan Bazaar, Batala-143505</b>
                    </div>
                    <a href="https://maps.app.goo.gl/PrZCxWQmJg747EEp7" target="_blank" class="btn btn-outline-secondary">Open in Google Maps &gt;</a>
                </div>
                <div class="col mt-5">
                    <img src="{{ asset('assets/map_point.png') }}" style="width:100%;">
                </div>
            </div>

        </div>
    </div>
    <!--Visit us ENDS-->
@endsection
