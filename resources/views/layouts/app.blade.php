<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('page-title')</title>

    <link rel="stylesheet" href="{{ asset('font-awesome/css/font-awesome.min.css') }}">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Carousels -->
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <link rel="stylesheet" href="{{ asset('js/owl-carousel/assets/owl.carousel.min.css') }}" />

    @livewireStyles
    <!-- Custom css -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>
<main>

    <!-- Herobox Starts-->
    <div class="heropage">
        <div class="heropage-leaf1">
            <div class="heropage-leaf2">

                <!--Navbar Starts-->
                <nav class="navbar navbar-expand-lg bg-body-tertiary">
                    <div class="container-fluid">

                        <a class="navbar-brand d-lg-none" style="color:var(--bs-secondary)" href="#"><img
                                src="{{ asset('assets/logo_variant1.png') }}" alt="Logo" width="70" height="70">Swaran Abhishek</a>

                        <div class="navbar-toggler text-secondary" type="button" data-bs-toggle="collapse"
                             data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                             aria-expanded="false" aria-label="Toggle navigation">
                            <i data-feather="menu"></i>
                        </div>

                        <div class="collapse navbar-collapse row ms-5 me-5" id="navbarSupportedContent">
                            <ul class="navbar-nav contain col">
                                <li class="nav-item col">
                                    <a class="nav-link link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover {{ Request::is('/') ? 'active' : '' }}"
                                       aria-current="page" href="{{asset('/')}}">Home</a>
                                </li>

                                <li class="nav-item dropdown col">
                                    <a class="nav-link {{ Request::is('browse') ? 'active' : '' }}" href="{{asset('/browse')}}"
                                       aria-expanded="false">
                                        Jewellery
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li>
                                            <hr class="dropdown-divider">
                                        </li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                                    </ul>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link {{ Request::is('about') ? 'active' : '' }}" href="{{asset('/about')}}">About us</a>
                                </li>
                                <li class="nav-item col">
                                    <a class="nav-link {{ Request::is('contact') ? 'active' : '' }}" href="{{asset('/contact')}}">Contact</a>
                                </li>
                            </ul>
                            <div class="col-2 text-center d-none d-lg-block">
                                <a href="{{asset('/')}}">
                                    <img src="{{ asset('assets/logo_variant1.png') }}" alt="Logo" width="128" height="128">
                                </a>
                            </div>
                            <ul class="navbar-nav col text-center">
                                <li class="nav-item col">
                                    <a class="nav-link {{ Request::is('igi') ? 'active' : '' }}" href="{{asset('/igi')}}">IGI Page</a>
                                </li>
                                <form class="m-auto me-2 col-5 d-none d-lg-block" action="/browse" role="search" method="get">
                                    <input class="form-control" id="searchbar" name="q" type="search" placeholder="Search"
                                           aria-label="Search">
                                </form>
                                <li class="col">
                                    <a class="nav-icon" href="#"><i data-feather="heart"></i></a>
                                </li>
                                <li class="col">
                                    <a class="nav-icon" href="#" data-bs-toggle="modal"
                                       data-bs-target="#model-login"><i data-feather="user"></i></a>
                                </li>
                                <li class="col">
                                    <a class="nav-icon" href="#" data-bs-toggle="modal"
                                       data-bs-target="#model-cart"><i data-feather="shopping-bag"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Modals (MUST BE INCLUDED WITH NAVBAR) -->
                <!-- Login Modal -->
                <div class="modal fade" id="model-login" tabindex="-1" aria-labelledby="model-login-label"
                     aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content section-leaf3">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                            </div>
                            <div class="px-4 inter">
                                <img src="{{ asset('assets/logo_variant1_green.png') }}" width="150px" height="150px">
                                <p class="text-primary m-0">Welcome Back To</p>
                                <h1 class="text-primary marcellus mx-2" style="font-size: 3rem;">Swarn Abhishek</h1>
                                <p class="text-primary m-0">New here? <a href="#" class="text-info"
                                                                         data-bs-toggle="modal" data-bs-target="#model-signup">Create an account.</a>
                                </p>

                                <form>
                                    <div class="form-floating my-4">
                                        <input type="email" class="form-control" id="floatingInput"
                                               placeholder="name@example.com">
                                        <label for="floatingInput">Email address</label>
                                    </div>
                                    <div class="form-floating my-2">
                                        <input type="password" class="form-control" id="floatingPassword"
                                               placeholder="Password">
                                        <label for="floatingPassword">Password</label>
                                    </div>

                                    <div class="form-check my-3">
                                        <input class="form-check-input" type="checkbox" value="" id="remember_me">
                                        <label class="form-check-label" for="remember_me">
                                            Remember this device
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-secondary-classic btn-lg"
                                                type="button">Login</button>
                                    </div>
                                    <div class="w-100 my-2 text-center">
                                        <a class="text-info ps-auto" href="#">Forgot Password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Signup Modal -->
                <div class="modal fade" id="model-signup" tabindex="-1" aria-labelledby="model-signup-label"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content section-leaf3">
                            <div class="section-leaf4">
                                <div class="modal-header">
                                    <i data-feather="arrow-left" data-bs-toggle="modal"
                                       data-bs-target="#model-login"></i>
                                </div>
                                <div class="px-4 inter text-center">
                                    <img src="{{ asset('assets/logo_variant1_green.png') }}" width="150px" height="150px">
                                    <p class="text-primary m-0">Create an account to view your orders, enjoy
                                        privileges
                                        and receive updates.</p>
                                    <h1 class="text-primary marcellus mx-2" style="font-size: 3rem;">Create Account
                                    </h1>

                                    <form>
                                        <div class="row row-cols-1 row-cols-lg-2">
                                            <div class="col form-floating my-2">
                                                <input type="text" class="form-control" id="c_name"
                                                       placeholder="Name">
                                                <label for="floatingInput" class="ms-2">Name</label>
                                            </div>
                                            <div class="col form-floating my-2">
                                                <input type="text" class="form-control" id="c_surname"
                                                       placeholder="Surname">
                                                <label for="c_surname" class="ms-2">Surname</label>
                                            </div>
                                        </div>

                                        <div class="row row-cols-1 row-cols-lg-2">
                                            <div class="col form-floating my-2">
                                                <input type="email" class="form-control" id="c_email"
                                                       placeholder="Email">
                                                <label for="c_email" class="ms-2">Email</label>
                                            </div>
                                            <div class="col form-floating my-2">
                                                <input type="text" class="form-control" id="c_phone"
                                                       placeholder="Mobile Number">
                                                <label for="c_phone" class="ms-2">Mobile Number</label>
                                            </div>
                                        </div>

                                        <div class="form-floating my-2">
                                            <input type="text" class="form-control" id="c_address"
                                                   placeholder="Address">
                                            <label for="c_address" class="ms-2">Address</label>
                                        </div>

                                        <div class="row row-cols-1 row-cols-lg-2">
                                            <div class="col form-floating my-2">
                                                <input type="password" class="form-control" id="c_password"
                                                       placeholder="name@example.com">
                                                <label for="floatingInput" class="ms-2">Create Password</label>
                                            </div>
                                            <div class="col form-floating my-2">
                                                <input type="password" class="form-control" id="floatingPassword"
                                                       placeholder="Password">
                                                <label for="floatingPassword" class="ms-2">Confirm Password</label>
                                            </div>
                                        </div>

                                        <div class="text-start my-3">
                                            By continuing, you agree to Swarn Abhishek's <a class="text-primary"
                                                                                            href="#">Terms & Conditions & Privacy policy</a>
                                        </div>

                                        <div class="d-grid">
                                            <button class="btn btn-secondary-classic btn-lg"
                                                    type="button">Submit</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!--Cart Modal-->
                <div class="modal fade" id="model-cart" tabindex="-1" aria-labelledby="model-cart-label"
                     aria-hidden="true">
                    <div class="modal-dialog" style="margin-right:3%">
                        <div class="modal-content inter">

                            <div class="modal-header p-4">
                                <h4 class="text-primary fw-bold my-auto">Shopping Cart</h4>
                                <i data-feather="shopping-bag"  class="my-auto"></i>
                            </div>

                            <div class="px-4 inter">

                                <div class="row my-3">
                                    <div class="col-auto text-center">
                                        <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <p class="m-0 align-middle fw-bold p-1">Engagement Ring</p>
                                        <p class="m-0 align-middle p-1"><b>1</b> x Rs.25,000.00</p>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-auto text-center">
                                        <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <p class="m-0 align-middle fw-bold p-1">Engagement Ring</p>
                                        <p class="m-0 align-middle p-1"><b>1</b> x Rs.25,000.00</p>
                                    </div>
                                </div>

                                <div class="row my-3">
                                    <div class="col-auto text-center">
                                        <img class="cart-item-img" src="{{ asset('assets/catalogs/item1.png') }}" width="80px">
                                    </div>
                                    <div class="col-8 align-self-center">
                                        <p class="m-0 align-middle fw-bold p-1">Engagement Ring</p>
                                        <p class="m-0 align-middle p-1"><b>1</b> x Rs.25,000.00</p>
                                    </div>
                                </div>

                                <hr>

                                <div class="row">
                                    <p class="col">Subtotal</p>
                                    <p class="col fw-bolder ms-3 text-primary">Rs. 520,000.00</p>
                                </div>

                                <div class="d-grid mb-3 d-md-block text-center">
                                    <a href="{{ asset('/cart/checkout') }}" class="btn btn-outline-secondary mx-2 px-4 rounded-5" >Cart</a>
                                    <a href="{{ asset('/cart/checkout') }}" class="btn btn-outline-secondary mx-2 px-4 rounded-5" type="button">Checkout</a>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>

                <!-- Navbar Ends -->

                @yield('header-content')

            </div>
        </div>
    </div>
    <!-- Herobox ends-->

    @yield('content')

    <!--Footer STARTS-->
    <footer class="bg-primary socials py-2 px-sm-5">
        <div class="row row-cols-1 row-cols-md-4 mx-lg-5 px-lg-5 py-5">
            <div class="col px-5">
                <img src="{{ asset('assets/logo.png') }}" width="150px" class="p-0">
                <p class="text-secondary small">Shop our entire lineup of fine faves in store, get styled and join
                    the Fine Crew.</p>

                <div class="socials">
                    <a href="#" class="p-1"><i data-feather="twitter"></i></a>
                    <a href="#" class="p-1"><i data-feather="facebook"></i></a>
                    <a href="#" class="p-1"><i data-feather="instagram"></i></a>
                    <a href="#" class="p-1"><i data-feather="youtube"></i></a>
                </div>
            </div>

            <div class="col mt-5">
                <ul>
                    <li><b>Stores & Services</b></li>
                    <li><a href="#">Stories</a></li>
                    <li><a href="#">Pricing Studio</a></li>
                    <li><a href="#">Styling Appointments</a></li>
                </ul>
            </div>
            <div class="col mt-5">
                <ul>
                    <li><b>Help</b></li>
                    <li><a href="#">Shipping</a></li>
                    <li><a href="#">Returns + Exchange</a></li>
                    <li><a href="#">Warranty</a></li>
                    <li><a href="#">All FAQ</a></li>
                </ul>
            </div>
            <div class="col mt-5">
                <ul>
                    <li><b>Resources</b></li>
                    <li><a href="#">Jewellery Care</a></li>
                    <li><a href="#">Ring Sizer</a></li>
                    <li><a href="#">Pricing Aftercare</a></li>
                    <li><a href="#">Style Edit</a></li>
                </ul>
            </div>
        </div>

        <div class="mx-5">
            <hr class="mx-5 opacity-100">
        </div>

        <p class="text-center small p-3">&copy; Copyright 2022, All Rights Reserved by Swarn Abhishek</p>

    </footer>
    <!--Footer ENDS-->
</main>

<!-- JAVASCRIPT SECTION -->

<!-- Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
<!-- Feather icons -->
<script src="https://unpkg.com/feather-icons"></script>
<script>
    // For adding feather icons
    feather.replace({ 'stroke-width': 1 });
</script>
<!-- Jquery -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<!-- Carousels-->
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
<script src="{{ asset('js/owl-carousel/owl.carousel.min.js') }}"></script>
<!-- Custom scripts -->
<script src="{{ asset('js/script.js')}}"></script>

@livewireScripts
</body>

</html>
