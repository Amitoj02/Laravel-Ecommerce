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

                                @auth
                                <li class="col">
                                    <a class="nav-icon" href="#"><i data-feather="heart"></i></a>
                                </li>
                                @endauth

                                <li class="col dropdown">
                                @auth
                                    <a class="nav-icon" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i data-feather="user"></i></a>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="{{ route('profile') }}"><i data-feather="user"></i> Account</a></li>
                                        @if(Auth::user()->is_admin === true)
                                            <li><a class="dropdown-item" href="{{asset('admin')}}"><i data-feather="grid"></i> Admin Dashboard</a></li>
                                        @endif
                                        <li><hr class="dropdown-divider"></li>
                                        <li><a class="dropdown-item" href="{{ route('logout') }}"><i data-feather="log-out"></i> Logout</a></li>
                                    </ul>
                                @endauth
                                @guest
                                    <a class="nav-icon" href="#" data-bs-toggle="modal" data-bs-target="#modal-login" id="nav-profile-icon"><i data-feather="user"></i></a>
                                @endguest
                                </li>

                                @auth
                                <li class="col">
                                    <a class="nav-icon" href="#" data-bs-toggle="modal"
                                       data-bs-target="#modal-cart" id="nav-cart-icon"><i data-feather="shopping-bag"></i></a>
                                </li>
                                @endauth
                            </ul>
                        </div>
                    </div>
                </nav>
                <!-- Modals (MUST BE INCLUDED WITH NAVBAR) -->

                @guest
                <!-- Login Modal -->
                <div class="modal fade" id="modal-login" tabindex="-1" aria-labelledby="modal-login-label"
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
                                                                         data-bs-toggle="modal" data-bs-target="#modal-signup" id="text-create-account">Create an account.</a>
                                </p>

                                <form method="POST" action="{{ route('login') }}">
                                    @csrf
                                    <div class="form-floating my-4">
                                        <x-text-input type="email" class="form-control" id="l_email" name="email" :value="old('email')" placeholder="Email Address" required/>
                                        <label for="l_email" class="ms-2">Email Address</label>
                                        <x-input-error :messages="$errors->login->get('email')" class="mt-2" />
                                    </div>
                                    <div class="form-floating my-2">
                                        <x-text-input type="password" class="form-control" id="l_password" name="password" :value="old('password')" placeholder="Password" required/>
                                        <label for="l_password" class="ms-2">Password</label>
                                        <x-input-error :messages="$errors->login->get('password')" class="mt-2" />
                                    </div>

                                    <div class="form-check my-3">
                                        <input class="form-check-input" id="l_remember_me" type="checkbox" name="remember" value="true" @if(old('remember')) checked @endif >
                                        <label class="form-check-label" for="l_remember_me">
                                            Remember this device
                                        </label>
                                    </div>

                                    <div class="d-grid">
                                        <input class="btn btn-secondary-classic btn-lg" type="submit" value="Submit">
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
                <div class="modal fade" id="modal-signup" tabindex="-1" aria-labelledby="modal-signup-label"
                     aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content section-leaf3">
                            <div class="section-leaf4">
                                <div class="modal-header">
                                    <i data-feather="arrow-left" data-bs-toggle="modal"
                                       data-bs-target="#modal-login"></i>
                                </div>
                                <div class="px-4 inter text-center">
                                    <img src="{{ asset('assets/logo_variant1_green.png') }}" width="150px" height="150px">
                                    <p class="text-primary m-0">Create an account to create wishlist, request quotes and receive updates.</p>
                                    <h1 class="text-primary marcellus mx-2" style="font-size: 3rem;">Create Account</h1>

                                    <form method="POST" action="{{ route('register') }}">
                                        @csrf
                                        <div class="row row-cols-1 row-cols-lg-2">
                                            <div class="col form-floating my-2">
                                                <x-text-input type="text" class="form-control" id="c_name" name="name" :value="old('name')" placeholder="Name" required/>
                                                <label for="floatingInput" class="ms-2">Name</label>
                                                <x-input-error :messages="$errors->register->get('name')" class="mt-2" />
                                            </div>
                                            <div class="col form-floating my-2">
                                                <x-text-input type="text" class="form-control" id="c_surname" name="surname" :value="old('surname')" placeholder="Surname"/>
                                                <label for="c_surname" class="ms-2">Surname</label>
                                                <x-input-error :messages="$errors->register->get('surname')" class="mt-2" />
                                            </div>
                                        </div>

                                        <div class="row row-cols-1 row-cols-lg-2">
                                            <div class="col form-floating my-2">
                                                <x-text-input type="email" class="form-control" id="c_email" name="email" :value="old('email')" placeholder="Email" required/>
                                                <label for="c_email" class="ms-2">Email</label>
                                                <x-input-error :messages="$errors->register->get('email')" class="mt-2" />
                                            </div>
                                            <div class="col form-floating my-2">
                                                <x-text-input type="text" class="form-control" id="c_phone" name="phone_number" :value="old('phone_number')" placeholder="Mobile Number" required/>
                                                <label for="c_phone" class="ms-2">Mobile Number</label>
                                                <x-input-error :messages="$errors->register->get('phone_number')" class="mt-2" />
                                            </div>
                                        </div>

                                        <div class="form-floating my-2">
                                            <x-text-input type="text" class="form-control" id="c_address" name="address" :value="old('address')" placeholder="Address"/>
                                            <label for="c_address" class="ms-2">Address</label>
                                            <x-input-error :messages="$errors->register->get('address')" class="mt-2" />
                                        </div>

                                        <div class="row row-cols-1 row-cols-lg-2">
                                            <div class="col form-floating my-2">
                                                <x-text-input type="password" class="form-control" id="c_password" name="password" placeholder="Create Password" required/>
                                                <label for="floatingInput" class="ms-2">Create Password</label>
                                                <x-input-error :messages="$errors->register->get('password')" class="mt-2" />
                                            </div>
                                            <div class="col form-floating my-2">
                                                <x-text-input type="password" class="form-control" id="c_confirm_password" name="password_confirmation" placeholder="Password" required/>
                                                <label for="c_confirm_password" class="ms-2">Confirm Password</label>
                                                <x-input-error :messages="$errors->register->get('password_confirmation')" class="mt-2" />
                                            </div>
                                        </div>

                                        <div class="text-start my-3">
                                            By continuing, you agree to Swarn Abhishek's <a class="text-primary"
                                                                                            href="#">Terms & Conditions & Privacy policy</a>
                                        </div>

                                        <div class="d-grid">
                                            <input class="btn btn-secondary-classic btn-lg" type="submit" value="Submit">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endguest

                @auth
                <!--Cart Modal-->
                <div class="modal fade" id="modal-cart" tabindex="-1" aria-labelledby="modal-cart-label"
                     aria-hidden="true">
                    <div class="modal-dialog" style="margin-right:3%">
                        <livewire:shopping-cart/>
                    </div>
                </div>
                @endauth

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

{{--If the user returns from signup error--}}
@if($errors->hasBag('register'))
    <script>document.getElementById('text-create-account').click();</script>
@endif
{{--If the user returns from login error--}}
@if($errors->hasBag('login'))
    <script>document.getElementById('nav-profile-icon').click();</script>
@endif

@livewireScripts
</body>

</html>
