<div>
    <header class="header navbar-area">
        <!-- Start Topbar -->
        <div class="topbar">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-left">
                            <ul class="menu-top-link">
                                @foreach ($settings as $setting)
                                    <li>
                                        <p class="text-white"><i class="lni lni-envelope"></i> {{ $setting->email }}</p>
                                    </li>
                                    <li>
                                        <p class="text-white"><i class="lni lni-phone"></i> {{ $setting->mobile }}</p>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-middle">
                            <ul class="useful-links">
                                <li><a href="{{ route('home') }}">Home</a></li>
                                <li><a href="{{-- {{ route('about') }} --}}">About Us</a></li>
                                <li><a href="{{-- {{ route('contact') }} --}}">Contact Us</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-4 col-12">
                        <div class="top-end">
                            <div class="user">
                                <i class="lni lni-user"></i>
                                Hello
                            </div>
                            <ul class="user-login">
                                <li>
                                    <a href="{{ route('login') }}">Sign In</a>
                                </li>
                                <li>
                                    <a href="{{ route('register') }}">Register</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Topbar -->
        <!-- Start Header Middle -->
        <div class="header-middle">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-3 col-7">
                        <!-- Start Header Logo -->
                        <a class="navbar-brand" href="{{ route('home') }}">
                            <img src="{{ asset('images/logo/logo.png') }}" alt="Logo">
                        </a>
                        <!-- End Header Logo -->
                    </div>
                    <div class="col-lg-5 col-md-7 d-xs-none">

                        <div class="main-menu-search">

                            <form action="{{ route('shop') }}" class="navbar-search search-style-5">

                                <div class="search-input">
                                    <input type="search" value="{{ request('search') }}" autocomplete="off"
                                           name="search" placeholder="Search">
                                </div>
                                <div class="search-btn">
                                    <button typ="submit"><i class="lni lni-search-alt"></i></button>
                                </div>
                            </form>

                        </div>

                    </div>
                    <div class="col-lg-4 col-md-2 col-5">
                        <div class="middle-right-area">
                            <div class="nav-hotline">
                                @foreach ($settings as $setting)
                                    <i class="lni lni-phone"></i>
                                    <h3>Hotline:
                                        <span>{{ $setting->mobile }}</span>
                                    </h3>
                                @endforeach

                            </div>
                            <div class="navbar-cart">
                                <livewire:cart-counter/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Header Middle -->
        <!-- Start Header Bottom -->
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 col-md-6 col-12">
                    <div class="nav-inner">
                        <!-- Start Mega Category Menu -->
                        <div class="mega-category-menu">
                            <span class="cat-button"><i class="lni lni-menu"></i>All Categories</span>
                            <ul class="sub-category">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('category', $category->name) }}">{{ $category->name }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <!-- End Mega Category Menu -->
                        <!-- Start Navbar -->
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                                    aria-expanded="false" aria-label="Toggle navigation">
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                                <span class="toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                                <ul id="nav" class="navbar-nav ms-auto">
                                    <li class="nav-item">
                                        <a href="{{ route('home') }}" class="active"
                                           aria-label="Toggle navigation">Home</a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{-- {{ route('shop') }} --}}" aria-label="Toggle navigation">Collections</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{-- {{ route('about') }} --}}" aria-label="Toggle navigation">About
                                            Us</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{-- {{ route('contact') }} --}}" aria-label="Toggle navigation">Contact
                                            Us</a>
                                    </li>
                                </ul>
                            </div> <!-- navbar collapse -->
                        </nav>
                        <!-- End Navbar -->
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-12">
                    <!-- Start Nav Social -->
                    <div class="nav-social">
                        <h5 class="title">Follow Us:</h5>
                        <ul>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                            </li>
                        </ul>
                    </div>
                    <!-- End Nav Social -->
                </div>
            </div>
        </div>
    </header>
</div>
